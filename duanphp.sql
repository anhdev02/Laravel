-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th2 23, 2023 lúc 02:57 AM
-- Phiên bản máy phục vụ: 5.7.40
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tuyen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ga_len` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ga_xuong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `so_dien_thoai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanh_tien` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `tuyen`, `ga_len`, `ga_xuong`, `so_luong`, `thoi_gian_dat`, `so_dien_thoai`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(1, 'Tuyến số 1', 'Bến Thành', 'Bến Thành', '1', '2023-02-22 12:14:35', '1111111111', 12000.00, '2023-02-22 05:14:35', '2023-02-22 05:14:35'),
(2, 'Tuyến số 2', 'Dân Chủ', 'Bảy Hiền', '3', '2023-02-22 13:37:07', '2222222222', 30000.00, '2023-02-22 06:37:07', '2023-02-22 06:37:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_02_19_011749_create_tuyens_table', 1),
(23, '2023_02_20_071534_create_bookings_table', 2),
(21, '2023_02_22_114107_create_nha_ga_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_gas`
--

DROP TABLE IF EXISTS `nha_gas`;
CREATE TABLE IF NOT EXISTS `nha_gas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_tuyen` int(11) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `ten_nha_ga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nha_gas_ma_tuyen_foreign` (`ma_tuyen`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_gas`
--

INSERT INTO `nha_gas` (`id`, `ma_tuyen`, `thu_tu`, `ten_nha_ga`, `created_at`, `updated_at`) VALUES
(16, 1, 1, 'Bến Thành', NULL, NULL),
(17, 1, 2, 'Nhà hát TP', NULL, NULL),
(18, 1, 3, 'Ba Son', NULL, NULL),
(19, 1, 4, 'Văn Thánh', NULL, NULL),
(20, 1, 5, 'Tân Cảng', NULL, NULL),
(21, 1, 6, 'Thảo Điền', NULL, NULL),
(22, 1, 7, 'An Phú', NULL, NULL),
(23, 1, 8, 'Rạch Chiếc', NULL, NULL),
(24, 1, 9, 'Phước Long', NULL, NULL),
(25, 1, 10, 'Bình Thái', NULL, NULL),
(26, 1, 11, 'Thủ Đức', NULL, NULL),
(27, 1, 12, 'Khu Công nghệ cao', NULL, NULL),
(28, 1, 13, 'Suối Tiên', NULL, NULL),
(29, 1, 14, 'BXNĐ mới', NULL, NULL),
(30, 2, 1, 'Bến Thành', NULL, NULL),
(31, 2, 2, 'Tao Đàn', NULL, NULL),
(32, 2, 3, 'Dân Chủ', NULL, NULL),
(33, 2, 4, 'Hoàng Hưng', NULL, NULL),
(34, 2, 5, 'Lê Thị Riêng', NULL, NULL),
(35, 2, 6, 'Phạm Văn Hai', NULL, NULL),
(36, 2, 7, 'Bảy Hiền', NULL, NULL),
(37, 2, 8, 'Đồng Đen', NULL, NULL),
(38, 2, 9, 'Nguyễn Hồng Đào', NULL, NULL),
(39, 2, 10, 'Bà Quẹo', NULL, NULL),
(40, 2, 11, 'Phạm Văn Bạch', NULL, NULL),
(41, 2, 12, 'Tham Lương', NULL, NULL),
(42, 2, 13, 'Tân Thới Nhất', NULL, NULL),
(43, 2, 14, 'BX An Sương', NULL, NULL),
(44, 3, 1, 'Chợ Tân Bình', NULL, NULL),
(45, 3, 2, 'Bảy Hiền', NULL, NULL),
(46, 3, 3, 'Lăng Cha Cả', NULL, NULL),
(47, 3, 4, 'Hoàng Văn Thụ', NULL, NULL),
(48, 3, 5, 'Phú Nhuận', NULL, NULL),
(49, 3, 6, 'Nguyễn Văn Đậu', NULL, NULL),
(50, 3, 7, 'Bà Chiểu', NULL, NULL),
(51, 3, 8, 'Hàng Xanh', NULL, NULL),
(52, 3, 9, 'Tân Cảng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyens`
--

DROP TABLE IF EXISTS `tuyens`;
CREATE TABLE IF NOT EXISTS `tuyens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_tuyen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_hd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chieu_dai` double(8,2) NOT NULL,
  `gia_ve_toi_thieu` double(8,2) NOT NULL,
  `don_gia_ga` double(8,2) NOT NULL,
  `tong_so_ga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyens`
--

INSERT INTO `tuyens` (`id`, `ten_tuyen`, `thoi_gian_hd`, `chieu_dai`, `gia_ve_toi_thieu`, `don_gia_ga`, `tong_so_ga`, `created_at`, `updated_at`) VALUES
(1, 'Tuyến số 1', '5:00 - 21:00', 19.70, 12000.00, 12000.00, 14, NULL, NULL),
(2, 'Tuyến số 2', '4:30 - 21:00', 9.10, 10000.00, 3000.00, 14, NULL, NULL),
(3, 'Tuyến số 5A', '5:30 - 20:30', 5.20, 8000.00, 2000.00, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
