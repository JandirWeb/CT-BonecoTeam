-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 11:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adm_ctboneco`
--

-- --------------------------------------------------------

--
-- Table structure for table `dot_aluno`
--

CREATE TABLE `dot_aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `rg` varchar(100) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `end` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `muay_thai` text,
  `bjj` text,
  `horario` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'ativo',
  `data_venc` text,
  `thumb` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_MT` text,
  `valor_Bjj` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_aluno`
--

INSERT INTO `dot_aluno` (`id`, `nome`, `rg`, `data_nasc`, `end`, `fone`, `mail`, `data_cad`, `muay_thai`, `bjj`, `horario`, `status`, `data_venc`, `thumb`, `valor_MT`, `valor_Bjj`) VALUES
(96, 'Erica Santos Oliveira', '32292252', '1992-08-24', 'Rua Mirom de Oliveira Ribeiro,314. Santo Antonio', '79991020673', 'esoliveira1992@gmail.com', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', '2d992fb1804a6f7074089cf0360f3aa9.jpg', '70', ''),
(95, 'Carine Santos Pinto', '32381085', '1988-03-20', 'Rua Anisio Sousa n08 B. 18 do Forte', '79991534708', 'carinesp@live.com', '2018-02-10', 'sim', '', '17:00hr,', 'ativo', '10', '86789fd335e364602c228c5d968eb8ad.jpg', '70', ''),
(94, 'Arthur Machado Rocha', '30422340', '1984-04-21', 'Rua Evangelista dos Santos,Ipes 118', '079999792086', '', '2018-02-10', 'sim', 'sim', '18:30hr,19:30hr,', 'ativo', '10', '897628a1aef87546039207a0711b5b3c.jpg', '60', '60'),
(93, 'Luiz Antonio dos Santos', '744977', '1968-08-26', 'Rua Carlos Menezes 235', '79981364809', '', '2018-02-10', 'sim', '', '16:00hr,', 'ativo', '10', '', '70', ''),
(92, 'Patricia dos Santos', '1267558', '1977-06-23', 'Rua das Rosas,320', '79996872575', '', '2018-02-10', 'sim', '', '17:00hr,', 'ativo', '10', '', '70', ''),
(84, 'David Melo de Oliveira', '41138279', '1992-08-31', 'Rua E, Soledade', '082988997084', '', '2018-02-10', 'sim', 'sim', '16:00hr,', 'ativo', '10', '8b6ff41ebcc65015d5179c786648053f.jpg', '35', ''),
(85, 'Ane Caroline Barreto Santa Rosa', '05882574510', '1994-09-08', 'Rua 4, n33, Conjunto Fernando Color', '79991998832', 'anecaroline.barreto@hotmail.com', '2018-02-10', 'sim', '', '18:30hr,', 'inativo', '10', '04fe1e996e7f1b763ecf59a818175cf5.jpg', '70', ''),
(86, 'Edwilson Santos Aragão Junior', '32943415', '1989-06-16', 'Rua: general padro, 1511, Cidade Nova', '79991465574', 'edw_santos@hotmail.com', '2018-02-10', 'sim', '', '16:00hr,', 'ativo', '10', '3976c0d53b2bd0424314203ad6bb0031.jpg', '70', ''),
(87, 'Josué galileu Santos Costa', '32751092', '1989-04-11', 'Rua C, N288 Lot. São Sebastião, Sto Antonio', '79999489330', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '20', '', '70', ''),
(88, 'Bruno dos Santos', '13300299', '1980-08-20', 'Rua Cabo Jordino, 228', '079988098924', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', '', '60', ''),
(89, 'Genivaldo de Souza Santos', '1010970', '1972-07-23', 'Rua Efren Fernanto Fontes N-41', '79988299670', '', '2018-02-10', 'sim', '', '10:00hr,', 'ativo', '10', '', '70', ''),
(90, 'Lucas Santos de Melo', '418334067', '1987-06-18', 'Av. Alvaro Maciel N232, Palestina Aju.', '079998083217', '', '2018-02-10', 'sim', '', '20:30hr', 'ativo', '10', '', '70', ''),
(91, 'Andreia Lira', '34530711', '1990-09-04', 'Rua Alto da Tv,130. Cidade Nova', '79996364943', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', 'd8076cc3bbbd000132065811423897a1.jpg', '70', ''),
(97, 'Barbara Gabriela Nascimento', '38511630', '2002-12-21', 'Rua C, 101 Alto da Tv Sergipe', '79988754693', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', 'e2671cde9befc891554b6455d9acd1c5.jpg', '70', ''),
(98, 'Wellington dos Santos Nascimento', '30067545', '2006-03-10', 'Rua 2 Lamarão', '79998533476', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', '', '70', ''),
(99, 'Woshington Pereira Silva', '911938', '1970-09-08', 'Conjunto Fernando Collor', '79998419752', '', '2018-02-10', 'sim', '', '16:00hr,', 'ativo', '10', '', '70', ''),
(107, 'Samir Soares ', '1147281', '1979-03-08', 'Rua 6, 26', '7998261204', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', 'f8d9f794cf094058142b2a8dcb95a4f0.jpg', '70', ''),
(101, 'Evaldo Cruz Mohamed', '9791033', '1978-08-06', 'Marquês sobral', '079991145494', '', '2018-02-10', 'sim', '', '17:00hr,', 'ativo', '10', 'a3d5bebc8e67283bb5004a15d1b9f55a.jpg', '70', ''),
(102, 'Josian Souza', '807341', '1973-05-21', 'Rua São Vicente n27', '79988275574', '', '2018-02-10', 'sim', '', '08:00hr,', 'ativo', '10', 'd1b95c10825afcdc49e5f8f8727abdb8.jpg', '60', ''),
(103, 'Carlos Brenno de Jesus', '38841843', '2003-10-10', 'Rua 10,410-Cidade Nova', '79988698570', '', '2018-02-10', 'sim', '', '18:30hr,', 'ativo', '10', '858693290f6a719ac27696fb212eed25.jpg', '60', ''),
(104, 'Maria Leticia Santos Azevedo', '25332198', '1994-01-19', 'Travessa 5, Cidade Nova', '79996117174', '', '2018-02-10', 'sim', '', '20:30hr', 'ativo', '10', 'c398ac3ffa55465c3fd31d3830207d14.jpg', '70', ''),
(105, 'Renée Jean Ramos Souza', '859016', '1970-12-28', 'Travessa Particular,11', '79996110836', '', '2018-02-10', '', 'sim', '15:00hr,', 'ativo', '10', '', '', '70'),
(106, 'Marcos Henrique Junior', '32549148', '1993-09-03', 'Rua Claudio Batista,295', '079998728594', '', '2018-02-10', 'sim', '', '17:00hr,', 'ativo', '10', 'a9ab9570c048684fa13fcace8dcc1fcd.jpg', '70', ''),
(108, 'Michel Sigmaranga Rezende', '34486992', '2003-07-29', 'Rua C, Bairro Japaozinho', '79996839396', '', '2018-02-15', '', 'sim', '19:30hr,', 'ativo', '20', '', '', '70'),
(109, 'Erinaldo Hilário dos Santos Junior', '13722373', '1982-03-13', 'Av. A, 211', '79999826760', '', '2018-02-15', '', 'sim', '19:30hr,', 'ativo', '10', '', '', '70');

-- --------------------------------------------------------

--
-- Table structure for table `dot_fatura`
--

CREATE TABLE `dot_fatura` (
  `id` int(11) NOT NULL,
  `nome_ft` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mes` date DEFAULT NULL,
  `venc_ft` int(50) DEFAULT NULL,
  `valor_ft` int(100) DEFAULT NULL,
  `referente` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario_ft` text,
  `status_ft` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'aberto',
  `data_pagamento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_fatura`
--

INSERT INTO `dot_fatura` (`id`, `nome_ft`, `mes`, `venc_ft`, `valor_ft`, `referente`, `horario_ft`, `status_ft`, `data_pagamento`) VALUES
(306, 'Marcos Henrique Junior', '2018-02-22', 10, 70, 'Muay Thai', '17:00hr', 'pago', '2018-02-24'),
(307, 'Michel Sigmaranga Rezende', '2018-02-22', 20, 70, 'Jiu-Jitsu', '19:30hr', 'pago', '2018-02-24'),
(308, 'Erinaldo Hilário dos Santos Junior', '2018-02-22', 10, 70, 'Jiu-Jitsu', '19:30hr', 'pago', '2018-02-24'),
(305, 'Renée Jean Ramos Souza', '2018-02-22', 10, 70, 'Jiu-Jitsu', '15:00hr', 'pago', '2018-02-24'),
(304, 'Maria Leticia Santos Azevedo', '2018-02-22', 10, 70, 'Muay Thai', '20:30hr', 'pago', '2018-02-24'),
(303, 'Carlos Brenno de Jesus', '2018-02-22', 10, 60, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(302, 'Josian Souza', '2018-02-22', 10, 60, 'Muay Thai', '08:00hr', 'pago', '2018-02-24'),
(301, 'Evaldo Cruz Mohamed', '2018-02-22', 10, 70, 'Muay Thai', '17:00hr', 'pago', '2018-02-24'),
(299, 'Woshington Pereira Silva', '2018-02-22', 10, 70, 'Muay Thai', '16:00hr', 'pago', '2018-02-24'),
(300, 'Samir Soares ', '2018-02-22', 10, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(298, 'Wellington dos Santos Nascimento', '2018-02-22', 10, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(295, 'Lucas Santos de Melo', '2018-02-22', 10, 70, 'Muay Thai', '20:30hr', 'pago', '2018-02-24'),
(296, 'Andreia Lira', '2018-02-22', 10, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(297, 'Barbara Gabriela Nascimento', '2018-02-22', 10, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(292, 'Josué galileu Santos Costa', '2018-02-22', 20, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(293, 'Bruno dos Santos', '2018-02-22', 10, 60, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(294, 'Genivaldo de Souza Santos', '2018-02-22', 10, 70, 'Muay Thai', '10:00hr', 'pago', '2018-02-24'),
(291, 'Edwilson Santos Aragão Junior', '2018-02-22', 10, 70, 'Muay Thai', '16:00hr', 'pago', '2018-02-24'),
(290, 'David Melo de Oliveira', '2018-02-22', 10, 35, 'Muay Thai', '16:00hr', 'pago', '2018-02-24'),
(289, 'Patricia dos Santos', '2018-02-22', 10, 70, 'Muay Thai', '17:00hr', 'pago', '2018-02-24'),
(288, 'Luiz Antonio dos Santos', '2018-02-22', 10, 70, 'Muay Thai', '16:00hr', 'pago', '2018-02-24'),
(287, 'Arthur Machado Rocha', '2018-02-22', 10, 60, 'Jiu-Jitsu', '19:30hr', 'pago', '2018-02-24'),
(345, 'Lucas Santos de Melo', '2018-03-10', 10, 70, 'Muay Thai', '20:30hr', 'pago', '2018-03-17'),
(285, 'Carine Santos Pinto', '2018-02-22', 10, 70, 'Muay Thai', '17:00hr', 'pago', '2018-02-24'),
(284, 'Erica Santos Oliveira', '2018-02-22', 10, 70, 'Muay Thai', '18:30hr', 'pago', '2018-02-24'),
(344, 'Genivaldo de Souza Santos', '2018-03-10', 10, 70, 'Muay Thai', '10:00hr', 'pago', '2018-03-17'),
(343, 'Bruno dos Santos', '2018-03-10', 10, 60, 'Muay Thai', '18:30hr', 'aberto', NULL),
(342, 'Josué galileu Santos Costa', '2018-03-20', 20, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(341, 'Edwilson Santos Aragão Junior', '2018-03-10', 10, 70, 'Muay Thai', '16:00hr', 'aberto', NULL),
(340, 'David Melo de Oliveira', '2018-03-10', 10, 35, 'Muay Thai', '16:00hr', 'aberto', NULL),
(339, 'Patricia dos Santos', '2018-03-10', 10, 70, 'Muay Thai', '17:00hr', 'aberto', NULL),
(338, 'Luiz Antonio dos Santos', '2018-03-10', 10, 70, 'Muay Thai', '16:00hr', 'aberto', NULL),
(337, 'Arthur Machado Rocha', '2018-03-10', 10, 60, 'Jiu-Jitsu', '19:30hr', 'pago', '2018-03-17'),
(336, 'Arthur Machado Rocha', '2018-03-10', 10, 60, 'Muay Thai', '18:30hr', 'aberto', NULL),
(335, 'Carine Santos Pinto', '2018-03-10', 10, 70, 'Muay Thai', '17:00hr', 'aberto', NULL),
(334, 'Erica Santos Oliveira', '2018-03-10', 10, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(346, 'Andreia Lira', '2018-03-10', 10, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(347, 'Barbara Gabriela Nascimento', '2018-03-10', 10, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(348, 'Wellington dos Santos Nascimento', '2018-03-10', 10, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(349, 'Woshington Pereira Silva', '2018-03-10', 10, 70, 'Muay Thai', '16:00hr', 'aberto', NULL),
(350, 'Samir Soares ', '2018-03-10', 10, 70, 'Muay Thai', '18:30hr', 'aberto', NULL),
(351, 'Evaldo Cruz Mohamed', '2018-03-10', 10, 70, 'Muay Thai', '17:00hr', 'aberto', NULL),
(352, 'Josian Souza', '2018-03-10', 10, 60, 'Muay Thai', '08:00hr', 'aberto', NULL),
(353, 'Carlos Brenno de Jesus', '2018-03-10', 10, 60, 'Muay Thai', '18:30hr', 'aberto', NULL),
(354, 'Maria Leticia Santos Azevedo', '2018-03-10', 10, 70, 'Muay Thai', '20:30hr', 'aberto', NULL),
(355, 'Renée Jean Ramos Souza', '2018-03-10', 10, 70, 'Jiu-Jitsu', '15:00hr', 'aberto', NULL),
(356, 'Marcos Henrique Junior', '2018-03-10', 10, 70, 'Muay Thai', '17:00hr', 'aberto', NULL),
(357, 'Michel Sigmaranga Rezende', '2018-03-20', 20, 70, 'Jiu-Jitsu', '19:30hr', 'aberto', NULL),
(358, 'Erinaldo Hilário dos Santos Junior', '2018-03-10', 10, 70, 'Jiu-Jitsu', '19:30hr', 'aberto', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dot_historico_pag`
--

CREATE TABLE `dot_historico_pag` (
  `id` int(11) NOT NULL,
  `data_liquid` date DEFAULT NULL,
  `total_liquid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CT_liquid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bjj_liquid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pitito_liquid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `boica_liquid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dot_users`
--

CREATE TABLE `dot_users` (
  `id` int(11) NOT NULL,
  `usuario` text,
  `senha` text,
  `nivel` text,
  `nome` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_users`
--

INSERT INTO `dot_users` (`id`, `usuario`, `senha`, `nivel`, `nome`, `email`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'Jandir Moreira', 'jandirweb@gmail.com'),
(2, 'susy', 'baca77a2bf6b1c0838f2e14bce9b1cec54793d91', NULL, 'Susyane Garcia', 'susy.dot@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dot_aluno`
--
ALTER TABLE `dot_aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dot_fatura`
--
ALTER TABLE `dot_fatura`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dot_historico_pag`
--
ALTER TABLE `dot_historico_pag`
  ADD UNIQUE KEY `idLiquid` (`id`);

--
-- Indexes for table `dot_users`
--
ALTER TABLE `dot_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dot_aluno`
--
ALTER TABLE `dot_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `dot_fatura`
--
ALTER TABLE `dot_fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;
--
-- AUTO_INCREMENT for table `dot_historico_pag`
--
ALTER TABLE `dot_historico_pag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dot_users`
--
ALTER TABLE `dot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
