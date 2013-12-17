<?php

/*
 * File di configurazione di GesPRi
 * Autore : Ciro Somma
*/

/* Sostituire i parametri dbname, dbuser, dbpwd
 * con i dati di connessione al proprio
 * database MySQL
 * Sostituire il parametro dirbase con la
 * directory di lavoro (local web)
 * Includere qui tutte le classi
*/
$conf = array("dbhost" => "localhost",
            "dbname" => "test", 
            "dbuser" => "root",
            "dbpwd" => "abc345lm",
            "dirbase" => "/projectis");

require 'class/MySQL.php';
require 'class/AdminLogin.php';
require 'class/Admin.php';
require 'class/AreaScientifica.php';
require 'class/GestioneAreaScientifica.php';
require 'class/Dipartimento.php';
require 'class/GestioneDipartimento.php';
require 'class/Utente.php';
require 'class/GestioneUtente.php';
//require 'class/Notifica.php';
//require 'class/GestioneNotifica.php';
//require 'class/Messaggio.php';
//require 'class/GestioneMessaggio.php';
require 'class/TipologiaUtente.php';
require 'class/GestioneTipologiaUtente.php';
require 'class/LoginUtente.php';

$db = new MySQL($conf['dbname'],$conf['dbuser'],$conf['dbpwd'],$conf['dbhost']);

?>
