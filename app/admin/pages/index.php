<?php
session_start();
include("../../../backend/conexao.php");

$mostrarToastEmail = false;
$mostrarToastSenha = false;

// Processamento do login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email)) {
        $mostrarToastEmail = true; // Exibir toast se o e-mail estiver vazio
    } elseif (empty($senha)) {
        $mostrarToastSenha = true; // Exibir toast se a senha estiver vazia
    } else {
        // Verifica se a conexão está ativa
        if ($conexao->ping()) {
            // Prepare a consulta
            $stmt = $conexao->prepare("SELECT * FROM cadastro WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $admin = $resultado->fetch_assoc();

                if (password_verify($senha, $admin['senha'])) {
                    // Define as variáveis de sessão
                    $_SESSION['admin_nome'] = $admin['nome'];
                    $_SESSION['admin_email'] = $admin['email'];
                    
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Senha incorreta."; // Mensagem se a senha estiver errada
                }
            } else {
                echo "Email não encontrado."; // Mensagem se o e-mail não existir
            }
        } else {
            echo "A conexão com o banco de dados falhou."; // Mensagem se a conexão falhar
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../public/css/output.css" rel="stylesheet">
    <title>Login - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php include("./navbarIndex.php") ?>
    <section class="pt-20 bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Painel - RocketStore
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="sidenav.php"> 
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail:</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="nome@email.com">
                        </div>
                        <div>
                            <label for="senha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="termos" aria-describedby="termos" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="termos" class="font-light text-gray-500 dark:text-gray-300">Eu aceito os <a
                                        class="font-medium text-purple-600 hover:underline dark:text-purple-500"
                                        href="../admin/termos-e-condicoes.php">Termos e condições</a></label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast (e-mail) -->
    <div id="toast-email"
        class="fixed z-50 flex items-center hidden w-full max-w-xs p-4 mb-4 font-bold text-white transition-opacity duration-300 bg-red-500 rounded-lg shadow opacity-0 right-4 top-4"
        role="alert">
        <div class="text-sm font-normal ms-3">Preencha seu e-mail!</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red text-white hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-white p-1.5 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    <!-- Toast (senha) -->
    <div id="toast-senha"
        class="fixed z-50 flex items-center hidden w-full max-w-xs p-4 mb-4 font-bold text-white transition-opacity duration-300 bg-red-500 rounded-lg shadow opacity-0 right-4 top-4"
        role="alert">
        <div class="text-sm font-normal ms-3">Preencha sua senha!</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red text-white hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-white p-1.5 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    <script>
        <?php if ($mostrarToastEmail): ?>
            const toastEmail = document.getElementById('toast-email');
            toastEmail.classList.remove('hidden');
            toastEmail.classList.add('opacity-100');
            setTimeout(() => {
                toastEmail.classList.remove('opacity-100');
                setTimeout(() => {
                    toastEmail.classList.add('hidden');
                }, 300); // Ocultar após a transição
            }, 3000);
        <?php endif; ?>

        <?php if ($mostrarToastSenha): ?>
            const toastSenha = document.getElementById('toast-senha');
            toastSenha.classList.remove('hidden');
            toastSenha.classList.add('opacity-100');
            setTimeout(() => {
                toastSenha.classList.remove('opacity-100');
                setTimeout(() => {
                    toastSenha.classList.add('hidden');
                }, 300);
            }, 3000);
        <?php endif; ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>
