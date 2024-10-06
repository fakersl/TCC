<?php
session_start();
include("../../../../backend/conexao.php");

$sql = "SELECT * FROM produto";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Produtos</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($produto = $resultado->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $produto['idProduto']; ?></td>
                <td><?php echo $produto['nomeProduto']; ?></td>
                <td><?php echo $produto['marcaProduto']; ?></td>
                <td><?php echo $produto['precoProduto']; ?></td>
                <td>
                    <a href="editar_produtos.php?id=<?php echo $produto['idProduto']; ?>">Editar</a>
                    <a href="deletar_produtos.php?id=<?php echo $produto['idProduto']; ?>">Deletar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="criar_produtos.php">Adicionar Novo Produto</a>
</body>
</html>
