-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 08. 12:16
-- Kiszolgáló verziója: 10.4.20-MariaDB
-- PHP verzió: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webanter`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `chat`
--

CREATE TABLE `chat` (
  `messageID` int(11) DEFAULT NULL,
  `ChatID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `chat`
--

INSERT INTO `chat` (`messageID`, `ChatID`, `senderID`, `receiverID`) VALUES
(NULL, 2, 1, 6),
(NULL, 3, 1, 2),
(NULL, 6, 1, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friend`
--

CREATE TABLE `friend` (
  `FID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `friend`
--

INSERT INTO `friend` (`FID`, `UserID`) VALUES
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friendlist`
--

CREATE TABLE `friendlist` (
  `ID` int(11) NOT NULL,
  `FID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `sentTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userinfo`
--

CREATE TABLE `userinfo` (
  `userID` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `profileIMG` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `userinfo`
--

INSERT INTO `userinfo` (`userID`, `email`, `name`, `password`, `gender`, `profileIMG`) VALUES
(1, 'asd@email.com', 'tihamér', 'asd123', 0, 'https://i.redd.it/dsds5y8ttxo81.jpg'),
(2, 'noreply@google.com', 'Google Account', 'asd123', 0, 'https://i.redd.it/fy0t7gpd36u51.png'),
(3, 'tesztemail@gmail.com', 'Teszt', 'aaa333', 1, 'https://www.usnews.com/dims4/USNEWS/e2c4b6a/2147483647/thumbnail/640x420/quality/85/?url=http%3A%2F%2Fmedia.beam.usnews.com%2F80%2F60%2Fec25aef14cceac348871255a4194%2F200113-exam-stock.jpg'),
(4, 'asd@asd.com', 'HotGuys34', 'asd', 0, 'https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'),
(5, 'aaasd@gmail.com', 'NTFGirlfriend', 'asd', 0, 'https://nftaggregator.io/wp-content/uploads/2021/12/MGF-copy.gif'),
(6, 'tezt@email.com', 'tezt', 'asd', 0, 'https://cdn.portfolio.hu/articles/images-xs/g/y/o/gyorsteszt-401554.jpg'),
(8, 'lololo@gmail.com', 'ASD', 'asd123', 0, 'https://cdn.w600.comps.canstockphoto.hu/sz%C3%ADnk%C3%A9p-icons-autism-asd-%C3%B6sszezavar-rajz_csp54340190.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`),
  ADD UNIQUE KEY `senderID` (`senderID`,`receiverID`),
  ADD UNIQUE KEY `messageID` (`messageID`) USING BTREE,
  ADD KEY `receiverID` (`receiverID`);

--
-- A tábla indexei `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `UserID` (`UserID`);

--
-- A tábla indexei `friendlist`
--
ALTER TABLE `friendlist`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FID` (`FID`);

--
-- A tábla indexei `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- A tábla indexei `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `friend`
--
ALTER TABLE `friend`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `friendlist`
--
ALTER TABLE `friendlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `userinfo` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `userinfo` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `friendlist`
--
ALTER TABLE `friendlist`
  ADD CONSTRAINT `friendlist_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `friend` (`FID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`messageID`) REFERENCES `chat` (`messageID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
