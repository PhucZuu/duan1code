-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bienthe`
--

CREATE TABLE `bienthe` (
  `id_bien_the` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `id_kichco` int(10) NOT NULL,
  `id_mausac` int(10) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(11) NOT NULL,
  `giam_gia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bienthe`
--

INSERT INTO `bienthe` (`id_bien_the`, `id_sanpham`, `id_kichco`, `id_mausac`, `gia`, `so_luong`, `giam_gia`) VALUES
(1, 1, 1, 3, 20000, 100, 20),
(5, 1, 5, 5, 20000, 97, 20),
(6, 2, 2, 9, 30000, 100, 10),
(7, 2, 5, 3, 30000, 80, 20),
(8, 3, 2, 1, 30000, 50, 0),
(9, 3, 2, 2, 30000, 15, 0),
(10, 4, 1, 9, 40000, 10, 5),
(11, 1, 1, 1, 20000, 10, 20),
(12, 2, 2, 1, 30000, 10, 10),
(13, 3, 1, 9, 30000, 15, 0),
(14, 1, 2, 3, 20000, 100, 10),
(15, 5, 1, 2, 45000, 200, 0),
(16, 5, 2, 2, 45000, 200, 0),
(17, 5, 3, 2, 45000, 200, 0),
(18, 5, 4, 2, 45000, 200, 0),
(19, 5, 5, 2, 45000, 200, 0),
(20, 6, 1, 2, 30000, 199, 10),
(21, 6, 2, 2, 30000, 200, 10),
(22, 6, 3, 2, 30000, 200, 10),
(23, 6, 4, 2, 30000, 200, 10),
(24, 7, 1, 1, 24000, 99, 0),
(25, 7, 2, 1, 24000, 100, 0),
(26, 7, 3, 1, 24000, 100, 0),
(27, 7, 5, 1, 24000, 100, 0),
(28, 8, 1, 2, 24000, 100, 0),
(29, 8, 2, 2, 24000, 100, 0),
(30, 8, 4, 2, 24000, 100, 0),
(31, 5, 2, 4, 45000, 200, 0),
(32, 5, 3, 4, 45000, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binh_luan` int(10) NOT NULL,
  `noi_dung` text NOT NULL,
  `id_nguoidung` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `ngay_binh_luan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_binh_luan`, `noi_dung`, `id_nguoidung`, `id_sanpham`, `ngay_binh_luan`) VALUES
(1, 'áo chất lượng, mặc rất thoải mái', 1, 1, '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_ct_don_hang` int(10) NOT NULL,
  `id_bienthe` int(10) NOT NULL,
  `id_donhang` int(10) NOT NULL,
  `gia` float NOT NULL,
  `so_luong` int(10) NOT NULL,
  `thanh_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_ct_don_hang`, `id_bienthe`, `id_donhang`, `gia`, `so_luong`, `thanh_tien`) VALUES
(41, 11, 41, 16000, 1, 16000),
(42, 1, 42, 16000, 1, 16000),
(43, 9, 43, 30000, 2, 60000),
(45, 10, 45, 38000, 2, 76000),
(46, 5, 46, 16000, 3, 48000),
(47, 24, 47, 24000, 1, 24000),
(48, 20, 47, 27000, 1, 27000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danh_muc` int(10) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `kich_hoat` bit(5) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danh_muc`, `ten_danh_muc`, `kich_hoat`) VALUES
(1, 'Áo', b'00001'),
(2, 'Quần', b'00001'),
(6, 'Áo dài', b'00001'),
(7, 'Quần dài', b'00001');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_don_hang` int(10) NOT NULL,
  `id_trangthai` int(10) NOT NULL,
  `ho_va_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `thanh_toan` int(10) NOT NULL,
  `giam_gia` varchar(255) DEFAULT NULL,
  `ngay_dat_hang` date NOT NULL DEFAULT current_timestamp(),
  `tong_thanh_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_don_hang`, `id_trangthai`, `ho_va_ten`, `email`, `so_dien_thoai`, `dia_chi`, `thanh_toan`, `giam_gia`, `ngay_dat_hang`, `tong_thanh_tien`) VALUES
(41, 6, 'Phúc', 'phuc@gmail.com', '0975674635', 'Ba Vì Hà Nội', 1, NULL, '2024-04-04', 16000),
(42, 1, 'Phúc', 'phuc@gmail.com', '0975674635', 'Ba Vì Hà Nội', 2, NULL, '2024-04-04', 16000),
(43, 3, 'Lê Đình Phúc', 'admin123@gmail.com', '0983456289', 'Hà Nội', 2, NULL, '2024-04-04', 60000),
(45, 1, 'Lê Đình Phúc', 'admin123@gmail.com', '0983456289', 'Hà Nội', 2, NULL, '2024-04-04', 76000),
(46, 1, 'Nguyen Van A', 'nva@gmail.com', '0987654345', 'Ba Vi', 1, NULL, '2024-04-05', 48000),
(47, 1, 'Nguyen Van B', 'nvb@gmaill.com', '0567456789', 'Hà Nội', 1, NULL, '2024-04-06', 51000);

-- --------------------------------------------------------

--
-- Table structure for table `kichco`
--

CREATE TABLE `kichco` (
  `id_kich_co` int(10) NOT NULL,
  `ten_kich_co` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kichco`
--

INSERT INTO `kichco` (`id_kich_co`, `ten_kich_co`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `id_mau_sac` int(10) NOT NULL,
  `ten_mau_sac` varchar(255) NOT NULL,
  `ma_mau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`id_mau_sac`, `ten_mau_sac`, `ma_mau`) VALUES
(1, 'Đen', '#000000'),
(2, 'Trắng', '#FFFFFF'),
(3, 'Đỏ', '#FF0000'),
(4, 'Xanh dương', '#0000FF'),
(5, 'Vàng', '#FFFF00'),
(6, 'Xanh lá cây', '#00FF00'),
(7, 'Xám', '#C0C0C0'),
(8, 'Nâu', '#CC6633'),
(9, 'Hồng', '#FF6699');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoi_dung` int(10) NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_va_ten` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT 0,
  `kich_hoat` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `ho_va_ten`, `hinh_anh`, `email`, `so_dien_thoai`, `dia_chi`, `vai_tro`, `kich_hoat`) VALUES
(1, 'admin', '123', 'Lê Đình Phúc', 'avatar.jpg', 'admin123@gmail.com', '0983456289', 'Hà Nội', 1, b'1'),
(2, 'phucle', '123123', 'Phúc', 'avatar_pikachu.jpg', 'phuc@gmail.com', '0975674635', 'Ba Vì Hà Nội', 0, b'1'),
(3, 'loguser', '123', 'Hoàng', NULL, 'hoang@gmail.com', '0674876345', 'Hà Nam', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_san_pham` int(10) NOT NULL,
  `id_danhmuc` int(10) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `luot_xem` int(10) NOT NULL DEFAULT 0,
  `kich_hoat` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_san_pham`, `id_danhmuc`, `ten_san_pham`, `hinh_anh`, `mo_ta`, `luot_xem`, `kich_hoat`) VALUES
(1, 1, 'Áo sơ mi', 'aosomi.png', 'Chất liệu 100% cotton', 90, b'1'),
(2, 2, 'Quần lụa tím', 'quan.png', 'Chất liệu 100% cotton, mỏng nhẹ, thoáng mát', 11, b'1'),
(3, 1, 'Áo sơ mi 2', 'aosomi2.png', 'Chất liệu 100% cotton, siêu bền', 24, b'1'),
(4, 1, 'Áo vải', 'aotim.png', 'Chất liệu mỏng, nhẹ, thoáng mát', 18, b'1'),
(5, 1, 'Áo sơ mi hoa văn', 'showcase-img-6.png', 'Chất liệu mỏng nhẹ, thoáng mát', 0, b'1'),
(6, 2, 'Quần lụa trắng', 'product-4-1 1.png', 'Quần lụa đẹp', 0, b'1'),
(7, 2, 'Quần hoa đen', 'product-11-2 1.png', 'Chất liệu mỏng nhẹ', 1, b'1'),
(8, 2, 'Quần hoa trắng', 'product-11-1 1.png', 'Màu sắc tươi sáng', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id_thanh_toan` int(10) NOT NULL,
  `trang_thai_thanh_toan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhtoan`
--

INSERT INTO `thanhtoan` (`id_thanh_toan`, `trang_thai_thanh_toan`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `id_trang_thai` int(10) NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`id_trang_thai`, `ten_trang_thai`) VALUES
(1, 'Chờ xử lý'),
(2, 'Chờ lấy hàng'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Hủy đơn hàng'),
(6, 'Giao hàng thành công'),
(7, 'Yêu cầu trả hàng'),
(8, 'Giao hàng không thành công');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bienthe`
--
ALTER TABLE `bienthe`
  ADD PRIMARY KEY (`id_bien_the`),
  ADD KEY `fk_bienthe_sanpham` (`id_sanpham`),
  ADD KEY `fk_bienthe_mausac` (`id_mausac`),
  ADD KEY `fk_bienthe_kichco` (`id_kichco`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `fk_binhluan_sanpham` (`id_sanpham`),
  ADD KEY `fk_binhluan_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_ct_don_hang`),
  ADD KEY `fk_chitiet_bienthe` (`id_bienthe`),
  ADD KEY `id_chitiet_donhang` (`id_donhang`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `fk_donhang_trangthai` (`id_trangthai`),
  ADD KEY `fk_donhang_thanhtoan` (`thanh_toan`);

--
-- Indexes for table `kichco`
--
ALTER TABLE `kichco`
  ADD PRIMARY KEY (`id_kich_co`);

--
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`id_mau_sac`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoi_dung`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `fk_sanpham_danhmuc` (`id_danhmuc`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id_thanh_toan`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id_trang_thai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bienthe`
--
ALTER TABLE `bienthe`
  MODIFY `id_bien_the` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binh_luan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_ct_don_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danh_muc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_don_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kichco`
--
ALTER TABLE `kichco`
  MODIFY `id_kich_co` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `id_mau_sac` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoi_dung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_san_pham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id_thanh_toan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id_trang_thai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bienthe`
--
ALTER TABLE `bienthe`
  ADD CONSTRAINT `fk_bienthe_kichco` FOREIGN KEY (`id_kichco`) REFERENCES `kichco` (`id_kich_co`),
  ADD CONSTRAINT `fk_bienthe_mausac` FOREIGN KEY (`id_mausac`) REFERENCES `mausac` (`id_mau_sac`),
  ADD CONSTRAINT `fk_bienthe_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_san_pham`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoi_dung`),
  ADD CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_san_pham`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chitiet_bienthe` FOREIGN KEY (`id_bienthe`) REFERENCES `bienthe` (`id_bien_the`),
  ADD CONSTRAINT `id_chitiet_donhang` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_don_hang`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_thanhtoan` FOREIGN KEY (`thanh_toan`) REFERENCES `thanhtoan` (`id_thanh_toan`),
  ADD CONSTRAINT `fk_donhang_trangthai` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthai` (`id_trang_thai`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danh_muc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
