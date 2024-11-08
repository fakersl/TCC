<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";

$conexao = new mysqli($servidor, $usuario, $senha);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Criar banco de dados
$conexao->query("CREATE DATABASE IF NOT EXISTS bancoRocketStore");
$conexao->select_db("bancoRocketStore");

// Tabelas

// Tabela de coleções
$conexao->query("CREATE TABLE IF NOT EXISTS colecoes (
    idColecao INT PRIMARY KEY AUTO_INCREMENT,
    nomeColecao VARCHAR(255) NOT NULL,
    descricaoColecao TEXT NOT NULL
)");

// Tabela de endereços
$conexao->query("CREATE TABLE IF NOT EXISTS endereco (
    idEndereco INT PRIMARY KEY AUTO_INCREMENT,
    rua VARCHAR(150) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(10) NOT NULL,
    cep CHAR(10) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    numeroCasa VARCHAR(10) NOT NULL
)");

// Tabela de fornecedores
$conexao->query("CREATE TABLE IF NOT EXISTS fornecedor (
    idFornecedor INT PRIMARY KEY AUTO_INCREMENT,
    nomeFornecedor VARCHAR(200) NOT NULL,
    emailFornecedor VARCHAR(200) NOT NULL,
    produtoFornecedor VARCHAR(200) NOT NULL,
    telefoneFornecedor VARCHAR(200) NOT NULL,
    fkIdEndereco INT NOT NULL,
    FOREIGN KEY (fkIdEndereco) REFERENCES endereco(idEndereco) ON DELETE CASCADE
)");

// Tabela de cadastros
$conexao->query("CREATE TABLE IF NOT EXISTS cadastro (
    id_cadastro INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    cidade VARCHAR(200) NOT NULL,
    bairro VARCHAR(200) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    numero VARCHAR(200) NOT NULL,
    senha VARCHAR(255) NOT NULL
)");

// Tabela de administradores
$conexao->query("CREATE TABLE IF NOT EXISTS administrador (
    id_administrador INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
)");

// Tabela de usuários
$conexao->query("CREATE TABLE IF NOT EXISTS usuario (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cep VARCHAR(20),
    cpf VARCHAR(20) NOT NULL UNIQUE,
    dataNascimento DATE NOT NULL,
    fkIdEndereco INT NOT NULL,
    FOREIGN KEY (fkIdEndereco) REFERENCES endereco(idEndereco) ON DELETE CASCADE
)");

// Tabela de produtos
$conexao->query("CREATE TABLE IF NOT EXISTS produto (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    marcaProduto VARCHAR(100) NOT NULL,
    precoProduto DECIMAL(10, 2) NOT NULL,
    categoriaProduto VARCHAR(100) NOT NULL,
    descricaoProduto VARCHAR(100) NOT NULL,
    imagemProduto MEDIUMBLOB,
    fkIdFornecedor INT NOT NULL,
    fkIdColecao INT NOT NULL,
    FOREIGN KEY (fkIdFornecedor) REFERENCES fornecedor(idFornecedor) ON DELETE CASCADE,
    FOREIGN KEY (fkIdColecao) REFERENCES colecoes(idColecao) ON DELETE CASCADE
)");

// Tabela de carrinho
$conexao->query("CREATE TABLE IF NOT EXISTS carrinho (
    idCarrinho INT PRIMARY KEY AUTO_INCREMENT,
    fkIdProduto INT NOT NULL,
    fkIdCadastro INT NOT NULL,
    dataCompra DATE NOT NULL,
    statusPagamento VARCHAR(50),
    tipoPagamento VARCHAR(50) NOT NULL,
    FOREIGN KEY (fkIdProduto) REFERENCES produto(idProduto) ON DELETE CASCADE,
    FOREIGN KEY (fkIdCadastro) REFERENCES cadastro(id_cadastro) ON DELETE CASCADE
)");

// Tabela de favoritos
$conexao->query("CREATE TABLE IF NOT EXISTS favoritos (
    idFavorito INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    idProduto INT,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario),
    FOREIGN KEY (idProduto) REFERENCES produto(idProduto)
)");

// Tabela de transações
$conexao->query("CREATE TABLE IF NOT EXISTS transacoes (
    idTransacao INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    total DECIMAL(10, 2),
    data DATE,
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
)");

// Tabela de produtos das transações
$conexao->query("CREATE TABLE IF NOT EXISTS transacoes_produtos (
    idTransacaoProduto INT AUTO_INCREMENT PRIMARY KEY,
    idTransacao INT,
    idProduto INT,
    quantidade INT,
    preco DECIMAL(10, 2),
    FOREIGN KEY (idTransacao) REFERENCES transacoes(idTransacao),
    FOREIGN KEY (idProduto) REFERENCES produto(idProduto)
)");

// Tabela de pedidos
$conexao->query("CREATE TABLE IF NOT EXISTS pedidos (
    idPedido INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    metodoPagamento VARCHAR(50) NOT NULL,
    valorTotal DECIMAL(10, 2) NOT NULL,
    dataPedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'Pendente',
    FOREIGN KEY (idUsuario) REFERENCES cadastro(id_cadastro) ON DELETE CASCADE
)");

// Verificar e criar o administrador
$emailAdmin = 'admin@rocketstore.com';
$sqlVerificarAdmin = "SELECT * FROM administrador WHERE email = '$emailAdmin'";
$resultado = $conexao->query($sqlVerificarAdmin);

if ($resultado->num_rows == 0) {
    $nomeAdmin = 'Administrador';
    $senhaAdmin = 'admin@rocketstore.com'; // Utilize uma senha mais segura aqui

    $sqlInserirAdmin = "INSERT INTO administrador (nome, email, senha) 
                        VALUES ('$nomeAdmin', '$emailAdmin', '$senhaAdmin')";

    if ($conexao->query($sqlInserirAdmin) === TRUE) {
    } else {
    }
}
?>