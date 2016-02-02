<?php

include_once('application/modules/programas/models/Programa_model.php');

class Test_Programas_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('programa_model');

        $this->programa_model->set_base_datos('unit_test');

        $tipo_programa = UNITTESTPATH . 'tipo_programa.sql';
        $this->base_model->fixtureExecuter($tipo_programa);

        $programas = UNITTESTPATH . 'programas.sql';
        $this->base_model->fixtureExecuter($programas);
    }

    public function test_add() {
        $data = array(
            'nombre' => 'nueva',
            'observaciones' => 'observaciones',
            'estado' => 'a',
            'id_tipo_programa' => 1
        );
        $this->programa_model->add($data);
        $programas = $this->programa_model->get_all();
        $this->assertEqual($programas[2]->nombre, 'nueva');
        $this->assertEqual($programas[2]->observaciones, 'observaciones');
    }

    public function test_delete() {
        $this->programa_model->delete(4);
        $get_all = $this->programa_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all() {
        $get_all = $this->programa_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all_by_estado() {
        $programas = $this->programa_model->get_all_by_estado('a');
        $this->assertEqual($programas[1]->nombre, 'rock');
        $this->assertEqual($programas[1]->observaciones, 'en la noche');
    }

}
