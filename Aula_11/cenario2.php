<?php

// Cenário 2:
// Classes: Personagens - Batman, Superman, Homem-Aranha; Crianças, Cotil e Shopping, Missão. Brinquedo
// Métodos: Estar, Treinar, Ir, Doar

class Missao { // AGREGAM HERÓIS
    private $descricao;
    private $emAndamento = false;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function iniciar() {
        $this->emAndamento = true;
        echo "\nMissão iniciada: {$this->descricao}";
    }

    public function finalizar() {
        if ($this->emAndamento) {
            $this->emAndamento = false;
            echo "\nMissão finalizada: {$this->descricao}";
        } else {
            echo "\nMissão ainda não foi iniciada.";
        }
    }

    public function getDescricao() {
        return $this->descricao;
    }
}
class LocalDeTreinamento { // AGREGAM HERÓIS
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function oferecerTreinamento($heroi) {
        echo "\n{$heroi->getNome()} está treinando no local: {$this->nome}";
    }
}
class Brinquedo { // AGREGAM CRIANÇAS
    private $nome;
    private $tipo;

    public function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getNome() {
        return $this->nome;
    }
}

class Crianca { // ASSOCIA COM SHOPPING
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function receberBrinquedo(Brinquedo $brinquedo) {
        echo "\n{$this->nome} recebeu o brinquedo: {$brinquedo->getNome()} ({$brinquedo->getTipo()})";
    }
}

class Shopping { // ASSOCIA COM HEROIS E CRIANÇAS
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function receberDoacao(Heroi $heroi, Brinquedo $brinquedo) {
        echo "\nShopping {$this->nome} recebeu uma doação de brinquedo: {$brinquedo->getNome()} ({$brinquedo->getTipo()}) do herói {$heroi->getNome()}";
    }
}

class Heroi { // ASSOCIA COM SHOPPING
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function treinar(LocalDeTreinamento $local) {
        $local->oferecerTreinamento($this);
    }

    public function realizarMissao(Missao $missao) {
        $missao->iniciar();

        echo "\n{$this->nome} está realizando a missão: {$missao->getDescricao()}";
        $missao->finalizar();
    }

    public function doarBrinquedo(Brinquedo $brinquedo, Shopping $shopping, Crianca $crianca) {
        $shopping->receberDoacao($this, $brinquedo);
        $crianca->receberBrinquedo($brinquedo);
    }
}

$heroi1 = new Heroi("Capitão Luz");
$missao1 = new Missao("Salvar a cidade de um terremoto");
$localTreino = new LocalDeTreinamento("Montanha Secreta");
$brinquedo1 = new Brinquedo("Urso de Pelúcia", "Pelúcia");
$shopping = new Shopping("Mega Center");
$crianca = new Crianca("Ana");
$heroi1->treinar($localTreino);
$heroi1->realizarMissao($missao1);
$heroi1->doarBrinquedo($brinquedo1, $shopping, $crianca);

echo "\n";

?>
