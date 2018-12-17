-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20-Nov-2018 às 12:35
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_deslice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `des_admin`
--

CREATE TABLE `des_admin` (
  `des_id` int(11) NOT NULL,
  `des_nome_completo` varchar(200) NOT NULL,
  `des_login` varchar(30) NOT NULL,
  `des_senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `des_admin`
--

INSERT INTO `des_admin` (`des_id`, `des_nome_completo`, `des_login`, `des_senha`) VALUES
(1, 'Administrador', 'admin', '9f99c5904f90fb19aae187e799157d17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `des_noticia`
--

CREATE TABLE `des_noticia` (
  `des_id` int(11) NOT NULL,
  `des_titulo` varchar(200) NOT NULL,
  `des_descricao` varchar(200) NOT NULL,
  `des_conteudo` varchar(10000) NOT NULL,
  `des_descimg` varchar(200) NOT NULL,
  `des_imagem` varchar(200) DEFAULT NULL,
  `des_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `des_admin`
--
ALTER TABLE `des_admin`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `des_noticia`
--
ALTER TABLE `des_noticia`
  ADD PRIMARY KEY (`des_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `des_admin`
--
ALTER TABLE `des_admin`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `des_noticia`
--
ALTER TABLE `des_noticia`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
