<?php
namespace application\controllers;

class alunos extends \Controller{

	public function __contruct(){
		parent::__construct();
	}

	public function alunos(){
		//$alunos = new \application\models\alunos_model();
		//$alunos_lista = $alunos->select();
		//$data['alunos'] = $alunos_lista;
		
		
		$alunoModel = new \application\models\alunos_model();
		$alunos_lista = $alunoModel->select();
		$data['alunos'] = array();
		foreach ($alunos_lista as $aluno){
			
			if(isset($aluno['imagem']) and $aluno['imagem'] != ''){
				$toolimage = new \toolimage();
				$toolimage->file = $aluno['imagem'];
				$aluno['imagem'] = $toolimage->resize('80','80'); //tamanho da imagem
			}
			
			$data['alunos'][]=$aluno;
		}
		//**//
		
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
				
				$upload = new \upload($_FILES['imagem']);
				$dados['imagem'] = $upload->execute();
				
				
				/*$diretorioDeArmazenamento = 'data/';
				if( move_uploaded_file($_FILES['imagem']['tmp_name'] , $diretorioDeArmazenamento.$_FILES['imagem']['name']) ){
					$dados['imagem'] = $diretorioDeArmazenamento.$_FILES['imagem']['name'];
				}else{
					$dados['imagem'] = NULL;
				}*/
				
				$alunos->insert($dados);
				header('location: /maestro2/alunos/alunos');
			}else{
				$error['warning'] = 'Preencha corretamente o formulario';
				$data['error'] = $error;
			}
	
		}
		
		$this->loadView('alunos_formulario', $data);
	}
	////função para consultar Aluno Já cadastrado///
	//public function consultar(){
	//	$id = parent::getParam('id') ?? null;
	//}
		
	public function editar(){
		
		$id = parent::getParam('id') ?? null;
		
		if($id == null){
			header('location: /maestro2/alunos/alunos');
		}
		
		$data = $dados = $error = array();
		
		$alunosModel = new \application\models\alunos_model();
		
		$alunoInfo = $alunosModel->readById($id);
		
		$toolimage = new \toolimage();
		if ($alunoInfo['imagem'] != ''){
			$toolimage->file = $alunoInfo['imagem'];
		}else{
			$toolimage->file = 'imagem/catalog/no_image.jpg';
		}
		$alunoInfo['imagem'] = $toolimage->resize('200','200');
		
		$data = $alunoInfo;
		
		if(isset($_POST['submit'])){	
			print_r($_POST);
			$dados['nome'] = $_POST['nome'] ?? '';
			$dados['email'] = $_POST['email'] ?? '';
			$dados['telefone'] = $_POST['telefone'] ?? '';
			$dados['endereco'] = $_POST['endereco'] ?? '';
			$dados['cpf'] = $_POST['cpf'] ?? '';
			$dados['id_usuario'] = $_POST['id_usuario'] ?? '';
				
			
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
			
			//obrigatirio
			
			if(count($error) == 0){
				
				
				if(isset($_FILES['imagem']) and $_FILES['imagem']['error'] == '0'){
					/*$diretorioDeArmazenamento = 'data/';
					if( move_uploaded_file($_FILES['imagem']['tmp_name'] , $diretorioDeArmazenamento.$_FILES['imagem']['name']) ){
						$dados['imagem'] = $diretorioDeArmazenamento.$_FILES['imagem']['name'];
					}else{
						$dados['imagem'] = NULL;
					}*/
					$upload = new \upload($_FILES['imagem']);
					$upload->setExtension(array('png','jpg'));
					$dados['imagem'] = $upload->execute();
					
				}else{
					$dados['imagem'] = $_POST['imagem_existe'];
				}
				
		
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
	
	public function gerapdf(){
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML('<h1>Hello world!</h1>');
		$mpdf->Output();
		
		}
		
	}

?>