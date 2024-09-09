-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 09:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `university_synopses`
--

CREATE TABLE `university_synopses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `synopsis_type_id` varchar(255) DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `co_guide` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) DEFAULT NULL,
  `ref_date` varchar(255) DEFAULT NULL,
  `date_evaluation` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `university_synopses`
--
ALTER TABLE `university_synopses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `university_synopses`
--
ALTER TABLE `university_synopses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
