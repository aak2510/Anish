-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 10:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `menuId` int(11) NOT NULL,
  `ingredients` mediumtext NOT NULL,
  `calories` smallint(6) NOT NULL,
  `image` text NOT NULL,
  `vegan` tinyint(1) DEFAULT NULL,
  `vegetarian` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`menuId`, `ingredients`, `calories`, `image`, `vegan`, `vegetarian`) VALUES
(1, 'flour, vagitable oil, peanut oil, salt', 450, '', 1, 1),
(2, 'flour, vagitable oil, peanut oil, salt, avacado, tomato, chilli, red onion, herbs', 500, '', 1, 1),
(3, 'flour, vagitable oil, peanut oil, salt, tomato, chilli, olives, herbs, cheese', 550, '', 0, 1),
(4, 'flour, vagitable oil, peanut oil, salt, tomato, chilli, red onion, herbs, olives, beans', 500, '', 1, 1),
(5, 'pork shoulder, flour, vagitable oil, peanut oil, salt, tomato, chilli, red onion, herbs, olives, beans, white wine vinegar, apple cider vinegar, soy sauce, seasoning, orange, halloumi', 660, '', 0, 0),
(6, 'chicken, avacado, jalapeno, red onion, lime, garlic, seasoning', 470, '', 0, 0),
(7, 'halloumi, flour, vagitable oil, tomato, pineapple, red onion, chilli, carrot, cabbage', 600, '', 0, 1),
(8, 'beef brisket, onion, celery, carrots, parsnips, stout, butter, Dijon mustard, herbs', 570, '', 0, 0),
(9, 'white bread, chicken, bacon, tomato, emmental, lettuce, mayonase', 550, '', 0, 0),
(10, 'pork shoulder, flour, vagitable oil, peanut oil, salt, tomato, chilli, red onion, herbs, olives, beans, white wine vinegar, apple cider vinegar, soy sauce, seasoning, orange, halloumi', 660, '', 0, 0),
(11, 'flour, vagitable oil, peanut oil, salt, black beans, chedder, emmental, manchego, garlic, cilantro', 560, '', 0, 1),
(12, 'flour, vagitable oil, peanut oil, salt, chorizo, chedder, onion, black olives', 660, '', 0, 0),
(13, 'sweet potato, cream, butter, salt, pepper', 400, '', 0, 1),
(14, 'cabage, carrot, greek yogurt, cilantro, onion, lime, seasoning', 300, '', 0, 1),
(15, 'broccoli, soy sauce, sesame oil, greek yogurt, ginger, garlic', 350, '', 0, 1),
(16, 'avacado, cos lettuce, spring onion, sunflower seeds, apple cider vinegar, mint, lemon juice, salt', 450, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `section` varchar(255) NOT NULL,
  `availability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `section`, `availability`) VALUES
(1, 'Tortilla chips', 0, 'starter', 1),
(2, 'Guacamole with tortilla chips', 0, 'starter', 1),
(3, 'Mexico City nachos', 0, 'starter', 1),
(4, 'Veggie nachos', 0, 'starter', 1),
(5, 'Pork pibil', 0, 'main', 1),
(6, 'Grilled chicken and avocado', 0, 'main', 1),
(7, 'Grilled \"halloumi Al Pastor\"', 0, 'main', 1),
(8, 'Slow-cooked beef brisket', 0, 'main', 1),
(9, 'Grilled chicken club', 0, 'main', 1),
(10, 'Pork pibil', 0, 'main', 0),
(11, 'Black bean & three cheeses', 0, 'main', 1),
(12, 'Trealy Farm chorizo', 0, 'main', 1),
(13, 'Sweet potato', 0, 'side', 1),
(14, 'Lime slaw', 0, 'side', 1),
(15, 'Chargrilled tenderstem broccoli', 0, 'side', 1),
(16, 'Avocado & cos salad', 0, 'side', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`menuId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
