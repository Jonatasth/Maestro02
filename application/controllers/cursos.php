<?php
namespace application\controllers;

class Cursos extends \Controller{

	function __contruct(){
	}

	public function Cursos(){
		$cursos = new \application\models\cursos_model();
		$cursos_lista = $cursos->select();
		$data['cursos'] = $cursos_lista;
		$this->loadView('cursos', $data);
	}
}
?>