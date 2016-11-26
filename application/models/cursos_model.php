<?php
namespace application\models;

class cursos_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "curso";
	}
	
	public function select(){
		$sql = "SELECT
				C.*,
				F.funcionario as professor
				FROM curso AS C
				INNER JOIN funcionario as F
					ON (F.id = C.professor)
				ORDER BY id ASC
				";
		return parent::execute($sql);
		
	}
	public  function insert(array $dados){
		return parent::insert($dados);
	}
}
?>