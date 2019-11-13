-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 08:57 AM
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
-- Database: `ngocson`
--

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `MATACGIA` varchar(10) NOT NULL,
  `TENTACGIA` varchar(50) NOT NULL,
  `QUOCTICH` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`MATACGIA`, `TENTACGIA`, `QUOCTICH`, `EMAIL`) VALUES
('KIMDUNG', 'Kim Dung', 'Trung Quốc', 'dungk@ntu.edu.vn'),
('KIMLAN', 'Kim Lân', 'Việt Nam', 'tainv@ntu.edu.vn'),
('NAMCAO', 'Nam Cao', 'Việt Nam', 'trith@ntu.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

CREATE TABLE `tailieu` (
  `MATAILIEU` varchar(30) NOT NULL,
  `TENTAILIEU` varchar(50) NOT NULL,
  `ANHBIA` varchar(200) DEFAULT NULL,
  `SOTRANG` int(10) NOT NULL,
  `NAMPHATHANH` varchar(6) NOT NULL,
  `MALOAI` varchar(10) NOT NULL,
  `MATACGIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`MATAILIEU`, `TENTAILIEU`, `ANHBIA`, `SOTRANG`, `NAMPHATHANH`, `MALOAI`, `MATACGIA`) VALUES
('BICHHUYETKIEM', 'Bích huyết kiếm', 'bichhuyetkiem.jpg', 550, '1956', 'KIEMHIEP', 'KIMDUNG'),
('CHIPHEO', 'Chí Phèo', 'chipheo.jpg', 200, '1941', 'VANHOC', 'NAMCAO'),
('CONCHOXAUXI', 'Con chó xấu xí', 'conchoxauxi.jpg', 150, '1955', 'VANHOC', 'KIMLAN'),
('LANG', 'Làng', 'lang.jpg', 230, '1948', 'VANHOC', 'KIMLAN'),
('MOTBUANO', 'Một bữa no', 'motbuano.jpg', 150, '1943', 'VANHOC', 'NAMCAO'),
('NGUOIKEPGIA', 'Người kép già', 'nguoikepgia.jpg', 100, '1938', 'VANHOC', 'NAMCAO'),
('THIENLONGBATBO', 'Thiên long bát bộ', 'thienlongbatbo.jpg', 1000, '1963', 'KIEMHIEP', 'KIMDUNG'),
('VONHAT', 'Vợ nhặt', 'vonhat.jpg', 200, '1962', 'VANHOC', 'KIMLAN'),
('YTHIENDOLONGKY', 'Ỷ thiên đồ long ký', 'ythiendolongky.jpg', 500, '1961', 'KIEMHIEP', 'KIMDUNG');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MALOAI` varchar(10) NOT NULL,
  `TENLOAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`MALOAI`, `TENLOAI`) VALUES
('KIEMHIEP', 'Kiếm hiệp'),
('TRUYENCUOI', 'Truyện cười'),
('VANHOC', 'Văn học');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MATACGIA`);

--
-- Indexes for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`MATAILIEU`),
  ADD KEY `FK_TAILIEU_THELOAI` (`MALOAI`),
  ADD KEY `FK_TAILIEU_TACGIA` (`MATACGIA`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MALOAI`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `FK_TAILIEU_TACGIA` FOREIGN KEY (`MATACGIA`) REFERENCES `tacgia` (`MATACGIA`),
  ADD CONSTRAINT `FK_TAILIEU_THELOAI` FOREIGN KEY (`MALOAI`) REFERENCES `theloai` (`MALOAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
