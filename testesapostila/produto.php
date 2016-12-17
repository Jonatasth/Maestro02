<?php
class Produto
{
var $codigo;
var $descricao;
var $quantidade;
var $fornecedor;
private $preco;

const MARGEM = 10;
//método construtor de um Produto
function __construct($codigo, $descricao, $quantidade, $preco)
{
	$this->codigo = $codigo;
	$this->descricao = $descricao;
	$this->quantidade= $quantidade;
	$this->preco = $preco;
}
//intercepta a chamada à métodos
function __call($metodo, $parametros)
{
	echo "Você executou o método: {$metodo}\n";
	foreach ($parametros as $key => $parametro)
	{
		echo "\tParâmetro $key: $parametro\n";
	}
}
}
?>