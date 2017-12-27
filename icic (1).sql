-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 01:38 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icic`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(256) NOT NULL,
  `manufacturer` varchar(256) NOT NULL,
  `hostname` varchar(256) NOT NULL,
  `serial_number` varchar(256) NOT NULL,
  `sap_asset_id` varchar(256) NOT NULL,
  `model_number` varchar(256) NOT NULL,
  `asset_type` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `department` varchar(256) NOT NULL,
  `assigned_to` varchar(256) NOT NULL,
  `assigned_date` date NOT NULL,
  `notes` text NOT NULL,
  `ip_address` varchar(256) NOT NULL,
  `mac_address` varchar(56) NOT NULL,
  `supplier` varchar(256) NOT NULL,
  `purchase_date` date NOT NULL,
  `warranty_expiry_date` date NOT NULL,
  `managed_by` varchar(256) NOT NULL,
  `asset_lifetime` varchar(256) NOT NULL,
  `last_modified_date` date NOT NULL,
  `last_modified_user` varchar(256) NOT NULL,
  PRIMARY KEY (`asset_id`),
  UNIQUE KEY `id` (`id`),
  KEY `assets_ibfk_2` (`model_number`),
  KEY `assets_ibfk_3` (`asset_type`),
  KEY `assets_ibfk_4` (`location`),
  KEY `department` (`department`),
  KEY `supplier` (`supplier`),
  KEY `managed_by` (`managed_by`),
  KEY `manufacturer` (`manufacturer`),
  KEY `assigned_to` (`assigned_to`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset_id`, `manufacturer`, `hostname`, `serial_number`, `sap_asset_id`, `model_number`, `asset_type`, `location`, `department`, `assigned_to`, `assigned_date`, `notes`, `ip_address`, `mac_address`, `supplier`, `purchase_date`, `warranty_expiry_date`, `managed_by`, `asset_lifetime`, `last_modified_date`, `last_modified_user`) VALUES
(2, '1', 'Microsoft', 'IBUKD1001', 'D1V2KZ1', '213300000295', 'M001', '001', 'L001', 'D001', 'E001', '2017-12-20', 'This computer was assigned temporarily', '172.24.40.201\r\n\r\n', 'F8-BC-12-95-AE-FC', 'S0001', '2017-12-19', '2017-12-06', 'D001', '5 years', '2017-12-20', '\r\nBAN44170');

-- --------------------------------------------------------

--
-- Table structure for table `asset_type`
--

CREATE TABLE IF NOT EXISTS `asset_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_type_id` varchar(256) NOT NULL,
  `asset_type` varchar(256) NOT NULL,
  `asset_description` varchar(256) NOT NULL,
  PRIMARY KEY (`asset_type_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `asset_type`
--

INSERT INTO `asset_type` (`id`, `asset_type_id`, `asset_type`, `asset_description`) VALUES
(1, '001', 'Desktop', 'Desktop Computer');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  PRIMARY KEY (`country_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_id`, `country`) VALUES
(1, 'C001', 'UK'),
(2, 'C002', 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(256) NOT NULL,
  `dept_name` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_id`, `dept_name`, `location`) VALUES
(1, 'D001', 'IT Helpdesk', 'L001');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `emp_name`) VALUES
(1, 'E001', 'Sam E');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license_id` varchar(256) NOT NULL,
  `license_name` varchar(256) NOT NULL,
  `product_key` varchar(256) NOT NULL,
  `manufacturer` varchar(256) NOT NULL,
  `number_of_licenses` varchar(256) NOT NULL,
  PRIMARY KEY (`license_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `license_id`, `license_name`, `product_key`, `manufacturer`, `number_of_licenses`) VALUES
(1, '001', 'Office 2013 Home and Business', '3HRWWJCNVDTYTKVW22RCRVRP2', 'Microsoft', '1');

-- --------------------------------------------------------

--
-- Table structure for table `license_registry`
--

CREATE TABLE IF NOT EXISTS `license_registry` (
  `registry_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(256) NOT NULL,
  `license_id` varchar(256) NOT NULL,
  PRIMARY KEY (`registry_id`),
  KEY `fk_assets_has_licenses_licenses1_idx` (`license_id`),
  KEY `fk_assets_has_licenses_assets1_idx` (`asset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(256) NOT NULL,
  `branch_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `id` (`id`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `branch_id`, `branch_name`, `address`, `country`) VALUES
(1, 'L001', 'Thomas More Square', '1 Thomas More Square, London, E1W 1YN', 'C001');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_id` varchar(256) NOT NULL,
  `manufacturer` varchar(256) NOT NULL,
  PRIMARY KEY (`manu_id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `manufacturer` (`manufacturer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `manu_id`, `manufacturer`) VALUES
(1, 'M001', 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` varchar(256) NOT NULL,
  `model_name` varchar(256) NOT NULL,
  PRIMARY KEY (`model_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model_id`, `model_name`) VALUES
(1, 'M001', 'OPTIPLEX 3020');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(256) NOT NULL,
  `supplier_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `telephone` varchar(256) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_id`, `supplier_name`, `address`, `telephone`) VALUES
(1, 'S0001', 'Syngco Ltd', '1 London Road, London, UK', '02073755200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `login_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `user_role`, `login_created`) VALUES
(2, 'Jayantha', 'Kumara', 'ssejayantha@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '2017-11-19 17:25:55'),
(3, 'shalika', 'Kumari', 'shalika@yahoo.com', 'user', '202cb962ac59075b964b07152d234b70', 'user', '2017-11-19 22:02:08'),
(82, 'saman', 'Kumara', 'saman@gmail.com', 'ww', '9f6e6800cfae7749eb6c486619254b9c', 'admin', '2017-11-27 08:06:01'),
(85, '1122ee', 'eee', 'ee@gmail.com', 'ee', '08a4415e9d594ff960030b921d42b91e', 'admin', '2017-11-27 10:49:55'),
(91, 'w', 'www', 'ww@gmail.com', 'wwww', 'ad57484016654da87125db86f4227ea3', 'admin', '2017-11-27 10:51:44'),
(92, 'ds', 'dsd', 'sds@gmail.com', 'sds', '4ab47e54c2f73ad4c0eb3974709721cd', 'admin', '2017-11-27 21:26:58');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_10` FOREIGN KEY (`assigned_to`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`model_number`) REFERENCES `model` (`model_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`asset_type`) REFERENCES `asset_type` (`asset_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_4` FOREIGN KEY (`location`) REFERENCES `locations` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_5` FOREIGN KEY (`department`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_7` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_8` FOREIGN KEY (`managed_by`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assets_ibfk_9` FOREIGN KEY (`manufacturer`) REFERENCES `manufacturer` (`manufacturer`);

--
-- Constraints for table `license_registry`
--
ALTER TABLE `license_registry`
  ADD CONSTRAINT `fk_assets_has_licenses_assets1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assets_has_licenses_licenses1` FOREIGN KEY (`license_id`) REFERENCES `licenses` (`license_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`country_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
