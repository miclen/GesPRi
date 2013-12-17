<?php

class Prodotto {
    
    //Le informazioni e le relative variabili verranno messe solo attraverso uno degli inserimenti
    private $db;
    private $id;
    private $titolo;
    private $stato;
    private $nomeTipologia;
    private $proprietario;

    private $GestioneUtente;
    private $TipologiaProdotto;
    //private $autori;
    
    function Prodotto($id,$titolo,$stato,$nomeTipologia,$proprietario) {
        global $db;
        $this->db = $db;
        
        global $GestioneUtente;
        $this->GestioneUtente = $GestioneUtente;
        
        global $TipologiaProdotto;
        $this->TipologiaProdotto = $TipologiaProdotto;
        
        $this->controllaProprietario($proprietario);
        $this->controllaTipologia($nomeTipologia);
        
        
        $this->id = $id;
        $this->titolo = $titolo;
        $this->stato = $stato;
        $this->nomeTipologia = $tipologia;
        $this->proprietario = $proprietario;
    }
    
    //controlla solo se è un utente, non se è un ricercatore
    private function controllaProprietario($proprietario) {
        if(!($proprietario instanceof Utente))
            throw new Exception("Non e' un utente");            
        if($this->GestioneUtente->isExists($proprietario->getNomeUtente())) {
            //AGGIUNGERE
            return true;
        }
        throw new Exception("Inconsistenza dei dati nel database");
    }
    
    private function controllaTipologia($nomeTipologia) {
        if(!($tipologia instanceof TipologiaProdotto))
            throw new Exception("Non e' una tipologia");
        if($this->GestioneTipologiaProdotto->isExists($nometipologia->getNome())) {
            return true;
        }
        throw new Exception("Inconsistenza dei dati nel database");
    }
        
    function getID()
    {
        return $id;
    }
    
    function setID($id) {
        $this->id = $id;
    }
    
    function getTitolo()
    {
        return $titolo;
    }
    
    function setTitolo($titolo) {
        $newValues = array("Titolo" => $titolo);
        $where = array("IDProdotto" => $this->id);
        $this->db->Update("Prodotto",$newValues,$where);
        $this->titolo = $titolo;
    }
    
    function getStato() {
        return $stato;
    }
    
    function setStato($stato) {
        $newValues = array("Stato" => $stato);
        $where = array("IDProdotto" => $this->stato);
        $this->db->Update("Prodotto",$newValues,$where);
        $this->stato = $stato;
    }
    
    function getNomeTipologia() {
        return $nomeTipologia;
    }
    
    function setNomeTipologia($nomeTipologia) {
        if($this->controllaTipologia($nomeTipologia)) {
            $newValues = array("Tipologia" => $nomeTipologia);
            $where = array("IDProdotto" => $this->nomeTipologia);
            $this->db->Update("Prodotto",$newValues,$where);
            $this->tipologia = $tipologia;
        }
    }
    
    function getProprietario() {
        return $proprietario;
    }
    
    function setProprietario($proprietario) {
        if($this->controllaProprietario($proprietario)) {
            $newValues = array("Proprietario" => $proprietario);
            $where = array("IDProdotto" => $this->id);
            $this->db->Update("Prodotto",$newValues,$where);
            $this->proprietario = $proprietario;
        }
    }
    
    function salva() {
        
    }
    
    function elimina() {
        
    }
    
    
    /*
    function visualizza() {
    }
    
    function modifica($attributo, $nuovoValore)
    {
        //solo il proprietario può modificare
    }
    
    function rendiDefinitivo()
    {
    }
    
    function autoriconoscimentoAutore($autore)
    {
        //Aggiunge l'informazione alla tabella autori
        //Metodo chiamato da Notifica
    }
    
    function rimuovi()
    {
        //Solo se l'utente è il proprietario può rimuovere un prodotto (?)        
    }
    */
}

?>