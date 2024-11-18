<?php
session_start();
include("../../../../backend/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM fornecedor WHERE idFornecedor = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$fornecedor = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeFornecedor = $_POST['nomeFornecedor'];
    $emailFornecedor = $_POST['emailFornecedor'];
    $telefoneFornecedor = $_POST['telefoneFornecedor'];

    $stmt = $conexao->prepare("UPDATE fornecedor SET nomeFornecedor = ?, emailFornecedor = ?, telefoneFornecedor = ? WHERE idFornecedor = ?");
    $stmt->bind_param("sssi", $nomeFornecedor, $emailFornecedor, $telefoneFornecedor, $id);
    $stmt->execute();

    header("Location: listar_fornecedores.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Fornecedor</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar e Sidebar podem ser reutilizados conforme o exemplo anterior -->
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-2xl font-bold">Editar Fornecedor</h1>

        <form action="" method="POST" class="max-w-md px-8 pt-6 pb-8 mx-auto mb-4 bg-white rounded shadow-md">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="nomeFornecedor">
                    Nome do Fornecedor
                </label>
                <input
                    type="text"
                    name="nomeFornecedor"
                    id="nomeFornecedor"
                    value="<?= htmlspecialchars($fornecedor['nomeFornecedor']) ?>"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="emailFornecedor">
                    Email do Fornecedor
                </label>
                <input
                    type="email"
                    name="emailFornecedor"
                    id="emailFornecedor"
                    value="<?= htmlspecialchars($fornecedor['emailFornecedor']) ?>"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="telefoneFornecedor">
                    Telefone do Fornecedor
                </label>
                <input
                    type="text"
                    name="telefoneFornecedor"
                    id="telefoneFornecedor"
                    value="<?= htmlspecialchars($fornecedor['telefoneFornecedor']) ?>"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    required
                />
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                >
                    Salvar Alterações
                </button>
                <a
                    href="listar_fornecedores.php"
                    class="inline-block text-sm font-bold text-blue-500 align-baseline hover:text-blue-800"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
