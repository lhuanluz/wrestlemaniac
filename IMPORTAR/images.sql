-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Ago-2017 às 08:00
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(62) NOT NULL,
  `img_url` varchar(132) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id`, `name`, `img_url`) VALUES
(1, 'André The Giant', 'storage/users/andre-the-giant.png'),
(2, 'Bret Hart', 'storage/users/bret-hart.png'),
(3, 'Bruno Sammartino', 'storage/users/bruno-sammartino.png'),
(4, 'CM Punk', 'storage/users/cm-punk.png'),
(5, 'Dusty Rhodes', 'storage/users/dusty-rhodes.png'),
(6, 'Eddie Guerrero', 'storage/users/eddie-guerrero.png'),
(7, 'Gobbeldy Gooker', 'storage/users/gobbeldy-gooker.png'),
(8, 'Triple H', 'storage/users/hhh.png'),
(9, 'Hulk Hogan', 'storage/users/hulk-hogan.png'),
(10, 'Mick Foley', 'storage/users/mick-foley.png'),
(11, 'Papa Shango', 'storage/users/papa-shango.png'),
(12, 'Randy Savage', 'storage/users/randy-savage.png'),
(13, 'Razor Ramon', 'storage/users/razor-ramon.png'),
(14, 'Ric Flair', 'storage/users/ric-flair.png'),
(15, 'Shawn Michaels', 'storage/users/shawn-michaels.png'),
(16, 'Stone Cold', 'storage/users/stone-cold.png'),
(17, 'The Rock', 'storage/users/the-rock.png'),
(18, 'Wade Barrett', 'storage/users/wade-barrett.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
