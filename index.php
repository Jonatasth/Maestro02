<?php 
session_start();

include ('system\system.php');
include('config.php');
require('system\upload.php');
include ('system\imagem.php');
include ('system\mpfdf\src\Mpdf.php');



include ('system\toolimage.php');

require_once ('system\system.php');
require_once ('system\controller.php');
require_once ('system\model.php');
//require_once ('controllers\cursos.php');
//require 'vendor/autoload.php';


function __autoload($file){
	if (file_exists ($file . '.php'))
		require_once ($file . '.php');
	else 
		die('Classe não encontrada!');
}

$obj = new System();

$obj-> setRun();


//var_dump($obj);//para visualizar os parametros



/*
$slugifier = new \Slug\Slugifier();

//definindo tratamento de caracteres com acentuacao
$frase = 'Frase com acentuação para teste de criação de slug';

$slug = $slugifier->slugify($frase);

echo '<b>Frase natural: </b>'. $frase . "<br /><br />";
echo '<b>Frase com aplicação de slug: </b>'. $slug . "<br /><br />";
*/
?>