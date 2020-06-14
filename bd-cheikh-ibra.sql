-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 juin 2020 à 00:17
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd-cheikh-ibra`
--

-- --------------------------------------------------------

--
-- Structure de la table `creerquestion`
--

CREATE TABLE `creerquestion` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `point` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creerquestion`
--

INSERT INTO `creerquestion` (`id`, `question`, `point`, `reponse`) VALUES
(13, 'Capitale du Sénégal ?', 55, 'texte'),
(14, 'Quelles les langages webs?', 40, 'multiple'),
(16, 'Qui est babs diop?', 45, 'simple'),
(18, 'Qui a creer Thiebou Dieunn ?', 46, 'simple'),
(19, 'Cest qui Dialika?', 45, 'simple'),
(20, 'Quelles  sont les couleurs du drapeau du senegal ?', 20, 'multiple');

-- --------------------------------------------------------

--
-- Structure de la table `questionrepondue`
--

CREATE TABLE `questionrepondue` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reponsequestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponsequestion`
--

CREATE TABLE `reponsequestion` (
  `id` int(11) NOT NULL,
  `reponses` longtext NOT NULL,
  `etat` varchar(255) NOT NULL,
  `id_creerquestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponsequestion`
--

INSERT INTO `reponsequestion` (`id`, `reponses`, `etat`, `id_creerquestion`) VALUES
(9, 'Dakar', 'true', 13),
(10, 'css', 'true', 14),
(11, 'html', 'true', 14),
(12, 'php', 'true', 14),
(13, 'c++', 'false', 14),
(17, 'expert en iformatique', 'true', 16),
(18, 'macon', 'false', 16),
(19, 'docker', 'false', 16),
(22, 'doudou mbengue', 'false', 18),
(23, 'penda mbaye', 'true', 18),
(24, 'actrice comedienne', 'true', 19),
(25, 'animatrice', 'false', 19),
(26, 'rouge', 'true', 20),
(27, 'maron', 'false', 20),
(28, 'jaune', 'true', 20),
(29, 'vert', 'true', 20);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `score`, `id_user`) VALUES
(1, 100, 1),
(2, 120, 2),
(3, 0, 3),
(4, 450, 4),
(5, 250, 5),
(6, 400, 6),
(7, 200, 7),
(8, 350, 8),
(9, 150, 9),
(10, 370, 9),
(11, 50, 10),
(12, 80, 11),
(13, 90, 12),
(14, 125, 10),
(15, 1250, 11),
(16, 345, 12),
(17, 425, 14);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `nom`, `prenom`, `password`, `avatar`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'admin0000', '../IMAGE/admin@gmail.com.png', 'admin'),
(2, 'asna@gmail.com', 'Diop', 'asna', 'asna0000', '../IMAGE/asna@gmail.com.png', 'joueur'),
(3, 'fall@gmail.com', 'fall', 'babacar', 'fall0000', '../IMAGE/fall@gmail.com.jpeg', 'joueur'),
(4, 'karim@gmail.com', 'sidibe', 'abdou karim', 'sidibe0000', '../IMAGE/karim@gmail.com.jpg', 'joueur'),
(5, 'diallo@gmail.com', 'Diallo', 'Moussa', 'diallo0000', '../IMAGE/Mbayedozé@gmail.com.png', 'joueur'),
(6, 'dione@gmail.com', 'diop', 'assane', 'dione0000', '../IMAGE/dione@gmail.com.jpg', 'joueur'),
(8, 'cheikh@gmail.com', 'diop', 'Cheikh Ibra', 'diop0000', '../IMAGE/cheikh@gmail.com.jpg', 'admin'),
(9, 'dieng@gmail.com', 'dieng', 'ndeye khady', 'dieng0000', '../IMAGE/dieng@gmail.com.jpeg', 'admin'),
(11, 'ndao@gmail.com', 'ndao', 'ngor', 'ndaw0000', '../IMAGE/ndao@gmail.com.png', 'joueur'),
(12, 'ndew@gmail.com', 'diop', 'ndew', 'diop0000', '../IMAGE/ndew@gmail.com.png', 'joueur'),
(13, 'falle@gmail.com', 'fall', 'Cheikh Ibra', '12345678', '../IMAGE/falle@gmail.com.jpeg', 'joueur'),
(14, 'coumba@gmail.com', 'diop', 'coumba', 'diop0000', '../IMAGE/coumba@gmail.com.jpeg', 'joueur'),
(15, 'bousso@gmail.com', 'ndiaye', 'bousso', '00000', '../IMAGE/bousso@gmail.com.jpeg', 'joueur'),
(16, 'faye@gmail.com', 'faye', 'diana', 'diana0000', '../IMAGE/faye@gmail.com', 'joueur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creerquestion`
--
ALTER TABLE `creerquestion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questionrepondue`
--
ALTER TABLE `questionrepondue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponsequestion`
--
ALTER TABLE `reponsequestion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creerquestion`
--
ALTER TABLE `creerquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `questionrepondue`
--
ALTER TABLE `questionrepondue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponsequestion`
--
ALTER TABLE `reponsequestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
