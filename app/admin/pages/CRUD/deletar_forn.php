<?php
include("../../../../backend/conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM fornecedor WHERE idFornecedor = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: listar_fornecedores.php?msg=deletado");
    } else {
        echo "Erro ao deletar: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ID inválido.";
}
?>
