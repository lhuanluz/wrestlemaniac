-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2017 às 17:09
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wrestlemaniac`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `league_belts`
--

CREATE TABLE `league_belts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_league` int(10) UNSIGNED DEFAULT NULL,
  `belt_name` varchar(150) NOT NULL,
  `days` int(11) NOT NULL,
  `belt_photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `league_belts`
--

INSERT INTO `league_belts` (`id`, `id_league`, `belt_name`, `days`, `belt_photo`) VALUES
(1, 1, 'Wrestlemaniac League Champions', 1, 'storage/belts/league.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `league_belts`
--
ALTER TABLE `league_belts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_league` (`id_league`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `league_belts`
--
ALTER TABLE `league_belts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `league_belts`
--
ALTER TABLE `league_belts`
  ADD CONSTRAINT `league_belts_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
