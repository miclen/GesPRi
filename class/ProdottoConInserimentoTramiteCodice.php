<?php

class ProdottoConInserimentoTramiteCodice extends Prodotto {
    
    private $codiceDOI;
    private $tipologia;
    
    function ProdottoConInserimentoTramiteCodice($id,$titolo,$stato = "Provvisorio",$nomeTipologia,$proprietario,$codiceDOI = "",$tipologia = "") {
        
        parent::__construct($id,$titolo,$stato,$nomeTipologia,$proprietario);
        $this->codiceDOI = $codiceDOI;
        $this->tipologia = $tipologia;
    }
    
    function getCodiceDOI() {
        return $codiceDOI;
    }
    
    function setCodiceDOI($codiceDOI) {
        $this->codiceDOI = $codiceDOI;
    }
    
    function getTipologia() {
        return $this->tipologia;
    }
    
    function setTipologia($tipologia) {
        $this->tipologia = $tipologia;
    }
}

?>