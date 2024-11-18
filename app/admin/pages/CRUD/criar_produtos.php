<?php

session_start();
include("../../../../backend/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = htmlspecialchars(trim($_POST['nomeProduto']));
    $precoProduto = filter_var($_POST['precoProduto'], FILTER_VALIDATE_FLOAT);
    $categoriaProduto = htmlspecialchars(trim($_POST['categoriaProduto']));
    $marcaProduto = htmlspecialchars(trim($_POST['marcaProduto']));
    $fkIdFornecedor = isset($_POST['fkIdFornecedor']) ? $_POST['fkIdFornecedor'] : null;
    $fkIdColecao = isset($_POST['fkIdColecao']) ? $_POST['fkIdColecao'] : null;
    $descricaoProduto = htmlspecialchars(trim($_POST['descricaoProduto']));
    $sexoProduto = isset($_POST['sexoProduto']) ? htmlspecialchars(trim($_POST['sexoProduto'])) : 'masculino'; // Valor default 'masculino'

    // Verifique se o preço é válido
    if ($precoProduto === false) {
        $_SESSION['error'] = "Preço inválido.";
        header("Location: criar_produto.php");
        exit();
    }

    // Verifique se o fornecedor existe
    $stmt = $conexao->prepare("SELECT COUNT(*) FROM fornecedor WHERE idFornecedor = ?");
    $stmt->bind_param("i", $fkIdFornecedor);
    $stmt->execute();
    $stmt->bind_result($countFornecedor);
    $stmt->fetch();
    $stmt->close();

    // Verifique se a coleção existe
    $stmt = $conexao->prepare("SELECT COUNT(*) FROM colecoes WHERE idColecao = ?");
    $stmt->bind_param("i", $fkIdColecao);
    $stmt->execute();
    $stmt->bind_result($countColecao);
    $stmt->fetch();
    $stmt->close();

    // Se o fornecedor ou a coleção não existir, exibe erro
    if ($countFornecedor == 0) {
        $_SESSION['error'] = "Fornecedor não encontrado.";
        header("Location: criar_produto.php");
        exit();
    }

    if ($countColecao == 0) {
        $_SESSION['error'] = "Coleção não encontrada.";
        header("Location: criar_produto.php");
        exit();
    }

    // Verifique se o arquivo foi enviado e é válido
    if (isset($_FILES['imagemProduto']) && $_FILES['imagemProduto']['error'] == 0) {
        $diretorio = '../../../../public/uploads/';
        $extensao = pathinfo($_FILES['imagemProduto']['name'], PATHINFO_EXTENSION);
        $nomeOriginal = pathinfo($_FILES['imagemProduto']['name'], PATHINFO_FILENAME);
        $nomeArquivo = $nomeOriginal . '.' . $extensao;
        $caminhoCompleto = $diretorio . $nomeArquivo;

        // Mover o arquivo para o diretório
        if (move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $caminhoCompleto)) {
            // Inserir o produto
            $stmt = $conexao->prepare("INSERT INTO produto (nomeProduto, precoProduto, categoriaProduto, marcaProduto, imagemProduto, fkIdFornecedor, fkIdColecao, sexoProduto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sdssssis", $nomeProduto, $precoProduto, $categoriaProduto, $marcaProduto, $nomeArquivo, $fkIdFornecedor, $fkIdColecao, $sexoProduto);

            if ($stmt->execute()) {
                header("Location: listar_produtos.php");
                exit();
            } else {
                $_SESSION['error'] = "Erro ao adicionar produto.";
            }
        } else {
            $_SESSION['error'] = "Erro ao mover o arquivo.";
        }
    } else {
        $_SESSION['error'] = "Erro no upload do arquivo.";
    }

    header("Location: criar_produto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <!--NAVBAR E ASIDE-->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 ">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="../../../public/assets/Logo.svg" class="h-10 me-3" alt="" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow "
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 " role="none">
                                    <?php echo isset($_SESSION['admin_nome']) ? "Olá, " . htmlspecialchars($_SESSION['admin_nome']) : 'Olá!'; ?>
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate " role="none">
                                    <?php echo isset($_SESSION['admin_email']) ? "E-mail: " . htmlspecialchars($_SESSION['admin_email']) : ''; ?>
                                </p>
                            </div>

                            <ul class="py-1" role="none">
                                <li>
                                    <a href="./dashboard.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Configuraçoes</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
            <ul class="space-y-2 font-medium">
                <!--dashboard-->
                <li>
                    <a href="../dashboard.php"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <!-- Produtos -->
                <li>
                    <!-- Botão de dropdown para Produtos -->
                    <button type="button"
                        class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 "
                        aria-controls="dropdown-produtos" data-collapse-toggle="dropdown-produtos" aria-expanded="false"
                        onclick="toggleDropdown('dropdown-produtos', 'arrow-produtos')">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 text-left ms-3 whitespace-nowrap">Produtos</span>
                        <!-- Ícone da seta com rotação animada -->
                        <svg id="arrow-produtos" class="w-3 h-3 transition-transform duration-300 transform"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4"></path>
                        </svg>
                    </button>

                    <!-- Conteúdo do dropdown para Produtos -->
                    <div id="dropdown-produtos" class="hidden mt-2 space-y-2">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">Adicionar
                            Produto</a>
                        <a href="./listar_produtos.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">Lista
                            de Produtos
                        </a>
                    </div>
                </li>

                <!-- Coleções -->
                <li>
                    <!-- Botão de dropdown para Coleções -->
                    <button type="button"
                        class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 "
                        aria-controls="dropdown-colecoes" data-collapse-toggle="dropdown-colecoes" aria-expanded="false"
                        onclick="toggleDropdownIcon('dropdown-colecoes-icon')">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 ">
                            <path fill-rule="evenodd"
                                d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 text-left ms-3 whitespace-nowrap">Coleções</span>

                        <svg id="dropdown-colecoes-icon" class="w-3 h-3 transition-transform duration-300 transform"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4"></path>
                        </svg>
                    </button>

                    <!-- Conteúdo do dropdown para Coleções -->
                    <div id="dropdown-colecoes" class="hidden mt-2 space-y-2">
                        <a href="./criar_colecoes.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">
                            Adicionar coleção
                        </a>
                        <a href="./listar_colecoes.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">
                            Lista de coleções
                        </a>
                    </div>
                </li>

                <!--fornecedores-->
                <li>
                    <!-- Botão de dropdown para fornecedores -->
                    <button type="button"
                        class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 "
                        aria-controls="dropdown-fornecedores" data-collapse-toggle="dropdown-fornecedores"
                        aria-expanded="false" onclick="toggleDropdownIcon('dropdown-fornecedores-icon')">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 ">
                            >
                            <path
                                d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                            <path
                                d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                            <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>


                        <span class="flex-1 text-left ms-3 whitespace-nowrap">Fornecedores</span>

                        <svg id="dropdown-fornecedores-icon" class="w-3 h-3 transition-transform duration-300 transform"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4"></path>
                        </svg>
                    </button>

                    <!-- Conteúdo do dropdown para fornecedores -->
                    <div id="dropdown-fornecedores" class="hidden mt-2 space-y-2">
                        <a href="./cadastrar_forn.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">
                            Adicionar fornecedor
                        </a>
                        <a href="./listar_fornecedores.php"
                            class="block px-4 py-2 text-sm text-gray-700 hover:text-purple-500 hover:underline hover:bg-gray-100 ">
                            Lista de fornecedores
                        </a>
                    </div>
                </li>

                <!--transações-->
                <!-- <li>
                    <a href="listar_transacoes.php"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z"
                                clip-rule="evenodd" />
                            <path
                                d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Transações</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-purple-800 bg-purple-100 rounded-full ms-3">0</span>
                    </a>
                </li> -->

            </ul>
        </div>
    </aside>

    <!-- Conteudo -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <h1 class="mb-4 text-2xl font-bold">Adicionar Produto</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nome do Produto:</label>
                        <input type="text" name="nomeProduto" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="sexoProduto">
                            Sexo:</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5"
                            name="sexoProduto" id="sexoProduto">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Preço:</label>
                        <input type="number" name="precoProduto" step="any" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md" />
                    </div>

                    <div class="mb-4">
                        <div>
                            <label for="categoriaProduto"
                                class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                            <select id="categoriaProduto" name="categoriaProduto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                                <option value="" disabled selected>Selecione uma categoria</option>
                                <option value="CamisetaM">Camiseta [M]</option>
                                <option value="CamisetaF">Camiseta [F]</option>
                                <option value="Calça">Calça</option>
                                <option value="Moletom">Moletom</option>
                                <option value="Saia">Saia</option>
                                <option value="Shorts">Shorts</option>
                                <option value="Tenis">Tênis</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fornecedor" class="block mb-2 text-sm font-medium text-gray-900">Fornecedor:</label>
                        <select id="fkIdFornecedor" name="fkIdFornecedor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                            <option value="" disabled selected>Selecione um(a) fornecedor(a)</option>
                            <?php
                            $fornecedores = $conexao->query("SELECT idFornecedor, nomeFornecedor FROM fornecedor");
                            while ($fornecedor = $fornecedores->fetch_assoc()) {
                                echo "<option value=\"{$fornecedor['idFornecedor']}\">{$fornecedor['nomeFornecedor']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Marca:</label>
                        <input type="text" name="marcaProduto" required
                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md" />
                    </div>

                    <div class="mb-4">
                        <label for="colecao" class="block mb-2 text-sm font-medium text-gray-900">Coleção:</label>
                        <select id="fkIdColecao" name="fkIdColecao"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5">
                            <option value="" disabled selected>Selecione uma coleção</option>
                            <?php
                            $fornecedores = $conexao->query("SELECT idColecao, nomeColecao FROM colecoes");
                            while ($fornecedor = $fornecedores->fetch_assoc()) {
                                echo "<option value=\"{$fornecedor['idColecao']}\">{$fornecedor['nomeColecao']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="descricaoProduto"
                            class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                        <textarea id="descricaoProduto" name="descricao" rows="4"
                            class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Descrição do produto..."></textarea>
                    </div>


                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="imagemProduto">Escolher
                            Imagem</label>
                        <input type="file" id="imagemProduto" name="imagemProduto" accept="image/*" required>
                    </div>
                </div>

                <button type="submit"
                    class="text-white inline-flex items-center bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="w-6 h-6 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Adicionar Produto
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../../scripts/dropdowns.js"></script>
</body>

</html>