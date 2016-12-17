<?php
class Fornecedor
{
	var $codigo;
	var $razaoSocial;
	var $endereco;
	var $cidade;
	var $contato;
	//método construtor
	function __construct(){
		//instancia novo Contato
		$this->contato = new Contato;
	}
	//grava contato
	function SetContato($nome, $telefone, $email)
	{
		//delega chamada de método
		$this->contato->SetContato($nome, $telefone, $email);
	}
	//retorna contato
	function GetContato()
	{
	//delega chamada de método
	return $this->contato->GetContato();
	}
	
}
?>