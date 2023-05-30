-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 mai 2023 à 17:24
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twinshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(33, 'mohamedfof', 'fofana@admin.com', 'monoshop#123'),
(34, 'djiba', 'mohamedfofana35700@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `note` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_commande` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE `detailcommande` (
  `id_commande` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`) VALUES
(1, 'https://img-4.linternaute.com/tRpVsqBGzoIJoDFJ-OaKM5ODgB4=/1500x/smart/94432d9c302f408491049b6f58513074/ccmcms-linternaute/10975863.jpg', 'Casquette Baseball', 12, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facere culpa nobis impedit dolore ex tenetur nesciunt, magni sed sapiente aspernatur exercitationem, dolorum unde veritatis quisquam voluptatibus fugiat officia vero!'),
(2, 'https://fr.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton-sac-n%C3%A9ono%C3%A9-mm-cuir-monogram-empreinte-bicolore-sacs-%C3%A0-main--M45555_PM1_Back%20view.jpg', 'sac louis vuitton', 745, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facere culpa nobis impedit dolore ex tenetur nesciunt, magni sed sapiente aspernatur exercitationem, dolorum unde veritatis quisquam voluptatibus fugiat officia vero!');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
  ADD CONSTRAINT `detailcommande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `detailcommande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
