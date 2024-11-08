<?php
include("../../backend/conexao.php");

session_start();
$usuarioId = $_SESSION['id_cadastro'];

$query = "SELECT nome, email FROM cadastro WHERE id_cadastro = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['nome'] = $usuario['nome'];  // Armazena o nome na sessão
    $_SESSION['email'] = $usuario['email']; // Caso queira o email também
} else {
    // Redireciona caso não encontre o usuário
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioId = $_SESSION['usuario_id']; // Obtenha o ID do usuário da sessão

    // Pegue os dados do pagamento (dependendo do método de pagamento selecionado)
    $metodoPagamento = $_POST['metodo-pagamento'];

    // Variáveis de dados de pagamento
    $numeroCartao = $vencimento = $codigoSeguranca = '';
    $numeroCartaoDebito = $vencimentoDebito = '';
    $cpf = '';

    if ($metodoPagamento == 'cartao') {
        $numeroCartao = $_POST['numero-cartao'];
        $vencimento = $_POST['vencimento'];
        $codigoSeguranca = $_POST['codigo-seguranca'];
    } elseif ($metodoPagamento == 'debito') {
        $numeroCartaoDebito = $_POST['numero-cartao-debito'];
        $vencimentoDebito = $_POST['vencimento-debito'];
    } elseif ($metodoPagamento == 'boleto') {
        $cpf = $_POST['cpf'];
    }

    // Salvar as informações no banco, ou atualizar se já existirem
    $query = "UPDATE usuarios SET metodo_pagamento = ?, numero_cartao = ?, vencimento = ?, codigo_seguranca = ?, numero_cartao_debito = ?, vencimento_debito = ?, cpf = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssi", $metodoPagamento, $numeroCartao, $vencimento, $codigoSeguranca, $numeroCartaoDebito, $vencimentoDebito, $cpf, $usuarioId);
    $stmt->execute();

    // Redirecionar ou mostrar sucesso
    header("Location: sucesso.php"); // Sucesso, pode ajustar conforme necessário
    exit();
}

$carrinho = json_decode($_COOKIE['carrinho'], true); // Pega o cookie do carrinho
$total = 0; // Variável para calcular o valor total

if ($carrinho) {
    foreach ($carrinho as $item) {
        $quantidade = (int) $item['quantidade'];
        $precoUnitario = (float) $item['preco'];
        $total += $quantidade * $precoUnitario;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <!--NAVBAR-->
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

    <section class="py-8 antialiased bg-white md:py-16">
        <form novalidate action="finalizar.php" method="POST" class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <ol class="flex items-center w-full max-w-2xl text-sm font-medium text-center text-gray-500 sm:text-base">
                <li
                    class="after:border-1 flex items-center text-purple-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/']  sm:after:hidden">
                        <svg class="w-4 h-4 me-2 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Carrinho
                    </span>
                </li>

                <li
                    class="after:border-1 flex items-center text-purple-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-20 sm:after:inline-block sm:after:content-['/'] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] sm:after:hidden">
                        <svg class="w-4 h-4 me-2 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Checkout
                    </span>
                </li>

                <li class="flex items-center shrink-0">
                    <svg class="w-4 h-4 me-2 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Resumo do pedido
                </li>
            </ol>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="flex-1 min-w-0 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 ">Detalhes da entrega</h2>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900"> Seu nome</label>
                                <input type="text" id="nome" value="<?php echo htmlspecialchars($_SESSION['nome']); ?>"
                                    required readonly
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 "
                                    placeholder="Bonnie Green" required />
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Seu
                                    e-mail*</label>
                                <input type="email" id="email"
                                    value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required readonly
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 "
                                    placeholder="seuemail@email.com" required />
                            </div>

                            <div class="px-6 pt-20">
                                <h1 class="mb-6 text-2xl font-bold">Escolha o método de pagamento</h1>
                                <form method="POST" action="finalizar.php">
                                    <div class="mb-4">
                                        <label for="metodo-pagamento" class="block text-lg font-semibold">Método de
                                            Pagamento</label>
                                        <select id="metodo-pagamento" name="metodo-pagamento"
                                            class="w-full p-2 border border-gray-300 rounded-md">
                                            <option value="cartao">Cartão de Crédito</option>
                                            <option value="debito">Cartão de Débito</option>
                                            <option value="boleto">Boleto Bancário</option>
                                        </select>
                                    </div>

                                    <!-- Campo para Cartão de Crédito -->
                                    <div id="cartao" class="hidden mb-6 metodo-pagamento-fields">
                                        <label for="numero-cartao" class="block mb-2 text-lg font-semibold">Número do
                                            Cartão</label>
                                        <input type="text" id="numero-cartao" name="numero-cartao"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required oninput="formatarCartao(this)">

                                        <label for="vencimento-debito"
                                            class="block mt-4 mb-2 text-lg font-semibold">Data de Vencimento</label>
                                        <input type="text" id="vencimento-debito" name="vencimento-debito"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required placeholder="Selecione a data">

                                        <label for="codigo-seguranca"
                                            class="block mt-4 mb-2 text-lg font-semibold">Código de Segurança</label>
                                        <input type="text" id="codigo-seguranca" name="codigo-seguranca"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required maxlength="3" oninput="formatarCodigoSeguranca(this)">
                                    </div>

                                    <!-- Campo para Cartão de Débito -->
                                    <div id="debito" class="hidden mb-6 metodo-pagamento-fields">
                                        <label for="numero-cartao-debito"
                                            class="block mb-2 text-lg font-semibold">Número do Cartão de Débito</label>
                                        <input type="text" id="numero-cartao-debito" name="numero-cartao-debito"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required oninput="formatarCartao(this)">

                                        <label for="vencimento-debito"
                                            class="block mt-4 mb-2 text-lg font-semibold">Data de Vencimento</label>
                                        <input type="text" id="vencimento-debito" name="vencimento-debito"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required placeholder="Selecione a data">
                                    </div>

                                    <!-- Campo para Boleto Bancário -->
                                    <div id="boleto" class="hidden mb-6 metodo-pagamento-fields">
                                        <label for="cpf" class="block mb-2 text-lg font-semibold">CPF</label>
                                        <input type="text" id="cpf" name="cpf"
                                            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                                            required oninput="formatarCPF(this)">
                                    </div>

                                    <button type="submit" class="px-4 py-2 mt-4 text-white bg-purple-600 rounded-lg">
                                        Finalizar Compra</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 lg:mt-0 lg:w-[350px]">
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg">
                        <h3 class="px-6 py-4 text-lg font-semibold text-gray-900 border-b bg-gray-50">Resumo do
                            Pedido</h3>
                        <ul role="list" class="px-6 py-4 text-sm divide-y divide-gray-200">
                            <?php foreach ($carrinho as $item): ?>
                                <li class="flex py-3">
                                    <img src="<?= $item['imagem'] ?>" class="object-cover object-center w-16 h-16 mr-4"
                                        alt="">
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-900"><?= $item['nome'] ?></p>
                                        <p class="text-gray-500">Quantidade: <?= $item['quantidade'] ?></p>
                                    </div>
                                    <div class="ml-2 text-gray-500">
                                        R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="px-6 py-4 mt-4 font-medium text-right text-gray-900">
                            <p>Total: <span class="text-xl text-purple-700">R$ <?= number_format($total, 2, ',', '.') ?>
                                </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Verifique se o campo de cartão de crédito, código de segurança e CPF estão preenchidos
        document.getElementById('numero-cartao').addEventListener('input', function () {
            this.setCustomValidity(this.value === '' ? 'Este campo é obrigatório' : '');
        });

        document.getElementById('codigo-seguranca').addEventListener('input', function () {
            this.setCustomValidity(this.value === '' ? 'Este campo é obrigatório' : '');
        });

        document.getElementById('cpf').addEventListener('input', function () {
            this.setCustomValidity(this.value === '' ? 'Este campo é obrigatório' : '');
        });


        flatpickr("#vencimento-debito", {
            altInput: true, // Mostra o campo com formato mais amigável
            altFormat: "F j, Y", // Exibe no formato "Mês Dia, Ano" (ex: Outubro 12, 2024)
            dateFormat: "Y-m-d", // Formato enviado no formulário (Ano-Mês-Dia)
            minDate: "today", // Não permite selecionar datas passadas
            locale: "pt", // Configura para o idioma português
            monthSelectorType: "static", // Exibe o calendário em vez de um campo de mês
            disableMobile: true, // Desativa o calendário nativo do dispositivo (para dispositivos móveis)
        });

        // Formatar número do cartão de crédito/débito
        function formatarCartao(input) {
            input.value = input.value.replace(/\D/g, '') // Remove tudo que não for número
                .replace(/(\d{4})(\d)/, '$1 $2') // Coloca um espaço após 4 dígitos
                .replace(/(\d{4})(\d{4})(\d)/, '$1 $2 $3') // Coloca espaços após 8 e 12 dígitos
                .replace(/(\d{4})(\d{4})(\d{4})(\d)/, '$1 $2 $3 $4') // Coloca espaços após 12 dígitos
                .slice(0, 19); // Limita o comprimento a 19 caracteres
        }

        // Formatar data de vencimento
        function formatarData(input) {
            input.value = input.value.replace(/\D/g, '') // Remove tudo que não for número
                .replace(/(\d{2})(\d)/, '$1/$2') // Coloca a barra após o mês
                .slice(0, 5); // Limita o comprimento a 5 caracteres (MM/AAAA)
        }

        // Formatar código de segurança
        function formatarCodigoSeguranca(input) {
            input.value = input.value.replace(/\D/g, '') // Remove tudo que não for número
                .slice(0, 3); // Limita o comprimento a 3 caracteres
        }

        // Formatar CPF
        function formatarCPF(input) {
            input.value = input.value.replace(/\D/g, '') // Remove tudo que não for número
                .replace(/(\d{3})(\d)/, '$1.$2') // Coloca o ponto após o 3º dígito
                .replace(/(\d{3})(\d{3})(\d)/, '$1.$2.$3') // Coloca o ponto após o 6º dígito
                .replace(/(\d{3})(\d{3})(\d{3})(\d)/, '$1.$2.$3-$4') // Coloca o traço antes do último dígito
                .slice(0, 14); // Limita o comprimento a 14 caracteres (xxx.xxx.xxx-xx)
        }

        document.getElementById('metodo-pagamento').addEventListener('change', function () {
            var metodoPagamento = this.value;
            document.querySelectorAll('.metodo-pagamento-fields').forEach(function (field) {
                field.classList.add('hidden');
            });
            if (metodoPagamento === 'cartao') {
                document.getElementById('cartao').classList.remove('hidden');
            } else if (metodoPagamento === 'debito') {
                document.getElementById('debito').classList.remove('hidden');
            } else if (metodoPagamento === 'boleto') {
                document.getElementById('boleto').classList.remove('hidden');
            }
        });

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
</body>

</html>