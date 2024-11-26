-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2014 at 06:16 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simucefinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `nom` varchar(255) NOT NULL,
  `numtel` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `client`
--


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

--
-- Dumping data for table `crdmgr_agency`
--


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

--
-- Dumping data for table `crdmgr_client`
--


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
(1, 1, 'rais_bas', 'rais_bas', 'rais_bas', '10000.00', '580.00', 'rais_bas', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(2, 1, 'rais_haut', 'rais_haut', 'rais_haut', '20000.00', '580.00', 'rais_haut', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(3, 1, 'hauteur_couvre_joint', 'hauteur_couvre_joint', 'hauteur_couvre_joint', '40000.00', '580.00', 'hauteur_couvre_joint', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(4, 1, 'largeur_couvre_joint', 'largeur_couvre_joint', 'largeur_couvre_joint', '40000.00', '580.00', 'largeur_couvre_joint', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(5, 1, 'hauteur_couvre_joint_un', 'hauteur_couvre_joint_un', 'hauteur_couvre_joint_un', '40000.00', '580.00', 'hauteur_couvre_joint_un', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(6, 1, 'largeur_couvre_joint_un', 'largeur_couvre_joint_un', 'largeur_couvre_joint_un', '40000.00', '580.00', 'largeur_couvre_joint_un', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(7, 1, 'hauteur_couvre_joint_deux', 'hauteur_couvre_joint_deux', 'hauteur_couvre_joint_deux', '40000.00', '580.00', 'hauteur_couvre_joint_deux', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(8, 1, 'largeur_couvre_joint_deux', 'largeur_couvre_joint_deux', 'largeur_couvre_joint_deux', '40000.00', '580.00', 'largeur_couvre_joint_deux', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(9, 1, 'dormant', 'dormant', 'dormant', '40000.00', '580.00', 'c', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(10, 1, 'sernie', 'sernie', 'sernie', '50000.00', '580.00', 'sernie', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(11, 1, 'chicone', 'chicone', 'chicone', '60000.00', '580.00', 'chicone', 1, 1, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(12, 1, 'traverse', 'traverse', 'traverse', '70000.00', '580.00', 'traverse', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(13, 1, 'vitre', 'vitre', 'vitre', '80000.00', '580.00', 'vitre', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(14, 1, 'accessoire', 'Equerres', 'Equerres port', '4.00', '7000.00', 'accessoire', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(15, 1, 'accessoire', 'pommelles', 'pommelles', '2.00', '5000.00', 'accessoire', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(16, 1, 'accessoire', 'Serrure', 'Serrure complet', '1.00', '1000.00', 'accessoire', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(17, 1, 'largeur_dormant', 'largeur_dormant', 'largeur_dormant', '10000.00', '580.00', 'largeur_dormant', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(18, 1, 'hauteur_dormant', 'hauteur_dormant', 'hauteur_dormant', '10000.00', '580.00', 'hauteur_dormant', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(19, 1, 'hauteur_parclose30', 'hauteur_parclose30', 'hauteur_parclose30', '10000.00', '580.00', 'hauteur_parclose30', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(20, 1, 'largeur_parclose30', 'largeur_parclose30', 'largeur_parclose30', '10000.00', '580.00', 'largeur_parclose30', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(21, 1, 'hauteur_zporte', 'hauteur_zporte', 'hauteur_zporte', '10000.00', '580.00', 'hauteur_zporte', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(22, 1, 'largeur_zporte', 'largeur_zporte', 'largeur_zporte', '10000.00', '580.00', 'largeur_zporte', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(23, 1, 'traverse140', 'traverse140', 'traverse140', '10000.00', '580.00', 'traverse140', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(24, 1, 'ljb', 'ljb', 'largeur_joint_bourrage', '10000.00', '580.00', 'ljb', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48'),
(25, 1, 'hjb', 'hjb', 'hauteur_joint_bourrage', '10000.00', '580.00', 'hjb', 1, 1, '2014-09-09 18:09:48', '2014-09-09 18:09:48');

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

--
-- Dumping data for table `crdmgr_user_agency`
--


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

--
-- Dumping data for table `devis`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `estim`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `estimation`
--


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

--
-- Dumping data for table `glass_price`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rd_detail_mirroir`
--


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

--
-- Dumping data for table `rd_facture`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rd_mirroir`
--


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

--
-- Dumping data for table `sf_guard_forgot_password`
--


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
(1, 'Administrateurs', 'Groupe administrateurs', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(2, 'Saar-vie - Assureurs', 'groupe Assureurs de Saar-vie', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(3, 'Gestionnaires clients banque', 'Groupe des gestionnaires de clients de banque', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(4, 'Saar-vie - Master Operator', 'Saar-vie - Operateur a pouvoir', '2014-09-09 18:09:46', '2014-09-09 18:09:46');

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
(1, 1, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(2, 2, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(3, 3, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(4, 4, '2014-09-09 18:09:46', '2014-09-09 18:09:46');

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
(1, 'administrateur', 'Administrator permission', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(2, 'assureur', 'Permission assureur', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(3, 'bank_operator', 'Permission gestionnaire de clients de banque', '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(4, 'master_operator', 'Operateur a pouvoir', '2014-09-09 18:09:46', '2014-09-09 18:09:46');

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

--
-- Dumping data for table `sf_guard_remember_key`
--


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
(1, 'Verra', 'Cruz', 'admin@admin.com', 'admin', 'sha1', '3dbaab5d1445dfc608b8b32fe13cebbd', '7cf6b5fd489f655441f76d8831b9606ad9fe640f', 1, 0, NULL, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(2, 'John', 'Doe', 'john.doe@saarvie.com', 'vitre', 'sha1', '7b85f95f6c6274f764ab117dc7be360e', 'fcc8dc3c37db3c22087d0385cb03164a8965d6fd', 1, 0, NULL, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(3, 'Achille', 'Tchapi', 'tchac@saarvie.com', 'tchac', 'sha1', 'e01646e0f573341a16953a4d1f3d6b5f', '525887e70503e9bb5f915a63cb1f6a005c3d33e8', 1, 0, NULL, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(4, 'Lucy', 'Loo1', 'lucy.loo@ecobank.com', 'lucy.loo', 'sha1', '8a299f533db221c73481fe90e46ad16f', '370878629edff064b2a613f35a18da6645e6b1ac', 1, 0, NULL, '2014-09-09 18:09:47', '2014-09-09 18:09:47');

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
(1, 1, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(2, 2, '2014-09-09 18:09:46', '2014-09-09 18:09:46'),
(3, 4, '2014-09-09 18:09:47', '2014-09-09 18:09:47'),
(4, 3, '2014-09-09 18:09:47', '2014-09-09 18:09:47');

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
-- Dumping data for table `sf_guard_user_permission`
--


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
