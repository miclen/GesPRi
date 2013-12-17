<?php
require '../configuration.php';

$nome = "a";
$cognome= "B";
$nomeUtente = "miclen";
$password = "d";
$dataNascita = "1992-12-09";
$comuneNascita = "f";
$provinciaNascita = "g";
$comuneResidenza = "h";
$provinciaResidenza = "i";
$email = "cgnghl@hhh.com";
$GestioneAreaScientifica = new GestioneAreaScientifica();
$GestioneDipartimento = new GestioneDipartimento();
$dip = $GestioneDipartimento->getDipartimentoByName("Dip2");
$GestioneTipologiaUtente = new GestioneTipologiaUtente();
$GestioneUtente = new GestioneUtente();/*
$save = $GestioneUtente->getUtenteByID(82);
$tipologie = $save->getTipologia();
foreach($tipologie as $tipologia) {
    echo $tipologia->getNome()."<br/>";
}
*/
$tipologia = $GestioneTipologiaUtente->getTipologiaUtente("Ricercatore");
/*
$tipo = $GestioneUtente->eliminaTipologiaUtente($save,$tipologia);
print_r($tipo);
*/

$utente = $GestioneUtente->inserisciUtente($nome,$cognome,$nomeUtente,$password,$dataNascita,$comuneNascita,$provinciaNascita,$comuneResidenza,$provinciaResidenza,$email,"Dip2","Ricercatore");


//$dipartimento = $GestioneTipologiaUtente->getTipologiaUtente("Dipartimento");
//$GestioneUtente->addTipologiaUtente($save,$dipartimento);
//$GestioneUtente->inserisciUtente($nome,$cognome,$nomeUtente,$password,$dataNascita,$comuneNascita,$provinciaNascita,$comuneResidenza,$provinciaResidenza,$email,"Dip15","Ricercatore");
//$GestioneUtente->eliminaUtente("cirosom");
//$array = array("Dipartimento" => $dip);
//$GestioneUtente->modificaDatiUtente(81,$array);
?>