-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 fév. 2020 à 14:22
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
  `BAN_DUREE` datetime DEFAULT NULL,
  `BAN_DATEFIN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_signalement`
--

CREATE TABLE `categorie_signalement` (
  `CS_ID` int(11) NOT NULL,
  `CS_NOM` varchar(50) DEFAULT NULL,
  `CS_IMPORTANCE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `centre_interet`
--

CREATE TABLE `centre_interet` (
  `CI_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CI_NOM` varchar(50) DEFAULT NULL,
  `CI_CATEGORIE` varchar(50) DEFAULT NULL
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

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`MESSAGE_ID`, `MESSAGE_ENVOYEUR`, `MESSAGE_DESTINATAIRE`, `MESSAGE_CONTENU`, `MESSAGE_DATE_ENVOI`, `MESSAGE_ISREAD`) VALUES
(2, 6, 7, 'fsdf', NULL, 0),
(3, 6, 8, 'nb', NULL, 0),
(4, 6, 8, 'autre message', NULL, 0),
(5, 8, 6, 'message recu', NULL, 0),
(6, 6, 8, ' test', '0000-00-00 00:00:00', 0),
(7, 8, 6, ' Test from 8\r\n', '0000-00-00 00:00:00', 0),
(8, 8, 6, ' Test from 8\r\n', '0000-00-00 00:00:00', 0),
(9, 6, 8, ' test from 6\r\n', '0000-00-00 00:00:00', 0),
(10, 6, 8, ' message depuis le 6\r\n', '0000-00-00 00:00:00', 0),
(11, 8, 6, ' message from 8', '0000-00-00 00:00:00', 0),
(12, 8, 6, ' message', '0000-00-00 00:00:00', 0),
(13, 8, 6, ' message test from 8\r\n', '0000-00-00 00:00:00', 0),
(14, 6, 8, ' test 6', '0000-00-00 00:00:00', 0),
(15, 6, 8, ' test encore', '0000-00-00 00:00:00', 0),
(16, 8, 6, ' message depuis le 8 ', '0000-00-00 00:00:00', 0),
(17, 8, 6, ' encore depuis le 8', '0000-00-00 00:00:00', 0),
(18, 6, 8, ' Ce coup ci depuis le 6', '0000-00-00 00:00:00', 0),
(19, 6, 7, ' message depuis le 6 pour le 7', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `NOTIFICATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NOTIFICATION_TITRE` varchar(100) DEFAULT NULL,
  `NOTIFICATION_CONTENU` text DEFAULT NULL,
  `NOTIFICATION_TYPE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `PHOTO_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PHOTO_NOM` varchar(50) DEFAULT NULL,
  `PHOTO_URL` varchar(250) DEFAULT NULL,
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
  `SIGNALEMENT_MANAGED` tinyint(1) DEFAULT NULL,
  `SIGNALEMENT_CONTEXT` text DEFAULT NULL
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
  `USER_PHOTO` varchar(250) DEFAULT NULL,
  `USER_WANNADATEATHOME` tinyint(1) DEFAULT NULL,
  `USER_ISADMIN` tinyint(1) DEFAULT NULL,
  `USER_ACCEPT_EMAIL` tinyint(1) DEFAULT NULL,
  `USER_ACCEPT_MESSAGE` tinyint(1) DEFAULT NULL,
  `USER_ACTIVE_NOTIF` tinyint(1) DEFAULT NULL,
  `USER_BIRTHDATE` date DEFAULT NULL,
  `USER_GALERIEISPUBLIC` tinyint(1) DEFAULT NULL,
  `USER_VALIDEMAIL` tinyint(1) DEFAULT 0,
  `USER_CLE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NOM`, `USER_PRENOM`, `USER_DESCRIPTION`, `USER_EMAIL`, `USER_PASSWORD`, `USER_POS_X`, `USER_POS_Y`, `USER_PAYS`, `USER_VILLE`, `USER_DATE_INSCRIPTION`, `USER_LAST_CONNECTION`, `USER_SEXE`, `USER_PHOTO`, `USER_WANNADATEATHOME`, `USER_ISADMIN`, `USER_ACCEPT_EMAIL`, `USER_ACCEPT_MESSAGE`, `USER_ACTIVE_NOTIF`, `USER_BIRTHDATE`, `USER_GALERIEISPUBLIC`, `USER_VALIDEMAIL`, `USER_CLE`) VALUES
(6, 'Langlois', 'William', NULL, 'langlois.william.pro@gmail.com', '$2y$12$4ea190ac3aef045c7c7baub3qzdhIBg3zxbWmN.Ccvc7/Tab3/uHu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '125e2d77eb85c61ddfab50c84edfbc11'),
(7, 'Autre', 'Compte', NULL, 'autre@compte.fr', '$2y$12$0d27237be40b0a64b3351uuDMQoPWm0tx8Tqgtmk.grSqVYIdovQ2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '09f159ab444569afca300eced2f7902b'),
(8, 'Nouveau', 'Compte', NULL, 'nouveau@compte.fr', '$2y$12$46cf7731bb0a29ca14f4auq2yzsEPHo5I./xaU8SKbpUv7VFlqXfO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4c0468bd79c4912f9b8517b5fa1fd19e');

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
  ADD PRIMARY KEY (`AP_ID`),
  ADD KEY `FK_PRENDRE` (`USER_ID`);

--
-- Index pour la table `bannissement`
--
ALTER TABLE `bannissement`
  ADD PRIMARY KEY (`BAN_ID`),
  ADD KEY `FK_CONCERNER` (`BAN_ADMIN`),
  ADD KEY `FK_EFFECTUER` (`BAN_CONCERNE`);

--
-- Index pour la table `categorie_signalement`
--
ALTER TABLE `categorie_signalement`
  ADD PRIMARY KEY (`CS_ID`);

--
-- Index pour la table `centre_interet`
--
ALTER TABLE `centre_interet`
  ADD PRIMARY KEY (`CI_ID`),
  ADD KEY `FK_AVOIR` (`USER_ID`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`EMAIL_ID`),
  ADD KEY `FK_ENVOYER_MAIL` (`EMAIL_ENVOYEUR`),
  ADD KEY `FK_RECEVOIR_MAIL` (`EMAIL_DESTINATAIRE`);

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
  ADD PRIMARY KEY (`NOTIFICATION_ID`),
  ADD KEY `FK_RECEVOIR` (`USER_ID`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`PHOTO_ID`),
  ADD KEY `FK_POSSEDER` (`USER_ID`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`SIGNALEMENT_ID`),
  ADD KEY `FK_APPARTENIR` (`CS_ID`),
  ADD KEY `FK_SIGNALEMENT_CONCERNE` (`SIGNALEMENT_CONCERNE`),
  ADD KEY `FK_SOUMETTRE` (`SIGNALEMENT_SOUMETTEUR`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`VOYAGE_ID`),
  ADD KEY `FK_FAIRE` (`USER_ID`);

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
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `VOYAGE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement_premium`
--
ALTER TABLE `abonnement_premium`
  ADD CONSTRAINT `FK_PRENDRE` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `bannissement`
--
ALTER TABLE `bannissement`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`BAN_ADMIN`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_EFFECTUER` FOREIGN KEY (`BAN_CONCERNE`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `centre_interet`
--
ALTER TABLE `centre_interet`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_ENVOYER_MAIL` FOREIGN KEY (`EMAIL_ENVOYEUR`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_RECEVOIR_MAIL` FOREIGN KEY (`EMAIL_DESTINATAIRE`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `FK_RECEVOIR` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`CS_ID`) REFERENCES `categorie_signalement` (`CS_ID`),
  ADD CONSTRAINT `FK_SIGNALEMENT_CONCERNE` FOREIGN KEY (`SIGNALEMENT_CONCERNE`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_SOUMETTRE` FOREIGN KEY (`SIGNALEMENT_SOUMETTEUR`) REFERENCES `user` (`USER_ID`);

--
-- Contraintes pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `FK_FAIRE` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
