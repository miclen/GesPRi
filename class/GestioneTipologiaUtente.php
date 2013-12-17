<?php
class GestioneTipologiaUtente {
    private $db;
    private $listaTipologiaUtente;
    
    function GestioneTipologiaUtente() {
        global $db;
        $this->db = $db;
        
        $listaTipologiaUtente = array();
        $select = $this->db->Select("TipologiaUtente");
        if($this->db->records > 1) {
            foreach($this->db->Select("TipologiaUtente") as $data) {
                $tmp = new TipologiaUtente($data['Nome']);
                array_push($listaTipologiaUtente,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("TipologiaUtente");
            $tmp = new TipologiaUtente($data['Nome']);
            array_push($listaTipologiaUtente,$tmp);
        }
        $this->listaTipologiaUtente = $listaTipologiaUtente;
    }
    function getListaTipologiaUtente() {
        return $this->listaTipologiaUtente;
    }
    function inserisciTipologiaUtente($tipologiaUtente) {
        $value = array("Nome" => $tipologiaUtente);
        $this->db->Select("TipologiaUtente",$value);
        if($this->db->records <= 0) {
            $tmp = new TipologiaUtente($tipologiaUtente);
            $tmp->salva();
            array_push($this->listaTipologiaUtente,$tmp);       
        } else {
            throw new Exception("Tipologia Utente e' gia' esistente");
        }
    }
    function eliminaTipologiaUtente($nome) {
        $i = 0;
        foreach($this->listaTipologiaUtente as $data) {
            if($data->getNome() == $nome) {
                $data->elimina();
                $tmp = array_pop($this->listaTipologiaUtente);
                $this->listaTipologiaUtente[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Tipologia Utente non esistente");
    }
    function isExists($nome) {
        foreach($this->listaTipologiaUtente as $data) {
            if($data->getNome() == $nome) {
                return true;
            }
        }
        return false;
    }
    function getTipologiaUtente($nome) {
        foreach($this->listaTipologiaUtente as $data) {
            if($data->getNome() == $nome)
                return $data;
        }
        throw new Exception("Tipologia non trovata");
    }
}
?>