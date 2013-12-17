<?php

class Utente {

    private $db;
    private $id;
    private $nome;
    private $cognome;
    private $nomeUtente;
    private $password;
    private $dataNascita;
    private $comuneNascita;
    private $provinciaNascita;
    private $comuneResidenza;
    private $provinciaResidenza;
    private $email;
    private $dipartimento;
    private $tipologia;
    private $GestioneDipartimento;
    private $GestioneTipologiaUtente;
    
    function Utente($id,$nome,$cognome,$nomeUtente,$password,$dataNascita,$comuneNascita,$provinciaNascita,$comuneResidenza,$provinciaResidenza,$email,$dipartimento,$tipologia) {
        
        global $db;
        $this->db = $db;
        global $GestioneDipartimento;
        $this->GestioneDipartimento = $GestioneDipartimento;
        
        global $GestioneTipologiaUtente;
        $this->GestioneTipologiaUtente = $GestioneTipologiaUtente;
        
        $this->controllaDipartimento($dipartimento);
        $this->controllaNomeUtente($nomeUtente);
        $this->controllaEmail($email);
        $this->controllaTipologiaUtente($tipologia);
        
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->nomeUtente = mysql_real_escape_string($nomeUtente);
        $this->password = md5($password);
        $this->dataNascita = $dataNascita;
        $this->comuneNascita = $comuneNascita;
        $this->provinciaNascita = $provinciaNascita;
        $this->comuneResidenza = $comuneResidenza;
        $this->provinciaResidenza = $provinciaResidenza;
        $this->email = mysql_real_escape_string($email);
        $this->dipartimento = $dipartimento;
        $this->tipologia = $tipologia;
    }
    
    private function controllaDipartimento($dipartimento) {
        if(!($dipartimento instanceof Dipartimento))
            throw new Exception("Non e' un dipartimento");
        if(($this->GestioneDipartimento->isExists($dipartimento->getNome())) || $dipartimento == ""){
            return true;
        }
        throw new Exception("Inconsistenza dei dati nel database");
    }
    
    private function controllaNomeUtente($nomeUtente) {
        if(!preg_match("/^([a-zA-Z0-9]{3,12})$/",$nomeUtente)) {
            throw new Exception("Nome utente non valido");
        }        
    }
        
    private function controllaEmail($email) {
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) {
            throw new Exception("Email non valida");
        }
    }
    
    private function controllaTipologiaUtente($tipologia) {
        foreach($tipologia as $tipo) {
            if(!($tipo instanceof TipologiaUtente))
                throw new Exception("Non e' una tipologia");
            if(!$this->GestioneTipologiaUtente->isExists($tipo->getNome())){
                throw new Exception("Tipologia non esistente");
            }
        }
        return true;        
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
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->nome = $nome; 
    }
    
    function getCognome() {
        return $this->cognome;
    }
    
    function setCognome($cognome) {
        $newValues = array("Cognome" => $cognome);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->cognome = $cognome; 
    }
    
    function getNomeUtente() {
        return $this->nomeUtente;
    }
    
    function setNomeUtente($nomeUtente) {
        $this->controllaNomeUtente($nomeUtente);
        $newValues = array("NomeUtente" => $nomeUtente);
        $where = array("NomeUtente" => $this->nomeUtente);
        if(!$this->db->Update("Utente",$newValues,$where)) {
            throw new Exception("NomeUtente gia' presente");
        }
        $this->nomeUtente = mysql_real_escape_string($nomeUtente);
    }
    
    function getPassword() {
        return $this->password;
    }
    
    function setPassword($password) {
        $newValues = array("Password" => $password);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->password = md5($password);
    }
    
    function getDataNascita() {
        return $this->dataNascita;
    }
    
    function setDataNascita($dataNascita) {
        $newValues = array("DataNascita" => $dataNascita);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->dataNascita = $dataNascita; 
    }
    
    function getComuneNascita() {
        return $this->comuneNascita;
    }
    
    function setComuneNascita($comuneNascita) {
        $newValues = array("ComuneNascita" => $comuneNascita);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->comuneNascita = $comuneNascita; 
    }
    
    function getProvinciaNascita() {
        return $this->provinciaNascita;
    }
    
    function setProvinciaNascita($provinciaNascita) {
        $newValues = array("ProvinciaNascita" => $provinciaNascita);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->provinciaNascita = $provinciaNascita;
    }
   
    function getComuneResidenza() {
        return $this->comuneResidenza;
    }
    
    function setComuneResidenza($comuneResidenza) {
        $newValues = array("ComuneResidenza" => $comuneResidenza);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->comuneResidenza = $comuneResidenza; 
    }
    
    function getProvinciaResidenza() {
        return $this->provinciaResidenza;
    }
    
    function setProvinciaResidenza($provinciaResidenza) {
        $newValues = array("ProvinciaResidenza" => $provinciaResidenza);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->provinciaResidenza = $provinciaResidenza;
    }
    
    function getEmail() {
        return $this->email;
    }
    
   function setEmail($email) {
        $this->controllaEmail($email);
        $newValues = array("Email" => $email);
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->email = mysql_real_escape_string($email);
    }
    
    function getDipartimento() {
        return $this->dipartimento;
    }

    function setDipartimento($dipartimento) {
        $this->controllaDipartimento($dipartimento);

        $newValues = array("Dipartimento" => $dipartimento->getID());
        $where = array("NomeUtente" => $this->nomeUtente);
        $this->db->Update("Utente",$newValues,$where);
        $this->dipartimento = $dipartimento;
    }
    
    function getTipologia() {
        return $this->tipologia;        
    }
    
    function addTipologia($tipologia) {
        if(!is_array($tipologia)) {
            $oldselect = $tipologia;
            $tipologia = array();
            $tipologia[0] = $oldselect;
        }
        else {
            throw new Exception("Errore addTipologia.");
        }
        
        if(!($tipologia[0] instanceof TipologiaUtente)) 
            throw new Exception("Non e' una tipologia");
        
        foreach($this->getTipologia() as $tipo) {
            if($tipologia->getNome() == $tipo->getNome())
                throw new Exception("Tipologia gia' esistente per utente");    
        }
        
        $this->controllaTipologiaUtente($tipologia);
        $newValues = array("NomeTipologia" => $tipologia[0]->getNome(),"IDUtente" => $this->getID());
        $this->db->Insert($newValues,"UtenteTipo");
        array_push($this->tipologia,$tipologia[0]);
    }
    function rimuoviTipologia($tipologia) {
        if(!($tipologia instanceof TipologiaUtente))
            throw new Exception("Non e' una tipologia");
        
        foreach($this->getTipologia() as $tipo) {
            if($tipologia->getNome() == $tipo->getNome()) {
                $removeValues = array("NomeTipologia" => $tipologia->getNome(), "IDUtente" => $this->getID());
                $this->db->Delete("UtenteTipo",$removeValues);
                return true;
            }
        }
        throw new Exception("Tipologia non esistente per utente");
    }
    function salva() {
        $values = array("Nome" => $this->nome, "Cognome" => $this->cognome, "NomeUtente" => $this->nomeUtente,
        "Password" => $this->password, "DataNascita" => $this->dataNascita, "ComuneNascita" => $this->comuneNascita,
        "ProvinciaNascita" => $this->provinciaNascita, "ComuneResidenza" => $this->comuneResidenza,
        "ProvinciaResidenza" => $this->provinciaResidenza, "Email" => $this->email,
        "Dipartimento" => $this->dipartimento->getID());
        $this->db->Insert($values,"Utente");
        $this->setID($this->db->LastInsertID());
        foreach($tipologia as $tipo) {
            $value = array("NomeTipologia" => $tipo, "IDUtente" => $this->getID());
            $this->db->Insert($value,"UtenteTipo");
        }
    }    

    function elimina() {
        $values = array("IDUtente" => $this->id);
        return $this->db->Delete("UtenteTipo",$values) && $this->db->Delete("Utente",$values);
    }
}

?>