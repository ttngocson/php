-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2019 lúc 07:47 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websiteqlda`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `IDHoaDon` varchar(20) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`IDHoaDon`, `IDSanPham`, `SoLuong`, `DonGia`) VALUES
('27HD261120190937', 10, 1, 6000000),
('27HD261120190939', 11, 1, 9000000),
('3HD261120191032', 11, 1, 9000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `IDChucNang` int(11) NOT NULL,
  `TenChucNang` varchar(100) NOT NULL,
  `MoTa` varchar(1000) NOT NULL,
  `GhiTat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`IDChucNang`, `TenChucNang`, `MoTa`, `GhiTat`) VALUES
(1, 'Xem danh sách sản phẩm', 'Xem danh sách các sản phẩm', 'xsp'),
(2, 'Xem chi tiết sản phẩm', 'Xem thông tin chi tiết sản phẩm', 'xctsp'),
(3, 'Sửa sản phẩm', 'Sửa thông tin chi tiết sản phẩm', 'ssp'),
(4, 'Xóa sản phẩm', 'Xóa 1 sản phẩm', 'dsp'),
(5, 'Thêm sản phẩm', 'Thêm mới 1 sản phẩm', 'tsp'),
(6, 'Xem tài khoản', 'Xem danh sách tài khoản', 'xtk'),
(7, 'Xem chi tiết tài khoản', 'Xem chiết thông tin 1 tài khoản', 'xcttk'),
(8, 'Sửa tài khoản', 'Sửa thông tin 1 tài khoản', 'stk'),
(9, 'Xóa tài khoản', 'Xóa 1 tài khoản', 'dtk'),
(10, 'Thêm tài khoản', 'Thêm mới 1 tài khoản đi kèm với thông tin người dùng', 'ttk'),
(11, 'Xem danh sách người dùng', 'Xem danh sách người dùng', 'xttu'),
(12, 'Xem chi tiết người dùng', 'Xem thông tin 1 tài khoản', 'cttt'),
(13, 'Sửa thông tin người dùng', 'Sửa thông tin 1 người dùng', 'sttu'),
(14, 'Xóa người dùng', 'Xóa 1 người dùng', 'dttu'),
(15, 'Xem danh sách hóa đơn', 'Xem danh sách hóa đơn', 'xhd'),
(16, 'Xem chi tiết hóa đơn', 'Xem chi tiết 1 hóa đơn', 'cthd'),
(17, 'Xóa hóa đơn', 'Xóa 1 hóa đơn', 'xhd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHoaDon` varchar(20) NOT NULL,
  `IDNguoiDung` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IDHoaDon`, `IDNguoiDung`, `NgayLap`, `TongTien`, `TinhTrang`) VALUES
('27HD261120190937', 27, '2019-11-26', 6000000, 1),
('27HD261120190939', 27, '2019-11-26', 9000000, 1),
('3HD261120191032', 3, '2019-11-26', 9000000, 1),
('HD001', 3, '2019-11-01', 5000, 1),
('HD002', 3, '2019-11-02', 5000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `IDLoaiSP` int(11) NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `MoTa` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLoaiSP`, `TenLoai`, `MoTa`) VALUES
(1, 'Nhẫn', NULL),
(2, 'Lắc Tay', NULL),
(3, 'Lắc Chân', NULL),
(4, 'Mặt Dây Chuyền', NULL),
(5, 'Dây Chuyền', NULL),
(6, 'Hoa Tai', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomtaikhoan`
--

CREATE TABLE `nhomtaikhoan` (
  `IDNhomTK` int(11) NOT NULL,
  `TenNhom` varchar(50) NOT NULL,
  `MoTa` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhomtaikhoan`
--

INSERT INTO `nhomtaikhoan` (`IDNhomTK`, `TenNhom`, `MoTa`) VALUES
(1, 'Nhóm Admin', 'nhóm của quản trị viên'),
(2, 'Nhóm Nhân viên', 'nhóm của nhân viên'),
(3, 'Nhóm Khách hàng', 'nhóm của khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyensudung`
--

CREATE TABLE `quyensudung` (
  `TenTK` varchar(20) NOT NULL,
  `IDChucNang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quyensudung`
--

INSERT INTO `quyensudung` (`TenTK`, `IDChucNang`) VALUES
('staff01', 1),
('staff01', 2),
('staff01', 3),
('staff01', 4),
('staff01', 5),
('staff01', 6),
('staff01', 7),
('staff01', 11),
('staff01', 12),
('staff01', 15),
('staff01', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(50) NOT NULL,
  `IDLoaiSP` int(11) NOT NULL DEFAULT 999,
  `DonGia` int(11) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `TrongLuong` varchar(50) NOT NULL,
  `TenDaQuy` varchar(50) NOT NULL,
  `SoLuongDQ` int(11) NOT NULL,
  `TrongLuongDQ` varchar(50) NOT NULL,
  `HinhDang` varchar(50) NOT NULL,
  `LoaiVang` varchar(50) NOT NULL,
  `TrongLuongVang` varchar(50) NOT NULL,
  `SoLuongSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `IDLoaiSP`, `DonGia`, `HinhAnh`, `TrongLuong`, `TenDaQuy`, `SoLuongDQ`, `TrongLuongDQ`, `HinhDang`, `LoaiVang`, `TrongLuongVang`, `SoLuongSP`) VALUES
(10, 'Nhẫn vàng đính kim cương Zabbi', 1, 6000000, 'b4706r-di-wg.jpg', '1.28 - 1.42 gram', 'Kim Cương', 1, '0.1 Ct', 'Round', 'Vàng trắng', '1.26 - 1.4 gram', 100),
(11, 'Nhẫn kim cương Cirne', 1, 9000000, 's4316r-di-wp.png', '1.66 - 1.77 gram', 'Kim Cương', 13, '0.1 Ct', 'Full Cut', 'Vàng trắng', '1.59 - 1.75 gram', 100),
(12, 'Nhẫn vàng đính kim cương Simple', 1, 6799150, 'b4731r-di-wg.jpg', '1.15 - 1.34 gram', 'Kim Cương', 1, '0.12 Ct', 'Round', 'Vàng trắng', '1.13 - 1.32 gram', 100),
(13, 'Nhẫn vàng đính kim cương Lisa', 1, 9349150, 'b4707r-di-wg.jpg', '1.73 - 1.94 gram', 'Kim Cương', 5, '0.191 Ct', 'Round', 'Vàng trắng', '1.69 - 1.9 gram', 90),
(14, 'Nhẫn kim cương Asclepius', 1, 7224150, 'sr-r-126774-di-wg.png', '1.21 - 1.44 gram', 'Kim Cương', 13, '0.14 Ct', 'Round', 'Vàng trắng', '1.18 - 1.412 gram', 100),
(15, 'Nhẫn kim cương Honesty', 1, 8074150, '9594210-di-wg.jpg', '1.93 gram', 'Kim Cương', 7, '0.15 Ct', 'Round', 'Vàng trắng', '1.9 gram', 100),
(16, 'Nhẫn vàng đính kim cương Pill', 1, 3399150, 'b4703r-di-wg.jpg', '1.03 - 1.17 gram', 'Kim Cương', 1, '0.03 Ct', 'Round', 'Vàng trắng', '1.02 - 1.16 gram', 100),
(17, 'Nhẫn kim cương Ajax', 1, 77224150, 'sr-r-125021-di-wg.png', '1.21 - 1.34 gram', 'Kim Cương', 1, '0.12 Ct', 'Round', 'Vàng trắng', '1.186 - 1.32 gram', 100),
(18, 'Nhẫn kim cương One Heart', 1, 10199150, '9594222-di-wg.jpg', '2.05 gram', 'Kim Cương', 3, '0.19 Ct', 'Round', 'Vàng trắng', '2.01 gram', 100),
(19, 'Nhẫn kim cương Milla', 1, 10199150, '9594390-di-wg.jpg', '1.16 gram', 'Kim Cương', 11, '0.32 Ct', 'Round', 'Vàng trắng', '1.1 gram', 100),
(20, 'Lắc tay Vàng Ý Rush', 2, 7649150, 'btgnamy176-wg.jpg', '5.2 - 5.33 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '5.2 - 5.33 gram', 100),
(21, 'Vòng tay kim cương Brace', 2, 4249150, '9594279-di-wg.jpg', '1.5 gram', 'Kim Cương', 10, '0.03 Ct', 'Round', 'Vàng trắng', '1.49 gram', 100),
(22, 'Lắc tay kim cương Fiete', 2, 7649150, 'sr-br-60564-di-wg.jpg', '1.26 - 1.38 gram', 'Kim Cương', 56, '0.17 Ct', 'Round', 'Vàng trắng', '1.22 - 1.35 gram', 100),
(23, 'Lắc tay Vàng Ý 18k Chloe', 2, 10624150, 'BTGNAMY157-WG.jpg', '7.09 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '7.09 gram', 100),
(24, 'Lắc tay vàng ý 18k Ora', 2, 9349150, 'detail-btgnamy158-wpy.jpg', '5.35 - 5.39 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '5.35 - 5.39 gram', 100),
(25, 'Lắc tay Kim cương Telusa', 2, 8074150, 'sr-br-60800-di-wg.jpg', '1.84 - 2.02 gram', 'Kim Cương', 30, '0.12 Ct', 'Round', 'Vàng trắng', '1.82 - 2 gram', 100),
(26, 'Lắc tay vàng ý 18k Keva', 2, 6374150, 'btgnamy168-wpy.jpg', '3.83 - 3.95 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '3.83 - 3.95 gram', 100),
(27, 'Lắc tay vàng Ý Ethel', 2, 7649150, 'btgnamy249-wpy.jpg', '4.94 - 5.6 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '4.94 - 5.6 gram', 100),
(28, 'Lắc tay Vàng Ý Peppe', 2, 6799150, 'btgnamy023-wpy_1_.jpg', '4.26 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '4.26 gram', 100),
(29, 'Lắc tay Kim cương Liya', 2, 7649150, 'sr-br-10169-di-wg.jpg', '1.29 - 1.39 gram', 'Kim Cương', 38, '0.13 Ct', 'Round', 'Vàng trắng', '1.26 - 1.36 gram', 100),
(30, 'Mặt kim cương Raffaela', 4, 11049150, 'K6010P-DI-WG.jpg', '1.28 gram', 'Kim Cương', 23, '0.29 Ct', 'null', 'Vàng trắng', '1.22 gram', 100),
(31, 'Mặt dây chuyền kim cương Eileen', 4, 10199150, '9594214-di-wg.jpg', '1.19 gram', 'Kim Cương', 23, '0.28 Ct', 'Round', 'Vàng trắng', '1.13 gram', 100),
(32, 'Mặt Kim cương Kristina', 4, 3824150, 'sr-p-14878-di-wg.jpg', '0.4 - 0.51 gram', 'Kim Cương', 27, '0.06 Ct', 'Round', 'Vàng trắng', '0.386 - 0.492 gram', 100),
(33, 'Mặt Kim cương Amethyst Laniva', 4, 4249150, 'k4136p-diam-yg.jpg', '0.77 - 0.84 gram', 'Amethyst', 1, '1.78 Ct', 'Round', 'Vàng trắng', '0.37 - 0.51 gram', 100),
(34, 'Mặt dây chuyền kim cương Cirlovy', 4, 9349150, 'sr-p-113433-di-wg.jpg', '0.87 - 0.97 gram', 'Kim Cương', 27, '0.31 Ct', 'Round', 'Vàng trắng', '0.808 - 0.908 gram', 100),
(35, 'Mặt dây chuyền heo vàng Tài Lộc', 4, 2124150, 'btgip0004-yg.jpg', '0.87 - 1.1 gram', 'Kim Cương', 1, 'null', 'null', 'Vàng trắng', '0.87 - 1.1 gram', 100),
(36, 'Mặt kim cương Sanivita', 4, 6479520, 'm4652p-di-wg.jpg', '0.66 - 0.7 gram', 'Kim Cương', 28, '0.17 Ct', 'Full Cut', 'Vàng trắng', '0.63 - 0.67 gram', 100),
(37, 'Mặt kim cương Lewis', 4, 1679520, 'sr-p-3241-di-wg.jpg', '0.39 - 0.45 gram', 'Kim Cương', 3, '0.02 Ct', 'null', 'Vàng trắng', '0.388 - 0.446 gram', 100),
(38, 'Mặt Kim cương Ollie', 4, 3824150, 'sr-p-42060-di-wg.jpg', '0.7 - 0.8 gram', 'Kim Cương', 11, '0.1 Ct', 'Round', 'Vàng trắng', '0.68 - 0.78 gram', 100),
(39, 'Mặt dây chuyền vàng Dancing Crown', 4, 2879150, 'ds_pd00089-cz-wg.jpg', '1.4 - 1.64 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '1.33 - 1.5626 gram', 100),
(40, 'Dây chuyền vàng đính đá CZ Daisy', 5, 4249150, '9610649-cz-wg.jpg', '1.98 - 2.02 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '1.98 - 2.02 gram', 100),
(41, 'Dây chuyền vàng Ý Cardinale', 5, 5524150, 'btgnamy040-wg-new.jpg', '2.57 - 3.56 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '2.57 - 3.56 gram', 100),
(42, 'Dây chuyền kim cương Arcana', 5, 5949150, '9594257-di-wpy.jpg', '2.33 gram', 'Kim Cương', 8, '0.03 Ct', 'Round', 'Vàng trắng', '2.32 gram', 100),
(43, 'Dây chuyền đính kim cương Calliope', 5, 9349150, 'SR-N-111249-DI-WG.jpg', '1.47 gram', 'Kim Cương', 6, '0.18 Ct', 'Round', 'Vàng trắng', '1.43 gram', 100),
(44, 'Dây chuyền vàng Ý Gina', 5, 3824150, 'btgnamy045-wg.jpg', '1.83 - 1.85 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '1.83 - 1.85 gram', 100),
(45, 'Dây chuyền vàng Ý Sanremo', 5, 3824150, 'btgnamy084-wg-new.jpg', '2.59 - 2.65 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '2.59 - 2.65 gram', 100),
(46, 'Dây chuyền vàng Ý Rimini', 5, 2974150, 'btgnamy071-wpy_1.jpg', '1.15 - 1.16 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '1.15 - 1.16 gram', 100),
(47, 'Dây chuyền kim cương ngọc trai Black Pearl', 5, 3824150, '9594267-DIPF-WG.jpg', '2.04 gram', 'Kim Cương / Ngọc Trai', 4, '0.03 Ct / 2.63 Ct', 'Round', 'Vàng trắng', '1.51 gram', 100),
(48, 'Dây chuyền vàng Ý Lona', 5, 3399150, 'btgnamy296-wg.jpg', '1.29 - 1.6 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '1.29 - 1.6 gram', 100),
(49, 'Dây chuyền vàng Ý Federico', 5, 12749150, 'btgnamyc483-wg.jpg', '8.83 - 9.41 gram', 'null', 0, 'null', 'null', 'Vàng trắng', '8.83 - 9.41 gram', 100),
(50, 'Bông tai kim cương Whitley', 6, 8499150, 'b4720e-di-wg.jpg', '1.35 - 1.36 gram', 'Kim Cương', 2, '0.125 Ct', 'Round', 'Vàng trắng', '1.32 - 1.33 gram', 100),
(51, 'Bông tai kim cương Milley', 6, 11474150, 'b4721e-di-wg.jpg', '1.53 - 1.58 gram', 'Kim Cương', 2, '0.24 Ct', 'Round', 'Vàng trắng', '1.48 - 1.53 gram', 100),
(52, 'Hoa tai kim cương Diliana', 6, 11049150, '9594215-di-wg.jpg', '1.54 gram', 'Kim Cương', 46, '0.32 Ct', 'Round', 'Vàng trắng', '1.48 gram', 100),
(53, 'Bông tai kim cương Alley', 6, 6374150, 'b4722e-di-wg.jpg', '1.25 - 1.29 gram', 'Kim Cương', 2, '0.144 Ct', 'Round', 'Vàng trắng', '1.22 - 1.26 gram', 100),
(54, 'Hoa tai kim cương Gauge', 6, 2974150, '9594816-di-wg.jpg', '0.84 gram', 'Kim Cương', 6, '0.03 Ct', 'Round', 'Vàng trắng', '0.83 gram', 100),
(55, 'Hoa tai kim cương ngọc trai Naciska', 6, 3399150, '9594227-dipf-wg.jpg', '1.31 - 1.43 gram', 'Kim Cương / Ngọc Trai', 2, '0.038 Ct / 4.2 Ct', 'Round', 'Vàng trắng', '0.46 - 0.58 gram', 100),
(56, 'Hoa tai kim cương ngọc trai Heavenly', 6, 3399150, '9594252-dipf-wg.jpg', '1.84 - 1.91 gram', 'Kim Cương / Ngọc Trai', 2, '0.014 Ct / 2.24 Ct', 'Round', 'Vàng trắng', '1.39 - 1.46 gram', 100),
(57, 'Hoa tai kim cương Somita', 6, 6374150, '9594307-di-wg.jpg', '1.04 gram', 'Kim Cương', 2, '0.15 Ct', 'Round', 'Vàng trắng', '1.01 gram', 100),
(58, 'Hoa tai kim cương Kinellin', 6, 4249150, '9594236-di-wg.jpg', '1.58 - 1.62 gram', 'Kim Cương', 4, '0.022 Ct', 'Round', 'Vàng trắng', '1.57 - 1.62 gram', 100),
(59, 'Hoa tai ngọc trai Miyena', 6, 8499000, 'k3998e-czpf-wg_1.jpg', '2.79 - 3.32 gram', 'Kim Cương', 2, '3.43 Ct', 'Round', 'Vàng trắng', '2.68 - 8.64 gram', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenTK` varchar(20) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `IDNhomTK` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TenTK`, `MatKhau`, `IDNhomTK`, `TrangThai`) VALUES
('adadad', 'asd', 3, 1),
('admin', 'admin', 1, 1),
('anhtobi', '123456', 3, 1),
('asd', 'asd', 3, 1),
('staff', '123456', 3, 1),
('staff01', '123456', 2, 1),
('thanhthanh', '123456', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnguoidung`
--

CREATE TABLE `thongtinnguoidung` (
  `IDNguoiDung` int(11) NOT NULL,
  `Ho` varchar(50) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `TenTK` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongtinnguoidung`
--

INSERT INTO `thongtinnguoidung` (`IDNguoiDung`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TenTK`) VALUES
(3, 'Nguyễn', 'Tuấn Anh', 1, '012354678', 'example@gmail.com', 'Nha Trang', 'anhtobi'),
(18, 'asd', 'asd', 1, '12312313', 'A@ga', 'asdasd', 'staff'),
(21, 'asfasda', 'asdas', 1, 'asd', 'asdasd', 'asdasd', 'adadad'),
(23, 'asd', 'asd', 1, '123', 'asd@asd', 'sda', 'asd'),
(27, 'trần', 'thành chung', 0, '123456789', 'abc@gmail.com', 'nha trang', 'thanhthanh'),
(28, 'Trần', 'Sơn', 1, '06498851326', 'sontran@gmail.com', 'Nha trang', 'staff01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`IDHoaDon`,`IDSanPham`),
  ADD KEY `FK_CTHD_SP` (`IDSanPham`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`IDChucNang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `FK_HD_ND` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`IDLoaiSP`);

--
-- Chỉ mục cho bảng `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  ADD PRIMARY KEY (`IDNhomTK`);

--
-- Chỉ mục cho bảng `quyensudung`
--
ALTER TABLE `quyensudung`
  ADD PRIMARY KEY (`TenTK`,`IDChucNang`),
  ADD KEY `FK_CN_Q` (`IDChucNang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `FK_SP_LSP` (`IDLoaiSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTK`),
  ADD KEY `FK_TK_NTK` (`IDNhomTK`);

--
-- Chỉ mục cho bảng `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  ADD PRIMARY KEY (`IDNguoiDung`),
  ADD KEY `FK_ND_TK` (`TenTK`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  MODIFY `IDChucNang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `IDLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhomtaikhoan`
--
ALTER TABLE `nhomtaikhoan`
  MODIFY `IDNhomTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  MODIFY `IDNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_CTHD_HD` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadon` (`IDHoaDon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHD_SP` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`IDSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HD_ND` FOREIGN KEY (`IDNguoiDung`) REFERENCES `thongtinnguoidung` (`IDNguoiDung`);

--
-- Các ràng buộc cho bảng `quyensudung`
--
ALTER TABLE `quyensudung`
  ADD CONSTRAINT `FK_CN_Q` FOREIGN KEY (`IDChucNang`) REFERENCES `chucnang` (`IDChucNang`),
  ADD CONSTRAINT `FK_TK_Q` FOREIGN KEY (`TenTK`) REFERENCES `taikhoan` (`TenTK`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SP_LSP` FOREIGN KEY (`IDLoaiSP`) REFERENCES `loaisanpham` (`IDLoaiSP`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TK_NTK` FOREIGN KEY (`IDNhomTK`) REFERENCES `nhomtaikhoan` (`IDNhomTK`);

--
-- Các ràng buộc cho bảng `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  ADD CONSTRAINT `FK_ND_TK` FOREIGN KEY (`TenTK`) REFERENCES `taikhoan` (`TenTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
