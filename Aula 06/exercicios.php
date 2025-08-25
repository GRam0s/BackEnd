<?php
//exercicio 1
class moto {
    public $marca;
    public $nome;
    public $cor;
    public $ano;
}

//exercicio 2
$moto1  = new moto();
$moto1->marca = "Honda";
$moto1->nome = "Titan";
$moto1->cor = "Branca";
$moto1->ano = 2020;

$moto2  = new moto();
$moto2->marca = "BMW";
$moto2->nome = "1250";
$moto2->cor = "Branca";
$moto2->ano = 2020;

$moto3  = new moto();
$moto3->marca = "Ducatti";
$moto3->nome = "Panigale S Senna";
$moto3->cor = "Preta";
$moto3->ano = 2014;

// //exercicio 3
//     public function __construct($dia, $mes, $ano) {
//         $this->dia = $dia;
//         $this->mes = $mes;
//         $this->ano = $ano;
    
//     }   

//     public function __construct($nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo) {
//         $this->nome = $nome;
//         $this->idade = $idade;
//         $this->cpf = $cpf;
//         $this->telefone = $telefone;
//         $this->endereco = $endereco;
//         $this->estado_civil = $estado_civil;
//         $this->sexo = $sexo;
//     }
    
//     public function __construct($marca, $nome, $categoria, $data_fabricacao, $data_venda) {
//         $this->marca = $marca;
//         $this->nome = $nome;
//         $this->categoria = $categoria;
//         $this->data_fabricacao = $data_fabricacao;
//         $this->data_venda = $data_venda;
//     }

//exercício 4 e 5

class cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;
        public function latir() {
            echo"O cachorro $this->nome latiu\n";
        }
        public function territorio() {
            echo"O cachorro $this->nome da raça $this->raca está marcando território\n";
        }

    public function __construct($nome, $idade, $raca, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
}
}

$cachorro01 = new cachorro("Bombom", 6, "Pug", false, "Masculino");
$cachorro01 ->latir();
$cachorro01 ->territorio();

//exercicio 6 e 7
class usuario {
    public $nome;
    public $stado_civil;
    public $sexo;
    public $anos_casado;

    public function testandoReservista(){
        if ($this ->sexo == "Masculino") 
            echo"Apresente seu certificado de reservista do tiro de guerra!\n";
    }
    public function casamento() {
        if ($this ->estado_civil == "Casado")
        echo"Parabéns pelo seu casamento!\n";
    else {
        echo"Oloco";
    }
    }


 public function __construct($nome, $estado_civil, $sexo, $anos_casado) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->estado_civil = $estado_civil;
}
}
$usuario1 = new usuario("Jonsenildo Afonso Sousa", "Solteiro", "Masculino", 10);

$usuario1 ->testandoReservista();
$usuario1 ->casamento();
?>