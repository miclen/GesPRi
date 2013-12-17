<?php

if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}


class GestioneBandoVQR {
    
    private $db;
    private $listaBandoVQR;
    
    function GestioneBandoVQR() {
        global $db;
        $this->db = $db;
        $listaBandoVQR = array();
        $select = $this->db->Select("BandoVQR");
        if($this->db->records > 1) {
            foreach($this->db->Select("BandoVQR") as $data) {
                $tmp = new BandoVQR($data['IDBando'],$data['Nome'], $data['DataApertura'], $data['DataChiusura'], $data['NumeroProdottiConsigliati']);
                array_push($listaBandoVQR,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("BandoVQR");
            $tmp = new BandoVQR($data['IDBando'],$data['Nome'], $data['DataApertura'], $data['DataChiusura'], $data['NumeroProdottiConsigliati']);
            array_push($listaBandoVQR,$tmp);
        }
        $this->listaBandoVQR = $listaBandoVQR;
    }
    function getListaBandoVQR() {
        return $this->listaBandoVQR;
    }
    
    function inserisciBandoVQR($nome, $dataApertura, $dataChiusura, $numeroConsigliati) {
        $value = array("Nome" => $nome, "DataApertura" => $dataApertura, "DataChiusura" => $dataChiusura, "NumeroProdottiConsigliati" => $numeroConsigliati);
        $this->db->Select("BandoVQR",$value);
        if($this->db->records <= 0) {
            $tmp = new BandoVQR(0,$nome,$dataApertura,$dataChiusura,$numeroConsigliati);
            $tmp->salva();
            array_push($this->listaBandoVQR,$tmp);       
        } else {
            throw new Exception("Bando VQR e' gia' esistente");
        }
    }
    function eliminaBandoVQR($nome) {
        $i = 0;
        foreach($this->listaBandoVQR as $data) {
            if($data->getNome() == $nome) {
                $data->elimina();
                $tmp = array_pop($this->listaBandoVQR);
                $this->listaBandoVQR[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Bando VQR non esistente");
    }
    function modificaNomeBandoVQR($oldnome,$newNome) {
        foreach($this->listaBandoVQR as $data) {
            if($data->getNome() == $oldnome) {
                $data->setNome($newNome);
                return true;
            }
        }
        throw new Exception("Bando VQR non esistente");
    }
    function modificaChiusuraBandoVQR($nome,$nuovaChiusura) {
        foreach($this->listaBandoVQR as $data) {
            if($data->getNome() == $nome) {
                $data->setDataChiusura($nuovaChiusura);
                return true;
            }
        }
        throw new Exception("Bando VQR non esistente");
    }
    function isExists($nome) {
        foreach($this->listaBandoVQR as $data) {
            if($data->getNome() == $nome) {
                return true;
            }
        }
        return false;
    }
    function getBandoVQRByID($id) {        
        foreach($this->listaBandoVQR as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Bando VQR non esistente");
    }
    function getBandoVQRByName($nome) {
        foreach($this->listaBandoVQR as $data) {
            if($data->getNome() == $nome) {
                return $data;
            }
        }
        throw new Exception("Bando VQR non esistente");
    }
    
}

?>