-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 04:39 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childeducationsupport`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `height` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `full_name`, `dob`, `age`, `religion`, `language`, `contact`, `address`, `height`, `image`, `message`, `date`) VALUES
(7, 'Rubina Sharma', '2013-01-16', 9, 'Hindu', 'nepali', '9841234561', 'Nepaltar', 3, '1630620210-jonathan-borba-Z1Oyw2snqn8-unsplash.jpg', '                          she is rubina and she is 9 years old\r\n        \r\n                                    ', '2021-09-03'),
(8, 'bindu kandel', '2017-01-10', 5, 'Hindu', 'Nepali', '1234567890', 'manamaiju ', 2, '1630622525-senjuti-kundu-JfolIjRnveY-unsplash.jpg', '                  Her name is bindu and she is 5 years old\r\n                \r\n                                    ', '2021-09-03'),
(9, 'Rabin Magar', '2015-11-23', 7, 'Buddist', 'Magar', '9876543210', 'Manamaiju', 2, '1630622689-stephanie-nakagawa-ADSKIn0ScDg-unsplash.jpg', 'His name is rabin and he is 5 years old                                  \r\n                                    ', '2021-09-03'),
(10, 'Bishal thapa ', '2015-02-12', 6, 'Hindu', 'Nepali', '9860455432', 'Manamaiju', 2, '1630890162-jonathan-borba-Z1Oyw2snqn8-unsplash.jpg', '\r\n                 he is bishal                   ', '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `role_id`
--

CREATE TABLE `role_id` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `decription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_id`
--

INSERT INTO `role_id` (`id`, `name`, `decription`) VALUES
(1, 'super_admin', 'can access all information'),
(2, 'Sponsor', 'sponsor information can be manage here');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `full_name`, `username`, `password`, `address`, `contact`, `email`, `message`, `image`) VALUES
(15, 'Vun0iWPjwW', 'pl0afW27F5', '827ccb0eea8a706c4c34a16891f84e7b', 'lO60Sqw43h', '0154165156', 'R8Oh69Gcgi', '6t9QJSxzgZ', '1630730071-roland-samuel-MZ5A24H1JqU-unsplash.jpg'),
(17, 'Manish Pathak', 'maanish123', '827ccb0eea8a706c4c34a16891f84e7b', 'Manamaiju', '9860485445', 'manish@gmail.com', 'hey i am a sponsor', '1630817433-stephanie-nakagawa-ADSKIn0ScDg-unsplash.jpg'),
(18, 'raj kumar koirala', 'raj123', '827ccb0eea8a706c4c34a16891f84e7b', 'gongabu', '9867543212', 'raj@gmail.com', 'hi i am raj', '1630890337-ali-morshedlou-WMD64tMfc4k-unsplash.jpg'),
(19, 'sita thapa ', 'sita123', '827ccb0eea8a706c4c34a16891f84e7b', 'gonganbu', '123456789521423423523315235', 'sita@gamil.com', 'safadsfsrfg', '1630890564-sharon-mccutcheon-RDQl9ZX5Yq8-unsplash.jpg'),
(20, 'sonam shah', 'sonam123', '827ccb0eea8a706c4c34a16891f84e7b', 'samakhusi', '9860576543', 'sonam@gmail.com', 'hi i am sonam and i am from nepal', '1631453692-levi-meir-clancy-g5_XkcUrlyg-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sponsoredchild`
--

CREATE TABLE `sponsoredchild` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `childId` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsoredchild`
--

INSERT INTO `sponsoredchild` (`id`, `full_name`, `childId`, `Amount`, `Date`) VALUES
(1, 'manish pathak', '7', '23456', '2021-09-12'),
(2, 'sonam shah', '8', '12345', '2021-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `mobile`, `image`, `role_id`, `description`, `date`) VALUES
(11, 'pranish', '', 'shrestha', 'pranish@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567654', '1630814432-linkedin-sales-solutions-pAtA8xe_iVM-unsplash.jpg', NULL, NULL, '2021-09-05'),
(12, 'Manish', '', 'Pathak', 'Manish@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9860485445', '1630884499-2.jpg.jpg', NULL, NULL, '2021-09-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsoredchild`
--
ALTER TABLE `sponsoredchild`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sponsoredchild`
--
ALTER TABLE `sponsoredchild`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
