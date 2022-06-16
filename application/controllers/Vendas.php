<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class Vendas extends CI_Controller
{
    public function nova()
    {
        $usuario = autoriza();

        $this->load->model("VendasModel");
        $this->load->model("ProdutosModel");
        $this->load->model("UsuariosModel");
        $venda = array(
            "produto_id" => $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" => dataPtBrParaMysql($this->input->post("data_de_entrega"))
        );
        $this->VendasModel->salva($venda);

        $this->load->library("email");
        $config["protocolo"] = "smtp";
        $config["smtp_host"] = "ssl://smtp.gmail.com";
        $config["smtp_user"] = "codeigniteralura@gmail.com";
        $config["smtp_pass"] = "123456";
        $config["charset"] = "utf-8";
        $config["mailtype"] = "html";
        $config["newline"] = "\r\n";
        $config["smtp_port"] = "465";
        $this->email->initialize($config);

        $produto = $this->ProdutosModel->busca($venda["produto_id"]);
        $vendedor = $this->UsuariosModel->busca($venda["usuario_id"]);

        $dados = array("produto" => $produto);
        $conteudo = $this->load->view("vendas/email.php", $dados, TRUE);

        $this->email->from("codeigniteralura@gmail.com", "Mercado");
        $this->email->to(array($vendedor["email"]));
        $this->email->subject("Seu produto {$produto['id']} foi vendido");
        $this->email->message($conteudo);
        $this->email->send();

        $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso.");
        redirect("/");
    }

    public function index()
    {
        $usuario = autoriza();
        $this->load->model("ProdutosModel");
        $produtosVendidos = $this->ProdutosModel->buscaVendidos($usuario);
        $dados = array("produtosVendidos" => $produtosVendidos);
        $this->load->view("vendas/index", $dados);
    }
}
