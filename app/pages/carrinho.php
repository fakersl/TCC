<?php
session_start();
include("../../backend/conexao.php");

// Função para manipular cookies
function setCarrinhoCookie($carrinho)
{
    setcookie('carrinho', json_encode($carrinho), time() + (86400 * 30), "/"); // 30 dias
}

function getCarrinhoCookie()
{
    return isset($_COOKIE['carrinho']) ? json_decode($_COOKIE['carrinho'], true) : [];
}

// Recupera o carrinho do cookie
$carrinho = getCarrinhoCookie();

// Adiciona um produto ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $idProduto = $_POST['idProduto'];
    $quantidade = $_POST['quantidade'];

    // Obter detalhes do produto do banco de dados
    $query = "SELECT nomeProduto, precoProduto, imagemProduto FROM produto WHERE idProduto = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $idProduto);
    $stmt->execute();
    $result = $stmt->get_result();
    $produto = $result->fetch_assoc();

    if ($produto) {
        if (isset($produto['nomeProduto'], $produto['precoProduto'], $produto['imagemProduto'])) {
            if (isset($carrinho[$idProduto])) {
                // Atualiza a quantidade se já estiver no carrinho
                $carrinho[$idProduto]['quantidade'] += intval($quantidade);
            } else {
                // Adiciona novo produto ao carrinho
                $carrinho[$idProduto] = [
                    'nome' => $produto['nomeProduto'],
                    'preco' => floatval($produto['precoProduto']), // Garantir que o preço é um float
                    'imagem' => $produto['imagemProduto'], // Adicionando a imagem
                    'quantidade' => intval($quantidade)
                ];
            }
        } else {
            echo "Erro: Nome, preço ou imagem do produto não encontrados.";
        }
    } else {
        echo "Erro: Produto não encontrado.";
    }

    setCarrinhoCookie($carrinho); // Atualiza o cookie
    header("Location: " . $_SERVER['PHP_SELF']); // Redireciona para evitar reenvio do formulário
    exit();
}

// Cálculo do total
$total = 0;
foreach ($carrinho as $item) {
    if (isset($item['preco']) && isset($item['quantidade'])) {
        $total += $item['preco'] * $item['quantidade'];
    } else {
        echo "Erro: Produto sem preço ou quantidade.";
        var_dump($item); // Debug: Mostra o item que está faltando
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section class="py-8 antialiased bg-white md:py-16">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Seu Carrinho</h2>
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">

                    <div class="space-y-6" id="lista-carrinho">
                        <?php foreach ($carrinho as $id => $item): ?>
                            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:p-6">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <a href="#" class="shrink-0 md:order-1">
                                        <img class="w-20 h-20"
                                            src="../../public/uploads/<?php echo htmlspecialchars($item['imagem']); ?>"
                                            alt="<?php echo htmlspecialchars($item['nome']); ?>" />
                                    </a>
                                    <label for="counter-input" class="sr-only">Quantidade:</label>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <button onclick="alterarQuantidade('<?php echo $id; ?>', -1)"
                                            class="px-2 py-1 text-lg font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">-</button>
                                        <input type="text"
                                            class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0"
                                            value="<?php echo $item['quantidade']; ?>" readonly />
                                        <button onclick="alterarQuantidade('<?php echo $id; ?>', 1)"
                                            class="px-2 py-1 text-lg font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">+</button>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-gray-900">
                                                R$<?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                        <a href="#"
                                            class="text-base font-medium text-gray-900 hover:underline"><?php echo $item['nome']; ?></a>
                                        <div class="flex items-center gap-4">
                                            <button type="button"
                                                class="inline-flex items-center text-sm font-medium text-red-600 hover:underline"
                                                onclick="removerDoCarrinho('<?php echo $id; ?>')">Remover</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>
                <div class="flex-1 max-w-4xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">

                    <div class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6">
                        <p class="text-xl font-semibold text-gray-900">Resumo do Pedido</p>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500">Preço total</dt>
                            <dd class="text-base font-medium text-gray-900 total-preco">
                                R$<?php echo number_format($total, 2, ',', '.'); ?></dd>
                        </dl>
                        <a href="#"
                            class="flex w-full items-center justify-center rounded-lg bg-purple-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300">Ir
                            para o Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function getCarrinho() {
            const carrinho = document.cookie.split('; ').find(row => row.startsWith('carrinho='));
            return carrinho ? JSON.parse(decodeURIComponent(carrinho.split('=')[1])) : {};
        }

        function setCarrinhoCookie(carrinho) {
            document.cookie = "carrinho=" + encodeURIComponent(JSON.stringify(carrinho)) + "; path=/; max-age=" + (86400 * 30);
        }

        function alterarQuantidade(idProduto, ajuste) {
            const carrinho = getCarrinho();

            if (carrinho[idProduto]) {
                // Ajusta a quantidade
                carrinho[idProduto].quantidade += ajuste;

                // Remove o produto se a quantidade for zero
                if (carrinho[idProduto].quantidade <= 0) {
                    delete carrinho[idProduto];
                }

                setCarrinhoCookie(carrinho); // Atualiza o cookie
                atualizarListaCarrinho(); // Atualiza a lista na interface
                atualizarPrecoTotal(); // Atualiza o preço total
            }
        }

        function atualizarListaCarrinho() {
            const listaCarrinho = document.getElementById('lista-carrinho');
            console.log(listaCarrinho);
            
            if (!listaCarrinho) return;
            
            listaCarrinho.innerHTML = '';

            const carrinho = getCarrinho();
            for (const id in carrinho) {
                const produto = carrinho[id];
                const item = document.createElement('div');
                item.className = 'p-4 bg-white border border-gray-200 rounded-lg shadow-sm md:p-6';
                item.id = 'item-' + id;
                
                item.innerHTML = `
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <img class="w-20 h-20" src="../../public/uploads/${produto.imagem}" alt="${produto.nome}" />
                        <div class="flex items-center justify-between">
                            <button onclick="alterarQuantidade('${id}', -1)" class="px-2 py-1 text-lg font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">-</button>
                            <input type="text" class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0" value="${produto.quantidade}" readonly />
                            <button onclick="alterarQuantidade('${id}', 1)" class="px-2 py-1 text-lg font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">+</button>
                            <div class="text-end">
                                <p class="text-base font-bold text-gray-900">R$${(produto.preco * produto.quantidade).toFixed(2).replace('.', ',')}</p>
                            </div>
                        </div>
                        <div class="flex-1 w-full min-w-0 space-y-4">
                            <a href="#" class="text-base font-medium text-gray-900 hover:underline">${produto.nome}</a>
                            <button type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline" onclick="removerDoCarrinho('${id}')">Remover</button>
                        </div>
                    </div>
                `;
                listaCarrinho.appendChild(item);
            }
        }

        function atualizarPrecoTotal() {
            const total = Object.values(getCarrinho()).reduce((acc, item) => acc + item.preco * item.quantidade, 0);
            document.querySelector('.total-preco').textContent = `R$${total.toFixed(2).replace('.', ',')}`;
        }

        function removerDoCarrinho(idProduto) {
            const carrinho = getCarrinho();
            delete carrinho[idProduto];
            setCarrinhoCookie(carrinho);
            atualizarListaCarrinho();
            atualizarPrecoTotal();
        }
    </script>
</body>

</html>