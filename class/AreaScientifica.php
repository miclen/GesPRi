<?php
if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}

class AreaScientifica {
    private $id;
    private $nome;
    private $db;
    
    function AreaScientifica($id,$nome) {
        global $db;
        $this->db = $db;
        
        $this->id = $id;
        $this->nome = $nome;
    }
    
    function getID() {
        return $this->id;
    }
    function getNome() {
        return $this->nome;
    }
    
    function setNome($nome) {
        $newValues = array("NomeAreaScientifica" => $nome);
        $where = array("NomeAreaScientifica" => $this->nome);
        
        if(!$this->db->Update("AreaScientifica",$newValues,$where)) {
            throw new Exception("Nome Area Scientifica gia' presente");
        }
        $this->nome = $nome;
    }
    function setID($id) {
        $this->id = $id;
    }
    function salva() {
        $values = array("NomeAreaScientifica" => $this->nome);
        $this->db->Insert($values,"AreaScientifica");
        $this->setID($this->db->LastInsertID());
    }
    function elimina() {
        $values = array("IDAreaScientifica" => $this->id);
        return $this->db->Delete("AreaScientifica",$values);
    }
}

?>