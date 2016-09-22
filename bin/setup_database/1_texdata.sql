-- Host: 127.0.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- ------------------------ --
-- Database: `texdata`
-- ------------------------ --
-- --------------------------------------------------------
-- @TABLE 本一覧
-- @params {int} 本ID - book_id
-- @params {text} タイトル - title
-- @params {text} 著者 - author
-- @params {int} 値段 - price
-- @params {int} カテゴリID - cat_id
-- @params {int} 画像パス - img
-- @params {int} ISBN - isbn
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `books` (
	`book_id` int(11) AUTO_INCREMENT,
	`title` text NOT NULL,
	`author` text NOT NULL,
	`price` int(11) DEFAULT NULL,
	`cat_id` int(11) NOT NULL,
	`img` text,
	`isbn` text,
	PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
-- --------------------------------------------------------
-- @TABLE 予約一覧
-- @params {int} 予約ID - reservation_id
-- @params {int} 本ID - book_id
-- @params {int} 古本市ID - fair_id
-- @params {timestamp} 更新日時 - timestamp
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservation` (
	`reservation_id` int(11) AUTO_INCREMENT,
	`book_id` int(11) NOT NULL,
	`fair_id` int(11) NOT NULL,
	`timestamp` timestamp DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
-- --------------------------------------------------------
-- @TABLE 古本市一覧
-- @params {int} 古本市ID - fair_id
-- @params {timestamp} 開始日時 - start_date
-- @params {timestamp} 終了日時 - Ending_date
-- @params {text} 場所 - place
-- @params {timestamp} 更新日時 - timestamp
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `fair` (
	`fair_id` int(11) AUTO_INCREMENT,
	`start_date` timestamp DEFAULT CURRENT_TIMESTAMP,
	`Ending_date` timestamp DEFAULT CURRENT_TIMESTAMP,
	`place` text NOT NULL,
	`timestamp` timestamp DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`fair_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
-- --------------------------------------------------------
-- @TABLE カテゴリ一覧
-- @params {int} カテゴリID - cat_id
-- @params {text} 大学名 - university
-- @params {text} 学部名 - gakubu
-- @params {text} 学科名 - gakka
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `category` (
	`cat_id` int(11) AUTO_INCREMENT,
	`university` text NOT NULL,
	`gakubu` text NOT NULL,
	`gakka` text NOT NULL,
	PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------