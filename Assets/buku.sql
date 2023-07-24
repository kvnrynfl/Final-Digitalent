-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jul 2023 pada 15.47
-- Versi server: 8.0.33-0ubuntu0.22.04.2
-- Versi PHP: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int UNSIGNED NOT NULL,
  `judul` text NOT NULL,
  `pengarang` text NOT NULL,
  `tahun_terbit` date NOT NULL,
  `isbn` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `tahun_terbit`, `isbn`, `updated_at`, `created_at`) VALUES
(1, 'Learning Python', 'Mark Smith', '2019-03-20', 9780123456789, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(2, 'Java in Action', 'Laura Johnson', '2021-07-05', 9780234567891, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(3, 'CSS3 Essentials', 'Sophia Lee', '2018-11-15', 9780345678912, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(4, 'Mastering JavaScript', 'Robert Wilson', '2020-06-10', 9780456789123, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(5, 'C# Programming Basics', 'Jennifer Brown', '2017-09-25', 9780567891234, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(6, 'Data Science with R', 'Andrew Taylor', '2022-02-15', 9780678912345, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(7, 'Responsive Web Design', 'Emma Davis', '2016-08-30', 9780789123456, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(8, 'Node.js Fundamentals', 'William Clark', '2023-01-02', 9780891234567, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(9, 'Python Web Frameworks', 'Olivia White', '2021-04-12', 9780912345678, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(10, 'Ruby Programming', 'Michael Anderson', '2019-10-20', 9781012345679, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(11, 'Android Application Development', 'Jessica Martin', '2018-05-18', 9781111111111, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(12, 'iOS App Development', 'Daniel Wilson', '2020-09-28', 9782222222222, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(13, 'Database Management', 'Sophia Adams', '2017-07-08', 9783333333333, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(14, 'Machine Learning Techniques', 'Robert Johnson', '2022-03-11', 9784444444444, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(15, 'Web Security Best Practices', 'Emily Miller', '2016-12-04', 9785555555555, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(16, 'Algorithms and Data Structures', 'James Brown', '2023-02-17', 9786666666666, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(17, 'Git and Version Control', 'Olivia Davis', '2021-06-21', 9787777777777, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(18, 'Software Testing Fundamentals', 'William Clark', '2019-09-14', 9788888888888, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(19, 'Object-Oriented Programming', 'Jessica Anderson', '2018-04-23', 9789999999999, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(20, 'Introduction to DevOps', 'Michael Wilson', '2020-10-07', 9780000000001, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(21, 'Cloud Computing Technologies', 'Sophia Johnson', '2017-08-22', 9780000000002, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(22, 'Full-Stack Web Development', 'Robert Adams', '2022-04-30', 9780000000003, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(23, 'Python Data Analysis', 'Emily Smith', '2016-11-13', 9780000000004, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(24, 'Angular Framework Basics', 'James Miller', '2023-03-26', 9780000000005, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(25, 'Docker Essentials', 'Olivia Brown', '2021-07-29', 9780000000006, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(26, 'JavaScript Frameworks', 'William Davis', '2019-10-16', 9780000000007, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(27, 'Introduction to AI', 'Jessica White', '2018-05-25', 9780000000008, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(28, 'Web Design Principles', 'Michael Clark', '2020-09-08', 9780000000009, '2023-07-24 08:46:50', '2023-07-24 08:46:50'),
(29, 'Python for Machine Learning', 'Sophia Adams', '2017-06-17', 9780000000010, '2023-07-24 08:46:50', '2023-07-24 08:46:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
