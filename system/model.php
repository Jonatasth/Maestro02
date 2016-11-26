<?php
    class model {
        protected $db;
        
        public $_tabela;
        
        public function __construct() {
            $this->db = new PDO('mysql:host='.HOSTNAME.';dbname='.DATABASE, USERNAME, PASSWORD);
        }
        
        public function insert( array $dados) {
        	$campos = implode(", ", array_keys($dados));
            $valores = "'".implode("','", array_values($dados))."'";
            echo $sql = "INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores})";
            return $this->db->query($sql);
        }
        
        public function read( $where = NULL, $limit = null, $offset = null, $orderby = null) {
        	$where = ($where != null ? "WHERE {$where}" : "");
            $limit = ($limit != null ? "LIMIT {$limit}" : "");
            $offset = ($offset != null ? "OFFSET {$offset}" : "");
            $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
            $q = $this->db->query("SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset}");
            $q->setFetchMode(PDO::FETCH_ASSOC);
            return $q->fetchAll(); //retorna mais de uma linha
        }
        
        public function readById($id) {
        	$sql = "SELECT * FROM `{$this->_tabela}` WHERE id = '$id'";
        	$q = $this->db->query($sql);
        	$q->setFetchMode(PDO::FETCH_ASSOC);
        	return $q->fetch(); //retorna uma linha
        }
                
        public function update( array $dados, $where) {
            $campos = array();
            foreach ($dados as $ind => $val) {
                $campos[] = "{$ind} = '{$val}'";
            }
        $campos = implode(", ", $campos);
        $sql = "UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ";
        
        return $this->db->query($sql);
        }
        
        public function delete( $where) {
            return $this->db->query("DELETE FROM `{$this->_tabela}` WHERE {$where}");
        }
        
        public function execute($sql){
        	$q = $this->db->query($sql);
        	$q->setFetchMode(PDO::FETCH_ASSOC);
        	return $q->fetchAll(); //retorna mais de uma linha
        }
        
    }

?>
