-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2020 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(5) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id`, `title`, `noidung`, `view`, `status`, `ngaydang`, `giodang`) VALUES
(1, 'Thông báo về tổ chức thi chuẩn Tiếng Anh đầu ra cho trình độ đại học hệ chính quy đợt 1 năm 2019 tại Hà Nội (03/12/2018)', '<p>BỘ NÔNG NGHIỆP &amp; PTNT TRƯỜNG ĐẠI HỌC THUỶ LỢI CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM Độc lập - Tự do - Hạnh phúc Số: 1110 /TB-ĐHTL Hà Nội, ngày 03 tháng 12 năm 2018 THÔNG BÁO Về tổ chức thi chuẩn Tiếng Anh đầu ra cho trình độ đại học hệ chính quy đợt 1 năm 2019 tại Hà Nội Trường Đại học Thủy lợi thông báo kế hoạch tổ chức thi chuẩn Tiếng Anh đầu ra cho trình độ đại học hệ chính quy đợt 1 năm 2019 tại Hà Nội như sau: 1. Đối tượng: Sinh viên hệ đại học chính quy khóa 54 trở về sau. 2. Thời gian thi: ngày 19 và 20/01/2019 3. Kế hoạch đăng ký thi: - Đăng ký nguyện vọng thi tại địa chỉ: https://dangky.tlu.edu.vn. - Thời gian đăng ký nguyện vọng thi qua mạng: 24/12/2018 – 27/12/2018. - Nhà trường sẽ thông báo số báo danh, phòng thi vào tài khoản cá nhân. 4. Hình thức thi: Trắc nghiệm hoàn toàn, trả lời vào phiếu trả lời trắc nghiệm và chấm bằng máy 3 kỹ năng Nghe, Đọc, Viết 5. Quy trình thi: - Kỹ năng đọc, viết: 45 phút - Kỹ năng nghe: 15 phút - Kỹ năng nói: 7 – 10 phút 6. Lệ phí dự thi: 100.000 đồng/ 1 sinh viên. Sinh viên nộp qua tài khoản ngân hàng từ ngày 31/12/2018 đến 04/01/2019, kết thúc thời gian trên những sinh viên không nộp lệ phí sẽ bị xóa khỏi danh sách thi. Nhà trường đề nghị các Khoa nhắc nhở sinh viên thực hiện theo đúng kế hoạch trên./. Nơi nhận: - BGH, HĐT (để b/c); - Các P, K, TT, ĐTN, HSV; - Cố vấn học tập các lớp; - Sinh viên các khóa 54, 55, 56, 57, 58, 59, 60; - Lưu: VT, ĐH&amp;SĐH. KT. HIỆU TRƯỞNG PHÓ HIỆU TRƯỞNG (Đã ký) GS.TS. Nguyễn Trung Việt</p>\r\n', 16, 1, '2019-01-10', '3:12 PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
--

CREATE TABLE `bangdiem` (
  `id` int(5) NOT NULL,
  `MaSV` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `LanThi` int(1) NOT NULL,
  `HocKy` int(1) NOT NULL,
  `Diem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangdiem`
--

INSERT INTO `bangdiem` (`id`, `MaSV`, `MaMH`, `LanThi`, `HocKy`, `Diem`) VALUES
(2, '1651060888', 'MH2', 1, 2, 8),
(3, '1651060888', 'MH3', 1, 1, 6),
(1, '1651060891', 'MH1', 1, 1, 10),
(7, '1651060891', 'MH2', 1, 1, 6),
(6, '1651060891', 'MH3', 1, 1, 8),
(5, '1651060891', 'MH4', 2, 1, 3),
(4, '1651060891', 'MH5', 1, 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `id` int(5) NOT NULL,
  `TenMH` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MaMH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `ngayhoc` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `diadiem` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `giangvien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siso` int(3) NOT NULL,
  `MaKH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaK` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`id`, `TenMH`, `MaMH`, `ngayhoc`, `ngayketthuc`, `diadiem`, `giangvien`, `siso`, `MaKH`, `MaK`) VALUES
(3, 'Cơ sở dữ liệu', 'MH2', '2019-01-10', '2019-01-31', '423A2', 'Trần Mạnh Tuấn', 70, 'KH1', 'K1'),
(4, 'Kiến trúc máy tính', 'MH5', '2019-01-10', '2019-01-30', '323A2', 'Đàm Văn Bình', 50, 'KH1', 'K1'),
(6, 'Lập trình web', 'MH1', '2019-01-10', '2019-03-20', '212A5', 'Phạm Quang Nghĩa', 69, 'KH1', 'K1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hedaotao`
--

CREATE TABLE `hedaotao` (
  `id` int(5) NOT NULL,
  `MaHDT` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenHDT` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hedaotao`
--

INSERT INTO `hedaotao` (`id`, `MaHDT`, `TenHDT`) VALUES
(1, 'HDT1', 'Chính quy'),
(2, 'HDT2', 'Cao đẳng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id` int(5) NOT NULL,
  `MaK` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoCanBo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id`, `MaK`, `TenK`, `SoCanBo`) VALUES
(2, 'K1', 'Công nghệ thông tin', 200),
(3, 'K2', 'Kinh tế', 100),
(4, 'K3', 'Cơ khí', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(5) NOT NULL,
  `MaKH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `MaKH`, `TenKH`) VALUES
(1, 'KH1', 'K58'),
(2, 'KH2', 'K57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(5) NOT NULL,
  `MaL` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SiSo` int(5) NOT NULL,
  `MaK` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHDT` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `MaL`, `TenL`, `SiSo`, `MaK`, `MaKH`, `MaHDT`) VALUES
(1, 'L1', '58TH3', 67, 'K1', 'KH1', 'HDT1'),
(2, 'L2', '58TH1', 60, 'K1', 'KH1', 'HDT1'),
(3, 'L3', '57TH2', 64, 'K1', 'KH2', 'HDT1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(5) NOT NULL,
  `MaMH` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenMH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoTinChi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id`, `MaMH`, `TenMH`, `SoTinChi`) VALUES
(1, 'MH1', 'Lập trình web', 3),
(2, 'MH2', 'Cơ sở dữ liệu', 3),
(3, 'MH3', 'Toán 1', 2),
(4, 'MH4', 'Lý 1', 3),
(5, 'MH5', 'Kiến trúc máy tính', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(5) NOT NULL,
  `MaSV` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenSV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `QueQuan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(12) NOT NULL,
  `MaL` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `MaSV`, `TenSV`, `GioiTinh`, `NgaySinh`, `QueQuan`, `Email`, `SDT`, `MaL`) VALUES
(10, '1', 'Phạm Văn Tấn', '1', '2020-06-10', 'hà nội', 'anhtan98abc12@gmail.com', 382134082, 'L2'),
(7, '1651060800', 'Nguyễn Thanh Tùng', '1', '2019-01-10', 'Nam Định', 'phamtan36511@gmail.com', 2147483647, 'L1'),
(5, '1651060811', 'Vũ Văn Bình', '1', '2019-01-10', 'Nam Định', 'anhtan98abc1@gmail.com', 1234567688, 'L2'),
(3, '1651060888', 'Vũ Mạnh Tuấn', '1', '2006-12-14', 'Thái Bình', 'phamtan365@gmail.com', 777585944, 'L1'),
(2, '1651060891', 'Phạm Văn Tấn', '1', '2019-01-09', 'Nam Định', 'anhtan98abc@gmail.com', 345445666, 'L1'),
(4, '1651060892', 'Đàm Văn Bình', '1', '2010-06-22', 'Hải Dương', 'phamtan365@gmail.com1', 2147483647, 'L2'),
(8, '2', 'Phạm Văn Tấn', '1', '2019-11-19', 'Số 175 Tây Sơn Trung Liệt Đống Đa Hà Nội 116705, Vietnam', 'phamtan365@gmail.co', 382134082, 'L3'),
(9, '3', 'Phạm Văn Tấn', '1', '2019-11-19', 'Số 175 Tây Sơn Trung Liệt Đống Đa Hà Nội 116705, Vietnam', 'phamtan365@gmail.c', 382134082, 'L1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `svdangky`
--

CREATE TABLE `svdangky` (
  `id` int(5) NOT NULL,
  `dadk` int(5) NOT NULL,
  `iddk` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaSV` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `svdangky`
--

INSERT INTO `svdangky` (`id`, `dadk`, `iddk`, `status`, `ngaydang`, `giodang`, `MaSV`, `tongtien`) VALUES
(9, 1, 3, 1, '2019-01-10', '9:00 PM', '1651060891', 825000),
(10, 1, 4, 1, '2019-01-10', '10:11 PM', '1651060891', 825000),
(11, 1, 6, 1, '2019-01-10', '10:11 PM', '1651060891', 825000),
(17, 2, 6, 1, '2019-01-11', '8:40 AM', '1651060800', 825000),
(18, 2, 3, 1, '2019-11-19', '9:11 PM', '3', 825000),
(19, 2, 6, 1, '2019-11-19', '9:12 PM', '3', 825000),
(20, 2, 4, 1, '2019-11-19', '9:12 PM', '3', 825000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaSV` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `taikhoan`, `matkhau`, `MaSV`, `quyen`) VALUES
(8, '01285655', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(11, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 0),
(9, '1651060800', '6512bd43d9caa6e02c990b0a82652dca', '1651060800', 0),
(1, '1651060811', 'c4ca4238a0b923820dcc509a6f75849b', '1651060811', 1),
(2, '1651060891', '202cb962ac59075b964b07152d234b70', '1651060891', 0),
(12, '2', 'c4ca4238a0b923820dcc509a6f75849b', '2', 0),
(13, '3', 'c4ca4238a0b923820dcc509a6f75849b', '3', 0),
(10, 'phamtan', '12ab76a11b47fa9056ebab83f76d2d62', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`MaSV`,`MaMH`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK6` (`MaMH`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`TenMH`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK8` (`MaKH`),
  ADD KEY `FK9` (`MaMH`),
  ADD KEY `FK10` (`MaK`);

--
-- Chỉ mục cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  ADD PRIMARY KEY (`MaHDT`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaK`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaL`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK1` (`MaK`),
  ADD KEY `FK2` (`MaKH`),
  ADD KEY `FK3` (`MaHDT`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMH`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK4` (`MaL`);

--
-- Chỉ mục cho bảng `svdangky`
--
ALTER TABLE `svdangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK11` (`iddk`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`taikhoan`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK7` (`MaSV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `svdangky`
--
ALTER TABLE `svdangky`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `FK6` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`);

--
-- Các ràng buộc cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`MaK`) REFERENCES `khoa` (`MaK`),
  ADD CONSTRAINT `FK8` FOREIGN KEY (`MaKH`) REFERENCES `khoahoc` (`MaKH`),
  ADD CONSTRAINT `FK9` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`MaKH`) REFERENCES `khoahoc` (`MaKH`),
  ADD CONSTRAINT `FK3` FOREIGN KEY (`MaHDT`) REFERENCES `hedaotao` (`MaHDT`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`MaL`) REFERENCES `lop` (`MaL`);

--
-- Các ràng buộc cho bảng `svdangky`
--
ALTER TABLE `svdangky`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`iddk`) REFERENCES `dangky` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
