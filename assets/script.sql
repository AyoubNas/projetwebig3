SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `ig3project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ig3project`;

DELIMITER $$
DROP PROCEDURE IF EXISTS `game_set_gameDateTime`$$
CREATE DEFINER=`admin9lGFeW1`@`127.11.94.130` PROCEDURE `game_set_gameDateTime`(IN `ID` INT)
BEGIN
update game set gameDateTime= convert_tz(ADDTIME(gameDate,gameTime),@@session.time_zone,'+02:00') where gameId=ID;

END$$

DROP PROCEDURE IF EXISTS `player_info`$$
CREATE DEFINER=`admin9lGFeW1`@`127.11.94.130` PROCEDURE `player_info`(IN `p_playerId` INT(11))
BEGIN
    SELECT *
    FROM Player
    WHERE playerId=p_playerId;
END$$

DROP PROCEDURE IF EXISTS `site_info`$$
CREATE DEFINER=`admin9lGFeW1`@`127.11.94.130` PROCEDURE `site_info`(IN `p_siteName` VARCHAR(25))
BEGIN
    SELECT *
    FROM site
    WHERE siteName = p_siteName;
END$$

DROP PROCEDURE IF EXISTS `team_info`$$
CREATE DEFINER=`admin9lGFeW1`@`127.11.94.130` PROCEDURE `team_info`(IN `p_teamId` INT(11))
BEGIN
    SELECT *
    FROM Team
    WHERE Team.teamId = p_teamId;
END$$

DELIMITER ;

DROP TABLE IF EXISTS `error`;
CREATE TABLE IF NOT EXISTS `error` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `erreur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `erreur` (`erreur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

INSERT INTO `error` (`id`, `erreur`) VALUES
(30, 'away team is home team'),
(4, 'date must be in two within two hours or later');

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `gameId` int(11) NOT NULL AUTO_INCREMENT,
  `homeTeam` int(11) DEFAULT NULL,
  `awayTeam` int(11) DEFAULT NULL,
  `siteName` varchar(25) DEFAULT NULL,
  `gameTime` time DEFAULT NULL,
  `gameDate` date DEFAULT NULL,
  `gameDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`gameId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

INSERT INTO `game` (`gameId`, `homeTeam`, `awayTeam`, `siteName`, `gameTime`, `gameDate`, `gameDateTime`) VALUES
(38, 1, 2, 'bernabeu', '20:20:00', '2016-05-20', '2016-05-20 20:20:00'),
(39, 1, 2, 'nou', '20:00:00', '2017-01-12', '2017-01-12 20:00:00'),
(40, 1, 2, 'nou', '20:00:00', '2017-05-20', '2017-05-20 20:00:00'),
(41, 1, 2, 'bernabeu', '20:23:00', '2017-02-20', '2017-02-20 20:23:00'),
(42, 1, 2, 'bernabeu', '23:00:00', '2016-05-15', '2016-05-15 23:00:00'),
(43, 1, 2, 'bernabeu', '08:00:00', '2016-05-16', '2016-05-16 14:00:00'),
(44, 1, 2, 'bernabeu', '12:00:00', '2016-05-16', '2016-05-16 18:00:00'),
(45, 1, 2, 'allianz arena', '12:00:00', '2016-05-16', '2016-05-16 18:00:00');
DROP TRIGGER IF EXISTS `before_insert_Game`;
DELIMITER //
CREATE TRIGGER `before_insert_Game` BEFORE INSERT ON `game`
 FOR EACH ROW BEGIN 
		
			if (ADDTIME(NEW.gameDate,NEW.gameTime)<=(ADDDATE(NOW(),INTERVAL 2 HOUR)))
				THEN insert into error values(NULL,'date must be in two within two hours or later');
			END IF;
            if (NEW.awayTeam=NEW.homeTeam)
            	THEN insert into error values (NULL,'away team is home team');
            END IF;
            

			END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_update_Game`;
DELIMITER //
CREATE TRIGGER `before_update_Game` BEFORE UPDATE ON `game`
 FOR EACH ROW BEGIN 
			if (ADDTIME(NEW.gameDate,NEW.gameTime)<=(ADDDATE(NOW(),INTERVAL 2 HOUR)))
				THEN insert into error values(NULL,'date must be in two within two hours or later');
			END IF;
            
              if (NEW.awayTeam=NEW.homeTeam)
            	THEN insert into error values (NULL,'away team is home team');
            END IF;
            


			END
//
DELIMITER ;

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `playerId` int(11) NOT NULL AUTO_INCREMENT,
  `playerLogin` varchar(25) NOT NULL,
  `playerFirstName` varchar(25) DEFAULT NULL,
  `playerLastName` varchar(25) DEFAULT NULL,
  `playerBirthYear` int(11) DEFAULT NULL,
  `playerEmail` varchar(50) DEFAULT NULL,
  `playerTeam` int(11) DEFAULT NULL,
  `playerPassword` varchar(64) DEFAULT NULL,
  `salt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`playerId`),
  UNIQUE KEY `playerLogin` (`playerLogin`),
  UNIQUE KEY `playerEmail` (`playerEmail`),
  KEY `fk_player_playerTeam` (`playerTeam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

INSERT INTO `player` (`playerId`, `playerLogin`, `playerFirstName`, `playerLastName`, `playerBirthYear`, `playerEmail`, `playerTeam`, `playerPassword`, `salt`) VALUES
(67, 'marca', 'marca', 'marca', 1995, 'marca@marca.ma', 1, '5acf151a497c48a0d633e89394d4782f1c7f3cf5a8d69c0cc0c28ce1b1e7a670', '§^\0!îŽ²BQ'),
(71, 'uniqueNick', 'aaaaa', 'aaaaaaaaa', 1995, 'bbbbb@bbbbbb.bbbb', 2, '7da81f70cd896a94a20e1bdacecd68892a6d34e1f55da342de4bfcd7bc32811b', 'Õªrt[Â‹'),
(73, 'kambo', 'kam', 'bo', 1995, 'kambo@kambo.kam', 1, 'f03d2a51db660cd7b4fe83958e8d38c7b3253372a3ec75495ba1964288455bb9', '—à7‡Togû'),
(74, 'anderson', 'anderson', 'silva', 1986, 'anderson.silva@ufc.com', 2, '6b93623dbaba38c15b323c7765ce38d08487ebace7cea736a7d62f6b56ce465a', '®vÝ‘YfÔ¬G“'),
(75, 'bamboo', 'aaa', 'aaa', 1995, 'ayoub.nasraddine@sfr.fra', 2, 'd7eb4c835ef285add366343f607332c665ab00b9360608829d49cc4a7a332120', 'vÓäÏÎñL¥´0'),
(76, 'american', 'ame', 'rican', 1995, 'ame@ric.an', NULL, '20a27b2a13f01302aa711f0e2d48bea7b35f2769bc51cc008e5293ee07ae05e8', 'WÂniòó¯ÞoJ'),
(77, 'Bbbbb', '', '', 0, 'bbbb@bb-', NULL, '1309befb81472c01b93e28a51e779b5e7377709728ea21aa3e82eec524246de5', 'mnxÂë €¼Z/'),
(78, 'test', 'test', 'test', 1995, 'test@d', 1, 'de2b1c3655c6cc20ea4688d12e5506c7c9bfa2886c70f56afc1338e44db6eb90', 'Ê„ºàOÒ@o');

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `reviewDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `review` (`id`, `title`, `content`, `reviewDate`) VALUES
(2, 'title', 'eezfdfsdf', '2016-05-15 15:06:45'),
(3, 'cool', 'ababababababbaba', '2016-05-15 22:14:58'),
(4, '', '', '2016-05-15 22:17:17'),
(5, '', '', '2016-05-15 22:20:39'),
(6, '', '', '2016-05-15 22:20:46'),
(7, 'azazazaz', 'bonjour j''aim ee dcsds', '2016-05-15 22:28:30'),
(8, 'cool', 'hello my name is nomnomnom\r\n\r\n', '2016-05-16 06:39:36'),
(9, 'vvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2016-05-16 10:13:53'),
(10, 'vvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2016-05-16 10:14:08');

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `siteName` varchar(25) NOT NULL,
  `siteAdrNumber` varchar(25) DEFAULT NULL,
  `siteAdrStreet` varchar(25) NOT NULL,
  `siteAdrPostCode` int(11) DEFAULT NULL,
  `siteAdrCity` varchar(25) NOT NULL,
  `surface` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`siteName`),
  KEY `fk_site_surface` (`surface`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `site` (`siteName`, `siteAdrNumber`, `siteAdrStreet`, `siteAdrPostCode`, `siteAdrCity`, `surface`) VALUES
('allianz arena', '2', 'kruger street', NULL, '', 'Artificial Grass'),
('bernabeu', NULL, 'rue du thym', NULL, 'madrid', 'Soft Ground Pro'),
('insport montpellier', '255', '', NULL, 'montpellier', 'Firm Ground'),
('le five montpellier', '2', '', NULL, 'montpellier', 'Indoor'),
('mossson', '1042', '', NULL, 'montpellier', 'Turf Trainer'),
('nou', NULL, 'rue des lavandes', NULL, 'barcelona', 'Artificial Grass'),
('old trafford', NULL, '', NULL, '', 'Street'),
('parc des princes', '255', '', NULL, 'paris', 'Soft Grass'),
('stade de france', '1', '', NULL, 'saint denis', 'Soft Grass'),
('velodrome', '25', '', NULL, 'marseille', 'Firm Ground');

DROP TABLE IF EXISTS `surface`;
CREATE TABLE IF NOT EXISTS `surface` (
  `surfaceName` varchar(25) NOT NULL,
  PRIMARY KEY (`surfaceName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `surface` (`surfaceName`) VALUES
('Artificial Grass'),
('Firm Ground'),
('Hard Ground'),
('Indoor'),
('Soft Grass'),
('Soft Ground Pro'),
('Street'),
('Turf Trainer');

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `teamId` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(25) NOT NULL,
  `teamCreationDate` date NOT NULL,
  PRIMARY KEY (`teamId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `team` (`teamId`, `teamName`, `teamCreationDate`) VALUES
(1, 'barca', '2016-05-05'),
(2, 'real', '2016-05-05');


ALTER TABLE `player`
  ADD CONSTRAINT `fk_player_playerTeam` FOREIGN KEY (`playerTeam`) REFERENCES `team` (`teamId`);

ALTER TABLE `site`
  ADD CONSTRAINT `fk_site_surface` FOREIGN KEY (`surface`) REFERENCES `surface` (`surfaceName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
