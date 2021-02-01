-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Oca 2021, 17:12:06
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `social_media`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`adminid`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `connections`
--

CREATE TABLE `connections` (
  `followername` varchar(20) NOT NULL,
  `followeename` varchar(20) NOT NULL,
  `connectid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `connections`
--

INSERT INTO `connections` (`followername`, `followeename`, `connectid`) VALUES
('books', 'codycoder', 1),
('catLove', 'codycoder', 2),
('codycoder', 'books', 3),
('happySweet', 'codycoder', 4),
('happySweet', 'perfect', 5),
('joey', 'books', 6),
('joey', 'catLove', 7),
('joey', 'loveEating', 8),
('joey', 'perfect', 9),
('lonely_boy', 'catLove', 10),
('loveEating', 'joey', 11),
('loveEating', 'pink', 12),
('mermaid', 'joey', 14),
('mermaid', 'lonely_boy', 15),
('perfect', 'books', 16),
('perfect', 'pink', 17),
('pink', 'perfect', 18),
('perfect', 'mermaid', 28);

--
-- Tetikleyiciler `connections`
--
DELIMITER $$
CREATE TRIGGER `deletefollowers` AFTER DELETE ON `connections` FOR EACH ROW BEGIN 
  UPDATE users SET followers= followers -1 WHERE users.username=old.followeename; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `followers` BEFORE INSERT ON `connections` FOR EACH ROW BEGIN 
  UPDATE users SET followers= followers +1 WHERE users.username=NEW.followeename; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havecomments`
--

CREATE TABLE `havecomments` (
  `username` varchar(20) NOT NULL,
  `commentid` int(11) NOT NULL,
  `comment_text` varchar(100) DEFAULT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `havecomments`
--

INSERT INTO `havecomments` (`username`, `commentid`, `comment_text`, `postid`) VALUES
('perfect', 2212, 'mine too', 21349),
('books', 2222, 'so good', 24671),
('catLove', 2223, 'nice', 22345),
('loveEating', 2224, 'best', 22345),
('mermaid', 2225, 'absolutelyy', 27123),
('happySweet', 2227, 'heyy', 23765),
('lonely_boy', 2228, 'no way', 27124),
('happySweet', 2236, 'yes!!', 27123),
('books', 2239, 'yeyy', 22112),
('codycoder', 2243, 'good', 22346),
('pink', 2245, 'as I said I love pink', 24444),
('loveEating', 2312, 'and eat', 27123),
('catLove', 2323, 'like cats', 23555),
('books', 2324, 'zdxv', 22111),
('books', 2325, 'zxvcbn', 22111);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havelikedislike`
--

CREATE TABLE `havelikedislike` (
  `username` varchar(20) NOT NULL,
  `identifier` tinyint(1) DEFAULT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `havelikedislike`
--

INSERT INTO `havelikedislike` (`username`, `identifier`, `postid`) VALUES
('catLove', 1, 21349),
('joey', 1, 21350),
('books', 1, 22111),
('happySweet', 1, 22111),
('joey', 1, 22345),
('mermaid', 1, 22345),
('lonely_boy', 0, 23555),
('loveEating', 1, 23555),
('books', 1, 23765),
('catLove', 1, 23765),
('joey', 0, 23765),
('catLove', 0, 24444),
('codycoder', 1, 24671),
('mermaid', 1, 24671),
('books', 1, 24840),
('lonely_boy', 1, 24840),
('mermaid', 1, 27123),
('perfect', 1, 27123),
('perfect', 1, 27124);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havelocations`
--

CREATE TABLE `havelocations` (
  `postid` int(11) NOT NULL,
  `locid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `havelocations`
--

INSERT INTO `havelocations` (`postid`, `locid`) VALUES
(21349, 78149),
(22111, 99908),
(22112, 73693),
(22345, 78149),
(22346, 94822),
(23444, 77227),
(23555, 63042),
(23556, 13291),
(23765, 39523),
(24444, 98581),
(24671, 39523),
(24840, 61160),
(27123, 98581),
(27124, 78149);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havetags`
--

CREATE TABLE `havetags` (
  `postid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `havetags`
--

INSERT INTO `havetags` (`postid`, `tagid`) VALUES
(21349, 14567),
(21350, 14021),
(22111, 16711),
(22112, 13212),
(22345, 13212),
(22346, 11900),
(23444, 18921),
(23555, 16711),
(23556, 18921),
(23765, 14578),
(24444, 12890),
(24671, 12345),
(24840, 11333),
(27123, 12345),
(27124, 14021);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `location`
--

CREATE TABLE `location` (
  `locid` int(11) NOT NULL,
  `countryName` varchar(20) DEFAULT NULL,
  `PlaceName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `location`
--

INSERT INTO `location` (`locid`, `countryName`, `PlaceName`) VALUES
(13291, 'Liberia', 'Monrovia'),
(39523, 'Sint Maarten', 'Philipsburg'),
(61160, 'Sierra Leone', 'Freetown'),
(63042, 'Niue', 'Alofi'),
(73693, 'Gabon', 'Libreville'),
(77227, 'Belize', 'Belmopan'),
(78149, 'Botswana', 'Gaborone'),
(94822, 'Kenya', 'Nairobi'),
(98581, 'Uruguay', 'Montevideo'),
(99908, 'Mali', 'Bamako'),
(99914, 'Turkey', 'Istanbul');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manage_posts`
--

CREATE TABLE `manage_posts` (
  `hideident` tinyint(1) DEFAULT NULL,
  `postid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `manage_posts`
--

INSERT INTO `manage_posts` (`hideident`, `postid`, `adminid`) VALUES
(0, 22111, 2),
(0, 22111, 9),
(0, 22112, 7),
(0, 22345, 1),
(0, 23444, 1),
(0, 23555, 4),
(0, 23555, 5),
(1, 23556, 3),
(0, 23556, 5),
(0, 23556, 9),
(0, 23765, 3),
(0, 24671, 2),
(0, 24840, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manage_users`
--

CREATE TABLE `manage_users` (
  `deadline` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `adminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `manage_users`
--

INSERT INTO `manage_users` (`deadline`, `username`, `adminid`) VALUES
(' ', 'books', 5),
(' ', 'catLove', 3),
('', 'catLove', 9),
(' ', 'codycoder', 1),
(' ', 'happySweet', 6),
(' ', 'joey', 4),
(' ', 'lonely_boy', 7),
(' ', 'lonely_boy', 10),
(' ', 'loveEating', 2),
(' ', 'mermaid', 8),
('', 'perfect', 2),
('19.01.2021', 'pink', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `message` varchar(300) DEFAULT NULL,
  `messageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`sender`, `receiver`, `message`, `messageid`) VALUES
('books', 'codycoder', 'I love reading books', 1),
('catLove', 'loveEating', 'Hello sweety!!!', 2),
('codycoder', 'lonely_boy', 'coder', 3),
('happySweet', 'lonely_boy', 'I am so happy to meet you!!!', 4),
('joey', 'books', 'How you doin???', 5),
('joey', 'loveEating', 'heyyy', 6),
('lonely_boy', 'happySweet', 'I am so lonely', 7),
('loveEating', 'catLove', 'eating is good for everyone', 8),
('mermaid', 'perfect', 'Yes, I love swimming', 9),
('perfect', 'mermaid', 'Are you good at swimming, dancing?', 10),
('pink', 'codycoder', 'I love pink', 11),
('books', 'codycoder', 'ha ha ha', 12),
('books', 'mermaid', 'hello', 13),
('books', 'mermaid', 'hfdttfyxh', 14);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reported_users`
--

CREATE TABLE `reported_users` (
  `Reporter` varchar(20) NOT NULL,
  `Reported` varchar(20) NOT NULL,
  `reportid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `reported_users`
--

INSERT INTO `reported_users` (`Reporter`, `Reported`, `reportid`) VALUES
('books', 'joey', 1),
('catLove', 'codycoder', 2),
('codycoder', 'catLove', 3),
('codycoder', 'loveEating', 4),
('happySweet', 'codycoder', 5),
('joey', 'codycoder', 6),
('lonely_boy', 'mermaid', 7),
('loveEating', 'codycoder', 8),
('mermaid', 'codycoder', 9),
('perfect', 'codycoder', 10),
('pink', 'codycoder', 11),
('books', 'catLove', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `report_posts`
--

CREATE TABLE `report_posts` (
  `postid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `report_posts`
--

INSERT INTO `report_posts` (`postid`, `username`) VALUES
(22111, 'books'),
(22111, 'perfect'),
(22112, 'pink'),
(22345, 'books'),
(23444, 'mermaid'),
(23555, 'lonely_boy'),
(23555, 'mermaid'),
(23556, 'mermaid'),
(23556, 'perfect'),
(23765, 'joey'),
(24671, 'catLove'),
(24840, 'lonely_boy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscribeloc`
--

CREATE TABLE `subscribeloc` (
  `username` varchar(20) NOT NULL,
  `locid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `subscribeloc`
--

INSERT INTO `subscribeloc` (`username`, `locid`) VALUES
('books', 13291),
('books', 99908),
('catLove', 73693),
('codycoder', 77227),
('happySweet', 63042),
('joey', 13291),
('joey', 78149),
('lonely_boy', 61160),
('loveEating', 39523),
('loveEating', 78149),
('mermaid', 98581),
('perfect', 39523),
('perfect', 63042);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscribetags`
--

CREATE TABLE `subscribetags` (
  `username` varchar(20) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `subscribetags`
--

INSERT INTO `subscribetags` (`username`, `tagid`) VALUES
('books', 11333),
('catLove', 12345),
('codycoder', 11900),
('codycoder', 14567),
('happySweet', 12890),
('happySweet', 18921),
('joey', 11900),
('lonely_boy', 16711),
('loveEating', 13212),
('mermaid', 11333),
('mermaid', 14578),
('mermaid', 18921),
('perfect', 11900),
('perfect', 12890),
('perfect', 14021);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `topicname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`tagid`, `topicname`) VALUES
(11333, '#sealove'),
(11900, '#beactive'),
(12345, '#catlove'),
(12890, '#friends4ever'),
(13212, '#donteatmycake'),
(14021, '#pinklove'),
(14567, '#codetime'),
(14578, '#booklove'),
(16711, '#solonely'),
(18921, '#besweet'),
(18922, '#coding');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uploaded_posts`
--

CREATE TABLE `uploaded_posts` (
  `post_text` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `postid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `uploaded_posts`
--

INSERT INTO `uploaded_posts` (`post_text`, `image`, `postid`, `username`) VALUES
('Ocean is my bff', 'images/ocean.jpg', 21349, 'mermaid'),
('Sea is my second bff', NULL, 21350, 'mermaid'),
('Soft kitty warm kitty little ball of fur', NULL, 22111, 'catLove'),
('I love cats', NULL, 22112, 'catLove'),
('FRIENDS...', NULL, 22345, 'joey'),
('I am joey, how you doin??', 'images/joey.jpg', 22346, 'joey'),
('Love eating (hamburger)', 'images/hamburger.jpg', 23444, 'loveEating'),
('Be sweet...???', NULL, 23555, 'happySweet'),
('I love eating sugar', NULL, 23556, 'happySweet'),
('xox gossipgirl', NULL, 23765, 'lonely_boy'),
('pinky little pink', NULL, 24444, 'pink'),
('book', NULL, 24671, 'books'),
('Here is my text', NULL, 24840, 'codycoder'),
('Be sportive', NULL, 27123, 'perfect'),
('Be sportive part 2', NULL, 27124, 'perfect'),
('heyy', 'images/codycoder-2021-01-13-04-01-46-code.jpg', 27125, 'codycoder');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `bio` varchar(100) DEFAULT NULL,
  `passw` varchar(20) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `deactivate` tinyint(1) DEFAULT NULL,
  `followers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`bio`, `passw`, `profile_picture`, `username`, `deactivate`, `followers`) VALUES
('My friends are books', 'aaaaa', 'uploads/cool.jpg', 'books', 0, 3),
('Hello sweety!!', 'sweet12', 'uploads/cat.jpg', 'catLove', 0, 2),
('coder', 'hardtofindmypass', 'uploads/code.jpg', 'codycoder', 0, 3),
('I am so happy to meet with you!!', 'happy123456', NULL, 'happySweet', 0, 0),
('How you doin???', 'heyyo123', NULL, 'joey', 1, 2),
('I am so lonely.', 'lonely12', 'uploads/nature.jpg', 'lonely_boy', 0, 1),
('eating is good for everyone', '11/12/19', NULL, 'loveEating', 0, 1),
('I love swimming', 'seaside', 'uploads/color.jpg', 'mermaid', 0, 1),
('I love swimming, dancing, plying tennis...', 'sportime', 'uploads/view.jfif', 'perfect', 0, 3),
('I love pink', 'pinkypink5', NULL, 'pink', 0, 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Tablo için indeksler `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`connectid`),
  ADD KEY `connectid` (`connectid`),
  ADD KEY `connections_ibfk_1` (`followername`),
  ADD KEY `connections_ibfk_2` (`followeename`);

--
-- Tablo için indeksler `havecomments`
--
ALTER TABLE `havecomments`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `username` (`username`),
  ADD KEY `havecomments_ibfk_1` (`postid`);

--
-- Tablo için indeksler `havelikedislike`
--
ALTER TABLE `havelikedislike`
  ADD PRIMARY KEY (`postid`,`username`),
  ADD KEY `username` (`username`);

--
-- Tablo için indeksler `havelocations`
--
ALTER TABLE `havelocations`
  ADD PRIMARY KEY (`postid`,`locid`),
  ADD KEY `locid` (`locid`);

--
-- Tablo için indeksler `havetags`
--
ALTER TABLE `havetags`
  ADD PRIMARY KEY (`postid`,`tagid`),
  ADD KEY `tagid` (`tagid`);

--
-- Tablo için indeksler `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locid`);

--
-- Tablo için indeksler `manage_posts`
--
ALTER TABLE `manage_posts`
  ADD PRIMARY KEY (`postid`,`adminid`),
  ADD KEY `adminid` (`adminid`);

--
-- Tablo için indeksler `manage_users`
--
ALTER TABLE `manage_users`
  ADD PRIMARY KEY (`username`,`adminid`),
  ADD KEY `adminid` (`adminid`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `messagesid` (`messageid`),
  ADD KEY `messages_ibfk_1` (`sender`),
  ADD KEY `messages_ibfk_2` (`receiver`);

--
-- Tablo için indeksler `reported_users`
--
ALTER TABLE `reported_users`
  ADD PRIMARY KEY (`reportid`),
  ADD KEY `reportid` (`reportid`),
  ADD KEY `reported_users_ibfk_1` (`Reporter`),
  ADD KEY `reported_users_ibfk_2` (`Reported`);

--
-- Tablo için indeksler `report_posts`
--
ALTER TABLE `report_posts`
  ADD PRIMARY KEY (`postid`,`username`),
  ADD KEY `username` (`username`);

--
-- Tablo için indeksler `subscribeloc`
--
ALTER TABLE `subscribeloc`
  ADD PRIMARY KEY (`username`,`locid`),
  ADD KEY `locid` (`locid`);

--
-- Tablo için indeksler `subscribetags`
--
ALTER TABLE `subscribetags`
  ADD PRIMARY KEY (`username`,`tagid`),
  ADD KEY `tagid` (`tagid`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Tablo için indeksler `uploaded_posts`
--
ALTER TABLE `uploaded_posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `username` (`username`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `connections`
--
ALTER TABLE `connections`
  MODIFY `connectid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `havecomments`
--
ALTER TABLE `havecomments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2326;

--
-- Tablo için AUTO_INCREMENT değeri `location`
--
ALTER TABLE `location`
  MODIFY `locid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99915;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `reported_users`
--
ALTER TABLE `reported_users`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18923;

--
-- Tablo için AUTO_INCREMENT değeri `uploaded_posts`
--
ALTER TABLE `uploaded_posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27126;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`followername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`followeename`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `havecomments`
--
ALTER TABLE `havecomments`
  ADD CONSTRAINT `havecomments_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `havecomments_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `havelikedislike`
--
ALTER TABLE `havelikedislike`
  ADD CONSTRAINT `havelikedislike_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `havelikedislike_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `havelocations`
--
ALTER TABLE `havelocations`
  ADD CONSTRAINT `havelocations_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `havelocations_ibfk_2` FOREIGN KEY (`locid`) REFERENCES `location` (`locid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `havetags`
--
ALTER TABLE `havetags`
  ADD CONSTRAINT `havetags_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `havetags_ibfk_2` FOREIGN KEY (`tagid`) REFERENCES `tags` (`tagid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `manage_posts`
--
ALTER TABLE `manage_posts`
  ADD CONSTRAINT `manage_posts_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `manage_posts_ibfk_2` FOREIGN KEY (`adminid`) REFERENCES `admins` (`adminid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `manage_users`
--
ALTER TABLE `manage_users`
  ADD CONSTRAINT `manage_users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_users_ibfk_2` FOREIGN KEY (`adminid`) REFERENCES `admins` (`adminid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `reported_users`
--
ALTER TABLE `reported_users`
  ADD CONSTRAINT `reported_users_ibfk_1` FOREIGN KEY (`Reporter`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reported_users_ibfk_2` FOREIGN KEY (`Reported`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `report_posts`
--
ALTER TABLE `report_posts`
  ADD CONSTRAINT `report_posts_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `uploaded_posts` (`postid`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_posts_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `subscribeloc`
--
ALTER TABLE `subscribeloc`
  ADD CONSTRAINT `subscribeloc_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribeloc_ibfk_2` FOREIGN KEY (`locid`) REFERENCES `location` (`locid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `subscribetags`
--
ALTER TABLE `subscribetags`
  ADD CONSTRAINT `subscribetags_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribetags_ibfk_2` FOREIGN KEY (`tagid`) REFERENCES `tags` (`tagid`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `uploaded_posts`
--
ALTER TABLE `uploaded_posts`
  ADD CONSTRAINT `uploaded_posts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
