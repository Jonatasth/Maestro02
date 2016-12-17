<?php
class Biblioteca
{
	const Nome = "Sistema ";
}
class Aplicacao extends Biblioteca
{
	// declaração das constantes
	const Ambiente = "Maestro ";
	const Versão = "1.0.0.1";
	/* método construtor
	 * acessa as constantes internamente
	 */
	function __construct($Nome)
	{
		echo parent::Nome . self::Ambiente . self::Versão . $Nome . "\n";
	}
	}
	// acessa as constantes externamente
	echo Biblioteca::Nome . Aplicacao::Ambiente . Aplicacao::Versão . "\n";
	new Aplicacao(' 2016');
	new Aplicacao(' 2017');
	?>