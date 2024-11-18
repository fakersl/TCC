<?php
include("../../backend/conexao.php");

$sexo = isset($_GET['sexo']) ? $_GET['sexo'] : 'feminino';

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
                                <?php if ($quantidadeEstoque == 0): ?>
                                    <span
                                        class="absolute top-0 right-0 px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-l-lg">Esgotado</span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 text-center">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white"><?= $nomeProduto ?></h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400"><?= $descricaoProduto ?></p>
                                <p class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                                    R$ <?= $precoProduto ?>
                                </p>
                                <p class="mt-1 text-sm text-gray-500"><?= $statusEstoque ?></p>
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