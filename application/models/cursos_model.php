<?php
namespace Maestro\Controller;

class cursos_model extends \model{
	public function select(){
		$this->_tabela = "curso";
		return $this->read(NULL, null, null, 'id ASC');
	}
}
?>