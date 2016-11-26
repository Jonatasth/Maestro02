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
	
	public function create(){
		$data = array();
		
		
		
		if(isset($_POST['submit'])){
			
			$cursos = new \application\models\cursos_model();
			$dados = '';
			
			$dados['titulo'] = $_POST['titulo'];
			$dados['descricao'] = $_POST['descricao'];
			$dados['conteudo'] = $_POST['conteudo'];
			$dados['professor'] = $_POST['professor'];
			$dados['carga_horaria'] = $_POST['carga_horaria'];
			$dados['lotacao'] = $_POST['lotacao'];
			$dados['data_inicio'] = $_POST['data_inicio'];
			$dados['data_fim'] = $_POST['data_fim'];
			$cursos->insert($dados);
			//header('location: cursos/cursos');
		}
		
		$this->loadView('cursos_formulario', $data);
	}
}
?>