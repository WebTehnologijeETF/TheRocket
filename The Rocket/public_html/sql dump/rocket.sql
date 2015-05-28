-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2015 at 12:15 AM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rocket`
--
CREATE DATABASE IF NOT EXISTS `rocket` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `rocket`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
`id` int(11) NOT NULL,
  `vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(40) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `tekst`, `autor`, `vrijeme`, `email`) VALUES
(1, 1, 'komentar', 'Azra', '2015-05-28 15:36:37', 'test@gmail.com'),
(2, 1, 'test komentar', 'testo testic', '2015-05-28 15:36:46', 'test1@gmail.com'),
(3, 1, 'test komentar', 'testo testic', '2015-05-28 15:36:52', 'test2@gmail.com'),
(7, 2, 'test komentar', 'testo testic', '2015-05-28 15:37:00', 'test3@gmail.com'),
(8, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(9, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(10, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(11, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(12, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(13, 2, 'komentar', 'Azra', '2015-05-28 15:37:08', 'test4@gmail.com'),
(14, 1, 'ramdp,', 'random', '2015-05-28 18:45:16', 'random'),
(15, 1, 'ramdp,', 'random', '2015-05-28 18:46:22', 'random'),
(16, 2, 'test-sql', 'test-sql', '2015-05-28 18:46:34', 'noemail'),
(17, 2, 'fkagšjo', 'gnipgj', '2015-05-28 19:16:01', 'đpgkgšak'),
(18, 2, 't', 'a', '2015-05-28 19:20:08', 'e'),
(19, 2, 'wt je zakon', 'wt ludilo', '2015-05-28 19:21:08', 'wt email'),
(20, 2, 'The ways that web browser makers fund their development costs has changed over time. The first web browser, WorldWideWeb, was a research project.\r\n\r\nNetscape Navigator was sold commercially, as was Opera.\r\n\r\nInternet Explorer, on the other hand, was bundled free with the Windows operating system (and was also downloadable free), and therefore it was funded partly by the sales of Windows to computer manufacturers and direct to users. Internet Explorer also used to be available for the Mac. It is likely that releasing IE for the Mac was part of Microsoft''s overall strategy to fight threats to its quasi-monopoly platform dominance - threats such as web standards and Java - by making some web developers, or at least their managers, assume that there was "no need" to develop for anything other than Internet Explorer. In this respect, IE may have contributed to Windows and Microsoft applications sales in another way, through "lock-in" to Microsoft''s browser.\r\n\r\nIn January 2009, the European Commission announced it would investigate the bundling of Internet Explorer with Windows operating systems from Microsoft, saying "Microsoft''s tying of Internet Explorer to the Windows operating system harms competition between web browsers, undermines product innovation and ultimately reduces consumer choice."Microsoft Corp v Commission[15][16]\r\n\r\nSafari and Mobile Safari were likewise always included with OS X and iOS respectively, so, similarly, they were originally funded by sales of Apple computers and mobile devices, and formed part of the overall Apple experience to customers.\r\n\r\nToday, most commercial web browsers are paid by search engine companies to make their engine default, or to include them as another option. For example, Google pays Mozilla, the maker of Firefox, to make Google Search the default search engine in Firefox. Mozilla makes enough money from this deal that it does not need to charge users for Firefox. In addition, Google Search is also (as one would expect) the default search engine in Google Chrome. Users searching for websites or items on the Internet would be led to Google''s search results page, increasing ad revenue and which funds development at Google and of Google Chrome.\r\n\r\nMany less-well-known free software browsers, such as Konqueror, were hardly funded at all and were developed mostly by volunteers free of charge.', 'wt ludilo', '2015-05-28 19:21:08', 'wt email'),
(24, 3, '&lt;img alt=&quot;tab&quot; src=&quot;The Rocket-images/1439185-30780610-1600-900.jpg&quot;/&gt;', 'a', '2015-05-28 20:54:55', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`) VALUES
('user1', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

DROP TABLE IF EXISTS `vijest`;
CREATE TABLE IF NOT EXISTS `vijest` (
`id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detaljnije` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `slika`, `tekst`, `autor`, `vrijeme`, `detaljnije`) VALUES
(1, 'Shocking news', 'The Rocket-images/1439185-30780610-1600-900.jpg', 'Bilijar je prejak', 'Azra', '2015-05-28 11:06:58', 'Super detaljni tekst'),
(2, 'Shocking news2', 'The Rocket-images/1439185-30780610-1600-900.jpg', 'Bilijar je najjaci', 'Eurosport', '2015-05-28 13:49:45', 'Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst Super detaljni tekst'),
(3, 'Shocking news3', 'The Rocket-images/1439185-30780610-1600-900.jpg', 'Bilijar je najjaci', 'Eurosport', '2015-05-28 13:49:45', 'The ways that web browser makers fund their development costs has changed over time. The first web browser, WorldWideWeb, was a research project.\r\n\r\nNetscape Navigator was sold commercially, as was Opera.\r\n\r\nInternet Explorer, on the other hand, was bundled free with the Windows operating system (and was also downloadable free), and therefore it was funded partly by the sales of Windows to computer manufacturers and direct to users. Internet Explorer also used to be available for the Mac. It is likely that releasing IE for the Mac was part of Microsoft''s overall strategy to fight threats to its quasi-monopoly platform dominance - threats such as web standards and Java - by making some web developers, or at least their managers, assume that there was "no need" to develop for anything other than Internet Explorer. In this respect, IE may have contributed to Windows and Microsoft applications sales in another way, through "lock-in" to Microsoft''s browser.\r\n\r\nIn January 2009, the European Commission announced it would investigate the bundling of Internet Explorer with Windows operating systems from Microsoft, saying "Microsoft''s tying of Internet Explorer to the Windows operating system harms competition between web browsers, undermines product innovation and ultimately reduces consumer choice."Microsoft Corp v Commission[15][16]\r\n\r\nSafari and Mobile Safari were likewise always included with OS X and iOS respectively, so, similarly, they were originally funded by sales of Apple computers and mobile devices, and formed part of the overall Apple experience to customers.\r\n\r\nToday, most commercial web browsers are paid by search engine companies to make their engine default, or to include them as another option. For example, Google pays Mozilla, the maker of Firefox, to make Google Search the default search engine in Firefox. Mozilla makes enough money from this deal that it does not need to charge users for Firefox. In addition, Google Search is also (as one would expect) the default search engine in Google Chrome. Users searching for websites or items on the Internet would be led to Google''s search results page, increasing ad revenue and which funds development at Google and of Google Chrome.\r\n\r\nMany less-well-known free software browsers, such as Konqueror, were hardly funded at all and were developed mostly by volunteers free of charge.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id`,`vijest`), ADD KEY `vijest` (`vijest`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vijest`
--
ALTER TABLE `vijest`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `vijest`
--
ALTER TABLE `vijest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
