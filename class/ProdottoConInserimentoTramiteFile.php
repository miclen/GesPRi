<?php

class ProdottoConInserimentoTramiteFile extends Prodotto {
    
    private $formatoImportazione;
    private $file;
    
    function ProdottoConInserimentoTramiteFile($id,$titolo,$stato = "Provvisorio",$nomeTipologia,$proprietario,$formatoImportazione,$file) {
        
        parent::__construct($id,$titolo,$stato,$nomeTipologia,$proprietario);
        $this->formatoImportazione = $formatoImportazione;
        $this->file = $file;  
    }
    
    function getFormatoImportazione() {
        return $formatoImportazione;
    }
    
    function setFormatoImportazione($formatoImportazione) {
        $this->formatoImportazione = $formatoImportazione;
    }
    
    function getFile() {
        return $file;
    }
    
    function setFile($file) {
        $this->file = $file;
    }
    
}

?>