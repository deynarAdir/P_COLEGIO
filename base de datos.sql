-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_colegio
CREATE DATABASE IF NOT EXISTS `db_colegio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_colegio`;

-- Dumping structure for table db_colegio.admin_controls
CREATE TABLE IF NOT EXISTS `admin_controls` (
  `idadmin_control` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `extra` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idadmin_control`),
  KEY `admin_controls_id_user_foreign` (`id_user`),
  CONSTRAINT `admin_controls_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.admin_controls: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_controls` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_controls` ENABLE KEYS */;

-- Dumping structure for table db_colegio.assets
CREATE TABLE IF NOT EXISTS `assets` (
  `idasset` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idasset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.assets: ~0 rows (approximately)
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;

-- Dumping structure for table db_colegio.asset_classroom_details
CREATE TABLE IF NOT EXISTS `asset_classroom_details` (
  `idasset_classroom_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_classroom` int(10) unsigned NOT NULL,
  `id_asset` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `observation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idasset_classroom_detail`),
  KEY `asset_classroom_details_id_classroom_foreign` (`id_classroom`),
  KEY `asset_classroom_details_id_asset_foreign` (`id_asset`),
  CONSTRAINT `asset_classroom_details_id_asset_foreign` FOREIGN KEY (`id_asset`) REFERENCES `assets` (`idasset`),
  CONSTRAINT `asset_classroom_details_id_classroom_foreign` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`idclassroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.asset_classroom_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `asset_classroom_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_classroom_details` ENABLE KEYS */;

-- Dumping structure for table db_colegio.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_subject_student_detail` int(10) unsigned NOT NULL,
  `id_subject_teacher_detail` int(10) unsigned NOT NULL,
  `id_classroom_detail` int(10) unsigned NOT NULL,
  `id_secretary` int(10) unsigned NOT NULL,
  `b1` int(11) NOT NULL,
  `b2` int(11) NOT NULL,
  `b3` int(11) NOT NULL,
  `b4` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `management` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`assignment`),
  KEY `assignments_id_subject_student_detail_foreign` (`id_subject_student_detail`),
  KEY `assignments_id_subject_teacher_detail_foreign` (`id_subject_teacher_detail`),
  KEY `assignments_id_classroom_detail_foreign` (`id_classroom_detail`),
  KEY `assignments_id_secretary_foreign` (`id_secretary`),
  CONSTRAINT `assignments_id_classroom_detail_foreign` FOREIGN KEY (`id_classroom_detail`) REFERENCES `classroom_details` (`idclassroom_detail`),
  CONSTRAINT `assignments_id_secretary_foreign` FOREIGN KEY (`id_secretary`) REFERENCES `secretaries` (`idsecretary`),
  CONSTRAINT `assignments_id_subject_student_detail_foreign` FOREIGN KEY (`id_subject_student_detail`) REFERENCES `subject_student_details` (`idsubject_student_detail`),
  CONSTRAINT `assignments_id_subject_teacher_detail_foreign` FOREIGN KEY (`id_subject_teacher_detail`) REFERENCES `subject_teacher_details` (`idsubject_teacher_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.assignments: ~0 rows (approximately)
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;

-- Dumping structure for table db_colegio.classrooms
CREATE TABLE IF NOT EXISTS `classrooms` (
  `idclassroom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_type_classroom` int(10) unsigned NOT NULL,
  `classroom_description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_floor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `classroom_characteristic` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idclassroom`),
  KEY `classrooms_id_type_classroom_foreign` (`id_type_classroom`),
  CONSTRAINT `classrooms_id_type_classroom_foreign` FOREIGN KEY (`id_type_classroom`) REFERENCES `type_classrooms` (`idtype_classroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.classrooms: ~0 rows (approximately)
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;

-- Dumping structure for table db_colegio.classroom_details
CREATE TABLE IF NOT EXISTS `classroom_details` (
  `idclassroom_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_degree` int(10) unsigned NOT NULL,
  `id_classroom` int(10) unsigned NOT NULL,
  `id_parallel` int(10) unsigned NOT NULL,
  `id_hour` int(10) unsigned NOT NULL,
  `management` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idclassroom_detail`),
  KEY `classroom_details_id_degree_foreign` (`id_degree`),
  KEY `classroom_details_id_classroom_foreign` (`id_classroom`),
  KEY `classroom_details_id_parallel_foreign` (`id_parallel`),
  KEY `classroom_details_id_hour_foreign` (`id_hour`),
  CONSTRAINT `classroom_details_id_classroom_foreign` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`idclassroom`),
  CONSTRAINT `classroom_details_id_degree_foreign` FOREIGN KEY (`id_degree`) REFERENCES `degrees` (`iddegree`),
  CONSTRAINT `classroom_details_id_hour_foreign` FOREIGN KEY (`id_hour`) REFERENCES `hours` (`idhour`),
  CONSTRAINT `classroom_details_id_parallel_foreign` FOREIGN KEY (`id_parallel`) REFERENCES `parallels` (`idparallel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.classroom_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `classroom_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom_details` ENABLE KEYS */;

-- Dumping structure for table db_colegio.contracts
CREATE TABLE IF NOT EXISTS `contracts` (
  `idcontract` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_type_contract` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcontract`),
  KEY `contracts_id_user_foreign` (`id_user`),
  KEY `contracts_id_type_contract_foreign` (`id_type_contract`),
  CONSTRAINT `contracts_id_type_contract_foreign` FOREIGN KEY (`id_type_contract`) REFERENCES `type_contracts` (`idtype_contract`),
  CONSTRAINT `contracts_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.contracts: ~3 rows (approximately)
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
REPLACE INTO `contracts` (`idcontract`, `id_user`, `id_type_contract`, `start_date`, `end_date`, `payment`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, '2019-06-01', '2019-06-30', 2000, '2019-06-18 10:48:26', '2019-06-18 10:48:26'),
	(2, 4, 2, '2019-06-01', '2019-06-30', 30, '2019-06-18 10:49:38', '2019-06-18 10:49:38'),
	(3, 5, 2, '2019-06-01', '2019-06-30', 50, '2019-06-18 10:50:46', '2019-06-18 10:50:46'),
	(4, 7, 1, '2019-06-01', '2019-07-31', 2500, '2019-06-18 19:05:28', '2019-06-18 19:05:28');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;

-- Dumping structure for table db_colegio.days
CREATE TABLE IF NOT EXISTS `days` (
  `idday` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idday`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.days: ~6 rows (approximately)
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
REPLACE INTO `days` (`idday`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Lunes', '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(2, 'Martes', '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(3, 'Miercoles', '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(4, 'Jueves', '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(5, 'Viernes', '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(6, 'Sabado', '2019-06-18 09:53:48', '2019-06-18 09:53:48');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;

-- Dumping structure for table db_colegio.degrees
CREATE TABLE IF NOT EXISTS `degrees` (
  `iddegree` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iddegree`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.degrees: ~0 rows (approximately)
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
REPLACE INTO `degrees` (`iddegree`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, '1 Secundaria', 30, '2019-06-18 19:08:19', '2019-06-18 19:08:19'),
	(2, '2 Secundaria', 30, '2019-06-18 19:08:32', '2019-06-18 19:08:32');
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;

-- Dumping structure for table db_colegio.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `iddocument` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_student` int(10) unsigned NOT NULL,
  `ci_photocopy` tinyint(1) NOT NULL,
  `birth_certificate_original` tinyint(1) NOT NULL,
  `rude` tinyint(1) NOT NULL,
  `photocopy_legalized_notebook` tinyint(1) NOT NULL,
  `original_notepad` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iddocument`),
  KEY `documents_id_student_foreign` (`id_student`),
  CONSTRAINT `documents_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`idstudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.documents: ~0 rows (approximately)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Dumping structure for table db_colegio.fee_types
CREATE TABLE IF NOT EXISTS `fee_types` (
  `idfee_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` int(11) NOT NULL,
  `price` double(7,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idfee_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.fee_types: ~0 rows (approximately)
/*!40000 ALTER TABLE `fee_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `fee_types` ENABLE KEYS */;

-- Dumping structure for table db_colegio.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `idhorario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_day` int(10) unsigned NOT NULL,
  `hour_entry` time NOT NULL,
  `hour_exit` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `horarios_id_user_foreign` (`id_user`),
  KEY `horarios_id_day_foreign` (`id_day`),
  CONSTRAINT `horarios_id_day_foreign` FOREIGN KEY (`id_day`) REFERENCES `days` (`idday`),
  CONSTRAINT `horarios_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.horarios: ~0 rows (approximately)
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;

-- Dumping structure for table db_colegio.hours
CREATE TABLE IF NOT EXISTS `hours` (
  `idhour` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idhour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.hours: ~0 rows (approximately)
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;

-- Dumping structure for table db_colegio.managers
CREATE TABLE IF NOT EXISTS `managers` (
  `idmanager` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmanager`),
  KEY `managers_id_user_foreign` (`id_user`),
  CONSTRAINT `managers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.managers: ~0 rows (approximately)
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;

-- Dumping structure for table db_colegio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.migrations: ~31 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_04_14_016_create_fee_types_table', 1),
	(2, '2019_04_15_001_create_rols_table', 1),
	(3, '2019_04_15_002_create_punishments_table', 1),
	(4, '2019_04_15_003_create_users_table', 1),
	(5, '2019_04_15_004_create_password_resets_table', 1),
	(6, '2019_04_15_005_create_assets_table', 1),
	(7, '2019_04_15_006_create_type_classrooms_table', 1),
	(8, '2019_04_15_007_create_parallels_table', 1),
	(9, '2019_04_15_008_create_degrees_table', 1),
	(10, '2019_04_15_009_create_subjects_table', 1),
	(11, '2019_04_15_010_create_hours_table', 1),
	(12, '2019_04_15_011_create_type_contracts_table', 1),
	(13, '2019_04_15_012_create_administrative_controls_table', 1),
	(14, '2019_04_15_013_create_classrooms_table', 1),
	(15, '2019_04_15_014_create_managers_table', 1),
	(16, '2019_04_15_014_create_secretaries_table', 1),
	(17, '2019_04_15_015_create_salaries_table', 1),
	(18, '2019_04_15_015_create_students_table', 1),
	(19, '2019_04_15_016_create_student_fees_table', 1),
	(20, '2019_04_15_017_create_payments_table', 1),
	(21, '2019_04_15_017_create_student_payments_table', 1),
	(22, '2019_04_15_018_create_number_students_table', 1),
	(23, '2019_04_15_019_create_teachers_table', 1),
	(24, '2019_04_15_020_create_contracts_table', 1),
	(25, '2019_04_15_023_create_documents_table', 1),
	(26, '2019_04_15_024_create_subject_details_table', 1),
	(27, '2019_04_15_025_create_subject_student_details_table', 1),
	(28, '2019_04_15_026_create_subject_teacher_details_table', 1),
	(29, '2019_04_15_027_create_classroom_details_table', 1),
	(30, '2019_04_15_028_create_asset_classroom_details_table', 1),
	(31, '2019_04_15_029_create_assignments_table', 1),
	(32, '2019_04_15_030_create_notifications_table', 1),
	(33, '2019_06_18_093226_days', 1),
	(34, '2019_06_18_093532_create_horarios', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_colegio.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `idnotification` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_teacher` int(10) unsigned NOT NULL,
  `id_student` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnotification`),
  KEY `notifications_id_student_foreign` (`id_student`),
  KEY `notifications_id_teacher_foreign` (`id_teacher`),
  CONSTRAINT `notifications_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`idstudent`),
  CONSTRAINT `notifications_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`idteacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table db_colegio.number_stdents
CREATE TABLE IF NOT EXISTS `number_stdents` (
  `idnumber_student` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_degree` int(10) unsigned NOT NULL,
  `id_parallel` int(10) unsigned NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnumber_student`),
  KEY `number_stdents_id_degree_foreign` (`id_degree`),
  KEY `number_stdents_id_parallel_foreign` (`id_parallel`),
  CONSTRAINT `number_stdents_id_degree_foreign` FOREIGN KEY (`id_degree`) REFERENCES `degrees` (`iddegree`),
  CONSTRAINT `number_stdents_id_parallel_foreign` FOREIGN KEY (`id_parallel`) REFERENCES `parallels` (`idparallel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.number_stdents: ~0 rows (approximately)
/*!40000 ALTER TABLE `number_stdents` DISABLE KEYS */;
/*!40000 ALTER TABLE `number_stdents` ENABLE KEYS */;

-- Dumping structure for table db_colegio.parallels
CREATE TABLE IF NOT EXISTS `parallels` (
  `idparallel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idparallel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.parallels: ~0 rows (approximately)
/*!40000 ALTER TABLE `parallels` DISABLE KEYS */;
REPLACE INTO `parallels` (`idparallel`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 'B', 30, '2019-06-18 19:07:54', '2019-06-18 19:07:54');
/*!40000 ALTER TABLE `parallels` ENABLE KEYS */;

-- Dumping structure for table db_colegio.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_colegio.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `idpayment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_student` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `nit_ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `invoice_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payment` decimal(8,2) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpayment`),
  KEY `payments_id_student_foreign` (`id_student`),
  KEY `payments_id_user_foreign` (`id_user`),
  CONSTRAINT `payments_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `users` (`iduser`),
  CONSTRAINT `payments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table db_colegio.punishments
CREATE TABLE IF NOT EXISTS `punishments` (
  `idpunishment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `punishment1` int(11) NOT NULL,
  `punishment2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpunishment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.punishments: ~0 rows (approximately)
/*!40000 ALTER TABLE `punishments` DISABLE KEYS */;
REPLACE INTO `punishments` (`idpunishment`, `punishment1`, `punishment2`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, '2019-06-18 09:53:47', '2019-06-18 09:53:47');
/*!40000 ALTER TABLE `punishments` ENABLE KEYS */;

-- Dumping structure for table db_colegio.rols
CREATE TABLE IF NOT EXISTS `rols` (
  `idrol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description1` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.rols: ~7 rows (approximately)
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
REPLACE INTO `rols` (`idrol`, `description1`, `description2`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'Gerente', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(2, 'Director', 'Administracion', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(3, 'Docente', 'Administracion', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(4, 'Estudiante', 'Estudiante', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(5, 'TUTOR', 'PADRE', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(6, 'Secretaria', 'Administracion', '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(7, 'Tesorero', 'Administracion', '2019-06-18 09:53:47', '2019-06-18 09:53:47');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;

-- Dumping structure for table db_colegio.salaries
CREATE TABLE IF NOT EXISTS `salaries` (
  `idsalary` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `observation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bond` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsalary`),
  KEY `salaries_id_user_foreign` (`id_user`),
  CONSTRAINT `salaries_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.salaries: ~0 rows (approximately)
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;

-- Dumping structure for table db_colegio.secretaries
CREATE TABLE IF NOT EXISTS `secretaries` (
  `idsecretary` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `num_job_certificate` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsecretary`),
  KEY `secretaries_id_user_foreign` (`id_user`),
  CONSTRAINT `secretaries_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.secretaries: ~0 rows (approximately)
/*!40000 ALTER TABLE `secretaries` DISABLE KEYS */;
REPLACE INTO `secretaries` (`idsecretary`, `id_user`, `num_job_certificate`, `name_title`, `cv`, `created_at`, `updated_at`) VALUES
	(1, 3, '654654', 'jhfjhgfg', 'roles XP.png', '2019-06-18 10:48:26', '2019-06-18 10:48:26');
/*!40000 ALTER TABLE `secretaries` ENABLE KEYS */;

-- Dumping structure for table db_colegio.students
CREATE TABLE IF NOT EXISTS `students` (
  `idstudent` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_manager` int(10) unsigned NOT NULL,
  `id_degree` int(10) unsigned NOT NULL,
  `id_parallel` int(10) unsigned NOT NULL,
  `id_fee` int(10) unsigned NOT NULL,
  `student_status` int(11) NOT NULL,
  `rude` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idstudent`),
  KEY `students_id_user_foreign` (`id_user`),
  KEY `students_id_manager_foreign` (`id_manager`),
  KEY `students_id_degree_foreign` (`id_degree`),
  KEY `students_id_parallel_foreign` (`id_parallel`),
  KEY `students_id_fee_foreign` (`id_fee`),
  CONSTRAINT `students_id_degree_foreign` FOREIGN KEY (`id_degree`) REFERENCES `degrees` (`iddegree`),
  CONSTRAINT `students_id_fee_foreign` FOREIGN KEY (`id_fee`) REFERENCES `fee_types` (`idfee_type`),
  CONSTRAINT `students_id_manager_foreign` FOREIGN KEY (`id_manager`) REFERENCES `managers` (`idmanager`),
  CONSTRAINT `students_id_parallel_foreign` FOREIGN KEY (`id_parallel`) REFERENCES `parallels` (`idparallel`),
  CONSTRAINT `students_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.students: ~0 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table db_colegio.student_fees
CREATE TABLE IF NOT EXISTS `student_fees` (
  `idstudent_fee` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_student` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idstudent_fee`),
  KEY `student_fees_id_student_foreign` (`id_student`),
  CONSTRAINT `student_fees_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`idstudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.student_fees: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_fees` ENABLE KEYS */;

-- Dumping structure for table db_colegio.student_payments
CREATE TABLE IF NOT EXISTS `student_payments` (
  `idstudent_payment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_student_fee` int(10) unsigned NOT NULL,
  `id_payment` int(10) unsigned NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idstudent_payment`),
  KEY `student_payments_id_student_fee_foreign` (`id_student_fee`),
  KEY `student_payments_id_payment_foreign` (`id_payment`),
  CONSTRAINT `student_payments_id_payment_foreign` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`idpayment`),
  CONSTRAINT `student_payments_id_student_fee_foreign` FOREIGN KEY (`id_student_fee`) REFERENCES `student_fees` (`idstudent_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.student_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_payments` ENABLE KEYS */;

-- Dumping structure for table db_colegio.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `idsubject` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsubject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.subjects: ~0 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table db_colegio.subject_details
CREATE TABLE IF NOT EXISTS `subject_details` (
  `idsubject_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_degree` int(10) unsigned NOT NULL,
  `id_subject` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsubject_detail`),
  KEY `subject_details_id_degree_foreign` (`id_degree`),
  KEY `subject_details_id_subject_foreign` (`id_subject`),
  CONSTRAINT `subject_details_id_degree_foreign` FOREIGN KEY (`id_degree`) REFERENCES `degrees` (`iddegree`),
  CONSTRAINT `subject_details_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`idsubject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.subject_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `subject_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_details` ENABLE KEYS */;

-- Dumping structure for table db_colegio.subject_student_details
CREATE TABLE IF NOT EXISTS `subject_student_details` (
  `idsubject_student_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_student` int(10) unsigned NOT NULL,
  `id_subject_detail` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsubject_student_detail`),
  KEY `subject_student_details_id_student_foreign` (`id_student`),
  KEY `subject_student_details_id_subject_detail_foreign` (`id_subject_detail`),
  CONSTRAINT `subject_student_details_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `students` (`idstudent`),
  CONSTRAINT `subject_student_details_id_subject_detail_foreign` FOREIGN KEY (`id_subject_detail`) REFERENCES `subject_details` (`idsubject_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.subject_student_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `subject_student_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_student_details` ENABLE KEYS */;

-- Dumping structure for table db_colegio.subject_teacher_details
CREATE TABLE IF NOT EXISTS `subject_teacher_details` (
  `idsubject_teacher_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_teacher` int(10) unsigned NOT NULL,
  `id_subject_detail` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idsubject_teacher_detail`),
  KEY `subject_teacher_details_id_teacher_foreign` (`id_teacher`),
  KEY `subject_teacher_details_id_subject_detail_foreign` (`id_subject_detail`),
  CONSTRAINT `subject_teacher_details_id_subject_detail_foreign` FOREIGN KEY (`id_subject_detail`) REFERENCES `subject_details` (`idsubject_detail`),
  CONSTRAINT `subject_teacher_details_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`idteacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.subject_teacher_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `subject_teacher_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_teacher_details` ENABLE KEYS */;

-- Dumping structure for table db_colegio.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `idteacher` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `specialty` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_item` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idteacher`),
  KEY `teachers_id_user_foreign` (`id_user`),
  CONSTRAINT `teachers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.teachers: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
REPLACE INTO `teachers` (`idteacher`, `id_user`, `specialty`, `num_item`, `cv`, `created_at`, `updated_at`) VALUES
	(1, 4, 'Lenguaje', '65465', 'roles XP.png', '2019-06-18 10:49:38', '2019-06-18 10:49:38'),
	(2, 5, 'Fisica', '5645', 'redes 1 al 5 g.jpg', '2019-06-18 10:50:46', '2019-06-18 10:50:46'),
	(3, 7, 'Matematica', '654654', 'fase.gif', '2019-06-18 19:05:28', '2019-06-18 19:05:28');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table db_colegio.type_classrooms
CREATE TABLE IF NOT EXISTS `type_classrooms` (
  `idtype_classroom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtype_classroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.type_classrooms: ~0 rows (approximately)
/*!40000 ALTER TABLE `type_classrooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_classrooms` ENABLE KEYS */;

-- Dumping structure for table db_colegio.type_contracts
CREATE TABLE IF NOT EXISTS `type_contracts` (
  `idtype_contract` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtype_contract`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.type_contracts: ~2 rows (approximately)
/*!40000 ALTER TABLE `type_contracts` DISABLE KEYS */;
REPLACE INTO `type_contracts` (`idtype_contract`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Mensual', NULL, NULL),
	(2, 'Por horas', NULL, NULL);
/*!40000 ALTER TABLE `type_contracts` ENABLE KEYS */;

-- Dumping structure for table db_colegio.users
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paternal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maternal` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `estate` tinyint(1) NOT NULL DEFAULT '1',
  `total_attempts` int(11) NOT NULL DEFAULT '0',
  `lock_date` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_ci_unique` (`ci`),
  KEY `users_id_rol_foreign` (`id_rol`),
  CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_colegio.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`iduser`, `id_rol`, `name`, `paternal`, `maternal`, `gender`, `address`, `email`, `ci`, `cellphone`, `attempts`, `estate`, `total_attempts`, `lock_date`, `email_verified_at`, `password`, `remember_token`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Deynar', 'Mamani', 'Tangara', 'Masculino', 'Calle: Gregorio Garcia Lanza', 'deynaradirmt@gmail.com', '77577556', '75273121', 0, 1, 0, NULL, NULL, '$2y$10$pMWbZXoOz3v85ctOnemM2.KzazsmyQUp6CQdBYuufTaWK7DVvnz8u', NULL, NULL, '2019-06-18 09:53:47', '2019-06-18 09:53:47'),
	(2, 1, 'a', 'Mof', 'Mirans', 'Masculino', 'Calle: Gregorio ', 'ronald@gmail.com', '1346', '75273121', 0, 1, 0, NULL, NULL, '$2y$10$so5SfTDp4Z/iKiNPSNc2h.oGYNHlY2RefHkJstDGVkXtxkW1eezR2', NULL, NULL, '2019-06-18 09:53:48', '2019-06-18 09:53:48'),
	(3, 6, 'Maria', 'Rojas', 'saire', 'Femenino', 'z c aadasd n', 'maria@gmail.com', '1234659', '65498456', 0, 1, 0, NULL, NULL, '$2y$10$Le2.4g3ef8FE/AdhZ0SOZ.UTKLQfvNweIbBRFmQJBGa.ohwWEz32K', NULL, NULL, '2019-06-18 10:48:26', '2019-06-18 10:48:26'),
	(4, 3, 'Jose', 'Jimenez', 'Castillo', 'Masculino', 'z Rio Seco', 'jose@gmail.com', '65498745', '6549875', 0, 1, 0, NULL, NULL, '$2y$10$FDkZBc/a372tsxBuiF4n/OreOvnJgAIuZCPhnTgobt/Bi/8wD3Nt.', NULL, NULL, '2019-06-18 10:49:38', '2019-06-18 10:49:38'),
	(5, 3, 'Efrain', 'Sinka', 'Miranda', 'Masculino', 'z San Luis c Hola n 2333', 'efrain@gmail.com', '65897845', '46549879', 0, 1, 0, NULL, NULL, '$2y$10$2GH5cJi1C1XUL8hEsZpE/Ora8QZzRd7FGQFvYgZjX9xoOe..HHEMS', NULL, NULL, '2019-06-18 10:50:46', '2019-06-18 10:50:46'),
	(6, 7, 'Carlos Tercero', 'Mendoza', 'Mejia', 'Masculino', 'Z zona c Calle n54', 'carlos@gmail.com', '65498456', '654321', 0, 1, 0, NULL, NULL, '$2y$10$Bvy3WNTNg0/6ZjfIfP/.z.yEDE.dwrOThbJiaXvSi750EH11ackmC', NULL, '9879546', '2019-06-18 10:51:40', '2019-06-18 12:00:34'),
	(7, 3, 'Brian', 'Caceres', 'Mendoza', 'Masculino', 'z Villa Adela', 'brian@gmail.com', '12365498', '9898464', 0, 1, 0, NULL, NULL, '$2y$10$lpQc8vpI8IlpHKOF8zl5Q.4MJY6pBvrzfCmk50gAMBSaYXwNX7P5S', NULL, '6549898465', '2019-06-18 19:05:28', '2019-06-18 19:05:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
