-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 12:14 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolioready`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SN` int NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'images/pic-1.jpg',
  `User_Role` varchar(100) DEFAULT 'user',
  `Pass` varchar(255) NOT NULL,
  `Reg_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SN`, `First_Name`, `Last_Name`, `Phone`, `Email`, `Avatar`, `User_Role`, `Pass`, `Reg_Date`) VALUES
(35, 'Bett', 'Kipkoech', NULL, 'bettkipkoech@zetech.ac.ke', 'https://lh3.googleusercontent.com/a/ACg8ocLibiINzhGd0leJZHOj5MvRfwHZWVtCDHIKLdVSpybi7QDTIQ=s96-c', 'user', 'portfolio1234', '2025-01-23 13:14:48'),
(37, 'Ismael bett', 'Kipkoech', NULL, 'kipkoechishmaelbett@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJU6kVCn9cX8Sfq8BBH9QigqoUxfslp74YpZAJaiNaKTwMBF9cB=s96-c', 'user', 'portfolio1234', '2025-01-23 14:28:27'),
(44, 'Kipngetich', 'Festus', NULL, 'infocoder4@gmail.com', 'images/pic-1.jpg', 'user', '$2y$10$hYcaJNCH7qksGw3NEbbpROkYcodZZA2p.xW6JXdqfQmL18YbQ667O', '2025-01-30 16:09:00'),
(47, 'Portfolio', 'Ready', NULL, 'info.portfolioready@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJjSuaKOrqnIXBuksSniV9c5uK0gv4dRdXXPRyUXiU408746Q=s96-c', 'user', 'portfolio1234', '2025-02-02 00:41:25'),
(57, 'Charles', 'Langat', NULL, 'kimutaicharleslangat@gmail.com', 'images/pic-1.jpg', 'user', '$2y$10$iFuMpvJW1babsI77MovFberkb4ns1glVk79nISmnsglK/Eysz3056', '2025-02-04 10:54:57'),
(60, 'Astra', 'Softwares', NULL, 'info.astrasoft@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJyHMTGdFVgRIWgBTIi0BD2ZtowyEKkaGyftmy2E1Z47U-eoFo=s96-c', 'user', 'portfolio1234', '2025-02-11 18:45:39'),
(61, 'Payaster', 'Keiza', NULL, 'payasterkeiza@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIhPwBP8TjiIEuBvUF3vz_KBs3_20feS2M2_j6PPx4HVPKA-Q=s96-c', 'user', 'portfolio1234', '2025-02-12 12:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `SN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
