-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 18 août 2019 à 15:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aemn`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL,
  `h_annonce` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `date`, `heure`, `h_annonce`) VALUES
(1, 'JIFA-19', '2019-01-10', '12H à 16H', 'public/annonce/image.png');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `category` enum('images','vidéos','documents','') NOT NULL,
  `title` char(255) NOT NULL,
  `content` text NOT NULL,
  `url` char(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) DEFAULT '0',
  PRIMARY KEY (`id_article`),
  KEY `fk_etre_de` (`type`),
  KEY `fk_poster` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `user`, `type`, `category`, `title`, `content`, `url`, `statut`, `dates`, `likes`) VALUES
(1, 1, 1, 'images', 'Renouvellement de bureau a IAT', '- Si JavaScript est désactivé, Ajax ne peut fonctionner. Il faut demander au lecteur de l\'activer parmi les options du navigateur.\r\n- Si l\'on charge les données à afficher de façon dynamique, elles ne font pas partie de la page et sont ignorées par les mo', 'public/article/android-2901140_1920.jpg', 1, '2018-12-05 20:09:33', 1),
(2, 1, 4, 'images', 'Wa\'azin Jaha', '                                            Voici donc le <span style=\"background-color: rgb(255, 255, 0);\">premier</span> <b>TP</b> de ce tutoriel ! L\'objectif de ces chapitres <b>TP</b>, un peu particuliers, est de vous inviter à vous lancer dans la pratique à l\'aide de tous les éléments théoriques que vous avez lu au cours des chapitres précédents. Cela me semble indispensable pour s\'assurer que vous avez bien compris toutes les notions abordées jusqu\'à maintenant.\r\n\r\nDans ce premier <b>TP</b>, l\'objectif est de vous montrer une utilisation concrète de structuration de données via XML.                                        ', 'public/article/WhatsApp Image 2019-03-13 at 00.21.25.jpeg', 1, '2018-12-05 20:49:41', 3),
(3, 1, 5, 'images', 'Conférence & à ENSP', 'Prenons un exemple concret : imaginons une application téléphonique qui met à jour ses données. L\'application demande à un serveur web les dernières informations dont il dispose. Après être allé les chercher, ce dernier doit les communiquer en retour. C\'est là qu\'intervient le XML : le serveur web s’en sert pour structurer les informations qu\'il doit renvoyer à l\'application téléphonique. Lorsque cette dernière reçoit les informations ainsi structurées, elle sait comment les lire et les exploiter rapidement !', 'public/article/background-906135_1920.jpg', 1, '2018-12-05 20:56:32', 4),
(4, 1, 7, 'images', 'Congré du  l\'AEMN', '<b>Congrélevendreprochain</b><!--? if (isset($_GET[\'article\'])) echo $article[\'content\'] ?-->', 'public/article/plan.png', 1, '2019-08-17 12:07:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `id_bureau` int(11) NOT NULL AUTO_INCREMENT,
  `nom_bureau` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bureau`),
  KEY `nom_bureau` (`nom_bureau`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`id_bureau`, `nom_bureau`, `logo`, `statut`, `date_ajout`) VALUES
(1, 'IAI', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:22:34'),
(2, 'EST', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:22:34'),
(3, 'UAM', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:22:34'),
(4, 'UTA', 'public/img/bg_photo.jpg', 1, '2019-08-17 05:16:47'),
(5, 'SR/Niamey', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:22:34'),
(6, 'Sodesi', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:22:34'),
(7, 'IAT', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:22:34'),
(8, 'IPSP', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:11'),
(9, 'ECCAM', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:11'),
(10, 'UIT/Dosso', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:39:12'),
(11, 'Diffa', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:39:12'),
(12, 'UDDM', 'public/img/bg_photo.jpg', 1, '2019-08-17 05:18:08'),
(13, 'Agadez', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:39:12'),
(14, 'Tillabéri', 'public/img/bg_photo.jpg', 1, '2018-12-29 16:39:12'),
(15, 'ENAM', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:12'),
(16, 'ENSP', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:12'),
(17, 'ISP', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:12'),
(18, 'ETEC', 'public/img/bg_photo.jpg', 2, '2018-12-29 16:39:12'),
(19, 'SR/Tahoua', 'public/doc/plan.png', 1, '2019-08-17 09:22:58');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `folder` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_files`),
  KEY `id_folder` (`folder`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id_files`, `label`, `path`, `size`, `type`, `folder`, `user`) VALUES
(1, 'coursAngularPart5a.pdf', 'public/doc/Rapport/coursAngularPart5a.pdf', 92426, 'application/pdf', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `folder`
--

DROP TABLE IF EXISTS `folder`;
CREATE TABLE IF NOT EXISTS `folder` (
  `id_folder` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_folder`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `folder`
--

INSERT INTO `folder` (`id_folder`, `label`, `path`, `type`, `user`) VALUES
(1, 'Rapport', 'public/doc/Rapport', 'Documentation', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hadith`
--

DROP TABLE IF EXISTS `hadith`;
CREATE TABLE IF NOT EXISTS `hadith` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `hadith` varchar(255) NOT NULL,
  `rapporteur` varchar(255) NOT NULL,
  `h_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hadith`
--

INSERT INTO `hadith` (`id`, `titre`, `hadith`, `rapporteur`, `h_img`) VALUES
(1, 'Mixité', '« L’homme ne s’isole pas avec une femme sans que Satan soit leur troisième »', 'Ahmed', 'public/hadith/mixite.png'),
(2, 'Droits de ton frère', 'dcgdsqhfcsqiufc, sqyyqeyeyqe, szhedq.sq.', 'Albani', 'public/hadith/albani.png'),
(3, 'Justice', 'shGSQHUSGQHDSGQHUD, QDSJDJDQJDHDQD,SJQSQJDSHQ.', 'Maishago', 'public/hadith/maishago.png');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(20) NOT NULL,
  `read_role` varchar(15) DEFAULT NULL,
  `write_role` varchar(15) DEFAULT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id_roles`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `types`, `read_role`, `write_role`, `user`) VALUES
(1, 'Admin', 'yes-done', 'yes-done', 1),
(8, 'Membre', 'yes-done', NULL, 2),
(9, 'Membre', 'yes-done', NULL, 9),
(10, 'Membre', 'yes-done', NULL, 9),
(11, 'Admin', 'yes-done', 'yes-done', 11),
(18, 'Admin', 'yes-done', 'yes-done', 8),
(19, 'Admin', 'yes-done', 'yes-done', 6);

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

DROP TABLE IF EXISTS `type_article`;
CREATE TABLE IF NOT EXISTS `type_article` (
  `id_type_article` int(11) NOT NULL AUTO_INCREMENT,
  `label` char(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `date_ajout_type` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_sup_type` datetime DEFAULT NULL,
  PRIMARY KEY (`id_type_article`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_article`
--

INSERT INTO `type_article` (`id_type_article`, `label`, `statut`, `date_ajout_type`, `date_sup_type`) VALUES
(1, 'Actualité', 0, '0000-00-00 00:00:00', NULL),
(2, 'Journée Islamique', 0, '0000-00-00 00:00:00', NULL),
(4, 'Grande Prêche de Niamey', 0, '2018-12-05 20:49:41', NULL),
(5, 'Conférence', 0, '2018-12-05 20:56:32', NULL),
(6, 'Emission télévisé', 0, '2018-12-30 11:52:11', NULL),
(7, 'Annonce', 1, '2019-08-17 12:05:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` bigint(30) NOT NULL,
  `bureau` varchar(50) NOT NULL,
  `password_user` varchar(20) DEFAULT NULL,
  `code` varchar(60) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `ecole` (`bureau`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `last_name`, `first_name`, `email`, `phone_number`, `bureau`, `password_user`, `code`) VALUES
(1, 'Adamou', 'Abdoul Razak', 'Adamoukomcheabdoulrazak@gmail.com', 22798960382, '', '@damoukomche', ''),
(2, 'Komche', 'Adamou', 'komche@gmail.com', 92470763, '', 'komche2018', ''),
(3, 'Abdourahamane', 'Ali Seydou', 'Abdoulrahmanealiseydou@gmail.com', 90025503, '', 'aliapp2018', ''),
(4, ' Amadou', 'Abdoul Razak', 'komche@gmail.com', 22796888154, '', 'komcheadamou', ''),
(5, 'Sani', 'Yahayya', 'sani@gmail.com', 96299383, '', 'sani1998', ''),
(6, 'Hassan', 'Moussa', 'hassan@gmail.com', 22798960382, '', 'hassan2018', ''),
(8, 'SALEY KANO', 'Souleymane', 's.kano@guerosgroup.com', 96267005, '', 'LOCATION', ''),
(9, 'Mahamadou', 'Ali', 'Ali.mahamadou@novatech.ne', 97901358, '', 'alim2018', '24e0046fbf41'),
(11, ' Daouda', 'Hamadou', 'daoudahamadoua@gmail.com', 91012204, '', '12345678', 'fe25cfd5340c'),
(12, 'Zalkiphili Abbas', 'Maman Tahirou', 'Maman227@gmail.com', 22796962435, 'IAI', NULL, '76ffd56f08b0f14af6759f1c');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_etre_de` FOREIGN KEY (`type`) REFERENCES `type_article` (`id_type_article`),
  ADD CONSTRAINT `fk_poster` FOREIGN KEY (`user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
