<?php
namespace application\models;

class alunos_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "aluno";
	}
	
	public function select(){
		$sql = "SELECT
				C.*
				FROM aluno AS C
				ORDER BY id ASC
				";
		return parent::execute($sql);
		
	}
	public  function insert(array $dados){
		return parent::insert($dados);
	}
}
?>