<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por Coleção</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="relative">

    <!-- Overlay para destacar a Sidebar -->
    <div id="overlay" class="fixed inset-0 z-40 hidden transition-opacity duration-300 bg-black bg-opacity-50"
        onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <!-- Sidebar de Seleção de Produto (renomeado para "productSidebar2") -->
    <div id="productSidebar2"
        class="fixed top-0 right-0 z-50 h-full transition-transform duration-300 transform translate-x-full bg-white shadow-lg w-96">
        <div class="p-6">
            <button onclick="closeSidebar()" class="text-gray-500 hover:text-gray-900">&times;</button>
            <h2 class="mt-4 text-lg font-bold">Escolher opções</h2>

            <!-- Exibição do Produto -->
            <div class="mt-4">
                <img id="sidebarImage" class="object-cover w-24 h-24" src="" alt="Produto">
                <p id="sidebarProductName" class="text-lg font-semibold">Nome do Produto</p>
                <p id="sidebarProductPrice" class="text-gray-700">R$ 0,00</p>
            </div>

            <!-- Seleção de Cor -->
            <div class="mt-4">
                <p class="text-gray-700">Cor:</p>
                <div class="flex space-x-2" id="colorOptions">
                    <!-- Botões de cores serão adicionados dinamicamente -->
                </div>
            </div>

            <!-- Seleção de Tamanho -->
            <div class="mt-4">
                <p class="text-gray-700">Tamanho:</p>
                <div class="flex space-x-2" id="sizeOptions">
                    <!-- Botões de tamanhos serão adicionados dinamicamente -->
                </div>
            </div>

            <!-- Quantidade -->
            <div class="mt-4">
                <p class="text-gray-700">Quantidade:</p>
                <div class="flex items-center space-x-2">
                    <button onclick="decreaseQuantity()" class="px-2 py-1 border rounded">-</button>
                    <input type="number" id="quantity" class="w-12 text-center border rounded" value="1" min="1">
                    <button onclick="increaseQuantity()" class="px-2 py-1 border rounded">+</button>
                </div>
            </div>

            <!-- Botão Adicionar ao Carrinho -->
            <button onclick="addToCart()"
                class="inline-flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-purple-700 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300">
                Adicionar ao carrinho
            </button>
        </div>
    </div>


    <!-- Produtos -->
    <section class="py-8 bg-gray-50">
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
                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <div class="relative flex items-center justify-center w-full h-auto overflow-hidden rounded-lg">
                                <a href="produtoOverview.php?idProduto=<?php echo $produto['idProduto']; ?>">
                                    <img src="../../public/uploads/<?php echo htmlspecialchars($produto['imagemProduto']); ?>"
                                        alt="<?php echo htmlspecialchars($produto['nomeProduto']); ?>"
                                        class="object-cover w-full h-full">


                                </a>
                                <span
                                    class="absolute top-2 left-2 text-xs font-semibold text-white bg-red-500 rounded-full px-2 py-0.5">15%
                                    OFF</span>
                            </div>
                            <div class="pt-4">
                                <h3 class="text-lg font-semibold text-gray-900 hover:underline">
                                    <?php echo $produto['nomeProduto']; ?>
                                </h3>
                                <p class="mt-1 text-xl font-bold text-gray-900">R$
                                    <?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <button type="button" onclick="openSidebar({
                                        image: '<?php echo $imagemProduto; ?>',
                                        name: '<?php echo $produto['nomeProduto']; ?>',
                                        price: '<?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>',
                                        colors: ['red', 'blue', 'green'],
                                        sizes: ['S', 'M', 'L']
                                    })"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-700 rounded-md hover:bg-purple-800">
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

    <!-- Sidebar de Seleção de Produto -->
    <div id="productSidebar"
        class="fixed top-0 right-0 z-50 h-full transition-transform duration-300 transform translate-x-full bg-white shadow-lg w-96">
        <div class="p-6">
            <button onclick="closeSidebar()" class="text-gray-500 hover:text-gray-900">&times;</button>
            <h2 class="mt-4 text-lg font-bold">Escolher opções</h2>

            <!-- Exibição do Produto -->
            <div class="mt-4">
                <img id="sidebarImage" class="object-cover w-24 h-24" src="" alt="Produto">
                <p id="sidebarProductName" class="text-lg font-semibold">Nome do Produto</p>
                <p id="sidebarProductPrice" class="text-gray-700">R$ 0,00</p>
            </div>

            <!-- Seleção de Cor -->
            <div class="mt-4">
                <p class="text-gray-700">Cor:</p>
                <div class="flex space-x-2" id="colorOptions">
                    <!-- Botões de cores serão adicionados dinamicamente -->
                </div>
            </div>

            <!-- Seleção de Tamanho -->
            <div class="mt-4">
                <p class="text-gray-700">Tamanho:</p>
                <div class="flex space-x-2" id="sizeOptions">
                    <!-- Botões de tamanhos serão adicionados dinamicamente -->
                </div>
            </div>

            <!-- Quantidade -->
            <div class="mt-4">
                <p class="text-gray-700">Quantidade:</p>
                <div class="flex items-center space-x-2">
                    <button onclick="decreaseQuantity()" class="px-2 py-1 border rounded">-</button>
                    <input type="number" id="quantity" class="w-12 text-center border rounded" value="1" min="1">
                    <button onclick="increaseQuantity()" class="px-2 py-1 border rounded">+</button>
                </div>
            </div>

            <!-- Botão Adicionar ao Carrinho -->
            <button onclick="addToCart()"
                class="inline-flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-purple-700 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-300">
                Adicionar ao carrinho
            </button>
        </div>
    </div>

    <!-- Código JavaScript -->
    <script>
        let selectedColor = null;
        let selectedSize = null;

        function openSidebar(product) {
            // Garantir que o sidebar seja mostrado
            document.getElementById("productSidebar").style.transform = "translateX(0)";
            document.getElementById("overlay").classList.remove("hidden");

            // Atualizar as informações do produto na sidebar
            const sidebarImage = document.getElementById("sidebarImage");
            sidebarImage.src = product.image;
            sidebarImage.style.position = 'relative';  // Garantir que a imagem tenha posição adequada

            document.getElementById("sidebarProductName").textContent = product.name;
            document.getElementById("sidebarProductPrice").textContent = `R$ ${product.price}`;

            // Atualizar opções de cor e tamanho
            const colorOptions = document.getElementById("colorOptions");
            colorOptions.innerHTML = '';  // Limpar as cores anteriores
            product.colors.forEach(color => {
                const colorBtn = document.createElement('button');
                colorBtn.classList.add('w-6', 'h-6', 'rounded-full', 'border', 'border-gray-300');
                colorBtn.style.backgroundColor = color;
                colorBtn.onclick = () => selectColor(colorBtn, color);
                colorOptions.appendChild(colorBtn);
            });

            const sizeOptions = document.getElementById("sizeOptions");
            sizeOptions.innerHTML = '';  // Limpar os tamanhos anteriores
            product.sizes.forEach(size => {
                const sizeBtn = document.createElement('button');
                sizeBtn.classList.add('px-2', 'py-1', 'border', 'rounded', 'border-gray-300', 'hover:bg-gray-200');
                sizeBtn.textContent = size;
                sizeBtn.onclick = () => selectSize(sizeBtn, size);
                sizeOptions.appendChild(sizeBtn);
            });
        }

        // Funções para Seleção de Cor e Tamanho
        function selectColor(button, color) {
            selectedColor = color;
            clearSelected('colorOptions');
            button.classList.add('border-2', 'border-purple-700');
        }

        function selectSize(button, size) {
            selectedSize = size;
            clearSelected('sizeOptions');
            button.classList.add('bg-purple-700', 'text-white');
        }

        function clearSelected(optionId) {
            const options = document.getElementById(optionId).children;
            for (const option of options) {
                option.classList.remove('border-2', 'border-purple-700', 'bg-purple-700', 'text-white');
            }
        }

        // Função Adicionar ao Carrinho
        function addToCart() {
            const quantity = document.getElementById("quantity").value;

            if (!selectedColor || !selectedSize) {
                alert("Selecione uma cor e um tamanho antes de adicionar ao carrinho.");
                return;
            }

            // Simulação de adicionar ao carrinho (substitua por uma integração real com o backend)
            const produto = {
                nome: document.getElementById("sidebarProductName").textContent,
                preco: document.getElementById("sidebarProductPrice").textContent,
                cor: selectedColor,
                tamanho: selectedSize,
                quantidade: quantity
            };

            // Chamar função para abrir a sidebar do carrinho
            openCartSidebar(produto);
            closeSidebar();
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

        function closeSidebar() {
            document.getElementById("productSidebar").style.transform = "translateX(100%)";
            document.getElementById("overlay").classList.add("hidden");
        }

        function openCartSidebar(produto) {
            // Código para abrir e exibir o carrinho com o produto adicionado
            alert(`Produto ${produto.nome} adicionado ao carrinho!`);
            // Aqui você pode adicionar a lógica para abrir a sidebar do carrinho e mostrar o produto nele
        }
    </script>

</body>

</html>