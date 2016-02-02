<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_vendedor extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('tipo_vendedor_model');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            $this->formulario();
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function get_tipo_vendedores() {
        $tipo = $this->tipo_vendedor_model->get_all_by_estado('a');
        echo json_encode($tipo);
    }

    public function validar_repetido($texto, $id) {
        $estado = "ok";
        if ($this->tipo_vendedor_model->registros_repetidos("nombre", trim($texto), $id)) {
            $estado = "El tipo vendedor que va a ingresar ya existe";
        }
        echo $estado;
    }

    public function procesar($id) {
        if ($id == 0) {
            $this->insert();
        } else {
            $this->update($id);
        }
    }

    public function delete($id) {
        $tipo["estado"] = 'p';
        $this->tipo_vendedor_model->update($id, $tipo);
    }

    protected function insert() {
        $tipo = $this->receive_data();
        $tipo["estado"] = 'a';
        return $this->tipo_vendedor_model->add($tipo);
    }

    protected function update($id) {
        $tipo = $this->receive_data();
        $this->tipo_vendedor_model->update($id, $tipo);
    }

    protected function receive_data() {
        $datos = json_decode(file_get_contents("php://input"));
        return array(
            "nombre" => trim($datos->cliente->nombre),
            "observaciones" => trim($datos->cliente->observaciones)
        );
    }

    protected function formulario() {
        $this->loadTemplates('pages/tipo_vendedor_view');
    }

}
