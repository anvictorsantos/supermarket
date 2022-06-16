<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class MY_Loader extends CI_Loader
{
    public function template($nome, $dados = array())
    {
        $ci = &get_instance();
        $ci->load->view("cabecalho.php");
        $ci->load->view($nome, $dados);
        $ci->load->view("rodape.php");
    }
}
