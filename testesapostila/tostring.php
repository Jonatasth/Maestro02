<?php
class Cachorro
	{
		private $nascimento;
		//método construtor
		function __construct($nome)
			{
				$this->nome = $nome;
			}
		//tostring, executado sempre que o objeto for impresso
		function __tostring()
			{
				return $this->nome;
			}
	}
	$toto = new Cachorro('Totó');
	$vava = new Cachorro('Vava');	
	
	echo $toto;
	echo "\n";
	echo $vava;
	echo "\n";
?>