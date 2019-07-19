-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2019 às 00:27
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova 1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `inseriravaliacao` (`vid` INT, `vdata` DATE, `vpeso` FLOAT, `valtura` FLOAT, `vimc` FLOAT, `vavaliador` INT, `vpessoa_id` INT, `vclassificacao_id` INT)  BEGIN
	insert into empresa    
VALUES (
vid, vdata, vpeso, valtura, vimc, vavaliador, vpessoa_id, vclassificacao_id
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirclassificacao` (`vid` INT, `vdescricao` VARCHAR(50))  BEGIN
	insert into empresa    
VALUES (
vid, vdescricao
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirempresa` (`vid` INT, `vfantasia` VARCHAR(100), `vrazaoSocial` VARCHAR(100), `vcnpj` VARCHAR(20))  BEGIN
	insert into empresa    
VALUES (
vid, vfantasia, vrazaoSocial, vcnpj
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inserirpessoa` (`vid` INT, `vnome` VARCHAR(100), `vsexo` CHAR(1), `vdataNascimento` DATE, `vusuario` VARCHAR(45), `vsenha` DOUBLE, `vtipo` CHAR(1), `vfoto` VARCHAR(100), `vempresa_id` INT)  BEGIN
	insert into cliente    
VALUES (
vid, vnome , vsexo , vdataNascimento , vusuario , vsenha , vtipo , vfoto , vempresa_id
);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `imc` decimal(10,1) NOT NULL,
  `avaliador` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `data`, `peso`, `altura`, `imc`, `avaliador`, `pessoa_id`) VALUES
(28, '2019-06-23 05:06:45', 80, 1.9, '22.2', 2, 2),
(31, '2019-06-25 00:12:36', 1, 1.8, '1.0', 2, 3),
(32, '2019-06-23 07:43:45', 444, 4.44, '22.5', 3, 2),
(33, '2019-06-23 07:48:45', 1, 1.11, '0.8', 3, 2),
(35, '2019-06-23 15:58:32', 100, 1.11, '81.2', 3, 2),
(36, '2019-06-24 23:10:51', 100, 1.8, '30.9', 2, 2),
(37, '2019-06-24 23:14:58', 55, 1.11, '44.6', 3, 17),
(38, '2019-06-25 00:32:47', 80, 1.11, '64.9', 2, 2),
(39, '2019-06-25 00:45:21', 80, 1.11, '64.9', 3, 3),
(40, '2019-06-25 01:11:16', 80, 1.11, '64.9', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nomeFantasia` varchar(100) NOT NULL,
  `razao` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nomeFantasia`, `razao`, `cnpj`) VALUES
(1, 'academia Real', 'real life', '64.766.839/0001-18'),
(2, 'erwew', 'e', 'rr'),
(3, 'academia Real 1', 'real life', '64.766.839/0001-18'),
(4, 'academia principal 1', 'principal', '64.766.839/0001-18'),
(5, 'clinica geral', 'geral', '64.766.839/0001-18'),
(106, 'r', 'ee', '23.333.333/3333-33'),
(107, '6', '6', '66.666.666/6666-66'),
(108, 'e', 'w', '22.222.222/2222-22'),
(109, 'w', 'w', '33.333.333/3333-33'),
(110, 'w', 'w', '22.222.222/2222-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `datanascimento` date NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(65) NOT NULL,
  `tipo` char(1) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `sexo`, `datanascimento`, `login`, `senha`, `tipo`, `foto`, `empresa_id`) VALUES
(2, 'renan', 'm', '1997-12-29', 'renan', '$2y$10$QQbruvY/0e4G6Lo7a34B0.h9mRi1SnRLKoRjcKzmtV1pKhHOV1oYq', 'c', '1', 1),
(3, 'fabiane', 'f', '1997-12-29', 'renanf', '$2y$10$QQbruvY/0e4G6Lo7a34B0.h9mRi1SnRLKoRjcKzmtV1pKhHOV1oYq', 'f', NULL, 2),
(4, 'renan', 'm', '1997-12-29', 'marcos', '1234', 'f', NULL, 3),
(6, 'renan', 'm', '0000-00-00', 'renantop', '$2y$10$QQbruvY/0e4G6Lo7a34B0.h9mRi1SnRLKoRjcKzmtV1pKhHOV1oYq', 'f', 'Prova.jpg', 1),
(7, 'renan', 'm', '0000-00-00', '11', '$2y$10$ybyixGYLHL5GGhFOUGZRceMzvKWrk9iFA7hgfwdTH9TpTqcQ2KdTy', 'f', '1561312356', 1),
(11, 'renan', 'm', '0000-00-00', '1', '$2y$10$A7Is7Z/om.BQmVwZ9.GEBeDT0rGont3/wP9U8BC95LI9g2KnjH4xm', 'f', '1561313864', 1),
(17, '1', 'm', '1111-11-11', '1', '$2y$10$ZF9Pkeqe2qLOBKMgwBrdleIiRTXvFOS4gRoe4XES5ntcxmsry./6i', 'f', '1561417940', 4),
(18, '1', 'm', '1111-11-11', '1', '$2y$10$H3uMXOu.YLqXDpUl9T3SGeNy3MebQzvIAwn95AL0LA7f9D4YQA5O6', 'f', '1561418039', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_id` (`pessoa_id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
