-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 fév. 2021 à 00:41
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `groups`
--
CREATE DATABASE IF NOT EXISTS `groups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `groups`;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(65) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `aliases` mediumtext DEFAULT NULL,
  `idOrganization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`id`, `name`, `email`, `aliases`, `idOrganization`) VALUES
(1, 'Personnels', 'personnels@lecnam.net', 'all;', 1),
(2, 'Etudiants', 'etudiants@lecnam.net', 'etu;stagiaires;', 1),
(3, 'Personnels', 'liste.personnels@test.com', '', 2),
(4, 'Etudiants', 'liste.etudiants', 'liste.etu;', 2),
(5, 'Enseignants', 'liste.enseignants', 'liste.ens;', 2),
(6, 'Vacataires', 'liste.vacataires', 'liste.vac;', 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupusers`
--

CREATE TABLE `groupusers` (
  `idGroup` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupusers`
--

INSERT INTO `groupusers` (`idGroup`, `idUser`) VALUES
(1, 9),
(1, 13),
(2, 20),
(2, 29),
(2, 35),
(2, 46),
(2, 51),
(2, 52),
(2, 70),
(2, 81),
(2, 87),
(2, 95),
(3, 1),
(3, 2),
(3, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 10),
(4, 11),
(4, 12),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 30);

-- --------------------------------------------------------

--
-- Structure de la table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `aliases` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organization`
--

INSERT INTO `organization` (`id`, `name`, `domain`, `aliases`) VALUES
(1, 'Conservatoire National des Arts et Métiers', 'lecnam.net', 'cnam-basse-normandie.fr;'),
(2, 'Université de Caen-Normandie', 'unicaen.fr', NULL),
(5, 'IUT Campus 3 Ifs', 'iutc3.unicaen.fr', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT 0,
  `idOrganization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `suspended`, `idOrganization`) VALUES
(1, 'Benjamin', 'Sherman', 'benjamin.sherman', 'OWC09RSW6AE', 0, 2),
(2, 'Acton', 'Carrillo', 'acton.carrillo', 'HIO59BHB8HB', 0, 2),
(3, 'Zorita', 'Rodriguez', 'zorita.rodriguez', 'GNW04ZAO6HP', 1, 2),
(4, 'Henry', 'Beasley', 'henry.beasley', 'UZK64PCR2UN', 0, 2),
(5, 'Kelsey', 'Weber', 'kelsey.weber', 'CGR68MCJ3SN', 0, 2),
(6, 'Olympia', 'Huber', 'olympia.huber', 'HNP83HAE0FM', 0, 2),
(7, 'Carolyn', 'Pace', 'carolyn.pace', 'YIX45RKH5MR', 0, 2),
(8, 'Levi', 'Bishop', 'levi.bishop', 'IKY43FHZ6VT', 0, 2),
(9, 'Wyatt', 'Higgins', 'wyatt.higgins', 'ZIO64ZJU9HY', 1, 1),
(10, 'Lionel', 'Mccray', 'lionel.mccray', 'VKW78FSB6PJ', 0, 2),
(11, 'Jeremy', 'Bryan', 'jeremy.bryan', 'TTV64OAQ9AN', 0, 2),
(12, 'Ava', 'Pollard', 'ava.pollard', 'ZKV02QCQ5GZ', 0, 2),
(13, 'Jane', 'Leon', 'jane.leon', 'AQD96ABI2WQ', 0, 1),
(14, 'Baxter', 'Wise', 'baxter.wise', 'PJG36JAP3GU', 0, 2),
(15, 'Cyrus', 'Rosario', 'cyrus.rosario', 'ZDU33RYL2AK', 0, 2),
(16, 'Amos', 'Travis', 'amos.travis', 'UIP43SJH2IK', 0, 2),
(17, 'Whitney', 'Hale', 'whitney.hale', 'PCA69ZZG9HD', 0, 2),
(18, 'Fletcher', 'Fischer', 'fletcher.fischer', 'BJM28BRO9SX', 0, 2),
(19, 'Rhiannon', 'Dickerson', 'rhiannon.dickerson', 'ZUM07JRG0JH', 0, 2),
(20, 'Maggy', 'Weber', 'maggy.weber', 'MWW53SWA2WH', 0, 1),
(21, 'Kyle', 'Craig', 'kyle.craig', 'KAD56XAM2KY', 0, 2),
(22, 'Burton', 'Sanford', 'burton.sanford', 'LYO83OLV8TF', 0, 2),
(23, 'Cooper', 'Callahan', 'cooper.callahan', 'WKF09LDB4AF', 0, 2),
(24, 'Urielle', 'Moreno', 'urielle.moreno', 'DTB04DDU0KV', 0, 2),
(25, 'Aristotle', 'Reese', 'aristotle.reese', 'QPN11PVQ7TR', 0, 2),
(26, 'Camille', 'Blevins', 'camille.blevins', 'CLQ63RXB3VB', 0, 2),
(27, 'Colleen', 'Blevins', 'colleen.blevins', 'EOO51HIZ0PG', 0, 2),
(28, 'Martina', 'Holder', 'martina.holder', 'QZW21CRI9ZY', 0, 2),
(29, 'Allistair', 'Leon', 'allistair.leon', 'ZAW47BFF3DM', 0, 1),
(30, 'Driscoll', 'Dickson', 'driscoll.dickson', 'YNN51MQQ4II', 0, 2),
(31, 'Magee', 'Marquez', 'magee.marquez', 'SHX59YVP7XU', 0, 2),
(32, 'Angelica', 'Serrano', 'angelica.serrano', 'XRJ73PFL2WQ', 0, 2),
(33, 'Nomlanga', 'Bowen', 'nomlanga.bowen', 'SSH13DSE6TU', 0, 2),
(34, 'Gil', 'Bright', 'gil.bright', 'BEH66TUK0UL', 0, 2),
(35, 'Alvin', 'Hatfield', 'alvin.hatfield', 'MBO67IAK8UM', 0, 1),
(36, 'Curran', 'Knowles', 'curran.knowles', 'QNW26QIE9RW', 0, 2),
(37, 'Charissa', 'David', 'charissa.david', 'RTM13TXT9AK', 0, 2),
(38, 'Lev', 'Kennedy', 'lev.kennedy', 'EYG45KQT2IU', 0, 2),
(39, 'Lynn', 'Jacobs', 'lynn.jacobs', 'ZHW67JUR3DI', 0, 2),
(40, 'Lois', 'Wiley', 'lois.wiley', 'SIU35PZI0BT', 0, 2),
(41, 'Deborah', 'Wheeler', 'deborah.wheeler', 'WUD38KWN1LI', 0, 2),
(42, 'Renee', 'Olson', 'renee.olson', 'BXT76DJI2KA', 0, 2),
(43, 'Philip', 'English', 'philip.english', 'OLM46WUL5QC', 0, 2),
(44, 'Kevin', 'Johns', 'kevin.johns', 'IKJ83UQO4LP', 0, 2),
(45, 'Jane', 'Holden', 'jane.holden', 'BVG22IMJ7UO', 0, 2),
(46, 'Kendall', 'Collier', 'kendall.collier', 'PPQ01KRW4QU', 0, 1),
(47, 'Solomon', 'Tucker', 'solomon.tucker', 'LLI65CKR1FM', 0, 2),
(48, 'Richard', 'Higgins', 'richard.higgins', 'QXP09FYD8IJ', 0, 2),
(49, 'Carly', 'David', 'carly.david', 'ORG15ORK7NR', 0, 2),
(50, 'Ursa', 'Barry', 'ursa.barry', 'SDJ66QPG1VS', 0, 2),
(51, 'Steven', 'Norman', 'steven.norman', 'HVH32HVT8MR', 0, 1),
(52, 'Joan', 'Hatfield', 'joan.hatfield', 'RNF84ENW1FC', 0, 1),
(53, 'Simon', 'Pacheco', 'simon.pacheco', 'JTD92HBV6LY', 0, 2),
(54, 'Price', 'Sears', 'price.sears', 'ARD22CYJ7DJ', 0, 2),
(55, 'Melodie', 'Burton', 'melodie.burton', 'MJB89OEN9YD', 0, 2),
(56, 'Amela', 'Burks', 'amela.burks', 'COY70COZ0HP', 0, 2),
(57, 'Melvin', 'Jacobs', 'melvin.jacobs', 'ERJ13FFZ9IS', 0, 2),
(58, 'Ivory', 'Morin', 'ivory.morin', 'VCA67DEG0LI', 0, 2),
(59, 'Quentin', 'Clements', 'quentin.clements', 'BCU26BTI1ZC', 0, 2),
(60, 'Colton', 'Mcintyre', 'colton.mcintyre', 'DPM10ODN4MK', 0, 2),
(61, 'Talon', 'Boyle', 'talon.boyle', 'EAC10BKA9FZ', 0, 2),
(62, 'Kyra', 'Rocha', 'kyra.rocha', 'VJW60ULA7YW', 0, 2),
(63, 'Stella', 'Cole', 'stella.cole', 'RJH68PRO4SW', 0, 2),
(64, 'Brock', 'Lucas', 'brock.lucas', 'GZI54FAF2QV', 0, 2),
(65, 'Lila', 'Lewis', 'lila.lewis', 'PMM40BGE7EZ', 0, 2),
(66, 'Hu', 'Key', 'hu.key', 'MHN02DRZ2QK', 0, 2),
(67, 'Kuame', 'James', 'kuame.james', 'PAN51UII5EK', 0, 2),
(68, 'Xenos', 'Padilla', 'xenos.padilla', 'RSO17VKK9PN', 0, 2),
(69, 'Sade', 'Owens', 'sade.owens', 'XIH02LWO2MI', 0, 2),
(70, 'Ivor', 'Logan', 'ivor.logan', 'BJQ09KDN8WK', 0, 1),
(71, 'Eleanor', 'Cabrera', 'eleanor.cabrera', 'ECW85CUY3ZR', 0, 2),
(72, 'Clare', 'Macdonald', 'clare.macdonald', 'VPQ45ENN0NH', 0, 2),
(73, 'Malcolm', 'Burke', 'malcolm.burke', 'PLO48UGZ5XA', 0, 2),
(74, 'Kitra', 'Delaney', 'kitra.delaney', 'SQU50ZAG7OI', 0, 2),
(75, 'Barrett', 'Holcomb', 'barrett.holcomb', 'SBA21QWP2YR', 0, 2),
(76, 'Haley', 'Reed', 'haley.reed', 'GPK80XRK7JZ', 0, 2),
(77, 'Grant', 'Townsend', 'grant.townsend', 'YAL32HDT0UA', 0, 2),
(78, 'Derek', 'Hays', 'derek.hays', 'OVD66OAJ2UH', 0, 2),
(79, 'Keiko', 'Benson', 'keiko.benson', 'HPV72ZLP6MQ', 0, 2),
(80, 'Mara', 'Benjamin', 'mara.benjamin', 'XCQ79LJC5LQ', 0, 2),
(81, 'Hyacinth', 'Finley', 'hyacinth.finley', 'UIV27LYU6SW', 0, 1),
(82, 'Ramona', 'Solomon', 'ramona.solomon', 'MYJ31VYH0GV', 0, 2),
(83, 'Ezra', 'Anderson', 'ezra.anderson', 'NKN68ETH4OM', 0, 2),
(84, 'Alana', 'Lambert', 'alana.lambert', 'IXT00JND7YK', 0, 2),
(85, 'Lillian', 'Wright', 'lillian.wright', 'LBJ92OFT4IT', 0, 2),
(86, 'Brenna', 'Trevino', 'brenna.trevino', 'QJO38DEX1TM', 0, 2),
(87, 'Madeson', 'Larsen', 'madeson.larsen', 'QFL74NXO4UR', 0, 1),
(88, 'Kenyon', 'Hinton', 'kenyon.hinton', 'OJN19NDN7HR', 0, 2),
(89, 'Vera', 'Powers', 'vera.powers', 'VIR06MOZ2JV', 0, 2),
(90, 'Natalie', 'Brown', 'natalie.brown', 'YKD61DCY5IF', 0, 2),
(91, 'Claudia', 'Savage', 'claudia.savage', 'KFN84UVA1SG', 0, 2),
(92, 'Lucas', 'Bush', 'lucas.bush', 'ZFS09NFU7DO', 0, 2),
(93, 'Kenyon', 'Neal', 'kenyon.neal', 'OWG74JRY9KV', 0, 2),
(94, 'Tyrone', 'Hurley', 'tyrone.hurley', 'GHE80GQD6EU', 0, 2),
(95, 'Maris', 'Mosley', 'maris.mosley', 'NEX48LLK6CD', 0, 1),
(96, 'Elaine', 'Norton', 'elaine.norton', 'STY09EPG0GD', 0, 2),
(97, 'Vernon', 'Tanner', 'vernon.tanner', 'VMZ45SGA2NV', 0, 2),
(98, 'Brennan', 'Shaw', 'brennan.shaw', 'XMG63KHO3JY', 0, 2),
(99, 'Victoria', 'Whitehead', 'victoria.whitehead', 'LAF73KHK8FZ', 0, 2),
(100, 'Allistair', 'Johnson', 'allistair.johnson', 'RUN58DYH4RN', 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `domain_UNIQUE` (`domain`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_organization1_idx` (`idOrganization`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk_groupe_organization1` FOREIGN KEY (`idOrganization`) REFERENCES `organization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `groupusers`
--
ALTER TABLE `groupusers`
  ADD CONSTRAINT `fk_groupe_has_user_groupe` FOREIGN KEY (`idGroup`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_groupe_has_user_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_organization1` FOREIGN KEY (`idOrganization`) REFERENCES `organization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
