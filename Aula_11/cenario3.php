<?php

class Jornada { // AGREGA CLIMA E DIFICULDADE
    private $destino;

    public function __construct($destino) {
        $this->destino = $destino;
    }

    public function avancar() {
        echo "\nA jornada avança em direção a {$this->destino}.";
    }

    public function getDestino() {
        return $this->destino;
    }
}

class Clima { // AGREGA JORNADA
    private $estadoAtual;

    public function __construct($estadoInicial) {
        $this->estadoAtual = $estadoInicial;
    }

    public function mudar($novoEstado) {
        echo "\nClima mudou de {$this->estadoAtual} para {$novoEstado}.";
        $this->estadoAtual = $novoEstado;
    }

    public function getEstadoAtual() {
        return $this->estadoAtual;
    }
}

class Dificuldade { // AGREGA JORNADA
    private $descricao;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function superar($personagem) {
        echo "\n{$personagem->getNome()} superou a dificuldade: {$this->descricao}.";
    }
}

class Refeicao {
    private $descricao;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function servir($personagem) {
        echo "\nUma refeição foi servida a {$personagem->getNome()}: {$this->descricao}.";
    }
}

class Personagem { // COMPÕE JORNADA
    private $nome;
    private $nivel;

    public function __construct($nome, $nivel = 1) {
        $this->nome = $nome;
        $this->nivel = $nivel;
    }

    public function getNome() {
        return $this->nome;
    }

    public function seguirJornada(Jornada $jornada, Clima $clima) {
        echo "\n{$this->nome} está seguindo a jornada até {$jornada->getDestino()} sob o clima {$clima->getEstadoAtual()}.";
        $jornada->avancar();
    }

    public function enfrentarDesafio(Dificuldade $dificuldade) {
        $dificuldade->superar($this);
        $this->nivel++;
    }

    public function celebrar(Refeicao $refeicao) {
        echo "\n{$this->nome} celebra a vitória!";
        $refeicao->servir($this);
    }

    public function getNivel() {
        return $this->nivel;
    }
}


$clima = new Clima("Ensolarado");
$jornada = new Jornada("Montanha do Destino");
$dificuldade = new Dificuldade("Um dragão guardando a passagem");
$refeicao = new Refeicao("Banquete com frutas e carnes exóticas");
$personagem = new Personagem("Elara, a Maga", 5);
$personagem->seguirJornada($jornada, $clima);
$clima->mudar("Tempestade de neve");
$personagem->enfrentarDesafio($dificuldade);
$personagem->celebrar($refeicao);

echo "\n";

?>
