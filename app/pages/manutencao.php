<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Em Manutenção - RocketStore</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    
    <style>
        .maintenance-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
    </style>
</head>

<body class="bg-gray-50">

    <div class="maintenance-container">
        <div class="max-w-xl p-6 text-center bg-white rounded-lg shadow-lg">
            <!-- Ilustração de Manutenção -->
            <div class="mb-6">
                <img src="https://via.placeholder.com/400x300?text=Em+Manuten%C3%A7%C3%A3o" alt="Manutenção"
                    class="w-full h-auto rounded-lg">
            </div>
            
            <!-- Título -->
            <h1 class="mb-4 text-4xl font-semibold text-gray-800">Estamos em Manutenção</h1>

            <!-- Descrição -->
            <p class="mb-4 text-lg text-gray-600">Estamos atualizando o site para melhorar sua experiência. Volte em breve!</p>

            <!-- Botão para Voltar -->
            <a href="/" class="inline-block px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-md hover:bg-purple-700">
                Voltar à Página Inicial
            </a>
            
            <!-- Opcional: Informações de contato ou mais detalhes -->
            <p class="mt-6 text-sm text-gray-500">Se precisar de ajuda, entre em contato conosco pelo <a href="mailto:support@rocketstore.com" class="text-purple-600 hover:underline">e-mail</a>.</p>
        </div>
    </div>

    <!-- Flowbite JS (Opcional para modais e interações) -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
