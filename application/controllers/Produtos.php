<?php if ( !defined('BASEPATH')) exit ('No direct script acess allowed');

class Produtos extends CI_Controller {

    public function index()
    {
        $this->load->model("ProdutosModel");
        $produtos = $this->ProdutosModel->buscaTodos();
        
        $dados = array("produtos" => $produtos);
        $this->load->helper(array("currency"));
        $this->load->view("produtos/index", $dados);
    }

    public function formulario()
    {
        $this->load->view("produtos/formulario");
    }

    public function novo()
    {
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $produto = array(
            "nome" => $this->input->post("nome"),
            "descricao" => $this->input->post("descricao"),
            "preco" => $this->input->post("preco"),
            "usuario_id" => $usuarioLogado["id"]
        );
        $this->load->model("ProdutosModel");
        $this->ProdutosModel->salva($produto);
        $this->session->set_flashdata("success", "Produto salvo com sucesso.");
        redirect("/");
    }

}