<?php

class produtos{ //Criando class
    //Atributos
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    //Métodos
    
    public function __construct($nome, $categoria, $fornecedor,  $qtde_estoque) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }
}

//Criando objetos sem o construtor
// $produto1  = new produtos();
// $produto1->nome = "Suco Tagng";
// $produto1->categoria = "Bebida";
// $produto1->fornecedor = "Mondelez";
// $produto1->qtde_estoque = 200;

// $produto2 = new produtos();
// $produto2->nome = "Energético Monster";
// $produto2->categoria = "Bebidas";
// $produto2->fornecedor = "Coca-Cola";
// $produto2->qtde_estoque = 150;

//Criando objetos com o construtor
$produto1 = new produtos("Suco Tang", "Bebidas", "Mondelez", 200);
$produto2 = new produtos("Energético Monster", "Bebidas", "Coca-Cola", 150);
?>