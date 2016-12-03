<?php
namespace application\models;

class alunos_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "aluno";
	}
	
	public function select(){
		$sql = "SELECT
				C.*,
				a.aluno as nome
				FROM aluno AS C
				INNER JOIN aluno as A
					ON (A.id = a.nome)
				ORDER BY id ASC
				";
		return parent::execute($sql);
		
	}
	public  function insert(array $dados){
		return parent::insert($dados);
	}
}
?>