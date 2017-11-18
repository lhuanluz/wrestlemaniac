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
-- Estrutura da tabela `league_belts_history`
--

CREATE TABLE `league_belts_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_league` int(10) UNSIGNED NOT NULL,
  `id_belt` int(10) UNSIGNED NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `league_belts_history`
--
ALTER TABLE `league_belts_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_league` (`id_league`),
  ADD KEY `id_belt` (`id_belt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `league_belts_history`
--
ALTER TABLE `league_belts_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `league_belts_history`
--
ALTER TABLE `league_belts_history`
  ADD CONSTRAINT `league_belts_history_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `league_belts_history_ibfk_2` FOREIGN KEY (`id_belt`) REFERENCES `league_belts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
