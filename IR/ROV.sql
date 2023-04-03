-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 03 avr. 2023 à 08:03
-- Version du serveur :  8.0.32-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ROV`
--

-- --------------------------------------------------------

--
-- Structure de la table `chemin`
--

CREATE TABLE `chemin` (
  `id` int NOT NULL,
  `paths` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `id` int NOT NULL,
  `temperature` float NOT NULL,
  `humidité` float NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`id`, `temperature`, `humidité`, `date`, `heure`) VALUES
(1, 24.3, 31.7, '2023-03-28', '11:22:22'),
(2, 24.3, 31.7, '2023-03-28', '11:22:25'),
(3, 24.3, 31.7, '2023-03-28', '11:22:27'),
(4, 24.3, 31.7, '2023-03-28', '11:22:29'),
(5, 24.3, 31.6, '2023-03-28', '11:22:34'),
(6, 24.3, 31.7, '2023-03-28', '11:22:36'),
(7, 24.3, 31.6, '2023-03-28', '11:22:38'),
(8, 24.3, 31.6, '2023-03-28', '11:22:41'),
(9, 24.3, 31.6, '2023-03-28', '11:22:44'),
(10, 24.3, 31.6, '2023-03-28', '11:22:48'),
(11, 24.3, 31.6, '2023-03-28', '11:22:52'),
(12, 24.3, 31.6, '2023-03-28', '11:22:55'),
(13, 24.3, 31.5, '2023-03-28', '11:22:57'),
(14, 24.3, 31.4, '2023-03-28', '11:22:59'),
(15, 24.3, 31.4, '2023-03-28', '11:23:01'),
(16, 24.3, 31.4, '2023-03-28', '11:23:03'),
(17, 24.3, 31.3, '2023-03-28', '11:23:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chemin`
--
ALTER TABLE `chemin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chemin`
--
ALTER TABLE `chemin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `data`
--
ALTER TABLE `data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
