-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 03:54 AM
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
-- Database: `ttngocson`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGV` varchar(10) NOT NULL,
  `HOGV` varchar(100) NOT NULL,
  `TENGV` varchar(100) NOT NULL,
  `MAKHOA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MAGV`, `HOGV`, `TENGV`, `MAKHOA`) VALUES
('GV001', 'Lê', 'Thị Bích Hằng', 'CNTT'),
('GV002', 'Trần', 'Hoàng Long', 'KT'),
('GV003', 'Nguyễn', 'Thanh Khải', 'DDT'),
('GV004', 'Hoàng', 'Thị Thanh Hà', 'DL'),
('GV005', 'Trương', 'Hữu Thành', 'KTGT');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MAKHOA` varchar(10) NOT NULL,
  `TENKHOA` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MAKHOA`, `TENKHOA`) VALUES
('CNTT', 'Công Nghệ Thông Tin'),
('DDT', 'Điện-Điện Tử'),
('DL', 'Du Lịch'),
('KT', 'Kinh Tế'),
('KTGT', 'Kỹ Thuật Giao Thông');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MALOP` varchar(10) NOT NULL,
  `TENLOP` varchar(100) NOT NULL,
  `SISOSV` int(5) NOT NULL,
  `MAKHOA` varchar(10) NOT NULL,
  `MAGVCV` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `SISOSV`, `MAKHOA`, `MAGVCV`) VALUES
('CNTT1', 'Công Nghệ Thông Tin 1', 67, 'CNTT', 'GV001'),
('DDT1', 'Điện-Điện tử 1', 58, 'DDT', 'GV003'),
('DL1', 'Du Lịch 1', 74, 'DL', 'GV004'),
('KT1', 'Kinh Tế 1', 65, 'KT', 'GV002'),
('KTGT1', 'Kỹ Thuật Giao Thông 1', 56, 'KTGT', 'GV005'),
('đá', 'đá', 423, 'CNTT', 'GV001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MAGV`),
  ADD KEY `FK_GV_KHOA` (`MAKHOA`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAKHOA`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MALOP`),
  ADD KEY `FK_LOP_GV` (`MAGVCV`),
  ADD KEY `FK_LOP_KHOA` (`MAKHOA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `FK_GV_KHOA` FOREIGN KEY (`MAKHOA`) REFERENCES `khoa` (`MAKHOA`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `FK_LOP_GV` FOREIGN KEY (`MAGVCV`) REFERENCES `giangvien` (`MAGV`),
  ADD CONSTRAINT `FK_LOP_KHOA` FOREIGN KEY (`MAKHOA`) REFERENCES `khoa` (`MAKHOA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
