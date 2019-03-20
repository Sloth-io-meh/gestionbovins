-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 mars 2019 à 13:09
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionbovins`
--

-- --------------------------------------------------------

--
-- Structure de la table `bovins`
--

CREATE TABLE `bovins` (
  `id_bov` int(11) NOT NULL,
  `race` varchar(25) DEFAULT NULL,
  `dateachat` varchar(25) DEFAULT NULL,
  `prixachat` float DEFAULT NULL,
  `poidachat` float DEFAULT NULL,
  `lieuachat` varchar(25) DEFAULT NULL,
  `datevente` varchar(25) DEFAULT NULL,
  `prixavente` float DEFAULT NULL,
  `poidvente` float DEFAULT NULL,
  `lieuvente` varchar(25) DEFAULT NULL,
  `vendu` varchar(25) DEFAULT NULL,
  `mort` varchar(25) DEFAULT NULL,
  `datemort` varchar(25) DEFAULT NULL,
  `id_etab` int(11) DEFAULT NULL,
  `id_vend` int(11) DEFAULT NULL,
  `id_q` int(11) DEFAULT NULL,
  `poidAct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bovins`
--

INSERT INTO `bovins` (`id_bov`, `race`, `dateachat`, `prixachat`, `poidachat`, `lieuachat`, `datevente`, `prixavente`, `poidvente`, `lieuvente`, `vendu`, `mort`, `datemort`, `id_etab`, `id_vend`, `id_q`, `poidAct`) VALUES
(4856, 'Meh Type Race etc....', '2019-03-07', 500.99, 35.5, 'Marrakech bla bla ', '2019-03-14', 2500, 75, 'sou9 blkjfeazblo', '1', '0', NULL, 3, 2, 2, 76),
(74865, 'test', '1999-11-10', 250, 30, 'kech', '2019-03-15', 5000, 75, 'kech', '1', '0', NULL, 3, 2, 2, 0),
(485623, '3jel 1st Quality bla bla ', '2019-03-15', 501, 35, 'Marrakech 9le3t sraghna .', NULL, NULL, NULL, NULL, '0', '0', NULL, 3, 3, 1, 0),
(1132456, '3jel', '11-11-2011', 500, 25, 'Marrakech', '2019-03-15', 2500, 75, 'marrakech', '0', '0', NULL, 3, 1, 2, 0),
(7846153, 'testing', '1952-11-10', 500, 56, 'kech', '2019-05-15', 0, 0, '', '0', '1', '2019-03-15', 3, 1, 2, 0),
(123456789, '3jel', '2019-03-15', 350.01, 50.5, 'Marrakech - chi bled', NULL, NULL, NULL, NULL, '0', '0', NULL, 3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etables`
--

CREATE TABLE `etables` (
  `id_etab` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etables`
--

INSERT INTO `etables` (`id_etab`, `nom`) VALUES
(3, 'Test2213');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `Id_user` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`Id_user`, `nom`, `prenom`, `adresse`, `ville`, `code`, `tel`, `mail`, `password`) VALUES
(1, 'laakik', 'saad eddine', 'kennaria db el aarsa n35', 'marrakech', '40040', '0674276262', 'saadlk1997@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `medicsconsumed`
--

CREATE TABLE `medicsconsumed` (
  `id_m` int(11) NOT NULL,
  `libelle_m` varchar(50) NOT NULL,
  `quantite_m` int(11) NOT NULL,
  `id_bov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicsconsumed`
--

INSERT INTO `medicsconsumed` (`id_m`, `libelle_m`, `quantite_m`, `id_bov`) VALUES
(1, 'Ajaximusa', 1, 485623),
(2, 'Ajaximusa', 1, 123456789);

-- --------------------------------------------------------

--
-- Structure de la table `meds`
--

CREATE TABLE `meds` (
  `id_med` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `quantite_med` float DEFAULT NULL,
  `prix_med` float DEFAULT NULL,
  `dateachat` varchar(25) DEFAULT NULL,
  `dateexp_med` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `meds`
--

INSERT INTO `meds` (`id_med`, `libelle`, `description`, `quantite_med`, `prix_med`, `dateachat`, `dateexp_med`) VALUES
(2, 'Ajaximusa', 'ajaximonoxile 500g 20 pellule \r\nmore talk bla bla bla pfffff', 14, 199.99, '2015-03-13', '2020-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `nourriture`
--

CREATE TABLE `nourriture` (
  `id_n` int(11) NOT NULL,
  `libelle_n` varchar(25) DEFAULT NULL,
  `quantite_n` varchar(25) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `id_bov` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nourriture`
--

INSERT INTO `nourriture` (`id_n`, `libelle_n`, `quantite_n`, `prix`, `id_bov`) VALUES
(2, 'ngkle', '1', NULL, 123456789),
(3, 'fejzk', '1', NULL, 1132456),
(4, 'fejzk', '1', NULL, 485623),
(5, 'fejzk', '1', NULL, 485623),
(6, 'fejzk', '1', NULL, 485623),
(7, 'fejzk', '6', NULL, 1132456),
(8, 'fejzk', '2', NULL, 485623),
(9, 'fejzk', '2', NULL, 1132456),
(10, 'fejzk', '2', NULL, 123456789),
(11, 'fejzk', '2', NULL, 485623),
(12, 'fejzk', '2', NULL, 485623);

-- --------------------------------------------------------

--
-- Structure de la table `quarantaine`
--

CREATE TABLE `quarantaine` (
  `id_q` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quarantaine`
--

INSERT INTO `quarantaine` (`id_q`, `libelle`) VALUES
(1, 'true'),
(2, 'false');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `libelle_st` varchar(25) DEFAULT NULL,
  `description_s` varchar(25) DEFAULT NULL,
  `quantite_s` float DEFAULT NULL,
  `quantiteAct` float NOT NULL,
  `prix_s` float DEFAULT NULL,
  `dateachat` varchar(25) DEFAULT NULL,
  `dateexp_s` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id_stock`, `libelle_st`, `description_s`, `quantite_s`, `quantiteAct`, `prix_s`, `dateachat`, `dateexp_s`) VALUES
(2, 'fejzk', 'nkflez', 31, 14, 500, '2019-01-02', '2021-01-02');

-- --------------------------------------------------------

--
-- Structure de la table `tansporteur`
--

CREATE TABLE `tansporteur` (
  `id_trans` int(11) NOT NULL,
  `cin_t` varchar(10) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tansporteur`
--

INSERT INTO `tansporteur` (`id_trans`, `cin_t`, `nom`, `prenom`, `tel`) VALUES
(1, '   EE79677', '   laakika  ', '   saad eddin', '067427626'),
(2, 'EE9546', 'Baha-eddine', 'Mouad', '06745216845');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_veh` int(11) NOT NULL,
  `Matricule` varchar(25) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `id_trans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_veh`, `Matricule`, `type`, `id_trans`) VALUES
(6, '1151352-A-24', '4x4', 2),
(8, '1423-A-26', 'ford Transit', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id_vend` int(11) NOT NULL,
  `nom_vend` varchar(25) DEFAULT NULL,
  `prenom_vend` varchar(25) DEFAULT NULL,
  `tel_vend` varchar(25) DEFAULT NULL,
  `farm_vend` varchar(25) DEFAULT NULL,
  `id_bov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id_vend`, `nom_vend`, `prenom_vend`, `tel_vend`, `farm_vend`, `id_bov`) VALUES
(1, 'laakik', 'saad', '0674027761', 'LAAKIK\'S', NULL),
(2, 'Laakik', 'saad eddine', '0674272662', 'ManOhMan', NULL),
(3, 'Baha eddine', 'Mouad', '212674561', 'Meh', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `veto`
--

CREATE TABLE `veto` (
  `id_vet` varchar(25) NOT NULL,
  `nom_vet` varchar(25) DEFAULT NULL,
  `prenom_vet` varchar(25) DEFAULT NULL,
  `tel_vet` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `veto`
--

INSERT INTO `veto` (`id_vet`, `nom_vet`, `prenom_vet`, `tel_vet`) VALUES
('EE123456', '  Bahaeddine  ', ' Mouad', '  066664857'),
('EE796772', 'Laakik', 'saad eddine', '0674276262');

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `id_pres` int(11) NOT NULL,
  `description_v` text,
  `datepres` varchar(25) DEFAULT NULL,
  `prix_pres` float DEFAULT NULL,
  `id_bov` int(11) DEFAULT NULL,
  `id_vet` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`id_pres`, `description_v`, `datepres`, `prix_pres`, `id_bov`, `id_vet`) VALUES
(1, 'nfielkz', '2019-01-01', 500.99, 4856, 'EE796772');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bovins`
--
ALTER TABLE `bovins`
  ADD PRIMARY KEY (`id_bov`),
  ADD KEY `FK_bovins_id_etab` (`id_etab`),
  ADD KEY `FK_bovins_id_vend` (`id_vend`),
  ADD KEY `FK_bovins_id_q` (`id_q`);

--
-- Index pour la table `etables`
--
ALTER TABLE `etables`
  ADD PRIMARY KEY (`id_etab`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`Id_user`);

--
-- Index pour la table `medicsconsumed`
--
ALTER TABLE `medicsconsumed`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `fk2` (`id_bov`);

--
-- Index pour la table `meds`
--
ALTER TABLE `meds`
  ADD PRIMARY KEY (`id_med`);

--
-- Index pour la table `nourriture`
--
ALTER TABLE `nourriture`
  ADD PRIMARY KEY (`id_n`),
  ADD KEY `fk1` (`id_bov`);

--
-- Index pour la table `quarantaine`
--
ALTER TABLE `quarantaine`
  ADD PRIMARY KEY (`id_q`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Index pour la table `tansporteur`
--
ALTER TABLE `tansporteur`
  ADD PRIMARY KEY (`id_trans`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_veh`),
  ADD KEY `FK_Vehicule_id_trans` (`id_trans`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id_vend`),
  ADD KEY `FK_vendeur_id_bov` (`id_bov`);

--
-- Index pour la table `veto`
--
ALTER TABLE `veto`
  ADD PRIMARY KEY (`id_vet`);

--
-- Index pour la table `visites`
--
ALTER TABLE `visites`
  ADD PRIMARY KEY (`id_pres`),
  ADD KEY `FK_prestations_id_bov` (`id_bov`),
  ADD KEY `FK_prestations_id_vet` (`id_vet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etables`
--
ALTER TABLE `etables`
  MODIFY `id_etab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicsconsumed`
--
ALTER TABLE `medicsconsumed`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `meds`
--
ALTER TABLE `meds`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `nourriture`
--
ALTER TABLE `nourriture`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `quarantaine`
--
ALTER TABLE `quarantaine`
  MODIFY `id_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tansporteur`
--
ALTER TABLE `tansporteur`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_veh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id_vend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `visites`
--
ALTER TABLE `visites`
  MODIFY `id_pres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bovins`
--
ALTER TABLE `bovins`
  ADD CONSTRAINT `FK_bovins_id_etab` FOREIGN KEY (`id_etab`) REFERENCES `etables` (`id_etab`),
  ADD CONSTRAINT `FK_bovins_id_q` FOREIGN KEY (`id_q`) REFERENCES `quarantaine` (`id_q`),
  ADD CONSTRAINT `FK_bovins_id_vend` FOREIGN KEY (`id_vend`) REFERENCES `vendeur` (`id_vend`);

--
-- Contraintes pour la table `medicsconsumed`
--
ALTER TABLE `medicsconsumed`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_bov`) REFERENCES `bovins` (`id_bov`);

--
-- Contraintes pour la table `nourriture`
--
ALTER TABLE `nourriture`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_bov`) REFERENCES `bovins` (`id_bov`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_Vehicule_id_trans` FOREIGN KEY (`id_trans`) REFERENCES `tansporteur` (`id_trans`);

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `FK_vendeur_id_bov` FOREIGN KEY (`id_bov`) REFERENCES `bovins` (`id_bov`);

--
-- Contraintes pour la table `visites`
--
ALTER TABLE `visites`
  ADD CONSTRAINT `FK_prestations_id_bov` FOREIGN KEY (`id_bov`) REFERENCES `bovins` (`id_bov`),
  ADD CONSTRAINT `FK_prestations_id_vet` FOREIGN KEY (`id_vet`) REFERENCES `veto` (`id_vet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
