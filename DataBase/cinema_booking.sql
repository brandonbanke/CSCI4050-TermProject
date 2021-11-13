-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2021 at 04:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingNumber` varchar(255) NOT NULL,
  `ticketNumber` int(11) NOT NULL,
  `movieTitle` varchar(255) NOT NULL,
  `showDate` varchar(255) NOT NULL,
  `showTime` varchar(255) NOT NULL,
  `promotionId` int(11) DEFAULT NULL,
  `cardId` int(11) DEFAULT NULL,
  `userId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userId` varchar(255) DEFAULT NULL,
  `cardId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `showTime` varchar(255) NOT NULL,
  `showDate` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`title`, `category`, `movieCast`, `director`, `producer`, `synopsis`, `reviews`, `trailer`, `picture`, `ratingCode`, `showTime`, `showDate`, `id`) VALUES
('T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'G', 'T', 'T', 1),
('G', 'G', 'G', 'G', 'G', 'G', 'G', 'G', 'G', 'G', 'G', 'G', 3);

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
('tt', '22/22', 0xa8c62a58461527420430fd6cc2049f29, 0xa9d8b6cd5e590e66c4e9f8878ba5f68c, 'tt', 18, 'q'),
('test', '44/44', 0xb3edae40bbb5131711f9bce52df81363, 0x42dfbde27a015eee5f16b783cac60895, 'test2', 19, 'q'),
('', '', 0x3d4c27374091779abb58a50b7d3f6e39, 0x3d4c27374091779abb58a50b7d3f6e39, '', 20, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promoName` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `promDescription` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promoName`, `code`, `promDescription`, `id`) VALUES
('test', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `showinfo`
--

CREATE TABLE `showinfo` (
  `movieId` int(11) NOT NULL,
  `showRoomId` int(11) NOT NULL,
  `showId` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `duration` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `showTime` varchar(255) DEFAULT NULL,
  `AgeType` enum('adult','senior','child') DEFAULT NULL,
  `ticketNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `pass`, `firstName`, `lastName`, `email`, `active`, `receiveProm`, `isAdmin`) VALUES
('a', 0x2c20c79e9ee0e7d4df38d3985053dd51, 'a', 'a', 'a', 0, 1, 0),
('f', 0x0f761780a25bb27bf8dcbd59c715449a, 'f', 'f', 'f', 0, 1, 0),
('q', 0x2c20c79e9ee0e7d4df38d3985053dd51, 'q', 'q', 'q', 0, 1, 1),
('r', 0x3795a990870394e00dc67dedce583d01, 'r', 'r', 'r', 1, 0, 1),
('test', 0x6aabfc791cbc771039ef17c78f0223aa, 'test', 'test', 'test', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingNumber`),
  ADD KEY `ticketNumber` (`ticketNumber`),
  ADD KEY `promotionId` (`promotionId`),
  ADD KEY `movieTitle` (`movieTitle`),
  ADD KEY `cardId` (`cardId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `userId` (`userId`),
  ADD KEY `cardId` (`cardId`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

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
  ADD KEY `movieId` (`movieId`),
  ADD KEY `showRoomId` (`showRoomId`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketNumber` (`ticketNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ticketNumber`) REFERENCES `ticket` (`ticketNumber`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`promotionId`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `booking_ibfk_7` FOREIGN KEY (`userId`) REFERENCES `customer` (`userId`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`cardId`) REFERENCES `payment_card` (`cardId`);

--
-- Constraints for table `showinfo`
--
ALTER TABLE `showinfo`
  ADD CONSTRAINT `showinfo_ibfk_2` FOREIGN KEY (`showRoomId`) REFERENCES `showroom` (`id`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`showRoomNum`) REFERENCES `showroom` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
