-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `publicationDate` datetime NOT NULL,
  `unpublicationDate` datetime NOT NULL,
  `importantLevel` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Store a value between 1 and 5 (0 only if autor forget to fill this part)',
  `Autors_ID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_articles_Autors1_idx` (`Autors_ID`),
  CONSTRAINT `fk_articles_Autors1` FOREIGN KEY (`Autors_ID`) REFERENCES `autors` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `articles` (`ID`, `title`, `content`, `publicationDate`, `unpublicationDate`, `importantLevel`, `Autors_ID`) VALUES
(1,	'Le sport vedette',	'Le biathlon est un sport vedette pour le club \'Martin Roche\' situé à Valence',	'2022-06-28 23:00:00',	'2025-06-28 01:00:00',	2,	2),
(2,	'Le sport des ardéchois',	'Les ardéchois ne pratiquent pas de biathlon mais plutôt du baseball',	'2023-06-03 22:24:39',	'2024-12-31 00:00:00',	5,	5),
(3,	'La vie communautaire à Valence',	'La vie communautaire à Valence s\'organise de manière très incertaine; on peut y retrouver pas mal de groupes religieux hostile et des habitants entre les deux',	'2023-05-28 00:00:00',	'2029-01-01 00:00:00',	0,	1);

DROP TABLE IF EXISTS `autors`;
CREATE TABLE `autors` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `pseudoname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `pseudoname_UNIQUE` (`pseudoname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `autors` (`ID`, `pseudoname`, `name`, `lastName`) VALUES
(1,	'Matéo',	NULL,	'Azure'),
(2,	'Valentine',	NULL,	'Pourpre'),
(3,	'Matthiew',	'Salopira',	'Cyan'),
(4,	'Mathilde',	NULL,	'scarlet'),
(5,	'Ktastrophe',	NULL,	'Blacky');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`ID`, `Name`) VALUES
(1,	'Loisir'),
(2,	'Sport');

DROP TABLE IF EXISTS `classifications`;
CREATE TABLE `classifications` (
  `articles_ID` int NOT NULL,
  `categories_ID` int NOT NULL,
  PRIMARY KEY (`articles_ID`,`categories_ID`),
  KEY `fk_articles_has_categories_categories1_idx` (`categories_ID`),
  KEY `fk_articles_has_categories_articles1_idx` (`articles_ID`),
  CONSTRAINT `fk_articles_has_categories_articles1` FOREIGN KEY (`articles_ID`) REFERENCES `articles` (`ID`),
  CONSTRAINT `fk_articles_has_categories_categories1` FOREIGN KEY (`categories_ID`) REFERENCES `categories` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `classifications` (`articles_ID`, `categories_ID`) VALUES
(1,	1),
(2,	1),
(3,	1),
(1,	2),
(2,	2);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `datePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentContent` text COLLATE utf8mb4_general_ci NOT NULL,
  `Autors_ID` int NOT NULL,
  `articles_ID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Comments_Autors1_idx` (`Autors_ID`),
  KEY `fk_Comments_articles1_idx` (`articles_ID`),
  CONSTRAINT `fk_Comments_articles1` FOREIGN KEY (`articles_ID`) REFERENCES `articles` (`ID`),
  CONSTRAINT `fk_Comments_Autors1` FOREIGN KEY (`Autors_ID`) REFERENCES `autors` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`ID`, `datePublication`, `commentContent`, `Autors_ID`, `articles_ID`) VALUES
(1,	'2023-06-28 13:29:54',	'Bravo à toi pour avoir trouvé ces informations',	3,	1),
(2,	'2023-06-28 13:30:33',	'Sans avis',	4,	1),
(3,	'2023-06-28 13:31:13',	'Ce fut un travail horrible pour trouver toutes ces informations',	1,	3);

-- 2023-06-29 07:28:16
