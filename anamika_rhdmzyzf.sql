-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 01:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhdmzyzf`
--

-- --------------------------------------------------------

--
-- Table structure for table `bond`
--

CREATE TABLE `bond` (
  `bondId` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `bond_name` varchar(50) NOT NULL,
  `bond_amount` float NOT NULL,
  `bond_type` varchar(50) NOT NULL,
  `duration` double DEFAULT NULL,
  `rate_percent` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bond`
--

INSERT INTO `bond` (`bondId`, `userId`, `bond_name`, `bond_amount`, `bond_type`, `duration`, `rate_percent`) VALUES
(1, 6, 'DBI', 9000, 'G3', NULL, NULL),
(2, 6, 'HSBIU', 35000, 'L6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `walletId` int(10) NOT NULL,
  `coin_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`walletId`, `coin_value`) VALUES
(1, 100),
(2, 50),
(3, 1000),
(4, 500),
(5, 300);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `depositId` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `deposit_amount` float NOT NULL,
  `deposit_type` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`depositId`, `userId`, `deposit_amount`, `deposit_type`, `rate_of_Interest`, `duration`) VALUES
(1, 6, 6500, 'Fixed', 4, '90 months'),
(2, 6, 4400, 'Fixed', 4, '60 months');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuranceId` int(10) NOT NULL,
  `insurance_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for pending, 1 for accept, 2 for reject	',
  `insurance_amount` float NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insuranceId`, `insurance_status`, `insurance_amount`, `insurance_type`, `agent_name`, `duration`) VALUES
(1, '2', 3, 'Personal Loan', 'Ram', '80 month'),
(2, '0', 300000, 'Bussiness Loan', 'krishan', '90 month'),
(4, '2', 600000, 'Bussiness', 'Ronak', '10 month');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanId` int(10) NOT NULL,
  `loan_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for pending, 1 for accept, 2 for reject',
  `loan_amount` float NOT NULL,
  `loan_type` varchar(50) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanId`, `loan_status`, `loan_amount`, `loan_type`, `agent_name`, `rate_of_Interest`, `duration`) VALUES
(1, '0', 400000, 'Personal Loan', 'Ram Singh', 3, '40 month'),
(16, '2', 900000, 'Bussiness Loan', 'abc', 3, '90 month'),
(17, '0', 300000, 'Bussiness Loan', 'krishan', 4, '90 month');

-- --------------------------------------------------------

--
-- Table structure for table `rd`
--

CREATE TABLE `rd` (
  `rdId` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `rd_amount` float NOT NULL,
  `rd_type` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd`
--

INSERT INTO `rd` (`rdId`, `userId`, `rd_amount`, `rd_type`, `rate_of_Interest`, `duration`) VALUES
(1, 6, 2200, 'Yearly', 3, '5 Year'),
(3, 6, 2300, 'Yearly', 3, '5 Year');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `shareId` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `share_name` varchar(50) NOT NULL,
  `share_amount` float NOT NULL,
  `share_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`shareId`, `userId`, `share_name`, `share_amount`, `share_type`) VALUES
(1, 6, 'CBI', 2700, 'md'),
(2, 6, 'SBI', 2800, 'cd');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(10) NOT NULL,
  `transaction_amount` double NOT NULL,
  `transaction_time` varchar(50) NOT NULL,
  `from_account` double NOT NULL,
  `to_account` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `transaction_amount`, `transaction_time`, `from_account`, `to_account`) VALUES
(1, 300000, '2021-12-20 14:58:21', 987987908709, 987987098709),
(2, 300000, '2021-12-20 14:58:21', 987987908709, 987987098709),
(5, 30, '2021-12-29 12:18:43', 1, 2),
(6, 30, '2021-12-29 12:56:54', 1, 2),
(7, 30, '2021-12-29 13:05:17', 1, 2),
(8, 30, '2021-12-29 13:06:25', 1, 2),
(9, 30, '2021-12-29 13:10:11', 1, 2),
(10, 30, '2021-12-29 13:10:58', 1, 2),
(11, 30, '2021-12-29 13:12:23', 1, 2),
(12, 30, '2021-12-29 13:14:00', 1, 2),
(13, 30, '2021-12-29 13:15:04', 1, 2),
(14, 30, '2021-12-29 13:16:50', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `adhar_number` varchar(20) NOT NULL,
  `annual_Income` varchar(12) NOT NULL,
  `agent` enum('yes','no') NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `duration` double DEFAULT NULL,
  `Wallet_balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `name`, `phone_num`, `password`, `occupation`, `adhar_number`, `annual_Income`, `agent`, `dob`, `address`, `duration`, `Wallet_balance`) VALUES
(1, 'abc@gmail.com', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'no', '1982-05-07', 'samastipur', NULL, 870),
(3, 'xyz@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'no', '1982-05-07', 'samastipur', NULL, 4730),
(4, 'def@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'yes', '1982-05-07', 'samastipur', NULL, 500),
(5, 'abc@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'yes', '1982-05-07', 'samastipur', NULL, 0),
(6, 'abc_test@nn.vv', 'ram nath', '9890898776', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '988888', 'yes', '1984-05-07', 'samastipur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `walletId` int(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `coin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`walletId`, `userId`, `coin`) VALUES
(1, 3, 4730),
(2, 1, 870),
(3, 4, 500),
(4, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bond`
--
ALTER TABLE `bond`
  ADD PRIMARY KEY (`bondId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`walletId`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`depositId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceId`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanId`);

--
-- Indexes for table `rd`
--
ALTER TABLE `rd`
  ADD PRIMARY KEY (`rdId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`shareId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`walletId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bond`
--
ALTER TABLE `bond`
  MODIFY `bondId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `depositId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuranceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rd`
--
ALTER TABLE `rd`
  MODIFY `rdId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `shareId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `walletId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
