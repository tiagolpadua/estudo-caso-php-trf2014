<?php class Funcionario
{
    private $id;
    private $nome;
    function __construct() {}
    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}
    public function getNome() {return $this->nome;}
    public function setNome($nome) {$this->nome = $nome;}
}
