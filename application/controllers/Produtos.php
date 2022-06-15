<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class Produtos extends CI_Controller
{

    public function mostra($id)
    {
        $this->load->model("ProdutosModel");
        $produto = $this->ProdutosModel->busca($id);

        $dados = array("produto" => $produto);
        $this->load->helper("typography");
        $this->load->view("produtos/mostra", $dados);
    }

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
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nome", "nome", "required|min_length[5]|callback_nao_tenha_a_palavra_melhor");
        $this->form_validation->set_rules("descricao", "descrição", "trim|required|min_length[10]");
        $this->form_validation->set_rules("preco", "preço", "required");
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $sucesso = $this->form_validation->run();
        if ($sucesso) {
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
        } else {
            $this->load->view("produtos/formulario");
        }
    }

    public function nao_tenha_a_palavra_melhor($nome)
    {
        $posicao = strpos($nome, "melhor");
        if ($posicao != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message(
                "nao_tenha_a_palavra_melhor",
                "O campo '%s' não pode conter a palavra 'melhor'"
            );
            return FALSE;
        }
    }
}
