-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 21 mars 2018 à 18:27
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taskmanagerteam4`
--

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `ID_Team` int(11) NOT NULL,
  `TeamName` varchar(50) COLLATE latin7_general_cs NOT NULL,
  `ID_Team_Leader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_general_cs;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`ID_Team`, `TeamName`, `ID_Team_Leader`) VALUES
(1, 'Team 1', 1),
(2, 'Team 2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `teammembers`
--

CREATE TABLE `teammembers` (
  `ID_TeamMember` int(11) NOT NULL,
  `ID_Team` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_general_cs;

--
-- Déchargement des données de la table `teammembers`
--

INSERT INTO `teammembers` (`ID_TeamMember`, `ID_Team`, `ID_User`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 5),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `UserName` varchar(50) COLLATE latin7_general_cs NOT NULL,
  `Password` varchar(50) COLLATE latin7_general_cs NOT NULL,
  `FirstName` varchar(50) COLLATE latin7_general_cs DEFAULT NULL,
  `LastName` varchar(50) COLLATE latin7_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7 COLLATE=latin7_general_cs;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_User`, `UserName`, `Password`, `FirstName`, `LastName`) VALUES
(1, 'Jerem', 'azerty', 'Jeremy', 'Laurensis'),
(2, 'Louis', 'azerty', 'Louis', 'Laurensis'),
(5, 'user3', 'azerty', 'User', '3'),
(6, 'user4', 'azerty', 'User', '4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`ID_Team`),
  ADD KEY `ID_Team_Leader` (`ID_Team_Leader`);

--
-- Index pour la table `teammembers`
--
ALTER TABLE `teammembers`
  ADD PRIMARY KEY (`ID_TeamMember`),
  ADD KEY `ID_Team` (`ID_Team`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `ID_Team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `teammembers`
--
ALTER TABLE `teammembers`
  MODIFY `ID_TeamMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_TeamLeader` FOREIGN KEY (`ID_Team_Leader`) REFERENCES `users` (`ID_User`);

--
-- Contraintes pour la table `teammembers`
--
ALTER TABLE `teammembers`
  ADD CONSTRAINT `FK_TEAM` FOREIGN KEY (`ID_Team`) REFERENCES `team` (`ID_Team`),
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
