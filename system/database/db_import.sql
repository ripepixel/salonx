-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2014 at 04:43 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `salonx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_superadmin` int(1) NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `password`, `is_superadmin`, `is_active`) VALUES
(1, 'nhowarth', 'contact@how-media.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `plan_id` int(6) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `street` varchar(150) DEFAULT NULL,
  `town` varchar(150) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_at` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `plan_id`, `business_name`, `street`, `town`, `county`, `postcode`, `telephone`, `mobile`, `fax`, `website`, `image`, `is_active`, `is_deleted`, `created_at`) VALUES
(6, 6, 3, 'How Media', '142 Market Street', 'Bury', 'Lancashire', 'BL8 3LS', '01204 123456', '', '', '', NULL, 1, 0, 1393000939);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `outlet_id` int(10) NOT NULL,
  `is_manager` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE IF NOT EXISTS `outlets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(6) NOT NULL,
  `reference` varchar(255) DEFAULT NULL COMMENT 'a reference name for the outlet',
  `business_name` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `town` varchar(150) DEFAULT NULL,
  `county` varchar(150) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter` varchar(40) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `outlets`
--


-- --------------------------------------------------------

--
-- Table structure for table `outlet_access`
--

CREATE TABLE IF NOT EXISTS `outlet_access` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outlet_access`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payment_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `months` int(2) NOT NULL,
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `outlets` int(6) NOT NULL,
  `employees` int(6) NOT NULL,
  `clients` int(6) NOT NULL,
  `treatments` int(6) NOT NULL,
  `products` int(6) NOT NULL,
  `stations` int(6) NOT NULL,
  `suppliers` int(6) NOT NULL,
  `emails_per_month` int(6) NOT NULL,
  `texts_per_month` int(6) NOT NULL,
  `texts_cost_each` decimal(8,2) NOT NULL,
  `has_stock_control` int(1) NOT NULL DEFAULT '0',
  `has_reports` int(1) NOT NULL DEFAULT '0',
  `has_pos` int(1) NOT NULL DEFAULT '0',
  `has_online_booking` int(1) NOT NULL DEFAULT '0',
  `has_rewards` int(1) NOT NULL DEFAULT '0',
  `has_gift_cards` int(1) NOT NULL DEFAULT '0',
  `has_trial` int(1) NOT NULL DEFAULT '0',
  `trial_duration` int(3) DEFAULT NULL COMMENT 'Trial duration in days',
  `is_active` int(1) NOT NULL DEFAULT '0',
  `is_visible` int(1) NOT NULL DEFAULT '1',
  `admin_user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `tagline`, `price`, `months`, `is_featured`, `outlets`, `employees`, `clients`, `treatments`, `products`, `stations`, `suppliers`, `emails_per_month`, `texts_per_month`, `texts_cost_each`, `has_stock_control`, `has_reports`, `has_pos`, `has_online_booking`, `has_rewards`, `has_gift_cards`, `has_trial`, `trial_duration`, `is_active`, `is_visible`, `admin_user_id`, `created_at`) VALUES
(3, 'Salon', 'Complete solution for your salon', '24.99', 1, 1, 1, 5, 1000, 100, 100, 3, 10, 5, 100, '0.10', 1, 1, 1, 1, 1, 1, 1, 30, 1, 1, 1, '2014-02-19 10:00:24'),
(2, 'Solo', 'Ideal for mobile technicians', '12.99', 1, 0, 1, 1, 100, 20, 0, 0, 0, 0, 0, '0.10', 0, 0, 0, 0, 1, 0, 0, NULL, 1, 1, 1, '2014-02-19 10:00:32'),
(4, 'Chain', 'Great if you have more than 1 salon', '39.99', 1, 0, 5, 50, 10000, 500, 250, 25, 25, 30, 200, '0.08', 1, 1, 1, 1, 1, 1, 1, 30, 1, 1, 1, '2014-02-19 10:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `plan_orders`
--

CREATE TABLE IF NOT EXISTS `plan_orders` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `business_id` int(6) NOT NULL,
  `plan_id` int(6) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `months` int(2) NOT NULL,
  `start_date` int(30) NOT NULL,
  `end_date` int(30) DEFAULT NULL,
  `payment_type_id` int(3) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `admin_user_id` int(3) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `plan_orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  `is_employee` tinyint(1) NOT NULL DEFAULT '0',
  `is_client` tinyint(1) NOT NULL DEFAULT '0',
  `plan_id` int(6) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(30) NOT NULL,
  `last_login` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_manager`, `is_employee`, `is_client`, `plan_id`, `is_active`, `created_at`, `last_login`) VALUES
(6, NULL, 'contact@how-media.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, 0, 3, 1, 1393000906, 1393000906);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `create_outlet` int(1) NOT NULL DEFAULT '0',
  `edit_outlet` int(1) NOT NULL DEFAULT '0',
  `delete_outlet` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `create_outlet`, `edit_outlet`, `delete_outlet`) VALUES
(2, 5, 1, 1, 1),
(3, 6, 1, 1, 1);
