-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 08:51 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocsv2`
--
CREATE DATABASE IF NOT EXISTS `ocsv2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ocsv2`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state_country_id` int(11) NOT NULL DEFAULT '0',
  `zipcode` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vin` varchar(250) NOT NULL,
  `make_id` int(11) NOT NULL DEFAULT '0',
  `model_id` int(11) NOT NULL DEFAULT '0',
  `year` int(11) DEFAULT NULL,
  `condition_id` int(11) NOT NULL DEFAULT '0',
  `mileage` int(11) NOT NULL DEFAULT '0',
  `color` varchar(250) DEFAULT NULL,
  `color_description` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `picture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (1,'aaaabbbbvin1',1,1,0,1,0,'black','the black','A real beauty!',20050,1,NULL),(2,'aaaabbbbvin2',2,3,2010,2,10250,'red','',NULL,10251,1,NULL),(3,'aaaabbbbvin3',10,19,2014,2,80000,'red','the red car','Wont last!',8500,1,0),(4,'aaaabbbbvin4',7,14,2015,1,0,'blue','','Hot out of the oven...',21250,1,0),(5,'aaaabbbbvin5',5,9,2014,2,43000,'silver','','This is it!!!',50000,1,NULL),(6,'aaaabbbbvin6',7,13,2014,2,23000,'black',NULL,'They call it black beauty...',12300,1,NULL),(7,'aaaabbbbvin7',7,14,2014,1,0,'orange',NULL,'This car is for YOU!',23500,1,NULL),(8,'aaaabbbbvin8',5,10,2015,1,0,'orange',NULL,'Me quemo!!!!',50001,1,NULL);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE IF NOT EXISTS `card_type` (
  `id_card_type` int(11) NOT NULL AUTO_INCREMENT,
  `card_type_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_card_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_condition`
--

CREATE TABLE IF NOT EXISTS `car_condition` (
  `id_car_condition` int(11) NOT NULL AUTO_INCREMENT,
  `car_condition_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_car_condition`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `car_condition`
--

INSERT INTO `car_condition` (`id_car_condition`, `car_condition_name`) VALUES
(1, 'new'),
(2, 'used'),
(3, 'refurbished');

-- --------------------------------------------------------

--
-- Table structure for table `car_pictures`
--

CREATE TABLE IF NOT EXISTS `car_pictures` (
  `id_car_pictures` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL DEFAULT '0',
  `pictures_path` varchar(250) NOT NULL,
  PRIMARY KEY (`id_car_pictures`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_status`
--

CREATE TABLE IF NOT EXISTS `car_status` (
  `id_car_status` int(11) NOT NULL AUTO_INCREMENT,
  `car_status_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id_car_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `car_status`
--

INSERT INTO `car_status` (`id_car_status`, `car_status_desc`) VALUES
(1, 'available'),
(2, 'sold');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE IF NOT EXISTS `credit_card` (
  `id_credit_card` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_type_id` int(11) NOT NULL DEFAULT '0',
  `credit_card_number` int(11) NOT NULL,
  `credit_card_expiration_date` date NOT NULL,
  PRIMARY KEY (`id_credit_card`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make_id`
--

CREATE TABLE IF NOT EXISTS `make_id` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(250) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `make_id`
--

LOCK TABLES `make_id` WRITE;
/*!40000 ALTER TABLE `make_id` DISABLE KEYS */;
INSERT INTO `make_id` VALUES (1,'Acura'),(2,'BMW'),(3,'Cadillac'),(4,'Dodge'),(5,'Ferrari'),(6,'Ford'),(7,'Honda'),(8,'Hunday'),(9,'Jaguar'),(10,'Nissan'),(11,'Toyota');
/*!40000 ALTER TABLE `make_id` ENABLE KEYS */;
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `model_id`
--

CREATE TABLE IF NOT EXISTS `model_id` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) NOT NULL,
  `model` varchar(250) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `model_id`
--

LOCK TABLES `model_id` WRITE;
/*!40000 ALTER TABLE `model_id` DISABLE KEYS */;
INSERT INTO `model_id` VALUES (1,1,'S100'),(2,1,'S150'),(3,2,'Gran Turismo'),(4,2,'M6 Gran Coupe'),(5,3,'Escalade'),(6,3,'Ats'),(7,4,'Taurus'),(8,4,'Durango'),(9,5,'Murcielago'),(10,5,'Diablo'),(11,6,'Taurus'),(12,6,'Explorer'),(13,7,'Civic'),(14,7,'Accord'),(15,8,'S800'),(16,8,'S850'),(17,9,'S900'),(18,9,'S950'),(19,10,'Altima'),(20,10,'Sentra'),(21,11,'Corolla'),(22,11,'Camry');
/*!40000 ALTER TABLE `model_id` ENABLE KEYS */;
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `state_country`
--

CREATE TABLE IF NOT EXISTS `state_country` (
  `id_state_country` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  PRIMARY KEY (`id_state_country`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id_transactions` int(11) NOT NULL AUTO_INCREMENT,
  `user_number_id` int(11) NOT NULL DEFAULT '0',
  `car_vin` varchar(250) NOT NULL,
  `car_id` int(11) NOT NULL DEFAULT '0',
  `credit_card_id` int(11) NOT NULL DEFAULT '0',
  `transaction_date` date DEFAULT NULL,
  PRIMARY KEY (`id_transactions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `userType` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `creditCardId` int(11) NOT NULL DEFAULT '0',
  `billingAddressId` int(11) NOT NULL DEFAULT '0',
  `shippingAddressId` int(11) NOT NULL DEFAULT '0',
  `logged_in` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `userType`, `username`, `password`, `phone`, `email`, `firstName`, `lastName`, `creditCardId`, `billingAddressId`, `shippingAddressId`, `logged_in`) VALUES
(1, 1, 'admin', 'admin1', NULL, NULL, NULL, NULL, 0, 0, 0, b'0'),
(3, 1, 'admin2', 'a', 'e', 'd', 'b', 'c', 0, 0, 0, b'0'),
(4, 2, 'r', '', '', '', '', '', 0, 0, 0, b'0'),
(5, 2, 'user', 'user', '', '', '', '', 0, 0, 0, b'0'),
(7, 2, 'roge', 'roge', NULL, 'roge', 'roge', 'roge', 0, 0, 0, b'0'),
(8, 2, 'e', '', '', '', '', '', 0, 0, 0, b'0'),
(9, 2, 'john', 'smith', '305-230-2524', 'smithJohn@hotmail.com', 'John', 'Smith', 0, 0, 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `user_name_type` varchar(250) NOT NULL,
  PRIMARY KEY (`id_user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `user_name_type`) VALUES
(1, 'ADMIN'),
(2, 'USER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
