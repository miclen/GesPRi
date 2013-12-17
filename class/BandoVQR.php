<?php

if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}

class BandoVQR {
    
    private $db;
    private $id;
    private $nome;
    private $dataApertura;
    private $dataChiusura;
    private $numeroConsigliati;

    function BandoVQR($id, $nome, $dataApertura,$dataChiusura,$numeroConsigliati) {
        global $db;
        $this->db = $db;
        
        $this->controlData($dataApertura,$dataChiusura);
        $this->id = $id;
        $this->nome = $nome;
        $this->dataApertura = $dataApertura;
        $this->dataChiusura = $dataChiusura;
        if(intval($numeroConsigliati) <= 0)
            throw new Exception("Numero Prodotti Consigliati non valido");
        $this->numeroConsigliati = $numeroConsigliati;       
    }

    private function controlData($dataApertura,$dataChiusura) {
        $Apertura = strtotime($dataApertura);
        $Chiusura = strtotime($dataChiusura);
        if(!$Apertura)
            throw new Exception("Data non valida");
        if(!$Chiusura)
            throw new Exception("Data non valida");
        if( ($Apertura > $Chiusura) || (strtotime(date('Y-m-d')) < $Apertura)) {
            throw new Exception("Input non valido");
        }
    }
        
    function getID() {
        return $this->id;
    }
    
    function setID($id) {
        $this->id = $id;
    }
    
    function getNome() {
        return $this->nome;
    }
   
    function setNome($nome) {
        $newValues = array("Nome" => $nome);
        $where = array("Nome" => $this->nome);
        
        if(!$this->db->Update("BandoVQR",$newValues,$where)) {
            throw new Exception("Bando VQR gia' presente");
        }
        $this->nome = $nome;
    }
   
    function getDataApertura() {
        return $this->dataApertura;
    }
    
    function setDataApertura($dataApertura) {
        $this->controlData($dataApertura,$this->dataChisura);
        $newValues = array("DataApertura" => $dataApertura);
        $where = array("Nome" => $this->nome);
        $this->db->Update("BandoVQR",$newValues,$where);
        $this->dataApertura = $dataApertura; 
    }
    
    function getDataChiusura() {
        return $this->dataChiusura;
    }
    
    function setDataChiusura($dataChiusura) {
        $this->controlData($this->dataApertura,$dataChiusura);
        $newValues = array("DataChiusura" => $dataChiusura);
        $where = array("Nome" => $this->nome);
        $this->db->Update("BandoVQR",$newValues,$where);
        $this->dataChisura = $dataChiusura; 
    }
    
    function getNumeroProdottiConsigliati() {
        return $this->numeroConsigliati;
    }
    
    function setNumeroProdottiConsigliati($numeroConsigliati) {
        $newValues = array("NumeroProdottiConsigliati" => $numeroConsigliati);
        $where = array("Nome" => $this->nome);
        $this->db->Update("BandoVQR",$newValues,$where);
        $this->numeroConsigliati = $numeroConsigliati; 
    }
    
    function salva() {
        $values = array("Nome" => $this->nome, "DataApertura" => $this->dataApertura, "DataChiusura" => $this->dataChiusura, "NumeroProdottiConsigliati" => $this->numeroConsigliati);
        $this->db->Insert($values,"BandoVQR");
        $this->setID($this->db->LastInsertID());
    }
    function elimina() {
        $values = array("IDBando" => $this->id);
        return $this->db->Delete("BandoVQR",$values);
    }
}

?>