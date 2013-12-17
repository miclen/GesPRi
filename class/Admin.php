<?php

if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}

class Admin {

    private $db;

    function Admin() {
        global $db;
        $this->db = $db;
    }

}

?>