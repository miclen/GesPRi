<?php

class GestioneMessaggio {
    
    private $db;
    private $listaMessaggio;
    private $GestioneUtente;
    
    function GestioneMessaggio() {
        global $db;
        $this->db = $db;
        global $GestioneUtente;
        $this->GestioneUtente = $GestioneUtente;
        
        $listaMessaggio = array();
        
        $select = $this->db->Select("Messaggio");
        if($this->db->records > 1) {
            foreach($this->db->Select("Messaggio") as $data) {
                $mittente = $GestioneUtente->getUtenteByID($data['Mittente']);
                $destinatario = $GestioneUtente->getUtenteByID($data['Destinatario']);
                $tmp = new Messaggio($data['IDMessaggio'],$mittente,$destinatario,$data['Testo'],$data['Data'],$data['Oggetto']);
                array_push($listaMessaggio,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("Messaggio");
            $mittente = $GestioneUtente->getUtenteByID($data['Mittente']);
            $destinatario = $GestioneUtente->getUtenteByID($data['Destinatario']);
            $tmp = new Messaggio($data['IDMessaggio'],$mittente,$destinatario,$data['Testo'],$data['Data'],$data['Oggetto']);
            array_push($listaMessaggio,$tmp);
        }
        $this->listaMessaggio = $listaMessaggio;     
    }
    function getListaMessaggio() {
        return $this->listaMessaggio;
    }
    function inserisciMessaggio($mittente,$destinatario,$testo,$oggetto) {
        $data = date('Y-m-d h:i:s');
        $mittente = $this->GestioneUtente->getUtenteByNomeUtente($mittente);
        $destinatario = $this->GestioneUtente->getUtenteByNomeUtente($destinatario);
        $tmp = new Messaggio(0,$mittente,$destinatario,$testo,$data,$oggetto);
        $tmp->salva();
        array_push($this->listaMessaggio,$tmp);
    }
    
    function eliminaMessaggio($id) {
        $i = 0;
        foreach($this->listaMessaggio as $data) {
            if($data->getID() == $id) {
                $data->elimina();
                $tmp = array_pop($this->listaMessaggio);
                $this->listaMessaggio[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Messaggio non esistente");
    }
    
    function isExists($id) {
        foreach($this->listaMessaggio as $data) {
            if($data->getID() == $id) {
                return true;
            }
        }
        return false;
    }
    
    function getMessaggioByID($id) {
        foreach($this->listaMessaggio as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Messaggio non esistente");
    }
    
    function getMessaggiByMittente($mittente) {
        $messaggi = array();
        
        foreach($this->listaMessaggio as $data) {
            if($data->getMittente() == $mittente) {
                array_push($messaggi,$data);
            }
        }
        if(count($messaggi) <= 0)
            throw new Exception("Non esistono messaggi inviati");
        else
            return $messaggi;
    }
    
    function getMessaggiByDestinatario($destinatario) {
        $messaggi = array();
        
        foreach($this->listaMessaggio as $data) {
            if($data->getDestinatario() == $destinatario) {
                array_push($messaggi,$data);
            }
        }
        if(count($messaggi) <= 0)
            throw new Exception("Non esistono messaggi ricevuti");
        else
            return $messaggi;
    }
}
?>