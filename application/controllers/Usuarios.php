<?php if ( !defined('BASEPATH')) exit ('No direct script acess allowed');

class Usuarios extends CI_Controller {
    public function novo()
    {
        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );

        $this->load->model("UsuariosModel");
        $this->UsuariosModel->salva($usuario);
        $this->load->helper(array("form"));
        $this->load->view("usuarios/novo");
    }
}
