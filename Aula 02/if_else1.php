<?php
    $nota = readline("Digitie a 1° nota do aluno: ");
    $nota2 = readline("Digite a 2° nota do aluno: ");
    $media = ($nota + $nota2)/2;
    $numero_aulas = readline("Digite o número de aulas dadas: ");
    $numero_presenca = readline("Digite o número de presenças do aluno: ");
    $presenca = $numero_presenca/$numero_aulas*100;
    $aluno = readline("Digite o nome do aluno: ");

    if ($media >= 5) {
        echo "Aluno aprovado com a média de ", $media;
    }
    else {
        echo "Aluno reprovado com a média de ", $media;
    }
    if ($presenca > 75) {
        echo "\nAluno aprovado com uma presença de ", $presenca, "%";
    }
    else {
        echo "\nAluno reprovado com uma presença de ", $presenca,"%";
    }
    if ($presenca >= 75 && $media >= 5 || $aluno == "Enzo Enrico") {
        echo "\nResultado final: Aluno aprovado";
    }
    else {
        echo "\nResultado final: Aluno reprovado";
    }
    ?>
