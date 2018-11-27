<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function index()
    {
        $this->load->view('panel');
    }

    public function salir()
    {
        $this->session->sess_destroy();

        redirect('', 'refresh');

    }

    public function Captura()
    {

    }
    public function Usuarios()
    {

    }
    public function Supervisor()
    {

    }

}

/* End of file Panel.php */
