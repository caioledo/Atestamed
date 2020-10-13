-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2017 at 09:01 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atestamed`
--

-- --------------------------------------------------------

--
-- Table structure for table `atestado`
--

CREATE TABLE `atestado` (
  `id` int(11) NOT NULL,
  `datahora` varchar(32) NOT NULL,
  `periodo_inicio` varchar(32) DEFAULT NULL,
  `periodo_fim` varchar(32) DEFAULT NULL,
  `medico_id` int(11) NOT NULL,
  `pac_nome` varchar(128) NOT NULL,
  `pac_id` varchar(128) DEFAULT NULL,
  `pac_endereco` varchar(128) DEFAULT NULL,
  `pac_email` varchar(128) DEFAULT NULL,
  `pac_telefone` varchar(128) NOT NULL,
  `cid` int(11) NOT NULL,
  `observacoes` longtext NOT NULL,
  `cod_autenticacao` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atestado`
--

INSERT INTO `atestado` (`id`, `datahora`, `periodo_inicio`, `periodo_fim`, `medico_id`, `pac_nome`, `pac_id`, `pac_endereco`, `pac_email`, `pac_telefone`, `cid`, `observacoes`, `cod_autenticacao`) VALUES
(1, '2017-05-17 18:29:46', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', NULL),
(2, '2017-05-17 18:30:24', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', 'a4a480d55b16ba60d35e9cdf0c1a4cb5cbff0061'),
(3, '2017-05-17 18:32:51', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', 'f988cc157cc1be9c78d3f10ef4d6edf75a3942d8'),
(4, '2017-05-17 18:34:07', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', 'fa5b2645af1711db306a4a1df33f617db5a159b2'),
(5, '2017-05-17 18:34:37', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', '2fbc73d2cb7a6501fd8f20b910cd58996553b213'),
(6, '2017-05-17 18:35:32', NULL, NULL, 1, 'fejw', 'jewo', 'rjeiw', 'irjow', 'jieo', 0, '', '2fd9552623fb72785a692044a8cd8d89f6ff6a7d'),
(7, '2017-05-17 18:37:30', NULL, NULL, 1, 'aaaaaaa', '123', 'efefefr', 'few@fewfew.iui', '45435343', 0, '', '340e7afdb9db50b7b74233cda8845a379af8cba8'),
(8, '2017-05-17 18:39:36', NULL, NULL, 1, 'aaaaaa', '123', 'fefew', 'dfefe@htht,ryr', '765747', 0, '', '013e6727cabc63f2eede2e7069d5748c2faf681d'),
(9, '2017-05-18 15:04:04', NULL, NULL, 1, 'paciente', '34', 'krop', 'rwoep@fkoe.rrr', '389042', 0, '', '3e40e039f476d11c4f42d38e83507fef47b86059'),
(10, '2017-05-18 15:05:22', NULL, NULL, 1, 'paciente', '34', 'krop', 'rwoep@fkoe.rrr', '389042', 0, '', '94cdfb42a621f29fac7434558af3b1d05ff5d4e4'),
(11, '2017-05-18 15:09:43', NULL, NULL, 1, '', '', '', '', '', 0, '', 'd357b353375ec45766061f330412afeb2aabe0fd'),
(12, '2017-05-18 15:13:46', NULL, NULL, 1, '', '', '', '', '', 0, '', '166f7228272625861b9310200c23c9f358f10422'),
(13, '2017-05-18 15:21:48', NULL, NULL, 1, 'Paciente de teste', '', '', '', '', 0, '', '66f8c6ceedb354d03dcc430beff01ce467ca6583'),
(14, '2017-05-18 15:32:11', NULL, NULL, 1, 'teste', '', '', '', '', 0, '', 'b3c1ba1d2cd9f0e0149a17ea1bec049e520e66ac'),
(15, '2017-05-18 15:49:11', NULL, NULL, 1, 'ANDERSON SOUSA', '1234', 'vakop', 'iepop@kopew.fee', '920-9402', 0, '', '5dc973315d514f9bf04ab861705efdafeac6f370'),
(16, '2017-05-18 15:51:12', NULL, NULL, 1, 'Anderson Sousa', '21390', '', '', '', 0, '', 'dfdee9c650faf10b7bc776035cdea81c3dbaeb3c'),
(17, '0.001784828953891918', NULL, NULL, 1, 'Anderson Sousa', '92301', '', '', '', 0, '', '87d2e43b82056102e82454b04df05845b107ae4b'),
(18, '18/05/2017', '18/05/2017', '30/12/2017', 1, 'anderson sousa', '90123', '', '', '', 0, '', 'c835361b584a63ebcf5c84816e746f7ac224246c'),
(19, '18/05/2017', '18/05/2017', '30/05/2017', 1, 'Anderson Sousa', '92049', '', '', '', 0, '', 'fd8b89518dda9c7fdd552277e79b5a12706817a0');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `crm_uf` char(2) NOT NULL,
  `crm_num` int(11) NOT NULL,
  `especialidade` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`id`, `nome`, `crm_uf`, `crm_num`, `especialidade`) VALUES
(1, 'TESTE', 'PA', 1234, 'Teste');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `login` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `tipo` int(11) NOT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atestado`
--
ALTER TABLE `atestado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_id` (`medico_id`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crm_uf_num` (`crm_uf`,`crm_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atestado`
--
ALTER TABLE `atestado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atestado`
--
ALTER TABLE `atestado`
  ADD CONSTRAINT `atestado_ibfk_2` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
