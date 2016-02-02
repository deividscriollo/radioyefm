<?php

include_once('application/modules/vendedores/models/Vendedor_model.php');

class Test_Vendedor_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('vendedor_model');

        $this->vendedor_model->set_base_datos('unit_test');

        $vendedores_sql = UNITTESTPATH . 'vendedores.sql';
        $this->base_model->fixtureExecuter($vendedores_sql);
    }

    public function test_add() {
        $data = array(
            'nombre' => 'Bruce',
            'apellido' => 'Wayne',
            'edad' => '28',
            'cedula' => '12345',
            'direccion' => 'ciudad gotica',
            'telefono' => '789654',
            'observaciones' => 'es batman',
            'estado' => 'a',
            'id_tipo_vendedor' => 1
        );
        $this->vendedor_model->add($data);
        $vendedores = $this->vendedor_model->get_all();
        $this->assertEqual($vendedores[3]->nombre, 'Bruce');
        $this->assertEqual($vendedores[3]->direccion, 'ciudad gotica');
    }

    public function test_delete() {
        $this->vendedor_model->delete(4);
        $get_all = $this->vendedor_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all() {
        $get_all = $this->vendedor_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_by_cedula() {
        $cliente = $this->vendedor_model->get_by_cedula('1234567891');
        $this->assertEqual($cliente[0]->nombre, 'nombre1');
        $this->assertEqual($cliente[0]->direccion, 'ibarra');
    }

    public function test_get_all_by_estado() {
        $cliente = $this->vendedor_model->get_all_by_estado('a');
        $this->assertEqual($cliente[1]->apellido, 'apellido2');
        $this->assertEqual($cliente[1]->direccion, 'quito');
    }

}
