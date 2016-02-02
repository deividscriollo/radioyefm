<?php

include_once('application/modules/clientes/models/Cliente_model.php');

class Test_Cliente_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('Cliente_model', 'cliente_modelo');

        $this->cliente_modelo->set_base_datos('unit_test');

        $clientes_sql = UNITTESTPATH . 'clientes.sql';
        $this->base_model->fixtureExecuter($clientes_sql);
    }

    public function test_add() {
        $data = array(
            'empresa' => 'nueva',
            'ruc' => '12345678912',
            'direccion' => 'direccion nueva',
            'observaciones' => 'observaciones',
            'estado' => 'a',
        );
        $this->cliente_modelo->add($data);
        $clientes = $this->cliente_modelo->get_all();
        $this->assertEqual($clientes[2]->empresa, 'nueva');
        $this->assertEqual($clientes[2]->direccion, 'direccion nueva');
    }

    public function test_delete() {
        $this->cliente_modelo->delete(3);
        $get_all = $this->cliente_modelo->get_all();
        $this->assertEqual(sizeof($get_all), 2);
    }

    public function test_get_all() {
        $get_all = $this->cliente_modelo->get_all();
        $this->assertEqual(sizeof($get_all), 2);
    }

    public function test_get_by_ruc() {
        $cliente = $this->cliente_modelo->get_by_ruc('123456');
        $this->assertEqual($cliente[0]->empresa, 'oye_fm');
        $this->assertEqual($cliente[0]->direccion, 'Ibarra');
    }

    public function test_get_all_by_estado() {
        $cliente = $this->cliente_modelo->get_all_by_estado('v');
        $this->assertEqual($cliente[0]->empresa, 'oye_fm');
        $this->assertEqual($cliente[0]->direccion, 'Ibarra');
    }

}
