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
            return $this->db->query("INSERT INTO `{$this->_tabela}` ({$campos}) VALUES ({$valores})");
        }
        
        public function read( $where = NULL, $limit = null, $offset = null, $orderby = null) {
            $where = ($where != null ? "WHERE {$where}" : "");
            $limit = ($limit != null ? "LIMIT {$limit}" : "");
            $offset = ($offset != null ? "OFFSET {$offset}" : "");
            $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
            $q = $this->db->query("SELECT * FROM `{$this->_tabela}` {$where} {$orderby} {$limit} {$offset}");
            $q->setFetchMode(PDO::FETCH_ASSOC);
            return $q->fetchAll();
        }
        
        public function update( array $dados, $where) {
            $campos = array();
            foreach ($dados as $ind => $val) {
                $campos[] = "{$ind} = '{$val}'";
            }
        $campos = implode(", ", $campos);
        return $this->db->query("UPDATE `{$this->_tabela}` SET {$campos} WHERE {$where} ");
        }
        
        public function delete( $where) {
            return $this->db->query("DELETE FROM `{$this->_tabela}` WHERE {$where}");
        }
        
    }

?>
