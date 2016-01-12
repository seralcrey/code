<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller
{

    public function index()
    {
        $data['filas'] = $this->db->query('select * from articulos ')->result_array();
        $this->load->view('articulos/index', $data);
    }

    public function borrar($id)
    {
        $data['id'] = $id;
        $this->load->view('articulos/borrar',$data);
    }
    
    public function hacer_borrado()
    {
        $id = $this->input->post('id');
        $res = $this->db->query('delete from articulos where id = ?', array($id));
        redirect('articulos/index');
    }
}
