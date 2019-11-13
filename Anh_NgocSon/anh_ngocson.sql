-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 02:30 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anh_ngocson`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MABV` varchar(10) NOT NULL,
  `TIEUDE` varchar(100) NOT NULL,
  `NOIDUNG` varchar(1000) NOT NULL,
  `MACD` varchar(10) NOT NULL,
  `MATV` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`MABV`, `TIEUDE`, `NOIDUNG`, `MACD`, `MATV`) VALUES
('BV001', 'Bài viết 1', 'Đây là bài viết số 1', 'CD001', 'TV001'),
('BV002', 'Bài viết 2', 'Đây là bài viết số 2', 'CD001', 'TV001'),
('BV003', 'Bài viết 3', 'Đây là bài viết số 3', 'CD001', 'TV001'),
('BV004', 'Bài viết 4', 'Đây là bài viết số 4', 'CD001', 'TV001');

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE `chude` (
  `MACD` varchar(10) NOT NULL,
  `TENCD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`MACD`, `TENCD`) VALUES
('CD001', 'Chủ đề 1'),
('CD002', 'Chủ đề 2'),
('CD003', 'Chủ đề 3'),
('CD004', 'Chủ đề 4');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MATV` varchar(10) NOT NULL,
  `TENTV` varchar(100) NOT NULL,
  `MATMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MATV`, `TENTV`, `MATMA`) VALUES
('TV001', 'Tên thành viên 1', 'MM001'),
('TV002', 'Tên thành viên 2', 'MM001'),
('TV003', 'Tên thành viên 3', 'MM003'),
('TV004', 'Tên thành viên 4', 'MM004');

-- --------------------------------------------------------

--
-- Table structure for table `thaoluan`
--

CREATE TABLE `thaoluan` (
  `MATV` varchar(10) NOT NULL,
  `MABV` varchar(10) NOT NULL,
  `NOIDUNGTL` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thaoluan`
--

INSERT INTO `thaoluan` (`MATV`, `MABV`, `NOIDUNGTL`) VALUES
('TV001', 'BV001', 'Đây là bài thảo luận số 1'),
('TV002', 'BV002', 'Đây là bài thảo luận số 2'),
('TV003', 'BV003', 'Đây là bài thảo luận số 3'),
('TV004', 'BV004', 'Đây là bài thảo luận số 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MABV`),
  ADD KEY `FK_BV_TV` (`MATV`),
  ADD KEY `FK_BV_CD` (`MACD`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`MACD`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MATV`);

--
-- Indexes for table `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD PRIMARY KEY (`MATV`,`MABV`),
  ADD KEY `FK_TL_BV` (`MABV`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `FK_BV_CD` FOREIGN KEY (`MACD`) REFERENCES `chude` (`MACD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_BV_TV` FOREIGN KEY (`MATV`) REFERENCES `thanhvien` (`MATV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD CONSTRAINT `FK_TL_BV` FOREIGN KEY (`MABV`) REFERENCES `baiviet` (`MABV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TL_TV` FOREIGN KEY (`MATV`) REFERENCES `thanhvien` (`MATV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
