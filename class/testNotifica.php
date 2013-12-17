<?php
require '../configuration.php';

$GestioneAreaScientifica = new GestioneAreaScientifica();
$GestioneDipartimento = new GestioneDipartimento();
$GestioneUtente = new GestioneUtente();

//$utente = $GestioneUtente->inserisciUtente("Antonio","Caccioppoli","ACaccioppoli","gay","1991-12-12","Castellammare di Stabia",
//                             "Napoli","Castellammare di Stabia","Napoli","a.cacc@gmail.com","Dip3");
$GestioneNotifica = new GestioneNotifica();
//$GestioneNotifica->inserisciNotifica("ciao","ACacc","mammt");
//$GestioneNotifica->eliminaNotifica("1");
$notifiche = $GestioneNotifica->getNotificheByDestinatario($GestioneUtente->getUtenteByID(82));
foreach($notifiche as $notifica) {
    echo $notifica->getData()."<br/>";
}
?>