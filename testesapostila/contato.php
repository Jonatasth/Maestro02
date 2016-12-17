<?php
class Contato
{
	var $nome;
	var $telefone;
	var $email;
	//grava informações de contato
	function SetContato($nome, $telefone, $email)
	{
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->email = $email;
	}
	//obtém informações de contato
	function GetContato()
	{
		return "Nome: {$this->nome}, Telefone: {$this->telefone}, Email: {$this->email}";
	}
	}
?>