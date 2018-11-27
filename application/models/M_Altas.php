<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Altas extends CI_Model {

    public function IngresarUsuario($Marca)
    {
        if($Marca['pass'] == $Marca['repass'])
        {
            $this->db->query("INSERT INTO iccs_user(user_nombre,user_usuario,user_pass,user_nivel)
            SELECT '" . $Marca['usuario2'] . "','" . $Marca['usuario'] . "','" . $Marca['repass'] . "'," . $Marca['Tipo'] . "
            FROM dual
            WHERE NOT EXISTS (SELECT user_usuario FROM iccs_user WHERE user_usuario='" . $Marca['usuario'] . "' LIMIT 1)");
            if($this->db->affected_rows() > 0)
            {
                $resultado['mensaje']="Guardado correctamente";
            }else{
                $resultado['mensaje']="No se registraron cambios, usuario repetido";
            }
        }else{
            $resultado['mensaje']="No coinciden las contraseñas";
        }
        return $resultado;
    }
}
?>