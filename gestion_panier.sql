-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3302
-- Généré le : jeu. 16 mars 2023 à 23:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_panier`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `qte` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_produit`, `qte`) VALUES
(23, 13, 5),
(22, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `des` text NOT NULL,
  `qte` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `image`, `prix`, `des`, `qte`) VALUES
(15, 'Oranger du Mexique Aztec Pearl', '1.jpg', 5.33, 'Le Choisya ternata \'Aztec Pearl\' a un feuillage plus fin et plus découpé que les autres orangers du Mexique.', 1),
(8, 'Pachira', '2.jpg', 56.99, 'Le pachira est une formidable plante d’intérieur, à l’allure plutôt contemporaine.', 11),
(6, 'Monstera Deliciosa', '3.avif', 59.4, 'Monstera Deliciosa, également connu sous le nom de Plante à Trous en raison des trous caractéristiques de ses feuilles.', 99),
(13, 'Arbre à papillons Flower Power', '4.jpg', 8.5, 'L’Arbre à papillons Flower Power est d’une extraordinaire beauté. Il produit de Juillet à Septembre des épis de fleurs pourprées qui s’épanouissent sur un très beau dégradé de orange, rose à mauve puis violet. Il nous offre un fabuleux spectacle au jardin.', 35),
(16, 'Le Jasmin de grasse', '5.jpg', 9, 'Le Jasmin de grasse ou Jasminum grandiflorum Grasse est la fameuse variété de jasmin cultivée et utilisée par les grandes parfumeries. De Mai à Novembre, ses fleurs dégagent un sublime parfum et embaument le jardin ou la terrasse de sa fragrance unique.', 60),
(17, 'Agastache Black Adder', '6.jpg', 5.33, 'Une belle floraison tous au long de l\'été. Cette agastache est aprécié pour sa floraison en épis mellifères.', 24);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
