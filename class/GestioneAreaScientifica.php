<?php

class GestioneAreaScientifica {
    private $db;
    private $listaAreaScientifica;
    
    function GestioneAreaScientifica() {
        global $db;
        $this->db = $db;
        $listaAreaScientifica = array();
        $select = $this->db->Select("AreaScientifica");
        if($this->db->records > 1) {
            foreach($this->db->Select("AreaScientifica") as $data) {
                $tmp = new AreaScientifica($data['IDAreaScientifica'],$data['NomeAreaScientifica']);
                array_push($listaAreaScientifica,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("AreaScientifica");
            $tmp = new AreaScientifica($data['IDAreaScientifica'],$data['NomeAreaScientifica']);
            array_push($listaAreaScientifica,$tmp);
        }
        $this->listaAreaScientifica = $listaAreaScientifica;
    }
    function getListaAreaScientifica() {
        return $this->listaAreaScientifica;
    }
    
    function inserisciAreaScientifica($nome) {
        $value = array("NomeAreaScientifica" => $nome);
        $this->db->Select("AreaScientifica",$value);
        if($this->db->records <= 0) {
            $tmp = new AreaScientifica(0,$nome);
            $tmp->salva();
            array_push($this->listaAreaScientifica,$tmp);       
        } else {
            throw new Exception("AreaScientifica e' gia' esistente");
        }
    }
    function eliminaAreaScientifica($nome) {
        $i = 0;
        foreach($this->listaAreaScientifica as $data) {
            if($data->getNome() == $nome) {
                $data->elimina();
                $tmp = array_pop($this->listaAreaScientifica);
                $this->listaAreaScientifica[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("AreaScientifica non esistente");
    }
    function modificaAreaScientifica($oldnome,$newNome) {
        foreach($this->listaAreaScientifica as $data) {
            if($data->getNome() == $oldnome) {
                $data->setNome($newNome);
                return true;
            }
        }
        throw new Exception("AreaScientifica non esistente");
    }
    function isExists($nome) {

        foreach($this->listaAreaScientifica as $data) {
            if($data->getNome() == $nome) {
                return true;
            }
        }
        return false;
    }
    function getAreaScientificaByID($id) {        
        foreach($this->listaAreaScientifica as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Area Scientifica non esistente");
    }
    function getAreaScientificaByName($nome) {
        foreach($this->listaAreaScientifica as $data) {
            if($data->getNome() == $nome) {
                return $data;
            }
        }
        throw new Exception("Area Scientifica non esistente");
    }
}

?>