<?php
function Abrir($file = null)
{
	if(!$file)
	{
		throw new ParameterException('Falta o parâmetro com o nome do
arquivo');
	}
	if(!file_exists($file))
	{
		throw new FileNotFoundException('Arquivo não existente');
	}
	if(!$retorno = @file_get_contents($file))
	{
		throw new FilePermissionException('Impossivel ler o arquivo');
	}
	return Sretorno;
}
// definição das subclasses de erro
class ParameterException extends Exception{}
class FileNotFoundException extends Exception{}
class FilePermissionException extends Exception{}
// abrindo um arquivo com tratamento de exceções
try
{
	$arquivo = Abrir('/tmp/arquivo.dat');
	echo $arquivo;
}
// captura o erro
catch (ParameterException $exceção)
{
	// não faz nada...
}
catch (FileNotFoundException $exceção)
{
	var_dump($exceção->getTrace());
	echo "finalizando aplicação...\n";
	die;
}
catch (FilePermissionException $exceção)
{
	echo $exceção->getFile() . ' : ' . $exceção->getLine() . ' # ' . $exceção->getMessage();
}
?>