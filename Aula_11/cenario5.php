<?php

class Usuario { //COMPÕE ALUNOS E PROFESSORES
    public $nome;
    protected $itensEmprestados = [];

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function solicitarEmprestimo(ItemBibliotecario $item, SistemaDeBiblioteca $sistema) {
        echo "$this->nome está solicitando empréstimo de '{$item->titulo}'.\n";
        $sistema->registrarEmprestimo($this, $item);
    }

    public function devolverItem(ItemBibliotecario $item, SistemaDeBiblioteca $sistema) {
        echo "$this->nome está devolvendo '{$item->titulo}'.\n";
        $sistema->registrarDevolucao($this, $item);
    }

    public function adicionarItemEmprestado(ItemBibliotecario $item) {
        $this->itensEmprestados[] = $item;
    }

    public function removerItemEmprestado(ItemBibliotecario $item) {
        $this->itensEmprestados = array_filter($this->itensEmprestados, function($i) use ($item) {
            return $i !== $item;
        });
    }
}

class Aluno extends Usuario { // COMPÕE
}

class Professor extends Usuario { // COMPÕE
}

class ItemBibliotecario {
    public $titulo;
    public $disponivel = true;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function emprestar() {
        if ($this->disponivel) {
            $this->disponivel = false;
            echo "Item '{$this->titulo}' emprestado.\n";
        } else {
            echo "Item '{$this->titulo}' não está disponível.\n";
        }
    }

    public function devolver() {
        $this->disponivel = true;
        echo "Item '{$this->titulo}' devolvido.\n";
    }
}

class Livro extends ItemBibliotecario {}
class Revista extends ItemBibliotecario {}

class Emprestimo {
    public $usuario;
    public $item;
    public $ativo = true;

    public function __construct(Usuario $usuario, ItemBibliotecario $item) {
        $this->usuario = $usuario;
        $this->item = $item;
    }

    public function finalizar() {
        $this->ativo = false;
        echo "Empréstimo de '{$this->item->titulo}' por {$this->usuario->nome} finalizado.\n";
    }
}

class SistemaDeBiblioteca {
    private $emprestimos = [];

    public function registrarEmprestimo(Usuario $usuario, ItemBibliotecario $item) {
        if ($item->disponivel) {
            $item->emprestar();
            $usuario->adicionarItemEmprestado($item);
            $emprestimo = new Emprestimo($usuario, $item);
            $this->emprestimos[] = $emprestimo;
            echo "Empréstimo registrado no sistema.\n";
        } else {
            echo "Não foi possível emprestar '{$item->titulo}'. Já está emprestado.\n";
        }
    }

    public function registrarDevolucao(Usuario $usuario, ItemBibliotecario $item) {
        $item->devolver();
        $usuario->removerItemEmprestado($item);

        foreach ($this->emprestimos as $emprestimo) {
            if ($emprestimo->item === $item && $emprestimo->usuario === $usuario && $emprestimo->ativo) {
                $emprestimo->finalizar();
                break;
            }
        }
    }
}


$bib = new SistemaDeBiblioteca();

$aluno = new Aluno("Carlos");
$professor = new Professor("Dra. Ana");

$livro = new Livro("PHP Orientado a Objetos");
$revista = new Revista("Ciência Hoje - Edição 204");

$aluno->solicitarEmprestimo($livro, $bib);
$aluno->solicitarEmprestimo($revista, $bib);

$aluno->devolverItem($livro, $bib);
$professor->solicitarEmprestimo($livro, $bib);

?>