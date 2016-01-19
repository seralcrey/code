<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

    private $reglas_comunes = array(
        array(
            'field' => 'codigo', //nombre del campo
            'label' => 'Código', //lo que se ve
            'rules' => 'trim|required|ctype_digit|max_length[13]', //reglas
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

    public function index() {
        $data['filas'] = $this->Articulo->todos();
        $this->template->load('articulos/index', $data, 
                array('title' => 'Listado de artículos'));
    }

    public function insertar() {
        if ($this->input->post('insertar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $reglas[0]['rules'] .= '|is_unique[articulos.codigo]';

            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->input->post();
                $valores = $this->limpiar('editar', $valores);
                $res = $this->Articulo->insertar($valores);
                redirect('articulos/index');
            }
        }
        $this->template->load('articulos/insertar');
    }

    public function editar($id = NULL) {
        if ($id === NULL) {
            redirect('articulos/index');
        }
        $id = trim($id);
        if ($this->input->post('editar') !== NULL) {
            $reglas = $this->reglas_comunes;
            $reglas[0]['rules'] .= "|callback__codigo_unico[$id]";
            $this->form_validation->set_rules($reglas);
            if ($this->form_validation->run() !== FALSE) {
                $valores = $this->limpiar('editar', $this->input->post());
                $this->Articulo->editar($valores, $id);
                redirect('articulos/index');
            }
        }
        $valores = $this->Articulo->por_id($id);
        if ($valores === FALSE) {
            redirect('articulos/index');
        }
        $data = $valores;
        $this->template->load('articulos/editar', $data);
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
                    $this->template->load('articulos/borrar', $data);
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

    private function limpiar($accion, $valores) {
        unset($valores[$accion]);
        if ($valores['existencias'] === '') {
            $valores['existencias'] = NULL;
            return $valores;
        }
    }

}
