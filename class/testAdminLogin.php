<?php

require '../configuration.php';
/*
$testAdmin = new AdminLogin();
if($testAdmin->firstStart())
    echo "ok!";
else
    echo "error..";
*/
    
$testBando = new Admin();
if($testBando->creaBandoVQR("A",date('Y-m-d'),date('Y-m-d'),4))
    echo "ok!";
if($testBando->creaBandoVQR("B",date('Y-m-d'),date('Y-m-d'),4))
    echo "ok!";
    
?>