<?php if ( !defined('BASEPATH')) exit ('No direct script acess allowed');

class Login extends CI_Controller {

    public function autenticar()
    {
        $this->load->model("UsuariosModel");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->UsuariosModel->buscaPorEmailESenha($email, $senha);
        
        if($usuario) {
            $this->session->set_userdata("usuario_logado", $usuario);
            $dados = array("mensagem" => "Logado com sucesso!");
        } else {
            $dados = array("mensagem" => "Usuário ou senha inválida.");
        }
        
        redirect('/');
    }

    public function logout() 
    {
        $this->session->unset_userdata("usuario_logado");
        $this->load->helper(array("url", "form"));
        $this->load->view("login/logout");
    }

}