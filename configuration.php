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
*/
$conf = array("dbhost" => "localhost",
            "dbname" => "test", 
            "dbuser" => "root",
            "dbpwd" => "abc345lm",
            "dirbase" => "/projectis");

require 'class/MySQL.php';
require 'class/AdminLogin.php';

$db = new MySQL($conf['dbname'],$conf['dbuser'],$conf['dbpwd'],$conf['dbhost']);

?>
