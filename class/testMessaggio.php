<?php
require '../configuration.php';

$GestioneAreaScientifica = new GestioneAreaScientifica();
$GestioneDipartimento = new GestioneDipartimento();
$GestioneUtente = new GestioneUtente();
$GestioneMessaggio= new GestioneMessaggio();

$GestioneMessaggio->eliminaMessaggio("2");
$GestioneMessaggio->eliminaMessaggio("3");
$GestioneMessaggio->inserisciMessaggio("ciao","ACacc","mammt","saluti");
$GestioneMessaggio->inserisciMessaggio("ACacc","ciao","sort","saluti");
$messaggi = $GestioneMessaggio->getMessaggiByDestinatario($GestioneUtente->getUtenteByID(82));
foreach($messaggi as $messaggio) {
    echo $messaggio->getData()."<br/>";
}
?>