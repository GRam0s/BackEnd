<?php
// Polimorfismo
// O termo polimorfismo significa "varias formas". Associando isso a Programação Orientada
// a Objetos, o conceito se trata de várias classes e suas instâncias (Objetos) respondendo
// a um mesmo método de formas diferentes. No exemplo da Interface da Aula_09, temos um método 
// CalcularArea() que responde de forma diferente a classe Círculo. isso que dizer que a função
// é a mesma - calcular a área de forma geométrica - mas a operação muda de acordo com a figura

namespace AULA_10;

interface veiculo {
    public function mover();
}

class carro implements veiculo {
    public $nome;    
    public function mover() {
    echo "O carros $this->nome está andando";
    }
}

class aviao implements veiculo {
    public $nome;
    public function mover() {
        echo "O avião $this->nome está voando";
    }
}

?>