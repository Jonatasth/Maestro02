<?php
class System{
	private $url;
	private $parteUrl;
	public $controller;
	public $action;
	public $params;
	public function __construct(){
		$this-> setUrl();
		$this-> setParteUrl();
		$this-> setController();
		$this-> setAction();
	}
	public function setUrl(){
		$this->url = (isset($_GET['url']) ? $_GET['url']:'');	
	}
	public function setParteUrl(){
		$this->parteUrl = explode('/', $this->url);
	}
	public function setController(){
		$this->controller = $this->parteUrl[0];
	}
	public function setAction(){
		$this->action = $this->parteUrl[1];
	}
	public function setRun(){
		require ('application/controllers/'.$this->controller.'.php');
		$app = new $this->controller();
		$action = $this->action;
		$app->$action();
	}
}
?>