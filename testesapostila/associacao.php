<?php
	include_once 'fornecedor.php';
	include_once 'produto.php';
	// instancia Fornecedor
		$fornecedor = new Fornecedor;
		$fornecedor->codigo = 222;
		$fornecedor->razaoSocial= 'Alimentos S.A.';
		$fornecedor->endereco = 'Rua Julio de Castilhos';
		$fornecedor->cidade = 'Caxias do Sul';
	// instancia Produto
		$produto = new Produto;
		$produto->codigo = 111;
		$produto->descricao = 'Doce de Uva';
		$produto->preco = 30.55;
		$produto->fornecedor = $fornecedor;
	// imprime atributos
		echo 'Código :' . $produto->codigo . "\n";
		echo 'Descrição :' . $produto->descricao . "\n";
		echo 'Código :' . $produto->fornecedor->codigo . "\n";
		echo 'Razão Social :' . $produto->fornecedor->razaoSocial . "\n";
?>