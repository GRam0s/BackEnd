<?php

// //Exercício 1
namespace Aula_10;

// interface forma {
//     public function calcularArea();
// }

// class quadrado implements forma {
//     public $lado = readline("Digite o comprimento do lado do quadrado em centímetros");
//     public $area = $lado**2;
//     public function calcularArea() {
//         echo"A área do quadro é igual a $this->area cm²";
//     }
// }

// class retangulo implements forma {
//     public $base = readline("Digite o comprimento da base do retângulo em centímetros: ");
//     public $altura = readline("Digite o compriemnto da altura do retângulo em centímetros: ");
//     public $area = $comp * $altura;
//     public function calcularArea() {
//         echo"A área do retângulo é igual a $this->area cm²";
//     }
// }

// class circulo implements forma {
//     public $raio = readline("Digite o raio do cículo em centímetros: ");
//     public $pi = 3.14159265358979323846264338;
//     public $area = $pi * $raio ** 2;
//     public function calcularArea() {
//         echo"A área do cículo é igual a $this->area cm²";
//     }
// }


// //Exercício 2
// interface MeioDeTransporte {
//     public function mover();
// }

// class Carro implements MeioDeTransporte {
//     public function mover() {
//         echo "O carro está andando na estrada\n";
//     }
// }

// class Barco implements MeioDeTransporte {
//     public function mover() {
//         echo "O barco está navegando no mar\n";
//     }
// }

// class Aviao implements MeioDeTransporte {
//     public function mover() {
//         echo "O avião está voando no céu\n";
//     }
// }

// class Elevador implements MeioDeTransporte {
//     public function mover() {
//         echo "O Elevador está correndo pelo prédio\n";
//     }
// }

// $carro = new Carro();
// $barco = new Barco();
// $aviao = new Aviao();
// $elevador = new Elevador();

// $carro->mover();
// $barco->mover();
// $aviao->mover();
// $elevador->mover();


// // Exercício 4
// interface Notificacao {
//     public function enviar();
// }

// class Email implements Notificacao {
//     public function enviar() {
//         return "Enviando email...";
//     }
// }

// class Sms implements Notificacao {
//     public function enviar() {
//         return "Enviando SMS...";
//     }
// }

// function notificar(Notificacao $meio) {
//     echo $meio->enviar() . "\n";
// }

// // Teste exercício 4
// $email = new Email();
// $sms = new Sms();

// notificar($email);
// notificar($sms);


// // Exercício 5
// interface Operacoes {
//     public function somar(...$numeros);
// }

// class Calculadora implements Operacoes {
//     public function somar(...$numeros) {
//         if (count($numeros) == 2) {
//             return $numeros[0] + $numeros[1];
//         } elseif (count($numeros) == 3) {
//             return $numeros[0] + $numeros[1] + $numeros[2];
//         } else {
//             return "Número de parâmetros inválido!";
//         }
//     }
// }

// // Teste exercício 5
// $calc = new Calculadora();
// echo "Soma de 2 números: " . $calc->somar(10, 20) . "\n";
// echo "Soma de 3 números: " . $calc->somar(5, 15, 25) . "\n";

// Exercício Extra
interface Movel {
    public function mover();
}

interface Abastecivel {
    public function abastecer($quantidade);
}

interface Manutenivel {
    public function fazerManutencao();
}

// Classes
class Carro implements Movel, Abastecivel {
    public function mover() {
        echo "O carro está se movimentando\n";
    }

    public function abastecer($quantidade) {
        echo "O carro foi abastecido com $quantidade litros\n";
    }
}

class Bicicleta implements Movel, Manutenivel {
    public function mover() {
        echo "A bicicleta está pedalando\n";
    }

    public function fazerManutencao() {
        echo "A bicicleta foi lubrificada\n";
    }
}

class Onibus implements Movel, Abastecivel, Manutenivel {
    public function mover() {
        echo "O ônibus está transportando passageiros\n";
    }

    public function abastecer($quantidade) {
        echo "O ônibus foi abastecido com $quantidade litros\n";
    }

    public function fazerManutencao() {
        echo "O ônibus está passando por revisão\n";
    }
}

// Testes
$carro = new Carro();
$carro->mover();
$carro->abastecer(40);

$bicicleta = new Bicicleta();
$bicicleta->mover();
$bicicleta->fazerManutencao();

$onibus = new Onibus();
$onibus->mover();
$onibus->abastecer(120);
$onibus->fazerManutencao();
?>