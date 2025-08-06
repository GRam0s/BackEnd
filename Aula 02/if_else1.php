<?php
    $nota = 0;
    $nota2 = 6.0;
    $media = ($nota + $nota2)/2;
    $numero_aulas = 400;
    $numero_presenca = 350;
    $presenca = $numero_presenca/$numero_aulas*100;
    $aluno = "Enzo Enrico";

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
