<?php
include("../../backend/conexao.php");

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RocketStore</title>
    <link href="../../public/css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <section class="py-8 antialiased bg-white md:py-16">
        <form action="processoCheckout.php" method="POST" class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <ol class="flex items-center w-full max-w-2xl text-sm font-medium text-center text-gray-500 sm:text-base">
                <li
                    class="after:border-1 flex items-center text-purple-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/']  sm:after:hidden">
                        <svg class="w-4 h-4 me-2 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Cart
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
                                <input type="text" id="nome"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 "
                                    placeholder="Bonnie Green" required />
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Seu
                                    e-mail*</label>
                                <input type="email" id="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 "
                                    placeholder="seuemail@email.com" required />
                            </div>

                            <div>
                                <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900">Sua
                                    cidade*</label>
                                <input type="text" id="cidade"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500 "
                                    placeholder="Sua cidade" required />
                            </div>

                            <div>
                                <label for="phone-input-3" class="block mb-2 text-sm font-medium text-gray-900">Número
                                    de Telefone*</label>
                                <input type="tel" id="phone-input"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500"
                                    pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="(12) 3456-7890" required />
                            </div>

                            <div class="sm:col-span-2">
                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-purple-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Adicionar endereço
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Método de Pagamento -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900">Método de Pagamento</h2>
                        <select id="metodo-pagamento" name="metodo-pagamento"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-purple-500 focus:ring-purple-500">
                            <option value="cartao">Cartão de Crédito</option>
                            <option value="debito">Débito</option>
                            <option value="boleto">Boleto Bancário</option>
                        </select>
                    </div>

                    <!-- Formulário Dinâmico para Cartão -->
                    <div id="form-cartao" class="hidden space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Detalhes do Cartão de Crédito</h3>
                        <input type="text" name="numero-cartao" placeholder="Número do Cartão"
                            class="block w-full border border-gray-300 rounded-lg" />
                        <input type="text" name="vencimento" placeholder="Data de Vencimento"
                            class="block w-full border border-gray-300 rounded-lg" />
                        <input type="text" name="codigo-seguranca" placeholder="Código de Segurança"
                            class="block w-full border border-gray-300 rounded-lg" />
                    </div>

                    <!-- Formulário Dinâmico para Débito -->
                    <div id="form-debito" class="hidden space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Detalhes do Cartão de Débito</h3>
                        <input type="text" name="numero-cartao-debito" placeholder="Número do Cartão"
                            class="block w-full border border-gray-300 rounded-lg" />
                        <input type="text" name="vencimento-debito" placeholder="Data de Vencimento"
                            class="block w-full border border-gray-300 rounded-lg" />
                    </div>

                    <!-- Formulário Dinâmico para Boleto -->
                    <div id="form-boleto" class="hidden space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Detalhes do Boleto</h3>
                        <input type="text" name="cpf" placeholder="Seu CPF"
                            class="block w-full border border-gray-300 rounded-lg" />
                    </div>

                </div>

                <!-- Resumo do Carrinho -->
                <div class="p-6 mt-8 shadow-md rounded-xl bg-gray-50 sm:w-80">
                    <h2 class="text-xl font-semibold text-gray-900">Resumo do Carrinho</h2>
                    <ul class="mt-6 space-y-4">
                        <?php
                        if ($carrinho) {
                            foreach ($carrinho as $item) {
                                $nomeProduto = htmlspecialchars($item['nome']);
                                $descricao = isset($item['descricao']) ? htmlspecialchars($item['descricao']) : 'Sem descrição';
                                $quantidade = (int) $item['quantidade'];
                                $precoUnitario = (float) $item['preco'];
                                $imagemProduto = isset($item['imagem']) ? $item['imagem'] : 'default.jpg'; // Usar imagem padrão se não houver imagem
                                $precoTotal = $quantidade * $precoUnitario;
                                $total += $precoTotal;

                                echo "
                                <li class='flex items-center space-x-4 text-sm text-gray-600'>
                                    <img src='../../public/images/$imagemProduto' alt='$nomeProduto' class='object-cover w-12 h-12 rounded-md'>
                                    <div>
                                        <p class='font-medium text-gray-900'>$nomeProduto</p>
                                        <p class='text-gray-500'>$descricao</p>
                                        <p class='text-gray-600'>Qtd: $quantidade</p>
                                    </div>
                                    <span class='text-gray-900'>R$ " . number_format($precoTotal, 2, ',', '.') . "</span>
                                </li>";
                            }
                        } else {
                            echo "<li class='text-center text-gray-600'>Seu carrinho está vazio.</li>";
                        }
                        ?>
                    </ul>
                    <div class="flex justify-between mt-4 text-sm font-medium text-gray-900">
                        <span>Total</span>
                        <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        // Script para mostrar o formulário correspondente ao método de pagamento
        document.getElementById('metodo-pagamento').addEventListener('change', function () {
            const metodoPagamento = this.value;

            document.getElementById('form-cartao').classList.add('hidden');
            document.getElementById('form-debito').classList.add('hidden');
            document.getElementById('form-boleto').classList.add('hidden');

            if (metodoPagamento === 'cartao') {
                document.getElementById('form-cartao').classList.remove('hidden');
            } else if (metodoPagamento === 'debito') {
                document.getElementById('form-debito').classList.remove('hidden');
            } else if (metodoPagamento === 'boleto') {
                document.getElementById('form-boleto').classList.remove('hidden');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.bundle.js"></script>
</body>

</html>