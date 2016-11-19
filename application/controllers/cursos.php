<?php
namespace application\controllers;

class cursos extends \Controller{

	function __contruct(){
	}

	public function cursos(){
		$cursos = new \application\models\cursos_model();
		$cursos_lista = $cursos->select();
		$data['cursos'] = $cursos_lista;
		//print_r($data);
		$this->loadView('cursos_lista', $data);
	}
}
?>