<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por Coleção</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <div id="productSidebar"
        class="fixed top-0 right-0 z-50 h-full transition-transform duration-300 transform translate-x-full bg-white shadow-lg w-96">
        <div class="p-6">
            <button onclick="closeSidebar()" class="text-gray-500 hover:text-gray-900">
                &times;
            </button>
            <h2 class="mt-4 text-lg font-bold">Escolher opções</h2>
            <div class="mt-4">
                <img id="sidebarImage" class="object-cover w-24 h-24" src="" alt="Produto">
                <p id="sidebarProductName" class="text-lg font-semibold">Nome do Produto</p>
                <p id="sidebarProductPrice" class="text-gray-700">R$ 0,00</p>
            </div>

            <div class="mt-4">
                <p class="text-gray-700">Cor:</p>
                <div class="flex space-x-2" id="colorOptions">
                    <!-- Opções de cores adicionadas dinamicamente -->
                </div>
            </div>

            <div class="mt-4">
                <p class="text-gray-700">Tamanho:</p>
                <div class="flex space-x-2" id="sizeOptions">
                    <!-- Opções de tamanhos adicionadas dinamicamente -->
                </div>
            </div>

            <div class="mt-4">
                <p class="text-gray-700">Quantidade:</p>
                <div class="flex items-center space-x-2">
                    <button onclick="decreaseQuantity()" class="px-2 py-1 border rounded">-</button>
                    <input type="number" id="quantity" class="w-12 text-center border rounded" value="1" min="1">
                    <button onclick="increaseQuantity()" class="px-2 py-1 border rounded">+</button>
                </div>
            </div>

            <button onclick="addToCart()"
                class="inline-flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-purple-700 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                Adicionar ao carrinho
            </button>
        </div>
    </div>

    <section class="py-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 mx-auto">
            <?php
            include_once("../../backend/conexao.php");
            $sql = "SELECT p.*, c.nomeColecao FROM produto p INNER JOIN colecoes c ON p.fkIdColecao = c.idColecao ORDER BY c.nomeColecao";
            $resultado = $conexao->query($sql);

            $colecoes = [];
            if ($resultado->num_rows > 0) {
                while ($produto = $resultado->fetch_assoc()) {
                    $colecoes[$produto['nomeColecao']][] = $produto;
                }

                foreach ($colecoes as $nomeColecao => $produtos) {
                    echo "<div class='pt-10 text-center'><h2 class='text-2xl font-bold'>{$nomeColecao}</h2><p class='text-gray-500'>Descrição da coleção...</p></div>";
                    echo "<div class='grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4'>";

                    foreach ($produtos as $produto) {
                        $imagemProduto = '../../public/uploads/' . $produto['imagemProduto'];
                        ?>
                        <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="relative flex items-center justify-center w-full h-auto overflow-hidden rounded-lg">
                                <a href="produtoOverview.php?idProduto=<?php echo $produto['idProduto']; ?>">
                                    <img class="object-cover w-full h-full" src="<?php echo $imagemProduto; ?>" alt="<?php echo $produto['nomeProduto']; ?>">
                                </a>
                                <span class="absolute top-2 left-2 text-xs font-semibold text-white bg-red-500 rounded-full px-2 py-0.5">15% OFF</span>
                            </div>
                            <div class="pt-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white hover:underline">
                                    <?php echo $produto['nomeProduto']; ?>
                                </h3>
                                <p class="mt-1 text-xl font-bold text-gray-900 dark:text-white">R$
                                    <?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <button type="button"
                                    onclick="openSidebar({
                                        image: '<?php echo $imagemProduto; ?>',
                                        name: '<?php echo $produto['nomeProduto']; ?>',
                                        price: '<?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>',
                                        colors: ['red', 'blue', 'green'], // exemplo de cores
                                        sizes: ['S', 'M', 'L'] // exemplo de tamanhos
                                    })"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-700 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                    Adicionar ao carrinho
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center text-red-500'>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>

    <script>
        function openSidebar(product) {
            document.getElementById("productSidebar").style.transform = "translateX(0)";
            document.getElementById("sidebarImage").src = product.image;
            document.getElementById("sidebarProductName").textContent = product.name;
            document.getElementById("sidebarProductPrice").textContent = `R$ ${product.price}`;

            // Exibir as opções de cor
            const colorOptions = document.getElementById("colorOptions");
            colorOptions.innerHTML = '';
            product.colors.forEach(color => {
                const colorBtn = document.createElement('button');
                colorBtn.classList.add('w-6', 'h-6', 'rounded-full');
                colorBtn.style.backgroundColor = color;
                colorOptions.appendChild(colorBtn);
            });

            // Exibir as opções de tamanho
            const sizeOptions = document.getElementById("sizeOptions");
            sizeOptions.innerHTML = '';
            product.sizes.forEach(size => {
                const sizeBtn = document.createElement('button');
                sizeBtn.classList.add('px-2', 'py-1', 'border', 'rounded');
                sizeBtn.textContent = size;
                sizeOptions.appendChild(sizeBtn);
            });
        }

        function closeSidebar() {
            document.getElementById("productSidebar").style.transform = "translateX(100%)";
        }

        function addToCart() {
            const quantity = document.getElementById("quantity").value;
            closeSidebar();
            alert("Produto adicionado ao carrinho com quantidade: " + quantity);
        }

        function increaseQuantity() {
            const quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById("quantity");
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
</body>

</html>