-- phpMyAdmin SQL Dump
-- version 3.3.5
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 12 Janvier 2011 à 03:45
-- Version du serveur: 5.1.49
-- Version de PHP: 5.3.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dbs_online_credit_mng`
--

--
-- Contenu de la table `crdmgr_agency`
--

INSERT INTO `crdmgr_agency` (`id`, `is_active`, `code_agence`, `nom_agence`, `adresse`, `lieu_localisation_code`, `min_prime_consentement`, `taux_consentement`, `taux_insolvabilite`, `is_taux_base_ipt_apply`, `institution_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASS001001', 'Saar-Vie Direction Generale Douala', 'Bonanjo Douala', 'ville_douala', 0.00, 0.00, 0.00, 0, 1, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(2, 1, 'ASS001002', 'Saar-Vie Direction Commercial Douala', 'Bonanjo Douala', 'ville_douala', 0.00, 0.00, 0.00, 0, 1, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(3, 1, 'BNK001001', 'Eco Bank Direction Generale Douala', 'Akwa Douala', 'ville_douala', 0.00, 0.00, 0.00, 0, 2, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(4, 1, 'BNK001002', 'Eco Bank Agence Akwa', 'Akwa Douala', 'ville_douala', 0.00, 0.00, 0.00, 0, 2, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(5, 1, 'BNK001003', 'Eco Bank Agence Bonaberi', 'Bonaberi Douala', 'ville_douala', 0.00, 0.00, 0.00, 0, 2, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52');

--
-- Contenu de la table `crdmgr_bulletin_adhesion`
--

INSERT INTO `crdmgr_bulletin_adhesion` (`id`, `workflow_status_code`, `workflow_status_msg`, `workflow_status_msglog`, `code_bulletin_adhesion`, `code_police`, `customer_id`, `loan_type_code`, `main_amount`, `interest_amount`, `bank_acceptance_date`, `loan_duration_months_count`, `first_monthly_payment_date`, `assurance_end_date`, `validation_status_code`, `validation_status_reason`, `mortuary_base_rate`, `ipt_base_rate`, `mortuary_suprime_rate`, `ipt_suprime_rate`, `prime_amount_per_month`, `accessory_amount`, `other_amount`, `prime_type_code`, `total_prime_amount`, `agence_id`, `institution_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'workflow_status_waiting-insurance-validation', 'df', '', 'BA-001', 'P.005', 5, 'loan_type_asset_finance', 0.00, 0.00, '2010-01-01 00:00:00', 12, '2010-01-01 00:00:00', '2010-01-01 00:00:00', 'validation_status_normal-accept', 'df', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'prime_type_annually', 0.00, 1, 1, 1, 1, '2010-10-23 11:31:58', '2010-10-27 19:05:04'),
(2, 'workflow_status_waiting-insurance-validation', '250', '', '004', '004', 6, 'loan_type_asset_finance', 250.00, 250.00, '2010-01-01 00:00:00', 12, '2010-01-01 00:00:00', '2010-01-01 00:00:00', 'validation_status_normal-accept', '250', 250.00, 250.00, 250.00, 250.00, 250.00, 250.00, 250.00, 'prime_type_annually', 250.00, 1, 1, 1, 1, '2010-11-10 23:29:42', '2010-11-11 00:11:08');

--
-- Contenu de la table `crdmgr_bulletin_adhesion_detail`
--

INSERT INTO `crdmgr_bulletin_adhesion_detail` (`id`, `bulletin_adhesion_id`, `question_id`, `bool_answer`, `string_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 27, 1, 'precedent contrat d''assurtances ', '2010-10-23 11:32:00', '2010-10-23 17:49:01'),
(2, 1, 28, 0, 'assurance de personnes', '2010-10-23 11:32:00', '2010-10-23 17:49:01'),
(3, 1, 29, 1, 'locations des blessures', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(4, 1, 30, 0, 'amateur ou en competitio', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(5, 1, 31, 1, 'milieu hospitalier ou assimile', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(6, 1, 32, 0, '', '2010-10-23 11:32:01', '2010-10-23 11:32:01'),
(7, 1, 33, 1, 'un electrocardiogramme', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(8, 1, 34, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(9, 1, 35, 1, 'Toxoplasme, Hepatite B, SIDA', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(10, 1, 36, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(11, 1, 37, 1, 'arret de travail', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(12, 1, 38, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(13, 1, 39, 1, 'Toux de longue duree', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(14, 1, 40, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(15, 1, 41, 1, 'Jaunisse, Hepatite, Diarrhee chronique', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(16, 1, 42, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(17, 1, 43, 1, 'Paralysies, Meningite, Epilespsie', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(18, 1, 44, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(19, 1, 45, 1, 'des ganglions, et de la rate', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(20, 1, 46, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(21, 1, 47, 1, 'os et des articulations ', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(22, 1, 48, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(23, 1, 49, 1, '', '2010-10-23 11:32:01', '2010-10-23 11:32:01'),
(24, 1, 50, 0, '', '2010-10-23 11:32:01', '2010-10-23 17:49:01'),
(25, 1, 51, 1, '', '2010-10-23 11:32:01', '2010-10-23 11:32:01'),
(26, 1, 52, 1, '', '2010-10-23 11:32:01', '2010-10-23 11:32:01'),
(27, 1, 53, 1, '', '2010-10-23 11:32:01', '2010-10-23 11:32:01'),
(28, 1, 54, 0, 'raitement par perfusio', '2010-10-23 11:32:01', '2010-10-27 19:05:04'),
(29, 2, 27, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(30, 2, 28, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(31, 2, 29, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(32, 2, 30, 0, 'mateur ou en compe', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(33, 2, 31, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(34, 2, 32, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(35, 2, 33, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(36, 2, 34, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(37, 2, 35, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(38, 2, 36, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(39, 2, 37, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(40, 2, 38, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(41, 2, 39, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(42, 2, 40, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(43, 2, 41, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(44, 2, 42, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(45, 2, 43, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(46, 2, 44, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(47, 2, 45, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(48, 2, 46, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(49, 2, 47, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(50, 2, 48, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(51, 2, 49, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(52, 2, 50, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(53, 2, 51, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(54, 2, 52, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(55, 2, 53, 0, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42'),
(56, 2, 54, 1, '', '2010-11-10 23:29:42', '2010-11-10 23:29:42');

--
-- Contenu de la table `crdmgr_customer`
--

INSERT INTO `crdmgr_customer` (`id`, `is_active`, `code_client`, `nom`, `prenom`, `titre_code`, `date_naissance`, `lieu_naissance_code`, `sexe_code`, `statut_marital_code`, `adresse`, `telephone`, `email`, `type_piece_identite_code`, `numero_identite`, `date_delivrance_identite`, `lieu_delivrance_identite`, `date_expiration_identite`, `profession`, `societe_employeur`, `secteur_activite`, `date_debut_service`, `lieu_residence`, `lieu_travail`, `categorie_professionel_code`, `categorie_revenu_mensuel_code`, `nbre_annee_professionel_code`, `autres_sources_revenu`, `autres_assurances`, `agence_id`, `institution_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'BK00103001', 'SMIDA', 'Latifa', 'titre_mademoiselle', '1982-12-27 00:00:00', 'Maroua', 'sexe_f', 'statut_marital_celibataire', '65 Garoua', '22332214', NULL, 'type_piece_identite_cni', '102310431', '2001-11-12 00:00:00', 'Garoua', '2011-11-12 00:00:00', 'Assistante', 'Coton Cam', 'Agro-Alimentaire', '2008-07-12 00:00:00', 'Garoua', 'Garoua', 'categorie_professionnelle_agent_maitrise', 'categorie_revenu_mensuel_28216-a-200000', 'nbre_annee_professionel_1-a-5-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(2, 1, 'BK00103002', 'AKOTONOU', 'Nignon Eugene Henri', 'titre_monsieur', '1978-06-21 00:00:00', 'Yaounde', 'sexe_h', 'statut_marital_married', '895 Yaounde', '22458899', 'eugene.henri@yahoo.fr', 'type_piece_identite_cni', '1017540431', '2002-11-14 00:00:00', 'Garoua', '2014-11-14 00:00:00', 'Chef compable', 'SNI', 'Finance', '2001-03-02 00:00:00', 'Yaounde', 'Yaounde', 'categorie_professionnelle_cadre_superieur', 'categorie_revenu_mensuel_500001-a-800000', 'nbre_annee_professionel_6-a-15-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:53', '2010-10-12 23:43:53'),
(3, 1, 'BK00103003', 'OUEDRAOGO', 'Mamadou Evariste', 'titre_monsieur', '1978-06-21 00:00:00', 'Yaounde', 'sexe_h', 'statut_marital_celibataire', '895 Yaounde', '22458899', 'mamadou_evariste@yahoo.com', 'type_piece_identite_cni', '171733556', '2002-11-14 00:00:00', 'Garoua', '2014-11-14 00:00:00', 'Chef compable', 'SNI', 'Finance', '2001-03-02 00:00:00', 'Yaounde', 'Yaounde', 'categorie_professionnelle_cadre_superieur', 'categorie_revenu_mensuel_500001-a-800000', 'nbre_annee_professionel_6-a-15-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:53', '2010-10-12 23:43:53'),
(4, 1, 'BK00103004', 'KOUASSI', 'Bienvenue Agnini Mahoubie', 'titre_monsieur', '1957-01-01 00:00:00', 'Douala', 'sexe_h', 'statut_marital_celibataire', '54 Douala', '23458899', NULL, 'type_piece_identite_cni', '121233490', '2006-11-14 00:00:00', 'Douala', '2016-11-14 00:00:00', 'Commercial', 'SABC', 'Vente', '2000-09-01 00:00:00', 'Douala', 'Douala', 'categorie_professionnelle_cadre_superieur', 'categorie_revenu_mensuel_500001-a-800000', 'nbre_annee_professionel_6-a-15-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:53', '2010-10-12 23:43:53'),
(5, 1, 'BK00103005', 'ABASSI', 'Nejia', 'titre_monsieur', '1975-03-01 00:00:00', 'Douala', 'sexe_h', 'statut_marital_celibataire', '80 Douala', '3323442', NULL, 'type_piece_identite_cni', '18143123', '2005-11-14 00:00:00', 'Douala', '2015-11-14 00:00:00', 'Commercial', 'SABC', 'Vente', '2000-07-01 00:00:00', 'Douala', 'Douala', 'categorie_professionnelle_cadre_superieur', 'categorie_revenu_mensuel_500001-a-800000', 'nbre_annee_professionel_6-a-15-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:53', '2010-10-12 23:43:53'),
(6, 1, 'BK00103006', 'HONVOU', 'Edwige Sonagnon Carolle', 'titre_mademoiselle', '1984-12-27 00:00:00', 'Douala', 'sexe_f', 'statut_marital_celibataire', '33 Douala', '33452367', NULL, 'type_piece_identite_cni', '191945677', '2001-11-12 00:00:00', 'Douala', '2011-11-12 00:00:00', 'Assistante', 'Socapalm', 'Agro-Alimentaire', '2007-07-12 00:00:00', 'Douala', 'Douala', 'categorie_professionnelle_agent_maitrise', 'categorie_revenu_mensuel_28216-a-200000', 'nbre_annee_professionel_1-a-5-ans', 'Aucune', 'Aucune', 4, 2, 3, 3, '2010-10-12 23:43:53', '2010-10-12 23:43:53');

--
-- Contenu de la table `crdmgr_fiche_consentement`
--

INSERT INTO `crdmgr_fiche_consentement` (`id`, `workflow_status_code`, `workflow_status_msg`, `workflow_status_msglog`, `code_fiche_consentement`, `customer_id`, `loan_type_code`, `interest_amount`, `main_amount`, `assured_amount`, `loan_duration_months_count`, `applied_rate`, `accessory_amount`, `other_amount`, `prime_amount_per_month`, `total_prime_amount`, `assurance_effect_date`, `first_monthly_payment_date`, `assurance_end_date`, `agence_id`, `institution_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'workflow_status_waiting-insurance-validation', 'traitement', '', '001', 5, 'loan_type_asset_finance', 0.00, 0.00, 0.00, 12, 0.00, 0.00, 0.00, 0.00, 0.00, '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00', 1, 1, 1, 1, '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(2, 'workflow_status_waiting-insurance-validation', '115', '', '002', 3, 'loan_type_asset_finance', 115.00, 115.00, 115.00, 10, 115.00, 115.00, 115.00, 115.00, 115.00, '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00', 1, 1, 1, 1, '2010-11-10 22:38:04', '2010-11-10 22:38:04');

--
-- Contenu de la table `crdmgr_fiche_consentement_detail`
--

INSERT INTO `crdmgr_fiche_consentement_detail` (`id`, `fiche_consentement_id`, `question_id`, `bool_answer`, `string_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 55, 1, 'poids et taille', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(2, 1, 56, 0, 'depuis ', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(3, 1, 57, 1, 'assurance sur la vie', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(4, 1, 58, 0, 'pension d''invalidite', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(5, 1, 59, 1, 'arret de travail', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(6, 1, 60, 0, 'Automobile ou autre', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(7, 1, 61, 1, 'maladie ou Infirmite', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(8, 1, 62, 0, 'paludisme', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(9, 1, 63, 1, 'analyse de sang', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(10, 1, 64, 0, 'transfusion de sang', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(11, 1, 65, 1, 'interventions chirurgicales', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(12, 1, 66, 0, 'traitement medical', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(13, 1, 67, 1, 'Diarrhoe chronique', '2010-10-17 15:06:54', '2010-10-23 03:01:06'),
(14, 1, 68, 0, 'Mycose', '2010-10-17 15:06:54', '2010-10-23 03:01:07'),
(15, 2, 55, 1, 'poids et taill', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(16, 2, 56, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(17, 2, 57, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(18, 2, 58, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(19, 2, 59, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(20, 2, 60, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(21, 2, 61, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(22, 2, 62, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(23, 2, 63, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(24, 2, 64, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(25, 2, 65, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(26, 2, 66, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(27, 2, 67, 1, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04'),
(28, 2, 68, 0, '', '2010-11-10 22:38:04', '2010-11-10 22:38:04');

--
-- Contenu de la table `crdmgr_institution`
--

INSERT INTO `crdmgr_institution` (`id`, `is_active`, `code_institution`, `nom_institution`, `type_institution_code`, `adresse`, `lieu_siege_social_code`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASS001', 'Saar-Vie', 'type_institution_assurance', 'Bonanjo Douala', 'ville_douala', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(2, 1, 'BNK001', 'Eco Bank', 'type_institution_banque', 'Akwa Douala', 'ville_douala', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52');

--
-- Contenu de la table `crdmgr_parameter`
--

INSERT INTO `crdmgr_parameter` (`id`, `is_active`, `type_parametre`, `code_parametre`, `label_param`, `valeur_string`, `valeur_numeric`, `description_param`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'type_institution', 'type_institution_assurance', 'assurance', 'assurance', 0.00, 'assurance', 1, 1, '2010-10-12 23:43:42', '2010-10-12 23:43:42'),
(2, 1, 'type_institution', 'type_institution_banque', 'banque', 'banque', 0.00, 'banque', 1, 1, '2010-10-12 23:43:42', '2010-10-12 23:43:42'),
(3, 1, 'ville', 'ville_yaounde', 'yaounde', 'yaounde', 0.00, 'yaounde', 1, 1, '2010-10-12 23:43:42', '2010-10-12 23:43:42'),
(4, 1, 'ville', 'ville_douala', 'douala', 'douala', 0.00, 'douala', 1, 1, '2010-10-12 23:43:42', '2010-10-12 23:43:42'),
(5, 1, 'statut_marital', 'statut_marital_celibataire', 'celibataire', 'celibataire', 0.00, 'celibataire', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(6, 1, 'statut_marital', 'statut_marital_married', 'marie', 'marie', 0.00, 'marie', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(7, 1, 'categorie_professionnelle', 'categorie_professionnelle_agent_maitrise', 'Agent de maitrise', 'Agent de ma?trise', 0.00, 'Agent de ma?trise', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(8, 1, 'categorie_professionnelle', 'categorie_professionnelle_cadre', 'Cadre', 'Cadre', 0.00, 'Cadre', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(9, 1, 'categorie_professionnelle', 'categorie_professionnelle_cadre_superieur', 'Cadre superieur', 'Cadre superieur', 0.00, 'Cadre superieur', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(10, 1, 'categorie_professionnelle', 'categorie_professionnelle_employe', 'Employe', 'Employe', 0.00, 'Employe', 1, 1, '2010-10-12 23:43:43', '2010-10-12 23:43:43'),
(11, 1, 'loan_type', 'loan_type_asset_finance', 'Asset finance', 'Asset finance', 0.00, 'Asset finance', 1, 1, '2010-10-12 23:43:44', '2010-10-12 23:43:44'),
(12, 1, 'loan_type', 'loan_type_executive_loan', 'Executive loan', 'Executive loan', 0.00, 'Executive loan', 1, 1, '2010-10-12 23:43:44', '2010-10-12 23:43:44'),
(13, 1, 'nbre_annee_professionel', 'nbre_annee_professionel_1-a-5-ans', '1 a 5 ans', '1 a 5 ans', 0.00, '1 a 5 ans', 1, 1, '2010-10-12 23:43:44', '2010-10-12 23:43:44'),
(14, 1, 'nbre_annee_professionel', 'nbre_annee_professionel_6-a-15-ans', '6 a 15 ans', '6 a 15 ans', 0.00, '6 a 15 ans', 1, 1, '2010-10-12 23:43:44', '2010-10-12 23:43:44'),
(15, 1, 'nbre_annee_professionel', 'nbre_annee_professionel_16-ans-et-plus', '16 ans et plus', '16 ans et plus', 0.00, '16 ans et plus', 1, 1, '2010-10-12 23:43:45', '2010-10-12 23:43:45'),
(16, 1, 'categorie_revenu_mensuel', 'categorie_revenu_mensuel_200001-a-500000', '200001 a 500000', '200001 a 500000', 0.00, '200001 a 500000', 1, 1, '2010-10-12 23:43:45', '2010-10-12 23:43:45'),
(17, 1, 'categorie_revenu_mensuel', 'categorie_revenu_mensuel_28216-a-200000', '28216 a 200000', '28216 a 200000', 0.00, '28216 a 200000', 1, 1, '2010-10-12 23:43:45', '2010-10-12 23:43:45'),
(18, 1, 'categorie_revenu_mensuel', 'categorie_revenu_mensuel_500001-a-800000', '500001 a 800000', '500001 a 800000', 0.00, '500001 a 800000', 1, 1, '2010-10-12 23:43:45', '2010-10-12 23:43:45'),
(19, 1, 'categorie_revenu_mensuel', 'categorie_revenu_mensuel_800001-et-plus', '800001 et plus', '800001 et plus', 0.00, '800001 et plus', 1, 1, '2010-10-12 23:43:45', '2010-10-12 23:43:45'),
(20, 1, 'type_piece_identite', 'type_piece_identite_cni', 'CNI', 'CNI', 0.00, 'CNI', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(21, 1, 'type_piece_identite', 'type_piece_identite_passport', 'passe-port', 'passe-port', 0.00, 'passe-port', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(22, 1, 'sexe', 'sexe_h', 'homme', 'homme', 0.00, 'homme', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(23, 1, 'sexe', 'sexe_f', 'femme', 'femme', 0.00, 'femme', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(24, 1, 'titre', 'titre_monsieur', 'monsieur', 'monsieur', 0.00, 'monsieur', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(25, 1, 'titre', 'titre_madame', 'madame', 'madame', 0.00, 'madame', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(26, 1, 'titre', 'titre_mademoiselle', 'mademoiselle', 'mademoiselle', 0.00, 'mademoiselle', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(27, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q01', 'Question 01', 'Avez-vous dej? ete ajourne ou supprime pour un precedent contrat d''assurtances de personnes? si oui donner les precisions (Date-Motif-Compagnie)', 0.00, 'Question 01', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(28, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q02', 'Question 02', 'Etes-vous actuellement titulaire d''assurance de personnes? (effet - Nom de la compagnie- Montants des garanties)', 0.00, 'Question 02', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(29, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q03', 'Question 03', 'Avez-vous ete victime d''un accident (Automobile ou autre)? (locations des blessures, Sequelles, Dates)', 0.00, 'Question 03', 1, 1, '2010-10-12 23:43:46', '2010-10-12 23:43:46'),
(30, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q04', 'Question 04', 'Pratiquez-vous des sports? Preciser en amateur ou en competition?', 0.00, 'Question 04', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(31, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q05', 'Question 05', 'Au cours des 10 derni?res annees, avez-vous fait des sejiurs en milieu hospitalier ou assimile?', 0.00, 'Question 05', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(32, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q06', 'Question 06', 'Avez-vous subi des examens medicaux? (Dates et Resultats)', 0.00, 'Question 06', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(33, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q07', 'Question 07', 'Avez-vous subi un electrocardiogramme? (Dates et Resultats)', 0.00, 'Question 07', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(34, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q08', 'Question 08', 'Avez-vous subi des radiographies? (Dates et Resultats)', 0.00, 'Question 08', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(35, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q09', 'Question 09', 'Avez-vous subi un test de depistage (Toxoplasme, Hepatite B, SIDA)? (Dates et Resultats)', 0.00, 'Question 09', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(36, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q10', 'Question 10', 'Avez-vous subi un traitement specialise tel que rayons X, Chimiotherapie, Immunotherapie ou Cobaltotherapie?', 0.00, 'Question 10', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(37, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q11', 'Question 11', 'Etes vous actuellement en arret de travail?', 0.00, 'Question 11', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(38, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q12', 'Question 12', 'Durant les 5 derni?res annees, avez vous du interrompre votre ...', 0.00, 'Question 12', 1, 1, '2010-10-12 23:43:47', '2010-10-12 23:43:47'),
(39, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q13', 'Question 13', 'Souffrez vous ou avez vous ete atteint des maladies de l''appareil respiratoire (Toux de longue duree, crachement de sang, affection des poumons', 0.00, 'Question 13', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(40, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q14', 'Question 14', 'Souffrez vous ou avez vous ete atteint des maladies de l''appareil cardivasculaire (Infractus, Hpertension arterielle, Arterite) [Dates]', 0.00, 'Question 14', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(41, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q15', 'Question 15', 'Souffrez vous ou avez vous ete atteint des maladies de l''appareil digestif (Jaunisse, Hepatite, Diarrhee chronique) [Dates]', 0.00, 'Question 15', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(42, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q16', 'Question 16', 'Souffrez vous ou avez vous ete atteint des maladies de l''appareil urinaire et genital (albuminurie et MST) [Dates]', 0.00, 'Question 16', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(43, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q17', 'Question 17', 'Souffrez vous ou avez vous ete atteint des maladies du syst?me nerveux (Paralysies, Meningite, Epilespsie) [Dates]', 0.00, 'Question 17', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(44, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q18', 'Question 18', 'Souffrez vous ou avez vous ete atteint des maladies neuro-psychiques (Depression nerveuse, Tentative de suicide) [Dates]', 0.00, 'Question 18', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(45, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q19', 'Question 19', 'Souffrez vous ou avez vous ete atteint des maladies du sang, des ganglions, et de la rate (Anemie, Presence de ganglions anormaux) [Dates]', 0.00, 'Question 19', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(46, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q20', 'Question 20', 'Souffrez vous ou avez vous ete atteint des maladies endocriniennes ou metaboliques (Diab?te, Goutte, Anomalies de la thyroide) (Anemie, Presence de ganglions anormaux) [Dates]', 0.00, 'Question 20', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(47, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q21', 'Question 21', 'Souffrez vous ou avez vous ete atteint des maladies des os et des articulations (Athrose, Rhumatismes divers) [Dates]', 0.00, 'Question 21', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(48, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q22', 'Question 22', 'Souffrez vous ou avez vous ete atteint des maladies de la peau (Ablation de grains de beaute, Verrues frequentes, autres lesions) [Dates]', 0.00, 'Question 22', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(49, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q23', 'Question 23', 'Souffrez vous ou avez vous ete atteint des maladies infectueuses sev?res ou compliquees (Tuberculose, Hepatite Aou B, Infections ? repetition) [Dates]', 0.00, 'Question 23', 1, 1, '2010-10-12 23:43:48', '2010-10-12 23:43:48'),
(50, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q24', 'Question 24', 'Souffrez vous ou avez vous ete atteint des maladies parasitaires ou mycoses (Paludisme, Bilharziose, Candidose, Dysenterie amibienne...) [Dates]', 0.00, 'Question 24', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(51, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q25', 'Question 25', 'Souffrez vous ou avez vous ete atteint des maladies des organes de sens, troubles occulaires et auditifs ? (Myopie, Surdite)', 0.00, 'Question 25', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(52, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q26', 'Question 26', 'Devez vous etre hospitalise prochainement ou subir des examens medicaux (Myopie, Surdite)', 0.00, 'Question 26', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(53, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q27', 'Question 27', 'Devez vous subir une intervention chirurgicale?', 0.00, 'Question 27', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(54, 1, 'question_medical_b_adhesion', 'question_medical_b_adhesion_q28', 'Question 28', 'Avez vous suivi ou suivez vous actuellement medical? si oui preciser s''il sagit d''un traitement par perfusion ou par piqures', 0.00, 'Question 28', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(55, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q01', 'Question 01', 'Quels sont vos poids et taille', 0.00, 'Question 01', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(56, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q02', 'Question 02', 'Avez vous maigri ou grossi de plus de 5Kgs depuis 6 Mois? Si oui de combien?', 0.00, 'Question 02', 1, 1, '2010-10-12 23:43:49', '2010-10-12 23:43:49'),
(57, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q03', 'Question 03', 'Avez-vous dej? ete refuse, ajourne ou supprime par une societe d''assurance sur la vie?', 0.00, 'Question 03', 1, 1, '2010-10-12 23:43:50', '2010-10-12 23:43:50'),
(58, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q04', 'Question 04', 'Etes-vous titulaire d''une pension d''invalidite?', 0.00, 'Question 04', 1, 1, '2010-10-12 23:43:50', '2010-10-12 23:43:50'),
(59, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q05', 'Question 05', 'Etes-vous actuellement en arret de travail?', 0.00, 'Question 05', 1, 1, '2010-10-12 23:43:50', '2010-10-12 23:43:50'),
(60, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q06', 'Question 06', 'Avez-vous ete victime d''un accident (Automobile ou autre)? [Dates et Sequelles]', 0.00, 'Question 06', 1, 1, '2010-10-12 23:43:50', '2010-10-12 23:43:50'),
(61, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q07', 'Question 07', 'Avez-vous souffert ou Souffrez vous d''une maladie ou Infirmite?', 0.00, 'Question 07', 1, 1, '2010-10-12 23:43:50', '2010-10-12 23:43:50'),
(62, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q08', 'Question 08', 'Avez-vous ete atteint de paludisme? Si oui, avez-vous subi un traitement par piqures ou oral? [Preciser]', 0.00, 'Question 08', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(63, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q09', 'Question 09', 'Avez-vous recement l''objet d''une analyse de sang comportant le test de depistage de l''hepatite ou encore du SIDA?', 0.00, 'Question 09', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(64, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q10', 'Question 10', 'Avez-vous subi une perfusion ou une transfusion de sang? [Date et Motif]', 0.00, 'Question 10', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(65, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q11', 'Question 11', 'Avez-vous subi des interventions chirurgicales ou devez-vous etre opere prochainement? [Date et Motif]', 0.00, 'Question 11', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(66, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q12', 'Question 12', 'Suivez-vous un traitement medical? [Preciser]', 0.00, 'Question 12', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(67, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q13', 'Question 13', 'Presentez-vous ou avez-vous presente un des symptomes suivants: Eruption cutannee, Presence des ganglions anormaux, Diarrhoe chronique? [Lesquels]', 0.00, 'Question 13', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(68, 1, 'question_medical_f_consentement', 'question_medical_f_consentement_q14', 'Question 14', 'Presentez-vous ou avez-vous presente une des maladies suivantes: Meningite, Affection des poumons, Hepatite B, Verrues frequentes, Mycose?', 0.00, 'Question 14', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(69, 1, 'workflow_status', 'workflow_status_initial-draft', 'Brouillon Initial', 'Brouillon Initial', 0.00, 'Brouillon Initial', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(70, 1, 'workflow_status', 'workflow_status_waiting-insurance-validation', 'Attendre validation assureur', 'Attendre validation assureur', 0.00, 'Attendre validation assureur', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(71, 1, 'workflow_status', 'workflow_status_waiting-bank-validation', 'Attendre validation banque', 'Attendre validation banque', 0.00, 'Attendre validation banque', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(72, 1, 'workflow_status', 'workflow_status_locked-and-published', 'Publier et verrouiller', 'Publier et verrouiller', 0.00, 'Publier et verrouiller', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(73, 1, 'workflow_status', 'workflow_status_deleted', 'Supprimer', 'Supprimer', 0.00, 'Supprimer', 1, 1, '2010-10-12 23:43:51', '2010-10-12 23:43:51'),
(74, 1, 'prime_type', 'prime_type_unique', 'U-Prime unique', 'U-Prime unique', 0.00, 'U-Prime unique', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(75, 1, 'prime_type', 'prime_type_annually', 'A-Prime annuelle', 'A-Prime annuelle', 0.00, 'A-Prime annuelle', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(76, 1, 'validation_status', 'validation_status_normal-accept', 'AN-Accepter Cond. normale', 'AN-Accepter Cond. normale', 0.00, 'AN-Accepter Cond. normale', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(77, 1, 'validation_status', 'validation_status_suprime-accept', 'AS-Accepter avec suprime', 'AS-Accepter avec suprime', 0.00, 'AS-Accepter avec suprime', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(78, 1, 'validation_status', 'validation_status_rejected', 'RE-Refuser', 'RE-Refuser', 0.00, 'RE-Refuser', 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(79, 1, 'workflow_status', 'workflow_status_null', 'Aucun', 'Aucun', 0.00, 'Aucun', 1, 1, '2010-11-10 00:54:25', '2010-11-10 00:54:25');

--
-- Contenu de la table `crdmgr_user_agency`
--

INSERT INTO `crdmgr_user_agency` (`id`, `user_id`, `agence_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(2, 2, 2, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52'),
(3, 3, 4, 1, 1, '2010-10-12 23:43:52', '2010-10-12 23:43:52');

--
-- Contenu de la table `sf_guard_forgot_password`
--


--
-- Contenu de la table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrateurs', 'Groupe administrateurs', '2010-10-12 23:43:40', '2010-10-12 23:43:40'),
(2, 'Saar-vie - Assureurs', 'groupe Assureurs de Saar-vie', '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(3, 'Ecobank - Gestionnaires clients banque', 'Groupe des gestionnaires de clients de banque pour Ecobank', '2010-10-12 23:43:41', '2010-10-12 23:43:41');

--
-- Contenu de la table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(2, 2, '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(3, 3, '2010-10-12 23:43:41', '2010-10-12 23:43:41');

--
-- Contenu de la table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', 'Administrator permission', '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(2, 'assureur', 'Permission assureur', '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(3, 'gestionnaire clients banque', 'Permission gestionnaire de clients de banque', '2010-10-12 23:43:41', '2010-10-12 23:43:41');

--
-- Contenu de la table `sf_guard_remember_key`
--


--
-- Contenu de la table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Verra', 'Cruz', 'admin@admin.com', 'admin', 'sha1', 'c5ceae6d83d2a75efba316e59b3b6416', '630859abb72f7d47a29e967d5ac7529c4c93a07d', 1, 0, '2010-11-10 23:27:35', '2010-10-12 23:43:41', '2010-11-10 23:27:35'),
(2, 'John', 'Doe', 'john.doe@saarvie.com', 'john.doe', 'sha1', '4c507df3fa87f76cc7ec0bc66e4dd99c', '339d7874b82000f311e2dbdb732a3b607bb1e8ec', 1, 0, NULL, '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(3, 'Lucy', 'Loo', 'lucy.loo@ecobank.com', 'lucy.loo', 'sha1', 'c7fb5c20b5212ae2517667054b68f51f', 'bc0f80baaa03edf7535d28ff1164b5d16fccb58f', 1, 0, NULL, '2010-10-12 23:43:42', '2010-10-12 23:43:42');

--
-- Contenu de la table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(2, 2, '2010-10-12 23:43:41', '2010-10-12 23:43:41'),
(3, 3, '2010-10-12 23:43:42', '2010-10-12 23:43:42');

--
-- Contenu de la table `sf_guard_user_permission`
--

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
