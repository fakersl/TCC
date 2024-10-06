<?php
session_start();
include("../../../../backend/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE idProduto = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$produto = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = $_POST['nomeProduto'];
    $marcaProduto = $_POST['marcaProduto'];
    $precoProduto = $_POST['precoProduto'];

    $stmt = $conexao->prepare("UPDATE produto SET nomeProduto = ?, marcaProduto = ?, precoProduto = ? WHERE idProduto = ?");
    $stmt->bind_param("ssii", $nomeProduto, $marcaProduto, $precoProduto, $id);
    $stmt->execute();

    header("Location: listar_produtos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST">
        <label for="nomeProduto">Nome:</label>
        <input type="text" name="nomeProduto" value="<?php echo $produto['nomeProduto']; ?>" required>
        <label for="marcaProduto">Marca:</label>
        <input type="text" name="marcaProduto" value="<?php echo $produto['marcaProduto']; ?>" required>
        <label for="precoProduto">Preço:</label>
        <input type="number" name="precoProduto" value="<?php echo $produto['precoProduto']; ?>" required>
        <button type="submit">Atualizar</button>
    </form>
    <a href="listar_produtos.php">Voltar</a>
</body>
</html>
