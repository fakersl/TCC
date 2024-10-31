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

// Exemplos de dados do usuário (você deve puxar do seu banco de dados)
$usuario = [
    'nome' => $_SESSION['nome'],
    'email' => $_SESSION['email'],
    'plano' => 'Premium',
    'pedidos' => [
        ['id' => 1, 'status' => 'Em Andamento', 'data' => '2024-10-01'],
        ['id' => 2, 'status' => 'Entregue', 'data' => '2024-10-10'],
        ['id' => 3, 'status' => 'Cancelado', 'data' => '2024-10-15'],
    ],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visão Geral da Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.4.0/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h2 class="text-lg font-bold text-gray-800">Menu</h2>
                <ul class="mt-4">
                    <li><a href="#overview" class="block py-2 text-gray-600 hover:bg-gray-200">Visão Geral</a></li>
                    <li><a href="#orders" class="block py-2 text-gray-600 hover:bg-gray-200">Meus Pedidos</a></li>
                    <li><a href="#profile" class="block py-2 text-gray-600 hover:bg-gray-200">Meu Perfil</a></li>
                    <li><a href="#pricing" class="block py-2 text-gray-600 hover:bg-gray-200">Planos de Preço</a></li>
                    <!-- Botão para Voltar -->
                    <div class="mt-6">
                        <a href="index.php"
                            class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                            Voltar
                        </a>
                    </div>

                </ul>
            </div>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="flex-1 p-8">
            <!-- Cartão de Informações do Usuário -->
            <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800">Visão Geral da Conta</h2>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Informações do Usuário</h3>
                    <p class="mt-2"><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                </div>
            </div>

            <!-- Lista de Pedidos Ativos -->
            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <h3 class="mb-4 text-xl font-semibold text-gray-900">Meus Pedidos</h3>

                <?php foreach ($usuario['pedidos'] as $pedido): ?>
                    <div class="flex flex-wrap items-center pb-4 border-b border-gray-200 gap-y-4">
                        <div class="w-1/2 sm:w-48">
                            <p class="text-base font-medium text-gray-500">Order ID:</p>
                            <p class="mt-1.5 text-base font-semibold text-gray-900">
                                <a href="#" class="hover:underline">#<?php echo htmlspecialchars($pedido['id']); ?></a>
                            </p>
                        </div>
                        <div class="w-1/2 sm:w-1/4 md:flex-1 lg:w-auto">
                            <p class="text-base font-medium text-gray-500">Data:</p>
                            <p class="mt-1.5 text-base font-semibold text-gray-900">
                                <?php echo htmlspecialchars($pedido['data']); ?></p>
                        </div>
                        <div class="w-1/2 sm:w-1/5 md:flex-1 lg:w-auto">
                            <p class="text-base font-medium text-gray-500">Status:</p>
                            <p
                                class="mt-1.5 inline-flex items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">
                                <?php echo htmlspecialchars($pedido['status']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Botão para Editar Perfil -->
            <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800">Editar Perfil</h2>
                <button id="editProfileBtn"
                    class="inline-block px-4 py-2 mt-4 text-white bg-purple-600 rounded hover:bg-purple-700">Editar</button>
            </div>
        </main>
    </div>

    <!-- Modal para Editar Perfil -->
    <div id="editProfileModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
        <div class="w-1/3 p-6 bg-white rounded-lg">
            <h3 class="text-lg font-semibold">Editar Perfil</h3>
            <form id="editProfileForm">
                <div class="mt-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                        required>
                </div>
                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        value="<?php echo htmlspecialchars($usuario['email']); ?>"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200"
                        required>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Salvar</button>
                    <button type="button" id="closeModalBtn"
                        class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.0/dist/flowbite.bundle.min.js"></script>
    <script>
        document.getElementById('editProfileBtn').onclick = function () {
            document.getElementById('editProfileModal').classList.remove('hidden');
        };

        document.getElementById('closeModalBtn').onclick = function () {
            document.getElementById('editProfileModal').classList.add('hidden');
        };

        document.getElementById('editProfileForm').onsubmit = function (event) {
            event.preventDefault();
            // Adicione lógica para salvar as alterações do perfil
            alert('Perfil salvo com sucesso!');
            document.getElementById('editProfileModal').classList.add('hidden');
        };
    </script>
</body>

</html>