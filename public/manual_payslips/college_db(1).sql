-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 07:12 AM
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
-- Table structure for table `achivements`
--

CREATE TABLE `achivements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `award_date` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_enquiries`
--

CREATE TABLE `admission_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `follow_up_date` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `commission_flat` int(11) DEFAULT NULL,
  `commission_percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `mobile_no`, `address`, `status`, `commission_flat`, `commission_percentage`, `created_at`, `updated_at`) VALUES
(1, 'self', 'xx', 'xx', 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent_payments`
--

CREATE TABLE `agent_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `mode` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answerscript_evaluators`
--

CREATE TABLE `answerscript_evaluators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `examination_name` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) DEFAULT NULL,
  `ref_date` varchar(255) DEFAULT NULL,
  `paper_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answersheets`
--

CREATE TABLE `answersheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_details_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `student_answer` int(11) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_semester_teachers`
--

CREATE TABLE `assign_semester_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_vehicles`
--

CREATE TABLE `assign_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_by` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `class_status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_publications`
--

CREATE TABLE `book_publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `ISBN_number` varchar(255) DEFAULT NULL,
  `name_of_publisher` varchar(255) DEFAULT NULL,
  `chapter_full_book` varchar(255) DEFAULT NULL,
  `chapter_name` varchar(255) DEFAULT NULL,
  `page_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

CREATE TABLE `call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `next_follow_up_date` varchar(255) NOT NULL,
  `call_duration` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, NULL),
(2, 'ST', NULL, NULL),
(3, 'SC', NULL, NULL),
(4, 'OBC A', NULL, NULL),
(5, 'OBC B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caution_money`
--

CREATE TABLE `caution_money` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `caution_money_payment_date` date DEFAULT NULL,
  `caution_money_mode_of_payment` varchar(255) DEFAULT NULL,
  `caution_money_transaction_id` varchar(255) DEFAULT NULL,
  `caution_money` varchar(255) DEFAULT NULL,
  `refunded_amount` varchar(255) DEFAULT NULL,
  `caution_money_deduction` varchar(255) DEFAULT NULL,
  `refund_payment_date` varchar(255) DEFAULT NULL,
  `refund_mode_of_payment` varchar(255) DEFAULT NULL,
  `refund_transaction_id` varchar(255) DEFAULT NULL,
  `caution_money_refund` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_types`
--

CREATE TABLE `certificate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_statuses`
--

CREATE TABLE `class_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `started_by` varchar(255) DEFAULT NULL,
  `time_on` varchar(255) DEFAULT NULL,
  `ended_by` varchar(255) DEFAULT NULL,
  `ended_on` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultancies`
--

CREATE TABLE `consultancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `project_consultancy` varchar(255) DEFAULT NULL,
  `sponsored_by` varchar(255) DEFAULT NULL,
  `consultant` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `upload_date` date DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `content_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'course 1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_groups`
--

CREATE TABLE `course_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `scholarship_code` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_qualifications`
--

CREATE TABLE `education_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `board_ten` varchar(255) NOT NULL,
  `marks_obtained_ten` varchar(255) NOT NULL,
  `percentage_ten` varchar(255) NOT NULL,
  `division_ten` varchar(255) NOT NULL,
  `main_subject_ten` varchar(255) NOT NULL,
  `year_of_passing_ten` varchar(255) NOT NULL,
  `file_ten` varchar(255) NOT NULL,
  `board_twelve` varchar(255) NOT NULL,
  `marks_obtained_twelve` varchar(255) NOT NULL,
  `percentage_twelve` varchar(255) NOT NULL,
  `division_twelve` varchar(255) NOT NULL,
  `main_subject_twelve` varchar(255) NOT NULL,
  `year_of_passing_twelve` varchar(255) NOT NULL,
  `file_twelve` varchar(255) NOT NULL,
  `board_graduation` varchar(255) NOT NULL,
  `marks_obtained_graduation` varchar(255) NOT NULL,
  `percentage_graduation` varchar(255) NOT NULL,
  `division_graduation` varchar(255) NOT NULL,
  `main_subject_graduation` varchar(255) NOT NULL,
  `year_of_passing_graduation` varchar(255) NOT NULL,
  `file_graduation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examiners`
--

CREATE TABLE `examiners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `examination_name` varchar(255) DEFAULT NULL,
  `type_of_examiner` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) DEFAULT NULL,
  `ref_date` varchar(255) DEFAULT NULL,
  `paper_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_heads`
--

CREATE TABLE `expense_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
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
-- Table structure for table `fees_structures`
--

CREATE TABLE `fees_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `fees_type_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_types`
--

CREATE TABLE `fees_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(20) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generated_payrolls`
--

CREATE TABLE `generated_payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `gross_salary` double(8,2) NOT NULL,
  `net_salary` double(8,2) NOT NULL,
  `total_present` int(11) NOT NULL,
  `total_absent` int(11) NOT NULL,
  `total_leave` int(11) NOT NULL,
  `deduction` double(8,2) NOT NULL DEFAULT 0.00,
  `payment_mode` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `homework_date` varchar(255) NOT NULL,
  `submission_date` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hostel_type_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_details`
--

CREATE TABLE `hotel_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hostel_id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_bed` int(11) NOT NULL,
  `cost_per_bed` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_types`
--

INSERT INTO `hotel_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Girls', NULL, NULL),
(2, 'Boys', NULL, NULL),
(3, 'Combine', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_head_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_heads`
--

CREATE TABLE `income_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internship_details`
--

CREATE TABLE `internship_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internship_provider_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internship_providers`
--

CREATE TABLE `internship_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_issues`
--

CREATE TABLE `inventory_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `issue_to` bigint(20) UNSIGNED NOT NULL,
  `issue_by` bigint(20) UNSIGNED NOT NULL,
  `item_type_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_type_id` bigint(20) UNSIGNED NOT NULL,
  `unit` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE `item_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_type_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_supplier_id` bigint(20) UNSIGNED NOT NULL,
  `item_store_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_stores`
--

CREATE TABLE `item_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_suppliers`
--

CREATE TABLE `item_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_phone` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_publications`
--

CREATE TABLE `journal_publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `journal_name` varchar(255) DEFAULT NULL,
  `publication` varchar(255) DEFAULT NULL,
  `ugc_affiliation` varchar(255) DEFAULT NULL,
  `volume_page_number` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `issn_number` varchar(255) DEFAULT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `impact_factor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_days` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_lists`
--

CREATE TABLE `leave_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `total_leave` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_digital_books`
--

CREATE TABLE `library_digital_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_issues`
--

CREATE TABLE `library_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `issued_on` date NOT NULL,
  `return_date` date NOT NULL,
  `returned` int(11) NOT NULL DEFAULT 0,
  `returned_on` date DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_stocks`
--

CREATE TABLE `library_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `isbn_no` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `rack_number` varchar(255) NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `fine` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '0',
  `remaining` varchar(255) NOT NULL DEFAULT '0',
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_fees`
--

CREATE TABLE `manual_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `semester_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date_of_payment` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marksheets`
--

CREATE TABLE `marksheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) NOT NULL,
  `date_of_issue` varchar(255) NOT NULL,
  `result_status` varchar(255) NOT NULL,
  `marks` double(8,2) NOT NULL,
  `full_marks` double(8,2) NOT NULL,
  `min_marks` double(8,2) NOT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `member_type` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_details`
--

CREATE TABLE `member_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_joining` date DEFAULT NULL,
  `material_status` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `emergency_phone_number` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `epf_number` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `gross_salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bank_branch_name` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `pan_proof` varchar(255) DEFAULT NULL,
  `caste_certificate_proof` varchar(255) DEFAULT NULL,
  `joining_letter_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_management`
--

CREATE TABLE `menu_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `groups` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_management`
--

INSERT INTO `menu_management` (`id`, `user_type_id`, `groups`, `name`, `permission`, `franchise_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Academics', 1, 1, NULL, NULL),
(2, 1, 0, 'Subject Group', 1, 1, NULL, NULL),
(3, 1, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(4, 1, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(5, 1, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(6, 1, 0, 'Course', 1, 1, NULL, NULL),
(7, 1, 0, 'Semester', 1, 1, NULL, NULL),
(8, 1, 0, 'Subject', 1, 1, NULL, NULL),
(9, 1, 0, 'Session', 1, 1, NULL, NULL),
(10, 1, 0, 'Promote Students', 1, 1, NULL, NULL),
(11, 1, 1, 'Human Resource', 1, 1, NULL, NULL),
(12, 1, 0, 'Staff', 1, 1, NULL, NULL),
(13, 1, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(14, 1, 0, 'Leave Type', 1, 1, NULL, NULL),
(15, 1, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(16, 1, 0, 'Apply Leave', 1, 1, NULL, NULL),
(17, 1, 0, 'Approve Leave', 1, 1, NULL, NULL),
(18, 1, 0, 'Department', 1, 1, NULL, NULL),
(19, 1, 0, 'Designation', 1, 1, NULL, NULL),
(20, 1, 0, 'Caste', 1, 1, NULL, NULL),
(21, 1, 0, 'Holiday', 1, 1, NULL, NULL),
(22, 1, 0, 'Payroll', 1, 1, NULL, NULL),
(23, 1, 0, 'Payroll Types', 1, 1, NULL, NULL),
(24, 1, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(25, 1, 1, 'Staff Information', 1, 1, NULL, NULL),
(26, 1, 0, 'Staff Experience', 1, 1, NULL, NULL),
(27, 1, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(28, 1, 0, 'Examiners', 1, 1, NULL, NULL),
(29, 1, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(30, 1, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(31, 1, 0, 'Journal Publication', 1, 1, NULL, NULL),
(32, 1, 0, 'Paper Setter', 1, 1, NULL, NULL),
(33, 1, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(34, 1, 0, 'University Synopsis', 1, 1, NULL, NULL),
(35, 1, 0, 'Degree', 1, 1, NULL, NULL),
(36, 1, 0, 'Staff Education', 1, 1, NULL, NULL),
(37, 1, 0, 'Book Publication', 1, 1, NULL, NULL),
(38, 1, 1, 'Attendance', 1, 1, NULL, NULL),
(39, 1, 0, 'Period Attendance', 1, 1, NULL, NULL),
(40, 1, 0, 'Show Attendance', 1, 1, NULL, NULL),
(41, 1, 1, 'Library', 1, 1, NULL, NULL),
(42, 1, 0, 'Add Item', 1, 1, NULL, NULL),
(43, 1, 0, 'Issue Book', 1, 1, NULL, NULL),
(44, 1, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(45, 1, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(46, 1, 1, 'Income', 1, 1, NULL, NULL),
(47, 1, 0, 'Income Head', 1, 1, NULL, NULL),
(48, 1, 0, 'Add Income', 1, 1, NULL, NULL),
(49, 1, 1, 'Expense', 1, 1, NULL, NULL),
(50, 1, 0, 'Expense Head', 1, 1, NULL, NULL),
(51, 1, 0, 'Add Expense', 1, 1, NULL, NULL),
(52, 1, 1, 'Hostel', 1, 1, NULL, NULL),
(53, 1, 0, 'Add Hostel', 1, 1, NULL, NULL),
(54, 1, 0, 'Room Type', 1, 1, NULL, NULL),
(55, 1, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(56, 1, 1, 'Inventory', 1, 1, NULL, NULL),
(57, 1, 0, 'Item Category', 1, 1, NULL, NULL),
(58, 1, 0, 'Add Item', 1, 1, NULL, NULL),
(59, 1, 1, 'Internship', 1, 1, NULL, NULL),
(60, 1, 0, 'Internship Provider', 1, 1, NULL, NULL),
(61, 1, 0, 'Internship Details', 1, 1, NULL, NULL),
(62, 1, 1, 'Job', 1, 1, NULL, NULL),
(63, 1, 0, 'Add Company Details', 1, 1, NULL, NULL),
(64, 1, 0, 'Placement', 1, 1, NULL, NULL),
(65, 1, 1, 'Student Information', 1, 1, NULL, NULL),
(66, 1, 0, 'Student Admission', 1, 1, NULL, NULL),
(67, 1, 1, 'Communication', 1, 1, NULL, NULL),
(68, 1, 0, 'Notice', 1, 1, NULL, NULL),
(69, 1, 1, 'Examination', 1, 1, NULL, NULL),
(70, 1, 0, 'Subject Details', 1, 1, NULL, NULL),
(71, 1, 0, 'Subject Question', 1, 1, NULL, NULL),
(72, 1, 0, 'Exam', 1, 1, NULL, NULL),
(73, 1, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(74, 1, 0, 'Virtual Class', 1, 1, NULL, NULL),
(75, 1, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(76, 1, 1, 'Front Desk', 1, 1, NULL, NULL),
(77, 1, 0, 'Visitor Book', 1, 1, NULL, NULL),
(78, 1, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(79, 1, 0, 'Call Log', 1, 1, NULL, NULL),
(80, 1, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(81, 1, 0, 'Postal Receive', 1, 1, NULL, NULL),
(82, 1, 1, 'Homework', 1, 1, NULL, NULL),
(83, 1, 0, 'Add Homework', 1, 1, NULL, NULL),
(84, 1, 1, 'Transport', 1, 1, NULL, NULL),
(85, 1, 0, 'Routes', 1, 1, NULL, NULL),
(86, 1, 0, 'Vehicle', 1, 1, NULL, NULL),
(87, 1, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(88, 1, 1, 'Fees Collection', 1, 1, NULL, NULL),
(89, 1, 0, 'Fees Type', 1, 1, NULL, NULL),
(90, 1, 0, 'Fees Structure', 1, 1, NULL, NULL),
(91, 1, 0, 'Collect Fees', 1, 1, NULL, NULL),
(92, 1, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(93, 1, 1, 'Report', 1, 1, NULL, NULL),
(94, 1, 0, 'Attendance report', 1, 1, NULL, NULL),
(95, 1, 0, 'Examination report', 1, 1, NULL, NULL),
(96, 1, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(97, 1, 0, 'Admission report', 1, 1, NULL, NULL),
(98, 1, 1, 'Others', 1, 1, NULL, NULL),
(99, 1, 0, 'Agent', 1, 1, NULL, NULL),
(100, 1, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(101, 1, 0, 'Add User Type', 1, 1, NULL, NULL),
(102, 1, 0, 'Icard', 1, 1, NULL, NULL),
(103, 1, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(104, 1, 0, 'Agent Payment', 1, 1, NULL, NULL),
(105, 1, 1, 'Download Center', 1, 1, NULL, NULL),
(106, 1, 0, 'Upload Content', 1, 1, NULL, NULL),
(107, 1, 0, 'Study Material', 1, 1, NULL, NULL),
(108, 1, 0, 'Assignment', 1, 1, NULL, NULL),
(109, 2, 1, 'Academics', 1, 1, NULL, NULL),
(110, 2, 0, 'Subject Group', 1, 1, NULL, NULL),
(111, 2, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(112, 2, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(113, 2, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(114, 2, 0, 'Course', 1, 1, NULL, NULL),
(115, 2, 0, 'Semester', 1, 1, NULL, NULL),
(116, 2, 0, 'Subject', 1, 1, NULL, NULL),
(117, 2, 0, 'Session', 1, 1, NULL, NULL),
(118, 2, 0, 'Promote Students', 1, 1, NULL, NULL),
(119, 2, 1, 'Human Resource', 1, 1, NULL, NULL),
(120, 2, 0, 'Staff', 1, 1, NULL, NULL),
(121, 2, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(122, 2, 0, 'Leave Type', 1, 1, NULL, NULL),
(123, 2, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(124, 2, 0, 'Apply Leave', 1, 1, NULL, NULL),
(125, 2, 0, 'Approve Leave', 1, 1, NULL, NULL),
(126, 2, 0, 'Department', 1, 1, NULL, NULL),
(127, 2, 0, 'Designation', 1, 1, NULL, NULL),
(128, 2, 0, 'Caste', 1, 1, NULL, NULL),
(129, 2, 0, 'Holiday', 1, 1, NULL, NULL),
(130, 2, 0, 'Payroll', 1, 1, NULL, NULL),
(131, 2, 0, 'Payroll Types', 1, 1, NULL, NULL),
(132, 2, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(133, 2, 1, 'Staff Information', 1, 1, NULL, NULL),
(134, 2, 0, 'Staff Experience', 1, 1, NULL, NULL),
(135, 2, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(136, 2, 0, 'Examiners', 1, 1, NULL, NULL),
(137, 2, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(138, 2, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(139, 2, 0, 'Journal Publication', 1, 1, NULL, NULL),
(140, 2, 0, 'Paper Setter', 1, 1, NULL, NULL),
(141, 2, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(142, 2, 0, 'University Synopsis', 1, 1, NULL, NULL),
(143, 2, 0, 'Degree', 1, 1, NULL, NULL),
(144, 2, 0, 'Staff Education', 1, 1, NULL, NULL),
(145, 2, 0, 'Book Publication', 1, 1, NULL, NULL),
(146, 2, 1, 'Attendance', 1, 1, NULL, NULL),
(147, 2, 0, 'Period Attendance', 1, 1, NULL, NULL),
(148, 2, 0, 'Show Attendance', 1, 1, NULL, NULL),
(149, 2, 1, 'Library', 1, 1, NULL, NULL),
(150, 2, 0, 'Add Item', 1, 1, NULL, NULL),
(151, 2, 0, 'Issue Book', 1, 1, NULL, NULL),
(152, 2, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(153, 2, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(154, 2, 1, 'Income', 1, 1, NULL, NULL),
(155, 2, 0, 'Income Head', 1, 1, NULL, NULL),
(156, 2, 0, 'Add Income', 1, 1, NULL, NULL),
(157, 2, 1, 'Expense', 1, 1, NULL, NULL),
(158, 2, 0, 'Expense Head', 1, 1, NULL, NULL),
(159, 2, 0, 'Add Expense', 1, 1, NULL, NULL),
(160, 2, 1, 'Hostel', 1, 1, NULL, NULL),
(161, 2, 0, 'Add Hostel', 1, 1, NULL, NULL),
(162, 2, 0, 'Room Type', 1, 1, NULL, NULL),
(163, 2, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(164, 2, 1, 'Inventory', 1, 1, NULL, NULL),
(165, 2, 0, 'Item Category', 1, 1, NULL, NULL),
(166, 2, 0, 'Add Item', 1, 1, NULL, NULL),
(167, 2, 1, 'Internship', 1, 1, NULL, NULL),
(168, 2, 0, 'Internship Provider', 1, 1, NULL, NULL),
(169, 2, 0, 'Internship Details', 1, 1, NULL, NULL),
(170, 2, 1, 'Job', 1, 1, NULL, NULL),
(171, 2, 0, 'Add Company Details', 1, 1, NULL, NULL),
(172, 2, 0, 'Placement', 1, 1, NULL, NULL),
(173, 2, 1, 'Student Information', 1, 1, NULL, NULL),
(174, 2, 0, 'Student Admission', 1, 1, NULL, NULL),
(175, 2, 1, 'Communication', 1, 1, NULL, NULL),
(176, 2, 0, 'Notice', 1, 1, NULL, NULL),
(177, 2, 1, 'Examination', 1, 1, NULL, NULL),
(178, 2, 0, 'Subject Details', 1, 1, NULL, NULL),
(179, 2, 0, 'Subject Question', 1, 1, NULL, NULL),
(180, 2, 0, 'Exam', 1, 1, NULL, NULL),
(181, 2, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(182, 2, 0, 'Virtual Class', 1, 1, NULL, NULL),
(183, 2, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(184, 2, 1, 'Front Desk', 1, 1, NULL, NULL),
(185, 2, 0, 'Visitor Book', 1, 1, NULL, NULL),
(186, 2, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(187, 2, 0, 'Call Log', 1, 1, NULL, NULL),
(188, 2, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(189, 2, 0, 'Postal Receive', 1, 1, NULL, NULL),
(190, 2, 1, 'Homework', 1, 1, NULL, NULL),
(191, 2, 0, 'Add Homework', 1, 1, NULL, NULL),
(192, 2, 1, 'Transport', 1, 1, NULL, NULL),
(193, 2, 0, 'Routes', 1, 1, NULL, NULL),
(194, 2, 0, 'Vehicle', 1, 1, NULL, NULL),
(195, 2, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(196, 2, 1, 'Fees Collection', 1, 1, NULL, NULL),
(197, 2, 0, 'Fees Type', 1, 1, NULL, NULL),
(198, 2, 0, 'Fees Structure', 1, 1, NULL, NULL),
(199, 2, 0, 'Collect Fees', 1, 1, NULL, NULL),
(200, 2, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(201, 2, 1, 'Report', 1, 1, NULL, NULL),
(202, 2, 0, 'Attendance report', 1, 1, NULL, NULL),
(203, 2, 0, 'Examination report', 1, 1, NULL, NULL),
(204, 2, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(205, 2, 0, 'Admission report', 1, 1, NULL, NULL),
(206, 2, 1, 'Others', 1, 1, NULL, NULL),
(207, 2, 0, 'Agent', 1, 1, NULL, NULL),
(208, 2, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(209, 2, 0, 'Add User Type', 1, 1, NULL, NULL),
(210, 2, 0, 'Icard', 1, 1, NULL, NULL),
(211, 2, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(212, 2, 0, 'Agent Payment', 1, 1, NULL, NULL),
(213, 2, 1, 'Download Center', 1, 1, NULL, NULL),
(214, 2, 0, 'Upload Content', 1, 1, NULL, NULL),
(215, 2, 0, 'Study Material', 1, 1, NULL, NULL),
(216, 2, 0, 'Assignment', 1, 1, NULL, NULL),
(217, 3, 1, 'Academics', 1, 1, NULL, NULL),
(218, 3, 0, 'Subject Group', 1, 1, NULL, NULL),
(219, 3, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(220, 3, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(221, 3, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(222, 3, 0, 'Course', 1, 1, NULL, NULL),
(223, 3, 0, 'Semester', 1, 1, NULL, NULL),
(224, 3, 0, 'Subject', 1, 1, NULL, NULL),
(225, 3, 0, 'Session', 1, 1, NULL, NULL),
(226, 3, 0, 'Promote Students', 1, 1, NULL, NULL),
(227, 3, 1, 'Human Resource', 1, 1, NULL, NULL),
(228, 3, 0, 'Staff', 1, 1, NULL, NULL),
(229, 3, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(230, 3, 0, 'Leave Type', 1, 1, NULL, NULL),
(231, 3, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(232, 3, 0, 'Apply Leave', 1, 1, NULL, NULL),
(233, 3, 0, 'Approve Leave', 1, 1, NULL, NULL),
(234, 3, 0, 'Department', 1, 1, NULL, NULL),
(235, 3, 0, 'Designation', 1, 1, NULL, NULL),
(236, 3, 0, 'Caste', 1, 1, NULL, NULL),
(237, 3, 0, 'Holiday', 1, 1, NULL, NULL),
(238, 3, 0, 'Payroll', 1, 1, NULL, NULL),
(239, 3, 0, 'Payroll Types', 1, 1, NULL, NULL),
(240, 3, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(241, 3, 1, 'Staff Information', 1, 1, NULL, NULL),
(242, 3, 0, 'Staff Experience', 1, 1, NULL, NULL),
(243, 3, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(244, 3, 0, 'Examiners', 1, 1, NULL, NULL),
(245, 3, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(246, 3, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(247, 3, 0, 'Journal Publication', 1, 1, NULL, NULL),
(248, 3, 0, 'Paper Setter', 1, 1, NULL, NULL),
(249, 3, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(250, 3, 0, 'University Synopsis', 1, 1, NULL, NULL),
(251, 3, 0, 'Degree', 1, 1, NULL, NULL),
(252, 3, 0, 'Staff Education', 1, 1, NULL, NULL),
(253, 3, 0, 'Book Publication', 1, 1, NULL, NULL),
(254, 3, 1, 'Attendance', 1, 1, NULL, NULL),
(255, 3, 0, 'Period Attendance', 1, 1, NULL, NULL),
(256, 3, 0, 'Show Attendance', 1, 1, NULL, NULL),
(257, 3, 1, 'Library', 1, 1, NULL, NULL),
(258, 3, 0, 'Add Item', 1, 1, NULL, NULL),
(259, 3, 0, 'Issue Book', 1, 1, NULL, NULL),
(260, 3, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(261, 3, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(262, 3, 1, 'Income', 1, 1, NULL, NULL),
(263, 3, 0, 'Income Head', 1, 1, NULL, NULL),
(264, 3, 0, 'Add Income', 1, 1, NULL, NULL),
(265, 1, 1, 'Expense', 1, 1, NULL, NULL),
(266, 1, 0, 'Expense Head', 1, 1, NULL, NULL),
(267, 1, 0, 'Add Expense', 1, 1, NULL, NULL),
(268, 3, 1, 'Hostel', 1, 1, NULL, NULL),
(269, 3, 0, 'Add Hostel', 1, 1, NULL, NULL),
(270, 3, 0, 'Room Type', 1, 1, NULL, NULL),
(271, 3, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(272, 3, 1, 'Inventory', 1, 1, NULL, NULL),
(273, 3, 0, 'Item Category', 1, 1, NULL, NULL),
(274, 3, 0, 'Add Item', 1, 1, NULL, NULL),
(275, 3, 1, 'Internship', 1, 1, NULL, NULL),
(276, 3, 0, 'Internship Provider', 1, 1, NULL, NULL),
(277, 3, 0, 'Internship Details', 1, 1, NULL, NULL),
(278, 3, 1, 'Job', 1, 1, NULL, NULL),
(279, 3, 0, 'Add Company Details', 1, 1, NULL, NULL),
(280, 3, 0, 'Placement', 1, 1, NULL, NULL),
(281, 3, 1, 'Student Information', 1, 1, NULL, NULL),
(282, 3, 0, 'Student Admission', 1, 1, NULL, NULL),
(283, 3, 1, 'Communication', 1, 1, NULL, NULL),
(284, 3, 0, 'Notice', 1, 1, NULL, NULL),
(285, 3, 1, 'Examination', 1, 1, NULL, NULL),
(286, 3, 0, 'Subject Details', 1, 1, NULL, NULL),
(287, 3, 0, 'Subject Question', 1, 1, NULL, NULL),
(288, 3, 0, 'Exam', 1, 1, NULL, NULL),
(289, 3, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(290, 3, 0, 'Virtual Class', 1, 1, NULL, NULL),
(291, 3, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(292, 3, 1, 'Front Desk', 1, 1, NULL, NULL),
(293, 3, 0, 'Visitor Book', 1, 1, NULL, NULL),
(294, 3, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(295, 3, 0, 'Call Log', 1, 1, NULL, NULL),
(296, 3, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(297, 3, 0, 'Postal Receive', 1, 1, NULL, NULL),
(298, 3, 1, 'Homework', 1, 1, NULL, NULL),
(299, 3, 0, 'Add Homework', 1, 1, NULL, NULL),
(300, 3, 1, 'Transport', 1, 1, NULL, NULL),
(301, 3, 0, 'Routes', 1, 1, NULL, NULL),
(302, 3, 0, 'Vehicle', 1, 1, NULL, NULL),
(303, 3, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(304, 3, 1, 'Fees Collection', 1, 1, NULL, NULL),
(305, 3, 0, 'Fees Type', 1, 1, NULL, NULL),
(306, 3, 0, 'Fees Structure', 1, 1, NULL, NULL),
(307, 3, 0, 'Collect Fees', 1, 1, NULL, NULL),
(308, 3, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(309, 3, 1, 'Report', 1, 1, NULL, NULL),
(310, 3, 0, 'Attendance report', 1, 1, NULL, NULL),
(311, 3, 0, 'Examination report', 1, 1, NULL, NULL),
(312, 3, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(313, 3, 0, 'Admission report', 1, 1, NULL, NULL),
(314, 3, 1, 'Others', 1, 1, NULL, NULL),
(315, 3, 0, 'Agent', 1, 1, NULL, NULL),
(316, 3, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(317, 3, 0, 'Add User Type', 1, 1, NULL, NULL),
(318, 3, 0, 'Icard', 1, 1, NULL, NULL),
(319, 3, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(320, 3, 0, 'Agent Payment', 1, 1, NULL, NULL),
(321, 3, 1, 'Download Center', 1, 1, NULL, NULL),
(322, 3, 0, 'Upload Content', 1, 1, NULL, NULL),
(323, 3, 0, 'Study Material', 1, 1, NULL, NULL),
(324, 3, 0, 'Assignment', 1, 1, NULL, NULL),
(325, 4, 1, 'Academics', 1, 1, NULL, NULL),
(326, 4, 0, 'Subject Group', 1, 1, NULL, NULL),
(327, 4, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(328, 4, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(329, 4, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(330, 4, 0, 'Course', 1, 1, NULL, NULL),
(331, 4, 0, 'Semester', 1, 1, NULL, NULL),
(332, 4, 0, 'Subject', 1, 1, NULL, NULL),
(333, 4, 0, 'Session', 1, 1, NULL, NULL),
(334, 4, 0, 'Promote Students', 1, 1, NULL, NULL),
(335, 4, 1, 'Human Resource', 1, 1, NULL, NULL),
(336, 4, 0, 'Staff', 1, 1, NULL, NULL),
(337, 4, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(338, 4, 0, 'Leave Type', 1, 1, NULL, NULL),
(339, 4, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(340, 4, 0, 'Apply Leave', 1, 1, NULL, NULL),
(341, 4, 0, 'Approve Leave', 1, 1, NULL, NULL),
(342, 4, 0, 'Department', 1, 1, NULL, NULL),
(343, 4, 0, 'Designation', 1, 1, NULL, NULL),
(344, 4, 0, 'Caste', 1, 1, NULL, NULL),
(345, 4, 0, 'Holiday', 1, 1, NULL, NULL),
(346, 4, 0, 'Payroll', 1, 1, NULL, NULL),
(347, 4, 0, 'Payroll Types', 1, 1, NULL, NULL),
(348, 4, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(349, 4, 1, 'Staff Information', 1, 1, NULL, NULL),
(350, 4, 0, 'Staff Experience', 1, 1, NULL, NULL),
(351, 4, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(352, 4, 0, 'Examiners', 1, 1, NULL, NULL),
(353, 4, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(354, 4, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(355, 4, 0, 'Journal Publication', 1, 1, NULL, NULL),
(356, 4, 0, 'Paper Setter', 1, 1, NULL, NULL),
(357, 4, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(358, 4, 0, 'University Synopsis', 1, 1, NULL, NULL),
(359, 4, 0, 'Degree', 1, 1, NULL, NULL),
(360, 4, 0, 'Staff Education', 1, 1, NULL, NULL),
(361, 4, 0, 'Book Publication', 1, 1, NULL, NULL),
(362, 4, 1, 'Attendance', 1, 1, NULL, NULL),
(363, 4, 0, 'Period Attendance', 1, 1, NULL, NULL),
(364, 4, 0, 'Show Attendance', 1, 1, NULL, NULL),
(365, 4, 1, 'Library', 1, 1, NULL, NULL),
(366, 4, 0, 'Add Item', 1, 1, NULL, NULL),
(367, 4, 0, 'Issue Book', 1, 1, NULL, NULL),
(368, 4, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(369, 4, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(370, 4, 1, 'Income', 1, 1, NULL, NULL),
(371, 4, 0, 'Income Head', 1, 1, NULL, NULL),
(372, 4, 0, 'Add Income', 1, 1, NULL, NULL),
(373, 4, 1, 'Expense', 1, 1, NULL, NULL),
(374, 4, 0, 'Expense Head', 1, 1, NULL, NULL),
(375, 4, 0, 'Add Expense', 1, 1, NULL, NULL),
(376, 4, 1, 'Hostel', 1, 1, NULL, NULL),
(377, 4, 0, 'Add Hostel', 1, 1, NULL, NULL),
(378, 4, 0, 'Room Type', 1, 1, NULL, NULL),
(379, 4, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(380, 4, 1, 'Inventory', 1, 1, NULL, NULL),
(381, 4, 0, 'Item Category', 1, 1, NULL, NULL),
(382, 4, 0, 'Add Item', 1, 1, NULL, NULL),
(383, 4, 1, 'Internship', 1, 1, NULL, NULL),
(384, 4, 0, 'Internship Provider', 1, 1, NULL, NULL),
(385, 4, 0, 'Internship Details', 1, 1, NULL, NULL),
(386, 4, 1, 'Job', 1, 1, NULL, NULL),
(387, 4, 0, 'Add Company Details', 1, 1, NULL, NULL),
(388, 4, 0, 'Placement', 1, 1, NULL, NULL),
(389, 4, 1, 'Student Information', 1, 1, NULL, NULL),
(390, 4, 0, 'Student Admission', 1, 1, NULL, NULL),
(391, 4, 1, 'Communication', 1, 1, NULL, NULL),
(392, 4, 0, 'Notice', 1, 1, NULL, NULL),
(393, 4, 1, 'Examination', 1, 1, NULL, NULL),
(394, 4, 0, 'Subject Details', 1, 1, NULL, NULL),
(395, 4, 0, 'Subject Question', 1, 1, NULL, NULL),
(396, 4, 0, 'Exam', 1, 1, NULL, NULL),
(397, 4, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(398, 4, 0, 'Virtual Class', 1, 1, NULL, NULL),
(399, 4, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(400, 4, 1, 'Front Desk', 1, 1, NULL, NULL),
(401, 4, 0, 'Visitor Book', 1, 1, NULL, NULL),
(402, 4, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(403, 4, 0, 'Call Log', 1, 1, NULL, NULL),
(404, 4, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(405, 4, 0, 'Postal Receive', 1, 1, NULL, NULL),
(406, 4, 1, 'Homework', 1, 1, NULL, NULL),
(407, 4, 0, 'Add Homework', 1, 1, NULL, NULL),
(408, 4, 1, 'Transport', 1, 1, NULL, NULL),
(409, 4, 0, 'Routes', 1, 1, NULL, NULL),
(410, 4, 0, 'Vehicle', 1, 1, NULL, NULL),
(411, 4, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(412, 4, 1, 'Fees Collection', 1, 1, NULL, NULL),
(413, 4, 0, 'Fees Type', 1, 1, NULL, NULL),
(414, 4, 0, 'Fees Structure', 1, 1, NULL, NULL),
(415, 4, 0, 'Collect Fees', 1, 1, NULL, NULL),
(416, 4, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(417, 4, 1, 'Report', 1, 1, NULL, NULL),
(418, 4, 0, 'Attendance report', 1, 1, NULL, NULL),
(419, 4, 0, 'Examination report', 1, 1, NULL, NULL),
(420, 4, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(421, 4, 0, 'Admission report', 1, 1, NULL, NULL),
(422, 4, 1, 'Others', 1, 1, NULL, NULL),
(423, 4, 0, 'Agent', 1, 1, NULL, NULL),
(424, 4, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(425, 4, 0, 'Add User Type', 1, 1, NULL, NULL),
(426, 4, 0, 'Icard', 1, 1, NULL, NULL),
(427, 4, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(428, 4, 0, 'Agent Payment', 1, 1, NULL, NULL),
(429, 4, 1, 'Download Center', 1, 1, NULL, NULL),
(430, 4, 0, 'Upload Content', 1, 1, NULL, NULL),
(431, 4, 0, 'Study Material', 1, 1, NULL, NULL),
(432, 4, 0, 'Assignment', 1, 1, NULL, NULL),
(433, 5, 1, 'Academics', 1, 1, NULL, NULL),
(434, 5, 0, 'Subject Group', 1, 1, NULL, NULL),
(435, 5, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(436, 5, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(437, 5, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(438, 5, 0, 'Course', 1, 1, NULL, NULL),
(439, 5, 0, 'Semester', 1, 1, NULL, NULL),
(440, 5, 0, 'Subject', 1, 1, NULL, NULL),
(441, 5, 0, 'Session', 1, 1, NULL, NULL),
(442, 5, 0, 'Promote Students', 1, 1, NULL, NULL),
(443, 5, 1, 'Human Resource', 1, 1, NULL, NULL),
(444, 5, 0, 'Staff', 1, 1, NULL, NULL),
(445, 5, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(446, 5, 0, 'Leave Type', 1, 1, NULL, NULL),
(447, 5, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(448, 5, 0, 'Apply Leave', 1, 1, NULL, NULL),
(449, 5, 0, 'Approve Leave', 1, 1, NULL, NULL),
(450, 5, 0, 'Department', 1, 1, NULL, NULL),
(451, 5, 0, 'Designation', 1, 1, NULL, NULL),
(452, 5, 0, 'Caste', 1, 1, NULL, NULL),
(453, 5, 0, 'Holiday', 1, 1, NULL, NULL),
(454, 5, 0, 'Payroll', 1, 1, NULL, NULL),
(455, 5, 0, 'Payroll Types', 1, 1, NULL, NULL),
(456, 5, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(457, 5, 1, 'Staff Information', 1, 1, NULL, NULL),
(458, 5, 0, 'Staff Experience', 1, 1, NULL, NULL),
(459, 5, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(460, 5, 0, 'Examiners', 1, 1, NULL, NULL),
(461, 5, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(462, 5, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(463, 5, 0, 'Journal Publication', 1, 1, NULL, NULL),
(464, 5, 0, 'Paper Setter', 1, 1, NULL, NULL),
(465, 5, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(466, 5, 0, 'University Synopsis', 1, 1, NULL, NULL),
(467, 5, 0, 'Degree', 1, 1, NULL, NULL),
(468, 5, 0, 'Staff Education', 1, 1, NULL, NULL),
(469, 5, 0, 'Book Publication', 1, 1, NULL, NULL),
(470, 5, 1, 'Attendance', 1, 1, NULL, NULL),
(471, 5, 0, 'Period Attendance', 1, 1, NULL, NULL),
(472, 5, 0, 'Show Attendance', 1, 1, NULL, NULL),
(473, 5, 1, 'Library', 1, 1, NULL, NULL),
(474, 5, 0, 'Add Item', 1, 1, NULL, NULL),
(475, 5, 0, 'Issue Book', 1, 1, NULL, NULL),
(476, 5, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(477, 5, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(478, 5, 1, 'Income', 1, 1, NULL, NULL),
(479, 5, 0, 'Income Head', 1, 1, NULL, NULL),
(480, 5, 0, 'Add Income', 1, 1, NULL, NULL),
(481, 5, 1, 'Expense', 1, 1, NULL, NULL),
(482, 5, 0, 'Expense Head', 1, 1, NULL, NULL),
(483, 5, 0, 'Add Expense', 1, 1, NULL, NULL),
(484, 5, 1, 'Hostel', 1, 1, NULL, NULL),
(485, 5, 0, 'Add Hostel', 1, 1, NULL, NULL),
(486, 5, 0, 'Room Type', 1, 1, NULL, NULL),
(487, 5, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(488, 5, 1, 'Inventory', 1, 1, NULL, NULL),
(489, 5, 0, 'Item Category', 1, 1, NULL, NULL),
(490, 5, 0, 'Add Item', 1, 1, NULL, NULL),
(491, 5, 1, 'Internship', 1, 1, NULL, NULL),
(492, 5, 0, 'Internship Provider', 1, 1, NULL, NULL),
(493, 5, 0, 'Internship Details', 1, 1, NULL, NULL),
(494, 5, 1, 'Job', 1, 1, NULL, NULL),
(495, 5, 0, 'Add Company Details', 1, 1, NULL, NULL),
(496, 5, 0, 'Placement', 1, 1, NULL, NULL),
(497, 5, 1, 'Student Information', 1, 1, NULL, NULL),
(498, 5, 0, 'Student Admission', 1, 1, NULL, NULL),
(499, 5, 1, 'Communication', 1, 1, NULL, NULL),
(500, 5, 0, 'Notice', 1, 1, NULL, NULL),
(501, 5, 1, 'Examination', 1, 1, NULL, NULL),
(502, 5, 0, 'Subject Details', 1, 1, NULL, NULL),
(503, 5, 0, 'Subject Question', 1, 1, NULL, NULL),
(504, 5, 0, 'Exam', 1, 1, NULL, NULL),
(505, 5, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(506, 5, 0, 'Virtual Class', 1, 1, NULL, NULL),
(507, 5, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(508, 5, 1, 'Front Desk', 1, 1, NULL, NULL),
(509, 5, 0, 'Visitor Book', 1, 1, NULL, NULL),
(510, 5, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(511, 5, 0, 'Call Log', 1, 1, NULL, NULL),
(512, 5, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(513, 5, 0, 'Postal Receive', 1, 1, NULL, NULL),
(514, 5, 1, 'Homework', 1, 1, NULL, NULL),
(515, 5, 0, 'Add Homework', 1, 1, NULL, NULL),
(516, 5, 1, 'Transport', 1, 1, NULL, NULL),
(517, 5, 0, 'Routes', 1, 1, NULL, NULL),
(518, 5, 0, 'Vehicle', 1, 1, NULL, NULL),
(519, 5, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(520, 5, 1, 'Fees Collection', 1, 1, NULL, NULL),
(521, 5, 0, 'Fees Type', 1, 1, NULL, NULL),
(522, 5, 0, 'Fees Structure', 1, 1, NULL, NULL),
(523, 5, 0, 'Collect Fees', 1, 1, NULL, NULL),
(524, 5, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(525, 5, 1, 'Report', 1, 1, NULL, NULL),
(526, 5, 0, 'Attendance report', 1, 1, NULL, NULL),
(527, 5, 0, 'Examination report', 1, 1, NULL, NULL),
(528, 5, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(529, 5, 0, 'Admission report', 1, 1, NULL, NULL),
(530, 5, 1, 'Others', 1, 1, NULL, NULL),
(531, 5, 0, 'Agent', 1, 1, NULL, NULL),
(532, 5, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(533, 5, 0, 'Add User Type', 1, 1, NULL, NULL),
(534, 5, 0, 'Icard', 1, 1, NULL, NULL),
(535, 5, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(536, 5, 0, 'Agent Payment', 1, 1, NULL, NULL),
(537, 5, 1, 'Download Center', 1, 1, NULL, NULL),
(538, 5, 0, 'Upload Content', 1, 1, NULL, NULL),
(539, 5, 0, 'Study Material', 1, 1, NULL, NULL),
(540, 5, 0, 'Assignment', 1, 1, NULL, NULL),
(541, 6, 1, 'Academics', 1, 1, NULL, NULL),
(542, 6, 0, 'Subject Group', 1, 1, NULL, NULL),
(543, 6, 0, 'Assign Semester Teacher', 1, 1, NULL, NULL),
(544, 6, 0, 'Create Semester Timetable', 1, 1, NULL, NULL),
(545, 6, 0, 'Semester Timetable', 1, 1, NULL, NULL),
(546, 6, 0, 'Course', 1, 1, NULL, NULL),
(547, 6, 0, 'Semester', 1, 1, NULL, NULL),
(548, 6, 0, 'Subject', 1, 1, NULL, NULL),
(549, 6, 0, 'Session', 1, 1, NULL, NULL),
(550, 6, 0, 'Promote Students', 1, 1, NULL, NULL),
(551, 6, 1, 'Human Resource', 1, 1, NULL, NULL),
(552, 6, 0, 'Staff', 1, 1, NULL, NULL),
(553, 6, 0, 'Staff Attendance', 1, 1, NULL, NULL),
(554, 6, 0, 'Leave Type', 1, 1, NULL, NULL),
(555, 6, 0, 'Allocate Leave', 1, 1, NULL, NULL),
(556, 6, 0, 'Apply Leave', 1, 1, NULL, NULL),
(557, 6, 0, 'Approve Leave', 1, 1, NULL, NULL),
(558, 6, 0, 'Department', 1, 1, NULL, NULL),
(559, 6, 0, 'Designation', 1, 1, NULL, NULL),
(560, 6, 0, 'Caste', 1, 1, NULL, NULL),
(561, 6, 0, 'Holiday', 1, 1, NULL, NULL),
(562, 6, 0, 'Payroll', 1, 1, NULL, NULL),
(563, 6, 0, 'Payroll Types', 1, 1, NULL, NULL),
(564, 6, 0, 'Staff Promotion', 1, 1, NULL, NULL),
(565, 6, 1, 'Staff Information', 1, 1, NULL, NULL),
(566, 6, 0, 'Staff Experience', 1, 1, NULL, NULL),
(567, 6, 0, 'Seminar / Workshop / Faculty Development Programme', 1, 1, NULL, NULL),
(568, 6, 0, 'Examiners', 1, 1, NULL, NULL),
(569, 6, 0, 'Answer Script Evaluator', 1, 1, NULL, NULL),
(570, 6, 0, 'Sponsored project/Consultancy', 1, 1, NULL, NULL),
(571, 6, 0, 'Journal Publication', 1, 1, NULL, NULL),
(572, 6, 0, 'Paper Setter', 1, 1, NULL, NULL),
(573, 6, 0, 'Pg Phd Guide', 1, 1, NULL, NULL),
(574, 6, 0, 'University Synopsis', 1, 1, NULL, NULL),
(575, 6, 0, 'Degree', 1, 1, NULL, NULL),
(576, 6, 0, 'Staff Education', 1, 1, NULL, NULL),
(577, 6, 0, 'Book Publication', 1, 1, NULL, NULL),
(578, 6, 1, 'Attendance', 1, 1, NULL, NULL),
(579, 6, 0, 'Period Attendance', 1, 1, NULL, NULL),
(580, 6, 0, 'Show Attendance', 1, 1, NULL, NULL),
(581, 6, 1, 'Library', 1, 1, NULL, NULL),
(582, 6, 0, 'Add Item', 1, 1, NULL, NULL),
(583, 6, 0, 'Issue Book', 1, 1, NULL, NULL),
(584, 6, 0, 'Upload Digital Book', 1, 1, NULL, NULL),
(585, 6, 0, 'Download Digital Book', 1, 1, NULL, NULL),
(586, 6, 1, 'Income', 1, 1, NULL, NULL),
(587, 6, 0, 'Income Head', 1, 1, NULL, NULL),
(588, 6, 0, 'Add Income', 1, 1, NULL, NULL),
(589, 6, 1, 'Expense', 1, 1, NULL, NULL),
(590, 6, 0, 'Expense Head', 1, 1, NULL, NULL),
(591, 6, 0, 'Add Expense', 1, 1, NULL, NULL),
(592, 6, 1, 'Hostel', 1, 1, NULL, NULL),
(593, 6, 0, 'Add Hostel', 1, 1, NULL, NULL),
(594, 6, 0, 'Room Type', 1, 1, NULL, NULL),
(595, 6, 0, 'Add Hostel Room', 1, 1, NULL, NULL),
(596, 6, 1, 'Inventory', 1, 1, NULL, NULL),
(597, 6, 0, 'Item Category', 1, 1, NULL, NULL),
(598, 6, 0, 'Add Item', 1, 1, NULL, NULL),
(599, 6, 1, 'Internship', 1, 1, NULL, NULL),
(600, 6, 0, 'Internship Provider', 1, 1, NULL, NULL),
(601, 6, 0, 'Internship Details', 1, 1, NULL, NULL),
(602, 6, 1, 'Job', 1, 1, NULL, NULL),
(603, 6, 0, 'Add Company Details', 1, 1, NULL, NULL),
(604, 6, 0, 'Placement', 1, 1, NULL, NULL),
(605, 6, 1, 'Student Information', 1, 1, NULL, NULL),
(606, 6, 0, 'Student Admission', 1, 1, NULL, NULL),
(607, 6, 1, 'Communication', 1, 1, NULL, NULL),
(608, 6, 0, 'Notice', 1, 1, NULL, NULL),
(609, 6, 1, 'Examination', 1, 1, NULL, NULL),
(610, 6, 0, 'Subject Details', 1, 1, NULL, NULL),
(611, 6, 0, 'Subject Question', 1, 1, NULL, NULL),
(612, 6, 0, 'Exam', 1, 1, NULL, NULL),
(613, 6, 1, 'Virtual Class Meeting', 1, 1, NULL, NULL),
(614, 6, 0, 'Virtual Class', 1, 1, NULL, NULL),
(615, 6, 0, 'Virtual Meeting', 1, 1, NULL, NULL),
(616, 6, 1, 'Front Desk', 1, 1, NULL, NULL),
(617, 6, 0, 'Visitor Book', 1, 1, NULL, NULL),
(618, 6, 0, 'Admission Enquiry', 1, 1, NULL, NULL),
(619, 6, 0, 'Call Log', 1, 1, NULL, NULL),
(620, 6, 0, 'Postal Dispatch', 1, 1, NULL, NULL),
(621, 6, 0, 'Postal Receive', 1, 1, NULL, NULL),
(622, 6, 1, 'Homework', 1, 1, NULL, NULL),
(623, 6, 0, 'Add Homework', 1, 1, NULL, NULL),
(624, 6, 1, 'Transport', 1, 1, NULL, NULL),
(625, 6, 0, 'Routes', 1, 1, NULL, NULL),
(626, 6, 0, 'Vehicle', 1, 1, NULL, NULL),
(627, 6, 0, 'Assign Vehicle', 1, 1, NULL, NULL),
(628, 6, 1, 'Fees Collection', 1, 1, NULL, NULL),
(629, 6, 0, 'Fees Type', 1, 1, NULL, NULL),
(630, 6, 0, 'Fees Structure', 1, 1, NULL, NULL),
(631, 6, 0, 'Collect Fees', 1, 1, NULL, NULL),
(632, 6, 0, 'Discount/Scholarship', 1, 1, NULL, NULL),
(633, 6, 1, 'Report', 1, 1, NULL, NULL),
(634, 6, 0, 'Attendance report', 1, 1, NULL, NULL),
(635, 6, 0, 'Examination report', 1, 1, NULL, NULL),
(636, 6, 0, 'Fees Collection report', 1, 1, NULL, NULL),
(637, 6, 0, 'Admission report', 1, 1, NULL, NULL),
(638, 6, 1, 'Others', 1, 1, NULL, NULL),
(639, 6, 0, 'Agent', 1, 1, NULL, NULL),
(640, 6, 0, 'Roles And Permission', 1, 1, NULL, NULL),
(641, 6, 0, 'Add User Type', 1, 1, NULL, NULL),
(642, 6, 0, 'Icard', 1, 1, NULL, NULL),
(643, 6, 0, 'Agent Student Entry', 1, 1, NULL, NULL),
(644, 6, 0, 'Agent Payment', 1, 1, NULL, NULL),
(645, 6, 1, 'Download Center', 1, 1, NULL, NULL),
(646, 6, 0, 'Upload Content', 1, 1, NULL, NULL),
(647, 6, 0, 'Study Material', 1, 1, NULL, NULL),
(648, 6, 0, 'Assignment', 1, 1, NULL, NULL);

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
(1067, '2000_01_00_043555_create_user_types_table', 1),
(1068, '2000_01_10_112612_create_franchises_table', 1),
(1069, '2000_01_10_112613_create_categories_table', 1),
(1070, '2014_10_12_000000_create_users_table', 1),
(1071, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(1072, '2019_08_19_000000_create_failed_jobs_table', 1),
(1073, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(1074, '2023_01_05_085131_create_week_days_table', 1),
(1075, '2024_01_04_042542_create_courses_table', 1),
(1076, '2024_01_04_042932_create_members_table', 1),
(1077, '2024_01_04_043135_create_galleries_table', 1),
(1078, '2024_01_04_062500_create_subjects_table', 1),
(1079, '2024_01_04_062747_create_semesters_table', 1),
(1080, '2024_01_04_064524_create_course_groups_table', 1),
(1081, '2024_01_04_072555_create_subject_groups_table', 1),
(1082, '2024_01_04_123229_create_assign_semester_teachers_table', 1),
(1083, '2024_01_05_045952_create_attendances_table', 1),
(1084, '2024_01_05_064713_create_sessions_table', 1),
(1085, '2024_01_05_064715_create_semester_timetables_table', 1),
(1086, '2024_01_09_060419_create_pre_admission_payments_table', 1),
(1087, '2024_01_09_102133_create_leave_types_table', 1),
(1088, '2024_01_09_102135_create_leaves_table', 1),
(1089, '2024_01_10_060418_create_agents_table', 1),
(1090, '2024_01_10_060419_create_student_details_table', 1),
(1091, '2024_01_10_065125_create_fees_types_table', 1),
(1092, '2024_01_11_123743_create_notices_table', 1),
(1093, '2024_01_11_130343_create_contents_table', 1),
(1094, '2024_01_17_035847_create_hotel_types_table', 1),
(1095, '2024_01_17_035848_create_library_stocks_table', 1),
(1096, '2024_01_17_051839_create_library_issues_table', 1),
(1097, '2024_01_17_082218_create_hotels_table', 1),
(1098, '2024_01_17_082231_create_room_types_table', 1),
(1099, '2024_01_17_082232_create_hotel_details_table', 1),
(1100, '2024_01_18_052505_create_item_types_table', 1),
(1101, '2024_01_18_052506_create_inventory_items_table', 1),
(1102, '2024_01_18_092258_create_departments_table', 1),
(1103, '2024_01_19_044951_create_internship_providers_table', 1),
(1104, '2024_01_19_055544_create_internship_details_table', 1),
(1105, '2024_01_21_045651_create_leave_lists_table', 1),
(1106, '2024_01_22_083152_create_subject_details_table', 1),
(1107, '2024_01_23_095524_create_questions_table', 1),
(1108, '2024_01_26_034553_create_discounts_table', 1),
(1109, '2024_01_27_111201_create_designations_table', 1),
(1110, '2024_01_31_053746_create_answersheets_table', 1),
(1111, '2024_02_02_062420_create_menu_management_table', 1),
(1112, '2024_02_03_042517_create_roles_table', 1),
(1113, '2024_02_03_042543_create_roles_and_permissions_table', 1),
(1114, '2024_02_05_082803_create_holidays_table', 1),
(1115, '2024_02_10_043515_create_fees_structures_table', 1),
(1116, '2024_02_10_061246_create_staff_attendances_table', 1),
(1117, '2024_02_12_061832_create_generated_payrolls_table', 1),
(1118, '2024_02_19_111241_create_payroll_types_table', 1),
(1119, '2024_02_20_050844_create_payroll_earnings_table', 1),
(1120, '2024_02_20_050905_create_payroll_deductions_table', 1),
(1121, '2024_02_20_074719_create_item_suppliers_table', 1),
(1122, '2024_02_20_095436_create_item_stores_table', 1),
(1123, '2024_02_20_113112_create_item_stocks_table', 1),
(1124, '2024_02_21_054759_create_inventory_issues_table', 1),
(1125, '2024_02_24_130802_create_income_heads_table', 1),
(1126, '2024_02_24_130812_create_expense_heads_table', 1),
(1127, '2024_02_26_044305_create_incomes_table', 1),
(1128, '2024_02_26_044314_create_expenses_table', 1),
(1129, '2024_02_27_051816_create_user_logs_table', 1),
(1130, '2024_02_28_060027_create_agent_payments_table', 1),
(1131, '2024_03_06_044258_create_library_digital_books_table', 1),
(1132, '2024_03_07_044658_create_certificate_types_table', 1),
(1133, '2024_03_07_071021_create_certificates_table', 1),
(1134, '2024_03_08_053244_create_virtual_classes_table', 1),
(1135, '2024_03_08_103955_create_virtual_meetings_table', 1),
(1136, '2024_03_09_121428_create_chats_table', 1),
(1137, '2024_03_13_103737_create_visitor_books_table', 1),
(1138, '2024_03_13_113212_create_postals_table', 1),
(1139, '2024_03_14_054625_create_call_logs_table', 1),
(1140, '2024_03_14_071357_create_admission_enquiries_table', 1),
(1141, '2024_03_14_112702_create_homework_table', 1),
(1142, '2024_03_15_061605_create_caution_money_table', 1),
(1143, '2024_03_18_063232_create_routes_table', 1),
(1144, '2024_03_18_085128_create_vehicles_table', 1),
(1145, '2024_03_18_113553_create_assign_vehicles_table', 1),
(1146, '2024_04_02_102550_create_marksheets_table', 1),
(1147, '2024_06_04_145634_create_company_details_table', 1),
(1148, '2024_06_04_162235_create_placement_details_table', 1),
(1149, '2024_06_14_094426_create_achivements_table', 1),
(1150, '2024_06_18_104354_create_class_statuses_table', 1),
(1151, '2024_06_19_102634_create_staff_experiences_table', 1),
(1152, '2024_06_19_104715_create_education_qualifications_table', 1),
(1153, '2024_06_19_133730_create_student_education_table', 1),
(1154, '2024_06_20_124551_create_paper_setters_table', 1),
(1155, '2024_06_20_172907_create_promotions_table', 1),
(1156, '2024_06_21_063815_create_sponsored_project_consultancies_table', 1),
(1157, '2024_06_21_082937_create_journal_publications_table', 1),
(1158, '2024_06_22_041646_create_book_publications_table', 1),
(1159, '2024_06_22_095418_create_consultancies_table', 1),
(1160, '2024_06_23_121037_create_pg_phd_guides_table', 1),
(1161, '2024_06_24_042911_create_examiners_table', 1),
(1162, '2024_06_24_062018_create_answerscript_evaluators_table', 1),
(1163, '2024_06_24_080202_create_university_synopses_table', 1),
(1164, '2024_06_24_083247_create_seminar_workshop_faculties_table', 1),
(1165, '2024_06_24_103949_create_staff_education_table', 1),
(1166, '2024_06_24_105725_create_payslip_uploads_table', 1),
(1167, '2024_06_24_123451_create_degrees_table', 1),
(1168, '2024_06_26_101626_create_manual_fees_table', 1),
(1169, '2025_01_10_042852_create_payments_table', 1),
(1170, '2025_01_10_044318_create_registrations_table', 1),
(1171, '2025_01_18_092259_create_member_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `mailed_to` varchar(255) DEFAULT NULL,
  `published_on` date NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paper_setters`
--

CREATE TABLE `paper_setters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `examination_name` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) DEFAULT NULL,
  `ref_date` varchar(255) DEFAULT NULL,
  `paper_file` varchar(255) DEFAULT NULL,
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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paid_on` date NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_deductions`
--

CREATE TABLE `payroll_deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `payroll_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_earnings`
--

CREATE TABLE `payroll_earnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `payroll_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_types`
--

CREATE TABLE `payroll_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_uploads`
--

CREATE TABLE `payslip_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 51, 'my-app-token', 'db343a63599557a674bd6cd54d9b17c0b91f75ac709fdb254d3295aeac9d5f50', '[\"*\"]', '2024-06-26 23:40:07', NULL, '2024-06-26 23:39:59', '2024-06-26 23:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `pg_phd_guides`
--

CREATE TABLE `pg_phd_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `guide` varchar(255) DEFAULT NULL,
  `co_guide` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) NOT NULL,
  `ref_date` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement_details`
--

CREATE TABLE `placement_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `placement_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postals`
--

CREATE TABLE `postals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postal_type` varchar(255) NOT NULL,
  `from_title` varchar(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `to_title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_admission_payments`
--

CREATE TABLE `pre_admission_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `refund` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sl` varchar(255) DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `promotion_date` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_details_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'COURSE', NULL, NULL),
(2, 'SESSION', NULL, NULL),
(3, 'SUBJECT', NULL, NULL),
(4, 'SEMESTER', NULL, NULL),
(5, 'SUBJECT GROUP', NULL, NULL),
(6, 'ASSIGN SEMESTER TEACHER', NULL, NULL),
(7, 'CREATE SEMESTER TIMETABLE', NULL, NULL),
(8, 'STAFF', NULL, NULL),
(9, 'LEAVE TYPE', NULL, NULL),
(10, 'ALLOCATE LEAVE', NULL, NULL),
(11, 'APPLY LEAVE', NULL, NULL),
(12, 'DEPARTMENT', NULL, NULL),
(13, 'DESIGNATION', NULL, NULL),
(14, 'CASTE', NULL, NULL),
(15, 'HOLIDAY', NULL, NULL),
(16, 'PAYROLL', NULL, NULL),
(17, 'PAYROLL TYPES', NULL, NULL),
(18, 'PERIOD ATTENDANCE', NULL, NULL),
(19, 'ADD ITEM', NULL, NULL),
(20, 'ISSUE BOOK', NULL, NULL),
(21, 'UPLOAD DIGITAL BOOK', NULL, NULL),
(22, 'ADD HOSTEL', NULL, NULL),
(23, 'ROOM TYPE', NULL, NULL),
(24, 'ADD HOSTEL ROOM', NULL, NULL),
(25, 'INTERNSHIP PROVIDER', NULL, NULL),
(26, 'INTERNSHIP DETAILS', NULL, NULL),
(27, 'STUDENT ADMISSION', NULL, NULL),
(28, 'NOTICE', NULL, NULL),
(29, 'SUBJECT DETAILS', NULL, NULL),
(30, 'SUBJECT QUESTION', NULL, NULL),
(31, 'FEES TYPE', NULL, NULL),
(32, 'FEES STRUCTURE', NULL, NULL),
(33, 'COLLECT FEES', NULL, NULL),
(34, 'DISCOUNT', NULL, NULL),
(35, 'AGENT', NULL, NULL),
(36, 'FRANCHISE', NULL, NULL),
(37, 'AGENT STUDENT ENTRY', NULL, NULL),
(38, 'USER TYPE', NULL, NULL),
(39, 'UPLOAD CONTENT', NULL, NULL),
(40, 'INVENTORY ADD ITEM', NULL, NULL),
(41, 'INVENTORY ISSUE ITEM', NULL, NULL),
(42, 'INVENTORY ITEM STOCK', NULL, NULL),
(43, 'INVENTORY ITEM STORE', NULL, NULL),
(44, 'INVENTORY ITEM SUPPLIER', NULL, NULL),
(45, 'INVENTORY ITEM TYPE', NULL, NULL),
(46, 'INCOME HEAD', NULL, NULL),
(47, 'ADD INCOME', NULL, NULL),
(48, 'EXPENSE HEAD', NULL, NULL),
(49, 'ADD EXPENSE', NULL, NULL),
(50, 'AGENT PAYMENT', NULL, NULL),
(51, 'VIRTUAL CLASS', NULL, NULL),
(52, 'VIRTUAL MEETING', NULL, NULL),
(53, 'HOMEWORK', NULL, NULL),
(54, 'VISITOR BOOK', NULL, NULL),
(55, 'ADMISSION ENQUIRY', NULL, NULL),
(56, 'CALL LOG', NULL, NULL),
(57, 'POSTAL DISPATCH', NULL, NULL),
(58, 'POSTAL RECEIVE', NULL, NULL),
(59, 'ROUTES', NULL, NULL),
(60, 'VEHICLE', NULL, NULL),
(61, 'ASSIGN VEHICLE', NULL, NULL),
(62, 'ADD COMPANY DETAILS', NULL, NULL),
(63, 'PLACEMENT', NULL, NULL),
(64, 'ACHIEVEMENT', NULL, NULL),
(65, 'STAFF EXPERIENCE', NULL, NULL),
(66, 'SAMINER WORKSHOP', NULL, NULL),
(67, 'EXAMINERS', NULL, NULL),
(68, 'ANSWER SCRIPT EVALUATOR', NULL, NULL),
(69, 'SPONSORED PROJECT', NULL, NULL),
(70, 'JOURNAL PUBLICATION', NULL, NULL),
(71, 'PAPER SETTER', NULL, NULL),
(72, 'PG PHD GUIDE', NULL, NULL),
(73, 'UNIVERSITY SYNOPSIS', NULL, NULL),
(74, 'DEGREE', NULL, NULL),
(75, 'STAFF EDUCATION', NULL, NULL),
(76, 'BOOK PUBLICATION', NULL, NULL),
(77, 'STAFF PROMOTION', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_and_permissions`
--

CREATE TABLE `roles_and_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_and_permissions`
--

INSERT INTO `roles_and_permissions` (`id`, `user_type_id`, `role_id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(2, 1, 1, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(3, 1, 1, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(4, 1, 1, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(5, 1, 2, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(6, 1, 2, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(7, 1, 2, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(8, 1, 2, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(9, 1, 3, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(10, 1, 3, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(11, 1, 3, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(12, 1, 3, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(13, 1, 4, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(14, 1, 4, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(15, 1, 4, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(16, 1, 4, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(17, 1, 5, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(18, 1, 5, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(19, 1, 5, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(20, 1, 5, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(21, 1, 6, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(22, 1, 6, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(23, 1, 6, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(24, 1, 6, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(25, 1, 7, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(26, 1, 7, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(27, 1, 7, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(28, 1, 7, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(29, 1, 8, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(30, 1, 8, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(31, 1, 8, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(32, 1, 8, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(33, 1, 9, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(34, 1, 9, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(35, 1, 9, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(36, 1, 9, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(37, 1, 10, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(38, 1, 10, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(39, 1, 10, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(40, 1, 10, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(41, 1, 11, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(42, 1, 11, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(43, 1, 11, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(44, 1, 11, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(45, 1, 12, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(46, 1, 12, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(47, 1, 12, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(48, 1, 12, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(49, 1, 13, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(50, 1, 13, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(51, 1, 13, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(52, 1, 13, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(53, 1, 14, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(54, 1, 14, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(55, 1, 14, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(56, 1, 14, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(57, 1, 15, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(58, 1, 15, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(59, 1, 15, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(60, 1, 15, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(61, 1, 16, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(62, 1, 16, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(63, 1, 16, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(64, 1, 16, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(65, 1, 17, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(66, 1, 17, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(67, 1, 17, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(68, 1, 17, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(69, 1, 18, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(70, 1, 18, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(71, 1, 18, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(72, 1, 18, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(73, 1, 19, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(74, 1, 19, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(75, 1, 19, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(76, 1, 19, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(77, 1, 20, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(78, 1, 20, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(79, 1, 20, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(80, 1, 20, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(81, 1, 21, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(82, 1, 21, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(83, 1, 21, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(84, 1, 21, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(85, 1, 22, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(86, 1, 22, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(87, 1, 22, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(88, 1, 22, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(89, 1, 23, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(90, 1, 23, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(91, 1, 23, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(92, 1, 23, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(93, 1, 24, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(94, 1, 24, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(95, 1, 24, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(96, 1, 24, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(97, 1, 25, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(98, 1, 25, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(99, 1, 25, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(100, 1, 25, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(101, 1, 26, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(102, 1, 26, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(103, 1, 26, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(104, 1, 26, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(105, 1, 27, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(106, 1, 27, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(107, 1, 27, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(108, 1, 27, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(109, 1, 28, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(110, 1, 28, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(111, 1, 28, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(112, 1, 28, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(113, 1, 29, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(114, 1, 29, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(115, 1, 29, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(116, 1, 29, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(117, 1, 30, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(118, 1, 30, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(119, 1, 30, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(120, 1, 30, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(121, 1, 31, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(122, 1, 31, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(123, 1, 31, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(124, 1, 31, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(125, 1, 32, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(126, 1, 32, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(127, 1, 32, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(128, 1, 32, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(129, 1, 33, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(130, 1, 33, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(131, 1, 33, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(132, 1, 33, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(133, 1, 34, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(134, 1, 34, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(135, 1, 34, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(136, 1, 34, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(137, 1, 35, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(138, 1, 35, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(139, 1, 35, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(140, 1, 35, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(141, 1, 36, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(142, 1, 36, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(143, 1, 36, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(144, 1, 36, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(145, 1, 37, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(146, 1, 37, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(147, 1, 37, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(148, 1, 37, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(149, 1, 38, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(150, 1, 38, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(151, 1, 38, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(152, 1, 38, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(153, 1, 39, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(154, 1, 39, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(155, 1, 39, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(156, 1, 39, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(157, 1, 40, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(158, 1, 40, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(159, 1, 40, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(160, 1, 40, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(161, 1, 41, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(162, 1, 41, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(163, 1, 41, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(164, 1, 41, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(165, 1, 42, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(166, 1, 42, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(167, 1, 42, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(168, 1, 42, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(169, 1, 43, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(170, 1, 43, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(171, 1, 43, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(172, 1, 43, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(173, 1, 44, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(174, 1, 44, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(175, 1, 44, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(176, 1, 44, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(177, 1, 45, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(178, 1, 45, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(179, 1, 45, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(180, 1, 45, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(181, 1, 46, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(182, 1, 46, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(183, 1, 46, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(184, 1, 46, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(185, 1, 47, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(186, 1, 47, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(187, 1, 47, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(188, 1, 47, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(189, 1, 48, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(190, 1, 48, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(191, 1, 48, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(192, 1, 48, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(193, 1, 49, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(194, 1, 49, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(195, 1, 49, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(196, 1, 49, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(197, 1, 50, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(198, 1, 50, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(199, 1, 50, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(200, 1, 50, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(201, 1, 51, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(202, 1, 51, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(203, 1, 51, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(204, 1, 51, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(205, 1, 52, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(206, 1, 52, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(207, 1, 52, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(208, 1, 52, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(209, 1, 53, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(210, 1, 53, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(211, 1, 53, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(212, 1, 53, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(213, 1, 54, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(214, 1, 54, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(215, 1, 54, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(216, 1, 54, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(217, 1, 55, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(218, 1, 55, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(219, 1, 55, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(220, 1, 55, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(221, 1, 56, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(222, 1, 56, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(223, 1, 56, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(224, 1, 56, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(225, 1, 57, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(226, 1, 57, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(227, 1, 57, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(228, 1, 57, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(229, 1, 58, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(230, 1, 58, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(231, 1, 58, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(232, 1, 58, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(233, 1, 59, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(234, 1, 59, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(235, 1, 59, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(236, 1, 59, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(237, 1, 60, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(238, 1, 60, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(239, 1, 60, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(240, 1, 60, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(241, 1, 61, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(242, 1, 61, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(243, 1, 61, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(244, 1, 61, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(245, 1, 62, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(246, 1, 62, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(247, 1, 62, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(248, 1, 62, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(249, 1, 63, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(250, 1, 63, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(251, 1, 63, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(252, 1, 63, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(253, 1, 64, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(254, 1, 64, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(255, 1, 64, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(256, 1, 64, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(257, 1, 65, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(258, 1, 65, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(259, 1, 65, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(260, 1, 65, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(261, 1, 66, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(262, 1, 66, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(263, 1, 66, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(264, 1, 66, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(265, 1, 67, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(266, 1, 67, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(267, 1, 67, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(268, 1, 67, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(269, 1, 68, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(270, 1, 68, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(271, 1, 68, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(272, 1, 68, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(273, 1, 69, 'SAVE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(274, 1, 69, 'UPDATE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(275, 1, 69, 'DELETE', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(276, 1, 69, 'SHOW', 1, '2024-06-26 23:39:53', '2024-06-26 23:39:53'),
(277, 1, 70, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(278, 1, 70, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(279, 1, 70, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(280, 1, 70, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(281, 1, 71, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(282, 1, 71, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(283, 1, 71, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(284, 1, 71, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(285, 1, 72, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(286, 1, 72, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(287, 1, 72, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(288, 1, 72, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(289, 1, 73, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(290, 1, 73, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(291, 1, 73, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(292, 1, 73, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(293, 1, 74, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(294, 1, 74, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(295, 1, 74, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(296, 1, 74, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(297, 1, 75, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(298, 1, 75, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(299, 1, 75, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(300, 1, 75, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(301, 1, 76, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(302, 1, 76, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(303, 1, 76, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(304, 1, 76, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(305, 1, 77, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(306, 1, 77, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(307, 1, 77, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(308, 1, 77, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(309, 2, 1, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(310, 2, 1, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(311, 2, 1, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(312, 2, 1, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(313, 2, 2, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(314, 2, 2, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(315, 2, 2, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(316, 2, 2, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(317, 2, 3, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(318, 2, 3, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(319, 2, 3, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(320, 2, 3, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(321, 2, 4, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(322, 2, 4, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(323, 2, 4, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(324, 2, 4, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(325, 2, 5, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(326, 2, 5, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(327, 2, 5, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(328, 2, 5, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(329, 2, 6, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(330, 2, 6, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(331, 2, 6, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(332, 2, 6, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(333, 2, 7, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(334, 2, 7, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(335, 2, 7, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(336, 2, 7, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(337, 2, 8, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(338, 2, 8, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(339, 2, 8, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(340, 2, 8, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(341, 2, 9, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(342, 2, 9, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(343, 2, 9, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(344, 2, 9, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(345, 2, 10, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(346, 2, 10, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(347, 2, 10, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(348, 2, 10, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(349, 2, 11, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(350, 2, 11, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(351, 2, 11, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(352, 2, 11, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(353, 2, 12, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(354, 2, 12, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(355, 2, 12, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(356, 2, 12, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(357, 2, 13, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(358, 2, 13, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(359, 2, 13, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(360, 2, 13, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(361, 2, 14, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(362, 2, 14, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(363, 2, 14, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(364, 2, 14, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(365, 2, 15, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(366, 2, 15, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(367, 2, 15, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(368, 2, 15, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(369, 2, 16, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(370, 2, 16, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(371, 2, 16, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(372, 2, 16, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(373, 2, 17, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(374, 2, 17, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(375, 2, 17, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(376, 2, 17, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(377, 2, 18, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(378, 2, 18, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(379, 2, 18, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(380, 2, 18, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(381, 2, 19, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(382, 2, 19, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(383, 2, 19, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(384, 2, 19, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(385, 2, 20, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(386, 2, 20, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(387, 2, 20, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(388, 2, 20, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(389, 2, 21, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(390, 2, 21, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(391, 2, 21, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(392, 2, 21, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(393, 2, 22, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(394, 2, 22, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(395, 2, 22, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(396, 2, 22, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(397, 2, 23, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(398, 2, 23, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(399, 2, 23, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(400, 2, 23, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(401, 2, 24, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(402, 2, 24, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(403, 2, 24, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(404, 2, 24, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(405, 2, 25, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(406, 2, 25, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(407, 2, 25, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(408, 2, 25, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(409, 2, 26, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(410, 2, 26, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(411, 2, 26, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(412, 2, 26, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(413, 2, 27, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(414, 2, 27, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(415, 2, 27, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(416, 2, 27, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(417, 2, 28, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(418, 2, 28, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(419, 2, 28, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(420, 2, 28, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(421, 2, 29, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(422, 2, 29, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(423, 2, 29, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(424, 2, 29, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(425, 2, 30, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(426, 2, 30, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(427, 2, 30, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(428, 2, 30, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(429, 2, 31, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(430, 2, 31, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(431, 2, 31, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(432, 2, 31, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(433, 2, 32, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(434, 2, 32, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(435, 2, 32, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(436, 2, 32, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(437, 2, 33, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(438, 2, 33, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(439, 2, 33, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(440, 2, 33, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(441, 2, 34, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(442, 2, 34, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(443, 2, 34, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(444, 2, 34, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(445, 2, 35, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(446, 2, 35, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(447, 2, 35, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(448, 2, 35, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(449, 2, 36, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(450, 2, 36, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(451, 2, 36, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(452, 2, 36, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(453, 2, 37, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(454, 2, 37, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(455, 2, 37, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(456, 2, 37, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(457, 2, 38, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(458, 2, 38, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(459, 2, 38, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(460, 2, 38, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(461, 2, 39, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(462, 2, 39, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(463, 2, 39, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(464, 2, 39, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(465, 2, 40, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(466, 2, 40, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(467, 2, 40, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(468, 2, 40, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(469, 2, 41, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(470, 2, 41, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(471, 2, 41, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(472, 2, 41, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(473, 2, 42, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(474, 2, 42, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(475, 2, 42, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(476, 2, 42, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(477, 2, 43, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(478, 2, 43, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(479, 2, 43, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(480, 2, 43, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(481, 2, 44, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(482, 2, 44, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(483, 2, 44, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(484, 2, 44, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(485, 2, 45, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(486, 2, 45, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(487, 2, 45, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(488, 2, 45, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(489, 2, 46, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(490, 2, 46, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(491, 2, 46, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(492, 2, 46, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(493, 2, 47, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(494, 2, 47, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(495, 2, 47, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(496, 2, 47, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(497, 2, 48, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(498, 2, 48, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(499, 2, 48, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(500, 2, 48, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(501, 2, 49, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(502, 2, 49, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(503, 2, 49, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(504, 2, 49, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(505, 2, 50, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(506, 2, 50, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(507, 2, 50, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(508, 2, 50, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(509, 2, 51, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(510, 2, 51, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(511, 2, 51, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(512, 2, 51, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(513, 2, 52, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(514, 2, 52, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(515, 2, 52, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(516, 2, 52, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(517, 2, 53, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(518, 2, 53, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(519, 2, 53, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(520, 2, 53, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(521, 2, 54, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(522, 2, 54, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(523, 2, 54, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(524, 2, 54, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(525, 2, 55, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(526, 2, 55, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(527, 2, 55, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(528, 2, 55, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(529, 2, 56, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(530, 2, 56, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(531, 2, 56, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(532, 2, 56, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(533, 2, 57, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(534, 2, 57, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(535, 2, 57, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(536, 2, 57, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(537, 2, 58, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(538, 2, 58, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(539, 2, 58, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(540, 2, 58, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(541, 2, 59, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(542, 2, 59, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(543, 2, 59, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(544, 2, 59, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(545, 2, 60, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(546, 2, 60, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(547, 2, 60, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(548, 2, 60, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(549, 2, 61, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(550, 2, 61, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(551, 2, 61, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(552, 2, 61, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(553, 2, 62, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(554, 2, 62, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(555, 2, 62, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(556, 2, 62, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(557, 2, 63, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(558, 2, 63, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(559, 2, 63, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(560, 2, 63, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(561, 2, 64, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(562, 2, 64, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(563, 2, 64, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(564, 2, 64, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(565, 2, 65, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(566, 2, 65, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(567, 2, 65, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(568, 2, 65, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(569, 2, 66, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(570, 2, 66, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(571, 2, 66, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(572, 2, 66, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(573, 2, 67, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(574, 2, 67, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(575, 2, 67, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(576, 2, 67, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(577, 2, 68, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(578, 2, 68, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(579, 2, 68, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(580, 2, 68, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(581, 2, 69, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(582, 2, 69, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(583, 2, 69, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(584, 2, 69, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(585, 2, 70, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(586, 2, 70, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(587, 2, 70, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(588, 2, 70, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(589, 2, 71, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(590, 2, 71, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(591, 2, 71, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(592, 2, 71, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(593, 2, 72, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(594, 2, 72, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(595, 2, 72, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(596, 2, 72, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(597, 2, 73, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(598, 2, 73, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(599, 2, 73, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(600, 2, 73, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(601, 2, 74, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(602, 2, 74, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(603, 2, 74, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(604, 2, 74, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(605, 2, 75, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(606, 2, 75, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(607, 2, 75, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(608, 2, 75, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(609, 2, 76, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(610, 2, 76, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(611, 2, 76, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(612, 2, 76, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(613, 2, 77, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(614, 2, 77, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(615, 2, 77, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(616, 2, 77, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(617, 3, 1, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(618, 3, 1, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(619, 3, 1, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(620, 3, 1, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(621, 3, 2, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(622, 3, 2, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(623, 3, 2, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(624, 3, 2, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(625, 3, 3, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(626, 3, 3, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(627, 3, 3, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(628, 3, 3, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(629, 3, 4, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(630, 3, 4, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(631, 3, 4, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(632, 3, 4, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(633, 3, 5, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(634, 3, 5, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(635, 3, 5, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(636, 3, 5, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(637, 3, 6, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(638, 3, 6, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(639, 3, 6, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(640, 3, 6, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(641, 3, 7, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(642, 3, 7, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(643, 3, 7, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(644, 3, 7, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(645, 3, 8, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(646, 3, 8, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(647, 3, 8, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(648, 3, 8, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(649, 3, 9, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(650, 3, 9, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(651, 3, 9, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(652, 3, 9, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(653, 3, 10, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(654, 3, 10, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(655, 3, 10, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(656, 3, 10, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(657, 3, 11, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(658, 3, 11, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(659, 3, 11, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(660, 3, 11, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(661, 3, 12, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(662, 3, 12, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(663, 3, 12, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(664, 3, 12, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(665, 3, 13, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(666, 3, 13, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(667, 3, 13, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(668, 3, 13, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(669, 3, 14, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(670, 3, 14, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(671, 3, 14, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(672, 3, 14, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(673, 3, 15, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(674, 3, 15, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(675, 3, 15, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(676, 3, 15, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(677, 3, 16, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(678, 3, 16, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(679, 3, 16, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(680, 3, 16, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(681, 3, 17, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(682, 3, 17, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(683, 3, 17, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(684, 3, 17, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(685, 3, 18, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(686, 3, 18, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(687, 3, 18, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(688, 3, 18, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(689, 3, 19, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(690, 3, 19, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(691, 3, 19, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(692, 3, 19, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(693, 3, 20, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(694, 3, 20, 'UPDATE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(695, 3, 20, 'DELETE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(696, 3, 20, 'SHOW', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(697, 3, 21, 'SAVE', 1, '2024-06-26 23:39:54', '2024-06-26 23:39:54'),
(698, 3, 21, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(699, 3, 21, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(700, 3, 21, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(701, 3, 22, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(702, 3, 22, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(703, 3, 22, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(704, 3, 22, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(705, 3, 23, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(706, 3, 23, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(707, 3, 23, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(708, 3, 23, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(709, 3, 24, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(710, 3, 24, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(711, 3, 24, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(712, 3, 24, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(713, 3, 25, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(714, 3, 25, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(715, 3, 25, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55');
INSERT INTO `roles_and_permissions` (`id`, `user_type_id`, `role_id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(716, 3, 25, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(717, 3, 26, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(718, 3, 26, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(719, 3, 26, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(720, 3, 26, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(721, 3, 27, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(722, 3, 27, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(723, 3, 27, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(724, 3, 27, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(725, 3, 28, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(726, 3, 28, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(727, 3, 28, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(728, 3, 28, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(729, 3, 29, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(730, 3, 29, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(731, 3, 29, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(732, 3, 29, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(733, 3, 30, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(734, 3, 30, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(735, 3, 30, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(736, 3, 30, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(737, 3, 31, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(738, 3, 31, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(739, 3, 31, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(740, 3, 31, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(741, 3, 32, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(742, 3, 32, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(743, 3, 32, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(744, 3, 32, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(745, 3, 33, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(746, 3, 33, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(747, 3, 33, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(748, 3, 33, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(749, 3, 34, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(750, 3, 34, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(751, 3, 34, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(752, 3, 34, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(753, 3, 35, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(754, 3, 35, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(755, 3, 35, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(756, 3, 35, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(757, 3, 36, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(758, 3, 36, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(759, 3, 36, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(760, 3, 36, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(761, 3, 37, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(762, 3, 37, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(763, 3, 37, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(764, 3, 37, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(765, 3, 38, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(766, 3, 38, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(767, 3, 38, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(768, 3, 38, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(769, 3, 39, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(770, 3, 39, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(771, 3, 39, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(772, 3, 39, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(773, 3, 40, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(774, 3, 40, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(775, 3, 40, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(776, 3, 40, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(777, 3, 41, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(778, 3, 41, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(779, 3, 41, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(780, 3, 41, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(781, 3, 42, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(782, 3, 42, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(783, 3, 42, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(784, 3, 42, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(785, 3, 43, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(786, 3, 43, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(787, 3, 43, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(788, 3, 43, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(789, 3, 44, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(790, 3, 44, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(791, 3, 44, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(792, 3, 44, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(793, 3, 45, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(794, 3, 45, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(795, 3, 45, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(796, 3, 45, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(797, 3, 46, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(798, 3, 46, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(799, 3, 46, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(800, 3, 46, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(801, 3, 47, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(802, 3, 47, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(803, 3, 47, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(804, 3, 47, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(805, 3, 48, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(806, 3, 48, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(807, 3, 48, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(808, 3, 48, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(809, 3, 49, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(810, 3, 49, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(811, 3, 49, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(812, 3, 49, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(813, 3, 50, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(814, 3, 50, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(815, 3, 50, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(816, 3, 50, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(817, 3, 51, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(818, 3, 51, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(819, 3, 51, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(820, 3, 51, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(821, 3, 52, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(822, 3, 52, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(823, 3, 52, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(824, 3, 52, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(825, 3, 53, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(826, 3, 53, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(827, 3, 53, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(828, 3, 53, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(829, 3, 54, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(830, 3, 54, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(831, 3, 54, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(832, 3, 54, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(833, 3, 55, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(834, 3, 55, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(835, 3, 55, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(836, 3, 55, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(837, 3, 56, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(838, 3, 56, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(839, 3, 56, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(840, 3, 56, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(841, 3, 57, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(842, 3, 57, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(843, 3, 57, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(844, 3, 57, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(845, 3, 58, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(846, 3, 58, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(847, 3, 58, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(848, 3, 58, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(849, 3, 59, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(850, 3, 59, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(851, 3, 59, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(852, 3, 59, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(853, 3, 60, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(854, 3, 60, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(855, 3, 60, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(856, 3, 60, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(857, 3, 61, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(858, 3, 61, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(859, 3, 61, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(860, 3, 61, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(861, 3, 62, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(862, 3, 62, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(863, 3, 62, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(864, 3, 62, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(865, 3, 63, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(866, 3, 63, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(867, 3, 63, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(868, 3, 63, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(869, 3, 64, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(870, 3, 64, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(871, 3, 64, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(872, 3, 64, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(873, 3, 65, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(874, 3, 65, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(875, 3, 65, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(876, 3, 65, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(877, 3, 66, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(878, 3, 66, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(879, 3, 66, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(880, 3, 66, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(881, 3, 67, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(882, 3, 67, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(883, 3, 67, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(884, 3, 67, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(885, 3, 68, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(886, 3, 68, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(887, 3, 68, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(888, 3, 68, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(889, 3, 69, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(890, 3, 69, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(891, 3, 69, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(892, 3, 69, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(893, 3, 70, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(894, 3, 70, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(895, 3, 70, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(896, 3, 70, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(897, 3, 71, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(898, 3, 71, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(899, 3, 71, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(900, 3, 71, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(901, 3, 72, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(902, 3, 72, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(903, 3, 72, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(904, 3, 72, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(905, 3, 73, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(906, 3, 73, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(907, 3, 73, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(908, 3, 73, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(909, 3, 74, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(910, 3, 74, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(911, 3, 74, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(912, 3, 74, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(913, 3, 75, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(914, 3, 75, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(915, 3, 75, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(916, 3, 75, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(917, 3, 76, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(918, 3, 76, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(919, 3, 76, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(920, 3, 76, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(921, 3, 77, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(922, 3, 77, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(923, 3, 77, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(924, 3, 77, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(925, 4, 1, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(926, 4, 1, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(927, 4, 1, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(928, 4, 1, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(929, 4, 2, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(930, 4, 2, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(931, 4, 2, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(932, 4, 2, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(933, 4, 3, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(934, 4, 3, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(935, 4, 3, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(936, 4, 3, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(937, 4, 4, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(938, 4, 4, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(939, 4, 4, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(940, 4, 4, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(941, 4, 5, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(942, 4, 5, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(943, 4, 5, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(944, 4, 5, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(945, 4, 6, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(946, 4, 6, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(947, 4, 6, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(948, 4, 6, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(949, 4, 7, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(950, 4, 7, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(951, 4, 7, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(952, 4, 7, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(953, 4, 8, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(954, 4, 8, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(955, 4, 8, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(956, 4, 8, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(957, 4, 9, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(958, 4, 9, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(959, 4, 9, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(960, 4, 9, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(961, 4, 10, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(962, 4, 10, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(963, 4, 10, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(964, 4, 10, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(965, 4, 11, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(966, 4, 11, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(967, 4, 11, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(968, 4, 11, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(969, 4, 12, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(970, 4, 12, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(971, 4, 12, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(972, 4, 12, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(973, 4, 13, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(974, 4, 13, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(975, 4, 13, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(976, 4, 13, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(977, 4, 14, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(978, 4, 14, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(979, 4, 14, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(980, 4, 14, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(981, 4, 15, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(982, 4, 15, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(983, 4, 15, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(984, 4, 15, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(985, 4, 16, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(986, 4, 16, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(987, 4, 16, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(988, 4, 16, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(989, 4, 17, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(990, 4, 17, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(991, 4, 17, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(992, 4, 17, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(993, 4, 18, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(994, 4, 18, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(995, 4, 18, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(996, 4, 18, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(997, 4, 19, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(998, 4, 19, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(999, 4, 19, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1000, 4, 19, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1001, 4, 20, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1002, 4, 20, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1003, 4, 20, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1004, 4, 20, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1005, 4, 21, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1006, 4, 21, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1007, 4, 21, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1008, 4, 21, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1009, 4, 22, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1010, 4, 22, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1011, 4, 22, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1012, 4, 22, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1013, 4, 23, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1014, 4, 23, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1015, 4, 23, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1016, 4, 23, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1017, 4, 24, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1018, 4, 24, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1019, 4, 24, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1020, 4, 24, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1021, 4, 25, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1022, 4, 25, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1023, 4, 25, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1024, 4, 25, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1025, 4, 26, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1026, 4, 26, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1027, 4, 26, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1028, 4, 26, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1029, 4, 27, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1030, 4, 27, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1031, 4, 27, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1032, 4, 27, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1033, 4, 28, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1034, 4, 28, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1035, 4, 28, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1036, 4, 28, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1037, 4, 29, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1038, 4, 29, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1039, 4, 29, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1040, 4, 29, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1041, 4, 30, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1042, 4, 30, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1043, 4, 30, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1044, 4, 30, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1045, 4, 31, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1046, 4, 31, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1047, 4, 31, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1048, 4, 31, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1049, 4, 32, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1050, 4, 32, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1051, 4, 32, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1052, 4, 32, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1053, 4, 33, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1054, 4, 33, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1055, 4, 33, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1056, 4, 33, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1057, 4, 34, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1058, 4, 34, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1059, 4, 34, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1060, 4, 34, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1061, 4, 35, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1062, 4, 35, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1063, 4, 35, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1064, 4, 35, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1065, 4, 36, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1066, 4, 36, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1067, 4, 36, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1068, 4, 36, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1069, 4, 37, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1070, 4, 37, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1071, 4, 37, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1072, 4, 37, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1073, 4, 38, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1074, 4, 38, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1075, 4, 38, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1076, 4, 38, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1077, 4, 39, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1078, 4, 39, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1079, 4, 39, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1080, 4, 39, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1081, 4, 40, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1082, 4, 40, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1083, 4, 40, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1084, 4, 40, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1085, 4, 41, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1086, 4, 41, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1087, 4, 41, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1088, 4, 41, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1089, 4, 42, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1090, 4, 42, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1091, 4, 42, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1092, 4, 42, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1093, 4, 43, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1094, 4, 43, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1095, 4, 43, 'DELETE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1096, 4, 43, 'SHOW', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1097, 4, 44, 'SAVE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1098, 4, 44, 'UPDATE', 1, '2024-06-26 23:39:55', '2024-06-26 23:39:55'),
(1099, 4, 44, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1100, 4, 44, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1101, 4, 45, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1102, 4, 45, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1103, 4, 45, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1104, 4, 45, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1105, 4, 46, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1106, 4, 46, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1107, 4, 46, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1108, 4, 46, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1109, 4, 47, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1110, 4, 47, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1111, 4, 47, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1112, 4, 47, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1113, 4, 48, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1114, 4, 48, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1115, 4, 48, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1116, 4, 48, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1117, 4, 49, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1118, 4, 49, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1119, 4, 49, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1120, 4, 49, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1121, 4, 50, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1122, 4, 50, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1123, 4, 50, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1124, 4, 50, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1125, 4, 51, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1126, 4, 51, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1127, 4, 51, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1128, 4, 51, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1129, 4, 52, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1130, 4, 52, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1131, 4, 52, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1132, 4, 52, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1133, 4, 53, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1134, 4, 53, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1135, 4, 53, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1136, 4, 53, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1137, 4, 54, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1138, 4, 54, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1139, 4, 54, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1140, 4, 54, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1141, 4, 55, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1142, 4, 55, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1143, 4, 55, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1144, 4, 55, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1145, 4, 56, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1146, 4, 56, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1147, 4, 56, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1148, 4, 56, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1149, 4, 57, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1150, 4, 57, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1151, 4, 57, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1152, 4, 57, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1153, 4, 58, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1154, 4, 58, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1155, 4, 58, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1156, 4, 58, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1157, 4, 59, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1158, 4, 59, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1159, 4, 59, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1160, 4, 59, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1161, 4, 60, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1162, 4, 60, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1163, 4, 60, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1164, 4, 60, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1165, 4, 61, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1166, 4, 61, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1167, 4, 61, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1168, 4, 61, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1169, 4, 62, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1170, 4, 62, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1171, 4, 62, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1172, 4, 62, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1173, 4, 63, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1174, 4, 63, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1175, 4, 63, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1176, 4, 63, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1177, 4, 64, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1178, 4, 64, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1179, 4, 64, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1180, 4, 64, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1181, 4, 65, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1182, 4, 65, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1183, 4, 65, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1184, 4, 65, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1185, 4, 66, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1186, 4, 66, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1187, 4, 66, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1188, 4, 66, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1189, 4, 67, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1190, 4, 67, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1191, 4, 67, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1192, 4, 67, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1193, 4, 68, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1194, 4, 68, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1195, 4, 68, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1196, 4, 68, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1197, 4, 69, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1198, 4, 69, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1199, 4, 69, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1200, 4, 69, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1201, 4, 70, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1202, 4, 70, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1203, 4, 70, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1204, 4, 70, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1205, 4, 71, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1206, 4, 71, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1207, 4, 71, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1208, 4, 71, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1209, 4, 72, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1210, 4, 72, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1211, 4, 72, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1212, 4, 72, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1213, 4, 73, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1214, 4, 73, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1215, 4, 73, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1216, 4, 73, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1217, 4, 74, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1218, 4, 74, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1219, 4, 74, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1220, 4, 74, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1221, 4, 75, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1222, 4, 75, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1223, 4, 75, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1224, 4, 75, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1225, 4, 76, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1226, 4, 76, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1227, 4, 76, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1228, 4, 76, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1229, 4, 77, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1230, 4, 77, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1231, 4, 77, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1232, 4, 77, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1233, 5, 1, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1234, 5, 1, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1235, 5, 1, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1236, 5, 1, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1237, 5, 2, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1238, 5, 2, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1239, 5, 2, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1240, 5, 2, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1241, 5, 3, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1242, 5, 3, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1243, 5, 3, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1244, 5, 3, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1245, 5, 4, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1246, 5, 4, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1247, 5, 4, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1248, 5, 4, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1249, 5, 5, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1250, 5, 5, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1251, 5, 5, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1252, 5, 5, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1253, 5, 6, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1254, 5, 6, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1255, 5, 6, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1256, 5, 6, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1257, 5, 7, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1258, 5, 7, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1259, 5, 7, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1260, 5, 7, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1261, 5, 8, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1262, 5, 8, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1263, 5, 8, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1264, 5, 8, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1265, 5, 9, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1266, 5, 9, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1267, 5, 9, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1268, 5, 9, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1269, 5, 10, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1270, 5, 10, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1271, 5, 10, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1272, 5, 10, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1273, 5, 11, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1274, 5, 11, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1275, 5, 11, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1276, 5, 11, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1277, 5, 12, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1278, 5, 12, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1279, 5, 12, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1280, 5, 12, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1281, 5, 13, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1282, 5, 13, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1283, 5, 13, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1284, 5, 13, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1285, 5, 14, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1286, 5, 14, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1287, 5, 14, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1288, 5, 14, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1289, 5, 15, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1290, 5, 15, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1291, 5, 15, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1292, 5, 15, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1293, 5, 16, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1294, 5, 16, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1295, 5, 16, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1296, 5, 16, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1297, 5, 17, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1298, 5, 17, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1299, 5, 17, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1300, 5, 17, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1301, 5, 18, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1302, 5, 18, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1303, 5, 18, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1304, 5, 18, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1305, 5, 19, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1306, 5, 19, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1307, 5, 19, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1308, 5, 19, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1309, 5, 20, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1310, 5, 20, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1311, 5, 20, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1312, 5, 20, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1313, 5, 21, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1314, 5, 21, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1315, 5, 21, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1316, 5, 21, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1317, 5, 22, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1318, 5, 22, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1319, 5, 22, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1320, 5, 22, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1321, 5, 23, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1322, 5, 23, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1323, 5, 23, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1324, 5, 23, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1325, 5, 24, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1326, 5, 24, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1327, 5, 24, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1328, 5, 24, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1329, 5, 25, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1330, 5, 25, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1331, 5, 25, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1332, 5, 25, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1333, 5, 26, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1334, 5, 26, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1335, 5, 26, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1336, 5, 26, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1337, 5, 27, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1338, 5, 27, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1339, 5, 27, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1340, 5, 27, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1341, 5, 28, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1342, 5, 28, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1343, 5, 28, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1344, 5, 28, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1345, 5, 29, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1346, 5, 29, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1347, 5, 29, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1348, 5, 29, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1349, 5, 30, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1350, 5, 30, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1351, 5, 30, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1352, 5, 30, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1353, 5, 31, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1354, 5, 31, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1355, 5, 31, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1356, 5, 31, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1357, 5, 32, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1358, 5, 32, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1359, 5, 32, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1360, 5, 32, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1361, 5, 33, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1362, 5, 33, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1363, 5, 33, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1364, 5, 33, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1365, 5, 34, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1366, 5, 34, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1367, 5, 34, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1368, 5, 34, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1369, 5, 35, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1370, 5, 35, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1371, 5, 35, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1372, 5, 35, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1373, 5, 36, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1374, 5, 36, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1375, 5, 36, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1376, 5, 36, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1377, 5, 37, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1378, 5, 37, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1379, 5, 37, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1380, 5, 37, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1381, 5, 38, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1382, 5, 38, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1383, 5, 38, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1384, 5, 38, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1385, 5, 39, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1386, 5, 39, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1387, 5, 39, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1388, 5, 39, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1389, 5, 40, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1390, 5, 40, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1391, 5, 40, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1392, 5, 40, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1393, 5, 41, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1394, 5, 41, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1395, 5, 41, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1396, 5, 41, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1397, 5, 42, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1398, 5, 42, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1399, 5, 42, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1400, 5, 42, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1401, 5, 43, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1402, 5, 43, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1403, 5, 43, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1404, 5, 43, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1405, 5, 44, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1406, 5, 44, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1407, 5, 44, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1408, 5, 44, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1409, 5, 45, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1410, 5, 45, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1411, 5, 45, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1412, 5, 45, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1413, 5, 46, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1414, 5, 46, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1415, 5, 46, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1416, 5, 46, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1417, 5, 47, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1418, 5, 47, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1419, 5, 47, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1420, 5, 47, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1421, 5, 48, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1422, 5, 48, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56');
INSERT INTO `roles_and_permissions` (`id`, `user_type_id`, `role_id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1423, 5, 48, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1424, 5, 48, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1425, 5, 49, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1426, 5, 49, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1427, 5, 49, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1428, 5, 49, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1429, 5, 50, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1430, 5, 50, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1431, 5, 50, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1432, 5, 50, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1433, 5, 51, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1434, 5, 51, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1435, 5, 51, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1436, 5, 51, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1437, 5, 52, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1438, 5, 52, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1439, 5, 52, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1440, 5, 52, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1441, 5, 53, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1442, 5, 53, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1443, 5, 53, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1444, 5, 53, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1445, 5, 54, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1446, 5, 54, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1447, 5, 54, 'DELETE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1448, 5, 54, 'SHOW', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1449, 5, 55, 'SAVE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1450, 5, 55, 'UPDATE', 1, '2024-06-26 23:39:56', '2024-06-26 23:39:56'),
(1451, 5, 55, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1452, 5, 55, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1453, 5, 56, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1454, 5, 56, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1455, 5, 56, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1456, 5, 56, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1457, 5, 57, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1458, 5, 57, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1459, 5, 57, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1460, 5, 57, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1461, 5, 58, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1462, 5, 58, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1463, 5, 58, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1464, 5, 58, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1465, 5, 59, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1466, 5, 59, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1467, 5, 59, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1468, 5, 59, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1469, 5, 60, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1470, 5, 60, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1471, 5, 60, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1472, 5, 60, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1473, 5, 61, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1474, 5, 61, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1475, 5, 61, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1476, 5, 61, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1477, 5, 62, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1478, 5, 62, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1479, 5, 62, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1480, 5, 62, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1481, 5, 63, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1482, 5, 63, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1483, 5, 63, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1484, 5, 63, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1485, 5, 64, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1486, 5, 64, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1487, 5, 64, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1488, 5, 64, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1489, 5, 65, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1490, 5, 65, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1491, 5, 65, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1492, 5, 65, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1493, 5, 66, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1494, 5, 66, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1495, 5, 66, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1496, 5, 66, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1497, 5, 67, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1498, 5, 67, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1499, 5, 67, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1500, 5, 67, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1501, 5, 68, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1502, 5, 68, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1503, 5, 68, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1504, 5, 68, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1505, 5, 69, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1506, 5, 69, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1507, 5, 69, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1508, 5, 69, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1509, 5, 70, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1510, 5, 70, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1511, 5, 70, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1512, 5, 70, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1513, 5, 71, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1514, 5, 71, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1515, 5, 71, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1516, 5, 71, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1517, 5, 72, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1518, 5, 72, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1519, 5, 72, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1520, 5, 72, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1521, 5, 73, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1522, 5, 73, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1523, 5, 73, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1524, 5, 73, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1525, 5, 74, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1526, 5, 74, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1527, 5, 74, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1528, 5, 74, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1529, 5, 75, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1530, 5, 75, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1531, 5, 75, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1532, 5, 75, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1533, 5, 76, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1534, 5, 76, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1535, 5, 76, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1536, 5, 76, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1537, 5, 77, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1538, 5, 77, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1539, 5, 77, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1540, 5, 77, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1541, 6, 1, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1542, 6, 1, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1543, 6, 1, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1544, 6, 1, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1545, 6, 2, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1546, 6, 2, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1547, 6, 2, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1548, 6, 2, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1549, 6, 3, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1550, 6, 3, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1551, 6, 3, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1552, 6, 3, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1553, 6, 4, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1554, 6, 4, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1555, 6, 4, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1556, 6, 4, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1557, 6, 5, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1558, 6, 5, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1559, 6, 5, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1560, 6, 5, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1561, 6, 6, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1562, 6, 6, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1563, 6, 6, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1564, 6, 6, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1565, 6, 7, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1566, 6, 7, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1567, 6, 7, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1568, 6, 7, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1569, 6, 8, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1570, 6, 8, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1571, 6, 8, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1572, 6, 8, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1573, 6, 9, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1574, 6, 9, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1575, 6, 9, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1576, 6, 9, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1577, 6, 10, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1578, 6, 10, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1579, 6, 10, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1580, 6, 10, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1581, 6, 11, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1582, 6, 11, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1583, 6, 11, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1584, 6, 11, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1585, 6, 12, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1586, 6, 12, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1587, 6, 12, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1588, 6, 12, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1589, 6, 13, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1590, 6, 13, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1591, 6, 13, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1592, 6, 13, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1593, 6, 14, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1594, 6, 14, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1595, 6, 14, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1596, 6, 14, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1597, 6, 15, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1598, 6, 15, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1599, 6, 15, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1600, 6, 15, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1601, 6, 16, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1602, 6, 16, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1603, 6, 16, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1604, 6, 16, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1605, 6, 17, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1606, 6, 17, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1607, 6, 17, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1608, 6, 17, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1609, 6, 18, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1610, 6, 18, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1611, 6, 18, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1612, 6, 18, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1613, 6, 19, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1614, 6, 19, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1615, 6, 19, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1616, 6, 19, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1617, 6, 20, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1618, 6, 20, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1619, 6, 20, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1620, 6, 20, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1621, 6, 21, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1622, 6, 21, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1623, 6, 21, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1624, 6, 21, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1625, 6, 22, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1626, 6, 22, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1627, 6, 22, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1628, 6, 22, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1629, 6, 23, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1630, 6, 23, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1631, 6, 23, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1632, 6, 23, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1633, 6, 24, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1634, 6, 24, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1635, 6, 24, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1636, 6, 24, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1637, 6, 25, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1638, 6, 25, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1639, 6, 25, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1640, 6, 25, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1641, 6, 26, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1642, 6, 26, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1643, 6, 26, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1644, 6, 26, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1645, 6, 27, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1646, 6, 27, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1647, 6, 27, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1648, 6, 27, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1649, 6, 28, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1650, 6, 28, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1651, 6, 28, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1652, 6, 28, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1653, 6, 29, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1654, 6, 29, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1655, 6, 29, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1656, 6, 29, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1657, 6, 30, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1658, 6, 30, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1659, 6, 30, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1660, 6, 30, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1661, 6, 31, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1662, 6, 31, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1663, 6, 31, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1664, 6, 31, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1665, 6, 32, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1666, 6, 32, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1667, 6, 32, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1668, 6, 32, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1669, 6, 33, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1670, 6, 33, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1671, 6, 33, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1672, 6, 33, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1673, 6, 34, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1674, 6, 34, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1675, 6, 34, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1676, 6, 34, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1677, 6, 35, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1678, 6, 35, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1679, 6, 35, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1680, 6, 35, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1681, 6, 36, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1682, 6, 36, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1683, 6, 36, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1684, 6, 36, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1685, 6, 37, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1686, 6, 37, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1687, 6, 37, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1688, 6, 37, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1689, 6, 38, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1690, 6, 38, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1691, 6, 38, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1692, 6, 38, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1693, 6, 39, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1694, 6, 39, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1695, 6, 39, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1696, 6, 39, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1697, 6, 40, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1698, 6, 40, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1699, 6, 40, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1700, 6, 40, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1701, 6, 41, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1702, 6, 41, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1703, 6, 41, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1704, 6, 41, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1705, 6, 42, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1706, 6, 42, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1707, 6, 42, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1708, 6, 42, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1709, 6, 43, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1710, 6, 43, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1711, 6, 43, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1712, 6, 43, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1713, 6, 44, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1714, 6, 44, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1715, 6, 44, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1716, 6, 44, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1717, 6, 45, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1718, 6, 45, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1719, 6, 45, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1720, 6, 45, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1721, 6, 46, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1722, 6, 46, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1723, 6, 46, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1724, 6, 46, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1725, 6, 47, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1726, 6, 47, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1727, 6, 47, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1728, 6, 47, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1729, 6, 48, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1730, 6, 48, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1731, 6, 48, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1732, 6, 48, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1733, 6, 49, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1734, 6, 49, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1735, 6, 49, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1736, 6, 49, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1737, 6, 50, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1738, 6, 50, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1739, 6, 50, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1740, 6, 50, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1741, 6, 51, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1742, 6, 51, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1743, 6, 51, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1744, 6, 51, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1745, 6, 52, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1746, 6, 52, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1747, 6, 52, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1748, 6, 52, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1749, 6, 53, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1750, 6, 53, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1751, 6, 53, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1752, 6, 53, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1753, 6, 54, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1754, 6, 54, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1755, 6, 54, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1756, 6, 54, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1757, 6, 55, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1758, 6, 55, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1759, 6, 55, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1760, 6, 55, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1761, 6, 56, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1762, 6, 56, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1763, 6, 56, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1764, 6, 56, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1765, 6, 57, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1766, 6, 57, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1767, 6, 57, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1768, 6, 57, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1769, 6, 58, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1770, 6, 58, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1771, 6, 58, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1772, 6, 58, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1773, 6, 59, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1774, 6, 59, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1775, 6, 59, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1776, 6, 59, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1777, 6, 60, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1778, 6, 60, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1779, 6, 60, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1780, 6, 60, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1781, 6, 61, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1782, 6, 61, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1783, 6, 61, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1784, 6, 61, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1785, 6, 62, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1786, 6, 62, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1787, 6, 62, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1788, 6, 62, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1789, 6, 63, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1790, 6, 63, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1791, 6, 63, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1792, 6, 63, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1793, 6, 64, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1794, 6, 64, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1795, 6, 64, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1796, 6, 64, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1797, 6, 65, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1798, 6, 65, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1799, 6, 65, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1800, 6, 65, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1801, 6, 66, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1802, 6, 66, 'UPDATE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1803, 6, 66, 'DELETE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1804, 6, 66, 'SHOW', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1805, 6, 67, 'SAVE', 1, '2024-06-26 23:39:57', '2024-06-26 23:39:57'),
(1806, 6, 67, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1807, 6, 67, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1808, 6, 67, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1809, 6, 68, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1810, 6, 68, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1811, 6, 68, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1812, 6, 68, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1813, 6, 69, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1814, 6, 69, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1815, 6, 69, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1816, 6, 69, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1817, 6, 70, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1818, 6, 70, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1819, 6, 70, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1820, 6, 70, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1821, 6, 71, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1822, 6, 71, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1823, 6, 71, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1824, 6, 71, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1825, 6, 72, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1826, 6, 72, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1827, 6, 72, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1828, 6, 72, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1829, 6, 73, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1830, 6, 73, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1831, 6, 73, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1832, 6, 73, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1833, 6, 74, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1834, 6, 74, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1835, 6, 74, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1836, 6, 74, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1837, 6, 75, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1838, 6, 75, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1839, 6, 75, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1840, 6, 75, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1841, 6, 76, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1842, 6, 76, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1843, 6, 76, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1844, 6, 76, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1845, 6, 77, 'SAVE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1846, 6, 77, 'UPDATE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1847, 6, 77, 'DELETE', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58'),
(1848, 6, 77, 'SHOW', 1, '2024-06-26 23:39:58', '2024-06-26 23:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `fare` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sem 1', NULL, NULL),
(2, 'Sem 2', NULL, NULL),
(3, 'Sem 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester_timetables`
--

CREATE TABLE `semester_timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `week_id` bigint(20) UNSIGNED NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop_faculties`
--

CREATE TABLE `seminar_workshop_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `title_of_seminar` varchar(255) DEFAULT NULL,
  `type_of_seminar` varchar(255) DEFAULT NULL,
  `organized_by` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `achievement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `franchise_id`, `created_at`, `updated_at`) VALUES
(1, '2021-2022', 1, NULL, NULL),
(2, '2023-2024', 1, NULL, NULL),
(3, '2024-2025', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_project_consultancies`
--

CREATE TABLE `sponsored_project_consultancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendances`
--

CREATE TABLE `staff_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_education`
--

CREATE TABLE `staff_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `university_name` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_experiences`
--

CREATE TABLE `staff_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `experience_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `current_semester_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `admission_date` date DEFAULT NULL,
  `emergency_phone_number` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `father_income_proof` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_income_proof` varchar(255) DEFAULT NULL,
  `registration_proof` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_phone` varchar(255) DEFAULT NULL,
  `material_status` varchar(255) DEFAULT NULL,
  `guardian_email` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `admission_status` int(11) NOT NULL DEFAULT 1,
  `pre_admission_payment_id` int(11) DEFAULT NULL,
  `caution_money_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_education`
--

CREATE TABLE `student_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_code`, `created_at`, `updated_at`) VALUES
(1, 'subject 1', 'S1', NULL, NULL),
(2, 'subject 2', 'S2', NULL, NULL),
(3, 'subject 3', 'S3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `exam_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `publish_date` date NOT NULL,
  `full_marks` int(11) NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_groups`
--

CREATE TABLE `subject_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university_synopses`
--

CREATE TABLE `university_synopses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `referance_no` varchar(255) NOT NULL,
  `ref_date` varchar(255) NOT NULL,
  `date_evaluation` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_no` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `dob_proof` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `aadhaar_card_proof` varchar(255) DEFAULT NULL,
  `admission_slip` varchar(30) DEFAULT NULL,
  `blood_group_proof` varchar(30) DEFAULT NULL,
  `commission_flat` varchar(30) DEFAULT NULL,
  `commission_percentage` varchar(30) DEFAULT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `franchise_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identification_no`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `dob_proof`, `blood_group`, `category_id`, `religion`, `mobile_no`, `image`, `aadhaar_card_proof`, `admission_slip`, `blood_group_proof`, `commission_flat`, `commission_percentage`, `user_type_id`, `franchise_id`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '51obtg937v', 'Brock', NULL, 'Pouros', 'male', '1975-04-27', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'domenic.tillman@example.org', '2024-06-26 23:38:51', '$2y$12$KpxySaHdnVpoqoy7WsKcieiXhdntAje2LcG37Ebc0okcPLwZCx6jO', 1, 'dQBMOC7uMg', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(2, 'y11y5gvcj7', 'Emmanuelle', NULL, 'Shanahan', 'female', '1975-08-05', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'walsh.elisha@example.com', '2024-06-26 23:38:51', '$2y$12$SpieM4dRQeg6DYv171Cb1e.fwm0vof/H7mWOpq1uf4FqKZ271xnNK', 1, 'NgEaLaGkyN', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(3, 'df91zzgjj3', 'Elias', NULL, 'Hoppe', 'male', '1990-07-10', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'laurel75@example.org', '2024-06-26 23:38:52', '$2y$12$5Wa0HMtUMRBQV50kvinl5euwPNEKZBgQ/3yN3SMfXcoSMZYtlr5Ga', 1, 'TmJ5HxjB2Y', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(4, 'hzdtcnx2ga', 'Carmen', NULL, 'Kling', 'male', '2010-05-04', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'hyatt.maximo@example.org', '2024-06-26 23:38:52', '$2y$12$vKyO3oT6B3G/6mdJyTvv..xBmVsKV0aA1gGOnlIiV4jHdUm9yzoc2', 1, 'XrI5Xt9b6Y', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(5, 'm0jlj015u3', 'Ardella', NULL, 'Mills', 'male', '1974-10-06', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'genoveva.cassin@example.net', '2024-06-26 23:38:52', '$2y$12$o2lK5oesA6WrERuEQ2MuxuQyr8RcY5nebop3nRRA7UH0UrDyb.O5S', 1, 'PdQ5Sk572R', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(6, 'abnq642198', 'Flossie', NULL, 'Runolfsson', 'female', '2017-03-27', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'dorothy66@example.org', '2024-06-26 23:38:52', '$2y$12$vAfKs2/C4u6F.czK6vTTI.PMhd3aGdFSkC8SKGPXME79W9ltRzuwe', 1, '30Ie6lWQDM', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(7, 'k2szswnkmc', 'Betsy', NULL, 'Schaden', 'female', '1988-03-27', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'frederic.vonrueden@example.net', '2024-06-26 23:38:53', '$2y$12$/pqto.KqX7uUdLLl6L2HuuiTZ6.KCQYVBtbVXX7lqA1SN00UTi.ji', 1, 'd4FGdEfurA', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(8, 'k06lnlr0sy', 'Lue', NULL, 'Wunsch', 'female', '1998-01-02', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'ubergstrom@example.com', '2024-06-26 23:38:53', '$2y$12$8JnOV3a4Loi/z1373Tcd6.thqQHUya9oPWN0ChTmM/0SliEmdCm.e', 1, '0Y8HIaKZz2', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(9, '4f5bc3tcl0', 'Bonita', NULL, 'Gutmann', 'female', '2011-01-23', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'eliseo77@example.net', '2024-06-26 23:38:53', '$2y$12$GCOnV6cZ5jtWuPAVDMGMWOUQMG71QkSsEZ6rTY3RMT9KivzcHh1Iq', 1, 'fJSbCY8cRx', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(10, 'euxh3edhbm', 'Leda', NULL, 'O\'Kon', 'male', '1988-05-17', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'white.antoinette@example.org', '2024-06-26 23:38:53', '$2y$12$G3mYgObnZ7.ONuvq/9jVuedi4/NyqXI94OlDNGc4M26nWcAXgxW2O', 1, 'IXwWVjqeJ7', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(11, 'p32bw67ge1', 'Amalia', NULL, 'Will', 'male', '1978-02-07', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'rabbott@example.net', '2024-06-26 23:38:54', '$2y$12$5xHNMtmCYw6I6HFZE9pyEee4XtWTkGavDb.Wh3pqR0AxitERfG76e', 1, '9hPVgHMfiJ', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(12, '1jenbk77sd', 'Hans', NULL, 'Davis', 'male', '1999-05-19', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'walsh.polly@example.com', '2024-06-26 23:38:54', '$2y$12$mBakeJ9jC8.E5dQL1PsIPOrybqgt1zPW9aHi.oF1EpbLxXTXTMMVi', 1, 'neW9zGDf0E', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(13, 'cljw1smnyz', 'Clement', NULL, 'Gutmann', 'female', '1981-08-16', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'murphy.flo@example.com', '2024-06-26 23:38:54', '$2y$12$IeDJ74pZhmaQoJbArfkxoO4.LnzCOboWAXa9/zK0oAAoJJeUQiWBO', 1, 'yeOgaUYQ13', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(14, 'mkdnkqjbna', 'Joaquin', NULL, 'Shields', 'male', '2010-04-03', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'greilly@example.org', '2024-06-26 23:38:54', '$2y$12$JVJEhg8VoQRVPhZ/WVHaBOtbOMTomhP2ieWYcA01oawCKhhHeUxpO', 1, 'KSqd5jAMtq', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(15, 'feaikkyj20', 'Sister', NULL, 'Kertzmann', 'male', '1994-03-13', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'renee72@example.org', '2024-06-26 23:38:55', '$2y$12$KPXpH6q41VVh9x6re6QbB.GV0NGzlrMqlcrBvbaxwqN1JzUVI4lzW', 1, '9YtF1t1Y7O', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(16, 'wd8xlmtmep', 'Jacinto', NULL, 'Cruickshank', 'female', '2018-02-05', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'pdenesik@example.org', '2024-06-26 23:38:55', '$2y$12$D0my4js.PJ.epi2X4/wxqe3pHQdmquxwffFjlWjCJohwoGPysKzDy', 1, 'etKRZNyiRD', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(17, 'rurlbp3emh', 'Jalon', NULL, 'Kohler', 'male', '2006-07-29', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'mercedes.barrows@example.net', '2024-06-26 23:38:55', '$2y$12$BE9LLhJaHUOf8NSsXjWO/.VTXEkkGSfsfq8LJIX6yo3r0UtwBQzK2', 1, 'bKj7WL3KNR', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(18, 'qrn3ymz4ar', 'Otilia', NULL, 'Baumbach', 'female', '2017-06-18', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'lloyd86@example.com', '2024-06-26 23:38:55', '$2y$12$1zyQBvZjwESijm6IK6PHYeO8lnJpfRnnQSDN6rHcqf7ZsWVnuSW3i', 1, 'ZM7aIjOmFO', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(19, 'sh8457xcgc', 'Adan', NULL, 'Hodkiewicz', 'female', '1981-08-26', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'marvin.holly@example.com', '2024-06-26 23:38:56', '$2y$12$M85l/8/y/cBpMMK4ZYXBDOutOGRkvwk3TPgZEj7U1gG.BYg.o0YXC', 1, 'ubdByYh5VS', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(20, 's1tjpc3ycs', 'Darren', NULL, 'Green', 'male', '2003-05-14', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'zwiegand@example.org', '2024-06-26 23:38:56', '$2y$12$e20YMIpSaL5P9hIMWhnTEuRK1UpfvhZUTpw4WUDM6acZfXlnUr9aO', 1, 'A6Z2nWYuSg', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(21, 'jk3p6c9u95', 'Tierra', NULL, 'Wunsch', 'male', '1997-11-03', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'nellie71@example.org', '2024-06-26 23:38:56', '$2y$12$vu9Aj0dtqTB/N.g0FtyjguR1iCj29bNpn1illI9jgg4f.plS67yC.', 1, '6zVsI8xtRd', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(22, 'aqwl1i9133', 'Gina', NULL, 'Zulauf', 'female', '2008-08-13', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'lakin.jules@example.org', '2024-06-26 23:38:56', '$2y$12$RyOWIeO9i2v5BXO1kXn8DOqoE11JcxKWSrPCB5JJo4l6BYaetCNB2', 1, 'ZZEmN4ZKMb', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(23, 'ego5g65j5c', 'Enid', NULL, 'Olson', 'male', '1998-05-26', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'kihn.rashad@example.net', '2024-06-26 23:38:57', '$2y$12$DUcgksTbA6VzcLghbfBAQeifkHJNiPbPobyQF1wSQiepcXeBLfcvW', 1, 'gta3RV3FAC', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(24, 'mhzz3z2f0q', 'Rosemary', NULL, 'Sauer', 'male', '1996-12-28', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'gustave.nienow@example.com', '2024-06-26 23:38:57', '$2y$12$VIPjI88uyeBvEdanDCSm2OEs3VMAVb5INc3NmGSTXbi1XElidGhsW', 1, 'cL1pWCOp99', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(25, 'kdimet255i', 'Kayla', NULL, 'Mante', 'male', '2017-06-16', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'bdaniel@example.com', '2024-06-26 23:38:57', '$2y$12$WEu/8Xpm2unwz0O9js8YiOQHTJrUfVf9iOkOp8GNftIy7ylSOSfvG', 1, 'Lg6G9IdBKs', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(26, 'dhrz02qde4', 'Sandrine', NULL, 'Pacocha', 'male', '1994-02-26', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'oconnell.miles@example.com', '2024-06-26 23:38:57', '$2y$12$6ZMGgYgvInLlUHVPN5lvlOm.HGROBkdiAfXCmpWmzyvw0AHoP3l8a', 1, 'PdNqXegC1U', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(27, '90s0d0sm47', 'Roger', NULL, 'Kuvalis', 'female', '1987-08-20', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'gretchen.spencer@example.com', '2024-06-26 23:38:58', '$2y$12$pKcL9gaq5XXcOl5NKKu/pe4mMUVdcuQMZIUWRh6YpCtvvrMQVAT8G', 1, 'w4SAmhBKLy', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(28, '5pkczjx0zw', 'Sarai', NULL, 'Kling', 'female', '1979-05-13', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'jlittel@example.com', '2024-06-26 23:38:58', '$2y$12$xHyK4r9QIs8S46.QwYP2YO/ucQRVCzw1Fw5J9R0O/lwhT8CI55EcO', 1, 'jTLmQWoKDR', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(29, '3da4ira57e', 'Pinkie', NULL, 'Hintz', 'male', '1978-09-11', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'maxie86@example.net', '2024-06-26 23:38:58', '$2y$12$buupBppHiAknwr0D/4c4GeH2/nCrbYqSd3/D/ifgtTxTg7UqbERie', 1, 'xPRLA4Sqoe', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(30, 'm723dlp9xo', 'Kody', NULL, 'Reichel', 'female', '2021-12-13', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'chanel.yost@example.com', '2024-06-26 23:38:58', '$2y$12$jk/MTjxCmC8AjocivrMpReqBt7Ovfz/BhU7Zoj5NvAtxpVfLIjKhi', 1, 'jQXZGEHeO5', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(31, '3nmeumocrf', 'Vicenta', NULL, 'Lemke', 'female', '1971-03-09', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'banderson@example.com', '2024-06-26 23:38:59', '$2y$12$nNgerxwhtfirYdEgDUqnKO6gOsxXrm9uYu1upQ9CQrCzjdhsSDQrK', 1, 'w4HGQiEDQK', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(32, '63oijy2p3m', 'Rubye', NULL, 'Smitham', 'male', '1977-08-31', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'erich93@example.com', '2024-06-26 23:38:59', '$2y$12$H2EDVSnmbvmzqlgZuti9y.GVHZ93ZfQcxj3rKkiCh4MDZ2yWfLFcS', 1, 'eHCGFqmeyj', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(33, 'gqb784mnt0', 'Damon', NULL, 'Hyatt', 'male', '1974-07-03', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'cloyd.rath@example.net', '2024-06-26 23:38:59', '$2y$12$6TDS6aKo0afdiloRNfiezuyVH8Zq.4c0tda3R4JehPd0ATigH5xKi', 1, 'KeMISQDW0p', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(34, '3yh7w2g3oh', 'Maxwell', NULL, 'Bartoletti', 'female', '1980-09-15', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'ggreenholt@example.org', '2024-06-26 23:38:59', '$2y$12$r65CsObBDC4s9hT8ib2GsOJvjW1zj05KLBo2ysqjluA2TKHEz8VzO', 1, 'fcavJl0Frk', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(35, '10rgxwc5d2', 'Juana', NULL, 'Mertz', 'male', '2006-03-27', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'julien50@example.com', '2024-06-26 23:39:00', '$2y$12$5zaf0piu0ZlV7hVIN0Cdz.RgimSYUApITcKTKMzxCj.c/FFAFpIsK', 1, '1Gg8mIN4BN', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(36, 'o20qhbcqll', 'Hailee', NULL, 'Wisoky', 'female', '1977-01-27', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'tpfannerstill@example.net', '2024-06-26 23:39:00', '$2y$12$TscpnCv4ZoDY.M7QxuQUX.LJ.tSjdRbXPdGlOqoP1qmJwVulikvam', 1, 'KXl8LomeOg', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(37, '86s01rv77v', 'Luz', NULL, 'Kirlin', 'male', '2007-06-18', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'mccullough.herman@example.net', '2024-06-26 23:39:00', '$2y$12$1KS3TLV16.IC1Q8R.kuR7eRodPSOmKARH5.5EI4fmHX.O1pr04ezq', 1, '7McAyE6gqR', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(38, 'na4z2315h3', 'Deangelo', NULL, 'Keebler', 'female', '1995-05-08', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'grippin@example.org', '2024-06-26 23:39:00', '$2y$12$FT4BcoQ7.UnCfeVBkJWVDuq5O5iCHuxFx0/k7GI6MDxVwS1ajyfe6', 1, 'eUCLKMoW8M', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(39, '5t677snsgv', 'Nathanial', NULL, 'Glover', 'male', '1978-03-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'collier.verda@example.net', '2024-06-26 23:39:01', '$2y$12$aqlnQ4P.N7dQZ/U19rkp1.bO.6/U/EBPuyx0u8nR9cGdE7tScnXme', 1, 'c7qix07k0c', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(40, '4twk8ya5gv', 'Zander', NULL, 'Waelchi', 'male', '1985-08-05', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'schiller.elias@example.org', '2024-06-26 23:39:01', '$2y$12$U7PxmMvwE1vesY/tCIKuruZeG6KEEMd8.blvZCgOw6Yryxn.taXdm', 1, 'JLQchE66rv', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(41, 'kk4qsak6z5', 'Antone', NULL, 'Russel', 'female', '2001-04-22', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'kenton.oreilly@example.org', '2024-06-26 23:39:01', '$2y$12$FliXgvBpkP3.4mBbZ.J22Osrh1ybiiE/9.ZlaCRXKMOOeI9k/ws4W', 1, 'aZdjy7p4Kq', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(42, '57zcwlmhq3', 'Junius', NULL, 'McDermott', 'female', '2022-10-15', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'cgislason@example.net', '2024-06-26 23:39:01', '$2y$12$b1cZoJksRD.W9PsuljNQa.xTlJ19Iff/EUl88LCVSvaKb7Yp1ty3W', 1, 'ZNf7L3eZHI', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(43, 'ac7ertkbmo', 'Carmen', NULL, 'Pfannerstill', 'female', '1993-03-08', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'ckoelpin@example.net', '2024-06-26 23:39:02', '$2y$12$RBvgV1uHSRcBZf0H80DBRethdgA59l/qhQA4z.jm4414fsvSzWlh.', 1, '6ilOcNR11k', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(44, '3ns5b4yz86', 'Deshawn', NULL, 'Graham', 'male', '2020-12-18', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'geoffrey12@example.org', '2024-06-26 23:39:02', '$2y$12$Ld82fJ2JPThqZk9o/WANjuuLTcAFQRnjd4jF0A98iGaXh1ek54qXK', 1, 'iG0DqeTwu3', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(45, 'hduy887eod', 'Jeffry', NULL, 'Hill', 'male', '1978-03-31', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'schamberger.abigail@example.net', '2024-06-26 23:39:02', '$2y$12$QgaWPVeWjowytbjOPRcBW.yVgdqX2gDwKvVEiKLC.PBjnzJVugima', 1, '2SAoluV8hD', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(46, '1trh1e82mt', 'Ottilie', NULL, 'Ernser', 'male', '1982-06-01', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'wilfredo64@example.org', '2024-06-26 23:39:02', '$2y$12$LqUeBPEQzTVPIoGp05pIXuLh9EvggQeBgAoYG2q7KfWk4fc1hk2WG', 1, 'D1fOkLnA13', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(47, '4j10jy35vk', 'Zola', NULL, 'Hettinger', 'male', '1986-06-16', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'toni76@example.org', '2024-06-26 23:39:02', '$2y$12$3PpFElOf30azYv.cCUFw6e8hiNgYc2fX.i0wGVSFI8QtCXnui7zTO', 1, 'esTu82qwBB', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(48, 'dcyj2wu09e', 'Nathaniel', NULL, 'Weissnat', 'female', '2005-09-10', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'manuela.crooks@example.net', '2024-06-26 23:39:03', '$2y$12$sKChiYr/hjeQ9L9CG4dHpu6xxgrNrMn8/xgojzJqLYDIYvT6TIapu', 1, 'bI8JHawr7O', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(49, 'rz1s3b8hsn', 'Clinton', NULL, 'Waelchi', 'male', '2012-06-20', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 'johns.anthony@example.net', '2024-06-26 23:39:03', '$2y$12$WhNQJaPPMuPfr1xCogYs5.offdtXHwb26SHyMet9myTRnxRfG45Ju', 1, 'kDkyCHpQWU', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(50, 'irnlrqah3o', 'Gail', NULL, 'Waelchi', 'female', '2023-11-07', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 'lkassulke@example.net', '2024-06-26 23:39:03', '$2y$12$6B4hTTJcyVBDZ9CPWXo70O9COLVIgKPzdEHiew/3PTWjqIItXFBNW', 1, 'peFETNjLvO', '2024-06-26 23:39:03', '2024-06-26 23:39:03'),
(51, 'sdfdsfds', 'werewtret', NULL, 'trytrytr', 'male', '2000-09-12', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'admin@admin.com', NULL, '$2y$12$ZysCFlC5a4RUhig9G9Z.8e1/pPEJxOyOCaiNcCpKkcmyJ/la5LfDi', 1, NULL, '2024-06-26 23:39:04', '2024-06-26 23:39:04'),
(52, 'self', 'self', NULL, '', NULL, '2000-09-12', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 'agent@gmail.com', NULL, '$2y$12$jqLFBGSkO6wXhWHu9QLmSORll4tFZgIaKMpLu2FzxsxqtA7bQtjgS', 1, NULL, '2024-06-26 23:39:04', '2024-06-26 23:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `email`, `role`, `ip_address`, `login_time`, `media`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'Super Admin', '127.0.0.1', '2024-06-27 05:09:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0', '2024-06-26 23:39:59', '2024-06-26 23:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Teacher', NULL, NULL),
(3, 'Students', NULL, NULL),
(4, 'Accountant', NULL, NULL),
(5, 'Admin', NULL, NULL),
(6, 'Agent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year_made` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_licence` varchar(255) NOT NULL,
  `driver_contact` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `virtual_classes`
--

CREATE TABLE `virtual_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_of_class` varchar(255) NOT NULL,
  `time_of_class` varchar(255) NOT NULL,
  `class_duration` varchar(255) NOT NULL,
  `class_start_before` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `virtual_meetings`
--

CREATE TABLE `virtual_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_of_meeting` varchar(255) NOT NULL,
  `time_of_meeting` varchar(255) NOT NULL,
  `meeting_duration` varchar(255) NOT NULL,
  `meeting_start_before` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_books`
--

CREATE TABLE `visitor_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `icard` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `time_in` varchar(255) DEFAULT NULL,
  `time_out` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `week_days`
--

CREATE TABLE `week_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_days`
--

INSERT INTO `week_days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL),
(6, 'Saturday', NULL, NULL),
(7, 'Sunday', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achivements_course_id_foreign` (`course_id`),
  ADD KEY `achivements_semester_id_foreign` (`semester_id`),
  ADD KEY `achivements_session_id_foreign` (`session_id`),
  ADD KEY `achivements_student_id_foreign` (`student_id`);

--
-- Indexes for table `admission_enquiries`
--
ALTER TABLE `admission_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_payments`
--
ALTER TABLE `agent_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `answerscript_evaluators`
--
ALTER TABLE `answerscript_evaluators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answerscript_evaluators_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `answersheets`
--
ALTER TABLE `answersheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answersheets_subject_details_id_foreign` (`subject_details_id`),
  ADD KEY `answersheets_student_id_foreign` (`student_id`),
  ADD KEY `answersheets_question_id_foreign` (`question_id`);

--
-- Indexes for table `assign_semester_teachers`
--
ALTER TABLE `assign_semester_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_semester_teachers_course_id_foreign` (`course_id`),
  ADD KEY `assign_semester_teachers_semester_id_foreign` (`semester_id`),
  ADD KEY `assign_semester_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `assign_vehicles`
--
ALTER TABLE `assign_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_vehicles_route_id_foreign` (`route_id`),
  ADD KEY `assign_vehicles_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`),
  ADD KEY `attendances_attendance_by_foreign` (`attendance_by`),
  ADD KEY `attendances_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `book_publications`
--
ALTER TABLE `book_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_publications_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caution_money`
--
ALTER TABLE `caution_money`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caution_money_user_id_foreign` (`user_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_course_id_foreign` (`course_id`),
  ADD KEY `certificates_semester_id_foreign` (`semester_id`),
  ADD KEY `certificates_session_id_foreign` (`session_id`),
  ADD KEY `certificates_certificate_type_id_foreign` (`certificate_type_id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `certificate_types`
--
ALTER TABLE `certificate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_sender_id_foreign` (`sender_id`),
  ADD KEY `chats_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `class_statuses`
--
ALTER TABLE `class_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancies`
--
ALTER TABLE `consultancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_groups`
--
ALTER TABLE `course_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_groups_course_id_foreign` (`course_id`),
  ADD KEY `course_groups_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_student_id_foreign` (`student_id`),
  ADD KEY `discounts_course_id_foreign` (`course_id`),
  ADD KEY `discounts_semester_id_foreign` (`semester_id`),
  ADD KEY `discounts_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `education_qualifications`
--
ALTER TABLE `education_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examiners`
--
ALTER TABLE `examiners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examiners_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expense_head_id_foreign` (`expense_head_id`);

--
-- Indexes for table `expense_heads`
--
ALTER TABLE `expense_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees_structures`
--
ALTER TABLE `fees_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_structures_course_id_foreign` (`course_id`),
  ADD KEY `fees_structures_fees_type_id_foreign` (`fees_type_id`),
  ADD KEY `fees_structures_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `fees_types`
--
ALTER TABLE `fees_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generated_payrolls`
--
ALTER TABLE `generated_payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generated_payrolls_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_course_id_foreign` (`course_id`),
  ADD KEY `homework_semester_id_foreign` (`semester_id`),
  ADD KEY `homework_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_hostel_type_id_foreign` (`hostel_type_id`),
  ADD KEY `hotels_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_details_hostel_id_foreign` (`hostel_id`),
  ADD KEY `hotel_details_room_type_id_foreign` (`room_type_id`),
  ADD KEY `hotel_details_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `hotel_types`
--
ALTER TABLE `hotel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_income_head_id_foreign` (`income_head_id`);

--
-- Indexes for table `income_heads`
--
ALTER TABLE `income_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_details_internship_provider_id_foreign` (`internship_provider_id`),
  ADD KEY `internship_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `internship_providers`
--
ALTER TABLE `internship_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_providers_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `inventory_issues`
--
ALTER TABLE `inventory_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_issues_user_type_id_foreign` (`user_type_id`),
  ADD KEY `inventory_issues_issue_to_foreign` (`issue_to`),
  ADD KEY `inventory_issues_issue_by_foreign` (`issue_by`),
  ADD KEY `inventory_issues_item_type_id_foreign` (`item_type_id`),
  ADD KEY `inventory_issues_inventory_item_id_foreign` (`inventory_item_id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_items_item_type_id_foreign` (`item_type_id`),
  ADD KEY `inventory_items_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_stocks_item_type_id_foreign` (`item_type_id`),
  ADD KEY `item_stocks_inventory_item_id_foreign` (`inventory_item_id`),
  ADD KEY `item_stocks_item_supplier_id_foreign` (`item_supplier_id`),
  ADD KEY `item_stocks_item_store_id_foreign` (`item_store_id`);

--
-- Indexes for table `item_stores`
--
ALTER TABLE `item_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_suppliers`
--
ALTER TABLE `item_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_types_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `journal_publications`
--
ALTER TABLE `journal_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_publications_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`),
  ADD KEY `leaves_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_lists`
--
ALTER TABLE `leave_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_lists_user_id_foreign` (`user_id`),
  ADD KEY `leave_lists_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_types_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `library_digital_books`
--
ALTER TABLE `library_digital_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_digital_books_course_id_foreign` (`course_id`),
  ADD KEY `library_digital_books_semester_id_foreign` (`semester_id`),
  ADD KEY `library_digital_books_book_id_foreign` (`book_id`);

--
-- Indexes for table `library_issues`
--
ALTER TABLE `library_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_issues_book_id_foreign` (`book_id`),
  ADD KEY `library_issues_user_id_foreign` (`user_id`),
  ADD KEY `library_issues_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `library_stocks`
--
ALTER TABLE `library_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_stocks_course_id_foreign` (`course_id`),
  ADD KEY `library_stocks_semester_id_foreign` (`semester_id`),
  ADD KEY `library_stocks_subject_id_foreign` (`subject_id`),
  ADD KEY `library_stocks_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `manual_fees`
--
ALTER TABLE `manual_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheets`
--
ALTER TABLE `marksheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marksheets_course_id_foreign` (`course_id`),
  ADD KEY `marksheets_semester_id_foreign` (`semester_id`),
  ADD KEY `marksheets_subject_id_foreign` (`subject_id`),
  ADD KEY `marksheets_student_id_foreign` (`student_id`),
  ADD KEY `marksheets_session_id_foreign` (`session_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_details`
--
ALTER TABLE `member_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_details_user_id_foreign` (`user_id`),
  ADD KEY `member_details_department_id_foreign` (`department_id`),
  ADD KEY `member_details_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `menu_management`
--
ALTER TABLE `menu_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_management_user_type_id_foreign` (`user_type_id`),
  ADD KEY `menu_management_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `paper_setters`
--
ALTER TABLE `paper_setters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_setters_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`),
  ADD KEY `payments_semester_id_foreign` (`semester_id`),
  ADD KEY `payments_received_by_foreign` (`received_by`);

--
-- Indexes for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_deductions_payroll_id_foreign` (`payroll_id`),
  ADD KEY `payroll_deductions_payroll_type_id_foreign` (`payroll_type_id`);

--
-- Indexes for table `payroll_earnings`
--
ALTER TABLE `payroll_earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_earnings_payroll_id_foreign` (`payroll_id`),
  ADD KEY `payroll_earnings_payroll_type_id_foreign` (`payroll_type_id`);

--
-- Indexes for table `payroll_types`
--
ALTER TABLE `payroll_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip_uploads`
--
ALTER TABLE `payslip_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pg_phd_guides`
--
ALTER TABLE `pg_phd_guides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pg_phd_guides_staff_id_foreign` (`staff_id`),
  ADD KEY `pg_phd_guides_student_id_foreign` (`student_id`);

--
-- Indexes for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placement_details_course_id_foreign` (`course_id`),
  ADD KEY `placement_details_semester_id_foreign` (`semester_id`),
  ADD KEY `placement_details_session_id_foreign` (`session_id`),
  ADD KEY `placement_details_company_id_foreign` (`company_id`),
  ADD KEY `placement_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `postals`
--
ALTER TABLE `postals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_admission_payments`
--
ALTER TABLE `pre_admission_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pre_admission_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_subject_details_id_foreign` (`subject_details_id`),
  ADD KEY `questions_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrations_student_id_foreign` (`student_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_and_permissions_user_type_id_foreign` (`user_type_id`),
  ADD KEY `roles_and_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_types_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_timetables`
--
ALTER TABLE `semester_timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_timetables_course_id_foreign` (`course_id`),
  ADD KEY `semester_timetables_semester_id_foreign` (`semester_id`),
  ADD KEY `semester_timetables_session_id_foreign` (`session_id`),
  ADD KEY `semester_timetables_subject_id_foreign` (`subject_id`),
  ADD KEY `semester_timetables_teacher_id_foreign` (`teacher_id`),
  ADD KEY `semester_timetables_week_id_foreign` (`week_id`);

--
-- Indexes for table `seminar_workshop_faculties`
--
ALTER TABLE `seminar_workshop_faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seminar_workshop_faculties_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `sponsored_project_consultancies`
--
ALTER TABLE `sponsored_project_consultancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_attendances_user_id_foreign` (`user_id`),
  ADD KEY `staff_attendances_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `staff_education`
--
ALTER TABLE `staff_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_education_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `staff_experiences`
--
ALTER TABLE `staff_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_experiences_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_details_student_id_foreign` (`student_id`),
  ADD KEY `student_details_course_id_foreign` (`course_id`),
  ADD KEY `student_details_semester_id_foreign` (`semester_id`),
  ADD KEY `student_details_current_semester_id_foreign` (`current_semester_id`),
  ADD KEY `student_details_agent_id_foreign` (`agent_id`),
  ADD KEY `student_details_session_id_foreign` (`session_id`);

--
-- Indexes for table `student_education`
--
ALTER TABLE `student_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_details_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_details_course_id_foreign` (`course_id`),
  ADD KEY `subject_details_semester_id_foreign` (`semester_id`),
  ADD KEY `subject_details_session_id_foreign` (`session_id`),
  ADD KEY `subject_details_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `subject_groups`
--
ALTER TABLE `subject_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_groups_course_id_foreign` (`course_id`),
  ADD KEY `subject_groups_semester_id_foreign` (`semester_id`),
  ADD KEY `subject_groups_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `university_synopses`
--
ALTER TABLE `university_synopses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_synopses_staff_id_foreign` (`staff_id`),
  ADD KEY `university_synopses_student_id_foreign` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_category_id_foreign` (`category_id`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_franchise_id_foreign` (`franchise_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `virtual_classes`
--
ALTER TABLE `virtual_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `virtual_classes_course_id_foreign` (`course_id`),
  ADD KEY `virtual_classes_semester_id_foreign` (`semester_id`),
  ADD KEY `virtual_classes_subject_id_foreign` (`subject_id`),
  ADD KEY `virtual_classes_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `virtual_meetings`
--
ALTER TABLE `virtual_meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `virtual_meetings_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `visitor_books`
--
ALTER TABLE `visitor_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_days`
--
ALTER TABLE `week_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achivements`
--
ALTER TABLE `achivements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_enquiries`
--
ALTER TABLE `admission_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_payments`
--
ALTER TABLE `agent_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answerscript_evaluators`
--
ALTER TABLE `answerscript_evaluators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answersheets`
--
ALTER TABLE `answersheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_semester_teachers`
--
ALTER TABLE `assign_semester_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_vehicles`
--
ALTER TABLE `assign_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_publications`
--
ALTER TABLE `book_publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `call_logs`
--
ALTER TABLE `call_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `caution_money`
--
ALTER TABLE `caution_money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_types`
--
ALTER TABLE `certificate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_statuses`
--
ALTER TABLE `class_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancies`
--
ALTER TABLE `consultancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_groups`
--
ALTER TABLE `course_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_qualifications`
--
ALTER TABLE `education_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examiners`
--
ALTER TABLE `examiners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_heads`
--
ALTER TABLE `expense_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_structures`
--
ALTER TABLE `fees_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_types`
--
ALTER TABLE `fees_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generated_payrolls`
--
ALTER TABLE `generated_payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_details`
--
ALTER TABLE `hotel_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_heads`
--
ALTER TABLE `income_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_details`
--
ALTER TABLE `internship_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_providers`
--
ALTER TABLE `internship_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_issues`
--
ALTER TABLE `inventory_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_stores`
--
ALTER TABLE `item_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_suppliers`
--
ALTER TABLE `item_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_publications`
--
ALTER TABLE `journal_publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_lists`
--
ALTER TABLE `leave_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_digital_books`
--
ALTER TABLE `library_digital_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_issues`
--
ALTER TABLE `library_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_stocks`
--
ALTER TABLE `library_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_fees`
--
ALTER TABLE `manual_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marksheets`
--
ALTER TABLE `marksheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_details`
--
ALTER TABLE `member_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_management`
--
ALTER TABLE `menu_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1172;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_setters`
--
ALTER TABLE `paper_setters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_earnings`
--
ALTER TABLE `payroll_earnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_types`
--
ALTER TABLE `payroll_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslip_uploads`
--
ALTER TABLE `payslip_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pg_phd_guides`
--
ALTER TABLE `pg_phd_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement_details`
--
ALTER TABLE `placement_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postals`
--
ALTER TABLE `postals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_admission_payments`
--
ALTER TABLE `pre_admission_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1849;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_timetables`
--
ALTER TABLE `semester_timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar_workshop_faculties`
--
ALTER TABLE `seminar_workshop_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsored_project_consultancies`
--
ALTER TABLE `sponsored_project_consultancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_education`
--
ALTER TABLE `staff_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_experiences`
--
ALTER TABLE `staff_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_education`
--
ALTER TABLE `student_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_groups`
--
ALTER TABLE `subject_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_synopses`
--
ALTER TABLE `university_synopses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `virtual_classes`
--
ALTER TABLE `virtual_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `virtual_meetings`
--
ALTER TABLE `virtual_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_books`
--
ALTER TABLE `visitor_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `week_days`
--
ALTER TABLE `week_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achivements`
--
ALTER TABLE `achivements`
  ADD CONSTRAINT `achivements_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `achivements_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `achivements_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `achivements_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agent_payments`
--
ALTER TABLE `agent_payments`
  ADD CONSTRAINT `agent_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answerscript_evaluators`
--
ALTER TABLE `answerscript_evaluators`
  ADD CONSTRAINT `answerscript_evaluators_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answersheets`
--
ALTER TABLE `answersheets`
  ADD CONSTRAINT `answersheets_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answersheets_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answersheets_subject_details_id_foreign` FOREIGN KEY (`subject_details_id`) REFERENCES `subject_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_semester_teachers`
--
ALTER TABLE `assign_semester_teachers`
  ADD CONSTRAINT `assign_semester_teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_semester_teachers_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_semester_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_vehicles`
--
ALTER TABLE `assign_vehicles`
  ADD CONSTRAINT `assign_vehicles_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_vehicles_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_attendance_by_foreign` FOREIGN KEY (`attendance_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_publications`
--
ALTER TABLE `book_publications`
  ADD CONSTRAINT `book_publications_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `caution_money`
--
ALTER TABLE `caution_money`
  ADD CONSTRAINT `caution_money_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_certificate_type_id_foreign` FOREIGN KEY (`certificate_type_id`) REFERENCES `certificate_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_groups`
--
ALTER TABLE `course_groups`
  ADD CONSTRAINT `course_groups_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_groups_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discounts_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discounts_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examiners`
--
ALTER TABLE `examiners`
  ADD CONSTRAINT `examiners_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_head_id_foreign` FOREIGN KEY (`expense_head_id`) REFERENCES `expense_heads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_structures`
--
ALTER TABLE `fees_structures`
  ADD CONSTRAINT `fees_structures_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_structures_fees_type_id_foreign` FOREIGN KEY (`fees_type_id`) REFERENCES `fees_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_structures_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `generated_payrolls`
--
ALTER TABLE `generated_payrolls`
  ADD CONSTRAINT `generated_payrolls_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `homework_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `homework_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotels_hostel_type_id_foreign` FOREIGN KEY (`hostel_type_id`) REFERENCES `hotel_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD CONSTRAINT `hotel_details_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_details_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_details_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_income_head_id_foreign` FOREIGN KEY (`income_head_id`) REFERENCES `income_heads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD CONSTRAINT `internship_details_internship_provider_id_foreign` FOREIGN KEY (`internship_provider_id`) REFERENCES `internship_providers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `internship_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `internship_providers`
--
ALTER TABLE `internship_providers`
  ADD CONSTRAINT `internship_providers_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_issues`
--
ALTER TABLE `inventory_issues`
  ADD CONSTRAINT `inventory_issues_inventory_item_id_foreign` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_issues_issue_by_foreign` FOREIGN KEY (`issue_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_issues_issue_to_foreign` FOREIGN KEY (`issue_to`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_issues_item_type_id_foreign` FOREIGN KEY (`item_type_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_issues_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD CONSTRAINT `inventory_items_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_items_item_type_id_foreign` FOREIGN KEY (`item_type_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD CONSTRAINT `item_stocks_inventory_item_id_foreign` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stocks_item_store_id_foreign` FOREIGN KEY (`item_store_id`) REFERENCES `item_stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stocks_item_supplier_id_foreign` FOREIGN KEY (`item_supplier_id`) REFERENCES `item_suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stocks_item_type_id_foreign` FOREIGN KEY (`item_type_id`) REFERENCES `item_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_types`
--
ALTER TABLE `item_types`
  ADD CONSTRAINT `item_types_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journal_publications`
--
ALTER TABLE `journal_publications`
  ADD CONSTRAINT `journal_publications_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_lists`
--
ALTER TABLE `leave_lists`
  ADD CONSTRAINT `leave_lists_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD CONSTRAINT `leave_types_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `library_digital_books`
--
ALTER TABLE `library_digital_books`
  ADD CONSTRAINT `library_digital_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `library_stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_digital_books_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_digital_books_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `library_issues`
--
ALTER TABLE `library_issues`
  ADD CONSTRAINT `library_issues_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `library_stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_issues_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_issues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `library_stocks`
--
ALTER TABLE `library_stocks`
  ADD CONSTRAINT `library_stocks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_stocks_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_stocks_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_stocks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marksheets`
--
ALTER TABLE `marksheets`
  ADD CONSTRAINT `marksheets_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marksheets_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marksheets_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marksheets_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marksheets_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_details`
--
ALTER TABLE `member_details`
  ADD CONSTRAINT `member_details_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `member_details_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `member_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_management`
--
ALTER TABLE `menu_management`
  ADD CONSTRAINT `menu_management_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_management_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paper_setters`
--
ALTER TABLE `paper_setters`
  ADD CONSTRAINT `paper_setters_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_received_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  ADD CONSTRAINT `payroll_deductions_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `generated_payrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payroll_deductions_payroll_type_id_foreign` FOREIGN KEY (`payroll_type_id`) REFERENCES `payroll_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_earnings`
--
ALTER TABLE `payroll_earnings`
  ADD CONSTRAINT `payroll_earnings_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `generated_payrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payroll_earnings_payroll_type_id_foreign` FOREIGN KEY (`payroll_type_id`) REFERENCES `payroll_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pg_phd_guides`
--
ALTER TABLE `pg_phd_guides`
  ADD CONSTRAINT `pg_phd_guides_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pg_phd_guides_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD CONSTRAINT `placement_details_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placement_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placement_details_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placement_details_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `placement_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pre_admission_payments`
--
ALTER TABLE `pre_admission_payments`
  ADD CONSTRAINT `pre_admission_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_subject_details_id_foreign` FOREIGN KEY (`subject_details_id`) REFERENCES `subject_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_and_permissions`
--
ALTER TABLE `roles_and_permissions`
  ADD CONSTRAINT `roles_and_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_and_permissions_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_types`
--
ALTER TABLE `room_types`
  ADD CONSTRAINT `room_types_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semester_timetables`
--
ALTER TABLE `semester_timetables`
  ADD CONSTRAINT `semester_timetables_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semester_timetables_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semester_timetables_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semester_timetables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semester_timetables_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semester_timetables_week_id_foreign` FOREIGN KEY (`week_id`) REFERENCES `week_days` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seminar_workshop_faculties`
--
ALTER TABLE `seminar_workshop_faculties`
  ADD CONSTRAINT `seminar_workshop_faculties_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD CONSTRAINT `staff_attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_attendances_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_education`
--
ALTER TABLE `staff_education`
  ADD CONSTRAINT `staff_education_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_experiences`
--
ALTER TABLE `staff_experiences`
  ADD CONSTRAINT `staff_experiences_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_details_current_semester_id_foreign` FOREIGN KEY (`current_semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_details_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_details_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_details_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD CONSTRAINT `subject_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_details_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_details_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_details_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_details_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_groups`
--
ALTER TABLE `subject_groups`
  ADD CONSTRAINT `subject_groups_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_groups_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_groups_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `university_synopses`
--
ALTER TABLE `university_synopses`
  ADD CONSTRAINT `university_synopses_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `university_synopses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_franchise_id_foreign` FOREIGN KEY (`franchise_id`) REFERENCES `franchises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `virtual_classes`
--
ALTER TABLE `virtual_classes`
  ADD CONSTRAINT `virtual_classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `virtual_classes_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `virtual_classes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `virtual_classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `virtual_meetings`
--
ALTER TABLE `virtual_meetings`
  ADD CONSTRAINT `virtual_meetings_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
