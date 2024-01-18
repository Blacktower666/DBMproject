SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- 数据库： `dbmproject`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--
DROP TABLE IF EXISTS `dbmproject`;
CREATE TABLE IF NOT EXISTS `owner` (
  `oID` int NOT NULL AUTO_INCREMENT,
  `oname` varchar(10) NOT NULL,
  `oact` char(11) NOT NULL,
  `opsw` char(25) NOT NULL,
  PRIMARY KEY (`oID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `owner` (`oID`, `oname`, `oact`, `opsw`) VALUES
(0,'Blair','1','1');
COMMIT;
-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uID` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(10) NOT NULL,
  `upnub` char(11) NOT NULL,	
  `upsw` char(25) NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rating`
--

INSERT INTO `user` (`uID`, `uname`, `upnub`, `upsw`) VALUES
(0,'Amy','11111111111','11111111111'),
(1,'Bob','22222222222','22222222222'),
(2,'Clare','33333333333','33333333333'),
(3,'David','44444444444','44444444444'),
(4,'Fiona','55555555555','55555555555'),
(5,'George','66666666666','66666666666');
COMMIT;
-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bID` int NOT NULL AUTO_INCREMENT,
  `bname` char(50) NOT NULL,
  `writer` char(50) NOT NULL,
  `type` char(25) ,
  `mark` int NOT NULL,
  `mktimes` int NOT NULL,
  `description` varchar(1000),
  PRIMARY KEY (`bID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `rating`
--

INSERT INTO `books` (`bID`, `bname`, `writer`, `type`) VALUES
(0,'C programing','p1','type1'),
(1,'C++ programing','p2','type2'),
(2,'Python programing','p3','type3'),
(3,'JAVA programing','p4','type4'),
(4,'php programing','p5','type5'),
(5,'c# programing','p6','type6');
COMMIT;
-- --------------------------------------------------------

--
-- 表的结构 `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `moID` int NOT NULL AUTO_INCREMENT,
  `moname` char(50) NOT NULL,
  `director` char(50) NOT NULL,
  `type` char(25) ,
  `mark` int NOT NULL,
  `mktimes` int NOT NULL,
  PRIMARY KEY (`moID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `movies`
--

INSERT INTO `movies` (`moID`, `moname`, `director`, `type`) VALUES
(0,'Iron man','d1','type1'),
(1,'Bat man','d2','type2'),
(2,'Forrest Gump','d3','type3'),
(3,'Farewell to My Concubine','d4','type4'),
(4,'Little Women','d5','type5'),
(5,'Gone With the Wind','d6','type6');
COMMIT;
-- --------------------------------------------------------
--
-- 表的结构 `musics`
--

CREATE TABLE IF NOT EXISTS `musics` (
  `muID` int NOT NULL AUTO_INCREMENT,
  `muname` char(50) NOT NULL,
  `singer` char(50) NOT NULL,
  `style` char(25) ,
  `mark` int NOT NULL,
  `mktimes` int NOT NULL,
  PRIMARY KEY (`muID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `musics`
--

INSERT INTO `musics` (`muID`, `muname`, `singer`, `style`) VALUES
(0,'Blank Space','Taylor Swift','style1'),
(1,'Lover','Taylor Swift','style2'),
(2,'Style','Taylor Swift','style3'),
(3,'Wildest Dreams','Taylor Swift','style4'),
(4,'I Knew You Were Trouble','Taylor Swift','style5'),
(5,'Style','Taylor Swift','style6');
COMMIT;
-- --------------------------------------------------------

--
-- 表的结构 `book_comment`
--

CREATE TABLE IF NOT EXISTS `book_comment` (
  
  `bID` int NOT NULL,
  `uID` int NOT NULL,
  `commentword` varchar(1000) NOT NULL
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book_comment`
--
-- --------------------------------------------------------

--
-- 表的结构 `book_favor`
--

CREATE TABLE IF NOT EXISTS `book_favor` (
  `bfID` int NOT NULL AUTO_INCREMENT,
  `bID` int NOT NULL,
  `uID` int NOT NULL,
  PRIMARY KEY (`bfID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book_favor`
--
-- --------------------------------------------------------

--
-- 表的结构 `movie_comment`
--

CREATE TABLE IF NOT EXISTS `movie_comment` (
  `mocID` int NOT NULL AUTO_INCREMENT,
  `moID` int NOT NULL,
  `uID` int NOT NULL,
  `commentword` varchar(1000) NOT NULL,
  PRIMARY KEY (`mocID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `movie_comment`
--
-- --------------------------------------------------------

--
-- 表的结构 `movie_favor`
--

CREATE TABLE IF NOT EXISTS `movie_favor` (
  `mofID` int NOT NULL AUTO_INCREMENT,
  `moID` int NOT NULL,
  `uID` int NOT NULL,
  PRIMARY KEY (`mofID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `movie_favor`
--
-- --------------------------------------------------------

--
-- 表的结构 `music_comment`
--

CREATE TABLE IF NOT EXISTS `music_comment` (
  `mucID` int NOT NULL AUTO_INCREMENT,
  `muID` int NOT NULL,
  `uID` int NOT NULL,
  `commentword` varchar(1000) NOT NULL,
  PRIMARY KEY (`mucID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `music_comment`
--
-- --------------------------------------------------------

--
-- 表的结构 `music_favor`
--

CREATE TABLE IF NOT EXISTS `music_favor` (
  `mufID` int NOT NULL AUTO_INCREMENT,
  `muID` int NOT NULL,
  `uID` int NOT NULL,
  PRIMARY KEY (`mufID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `music_favor`
--
-- --------------------------------------------------------
