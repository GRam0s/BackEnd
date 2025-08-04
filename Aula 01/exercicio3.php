<?php
    $var = "O PHP foi criado em mil novecentos e noventa e cinco.";
    echo $var, "\n";
    $var = str_replace("O", "0",$var);
    $var = str_replace("o", "0",$var);
    $var = str_replace("a", "4",$var);
    $var = str_replace("i", "1",$var);
    echo $var, "\n";

    //Versão mais rápida
    $var2 = "O PHP foi criado em mil novecentos e noventa e cinco.";
    echo $var2, "\n";
    $var2 = str_ireplace(['o', 'a', 'i'], ['0', '4', '1'], $var2);
    echo $var2;
?>
