<?php
	class Aplicacao
	{
		static $quantidade;
		/* método Construtor
		* incrementa a $quantidade de Aplicações
		*/
		function __construct($nome)
		{
		// incrementa propriedade estática
		self::$quantidade ++;
		$i = self::$quantidade ;
		echo "Nova Aplicação nr. $i: $nome\n";
		}
	}
	# cria novos objetos
	new Aplicacao('Básico');
	new Aplicacao('Profissional');
	new Aplicacao('Negocios');
	echo 'Quantidade de Aplicações = ' . Aplicacao::$quantidade . "\n";
?>