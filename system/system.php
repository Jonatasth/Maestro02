<?php
class System{
	private $url;
	private $partesUrl;
	public $controller;
	public $action;
	public $params;
	public function __construct(){
		$this-> setUrl();
		$this-> setParteUrl();
		$this-> setController();
		$this-> setAction();
		$this-> setParams();
	}
	public function setUrl(){
		$this->url = (isset($_GET['url']) ? $_GET['url']:'');	
	}
	public function setParteUrl(){
		$this->partesUrl = explode('/', $this->url);
	}
	public function setController(){
		$this->controller = $this->partesUrl[0];
	}
	public function setAction(){
		$this->action = $this->partesUrl[1];
	}
	public function setRun(){
		require ('application/controllers/'.$this->controller.'.php');
		$control = '\\application\\controllers\\'.$this->controller;
		$app = new $control();
		
		$action = $this->action;
		$app->$action();
	}
	
	//ele pega os parametros da URL e coloca num array descartando o primero e o segundo .. .ex: alunos/editar/aluno/1551   pega apenas aluno => 1551
	public function setParams()  
	{
	
		
		
		//remover o primeiro parametro do $partesUrl
		//$this->partesUrl[0] = null;
		unset($this->partesUrl[0]); //remove o controller
	
		//remover o primeiro parametro do $partesUrl
		//$this->partesUrl[1] = null;
		unset($this->partesUrl[1]); //remove o action
	
		if( !empty($this->partesUrl) )
		{
				
			//recebe argumentos da URL
			//1o - verificar se o valor do ultimo argumento eh vazio
			if( end( $this->partesUrl) == null)
			{
				array_pop($this->partesUrl);
			}
				
			//verificar se ainda existe elementos no array partesUrl
			if( ! empty( $this->partesUrl ) )
			{
	
				//2o - Montar array chave=>valor com os argumentos recebidos
				$i = 0; //var contador
	
				$chaves = array();
	
				$valores = array();
	
				foreach ($this->partesUrl as $parteUrl)
				{
					if($i % 2 == 0)  //se o modulo do contador $i eh igual a zero ele eh par
					{
						//Chave
						$chaves[] = $parteUrl;
	
					}else
					{
						//Atribuir valor ao array de valores
						$valores[] = $parteUrl;
					}
					$i++; //incrementa o contador
				}
				$this->params = array_combine($chaves, $valores);
	
			}else
			{
	
				//informa que nao possui argumentos
				$this->params = array();
			}
	
	
		}else
		{
			//informa que nao possui argumentos
			$this->params = array();
				
		}
	
	}
	
	public function getParam($name = null)
	{
		if($name != null)
		{
			return $this->params[$name];
		}else
		{
			return $this->params;
		}
	}
}
?>