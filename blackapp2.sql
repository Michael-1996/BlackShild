-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour blackshi_application
CREATE DATABASE IF NOT EXISTS `blackshi_application` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blackshi_application`;

-- Listage de la structure de la table blackshi_application. agents
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `civilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statutmatrimonial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` date NOT NULL,
  `matricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeromobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numerofixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numerocni` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateexpircni` date DEFAULT NULL,
  `numeropermis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoriepermis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateetablpermis` date DEFAULT NULL,
  `dateexpirpermis` date DEFAULT NULL,
  `numeross` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroalf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroetranger` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lieudelivrancecs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etablissementcartedesejour` date DEFAULT NULL,
  `expirationcartedesejour` date DEFAULT NULL,
  `typecontrat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dureeducontrat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroads` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomchien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datevaliditevaccin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. conges
CREATE TABLE IF NOT EXISTS `conges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conges_agent_id_foreign` (`agent_id`),
  CONSTRAINT `conges_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. pays
CREATE TABLE IF NOT EXISTS `pays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. sites
CREATE TABLE IF NOT EXISTS `sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_web` text COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nommanager` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephonemanager` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=363 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table blackshi_application. plannings
CREATE TABLE IF NOT EXISTS `plannings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) unsigned NOT NULL,
  `agent_id` bigint(20) unsigned NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `heure_total_jour` bigint(20) unsigned NOT NULL,
  `heure_total_nuit` bigint(20) unsigned NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plannings_agent_id_foreign` (`agent_id`),
  KEY `plannings_site_id_foreign` (`site_id`),
  CONSTRAINT `plannings_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  CONSTRAINT `plannings_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
