<?php 
/*include ('system\system.php'); //capturar as a��es
include('config.php');

require_once ('system\system.php');
require_once ('system\controller.php');
require_once ('system\model.php');


function __autoload($file){
	if (file_exists (MODELS . $file . '.php'))
		require_once (MODELS . $file . '.php');
	else 
		die('Classe n�o encontrada!');
}

$obj = new System();
$obj-> setRun();

var_dump($obj);//para visualizar os parametros*/

require 'vendor/autoload.php';

$slugifier = new \Slug\Slugifier();

//definindo tratamento de caracteres com acentuacao
$frase = 'Frase com acentuação para teste de criação de slug';

$slug = $slugifier->slugify($frase);

echo '<b>Frase natural: </b>'. $frase . "<br /><br />";
echo '<b>Frase com aplicação de slug: </b>'. $slug . "<br /><br />";

?>