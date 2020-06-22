-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 22 juin 2020 à 14:01
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
-- Structure de la table `AccueilFoissy`
--

CREATE TABLE `AccueilFoissy` (
  `PlacePage` varchar(30) COLLATE utf8_bin NOT NULL,
  `Titre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Description` text COLLATE utf8_bin,
  `Image` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Couleur` varchar(7) COLLATE utf8_bin DEFAULT NULL,
  `Placement` int(255) NOT NULL,
  `PrimaK` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `AccueilFoissy`
--

INSERT INTO `AccueilFoissy` (`PlacePage`, `Titre`, `Description`, `Image`, `Couleur`, `Placement`, `PrimaK`) VALUES
('Texte', 'Les Animations à Foissy-sur-vanne', 'Foissy-sur-vanne propose de nombreuses activités au cours de l\'année. Entre partie de chasse, couscous ou fête de village, une nouvelles activitées est proposé tout les deux mois à peut près. Cliquez sur une des vignettes pour plus d\'informations ou pour retrouver des photos des évènements passés !', NULL, NULL, 1, 1),
('Activite', 'Pêche', NULL, 'assets/img/activites/peche1.jpeg', '#d0a891', 1, 2),
('Activite', 'Chasse', NULL, 'assets/img/activites/chasse.png', '#ff7777', 2, 3),
('Activite', 'Fête du village', NULL, 'assets/img/activites/fete.png', '#fb9fb5', 3, 4),
('Activite', 'Pétanque', NULL, 'assets/img/activites/petanque.gif', '#B5CFA1', 4, 5),
('Texte', 'Foissy-sur-vanne c\'est un village bien sûr, mais des gens surtout', NULL, NULL, NULL, 2, 6),
('Texte', 'Le personnel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin scelerisque pulvinar est, pellentesque porttitor libero rhoncus et. Suspendisse potenti. Etiam efficitur euismod urna, finibus facilisis lorem eleifend sed. Nam sed neque sit amet erat egestas sodales. Proin sed rutrum.', NULL, NULL, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `AdministratifFoissy`
--

CREATE TABLE `AdministratifFoissy` (
  `Titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Image` varchar(50) COLLATE utf8_bin NOT NULL,
  `Redirection` varchar(30) COLLATE utf8_bin NOT NULL,
  `Placement` int(11) NOT NULL,
  `PrimaK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `AdministratifFoissy`
--

INSERT INTO `AdministratifFoissy` (`Titre`, `Description`, `Image`, `Redirection`, `Placement`, `PrimaK`) VALUES
('Plan local d\'Urbanisme Intercommunal', 'En France, le plan local d\'urbanisme (PLU), ou le plan local d\'urbanisme intercommunal (PLUI), est le principal document de planification de l\'urbanisme au niveau communal (PLU) ou intercommunal (PLUI). Il remplace le plan d\'occupation des sols (POS) depuis la loi relative à la solidarité et au renouvellement urbains du 13 décembre 2000, dite « loi SRU »1.\r\n\r\nPlus simplement, c\'est un projet global d\'aménagement de la commune (PLU) ou des communes (PLUI) dans un souci de respect du développement durable dans le cadre du Projet d\'Aménagement et de Développement Durable (PADD), tout en respectant les politiques d\'urbanisme, d\'habitat et de déplacements urbains.', 'assets/img/foret.jpg', 'plui', 1, 1),
('Comptes rendus des conseils municipaux', 'De nombreux conseils municipaux se déroulent chaque années, ceux ci sont résumé dans des comptes rendus que vous pouvez consulter ici.', 'assets/img/foret.jpg', 'comptes_rendus', 2, 2),
('Démarches Administratives', 'Besoin d\'informations afin d\'effectuer une démarche administrative ? Vous pourrez en trouver une ici.\r\n', 'assets/img/foret.jpg', 'demarches_administratives', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `DemarchesFoissy`
--

CREATE TABLE `DemarchesFoissy` (
  `Titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `Ancre` varchar(100) COLLATE utf8_bin NOT NULL,
  `Image` varchar(100) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `CSS` varchar(50) COLLATE utf8_bin NOT NULL,
  `Placement` int(11) NOT NULL,
  `PrimaK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `DemarchesFoissy`
--

INSERT INTO `DemarchesFoissy` (`Titre`, `Ancre`, `Image`, `Description`, `CSS`, `Placement`, `PrimaK`) VALUES
('CNI et passeports', 'cni_passeport', 'assets/img/administratif/cni_passeport.jpg', '1 - Rendez vous sur le site du gouvernement pour une pré-demande : https://passeport.ants.gouv.fr/Vos-demarches\r\n<br>\r\n2- Conservez vos identifiants et prenez rendez vous avec notre maire. Voir les horaires\r\n<br>\r\n3- Venez a la mairie le jour prévu avec vos pièces justificatives et votre numéro de pré-demande.\r\n<br>\r\n4- L’equipe de notre mairie vous accueillera, prendra vos documents et recueillera vos empreintes.', 'moitie_haute_vignette', 1, 1),
('Permis de construire', 'permis-de-construire', 'assets/img/administratif/permis-de-construire.jpg', 'Un permis de construire est exigé :\r\n<br>\r\n- Pour les travaux créant une nouvelle construction, c’est-à-dire une construction indépendante du bâti existant sur la propriété, et qui ajoutent une surface plancher ou une emprise au sol supérieure à 40m².\r\n<br>\r\n- Pour les travaux sur construction existante qui ajoutent entre 20 et 40 m² de surface plancher ou d’emprise au sol et qui portent la surface totale de la construction à plus de 150m².\r\n<br>\r\nLe recours à l’architecte est obligatoire si le projet a une surface plancher supérieur à 150m².\r\n<br>\r\nPour plus d’informations, cliquer ici.', 'moitie_haute_vignette', 2, 2),
('Déclaration de travaux', 'declaration_travaux', 'assets/img/administratif/declaration_travaux.jpeg', 'La déclaration de travaux est un document administratif obligatoire pour les travaux de faible importance.\r\n<br>\r\nElle doit être effectuée :\r\n<br>\r\n- pour tout projet de construction nouvelle ou d\'agrandissement d\'une surface hors œuvre brute (SHOB) comprise entre 2m² et 20m²\r\n<br>\r\n- lors de la transformation de plus de 10m² de SHOB en SHON (surface hors œuvre nette)\r\n<br>\r\n- lors de la modification de l\'aspect extérieur d\'un bâtiment\r\n<br>\r\n- lors d\'un changement d\'affectation', 'moitie_basse_vignette', 3, 3),
('Inscription sur liste électorale', 'carte_electorale', 'assets/img/administratif/carte_electorale.jpg', 'Pour s’inscrire sur les listes électorales, deux possibilités :\r\n<br>\r\n– Se rendre directement en mairie, avec les pièces justificatives demandées.\r\n<br>\r\n– Par courrier en envoyant à la mairie les pièces justificatives demandées.', 'moitie_basse_vignette', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `DetailsAFoissy`
--

CREATE TABLE `DetailsAFoissy` (
  `Titre` varchar(30) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Image` varchar(50) COLLATE utf8_bin NOT NULL,
  `PrimaK` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `DetailsAFoissy`
--

INSERT INTO `DetailsAFoissy` (`Titre`, `Description`, `Image`, `PrimaK`) VALUES
('Fête du village', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra. Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat, ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum venenatis quam quis lobortis. Nulla ac nunc quam.', 'assets/img/activites/11.jpeg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `DiapoActi`
--

CREATE TABLE `DiapoActi` (
  `Image` varchar(50) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Placement` int(11) NOT NULL,
  `Appartenance` int(11) NOT NULL,
  `PrimaK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `DiapoActi`
--

INSERT INTO `DiapoActi` (`Image`, `Description`, `Placement`, `Appartenance`, `PrimaK`) VALUES
('assets/img/activites/1.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna.', 1, 4, 1),
('assets/img/activites/2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna.', 2, 4, 2),
('assets/img/activites/3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna.', 3, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `EcoleFoissy`
--

CREATE TABLE `EcoleFoissy` (
  `Titre` varchar(15) COLLATE utf8_bin NOT NULL,
  `Ancre` varchar(15) COLLATE utf8_bin NOT NULL,
  `Image` varchar(30) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `CSS` varchar(30) COLLATE utf8_bin NOT NULL,
  `Placement` int(255) NOT NULL,
  `PrimaK` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `EcoleFoissy`
--

INSERT INTO `EcoleFoissy` (`Titre`, `Ancre`, `Image`, `Description`, `CSS`, `Placement`, `PrimaK`) VALUES
('Ecole', 'ecole', 'assets/img/ecole.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra.Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat,ullam corper sit amet est ultrices, ultricies rhoncus velit. Cras interdum venenatis quam quis lobortis. Nulla ac nunc quam.', 'moitie_haute_vignette', 1, 1),
('Cantine', 'cantine', 'assets/img/cantine.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra. Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat, ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum venenatis quam quis lobortis. Nulla ac nunc quam.', 'moitie_haute_vignette', 2, 2),
('Garderie', 'garderie', 'assets/img/garderie.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus\r\n            eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae,\r\n            molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra.\r\n            Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat,\r\n            ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum\r\n            venenatis quam quis lobortis. Nulla ac nunc quam.', 'moitie_basse_vignette', 3, 3),
('Bus', 'bus', 'assets/img/bus.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus\r\n            eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae,\r\n            molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra.\r\n            Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat,\r\n            ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum\r\n            venenatis quam quis lobortis. Nulla ac nunc quam.', 'moitie_basse_vignette', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `PersonnelFoissy`
--

CREATE TABLE `PersonnelFoissy` (
  `Titre` varchar(30) COLLATE utf8_bin NOT NULL,
  `Metier` varchar(30) COLLATE utf8_bin NOT NULL,
  `Role` varchar(30) COLLATE utf8_bin NOT NULL,
  `Image` varchar(100) COLLATE utf8_bin NOT NULL,
  `Placement` int(11) NOT NULL,
  `PrimaK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `PersonnelFoissy`
--

INSERT INTO `PersonnelFoissy` (`Titre`, `Metier`, `Role`, `Image`, `Placement`, `PrimaK`) VALUES
('Jeanne SAINCIERGE-DURAND', 'Retraitée', 'Maire', 'assets/img/personnel/13.jpg', 1, 1),
('Denys ANTHOINE', 'Ingénieur', ' 1er adjoint', 'assets/img/personnel/2.jpg', 2, 2),
('Dominique BERTRAND', ' Sans emploi', ' 2ème adjoint', 'assets/img/personnel/3.jpg', 3, 3),
('Jacques ROY', 'Retraité', ' 3ème adjoint', 'assets/img/personnel/4.jpg', 4, 4),
('Jean-Claude HIVERT', ' Chargé Logistique', 'Conseiller', 'assets/img/personnel/5.jpg', 5, 5),
('Tiffanie LIÉNARD', ' Aide-soignante', 'Conseillère', 'assets/img/personnel/6.jpg', 6, 6),
('Jacques DEN-DEKKER', ' Agent de Maîtrise', 'Conseiller', 'assets/img/personnel/7.jpg', 7, 7),
('Marjorie YUNG-PIAT', 'Infirmière', 'Conseillère', 'assets/img/personnel/8.jpg', 8, 8),
('Claire DIEUDONNÉ-VAJOU', ' Cadre Commerciale', 'Conseillère', 'assets/img/personnel/9.jpg', 9, 9),
('Lionel PROKOP', 'Retraité', 'Conseiller', 'assets/img/personnel/10.jpg', 10, 10),
('Elie CHAMED', ' Agent de Maîtrise', 'Conseiller', 'assets/img/personnel/11.jpg', 11, 11);

-- --------------------------------------------------------

--
-- Structure de la table `PluiFoissy`
--

CREATE TABLE `PluiFoissy` (
  `TitreDom` varchar(100) COLLATE utf8_bin NOT NULL,
  `Titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Lien` varchar(250) COLLATE utf8_bin NOT NULL,
  `Pdf` varchar(250) COLLATE utf8_bin NOT NULL,
  `PrimaK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `PluiFoissy`
--

INSERT INTO `PluiFoissy` (`TitreDom`, `Titre`, `Description`, `Lien`, `Pdf`, `PrimaK`) VALUES
('Plan Local d\'Urbanisme Intercommunal', 'PLUI et votre commune', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus tellus eget faucibus suscipit. Integer vel nulla consequat, dignissim metus vitae, molestie risus. Cras eu vestibulum urna. Etiam ornare eu nisi eu viverra. Nulla bibendum scelerisque euismod. Morbi id porta sapien. Aliquam felis erat, ullamcorper sit amet est ultrices, ultricies rhoncus velit. Cras interdum venenatis quam quis lobortis. Nulla ac nunc quam.', '#', '#', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Author') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('2ni', '$2y$10$x22nTsYj63V.XUBPQd8H6OxJ0I/YjxWwVhnjSozvdqoAWq7fk1KgO', 'Author'),
('admin', '$2y$10$sLVXk5LIgFF3IAZHgpWRquBwzwRRAIEneplQ3q2zSZMZv.4JkXoGe', 'Admin'),
('louis', '$2y$10$0V1ws9Vz/EmKUevB4yQLieGUZf3.IhKZ8rG6TumlVoj5ArbDuPmmG', 'Author'),
('mairie', '$2y$10$UAdrRt9D943gzZfDrww8c.tJNZmWa8K7xcXfYtSdU.CLoPEIE97lu', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `AccueilFoissy`
--
ALTER TABLE `AccueilFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `AdministratifFoissy`
--
ALTER TABLE `AdministratifFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `DemarchesFoissy`
--
ALTER TABLE `DemarchesFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `DetailsAFoissy`
--
ALTER TABLE `DetailsAFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `DiapoActi`
--
ALTER TABLE `DiapoActi`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `EcoleFoissy`
--
ALTER TABLE `EcoleFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `PersonnelFoissy`
--
ALTER TABLE `PersonnelFoissy`
  ADD PRIMARY KEY (`PrimaK`);

--
-- Index pour la table `PluiFoissy`
--
ALTER TABLE `PluiFoissy`
  ADD PRIMARY KEY (`PrimaK`);


--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `AccueilFoissy`
--
ALTER TABLE `AccueilFoissy`
  MODIFY `PrimaK` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `DiapoActi`
--
ALTER TABLE `DiapoActi`
  MODIFY `PrimaK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `PersonnelFoissy`
--
ALTER TABLE `PersonnelFoissy`
  MODIFY `PrimaK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
