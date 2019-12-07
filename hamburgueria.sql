-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 07-Dez-2019 às 02:34
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hamburgueria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `preco` int(11) DEFAULT NULL,
  `dispon` varchar(45) DEFAULT NULL,
  `imgurl` varchar(45) DEFAULT NULL,
  `descricao` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `nome`, `preco`, `dispon`, `imgurl`, `descricao`) VALUES
(1, 'Hambúguer', 33, 'sim', 'hamburguer.png', 'Um hamburguer, queijo, alface, molho especial, cebola e pão com gergelim.'),
(2, 'Fritas', 15, 'sim', 'fritas.png', 'Fritas texanas quentinhas com sal.'),
(3, 'Yakisoba', 25, 'nao', 'exemplo3', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemspedidos`
--

DROP TABLE IF EXISTS `itemspedidos`;
CREATE TABLE IF NOT EXISTS `itemspedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `pedidoid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidoid_idx` (`pedidoid`),
  KEY `itemid_idx` (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `itemspedidos`
--

INSERT INTO `itemspedidos` (`id`, `quantidade`, `pedidoid`, `itemid`) VALUES
(20, 2, 28, 1),
(19, 5, 27, 2),
(18, 2, 27, 1),
(17, 1, 26, 2),
(16, 1, 26, 1),
(15, 1, 25, 1),
(14, 2, 22, 2),
(13, 1, 22, 1),
(12, 1, 21, 1),
(11, 1, 20, 1),
(21, 1, 28, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(45) DEFAULT NULL,
  `horario` datetime DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `observacao` mediumtext,
  `formapagamento` varchar(45) DEFAULT NULL,
  `formaentrega` varchar(45) DEFAULT NULL,
  `cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `telefone`, `horario`, `endereco`, `status`, `observacao`, `formapagamento`, `formaentrega`, `cliente`) VALUES
(25, '999', '2019-12-06 15:52:00', 'Rua', 'saiu', 'obs', 'Cartao', 'Entrega', ''),
(23, '27981232323', '2019-12-05 20:54:00', 'Rua Tupa', 'pedido', 'Sem Picles', 'Dinheiro', 'Busca', ''),
(22, '27981232323', '2019-12-05 20:54:00', 'Rua Tupa', 'pedido', 'Sem Picles', 'Dinheiro', 'Busca', ''),
(21, '27981232323', '2019-12-05 20:53:00', 'Rua Tupa', 'pedido', 'Sem Picles', 'Dinheiro', 'Busca', ''),
(20, '27981232323', '2019-12-05 20:51:00', 'Rua Tupa', 'pedido', 'Sem Picles', 'Dinheiro', 'Busca', ''),
(26, '27999', '2019-12-06 16:13:00', 'Rua Externa', 'pedido', 'obs2', 'Dinheiro', 'Entrega', 'Leonardo'),
(27, '27777', '2019-12-06 17:15:00', 'Rua Aqui', 'pedido', 'Sem', 'Dinheiro', 'Entrega', 'Carla'),
(28, '999', '2019-12-06 18:22:00', 'Rua eee', 'pedido', '', 'Cartao', 'Entrega', 'Carla');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`, `tipo`) VALUES
(5, 'user', 'user', 'gerente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
