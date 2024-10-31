<?php
session_start();

if (isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Adiciona o produto ao carrinho
    if (isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto]++;
    } else {
        $_SESSION['carrinho'][$id_produto] = 1;
    }

    // Retorna a quantidade total de produtos no carrinho
    $total = array_sum($_SESSION['carrinho']);
    
    // Gera a lista de produtos
    $produtosLista = '';
    foreach ($_SESSION['carrinho'] as $id => $quantidade) {
        $produtosLista .= "<li>Produto ID: $id - Quantidade: $quantidade</li>";
    }

    echo json_encode(['success' => true, 'total' => $total, 'produtosLista' => $produtosLista]);
    exit();
}

echo json_encode(['success' => false]);
