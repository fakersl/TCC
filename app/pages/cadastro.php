<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
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
                    <input type="text" id="cpf" name="cpf"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="000.000.000-00" required>
                </div>
                <div>
                    <label for="cep" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
                    <input type="text" id="cep" name="cep"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="00000-000" required onblur="buscarEndereco()">
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 mb-4 md:grid-cols-4">
                <div>
                    <label for="cidade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
                    <input type="text" id="cidade" name="cidade"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Sua cidade" required>
                </div>
                <div>
                    <label for="bairro" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bairro:</label>
                    <input type="text" id="bairro" name="bairro"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Seu bairro" required>
                </div>
                <div>
                    <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
                    <input type="text" id="endereco" name="endereco"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Seu endereço" required>
                </div>
                <div>
                    <label for="numero" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número:</label>
                    <input type="text" id="numero" name="numero"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="Número da casa" required>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                <div class="mb-6">
                    <label for="telefone"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="(00) 00000-0000" required>
                </div>

                <div class="mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha:</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:border-purple-600"
                        placeholder="*********" required>
                </div>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 font-medium text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-600">Cadastrar!</button>
        </form>
    </div>
    <script>
        async function buscarEndereco() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            if (cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();
                    if (!data.erro) {
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    } else {
                        alert('CEP não encontrado!');
                    }
                } catch (error) {
                    console.error('Erro ao buscar CEP:', error);
                }
            } else {
                alert('CEP inválido!');
            }
        }
    </script>
</body>

</html>
