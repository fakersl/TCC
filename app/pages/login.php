<?php
session_start();
include("../../backend/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT id_cadastro, nome, senha FROM cadastro WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_cadastro, $nome, $hash_senha);
        $stmt->fetch();

        // Verificação da senha
        if (password_verify($senha, $hash_senha)) {
            $_SESSION['id_cadastro'] = $id_cadastro;
            $_SESSION['nome'] = $nome;

            header("Location: index.php?login=sucesso");
            exit();
        } else {
            error_log("Senha incorreta para o e-mail: $email");
            $erro = "E-mail ou senha inválidos.";
        }
    } else {
        error_log("Usuário não encontrado: $email");
        $erro = "E-mail ou senha inválidos.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 select-none dark:bg-gray-900 dark:text-white">
    <div
        class="flex flex-col w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-md md:flex-row dark:bg-gray-800">
        <div class="w-full p-8 md:w-1/2">
            <div class="flex justify-center mb-8">
                <img id="logo" src="../../public/assets/Logo.svg" alt="Logo" class="w-20 h-20">
            </div>
            <h2 class="mb-4 text-2xl font-bold text-gray-700 dark:text-gray-300">Entrar</h2>
            <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
                Não possui uma conta?
                <a href="./cadastro.php" class="text-purple-600 dark:text-purple-400 hover:underline">Inscreva-se</a>
            </p>

            <form action="index.php" method="POST">
                <div class="mb-4">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail:</label>
                    <input type="email" id="email" name="email"
                        value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                        class="w-full px-4 py-2 leading-tight bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-purple-600"
                        placeholder="seuemail@email.com" required>
                </div>
                <div class="mb-6">
                    <label for="senha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                    <input type="password" id="senha" name="senha"
                        class="w-full px-4 py-2 leading-tight bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-purple-600"
                        placeholder="*********" required>
                </div>
                <?php if (isset($erro)) { ?> <!-- Display error message -->
                    <div class="mb-4 text-red-600 dark:text-red-400">
                        <?php echo $erro; ?>
                    </div>
                <?php } ?>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember"
                            class="shrink-0 mt-0.5 border-gray-200 rounded accent-purple-500 text-purple-600 focus:ring-purple-500 dark:bg-gray-800 dark:border-gray-700">
                        <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Lembrar-se</label>
                    </div>

                    <a href="#" class="text-sm text-purple-600 dark:text-purple-500 hover:underline">Esqueci a senha</a>
                </div>
                <button type="submit"
                    class="flex items-center justify-center w-full px-4 py-2 text-white bg-purple-500 border-2 border-gray-200 rounded-lg hover:bg-purple-600 dark:border-gray-600">Entrar</button>
            </form>

            <div class="flex items-center justify-center mt-6 space-x-4">
                <hr class="w-1/3 border-gray-300 dark:border-gray-600">
                <span class="text-xs text-gray-500 dark:text-gray-400">Ou continuar com</span>
                <hr class="w-1/3 border-gray-300 dark:border-gray-600">
            </div>

            <div class="mt-6">
                <button
                    class="flex items-center justify-center w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google" class="w-6 h-6 mr-2">
                    <span>Google</span>
                </button>
                <div class="fixed bottom-4 right-4">
                    <label for="theme-toggle" class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="theme-toggle" class="sr-only peer">
                        <div
                            class="outline-purple-500 relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2">
            <div class="object-cover w-full h-full mx-auto bg-purple-500"></div>
        </div>
    </div>
    <script defer src="../../public/js/script.js"></script>
</body>

</html>