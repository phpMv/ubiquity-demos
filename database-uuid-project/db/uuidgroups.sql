-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 avr. 2022 à 16:38
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uuidgroups`
--
CREATE DATABASE IF NOT EXISTS `uuidgroups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uuidgroups`;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `uuid` varchar(36) NOT NULL,
  `name` varchar(65) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `aliases` mediumtext DEFAULT NULL,
  `idOrganization` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`uuid`, `name`, `email`, `aliases`, `idOrganization`) VALUES
('1ecc174c-f590-62ba-8370-00155d27fdba', 'Personnels', 'personnels@lecnam.net', 'all;', '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', 'Etudiants', 'etudiants@lecnam.net', 'etu;stagiaires;', '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc174c-f5ba-6a4c-adb6-00155d27fdba', 'Personnels', 'liste.personnels@test.com', 'test', '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', 'Etudiants', 'liste.etudiants', 'liste.etu;', '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc174c-f5bd-6c42-8732-00155d27fdba', 'Enseignants', 'liste.enseignants', 'liste.ens;', '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc174c-f5be-678c-a03e-00155d27fdba', 'Vacataires', 'liste.vacataires', 'liste.vac;', '1ecc1757-6177-60fa-97d8-00155d27fdba');

-- --------------------------------------------------------

--
-- Structure de la table `groupusers`
--

CREATE TABLE `groupusers` (
  `idGroup` varchar(36) NOT NULL,
  `idUser` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupusers`
--

INSERT INTO `groupusers` (`idGroup`, `idUser`) VALUES
('1ecc174c-f590-62ba-8370-00155d27fdba', '1ecc1701-081c-66aa-8fd9-00155d27fdba'),
('1ecc174c-f590-62ba-8370-00155d27fdba', '1ecc1701-0823-6932-bbfe-00155d27fdba'),
('1ecc174c-f590-62ba-8370-00155d27fdba', '1ecc1701-0825-6908-9e13-00155d27fdba'),
('1ecc174c-f590-62ba-8370-00155d27fdba', '1ecc1701-0866-6dcc-ac03-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0823-6932-bbfe-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0825-6908-9e13-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-082d-6c2a-9568-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0833-6d64-8fa1-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0840-624e-9a2a-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0845-69a6-b79e-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0849-6074-b51b-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0858-6876-85f9-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0860-6738-8ea8-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-0865-6094-82a0-00155d27fdba'),
('1ecc174c-f598-66cc-8797-00155d27fdba', '1ecc1701-086a-6760-a407-00155d27fdba'),
('1ecc174c-f5ba-6a4c-adb6-00155d27fdba', '1ecc1701-07f5-6b36-a48b-00155d27fdba'),
('1ecc174c-f5ba-6a4c-adb6-00155d27fdba', '1ecc1701-0824-69f4-947b-00155d27fdba'),
('1ecc174c-f5ba-6a4c-adb6-00155d27fdba', '1ecc1701-082e-6af8-9ac8-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0802-6dc2-a2e5-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0819-6dec-ac5e-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-081b-6336-8397-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-081d-68ac-927a-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-081e-6a72-831f-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-081f-6c1a-a703-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0820-6bba-96b4-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0821-6ad8-aca1-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0822-6a14-b0c8-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0829-6120-b2da-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0829-6fda-a50e-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-082a-6ee4-9b90-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-082b-6db2-bfb6-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-082c-6cb2-998c-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-082f-6a2a-bf0f-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0839-671e-aca6-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0843-6d36-bbf3-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-084f-6c58-98f8-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-0857-6e4e-8c1b-00155d27fdba'),
('1ecc174c-f5bb-6e24-89fa-00155d27fdba', '1ecc1701-085f-6356-9dc1-00155d27fdba');

-- --------------------------------------------------------

--
-- Structure de la table `organization`
--

CREATE TABLE `organization` (
  `uuid` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `aliases` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organization`
--

INSERT INTO `organization` (`uuid`, `name`, `domain`, `aliases`) VALUES
('1ecc1757-615d-6ff6-b2d6-00155d27fdba', 'Conservatoire National des Arts et Métiers', 'lecnam.net', 'cnam-basse-normandie.fr;'),
('1ecc1757-6177-60fa-97d8-00155d27fdba', 'Université de Caen-Normandie', 'unicaen.fr', NULL),
('1ecc1757-6191-6734-97ce-00155d27fdba', 'IUT Campus 3 Ifs', 'iutc3.unicaen.fr', ''),
('1ecc175a-c4a7-6b36-8944-00155d27fdba', 'MyOrga', 'my', 'maille');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uuid` varchar(36) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT 0,
  `idOrganization` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uuid`, `firstname`, `lastname`, `email`, `password`, `suspended`, `idOrganization`) VALUES
('1ecc1701-07f5-6b36-a48b-00155d27fdba', 'Benjamin', 'Sherman', 'benjamin.sherman@test.fr', 'OWC09RSW6AE', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0802-6dc2-a2e5-00155d27fdba', 'Lionel', 'Mccray', 'lionel.mccray', 'VKW78FSB6PJ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0805-6054-b68d-00155d27fdba', 'Allistair', 'Johnson', 'allistair.johnson', 'RUN58DYH4RN', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0819-6dec-ac5e-00155d27fdba', 'Jeremy', 'Bryan', 'jeremy.bryan', 'TTV64OAQ9AN', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-081b-6336-8397-00155d27fdba', 'Ava', 'Pollard', 'ava.pollard', 'ZKV02QCQ5GZ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-081c-66aa-8fd9-00155d27fdba', 'Jane', 'Leon', 'jane.leon', 'AQD96ABI2WQ', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-081d-68ac-927a-00155d27fdba', 'Baxter', 'Wise', 'baxter.wise', 'PJG36JAP3GU', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-081e-6a72-831f-00155d27fdba', 'Cyrus', 'Rosario', 'cyrus.rosario', 'ZDU33RYL2AK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-081f-6c1a-a703-00155d27fdba', 'Amos', 'Travis', 'amos.travis', 'UIP43SJH2IK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0820-6bba-96b4-00155d27fdba', 'Whitney', 'Hale', 'whitney.hale', 'PCA69ZZG9HD', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0821-6ad8-aca1-00155d27fdba', 'Fletcher', 'Fischer', 'fletcher.fischer', 'BJM28BRO9SX', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0822-6a14-b0c8-00155d27fdba', 'Rhiannon', 'Dickerson', 'rhiannon.dickerson', 'ZUM07JRG0JH', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0823-6932-bbfe-00155d27fdba', 'Smith', 'Joe', 'j.smith@gmail.com', '0000', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0824-69f4-947b-00155d27fdba', 'Acton', 'Carrillo', 'acton.carrillo', 'HIO59BHB8HB', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0825-6908-9e13-00155d27fdba', 'Maggy', 'Weber', 'maggy.weber', 'MWW53SWA2WH', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0826-695c-af12-00155d27fdba', 'Kyle', 'Craig', 'kyle.craig', 'KAD56XAM2KY', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0827-66a4-9dd9-00155d27fdba', 'Burton', 'Sanford', 'burton.sanford', 'LYO83OLV8TF', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0828-640a-8716-00155d27fdba', 'Cooper', 'Callahan', 'cooper.callahan', 'WKF09LDB4AF', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0829-6120-b2da-00155d27fdba', 'Urielle', 'Moreno', 'urielle.moreno', 'DTB04DDU0KV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0829-6fda-a50e-00155d27fdba', 'Aristotle', 'Reese', 'aristotle.reese', 'QPN11PVQ7TR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-082a-6ee4-9b90-00155d27fdba', 'Camille', 'Blevins', 'camille.blevins', 'CLQ63RXB3VB', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-082b-6db2-bfb6-00155d27fdba', 'Colleen', 'Blevins', 'colleen.blevins', 'EOO51HIZ0PG', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-082c-6cb2-998c-00155d27fdba', 'Martina', 'Holder', 'martina.holder', 'QZW21CRI9ZY', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-082d-6c2a-9568-00155d27fdba', 'Allistair', 'Leon', 'allistair.leon', 'ZAW47BFF3DM', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-082e-6af8-9ac8-00155d27fdba', 'Zorita', 'Rodriguez', 'zorita.rodriguez', 'GNW04ZAO6HP', 1, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-082f-6a2a-bf0f-00155d27fdba', 'Driscoll', 'Dickson', 'driscoll.dickson', 'YNN51MQQ4II', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0830-68e4-8100-00155d27fdba', 'Magee', 'Marquez', 'magee.marquez', 'SHX59YVP7XU', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0831-65fa-b363-00155d27fdba', 'Angelica', 'Serrano', 'angelica.serrano', 'XRJ73PFL2WQ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0832-6356-ae9e-00155d27fdba', 'Nomlanga', 'Bowen', 'nomlanga.bowen', 'SSH13DSE6TU', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0833-6062-bfe3-00155d27fdba', 'Gil', 'Bright', 'gil.bright', 'BEH66TUK0UL', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0833-6d64-8fa1-00155d27fdba', 'Alvin', 'Hatfield', 'alvin.hatfield', 'MBO67IAK8UM', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0835-62d6-af72-00155d27fdba', 'Curran', 'Knowles', 'curran.knowles', 'QNW26QIE9RW', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0836-637a-8083-00155d27fdba', 'Charissa', 'David', 'charissa.david', 'RTM13TXT9AK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0837-669e-bbbe-00155d27fdba', 'Lev', 'Kennedy', 'lev.kennedy', 'EYG45KQT2IU', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0838-6634-aa52-00155d27fdba', 'Lynn', 'Jacobs', 'lynn.jacobs', 'ZHW67JUR3DI', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0839-671e-aca6-00155d27fdba', 'Henry', 'Beasley', 'henry.beasley', 'UZK64PCR2UN', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083a-6a88-91cf-00155d27fdba', 'Lois', 'Wiley', 'lois.wiley', 'SIU35PZI0BT', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083b-694c-b245-00155d27fdba', 'Deborah', 'Wheeler', 'deborah.wheeler', 'WUD38KWN1LI', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083c-675c-b110-00155d27fdba', 'Renee', 'Olson', 'renee.olson', 'BXT76DJI2KA', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083d-65f8-98cd-00155d27fdba', 'Philip', 'English', 'philip.english', 'OLM46WUL5QC', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083e-669c-b661-00155d27fdba', 'Kevin', 'Johns', 'kevin.johns', 'IKJ83UQO4LP', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-083f-6556-99fc-00155d27fdba', 'Jane', 'Holden', 'jane.holden', 'BVG22IMJ7UO', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0840-624e-9a2a-00155d27fdba', 'Kendall', 'Collier', 'kendall.collier', 'PPQ01KRW4QU', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0841-650e-9f9d-00155d27fdba', 'Solomon', 'Tucker', 'solomon.tucker', 'LLI65CKR1FM', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0842-627e-ae3d-00155d27fdba', 'Richard', 'Higgins', 'richard.higgins', 'QXP09FYD8IJ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0843-600c-b07e-00155d27fdba', 'Carly', 'David', 'carly.david', 'ORG15ORK7NR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0843-6d36-bbf3-00155d27fdba', 'Kelsey', 'Weber', 'kelsey.weber', 'CGR68MCJ3SN', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0844-6c36-a6ea-00155d27fdba', 'Ursa', 'Barry', 'ursa.barry', 'SDJ66QPG1VS', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0845-69a6-b79e-00155d27fdba', 'Steven', 'Norman', 'steven.norman', 'HVH32HVT8MR', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0849-6074-b51b-00155d27fdba', 'Joan', 'Hatfield', 'joan.hatfield', 'RNF84ENW1FC', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0849-6fa6-95c5-00155d27fdba', 'Simon', 'Pacheco', 'simon.pacheco', 'JTD92HBV6LY', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084a-6ce4-bf4a-00155d27fdba', 'Price', 'Sears', 'price.sears', 'ARD22CYJ7DJ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084b-6a18-a460-00155d27fdba', 'Melodie', 'Burton', 'melodie.burton', 'MJB89OEN9YD', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084c-67a6-8505-00155d27fdba', 'Amela', 'Burks', 'amela.burks', 'COY70COZ0HP', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084d-64bc-bc23-00155d27fdba', 'Melvin', 'Jacobs', 'melvin.jacobs', 'ERJ13FFZ9IS', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084e-6222-8b69-00155d27fdba', 'Ivory', 'Morin', 'ivory.morin', 'VCA67DEG0LI', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084e-6f38-945b-00155d27fdba', 'Quentin', 'Clements', 'quentin.clements', 'BCU26BTI1ZC', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-084f-6c58-98f8-00155d27fdba', 'Olympia', 'Huber', 'olympia.huber', 'HNP83HAE0FM', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0850-6b62-9e17-00155d27fdba', 'Colton', 'Mcintyre', 'colton.mcintyre', 'DPM10ODN4MK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0851-6878-bb21-00155d27fdba', 'Talon', 'Boyle', 'talon.boyle', 'EAC10BKA9FZ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0852-65de-a5a9-00155d27fdba', 'Kyra', 'Rocha', 'kyra.rocha', 'VJW60ULA7YW', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0853-62d6-aba1-00155d27fdba', 'Stella', 'Cole', 'stella.cole', 'RJH68PRO4SW', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0853-6fe2-aa2f-00155d27fdba', 'Brock', 'Lucas', 'brock.lucas', 'GZI54FAF2QV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0854-6f46-8fb0-00155d27fdba', 'Lila', 'Lewis', 'lila.lewis', 'PMM40BGE7EZ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0855-69b4-a405-00155d27fdba', 'Hu', 'Key', 'hu.key', 'MHN02DRZ2QK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0856-62f6-8acb-00155d27fdba', 'Kuame', 'James', 'kuame.james', 'PAN51UII5EK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0856-6bfc-89ca-00155d27fdba', 'Xenos', 'Padilla', 'xenos.padilla', 'RSO17VKK9PN', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0857-6548-b74a-00155d27fdba', 'Sade', 'Owens', 'sade.owens', 'XIH02LWO2MI', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0857-6e4e-8c1b-00155d27fdba', 'Carolyn', 'Pace', 'carolyn.pace', 'YIX45RKH5MR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0858-6876-85f9-00155d27fdba', 'Ivor', 'Logan', 'ivor.logan', 'BJQ09KDN8WK', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0859-629e-8215-00155d27fdba', 'Eleanor', 'Cabrera', 'eleanor.cabrera', 'ECW85CUY3ZR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0859-6ce4-8b1e-00155d27fdba', 'Clare', 'Macdonald', 'clare.macdonald', 'VPQ45ENN0NH', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085a-6752-ac0a-00155d27fdba', 'Malcolm', 'Burke', 'malcolm.burke', 'PLO48UGZ5XA', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085b-638c-93a0-00155d27fdba', 'Kitra', 'Delaney', 'kitra.delaney', 'SQU50ZAG7OI', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085c-6070-a830-00155d27fdba', 'Barrett', 'Holcomb', 'barrett.holcomb', 'SBA21QWP2YR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085c-6c46-965c-00155d27fdba', 'Haley', 'Reed', 'haley.reed', 'GPK80XRK7JZ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085d-6646-a847-00155d27fdba', 'Grant', 'Townsend', 'grant.townsend', 'YAL32HDT0UA', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085e-603c-853e-00155d27fdba', 'Derek', 'Hays', 'derek.hays', 'OVD66OAJ2UH', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085e-6a00-89b4-00155d27fdba', 'Keiko', 'Benson', 'keiko.benson', 'HPV72ZLP6MQ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085f-6356-9dc1-00155d27fdba', 'Levi', 'Bishop', 'levi.bishop', 'IKY43FHZ6VT', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-085f-6de2-ba89-00155d27fdba', 'Mara', 'Benjamin', 'mara.benjamin', 'XCQ79LJC5LQ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0860-6738-8ea8-00155d27fdba', 'Hyacinth', 'Finley', 'hyacinth.finley', 'UIV27LYU6SW', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0861-6246-8ef4-00155d27fdba', 'Ramona', 'Solomon', 'ramona.solomon', 'MYJ31VYH0GV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0861-6d40-a1b0-00155d27fdba', 'Ezra', 'Anderson', 'ezra.anderson', 'NKN68ETH4OM', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0862-66be-996e-00155d27fdba', 'Alana', 'Lambert', 'alana.lambert', 'IXT00JND7YK', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0863-6190-a7c3-00155d27fdba', 'Lillian', 'Wright', 'lillian.wright', 'LBJ92OFT4IT', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0863-6ca8-9f1f-00155d27fdba', 'Brenna', 'Trevino', 'brenna.trevino', 'QJO38DEX1TM', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0865-6094-82a0-00155d27fdba', 'Madeson', 'Larsen', 'madeson.larsen', 'QFL74NXO4UR', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0865-6b5c-a900-00155d27fdba', 'Kenyon', 'Hinton', 'kenyon.hinton', 'OJN19NDN7HR', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0866-6462-bdfc-00155d27fdba', 'Vera', 'Powers', 'vera.powers', 'VIR06MOZ2JV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0866-6dcc-ac03-00155d27fdba', 'Wyatt', 'Higgins', 'wyatt.higgins', 'ZIO64ZJU9HY', 1, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-0867-6858-9947-00155d27fdba', 'Natalie', 'Brown', 'natalie.brown', 'YKD61DCY5IF', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0868-61ea-b752-00155d27fdba', 'Claudia', 'Savage', 'claudia.savage', 'KFN84UVA1SG', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0868-6b4a-9a6c-00155d27fdba', 'Lucas', 'Bush', 'lucas.bush', 'ZFS09NFU7DO', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0869-64aa-8149-00155d27fdba', 'Kenyon', 'Neal', 'kenyon.neal', 'OWG74JRY9KV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-0869-6e0a-af81-00155d27fdba', 'Tyrone', 'Hurley', 'tyrone.hurley', 'GHE80GQD6EU', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-086a-6760-a407-00155d27fdba', 'Maris', 'Mosley', 'maris.mosley', 'NEX48LLK6CD', 0, '1ecc1757-615d-6ff6-b2d6-00155d27fdba'),
('1ecc1701-086b-620a-98f3-00155d27fdba', 'Elaine', 'Norton', 'elaine.norton', 'STY09EPG0GD', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-086b-6b4c-bb9a-00155d27fdba', 'Vernon', 'Tanner', 'vernon.tanner', 'VMZ45SGA2NV', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-086c-6484-bf2b-00155d27fdba', 'Brennan', 'Shaw', 'brennan.shaw', 'XMG63KHO3JY', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba'),
('1ecc1701-086c-6dbc-8ae6-00155d27fdba', 'Victoria', 'Whitehead', 'victoria.whitehead', 'LAF73KHK8FZ', 0, '1ecc1757-6177-60fa-97d8-00155d27fdba');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `name_orga_UNIQUE` (`name`,`idOrganization`) USING BTREE,
  ADD UNIQUE KEY `email_orga_UNIQUE` (`email`,`idOrganization`) USING BTREE,
  ADD KEY `fk_groupe_organization1_idx` (`idOrganization`);

--
-- Index pour la table `groupusers`
--
ALTER TABLE `groupusers`
  ADD PRIMARY KEY (`idGroup`,`idUser`),
  ADD KEY `fk_groupe_has_user_user1_idx` (`idUser`),
  ADD KEY `fk_groupe_has_user_groupe_idx` (`idGroup`);

--
-- Index pour la table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `domain_UNIQUE` (`domain`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `fk_user_organization1_idx` (`idOrganization`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk_groupe_organization1` FOREIGN KEY (`idOrganization`) REFERENCES `organization` (`uuid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupusers`
--
ALTER TABLE `groupusers`
  ADD CONSTRAINT `fk_groupe_has_user_groupe` FOREIGN KEY (`idGroup`) REFERENCES `group` (`uuid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groupe_has_user_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`uuid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_organization1` FOREIGN KEY (`idOrganization`) REFERENCES `organization` (`uuid`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
