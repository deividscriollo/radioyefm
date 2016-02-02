<?php

include_once('application/modules/paquetes/models/Paquete_model.php');

class Test_Paquete_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('paquete_model');

        $this->paquete_model->set_base_datos('unit_test');

        $paquetes_sql = UNITTESTPATH . 'paquetes.sql';
        $this->base_model->fixtureExecuter($paquetes_sql);
    }

    public function test_add() {
        $data = array(
            'nombre' => 'nuevo paquete',
            'observaciones' => 'observaciones',
            'estado' => 'a',
        );
        $this->paquete_model->add($data);
        $paquetes = $this->paquete_model->get_all();
        $this->assertEqual($paquetes[3]->nombre, 'nuevo paquete');
        $this->assertEqual($paquetes[3]->observaciones, 'observaciones');
    }

    public function test_delete() {
        $this->paquete_model->delete(4);
        $get_all = $this->paquete_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all() {
        $get_all = $this->paquete_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all_by_estado() {
        $paquete = $this->paquete_model->get_all_by_estado('a');
        $this->assertEqual($paquete[0]->nombre, 'promocion');
        $this->assertEqual($paquete[0]->observaciones, 'descuento especial');
    }

}
