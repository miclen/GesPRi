<?php

class GestioneNotifica {
    
    private $db;
    private $listaNotifica;
    private $GestioneUtente;
    
    function GestioneNotifica() {
        global $db;
        $this->db = $db;
        global $GestioneUtente;
        $this->GestioneUtente = $GestioneUtente;
        
        $listaNotifica = array();
        
        $select = $this->db->Select("Notifica");
        if($this->db->records > 1) {
            foreach($this->db->Select("Notifica") as $data) {
                $mittente = $GestioneUtente->getUtenteByID($data['Mittente']);
                $destinatario = $GestioneUtente->getUtenteByID($data['Destinatario']);
                $tmp = new Notifica($data['IDNotifica'],$mittente,$destinatario,$data['Testo'],$data['Data'],$data['Link']);
                array_push($listaNotifica,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("Notifica");
            $mittente = $GestioneUtente->getUtenteByID($data['Mittente']);
            $destinatario = $GestioneUtente->getUtenteByID($data['Destinatario']);
            $tmp = new Notifica($data['IDNotifica'],$mittente,$destinatario,$data['Testo'],$data['Data'],$data['Link']);
            array_push($listaNotifica,$tmp);
        }
        $this->listaNotifica = $listaNotifica;     
    }
    function getListaNotifica() {
        return $this->listaNotifica;
    }
    function inserisciNotifica($mittente,$destinatario,$testo,$link = "") {
        $data = date('Y-m-d h:i:s');
        $mittente = $this->GestioneUtente->getUtenteByNomeUtente($mittente);
        $destinatario = $this->GestioneUtente->getUtenteByNomeUtente($destinatario);
        $tmp = new Notifica(0,$mittente,$destinatario,$testo,$data,$link);
        $tmp->salva();
        array_push($this->listaNotifica,$tmp);       
    }
    
    function eliminaNotifica($id) {
        $i = 0;
        foreach($this->listaNotifica as $data) {
            if($data->getID() == $id) {
                $data->elimina();
                $tmp = array_pop($this->listaNotifica);
                $this->listaNotifica[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Notifica non esistente");
    }
    
    function isExists($id) {
        foreach($this->listaNotifica as $data) {
            if($data->getID() == $id) {
                return true;
            }
        }
        return false;
    }
    
    function getNotificaByID($id) {        
        foreach($this->listaNotifica as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Notifica non esistente");
    }
    
    function getNotificheByDestinatario($destinatario) {
        $notifiche = array();
        
        foreach($this->listaNotifica as $data) {
            if($data->getDestinatario() == $destinatario) {
                array_push($notifiche,$data);
            }
        }
        if(count($notifiche) <= 0)
            throw new Exception("Notifica non esistente");
        else {
            rsort($notifiche);
            return $notifiche;
        }
    }
}

?>