/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : webnc

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 11/10/2022 00:06:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_brand
-- ----------------------------
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE `tbl_brand`  (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_create` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`brand_id`) USING BTREE,
  INDEX `brand_name`(`brand_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_brand
-- ----------------------------
INSERT INTO `tbl_brand` VALUES (1, 'Laptop Asus', '3ea50c94d6.png', 'fe5bc80fea.png', '2021-09-16 21:01:47');
INSERT INTO `tbl_brand` VALUES (5, 'Laptop MSI', '64fea56686.png', 'c1a6e1a3c6.png', '2021-09-16 21:01:47');
INSERT INTO `tbl_brand` VALUES (8, 'Macbook Pro', '17df2f39ce.png', 'c7dd8abbca.png', '2021-09-17 00:25:24');

-- ----------------------------
-- Table structure for tbl_cart
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE `tbl_cart`  (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cartId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_cart
-- ----------------------------
INSERT INTO `tbl_cart` VALUES (65, 3302, 'vj5lmdgja5vvgj0pob8vnbh346', 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T RTX 3070 8GB AMD Ryzen 9 5900HX 32GB 1TB SSD 15.6” IPS FHD 300Hz Perkey Win 10', '54200000', 1, '495bddb6a3.jpg');
INSERT INTO `tbl_cart` VALUES (68, 3302, 'hhuvf8pglamn70mbk32vsn2u0g', 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T RTX 3070 8GB AMD Ryzen 9 5900HX 32GB 1TB SSD 15.6” IPS FHD 300Hz Perkey Win 10', '54200000', 1, '495bddb6a3.jpg');

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer`  (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `ho` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `diachi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`, `email`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES (1, 'Nguyễn Thị', 'Thùy Linh', 'linhanh0206@gmail.com', '1', 'Nguộn B - TT Cao Thượng - Tân Yên - Bắc Giang', '0389011662');
INSERT INTO `tbl_customer` VALUES (10, 'Nguyễn', 'Khánh Linh', 'khanh16091', '1', 'Cao xá - Tân Yên - Bắc Giang', '0923617231');
INSERT INTO `tbl_customer` VALUES (11, 'Nguyễn', 'Hà Phương', 'phuongku1992', '1', 'Việt Yên - Bắc Giang', '0387489564');
INSERT INTO `tbl_customer` VALUES (12, 'Nguyễn', 'Văn Sang', 'tristana.nguyen@gmail.com', '1', 'Ngọc Châu - Tân Yên - Bắc Giang', '+84923617231');

-- ----------------------------
-- Table structure for tbl_hdh
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hdh`;
CREATE TABLE `tbl_hdh`  (
  `hdh_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`hdh_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_hdh
-- ----------------------------
INSERT INTO `tbl_hdh` VALUES ('Windows 10 Education');
INSERT INTO `tbl_hdh` VALUES ('Windows 10 Enterprise');
INSERT INTO `tbl_hdh` VALUES ('Windows 10 Home ');
INSERT INTO `tbl_hdh` VALUES ('Windows 10 Pro');
INSERT INTO `tbl_hdh` VALUES ('Windows 11 Pro');

-- ----------------------------
-- Table structure for tbl_nhanvien
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nhanvien`;
CREATE TABLE `tbl_nhanvien`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `diachi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ngaysinh` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chucvu` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quyen` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_nhanvien
-- ----------------------------
INSERT INTO `tbl_nhanvien` VALUES (3, 'Nguyễn Thùy Linh', 'Bắc Giang', '2001-02-06', 'Nhân viên', 1, '72f7b54c02.jpg', '0923617231', '1', NULL);
INSERT INTO `tbl_nhanvien` VALUES (4, 'Bùi Bích Ngọc', 'Lào Cai', '2001-02-06', 'Thủ quỹ', 2, '57edeb62c3.jpg', '0398221322', '1', NULL);

-- ----------------------------
-- Table structure for tbl_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `order_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE,
  CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------
INSERT INTO `tbl_order` VALUES (33, 1, 1, '24000000', 3, '2022-09-26 23:48:25', 'Nguộn B - TT Cao Thượng - Tân Yên - Bắc Giang', '0389011662', 'Nguyễn Thị Thùy Linh', '5f820afbe0');
INSERT INTO `tbl_order` VALUES (34, 1, 1, '54200000', 3, '2022-10-03 22:12:35', 'Nguộn B - TT Cao Thượng - Tân Yên - Bắc Giang', '0389011662', 'Nguyễn Thị Thùy Linh', '0990d942b9');
INSERT INTO `tbl_order` VALUES (35, 12, 1, '24000000', 2, '2022-10-04 21:53:12', 'Ngọc Châu - Tân Yên - Bắc Giang', '+84923617231', 'Nguyễn Văn Sang', '32ef48afcf');

-- ----------------------------
-- Table structure for tbl_order_details
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE `tbl_order_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NULL DEFAULT NULL,
  `id_sanpham` int(11) NULL DEFAULT NULL,
  `tensp` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `soluong` int(11) NULL DEFAULT NULL,
  `thanhtien` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_order_details
-- ----------------------------
INSERT INTO `tbl_order_details` VALUES (17, 33, 3301, 'Laptop Asus ROG Strix G15 G513IH-HN015T Geforce GTX 1650 4GB AMD R7 4800H 8GB 512GB 15.6″ 144Hz FHD IPS 4 Zones Win 10', 1, 24000000);
INSERT INTO `tbl_order_details` VALUES (18, 34, 3302, 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T RTX 3070 8GB AMD Ryzen 9 5900HX 32GB 1TB SSD 15.6” IPS FHD 300Hz Perkey Win 10', 1, 54200000);
INSERT INTO `tbl_order_details` VALUES (19, 35, 3301, 'Laptop Asus ROG Strix G15 G513IH-HN015T Geforce GTX 1650 4GB AMD R7 4800H 8GB 512GB 15.6″ 144Hz FHD IPS 4 Zones Win 10', 1, 24000000);

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product`  (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NULL DEFAULT NULL,
  `price_discount` int(11) NULL DEFAULT NULL,
  `sl_nhap` int(11) NULL DEFAULT NULL,
  `sp_daban` int(11) NULL DEFAULT NULL,
  `tonkho` int(11) NULL DEFAULT NULL,
  `brand` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tensp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tensp_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cpu` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cpu_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hedieuhanh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gpu` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gpu_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ram` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ram_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ssd` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ssd_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `manhinh` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `manhinh_shortcut` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wifi` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `banphim` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kichthuoc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `trongluong` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_1` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_2` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_3` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_4` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_5` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img_6` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time_created` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`product_id`) USING BTREE,
  INDEX `brand`(`brand`) USING BTREE,
  INDEX `hedieuhanh`(`hedieuhanh`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3375 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES (3301, 32000000, 24000000, 100, 34, 15, 'Laptop Asus', 'Laptop Asus ROG Strix G15 G513IH-HN015T Geforce GTX 1650 4GB AMD R7 4800H 8GB 512GB 15.6″ 144Hz FHD IPS 4 Zones Win 10', 'Laptop Asus ROG Strix G15 G513IH-HN015T ', 'AMD Ryzen 7-4800H (2.9GHz up to 4.2GHz, 8M Cache)', 'AMD Ryzen 7 4800H', 'Windows 10 Pro', 'NVIDIA Geforce GTX 1650Ti 4GB GDDR6', 'GTX 1650Ti', '8GB DDR4 (1 x 8GB) 3200MHz; 2 slots, up to 32GB', '8GB DDR4', '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '512GB SSD NVME', '15.6\" FHD (1920×1080) IPS, 144Hz', '15.6\" FHD', 'Intel Wi-Fi 6(Gig+)(802.11ax) + BT', 'RGB Perky Keyboard', '35.4(W) x 25.9(D) x 2.26 ~ 2.72(H) cm', '2.1 kg', '<h1 style=\"text-align: center;\"><a href=\"https://thenewxgear.com/san-pham/laptop-asus-rog-strix-g17-g713qr-k4148t/\"><strong>ASUS ROG STRIX G17 G713QR-K4148T</strong></a></h1>\r\n<h2 style=\"text-align: center;\">LÀM CHỦ CUỘC CHƠI</h2>\r\n<p class=\"c0\"><span class=\"c2\">Asus ROG Strix G17 G713QR-K4148T với CPU manh mẽ R9 5900HX và GPU GeForce RTX™ 3070 (115W TGP + 15W Dynamic Boost). Mọi hoạt động từ chơi game tới thao tác đa nhiệm đều nhanh và mượt mà. Chơi game chìm đắm trong từng chi tiết với tấm nền 2K 165Hz/3ms. Công nghệ Adaptive-Sync cho tựa game siêu mượt. Hệ thống tản nhiệt cao cấp giữ cho máy luôn mát mẻ dưới những thử thách cam go. Với bất kỳ game nào, bạn đều có thể có được những màn chơi hoàn hảo.</span></p>\r\n<p class=\"c0\"><span class=\"c2\">Năm nay, Strix G có thân máy nhỏ gọn hơn tới 5%. Trang bị chiếu nghỉ tay soft-touch dễ chịu. Viên pin 90Wh và sạc type-C cung cấp đủ năng lượng cho bạn trong mọi hành trình.</span></p>\r\n<p style=\"text-align: center;\">(Hình ảnh minh họa: sản phẩm ROG Strix G15. Phiên bản G17 sẽ có thêm bàn phím số và có kích thước lớn hơn)</p>\r\n<p class=\"c0\"><img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh3.googleusercontent.com/_A4uU7ATRbBpQuU3VY8uaOvjMDjZPTH7SiDEkuNt3vPLrtQ_ieYYm1JgHBNs-xorDTukdpTJyXzsDK_Cml3awijtLr4uW4mVvPbSwQo5OPdUu_4ObwAB3XLPAsKujRQQ37cCh_rm=s0\" alt=\"\" data-ll-status=\"loaded\" /></p>\r\n\r\n<div id=\"yrm-aAVfG\" class=\"yrm-content yrm-content-1 yrm-hide\" data-id=\"1\" data-show-status=\"true\" data-after-action=\"\">\r\n<div id=\"yrm-inner-content-yrm-aAVfG\" class=\"yrm-inner-content-wrapper yrm-cntent-1\">\r\n\r\n&nbsp;\r\n<h2 class=\"c0\" style=\"text-align: center;\"><span class=\"c3\">Hiệu năng mạnh mẽ</span></h2>\r\n<p class=\"c0\"><span class=\"c2\">Với hiệu suất đáng nể không có tựa games nào có thể làm khó ROG Strix G17. Máy cũng hỗ trợ 2 khe RAM DDR4 3200MHz, max upto 64GB và 2 khe SSD M.2 PCIe.</span></p>\r\n<img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh5.googleusercontent.com/qgbyX0VBLbEEfEU-dUFwaCd_iKamukZd6QAEW3Py51IPU58wDPqMuIEcyS0gCW5RhgLmThaa5Jfqq8dT3WdRmLuG3uv-Z4zL7u67eYGDf4Z0CNui6W-GMwLqa-QQfN-jG7iop8kV=s0\" alt=\"\" data-ll-status=\"loaded\" />\r\n<h2 class=\"c0\" style=\"text-align: center;\"><span class=\"c3\">Tản nhiệt siêu khủng</span></h2>\r\n<p class=\"c0\"><span class=\"c2\">Khả năng làm mát đột phá với keo tản nhiệt kim loại lỏng trên CPU. Hệ thống sẽ hoạt động mát hơn keo tản nhiệt gốm truyền thống. Hệ thống tản nhiệt lên đến 6 ống đồng và 4 khe tản nhiệt có kích thước lớn. Nhờ đó, ROG Strix series có thể hoạt động mạnh – mát – êm ái. Độ ồn không quá 45dB ở chế độ turbo, yên tĩnh hơn so với các sản phẩm đối thủ.</span></p>\r\n<img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh5.googleusercontent.com/UUUNywUQx6WhUeeKdYVfyBLw8xcrdZ-HwSuP0FJGhEngIMfLkVumC2S2DMbViNZrKcpGygEXQ8BVS15HEIYY5nsidh9sWH_LOcl47v9FWxzv0dJX4dOcED49ZXteLRIQYgJ7jHGL=s0\" alt=\"\" data-ll-status=\"loaded\" />\r\n<h2 style=\"text-align: center;\"><span class=\"c3\">Chiến game tốc độ cao siêu mượt</span></h2>\r\n<p class=\"c0 c1\"><span class=\"c2\">Chiến game mượt mà với màn hình 2K 165Hz với Adaptive-Sync giúp triệt tiêu hiện tượng xé hình. Viền mỏng 4,5mm ở 3 cạnh giúp giảm tối đa sự phân tâm, cho trải nghiệm đắm chìm.</span></p>\r\n<img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh6.googleusercontent.com/Hm5lF_Az_kOBwjijq4hOlzHfsVj4wShy9L4NaGeRW8dhBtuBI7sP6yV132sbe3EUaVwEdIj4JVEeFrfbEhndLAV3BvaeV4cpARpPvLfavsz2Cnw7Q_DL1bb4hz5-vRtUq_MIIRLB=s0\" alt=\"\" data-ll-status=\"loaded\" />\r\n<h2 style=\"text-align: center;\"><span class=\"c3\">Tỏa sáng với đèn LED RGB rực rỡ</span></h2>\r\n<p class=\"c0\"><span class=\"c2\">Khẳng định cá tính của người dùng với hệ thống đèn LED đa màu sắc nổi bật tại viền mặt đáy của máy. Cũng như đèn bàn phím RGB Per-Key độc đáo. Người dùng có thể dễ dàng tùy chỉnh. Mặt lưng nhôm cứng cáp cho khung máy bóng bẩy với thân máy nhỏ hơn tới 7% so với thế hệ trước. Chiếu nghỉ tay phủ vật liệu soft-touch dễ chịu.</span></p>\r\n<p class=\"c0 c1\"><img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh5.googleusercontent.com/yc1BxSpeO_at_mDb3SiW5e3NGjBpC0eJj_qaq_oPZEigC2vUit7COtd2Rs3OO0uFLaB2R2zmvS-FQ51CVmuwnXVyQVOMVDcd6yRo8kuGv23FJjbNfvYN7b_oc2C-JHru84Zatjtw=s0\" alt=\"\" data-ll-status=\"loaded\" /></p>\r\n\r\n<h2 style=\"text-align: center;\"><span class=\"c3\">Luôn sẵn sàng cho mọi hành trình</span></h2>\r\n<p class=\"c0\"><span class=\"c2\">Viên pin 90Wh cung cấp đủ năng lượng để làm việc dài trong ngày. Sạc chuẩn Type-C cho phép kéo dài thời gian sử dụng từ các bộ sạc tương thích.</span></p>\r\n<p class=\"c0\"><img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh5.googleusercontent.com/qFJ8LFQB-zyvaSNgXZexkNGk_rZLTVi2tU9h2Q0weiZ-KcDNi6xHZcl6glCBIYISG-91z03oSMUI9SwudvC9TtfxlxTa8-joPDG__Dlytq4pzqrVf0gCWUtkU5WYzC7tXLeUowrx=s0\" alt=\"\" data-ll-status=\"loaded\" /></p>\r\n\r\n<h2 class=\"c0\" style=\"text-align: center;\"><span class=\"c3\">Âm thanh trong trẻo</span></h2>\r\n<p class=\"c0 c1\"><span class=\"c2\">Loa kép được hỗ trợ bởi Dolby Atmos mang đến âm thanh vòm với chất lượng như phòng thu. Tính năng chống ồn AI hai chiều đảm bảo việc ghi âm giọng nói rõ ràng để phát trực tuyến và hơn thế nữa.</span></p>\r\n<img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh4.googleusercontent.com/NaCq5vveBGaMVo6DEYPO-lMDrhhADOvEo10W--cK0bFVw9JB0Jk_r2HDFxR_bUP-WsvOtJ_Wg2H-JmjPCikZnW4cqShE6KMkIkxtdn9FZ86smVd3nXzergL-_wKjzm81Lz-G-pPD=s0\" alt=\"\" data-ll-status=\"loaded\" />\r\n<h2 class=\"c0\" style=\"text-align: center;\"><span class=\"c3\">Mở rộng bảo hành dễ dàng</span></h2>\r\n<p class=\"c0\"><span class=\"c2\">Với dịch vụ ASUS Premium Care, người dùng có thể dễ dàng mua thêm một năm bảo hành chỉ với giá $100 thông qua công cụ MYASUS được cài đặt sẵn trên thiết bị</span></p>\r\n<p class=\"c0 c1\"><img class=\"aligncenter lazyloaded\" title=\"\" src=\"https://lh3.googleusercontent.com/9vd6X1W6eKoKS472V09MdhP0Ly3nfsIJEKNF0trRwd8VlmL5vy10uJe8N-IpTrarlLemzXh4xhbkpMceWEI4lOxsDjd5wOHAIi1Zap0KkusOu6NJhpQvl3XXxbazUuY4N5VUfL50=s0\" alt=\"\" data-ll-status=\"loaded\" /></p>\r\n\r\n</div>\r\n</div>', '0d6479f1ca.jpg', 'eb0c23bcc7.jpg', '7a615099a4.jpg', '6139fbdba5.jpg', 'd208b99613.jpg', '82889383e3.jpg', '23a98cc492.jpg', '2022-10-10 23:29:12');
INSERT INTO `tbl_product` VALUES (3302, 65700000, 54200000, 20, 29, 74, 'Laptop Asus', 'Laptop Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T RTX 3070 8GB AMD Ryzen 9 5900HX 32GB 1TB SSD 15.6” IPS FHD 300Hz Perkey Win 10', 'Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T ', 'AMD Ryzen 9-5900HX  (3.3GHz up to 4.6GHz, 16M Cache)', 'AMD Ryzen 9-5900HX', 'Windows 10 Pro', 'NVIDIA Geforce RTX 3070 8GB GDDR6', 'RTX 3070', '32GB DDR4 (16GB 2933Hz, 16GB Onboard)', '32GB DDR4', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB SSD NVME', '15.6\" FHD (1920×1080) IPS, 300Hz', '15.6\" FHD', '802.11ac 2×2 Wi-Fi, Bluetooth 4.1', 'RGB Perky Keyboard', '36.0 x 26.8 x 2.09 ~ 2.09 cm (W x D x H)', '2.5 kg', '', '495bddb6a3.jpg', 'b96a8d198d.jpg', '9174ae8165.jpg', 'e316ed37e3.jpg', 'e00348476e.jpg', '26a508454f.jpg', '8f16161135.jpg', '2022-10-10 23:29:13');
INSERT INTO `tbl_product` VALUES (3303, 65700000, 54200000, 20, 10, 95, 'Laptop Asus', 'Lap này là laptop dellđâsd00000000000000000000000000000000000000000000000000000000000000000000000000000', 'Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T ', 'AMD Ryzen 9-5900HX  (3.3GHz up to 4.6GHz, 16M Cache)', 'AMD Ryzen 9-5900HX', 'Windows 10 Pro', 'NVIDIA Geforce RTX 3070 8GB GDDR6', 'RTX 3070', '32GB DDR4 (16GB 2933Hz, 16GB Onboard)', '32GB DDR4', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB SSD NVME', '15.6\" FHD (1920×1080) IPS, 300Hz', '15.6\" FHD', '802.11ac 2×2 Wi-Fi, Bluetooth 4.1', 'RGB Perky Keyboard', '36.0 x 26.8 x 2.09 ~ 2.09 cm (W x D x H)', '2.5 kg', '', '495bddb6a3.jpg', 'b96a8d198d.jpg', '9174ae8165.jpg', 'e316ed37e3.jpg', 'e00348476e.jpg', '26a508454f.jpg', '8f16161135.jpg', '2022-10-10 23:29:14');
INSERT INTO `tbl_product` VALUES (3304, 65700000, 54200000, 20, 7, 95, 'Laptop Asus', 'Lap này là HP00000000000000000000000000000000000000000000000000000000000000000000000000000', 'Asus ROG Zephyrus Duo 15 SE GX551QR-HF080T ', 'AMD Ryzen 9-5900HX  (3.3GHz up to 4.6GHz, 16M Cache)', 'AMD Ryzen 9-5900HX', 'Windows 10 Pro', 'NVIDIA Geforce RTX 3070 8GB GDDR6', 'RTX 3070', '32GB DDR4 (16GB 2933Hz, 16GB Onboard)', '32GB DDR4', '1TB SSD NVMe M.2 PCIe Gen 3 x 4', '1TB SSD NVME', '15.6\" FHD (1920×1080) IPS, 300Hz', '15.6\" FHD', '802.11ac 2×2 Wi-Fi, Bluetooth 4.1', 'RGB Perky Keyboard', '36.0 x 26.8 x 2.09 ~ 2.09 cm (W x D x H)', '2.5 kg', '', '495bddb6a3.jpg', 'b96a8d198d.jpg', '9174ae8165.jpg', 'e316ed37e3.jpg', 'e00348476e.jpg', '26a508454f.jpg', '8f16161135.jpg', '2022-10-10 23:29:15');

-- ----------------------------
-- Table structure for tbl_thongke
-- ----------------------------
DROP TABLE IF EXISTS `tbl_thongke`;
CREATE TABLE `tbl_thongke`  (
  `thang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doanhthu` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_thongke
-- ----------------------------
INSERT INTO `tbl_thongke` VALUES ('Tháng 1', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 2', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 3', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 4', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 5', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 6', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 7', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 8', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 9', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 10', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 11', NULL);
INSERT INTO `tbl_thongke` VALUES ('Tháng 12', NULL);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ho` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Nguyễn', 'Văn Sang', '0923617231', 'admin', 'admin', 'avt.jpg');

-- ----------------------------
-- Triggers structure for table tbl_order_details
-- ----------------------------
DROP TRIGGER IF EXISTS `capnhatsoluong1`;
delimiter ;;
CREATE TRIGGER `capnhatsoluong1` AFTER INSERT ON `tbl_order_details` FOR EACH ROW BEGIN
    UPDATE tbl_product
		INNER JOIN tbl_order_details ON tbl_product.product_id = tbl_order_details.id_sanpham
		SET sp_daban = sp_daban + (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY tbl_order_details.id DESC LIMIT 1 ),
			tonkho = tonkho - (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY  tbl_order_details.id DESC LIMIT 0,1);
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_order_details
-- ----------------------------
DROP TRIGGER IF EXISTS `capnhatsoluong`;
delimiter ;;
CREATE TRIGGER `capnhatsoluong` AFTER UPDATE ON `tbl_order_details` FOR EACH ROW BEGIN
    UPDATE tbl_product
		INNER JOIN tbl_order_details ON tbl_product.product_id = tbl_order_details.id_sanpham
		SET sp_daban = sp_daban + (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY tbl_order_details.id DESC LIMIT 1 ),
			tonkho = tonkho - (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY  tbl_order_details.id DESC LIMIT 0,1);
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_order_details
-- ----------------------------
DROP TRIGGER IF EXISTS `capnhatsoluong2`;
delimiter ;;
CREATE TRIGGER `capnhatsoluong2` AFTER DELETE ON `tbl_order_details` FOR EACH ROW BEGIN
    UPDATE tbl_product
		INNER JOIN tbl_order_details ON tbl_product.product_id = tbl_order_details.id_sanpham
		SET sp_daban = sp_daban + (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY tbl_order_details.id DESC LIMIT 1 ),
			tonkho = tonkho - (SELECT soluong FROM tbl_order_details WHERE tbl_order_details.id_sanpham=tbl_product.product_id   ORDER BY  tbl_order_details.id DESC LIMIT 0,1);
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
