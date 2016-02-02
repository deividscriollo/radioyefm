<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('vendedor_model');
        $this->load->model('tipo_vendedor_model');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            $this->formulario();
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function get_vendedores() {
        $vendedores = $this->get_data();
        echo json_encode($vendedores);
    }

    public function validar_repetido($texto, $id) {
        $estado = "ok";
        if ($this->vendedor_model->registros_repetidos("cedula", trim($texto), $id)) {
            $estado = "La cedula que va a ingresar ya existe";
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
        $this->vendedor_model->update($id, $cliente);
    }

    public function get_tipo_vendedores_activos() {
        $tipo_vendedor = $this->tipo_vendedor_model->get_all_by_estado('a');
        foreach ($tipo_vendedor as $tipo) {
            $tipo->text = $tipo->nombre;
        }
        echo json_encode($tipo_vendedor);
    }

    protected function insert() {
        $cliente = $this->receive_data();
        $cliente["estado"] = 'a';
        return $this->vendedor_model->add($cliente);
    }

    protected function update($id) {
        $cliente = $this->receive_data();
        $this->vendedor_model->update($id, $cliente);
    }

    protected function receive_data() {
        $datos = json_decode(file_get_contents("php://input"));
        return array(
            "nombre" => trim($datos->cliente->nombre),
            "apellido" => trim($datos->cliente->apellido),
            "edad" => trim($datos->cliente->edad),
            "cedula" => trim($datos->cliente->cedula),
            "direccion" => trim($datos->cliente->direccion),
            "telefono" => trim($datos->cliente->telefono),
            "observaciones" => trim($datos->cliente->observaciones),
            "id_tipo_vendedor" => $datos->cliente->tipo_vendedor->id
        );
    }

    protected function formulario() {
        $this->loadTemplates('pages/vendedores_view');
    }

    protected function get_data() {
        $vendedores = $this->vendedor_model->get_all_by_estado('a');
        foreach ($vendedores as $vendedor) {
            $vendedor->tipo_vendedor = $this->format_tipo_vendedor($vendedor->id_tipo_vendedor);
        }
        return $vendedores;
    }

    protected function format_tipo_vendedor($id_tipo_vendedor) {
        $tipo_vendedor = $this->tipo_vendedor_model->get_by_id($id_tipo_vendedor);
        $tipo_vendedor[0]->text = $tipo_vendedor[0]->nombre;
        return $tipo_vendedor[0];
    }

}
