<?php
namespace application\controllers;

class alunos extends \Controller{

	public function __contruct(){
		parent::__construct();
	}

	public function alunos(){
		$alunos = new \application\models\alunos_model();
		$alunos_lista = $alunos->select();
		$data['alunos'] = $alunos_lista;
		
		$data['aviso'] = $_SESSION['mensagem'] ?? null;
		unset($_SESSION['mensagem']);
		//print_r($data);
		$this->loadView('alunos_lista', $data);
	}
	
	public function create(){
		$data = array();
		

		$alunoModel = new \application\models\alunos_model();
		$data['alunos'] = $alunoModel->read();
		
		
		if(isset($_POST['submit'])){
			$alunos = new \application\models\alunos_model();
			
			$dados = $error = array();
			
			
			$dados['nome'] = $_POST['nome'] ?? '';
			$dados['email'] = $_POST['email'] ?? '';
			$dados['telefone'] = $_POST['telefone'] ?? '';
			$dados['endereco'] = $_POST['endereco'] ?? '';
			$dados['cpf'] = $_POST['cpf'] ?? '';
			$dados['id_usuario'] = $_POST['id_usuario'] ?? '';
			
			if(isset($dados['nome']) and $dados['nome'] == ''){
				$error['nome'] = 'Informe a descrição';
			}
			if(isset($dados['email']) and $dados['email'] == ''){
				$error['email'] = 'Informe o conteúdo';
			}
			if(isset($dados['telefone']) and $dados['telefone'] == ''){
				$error['telefone'] = 'Informe o nome do Professor';
			}
			if(isset($dados['endereco']) and $dados['endereco'] == ''){
				$error['endereco'] = 'Informe a carga horária do curso';
			}
			if(isset($dados['cpf']) and $dados['cpf'] == ''){
				$error['cpf'] = 'Informe a lotação para o curso';
			}
			
			if(isset($dados['id_usuario']) and $dados['id_usuario'] == ''){
				$error['id_usuario'] = 'Informe uma data de inicio';
			}
			
			if(isset($_FILES['imagem']) and $_FILES['imagem']['error'] != '0'){
				$error['imagem'] = 'Informe uma imagem';
			}
			
			if(count($error) == 0){
			
				$diretorioDeArmazenamento = 'data/';
				if( move_uploaded_file($_FILES['imagem']['tmp_name'] , $diretorioDeArmazenamento.$_FILES['imagem']['name']) ){
					$dados['imagem'] = $diretorioDeArmazenamento.$_FILES['imagem']['name'];
				}else{
					$dados['imagem'] = NULL;
				}
				
				$alunos->insert($dados);
				header('location: /maestro2/alunos/alunos');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
	
		}
		
		$this->loadView('alunos_formulario', $data);
	}
	
	public function editar(){
		
		$id = parent::getParam('id') ?? null;
		
		if($id == null){
			header('location: /maestro2/alunos/alunos');
		}
		
		$data = $dados = $error = array();
		
		$alunosModel = new \application\models\alunos_model();
		$data = $alunosModel->readById($id);
		
		//$professorModel = new \application\models\professor_model();
		//$data['professores'] = $professorModel->read();
		
		
		
		if(isset($_POST['submit'])){
				
			$dados['Imagem'] = $_POST['imagem'] ?? '';
			$dados['Nome'] = $_POST['nome'] ?? '';
			$dados['E-mail'] = $_POST['email'] ?? '';
			$dados['Telefone'] = $_POST['telefone'] ?? '';
			$dados['Endereço'] = $_POST['endereco'] ?? '';
			$dados['CPF'] = $_POST['cpf'] ?? '';
			$dados['Id_Usuário'] = $_POST['id_usuario'] ?? '';
				
			if(isset($dados['imagem']) and $dados['imagem'] == ''){
				$error['imagem'] = 'anexe uma imagem';
			}
			if(isset($dados['nome']) and $dados['nome'] == ''){
				$error['nome'] = 'Informe o nome';
			}
			if(isset($dados['email']) and $dados['email'] == ''){
				$error['email'] = 'Informe o e-mail';
			}
			if(isset($dados['telefone']) and $dados['telefone'] == ''){
				$error['telefone'] = 'Informe o telefone';
			}
			if(isset($dados['endereco']) and $dados['endereco'] == ''){
				$error['endereco'] = 'Informe o endereço';
			}
			if(isset($dados['cpf']) and $dados['cpf'] == ''){
				$error['cpf'] = 'Informe o CPF';
			}
				
			if(isset($dados['id_usuario']) and $dados['id_usuario'] == ''){
				$error['id_usuario'] = 'Informe uma ID de Usuário';
			}
			
			
			if(count($error) == 0){

				$alunosModel->update($dados,"id='$id'");
				header('location: /maestro2/alunos/alunos');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
			
		}
		
		$this->loadView('alunos_formulario', $data);
	
		}
		
		public function excluir(){
			
			$id = parent::getParam('id') ?? null;
			
			if($id == null){
				header('location: /maestro2/alunos/alunos');
			}
			
			$alunos = new  \application\models\alunos_model();
			$alunos->delete('id='.$id);

			$_SESSION['mensagem'] = array('type'=>'success', 'info'=>'Excluído com sucesso');
			
			header('location: /maestro2/alunos/alunos');
			
		}
	
	}

?>