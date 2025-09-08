<?php

// Modificadores de acesso:
// Existem 3 tipos: Public, Private e Protected
// Public NomeDoAtributo: métodos e atributos públicos

// Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da classe.
// Utilizamos os getter e setters para acessar-los

// Protected NomeDoAtributo: métodos e atributos protegidos para acesso somente das classes e de suas classes filhas

// Pacotes (packages): sintaxe logo no início do código, que atribui de onde os arquivos pertencem, ou seja,
// o caminho da pasta em que ele está contido. Exemplo: namespace Aula 09

// Caso tenham mais arquivs que formam o BackEnd de alguma página WEB e possuem a mesma raiz, o namespace será p mesmo.

namespace Aula_09;

// Interfaces: É um recurso no qual garante que obrigatóriamente a classe tenha que contruir algum método previamente determinado.
// Funciona como uma promessa ou contrato. Exemplo: Cionfiguramos interface "Pagamento" que faz com que qualquer classe que a implemente,
// tenha que obrigatoriamente  construir o método "pagar".

interface Pagamento {
    public function pagar($valor);
}

class CartaoDeCredito implements Pagamento {
    public function pagar($valor) {
        echo " Pagamento realizado com cartão de crédito, valor: $valor\n";
    }
}

class PIX implements Pagamento {
    public function pagar($valor) {
        echo " Pagamento realizado via PIX, valor: $valor\n";
    }
}

class dinheiroEspecie implements Pagamento {
    public function pagar($valor) {
        $valor = $valor - (10/100)*$valor;
        echo " Pagamento realizado com dinheiro em espécie, valor: $valor\n";
        
    }
}

// Testando interfaces: deve-se criar objetos associados a cada classe que será testada. Exemplo:

$cred = new CartaoDeCredito();

echo "Utilizando cartão de crédito para pagamento:". $cred->pagar("250");

// Neste exemplo um objeto chamdo "$cred" para a classe "CartaoDeCredito" e depois chamamos o método "pagar" para este objeto,
// passando R$250 como parâmetro. 

// Crie objetos para as classes "PIX" e "DinheiroEspecie" e teste passando como parâmentro os valores R$65 e R$320 respectivamente.

$pix = new PIX();
echo "Utilizando PIX para pagamento:". $pix->pagar("65");

$dinheiroEspecie = new DinheiroEspecie();
echo "Utilizando dinheiro em especie para pagamento". $dinheiroEspecie->pagar("320");

// 1.Crie uma interface chamada Forma que obrigue qualquer classe a ter um método calcularArea().
// Depois, crie classes Quadrado e Circulo que implmentam a interface.

// Area quadrado = l * l
// Area circulo = π * r²

interface Forma {
    public function area($valor);
}

class Quadrado implements Forma {
    public function area($lado) {
        return $lado * $lado;
    }
}

class Circulo implements Forma {
    public function area($r) {
        return pi() * $r ** 2;
    }
}

class Pentagono implements Forma {
    public function area($lado) {
        return (5 * $lado ** 2) / (4 * tan(pi() / 5));
    }
}

class Hexagono implements Forma {
    public function area($lado) {
        return (3 * sqrt(3) * $lado ** 2) / 2;
    }
}

// Instanciando as formas
$quadrado = new Quadrado();
$circulo = new Circulo();
$pentagono = new Pentagono();
$hexagono = new Hexagono();

// Entrada do usuário e exibição das áreas
$ladoQuadrado = readline("Digite a medida do lado do quadrado: ");
echo "Área do Quadrado: " . $quadrado->area($ladoQuadrado) . "\n";

$raioCirculo = readline("Digite a medida do raio do círculo: ");
echo "Área do Círculo: " . $circulo->area($raioCirculo) . "\n";

$ladoPentagono = readline("Digite a medida do lado do pentágono regular: ");
echo "Área do Pentágono: " . $pentagono->area($ladoPentagono) . "\n";

$ladoHexagono = readline("Digite a medida do lado do hexágono regular: ");
echo "Área do Hexágono: " . $hexagono->area($ladoHexagono) . "\n";


?> 