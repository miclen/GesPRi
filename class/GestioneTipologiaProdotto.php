<?php
class GestioneTipologiaProdotto {
    private $db;
    private $listaTipologiaProdotto;
    
    function GestioneTipologiaProdotto() {
        global $db;
        $this->db = $db;
        
        $listaTipologiaProdotto = array();
        $select = $this->db->Select("TipologiaProdotto");
        if($this->db->records > 1) {
            foreach($this->db->Select("TipologiaProdotto") as $data) {
                $tmp = new TipologiaProdotto($data['Nome']);
                array_push($listaTipologiaProdotto,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("TipologiaProdotto");
            $tmp = new TipologiaProdotto($data['Nome']);
            array_push($listaTipologiaProdotto,$tmp);
        }
        $this->listaTipologiaProdotto = $listaTipologiaProdotto;
    }
    function getListaTipologiaProdotto() {
        return $this->listaTipologiaProdotto;
    }
    function inserisciTipologiaProdotto($tipologiaProdotto) {
        $value = array("Nome" => $tipologiaProdotto);
        $this->db->Select("TipologiaProdotto",$value);
        if($this->db->records <= 0) {
            $tmp = new TipologiaProdotto($tipologiaProdotto);
            $tmp->salva();
            array_push($this->listaTipologiaProdotto,$tmp);       
        } else {
            throw new Exception("Tipologia Prodotto e' gia' esistente");
        }
    }
    function eliminaTipologiaProdotto($nome) {
        $i = 0;
        foreach($this->listaTipologiaProdotto as $data) {
            if($data->getNome() == $nome) {
                $data->elimina();
                $tmp = array_pop($this->listaTipologiaProdotto);
                $this->listaTipologiaProdotto[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Tipologia Prodotto non esistente");
    }
    function isExists($nome) {
        foreach($this->listaTipologiaProdotto as $data) {
            if($data->getNome() == $nome) {
                return true;
            }
        }
        return false;
    }
    function getTipologiaProdotto($nome) {
        foreach($this->listaTipologiaProdotto as $data) {
            if($data->getNome() == $nome)
                return $data;
        }
        throw new Exception("Tipologia non trovata");
    }
}
?>