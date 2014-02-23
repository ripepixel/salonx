-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 08:25 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `salonx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
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
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text,
  `post` text NOT NULL,
  `is_published` int(1) NOT NULL DEFAULT '0',
  `date_published` int(30) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `plan_id`, `business_name`, `street`, `town`, `county`, `postcode`, `telephone`, `mobile`, `fax`, `website`, `image`, `is_active`, `is_deleted`, `created_at`) VALUES
(7, 7, 3, 'How Media', '142 Market Street', 'Bury', 'Lancashire', 'BL8 3LS', '01204 123456', '', '', 'http://www.how-media.co.uk', NULL, 1, 0, 1393019991);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `business_id` int(10) NOT NULL,
  `is_manager` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `business_id`, `is_manager`) VALUES
(3, 13, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text,
  `dob` date DEFAULT NULL,
  `national_insurance` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_id`, `title`, `first_name`, `surname`, `gender`, `address`, `dob`, `national_insurance`, `telephone`, `mobile`, `start_date`, `end_date`) VALUES
(2, 3, 'Miss', 'Emma', 'Howker', 'Female', '142 Market Street\nBury\nBL8 3LS', '1970-01-01', '', '01204 782715', '', '1970-01-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_hours`
--

CREATE TABLE `employee_hours` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `monday_start` time DEFAULT NULL,
  `monday_finish` time DEFAULT NULL,
  `tuesday_start` time DEFAULT NULL,
  `tuesday_finish` time DEFAULT NULL,
  `wednesday_start` time DEFAULT NULL,
  `wednesday_finish` time DEFAULT NULL,
  `thursday_start` time DEFAULT NULL,
  `thursday_finish` time DEFAULT NULL,
  `friday_start` time DEFAULT NULL,
  `friday_finish` time DEFAULT NULL,
  `saturday_start` time DEFAULT NULL,
  `saturday_finish` time DEFAULT NULL,
  `sunday_start` time DEFAULT NULL,
  `sunday_finish` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_hours`
--

INSERT INTO `employee_hours` (`id`, `employee_id`, `monday_start`, `monday_finish`, `tuesday_start`, `tuesday_finish`, `wednesday_start`, `wednesday_finish`, `thursday_start`, `thursday_finish`, `friday_start`, `friday_finish`, `saturday_start`, `saturday_finish`, `sunday_start`, `sunday_finish`) VALUES
(1, 3, '09:00:00', '17:00:00', '09:00:00', '17:00:00', '00:00:00', '00:00:00', '09:00:00', '20:00:00', '09:00:00', '17:00:00', '09:00:00', '17:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_notes`
--

CREATE TABLE `employee_notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `note` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_created` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_outlets`
--

CREATE TABLE `employee_outlets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `outlet_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_pay_rate`
--

CREATE TABLE `employee_pay_rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `hourly_rate` decimal(8,2) NOT NULL,
  `treatment_commission` decimal(8,2) DEFAULT NULL,
  `product_commission` decimal(8,2) DEFAULT NULL,
  `start_date` int(30) NOT NULL,
  `end_date` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `business_id`, `reference`, `business_name`, `street`, `town`, `county`, `postcode`, `telephone`, `mobile`, `fax`, `email`, `website`, `twitter`, `facebook`, `image`, `user_id`, `is_active`, `created_at`) VALUES
(4, 7, 'How Media', 'How Media', '142 Market Street', 'Bury', 'Lancashire', 'BL8 3LS', '01204 123456', '', '', NULL, 'http://www.how-media.co.uk', NULL, NULL, NULL, 7, 1, 1393019991);

-- --------------------------------------------------------

--
-- Table structure for table `outlet_access`
--

CREATE TABLE `outlet_access` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `outlet_access`
--

INSERT INTO `outlet_access` (`id`, `outlet_id`, `user_id`) VALUES
(3, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `outlet_hours`
--

CREATE TABLE `outlet_hours` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(10) NOT NULL,
  `monday_open` time DEFAULT NULL,
  `monday_closed` time DEFAULT NULL,
  `tuesday_open` time DEFAULT NULL,
  `tuesday_closed` time DEFAULT NULL,
  `wednesday_open` time DEFAULT NULL,
  `wednesday_closed` time DEFAULT NULL,
  `thursday_open` time DEFAULT NULL,
  `thursday_closed` time DEFAULT NULL,
  `friday_open` time DEFAULT NULL,
  `friday_closed` time DEFAULT NULL,
  `saturday_open` time DEFAULT NULL,
  `saturday_closed` time DEFAULT NULL,
  `sunday_open` time DEFAULT NULL,
  `sunday_closed` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
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
(3, 'Salon', 'Complete solution for your salon', 24.99, 1, 1, 1, 5, 1000, 100, 100, 3, 10, 5, 100, 0.10, 1, 1, 1, 1, 1, 1, 1, 30, 1, 1, 1, '2014-02-19 10:00:24'),
(2, 'Solo', 'Ideal for mobile technicians', 12.99, 1, 0, 1, 1, 100, 20, 0, 0, 0, 0, 0, 0.10, 0, 0, 0, 0, 1, 0, 0, NULL, 1, 1, 1, '2014-02-19 10:00:32'),
(4, 'Chain', 'Great if you have more than 1 salon', 39.99, 1, 0, 5, 50, 10000, 500, 250, 25, 25, 30, 200, 0.08, 1, 1, 1, 1, 1, 1, 1, 30, 1, 1, 1, '2014-02-19 10:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `plan_orders`
--

CREATE TABLE `plan_orders` (
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  `is_employee` tinyint(1) NOT NULL DEFAULT '0',
  `is_client` tinyint(1) NOT NULL DEFAULT '0',
  `plan_id` int(6) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(30) NOT NULL,
  `last_login` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_manager`, `is_employee`, `is_client`, `plan_id`, `is_active`, `created_at`, `last_login`) VALUES
(7, NULL, 'contact@how-media.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, 0, 3, 1, 1393019832, 1393169684),
(13, 'emmahowker', '', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, 3, 1, 1393122168, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `create_outlet` int(1) NOT NULL DEFAULT '0',
  `edit_outlet` int(1) NOT NULL DEFAULT '0',
  `delete_outlet` int(1) NOT NULL DEFAULT '0',
  `view_employees` int(1) NOT NULL DEFAULT '0',
  `create_employee` int(1) NOT NULL DEFAULT '0',
  `edit_employee` int(1) NOT NULL DEFAULT '0',
  `delete_employee` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `create_outlet`, `edit_outlet`, `delete_outlet`, `view_employees`, `create_employee`, `edit_employee`, `delete_employee`) VALUES
(4, 7, 1, 1, 1, 1, 1, 1, 1);
