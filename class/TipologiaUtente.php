<?php
class TipologiaUtente {
    private $nome;
    private $db;
    function TipologiaUtente($nome) {
        global $db;
        $this->db = $db;
        $this->nome = $nome;
    }
    function getNome() {
        return $this->nome;
    }
    function salva() {
        $value = array("Nome" => $this->nome);
        $this->db->Insert($value,"TipologiaUtente");
    }
    function elimina() {
        $value = array("Nome" => $this->nome);
        return $this->db->Delete("TipologiaUtente",$value);
    }
}
?>