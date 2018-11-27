<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_consultas');
        $this->load->model('M_Altas');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }
    public function iniciosesion()
    {
        $usuario = $this->input->post('usuario');
        $pass = $this->input->post('pass');
        $query = $this->M_consultas->login($usuario, $pass);

        foreach ($query->result() as $key) {

            $usuario = array(
                'ID' => $key->user_ID,
                'usuario' => $key->user_usuario,
                'nombre' => $key->user_nombre,
                'nivel_user' => $key->user_nivel,
                'logueado' => true,
            );

            $this->session->set_userdata($usuario);

            redirect('Panel', 'refresh');

        }

        redirect('Welcome', 'refresh');

    }

    public function GuardarUsuario()
    {
        $marca=array(
            'usuario' => $this->input->post('usuario'),
            'usuario2' => $this->input->post('usuario2'),
            'pass' => $this->input->post('pass'),
            'repass' => $this->input->post('repass'),
            'Tipo' => $this->input->post('Tipo'),
        );
        $this->session->set_flashdata('mensajes_form', $this->M_Altas->IngresarUsuario($marca)['mensaje']);
        
        redirect('Panel/Usuarios','refresh');
        
    }

}
