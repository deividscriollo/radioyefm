<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    public function loadTemplates($url_template, $data = '') {
        // $menu['opciones_menu'] = $this->generar_menu();
        $menu = '';
        $this->load->view('templates/header', $menu);
        $this->load->view($url_template, $data);
        $this->load->view('templates/footer');
    }

}
