<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_update extends CI_Model
{
    public function set_conteo($id, $conteo, $totalinicia, $catidadCapturado)
    {

        $this->db->trans_begin();

        $data = array(
            'actualiza_clave_Producto' => $id,
            'actualiza_ID_User' => $this->session->userdata('ID'),
            'actualiza_Tipo' => 'RESGUARDO',
        );
        $this->db->insert('actualizaciones_productos', $data);

        $this->db->set('P_FechaMod', 'now()', false);
        $this->db->set('P_IdUserMod', $this->session->userdata('ID'));
        $this->db->set('P_Conteo1', $totalinicia + $conteo);
        $this->db->set('P_CantidadCapturado', $catidadCapturado + 1);
        $this->db->where('P_CodeProduct', $id);
        $this->db->update('Productos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-danger" role="alert">
            Error al intentar guardar
            </div>
            ');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-success" role="alert">
            Actualizado correctamente
            </div>
            ');
        }

    }

    public function set_conteo_piking($id, $conteo, $totalinicia, $catidadCapturado)
    {

        $this->db->trans_begin();

        $data = array(
            'actualiza_clave_Producto' => $id,
            'actualiza_ID_User' => $this->session->userdata('ID'),
            'actualiza_Tipo' => 'PIKING',
        );
        $this->db->insert('actualizaciones_productos', $data);

        $this->db->set('P_FechaMod', 'now()', false);
        $this->db->set('P_IdUserMod', $this->session->userdata('ID'));
        $this->db->set('P_Conteo2', $totalinicia + $conteo);
        $this->db->set('P_CantidadCapturado', $catidadCapturado + 1);
        $this->db->where('P_CodeProduct', $id);
        $this->db->update('Productos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-danger" role="alert">
            Error al intentar guardar
            </div>
            ');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-success" role="alert">
            Actualizado correctamente
            </div>
            ');
        }

    }

    public function set_conteo_otros($id, $conteo, $totalinicia, $catidadCapturado, $descripcion)
    {

        $this->db->trans_begin();

        $data = array(
            'actualiza_clave_Producto' => $id,
            'actualiza_ID_User' => $this->session->userdata('ID'),
            'actualiza_Tipo' => 'OTROS',
            'actualiza_descripcion_otros' => $descripcion,
        );
        $this->db->insert('actualizaciones_productos', $data);

        $this->db->set('P_FechaMod', 'now()', false);
        $this->db->set('P_IdUserMod', $this->session->userdata('ID'));
        $this->db->set('P_Conteo3', $totalinicia + $conteo);
        $this->db->set('P_CantidadCapturado', $catidadCapturado + 1);
        $this->db->where('P_CodeProduct', $id);
        $this->db->update('Productos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-danger" role="alert">
            Error al intentar guardar
            </div>
            ');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('mensaje', '
            <div class="alert alert-success" role="alert">
            Actualizado correctamente
            </div>
            ');
        }

    }

}

/* End of file M_update.php */
