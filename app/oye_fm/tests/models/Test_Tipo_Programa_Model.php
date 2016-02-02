<?php

include_once('application/modules/programas/models/Tipo_programa_model.php');

class Test_Tipo_Programa_Model extends CodeIgniterUnitTestCase {

    public function __construct() {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('tipo_programa_model');

        $this->tipo_programa_model->set_base_datos('unit_test');

        $tipo_vendedor = UNITTESTPATH . 'tipo_programa.sql';
        $this->base_model->fixtureExecuter($tipo_vendedor);
    }

    public function test_add() {
        $data = array(
            'nombre' => 'Supervisado',
            'categoria' => 'B',
            'observaciones' => 'ninguna',
            'estado' => 'a',
        );
        $this->tipo_programa_model->add($data);
        $tipos = $this->tipo_programa_model->get_all();
        $this->assertEqual($tipos[3]->nombre, 'Supervisado');
        $this->assertEqual($tipos[3]->observaciones, 'ninguna');
    }

    public function test_delete() {
        $this->tipo_programa_model->delete(4);
        $get_all = $this->tipo_programa_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all() {
        $get_all = $this->tipo_programa_model->get_all();
        $this->assertEqual(sizeof($get_all), 3);
    }

    public function test_get_all_by_estado() {
        $tipos = $this->tipo_programa_model->get_all_by_estado('a');
        $this->assertEqual($tipos[1]->nombre, 'Informativo');
        $this->assertEqual($tipos[1]->observaciones, 'noticias');
    }

}
