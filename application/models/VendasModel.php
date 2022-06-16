<?php

class VendasModel extends CI_Model
{
    public function salva($venda)
    {
        $this->db->insert("vendas", $venda);
    }
}
