<?php

class ProdottoConInserimentoManuale extends Prodotto{

    private $codiceDOI;
    private $annoPubblicazione;
    private $formatoPubblicazione;
    private $linguaPubblicazione;
    private $nomeRivista;
    private $paginaIniziale;
    private $pagineFinale;
    private $riassunto;     ///abstact non va
    private $link;

    function ProdottoConInserimentoManuale($id,$titolo,$stato = "Provvisorio",$nomeTipologia,$proprietario,$codiceDOI = "",$annoPubblicazione = "",$formatoPubblicazione = "",$nomeRivista = "",$paginaIniziale = "",$paginaFinale = "",$riassunto = "",$link = "") {
        
        parent::__construct($id,$titolo,$stato,$nomeTipologia,$proprietario);
        $this->controllaPagine($paginaIniziale,$paginaFinale);
        $this->controllaAnnoPubblicazione($annoPubblicazione);
        $this->controllaLink($link);
        
        $this->codiceDOI = $codiceDOI;
        $this->annoPubblicazione = $annoPubblicazione;
        $this->formatoPubblicazione = $formatoPubblicazione;
        $this->linguaPubblicazione = $linguaPubblicazione;
        $this->formatoImportazione = $formatoImportazione;
        $this->nomeRivista = $nomeRivista;
        $this->paginaIniziale = $paginaIniziale;
        $this->pagineFinale = $paginaFinale;
        $this->riassunto = $riassunto;
        $this->link = $link;
    }
    
    private function controllaPagine($paginaIniziale,$pagineFinale) {
        if((intval($paginaIniziale)) <= (intval($pagineFinale)))
            return true;
        throw new Exception("Pagina iniziale o finale non correttamente inserite");
    }
    
    //giusto?
    private function controllaAnnoPubblicazione($annoPubblicazione) {
        if( (intval($annoPubblicazione) > 2000) && (intval($annoPubblicazione) < 2050))
            return true;
        throw new Exception ("Anno non inserito correttamente");
    }
    
    //fare
    private function controllaLink($link) {
        
    }
    
}

?>