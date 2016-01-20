<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

    public function todos() {
        return $this->db->query('select * from usuarios')->result_array();
    }

    public function borrar($id) {
        return $this->db->query('delete from usuarios where id = ?', array($id));
    }

    public function por_id($id) {
        $res = $this->db->query('select * from usuarios where id =?', array($id));
        return ($res->num_rows()) ? $res->row_array() : FALSE;
    }

}
