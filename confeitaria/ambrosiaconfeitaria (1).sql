-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Abr-2023 às 20:05
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ambrosiaconfeitaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambrosias_produtos`
--

DROP TABLE IF EXISTS `ambrosias_produtos`;
CREATE TABLE IF NOT EXISTS `ambrosias_produtos` (
  `codProduto` int NOT NULL,
  `nomeProduto` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `precoProduto` decimal(10,0) NOT NULL,
  `pesoProduto` decimal(10,0) NOT NULL,
  `descricaoProduto` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `ambrosias_produtos`
--

INSERT INTO `ambrosias_produtos` (`codProduto`, `nomeProduto`, `precoProduto`, `pesoProduto`, `descricaoProduto`) VALUES
(0, '', '0', '0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambrosias_receitas`
--

DROP TABLE IF EXISTS `ambrosias_receitas`;
CREATE TABLE IF NOT EXISTS `ambrosias_receitas` (
  `codigo` int NOT NULL,
  `nome_receita` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ingredientes` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `preparo` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `comentarios` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `ambrosias_receitas`
--

INSERT INTO `ambrosias_receitas` (`codigo`, `nome_receita`, `ingredientes`, `preparo`, `comentarios`) VALUES
(1, 'brigadeiro', 'chocolate 50 por cento\r\nleite condensado\r\ncreme de leite\r\ngranulado\r\nforminhas de papel', 'Adicione o leite condensdo, o creme de leite e o chocolate na panela, mexa até desgrudar. \r\nReserve.\r\nApós esfriar, separe 35g do brigadeiro, o enrole e passe no granulado. Coloque-o na forma e está pronto!\r\n', 'campeão de vendas!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
