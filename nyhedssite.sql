-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 22. 10 2015 kl. 12:37:51
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nyhedssite`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `nyheder`
--

CREATE TABLE IF NOT EXISTS `nyheder` (
`nyhed_id` int(10) unsigned NOT NULL,
  `nyhed_dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nyhed_overskrift` varchar(150) COLLATE utf8_danish_ci NOT NULL,
  `nyhed_indhold` text COLLATE utf8_danish_ci NOT NULL,
  `nyhed_forfatternavn` varchar(150) COLLATE utf8_danish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `nyheder`
--

INSERT INTO `nyheder` (`nyhed_id`, `nyhed_dato`, `nyhed_overskrift`, `nyhed_indhold`, `nyhed_forfatternavn`) VALUES
(1, '2015-10-22 06:19:47', 'Nyhed 1 test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor. In hac habitasse platea dictumst. Nulla ultrices odio. Donec augue. Phasellus dui. Maecenas facilisis nisl vitae nibh. Proin vel est vitae eros pretium dignissim. Aliquam aliquam sodales orci. Suspendisse potenti. Nunc adipiscing euismod arcu. Quisque facilisis mattis lacus.', 'Anders Andersen'),
(2, '2015-10-22 06:20:18', 'Nyhed 2', 'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder. Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.', 'Børge Børgesen'),
(3, '2015-10-22 06:21:31', 'Nyhed 3', 'Si meliora dies, ut vina, poemata reddit, velim scire, chartis pretium quotus arroget annus. scriptor abhinc annos centum qui decidit, inter perfectos veteresque referri debet an inter vilis atque novos? Excludat iurgia finis, "Est vetus atque probus, centum qui perficit annos." Quid, qui deperiit minor uno mense vel anno, inter quos referendus erit?', 'Carl Carlsen'),
(4, '2015-10-22 06:23:41', 'Nyhed 4', 'Duis aute in voluptate velit esse cillum dolore eu fugiat nulla pariatur. At vver eos et accusam dignissum qui blandit est praesent. Trenz pruca beynocguon25 doas nog apoply su trenz ucu hugh rasoluguon monugor or trenz ucugwo jag scannar.', 'Dorthe Dorthesen'),
(5, '2015-10-22 08:21:09', 'Nyhed 5', 'Wa hava laasad trenzsa gwo producgs su IdfoBraid, yop quiel geg50 ba solaly rasponsubla rof trenzur sala ent dusgrubuguon. Offoctivo immoriatoly, hawrgasi pwicos asi sirucor. ', 'Erik Eriksen');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `nyheder`
--
ALTER TABLE `nyheder`
 ADD PRIMARY KEY (`nyhed_id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `nyheder`
--
ALTER TABLE `nyheder`
MODIFY `nyhed_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
