-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 15 juin 2020 à 17:22
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chailloul`
--

-- --------------------------------------------------------

--
-- Structure de la table `Accueil`
--

CREATE TABLE `Accueil` (
  `Titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `Description` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Image` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `Placement` int(255) NOT NULL,
  `PrimaK` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `Accueil`
--

INSERT INTO `Accueil` (`Titre`, `Description`, `Image`, `Placement`, `PrimaK`) VALUES
('Introduction', 'Voila la description', NULL, 1, 1),
('Contenu', 'Voici le contenu', NULL, 2, 2),
('Finis', 'Finis', NULL, 3, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Accueil`
--
ALTER TABLE `Accueil`
  ADD PRIMARY KEY (`PrimaK`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Accueil`
--
ALTER TABLE `Accueil`
  MODIFY `PrimaK` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
