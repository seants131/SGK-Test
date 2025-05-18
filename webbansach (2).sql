-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `don_hang_id` bigint(20) UNSIGNED NOT NULL,
  `sach_id` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Sách Giáo Khoa Lớp 6', NULL, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(2, 'Sách Giáo Khoa Lớp 7', NULL, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(3, 'Sách Giáo Khoa Lớp 8', NULL, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(4, 'Sách Giáo Khoa Lớp 9', NULL, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(5, 'Sách Lớp 6 Chân Trời Sáng Tạo', 1, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(6, 'Sách Lớp 6 Kết Nối Tri Thức', 1, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(7, 'Lớp 6 Cánh Diều', 1, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(8, 'Sách Dùng Chung SGK Lớp 6', 1, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(9, 'Sách Lớp 7 Chân Trời Sáng Tạo', 2, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(10, 'Sách Lớp 7 Kết Nối Tri Thức', 2, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(11, 'Sách Lớp 7 Cánh Diều', 2, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(12, 'Sách Dùng Chung SGK Lớp 7', 2, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(13, 'Sách Lớp 8 Chân Trời Sáng Tạo', 3, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(14, 'Sách Lớp 8 Kết Nối Tri Thức', 3, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(15, 'Sách Lớp 8 Cánh Diều', 3, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(16, 'Sách Dùng Chung SGK Lớp 8', 3, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(17, 'Sách Lớp 9 Chân Trời Sáng Tạo', 4, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(18, 'Sách Lớp 9 Kết Nối Tri Thức', 4, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(19, 'Sách Lớp 9 Cánh Diều', 4, '2025-05-05 03:42:36', '2025-05-05 03:42:36'),
(20, 'Sách Dùng Chung SGK Lớp 9', 4, '2025-05-05 03:42:36', '2025-05-05 03:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khach_hang_id` bigint(20) UNSIGNED NOT NULL,
  `ngay_dat` date NOT NULL,
  `trang_thai` enum('Cho xu ly','Dang giao','Hoan thanh','Huy') NOT NULL,
  `tong_tien` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `khach_hang_id`, `ngay_dat`, `trang_thai`, `tong_tien`, `created_at`, `updated_at`) VALUES
(3, 1, '2025-05-08', 'Cho xu ly', 20000, '2025-05-07 18:46:29', '2025-05-07 18:46:29'),
(5, 2, '2025-05-09', 'Cho xu ly', 400000, '2025-05-07 19:05:26', '2025-05-07 19:05:26'),
(6, 1, '2025-05-12', 'Cho xu ly', 34002, '2025-05-07 19:11:37', '2025-05-07 19:17:10'),
(7, 1, '2025-05-08', 'Cho xu ly', 1, '2025-05-07 19:37:35', '2025-05-07 19:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khach_hang_id` bigint(20) UNSIGNED NOT NULL,
  `sach_id` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ho_ten`, `email`, `so_dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a@gmail.com', '034', 'a', NULL, '2025-05-15 18:18:13'),
(2, 'b', 'b@gmail.com', '03', 'b', NULL, NULL),
(5, 'c', 'c@gmail.com', '034', 'c', '2025-05-15 18:23:55', '2025-05-15 18:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_khuyen_mai` varchar(255) NOT NULL,
  `giam_gia` bigint(20) UNSIGNED NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_29_112748_web_ban_sach', 1),
(5, '2025_05_16_015029_add_is_admin_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_nxb` varchar(255) NOT NULL,
  `dia_chi` text DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `MaSach` bigint(20) UNSIGNED NOT NULL,
  `TenSach` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TacGia` varchar(255) DEFAULT NULL,
  `GiaNhap` decimal(15,2) DEFAULT NULL,
  `GiaBan` decimal(15,2) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 0,
  `NamXuatBan` int(11) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT 1,
  `LuotMua` int(11) NOT NULL DEFAULT 0,
  `HinhAnh` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `slug`, `category_id`, `TacGia`, `GiaNhap`, `GiaBan`, `SoLuong`, `NamXuatBan`, `MoTa`, `TrangThai`, `LuotMua`, `HinhAnh`, `created_at`, `updated_at`) VALUES
(1, 'Âm Nhạc lớp 6 CTST', 'am-nhac-lop-6-ctst', 12, 'nhà xuất  bản a', 10000.00, 10000.00, 1, 2012, NULL, 1, 0, NULL, '2025-05-04 20:46:44', '2025-05-04 20:46:44'),
(2, 'Âm Nhạc lớp 7 CTST', 'am-nhac-lop-7-ctst', 2, 'nhà xuất  bản b', 10000.00, 10000.00, 1, 2012, NULL, 1, 0, NULL, '2025-05-04 21:02:44', '2025-05-04 21:02:44'),
(3, 'Âm Nhạc lớp 6 CTST', 'am-nhac-lop-6-ctst', 12, 'nhà xuất  bản a', 10000.00, 10000.00, 1, 2012, NULL, 1, 0, NULL, '2025-06-05 20:46:44', '2025-06-05 20:46:44'),
(4, 'Âm Nhạc lớp 6 CTST', 'am-nhac-lop-6-ctst', 12, 'aa', 10000.00, 10000.00, 1, 2012, NULL, 1, 0, NULL, '2025-06-05 20:46:44', '2025-06-05 20:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MlGKvKk3cGynAeGtJ9cl0kuPZattdtSoFMJNM2SU', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic2VzQnh4N2lUQ084UVdUeExnR1E2cmR2Tk92S2pQa1JIbHZxeHZUVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1747540228),
('QQdUbpM8PFHj1qIg2LhUC2OUQCrfIJzTaolEfUYX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazNOaFVOMVpmUFFEQlRSa25GYnMyd0VVUUxZSk81VGxMS1pYVkh3aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747534901);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_tac_gia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `don_hang_id` bigint(20) UNSIGNED NOT NULL,
  `phuong_thuc` enum('Tien mat','Chuyen khoan','Vi dien tu') NOT NULL,
  `trang_thai` enum('Chua thanh toan','Da thanh toan') NOT NULL,
  `ngay_thanh_toan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(2, 'Admin', 'admin@example.com', NULL, '$2y$12$FFvGgQ18Nk0XQsgYMZinUelzXzrd3v/y1L4HDs6UhC.Ieg4h3rrl2', NULL, '2025-05-08 03:57:27', '2025-05-08 03:57:27', 0),
(3, 'admin1', 'admin1@example.com', NULL, '$2y$12$J3wPTqi67fdREX511sACIulcq6A8YvEW0DifrIo7XHxaTZ/kkokCK', NULL, '2025-05-15 18:54:20', '2025-05-15 18:54:20', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_don_hang_id_foreign` (`don_hang_id`),
  ADD KEY `chitietdonhang_sach_id_foreign` (`sach_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_khach_hang_id_foreign` (`khach_hang_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `giohang_sach_id_foreign` (`sach_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_email_unique` (`email`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khuyenmai_ma_khuyen_mai_unique` (`ma_khuyen_mai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `sach_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanhtoan_don_hang_id_foreign` (`don_hang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `MaSach` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_sach_id_foreign` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;

--
-- Constraints for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `danhmuc_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `giohang_sach_id_foreign` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`MaSach`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `danhmuc` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `donhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
