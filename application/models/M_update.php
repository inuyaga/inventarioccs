<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_update extends CI_Model
{
    public function set_conteo($id, $conteo)
    {

        $this->db->set('P_FechaMod', 'now()', false);
        $this->db->set('P_IdUserMod', $this->session->userdata('ID'));
        $this->db->set('P_Conteo1', 'P_Conteo1 + ' . $conteo, false);
        $this->db->set('P_CantidadCapturado', 'P_CantidadCapturado + 1', false);
        $this->db->where('P_CodeProduct', $id);
        $this->db->update('Productos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

        return $this->db->affected_rows();

    }
}

/* End of file M_update.php */
