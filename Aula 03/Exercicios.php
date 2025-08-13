<?php
// //Exercício 1 - Verificação de Idade

// $idade = readline("Digite a sua idade: ");

// if ($idade >= 18) {
//     echo "Você é maior de idade.";
// }
// else {
//     echo "Você é menor de idade.";
// }

// //Exercício 2 - Classificação de Nota

// $nota = readline("Digite uma nota de 1 a 10: ");

// if ($nota >= 9) {
//     echo "Nota excelente";
// }
// if ($nota >= 7) {
//     echo "Nota boa";
// }
// else {
//     echo "Reprovado";
// }

// //Exercício 3 - Dia da Semana

// $dia = readline("Digite um número de 1 a 7: ");

// switch ($dia) {
//     case 1:
//         echo "Domingo";
//         break;
//     case 2:
//         echo "Segunda";
//         break;
//     case 3:
//         echo "Terça";
//         break;
//     case 4:
//         echo "Quarta";
//         break;
//     case 5:
//         echo "Quinta";
//         break;
//     case 6:
//         echo "Sexta";
//         break;
//     case 7:
//         echo "Sábado";
//         break;
//     default:
//     echo "Dia não reconhecido";
// }

// //Exercício 4 - Calculadora Simples

// $n1 = readline("Digite o primeiro número: ");
// $n2 = readline("Digite o segundo número: ");
// $operacao = readline("Digite uma operação (+, -, *, /):");
// if ($operacao == "+") {
//     $resultado = $n1 + $n2;
//     echo "O resultado é ",$resultado;
// }
// if ($operacao == "-") {
//     $resultado = $n1 - $n1;
//     echo "O resultado é ",$resultado;
// }
// if ($operacao == "*") {
//     $resultado = $n1 * $n2;
//     echo "O resultado é ",$resultado;
// }
// if ($operacao == "/") {
//     $resultado = $n1 / $n2;
//     echo "O resultado é ",$resultado;
// }

// //Exercicio 5 - Contagem Progressiva

// for($p = 1; $p <= 10; $p++) {
//     echo "Nùmeros: ", $p;
// }

// // Exercício 6 - Contagem Regressiva

// $u = readline ("Digite algum numero maior que um: ");
// for($u; $u >= 0; $u--) {
//     echo "\nNúmeros: ", $i;
// }

// //Exercício 7 - Números Pares

// $np = readline ("Digite um número maior que 0 para saber seus pares: ");
// for($i = 0; $i < $np+1 ; $i++) {
//     if($i%2==0) {
//         $pares+=1;
//     }
// }
//     echo "\nEntre 0 e $np existem $pares";

// //Exercícío 8 - Tabuada

// $num1 = readline ("Digite algum número que deseja saber a tabuada: ");
// for($num = 1; $num < 11; $num++) {
//     $nt = $num1 * $num;
//     echo "Números ", $nt,'\n';
// }

// //Exercício 9 - Classificação de temperatura

// $temp = readline ("Digite uma temperatura: ");
// if ($temp < 15) {
//     echo "Frio";
// }
// else if ($temp >= 15 && $temp <= 25) {
//     echo "Agradável";
// }
// else {
//     echo "Quente";
// }

//Exercício 10 - Menu Interativo

date_default_timezone_set('America/Sao_Paulo');

While (true) {
    $nome = readline ('Digite o seu nome: ');;
    $resposta = readline("Digite: 1 - Olá, 2 - Data, 3 - Sair, Opção: ");

switch ($resposta) {
    case "1":
    echo "Olá $nome";
    break;
    case "2":
    echo date("d/m/Y H:i:s") . "\n";
    break;
    case "3":
    echo "Saindo...\n";
    exit;
    default:
    echo "Opção invalida!\n";
    break;
}
}
?>
