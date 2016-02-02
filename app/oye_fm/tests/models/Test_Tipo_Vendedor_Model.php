<?php

include_once('application/modules/vendedores/models/Tipo_vendedor_model.php');

class Test_Tipo_Vendedor_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('tipo_vendedor_model');

        $this->tipo_vendedor_model->set_base_datos('unit_test');

        $tipo_vendedor = UNITTESTPATH . 'tipo_vendedor.sql';
        $this->base_model->fixtureExecuter($tipo_vendedor);
    }

    public function test_add() {
        $data = array(
            'nombre' => 'nueva',
            'observaciones' => 'observaciones',
            'estado' => 'a',
        );
        $this->tipo_vendedor_model->add($data);
        $tipos = $this->tipo_vendedor_model->get_all();
        $this->assertEqual($tipos[3]->nombre, 'nueva');
        $this->assertEqual($tipos[3]->observaciones, 'observaciones');
    }

    public function test_delete() {
        $this->tipo_vendedor_model->delete(4);
        $get_all = $this->tipo_vendedor_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all() {
        $get_all = $this->tipo_vendedor_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all_by_estado() {
        $tipos = $this->tipo_vendedor_model->get_all_by_estado('a');
        $this->assertEqual($tipos[1]->nombre, 'externo');
        $this->assertEqual($tipos[1]->observaciones, 'fuera de la empresa');
    }

}
