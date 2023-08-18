-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 déc. 2022 à 12:04
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb2022`
--
CREATE DATABASE 
-- --------------------------------------------------------

--
-- Structure de la table `analyse_patient`
--

CREATE TABLE `analyse_patient` (
  `Id_Analyse_Patient` int(11) NOT NULL,
  `Id_Patient` int(11) NOT NULL,
  `Id_Laborantin` int(11) NOT NULL,
  `Id_Secretaire` int(11) NOT NULL,
  `Nom_Analyse_Patient` varchar(32) NOT NULL,
  `Type_Analyse_Patient` varchar(32) NOT NULL,
  `Statut_Analyse_Patient` tinyint(1) NOT NULL,
  `Date_Analyse_Patient` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `laborantin`
--

CREATE TABLE `laborantin` (
  `Id_Laborantin` int(11) ,auto_increment NOT NULL
  `Nom_Laborantin` varchar(32) NOT NULL,
  `Prenom_Laborantin` varchar(32) NOT NULL,
  `Motdepasse_Laborantin` varchar(32) NOT NULL,
  `Email_Laborantin` varchar(32) NOT NULL,
  `Tel_Laborantin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `Id_Patient` int(11) auto_increment NOT NULL,
  `Sexe_Patient` varchar(50) NOT NULL,
  `Nom_Patient` varchar(32) NOT NULL,
  `Prenom_Patient` varchar(32) NOT NULL,
  `DateNaiss_Patient` date NOT NULL,
  `Adresse_Patient` varchar(50) NOT NULL,
  `Tel_Patient` varchar(10) NOT NULL,
  `Email_Patient` varchar(50) NOT NULL,
  `Nationalite_Patient` varchar(50) NOT NULL,
  `DateEnregistrement_Patient` date NOT NULL,
  `DateRV_Patient` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resultat_analyse`
--

CREATE TABLE `resultat_analyse` (
  `Id_Resultat` int(11) auto_increment NOT NULL,
  `Resultat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `Id_Secretaire` int(11) auto_increment NOT NULL,
  `Nom_Secretaire` varchar(32) NOT NULL,
  `Prenom_Secretaire` varchar(32) NOT NULL,
  `Email_Secretaire` varchar(32) NOT NULL,
  `Motdepasse_Secretaire` varchar(32) NOT NULL,
  `Tel_Secretaire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `analyse_patient`
--
ALTER TABLE `analyse_patient`
  ADD PRIMARY KEY (`Id_Analyse_Patient`),
  ADD KEY `Analyse_PATIENT_PATIENT_FK` (`Id_Patient`),
  ADD KEY `Analyse_PATIENT_LABORANTIN_FK` (`Id_Laborantin`),
  ADD KEY `Analyse_PATIENT_SECRETAIRE_FK` (`Id_Secretaire`);

--
-- Index pour la table `laborantin`
--
ALTER TABLE `laborantin`
  ADD PRIMARY KEY (`Id_Laborantin`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id_Patient`),
  ADD KEY `PATIENT_PATIENT_FK` (`Id_Secretaire`);

--
-- Index pour la table `resultat_analyse`
--
ALTER TABLE `resultat_analyse`
  ADD PRIMARY KEY (`Id_Resultat`),
  ADD KEY `RESULTAT_Analyse_Analyse_PATIENT_FK` (`Id_Analyse_Patient`),
  ADD KEY `RESULTAT_Analyse_LABORANTIN_FK` (`Id_Laborantin`),
  ADD KEY `RESULTAT_Analyse_SECRETAIRE_FK` (`Id_Secretaire`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`Id_Secretaire`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `analyse_patient`
--
ALTER TABLE `analyse_patient`
  ADD CONSTRAINT `Analyse_PATIENT_LABORANTIN_FK` FOREIGN KEY (`Id_Laborantin`) REFERENCES `laborantin` (`Id_Laborantin`),
  ADD CONSTRAINT `Analyse_PATIENT_PATIENT_FK` FOREIGN KEY (`Id_Patient`) REFERENCES `patient` (`Id_Patient`),
  ADD CONSTRAINT `Analyse_PATIENT_SECRETAIRE_FK` FOREIGN KEY (`Id_Secretaire`) REFERENCES `secretaire` (`Id_Secretaire`) ON DELETE CASCADE;

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `PATIENT_PATIENT_FK` FOREIGN KEY (`Id_Secretaire`) REFERENCES `secretaire` (`Id_Secretaire`) ON DELETE CASCADE;

--
-- Contraintes pour la table `resultat_analyse`
--
ALTER TABLE `resultat_analyse`
  ADD CONSTRAINT `RESULTAT_Analyse_Analyse_PATIENT_FK` FOREIGN KEY (`Id_Analyse_Patient`) REFERENCES `analyse_patient` (`Id_Analyse_Patient`),
  ADD CONSTRAINT `RESULTAT_Analyse_LABORANTIN_FK` FOREIGN KEY (`Id_Laborantin`) REFERENCES `laborantin` (`Id_Laborantin`),
  ADD CONSTRAINT `RESULTAT_Analyse_SECRETAIRE_FK` FOREIGN KEY (`Id_Secretaire`) REFERENCES `secretaire` (`Id_Secretaire`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
