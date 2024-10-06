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

// Criar tabelas
$conexao->query("CREATE TABLE IF NOT EXISTS usuario (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    genero VARCHAR(20),
    cpf VARCHAR(20) NOT NULL,
    dataNascimento DATE NOT NULL,
    fkIdEndereco INT NOT NULL,
    FOREIGN KEY (fkIdEndereco) REFERENCES endereco(idEndereco)
)");

$conexao->query("CREATE TABLE IF NOT EXISTS endereco (
    idEndereco INT PRIMARY KEY AUTO_INCREMENT,
    rua VARCHAR(150) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(10) NOT NULL,
    cep CHAR(10) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    numeroCasa VARCHAR(10) NOT NULL
)");

$conexao->query("CREATE TABLE IF NOT EXISTS fornecedor (
    idFornecedor INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    fkIdEndereco INT NOT NULL,
    FOREIGN KEY (fkIdEndereco) REFERENCES endereco(idEndereco)
)");

$conexao->query("CREATE TABLE IF NOT EXISTS cadastro (
    id_cadastro INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
)");

$conexao->query("CREATE TABLE IF NOT EXISTS carrinho (
    idCarrinho INT PRIMARY KEY AUTO_INCREMENT,
    fkIdProduto INT NOT NULL,
    fkIdCadastro INT NOT NULL,
    dataCompra DATE NOT NULL,
    statusPagamento VARCHAR(50),
    tipoPagamento VARCHAR(50) NOT NULL,
    FOREIGN KEY (fkIdProduto) REFERENCES produto(idProduto),
    FOREIGN KEY (fkIdCadastro) REFERENCES cadastro(idCadastro)
)");

$conexao->query("CREATE TABLE IF NOT EXISTS produto (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    marcaProduto INT NOT NULL,
    precoProduto DECIMAL(10, 2) NOT NULL,
    categoriaProduto VARCHAR(100) NOT NULL,
    descricaoProduto VARCHAR(100) NOT NULL,
    fkIdFornecedor INT NOT NULL,
    FOREIGN KEY (fkIdFornecedor) REFERENCES fornecedor(idFornecedor)
)");

$emailAdmin = 'admin@rocketstore.com';
$sqlVerificarAdmin = "SELECT * FROM cadastro WHERE email = '$emailAdmin'";
$resultado = $conexao->query($sqlVerificarAdmin);

if ($resultado->num_rows == 0) {
    $nomeAdmin = 'Administrador';
    $senhaAdmin = 'admin@rocketstore.com';

    $sqlInserirAdmin = "INSERT INTO cadastro (nome, email, senha) 
                        VALUES ('$nomeAdmin', '$emailAdmin', '$senhaAdmin')";

    if ($conexao->query($sqlInserirAdmin) === TRUE) {
    } else {
    }
}

?>