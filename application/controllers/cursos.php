<?php
namespace application\controllers;

class cursos extends \Controller{

	public function __contruct(){
		parent::__construct();
	}

	public function cursos(){
		$cursos = new \application\models\cursos_model();
		$cursos_lista = $cursos->select();
		$data['cursos'] = $cursos_lista;
		
		$data['aviso'] = $_SESSION['mensagem'] ?? null;
		unset($_SESSION['mensagem']);
		//print_r($data);
		$this->loadView('cursos_lista', $data);
	}
	
	public function create(){
		$data = array();
		

		$professorModel = new \application\models\professor_model();
		$data['professores'] = $professorModel->read();
		
		
		if(isset($_POST['submit'])){
			
			$cursos = new \application\models\cursos_model();
			
			$dados = $error = array();
			
			$dados['titulo'] = $_POST['titulo'] ?? '';
			$dados['descricao'] = $_POST['descricao'] ?? '';
			$dados['conteudo'] = $_POST['conteudo'] ?? '';
			$dados['professor'] = $_POST['professor'] ?? '';
			$dados['carga_horaria'] = $_POST['carga_horaria'] ?? '';
			$dados['lotacao'] = $_POST['lotacao'] ?? '';
			$dados['data_inicio'] = $_POST['data_inicio'] ?? '';
			$dados['data_fim'] = $_POST['data_fim'] ?? '';
			
			if(isset($dados['titulo']) and $dados['titulo'] == ''){
				$error['titulo'] = 'Informe um titulo'; 
			}
			if(isset($dados['descricao']) and $dados['descricao'] == ''){
				$error['descricao'] = 'Informe a descrição';
			}
			if(isset($dados['conteudo']) and $dados['conteudo'] == ''){
				$error['conteudo'] = 'Informe o conteúdo';
			}
			if(isset($dados['professor']) and $dados['professor'] == ''){
				$error['professor'] = 'Informe o nome do Professor';
			}
			if(isset($dados['carga_horaria']) and $dados['carga_horaria'] == ''){
				$error['carga_horaria'] = 'Informe a carga horária do curso';
			}
			if(isset($dados['lotacao']) and $dados['lotacao'] == ''){
				$error['lotacao'] = 'Informe a lotação para o curso';
			}
			
			if(isset($dados['data_inicio']) and $dados['data_inicio'] == ''){
				$error['data_inicio'] = 'Informe uma data de inicio';
			}else{
				$dados['data_inicio'] = str_replace('/','-',$dados['data_inicio']);
				$nova = new \DateTime($dados['data_inicio']);
				$dados['data_inicio'] = $nova->format('Y-m-d');
			}
				
			if(isset($dados['data_fim']) and $dados['data_fim'] == ''){
				$error['data_fim'] = 'Informe uma data final';
			}else{
				$dados['data_fim'] = str_replace('/','-',$dados['data_fim']);
				$nova = new \DateTime($dados['data_fim']);
				$dados['data_fim'] = $nova->format('Y-m-d');
			}
			
			if(count($error) == 0){
				$cursos->insert($dados);
				header('location: cursos/cursos');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
	
		}
		
		$this->loadView('cursos_formulario', $data);
	}
	
	public function editar(){
		
		$id = parent::getParam('id') ?? null;
		
		if($id == null){
			header('location: cursos/cursos');
		}
		
		$data = $dados = $error = array();
		
		$cursosModel = new \application\models\cursos_model();
		$data = $cursosModel->readById($id);
		
		$professorModel = new \application\models\professor_model();
		$data['professores'] = $professorModel->read();
		
		
		
		if(isset($_POST['submit'])){
				
			$dados['titulo'] = $_POST['titulo'] ?? '';
			$dados['descricao'] = $_POST['descricao'] ?? '';
			$dados['conteudo'] = $_POST['conteudo'] ?? '';
			$dados['professor'] = $_POST['professor'] ?? '';
			$dados['carga_horaria'] = $_POST['carga_horaria'] ?? '';
			$dados['lotacao'] = $_POST['lotacao'] ?? '';
			$dados['data_inicio'] = $_POST['data_inicio'] ?? '';
			$dados['data_fim'] = $_POST['data_fim'] ?? '';
				
			if(isset($dados['titulo']) and $dados['titulo'] == ''){
				$error['titulo'] = 'Informe um titulo';
			}
			if(isset($dados['descricao']) and $dados['descricao'] == ''){
				$error['descricao'] = 'Informe a descrição';
			}
			if(isset($dados['conteudo']) and $dados['conteudo'] == ''){
				$error['conteudo'] = 'Informe o conteúdo';
			}
			if(isset($dados['professor']) and $dados['professor'] == ''){
				$error['professor'] = 'Informe o nome do Professor';
			}
			if(isset($dados['carga_horaria']) and $dados['carga_horaria'] == ''){
				$error['carga_horaria'] = 'Informe a carga horária do curso';
			}
			if(isset($dados['lotacao']) and $dados['lotacao'] == ''){
				$error['lotacao'] = 'Informe a lotação para o curso';
			}
				
			if(isset($dados['data_inicio']) and $dados['data_inicio'] == ''){
				$error['data_inicio'] = 'Informe uma data de inicio';
			}else{
				$dados['data_inicio'] = str_replace('/','-',$dados['data_inicio']);
				$nova = new \DateTime($dados['data_inicio']);
				$dados['data_inicio'] = $nova->format('Y-m-d');
			}
			
			if(isset($dados['data_fim']) and $dados['data_fim'] == ''){
				$error['data_fim'] = 'Informe uma data final';
			}else{
				$dados['data_fim'] = str_replace('/','-',$dados['data_fim']);
				$nova = new \DateTime($dados['data_fim']);
				$dados['data_fim'] = $nova->format('Y-m-d');
			}
			
			
			if(count($error) == 0){

				$cursosModel->update($dados,"id='$id'");
				header('location: /maestro2/cursos/cursos');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
			
		}
		
		$this->loadView('cursos_formulario', $data);
	
		}
		
		public function excluir(){
			
			$id = parent::getParam('id') ?? null;
			
			if($id == null){
				header('location: cursos/cursos');
			}
			
			$cursos = new  \application\models\cursos_model();
			$cursos->delete('id='.$id);

			$_SESSION['mensagem'] = array('type'=>'success', 'info'=>'Excluído com sucesso');
			
			header('location: /maestro2/cursos/cursos');
			
		}
	
	}

?>