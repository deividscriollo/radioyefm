<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once(realpath(__DIR__ . '/../../../models') . '/Base_model.php');

class Paquete_Model extends Base_Model {

    public function __construct() {
        parent::__construct();
        $this->set_base_datos('default');
        $this->set_tabla('paquetes');
    }

    public function get_all_by_estado($estado) {
        $this->control_conexion();
        $this->conexion->where('estado', $estado);
        $cliente = $this->conexion->get($this->tabla)->result();
        $this->conexion->close();
        return $cliente;
    }

}
