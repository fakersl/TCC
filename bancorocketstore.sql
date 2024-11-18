SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `bancorocketstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bancorocketstore`;

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `administrador` (`id_administrador`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin@rocketstore.com', 'admin@rocketstore.com');

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cadastro` (`id_cadastro`, `nome`, `email`, `cpf`, `cep`, `cidade`, `bairro`, `endereco`, `numero`, `senha`) VALUES
(1, 'testecadastro', 'testecadastro@email.com', '111.111.111-11', '11111-111', 'teste', 'teste', 'teste', '11', '$2y$10$v2hk1ciB1AYqv9Ikb./D4uDc6R8S2tpla5C3pbjCJ8EtjbSj1f5lm'),
(2, 'teste', 'teste@teste.com', '111.111.111-11', '11111-111', 'teste', 'teste', 'teste', 'teste', '$2y$10$F1xyf15wFtvPlMAFxvBTGeSAz6xt2d3Spiyc./7mkpN.ScFemG/EO');

DROP TABLE IF EXISTS `colecoes`;
CREATE TABLE IF NOT EXISTS `colecoes` (
  `idColecao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeColecao` varchar(255) NOT NULL,
  `descricaoColecao` text NOT NULL,
  PRIMARY KEY (`idColecao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `colecoes` (`idColecao`, `nomeColecao`, `descricaoColecao`) VALUES
(1, 'Coleção 1', 'coleção 1'),
(2, 'Coleção 2', 'coleção 2'),
(3, 'Coleção 3', 'coleção 3');

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(150) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cep` char(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numeroCasa` varchar(10) NOT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `endereco` (`idEndereco`, `rua`, `cidade`, `estado`, `cep`, `bairro`, `numeroCasa`) VALUES
(1, 'Fornecedor1End', '', '', '', '', ''),
(2, 'Fornecedor2End', '', '', '', '', ''),
(3, 'Fornecedor3End', '', '', '', '', '');

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `idFavorito` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFavorito`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idProduto` (`idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFornecedor` varchar(200) NOT NULL,
  `emailFornecedor` varchar(200) NOT NULL,
  `produtoFornecedor` varchar(200) NOT NULL,
  `telefoneFornecedor` varchar(200) NOT NULL,
  `fkIdEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idFornecedor`),
  KEY `fkIdEndereco` (`fkIdEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `fornecedor` (`idFornecedor`, `nomeFornecedor`, `emailFornecedor`, `produtoFornecedor`, `telefoneFornecedor`, `fkIdEndereco`) VALUES
(1, 'Fornecedor1', 'fornecedor1@fornecedor.com', 'Calças', '(11) 11111-1111', 1),
(2, 'Fornecedor2', 'fornecedor2@fornecedor.com', 'Moletom', '(22) 22222-2222', 2),
(3, 'Fornecedor3', 'fornecedor3@fornecedor.com', 'Tênis', '(33) 33333-3333', 3);

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `metodoPagamento` varchar(50) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  `dataPedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Pendente',
  PRIMARY KEY (`idPedido`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `nome`, `email`, `cidade`, `telefone`, `metodoPagamento`, `valorTotal`, `dataPedido`, `status`) VALUES
(1, 1, 'testecadastro', 'testecadastro@email.com', 'teste', '', 'debito', 1598.00, '2024-11-18 01:15:11', 'Pendente'),
(2, 1, 'testecadastro', 'testecadastro@email.com', 'teste', '', 'boleto', 11985.00, '2024-11-18 01:15:38', 'Pendente'),
(3, 1, 'testecadastro', 'testecadastro@email.com', 'teste', '', 'boleto', 1598.00, '2024-11-18 03:56:38', 'Pendente'),
(4, 1, 'testecadastro', 'testecadastro@email.com', 'teste', '', 'cartao', 2895.40, '2024-11-18 04:29:31', 'Pendente');

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(100) NOT NULL,
  `marcaProduto` varchar(100) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL,
  `categoriaProduto` varchar(100) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `sexoProduto` varchar(200) NOT NULL,
  `imagemProduto` mediumblob DEFAULT NULL,
  `fkIdFornecedor` int(11) NOT NULL,
  `fkIdColecao` int(11) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `fkIdFornecedor` (`fkIdFornecedor`),
  KEY `fkIdColecao` (`fkIdColecao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `marcaProduto`, `precoProduto`, `categoriaProduto`, `descricaoProduto`, `sexoProduto`, `imagemProduto`, `fkIdFornecedor`, `fkIdColecao`) VALUES
(1, 'Adidas Campus Allblack', 'Adidas', 799.00, 'Tenis', '', 'masculino', 0x54656e69735f43616d7075735f3030735f507265746f5f4946383736382e6a7067, 1, 1),
(2, 'Calça Cargo MinusTwo', 'MinusTwo', 399.90, 'Tenis', '', 'feminino', 0x426c61636b477261666620436172676f20416d6172656c612e6a7067, 1, 1),
(3, 'Moletom Gengar', 'Y2K', 637.50, '', '', 'masculino', 0x67656e6761722e6a7067, 2, 2),
(4, 'Moletom Spiderman', 'Y2K', 173.80, 'Moletom', '', 'feminino', 0x79326b2d7370696465722d7072696e742d686f6f646965732d34383434383039313532313331372e6a7067, 2, 2),
(5, 'Tênis Retro Star Flash', 'Y2K', 260.00, 'Tenis', '', 'masculino', 0x533262396665386166376335633439663562633237343734323966633830343238745f343530782e6a7067, 3, 3);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `dataNascimento` date NOT NULL,
  `fkIdEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fkIdEndereco` (`fkIdEndereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);

ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`fkIdEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE;

ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `cadastro` (`id_cadastro`) ON DELETE CASCADE;

ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`fkIdFornecedor`) REFERENCES `fornecedor` (`idFornecedor`) ON DELETE CASCADE,
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`fkIdColecao`) REFERENCES `colecoes` (`idColecao`) ON DELETE CASCADE;

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fkIdEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
