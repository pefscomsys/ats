-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2018 at 02:54 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_pictures`
--

CREATE TABLE `all_pictures` (
  `id` int(255) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `mysql_date` varchar(100) NOT NULL,
  `file_path` text NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_pictures`
--

INSERT INTO `all_pictures` (`id`, `day`, `month`, `year`, `mysql_date`, `file_path`, `time_added`) VALUES
(1, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161144.png', '2018-11-06 15:44:17'),
(2, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161154.png', '2018-11-06 15:54:02'),
(3, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161154.png', '2018-11-06 15:54:26'),
(4, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161154.png', '2018-11-06 15:54:47'),
(5, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161155.png', '2018-11-06 15:55:05'),
(6, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106161158.png', '2018-11-06 15:58:33'),
(7, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171104.png', '2018-11-06 16:04:45'),
(8, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171105.png', '2018-11-06 16:05:03'),
(9, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171105.png', '2018-11-06 16:05:24'),
(10, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171106.png', '2018-11-06 16:06:10'),
(11, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171119.jpeg', '2018-11-06 16:19:21'),
(12, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171133.jpeg', '2018-11-06 16:33:49'),
(13, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171134.jpeg', '2018-11-06 16:34:41'),
(14, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171137.jpeg', '2018-11-06 16:37:22'),
(15, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171138.jpeg', '2018-11-06 16:38:46'),
(16, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106171141.jpeg', '2018-11-06 16:41:33'),
(17, 6, 11, 2018, '2018-11-06', 'images/all/CAR_20181106221155.png', '2018-11-06 21:55:21'),
(18, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221135.jpg', '2018-11-14 21:35:24'),
(19, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221135.jpg', '2018-11-14 21:35:27'),
(20, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221135.jpg', '2018-11-14 21:35:39'),
(21, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221137.jpg', '2018-11-14 21:37:32'),
(22, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221137.jpg', '2018-11-14 21:37:35'),
(23, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221137.jpg', '2018-11-14 21:37:56'),
(24, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:02'),
(25, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:05'),
(26, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:11'),
(27, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:14'),
(28, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:23'),
(29, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:26'),
(30, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:32'),
(31, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114221138.jpg', '2018-11-14 21:38:41'),
(32, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224137.jpg', '2018-11-14 21:41:37'),
(33, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224140.jpg', '2018-11-14 21:41:41'),
(34, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224144.jpg', '2018-11-14 21:41:44'),
(35, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224201.jpg', '2018-11-14 21:42:01'),
(36, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224214.jpg', '2018-11-14 21:42:14'),
(37, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224217.jpg', '2018-11-14 21:42:17'),
(38, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224226.jpg', '2018-11-14 21:42:26'),
(39, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224229.jpg', '2018-11-14 21:42:29'),
(40, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224233.jpg', '2018-11-14 21:42:33'),
(41, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224241.jpg', '2018-11-14 21:42:41'),
(42, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224246.jpg', '2018-11-14 21:42:46'),
(43, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114224250.jpg', '2018-11-14 21:42:50'),
(44, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234858.jpg', '2018-11-14 22:48:59'),
(45, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234903.jpg', '2018-11-14 22:49:03'),
(46, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234906.jpg', '2018-11-14 22:49:06'),
(47, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234909.jpg', '2018-11-14 22:49:09'),
(48, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234915.jpg', '2018-11-14 22:49:15'),
(49, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234917.jpg', '2018-11-14 22:49:18'),
(50, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234920.jpg', '2018-11-14 22:49:20'),
(51, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234926.jpg', '2018-11-14 22:49:26'),
(52, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234929.jpg', '2018-11-14 22:49:29'),
(53, 14, 11, 2018, '2018-11-14', 'images/all/CAR_20181114234932.jpg', '2018-11-14 22:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` int(255) NOT NULL,
  `message` text NOT NULL,
  `stack_trace` text NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recognised_plates`
--

CREATE TABLE `recognised_plates` (
  `id` int(255) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` year(4) NOT NULL,
  `path` varchar(400) NOT NULL,
  `plate` varchar(200) NOT NULL,
  `log` text NOT NULL,
  `mysql_date` varchar(200) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recognised_plates`
--

INSERT INTO `recognised_plates` (`id`, `day`, `month`, `year`, `path`, `plate`, `log`, `mysql_date`, `time_added`) VALUES
(1, 6, 11, 2018, 'images/all/CAR_20181106171134.jpeg', 'LR33T', 'Array', '2018-11-06', '2018-11-06 16:34:43'),
(2, 6, 11, 2018, 'images/all/CAR_20181106171137.jpeg', 'LR33T', '{"version":2,"data_type":"alpr_results","epoch_time":1541522243623,"img_width":750,"img_height":445,"processing_time_ms":292.298553,"regions_of_interest":[],"results":[{"plate":"LR33T","confidence":85.089302,"matches_template":0,"plate_index":0,"region":"","region_confidence":0,"processing_time_ms":61.729473,"requested_topn":10,"coordinates":[{"x":281,"y":209},{"x":413,"y":209},{"x":413,"y":273},{"x":281,"y":273}],"candidates":[{"plate":"LR33T","confidence":85.089302,"matches_template":0},{"plate":"LR33","confidence":76.970161,"matches_template":0},{"plate":"LR3T","confidence":69.256920,"matches_template":0},{"plate":"LR3ST","confidence":69.166977,"matches_template":0},{"plate":"LRS3T","confidence":68.142403,"matches_template":0},{"plate":"LR3S","confidence":61.047825,"matches_template":0},{"plate":"LRS3","confidence":60.023251,"matches_template":0},{"plate":"LRST","confidence":52.310009,"matches_template":0},{"plate":"LRSST","confidence":52.220070,"matches_template":0},{"plate":"LRSS","confidence":44.100918,"matches_template":0}]}]}', '2018-11-06', '2018-11-06 16:37:23'),
(3, 6, 11, 2018, '../images/all/CAR_20181106171138.jpeg', 'LR33T', '{"version":2,"data_type":"alpr_results","epoch_time":1541522328691,"img_width":750,"img_height":445,"processing_time_ms":344.033356,"regions_of_interest":[],"results":[{"plate":"LR33T","confidence":85.089302,"matches_template":0,"plate_index":0,"region":"","region_confidence":0,"processing_time_ms":79.916924,"requested_topn":10,"coordinates":[{"x":281,"y":209},{"x":413,"y":209},{"x":413,"y":273},{"x":281,"y":273}],"candidates":[{"plate":"LR33T","confidence":85.089302,"matches_template":0},{"plate":"LR33","confidence":76.970161,"matches_template":0},{"plate":"LR3T","confidence":69.256920,"matches_template":0},{"plate":"LR3ST","confidence":69.166977,"matches_template":0},{"plate":"LRS3T","confidence":68.142403,"matches_template":0},{"plate":"LR3S","confidence":61.047825,"matches_template":0},{"plate":"LRS3","confidence":60.023251,"matches_template":0},{"plate":"LRST","confidence":52.310009,"matches_template":0},{"plate":"LRSST","confidence":52.220070,"matches_template":0},{"plate":"LRSS","confidence":44.100918,"matches_template":0}]}]}', '2018-11-06', '2018-11-06 16:38:49'),
(4, 6, 11, 2018, 'images/all/CAR_20181106171141.jpeg', 'LR33T', '{"version":2,"data_type":"alpr_results","epoch_time":1541522496011,"img_width":750,"img_height":445,"processing_time_ms":373.540619,"regions_of_interest":[],"results":[{"plate":"LR33T","confidence":85.089302,"matches_template":0,"plate_index":0,"region":"","region_confidence":0,"processing_time_ms":80.988861,"requested_topn":10,"coordinates":[{"x":281,"y":209},{"x":413,"y":209},{"x":413,"y":273},{"x":281,"y":273}],"candidates":[{"plate":"LR33T","confidence":85.089302,"matches_template":0},{"plate":"LR33","confidence":76.970161,"matches_template":0},{"plate":"LR3T","confidence":69.256920,"matches_template":0},{"plate":"LR3ST","confidence":69.166977,"matches_template":0},{"plate":"LRS3T","confidence":68.142403,"matches_template":0},{"plate":"LR3S","confidence":61.047825,"matches_template":0},{"plate":"LRS3","confidence":60.023251,"matches_template":0},{"plate":"LRST","confidence":52.310009,"matches_template":0},{"plate":"LRSST","confidence":52.220070,"matches_template":0},{"plate":"LRSS","confidence":44.100918,"matches_template":0}]}]}', '2018-11-06', '2018-11-06 16:41:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_pictures`
--
ALTER TABLE `all_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recognised_plates`
--
ALTER TABLE `recognised_plates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_pictures`
--
ALTER TABLE `all_pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recognised_plates`
--
ALTER TABLE `recognised_plates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
