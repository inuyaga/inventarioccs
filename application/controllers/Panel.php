<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('logueado') && $this->session->userdata('nivel_user') == 1) {
            $this->load->view('panel');
        } elseif ($this->session->userdata('logueado')) {
            redirect('Panel/Captura', 'refresh');
        } else {
            redirect('', 'refresh');
        }

    }

    public function salir()
    {
        $this->session->sess_destroy();

        redirect('', 'refresh');

    }

    public function Captura()
    {
        if ($this->session->userdata('logueado')) {
            $this->load->view('panel');
        } else {
            redirect('', 'refresh');
        }
    }
    public function Usuarios()
    {
        if ($this->session->userdata('logueado') && $this->session->userdata('nivel_user') == 1) {

        } elseif ($this->session->userdata('logueado')) {
            redirect('Panel/Captura', 'refresh');
        } else {
            redirect('', 'refresh');
        }
    }
    public function Supervisor()
    {
        if ($this->session->userdata('logueado') && ($this->session->userdata('nivel_user') == 2 || $this->session->userdata('nivel_user') == 1)) {

        } elseif ($this->session->userdata('logueado')) {
            redirect('Panel/Captura', 'refresh');
        } else {
            redirect('', 'refresh');
        }
    }

}

/* End of file Panel.php */
