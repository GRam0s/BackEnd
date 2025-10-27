<?php

require_once "crud.php";
require_once "dao.php";

$dao = new Dao ();

$dao -> criarAlunos(new Aluno(1, "Josias", "Panificação"));
$dao -> criarAlunos(new Aluno(2, "Luana", "Manicure"));
$dao -> criarAlunos(new Aluno(3, "Beatriz", "Elétrica"));
$dao -> criarAlunos(new Aluno(4,"Aurora", "Arquitetura"));
$dao -> criarAlunos(new Aluno(5,"Oliver", "Gestão"));
$dao -> criarAlunos(new Aluno(6,"Amanda", "Luta"));
$dao -> criarAlunos(new Aluno(7,"Geysa", "Engenharia"));
$dao -> criarAlunos(new Aluno(8,"Joab", "Elétrica"));
$dao -> criarAlunos(new Aluno(9,"Miguel", "Streamer"));

echo "listagem inicial \n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getID()} - {$aluno -> getNome()} - {$aluno->getCurso()}\n";
}

//UPDATE
$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");
$dao->atualizarAlunos(7, "Clotilde", "Engenharia");
$dao->atualizarAlunos(8, "Joana", "Elétrica");
$dao->atualizarAlunos(9, "Miguel", "Designer");
$dao->atualizarAlunos(6, "Amanda", "Logistica");
$dao->atualizarAlunos(5, "Oliver", "Elétrica");

echo "\nApós atualização: \n";
foreach ($dao-> lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}


$dao->excluirAlunos(1);
$dao->excluirAlunos(7);
$dao->excluirAlunos(4);

echo "\nApós exclusão: \n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}
?>