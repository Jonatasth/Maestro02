<?php
	// cria array dados_william
	$dados_william['nome'] = 'William Santos';
	$dados_wi11iam['idade'] = 20;
	$dados_william['profissão'] = 'Programador';
	// cria array dados_rafaela
	$dados_rafaela['nome'] = 'Rafaela Santos';
	$dados_rafaela['idade'] = 24;
	$dados_rafaela['profissão'] = 'Policial Militar';
	// cria objeto william
	$william = new stdClass;
		foreach ($dados_william as $chave => $valor)
		{
			// utiliza variáveis variantes
			$william->$chave = $valor;
		}
		// cria objeto rafaela
	$rafaela = new stdClass;
		foreach ($dados_rafaela as $chave => $valor)
		{
			// utiliza variáveis variantes
			$rafaela->$chave = $valor;
		}
	echo "{$william->nome} é {$william->profissão}\n";
	echo "{$rafaela->nome} é {$rafaela->profissão}\n";
?>