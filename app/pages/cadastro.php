<?php
include("../../backend/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("INSERT INTO cadastro (nome, email, cpf, cep, cidade, bairro, endereco, numero, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nome, $email, $cpf, $cep, $cidade, $bairro, $endereco, $numero, $senha);
    
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao cadastrar usuário." . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <script src="../scripts/formatarCampos.js"></script>
    <script src="../scripts/verSenha.js"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 select-none dark:bg-gray-900 dark:text-white">
    <div class="flex flex-col w-full max-w-4xl p-8 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex justify-center mb-2">
            <img id="logo" src="../../public/assets/Logo.svg" alt="Logo" class="w-20 h-20">
        </div>
        <h2 class="mb-4 text-2xl font-bold text-center text-gray-700 dark:text-gray-300">Cadastrar</h2>
        <p class="mb-6 text-sm text-center text-gray-600 dark:text-gray-400">Já possui uma conta?<a href="./login.php"
                class="px-1 text-purple-600 dark:text-purple-400 hover:underline">Entrar</a>
        </p>

        <form action="" method="post" class="bg-white dark:bg-gray-800">
            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
                    <input type="text" id="nome" name="nome"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Seu Nome Completo" required>
                </div>
                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail:</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="seuemail@email.com" required>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                <div>
                    <label for="cpf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CPF:</label>
                    <input type="text" id="cpf" name="cpf" oninput="formatarCampo(this, '000.000.000-00')"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="000.000.000-00" required>
                </div>
                <div>
                    <label for="cep" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
                    <input type="text" id="cep" name="cep" oninput="formatarCampo(this, '00000-000')"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="00000-000" required onblur="pesquisacep(this.value);">
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 mb-4 md:grid-cols-4">
                <div>
                    <label for="cidade"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
                    <input type="text" id="cidade" name="cidade"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Sua cidade" required>
                </div>
                <div>
                    <label for="bairro"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bairro:</label>
                    <input type="text" id="bairro" name="bairro"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Seu bairro" required>
                </div>
                <div>
                    <label for="endereco"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
                    <input type="text" id="logradouro" name="endereco"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Seu endereço" required>
                </div>
                <div>
                    <label for="numero"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número:</label>
                    <input type="text" id="numero" name="numero"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Número da casa" required>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                <div class="mb-6">
                    <label for="telefone"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" oninput="formatarTelefone(this)" maxlength="15"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="(00) 00000-0000" required>
                </div>

                <div class="relative mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha:</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2 pr-10 transition duration-200 ease-in-out bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                            placeholder="*********" required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 transition-transform duration-200 ease-in-out transform dark:text-gray-300 hover:scale-110">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 transition duration-200 ease-in-out">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>

                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 font-medium text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-600">Cadastrar!</button>
        </form>
    </div>
    <script>
        function limpa_formulário_cep() {
            document.getElementById('logradouro').value = "";
            document.getElementById('bairro').value = "";
            document.getElementById('cidade').value = "";
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('logradouro').value = conteudo.logradouro;
                document.getElementById('bairro').value = conteudo.bairro;
                document.getElementById('cidade').value = conteudo.localidade;
            } else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {
            var cep = valor.replace(/\D/g, '');
            var validacep = /^[0-9]{8}$/;

            if (cep != "" && validacep.test(cep)) {
                document.getElementById('logradouro').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }
    </script>
</body>

</html>