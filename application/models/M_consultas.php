<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_consultas extends CI_Model
{
    public function login($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('iccs_user');
        $this->db->where('user_usuario', $user);
        $this->db->where('user_pass', $pass);
        return $this->db->get();

    }

    public function ListaUsuarios()
    {
        $this->db->select('*');
        $this->db->from('iccs_user');
        return $this->db->get();

    }

    public function buscarProd($busqueda)
    {
        $this->db->select('*');
        $this->db->from('Productos');

        $this->db->or_like('P_Description', $busqueda);
        $this->db->or_like('P_CodeProduct', $busqueda);
        $this->db->or_like('P_Cbarras', $busqueda);

        return $this->db->get();

    }
}

/* End of file M_consultas.php */
