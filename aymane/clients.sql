-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 juil. 2023 à 15:41
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nogentg1`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `uid` smallint(6) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`uid`, `nom`, `mail`, `pass`, `active`) VALUES
(1, 'troutrou', 'truotrou@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1),
(2, 'tritriiii', 'tritri@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1),
(3, 'fatoumata', 'fatoumata@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1),
(4, 'aymane', 'aymane@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1),
(5, 'zaraheee', 'zara@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1),
(6, 'matthieu', 'matthieu@gmail.com', '311950ec69f06b08c1b19d298352d6838e022050', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `uid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
