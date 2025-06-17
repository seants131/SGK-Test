-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 02:11 AM
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
create database bookshop;
use bookshop;
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

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

-- INSERT INTO danhmuc (id, name, parent_id, created_at, updated_at) VALUES
-- (1, 'Sách Giáo Khoa Lớp 6', NULL, NOW(), NOW()),
-- (2, 'Sách Giáo Khoa Lớp 7', NULL, NOW(), NOW()),
-- (3, 'Sách Giáo Khoa Lớp 8', NULL, NOW(), NOW()),
-- (4, 'Sách Giáo Khoa Lớp 9', NULL, NOW(), NOW());
-- INSERT INTO danhmuc (name, parent_id, created_at, updated_at) VALUES
-- ('Sách Lớp 6 Chân Trời Sáng Tạo', 1, NOW(), NOW()),
-- ('Sách Lớp 6 Kết Nối Tri Thức', 1, NOW(), NOW()),
-- ('Lớp 6 Cánh Diều', 1, NOW(), NOW()),
-- ('Sách Dùng Chung SGK Lớp 6', 1, NOW(), NOW()),

-- ('Sách Lớp 7 Chân Trời Sáng Tạo', 2, NOW(), NOW()),
-- ('Sách Lớp 7 Kết Nối Tri Thức', 2, NOW(), NOW()),
-- ('Sách Lớp 7 Cánh Diều', 2, NOW(), NOW()),
-- ('Sách Dùng Chung SGK Lớp 7', 2, NOW(), NOW()),

-- ('Sách Lớp 8 Chân Trời Sáng Tạo', 3, NOW(), NOW()),
-- ('Sách Lớp 8 Kết Nối Tri Thức', 3, NOW(), NOW()),
-- ('Sách Lớp 8 Cánh Diều', 3, NOW(), NOW()),
-- ('Sách Dùng Chung SGK Lớp 8', 3, NOW(), NOW()),

-- ('Sách Lớp 9 Chân Trời Sáng Tạo', 4, NOW(), NOW()),
-- ('Sách Lớp 9 Kết Nối Tri Thức', 4, NOW(), NOW()),
-- ('Sách Lớp 9 Cánh Diều', 4, NOW(), NOW()),
-- ('Sách Dùng Chung SGK Lớp 9', 4, NOW(), NOW());

CREATE TABLE `donhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khach_hang_id` bigint(20) UNSIGNED NOT NULL,
  `ngay_dat` date NOT NULL,
  `trang_thai` enum('Cho xu ly','Dang giao','Hoan thanh','Huy') NOT NULL,
  `tong_tien` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2025_03_29_112748_web_ban_sach', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_sach` varchar(255) NOT NULL,
  `the_loai_id` bigint(20) UNSIGNED NOT NULL,
  `nxb_id` bigint(20) UNSIGNED NOT NULL,
  `tac_gia_id` bigint(20) UNSIGNED NOT NULL,
  `nam_xuat_ban` int(11) NOT NULL,
  `gia` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `mo_ta` text DEFAULT NULL,
  `lop` tinyint(4) NOT NULL COMMENT 'Lớp học: 6, 7, 8, 9,...',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
INSERT INTO sach (TenSach, slug, LoaiSanPham, TacGia, GiaBia, SoLuong, NamXuatBan, MoTa, TrangThai, LuotMua, HinhAnh, Lop, NXB, created_at, updated_at)
VALUES
('Toán lớp 6', 'toan-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 10000, 0, 2024, 'Sách Toán lớp 6 theo chương trình mới.', 1, 0, 'toan-lop-6.png', '6', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Ngữ Văn lớp 6', 'ngu-van-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 11000, 0, 2023, 'Sách Ngữ Văn lớp 6 theo chương trình mới.', 1, 0, 'ngu-van-lop-6.png', '6', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tiếng Anh lớp 6', 'tieng-anh-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 12000, 0, 2022, 'Sách Tiếng Anh lớp 6 theo chương trình mới.', 1, 0, 'tieng-anh-lop-6.png', '6', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Vật Lý lớp 6', 'vat-ly-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 13000, 0, 2021, 'Sách Vật Lý lớp 6 theo chương trình mới.', 1, 0, 'vat-ly-lop-6.png', '6', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Hóa Học lớp 6', 'hoa-hoc-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 14000, 0, 2024, 'Sách Hóa Học lớp 6 theo chương trình mới.', 1, 0, 'hoa-hoc-lop-6.png', '6', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Sinh Học lớp 6', 'sinh-hoc-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 15000, 0, 2023, 'Sách Sinh Học lớp 6 theo chương trình mới.', 1, 0, 'sinh-hoc-lop-6.png', '6', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Lịch Sử lớp 6', 'lich-su-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 16000, 0, 2022, 'Sách Lịch Sử lớp 6 theo chương trình mới.', 1, 0, 'lich-su-lop-6.png', '6', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Địa Lý lớp 6', 'ia-ly-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 17000, 0, 2021, 'Sách Địa Lý lớp 6 theo chương trình mới.', 1, 0, 'ia-ly-lop-6.png', '6', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('GDCD lớp 6', 'gdcd-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 18000, 0, 2024, 'Sách GDCD lớp 6 theo chương trình mới.', 1, 0, 'gdcd-lop-6.png', '6', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tin Học lớp 6', 'tin-hoc-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 19000, 0, 2023, 'Sách Tin Học lớp 6 theo chương trình mới.', 1, 0, 'tin-hoc-lop-6.png', '6', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Công Nghệ lớp 6', 'cong-nghe-lop-6', 'sach_giao_khoa', 'Nhiều tác giả', 20000, 0, 2022, 'Sách Công Nghệ lớp 6 theo chương trình mới.', 1, 0, 'cong-nghe-lop-6.png', '6', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Âm Nhạc lớp 6', 'am-nhac-lop-6', 'sach_tham_khao', 'Nhiều tác giả', 21000, 0, 2021, 'Sách Âm Nhạc lớp 6 theo chương trình mới.', 1, 0, 'am-nhac-lop-6.png', '6', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Toán lớp 7', 'toan-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 10000, 0, 2024, 'Sách Toán lớp 7 theo chương trình mới.', 1, 0, 'toan-lop-7.png', '7', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Ngữ Văn lớp 7', 'ngu-van-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 11000, 0, 2023, 'Sách Ngữ Văn lớp 7 theo chương trình mới.', 1, 0, 'ngu-van-lop-7.png', '7', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tiếng Anh lớp 7', 'tieng-anh-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 12000, 0, 2022, 'Sách Tiếng Anh lớp 7 theo chương trình mới.', 1, 0, 'tieng-anh-lop-7.png', '7', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Vật Lý lớp 7', 'vat-ly-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 13000, 0, 2021, 'Sách Vật Lý lớp 7 theo chương trình mới.', 1, 0, 'vat-ly-lop-7.png', '7', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Hóa Học lớp 7', 'hoa-hoc-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 14000, 0, 2024, 'Sách Hóa Học lớp 7 theo chương trình mới.', 1, 0, 'hoa-hoc-lop-7.png', '7', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Sinh Học lớp 7', 'sinh-hoc-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 15000, 0, 2023, 'Sách Sinh Học lớp 7 theo chương trình mới.', 1, 0, 'sinh-hoc-lop-7.png', '7', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Lịch Sử lớp 7', 'lich-su-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 16000, 0, 2022, 'Sách Lịch Sử lớp 7 theo chương trình mới.', 1, 0, 'lich-su-lop-7.png', '7', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Địa Lý lớp 7', 'ia-ly-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 17000, 0, 2021, 'Sách Địa Lý lớp 7 theo chương trình mới.', 1, 0, 'ia-ly-lop-7.png', '7', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('GDCD lớp 7', 'gdcd-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 18000, 0, 2024, 'Sách GDCD lớp 7 theo chương trình mới.', 1, 0, 'gdcd-lop-7.png', '7', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tin Học lớp 7', 'tin-hoc-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 19000, 0, 2023, 'Sách Tin Học lớp 7 theo chương trình mới.', 1, 0, 'tin-hoc-lop-7.png', '7', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Công Nghệ lớp 7', 'cong-nghe-lop-7', 'sach_giao_khoa', 'Nhiều tác giả', 20000, 0, 2022, 'Sách Công Nghệ lớp 7 theo chương trình mới.', 1, 0, 'cong-nghe-lop-7.png', '7', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Âm Nhạc lớp 7', 'am-nhac-lop-7', 'sach_tham_khao', 'Nhiều tác giả', 21000, 0, 2021, 'Sách Âm Nhạc lớp 7 theo chương trình mới.', 1, 0, 'am-nhac-lop-7.png', '7', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Toán lớp 8', 'toan-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 10000, 0, 2024, 'Sách Toán lớp 8 theo chương trình mới.', 1, 0, 'toan-lop-8.png', '8', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Ngữ Văn lớp 8', 'ngu-van-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 11000, 0, 2023, 'Sách Ngữ Văn lớp 8 theo chương trình mới.', 1, 0, 'ngu-van-lop-8.png', '8', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tiếng Anh lớp 8', 'tieng-anh-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 12000, 0, 2022, 'Sách Tiếng Anh lớp 8 theo chương trình mới.', 1, 0, 'tieng-anh-lop-8.png', '8', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Vật Lý lớp 8', 'vat-ly-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 13000, 0, 2021, 'Sách Vật Lý lớp 8 theo chương trình mới.', 1, 0, 'vat-ly-lop-8.png', '8', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Hóa Học lớp 8', 'hoa-hoc-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 14000, 0, 2024, 'Sách Hóa Học lớp 8 theo chương trình mới.', 1, 0, 'hoa-hoc-lop-8.png', '8', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Sinh Học lớp 8', 'sinh-hoc-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 15000, 0, 2023, 'Sách Sinh Học lớp 8 theo chương trình mới.', 1, 0, 'sinh-hoc-lop-8.png', '8', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Lịch Sử lớp 8', 'lich-su-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 16000, 0, 2022, 'Sách Lịch Sử lớp 8 theo chương trình mới.', 1, 0, 'lich-su-lop-8.png', '8', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Địa Lý lớp 8', 'ia-ly-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 17000, 0, 2021, 'Sách Địa Lý lớp 8 theo chương trình mới.', 1, 0, 'ia-ly-lop-8.png', '8', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('GDCD lớp 8', 'gdcd-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 18000, 0, 2024, 'Sách GDCD lớp 8 theo chương trình mới.', 1, 0, 'gdcd-lop-8.png', '8', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tin Học lớp 8', 'tin-hoc-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 19000, 0, 2023, 'Sách Tin Học lớp 8 theo chương trình mới.', 1, 0, 'tin-hoc-lop-8.png', '8', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Công Nghệ lớp 8', 'cong-nghe-lop-8', 'sach_giao_khoa', 'Nhiều tác giả', 20000, 0, 2022, 'Sách Công Nghệ lớp 8 theo chương trình mới.', 1, 0, 'cong-nghe-lop-8.png', '8', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Âm Nhạc lớp 8', 'am-nhac-lop-8', 'sach_tham_khao', 'Nhiều tác giả', 21000, 0, 2021, 'Sách Âm Nhạc lớp 8 theo chương trình mới.', 1, 0, 'am-nhac-lop-8.png', '8', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Toán lớp 9', 'toan-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 10000, 0, 2024, 'Sách Toán lớp 9 theo chương trình mới.', 1, 0, 'toan-lop-9.png', '9', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Ngữ Văn lớp 9', 'ngu-van-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 11000, 0, 2023, 'Sách Ngữ Văn lớp 9 theo chương trình mới.', 1, 0, 'ngu-van-lop-9.png', '9', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tiếng Anh lớp 9', 'tieng-anh-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 12000, 0, 2022, 'Sách Tiếng Anh lớp 9 theo chương trình mới.', 1, 0, 'tieng-anh-lop-9.png', '9', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Vật Lý lớp 9', 'vat-ly-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 13000, 0, 2021, 'Sách Vật Lý lớp 9 theo chương trình mới.', 1, 0, 'vat-ly-lop-9.png', '9', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Hóa Học lớp 9', 'hoa-hoc-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 14000, 0, 2024, 'Sách Hóa Học lớp 9 theo chương trình mới.', 1, 0, 'hoa-hoc-lop-9.png', '9', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Sinh Học lớp 9', 'sinh-hoc-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 15000, 0, 2023, 'Sách Sinh Học lớp 9 theo chương trình mới.', 1, 0, 'sinh-hoc-lop-9.png', '9', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Lịch Sử lớp 9', 'lich-su-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 16000, 0, 2022, 'Sách Lịch Sử lớp 9 theo chương trình mới.', 1, 0, 'lich-su-lop-9.png', '9', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Địa Lý lớp 9', 'ia-ly-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 17000, 0, 2021, 'Sách Địa Lý lớp 9 theo chương trình mới.', 1, 0, 'ia-ly-lop-9.png', '9', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('GDCD lớp 9', 'gdcd-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 18000, 0, 2024, 'Sách GDCD lớp 9 theo chương trình mới.', 1, 0, 'gdcd-lop-9.png', '9', 'NXB Giáo dục', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Tin Học lớp 9', 'tin-hoc-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 19000, 0, 2023, 'Sách Tin Học lớp 9 theo chương trình mới.', 1, 0, 'tin-hoc-lop-9.png', '9', 'NXB Trẻ', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Công Nghệ lớp 9', 'cong-nghe-lop-9', 'sach_giao_khoa', 'Nhiều tác giả', 20000, 0, 2022, 'Sách Công Nghệ lớp 9 theo chương trình mới.', 1, 0, 'cong-nghe-lop-9.png', '9', 'NXB Đại Học Sư Phạm', '2025-06-16 06:35:50', '2025-06-16 06:35:50'),
('Âm Nhạc lớp 9', 'am-nhac-lop-9', 'sach_tham_khao', 'Nhiều tác giả', 21000, 0, 2021, 'Sách Âm Nhạc lớp 9 theo chương trình mới.', 1, 0, 'am-nhac-lop-9.png', '9', 'NXB Tổng hợp', '2025-06-16 06:35:50', '2025-06-16 06:35:50');

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
('uXsKEkIIjb6Neu2Bi5dJ6LYmEV6i2ayVYe4P8OyP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjd1MXhXZEpuaVU1MDNRZW02WFdQZWVuWFFkb1dOakVvUTBiTEowVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744588703);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sach_the_loai_id_foreign` (`the_loai_id`),
  ADD KEY `sach_nxb_id_foreign` (`nxb_id`),
  ADD KEY `sach_tac_gia_id_foreign` (`tac_gia_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdonhang_sach_id_foreign` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`id`);

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
  ADD CONSTRAINT `giohang_sach_id_foreign` FOREIGN KEY (`sach_id`) REFERENCES `sach` (`id`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_nxb_id_foreign` FOREIGN KEY (`nxb_id`) REFERENCES `nhaxuatban` (`id`),
  ADD CONSTRAINT `sach_tac_gia_id_foreign` FOREIGN KEY (`tac_gia_id`) REFERENCES `tacgia` (`id`),
  ADD CONSTRAINT `sach_the_loai_id_foreign` FOREIGN KEY (`the_loai_id`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `donhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
