<?php

class Messaggio {
    
    private $db;
    private $GestioneUtente;
    
    private $id;
    private $mittente;
    private $destinatario;
    private $testo;
    private $data;
    private $oggetto;
    
    function Messaggio($id,$mittente,$destinatario,$testo,$data,$oggetto) {
        
        global $db;
        $this->db = $db;
        global $GestioneUtente;
        $this->GestioneUtente = $GestioneUtente;
        
        if( ($this->controllaInput($mittente)) && ($this->controllaInput($destinatario)) ) {
            $this->mittente = $mittente;
            $this->destinatario = $destinatario;
        }
        
        $this->id = $id;
        $this->testo = $testo;
        $this->data = $data;
        $this->oggetto = $oggetto;
    }
    function controllaInput($utente) {
        if(!($utente instanceof Utente))
            throw new Exception("Non e' un utente");
        if($this->GestioneUtente->isExists($utente->getNomeUtente())) {
            return true;
        }
        throw new Exception("Inconsistenza dei dati nel database");
    }
    function getID() {
        return $this->id;
    }
    function setID($id) {
        $this->id = $id;
    }
    function getMittente() {
        return $this->mittente;
    }
    function setMittente($mittente) {
        if($this->controllaInput($mittente)) {
            $newValues = array("Mittente" => $mittente);
            $where = array("IDMessaggio" => $this->id);
            $this->db->Update("Messaggio",$newValues,$where);
            $this->mittente = $mittente;
        }
    }
    function getDestinatario() {
        return $this->destinatario;
    }
    function setDestinatario($destinatario) {
        if($this->controllaInput($destinatario)) {
            $newValues = array("Destinatario" => $mittente);
            $where = array("IDMessaggio" => $this->id);
            $this->db->Update("Messaggio",$newValues,$where);
            $this->destinatario = $destinatario;
        }
    }
    function getTesto() {
        return $this->testo;
    }
    function setTesto($testo) {
        $newValues = array("Testo" => $testo);
        $where = array("IDMessaggio" => $this->id);
        $this->db->Update("Messaggio",$newValues,$where);
        $this->testo = $testo;
    }
    function getData() {
        return $this->data;
    }
    function setData($data) {
        $newValues = array("Data" => $data);
        $where = array("IDMessaggio" => $this->id);
        $this->db->Update("Messaggio",$newValues,$where);
        $this->data = $data;
    }
    function getOggetto() {
        return $this->oggetto;
    }
    function setOggetto($oggetto) {
        $newValues = array("Oggetto" => $link);
        $where = array("IDMessaggio" => $this->id);
        $this->db->Update("Messaggio",$newValues,$where);
        $this->oggetto = $oggetto;
    }
    function salva() {
        $values = array("Mittente" => $this->mittente->getID(), "Destinatario" => $this->destinatario->getID(), "Testo" => $this->testo, "Data" => $this->data, "Oggetto" => $this->oggetto);
        $this->db->Insert($values,"Messaggio");
        $this->setID($this->db->LastInsertID());
    }
    function elimina() {
        $values = array("IDMessaggio" => $this->id);
        return $this->db->Delete("Messaggio",$values);
    }
}
?>