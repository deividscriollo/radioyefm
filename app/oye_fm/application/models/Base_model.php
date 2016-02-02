<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends CI_Model {

    protected $base_datos;
    protected $tabla;
    protected $conexion;

    public function __construct() {
        parent::__construct();
    }

    public function set_tabla($tabla) {
        $this->tabla = $tabla;
    }

    public function get_tabla() {
        return $this->tabla;
    }

    public function set_base_datos($base_datos) {
        $this->base_datos = $base_datos;
    }

    public function fixtureExecuter($fileDir) {
        $this->db->query('use oye_fm_unit_test');
        $sql = file_get_contents($fileDir);
        $arraySql = explode(";", $sql);
        foreach ($arraySql as $sqlSentence) {
            $sqlSentence = trim($sqlSentence);
            if (!empty($sqlSentence)) {
                $this->db->query($sqlSentence);
            }
        }
    }

    public function count_all() {
        $this->control_conexion();
        $result = $this->conexion->count_all($this->tabla);
        $this->conexion->close();
        return $result;
    }

    public function get_all_limit($limit = 10, $offset = 0) {
        $this->control_conexion();
        $query = $this->conexion->get($this->tabla, $limit, $offset);
        $result = $query->result();
        $this->conexion->close();
        return $result;
    }

    public function get_all() {
        $this->control_conexion();
        $query = $this->conexion->get($this->tabla)->result();
        $this->conexion->close();
        return $query;
    }

    public function get_by_id($id) {
        $this->control_conexion();
        $this->conexion->where('id', $id);
        $result = $this->conexion->get($this->tabla)->result();
        $this->conexion->close();
        return $result;
    }

    public function add($data) {
        $this->control_conexion();
        $this->conexion->insert($this->tabla, $data);
        $id = $this->conexion->insert_id();
        $this->conexion->close();
        return $id;
    }

    public function update($id, $data) {
        $this->control_conexion();
        $this->conexion->where('id', $id);
        $this->conexion->update($this->tabla, $data);
        $this->conexion->close();
    }

    public function delete($id) {
        $this->control_conexion();
        $this->conexion->where('id', $id);
        $this->conexion->delete($this->tabla);
        $this->conexion->close();
    }

    public function execute_query($query) {
        $this->control_conexion();
        $result = $this->conexion->query($query)->result();
        $this->conexion->close();
        return $result;
    }

    public function control_conexion() {
        $this->conexion = $this->load->database($this->base_datos, TRUE);
        if (!$this->conexion->initialize()) {
            exit('ERROR DATABASE');
        }
    }

    public function delete_by_field($field, $value) {
        $this->control_conexion();
        $this->conexion->where($field, $value);
        $this->conexion->delete($this->tabla);
        $this->conexion->close();
    }

    public function add_batch($data) {
        $this->control_conexion();
        $this->conexion->insert_batch($this->tabla, $data);
        $id = $this->conexion->insert_id();
        $this->conexion->close();
        return $id;
    }

    public function update_by_fields($fields, $data) {
        $this->control_conexion();
        foreach ($fields as $field) {
            $this->conexion->where($field, $data[$field]);
        }
        $this->conexion->update($this->tabla, $data);
        $this->conexion->close();
    }

    public function get_by_last_field($field) {
        $this->control_conexion();
        $this->conexion->select_max($field);
        $result = $this->conexion->get($this->tabla)->result();
        $this->conexion->close();
        return $result[0]->$field;
    }

    public function delete_by_fields($fields) {
        $this->control_conexion();
        foreach ($fields as $field => $valor) {
            $this->conexion->where($field, $valor);
        }
        $this->conexion->delete($this->tabla);
    }

    public function delete_all() {
        $this->control_conexion();
        $this->conexion->empty_table($this->tabla);
        $this->conexion->close();
    }

    public function registros_repetidos($campo, $texto, $id) {
        $this->control_conexion();
        $this->conexion->where($campo, $texto);
        $this->conexion->where('id !=', $id);
        $query = $this->conexion->get($this->tabla);
        $this->conexion->close();
        return ($query->num_rows() >= 1);
    }

}
