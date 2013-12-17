<?php

class GestioneDipartimento {

    private $db;
    private $listaDipartimento;
    private $GestioneAreaScientifica;
    
    function GestioneDipartimento() {
        global $db;
        $this->db = $db;
        global $GestioneAreaScientifica;
        $this->GestioneAreaScientifica = $GestioneAreaScientifica;
        $listaDipartimento = array();
        
        $select = $this->db->Select("Dipartimento");
        if($this->db->records > 1) {
            foreach($this->db->Select("Dipartimento") as $data) {
                if(!empty($data['IDAreaScientifica']))
                    $areaScientifica = $GestioneAreaScientifica->getAreaScientificaByID($data['IDAreaScientifica']);
                else
                    $areaScientifica = "";
                $tmp = new Dipartimento($data['IDDipartimento'],$data['Nome'],$areaScientifica);
                array_push($listaDipartimento,$tmp);
            }
        }
        else if($this->db->records == 1) {
            $data = $this->db->Select("Dipartimento");
            if(!empty($data['IDAreaScientifica']))
                $areaScientifica = $GestioneAreaScientifica->getAreaScientificaByID($data['IDAreaScientifica']);
            else
                $areaScientifica = "";
            $tmp = new Dipartimento($data['IDDipartimento'],$data['Nome'],$areaScientifica);
            array_push($listaDipartimento,$tmp);
        }
        $this->listaDipartimento = $listaDipartimento;
    }
    function getListaDipartimento() {
        return $this->listaDipartimento;
    }
    function inserisciDipartimento($nome,$areaScientifica) {
        $areaScientifica = $this->GestioneAreaScientifica->getAreaScientificaByName($areaScientifica);

        $value = array("Nome" => $nome,"AreaScientifica" => $areaScientifica->getID());
        $this->db->Select("Dipartimento",$value);
        if($this->db->records <= 0) {
            $tmp = new Dipartimento(0,$nome,$areaScientifica);
            $tmp->salva();
            array_push($this->listaDipartimento,$tmp);       
        } else {
            throw new Exception("Dipartimento e' gia' esistente");
        }
        
        return $tmp;
    }
    function eliminaDipartimento($nome) {
        $i = 0;
        foreach($this->listaDipartimento as $data) {
            if($data->getNome() == $nome) {
                $data->elimina();
                $tmp = array_pop($this->listaDipartimento);
                $this->listaDipartimento[$i] = $tmp;
                return true;
            }
            $i++;
        }
        throw new Exception("Dipartimento non esistente");
    }
    function modificaNomeDipartimento($oldnome,$newNome) {
        foreach($this->listaDipartimento as $data) {
            if($data->getNome() == $oldnome) {
                $data->setNome($newNome);
                return true;
            }
        }
        throw new Exception("Dipartimento non esistente");
    }
    
    //
    function modificaAreaScientifica($nome,$nomeAreaScientifica) {
        /* Implementare */
    }
    function isExists($nome) {
        foreach($this->listaDipartimento as $data) {
            if($data->getNome() == $nome) {
                return true;
            }
        }
        return false;
    }
    function getDipartimentoByID($id) {        
        foreach($this->listaDipartimento as $data) {
            if($data->getID() == $id) {
                return $data;
            }
        }
        throw new Exception("Dipartimento non esistente");
    }
    
    function getDipartimentoByName($nome) {
        foreach($this->listaDipartimento as $data) {
            if($data->getNome() == $nome) {
                return $data;
            }
        }
        throw new Exception("Dipartimento non esistente");
    }
}

?>