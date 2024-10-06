<?php
session_start();
include("../../../../backend/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = $_POST['nomeProduto'];
    $marcaProduto = $_POST['marcaProduto'];
    $precoProduto = $_POST['precoProduto'];

    $stmt = $conexao->prepare("INSERT INTO produto (nomeProduto, marcaProduto, precoProduto) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nomeProduto, $marcaProduto, $precoProduto);
    $stmt->execute();

    header("Location: listar_produtos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <h1>Criar Novo Produto</h1>
    <form method="POST">
        <label for="nomeProduto">Nome:</label>
        <input type="text" name="nomeProduto" required>
        <label for="marcaProduto">Marca:</label>
        <input type="text" name="marcaProduto" required>
        <label for="precoProduto">Preço:</label>
        <input type="number" name="precoProduto" required>
        
        <button type="submit">Criar</button>
    </form>
    <a href="listar_produtos.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
