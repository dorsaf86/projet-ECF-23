-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 27 fév. 2023 à 11:27
-- Version du serveur : 5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tab_food`
--
CREATE DATABASE IF NOT EXISTS `tab_food` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tab_food`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `name_categorie` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `name_categorie`) VALUES
(1, 'dessert'),
(2, 'burger'),
(3, 'plats'),
(4, 'poisson'),
(5, 'gratin');

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

CREATE TABLE `formules` (
  `idFormule` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `formule_name` varchar(80) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`idFormule`, `prix`, `formule_name`, `description`, `idMenu`) VALUES
(8, 20, 'midi', 'menu destinée aux touristes', 7),
(9, 20, 'midi', 'menu destinée aux touristes', 7);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id_horaire` int(11) NOT NULL,
  `jour` varchar(60) DEFAULT NULL,
  `ouverture` time DEFAULT NULL,
  `fermeture` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id_horaire`, `jour`, `ouverture`, `fermeture`) VALUES
(1, 'lundi', '12:00:00', '23:00:00'),
(2, 'mardi', '12:00:00', '23:00:00'),
(3, 'mercredi', '19:00:00', '23:00:00'),
(4, 'jeudi', '19:00:00', '00:00:00'),
(5, 'vendredi', '19:00:00', '02:00:00'),
(6, 'samedi', '11:00:00', '02:00:00'),
(7, 'dimanche', '11:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_titre` varchar(50) NOT NULL,
  `img_src` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`img_id`, `img_titre`, `img_src`) VALUES
(30, 'soupe', 'https://weknowyourdreams.com/images/soup/soup-3.jpg'),
(34, 'fruit de mer', 'https://antico.ca/wp-content/uploads/2011/02/entree-fruits-mer.jpg'),
(36, 'ratatouille', 'https://cdn.pixabay.com/photo/2015/10/30/17/29/healthy-food-1014490__340.jpg'),
(38, 'Risotto au champigons', 'https://tse1.mm.bing.net/th?id=OIP._mxn0QoLh4kPYpu7ngMGVAHaEJ&pid=Api&rs=1&c=1&qlt=95&w=201&h=112'),
(39, 'canard au miel', 'https://tse1.mm.bing.net/th?id=OIP.S0SY2BVYTNkgEkCMHGJQwAHaHa&pid=Api&rs=1&c=1&qlt=95&w=120&h=120'),
(40, 'tartiflette a la savoie', 'https://i.pinimg.com/564x/97/b3/75/97b37536b0a02ba209a9234d07e43863.jpg'),
(41, 'Diot au vin blanc', 'https://img-3.journaldesfemmes.fr/l6Tvow_mEx4If_31eDQwbt9qbDg=/225x150/smart/b1d9953bcb4f48c6baeafd0ab3fc1eec/recipe-jdf/369866.jpg'),
(42, 'Biscuit de savoie', 'https://img-3.journaldesfemmes.fr/ZuzyPmeA7ONfmqJa9JzW6LEfb4c=/225x150/smart/2034fee67f86478b941852af945672a2/recipe-jdf/361766.jpg'),
(43, 'Paralinois', 'https://img-3.journaldesfemmes.fr/fT9TVHir5uW3QoLtI4j13_SnAr8=/750x500/smart/dc70cfbb7d7b4b3e90eb8dcd4008eaa5/recipe-jdf/303362.jpg'),
(53, 'riz au curry', 'https://images.pexels.com/photos/1624487/pexels-photo-1624487.jpeg?auto=compress&cs=tinysrgb&w=600'),
(54, 'salade', 'https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=600');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `titre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `titre`) VALUES
(1, 'montagne'),
(2, 'titre'),
(3, 'titre'),
(4, 'test menu'),
(5, 'test menu'),
(6, 'test menu 2'),
(7, 'soleil');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `idPlat` int(11) NOT NULL,
  `titre` varchar(60) DEFAULT NULL,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`idPlat`, `titre`, `description`, `prix`, `idCategorie`) VALUES
(1, 'ile flottante', 'desssert froid ', 12, 1),
(2, 'big mac', 'humbegre fais maison', 10, 2),
(3, 'tajine', 'tajine origine maghreben', 20, 3),
(12, 'creme', 'creme anglaise', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_Reservation` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `allergy` varchar(60) DEFAULT NULL,
  `nb_personnes` int(11) NOT NULL,
  `idUsers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_Reservation`, `email`, `username`, `date`, `time`, `allergy`, `nb_personnes`, `idUsers`) VALUES
(1, 'dosraf@gmail.com', 'nhidi', '2023-01-26', '16:21:28', NULL, 0, NULL),
(2, 'dorsaf@gmail.com', 'dorsaf', '2023-01-31', '19:50:10', 'poisson', 4, NULL),
(3, 'test@mail', 'name test', '2023-02-24', '12:45:00', 'test allergies', 2, NULL),
(4, 'test1@mail', 'test', '2023-02-10', '12:30:00', 'test', 1, NULL),
(5, 'test@gmail.com', 'test', '2023-02-13', '12:30:00', 'test', 2, NULL),
(6, 'test@gmail.com', 'test', '2023-02-12', '12:30:00', 'test', 3, NULL),
(7, 'mari@gmail.com', 'marina', '2023-02-19', '12:30:00', 'poisson', 4, NULL),
(8, 'test1@gmail.com', 'test1', '2023-02-28', '13:30:00', 'poisson', 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nbPersonnes` varchar(60) DEFAULT '',
  `allergy` varchar(60) DEFAULT '',
  `ROLE` varchar(60) DEFAULT 'client',
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `email`, `password`, `nbPersonnes`, `allergy`, `ROLE`, `username`) VALUES
(15, 'test3@gmail.com    ', '$2y$10$9GABK7MOvEhzmGlIKE5a0O4YbJyKLknATP3BzznKZJSaHAppGlcDO', '4    ', '   test   ', 'client', '   test 3'),
(16, 'test4@gmail.com    ', '$2y$10$nLZ.eyUj1n9u6HUNtIxMquqDEknq368X9nQal2TwJ7jmjIxfvX25K', '2    ', '   test4   ', 'client', '   test4'),
(32, 'test1@gmmail.com', '$2y$10$Mww35F1ZJ.rSiOXprtzALuW1pdVhtlHXAUUagdhT7KoOn5x9xOfnO', '1', 'test1', 'client', 'test1'),
(33, 'laurant@gmail.com', '$2y$10$7FgNaxacXE0iKXGOkXE5puFQvB.2bZJmwVJ.AZ7/j6AenhLKrOR92', '', '', 'admin', 'laurent vinecent');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `formules`
--
ALTER TABLE `formules`
  ADD PRIMARY KEY (`idFormule`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id_horaire`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`idPlat`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_Reservation`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `idFormule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `idPlat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_Reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formules`
--
ALTER TABLE `formules`
  ADD CONSTRAINT `formules_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`);

--
-- Contraintes pour la table `plats`
--
ALTER TABLE `plats`
  ADD CONSTRAINT `plats_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
