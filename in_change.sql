-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2011 at 05:26 PM
-- Server version: 5.0.51
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `in_change`
--

-- --------------------------------------------------------

--
-- Table structure for table `hlr_request`
--

CREATE TABLE IF NOT EXISTS `hlr_request` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `Existing_Number` text NOT NULL,
  `Requested_Number` text NOT NULL,
  `Location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `in_tech` varchar(20) NOT NULL,
  `hlr_tech` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `NIN` varchar(150) NOT NULL default '0000000',
  `active` varchar(1) NOT NULL default '1',
  `sales_channel` varchar(100) NOT NULL,
  `receipt_no` varchar(10) default NULL,
  `nationality` varchar(100) default NULL,
  `DOB` varchar(20) default NULL,
  `reg_medium` varchar(20) NOT NULL default 'Not Set',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=20677 ;

-- --------------------------------------------------------

--
-- Table structure for table `in_request`
--

CREATE TABLE IF NOT EXISTS `in_request` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `Existing_Number` text NOT NULL,
  `Requested_Number` text NOT NULL,
  `Location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `in_tech` varchar(20) NOT NULL,
  `hlr_tech` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `NIN` varchar(150) NOT NULL default '0000000',
  `active` varchar(1) NOT NULL default '1',
  `sales_channel` varchar(100) NOT NULL,
  `receipt_no` varchar(10) default NULL,
  `nationality` varchar(100) default NULL,
  `DOB` varchar(20) default NULL,
  `reg_medium` varchar(20) NOT NULL default 'Not Set',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=20678 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(100) default NULL,
  `lastname` varchar(100) default NULL,
  `login` varchar(100) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `permission` varchar(20) NOT NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

-- --------------------------------------------------------

--
-- Table structure for table `numchange`
--

CREATE TABLE IF NOT EXISTS `numchange` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `Existing_Number` text NOT NULL,
  `Requsted_Number` text NOT NULL,
  `Location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `prepaid_data`
--

CREATE TABLE IF NOT EXISTS `prepaid_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `contact` int(11) NOT NULL,
  `Profession` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `NIN` varchar(150) NOT NULL default '0000000',
  `active` varchar(1) NOT NULL default '1',
  `email` varchar(100) default NULL,
  `msisdn` varchar(30) NOT NULL,
  `nationality` varchar(100) default NULL,
  `DOA` varchar(20) NOT NULL default 'Not Set',
  `imei` varchar(30) NOT NULL default 'Not Set',
  `company` varchar(100) default 'Not Set',
  `industry` varchar(100) NOT NULL default 'Not Set',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `Requested_Number` text NOT NULL,
  `Location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `NIN` varchar(150) NOT NULL default '0000000',
  `active` varchar(1) NOT NULL default '1',
  `sales_channel` varchar(100) NOT NULL,
  `receipt_no` varchar(10) default '000000',
  `nationality` varchar(100) default NULL,
  `DOB` varchar(20) default NULL,
  `reg_medium` varchar(20) NOT NULL default 'Not Set',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=6307 ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Customer_Name` text NOT NULL,
  `Existing_Number` text NOT NULL,
  `Requested_Number` text NOT NULL,
  `Location` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `in_tech` varchar(20) NOT NULL,
  `hlr_tech` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `NIN` varchar(150) NOT NULL default '0000000',
  `active` varchar(1) NOT NULL default '1',
  `sales_channel` varchar(100) NOT NULL,
  `receipt_no` varchar(10) default NULL,
  `nationality` varchar(100) default NULL,
  `DOB` varchar(20) default NULL,
  `reg_medium` varchar(20) NOT NULL default 'Not Set',
  `act_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Created by phpFormGenerator' AUTO_INCREMENT=22854 ;

-- --------------------------------------------------------

--
-- Table structure for table `roaming`
--

CREATE TABLE IF NOT EXISTS `roaming` (
  `id` int(11) NOT NULL auto_increment,
  `Customer_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Number` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `operator` varchar(20) NOT NULL,
  `switch_tech` varchar(20) NOT NULL,
  `in_tech` varchar(20) default 'Pending',
  `status` varchar(10) NOT NULL,
  `active` int(1) NOT NULL default '1',
  `NIN` varchar(20) NOT NULL,
  `date_req` date NOT NULL,
  `imsi` varchar(30) default NULL,
  `act_time` time NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Number` (`Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=865 ;

-- --------------------------------------------------------

--
-- Table structure for table `roaming_report`
--

CREATE TABLE IF NOT EXISTS `roaming_report` (
  `id` int(11) NOT NULL auto_increment,
  `Customer_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Number` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `operator` varchar(20) NOT NULL,
  `switch_tech` varchar(20) NOT NULL,
  `in_tech` varchar(20) default NULL,
  `status` varchar(10) NOT NULL,
  `active` int(1) NOT NULL default '1',
  `NIN` varchar(20) NOT NULL,
  `date_req` date NOT NULL,
  `imsi` varchar(30) default NULL,
  `act_time` time NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Number` (`Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=863 ;

-- --------------------------------------------------------

--
-- Table structure for table `sim_replacement`
--

CREATE TABLE IF NOT EXISTS `sim_replacement` (
  `id` int(11) NOT NULL auto_increment,
  `Customer_Name` varchar(100) NOT NULL,
  `new_sim` int(12) NOT NULL,
  `lost_sim` int(7) NOT NULL,
  `date_lost` date NOT NULL,
  `ref_No1` varchar(15) NOT NULL,
  `ref_No2` varchar(15) NOT NULL,
  `ref_No3` varchar(15) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `switch_tech` varchar(100) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `active` varchar(1) NOT NULL default '1',
  `private` int(1) NOT NULL default '0',
  `mca` int(1) NOT NULL default '0',
  `crbt` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15351 ;

-- --------------------------------------------------------

--
-- Table structure for table `sim_replacement_history`
--

CREATE TABLE IF NOT EXISTS `sim_replacement_history` (
  `id` int(11) NOT NULL auto_increment,
  `Customer_Name` varchar(100) NOT NULL,
  `new_sim` int(12) NOT NULL,
  `lost_sim` int(7) NOT NULL,
  `date_lost` date NOT NULL,
  `ref_No1` varchar(15) NOT NULL,
  `ref_No2` varchar(15) NOT NULL,
  `ref_No3` varchar(15) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `switch_tech` varchar(100) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `active` varchar(1) NOT NULL default '1',
  `private` int(1) NOT NULL default '0',
  `mca` int(1) NOT NULL default '0',
  `crbt` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15293 ;

-- --------------------------------------------------------

--
-- Table structure for table `unallocate_rep`
--

CREATE TABLE IF NOT EXISTS `unallocate_rep` (
  `id` int(11) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `new_sim` int(12) NOT NULL,
  `lost_sim` int(7) NOT NULL,
  `date_lost` date NOT NULL,
  `ref_No1` varchar(15) NOT NULL,
  `ref_No2` varchar(15) NOT NULL,
  `ref_No3` varchar(15) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `switch_tech` varchar(100) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `active` varchar(1) NOT NULL default '1',
  `private` int(1) NOT NULL default '0',
  `mca` int(1) NOT NULL default '0',
  `crbt` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
