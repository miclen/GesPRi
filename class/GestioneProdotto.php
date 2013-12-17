<?php

class GestioneProdotto {
    
    private $db;
    private $listaProdotto;
    private $GestioneUtente;
    private $GestioneTipologia;
    
    function GestioneProdotto() {
        
        global $db;
        $this->db = $db;
        global $GestioneUtente;
        $this->GestioneUtente = $GestioneUtente;
        global $GestioneTipologia;
        $this->GestioneTipologia = $GestioneTipologia;
        
        $listaProdotto = array();
        
        $select = $this->db->Select("Prodotto");
        if($this->db->records > 1) {
            foreach($this->db->Select("Prodotto") as $data) {
                $proprietario = $GestioneUtente->getUtenteByID($data['Proprietario']);
                $nomeTipologia = $GestioneTipologiaProdotto->getTipologiaProdotto($data['NomeTipologia']);
                //CODICE MANCANTE, ISTANZIARE PRODOTTO
                array_push($listaProdotto,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("Prodotto");
            $proprietario = $GestioneUtente->getUtenteByID($data['Proprietario']);
            $nomeTipologia = $GestioneTipologiaProdotto->getTipologiaProdotto($data['NomeTipologia']);
            //CODICE MANCANTE, ISTANZIARE PRODOTTO
            array_push($listaProdotto,$tmp);
        }
        $this->listaProdotto = $listaProdotto;     
    }
    function getListaProdotto() {
        return $this->listaProdotto;
    }
    
    function inserimentoManuale() {

    }
    
    
    function eliminaProdotto($id) {
        $i = 0;
        foreach($this->listaProdotto as $data) {
            if($data->getID() == $id) {
                $data->elimina();
                $tmp = array_pop($this->listaProdotto);
                $this->listaProdotto[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Prodotto non esistente");
    }
    
    function isExists($id) {
        foreach($this->listaProdotto as $data) {
            if($data->getID() == $id) {
                return true;
            }
        }
        return false;
    }
    
    function getProdottoByID($id) {        
        foreach($this->listaProdotto as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Prodotto non esistente");
    }
    
    /*
    function getNotificheByDestinatario($destinatario) {
        $notifiche = array();
        
        foreach($this->listaProdotto as $data) {
            if($data->getDestinatario() == $destinatario) {
                array_push($notifiche,$data);
            }
        }
        if(count($notifiche) <= 0)
            throw new Exception("Prodotto non esistente");
        else {
            rsort($notifiche);
            return $notifiche;
        }
    }
    */
}

?>