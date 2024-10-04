<?php
include("../../backend/conexao.php");

if (isset($_GET['idProduto'])) {
    $idProduto = intval($_GET['idProduto']);

    // Prepara a consulta
    $sql = "DELETE FROM produto WHERE idProduto = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da declaração: " . $conexao->error);
    }

    $stmt->bind_param('i', $idProduto);

    if ($stmt->execute()) {
        header("Location: index_produtos.php?mensagem=Produto deletado com sucesso!");
        exit();
    } else {
        echo "Erro ao deletar produto: " . $stmt->error;
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo "ID NÃO ESPECIFICADO";
}

// Fecha a conexão
$conexao->close();
?>
