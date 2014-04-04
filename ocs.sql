-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2014 at 11:32 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocs`
--
CREATE DATABASE IF NOT EXISTS `ocs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ocs`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(50) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state_country_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id_address`),
  KEY `IDX_state_country_id` (`state_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Address Standard' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `id_vin` varchar(17) NOT NULL,
  `model_make_id` int(11) NOT NULL DEFAULT '0',
  `make_id` int(11) NOT NULL DEFAULT '0',
  `model_id` int(11) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `milage` bigint(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `color_description` varchar(45) DEFAULT NULL,
  `comments` varchar(145) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `picture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`carID`),
  KEY `IDX_model_make_id` (`model_make_id`),
  KEY `IDX_condition_id` (`condition_id`),
  KEY `IDX_status_id` (`status_id`),
  KEY `IDX_picture_id` (`picture_id`),
  KEY `id_vin` (`id_vin`,`model_make_id`,`year`,`condition_id`,`milage`,`color`,`color_description`,`comments`,`price`,`status_id`,`picture_id`),
  KEY `id_vin_2` (`id_vin`,`model_make_id`,`year`,`condition_id`,`milage`,`color`,`color_description`,`comments`,`price`,`status_id`,`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains Car Details' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE IF NOT EXISTS `card_type` (
  `id_card_type` int(11) NOT NULL AUTO_INCREMENT,
  `card_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_card_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Credit /card type. i.e: VISA, DISCOVER, MASTERCARD...' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_condition`
--

CREATE TABLE IF NOT EXISTS `car_condition` (
  `id_car_condition` int(11) NOT NULL AUTO_INCREMENT,
  `car_condition_name` varchar(15) NOT NULL,
  PRIMARY KEY (`id_car_condition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Condition of the cars. i.e: NEW, USED, REFURBISHED, ETC' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_make_model`
--

CREATE TABLE IF NOT EXISTS `car_make_model` (
  `id_car_make_model` int(11) NOT NULL AUTO_INCREMENT,
  `car_make_name` varchar(45) NOT NULL,
  `car_model_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_car_make_model`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will store vehicle make and model' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_pictures`
--

CREATE TABLE IF NOT EXISTS `car_pictures` (
  `id_car_pictures` int(11) NOT NULL AUTO_INCREMENT,
  `picture_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_car_pictures`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contain the Path to the SOlfer Location and Id of Vehicle of the Pictures' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_status`
--

CREATE TABLE IF NOT EXISTS `car_status` (
  `id_car_status` int(11) NOT NULL AUTO_INCREMENT,
  `car_status_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_car_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This will containn different status of vehicles i.e: SOLD, AVAILABLE, ETC' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE IF NOT EXISTS `credit_card` (
  `id_credit_card` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card_type_id` int(11) NOT NULL DEFAULT '0',
  `credit_card_number` int(16) NOT NULL,
  `credit_card_expiration_date` date NOT NULL,
  PRIMARY KEY (`id_credit_card`),
  KEY `IDX_credit_card_id` (`credit_card_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Standard for Credit Card' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make_id`
--

CREATE TABLE IF NOT EXISTS `make_id` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(250) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `model_id`
--

CREATE TABLE IF NOT EXISTS `model_id` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) NOT NULL,
  `model` varchar(250) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state_country`
--

CREATE TABLE IF NOT EXISTS `state_country` (
  `id_state_country` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  PRIMARY KEY (`id_state_country`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contain States and Country' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id_transactions` int(11) NOT NULL AUTO_INCREMENT,
  `user_number_id` int(11) NOT NULL DEFAULT '0',
  `car_vin` varchar(17) NOT NULL,
  `carID` int(11) NOT NULL DEFAULT '0',
  `credit_card_id` int(11) NOT NULL DEFAULT '0',
  `transaction_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transactions`),
  KEY `IDX_user_number_id` (`user_number_id`),
  KEY `IDX_car_vin` (`car_vin`),
  KEY `IDX_credit_card_id` (`credit_card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User purchasing a car' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user_number` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `billing_address_id` int(11) NOT NULL DEFAULT '0',
  `shipping_address_id` int(11) NOT NULL DEFAULT '0',
  `logged_in` bit(1) NOT NULL DEFAULT b'0',
  `credit_card_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user_number`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`phone`),
  KEY `IDX_user_type_id` (`user_type_id`),
  KEY `IDX_billing_address_id` (`billing_address_id`),
  KEY `IDX_shipping_address_id` (`shipping_address_id`),
  KEY `IDX_credit_card_id` (`credit_card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains User info' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id_user_type` int(11) NOT NULL AUTO_INCREMENT,
  `user_name_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains Types of users. i.e: GUEST, USER, ADMIN' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `CON_state_country_id` FOREIGN KEY (`state_country_id`) REFERENCES `state_country` (`id_state_country`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_condition_id` FOREIGN KEY (`condition_id`) REFERENCES `car_condition` (`id_car_condition`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_model_make_id` FOREIGN KEY (`model_make_id`) REFERENCES `car_make_model` (`id_car_make_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `car_pictures` (`id_car_pictures`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status_id` FOREIGN KEY (`status_id`) REFERENCES `car_status` (`id_car_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `CON_credit_card_id` FOREIGN KEY (`credit_card_type_id`) REFERENCES `card_type` (`id_card_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_car_vin` FOREIGN KEY (`car_vin`) REFERENCES `car` (`id_vin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_number_id` FOREIGN KEY (`user_number_id`) REFERENCES `user` (`id_user_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`id_credit_card`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_billing_address_id` FOREIGN KEY (`billing_address_id`) REFERENCES `address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_credit_card_id` FOREIGN KEY (`credit_card_id`) REFERENCES `credit_card` (`id_credit_card`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_shipping_address_id` FOREIGN KEY (`shipping_address_id`) REFERENCES `address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id_user_type`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
