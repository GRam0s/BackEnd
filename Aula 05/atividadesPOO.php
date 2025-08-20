<?php
//exercicio 1

class cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raca, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}

//exercicio 2

$cachorro1 = new cachorro("Bombom", 6, "Pug", false, "Masculino");
$cachorro2 = new cachorro("Caramelo", 2, "Golden Retriever", true, "Feminino");
$cachorro3 = new cachorro("Toxa", 4, "Pastor Alemão", false, "Masculino");
$cachorro4 = new cachorro("Mel", 1, "Shih Tzu", true, "Feminino");
$cachorro5 = new cachorro("Rex", 7, "Labrador", false, "Masculino");
$cachorro6 = new cachorro("Belinha", 3, "Poodle", true, "Feminino");
$cachorro7 = new cachorro("Max", 5, "Bulldog Francês", false, "Masculino");
$cachorro8 = new cachorro("Nina", 2, "Beagle", true, "Feminino");
$cachorro9 = new cachorro("Zeus", 8, "Rottweiler", false, "Masculino");
$cachorro10 = new cachorro("Amora", 4, "Border Collie", true, "Feminino");

//exercicio 3

class usuario {
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estado_civil;
    public $cidade;
    public $estado;
    public $endereco;
    public $cep;

    public function __construct($nome, $cpf, $sexo, $email, $estado_civil, $cidade, $estado, $endereco, $cep) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estado_civil = $estado_civil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }
}

$usuario1 = new usuario("Jonsenildo Afonso Sousa", "100.200.300-30", "Masculino", "josenewdo.souza@gmail.com", "Casado", "Xique-Xique", "Bahia", "Rua da Amizade, 99", "40123-98");

$usuario2 = new usuario("Maria Fernanda Oliveira", "200.300.400-40", "Feminino", "maria.fernanda@gmail.com", "Solteira", "Feira de Santana", "Bahia", "Avenida Central, 150", "44002-10");

$usuario3 = new usuario("Carlos Eduardo Pereira", "300.400.500-50", "Masculino", "carlos.edu@gmail.com", "Casado", "Salvador", "Bahia", "Rua das Palmeiras, 25", "40140-20");
?>