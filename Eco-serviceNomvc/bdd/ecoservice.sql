-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 juil. 2021 à 10:48
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecoservice`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre_article` text NOT NULL,
  `prix` float NOT NULL,
  `img` text NOT NULL,
  `description` text NOT NULL,
  `categoriearticle` text NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre_article`, `prix`, `img`, `description`, `categoriearticle`, `date_ajout`) VALUES
(3, 'Shampoing au œufs', 29.99, 'article1.jpg', 'Premier article qui coute 29,99', 'Shampoing', '2021-04-11 22:11:00'),
(33, 'Ordinateur Titre', 89, 'article33.png', 'Description de l\'article ordinateur', 'Ordinateur', '2021-04-26 00:02:51'),
(34, 'Boite', 49, 'article34.png', 'Description de l\'article Boite', 'Boites', '2021-04-26 00:03:37'),
(39, 'Article 2', 129, 'article39.jpg', 'Description de l\'article numéro 2', 'Ordinateur', '2021-04-26 00:10:53'),
(44, 'PACK DE 5 ÉPONGES ÉCOLOGIQUES ET RÉUTILISABLES', 22.99, 'article44.png', 'éponges écologiques et réutilisables en micro-fibres.', 'Eponges', '2021-04-26 09:15:39');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `nb_articles` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `statut` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `prix`, `nb_articles`, `date_commande`, `statut`, `idUser`) VALUES
(38, '703.00', 7, '2021-04-26', 2, 12),
(39, '133.99', 1, '2021-04-26', 2, 12),
(40, '377.94', 7, '2021-04-26', 2, 14),
(41, '1677.00', 13, '2021-04-26', 1, 14),
(42, '73.96', 3, '2021-06-27', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `texte`, `date_commentaire`, `idUser`, `idArticle`) VALUES
(19, 'qdsdsq', '2021-04-25 12:27:53', 12, 3),
(20, 'dr', '2021-04-26 00:30:27', 12, 39),
(23, 'Voici mon commentaire sur l\'article', '2021-06-27 23:06:33', 9, 44);

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE `detailcommande` (
  `idArticle` int(11) NOT NULL,
  `exemplaire` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detailcommande`
--

INSERT INTO `detailcommande` (`idArticle`, `exemplaire`, `idCommande`) VALUES
(33, 5, 38),
(39, 2, 38),
(39, 1, 39),
(44, 5, 40),
(39, 2, 40),
(39, 13, 41),
(44, 3, 42);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Nottation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idArticle`, `idUser`, `Nottation`) VALUES
(3, 12, 5),
(3, 13, 1),
(44, 14, 5),
(44, 12, 1),
(39, 14, 3),
(44, 9, 5);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `exemplaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `telnum` int(10) NOT NULL,
  `mdp` text NOT NULL,
  `adresse` text NOT NULL,
  `zip` varchar(5) NOT NULL,
  `country` text NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `statut` int(11) NOT NULL,
  `siret` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `telnum`, `mdp`, `adresse`, `zip`, `country`, `prenom`, `nom`, `statut`, `siret`) VALUES
(3, 'rezezrre@hotmail.com', 0, 'bf5cc752ec79e865f373a52cccc2c0bbe0c5d6f3', '36 rue berezzerzaudin', '', '', 'rez', 'Bugarinrezre', 1, 'erzrze'),
(4, 're', 0, 'c387c982a132d05cbd5f88840aef2c8157740049', 'er', '', '', 'er', 'rere', 1, NULL),
(6, 'admin@gmail.com', 0, '3252d89d93bfb1327e2d3aae9187b565dac6d085', 'admin@gmail.com', '', '', 'admin@gmail.com', 'admin@gmail.com', 1, 'admin@gmail.com'),
(9, 'admin@hotmail.com', 0, '$2y$10$RI9joqjfO4LZWnkUjM03fO3SxH68b.YJDdbJ9h0VGHxPHHtW4vpx2', 'adresse', '', '', 'admin prenom', 'admin nom', 2, ''),
(10, 'azerty@hotmail.com', 0, '$2y$10$r/1OW5qVJG0Ed8MCpU7SKeyMh9sHAYvGuCKmXwtdW4ZnZ9zPJ428G', 'azerrtty', '', '', 'azerty', 'azerty', 1, 'azerty'),
(12, 'azert@gmail.com', 101010101, '$2y$10$.cO8T7.NmCCnKIx7mvOprOk0nxPwMRMeq.a6nO03Secy7F9I4P3Ta', 'azert', '75000', 'France', 'Prenom admin', 'Nom', 2, '362 521 879 00034'),
(13, 'testfinal@gmail.com', 101010101, '$2y$10$C/vxfVxhQeq6IAvA5OcEO.jhvBTkK7AWdGDMoHtCBfUDaqvf.xWQW', 'testfinal', '93130', 'Afghanistan', 'testfinal', 'testfinal', 1, '21389898921389'),
(14, 'testpres@gmail.com', 612782987, '$2y$10$sBGjw3BnGd9RBaCM0VzdZOuTcDAJ53iRgKhDDMY8mWONY6vsJDS.6', '36 rue baudin', '93130', 'Algeria', 'testpres', 'testpres', 1, '01010101010101010101');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusera_article` (`idUser`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser_commentaire` (`idUser`),
  ADD KEY `idArticle_Commentaire` (`idArticle`);

--
-- Index pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD KEY `idArticle_detailCommande` (`idArticle`),
  ADD KEY `idCommande` (`idCommande`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD KEY `idArticle_Note` (`idArticle`),
  ADD KEY `idUser_note` (`idUser`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD KEY `iduser_panier` (`idUser`),
  ADD KEY `idArticle_panier` (`idArticle`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD CONSTRAINT `detailcommande_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `detailcommande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
