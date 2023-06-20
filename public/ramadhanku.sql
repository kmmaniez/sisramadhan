-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2023 pada 17.47
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramadhanku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukber_warga`
--

CREATE TABLE `bukber_warga` (
  `konsumsi_id` bigint(20) UNSIGNED NOT NULL,
  `warga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukber_warga`
--

INSERT INTO `bukber_warga` (`konsumsi_id`, `warga_id`) VALUES
(6, 51),
(7, 54),
(7, 55),
(13, 71),
(20, 93),
(28, 105);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabur_warga`
--

CREATE TABLE `jabur_warga` (
  `konsumsi_id` bigint(20) UNSIGNED NOT NULL,
  `warga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabur_warga`
--

INSERT INTO `jabur_warga` (`konsumsi_id`, `warga_id`) VALUES
(3, 16),
(3, 18),
(4, 19),
(4, 20),
(5, 49),
(5, 50),
(6, 52),
(8, 59),
(8, 60),
(8, 61),
(9, 58),
(9, 63),
(10, 65),
(11, 67),
(12, 70),
(13, 72),
(14, 75),
(14, 76),
(15, 78),
(15, 79),
(15, 80),
(16, 82),
(17, 85),
(17, 86),
(18, 88),
(18, 89),
(19, 91),
(19, 92),
(20, 94),
(22, 96),
(22, 97),
(23, 59),
(23, 99),
(24, 87),
(24, 100),
(25, 68),
(25, 69),
(26, 87),
(26, 103),
(27, 56),
(27, 57),
(28, 106),
(28, 107),
(29, 108),
(29, 109),
(29, 111),
(30, 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ajar`
--

CREATE TABLE `jadwal_ajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ustadh` bigint(20) UNSIGNED NOT NULL,
  `id_hari` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_masehi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_ajar`
--

INSERT INTO `jadwal_ajar` (`id`, `id_ustadh`, `id_hari`, `tahun`, `keterangan`, `tgl_masehi`) VALUES
(6, 6, 5, '2023', 'menghafal doa sehari hari', '2023-03-24'),
(7, 25, 5, '2023', 'menghafal doa sehari hari', '2023-03-04'),
(8, 16, 1, '2023', '-', '2023-03-24'),
(9, 19, 5, '2023', '-', '2023-03-24'),
(10, 31, 2, '2023', 'praktek sholat', '2023-04-20'),
(11, 18, 2, '2023', '-', '2023-03-24'),
(12, 9, 3, '2023', '-', '2023-04-23'),
(13, 21, 4, '2023', '-', '2023-04-20'),
(14, 13, 6, '2023', '-', '2023-04-10'),
(15, 15, 2, '2023', '-', '2023-04-23'),
(16, 29, 1, '2023', '-', '2023-03-24'),
(17, 30, 1, '2023', '-', '2023-03-24'),
(18, 19, 3, '2023', '-', '2023-04-24'),
(19, 7, 4, '2023', '-', '2023-03-24'),
(20, 33, 4, '2023', '-', '2023-04-25'),
(21, 17, 4, '2023', '-', '2023-04-26'),
(22, 10, 3, '2023', '-', '2023-03-29'),
(23, 32, 1, '2023', '-', '2023-04-28'),
(24, 6, 6, '2023', '-', '2023-04-29'),
(25, 20, 6, '2023', '-', '2023-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `khataman_nuzulul`
--

CREATE TABLE `khataman_nuzulul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `khataman_nuzulul`
--

INSERT INTO `khataman_nuzulul` (`id`, `tgl_kegiatan`, `jenis_kegiatan`, `keterangan`) VALUES
(6, '2023-04-18', 'Khataman & Nuzulul Quran', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumsi`
--

CREATE TABLE `konsumsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `warga_takjil` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`warga_takjil`)),
  `warga_bukber` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`warga_bukber`)),
  `warga_jabur` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`warga_jabur`)),
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsumsi`
--

INSERT INTO `konsumsi` (`id`, `tgl_kegiatan`, `warga_takjil`, `warga_bukber`, `warga_jabur`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, '2023-03-23', 'null', 'null', '[\"16\",\"18\"]', 'TPA belum mulai jadi tidak ada takjil', '2023-06-17 00:44:55', '2023-06-17 00:45:05'),
(4, '2023-03-24', '[\"16\",\"18\"]', '[\"20\"]', '[\"19\",\"20\"]', '-', '2023-06-17 00:49:35', '2023-06-17 19:05:51'),
(5, '2023-03-25', '[\"20\",\"48\"]', 'null', '[\"49\",\"50\"]', '-', '2023-06-17 19:04:33', '2023-06-17 19:06:42'),
(6, '2023-03-26', 'null', '[\"51\"]', '[\"52\"]', '-', '2023-06-19 05:20:17', '2023-06-19 05:20:30'),
(7, '2023-03-27', '[\"53\"]', '[\"54\",\"55\"]', 'null', '-', '2023-06-19 05:24:30', '2023-06-19 05:24:30'),
(8, '2023-03-28', '[\"56\",\"57\",\"58\"]', 'null', '[\"59\",\"60\",\"61\"]', '-', '2023-06-19 05:31:18', '2023-06-19 05:31:31'),
(9, '2023-03-29', '[\"62\"]', 'null', '[\"58\",\"63\"]', '-', '2023-06-19 05:41:57', '2023-06-19 05:42:04'),
(10, '2023-03-30', '[\"64\"]', 'null', '[\"65\"]', '-', '2023-06-19 05:44:30', '2023-06-19 05:44:37'),
(11, '2023-03-31', '[\"66\"]', 'null', '[\"67\"]', '-', '2023-06-19 05:48:13', '2023-06-19 05:48:28'),
(12, '2023-04-01', '[\"68\",\"69\"]', 'null', '[\"70\"]', '-', '2023-06-19 06:50:47', '2023-06-19 06:50:57'),
(13, '2023-04-02', '[\"16\"]', '[\"71\"]', '[\"72\"]', '-', '2023-06-19 06:52:42', '2023-06-19 06:53:10'),
(14, '2023-04-03', '[\"73\",\"74\"]', 'null', '[\"75\",\"76\"]', '-', '2023-06-19 06:57:04', '2023-06-19 06:57:11'),
(15, '2023-04-04', '[\"77\"]', 'null', '[\"78\",\"79\",\"80\"]', '-', '2023-06-19 07:00:25', '2023-06-19 07:00:34'),
(16, '2023-04-05', '[\"81\"]', 'null', '[\"82\"]', '-', '2023-06-19 07:02:19', '2023-06-19 07:02:26'),
(17, '2023-04-06', '[\"83\",\"84\"]', 'null', '[\"85\",\"86\"]', '-', '2023-06-19 07:22:22', '2023-06-19 07:22:29'),
(18, '2023-04-07', '[\"87\"]', 'null', '[\"88\",\"89\"]', '-', '2023-06-19 07:28:51', '2023-06-19 07:28:58'),
(19, '2023-04-08', '[\"90\"]', 'null', '[\"91\",\"92\"]', NULL, '2023-06-19 07:47:39', '2023-06-19 07:48:30'),
(20, '2023-04-09', 'null', '[\"93\"]', '[\"94\"]', '-', '2023-06-19 07:51:00', '2023-06-19 07:51:23'),
(22, '2023-04-10', '[\"95\"]', 'null', '[\"96\",\"97\"]', '-', '2023-06-19 07:55:23', '2023-06-19 07:55:54'),
(23, '2023-04-11', '[\"98\"]', 'null', '[\"59\",\"99\"]', '-', '2023-06-19 08:01:18', '2023-06-19 08:14:44'),
(24, '2023-04-12', '[\"101\"]', 'null', '[\"87\",\"100\"]', '-', '2023-06-19 08:23:15', '2023-06-19 08:26:00'),
(25, '2023-04-13', '[\"102\"]', 'null', '[\"68\",\"69\"]', '-', '2023-06-19 08:27:48', '2023-06-19 08:28:11'),
(26, '2023-04-14', '[\"100\"]', 'null', '[\"87\",\"103\"]', '-', '2023-06-19 08:31:17', '2023-06-19 08:31:28'),
(27, '2023-04-15', '[\"104\"]', 'null', '[\"56\",\"57\"]', '-', '2023-06-19 08:32:51', '2023-06-19 08:33:27'),
(28, '2023-04-16', 'null', '[\"105\"]', '[\"106\",\"107\"]', '-', '2023-06-19 08:36:11', '2023-06-19 08:40:16'),
(29, '2028-04-17', '[\"112\"]', 'null', '[\"108\",\"109\",\"111\"]', '-', '2023-06-19 08:41:24', '2023-06-19 08:43:14'),
(30, '2023-04-18', '[\"110\"]', 'null', '[\"64\"]', '-', '2023-06-19 08:44:10', '2023-06-19 08:44:18'),
(31, '2023-04-19', '[\"113\"]', 'null', 'null', NULL, '2023-06-19 08:45:36', '2023-06-19 08:46:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_11_034408_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_11_034734_create_wargas_table', 1),
(7, '2023_04_11_034849_create_tadaruses_table', 1),
(8, '2023_04_11_034950_create_takbirans_table', 1),
(9, '2023_04_11_035100_create_haris_table', 1),
(10, '2023_04_11_035236_create_ustadhs_table', 1),
(11, '2023_04_11_040521_create_jadwal_ajars_table', 1),
(12, '2023_04_12_014829_create_sholatieds_table', 1),
(13, '2023_04_12_014843_create_khatamen_table', 1),
(14, '2023_04_12_014855_create_zakats_table', 1),
(15, '2023_04_12_152703_create_tarawihs_table', 1),
(16, '2023_04_12_154225_create_konsumsis_table', 1),
(17, '2023_04_14_025917_create_social_accounts_table', 1),
(18, '2023_06_12_023121_create_takbiran_warga_table', 1),
(19, '2023_06_14_065815_create_bukber_warga_table', 1),
(20, '2023_06_15_131212_create_jabur_warga_table', 1),
(21, '2023_06_15_131221_create_takjil_warga_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`) VALUES
(1, 'panitia'),
(2, 'takmir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sholatied`
--

CREATE TABLE `sholatied` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tmpt_sholat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sholatied`
--

INSERT INTO `sholatied` (`id`, `tgl_kegiatan`, `tmpt_sholat`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, '2023-04-21', 'Perempatan Desa', 'Imam Bpk Asipin jam 06.00 WIB', '2023-06-16 10:31:04', '2023-06-17 14:43:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tadarus`
--

CREATE TABLE `tadarus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_warga` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nama_warga`)),
  `tahun_kegiatan` date NOT NULL,
  `jumlah_khatam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tadarus`
--

INSERT INTO `tadarus` (`id`, `nama_kelompok`, `nama_warga`, `tahun_kegiatan`, `jumlah_khatam`, `created_at`, `updated_at`) VALUES
(1, 'Bapak-bapak', '[\"Jajang\",\"Miranda\",\"Hendra\"]', '1981-12-04', 10, '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(2, 'Ibu-ibu', '[\"Jajang\",\"Miranda\",\"Hendra\"]', '2011-11-20', 4, '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(3, 'Anak-anak', '[\"Jajang\",\"Miranda\",\"Hendra\"]', '1983-02-05', 30, '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(4, 'Ibu-ibu Arisan', '[\"Jajang\",\"Miranda\",\"Hendra\"]', '1974-03-25', 14, '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(5, 'Ibu-ibu', '[\"Bu Kholid\",\"Bu Asih\",\"Bu Eka\",\"Bu Marijo\"]', '2023-06-17', 1, '2023-06-17 01:17:40', '2023-06-17 01:20:41'),
(6, 'Bapak-bapak', '[\"Bpk Asipin\",\"Bpk Haryadi\",\"Bpk Ali Imron\",\"Bpk Maroji\"]', '2023-06-17', 4, '2023-06-17 14:36:06', '2023-06-17 14:36:06'),
(7, 'Remaja Putra', '[\"Deka\",\"Andri W\",\"Ari\",\"Slamet\",\"Kholidi\"]', '2023-06-17', 3, '2023-06-17 14:36:59', '2023-06-17 14:37:08'),
(8, 'Remaja Putri', '[\"Rahma\",\"Nova\"]', '2023-06-17', 2, '2023-06-17 14:37:52', '2023-06-17 14:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `takbiran`
--

CREATE TABLE `takbiran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `takbiran`
--

INSERT INTO `takbiran` (`id`, `tgl_kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2023-04-20', 'Persiapan Takbiran (perumahan ledok/PSA)', '2023-06-17 01:27:47', '2023-06-17 01:27:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `takbiran_warga`
--

CREATE TABLE `takbiran_warga` (
  `takbiran_id` bigint(20) UNSIGNED NOT NULL,
  `warga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `takbiran_warga`
--

INSERT INTO `takbiran_warga` (`takbiran_id`, `warga_id`) VALUES
(1, 16),
(1, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `takjil_warga`
--

CREATE TABLE `takjil_warga` (
  `konsumsi_id` bigint(20) UNSIGNED NOT NULL,
  `warga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `takjil_warga`
--

INSERT INTO `takjil_warga` (`konsumsi_id`, `warga_id`) VALUES
(5, 20),
(5, 48),
(4, 16),
(4, 18),
(7, 53),
(8, 56),
(8, 57),
(8, 58),
(9, 62),
(10, 64),
(11, 66),
(12, 68),
(12, 69),
(14, 73),
(14, 74),
(15, 77),
(16, 81),
(17, 83),
(17, 84),
(18, 87),
(19, 90),
(22, 95),
(23, 98),
(24, 101),
(25, 102),
(26, 100),
(27, 104),
(29, 112),
(30, 110),
(31, 113);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarawih`
--

CREATE TABLE `tarawih` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `id_imam` bigint(20) UNSIGNED NOT NULL,
  `id_penceramah` bigint(20) UNSIGNED NOT NULL,
  `id_bilal` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tarawih`
--

INSERT INTO `tarawih` (`id`, `tgl_kegiatan`, `id_imam`, `id_penceramah`, `id_bilal`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, '2023-02-22', 21, 21, 22, 'Tarawih Pertama', '2023-06-17 01:02:54', '2023-06-17 01:02:54'),
(17, '2023-02-23', 17, 17, 23, '-', '2023-06-17 01:05:36', '2023-06-17 01:05:36'),
(18, '2023-03-24', 24, 24, 25, '-', '2023-06-17 01:12:19', '2023-06-17 01:12:19'),
(19, '2023-03-25', 27, 27, 26, '-', '2023-06-17 01:14:49', '2023-06-17 01:14:49'),
(20, '2023-03-26', 45, 45, 42, '-', '2023-06-17 11:23:54', '2023-06-17 11:23:54'),
(21, '2023-03-27', 46, 46, 28, '-', '2023-06-17 11:33:26', '2023-06-17 11:33:26'),
(22, '2023-03-28', 47, 47, 31, '-', '2023-06-17 11:38:53', '2023-06-17 11:38:53'),
(23, '2023-03-29', 21, 21, 34, '-', '2023-06-17 11:41:08', '2023-06-17 11:41:08'),
(24, '2023-03-30', 17, 17, 36, '-', '2023-06-17 11:42:13', '2023-06-17 11:42:13'),
(25, '2023-03-31', 24, 24, 38, '-', '2023-06-17 11:42:52', '2023-06-17 11:42:52'),
(26, '2023-04-01', 27, 27, 40, '-', '2023-06-17 11:46:12', '2023-06-17 11:46:12'),
(27, '2023-04-02', 17, 17, 43, '-', '2023-06-17 11:47:17', '2023-06-17 11:47:17'),
(28, '2023-04-03', 46, 46, 30, '-', '2023-06-17 11:50:01', '2023-06-17 11:50:01'),
(29, '2023-04-04', 47, 47, 32, '-', '2023-06-17 11:51:07', '2023-06-17 11:51:07'),
(30, '2023-04-05', 21, 21, 35, '-', '2023-06-17 12:16:42', '2023-06-17 12:16:42'),
(31, '2023-04-06', 17, 17, 37, '-', '2023-06-17 12:33:12', '2023-06-17 12:33:12'),
(32, '2023-04-07', 24, 24, 38, '-', '2023-06-17 12:47:00', '2023-06-17 12:47:00'),
(33, '2023-04-08', 27, 27, 41, '-', '2023-06-17 12:48:02', '2023-06-17 12:48:02'),
(34, '2023-04-09', 21, 21, 43, '-', '2023-06-17 12:48:54', '2023-06-17 12:48:54'),
(35, '2023-04-10', 46, 46, 28, '-', '2023-06-17 12:49:55', '2023-06-17 12:49:55'),
(36, '2023-04-11', 47, 47, 32, '-', '2023-06-17 12:51:25', '2023-06-17 12:51:25'),
(37, '2023-04-12', 21, 21, 22, '-', '2023-06-17 12:56:15', '2023-06-17 12:56:15'),
(38, '2023-04-13', 17, 17, 37, '-', '2023-06-17 12:57:45', '2023-06-17 12:57:45'),
(39, '2023-04-14', 24, 24, 39, '-', '2023-06-17 12:59:17', '2023-06-17 12:59:17'),
(40, '2023-04-15', 27, 27, 40, '-', '2023-06-17 13:00:16', '2023-06-17 13:00:16'),
(41, '2023-04-16', 45, 45, 42, '-', '2023-06-17 13:13:29', '2023-06-17 13:13:29'),
(42, '2023-04-17', 46, 46, 28, '-', '2023-06-17 13:14:16', '2023-06-17 13:14:16'),
(43, '2023-04-18', 47, 47, 31, '-', '2023-06-17 13:14:59', '2023-06-17 13:14:59'),
(44, '2023-04-19', 21, 21, 26, '-', '2023-06-17 13:16:01', '2023-06-17 13:16:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Panitia', 'panitia0@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VwWNPXNF7zfAKJTtqC5jfq4kZyeptBhyLYZ3yTy75WoxNwlRDKXKJtg6GejR', '2023-06-16 10:31:04', '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(2, 2, 'Takmir', 'takmir1@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GcoISvOaLA', '2023-06-16 10:31:04', '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(3, 1, 'Panitia', 'panitia2@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AbmjwUghhG', '2023-06-16 10:31:04', '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(4, 2, 'Takmir', 'takmir3@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qiw9KkIozd', '2023-06-16 10:31:04', '2023-06-16 10:31:04', '2023-06-16 10:31:04'),
(5, 1, 'Panitia', 'panitia4@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xbty3VfS1d', '2023-06-16 10:31:04', '2023-06-16 10:31:04', '2023-06-16 10:31:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ustadh`
--

CREATE TABLE `ustadh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ustadh`
--

INSERT INTO `ustadh` (`id`, `nama`, `jenis_kelamin`, `no_hp`, `status`) VALUES
(6, 'Deka', 'pria', '0812391089398', 'A'),
(7, 'Slamet', 'pria', '08721431842', 'A'),
(8, 'Wahyu', 'pria', '018231748923', 'A'),
(9, 'Tama', 'pria', '08243539783', 'A'),
(10, 'Ridhwan Y', 'pria', '081243137364', 'A'),
(11, 'Ahmadi', 'pria', '0812134718273', 'A'),
(12, 'Bagus', 'pria', '0812471382', 'A'),
(13, 'Kholidi', 'pria', '082319347819283', 'A'),
(14, 'Ridwan', 'pria', '082334318647', 'A'),
(15, 'Rahma', 'wanita', '08243147128324', 'A'),
(16, 'Ikhsan', 'pria', '012818477123', 'A'),
(17, 'Yusuf', 'pria', '081239134781', 'A'),
(18, 'Miko', 'pria', '08523918782391', 'A'),
(19, 'Dafa', 'pria', '018231923812', 'A'),
(20, 'Hafid', 'pria', '08314123874', 'A'),
(21, 'Sulis', 'pria', '082131348712', 'A'),
(22, 'Dina', 'wanita', '018231889238182', 'A'),
(23, 'Ayu', 'wanita', '081481238129', 'A'),
(24, 'Suci', 'wanita', '09129718023', 'A'),
(25, 'Shinta', 'wanita', '081231415341', 'A'),
(26, 'Tania', 'wanita', '08129317481273', 'A'),
(27, 'Siti', 'wanita', '085129381047182', 'A'),
(28, 'Adel', 'wanita', '08214187123', 'A'),
(29, 'Dewi', 'wanita', '0832353123343', 'A'),
(30, 'Nuri', 'wanita', '081231283417293', 'A'),
(31, 'Haryanti', 'wanita', '08241376128', 'A'),
(32, 'Shifa', 'wanita', '08521376128319', 'A'),
(33, 'Aulia', 'wanita', '0812318719283', 'A'),
(34, 'Azizah', 'wanita', '0831274618273', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_asli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_keaktifan` tinyint(1) NOT NULL DEFAULT 0,
  `kontribusi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`kontribusi`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id`, `nama_asli`, `nama_alias`, `alamat`, `rt`, `rw`, `nomor_hp`, `email`, `status_keaktifan`, `kontribusi`) VALUES
(16, 'Bu Kholid', 'Bu Kholid', 'Sleman', 1, 1, '1029349712846192', 'bukholid@gmail.com', 0, NULL),
(17, 'Bpk Kholid', 'Bpk Kholid', 'Sleman', 1, 1, '-', '-', 1, '[\"imam\",\"penceramah\"]'),
(18, 'Bu Asih', 'Bu Asih', 'Sleman', 1, 1, '1029349712846192', 'buasih@gmail.com', 1, NULL),
(19, 'Bu Eka', 'Bu Eka', 'Sleman', 1, 1, '099737425823', 'bueka@gmail.com', 1, NULL),
(20, 'Bu Marijo', 'Bu Marijo', 'Sleman', 1, 1, '0812343817319', 'bumarijo@gmail.com', 1, NULL),
(21, 'Bpk Asipin', 'Bpk Asipin', 'Sleman', 1, 1, '08923193479123', 'asipin@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(22, 'Yoga', 'Yoga', 'Sleman', 1, 1, '09283137813', 'deka@gmail.com', 1, '[\"bilal\"]'),
(23, 'Ridwan Y', 'Ridwan Y', 'Sleman', 1, 1, '076382682132', 'ridwany@gmail.com', 1, '[\"bilal\"]'),
(24, 'Bpk Siswanto', 'Bpk Siswanto', 'Sleman', 1, 1, '099737425823', 'siswanto@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(25, 'Zimron', 'Zimron', 'Sleman', 1, 1, '099737425823', 'zimron@gmail.com', 1, '[\"bilal\"]'),
(26, 'David', 'David', 'Sleman', 1, 1, '-', 'david@gmail.com', 1, '[\"bilal\"]'),
(27, 'Bpk Mulyo Widodo', 'Bpk Mulyo Widodo', 'Sleman', 1, 1, '09273141207', 'mulyowidodo@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(28, 'Deka', 'Deka', 'Sleman', 1, 1, '1029349712846192', 'deka@gmail.com', 1, '[\"bilal\"]'),
(29, 'Daffa', 'Daffa', 'Sleman', 1, 1, '09273141207', 'daffa@gmail.com', 1, '[\"bilal\"]'),
(30, 'Andri W', 'Andri W', 'Sleman', 1, 1, '-', 'andriw@gmail.com', 1, '[\"bilal\"]'),
(31, 'Rizal', 'Rizal', 'Sleman', 1, 1, '-', 'rizal@gmail.com', 1, '[\"bilal\"]'),
(32, 'Radit', 'Radit', 'Sleman', 1, 1, '076382682132', 'radit@gmail.com', 1, '[\"bilal\"]'),
(33, 'Ikhsan', 'Ikhsan', 'Sleman', 1, 1, '-', 'ikhsan@gmail.com', 1, '[\"bilal\"]'),
(34, 'Rahma', 'Rahma', 'Sleman', 1, 1, '-', 'rahma@gmail.com', 1, '[\"bilal\"]'),
(35, 'Nova', 'Nova', 'Sleman', 1, 1, '09273141207', 'nova@gmail.com', 1, '[\"bilal\"]'),
(36, 'Wahyu', 'Wahyu', 'Sleman', 1, 1, '-', 'wahyu@gmail.com', 1, '[\"bilal\"]'),
(37, 'Andri K', 'Andri K', 'Sleman', 1, 1, '09273141207', 'andrik@gmail.com', 1, '[\"bilal\"]'),
(38, 'Ridwan', 'Ridwan', 'Sleman', 1, 1, '099737425823', 'ridwan@gmail.com', 1, '[\"bilal\"]'),
(39, 'Miko', 'Miko', 'Sleman', 1, 1, '-', 'miko@gmail.com', 1, '[\"bilal\"]'),
(40, 'Ahmadi', 'Ahmadi', 'Sleman', 1, 1, '-', 'ahmadi@gmail.com', 1, '[\"bilal\"]'),
(41, 'Ari', 'Ari', 'Sleman', 1, 1, '-', 'ari@gmail.com', 1, '[\"bilal\"]'),
(42, 'Adip', 'Adip', 'Sleman', 1, 1, '-', 'adip@gmail.com', 1, '[\"bilal\"]'),
(43, 'Slamet', 'Slamet', 'Sleman', 1, 1, '09273141207', 'slamet@gmail.com', 1, '[\"bilal\"]'),
(44, 'Kholidi', 'Kholidi', 'Sleman', 1, 1, '076382682132', 'kholidi@gmail.com', 1, '[\"bilal\"]'),
(45, 'Bpk Haryadi', 'Bpk Haryadi', 'Sleman', 1, 1, '-', 'haryadi@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(46, 'Bpk Ali Imron', 'Bpk Ali Imron', '-', 1, 1, '099737425823', 'aliimron@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(47, 'Bpk Maroji', 'Bpk Maroji', 'Sleman', 1, 1, '0812343817319', 'maroji@gmail.com', 1, '[\"imam\",\"penceramah\"]'),
(48, 'Bu Ika', 'Bu Ika', 'Sleman', 1, 1, '0812343817319', 'ika@gmail.com', 1, NULL),
(49, 'Bu Asipin', 'Bu Asipin', 'Sleman', 1, 1, '076382682132', 'buasipin@gmail.com', 1, NULL),
(50, 'Bu Eko Guritno', 'Bu Eko Guritno', 'Sleman', 1, 1, '076382682132', 'ekoguritno@gmail.com', 1, NULL),
(51, 'Bu Hj Nanik', 'Bu Hj Nanik', 'Sleman', 1, 1, '08123912740192', 'bunanik@gmail.com', 1, NULL),
(52, 'Mujahadah', 'Mujahadah', 'Sleman', 1, 1, '0812343817319', 'mujahadh@gmail.com', 1, NULL),
(53, 'Bu Tini', 'Bu Tini', 'Sleman', 1, 1, '0823319471893289', 'tini1@gmail.com', 1, NULL),
(54, 'Bu Juari', 'Bu Juari', 'Sleman', 1, 1, '018239179237', 'juari45@gmail.com', 1, NULL),
(55, 'Bu Asmi', 'Bu Asmi', 'Sleman', 1, 1, '0827387123423', 'asmi@gmail.com', 1, NULL),
(56, 'Bu As', 'Bu As', 'Sleman', 1, 1, '08521390892321', 'as09@gmail.com', 1, NULL),
(57, 'Bu Ina', 'Bu Ina', 'Sleman', 1, 1, '0812343817319', 'ina123@gmail.com', 1, NULL),
(58, 'Bu Wahyu', 'Bu Wahyu', 'Sleman', 1, 1, '08123147823123', 'buwahyu@gmail.com', 1, NULL),
(59, 'Bu Warti', 'Bu Warti', 'Sleman', 1, 1, '08523187382343', 'warti@gmail.com', 1, NULL),
(60, 'Bu Win', 'Bu Win', 'Sleman', 1, 1, '085129371782348', 'win234@gmail.com', 1, NULL),
(61, 'Bu Atik', 'Bu Atik', 'Sleman', 1, 1, '08212836827301498', 'atik@gmail.com', 1, NULL),
(62, 'Bu Annisa', 'Mba Iyem', 'Sleman', 1, 1, '0851297319264834', 'annisa23@gmail.com', 1, NULL),
(63, 'Bu Irhas', 'Bu Irhas', 'Sleman', 1, 1, '0851283719283864', 'irhas@gmail.com', 1, NULL),
(64, 'Bu Ana', 'Bu Ana', 'Sleman', 1, 1, '08528317892964', 'ana8374@gmail.com', 1, NULL),
(65, 'Bu Tum', 'Bu Tum', 'Sleman', 1, 1, '0859278128934', 'tum1234@gmail.com', 1, NULL),
(66, 'Pak Lilik', 'Pak Lilik', 'Sleman', 1, 1, '081293810839', 'lilik@gmail.com', 1, NULL),
(67, 'Bu Sam', 'Bu Sam', 'Sleman', 1, 1, '0812931808412', 'sam@gmail.com', 1, NULL),
(68, 'Bu Beny', 'Bu Beny', 'Sleman', 1, 1, '08512938109423', 'beny@gmail.com', 1, NULL),
(69, 'Bu Yatmi', 'Bu Yatmi', 'Sleman', 1, 1, '08828192835423', 'yatmi19273@gmail.com', 1, NULL),
(70, 'Bu Sri Lestari', 'Bu Sri Lestari', 'Sleman', 2, 2, '0812343817319', 'srilestari@gmail.com', 1, NULL),
(71, 'Perum PSA & PPA', 'Perum PSA & PPA', 'Sleman', 1, 1, '-', '-', 1, NULL),
(72, 'Bu Sirup', 'Bu Sirup', '-', 1, 1, '-', '-', 1, NULL),
(73, 'Bu Astuti', 'Bu Astuti', '-', 1, 1, '0812343817319', '-', 1, NULL),
(74, 'Bu Ristina', 'Bu Ristina', 'Sleman', 1, 1, '-', '-', 1, NULL),
(75, 'Bu Lia', 'Bu Lia', '-', 1, 1, '-', '-', 1, NULL),
(76, 'Bu Priwi', 'Bu Priwi', 'Sleman', 1, 1, '-', '-', 1, NULL),
(77, 'Bu Febri', 'Bu Febri', 'Sleman', 1, 1, '-', 'febri@gmail.com', 1, NULL),
(78, 'Bu Titik', 'Bu Titik', '-', 1, 1, '-', 'titik@gmail.com', 1, NULL),
(79, 'Bu Ngatiyem', 'Bu Ngatiyem', 'Sleman', 1, 1, '0812343817319', '-', 1, NULL),
(80, 'Bu Anis', 'Bu Anis', 'Sleman', 1, 1, '-', 'buanis@gmail.com', 1, NULL),
(81, 'Bu Diah', 'Bu Diah', '-', 1, 1, '0812343817319', '-', 1, NULL),
(82, 'Bu Juwar', 'Bu Juwar', 'Sleman', 1, 1, '-', '-', 1, NULL),
(83, 'Bu Didik', 'Bu Didik', 'Sleman', 1, 1, '-', 'didik@gmail.com', 1, NULL),
(84, 'Bu Nohan', 'Bu Nohan', 'Sleman', 1, 1, '0812343817319', 'nohan@gmail.com', 1, NULL),
(85, 'Bu Slamet', 'Bu Slamet', 'Sleman', 1, 1, '0812343817319', 'slamet1923@gmail.com', 1, NULL),
(86, 'Bu Yati', 'Bu Yati', 'Sleman', 1, 1, '-', '-', 1, NULL),
(87, 'Bu Tri Hartini', 'Bu Tri Hartini', 'Sleman', 1, 1, '-', '-', 1, NULL),
(88, 'Bu Tiwi bg', 'Bu Tiwi bg', '-', 1, 1, '-', '-', 1, NULL),
(89, 'Bu Sami', 'Bu Sami', 'Sleman', 1, 1, '0812343817319', 'sami12@gmail.com', 1, NULL),
(90, 'Bu Dhani', 'Bu Dhani', '-', 1, 1, '-', '-', 1, NULL),
(91, 'Bu Partinah', 'Bu Partinah', '-', 1, 1, '-', '-', 1, NULL),
(92, 'Bu Lastri', 'Bu Lastri', '-', 1, 1, '-', '-', 1, NULL),
(93, '-', 'Kel. Jumat Berkah', '-', 1, 1, '-', '-', 1, NULL),
(94, 'Bu Partinem', 'Bu Partinem', '-', 1, 1, '-', '-', 1, NULL),
(95, 'Bu Nunik', 'Bu Nunik', '-', 1, 1, '-', '-', 1, NULL),
(96, 'Bu Tatik', 'Bu Tatik', '-', 1, 1, '-', '-', 1, NULL),
(97, 'Bu Sri Parjo', 'Bu Sri Parjo', '-', 1, 1, '-', '-', 1, NULL),
(98, 'Bu Marfu', 'Bu Marfu', '-', 1, 1, '-', '-', 1, NULL),
(99, 'Bu Estri', 'Bu Estri', '-', 1, 1, '-', '-', 1, NULL),
(100, 'Bu Rahma', 'Bu Rahma', '-', 1, 1, '-', '-', 1, NULL),
(101, '-', 'Keluaga Mbah Dharmo', '-', 1, 1, '-', '-', 1, NULL),
(102, 'Pak Maryono', 'Pak Maryono', '-', 1, 1, '-', '-', 1, NULL),
(103, 'Bu Keri', 'Bu Keri', '-', 1, 1, '-', '-', 1, NULL),
(104, '-', 'Pak Aziz', '-', 1, 1, '-', '-', 1, NULL),
(105, '-', 'Bu Rahma dkk', '-', 1, 1, '-', '-', 1, NULL),
(106, 'Bu Wiwin', 'Bu Wiwin', '-', 1, 1, '-', '-', 1, NULL),
(107, '-', 'Mbah Yanto', '-', 1, 1, '-', '-', 1, NULL),
(108, 'Bu Patmi', 'Bu Patmi', '-', 1, 1, '-', '-', 1, NULL),
(109, '-', 'Bu Sartini', '-', 1, 1, '-', '-', 1, NULL),
(110, 'Pak Tri Kromo', 'Pak Tri Kromo', '-', 1, 1, '-', '-', 1, NULL),
(111, 'Mba Nita', 'Mba Nita', '-', 1, 1, '-', '-', 1, NULL),
(112, 'Bu Sudar', 'Bu Sudar', '-', 1, 1, '-', '-', 1, NULL),
(113, 'Bu Tumiyat', 'Bu Tumiyat', '-', 1, 1, '-', '-', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `zakat`
--

CREATE TABLE `zakat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas_zakat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nama_petugas_zakat`)),
  `nama_penerima_zakat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`nama_penerima_zakat`)),
  `tgl_kegiatan` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `zakat`
--

INSERT INTO `zakat` (`id`, `nama_petugas_zakat`, `nama_penerima_zakat`, `tgl_kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '[\"Bagus\",\" Slamet\",\" Tama\"]', '[\"Salahudin\",\"Fujiati\",\"Ryan\",\"Putri\"]', '2023-04-12', 'Uang Rp.30.000', '2023-06-16 10:31:04', '2023-06-17 14:53:51'),
(2, '[\"Dewi\",\" Deka\",\" Tama\"]', '[\"Mine\",\"Thalia\",\"Silva\",\"Putra\"]', '2023-04-13', 'Beras 3kg', '2023-06-16 10:31:04', '2023-06-17 15:02:20'),
(3, '[\"Bagus\",\" Slamet\",\" Tama\"]', '[\"Maryam\",\"Maemunah\",\"Siti\",\"Budi\"]', '2023-04-14', 'Beras 3kg', '2023-06-16 10:31:04', '2023-06-17 15:03:45'),
(4, '[\"Deka\",\" Rahma\",\" Dela\",\" Suci\"]', '[\"Sayid\",\" Rena\",\" Ira\",\" Lusi\"]', '2023-04-15', 'Uang Rp.30.000', '2023-06-16 10:31:04', '2023-06-17 15:04:52'),
(5, '[\"Dewi\",\" Suci\",\" Tama\"]', '[\"Reza\",\"Tasya\",\"Rina\",\"Elsa\"]', '2023-04-16', 'Beras 3kg', '2023-06-16 10:31:04', '2023-06-17 15:05:55'),
(6, '[\"Dewi\",\" Deka\",\" Tama\"]', '[\"Alfat\",\" Novi\",\" Gilang\"]', '2023-04-17', 'Beras 3kg', '2023-06-17 15:06:34', '2023-06-17 15:06:34'),
(7, '[\"Suci\",\" Dewi\",\" Tama\"]', '[\"Aya\",\" Puri\",\" Nurma\"]', '2023-04-18', 'Uang Rp.30.000', '2023-06-17 15:07:01', '2023-06-17 15:07:01'),
(8, '[\"Bagus\",\" Slamet\",\" Tama\"]', '[\"humam\",\" nefa\",\" febi\"]', '2023-04-19', 'Beras 3kg', '2023-06-17 15:07:27', '2023-06-17 15:07:46'),
(9, '[\"Bagus\",\" Slamet\",\" Tama\"]', '[\"Tia\",\" Putri\",\" Ema\"]', '2023-04-20', 'Beras 3kg', '2023-06-17 15:08:34', '2023-06-17 15:08:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukber_warga`
--
ALTER TABLE `bukber_warga`
  ADD KEY `bukber_warga_konsumsi_id_foreign` (`konsumsi_id`),
  ADD KEY `bukber_warga_warga_id_foreign` (`warga_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabur_warga`
--
ALTER TABLE `jabur_warga`
  ADD KEY `jabur_warga_konsumsi_id_foreign` (`konsumsi_id`),
  ADD KEY `jabur_warga_warga_id_foreign` (`warga_id`);

--
-- Indeks untuk tabel `jadwal_ajar`
--
ALTER TABLE `jadwal_ajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_ajar_id_ustadh_foreign` (`id_ustadh`),
  ADD KEY `jadwal_ajar_id_hari_foreign` (`id_hari`);

--
-- Indeks untuk tabel `khataman_nuzulul`
--
ALTER TABLE `khataman_nuzulul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sholatied`
--
ALTER TABLE `sholatied`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`);

--
-- Indeks untuk tabel `tadarus`
--
ALTER TABLE `tadarus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `takbiran`
--
ALTER TABLE `takbiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `takbiran_warga`
--
ALTER TABLE `takbiran_warga`
  ADD KEY `takbiran_warga_takbiran_id_foreign` (`takbiran_id`),
  ADD KEY `takbiran_warga_warga_id_foreign` (`warga_id`);

--
-- Indeks untuk tabel `takjil_warga`
--
ALTER TABLE `takjil_warga`
  ADD KEY `takjil_warga_konsumsi_id_foreign` (`konsumsi_id`),
  ADD KEY `takjil_warga_warga_id_foreign` (`warga_id`);

--
-- Indeks untuk tabel `tarawih`
--
ALTER TABLE `tarawih`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarawih_id_imam_foreign` (`id_imam`),
  ADD KEY `tarawih_id_penceramah_foreign` (`id_penceramah`),
  ADD KEY `tarawih_id_bilal_foreign` (`id_bilal`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- Indeks untuk tabel `ustadh`
--
ALTER TABLE `ustadh`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ajar`
--
ALTER TABLE `jadwal_ajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `khataman_nuzulul`
--
ALTER TABLE `khataman_nuzulul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sholatied`
--
ALTER TABLE `sholatied`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tadarus`
--
ALTER TABLE `tadarus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `takbiran`
--
ALTER TABLE `takbiran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tarawih`
--
ALTER TABLE `tarawih`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ustadh`
--
ALTER TABLE `ustadh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukber_warga`
--
ALTER TABLE `bukber_warga`
  ADD CONSTRAINT `bukber_warga_konsumsi_id_foreign` FOREIGN KEY (`konsumsi_id`) REFERENCES `konsumsi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bukber_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jabur_warga`
--
ALTER TABLE `jabur_warga`
  ADD CONSTRAINT `jabur_warga_konsumsi_id_foreign` FOREIGN KEY (`konsumsi_id`) REFERENCES `konsumsi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jabur_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_ajar`
--
ALTER TABLE `jadwal_ajar`
  ADD CONSTRAINT `jadwal_ajar_id_hari_foreign` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ajar_id_ustadh_foreign` FOREIGN KEY (`id_ustadh`) REFERENCES `ustadh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `takbiran_warga`
--
ALTER TABLE `takbiran_warga`
  ADD CONSTRAINT `takbiran_warga_takbiran_id_foreign` FOREIGN KEY (`takbiran_id`) REFERENCES `takbiran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `takbiran_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `takjil_warga`
--
ALTER TABLE `takjil_warga`
  ADD CONSTRAINT `takjil_warga_konsumsi_id_foreign` FOREIGN KEY (`konsumsi_id`) REFERENCES `konsumsi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `takjil_warga_warga_id_foreign` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tarawih`
--
ALTER TABLE `tarawih`
  ADD CONSTRAINT `tarawih_id_bilal_foreign` FOREIGN KEY (`id_bilal`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarawih_id_imam_foreign` FOREIGN KEY (`id_imam`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarawih_id_penceramah_foreign` FOREIGN KEY (`id_penceramah`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
