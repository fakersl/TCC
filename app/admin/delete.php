<?php
include("../../backend/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idProduto'])) {
    $idProduto = intval($_GET['idProduto']);

    if ($idProduto > 0) {
        $sql = "DELETE FROM produto WHERE idProduto = ?";
        if ($stmt = $conexao->prepare($sql)) {
            $stmt->bind_param("i", $idProduto);
            if ($stmt->execute()) {
                header("Location: index_produtos.php");
                exit;
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conexao->error;
        }
    } else {
        echo "ID inválido.";
    }
} else {
    echo "Método de solicitação inválido.";
}

$conexao->close();
?>
