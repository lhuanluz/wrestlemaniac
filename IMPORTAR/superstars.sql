-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2017 às 17:46
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura da tabela `superstars`
--

CREATE TABLE `superstars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` double NOT NULL,
  `last_points` double NOT NULL,
  `price` double NOT NULL,
  `last_show` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `superstars`
--

INSERT INTO `superstars` (`id`, `name`, `brand`, `image`, `points`, `last_points`, `price`, `last_show`, `created_at`, `updated_at`) VALUES
(1, 'Akira Tozawa', 'Raw', 'storage/superstars/akira_tozawa.png', 0, 0, 1000, 0, '2017-06-15 18:21:55', '2017-06-15 18:21:55'),
(2, 'Alexa Bliss', 'Raw', 'storage/superstars/alexa_bliss.png', 0, 0, 1000, 0, '2017-06-15 18:22:19', '2017-06-15 18:22:19'),
(3, 'Alicia Fox', 'Raw', 'storage/superstars/alicia_fox.png', 0, 0, 1000, 0, '2017-06-15 18:22:27', '2017-06-15 18:22:27'),
(4, 'Apollo Crews', 'Raw', 'storage/superstars/apollo_crews.png', 0, 0, 1000, 0, '2017-06-15 18:22:35', '2017-06-15 18:22:35'),
(5, 'Ariya Daivari', 'Raw', 'storage/superstars/ariya_daivari.png', 0, 0, 1000, 0, '2017-06-15 18:22:58', '2017-06-15 18:22:58'),
(6, 'Austin Aries', 'Raw', 'storage/superstars/austin_aries.png', 0, 0, 1000, 0, '2017-06-15 18:23:07', '2017-06-15 18:23:07'),
(7, 'Bayley', 'Raw', 'storage/superstars/bayley.png', 0, 0, 1000, 0, '2017-06-15 18:23:20', '2017-06-15 18:23:20'),
(8, 'Big Show', 'Raw', 'storage/superstars/big_show.png', 0, 0, 1000, 0, '2017-06-15 18:23:28', '2017-06-15 18:23:28'),
(9, 'Bo Dallas', 'Raw', 'storage/superstars/bo_dallas.png', 0, 0, 1000, 0, '2017-06-15 18:23:38', '2017-06-15 18:23:38'),
(10, 'Braun Strowman', 'Raw', 'storage/superstars/braun_strowman.png', 0, 0, 1000, 0, '2017-06-15 18:23:49', '2017-06-15 18:23:49'),
(11, 'Bray Wyatt', 'Raw', 'storage/superstars/bray_wyatt.png', 0, 0, 1000, 0, '2017-06-15 18:23:59', '2017-06-15 18:23:59'),
(12, 'Brian Kendrick', 'Raw', 'storage/superstars/brian_kendrick.png', 0, 0, 1000, 0, '2017-06-15 18:24:09', '2017-06-15 18:24:09'),
(13, 'Brock Lesnar', 'Raw', 'storage/superstars/brock_lesnar.png', 0, 0, 1000, 0, '2017-06-15 18:24:50', '2017-06-15 18:24:50'),
(14, 'Cedric Alexander', 'Raw', 'storage/superstars/cedric_alexander.png', 0, 0, 1000, 0, '2017-06-15 18:25:08', '2017-06-15 18:25:08'),
(15, 'Cesaro', 'Raw', 'storage/superstars/cesaro.png', 0, 0, 1000, 0, '2017-06-15 18:25:17', '2017-06-15 18:25:17'),
(16, 'Big Cass', 'Raw', 'storage/superstars/colin_cassady.png', 0, 0, 1000, 0, '2017-06-15 18:25:35', '2017-06-15 18:25:35'),
(17, 'Curt Hawkins', 'Raw', 'storage/superstars/curt_hawkins.png', 0, 0, 1000, 0, '2017-06-15 18:25:49', '2017-06-15 18:25:49'),
(18, 'Curtis Axel', 'Raw', 'storage/superstars/curtis_axel.png', 0, 0, 1000, 0, '2017-06-15 18:25:59', '2017-06-15 18:25:59'),
(19, 'Dana Brooke', 'Raw', 'storage/superstars/dana_brooke.png', 0, 0, 1000, 0, '2017-06-15 18:26:09', '2017-06-15 18:26:09'),
(20, 'Darren Young', 'Raw', 'storage/superstars/darren_young.png', 0, 0, 1000, 0, '2017-06-15 18:26:19', '2017-06-15 18:26:19'),
(21, 'Dash Wilder', 'Raw', 'storage/superstars/dash_wilder.png', 0, 0, 1000, 0, '2017-06-15 18:26:29', '2017-06-15 18:26:29'),
(22, 'Dean Ambrose', 'Raw', 'storage/superstars/dean_ambrose.png', 0, 0, 1000, 0, '2017-06-15 18:26:39', '2017-06-15 18:26:39'),
(23, 'Drew Gulak', 'Raw', 'storage/superstars/drew_gulak.png', 0, 0, 1000, 0, '2017-06-15 18:26:50', '2017-06-15 18:26:50'),
(24, 'Elias Samson', 'Raw', 'storage/superstars/elias_samson.png', 0, 0, 1000, 0, '2017-06-15 18:26:59', '2017-06-15 18:26:59'),
(25, 'Emma', 'Raw', 'storage/superstars/emma.png', 0, 0, 1000, 0, '2017-06-15 18:27:07', '2017-06-15 18:27:07'),
(26, 'Enzo Amore', 'Raw', 'storage/superstars/enzo_amore.png', 0, 0, 1000, 0, '2017-06-15 18:27:14', '2017-06-15 18:27:14'),
(27, 'Finn Bálor', 'Raw', 'storage/superstars/finn_balor.png', 0, 0, 1000, 0, '2017-06-15 18:27:32', '2017-06-15 18:27:32'),
(28, 'Goldust', 'Raw', 'storage/superstars/goldust.png', 0, 0, 1000, 0, '2017-06-15 18:27:40', '2017-06-15 18:27:40'),
(29, 'Gran Metalik', 'Raw', 'storage/superstars/gran_metalik.png', 0, 0, 1000, 0, '2017-06-15 18:27:53', '2017-06-15 18:27:53'),
(30, 'Heath Slater', 'Raw', 'storage/superstars/heath_slater.png', 0, 0, 1000, 0, '2017-06-15 18:28:02', '2017-06-15 18:28:02'),
(31, 'Ho Ho Lun', 'Raw', 'storage/superstars/hoho_lun.png', 0, 0, 1000, 0, '2017-06-15 18:28:27', '2017-06-15 18:28:27'),
(32, 'Jack Gallagher', 'Raw', 'storage/superstars/jack_gallagher.png', 0, 0, 1000, 0, '2017-06-15 18:28:40', '2017-06-15 18:28:40'),
(33, 'Jeff Hardy', 'Raw', 'storage/superstars/jeff_hardy.png', 0, 0, 1000, 0, '2017-06-15 18:28:47', '2017-06-15 18:28:47'),
(34, 'Kalisto', 'Raw', 'storage/superstars/kalisto.png', 0, 0, 1000, 0, '2017-06-15 18:29:15', '2017-06-15 18:29:15'),
(35, 'Karl Anderson', 'Raw', 'storage/superstars/karl_anderson.png', 0, 0, 1000, 0, '2017-06-15 18:29:24', '2017-06-15 18:29:24'),
(36, 'Lince Dorado', 'Raw', 'storage/superstars/lince_dorado.png', 0, 0, 1000, 0, '2017-06-15 18:29:35', '2017-06-15 18:29:35'),
(37, 'Luke Gallows', 'Raw', 'storage/superstars/luke_gallows.png', 0, 0, 1000, 0, '2017-06-15 18:29:44', '2017-06-15 18:29:44'),
(38, 'Mark Henry', 'Raw', 'storage/superstars/mark_henry.png', 0, 0, 1000, 0, '2017-06-15 18:29:53', '2017-06-15 18:29:53'),
(39, 'Matt Hardy', 'Raw', 'storage/superstars/matt_hardy.png', 0, 0, 1000, 0, '2017-06-15 18:30:11', '2017-06-15 18:30:11'),
(40, 'Mickie James', 'Raw', 'storage/superstars/mickie_james.png', 0, 0, 1000, 0, '2017-06-15 18:30:24', '2017-06-15 18:30:24'),
(41, 'Mustafa Ali', 'Raw', 'storage/superstars/mustafa_ali.png', 0, 0, 1000, 0, '2017-06-15 18:30:33', '2017-06-15 18:30:33'),
(42, 'Neville', 'Raw', 'storage/superstars/neville.png', 0, 0, 1000, 0, '2017-06-15 18:30:40', '2017-06-15 18:30:40'),
(43, 'Nia Jax', 'Raw', 'storage/superstars/nia_jax.png', 0, 0, 1000, 0, '2017-06-15 18:30:49', '2017-06-15 18:30:49'),
(44, 'Noam Dar', 'Raw', 'storage/superstars/noam_dar.png', 0, 0, 1000, 0, '2017-06-15 18:30:57', '2017-06-15 18:30:57'),
(45, 'R-Truth', 'Raw', 'storage/superstars/r_truth.png', 0, 0, 1000, 0, '2017-06-15 18:31:25', '2017-06-15 18:31:25'),
(46, 'Rhyno', 'Raw', 'storage/superstars/rhyno.png', 0, 0, 1000, 0, '2017-06-15 18:31:37', '2017-06-15 18:31:37'),
(47, 'Rich Swann', 'Raw', 'storage/superstars/rich_swann.png', 0, 0, 1000, 0, '2017-06-15 18:31:45', '2017-06-15 18:31:45'),
(48, 'Roman Reigns', 'Raw', 'storage/superstars/roman_reigns.png', 0, 0, 1000, 0, '2017-06-15 18:32:40', '2017-06-15 18:32:40'),
(49, 'Samoa Joe', 'Raw', 'storage/superstars/samoa_joe.png', 0, 0, 1000, 0, '2017-06-15 18:32:50', '2017-06-15 18:32:50'),
(50, 'Sasha Banks', 'Raw', 'storage/superstars/sasha_banks.png', 0, 0, 1000, 0, '2017-06-15 18:32:58', '2017-06-15 18:32:58'),
(51, 'Scott Dawson', 'Raw', 'storage/superstars/scott_dawson.png', 0, 0, 1000, 0, '2017-06-15 18:33:06', '2017-06-15 18:33:06'),
(52, 'Seth Rollins', 'Raw', 'storage/superstars/seth_rollins.png', 0, 0, 1000, 0, '2017-06-15 18:33:20', '2017-06-15 18:33:20'),
(53, 'Sheamus', 'Raw', 'storage/superstars/sheamus.png', 0, 0, 1000, 0, '2017-06-15 18:33:29', '2017-06-15 18:33:29'),
(54, 'Summer Rae', 'Raw', 'storage/superstars/summer_rae.png', 0, 0, 1000, 0, '2017-06-15 18:33:40', '2017-06-15 18:33:40'),
(55, 'The Miz', 'Raw', 'storage/superstars/the_miz.png', 0, 0, 1000, 0, '2017-06-15 18:33:52', '2017-06-15 18:33:52'),
(56, 'Titus O\'Neil', 'Raw', 'storage/superstars/titus_o_neil.png', 0, 0, 1000, 0, '2017-06-15 18:34:01', '2017-06-15 18:34:01'),
(57, 'TJP', 'Raw', 'storage/superstars/tjperkins.png', 0, 0, 1000, 0, '2017-06-15 18:34:09', '2017-06-15 18:34:09'),
(58, 'Tony Nese', 'Raw', 'storage/superstars/tony_nese.png', 0, 0, 1000, 0, '2017-06-15 18:34:56', '2017-06-15 18:34:56'),
(59, 'Aiden English', 'Smackdown', 'storage/superstars/aiden_english.png', 0, 0, 1000, 0, '2017-06-15 18:35:27', '2017-06-15 18:35:27'),
(60, 'Aj Styles', 'Smackdown', 'storage/superstars/aj_styles.png', 0, 0, 1000, 0, '2017-06-15 18:35:34', '2017-06-15 18:35:34'),
(61, 'Baron Corbin', 'Smackdown', 'storage/superstars/baron_corbin.png', 0, 0, 1000, 0, '2017-06-15 18:35:45', '2017-06-15 18:35:45'),
(62, 'Becky Lynch', 'Smackdown', 'storage/superstars/becky_lynch.png', 0, 0, 1000, 0, '2017-06-15 18:35:56', '2017-06-15 18:35:56'),
(63, 'Big E', 'Smackdown', 'storage/superstars/big_e.png', 0, 0, 1000, 0, '2017-06-15 18:36:04', '2017-06-15 18:36:04'),
(64, 'Carmella', 'Smackdown', 'storage/superstars/carmella.png', 0, 0, 1000, 0, '2017-06-15 18:36:11', '2017-06-15 18:36:11'),
(65, 'Chad Gable', 'Smackdown', 'storage/superstars/chad_gable.png', 0, 0, 1000, 0, '2017-06-15 18:36:21', '2017-06-15 18:36:21'),
(66, 'Charlotte', 'Smackdown', 'storage/superstars/charlotte.png', 0, 0, 1000, 0, '2017-06-15 18:36:30', '2017-06-15 18:36:30'),
(67, 'Dolph Ziggler', 'Smackdown', 'storage/superstars/dolph_ziggler.png', 0, 0, 1000, 0, '2017-06-15 18:36:48', '2017-06-15 18:36:48'),
(68, 'Epico', 'Smackdown', 'storage/superstars/epico.png', 0, 0, 1000, 0, '2017-06-15 18:37:05', '2017-06-15 18:37:05'),
(69, 'Erick Rowan', 'Smackdown', 'storage/superstars/erick_rowan.png', 0, 0, 1000, 0, '2017-06-15 18:37:15', '2017-06-15 18:37:15'),
(70, 'Eva Marie', 'Smackdown', 'storage/superstars/eva_marie.png', 0, 0, 1000, 0, '2017-06-15 18:37:32', '2017-06-15 18:37:32'),
(71, 'Fandango', 'Smackdown', 'storage/superstars/fandango.png', 0, 0, 1000, 0, '2017-06-15 18:37:44', '2017-06-15 18:37:44'),
(72, 'Jason Jordan', 'Smackdown', 'storage/superstars/jason_jordan.png', 0, 0, 1000, 0, '2017-06-15 18:37:57', '2017-06-15 18:37:57'),
(73, 'Jey Uso', 'Smackdown', 'storage/superstars/jey_uso.png', 0, 0, 1000, 0, '2017-06-15 18:38:06', '2017-06-15 18:38:06'),
(74, 'Jimmy Uso', 'Smackdown', 'storage/superstars/jimmy_uso.png', 0, 0, 1000, 0, '2017-06-15 18:38:17', '2017-06-15 18:38:17'),
(75, 'Jinder Mahal', 'Smackdown', 'storage/superstars/jinder_mahal.png', 0, 0, 1000, 0, '2017-06-15 18:38:28', '2017-06-15 18:38:28'),
(76, 'John Cena', 'Smackdown', 'storage/superstars/john_cena.png', 0, 0, 1000, 0, '2017-06-15 18:38:45', '2017-06-15 18:38:45'),
(77, 'Chris Jericho', 'Smackdown', 'storage/superstars/chris_jericho.png', 0, 0, 1000, 0, '2017-06-15 18:39:00', '2017-06-15 18:39:00'),
(78, 'Kane', 'Smackdown', 'storage/superstars/kane.png', 0, 0, 1000, 0, '2017-06-15 18:39:12', '2017-06-15 18:39:12'),
(79, 'Kevin Owens', 'Smackdown', 'storage/superstars/kevin_owens.png', 0, 0, 1000, 0, '2017-06-15 18:39:22', '2017-06-15 18:39:22'),
(80, 'Kofi Kingston', 'Smackdown', 'storage/superstars/kofi_kingston.png', 0, 0, 1000, 0, '2017-06-15 18:39:35', '2017-06-15 18:39:35'),
(81, 'Konnor', 'Smackdown', 'storage/superstars/konnor.png', 0, 0, 1000, 0, '2017-06-15 18:39:46', '2017-06-15 18:39:46'),
(82, 'Lana', 'Smackdown', 'storage/superstars/lana.png', 0, 0, 1000, 0, '2017-06-15 18:39:55', '2017-06-15 18:39:55'),
(83, 'Luke Harper', 'Smackdown', 'storage/superstars/luke_harper.png', 0, 0, 1000, 0, '2017-06-15 18:40:09', '2017-06-15 18:40:09'),
(84, 'Mojo Rawley', 'Smackdown', 'storage/superstars/mojo_rawley.png', 0, 0, 1000, 0, '2017-06-15 18:40:23', '2017-06-15 18:40:23'),
(85, 'Naomi', 'Smackdown', 'storage/superstars/naomi.png', 0, 0, 1000, 0, '2017-06-15 18:40:33', '2017-06-15 18:40:33'),
(86, 'Natalya', 'Smackdown', 'storage/superstars/natalya.png', 0, 0, 1000, 0, '2017-06-15 18:40:41', '2017-06-15 18:40:41'),
(87, 'Nikki Bella', 'Smackdown', 'storage/superstars/nikki_bella.png', 0, 0, 1000, 0, '2017-06-15 18:40:53', '2017-06-15 18:40:53'),
(88, 'Primo', 'Smackdown', 'storage/superstars/primo.png', 0, 0, 1000, 0, '2017-06-15 18:41:02', '2017-06-15 18:41:02'),
(89, 'Randy Orton', 'Smackdown', 'storage/superstars/randy_orton.png', 0, 0, 1000, 0, '2017-06-15 18:41:12', '2017-06-15 18:41:12'),
(90, 'Rusev', 'Smackdown', 'storage/superstars/rusev.png', 0, 0, 1000, 0, '2017-06-15 18:41:21', '2017-06-15 18:41:21'),
(91, 'Sami Zayn', 'Smackdown', 'storage/superstars/sami_zayn.png', 0, 0, 1000, 0, '2017-06-15 18:41:30', '2017-06-15 18:41:30'),
(92, 'Shinsuke Nakamura', 'Smackdown', 'storage/superstars/shinsuke_nakamura.png', 0, 0, 1000, 0, '2017-06-15 18:41:46', '2017-06-15 18:41:46'),
(93, 'Sin Cara', 'Smackdown', 'storage/superstars/sin_cara.png', 0, 0, 1000, 0, '2017-06-15 18:41:55', '2017-06-15 18:41:55'),
(94, 'Tamina', 'Smackdown', 'storage/superstars/tamina.png', 0, 0, 1000, 0, '2017-06-15 18:42:05', '2017-06-15 18:42:05'),
(95, 'Tye Dillinger', 'Smackdown', 'storage/superstars/tye_dillinger.png', 0, 0, 1000, 0, '2017-06-15 18:42:16', '2017-06-15 18:42:16'),
(96, 'Tyler Breeze', 'Smackdown', 'storage/superstars/tyler_breeze.png', 0, 0, 1000, 0, '2017-06-15 18:42:28', '2017-06-15 18:42:28'),
(97, 'Viktor', 'Smackdown', 'storage/superstars/viktor.png', 0, 0, 1000, 0, '2017-06-15 18:42:38', '2017-06-15 18:42:38'),
(98, 'Xavier Woods', 'Smackdown', 'storage/superstars/xavier_woods.png', 0, 0, 1000, 0, '2017-06-15 18:42:47', '2017-06-15 18:42:47'),
(99, 'Zack Ryder', 'Smackdown', 'storage/superstars/zack_ryder.png', 0, 0, 1000, 0, '2017-06-15 18:43:00', '2017-06-15 18:43:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `superstars`
--
ALTER TABLE `superstars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `superstars`
--
ALTER TABLE `superstars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
