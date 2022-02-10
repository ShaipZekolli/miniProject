-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 02:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

CREATE TABLE `roli` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`id`, `pershkrimi`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `Fjalekalimi` varchar(32) DEFAULT NULL,
  `roli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Fjalekalimi`, `roli`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 1),
('user', '6ad14ba9986e3615423dfca256d04e3f', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `Username`, `emri`, `mbiemri`, `phone`, `address`, `image`) VALUES
(7, 'user1', 'User1Emri', 'User1Mbiemri', 49111111, 'Rr. 12 Shembull', 'sample (1).png'),
(8, 'user2', 'User2Emri', 'User2Mbiemri', 49222222, 'Rr. 421 Shembull', 'die.png'),
(10, 'user', 'TestUser', 'UserMbiemri', 49400400, 'Rr. 421 Shembull', 'random.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roli`
--
ALTER TABLE `roli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `roli` (`roli`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roli`) REFERENCES `roli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
