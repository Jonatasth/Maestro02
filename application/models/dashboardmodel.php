<?php
namespace application\models;

class dashboardModel extends \model{
	public function select(){
		$this->_tabela = "usuario";
		return $this->read(NULL, null, null, 'id ASC');
	}
}
?>