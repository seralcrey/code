<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function index() {
        $data['filas'] = $this->Usuario->todos();
        $this->template->load('usuarios/index', $data, 
                array('title' => 'Listado de usuarios'));
    }
    
    public function borrar($id = NULL) {
        if ($this->input->post('borrar') !== NULL) {
            $id = $this->input->post('id');
            if ($id !== NULL) {
                $res = $this->Usuario->borrar($id);
            }
            redirect('usuarios/index');
        } else {
            if ($id === NULL) {
                redirect('usuarios/index');
            } else {
                $res = $this->Usuario->por_id($id);
                if ($res === FALSE) {
                    redirect('usuarios/index');
                } else {
                    $data = $res;
                    $this->template->load('usuarios/borrar', $data);
                }
            }
        }
    }
    
}
