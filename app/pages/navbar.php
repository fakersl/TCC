<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="../../public/css/output.css" rel="stylesheet">
</head>

<body>
    <div class="pt-32">
        <nav class="fixed top-0 z-50 w-full p-4 bg-white border-b border-gray-200 shadow-md start-0">
            <div class="flex items-center justify-between pb-3">
                <div class="flex items-center">
                    <img src="../../public/assets/Logo.svg" alt="Logo" class="w-16 h-16">
                </div>
                <div class="flex-grow hidden mx-6 md:flex">
                    <div class="flex justify-center">
                        &nbsp;
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="w-6 h-6">
                        <img src="../../public/assets/icons/pesquisa.svg" alt="Pesquisar" class="w-6 h-6">
                    </a>
                    <a href="#" class="w-6 h-6">
                        <img src="../../public/assets/icons/favorite.svg" alt="Favoritos" class="w-6 h-6">
                    </a>
                    <a href="#" class="w-6 h-6">
                        <img src="../../public/assets/icons/shoppingBag.svg" alt="Sacola" class="w-6 h-6">
                    </a>
                    <a href="#" class="w-6 h-6">
                        <img src="../../public/assets/icons/user.svg" alt="Usuário" class="w-6 h-6">
                    </a>
                    <button id="menu-toggle" class="block md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="justify-center hidden pt-3 space-x-8 border-t border-gray-200 md:flex">
                <a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Feminino</a>
                <a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Masculino</a>
                <a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Promoções</a>
                <a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Mystery Boxes</a>
            </div>
        </nav>
        <div id="overlay" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50"></div>
        <div id="sidebar"
            class="fixed top-0 left-0 z-50 w-64 h-full transition-transform duration-300 transform -translate-x-full bg-white shadow-lg">
            <div class="p-4">
                <button id="close-sidebar" class="text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <ul class="mt-6 space-y-4">
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Feminino</a></li>
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Masculino</a></li>
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Promoções</a></li>
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Mystery Boxes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="../../public/js/sidebar.js"></script>
</body>

</html>