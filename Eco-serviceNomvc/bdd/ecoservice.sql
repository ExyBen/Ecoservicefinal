-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 avr. 2021 à 16:22
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
(3, 'Shampoing au œufs', 29.99, 'article1', 'Premier article qui coute 29,99', 'Shampoing', '2021-04-11 22:11:00'),
(4, 'Sac à main eco-responsable', 19, 'article2', 'Deuxieme article qui coute 19,99', 'Sac', '2021-04-11 22:21:00'),
(5, 'Bouteille recyclée', 99, 'article3', 'Troisieme article qui coute 99,99', 'Bouteille', '2021-04-11 22:22:00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` text NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE `detailcommande` (
  `idArticle` int(11) NOT NULL,
  `exemplaire` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Nottation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `mdp` text NOT NULL,
  `adresse` text NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `statut` int(11) NOT NULL,
  `siret` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `adresse`, `prenom`, `nom`, `statut`, `siret`) VALUES
(3, 'rezezrre@hotmail.com', 'bf5cc752ec79e865f373a52cccc2c0bbe0c5d6f3', '36 rue berezzerzaudin', 'rez', 'Bugarinrezre', 1, 'erzrze'),
(4, 're', 'c387c982a132d05cbd5f88840aef2c8157740049', 'er', 'er', 'rere', 1, NULL),
(5, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', 1, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `note` (`idArticle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD CONSTRAINT `detailcommande_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`);

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
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
