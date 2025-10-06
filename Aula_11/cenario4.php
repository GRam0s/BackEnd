<?php

class Pessoa { // COMÕE ESCOLHAS E BANCO DE SANGUE
    public $nome;
    public $idade;
    public $genero;
    private $bancoDeSangue;

    public function __construct($nome = "Bebê", $genero = "indefinido") {
        $this->nome = $nome;
        $this->idade = 0;
        $this->genero = $genero;
        $this->bancoDeSangue = new BancoDeSangue();
    }

    public function engravidar() {
        echo "$this->nome está grávida.\n";
        return new Pessoa("Filho de " . $this->nome, rand(0, 1) ? "masculino" : "feminino");
    }

    public function nascer() {
        echo "$this->nome nasceu.\n";
        $this->idade = 0;
    }

    public function crescer($anos = 1) {
        $this->idade += $anos;
        echo "$this->nome cresceu e agora tem $this->idade anos.\n";
    }

    public function fazerEscolha(Escolha $escolha) {
        echo "$this->nome está fazendo uma escolha...\n";
        $escolha->executar($this);
    }

    public function doarSangue() {
        if ($this->idade >= 18) {
            echo "$this->nome doou sangue.\n";
            $this->bancoDeSangue->receberDoacao($this);
        } else {
            echo "$this->nome é menor de idade e não pode doar sangue.\n";
        }
    }
}

class Escolha { //COMPÕE PESSOA
    private $descricao;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function executar(Pessoa $pessoa) {
        echo "{$pessoa->nome} executou a escolha: {$this->descricao}.\n";
    }
}

class BancoDeSangue { // COMPÕE PESSOA
    private $estoque = [];

    public function receberDoacao(Pessoa $doador) {
        $this->estoque[] = $doador->nome;
        echo "Banco de sangue recebeu uma doação de {$doador->nome}.\n";
    }

    public function mostrarEstoque() {
        echo "Estoque atual de doadores:\n";
        foreach ($this->estoque as $doador) {
            echo "- $doador\n";
        }
    }
}


$pessoa = new Pessoa("Maria", "feminino");
$pessoa->nascer();
$pessoa->crescer(10);
$pessoa->crescer(10);
$pessoa->doarSangue();

$escolha = new Escolha("Tornar-se médica");
$pessoa->fazerEscolha($escolha);

$filho = $pessoa->engravidar();
$filho->nascer();
$filho->crescer(5);
$filho->doarSangue();
?>