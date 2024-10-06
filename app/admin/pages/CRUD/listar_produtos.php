<?php
session_start();
include("../../../../backend/conexao.php");

$sql = "SELECT * FROM produto";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listar Produtos</title>
    <link href="../../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="sticky top-0 z-10 px-3 py-3 bg-white border-b-2 border-gray-200 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <!-- Botão para abrir a sidebar em dispositivos móveis -->
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Abrir sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="#" class="flex ms-2 md:me-24">
                    <img src="../../../public/assets/Logo.svg" class="h-10 me-3" alt="Logo RocketStore">
                </a>
            </div>

            <!-- Menu do usuário -->
            <div class="flex items-center">
                <div class="relative flex items-center ms-3">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Abrir menu do usuário</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User Photo">
                    </button>

                    <!-- Dropdown do usuário -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user" data-popper-placement="bottom">
                        <div class="px-4 py-3">
                            <p class="text-sm text-gray-900 dark:text-white">Olá!</p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"></p>
                        </div>
                        <ul class="py-1">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Configurações</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <!-- Botão de dropdown -->
                    <button type="button"
                        class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 "
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" aria-expanded="false"
                        id="dropdown-button">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 text-left ms-3 whitespace-nowrap">Produtos</span>
                        <svg class="w-3 h-3 transition-transform duration-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6" id="arrow-icon">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4"></path>
                        </svg>
                    </button>

                    <!-- Conteúdo do dropdown -->
                    <div id="dropdown-example" class="hidden mt-2 space-y-2">
                        <a href="./CRUD/criar_produtos.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Adicionar
                            Produto</a>
                        <a href="./CRUD/listar_produtos.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Lista
                            de Produtos</a>
                    </div>

                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z"
                                clip-rule="evenodd" />
                            <path
                                d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">Transações</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-purple-800 bg-purple-100 rounded-full ms-3 ">3</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-6 ml-64">
        <h1 class="mb-4 text-2xl font-bold">Lista de Produtos</h1>
        <a href="criar_produtos.php" class="px-4 py-2 text-white bg-purple-500 rounded">Adicionar Produto</a>

        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b-2 border-gray-200">ID</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200">Nome</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200">Marca</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200">Preço</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $produto['idProduto']; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $produto['nomeProduto']; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200"><?php echo $produto['marcaProduto']; ?></td>
                        <td class="px-4 py-2 border-b border-gray-200">R$
                            <?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200">
                            <a href="editar_produtos.php?id=<?php echo $produto['idProduto']; ?>"
                                class="text-purple-500">Editar</a>
                            <a href="deletar_produtos.php?id=<?php echo $produto['idProduto']; ?>"
                                class="ml-4 text-purple-500">Deletar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>