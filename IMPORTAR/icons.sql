-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2017 às 17:08
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
-- Estrutura da tabela `icons`
--

CREATE TABLE `icons` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(62) NOT NULL,
  `tier` int(10) DEFAULT '1',
  `price` double DEFAULT NULL,
  `img_url` varchar(132) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `icons`
--

INSERT INTO `icons` (`id`, `name`, `tier`, `price`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'Aiden English', 1, 25, 'storage/icons/aiden_english.png', '2017-11-12 14:42:30', '2017-11-12 14:42:30'),
(2, 'AJ Styles', 3, 75, 'storage/icons/aj_styles.png', '2017-11-12 14:42:51', '2017-11-12 14:42:51'),
(3, 'Akira Tozawa', 1, 25, 'storage/icons/akira_tozawa.png', '2017-11-12 14:43:02', '2017-11-12 14:43:02'),
(4, 'Alexa Bliss', 3, 75, 'storage/icons/alexa_bliss.png', '2017-11-12 14:43:16', '2017-11-12 14:43:16'),
(5, 'Alicia Fox', 1, 25, 'storage/icons/alicia_fox.png', '2017-11-12 14:43:25', '2017-11-12 14:43:25'),
(6, 'Andre The Giant', 4, 100, 'storage/icons/andre_the_giant.png', '2017-11-12 14:43:36', '2017-11-12 14:43:36'),
(7, 'Apollo Crews', 1, 25, 'storage/icons/apollo_crews.png', '2017-11-12 14:43:46', '2017-11-12 14:43:46'),
(8, 'Ariya Daivari', 1, 25, 'storage/icons/ariya_daivari.png', '2017-11-12 14:44:02', '2017-11-12 14:44:02'),
(9, 'Baron Corbin', 2, 50, 'storage/icons/baron_corbin.png', '2017-11-12 14:47:50', '2017-11-12 14:47:50'),
(10, 'Batista', 4, 100, 'storage/icons/batista.png', '2017-11-12 14:48:00', '2017-11-12 14:48:00'),
(11, 'Bayley', 2, 50, 'storage/icons/bayley.png', '2017-11-12 14:48:13', '2017-11-12 14:48:13'),
(12, 'Becky Lynch', 2, 50, 'storage/icons/becky_lynch.png', '2017-11-12 14:48:21', '2017-11-12 14:48:21'),
(13, 'Big E', 2, 50, 'storage/icons/big_e.png', '2017-11-12 14:48:34', '2017-11-12 14:48:34'),
(14, 'Big Show', 3, 75, 'storage/icons/big_show.png', '2017-11-12 14:48:44', '2017-11-12 14:48:44'),
(15, 'Bo Dallas', 1, 25, 'storage/icons/bo_dallas.png', '2017-11-12 14:48:53', '2017-11-12 14:48:53'),
(16, 'Bobby Roode', 1, 25, 'storage/icons/bobby_roode.png', '2017-11-12 14:49:06', '2017-11-12 14:49:06'),
(17, 'Braun Strowman', 3, 75, 'storage/icons/braun_strowman.png', '2017-11-12 14:49:15', '2017-11-12 14:49:15'),
(18, 'Bray Wyatt', 2, 50, 'storage/icons/bray_wyatt.png', '2017-11-12 14:49:25', '2017-11-12 14:49:25'),
(19, 'Bret Hart', 4, 100, 'storage/icons/bret_hart.png', '2017-11-12 14:49:37', '2017-11-12 14:49:37'),
(20, 'Brian Kendrick', 2, 50, 'storage/icons/brian_kendrick.png', '2017-11-12 14:49:47', '2017-11-12 14:49:47'),
(21, 'Brock Lesnar', 3, 75, 'storage/icons/brock_lesnar.png', '2017-11-12 14:50:00', '2017-11-12 14:50:00'),
(22, 'Carmella', 2, 50, 'storage/icons/carmella.png', '2017-11-12 14:50:09', '2017-11-12 14:50:09'),
(23, 'Cedric Alexander', 1, 25, 'storage/icons/cedric_alexander.png', '2017-11-12 14:50:17', '2017-11-12 14:50:17'),
(24, 'Cesaro', 2, 50, 'storage/icons/cesaro.png', '2017-11-12 14:50:26', '2017-11-12 14:50:26'),
(25, 'Chad Gable', 1, 25, 'storage/icons/chad_gable.png', '2017-11-12 14:50:34', '2017-11-12 14:50:34'),
(26, 'Charlotte', 3, 75, 'storage/icons/charlotte.png', '2017-11-12 14:50:48', '2017-11-12 14:50:48'),
(27, 'Christian', 4, 100, 'storage/icons/christian.png', '2017-11-12 14:50:58', '2017-11-12 14:50:58'),
(28, 'Chyna', 4, 100, 'storage/icons/chyna.png', '2017-11-12 14:51:13', '2017-11-12 14:51:13'),
(29, 'CM Punk', 4, 100, 'storage/icons/cm_punk.png', '2017-11-12 14:51:31', '2017-11-12 14:51:31'),
(30, 'Big Cass', 1, 25, 'storage/icons/colin_cassady.png', '2017-11-12 14:51:50', '2017-11-12 14:51:50'),
(31, 'Curt Hawkins', 1, 25, 'storage/icons/curt_hawkins.png', '2017-11-12 14:52:00', '2017-11-12 14:52:00'),
(32, 'Curtis Axel', 1, 25, 'storage/icons/curtis_axel.png', '2017-11-12 14:52:15', '2017-11-12 14:52:15'),
(33, 'Dana Brooke', 1, 25, 'storage/icons/dana_brooke.png', '2017-11-12 14:52:23', '2017-11-12 14:52:23'),
(34, 'Dash Wilder', 1, 25, 'storage/icons/dash_wilder.png', '2017-11-12 14:52:44', '2017-11-12 14:52:44'),
(35, 'Dean Ambrose', 3, 75, 'storage/icons/dean_ambrose.png', '2017-11-12 14:52:55', '2017-11-12 14:52:55'),
(36, 'Dolph Ziggler', 2, 50, 'storage/icons/dolph_ziggler.png', '2017-11-12 14:53:04', '2017-11-12 14:53:04'),
(37, 'Drew Gulak', 1, 25, 'storage/icons/drew_gulak.png', '2017-11-12 14:53:11', '2017-11-12 14:53:11'),
(38, 'Dusty Rhodes', 4, 100, 'storage/icons/dusty_rhodes.png', '2017-11-12 14:53:24', '2017-11-12 14:53:24'),
(39, 'Eddie Guerrero', 4, 100, 'storage/icons/eddie_guerrero.png', '2017-11-12 14:54:00', '2017-11-12 14:54:00'),
(40, 'Edge', 4, 100, 'storage/icons/edge.png', '2017-11-12 14:54:12', '2017-11-12 14:54:12'),
(41, 'Elias Samson', 1, 25, 'storage/icons/elias_samson.png', '2017-11-12 14:54:21', '2017-11-12 14:54:21'),
(42, 'Enzo Amore', 1, 25, 'storage/icons/enzo_amore.png', '2017-11-12 14:54:34', '2017-11-12 14:54:34'),
(43, 'Erick Rowan', 1, 25, 'storage/icons/erick_rowan.png', '2017-11-12 14:54:48', '2017-11-12 14:54:48'),
(44, 'Fandango', 2, 50, 'storage/icons/fandango.png', '2017-11-12 14:54:57', '2017-11-12 14:54:57'),
(45, 'Finn Bálor', 3, 75, 'storage/icons/finn_balor.png', '2017-11-12 14:55:06', '2017-11-12 14:55:06'),
(46, 'Goldberg', 4, 100, 'storage/icons/goldberg.png', '2017-11-12 14:55:18', '2017-11-12 14:55:18'),
(47, 'Goldust', 1, 25, 'storage/icons/goldust.png', '2017-11-12 14:55:27', '2017-11-12 14:55:27'),
(48, 'Gran Metalik', 1, 25, 'storage/icons/gran_metalik.png', '2017-11-12 14:55:38', '2017-11-12 14:55:38'),
(49, 'Heath Slater', 1, 25, 'storage/icons/heath_slater.png', '2017-11-12 14:55:45', '2017-11-12 14:55:45'),
(50, 'Hulk Hogan', 4, 100, 'storage/icons/hulk_hogan.png', '2017-11-12 14:55:56', '2017-11-12 14:55:56'),
(51, 'NWO Hulk Hogan', 4, 100, 'storage/icons/hulk_hogan_nwo.png', '2017-11-12 14:56:11', '2017-11-12 14:56:11'),
(52, 'Jack Gallagher', 1, 25, 'storage/icons/jack_gallagher.png', '2017-11-12 14:56:20', '2017-11-12 14:56:20'),
(53, 'Jason Jordan', 1, 25, 'storage/icons/jason_jordan.png', '2017-11-12 14:56:29', '2017-11-12 14:56:29'),
(54, 'Jeff Hardy', 3, 75, 'storage/icons/jeff_hardy.png', '2017-11-12 14:56:39', '2017-11-12 14:56:39'),
(55, 'Jey Uso', 2, 50, 'storage/icons/jey_uso.png', '2017-11-12 14:56:49', '2017-11-12 14:56:49'),
(56, 'Jimmy Uso', 2, 50, 'storage/icons/jimmy_uso.png', '2017-11-12 14:56:58', '2017-11-12 14:56:58'),
(57, 'Jinder Mahal', 1, 25, 'storage/icons/jinder_mahal.png', '2017-11-12 14:57:06', '2017-11-12 14:57:06'),
(58, 'John Cena', 3, 75, 'storage/icons/john_cena.png', '2017-11-12 14:57:16', '2017-11-12 14:57:16'),
(59, 'Kalisto', 1, 25, 'storage/icons/kalisto.png', '2017-11-12 14:57:28', '2017-11-12 14:57:28'),
(60, 'Kane', 3, 75, 'storage/icons/kane.png', '2017-11-12 14:57:37', '2017-11-12 14:57:37'),
(61, 'Karl Anderson', 1, 25, 'storage/icons/karl_anderson.png', '2017-11-12 14:57:46', '2017-11-12 14:57:46'),
(62, 'Kevin Nash', 4, 100, 'storage/icons/kevin_nash.png', '2017-11-12 14:57:57', '2017-11-12 14:57:57'),
(63, 'Kevin Owens', 3, 75, 'storage/icons/kevin_owens.png', '2017-11-12 14:58:06', '2017-11-12 14:58:06'),
(64, 'Kofi Kingston', 2, 50, 'storage/icons/kofi_kingston.png', '2017-11-12 14:58:19', '2017-11-12 14:58:19'),
(65, 'Konnor', 1, 25, 'storage/icons/konnor.png', '2017-11-12 14:58:31', '2017-11-12 14:58:31'),
(66, 'Kurt Angle', 4, 100, 'storage/icons/kurt_angle.png', '2017-11-12 14:58:47', '2017-11-12 14:58:47'),
(67, 'Lana', 1, 25, 'storage/icons/lana.png', '2017-11-12 14:58:59', '2017-11-12 14:58:59'),
(68, 'Lince Dorado', 1, 25, 'storage/icons/lince_dorado.png', '2017-11-12 14:59:09', '2017-11-12 14:59:09'),
(69, 'Luke Gallows', 2, 50, 'storage/icons/luke_gallows.png', '2017-11-12 14:59:19', '2017-11-12 14:59:19'),
(70, 'Luke Harper', 2, 50, 'storage/icons/luke_harper.png', '2017-11-12 14:59:29', '2017-11-12 14:59:29'),
(71, 'Matt Hardy', 3, 75, 'storage/icons/matt_hardy.png', '2017-11-12 14:59:39', '2017-11-12 14:59:39'),
(72, 'Mick Foley', 4, 100, 'storage/icons/mick_foley.png', '2017-11-12 14:59:55', '2017-11-12 14:59:55'),
(73, 'Mickie James', 2, 50, 'storage/icons/mickie_james.png', '2017-11-12 15:00:06', '2017-11-12 15:00:06'),
(74, 'Mike Kanellis', 1, 25, 'storage/icons/mike_kanellis.png', '2017-11-12 15:00:16', '2017-11-12 15:00:16'),
(75, 'Mojo Rawley', 1, 25, 'storage/icons/mojo_rawley.png', '2017-11-12 15:00:25', '2017-11-12 15:00:25'),
(76, 'Mustafa Ali', 1, 25, 'storage/icons/mustafa_ali.png', '2017-11-12 15:00:34', '2017-11-12 15:00:34'),
(77, 'Naomi', 2, 50, 'storage/icons/naomi.png', '2017-11-12 15:00:45', '2017-11-12 15:00:45'),
(78, 'Natalya', 2, 50, 'storage/icons/natalya.png', '2017-11-12 15:00:58', '2017-11-12 15:00:58'),
(79, 'Neville', 3, 75, 'storage/icons/neville.png', '2017-11-12 15:01:10', '2017-11-12 15:01:10'),
(80, 'Nia Jax', 2, 50, 'storage/icons/nia_jax.png', '2017-11-12 15:01:19', '2017-11-12 15:01:19'),
(81, 'Nikki Bella', 3, 75, 'storage/icons/nikki_bella.png', '2017-11-12 15:01:28', '2017-11-12 15:01:28'),
(82, 'Noam Dar', 1, 25, 'storage/icons/noam_dar.png', '2017-11-12 15:01:38', '2017-11-12 15:01:38'),
(83, 'Primo', 1, 25, 'storage/icons/primo.png', '2017-11-12 15:01:47', '2017-11-12 15:01:47'),
(84, 'R-Truth', 2, 50, 'storage/icons/r_truth.png', '2017-11-12 15:01:59', '2017-11-12 15:01:59'),
(85, 'Randy Orton', 3, 75, 'storage/icons/randy_orton.png', '2017-11-12 15:02:13', '2017-11-12 15:02:13'),
(86, 'Randy Savage', 4, 100, 'storage/icons/randy_savage.png', '2017-11-12 15:02:44', '2017-11-12 15:02:44'),
(87, 'Razor Ramon', 4, 100, 'storage/icons/razor_ramon.png', '2017-11-12 15:02:57', '2017-11-12 15:02:57'),
(88, 'Rhyno', 2, 50, 'storage/icons/rhyno.png', '2017-11-12 15:03:27', '2017-11-12 15:03:27'),
(89, 'Ric Flair', 4, 100, 'storage/icons/ric_flair.png', '2017-11-12 15:03:41', '2017-11-12 15:03:41'),
(90, 'Rich Swann', 1, 25, 'storage/icons/rich_swann.png', '2017-11-12 15:03:49', '2017-11-12 15:03:49'),
(91, 'Roman Reigns', 3, 75, 'storage/icons/roman_reigns.png', '2017-11-12 15:03:56', '2017-11-12 15:03:56'),
(92, 'Rusev', 2, 50, 'storage/icons/rusev.png', '2017-11-12 15:04:08', '2017-11-12 15:04:08'),
(93, 'Sami Zayn', 2, 50, 'storage/icons/sami_zayn.png', '2017-11-12 15:04:19', '2017-11-12 15:04:19'),
(94, 'Samoa Joe', 3, 75, 'storage/icons/samoa_joe.png', '2017-11-12 15:04:35', '2017-11-12 15:04:35'),
(95, 'Sasha Banks', 3, 75, 'storage/icons/sasha_banks.png', '2017-11-12 15:04:44', '2017-11-12 15:04:44'),
(96, 'Scott Dawson', 1, 25, 'storage/icons/scott_dawson.png', '2017-11-12 15:04:54', '2017-11-12 15:04:54'),
(97, 'Seth Rollins', 3, 75, 'storage/icons/seth_rollins.png', '2017-11-12 15:05:02', '2017-11-12 15:05:02'),
(98, 'Shawn Michaels', 4, 100, 'storage/icons/shawn_michaels.png', '2017-11-12 15:05:13', '2017-11-12 15:05:13'),
(99, 'DX Shawn Michaels', 4, 100, 'storage/icons/shawn_michaels_dx.png', '2017-11-12 15:05:24', '2017-11-12 15:05:24'),
(100, 'Sheamus', 3, 75, 'storage/icons/sheamus.png', '2017-11-12 15:05:33', '2017-11-12 15:05:33'),
(101, 'Shelton Benjamin', 1, 25, 'storage/icons/shelton_benjamin.png', '2017-11-12 15:05:43', '2017-11-12 15:05:43'),
(102, 'Shinsuke Nakamura', 3, 75, 'storage/icons/shinsuke_nakamura.png', '2017-11-12 15:05:52', '2017-11-12 15:05:52'),
(103, 'Sin Cara', 2, 50, 'storage/icons/sin_cara.png', '2017-11-12 15:06:10', '2017-11-12 15:06:10'),
(104, 'Sting', 4, 100, 'storage/icons/sting.png', '2017-11-12 15:06:21', '2017-11-12 15:06:21'),
(105, 'Stone Cold', 4, 100, 'storage/icons/stone_cold.png', '2017-11-12 15:06:31', '2017-11-12 15:06:31'),
(106, 'Tamina', 1, 25, 'storage/icons/tamina.png', '2017-11-12 15:06:45', '2017-11-12 15:06:45'),
(107, 'The Miz', 3, 75, 'storage/icons/the_miz.png', '2017-11-12 15:06:55', '2017-11-12 15:06:55'),
(108, 'TJP', 1, 25, 'storage/icons/tjperkins.png', '2017-11-12 15:07:03', '2017-11-12 15:07:03'),
(109, 'Tony Nese', 1, 25, 'storage/icons/tony_nese.png', '2017-11-12 15:07:12', '2017-11-12 15:07:12'),
(110, 'Triple H', 4, 100, 'storage/icons/triple_h.png', '2017-11-12 15:07:27', '2017-11-12 15:07:27'),
(111, 'DX Triple H', 4, 100, 'storage/icons/triple_h_dx.png', '2017-11-12 15:07:44', '2017-11-12 15:07:44'),
(112, 'Tye Dillinger', 1, 25, 'storage/icons/tye_dillinger.png', '2017-11-12 15:07:52', '2017-11-12 15:07:52'),
(113, 'Tyler Breeze', 2, 50, 'storage/icons/tyler_breeze.png', '2017-11-12 15:08:00', '2017-11-12 15:08:00'),
(114, 'Undertaker', 4, 100, 'storage/icons/undertaker.png', '2017-11-12 15:08:10', '2017-11-12 15:08:10'),
(115, 'Viktor', 1, 25, 'storage/icons/viktor.png', '2017-11-12 15:08:21', '2017-11-12 15:08:21'),
(116, 'Xavier Woods', 2, 50, 'storage/icons/xavier_woods.png', '2017-11-12 15:08:34', '2017-11-12 15:08:34'),
(117, 'Zack Ryder', 2, 25, 'storage/icons/zack_ryder.png', '2017-11-12 15:08:46', '2017-11-16 18:15:12'),
(118, 'Beta Tester', 5, 100, 'storage/icons/beta.png', '2017-11-18 17:23:51', '2017-11-18 17:23:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
