<?php

class GestioneUtente {
    
    private $db;
    private $listaUtente;
    private $GestioneDipartimento;
    private $GestioneTipologiaUtente;
    
    function GestioneUtente() {
        global $db;
        $this->db = $db;
        
        global $GestioneDipartimento;
        $this->GestioneDipartimento = $GestioneDipartimento;
        
        global $GestioneTipologiaUtente;
        $this->GestioneTipologiaUtente = $GestioneTipologiaUtente;
        
        $listaUtente = array();
        
        $select = $this->db->Select("Utente");
        if($this->db->records == 1) {
            $oldselect = $select;
            $select = array();
            $select[0] = $oldselect;
        }
        if($this->db->records >= 1) {
            foreach($select as $data) {
                if(!empty($data['Dipartimento']))
                    $dipartimento = $GestioneDipartimento->getDipartimentoByID($data['Dipartimento']);
                else
                    $dipartimento = "";

                $tipologia = $this->db->Select("UtenteTipo",array("IDUtente" => $data['IDUtente']));
                if($this->db->records <= 0) {
                    throw new Exception("Inconsistenza nei dati di TipologiaUtente");
                }
                if($this->db->records == 1) {
                    $oldselect = $tipologia;
                    $tipologia = array();
                    $tipologia[0] = $oldselect;
                }
                for($i=0;$i<count($tipologia);$i++) {
                    $tipologia[$i] = $this->GestioneTipologiaUtente->getTipologiaUtente($tipologia[$i]['NomeTipologia']);
                }
                $tmp = new Utente($data['IDUtente'],$data['Nome'],$data['Cognome'],$data['NomeUtente'],$data['Password'],$data['DataNascita'],$data['ComuneNascita'],$data['ProvinciaNascita'],$data['ComuneResidenza'],$data['ProvinciaResidenza'],$data['Email'],$dipartimento,$tipologia);
                array_push($listaUtente,$tmp);
            }
        }
        $this->listaUtente = $listaUtente;
    }
    
    function getListaUtente() {
        return $this->listaUtente;
    }
    function inserisciUtente($nome,$cognome,$nomeUtente,$password,$dataNascita,$comuneNascita,$provinciaNascita,$comuneResidenza,$provinciaResidenza,$email,$dipartimento,$tipologia) {
        $dipartimento = $this->GestioneDipartimento->getDipartimentoByName($dipartimento);
        $tipologia = $this->GestioneTipologiaUtente->getTipologiaUtente($tipologia);
        
        $value = array("NomeUtente" => $nomeUtente);
        $this->db->Select("Utente",$value);
        if($this->db->records <= 0) {
            $tmp = new Utente(0,$nome,$cognome,$nomeUtente,$password,$dataNascita,$comuneNascita,$provinciaNascita,$comuneResidenza,$provinciaResidenza,$email,$dipartimento,$tipologia);
            $tmp->salva();
            array_push($this->listaUtente,$tmp);       
        } else {
            throw new Exception("Utente e' gia' esistente");
        }
    }
    function eliminaUtente($nomeUtente) {
        $i = 0;
        foreach($this->listaUtente as $data) {
            if($data->getNomeUtente() == $nomeUtente) {
                $data->elimina();
                $tmp = array_pop($this->listaUtente);
                $this->listaUtente[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Utente non esistente");
    }
    
    function modificaDatiUtente($id,$newValues) {
        foreach($this->listaUtente as $utente) {
            if($utente->getID() == $id) {
                if(!empty($newValues['Nome'])) {
                    $utente->setNome($newValues['Nome']);
                }
                if(!empty($newValues['Cognome'])) {
                    $utente->setCognome($newValues['Cognome']);
                }
                if(!empty($newValues['NomeUtente'])) {
                    $utente->setNomeUtente($newValues['NomeUtente']);
                }
                if(!empty($newValues['Password'])) {
                    $utente->setPassword($newValues['Password']);
                }
                if(!empty($newValues['DataNascita'])) {
                    $utente->setDataNascita($newValues['DataNascita']);
                }
                if(!empty($newValues['ComuneNascita'])) {
                    $utente->setComuneNascita($newValues['ComuneNascita']);
                }
                if(!empty($newValues['ProvinciaNascita'])) {
                    $utente->setProvinciaNascita($newValues['ProvinciaNascita']);
                }
                if(!empty($newValues['ComuneResidenza'])) {
                    $utente->setComuneResidenza($newValues['ComuneResidenza']);
                }
                if(!empty($newValues['ProvinciaResidenza'])) {
                    $utente->setProvinciaResidenza($newValues['ProvinciaResidenza']);
                }
                if(!empty($newValues['Email'])) {
                    $utente->setEmail($newValues['Email']);
                }
                if(!empty($newValues['Dipartimento'])) {
                    $utente->setDipartimento($newValues['Dipartimento']);
                }
                if(!empty($newValues['Tipologia'])) {
                    $utente->setDipartimento($newValues['Tiologia']);
                }
                return true;
            }
            throw new Exception("Utente non esistente");
        }
    }
    function addTipologiaUtente($utente, $tipologia) {
        if(!($utente instanceof Utente)) {
            throw new Exception("Non e' un utente");
        }
        if($this->isExists($utente->getNomeUtente())) {
            $utente->addTipologia($tipologia);
        }
        else {
            throw new Exception("Utente non esistente");
        }
    }
    function getTipologie($utente) {
        if(!($utente instanceof Utente)) {
            throw new Exception("Non e' un utente");
        }
        if($this->isExists($utente->getNomeUtente())) {
            return $utente->getTipologia();
        }
        else {
            throw new Exception("Utente non esistente");
        }
    }
    
    function isUserMemberOf($utente,$tipologia) {
        
        if(!$this->isExists($utente->getNomeUtente()))
            throw new Exception("Utente non esistente");
        
        $tipologie = $this->getTipologie($utente);
        foreach($tipologie as $tipo) {
            if($tipo->getNome() == $tipologia->getNome())
                return true;
        }
        return false;
    }
    
    function eliminaTipologiaUtente($utente,$tipologia) {
        
        $tipologie = $this->getTipologie($utente);
        
        if(count($tipologie) == 1)
            throw new Exception("Solo una tipologia per utente");
                
        if($this->isUserMemberOf($utente,$tipologia)) {
                $utente->rimuoviTipologia($tipologia);
                return $tipologia;
        }
        throw new Exception("Tipologia non trovata in utente");
    }
    
    function isExists($nomeUtente) {
        foreach($this->listaUtente as $data) {
            if($data->getNomeUtente() == $nomeUtente) {
                return true;
            }
        }
        return false;
    }
    
    function getUtenteByID($id) {        
        foreach($this->listaUtente as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Utente non esistente");
    }
    
    function getUtenteByNomeUtente($nomeUtente) {
        foreach($this->listaUtente as $data) {
            if($data->getNomeUtente() == $nomeUtente) {
                return $data;
            }
        }
        throw new Exception("Utente non esistente");
    }
}
?>