-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2020 at 10:49 PM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saas_bubo`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id_ann` int(11) NOT NULL,
  `uuid` text NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `url` text DEFAULT NULL,
  `cover_img` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id_ann`, `uuid`, `id_company`, `title`, `content`, `url`, `cover_img`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, '908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 11, 'Batas Pengerjaan Ujian 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, '2020-05-12 06:36:49', 1, '2020-06-28 01:32:36', 1, NULL, NULL, 0),
(2, '90bcebd7-5053-40cb-a82a-92ab7af5b814', 11, 'Ujian ulang', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, '2020-06-05 18:34:10', 1, '2020-06-05 18:34:10', NULL, NULL, NULL, 0),
(4, '90d40a7f-3203-499f-97fc-58ca87067817', 11, 'Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', NULL, NULL, '2020-06-17 06:23:55', 1, '2020-06-17 06:59:40', NULL, '2020-06-17 06:59:40', 31, 1),
(5, '911e7520-6a35-4cc4-b9d6-df74ff2116f9', 21, 'Pengumuman Semua User', '<p>lorem ipsum</p>', NULL, NULL, '2020-07-24 14:13:21', 47, '2020-07-24 14:13:53', 47, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcement_notifiable`
--

CREATE TABLE `announcement_notifiable` (
  `id_notifiable` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_announcement` int(11) NOT NULL,
  `notify_to` varchar(15) NOT NULL,
  `notify_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement_notifiable`
--

INSERT INTO `announcement_notifiable` (`id_notifiable`, `id_company`, `id_announcement`, `notify_to`, `notify_type`) VALUES
(2, 11, 1, 'role', '3'),
(3, 11, 2, 'role', '3'),
(5, 21, 5, 'role', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `type_post` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_company`, `id_post`, `type_post`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(98, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2020-06-08 08:49:38', 30, '2020-06-08 08:49:38', NULL, NULL, NULL, 0),
(99, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>', '2020-06-08 18:25:55', 1, '2020-06-08 18:25:55', NULL, NULL, NULL, 0),
(100, 11, 1, 1, '<p>Lorem ipsum dolor sit amet,&nbsp;</p>', '2020-06-08 18:26:16', 30, '2020-06-08 18:26:16', NULL, NULL, NULL, 0),
(101, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>', '2020-06-08 18:26:27', 1, '2020-06-08 18:26:27', NULL, NULL, NULL, 0),
(102, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>', '2020-06-08 18:30:36', 33, '2020-06-08 18:30:36', NULL, NULL, NULL, 0),
(103, 11, 1, 1, '<p>Lorem ipsum dolor sit amet,&nbsp;</p>', '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54', NULL, NULL, NULL, 0),
(104, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>', '2020-06-09 01:50:33', 1, '2020-06-09 01:50:33', NULL, NULL, NULL, 0),
(105, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>', '2020-06-09 01:52:17', 30, '2020-06-09 01:52:17', NULL, NULL, NULL, 0),
(106, 11, 1, 1, '<p>Lorem ipsum dolor&nbsp;</p>', '2020-06-12 05:46:31', 1, '2020-06-12 05:46:35', NULL, '2020-06-12 05:46:35', 1, 1),
(107, 11, 2, 2, '<p>wah sangat sulit nampaknya</p>', '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02', NULL, NULL, NULL, 0),
(108, 11, 4, 2, '<p><strong>Keterangan</strong></p>', '2020-07-06 06:13:13', 30, '2020-07-06 06:13:47', NULL, '2020-07-06 06:13:47', 30, 1),
(109, 11, 4, 2, '<p><strong>Keterangan</strong></p>', '2020-07-06 06:14:11', 30, '2020-07-06 06:14:26', NULL, '2020-07-06 06:14:26', 30, 1),
(110, 11, 4, 2, '<p><strong>Keterangan</strong></p>', '2020-07-06 06:14:34', 30, '2020-07-06 06:14:34', NULL, NULL, NULL, 0),
(111, 11, 4, 2, '<p><strong>Keterangan</strong></p>', '2020-07-06 06:15:20', 1, '2020-07-06 06:15:20', NULL, NULL, NULL, 0),
(112, 11, 4, 2, '<p><strong>Keterangan</strong></p>', '2020-07-06 06:15:31', 30, '2020-07-06 06:15:31', NULL, NULL, NULL, 0),
(113, 11, 10, 2, '<p>Lorem ipsum dolor sit amet</p>', '2020-07-06 06:16:07', 30, '2020-07-06 06:16:07', NULL, NULL, NULL, 0),
(114, 11, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>', '2020-07-10 04:10:18', 30, '2020-07-10 04:10:18', NULL, NULL, NULL, 0),
(115, 21, 7, 1, '<p>Apakah materinya hanya 2 saja ?</p>', '2020-07-24 14:00:11', 48, '2020-07-24 14:00:11', NULL, NULL, NULL, 0),
(116, 21, 7, 1, '<p>Akan diupload lagi nanti bertahap</p>', '2020-07-24 14:00:47', 47, '2020-07-24 14:00:47', NULL, NULL, NULL, 0),
(118, 11, 1, 1, '<p>Test</p>', '2020-07-27 15:33:15', 1, '2020-07-27 15:33:15', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_type` int(11) DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `logo_url` varchar(200) DEFAULT 'http://elcat.localhost/storage/free_logos.png',
  `emails` text DEFAULT NULL,
  `phones` int(11) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `country` varchar(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `service_status` int(11) NOT NULL DEFAULT 0,
  `subscribe_until` timestamp NULL DEFAULT NULL,
  `allow_external_register` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id_company`, `uuid`, `company_name`, `company_type`, `descriptions`, `logo_url`, `emails`, `phones`, `address`, `country`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`, `service_status`, `subscribe_until`, `allow_external_register`) VALUES
(11, '8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb', 'Universitas Jendela Utama', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/logo.tmp', NULL, NULL, NULL, 'ID', '2020-02-05 22:10:11', 1, '2020-07-25 05:15:00', 31, NULL, NULL, 0, 0, '2021-02-07 20:22:02', 1),
(15, '907d7970-00b4-4700-857c-bd1b356d516d', 'Kursus Coding', 5, NULL, 'http://elcat.localhost/storage/907d7970-00b4-4700-857c-bd1b356d516d/file/1/logo.png', NULL, NULL, NULL, 'AU', '2020-05-05 05:37:07', 1, '2020-07-10 01:16:32', NULL, NULL, NULL, 0, 0, '2021-06-27 21:12:06', 1),
(16, '90ee1c12-8c1a-4215-b3f9-6b2b9c9e8517', 'BPSDM', 6, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, NULL, NULL, '2020-06-30 05:24:35', 0, '2020-06-30 05:27:04', NULL, NULL, NULL, 0, 0, '2021-06-30 05:27:04', 1),
(17, '90ee1f08-1a21-4801-87ec-583d5d6fe6bc', 'BPSDM 1', 2, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, NULL, NULL, '2020-06-30 05:32:52', 42, '2020-06-30 05:32:52', NULL, NULL, NULL, 0, 0, NULL, 1),
(18, '91021a40-612c-441a-bd07-aabf8d321991', 'Lembaga 1', 4, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, NULL, NULL, '2020-07-10 03:56:03', 43, '2020-07-10 03:56:58', NULL, NULL, NULL, 0, 0, '2021-07-10 03:56:58', 1),
(19, '911bba21-1544-407d-9fc4-b7cf8ee0b563', 'Institut Pertama', 4, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, NULL, NULL, '2020-07-23 05:38:48', 45, '2020-07-23 14:38:01', NULL, NULL, NULL, 0, 0, '2021-07-23 14:38:01', 1),
(20, '911e68bb-23db-48ee-ac9a-97c125d83cfe', 'Diklat dan Pelatihan 1', 6, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, 'Jalan Dipenegoro', NULL, '2020-07-24 13:38:41', 46, '2020-07-24 13:39:22', NULL, NULL, NULL, 0, 0, '2021-07-24 13:39:22', 1),
(21, '911e6acd-37be-4d59-9f07-dfa488ad6ea2', 'Lembaga Diklat Daerah', 6, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, 'Jalan Jembawan', NULL, '2020-07-24 13:44:28', 47, '2020-07-24 13:45:01', NULL, NULL, NULL, 0, 0, '2021-07-24 13:45:01', 1),
(22, '911f4da2-4715-4ba6-bd0a-75aaef431b9d', 'Pendidikan dan Pelatihan', 5, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, 'Jalan Diponegoro', NULL, '2020-07-25 00:18:44', 53, '2020-07-25 00:19:31', NULL, NULL, NULL, 0, 0, '2021-07-25 00:19:31', 1),
(23, '911fb96a-4684-4e7d-9b45-4ce99964aca4', 'Lembaga 1', 5, NULL, 'http://elcat.localhost/storage/free_logos.png', NULL, NULL, 'Jalan 1', NULL, '2020-07-25 05:20:07', 54, '2020-07-25 05:20:58', NULL, NULL, NULL, 0, 0, '2021-07-25 05:20:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies_subscribtions`
--

CREATE TABLE `companies_subscribtions` (
  `id_company` int(11) NOT NULL,
  `id_srv_attribute` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies_subscribtions`
--

INSERT INTO `companies_subscribtions` (`id_company`, `id_srv_attribute`, `size`, `updated_at`, `updated_by`) VALUES
(11, 1, 1, NULL, NULL),
(11, 2, 1, NULL, NULL),
(11, 3, 200, NULL, NULL),
(11, 4, 4, NULL, NULL),
(15, 1, 1, NULL, NULL),
(15, 2, 1, NULL, NULL),
(15, 3, 50, NULL, NULL),
(15, 4, 2, NULL, NULL),
(16, 1, 1, NULL, NULL),
(16, 2, 1, NULL, NULL),
(16, 3, 50, NULL, NULL),
(16, 4, 5, NULL, NULL),
(17, 1, 1, NULL, NULL),
(17, 2, 0, NULL, NULL),
(17, 3, 50, NULL, NULL),
(17, 4, 5, NULL, NULL),
(18, 1, 1, NULL, NULL),
(18, 2, 1, NULL, NULL),
(18, 3, 100, NULL, NULL),
(18, 4, 5, NULL, NULL),
(19, 1, 1, NULL, NULL),
(19, 2, 1, NULL, NULL),
(19, 3, 100, NULL, NULL),
(19, 4, 5, NULL, NULL),
(20, 1, 1, NULL, NULL),
(20, 2, 1, NULL, NULL),
(20, 3, 100, NULL, NULL),
(20, 4, 6, NULL, NULL),
(21, 1, 1, NULL, NULL),
(21, 2, 1, NULL, NULL),
(21, 3, 100, NULL, NULL),
(21, 4, 6, NULL, NULL),
(22, 1, 1, NULL, NULL),
(22, 2, 1, NULL, NULL),
(22, 3, 100, NULL, NULL),
(22, 4, 6, NULL, NULL),
(23, 1, 1, NULL, NULL),
(23, 2, 1, NULL, NULL),
(23, 3, 50, NULL, NULL),
(23, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies_transactions`
--

CREATE TABLE `companies_transactions` (
  `id_c_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `type_product` int(11) NOT NULL COMMENT 'elearning atau cat',
  `price` int(11) NOT NULL DEFAULT 0,
  `external_id` text DEFAULT NULL,
  `transaction_url` text DEFAULT NULL,
  `transaction_token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies_transactions`
--

INSERT INTO `companies_transactions` (`id_c_transaction`, `id_product`, `id_company`, `type_product`, `price`, `external_id`, `transaction_url`, `transaction_token`, `created_at`, `created_by`, `status`) VALUES
(27, 1, 11, 1, 1000000, '9080b43d-7224-4098-b1d8-2efb96e0598a', 'https://invoice-staging.xendit.co/web/invoices/5eb389de1c9cf11118cc521e', '5eb389de1c9cf11118cc521e', '2020-05-06 20:09:02', 30, 1),
(29, 2, 11, 2, 1000000, '9080e7da-42ee-42f6-bd0f-f594dfdc7032', 'https://invoice-staging.xendit.co/web/invoices/5eb3abb11c9cf11118cc52ee', '5eb3abb11c9cf11118cc52ee', '2020-05-06 22:33:21', 30, 1),
(30, 8, 21, 1, 700000, '911e7977-8609-4c04-a1b5-ef1ff117147a', 'https://invoice-staging.xendit.co/web/invoices/5f1aef594e2947691e00558e', '5f1aef594e2947691e00558e', '2020-07-24 14:25:30', 48, 1),
(31, 8, 21, 1, 700000, '911e7aa7-2bcc-412a-b965-1837df674576', 'https://invoice-staging.xendit.co/web/invoices/5f1af0214e2947691e005592', '5f1af0214e2947691e005592', '2020-07-24 14:28:49', 50, 1),
(32, 12, 21, 2, 800000, '911e7e8c-f0ce-4c8c-8087-db884c0ab8ba', 'https://invoice-staging.xendit.co/web/invoices/5f1af2ae4e2947691e0055b0', '5f1af2ae4e2947691e0055b0', '2020-07-24 14:39:43', 50, 1),
(33, 8, 21, 1, 700000, '911e866e-7ba1-448f-a375-c4cf11453b2b', 'https://invoice-staging.xendit.co/web/invoices/5f1af7d84e2947691e0055cc', '5f1af7d84e2947691e0055cc', '2020-07-24 15:01:45', 51, 1),
(34, 12, 21, 2, 800000, '911e8949-dd68-4ae9-aafa-caa95356d830', 'https://invoice-staging.xendit.co/web/invoices/5f1af9b84e2947691e0055d3', '5f1af9b84e2947691e0055d3', '2020-07-24 15:09:44', 51, 1),
(35, 8, 21, 1, 700000, '911e8aa5-06c3-4699-b7f0-95200cdf2604', 'https://invoice-staging.xendit.co/web/invoices/5f1afa9b4e2947691e0055d7', '5f1afa9b4e2947691e0055d7', '2020-07-24 15:13:32', 52, 1),
(36, 12, 21, 2, 800000, '911e920c-ed00-45c0-bffa-d3b9fc1e8548', 'https://invoice-staging.xendit.co/web/invoices/5f1aff764e2947691e0055f6', '5f1aff764e2947691e0055f6', '2020-07-24 15:34:14', 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies_type`
--

CREATE TABLE `companies_type` (
  `id_type` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_type`
--

INSERT INTO `companies_type` (`id_type`, `label`, `descriptions`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 'Lainnya', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0),
(2, 'Pendidikan Dasar', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0),
(3, 'Pendidikan Menengah', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0),
(4, 'Pendidikan Tinggi', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0),
(5, 'Lembaga Kursus', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0),
(6, 'Lembaga Pelatihan', NULL, '2020-05-16 05:45:44', 31, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id_courses` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `descriptions` text NOT NULL,
  `cover_img_url` text DEFAULT NULL,
  `is_manual_add` tinyint(1) NOT NULL,
  `is_share_link` tinyint(1) NOT NULL,
  `is_unlimited_users` tinyint(1) NOT NULL,
  `max_users` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `is_no_end_time` double NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 1,
  `courses_price` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_courses`, `id_company`, `uuid`, `title`, `category`, `descriptions`, `cover_img_url`, `is_manual_add`, `is_share_link`, `is_unlimited_users`, `max_users`, `start_date`, `is_no_end_time`, `end_date`, `is_free`, `is_private`, `courses_price`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`) VALUES
(1, 11, '8fc9d32f-d957-43dc-9c70-70241185ca3d', 'Pendidikan Pancasila', 16, '<p><strong>Pendidikan pancasila</strong>&nbsp;merupakan proses pembudayaan atau pewarisan budaya luhur bangsa dari generasi tua kepada generasi muda bangsa.&nbsp;<strong>Pancasila</strong>&nbsp;mengandung konsep religiusitas, humanitas, nasionalitas, dan sosialitas yang dapat dipertanggung jawabkan dari tinjauan teoritis-filsafat.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/stock-photo-4204329.jpg', 1, 1, 1, 0, '2020-02-18 15:52:00', 1, '9999-12-30 00:00:00', 0, 1, 1000000, 1, '2020-02-05 22:19:03', NULL, '2020-07-10 21:26:10', NULL, NULL, 0),
(2, 11, '8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 'Interaksi Manusia dan Komputer', 3, '<p><strong>Interaksi manusia dan komputer</strong>&nbsp;adalah disiplin ilmu yang mempelajari hubungan antara manusia dan komputer yang meliputi perancangan, evaluasi, dan implementasi antarmuka pengguna komputer agar mudah digunakan oleh manusia. Ilmu ini berusaha menemukan cara yang paling efisien untuk merancang pesan elektronik.</p>\r\n\r\n<p>Dengan kata lain&nbsp;<strong>Interaksi manusia dan komputer</strong>&nbsp;itu sendiri adalah serangkaian proses, dialog dan kegiatan yang dilakukan oleh manusia untuk berinteraksi dengan komputer yang keduanya saling memberikan masukan dan umpan balik melalui sebuah antarmuka untuk memperoleh hasil akhir yang diharapkan. Interaksi manusia dan komputer meliputi ergonomic dan faktor manusia.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/android-with-VR-headset-on_3374756791148694408.jpg', 1, 1, 0, 50, '2020-07-29 12:00:00', 1, '9999-12-30 00:00:00', 0, 0, 500000, 1, '2020-02-06 00:57:01', NULL, '2020-07-20 01:47:47', NULL, NULL, 0),
(3, 11, '8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 'Algoritma Dasar', 13, '<p>Bahasa pemrograman semakin banyak dipelajari oleh banyak orang. Hal ini terkait dengan kemajuan zaman yang menjadikan teknologi sebagai hal penting untuk menunjang kemajuan. Bagi pembaca yang ingin mempelajari bahasa pemrograman, hal dasar yang harus dipahami adalah algoritma pemrograman tersebut. Untuk mengerti apa itu algoritma pemrograman, silahkan simak pembahasan di bawah ini.</p>\r\n\r\n<p>Dalam matematika dan ilmu komputer, algoritma adalah urutan atau langkah-langkah untuk penghitungan atau untuk menyelesaikan suatu masalah yang ditulis secara berurutan. Sehingga, algoritma pemrograman adalah urutan atau langkah-langkah untuk menyelesaikan masalah pemrograman komputer.</p>\r\n\r\n<p>Dalam pemrograman, hal yang penting untuk dipahami adalah logika kita dalam berpikir bagaimana cara untuk memecahkan masalah pemrograman yang akan dibuat. Sebagai contoh, banyak permasalahan matematika yang mudah jika diselesaikan secara tertulis, tetapi cukup sulit jika kita terjemahkan ke dalam pemrograman. Dalam hal ini, algoritma dan logika pemrograman akan sangat penting dalam pemecahan masalah.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/Banner-Blog-1A-1.jpg', 1, 1, 1, NULL, NULL, 1, '9999-12-30 00:00:00', 1, 1, 0, 1, '2020-02-06 19:01:36', NULL, '2020-07-11 21:30:40', 1, '2020-06-07 02:06:40', 0),
(4, 11, '8ffeb246-33ae-4954-aec3-c31460083e30', 'Python Dev', 0, '<p>dwadw</p>', '/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/architecture-blue-sky-buildings-city-409127.jpg', 1, 0, 1, 0, '2020-03-05 00:00:00', 0, '2020-03-06 23:00:00', 1, 0, 0, 1, '2020-03-03 05:05:54', NULL, '2020-06-17 03:26:21', 31, '2020-06-17 03:26:21', 1),
(6, 11, '90c707c2-ec30-4836-9913-9397914066ac', 'wwww', 13, '<p>wwwww</p>', NULL, 1, 1, 1, NULL, '2020-06-11 11:07:00', 1, '2020-06-12 11:07:00', 1, 0, 0, 1, '2020-06-10 19:10:31', NULL, '2020-06-17 03:24:21', 31, '2020-06-17 03:24:21', 1),
(7, 21, '911e6bf4-6b6d-4a38-822c-eadb905de3ba', 'Pendidikan Kelautan', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Cover/landscape-of-river-near-the-mountains-713074.jpg', 1, 1, 1, NULL, '2020-07-24 21:46:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 47, '2020-07-24 13:47:42', NULL, '2020-07-24 13:47:42', NULL, NULL, 0),
(8, 21, '911e7655-b7fc-471e-9790-8e448fa66256', 'Kursus Berbayar', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Cover/landscape-of-river-near-the-mountains-713074.jpg', 1, 1, 1, NULL, '2020-07-24 22:16:00', 1, '9999-12-30 00:00:00', 0, 0, 700000, 47, '2020-07-24 14:16:43', NULL, '2020-07-24 14:16:43', NULL, NULL, 0),
(9, 21, '911e79f4-2fee-4132-b824-d27d204dfa62', 'Kursus Gratis', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Cover/landscape-of-river-near-the-mountains-713074.jpg', 1, 1, 1, NULL, '2020-07-24 22:26:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 47, '2020-07-24 14:26:50', NULL, '2020-07-24 14:26:50', NULL, NULL, 0),
(10, 11, '91398c68-bbf1-4f99-8592-5854e0b10b66', 'Judul 1', 0, '<p>deskripsi</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/architecture-blue-sky-buildings-city-409127.jpg', 1, 1, 1, NULL, '2020-08-07 09:25:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 1, '2020-08-07 01:25:48', NULL, '2020-08-12 12:13:25', 1, '2020-08-12 12:13:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses_log`
--

CREATE TABLE `courses_log` (
  `id_c_log` int(11) NOT NULL,
  `uuid` text NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `id_materials` int(11) NOT NULL DEFAULT 0,
  `id_participant` int(11) NOT NULL,
  `start_access` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_access_time` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_log`
--

INSERT INTO `courses_log` (`id_c_log`, `uuid`, `id_company`, `id_courses`, `id_materials`, `id_participant`, `start_access`, `total_access_time`) VALUES
(42, '8fcdd303-5ffa-4447-aacb-805ca832f34b', 11, 1, 0, 1, '2020-02-07 22:01:52', '8'),
(43, '8fcdd348-1793-40a2-b028-dbcadcacc211', 11, 1, 0, 1, '2020-02-07 22:02:37', '2'),
(44, '8fcdd382-76f6-4157-be43-77d25858a2f3', 11, 1, 0, 1, '2020-02-07 22:03:16', '6'),
(45, '8fcdd3b6-3961-4ba6-ae24-453acb2a7edc', 11, 1, 0, 1, '2020-02-07 22:03:50', '4'),
(46, '8fcdd3f3-99c8-46ee-81d7-0ab90008e67b', 11, 1, 0, 2, '2020-02-07 22:04:30', '53'),
(47, '8fcdd444-cf51-4dab-999c-86790c54c83d', 11, 1, 17, 2, '2020-02-07 22:05:23', '4'),
(48, '8fcdd463-4efc-4fd1-bed0-83ba1606eae2', 11, 1, 18, 2, '2020-02-07 22:05:43', '10'),
(50, '8fcdd4bb-a6f8-4f29-b92a-b1d196d21db8', 11, 1, 0, 1, '2020-02-07 22:06:41', '23'),
(51, '8fcdd540-27ba-4baf-889b-88091b64d43a', 11, 2, 0, 1, '2020-02-07 22:08:08', '4'),
(52, '8fcdd545-ee4a-4fa7-94fc-f00138aa0df8', 11, 2, 20, 1, '2020-02-07 22:08:11', '5'),
(53, '8fcdd551-dda2-4a45-8276-69423464c69a', 11, 2, 0, 1, '2020-02-07 22:08:19', '3'),
(54, '8fcdd55a-6aa8-4f8c-88ec-92448d29bc90', 11, 3, 0, 1, '2020-02-07 22:08:25', '4'),
(55, '8fcdd566-f1d0-4f91-b92f-270335ea40cb', 11, 1, 0, 1, '2020-02-07 22:08:33', '4'),
(56, '8fcdd56d-29b6-4d30-b583-47af93051de7', 11, 1, 17, 1, '2020-02-07 22:08:37', '5'),
(57, '8fcdd575-8de0-4146-9f5d-f82db2f9e1d4', 11, 1, 18, 1, '2020-02-07 22:08:43', '5'),
(58, '8fcdd57d-8139-457e-8517-7437388100c2', 11, 1, 19, 1, '2020-02-07 22:08:48', '4'),
(59, '8fce1912-e280-40aa-b987-7d823548b56e', 11, 1, 0, 6, '2020-02-08 01:17:47', '6'),
(61, '8fce1a7c-9387-4989-96b9-d1eff4037ab8', 11, 1, 0, 6, '2020-02-08 01:21:44', '11'),
(63, '8fcfaece-c16b-48b1-8c96-f8630ae011fd', 11, 1, 0, 7, '2020-02-08 20:12:17', '165'),
(64, '8fcfafca-f92a-4892-8189-83b7bfc09e50', 11, 1, 17, 7, '2020-02-08 20:15:03', '20'),
(65, '8fcfafea-1802-451d-9dad-87e4fd08bb79', 11, 1, 18, 7, '2020-02-08 20:15:23', '8'),
(66, '8fcfaff6-b4c5-4fed-a0af-52a28251b23a', 11, 1, 19, 7, '2020-02-08 20:15:31', '14'),
(67, '8fcfbf1d-e1a3-499e-b29d-3ac420c54431', 11, 1, 0, 7, '2020-02-08 20:57:54', '16'),
(68, '8fcfbf5b-4ec2-4c7f-8b01-1d6d327ca0f8', 11, 1, 17, 7, '2020-02-08 20:58:34', '6'),
(69, '8fcfbfb1-f4c5-47d9-981c-53de4cca0758', 11, 1, 18, 7, '2020-02-08 20:59:31', '3'),
(70, '8fcfbfb6-7245-40b6-b4c1-42228595ea16', 11, 1, 19, 7, '2020-02-08 20:59:34', '3'),
(72, '8fd1f90b-1443-4c0a-99a2-9448a7fa443c', 11, 1, 0, 1, '2020-02-09 23:31:31', '3'),
(73, '8fd23289-0d8f-4520-b54a-a19856394bce', 11, 1, 0, 1, '2020-02-10 02:12:17', '3'),
(74, '8fd2328e-6155-4ee6-826b-26c78c21c31f', 11, 1, 21, 1, '2020-02-10 02:12:20', '6'),
(75, '8fd23297-8a6f-48a9-9f89-c7386f709eef', 11, 1, 17, 1, '2020-02-10 02:12:26', '9'),
(76, '8fd233d4-27c3-4e0f-ab59-ad59cd8e4654', 11, 1, 17, 1, '2020-02-10 02:15:54', '46'),
(77, '8fd251c9-e61c-43ee-92dd-4967efef44e1', 11, 1, 17, 1, '2020-02-10 03:39:40', '6'),
(78, '8fd251d3-524d-4246-a21e-9c4c51594cab', 11, 1, 21, 1, '2020-02-10 03:39:47', '4'),
(79, '8fd251d9-7249-427a-b1f9-239ce9fc0132', 11, 1, 19, 1, '2020-02-10 03:39:51', '14'),
(80, '8fd251ef-786e-4772-be47-4a13e148bb6d', 11, 1, 17, 1, '2020-02-10 03:40:05', '6'),
(81, '8fd26d33-435d-4656-ba06-78d27a0abef5', 11, 1, 0, 1, '2020-02-10 04:56:19', '3'),
(82, '8fd26d38-fe55-40ac-83c1-d3c8a653477d', 11, 1, 21, 1, '2020-02-10 04:56:23', '3'),
(83, '8fd26d3e-3b3c-4f2a-a306-f47ea7983e01', 11, 1, 19, 1, '2020-02-10 04:56:26', '4'),
(84, '8fd26d44-a087-4441-9c95-992b2cbbeb7a', 11, 1, 18, 1, '2020-02-10 04:56:31', '3'),
(85, '8fd26d48-e7ae-4d03-aa0a-d944847c1370', 11, 1, 17, 1, '2020-02-10 04:56:33', '32'),
(86, '8fd26ddd-434f-4fa0-bd4c-d412fa3478ea', 11, 1, 18, 1, '2020-02-10 04:58:11', '5'),
(87, '8fd3d117-786a-4084-a08c-3d818f26f4b0', 11, 1, 0, 1, '2020-02-10 21:31:28', '9'),
(88, '8ff014a5-2ab1-456b-be5f-6a6226fe6282', 11, 1, 0, 1, '2020-02-24 22:43:32', '4'),
(89, '8ffe262b-bddd-47fe-9178-5b6163872e7e', 11, 1, 0, 1, '2020-03-02 22:34:08', '3'),
(90, '8ffe2631-501b-476f-be23-e701ae3af86f', 11, 1, 17, 1, '2020-03-02 22:34:12', '34'),
(91, '8ffe2665-5e03-459c-a6e2-6911315acc5e', 11, 1, 18, 1, '2020-03-02 22:34:46', '4'),
(92, '8ffe266c-7ef7-4ef0-b1ea-0498f40b6b85', 11, 1, 19, 1, '2020-03-02 22:34:51', '2'),
(93, '8ffe266f-ed28-4d24-b10e-8c720d7e935a', 11, 1, 21, 1, '2020-03-02 22:34:53', '6'),
(94, '8ffe2678-f5c9-49a4-ab8c-0ec51dd24bfa', 11, 1, 17, 1, '2020-03-02 22:34:59', '12'),
(95, '9016cf27-aa26-43af-8184-3ae9ec6054b8', 11, 1, 0, 1, '2020-03-15 04:46:31', '181'),
(96, '9016d03d-6d5b-454d-b4e5-062229527114', 11, 1, 0, 1, '2020-03-15 04:49:33', '177'),
(97, '9016d14d-6792-4a3d-aef9-e76cab548496', 11, 1, 0, 1, '2020-03-15 04:52:31', '146'),
(99, '901c7763-18cf-44c2-a798-7e75af935fc7', 11, 1, 0, 1, '2020-03-18 00:16:04', '45'),
(100, '901c77aa-6f6b-495b-8ed2-54be4309533c', 11, 1, 0, 1, '2020-03-18 00:16:51', '6'),
(101, '901c77b5-4c52-4d9d-9ec1-50cf6ffa5788', 11, 1, 17, 1, '2020-03-18 00:16:58', '133'),
(102, '901c7931-97ca-43c9-87ff-b753a2ac1789', 11, 1, 17, 1, '2020-03-18 00:21:07', '12'),
(103, '901c7944-aa9f-4b79-b42f-65c98a5b0e0a', 11, 1, 17, 1, '2020-03-18 00:21:20', '3'),
(104, '901c794a-e957-49c1-b581-223b739e9387', 11, 1, 18, 1, '2020-03-18 00:21:24', '41'),
(105, '901c79f2-db29-4a29-be2d-14d291936984', 11, 1, 18, 1, '2020-03-18 00:23:14', '17'),
(106, '901c7a0c-b009-4efe-94fd-3aecb4439123', 11, 1, 0, 1, '2020-03-18 00:23:31', '63'),
(107, '901c7a6e-c750-40f8-a6ed-bb0074304dfa', 11, 1, 0, 1, '2020-03-18 00:24:35', '6'),
(108, '901c7a78-c76d-4873-9e0d-b5e26cec89fa', 11, 1, 0, 1, '2020-03-18 00:24:42', '79'),
(109, '901c7af3-f71f-425b-893d-a1b488fd789c', 11, 1, 0, 1, '2020-03-18 00:26:02', '80'),
(110, '901c7b70-3361-4af0-b903-877e8cad0b49', 11, 1, 0, 1, '2020-03-18 00:27:24', '16'),
(111, '901c7b8c-1285-4184-929c-ea40dbe47b0c', 11, 1, 0, 1, '2020-03-18 00:27:42', '43'),
(112, '901c7bd0-9e9d-48d1-9988-184ead0b1948', 11, 1, 0, 1, '2020-03-18 00:28:27', '12'),
(113, '901c7be5-6b6c-4ed1-a189-5059d42847b1', 11, 1, 0, 1, '2020-03-18 00:28:41', '128'),
(114, '901c7caa-5473-4562-a16d-b08a0039e0b5', 11, 1, 0, 1, '2020-03-18 00:30:50', '3'),
(115, '901c7cb1-3996-4dca-95df-df78b455ffd1', 11, 1, 0, 1, '2020-03-18 00:30:54', '5'),
(116, '901c7cba-549c-4542-8321-3e6c7141432b', 11, 1, 0, 1, '2020-03-18 00:31:00', '60'),
(117, '901c7d17-47a2-4ed1-9825-51040d5af38d', 11, 1, 0, 1, '2020-03-18 00:32:01', '193'),
(118, '901c7e3f-0f9b-48ff-aaf5-7f7c28cd52cc', 11, 1, 0, 1, '2020-03-18 00:35:15', '8'),
(119, '901c7e4d-5280-43ff-bf58-9054715abce4', 11, 1, 0, 1, '2020-03-18 00:35:24', '37'),
(120, '901c7e87-455b-401b-a695-2338648346a7', 11, 1, 0, 1, '2020-03-18 00:36:02', '45'),
(121, '901c7ecd-4f6f-45d1-946f-fcc65880ce90', 11, 1, 0, 1, '2020-03-18 00:36:48', '2'),
(122, '901c7ed1-ea3b-4b52-b2e8-98ceb3cedfd1', 11, 1, 0, 1, '2020-03-18 00:36:51', '23'),
(123, '901c7ef7-729a-465c-8a5d-75e77c04b2f9', 11, 1, 0, 1, '2020-03-18 00:37:16', '15'),
(124, '901c7f0f-8d9d-405d-9f31-d615b76ed271', 11, 1, 0, 1, '2020-03-18 00:37:32', '368'),
(125, '901c8145-855d-4463-a2d5-6e50333ec514', 11, 1, 0, 1, '2020-03-18 00:43:43', '33'),
(126, '901c8179-d2af-4ca1-b271-def66d3faab2', 11, 1, 0, 1, '2020-03-18 00:44:17', '15'),
(127, '901c8191-8c6a-4ffe-a030-8fdbea97c24a', 11, 1, 0, 1, '2020-03-18 00:44:32', '5'),
(128, '901c819b-4544-41b2-8acf-7ff083e8b0a5', 11, 1, 0, 1, '2020-03-18 00:44:39', '117'),
(129, '901c8250-8f87-4eb2-8bf6-f98a814026fc', 11, 1, 0, 1, '2020-03-18 00:46:38', '25'),
(130, '901c827a-8703-4732-b523-a99630119287', 11, 1, 0, 1, '2020-03-18 00:47:05', '30'),
(131, '901c82aa-a0b9-4bc1-a60d-9512f4c1f8bc', 11, 1, 0, 1, '2020-03-18 00:47:37', '22'),
(132, '901c82cf-4921-4490-907e-72fe594159b8', 11, 1, 0, 1, '2020-03-18 00:48:01', '36'),
(133, '901c8309-2687-4cd6-bec4-188386e7a9b1', 11, 1, 0, 1, '2020-03-18 00:48:38', '6'),
(134, '901c8315-028e-4734-80cb-dcdef4dd9279', 11, 1, 0, 1, '2020-03-18 00:48:46', '19'),
(135, '901c8333-5976-4feb-95be-a483b4cdb9b3', 11, 1, 0, 1, '2020-03-18 00:49:06', '23'),
(136, '901c8358-5776-42d3-88b9-43ce2ad108bb', 11, 1, 0, 1, '2020-03-18 00:49:30', '17'),
(137, '901c8373-beff-4f93-a8c5-26cb6f52ce4c', 11, 1, 0, 1, '2020-03-18 00:49:48', '1860'),
(138, '901c8ecc-03a9-4387-84c5-84c12d991aa5', 11, 1, 0, 1, '2020-03-18 01:21:32', '935'),
(139, '901c9466-8278-4d19-a8d1-6045b5a9bc09', 11, 1, 0, 1, '2020-03-18 01:37:12', '85'),
(140, '901c94eb-3a71-4e1b-bc65-6978de573f15', 11, 1, 0, 1, '2020-03-18 01:38:39', '48'),
(141, '901c9536-d6e1-4570-a757-cb70715ad3c4', 11, 1, 0, 1, '2020-03-18 01:39:28', '96'),
(142, '901c95ca-6ef3-4b0d-b5ca-d3d0f6fd7b73', 11, 1, 0, 1, '2020-03-18 01:41:05', '42'),
(143, '901c960b-8e6b-4428-959f-659611e09af7', 11, 1, 0, 1, '2020-03-18 01:41:48', '5'),
(144, '901c9614-bf91-4e55-98b4-65e4ae4794b4', 11, 1, 0, 1, '2020-03-18 01:41:54', '1377'),
(145, '901c9e4f-93f7-4b37-ba88-15dddf490dd4', 11, 1, 0, 1, '2020-03-18 02:04:55', '105'),
(146, '901c9ef2-a7dd-4e26-8fe3-3eb07330a013', 11, 1, 0, 1, '2020-03-18 02:06:41', '10'),
(147, '901c9f04-2b9f-4d5d-9434-3003dfa47645', 11, 1, 0, 1, '2020-03-18 02:06:53', '172'),
(148, '901ca00b-acae-4897-9a8e-23bb334ddedc', 11, 1, 0, 1, '2020-03-18 02:09:46', '156'),
(149, '901ca0fb-c60e-4736-8dbe-98f5c9b2e8a8', 11, 1, 0, 1, '2020-03-18 02:12:23', '20'),
(150, '901ca11c-414a-4381-a134-0b952c5da859', 11, 1, 0, 1, '2020-03-18 02:12:44', '624'),
(151, '901ca4d5-5251-446b-b887-2b12e4805b81', 11, 1, 0, 1, '2020-03-18 02:23:09', '42'),
(152, '901ca516-532c-4836-8760-2a4e1c6da487', 11, 1, 0, 1, '2020-03-18 02:23:51', '491'),
(153, '901ca805-0871-4b28-9ca0-43f9e902a0bc', 11, 1, 0, 1, '2020-03-18 02:32:03', '85'),
(154, '901ca888-0a36-43d4-bb91-70f68b1a4e53', 11, 1, 0, 1, '2020-03-18 02:33:29', '112'),
(155, '901ca934-b0c9-493f-b58b-a32eace2878f', 11, 1, 0, 1, '2020-03-18 02:35:22', '23'),
(156, '901ca959-9252-48a6-9af7-f2dd130012e3', 11, 1, 0, 1, '2020-03-18 02:35:47', '42'),
(157, '901ca99b-0d0f-408f-b9fd-b8fd10ad3434', 11, 1, 0, 1, '2020-03-18 02:36:29', '16'),
(158, '901ca9b5-0666-41a6-954a-1b249b1faf16', 11, 1, 0, 1, '2020-03-18 02:36:46', '14'),
(159, '901ca9cb-9190-467f-8d28-f044dbd2d2d3', 11, 1, 0, 1, '2020-03-18 02:37:01', '36'),
(160, '901caa04-c91f-48ea-a65f-5a2e895b8baf', 11, 1, 0, 1, '2020-03-18 02:37:39', '38'),
(161, '901caa42-1096-41c0-a13e-127deace26da', 11, 1, 0, 1, '2020-03-18 02:38:19', '11'),
(162, '901caa54-6f1a-4a83-a11d-d119c37292c9', 11, 1, 0, 1, '2020-03-18 02:38:31', '17'),
(163, '901caa70-79e8-4000-b891-a432089856c8', 11, 1, 0, 1, '2020-03-18 02:38:49', '18'),
(164, '901cbb8a-5782-4768-b95b-8c5d4e289581', 11, 1, 0, 1, '2020-03-18 03:26:38', '811'),
(165, '901cc063-a735-4e99-8382-de53019bf045', 11, 1, 0, 1, '2020-03-18 03:40:12', '9'),
(166, '901cc072-ec29-4ddf-9878-b9d8c9cf735b', 11, 1, 0, 1, '2020-03-18 03:40:22', '32'),
(167, '901cc0a6-c0e0-4222-90f4-e7f68c264d2d', 11, 1, 17, 1, '2020-03-18 03:40:56', '11'),
(168, '901cc0b8-3770-42bf-8f2b-25b4508438d4', 11, 1, 18, 1, '2020-03-18 03:41:07', '31'),
(169, '901cc0e9-0948-4bb2-93d0-2e6ab0509426', 11, 1, 17, 1, '2020-03-18 03:41:39', '4'),
(170, '901cc0ef-b8ca-4b6b-a611-96baa5daaddf', 11, 1, 17, 1, '2020-03-18 03:41:44', '6'),
(171, '901cc0f9-1cab-4707-9ede-4ff54058cf22', 11, 1, 18, 1, '2020-03-18 03:41:50', '35'),
(172, '901cc164-7e01-4672-816c-9bc8f7b35d0e', 11, 1, 18, 1, '2020-03-18 03:43:00', '4'),
(173, '901cc16b-2275-4b56-b4ff-73a1eb6da877', 11, 1, 17, 1, '2020-03-18 03:43:05', '4'),
(174, '901cc172-e06a-419c-b9cc-6ad80bd0cc0a', 11, 1, 18, 1, '2020-03-18 03:43:10', '157'),
(175, '901cc487-fbab-4c66-a68e-ec6c2d009dcd', 11, 1, 0, 1, '2020-03-18 03:51:47', '64'),
(176, '901cc4ea-59a8-4e45-8410-bb11d5a8f054', 11, 1, 0, 1, '2020-03-18 03:52:51', '2348'),
(177, '901cd2f1-4dd8-46ce-a3b8-2f89766b4afc', 11, 1, 0, 1, '2020-03-18 04:32:05', '42'),
(178, '901cd335-5410-4f93-9ad6-435415f53257', 11, 1, 0, 1, '2020-03-18 04:32:49', '41'),
(179, '901cd377-fc95-49f4-865c-b3d1e9f57f01', 11, 1, 0, 1, '2020-03-18 04:33:33', '118'),
(180, '901cd430-4015-4a6c-937d-f2b4e4137473', 11, 1, 0, 1, '2020-03-18 04:35:34', '123'),
(181, '901cd4ef-24ac-4fed-be9b-9a91bb11fed9', 11, 1, 0, 1, '2020-03-18 04:37:39', '43'),
(182, '901cd534-1fdc-410b-8fdb-e5fe311d57d1', 11, 1, 0, 1, '2020-03-18 04:38:24', '3017'),
(183, '901ce736-c4e3-45b5-bd52-b10340b52fbf', 11, 1, 0, 1, '2020-03-18 05:28:46', '66'),
(184, '901ce79f-887c-4659-ab59-18a559b63a15', 11, 1, 0, 1, '2020-03-18 05:29:54', '247'),
(185, '901ce91c-871e-4d86-b86d-ec4d239139fc', 11, 1, 0, 1, '2020-03-18 05:34:04', '68'),
(186, '901ce988-3ffe-4613-9286-717f476d0414', 11, 1, 0, 1, '2020-03-18 05:35:15', '41'),
(187, '901ce9ca-fdc8-4727-85ed-cc01fdbb2f7f', 11, 1, 0, 1, '2020-03-18 05:35:58', '42'),
(188, '901cea0d-c088-41d2-b13b-fbef96122714', 11, 1, 0, 1, '2020-03-18 05:36:42', '50'),
(189, '901cea5d-7c86-4ec0-b28b-1284aae32106', 11, 1, 0, 1, '2020-03-18 05:37:34', '152'),
(190, '901ceb48-f6cf-4d39-8ae8-4b057aade8e4', 11, 1, 0, 1, '2020-03-18 05:40:09', '316'),
(191, '901ced2e-c31e-4c67-8bf6-67016761ed6d', 11, 1, 0, 1, '2020-03-18 05:45:27', '27'),
(192, '901ced5a-e4fc-41ba-ad47-754f604d1156', 11, 1, 0, 1, '2020-03-18 05:45:56', '506'),
(193, '901cf062-2e7b-4741-9633-463a2aa8a561', 11, 1, 0, 1, '2020-03-18 05:54:24', '53'),
(194, '901cf0b7-3d57-4d46-b9c0-c18b87f37df6', 11, 1, 0, 1, '2020-03-18 05:55:20', '54'),
(195, '901cf10e-546b-4641-ab9f-ae8a55a50e71', 11, 1, 0, 1, '2020-03-18 05:56:17', '139'),
(196, '901cf1e5-9785-4588-a63d-5b0ffedec54e', 11, 1, 0, 1, '2020-03-18 05:58:38', '178'),
(197, '901cf2f8-e99a-447b-9280-14674402b434', 11, 1, 0, 1, '2020-03-18 06:01:38', '43'),
(198, '901cf33d-aa9d-43b2-a026-cfa78244eee6', 11, 1, 0, 1, '2020-03-18 06:02:23', '157'),
(199, '901cf431-132c-4601-a6f9-994d2f86f848', 11, 1, 0, 1, '2020-03-18 06:05:03', '19'),
(200, '901cf451-1fd7-4b65-a1e2-28af45796439', 11, 1, 0, 1, '2020-03-18 06:05:24', '51'),
(201, '901cf4a3-0330-4ba4-a18a-59572396689b', 11, 1, 0, 1, '2020-03-18 06:06:18', '402'),
(202, '901cf70b-ab79-4be7-8a4a-42b21798912a', 11, 1, 0, 1, '2020-03-18 06:13:02', '29'),
(203, '901cf73b-a1ef-476e-9d77-94a71c3e8b2d', 11, 1, 0, 1, '2020-03-18 06:13:33', '15'),
(204, '901cf756-1789-4b71-be46-29bec5920066', 11, 1, 0, 1, '2020-03-18 06:13:50', '153'),
(205, '901cf843-0931-4b91-9681-37c5426ca7ec', 11, 1, 0, 1, '2020-03-18 06:16:26', '174'),
(206, '901cf94f-8c20-4e2c-b253-c76315a78685', 11, 1, 0, 1, '2020-03-18 06:19:22', '38'),
(207, '901cf98d-97d9-4c99-a1c1-59cf14f1178b', 11, 1, 0, 1, '2020-03-18 06:20:02', '48'),
(208, '901cf9da-4ee7-422d-8c0b-1695730ecc17', 11, 1, 0, 1, '2020-03-18 06:20:53', '21'),
(209, '901cf9fd-f3f4-4726-be2b-75173a84b4b6', 11, 1, 0, 1, '2020-03-18 06:21:16', '174'),
(210, '901cfb0b-738c-4b4b-b520-f0a20e8ed107', 11, 1, 0, 1, '2020-03-18 06:24:13', '19'),
(211, '901cfb2b-c5ee-44d9-8059-5a75281c2384', 11, 1, 0, 1, '2020-03-18 06:24:34', '6'),
(212, '901cfb38-a13e-428a-86f9-cc0e4792ee47', 11, 1, 0, 1, '2020-03-18 06:24:42', '222'),
(213, '901cfc8d-baee-4d00-b3df-b017bd0a8043', 11, 1, 0, 1, '2020-03-18 06:28:26', '23'),
(214, '901cfcb4-2696-4e3d-a6a9-31f312878444', 11, 1, 0, 1, '2020-03-18 06:28:51', '57'),
(215, '901cfd0e-4adf-4d65-90fc-f425928074bf', 11, 1, 0, 1, '2020-03-18 06:29:50', '110'),
(216, '901cfdb9-3037-4f38-9881-8806ff6ba801', 11, 1, 0, 1, '2020-03-18 06:31:42', '34'),
(217, '901cfdf1-077e-405c-9932-b1e1b44bbd18', 11, 1, 0, 1, '2020-03-18 06:32:19', '2'),
(218, '901cfdf7-fab9-4ca7-86e8-dfd836a28550', 11, 1, 0, 1, '2020-03-18 06:32:23', '479'),
(219, '901d00d4-a39c-4b2b-9bf4-06c47dfe0baa', 11, 1, 0, 1, '2020-03-18 06:40:23', '578'),
(220, '901d0449-9bc0-41c7-8855-b11f14411030', 11, 1, 0, 1, '2020-03-18 06:50:03', '39'),
(221, '901d0488-8c59-430f-b628-fd913f427934', 11, 1, 0, 1, '2020-03-18 06:50:45', '31'),
(222, '901d04ba-f0eb-4e1e-9c1f-8c94af2cfc37', 11, 1, 0, 1, '2020-03-18 06:51:18', '20'),
(223, '901d04db-8f56-4e34-a713-5ac7fed4e6ef', 11, 1, 0, 1, '2020-03-18 06:51:39', '994'),
(224, '901d0acc-260e-4986-a71a-bb021c9a9f42', 11, 1, 0, 1, '2020-03-18 07:08:16', '54'),
(225, '901d0b22-7090-47ab-8f63-f40ed70337a3', 11, 1, 0, 1, '2020-03-18 07:09:12', '23'),
(226, '901d0b48-d921-444e-8ba5-01a233e2a5d2', 11, 1, 0, 1, '2020-03-18 07:09:37', '27'),
(227, '901d0b75-651e-4efc-a90f-0e5fb5c2c7fe', 11, 1, 0, 1, '2020-03-18 07:10:06', '429'),
(228, '901d0e07-44b7-4b83-93b7-748f53ff5416', 11, 1, 0, 1, '2020-03-18 07:17:18', '57'),
(229, '901d0e61-b877-4057-8af2-2b451882357e', 11, 1, 0, 1, '2020-03-18 07:18:17', '98'),
(230, '901d0efb-3feb-4c00-9847-8abe262e9f28', 11, 1, 0, 1, '2020-03-18 07:19:57', '35'),
(231, '901d0f34-d3a7-4cd7-b198-4b71517e34f5', 11, 1, 0, 1, '2020-03-18 07:20:35', '24'),
(232, '901d0f5c-a8cb-4871-a0a1-6806532dbc53', 11, 1, 0, 1, '2020-03-18 07:21:01', '78'),
(233, '901d0fd6-9dec-49d6-9a2b-aba231d633cc', 11, 1, 0, 1, '2020-03-18 07:22:21', '40'),
(234, '901d1016-7408-44a9-8c71-f4e374f8dc72', 11, 1, 0, 1, '2020-03-18 07:23:03', '48'),
(235, '901d1063-6724-4dc2-b578-08e8e656ddc7', 11, 1, 0, 1, '2020-03-18 07:23:54', '20'),
(236, '901d1084-b774-412a-8d8d-f9670449ad72', 11, 1, 0, 1, '2020-03-18 07:24:15', '93'),
(237, '901d1116-f182-41d6-b8a5-f48ef33db9bf', 11, 1, 0, 1, '2020-03-18 07:25:51', '885'),
(238, '901d1660-c724-4ae9-bf93-d4b95e82e0e0', 11, 1, 0, 1, '2020-03-18 07:40:38', '176'),
(239, '901d1771-6668-4a6d-893d-8733d405e08f', 11, 1, 0, 1, '2020-03-18 07:43:37', '419'),
(240, '901d19f4-c8da-4ce9-a295-e8f6d8eaa789', 11, 1, 0, 1, '2020-03-18 07:50:39', '83'),
(241, '901d1a75-a0eb-4b78-a924-9c7ca5300dcf', 11, 1, 0, 1, '2020-03-18 07:52:03', '55'),
(242, '901d1acd-3afc-4d69-b1b4-91241e4a0c37', 11, 1, 0, 1, '2020-03-18 07:53:01', '36'),
(243, '901d1b08-1e53-4076-a640-025924e6b0fd', 11, 1, 0, 1, '2020-03-18 07:53:39', '6'),
(244, '901d1b16-a28f-4312-9971-bc4163526dd0', 11, 1, 0, 1, '2020-03-18 07:53:49', '37'),
(245, '901d1b53-6277-4a00-8ba4-f837091cbc54', 11, 1, 0, 1, '2020-03-18 07:54:29', '161'),
(246, '901d1c50-d58d-4e0a-bdc8-1c7fb9093d72', 11, 1, 0, 1, '2020-03-18 07:57:15', '14'),
(247, '901d1c6a-c63e-4613-b5f9-ae87ea04e3ca', 11, 1, 0, 1, '2020-03-18 07:57:32', '75'),
(248, '901d1ce0-c44f-4a06-ac27-69580d660ecf', 11, 1, 0, 1, '2020-03-18 07:58:49', '370'),
(249, '901d1f19-6bff-4151-9337-f8c321bf1528', 11, 1, 0, 1, '2020-03-18 08:05:02', '58'),
(250, '901d1f76-851f-443d-820d-f05d00755234', 11, 1, 0, 1, '2020-03-18 08:06:03', '996'),
(251, '901d256a-b19b-4fcf-a29a-e8b1616e8c4d', 11, 1, 0, 1, '2020-03-18 08:22:42', '19'),
(252, '901d258a-6710-481e-b5d1-96b5da2056de', 11, 1, 0, 1, '2020-03-18 08:23:02', '472'),
(253, '901d285e-f3fb-4f04-9175-9e4461aee791', 11, 1, 0, 1, '2020-03-18 08:30:57', '6'),
(254, '901d286d-33ec-4268-933c-717fd9591702', 11, 1, 0, 1, '2020-03-18 08:31:06', '646'),
(255, '901d2c4b-575f-4119-af20-44cc1016e3a8', 11, 1, 0, 1, '2020-03-18 08:41:55', '120'),
(256, '901d2d07-49e8-4854-83a2-3ae920d07e66', 11, 1, 0, 1, '2020-03-18 08:43:59', '333'),
(257, '901d2f07-42df-4b64-9439-49c89eece52b', 11, 1, 0, 1, '2020-03-18 08:49:34', '69'),
(258, '901d2f74-5ae4-4f9c-ad26-7f893f9bd0e8', 11, 1, 0, 1, '2020-03-18 08:50:46', '16'),
(259, '901d2f90-0d9d-4dbf-80c9-b567b51c255a', 11, 1, 0, 1, '2020-03-18 08:51:04', '99'),
(260, '901d302b-3040-4996-8b91-30e47764992b', 11, 1, 0, 1, '2020-03-18 08:52:45', '26'),
(261, '901d3056-ecc2-4bbf-aa3c-c794f5c901ce', 11, 1, 0, 1, '2020-03-18 08:53:14', '183'),
(262, '901d3172-731d-4612-a5ac-0ca1625ff20e', 11, 1, 0, 1, '2020-03-18 08:56:20', '16'),
(263, '901d318e-c3e6-4506-9c67-361932fdc1be', 11, 1, 0, 1, '2020-03-18 08:56:38', '42'),
(264, '901d31d2-332a-47e6-8af4-2fff423a5712', 11, 1, 0, 1, '2020-03-18 08:57:23', '53'),
(265, '901d3226-7dc7-4225-a789-9962efc71948', 11, 1, 0, 1, '2020-03-18 08:58:18', '35'),
(266, '901d325f-46f8-4977-a5d5-19daba95787c', 11, 1, 0, 1, '2020-03-18 08:58:55', '106'),
(267, '901d3305-4df8-43c8-8d4b-43f4914195f1', 11, 1, 0, 1, '2020-03-18 09:00:44', '53'),
(268, '901d335a-d6ce-4894-9f17-a10249da3eaa', 11, 1, 0, 1, '2020-03-18 09:01:40', '3'),
(269, '901d3363-2879-412c-ae87-8e5642b7ed82', 11, 1, 0, 1, '2020-03-18 09:01:45', '51'),
(270, '901d33b3-33a6-41f1-bb31-83718cf9b7b7', 11, 1, 0, 1, '2020-03-18 09:02:38', '85'),
(271, '901d3437-275d-4fb3-a2ed-b19dbbd747df', 11, 1, 0, 1, '2020-03-18 09:04:04', '27'),
(272, '901d3463-6abe-4d16-bb42-575874ab1fc1', 11, 1, 0, 1, '2020-03-18 09:04:33', '13'),
(274, '901e0c57-dd7d-4812-a689-a5c899a0c3c4', 11, 1, 0, 1, '2020-03-18 19:08:25', '47'),
(275, '901e0ca3-51ad-4341-a4c5-f68fb56068aa', 11, 1, 0, 1, '2020-03-18 19:09:14', '31'),
(276, '901e0cd6-ad0c-4ad1-9d8a-d9065698ee5e', 11, 1, 0, 1, '2020-03-18 19:09:48', '6'),
(277, '901e0ce3-cdc2-4800-95c0-a57d3c59b677', 11, 1, 0, 1, '2020-03-18 19:09:56', '800'),
(278, '901e11aa-27c2-4ff0-9cc9-a47421003738', 11, 1, 0, 1, '2020-03-18 19:23:17', '20'),
(279, '901e11cb-4149-4f47-8031-2459f1b19c29', 11, 1, 0, 1, '2020-03-18 19:23:39', '151'),
(280, '901e12b4-1f37-4ce2-8b45-146205c1ef48', 11, 1, 0, 1, '2020-03-18 19:26:12', '290'),
(281, '901e1477-3b84-4c89-b2f1-dbaa1fb9482a', 11, 2, 0, 1, '2020-03-18 19:31:07', '114'),
(282, '901e1527-064d-4266-88b0-9392fcfbc05a', 11, 2, 0, 1, '2020-03-18 19:33:02', '19'),
(283, '901e1547-7718-4b7a-b111-d42f8f89991c', 11, 2, 0, 1, '2020-03-18 19:33:24', '101'),
(284, '901e15e4-4cc2-477c-93a6-0eb535fffaac', 11, 2, 0, 1, '2020-03-18 19:35:07', '17'),
(285, '901e15ff-ed29-4b76-b96f-911c85ac4b65', 11, 2, 0, 1, '2020-03-18 19:35:25', '5'),
(286, '901e1614-9031-4ad1-9a2f-c2736d5f2992', 11, 1, 0, 1, '2020-03-18 19:35:38', '26'),
(287, '901e163e-76db-4de9-91f4-d43d2663db36', 11, 1, 0, 1, '2020-03-18 19:36:06', '181'),
(288, '901e1757-4f80-4f08-a701-3bebaabc4f9f', 11, 1, 0, 1, '2020-03-18 19:39:10', '180'),
(289, '901e186e-159d-4a5e-9d4f-a12d09b439de', 11, 1, 0, 1, '2020-03-18 19:42:12', '45'),
(290, '901e18b7-8400-4a86-95fb-828e87acd15f', 11, 1, 0, 1, '2020-03-18 19:43:00', '12'),
(291, '901e18cf-2bb8-43ed-8922-ba23f040f2dc', 11, 1, 0, 1, '2020-03-18 19:43:16', '325'),
(292, '901e1ac2-2641-4f9f-a0fa-b7be72c1fb26', 11, 1, 0, 1, '2020-03-18 19:48:43', '204'),
(293, '901e1bfd-5e2d-46c8-a07f-566f97cd3ea5', 11, 1, 0, 1, '2020-03-18 19:52:10', '387'),
(294, '901e1e51-e9ed-4740-8e45-01a5dd203517', 11, 1, 0, 1, '2020-03-18 19:58:41', '147'),
(295, '901e1f37-98f2-47c9-8714-0f98d87961b2', 11, 1, 0, 1, '2020-03-18 20:01:11', '63'),
(296, '901e1f9c-f277-4cbb-9844-b62142f612bb', 11, 1, 0, 1, '2020-03-18 20:02:17', '57'),
(297, '901e1ff8-9b94-4ba1-a76c-b4a02fbc76da', 11, 1, 0, 1, '2020-03-18 20:03:18', '15'),
(298, '901e2012-7e78-47a1-8e19-3d56ef2eb8f0', 11, 1, 0, 1, '2020-03-18 20:03:35', '19'),
(299, '901e2034-71cf-4fc0-ab94-f73712d09ac1', 11, 1, 0, 1, '2020-03-18 20:03:57', '67'),
(300, '901e209e-7e79-4536-baa5-e3cdbfe29039', 11, 1, 0, 1, '2020-03-18 20:05:06', '256'),
(301, '901e2228-7dc1-457d-87a1-954b84faa415', 11, 1, 0, 1, '2020-03-18 20:09:24', '43'),
(302, '901e226f-5fe6-4ab5-978b-10359255ad69', 11, 1, 0, 1, '2020-03-18 20:10:11', '53'),
(303, '901e22c4-0ee2-45af-a04d-e4ff0ae52e92', 11, 1, 0, 1, '2020-03-18 20:11:06', '347'),
(304, '901e24d7-ef1e-4071-9a0d-94b7d6536482', 11, 1, 0, 1, '2020-03-18 20:16:55', '23'),
(305, '901e24ff-e922-47ac-8264-f2a370fde3ec', 11, 1, 0, 1, '2020-03-18 20:17:21', '27'),
(306, '901e252d-ce48-47dc-a0bc-51ee30888a1c', 11, 1, 0, 1, '2020-03-18 20:17:51', '822'),
(307, '901e2a17-0d12-4a26-8682-89e0709d60f3', 11, 1, 0, 1, '2020-03-18 20:31:35', '25'),
(308, '901e2a3f-b2aa-470a-b83c-20730b2d9f5f', 11, 1, 0, 1, '2020-03-18 20:32:02', '68'),
(309, '901e2aab-2c52-47a2-8edc-6863117c6a76', 11, 1, 0, 1, '2020-03-18 20:33:12', '31'),
(310, '901e2ae0-0ec5-4c70-8467-b343ba705695', 11, 1, 0, 1, '2020-03-18 20:33:47', '5'),
(311, '901e2aeb-f5ef-4c42-9e78-15bb7fc822e4', 11, 1, 0, 1, '2020-03-18 20:33:55', '52'),
(312, '901e2b3e-1059-4fe4-8eff-f05ffd6bd54e', 11, 1, 0, 1, '2020-03-18 20:34:49', '12'),
(313, '901e2b52-8fd7-4718-ac28-df6b48b1cf73', 11, 1, 0, 1, '2020-03-18 20:35:02', '6'),
(315, '901e2c8d-fd8b-43bc-8c79-d317c54eeb75', 11, 1, 0, 6, '2020-03-18 20:38:29', '23'),
(316, '901e607a-6e39-4092-87e9-9f5a252361be', 11, 1, 0, 1, '2020-03-18 23:03:40', '28'),
(318, '901e71a5-13cc-4d49-9d1a-e08416f62fd4', 11, 1, 0, 1, '2020-03-18 23:51:40', '87'),
(319, '901e722e-02c4-41b2-856f-92b81a9b8dbc', 11, 1, 0, 1, '2020-03-18 23:53:10', '454'),
(320, '901e728d-c169-4466-9c8f-b3851a2e1b10', 11, 1, 0, 6, '2020-03-18 23:54:13', '280'),
(321, '901e743a-f421-41ff-a304-3addde256492', 11, 1, 0, 6, '2020-03-18 23:58:54', '89'),
(322, '901e74c6-f28d-4113-93a3-a3c7d4c5d167', 11, 1, 0, 6, '2020-03-19 00:00:26', '90'),
(323, '901e74e6-0cd1-4517-bf1a-1a374b6d5aec', 11, 1, 0, 1, '2020-03-19 00:00:46', '61'),
(324, '901e7547-ca96-4d46-8062-b96aa521be7d', 11, 1, 0, 1, '2020-03-19 00:01:50', '369'),
(325, '901e7553-8020-4c66-87f6-78963db4b6d3', 11, 1, 0, 6, '2020-03-19 00:01:58', '434'),
(326, '901e777e-ca57-4159-ada3-344f3d4f3317', 11, 1, 0, 1, '2020-03-19 00:08:02', '60'),
(327, '901e77de-65a0-4502-a3aa-b253fa730a26', 11, 1, 0, 1, '2020-03-19 00:09:04', '102'),
(328, '901e77ed-54a0-462d-800c-0bf96a00f1cd', 11, 1, 0, 6, '2020-03-19 00:09:14', '193'),
(329, '901e787d-a979-492d-bc7e-c3c087b3387d', 11, 1, 0, 1, '2020-03-19 00:10:49', '89'),
(330, '901e7908-c8dc-4502-be40-7cf2e31d1d5d', 11, 1, 0, 1, '2020-03-19 00:12:20', '120'),
(331, '901e7917-dd63-481a-a370-62c579e51ddf', 11, 1, 0, 6, '2020-03-19 00:12:30', '105'),
(332, '901e79bb-434a-437c-a376-ac4f3f6083ec', 11, 1, 0, 6, '2020-03-19 00:14:17', '38'),
(333, '901e79c3-028f-4051-a366-ff9e3054d27b', 11, 1, 0, 1, '2020-03-19 00:14:22', '36'),
(334, '901e79fc-63b0-498e-a837-6a755bf3f8ad', 11, 1, 0, 1, '2020-03-19 00:15:00', '349'),
(335, '901e7c13-d44c-44e9-8c0f-0fdb2a3196e0', 11, 1, 0, 1, '2020-03-19 00:20:50', '30'),
(336, '901e7c46-67d0-44e2-9e44-9e27a9dcae9b', 11, 1, 0, 1, '2020-03-19 00:21:24', '11'),
(337, '901e7c5a-5331-4956-9d73-d0fb47943b63', 11, 1, 0, 1, '2020-03-19 00:21:37', '72'),
(338, '901e7ccc-27b1-4168-b928-8fa5021f8b70', 11, 1, 0, 1, '2020-03-19 00:22:51', '85'),
(339, '901e7d51-9411-4159-a249-6725e823b5dd', 11, 1, 0, 1, '2020-03-19 00:24:19', '172'),
(340, '901e7e5b-8ae5-4bd9-9452-4c2281200090', 11, 1, 0, 1, '2020-03-19 00:27:13', '22'),
(341, '901e7e81-4a22-4b4a-8808-6c388a002df1', 11, 1, 0, 1, '2020-03-19 00:27:38', '7'),
(342, '901e7e8f-9b3d-4943-8c40-1b047235c2e2', 11, 1, 0, 1, '2020-03-19 00:27:47', '129'),
(343, '901e7f57-de1d-4129-a606-bc52215d9e04', 11, 1, 0, 1, '2020-03-19 00:29:58', '74'),
(344, '901e7fcb-66f4-4eba-b8d8-9e72c35ed658', 11, 1, 0, 1, '2020-03-19 00:31:14', '40'),
(345, '901e800a-daf9-4ed1-bf41-dbe35a25e2aa', 11, 1, 0, 1, '2020-03-19 00:31:56', '53'),
(346, '901e805e-3353-423f-99ec-1cf0016159cb', 11, 1, 0, 1, '2020-03-19 00:32:50', '11'),
(347, '901e8071-e83b-4eb1-ab30-2d75242637e8', 11, 1, 0, 1, '2020-03-19 00:33:03', '55'),
(348, '901e80c9-1c78-49e6-8feb-204f3400b300', 11, 1, 0, 1, '2020-03-19 00:34:00', '323'),
(349, '901e82b8-4bf3-4af7-8567-4a384cea1307', 11, 1, 0, 1, '2020-03-19 00:39:25', '22'),
(350, '901e82dd-2371-4a83-8117-806147a1615a', 11, 1, 0, 1, '2020-03-19 00:39:49', '768'),
(351, '901e8773-9e4f-44a6-885e-35e1bf7e0b2d', 11, 1, 0, 1, '2020-03-19 00:52:39', '5'),
(352, '901e877f-5f9f-4dad-a89d-db7e12adcc55', 11, 1, 0, 1, '2020-03-19 00:52:46', '1129'),
(353, '901e8e3c-e5fd-4dc7-bcf4-677ce573b760', 11, 1, 0, 1, '2020-03-19 01:11:37', '490'),
(354, '901e912a-f6fd-4bd3-b26d-a19e354e882c', 11, 1, 0, 1, '2020-03-19 01:19:49', '40'),
(355, '901e916b-3cfe-4483-b5d4-d50c32c44de9', 11, 1, 0, 1, '2020-03-19 01:20:31', '22'),
(356, '901e918f-f06c-4c2e-af10-80d3e8e1bcfb', 11, 1, 0, 1, '2020-03-19 01:20:55', '26'),
(357, '901e91bb-7c03-4dff-b2c4-d307117024e4', 11, 1, 0, 1, '2020-03-19 01:21:24', '230'),
(358, '901e931e-72e4-42c3-8dd0-f85493aad27b', 11, 1, 0, 1, '2020-03-19 01:25:16', '75'),
(359, '901e9394-7fc7-471e-bba1-2132da3e5b3a', 11, 1, 0, 1, '2020-03-19 01:26:34', '83'),
(360, '901e9416-aed8-4c16-aee8-5b5511f01ddc', 11, 1, 0, 1, '2020-03-19 01:27:59', '71'),
(361, '901e9487-355b-44a0-ba01-3b8dd9651b45', 11, 1, 0, 1, '2020-03-19 01:29:13', '58'),
(362, '901e94e3-dd98-4437-8ec4-2e6ce9f0e8e0', 11, 1, 0, 1, '2020-03-19 01:30:13', '34'),
(363, '901e951b-b5d5-45ea-b62a-42cec8df3e5f', 11, 1, 0, 1, '2020-03-19 01:30:50', '1761'),
(364, '901e9f9d-8a1d-461f-a17b-e7cd56f907da', 11, 1, 0, 1, '2020-03-19 02:00:13', '78'),
(365, '901ea017-4a72-4761-8f46-f8e11bf56373', 11, 1, 0, 1, '2020-03-19 02:01:32', '52'),
(366, '901ea06a-b89e-4018-baf6-33f5e2dd2017', 11, 1, 0, 1, '2020-03-19 02:02:27', '179'),
(367, '901ea17f-7ad2-4d3b-ad9d-66657262ea58', 11, 1, 0, 1, '2020-03-19 02:05:29', '30'),
(368, '901ea1b0-ae88-4b3c-8358-f5b6cb98c577', 11, 1, 0, 1, '2020-03-19 02:06:01', '23'),
(369, '901ea1d7-65b4-4ce9-b46e-4d79ba90b4aa', 11, 1, 0, 1, '2020-03-19 02:06:26', '449'),
(370, '901ea488-1aae-4485-b241-e96704931631', 11, 1, 0, 1, '2020-03-19 02:13:58', '167'),
(371, '901ea517-0475-4c74-96fc-a4f285ffd76c', 11, 1, 0, 6, '2020-03-19 02:15:31', '73'),
(372, '901ea588-42a2-431a-972b-b2877f2447ed', 11, 1, 0, 6, '2020-03-19 02:16:45', '176'),
(373, '901ea58a-2fc2-4fbd-8541-865016841b42', 11, 1, 0, 1, '2020-03-19 02:16:47', '65'),
(374, '901ea5f0-990a-425c-b13b-edccebd110be', 11, 1, 0, 1, '2020-03-19 02:17:54', '77'),
(375, '901ea668-480c-415f-a401-881f8f322584', 11, 1, 0, 1, '2020-03-19 02:19:12', '28'),
(376, '901ea694-c54e-4423-aa55-26d43d4f5bf2', 11, 1, 0, 1, '2020-03-19 02:19:41', '85'),
(377, '901ea698-b509-4618-97c8-28a2f3fa757d', 11, 1, 0, 6, '2020-03-19 02:19:44', '165'),
(378, '901ea718-6f0e-45a5-81eb-94ba3157fe7b', 11, 1, 0, 1, '2020-03-19 02:21:08', '31'),
(379, '901ea74a-e099-4b45-93d7-b7b436740c76', 11, 1, 0, 1, '2020-03-19 02:21:41', '12'),
(380, '901ea75f-2460-4db3-9c72-1cec07ce8b62', 11, 1, 0, 1, '2020-03-19 02:21:54', '37'),
(382, '901ea79a-c7f4-4edd-91ae-ff5644115c93', 11, 1, 0, 1, '2020-03-19 02:22:33', '20'),
(383, '901ea7bc-0f56-4dd5-ab23-d49833685e69', 11, 1, 0, 1, '2020-03-19 02:22:55', '131'),
(384, '901ea887-02f3-4d9f-937b-f6753fe94b35', 11, 1, 0, 1, '2020-03-19 02:25:08', '343'),
(385, '901ea8c9-723d-432c-aa82-ee2e1070e751', 11, 1, 0, 6, '2020-03-19 02:25:51', '297'),
(386, '901eaa94-99a2-4b3d-b0af-f4de008ffe50', 11, 1, 0, 1, '2020-03-19 02:30:52', '342'),
(387, '901eacbd-7cef-4727-93ad-a43cae49dc2e', 11, 1, 0, 1, '2020-03-19 02:36:55', '118'),
(388, '901ead73-c5a4-4f01-8fd1-0014d5ca0001', 11, 1, 0, 1, '2020-03-19 02:38:54', '64'),
(389, '901eadd7-af00-438b-a208-33541e972153', 11, 1, 17, 1, '2020-03-19 02:40:00', '38'),
(390, '901eae14-a0f9-4262-9ba8-e796c8baaac8', 11, 1, 17, 1, '2020-03-19 02:40:40', '29'),
(391, '901eae43-6a13-4d65-b35b-acefd3c6fc7f', 11, 1, 17, 1, '2020-03-19 02:41:10', '16'),
(392, '901eae5d-c3cb-4a08-b70b-4667ec7a3aba', 11, 1, 17, 1, '2020-03-19 02:41:27', '20'),
(393, '901eae80-3f01-4ee1-94b4-3d78ef3a1de0', 11, 1, 17, 1, '2020-03-19 02:41:50', '39'),
(394, '901eaebe-3aa5-45cc-8696-4fe593ce391f', 11, 1, 18, 1, '2020-03-19 02:42:31', '13'),
(395, '901eaed3-f2b3-4b44-a92b-50a492c3e8c9', 11, 1, 19, 1, '2020-03-19 02:42:45', '5'),
(396, '901eaedd-26a9-444f-8250-bd871c53b062', 11, 1, 17, 1, '2020-03-19 02:42:51', '7'),
(397, '901eaee9-ab36-45c0-8da2-048d5746bfd1', 11, 1, 0, 1, '2020-03-19 02:42:59', '490'),
(398, '901eb1d7-3a40-485b-b83e-5b02b80ae2a8', 11, 1, 0, 1, '2020-03-19 02:51:10', '204'),
(400, '902000b8-4b73-4f63-adc6-dd66e71287c4', 11, 1, 0, 1, '2020-03-19 18:27:34', '38'),
(401, '902000f6-b8f8-4e31-ac44-d804d6466054', 11, 1, 0, 1, '2020-03-19 18:28:15', '14'),
(402, '9020010f-8db3-458e-9749-066c04687e2c', 11, 1, 0, 1, '2020-03-19 18:28:31', '25'),
(403, '90200139-fef6-42a3-b502-1df38ed93fe8', 11, 1, 0, 1, '2020-03-19 18:28:59', '569'),
(404, '902004a2-f8e8-477a-b220-49b3e2c9943e', 11, 1, 0, 1, '2020-03-19 18:38:31', '78'),
(405, '902004f4-e444-4069-9026-3abe7a018d0f', 11, 1, 0, 6, '2020-03-19 18:39:25', '44'),
(406, '9020051d-5d10-45cb-af8f-13a1a4bbfa70', 11, 1, 0, 1, '2020-03-19 18:39:51', '5'),
(407, '90200528-7e81-4f87-903c-144bfebc3da7', 11, 1, 0, 1, '2020-03-19 18:39:58', '105'),
(408, '9020053a-d653-4e2c-ab9a-931795811a23', 11, 1, 0, 6, '2020-03-19 18:40:10', '87'),
(409, '902005c4-5d2d-4487-b4a4-cdaf8a6a95c3', 11, 1, 0, 6, '2020-03-19 18:41:41', '409'),
(410, '902005cc-12d5-4f58-9683-bdcf7384d6e7', 11, 1, 0, 1, '2020-03-19 18:41:46', '614'),
(411, '90200838-064d-4a1a-8bb0-49dbca0de035', 11, 1, 0, 6, '2020-03-19 18:48:32', '39'),
(412, '90200877-3ba0-4ec5-bdfd-cd55e1081c1e', 11, 1, 0, 6, '2020-03-19 18:49:13', '3972'),
(413, '90200977-ab59-4ce6-99b5-449cf86ae7c7', 11, 1, 0, 1, '2020-03-19 18:52:01', '12'),
(414, '9020098d-f8d5-4cc1-ae8c-b0501f98e56f', 11, 1, 0, 1, '2020-03-19 18:52:16', '14'),
(415, '902009a7-7de1-4499-a9b7-5aa879e83155', 11, 1, 0, 1, '2020-03-19 18:52:33', '109'),
(416, '90200a51-7693-44d2-a8e0-0eec0c6bf2d7', 11, 1, 0, 1, '2020-03-19 18:54:24', '135'),
(417, '90200b23-37b2-4f73-baff-9e3b789b084a', 11, 1, 0, 1, '2020-03-19 18:56:42', '41'),
(418, '90200b65-25f3-4862-819a-93a771e57ebc', 11, 1, 0, 1, '2020-03-19 18:57:25', '85'),
(419, '90200be9-fc9a-4dea-9d79-7f9b868fd6e3', 11, 1, 0, 1, '2020-03-19 18:58:52', '7'),
(420, '90200bf8-7fac-4d26-a449-e1dcdf96615b', 11, 1, 0, 1, '2020-03-19 18:59:01', '16'),
(421, '90200c15-93ed-4b2d-9f94-0e2593700192', 11, 1, 0, 1, '2020-03-19 18:59:20', '632'),
(422, '90200fe0-73b1-457d-b61c-7cf726208a8e', 11, 1, 0, 1, '2020-03-19 19:09:57', '138'),
(423, '902010b6-59f8-4132-8cd6-8a62d614b56d', 11, 1, 0, 1, '2020-03-19 19:12:17', '31'),
(424, '902010e9-709a-4544-a606-6f4293102dd0', 11, 1, 0, 1, '2020-03-19 19:12:50', '5'),
(425, '902010f5-4344-4087-a283-3fdcad766a26', 11, 1, 0, 1, '2020-03-19 19:12:58', '1210'),
(426, '9020182f-8eee-4e57-a68c-288e66c3d329', 11, 1, 0, 1, '2020-03-19 19:33:11', '487'),
(427, '90201b1b-63e7-4819-a4e6-88d437c978a2', 11, 1, 0, 1, '2020-03-19 19:41:21', '1267'),
(428, '90202027-5dcb-4430-9c93-3812214d31a9', 11, 1, 0, 6, '2020-03-19 19:55:28', '422'),
(429, '902022ab-1a81-4ec0-8dc2-54ad608d2312', 11, 1, 0, 1, '2020-03-19 20:02:29', '22'),
(430, '902022af-a3f6-42a7-bf68-01e064e27ac7', 11, 1, 0, 6, '2020-03-19 20:02:32', '22'),
(431, '902022cf-ba33-40c2-b112-b5a2ced81c68', 11, 1, 0, 1, '2020-03-19 20:02:53', '127'),
(432, '902022d4-38a7-4f11-ac3e-b58d7c76ac82', 11, 1, 0, 6, '2020-03-19 20:02:56', '128'),
(433, '90202395-4ca6-441b-abe1-bac5579e06c8', 11, 1, 0, 1, '2020-03-19 20:05:03', '41'),
(434, '9020239a-6391-4f63-a4b5-454451aa2f87', 11, 1, 0, 6, '2020-03-19 20:05:06', '35'),
(435, '902023d6-8c8b-4c63-812a-bd6f9f4b7c10', 11, 1, 0, 1, '2020-03-19 20:05:46', '4896'),
(436, '90209f45-4e31-48ef-8f1f-08c9aa6319b6', 11, 5, 0, 12, '2020-03-20 01:50:54', '9'),
(439, '9020a378-f01b-4a04-866f-f1912fd77d75', 11, 5, 0, 17, '2020-03-20 02:02:39', '21'),
(440, '9020a39b-c3d4-4f2b-8a89-6c5021151fb1', 11, 5, 22, 17, '2020-03-20 02:03:02', '19'),
(443, '9020a49b-bc27-4123-a9dd-74e0b16c93ce', 11, 5, 23, 17, '2020-03-20 02:05:50', '7'),
(445, '90211406-df2e-46fc-8654-1d99ac5165bd', 11, 1, 0, 1, '2020-03-20 07:17:23', '318'),
(446, '9021144a-3be8-4ed0-9fe2-175e503cf9a7', 11, 1, 0, 6, '2020-03-20 07:18:07', '270'),
(447, '902115ef-b5dc-461c-a3ef-a1667834c263', 11, 1, 0, 1, '2020-03-20 07:22:43', '2929'),
(448, '9021277a-bd61-4f3d-83b5-0578f6155749', 11, 1, 17, 1, '2020-03-20 08:11:46', '12'),
(449, '9021cd6b-c9b1-4417-a0a3-cba848ac0248', 11, 1, 0, 1, '2020-03-20 15:55:47', '3'),
(450, '9022d2b5-923a-4b9b-81df-6d1cf8dd1dcc', 11, 1, 0, 1, '2020-03-21 04:06:24', '81'),
(451, '9022d334-6b19-40da-ac66-a384b4223744', 11, 1, 0, 1, '2020-03-21 04:07:47', '85'),
(452, '9022d3bb-013d-46cb-bfe6-74e2dba07d98', 11, 1, 0, 1, '2020-03-21 04:09:15', '108'),
(453, '9022d463-7d9a-4a3f-b0a1-47f8314a0706', 11, 1, 0, 1, '2020-03-21 04:11:05', '145'),
(454, '9022d548-ea60-4792-b549-d850e2f501f7', 11, 1, 0, 1, '2020-03-21 04:13:36', '81'),
(455, '9022d54a-bd39-4c96-aa6a-182d7bf5b73b', 11, 1, 0, 6, '2020-03-21 04:13:37', '79'),
(456, '9022d5c5-a079-4a49-973c-6be09ddac012', 11, 1, 0, 6, '2020-03-21 04:14:57', '144'),
(457, '9022d5c9-db82-4925-86fe-0a87dd57bb3c', 11, 1, 0, 1, '2020-03-21 04:15:00', '141'),
(458, '9022d6a4-6c93-43ca-a52e-b796afb904e9', 11, 1, 0, 6, '2020-03-21 04:17:23', '24'),
(459, '9022d6a5-fa60-43b6-82c0-4934fcca04dd', 11, 1, 0, 1, '2020-03-21 04:17:24', '17'),
(460, '9022d6c4-5920-4c56-bf54-4f0a5e9e83e5', 11, 1, 0, 1, '2020-03-21 04:17:44', '71'),
(461, '9022d6cd-0d8c-44a0-9126-20b38d6db0ca', 11, 1, 0, 6, '2020-03-21 04:17:50', '68'),
(462, '9022d734-30d0-4f3b-b702-2fcc94a15186', 11, 1, 0, 1, '2020-03-21 04:18:58', '25'),
(463, '9022d736-d79c-496a-aad4-c70e7198036c', 11, 1, 0, 6, '2020-03-21 04:18:59', '25'),
(464, '9022d75e-f947-4a8c-bd6c-f174508a09c9', 11, 1, 0, 1, '2020-03-21 04:19:26', '54'),
(465, '9022d760-4970-4375-ad9f-598a42264909', 11, 1, 0, 6, '2020-03-21 04:19:26', '52'),
(466, '9022d7b2-3a03-4c08-aae9-f43b820d1f88', 11, 1, 0, 6, '2020-03-21 04:20:20', '29'),
(467, '9022d7b5-b48b-47e9-900d-e512d4d3340d', 11, 1, 0, 1, '2020-03-21 04:20:22', '24'),
(468, '9022d7de-6411-4914-88c8-a7344b5ee6e8', 11, 1, 0, 1, '2020-03-21 04:20:49', '25'),
(469, '9022d7e1-b86f-4b65-b5e8-4a65b363e76f', 11, 1, 0, 6, '2020-03-21 04:20:51', '19'),
(470, '9022d802-9a24-4eba-b833-be02dca5592f', 11, 1, 0, 6, '2020-03-21 04:21:13', '218'),
(471, '9022d807-e967-466b-b17e-127ac319b5a4', 11, 1, 0, 1, '2020-03-21 04:21:16', '211'),
(472, '9022d94d-ff8a-46fa-a6bd-8b300274e5e3', 11, 1, 0, 1, '2020-03-21 04:24:50', '18'),
(473, '9022d952-b461-4f50-aedf-61ee5a3fe18c', 11, 1, 0, 6, '2020-03-21 04:24:53', '25'),
(474, '9022d96e-6823-461b-b2f7-9aa34cc96446', 11, 1, 0, 1, '2020-03-21 04:25:11', '70'),
(475, '9022d97c-c02c-4a9d-9e49-45fdba862fb4', 11, 1, 0, 6, '2020-03-21 04:25:21', '64'),
(476, '9022d9dc-5cb8-4d00-a61f-d51ce8a1fa10', 11, 1, 0, 1, '2020-03-21 04:26:23', '35'),
(477, '9022d9e1-4161-4115-ad31-b5664ee4578f', 11, 1, 0, 6, '2020-03-21 04:26:27', '29'),
(478, '9022da11-05f4-4756-b719-84b50d1f716f', 11, 1, 0, 6, '2020-03-21 04:26:58', '96'),
(479, '9022da16-622f-47db-82ec-3455bec6b9d8', 11, 1, 0, 1, '2020-03-21 04:27:01', '95'),
(480, '9022daa6-e562-418f-8f60-c0b995a6b15a', 11, 1, 0, 6, '2020-03-21 04:28:36', '65'),
(481, '9022daab-c7da-43db-be23-296cfd7f8465', 11, 1, 0, 1, '2020-03-21 04:28:39', '65'),
(482, '9022db0d-1512-420d-9cb9-96db1f7fa66d', 11, 1, 0, 6, '2020-03-21 04:29:43', '74'),
(483, '9022db13-4ebc-46ad-8997-7b681d1d486a', 11, 1, 0, 1, '2020-03-21 04:29:47', '66'),
(484, '9022db7b-b6c3-42c8-97d7-2a622afeedf9', 11, 1, 0, 1, '2020-03-21 04:30:56', '66'),
(485, '9022db80-d8cf-47e0-b33e-6fbee97767ee', 11, 1, 0, 6, '2020-03-21 04:30:59', '60'),
(486, '9022dbde-fa2e-4ad1-90e8-7eac45362a8b', 11, 1, 0, 6, '2020-03-21 04:32:01', '36'),
(487, '9022dbe4-02e3-452f-9d86-9e26d8a891e9', 11, 1, 0, 1, '2020-03-21 04:32:04', '29'),
(488, '9022dc14-a948-499b-a476-9c9b8914aa94', 11, 1, 0, 1, '2020-03-21 04:32:36', '47'),
(489, '9022dc19-57aa-45e6-b84c-2bf95b83b9f8', 11, 1, 0, 6, '2020-03-21 04:32:39', '41'),
(490, '9022dc5b-1f77-4d51-80cd-f59d6aafc662', 11, 1, 0, 6, '2020-03-21 04:33:22', '148'),
(491, '9022dc60-6567-4f9c-9fd6-51c114e41a25', 11, 1, 0, 1, '2020-03-21 04:33:25', '13'),
(492, '9022dc78-6736-490d-b4c2-1a630f7889bf', 11, 1, 0, 1, '2020-03-21 04:33:41', '121'),
(493, '9022dd36-4657-4d0f-a358-b94c7e78c191', 11, 1, 0, 1, '2020-03-21 04:35:46', '63'),
(494, '9022dd40-829d-4af4-a979-3ab036ac4372', 11, 1, 0, 6, '2020-03-21 04:35:52', '59'),
(495, '9022dd9a-9bc3-465f-a109-585accfd7c62', 11, 1, 0, 1, '2020-03-21 04:36:51', '162'),
(496, '9022dd9e-62b7-4962-8893-b4a3271e826d', 11, 1, 0, 6, '2020-03-21 04:36:54', '162'),
(497, '9022de96-b9f6-40c8-9d09-f39bced2d187', 11, 1, 0, 1, '2020-03-21 04:39:37', '580'),
(498, '9022de99-1a10-4c79-9d63-a87f630ead33', 11, 1, 0, 6, '2020-03-21 04:39:38', '575'),
(499, '9022e211-3441-47a4-a41e-32fc1b03be73', 11, 1, 0, 1, '2020-03-21 04:49:20', '210'),
(500, '9022e354-0a37-49e0-a026-234fe80444e1', 11, 1, 0, 1, '2020-03-21 04:52:52', '160'),
(501, '9022e44d-046c-4eb3-a299-6182da4179e2', 11, 1, 0, 1, '2020-03-21 04:55:35', '15'),
(502, '9022e467-1197-44d9-925a-9d3e4a8ed757', 11, 1, 0, 1, '2020-03-21 04:55:52', '12'),
(503, '9022e47d-3be5-4aab-847e-2b540417b216', 11, 1, 0, 1, '2020-03-21 04:56:07', '4292'),
(504, '9022fe17-c360-492d-8ed9-fd1f42fc9be7', 11, 1, 0, 1, '2020-03-21 06:07:42', '159'),
(505, '9026b6e2-ec29-4e49-b0ff-c311dcd98383', 11, 1, 0, 1, '2020-03-23 02:31:54', '228'),
(506, '9026b71f-640b-449f-8611-2b0dbe7ececa', 11, 1, 0, 6, '2020-03-23 02:32:34', '999'),
(507, '9026b842-5ac9-4467-b4b1-692227dcd865', 11, 1, 0, 1, '2020-03-23 02:35:45', '38'),
(508, '9026b87f-765f-43ae-959c-e86eecaadecd', 11, 1, 0, 1, '2020-03-23 02:36:25', '162'),
(509, '9026b97b-25fe-4e87-9e4e-fab95dd54635', 11, 1, 0, 1, '2020-03-23 02:39:10', '14'),
(510, '9026b994-3133-406a-89d7-4f31b8f60f69', 11, 1, 0, 1, '2020-03-23 02:39:26', '28'),
(511, '9026b9c2-b847-4673-b780-927645e4baa5', 11, 1, 0, 1, '2020-03-23 02:39:57', '59'),
(512, '9026ba21-1aeb-49bb-8789-5d6421a36aac', 11, 1, 0, 1, '2020-03-23 02:40:58', '21'),
(513, '9026ba44-e69d-4dab-a1c0-637b6c45b618', 11, 1, 0, 1, '2020-03-23 02:41:22', '2'),
(514, '9026ba4b-5c02-4ae1-a9ac-dbfa6eea2908', 11, 1, 0, 1, '2020-03-23 02:41:26', '92'),
(515, '9026bada-ea1a-4fc6-ab66-fe53b6a64e3a', 11, 1, 0, 1, '2020-03-23 02:43:00', '13'),
(516, '9026baf1-924e-4272-9e0d-c43eaaa8ff41', 11, 1, 0, 1, '2020-03-23 02:43:15', '351'),
(517, '9026bd0c-5be2-49dc-8fec-14c9708ca2ee', 11, 1, 0, 1, '2020-03-23 02:49:08', '52'),
(518, '9026bd15-88f2-49d5-a661-e80ff0a073c5', 11, 1, 0, 6, '2020-03-23 02:49:14', '43'),
(519, '9026bd5a-5fb9-47fa-87f2-b414a55c8bb4', 11, 1, 0, 6, '2020-03-23 02:49:59', '24'),
(520, '9026bd5e-6234-4d56-ae5f-473b43350f52', 11, 1, 0, 1, '2020-03-23 02:50:02', '19'),
(521, '9026bd7f-d30c-4b9b-9f30-885473f445a6', 11, 1, 0, 1, '2020-03-23 02:50:24', '1508'),
(522, '9026bd82-06b5-4cdd-b68d-f3b1d224805a', 11, 1, 0, 6, '2020-03-23 02:50:25', '1602'),
(523, '9026c681-2b77-4439-bb63-68cc7504539b', 11, 1, 0, 1, '2020-03-23 03:15:35', '91'),
(524, '9026c70f-e3ec-411e-b312-6b67b74206f6', 11, 1, 0, 1, '2020-03-23 03:17:08', '95'),
(525, '9026c711-8464-4d3c-9339-9b1dd0914a55', 11, 1, 0, 6, '2020-03-23 03:17:09', '2154'),
(526, '9026c7a5-4ee2-49a5-8dde-d60b5a04a690', 11, 1, 0, 1, '2020-03-23 03:18:46', '20'),
(527, '9026c7c6-47c2-4bd3-8466-bfb9088cd588', 11, 1, 0, 1, '2020-03-23 03:19:08', '26'),
(528, '9026c7f1-7311-4aa9-95e8-2cad1319a8c6', 11, 1, 0, 1, '2020-03-23 03:19:36', '53'),
(529, '9026c846-db72-4ef9-a99b-f6512a903e9c', 11, 1, 0, 1, '2020-03-23 03:20:32', '47'),
(530, '9026c892-950b-4863-8c65-258f121cfd62', 11, 1, 0, 1, '2020-03-23 03:21:22', '32'),
(531, '9026c8c7-2e26-4c6d-b767-bcd8f0bcd90a', 11, 1, 0, 1, '2020-03-23 03:21:56', '153'),
(532, '9026c9b4-8e22-4ab3-b144-2c976c2488a6', 11, 1, 0, 1, '2020-03-23 03:24:32', '4'),
(533, '9026c9be-8e6c-4b03-a0a6-93223db24968', 11, 1, 0, 1, '2020-03-23 03:24:38', '36'),
(534, '9026c9f8-e4f8-4505-bca9-833398ab38f6', 11, 1, 0, 1, '2020-03-23 03:25:16', '209'),
(535, '9026cb3c-877c-4344-82a2-148998339f71', 11, 1, 0, 1, '2020-03-23 03:28:48', '197'),
(536, '9026cc6f-20af-4fa9-9cd3-c865bcbce4f9', 11, 1, 0, 1, '2020-03-23 03:32:09', '3'),
(537, '9026cc78-1713-4284-807f-1d7b005dc8ef', 11, 1, 0, 1, '2020-03-23 03:32:15', '159'),
(538, '9026cd6c-f622-484b-a98b-04f699693337', 11, 1, 0, 1, '2020-03-23 03:34:56', '1084'),
(539, '9026d3e6-352e-46a1-aa75-d34646742dbc', 11, 1, 0, 1, '2020-03-23 03:53:02', '112'),
(540, '9026d3ea-e251-47e8-b76a-4d59999c5c8c', 11, 1, 0, 6, '2020-03-23 03:53:05', '32'),
(541, '9026d41e-d38c-4902-83f9-b3db9442cad0', 11, 1, 0, 6, '2020-03-23 03:53:39', '74'),
(542, '9026d492-eed9-48cf-9214-8023097156b2', 11, 1, 0, 6, '2020-03-23 03:54:55', '86'),
(543, '9026d494-bb64-4cdd-8c56-f50f3be627fe', 11, 1, 0, 1, '2020-03-23 03:54:56', '84'),
(544, '9026d517-c5e9-4952-bdb9-e33bdd63f9a1', 11, 1, 0, 1, '2020-03-23 03:56:22', '89'),
(545, '9026d51b-3699-4395-b469-de1993335884', 11, 1, 0, 6, '2020-03-23 03:56:24', '96'),
(546, '9026d5a3-605d-4262-8c98-78154c38225d', 11, 1, 0, 1, '2020-03-23 03:57:54', '49'),
(547, '9026d5b0-8725-478a-9a77-a8e5b8fe71ea', 11, 1, 0, 6, '2020-03-23 03:58:02', '44'),
(548, '9026d5f2-0253-4555-8fbf-c4e290175ede', 11, 1, 0, 1, '2020-03-23 03:58:45', '143'),
(549, '9026d5f6-ae6d-4a37-a93d-611608aed5f4', 11, 1, 0, 6, '2020-03-23 03:58:48', '15'),
(550, '9026d611-5da4-46e0-ac08-20055ea3f008', 11, 1, 0, 6, '2020-03-23 03:59:06', '123'),
(551, '9026d6cf-4f53-4a05-b5a4-60faa1df78ac', 11, 1, 0, 1, '2020-03-23 04:01:10', '70'),
(552, '9026d6d1-5836-4a73-8cea-afc7c0be3028', 11, 1, 0, 6, '2020-03-23 04:01:12', '89'),
(553, '9026d73e-5cc5-4a08-9326-a3edf15afcaf', 11, 1, 0, 1, '2020-03-23 04:02:23', '299'),
(554, '9026d75c-8729-4ac9-b6dc-ec0bae2b17ac', 11, 1, 0, 6, '2020-03-23 04:02:43', '283'),
(555, '9026d909-d7fe-47b4-973a-3b74d23bdfce', 11, 1, 0, 1, '2020-03-23 04:07:24', '280'),
(556, '9026d90f-d084-47c5-a99d-2dfca1e099d8', 11, 1, 0, 6, '2020-03-23 04:07:28', '24'),
(557, '9026d938-ea05-4fe6-9097-4833c7388ae3', 11, 1, 0, 6, '2020-03-23 04:07:55', '44'),
(558, '9026d980-0dc4-492c-9e3f-2fdecceb4ad8', 11, 1, 0, 6, '2020-03-23 04:08:42', '207'),
(559, '9026dab9-2f79-4eda-ba21-81c2ec68c6c4', 11, 1, 0, 1, '2020-03-23 04:12:07', '71'),
(560, '9026dabf-8a89-44af-be73-b84ea21969cd', 11, 1, 0, 6, '2020-03-23 04:12:11', '1265'),
(561, '9026db2a-032c-4901-bffe-388bc5f6f59b', 11, 1, 0, 1, '2020-03-23 04:13:21', '95'),
(562, '9026dbbe-6ad8-4889-abd8-15c0219674ec', 11, 1, 0, 1, '2020-03-23 04:14:58', '1087'),
(563, '9026e23c-0930-4b19-8c75-36cbdb2f7f96', 11, 1, 0, 1, '2020-03-23 04:33:07', '77'),
(564, '9026e24c-fff3-45e7-93fc-dc0431f260a6', 11, 1, 0, 6, '2020-03-23 04:33:18', '31'),
(565, '9026e27f-fed0-431f-be7a-456f3270a708', 11, 1, 0, 6, '2020-03-23 04:33:51', '35'),
(566, '9026e2b4-26e6-46ba-bb5a-0bbd51287b57', 11, 1, 0, 1, '2020-03-23 04:34:26', '34'),
(567, '9026e2b9-1684-4294-aa11-f117bb5d486d', 11, 1, 0, 6, '2020-03-23 04:34:29', '34'),
(568, '9026e2ea-98a6-4157-8eef-b0c4f3d9d5fb', 11, 1, 0, 1, '2020-03-23 04:35:01', '29'),
(569, '9026e2f0-4f71-4e96-a429-99fd7a5e7793', 11, 1, 0, 6, '2020-03-23 04:35:05', '28'),
(570, '9026e319-ba23-4a1f-96fc-3b630347dd9a', 11, 1, 0, 1, '2020-03-23 04:35:32', '23'),
(571, '9026e31f-0c61-433d-ac08-3a62c6c0f216', 11, 1, 0, 6, '2020-03-23 04:35:36', '14'),
(572, '9026e340-73a3-4d1d-83c3-2328856e7140', 11, 1, 0, 1, '2020-03-23 04:35:58', '1039'),
(575, '9026ea16-61df-464e-b6ee-b79719e65375', 11, 1, 0, 1, '2020-03-23 04:55:04', '34'),
(576, '9026ea4c-4ad9-4164-9ad7-c4bc05c705f0', 11, 1, 0, 1, '2020-03-23 04:55:40', '19'),
(577, '9026ea6c-f482-4fbe-a603-e25641033c59', 11, 1, 0, 1, '2020-03-23 04:56:01', '30'),
(579, '9026eafb-2488-4402-98f7-eadb4bf4ce99', 11, 1, 0, 1, '2020-03-23 04:57:34', '148'),
(580, '9026ebe1-31ae-4842-9d25-9b0a37e9b1b0', 11, 1, 0, 1, '2020-03-23 05:00:05', '1918'),
(581, '9026f755-0768-4cf6-addd-6ec17cdbea5d', 11, 1, 0, 1, '2020-03-23 05:32:07', '3'),
(582, '9026f75c-2c61-4690-86ae-b82f33c82818', 11, 1, 17, 1, '2020-03-23 05:32:11', '80'),
(583, '9026f7d8-9245-4ebc-b151-c368b0077390', 11, 1, 17, 1, '2020-03-23 05:33:33', '37'),
(584, '902eb7e7-56a9-4cc0-ba5d-43f2c20bb4a1', 11, 1, 0, 6, '2020-03-27 02:01:22', '499'),
(585, '902ebae4-1bd7-40c4-aa63-ac73cb1ffab1', 11, 1, 0, 6, '2020-03-27 02:09:44', '65'),
(586, '902ebb4b-4803-4b74-ac18-2e9635edd8f1', 11, 1, 0, 6, '2020-03-27 02:10:51', '144'),
(587, '902ebc2b-4b60-4690-a82c-c9e8820d9483', 11, 1, 0, 6, '2020-03-27 02:13:18', '87'),
(588, '902ebcb3-20a2-48f9-ab0e-794c79cc38a5', 11, 1, 0, 6, '2020-03-27 02:14:47', '438'),
(589, '902f0b91-ea9c-4520-b382-386d66c7abcc', 11, 1, 0, 6, '2020-03-27 05:55:19', '84'),
(590, '902f0c1a-67d6-414f-b628-befe9dcc071f', 11, 2, 0, 6, '2020-03-27 05:56:49', '1132'),
(592, '9030f152-e58d-45a4-ba73-f2077916e415', 11, 1, 0, 2, '2020-03-28 04:33:35', '36'),
(594, '9030f1fe-c8e2-4179-9a07-fde343994e93', 11, 1, 0, 7, '2020-03-28 04:35:28', '38'),
(595, '9030f819-17d0-4d6b-b863-955550b79c1c', 11, 1, 0, 19, '2020-03-28 04:52:32', '73'),
(596, '903216e2-c39e-4a17-a97b-046b373e4dc3', 11, 1, 0, 6, '2020-03-28 18:14:27', '98'),
(597, '9032177b-c804-4492-96bc-c95c220d530e', 11, 1, 0, 6, '2020-03-28 18:16:07', '34'),
(598, '903217b3-fafa-4c70-9634-e6869071a196', 11, 1, 0, 6, '2020-03-28 18:16:44', '42'),
(599, '903217f7-c881-45ca-a3be-17e1c0654619', 11, 1, 0, 6, '2020-03-28 18:17:28', '66'),
(600, '90321861-ea1d-4388-bfa7-bfb8fcaeee50', 11, 1, 0, 6, '2020-03-28 18:18:38', '378'),
(601, '90321aa6-e1f8-4b2d-8725-009fd055b1c7', 11, 1, 0, 6, '2020-03-28 18:24:59', '182'),
(602, '90321bc0-e1c7-44c3-9933-ee48c3ad8aa4', 11, 1, 0, 6, '2020-03-28 18:28:03', '26'),
(604, '90325035-c8e1-4ae1-82cd-16a310f0b188', 11, 1, 0, 7, '2020-03-28 20:54:44', '15'),
(605, '90325050-6596-4fb6-8121-51fe6b88bee1', 11, 1, 0, 7, '2020-03-28 20:55:02', '77'),
(607, '9033124e-6adb-433f-9b20-210b9da80a19', 11, 1, 0, 1, '2020-03-29 05:57:28', '57'),
(608, '903312a8-80ca-4296-a79c-d3e706968cac', 11, 1, 0, 1, '2020-03-29 05:58:27', '342'),
(609, '903314b6-3559-43c4-8f82-5695501563e0', 11, 1, 0, 1, '2020-03-29 06:04:12', '122'),
(610, '9034187d-9b3d-4252-abe4-69a7aaf7ce0a', 11, 2, 0, 6, '2020-03-29 18:10:35', '93'),
(613, '903627f6-2498-437c-9c32-5fc20b26d356', 11, 1, 0, 1, '2020-03-30 18:45:30', '9'),
(614, '90362808-91ed-49e1-87e0-93cd123dd0d7', 11, 1, 0, 1, '2020-03-30 18:45:42', '7'),
(615, '90362817-ce88-4f83-9251-db0edd122b65', 11, 2, 0, 1, '2020-03-30 18:45:52', '508'),
(616, '90362aaa-bc78-4b27-965e-548e58acb736', 11, 1, 0, 7, '2020-03-30 18:53:04', '84'),
(617, '9036f5ba-e83e-4d5a-bd18-d3f3fead6025', 11, 2, 0, 1, '2020-03-31 04:20:53', '69'),
(618, '9036f600-faae-479d-81f7-ccb9263f5959', 11, 2, 0, 6, '2020-03-31 04:21:38', '22'),
(619, '9036f625-d5e0-44f4-a29e-c8371c24a482', 11, 2, 0, 6, '2020-03-31 04:22:03', '189'),
(620, '9036f628-2794-4ae9-ba0e-1feb2495443f', 11, 2, 0, 1, '2020-03-31 04:22:04', '189'),
(621, '9036f74a-bd3d-44c9-acdd-e645c7e3613c', 11, 2, 0, 6, '2020-03-31 04:25:15', '761'),
(622, '9036f74c-f8d5-420f-af5e-d9a1b03132d8', 11, 2, 0, 1, '2020-03-31 04:25:16', '762'),
(623, '9036fbd9-6a55-4dd0-8a29-56433f9fe563', 11, 2, 0, 6, '2020-03-31 04:37:59', '42'),
(624, '9036fbdb-82b3-4403-a81d-0ae7b17ace52', 11, 2, 0, 1, '2020-03-31 04:38:01', '44'),
(625, '9036fc1f-91cd-4158-8f9f-cb891e615511', 11, 2, 0, 6, '2020-03-31 04:38:45', '68'),
(626, '9036fc22-4f90-47a2-ac9f-793105cb80c9', 11, 2, 0, 1, '2020-03-31 04:38:47', '66'),
(627, '9036fc8b-0e94-43b6-aaee-e9f20ee5e3db', 11, 2, 0, 1, '2020-03-31 04:39:56', '267'),
(628, '9036fc8d-0907-43a2-b01a-734f745d7efd', 11, 2, 0, 6, '2020-03-31 04:39:57', '59'),
(629, '9036fceb-b1fa-4b67-8138-88a081da5c8f', 11, 2, 0, 6, '2020-03-31 04:40:59', '208'),
(630, '9036fe26-92b1-470c-82e8-354332a503fe', 11, 2, 0, 1, '2020-03-31 04:44:25', '116'),
(631, '9036fe2d-e18f-44f4-bab6-413c9e88ea82', 11, 2, 0, 6, '2020-03-31 04:44:30', '29'),
(633, '9036feda-84fa-48e6-8651-b5bdcf99254a', 11, 2, 0, 1, '2020-03-31 04:46:23', '1941'),
(634, '90380971-73d0-4547-911f-b8743ac6c6de', 11, 1, 0, 1, '2020-03-31 17:11:50', '13'),
(635, '90380989-88f3-439b-9649-014fa2a0810c', 11, 1, 0, 1, '2020-03-31 17:12:05', '387'),
(636, '90380bdd-0707-41c4-b08c-b4f39a54ce8a', 11, 1, 0, 1, '2020-03-31 17:18:36', '5932'),
(637, '90385687-fdd3-45d1-bae9-021fa4428878', 11, 2, 0, 1, '2020-03-31 20:47:23', '148');
INSERT INTO `courses_log` (`id_c_log`, `uuid`, `id_company`, `id_courses`, `id_materials`, `id_participant`, `start_access`, `total_access_time`) VALUES
(639, '90388d3c-987a-4071-a608-5ca25f77aed0', 11, 1, 0, 1, '2020-03-31 23:20:21', '4'),
(640, '90389b60-2375-479a-956d-8ce34fe0c14a', 11, 2, 0, 1, '2020-03-31 23:59:53', '6'),
(643, '9052aa14-7eaf-43f0-a919-0a85ee1ede1f', 11, 1, 0, 1, '2020-04-13 22:52:31', '162'),
(644, '9052ab0e-d519-4b6a-af5d-f0bda9b89bac', 11, 1, 17, 1, '2020-04-13 22:55:15', '169'),
(645, '9052ae77-63e2-4010-8011-7b05a94b9097', 11, 1, 17, 1, '2020-04-13 23:04:47', '39'),
(646, '9052aeb6-a1b5-4e0e-ac36-15a5ca09aae7', 11, 1, 17, 1, '2020-04-13 23:05:29', '134'),
(647, '9052afa1-de58-4c4c-9a0f-4edd3e2cc86f', 11, 1, 17, 1, '2020-04-13 23:08:03', '31'),
(650, '9052b008-8d03-4bff-9a5d-b26f4f53c73f', 11, 1, 17, 1, '2020-04-13 23:09:10', '100'),
(651, '9052b0a3-d53b-4399-97fa-f28a41794649', 11, 1, 17, 1, '2020-04-13 23:10:52', '161'),
(654, '9052b847-2be7-40c2-958e-b5aa046f0657', 11, 1, 17, 1, '2020-04-13 23:32:13', '15'),
(655, '90532765-b464-4a47-9b07-b8b4d89beeb7', 11, 1, 0, 1, '2020-04-14 04:42:56', '8'),
(656, '90532775-449f-4f56-8843-190ab9f48b88', 11, 1, 17, 1, '2020-04-14 04:43:06', '19'),
(657, '90532794-e35d-4937-9f64-84cfc4796430', 11, 1, 18, 1, '2020-04-14 04:43:27', '53'),
(658, '905327e8-ea80-41ba-86f1-e85af6aa30ca', 11, 1, 18, 1, '2020-04-14 04:44:22', '87'),
(659, '9053288c-9f45-4243-afea-4e40513b194f', 11, 1, 18, 1, '2020-04-14 04:46:09', '58'),
(660, '90533e75-48dd-4bae-9952-9067b7a8624d', 11, 1, 0, 1, '2020-04-14 05:47:25', '492'),
(661, '9058cc62-ca87-40e3-a764-7a363cfad80d', 11, 1, 0, 1, '2020-04-17 00:03:25', '6'),
(662, '9058cc6f-2c2e-4df3-9926-57effcf62d16', 11, 1, 17, 1, '2020-04-17 00:03:33', '5'),
(663, '9058cc78-9869-4726-a46b-a8412ea0c38f', 11, 1, 18, 1, '2020-04-17 00:03:39', '5'),
(664, '9058cc83-1a74-4306-84af-375e5aac575f', 11, 1, 19, 1, '2020-04-17 00:03:46', '3'),
(665, '9058cc89-790e-423b-b33a-cf51b9254296', 11, 1, 21, 1, '2020-04-17 00:03:50', '143'),
(666, '9058d11c-3a04-4510-bc9c-56a21aa58f80', 11, 1, 19, 1, '2020-04-17 00:16:38', '3'),
(667, '9069395e-8b98-4004-b856-64b220770258', 11, 1, 0, 1, '2020-04-25 04:01:24', '1834'),
(669, '906945b3-7cb6-4b05-a0a6-9516e50e649e', 11, 1, 17, 1, '2020-04-25 04:35:53', '6'),
(670, '906945bf-cedb-42ed-8fbe-7e46be23abac', 11, 1, 18, 1, '2020-04-25 04:36:01', '227'),
(671, '9069471e-02b9-49c6-b32d-2607523bfbe7', 11, 1, 18, 1, '2020-04-25 04:39:51', '203'),
(673, '906f0470-bb22-4405-8c53-455ec540b8c7', 11, 1, 0, 1, '2020-04-28 01:08:22', '596'),
(674, '90731b9d-d993-4236-ae2b-5b2c641a896b', 11, 1, 0, 1, '2020-04-30 01:56:29', '25'),
(675, '9073204f-28ed-4b38-b553-3203c960b4e2', 11, 1, 0, 6, '2020-04-30 02:09:36', '28'),
(676, '90732e90-addd-4541-8804-8ca7cd37fc8b', 11, 1, 0, 1, '2020-04-30 02:49:28', '78'),
(677, '90732eac-65ca-40f5-9a70-d37545717b22', 11, 1, 0, 6, '2020-04-30 02:49:46', '193'),
(678, '90733721-1cc4-41e8-8e34-548dac000d92', 11, 1, 0, 1, '2020-04-30 03:13:25', '2147'),
(679, '9080adc4-2bee-41d0-8bdb-e6c4400f03bd', 11, 1, 0, 27, '2020-05-06 19:50:55', '73'),
(680, '9080af47-ee12-4335-a96a-02f6e8340fbb', 11, 1, 0, 28, '2020-05-06 19:55:09', '303'),
(681, '9080b455-6f55-47aa-8a7d-d617538a75d8', 11, 1, 0, 30, '2020-05-06 20:09:17', '17'),
(682, '9082c841-9aef-4923-989b-7f34efe28ae3', 11, 4, 0, 1, '2020-05-07 20:56:39', '10'),
(683, '9082c855-01a4-4b60-b3db-dadccf8eaabd', 11, 4, 0, 1, '2020-05-07 20:56:51', '5'),
(684, '90835533-91df-4bd0-bca9-7a1291c337aa', 11, 4, 0, 1, '2020-05-08 03:30:45', '4'),
(685, '90835544-1538-4723-9cce-9580d35123ad', 11, 3, 0, 1, '2020-05-08 03:30:56', '4'),
(686, '90835551-4721-4ef6-921b-0c65e382983b', 11, 2, 0, 1, '2020-05-08 03:31:05', '2'),
(687, '90835557-1f11-43af-92f7-7224b542fe33', 11, 2, 20, 1, '2020-05-08 03:31:08', '4'),
(688, '9084890c-b149-4cd5-94d5-347167b2068a', 11, 4, 0, 1, '2020-05-08 17:51:33', '4'),
(690, '90848cb8-26a2-4835-a0d9-ef1b32d5c013', 11, 4, 0, 1, '2020-05-08 18:01:49', '2'),
(691, '9088bec0-05c8-48bf-81f5-963c5e0cc865', 11, 1, 0, 1, '2020-05-10 20:05:02', '31'),
(692, '9088bef2-fc33-44d0-8527-2af46a0fd024', 11, 1, 17, 1, '2020-05-10 20:05:35', '60'),
(693, '9088bf7a-685f-4d03-ba1f-8b2058edc34f', 11, 1, 18, 1, '2020-05-10 20:07:04', '32'),
(694, '9088bfb0-39a2-4601-a6fc-bd1670e5d67b', 11, 1, 18, 1, '2020-05-10 20:07:39', '10'),
(695, '9088bfc2-268e-458d-9e7a-61e41beddcc5', 11, 1, 19, 1, '2020-05-10 20:07:51', '35'),
(696, '9088bffb-281d-4846-9818-30ed9c325787', 11, 1, 19, 1, '2020-05-10 20:08:28', '7'),
(697, '9088c008-4322-430d-83db-93a54c2d05f6', 11, 1, 18, 1, '2020-05-10 20:08:37', '4'),
(698, '9088c095-48c8-4f4d-9a5b-8c3d1960b9af', 11, 1, 0, 1, '2020-05-10 20:10:09', '1'),
(699, '9088c099-f682-48cd-abb1-6311c64b6ada', 11, 1, 19, 1, '2020-05-10 20:10:12', '59'),
(700, '9088c10c-bb2a-434c-897f-11dd2cdac8ed', 11, 1, 18, 1, '2020-05-10 20:11:27', '48'),
(701, '9088c1be-0ebe-4fb0-87b7-2028fa4e16ae', 11, 1, 17, 1, '2020-05-10 20:13:24', '38'),
(702, '9088c34d-55d5-4547-b0b7-b8579a0a35c9', 11, 1, 19, 1, '2020-05-10 20:17:45', '37'),
(703, '9088c38a-9944-491f-8a52-6ea569baeda4', 11, 1, 19, 1, '2020-05-10 20:18:25', '316'),
(704, '9088c570-472b-49c0-8697-ad78377268a6', 11, 1, 21, 1, '2020-05-10 20:23:44', '6'),
(705, '9088cb77-fc72-4a79-a296-2746947aafb4', 11, 4, 0, 1, '2020-05-10 20:40:35', '15'),
(706, '9088cb99-62e8-4961-8a01-569bbb33e72b', 11, 2, 0, 1, '2020-05-10 20:40:57', '8'),
(707, '9088cbb6-88b7-452a-a97a-a3f9ffd43091', 11, 3, 0, 1, '2020-05-10 20:41:16', '44'),
(708, '9088cc17-d7cd-4816-963f-cd5d463f6e3d', 11, 3, 0, 1, '2020-05-10 20:42:20', '160'),
(709, '908b96fb-67c1-43a8-a6e4-ee87ce9c9029', 11, 1, 0, 1, '2020-05-12 06:01:19', '21'),
(710, '90c14be6-7663-47ba-bb50-394b0cb56457', 11, 1, 0, 1, '2020-06-07 22:46:04', '1213'),
(711, '90c176b6-5f1a-4d35-9d9b-e18eaf5a55f4', 11, 1, 0, 1, '2020-06-08 00:45:47', NULL),
(712, '90c1ab7b-7952-4283-8536-811a041a1306', 11, 1, 0, 1, '2020-06-08 03:13:20', '389'),
(713, '90c1add1-7a2c-4cdb-8789-d9903a0c8e45', 11, 1, 0, 1, '2020-06-08 03:19:52', '11'),
(714, '90c1ade4-1819-4ad0-b37a-6e22d4b932f7', 11, 1, 0, 1, '2020-06-08 03:20:05', '89'),
(715, '90c1ae6e-51f8-4323-b595-a50fe8ba148b', 11, 1, 0, 1, '2020-06-08 03:21:35', '266'),
(716, '90c1b005-dede-44ef-85a1-a32efe716b54', 11, 1, 0, 1, '2020-06-08 03:26:02', '200'),
(717, '90c1b139-a6d9-4563-9804-2c5bd25376cc', 11, 1, 0, 1, '2020-06-08 03:29:24', '489'),
(718, '90c1b425-f3bf-4eca-9c67-52a5a7f322dc', 11, 1, 0, 1, '2020-06-08 03:37:34', '32'),
(719, '90c1b459-1be0-4f0a-93b1-20d48344c8a4', 11, 1, 0, 1, '2020-06-08 03:38:08', '28'),
(720, '90c1b485-b897-484c-975e-3f31d1208104', 11, 1, 0, 1, '2020-06-08 03:38:37', '79'),
(721, '90c1b500-95cf-4727-9c8b-e4820dbf5cfc', 11, 1, 0, 1, '2020-06-08 03:39:58', '134'),
(722, '90c1b5d0-7af1-4af3-871d-dfc594eb042d', 11, 1, 0, 1, '2020-06-08 03:42:14', '404'),
(723, '90c1b83b-d715-4207-aac8-e7a7f72d09c3', 11, 1, 0, 1, '2020-06-08 03:49:00', '123'),
(724, '90c1b8f9-ebad-46ce-9aef-f759e911cedf', 11, 1, 0, 1, '2020-06-08 03:51:04', '55'),
(725, '90c1b94f-df13-4581-bbc0-35460a8297d0', 11, 1, 0, 1, '2020-06-08 03:52:01', '186'),
(726, '90c1ba6e-e2cd-446d-95e6-691cf141e616', 11, 1, 0, 1, '2020-06-08 03:55:09', '3295'),
(727, '90c1ce17-c85c-426c-a14b-94786ef18e2a', 11, 1, 0, 1, '2020-06-08 04:50:07', NULL),
(728, '90c1ce31-b53e-4751-8fd3-d350f8e3965b', 11, 1, 0, 1, '2020-06-08 04:50:24', NULL),
(729, '90c1ce48-2ebe-48ff-8657-05a4536a254d', 11, 1, 0, 1, '2020-06-08 04:50:39', '111'),
(730, '90c1cef3-02bd-42b4-bdf2-6d56322546ce', 11, 1, 0, 1, '2020-06-08 04:52:31', '42'),
(731, '90c1cf35-5bd3-4367-9e35-afa88fe1dc16', 11, 1, 0, 1, '2020-06-08 04:53:14', '176'),
(732, '90c1d044-0848-4d6e-8544-ef6eae0a3361', 11, 1, 0, 1, '2020-06-08 04:56:12', '74'),
(733, '90c1d0b7-ccfd-4b52-8211-a761de736d95', 11, 1, 0, 1, '2020-06-08 04:57:27', '49'),
(734, '90c1d105-13c1-43e8-a0b0-6ae2cd2e62b1', 11, 1, 0, 1, '2020-06-08 04:58:18', '85'),
(735, '90c1d188-51b8-426c-98f1-51eace4c9982', 11, 1, 0, 1, '2020-06-08 04:59:44', NULL),
(736, '90c1d45b-2c81-4d73-a03c-08285f5d56e0', 11, 1, 0, 30, '2020-06-08 05:07:38', '900'),
(737, '90c1d9b9-25df-47c1-a342-d15a6c639159', 11, 1, 0, 30, '2020-06-08 05:22:38', '21'),
(738, '90c1d9da-14ed-43ec-9afa-4219c875ea54', 11, 1, 0, 30, '2020-06-08 05:23:00', '14'),
(739, '90c1d9f1-0a34-4853-ba0a-bb51fff2e7bc', 11, 1, 0, 30, '2020-06-08 05:23:15', '15'),
(740, '90c1da0a-6189-4528-bf6c-c80c4faf3da4', 11, 1, 0, 30, '2020-06-08 05:23:32', '28'),
(741, '90c1da37-1975-458f-8d11-f04afa9da5a5', 11, 1, 0, 30, '2020-06-08 05:24:01', '72'),
(742, '90c1daa8-0431-4d93-9e2a-8159f3116f96', 11, 1, 0, 30, '2020-06-08 05:25:15', '920'),
(743, '90c1e026-af16-4404-99df-80f4b8c8ee0c', 11, 1, 0, 30, '2020-06-08 05:40:37', '48'),
(744, '90c1e072-284c-40a3-a057-47773674943e', 11, 1, 0, 30, '2020-06-08 05:41:26', '107'),
(745, '90c1e118-3fef-4258-b9aa-158223f1fae4', 11, 1, 0, 30, '2020-06-08 05:43:15', '135'),
(746, '90c1e1e8-4eac-4975-a093-fbdd57faf97c', 11, 1, 0, 30, '2020-06-08 05:45:31', '3'),
(747, '90c1e1ef-4393-4065-887b-cc60ae715c1d', 11, 1, 0, 30, '2020-06-08 05:45:36', '21'),
(748, '90c1e211-20b4-486e-9a22-1585a7a64289', 11, 1, 0, 30, '2020-06-08 05:45:58', '36'),
(749, '90c1e24a-d96b-4839-852c-4a769eaf1916', 11, 1, 0, 30, '2020-06-08 05:46:36', '23'),
(750, '90c1e270-c875-4b26-95f5-2b49ce9fec25', 11, 1, 0, 30, '2020-06-08 05:47:01', '43'),
(751, '90c1e2b5-6128-4ff8-af57-7cc0316b3edc', 11, 1, 0, 30, '2020-06-08 05:47:46', '94'),
(752, '90c1e347-93ff-4bcc-9d79-a6d947bd5bdc', 11, 1, 0, 30, '2020-06-08 05:49:22', '44'),
(753, '90c1e38e-08bf-4fb0-ad96-ad56a177d27c', 11, 1, 0, 30, '2020-06-08 05:50:08', '37'),
(754, '90c1e3c9-8b3d-4477-b21c-2f38a62c2265', 11, 1, 0, 30, '2020-06-08 05:50:47', '89'),
(755, '90c1e454-2eb4-4ad9-8656-89dca8784fbb', 11, 1, 0, 30, '2020-06-08 05:52:18', '37'),
(756, '90c1e48f-7e29-40ff-be03-5a32051223b1', 11, 1, 0, 30, '2020-06-08 05:52:56', '27'),
(757, '90c1e4bb-cf28-401f-8bf6-75143cdccb36', 11, 1, 0, 30, '2020-06-08 05:53:26', '7'),
(758, '90c1e4c9-9a63-4ac6-a271-a1332d420762', 11, 1, 0, 30, '2020-06-08 05:53:35', '21'),
(759, '90c1e4ec-52e1-4e57-a427-ad4310242272', 11, 1, 0, 30, '2020-06-08 05:53:57', '57'),
(760, '90c1e546-2460-4c7c-8d1f-21d53c708d6e', 11, 1, 0, 30, '2020-06-08 05:54:56', '550'),
(761, '90c1e88f-435e-407d-937f-c116e7cc346e', 11, 1, 0, 30, '2020-06-08 06:04:07', '30'),
(762, '90c1e8bf-3478-4ef4-ab6b-d1d12004437d', 11, 1, 0, 30, '2020-06-08 06:04:39', '89'),
(763, '90c1e949-7fdd-41c2-b3b1-bdf4df242194', 11, 1, 0, 30, '2020-06-08 06:06:09', '356'),
(764, '90c1eb6b-b7f4-4b68-9aaf-f770f7595ab7', 11, 1, 0, 30, '2020-06-08 06:12:07', '34'),
(765, '90c1eba2-1a62-420f-b2f7-6e27df1eae33', 11, 1, 0, 30, '2020-06-08 06:12:43', '25'),
(766, '90c1ebca-e9cd-433b-b95a-2e8bd6ff0865', 11, 1, 0, 30, '2020-06-08 06:13:10', '21'),
(767, '90c1ebed-ab03-44a0-9574-e5fc784de60b', 11, 1, 0, 30, '2020-06-08 06:13:33', '34'),
(768, '90c1ec24-1854-41e3-a7ee-959d40801d3e', 11, 1, 0, 30, '2020-06-08 06:14:08', '3418'),
(769, '90c20068-e44d-4e88-be3b-4dda135ae63a', 11, 1, 0, 1, '2020-06-08 07:10:49', '473'),
(770, '90c20086-ace0-423b-9eb7-2a79e2b5f386', 11, 1, 0, 30, '2020-06-08 07:11:08', '80'),
(771, '90c20103-5ec7-4bdf-9c6b-581012fd9ce4', 11, 1, 0, 30, '2020-06-08 07:12:30', '4'),
(772, '90c2010c-0167-4aeb-8af5-310f827f12db', 11, 1, 0, 30, '2020-06-08 07:12:36', '18'),
(773, '90c2012a-167b-4f9b-b9a2-9a5a49194a67', 11, 1, 0, 30, '2020-06-08 07:12:55', '44'),
(774, '90c2016f-82ae-423e-afce-232d28f4f437', 11, 1, 0, 30, '2020-06-08 07:13:41', '58'),
(775, '90c201c9-ff63-4598-becf-c6cd225c3615', 11, 1, 0, 30, '2020-06-08 07:14:40', '69'),
(776, '90c20235-bb8d-4f1f-9dd3-66de8f34a8ad', 11, 1, 0, 30, '2020-06-08 07:15:51', '47'),
(777, '90c20280-2950-4beb-b4a0-ed9256a18928', 11, 1, 0, 30, '2020-06-08 07:16:40', '129'),
(778, '90c2033e-1073-41e3-8561-3a127f0dafc9', 11, 1, 0, 1, '2020-06-08 07:18:44', '2500'),
(779, '90c20347-b643-43c1-9b61-364dab90cc24', 11, 1, 0, 30, '2020-06-08 07:18:50', '73'),
(780, '90c203bc-9e93-42ac-8701-7081510b05e9', 11, 1, 0, 30, '2020-06-08 07:20:07', '28'),
(781, '90c203e8-ecbd-48f9-a76c-7e0eb78aa3da', 11, 1, 0, 30, '2020-06-08 07:20:36', '20'),
(782, '90c20408-8565-4545-9064-9968021cda90', 11, 1, 0, 30, '2020-06-08 07:20:57', '30'),
(783, '90c20439-8cd4-4a32-9299-694db73f5aca', 11, 1, 0, 30, '2020-06-08 07:21:29', '186'),
(784, '90c20558-1ad6-4b1e-8e90-97ecd7b24e85', 11, 1, 0, 30, '2020-06-08 07:24:37', '156'),
(785, '90c20648-c106-4740-93e2-8f9d3c0fc3b1', 11, 1, 0, 30, '2020-06-08 07:27:14', '256'),
(786, '90c207d3-3637-4b65-8410-69b03892175d', 11, 1, 0, 30, '2020-06-08 07:31:33', '187'),
(787, '90c208f4-f6af-4f59-a9a5-e5b9a9787bea', 11, 1, 0, 30, '2020-06-08 07:34:43', '67'),
(788, '90c2095d-e02a-41af-816b-db019d822d11', 11, 1, 0, 30, '2020-06-08 07:35:52', '238'),
(789, '90c20acb-7151-4e00-88fd-bbffe60d7fb7', 11, 1, 0, 30, '2020-06-08 07:39:51', '36'),
(790, '90c20b04-1b5a-4069-8816-c44143b807ff', 11, 1, 0, 30, '2020-06-08 07:40:28', '12'),
(791, '90c20b18-3bee-49e1-af32-78b330f7dd88', 11, 1, 0, 30, '2020-06-08 07:40:41', '58'),
(792, '90c20b72-c045-45d8-8f0b-05c8c0809368', 11, 1, 0, 30, '2020-06-08 07:41:41', '85'),
(793, '90c20bf8-7a3a-41e8-8a70-62c7d92e8158', 11, 1, 0, 30, '2020-06-08 07:43:08', '16'),
(794, '90c20c12-bdef-4227-8a7b-4ab3056af3b5', 11, 1, 0, 30, '2020-06-08 07:43:26', '8'),
(795, '90c20c20-beb6-47c0-a45e-0cd8d620d4de', 11, 1, 0, 30, '2020-06-08 07:43:35', '61'),
(796, '90c20c80-ce3d-4730-8c22-d8a276500b68', 11, 1, 0, 30, '2020-06-08 07:44:38', '32'),
(797, '90c20cb4-64f6-4188-8270-60445fc63760', 11, 1, 0, 30, '2020-06-08 07:45:12', '55'),
(798, '90c20d0b-4dc7-496a-92a2-c3cf90fffe30', 11, 1, 0, 30, '2020-06-08 07:46:09', '142'),
(799, '90c20de5-a562-4225-9277-1508450216e9', 11, 1, 0, 30, '2020-06-08 07:48:32', '76'),
(800, '90c20e5b-81a2-48b7-82ad-feea55a7dbb1', 11, 1, 0, 30, '2020-06-08 07:49:49', '305'),
(801, '90c2102f-a2db-4784-bf7a-bf63223671c7', 11, 1, 0, 30, '2020-06-08 07:54:56', '42'),
(802, '90c21071-c16e-483b-85c8-ca95c488d446', 11, 1, 0, 30, '2020-06-08 07:55:39', '27'),
(803, '90c2109d-6d97-4956-92a2-0596e91cb27e', 11, 1, 17, 30, '2020-06-08 07:56:08', '29'),
(804, '90c210cc-1bd1-4874-a7d4-54f180a1e8aa', 11, 1, 17, 30, '2020-06-08 07:56:38', '4'),
(805, '90c210d3-bb58-4f9d-bb20-d3848781b737', 11, 1, 17, 30, '2020-06-08 07:56:43', '10'),
(806, '90c210e6-3afc-45d6-a5fe-304f9f419ec3', 11, 1, 17, 30, '2020-06-08 07:56:55', '3151'),
(807, '90c21228-5221-460a-9702-7333df98f406', 11, 1, 0, 1, '2020-06-08 08:00:26', '5'),
(808, '90c21233-3a41-4d3d-be16-f7893be1930e', 11, 1, 17, 1, '2020-06-08 08:00:34', '105'),
(809, '90c212d4-830d-4226-954d-743c5d4bb96d', 11, 1, 17, 1, '2020-06-08 08:02:19', '4'),
(810, '90c212dc-4e71-4b31-8fce-ea2a424c9e51', 11, 1, 17, 1, '2020-06-08 08:02:24', '37'),
(811, '90c2131a-4c5e-4581-bec6-9e9e67c0e309', 11, 1, 18, 1, '2020-06-08 08:03:05', '4'),
(812, '90c21323-0b62-49f2-9fef-390a0a39f805', 11, 1, 19, 1, '2020-06-08 08:03:11', '2496'),
(813, '90c22204-3ad5-4c2c-9b9d-8834695744ca', 11, 1, 19, 1, '2020-06-08 08:44:47', '213'),
(814, '90c2234a-fde7-4f63-bfaa-b9649256c96c', 11, 1, 19, 1, '2020-06-08 08:48:21', '15'),
(815, '90c22363-c68b-44b5-bcd9-b12d8139259f', 11, 1, 19, 1, '2020-06-08 08:48:37', '42'),
(816, '90c223a6-7fb3-486c-915c-fc106afa3530', 11, 1, 19, 1, '2020-06-08 08:49:21', '939'),
(817, '90c223b0-4e02-4456-abff-e76a2906395d', 11, 1, 17, 30, '2020-06-08 08:49:28', NULL),
(818, '90c22941-306a-4507-8d19-22bb5358900b', 11, 1, 19, 1, '2020-06-08 09:05:01', NULL),
(819, '90c2f193-5eac-4adc-be44-178226e6c829', 11, 1, 19, 1, '2020-06-08 18:25:10', '225'),
(820, '90c2f1e4-bad4-4d83-90b3-01904c584740', 11, 1, 17, 30, '2020-06-08 18:26:03', '32'),
(821, '90c2f364-6ec5-4e4b-b298-c409d4b050c9', 11, 1, 0, 33, '2020-06-08 18:30:15', '4'),
(822, '90c2f36c-be78-4dcd-a6ce-6ca0ccd8785b', 11, 1, 17, 33, '2020-06-08 18:30:20', NULL),
(823, '90c2f609-7368-4161-a224-1fed1742cd01', 11, 1, 0, 35, '2020-06-08 18:37:38', '3'),
(824, '90c2f60f-2229-410a-8264-1c4188a0b643', 11, 1, 17, 35, '2020-06-08 18:37:42', '19'),
(825, '90c30fb6-e1ef-44b6-920a-8a57aa710ef6', 11, 1, 0, 1, '2020-06-08 19:49:26', '3'),
(826, '90c30fbc-38cf-464c-b7cc-f9bfcec655ee', 11, 1, 0, 1, '2020-06-08 19:49:30', '94'),
(827, '90c3104c-9adb-4f4e-b38a-36f2ca249e79', 11, 1, 0, 1, '2020-06-08 19:51:04', '37'),
(828, '90c31088-1838-4820-bf84-efe6ef7a1114', 11, 1, 0, 1, '2020-06-08 19:51:43', '40'),
(829, '90c310c7-b6eb-4c60-b557-b6574ccb8981', 11, 1, 0, 1, '2020-06-08 19:52:25', '22'),
(830, '90c310eb-b76f-4dec-8fa8-fbf072d438dc', 11, 1, 0, 1, '2020-06-08 19:52:49', '32'),
(831, '90c3111f-74a1-4077-9730-d54e0723a311', 11, 1, 0, 1, '2020-06-08 19:53:22', '96'),
(832, '90c311b5-1e7f-4b68-8853-e76b3034420e', 11, 1, 0, 1, '2020-06-08 19:55:01', '1014'),
(833, '90c317c2-e43c-40ff-8b4a-04a0a60e52cc', 11, 1, 0, 1, '2020-06-08 20:11:56', '947'),
(834, '90c31d3a-8dc2-4244-9b76-03d71341f196', 11, 1, 0, 30, '2020-06-08 20:27:14', '17'),
(835, '90c31d55-a0ba-42ec-85d3-7713048c6384', 11, 1, 0, 30, '2020-06-08 20:27:31', '58'),
(836, '90c31d6b-1330-446c-a462-769f80a09a98', 11, 1, 0, 1, '2020-06-08 20:27:45', '602'),
(837, '90c31db0-96a2-4ac7-8584-1713f8cb1f80', 11, 1, 0, 30, '2020-06-08 20:28:31', '175'),
(838, '90c31ebe-b528-45b1-83fb-1dd7e059880e', 11, 1, 0, 30, '2020-06-08 20:31:28', '388'),
(839, '90c32106-e8bf-4e6b-b709-5432507b133d', 11, 1, 0, 1, '2020-06-08 20:37:51', '150'),
(840, '90c32110-4704-43a1-9d6d-a095a74c6a65', 11, 1, 0, 30, '2020-06-08 20:37:57', '148'),
(841, '90c321ee-3008-422e-9860-d7942ba4251a', 11, 1, 0, 1, '2020-06-08 20:40:22', '340'),
(842, '90c321f4-d94e-4da5-b67a-e0295ec8b857', 11, 1, 0, 30, '2020-06-08 20:40:27', '55'),
(843, '90c322a3-8052-4127-8246-73a234c95475', 11, 1, 0, 33, '2020-06-08 20:42:21', '108'),
(844, '90c3234b-1e76-4109-9bb0-946bb43d03bf', 11, 1, 0, 33, '2020-06-08 20:44:11', '83'),
(845, '90c323cb-cc14-44c4-b9e6-d74a817fe11c', 11, 1, 0, 33, '2020-06-08 20:45:35', '19'),
(846, '90c323ea-cdb2-488c-b472-4bb5d1fcbe39', 11, 1, 0, 33, '2020-06-08 20:45:56', '4'),
(847, '90c323f7-15bd-4c2b-91d8-317b35a3d3de', 11, 1, 0, 1, '2020-06-08 20:46:04', '15'),
(848, '90c3242c-bd6d-47f2-942a-f82bee330566', 11, 1, 0, 1, '2020-06-08 20:46:39', '252'),
(849, '90c3246a-292d-42d5-bd8b-e960ee5b5352', 11, 1, 0, 30, '2020-06-08 20:47:19', '92'),
(850, '90c324f8-82f5-4290-b969-0245fc403997', 11, 1, 0, 30, '2020-06-08 20:48:52', '123'),
(851, '90c325af-732e-424f-93f4-1635bff06aa8', 11, 1, 0, 1, '2020-06-08 20:50:52', '542'),
(852, '90c325b5-b5cc-4be9-b4ad-f3d228ff169b', 11, 1, 0, 30, '2020-06-08 20:50:56', '4'),
(853, '90c325f2-2d91-479b-b6af-fe984f68f467', 11, 1, 0, 34, '2020-06-08 20:51:36', '42'),
(854, '90c328ec-40e1-4c3f-ab64-1459cd2d5b3d', 11, 1, 0, 1, '2020-06-08 20:59:55', '4'),
(855, '90c328f4-8d39-40d6-a5cd-9e7bd9e9f4a7', 11, 1, 0, 1, '2020-06-08 21:00:01', '47'),
(856, '90c3293e-7633-4aeb-a070-f5e5635b95f3', 11, 1, 0, 1, '2020-06-08 21:00:49', '71'),
(857, '90c329ad-39e9-428f-a6b3-6554f222cd59', 11, 1, 0, 1, '2020-06-08 21:02:02', NULL),
(858, '90c38da4-2da5-4334-82d2-93ffd0b349e1', 11, 1, 0, 1, '2020-06-09 01:41:33', '200'),
(859, '90c38dd5-a404-4fc0-a128-76ef06c39606', 11, 1, 0, 30, '2020-06-09 01:42:06', '397'),
(860, '90c38ed7-c305-4695-8787-94cf5ac5393c', 11, 1, 0, 1, '2020-06-09 01:44:55', '18'),
(861, '90c38ef4-3373-4ddf-8299-86f897184d75', 11, 1, 0, 1, '2020-06-09 01:45:13', '83'),
(862, '90c38f73-c91b-43cd-8f83-3c7e4163dc7f', 11, 1, 0, 1, '2020-06-09 01:46:37', '101'),
(863, '90c3900f-5d50-4682-bf2f-b0fd77364e2a', 11, 1, 0, 1, '2020-06-09 01:48:19', '103'),
(864, '90c39072-463d-4339-a04b-45940baa938c', 11, 1, 0, 33, '2020-06-09 01:49:24', '88'),
(865, '90c390ae-939c-4dae-a95c-12606552e963', 11, 1, 17, 1, '2020-06-09 01:50:03', '304'),
(866, '90c3915c-df00-45b3-9030-3845756cddc3', 11, 1, 0, 30, '2020-06-09 01:51:58', '10'),
(867, '90c3916c-e88a-41a9-8249-4e2ad2f20096', 11, 1, 17, 30, '2020-06-09 01:52:08', NULL),
(868, '90c39280-8832-4af4-981c-7bb25bdc9bf7', 11, 1, 17, 1, '2020-06-09 01:55:09', '7'),
(869, '90c392d1-02cf-4798-9a26-6adc978eae94', 11, 1, 0, 1, '2020-06-09 01:56:01', '4'),
(870, '90c392d8-d8d8-4209-84ce-2ebf72e03edf', 11, 1, 17, 1, '2020-06-09 01:56:07', '12'),
(871, '90c528cb-8547-4703-a01e-fe3c5b813a3a', 11, 1, 0, 1, '2020-06-09 20:51:13', '4631'),
(872, '90c7d7f7-5bec-4560-a8f4-88df1177cf3f', 11, 1, 0, 1, '2020-06-11 04:52:42', '3'),
(873, '90c7d7fc-d8ce-478e-9252-dcd45e4f2ec5', 11, 1, 17, 1, '2020-06-11 04:52:45', '1138'),
(874, '90c9ee19-3430-4341-9541-6cd931a27582', 11, 1, 17, 1, '2020-06-12 05:46:14', NULL),
(875, '90cae39f-416d-4a1d-aecf-9d264c22d27a', 11, 1, 17, 1, '2020-06-12 17:12:46', '12'),
(876, '90da06f5-827c-4f66-aacc-44baa5ef830e', 11, 1, 0, 1, '2020-06-20 05:49:00', '5'),
(877, '90da0728-cd73-42ca-99c7-1201e7c4c1d3', 11, 1, 0, 30, '2020-06-20 05:49:33', NULL),
(878, '90ea0e91-64ab-4821-aa34-a979d0d36db8', 11, 1, 0, 30, '2020-06-28 05:03:31', '6912'),
(879, '90ebc1c0-80ef-47bf-9aad-c2e417443895', 11, 1, 0, 30, '2020-06-29 01:20:23', '7'),
(880, '90ec27ca-7196-41cd-b87c-20366e14c114', 11, 1, 0, 30, '2020-06-29 06:05:42', '51'),
(881, '90ec2819-9107-43ac-a4d6-7130185de20d', 11, 1, 0, 30, '2020-06-29 06:06:34', '33'),
(882, '90ec284d-fcb4-4ee5-8d37-9bf3fd75b87d', 11, 1, 0, 30, '2020-06-29 06:07:08', '21'),
(883, '90ec2870-85ca-4281-8ed0-133ba763d6c4', 11, 1, 0, 30, '2020-06-29 06:07:31', '333'),
(884, '90ec2a6e-fb8d-4bf9-bb23-2a8fbf626b92', 11, 1, 0, 30, '2020-06-29 06:13:05', '6'),
(885, '90ec2a7b-d3e7-47a6-97cf-9fb8012c22ce', 11, 1, 0, 30, '2020-06-29 06:13:14', '30'),
(886, '90ec2aaf-bc3d-4d17-981c-6bddc67c65ff', 11, 1, 17, 30, '2020-06-29 06:13:48', '23'),
(887, '90edb490-2015-448c-beec-69831780529a', 11, 1, 0, 1, '2020-06-30 00:35:09', '7'),
(888, '90ee4780-d19c-480f-bf8e-63422c39c313', 11, 1, 0, 1, '2020-06-30 07:26:02', '8'),
(889, '90ef5024-af8a-441c-a367-3f3194c052d3', 11, 1, 0, 1, '2020-06-30 19:46:01', '8'),
(890, '90ef5032-ec04-4278-afc9-ce2cef729150', 11, 1, 21, 1, '2020-06-30 19:46:10', '72'),
(891, '90ef50a2-91fa-466c-94c7-d6cd0cc2879c', 11, 1, 21, 1, '2020-06-30 19:47:24', '22'),
(892, '90ef50c6-8bfe-4d1e-a501-32768fcc99c3', 11, 1, 21, 1, '2020-06-30 19:47:47', '5'),
(893, '90ef586e-f9d1-4865-91f5-e2f6ace44c00', 11, 1, 24, 1, '2020-06-30 20:09:12', '2'),
(894, '90ef5873-f15f-40ff-b2f5-5c7c158ed97a', 11, 1, 25, 1, '2020-06-30 20:09:15', '6'),
(895, '90ef587e-ad75-4479-8b22-0d67a67aa2aa', 11, 1, 17, 1, '2020-06-30 20:09:22', '56'),
(896, '90fa3eee-3d0b-42bc-84a8-e12664f2579e', 11, 1, 0, 30, '2020-07-06 06:12:00', '9'),
(897, '9101f5ee-abc9-4eee-8bce-018b8834438c', 11, 1, 0, 1, '2020-07-10 02:14:30', '2'),
(898, '9101f5f3-ff0d-483a-97ac-2f23ab20a0d6', 11, 1, 18, 1, '2020-07-10 02:14:34', '24'),
(899, '91021e05-ac31-43df-b8bc-db42c8ceba03', 11, 1, 0, 1, '2020-07-10 04:06:36', '56'),
(900, '91021e5e-bda9-47f0-aa95-878ad9525852', 11, 1, 17, 1, '2020-07-10 04:07:34', '10'),
(901, '91021e70-5387-470a-b879-fc20438dd717', 11, 1, 18, 1, '2020-07-10 04:07:46', '6'),
(902, '91021e7b-b6aa-40e9-8426-175a21abd19f', 11, 1, 19, 1, '2020-07-10 04:07:53', '11'),
(903, '91021f45-70b2-4638-846f-356b388a8361', 11, 1, 0, 30, '2020-07-10 04:10:06', '3077'),
(904, '9103a907-f91d-41bb-abaa-c7af283a7693', 11, 1, 0, 1, '2020-07-10 22:31:08', '139'),
(905, '9103a9de-37c1-49af-aa24-9b27e6d64b58', 11, 1, 0, 1, '2020-07-10 22:33:28', '9'),
(906, '9103a9ed-f0cf-4d79-a813-a972bd69d974', 11, 1, 17, 1, '2020-07-10 22:33:38', '23'),
(907, '9103aa12-fda4-4f1a-b380-ab7fbc359325', 11, 1, 18, 1, '2020-07-10 22:34:03', '87'),
(908, '9103aa99-24c1-4112-97ca-0f94796a8806', 11, 1, 27, 1, '2020-07-10 22:35:30', '10'),
(909, '9103aaa9-9f49-479b-bf51-2d668486eba6', 11, 1, 21, 1, '2020-07-10 22:35:41', '22'),
(910, '9103aacc-7e0c-49a2-9806-e2324299cb72', 11, 1, 17, 1, '2020-07-10 22:36:04', '19'),
(911, '9103aaea-1ea5-4fde-bbd9-70493ead2705', 11, 1, 18, 1, '2020-07-10 22:36:23', '10'),
(912, '91045cd0-6f53-48fb-9398-472d6e0a9a36', 11, 1, 0, 1, '2020-07-11 06:53:50', '7'),
(913, '91045cde-36c6-4169-8cb9-3cf132df4a76', 11, 1, 17, 1, '2020-07-11 06:53:59', '8'),
(914, '91045cec-c23d-463a-9a28-e8d460d0ff6c', 11, 1, 18, 1, '2020-07-11 06:54:09', '5'),
(915, '91045cf6-f9d0-40f4-9d51-1b26876c7a31', 11, 1, 19, 1, '2020-07-11 06:54:15', '3'),
(916, '91045cfd-6ce4-4bbc-b0ee-44c058a4390e', 11, 1, 21, 1, '2020-07-11 06:54:20', '309'),
(917, '91045ed7-9f8f-4051-a9db-43f3a6d99bdd', 11, 1, 21, 1, '2020-07-11 06:59:30', '44'),
(918, '91045f1d-3a31-4b0d-baf0-7e9cb69c67af', 11, 1, 21, 1, '2020-07-11 07:00:16', '109'),
(919, '91045fc5-9b20-4d95-8b60-f47c5c1172d5', 11, 1, 18, 1, '2020-07-11 07:02:06', '5'),
(920, '91053517-b865-4b6b-b117-8f720efb59cf', 11, 2, 0, 1, '2020-07-11 16:58:36', '6'),
(921, '91053522-845f-422a-9e21-55fc22711551', 11, 2, 20, 1, '2020-07-11 16:58:43', '1459'),
(922, '91059080-ca42-4fe9-99df-8463b5d1c871', 11, 1, 0, 1, '2020-07-11 21:14:12', '6'),
(923, '9105908c-afba-4c22-ad23-b70c9b8a91a9', 11, 1, 17, 1, '2020-07-11 21:14:20', '12'),
(924, '910590a0-4b91-4d57-9ca0-513da8d4e124', 11, 1, 18, 1, '2020-07-11 21:14:32', '5'),
(925, '9105c92b-d40d-4ad6-b093-762390417102', 11, 3, 0, 1, '2020-07-11 23:52:39', '1'),
(926, '9105c930-3fd5-47b4-9b21-008efb514fa8', 11, 3, 30, 1, '2020-07-11 23:52:42', '15'),
(927, '9105c9ce-31d3-4d42-bde1-c739b0203e76', 11, 3, 0, 1, '2020-07-11 23:54:25', '2'),
(928, '9105c9d3-7efc-4d21-a811-92f368b5dc99', 11, 3, 30, 1, '2020-07-11 23:54:29', '15'),
(929, '9105ca92-2790-408f-9270-b8bba02df4ed', 11, 3, 0, 30, '2020-07-11 23:56:34', '37'),
(930, '9105cacd-436c-4876-8262-37562e69ebc8', 11, 3, 30, 30, '2020-07-11 23:57:13', '48'),
(931, '9105cb18-01e8-43e0-9564-b9f14dd5d7ce', 11, 3, 28, 30, '2020-07-11 23:58:02', '523'),
(932, '9105ce37-8547-40f2-a48d-038c7f2aa639', 11, 3, 28, 30, '2020-07-12 00:06:46', '3'),
(933, '9105ce3c-dd8a-4214-bf16-ddebe511f006', 11, 3, 31, 30, '2020-07-12 00:06:49', '38'),
(934, '9105ce78-ba8d-4b18-bb8b-dcc5726c6ba5', 11, 3, 31, 30, '2020-07-12 00:07:28', '146'),
(935, '9105cf59-6759-4957-81c3-8c0c3db6720e', 11, 3, 31, 30, '2020-07-12 00:09:56', '2'),
(936, '9105cf5d-2949-4d92-a93c-a29183513d70', 11, 3, 32, 30, '2020-07-12 00:09:58', '623'),
(937, '9105d314-6688-4770-81d2-0154d7056c4d', 11, 3, 32, 30, '2020-07-12 00:20:21', '69'),
(938, '9105d37f-3e90-4fa2-b4b8-203f19279a6e', 11, 3, 32, 30, '2020-07-12 00:21:31', '3'),
(939, '9105d384-af45-4383-ac0f-38e2e059c769', 11, 3, 34, 30, '2020-07-12 00:21:35', '3'),
(940, '9105d389-c8d1-4065-a578-5c0968255eec', 11, 3, 36, 30, '2020-07-12 00:21:38', '3'),
(941, '9105d390-4a1e-4c28-b210-735fd043e7b7', 11, 3, 37, 30, '2020-07-12 00:21:43', '3'),
(942, '9105d395-eb93-4770-8cd0-61eea71e3f32', 11, 3, 28, 30, '2020-07-12 00:21:46', '36'),
(943, '9105db36-d85d-43e7-95ad-3ada91b97472', 11, 1, 0, 1, '2020-07-12 00:43:06', '4'),
(944, '911036d6-7e9a-41bd-8511-eae00344bbf7', 11, 2, 0, 1, '2020-07-17 12:17:35', '19'),
(945, '911039ce-6f8e-44c3-8d06-3b40007a2093', 11, 2, 0, 1, '2020-07-17 12:25:53', '23'),
(946, '911039f4-cb4b-4e3d-977e-a09ce5e6f01f', 11, 2, 0, 1, '2020-07-17 12:26:18', '2'),
(947, '911039fa-5532-4c78-8da3-8928a0d2c4d7', 11, 2, 0, 1, '2020-07-17 12:26:22', '3'),
(948, '91103a06-a7b6-455e-bfd3-db96c41d4825', 11, 2, 0, 1, '2020-07-17 12:26:30', '65'),
(949, '91103a7d-1cdb-4efa-9d3c-7719af858b88', 11, 2, 0, 1, '2020-07-17 12:27:47', '9'),
(950, '91103ab3-0e9d-4ab6-85f6-0f7bc9296fc5', 11, 2, 0, 1, '2020-07-17 12:28:23', '96'),
(951, '91103b47-dd6a-4287-bb81-06341c2a46b6', 11, 2, 0, 1, '2020-07-17 12:30:00', NULL),
(952, '91103b67-9204-46c3-8092-35b9a03b5471', 11, 2, 0, 1, '2020-07-17 12:30:21', NULL),
(953, '911a7767-dfe1-4c81-ab93-d12df2f19a62', 11, 1, 17, 1, '2020-07-22 14:36:24', '11'),
(954, '911c08d2-c1a9-4832-b07f-ef973cb62be6', 15, 1, 17, 1, '2020-07-23 09:18:51', '9'),
(955, '911c1b77-ad33-45da-897d-7f580d44016a', 11, 1, 0, 30, '2020-07-23 10:10:59', '4'),
(956, '911c1b80-491f-48c2-bab9-7e2073e8b7b9', 11, 1, 18, 30, '2020-07-23 10:11:05', '45'),
(957, '911c1bc5-a629-47cd-80d2-8d3f223abae3', 11, 1, 17, 30, '2020-07-23 10:11:50', '30'),
(959, '911e4246-a5eb-460b-b48f-b0645613fb34', 11, 1, 0, 30, '2020-07-24 11:51:09', NULL),
(960, '911e6ebe-ab16-4b60-bc0a-3f6eeb8a2af1', 21, 7, 0, 47, '2020-07-24 13:55:30', '2'),
(961, '911e6ec3-65ca-43c2-a223-4d9509eefd6a', 21, 7, 48, 47, '2020-07-24 13:55:33', '9'),
(962, '911e6ed2-8433-4f38-baf5-98c73c63b05c', 21, 7, 49, 47, '2020-07-24 13:55:43', '14'),
(963, '911e7047-c012-49d2-92d3-be44ea122095', 21, 7, 0, 48, '2020-07-24 13:59:47', '820'),
(964, '911e7088-4a53-4dfe-aca7-613073286848', 21, 7, 48, 47, '2020-07-24 14:00:30', '37'),
(965, '911e799d-f240-4123-924b-9c73a4859b7b', 21, 8, 0, 48, '2020-07-24 14:25:54', '11'),
(966, '911e7a4d-192c-48bc-8b12-0dc2018f10e2', 21, 9, 0, 49, '2020-07-24 14:27:49', '5'),
(967, '911e7abf-29e2-408d-9add-a218a376bb2b', 21, 8, 0, 50, '2020-07-24 14:29:03', '1367'),
(968, '911e8614-8f9e-4cd5-b848-97434face8d2', 21, 9, 0, 50, '2020-07-24 15:00:45', '4'),
(969, '911e8686-4f62-4dd5-b0b8-f263a8373eb0', 21, 8, 0, 51, '2020-07-24 15:01:59', '5'),
(970, '911e88f7-d5f1-4c07-94a3-26f12b587620', 21, 8, 0, 51, '2020-07-24 15:08:49', '1'),
(971, '911e8923-22e0-4170-adf2-837d2d1f7004', 21, 9, 0, 51, '2020-07-24 15:09:18', '2'),
(972, '911e8abc-dddb-4f28-8a73-29b40b817404', 21, 8, 0, 52, '2020-07-24 15:13:46', '2'),
(973, '911e91c6-c5e3-417e-8741-b1aa5a917523', 21, 7, 0, 52, '2020-07-24 15:33:27', '19'),
(974, '911f9845-5a5d-4d95-bc08-e108f152c02f', 11, 1, 0, 30, '2020-07-25 03:47:26', '3'),
(975, '911f984a-f89f-4159-b741-75df1a45c7dd', 11, 1, 17, 30, '2020-07-25 03:47:30', '7'),
(976, '911f9857-0d8c-43ea-872a-75297e426c34', 11, 1, 18, 30, '2020-07-25 03:47:38', '4'),
(977, '911f985d-f45d-4501-9ecb-aad554847d2c', 11, 1, 19, 30, '2020-07-25 03:47:43', '5'),
(978, '911fb0c2-cae8-4c77-baab-0448b091f4bd', 11, 1, 0, 30, '2020-07-25 04:55:55', '9'),
(979, '911fb0d2-2042-4633-b8ee-2e5318d005a3', 11, 1, 17, 30, '2020-07-25 04:56:05', '15'),
(980, '911fb0e9-bc6a-49b4-9694-9672cece212e', 11, 1, 18, 30, '2020-07-25 04:56:21', '12'),
(981, '912499ea-b322-46a8-804a-01568dbf0dde', 11, 1, 17, 1, '2020-07-27 15:31:11', '115'),
(982, '91249a9c-2e3b-4997-a97d-f543382ca1eb', 11, 1, 17, 1, '2020-07-27 15:33:07', '17'),
(983, '913c104b-bdfc-40ed-a1b9-93896c80cb13', 11, 2, 0, 30, '2020-08-08 07:26:14', '1'),
(984, '913c1052-752b-4438-90c6-c251baa316a6', 11, 1, 0, 30, '2020-08-08 07:26:19', '1'),
(985, '913f993c-ca85-4574-9e91-91fcacf772e7', 11, 1, 0, 30, '2020-08-10 01:36:38', '24');

-- --------------------------------------------------------

--
-- Table structure for table `courses_participant`
--

CREATE TABLE `courses_participant` (
  `id_c_participant` int(11) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `from_group` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 3,
  `id_company` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_participant`
--

INSERT INTO `courses_participant` (`id_c_participant`, `id_courses`, `id_participant`, `from_group`, `status`, `id_company`, `created_at`, `created_by`) VALUES
(1, 1, 1, 0, 1, 11, '2020-02-05 22:19:03', 1),
(2, 1, 30, 0, 3, 11, '2020-05-06 20:09:16', 30),
(3, 2, 1, 0, 3, 11, '2020-02-06 00:57:02', 1),
(4, 3, 1, 0, 3, 11, '2020-02-06 19:01:36', 1),
(5, 4, 1, 0, 1, 11, '2020-03-03 05:05:54', 1),
(6, 1, 33, 0, 3, 11, '2020-06-08 18:29:27', 1),
(7, 1, 35, 0, 3, 11, '2020-06-08 18:29:27', 1),
(8, 1, 36, 0, 3, 11, '2020-06-08 18:29:27', 1),
(9, 1, 34, 0, 3, 11, '2020-06-08 18:29:27', 1),
(10, 6, 1, 0, 1, 11, '2020-06-10 19:10:31', 1),
(12, 3, 30, 0, 3, 11, '2020-07-11 23:56:11', 1),
(13, 3, 33, 0, 3, 11, '2020-07-11 23:56:50', 1),
(14, 2, 30, 0, 3, 11, '2020-07-20 03:13:28', 1),
(15, 7, 47, 0, 1, 21, '2020-07-24 13:47:42', 47),
(16, 7, 48, 0, 3, 21, '2020-07-24 13:58:32', 47),
(17, 8, 47, 0, 1, 21, '2020-07-24 14:16:43', 47),
(18, 8, 48, 0, 3, 21, '2020-07-24 14:25:53', 48),
(19, 9, 47, 0, 1, 21, '2020-07-24 14:26:50', 47),
(20, 9, 49, 0, 3, 21, '2020-07-24 14:27:46', 49),
(22, 8, 50, 0, 3, 21, '2020-07-24 14:29:03', 50),
(23, 9, 50, 0, 3, 21, '2020-07-24 15:00:43', 50),
(25, 8, 51, 0, 3, 21, '2020-07-24 15:01:59', 51),
(26, 9, 51, 0, 3, 21, '2020-07-24 15:09:16', 51),
(27, 8, 52, 0, 3, 21, '2020-07-24 15:13:46', 52),
(28, 8, 52, 0, 3, 21, '2020-07-24 15:13:46', 52),
(29, 7, 52, 0, 3, 21, '2020-07-24 15:33:25', 52),
(30, 10, 1, 0, 1, 11, '2020-08-07 01:25:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses_task`
--

CREATE TABLE `courses_task` (
  `id_task` int(11) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `max_submit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_task`
--

INSERT INTO `courses_task` (`id_task`, `id_courses`, `id_company`, `title`, `content`, `start_at`, `end_at`, `max_submit`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 1, 11, 'Tugas Pertemuan 1 Revisi 1', '<p>Update Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:50:17', NULL, 0, '2020-04-13 18:22:29', 1, '2020-04-13 21:50:17', 1, '2020-04-13 21:50:17', 1, 1),
(2, 1, 11, 'Tugas Pertemuan 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:50:20', NULL, 0, '2020-04-13 19:00:25', 1, '2020-04-13 21:50:20', NULL, '2020-04-13 21:50:20', 1, 1),
(4, 1, 11, 'Pertemuan 3 Tambahan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:54:57', NULL, 0, '2020-04-13 21:05:58', 1, '2020-04-13 21:54:57', 1, '2020-04-13 21:54:57', 1, 1),
(5, 2, 11, 'Pertemuan Pertama', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:46:09', NULL, 0, '2020-04-13 21:30:08', 1, '2020-04-13 21:46:09', NULL, '2020-04-13 21:46:09', 1, 1),
(6, 2, 11, 'Tugas Remidial', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:49:44', NULL, 0, '2020-04-13 21:47:56', 1, '2020-04-13 21:49:44', NULL, '2020-04-13 21:49:44', 1, 1),
(7, 1, 11, 'Pertemuan 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:56:51', '2020-04-19 08:00:00', 0, '2020-04-13 21:55:53', 1, '2020-04-13 21:56:51', NULL, '2020-04-13 21:56:51', 1, 1),
(8, 1, 11, 'Pertemuan 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-04-13 21:58:22', '2020-04-20 08:00:00', 0, '2020-04-13 21:58:10', 1, '2020-04-13 21:58:22', NULL, '2020-04-13 21:58:22', 1, 1),
(9, 1, 11, 'Tugas 1', '<p>Jawablah soal berikut pada form jawaban yang disediakan</p>\r\n\r\n<ol>\r\n	<li>Apa yang dimaksud bela negara ?</li>\r\n	<li>Berikan contoh usaha pembelaan negara yang telah mengharumkan nama bangsa Indonesia di mata dunia internasional!</li>\r\n</ol>', '2020-07-12 00:00:00', '2020-07-30 08:00:00', 2, '2020-04-13 23:33:23', 1, '2020-07-12 00:40:32', 1, NULL, NULL, 0),
(10, 2, 11, 'Tugas 1', '<p>Jelaskan menurut pendapat anda bagai mana peran IMK dalam pengembangan suatu aplikasi ?</p>', '2020-04-24 20:25:00', '2020-07-29 16:00:00', 2, '2020-04-14 04:50:58', 1, '2020-07-20 02:54:28', 1, NULL, NULL, 0),
(11, 1, 11, 'Tugas 2', '<p>Jawablah pada form jawaban yang disediakan</p>\r\n\r\n<p>Berikan pendapat anda mengenai peran Pancasila dalam konteks hukum dan ketatanegaraan</p>', '2020-07-12 00:20:00', '2020-07-30 08:00:00', 2, '2020-04-30 02:51:48', 1, '2020-07-12 00:47:07', 1, NULL, NULL, 0),
(12, 3, 11, 'Pertemuan 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-06-07 03:41:33', '2020-06-29 08:00:00', 2, '2020-06-07 03:42:16', 1, '2020-06-07 03:42:16', NULL, NULL, NULL, 0),
(13, 1, 11, 'wdadwad', '<p>dwadwadawd</p>', '2020-06-17 03:06:00', NULL, 1, '2020-06-16 22:07:38', 1, '2020-06-17 03:06:00', NULL, '2020-06-17 03:06:00', 31, 1),
(15, 1, 11, 'dwad www', '<p>wwwwdwa</p>', '2020-06-28 00:55:41', NULL, 1, '2020-06-28 00:55:32', 1, '2020-06-28 00:55:41', NULL, '2020-06-28 00:55:41', 1, 1),
(16, 1, 11, 'Tugas 3', '<p>w</p>', '2020-07-12 01:23:29', '2020-07-30 08:00:00', 1, '2020-07-12 01:10:49', 1, '2020-07-12 01:23:29', 1, '2020-07-12 01:23:29', 1, 1),
(17, 2, 11, 'Tugas Analisis', '<p>Lakukan analisis terhadap suatu website (bebas) mengenai:</p>\r\n\r\n<ol>\r\n	<li>Web usability</li>\r\n	<li>Prioritas Pengunaan Website</li>\r\n	<li>Profil Website</li>\r\n	<li>Desain Layar</li>\r\n</ol>\r\n\r\n<p>Hasil analisis&nbsp;dikumpul dalam bentuk PDF</p>', '2020-07-20 12:53:00', '2020-07-31 16:00:00', 2, '2020-07-20 03:07:57', 1, '2020-07-20 12:53:00', 1, NULL, NULL, 0),
(18, 2, 11, '3', '<p>wwww</p>', '2020-07-20 03:12:39', NULL, 1, '2020-07-20 03:12:25', 1, '2020-07-20 03:12:39', NULL, '2020-07-20 03:12:39', 1, 1),
(19, 2, 11, 'Test', '<p>test</p>', '2020-07-20 03:14:34', NULL, 1, '2020-07-20 03:14:16', 1, '2020-07-20 03:14:34', NULL, '2020-07-20 03:14:34', 1, 1),
(20, 7, 21, 'Tugas Pengantar', '<p>Apa yang anda ketahui tentang pendidikan kelautan dan perikanan ?</p>', '2020-07-24 13:56:21', '2020-07-31 16:00:00', 2, '2020-07-24 13:57:12', 47, '2020-07-24 13:57:12', NULL, NULL, NULL, 0),
(21, 7, 21, 'Tugas 2', '<p>kerjakan</p>', '2020-07-24 14:01:20', NULL, 1, '2020-07-24 14:01:30', 47, '2020-07-24 14:01:30', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses_task_submit`
--

CREATE TABLE `courses_task_submit` (
  `id_submit` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `file_url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_task_submit`
--

INSERT INTO `courses_task_submit` (`id_submit`, `id_task`, `id_company`, `content`, `file_url`, `created_at`, `created_by`) VALUES
(15, 9, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/task/1/pertemuan-1-1586939375.jpg', '2020-04-15 00:29:35', 1),
(16, 10, 11, NULL, 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/task/1/pertemuan-1-1586940869.pdf', '2020-04-15 00:54:29', 1),
(17, 10, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', NULL, '2020-04-15 00:55:23', 1),
(18, 9, 11, NULL, 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/task/1/pertemuan-1-1586941204.pdf', '2020-04-15 01:00:04', 1),
(19, 11, 11, NULL, '', '2020-07-12 01:06:24', 1),
(20, 21, 21, '<p>Siap saya kerjakan</p>', 'http://elcat.localhost/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/task/48/tugas-2-1595599881.pdf', '2020-07-24 14:11:21', 48),
(21, 20, 21, '<p>Adalah cabang ilmu tentang ....</p>', '', '2020-07-24 14:11:53', 48);

-- --------------------------------------------------------

--
-- Table structure for table `courses_teach_materials`
--

CREATE TABLE `courses_teach_materials` (
  `id_tech_material` int(11) NOT NULL,
  `id_courses` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `main_file_path` text DEFAULT NULL,
  `allow_download` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_teach_materials`
--

INSERT INTO `courses_teach_materials` (`id_tech_material`, `id_courses`, `id_company`, `title`, `description`, `main_file_path`, `allow_download`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`, `location`) VALUES
(10, 44, 8, 'Pertemuan 1', NULL, 'http://elcat.localhost/storage/8f99bf60-1680-4806-8fb0-2a1b5f0c24c4/file/1/LAMPIRAN_LAMPIRAN_I_Kuisioner_I_Manageme.pdf', 1, 114, '2020-01-30 06:39:10', NULL, '2020-01-30 18:24:42', NULL, NULL, 0, 2),
(11, 44, 8, 'Pertemuan 2', NULL, 'http://elcat.localhost/storage/8f99bf60-1680-4806-8fb0-2a1b5f0c24c4/file/1/LAMPIRAN_LAMPIRAN_I_Kuisioner_I_Manageme.pdf', 1, 114, '2020-01-30 06:39:35', NULL, '2020-01-30 18:24:42', NULL, NULL, 0, 3),
(12, 44, 8, 'Pengantar', NULL, 'http://elcat.localhost/storage/8f99bf60-1680-4806-8fb0-2a1b5f0c24c4/file/1/Tingkat_Kematangan_Infrastruktur_Teknologi_Informa.pdf', 1, 114, '2020-01-30 06:40:17', NULL, '2020-01-30 18:24:42', NULL, NULL, 0, 1),
(13, 45, 9, 'Pengenalan, Bag. 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fbdb1c8-8748-4783-b044-b605ec814b90/file/1/Materi Kursus/Matematika Diskrit/InfernalNasus.laugh03.ogg', 0, 115, '2020-02-01 03:35:29', 115, '2020-02-04 06:30:46', NULL, NULL, 0, 1),
(14, 45, 9, 'Bagian 1 Sejarah', '<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<blockquote>\r\n<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, lorem lorem manemanwm</p>\r\n</blockquote>\r\n\r\n<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://elcat.localhost/storage/8fbdb1c8-8748-4783-b044-b605ec814b90/file/1/Materi Kursus/Matematika Diskrit/LAMPIRAN_LAMPIRAN_I_Kuisioner_I_Manageme.pdf\">Lampiran, Download di Sini</a></p>', 'http://elcat.localhost/storage/8fbdb1c8-8748-4783-b044-b605ec814b90/file/1/Materi Kursus/Matematika Diskrit/Plyr - A simple, customizable HTML5 Video, Audio, YouTube and Vimeo player.mp4', 0, 115, '2020-02-01 04:36:29', 115, '2020-02-04 04:45:11', NULL, NULL, 0, 2),
(15, 45, 9, 'Bagian 2 Lorem Ipsum', '<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fbdb1c8-8748-4783-b044-b605ec814b90/file/1/Materi Kursus/Matematika Diskrit/AUDIT COBIT KELOMPOK Rev 1.pdf', 1, 115, '2020-02-02 04:07:55', 115, '2020-02-04 02:25:19', NULL, NULL, 0, 3),
(16, 46, 9, 'Pendahuluan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fbdb1c8-8748-4783-b044-b605ec814b90/file/1/Materi Kursus/Matematika Diskrit/Plyr - A simple, customizable HTML5 Video, Audio, YouTube and Vimeo player.mp4', 1, 115, '2020-02-05 05:11:00', NULL, '2020-02-05 05:11:00', NULL, NULL, 0, 1),
(17, 1, 11, 'Pengenalan', '<p>Pancasila merupakan dasar negara/ filosofi/ falsafah bangsa Indonesia. Pancasila mengandung nilai-nilai moral yang diharapkan menjadi pedoman perilaku kehidupan berbangsa dan bernegara, acuan dalam pranata sosial masyarakat. Pada perkembangannya di era milenial, perilaku manusia dalam kehidupan sosial seolah mulai menyimpang dari nilai-nilai Pancasila, diantaranya memperlakukan manusia tidak pada hakikatnya sebagai manusia. Penghormatan terhadap harkat dan martabat manusia seolah diabaikan dalam pergaulan hidup masyarakat.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/Opening Course Pendidikan Pancasila.mp4', 1, 1, '2020-02-05 22:20:10', 1, '2020-08-08 10:20:01', NULL, NULL, 0, 1),
(18, 1, 11, 'Visi, Misi dan Landasan Pendidikan Pancasila', '<p>Seperti yang kita ketahui bersama, sebelum kita mempelajari sesuatu secara lebih mendalam, maka penting bagi untuk mengetahui apa landasan atau dasar kita mempelajari hal tersebut, apa visi, misi serta tujuan kita mempelajarinya.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/Visi, Misi dan Landasan Pendidikan Pancasila.mp3', 1, 1, '2020-02-05 22:20:53', 1, '2020-08-08 10:20:01', NULL, NULL, 0, 2),
(19, 1, 11, 'Pancasila dalam Konteks Sejarah Perjuangan Bangsa', '<p>Memahami Pancasila pertama-tama harus dimulai dengan mengenal sejarahnya. Untuk itu kali ini kita akan berbicara mengenai Pancasila dalam kisah sejarah bangsa.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/Pancasila dalam Konteks Sejarah Perjuangan Bangsa Indonesia.mp4', 1, 1, '2020-02-05 22:21:45', 1, '2020-08-08 10:20:01', NULL, NULL, 0, 3),
(20, 2, 11, 'Apa itu IMK ?', NULL, 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 1 - Apa itu IMK -.mp4', 1, 1, '2020-02-06 00:57:48', 1, '2020-07-20 01:52:31', NULL, NULL, 0, 1),
(21, 1, 11, 'Pancasila dalam Konteks Hukum dan Ketatanegaraan', '<p>Sebuah negara modern, dibangun atas dasar hukum yang clare et distincta. Mengapa demikian? Bangunan yang disebut negara itu perlu memiliki bentuk, perlu sistem, perlu tujuan, dan secara epistemologis membutuhkan cara untuk mencapai tujuan tersebut; dan itu semua dirangkum dalam DASAR NEGARA</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/Pancasila dalam Konteks Hukum dan Ketatanegaraan.mp4', 1, 1, '2020-02-10 02:08:48', 1, '2020-08-08 10:20:01', NULL, NULL, 0, 4),
(22, 5, 14, 'Pengenalan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/90208061-ca4a-4177-b4ef-f54461c4afc3/file/1/Folder Materi/1. registrasi layanan.mp4', 1, 12, '2020-03-20 01:15:00', NULL, '2020-03-20 01:15:41', NULL, NULL, 0, 1),
(23, 5, 14, 'Pengenalan 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, 0, 12, '2020-03-20 01:15:27', NULL, '2020-03-20 01:15:41', NULL, NULL, 0, 2),
(24, 1, 11, 'wwwwdwa', '<p>dwadwad</p>', NULL, 0, 1, '2020-06-10 20:30:03', NULL, '2020-06-17 00:31:58', 31, '2020-06-17 00:31:58', 1, 5),
(25, 1, 11, 'dadwad', '<p>dwadwad</p>', NULL, 0, 1, '2020-06-28 00:51:28', NULL, '2020-06-28 00:53:28', 1, '2020-06-28 00:53:28', 1, 6),
(26, 1, 11, 'Pancasila sebagai Sistem Filsafat', '<p>Berbicara tentang pengertian Pancasila sebagai sistem filsafat, maka pembahasan akan lebih runtut apabila kita terlebih dahulu mencoba memahami apa itu sistem? apa itu filsafat? Dan apakah Pancasila memenuhi syarat sebagai suatu sistem Filsafat ?</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/Pancasila sebagai Sistem Filsafat.mp4', 0, 1, '2020-07-10 22:27:05', 1, '2020-08-08 10:20:01', NULL, NULL, 0, 5),
(27, 1, 11, 'Refrensi Lainnya', '<p>Berikut dicantumkan refrensi mengenai materi pendidikan pancasila</p>\r\n\r\n<p><a href=\"http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Pendidikan Pancasila/527-1059-1-PB.pdf\" target=\"_blank\">Refrensi 1</a></p>', NULL, 0, 1, '2020-07-10 22:30:02', NULL, '2020-08-08 10:20:01', NULL, NULL, 0, 6),
(28, 3, 11, 'Pengenalan Algoritma', '<p>Pada video ini akan dibahas mengenai apa itu algoritma, contoh-contoh penggunaannya dan hal yang lainnya</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Algoritma Dasar/01 - Algoritma.mp4', 0, 1, '2020-07-11 21:32:23', 1, '2020-07-17 14:19:36', NULL, NULL, 0, 1),
(29, 3, 11, 'Karakteristik Algoritma', '<p>Pada pemblajaran kali ini akan dibahas mengenai karakteristik yang dimiliki oleh algoritma</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/Algoritma Dasar/02 - Karakteristik Algoritma.mp4', 1, 1, '2020-07-11 23:46:44', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 2),
(30, 3, 11, 'Bahasa Pemrograman', '<p><iframe frameborder=\"1\" height=\"500\" scrolling=\"no\" src=\"https://www.youtube.com/embed/i1VhiPHcdzw\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-11 23:52:30', 1, '2020-07-17 14:19:36', NULL, NULL, 0, 3),
(31, 3, 11, 'Struktur Dasar Algoritma Bagian 1', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/N9CYNGIMPJ8\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:06:39', 1, '2020-07-17 14:19:36', NULL, NULL, 0, 4),
(32, 3, 11, 'Struktur Dasar Algoritma Bagian 2', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/_qPo5Pvr23I\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:09:49', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 5),
(33, 3, 11, 'Tipe Data Bagian 1', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/rKoRsJT8ITA\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:12:29', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 6),
(34, 3, 11, 'Tipe Data Bagian 2', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/AFMVeww0QiQ\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:13:10', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 7),
(35, 3, 11, 'Tipe Data Bagian 2', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/AFMVeww0QiQ\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:14:49', NULL, '2020-07-12 00:21:23', 1, '2020-07-12 00:21:23', 1, 8),
(36, 3, 11, 'Tipe Data Bagian 3', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/S8TwNygWMa4\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:15:37', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 8),
(37, 3, 11, 'Nilai', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/echl1b4qvk4\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:16:18', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 9),
(38, 3, 11, 'Pseudo Code', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/watch?v=yhQvnKxFod8\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:16:48', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 10),
(39, 3, 11, 'If Else', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/fBa4VKgn21I\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:17:28', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 11),
(40, 3, 11, 'Pengulangan Bagian 1', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/ZZCBVzs0uSU\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:18:02', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 12),
(41, 3, 11, 'Pengulangan Bagian 2', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/vUHm8C4-ZGE\" width=\"100%\"></iframe></p>', NULL, 0, 1, '2020-07-12 00:18:37', NULL, '2020-07-17 14:19:36', NULL, NULL, 0, 13),
(42, 2, 11, 'Faktor dalam IMK', '<p>Faktor-faktor yang dipelajari dalam IMK yaitu manusia, komputer dan interaksi antara manusia dengan komputer.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 2 - Faktor dalam IMK.mp4', 1, 1, '2020-07-20 01:58:22', NULL, '2020-07-20 01:58:22', NULL, NULL, 0, 2),
(43, 2, 11, 'Perancangan dalam IMK', '<p>Proses dalam perancangan IMK, perancangan interaksi, perancangan skenario sistem aplikasi sampai dengan perancangan user interface.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 3 - Perancangan dalam IMK.mp4', 1, 1, '2020-07-20 02:26:25', NULL, '2020-07-20 02:26:25', NULL, NULL, 0, 3),
(44, 2, 11, 'User Experience (UX)', '<p>Perancangan interaksi dengan memanfaatkan kerangka kerja The Five Planes dari Garret.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 4 - User Experience (UX).mp4', 1, 1, '2020-07-21 01:01:52', NULL, '2020-07-21 01:01:52', NULL, NULL, 0, 4),
(45, 2, 11, 'User Centered Design (UCD)', '<p>Tahap-tahap perancangan yang berpusat dan melibatkan pengguna, pemanfaatan prototype sebagai bagian siklus analisis - perancangan untuk implementasi sistem aplikasi.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 5 - User Centered Design (UCD).mp4', 1, 1, '2020-07-21 01:03:23', NULL, '2020-07-21 01:03:23', NULL, NULL, 0, 5),
(46, 2, 11, 'Usability', '<p>Konsep dan komponen usability sebagai acuan dan pengujian perancangan sistem aplikasi, khususnya perancangan user interface.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 6 - Usability.mp4', 1, 1, '2020-07-21 01:05:47', NULL, '2020-07-21 01:05:47', NULL, NULL, 0, 6),
(47, 2, 11, 'References', '<p>Referensi yang digunakan dalam kuliah Interaksi Manusia Komputer : text books, websites dan youtube channel.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Materi/IMK/Pengantar Interaksi Manusia Komputer Bagian 7 - References.mp4', 1, 1, '2020-07-21 01:08:05', NULL, '2020-07-21 01:08:05', NULL, NULL, 0, 7),
(48, 7, 21, 'Materi 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Materi/Opening Course Pendidikan Pancasila.mp4', 1, 47, '2020-07-24 13:53:50', NULL, '2020-07-24 13:55:20', NULL, NULL, 0, 1),
(49, 7, 21, 'Materi 2', '<p><iframe frameborder=\"0\" height=\"500px\" scrolling=\"no\" src=\"https://www.youtube.com/embed/lqcjyEVr6WY\" width=\"100%\"></iframe></p>', NULL, 0, 47, '2020-07-24 13:55:12', NULL, '2020-07-24 13:55:21', NULL, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id_exam` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `descriptions` text NOT NULL,
  `cover_img_url` text DEFAULT NULL,
  `random_q` tinyint(1) NOT NULL DEFAULT 1,
  `random_c` int(11) NOT NULL DEFAULT 1,
  `max_choices` int(11) NOT NULL DEFAULT 4 COMMENT 'A, B, C, D',
  `max_time` int(11) NOT NULL,
  `max_questions` int(11) NOT NULL DEFAULT 0,
  `is_share_link` tinyint(1) NOT NULL,
  `is_unlimited_users` tinyint(1) NOT NULL,
  `max_users` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `is_no_end_time` double NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 1,
  `exam_price` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id_exam`, `id_company`, `uuid`, `title`, `category`, `descriptions`, `cover_img_url`, `random_q`, `random_c`, `max_choices`, `max_time`, `max_questions`, `is_share_link`, `is_unlimited_users`, `max_users`, `start_date`, `is_no_end_time`, `end_date`, `is_free`, `is_private`, `exam_price`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`) VALUES
(2, 11, '8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c', 'Prajabatan K1/K2 Angkatan LXX', 15, '<p><strong>Diklat prajabatan</strong>&nbsp;atau pendidikan dan pelatihan&nbsp;<strong>prajabatan</strong>&nbsp;adalah syarat bagi Calon Pegawai Negeri Sipil (CPNS) untuk diangkat menjadi Pegawai Negeri Sipil (PNS). Dalam Peraturan Pemerintah No. 101 Tahun 2000 tentang pendidikan dan pelatihan jabatan Pegawai Negeri Sipil, antara lain ditetapkan jenis-jenis&nbsp;<strong>diklat</strong>&nbsp;PNS.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/white-and-red-house-surrounded-by-trees-at-night-1612351.jpg', 1, 1, 4, 90, 0, 1, 0, 50, '2020-03-03 15:24:00', 1, '9999-12-30 00:00:00', 0, 1, 1000000, 1, '2020-02-10 23:31:00', NULL, '2020-07-23 14:05:31', NULL, NULL, 0),
(3, 11, '8fddde34-06fb-4017-a504-d623f92b17a8', 'Wawasan Kebangsaan', 0, '<p><strong>Wawasan kebangsaan</strong>&nbsp;adalah cara pandang bangsa Indonesia mengenai diri dan lingkungannya, mengutamakan kesatuan dan persatuan wilayah dalam penyelenggaraan kehidupan bermasyarakat, berbangsa dan bernegara</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/high-rise-building-at-the-city-2438240.jpg', 1, 1, 4, 60, 0, 1, 1, 0, '2020-07-17 12:55:00', 1, '9999-12-30 00:00:00', 1, 1, 0, 1, '2020-02-15 21:26:24', NULL, '2020-07-17 12:35:49', NULL, NULL, 0),
(4, 11, '8fde3320-0931-4cf1-a455-a643a34fdf09', 'Kemampuan Bekerja Sama', 0, '<p>Lorem</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/buildings-city-city-view-cityscape-597909.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-04-15 20:07:16', 0, '2020-04-22 20:06:41', 1, 0, 0, 1, '2020-02-16 01:23:52', NULL, '2020-02-16 01:23:52', NULL, NULL, 0),
(5, 11, '8ffe77ca-9a7e-473a-90ad-2cc973a2e93d', 'Wawasan Jabatan', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/high-rise-building-at-the-city-2438240.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-03-03 18:20:00', 1, NULL, 1, 0, 0, 1, '2020-03-03 02:22:22', NULL, '2020-06-17 04:35:04', 31, '2020-06-17 04:35:04', 1),
(6, 11, '8ffe7b39-13a1-49e3-88a5-0353959f7ae0', 'Wawasan Kebudayaan', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/high-rise-building-at-the-city-2438240.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-03-03 18:31:00', 1, '2020-03-04 18:31:00', 1, 0, 0, 1, '2020-03-03 02:31:58', NULL, '2020-06-07 02:20:50', 1, '2020-06-07 02:20:50', 1),
(7, 14, '9020b287-a7e3-4345-905a-08408e9bc764', 'Prajabatan XII', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/90208061-ca4a-4177-b4ef-f54461c4afc3/file/1/Cover Elearning/books-in-black-wooden-book-shelf-159711.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-03-20 18:43:00', 1, '2020-03-21 18:43:00', 1, 0, 0, 12, '2020-03-20 02:44:45', NULL, '2020-03-20 02:44:45', NULL, NULL, 0),
(8, 14, '9020b3d9-1c10-4728-b369-b5840264e3e4', 'Prajabatan XII', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/90208061-ca4a-4177-b4ef-f54461c4afc3/file/1/Cover Elearning/books-in-black-wooden-book-shelf-159711.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-03-20 18:47:00', 1, '2020-03-21 18:47:00', 1, 0, 0, 12, '2020-03-20 02:48:27', NULL, '2020-03-20 02:48:27', NULL, NULL, 0),
(9, 11, '90ef5988-087d-4cbb-a79b-cb84f1c8312e', 'Prajabatan K1/K2', 0, '<p><strong>Diklat prajabatan</strong>&nbsp;atau pendidikan dan pelatihan&nbsp;<strong>prajabatan</strong>&nbsp;adalah syarat bagi Calon Pegawai Negeri Sipil (CPNS) untuk diangkat menjadi Pegawai Negeri Sipil (PNS). Dalam Peraturan Pemerintah No. 101 Tahun 2000 tentang pendidikan dan pelatihan jabatan Pegawai Negeri Sipil, antara lain ditetapkan jenis-jenis&nbsp;<strong>diklat</strong>&nbsp;PNS.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/white-2-storey-house-near-trees-1115804.jpg', 1, 1, 6, 15, 0, 1, 0, 1, '2020-07-01 12:10:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 1, '2020-06-30 20:12:16', NULL, '2020-07-25 05:54:22', NULL, NULL, 0),
(10, 11, '90ef5bca-bb3c-4fb4-9780-bf7656e244d7', 'Testing Soal 2', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/architecture-blue-sky-buildings-city-409127.jpg', 1, 1, 4, 15, 0, 1, 1, NULL, '2020-07-01 12:18:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 1, '2020-06-30 20:18:35', NULL, '2020-06-30 20:18:35', NULL, NULL, 0),
(11, 21, '911e7189-88d7-4ade-bcc7-a6804accc694', 'Ujian Pengantar Perikanan dan Kelautan', 0, '<p>Ujian pengantar perikanan dan kelautan</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Cover/landscape-of-river-near-the-mountains-713074.jpg', 1, 1, 4, 10, 0, 1, 1, NULL, '2020-07-24 22:02:00', 0, '2020-08-01 00:00:00', 1, 0, 0, 47, '2020-07-24 14:03:18', NULL, '2020-07-24 14:03:18', NULL, NULL, 0),
(12, 21, '911e7bff-b6fb-470c-94c9-e46af15b6629', 'Ujian Berbayar', 0, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '/storage/911e6acd-37be-4d59-9f07-dfa488ad6ea2/file/1/Cover/landscape-of-river-near-the-mountains-713074.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-07-24 22:29:00', 1, '9999-12-30 00:00:00', 0, 0, 800000, 47, '2020-07-24 14:32:34', NULL, '2020-07-24 14:32:34', NULL, NULL, 0),
(13, 11, '9125b3c7-6bfc-435a-9b9d-8700e7402e33', 'Tsting ujian', 16, '<p>Lorem ipsum</p>', 'http://elcat.localhost/storage/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb/file/1/Cover/android-with-VR-headset-on_3374756791148694408.jpg', 1, 1, 4, 60, 0, 1, 1, NULL, '2020-07-28 12:38:00', 1, '9999-12-30 00:00:00', 1, 0, 0, 1, '2020-07-28 04:39:20', NULL, '2020-07-28 04:39:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exams_courses_relations`
--

CREATE TABLE `exams_courses_relations` (
  `id_relation` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `id_courses` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams_courses_relations`
--

INSERT INTO `exams_courses_relations` (`id_relation`, `id_exam`, `id_courses`, `id_company`, `created_by`, `created_at`) VALUES
(1, 13, 1, 11, 1, '2020-07-28 04:39:20'),
(2, 13, 2, 11, 1, '2020-07-28 04:39:20'),
(3, 2, 1, 11, 1, '2020-08-08 07:25:12'),
(4, 2, 2, 11, 1, '2020-08-08 07:25:12'),
(5, 2, 3, 11, 1, '2020-08-10 01:36:23'),
(9, 3, 3, 11, 1, '2020-08-10 03:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id_answer` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `answer` text NOT NULL,
  `time_used` bigint(20) NOT NULL DEFAULT 0,
  `sys_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`id_answer`, `id_company`, `id_exam`, `id_question`, `id_participant`, `answer`, `time_used`, `sys_score`) VALUES
(190, 11, 2, 42, 1, '', 365, 1),
(191, 11, 2, 21, 1, '3z58qx315Lx61917Rp', 42, 0),
(193, 11, 2, 27, 1, '5RT818a32Xb1Q7L851', 21, 1),
(194, 11, 2, 24, 1, 'E519Tj3G827168J57K', 27, 0),
(196, 11, 2, 34, 1, '0', 122, 1),
(197, 11, 2, 15, 1, 'uo5X12eDWKv86707A3C8k4MW15j', 38, 1),
(198, 11, 2, 33, 1, '<p>merupakan tindakan pelanggaran kemanusiaan, baik dilakukan oleh individu maupun institusi negara</p>', 49, 1),
(199, 11, 2, 31, 1, '<p>Pelanggaran ham berat dan ham ringan</p>', 29, 0.9),
(200, 11, 2, 38, 1, 'P19588438F8ou1nPF3', 14, 1),
(201, 11, 2, 25, 1, 'H554817j5Q11l8W04N', 15, 0),
(202, 11, 2, 32, 1, '<ol>\n	<li>Fitnah</li>\n	<li>Pembunuhan</li>\n	<li>Genosida</li>\n	<li>Peperangan</li>\n</ol>', 16, 1),
(203, 11, 2, 29, 1, '0', 12, 0),
(204, 11, 2, 30, 1, '<p>Pelangaran mengenai hak-hak yang harus didapatkan oleh setiap manusia</p>', 31, 5),
(205, 11, 2, 20, 1, 'f5370U1g06E31W08Z5', 19, 0),
(206, 11, 2, 18, 1, 'Na15nJ7u84a151830J', 30, 0),
(207, 11, 2, 22, 1, '175F5Hn2135823h211', 23, 0),
(208, 11, 2, 23, 1, 'bo75352u18931F63bG', 12, 1),
(209, 11, 2, 1, 1, '<p>UU Nomor 43 Tahun 1999 jo UU no 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian.<br />\nUU Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara.</p>', 16, 4),
(210, 11, 2, 17, 1, 'l31w1X78f171Ck4455', 9, 0),
(211, 11, 2, 26, 1, 'r07A5g184z5xN458R1', 10, 1),
(212, 11, 2, 39, 1, '81339J91881s583HbY', 11, 0),
(213, 11, 2, 35, 1, '<p>Undang udang 1945</p>', 25, 0),
(214, 11, 2, 36, 1, '831zQ8d8o71610l5U0', 12, 1),
(215, 11, 2, 28, 1, 'm58015b75JNR0131s8', 317, 0),
(241, 11, 3, 42, 1, '1u50d9B8Uc333e18s2', 9, 0),
(242, 11, 3, 36, 1, '1TF1613860538fhOr8', 3, 0),
(243, 11, 3, 41, 1, '35n0y880Z2116Ke922', 5, 0),
(244, 11, 3, 38, 1, 'P19588438F8ou1nPF3', 5, 1),
(245, 11, 3, 37, 1, '08J01Z8j7w35j7V851', 9, 1),
(246, 11, 3, 39, 1, '5813T8t318e129cK8n', 6, 0),
(247, 11, 3, 40, 1, '8l53X1D03T8P469581', 0, 0),
(248, 11, 10, 56, 30, '857r3736Q2nFq5X912', 14, 0),
(249, 11, 10, 55, 30, '5715393849CWG8EtC5', 7, 0),
(250, 11, 10, 53, 30, '51839J59ouR5330PG7', 5, 0),
(251, 11, 10, 57, 30, '758a27v53Q0KW9M16t', 6, 1),
(252, 11, 10, 54, 30, '1o5R59K73358si8137', 14, 1),
(253, 11, 3, 36, 30, '038dbk1d1i2n1658w8', 5, 0),
(254, 11, 3, 40, 30, '589c8Q32h8841a26N1', 3, 0),
(255, 11, 3, 42, 30, '1a11N9Q35V53D83802', 5, 0),
(256, 11, 3, 37, 30, '08J01Z8j7w35j7V851', 8, 1),
(257, 11, 3, 41, 30, '35n0y880Z2116Ke922', 6, 0),
(258, 11, 3, 38, 30, 'P19588438F8ou1nPF3', 8, 1),
(259, 11, 3, 39, 30, '1631281H18Eax8X895', 23, 1),
(260, 11, 9, 58, 1, 'd4513w550Fb4g9a521', 4, 1),
(261, 11, 9, 59, 1, 'V95P71e5351v2hy15L', 54, 1),
(262, 11, 9, 60, 1, '11n5552ml9d025LH55', 62, 1),
(263, 11, 9, 61, 1, '7S20515150917ZM5Q8', 35, 1),
(264, 11, 9, 62, 1, '<p>hak asasi manusia adalah hak yang dimiliki sejak lahir</p>', 16, 4.35),
(265, 21, 11, 63, 48, 'wp7z54W91459WF9255', 4, 0),
(266, 21, 11, 67, 48, '<p>hak asasi manusia adalah hak sejak lahir</p>', 11, 8.33),
(267, 21, 11, 66, 48, 'Zae5499155MJ9J59d0', 5, 1),
(268, 21, 11, 64, 48, '5Rf55fm15G9EM95190', 7, 0),
(269, 21, 11, 65, 48, 'U269v955Lq12555M99', 17, 1),
(270, 21, 11, 64, 52, '1L51xk9C5w59d59I51', 3, 1),
(271, 21, 11, 65, 52, 'U269v955Lq12555M99', 4, 1),
(272, 21, 11, 67, 52, '<p>hak asasi manusia adalah hak sejak lahir</p>', 13, 8.33),
(273, 21, 11, 66, 52, 'Zae5499155MJ9J59d0', 4, 1),
(274, 21, 11, 63, 52, '1H1j74489R959RaI55', 4, 1),
(275, 11, 9, 58, 30, '35152Z155l4194mAi7', 7, 0),
(276, 11, 9, 59, 30, 'IV9170hB2Q5155T1T5', 5, 0),
(277, 11, 9, 62, 30, '<p>hak asasi manusia adalah hak sejak lahir</p>', 12, 4.17),
(278, 11, 9, 60, 30, '11n5552ml9d025LH55', 4, 1),
(279, 11, 9, 61, 30, '90172553311r5Yb7k5', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_participant`
--

CREATE TABLE `exam_participant` (
  `id_exam_participant` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `from_group` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 3,
  `exam_start` timestamp NULL DEFAULT NULL,
  `exam_end` timestamp NULL DEFAULT NULL,
  `final_result` double DEFAULT NULL,
  `id_company` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_participant`
--

INSERT INTO `exam_participant` (`id_exam_participant`, `id_exam`, `id_participant`, `from_group`, `status`, `exam_start`, `exam_end`, `final_result`, `id_company`, `created_at`, `created_by`) VALUES
(1, 2, 1, 0, 1, '2020-02-24 22:00:00', '2020-02-24 22:45:07', 51.67, 11, '2020-02-10 23:31:00', 1),
(5, 3, 1, 0, 1, '2020-03-05 00:12:22', '2020-03-05 00:13:03', 28.57, 11, '2020-02-15 21:26:24', 1),
(6, 4, 1, 0, 1, NULL, NULL, NULL, 11, '2020-02-16 01:23:52', 1),
(7, 5, 1, 0, 1, NULL, NULL, NULL, 11, '2020-03-03 02:22:22', 1),
(8, 6, 1, 0, 1, NULL, NULL, NULL, 11, '2020-03-03 02:31:58', 1),
(9, 7, 1, 0, 1, NULL, NULL, NULL, 11, '2020-03-03 02:39:13', 1),
(10, 8, 1, 0, 1, NULL, NULL, NULL, 11, '2020-03-03 02:39:50', 1),
(43, 2, 30, 0, 3, NULL, NULL, NULL, 11, '2020-05-06 22:33:35', 30),
(44, 2, 33, 0, 3, NULL, NULL, NULL, 11, '2020-06-01 22:47:45', 1),
(45, 2, 34, 0, 3, NULL, NULL, NULL, 11, '2020-06-01 22:47:45', 1),
(46, 2, 35, 0, 3, NULL, NULL, NULL, 11, '2020-06-01 22:47:45', 1),
(47, 2, 36, 0, 3, NULL, NULL, NULL, 11, '2020-06-01 22:47:45', 1),
(48, 4, 30, 0, 3, NULL, NULL, NULL, 11, '2020-06-28 00:57:34', 1),
(49, 9, 1, 0, 1, '2020-07-23 14:06:03', '2020-07-23 14:08:55', 92.76, 11, '2020-06-30 20:12:16', 1),
(50, 10, 1, 0, 1, NULL, NULL, NULL, 11, '2020-06-30 20:18:35', 1),
(51, 10, 30, 0, 3, '2020-07-01 19:04:25', '2020-07-01 19:05:13', 40, 11, '2020-06-30 23:40:04', 1),
(52, 3, 30, 0, 3, '2020-07-17 12:36:00', '2020-07-17 12:36:59', 42.86, 11, '2020-07-17 12:32:57', 1),
(53, 9, 30, 0, 3, '2020-07-25 04:57:03', '2020-07-25 04:57:41', 57.41, 11, '2020-07-23 13:59:09', 1),
(54, 9, 33, 0, 3, NULL, NULL, NULL, 11, '2020-07-23 13:59:09', 1),
(55, 9, 35, 0, 3, NULL, NULL, NULL, 11, '2020-07-23 13:59:09', 1),
(56, 9, 36, 0, 3, NULL, NULL, NULL, 11, '2020-07-23 13:59:09', 1),
(57, 9, 34, 0, 3, NULL, NULL, NULL, 11, '2020-07-23 13:59:09', 1),
(58, 11, 47, 0, 1, NULL, NULL, NULL, 21, '2020-07-24 14:03:19', 47),
(59, 11, 48, 0, 3, '2020-07-24 14:08:57', '2020-07-24 14:09:42', 73.81, 21, '2020-07-24 14:03:38', 47),
(60, 12, 47, 0, 1, NULL, NULL, NULL, 21, '2020-07-24 14:32:34', 47),
(62, 12, 50, 0, 3, NULL, NULL, NULL, 21, '2020-07-24 14:40:07', 50),
(63, 11, 50, 0, 3, NULL, NULL, NULL, 21, '2020-07-24 15:00:06', 50),
(64, 12, 51, 0, 3, NULL, NULL, NULL, 21, '2020-07-24 15:09:58', 51),
(65, 11, 52, 0, 3, '2020-07-24 15:34:36', '2020-07-24 15:35:11', 88.1, 21, '2020-07-24 15:33:50', 52),
(66, 12, 52, 0, 3, NULL, NULL, NULL, 21, '2020-07-24 15:34:29', 52),
(67, 12, 52, 0, 3, NULL, NULL, NULL, 21, '2020-07-24 15:34:29', 52),
(68, 13, 1, 0, 1, NULL, NULL, NULL, 11, '2020-07-28 04:39:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions_adv`
--

CREATE TABLE `exam_questions_adv` (
  `id_exam_question` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `imported_from` int(11) NOT NULL,
  `picked` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_questions_adv`
--

INSERT INTO `exam_questions_adv` (`id_exam_question`, `id_company`, `id_exam`, `imported_from`, `picked`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 11, 2, 3, 3, '2020-06-01 04:50:38', 1, '2020-06-02 03:13:22', 1, '2020-06-02 03:13:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_activity_log`
--

CREATE TABLE `general_activity_log` (
  `id_log` bigint(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_type` int(11) NOT NULL,
  `route_name` text NOT NULL,
  `route_parameters` text NOT NULL,
  `page_url` text NOT NULL,
  `access_by` int(11) NOT NULL,
  `access_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_activity_log`
--

INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(76, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:52:18'),
(77, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:53:16'),
(78, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:54:43'),
(79, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:55:18'),
(80, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:57:18'),
(81, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:57:33'),
(82, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:57:47'),
(83, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:58:57'),
(84, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 05:59:24'),
(85, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-10 06:02:52'),
(86, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 06:02:56'),
(87, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 06:04:38'),
(88, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 06:04:45'),
(89, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 17:33:42'),
(90, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 17:42:47'),
(91, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 17:43:52'),
(92, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:06:46'),
(93, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:25:01'),
(94, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:27:50'),
(95, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:28:27'),
(96, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:30:32'),
(97, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:33:07'),
(98, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:33:23'),
(99, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:39:25'),
(100, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:39:44'),
(101, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:46:49'),
(102, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:47:45'),
(103, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:48:39'),
(104, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:50:04'),
(105, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:53:26'),
(106, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:53:55'),
(107, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:57:26'),
(108, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:57:52'),
(109, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:58:58'),
(110, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 18:59:42'),
(111, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 19:51:33'),
(112, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 19:51:52'),
(113, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 19:56:49'),
(114, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 19:57:27'),
(115, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 19:59:47'),
(116, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:00:28'),
(117, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:01:00'),
(118, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:04:00'),
(119, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:04:23'),
(120, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-05-10 20:04:42'),
(121, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:04:51'),
(122, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-10 20:04:57'),
(123, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-05-10 20:05:02'),
(124, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-05-10 20:05:35'),
(125, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-05-10 20:07:04'),
(126, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-05-10 20:07:39'),
(127, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-05-10 20:07:51'),
(128, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-05-10 20:08:28'),
(129, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-05-10 20:08:37'),
(130, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:08:43'),
(131, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:09:17'),
(132, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:09:48'),
(133, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:10:02'),
(134, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-10 20:10:06'),
(135, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-05-10 20:10:09'),
(136, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-05-10 20:10:12'),
(137, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-05-10 20:11:27'),
(138, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-05-10 20:13:24'),
(139, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-05-10 20:17:45'),
(140, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-05-10 20:18:25'),
(141, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-05-10 20:23:44'),
(142, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:23:51'),
(143, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:25:04'),
(144, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:25:18'),
(145, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:25:53'),
(146, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:26:10'),
(147, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:26:33'),
(148, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:34:46'),
(149, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:35:28'),
(150, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:35:34'),
(151, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:36:34'),
(152, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:36:42'),
(153, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:37:18'),
(154, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:38:52'),
(155, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:39:05'),
(156, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:40:22'),
(157, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-10 20:40:27'),
(158, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'learning/8ffeb246-33ae-4954-aec3-c31460083e30', 1, '2020-05-10 20:40:35'),
(159, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-10 20:40:52'),
(160, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-05-10 20:40:57'),
(161, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-05-10 20:41:08'),
(162, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-10 20:41:13'),
(163, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-05-10 20:41:16'),
(164, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-05-10 20:42:20'),
(165, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:45:05'),
(166, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:45:36'),
(167, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:46:06'),
(168, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:46:24'),
(169, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:47:53'),
(170, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:48:26'),
(171, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:50:45'),
(172, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:51:03'),
(173, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:51:18'),
(174, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:51:25'),
(175, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:51:45'),
(176, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:55:48'),
(177, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:56:12'),
(178, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:56:41'),
(179, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:57:08'),
(180, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:57:22'),
(181, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:57:37'),
(182, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:58:06'),
(183, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:58:17'),
(184, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:58:32'),
(185, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:58:52'),
(186, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:59:25'),
(187, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 20:59:35'),
(188, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-10 21:08:50'),
(189, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:20:32'),
(190, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:28:34'),
(191, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:28:57'),
(192, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:29:28'),
(193, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:30:15'),
(194, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 03:44:24'),
(195, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 04:40:40'),
(196, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-11 06:54:31'),
(197, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 00:13:57'),
(198, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 00:23:23'),
(199, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-05-12 00:24:09'),
(200, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-05-12 00:24:42'),
(201, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-05-12 00:24:59'),
(202, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-05-12 00:25:00'),
(203, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-05-12 00:25:29'),
(204, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-05-12 00:26:02'),
(205, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-05-12 00:26:03'),
(206, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-05-12 00:26:55'),
(207, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 04:54:37'),
(208, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-05-12 04:55:28'),
(209, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-05-12 04:56:07'),
(210, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-05-12 05:00:58'),
(211, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-05-12 05:01:01'),
(212, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-05-12 05:01:31'),
(213, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-05-12 05:02:32'),
(214, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-05-12 05:02:34'),
(215, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-05-12 05:04:17'),
(216, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-05-12 05:04:22'),
(217, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-05-12 05:09:15'),
(218, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-05-12 05:09:46'),
(219, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-05-12 05:09:47'),
(220, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/add', 1, '2020-05-12 05:15:46'),
(221, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-05-12 05:16:17'),
(222, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-05-12 05:16:44'),
(223, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-05-12 05:17:06'),
(224, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-05-12 05:17:08'),
(225, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-05-12 05:18:12'),
(226, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:33:49'),
(227, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:38:33'),
(228, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:45:30'),
(229, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:46:42'),
(230, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:47:18'),
(231, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-05-12 05:49:13'),
(232, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-05-12 05:49:47'),
(233, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:50:27'),
(234, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 05:55:17'),
(235, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:57:33'),
(236, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:57:44'),
(237, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-05-12 05:57:51'),
(238, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:57:54'),
(239, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:58:58'),
(240, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:59:20'),
(241, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 05:59:29'),
(242, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-05-12 06:00:20'),
(243, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-05-12 06:00:51'),
(244, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-05-12 06:00:59'),
(245, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-05-12 06:01:19'),
(246, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-05-12 06:01:41'),
(247, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-05-12 06:01:49'),
(248, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-05-12 06:02:18'),
(249, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-05-12 06:02:38'),
(250, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-05-12 06:03:08'),
(251, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 1, '2020-05-12 06:03:16'),
(252, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-05-12 06:03:40'),
(253, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 06:03:57'),
(254, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 06:04:42'),
(255, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 06:05:04'),
(256, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 06:05:16'),
(257, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 17:03:40'),
(258, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-05-12 17:05:09'),
(259, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 30, '2020-05-12 17:05:15'),
(260, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 30, '2020-05-12 17:05:18'),
(261, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 30, '2020-05-12 17:05:20'),
(262, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-05-12 17:05:27'),
(263, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 30, '2020-05-12 17:06:28'),
(264, 11, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 30, '2020-05-12 17:06:39'),
(265, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 30, '2020-05-12 17:06:44'),
(266, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 30, '2020-05-12 17:06:49'),
(267, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 30, '2020-05-12 17:06:52'),
(268, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 30, '2020-05-12 17:06:54'),
(269, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 30, '2020-05-12 17:11:00'),
(270, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 30, '2020-05-12 17:11:03'),
(271, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 30, '2020-05-12 17:11:09'),
(272, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 17:11:46'),
(273, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 17:11:54'),
(274, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-05-12 17:12:02'),
(275, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-05-12 20:16:50'),
(276, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 20:17:00'),
(277, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-05-12 20:17:14'),
(278, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-05-12 20:18:02'),
(279, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-05-12 20:18:02'),
(280, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-05-12 20:18:06'),
(281, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"11\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/11', 1, '2020-05-12 20:18:11'),
(282, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-05-12 20:18:27'),
(283, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-05-12 20:18:29'),
(284, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-12 20:18:34'),
(285, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-05-12 20:18:40'),
(286, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-05-12 20:18:46'),
(287, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 30, '2020-05-12 20:19:05'),
(288, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 30, '2020-05-12 20:27:07'),
(289, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-12 20:27:22'),
(290, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-05-12 20:27:31'),
(291, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-05-12 20:27:35'),
(292, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach-materials', 1, '2020-05-12 20:27:35'),
(293, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-05-12 20:27:39'),
(294, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants', 1, '2020-05-12 20:27:48'),
(295, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants/to/json', 1, '2020-05-12 20:27:50'),
(296, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-13 17:43:50'),
(297, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-13 17:44:00'),
(298, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-13 17:44:07'),
(299, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-05-13 17:59:37'),
(300, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-13 17:59:49'),
(301, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-13 18:00:39'),
(302, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-13 18:01:14'),
(303, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-13 18:49:00'),
(304, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-05-13 18:49:07'),
(305, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-13 18:49:13'),
(306, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-05-13 20:03:06'),
(307, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-05-13 20:03:12'),
(308, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-13 23:39:13'),
(309, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-14 05:34:32'),
(310, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-05-14 05:38:27'),
(311, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-05-14 05:38:34'),
(312, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-05-14 05:39:08'),
(313, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-14 06:20:44'),
(314, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-14 06:20:51'),
(315, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-15 00:40:00'),
(316, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-15 00:41:29'),
(317, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-05-15 01:21:42'),
(318, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-05-15 01:23:20'),
(319, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-05-15 01:23:21'),
(320, -1, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 31, '2020-05-15 01:25:58'),
(321, -1, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 31, '2020-05-15 01:26:03'),
(322, -1, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 31, '2020-05-15 01:26:11'),
(323, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-05-15 01:26:14'),
(324, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-16 08:46:09'),
(325, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-05-16 08:46:17'),
(326, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-16 08:46:26'),
(327, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-05-21 20:05:26'),
(328, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-05-25 21:28:55'),
(329, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-05-25 21:29:00'),
(330, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-05-25 21:29:02'),
(331, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-05-25 21:29:13'),
(332, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-05-25 21:29:16'),
(333, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 04:20:26'),
(334, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-01 04:20:35'),
(335, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 04:20:37'),
(336, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-01 04:20:41'),
(337, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 04:20:41'),
(338, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 04:21:53'),
(339, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 04:22:09'),
(340, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 04:24:47'),
(341, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 04:24:56'),
(342, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-01 04:38:52'),
(343, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-01 04:38:56'),
(344, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-01 04:39:44'),
(345, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 04:44:05'),
(346, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-01 04:44:16'),
(347, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-06-01 04:44:19'),
(348, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-01 04:44:22'),
(349, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-01 04:44:23'),
(350, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-01 04:44:26'),
(351, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-01 04:44:31'),
(352, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-01 04:44:32'),
(353, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 04:48:25'),
(354, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 04:55:00'),
(355, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-01 04:55:03'),
(356, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 04:55:03'),
(357, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-06-01 04:55:06'),
(358, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1/update', 1, '2020-06-01 04:55:12'),
(359, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-06-01 04:55:13'),
(360, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-01 04:55:18'),
(361, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 04:55:22'),
(362, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-01 04:55:25'),
(363, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-01 04:55:26'),
(364, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 05:13:24'),
(365, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 05:15:11'),
(366, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 05:35:31'),
(367, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-01 05:35:33'),
(368, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 05:35:34'),
(369, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-01 05:35:37'),
(370, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-01 05:35:38'),
(371, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-01 05:35:42'),
(372, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-01 05:35:43'),
(373, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-01 05:36:22'),
(374, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-01 05:36:27'),
(375, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-01 05:36:27'),
(376, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-01 05:36:30'),
(377, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-01 05:36:33'),
(378, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-01 05:36:35'),
(379, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 05:45:28'),
(380, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-01 22:39:59'),
(381, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-02 06:41:51'),
(382, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-02 06:41:55'),
(383, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-02 06:41:55'),
(384, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-02 21:52:49'),
(385, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-02 22:22:13'),
(386, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-02 22:22:21'),
(387, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-02 22:22:27'),
(388, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-03 00:48:40'),
(389, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-03 00:52:48'),
(390, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-03 00:52:55'),
(391, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-03 00:53:12'),
(392, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-03 00:58:48'),
(393, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-03 00:58:50'),
(394, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 01:14:00'),
(395, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 01:14:03'),
(396, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 21:46:44'),
(397, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 21:46:47'),
(398, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:16:06'),
(399, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:16:08'),
(400, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:16:34'),
(401, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:16:37'),
(402, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:17:37'),
(403, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:17:40'),
(404, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:18:06'),
(405, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:18:09'),
(406, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:18:38'),
(407, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:18:41'),
(408, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:21:33'),
(409, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:21:36'),
(410, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:25:16'),
(411, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:25:18'),
(412, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:26:35'),
(413, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:26:38'),
(414, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:28:03'),
(415, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:28:06'),
(416, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:28:31'),
(417, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:28:53'),
(418, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:35:34'),
(419, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:37:50'),
(420, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:42:14'),
(421, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:48:55'),
(422, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:51:19'),
(423, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-04 23:52:38'),
(424, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 06:45:48'),
(425, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:29:56'),
(426, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:32:52'),
(427, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:33:00'),
(428, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:34:31'),
(429, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:49:32'),
(430, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:55:29'),
(431, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 18:58:41'),
(432, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:00:02'),
(433, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:01:41'),
(434, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:02:16'),
(435, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:02:50'),
(436, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:03:31'),
(437, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:05:10'),
(438, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:05:35'),
(439, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:06:41'),
(440, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:07:31'),
(441, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:11:21'),
(442, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:12:55'),
(443, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:14:40'),
(444, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:18:05'),
(445, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:23:34'),
(446, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:23:54'),
(447, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:25:20'),
(448, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:28:58'),
(449, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:29:03'),
(450, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 19:29:18'),
(451, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-05 20:26:05'),
(452, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-06-05 20:26:36'),
(453, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-06-05 20:26:40'),
(454, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"2\",\"taskID\":\"10\"}', 'student/task/2/10', 1, '2020-06-05 20:26:48'),
(455, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-05 20:27:00'),
(456, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-05 20:29:06'),
(457, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-05 20:29:23'),
(458, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-06-05 20:29:29'),
(459, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-05 20:29:34'),
(460, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 20:30:34'),
(461, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-05 20:43:13'),
(462, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 00:42:15'),
(463, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 00:42:23'),
(464, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30', 1, '2020-06-07 00:42:27'),
(465, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:42:27'),
(466, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:46:10'),
(467, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:46:31'),
(468, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:48:07'),
(469, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:53:51'),
(470, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:56:45'),
(471, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:57:20'),
(472, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 00:59:09');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(473, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 01:00:04'),
(474, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 01:00:32'),
(475, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 01:03:48'),
(476, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-06-07 01:03:52'),
(477, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:03:52'),
(478, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants', 1, '2020-06-07 01:03:58'),
(479, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-06-07 01:03:59'),
(480, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:13:30'),
(481, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:13:38'),
(482, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:14:09'),
(483, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:14:58'),
(484, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:18:32'),
(485, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:19:38'),
(486, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:19:54'),
(487, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:20:18'),
(488, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:20:57'),
(489, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:21:19'),
(490, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:21:34'),
(491, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:22:23'),
(492, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:23:05'),
(493, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:26:08'),
(494, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:33:32'),
(495, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:34:58'),
(496, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:42:54'),
(497, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:44:29'),
(498, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:45:24'),
(499, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:46:00'),
(500, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 01:47:09'),
(501, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 02:02:56'),
(502, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:03:08'),
(503, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 02:03:28'),
(504, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:03:33'),
(505, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:03:36'),
(506, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 02:04:04'),
(507, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:04:09'),
(508, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 02:04:49'),
(509, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 02:06:12'),
(510, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:06:39'),
(511, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 02:06:41'),
(512, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30', 1, '2020-06-07 02:06:58'),
(513, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 02:06:58'),
(514, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:07:13'),
(515, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 02:07:15'),
(516, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30', 1, '2020-06-07 02:08:33'),
(517, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8ffeb246-33ae-4954-aec3-c31460083e30\"}', 'admin/courses/8ffeb246-33ae-4954-aec3-c31460083e30/teach-materials', 1, '2020-06-07 02:08:34'),
(518, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-07 02:08:45'),
(519, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 02:08:47'),
(520, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 02:24:22'),
(521, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-07 02:24:28'),
(522, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-07 02:24:33'),
(523, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-07 02:25:15'),
(524, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-06-07 02:25:20'),
(525, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 02:41:34'),
(526, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 02:47:55'),
(527, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 02:49:14'),
(528, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 03:40:58'),
(529, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-07 03:41:12'),
(530, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-06-07 03:41:26'),
(531, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach-materials', 1, '2020-06-07 03:41:27'),
(532, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/task', 1, '2020-06-07 03:41:31'),
(533, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/task/create', 1, '2020-06-07 03:41:33'),
(534, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/task/store', 1, '2020-06-07 03:42:16'),
(535, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/task', 1, '2020-06-07 03:42:18'),
(536, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:42:33'),
(537, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:43:04'),
(538, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:43:15'),
(539, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\"}', 'student/task/3', 1, '2020-06-07 03:43:21'),
(540, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:44:35'),
(541, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:45:41'),
(542, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:46:02'),
(543, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:47:38'),
(544, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:47:53'),
(545, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:48:12'),
(546, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 03:48:19'),
(547, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:10:15'),
(548, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:10:21'),
(549, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-06-07 04:10:34'),
(550, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:10:46'),
(551, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:33:29'),
(552, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:34:03'),
(553, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 04:34:12'),
(554, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 04:34:30'),
(555, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bfc581-e448-4ba9-8210-6b013e987fc6\"}', 'general/announcement/90bfc581-e448-4ba9-8210-6b013e987fc6', 1, '2020-06-07 04:34:39'),
(556, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 04:34:42'),
(557, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:35:05'),
(558, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 04:37:43'),
(559, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 19:39:07'),
(560, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-07 19:39:20'),
(561, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-07 19:39:26'),
(562, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-06-07 19:39:34'),
(563, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 19:42:12'),
(564, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 20:15:59'),
(565, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 20:16:57'),
(566, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 20:17:06'),
(567, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-07 20:17:12'),
(568, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-07 22:45:50'),
(569, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-07 22:46:04'),
(570, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-07 23:06:19'),
(571, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-06-07 23:06:23'),
(572, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-07 23:16:53'),
(573, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-06-07 23:16:59'),
(574, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-07 23:17:37'),
(575, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 30, '2020-06-07 23:17:42'),
(576, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 30, '2020-06-07 23:17:45'),
(577, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-06-07 23:18:26'),
(578, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-07 23:37:08'),
(579, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 23:53:04'),
(580, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 23:53:25'),
(581, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-07 23:56:07'),
(582, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-08 00:04:07'),
(583, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 00:04:12'),
(584, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-08 00:04:12'),
(585, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-08 00:04:17'),
(586, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-08 00:04:18'),
(587, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-08 00:32:39'),
(588, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-08 00:32:49'),
(589, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-08 00:45:33'),
(590, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-08 00:45:39'),
(591, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-08 00:45:44'),
(592, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 00:45:47'),
(593, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:13:20'),
(594, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:19:52'),
(595, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:20:04'),
(596, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:21:35'),
(597, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:26:02'),
(598, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:29:24'),
(599, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:37:34'),
(600, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:38:08'),
(601, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:38:37'),
(602, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:39:57'),
(603, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:42:14'),
(604, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:49:00'),
(605, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:51:04'),
(606, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:52:00'),
(607, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 03:55:09'),
(608, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:50:07'),
(609, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:50:24'),
(610, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:50:39'),
(611, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:52:31'),
(612, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:53:14'),
(613, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:56:12'),
(614, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:57:27'),
(615, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:58:18'),
(616, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 04:59:44'),
(617, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-08 05:07:22'),
(618, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:07:38'),
(619, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:22:38'),
(620, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:23:00'),
(621, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:23:15'),
(622, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:23:31'),
(623, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:24:01'),
(624, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:25:15'),
(625, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:40:37'),
(626, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:41:26'),
(627, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:43:15'),
(628, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:45:31'),
(629, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:45:36'),
(630, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:45:58'),
(631, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:46:36'),
(632, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:47:01'),
(633, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:47:46'),
(634, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:49:21'),
(635, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:50:08'),
(636, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:50:47'),
(637, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:52:18'),
(638, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:52:56'),
(639, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:53:25'),
(640, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:53:34'),
(641, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:53:57'),
(642, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 05:54:56'),
(643, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:04:07'),
(644, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:04:39'),
(645, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:06:09'),
(646, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:12:07'),
(647, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:12:43'),
(648, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:13:10'),
(649, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:13:33'),
(650, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 06:14:08'),
(651, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 07:10:49'),
(652, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:11:08'),
(653, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:12:30'),
(654, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:12:36'),
(655, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:12:55'),
(656, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:13:41'),
(657, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:14:40'),
(658, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:15:50'),
(659, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:16:40'),
(660, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 07:18:44'),
(661, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:18:50'),
(662, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:20:07'),
(663, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:20:36'),
(664, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:20:57'),
(665, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:21:29'),
(666, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:24:37'),
(667, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:27:14'),
(668, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:31:33'),
(669, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:34:42'),
(670, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:35:51'),
(671, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:39:51'),
(672, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:40:28'),
(673, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:40:41'),
(674, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:41:41'),
(675, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:43:08'),
(676, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:43:26'),
(677, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:43:35'),
(678, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:44:38'),
(679, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:45:11'),
(680, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:46:08'),
(681, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:48:32'),
(682, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:49:49'),
(683, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:54:56'),
(684, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 07:55:39'),
(685, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 07:56:07'),
(686, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 07:56:38'),
(687, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 07:56:43'),
(688, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 07:56:55'),
(689, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 08:00:26'),
(690, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-08 08:00:33'),
(691, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-08 08:02:19'),
(692, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-08 08:02:24'),
(693, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-06-08 08:03:05'),
(694, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 08:03:11'),
(695, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 08:44:47'),
(696, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 08:48:21'),
(697, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 08:48:37'),
(698, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 08:49:21'),
(699, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 08:49:27'),
(700, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-08 08:54:22'),
(701, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 09:05:01'),
(702, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-06-08 18:25:10'),
(703, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-08 18:26:03'),
(704, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-08 18:28:56'),
(705, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-08 18:29:04'),
(706, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 18:29:07'),
(707, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-08 18:29:08'),
(708, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-08 18:29:11'),
(709, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-08 18:29:12'),
(710, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-08 18:29:27'),
(711, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-08 18:29:29'),
(712, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-06-08 18:30:09'),
(713, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-08 18:30:14'),
(714, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 33, '2020-06-08 18:30:20'),
(715, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 35, '2020-06-08 18:37:30'),
(716, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 35, '2020-06-08 18:37:38'),
(717, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 35, '2020-06-08 18:37:42'),
(718, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-08 19:46:11'),
(719, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-08 19:49:18'),
(720, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-08 19:49:22'),
(721, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:49:26'),
(722, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:49:30'),
(723, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:51:04'),
(724, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:51:43'),
(725, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:52:25'),
(726, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:52:48'),
(727, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:53:22'),
(728, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 19:55:00'),
(729, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:11:56'),
(730, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-08 20:27:06'),
(731, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-06-08 20:27:11'),
(732, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:27:13'),
(733, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:27:31'),
(734, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:27:45'),
(735, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:28:31'),
(736, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:31:28'),
(737, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:37:51'),
(738, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:37:57'),
(739, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:40:22'),
(740, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:40:27'),
(741, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-06-08 20:42:17'),
(742, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-08 20:42:21'),
(743, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-08 20:44:11'),
(744, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-08 20:45:35'),
(745, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-08 20:45:56'),
(746, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:46:04'),
(747, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-08 20:46:30'),
(748, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:46:39'),
(749, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-06-08 20:46:48'),
(750, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-08 20:47:14'),
(751, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:47:19'),
(752, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:48:52'),
(753, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:50:52'),
(754, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-08 20:50:56'),
(755, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 34, '2020-06-08 20:51:32'),
(756, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 34, '2020-06-08 20:51:36'),
(757, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 20:59:55'),
(758, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 21:00:01'),
(759, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 21:00:49'),
(760, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-08 21:02:02'),
(761, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:41:33'),
(762, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-09 01:42:03'),
(763, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-09 01:42:06'),
(764, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:44:55'),
(765, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:45:13'),
(766, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:46:37'),
(767, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:48:19'),
(768, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-06-09 01:49:12'),
(769, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 33, '2020-06-09 01:49:24'),
(770, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-09 01:50:03'),
(771, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-09 01:51:54');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(772, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-09 01:51:57'),
(773, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-09 01:52:08'),
(774, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-06-09 01:52:51'),
(775, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-09 01:55:09'),
(776, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 01:56:01'),
(777, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-09 01:56:07'),
(778, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-09 01:56:19'),
(779, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-09 02:02:07'),
(780, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\",\"taskID\":\"12\"}', 'student/task/3/12', 1, '2020-06-09 04:58:55'),
(781, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-09 04:59:21'),
(782, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-09 19:35:24'),
(783, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-06-09 19:35:36'),
(784, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-09 19:35:42'),
(785, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-09 19:35:43'),
(786, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-09 19:35:46'),
(787, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-09 19:35:49'),
(788, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-09 19:35:50'),
(789, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-09 19:36:26'),
(790, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-09 20:50:58'),
(791, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-09 20:51:07'),
(792, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-09 20:51:13'),
(793, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-09 22:08:33'),
(794, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-10 01:46:57'),
(795, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-10 07:12:21'),
(796, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-10 07:25:19'),
(797, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-10 08:01:46'),
(798, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-10 19:07:52'),
(799, 11, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 1, '2020-06-10 19:10:30'),
(800, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac', 1, '2020-06-10 19:12:50'),
(801, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 19:12:51'),
(802, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 19:12:52'),
(803, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:21:28'),
(804, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:21:29'),
(805, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1/update', 1, '2020-06-10 19:21:30'),
(806, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:21:32'),
(807, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:21:33'),
(808, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1/update', 1, '2020-06-10 19:25:24'),
(809, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:25:26'),
(810, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/edit1', 1, '2020-06-10 19:25:27'),
(811, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 19:25:41'),
(812, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 19:25:42'),
(813, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/add', 1, '2020-06-10 19:25:45'),
(814, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/add', 1, '2020-06-10 19:25:46'),
(815, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-10 20:23:08'),
(816, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-10 20:23:11'),
(817, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-10 20:23:11'),
(818, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac', 1, '2020-06-10 20:23:39'),
(819, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 20:23:39'),
(820, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"90c707c2-ec30-4836-9913-9397914066ac\"}', 'admin/courses/90c707c2-ec30-4836-9913-9397914066ac/teach-materials', 1, '2020-06-10 20:23:40'),
(821, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-06-10 20:24:43'),
(822, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-10 20:25:05'),
(823, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-10 20:28:28'),
(824, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-10 20:28:28'),
(825, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/add', 1, '2020-06-10 20:29:57'),
(826, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-store', 1, '2020-06-10 20:30:03'),
(827, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-10 20:30:06'),
(828, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"17\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials/17', 1, '2020-06-10 20:36:10'),
(829, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-update', 1, '2020-06-10 20:36:13'),
(830, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-10 20:36:15'),
(831, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-11 03:57:33'),
(832, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-11 04:29:49'),
(833, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-11 04:29:53'),
(834, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-11 04:29:56'),
(835, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-11 04:30:05'),
(836, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-06-11 04:30:09'),
(837, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-11 04:30:12'),
(838, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 1, '2020-06-11 04:30:14'),
(839, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-11 04:52:39'),
(840, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-11 04:52:41'),
(841, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-11 04:52:45'),
(842, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-11 05:11:44'),
(843, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-11 05:15:19'),
(844, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-11 05:15:25'),
(845, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-11 05:15:26'),
(846, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-11 05:15:28'),
(847, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"9\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/9', 1, '2020-06-11 05:15:33'),
(848, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-11 05:15:39'),
(849, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-11 05:15:46'),
(850, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-11 05:15:47'),
(851, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-06-11 05:15:50'),
(852, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"33\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/33', 1, '2020-06-11 05:15:59'),
(853, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-06-11 05:16:01'),
(854, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-06-11 05:16:03'),
(855, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-06-11 17:43:35'),
(856, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-06-11 19:22:49'),
(857, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-06-11 19:24:03'),
(858, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-11 21:46:39'),
(859, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-12 02:12:02'),
(860, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-12 02:12:03'),
(861, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/add', 1, '2020-06-12 02:29:24'),
(862, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-12 05:46:01'),
(863, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-12 05:46:07'),
(864, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-12 05:46:14'),
(865, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-12 17:12:46'),
(866, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-12 17:13:00'),
(867, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-06-12 17:13:08'),
(868, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-12 17:13:11'),
(869, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-12 17:13:12'),
(870, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-12 17:13:14'),
(871, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-12 17:13:17'),
(872, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-12 17:13:18'),
(873, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-12 17:13:24'),
(874, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-06-12 17:14:20'),
(875, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-12 17:15:22'),
(876, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-12 17:16:25'),
(877, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-12 17:16:31'),
(878, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-15 06:10:09'),
(879, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-15 06:10:13'),
(880, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-15 06:10:13'),
(881, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-15 06:17:08'),
(882, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-15 06:17:11'),
(883, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-15 06:17:14'),
(884, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-sort', 1, '2020-06-15 06:17:16'),
(885, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/add', 1, '2020-06-15 06:17:17'),
(886, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/add', 1, '2020-06-15 06:17:21'),
(887, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-15 06:17:25'),
(888, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-16 21:36:01'),
(889, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-16 21:41:24'),
(890, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-16 21:41:30'),
(891, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-16 21:41:34'),
(892, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-16 21:41:35'),
(893, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-16 21:41:39'),
(894, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-16 21:41:41'),
(895, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach-materials', 1, '2020-06-16 21:41:52'),
(896, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 21:55:46'),
(897, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"24\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/24', 1, '2020-06-16 21:55:50'),
(898, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-16 21:55:55'),
(899, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 21:55:56'),
(900, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-16 21:56:01'),
(901, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 21:56:35'),
(902, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 21:56:43'),
(903, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 21:57:24'),
(904, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 21:57:35'),
(905, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 21:58:25'),
(906, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 21:58:31'),
(907, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:00:04'),
(908, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:00:09'),
(909, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:00:21'),
(910, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:02:00'),
(911, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:02:05'),
(912, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:03:36'),
(913, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:03:41'),
(914, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:06:27'),
(915, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:06:31'),
(916, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-16 22:07:21'),
(917, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-06-16 22:07:31'),
(918, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/store', 1, '2020-06-16 22:07:38'),
(919, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-16 22:07:41'),
(920, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-16 22:07:52'),
(921, 11, 'admin courses', 1, 'srv_admin.courses.task.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/delete', 1, '2020-06-16 22:07:56'),
(922, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-16 22:09:00'),
(923, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:09:05'),
(924, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:09:10'),
(925, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:09:13'),
(926, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:09:38'),
(927, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:09:45'),
(928, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:13:37'),
(929, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:13:42'),
(930, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:14:25'),
(931, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:14:56'),
(932, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:15:04'),
(933, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:16:18'),
(934, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:16:24'),
(935, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:18:01'),
(936, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:18:07'),
(937, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:19:49'),
(938, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:19:55'),
(939, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:24:10'),
(940, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:24:48'),
(941, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:25:44'),
(942, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:25:49'),
(943, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:25:49'),
(944, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:26:59'),
(945, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:27:09'),
(946, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-16 22:29:26'),
(947, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-16 22:29:32'),
(948, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-16 22:29:52'),
(949, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:29:52'),
(950, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:30:02'),
(951, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:31:20'),
(952, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:35:03'),
(953, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:35:22'),
(954, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:35:50'),
(955, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:37:10'),
(956, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:37:15'),
(957, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:37:26'),
(958, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-16 22:37:35'),
(959, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 22:38:10'),
(960, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-16 23:48:31'),
(961, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 06:19:42'),
(962, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 06:23:45'),
(963, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-17 06:23:58'),
(964, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:51:51'),
(965, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-17 17:52:00'),
(966, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-17 17:52:14'),
(967, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-17 17:52:50'),
(968, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-17 17:55:51'),
(969, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:56:23'),
(970, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:56:24'),
(971, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:56:25'),
(972, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:56:26'),
(973, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:36'),
(974, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:37'),
(975, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:37'),
(976, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:58'),
(977, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:59'),
(978, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 17:58:59'),
(979, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:31'),
(980, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:32'),
(981, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:33'),
(982, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:36'),
(983, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:37'),
(984, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:18:38'),
(985, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:07'),
(986, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:08'),
(987, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:08'),
(988, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:52'),
(989, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:53'),
(990, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:24:54'),
(991, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:25:18'),
(992, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:25:20'),
(993, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:25:20'),
(994, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:07'),
(995, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:09'),
(996, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:10'),
(997, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:54'),
(998, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:55'),
(999, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:27:56'),
(1000, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:02'),
(1001, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:04'),
(1002, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:04'),
(1003, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:15'),
(1004, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:16'),
(1005, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:16'),
(1006, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:54'),
(1007, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:55'),
(1008, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:28:56'),
(1009, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:09'),
(1010, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:10'),
(1011, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:11'),
(1012, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:50'),
(1013, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:51'),
(1014, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:29:52'),
(1015, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:30:03'),
(1016, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:30:04'),
(1017, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:30:05'),
(1018, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:16'),
(1019, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:18'),
(1020, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:18'),
(1021, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:52'),
(1022, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:54'),
(1023, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:32:54'),
(1024, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:33:01'),
(1025, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:33:03'),
(1026, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:33:03'),
(1027, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:14'),
(1028, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:16'),
(1029, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:16'),
(1030, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:20'),
(1031, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:21'),
(1032, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:22'),
(1033, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:58'),
(1034, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:34:59'),
(1035, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:35:00'),
(1036, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-17 18:35:05'),
(1037, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:35:10'),
(1038, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:36:58'),
(1039, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:44:33'),
(1040, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-17 18:44:44'),
(1041, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\"}', 'student/task/3', 1, '2020-06-17 18:44:48'),
(1042, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 18:44:54'),
(1043, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-17 18:45:09'),
(1044, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-17 18:45:12'),
(1045, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-17 19:03:39'),
(1046, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-06-17 19:03:47'),
(1047, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-17 19:03:49'),
(1048, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-17 19:03:50'),
(1049, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-17 19:03:52'),
(1050, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 19:18:35'),
(1051, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-17 19:18:45'),
(1052, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 19:18:52'),
(1053, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 19:21:45'),
(1054, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-17 19:22:04'),
(1055, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 19:22:10'),
(1056, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-06-17 20:13:50'),
(1057, -1, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 31, '2020-06-17 20:13:56'),
(1058, -1, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 31, '2020-06-17 20:15:56'),
(1059, -1, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 31, '2020-06-17 20:16:33'),
(1060, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-06-17 20:16:44'),
(1061, -1, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 31, '2020-06-17 20:16:49'),
(1062, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 20:22:34'),
(1063, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-17 20:22:38'),
(1064, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-17 20:22:40'),
(1065, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-17 20:22:41'),
(1066, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 21:30:21'),
(1067, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 21:30:23'),
(1068, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-17 21:30:23'),
(1069, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-17 21:30:50'),
(1070, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-17 21:30:53'),
(1071, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-17 21:30:53'),
(1072, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-18 23:50:06'),
(1073, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-18 23:50:07'),
(1074, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-18 23:50:07'),
(1075, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-18 23:50:46'),
(1076, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:00:48'),
(1077, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:09:03'),
(1078, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:09:05'),
(1079, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:09:45'),
(1080, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:09:47'),
(1081, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-19 00:10:24'),
(1082, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-20 04:19:54'),
(1083, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-20 04:19:58'),
(1084, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-20 04:20:01'),
(1085, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-20 04:20:01'),
(1086, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-20 05:48:52'),
(1087, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-20 05:48:57'),
(1088, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-20 05:49:00'),
(1089, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-20 05:49:08'),
(1090, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-20 05:49:26'),
(1091, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-06-20 05:49:31'),
(1092, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-20 05:49:33'),
(1093, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-20 17:38:21'),
(1094, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-20 17:38:28'),
(1095, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-22 03:00:40'),
(1096, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-22 03:00:44'),
(1097, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-22 03:00:44'),
(1098, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-22 06:40:07'),
(1099, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-23 23:44:58'),
(1100, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-26 02:37:08'),
(1101, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-26 03:03:02'),
(1102, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-06-26 03:17:23'),
(1103, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-26 03:20:24'),
(1104, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-26 03:20:26'),
(1105, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-26 03:23:22'),
(1106, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-26 03:25:43'),
(1107, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-26 03:25:45'),
(1108, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-26 03:28:57'),
(1109, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-26 03:48:37');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(1110, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-26 03:51:38'),
(1111, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-26 04:37:41'),
(1112, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-26 04:46:49'),
(1113, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-26 04:53:15'),
(1114, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-26 04:53:15'),
(1115, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-06-26 05:00:33'),
(1116, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-26 18:50:09'),
(1117, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-26 18:50:10'),
(1118, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-06-26 19:05:20'),
(1119, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-26 19:33:26'),
(1120, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-06-26 19:34:45'),
(1121, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-26 19:49:21'),
(1122, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-27 03:57:57'),
(1123, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-06-27 04:10:08'),
(1124, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-06-27 04:10:09'),
(1125, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-27 04:11:31'),
(1126, 11, 'user', 2, 'user.add.service', '[]', 'user/profile/add-services', 1, '2020-06-27 04:11:37'),
(1127, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-27 04:16:12'),
(1128, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-27 04:18:23'),
(1129, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-27 04:40:16'),
(1130, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-27 04:40:18'),
(1131, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 04:40:19'),
(1132, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-06-27 04:40:22'),
(1133, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-27 04:47:13'),
(1134, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-27 04:47:15'),
(1135, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-06-27 04:52:51'),
(1136, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-27 05:50:30'),
(1137, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\"}', 'student/task/3', 1, '2020-06-27 05:50:33'),
(1138, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-06-27 05:50:34'),
(1139, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-27 05:57:20'),
(1140, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-27 05:57:23'),
(1141, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-27 06:58:10'),
(1142, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 06:58:17'),
(1143, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 06:58:31'),
(1144, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 20:55:01'),
(1145, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 20:55:08'),
(1146, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-27 21:08:45'),
(1147, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 21:08:51'),
(1148, 15, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-06-27 21:14:18'),
(1149, 15, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-27 21:14:22'),
(1150, 15, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-27 21:14:23'),
(1151, 15, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-27 21:14:25'),
(1152, 15, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-06-27 21:14:28'),
(1153, 15, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-06-27 21:14:29'),
(1154, 15, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-06-27 21:14:33'),
(1155, 15, 'user', 2, 'user.add.service', '[]', 'user/profile/add-services', 1, '2020-06-27 21:14:48'),
(1156, 15, 'services', 2, 'service.create', '[]', 'service/newcreate', 1, '2020-06-27 21:15:30'),
(1157, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 21:15:41'),
(1158, 15, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-27 21:15:58'),
(1159, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 21:16:04'),
(1160, 15, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-27 21:26:25'),
(1161, 15, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 1, '2020-06-27 21:26:48'),
(1162, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-27 21:32:54'),
(1163, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 21:33:09'),
(1164, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-27 21:33:18'),
(1165, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-27 21:34:00'),
(1166, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-27 21:34:04'),
(1167, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:34:04'),
(1168, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-06-27 21:34:09'),
(1169, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1/update', 1, '2020-06-27 21:34:33'),
(1170, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-06-27 21:34:35'),
(1171, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:34:40'),
(1172, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:37:21'),
(1173, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:37:27'),
(1174, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:37:32'),
(1175, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:39:05'),
(1176, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:39:10'),
(1177, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:39:57'),
(1178, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:40:02'),
(1179, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:40:09'),
(1180, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-06-27 21:40:14'),
(1181, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"244\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/244', 1, '2020-06-27 21:44:21'),
(1182, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-27 21:44:22'),
(1183, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-27 21:49:27'),
(1184, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-27 21:49:28'),
(1185, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-27 21:51:10'),
(1186, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-27 21:53:11'),
(1187, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-27 21:53:13'),
(1188, 11, 'admin courses', 1, 'srv_admin.courses.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/unenroll/users', 1, '2020-06-27 21:57:02'),
(1189, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-27 21:57:02'),
(1190, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-06-27 23:57:48'),
(1191, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-28 00:51:12'),
(1192, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-28 00:51:16'),
(1193, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-28 00:51:16'),
(1194, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-06-28 00:51:20'),
(1195, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/store', 1, '2020-06-28 00:51:27'),
(1196, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-28 00:51:29'),
(1197, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-28 00:51:36'),
(1198, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-28 00:53:23'),
(1199, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/delete', 1, '2020-06-28 00:53:28'),
(1200, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-28 00:53:32'),
(1201, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-06-28 00:54:06'),
(1202, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/store', 1, '2020-06-28 00:54:14'),
(1203, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-06-28 00:54:31'),
(1204, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-28 00:54:36'),
(1205, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-28 00:55:14'),
(1206, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-06-28 00:55:20'),
(1207, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/store', 1, '2020-06-28 00:55:32'),
(1208, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-06-28 00:55:35'),
(1209, 11, 'admin courses', 1, 'srv_admin.courses.task.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/delete', 1, '2020-06-28 00:55:41'),
(1210, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-28 00:55:53'),
(1211, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:55:54'),
(1212, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-28 00:55:59'),
(1213, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:56:01'),
(1214, 11, 'admin courses', 1, 'srv_admin.courses.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/unenroll/users', 1, '2020-06-28 00:56:04'),
(1215, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:56:05'),
(1216, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-06-28 00:56:49'),
(1217, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:56:50'),
(1218, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-06-28 00:57:01'),
(1219, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:57:03'),
(1220, 11, 'admin courses', 1, 'srv_admin.courses.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/unenroll/users', 1, '2020-06-28 00:57:08'),
(1221, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-06-28 00:57:09'),
(1222, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-28 01:18:41'),
(1223, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-28 01:18:43'),
(1224, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd31111\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd31111', 1, '2020-06-28 01:18:47'),
(1225, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd31111\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd31111', 1, '2020-06-28 01:21:01'),
(1226, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-28 01:22:03'),
(1227, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-28 01:22:07'),
(1228, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw', 1, '2020-06-28 01:22:10'),
(1229, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw', 1, '2020-06-28 01:24:36'),
(1230, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3dwadw', 1, '2020-06-28 01:25:11'),
(1231, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-28 01:25:12'),
(1232, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-28 03:45:33'),
(1233, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-06-28 03:45:37'),
(1234, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-06-28 03:45:40'),
(1235, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-28 03:47:35'),
(1236, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-28 03:47:39'),
(1237, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-28 03:47:44'),
(1238, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-28 03:47:47'),
(1239, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-28 05:03:16'),
(1240, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-06-28 05:03:20'),
(1241, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-06-28 05:03:23'),
(1242, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-06-28 05:03:28'),
(1243, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-28 05:03:31'),
(1244, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 01:20:23'),
(1245, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-29 01:20:37'),
(1246, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-29 01:20:54'),
(1247, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-29 01:21:00'),
(1248, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-29 01:21:08'),
(1249, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-29 01:21:15'),
(1250, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-29 01:21:15'),
(1251, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:21:23'),
(1252, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:28:29'),
(1253, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2/update', 1, '2020-06-29 01:29:04'),
(1254, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:29:06'),
(1255, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2/update', 1, '2020-06-29 01:29:13'),
(1256, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:29:15'),
(1257, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:30:04'),
(1258, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2/update', 1, '2020-06-29 01:30:09'),
(1259, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-29 01:30:10'),
(1260, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-29 02:16:17'),
(1261, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-06-29 06:05:36'),
(1262, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:05:42'),
(1263, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:06:34'),
(1264, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:07:08'),
(1265, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:07:31'),
(1266, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:13:05'),
(1267, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-06-29 06:13:14'),
(1268, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-06-29 06:13:48'),
(1269, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-29 06:14:14'),
(1270, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-06-29 06:14:19'),
(1271, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-06-29 06:14:23'),
(1272, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-06-29 06:16:00'),
(1273, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-06-29 06:25:36'),
(1274, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-06-29 06:25:49'),
(1275, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-06-29 06:25:56'),
(1276, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-29 06:26:11'),
(1277, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\"}', 'student/task/3', 1, '2020-06-29 19:07:45'),
(1278, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"3\",\"taskID\":\"12\"}', 'student/task/3/12', 1, '2020-06-29 19:07:53'),
(1279, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-29 19:08:02'),
(1280, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-06-29 19:08:06'),
(1281, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-29 19:09:05'),
(1282, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-29 19:10:53'),
(1283, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-29 19:49:05'),
(1284, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 00:14:30'),
(1285, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 00:35:00'),
(1286, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-30 00:35:05'),
(1287, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-30 00:35:09'),
(1288, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-06-30 00:35:18'),
(1289, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-06-30 00:35:21'),
(1290, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-06-30 00:35:28'),
(1291, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-06-30 00:36:20'),
(1292, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-06-30 00:36:23'),
(1293, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 00:36:28'),
(1294, 16, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 41, '2020-06-30 05:24:43'),
(1295, 16, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 41, '2020-06-30 05:25:39'),
(1296, 16, 'user', 2, 'user.profile', '[]', 'user/profile', 41, '2020-06-30 05:26:23'),
(1297, 16, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 41, '2020-06-30 05:26:29'),
(1298, 16, 'user', 2, 'user.profile', '[]', 'user/profile', 41, '2020-06-30 05:27:10'),
(1299, 16, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 41, '2020-06-30 05:27:12'),
(1300, 17, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 42, '2020-06-30 05:32:57'),
(1301, 17, 'user', 2, 'user.profile', '[]', 'user/profile', 42, '2020-06-30 05:33:00'),
(1302, 17, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 42, '2020-06-30 05:33:04'),
(1303, 17, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 42, '2020-06-30 05:33:07'),
(1304, 17, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 42, '2020-06-30 05:33:08'),
(1305, 17, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 42, '2020-06-30 05:33:11'),
(1306, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 05:37:35'),
(1307, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 05:38:05'),
(1308, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 05:38:13'),
(1309, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 05:38:21'),
(1310, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 05:38:27'),
(1311, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 05:40:34'),
(1312, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 05:40:45'),
(1313, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-06-30 05:55:35'),
(1314, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-30 05:56:49'),
(1315, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-30 07:20:27'),
(1316, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-30 07:20:28'),
(1317, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 07:20:43'),
(1318, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-06-30 07:24:15'),
(1319, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 07:24:19'),
(1320, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 07:25:39'),
(1321, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 07:25:57'),
(1322, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-30 07:26:02'),
(1323, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 07:26:13'),
(1324, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-30 07:26:18'),
(1325, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-30 07:26:45'),
(1326, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-06-30 07:26:45'),
(1327, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-30 07:26:50'),
(1328, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2/update', 1, '2020-06-30 07:26:54'),
(1329, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-06-30 07:26:56'),
(1330, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 07:27:00'),
(1331, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 18:36:54'),
(1332, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 18:37:22'),
(1333, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 18:37:56'),
(1334, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-30 18:38:02'),
(1335, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 18:38:11'),
(1336, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 18:56:04'),
(1337, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-30 19:45:45'),
(1338, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-06-30 19:45:53'),
(1339, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-06-30 19:45:58'),
(1340, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-06-30 19:46:01'),
(1341, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-06-30 19:46:10'),
(1342, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-06-30 19:47:24'),
(1343, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-06-30 19:47:47'),
(1344, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"5\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/5', 1, '2020-06-30 20:09:12'),
(1345, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"6\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/6', 1, '2020-06-30 20:09:15'),
(1346, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-06-30 20:09:22'),
(1347, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 20:10:19'),
(1348, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-06-30 23:42:59'),
(1349, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-06-30 23:44:22'),
(1350, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-01 18:24:34'),
(1351, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-01 18:24:35'),
(1352, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-01 18:25:15'),
(1353, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-01 18:25:17'),
(1354, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-01 18:25:34'),
(1355, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 18:25:38'),
(1356, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 18:25:42'),
(1357, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 18:25:46'),
(1358, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 18:25:49'),
(1359, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-01 19:01:57'),
(1360, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-01 19:02:00'),
(1361, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 19:02:06'),
(1362, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 19:04:01'),
(1363, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 19:04:21'),
(1364, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:05:18'),
(1365, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:05:57'),
(1366, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:07:16'),
(1367, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:08:33'),
(1368, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:08:53'),
(1369, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:09:39'),
(1370, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 19:09:56'),
(1371, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:10:09'),
(1372, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:11:58'),
(1373, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 19:12:33'),
(1374, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 19:12:39'),
(1375, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 21:36:26'),
(1376, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-01 21:36:29'),
(1377, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-01 21:36:33'),
(1378, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-01 21:36:41'),
(1379, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-01 21:38:42'),
(1380, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-01 21:38:55'),
(1381, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-07-01 21:39:09'),
(1382, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-07-01 21:39:11'),
(1383, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-07-01 21:41:24'),
(1384, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-07-01 21:42:12'),
(1385, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-01 22:04:23'),
(1386, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-01 22:04:31'),
(1387, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-01 22:04:47'),
(1388, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-01 22:18:35'),
(1389, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-01 22:18:37'),
(1390, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-01 22:18:38'),
(1391, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-01 22:18:42'),
(1392, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-01 22:18:47'),
(1393, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"17\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/17', 1, '2020-07-01 22:18:50'),
(1394, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-01 22:27:12'),
(1395, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 22:27:20'),
(1396, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-01 22:27:23'),
(1397, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-01 22:36:09'),
(1398, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-02 20:50:30'),
(1399, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-03 04:30:31'),
(1400, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-04 01:00:19'),
(1401, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-04 01:27:13'),
(1402, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-04 19:56:58'),
(1403, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-04 22:39:50'),
(1404, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-04 22:40:12'),
(1405, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-04 22:40:27'),
(1406, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-04 22:48:17'),
(1407, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-04 22:48:31'),
(1408, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-05 01:35:26'),
(1409, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-05 01:35:37'),
(1410, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-05 05:08:14'),
(1411, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-06 06:11:30'),
(1412, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-06 06:11:55'),
(1413, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-06 06:12:00'),
(1414, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-06 06:12:11'),
(1415, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 30, '2020-07-06 06:12:17'),
(1416, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-06 06:13:37'),
(1417, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-06 06:13:52'),
(1418, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-06 06:14:44'),
(1419, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-06 06:14:51'),
(1420, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:15:01'),
(1421, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-06 06:15:42'),
(1422, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-07-06 06:15:49'),
(1423, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-06 06:15:58'),
(1424, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:18:42'),
(1425, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:25:17'),
(1426, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:26:41'),
(1427, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:27:45');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(1428, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:28:01'),
(1429, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:28:22'),
(1430, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-06 06:28:44'),
(1431, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 01:12:08'),
(1432, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 01:12:18'),
(1433, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-07-10 01:12:29'),
(1434, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 01:14:32'),
(1435, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 01:14:39'),
(1436, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 01:16:41'),
(1437, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 02:12:03'),
(1438, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 02:12:12'),
(1439, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 02:12:16'),
(1440, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 02:12:17'),
(1441, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"18\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/18', 1, '2020-07-10 02:12:26'),
(1442, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 02:13:43'),
(1443, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 02:13:44'),
(1444, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 02:14:21'),
(1445, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 02:14:30'),
(1446, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-10 02:14:33'),
(1447, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 02:14:58'),
(1448, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 03:22:28'),
(1449, 18, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 43, '2020-07-10 03:56:09'),
(1450, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 03:58:30'),
(1451, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 03:58:49'),
(1452, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 03:59:08'),
(1453, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 03:59:19'),
(1454, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 03:59:19'),
(1455, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 03:59:30'),
(1456, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 03:59:34'),
(1457, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-10 03:59:37'),
(1458, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-10 03:59:55'),
(1459, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-10 03:59:57'),
(1460, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/enroll/users', 1, '2020-07-10 04:00:20'),
(1461, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-10 04:00:22'),
(1462, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 04:00:30'),
(1463, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-07-10 04:00:37'),
(1464, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-10 04:00:43'),
(1465, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-10 04:02:27'),
(1466, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 04:03:26'),
(1467, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 04:03:56'),
(1468, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-07-10 04:04:16'),
(1469, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"2\",\"taskID\":\"10\"}', 'student/task/2/10', 1, '2020-07-10 04:04:30'),
(1470, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 04:05:11'),
(1471, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 04:05:17'),
(1472, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 04:05:21'),
(1473, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 04:05:22'),
(1474, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-10 04:05:25'),
(1475, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-10 04:05:28'),
(1476, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-10 04:05:29'),
(1477, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-07-10 04:05:34'),
(1478, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-10 04:05:47'),
(1479, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 04:05:55'),
(1480, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-10 04:06:27'),
(1481, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 04:06:36'),
(1482, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-10 04:07:34'),
(1483, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-10 04:07:46'),
(1484, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-07-10 04:07:53'),
(1485, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-07-10 04:08:06'),
(1486, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-07-10 04:08:12'),
(1487, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/result', 1, '2020-07-10 04:08:19'),
(1488, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 1, '2020-07-10 04:08:46'),
(1489, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-10 04:08:52'),
(1490, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-10 04:09:00'),
(1491, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-10 04:09:54'),
(1492, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-10 04:10:02'),
(1493, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-10 04:10:06'),
(1494, 18, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 43, '2020-07-10 17:16:04'),
(1495, 18, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 43, '2020-07-10 17:16:54'),
(1496, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 21:08:10'),
(1497, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 21:08:23'),
(1498, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:08:34'),
(1499, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 21:12:48'),
(1500, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:12:49'),
(1501, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:13:24'),
(1502, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1/update', 1, '2020-07-10 21:13:53'),
(1503, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:13:55'),
(1504, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:22:24'),
(1505, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1/update', 1, '2020-07-10 21:22:53'),
(1506, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:22:55'),
(1507, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:23:08'),
(1508, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:25:51'),
(1509, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 21:25:56'),
(1510, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:25:57'),
(1511, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:26:01'),
(1512, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1/update', 1, '2020-07-10 21:26:10'),
(1513, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-10 21:26:12'),
(1514, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:29:59'),
(1515, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:30:24'),
(1516, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:31:55'),
(1517, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:33:00'),
(1518, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 21:34:27'),
(1519, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 21:50:20'),
(1520, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 21:50:23'),
(1521, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:50:23'),
(1522, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"17\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/17', 1, '2020-07-10 21:53:45'),
(1523, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 21:53:52'),
(1524, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:53:53'),
(1525, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"17\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/17', 1, '2020-07-10 21:54:45'),
(1526, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 21:55:26'),
(1527, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:55:28'),
(1528, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"18\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/18', 1, '2020-07-10 21:55:58'),
(1529, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 21:56:27'),
(1530, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 21:57:33'),
(1531, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 21:58:52'),
(1532, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 21:58:55'),
(1533, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"18\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/18', 1, '2020-07-10 22:00:37'),
(1534, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:04:13'),
(1535, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:04:15'),
(1536, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"19\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/19', 1, '2020-07-10 22:05:20'),
(1537, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 22:06:17'),
(1538, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:06:48'),
(1539, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:06:50'),
(1540, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"19\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/19', 1, '2020-07-10 22:18:13'),
(1541, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:18:57'),
(1542, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:18:59'),
(1543, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 22:19:07'),
(1544, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"21\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/21', 1, '2020-07-10 22:20:59'),
(1545, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:21:13'),
(1546, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:21:15'),
(1547, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 22:22:24'),
(1548, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 22:22:29'),
(1549, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:22:30'),
(1550, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 22:22:45'),
(1551, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-10 22:22:49'),
(1552, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"21\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/21', 1, '2020-07-10 22:25:34'),
(1553, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:26:05'),
(1554, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:26:07'),
(1555, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-10 22:26:26'),
(1556, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/store', 1, '2020-07-10 22:27:04'),
(1557, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-10 22:27:06'),
(1558, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:27:09'),
(1559, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-10 22:28:38'),
(1560, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/store', 1, '2020-07-10 22:30:02'),
(1561, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:30:04'),
(1562, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"26\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/26', 1, '2020-07-10 22:30:16'),
(1563, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-10 22:30:47'),
(1564, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 22:30:49'),
(1565, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 22:31:01'),
(1566, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 22:31:07'),
(1567, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 22:33:28'),
(1568, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-10 22:33:38'),
(1569, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-10 22:34:02'),
(1570, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"8\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/8', 1, '2020-07-10 22:35:30'),
(1571, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-07-10 22:35:41'),
(1572, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-10 22:36:04'),
(1573, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-10 22:36:23'),
(1574, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-10 22:36:34'),
(1575, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 22:36:39'),
(1576, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 23:30:05'),
(1577, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 23:30:09'),
(1578, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-10 23:31:22'),
(1579, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-10 23:31:23'),
(1580, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-10 23:32:44'),
(1581, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-10 23:44:31'),
(1582, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-11 02:57:29'),
(1583, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-11 03:45:58'),
(1584, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-11 04:00:37'),
(1585, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-11 04:00:37'),
(1586, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-11 04:00:41'),
(1587, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-11 04:01:18'),
(1588, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-11 04:01:20'),
(1589, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-11 04:02:35'),
(1590, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-11 04:02:37'),
(1591, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-11 04:03:40'),
(1592, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-11 04:03:41'),
(1593, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-11 04:03:48'),
(1594, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"id\":\"20\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/20', 1, '2020-07-11 04:03:53'),
(1595, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/update', 1, '2020-07-11 04:05:07'),
(1596, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-11 04:05:09'),
(1597, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants', 1, '2020-07-11 04:05:20'),
(1598, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants/to/json', 1, '2020-07-11 04:05:21'),
(1599, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants', 1, '2020-07-11 06:23:17'),
(1600, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants/to/json', 1, '2020-07-11 06:23:18'),
(1601, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-11 06:23:25'),
(1602, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 06:23:28'),
(1603, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:23:45'),
(1604, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:30:05'),
(1605, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:30:18'),
(1606, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:35:29'),
(1607, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:35:38'),
(1608, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:36:07'),
(1609, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:36:44'),
(1610, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:36:59'),
(1611, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:37:11'),
(1612, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:37:15'),
(1613, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:37:15'),
(1614, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:37:35'),
(1615, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:38:28'),
(1616, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:39:59'),
(1617, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 06:40:04'),
(1618, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-11 06:53:50'),
(1619, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-11 06:53:59'),
(1620, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-11 06:54:09'),
(1621, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 1, '2020-07-11 06:54:15'),
(1622, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-07-11 06:54:19'),
(1623, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-07-11 06:59:30'),
(1624, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"4\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/4', 1, '2020-07-11 07:00:16'),
(1625, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-11 07:02:06'),
(1626, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 07:02:13'),
(1627, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 16:57:56'),
(1628, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-11 16:58:27'),
(1629, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-11 16:58:36'),
(1630, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"location\":\"1\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/1', 1, '2020-07-11 16:58:43'),
(1631, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 21:13:59'),
(1632, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-11 21:14:12'),
(1633, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-11 21:14:19'),
(1634, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 1, '2020-07-11 21:14:32'),
(1635, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 21:14:39'),
(1636, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 21:27:59'),
(1637, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-11 21:28:08'),
(1638, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-11 21:28:16'),
(1639, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 21:28:20'),
(1640, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 21:28:21'),
(1641, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/edit1', 1, '2020-07-11 21:28:25'),
(1642, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/edit1/update', 1, '2020-07-11 21:29:21'),
(1643, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/edit1', 1, '2020-07-11 21:29:23'),
(1644, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/edit1/update', 1, '2020-07-11 21:30:40'),
(1645, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/edit1', 1, '2020-07-11 21:30:42'),
(1646, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 21:30:45'),
(1647, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-11 21:30:56'),
(1648, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-11 21:32:23'),
(1649, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 21:32:26'),
(1650, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"id\":\"28\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/28', 1, '2020-07-11 21:32:58'),
(1651, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/update', 1, '2020-07-11 21:33:40'),
(1652, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 21:33:42'),
(1653, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-11 21:33:49'),
(1654, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 23:44:08'),
(1655, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:44:09'),
(1656, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-11 23:44:22'),
(1657, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-11 23:46:44'),
(1658, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-11 23:46:46'),
(1659, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-11 23:50:49'),
(1660, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-11 23:52:30'),
(1661, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:52:31'),
(1662, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 23:52:36'),
(1663, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 23:52:39'),
(1664, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"3\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/3', 1, '2020-07-11 23:52:42'),
(1665, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-11 23:52:58'),
(1666, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-11 23:53:11'),
(1667, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 23:53:15'),
(1668, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:53:15'),
(1669, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"id\":\"30\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/30', 1, '2020-07-11 23:53:18'),
(1670, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/update', 1, '2020-07-11 23:54:15'),
(1671, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:54:17'),
(1672, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-11 23:54:22'),
(1673, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 23:54:25'),
(1674, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"3\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/3', 1, '2020-07-11 23:54:29'),
(1675, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-11 23:54:45'),
(1676, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-11 23:55:31'),
(1677, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-11 23:55:42'),
(1678, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:55:42'),
(1679, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"id\":\"30\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/30', 1, '2020-07-11 23:55:45'),
(1680, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/update', 1, '2020-07-11 23:55:58'),
(1681, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-11 23:55:59'),
(1682, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants', 1, '2020-07-11 23:56:05'),
(1683, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-07-11 23:56:06'),
(1684, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/enroll/users', 1, '2020-07-11 23:56:11'),
(1685, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-07-11 23:56:13'),
(1686, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-11 23:56:30'),
(1687, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 30, '2020-07-11 23:56:34'),
(1688, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/enroll/users', 1, '2020-07-11 23:56:50'),
(1689, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-07-11 23:56:52'),
(1690, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/enroll/users', 1, '2020-07-11 23:57:01'),
(1691, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-07-11 23:57:03'),
(1692, 11, 'admin courses', 1, 'srv_admin.courses.delete', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/unenroll/users', 1, '2020-07-11 23:57:07'),
(1693, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/participants/to/json', 1, '2020-07-11 23:57:08'),
(1694, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"3\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/3', 30, '2020-07-11 23:57:13'),
(1695, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/1', 30, '2020-07-11 23:58:01'),
(1696, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-12 00:05:14'),
(1697, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:05:55'),
(1698, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:06:39'),
(1699, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:06:42'),
(1700, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/1', 30, '2020-07-12 00:06:45'),
(1701, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"4\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/4', 30, '2020-07-12 00:06:49'),
(1702, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-12 00:07:03'),
(1703, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"id\":\"31\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/31', 1, '2020-07-12 00:07:05'),
(1704, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/update', 1, '2020-07-12 00:07:21'),
(1705, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-12 00:07:23'),
(1706, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"4\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/4', 30, '2020-07-12 00:07:28'),
(1707, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:09:18'),
(1708, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:09:49'),
(1709, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:09:51'),
(1710, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"4\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/4', 30, '2020-07-12 00:09:55'),
(1711, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"5\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/5', 30, '2020-07-12 00:09:58'),
(1712, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:12:29'),
(1713, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:12:31');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(1714, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:13:09'),
(1715, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:13:11'),
(1716, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:14:48'),
(1717, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:14:50'),
(1718, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:15:36'),
(1719, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:15:38'),
(1720, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:16:17'),
(1721, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:16:20'),
(1722, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:16:47'),
(1723, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:16:49'),
(1724, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:17:28'),
(1725, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:17:30'),
(1726, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:18:01'),
(1727, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/create', 1, '2020-07-12 00:18:03'),
(1728, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/store', 1, '2020-07-12 00:18:37'),
(1729, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-12 00:18:39'),
(1730, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/sort', 1, '2020-07-12 00:18:51'),
(1731, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/sort', 1, '2020-07-12 00:18:54'),
(1732, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-12 00:20:05'),
(1733, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"5\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/5', 30, '2020-07-12 00:20:21'),
(1734, 11, 'admin courses', 1, 'srv_admin.courses.teach.delete', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/delete', 1, '2020-07-12 00:21:23'),
(1735, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"5\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/5', 30, '2020-07-12 00:21:31'),
(1736, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"7\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/7', 30, '2020-07-12 00:21:35'),
(1737, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"9\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/9', 30, '2020-07-12 00:21:38'),
(1738, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"10\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/10', 30, '2020-07-12 00:21:43'),
(1739, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"location\":\"1\"}', 'learning/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/1', 30, '2020-07-12 00:21:46'),
(1740, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 30, '2020-07-12 00:22:23'),
(1741, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 00:26:13'),
(1742, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 00:27:08'),
(1743, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 00:27:10'),
(1744, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:27:11'),
(1745, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:27:13'),
(1746, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"9\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/9', 1, '2020-07-12 00:27:58'),
(1747, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:28:54'),
(1748, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:28:57'),
(1749, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:29:30'),
(1750, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:29:50'),
(1751, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"11\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/11', 1, '2020-07-12 00:29:52'),
(1752, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:30:34'),
(1753, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:31:06'),
(1754, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:31:08'),
(1755, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 00:31:37'),
(1756, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-07-12 00:31:40'),
(1757, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:31:46'),
(1758, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 00:32:28'),
(1759, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 00:32:32'),
(1760, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 00:32:35'),
(1761, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:32:35'),
(1762, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:32:37'),
(1763, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"9\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/9', 1, '2020-07-12 00:32:40'),
(1764, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:36:52'),
(1765, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:40:20'),
(1766, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:40:32'),
(1767, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:40:33'),
(1768, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 00:40:44'),
(1769, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:40:47'),
(1770, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:40:54'),
(1771, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:41:02'),
(1772, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 00:41:49'),
(1773, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 00:41:53'),
(1774, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 00:41:56'),
(1775, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:41:56'),
(1776, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:41:59'),
(1777, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"9\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/9', 1, '2020-07-12 00:42:07'),
(1778, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 00:43:02'),
(1779, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 00:43:06'),
(1780, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:43:11'),
(1781, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:45:31'),
(1782, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 00:46:31'),
(1783, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 00:46:38'),
(1784, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 00:46:43'),
(1785, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 00:46:43'),
(1786, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:46:45'),
(1787, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"11\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/11', 1, '2020-07-12 00:46:49'),
(1788, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 00:47:07'),
(1789, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 00:47:09'),
(1790, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"11\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/11', 1, '2020-07-12 00:47:15'),
(1791, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 00:47:31'),
(1792, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:47:38'),
(1793, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:47:42'),
(1794, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:47:46'),
(1795, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:50:05'),
(1796, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"9\"}', 'student/task/1/9', 1, '2020-07-12 00:51:20'),
(1797, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 00:51:37'),
(1798, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:51:55'),
(1799, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:53:21'),
(1800, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:53:24'),
(1801, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:53:26'),
(1802, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:53:29'),
(1803, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:57:19'),
(1804, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:57:23'),
(1805, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:57:48'),
(1806, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:57:51'),
(1807, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:58:40'),
(1808, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:58:43'),
(1809, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:59:04'),
(1810, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 00:59:06'),
(1811, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:00:44'),
(1812, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:00:46'),
(1813, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:01:47'),
(1814, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:01:49'),
(1815, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:03:16'),
(1816, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:03:19'),
(1817, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:05:38'),
(1818, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:05:41'),
(1819, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 01:05:53'),
(1820, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:05:58'),
(1821, 11, 'task', 2, 'student.task.submit', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:06:24'),
(1822, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:06:26'),
(1823, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\",\"taskID\":\"11\"}', 'student/task/1/11', 1, '2020-07-12 01:06:54'),
(1824, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 01:08:00'),
(1825, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 1, '2020-07-12 01:08:44'),
(1826, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 01:08:52'),
(1827, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:10:30'),
(1828, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:10:33'),
(1829, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:10:33'),
(1830, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:10:36'),
(1831, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-07-12 01:10:37'),
(1832, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/store', 1, '2020-07-12 01:10:45'),
(1833, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/store', 1, '2020-07-12 01:10:49'),
(1834, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:10:52'),
(1835, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:10:56'),
(1836, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:11:01'),
(1837, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:11:39'),
(1838, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:13:38'),
(1839, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:20:58'),
(1840, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-07-12 01:21:00'),
(1841, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 01:22:12'),
(1842, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:22:16'),
(1843, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:22:19'),
(1844, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:22:19'),
(1845, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:22:25'),
(1846, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"16\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/16', 1, '2020-07-12 01:22:33'),
(1847, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/update', 1, '2020-07-12 01:22:44'),
(1848, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:22:46'),
(1849, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:22:50'),
(1850, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 01:23:11'),
(1851, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:23:14'),
(1852, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:23:17'),
(1853, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:23:18'),
(1854, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:23:24'),
(1855, 11, 'admin courses', 1, 'srv_admin.courses.task.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/delete', 1, '2020-07-12 01:23:29'),
(1856, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-12 01:23:36'),
(1857, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-07-12 01:27:54'),
(1858, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-12 01:36:21'),
(1859, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:36:24'),
(1860, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:36:52'),
(1861, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:37:32'),
(1862, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:37:32'),
(1863, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:37:40'),
(1864, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:37:40'),
(1865, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-12 01:38:10'),
(1866, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-12 01:38:45'),
(1867, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-12 01:38:47'),
(1868, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-12 01:39:34'),
(1869, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:39:53'),
(1870, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-07-12 01:40:19'),
(1871, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:40:57'),
(1872, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:42:18'),
(1873, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:45:58'),
(1874, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:45:59'),
(1875, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-12 01:46:27'),
(1876, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-12 01:46:31'),
(1877, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-12 01:46:35'),
(1878, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-12 01:47:05'),
(1879, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-07-12 01:47:18'),
(1880, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-12 01:47:34'),
(1881, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-12 01:47:35'),
(1882, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-12 01:47:48'),
(1883, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-12 01:47:49'),
(1884, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-12 01:47:51'),
(1885, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-12 01:48:00'),
(1886, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-12 01:50:39'),
(1887, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-07-12 01:50:48'),
(1888, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-12 01:50:52'),
(1889, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-12 01:53:39'),
(1890, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 01:56:11'),
(1891, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-12 01:56:14'),
(1892, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-12 01:56:15'),
(1893, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-12 04:03:54'),
(1894, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-12 05:32:47'),
(1895, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-12 05:32:51'),
(1896, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-14 00:53:20'),
(1897, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-17 12:05:35'),
(1898, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-17 12:16:46'),
(1899, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:16:49'),
(1900, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-17 12:16:49'),
(1901, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-17 12:16:53'),
(1902, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2', 1, '2020-07-17 12:17:01'),
(1903, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2/update', 1, '2020-07-17 12:17:23'),
(1904, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2', 1, '2020-07-17 12:17:25'),
(1905, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-17 12:17:29'),
(1906, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:17:35'),
(1907, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-17 12:17:55'),
(1908, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:22:00'),
(1909, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-17 12:22:00'),
(1910, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:25:53'),
(1911, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:26:18'),
(1912, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:26:22'),
(1913, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-17 12:26:27'),
(1914, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:26:30'),
(1915, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:27:47'),
(1916, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:28:22'),
(1917, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:30:00'),
(1918, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-17 12:30:01'),
(1919, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-17 12:30:21'),
(1920, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-07-17 12:30:21'),
(1921, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-17 12:32:34'),
(1922, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-17 12:33:25'),
(1923, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 30, '2020-07-17 12:34:13'),
(1924, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 30, '2020-07-17 12:34:53'),
(1925, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-17 12:35:10'),
(1926, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 30, '2020-07-17 12:35:21'),
(1927, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 30, '2020-07-17 12:35:31'),
(1928, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 30, '2020-07-17 12:35:57'),
(1929, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/result', 30, '2020-07-17 12:37:02'),
(1930, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/overview', 30, '2020-07-17 12:37:21'),
(1931, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"8fddde34-06fb-4017-a504-d623f92b17a8\"}', 'exams/8fddde34-06fb-4017-a504-d623f92b17a8/result', 30, '2020-07-17 12:37:35'),
(1932, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-17 12:38:12'),
(1933, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-17 13:24:17'),
(1934, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1', 1, '2020-07-17 14:19:20'),
(1935, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach', 1, '2020-07-17 14:19:21'),
(1936, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/sort', 1, '2020-07-17 14:19:31'),
(1937, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/teach/sort', 1, '2020-07-17 14:19:36'),
(1938, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\"}', 'admin/courses/8fcb8f8f-387b-4178-9cf5-491ed26bc9a1/task', 1, '2020-07-17 14:19:41'),
(1939, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-17 14:24:34'),
(1940, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-18 02:34:39'),
(1941, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-18 02:34:39'),
(1942, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-18 02:34:44'),
(1943, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-18 02:35:41'),
(1944, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-18 02:36:15'),
(1945, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-07-18 02:36:21'),
(1946, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-07-18 02:37:03'),
(1947, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-18 02:37:06'),
(1948, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-18 02:37:11'),
(1949, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-18 02:37:13'),
(1950, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-18 02:37:14'),
(1951, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-18 02:37:18'),
(1952, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-18 03:21:57'),
(1953, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-18 03:22:00'),
(1954, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-18 03:22:00'),
(1955, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2', 1, '2020-07-18 03:22:08'),
(1956, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2/update', 1, '2020-07-18 03:22:41'),
(1957, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2', 1, '2020-07-18 03:22:42'),
(1958, 11, 'admin courses', 1, 'srv_admin.courses.edit2.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2/update', 1, '2020-07-18 03:32:49'),
(1959, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit2', 1, '2020-07-18 03:32:50'),
(1960, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-07-19 05:45:34'),
(1961, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-07-19 05:45:45'),
(1962, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-07-19 05:46:02'),
(1963, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-07-19 05:46:03'),
(1964, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-07-19 05:46:11'),
(1965, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-07-19 05:46:31'),
(1966, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-07-19 05:46:33'),
(1967, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-07-19 05:46:47'),
(1968, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-19 05:47:43'),
(1969, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-19 05:47:51'),
(1970, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-19 05:47:51'),
(1971, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-19 05:48:14'),
(1972, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-19 05:48:29'),
(1973, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-19 05:48:30'),
(1974, 11, 'admin courses', 1, 'srv_admin.courses.delete', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/unenroll/users', 1, '2020-07-19 05:48:36'),
(1975, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-19 05:48:37'),
(1976, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-07-19 05:48:43'),
(1977, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-19 05:48:52'),
(1978, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-07-19 05:49:27'),
(1979, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"33\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/33', 1, '2020-07-19 05:49:34'),
(1980, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-07-19 05:49:39'),
(1981, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-19 05:50:10'),
(1982, 11, 'admin courses', 1, 'srv_admin.courses.edit2', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit2', 1, '2020-07-19 05:50:17'),
(1983, 11, 'admin courses', 1, 'srv_admin.courses.edit3', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit3', 1, '2020-07-19 05:50:20'),
(1984, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-19 05:51:58'),
(1985, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-07-19 05:52:01'),
(1986, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 06:14:16'),
(1987, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:21:03'),
(1988, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:23:50'),
(1989, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:25:12'),
(1990, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:25:16'),
(1991, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:25:22'),
(1992, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 1, '2020-07-19 09:26:36'),
(1993, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:26:48'),
(1994, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-19 09:27:12'),
(1995, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:27:19'),
(1996, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fde3320-0931-4cf1-a455-a643a34fdf09\"}', 'exams/8fde3320-0931-4cf1-a455-a643a34fdf09/overview', 1, '2020-07-19 09:27:27'),
(1997, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-19 09:27:39'),
(1998, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 01:02:13'),
(1999, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 01:41:53'),
(2000, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 01:42:02'),
(2001, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-20 01:42:08'),
(2002, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 01:42:09'),
(2003, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-20 01:42:38'),
(2004, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-20 01:42:57'),
(2005, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-20 01:42:59'),
(2006, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-20 01:44:27'),
(2007, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-20 01:44:29'),
(2008, 11, 'admin courses', 1, 'srv_admin.courses.edit1.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1/update', 1, '2020-07-20 01:47:47'),
(2009, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/edit1', 1, '2020-07-20 01:47:48'),
(2010, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 01:47:54'),
(2011, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-20 01:50:43');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(2012, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 01:50:44'),
(2013, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"id\":\"20\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/20', 1, '2020-07-20 01:50:48'),
(2014, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/update', 1, '2020-07-20 01:52:31'),
(2015, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 01:52:33'),
(2016, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-20 01:56:34'),
(2017, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-20 01:58:22'),
(2018, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-20 01:58:25'),
(2019, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 01:58:32'),
(2020, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 01:59:50'),
(2021, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-20 02:18:07'),
(2022, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 02:18:07'),
(2023, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-20 02:22:40'),
(2024, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-20 02:26:25'),
(2025, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 02:26:26'),
(2026, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 02:53:36'),
(2027, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"id\":\"10\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/10', 1, '2020-07-20 02:53:42'),
(2028, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/update', 1, '2020-07-20 02:54:28'),
(2029, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 02:54:30'),
(2030, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/create', 1, '2020-07-20 02:55:07'),
(2031, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:01:26'),
(2032, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/create', 1, '2020-07-20 03:06:23'),
(2033, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/store', 1, '2020-07-20 03:07:57'),
(2034, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:07:59'),
(2035, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"id\":\"17\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/17', 1, '2020-07-20 03:11:00'),
(2036, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/update', 1, '2020-07-20 03:11:03'),
(2037, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:11:05'),
(2038, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:12:14'),
(2039, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/create', 1, '2020-07-20 03:12:17'),
(2040, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/store', 1, '2020-07-20 03:12:21'),
(2041, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/store', 1, '2020-07-20 03:12:25'),
(2042, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:12:27'),
(2043, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:12:34'),
(2044, 11, 'admin courses', 1, 'srv_admin.courses.task.delete', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/delete', 1, '2020-07-20 03:12:39'),
(2045, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants', 1, '2020-07-20 03:13:22'),
(2046, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants/to/json', 1, '2020-07-20 03:13:23'),
(2047, 11, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/enroll/users', 1, '2020-07-20 03:13:28'),
(2048, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/participants/to/json', 1, '2020-07-20 03:13:30'),
(2049, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:13:31'),
(2050, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-20 03:13:48'),
(2051, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/create', 1, '2020-07-20 03:14:07'),
(2052, 11, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/store', 1, '2020-07-20 03:14:16'),
(2053, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 03:14:17'),
(2054, 11, 'admin courses', 1, 'srv_admin.courses.task.delete', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/delete', 1, '2020-07-20 03:14:34'),
(2055, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-20 03:14:47'),
(2056, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 30, '2020-07-20 03:14:49'),
(2057, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"2\"}', 'student/task/2', 30, '2020-07-20 03:14:53'),
(2058, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 30, '2020-07-20 03:15:06'),
(2059, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 03:16:04'),
(2060, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 03:16:13'),
(2061, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 08:13:18'),
(2062, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-20 08:13:21'),
(2063, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-20 08:13:21'),
(2064, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 11:52:42'),
(2065, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-07-20 12:17:06'),
(2066, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-07-20 12:17:15'),
(2067, 15, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-07-20 12:17:46'),
(2068, 15, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-07-20 12:17:51'),
(2069, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 12:29:29'),
(2070, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 12:49:47'),
(2071, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-20 12:52:17'),
(2072, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 12:52:17'),
(2073, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 12:52:21'),
(2074, 11, 'admin courses', 1, 'srv_admin.courses.task.edit', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\",\"id\":\"17\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/17', 1, '2020-07-20 12:52:34'),
(2075, 11, 'admin courses', 1, 'srv_admin.courses.task.update', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task/update', 1, '2020-07-20 12:52:59'),
(2076, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/task', 1, '2020-07-20 12:53:02'),
(2077, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 12:53:28'),
(2078, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-20 14:44:33'),
(2079, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-20 14:44:36'),
(2080, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 14:44:37'),
(2081, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-20 14:46:41'),
(2082, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:10:17'),
(2083, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:14:17'),
(2084, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:14:48'),
(2085, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:15:11'),
(2086, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:15:54'),
(2087, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:16:15'),
(2088, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:21:29'),
(2089, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:23:32'),
(2090, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-20 15:23:45'),
(2091, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:23:53'),
(2092, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-20 15:24:20'),
(2093, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-20 15:24:42'),
(2094, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-07-20 15:25:53'),
(2095, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-07-20 15:25:57'),
(2096, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 00:59:23'),
(2097, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 1, '2020-07-21 00:59:27'),
(2098, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-21 00:59:27'),
(2099, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-21 00:59:32'),
(2100, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-21 01:01:51'),
(2101, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-21 01:01:54'),
(2102, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-21 01:03:23'),
(2103, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-21 01:03:27'),
(2104, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-21 01:05:47'),
(2105, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/create', 1, '2020-07-21 01:05:49'),
(2106, 11, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach/store', 1, '2020-07-21 01:08:04'),
(2107, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'admin/courses/8fca0baf-1400-40e7-b3d6-2e6eee6267ee/teach', 1, '2020-07-21 01:08:06'),
(2108, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-21 01:14:12'),
(2109, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-21 01:14:21'),
(2110, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:14:26'),
(2111, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:18:58'),
(2112, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:19:03'),
(2113, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:19:10'),
(2114, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:26:02'),
(2115, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:26:06'),
(2116, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:26:11'),
(2117, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:33:59'),
(2118, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:52:03'),
(2119, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 01:52:29'),
(2120, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:30:11'),
(2121, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:30:21'),
(2122, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:32:41'),
(2123, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:33:05'),
(2124, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:33:25'),
(2125, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-21 06:33:35'),
(2126, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:33:43'),
(2127, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:34:15'),
(2128, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-21 06:34:23'),
(2129, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-21 06:34:30'),
(2130, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 1, '2020-07-21 06:34:37'),
(2131, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"2\",\"taskID\":\"10\"}', 'student/task/2/10', 1, '2020-07-21 06:34:56'),
(2132, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 06:35:40'),
(2133, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 33, '2020-07-21 06:36:48'),
(2134, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 33, '2020-07-21 06:36:59'),
(2135, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 33, '2020-07-21 06:37:37'),
(2136, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 33, '2020-07-21 06:37:47'),
(2137, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-21 06:47:06'),
(2138, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 06:48:45'),
(2139, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-21 07:21:30'),
(2140, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 11:08:26'),
(2141, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 44, '2020-07-21 11:09:38'),
(2142, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 44, '2020-07-21 11:09:46'),
(2143, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 44, '2020-07-21 11:09:51'),
(2144, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 11:53:34'),
(2145, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-21 11:53:38'),
(2146, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-21 11:53:38'),
(2147, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-21 11:53:41'),
(2148, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:53:42'),
(2149, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-21 11:54:59'),
(2150, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:00'),
(2151, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:09'),
(2152, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:11'),
(2153, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:14'),
(2154, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 11:55:47'),
(2155, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-21 11:55:49'),
(2156, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-21 11:55:50'),
(2157, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-21 11:55:54'),
(2158, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:55'),
(2159, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:58'),
(2160, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:55:59'),
(2161, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:02'),
(2162, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:05'),
(2163, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:06'),
(2164, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:09'),
(2165, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:11'),
(2166, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:13'),
(2167, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:16'),
(2168, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:17'),
(2169, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 11:56:20'),
(2170, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-21 12:03:01'),
(2171, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-21 12:03:04'),
(2172, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-21 12:03:05'),
(2173, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-21 12:03:08'),
(2174, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-21 12:03:09'),
(2175, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-21 12:03:10'),
(2176, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-22 05:00:20'),
(2177, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-22 05:00:27'),
(2178, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 44, '2020-07-22 12:49:37'),
(2179, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 44, '2020-07-22 12:51:48'),
(2180, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-22 14:31:56'),
(2181, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-22 14:32:01'),
(2182, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-22 14:36:24'),
(2183, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-22 14:36:36'),
(2184, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 05:38:58'),
(2185, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 05:47:11'),
(2186, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 05:47:33'),
(2187, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 05:47:58'),
(2188, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 09:16:35'),
(2189, 15, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\"}', 'general/announcement/90bcebd7-5053-40cb-a82a-92ab7af5b814', 1, '2020-07-23 09:16:56'),
(2190, 15, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-23 09:17:02'),
(2191, 15, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 09:18:25'),
(2192, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-23 09:18:30'),
(2193, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 09:18:34'),
(2194, 15, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-23 09:18:51'),
(2195, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 09:19:01'),
(2196, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:01:06'),
(2197, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:03:57'),
(2198, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:04:03'),
(2199, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:04:11'),
(2200, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:04:18'),
(2201, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 10:06:29'),
(2202, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-23 10:06:31'),
(2203, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-23 10:06:31'),
(2204, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-23 10:08:36'),
(2205, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-23 10:08:50'),
(2206, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/result', 30, '2020-07-23 10:08:59'),
(2207, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5bca-bb3c-4fb4-9780-bf7656e244d7\"}', 'exams/90ef5bca-bb3c-4fb4-9780-bf7656e244d7/overview', 30, '2020-07-23 10:09:08'),
(2208, 11, 'admin courses', 1, 'srv_admin.courses.teach.edit', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"18\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/18', 1, '2020-07-23 10:10:05'),
(2209, 11, 'admin courses', 1, 'srv_admin.courses.teach.update', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/update', 1, '2020-07-23 10:10:38'),
(2210, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-23 10:10:39'),
(2211, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 30, '2020-07-23 10:10:45'),
(2212, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-07-23 10:10:56'),
(2213, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-23 10:10:59'),
(2214, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 30, '2020-07-23 10:11:04'),
(2215, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-07-23 10:11:50'),
(2216, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-23 10:12:21'),
(2217, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 10:19:07'),
(2218, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 10:33:46'),
(2219, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 10:34:35'),
(2220, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 13:50:35'),
(2221, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 13:53:47'),
(2222, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-23 13:59:43'),
(2223, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 1, '2020-07-23 13:59:51'),
(2224, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 14:01:50'),
(2225, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-23 14:05:47'),
(2226, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-07-23 14:05:52'),
(2227, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 1, '2020-07-23 14:05:58'),
(2228, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/result', 1, '2020-07-23 14:08:58'),
(2229, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 1, '2020-07-23 14:09:14'),
(2230, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-23 14:09:37'),
(2231, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 14:09:47'),
(2232, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-23 14:10:36'),
(2233, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 14:11:57'),
(2234, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-23 14:15:49'),
(2235, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-23 14:16:02'),
(2236, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-07-23 14:16:04'),
(2237, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 1, '2020-07-23 14:16:07'),
(2238, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 1, '2020-07-23 14:33:55'),
(2239, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 14:34:12'),
(2240, 19, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 45, '2020-07-23 14:43:29'),
(2241, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-24 11:50:21'),
(2242, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-07-24 11:50:24'),
(2243, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-24 11:50:26'),
(2244, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-24 11:51:09'),
(2245, 20, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 46, '2020-07-24 13:38:42'),
(2246, 20, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 46, '2020-07-24 13:40:29'),
(2247, 20, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 46, '2020-07-24 13:43:29'),
(2248, 21, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 47, '2020-07-24 13:44:29'),
(2249, 21, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 47, '2020-07-24 13:46:15'),
(2250, 21, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 47, '2020-07-24 13:47:42'),
(2251, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 13:47:46'),
(2252, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 13:47:46'),
(2253, 21, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/create', 47, '2020-07-24 13:47:56'),
(2254, 21, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/store', 47, '2020-07-24 13:53:50'),
(2255, 21, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/create', 47, '2020-07-24 13:53:52'),
(2256, 21, 'admin courses', 1, 'srv_admin.courses.teach.store', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/store', 47, '2020-07-24 13:55:12'),
(2257, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 13:55:14'),
(2258, 21, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/sort', 47, '2020-07-24 13:55:18'),
(2259, 21, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach/sort', 47, '2020-07-24 13:55:20'),
(2260, 21, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 47, '2020-07-24 13:55:26'),
(2261, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 13:55:30'),
(2262, 21, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\",\"location\":\"1\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba/1', 47, '2020-07-24 13:55:33'),
(2263, 21, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\",\"location\":\"2\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba/2', 47, '2020-07-24 13:55:43'),
(2264, 21, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 47, '2020-07-24 13:55:57'),
(2265, 21, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 47, '2020-07-24 13:56:01'),
(2266, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 13:56:05'),
(2267, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 13:56:08'),
(2268, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 13:56:08'),
(2269, 21, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task', 47, '2020-07-24 13:56:13'),
(2270, 21, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task/create', 47, '2020-07-24 13:56:21'),
(2271, 21, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task/store', 47, '2020-07-24 13:57:12'),
(2272, 21, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task', 47, '2020-07-24 13:57:15'),
(2273, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 13:58:14'),
(2274, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 13:58:16'),
(2275, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 13:58:17'),
(2276, 21, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/participants', 47, '2020-07-24 13:58:19'),
(2277, 21, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/participants/to/json', 47, '2020-07-24 13:58:21'),
(2278, 21, 'admin courses', 1, 'srv_admin.courses.enroll', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/enroll/users', 47, '2020-07-24 13:58:32'),
(2279, 21, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/participants/to/json', 47, '2020-07-24 13:58:34'),
(2280, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 13:59:07'),
(2281, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 13:59:09'),
(2282, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 13:59:09'),
(2283, 21, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/participants', 47, '2020-07-24 13:59:15'),
(2284, 21, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/participants/to/json', 47, '2020-07-24 13:59:16'),
(2285, 21, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 48, '2020-07-24 13:59:40'),
(2286, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 48, '2020-07-24 13:59:47'),
(2287, 21, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\",\"location\":\"1\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba/1', 47, '2020-07-24 14:00:30'),
(2288, 21, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 47, '2020-07-24 14:01:07'),
(2289, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 14:01:12'),
(2290, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 14:01:15'),
(2291, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 14:01:15'),
(2292, 21, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task', 47, '2020-07-24 14:01:18'),
(2293, 21, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task/create', 47, '2020-07-24 14:01:20'),
(2294, 21, 'admin courses', 1, 'srv_admin.courses.task.store', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task/store', 47, '2020-07-24 14:01:30'),
(2295, 21, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/task', 47, '2020-07-24 14:01:31'),
(2296, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 48, '2020-07-24 14:08:40'),
(2297, 21, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/overview', 48, '2020-07-24 14:08:50'),
(2298, 21, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/result', 48, '2020-07-24 14:09:44'),
(2299, 21, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/overview', 48, '2020-07-24 14:10:41'),
(2300, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\"}', 'student/task/7', 48, '2020-07-24 14:10:53'),
(2301, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\",\"taskID\":\"21\"}', 'student/task/7/21', 48, '2020-07-24 14:10:55'),
(2302, 21, 'task', 2, 'student.task.submit', '{\"coursesID\":\"7\",\"taskID\":\"21\"}', 'student/task/7/21', 48, '2020-07-24 14:11:21'),
(2303, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\",\"taskID\":\"21\"}', 'student/task/7/21', 48, '2020-07-24 14:11:22'),
(2304, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\"}', 'student/task/7', 48, '2020-07-24 14:11:31'),
(2305, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\",\"taskID\":\"20\"}', 'student/task/7/20', 48, '2020-07-24 14:11:36'),
(2306, 21, 'task', 2, 'student.task.submit', '{\"coursesID\":\"7\",\"taskID\":\"20\"}', 'student/task/7/20', 48, '2020-07-24 14:11:53'),
(2307, 21, 'task', 2, 'student.task.list', '{\"coursesID\":\"7\",\"taskID\":\"20\"}', 'student/task/7/20', 48, '2020-07-24 14:11:54'),
(2308, 21, 'task', 2, 'student.task.list', '[]', 'student/task', 48, '2020-07-24 14:12:05'),
(2309, 21, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 47, '2020-07-24 14:12:48'),
(2310, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 14:14:27'),
(2311, 21, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 47, '2020-07-24 14:16:04'),
(2312, 21, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 47, '2020-07-24 14:16:43'),
(2313, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256', 47, '2020-07-24 14:16:45'),
(2314, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/teach', 47, '2020-07-24 14:16:45'),
(2315, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'learning/911e7655-b7fc-471e-9790-8e448fa66256', 48, '2020-07-24 14:25:54'),
(2316, 21, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 47, '2020-07-24 14:26:10'),
(2317, 21, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 47, '2020-07-24 14:26:50'),
(2318, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62', 47, '2020-07-24 14:26:52'),
(2319, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62/teach', 47, '2020-07-24 14:26:52'),
(2320, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'learning/911e79f4-2fee-4132-b824-d27d204dfa62', 49, '2020-07-24 14:27:49'),
(2321, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 14:28:01'),
(2322, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256', 47, '2020-07-24 14:28:04'),
(2323, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/teach', 47, '2020-07-24 14:28:05'),
(2324, 21, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 49, '2020-07-24 14:28:13'),
(2325, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'learning/911e7655-b7fc-471e-9790-8e448fa66256', 50, '2020-07-24 14:29:03'),
(2326, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 50, '2020-07-24 14:40:07'),
(2327, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:43:05'),
(2328, 21, 'user', 2, 'user.profile', '[]', 'user/profile', 50, '2020-07-24 14:44:23'),
(2329, 21, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 50, '2020-07-24 14:44:26');
INSERT INTO `general_activity_log` (`id_log`, `id_company`, `page_name`, `page_type`, `route_name`, `route_parameters`, `page_url`, `access_by`, `access_at`) VALUES
(2330, 21, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 50, '2020-07-24 14:44:27'),
(2331, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:47:11'),
(2332, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:51:49'),
(2333, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:51:52'),
(2334, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:58:47'),
(2335, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 50, '2020-07-24 14:59:34'),
(2336, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 14:59:37'),
(2337, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 50, '2020-07-24 15:00:08'),
(2338, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:00:21'),
(2339, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62', 47, '2020-07-24 15:00:26'),
(2340, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62/teach', 47, '2020-07-24 15:00:26'),
(2341, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 15:00:37'),
(2342, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'learning/911e79f4-2fee-4132-b824-d27d204dfa62', 50, '2020-07-24 15:00:45'),
(2343, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 50, '2020-07-24 15:00:51'),
(2344, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:01:04'),
(2345, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256', 47, '2020-07-24 15:01:07'),
(2346, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/teach', 47, '2020-07-24 15:01:07'),
(2347, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'learning/911e7655-b7fc-471e-9790-8e448fa66256', 51, '2020-07-24 15:01:59'),
(2348, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 51, '2020-07-24 15:02:06'),
(2349, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 51, '2020-07-24 15:02:08'),
(2350, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 51, '2020-07-24 15:08:31'),
(2351, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'learning/911e7655-b7fc-471e-9790-8e448fa66256', 51, '2020-07-24 15:08:49'),
(2352, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 51, '2020-07-24 15:08:52'),
(2353, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:09:00'),
(2354, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62', 47, '2020-07-24 15:09:04'),
(2355, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'admin/courses/911e79f4-2fee-4132-b824-d27d204dfa62/teach', 47, '2020-07-24 15:09:05'),
(2356, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e79f4-2fee-4132-b824-d27d204dfa62\"}', 'learning/911e79f4-2fee-4132-b824-d27d204dfa62', 51, '2020-07-24 15:09:18'),
(2357, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 51, '2020-07-24 15:09:21'),
(2358, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 51, '2020-07-24 15:09:58'),
(2359, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 51, '2020-07-24 15:12:27'),
(2360, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:12:38'),
(2361, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256', 47, '2020-07-24 15:12:42'),
(2362, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/teach', 47, '2020-07-24 15:12:43'),
(2363, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'learning/911e7655-b7fc-471e-9790-8e448fa66256', 52, '2020-07-24 15:13:46'),
(2364, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:13:50'),
(2365, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:26:57'),
(2366, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:30:30'),
(2367, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:30:42'),
(2368, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:31:23'),
(2369, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:32:42'),
(2370, 21, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 52, '2020-07-24 15:32:54'),
(2371, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 52, '2020-07-24 15:32:56'),
(2372, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:33:06'),
(2373, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 47, '2020-07-24 15:33:10'),
(2374, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'admin/courses/911e6bf4-6b6d-4a38-822c-eadb905de3ba/teach', 47, '2020-07-24 15:33:10'),
(2375, 21, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\"}', 'learning/911e6bf4-6b6d-4a38-822c-eadb905de3ba', 52, '2020-07-24 15:33:27'),
(2376, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 52, '2020-07-24 15:33:52'),
(2377, 21, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 52, '2020-07-24 15:34:29'),
(2378, 21, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/overview', 52, '2020-07-24 15:34:33'),
(2379, 21, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/result', 52, '2020-07-24 15:35:13'),
(2380, 21, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"911e7189-88d7-4ade-bcc7-a6804accc694\"}', 'exams/911e7189-88d7-4ade-bcc7-a6804accc694/overview', 52, '2020-07-24 15:36:49'),
(2381, 21, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 52, '2020-07-24 15:36:54'),
(2382, 21, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 47, '2020-07-24 15:37:36'),
(2383, 21, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256', 47, '2020-07-24 15:37:39'),
(2384, 21, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/teach', 47, '2020-07-24 15:37:40'),
(2385, 21, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/participants', 47, '2020-07-24 15:37:43'),
(2386, 21, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"911e7655-b7fc-471e-9790-8e448fa66256\"}', 'admin/courses/911e7655-b7fc-471e-9790-8e448fa66256/participants/to/json', 47, '2020-07-24 15:37:44'),
(2387, 21, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 47, '2020-07-24 15:39:06'),
(2388, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-07-24 15:39:28'),
(2389, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-24 15:39:32'),
(2390, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-24 15:39:36'),
(2391, 22, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 53, '2020-07-25 00:18:46'),
(2392, 22, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 53, '2020-07-25 00:20:37'),
(2393, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 00:21:07'),
(2395, -1, 'user', 2, 'user.profile', '[]', 'user/profile', 31, '2020-07-25 03:37:09'),
(2396, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 03:47:14'),
(2397, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-07-25 03:47:23'),
(2398, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-25 03:47:26'),
(2399, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-07-25 03:47:30'),
(2400, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 30, '2020-07-25 03:47:38'),
(2401, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"3\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/3', 30, '2020-07-25 03:47:42'),
(2402, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 03:47:49'),
(2403, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 04:42:24'),
(2404, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-07-25 04:43:04'),
(2405, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-25 04:43:43'),
(2406, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-25 04:43:54'),
(2407, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-25 04:43:54'),
(2408, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-25 04:44:06'),
(2409, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-07-25 04:44:09'),
(2410, 11, 'admin courses', 1, 'srv_admin.courses.create.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/create', 1, '2020-07-25 04:44:11'),
(2411, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-07-25 04:44:27'),
(2412, 11, 'admin courses', 1, 'srv_admin.courses.task.create', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task/create', 1, '2020-07-25 04:44:38'),
(2413, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-25 04:44:57'),
(2414, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-25 04:44:58'),
(2415, 11, 'admin courses', 1, 'srv_admin.courses.edit1', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/edit1', 1, '2020-07-25 04:45:30'),
(2416, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-25 04:45:39'),
(2417, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-25 04:45:40'),
(2418, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"30\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/30', 1, '2020-07-25 04:45:46'),
(2419, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-25 04:46:06'),
(2420, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-25 04:46:07'),
(2421, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-25 04:46:10'),
(2422, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 1, '2020-07-25 04:48:16'),
(2423, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 1, '2020-07-25 04:48:20'),
(2424, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 04:51:07'),
(2425, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-07-25 04:51:58'),
(2426, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-07-25 04:52:08'),
(2427, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-07-25 04:52:11'),
(2428, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-07-25 04:52:12'),
(2429, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-07-25 04:52:21'),
(2430, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-07-25 04:52:37'),
(2431, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-07-25 04:52:38'),
(2432, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 04:53:05'),
(2433, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 44, '2020-07-25 04:53:55'),
(2434, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 44, '2020-07-25 04:54:14'),
(2435, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 04:55:03'),
(2436, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"1\"}', 'student/task/1', 30, '2020-07-25 04:55:15'),
(2437, 11, 'task', 2, 'student.task.list', '[]', 'student/task', 30, '2020-07-25 04:55:27'),
(2438, 11, 'task', 2, 'student.task.list', '{\"coursesID\":\"2\",\"taskID\":\"17\"}', 'student/task/2/17', 30, '2020-07-25 04:55:33'),
(2439, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 30, '2020-07-25 04:55:45'),
(2440, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-07-25 04:55:55'),
(2441, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 30, '2020-07-25 04:56:05'),
(2442, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"2\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/2', 30, '2020-07-25 04:56:21'),
(2443, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-07-25 04:56:33'),
(2444, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 30, '2020-07-25 04:56:43'),
(2445, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/result', 30, '2020-07-25 04:57:46'),
(2446, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/overview', 30, '2020-07-25 04:58:36'),
(2447, 11, 'exams', 2, 'student.assistedtest.result.exam', '{\"uuid\":\"90ef5988-087d-4cbb-a79b-cb84f1c8312e\"}', 'exams/90ef5988-087d-4cbb-a79b-cb84f1c8312e/result', 30, '2020-07-25 04:58:44'),
(2448, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 04:59:47'),
(2449, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 05:03:02'),
(2450, 11, 'announcement', 2, 'general.announcement.all', '[]', 'general/announcement', 30, '2020-07-25 05:03:07'),
(2451, 11, 'announcement', 2, 'general.announcement.read', '{\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\"}', 'general/announcement/908b8e38-ad3e-4b1c-9e52-5497083a0cd3', 30, '2020-07-25 05:03:19'),
(2452, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:09:03'),
(2453, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 05:09:21'),
(2454, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-07-25 05:12:10'),
(2455, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:14:32'),
(2456, 23, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 54, '2020-07-25 05:20:08'),
(2457, 23, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 54, '2020-07-25 05:21:07'),
(2458, 23, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 54, '2020-07-25 05:21:57'),
(2459, 23, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 55, '2020-07-25 05:23:39'),
(2460, 23, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 54, '2020-07-25 05:24:35'),
(2461, 23, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 56, '2020-07-25 05:26:09'),
(2462, 23, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 56, '2020-07-25 05:26:13'),
(2463, 23, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 56, '2020-07-25 05:26:30'),
(2464, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:27:55'),
(2465, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-25 05:31:10'),
(2466, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-25 05:31:15'),
(2467, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-25 05:31:15'),
(2468, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-25 05:31:18'),
(2469, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-25 05:31:19'),
(2470, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-07-25 05:31:23'),
(2471, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:47:15'),
(2472, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:48:36'),
(2473, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-25 05:50:49'),
(2474, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-07-25 05:51:59'),
(2475, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-07-25 05:52:06'),
(2476, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-07-25 05:52:06'),
(2477, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-07-25 05:52:18'),
(2478, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-07-25 05:52:19'),
(2479, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-27 15:31:11'),
(2480, 11, 'leangings', 2, 'student.learning.materials', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"location\":\"1\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d/1', 1, '2020-07-27 15:33:07'),
(2481, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-28 01:21:47'),
(2482, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-07-28 04:38:14'),
(2483, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-04 08:38:13'),
(2484, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-04 08:38:38'),
(2485, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-04 08:38:45'),
(2486, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-04 08:38:48'),
(2487, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-04 08:38:52'),
(2488, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-04 08:52:55'),
(2489, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-04 16:33:04'),
(2490, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-04 16:33:14'),
(2491, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-04 16:57:26'),
(2492, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-05 01:39:20'),
(2493, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-08-05 01:39:27'),
(2494, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-05 01:39:27'),
(2495, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-05 01:39:31'),
(2496, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-05 01:39:34'),
(2497, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-08-05 01:39:37'),
(2498, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-08-05 01:39:41'),
(2499, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-08-05 01:39:42'),
(2500, 11, 'admin courses', 1, 'srv_admin.courses.participant.view', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\",\"id\":\"1\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participant/1', 1, '2020-08-05 01:39:45'),
(2501, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-05 01:39:55'),
(2502, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-05 01:40:02'),
(2503, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-05 01:40:04'),
(2504, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-05 02:26:13'),
(2505, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-05 06:57:38'),
(2506, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 06:34:20'),
(2507, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 11:32:15'),
(2508, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-06 12:06:55'),
(2509, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 12:07:16'),
(2510, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-08-06 12:07:20'),
(2511, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-06 12:07:20'),
(2512, 11, 'admin courses', 1, 'srv_admin.courses.task', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/task', 1, '2020-08-06 12:07:26'),
(2513, 11, 'admin courses', 1, 'srv_admin.courses.participants', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants', 1, '2020-08-06 12:07:29'),
(2514, 11, 'admin courses', 1, 'srv_admin.courses.participants.to.json', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/participants/to/json', 1, '2020-08-06 12:07:30'),
(2515, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-06 12:07:33'),
(2516, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-06 12:07:36'),
(2517, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-06 12:07:39'),
(2518, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:37:09'),
(2519, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:38:48'),
(2520, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:39:46'),
(2521, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:43:49'),
(2522, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:44:10'),
(2523, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-08-06 14:44:14'),
(2524, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-06 14:44:14'),
(2525, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:44:20'),
(2526, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:45:29'),
(2527, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:46:00'),
(2528, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:46:20'),
(2529, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:47:42'),
(2530, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:48:09'),
(2531, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:48:18'),
(2532, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:50:02'),
(2533, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:52:38'),
(2534, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:52:45'),
(2535, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:56:41'),
(2536, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:56:44'),
(2537, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:57:11'),
(2538, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 14:57:16'),
(2539, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 14:57:32'),
(2540, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-06 15:37:48'),
(2541, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-06 15:37:53'),
(2542, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 00:42:16'),
(2543, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-07 00:42:21'),
(2544, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-07 00:42:24'),
(2545, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 00:42:30'),
(2546, 11, 'admin courses', 1, 'srv_admin.courses.create', '[]', 'admin/courses/create', 1, '2020-08-07 01:25:18'),
(2547, 11, 'admin courses', 1, 'srv_admin.courses.store', '[]', 'admin/courses/store', 1, '2020-08-07 01:25:48'),
(2548, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"91398c68-bbf1-4f99-8592-5854e0b10b66\"}', 'admin/courses/91398c68-bbf1-4f99-8592-5854e0b10b66', 1, '2020-08-07 01:25:50'),
(2549, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"91398c68-bbf1-4f99-8592-5854e0b10b66\"}', 'admin/courses/91398c68-bbf1-4f99-8592-5854e0b10b66/teach', 1, '2020-08-07 01:25:50'),
(2550, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 02:24:46'),
(2551, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 02:26:08'),
(2552, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 02:26:55'),
(2553, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 04:49:27'),
(2554, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 05:57:29'),
(2555, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 08:10:48'),
(2556, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-07 09:12:48'),
(2557, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-08 07:24:34'),
(2558, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-08-08 07:25:43'),
(2559, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-08-08 07:25:47'),
(2560, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-08-08 07:25:50'),
(2561, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fca0baf-1400-40e7-b3d6-2e6eee6267ee\"}', 'learning/8fca0baf-1400-40e7-b3d6-2e6eee6267ee', 30, '2020-08-08 07:26:14'),
(2562, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-08-08 07:26:19'),
(2563, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-08 07:36:08'),
(2564, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-08 07:36:13'),
(2565, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-08 09:34:10'),
(2566, 11, 'user', 2, 'user.profile', '[]', 'user/profile', 1, '2020-08-08 09:34:16'),
(2567, 11, 'user', 2, 'user.profile.update', '[]', 'user/profile/update', 1, '2020-08-08 09:34:22'),
(2568, 11, 'user', 2, 'user.change.password', '[]', 'user/profile/change-password', 1, '2020-08-08 09:34:25'),
(2569, 11, 'user', 2, 'user.change.password.do', '[]', 'user/profile/update-password', 1, '2020-08-08 09:34:27'),
(2570, 11, 'user', 2, 'user.change.password.do', '[]', 'user/profile/update-password', 1, '2020-08-08 09:34:30'),
(2571, 11, 'user', 2, 'user.my.transactions', '[]', 'user/transactions/my-transactions', 1, '2020-08-08 09:34:32'),
(2572, 11, 'user', 2, 'user.transactions.json', '[]', 'user/transactions/my-transactions-json', 1, '2020-08-08 09:34:32'),
(2573, 11, 'user', 2, 'user.assosiated', '[]', 'user/profile/assosiated', 1, '2020-08-08 09:34:35'),
(2574, 11, 'user', 2, 'user.my.services.transactions', '[]', 'user/transactions/my-services-transactions', 1, '2020-08-08 09:34:39'),
(2575, 11, 'user', 2, 'user.transactions.services.json', '[]', 'user/transactions/my-services-json', 1, '2020-08-08 09:34:40'),
(2576, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-08 09:34:42'),
(2577, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-08 10:19:44'),
(2578, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d', 1, '2020-08-08 10:19:50'),
(2579, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach', 1, '2020-08-08 10:19:50'),
(2580, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-08 10:19:57'),
(2581, 11, 'admin courses', 1, 'srv_admin.courses.teach.sort', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'admin/courses/8fc9d32f-d957-43dc-9c70-70241185ca3d/teach/sort', 1, '2020-08-08 10:20:01'),
(2582, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 30, '2020-08-10 01:29:20'),
(2583, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 30, '2020-08-10 01:29:24'),
(2584, 11, 'exams', 2, 'student.assistedtest.overview', '{\"uuid\":\"8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c\"}', 'exams/8fd3fbd6-6e3a-476b-8ab7-b7d8e609bf6c/overview', 30, '2020-08-10 01:29:27'),
(2585, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-10 01:29:37'),
(2586, 11, 'leangings', 2, 'student.learning.learning', '{\"uuid\":\"8fc9d32f-d957-43dc-9c70-70241185ca3d\"}', 'learning/8fc9d32f-d957-43dc-9c70-70241185ca3d', 30, '2020-08-10 01:36:38'),
(2587, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-10 02:00:13'),
(2588, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-10 04:13:49'),
(2589, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-10 05:46:09'),
(2590, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-10 05:46:18'),
(2591, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-10 05:49:06'),
(2592, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-12 12:11:18'),
(2593, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-12 12:11:46'),
(2594, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-12 12:11:53'),
(2595, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-12 12:12:37'),
(2596, 15, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-12 12:12:53'),
(2597, 15, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-08-12 12:13:01'),
(2598, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-08-12 12:13:04'),
(2599, 11, 'admin dashboard', 1, 'srv_admin.dashboard', '[]', 'admin/dashboard', 1, '2020-08-12 12:13:13'),
(2600, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-12 12:13:17'),
(2601, 11, 'admin courses', 1, 'srv_admin.courses.manage', '{\"uuid\":\"91398c68-bbf1-4f99-8592-5854e0b10b66\"}', 'admin/courses/91398c68-bbf1-4f99-8592-5854e0b10b66', 1, '2020-08-12 12:13:19'),
(2602, 11, 'admin courses', 1, 'srv_admin.courses.teach', '{\"uuid\":\"91398c68-bbf1-4f99-8592-5854e0b10b66\"}', 'admin/courses/91398c68-bbf1-4f99-8592-5854e0b10b66/teach', 1, '2020-08-12 12:13:19'),
(2603, 11, 'admin courses', 1, 'srv_admin.courses.remove', '[]', 'admin/courses/delete', 1, '2020-08-12 12:13:25'),
(2604, 11, 'admin courses', 1, 'srv_admin.courses.show', '[]', 'admin/courses', 1, '2020-08-12 12:13:26'),
(2605, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-08-12 12:13:30'),
(2606, 11, 'exams', 2, 'student.assistedtest.all.exams', '[]', 'exams', 1, '2020-08-12 12:14:08'),
(2607, 11, 'learning', 2, 'student.learning.all.learning', '[]', 'learning', 1, '2020-08-12 12:14:11'),
(2608, 11, 'dashboard', 2, 'student.dashboard', '[]', 'dashboard', 1, '2020-08-12 13:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `group_uuid` varchar(36) NOT NULL,
  `group_category` int(11) NOT NULL DEFAULT 0,
  `label` varchar(100) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `cover_img` varchar(100) DEFAULT NULL,
  `max_users` int(11) NOT NULL DEFAULT -1,
  `purchasable` tinyint(1) NOT NULL DEFAULT 0,
  `prices` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `company_id`, `group_uuid`, `group_category`, `label`, `descriptions`, `cover_img`, `max_users`, `purchasable`, `prices`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 7, 'uuu', 1, 'Kelas Pemorgraman Dasar', 'Lorem ipsum dolor', NULL, 100, 0, 0, '2020-01-08 05:18:10', 8, NULL, NULL, NULL, NULL, 0),
(3, 7, 'yttyyuu', 1, 'Pemrograman Expert', 'lorem ipsum', NULL, -1, 0, 0, '2020-01-09 07:20:14', 8, NULL, NULL, NULL, NULL, 0),
(4, 7, 'wdawdaw', 1, 'Pemrograman Expert', 'lorem ipsum', NULL, -1, 0, NULL, '2020-01-09 07:21:32', 8, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_categories`
--

CREATE TABLE `group_categories` (
  `id_g_category` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_categories`
--

INSERT INTO `group_categories` (`id_g_category`, `label`, `descriptions`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`, `company_id`) VALUES
(1, 'Uncategorized', NULL, '2020-01-09 06:02:34', 0, NULL, NULL, NULL, NULL, 0, 0),
(2, 'Uncategorized', NULL, '2020-01-09 06:03:17', 8, NULL, NULL, NULL, NULL, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`id_group`, `id_user`, `created_at`, `created_by`) VALUES
(1, 12, '2020-01-09 07:17:33', 8),
(1, 13, '2020-01-09 07:17:33', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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

-- --------------------------------------------------------

--
-- Table structure for table `l_e_categories`
--

CREATE TABLE `l_e_categories` (
  `id_category` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_e_categories`
--

INSERT INTO `l_e_categories` (`id_category`, `id_company`, `category`, `descriptions`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(3, 11, 'Pamrograman', '', '2020-01-27 21:13:47', 7, NULL, NULL, NULL, NULL, 0),
(4, 11, 'Matematika', '', '2020-01-27 21:13:47', 7, NULL, NULL, NULL, NULL, 0),
(6, 11, 'Kebudayaan', 'Lorem ipsum', '2020-06-02 23:39:37', 1, '2020-06-03 00:45:05', 1, '2020-06-03 00:45:05', 1, 1),
(7, 11, 'Algoritma II', 'Lorem ipsum', '2020-06-02 23:40:13', 1, '2020-06-03 00:44:33', 1, '2020-06-03 00:44:33', 1, 1),
(8, 11, 'Manajemen', NULL, '2020-06-02 23:41:19', 1, '2020-06-02 23:41:19', NULL, NULL, NULL, 0),
(13, 11, 'Algoritma', 'Lorem ipsum', '2020-06-03 00:34:25', 1, '2020-06-09 03:23:47', 1, NULL, NULL, 0),
(14, 11, 'Contoh', NULL, '2020-06-03 00:45:25', 1, '2020-06-03 00:45:30', NULL, '2020-06-03 00:45:30', 1, 1),
(15, 11, 'Ujian Prajabatan', NULL, '2020-06-03 00:49:20', 1, '2020-06-03 00:49:20', NULL, NULL, NULL, 0),
(16, 11, 'Kewarganegaraan', NULL, '2020-07-10 21:25:47', 1, '2020-07-10 21:25:47', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `l_e_ratings`
--

CREATE TABLE `l_e_ratings` (
  `id_ratings` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `type_post` int(11) DEFAULT NULL,
  `rating_val` int(11) NOT NULL,
  `rating_content` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `l_e_ratings`
--

INSERT INTO `l_e_ratings` (`id_ratings`, `id_company`, `id_post`, `type_post`, `rating_val`, `rating_content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(8, 11, 1, 1, 5, NULL, '2020-06-09 01:42:15', 30, '2020-06-29 06:13:26', 30),
(9, 11, 1, 1, 5, 'Penjelasan mudah dimengerti', '2020-06-09 01:49:42', 33, '2020-06-09 01:49:42', NULL),
(10, 11, 2, 2, 4, NULL, '2020-06-29 06:16:07', 30, '2020-06-29 06:16:07', NULL),
(11, 21, 7, 1, 4, NULL, '2020-07-24 14:01:50', 48, '2020-07-24 14:01:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_18_170753_create_websockets_statistics_entries_table', 2),
(5, '2020_03_23_114425_create_notifications_table', 3),
(6, '2020_04_03_103736_create_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_company` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notif_owner` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_type` int(11) NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `id_company`, `type`, `notif_type`, `notif_owner`, `owner_type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `created_by`, `updated_at`) VALUES
('0349240c-c4d9-445a-9d44-69a2dcd64c1f', 11, 'App\\Notifications\\CommentNotification', 'comment', '2', 2, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>wah sangat sulit nampaknya<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":2,\"type_post\":\"2\",\"updated_at\":\"2020-06-28 19:46:02\",\"created_at\":\"2020-06-28 19:46:02\",\"id_comment\":107,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02'),
('0862e0f5-ae91-4785-8756-36b9be0838f7', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 00:49:38\",\"created_at\":\"2020-06-09 00:49:38\",\"id_comment\":98,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 08:49:39', 30, '2020-06-08 08:49:39'),
('10a17b10-cf21-43bb-a520-2298e5498a97', 11, 'App\\Notifications\\RatingNotification', 'rating', '2', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":\"\",\"read_at\":null}', NULL, '2020-06-29 06:16:07', 30, '2020-06-29 06:16:07'),
('1b08d0a7-549b-4283-a90c-dbcea14758f3', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:52:17\",\"created_at\":\"2020-06-09 17:52:17\",\"id_comment\":105,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:52:17', 30, '2020-06-09 01:52:17'),
('1fd7993f-3a13-4589-a0be-5c81bef8a4c2', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '1', 3, 'App\\User', 30, '{\"id\":30,\"title\":\"Batas Pengerjaan Ujian\",\"type\":null,\"data\":{\"id_ann\":1,\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\",\"id_company\":11,\"title\":\"Batas Pengerjaan Ujian\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-05-12 21:36:49\",\"created_by\":1,\"updated_at\":\"2020-05-12 21:38:24\",\"updated_by\":1},\"read_at\":null}', '2020-07-25 05:03:19', '2020-05-12 06:38:24', 1, '2020-07-25 05:03:19'),
('23351f6f-a1b2-4c2b-ba3e-6fdc2b684ca4', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":35,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:37:54\",\"created_at\":\"2020-06-09 10:37:54\",\"id_comment\":103,\"creator\":{\"id\":35,\"name\":\"Yulia Ade Kurniawan\",\"username\":\"yuliadekurnia\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"yuliadekurnia@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:46:32\",\"updated_at\":\"2020-06-02 14:46:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54'),
('2651c792-08c3-429e-b657-92794a599e53', 11, 'App\\Notifications\\CommentNotification', 'comment', '10', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":10,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:16:07\",\"created_at\":\"2020-07-06 22:16:07\",\"id_comment\":113,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-07-19 09:23:49', '2020-07-06 06:16:07', 30, '2020-07-19 09:23:49'),
('28af057d-a146-40e8-92ab-9f4e14b72f5e', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-10 04:10:19', 30, '2020-07-10 04:10:19'),
('2a5ea353-4891-4a4c-b35f-e1f755b340de', 21, 'App\\Notifications\\CommentNotification', 'comment', '7', 1, 'App\\User', 48, '{\"id\":48,\"type\":null,\"data\":{\"content\":\"<p>Akan diupload lagi nanti bertahap<\\/p>\",\"created_by\":47,\"id_company\":\"21\",\"id_post\":7,\"type_post\":\"1\",\"updated_at\":\"2020-07-24 22:00:47\",\"created_at\":\"2020-07-24 22:00:47\",\"id_comment\":116,\"creator\":{\"id\":47,\"name\":\"Sudiatmiko\",\"username\":null,\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"https:\\/\\/api.adorable.io\\/avatars\\/100\\/abott@adorable.png\",\"email\":\"adminsudiatmiko@mail.com\",\"email_verified_at\":null,\"active_session\":\"21\",\"active_status\":1,\"created_at\":\"2020-07-24 21:44:29\",\"updated_at\":\"2020-07-24 21:56:01\",\"lang\":\"id\"}},\"read_at\":null}', NULL, '2020-07-24 14:00:47', 47, '2020-07-24 14:00:47'),
('2f52c846-1b4c-420b-b5f2-ba8a1aaa6b8b', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<\\/p>\",\"created_by\":33,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:30:36\",\"created_at\":\"2020-06-09 10:30:36\",\"id_comment\":102,\"creator\":{\"id\":33,\"name\":\"Suryadi Slamet Rachman\",\"username\":\"suryadislamet\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"suryadislamet@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:45:05\",\"updated_at\":\"2020-06-02 14:45:05\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:30:36', 33, '2020-06-08 18:30:36'),
('304d0936-ed85-4b48-983a-2fadc12c9354', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Test<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-27 23:33:15\",\"created_at\":\"2020-07-27 23:33:15\",\"id_comment\":118,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":1,\"created_at\":\"2020-02-06 06:10:11\",\"updated_at\":\"2020-07-24 23:39:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-27 15:33:16', 1, '2020-07-27 15:33:16'),
('35248499-773a-4177-b182-5568586d96d4', 11, 'App\\Notifications\\CommentNotification', 'comment', '4', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p><strong>Keterangan<\\/strong><\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":4,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:13:13\",\"created_at\":\"2020-07-06 22:13:13\",\"id_comment\":108,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-07-06 06:14:43', '2020-07-06 06:13:13', 30, '2020-07-06 06:14:43'),
('3bc297d4-8141-423c-b3e3-949f36fd1df7', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:50:33\",\"created_at\":\"2020-06-09 17:50:33\",\"id_comment\":104,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-09 11:49:17\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:50:34', 1, '2020-06-09 01:50:34'),
('3d87fb31-0dab-40ac-9017-990eb2a8d7f4', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor&nbsp;<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-12 21:46:31\",\"created_at\":\"2020-06-12 21:46:31\",\"id_comment\":106,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-12 21:46:06\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-12 05:46:32', 1, '2020-06-12 05:46:32'),
('3e6e2368-c51b-4516-a93a-e1f46c2fc955', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 35, '{\"id\":35,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', NULL, '2020-06-05 18:34:10', 1, '2020-06-05 18:34:10'),
('4167241f-f9f9-43a1-b9ee-986924446ba3', 11, 'App\\Notifications\\CommentNotification', 'comment', '2', 2, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>wah sangat sulit nampaknya<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":2,\"type_post\":\"2\",\"updated_at\":\"2020-06-28 19:46:02\",\"created_at\":\"2020-06-28 19:46:02\",\"id_comment\":107,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02'),
('42d1fe2e-ca7f-413d-a90f-5e31a06e7a4f', 11, 'App\\Notifications\\CommentNotification', 'comment', '2', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>wah sangat sulit nampaknya<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":2,\"type_post\":\"2\",\"updated_at\":\"2020-06-28 19:46:02\",\"created_at\":\"2020-06-28 19:46:02\",\"id_comment\":107,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02'),
('5c01cf5e-64e8-4c09-bbf9-b5a71d967941', 11, 'App\\Notifications\\RatingNotification', 'rating', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":\"\",\"read_at\":null}', '2020-06-09 01:55:16', '2020-06-09 01:49:42', 33, '2020-06-09 01:55:16'),
('69ead2b2-d74e-47bb-94c0-de9f0faaa816', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor&nbsp;<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-12 21:46:31\",\"created_at\":\"2020-06-12 21:46:31\",\"id_comment\":106,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-12 21:46:06\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-06-29 06:13:47', '2020-06-12 05:46:32', 1, '2020-06-29 06:13:47'),
('6b0d4473-5acf-43af-ba56-001738705fb7', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:26:27\",\"created_at\":\"2020-06-09 10:26:27\",\"id_comment\":101,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-08 16:45:38\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:26:27', 1, '2020-06-08 18:26:27'),
('6f172cb4-aa4c-4a95-a6b8-46b6a18f85bd', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor&nbsp;<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-12 21:46:31\",\"created_at\":\"2020-06-12 21:46:31\",\"id_comment\":106,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-12 21:46:06\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-12 05:46:32', 1, '2020-06-12 05:46:32'),
('6f7dc7ad-7af0-47f9-904f-4dba657a1551', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:52:17\",\"created_at\":\"2020-06-09 17:52:17\",\"id_comment\":105,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:52:17', 30, '2020-06-09 01:52:17'),
('704723e9-a2d9-419e-bd53-901d73afa4cf', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:26:16\",\"created_at\":\"2020-06-09 10:26:16\",\"id_comment\":100,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:26:16', 30, '2020-06-08 18:26:16'),
('72035d03-b893-4034-9eca-e945846cf7f0', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-10 04:10:19', 30, '2020-07-10 04:10:19'),
('75db3287-e0d6-41a5-8b03-4b1097be95d3', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '1', 3, 'App\\User', 1, '{\"id\":1,\"title\":\"Batas Pengerjaan Ujian\",\"type\":null,\"data\":{\"id_ann\":1,\"uuid\":\"908b8e38-ad3e-4b1c-9e52-5497083a0cd3\",\"id_company\":11,\"title\":\"Batas Pengerjaan Ujian\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-05-12 21:36:49\",\"created_by\":1,\"updated_at\":\"2020-05-12 21:38:24\",\"updated_by\":1},\"read_at\":null}', '2020-07-25 04:48:20', '2020-05-12 06:38:24', 1, '2020-07-25 04:48:20'),
('7b74f3e1-3666-4edc-85fd-9b36f98716da', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-10 04:10:18', 30, '2020-07-10 04:10:18'),
('839eafcb-4054-4bc3-bda5-2e4cfeef6537', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Test<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-27 23:33:15\",\"created_at\":\"2020-07-27 23:33:15\",\"id_comment\":118,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":1,\"created_at\":\"2020-02-06 06:10:11\",\"updated_at\":\"2020-07-24 23:39:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-27 15:33:16', 1, '2020-07-27 15:33:16'),
('8bb14a61-de2e-482c-bd3f-7361e74170a8', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:25:55\",\"created_at\":\"2020-06-09 10:25:55\",\"id_comment\":99,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-08 16:45:38\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:25:56', 1, '2020-06-08 18:25:56'),
('8fe5b621-a7dc-4f14-9b16-57344cc86036', 11, 'App\\Notifications\\TaskNotification', 'task', '12', 4, 'App\\User', 1, '{\"id\":1,\"title\":\"Pertemuan 1 dari Bahasa Indonesia\",\"type\":null,\"data\":{\"id_task\":12,\"id_courses\":3,\"id_company\":11,\"title\":\"Pertemuan 1\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"start_at\":\"2020-06-07 19:41:33\",\"end_at\":\"2020-06-30 00:00:00\",\"max_submit\":2,\"created_at\":\"2020-06-07 19:42:16\",\"created_by\":1,\"updated_at\":\"2020-06-07 19:42:16\",\"updated_by\":null,\"deleted_at\":null,\"deleted_by\":null,\"is_deleted\":0,\"courses\":{\"id_courses\":3,\"id_company\":11,\"uuid\":\"8fcb8f8f-387b-4178-9cf5-491ed26bc9a1\",\"title\":\"Bahasa Indonesia\",\"category\":0,\"descriptions\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"cover_img_url\":\"http:\\/\\/elcat.localhost\\/storage\\/8fc9d004-a7ca-427f-ae8e-28bdd9a88ddb\\/file\\/1\\/Cover\\/high-rise-building-at-the-city-2438240.jpg\",\"is_manual_add\":1,\"is_share_link\":1,\"is_unlimited_users\":1,\"max_users\":null,\"start_date\":null,\"is_no_end_time\":1,\"end_date\":null,\"is_free\":1,\"is_private\":1,\"courses_price\":0,\"created_by\":1,\"created_at\":\"2020-02-07 11:01:36\",\"updated_by\":null,\"updated_at\":\"2020-06-07 18:06:40\",\"deleted_by\":1,\"deleted_at\":\"2020-06-07 18:06:40\",\"is_deleted\":0}},\"read_at\":null}', '2020-06-09 04:58:55', '2020-06-07 03:42:16', 1, '2020-06-09 04:58:55'),
('8ffd1184-20e9-44a3-9126-206503f7006c', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-10 04:10:18', 30, '2020-07-10 04:10:18'),
('9037adf8-010d-4cda-a173-a1387132af6c', 11, 'App\\Notifications\\CommentNotification', 'comment', '4', 2, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p><strong>Keterangan<\\/strong><\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":4,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:15:20\",\"created_at\":\"2020-07-06 22:15:20\",\"id_comment\":111,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-07-06 22:14:50\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-06 06:15:21', 1, '2020-07-06 06:15:21'),
('90f1ffc0-2d80-4096-9131-5e505fee9cc6', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<\\/p>\",\"created_by\":33,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:30:36\",\"created_at\":\"2020-06-09 10:30:36\",\"id_comment\":102,\"creator\":{\"id\":33,\"name\":\"Suryadi Slamet Rachman\",\"username\":\"suryadislamet\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"suryadislamet@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:45:05\",\"updated_at\":\"2020-06-02 14:45:05\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:30:36', 33, '2020-06-08 18:30:36'),
('919d2f7f-66d5-4c8c-8a47-2023588d05e2', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Test<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-27 23:33:15\",\"created_at\":\"2020-07-27 23:33:15\",\"id_comment\":118,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":1,\"created_at\":\"2020-02-06 06:10:11\",\"updated_at\":\"2020-07-24 23:39:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-27 15:33:16', 1, '2020-07-27 15:33:16'),
('999e71c7-1890-4efd-9b58-a5c8047ce8ca', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:50:33\",\"created_at\":\"2020-06-09 17:50:33\",\"id_comment\":104,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-09 11:49:17\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:50:34', 1, '2020-06-09 01:50:34'),
('9b77810e-ef67-48cb-a9c5-0ae23cb41558', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Test<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-27 23:33:15\",\"created_at\":\"2020-07-27 23:33:15\",\"id_comment\":118,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":1,\"created_at\":\"2020-02-06 06:10:11\",\"updated_at\":\"2020-07-24 23:39:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-27 15:33:16', 1, '2020-07-27 15:33:16'),
('9d26a2d1-d6e7-4c6e-bd92-210c099ef43c', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-07-22 14:36:23', '2020-07-10 04:10:18', 30, '2020-07-22 14:36:23'),
('9d4ba20f-282f-4dfe-82d9-47c9d7c02ad1', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":35,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:37:54\",\"created_at\":\"2020-06-09 10:37:54\",\"id_comment\":103,\"creator\":{\"id\":35,\"name\":\"Yulia Ade Kurniawan\",\"username\":\"yuliadekurnia\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"yuliadekurnia@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:46:32\",\"updated_at\":\"2020-06-02 14:46:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54'),
('9fa77d95-9c5e-4da4-b0d9-0dee00090281', 11, 'App\\Notifications\\CommentNotification', 'comment', '4', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p><strong>Keterangan<\\/strong><\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":4,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:14:34\",\"created_at\":\"2020-07-06 22:14:34\",\"id_comment\":110,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-07-06 06:15:00', '2020-07-06 06:14:34', 30, '2020-07-06 06:15:00'),
('a8cdd557-6cd9-468f-a737-7041200360a0', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 34, '{\"id\":34,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', NULL, '2020-06-05 18:34:10', 1, '2020-06-05 18:34:10'),
('aa84f20d-b95d-4c72-b820-025fe6ac91d5', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor&nbsp;<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-12 21:46:31\",\"created_at\":\"2020-06-12 21:46:31\",\"id_comment\":106,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-12 21:46:06\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-12 05:46:32', 1, '2020-06-12 05:46:32'),
('ac8658fd-3268-4d58-bb75-58ebf5d0c3c5', 11, 'App\\Notifications\\CommentNotification', 'comment', '2', 2, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>wah sangat sulit nampaknya<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":2,\"type_post\":\"2\",\"updated_at\":\"2020-06-28 19:46:02\",\"created_at\":\"2020-06-28 19:46:02\",\"id_comment\":107,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02'),
('b120de43-b1ed-4b9e-a22c-71d381e3587e', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 36, '{\"id\":36,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', NULL, '2020-06-05 18:34:10', 1, '2020-06-05 18:34:10'),
('b3728f8c-5d0c-47ca-8638-3ed09a12cc2c', 21, 'App\\Notifications\\CommentNotification', 'comment', '7', 1, 'App\\User', 47, '{\"id\":47,\"type\":null,\"data\":{\"content\":\"<p>Apakah materinya hanya 2 saja ?<\\/p>\",\"created_by\":48,\"id_company\":\"21\",\"id_post\":7,\"type_post\":\"1\",\"updated_at\":\"2020-07-24 22:00:11\",\"created_at\":\"2020-07-24 22:00:11\",\"id_comment\":115,\"creator\":{\"id\":48,\"name\":\"Admika\",\"username\":\"admika\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"https:\\/\\/api.adorable.io\\/avatars\\/100\\/abott@adorable.png\",\"email\":\"admika@mail.com\",\"email_verified_at\":null,\"active_session\":\"21\",\"active_status\":3,\"created_at\":\"2020-07-24 21:58:07\",\"updated_at\":\"2020-07-24 21:59:01\",\"lang\":\"id\"}},\"read_at\":null}', '2020-07-24 14:00:29', '2020-07-24 14:00:12', 48, '2020-07-24 14:00:29'),
('b4a7a702-da00-4a18-82d4-e08d912a5ad5', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:50:33\",\"created_at\":\"2020-06-09 17:50:33\",\"id_comment\":104,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-09 11:49:17\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:50:34', 1, '2020-06-09 01:50:34'),
('b7616bf9-e146-421d-bd6f-dd498c4c9ffd', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":35,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:37:54\",\"created_at\":\"2020-06-09 10:37:54\",\"id_comment\":103,\"creator\":{\"id\":35,\"name\":\"Yulia Ade Kurniawan\",\"username\":\"yuliadekurnia\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"yuliadekurnia@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:46:32\",\"updated_at\":\"2020-06-02 14:46:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54'),
('b8a02c3e-0379-4173-a3c7-0fe0e945f1bf', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Test<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-27 23:33:15\",\"created_at\":\"2020-07-27 23:33:15\",\"id_comment\":118,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":1,\"created_at\":\"2020-02-06 06:10:11\",\"updated_at\":\"2020-07-24 23:39:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-27 15:33:15', 1, '2020-07-27 15:33:15'),
('b9fc9196-3c6d-4b03-856c-93dfe7a955f1', 21, 'App\\Notifications\\AnnouncementNotification', 'announcement', '5', 3, 'App\\User', 47, '{\"id\":47,\"title\":\"Pengumuman Semua User\",\"type\":null,\"data\":{\"id_ann\":5,\"uuid\":\"911e7520-6a35-4cc4-b9d6-df74ff2116f9\",\"id_company\":21,\"title\":\"Pengumuman Semua User\",\"content\":\"<p>lorem ipsum<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-07-24 22:13:21\",\"created_by\":47,\"updated_at\":\"2020-07-24 22:13:53\",\"updated_by\":47,\"deleted_at\":null,\"deleted_by\":null,\"is_deleted\":0},\"read_at\":null}', NULL, '2020-07-24 14:13:53', 47, '2020-07-24 14:13:53'),
('bbdcf733-9975-4c64-8acf-158cefe1e20e', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:52:17\",\"created_at\":\"2020-06-09 17:52:17\",\"id_comment\":105,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-06-09 01:56:06', '2020-06-09 01:52:17', 30, '2020-06-09 01:56:06'),
('bcc23aad-5b39-46c3-81d0-4df21aadb31f', 21, 'App\\Notifications\\TaskNotification', 'task', '21', 4, 'App\\User', 48, '{\"id\":48,\"title\":\"Tugas 2 dari Pendidikan Kelautan\",\"type\":null,\"data\":{\"id_task\":21,\"id_courses\":7,\"id_company\":21,\"title\":\"Tugas 2\",\"content\":\"<p>kerjakan<\\/p>\",\"start_at\":\"2020-07-24 22:01:20\",\"end_at\":null,\"max_submit\":1,\"created_at\":\"2020-07-24 22:01:30\",\"created_by\":47,\"updated_at\":\"2020-07-24 22:01:30\",\"updated_by\":null,\"deleted_at\":null,\"deleted_by\":null,\"is_deleted\":0,\"courses\":{\"id_courses\":7,\"id_company\":21,\"uuid\":\"911e6bf4-6b6d-4a38-822c-eadb905de3ba\",\"title\":\"Pendidikan Kelautan\",\"category\":0,\"descriptions\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"cover_img_url\":\"\\/storage\\/911e6acd-37be-4d59-9f07-dfa488ad6ea2\\/file\\/1\\/Cover\\/landscape-of-river-near-the-mountains-713074.jpg\",\"is_manual_add\":1,\"is_share_link\":1,\"is_unlimited_users\":1,\"max_users\":null,\"start_date\":\"2020-07-24 21:46:00\",\"is_no_end_time\":1,\"end_date\":\"9999-12-30 00:00:00\",\"is_free\":1,\"is_private\":0,\"courses_price\":0,\"created_by\":47,\"created_at\":\"2020-07-24 21:47:42\",\"updated_by\":null,\"updated_at\":\"2020-07-24 21:47:42\",\"deleted_by\":null,\"deleted_at\":null,\"is_deleted\":0}},\"read_at\":null}', NULL, '2020-07-24 14:01:30', 47, '2020-07-24 14:01:30'),
('bcdff92d-cbcc-4ab4-a991-34ac67074313', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 38, '{\"id\":38,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-07-10 20:10:18\",\"created_at\":\"2020-07-10 20:10:18\",\"id_comment\":114,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-10 04:10:19', 30, '2020-07-10 04:10:19');
INSERT INTO `notifications` (`id`, `id_company`, `type`, `notif_type`, `notif_owner`, `owner_type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `created_by`, `updated_at`) VALUES
('c4bd1a1c-9b0b-4d1f-bedf-77f9d239f28b', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:52:17\",\"created_at\":\"2020-06-09 17:52:17\",\"id_comment\":105,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:52:17', 30, '2020-06-09 01:52:17'),
('c618e8ec-cf10-4341-b6b4-5f7fda5da288', 11, 'App\\Notifications\\CommentNotification', 'comment', '4', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p><strong>Keterangan<\\/strong><\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":4,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:14:11\",\"created_at\":\"2020-07-06 22:14:11\",\"id_comment\":109,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-07-06 06:14:11', 30, '2020-07-06 06:14:11'),
('c7e632fc-38d0-43bc-a81b-bdece8bbea79', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<\\/p>\",\"created_by\":33,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:30:36\",\"created_at\":\"2020-06-09 10:30:36\",\"id_comment\":102,\"creator\":{\"id\":33,\"name\":\"Suryadi Slamet Rachman\",\"username\":\"suryadislamet\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"suryadislamet@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:45:05\",\"updated_at\":\"2020-06-02 14:45:05\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:30:37', 33, '2020-06-08 18:30:37'),
('c8373a47-1922-4ea6-b3b3-a1d3e4d07b86', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 33, '{\"id\":33,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', NULL, '2020-06-05 18:34:10', 1, '2020-06-05 18:34:10'),
('cc10ea39-fdec-4f8d-9397-62f7900d0b37', 11, 'App\\Notifications\\CommentNotification', 'comment', '2', 2, 'App\\User', 35, '{\"id\":35,\"type\":null,\"data\":{\"content\":\"<p>wah sangat sulit nampaknya<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":2,\"type_post\":\"2\",\"updated_at\":\"2020-06-28 19:46:02\",\"created_at\":\"2020-06-28 19:46:02\",\"id_comment\":107,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-28 03:46:02', 30, '2020-06-28 03:46:02'),
('cd17f7c5-f966-422c-b490-71321222830a', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor&nbsp;<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-12 21:46:31\",\"created_at\":\"2020-06-12 21:46:31\",\"id_comment\":106,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-12 21:46:06\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-12 05:46:32', 1, '2020-06-12 05:46:32'),
('cec53698-bd28-40af-a724-be24a2731e48', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":35,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:37:54\",\"created_at\":\"2020-06-09 10:37:54\",\"id_comment\":103,\"creator\":{\"id\":35,\"name\":\"Yulia Ade Kurniawan\",\"username\":\"yuliadekurnia\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"yuliadekurnia@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:46:32\",\"updated_at\":\"2020-06-02 14:46:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54'),
('d1f0b045-ce9b-469e-beba-07b61b3611c3', 21, 'App\\Notifications\\RatingNotification', 'rating', '7', 1, 'App\\User', 47, '{\"id\":47,\"type\":null,\"data\":\"\",\"read_at\":null}', NULL, '2020-07-24 14:01:50', 48, '2020-07-24 14:01:50'),
('d9baf520-938d-4e2b-a9c6-a98a65cab415', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:50:33\",\"created_at\":\"2020-06-09 17:50:33\",\"id_comment\":104,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-09 11:49:17\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:50:34', 1, '2020-06-09 01:50:34'),
('da3f7bff-d551-49d6-8860-e38cf758ca29', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 1, '{\"id\":1,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', '2020-07-23 09:16:56', '2020-06-05 18:34:10', 1, '2020-07-23 09:16:56'),
('db64a013-8eae-4718-892a-7cfb665eea27', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":1,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:50:33\",\"created_at\":\"2020-06-09 17:50:33\",\"id_comment\":104,\"creator\":{\"id\":1,\"name\":\"lorem\",\"username\":\"loremlorem\",\"phone_number\":\"08982600193\",\"first_name\":\"\",\"last_name\":\"\",\"address\":\"Jalan Raya Ubud\",\"bio\":\"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.\",\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/1\\/profilepicture.jpg\",\"email\":\"loremipsum@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-02-06 14:10:11\",\"updated_at\":\"2020-06-09 11:49:17\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:50:34', 1, '2020-06-09 01:50:34'),
('e899f648-3487-4d99-a235-95ee9ec50e4c', 11, 'App\\Notifications\\CommentNotification', 'comment', '4', 2, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":{\"content\":\"<p><strong>Keterangan<\\/strong><\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":4,\"type_post\":\"2\",\"updated_at\":\"2020-07-06 22:15:31\",\"created_at\":\"2020-07-06 22:15:31\",\"id_comment\":112,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-06-28 17:56:24\",\"lang\":\"id_ID\"}},\"read_at\":null}', '2020-07-19 09:27:26', '2020-07-06 06:15:31', 30, '2020-07-19 09:27:26'),
('e9afa6f8-6daf-44ad-a6d2-4554dc19676c', 11, 'App\\Notifications\\RatingNotification', 'rating', '1', 1, 'App\\User', 1, '{\"id\":1,\"type\":null,\"data\":\"\",\"read_at\":null}', NULL, '2020-06-09 01:42:15', 30, '2020-06-09 01:42:15'),
('ea140a41-a7ad-4497-9569-c33752bff41e', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 30, '{\"id\":30,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<\\/p>\",\"created_by\":33,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:30:36\",\"created_at\":\"2020-06-09 10:30:36\",\"id_comment\":102,\"creator\":{\"id\":33,\"name\":\"Suryadi Slamet Rachman\",\"username\":\"suryadislamet\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"suryadislamet@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:45:05\",\"updated_at\":\"2020-06-02 14:45:05\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:30:36', 33, '2020-06-08 18:30:36'),
('eaede525-6bf4-44bd-8722-5ece5319abbe', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 34, '{\"id\":34,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,<\\/p>\",\"created_by\":30,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 17:52:17\",\"created_at\":\"2020-06-09 17:52:17\",\"id_comment\":105,\"creator\":{\"id\":30,\"name\":\"Laras Tropus\",\"username\":\"larastropus\",\"phone_number\":\"0898234454\",\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":\"http:\\/\\/elcat.localhost\\/storage\\/profile\\/30\\/profilepicture.jpg\",\"email\":\"larastropus@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-05-07 12:08:56\",\"updated_at\":\"2020-05-13 09:06:39\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-09 01:52:17', 30, '2020-06-09 01:52:17'),
('edbf7ec6-18d5-4066-889d-208885b57858', 11, 'App\\Notifications\\AnnouncementNotification', 'announcement', '2', 3, 'App\\User', 30, '{\"id\":30,\"title\":\"Ujian ulang\",\"type\":null,\"data\":{\"id_ann\":2,\"uuid\":\"90bcebd7-5053-40cb-a82a-92ab7af5b814\",\"id_company\":11,\"title\":\"Ujian ulang\",\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\",\"url\":null,\"cover_img\":null,\"created_at\":\"2020-06-06 10:34:10\",\"created_by\":1,\"updated_at\":\"2020-06-06 10:34:10\",\"updated_by\":null},\"read_at\":null}', '2020-06-07 23:17:45', '2020-06-05 18:34:10', 1, '2020-06-07 23:17:45'),
('f202a140-101a-4ac2-a785-bf1a6fdd69e0', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 36, '{\"id\":36,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<\\/p>\",\"created_by\":33,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:30:36\",\"created_at\":\"2020-06-09 10:30:36\",\"id_comment\":102,\"creator\":{\"id\":33,\"name\":\"Suryadi Slamet Rachman\",\"username\":\"suryadislamet\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"suryadislamet@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:45:05\",\"updated_at\":\"2020-06-02 14:45:05\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:30:37', 33, '2020-06-08 18:30:37'),
('f7a7d65f-9eeb-4595-a22f-b6131ee0b325', 11, 'App\\Notifications\\CommentNotification', 'comment', '1', 1, 'App\\User', 33, '{\"id\":33,\"type\":null,\"data\":{\"content\":\"<p>Lorem ipsum dolor sit amet,&nbsp;<\\/p>\",\"created_by\":35,\"id_company\":\"11\",\"id_post\":1,\"type_post\":\"1\",\"updated_at\":\"2020-06-09 10:37:54\",\"created_at\":\"2020-06-09 10:37:54\",\"id_comment\":103,\"creator\":{\"id\":35,\"name\":\"Yulia Ade Kurniawan\",\"username\":\"yuliadekurnia\",\"phone_number\":null,\"first_name\":\"\",\"last_name\":\"\",\"address\":null,\"bio\":null,\"cover_img\":null,\"email\":\"yuliadekurnia@mail.com\",\"email_verified_at\":null,\"active_session\":\"11\",\"active_status\":3,\"created_at\":\"2020-06-02 14:46:32\",\"updated_at\":\"2020-06-02 14:46:32\",\"lang\":\"id_ID\"}},\"read_at\":null}', NULL, '2020-06-08 18:37:54', 35, '2020-06-08 18:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `other_sepeda`
--

CREATE TABLE `other_sepeda` (
  `kode_sepeda` char(7) NOT NULL,
  `nama_sepeda` varchar(200) NOT NULL,
  `merek_sepeda` varchar(200) NOT NULL,
  `jenis_sepeda` varchar(100) NOT NULL,
  `peruntukan` enum('Laki-laki','Perempuan') NOT NULL,
  `jumlah_speed` int(11) NOT NULL,
  `tanggal_launching` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_sepeda`
--

INSERT INTO `other_sepeda` (`kode_sepeda`, `nama_sepeda`, `merek_sepeda`, `jenis_sepeda`, `peruntukan`, `jumlah_speed`, `tanggal_launching`) VALUES
('KS-0987', 'Wimcycle new', 'Wincycle', 'Sepeda Gunung', 'Laki-laki', 6, '2020-08-27'),
('KS-3198', 'Sepeda Satu 1', 'Satu', 'Sepeda Elektrik', 'Laki-laki', 5, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 1,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `id_company`, `id_exam`, `question`, `type`, `score`, `answer`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(1, 11, 2, '<p>Undang-undang yang mengatur manajemen Aparatur Sipil Negara adalah :</p>', 3, 4, '<p>UU Nomor 43 Tahun 1999 jo UU no 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian.<br />\r\nUU Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara.</p>', '2020-02-13 07:02:46', 1, '2020-02-15 20:56:14', 1, NULL, NULL, 0),
(2, 11, 2, 'Mengutamakan keseimbangan antara hak dan kewajiban pegawai ASN adalah yang dimaksud dengan asas :', 3, 1, 'lorem ipsum', '2020-02-13 07:02:46', 1, NULL, NULL, NULL, NULL, 0),
(15, 11, 2, '<p>Manajemen ASN berdasarkan pada asas-asas antara lain adalah :</p>', 1, 1, 'uo5X12eDWKv86707A3C8k4MW15j', '2020-02-14 04:16:12', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(16, 11, 2, '<p>Prinsip ASN sebagai profesi berlandaskan :</p>', 1, 1, 'v527i3TcK31GPR0Ss7G8161Jb47', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(17, 11, 2, '<p>Setiap Pegawai Negeri Sipil diberikan hak sebagai berikut:</p>', 1, 1, '811715O3715Bk3n4FD', '2020-02-14 23:23:26', 1, '2020-02-14 23:23:26', NULL, NULL, NULL, 0),
(18, 11, 2, '<p>Yang tidak termasuk dalam kelompok jabatan pimpinan tinggi adalah</p>', 1, 1, 'r0R018a7155Qpp4z81', '2020-02-14 23:25:27', 1, '2020-02-17 23:39:46', 1, NULL, NULL, 0),
(20, 11, 2, '<p>KASN dalam Undang Undang ASN adalah singkatan dari :</p>', 1, 1, '1185t5pD07130W2P09', '2020-02-14 23:50:34', 1, '2020-02-14 23:50:34', NULL, NULL, NULL, 0),
(21, 11, 2, '<p>Yang termasuk dalam tingkat hukuman disiplin dalam PP no 53 tahun 2010 yaitu :</p>', 1, 1, 'c15mJ91z5731N680nc', '2020-02-14 23:54:30', 1, '2020-02-14 23:54:30', NULL, NULL, NULL, 0),
(22, 11, 2, '<p>Peraturan Pemerintah sebagai turunan undang-undang yang mengatur manajemen Aparatur Sipil Negara adalah :</p>', 1, 1, '5118vi1171w533qk35', '2020-02-14 23:56:43', 1, '2020-02-14 23:56:43', NULL, NULL, NULL, 0),
(23, 11, 2, '<p>Syarat jabatan Pelaksana adalah antara lain :</p>', 1, 1, 'bo75352u18931F63bG', '2020-02-15 00:01:29', 1, '2020-02-15 00:01:29', NULL, NULL, NULL, 0),
(24, 11, 2, '<p>Pengangkatan PNS ke dalam Jabatan Fungsional Keahlian dan Jabatan Fungsional Keterampilan dilakukan melalui pengangkatan pertama, perpindahan dari jabatan lain, penyesuaian/impassing dan ......................... :</p>', 1, 1, '1c9Z15G831tjY5768r', '2020-02-15 00:03:12', 1, '2020-02-15 00:03:12', NULL, NULL, NULL, 0),
(25, 11, 2, '<p>Mutasi PNS dilakukan paling singkat ........ tahun dan paling lama 5 (lima) tahun :</p>', 1, 1, 'E715n58w44I2I501E2', '2020-02-15 00:14:44', 1, '2020-02-15 00:14:44', NULL, NULL, NULL, 0),
(26, 11, 2, '<p>Apa yang di maksud dengan Wawasan Kebangsaan ?</p>', 1, 1, 'r07A5g184z5xN458R1', '2020-02-15 00:15:31', 1, '2020-02-15 00:15:31', NULL, NULL, NULL, 0),
(27, 11, 2, '<p>Mencakup apa saja kah Wawasan Kebangsaan itu, kecuali ?</p>', 1, 1, '5RT818a32Xb1Q7L851', '2020-02-15 01:21:40', 1, '2020-02-15 01:21:40', NULL, NULL, NULL, 0),
(28, 11, 2, '<p>Perwujudan Kepulauan Indonesia sebagai Satu Kesatuan Politik, dalam arti ?</p>', 1, 1, '016U5081Wo8558s70U', '2020-02-15 01:23:05', 1, '2020-02-15 01:23:05', NULL, NULL, NULL, 0),
(29, 11, 2, '<p>Proses penyatuan berbagai kelompok budaya dan sosial ke dalam kesatuan wilayah nasional yang membentuk suatu identitas nasional merupakan arti integrasi secara promosi</p>', 2, 3, '1', '2020-02-15 01:44:17', 1, '2020-02-15 20:50:21', 1, NULL, NULL, 0),
(30, 11, 2, '<p>Apakah yang dimaksud pelanggaran hak asasi manusia?</p>', 3, 10, '<p>Pelanggaran hak asasi manusia merupakan pelanggaran atau pelalaian terhadap kewajiban asasi yang dilakukan oleh seorang atau sekelompok orang kepada orang lain.</p>', '2020-02-15 02:06:37', 1, '2020-06-17 04:16:22', 1, '2020-06-17 04:16:22', 31, 0),
(31, 11, 2, '<p>Bagaimanakah pengelompokan bentuk pelanggaran HAM berdasarkan sifatnya?</p>', 3, 1, '<p>Berdasarkan sifatnya, pelanggaran HAM dapat dibedakan menjadi dua, yaitu pelanggaran HAM berat dan pelanggaran HAM ringan.</p>', '2020-02-15 02:08:10', 1, '2020-02-15 02:08:10', NULL, NULL, NULL, 0),
(32, 11, 2, '<p>Sebutkan beberapa contoh pelanggaran HAM berat!</p>', 3, 1, '<p>Contoh pelanggaran HAM berat, yaitu pembunuhan, penganiayaan, perampokan, perbudakan, penyanderaan, dan sebagainya.</p>', '2020-02-15 02:09:18', 1, '2020-02-15 02:09:18', NULL, NULL, NULL, 0),
(33, 11, 2, '<p>Apakah yang dimaksud pelanggaran HAM dalam konteks negara Indonesia?</p>', 3, 1, '<p>Dalam konteks negara Indonesia, pelanggaran HAM merupakan tindakan pelanggaran kemanusiaan, baik dilakukan oleh individu maupun institusi negara atau institusi lainnya terhadap hak asasi manusia.</p>', '2020-02-15 02:13:34', 1, '2020-06-17 04:19:31', NULL, '2020-06-17 04:19:31', 31, 0),
(34, 11, 2, '<p>Pancasila termasuk dalam pembukaan Undang-Undang Dasar 1945 pada alinea ke&nbsp;tiga</p>', 2, 1, '0', '2020-02-15 20:11:11', 1, '2020-02-15 20:11:11', NULL, NULL, NULL, 0),
(35, 11, 2, '<p>Undang-undang yang mengatur manajemen Aparatur Sipil Negara adalah :</p>', 3, 3, '<p>UU Nomor 43 Tahun 1999 jo UU no 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian.<br />\r\nUU Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara.</p>', '2020-02-15 20:55:12', 1, '2020-02-15 20:55:12', NULL, NULL, NULL, 0),
(36, 11, 3, '<p>Pancasila mengandung nilai materil, nilai vital, dan nilai kerohanian. Merupakan nilai-nilai pancasila menurut .....</p>', 1, 1, '831zQ8d8o71610l5U0', '2020-02-15 21:27:54', 1, '2020-02-15 21:27:54', NULL, NULL, NULL, 0),
(37, 11, 3, '<p>Suasana kebatinan atau cita-cita hukum dasar negara RI terangkum dalam ...</p>', 1, 1, '08J01Z8j7w35j7V851', '2020-02-15 21:33:35', 1, '2020-02-15 21:33:35', NULL, NULL, NULL, 0),
(38, 11, 3, '<p>Makhluk yang dapat menghasilkan kebudayaan, baik material maupun spiritual adalah ...<br />\r\n&nbsp;</p>', 1, 1, 'P19588438F8ou1nPF3', '2020-02-15 23:41:30', 1, '2020-02-15 23:41:30', NULL, NULL, NULL, 0),
(39, 11, 3, '<p>Dibawah ini yang merupakan provinsi-provinsi baru di Indonesia adalah, kecuali ...</p>', 1, 1, '1631281H18Eax8X895', '2020-02-15 23:42:26', 1, '2020-02-15 23:42:26', NULL, NULL, NULL, 0),
(40, 11, 3, '<p>Sistem Pendidikan di Indonesia diataur dalam ...</p>', 1, 1, 'M31548JI1xL886w9A1', '2020-02-15 23:43:26', 1, '2020-02-15 23:43:26', NULL, NULL, NULL, 0),
(41, 11, 3, '<p>Kekuatan pendukung dalam usaha Pertahanan dan Keamanan Negara menurut pasal 30 ayat 2 UUD 1945 adalah :</p>', 1, 1, 'Z86001k9363g018c58', '2020-02-15 23:46:42', 1, '2020-02-15 23:46:42', NULL, NULL, NULL, 0),
(42, 11, 3, '<p>Pernyataan yang menyebutkan bahwa Indonesia adalah negara hukum terdapat pada ...</p>', 1, 1, '19k8x31C582S02k3kK', '2020-02-15 23:47:43', 1, '2020-02-15 23:47:43', NULL, NULL, NULL, 0),
(44, 11, 4, '<p>Contoh Soal Kemampuan Bekerja Sama</p>', 3, 5, '<p>Jawaban Soal Kemampuan Bekerja Sama</p>', '2020-03-05 01:04:50', 1, '2020-06-28 00:50:05', 1, NULL, NULL, 0),
(45, 11, 4, '<p>Lorem ipsum dolor www</p>', 3, 1, '<p>lorem ipsum ipsum</p>', '2020-03-05 01:06:08', 1, '2020-06-28 00:39:17', 1, NULL, NULL, 0),
(46, 14, 8, '<p>Pertanyaan Soal Objektif</p>', 1, 1, '406p91q5fd0171bl38', '2020-03-20 02:49:23', 12, '2020-03-20 02:49:23', NULL, NULL, NULL, 0),
(47, 14, 8, '<p>Soal tipe benar salah</p>', 2, 1, '1', '2020-03-20 02:49:50', 12, '2020-03-20 02:49:50', NULL, NULL, NULL, 0),
(48, 14, 8, '<p>Pertanyaan soal esai</p>', 3, 5, '<p>jawaban soal esai</p>', '2020-03-20 02:50:29', 12, '2020-03-20 02:50:29', NULL, NULL, NULL, 0),
(49, 11, 4, '<p>lorem ipsum</p>', 1, 1, '3Q9Vq6503m193350wj', '2020-06-28 00:31:23', 1, '2020-06-28 00:46:57', NULL, '2020-06-28 00:46:57', 1, 1),
(50, 11, 4, '<p>benar salah</p>', 2, 1, '1', '2020-06-28 00:31:41', 1, '2020-06-28 00:45:23', 1, '2020-06-28 00:45:23', 1, 1),
(51, 11, 4, '<p>lorem ipsum dolor amet</p>', 3, 5, '<p>lorem lorem</p>', '2020-06-28 00:32:10', 1, '2020-06-28 00:51:07', NULL, '2020-06-28 00:51:07', 1, 1),
(52, 11, 4, '<p>wwwdwad www</p>', 3, 5, '<p>dwadw</p>', '2020-06-28 00:40:32', 1, '2020-06-28 00:45:05', 1, '2020-06-28 00:45:05', 1, 1),
(53, 11, 10, '<p>Wilayah perairan laut Indonesia dapat dibedakan sebagai berikut, kecuali .....</p>', 1, 1, 'S357359853U1wdU73Q', '2020-06-30 20:39:45', 1, '2020-06-30 20:39:45', NULL, NULL, NULL, 0),
(54, 11, 10, '<p>Urutan kedudukan (status) Wawasan Kebangsaan yang tepat adalah</p>', 1, 1, '1o5R59K73358si8137', '2020-06-30 20:41:34', 1, '2020-06-30 20:41:34', NULL, NULL, NULL, 0),
(55, 11, 10, '<p>Cara pandang bangsa Indonesia tentang diri dan lingkungannya berdasarkan Pancasila dan UUD 1945 serta sesuai dengan geografi wilayah &nbsp;nusantara yang menjiwai kehidupan bangsa dalam mencapai tujuan dan cita-cita nasional merupakan arti dari....</p>', 1, 1, '59495h7881Pz8h3Z52', '2020-06-30 20:44:17', 1, '2020-06-30 20:45:18', 1, NULL, NULL, 0),
(56, 11, 10, '<p>Urutan pernyataan di bawah ini yang benar &nbsp;sesuai &nbsp;kaidah perencana dari yang bersifat &nbsp;lebih luas ke &nbsp;lebih sempit adalah :</p>', 1, 1, '77558v9Ra12623N0bF', '2020-06-30 20:45:59', 1, '2020-06-30 20:45:59', NULL, NULL, NULL, 0),
(57, 11, 10, '<p>Landasan Konstitusional Wawasan Kebangsaan terdapat pada....</p>', 1, 1, '758a27v53Q0KW9M16t', '2020-06-30 20:46:35', 1, '2020-06-30 20:46:35', NULL, NULL, NULL, 0),
(58, 11, 9, '<p>Wilayah perairan laut Indonesia dapat dibedakan sebagai berikut, kecuali .....</p>', 1, 1, 'd4513w550Fb4g9a521', '2020-07-23 13:55:16', 1, '2020-07-23 13:55:16', NULL, NULL, NULL, 0),
(59, 11, 9, '<p>Urutan kedudukan (status) Wawasan Kebangsaan yang tepat adalah</p>', 1, 1, 'V95P71e5351v2hy15L', '2020-07-23 13:55:49', 1, '2020-07-23 13:55:49', NULL, NULL, NULL, 0),
(60, 11, 9, '<p>Cara pandang bangsa Indonesia tentang diri dan lingkungannya berdasarkan Pancasila dan UUD 1945 serta sesuai dengan geografi wilayah &nbsp;nusantara yang menjiwai kehidupan bangsa dalam mencapai tujuan dan cita-cita nasional merupakan arti dari....</p>', 1, 1, '11n5552ml9d025LH55', '2020-07-23 13:56:17', 1, '2020-07-23 13:56:17', NULL, NULL, NULL, 0),
(61, 11, 9, '<p>Urutan pernyataan di bawah ini yang benar &nbsp;sesuai &nbsp;kaidah perencana dari yang bersifat &nbsp;lebih luas ke &nbsp;lebih sempit adalah :</p>', 1, 1, '7S20515150917ZM5Q8', '2020-07-23 13:56:59', 1, '2020-07-23 13:56:59', NULL, NULL, NULL, 0),
(62, 11, 9, '<p>Apa itu hak asasi manusia ?</p>', 3, 5, '<p>hak asasi manusia adalah&nbsp;hak dasar yang dimiliki oleh manusia sejak lahir.</p>', '2020-07-23 13:58:48', 1, '2020-07-23 13:58:48', NULL, NULL, NULL, 0),
(63, 21, 11, '<p>Undang-undang yang mengatur manajemen Aparatur Sipil Negara adalah :<br />\r\n&nbsp;</p>', 1, 1, '1H1j74489R959RaI55', '2020-07-24 14:05:14', 47, '2020-07-24 14:05:14', NULL, NULL, NULL, 0),
(64, 21, 11, '<p>Aparatur Sipil Negara adalah profesi bagi .............. dan ............... yang bekerja pada instansi pemerintah :</p>', 1, 1, '1L51xk9C5w59d59I51', '2020-07-24 14:05:59', 47, '2020-07-24 14:05:59', NULL, NULL, NULL, 0),
(65, 21, 11, '<p>Manajemen ASN adalah pengelolaan ASN untuk menghasilkan pegawai ASN yang profesional, memiliki nilai dasar, etika profesi, bebas dari intervensi politik, bersih dari praktek :</p>', 1, 1, 'U269v955Lq12555M99', '2020-07-24 14:06:33', 47, '2020-07-24 14:06:33', NULL, NULL, NULL, 0),
(66, 21, 11, '<p>Manajemen ASN berdasarkan pada asas-asas antara lain :</p>', 1, 1, 'Zae5499155MJ9J59d0', '2020-07-24 14:07:05', 47, '2020-07-24 14:07:05', NULL, NULL, NULL, 0),
(67, 21, 11, '<p>Apa yang anda ketahui tentang hak asasi manusia ?</p>', 3, 10, '<p>hak asasi manusia adalah&nbsp;hak dasar yang dimiliki oleh manusia sejak lahir</p>', '2020-07-24 14:08:00', 47, '2020-07-24 14:08:00', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions_option`
--

CREATE TABLE `questions_option` (
  `id_opsion` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `optiontext` text NOT NULL,
  `randkeys` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_option`
--

INSERT INTO `questions_option` (`id_opsion`, `id_company`, `id_question`, `optiontext`, `randkeys`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_deleted`) VALUES
(51, 11, 15, 'Proporsionalitas', 'uo5X12eDWKv86707A3C8k4MW15j', '2020-02-14 04:16:12', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(52, 11, 15, 'Kemerdekaan', '6f21o1IC1z5308aQ3tu8N58434U', '2020-02-14 04:16:13', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(53, 11, 15, 'Keseimbangan', 'zf1quBEm24mAAvz53182s8e5SC6', '2020-02-14 04:16:13', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(54, 11, 15, 'Jawaban a, b dan c salah', 'K6kvO4S8yQW3pT1135R2DmTl85l', '2020-02-14 04:16:13', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(55, 11, 15, '-', '231qD4RjnH3H765M585HJ418ViL', '2020-02-14 04:16:13', 1, '2020-02-25 06:20:17', 1, NULL, NULL, 0),
(56, 11, 16, 'Nilai dasar', 'Bs0u3L177anx986qR3510i971yY', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(57, 11, 16, 'Kualifikasi akademik', 'Z6JyE8711doN310L5u7Q81M3077', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(58, 11, 16, 'Jaminan perlindungan hukum dalam melaksanakan tugas', '15WE711L38377wVW1MYELEG0862', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(59, 11, 16, 'Semua jawaban tersebut benar', 'v527i3TcK31GPR0Ss7G8161Jb47', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(60, 11, 16, '-', '17O3IkHi58PVW1R7pXY710ns4h8', '2020-02-14 19:27:19', 1, '2020-02-14 19:27:19', NULL, NULL, NULL, 0),
(61, 11, 17, 'gaji, tunjangan, dan fasilitas', '70518oiM54711jaFv3', '2020-02-14 23:23:26', 1, '2020-02-14 23:23:26', NULL, NULL, NULL, 0),
(62, 11, 17, 'cuti', 'l31w1X78f171Ck4455', '2020-02-14 23:23:26', 1, '2020-02-14 23:23:26', NULL, NULL, NULL, 0),
(63, 11, 17, 'jaminan pensiun dan hari tua', '242R8631911G53757v', '2020-02-14 23:23:26', 1, '2020-02-14 23:23:26', NULL, NULL, NULL, 0),
(64, 11, 17, 'semua benar', '811715O3715Bk3n4FD', '2020-02-14 23:23:26', 1, '2020-02-14 23:23:26', NULL, NULL, NULL, 0),
(65, 11, 18, 'jabatan pimpinan tinggi utama', 'r0R018a7155Qpp4z81', '2020-02-14 23:25:27', 1, '2020-02-14 23:25:27', NULL, NULL, NULL, 0),
(66, 11, 18, 'jabatan pimpinan tinggi madya', 'X11A5I1X154780i8uo', '2020-02-14 23:25:27', 1, '2020-02-14 23:25:27', NULL, NULL, NULL, 0),
(67, 11, 18, 'jabatan pimpinan tinggi pratama.', '51188024w5Xlh8gk71', '2020-02-14 23:25:28', 1, '2020-02-14 23:25:28', NULL, NULL, NULL, 0),
(68, 11, 18, 'jabatan pimpinan tinggi muda', 'Na15nJ7u84a151830J', '2020-02-14 23:25:28', 1, '2020-02-14 23:25:28', NULL, NULL, NULL, 0),
(73, 11, 20, 'Komite Aparatur Sipil Negara', '5B13TV8001750s0Czc', '2020-02-14 23:50:34', 1, '2020-02-14 23:50:34', NULL, NULL, NULL, 0),
(74, 11, 20, 'Komisi Aparatur Sipil Negara', '1185t5pD07130W2P09', '2020-02-14 23:50:34', 1, '2020-02-14 23:50:34', NULL, NULL, NULL, 0),
(75, 11, 20, 'Komisi Aparat Sipil Negara', '10218f0Ht2f71535G0', '2020-02-14 23:50:34', 1, '2020-02-14 23:50:34', NULL, NULL, NULL, 0),
(76, 11, 20, 'Semua salah', 'f5370U1g06E31W08Z5', '2020-02-14 23:50:34', 1, '2020-02-14 23:50:34', NULL, NULL, NULL, 0),
(77, 11, 21, 'hukuman disiplin berat', 'c15mJ91z5731N680nc', '2020-02-14 23:54:30', 1, '2020-02-14 23:54:30', NULL, NULL, NULL, 0),
(78, 11, 21, 'hukuman disiplin pertama', 'm51781e85k139j1oh6', '2020-02-14 23:54:30', 1, '2020-02-14 23:54:30', NULL, NULL, NULL, 0),
(79, 11, 21, 'hukuman disiplin luar biasa', '658j171B395qx621Y7', '2020-02-14 23:54:30', 1, '2020-02-14 23:54:30', NULL, NULL, NULL, 0),
(80, 11, 21, 'hukuman disiplin awal', '3z58qx315Lx61917Rp', '2020-02-14 23:54:30', 1, '2020-02-14 23:54:30', NULL, NULL, NULL, 0),
(81, 11, 22, 'PP No. 5 Tahun 2017', 'r05T136c3785GR1815', '2020-02-14 23:56:44', 1, '2020-02-14 23:56:44', NULL, NULL, NULL, 0),
(82, 11, 22, 'PP No. 7 Tahun 2017', '11Q5173PX38L5O1759', '2020-02-14 23:56:44', 1, '2020-02-14 23:56:44', NULL, NULL, NULL, 0),
(83, 11, 22, 'PP No. 9 Tahun 2017', '175F5Hn2135823h211', '2020-02-14 23:56:44', 1, '2020-02-14 23:56:44', NULL, NULL, NULL, 0),
(84, 11, 22, 'PP No. 11 Tahun 2017', '5118vi1171w533qk35', '2020-02-14 23:56:44', 1, '2020-02-14 23:56:44', NULL, NULL, NULL, 0),
(85, 11, 23, 'memiliki integritas dan moralitas baik', '6517h8gA591wZ033R7', '2020-02-15 00:01:29', 1, '2020-02-15 00:01:29', NULL, NULL, NULL, 0),
(86, 11, 23, 'berstatus ASN', 'M5o53F176816139Q11', '2020-02-15 00:01:29', 1, '2020-02-15 00:01:29', NULL, NULL, NULL, 0),
(87, 11, 23, 'sehat jasmani dan rohani', 'T7dzR375151u63h982', '2020-02-15 00:01:29', 1, '2020-02-15 00:01:29', NULL, NULL, NULL, 0),
(88, 11, 23, 'jawaban a dan c benar', 'bo75352u18931F63bG', '2020-02-15 00:01:29', 1, '2020-02-15 00:01:29', NULL, NULL, NULL, 0),
(89, 11, 24, 'mutasi', 'FH0988175643f3yw15', '2020-02-15 00:03:12', 1, '2020-02-15 00:03:12', NULL, NULL, NULL, 0),
(90, 11, 24, 'promosi', '1c9Z15G831tjY5768r', '2020-02-15 00:03:12', 1, '2020-02-15 00:03:12', NULL, NULL, NULL, 0),
(91, 11, 24, 'jawaban a dan b benar', 'E519Tj3G827168J57K', '2020-02-15 00:03:12', 1, '2020-02-15 00:03:12', NULL, NULL, NULL, 0),
(92, 11, 24, 'semua salah', '568i3513Z8g39O71a5', '2020-02-15 00:03:12', 1, '2020-02-15 00:03:12', NULL, NULL, NULL, 0),
(93, 11, 25, '1 (satu) tahun', 'In051N7Plm5540418w', '2020-02-15 00:14:45', 1, '2020-02-15 00:14:45', NULL, NULL, NULL, 0),
(94, 11, 25, '1 (satu) tahun, 6 (enam) bulan', 'H554817j5Q11l8W04N', '2020-02-15 00:14:45', 1, '2020-02-15 00:14:45', NULL, NULL, NULL, 0),
(95, 11, 25, '2 (dua) tahun', 'E715n58w44I2I501E2', '2020-02-15 00:14:45', 1, '2020-02-15 00:14:45', NULL, NULL, NULL, 0),
(96, 11, 25, '2 (dua) tahun, 6 (enam) bulan', '30ts7Y1D57p4154857', '2020-02-15 00:14:45', 1, '2020-02-15 00:14:45', NULL, NULL, NULL, 0),
(97, 11, 26, 'Cara pandang dan sikap bangsa Indonesia diri dan lingkungannya', 'r07A5g184z5xN458R1', '2020-02-15 00:15:31', 1, '2020-02-15 00:15:31', NULL, NULL, NULL, 0),
(98, 11, 26, 'Satu kesatuan wilayah, wadah, ruang hidup, dan kesatuan matra seluruh bangsa', '517814FL115c84P5u5', '2020-02-15 00:15:31', 1, '2020-02-15 00:15:31', NULL, NULL, NULL, 0),
(99, 11, 26, 'Satu kesatuan bangsa yang bulat dalam arti yang seluas-luasnya', '24q8557g8314c1j5YK', '2020-02-15 00:15:31', 1, '2020-02-15 00:15:31', NULL, NULL, NULL, 0),
(100, 11, 26, 'Satu kesatuan politik yang diselenggarakan berdasarkan Pancasila dan UUD 1945', '5581R5W7m48i137d48', '2020-02-15 00:15:31', 1, '2020-02-15 00:15:31', NULL, NULL, NULL, 0),
(101, 11, 27, 'Perwujudan Kepulauan Nusantara sebagai Satu Kesatuan Politik', 'knz5L24a1884701835', '2020-02-15 01:21:40', 1, '2020-02-15 01:21:40', NULL, NULL, NULL, 0),
(102, 11, 27, 'Mengutamakan persatuan dan kesatuan wilayah dalam penyelenggaraan kehidupan Bermasyarakat, berbangsa, bernegara', '5RT818a32Xb1Q7L851', '2020-02-15 01:21:40', 1, '2020-02-15 01:21:40', NULL, NULL, NULL, 0),
(103, 11, 27, 'Perwujudan Kepulauan Nusantara sebagai satu Kesatuan Ekonomi', '61b78M8Lt2125853jy', '2020-02-15 01:21:40', 1, '2020-02-15 01:21:40', NULL, NULL, NULL, 0),
(104, 11, 27, 'Perwujudan Kepulauan Nusantara sebagai Satu Kesatuan Sosial dan Budaya', '2737521158f3PdB885', '2020-02-15 01:21:40', 1, '2020-02-15 01:21:40', NULL, NULL, NULL, 0),
(105, 11, 28, 'Bahwa kebulatan wilayah nasional dengan segala isi dan kekayaannya merupakan satu Milik bersama bangsa', '016U5081Wo8558s70U', '2020-02-15 01:23:05', 1, '2020-02-15 01:23:05', NULL, NULL, NULL, 0),
(106, 11, 28, 'Tingkat perkembangan ekonomi harus serasi dan seimbang di seluruh daerah', 'm58015b75JNR0131s8', '2020-02-15 01:23:05', 1, '2020-02-15 01:23:05', NULL, NULL, NULL, 0),
(107, 11, 28, 'Bahwa kebulatan wilayah nasional dengan segala isi dan kekayaannya merupakan satu Kesatuan wilayah, wadah, ruang hidup', 'OM8HL5J01871qi5025', '2020-02-15 01:23:05', 1, '2020-02-15 01:23:05', NULL, NULL, NULL, 0),
(108, 11, 28, 'Kehidupan perekonomian di seluruh wilayah Nusantara', '31Vp178e80M50L5xV5', '2020-02-15 01:23:05', 1, '2020-02-15 01:23:05', NULL, NULL, NULL, 0),
(109, 11, 36, 'Ir Soekarno', '831zQ8d8o71610l5U0', '2020-02-15 21:27:54', 1, '2020-02-15 21:27:54', NULL, NULL, NULL, 0),
(110, 11, 36, 'Prof Notonagora', 'k881106Je115TX2853', '2020-02-15 21:27:54', 1, '2020-02-15 21:27:54', NULL, NULL, NULL, 0),
(111, 11, 36, 'Mohammad Yamin', '038dbk1d1i2n1658w8', '2020-02-15 21:27:54', 1, '2020-02-15 21:27:54', NULL, NULL, NULL, 0),
(112, 11, 36, 'Prof. Dr. Soepomo', '1TF1613860538fhOr8', '2020-02-15 21:27:54', 1, '2020-02-15 21:27:54', NULL, NULL, NULL, 0),
(113, 11, 37, 'Empat pokok pikiran Pembukaan UUD 1945', '08J01Z8j7w35j7V851', '2020-02-15 21:33:36', 1, '2020-02-15 21:33:36', NULL, NULL, NULL, 0),
(114, 11, 37, 'Berbagai konvensi dan jurisprudensi yang berlaku', 'q8115S8b3U8it71C50', '2020-02-15 21:33:36', 1, '2020-02-15 21:33:36', NULL, NULL, NULL, 0),
(115, 11, 37, 'Pidato kenegaraan Presiden menjelang 17 Agustus', 'BJm1o3858R1Q702G58', '2020-02-15 21:33:36', 1, '2020-02-15 21:33:36', NULL, NULL, NULL, 0),
(116, 11, 37, 'Ketetapan dan Keputusan MPR/MPRS', '3715841830BV5Ep0L8', '2020-02-15 21:33:36', 1, '2020-02-15 21:33:36', NULL, NULL, NULL, 0),
(117, 11, 38, 'Hewan', '80y885o451a1i93s8I', '2020-02-15 23:41:30', 1, '2020-02-15 23:41:30', NULL, NULL, NULL, 0),
(118, 11, 38, 'Tumbuhan', '8K1uD9455q883sO811', '2020-02-15 23:41:30', 1, '2020-02-15 23:41:30', NULL, NULL, NULL, 0),
(119, 11, 38, 'Manusia dan Hewan', 'a289FQ3881q25ks184', '2020-02-15 23:41:30', 1, '2020-02-15 23:41:30', NULL, NULL, NULL, 0),
(120, 11, 38, 'Manusia', 'P19588438F8ou1nPF3', '2020-02-15 23:41:30', 1, '2020-02-15 23:41:30', NULL, NULL, NULL, 0),
(121, 11, 39, 'Papua Barat dan Minahasa', '0581r8jWU5S1898138', '2020-02-15 23:42:26', 1, '2020-02-15 23:42:26', NULL, NULL, NULL, 0),
(122, 11, 39, 'Sulawesi Tenggara dan Irian Jaya Barat', '1631281H18Eax8X895', '2020-02-15 23:42:26', 1, '2020-02-15 23:42:26', NULL, NULL, NULL, 0),
(123, 11, 39, 'Gorontalo dan Minahasa', '5813T8t318e129cK8n', '2020-02-15 23:42:26', 1, '2020-02-15 23:42:26', NULL, NULL, NULL, 0),
(124, 11, 39, 'Maluku Utara dan Gorontalo', '81339J91881s583HbY', '2020-02-15 23:42:26', 1, '2020-02-15 23:42:26', NULL, NULL, NULL, 0),
(125, 11, 40, 'UU Nomor 31 Tahun 2004', '8l53X1D03T8P469581', '2020-02-15 23:43:26', 1, '2020-02-15 23:43:26', NULL, NULL, NULL, 0),
(126, 11, 40, 'UU Nomor 20 Tahun 2003', 'M31548JI1xL886w9A1', '2020-02-15 23:43:26', 1, '2020-02-15 23:43:26', NULL, NULL, NULL, 0),
(127, 11, 40, 'UU Nomor 17 Tahun 1999', '589c8Q32h8841a26N1', '2020-02-15 23:43:26', 1, '2020-02-15 23:43:26', NULL, NULL, NULL, 0),
(128, 11, 40, 'UU Nomor 2 Tahun 1999', '4K14831E569F838Ag5', '2020-02-15 23:43:26', 1, '2020-02-15 23:43:26', NULL, NULL, NULL, 0),
(129, 11, 41, 'POLRI dan TNI', 'Z86001k9363g018c58', '2020-02-15 23:46:42', 1, '2020-02-15 23:46:42', NULL, NULL, NULL, 0),
(130, 11, 41, 'Pemerintah', '4x19658C0y108G13xx', '2020-02-15 23:46:42', 1, '2020-02-15 23:46:42', NULL, NULL, NULL, 0),
(131, 11, 41, 'Rakyat', '35n0y880Z2116Ke922', '2020-02-15 23:46:42', 1, '2020-02-15 23:46:42', NULL, NULL, NULL, 0),
(132, 11, 41, 'POLRI', 'k98365c1110gw08Eq3', '2020-02-15 23:46:42', 1, '2020-02-15 23:46:42', NULL, NULL, NULL, 0),
(133, 11, 42, 'Pasal II aturan peralihan UUD 1945', '1ee3z8H13201B9V085', '2020-02-15 23:47:43', 1, '2020-02-15 23:47:43', NULL, NULL, NULL, 0),
(134, 11, 42, 'Pembukaan UUD 1945', '1a11N9Q35V53D83802', '2020-02-15 23:47:43', 1, '2020-02-15 23:47:43', NULL, NULL, NULL, 0),
(135, 11, 42, 'Batang tubuh UUD 1945', '19k8x31C582S02k3kK', '2020-02-15 23:47:43', 1, '2020-02-15 23:47:43', NULL, NULL, NULL, 0),
(136, 11, 42, 'Penjelasaan UUD 1945', '1u50d9B8Uc333e18s2', '2020-02-15 23:47:43', 1, '2020-02-15 23:47:43', NULL, NULL, NULL, 0),
(137, 14, 46, 'Pilihan 1', '406p91q5fd0171bl38', '2020-03-20 02:49:23', 12, '2020-03-20 02:49:23', NULL, NULL, NULL, 0),
(138, 14, 46, 'Pilihan 2', 'c11932W058b77G411a', '2020-03-20 02:49:23', 12, '2020-03-20 02:49:23', NULL, NULL, NULL, 0),
(139, 14, 46, 'Pilihan 3', '0Q1453E29V8H171JWv', '2020-03-20 02:49:23', 12, '2020-03-20 02:49:23', NULL, NULL, NULL, 0),
(140, 14, 46, '-', '5Bg118t3lms970O314', '2020-03-20 02:49:23', 12, '2020-03-20 02:49:23', NULL, NULL, NULL, 0),
(141, 11, 49, '1', '3Q9Vq6503m193350wj', '2020-06-28 00:31:23', 1, '2020-06-28 00:31:23', NULL, NULL, NULL, 0),
(142, 11, 49, '2', 'J13d633PP59391m02C', '2020-06-28 00:31:23', 1, '2020-06-28 00:31:23', NULL, NULL, NULL, 0),
(143, 11, 49, '3', '9301F3213j939V356P', '2020-06-28 00:31:23', 1, '2020-06-28 00:31:23', NULL, NULL, NULL, 0),
(144, 11, 49, '4', '3935n60tkwd933R1N3', '2020-06-28 00:31:23', 1, '2020-06-28 00:31:23', NULL, NULL, NULL, 0),
(145, 11, 53, 'Zona Laut Teritorial', '51839J59ouR5330PG7', '2020-06-30 20:39:45', 1, '2020-06-30 20:39:45', NULL, NULL, NULL, 0),
(146, 11, 53, 'Zona Landas Kontinen', 'sQ56Kv3187e5935E13', '2020-06-30 20:39:45', 1, '2020-06-30 20:39:45', NULL, NULL, NULL, 0),
(147, 11, 53, 'Zona Ekonomi Ekslusif', 'U353532NOv179387M5', '2020-06-30 20:39:45', 1, '2020-06-30 20:39:45', NULL, NULL, NULL, 0),
(148, 11, 53, 'Zona Laut Periferal', 'S357359853U1wdU73Q', '2020-06-30 20:39:45', 1, '2020-06-30 20:39:45', NULL, NULL, NULL, 0),
(149, 11, 54, 'Ketahanan nasional, Politik dan strategi nasional, Wawasan nusantara,Pancasila, UUD 1945', '83iUa578J3q590N1u5', '2020-06-30 20:41:34', 1, '2020-06-30 20:41:34', NULL, NULL, NULL, 0),
(150, 11, 54, 'UUD 1945, Ketahanan nasional, Wawasan nusantara, Pancasila, Politikdan strategi nasional', 'cI33OB57155p1898n5', '2020-06-30 20:41:34', 1, '2020-06-30 20:41:34', NULL, NULL, NULL, 0),
(151, 11, 54, 'Wawasan nusantara,Ketahanan nasional, Politik dan strategi nasional, UUD 1945, Pancasila', '0924aR885x1357R735', '2020-06-30 20:41:34', 1, '2020-06-30 20:41:34', NULL, NULL, NULL, 0),
(152, 11, 54, 'Pancasila, UUD 1945, Wawasan nusantara, Ketahanan nasional, Politik dan strategi nasional', '1o5R59K73358si8137', '2020-06-30 20:41:34', 1, '2020-06-30 20:41:34', NULL, NULL, NULL, 0),
(153, 11, 55, 'Kawasan nusantara', '5NN993lL850750Zu14', '2020-06-30 20:44:17', 1, '2020-06-30 20:45:18', 1, NULL, NULL, 0),
(154, 11, 55, 'Wawasan nasional', '99Td451I53Q51lfX78', '2020-06-30 20:44:17', 1, '2020-06-30 20:45:18', 1, NULL, NULL, 0),
(155, 11, 55, 'Wawasan nusantara', '59495h7881Pz8h3Z52', '2020-06-30 20:44:17', 1, '2020-06-30 20:45:18', 1, NULL, NULL, 0),
(156, 11, 55, 'Wawasan bangsa', '5715393849CWG8EtC5', '2020-06-30 20:44:17', 1, '2020-06-30 20:45:18', 1, NULL, NULL, 0),
(157, 11, 56, 'Visi-misi-tujuan-sasaran-arah kebijakan-program-kegiatan.', '77558v9Ra12623N0bF', '2020-06-30 20:45:59', 1, '2020-06-30 20:45:59', NULL, NULL, NULL, 0),
(158, 11, 56, 'Misi-visi-tujuan-arah kebijakan-sasaran-program-arah kegiatan.', '82ia31675MU7te9517', '2020-06-30 20:45:59', 1, '2020-06-30 20:45:59', NULL, NULL, NULL, 0),
(159, 11, 56, 'Visi-misi-sasaran-tujuan-arah kebijakan-program-kegiatan.', '857r3736Q2nFq5X912', '2020-06-30 20:45:59', 1, '2020-06-30 20:45:59', NULL, NULL, NULL, 0),
(160, 11, 56, 'Visi-misi-tujuan-sasaran-arah kebijakan-kegiatan-program.', 'idaL6256531X37879W', '2020-06-30 20:45:59', 1, '2020-06-30 20:45:59', NULL, NULL, NULL, 0),
(161, 11, 57, 'Pancasila', '4z70tf71b9508635Fp', '2020-06-30 20:46:35', 1, '2020-06-30 20:46:35', NULL, NULL, NULL, 0),
(162, 11, 57, 'Undang Undang', '0h73A5513dlE8796f1', '2020-06-30 20:46:35', 1, '2020-06-30 20:46:35', NULL, NULL, NULL, 0),
(163, 11, 57, 'UUD 1945', '758a27v53Q0KW9M16t', '2020-06-30 20:46:35', 1, '2020-06-30 20:46:35', NULL, NULL, NULL, 0),
(164, 11, 57, 'Peraturan Presiden', 'x805T7937561W3G53v', '2020-06-30 20:46:35', 1, '2020-06-30 20:46:35', NULL, NULL, NULL, 0),
(165, 11, 58, 'Zona Laut Teritorial', '154k511pYE525E049t', '2020-07-23 13:55:17', 1, '2020-07-23 13:55:17', NULL, NULL, NULL, 0),
(166, 11, 58, 'Zona Landas Kontinen', '35152Z155l4194mAi7', '2020-07-23 13:55:17', 1, '2020-07-23 13:55:17', NULL, NULL, NULL, 0),
(167, 11, 58, 'Zona Ekonomi Ekslusif', '4154kl52Ur8H5591J2', '2020-07-23 13:55:17', 1, '2020-07-23 13:55:17', NULL, NULL, NULL, 0),
(168, 11, 58, 'Zona Laut Periferal', 'd4513w550Fb4g9a521', '2020-07-23 13:55:17', 1, '2020-07-23 13:55:17', NULL, NULL, NULL, 0),
(169, 11, 59, 'Ketahanan nasional, Politik dan strategi nasional, Wawasan nusantara,Pancasila, UUD 1945', 'IV9170hB2Q5155T1T5', '2020-07-23 13:55:49', 1, '2020-07-23 13:55:49', NULL, NULL, NULL, 0),
(170, 11, 59, 'UUD 1945, Ketahanan nasional, Wawasan nusantara, Pancasila, Politikdan strategi nasional', '1ym51217OE9p5l551w', '2020-07-23 13:55:49', 1, '2020-07-23 13:55:49', NULL, NULL, NULL, 0),
(171, 11, 59, 'Wawasan nusantara,Ketahanan nasional, Politik dan strategi nasional, UUD 1945, Pancasila', 'V1a5152NA75B1295BI', '2020-07-23 13:55:49', 1, '2020-07-23 13:55:49', NULL, NULL, NULL, 0),
(172, 11, 59, 'Pancasila, UUD 1945, Wawasan nusantara, Ketahanan nasional, Politik dan strategi nasional', 'V95P71e5351v2hy15L', '2020-07-23 13:55:49', 1, '2020-07-23 13:55:49', NULL, NULL, NULL, 0),
(173, 11, 60, 'Kawasan nusantara', '05055725TC15V591R3', '2020-07-23 13:56:17', 1, '2020-07-23 13:56:17', NULL, NULL, NULL, 0),
(174, 11, 60, 'Wawasan nasional', '525BmDEH551109A15N', '2020-07-23 13:56:17', 1, '2020-07-23 13:56:17', NULL, NULL, NULL, 0),
(175, 11, 60, 'Wawasan nusantara', '11n5552ml9d025LH55', '2020-07-23 13:56:17', 1, '2020-07-23 13:56:17', NULL, NULL, NULL, 0),
(176, 11, 60, 'Wawasan bangsa', 'CB501B55i9jH5F1253', '2020-07-23 13:56:17', 1, '2020-07-23 13:56:17', NULL, NULL, NULL, 0),
(177, 11, 61, 'Visi-misi-tujuan-sasaran-arah kebijakan-program-kegiatan.', '7S20515150917ZM5Q8', '2020-07-23 13:56:59', 1, '2020-07-23 13:56:59', NULL, NULL, NULL, 0),
(178, 11, 61, 'Misi-visi-tujuan-arah kebijakan-sasaran-program-arah kegiatan.', 'ECcZ155975wk7E1152', '2020-07-23 13:56:59', 1, '2020-07-23 13:56:59', NULL, NULL, NULL, 0),
(179, 11, 61, 'Visi-misi-sasaran-tujuan-arah kebijakan-program-kegiatan.', 'FSy955175AO21725s7', '2020-07-23 13:56:59', 1, '2020-07-23 13:56:59', NULL, NULL, NULL, 0),
(180, 11, 61, 'Visi-misi-tujuan-sasaran-arah kebijakan-kegiatan-program.', '90172553311r5Yb7k5', '2020-07-23 13:56:59', 1, '2020-07-23 13:56:59', NULL, NULL, NULL, 0),
(181, 21, 63, 'UU No. 6 Tahun 2014', 'yFV5Va4m7097945591', '2020-07-24 14:05:14', 47, '2020-07-24 14:05:14', NULL, NULL, NULL, 0),
(182, 21, 63, 'UU No. 5 Tahun 2014', '1H1j74489R959RaI55', '2020-07-24 14:05:14', 47, '2020-07-24 14:05:14', NULL, NULL, NULL, 0),
(183, 21, 63, 'UU No. 4 Tahun 2014', 'wp7z54W91459WF9255', '2020-07-24 14:05:14', 47, '2020-07-24 14:05:14', NULL, NULL, NULL, 0),
(184, 21, 63, 'UU No. 5 Tahun 2013', 'rFDb991M459Q54537G', '2020-07-24 14:05:14', 47, '2020-07-24 14:05:14', NULL, NULL, NULL, 0),
(185, 21, 64, 'Pegawai negeri dan pegawai pemerintah dengan perjanjian kerja', '5Rf55fm15G9EM95190', '2020-07-24 14:05:59', 47, '2020-07-24 14:05:59', NULL, NULL, NULL, 0),
(186, 21, 64, 'Pegawai negeri sipil dan pegawai pemerintah dengan perjanjian kerja', '1L51xk9C5w59d59I51', '2020-07-24 14:05:59', 47, '2020-07-24 14:05:59', NULL, NULL, NULL, 0),
(187, 21, 64, 'Pegawai negeri sipil dan pegawai pemerintah tidak tetap', 'Ot5XsH55x55299H119', '2020-07-24 14:05:59', 47, '2020-07-24 14:05:59', NULL, NULL, NULL, 0),
(188, 21, 64, 'Pegawai negeri dan pegawai pemerintah tidak tetap', '551d19a3995V9L0z55', '2020-07-24 14:05:59', 47, '2020-07-24 14:05:59', NULL, NULL, NULL, 0),
(189, 21, 65, 'Monopoli', '9l9u15J9O595Y5055y', '2020-07-24 14:06:33', 47, '2020-07-24 14:06:33', NULL, NULL, NULL, 0),
(190, 21, 65, 'Persekongkolan dengan pihak asing', 'k5155q97d91499s55E', '2020-07-24 14:06:33', 47, '2020-07-24 14:06:33', NULL, NULL, NULL, 0),
(191, 21, 65, 'Korupsi, kolusi dan nepotisme', 'U269v955Lq12555M99', '2020-07-24 14:06:33', 47, '2020-07-24 14:06:33', NULL, NULL, NULL, 0),
(192, 21, 65, 'Jawaban a, b, dan c  salah', '5UV59531bn55099YC9', '2020-07-24 14:06:33', 47, '2020-07-24 14:06:33', NULL, NULL, NULL, 0),
(193, 21, 66, 'Proporsionalitas', 'Zae5499155MJ9J59d0', '2020-07-24 14:07:05', 47, '2020-07-24 14:07:05', NULL, NULL, NULL, 0),
(194, 21, 66, 'Kemerdekaan', '9l1Va9551gs559594U', '2020-07-24 14:07:05', 47, '2020-07-24 14:07:05', NULL, NULL, NULL, 0),
(195, 21, 66, 'Keseimbangan', 'mT3125951959R9J554', '2020-07-24 14:07:05', 47, '2020-07-24 14:07:05', NULL, NULL, NULL, 0),
(196, 21, 66, 'Jawaban a, b, dan c  salah', 'hSa55hk4951999g3t5', '2020-07-24 14:07:05', 47, '2020-07-24 14:07:05', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id_q_type` int(11) NOT NULL,
  `label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id_q_type`, `label`) VALUES
(1, 'Objektif'),
(2, 'Benar Salah'),
(3, 'Esai');

-- --------------------------------------------------------

--
-- Table structure for table `srv_attributes`
--

CREATE TABLE `srv_attributes` (
  `id_s_attributes` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `desciptions` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `default_val` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srv_attributes`
--

INSERT INTO `srv_attributes` (`id_s_attributes`, `label`, `lang`, `desciptions`, `price`, `default_val`, `updated_at`, `updated_by`) VALUES
(1, 'E-Learning', 'general.elearning', '<p>adalah suatu sistem atau konsep pendidikan yang memanfaatkan teknologi informasi dalam proses belajar mengajar.</p>', 350000, 1, '2020-05-21 20:09:09', NULL),
(2, 'Assisted Test', 'general.cat', '<p>adalah suatu sistem atau layanan pengujian yang terkomputerisasi dalam hal pengerjaan hingga penialiannya, dengan hasil yang langsung ditampilkan</p>', 350000, 1, '2020-07-20 12:21:56', NULL),
(3, 'Users', 'general.users', 'merupakan batas maksimal user atau pengguna yang dapat ditampung pada layanan', 500, 1, NULL, NULL),
(4, 'Storage', 'general.storage', 'merupakan batasan maksimal data yang dapat diunggah pada layanan', 5000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `srv_packages`
--

CREATE TABLE `srv_packages` (
  `id_s_packages` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srv_packages_details`
--

CREATE TABLE `srv_packages_details` (
  `id_s_package` int(11) NOT NULL,
  `id_s_attribute` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_deleted` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srv_transactions`
--

CREATE TABLE `srv_transactions` (
  `id_s_transaction` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `transaction_url` varchar(100) NOT NULL,
  `transaction_token` varchar(40) NOT NULL,
  `external_id` varchar(40) DEFAULT NULL,
  `until` datetime DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srv_transactions`
--

INSERT INTO `srv_transactions` (`id_s_transaction`, `id_user`, `id_company`, `transaction_url`, `transaction_token`, `external_id`, `until`, `total_price`, `created_at`, `updated_at`, `status`, `type`) VALUES
(41, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5e3e375e9138ca030f530971', '5e3e375e9138ca030f530971', '8fcdaf3a-ee5e-42e2-af6d-5fe2e03b9124', '2021-02-08 12:22:03', 605000, '2020-02-07 20:21:50', '2020-02-07 20:22:03', 1, 1),
(42, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5e3e37809138ca030f530972', '5e3e37809138ca030f530972', '8fcdaf6e-d9c8-43dd-ac7f-94fd095e5edd', NULL, 10000, '2020-02-07 20:22:24', NULL, 2, 2),
(45, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5e74ba34861eed3c4a7012ab', '5e74ba34861eed3c4a7012ab', '9020dc9d-660e-439b-a160-3cc490c4d0c6', NULL, 70000, '2020-03-20 04:42:28', '2020-03-20 04:42:47', 1, 2),
(46, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5eaaf0a41c9cf11118cc2118', '5eaaf0a41c9cf11118cc2118', '9073956f-b286-4e41-a711-894d20d5fbbd', NULL, 30000, '2020-04-30 07:37:08', NULL, 2, 2),
(47, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5ebaaa0fd109a910df16b25e', '5ebaaa0fd109a910df16b25e', '908b93ba-4681-467a-bb36-7335ddd1f44b', NULL, 10000, '2020-05-12 05:52:16', NULL, 2, 2),
(48, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5eda5aa94eb7c20fe6c8a30d', '5eda5aa94eb7c20fe6c8a30d', '90bbee95-252f-4e51-8011-fcabc818d9b7', NULL, 10000, '2020-06-05 06:46:01', '2020-06-05 06:46:20', 1, 2),
(49, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5eda5de24eb7c20fe6c8a32a', '5eda5de24eb7c20fe6c8a32a', '90bbf380-9ed9-40e1-93c5-b6a2db319f00', NULL, 25000, '2020-06-05 06:59:46', '2020-06-05 07:00:04', 1, 2),
(50, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5ee0afd301cbe8456bdfb250', '5ee0afd301cbe8456bdfb250', '90c5984b-2f48-4af7-a0a7-8b12baeb207d', NULL, 25000, '2020-06-10 02:03:03', NULL, 2, 2),
(51, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5ee3009fc2be8840605dae6d', '5ee3009fc2be8840605dae6d', '90c59f86-ba19-4d04-943b-837066eea5fd', NULL, 25000, '2020-06-10 02:23:14', NULL, 2, 2),
(52, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5ee5f9559c739f01d3498a01', '5ee5f9559c739f01d3498a01', '90cda991-a0e5-4594-9852-057d1c74073e', NULL, 350000, '2020-06-14 02:17:58', '2020-06-14 02:18:43', 1, 2),
(53, 1, 15, 'https://invoice-staging.xendit.co/web/invoices/5ef82621ba6db145ba8c98c0', '5ef82621ba6db145ba8c98c0', '90e96525-ae64-460f-a31c-dfdf8be3be3a', '2021-06-28 13:12:08', 735000, '2020-06-27 21:09:53', '2020-06-27 21:12:08', 1, 1),
(54, 41, 16, 'https://invoice-staging.xendit.co/web/invoices/5efb3d96f8712c401cf5c438', '5efb3d96f8712c401cf5c438', '90ee1cd9-0a84-4880-a2d1-d916496fcee3', '2021-06-30 21:27:05', 750000, '2020-06-30 05:26:49', '2020-06-30 05:27:05', 1, 1),
(55, 43, 18, 'https://invoice-staging.xendit.co/web/invoices/5f0857719dfe071e9629efb3', '5f0857719dfe071e9629efb3', '91021a6b-52e3-4a63-af2b-e7e2bad23eeb', '2021-07-10 19:56:59', 750000, '2020-07-10 03:56:33', '2020-07-10 03:56:59', 1, 1),
(56, 43, 18, 'https://invoice-staging.xendit.co/web/invoices/5f0857af9dfe071e9629efb4', '5f0857af9dfe071e9629efb4', '91021ac9-d46e-41d7-9061-e2e212cb175c', NULL, 25000, '2020-07-10 03:57:35', '2020-07-10 03:58:00', 1, 2),
(57, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5f094f4f9dfe071e9629f4b7', '5f094f4f9dfe071e9629f4b7', '910394a3-17a7-4a41-8820-9edbbd6f2676', NULL, 25000, '2020-07-10 21:34:07', NULL, 2, 2),
(58, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5f158a8e1d9a2e2a6feb9530', '5f158a8e1d9a2e2a6feb9530', '91163e8a-6eac-4934-922f-01d4b3e6c69d', NULL, 25000, '2020-07-20 12:14:07', '2020-07-20 12:14:26', 1, 2),
(59, 45, 19, 'https://invoice-staging.xendit.co/web/invoices/5f19a0ba4e2947691e004cc8', '5f19a0ba4e2947691e004cc8', '911c7ade-50bf-4e38-800b-889b9db9f697', '2021-07-23 22:38:02', 750000, '2020-07-23 14:37:46', '2020-07-23 14:38:02', 1, 1),
(60, 45, 19, 'https://invoice-staging.xendit.co/web/invoices/5f19a0dd4e2947691e004cc9', '5f19a0dd4e2947691e004cc9', '911c7b14-78c3-493b-8e88-c8cd17132ab4', NULL, 25000, '2020-07-23 14:38:21', '2020-07-23 14:43:18', 1, 2),
(61, 46, 20, 'https://invoice-staging.xendit.co/web/invoices/5f1ae4724e2947691e005564', '5f1ae4724e2947691e005564', '911e68d3-42e0-48a9-b8b8-9340b4b42eda', '2021-07-24 21:39:23', 750000, '2020-07-24 13:38:58', '2020-07-24 13:39:23', 1, 1),
(62, 46, 20, 'https://invoice-staging.xendit.co/web/invoices/5f1ae4a94e2947691e005566', '5f1ae4a94e2947691e005566', '911e6928-9007-44f3-a633-3dd9e8784323', NULL, 30000, '2020-07-24 13:39:54', '2020-07-24 13:40:20', 1, 2),
(63, 47, 21, 'https://invoice-staging.xendit.co/web/invoices/5f1ae5cd4e2947691e005570', '5f1ae5cd4e2947691e005570', '911e6ae5-4452-4f2f-82b3-57c61bd4a1d9', '2021-07-24 21:45:01', 750000, '2020-07-24 13:44:45', '2020-07-24 13:45:01', 1, 1),
(64, 47, 21, 'https://invoice-staging.xendit.co/web/invoices/5f1ae5fc4e2947691e005571', '5f1ae5fc4e2947691e005571', '911e6b2c-f47e-4076-8966-7e7708df4bb3', NULL, 30000, '2020-07-24 13:45:32', '2020-07-24 13:45:50', 1, 2),
(65, 53, 22, 'https://invoice-staging.xendit.co/web/invoices/5f1b7a7c4e2947691e0057a6', '5f1b7a7c4e2947691e0057a6', '911f4dc4-6e40-4a9e-af15-ee10e9eb60b7', '2021-07-25 08:19:32', 750000, '2020-07-25 00:19:08', '2020-07-25 00:19:32', 1, 1),
(66, 53, 22, 'https://invoice-staging.xendit.co/web/invoices/5f1b7ab64e2947691e0057a7', '5f1b7ab64e2947691e0057a7', '911f4e1b-e674-4e40-80b1-9feac6b6fd57', NULL, 30000, '2020-07-25 00:20:06', '2020-07-25 00:20:24', 1, 2),
(67, 54, 23, 'https://invoice-staging.xendit.co/web/invoices/5f1bc1234e2947691e0058dc', '5f1bc1234e2947691e0058dc', '911fb993-d582-48af-95f9-6e91b916a422', '2021-07-25 13:21:00', 400000, '2020-07-25 05:20:35', '2020-07-25 05:21:00', 1, 1),
(68, 54, 23, 'https://invoice-staging.xendit.co/web/invoices/5f1bc1554e2947691e0058dd', '5f1bc1554e2947691e0058dd', '911fb9e1-28d1-4e3f-94d2-681ff12756c4', NULL, 350000, '2020-07-25 05:21:26', '2020-07-25 05:21:53', 1, 2),
(69, 1, 11, 'https://invoice-staging.xendit.co/web/invoices/5f2921c72d4b02403bc24144', '5f2921c72d4b02403bc24144', '911fc356-e4ec-4480-b99f-0828367db156', NULL, 60000, '2020-07-25 05:47:53', '2020-08-04 08:52:38', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `srv_transactions_status`
--

CREATE TABLE `srv_transactions_status` (
  `id_t_status` int(11) NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `srv_transactions_status`
--

INSERT INTO `srv_transactions_status` (`id_t_status`, `label`) VALUES
(0, 'Pendding'),
(1, 'Berhasil'),
(2, 'Gagal / Batal');

-- --------------------------------------------------------

--
-- Table structure for table `srv_transactions_type`
--

CREATE TABLE `srv_transactions_type` (
  `id_t_tyoe` int(11) NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `srv_transactions_type`
--

INSERT INTO `srv_transactions_type` (`id_t_tyoe`, `label`) VALUES
(1, 'Pembayaran Rutin'),
(2, 'Pembayaran Upgrade');

-- --------------------------------------------------------

--
-- Table structure for table `srv_transaction_items`
--

CREATE TABLE `srv_transaction_items` (
  `id_transaction_item` int(11) NOT NULL,
  `id_s_transaction` int(11) NOT NULL,
  `id_s_attribute` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srv_transaction_items`
--

INSERT INTO `srv_transaction_items` (`id_transaction_item`, `id_s_transaction`, `id_s_attribute`, `size`, `total_price`) VALUES
(29, 10, 1, 1, 250000),
(30, 10, 2, 1, 250000),
(31, 10, 3, 250, 125000),
(32, 10, 4, 1, 5000),
(33, 11, 1, 1, 250000),
(34, 11, 2, 1, 250000),
(35, 11, 3, 250, 125000),
(36, 11, 4, 1, 5000),
(37, 12, 1, 1, 250000),
(38, 12, 2, 1, 250000),
(39, 12, 3, 200, 100000),
(40, 12, 4, 8, 40000),
(41, 13, 1, 1, 0),
(42, 13, 2, 1, 250000),
(43, 13, 3, 200, 0),
(44, 13, 4, 8, 0),
(45, 14, 1, 1, 0),
(46, 14, 2, 1, 250000),
(47, 14, 3, 250, 125000),
(48, 14, 4, 8, 0),
(49, 15, 1, 1, 250000),
(50, 15, 2, 1, 250000),
(51, 15, 3, 200, 100000),
(52, 15, 4, 8, 40000),
(53, 16, 1, 1, 0),
(54, 16, 2, 1, 250000),
(55, 16, 3, 200, 0),
(56, 16, 4, 8, 0),
(60, 18, 1, 1, 0),
(61, 18, 2, 0, 0),
(62, 18, 3, 250, 125000),
(63, 18, 4, 8, 0),
(64, 19, 1, 1, 0),
(65, 19, 2, 1, 250000),
(66, 19, 3, 200, 0),
(67, 19, 4, 8, 0),
(68, 20, 1, 1, 0),
(69, 20, 2, 1, 0),
(70, 20, 3, 250, 125000),
(71, 20, 4, 8, 0),
(72, 21, 1, 1, 0),
(73, 21, 2, 1, 0),
(74, 21, 3, 300, 25000),
(75, 21, 4, 8, 0),
(76, 22, 1, 1, 0),
(77, 22, 2, 1, 0),
(78, 22, 3, 300, 25000),
(79, 22, 4, 8, 0),
(80, 23, 1, 1, 0),
(81, 23, 2, 1, 0),
(82, 23, 3, 300, 22877),
(83, 23, 4, 8, 0),
(84, 24, 1, 1, 0),
(85, 24, 2, 1, 0),
(86, 24, 3, 300, 2055),
(87, 24, 4, 8, 0),
(88, 25, 1, 1, 0),
(89, 25, 2, 1, 0),
(90, 25, 3, 300, 0),
(91, 25, 4, 9, 397),
(92, 26, 1, 1, 0),
(93, 26, 2, 1, 0),
(94, 26, 3, 300, 0),
(95, 26, 4, 10, 145000),
(96, 27, 1, 1, 0),
(97, 27, 2, 1, 0),
(98, 27, 3, 300, 0),
(99, 27, 4, 11, 5000),
(100, 28, 1, 1, 0),
(101, 28, 2, 1, 0),
(102, 28, 3, 300, 0),
(103, 28, 4, 11, 5000),
(104, 29, 1, 1, 250000),
(105, 29, 2, 1, 250000),
(106, 29, 3, 300, 150000),
(107, 29, 4, 10, 50000),
(108, 30, 1, 1, 0),
(109, 30, 2, 1, 0),
(110, 30, 3, 350, 25000),
(111, 30, 4, 10, 0),
(112, 31, 1, 1, 0),
(113, 31, 2, 1, 250000),
(114, 31, 3, 400, 25000),
(115, 31, 4, 10, 0),
(116, 32, 1, 1, 0),
(117, 32, 2, 1, 0),
(118, 32, 3, 450, 25000),
(119, 32, 4, 10, 0),
(120, 33, 1, 1, 0),
(121, 33, 2, 1, 0),
(122, 33, 3, 450, 25000),
(123, 33, 4, 10, 0),
(124, 34, 1, 1, 0),
(125, 34, 2, 1, 0),
(126, 34, 3, 300, 25000),
(127, 34, 4, 10, 0),
(128, 35, 1, 1, 0),
(129, 35, 2, 1, 0),
(130, 35, 3, 350, 25000),
(131, 35, 4, 10, 0),
(132, 36, 1, 1, 0),
(133, 36, 2, 1, 0),
(134, 36, 3, 350, 25000),
(135, 36, 4, 10, 0),
(136, 37, 1, 1, 0),
(137, 37, 2, 1, 0),
(138, 37, 3, 350, 25000),
(139, 37, 4, 10, 0),
(140, 38, 1, 1, 250000),
(141, 38, 2, 1, 250000),
(142, 38, 3, 150, 75000),
(143, 38, 4, 10, 50000),
(144, 39, 1, 1, 0),
(145, 39, 2, 1, 0),
(146, 39, 3, 200, 25000),
(147, 39, 4, 10, 0),
(148, 40, 1, 1, 0),
(149, 40, 2, 1, 0),
(150, 40, 3, 250, 25000),
(151, 40, 4, 10, 0),
(152, 41, 1, 1, 250000),
(153, 41, 2, 1, 250000),
(154, 41, 3, 150, 75000),
(155, 41, 4, 6, 30000),
(156, 42, 1, 1, 0),
(157, 42, 2, 1, 0),
(158, 42, 3, 150, 0),
(159, 42, 4, 7, 5000),
(160, 43, 1, 1, 250000),
(161, 43, 2, 1, 250000),
(162, 43, 3, 100, 50000),
(163, 43, 4, 5, 25000),
(164, 44, 1, 1, 250000),
(165, 44, 2, 1, 250000),
(166, 44, 3, 50, 25000),
(167, 44, 4, 4, 20000),
(168, 45, 1, 1, 0),
(169, 45, 2, 1, 0),
(170, 45, 3, 200, 50000),
(171, 45, 4, 8, 20000),
(172, 46, 1, 1, 0),
(173, 46, 2, 1, 0),
(174, 46, 3, 250, 25000),
(175, 46, 4, 9, 5000),
(176, 47, 1, 1, 0),
(177, 47, 2, 1, 0),
(178, 47, 3, 200, 0),
(179, 47, 4, 10, 10000),
(180, 48, 1, 1, 0),
(181, 48, 2, 1, 0),
(182, 48, 3, 200, 0),
(183, 48, 4, 10, 10000),
(184, 49, 1, 1, 0),
(185, 49, 2, 1, 0),
(186, 49, 3, 200, 0),
(187, 49, 4, 15, 25000),
(188, 50, 1, 1, 0),
(189, 50, 2, 1, 0),
(190, 50, 3, 200, 0),
(191, 50, 4, 20, 25000),
(192, 51, 1, 1, 0),
(193, 51, 2, 1, 0),
(194, 51, 3, 200, 0),
(195, 51, 4, 20, 25000),
(196, 52, 1, 1, 0),
(197, 52, 2, 1, 350000),
(198, 52, 3, 200, 0),
(199, 52, 4, 15, 0),
(200, 53, 1, 1, 350000),
(201, 53, 2, 1, 350000),
(202, 53, 3, 50, 25000),
(203, 53, 4, 2, 10000),
(204, 54, 1, 1, 350000),
(205, 54, 2, 1, 350000),
(206, 54, 3, 50, 25000),
(207, 54, 4, 5, 25000),
(208, 55, 1, 1, 350000),
(209, 55, 2, 1, 350000),
(210, 55, 3, 50, 25000),
(211, 55, 4, 5, 25000),
(212, 56, 1, 1, 0),
(213, 56, 2, 1, 0),
(214, 56, 3, 100, 25000),
(215, 56, 4, 5, 0),
(216, 57, 1, 1, 0),
(217, 57, 2, 1, 0),
(218, 57, 3, 250, 25000),
(219, 57, 4, 10, 0),
(220, 58, 1, 1, 0),
(221, 58, 2, 1, 0),
(222, 58, 3, 100, 25000),
(223, 58, 4, 2, 0),
(224, 59, 1, 1, 350000),
(225, 59, 2, 1, 350000),
(226, 59, 3, 50, 25000),
(227, 59, 4, 5, 25000),
(228, 60, 1, 1, 0),
(229, 60, 2, 1, 0),
(230, 60, 3, 100, 25000),
(231, 60, 4, 5, 0),
(232, 61, 1, 1, 350000),
(233, 61, 2, 1, 350000),
(234, 61, 3, 50, 25000),
(235, 61, 4, 5, 25000),
(236, 62, 1, 1, 0),
(237, 62, 2, 1, 0),
(238, 62, 3, 100, 25000),
(239, 62, 4, 6, 5000),
(240, 63, 1, 1, 350000),
(241, 63, 2, 1, 350000),
(242, 63, 3, 50, 25000),
(243, 63, 4, 5, 25000),
(244, 64, 1, 1, 0),
(245, 64, 2, 1, 0),
(246, 64, 3, 100, 25000),
(247, 64, 4, 6, 5000),
(248, 65, 1, 1, 350000),
(249, 65, 2, 1, 350000),
(250, 65, 3, 50, 25000),
(251, 65, 4, 5, 25000),
(252, 66, 1, 1, 0),
(253, 66, 2, 1, 0),
(254, 66, 3, 100, 25000),
(255, 66, 4, 6, 5000),
(256, 67, 1, 1, 350000),
(257, 67, 2, 0, 0),
(258, 67, 3, 50, 25000),
(259, 67, 4, 5, 25000),
(260, 68, 1, 1, 0),
(261, 68, 2, 1, 350000),
(262, 68, 3, 50, 0),
(263, 68, 4, 5, 0),
(264, 69, 1, 1, 0),
(265, 69, 2, 1, 0),
(266, 69, 3, 200, 50000),
(267, 69, 4, 4, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `sys_route_access_permissions`
--

CREATE TABLE `sys_route_access_permissions` (
  `id_route` int(11) NOT NULL,
  `route_name` varchar(100) DEFAULT NULL,
  `required_active_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'https://api.adorable.io/avatars/100/abott@adorable.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_session` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Merupakan ID dari layanan yang aktiv atau sedang diikuti (Sekolah, Kampus, DLL)',
  `active_status` int(11) DEFAULT NULL COMMENT 'Merupakan status user saat pada active_session tertentu. (Administrator Pengguna Layana, Staf Pengguna Layanan, atau Client Pengguna Layanan)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT 'id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_number`, `first_name`, `last_name`, `address`, `bio`, `cover_img`, `email`, `email_verified_at`, `password`, `remember_token`, `active_session`, `active_status`, `created_at`, `updated_at`, `lang`) VALUES
(1, 'lorem', 'loremlorem', '08982600193', '', '', 'Jalan Raya Ubud', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.', 'http://elcat.localhost/storage/profile/1/profilepicture.jpg', 'loremipsum@mail.com', NULL, '$2y$10$VYr/16KRMFgfevPfnF8E3OfjfsBJoB6D6CsJ6aN1p0CAqQ4paC4QW', 'km1Fh0O4EuFlpBSTLypLyJ4eXm4gRvRNHw3ioThmUWJ2EAHz4s0ODkJ4IxpW', '11', 3, '2020-02-05 22:10:11', '2020-08-12 12:13:29', 'id_ID'),
(30, 'Laras Tropus', 'larastropus', '0898234454', '', '', NULL, NULL, 'http://elcat.localhost/storage/profile/30/profilepicture.jpg', 'larastropus@mail.com', NULL, '$2y$10$TusHNI3INop4.gh9Sm98n.EBwyz4/x0xral1IAN3MqlCwatpa3H8K', 'RdnoUlVih3Xd69Rx0hohsyb4lhlSgWzvWfMRGxOF6bnqECjtuat0lJkqoUlb', '11', 3, '2020-05-06 20:08:56', '2020-08-10 01:36:38', 'id_ID'),
(31, 'Administrator Layanan', 'sudoadmin', '0808999889', '', '', NULL, NULL, 'http://elcat.localhost/storage/profile/31/profilepicture.jpg', 'sudoadmin@mail.com', NULL, '$2y$10$VYr/16KRMFgfevPfnF8E3OfjfsBJoB6D6CsJ6aN1p0CAqQ4paC4QW', 'u9KhntkV0VHMtAIKd15hj8J2ESDdA0sUtPFeYLKJz2yhaY31heSuV6wEU96H', '-1', -1, NULL, '2020-05-15 01:26:11', 'id_ID'),
(32, 'User hapus', 'userhapus', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'userhapus@mail.com', NULL, '$2y$10$k.JAjMVwOykepOrSAZw9HOar3TCeDU/II3awILwPGVwBq3vX5XLie', NULL, '11', 3, '2020-06-01 05:35:22', '2020-06-01 05:35:22', 'id_ID'),
(33, 'Suryadi Slamet Rachman', 'suryadislamet', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'suryadislamet@mail.com', NULL, '$2y$10$dLMVJOsBp7wFHezoFrRTxOeFefYvg6bG1WKF.CHIaNGaDmNri9AVS', NULL, '11', 2, '2020-06-01 22:45:05', '2020-07-21 11:08:46', 'id_ID'),
(34, 'Yvo Salasiwa', 'salasiwa', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'salasiwa@mail.com', NULL, '$2y$10$r0qLbVab87oHWI0SGmv19.YxNFxR61MENMop278/Law6XX0..cgpy', NULL, '11', 3, '2020-06-01 22:45:46', '2020-06-01 22:45:46', 'id_ID'),
(35, 'Yulia Ade Kurniawan', 'yuliadekurnia', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'yuliadekurnia@mail.com', NULL, '$2y$10$gccP0sK8zcF5TO2kSMMRde1cyA1JcUHFL1kDHqjM95SVeYtJcLrc.', 'GI5gUOKRhOF35MdrXyNNVTtgSR3r1EPgaPlPCY780eCr74OIvo3FEPTPZmnH', '11', 3, '2020-06-01 22:46:32', '2020-07-19 06:01:26', 'id_ID'),
(36, 'Wongso Rou', 'rouwongso', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'rouwongso@mail.com', NULL, '$2y$10$s6cc23RwiLDq04rDAdp7P.RRH3kK4luMXOZMDVfqNYJgH9YVdDHhO', NULL, '11', 3, '2020-06-01 22:47:05', '2020-06-01 22:47:05', 'id_ID'),
(37, 'dwadwd', 'dwadwad', NULL, '', '', NULL, NULL, NULL, 'dwadw@mail.com', NULL, '$2y$10$Dttnjwt4AKJXERWK.hxb.uJXpJA931MprJ2bzJ0UCy5V6aHdUTNMO', NULL, '11', 3, '2020-06-11 21:36:31', '2020-06-11 21:36:31', 'id'),
(38, 'dwdwadw', 'dwadw', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'dwadwd@mail.com', NULL, '$2y$10$1Ofc3IHxCsTzYOTa4W2/oeR4A/ewKiioJdF19ItpuGa0XVDGUJxFm', NULL, '11', 3, '2020-06-17 20:23:33', '2020-06-17 20:23:33', 'id'),
(39, 'hapus', 'wwwww', NULL, '', '', NULL, NULL, NULL, 'wwwwww@mail.com', NULL, '$2y$10$87Dx/ITJYgkrLQqcuUIu1eAhht6KL7/S10fVXMwzlHKkh/GUF9p7i', NULL, '11', 3, '2020-06-28 01:38:30', '2020-06-28 01:38:30', 'id'),
(40, 'deletete', 'wadwadw', NULL, '', '', NULL, NULL, NULL, 'dwadsdw@mail.com', NULL, '$2y$10$AGBEyBBR8QZJW5qxDP0tYONI569OaJ2CWk3UlbqWuBVAmtbWP8ADO', NULL, '11', 3, '2020-06-28 01:40:48', '2020-06-28 01:40:48', 'id'),
(41, 'Admin BPSDM', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'loremipsum1@mail.com', NULL, '$2y$10$hLzHELADnA5BCMzQZgZmUuLVg7QyEd2QA.rSxQMdgJw7dGn9TKzVy', NULL, '16', 1, '2020-06-30 05:24:36', '2020-06-30 05:24:36', 'id'),
(42, 'Admin BPSDM 3', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'loremipsum2@mail.com', NULL, '$2y$10$aLhYZukId1Gg82wifZ6qoOoJFSxNpHk3OaD0HR.JY3jtcagvuqJea', NULL, '17', 1, '2020-06-30 05:32:52', '2020-06-30 05:32:52', 'id'),
(43, 'useradmin', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'useradmin@mail.com', NULL, '$2y$10$S1G3p3hFB4qOvTCs5NETYOSsg19RxfGDQaAVHnKPEM3vAvwlfI4ce', NULL, '18', 1, '2020-07-10 03:56:04', '2020-07-10 03:56:04', 'id'),
(44, 'staffadmin', 'staffadmin', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'staffadmin@mail.com', NULL, '$2y$10$bAXsG75sxHhgBmIVfDxsde30qdNT4w7bb7ZijmRRPMymSLgbMQRFC', NULL, '11', 2, '2020-07-21 11:09:16', '2020-07-21 11:09:45', 'id'),
(45, 'admininstitut', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'admininstitut@mail.com', NULL, '$2y$10$t/lnoriS8vpTaZkSoU55zexBROq/bZN2VQkX.GF3J4Anc1rAgnnGW', NULL, '19', 1, '2020-07-23 05:38:49', '2020-07-23 05:38:49', 'id'),
(46, 'Bejonegoro', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'adminbejo@mail.com', NULL, '$2y$10$/bxZPyiq9KmOxXHPOVwnSeYblAnWsY8GXLswaV6h.WpK2XCdBR2ni', NULL, '20', 1, '2020-07-24 13:38:41', '2020-07-24 13:38:41', 'id'),
(47, 'Sudiatmiko', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'adminsudiatmiko@mail.com', NULL, '$2y$10$mXgQTSrzAFFhkGkpGAA9FOohhBVxqWdh7ECTHtj5./HKgISDWf7um', NULL, '21', 1, '2020-07-24 13:44:29', '2020-07-24 13:56:01', 'id'),
(48, 'Admika', 'admika', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'admika@mail.com', NULL, '$2y$10$lcHfbX.OrxaCSTCsdE3OiOAPU1b773dFELQ.U/ZcW6KwpglLFnJ0K', NULL, '21', 3, '2020-07-24 13:58:07', '2020-07-24 14:25:54', 'id'),
(49, 'Anggara', 'anggara', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'anggara@mail.com', NULL, '$2y$10$ZBOQe/qpFCTi42jhQ7YCZOeTHLOCVw4o1t5dkeq/Fi7lHrGamvbeK', NULL, '21', 3, '2020-07-24 14:27:40', '2020-07-24 14:27:48', 'id'),
(50, 'anggiri', 'anggiri', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'anggiri@mail.com', NULL, '$2y$10$S9KXFztwlelNGvVHMKORWeummE3sUeaHD.VIC4.QebLQ6ZWObDLGe', NULL, '21', 3, '2020-07-24 14:28:43', '2020-07-24 15:00:45', 'id'),
(51, 'admiral', 'admiral', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'admiral@mail.com', NULL, '$2y$10$b8kGTlJGw3TC.TBgYKBb0uvsmwr/AdVgbKS5In1X44kKo9CL0QnXi', NULL, '21', 3, '2020-07-24 15:01:39', '2020-07-24 15:09:17', 'id'),
(52, 'Sutisna', 'sutisna', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'sutisna@mail.com', NULL, '$2y$10$ZUk8Ial.AcnjU0GM6WRe.eyFjK4dejLzBz8PJPqSCfHZGovgYr.5i', NULL, '21', 3, '2020-07-24 15:13:26', '2020-07-24 15:33:52', 'id'),
(53, 'baskoro', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'baskoro@mail.com', NULL, '$2y$10$kfWc2YNuOAOdIAaZVNLVnuAz/QAh4tiE7tc5JyWrIjSs2lkAJOiXO', NULL, '22', 1, '2020-07-25 00:18:45', '2020-07-25 00:18:45', 'id'),
(54, 'namaadmin', NULL, NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'namaadmin@mail.com', NULL, '$2y$10$HCThsNBQC7dlobLxAdfb2exIxcXlXWubcFd2uOTAnQpYbr48h2FOG', NULL, '23', 1, '2020-07-25 05:20:08', '2020-07-25 05:20:08', 'id'),
(55, 'nama user join', 'namauserjoin', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'namauserjoin@mail.com', NULL, '$2y$10$FvCG1WtFbY/K5Y5P0TPLuOYZLl.D1j//4d/On0/Y8T6O5WhW8O6zi', NULL, '23', 3, '2020-07-25 05:23:36', '2020-07-25 05:24:53', 'id'),
(56, 'staff baru', 'staffbaru', NULL, '', '', NULL, NULL, 'https://api.adorable.io/avatars/100/abott@adorable.png', 'staffbaru@mail.com', NULL, '$2y$10$DqceudeOclaMuqM6o0ZUE.nTsxQI6P0.PueKL3E.5paxBpgEu9yq2', NULL, '23', 2, '2020-07-25 05:25:23', '2020-07-25 05:26:13', 'id');

-- --------------------------------------------------------

--
-- Table structure for table `user_srv_dtl`
--

CREATE TABLE `user_srv_dtl` (
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_srv_dtl`
--

INSERT INTO `user_srv_dtl` (`id_user`, `id_company`, `status`, `created_at`) VALUES
(1, 11, 1, '2020-05-06 19:39:39'),
(1, 11, 2, '2020-05-06 19:39:39'),
(1, 11, 3, '2020-05-06 19:39:39'),
(1, 15, 1, '2020-05-06 19:39:39'),
(1, 15, 2, '2020-05-06 19:39:39'),
(1, 15, 3, '2020-05-06 19:39:39'),
(30, 11, 3, '2020-06-28 01:56:24'),
(33, 11, 3, '2020-07-21 11:08:46'),
(34, 11, 3, '2020-06-01 22:45:46'),
(35, 11, 3, '2020-07-19 06:01:26'),
(36, 11, 3, '2020-06-01 22:47:05'),
(38, 11, 3, '2020-06-17 20:23:33'),
(41, 16, 1, '2020-06-30 05:24:36'),
(41, 16, 2, '2020-06-30 05:24:36'),
(41, 16, 3, '2020-06-30 05:24:36'),
(42, 17, 1, '2020-06-30 05:32:52'),
(42, 17, 2, '2020-06-30 05:32:52'),
(42, 17, 3, '2020-06-30 05:32:52'),
(43, 18, 1, '2020-07-10 03:56:04'),
(43, 18, 2, '2020-07-10 03:56:04'),
(43, 18, 3, '2020-07-10 03:56:04'),
(44, 11, 2, '2020-07-21 11:09:16'),
(44, 11, 3, '2020-07-21 11:09:16'),
(45, 19, 1, '2020-07-23 05:38:49'),
(45, 19, 2, '2020-07-23 05:38:49'),
(45, 19, 3, '2020-07-23 05:38:49'),
(46, 20, 1, '2020-07-24 13:38:41'),
(46, 20, 2, '2020-07-24 13:38:41'),
(46, 20, 3, '2020-07-24 13:38:41'),
(47, 21, 1, '2020-07-24 13:44:29'),
(47, 21, 2, '2020-07-24 13:44:29'),
(47, 21, 3, '2020-07-24 13:44:29'),
(48, 21, 3, '2020-07-24 13:59:01'),
(49, 21, 3, '2020-07-24 14:27:40'),
(50, 21, 3, '2020-07-24 14:28:43'),
(51, 21, 3, '2020-07-24 15:01:39'),
(52, 21, 3, '2020-07-24 15:13:26'),
(53, 22, 1, '2020-07-25 00:18:45'),
(53, 22, 2, '2020-07-25 00:18:45'),
(53, 22, 3, '2020-07-25 00:18:45'),
(54, 23, 1, '2020-07-25 05:20:08'),
(54, 23, 2, '2020-07-25 05:20:08'),
(54, 23, 3, '2020-07-25 05:20:08'),
(55, 23, 2, '2020-07-25 05:24:53'),
(55, 23, 3, '2020-07-25 05:24:53'),
(56, 23, 2, '2020-07-25 05:25:24'),
(56, 23, 3, '2020-07-25 05:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id_ann`),
  ADD KEY `announcement_companies_id_company_fk` (`id_company`),
  ADD KEY `announcement_users_id_id_id_fk` (`created_by`);

--
-- Indexes for table `announcement_notifiable`
--
ALTER TABLE `announcement_notifiable`
  ADD PRIMARY KEY (`id_notifiable`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comments_companies_id_company_fk` (`id_company`),
  ADD KEY `comments_users_id_fk` (`created_by`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `companies_subscribtions`
--
ALTER TABLE `companies_subscribtions`
  ADD PRIMARY KEY (`id_company`,`id_srv_attribute`),
  ADD KEY `companies_subscribtions_srv_attributes_id_s_attributes_fk` (`id_srv_attribute`);

--
-- Indexes for table `companies_transactions`
--
ALTER TABLE `companies_transactions`
  ADD PRIMARY KEY (`id_c_transaction`),
  ADD KEY `companies_transactions_companies_id_company_fk` (`id_company`),
  ADD KEY `companies_transactions_users_id_fk` (`created_by`);

--
-- Indexes for table `companies_type`
--
ALTER TABLE `companies_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_courses`),
  ADD KEY `courses_companies_id_company_fk` (`id_company`);

--
-- Indexes for table `courses_log`
--
ALTER TABLE `courses_log`
  ADD PRIMARY KEY (`id_c_log`),
  ADD KEY `courses_log_companies_id_company_fk` (`id_company`),
  ADD KEY `courses_log_courses_id_courses_fk` (`id_courses`),
  ADD KEY `courses_log_users_id_fk` (`id_participant`);

--
-- Indexes for table `courses_participant`
--
ALTER TABLE `courses_participant`
  ADD PRIMARY KEY (`id_c_participant`),
  ADD KEY `courses_participant_companies_id_company_fk` (`id_company`),
  ADD KEY `courses_participant_courses_id_courses_fk` (`id_courses`),
  ADD KEY `courses_participant_users_id_fk` (`id_participant`),
  ADD KEY `courses_participant_users_id_fk_2` (`created_by`);

--
-- Indexes for table `courses_task`
--
ALTER TABLE `courses_task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `courses_task_companies_id_company_fk` (`id_company`),
  ADD KEY `courses_task_courses_id_courses_fk` (`id_courses`),
  ADD KEY `courses_task_users_id_fk` (`created_by`);

--
-- Indexes for table `courses_task_submit`
--
ALTER TABLE `courses_task_submit`
  ADD PRIMARY KEY (`id_submit`),
  ADD KEY `courses_task_submit_companies_id_company_fk` (`id_company`),
  ADD KEY `courses_task_submit_courses_task_id_task_fk` (`id_task`),
  ADD KEY `courses_task_submit_users_id_fk` (`created_by`);

--
-- Indexes for table `courses_teach_materials`
--
ALTER TABLE `courses_teach_materials`
  ADD PRIMARY KEY (`id_tech_material`),
  ADD KEY `courses_teach_materials_companies_id_company_fk` (`id_company`),
  ADD KEY `courses_teach_materials_courses_id_courses_fk` (`id_courses`),
  ADD KEY `courses_teach_materials_users_id_fk` (`created_by`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id_exam`),
  ADD KEY `exams_companies_id_company_fk` (`id_company`),
  ADD KEY `exams_users_id_fk` (`created_by`);

--
-- Indexes for table `exams_courses_relations`
--
ALTER TABLE `exams_courses_relations`
  ADD PRIMARY KEY (`id_relation`),
  ADD KEY `exams_courses_relations_companies_id_company_fk` (`id_company`),
  ADD KEY `exams_courses_relations_courses_id_courses_fk` (`id_courses`),
  ADD KEY `exams_courses_relations_exams_id_exam_fk` (`id_exam`),
  ADD KEY `exams_courses_relations_users_id_fk` (`created_by`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `exam_answers_companies_id_company_fk` (`id_company`),
  ADD KEY `exam_answers_exams_id_exam_fk` (`id_exam`),
  ADD KEY `exam_answers_questions_id_question_fk` (`id_question`),
  ADD KEY `exam_answers_users_id_fk` (`id_participant`);

--
-- Indexes for table `exam_participant`
--
ALTER TABLE `exam_participant`
  ADD PRIMARY KEY (`id_exam_participant`),
  ADD KEY `exam_participant_companies_id_company_fk` (`id_company`),
  ADD KEY `exam_participant_exams_id_exam_fk` (`id_exam`),
  ADD KEY `exam_participant_users_id_fk` (`id_participant`),
  ADD KEY `exam_participant_users_id_fk_2` (`created_by`);

--
-- Indexes for table `exam_questions_adv`
--
ALTER TABLE `exam_questions_adv`
  ADD PRIMARY KEY (`id_exam_question`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_activity_log`
--
ALTER TABLE `general_activity_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `general_activity_log_users_id_fk` (`access_by`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `group_categories`
--
ALTER TABLE `group_categories`
  ADD PRIMARY KEY (`id_g_category`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id_group`,`id_user`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `l_e_categories`
--
ALTER TABLE `l_e_categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `l_e_categories_companies_id_company_fk` (`id_company`),
  ADD KEY `l_e_categories_users_id_fk` (`created_by`);

--
-- Indexes for table `l_e_ratings`
--
ALTER TABLE `l_e_ratings`
  ADD PRIMARY KEY (`id_ratings`),
  ADD KEY `l_e_ratings_companies_id_company_fk` (`id_company`),
  ADD KEY `l_e_ratings_exams_id_exam_fk` (`id_post`),
  ADD KEY `l_e_ratings_users_id_fk` (`created_by`);

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
  ADD KEY `notifications_users_id_fk` (`notifiable_id`);

--
-- Indexes for table `other_sepeda`
--
ALTER TABLE `other_sepeda`
  ADD PRIMARY KEY (`kode_sepeda`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `questions_companies_id_company_fk` (`id_company`),
  ADD KEY `questions_exams_id_exam_fk` (`id_exam`),
  ADD KEY `questions_question_type_id_q_type_fk` (`type`),
  ADD KEY `questions_users_id_fk` (`created_by`);

--
-- Indexes for table `questions_option`
--
ALTER TABLE `questions_option`
  ADD PRIMARY KEY (`id_opsion`),
  ADD KEY `questions_option_companies_id_company_fk` (`id_company`),
  ADD KEY `questions_option_questions_id_question_fk` (`id_question`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id_q_type`);

--
-- Indexes for table `srv_attributes`
--
ALTER TABLE `srv_attributes`
  ADD PRIMARY KEY (`id_s_attributes`);

--
-- Indexes for table `srv_packages`
--
ALTER TABLE `srv_packages`
  ADD PRIMARY KEY (`id_s_packages`);

--
-- Indexes for table `srv_packages_details`
--
ALTER TABLE `srv_packages_details`
  ADD PRIMARY KEY (`id_s_package`,`id_s_attribute`);

--
-- Indexes for table `srv_transactions`
--
ALTER TABLE `srv_transactions`
  ADD PRIMARY KEY (`id_s_transaction`),
  ADD KEY `srv_transactions_companies_id_company_fk` (`id_company`),
  ADD KEY `srv_transactions_users_id_fk` (`id_user`);

--
-- Indexes for table `srv_transaction_items`
--
ALTER TABLE `srv_transaction_items`
  ADD PRIMARY KEY (`id_transaction_item`),
  ADD KEY `srv_transaction_items_srv_attributes_id_s_attributes_fk` (`id_s_attribute`),
  ADD KEY `srv_transaction_items_srv_transactions_id_s_transaction_fk` (`id_s_transaction`);

--
-- Indexes for table `sys_route_access_permissions`
--
ALTER TABLE `sys_route_access_permissions`
  ADD PRIMARY KEY (`id_route`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- Indexes for table `user_srv_dtl`
--
ALTER TABLE `user_srv_dtl`
  ADD PRIMARY KEY (`id_user`,`id_company`,`status`),
  ADD KEY `user_srv_dtl_companies_id_company_fk` (`id_company`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcement_notifiable`
--
ALTER TABLE `announcement_notifiable`
  MODIFY `id_notifiable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `companies_transactions`
--
ALTER TABLE `companies_transactions`
  MODIFY `id_c_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `companies_type`
--
ALTER TABLE `companies_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_courses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses_log`
--
ALTER TABLE `courses_log`
  MODIFY `id_c_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=986;

--
-- AUTO_INCREMENT for table `courses_participant`
--
ALTER TABLE `courses_participant`
  MODIFY `id_c_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses_task`
--
ALTER TABLE `courses_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courses_task_submit`
--
ALTER TABLE `courses_task_submit`
  MODIFY `id_submit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courses_teach_materials`
--
ALTER TABLE `courses_teach_materials`
  MODIFY `id_tech_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams_courses_relations`
--
ALTER TABLE `exams_courses_relations`
  MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `exam_participant`
--
ALTER TABLE `exam_participant`
  MODIFY `id_exam_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `exam_questions_adv`
--
ALTER TABLE `exam_questions_adv`
  MODIFY `id_exam_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_activity_log`
--
ALTER TABLE `general_activity_log`
  MODIFY `id_log` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2609;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_categories`
--
ALTER TABLE `group_categories`
  MODIFY `id_g_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `l_e_categories`
--
ALTER TABLE `l_e_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `l_e_ratings`
--
ALTER TABLE `l_e_ratings`
  MODIFY `id_ratings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `questions_option`
--
ALTER TABLE `questions_option`
  MODIFY `id_opsion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id_q_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `srv_attributes`
--
ALTER TABLE `srv_attributes`
  MODIFY `id_s_attributes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `srv_packages`
--
ALTER TABLE `srv_packages`
  MODIFY `id_s_packages` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `srv_transactions`
--
ALTER TABLE `srv_transactions`
  MODIFY `id_s_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `srv_transaction_items`
--
ALTER TABLE `srv_transaction_items`
  MODIFY `id_transaction_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `sys_route_access_permissions`
--
ALTER TABLE `sys_route_access_permissions`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `announcement_users_id_id_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `comments_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies_subscribtions`
--
ALTER TABLE `companies_subscribtions`
  ADD CONSTRAINT `companies_subscribtions_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `companies_subscribtions_srv_attributes_id_s_attributes_fk` FOREIGN KEY (`id_srv_attribute`) REFERENCES `srv_attributes` (`id_s_attributes`);

--
-- Constraints for table `companies_transactions`
--
ALTER TABLE `companies_transactions`
  ADD CONSTRAINT `companies_transactions_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `companies_transactions_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`);

--
-- Constraints for table `courses_log`
--
ALTER TABLE `courses_log`
  ADD CONSTRAINT `courses_log_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `courses_log_courses_id_courses_fk` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `courses_log_users_id_fk` FOREIGN KEY (`id_participant`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses_participant`
--
ALTER TABLE `courses_participant`
  ADD CONSTRAINT `courses_participant_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `courses_participant_courses_id_courses_fk` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `courses_participant_users_id_fk` FOREIGN KEY (`id_participant`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `courses_participant_users_id_fk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses_task`
--
ALTER TABLE `courses_task`
  ADD CONSTRAINT `courses_task_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `courses_task_courses_id_courses_fk` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `courses_task_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses_task_submit`
--
ALTER TABLE `courses_task_submit`
  ADD CONSTRAINT `courses_task_submit_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `courses_task_submit_courses_task_id_task_fk` FOREIGN KEY (`id_task`) REFERENCES `courses_task` (`id_task`),
  ADD CONSTRAINT `courses_task_submit_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses_teach_materials`
--
ALTER TABLE `courses_teach_materials`
  ADD CONSTRAINT `courses_teach_materials_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `courses_teach_materials_courses_id_courses_fk` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `courses_teach_materials_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `exams_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exams_courses_relations`
--
ALTER TABLE `exams_courses_relations`
  ADD CONSTRAINT `exams_courses_relations_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `exams_courses_relations_courses_id_courses_fk` FOREIGN KEY (`id_courses`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `exams_courses_relations_exams_id_exam_fk` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id_exam`),
  ADD CONSTRAINT `exams_courses_relations_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD CONSTRAINT `exam_answers_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `exam_answers_exams_id_exam_fk` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id_exam`),
  ADD CONSTRAINT `exam_answers_questions_id_question_fk` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `exam_answers_users_id_fk` FOREIGN KEY (`id_participant`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_participant`
--
ALTER TABLE `exam_participant`
  ADD CONSTRAINT `exam_participant_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `exam_participant_exams_id_exam_fk` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id_exam`),
  ADD CONSTRAINT `exam_participant_users_id_fk` FOREIGN KEY (`id_participant`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `exam_participant_users_id_fk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `general_activity_log`
--
ALTER TABLE `general_activity_log`
  ADD CONSTRAINT `general_activity_log_users_id_fk` FOREIGN KEY (`access_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `l_e_categories`
--
ALTER TABLE `l_e_categories`
  ADD CONSTRAINT `l_e_categories_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `l_e_categories_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `l_e_ratings`
--
ALTER TABLE `l_e_ratings`
  ADD CONSTRAINT `l_e_ratings_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `l_e_ratings_courses_id_courses_fk` FOREIGN KEY (`id_post`) REFERENCES `courses` (`id_courses`),
  ADD CONSTRAINT `l_e_ratings_exams_id_exam_fk` FOREIGN KEY (`id_post`) REFERENCES `exams` (`id_exam`),
  ADD CONSTRAINT `l_e_ratings_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_users_id_fk` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `questions_exams_id_exam_fk` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id_exam`),
  ADD CONSTRAINT `questions_question_type_id_q_type_fk` FOREIGN KEY (`type`) REFERENCES `question_type` (`id_q_type`),
  ADD CONSTRAINT `questions_users_id_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions_option`
--
ALTER TABLE `questions_option`
  ADD CONSTRAINT `questions_option_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `questions_option_questions_id_question_fk` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Constraints for table `srv_transactions`
--
ALTER TABLE `srv_transactions`
  ADD CONSTRAINT `srv_transactions_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `srv_transactions_users_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `srv_transaction_items`
--
ALTER TABLE `srv_transaction_items`
  ADD CONSTRAINT `srv_transaction_items_srv_attributes_id_s_attributes_fk` FOREIGN KEY (`id_s_attribute`) REFERENCES `srv_attributes` (`id_s_attributes`),
  ADD CONSTRAINT `srv_transaction_items_srv_transactions_id_s_transaction_fk` FOREIGN KEY (`id_s_transaction`) REFERENCES `srv_transactions` (`id_s_transaction`);

--
-- Constraints for table `user_srv_dtl`
--
ALTER TABLE `user_srv_dtl`
  ADD CONSTRAINT `user_srv_dtl_companies_id_company_fk` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `user_srv_dtl_users_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
