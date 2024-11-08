<?php
session_start();
include("../../backend/conexao.php");

// Mensagem de boas-vindas
$mensagem_bem_vindo = "";
if (isset($_SESSION['id_cadastro'])) {
    $mensagem_bem_vindo = "Olá, " . htmlspecialchars($_SESSION['nome']) . "!";
} else {
    $mensagem_bem_vindo = "Registre-se ou faça login para acessar as funcionalidades.";
}

// Função para gerenciar o carrinho
function getCarrinho()
{
    if (isset($_SESSION['id_cadastro'])) {
        // Carrinho persistente na sessão para usuários logados
        return $_SESSION['carrinho'] ?? [];
    } else {
        // Carrinho armazenado em cookies para usuários não logados
        return json_decode($_COOKIE['carrinho'] ?? '[]', true);
    }
}

function setCarrinho($carrinho)
{
    if (isset($_SESSION['id_cadastro'])) {
        // Para usuários logados, o carrinho é salvo na sessão
        $_SESSION['carrinho'] = $carrinho;
    } else {
        // Para usuários não logados, o carrinho é salvo em cookies
        setcookie('carrinho', json_encode($carrinho), time() + (86400 * 7), "/"); // 7 dias
    }
}

// Adicionar produto ao carrinho
if (isset($_POST['action']) && $_POST['action'] == 'add_to_cart') {
    $produto = [
        'idProduto' => $_POST['idProduto'],
        'quantidade' => $_POST['quantidade'],
        'cor' => $_POST['cor'],
        'tamanho' => $_POST['tamanho']
    ];

    $carrinho = getCarrinho();

    $produtoExistente = false;
    foreach ($carrinho as $key => $item) {
        if ($item['idProduto'] == $produto['idProduto'] && $item['cor'] == $produto['cor'] && $item['tamanho'] == $produto['tamanho']) {
            $carrinho[$key]['quantidade'] += $produto['quantidade']; // Soma a quantidade
            $produtoExistente = true;
            break;
        }
    }

    if (!$produtoExistente) {
        $carrinho[] = $produto; // Adiciona o novo produto
    }

    setCarrinho($carrinho); // Atualiza o carrinho

    echo json_encode(['message' => 'Produto adicionado ao carrinho!']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocket Store</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <script>
        const popup = document.getElementById('welcome-popup');
        if (popup) {
            setTimeout(() => { popup.style.display = 'none'; }, 3000);
        }
    </script>
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
    <?php
    include("./carrossel.php");
    include("./produtosIndex.php");
    include("./footer.php");
    ?>
    <script>
        // Função para adicionar produto ao carrinho
        function addToCart() {
            const quantidade = document.getElementById("quantity").value;
            const selectedColor = document.querySelector('input[name="color"]:checked');
            const selectedSize = document.querySelector('input[name="size"]:checked');

            if (!selectedColor || !selectedSize) {
                alert("Selecione uma cor e um tamanho antes de adicionar ao carrinho.");
                return;
            }

            const produto = {
                idProduto: document.getElementById("productID").value,
                quantidade: quantidade,
                cor: selectedColor.value,
                tamanho: selectedSize.value,
            };

            // Envia a requisição para o backend para adicionar o produto ao carrinho
            fetch('carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'add_to_cart',
                    ...produto
                })
            })
                .then(response => response.json())
                .then(data => {
                    // Exibe a mensagem de sucesso
                    alert(data.message);

                    // Atualiza a lista de itens no carrinho
                    atualizarListaCarrinho();

                    // Abre a sidebar do carrinho
                    openCartSidebar();
                })
                .catch(error => console.error('Erro ao adicionar ao carrinho:', error));
        }

        // Função para abrir a sidebar do carrinho
        function openCartSidebar() {
            document.getElementById("sidebar").classList.remove("translate-x-full");
            document.getElementById("overlay").classList.remove("hidden");
        }

        // Função para fechar a sidebar do carrinho
        function closeCartSidebar() {
            document.getElementById("sidebar").classList.add("translate-x-full");
            document.getElementById("overlay").classList.add("hidden");
        }

        // Função para atualizar a lista de produtos no carrinho
        function atualizarListaCarrinho() {
            fetch('carrinho.php', {
                method: 'GET'
            })
                .then(response => response.json())
                .then(carrinho => {
                    const cartList = document.getElementById("cart-list");
                    cartList.innerHTML = ''; // Limpa a lista atual

                    // Preenche com os itens do carrinho
                    if (carrinho.length === 0) {
                        cartList.innerHTML = "<li>Seu carrinho está vazio.</li>";
                    } else {
                        carrinho.forEach(item => {
                            const li = document.createElement("li");
                            li.textContent = `Produto ID: ${item.idProduto} | Quantidade: ${item.quantidade} | Cor: ${item.cor} | Tamanho: ${item.tamanho}`;
                            cartList.appendChild(li);
                        });
                    }
                })
                .catch(error => console.error('Erro ao carregar carrinho:', error));
        }

        // Função para fechar o popover se clicar fora
        window.addEventListener('click', function (event) {
            const profileButton = document.getElementById('profile-icon'); // Botão de perfil
            const popover = document.getElementById('popover-bottom'); // Popover

            // Verifica se o clique foi fora do popover ou do botão de perfil
            if (!profileButton.contains(event.target) && !popover.contains(event.target)) {
                popover.classList.add('invisible');
                popover.classList.remove('opacity-100');
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
</body>

</html>