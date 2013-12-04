<?php

// Errore se questa pagina viene chiamata direttamente da URL

if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}
    if(isset($_POST['click1'])) {
        if(!preg_match("/^([a-zA-Z0-9]{3,12})$/",$_POST['username'])) {
            echo "<script>alert('Username non valido, eliminare caratteri speciali o spazi');</script>";
            echo "<script>location.reload(true);</script>";
            die();
        }
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$_POST['email'])) {
            echo "<script>alert('Email non valida');</script>";
            echo "<script>location.reload(true);</script>";
            die();
        }
        $username = mysql_real_escape_string($_POST['username']);
        $password = md5($_POST['password']);
        $email = mysql_real_escape_string($_POST['email']);
        
        $query_control = "drop table if exists Amministratore";
        $db->ExecuteSQL($query_control);
        $query_create = "create table `Amministratore` (";
        $query_create .= "`IDAmministratore` int(11) primary key auto_increment,";
        $query_create .= "`NomeUtente` varchar(30) not null,";
        $query_create .= "`Password` varchar(32) not null,";
        $query_create .= "`Email` varchar(30) not null);";
        $db->ExecuteSQL($query_create);
        
        $query_insert = array("NomeUtente" => $username,"Password" => $password,"Email" => $email);
        $db->Insert($query_insert,"Amministratore");
        echo "<script>location.replace('{$conf['dirbase']}/admin/');</script>";
    }
?>

<div id='principal'>
    <h1><img width="30%" src="<?php echo $conf['dirbase'];?>/template/images/logo_installer.png"></h1>
    <h3>Creazione Utente Amministratore</h3>
    <p>Inserire le informazioni necessarie per registrare l'utente amministratore</p>
    <form method="post" action="?start" role="form">
    <table>
    <tr>
        <td>Username : </td>
        <td><input type="text" class="form-control" name="username" placeholder="Username.."></td>
    </tr>
    <tr>
        <td>Password : </td>
        <td><input type="password" class="form-control" name="password" placeholder="Password.."></td>
    </tr>
    <tr>
        <td>Email : </td>
        <td><input type="email" class="form-control" name="email" placeholder="to@email.com"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="click1" value="Avanti" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-danger">
        </td>
    </tr>
    </table>
    </form>
</div>