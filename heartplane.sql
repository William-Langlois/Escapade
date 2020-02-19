-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 19 fév. 2020 à 18:12
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `heartplane`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement_premium`
--

CREATE TABLE `abonnement_premium` (
  `AP_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `AP_DATEPAYEMENT` date DEFAULT NULL,
  `AP_DUREE` date DEFAULT NULL,
  `AP_PRIX` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bannissement`
--

CREATE TABLE `bannissement` (
  `BAN_ID` int(11) NOT NULL,
  `BAN_ADMIN` int(11) NOT NULL,
  `BAN_CONCERNE` int(11) NOT NULL,
  `BAN_RAISON` text DEFAULT NULL,
  `BAN_DATEDEBUT` datetime DEFAULT NULL,
  `BAN_DATEFIN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_signalement`
--

CREATE TABLE `categorie_signalement` (
  `CS_ID` int(11) NOT NULL,
  `CS_NOM` varchar(250) DEFAULT NULL,
  `CS_IMPORTANCE` int(3) DEFAULT 500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `centre_interet`
--

CREATE TABLE `centre_interet` (
  `CI_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CI_NOM` varchar(50) DEFAULT NULL,
  `CI_NUM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE `email` (
  `EMAIL_ID` int(11) NOT NULL,
  `EMAIL_ENVOYEUR` int(11) NOT NULL,
  `EMAIL_DESTINATAIRE` int(11) NOT NULL,
  `EMAIL_OBJET` varchar(250) DEFAULT NULL,
  `EMAIL_CONTENU` text DEFAULT NULL,
  `EMAIL_DATE_ENVOI` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_userlike` int(11) NOT NULL,
  `id_userliked` int(11) NOT NULL,
  `like_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `MESSAGE_ID` int(11) NOT NULL,
  `MESSAGE_ENVOYEUR` int(11) NOT NULL,
  `MESSAGE_DESTINATAIRE` int(11) NOT NULL,
  `MESSAGE_CONTENU` text DEFAULT NULL,
  `MESSAGE_DATE_ENVOI` datetime DEFAULT NULL,
  `MESSAGE_ISREAD` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `NOTIFICATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NOTIFICATION_TITRE` varchar(100) DEFAULT NULL,
  `NOTIFICATION_CONTENU` text DEFAULT NULL,
  `NOTIFICATION_TYPE` varchar(100) DEFAULT NULL,
  `NOTIFICATION_CREATIME` datetime DEFAULT NULL,
  `NOTIFICATION_VIEWTIME` datetime DEFAULT NULL,
  `NOTIFICATION_ISVIEWED` varchar(3) DEFAULT 'no',
  `NOTIFICATION_PHOTOREPO` varchar(250) DEFAULT NULL,
  `NOTIFICATION_PHOTONOM` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `PHOTO_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PHOTO_NOM` varchar(50) DEFAULT NULL,
  `PHOTO_REPOSITORY` varchar(250) DEFAULT NULL,
  `PHOTO_CATEGORIE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE `signalement` (
  `SIGNALEMENT_ID` int(11) NOT NULL,
  `CS_ID` int(11) NOT NULL,
  `SIGNALEMENT_SOUMETTEUR` int(11) NOT NULL,
  `SIGNALEMENT_CONCERNE` int(11) NOT NULL,
  `SIGNALEMENT_MANAGED` tinyint(1) DEFAULT 0,
  `SIGNALEMENT_CONTEXT` text DEFAULT NULL,
  `SIGNALEMENT_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NOM` varchar(50) DEFAULT NULL,
  `USER_PRENOM` varchar(50) DEFAULT NULL,
  `USER_DESCRIPTION` text DEFAULT NULL,
  `USER_EMAIL` varchar(250) DEFAULT NULL,
  `USER_PASSWORD` varchar(100) DEFAULT NULL,
  `USER_POS_X` double DEFAULT NULL,
  `USER_POS_Y` double DEFAULT NULL,
  `USER_PAYS` varchar(50) DEFAULT NULL,
  `USER_VILLE` varchar(50) DEFAULT NULL,
  `USER_DATE_INSCRIPTION` date DEFAULT NULL,
  `USER_LAST_CONNECTION` datetime DEFAULT NULL,
  `USER_SEXE` int(11) DEFAULT NULL,
  `USER_PHOTONOM` varchar(250) DEFAULT NULL,
  `USER_PHOTOREPO` varchar(250) DEFAULT NULL,
  `USER_WANNADATEATHOME` tinyint(1) DEFAULT NULL,
  `USER_ISADMIN` tinyint(1) DEFAULT NULL,
  `USER_ACCEPT_EMAIL` tinyint(1) DEFAULT NULL,
  `USER_ACCEPT_MESSAGE` tinyint(1) DEFAULT NULL,
  `USER_ACTIVE_NOTIF` tinyint(1) DEFAULT NULL,
  `USER_BIRTHDATE` date DEFAULT NULL,
  `USER_GALERIEISPUBLIC` tinyint(1) DEFAULT NULL,
  `USER_NEEDSEXE` tinyint(4) DEFAULT NULL,
  `USER_NEEDVILLE` varchar(50) DEFAULT NULL,
  `USER_NEEDKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `VOYAGE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `VOYAGE_FROM_PAYS` varchar(50) DEFAULT NULL,
  `VOYAGE_FROM_VILLE` varchar(50) DEFAULT NULL,
  `VOYAGE_DESTINATION_PAYS` varchar(50) DEFAULT NULL,
  `VOYAGE_DESTINATION_VILLE` varchar(50) DEFAULT NULL,
  `VOYAGE_DATEDEBUT` date DEFAULT NULL,
  `VOYAGE_DATEFIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement_premium`
--
ALTER TABLE `abonnement_premium`
  ADD PRIMARY KEY (`AP_ID`);

--
-- Index pour la table `bannissement`
--
ALTER TABLE `bannissement`
  ADD PRIMARY KEY (`BAN_ID`);

--
-- Index pour la table `categorie_signalement`
--
ALTER TABLE `categorie_signalement`
  ADD PRIMARY KEY (`CS_ID`);

--
-- Index pour la table `centre_interet`
--
ALTER TABLE `centre_interet`
  ADD PRIMARY KEY (`CI_ID`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`EMAIL_ID`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MESSAGE_ID`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`PHOTO_ID`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`SIGNALEMENT_ID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`VOYAGE_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement_premium`
--
ALTER TABLE `abonnement_premium`
  MODIFY `AP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bannissement`
--
ALTER TABLE `bannissement`
  MODIFY `BAN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_signalement`
--
ALTER TABLE `categorie_signalement`
  MODIFY `CS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `centre_interet`
--
ALTER TABLE `centre_interet`
  MODIFY `CI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `email`
--
ALTER TABLE `email`
  MODIFY `EMAIL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `NOTIFICATION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `PHOTO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `signalement`
--
ALTER TABLE `signalement`
  MODIFY `SIGNALEMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `VOYAGE_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
