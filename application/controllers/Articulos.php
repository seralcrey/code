<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    public function index() {
        $data['filas'] = $this->Articulo->todos();
        $this->load->view('articulos/index', $data);
    }

    public function insertar() {
        if ($this->input->post('insertar') !== NULL) {
            $reglas = array(
                array(
                    'field' => 'codigo', //nombre del campo
                    'label' => 'Código', //lo que se ve
                    'rules' => 'trim|required|ctype_digit|max_length[13]|is_unique[articulos, codigo]', //reglas
                    'errors' => array(
                        'ctype_digit' => 'El campo %s debe conetener sólo digitos.'
                    )
                ),
                array(
                    'field' => 'nombre', //nombre del campo
                    'label' => 'Nombre', //lo que se ve
                    'rules' => 'trim|required|max_length[50]' //reglas
                ),
                array(
                    'field' => 'precio', //nombre del campo
                    'label' => 'Precio', //lo que se ve
                    'rules' => 'trim|required|numeric|less_than_equal_to[9999.99]' //reglas
                ),
                array(
                    'field' => 'existencias', //nombre del campo
                    'label' => 'Existencias', //lo que se ve
                    'rules' => 'trim|integer|greater_than_equal_to[-2147483648]|less_than_equal_to[2147483648]' //reglas
                )
            );
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->input->post();
                unset($valores['insertar']);
                $res = $this->Articulo->insertar($valores);
                redirect('articulos/index');
            }
        }
        $this->load->view('articulos/insertar');
    }

    public function editar($id = NULL) {
        $id = trim($id);

        if ($id == NULL) {
            redirect('articulos/index');
        }

        if ($this->input->post('editar') !== NULL) {
            $reglas = array(
                array(
                    'field' => 'codigo', //nombre del campo
                    'label' => 'Código', //lo que se ve
                    'rules' => "trim|required|ctype_digit|max_length[13]|callback__codigo_unico[$id]", //reglas
                    'errors' => array(
                        'ctype_digit' => 'El campo %s debe conetener sólo digitos.'
                    )
                ),
                array(
                    'field' => 'nombre', //nombre del campo
                    'label' => 'Nombre', //lo que se ve
                    'rules' => 'trim|required|max_length[50]' //reglas
                ),
                array(
                    'field' => 'precio', //nombre del campo
                    'label' => 'Precio', //lo que se ve
                    'rules' => 'trim|required|numeric|less_than_equal_to[9999.99]' //reglas
                ),
                array(
                    'field' => 'existencias', //nombre del campo
                    'label' => 'Existencias', //lo que se ve
                    'rules' => 'trim|integer|greater_than_equal_to[-2147483648]|less_than_equal_to[2147483648]' //reglas
                )
            );
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->input->post();
                unset($valores['editar']);
                $res = $this->Articulo->editar($valores, $id);
                redirect('articulos/index');
            }
        }

        $valores = $this->Articulo->por_id($id);
        if ($valores !== FALSE) {
            $data = $valores;
            $this->load->view('articulos/editar', $data);
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

    public function _codigo_unico($codigo, $id) {
        $res = $this->Articulo->por_codigo($codigo);

        if ($res === false OR $res['id'] === $id) {
            return TRUE;
        } else {
            $this->form_validation->set_message('_codigo_unico', 'El {field} debe ser único');
            return false;
        }
    }

}
