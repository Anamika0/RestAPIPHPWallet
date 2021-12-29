-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2021 at 07:00 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `rhdmzyzf`
--

-- --------------------------------------------------------

--
-- Table structure for table `bond`
--
USE rhdmzyzf;

DROP TABLE IF EXISTS `bond`;
CREATE TABLE IF NOT EXISTS `bond` (
  `bondId` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `bond_name` varchar(50) NOT NULL,
  `bond_amount` float NOT NULL,
  `bond_type` varchar(50) NOT NULL,
  PRIMARY KEY (`bondId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bond`
--

INSERT INTO `bond` (`bondId`, `userId`, `bond_name`, `bond_amount`, `bond_type`) VALUES
(1, 6, 'DBI', 9000, 'G3'),
(2, 6, 'HSBIU', 35000, 'L6');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE IF NOT EXISTS `deposit` (
  `depositId` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `deposit_amount` float NOT NULL,
  `deposit_type` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`depositId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `insurance`;
CREATE TABLE IF NOT EXISTS `insurance` (
  `insuranceId` int(10) NOT NULL AUTO_INCREMENT,
  `insurance_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for pending, 1 for accept, 2 for reject	',
  `insurance_amount` float NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`insuranceId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `loanId` int(10) NOT NULL AUTO_INCREMENT,
  `loan_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for pending, 1 for accept, 2 for reject',
  `loan_amount` float NOT NULL,
  `loan_type` varchar(50) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`loanId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `rd`;
CREATE TABLE IF NOT EXISTS `rd` (
  `rdId` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `rd_amount` float NOT NULL,
  `rd_type` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`rdId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `share`;
CREATE TABLE IF NOT EXISTS `share` (
  `shareId` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `share_name` varchar(50) NOT NULL,
  `share_amount` float NOT NULL,
  `share_type` varchar(50) NOT NULL,
  PRIMARY KEY (`shareId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionId` int(10) NOT NULL AUTO_INCREMENT,
  `transaction_amount` double NOT NULL,
  `transaction_time` varchar(50) NOT NULL,
  `from_account` double NOT NULL,
  `to_account` double NOT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `transaction_amount`, `transaction_time`, `from_account`, `to_account`) VALUES
(1, 300000, '2021-12-20 14:58:21', 987987908709, 987987098709),
(2, 300000, '2021-12-20 14:58:21', 987987908709, 987987098709);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `name`, `phone_num`, `password`, `occupation`, `adhar_number`, `annual_Income`, `agent`, `dob`, `address`) VALUES
(1, 'abc@gmail.com', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'no', '1982-05-07', 'samastipur'),
(3, 'xyz@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'no', '1982-05-07', 'samastipur'),
(4, 'def@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'yes', '1982-05-07', 'samastipur'),
(5, 'abc@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 'yes', '1982-05-07', 'samastipur'),
(6, 'abc_test@nn.vv', 'ram nath', '9890898776', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '988888', 'yes', '1984-05-07', 'samastipur');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `walletId` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `coin` float NOT NULL,
  PRIMARY KEY (`walletId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`walletId`, `userId`, `coin`) VALUES
(1, 3, 5000),
(3, 4, 500);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bond`
--
ALTER TABLE `bond`
  ADD CONSTRAINT `bond_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rd`
--
ALTER TABLE `rd`
  ADD CONSTRAINT `rd_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
