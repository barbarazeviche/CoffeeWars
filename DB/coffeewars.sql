-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 déc. 2021 à 13:16
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coffeewars`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `ID` int(10) NOT NULL,
  `intitule_question` text NOT NULL,
  `ID_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`ID`, `intitule_question`, `ID_type`) VALUES
(1, 'Qu\'est-ce qu\'Apache ?', 4),
(2, 'Qui est la directrice actuelle (2021) d\'Interface 3 ?', 5),
(3, 'Quelle est la balise pour changer la couleur du texte ?', 1),
(4, 'Quel langage est fortement typé ?', 2),
(5, 'Comment s\'appelle le présentateur de \"Tout le monde veut prendre sa place\" ?', 6),
(6, 'Quel est le langage de prédilection des Game ?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `ID` int(11) NOT NULL,
  `intitule_reponse` varchar(150) NOT NULL,
  `ID_question` int(11) NOT NULL,
  `resultat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`ID`, `intitule_reponse`, `ID_question`, `resultat`) VALUES
(1, 'Un serveur', 1, 1),
(2, 'Un jeux vidéo', 1, 0),
(3, 'Un langage de programmation', 1, 0),
(4, 'Françoise Delaethe', 2, 0),
(5, 'Annie Cordie', 2, 0),
(6, 'Laure Lemaire', 2, 1),
(7, 'text-color', 3, 0),
(8, 'color', 3, 1),
(9, 'coloration', 3, 0),
(10, 'Python', 4, 0),
(11, 'C#', 4, 1),
(12, 'JavaScript', 4, 0),
(13, 'Cyril', 5, 0),
(14, 'Christophe', 5, 0),
(15, 'Nagui', 5, 1),
(16, 'Unity', 6, 1),
(17, 'JavaScript', 6, 0),
(18, 'Java', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `ID` int(11) NOT NULL,
  `type_question` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`ID`, `type_question`) VALUES
(1, 'web'),
(2, 'wad'),
(3, 'game'),
(4, 'asr'),
(5, 'interface3'),
(6, 'culture_generale');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_type` (`ID_type`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID_question`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`ID_type`) REFERENCES `types` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`ID_question`) REFERENCES `questions` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
