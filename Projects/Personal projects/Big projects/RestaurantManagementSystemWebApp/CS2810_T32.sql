-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 12:54 AM
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
-- Database: `cs2810_t32`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `telephone`, `email`, `map`, `description`) VALUES
(1, 'City of Westminster', '020 7946 0816', 'cityofwestminster@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39729.188719625716!2d-0.19861452513978375!3d51.51185295437103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760535987c03c7%3A0x40eae2da2ec67a0!2sCity%20of%20Westminster%2C%20London!5e0!3m2!1sen!2suk!4v1643908993192!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The City of Westminster branch is located in City of Westminster and is very nice.'),
(2, 'Kensington and Chelsea', '020 7946 0784', 'kensingtonandchelsea@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39736.18047174542!2d-0.22430517521793927!3d51.503835363434554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760ff7f26a3943%3A0x40eae2da2ec6730!2sRoyal%20Borough%20of%20Kensington%20and%20Chelsea%2C%20London!5e0!3m2!1sen!2suk!4v1643910724956!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Kensington and Chelsea branch is located in Kensington and Chelsea and is very nice.'),
(3, 'Hammersmith and Fulham', '020 7946 0727', 'hammersmithandfulham@Oxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39740.98984384101!2d-0.2513780977932169!3d51.49831983609261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760fc15cd337c3%3A0x40eae2da2ec6700!2sLondon%20Borough%20of%20Hammersmith%20and%20Fulham%2C%20London!5e0!3m2!1sen!2suk!4v1644533231972!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Hammersmith and Fulham branch is located in Hammersmith and Fulham and is very nice.'),
(4, 'Wandsworth', '020 7946 0775', 'wandsworth@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39781.477574887715!2d-0.22775772572423186!3d51.45187057216311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760589ff8fea83%3A0x37252c9ca56f68d2!2sLondon%20Borough%20of%20Wandsworth%2C%20London!5e0!3m2!1sen!2suk!4v1644533294400!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Wandsworth branch is located in Wandsworth and is very nice.'),
(5, 'Lambeth', '020 7946 0627', 'lambeth@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79547.88545358687!2d-0.18480890353229734!3d51.46051714469207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876046848c95cb7%3A0xa0eae30461e40b0!2sLondon%20Borough%20of%20Lambeth%2C%20London!5e0!3m2!1sen!2suk!4v1644533350203!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Lambeth branch is located in Lambeth and is very nice.'),
(6, 'Southwark', '020 7946 0466', 'southwark@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79539.46993278677!2d-0.14044735334202063!3d51.4653452841836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760398794427df%3A0x41185c626be6770!2sLondon%20Borough%20of%20Southwark!5e0!3m2!1sen!2suk!4v1644533403249!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Southwark branch is located in Southwark and is very nice.'),
(7, 'Tower Hamlets', '020 7946 0105', 'towerhamlets@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39726.75577789331!2d-0.070182425112509!3d51.51464265121721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487602cd55aad2a9%3A0x41185c626be6780!2sLondon%20Borough%20of%20Tower%20Hamlets!5e0!3m2!1sen!2suk!4v1644533455252!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Tower Hamlets branch is located in Tower Hamlets and is very nice.'),
(8, 'Hackney', '020 7946 0102', 'hackney@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9925.75979840565!2d-0.06637646180653164!3d51.541831269749956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761cefef8e8c05%3A0xc5b1fb59d8196f2c!2sLondon%20Borough%20of%20Hackney%2C%20London!5e0!3m2!1sen!2suk!4v1644533515643!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Hackney branch is located in Hackney and is very nice.'),
(9, 'Islington', '020 7946 0628', 'islington@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39698.46606245851!2d-0.14446642479627414!3d51.54707271454898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b5dedeb3be5%3A0x54f085cb18ec65c9!2sLondon%20Borough%20of%20Islington%2C%20London!5e0!3m2!1sen!2suk!4v1644533637506!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Islington branch is located in Islington and is very nice.'),
(10, 'Camden', '020 7946 0768', 'camden@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39702.13854432648!2d-0.19444497483729042!3d51.5428635693088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761aec186b9a3d%3A0x41185c626be66e0!2sLondon%20Borough%20of%20Camden%2C%20London!5e0!3m2!1sen!2suk!4v1644533700731!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Camden branch is located in Camden and is very nice.'),
(11, 'Brent', '020 7946 0797', 'brent@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79367.21857544589!2d-0.3335737994467299!3d51.564098019211436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487611724f04b0ab%3A0xa1185c8d1917fa0!2sLondon%20Borough%20of%20Brent!5e0!3m2!1sen!2suk!4v1644533761932!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Brent branch is located in Brent and is very nice.'),
(12, 'Ealing', '020 7946 0287', 'ealing@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39717.61298118512!2d-0.36737357501036555!3d51.52512513936594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876128873ee670f%3A0x40eae2da2ec6820!2sLondon%20Borough%20of%20Ealing!5e0!3m2!1sen!2suk!4v1644533823051!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Ealing branch is located in Ealing and is very nice.'),
(13, 'Hounslow', '020 7946 0341', 'hounslow@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79545.50839179284!2d-0.4225125034785576!3d51.46188094172375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760ce80031e335%3A0x7404932600e5f458!2sLondon%20Borough%20of%20Hounslow!5e0!3m2!1sen!2suk!4v1644533867736!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Hounslow branch is located in Hounslow and is very nice.'),
(14, 'Richmond upon Thames', '020 7946 0257', 'richmonduponthames@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79582.51079254324!2d-0.3773600043152703!3d51.440648537934365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760c729ad60797%3A0x3a669638aa6727ac!2sLondon%20Borough%20of%20Richmond%20upon%20Thames!5e0!3m2!1sen!2suk!4v1644533966854!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Richmond upon Thames branch is located in Richmond upon Thames and is very nice.'),
(15, 'Kingston upon Thames', '020 7946 0911', 'kingstonuponthames@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79684.85175633541!2d-0.3547945066292861!3d51.38189141579768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760a29121427d3%3A0x494ef555bdebfea!2sRoyal%20Borough%20of%20Kingston%20upon%20Thames!5e0!3m2!1sen!2suk!4v1644534027398!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Kingston upon Thames branch is located in Kingston upon Thames and is very nice.'),
(16, 'Merton', '020 7946 0300', 'merton@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39817.20215530177!2d-0.22421892612352834!3d51.41086086849173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876061dda18176d%3A0x1f17792aabd88942!2sLondon%20Borough%20of%20Merton!5e0!3m2!1sen!2suk!4v1644534079206!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Merton branch is located in Merton and is very nice.'),
(17, 'Sutton', '020 7946 0951', 'sutton@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39863.644352147334!2d-0.21619357664260072!3d51.357512928733776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487607fcacb59e11%3A0x40eae2da2ec68c0!2sLondon%20Borough%20of%20Sutton!5e0!3m2!1sen!2suk!4v1644534143481!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Sutton branch is located in Sutton and is very nice.'),
(18, 'Croydon', '020 7946 0589', 'croydon@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79731.50838133013!2d-0.14935175768409661!3d51.35508842411631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487600a574c2f65b%3A0x40eae2da2ec6810!2sLondon%20Borough%20of%20Croydon!5e0!3m2!1sen!2suk!4v1644534196723!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Croydon branch is located in Croydon and is very nice.'),
(19, 'Bromley', '020 7946 0661', 'bromley@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d159421.65564773133!2d-0.09946068774990917!3d51.366970091505266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8aade0f2c8551%3A0x40eae2da2ec6970!2sLondon%20Borough%20of%20Bromley!5e0!3m2!1sen!2suk!4v1644534253619!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Bromley branch is located in Bromley and is very nice.'),
(20, 'Lewisham', '020 7946 0904', 'lewisham@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79559.86646261199!2d-0.08806390380323133!3d51.453642859653655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876026b7b9c3e99%3A0xa0eae30461e40e0!2sLondon%20Borough%20of%20Lewisham!5e0!3m2!1sen!2suk!4v1644534453140!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Lewisham branch is located in Lewisham and is very nice.'),
(21, 'Greenwich', '020 7946 0516', 'greenwich@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39750.466512052095!2d-0.030474875377591536!3d51.48745048195502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a9cea79975f3%3A0x1470a7a162e4ca6c!2sGreenwich%2C%20London!5e0!3m2!1sen!2suk!4v1644534550519!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Greenwich branch is located in Greenwich and is very nice.'),
(22, 'Bexley', '020 7946 0661', 'bexley@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79545.12850741518!2d0.0791242965300256!3d51.46209889124939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8ae5a7c6ff821%3A0x41185c626be67f0!2sLondon%20Borough%20of%20Bexley!5e0!3m2!1sen!2suk!4v1644534640786!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Bexley branch is located in Bexley and is very nice.'),
(23, 'Havering', '020 7946 0417', 'havering@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158755.4717156478!2d0.09599399306196939!3d51.558072273497174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8bbaa7aebb7d5%3A0x40eae2da2ec6850!2sLondon%20Borough%20of%20Havering!5e0!3m2!1sen!2suk!4v1644534730682!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Havering branch is located in Havering and is very nice.'),
(24, 'Barking and Dagenham', '020 7946 0662', 'barkinganddagenham@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79384.51446099234!2d0.05837950016214548!3d51.55418829078678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a5b25e18c691%3A0x41185c626be67d0!2sLondon%20Borough%20of%20Barking%20and%20Dagenham!5e0!3m2!1sen!2suk!4v1644534821122!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Barking and Dagenham branch is located in Barking and Dagenham and is very nice.'),
(25, 'Redbridge', '020 7946 0570', 'redbridge@oaxaca.co.uk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79328.31778950746!2d0.009041851433087493!3d51.586381370693786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a6ba56ef6a71%3A0x40eae2da2ec68a0!2sLondon%20Borough%20of%20Redbridge!5e0!3m2!1sen!2suk!4v1644534875212!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'The Redbridge branch is located in Redbridge and is very nice.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `Menu_ID` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `section` varchar(255) NOT NULL,
  `availability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menu_ID`, `item_name`, `price`, `section`, `availability`) VALUES
(1, 'Tortilla chips', 5, 'starter', 1),
(2, 'Guacamole with tortilla chips', 6, 'starter', 1),
(3, 'Mexico City nachos', 7, 'starter', 1),
(4, 'Veggie nachos', 7, 'starter', 1),
(5, 'Pork pibil', 10, 'main', 1),
(6, 'Grilled chicken and avocado', 10, 'main', 1),
(7, 'Grilled \"halloumi Al Pastor\"', 12, 'main', 1),
(8, 'Slow-cooked beef brisket', 15, 'main', 1),
(9, 'Grilled chicken club', 10, 'main', 1),
(10, 'Pork pibil', 10, 'main', 0),
(11, 'Black bean & three cheeses', 12, 'main', 1),
(12, 'Trealy Farm chorizo', 14, 'main', 1),
(13, 'Sweet potato', 4, 'side', 1),
(14, 'Lime slaw', 4, 'side', 1),
(15, 'Chargrilled tenderstem broccoli', 4, 'side', 1),
(16, 'Avocado & cos salad', 7, 'side', 1);


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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_ID` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `resolved` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_ID`, `table_number`, `message`, `resolved`, `created_at`) VALUES
(1, 12, 'We need help ordering ', 0, '2022-02-07 21:22:39'),
(2, 43, 'We need help paying!', 0, '2022-02-07 21:22:39'),
(3, 12, 'Need help choosing what to order', 0, '2022-02-07 21:22:39'),
(4, 14, 'help please', 0, '2022-02-07 21:22:39'),
(5, 144, 'cannot decide what to order', 0, '2022-02-07 21:22:39'),
(6, 1, 'not sure what to order', 0, '2022-02-07 21:22:39'),
(7, 12, 'i need help', 0, '2022-02-07 21:22:39'),
(8, 1223, 'I also need help', 0, '2022-02-07 21:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `nutritional_information`
--

CREATE TABLE `nutritional_information` (
  `Nutritional_ID` int(11) NOT NULL,
  `Menu_ID` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `vegetarian` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutritional_information`
--

INSERT INTO `nutritional_information` (`Nutritional_ID`, `Menu_ID`, `calories`, `protein`, `fats`, `carbs`, `sugar`, `vegan`, `vegetarian`) VALUES
(1, 1, 850, 40, 25, 45, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `starter_menu_ids` varchar(254) NOT NULL,
  `main_menu_ids` varchar(254) NOT NULL,
  `side_menu_ids` varchar(254) NOT NULL,
  `dessert_menu_ids` varchar(254) NOT NULL,
  `table_number` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `starters_done` tinyint(1) DEFAULT 0,
  `mains_done` tinyint(1) DEFAULT 0,
  `desserts_done` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`email`, `password`) VALUES
('kitchen.staff@oaxaca.com', 'kitchen123'),
('waiter.staff@oaxaca.com', 'waiter123');

-- --------------------------------------------------------

--
-- Table structure for table `table_assignment`
--

CREATE TABLE `table_assignment` (
  `name` varchar(255) NOT NULL,
  `tables` int(255) NOT NULL,
  `resolved` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_assignment`
--

INSERT INTO `table_assignment` (`name`, `tables`, `resolved`, `created_at`) VALUES
('Anish', 2, 0, '2022-03-07 15:00:25'),
('Majed', 1, 0, '2022-03-07 15:00:25'),
('Majed', 12, 0, '2022-03-07 15:00:25'),
('Majed', 12, 0, '2022-03-07 15:00:25');


--
-- Table structure for table `orders_stack`
--

DROP TABLE IF EXISTS `orders_stack`;
CREATE TABLE `orders_stack` (
  `id` int(11) NOT NULL,
  `last_Change` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

--
-- Indexes for dumped tables
--

-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`menuId`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_ID`);

--
-- Indexes for table `nutritional_information`
--
ALTER TABLE `nutritional_information`
  ADD PRIMARY KEY (`Nutritional_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nutritional_information`
--
ALTER TABLE `nutritional_information`
  MODIFY `Nutritional_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `orders_stack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nutritional_information`
--
ALTER TABLE `nutritional_information`
  ADD CONSTRAINT `Nutritional_Information_ibfk_1` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`Menu_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Indexes for table `orders_stack`
--
ALTER TABLE `orders_stack`
  ADD PRIMARY KEY (`id`);
