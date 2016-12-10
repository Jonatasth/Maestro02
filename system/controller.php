<?php
class Controller extends \System{

	public function __contruct(){
		parent::__construct();
	}
	
	protected function loadView($nome, $vars = array()){
		ob_start();
		if (is_array($vars) && count($vars) > 0){
			extract($vars, EXTR_PREFIX_ALL, 'view');
		}
		require_once ( 'application/views/' . $nome . '.phtml');
			
		$conteudo = ob_get_contents();
			
		ob_end_clean();
			
		ob_start();
		require_once ('public/layout/layout.php');
		$layout = ob_get_contents();
		ob_end_clean();
		
		echo str_replace('{{{content}}}', $conteudo, $layout);
	}
	
	
	protected function loadView2($nome, $vars = array()){
		ob_start();
		if (is_array($vars) && count($vars) > 0){
			extract($vars, EXTR_PREFIX_ALL, 'view');
		}
		require_once ( 'application/views/' . $nome . '.phtml');
			
		$conteudo = ob_get_contents();
			
		ob_end_clean();
			
		ob_start();
		require_once ('public/layout/layout.php');
		$layout = ob_get_contents();
		ob_end_clean();
	
		echo str_replace('{{{content}}}', $conteudo, $layout);
	}

}
?>