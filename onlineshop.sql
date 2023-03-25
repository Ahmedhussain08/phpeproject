-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 05:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(5, 'Rings'),
(6, 'Perfumes'),
(7, 'Makeup'),
(8, 'Necklace'),
(9, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cID` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `ccontact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cID`, `cname`, `cemail`, `cpassword`, `ccontact`) VALUES
(1, 'lala', '10@gmail.com', '1', '1'),
(3, 'babar', '123@gmail.com', '2', '02222'),
(4, 'jabbar', '0@gmail.com', '1', '32323'),
(5, 'faizan', 'q@gmail.com', '1', '1234'),
(6, 'Ahmed', '1@gmail.com', '1', '123456'),
(7, 'rohit', 'rohit@GMAIL.com', '1', '111');

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `oid` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `netamount` int(11) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`oid`, `Pid`, `pname`, `CustomerID`, `price`, `qty`, `netamount`, `customername`, `email`, `contact`, `addres`, `DOB`, `remarks`) VALUES
(32, 9, 'Womens Diamond Ring', 1, 2800, 1, 2800, 'lala', '10@gmail.com', 1, 'awami colony karachi', '2011-02-16', 'yhjghfg'),
(33, 11, 'Necklace Gold women', 3, 50000, 1, 50000, 'babar', '123@gmail.com', 2222, 'malir karachi', '2023-03-02', '        we3e'),
(36, 12, 'Foundation Forever Makeup', 4, 4000, 3, 12000, 'jabbar', '0@gmail.com', 32323, 'steel town', '2022-10-05', '        vb vgcb '),
(37, 10, 'AXE mens Perfume', 5, 950, 6, 5700, 'faizan', 'q@gmail.com', 1234, 'mehmoodabad', '2022-04-05', '        gf'),
(38, 13, 'MEns Rolex watch', 6, 2500, 1, 2500, 'Ahmed', '1@gmail.com', 123456, 'korangi', '2023-03-01', '        fgr'),
(39, 13, 'MEns Rolex watch', 6, 2500, 1, 2500, 'Ahmed', '1@gmail.com', 123456, 'korangi', '2023-03-04', '        hfg'),
(40, 14, 'Hugo Boss Perfume', 6, 2500, 3, 7500, 'Ahmed', '1@gmail.com', 123456, 'awami colony karachi', '2023-03-04', '        wew'),
(41, 11, 'Necklace Gold women', 7, 50000, 3, 150000, 'rohit', 'rohit@GMAIL.com', 111, 'saddar', '2023-03-04', '        eeweew');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` int(11) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `pimage` varchar(250) NOT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pprice`, `pdesc`, `pimage`, `catID`) VALUES
(9, 'Womens Diamond Ring', 2800, 'Rings new collection', 'ring.jpg', 5),
(10, 'AXE mens Perfume', 950, 'Black coloured AXE', 'i.webp', 6),
(11, 'Necklace Gold women', 50000, 'necklace for women', 'screen-1.jpg', 8),
(12, 'Foundation Forever Makeup', 4000, 'Makeup forever  womens foundation', '4253cdd621f540cef2c0a59adfeec157.jpg', 7),
(13, 'MEns Rolex watch', 2500, 'rolex blue wtch', 'i (1).webp', 9),
(14, 'Hugo Boss Perfume', 2500, 'Hugo Boss Perfume', 'i (2).webp', 6);

-- --------------------------------------------------------

--
-- Table structure for table `shippment`
--

CREATE TABLE `shippment` (
  `shipID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `ORderID` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `cardNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `Pid` (`Pid`,`CustomerID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `catID` (`catID`);

--
-- Indexes for table `shippment`
--
ALTER TABLE `shippment`
  ADD PRIMARY KEY (`shipID`),
  ADD KEY `ProID` (`ProID`,`CustID`,`ORderID`),
  ADD KEY `CustID` (`CustID`),
  ADD KEY `ORderID` (`ORderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shippment`
--
ALTER TABLE `shippment`
  MODIFY `shipID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD CONSTRAINT `ordertb_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`cID`),
  ADD CONSTRAINT `ordertb_ibfk_2` FOREIGN KEY (`Pid`) REFERENCES `product` (`pid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`cid`);

--
-- Constraints for table `shippment`
--
ALTER TABLE `shippment`
  ADD CONSTRAINT `shippment_ibfk_1` FOREIGN KEY (`ProID`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `shippment_ibfk_2` FOREIGN KEY (`CustID`) REFERENCES `customer` (`cID`),
  ADD CONSTRAINT `shippment_ibfk_3` FOREIGN KEY (`ORderID`) REFERENCES `ordertb` (`oid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
