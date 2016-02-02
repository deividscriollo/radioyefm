<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('cliente_model');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            $this->formulario();
        }else {
            redirect(base_url(), 'refresh');
        }
    }

    public function get_clientes() {
        $clientes = $this->format_status();
        echo json_encode($clientes);
    }

    public function validar_repetido($texto, $id) {
        $estado = "ok";
        if ($this->cliente_model->registros_repetidos("ruc", trim($texto), $id)) {
            $estado = "El ruc que va a ingresar ya existe";
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
        $this->cliente_model->update($id, $cliente);
    }

    public function get_info_sri($ruc) {
        $this->load->library('servicio_sri');
        $datos_sri = ($this->servicio_sri->obtener_datos($ruc));
        echo json_encode($datos_sri);
    }

    protected function insert() {
        $cliente = $this->receive_data();
        $cliente["estado"] = 'a';
        return $this->cliente_model->add($cliente);
    }

    protected function update($id) {
        $cliente = $this->receive_data();
        $this->cliente_model->update($id, $cliente);
    }

    protected function receive_data() {
        $datos = json_decode(file_get_contents("php://input"));
        $status = $datos->cliente->situacion->id;
        return array(
            "empresa" => trim($datos->cliente->empresa),
            "ruc" => trim($datos->cliente->ruc),
            "direccion" => trim($datos->cliente->direccion),
            "status" => trim($status),
            "telefono" => trim($datos->cliente->telefono),
            "contacto" => trim($datos->cliente->contacto),
            "telefono_contacto" => trim($datos->cliente->telefono_contacto),
            "observaciones" => trim($datos->cliente->observaciones)
        );
    }

    protected function formulario() {
        $this->loadTemplates('pages/clientes_view');
    }

    protected function format_status() {
        $clientes = $this->cliente_model->get_all_by_estado('a');
        foreach ($clientes as $cliente) {
            if ($cliente->status == 'a') {
                $cliente->situacion->id = 'a';
                $cliente->situacion->text = 'Activo';
                $cliente->clase = 'label label-sm label-success arrowed-in arrowed-in-right';
            } elseif ($cliente->status == 'p') {
                $cliente->situacion->id = 'p';
                $cliente->situacion->text = 'Pasivo';
                $cliente->clase = 'label label-sm label-warning arrowed-in arrowed-in-right';
            } elseif ($cliente->status == 'f') {
                $cliente->situacion->id = 'f';
                $cliente->situacion->text = 'Potencial';
                $cliente->clase = 'label label-sm label-info arrowed-in arrowed-in-right';
            } elseif ($cliente->status == 'n') {
                $cliente->situacion->id = 'n';
                $cliente->situacion->text = 'Lista Negra';
                $cliente->clase = 'label label-sm label-danger arrowed-in arrowed-in-right';
            }
        }

        return $clientes;
    }

}
