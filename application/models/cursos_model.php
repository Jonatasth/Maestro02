<?php
namespace application\models;

class cursos_model extends \model{
	
	public function __construct(){
		parent::__construct();
		$this->_tabela = "curso";
	}
	
	public function select(){
		return $this->read(NULL, null, null, 'id ASC');
	}
	public  function insert(array $dados){
		return parent::insert($dados);
	}
}
?>