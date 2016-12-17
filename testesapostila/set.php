<?php
	//inclui classe cachorro
	include_once 'cachorro.php';
		$toto = new Cachorro('Totô');
		$toto->nascimento = '3 de março'; // atribuição inválida
		$toto->nascimento = '10/04/2005'; // atribuição correta
?>