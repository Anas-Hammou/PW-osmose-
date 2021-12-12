-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 déc. 2021 à 09:53
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `article`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `idcategorie`, `auteur`, `date`) VALUES
(541, 'Cybersecurity and Cybercrime Bill - Deepak Balgobin : « En aucun cas les réseaux sociaux seront surveillés ».', 'Meilleure protection des internautes mauriciens et des entreprises ou portes ouvertes aux arrestations arbitraires ? Les débats parlementaires sur le Cybersecurity and Cybercrime Bill ont débuté ce mardi 9 novembre 2021 avec les interventions de Deepak Balgobin, Reza Uteem et Fazila Jeewa-Daureeawoo. Deepak Balgobin, ministre de la Technologie, de la Communication et de l’Innovation, a été particulièrement virulent à l’encontre des politiciens de l’Opposition qui ont critiqué le Cybersecurity and Cybercrime Bill, notamment dans la presse. « Les détracteurs font de la démagogie. Ils sont à côté de la plaque et ne voient pas plus loin que le bout de leur nez. La loi donnera les outils pour protéger les citoyens et les entreprises. Les cybercrimes sont plus sophistiqués et le nombre de cas augmente. Ils sont cinq fois plus nombreux en 2021 qu’en 2018. ', 888, 'imtinen abrougui', '2021-11-30'),
(555, 'Le machine learning, nouvelle porte d’entrée pour les attaquants d’objets connectés', 'Au cours des dernières années, les appareils connectés IoT (Internet des objets) ont continué de croître de manière exponentielle dans des domaines variés. D’après le rapport annuel de Cisco, le nombre de connexions de ces dispositifs devrait représenter 50 % des 14,7 milliards de connexions prévues en 2023. Présents dans de nombreux domaines tels que la médecine avec les pompes insulines connectées, l’industrie ou encore le transport avec les voitures connectées, ces dispositifs sont peu à peu devenus une véritable aire de jeu pour les cyberattaquants. À mesure que ces appareils évoluent, ils embarquent par ailleurs avec eux de nouvelles technologies, et intègrent notamment des algorithmes de machine learning. Une avancée qui résout certains problèmes mais ouvre aussi de nouvelles perspectives pour les attaquants.', 5555, 'imtinen abrougui', '2021-11-29'),
(35645, 'Une intelligence artificielle peut apprendre une langue sans aide humaine', 'Des chercheurs travaillant sur des projets indépendants ont créé des intelligences artificielles bilingues qui peuvent apprendre une nouvelle langue sans piocher dans un dictionnaire existant, et même sans intervention humaine. Une avancée remarquable.', 5645, 'imtinen abrougui', '2021-12-08'),
(52543, 'Mieux identifier les pathologies réticulaires grâce au deep learning', 'Un article publié dans l’American Journal of Roentgenology fait l’apologie du deep learning pour l’identification de lésions réticulaires pulmonaires à la radiographie du thorax. Ce processus améliore ainsi la sensibilité de la radiographie qui n’était historiquement pas très pertinente dans ce cadre.', 5555, 'imtinen abrougui', '2021-11-03'),
(52546, 'Cybersecurity: This prolific hacker-for-hire operation has targeted thousands of victims around the world', 'A hacker-for-hire operation offered by cyber mercenaries has targeted thousands of individuals and organisations around the world, in a prolific campaign of financially driven attacks that have been ongoing since 2015. Human rights activists, journalists, politicians, telecommunications engineers and medical doctors are among those who have been targeted by the group, which has been detailed by cybersecurity researchers at Trend Micro. They\'ve dubbed it Void Balaur, after a multi-headed creature from Slavic folklore. The cyber-mercenary group has been advertising its services on Russian-language forums since 2018. The key services offered are breaking into email and social media accounts, as well as stealing and selling sensitive personal and financial information', 888, 'imtinen abrougui', '2021-11-29'),
(444444367, 'Intelligence artificielle, voiture autonome... : une année 2017 intense en high-tech !\r\n', 'En 2017, l\'intelligence artificielle (IA) a accompli plusieurs pas importants vers une certaine forme d\'indépendance dans l\'apprentissage des connaissances et le fonctionnement sur des terminaux mobiles. La voiture autonome a continué de progresser techniquement, au point de commencer à transporter des passagers sans aucune intervention humaine Mais l\'on a aussi découvert les périls du piratage de masse de services très populaires comme Yahoo ! et Uber ainsi que la montée en puissance des rançongiciels (ransomware, en anglais), désormais très prisés des cyberdélinquants. ', 5645, 'imtinen abrougui', '2021-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `nomcategorie` text NOT NULL,
  `nbrearticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nomcategorie`, `nbrearticle`) VALUES
(888, 'Artificial Intelligence', 80),
(5555, 'Machine learning', 666),
(5645, 'Artificial Intelligence', 44);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articlecategorie1` (`idcategorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444444368;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4868487;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `articlecategorie1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
