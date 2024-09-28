<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 select-none dark:bg-gray-900 dark:text-white">
    <div
        class="flex flex-col w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-md md:flex-row dark:bg-gray-800">
        <div class="w-full p-8 md:w-1/2">
            <div class="flex justify-center mb-8">
                <img id="logo" src="../../public/assets/Logo.svg" alt="Logo" class="w-20 h-20">
            </div>
            <h2 class="mb-4 text-2xl font-bold text-gray-700 dark:text-gray-300">Cadastrar</h2>
            <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Já possui uma conta?<a href="./login.html"
                    class="text-purple-600 dark:text-purple-400 hover:underline px-1">Entrar</a>
            </p>

            <form action="#" method="post" class="bg-white dark:bg-gray-800">
                <div class="mb-4">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail:</label>
                    <input type="email" id="email"
                        class="w-full px-4 py-2 leading-tight bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-purple-600"
                        placeholder="seuemail@email.com">
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha:</label>
                    <input type="email" id="email"
                        class="w-full px-4 py-2 leading-tight bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:bg-white dark:focus:bg-gray-700 focus:border-purple-600"
                        placeholder="*********">
                </div>

                <button id="toggle-dark-mode" type="button"
                    class="font-medium flex items-center justify-center w-full px-4 py-2 text-white bg-purple-500 border-2 border-purple-700 rounded-lg hover:bg-purple-600 hover:border-purple-900 dark-border-gray-600">Cadastrar!</button>
            </form>

            <div class="flex items-center justify-center mt-6 space-x-4">
                <hr class="w-1/3 border-gray-300 dark:border-gray-600">
                <span class="text-xs break-normal text-gray-500 dark:text-gray-400">Ou continuar com</span>
                <hr class="w-1/3 border-gray-300 dark:border-gray-600">
            </div>

            <div class="mt-6">
                <button
                    class="flex items-center justify-center w-full px-4 py-2 bg-white hover:bg-gray-200 hover:underline hover:border-gray-300 border-2 border-gray-200 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <img src="https://img.icons8.com/color/48/000000/google-logo.png" class="w-6 h-6 mr-2">
                    <span class="font-medium">Google</span>
                </button>
                <div class="fixed bottom-4 right-4">
                    <label for="theme-toggle" class="inline flex items-center cursor-pointer">
                        <input type="checkbox" id="theme-toggle" class="sr-only peer">
                        <div
                            class="outline-purple-500 relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600">
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2">
            <div class="object-cover w-full h-full bg-purple-500"></div>
        </div>
        <script defer src="../../public/js/script.js"></script>
</body>

</html>