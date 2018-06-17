-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Octobre 2017 à 20:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hp`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprecier`
--

CREATE TABLE `apprecier` (
  `id_s` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ban`
--

CREATE TABLE `ban` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `limite` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_c` int(11) NOT NULL,
  `nom_c` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id_c`, `nom_c`) VALUES
(3, 'Terminal S 1 '),
(4, 'terminal L 1 '),
(5, 'terminal es');

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE `commenter` (
  `id_m` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `moyenne` varchar(50) DEFAULT NULL,
  `appreciation` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `corespondre`
--

CREATE TABLE `corespondre` (
  `id_d` int(11) NOT NULL,
  `id_m` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE `devoir` (
  `id_d` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `nom_d` varchar(50) NOT NULL,
  `coeff` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

CREATE TABLE `enseigner` (
  `id_u` int(11) NOT NULL,
  `id_m` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseigner`
--

INSERT INTO `enseigner` (`id_u`, `id_m`) VALUES
(10, 1),
(10, 4),
(12, 1),
(21, 1),
(21, 2),
(21, 3),
(87, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_m` int(11) NOT NULL,
  `nom_m` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id_m`, `nom_m`) VALUES
(1, 'math'),
(2, 'anglais'),
(3, 'Français'),
(4, 'Developpement'),
(5, 'Java'),
(6, 'EPS'),
(7, 'physique-chimie');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_m` int(11) NOT NULL,
  `nom_m` int(50) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE `noter` (
  `id_u` int(11) NOT NULL,
  `id_d` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_s` int(11) NOT NULL,
  `nom_s` varchar(50) NOT NULL,
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `semestre`
--

INSERT INTO `semestre` (`id_s`, `nom_s`, `date_deb`, `date_fin`, `etat`) VALUES
(1, 'Semestre 1 ', NULL, NULL, 0),
(2, 'Semestre 2 ', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `id_c` int(11) NOT NULL,
  `id_m` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `id_c` int(11) DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_u`, `id_c`, `nom`, `prenom`, `email`, `mdp`, `ip`, `lvl`) VALUES
(8, 2, 'admin', 'admin', 'admin@gamil.com', '7581f9f7cb4e2c129cf3994be96f620fca5eb4c0', NULL, 1),
(7, 0, 'admin', 'admin', 'admin@gmail.com', '7581f9f7cb4e2c129cf3994be96f620fca5eb4c0', NULL, 0),
(9, 0, 'admin', 'admin', 'admin@gmail.com', '7581f9f7cb4e2c129cf3994be96f620fca5eb4c0', NULL, 2),
(21, 0, 'Leveque', 'Luc', 'luc.leveque78@gmail.com', '7581f9f7cb4e2c129cf3994be96f620fca5eb4c0', NULL, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apprecier`
--
ALTER TABLE `apprecier`
  ADD PRIMARY KEY (`id_s`,`id_u`),
  ADD KEY `id_e` (`id_u`);

--
-- Index pour la table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`id_m`,`id_u`,`id_s`),
  ADD KEY `id_e` (`id_u`),
  ADD KEY `id_mat` (`id_m`),
  ADD KEY `id_s` (`id_s`);

--
-- Index pour la table `corespondre`
--
ALTER TABLE `corespondre`
  ADD PRIMARY KEY (`id_m`,`id_d`),
  ADD KEY `id_d` (`id_d`);

--
-- Index pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`id_d`),
  ADD KEY `id_m` (`id_m`);

--
-- Index pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD PRIMARY KEY (`id_u`,`id_m`),
  ADD KEY `id_m` (`id_m`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `id_e` (`id_exp`),
  ADD KEY `id_p` (`id_dest`);

--
-- Index pour la table `noter`
--
ALTER TABLE `noter`
  ADD PRIMARY KEY (`id_s`,`id_u`,`id_d`),
  ADD KEY `id_e` (`id_u`),
  ADD KEY `id_d` (`id_d`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_s`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`id_m`,`id_c`),
  ADD KEY `id_c` (`id_c`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
