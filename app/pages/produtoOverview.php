<?php
include("../../backend/conexao.php");

// Obtém o ID do produto da URL
$produtoId = isset($_GET['idProduto']) ? intval($_GET['idProduto']) : 0;

// Busca as informações do produto no banco de dados
$query = "SELECT * FROM produto WHERE idProduto = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $produtoId);
$stmt->execute();
$result = $stmt->get_result();
$produto = $result->fetch_assoc();

if (!$produto) {
    // Produto não encontrado, redirecione ou mostre uma mensagem de erro
    echo "Produto não encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivra.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
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
                    <a href="#" class="w-6 h-6" id="icon-sacola">
                        <svg class="w-6 h-6 hover:text-purple-500" id="icone" alt="Sacola"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>

                    </a>
                    <a href="#" class="w-6 h-6 ">
                        <svg class="w-6 h-6 hover:text-purple-500" id="icone" alt="Usuario"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                clip-rule="evenodd" />
                        </svg>


                    </a>
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

    <section class="py-8 antialiased bg-white md:py-16">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="max-w-md mx-auto shrink-0 lg:max-w-lg">
                <?php
                // Imagem do produto
                $imagemProduto = '../../public/uploads/' . $produto['imagemProduto'];
                ?>
                <img class="w-full" src="<?php echo $imagemProduto; ?>" alt="<?php echo $produto['nomeProduto']; ?>" />
                <img class="hidden w-full" src="<?php echo $imagemProduto; ?>" alt="<?php echo $produto['nomeProduto']; ?>" />
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                    <?php echo $produto['nomeProduto']; ?>
                </h1>
                <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                        R$<?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>
                    </p>

                    <div class="flex items-center gap-2 mt-2 sm:mt-0">
                        <div class="flex items-center gap-1">
                            <!-- Ícones de avaliação -->
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <p class="text-sm font-medium leading-none text-gray-500 ">(5.0)</p>
                        <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline ">345 Reviews</a>
                    </div>
                </div>

                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <a href="#" title="" class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100" role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                        </svg>
                        Adicionar aos favoritos
                    </a>

                    <a href="#" title="" class="text-white mt-4 sm:mt-0 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center" role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                        Adicionar ao carrinho
                    </a>
                </div>

                <hr class="my-6 border-gray-200 md:my-8" />

                <p class="mb-6 text-gray-700">
                    <?php echo $produto['descricaoProduto']; ?>
                </p>

                <p class="text-gray-700">
                    <!-- Adicione mais informações sobre o produto aqui, se necessário -->
                    <?php echo $produto['descricaoProduto']; ?>
                </p>
            </div>
        </div>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>