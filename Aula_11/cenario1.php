<?php

// Cenário 1: 
// Classes: Lugares - Terra, Japão, Brasil, Acre e Turistas, Atividade, comida, CorpoDagua
// Métodos: Visitar, Poderão, Comer, Nadar

class Turistas {
    private $nome;
    private $idade;
    private $visitar;
    private $comer;
    private $nadar;

    public function __construct($nome, $idade) {
        $this->setNome($nome);
        $this->setidade($idade);
    }

    public function setNome() {
        $this->nome = "";
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function visitar($visitar) {
        $this->visitar = $visitar;
    }
}


class Lugares {
    private $atividades;

    public function __construct($atividades) {
        $this->atividades = $atividades;
    }

    public function informarAtividades($atividades) {
        echo"As atividades que possuímos nesse local são: $this->atividades";
    }
}

$local1 = new Lugares("Jogar bola");
$local1->informarAtividades("");


?>