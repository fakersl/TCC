<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <div class="pt-10 text-center">
        <h2 class="text-2xl font-bold">COLEÇÃO 2</h2>
        <p class="text-gray-500">descrição da coleção... descrição da coleção... descrição da coleção...</p>
    </div>

    <section class="py-8 antialiased bg-gray-50 dark:bg-gray-900 md:py-12">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="grid gap-4 mb-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                <?php
                include_once("../../backend/conexao.php");

                // Consulta para obter os produtos
                $sql = "SELECT * FROM produto";
                $resultado = $conexao->query($sql);
                

                // Verifica se existem produtos
                if ($resultado->num_rows > 0) {
                    // Loop para exibir cada produto
                    while ($produto = $resultado->fetch_assoc()) {
                        $imagemProduto = '../../public/uploads/' . $produto['imagemProduto'];
                        ?>
                        <div
                            class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="w-full h-56">
                                <a href="#">
                                    <?php
                                    // Atualizando o caminho da imagem
                                    $imagemProduto = '../../public/uploads/' . $produto['imagemProduto'];
                                    echo "<!-- Caminho da imagem: $imagemProduto -->"; // Debug
                                    ?>
                                    <img class="h-full mx-auto dark:hidden" src="<?php echo $imagemProduto; ?>"
                                        alt="<?php echo $produto['nomeProduto']; ?>">
                                    <img class="hidden h-full mx-auto dark:block" src="<?php echo $imagemProduto; ?>"
                                        alt="<?php echo $produto['nomeProduto']; ?>">
                                </a>
                            </div>
                            <div class="pt-6">
                                <div class="flex items-center justify-between gap-4 mb-4">
                                    <span
                                        class="me-2 rounded bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-300">15%
                                        de Desconto</span>
                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button"
                                            class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Ver Produto </span>
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"></path>
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                            </svg>
                                        </button>

                                        <button type="button"
                                            class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Adicionar aos favoritos </span>
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <a href="#"
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white"><?php echo $produto['nomeProduto']; ?></a>
                                <div class="flex items-center gap-2 mt-2">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                        R$<?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?></p>

                                    <button type="button"
                                        class="inline-flex items-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                        Adicionar ao carrinho
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }

                // Fechar a conexão
                ?>
            </div>
        </div>
    </section>
    </div>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script defer src="../../public/js/sidebar.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script defer src="../../public/js/owlcarousel.js"></script>

</body>

</html>