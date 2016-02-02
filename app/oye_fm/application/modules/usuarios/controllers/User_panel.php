<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Panel extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('dx_auth/users', 'users');
        $this->load->model('dx_auth/roles', 'roles');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            $this->formulario();
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function count_users() {
        echo $this->users->count_user();
    }

    public function count_roles() {
        echo $this->roles->count_roles();
    }

    protected function formulario() {
        $this->loadTemplates('pages/user_panel');
    }

}
