<?php
session_start();
include("../../backend/conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['id_cadastro'])) {
    echo json_encode(['success' => false, 'error' => 'Usuário não está logado.']);
    exit();
}

// Verificar se o carrinho está vazio
if (!isset($_COOKIE['carrinho']) || empty($_COOKIE['carrinho'])) {
    echo json_encode(['success' => false, 'error' => 'Seu carrinho está vazio.']);
    exit();
}

// Pegando os dados do formulário de pagamento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioId = $_SESSION['id_cadastro']; // Obtém o ID do usuário da sessão

    // Verificar se o método de pagamento foi enviado
    if (isset($_POST['metodo-pagamento'])) {
        $metodoPagamento = $_POST['metodo-pagamento'];
    } else {
        echo json_encode(['success' => false, 'error' => 'Método de pagamento não selecionado.']);
        exit();
    }

    // Calcular o total do carrinho
    $total = 0;
    $carrinho = json_decode($_COOKIE['carrinho'], true); // Pega o cookie do carrinho
    foreach ($carrinho as $item) {
        $total += $item['quantidade'] * $item['preco'];
    }

    // Buscar o nome, cidade e email do usuário na tabela cadastro
    $queryCadastro = "SELECT nome, cidade, email FROM cadastro WHERE id_cadastro = ?";
    if ($stmtCadastro = $conexao->prepare($queryCadastro)) {
        $stmtCadastro->bind_param("i", $usuarioId);
        $stmtCadastro->execute();
        $stmtCadastro->bind_result($nome, $cidade, $email);
        $stmtCadastro->fetch();
        $stmtCadastro->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao buscar dados do cadastro.']);
        exit();
    }

    // Verificar se os dados foram obtidos corretamente
    if (!$nome || !$cidade || !$email) {
        echo json_encode(['success' => false, 'error' => 'Dados do cadastro não encontrados.']);
        exit();
    }

    // Inserir um novo pedido na tabela pedidos (sem o campo status)
    $queryInsert = "INSERT INTO pedidos (idUsuario, nome, email, cidade, metodoPagamento, valorTotal) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmtInsert = $conexao->prepare($queryInsert)) {
        // Agora bind_param tem apenas 6 variáveis (removido status da consulta)
        $stmtInsert->bind_param("issssd", $usuarioId, $nome, $email, $cidade, $metodoPagamento, $total);
        if ($stmtInsert->execute()) {
            echo json_encode(['success' => true, 'message' => 'Pedido criado com sucesso.']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erro ao inserir o pedido no banco de dados.']);
        }
        $stmtInsert->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao preparar a consulta de inserção.']);
        exit();
    }

    // Limpar o carrinho
    setcookie("carrinho", "", time() - 3600, "/");

    // Redirecionar para a página de sucesso
    header("Location: sucesso.php");
    exit();
}
?>