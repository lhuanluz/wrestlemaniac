-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2017 às 02:05
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
(117, 'Zack Ryder', 2, 25, 'storage/icons/zack_ryder.png', '2017-11-12 15:08:46', '2017-11-16 18:15:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Mail\\\\NewUserVerify\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:22:\\\"App\\\\Mail\\\\NewUserVerify\\\":17:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:440;}s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"luanluzpereira@hotmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1510401461, 1510401461),
(2, 'default', '{\"displayName\":\"App\\\\Mail\\\\NewUserVerify\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:22:\\\"App\\\\Mail\\\\NewUserVerify\\\":17:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:441;}s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:17:\\\"carai@hotmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1510490332, 1510490332),
(3, 'default', '{\"displayName\":\"App\\\\Mail\\\\NewUserVerify\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":3:{s:8:\\\"mailable\\\";O:22:\\\"App\\\\Mail\\\\NewUserVerify\\\":17:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:442;}s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:17:\\\"testetete@123.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:11:\\\"\\u0000*\\u0000markdown\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;}\"}}', 0, NULL, 1510880636, 1510880636);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `leagues`
--

INSERT INTO `leagues` (`id`, `league_name`, `secret_password`, `league_points`, `owner`, `created_at`, `updated_at`) VALUES
(1, 'None', '', 0, 1, '2017-06-27 19:24:54', '2017-06-27 19:24:54'),
(2, 'Undergrounder', '$2y$10$Pwl4bRTMJv2yavkIF79JXORoosA18TMLdKao/rdZjyO2n3uIekrmO', 149.06, 6, '2017-07-23 09:08:58', '2017-07-23 09:08:58'),
(3, 'Cesmac', '$2y$10$S67apZK9bSMuE2OkSbVdxeLoeg47kSOqVJyL5qou/ZkJYVS5Ypvoq', 0, 1, '2017-08-16 04:39:28', '2017-08-16 04:39:28'),
(4, 'shail', '$2y$10$0x3STNjFGgRvI.wKUuZ3/ezfSP6bVxERVxA6Yj0RzvWEzNj2TC1Qq', 0, 38, '2017-08-20 04:24:58', '2017-08-20 04:24:58'),
(5, 'House of Wrestling', '$2y$10$OGAf9VxUSQlHr51uA3hgeeKvGN3d6hqLVpFf415EXgK6guESrxfCu', 0, 1, '2017-08-20 19:50:48', '2017-08-20 19:50:48'),
(6, 'HOW Champions Ligue', '$2y$10$11sUckp3W7Xw/QBDPv5tb.uVUfCs92H5u6IU4wPh1g5lf45cLaE4O', 0, 1, '2017-08-20 21:56:23', '2017-08-20 21:56:23'),
(7, 'HOWrestling', '$2y$10$hJ2tyeluDyOa4ZnLvaQ1aOEdecwdCmPw8tpeFscMwQxTA8JYj6.AG', 0, 1, '2017-08-20 22:19:19', '2017-08-20 22:19:19'),
(8, 'The Shield', '$2y$10$4H9FCvb0TlleRaWpHJjaD.OlbMZVEXOwq9MquQ3sL.TaRtD6mTdeu', 0, 1, '2017-08-20 22:20:28', '2017-08-20 22:20:28'),
(9, 'Puta merda', '$2y$10$8IqkvhXlScgXVp/7Z67LLesMhiJ..LqxUnKGSLVf.adC.zLZC5c3m', 0, 1, '2017-08-21 19:39:55', '2017-08-21 19:39:55'),
(10, 'HOWrestlingBR', '$2y$10$WGW6LVisCrFInTHOnnTouuNfiJu4cdPKotDog7OklZ.X.1IMMdB2O', 0, 1, '2017-08-20 22:20:59', '2017-08-20 22:20:59'),
(12, 'HouseOfWrestling', '$2y$10$OESwm3xzPk/szphIcNd.N.b330Bw1l2VmxB6qWgTcvO3CBZdESMay', 0, 1, '2017-08-20 22:28:27', '2017-08-20 22:28:27'),
(14, 'HOW League', '$2y$10$G.lrWL9fm/ev/mAr2EoiCueHQS00tDOWTtUqgvWRxMhYQBT6lHV1.', 111.85999999999999, 75, '2017-08-20 22:30:33', '2017-08-20 22:30:33'),
(15, 'League Of Champions', '$2y$10$ywoIv5xNneGcOqu3/xhauua9ELnxIlC7/dezw7sCAXfQUJebV8x46', 139.18, 78, '2017-08-20 22:39:04', '2017-08-20 22:39:04'),
(18, 'HOWrestlingB', '$2y$10$r3ys5CoF1pOQUrzcxl6AfOFpjmDOYP7Eepd0lOBaBHlWqHyawLwKy', 122.27999999999999, 67, '2017-08-20 22:40:14', '2017-08-20 22:40:14'),
(19, 'cleber', '$2y$10$HGVHEntUTtqkpRhvM61NVOuWAQ/DZdO5PNjTUrzRMHe62fRnNJbz.', 0, 1, '2017-08-20 22:45:26', '2017-08-20 22:45:26'),
(21, 'Team HOW', '$2y$10$alVSMFfOfmyqo8NzKjbmSejDUaAMCwDQIzOdPbHcH373qyCoMrOIC', 86.9, 50, '2017-08-20 23:39:20', '2017-08-20 23:39:20'),
(22, 'impact', '$2y$10$/Bg3aEF3J2AUJreOixnwjedrJlkt4l3.0vGL8OPM9NyDEilw6JRki', 0, 1, '2017-08-20 23:54:33', '2017-08-20 23:54:33'),
(23, 'Portuga Freestyle', '$2y$10$vYD9EfRSY8o8W2UNq5K6duXnpWEaQGpWIh/s9zdcwu232nL7ByE5K', 0, 1, '2017-08-20 23:58:24', '2017-08-20 23:58:24'),
(27, 'ComunidadeHP', '$2y$10$Vk7wdPE5mADVdIzDUYp7IulpdhkE/0ubu/5bv2Aeiru8D9/tk45Zm', 168, 141, '2017-08-21 00:17:49', '2017-08-21 00:17:49'),
(30, 'os mitos', '$2y$10$3mN9Es6nTwX/WZW3Z.7oDe/sw17uqkuQcpJ/DmgAJlSi3E1poyNoe', 163.2, 145, '2017-08-21 00:25:20', '2017-08-21 00:25:20'),
(33, 'DEAN FAN BOY', '$2y$10$T2cTgGt0qZaw.hADWt52qeiSxCPk/0BiGqY8dW9.iaCnD5j.SdQ3u', 111.9, 183, '2017-08-21 02:04:32', '2017-08-21 02:04:32'),
(35, 'HOW', '$2y$10$HzcbjMm8a5UK1CeLqf0C1eTGT9qHtqyHDngODC2cJ7hjgCyERDS2u', 141.05, 217, '2017-08-21 07:36:53', '2017-08-21 07:36:53'),
(36, 'Piru', '$2y$10$GKNp3QMSN/xuOMCt434tWeFBSDU5wBstHyasfYNFAz2MuRdU6ynXu', 0, 1, '2017-08-21 19:41:57', '2017-08-21 19:41:57'),
(37, 'Kings', '$2y$10$HTqEpuPrXBqDqXzeNFHhP.Aj6QPY.NSJ0VvGyfWjQlAbTNY1PSeVu', 72.2, 278, '2017-08-22 10:16:24', '2017-08-22 10:16:24'),
(38, 'joao', '$2y$10$fN1NdMFsTUXgq7ijkePbF.95VGnf6r.MZdKFyLUa1lsUIyAxN/cSS', 138, 100, '2017-08-23 00:10:34', '2017-08-23 00:10:34'),
(39, 'alexandre fernandes', '$2y$10$qEFj2Sz/O9dS8B6PvFR7JuA/mB3ROmdr.oXoGXNooxJqf1J7QZWtq', 29.5, 314, '2017-08-23 03:28:34', '2017-08-23 03:28:34'),
(40, 'Lllllll', '$2y$10$ywTO1.VKUxLYyaNProKace7XlMdRVn0HfdW9o/JDXggNXCZamDkzm', 0, 1, '2017-08-23 05:15:00', '2017-08-23 05:15:00'),
(41, 'Raw', '$2y$10$VhgvzrfCih3kaOmU7aIuv.5vkN41A4KWbWbAiafCbvS5YYhwavcl6', 59.75, 1, '2017-08-23 07:46:36', '2017-08-23 07:46:36'),
(42, 'Jurisctio', '$2y$10$nplOMYs1mGnnkjZJy8Y/v.OY9/egb3yNyuKjAddl9yY7wfQQAMxCy', 83.3, 327, '2017-08-24 03:48:38', '2017-08-24 03:48:38'),
(43, 'Diamond Dogs', '$2y$10$AxjSgVNja4t5GKdHg8lsbuhRmXrXMDPKXDd1ISD9ZmyYfa/t218G2', 113.8, 305, '2017-08-27 05:36:20', '2017-08-27 05:36:20'),
(44, 'geomangp@gmail.com', '$2y$10$2rME.S58E0j4sULPDLgf7emI1N68FkdqLO9Gs4ZtRSor7uegWLgc6', 0, 1, '2017-08-28 00:31:52', '2017-08-28 00:31:52'),
(45, 'Giants in hell', '$2y$10$VMGWvhegv.xxhEO.P7FWYuVXzHAuV/Z.euTfPAv7Z3Sm49nYdrmrS', 60.7, 367, '2017-08-28 00:33:34', '2017-08-28 00:33:34'),
(46, 'The Anarchists', '$2y$10$eCYsbFBpyAD.HOiLitvY9ORJIVKZ3.GnjoS9dCR8smU3unAeQfoiS', 89.9, 360, '2017-08-29 15:55:54', '2017-08-29 15:55:54'),
(47, 'UndertakerMania', '$2y$10$RT80pv4xckxHUss2nxzijOI0smwI0XVq9.E5yo7roevCmL32b4IQS', 129.60000000000002, 226, '2017-08-29 17:25:35', '2017-08-29 17:25:35'),
(48, 'Gang', '$2y$10$oh5JahDl3R44Uq/a7zZccuhZHNQURCL2/Mq6JAbIbbGZcB9L7knKq', 112.2, 90, '2017-08-30 20:31:26', '2017-08-30 20:31:26'),
(52, 'domination', '$2y$10$KxdYH.XU7KU3cJ5NUdi32edbjc8UgyjBentqq3/wyYhmqZuPiMyuu', 0, 1, '2017-08-31 23:58:55', '2017-08-31 23:58:55'),
(53, 'KAS', '$2y$10$nKilnUEXtOFCyCQFTwD1FeOmHH84Id/C4iCy2rpCs.JA6URyo9.aK', 118.1, 304, '2017-09-05 15:44:45', '2017-09-05 15:44:45'),
(54, 'Grounder', '$2y$10$u36zaNg5mkwTIMUPrdnWV.7aAACveBpmP5Dvw.EPN9Ykc65JTkQZy', 0, 440, '2017-11-11 16:11:16', '2017-11-11 16:11:16');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `league_notifications`
--

CREATE TABLE `league_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_league` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, '2017_06_25_022811_create_ppv_teams_table', 1),
(9, '2017_09_23_184621_create_jobs_table', 2),
(10, '2017_09_23_184827_Email', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(419, 419, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:35:17', '2017-09-23 22:35:17'),
(420, 420, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:37:27', '2017-09-23 22:37:27'),
(421, 421, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:38:34', '2017-09-23 22:38:34'),
(422, 422, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:41:19', '2017-09-23 22:41:19'),
(423, 423, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:17:32', '2017-09-23 23:17:32'),
(424, 424, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:21:42', '2017-09-23 23:21:42'),
(425, 425, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:27:27', '2017-09-23 23:27:27'),
(426, 426, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:29:51', '2017-09-23 23:29:51'),
(427, 427, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:32:21', '2017-09-23 23:32:21'),
(428, 428, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:35:39', '2017-09-23 23:35:39'),
(429, 429, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:36:50', '2017-09-23 23:36:50'),
(430, 430, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:38:11', '2017-09-23 23:38:11'),
(431, 431, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:39:42', '2017-09-23 23:39:42'),
(432, 432, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:41:33', '2017-09-23 23:41:33'),
(433, 433, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:45:45', '2017-09-23 23:45:45'),
(434, 434, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:12:53', '2017-09-26 07:12:53'),
(435, 435, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:15:48', '2017-09-26 07:15:48'),
(436, 436, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:19:26', '2017-09-26 07:19:26'),
(437, 437, 0, 0, 4000, 103, 102, 101, 100, '2017-09-29 22:43:37', '2017-09-29 22:43:37'),
(438, 438, 0, 0, 4000, 103, 102, 101, 100, '2017-10-01 06:18:11', '2017-10-01 06:18:11'),
(439, 439, 0, 0, 4000, 103, 102, 101, 100, '2017-10-01 06:20:46', '2017-10-01 06:20:46'),
(440, 440, 0, 0, 4000, 103, 102, 101, 100, '2017-11-11 13:57:41', '2017-11-11 13:57:41'),
(441, 441, 0, 0, 4000, 103, 102, 101, 100, '2017-11-12 14:38:51', '2017-11-12 14:38:51'),
(442, 442, 0, 0, 4000, 103, 102, 101, 100, '2017-11-17 03:03:55', '2017-11-17 03:03:55');

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
(419, 419, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:35:17', '2017-09-23 22:35:17'),
(420, 420, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:37:27', '2017-09-23 22:37:27'),
(421, 421, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:38:34', '2017-09-23 22:38:34'),
(422, 422, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:41:19', '2017-09-23 22:41:19'),
(423, 423, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:17:32', '2017-09-23 23:17:32'),
(424, 424, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:21:42', '2017-09-23 23:21:42'),
(425, 425, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:27:27', '2017-09-23 23:27:27'),
(426, 426, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:29:50', '2017-09-23 23:29:50'),
(427, 427, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:32:21', '2017-09-23 23:32:21'),
(428, 428, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:35:39', '2017-09-23 23:35:39'),
(429, 429, 0, 1001, 4000, 103, 102, 101, 100, '2017-09-23 23:36:49', '2017-09-23 23:36:49'),
(430, 430, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:38:11', '2017-09-23 23:38:11'),
(431, 431, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:39:42', '2017-09-23 23:39:42'),
(432, 432, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:41:33', '2017-09-23 23:41:33'),
(433, 433, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:45:45', '2017-09-23 23:45:45'),
(434, 434, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:12:53', '2017-09-26 07:12:53'),
(435, 435, 0, 1000, 4000, 103, 102, 101, 100, '2017-09-26 07:15:48', '2017-09-26 07:15:48'),
(436, 436, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:19:26', '2017-09-26 07:19:26'),
(437, 437, 0, 0, 4000, 103, 102, 101, 100, '2017-09-29 22:43:37', '2017-09-29 22:43:37'),
(438, 438, 0, 0, 4000, 103, 102, 101, 100, '2017-10-01 06:18:11', '2017-10-01 06:18:11'),
(439, 439, 0, 0, 4000, 103, 102, 101, 100, '2017-10-01 06:20:46', '2017-10-01 06:20:46'),
(440, 440, 0, 0, 3960, 103, 102, 101, 100, '2017-11-11 13:57:41', '2017-11-11 13:57:41'),
(441, 441, 0, 0, 4000, 103, 102, 101, 100, '2017-11-12 14:38:51', '2017-11-12 14:38:51'),
(442, 442, 0, 0, 4000, 103, 102, 101, 100, '2017-11-17 03:03:55', '2017-11-17 03:03:55');

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
(419, 419, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:35:17', '2017-09-23 22:35:17'),
(420, 420, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:37:27', '2017-09-23 22:37:27'),
(421, 421, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:38:34', '2017-09-23 22:38:34'),
(422, 422, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 22:41:19', '2017-09-23 22:41:19'),
(423, 423, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:17:32', '2017-09-23 23:17:32'),
(424, 424, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:21:42', '2017-09-23 23:21:42'),
(425, 425, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:27:27', '2017-09-23 23:27:27'),
(426, 426, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:29:50', '2017-09-23 23:29:50'),
(427, 427, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:32:21', '2017-09-23 23:32:21'),
(428, 428, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:35:39', '2017-09-23 23:35:39'),
(429, 429, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:36:50', '2017-09-23 23:36:50'),
(430, 430, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:38:11', '2017-09-23 23:38:11'),
(431, 431, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:39:42', '2017-09-23 23:39:42'),
(432, 432, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:41:33', '2017-09-23 23:41:33'),
(433, 433, 0, 0, 4000, 103, 102, 101, 100, '2017-09-23 23:45:45', '2017-09-23 23:45:45'),
(434, 434, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:12:53', '2017-09-26 07:12:53'),
(435, 435, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:15:48', '2017-09-26 07:15:48'),
(436, 436, 0, 0, 4000, 103, 102, 101, 100, '2017-09-26 07:19:26', '2017-09-26 07:19:26'),
(437, 437, 0, 0, 4000, 103, 102, 101, 100, '2017-09-29 22:43:37', '2017-09-29 22:43:37'),
(438, 438, 0, 0, 4000, 103, 102, 101, 100, '2017-10-01 06:18:11', '2017-10-01 06:18:11'),
(439, 439, 0, 1000, 4000, 103, 102, 101, 100, '2017-10-01 06:20:46', '2017-10-01 06:20:46'),
(440, 440, 0, 0, 4000, 103, 102, 101, 100, '2017-11-11 13:57:41', '2017-11-11 13:57:41'),
(441, 441, 0, 0, 4000, 103, 102, 101, 100, '2017-11-12 14:38:51', '2017-11-12 14:38:51'),
(442, 442, 0, 0, 4000, 103, 102, 101, 100, '2017-11-17 03:03:55', '2017-11-17 03:03:55');

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
(1, 'Akira Tozawa', 'Raw', 'storage/superstars/akira_tozawa.png', 0, 0, 911, 0, 'none', 0, '2017-06-15 18:21:55', '2017-06-15 18:21:55'),
(2, 'Alexa Bliss', 'Raw', 'storage/superstars/alexa_bliss.png', 0, 0, 1223, 1, 'Raw Women\'s Champion', 0, '2017-06-15 18:22:19', '2017-06-15 18:22:19'),
(3, 'Alicia Fox', 'Raw', 'storage/superstars/alicia_fox.png', 0, 0, 630, 0, 'none', 0, '2017-06-15 18:22:27', '2017-06-15 18:22:27'),
(4, 'Apollo Crews', 'Raw', 'storage/superstars/apollo_crews.png', 0, 0, 576, 0, 'none', 0, '2017-06-15 18:22:35', '2017-06-15 18:22:35'),
(5, 'Ariya Daivari', 'Raw', 'storage/superstars/ariya_daivari.png', 0, 0, 698, 0, 'none', 0, '2017-06-15 18:22:58', '2017-06-15 18:22:58'),
(6, 'Austin Aries', 'None', 'storage/superstars/austin_aries.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:23:07', '2017-06-15 18:23:07'),
(7, 'Bayley', 'Raw', 'storage/superstars/bayley.png', 0, 0, 652, 0, 'none', 0, '2017-06-15 18:23:20', '2017-06-15 18:23:20'),
(8, 'Big Show', 'Raw', 'storage/superstars/big_show.png', 0, 0, 521, 0, 'none', 0, '2017-06-15 18:23:28', '2017-06-15 18:23:28'),
(9, 'Bo Dallas', 'Raw', 'storage/superstars/bo_dallas.png', 0, 0, 887, 0, 'none', 0, '2017-06-15 18:23:38', '2017-06-15 18:23:38'),
(10, 'Braun Strowman', 'Raw', 'storage/superstars/braun_strowman.png', 0, 0, 1665, 0, 'none', 0, '2017-06-15 18:23:49', '2017-06-15 18:23:49'),
(11, 'Bray Wyatt', 'Raw', 'storage/superstars/bray_wyatt.png', 0, 0, 500, 0, 'none', 0, '2017-06-15 18:23:59', '2017-06-15 18:23:59'),
(12, 'Brian Kendrick', 'Raw', 'storage/superstars/brian_kendrick.png', 0, 0, 776, 0, 'none', 0, '2017-06-15 18:24:09', '2017-06-15 18:24:09'),
(13, 'Brock Lesnar', 'Raw', 'storage/superstars/brock_lesnar.png', 0, 0, 1146, 1, 'Raw Universal Champion', 0, '2017-06-15 18:24:50', '2017-06-15 18:24:50'),
(14, 'Cedric Alexander', 'Raw', 'storage/superstars/cedric_alexander.png', 0, 0, 875, 0, 'none', 0, '2017-06-15 18:25:08', '2017-06-15 18:25:08'),
(15, 'Cesaro', 'Raw', 'storage/superstars/cesaro.png', 0, 0, 1277, 0, 'none', 0, '2017-06-15 18:25:17', '2017-06-15 18:25:17'),
(16, 'Big Cass', 'Raw', 'storage/superstars/colin_cassady.png', 0, 0, 759, 0, 'none', 0, '2017-06-15 18:25:35', '2017-06-15 18:25:35'),
(17, 'Curt Hawkins', 'Raw', 'storage/superstars/curt_hawkins.png', 0, 0, 522, 0, 'none', 0, '2017-06-15 18:25:49', '2017-06-15 18:25:49'),
(18, 'Curtis Axel', 'Raw', 'storage/superstars/curtis_axel.png', 0, 0, 792, 0, 'none', 0, '2017-06-15 18:25:59', '2017-06-15 18:25:59'),
(19, 'Dana Brooke', 'Raw', 'storage/superstars/dana_brooke.png', 0, 0, 664, 0, 'none', 0, '2017-06-15 18:26:09', '2017-06-15 18:26:09'),
(20, 'Darren Young', 'Raw', 'storage/superstars/darren_young.png', 0, 0, 857, 0, 'none', 0, '2017-06-15 18:26:19', '2017-06-15 18:26:19'),
(21, 'Dash Wilder', 'Raw', 'storage/superstars/dash_wilder.png', 0, 0, 694, 0, 'none', 0, '2017-06-15 18:26:29', '2017-06-15 18:26:29'),
(22, 'Dean Ambrose', 'Raw', 'storage/superstars/dean_ambrose.png', 0, 0, 1256, 1, 'Raw Tag Team Champion 2', 0, '2017-06-15 18:26:39', '2017-06-15 18:26:39'),
(23, 'Drew Gulak', 'Raw', 'storage/superstars/drew_gulak.png', 0, 0, 630, 0, 'none', 0, '2017-06-15 18:26:50', '2017-06-15 18:26:50'),
(24, 'Elias Samson', 'Raw', 'storage/superstars/elias_samson.png', 0, 0, 811, 0, 'none', 0, '2017-06-15 18:26:59', '2017-06-15 18:26:59'),
(25, 'Emma', 'Raw', 'storage/superstars/emma.png', 0, 0, 560, 0, 'none', 0, '2017-06-15 18:27:07', '2017-06-15 18:27:07'),
(26, 'Enzo Amore', 'Raw', 'storage/superstars/enzo_amore.png', 0, 0, 512, 0, 'none', 0, '2017-06-15 18:27:14', '2017-06-15 18:27:14'),
(27, 'Finn Bálor', 'Raw', 'storage/superstars/finn_balor.png', 0, 0, 726, 0, 'none', 0, '2017-06-15 18:27:32', '2017-06-15 18:27:32'),
(28, 'Goldust', 'Raw', 'storage/superstars/goldust.png', 0, 0, 534, 0, 'none', 0, '2017-06-15 18:27:40', '2017-06-15 18:27:40'),
(29, 'Gran Metalik', 'Raw', 'storage/superstars/gran_metalik.png', 0, 0, 823, 0, 'none', 0, '2017-06-15 18:27:53', '2017-06-15 18:27:53'),
(30, 'Heath Slater', 'Raw', 'storage/superstars/heath_slater.png', 0, 0, 737, 0, 'none', 0, '2017-06-15 18:28:02', '2017-06-15 18:28:02'),
(31, 'Ho Ho Lun', 'None', 'storage/superstars/hoho_lun.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:28:27', '2017-06-15 18:28:27'),
(32, 'Jack Gallagher', 'Raw', 'storage/superstars/jack_gallagher.png', 0, 0, 793, 0, 'none', 0, '2017-06-15 18:28:40', '2017-06-15 18:28:40'),
(33, 'Jeff Hardy', 'Raw', 'storage/superstars/jeff_hardy.png', 0, 0, 703, 0, 'none', 0, '2017-06-15 18:28:47', '2017-06-15 18:28:47'),
(34, 'Kalisto', 'Raw', 'storage/superstars/kalisto.png', 0, 0, 670, 0, 'none', 0, '2017-06-15 18:29:15', '2017-06-15 18:29:15'),
(35, 'Karl Anderson', 'Raw', 'storage/superstars/karl_anderson.png', 0, 0, 785, 0, 'none', 0, '2017-06-15 18:29:24', '2017-06-15 18:29:24'),
(36, 'Lince Dorado', 'Raw', 'storage/superstars/lince_dorado.png', 0, 0, 776, 0, 'none', 0, '2017-06-15 18:29:35', '2017-06-15 18:29:35'),
(37, 'Luke Gallows', 'Raw', 'storage/superstars/luke_gallows.png', 0, 0, 806, 0, 'none', 0, '2017-06-15 18:29:44', '2017-06-15 18:29:44'),
(38, 'Mark Henry', 'Raw', 'storage/superstars/mark_henry.png', 0, 0, 857, 0, 'none', 0, '2017-06-15 18:29:53', '2017-06-15 18:29:53'),
(39, 'Matt Hardy', 'Raw', 'storage/superstars/matt_hardy.png', 0, 0, 592, 0, 'none', 0, '2017-06-15 18:30:11', '2017-06-15 18:30:11'),
(40, 'Mickie James', 'Raw', 'storage/superstars/mickie_james.png', 0, 0, 819, 0, 'none', 0, '2017-06-15 18:30:24', '2017-06-15 18:30:24'),
(41, 'Mustafa Ali', 'Raw', 'storage/superstars/mustafa_ali.png', 0, 0, 659, 0, 'none', 0, '2017-06-15 18:30:33', '2017-06-15 18:30:33'),
(42, 'Neville', 'Raw', 'storage/superstars/neville.png', 0, 0, 1272, 1, 'Cruiserweight Champion', 0, '2017-06-15 18:30:40', '2017-06-15 18:30:40'),
(43, 'Nia Jax', 'Raw', 'storage/superstars/nia_jax.png', 0, 0, 663, 0, 'none', 0, '2017-06-15 18:30:49', '2017-06-15 18:30:49'),
(44, 'Noam Dar', 'Raw', 'storage/superstars/noam_dar.png', 0, 0, 500, 0, 'none', 0, '2017-06-15 18:30:57', '2017-06-15 18:30:57'),
(45, 'R-Truth', 'Raw', 'storage/superstars/r_truth.png', 0, 0, 500, 0, 'none', 0, '2017-06-15 18:31:25', '2017-06-15 18:31:25'),
(46, 'Rhyno', 'Raw', 'storage/superstars/rhyno.png', 0, 0, 549, 0, 'none', 0, '2017-06-15 18:31:37', '2017-06-15 18:31:37'),
(47, 'Rich Swann', 'Raw', 'storage/superstars/rich_swann.png', 0, 0, 729, 0, 'none', 0, '2017-06-15 18:31:45', '2017-06-15 18:31:45'),
(48, 'Roman Reigns', 'Raw', 'storage/superstars/roman_reigns.png', 0, 0, 893, 0, 'none', 0, '2017-06-15 18:32:40', '2017-06-15 18:32:40'),
(49, 'Samoa Joe', 'Raw', 'storage/superstars/samoa_joe.png', 0, 0, 870, 0, 'none', 0, '2017-06-15 18:32:50', '2017-06-15 18:32:50'),
(50, 'Sasha Banks', 'Raw', 'storage/superstars/sasha_banks.png', 0, 0, 1223, 0, 'none', 0, '2017-06-15 18:32:58', '2017-06-15 18:32:58'),
(51, 'Scott Dawson', 'Raw', 'storage/superstars/scott_dawson.png', 0, 0, 797, 0, 'none', 0, '2017-06-15 18:33:06', '2017-06-15 18:33:06'),
(52, 'Seth Rollins', 'Raw', 'storage/superstars/seth_rollins.png', 0, 0, 1382, 1, 'Raw Tag Team Champion 1', 0, '2017-06-15 18:33:20', '2017-06-15 18:33:20'),
(53, 'Sheamus', 'Raw', 'storage/superstars/sheamus.png', 0, 0, 1318, 0, 'none', 0, '2017-06-15 18:33:29', '2017-06-15 18:33:29'),
(54, 'Summer Rae', 'Raw', 'storage/superstars/summer_rae.png', 0, 0, 857, 0, 'none', 0, '2017-06-15 18:33:40', '2017-06-15 18:33:40'),
(55, 'The Miz', 'Raw', 'storage/superstars/the_miz.png', 0, 0, 1756, 1, 'Intercontinental Champion', 0, '2017-06-15 18:33:52', '2017-06-15 18:33:52'),
(56, 'Titus O\'Neil', 'None', 'storage/superstars/titus_o_neil.png', 0, 1.5, 812, 0, 'none', 0, '2017-06-15 18:34:01', '2017-06-15 18:34:01'),
(57, 'TJP', 'Raw', 'storage/superstars/tjperkins.png', 0, 0, 698, 0, 'none', 0, '2017-06-15 18:34:09', '2017-06-15 18:34:09'),
(58, 'Tony Nese', 'Raw', 'storage/superstars/tony_nese.png', 0, 0, 630, 0, 'none', 0, '2017-06-15 18:34:56', '2017-06-15 18:34:56'),
(59, 'Aiden English', 'Smackdown', 'storage/superstars/aiden_english.png', 4, 4, 695, 0, 'none', 1, '2017-06-15 18:35:27', '2017-06-15 18:35:27'),
(60, 'Aj Styles', 'Smackdown', 'storage/superstars/aj_styles.png', 5.5, 10.5, 1730, 1, 'United States Champion', 1, '2017-06-15 18:35:34', '2017-06-15 18:35:34'),
(61, 'Baron Corbin', 'Smackdown', 'storage/superstars/baron_corbin.png', 3, 2, 1390, 0, 'none', 1, '2017-06-15 18:35:45', '2017-06-15 18:35:45'),
(62, 'Becky Lynch', 'Smackdown', 'storage/superstars/becky_lynch.png', 0, 2.5, 955, 0, 'none', 0, '2017-06-15 18:35:56', '2017-06-15 18:35:56'),
(63, 'Big E', 'Smackdown', 'storage/superstars/big_e.png', 2, 1.5, 594, 0, 'none', 1, '2017-06-15 18:36:04', '2017-06-15 18:36:04'),
(64, 'Carmella', 'Smackdown', 'storage/superstars/carmella.png', 8.5, 3, 1485, 1, 'Ms. Money in the Bank', 1, '2017-06-15 18:36:11', '2017-06-15 18:36:11'),
(65, 'Chad Gable', 'Smackdown', 'storage/superstars/chad_gable.png', 0, 2.5, 575, 0, 'none', 0, '2017-06-15 18:36:21', '2017-06-15 18:36:21'),
(66, 'Charlotte', 'Smackdown', 'storage/superstars/charlotte.png', 0, 3.5, 955, 0, 'none', 0, '2017-06-15 18:36:30', '2017-06-15 18:36:30'),
(67, 'Dolph Ziggler', 'Smackdown', 'storage/superstars/dolph_ziggler.png', 2, 2, 720, 0, 'none', 1, '2017-06-15 18:36:48', '2017-06-15 18:36:48'),
(68, 'Epico', 'Smackdown', 'storage/superstars/epico.png', 0, 0, 1050, 0, 'none', 0, '2017-06-15 18:37:05', '2017-06-15 18:37:05'),
(69, 'Erick Rowan', 'Smackdown', 'storage/superstars/erick_rowan.png', 0, 0, 1065, 0, 'none', 0, '2017-06-15 18:37:15', '2017-06-15 18:37:15'),
(70, 'Eva Marie', 'None', 'storage/superstars/eva_marie.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:37:32', '2017-06-15 18:37:32'),
(71, 'Fandango', 'Smackdown', 'storage/superstars/fandango.png', 0, 2, 500, 0, 'none', 0, '2017-06-15 18:37:44', '2017-06-15 18:37:44'),
(72, 'Jason Jordan', 'Raw', 'storage/superstars/jason_jordan.png', 0, 0, 792, 0, 'none', 0, '2017-06-15 18:37:57', '2017-06-15 18:37:57'),
(73, 'Jey Uso', 'Smackdown', 'storage/superstars/jey_uso.png', 4, 5.5, 1490, 1, 'Smackdown Tag Team Champion 2', 1, '2017-06-15 18:38:06', '2017-06-15 18:38:06'),
(74, 'Jimmy Uso', 'Smackdown', 'storage/superstars/jimmy_uso.png', 4, 4.5, 1280, 1, 'Smackdown Tag Team Champion 1', 1, '2017-06-15 18:38:17', '2017-06-15 18:38:17'),
(75, 'Jinder Mahal', 'Smackdown', 'storage/superstars/jinder_mahal.png', 4, 9.5, 1867, 1, 'WWE Champion', 1, '2017-06-15 18:38:28', '2017-06-15 18:38:28'),
(76, 'John Cena', 'Raw', 'storage/superstars/john_cena.png', 0, 0, 952, 0, 'none', 0, '2017-06-15 18:38:45', '2017-06-15 18:38:45'),
(77, 'Chris Jericho', 'Smackdown', 'storage/superstars/chris_jericho.png', 0, 7.5, 1075, 0, 'none', 0, '2017-06-15 18:39:00', '2017-06-15 18:39:00'),
(78, 'Kane', 'Smackdown', 'storage/superstars/kane.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:39:12', '2017-06-15 18:39:12'),
(79, 'Kevin Owens', 'Smackdown', 'storage/superstars/kevin_owens.png', 5, 3, 1545, 0, 'none', 1, '2017-06-15 18:39:22', '2017-06-15 18:39:22'),
(80, 'Kofi Kingston', 'Smackdown', 'storage/superstars/kofi_kingston.png', 2, 0.5, 500, 0, 'none', 1, '2017-06-15 18:39:35', '2017-06-15 18:39:35'),
(81, 'Konnor', 'Smackdown', 'storage/superstars/konnor.png', 0, 1.5, 625, 0, 'none', 0, '2017-06-15 18:39:46', '2017-06-15 18:39:46'),
(82, 'Lana', 'Smackdown', 'storage/superstars/lana.png', 0, 1.7, 500, 0, 'none', 0, '2017-06-15 18:39:55', '2017-06-15 18:39:55'),
(83, 'Luke Harper', 'Smackdown', 'storage/superstars/luke_harper.png', 0, 0, 1090, 0, 'none', 0, '2017-06-15 18:40:09', '2017-06-15 18:40:09'),
(84, 'Mojo Rawley', 'Smackdown', 'storage/superstars/mojo_rawley.png', 0, 1.5, 755, 0, 'none', 0, '2017-06-15 18:40:23', '2017-06-15 18:40:23'),
(85, 'Naomi', 'Smackdown', 'storage/superstars/naomi.png', 0, 1.5, 1450, 0, 'none', 0, '2017-06-15 18:40:33', '2017-06-15 18:40:33'),
(86, 'Natalya', 'Smackdown', 'storage/superstars/natalya.png', 5, 4, 1115, 1, 'Smackdown Women\'s Champion', 1, '2017-06-15 18:40:41', '2017-06-15 18:40:41'),
(87, 'Nikki Bella', 'Smackdown', 'storage/superstars/nikki_bella.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:40:53', '2017-06-15 18:40:53'),
(88, 'Primo', 'Smackdown', 'storage/superstars/primo.png', 0, 0, 1000, 0, 'none', 0, '2017-06-15 18:41:02', '2017-06-15 18:41:02'),
(89, 'Randy Orton', 'Smackdown', 'storage/superstars/randy_orton.png', 5, 7.5, 1260, 0, 'none', 1, '2017-06-15 18:41:12', '2017-06-15 18:41:12'),
(90, 'Rusev', 'Smackdown', 'storage/superstars/rusev.png', 0, 7.5, 1145, 0, 'none', 0, '2017-06-15 18:41:21', '2017-06-15 18:41:21'),
(91, 'Sami Zayn', 'Smackdown', 'storage/superstars/sami_zayn.png', 3, 1, 585, 0, 'none', 1, '2017-06-15 18:41:30', '2017-06-15 18:41:30'),
(92, 'Shinsuke Nakamura', 'Smackdown', 'storage/superstars/shinsuke_nakamura.png', 7, 5.5, 922, 0, 'none', 1, '2017-06-15 18:41:46', '2017-06-15 18:41:46'),
(93, 'Sin Cara', 'Smackdown', 'storage/superstars/sin_cara.png', 0, 0, 1050, 0, 'none', 0, '2017-06-15 18:41:55', '2017-06-15 18:41:55'),
(94, 'Tamina', 'Smackdown', 'storage/superstars/tamina.png', 0, 3.5, 800, 0, 'none', 0, '2017-06-15 18:42:05', '2017-06-15 18:42:05'),
(95, 'Tye Dillinger', 'Smackdown', 'storage/superstars/tye_dillinger.png', 3, 2.5, 670, 0, 'none', 1, '2017-06-15 18:42:16', '2017-06-15 18:42:16'),
(96, 'Tyler Breeze', 'Smackdown', 'storage/superstars/tyler_breeze.png', 0, 2, 500, 0, 'none', 0, '2017-06-15 18:42:28', '2017-06-15 18:42:28'),
(97, 'Viktor', 'Smackdown', 'storage/superstars/viktor.png', 0, 0.5, 615, 0, 'none', 0, '2017-06-15 18:42:38', '2017-06-15 18:42:38'),
(98, 'Xavier Woods', 'Smackdown', 'storage/superstars/xavier_woods.png', 2, 0.7, 632, 0, 'none', 1, '2017-06-15 18:42:47', '2017-06-15 18:42:47'),
(99, 'Zack Ryder', 'Smackdown', 'storage/superstars/zack_ryder.png', 0, 0.5, 720, 0, 'none', 0, '2017-06-15 18:43:00', '2017-06-15 18:43:00'),
(100, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 1, 'Mr. Money in the Bank', 0, NULL, NULL),
(101, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 1, 'Mr. Money in the Bank', 0, NULL, NULL),
(102, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 1, 'Mr. Money in the Bank', 0, NULL, NULL),
(103, 'None', 'Nenhuma', 'storage/superstars/nenhum.png', 0, 0, 0, 1, 'Mr. Money in the Bank', 0, NULL, NULL),
(104, 'Maria', 'Smackdown', 'storage/superstars/maria.png', 0, 0.5, 500, 0, 'none', 0, '2017-07-05 20:55:54', '2017-07-05 20:55:54'),
(105, 'Mike Kanellis', 'Smackdown', 'storage/superstars/mike_kanellis.png', 0, 1, 685, 0, 'none', 0, '2017-07-19 16:58:07', '2017-07-19 16:58:07'),
(106, 'Bobby Roode', 'Smackdown', 'storage/superstars/bobby_roode.png', 0, 3, 1080, 0, 'none', 0, '2017-08-22 04:00:00', NULL),
(107, 'Shelton Benjamin', 'Smackdown', 'storage/superstars/shelton_benjamin.png', 0, 3.5, 955, 0, 'none', 0, '2017-08-22 04:00:00', NULL),
(108, 'Paige', 'Raw', 'storage/superstars/paige.png', 0, 0, 857, 0, 'none', 0, NULL, NULL),
(109, 'Triple H', 'Raw', 'storage/superstars/triple_h.png', 0, 0, 857, 0, 'none', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'storage/users/papa-shango.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_power` int(11) NOT NULL DEFAULT '0',
  `role` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `id_league` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verifyCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `wc` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `password`, `remember_token`, `user_power`, `role`, `id_league`, `type`, `created_at`, `updated_at`, `verifyCode`, `verified`, `wc`) VALUES
(1, 'bot1', 'storage/icons/braun_strowman.png', 'bot1@123.com.br', '$2y$10$Q15KGny.onqXwp1K0eDIYOTU/PMdq8U.fM8UGjYgfTAzUejqPufO6', '6BkA2SJC5Xws8oXycCOgRc5PlSHdDXUzF3APIEHfuwXBPWhbPaj5HbEG8KOW', 0, NULL, 1, 'Free', '2017-06-27 22:25:28', '2017-06-27 22:25:28', NULL, 0, 50),
(2, 'bot2', 'storage/icons/braun_strowman.png', 'bot2@123.com.br', '$2y$10$tvYDssKKAV6ze5Xqzfa/POOJojdmAOic4oavteZCJamykmahWTYd6', '7iQKEwGpfPGZ6bQEM9sJ4AEhjCvT7gn916razn3JjE4ajebwkXUtBuOJbndc', 0, NULL, 1, 'Free', '2017-06-27 22:25:42', '2017-06-27 22:25:42', NULL, 0, 50),
(3, 'bot3', 'storage/icons/braun_strowman.png', 'bot3@123.com.br', '$2y$10$PGvJO8tqMN82mAaFThlGU./WRjxqf6O.GQt8l0VnoZI0ljHH/Bq1W', 'IV6rPlQuXHMd4SSdHBy1ebiQZWWJnHAykgUxMvJ6ACRlcQaSfD7mmENR2eG1', 0, NULL, 1, 'Free', '2017-06-27 22:25:56', '2017-06-27 22:25:56', NULL, 0, 50),
(4, 'bot4', 'storage/icons/braun_strowman.png', 'bot4@123.com.br', '$2y$10$xYeoJdeqA9j4H29OpQtU4OXuCo3XfRjACjnzUxxLF/X3WtVAAOFHy', 'B42exNVpuGpJ8dSKF3834oDNyChnnDhlZIzR4I6tGmcS9RsvtRqCLiTmNkML', 0, NULL, 1, 'Free', '2017-06-27 22:26:23', '2017-06-27 22:26:23', NULL, 0, 50),
(5, 'bot5', 'storage/icons/braun_strowman.png', 'bot5@123.com.br', '$2y$10$tcJknQ8ePxK/ZSCtTkHEtegGR6xfJJGnmu2U/Y0QnYlceBYHdjRsW', 'Pvr50XVPeUPDRJgZEUKQSKQtCmQOtIlNNiAfZHnfvChHfiQQnD7Eg7k01Ly9', 0, NULL, 1, 'Free', '2017-06-27 22:26:37', '2017-06-27 22:26:37', NULL, 0, 50),
(419, 'Arthur', 'storage/icons/braun_strowman.png', 'teste@teste2.com', '$2y$10$w6DTEWuNRSHlOREEab6yzen4Oiz/0OBmvWYusP/NOPv/N97pRDz5.', NULL, 0, NULL, 1, 'Free', '2017-09-23 22:35:17', '2017-09-23 22:35:17', 'dHVjYWFyaXphQGdtYWlsLmNvbQ==', 1, 50),
(420, 'Arthur', 'storage/icons/braun_strowman.png', 'teste@teste.com', '$2y$10$WNHWHVUqBEEGTq/xPLoQ0eucYg57mDPzelxZWGkBYLf7USAP1FhBm', NULL, 0, NULL, 1, 'Free', '2017-09-23 22:37:27', '2017-09-23 22:37:27', 'YXJ0aHVyYXJpemFAaG90bWFpbC5jb20=', 0, 50),
(421, 'Arthur', 'storage/icons/braun_strowman.png', 'tuciza@gmail.com', '$2y$10$lP3Akk1dZSlX/WX5aquEbeZiUS.k0sJINbdJFS0aj91m//yiN5hSe', NULL, 0, NULL, 1, 'Free', '2017-09-23 22:38:34', '2017-09-23 22:38:34', 'dHVjYWFyaXphQGdtYWlsLmNvbQ==', 0, 50),
(422, 'Becky Lynch', 'storage/icons/braun_strowman.png', 'ariza@gmail.com', '$2y$10$.uLlc.0GskqlMHhZaH36r.haP9q4DZDxtroTXsCYsoJo4DkWL/00i', '7Qyr1GcmH0G2LxoO3o17Lrq0hfceH5s1PhWV3kMzGbseG9CQViN0GkWaROwP', 0, NULL, 1, 'Free', '2017-09-23 22:41:19', '2017-09-23 22:41:19', 'dHVjYWFyaXphQGdtYWlsLmNvbQ==', 0, 50),
(423, 'Alexa Bliss', 'storage/icons/braun_strowman.png', 'tiza@gmail.com', '$2y$10$Jq3kFG/Ho/gLG4TllA2qTOOQjgqCvS0SPL2q5mCIU6mIxiPVNU7ri', 'X0y3zhpbJqqopccXs8kTIHUw0GGoPzjNqLUXjE2TRDyO3LzEU969IAHu7aj9', 0, NULL, 1, 'Free', '2017-09-23 23:17:32', '2017-09-23 23:17:32', 'dHVjYWFyaXphQGdtYWlsLmNvbQ==', 0, 50),
(424, 'Arthur', 'storage/icons/braun_strowman.png', 'tucaaa@gmail.com', '$2y$10$2pTIT9/kx07N24xKezhz3O04zXljwOSqf9RJoHOlmn5nfnVd1yZCi', '9SKnlWLjfvau7yWwQX2tmARNOKokSRWeg7OxFLELu0bWhDgaQS2wh4IVkf2M', 0, NULL, 1, 'Free', '2017-09-23 23:21:42', '2017-09-23 23:21:42', 'VWZmM0l0THVwREJBa1pxa3pNZmdpWklGZ1V2RUVIaXFxWkt3ZXk1dg==', 1, 50),
(425, 'Alexa Bliss', 'storage/icons/braun_strowman.png', 'za@hotmail.com', '$2y$10$feERhkQXLRsdCcqRnMYmUeVsn5DWYN7rViqjvViFupg7bZqTsCaLq', 'v7kRJtlbjh3MvySlcv16GpvKVZCgD3cXZAp1piNDURalUTWDSZDsO04E90CL', 0, NULL, 1, 'Free', '2017-09-23 23:27:27', '2017-09-23 23:27:27', 'bDRwb1h1Nzg1ekNid244VFRXNXZRVkh4MlR2cjVCOXpJSktWT3Q3UA==', 0, 50),
(426, 'Becky Lynch', 'storage/icons/braun_strowman.png', 'l.com', '$2y$10$ZVCSnyk38daTYfr7N69BmeNAg8YqzecG.BJmDJbJ1zO9lu1ucLo7K', 'op1ju8CsNDpuPPUDJmvTJ0UpC0tBPuhpAkDZLKfVZqZabgNxWWnOcHfR0UPj', 0, NULL, 1, 'Free', '2017-09-23 23:29:50', '2017-09-23 23:29:50', 'cVpOSHJvWW41c0NKWGFQUUlWV2NnUHhRWUVabUlQZE5LY3BiU3FQeg==', 0, 50),
(427, 'Arthur', 'storage/icons/braun_strowman.png', 'arth', '$2y$10$fBTIjY.ZeDuULHXXk5DzlOBb/n39qQJIewjB2RrHNqLEervbYIAfe', 'mLW2nr0GNGdVAPXBScjPu0l61H4UdPVsnMJSVlRuLdPdOlriQLvo2M8LxcV2', 0, NULL, 1, 'Free', '2017-09-23 23:32:21', '2017-09-23 23:32:21', 'UTdvbWxFT2dRZHBYd1RqVUZ6NzNQTzQwbE5mNG1lZnNGdVNKQllxTQ==', 0, 50),
(428, 'Arthur', 'storage/icons/braun_strowman.png', 'hotmail.com', '$2y$10$7c4xsg8e0BlzYunwSqZSbeI7F3S56WWHXSLyNlzK6b9DMEUGi77h6', 'g3mrQkkajfQrkFplFBanFNDXpnzWlc1a45vUe3tRHBYotl7zIzILatK28RyR', 0, NULL, 1, 'Free', '2017-09-23 23:35:39', '2017-09-23 23:35:39', 'WFpSR1dVRWMyY3paU0JmVmMzSllySnRDZnpJZmlFOFpvMnozRGE5Ug==', 0, 50),
(429, 'Arthur', 'storage/icons/braun_strowman.png', 'tuc@gmail.com', '$2y$10$ZyEqK4OSMhISTymCMSD38ujdxH8t9IrF3zn5XspmbjH09xJ8WLYLW', 'XoZnmXopIoQXsj2dMq8IJqQMX8ee2PysY19uJMLt8pvT58LNC41lENbfaZHR', 0, NULL, 1, 'Free', '2017-09-23 23:36:49', '2017-09-23 23:36:49', 'VVoxcnFvV0xIckREYkhCekQxT1lrQXFwVElhQnJaQ3VGVHZlb3FKUg==', 0, 50),
(430, 'Arthur', 'storage/icons/braun_strowman.png', 'otmail.com', '$2y$10$KVoob8gGUKireEfC/ThE6.EU42xzzX1jBXMB21lkRzA4ASy66tE2G', 'h05HuH3PCFettNy8xvHtCvmwllTL6dzpECDoG2ScawXuXRPm39iDvbjNlL5W', 0, NULL, 1, 'Free', '2017-09-23 23:38:11', '2017-09-23 23:38:11', 'YThNVEN5eEkyS0NQS1lwNnVPZ1Z3QWhyalBmMVVNTVd2U2Z5ZUV0aQ==', 0, 50),
(431, 'Becky Lynch', 'storage/icons/braun_strowman.png', 'arthutmail.com', '$2y$10$uEB1Zr.eupJoVw5B5hZaeuuDWZgadBG7nyT4T2LzD6Yy1a2KInEEy', '3uouKbhMJP8KZmEVNwFZhmXKX9UB20fjcVZ51olGBKl3fqU5VWWXtvBWBnHB', 0, NULL, 1, 'Free', '2017-09-23 23:39:42', '2017-09-23 23:39:42', 'WkJzU3g0eXFYOVlXZklUT0VPcnNUdzZWa0VLdkJqSnU3Y1ZXVUc3VA==', 0, 50),
(432, 'Arthur', 'storage/icons/braun_strowman.png', 'tucm', '$2y$10$jBqxvqmgC7CHCmdQqKsyderXoJeISiRjFTfI3UzkbnEeaZNeBCifm', 'cA9VW929DKILlkQFm4q6JiqqQA0PBvyfYjHWsye3Oj3tSkwDBd4c9Ag4UP26', 0, NULL, 1, 'Free', '2017-09-23 23:41:33', '2017-09-23 23:41:33', 'czY0ZDhBcjZSVmZSVEpNMVpZWFY5ZzdjUE9FWVZDT29QaVdEUFI1Wg==', 1, 50),
(433, 'Arthur', 'storage/icons/braun_strowman.png', 'tza@gmail.com', '$2y$10$chSUQf0w/cCMDPNjQtBLYOvGVrWWSInsPrgB7a/5xpzO3ArrnwJB6', 'hgbenbMxtAR9DDxj7bkHEk2D0po7pycvr58MafmLt7zFvUUgLEnmVGeOWGJ1', 0, NULL, 1, 'Free', '2017-09-23 23:45:45', '2017-09-23 23:45:45', NULL, 0, 50),
(434, 'Arthur', 'storage/icons/braun_strowman.png', 'com', '$2y$10$LVfL4RkHo4UIIaR2UEZqiu4q6EQIy13oqKZsX/QqzPOch4Lv2uHB.', 'jjqW2pkj9270YHsySPzgsToHSxfBDA6JpTJbTRCifJ8QTqoEEUV3IjUFI4Op', 0, NULL, 1, 'Free', '2017-09-26 07:12:53', '2017-09-26 07:12:53', 'Mjd4cjlCQzdBNE01VERxcU9DdHZQSG5NVlF2enY4TEtQemxqSFdFOQ==', 0, 50),
(435, 'Becky Lynch', 'storage/icons/braun_strowman.png', 'tuc', '$2y$10$6YA14j431AF7bSIr2eVcD.HzDXmx1QiSkC5b7nbBgn/mdqnDtMqz.', 'p2NpoDPpyJYF7ixxgVFHQm2CFZ246q4JhaJbddoVmgoWjGxScbaIwFC7kuFa', 0, NULL, 1, 'Free', '2017-09-26 07:15:48', '2017-09-26 07:15:48', NULL, 1, 50),
(436, 'Arthur', 'storage/icons/braun_strowman.png', 'pdo@email.com', '$2y$10$uG3oGyFpwoSm0ZqQ9BtdVOLU0ROFiZhR8pFMi2BT.WXu3BAYyOprm', 'IX7oehPRcHW6fGMoGdim2LeaUSrTFZUDRhh0XtBC4C9xv9QD71xLlPHFxrnX', 0, NULL, 1, 'Free', '2017-09-26 07:19:26', '2017-09-26 07:19:26', NULL, 1, 50),
(437, 'Arthur', 'storage/icons/braun_strowman.png', 'artom', '$2y$10$LFGnQbHWxoVef8EUw5rEqebVJ8Cp/smQTW4PcZfLZjiu5yJwc4UH2', NULL, 0, NULL, 1, 'Free', '2017-09-29 22:43:37', '2017-09-29 22:43:37', NULL, 0, 50),
(438, 'Arthur', 'storage/icons/braun_strowman.png', 'tucaasadsadsa', '$2y$10$mp.VaJ3ugT8ddhLUjYu71OPbqEhXcut5VsT9kkXaQa9ccXHD.F5H2', 'UdAmjS3srViM5wxex9VgiPGkub1AI3wfCD051IdusaKdpHhW5wsx8PoYHecS', 0, NULL, 1, 'Free', '2017-10-01 06:18:11', '2017-10-01 06:18:11', 'WENVWE9FYnNYTHhmbzl6eVRINXBUZVFTTE90ckcyUmJjVUZGb2RaZw==', 0, 50),
(439, 'Arthur', 'storage/icons/braun_strowman.png', 'tucaariza@gmail.com', '$2y$10$IDkqcRgSMX6DuchjoAt8M.HiqlBeL9Uv2nB9uymMJ1o5rolASRJVq', NULL, 3, NULL, 1, 'Free', '2017-10-01 06:20:46', '2017-10-01 06:20:46', 'RHdlWWhNQWg1N2lqNVh4ZkliQkJXbldaUW5zeno3Mm1SelFITlJibg==', 1, 50),
(440, 'Luan Luz', 'storage/icons/braun_strowman.png', 'luanluzpereira@hotmail.com', '$2y$10$ThIotS1yV98DK7yF/Q/qpuin7D45T7AIIUr82/TFzZbv3IpW4.P9.', 'C7BkO2WsEcT9nZ8TGI1ig2ukOFEWNxpk7FAiltVzGBXQJOoZZSKioeoZFag4', 3, NULL, 54, 'Free', '2017-11-11 13:57:41', '2017-11-11 13:57:41', 'OFpCTGJwQ2hmVko5bXpIeVlOSnhId3hCblpRUzR3cVhnYm8xSlhDZg==', 0, 52),
(441, 'carai', 'storage/icons/braun_strowman.png', 'carai@hotmail.com', '$2y$10$etNq5aK1DNdzR7tWRoakGOmjPen/cOajIAVSO8/46yj7Wys/qSLlm', '95YVNMHiqScDRSLq4Xm40h9Csa0VdMPcAJvwhPC8mRN1N72axVs9LvkJNCxd', 0, NULL, 1, 'Free', '2017-11-12 14:38:51', '2017-11-12 14:38:51', 'S2NnM1hvODl0aGRWTXZKZkg0ZjhUSmZWc015UGhYUjJTb2tRQ2Zkbg==', 0, 50),
(442, 'testete', 'storage/users/papa-shango.png', 'testetete@123.com', '$2y$10$bem4gQWYvSjoWGW/nl8bkuL6xC5Tm8cIoj4X6g2O7rAnkNIOC828u', NULL, 0, NULL, 1, 'Free', '2017-11-17 03:03:55', '2017-11-17 03:03:55', 'Z05JdTgxMUlqR1BieXRJc3hjdlVMb1VEbHU1cVJ2YldPbG41ZmlFZQ==', 0, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_belts`
--

CREATE TABLE `user_belts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `belt_name` varchar(100) NOT NULL,
  `days` int(11) NOT NULL,
  `belt_photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_belts`
--

INSERT INTO `user_belts` (`id`, `user_id`, `belt_name`, `days`, `belt_photo`) VALUES
(1, 1, 'Wrestlemaniac Raw Champion', 1, 'storage/belts/raw.png'),
(2, 1, 'Wrestlemaniac Smackdown Champion', 1, 'storage/belts/smackdown.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_belts_history`
--

CREATE TABLE `user_belts_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_belt` int(10) UNSIGNED NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_icons`
--

CREATE TABLE `user_icons` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `icon_id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leagues_league_name_unique` (`league_name`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `league_belts`
--
ALTER TABLE `league_belts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_league` (`id_league`);

--
-- Indexes for table `league_belts_history`
--
ALTER TABLE `league_belts_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_league` (`id_league`),
  ADD KEY `id_belt` (`id_belt`);

--
-- Indexes for table `league_notifications`
--
ALTER TABLE `league_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_league` (`id_league`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `user_belts`
--
ALTER TABLE `user_belts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_belts_history`
--
ALTER TABLE `user_belts_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_belt` (`id_belt`);

--
-- Indexes for table `user_icons`
--
ALTER TABLE `user_icons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`,`icon_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `icon_id` (`icon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `league_belts`
--
ALTER TABLE `league_belts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `league_belts_history`
--
ALTER TABLE `league_belts_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `league_notifications`
--
ALTER TABLE `league_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_teams`
--
ALTER TABLE `ppv_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `raw_teams`
--
ALTER TABLE `raw_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `smackdown_teams`
--
ALTER TABLE `smackdown_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `superstars`
--
ALTER TABLE `superstars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `user_belts`
--
ALTER TABLE `user_belts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_belts_history`
--
ALTER TABLE `user_belts_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_icons`
--
ALTER TABLE `user_icons`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `league_belts`
--
ALTER TABLE `league_belts`
  ADD CONSTRAINT `league_belts_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `league_belts_history`
--
ALTER TABLE `league_belts_history`
  ADD CONSTRAINT `league_belts_history_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `league_belts_history_ibfk_2` FOREIGN KEY (`id_belt`) REFERENCES `league_belts` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `league_notifications`
--
ALTER TABLE `league_notifications`
  ADD CONSTRAINT `league_notifications_ibfk_1` FOREIGN KEY (`id_league`) REFERENCES `leagues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `league_notifications_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Limitadores para a tabela `user_belts`
--
ALTER TABLE `user_belts`
  ADD CONSTRAINT `user_belts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `user_belts_history`
--
ALTER TABLE `user_belts_history`
  ADD CONSTRAINT `user_belts_history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_belts_history_ibfk_2` FOREIGN KEY (`id_belt`) REFERENCES `user_belts` (`id`);

--
-- Limitadores para a tabela `user_icons`
--
ALTER TABLE `user_icons`
  ADD CONSTRAINT `user_icons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_icons_ibfk_2` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
