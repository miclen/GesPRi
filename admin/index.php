<?php

if(file_exists('../install')) {
    die('Cancellare la cartella install per utilizzare GesPRi');
}

require '../configuration.php';
$adminLogin = new AdminLogin();

if(!empty($_COOKIE['login']) && $adminLogin->isLogged($_COOKIE['login'])) {
    echo 'sei bello';
    $adminLogin->logout();
}
else {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        if($adminLogin->login($_POST['username'],$_POST['password'])) {
            header('Location: index.php');
        } else {
            require '../template/page/login.php';
        }
    } else {
         require '../template/page/login.php';
    }
}
?>