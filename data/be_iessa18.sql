--
-- Base de données :  `be_isesa18`
--
CREATE DATABASE IF NOT EXISTS `be_isesa18` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `be_isesa18`;

-- --------------------------------------------------------

--
-- Structure de la table `aerodrome`
--

DROP TABLE IF EXISTS `aerodrome`;
CREATE TABLE IF NOT EXISTS `aerodrome` (
  `OACI` varchar(5) NOT NULL,
  `nom_ad` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`OACI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
--  Données de la table `aerodrome`
--

INSERT INTO `aerodrome` (`OACI`, `nom_ad`, `latitude`, `longitude`) VALUES
('LFAB', 'DEP LFAB', 49.8787, 1.09516),
('LFAT', 'LFAT DEP/ARR LE TOUQUET', 50.5301, 1.586),
('LFAV', 'DEP LFQI/LFAV', 50.2511, 3.14644),
('LFAY', 'DEP ARR AMIENS', 49.8673, 2.37506),
('LFBA', 'DEP AGEN', 44.1623, 0.598357),
('LFBC', 'LFBC DEP. CAZAUX', 44.5351, -1.12234),
('LFBD', 'LFBD DEP. BORDEAUX', 44.8349, -0.711216),
('LFBE', 'DEP BERGERAC', 44.8172, 0.527554),
('LFBG', 'COGNAC ARR.DEP.', 45.6815, -0.309158),
('LFBH', 'LFBH DEP. LA ROCHELLE', 46.1884, -1.17586),
('LFBI', 'DEP LFBI', 46.5851, 0.324649),
('LFBK', 'DEP LFBK', 46.2344, 2.35925),
('LFBL', 'LFBL DEP. LIMOGES', 45.8689, 1.18785),
('LFBM', 'DEP LFBM', 43.915, -0.48798),
('LFBN', 'DEP LFBN', 46.3181, -0.392314),
('LFBO', 'LFBO DEP. TOULOUSE', 43.6327, 1.36875),
('LFBP', 'LFBP DEP. PAU', 43.3781, -0.400189),
('LFBR', 'DEP LFBR/LFBF', 43.4432, 1.27331),
('LFBS', 'DEP BISCAROSSE', 44.3642, -1.12441),
('LFBT', 'LFBT DEP. TARBES', 43.1806, -0.0104279),
('LFBU', 'DEP LFBU', 45.738, 0.227512),
('LFBX', 'DEP PERIGUEUX', 45.1992, 0.820287),
('LFBZ', 'LFBZ DEP. BIARRITZ', 43.4613, -1.5143),
('LFCC', 'DEP ARR CAHORS/LALBENQUE', 44.3525, 1.49427),
('LFCF', 'ARR DEP FIGEAC', 44.6689, 1.7918),
('LFCI', 'DEPART ALBI', 43.8973, 2.12214),
('LFCK', 'DEP CASTRES', 43.4933, 2.33333),
('LFCL', 'LASBORDES', 43.5799, 1.50554),
('LFCM', 'MILLAU', 43.8944, 3.15324),
('LFCR', 'DEP RODEZ', 44.4005, 2.47121),
('LFCY', 'DEP ROYAN MEDIS', 45.6375, -0.948092),
('LFDB', 'ARR DEP MONTAUBAN', 44.0281, 1.38698),
('LFDN', 'ARR DEP ROCHEFORTSTAGNANT', 45.8976, -0.976668),
('LFDV', 'UL65', 46.2679, 0.19385),
('LFEA', 'ARR/DEP BELLE ILE', 47.3409, -3.18655),
('LFEB', 'DINAN', 48.4514, -2.08872),
('LFEC', 'OUESSANT', 48.4702, -5.04401),
('LFED', 'ARR/DEP PONTIVY', 48.0569, -2.90076),
('LFEI', 'ARR DEP BRIARE', 47.6184, 2.77227),
('LFEQ', 'ARR DEP QUIBERON', 47.49, -3.08277),
('LFER', 'ARR/DEP REDON', 47.7066, -2.0249),
('LFES', 'ARR/DEP GUISCRIFF SCAER', 48.0559, -3.65308),
('LFFI', 'ARR DEP ANCENIS', 47.4034, -1.16438),
('LFFW', 'ARR DEP MONTAIGU', 46.9401, -1.30446),
('LFGA', 'ARR/DEP COLMAR/HOUSSEN', 48.1036, 7.33019),
('LFGB', 'ARR/DEP MULHOUSE/HABSHEIM', 47.7402, 7.40181),
('LFGC', 'ARR/DEP STRASBOURG NEUHOF', 48.5525, 7.75432),
('LFGG', 'ARR/DEP BE LFORT/CHAUX', 47.7025, 6.79791),
('LFGQ', 'ARRIVEE SEMUR', 47.8043, 4.56277),
('LFHP', 'LFHP ARR/DEP LE PUY', 45.0199, 3.80348),
('LFHS', 'BOURG CEYREZIAT', 46.2048, 5.27349),
('LFJB', 'ARR DEP MAULEON', 46.9044, -0.684974),
('LFJR', 'ANGERS MARCE', 47.5705, -0.311436),
('LFKB', 'LFKB DEP BASTIA', 42.5487, 9.46365),
('LFKC', 'LFKC DEP CALVI', 42.5109, 8.77847),
('LFKF', 'DEPART FIGARI', 41.4943, 9.08784),
('LFKJ', 'LFKJ DEP AJACCIO', 41.9083, 8.78562),
('LFKS', 'LFKS DEP SOLENZARA', 41.9258, 9.36515),
('LFLA', 'DEPART AUXERRE', 47.8562, 3.49587),
('LFLB', 'LFLB DEP CHAMBERY', 45.6387, 5.87129),
('LFLC', 'DEP LFLC CLERMONT FD.', 45.7818, 3.15573),
('LFLJ', 'COURCHEVEL', 45.3963, 6.62182),
('LFLL', 'DEP LYON SATOLAS', 45.7153, 5.06733),
('LFLM', 'DEP./ARR. MACON', 46.3059, 4.81176),
('LFLN', 'ST-YAN DEPART', 46.4197, 4.0107),
('LFLO', 'LFLO DEPART ROANNE', 46.051, 4.01218),
('LFLP', 'ARR ANNECY', 45.9376, 6.08418),
('LFLS', 'LFLS DEP GRENOBLE STGEOIR', 45.3491, 5.31696),
('LFLU', 'DEPART VALENCE', 44.9178, 4.95215),
('LFLV', 'LFLV DEP VICHY', 46.1664, 3.39453),
('LFLW', 'DEP LFLW', 44.9039, 2.40921),
('LFLX', 'DEP LFLX', 46.8713, 1.73014),
('LFLY', 'LFLY DEP LYON/BRON', 45.7367, 4.92712),
('LFMC', 'DEP LE LUC LE CANNET', 43.3833, 6.34828),
('LFMD', 'DEPART CANNES', 43.5829, 6.98046),
('LFMH', 'DEP/ARR ST ETIENNE', 45.5339, 4.29058),
('LFMI', 'LFMI DEP ISTRES', 43.5169, 4.90059),
('LFMK', 'DEP CARCASSONNE', 43.161, 2.3088),
('LFML', 'LFML DEP MARSEILLE', 43.4282, 5.21714),
('LFMN', 'LFMN DEP NICE', 43.6633, 7.19751),
('LFMO', 'ORANGE', 44.147, 4.85411),
('LFMP', 'LFMP DEP PERPIGNAN', 42.7288, 2.85689),
('LFMQ', 'LE CASTELLET DEP/ARR', 43.2503, 5.77364),
('LFMT', 'DESSERTE SLCT MONTPELLIER', 43.5802, 3.93954),
('LFMU', 'DEP BEZIERS', 43.3269, 3.34203),
('LFMV', 'DEPART AVIGNON', 43.8951, 4.86785),
('LFMW', 'ARR/DEP CASTELNAUDARY', 43.3129, 1.9275),
('LFMX', 'SAINT AUBAN', 44.0616, 5.97213),
('LFMY', 'SALON DE PROVENCE', 43.6111, 5.09027),
('LFNB', 'DEPART MEN', 44.502, 3.52622),
('LFOA', 'LFOA DEP AVORD', 47.0524, 2.62281),
('LFOC', 'DEP LFOC', 48.056, 1.38091),
('LFOG', 'ARR DEP FLERS/SAINT-PAUL', 48.7512, -0.590866),
('LFOH', 'LE HAVRE ARR DEP SURV', 49.5959, 0.189254),
('LFOM', 'ARR/DEP LESSAY', 49.1931, -1.48167),
('LFOO', 'ARR/DEP SABLES D OLONNE', 46.4855, -1.7034),
('LFOU', 'DEP CHOLET', 47.0883, -0.866763),
('LFOV', 'DEP LAVAL', 48.0366, -0.737855),
('LFOZ', 'ARR/DEP ST DENIS HOTEL', 47.889, 2.15951),
('LFQA', 'REIMS', 49.3151, 4.05258),
('LFQI', 'DEP ARR CAMBRAI', 50.1514, 3.25669),
('LFQP', 'BALISE ARR/DEP', 48.7674, 7.1781),
('LFRB', 'DEP BREST', 48.4564, -4.39134),
('LFRC', 'DEP CHERBOURG', 49.6441, -1.4474),
('LFRD', 'DEP DINARD', 48.5701, -2.04484),
('LFRE', 'ARR/DEP LA BAULE', 47.2892, -2.33408),
('LFRF', 'DEP GRANVILLE', 48.8758, -1.553),
('LFRG', 'ARR-DEP DEAUVILLE', 49.3617, 0.171867),
('LFRH', 'DEP LORIENT-LANN-BIHOUE', 47.7706, -3.4195),
('LFRI', 'DEP LA ROCHE SUR YON', 46.7041, -1.36678),
('LFRJ', 'DEP LANDIVISIAU', 48.5345, -4.1303),
('LFRK', 'DEP CAEN', 49.1595, -0.450225),
('LFRL', 'ARR/DEP LANVEOC', 48.2751, -4.40787),
('LFRM', 'DEPART LE MANS', 47.9502, 0.2047),
('LFRN', 'DEP RENNES', 48.0685, -1.73331),
('LFRO', 'DEP LANNION', 48.7504, -3.46313),
('LFRP', 'DEP PLOERMEL', 48.009, -2.3457),
('LFRQ', 'DEP QUIMPER', 47.9744, -4.15353),
('LFRS', 'DEP NANTES', 47.1553, -1.5964),
('LFRT', 'DEP SAINT-BRIEUC', 48.5208, -2.79955),
('LFRU', 'DEP MORLAIX', 48.6067, -3.79984),
('LFRV', 'DEP VANNES', 47.7235, -2.70681),
('LFRZ', 'DEP SAINT-NAZAIRE', 47.3215, -2.20457),
('LFSH', 'ARR/DEP HAGENAU', 48.7759, 7.79204),
('LFSL', 'DEP LFSL', 45.0355, 1.49666),
('LFSM', 'ARR/DEP MONTBELIARD', 47.4877, 6.76619),
('LFSN', 'ARR NANCY', 48.7048, 6.22006),
('LFSN1', 'DEP NANCY', 48.7052, 6.2065),
('LFTH', 'LFTH DEP HYERES', 43.0946, 6.13221),
('LFTZ', 'LA MOLE', 43.199, 6.47065),
('LFXA', 'AMBERIEU', 45.9695, 5.32522);

-- --------------------------------------------------------

--
-- Structure de la table `avions`
--

DROP TABLE IF EXISTS `avions`;
CREATE TABLE IF NOT EXISTS `avions` (
  `id_avion` varchar(10) NOT NULL,
  `type_avion` varchar(30) NOT NULL,
  `id_compagnie` int(11) NOT NULL,
  PRIMARY KEY (`id_avion`),
  KEY `id_compagnie` (`id_compagnie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Données de la table `avions`
--

INSERT INTO `avions` (`id_avion`, `type_avion`, `id_compagnie`) VALUES
('D-EGCD', 'CESSNA C172', 6),
('F-GFYV', 'Pipper PA 28-161 Cadet', 8),
('F-GGXU', 'Robin DR400-120', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

DROP TABLE IF EXISTS `compagnie`;
CREATE TABLE IF NOT EXISTS `compagnie` (
  `id_compagnie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_compagnie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_compagnie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Données de la table `compagnie`
--

INSERT INTO `compagnie` (`id_compagnie`, `nom_compagnie`) VALUES
(1, 'Aéro-club de l ENAC'),
(2, 'Midi Pyrenees Voltige'),
(3, 'Aéroclub de Bigorre'),
(4, 'AéroClub de Bergerac'),
(5, 'Aéroclub St-Brieuc Armor'),
(6, 'Cercle Aéronautique de Strasbourg Entzheim'),
(7, 'AéroClub d Aubigny'),
(8, 'Union Aéronautique de la Côte d Azur'),
(9, 'Aéroclub du Pays de Montbéliard'),
(10, 'Air France / KLM'),
(11, 'Finnair'),
(12, 'Air Corsica');

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `OACI_dep` varchar(5) NOT NULL,
  `OACI_arr` varchar(5) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_arr` datetime NOT NULL,
  `id_vol` int(11) NOT NULL,
  PRIMARY KEY (`OACI_dep`,`OACI_arr`,`date_debut`,`id_vol`),
  KEY `OACI_arr` (`OACI_arr`),
  KEY `id_vol` (`id_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_passe` varchar(100) NOT NULL,
  `statut` tinyint(2) NOT NULL DEFAULT '0',
  `actif` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_passe`, `statut`, `actif`) VALUES
(1, 'prof', 'prof', 'admin@admin.fr', 'admin', 1, '1'),
(2, 'Lindbergh ', 'Charles', 'charles@atlantique.us', 'charles', 0, '1'),
(15, 'Blériot', 'Louis', 'louis@manche.fr', 'louis', 0, '1');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_avion` varchar(10) NOT NULL,
  `qualif` varchar(30) NOT NULL,
  `commentaires` text NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_avion` (`id_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avions`
--
ALTER TABLE `avions`
  ADD CONSTRAINT `avions_ibfk_1` FOREIGN KEY (`id_compagnie`) REFERENCES `compagnie` (`id_compagnie`);

--
-- Contraintes pour la table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`OACI_dep`) REFERENCES `aerodrome` (`OACI`),
  ADD CONSTRAINT `route_ibfk_2` FOREIGN KEY (`OACI_arr`) REFERENCES `aerodrome` (`OACI`),
  ADD CONSTRAINT `route_ibfk_3` FOREIGN KEY (`id_vol`) REFERENCES `vol` (`id_vol`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `vol_ibfk_3` FOREIGN KEY (`id_avion`) REFERENCES `avions` (`id_avion`);
COMMIT;

