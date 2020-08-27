-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 25 août 2020 à 15:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `todotask`
--

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(35) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_create` date NOT NULL,
  `name_avatar` varchar(50) DEFAULT NULL,
  `city` varchar(100) NOT NULL DEFAULT 'Paris'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `mail`, `pass`, `date_create`, `name_avatar`, `city`) VALUES
(1, 'thomas', 'genet@gmail.com', 'thomasthomas', '2020-07-24', NULL, 'Paris'),
(2, 'thomas62800', 'genet8@gmail.com', '$2y$10$qCbWaqwkI3GzugFNE3bSL.nrnObrhPE8vFfETC1YddpXsvKezExIW', '2020-07-24', NULL, 'Paris'),
(3, 'thomas62900', 'genet9@gmail.com', '$2y$10$yHv3b3eyuLoJvKtnEdeTTOF6umIEp3jXA5b5aPX6JHNGcA0vZjy6K', '2020-07-24', NULL, 'Paris'),
(4, 'thomas62100', 'genet1@gmail.com', '$2y$10$YorD.bvwtiC/lqEX9y0gSem8gKpziNzJKCLkHiFC6oCkjS3rBrSh.', '2020-07-27', NULL, 'lyon'),
(5, 'thomas2', 'genet2@gmail.com', '$2y$10$QCn03BRPXGNEcYLBz78Mb.s7qp0auKJFkKecDAag3xxivqU3VFHge', '2020-07-27', '5.jpg', 'marseille'),
(6, 'thomas90', 'genet90@gmail.com', '$2y$10$X0ks3nYtBJXhiMWEJcdkteVwbeyzy1XvyDavy82V/emsW2Ve3ikMG', '2020-07-31', NULL, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_project` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `id_member`, `title`, `date_project`) VALUES
(1, 5, 'projet 1', '2020-07-27'),
(2, 5, 'Projet 2', '2020-07-27'),
(3, 5, 'Projet 3', '2020-07-27'),
(4, 5, 'Projet 4', '2020-07-27'),
(5, 5, 'Projet 5', '2020-07-27'),
(6, 5, 'Projet 6', '2020-07-27'),
(8, 6, 'Projet 7', '2020-07-31'),
(9, 5, 'Projet 7', '2020-08-16'),
(10, 5, 'Projet 8', '2020-08-23'),
(11, 5, 'Projet 9', '2020-08-25'),
(12, 5, 'Projet 10', '2020-08-25'),
(13, 5, 'Projet 11', '2020-08-25');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `id_project` int(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id`, `id_project`, `content`, `date`) VALUES
(9, 1, 'Section 1', '2020-07-31'),
(10, 1, 'Section 2', '2020-08-01'),
(11, 1, 'Section 3', '2020-08-07'),
(12, 1, 'Section 4', '2020-08-14');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `id_section`, `content`, `status`, `date`) VALUES
(2, 9, 'test update 1', 0, '2020-08-06 22:00:00'),
(3, 10, 'test 2 ', 0, '2020-08-06 22:00:00'),
(4, 10, 'test 2 sec 2', 0, '2020-08-06 22:00:00'),
(5, 9, 'test idsection', 0, '2020-08-06 22:00:00'),
(6, 10, 'test 3 sec 2', 0, '2020-08-06 22:00:00'),
(7, 10, 'test 4 sec 2', 0, '2020-08-06 22:00:00'),
(8, 9, 'test 4', 0, '2020-08-06 22:00:00'),
(11, 10, 'task', 1, '2020-08-13 22:00:00'),
(12, 10, 'test', 0, '2020-08-13 22:00:00'),
(13, 12, 'test sec 3', 0, '2020-08-13 22:00:00'),
(14, 10, 'test sec 1', 0, '2020-08-14 22:00:00'),
(15, 10, 'test', 0, '2020-08-14 22:00:00'),
(17, 10, 'test sec 2', 0, '2020-08-14 22:00:00'),
(18, 11, 'test sec 3', 0, '2020-08-14 22:00:00'),
(19, 9, 'test 5', 0, '2020-08-22 22:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lier section et project` (`id_project`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lier task et section` (`id_section`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `lier section et project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `lier task et section` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE;
