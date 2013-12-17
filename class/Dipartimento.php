<?php

class Dipartimento {
    
    private $db;
    private $idDipartimento;
    private $nomeDipartimento;
    private $areaScientifica;
    private $GestioneAreaScientifica;
    
    function Dipartimento($idDipartimento, $nomeDipartimento, $areaScientifica) {
        global $db;
        $this->db = $db;
        global $GestioneAreaScientifica;
        $this->GestioneAreaScientifica = $GestioneAreaScientifica;
        
        $this->controllaInput($areaScientifica);
        $this->nomeDipartimento = $nomeDipartimento;
        $this->idDipartimento = $idDipartimento;
        $this->areaScientifica = $areaScientifica;
    }
    function getID() {
        return $this->idDipartimento;
    }
    function getNome() {
        return $this->nomeDipartimento;
    }
    function getAreaScientifica() {
        return $this->areaScientifica;
    }
    function setID($id) {
        $this->idDipartimento = $id;
    }
    function setNome($nome) {
        $newValues = array("Nome" => $nome);
        $where = array("Nome" => $this->nomeDipartimento);
        
        if(!$this->db->Update("Dipartimento",$newValues,$where)) {
            throw new Exception("Nome Dipartimento gia' presente");
        }
        $this->nomeDipartimento = $nome;
    }
    function setAreaScientifica($areaScientifica) {
        controllaInput($areaScientifica);
        $this->areaScientifica = $areaScientifica;
    }
    function controllaInput($areaScientifica) {
        if($areaScientifica == "") return true;
        if(!($areaScientifica instanceof AreaScientifica))
            throw new Exception("Non e' un'area scientifica");
        if($this->GestioneAreaScientifica->isExists($areaScientifica->getNome())) {
            return true;
        }
        throw new Exception("Incosistenza dei dati nel database");
    }
    function salva() {
        $values = array("Nome" => $this->nomeDipartimento, "AreaScientifica" => $this->areaScientifica->getID());
        $this->db->Insert($values,"Dipartimento");
        $this->setID($this->db->LastInsertID());
    }
    function elimina() {
        $values = array("IDDipartimento" => $this->idDipartimento);
        return $this->db->Delete("Dipartimento",$values);
    }
}

?>