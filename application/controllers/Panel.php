<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_consultas');
        $this->load->model('M_Altas');
        $this->load->model('M_update');
    }
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
            $this->load->view('captura');

        } else {
            redirect('', 'refresh');
        }
    }
    public function Usuarios()
    {
        if ($this->session->userdata('logueado')) {
            $query['lista'] = $this->M_consultas->ListaUsuarios();
            $this->load->view('Captura_Usuario', $query);
        } else {
            redirect('', 'refresh');
        }
    }
    public function Supervisor()
    {
        if ($this->session->userdata('logueado')) {

        } elseif ($this->session->userdata('logueado')) {
            redirect('Panel/Captura', 'refresh');
        } else {
            redirect('', 'refresh');
        }
    }

    public function buscar()
    {
        $buscar = $this->input->post('valorBusqueda');
        if ($buscar == '') {
            echo 'Vacio';
        } else {
            $query = $this->M_consultas->buscarProd($buscar);

            echo '
                    <table class="table">
          <thead>
            <tr>
              <th scope="col">Codigo Producto</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Localizacion</th>
              <th scope="col">Unidad</th>
              <th scope="col">Resguardo</th>
              <th scope="col">Accion</th>
            </tr>
          </thead>
          <tbody>';
            foreach ($query->result() as $key) {
                echo '
                        <tr>
                        <th scope="row">' . $key->P_CodeProduct . '</th>
                        <td>' . $key->P_Description . '</td>
                        <td>' . $key->P_Localizacion . '</td>
                        <td>' . $key->P_Unidad . '</td>
                        <td>' . $key->P_Resguardo . '</td>
                        <td><a class="btn btn-primary btn-sm" href="' . base_url('Panel/captura_prod/') . $key->P_CodeProduct . '" role="button">Capturar</a></td>
                      </tr>
                        ';
            }

            echo '
                    </tbody>
                  </table>
                    ';
        }

    }

    public function captura_prod($id)
    {
        if ($this->session->userdata('logueado')) {
            $data['id'] = $id;
            $this->load->view('captura_real', $data);

        } else {
            redirect('', 'refresh');
        }
    }

    public function set_caprura_prod()
    {
        $id = $this->input->post('id');
        $conteo1 = $this->input->post('conteo1');

        $afectado = $this->M_update->set_conteo($id, $conteo1);
        if ($afectado > 0) {
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-success" role="alert">
            Actualizado correctamente
            </div>
            ');

        } else {
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-danger" role="alert">
            Error al intentar guardar
            </div>
            ');
        }

        redirect('Panel/Captura', 'refresh');

    }

}

/* End of file Panel.php */
