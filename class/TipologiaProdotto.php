<?php
class TipologiaProdotto {
    private $nome;
    private $db;
    function TipologiaProdotto($nome) {
        global $db;
        $this->db = $db;
        $this->nome = $nome;
    }
    function getNome() {
        return $this->nome;
    }
    function salva() {
        $value = array("Nome" => $this->nome);
        $this->db->Insert($value,"TipologiaProdotto");
    }
    function elimina() {
        $value = array("Nome" => $this->nome);
        return $this->db->Delete("TipologiaProdotto",$value);
    }
}
?>