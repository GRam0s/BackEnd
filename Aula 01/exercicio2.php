<?php
    $var = "programação em php";
    echo $var, "\n";
    $var = str_replace("programação em php", "PROGRAMAÇÃO EM PHP", $var);
    echo $var, "\n";
    $var = str_replace("PROGRAMAÇÃO EM PHP", "programação em php", $var);
    echo $var, "\n";

    //Versão mais rápida
 
    $var2 = "programação em php";
    echo $var2, "\n";
    $var2 = strtoupper($var2);
    echo $var2, "\n";
    $var2 = strtolower($var2);
    echo $var2, "\n";
?>