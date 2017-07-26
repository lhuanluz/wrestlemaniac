-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jul-2017 às 00:43
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
-- Estrutura da tabela `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `statusMercadoRaw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fechado',
  `statusMercadoSmackdown` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fechado',
  `ppvBrand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `statusMercadoPPV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fechado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `configs`
--

INSERT INTO `configs` (`id`, `statusMercadoRaw`, `statusMercadoSmackdown`, `ppvBrand`, `statusMercadoPPV`, `created_at`, `updated_at`) VALUES
(1, 'Aberto', 'Aberto', 'Both', 'Fechado', '2017-06-27 19:25:01', '2017-06-27 19:25:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leagues`
--

CREATE TABLE `leagues` (
  `id` int(10) UNSIGNED NOT NULL,
  `league_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `league_points` double NOT NULL DEFAULT '0',
  `owner` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `member1` int(11) UNSIGNED NOT NULL DEFAULT '2',
  `member2` int(11) UNSIGNED NOT NULL DEFAULT '3',
  `member3` int(11) UNSIGNED NOT NULL DEFAULT '4',
  `member4` int(11) UNSIGNED NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `leagues`
--

INSERT INTO `leagues` (`id`, `league_name`, `secret_password`, `league_points`, `owner`, `member1`, `member2`, `member3`, `member4`, `created_at`, `updated_at`) VALUES
(1, 'None', '', 0, 1, 2, 3, 4, 5, '2017-06-27 19:24:54', '2017-06-27 19:24:54'),
(2, 'Os Picas', '$2y$10$Pwl4bRTMJv2yavkIF79JXORoosA18TMLdKao/rdZjyO2n3uIekrmO', 0, 6, 7, 2, 4, 5, '2017-07-23 09:08:58', '2017-07-23 09:08:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_06_27_071106_create_leagues_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_06_10_143441_create_superstars_table', 1),
(5, '2017_06_15_170010_create_raw_teams_table', 1),
(6, '2017_06_19_164130_create_configs_table', 1),
(7, '2017_06_22_031719_create_smackdown_teams_table', 1),
(8, '2017_06_25_022811_create_ppv_teams_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ppv_teams`
--

CREATE TABLE `ppv_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `team_points` double NOT NULL DEFAULT '0',
  `team_total_points` double NOT NULL DEFAULT '0',
  `team_cash` double NOT NULL DEFAULT '4000',
  `superstar01` int(10) UNSIGNED NOT NULL,
  `superstar02` int(10) UNSIGNED NOT NULL,
  `superstar03` int(10) UNSIGNED NOT NULL,
  `superstar04` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ppv_teams`
--

INSERT INTO `ppv_teams` (`id`, `user_id`, `team_points`, `team_total_points`, `team_cash`, `superstar01`, `superstar02`, `superstar03`, `superstar04`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:28', '2017-06-27 19:25:28'),
(2, 2, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:43', '2017-06-27 19:25:43'),
(3, 3, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:57', '2017-06-27 19:25:57'),
(4, 4, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:23', '2017-06-27 19:26:23'),
(5, 5, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:38', '2017-06-27 19:26:38'),
(6, 6, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:52', '2017-06-27 19:26:52'),
(7, 7, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:42:14', '2017-06-27 19:42:14'),
(8, 8, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:37', '2017-06-27 21:37:37'),
(9, 9, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:56', '2017-06-27 21:37:56'),
(10, 10, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:38:10', '2017-06-27 21:38:10'),
(11, 11, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:45:35', '2017-06-29 01:45:35'),
(12, 12, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:46:04', '2017-06-29 01:46:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raw_teams`
--

CREATE TABLE `raw_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `team_points` double NOT NULL DEFAULT '0',
  `team_total_points` double NOT NULL DEFAULT '0',
  `team_cash` double NOT NULL DEFAULT '4000',
  `superstar01` int(10) UNSIGNED NOT NULL,
  `superstar02` int(10) UNSIGNED NOT NULL,
  `superstar03` int(10) UNSIGNED NOT NULL,
  `superstar04` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `raw_teams`
--

INSERT INTO `raw_teams` (`id`, `user_id`, `team_points`, `team_total_points`, `team_cash`, `superstar01`, `superstar02`, `superstar03`, `superstar04`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:28', '2017-06-27 19:25:28'),
(2, 2, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:42', '2017-06-27 19:25:42'),
(3, 3, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:56', '2017-06-27 19:25:56'),
(4, 4, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:23', '2017-06-27 19:26:23'),
(5, 5, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:38', '2017-06-27 19:26:38'),
(6, 6, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:52', '2017-06-27 19:26:52'),
(7, 7, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:42:14', '2017-06-27 19:42:14'),
(8, 8, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:37', '2017-06-27 21:37:37'),
(9, 9, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:55', '2017-06-27 21:37:55'),
(10, 10, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:38:10', '2017-06-27 21:38:10'),
(11, 11, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:45:34', '2017-06-29 01:45:34'),
(12, 12, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:46:03', '2017-06-29 01:46:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `smackdown_teams`
--

CREATE TABLE `smackdown_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `team_points` double NOT NULL DEFAULT '0',
  `team_total_points` double NOT NULL DEFAULT '0',
  `team_cash` double NOT NULL DEFAULT '4000',
  `superstar01` int(10) UNSIGNED NOT NULL,
  `superstar02` int(10) UNSIGNED NOT NULL,
  `superstar03` int(10) UNSIGNED NOT NULL,
  `superstar04` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `smackdown_teams`
--

INSERT INTO `smackdown_teams` (`id`, `user_id`, `team_points`, `team_total_points`, `team_cash`, `superstar01`, `superstar02`, `superstar03`, `superstar04`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:28', '2017-06-27 19:25:28'),
(2, 2, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:42', '2017-06-27 19:25:42'),
(3, 3, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:25:56', '2017-06-27 19:25:56'),
(4, 4, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:23', '2017-06-27 19:26:23'),
(5, 5, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:38', '2017-06-27 19:26:38'),
(6, 6, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:26:52', '2017-06-27 19:26:52'),
(7, 7, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 19:42:14', '2017-06-27 19:42:14'),
(8, 8, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:37', '2017-06-27 21:37:37'),
(9, 9, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:37:56', '2017-06-27 21:37:56'),
(10, 10, 0, 0, 4000, 999, 998, 997, 996, '2017-06-27 21:38:10', '2017-06-27 21:38:10'),
(11, 11, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:45:34', '2017-06-29 01:45:34'),
(12, 12, 0, 0, 4000, 999, 998, 997, 996, '2017-06-29 01:46:04', '2017-06-29 01:46:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `superstars`
--

CREATE TABLE `superstars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` double NOT NULL DEFAULT '0',
  `last_points` double NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '1000',
  `champion` tinyint(1) NOT NULL DEFAULT '0',
  `belt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `last_show` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `superstars`
--

INSERT INTO `superstars` (`id`, `name`, `brand`, `image`, `points`, `last_points`, `price`, `champion`, `belt`, `last_show`, `created_at`, `updated_at`) VALUES
(1, 'Akira Tozawa', 'Raw', 'storage/superstars/akira_tozawa.png', 4.5, 3.5, 1062, 0, 'none', 1, '2017-06-15 18:21:55', '2017-06-15 18:21:55'),
(2, 'Alexa Bliss', 'Raw', 'storage/superstars/alexa_bliss.png', 3, 2.5, 1155, 1, 'Raw Women\'s Champion', 1, '2017-06-15 18:22:19', '2017-06-15 18:22:19'),
(3, 'Alicia Fox', 'Raw', 'storage/superstars/alicia_fox.png', 0, 0.5, 810, 0, 'none', 0, '2017-06-15 18:22:27', '2017-06-15 18:22:27'),
(4, 'Apollo Crews', 'Raw', 'storage/superstars/apollo_crews.png', 1.5, 5, 920, 0, 'none', 1, '2017-06-15 18:22:35', '2017-06-15 18:22:35'),
(5, 'Ariya Daivari', 'Raw', 'storage/superstars/ariya_daivari.png', 4.5, 0, 1045, 0, 'none', 1, '2017-06-15 18:22:58', '2017-06-15 18:22:58'),
(6, 'Austin Aries', 'Raw', 'storage/superstars/austin_aries.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:23:07', '2017-06-15 18:23:07'),
(7, 'Bayley', 'Raw', 'storage/superstars/bayley.png', 3, 3.5, 865, 0, 'none', 1, '2017-06-15 18:23:20', '2017-06-15 18:23:20'),
(8, 'Big Show', 'Raw', 'storage/superstars/big_show.png', 0, 2, 740, 0, 'none', 1, '2017-06-15 18:23:28', '2017-06-15 18:23:28'),
(9, 'Bo Dallas', 'Raw', 'storage/superstars/bo_dallas.png', 5, 4, 1235, 0, 'none', 1, '2017-06-15 18:23:38', '2017-06-15 18:23:38'),
(10, 'Braun Strowman', 'Raw', 'storage/superstars/braun_strowman.png', 5, 3, 1360, 0, 'none', 1, '2017-06-15 18:23:49', '2017-06-15 18:23:49'),
(11, 'Bray Wyatt', 'Raw', 'storage/superstars/bray_wyatt.png', 2, 7, 690, 0, 'none', 1, '2017-06-15 18:23:59', '2017-06-15 18:23:59'),
(12, 'Brian Kendrick', 'Raw', 'storage/superstars/brian_kendrick.png', 0.5, 0, 905, 0, 'none', 1, '2017-06-15 18:24:09', '2017-06-15 18:24:09'),
(13, 'Brock Lesnar', 'Raw', 'storage/superstars/brock_lesnar.png', 0, 4, 1130, 1, 'Raw Universal Champion', 0, '2017-06-15 18:24:50', '2017-06-15 18:24:50'),
(14, 'Cedric Alexander', 'Raw', 'storage/superstars/cedric_alexander.png', 0, 2.5, 1025, 0, 'none', 0, '2017-06-15 18:25:08', '2017-06-15 18:25:08'),
(15, 'Cesaro', 'Raw', 'storage/superstars/cesaro.png', 0, 5.5, 1135, 1, 'Raw Tag Team Champion 1', 0, '2017-06-15 18:25:17', '2017-06-15 18:25:17'),
(16, 'Big Cass', 'Raw', 'storage/superstars/colin_cassady.png', 3, 1, 880, 0, 'none', 1, '2017-06-15 18:25:35', '2017-06-15 18:25:35'),
(17, 'Curt Hawkins', 'Raw', 'storage/superstars/curt_hawkins.png', 0, 1, 660, 0, 'none', 0, '2017-06-15 18:25:49', '2017-06-15 18:25:49'),
(18, 'Curtis Axel', 'Raw', 'storage/superstars/curtis_axel.png', 5, 4, 1120, 0, 'none', 1, '2017-06-15 18:25:59', '2017-06-15 18:25:59'),
(19, 'Dana Brooke', 'Raw', 'storage/superstars/dana_brooke.png', 0, 0, 950, 0, 'none', 0, '2017-06-15 18:26:09', '2017-06-15 18:26:09'),
(20, 'Darren Young', 'Raw', 'storage/superstars/darren_young.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:26:19', '2017-06-15 18:26:19'),
(21, 'Dash Wilder', 'Raw', 'storage/superstars/dash_wilder.png', 2.5, 3, 875, 0, 'none', 1, '2017-06-15 18:26:29', '2017-06-15 18:26:29'),
(22, 'Dean Ambrose', 'Raw', 'storage/superstars/dean_ambrose.png', 2, 9, 815, 0, 'none', 1, '2017-06-15 18:26:39', '2017-06-15 18:26:39'),
(23, 'Drew Gulak', 'Raw', 'storage/superstars/drew_gulak.png', 1.5, 0, 915, 0, 'none', 1, '2017-06-15 18:26:50', '2017-06-15 18:26:50'),
(24, 'Elias Samson', 'Raw', 'storage/superstars/elias_samson.png', 2.5, 3, 720, 0, 'none', 1, '2017-06-15 18:26:59', '2017-06-15 18:26:59'),
(25, 'Emma', 'Raw', 'storage/superstars/emma.png', 0, 0, 940, 0, 'none', 0, '2017-06-15 18:27:07', '2017-06-15 18:27:07'),
(26, 'Enzo Amore', 'Raw', 'storage/superstars/enzo_amore.png', 0, 1, 580, 0, 'none', 1, '2017-06-15 18:27:14', '2017-06-15 18:27:14'),
(27, 'Finn Bálor', 'Raw', 'storage/superstars/finn_balor.png', 1.5, 3, 1100, 0, 'none', 1, '2017-06-15 18:27:32', '2017-06-15 18:27:32'),
(28, 'Goldust', 'Raw', 'storage/superstars/goldust.png', 0, 5, 840, 0, 'none', 0, '2017-06-15 18:27:40', '2017-06-15 18:27:40'),
(29, 'Gran Metalik', 'Raw', 'storage/superstars/gran_metalik.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:27:53', '2017-06-15 18:27:53'),
(30, 'Heath Slater', 'Raw', 'storage/superstars/heath_slater.png', 0, 3, 1045, 0, 'none', 0, '2017-06-15 18:28:02', '2017-06-15 18:28:02'),
(31, 'Ho Ho Lun', 'Raw', 'storage/superstars/hoho_lun.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:28:27', '2017-06-15 18:28:27'),
(32, 'Jack Gallagher', 'Raw', 'storage/superstars/jack_gallagher.png', 2.5, 0, 925, 0, 'none', 1, '2017-06-15 18:28:40', '2017-06-15 18:28:40'),
(33, 'Jeff Hardy', 'Raw', 'storage/superstars/jeff_hardy.png', 0.5, 3.5, 775, 0, 'none', 1, '2017-06-15 18:28:47', '2017-06-15 18:28:47'),
(34, 'Kalisto', 'Raw', 'storage/superstars/kalisto.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:29:15', '2017-06-15 18:29:15'),
(35, 'Karl Anderson', 'Raw', 'storage/superstars/karl_anderson.png', 0, 4, 955, 0, 'none', 0, '2017-06-15 18:29:24', '2017-06-15 18:29:24'),
(36, 'Lince Dorado', 'Raw', 'storage/superstars/lince_dorado.png', 0, 0, 905, 0, 'none', 0, '2017-06-15 18:29:35', '2017-06-15 18:29:35'),
(37, 'Luke Gallows', 'Raw', 'storage/superstars/luke_gallows.png', 0, 5, 955, 0, 'none', 0, '2017-06-15 18:29:44', '2017-06-15 18:29:44'),
(38, 'Mark Henry', 'Raw', 'storage/superstars/mark_henry.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:29:53', '2017-06-15 18:29:53'),
(39, 'Matt Hardy', 'Raw', 'storage/superstars/matt_hardy.png', 1.5, 2.5, 500, 0, 'none', 1, '2017-06-15 18:30:11', '2017-06-15 18:30:11'),
(40, 'Mickie James', 'Raw', 'storage/superstars/mickie_james.png', 0, 0, 950, 0, 'none', 0, '2017-06-15 18:30:24', '2017-06-15 18:30:24'),
(41, 'Mustafa Ali', 'Raw', 'storage/superstars/mustafa_ali.png', 3.5, 0.5, 845, 0, 'none', 1, '2017-06-15 18:30:33', '2017-06-15 18:30:33'),
(42, 'Neville', 'Raw', 'storage/superstars/neville.png', 0, 2.5, 1200, 1, 'Cruiserweight Champion', 0, '2017-06-15 18:30:40', '2017-06-15 18:30:40'),
(43, 'Nia Jax', 'Raw', 'storage/superstars/nia_jax.png', 1, 1.5, 665, 0, 'none', 1, '2017-06-15 18:30:49', '2017-06-15 18:30:49'),
(44, 'Noam Dar', 'Raw', 'storage/superstars/noam_dar.png', 0, 1.5, 735, 0, 'none', 0, '2017-06-15 18:30:57', '2017-06-15 18:30:57'),
(45, 'R-Truth', 'Raw', 'storage/superstars/r_truth.png', 0, 1, 570, 0, 'none', 0, '2017-06-15 18:31:25', '2017-06-15 18:31:25'),
(46, 'Rhyno', 'Raw', 'storage/superstars/rhyno.png', 0, 1.5, 735, 0, 'none', 0, '2017-06-15 18:31:37', '2017-06-15 18:31:37'),
(47, 'Rich Swann', 'Raw', 'storage/superstars/rich_swann.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:31:45', '2017-06-15 18:31:45'),
(48, 'Roman Reigns', 'Raw', 'storage/superstars/roman_reigns.png', 6, 2, 905, 0, 'none', 1, '2017-06-15 18:32:40', '2017-06-15 18:32:40'),
(49, 'Samoa Joe', 'Raw', 'storage/superstars/samoa_joe.png', 6, 2, 985, 0, 'none', 1, '2017-06-15 18:32:50', '2017-06-15 18:32:50'),
(50, 'Sasha Banks', 'Raw', 'storage/superstars/sasha_banks.png', 2, 2.5, 1120, 0, 'none', 1, '2017-06-15 18:32:58', '2017-06-15 18:32:58'),
(51, 'Scott Dawson', 'Raw', 'storage/superstars/scott_dawson.png', 3.5, 3, 985, 0, 'none', 1, '2017-06-15 18:33:06', '2017-06-15 18:33:06'),
(52, 'Seth Rollins', 'Raw', 'storage/superstars/seth_rollins.png', 2, 8.5, 965, 0, 'none', 1, '2017-06-15 18:33:20', '2017-06-15 18:33:20'),
(53, 'Sheamus', 'Raw', 'storage/superstars/sheamus.png', 0, 7.5, 1265, 1, 'Raw Tag Team Champion 2', 0, '2017-06-15 18:33:29', '2017-06-15 18:33:29'),
(54, 'Summer Rae', 'Raw', 'storage/superstars/summer_rae.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:33:40', '2017-06-15 18:33:40'),
(55, 'The Miz', 'Raw', 'storage/superstars/the_miz.png', 7, 5, 1535, 1, 'Intercontinental Champion', 1, '2017-06-15 18:33:52', '2017-06-15 18:33:52'),
(56, 'Titus O\'Neil', 'Raw', 'storage/superstars/titus_o_neil.png', 4, 1.7, 952, 0, 'none', 1, '2017-06-15 18:34:01', '2017-06-15 18:34:01'),
(57, 'TJP', 'Raw', 'storage/superstars/tjperkins.png', 0, 0, 910, 0, 'none', 0, '2017-06-15 18:34:09', '2017-06-15 18:34:09'),
(58, 'Tony Nese', 'Raw', 'storage/superstars/tony_nese.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:34:56', '2017-06-15 18:34:56'),
(59, 'Aiden English', 'Smackdown', 'storage/superstars/aiden_english.png', 0, 6, 770, 0, 'none', 0, '2017-06-15 18:35:27', '2017-06-15 18:35:27'),
(60, 'Aj Styles', 'Smackdown', 'storage/superstars/aj_styles.png', 0, 19.5, 1140, 0, 'none', 0, '2017-06-15 18:35:34', '2017-06-15 18:35:34'),
(61, 'Baron Corbin', 'Smackdown', 'storage/superstars/baron_corbin.png', 0, 16, 1290, 1, 'Mr. Money in the Bank', 0, '2017-06-15 18:35:45', '2017-06-15 18:35:45'),
(62, 'Becky Lynch', 'Smackdown', 'storage/superstars/becky_lynch.png', 0, 14, 1275, 0, 'none', 0, '2017-06-15 18:35:56', '2017-06-15 18:35:56'),
(63, 'Big E', 'Smackdown', 'storage/superstars/big_e.png', 0, 4.7, 717, 0, 'none', 0, '2017-06-15 18:36:04', '2017-06-15 18:36:04'),
(64, 'Carmella', 'Smackdown', 'storage/superstars/carmella.png', 0, 7, 1215, 1, 'Ms. Money in the Bank', 0, '2017-06-15 18:36:11', '2017-06-15 18:36:11'),
(65, 'Chad Gable', 'Smackdown', 'storage/superstars/chad_gable.png', 0, 3.5, 915, 0, 'none', 0, '2017-06-15 18:36:21', '2017-06-15 18:36:21'),
(66, 'Charlotte', 'Smackdown', 'storage/superstars/charlotte.png', 0, 7, 885, 0, 'none', 0, '2017-06-15 18:36:30', '2017-06-15 18:36:30'),
(67, 'Dolph Ziggler', 'Smackdown', 'storage/superstars/dolph_ziggler.png', 0, 5, 960, 0, 'none', 0, '2017-06-15 18:36:48', '2017-06-15 18:36:48'),
(68, 'Epico', 'Smackdown', 'storage/superstars/epico.png', 0, 5, 1050, 0, 'none', 0, '2017-06-15 18:37:05', '2017-06-15 18:37:05'),
(69, 'Erick Rowan', 'Smackdown', 'storage/superstars/erick_rowan.png', 0, 6.5, 1065, 0, 'none', 0, '2017-06-15 18:37:15', '2017-06-15 18:37:15'),
(70, 'Eva Marie', 'Smackdown', 'storage/superstars/eva_marie.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:37:32', '2017-06-15 18:37:32'),
(71, 'Fandango', 'Smackdown', 'storage/superstars/fandango.png', 0, 6, 745, 0, 'none', 0, '2017-06-15 18:37:44', '2017-06-15 18:37:44'),
(72, 'Jason Jordan', 'Smackdown', 'storage/superstars/jason_jordan.png', 0, 5, 1050, 0, 'none', 0, '2017-06-15 18:37:57', '2017-06-15 18:37:57'),
(73, 'Jey Uso', 'Smackdown', 'storage/superstars/jey_uso.png', 0, 12, 1240, 1, 'Smackdown Tag Team Champion 1', 0, '2017-06-15 18:38:06', '2017-06-15 18:38:06'),
(74, 'Jimmy Uso', 'Smackdown', 'storage/superstars/jimmy_uso.png', 0, 12, 1145, 1, 'Smackdown Tag Team Champion 2', 0, '2017-06-15 18:38:17', '2017-06-15 18:38:17'),
(75, 'Jinder Mahal', 'Smackdown', 'storage/superstars/jinder_mahal.png', 0, 19, 1340, 1, 'WWE Champion', 0, '2017-06-15 18:38:28', '2017-06-15 18:38:28'),
(76, 'John Cena', 'Smackdown', 'storage/superstars/john_cena.png', 0, 10.5, 925, 0, 'none', 0, '2017-06-15 18:38:45', '2017-06-15 18:38:45'),
(77, 'Chris Jericho', 'Smackdown', 'storage/superstars/chris_jericho.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:39:00', '2017-06-15 18:39:00'),
(78, 'Kane', 'Smackdown', 'storage/superstars/kane.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:39:12', '2017-06-15 18:39:12'),
(79, 'Kevin Owens', 'Smackdown', 'storage/superstars/kevin_owens.png', 0, 16, 1320, 1, 'United States Champion', 0, '2017-06-15 18:39:22', '2017-06-15 18:39:22'),
(80, 'Kofi Kingston', 'Smackdown', 'storage/superstars/kofi_kingston.png', 0, 7, 625, 0, 'none', 0, '2017-06-15 18:39:35', '2017-06-15 18:39:35'),
(81, 'Konnor', 'Smackdown', 'storage/superstars/konnor.png', 0, 6.5, 880, 0, 'none', 0, '2017-06-15 18:39:46', '2017-06-15 18:39:46'),
(82, 'Lana', 'Smackdown', 'storage/superstars/lana.png', 0, 10.5, 870, 0, 'none', 0, '2017-06-15 18:39:55', '2017-06-15 18:39:55'),
(83, 'Luke Harper', 'Smackdown', 'storage/superstars/luke_harper.png', 0, 6, 1090, 0, 'none', 0, '2017-06-15 18:40:09', '2017-06-15 18:40:09'),
(84, 'Mojo Rawley', 'Smackdown', 'storage/superstars/mojo_rawley.png', 0, 2, 840, 0, 'none', 0, '2017-06-15 18:40:23', '2017-06-15 18:40:23'),
(85, 'Naomi', 'Smackdown', 'storage/superstars/naomi.png', 0, 10, 1305, 1, 'Smackdown Women\'s Champion', 0, '2017-06-15 18:40:33', '2017-06-15 18:40:33'),
(86, 'Natalya', 'Smackdown', 'storage/superstars/natalya.png', 0, 11, 1125, 0, 'none', 0, '2017-06-15 18:40:41', '2017-06-15 18:40:41'),
(87, 'Nikki Bella', 'Smackdown', 'storage/superstars/nikki_bella.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:40:53', '2017-06-15 18:40:53'),
(88, 'Primo', 'Smackdown', 'storage/superstars/primo.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:41:02', '2017-06-15 18:41:02'),
(89, 'Randy Orton', 'Smackdown', 'storage/superstars/randy_orton.png', 0, 12.5, 975, 0, 'none', 0, '2017-06-15 18:41:12', '2017-06-15 18:41:12'),
(90, 'Rusev', 'Smackdown', 'storage/superstars/rusev.png', 0, 10.5, 915, 0, 'none', 0, '2017-06-15 18:41:21', '2017-06-15 18:41:21'),
(91, 'Sami Zayn', 'Smackdown', 'storage/superstars/sami_zayn.png', 0, 4, 750, 0, 'none', 0, '2017-06-15 18:41:30', '2017-06-15 18:41:30'),
(92, 'Shinsuke Nakamura', 'Smackdown', 'storage/superstars/shinsuke_nakamura.png', 0, 9, 760, 0, 'none', 0, '2017-06-15 18:41:46', '2017-06-15 18:41:46'),
(93, 'Sin Cara', 'Smackdown', 'storage/superstars/sin_cara.png', 0, 5, 1050, 0, 'none', 0, '2017-06-15 18:41:55', '2017-06-15 18:41:55'),
(94, 'Tamina', 'Smackdown', 'storage/superstars/tamina.png', 0, 11.5, 1090, 0, 'none', 0, '2017-06-15 18:42:05', '2017-06-15 18:42:05'),
(95, 'Tye Dillinger', 'Smackdown', 'storage/superstars/tye_dillinger.png', 0, 2, 890, 0, 'none', 0, '2017-06-15 18:42:16', '2017-06-15 18:42:16'),
(96, 'Tyler Breeze', 'Smackdown', 'storage/superstars/tyler_breeze.png', 0, 6, 745, 0, 'none', 0, '2017-06-15 18:42:28', '2017-06-15 18:42:28'),
(97, 'Viktor', 'Smackdown', 'storage/superstars/viktor.png', 0, 6.5, 880, 0, 'none', 0, '2017-06-15 18:42:38', '2017-06-15 18:42:38'),
(98, 'Xavier Woods', 'Smackdown', 'storage/superstars/xavier_woods.png', 0, 9, 745, 0, 'none', 0, '2017-06-15 18:42:47', '2017-06-15 18:42:47'),
(99, 'Zack Ryder', 'Smackdown', 'storage/superstars/zack_ryder.png', 0, 1.5, 815, 0, 'none', 0, '2017-06-15 18:43:00', '2017-06-15 18:43:00'),
(996, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 0, 'none', 0, NULL, NULL),
(997, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 0, 'none', 0, NULL, NULL),
(998, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 0, 'none', 0, NULL, NULL),
(999, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 0, 'none', 0, NULL, NULL),
(1000, 'Maria', 'Smackdown', 'storage/superstars/maria.png', 0.5, 0, 650, 0, 'none', 1, '2017-07-05 20:55:54', '2017-07-05 20:55:54'),
(1001, 'Mike Kanellis', 'Smackdown', 'storage/superstars/mike_kanellis.png', 1, 0, 940, 0, 'none', 1, '2017-07-19 16:58:07', '2017-07-19 16:58:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/users/papa-shango.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_power` int(11) NOT NULL DEFAULT '0',
  `id_league` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `photo`, `name`, `email`, `password`, `remember_token`, `user_power`, `id_league`, `type`, `created_at`, `updated_at`) VALUES
(1, 'storage/users/papa-shango.png', 'bot1', 'bot1@123.com.br', '$2y$10$Q15KGny.onqXwp1K0eDIYOTU/PMdq8U.fM8UGjYgfTAzUejqPufO6', '6BkA2SJC5Xws8oXycCOgRc5PlSHdDXUzF3APIEHfuwXBPWhbPaj5HbEG8KOW', 0, 1, 'Free', '2017-06-27 19:25:28', '2017-06-27 19:25:28'),
(2, 'storage/users/papa-shango.png', 'bot2', 'bot2@123.com.br', '$2y$10$tvYDssKKAV6ze5Xqzfa/POOJojdmAOic4oavteZCJamykmahWTYd6', '7iQKEwGpfPGZ6bQEM9sJ4AEhjCvT7gn916razn3JjE4ajebwkXUtBuOJbndc', 0, 1, 'Free', '2017-06-27 19:25:42', '2017-06-27 19:25:42'),
(3, 'storage/users/papa-shango.png', 'bot3', 'bot3@123.com.br', '$2y$10$PGvJO8tqMN82mAaFThlGU./WRjxqf6O.GQt8l0VnoZI0ljHH/Bq1W', 'IV6rPlQuXHMd4SSdHBy1ebiQZWWJnHAykgUxMvJ6ACRlcQaSfD7mmENR2eG1', 0, 1, 'Free', '2017-06-27 19:25:56', '2017-06-27 19:25:56'),
(4, 'storage/users/papa-shango.png', 'bot4', 'bot4@123.com.br', '$2y$10$xYeoJdeqA9j4H29OpQtU4OXuCo3XfRjACjnzUxxLF/X3WtVAAOFHy', 'B42exNVpuGpJ8dSKF3834oDNyChnnDhlZIzR4I6tGmcS9RsvtRqCLiTmNkML', 0, 1, 'Free', '2017-06-27 19:26:23', '2017-06-27 19:26:23'),
(5, 'storage/users/papa-shango.png', 'bot5', 'bot5@123.com.br', '$2y$10$tcJknQ8ePxK/ZSCtTkHEtegGR6xfJJGnmu2U/Y0QnYlceBYHdjRsW', 'Pvr50XVPeUPDRJgZEUKQSKQtCmQOtIlNNiAfZHnfvChHfiQQnD7Eg7k01Ly9', 0, 1, 'Free', '2017-06-27 19:26:37', '2017-06-27 19:26:37'),
(6, 'storage/users/hulk-hogan.png', 'Luan Luz', 'luanluzpereira@hotmail.com', '$2y$10$J3LFtbGt9SQIfPQ0oTT8..fK.rRPOZFCwYQ3wak/a9ib4TCNj.5Cy', 'LArMY4WX4ydJhK538U2OhTyZxSjDOJ6cbqkV1SnUNfXqmUhwWLIZolfa5S41', 1, 2, 'Premium', '2017-06-27 19:26:52', '2017-06-27 19:26:52'),
(7, 'storage/users/razor-ramon.png', 'Rodolfo Alves', 'rodolfoalvesmdo@gmail.com', '$2y$10$vhbnj.WsbGgZ61kMVn2xje14Y5PANtLCIDhwH0WnNJHX7MNtXtW5W', 'JCeQnSUCyYSPdMl5KaobMQYWzVsT8owZ954IdIjgdmx6RdNNpuvHBMBQ7Uys', 1, 2, 'Premium', '2017-06-27 19:42:14', '2017-06-27 19:42:14'),
(8, 'storage/users/papa-shango.png', 'Arthur Alves', 'tutu@123.com', '$2y$10$JP7iIsB.r.U9d8Q8b/NfFOIaX3va/yxRzopz7bjujSxYU5bdZBw5K', 'o3g8lLdvUiXa0AWiWwFQjHjMGiFi1iTkmGogNho1eZOxsANTj4ZGBoWxxPFn', 1, 1, 'Free', '2017-06-27 21:37:37', '2017-06-27 21:37:37'),
(9, 'storage/users/papa-shango.png', 'Silvânio Holanda', 'silv@123.com', '$2y$10$PvllzsGLTCuLuf0CbrkQg.CNkN.StpBDXgEFZNEEty.gdk8W4Lzzq', 'QotNFFuel6Kr4MSzuRNfP4yzZLuVjkS2zK4XWKbJJ7Aq316cc1sTP8FSQ2Su', 1, 1, 'Free', '2017-06-27 21:37:55', '2017-06-27 21:37:55'),
(10, 'storage/users/papa-shango.png', 'Melquesedeque Gomes', 'melque@123.com', '$2y$10$.oGqWFqWJACJO/ecblf5D.2xAlmFkbmiOXemNh03TllENxrvAazs.', 'NI7toSxZPQ3mlbBywTvTs5W8rYLTM7g4HU27kVNac2AbS8wEH8DO4n72QdI7', 1, 1, 'Free', '2017-06-27 21:38:10', '2017-06-27 21:38:10'),
(11, 'storage/users/papa-shango.png', 'teste', 'teste@hotmi.com', '$2y$10$AkWeOJGdYX/96Gcdjc0lZehf1YJ7beSibuOhDQrLjOquUBdBdTBF2', 'C8ORbXAHgKW9V4kJYnS3MSMjWGPmwUVaYORm8003CYR06MZ5OVSPXzV7aRgD', 0, 1, 'Free', '2017-06-29 01:45:33', '2017-06-29 01:45:33'),
(12, 'storage/users/papa-shango.png', 'teste1', 'test1e@hotmi.com', '$2y$10$HfA82p5TZZ6ASnlAGEUhP.d9eZGwlK09fz0WINgUJXSgEdnoTVJtO', '1USVjp46islhbvRxyJIgY7lnU2SjFWaUcAAdEwRbW6vJVkeFZDQeDOEWaQXa', 0, 1, 'Free', '2017-06-29 01:46:02', '2017-06-29 01:46:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leagues_league_name_unique` (`league_name`),
  ADD KEY `owner` (`owner`),
  ADD KEY `member1` (`member1`),
  ADD KEY `member2` (`member2`),
  ADD KEY `member4` (`member4`),
  ADD KEY `member3` (`member3`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ppv_teams`
--
ALTER TABLE `ppv_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppv_teams_user_id_foreign` (`user_id`),
  ADD KEY `ppv_teams_superstar01_foreign` (`superstar01`),
  ADD KEY `ppv_teams_superstar02_foreign` (`superstar02`),
  ADD KEY `ppv_teams_superstar03_foreign` (`superstar03`),
  ADD KEY `ppv_teams_superstar04_foreign` (`superstar04`);

--
-- Indexes for table `raw_teams`
--
ALTER TABLE `raw_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_teams_user_id_foreign` (`user_id`),
  ADD KEY `raw_teams_superstar01_foreign` (`superstar01`),
  ADD KEY `raw_teams_superstar02_foreign` (`superstar02`),
  ADD KEY `raw_teams_superstar03_foreign` (`superstar03`),
  ADD KEY `raw_teams_superstar04_foreign` (`superstar04`);

--
-- Indexes for table `smackdown_teams`
--
ALTER TABLE `smackdown_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smackdown_teams_user_id_foreign` (`user_id`),
  ADD KEY `smackdown_teams_superstar01_foreign` (`superstar01`),
  ADD KEY `smackdown_teams_superstar02_foreign` (`superstar02`),
  ADD KEY `smackdown_teams_superstar03_foreign` (`superstar03`),
  ADD KEY `smackdown_teams_superstar04_foreign` (`superstar04`);

--
-- Indexes for table `superstars`
--
ALTER TABLE `superstars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_league_foreign` (`id_league`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ppv_teams`
--
ALTER TABLE `ppv_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `raw_teams`
--
ALTER TABLE `raw_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `smackdown_teams`
--
ALTER TABLE `smackdown_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `superstars`
--
ALTER TABLE `superstars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `leagues`
--
ALTER TABLE `leagues`
  ADD CONSTRAINT `leagues_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leagues_ibfk_2` FOREIGN KEY (`member1`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leagues_ibfk_3` FOREIGN KEY (`member2`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leagues_ibfk_4` FOREIGN KEY (`member3`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leagues_ibfk_5` FOREIGN KEY (`member4`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ppv_teams`
--
ALTER TABLE `ppv_teams`
  ADD CONSTRAINT `ppv_teams_superstar01_foreign` FOREIGN KEY (`superstar01`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `ppv_teams_superstar02_foreign` FOREIGN KEY (`superstar02`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `ppv_teams_superstar03_foreign` FOREIGN KEY (`superstar03`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `ppv_teams_superstar04_foreign` FOREIGN KEY (`superstar04`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `ppv_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `raw_teams`
--
ALTER TABLE `raw_teams`
  ADD CONSTRAINT `raw_teams_superstar01_foreign` FOREIGN KEY (`superstar01`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `raw_teams_superstar02_foreign` FOREIGN KEY (`superstar02`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `raw_teams_superstar03_foreign` FOREIGN KEY (`superstar03`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `raw_teams_superstar04_foreign` FOREIGN KEY (`superstar04`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `raw_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `smackdown_teams`
--
ALTER TABLE `smackdown_teams`
  ADD CONSTRAINT `smackdown_teams_superstar01_foreign` FOREIGN KEY (`superstar01`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `smackdown_teams_superstar02_foreign` FOREIGN KEY (`superstar02`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `smackdown_teams_superstar03_foreign` FOREIGN KEY (`superstar03`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `smackdown_teams_superstar04_foreign` FOREIGN KEY (`superstar04`) REFERENCES `superstars` (`id`),
  ADD CONSTRAINT `smackdown_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_league_foreign` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
