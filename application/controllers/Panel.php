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
            $query['lista'] = $this->M_consultas->ListaAdministrador();
            $this->load->view('panel', $query);
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
            $query['lista'] = $this->M_consultas->ListaSupervisor();
            $this->load->view('Lista_Supervisor', $query);
        }else{ 
            redirect('', 'refresh');
        }
    }

    public function SupervisorFilter()
    {
        if ($this->session->userdata('logueado')) {
            $query['lista'] = $this->M_consultas->ListaSupervisorF($this->input->post('filtro'));
            $this->load->view('Lista_Supervisor', $query);
        }else{ 
            redirect('', 'refresh');
        }
    }

    public function FiltroAdmin()
    {
    $informacion=$this->M_consultas->ListaAdministrador($_POST['caja']);
    echo <<<EOT
    <table class="table table-striped">
        <thead>
            <tr>
              <td><b>Código</b></td>
              <td><b>Descripción</b></td>
              <td><b>Crescendo</b></td>
              <td><b>Conteo Actual</b></td>
              <td><b>Diferencia</b></td>
            </tr>
          </thead>
          <tbody>
EOT;
foreach ($informacion->result() as $key => $data) {
    ?>
        <tr>
            <td><?= $data->P_CodeProduct ?></td>
            <td><?= $data->P_Description ?></td>
            <td><?= $data->Exis ?></td>
            <td><?= $data->ConteoT ?></td>
            <td><?= $data->Diferencia ?></td>
          </tr>
<?php
}
echo "</tbody></table>";
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
              <th scope="col">Resguardo</th>
              <th scope="col">Piking</th>
              <th scope="col">Otros</th>
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
                        <td><a class="btn btn-primary btn-sm" href="' . base_url('Panel/captura_prod/') . $key->P_CodeProduct . '" role="button">Resguardo</a></td>
                        <td><a class="btn btn-primary btn-sm" href="' . base_url('Panel/capt_pikin/') . $key->P_CodeProduct . '" role="button">Piking</a></td>
                        <td><a class="btn btn-primary btn-sm" href="' . base_url('Panel/capt_otros/') . $key->P_CodeProduct . '" role="button">Otros</a></td>
                      </tr>
                        ';
            }

            echo '
                    </tbody>
                  </table>
                    ';
        }

    }
///////////////////////////////////////////////////////////////////////////////////////////////
    public function captura_prod($id)
    {
        if ($this->session->userdata('logueado')) {
            $data['id'] = trim($id);
            $this->load->view('captura_real', $data);

        } else {
            redirect('', 'refresh');
        }
    }

    public function set_caprura_prod()
    {
        $id = trim($this->input->post('id'));
        $conteo1 = $this->input->post('conteo1');

        $totalinicial = $this->M_consultas->totalinicial($id);
        $catidadCapturado = $this->M_consultas->catidadCapturado($id);

        $this->M_update->set_conteo($id, $conteo1, $totalinicial, $catidadCapturado);

        redirect('Panel/Captura', 'refresh');

    }
///////////////////////////////////////////////////////////////////////////////////////////////////

    public function capt_pikin($id)
    {
        if ($this->session->userdata('logueado')) {
            $data['id'] = trim($id);
            $this->load->view('captura_piking', $data);

        } else {
            redirect('', 'refresh');
        }
    }

    public function set_caprura_prod_piking()
    {
        $id = trim($this->input->post('id'));
        $conteo1 = $this->input->post('conteo1');

        $totalinicial = $this->M_consultas->totalinicial_piking($id);
        $catidadCapturado = $this->M_consultas->catidadCapturado_piking($id);

        $this->M_update->set_conteo_piking($id, $conteo1, $totalinicial, $catidadCapturado);

        redirect('Panel/Captura', 'refresh');

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function capt_otros($id)
    {
        if ($this->session->userdata('logueado')) {
            $data['id'] = trim($id);
            $this->load->view('captura_otros', $data);

        } else {
            redirect('', 'refresh');
        }
    }

    public function set_caprura_prod_otros()
    {
        $id = trim($this->input->post('id'));
        $conteo1 = $this->input->post('conteo1');

        $totalinicial = $this->M_consultas->totalinicial_otros($id);
        $catidadCapturado = $this->M_consultas->catidadCapturado_otros($id);

        $this->M_update->set_conteo_otros($id, $conteo1, $totalinicial, $catidadCapturado);

        redirect('Panel/Captura', 'refresh');

    }

}

/* End of file Panel.php */
