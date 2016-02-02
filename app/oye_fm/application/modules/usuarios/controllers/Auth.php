<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

    // Used for registering and changing password form validation
    var $min_username = 4;
    var $max_username = 20;
    var $min_password = 4;
    var $max_password = 20;

    function __construct() {
        parent::__construct();

//        $this->load->library('Form_validation');
//        $this->load->library('DX_Auth');
//        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        $this->login();
    }

    /* Callback function */

    function username_check($username) {
        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'El usuario ya existe. Por favor ingrese otro nombre de usuario.');
        }

        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'El Email esta siendo usado por otro usuario. Por favor ingrese otra direccion de correo.');
        }

        return $result;
    }

    function recaptcha_check() {
        $result = $this->dx_auth->is_recaptcha_match();
        if (!$result) {
            $this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
        }

        return $result;
    }

    /* End of Callback function */

    function login() {
        if (!$this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;
            // Set form validation rules
            $val->set_rules('username', 'Username', 'trim|required');
            $val->set_rules('password', 'Password', 'trim|required');
            $val->set_rules('remember', 'Remember me', 'integer');
            // Set captcha rules if login attempts exceed max attempts in config
            if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                $val->set_rules('captcha', 'Confirmation Code', 'trim|required|callback_captcha_check');
            }

            if ($val->run($this) AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember'))) {
                // Redirect to homepage
                redirect('', 'location');
            } else {
                // Check if the user is failed logged in because user is banned user or not
                if ($this->dx_auth->is_banned()) {
                    // Redirect to banned uri
                    $url = $this->dx_auth->deny_access('banned');
                    redirect(base_url('usuarios' . $url), 'refresh');
//                    $this->dx_auth->deny_access('banned');
                } else {
                    // Default is we don't show captcha until max login attempts eceeded
                    $data['show_captcha'] = FALSE;

                    // Show captcha if login attempts exceed max attempts in config
                    if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                        $data['titulo'] = "Error de acceso";
                        $data['info'] = 'Contacte con el administrador';
                        $data['auth_message'] = 'Ha exedido el numero de intentos para su acceso y su cuenta fue bloqueada,'
                                . ' contacte con el administrador para volver a habilitar su cuenta.';
                        $this->load->view($this->dx_auth->deny_view, $data);
                    } else {
                        $this->load->view($this->dx_auth->login_view, $data);
                    }
                }
            }
        } else {
            redirect(base_url('clientes/clientes'), 'refresh');
        }
    }

    function logout() {
        $this->dx_auth->logout();
        $this->load->view($this->dx_auth->login_view);

//        $data['auth_message'] = 'You have been logged out.';
//        $this->load->view($this->dx_auth->logout_view, $data);
    }

    function register() {
        $data['titulo'] = 'Error de Registro';
        $data['info'] = 'Contacte con el administrador para mayor informacion';
        if (!$this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration) {
            $val = $this->form_validation;
            // Set form validation rules
            $val->set_rules('username', 'Username', 'trim|required|min_length[' . $this->min_username . ']|max_length[' . $this->max_username . ']|callback_username_check|alpha_dash');
            $val->set_rules('password', 'Password', 'trim|required|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_password]');
            $val->set_rules('confirm_password', 'Confirm Password', 'trim|required');
            $val->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');

            // Is registration using captcha
            if ($this->dx_auth->captcha_registration) {
                // Set recaptcha rules.
                // IMPORTANT: Do not change 'recaptcha_response_field' because it's used by reCAPTCHA API,
                // This is because the limitation of reCAPTCHA, not DX Auth library
                $val->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|required|callback_recaptcha_check');
            }

            // Run form validation and register user if it's pass the validation
            if ($val->run($this) AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email'))) {
                $data['titulo'] = 'Registro corecto';
                $data['info'] = 'Su registro fue realizado correctamente';
                // Set success message accordingly
                if ($this->dx_auth->email_activation) {
                    $data['auth_message'] = 'Registro correcto. Revise su email para activar su cuenta.';
                } else {
                    $data['auth_message'] = 'Registro correcto. ' . anchor(base_url('usuarios/auth/logout'), 'Login');
                }

                // Load registration success page
                $this->load->view($this->dx_auth->register_success_view, $data);
            } else {
                // Load registration page
                $this->load->view($this->dx_auth->register_view);
            }
        } elseif (!$this->dx_auth->allow_registration) {
            $data['auth_message'] = 'El registro a sido desactivado.';
            $this->load->view($this->dx_auth->register_disabled_view, $data);
        } else {
            $data['auth_message'] = 'Debe cerrar su sesion antes de registrarse.';
            $this->load->view($this->dx_auth->logged_in_view, $data);
        }
    }

    function activate() {
        // Get username and key
        $username = $this->uri->segment(3);
        $key = $this->uri->segment(4);

        // Activate user
        if ($this->dx_auth->activate($username, $key)) {
            $data['titulo'] = 'Activacion de cuentas de usuario';
            $data['info'] = 'Cuenta activada';
            $data['auth_message'] = 'Su cuenta fue activada correctamente . ' . anchor(site_url($this->dx_auth->login_uri), 'Login');
            $this->load->view($this->dx_auth->activate_success_view, $data);
        } else {
            $data['titulo'] = 'Error de activacion';
            $data['info'] = 'Hubo un error al activar su cuenta';
            $data['auth_message'] = 'El codigo de activacion fue incorrecto. Por favor revise su correo nuevamente.';
            $this->load->view($this->dx_auth->activate_failed_view, $data);
        }
    }

    function forgot_password() {
        $val = $this->form_validation;

        // Set form validation rules
        $val->set_rules('login', 'Username or Email address', 'trim|required');

        // Validate rules and call forgot password function
        if ($val->run($this) AND $this->dx_auth->forgot_password($val->set_value('login'))) {
            $data['titulo'] = 'Recuperacion de contraseña';
            $data['info'] = 'Su solicitud para recuperar su contraseña a fue envia';
            $data['auth_message'] = 'Hemos enviado un correo electronico con las instrucciones para activar su nueva contraseña.';
            $this->load->view($this->dx_auth->forgot_password_success_view, $data);
        } else {
            $this->load->view($this->dx_auth->forgot_password_view);
        }
    }

    function reset_password() {
        // Get username and key
        $username = $this->uri->segment(3);
        $key = $this->uri->segment(4);

        // Reset password
        $data['titulo'] = 'Reseteo de contraseña';
        $data['info'] = 'Su solicitud para reseatear su contraseña a fue envia';
        if ($this->dx_auth->reset_password($username, $key)) {
            $data['auth_message'] = 'Su contraseña fue reseateada correctamente, ' . anchor(base_url('usuarios/auth/logout'), 'Login');
            $this->load->view($this->dx_auth->reset_password_success_view, $data);
        } else {
            $data['auth_message'] = 'Fallo el reseteo. Su nombre de usuario y key son incorrectos. Por favor revise su email y siga las instrucciones.';
            $this->load->view($this->dx_auth->reset_password_failed_view, $data);
        }
    }

    function change_password() {
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;

            // Set form validation
            $val->set_rules('old_password', 'Old Password', 'trim|required|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']');
            $val->set_rules('new_password', 'New Password', 'trim|required|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_new_password]');
            $val->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required');

            // Validate rules and change password
            if ($val->run($this) AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password'))) {
                $data['titulo'] = 'Cambio de contraseña';
                $data['info'] = 'Proceso de cambio de contraseña';
                $data['auth_message'] = 'Su contraseña ha sido cambiada correctamente.';
                $this->load->view($this->dx_auth->change_password_success_view, $data);
            } else {
                $this->load->view($this->dx_auth->change_password_view);
            }
        } else {
            $url = $this->dx_auth->deny_access('login');
            redirect(base_url('usuarios' . $url), 'refresh');
            // Redirect to login page
//            $this->dx_auth->deny_access('login');
        }
    }

    function cancel_account() {
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;

            // Set form validation rules
            $val->set_rules('password', 'Password', "trim|required");

            // Validate rules and change password
            if ($val->run($this) AND $this->dx_auth->cancel_account($val->set_value('password'))) {
                // Redirect to homepage
                $data['titulo'] = 'Cancelar Cuenta';
                $data['info'] = 'Proceso de eliminacion de cuenta de usuario';
                $data['auth_message'] = 'Su usuario a sido eliminado. Si desea ser parte de nosotros puede crear un usario nuevamente.';
                $this->load->view($this->dx_auth->change_password_success_view, $data);
//                redirect('', 'location');
            } else {
                $this->load->view($this->dx_auth->cancel_account_view);
            }
        } else {
            // Redirect to login page
            $url = $this->dx_auth->deny_access('login');
            redirect(base_url('usuarios' . $url), 'refresh');
//            $this->dx_auth->deny_access('login');
        }
    }

    // Example how to get permissions you set permission in /backend/custom_permissions/
    function custom_permissions() {
        if ($this->dx_auth->is_logged_in()) {
            echo 'My role: ' . $this->dx_auth->get_role_name() . '<br/>';
            echo 'My permission: <br/>';

            if ($this->dx_auth->get_permission_value('edit') != NULL AND $this->dx_auth->get_permission_value('edit')) {
                echo 'Edit is allowed';
            } else {
                echo 'Edit is not allowed';
            }

            echo '<br/>';

            if ($this->dx_auth->get_permission_value('delete') != NULL AND $this->dx_auth->get_permission_value('delete')) {
                echo 'Delete is allowed';
            } else {
                echo 'Delete is not allowed';
            }
        }
    }

    public function deny() {
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $data['titulo'] = 'Error de acceso';
            $data['info'] = 'Usted no tiene permisos para ingresar a esta pagina';
            $data['auth_message'] = 'Haga click <a href="javascript:history.back(-1);" '
                    . 'title="Ir la página anterior"> aqui</a> para volver a la pagina anterior</a>';
            $this->load->view($this->dx_auth->reset_password_success_view, $data);
        } else {
            // Redirect to login page
            $url = $this->dx_auth->deny_access('login');
            redirect(base_url('usuarios' . $url), 'refresh');
//            $this->dx_auth->deny_access('login');
        }
    }

    public function banned() {
        $data['titulo'] = 'Error de acceso';
        $data['info'] = 'Su usuario fue bloqueado por mal comportamiento';
        $data['auth_message'] = 'Contacte con el admnistrador para mayor informacion';
        $this->load->view($this->dx_auth->reset_password_success_view, $data);
    }

    public function get_user_name() {
        echo $this->dx_auth->get_username();
    }

    public function is_admin() {
        echo $this->dx_auth->is_admin();
    }

}
