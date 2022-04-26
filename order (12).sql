-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2022 lúc 04:21 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) UNSIGNED NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `cmnd` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `diachi`, `cmnd`, `ngaysinh`, `sdt`, `adminUser`, `adminPass`) VALUES
(1, 'Phạm Quốc Thắng', 'phamquocthang2207@gmail.com', 'Đồng Tháp', '12345678', '2000-07-22', '0828822886', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giuong`
--

CREATE TABLE `tbl_giuong` (
  `giuongId` int(11) UNSIGNED NOT NULL,
  `giuongName` varchar(255) NOT NULL,
  `phongId` int(11) NOT NULL,
  `loaigiuong` varchar(255) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hopdong`
--

CREATE TABLE `tbl_hopdong` (
  `hopdongId` int(11) NOT NULL,
  `soHđ` varchar(255) NOT NULL,
  `giuongId` int(11) UNSIGNED NOT NULL,
  `khachhangId` int(11) UNSIGNED NOT NULL,
  `ngayBd` date NOT NULL,
  `ngayKt` date NOT NULL,
  `image_hopdong` varchar(255) NOT NULL,
  `adminId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhangId` int(11) UNSIGNED NOT NULL,
  `khachhangName` varchar(255) NOT NULL,
  `cmnd` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phong`
--

CREATE TABLE `tbl_phong` (
  `phongId` int(11) NOT NULL,
  `phongName` varchar(255) NOT NULL,
  `toanhaId` int(11) UNSIGNED NOT NULL,
  `tang` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image_phong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_toanha`
--

CREATE TABLE `tbl_toanha` (
  `toanhaId` int(11) UNSIGNED NOT NULL,
  `toanhaName` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_giuong`
--
ALTER TABLE `tbl_giuong`
  ADD PRIMARY KEY (`giuongId`),
  ADD KEY `phongId` (`phongId`),
  ADD KEY `phongId_2` (`phongId`);

--
-- Chỉ mục cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD PRIMARY KEY (`hopdongId`),
  ADD KEY `giuongId` (`giuongId`,`khachhangId`),
  ADD KEY `khachhangId` (`khachhangId`),
  ADD KEY `adminid` (`adminId`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhangId`);

--
-- Chỉ mục cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  ADD PRIMARY KEY (`phongId`),
  ADD KEY `toanhaId` (`toanhaId`);

--
-- Chỉ mục cho bảng `tbl_toanha`
--
ALTER TABLE `tbl_toanha`
  ADD PRIMARY KEY (`toanhaId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_giuong`
--
ALTER TABLE `tbl_giuong`
  MODIFY `giuongId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  MODIFY `hopdongId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhangId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  MODIFY `phongId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_toanha`
--
ALTER TABLE `tbl_toanha`
  MODIFY `toanhaId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_giuong`
--
ALTER TABLE `tbl_giuong`
  ADD CONSTRAINT `tbl_giuong_ibfk_2` FOREIGN KEY (`phongId`) REFERENCES `tbl_phong` (`phongId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD CONSTRAINT `tbl_hopdong_ibfk_1` FOREIGN KEY (`khachhangId`) REFERENCES `tbl_khachhang` (`khachhangId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hopdong_ibfk_2` FOREIGN KEY (`giuongId`) REFERENCES `tbl_giuong` (`giuongId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  ADD CONSTRAINT `tbl_phong_ibfk_1` FOREIGN KEY (`toanhaId`) REFERENCES `tbl_toanha` (`toanhaId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
