<?php
//Modelagem de dados sem a ultilização de POO

//public - São atribustos públicos que podem ser acessados de fora de uma classe
//private - São atributos privados que podem ser acessados somente dentro da classe
//getter - método padrão para ler ou obter valores de um atributo privado
//setter - método padrão para alterar ou modificar valores de um atributo privado

$marca_carro1 ="Honda";
$modelo_carro1 ="Civic";
$ano_carro1 =2016;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;


$marca_carro2 ="BMW";
$modelo_carro2 ="320i";
$ano_carro2 =2012;
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

function revisaoFeita($rev): bool{
    $rev = true;
    return $rev;
}

$revisao_carro3 = revisaoFeita($revisao_carro3); //Resultado True

function novoDono($qtde_donos): int{
    return $qtde_donos + 1;
}

$Ndonos_carro4 = novoDono($Ndonos_carro4);
?>
