-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:32 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.11

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
  `bookingNumber` int NOT NULL,
  `ticketNumber` int NOT NULL,
  `promotionId` int DEFAULT NULL,
  `cardId` int DEFAULT NULL,
  `userId` varchar(255) NOT NULL,
  `movieId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingNumber`, `ticketNumber`, `promotionId`, `cardId`, `userId`, `movieId`) VALUES
(3, 1, 8, 36, 'q', 6);

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
  `id` int NOT NULL,
  `duration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `cardId` int NOT NULL,
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment_card`
--

INSERT INTO `payment_card` (`billingAddress`, `expirationDate`, `cardNumber`, `cvv`, `fullName`, `cardId`, `userId`) VALUES
('1', '1111', 0x03b3a4864664145f376a293e3701b8b8, 0x988718badc65f79e9610b80eb97d640b, '1', 36, 'q'),
('55', '555', 0xc99e9d575743d3f38848d52cbbbb7e08, 0xa9d8b6cd5e590e66c4e9f8878ba5f68c, '55', 37, 'q'),
('ggg', 'ggggg', 0xbe22e4cb219f7d477f5e853f9738ee15, 0x7c9ba5aba55c34b3c97692164a20f1d8, 'gggg', 38, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promoName` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `promDescription` varchar(255) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promoName`, `code`, `promDescription`, `id`) VALUES
('test', 'q', 'test', 8),
('test', 'q', 'test', 10),
('another another promo', '12345', 'another promo', 11);

-- --------------------------------------------------------

--
-- Table structure for table `showinfo`
--

CREATE TABLE `showinfo` (
  `movieId` int NOT NULL,
  `showRoomId` int DEFAULT NULL,
  `showId` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `numberOfSeats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `theaterName` varchar(255) NOT NULL,
  `showRoomNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `AgeType` enum('adult','senior','child') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `AgeType`) VALUES
(1, 'adult'),
(4, NULL);

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
  `isBlocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `pass`, `firstName`, `lastName`, `email`, `active`, `receiveProm`, `isAdmin`, `isBlocked`) VALUES
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
  MODIFY `bookingNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `cardId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `showinfo`
--
ALTER TABLE `showinfo`
  MODIFY `showId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ticketNumber`) REFERENCES `ticket` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`promotionId`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `booking_ibfk_7` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_8` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `booking_ibfk_9` FOREIGN KEY (`cardId`) REFERENCES `payment_card` (`cardId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
