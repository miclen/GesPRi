<?php
require '../configuration.php';
$GestioneAreaScientifica = new GestioneAreaScientifica();
$GestioneDipartimento = new GestioneDipartimento();
$GestioneTipologiaUtente = new GestioneTipologiaUtente();
$GestioneUtente = new GestioneUtente();
$GestioneLogin = new LoginUtente();
$username = @$_REQUEST['username'];
$password = @$_REQUEST['password'];
echo md5($password);
if(isset($username) && isset($password)) {
    if($GestioneLogin->login($username,$password)) {
        $tipologie = $GestioneUtente->getUtenteByNomeUtente($username)->getTipologie();
        print_r($tipologie);
    }
    else {
        echo "{ error:\"Username o password non validi\"}";
    }
}
else {
    echo "{ error: \"Username o Password non validi\"}";
}
?>