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

    public function ListaSupervisor()
    {
        $this->db->select('P_CodeProduct,P_Description, P_Conteo1 + P_Conteo2 + P_Conteo3 as ConteoT ',false);
        $this->db->from('Productos');
        $this->db->where('P_CantidadCapturado >',0);
        return $this->db->get();
    }

    public function ListaAdministrador()
    {
        $this->db->select('P_CodeProduct,P_Description, P_Conteo1 + P_Conteo2 + P_Conteo3 as ConteoT,P_Apartado + P_Existencia as Exis,(P_Apartado + P_Existencia) - (P_Conteo1 + P_Conteo2 + P_Conteo3) as Diferencia ',false);
        $this->db->from('Productos');
        $this->db->where('P_CantidadCapturado >',0);
        return $this->db->get();
    }

    public function ListaSupervisorF($busqueda)
    {
        $this->db->select('P_CodeProduct,P_Description, P_Conteo1 + P_Conteo2 + P_Conteo3 as ConteoT ',false);
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $busqueda);
        $this->db->where('P_CantidadCapturado >',0);
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

    public function totalinicial($id)
    {
        $this->db->select('P_Conteo1');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_Conteo1;

    }
    public function catidadCapturado($id)
    {
        $this->db->select('P_CantidadCapturado');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_CantidadCapturado;
    }

    /////////////////////////////////////////////////////////////////////////////

    public function totalinicial_piking($id)
    {
        $this->db->select('P_Conteo2');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_Conteo2;

    }
    public function catidadCapturado_piking($id)
    {
        $this->db->select('P_CantidadCapturado');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_CantidadCapturado;
    }

    ///////////////////////////////////////////////////////////////////////////

    public function totalinicial_otros($id)
    {
        $this->db->select('P_Conteo3');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_Conteo3;

    }

    public function catidadCapturado_otros($id)
    {
        $this->db->select('P_CantidadCapturado');
        $this->db->from('Productos');
        $this->db->where('P_CodeProduct', $id);

        return $this->db->get()->result()[0]->P_CantidadCapturado;
    }
}

/* End of file M_consultas.php */
