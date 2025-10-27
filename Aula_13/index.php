<?php

require_once "Produto.php";
require_once "ProdutoDAO.php";

$dao = new produtosDao ();

$dao -> criarProdutos(new Produtos(1, "Josias", "Panificação"));
$dao -> criarProdutos(new Produtos(2, "Luana", "Manicure"));
$dao -> criarProdutos(new Produtos(1, "Josias", "Panificação"));
$dao -> criarProdutos(new Produtos(2, "Luana", "Manicure"));
$dao -> criarProdutos(new Produtos(1, "Josias", "Panificação"));
$dao -> criarProdutos(new Produtos(2, "Luana", "Manicure"));
$dao -> criarProdutos(new Produtos(1, "Josias", "Panificação"));
$dao -> criarProdutos(new Produtos(2, "Luana", "Manicure"));

echo "listagem inicial \n";
foreach ($dao->lerProdutos() as $produto){
    echo "{$produto->getCodigo()} - {$produto -> getNome()} - {$produto->getPreco()}\n";
}

//UPDATE
$dao->atualizarProdutos(1, "Jozias", "Técnico em Borracharia");
$dao->atualizarProdutos(7, "Clotilde", "Engenharia");

echo "\nApós atualização: \n";
foreach ($dao-> lerProdutos() as $produto) {
    echo "{$produto->getCodigo()} - {$produto->getNome()} - {$produto->getPreco()}\n";
}

$dao->excluirProdutos(1);
$dao->excluirProdutos(7);

echo "\nApós exclusão: \n";
foreach ($dao->lerProdutos() as $produto){
    echo "{$produto->getCodigo()} - {$produto->getNome()} - {$produto->getPreco()}\n";
}
?>