<?php
include("../../backend/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeProduto = $_POST['nomeProduto'] ?? '';
    $marcaProduto = $_POST['marcaProduto'] ?? '';
    $precoProduto = $_POST['precoProduto'] ?? 0; // Default to 0 if not set
    $categoriaProduto = $_POST['categoria'] ?? '';
    $descricaoProduto = $_POST['descricaoProduto'] ?? '';

    if (empty($categoriaProduto)) {
        echo "Categoria é obrigatória.";
        exit();
    }

    // Simple SQL query
    $sql = "INSERT INTO produto (nomeProduto, marcaProduto, precoProduto, categoriaProduto, descricaoProduto) 
            VALUES ('$nomeProduto', '$marcaProduto', $precoProduto, '$categoriaProduto', '$descricaoProduto')";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index_produtos.php");
        exit();
    } else {
        error_log("Erro ao cadastrar produto: " . $conexao->error);
        echo "Erro ao cadastrar produto. Tente novamente.";
    }
}
?>