-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 02:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpiteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `user` int(7) NOT NULL,
  `id` int(7) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `year` varchar(4) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`user`, `id`, `title`, `author`, `year`, `description`, `created_at`, `category`) VALUES
(1, 18, 'Pride and Prejudice', 'Jane Austen', '1990', 'It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife. ', '2022-05-21 00:10:22', 'Classic'),
(1, 19, 'The Art of War', 'Sun Tzu', '2012', 'The Art of War by the Chinese general Sun Tzu is one of the most influential books of military strategy ever written. For more than 2,000 years, its aphoristic insights and wisdom have been applied in a wide variety of disciplines, ranging from the business and legal professions to the martial arts and sports.', '2022-05-21 00:11:14', 'Classic'),
(1, 20, 'Today Tonight Tomorrow', 'Rachel Lynn Solomon', '2017', '“Brilliant, hilarious, and oh-so-romantic.” —BuzzFeed “Swoony, steamy.” —Entertainment Weekly', '2022-05-21 00:12:01', 'Romance'),
(2, 21, 'Time Is a Mother', 'Ocean Vuong', '2020', 'An instant New York Times bestseller!  The highly anticipated collection of poems from the award-winning writer Ocean Vuong  How else do we return to ourselves but to fold The page so it points to the good part', '2022-05-21 00:13:42', 'Poetry'),
(2, 22, 'Winter Recipes from the Collective: Poems', 'Louise Gluck', '2009', 'There is truly nothing like the words of a poet to help us reflect. What better poet than Noble Prize winner Louise Gluck to set us in a moment of introspection. These poems will do your soul good.', '2022-05-21 00:14:20', 'Poetry'),
(2, 23, 'Sleepless', 'Romy Hausmann', '2021', 'Dark secrets past and present collide in Sleepless, a haunting novel of guilt and retribution from Romy Hausmann, the international bestselling author of Dear Child.', '2022-05-21 00:14:54', 'Thriller'),
(3, 24, 'The Tattooist of Auschwitz', 'Heather Morris', '2018', 'This beautiful, illuminating tale of hope and courage is based on interviews that were conducted with Holocaust survivor and Auschwitz-Birkenau tattooist Ludwig (Lale) Sokolov—an unforgettable love story in the midst of atrocity.', '2022-05-21 00:15:48', 'Historical Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `email`, `contact`, `username`, `password`) VALUES
(1, 'Andjela', 'Jovanovic', 'aj@gmail.com', '0601234567', 'andjela', 'andjela123'),
(2, 'Petar', 'Petrovic', 'pp@gmail.com', '0657894322', 'petar', 'petar123'),
(3, 'Marko', 'Markovic', 'marko@gmail.com', '0601234567', 'marko123', 'marko123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
