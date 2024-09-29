<?php
// Inclua o arquivo de configuração do banco de dados
include("../../backend/conexao.php");

// Prepare a consulta SQL para deletar todos os registros
$sql = "DELETE FROM produto";

if ($conexao->query($sql) === TRUE) {
    // Redirecione ou mostre uma mensagem de sucesso
    header("Location: index_produtos.php"); // Substitua pelo caminho para onde você quer redirecionar
    exit;
} else {
    echo "Erro ao executar a consulta: " . $conexao->error;
}

// Feche a conexão com o banco de dados
$conexao->close();
?>
