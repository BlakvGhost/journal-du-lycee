-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2021 at 10:27 PM
-- Server version: 10.3.29-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `JDL_articles` (
  `id` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext CHARACTER SET utf8 NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `statue` varchar(255) NOT NULL DEFAULT 'non',
  `i` varchar(100) NOT NULL DEFAULT 'Article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `JDL_articles` (`id`, `categorie`, `titre`, `contenu`, `auteur`, `date`, `img`, `statue`, `i`) VALUES
(1, 'Electricité', 'Comment Disjoncter un compteur Electrique', 'Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir Pour disjoncter un Compteur Electrique il faut bien s\'assurer avoir ', 'Admin', '2021-06-15 02:47:55', 'assets/articles/user/_profile.png', 'non', 'Article'),
(2, 'default', 'Resoudre une equation de second degr&eacute;', 'Resoudre une equation de second degr&eacute;Resoudre une equation de second degr&eacute;Resoudre une equation de second degr&eacute;Resoudre une equation de second degr&eacute;Resoudre une equation de second degr&eacute;', 'Admin', '2021-06-15 08:30:16', 'assets/articles/user/_profile.png', 'non', 'Article'),
(3, 'default', 'Comment Disjoncter un compteur Electrique', 'betheeeeel vbewjbwg vjwecf hwe jcjbwegvhesgujbetheeeeel vbewjbwg vjwecf hwe jcjbwegvhesgujbetheeeeel vbewjbwg vjwecf hwe jcjbwegvhesguj', 'Admin', '2021-06-15 08:34:40', NULL, 'non', 'Article'),
(4, 'Reseau', 'Bonjur les geeks', 'tg                twtttttggggggggggggggggggggggggggggggggggggggggggggggg', 'Admin', '2021-06-15 08:46:02', 'assets/articles/2021-06-15 08:46:02/_profile.png', 'non', 'Article'),
(5, 'Programmation', 'Comment Disjoncter un compteur Electrique', '&lt;p&gt;Com&lt;strong&gt;ment &lt;/strong&gt;&lt;strong&gt;Disjonct&lt;/strong&gt;er un compteur Electrique&lt;/p&gt;\r\n&lt;p&gt;je&amp;nbsp;&lt;em&gt;suis la a vous&amp;nbsp;&lt;span style=&quot;text-decoration: underline;&quot;&gt;apprendre le meilleur&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;', 'Admin', '2021-06-15 12:32:39', 'assets/articles/2021-06-15 12:32:39/_profile.png', 'non', 'Article'),
(6, 'Programmation', 'Comment Disjoncter un compteur Electrique', '&lt;p&gt;Com&lt;strong&gt;ment &lt;/strong&gt;&lt;strong&gt;Disjonct&lt;/strong&gt;er un compteur Electrique&lt;/p&gt;\r\n&lt;p&gt;je&amp;nbsp;&lt;em&gt;suis la a vous&amp;nbsp;&lt;span style=&quot;text-decoration: underline;&quot;&gt;apprendre le meilleur&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;', 'Admin', '2021-06-15 12:35:03', 'assets/articles/2021-06-15 12:35:03/_profile.png', 'non', 'Article'),
(7, 'Construction Batiment', 'Resoudre une equation de second degr&eacute;', '<p>Com<strong>ment </strong><strong>Disjonct</strong>er un compteur Electrique</p> <p>je&nbsp;<em>suis la a vous&nbsp;<span style=\"text-decoration: underline;\">apprendre le meilleur</span></em></p>\r\n<p>Com<strong>ment </strong><strong>Disjonct</strong>er un compteur Electrique</p> <p>je&nbsp;<em>suis la a vous&nbsp;<span style=\"text-decoration: underline;\">apprendre le meilleur</span></em></p>\r\n', 'Admin', '2021-06-15 23:21:57', 'assets/articles/2021-06-15 23:21:57/_profile.png', 'non', 'Article'),
(8, 'Programmation', 'Systeme de panignation en PHP par Elfried', '<?php\r\nfunction connect_database(){\r\ndefine(\'DB_DSN\',\'mys­ql:host=localhost;db­name=cms\');\r\ndefine(\'DB_USERNAME\'­,\'viper\');\r\ndefine(\'DB_PASSWORD\'­, \'viper\');\r\n\r\n$conn = new PDO(DB_DSN,DB_USERNA­ME,DB_PASSWORD);\r\nreturn $conn;\r\n}\r\n\r\n$conn = connect_database(); //Connexion à bdd\r\n\r\n// Ici on reçoit la page courant par url; J\'espère que tu es à l\'aise avec les ternaires :D\r\n\r\n$currentPage = isset($_GET[\'page\'])­ ? (int)$_GET[\'page\'] : \'1\'; // On recupère la page courant si la page est défini. Sinon il est égal à 1.\r\n\r\n$article_par_page = 5; // Nombre d\'articles par page\r\n\r\n// On recupère le nombre total d\'articles dans la base de données\r\n$sql = $conn -> query(\'SELECT COUNT(*) AS total FROM articles\');\r\n$resp = $sql -> fetch();\r\n\r\n$nb_articles = (int)$resp[\'total\'];\r\n\r\n// On calcul le nombre total de page dont on aura besoin. la fonction ceil permet d\'arrondir les nombres (on ne veut pas les nombres décimaux)\r\n$page_total = ceil($nb_articles / $article_par_page);\r\n\r\nif($currentPage <= 0){$currentPage = 1;} // On n\'est d\'accord\r\nif($currentPage > $page_total){$curren­tPage = $page_total;} // On n\'est aussi d\'accord :D\r\n\r\n// On calcul de décalage\r\n$decalage = ($currentPage * $article_par_page) - $article_par_page; // J\'ai souffert avant de trouver cette formule margique pour le décalage bro :p\r\n\r\n// Et maintenant on recupere les articles dans la bdd avec une décalage et le nombre de lignes qu\'on veut\r\n$fin = $conn -> prepare(\'SELECT * FROM articles LIMIT :offset,:ligne\');\r\n$fin -> bindValue(\':offset\',­$decalage,PDO::PARAM­_INT);\r\n$fin -> bindValue(\':ligne\',$­article_par_page,PDO­::PARAM_INT);\r\n$fin -> execute();\r\n$articles = $fin -> fetch();\r\n\r\n$sql -> closeCursor();\r\n$fin -> closeCursor();\r\n$conn = null;\r\n\r\n?>\r\n<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Ici c\'est l\'index</title>\r\n</head>\r\n<body>\r\n<p>Salut les bros !</p>\r\n<?php\r\n\r\nforeach ($articles as $article) {\r\n\r\necho \'<h3>\'.$articles[\'ti­tle\'].\'</h3>\';\r\necho \'<p>\'.$articles[\'con­tent\'].\'</p>\';\r\n\r\n}\r\necho \"<a href =?page=\".($currentPa­ge - 1).\" class=\'mr-10\'>Précéd­ent</a>\";\r\nfor($i = 1; $i <= $page_total; $i ++){\r\necho \"<a href=\'?page=$i\' class=\'mr-10\'>Page $i</a>\";\r\n\r\n}\r\necho \"<a href =?page=\".($currentPa­ge + 1).\" class=\'mr-10\'>Suivan­t</a>\";\r\n?>\r\n<style type=\"text/css\">\r\n.mr-10{margin-right:­ 10px;}\r\n</style>\r\n</body>\r\n</html>', 'Hassane Kabirou', '2021-06-17 20:57:54', 'assets/articles/2021-06-17 20:57:54/_profile.png', 'non', 'Article');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `JDL_commentaires` (
  `id` bigint(20) NOT NULL,
  `id_post` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '/img/login-person-w.png',
  `type` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `auteur` varchar(255) NOT NULL,
  `vue` bigint(20) NOT NULL DEFAULT 0,
  `liked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gestion des commentaires';

--
-- Dumping data for table `commentaires`
--

INSERT INTO `JDL_commentaires` (`id`, `id_post`, `contenu`, `categorie`, `photo`, `type`, `date`, `auteur`, `vue`, `liked`) VALUES
(1, '1', 'J\'ai le meme probleme', 'Electronique', 'img/login-person-w.png', 'Forum', '2021-06-15 17:19:25', 'Admin', 0, 2),
(2, '1', 'J\'ai le meme probleme', 'Electronique', 'img/login-person-w.png', 'Forum', '2021-06-15 17:20:50', 'Admin', 1, 1),
(3, '1', 'ok', 'Electronique', 'img/login-person-w.png', 'Forum', '2021-06-15 17:24:51', 'Admin', 0, 0),
(4, '2', 'Okay c\'est compris', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 18:38:38', 'Admin', 0, 0),
(5, '2', 'Okay c\'est compris', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 18:42:37', 'Admin', 0, 0),
(6, '2', 'Okay c\'est compris', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 18:45:05', 'Admin', 0, 0),
(7, '2', 'Okay c\'est compris', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 18:46:05', 'Admin', 0, 0),
(8, '2', 'Okay c\'est compris', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 18:50:42', 'Admin', 0, 0),
(9, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:15:40', 'Admin', 0, 0),
(10, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:15:50', 'Admin', 0, 0),
(11, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:17:08', 'Admin', 0, 0),
(12, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:27:47', 'Admin', 0, 1),
(13, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:28:19', 'Admin', 0, 0),
(14, '2', 'Tu veux vraiment d\'aide ?', 'Programmation', 'img/login-person-w.png', 'Forum', '2021-06-15 20:28:59', 'Admin', 0, 4),
(15, '2', 'C\'est bien jolie', 'default', '/img/login-person-w.png', 'Article', '2021-06-16 19:03:01', 'Admin', 0, 0),
(16, '6', 'Article de ouf', 'Programmation', 'img/login-person-w.png', 'Article', '2021-06-16 20:23:01', 'Admin', 0, 0),
(17, '6', 'Ok je peux t\'aider', 'Programmation', 'img/login-person-w.png', 'Article', '2021-06-16 20:23:39', 'Admin', 0, 1),
(18, '2', 'J\'ai le meme probleme', 'default', 'img/login-person-w.png', 'Article', '2021-06-16 21:36:51', 'Admin', 0, 0),
(19, '2', 'J\'ai le meme probleme', 'default', 'img/login-person-w.png', 'Article', '2021-06-16 21:39:39', 'Admin', 0, 0),
(20, '7', 'Okay maintenant tu veux quoi au juste ?', 'Construction Batiment', 'img/login-person-w.png', 'Article', '2021-06-17 01:15:37', 'Admin', 0, 1),
(21, '5', 'Et tu veux quoi ?', 'Electronique', 'img/login-person.png', 'Forum', '2021-06-17 14:28:34', 'Hassane Kabirou', 0, 2),
(22, '5', 'Et tu veux quoi ?', 'Electronique', 'img/login-person.png', 'Forum', '2021-06-17 14:28:46', 'Hassane Kabirou', 0, 0),
(23, '7', 'C\'est selon toi mec', 'Construction Batiment', 'assets/avatars/95181019_profile.png', 'Article', '2021-06-17 14:32:30', 'Hassane Kabirou', 0, 0),
(24, '7', 'C\'est selon toi mec', 'Construction Batiment', 'assets/avatars/95181019_profile.png', 'Article', '2021-06-17 14:34:29', 'Hassane Kabirou', 0, 0),
(25, '7', 'C\'est selon toi mec', 'Construction Batiment', 'assets/avatars/95181019_profile.png', 'Article', '2021-06-17 14:44:09', 'Hassane Kabirou', 0, 0),
(26, '7', 'C\'est selon toi mec', 'Construction Batiment', 'assets/avatars/95181019_profile.png', 'Article', '2021-06-17 14:44:14', 'Hassane Kabirou', 0, 0),
(27, '7', 'C\'est selon toi mec', 'Construction Batiment', 'assets/avatars/95181019_profile.png', 'Article', '2021-06-17 14:44:32', 'Hassane Kabirou', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `JDL_documents` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `lycee` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `auteur` varchar(255) NOT NULL,
  `statue` varchar(255) NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `JDL_documents` (`id`, `file`, `type`, `filiere`, `lycee`, `nom`, `date`, `auteur`, `statue`) VALUES
(1, 'assets/Documents/2021-06-15 11:18:36/epr.docx', 'Epreuve', 'STAG', 'LTN', 'epr', '2021-06-15 11:18:36', 'Admin', 'non'),
(2, 'assets/Documents/2021-06-15 11:21:33/Litteratie.docx', 'littératue', 'STI', 'LTN', 'Litteratie', '2021-06-15 11:21:33', 'Admin', 'non'),
(3, 'assets/Documents/2021-06-15 11:25:36/Litteratie.docx', 'littératue', 'STI', 'LTN', 'Litteratie', '2021-06-15 11:25:36', 'Admin', 'non'),
(4, 'assets/Documents/2021-06-15 12:31:01/Litteratie.docx', 'littératue', 'STI', 'LTN', 'Litteratie', '2021-06-15 12:31:01', 'Admin', 'non'),
(5, 'assets/Documents/2021-06-17 03:32:26/Lettre de motivation.docx', 'Autre', 'General', 'General', 'Lettre de motivation', '2021-06-17 03:32:26', 'Admin', 'non');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `JDL_forum` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `filiere` varchar(255) NOT NULL,
  `statue` varchar(100) NOT NULL DEFAULT 'non',
  `photo` varchar(255) NOT NULL DEFAULT 'img/login-person-w.png',
  `i` varchar(100) NOT NULL DEFAULT 'Forum',
  `vue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--

INSERT INTO `JDL_forum` (`id`, `msg`, `type`, `auteur`, `date`, `filiere`, `statue`, `photo`, `i`, `vue`) VALUES
(1, 'Bonjour', 'Electronique', 'Admin', '2021-06-15 13:18:52', 'STI', 'non', 'img/login-person-w.png', 'Forum', 3),
(2, 'En PHP, il est assez facile de calculer la diff&eacute;rence entre 2 dates et ainsi obtenir le nombre de jours, heures, minutes et seconde entre deux instants.', 'Programmation', 'Admin', '2021-06-15 16:38:24', 'STI', 'non', 'img/login-person-w.png', 'Forum', 15),
(3, 'Je viens de finir ce putain de site et j\'esp&egrave;re ....', 'Mecanique', 'Admin', '2021-06-16 16:55:36', 'STI', 'non', 'img/login-person-w.png', 'Forum', 0),
(4, 'J\'ai des questions concernant la math&eacute;matiques, voulez vous bien m\'aider ?', 'Construction Batiment', 'Admin', '2021-06-17 01:36:58', 'STI', 'non', 'img/login-person-w.png', 'Forum', 5),
(5, 'Bonjour j\'ai des questions et j\'ai peur', 'Electronique', 'Hassane Kabirou', '2021-06-17 14:28:01', 'STI', 'non', 'img/login-person-w.png', 'Forum', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `JDL_users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `lycee` varchar(100) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'img/login-person.png',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `JDL_users` (`id`, `nom`, `prenom`, `tel`, `lycee`, `filiere`, `photo`, `date`, `mdp`) VALUES
(2, 'KIDJE', 'Elfried', '96457545', 'LTN', 'HR', 'assets/avatars/_profile.png', '2021-06-17 11:38:09', '$2y$10$GQw8uYrK25OnFzD66eL35OFddRSRkGtVwTE3DPNaey0mkfkoLkPhi'),
(3, 'Hassane', 'Kabirou', '95181019', 'LTN', 'STI', 'assets/avatars/95181019_profile.png', '2021-06-17 11:43:46', '$2y$10$AzbJ4rW4rcHQT2.MbHjuZ.7KJN7WSK70zfS/SAB39kTLPXx3He/2e'),
(5, 'Adam', 'Assoumailou', '66185960', 'LTN', 'STAG', 'img/login-person.png', '2021-06-17 13:28:12', '$2y$10$Hn8uwolfKxpKAtHewt0j.u7ezb5U.Sgmu/Jd/iUqQtlSDW7kvjmQO'),
(6, 'Hassane', 'Kabirou', '96431150', 'LTN', 'STI', 'img/login-person.png', '2021-06-17 14:22:32', '$2y$10$pGec7cYSeBclHo4QxeLlp.KNMRZsLvlfKTlKN81ekcLtyhV3Bw1O2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `JDL_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `JDL_commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `JDL_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `JDL_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `JDL_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `JDL_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `JDL_commentaires`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `JDL_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `JDL_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `JDL_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
