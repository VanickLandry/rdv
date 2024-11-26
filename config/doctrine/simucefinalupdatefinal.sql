-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2014 at 06:32 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simucefinal`
--
CREATE DATABASE IF NOT EXISTS `simucefinal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simucefinal`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `nom` varchar(255) NOT NULL,
  `numtel` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `percent` decimal(18,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `is_active`, `nom`, `numtel`, `description`, `percent`, `created_at`, `updated_at`) VALUES
(1, 1, 'eee', '444', 'fdfdsfdsfdsfdsfd', '55.00', '2014-10-22 18:28:35', '2014-10-22 18:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `crdmgr_agency`
--

CREATE TABLE IF NOT EXISTS `crdmgr_agency` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `code_agence` varchar(100) NOT NULL,
  `nom_agence` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `lieu_localisation_code` varchar(100) NOT NULL,
  `institution_id` bigint(20) NOT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_agence` (`code_agence`),
  KEY `lieu_localisation_code_idx` (`lieu_localisation_code`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crdmgr_client`
--

CREATE TABLE IF NOT EXISTS `crdmgr_client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `code_client` varchar(100) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `secteuractivite` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lieu_localisation_code` varchar(100) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_client` (`code_client`),
  KEY `lieu_localisation_code_idx` (`lieu_localisation_code`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `crdmgr_parameter`
--

CREATE TABLE IF NOT EXISTS `crdmgr_parameter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `type_parametre` varchar(100) NOT NULL,
  `code_parametre` varchar(100) NOT NULL,
  `label_param` varchar(150) NOT NULL,
  `valeur_string` decimal(18,2) NOT NULL,
  `valeur_numeric` decimal(18,2) NOT NULL DEFAULT '0.00',
  `description_param` varchar(150) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_parametre` (`code_parametre`),
  KEY `code_parametre_idx` (`code_parametre`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `crdmgr_parameter`
--

INSERT INTO `crdmgr_parameter` (`id`, `is_active`, `type_parametre`, `code_parametre`, `label_param`, `valeur_string`, `valeur_numeric`, `description_param`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'rais_bas', 'rais_bas', 'rais_bas', '16000.00', '580.00', 'rais_bas', 1, 2, '2014-10-04 04:53:38', '2014-10-04 09:04:51'),
(2, 1, 'rais_haut', 'rais_haut', 'rais_haut', '17000.00', '580.00', 'rais_haut', 1, 2, '2014-10-04 04:53:38', '2014-10-04 09:05:45'),
(3, 1, 'hauteur_couvre_joint', 'hauteur_couvre_joint', 'hauteur_couvre_joint', '4000.00', '580.00', 'hauteur_couvre_joint', 1, 2, '2014-10-04 04:53:38', '2014-10-04 09:08:10'),
(4, 1, 'largeur_couvre_joint', 'largeur_couvre_joint', 'largeur_couvre_joint', '40000.00', '580.00', 'largeur_couvre_joint', 1, 1, '2014-10-04 04:53:38', '2014-10-04 04:53:38'),
(5, 1, 'hauteur_couvre_joint_un', 'hauteur_couvre_joint_un', 'hauteur_couvre_joint_un', '40000.00', '580.00', 'hauteur_couvre_joint_un', 1, 1, '2014-10-04 04:53:38', '2014-10-04 04:53:38'),
(6, 1, 'largeur_couvre_joint_un', 'largeur_couvre_joint_un', 'largeur_couvre_joint_un', '40000.00', '580.00', 'largeur_couvre_joint_un', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(7, 1, 'hauteur_couvre_joint_deux', 'hauteur_couvre_joint_deux', 'hauteur_couvre_joint_deux', '40000.00', '580.00', 'hauteur_couvre_joint_deux', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(8, 1, 'largeur_couvre_joint_deux', 'largeur_couvre_joint_deux', 'largeur_couvre_joint_deux', '40000.00', '580.00', 'largeur_couvre_joint_deux', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(9, 1, 'dormant', 'dormant', 'dormant', '12000.00', '580.00', 'c', 1, 2, '2014-10-04 04:53:39', '2014-10-04 09:07:07'),
(10, 1, 'sernie', 'sernie', 'serrure', '10000.00', '580.00', 'sernie', 1, 2, '2014-10-04 04:53:39', '2014-10-04 09:04:00'),
(11, 1, 'chicone', 'chicone', 'chicone', '11000.00', '580.00', 'chicone', 1, 2, '2014-10-04 04:53:39', '2014-10-04 09:14:29'),
(12, 1, 'traverse', 'traverse', 'traverse', '11000.00', '580.00', 'traverse', 1, 2, '2014-10-04 04:53:39', '2014-10-04 09:15:09'),
(13, 1, 'vitre', 'vitre', 'vitre', '10000.00', '1.00', 'vitre', 1, 2, '2014-10-04 04:53:39', '2014-10-14 15:23:27'),
(14, 1, 'accessoire', 'Equerres', 'Equerres port', '4.00', '7000.00', 'accessoire', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(15, 1, 'accessoire', 'pommelles', 'pommelles', '2.00', '5000.00', 'accessoire', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(16, 1, 'accessoire', 'Serrure', 'Serrure complet', '1.00', '1000.00', 'accessoire', 1, 1, '2014-10-04 04:53:39', '2014-10-04 04:53:39'),
(17, 1, 'largeur_dormant', 'largeur_dormant', 'largeur_dormant', '11000.00', '580.00', 'largeur_dormant', 1, 2, '2014-10-04 04:53:39', '2014-10-04 09:16:06'),
(18, 1, 'hauteur_dormant', 'hauteur_dormant', 'hauteur_dormant', '11000.00', '580.00', 'hauteur_dormant', 1, 2, '2014-10-04 04:53:40', '2014-10-04 09:16:47'),
(19, 1, 'hauteur_parclose30', 'hauteur_parclose30', 'hauteur_parclose30', '10000.00', '580.00', 'hauteur_parclose30', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(20, 1, 'largeur_parclose30', 'largeur_parclose30', 'largeur_parclose30', '10000.00', '580.00', 'largeur_parclose30', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(21, 1, 'hauteur_zporte', 'hauteur_zporte', 'hauteur_zporte', '10000.00', '580.00', 'hauteur_zporte', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(22, 1, 'largeur_zporte', 'largeur_zporte', 'largeur_zporte', '10000.00', '580.00', 'largeur_zporte', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(23, 1, 'traverse140', 'traverse140', 'traverse140', '10000.00', '580.00', 'traverse140', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(24, 1, 'ljb', 'ljb', 'largeur_joint_bourrage', '10000.00', '580.00', 'ljb', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40'),
(25, 1, 'hjb', 'hjb', 'hauteur_joint_bourrage', '10000.00', '580.00', 'hjb', 1, 1, '2014-10-04 04:53:40', '2014-10-04 04:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `crdmgr_user_agency`
--

CREATE TABLE IF NOT EXISTS `crdmgr_user_agency` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `agence_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `agence_id_idx` (`agence_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `largeur` decimal(18,2) NOT NULL,
  `hauteur` decimal(18,2) NOT NULL,
  `type` decimal(18,2) NOT NULL,
  `prix` decimal(18,2) NOT NULL,
  `codetype` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estim`
--

CREATE TABLE IF NOT EXISTS `estim` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `largeur` decimal(18,2) NOT NULL,
  `hauteur` decimal(18,2) NOT NULL,
  `nombre_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `estimation`
--

CREATE TABLE IF NOT EXISTS `estimation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `length` decimal(18,2) NOT NULL,
  `width` decimal(18,2) DEFAULT NULL,
  `percent` decimal(18,2) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `glassprice_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `glassprice_id_idx` (`glassprice_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `glass_price`
--

CREATE TABLE IF NOT EXISTS `glass_price` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `label` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rd_detail_mirroir`
--

CREATE TABLE IF NOT EXISTS `rd_detail_mirroir` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mirroir_id` bigint(20) NOT NULL,
  `largeur_min` decimal(18,2) NOT NULL DEFAULT '1.00',
  `hauteur_min` decimal(18,2) NOT NULL DEFAULT '1.00',
  `rais_bas` decimal(18,2) NOT NULL,
  `rais_haut` decimal(18,2) NOT NULL,
  `dormant` decimal(18,2) NOT NULL,
  `hauteur_couvre_joint` decimal(18,2) NOT NULL,
  `largeur_couvre_joint` decimal(18,2) NOT NULL,
  `sernie` decimal(18,2) NOT NULL,
  `chicone` decimal(18,2) NOT NULL,
  `traverse` decimal(18,2) NOT NULL,
  `largeur_vitre` decimal(18,2) NOT NULL DEFAULT '0.00',
  `hauteur_vitre` decimal(18,2) NOT NULL DEFAULT '0.00',
  `hauteur_dormant` decimal(18,2) NOT NULL DEFAULT '0.00',
  `largeur_dormant` decimal(18,2) NOT NULL DEFAULT '0.00',
  `hauteur_parclose30` decimal(18,2) NOT NULL DEFAULT '0.00',
  `largeur_parclose30` decimal(18,2) NOT NULL DEFAULT '0.00',
  `hauteur_zporte` decimal(18,2) NOT NULL DEFAULT '0.00',
  `largeur_zporte` decimal(18,2) NOT NULL DEFAULT '0.00',
  `traverse140` decimal(18,2) NOT NULL DEFAULT '0.00',
  `hauteur_cadre` decimal(18,2) NOT NULL DEFAULT '0.00',
  `largeur_cadre` decimal(18,2) NOT NULL DEFAULT '0.00',
  `ljb` decimal(18,2) NOT NULL,
  `hjb` decimal(18,2) NOT NULL,
  `quantite` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mirroir_id_idx` (`mirroir_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6398 ;

--
-- Dumping data for table `rd_detail_mirroir`
--

INSERT INTO `rd_detail_mirroir` (`id`, `mirroir_id`, `largeur_min`, `hauteur_min`, `rais_bas`, `rais_haut`, `dormant`, `hauteur_couvre_joint`, `largeur_couvre_joint`, `sernie`, `chicone`, `traverse`, `largeur_vitre`, `hauteur_vitre`, `hauteur_dormant`, `largeur_dormant`, `hauteur_parclose30`, `largeur_parclose30`, `hauteur_zporte`, `largeur_zporte`, `traverse140`, `hauteur_cadre`, `largeur_cadre`, `ljb`, `hjb`, `quantite`, `created_at`, `updated_at`) VALUES
(6397, 54, '1.00', '1.00', '-1.20', '-1.20', '1.00', '11.00', '11.00', '-4.50', '-4.50', '-0.60', '-6.50', '-14.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2014-10-22 18:29:09', '2014-10-22 18:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `rd_facture`
--

CREATE TABLE IF NOT EXISTS `rd_facture` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detailmirroir_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detailmirroir_id_idx` (`detailmirroir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rd_mirroir`
--

CREATE TABLE IF NOT EXISTS `rd_mirroir` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `largeur` decimal(18,2) NOT NULL,
  `hauteur` decimal(18,2) NOT NULL,
  `nombre_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `rd_mirroir`
--

INSERT INTO `rd_mirroir` (`id`, `is_active`, `largeur`, `hauteur`, `nombre_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0.00', '0.00', 0, '2014-10-14 10:15:16', '2014-10-14 10:15:16'),
(2, 1, '0.00', '0.00', 0, '2014-10-14 10:16:18', '2014-10-14 10:16:18'),
(3, 1, '0.00', '0.00', 0, '2014-10-14 10:35:28', '2014-10-14 10:35:28'),
(4, 1, '0.00', '0.00', 0, '2014-10-14 10:47:24', '2014-10-14 10:47:24'),
(5, 1, '0.00', '0.00', 0, '2014-10-14 12:33:53', '2014-10-14 12:33:53'),
(6, 1, '0.00', '0.00', 0, '2014-10-14 13:21:53', '2014-10-14 13:21:53'),
(7, 1, '0.00', '0.00', 0, '2014-10-14 14:29:21', '2014-10-14 14:29:21'),
(8, 1, '0.00', '0.00', 0, '2014-10-14 14:55:11', '2014-10-14 14:55:11'),
(9, 1, '0.00', '0.00', 0, '2014-10-14 14:56:21', '2014-10-14 14:56:21'),
(10, 1, '0.00', '0.00', 0, '2014-10-14 15:18:47', '2014-10-14 15:18:47'),
(11, 1, '0.00', '0.00', 0, '2014-10-14 15:19:07', '2014-10-14 15:19:07'),
(12, 1, '0.00', '0.00', 0, '2014-10-14 15:20:42', '2014-10-14 15:20:42'),
(13, 1, '0.00', '0.00', 0, '2014-10-14 15:21:23', '2014-10-14 15:21:23'),
(14, 1, '0.00', '0.00', 0, '2014-10-14 15:23:48', '2014-10-14 15:23:48'),
(15, 1, '0.00', '0.00', 0, '2014-10-14 15:24:46', '2014-10-14 15:24:46'),
(16, 1, '0.00', '0.00', 0, '2014-10-14 15:39:54', '2014-10-14 15:39:54'),
(17, 1, '0.00', '0.00', 0, '2014-10-14 15:40:31', '2014-10-14 15:40:31'),
(18, 1, '0.00', '0.00', 0, '2014-10-14 15:41:08', '2014-10-14 15:41:08'),
(19, 1, '0.00', '0.00', 0, '2014-10-14 15:41:29', '2014-10-14 15:41:29'),
(20, 1, '0.00', '0.00', 0, '2014-10-14 15:42:52', '2014-10-14 15:42:52'),
(21, 1, '0.00', '0.00', 0, '2014-10-14 15:45:21', '2014-10-14 15:45:21'),
(22, 1, '0.00', '0.00', 0, '2014-10-14 15:47:50', '2014-10-14 15:47:50'),
(23, 1, '0.00', '0.00', 0, '2014-10-14 15:51:59', '2014-10-14 15:51:59'),
(24, 1, '0.00', '0.00', 0, '2014-10-14 15:56:47', '2014-10-14 15:56:47'),
(25, 1, '0.00', '0.00', 0, '2014-10-14 16:02:11', '2014-10-14 16:02:11'),
(26, 1, '0.00', '0.00', 0, '2014-10-14 16:03:07', '2014-10-14 16:03:07'),
(27, 1, '0.00', '0.00', 0, '2014-10-14 16:17:26', '2014-10-14 16:17:26'),
(28, 1, '0.00', '0.00', 0, '2014-10-14 16:24:25', '2014-10-14 16:24:25'),
(29, 1, '0.00', '0.00', 0, '2014-10-14 16:24:53', '2014-10-14 16:24:53'),
(30, 1, '0.00', '0.00', 0, '2014-10-14 16:28:12', '2014-10-14 16:28:12'),
(31, 1, '0.00', '0.00', 0, '2014-10-14 16:29:48', '2014-10-14 16:29:48'),
(32, 1, '0.00', '0.00', 0, '2014-10-14 16:30:49', '2014-10-14 16:30:49'),
(33, 1, '0.00', '0.00', 0, '2014-10-14 16:31:57', '2014-10-14 16:31:57'),
(34, 1, '0.00', '0.00', 0, '2014-10-14 17:30:03', '2014-10-14 17:30:03'),
(35, 1, '0.00', '0.00', 0, '2014-10-14 17:30:58', '2014-10-14 17:30:58'),
(36, 1, '0.00', '0.00', 0, '2014-10-14 17:32:01', '2014-10-14 17:32:01'),
(37, 1, '0.00', '0.00', 0, '2014-10-14 17:38:14', '2014-10-14 17:38:14'),
(38, 1, '0.00', '0.00', 0, '2014-10-18 14:15:19', '2014-10-18 14:15:19'),
(39, 1, '0.00', '0.00', 0, '2014-10-18 14:43:52', '2014-10-18 14:43:52'),
(40, 1, '0.00', '0.00', 0, '2014-10-21 09:35:00', '2014-10-21 09:35:00'),
(41, 1, '0.00', '0.00', 0, '2014-10-22 15:44:59', '2014-10-22 15:44:59'),
(42, 1, '0.00', '0.00', 0, '2014-10-22 16:17:42', '2014-10-22 16:17:42'),
(43, 1, '0.00', '0.00', 0, '2014-10-22 16:18:50', '2014-10-22 16:18:50'),
(44, 1, '0.00', '0.00', 0, '2014-10-22 16:20:09', '2014-10-22 16:20:09'),
(45, 1, '0.00', '0.00', 0, '2014-10-22 16:24:29', '2014-10-22 16:24:29'),
(46, 1, '0.00', '0.00', 0, '2014-10-22 16:25:43', '2014-10-22 16:25:43'),
(47, 1, '0.00', '0.00', 0, '2014-10-22 16:48:18', '2014-10-22 16:48:18'),
(48, 1, '0.00', '0.00', 0, '2014-10-22 17:01:43', '2014-10-22 17:01:43'),
(49, 1, '0.00', '0.00', 0, '2014-10-22 17:09:06', '2014-10-22 17:09:06'),
(50, 1, '0.00', '0.00', 0, '2014-10-22 17:30:14', '2014-10-22 17:30:14'),
(51, 1, '0.00', '0.00', 0, '2014-10-22 17:52:38', '2014-10-22 17:52:38'),
(52, 1, '0.00', '0.00', 0, '2014-10-22 18:00:53', '2014-10-22 18:00:53'),
(53, 1, '0.00', '0.00', 0, '2014-10-22 18:08:19', '2014-10-22 18:08:19'),
(54, 1, '0.00', '0.00', 0, '2014-10-22 18:28:10', '2014-10-22 18:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrateurs', 'Groupe administrateurs', '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(2, 'Saar-vie - Assureurs', 'groupe Assureurs de Saar-vie', '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(3, 'Gestionnaires clients banque', 'Groupe des gestionnaires de clients de banque', '2014-10-14 08:11:38', '2014-10-14 08:11:38'),
(4, 'Saar-vie - Master Operator', 'Saar-vie - Operateur a pouvoir', '2014-10-14 08:11:38', '2014-10-14 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(2, 2, '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(3, 3, '2014-10-14 08:11:38', '2014-10-14 08:11:38'),
(4, 4, '2014-10-14 08:11:38', '2014-10-14 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', 'Administrator permission', '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(2, 'assureur', 'Permission assureur', '2014-10-14 08:11:37', '2014-10-14 08:11:37'),
(3, 'bank_operator', 'Permission gestionnaire de clients de banque', '2014-10-14 08:11:38', '2014-10-14 08:11:38'),
(4, 'master_operator', 'Operateur a pouvoir', '2014-10-14 08:11:38', '2014-10-14 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Verra', 'Cruz', 'admin@admin.com', 'admin', 'sha1', 'ead5c9cad51f5db7d94cc94d625a0ada', '24efcb6c4ccad4467f360e5b0e5db8321f277b55', 1, 0, NULL, '2014-10-14 08:11:39', '2014-10-14 08:11:39'),
(2, 'John', 'Doe', 'john.doe@saarvie.com', 'vitre', 'sha1', 'aacf10a18ad6174629558726d3f07f66', '58fe914ff2afca11307c13e9443fd296f9baa40c', 1, 0, '2014-10-22 18:01:54', '2014-10-14 08:11:39', '2014-10-22 18:01:54'),
(3, 'Achille', 'Tchapi', 'tchac@saarvie.com', 'tchac', 'sha1', '665ed3f5db3f150a841fc664b035a9ca', '24864b7e9e6b4a7f180ec4001e7646cb2e7c59bc', 1, 0, NULL, '2014-10-14 08:11:39', '2014-10-14 08:11:39'),
(4, 'Lucy', 'Loo1', 'lucy.loo@ecobank.com', 'lucy.loo', 'sha1', '0b65f68f9edb8b03c5b4759ceac009ff', 'b88c8c7587394dcc1ad178c0b93734fadf83df43', 1, 0, NULL, '2014-10-14 08:11:39', '2014-10-14 08:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-10-14 08:11:39', '2014-10-14 08:11:39'),
(2, 2, '2014-10-14 08:11:39', '2014-10-14 08:11:39'),
(3, 4, '2014-10-14 08:11:39', '2014-10-14 08:11:39'),
(4, 3, '2014-10-14 08:11:39', '2014-10-14 08:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crdmgr_agency`
--
ALTER TABLE `crdmgr_agency`
  ADD CONSTRAINT `clcc` FOREIGN KEY (`lieu_localisation_code`) REFERENCES `crdmgr_parameter` (`code_parametre`),
  ADD CONSTRAINT `crdmgr_agency_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `crdmgr_agency_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `crdmgr_client`
--
ALTER TABLE `crdmgr_client`
  ADD CONSTRAINT `clcc_1` FOREIGN KEY (`lieu_localisation_code`) REFERENCES `crdmgr_parameter` (`code_parametre`),
  ADD CONSTRAINT `crdmgr_client_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `crdmgr_client_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `crdmgr_parameter`
--
ALTER TABLE `crdmgr_parameter`
  ADD CONSTRAINT `crdmgr_parameter_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `crdmgr_parameter_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `crdmgr_user_agency`
--
ALTER TABLE `crdmgr_user_agency`
  ADD CONSTRAINT `crdmgr_user_agency_agence_id_crdmgr_agency_id` FOREIGN KEY (`agence_id`) REFERENCES `crdmgr_agency` (`id`),
  ADD CONSTRAINT `crdmgr_user_agency_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `crdmgr_user_agency_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `crdmgr_user_agency_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `estimation`
--
ALTER TABLE `estimation`
  ADD CONSTRAINT `estimation_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `estimation_glassprice_id_glass_price_id` FOREIGN KEY (`glassprice_id`) REFERENCES `glass_price` (`id`),
  ADD CONSTRAINT `estimation_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `glass_price`
--
ALTER TABLE `glass_price`
  ADD CONSTRAINT `glass_price_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `glass_price_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `rd_detail_mirroir`
--
ALTER TABLE `rd_detail_mirroir`
  ADD CONSTRAINT `rd_detail_mirroir_mirroir_id_rd_mirroir_id` FOREIGN KEY (`mirroir_id`) REFERENCES `rd_mirroir` (`id`);

--
-- Constraints for table `rd_facture`
--
ALTER TABLE `rd_facture`
  ADD CONSTRAINT `rd_facture_detailmirroir_id_rd_detail_mirroir_id` FOREIGN KEY (`detailmirroir_id`) REFERENCES `rd_detail_mirroir` (`id`);

--
-- Constraints for table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
