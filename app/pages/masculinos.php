<?php
include("../../backend/conexao.php");

$sexo = isset($_GET['sexo']) ? $_GET['sexo'] : 'masculino';

// Consulta para obter os produtos com base no sexo
$query = "SELECT * FROM produto WHERE sexoProduto = '$sexo'";
$result = mysqli_query($conexao, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RocketStore - Produtos</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body>
    <div class="pt-32">
        <nav class="fixed top-0 z-50 w-full p-4 bg-white border-b border-gray-200 shadow-md start-0">
            <div class="flex items-center justify-between pb-3">
                <div class="flex items-center">
                    <a href="./index.php">
                        <img src="../../public/assets/Logo.svg" alt="Logo" class="w-16 h-16">
                    </a>
                </div>
                <div class="flex-grow hidden mx-6 md:flex">
                    <div class="flex justify-center">
                        &nbsp;
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="w-6 h-6 hover:text-purple-500" id="icone">
                        <svg class="w-6 h-6 hover:text-purple-500" alt="Pesquisar" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                    </a>
                    <a href="#" class="w-6 h-6" id="icon-favoritos">
                        <svg class="w-6 h-6 hover:text-purple-500" id="icone" alt="Favoritos"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>

                    </a>
                    <a href="carrinho.php" class="w-6 h-6" id="icon-sacola">
                        <svg class="w-6 h-6 hover:text-purple-500" id="icone" alt="Sacola"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>

                    </a>

                    <div class="relative">
                        <!--Icone do perfil-->
                        <a href="#" id="profile-icon" class="relative w-6 h-6" data-popover-target="popover-bottom"
                            data-popover-placement="bottom">
                            <svg class="w-6 h-6 hover:text-purple-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!--Popover-->
                        <div data-popover id="popover-bottom" role="tooltip"
                            class="absolute z-10 invisible inline-block w-48 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2">
                                <a href="./perfil.php"
                                    class="block font-semibold text-gray-900 dark:text-white hover:text-purple-700">Ver
                                    Perfil</a>
                                <a href="./logout.php"
                                    class="block mt-2 font-semibold text-gray-900 dark:text-white hover:text-purple-700">Sair</a>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
                    <span class="ml-2 text-gray-800">
                        <?php if (isset($_SESSION['id_cadastro'])): ?>
                            Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>
                        <?php else: ?>
                            <a href="./login.php" class="text-purple-600 hover:underline">Entre</a> ou
                            <a href="./cadastro.php" class="text-purple-600 hover:underline">registre-se</a>
                        <?php endif; ?>
                    </span>


                    <button id="menu-toggle" class="block md:hidden">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6">
                            <path fill-rule="evenodd"
                                d="M3 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 5.25Zm0 4.5A.75.75 0 0 1 3.75 9h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                                clip-rule="evenodd" />
                        </svg>

                    </button>
                </div>
            </div>
            <div class="justify-center hidden pt-3 space-x-8 border-t border-gray-200 md:flex">
                <a href="./femininos.php" class="font-semibold text-gray-900 hover:text-purple-700">Feminino</a>
                <a href="./masculinos.php" class="font-semibold text-gray-900 hover:text-purple-700">Masculino</a>
                <a href="./manutencao.php" class="font-semibold text-gray-900 hover:text-purple-700">Promoções</a>
                <a href="./manutencao.php" class="font-semibold text-gray-900 hover:text-purple-700">Mystery Boxes</a>
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
                    <li><a href="./femininos.php" class="font-semibold text-gray-900 hover:text-purple-700">Feminino</a>
                    </li>
                    <li><a href="./masculinos.php"
                            class="font-semibold text-gray-900 hover:text-purple-700">Masculino</a></li>
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Promoções</a></li>
                    <li><a href="#" class="font-semibold text-gray-900 hover:text-purple-700">Mystery Boxes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="py-8 antialiased bg-gray-50 dark:bg-gray-900 md:py-12">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="items-end justify-between mb-4 space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="./index.php"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-purple-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z">
                                        </path>
                                    </svg>
                                    Início
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m9 5 7 7-7 7"></path>
                                    </svg>
                                    <a href="#"
                                        class="text-sm font-medium text-gray-700 ms-1 hover:text-purple-600 dark:text-gray-400 dark:hover:text-white md:ms-2">
                                        <?= ucfirst($sexo) ?>
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Peças Femininas
                    </h2>
                </div>
            </div>

            <!-- Grid de Produtos -->
            <div class="grid gap-4 mb-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                <?php
                // Verifique se há produtos
                if (mysqli_num_rows($result) > 0) {
                    // Loop para exibir os produtos
                    while ($produto = mysqli_fetch_assoc($result)) {
                        $nomeProduto = $produto['nomeProduto'];
                        $imagemProduto = $produto['imagemProduto'];
                        $descricaoProduto = $produto['descricaoProduto'];
                        $precoProduto = number_format($produto['precoProduto'], 2, ',', '.');

                        // Verifique se a chave 'quantidadeEstoque' existe no array
                        $quantidadeEstoque = isset($produto['quantidadeEstoque']) ? $produto['quantidadeEstoque'] : 0;
                        $statusEstoque = $quantidadeEstoque > 0 ? 'Em Estoque' : 'Esgotado';
                        ?>
                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <div class="relative flex items-center justify-center w-full h-auto overflow-hidden rounded-lg">
                                <a href="produtoOverview.php?idProduto=<?= $produto['idProduto'] ?>">
                                    <img src="../../public/uploads/<?= $imagemProduto ?>" alt="<?= $nomeProduto ?>"
                                        class="object-cover w-full h-full">
                                </a>
                            </div>
                            <div class="mt-4 text-center">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white"><?= $nomeProduto ?></h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400"><?= $descricaoProduto ?></p>
                                <p class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                                    R$ <?= $precoProduto ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>