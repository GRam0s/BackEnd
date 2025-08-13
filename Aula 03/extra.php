<?php
$var1 = readline('Digite a primeira variável: ');
$var2 = readline('Digite a segunda variável: ');
if (gettype($var1) == gettype($var2)) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo String e segundo valor do tipo String";
}
?>