<?php

class Notifica {
    
    private $db;
    private $GestioneUtente;
    
    private $id;
    private $mittente;
    private $destinatario;
    private $testo;
    private $data;
    private $link;
    
    function Notifica($id,$mittente,$destinatario,$testo,$data,$link) {
        
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
        $this->link = $link;
    }
    function controllaInput($utente) {
        if(!($utente instanceof Utente))
            throw new Exception("Non e' un utente");
        if($this->GestioneUtente->isExists($utente->getNomeUtente())) {
            return true;
        }
        throw new Exception("Utente non trovato");
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
            $where = array("IDNotifica" => $this->id);
            $this->db->Update("Notifica",$newValues,$where);
            $this->mittente = $mittente;
        }
    }
    function getDestinatario() {
        return $this->destinatario;
    }
    function setDestinatario($destinatario) {
        if($this->controllaInput($destinatario)) {
            $newValues = array("Destinatario" => $mittente);
            $where = array("IDNotifica" => $this->id);
            $this->db->Update("Notifica",$newValues,$where);
            $this->destinatario = $destinatario;
        }
    }
    function getTesto() {
        return $this->testo;
    }
    function setTesto($testo) {
        $newValues = array("Testo" => $testo);
        $where = array("IDNotifica" => $this->id);
        $this->db->Update("Notifica",$newValues,$where);
        $this->testo = $testo;
    }
    function getData() {
        return $this->data;
    }
    function setData($data) {
        $newValues = array("Data" => $data);
        $where = array("IDNotifica" => $this->id);
        $this->db->Update("Notifica",$newValues,$where);
        $this->data = $data;
    }
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $newValues = array("Link" => $link);
        $where = array("IDNotifica" => $this->id);
        $this->db->Update("Notifica",$newValues,$where);
        $this->link = $link;
    }
    function salva() {
        $values = array("Mittente" => $this->mittente->getID(),
                        "Destinatario" => $this->destinatario->getID(),
                        "Testo" => $this->testo, "Data" => $this->data,
                        "Link" => $this->link);
        $this->db->Insert($values,"Notifica");
        $this->setID($this->db->LastInsertID());
    }
    function elimina() {
        $values = array("IDNotifica" => $this->id);
        return $this->db->Delete("Notifica",$values);
    }
}
?>