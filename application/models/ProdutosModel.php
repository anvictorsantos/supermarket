<?php

class ProdutosModel extends CI_Model
{

	public function busca($id)
	{
		return $this->db->get_where("produtos", array(
			"id" => $id
		))->row_array();
	}

	public function buscaTodos()
	{
		return $this->db->get("produtos")->result_array();
	}

	public function salva($produto)
	{
		$this->db->insert("produtos", $produto);
	}
}
