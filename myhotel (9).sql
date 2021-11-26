-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2021 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myhotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `ID` varchar(10) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0,
  `ID_LoaiThe` varchar(10) NOT NULL,
  `SoThe` varchar(20) NOT NULL,
  `ID_DichVu` varchar(10) NOT NULL,
  `ID_LoaiPhong` varchar(10) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoPhong` varchar(10) NOT NULL,
  `SoNguoi` int(3) NOT NULL DEFAULT 1,
  `SoGiuong` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`ID`, `TenKH`, `SoDienThoai`, `Email`, `CheckIn`, `CheckOut`, `ThoiGian`, `TrangThai`, `ID_LoaiThe`, `SoThe`, `ID_DichVu`, `ID_LoaiPhong`, `DiaChi`, `SoPhong`, `SoNguoi`, `SoGiuong`) VALUES
('0', 'Văn Phi', '0987654321', 'NguyenVanAB@gmain.com', '2021-11-23', '2021-11-23', '2021-11-23 09:18:42', 2, 'LT01', '1314652000', 'DV01', 'LUXURY', 'Cầu Giấy', '201', 3, 2),
('1', 'Nguyễn Văn Phi', '0987654321', 'NguyenVanAB@gmain.com', '2021-11-23', '2021-11-25', '2021-11-23 09:37:09', 1, 'LT01', '1314652000', 'DV01', 'LUXURY', 'Cầu Giấy', '201', 3, 2),
('2', 'nam', '0987654321', 'NguyenVanAB@gmain.com', '2021-11-25', '2021-11-25', '2021-11-25 11:11:29', 2, 'LT01', '1314652000', 'DV01', 'GUEST', 'Cầu Giấy', '301', 2, 2),
('3', 'Micro A', '0987654321', 'NguyenVanAB@gmain.com', '2021-11-25', '2021-11-27', '2021-11-25 15:21:13', 1, 'LT01', '1314652000', 'DV01', 'SINGLE', 'Cầu Giấy', '401', 2, 1),
('4', 'test dịch vụ', '0366423900', 'NguyenVanAB@gmain.com', '2021-11-26', '2021-11-27', '2021-11-25 15:41:13', 1, 'LT01', '1314652000', 'DV00', 'GUEST', 'Cầu Giấy', '301', 3, 2),
('5', 'Nguyễn Văn Phi', '0987654321', 'NguyenVanAB@gmain.com', '2021-11-27', '2021-11-28', '2021-11-26 20:17:02', 0, 'LT01', '1314652000', 'DV00', 'GUEST', 'Cầu Giấy', '0', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `ID` varchar(10) NOT NULL,
  `TenDichVu` varchar(300) NOT NULL,
  `GiaTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`ID`, `TenDichVu`, `GiaTien`) VALUES
('DV00', 'Không dịch vụ', 0),
('DV01', 'Ăn sáng', 500000),
('DV02', 'Full option', 1500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` varchar(10) NOT NULL,
  `ID_KH` varchar(10) NOT NULL,
  `TongTien` float NOT NULL,
  `GhiChu` varchar(200) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(3) NOT NULL DEFAULT 0,
  `ID_Booking` varchar(10) NOT NULL,
  `KhuyenMai` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID`, `ID_KH`, `TongTien`, `GhiChu`, `NgayTao`, `TrangThai`, `ID_Booking`, `KhuyenMai`) VALUES
('0', '0', 2300000, 'Thanh toán bằng tiền mặt lúc 2021-11-23. Giảm giá : 0 %', '2021-11-23 03:00:29', 1, '0', 0),
('1', '1', 4100000, 'Chưa thanh toán', '2021-11-23 22:31:00', 0, '1', 0),
('2', '2', 2000000, 'Thanh toán bằng tiền mặt lúc 2021-11-25. Giảm giá : 0 %', '2021-11-25 04:13:27', 1, '2', 0),
('3', '3', 2100000, 'Chưa thanh toán', '2021-11-25 15:40:30', 0, '3', 0),
('4', '4', 1500000, 'Chưa thanh toán', '2021-11-26 20:17:16', 0, '4', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` varchar(10) NOT NULL,
  `TenKhachHang` varchar(100) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ID_LoaiThe` varchar(10) NOT NULL,
  `SoThe` varchar(20) NOT NULL,
  `DiaChi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `TenKhachHang`, `SoDienThoai`, `Email`, `ID_LoaiThe`, `SoThe`, `DiaChi`) VALUES
('0', 'Văn Phi', '0987654321', 'NguyenVanAB@gmain.com', 'LT01', '1314652000', 'Cầu Giấy'),
('1', 'Nguyễn Văn Phi', '0987654321', 'NguyenVanAB@gmain.com', 'LT01', '1314652000', 'Cầu Giấy'),
('2', 'nam', '0987654321', 'NguyenVanAB@gmain.com', 'LT01', '1314652000', 'Cầu Giấy'),
('3', 'Micro A', '0987654321', 'NguyenVanAB@gmain.com', 'LT01', '1314652000', 'Cầu Giấy'),
('4', 'test dịch vụ', '0366423900', 'NguyenVanAB@gmain.com', 'LT01', '1314652000', 'Cầu Giấy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `ID` int(10) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `TrangThai` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`ID`, `TenKH`, `SoDienThoai`, `Email`, `TrangThai`) VALUES
(2, 'zcz 123', '0987654321', 'NguyenVanAB@gmain.com', 1),
(3, 'Nguyễn Văn Phi', '0987654321', 'phi090320@gmail.com', 1),
(4, 'Văn Việt', '0987654321', 'vietlv.utc@gmail.com', 1),
(5, 'Nguyễn Văn Phi', '0987654321', 'phi090320@gmail.com', 1),
(6, 'Nguyễn Văn Phi', '0987654321', 'phi090320@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `ID` varchar(10) NOT NULL,
  `TenLoai` varchar(300) NOT NULL,
  `SoGiuong` int(3) NOT NULL DEFAULT 0,
  `SoNguoi` int(3) NOT NULL DEFAULT 0,
  `GiaTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`ID`, `TenLoai`, `SoGiuong`, `SoNguoi`, `GiaTien`) VALUES
('GUEST', 'Nhà Nghỉ', 3, 6, 1500000),
('LUXURY', 'Phòng Luxury', 3, 6, 500000),
('SINGLE', 'Phòng Đơn', 1, 2, 800000),
('VIP', 'Phòng VIP', 2, 4, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithe`
--

CREATE TABLE `loaithe` (
  `ID` varchar(10) NOT NULL,
  `TenLoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaithe`
--

INSERT INTO `loaithe` (`ID`, `TenLoai`) VALUES
('LT01', 'Thẻ căn cước'),
('LT02', 'Bằng lái xe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `ID` varchar(10) NOT NULL,
  `SoPhong` varchar(10) NOT NULL,
  `ID_LoaiPhong` varchar(10) NOT NULL,
  `Anh` text NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 2 COMMENT 'check in out',
  `KiemTra` varchar(20) NOT NULL COMMENT 'fix room, delete room',
  `SoGiuong` int(10) NOT NULL,
  `SoNguoi` int(3) NOT NULL,
  `GiaTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`ID`, `SoPhong`, `ID_LoaiPhong`, `Anh`, `TrangThai`, `KiemTra`, `SoGiuong`, `SoNguoi`, `GiaTien`) VALUES
('0', '101', 'VIP', 'https://www.hoteljob.vn/files/Anh-HTJ-Hong/mau-tam-trang%20tri-giuong-khach-san-dep-nhat-19.jpg', 0, 'Bình thường', 1, 3, 1000000),
('1', '100', 'VIP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHrscdfzDFeQXi1OSHR9JJ660ckOEPCagy6w&usqp=CAU', 0, 'Bình thường', 2, 4, 1100000),
('10', '301', 'GUEST', 'https://khongsolac.com/wp-content/uploads/2019/08/5-39.jpg', 1, 'Bình thường', 2, 3, 1500000),
('11', '401', 'SINGLE', 'https://ezcloud.vn/wp-content/uploads/2019/05/single-room.jpg', 1, 'Bình thường', 1, 2, 800000),
('2', '200', 'LUXURY', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsIVSMuDV4Qw2GXwirNGEUMMt2E0wz3HSoUw&usqp=CAU', 0, 'Bình thường', 1, 2, 1500000),
('3', '201', 'LUXURY', 'https://cdn3.ivivu.com/2014/01/SUPER-DELUXE2.jpg', 1, 'Bình thường', 2, 4, 1800000),
('8', '202', 'LUXURY', 'https://q-cf.bstatic.com/images/hotel/max1024x768/178/178533238.jpg', 0, 'Bình thường', 2, 4, 1800000),
('9', '203', 'LUXURY', 'https://media-cdn.tripadvisor.com/media/photo-s/0e/0a/eb/63/day-la-phong-khach-s.jpg', 0, 'Bình thường', 1, 2, 1500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TaiKhoan` varchar(20) NOT NULL,
  `MatKhau` varchar(300) NOT NULL,
  `GhiChu` varchar(100) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TaiKhoan`, `MatKhau`, `GhiChu`, `HoTen`, `Email`) VALUES
('admin', '1', 'admin', 'Nguyễn Văn A', 'ADZ@gmail.com'),
('admin1', '1', 'admin', 'Nguyễn Văn B', 'BBBOY@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LoaiThe` (`ID_LoaiThe`,`ID_DichVu`,`ID_LoaiPhong`),
  ADD KEY `ID_DichVu` (`ID_DichVu`),
  ADD KEY `ID_LoaiPhong` (`ID_LoaiPhong`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_KH` (`ID_KH`),
  ADD KEY `ID_Booking` (`ID_Booking`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LoaiThe` (`ID_LoaiThe`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loaithe`
--
ALTER TABLE `loaithe`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LoaiPhong` (`ID_LoaiPhong`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ID_LoaiThe`) REFERENCES `loaithe` (`ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ID_DichVu`) REFERENCES `dichvu` (`ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`ID_LoaiPhong`) REFERENCES `loaiphong` (`ID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ID_Booking`) REFERENCES `booking` (`ID`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`ID_KH`) REFERENCES `khachhang` (`ID`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`ID_LoaiThe`) REFERENCES `loaithe` (`ID`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ID_LoaiPhong`) REFERENCES `loaiphong` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
