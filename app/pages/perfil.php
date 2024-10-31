<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['id_cadastro'])) {
    // Verifica se já está redirecionando com um erro para evitar loop
    if (!isset($_GET['error'])) {
        // Redireciona para a própria página de perfil com um erro na URL
        header("Location: perfil.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container p-8 mx-auto">
        <div class="max-w-xl p-6 mx-auto bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">Perfil do Usuário</h2>

            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="mb-4 text-center text-red-600">
                    Você precisa estar logado para acessar esta página.
                </div>
            <?php else: ?>
                <div class="mb-4 text-center">
                    <p class="text-lg font-medium">Nome: <?php echo htmlspecialchars($_SESSION['nome']); ?></p>
                    <p class="text-lg font-medium">Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                </div>
            <?php endif; ?>

            <div class="text-center">
                <a href="./index.php" class="inline-block px-4 py-2 font-semibold text-white bg-purple-600 rounded hover:bg-purple-700">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
