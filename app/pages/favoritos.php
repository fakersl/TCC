<?php
// Iniciar sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redireciona para o login se não estiver logado
    exit();
}

include("conexao.php");  // Inclua o arquivo de conexão com o banco de dados

// Obter o ID do usuário logado
$userId = $_SESSION['user_id'];

// Consultar os produtos favoritos do usuário
$query = "SELECT p.idProduto, p.nome, p.preco, p.imagem
          FROM produto p
          JOIN favoritos f ON f.idProduto = p.idProduto
          WHERE f.idUsuario = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Exibir os favoritos
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Barra de navegação -->
    <nav class="p-4 text-white bg-blue-500">
        <a href="index.php" class="mr-4">Página Inicial</a>
        <a href="favoritos.php" class="mr-4">Favoritos</a>
        <a href="logout.php">Sair</a>
    </nav>

    <div class="container p-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center">Meus Favoritos</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php while ($produto = $result->fetch_assoc()): ?>
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <img src="uploads/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" class="object-cover w-full h-48 mb-4 rounded-lg">
                        <h2 class="text-xl font-semibold"><?php echo $produto['nome']; ?></h2>
                        <p class="text-lg text-gray-600">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">Você ainda não tem produtos nos favoritos.</p>
        <?php endif; ?>
    </div>

</body>
</html>