<?php
function Abrir($file = null)
{
	if(!$file)
	{
		return false;
	}
	if(!file_exists($file))
	{
		return false;
	}
	if(!$retorno = @file_get_contents($file))
	{
		return false;
	}	
	return $retorno;
}
	
$arquivo = Abrir('/tmp/arquivo.dat'); //ou $arquivo = Abrir('readme.txt'); ai vai ser true e vai imprimir na tela!
// verificando se abriu o arquivo.
if(!$arquivo)
{
	echo 'Falha ao abrir o arquivo';
}
else
	{
		echo $arquivo;
	}
	
?>