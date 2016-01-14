<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function index() {
        $data['filas'] = $this->Articulo->todos();
        $this->load->view('articulos/index', $data);
    }

    public function insertar() {
        if ($this->input->post('insertar') !== NULL) {
            $valores = $this->input->post();
            unset($valores['insertar']);
            $res = $this->Articulo->insertar($valores);
            redirect('articulos/index');
        } else {
            $this->load->view('articulos/insertar');
        }
        
    }

    public function borrar($id = NULL) {
        if ($this->input->post('borrar') !== NULL) {
            $id = $this->input->post('id');
            if ($id !== NULL) {
                $res = $this->Articulo->borrar($id);
            }
            redirect('articulos/index');
        } else {
            if ($id === NULL) {
                redirect('articulos/index');
            } else {
                $res = $this->Articulo->por_id($id);
                if ($res === FALSE) {
                    redirect('articulos/index');
                } else {
                    $data = $res;
                    $this->load->view('articulos/borrar', $data);
                }
            }
        }
    }

}
