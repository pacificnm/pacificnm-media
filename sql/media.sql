-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 09:10 AM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(20) unsigned NOT NULL,
  `media_type_id` int(20) unsigned NOT NULL,
  `media_file_name` varchar(200) NOT NULL,
  `media_file_path` varchar(200) NOT NULL,
  `media_file_size` float(10,2) NOT NULL,
  `media_file_mime` varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`media_id`), ADD KEY `media_type_id` (`media_type_id`);
SET FOREIGN_KEY_CHECKS=1;

