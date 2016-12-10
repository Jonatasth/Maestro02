<?php
class upload{
	const APP_DIRECTORY = 'imagem/catalog/';
	public $file;//armazena o nosso array//
	public $extension = array();

	public function __construct($arquivo){
		//verificar se existe diretório, se não existe tem que criar://
		if (!file_exists(self::APP_DIRECTORY)){
			mkdir(self::APP_DIRECTORY, 0777);  //cuidar com o MKDIR a questão de permissão.
			//O 0777 definição de quem pode manipular esse diretório.
		}
		$this->file=$arquivo;
	}
	//método para executar o upload
	public function execute(){
		if (self::checkExtension()){	
			if (isset($this->file)){
				$name=self::APP_DIRECTORY.uniqid().'_'.$this->file['name'];
				if (is_uploaded_file($this->file['tmp_name'])){
					if (move_uploaded_file($this->file['tmp_name'], $name)){
						return $name;
					}else{
						return false;
					}
				}
			}
		}else{
			return false;
		}
	}
	
	public function setExtension(array $extension){
		$this->extension=$extension;
	}
	public function checkExtension(){
		$nome=explode('.', $this->file['name']);
		$extensão= end($nome);
		if( in_array($extensão, $this->extension)){
			return true;
		}else{
			return false;
		}
	}
	
}

?>