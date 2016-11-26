<?php
namespace application\models;

class professor_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "funcionario";
	}
}
?>