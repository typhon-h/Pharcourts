-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2020 at 06:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AS91892 Harrison Tyson`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agents`
--

CREATE TABLE `tbl_agents` (
  `AID` int(11) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `SName` varchar(20) NOT NULL,
  `Qualification` varchar(20) NOT NULL,
  `WorkPh` varchar(15) NOT NULL,
  `MobilePh` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agents`
--

INSERT INTO `tbl_agents` (`AID`, `FName`, `SName`, `Qualification`, `WorkPh`, `MobilePh`, `Email`, `Bio`) VALUES
(1, 'Danjamin', 'Howestein', 'Licensed Reaa 2008', '03 017 7602', '+64 28 355 5483', 'danjamin.howestein@pharcourts.co.nz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet, felis nec aliquet pharetra, nunc mauris bibendum nisi, non facilisis diam est venenatis nisl. Sed sem erat, hendrerit non purus id, mollis porttitor magna. Integer porttitor sagittis ex ut aliquet. \r\n\r\nDonec gravida ullamcorper augue, sit amet cursus metus pretium quis. Proin sagittis massa facilisis sem efficitur, at elementum nisi pellentesque. Nam in mauris a odio bibendum fringilla in sed leo. Aenean eleifend sagittis quam ut fermentum. Curabitur ante lacus, accumsan sed arcu in, tincidunt aliquam metus. Suspendisse non lectus nec nibh vestibulum lobortis at sed lorem. Suspendisse nec libero sit amet velit malesuada semper.'),
(2, 'Cain', 'Frondathon', 'Licensed Reaa 2008', '03 336 2853', '+64 20 555 1456', 'cain.frondathon@pharcourts.co.nz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet, felis nec aliquet pharetra, nunc mauris bibendum nisi, non facilisis diam est venenatis nisl. Sed sem erat, hendrerit non purus id, mollis porttitor magna. Integer porttitor sagittis ex ut aliquet. \r\n\r\nDonec gravida ullamcorper augue, sit amet cursus metus pretium quis. Proin sagittis massa facilisis sem efficitur, at elementum nisi pellentesque. Nam in mauris a odio bibendum fringilla in sed leo. Aenean eleifend sagittis quam ut fermentum. Curabitur ante lacus, accumsan sed arcu in, tincidunt aliquam metus. Suspendisse non lectus nec nibh vestibulum lobortis at sed lorem. Suspendisse nec libero sit amet velit malesuada semper.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_listings`
--

CREATE TABLE `tbl_listings` (
  `LID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Description` longtext NOT NULL,
  `Price` int(8) NOT NULL,
  `Property` int(11) NOT NULL,
  `Agent` int(11) NOT NULL,
  `AuctionDate` date NOT NULL,
  `Sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_listings`
--

INSERT INTO `tbl_listings` (`LID`, `Title`, `Description`, `Price`, `Property`, `Agent`, `AuctionDate`, `Sold`) VALUES
(1, 'A Sophisticated Package', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 599000, 2, 2, '2020-08-28', 0),
(2, 'A Solid Opportunity!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 1495000, 4, 1, '2020-07-31', 0),
(3, 'Picture Perfect', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 749000, 5, 1, '2020-07-01', 1),
(4, 'Be On Top Of The World', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 327000, 3, 2, '2020-08-17', 0),
(5, 'Live, Play, or Invest Away!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 1200000, 6, 1, '2020-09-11', 0),
(6, 'The Decision is Made', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis vel mi a viverra. Suspendisse potenti. Phasellus quis diam leo. Morbi egestas sagittis ligula, sit amet tempor justo aliquet in. Nulla at volutpat sem. Fusce tincidunt venenatis leo ac dignissim. In ut auctor nulla. Nulla erat mauris, tempor vel tempus sit amet, malesuada id arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 699000, 1, 2, '2020-07-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_properties`
--

CREATE TABLE `tbl_properties` (
  `PID` int(11) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Suburb` varchar(15) NOT NULL,
  `Bedrooms` tinyint(4) NOT NULL,
  `Bathrooms` tinyint(4) NOT NULL,
  `Toilets` tinyint(4) NOT NULL,
  `GarageSpaces` tinyint(4) NOT NULL,
  `Size` smallint(6) NOT NULL,
  `Year` int(11) NOT NULL,
  `Construction` varchar(20) NOT NULL,
  `PCondition` varchar(10) NOT NULL,
  `Insulation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_properties`
--

INSERT INTO `tbl_properties` (`PID`, `Address`, `Suburb`, `Bedrooms`, `Bathrooms`, `Toilets`, `GarageSpaces`, `Size`, `Year`, `Construction`, `PCondition`, `Insulation`) VALUES
(1, '376 Pages Road', 'Gleniti', 3, 2, 2, 2, 617, 1997, 'Fibre Cement', 'Excellent', 'Walls, Ceiling'),
(2, '2 George Street', 'Timaru Central', 3, 1, 2, 2, 506, 2004, 'Cement Board', 'Excellent', 'Underfloor, Walls, Ceiling'),
(3, '11 Te Weka Street', 'Maori Hill', 4, 1, 1, 2, 746, 2006, 'Weatherboard', 'Fair', 'Walls'),
(4, '7 Elizabeth Street', 'Timaru Central', 2, 1, 1, 1, 456, 2010, 'Brick', 'Good', 'Walls, Ceiling'),
(5, '10 Quarry Road', 'Watlington', 4, 3, 4, 3, 580, 2020, 'Cedar', 'New', 'Underfloor, Walls, Ceiling'),
(6, '16 Tyne Street', 'Marchwiel', 2, 1, 1, 2, 300, 2007, 'Brick', 'Excellent', 'Walls, Ceiling'),
(7, '123 Main St', 'Gleniti', 3, 1, 2, 2, 500, 1992, 'Brick', 'Fair', 'Walls, Ceiling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `UID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`UID`, `Username`, `Password`, `IsAdmin`) VALUES
(1, 'Admin', '$2y$10$gfruZ83ECh8OT/52MCr2zexNb.i0EIkSEs4Dviy3qvitbcS0LvDtm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `Contact` (`WorkPh`,`MobilePh`,`Email`);

--
-- Indexes for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  ADD PRIMARY KEY (`LID`) USING BTREE,
  ADD UNIQUE KEY `Listings` (`Property`,`Agent`),
  ADD UNIQUE KEY `Unique Title` (`Title`),
  ADD KEY `Agent` (`Agent`) USING BTREE;

--
-- Indexes for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `Address` (`Address`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agents`
--
ALTER TABLE `tbl_agents`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_listings`
--
ALTER TABLE `tbl_listings`
  ADD CONSTRAINT `tbl_listings_ibfk_1` FOREIGN KEY (`Property`) REFERENCES `tbl_properties` (`PID`),
  ADD CONSTRAINT `tbl_listings_ibfk_2` FOREIGN KEY (`Agent`) REFERENCES `tbl_agents` (`AID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
