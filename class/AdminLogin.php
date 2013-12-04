<?php

if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}

class AdminLogin {
    private $db;
    function AdminLogin() {
        global $db;
        $this->db = $db;
    }
    function login($username,$password) {
        $username = mysql_real_escape_string($username);
        $password = md5($password);
        
        $query = "SELECT * FROM `Amministratore` WHERE `NomeUtente` = '{$username}'";
        $query .= " AND `Password` = '{$password}'";
        $this->db->ExecuteSQL($query);
        if($this->db->records == 1) {
            setCookie('login',md5($username.":".$password));
            return true;
        }
        else {
            return false;
        }
    }
    function isLogged($data) {
        while($result = $this->db->ExecuteSQL("SELECT * FROM `Amministratore`")) {
            $r = md5( $result['NomeUtente'].':'.$result['Password'] );
            if($r == $data) return true;
        }
        return false;
    }
    function logout() {
        setcookie("login","");
    }
    function firstStart() {
        /*
         * Carichiamo un file SQL e lo eseguiamo
        */
        $this->db->ExecuteSQL(file_get_contents());
    }
}
?>