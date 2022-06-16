<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class Vendas extends CI_Controller
{
    public function nova()
    {
        $usuario = $this->session->userdata("usuario_logado");

        $this->load->helper("date");
        $this->load->model("VendasModel");
        $venda = array(
            "produto_id" => $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" => dataPtBrParaMysql($this->input->post("data_de_entrega"))
        );
        $this->VendasModel->salva($venda);
        $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso.");
        redirect("/");
    }
}
