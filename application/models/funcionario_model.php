<?php
namespace application\models;

class funcionario_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "funcionario";
	}
	
	public function select(){
		$sql = "SELECT
				C.*
				FROM funcionario AS C
				ORDER BY id ASC
				";
		return parent::execute($sql);
		
	}
	public  function insert(array $dados){
		return parent::insert($dados);
	}
}
?>