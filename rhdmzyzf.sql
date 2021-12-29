-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 04:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `insurance`
--
CREATE DATABASE rhdmzyzf;
USE rhdmzyzf;
CREATE TABLE `insurance` (
  `insuranceId` int(10) NOT NULL,
  `insurance_amount` float NOT NULL,
  `insurance_type` varchar(50) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insuranceId`, `insurance_amount`, `insurance_type`, `agent_name`, `duration`) VALUES
(1, 300000, 'Personal Loan', 'Ram', '80 month'),
(2, 300000, 'Bussiness Loan', 'krishan', '90 month');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanId` int(10) NOT NULL,
  `loan_amount` float NOT NULL,
  `loan_type` varchar(50) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `rate_of_Interest` float NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanId`, `loan_amount`, `loan_type`, `agent_name`, `rate_of_Interest`, `duration`) VALUES
(1, 400000, 'Personal Loan', 'Ram Singh', 3, '40 month'),
(16, 900000, 'Bussiness Loan', 'abc', 3, '90 month'),
(17, 300000, 'Bussiness Loan', 'krishan', 4, '90 month');

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
(2, 300000, '2021-12-20 14:58:21', 987987908709, 987987098709);

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
  `agent` tinyint(1) NOT NULL DEFAULT 0,
  `dob` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `name`, `phone_num`, `password`, `occupation`, `adhar_number`, `annual_Income`, `agent`, `dob`, `address`) VALUES
(1, 'abc@gmail.com', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 0, '1982-05-07', 'samastipur'),
(3, 'xyz@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 0, '1982-05-07', 'samastipur'),
(4, 'def@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 1, '1982-05-07', 'samastipur'),
(5, 'abc@nn.vv', 'raj singh', '9089098909', '81dc9bdb52d04dc20036dbd8313ed055', 'doctor', '987098709879', '9888888', 1, '1982-05-07', 'samastipur');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuranceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
