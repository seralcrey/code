<?php if( !defined('BASEPATH')) exist('No direct script access alloweb');

class Template
{
    public function load($vista, $data = array(), $data_template = array(), $template = 'template')
    {
        $CI =& get_instance();
        $data_template['contents'] = $CI->load->view($vista, $data, TRUE);
        $CI->load->view($template, $data_template);
        
    }
}

