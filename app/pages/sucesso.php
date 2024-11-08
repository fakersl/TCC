<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Finalizado</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-4xl py-10 mx-auto">
        <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
            <h1 class="text-2xl font-bold">Seu pedido foi finalizado com sucesso!</h1>
            <p>Obrigado por comprar conosco. Seu pedido será processado em breve.</p>
        </div>
        <div class="mt-5">
            <a href="index.php" class="text-blue-500">Voltar para a página inicial</a>
        </div>
    </div>
</body>
</html>