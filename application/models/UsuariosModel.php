<?php

class UsuariosModel extends CI_Model {
    public function salva($usuario)
    {
        $this->db->insert("Usuarios", $usuario);
    }

    public function buscaPorEmailESenha($email, $senha)
    {
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }
}