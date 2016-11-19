<?php 
include ('system\system.php'); //capturar as ações
include('config.php');

require_once ('system\system.php');
require_once ('system\controller.php');
require_once ('system\model.php');


function __autoload($file){
	if (file_exists (MODELS . $file . '.php'))
		require_once (MODELS . $file . '.php');
	else 
		die('Classe não encontrada!');
}

$obj = new System();
$obj-> setRun();

var_dump($obj);//para visualizar os parametros
?>