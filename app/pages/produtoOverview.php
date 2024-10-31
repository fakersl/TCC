<?php
session_start();
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
    echo "Produto não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
    <?php include("./navbarProduto.php"); ?>

    <section class="py-8 antialiased bg-white md:py-16">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="max-w-md mx-auto shrink-0 lg:max-w-lg">
                    <img class="w-full" src="../../public/uploads/<?php echo htmlspecialchars($produto['imagemProduto']); ?>" alt="<?php echo htmlspecialchars($produto['nomeProduto']); ?>" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                        <?php echo htmlspecialchars($produto['nomeProduto']); ?>
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            R$<?php echo number_format($produto['precoProduto'], 2, ',', '.'); ?>
                        </p>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <a href="javascript:void(0);"
                            onclick="adicionarAoCarrinho(<?php echo $produto['idProduto']; ?>, '<?php echo addslashes($produto['nomeProduto']); ?>', '<?php echo addslashes($produto['descricaoProduto']); ?>', '<?php echo "../../public/uploads/" . $produto['imagemProduto']; ?>', <?php echo $produto['precoProduto']; ?>)"
                            class="text-white mt-4 sm:mt-0 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center">
                            Adicionar ao Carrinho
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-200 md:my-8" />
        <p class="mb-6 text-gray-700">
            <?php echo htmlspecialchars($produto['descricaoProduto']); ?>
        </p>
    </section>

    <div id="sidebar" class="fixed top-0 left-0 z-50 w-64 h-full transition-transform duration-300 transform -translate-x-full bg-white shadow-lg">
        <div class="p-4">
            <button id="close-sidebar" class="text-gray-900" onclick="fecharSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h2 class="mt-6 font-semibold text-gray-900">Produtos no Carrinho:</h2>
            <ul id="lista-carrinho" class="mt-4 space-y-2"></ul>
            <button onclick="window.location.href='carrinho.php'"
                class="mt-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                Ir para o Checkout
            </button>
        </div>
    </div>

    <div id="overlay" class="fixed top-0 left-0 hidden w-full h-full bg-gray-900 bg-opacity-50"></div>

    <script>
        function adicionarAoCarrinho(idProduto, nomeProduto, descricaoProduto, imagemProduto, precoProduto) {
            const carrinho = getCarrinho();
            const produto = {
                id: idProduto,
                nome: nomeProduto,
                descricao: descricaoProduto,
                imagem: imagemProduto,
                preco: precoProduto,
                quantidade: 1
            };

            if (carrinho[idProduto]) {
                carrinho[idProduto].quantidade += 1;
            } else {
                carrinho[idProduto] = produto;
            }

            setCarrinho(carrinho);
            atualizarListaCarrinho();
            alert('Produto adicionado ao carrinho!');
            abrirSidebar();
        }

        function getCarrinho() {
            const carrinhoJSON = getCookie('carrinho');
            return carrinhoJSON ? JSON.parse(carrinhoJSON) : {};
        }

        function setCarrinho(carrinho) {
            document.cookie = "carrinho=" + JSON.stringify(carrinho) + "; path=/; max-age=" + (86400 * 30);
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        }

        function atualizarListaCarrinho() {
            const listaCarrinho = document.getElementById('lista-carrinho');
            listaCarrinho.innerHTML = '';

            const carrinho = getCarrinho();

            for (const id in carrinho) {
                const produto = carrinho[id];
                const li = document.createElement('li');
                li.className = 'flex items-center justify-between space-x-4';
                li.innerHTML = `
                    <img class="w-16 h-16" src="${produto.imagem}" alt="${produto.nome}" />
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold">${produto.nome}</h3>
                        <p class="text-xs text-gray-500">Quantidade: ${produto.quantidade}</p>
                        <p class="text-xs text-gray-500">Preço: R$${(produto.preco * produto.quantidade).toFixed(2).replace('.', ',')}</p>
                    </div>
                    <button onclick="removerDoCarrinho('${id}')" class="text-red-600 hover:underline">Remover</button>
                `;
                listaCarrinho.appendChild(li);
            }
        }

        function removerDoCarrinho(idProduto) {
            if (confirm("Tem certeza que deseja remover este produto do carrinho?")) {
                const carrinho = getCarrinho();
                delete carrinho[idProduto]; // Remove o produto do carrinho
                setCarrinho(carrinho); // Atualiza o cookie
                atualizarListaCarrinho(); // Atualiza a lista
                alert('Produto removido do carrinho!');
            }
        }

        function abrirSidebar() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('overlay').classList.remove('hidden');
        }

        function fecharSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        }

        document.getElementById('overlay').addEventListener('click', fecharSidebar);
    </script>
</body>
</html>
