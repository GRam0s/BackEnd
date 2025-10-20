<?php

require_once "crud.php";
require_once "dao.php";

$dao = new Dao ();

$dao -> criarAlunos(new Aluno(1, "Josias", "Panificação"));
$dao -> criarAlunos(new Aluno(2, "Luana", "Manicure"));
$dao -> criarAlunos(new Aluno(3, "Beatriz", "Elétrica"));

echo "listagem inicial \n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getID()} - {$aluno -> getNome()} - {$aluno->getCurso()}\n";
}

//UPDATE
$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");

echo "\nApós atualização: \n";
foreach ($dao-> lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}


$dao->excluirAlunos(1);
echo "\nApós exclusão: \n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}
?>