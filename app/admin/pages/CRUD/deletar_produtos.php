<?php
session_start();
include("../../../../backend/conexao.php");

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conexao->prepare("DELETE FROM produto WHERE idProduto = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: listar_produtos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Produto</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <h1>Deletar Produto</h1>
    <p>Tem certeza que deseja deletar este produto?</p>
    <form method="POST">
        <button type="submit">Deletar</button>
    </form>
    <a href="listar_produtos.php">Cancelar</a>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
