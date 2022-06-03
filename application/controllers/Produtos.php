<?php if ( !defined('BASEPATH')) exit ('No direct script acess allowed');

class Produtos extends CI_Controller {

    public function index()
    {
        $this->load->model("ProdutosModel");
        $produtos = $this->ProdutosModel->buscaTodos();
        
        $dados = array("produtos" => $produtos);
        $this->load->helper(array("url", "currency", "form"));
        $this->load->view("produtos/index", $dados);
    }

}