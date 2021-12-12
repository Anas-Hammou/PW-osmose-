-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 06:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osmose`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE `achat` (
  `ID_ACHAT` int(11) NOT NULL,
  `TITRE` varchar(255) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `ID_COMMANDE` int(11) NOT NULL,
  `COMPTE_CB` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achat`
--

INSERT INTO `achat` (`ID_ACHAT`, `TITRE`, `PRIX`, `ID_COMMANDE`, `COMPTE_CB`) VALUES
(99, 'AZERTYUI', 200, 93, 12345),
(4309, 'achat de 1024 dinars', 1024, 10, 12345678),
(5922, 'achat de 1133 dinars', 1133, 10, 12345678),
(6579, 'achat de 2157 dinars', 2157, 10, 0),
(8796, 'achat de 2157 dinars', 2157, 10, 1234567),
(16234, 'abrarr', 5, 10, 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `article`
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
-- Dumping data for table `article`
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
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `nomcategorie` text NOT NULL,
  `nbrearticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nomcategorie`, `nbrearticle`) VALUES
(888, 'Cyber Security', 80),
(5555, 'Machine learning', 666),
(5645, 'Artificial Intelligence', 44);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `ID_Commande` int(11) NOT NULL,
  `ID_OFFRE` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`ID_Commande`, `ID_OFFRE`, `ID_CLIENT`) VALUES
(10, 1, 4),
(93, 2, 4),
(110, 3, 4),
(6795, 3, 8),
(7376, 2, 8),
(7418, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp(),
  `nbr_p` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `description`, `img`, `auteur`, `date_ajout`, `nbr_p`) VALUES
(1, 'Azertyi', 'Azerty  azerty azerty aqwxcv qwxcv azerty aqwxcv qwxcv', 'Site-internet-photographe.jpg', 'Enq', '2021-12-11', 0),
(22333888, 'FFF', 'ZRFDDDFFFG', 'in.jpg', 'DDDD', '2021-12-11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `formateur` varchar(255) NOT NULL,
  `participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `titre`, `description`, `categorie`, `prix`, `formateur`, `participants`) VALUES
(1, 'f1', 'azerty', 1, 12, 'abrar', 15),
(2, 'titre', 'test test', 2, 1000, 'azerty', 111),
(3, 'formation22', 'for for fro ', 2, 133, 'ilyess', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `idparticipant` int(11) NOT NULL,
  `idoffre` int(11) NOT NULL,
  `idclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` int(11) NOT NULL,
  `idev` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `idev`, `idclient`, `email`) VALUES
(555, 22333888, 4, 'ilyes.zaidi@esprit.t'),
(4278, 22333888, 8, 'ilyes.zaidi@esprit.tn'),
(6365, 22333888, 8, 'ilyes.zaidi@esprit.tn'),
(8436, 22333888, 8, 'ilyes.zaidi@esprit.tn');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `idrec` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`idrec`, `texte`) VALUES
(3, 'saasas'),
(8, 'azerty');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `tel_user` int(11) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `role_user` varchar(50) NOT NULL,
  `confirmation_key` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `tel_user`, `adresse_user`, `username`, `password_user`, `role_user`, `confirmation_key`, `confirme`) VALUES
(4, 'hmemm', 'malek', 'malek.hmem@esprit.tn', 52318451, 'manzel tmime', 'Malekk', 'malek123456', 'Utilisateur', '90376218937830', 1),
(5, 'anas', 'anas', 'malek.hmem@esprit.tn', 12345678, 'aerajen', 'anas', 'anasanas11', 'Administrateur', '91162205289640', 1),
(8, 'zerty', 'qswerty', 'ilyes.zaidi@esprit.tn', 123456789, 'AZERTYU', 'azerty', 'azerty', 'Utilisateur', '123456789AZER', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`ID_ACHAT`),
  ADD KEY `achatcmd` (`ID_COMMANDE`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articlecategorie1` (`idcategorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_Commande`),
  ADD KEY `cmut` (`ID_CLIENT`),
  ADD KEY `cmoff` (`ID_OFFRE`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`idparticipant`),
  ADD KEY `fropart` (`idoffre`),
  ADD KEY `formut` (`idclient`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventpart` (`idev`),
  ADD KEY `utpart` (`idclient`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`idrec`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444444368;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4868487;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_Commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8546;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22333889;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `idparticipant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8437;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `idrec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achatcmd` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commande` (`ID_Commande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `articlecategorie1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `cmoff` FOREIGN KEY (`ID_OFFRE`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `cmut` FOREIGN KEY (`ID_CLIENT`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `formut` FOREIGN KEY (`idclient`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fropart` FOREIGN KEY (`idoffre`) REFERENCES `formation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_cl` FOREIGN KEY (`idclient`) REFERENCES `utilisateurs` (`id_user`),
  ADD CONSTRAINT `fk_idev` FOREIGN KEY (`idev`) REFERENCES `evenement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
