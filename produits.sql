-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : cl1-sql20.lan.phpnet.org:3306
-- Généré le : lun. 29 Mai 2023 à 20:59

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twinsfashion`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int NOT NULL,
  `image` text ,
  `nom` varchar(45) NOT NULL,
  `COC_APPRENANT_email` varchar(45) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits et quelques requetes`
--
SELECT * FROM `produits` WHERE 1
INSERT INTO `produits`(`id`, `image`, `nom`, `prix`, `description`)
VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
UPDATE `produits` 
SET `id`='[value-1]',`image`='[value-2]',`nom`='[value-3]',`prix`='[value-4]',`description`='[value-5]'
 WHERE 1

