<?php
require '../configuration.php';
require 'BandoVQR.php';
require 'GestioneBandoVQR.php';
$GestioneBando = new GestioneBandoVQR();
//$GestioneBando->inserisciBandoVQR("Deo",date('Y-m-d'),date('2014-12-12'),10);
//$GestioneBando->eliminaBandoVQR("Deo");
//$GestioneBando->modificaBandoVQR("Amedeo","Deo");
$GestioneBando->inserisciBandoVQR("Lol",date('Y-m-d'),date('2014-12-12'),10);
$GestioneBando->modificaBandoVQR("Lol","Deo");

?>