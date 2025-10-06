<?php

// Interface Atividade
interface Atividade {
    public function executar();
}

class Comida implements Atividade { //AGREGAÇÃO
    private $nome;
    private $descricao;

    public function __construct($nome, $descricao) {
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function executar() {
        echo "\nComendo: {$this->getDescricao()}";
    }
}

class CorpoDagua implements Atividade { // AGREGAÇÃO
    private $nome;
    private $tipo;

    public function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function executar() {
        echo "\nNadando no {$this->tipo}: {$this->nome}";
    }
}

class Localidade { // COMPÕE ATIVIDADES
    private $nome;
    private $atividades = [];

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function adicionarAtividade(Atividade $atividade) {
        $this->atividades[] = $atividade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function informarAtividades() {
        echo "\nAtividades disponíveis em {$this->nome}:";
        foreach ($this->atividades as $atividade) {
            $atividade->executar();
        }
    }

    public function getAtividades() {
        return $this->atividades;
    }
}

class Turista { // COMPÕES ATIVIDADES
    private $nome;
    private $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function visitar(Localidade $localidade) {
        echo "\n{$this->nome} está visitando {$localidade->getNome()}";
        $localidade->informarAtividades();
    }

    public function comer(Comida $comida) {
        echo "\n{$this->nome} está comendo: " . $comida->getDescricao();
    }

    public function nadar(CorpoDagua $corpoDagua) {
        echo "\n{$this->nome} está nadando no {$corpoDagua->getTipo()} chamado {$corpoDagua->getNome()}";
    }
}

$feijoada = new Comida("Feijoada", "Feijoada com arroz e farofa");
$sushi = new Comida("Sushi", "Sushi de salmão e atum");

$amazonas = new CorpoDagua("Rio Amazonas", "Rio");
$pacifico = new CorpoDagua("Oceano Pacífico", "Oceano");

$brasil = new Localidade("Brasil");
$brasil->adicionarAtividade($feijoada);
$brasil->adicionarAtividade($amazonas);

$japao = new Localidade("Japão");
$japao->adicionarAtividade($sushi);
$japao->adicionarAtividade($pacifico);

$turista = new Turista("Lucas", 30);

$turista->visitar($brasil);
$turista->comer($feijoada);
$turista->nadar($amazonas);

echo "\n";

$turista->visitar($japao);
$turista->comer($sushi);
$turista->nadar($pacifico);

echo "\n";

?>
