-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 05:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingNumber` int(11) NOT NULL,
  `ticketNumber` int(11) NOT NULL,
  `promotionId` int(11) DEFAULT NULL,
  `cardId` int(11) DEFAULT NULL,
  `userId` varchar(255) NOT NULL,
  `movieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingNumber`, `ticketNumber`, `promotionId`, `cardId`, `userId`, `movieId`) VALUES
(4, 62, 12, 31, 'q', 4),
(5, 63, 12, 31, 'q', 4),
(6, 64, 12, 31, 'q', 4),
(7, 69, NULL, 32, 'q', 6);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `movieCast` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `ratingCode` enum('G','PG','PG-13','R','NC-17') DEFAULT NULL,
  `comingSoon` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `duration` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`title`, `category`, `movieCast`, `director`, `producer`, `synopsis`, `reviews`, `trailer`, `picture`, `ratingCode`, `comingSoon`, `id`, `duration`) VALUES
('Test', 'Action', 'person1, person2, person3', 'Person1', 'person1', 'new marvel movie', '10/10', 'https://www.youtube.com/embed/x_me3xsvDgk', 'https://www.vitalthrills.com/wp-content/uploads/2021/11/eternals2poster.jpg', 'PG-13', 1, 4, 100),
('Batman', 'Romance', 'robert pattinson', 'person1', 'person1', 'batman is a hero', '10/10', 'https://www.youtube.com/embed/mqqft2x_Aa4', 'https://m.media-amazon.com/images/M/MV5BYTExZTdhY2ItNGQ1YS00NjJlLWIxMjYtZTI1MzNlMzY0OTk4XkEyXkFqcGdeQXVyMTEyMjM2NDc2._V1_.jpg', 'PG-13', 1, 6, 0),
('Paw Patrol', 'Kids', 'holden smith', 'person1', 'person1', 'hes lame', '0/10', 'https://www.youtube.com/embed/LRMTr2VZcr8', 'https://m.media-amazon.com/images/M/MV5BNzY2OTYwNjItYzczMC00YjYzLThmY2MtZGFhNmVmMzUzN2QyXkEyXkFqcGdeQXVyNjY1MTg4Mzc@._V1_.jpg', 'R', 1, 7, 0),
('Spider-man', 'Marvel', 'person', 'person', 'Perons', 'test', 'good', '', 'https://m.media-amazon.com/images/M/MV5BNTMxOGI4OGMtMTgwMy00NmFjLWIyOTUtYjQ0OGQ4Mjk0YjNjXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg', 'R', 1, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `billingAddress` varchar(255) DEFAULT NULL,
  `expirationDate` varchar(255) DEFAULT NULL,
  `cardNumber` varbinary(255) NOT NULL,
  `cvv` varbinary(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `cardId` int(11) NOT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_card`
--

INSERT INTO `payment_card` (`billingAddress`, `expirationDate`, `cardNumber`, `cvv`, `fullName`, `cardId`, `userId`) VALUES
('', '', 0x3d4c27374091779abb58a50b7d3f6e39, 0x3d4c27374091779abb58a50b7d3f6e39, '', 29, ''),
('ffff', '10/23', 0xb0d4f4c750172f6816cd81912b04925a, 0x296a40b94fc65430ab558014f30c0eb1, 'ho', 30, 'ho'),
('test', '12/12', 0xf4b8312b3d55d89a85721a6b733f699b, 0x296a40b94fc65430ab558014f30c0eb1, 'Juan', 31, 'q'),
('another', '00/00', 0x23349b23fe4b415e0195b5e9c5635fb2, 0x92e92b03bf5a5284e61397d06b13601f, 'Juan', 32, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promoName` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `promDescription` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promoName`, `code`, `promDescription`, `id`, `discount`) VALUES
('test', 'q', 'test', 8, 0),
('test', 'q', 'test', 10, 0),
('another another promo', '12345', 'another promo', 11, 0),
('works', '1234', 'works', 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `showinfo`
--

CREATE TABLE `showinfo` (
  `movieId` int(11) NOT NULL,
  `showRoomId` int(11) DEFAULT NULL,
  `showId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showinfo`
--

INSERT INTO `showinfo` (`movieId`, `showRoomId`, `showId`, `date`, `time`) VALUES
(6, NULL, 3, '2021-11-22', '15:15:15'),
(6, NULL, 5, '3333-11-18', '15:15:14'),
(4, NULL, 7, '3000-11-18', '22:10:05'),
(4, NULL, 8, '2021-11-19', '02:20:20'),
(4, NULL, 9, '3000-11-18', '23:10:05'),
(7, NULL, 10, '2021-11-19', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `id` int(11) NOT NULL,
  `numberOfSeats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `theaterName` varchar(255) NOT NULL,
  `showRoomNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `numAdult` int(11) DEFAULT NULL,
  `numChild` int(11) DEFAULT NULL,
  `numSenior` int(11) DEFAULT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `numAdult`, `numChild`, `numSenior`, `total`) VALUES
(23, 1, 1, 1, 0),
(24, 2, 2, 2, 0),
(25, 1, 1, 1, 0),
(26, 0, 0, 0, 0),
(27, 1, 0, 0, 0),
(28, 0, 0, 0, 0),
(29, 10, 10, 10, 30),
(30, 10, 10, 10, 30),
(31, 10, 10, 10, 30),
(32, 10, 10, 10, 30),
(33, 10, 10, 10, 30),
(34, 10, 10, 10, 30),
(35, 10, 10, 10, 30),
(36, 10, 10, 10, 30),
(37, 10, 10, 10, 30),
(38, 2, 2, 2, 38.48),
(39, 2, 2, 2, 38.48),
(40, 2, 2, 2, 38.48),
(41, 2, 2, 2, 38.48),
(42, 2, 2, 2, 38.48),
(43, 2, 2, 2, 38.48),
(44, 2, 2, 2, 38.48),
(45, 2, 2, 2, 38.48),
(46, 2, 2, 2, 38.48),
(48, 2, 2, 2, 38.48),
(49, 2, 2, 2, 38.48),
(50, 2, 2, 2, 38.48),
(51, 2, 2, 2, 38.48),
(52, 2, 2, 2, 38.48),
(53, 2, 2, 2, 38.48),
(54, 2, 2, 2, 38.48),
(55, 2, 2, 2, 38.48),
(56, 2, 2, 2, 38.48),
(57, 3, 3, 3, 62.72),
(58, 3, 3, 3, 62.72),
(59, 1, 1, 1, 1),
(60, 3, 3, 3, 62.72),
(61, 3, 3, 3, 62.72),
(62, 1, 1, 1, 18.24),
(63, 1, 1, 1, 18.24),
(64, 1, 1, 1, 18.24),
(65, 1, 1, 1, 22.24),
(66, 1, 1, 1, 22.24),
(67, 1, 1, 1, 22.24),
(68, 2, 2, 2, 42.48),
(69, 1, 1, 1, 22.24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` varchar(255) NOT NULL,
  `pass` varbinary(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `receiveProm` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isBlocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `pass`, `firstName`, `lastName`, `email`, `active`, `receiveProm`, `isAdmin`, `isBlocked`) VALUES
('ho', 0xdca4199542abd27fec564dcbe8334371, 'ho', 'ho', 'holdenmax3@aol.com', 0, 0, 0, 0),
('q', 0xca0cd70313c247a0b63d42bd2e65a723, 'q', 'q', 'q', 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingNumber`),
  ADD KEY `ticketNumber` (`ticketNumber`),
  ADD KEY `promotionId` (`promotionId`),
  ADD KEY `cardId` (`cardId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `movieId` (`movieId`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`cardId`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showinfo`
--
ALTER TABLE `showinfo`
  ADD PRIMARY KEY (`showId`),
  ADD KEY `showRoomId` (`showRoomId`),
  ADD KEY `movieId` (`movieId`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD KEY `showRoomNum` (`showRoomNum`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `showinfo`
--
ALTER TABLE `showinfo`
  MODIFY `showId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `cardId` FOREIGN KEY (`cardId`) REFERENCES `payment_card` (`cardId`),
  ADD CONSTRAINT `movieId` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `promoId` FOREIGN KEY (`promotionId`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `ticketNumber` FOREIGN KEY (`ticketNumber`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `showinfo`
--
ALTER TABLE `showinfo`
  ADD CONSTRAINT `showinfo_ibfk_2` FOREIGN KEY (`showRoomId`) REFERENCES `showroom` (`id`),
  ADD CONSTRAINT `showinfo_ibfk_3` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`showRoomNum`) REFERENCES `showroom` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
