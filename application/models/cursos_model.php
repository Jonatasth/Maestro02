<?php
namespace application\models;

class cursos_model extends \model{
	public function select(){
		$this->_tabela = "curso";
		return $this->read(NULL, null, null, 'id ASC');
	}
	public  function insert(array $dados){
		$this->_tabela = "curso";
		return parent::insert();
	}
}
?>