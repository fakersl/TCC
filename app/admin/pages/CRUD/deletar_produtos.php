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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Produto</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="container px-4 py-10 mx-auto">
        <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-lg">
            <h1 class="mb-4 text-2xl font-bold text-red-600">Deletar Produto</h1>
            <p class="mb-6 text-gray-700">Tem certeza que deseja deletar este produto?</p>
            <form method="POST">
                <button type="submit" class="w-full px-4 py-2 font-semibold text-white transition duration-200 bg-red-600 rounded hover:bg-red-700">Deletar</button>
            </form>
            <a href="listar_produtos.php" class="inline-block mt-4 text-blue-600 hover:underline">Cancelar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
