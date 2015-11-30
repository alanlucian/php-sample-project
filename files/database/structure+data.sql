# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 10.1.8-MariaDB)
# Database: php-sample-project
# Generation Time: 2015-11-30 02:59:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table album
# ------------------------------------------------------------

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_album_artist1_idx` (`artist_id`),
  CONSTRAINT `fk_album_artist1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;

INSERT INTO `album` (`id`, `name`, `artist_id`)
VALUES
	(1,'Get a Grip',1),
	(2,'The Best of',2),
	(13,'Love of My Life',2),
	(14,'The Best of U2',8),
	(15,'Desconhecido',9),
	(16,'Bad',10),
	(17,'Desconhecido',11),
	(18,'The Four Seasons',12),
	(19,'Desconhecido',13);

/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artist`;

CREATE TABLE `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;

INSERT INTO `artist` (`id`, `name`)
VALUES
	(1,'Aerosmith'),
	(2,'Queen'),
	(8,'U2'),
	(9,'Gênesis'),
	(10,'Michael Jackson'),
	(11,'Bach'),
	(12,'Vivaldi'),
	(13,'Handel');

/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Same as id3_genre_id',
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;

INSERT INTO `genre` (`id`, `name`)
VALUES
	(4,'Rock'),
	(5,'Punk'),
	(6,'Rockabilly'),
	(14,'POP'),
	(15,'Clássica');

/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table music
# ------------------------------------------------------------

DROP TABLE IF EXISTS `music`;

CREATE TABLE `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(450) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `genre_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_music_genre_idx` (`genre_id`),
  KEY `fk_music_album1_idx` (`album_id`),
  CONSTRAINT `fk_music_album1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_music_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `music` WRITE;
/*!40000 ALTER TABLE `music` DISABLE KEYS */;

INSERT INTO `music` (`id`, `file_path`, `title`, `year`, `genre_id`, `album_id`)
VALUES
	(1,'music/03_Radio_Ga_Ga.mp3','Radio Ga Ga',1999,4,2),
	(2,'music/10_Headlong.mp3','Headlong',1999,4,2),
	(3,'music/13_Angel_Of_Harlem.mp3','Angel Of Harlem',1999,4,14),
	(4,'music/I_Cant_Dance.mp3','I Can\'t Dance',1989,4,15),
	(5,'music/10_Smooth_Criminal.mp3','Smooth Criminal',1989,14,16),
	(6,'music/09_Dirty_Diana.mp3','Dirty Diana',1989,14,16),
	(7,'music/01_1709_Bach___Toccata_in_D_minor.mp3','Toccata in D minor',0,15,17),
	(8,'music/07_1725_Vivaldi___The_Four_Seasons_-_Spring.mp3','The Four Seasons - Spring',0,15,18),
	(9,'music/04_1717_Handel___Water_Music,_Suite_No._2_in_D.mp3','Water Music, Suite No',0,15,19);

/*!40000 ALTER TABLE `music` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table music_view
# ------------------------------------------------------------

DROP VIEW IF EXISTS `music_view`;

CREATE TABLE `music_view` (
   `id` INT(11) NOT NULL DEFAULT '0',
   `file_path` VARCHAR(450) NOT NULL,
   `title` VARCHAR(100) NULL DEFAULT NULL,
   `year` INT(4) NULL DEFAULT NULL,
   `genre_id` INT(11) NOT NULL,
   `album_id` INT(11) NOT NULL,
   `genre` VARCHAR(45) NULL DEFAULT NULL,
   `album` VARCHAR(100) NULL DEFAULT NULL,
   `artist_id` INT(11) NOT NULL DEFAULT '0',
   `artist` VARCHAR(100) NULL DEFAULT NULL
) ENGINE=MyISAM;





# Replace placeholder table for music_view with correct view syntax
# ------------------------------------------------------------

DROP TABLE `music_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `music_view`
AS SELECT
   `music`.`id` AS `id`,
   `music`.`file_path` AS `file_path`,
   `music`.`title` AS `title`,
   `music`.`year` AS `year`,
   `music`.`genre_id` AS `genre_id`,
   `music`.`album_id` AS `album_id`,
   `genre`.`name` AS `genre`,
   `album`.`name` AS `album`,
   `artist`.`id` AS `artist_id`,
   `artist`.`name` AS `artist`
FROM (((`music` join `genre` on((`genre`.`id` = `music`.`genre_id`))) join `album` on((`album`.`id` = `music`.`album_id`))) join `artist` on((`artist`.`id` = `album`.`artist_id`)));

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
