<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('programa_model');
        $this->load->model('tipo_programa_model');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            $this->formulario();
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function get_programas() {
        $programas = $this->get_data();
        echo json_encode($programas);
    }

    public function validar_repetido($texto, $id) {
        $estado = "ok";
        if ($this->programa_model->registros_repetidos("nombre", trim($texto), $id)) {
            $estado = "La programa que va a ingresar ya existe";
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
        $cliente["estado"] = 'p';
        $this->programa_model->update($id, $cliente);
    }

    public function get_tipo_programas_activos() {
        $tipo_programa = $this->tipo_programa_model->get_all_by_estado('a');
        foreach ($tipo_programa as $tipo) {
            $tipo->text = $tipo->nombre;
        }
        echo json_encode($tipo_programa);
    }

    protected function insert() {
        $cliente = $this->receive_data();
        $cliente["estado"] = 'a';
        return $this->programa_model->add($cliente);
    }

    protected function update($id) {
        $cliente = $this->receive_data();
        $this->programa_model->update($id, $cliente);
    }

    protected function receive_data() {
        $datos = json_decode(file_get_contents("php://input"));
        return array(
            "nombre" => trim($datos->cliente->nombre),
            "observaciones" => trim($datos->cliente->observaciones),
            "id_tipo_programa" => $datos->cliente->tipo_programa->id
        );
    }

    protected function formulario() {
        $this->loadTemplates('pages/programas_view');
    }

    protected function get_data() {
        $programas = $this->programa_model->get_all_by_estado('a');
        foreach ($programas as $programa) {
            $programa->tipo_programa = $this->format_tipo_programa($programa->id_tipo_programa);
        }
        return $programas;
    }

    protected function format_tipo_programa($id_tipo_vendedor) {
        $tipo_vendedor = $this->tipo_programa_model->get_by_id($id_tipo_vendedor);
        $tipo_vendedor[0]->text = $tipo_vendedor[0]->nombre;
        return $tipo_vendedor[0];
    }

}
