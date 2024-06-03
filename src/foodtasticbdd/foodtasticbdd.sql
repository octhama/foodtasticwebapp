-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 23 sep. 2019 à 00:58
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `foodtasticbdd`
--

-- -------------------------------------------------------

--
-- Structure de la table `images_produits`
--

CREATE TABLE `images_produits` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `nomimgprod` varchar(512) NOT NULL,
  `datecrea` datetime NOT NULL,
  `datemodif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images_produits`
--

INSERT INTO `images_produits` (`id`, `produit_id`, `nomimgprod`, `datecrea`, `datemodif`) VALUES
(83, 30, 'jura.jpeg', '2016-10-28 20:58:02', '2019-09-07 00:00:46'),
(81, 29, 'sauvignon.jpeg', '2016-10-28 20:56:23', '2019-09-07 00:00:04'),
(79, 28, 'joubert.jpeg', '2016-10-28 20:52:43', '2019-09-06 23:59:13'),
(77, 27, 'chianti.jpeg', '2016-10-28 20:49:40', '2019-09-06 23:58:40'),
(84, 31, 'jacobcreek.jpeg', '2016-10-28 20:59:20', '2019-09-07 00:05:22'),
(87, 32, 'jamfraise.jpeg', '2016-10-28 21:03:19', '2019-09-07 01:19:54'),
(89, 33, 'jamorange.jpeg', '2016-10-28 21:05:30', '2019-09-07 01:30:23'),
(93, 34, 'cookie1.jpeg', '2016-10-28 21:06:34', '2019-09-07 02:35:17'),
(94, 35, 'cookie2.jpeg', '2016-10-28 21:08:05', '2019-09-07 02:35:24'),
(96, 36, 'oliveoil.jpeg', '2016-10-28 21:08:52', '2019-09-07 01:05:38'),
(99, 37, 'cookie3.jpeg', '2016-10-28 21:09:44', '2019-09-07 02:35:32'),
(102, 38, 'cookie4.jpeg', '2016-10-28 21:46:06', '2019-09-07 02:35:42'),
(104, 40, 'cookiehome.jpeg', '2016-11-02 20:15:38', '2019-09-07 02:35:10'),
(51, 14, 'cookies.jpeg', '0000-00-00 00:00:00', '2019-09-07 02:36:17'),
(53, 15, 'homecake.jpeg', '0000-00-00 00:00:00', '2019-09-07 02:36:40'),
(54, 16, 'brownie.jpeg', '0000-00-00 00:00:00', '2019-09-07 02:37:07'),
(116, 95, 'yellowbanana.jpeg', '2016-09-18 01:03:15', '2019-09-07 00:13:44'),
(114, 93, 'redapplefruits.jpeg', '2016-10-13 16:31:58', '2019-09-07 00:13:25'),
(115, 94, 'reddragonfruits.jpeg', '2016-10-13 16:31:58', '2019-09-07 00:13:25'),
(59, 17, 'whitecookie.jpeg', '0000-00-00 00:00:00', '2019-09-07 02:38:55'),
(108, 83, 'pepper.jpeg', '2019-09-06 00:00:00', '2019-09-07 12:09:15'),
(109, 82, 'brocoli.jpeg', '2019-09-06 00:00:00', '2019-09-06 19:45:40'),
(112, 91, 'melon.jpeg', '2019-09-02 00:00:00', '2019-09-07 12:18:55'),
(113, 92, 'orangefruits.jpeg', '2016-10-13 16:31:58', '2019-09-07 00:13:25'),
(110, 81, 'freshtomatoes.jpeg', '2019-09-02 00:00:00', '2019-09-07 12:08:48'),
(111, 90, 'mangoes.jpeg', '2019-09-02 00:00:00', '2019-09-07 12:19:01'),
(67, 19, 'macaron.jpeg', '0000-00-00 00:00:00', '2019-09-07 02:40:25'),
(107, 80, 'garlic.jpeg', '2019-09-06 00:00:00', '2019-09-06 19:45:40'),
(75, 25, 'tradhoney.jpeg', '2016-09-18 01:03:15', '2019-09-07 00:13:44'),
(76, 20, 'honeybottle.jpeg', '2016-10-13 16:31:58', '2019-09-07 00:13:25'),
(105, 22, 'honey.jpg', '2019-09-02 00:00:00', '2019-09-02 19:45:40'),
(106, 45, 'onlyhoney.jpeg', '2019-09-06 00:00:00', '2019-09-06 19:45:40');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nomprod` varchar(512) NOT NULL,
  `description` mediumtext NOT NULL,
  `prixprod` decimal(10,2) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(512) NOT NULL,
  `datecrea` datetime NOT NULL,
  `datemodif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nomprod`, `description`, `prixprod`, `id_categorie`, `nom_categorie`, `datecrea`, `datemodif`) VALUES
(27, 'Villa Lucia Chianti ', 'Villa Lucia Chianti Vin rouge Italien millésime 2004', '200.00', 14, 'Vin ', '2019-09-07 20:49:40', '2019-09-07 12:49:40'),
(28, 'Niel Joubert ', 'Vin des vignobles Joubert d\'Afrique du Sud millésime 2014 Shiraz since 1898', '400.00', 14, 'Vin', '2019-09-07 20:52:43', '2019-09-07 19:52:43'),
(29, 'Sauvignon Blanc', 'Vin des vignobles Sauvignon en Nouvelle-Zélande Smooth & Full Bodied MARLBOROUGH - 2018', '150.00', 14, 'Vin', '2019-09-07 20:56:23', '2019-09-07 19:56:23'),
(30, 'Jura ', 'Vin de paille CÔTEST DU JURA APPELLATION D\'ORIGINE CONTROLEE 2011 produit en France par la fruitière VINICOLE D\'ARBOIS since 1906', '159.45', 14, 'Vin', '2019-09-07 20:58:02', '2019-09-07 19:58:02'),
(20, 'Miel bio naturel \"Les Abeilles\"', 'Miel pure des ruches Les Abeilles fabrication 100% naturelle   ', '35.45', 13, 'Miel', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(31, 'JACOB\'S CREEK ', 'Vin JACOB\'S CREEK DOUBLE BARREL MATURED SHIRAZ 5TH VINTAGEfinished in aged scotch whisky barrels WINEMAKERS SINCE 1947', '300.60', 14, 'Vin', '2019-09-07 20:59:20', '2019-09-07 19:59:20'),
(25, 'Miel bio fabrication strictement traditionnelle naturel MonHoney', 'Miel pure des ruches MonHoney fabrication strictement traditionnelle  ', '45.00', 13, 'Miel', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(32, 'Confiture de Fraise', 'Confiture de fraise 100% naturel issu de la production locale française sans aucun additif ', '10.50', 16, 'Jam', '2019-09-07 21:03:19', '2019-09-07 20:03:19'),
(94, 'Fruit du dragon rouge', 'Fruit du dragon rouge 100% naturelle  issu de la production locale Belge sans aucun additif ', '5.50', 19, 'Fruit ', '2019-09-07 21:05:30', '2019-09-07 20:05:30'),
(33, 'Confiture d\'orange', 'Confiture d\'orange 100% naturelle  issu de la production locale Belge sans aucun additif ', '29.99', 16, 'Jam', '2019-09-07 21:05:30', '2019-09-07 20:05:30'),
(92, 'Orange', 'Orange issue d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '2.00', 19, 'Fruit ', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(93, 'Pomme rouge ', 'Pomme rouge 100% naturelle  issu de la production locale Belge sans aucun additif ', '5.50', 19, 'Fruit ', '2019-09-07 21:05:30', '2019-09-07 20:05:30'),
(34, 'Biscuits aux amandes  naturelles  ', 'Cookie aux amandes 100% naturelles de chez la boulangère ', '5.00', 17, 'Cookie', '2019-09-07 21:06:34', '2019-09-07 20:06:34'),
(35, 'Cookie fait maison', 'Cookie fait maison français au pépite de chocolat au lait ', '4.00', 17, 'Cookie', '2019-09-07 21:08:05', '2019-09-07 20:08:05'),
(83, 'Poivron rouge', 'Poivron rouge issu d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '1.00', 18, 'Legume', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(91, 'Pastèque ', 'Pastèque issue d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '2.00', 19, 'Fruit ', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(36, 'Huile d\'olive ', 'Huile d\'olive 100% naturel produit en campagne', '10.50', 15, 'Huile', '2019-09-07 21:08:52', '2019-09-07 20:08:52'),
(95, 'Banane Jaune', 'Banane Jaune 100% naturelle  issu de la production locale Brésilienne sans aucun additif ', '5.50', 19, 'Fruit ', '2019-09-07 21:05:30', '2019-09-07 20:05:30'),
(37, 'Biscuit au chocolat noir ', 'Cookie fait maison au chocolat noir 100% naturel', '3.00', 17, 'Cookie', '2019-09-07 21:09:44', '2019-09-07 20:09:44'),
(80, 'Assortiment d’ails ', 'Ails issu d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '4.00', 18, 'Legume', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(90, 'Mangues', 'Mangues issues d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '2.00', 19, 'Fruit ', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(82, 'Assortiment de Brocoli', 'Brocolis issu d\'une agriculture responsable sans OGM et sans aucun additif chimique quelconque...produit 100% naturel  ', '10.00', 18, 'Legume ', '2019-09-06 00:00:00', '2019-09-05 23:00:00'),
(38, 'Cookie au beurre et aux amandes croquantes ', 'Biscuit fait maison 100% naturelle sans aucun additif ', '2.00', 17, 'Cookie', '2019-09-07 21:46:06', '2019-09-07 20:46:06'),
(16, 'Brownies', 'Des brownies au cacao 100% naturels...production 100% locale Belge', '2.50', 17, 'Cookie', '2019-09-07 00:00:00', '2019-09-06 23:00:00'),
(19, 'Assortiment de macarons ', 'Des macarons au chocolat blanc et noir 100% naturels...production 100% locale Française ', '7.50', 17, 'Cookie', '2019-09-07 00:00:00', '2019-09-06 23:00:00'),
(40, 'Biscuit fourré au chocolat noir ', 'Biscuit fait maison avec de la farine de blé naturelle...zero OGM zero additif produit 100% naturel', '4.00', 17, 'Cookie', '2019-09-07 20:15:38', '2019-09-07 19:15:38'),
(14, 'Assortiment de crackers ', 'Des biscuits 100% naturels produits en campagne ', '3.50', 17, 'Cookie', '2019-09-07 00:00:00', '2019-09-06 23:00:00'),
(15, 'Mini mefine au chocolat', 'Des mefine au pépites de chocolat 100% naturels...production 100% locale ', '5.50', 17, 'Cookie', '2019-09-07 00:00:00', '2019-09-06 23:00:00'),
(22, 'Miel bio naturel LaCroix', 'Miel pure des ruches LaCroix cultivés en plein air ', '20.00', 13, 'Miel', '2019-09-03 00:00:00', '2019-09-02 23:00:00'),
(45, 'Miel bio naturel OnlyHoneyAndYou', 'Miel pure des ruches OnlyHoneyAndYou  ', '25.00', 13, 'Miel', '2019-09-06 00:00:00', '2019-09-05 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `identifiant`, `mail`, `mot_de_passe`) VALUES
(4, 'hasma', 'hasma@foodtastic.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(20, 'test', 'test@email.com', '9cf95dacd226dcf43da376cdb6cbba7035218921');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images_produits`
--
ALTER TABLE `images_produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images_produits`
--
ALTER TABLE `images_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
