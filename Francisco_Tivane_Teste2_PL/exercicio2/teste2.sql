-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Maio-2023 às 21:00
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `autor` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL,
  `data_publicacao` date NOT NULL,
  `data_actualizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`id`, `titulo`, `texto`, `autor`, `categoria`, `data_publicacao`, `data_actualizacao`) VALUES
(1, 'O que e PHP', 'PHP e uma linguagem de programacao', 'Gerson', 1, '2023-05-09', '2023-05-11'),
(2, 'o que e CSS?', 'CSS e uma linguagem de estilos', 'gerson', 2, '2023-05-15', '2023-05-16'),
(3, 'O que e UJC?', 'UJC e uma Universidade publica', 'gerson', 3, '2023-05-09', '2023-05-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'PHP'),
(2, 'CSS'),
(3, 'UJC');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigo`
--
ALTER TABLE `artigo`
  ADD CONSTRAINT `artigo_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
