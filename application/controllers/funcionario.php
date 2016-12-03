<?php
namespace application\controllers;

class funcionario extends \Controller{

	public function __contruct(){
		parent::__construct();
	}

	public function funcionario(){
		$funcionario = new \application\models\funcionario_model();
		$funcionario_lista = $funcionario->select();
		$data['funcionario'] = $funcionario_lista;
		
		$data['aviso'] = $_SESSION['mensagem'] ?? null;
		unset($_SESSION['mensagem']);
		//print_r($data);
		$this->loadView('funcionario_lista', $data);
	}
	
	public function create(){
		$data = array();
		

		$funcionarioModel = new \application\models\funcionario_model();
		$data['funcionario'] = $funcionarioModel->read();
		
		
		if(isset($_POST['submit'])){
			
			$funcionario = new \application\models\funcionario_model();
			
			$dados = $error = array();
			
			$dados['funcionario'] = $_POST['funcionario'] ?? '';
			$dados['funcao'] = $_POST['funcao'] ?? '';
			$dados['ativo'] = $_POST['ativo'] ?? '';
			$dados['id_usuario'] = $_POST['id_usuario'] ?? '';

		
			if(isset($dados['funcionario']) and $dados['funcionario'] == ''){
				$error['funcionario'] = 'Informe o nome'; 
			}
			if(isset($dados['funcao']) and $dados['funcao'] == ''){
				$error['funcao'] = 'Informe a funcao';
			}
			if(isset($dados['ativo']) and $dados['ativo'] == ''){
				$error['ativo'] = 'Informe 1 para ativo e 0 p/ inativo';
			}
			if(isset($dados['id_usuario']) and $dados['id_usuario'] == ''){
				$error['id_usuario'] = 'Informe a ID';
			}
		
			
			if(count($error) == 0){
				$funcionario->insert($dados);
				header('location: funcionario/funcionario');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
		}
		
		$this->loadView('funcionario_formulario', $data);
	}
	
	public function editar(){
		
		$id = parent::getParam('id') ?? null;
		
		if($id == null){
			header('location: funcionario/formulario');
		}
		
		$data = $dados = $error = array();
		
		$funcionarioModel = new \application\models\funcionario_model();
		$data = $funcionarioModel->readById($id);
		
		//$professorModel = new \application\models\professor_model();
		//$data['professores'] = $professorModel->read();
		
		
		
		if(isset($_POST['submit'])){
			
			$dados['funcionario'] = $_POST['funcionario'] ?? '';
			$dados['funcao'] = $_POST['funcao'] ?? '';
			$dados['ativo'] = $_POST['ativo'] ?? '';
			$dados['id_usuario'] = $_POST['id_usuario'] ?? '';
				
			
			if(isset($dados['funcionario']) and $dados['funcionario'] == ''){
				$error['funcionario'] = 'Informe o nome';
			}
			if(isset($dados['funcao']) and $dados['funcao'] == ''){
				$error['funcao'] = 'Informe a funcao';
			}
			if(isset($dados['ativo']) and $dados['ativo'] == ''){
				$error['ativo'] = 'Informe 1 para ativo e 0 p/ inativo';
			}
			if(isset($dados['id_usuario']) and $dados['id_usuario'] == ''){
				$error['id_usuario'] = 'Informe a ID';
			}
			
				
			if(count($error) == 0){
				$funcionario->insert($dados);
				header('location: /maestro2/funcionario/funcionario');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
			
			}
			$this->loadView('funcionario_formulario', $data);
		}

		
		public function excluir(){
			
			$id = parent::getParam('id') ?? null;
			
			if($id == null){
				header('location: funcionario/funcionario');
			}
			
			$funcionario = new  \application\models\funcionario_model();
			$funcionario->delete('id='.$id);

			$_SESSION['mensagem'] = array('type'=>'success', 'info'=>'Excluído com sucesso');
			
			header('location: /maestro2/funcionario/funcionario');
			
		}
	
	}

?>