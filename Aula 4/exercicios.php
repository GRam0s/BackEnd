<?php

$marca_carro1 ="Honda";
$modelo_carro1 ="Civic";
$ano_carro1 =2016;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;


$marca_carro2 ="BMW";
$modelo_carro2 ="320i";
$ano_carro2 =2016;
$revisao_carro2 = false;
$Ndonos_carro2 = 3;


$marca_carro3 ="Fiat";
$modelo_carro3 ="Uno";
$ano_carro3 =2005;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;


$marca_carro4 ="Volkswagen";
$modelo_carro4 ="Jetta";
$ano_carro4 =2020;
$revisao_carro4 = true;
$Ndonos_carro4 = 7;

//exercício 1
// function exibirCarro ($modelo, $marca, $ano, $revisao, $Ndonos) {
//     if ($revisao == true) {
//         $revisao = "Sim";
//     }
//     echo $marca," ", $modelo, " ano ", $ano, " já passou por revisão: ",$revisao, ", numero de donos: ",$Ndonos;
//     return;
// }

// exibirCarro($modelo_carro1, $marca_carro1, $ano_carro1, $revisao_carro1, $Ndonos_carro1);

//exercicio 2

// function semiNovo($ano) {
// if ($ano < 2023) {
//     $ano = false;
//     echo"velho";
// }
// else {
//     echo"novo";
// }
// return;
// }
// semiNovo(ano: $ano_carro1)

//exercicio 3

// function precisaRevisao($revisao, $ano): void {
//     if ($revisao == false && $ano < 2022) {
//         echo "O carro precisa de revisão";
// }
//     else {
//         echo "O carro está com a revisão em dia";
//     }
//     return;
// }
// precisaRevisao($revisao_carro1, $ano_carro1);

//exercicio 4

function calcularValor($marca, $ano, $Ndonos, $i) {
    for ($i > 0; $i <= 100; $i+5) {
    if ($marca == "BMW" || "Porche") {
        $valor = 300.000;
    }
    else if ($marca == "Nissan") {
        $valor = 70000;
    }
    else if ($marca == "BYD") {
        $valor = 150000;
    }
    if ($Ndonos > 0) {
        $valor1 = $valor-$i/100*$valor;

    for ($j = 0; $j <= $valor; $j-3000) {
        if($ano > 2015) {
        $valor2 = $valor1-$j;
    }
    }
    $valorfinal = ($valor-$valor1)-$valor2;
    echo "Valor final: ", $valorfinal;
    }
    }
    return;
    }

calcularValor($marca_carro1, $ano_carro1, $Ndonos_carro1, $i);
?>