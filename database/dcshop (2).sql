-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 06:27 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dcshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sodienthoai` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `thongtin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`, `hoten`, `hinhanh`, `email`, `sodienthoai`, `diachi`, `thongtin`) VALUES
(1, 'haoadmin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Hào Đoàn Chính', '1699287741_bb0f954154861e87dc310330edf780eb.jpg', 'Haodoan093@gmail.com', '0346523128', 'Bắc từ Liêm , Hà Nội', 'Studied Công Nghệ Thông Tin at Trường Đại học Tài nguyên và Môi trường Hà Nội - HUNRE\r\n\r\nWent to Trường THPT Đại Cường\r\n\r\nLives in Hanoi, Vietnam\r\n\r\nSingle\r\n\r\nFollowed by 968 people'),
(2, 'admin', '1', 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id_baiviet` int(11) NOT NULL,
  `tenbaiviet` varchar(200) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tomtat` mediumtext NOT NULL DEFAULT '',
  `noidung` longtext NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id_baiviet`, `tenbaiviet`, `hinhanh`, `tomtat`, `noidung`, `id_danhmuc`, `tinhtrang`) VALUES
(2, 'FEELIN CLASSY - ĐÓN ĐẦU XU HƯỚNG THỜI TRANG VÀ BẬT CHẾ ĐỘ ẤM ', '1699269168_46d792c11884c583a04b9b1fe745964e.jpg', '<p>Với Ch&acirc;u Gia, c&aacute;c thiết kế l&agrave; cộng hưởng của hơi thở truyền thống qu&yacute; gi&aacute; qua những họa tiết th&ecirc;u tay k&igrave; c&ocirc;ng v&agrave; tỉ mỉ, c&ugrave;ng với đ&oacute; l&agrave; sự bay bổng về phom d&aacute;ng, đường xếp nếp mềm mại đầy xu hướng gi&uacute;p n&agrave;ng khoe n&eacute;t y&ecirc;u kiều một c&aacute;ch đầy t&igrave;nh tứ.</p>\r\n', '<h1><strong>CH&Acirc;U GIA - CUỐN H&Uacute;T NHƯ NGỌC QU&Yacute; C&Ugrave;NG CỐT C&Aacute;CH CAO SANG, Đ&Agrave;I C&Aacute;C TRONG TẤM &Aacute;O D&Agrave;I IVY moda</strong></h1>\r\n\r\n<p>22/11/2022</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/22/0d16ce1ecacce4bebb105f01f99b6f1b.JPG\" style=\"height:534px; width:800px\" /><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/22/af7ccc90bc0b8fdf6e4f56ab373b9239.jpg\" style=\"height:8px; width:12px\" /></p>\r\n\r\n<h3>Với Ch&acirc;u Gia, c&aacute;c thiết kế l&agrave; cộng hưởng của hơi thở truyền thống qu&yacute; gi&aacute; qua những họa tiết th&ecirc;u tay k&igrave; c&ocirc;ng v&agrave; tỉ mỉ, c&ugrave;ng với đ&oacute; l&agrave; sự bay bổng về phom d&aacute;ng, đường xếp nếp mềm mại đầy xu hướng gi&uacute;p n&agrave;ng khoe n&eacute;t y&ecirc;u kiều một c&aacute;ch đầy t&igrave;nh tứ.</h3>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/22/51f088cf3b6c0c9ba71f4ee72e418001.png\" style=\"height:888px; width:1200px\" /></p>\r\n\r\n<h3>Đặc biệt, th&ocirc;ng qua chi tiết &#39;kh&aacute;nh&#39; ở eo duy&ecirc;n d&aacute;ng mang tinh hoa xưa được c&aacute;c nh&agrave; thiết kế g&igrave;n giữ một c&aacute;ch tr&acirc;n qu&yacute;, c&aacute;ch t&acirc;n th&ecirc;m logo thương hiệu đ&atilde; khẳng định n&eacute;t đặc trưng đậm tuy&ecirc;n ng&ocirc;n thời trang ri&ecirc;ng.</h3>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/22/4fede7c754233ce819482681408791f7.png\" style=\"height:888px; width:1200px\" /></p>\r\n\r\n<h3>Điểm nhấn của chiếc &aacute;o d&agrave;i nằm ở&nbsp;đường cắt may tinh xảo tạo kiểu vai phồng h&igrave;nh b&aacute;n nguyệt, chi tiết cut-out&nbsp;c&ugrave;ng khuy đ&iacute;nh ngọc trai th&ecirc;m vẻ&nbsp;sang trọng,&nbsp;cổ điển.</h3>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/22/bcde435dca247fe6024c7f96278005e4.jpg\" style=\"height:800px; width:1200px\" /></p>\r\n\r\n<p><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></p>\r\n', 8, 1),
(5, 'PREMIUM COLLECTION: MERINO WOOL - LOẠI LEN THƯỢNG HẠNG BẬC NHẤT THẾ GIỚI', '1696230958_fd5dfa990dead559101de91ffd63e19a.jpg', '<p>100% L&Ocirc;NG CỪU TINH KHIẾT ĐƯỢC CHỨNG NHẬN BỞI THE WOOLMARK COMPANY - Tổ chức uy t&iacute;n h&agrave;ng đầu về thẩm định nguồn gốc &amp; kiểm so&aacute;t chất lượng.</p>\r\n', '<h1>PREMIUM COLLECTION: MERINO WOOL - LOẠI LEN THƯỢNG HẠNG BẬC NHẤT THẾ GIỚI</h1>\r\n\r\n<pre>\r\n02/12/2022</pre>\r\n\r\n<h3>MERINO WOOL - LOẠI LEN THƯỢNG HẠNG BẬC NHẤT THẾ GIỚI</h3>\r\n\r\n<h3>100% L&Ocirc;NG CỪU TINH KHIẾT ĐƯỢC CHỨNG NHẬN BỞI THE WOOLMARK COMPANY - Tổ chức uy t&iacute;n h&agrave;ng đầu về thẩm định nguồn gốc &amp; kiểm so&aacute;t chất lượng.</h3>\r\n\r\n<h3>WOOL COAT - &Aacute;O KHO&Aacute;C DẠ NGHỆ NH&Acirc;N: Kiệt t&aacute;c kh&acirc;u tay đẳng cấp nhất thị trường Việt.</h3>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/02/368c2a3af5d06e7e8d35a00882bd720f.JPG\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p>Trải qua những bước thực hiện tỉ mỉ v&agrave; trau chuốt trong từng chi tiết, mỗi thiết kế đều được kiểm định chất lượng nghi&ecirc;m ngặt với c&ocirc;ng đoạn xử l&yacute; thủ c&ocirc;ng h&agrave;ng trăm giờ đồng hồ. C&aacute;c mũi kh&acirc;u tinh tế, phom d&aacute;ng chuẩn từng centimet mang đến đẳng cấp kh&aacute;c biệt - sản phẩm thủ c&ocirc;ng nhưng v&ocirc; c&ugrave;ng hiện đại.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/02/38b090b062be61142951b6489f480290.png\" style=\"height:592px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/02/e5cd78dd5c047d9b564eec0882d229bc.png\" style=\"height:592px; width:800px\" /></p>\r\n\r\n<p>LEN L&Ocirc;NG CỪU - Tuyệt phẩm từ sợi Merino trứ danh</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/02/19bf2c5e648d8b1b8a502d91821f30ae.JPG\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<h3>Kh&ocirc;ng chỉ đề cao t&iacute;nh xu hướng với kiểu d&aacute;ng sang trọng, m&agrave;u sắc đa dạng, IVY moda đ&atilde; v&agrave; đang tr&ecirc;n con đường truyền cảm hứng về những gi&aacute; trị bền vững vượt thời gian th&ocirc;ng qua nguy&ecirc;n liệu thượng hạng. Đặc biệt th&acirc;n thiện m&ocirc;i trường với h&agrave;nh tr&igrave;nh của sợi len ho&agrave;n to&agrave;n tự nhi&ecirc;n, tạo ra sản phẩm c&oacute; tuổi thọ l&ecirc;n đến 20 năm.</h3>\r\n\r\n<h3><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/02/12721b46bd63af704e053a90460bbe3b.JPG\" style=\"height:534px; width:800px\" />H&atilde;y xem ngay BST&nbsp;<a href=\"https://ivymoda.com/danh-muc/merino-wool\" target=\"_blank\">MERINO WOOL</a>&nbsp;để nhanh tay sở hữu những&nbsp;thiết kế xu hướng c&ugrave;ng chất liệu trứ danh số 1 thế giới n&agrave;ng nh&eacute;!</h3>\r\n', 8, 1),
(6, 'FEELIN CLASSY - ĐÓN ĐẦU XU HƯỚNG THỜI TRANG VÀ BẬT CHẾ ĐỘ ẤM ÁP', '1695657274_423c529e4cb195591068c0c096bdaa53.jpg', '<p>M&ugrave;a Thu/Đ&ocirc;ng 2022, IVY moda kh&ocirc;ng ngừng tiến bước khi tr&igrave;nh l&agrave;ng c&aacute;c thiết kế len/jeans mang phi&ecirc;n bản ho&agrave;n to&agrave;n mới, dẫn đầu xu hướng th&ocirc;ng qua những chi tiết, họa tiết, chất liệu...cao cấp &amp; thịnh h&agrave;nh nhất.</p>\r\n', '<h1>Feelin&#39; Classy - Đ&oacute;n đầu xu hướng thời trang v&agrave; bật chế độ</h1>\r\n\r\n<p>15/11/2022</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/17/982da651df03f610ba4b4c98e4d0a606.JPG\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p>M&ugrave;a Thu/Đ&ocirc;ng 2022, IVY moda kh&ocirc;ng ngừng tiến bước khi tr&igrave;nh l&agrave;ng c&aacute;c thiết kế len/jeans mang phi&ecirc;n bản ho&agrave;n to&agrave;n mới, dẫn đầu xu hướng th&ocirc;ng qua những chi tiết, họa tiết, chất liệu...cao cấp &amp; thịnh h&agrave;nh nhất.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/15/cdd693380ac28e9edbb874d2d1e2b642.JPG\" style=\"height:534px; width:800px\" />Những sợi len cực mảnh với đặc t&iacute;nh giữ ấm, nhẹ nh&agrave;ng tr&ecirc;n từng điểm chạm l&agrave;n da v&agrave; c&oacute; độ đ&agrave;n hồi, co gi&atilde;n ho&agrave;n hảo mang đến cho người mặc sự thoải m&aacute;i dễ chịu.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/15/21733fb45480b3439de7c2ce47a68801.JPG\" style=\"height:534px; width:800px\" />&nbsp;Đặc biệt, c&aacute;c sản phẩm trong BST Feelin&#39; Classy được biến h&oacute;a ngoạn mục với kỹ thuật dệt độc đ&aacute;o tạo n&ecirc;n sự tinh tế, sang trọng thể hiện qua những thiết kế cardigan, co-ords hay &aacute;o len cao cổ,...</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/15/0065c9da46063bdd8ff8d0d0b5bbeaa3.JPG\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p>Set đồ mang đến sự tươi trẻ v&agrave; tr&agrave;n đầy cảm hứng cho những ng&agrave;y thu/đ&ocirc;ng với sắc t&iacute;m nổi bật v&agrave; ngọt ng&agrave;o. Thiết kế với kiểu d&aacute;ng thanh lịch, &ocirc;m nhẹ cơ thể gi&uacute;p t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng v&agrave; đường cong của ph&aacute;i đẹp. Đặc biệt l&agrave; chi tiết len nổi vặn thừng độc đ&aacute;o cho n&agrave;ng vẻ đẹp sang trọng v&agrave; tinh tế.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/11/15/7c59580e144d365c0b115269f3bc6b7d.JPG\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p>H&atilde;y kh&aacute;m ph&aacute;&nbsp;bộ BST&nbsp;<a href=\"https://ivymoda.com/danh-muc/Felling-Classy\" target=\"_blank\">Feelin&#39; Classy</a>&nbsp;ngay để sắm cho tủ đồ Thu Đ&ocirc;ng của n&agrave;ng những m&oacute;n đồ thời thượng nhất!</p>\r\n', 7, 1),
(8, 'ENCHANTED - THANH ÂM LÔI CUỐN TỪ VẺ ĐẸP NỮ TÍNH', '1699263721_43578e15bb694b27993dcabbfb63a45b.jpg', '<p>Bộ sưu tập mở ra kh&ocirc;ng gian tr&agrave;n ngập sắc hồng ngọt ng&agrave;o, thật kh&oacute; để rời mắt khỏi n&agrave;ng thơ của IVY moda khi mang hương vị của m&ugrave;a h&egrave; v&agrave;o trong từng thiết kế, khiến cho c&aacute;i nắng gắt trở n&ecirc;n dịu d&agrave;ng v&agrave; thanh &acirc;m b&ecirc;n trong n&agrave;ng được đ&aacute;nh thức.</p>\r\n', '<h1>ENCHANTED - THANH &Acirc;M L&Ocirc;I CUỐN TỪ VẺ ĐẸP NỮ T&Iacute;NH</h1>\r\n\r\n<p>12/05/2023</p>\r\n\r\n<p>Bộ sưu tập mở ra kh&ocirc;ng gian tr&agrave;n ngập sắc hồng ngọt ng&agrave;o, thật kh&oacute; để rời mắt khỏi n&agrave;ng thơ của IVY moda khi mang hương vị của m&ugrave;a h&egrave; v&agrave;o trong từng thiết kế, khiến cho c&aacute;i nắng gắt trở n&ecirc;n dịu d&agrave;ng v&agrave; thanh &acirc;m b&ecirc;n trong n&agrave;ng được đ&aacute;nh thức.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/05/12/e175c33c776571dd6c02eecd75cb151b.jpg\" /></p>\r\n\r\n<p>Say đắm trước vẻ đẹp thanh lịch v&agrave; dịu d&agrave;ng của n&agrave;ng thơ IVY moda, BST l&agrave; bản tuy&ecirc;n ng&ocirc;n tươi m&aacute;t với chất liệu ren cao cấp v&agrave; xu hướng. Chi tiết xếp nh&uacute;n trẻ trung trở th&agrave;nh điểm nhấn đầy s&ocirc;i động trong m&ugrave;a h&egrave; n&agrave;y. Đặc biệt, n&agrave;ng c&oacute; thể cảm nhận sự mềm mại, nhẹ t&ecirc;nh th&ocirc;ng qua từng cử động trong những thước h&igrave;nh dưới đ&acirc;y. V&agrave; h&atilde;y ngắm nh&igrave;n c&aacute;c thiết kế xu hướng đến từ thương hiệu nh&eacute;!</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/05/12/b45f92840260e466fd140ed0279be261.jpg\" /></p>\r\n\r\n<p>Nổi bật trong BST Enchanted l&agrave; sự xuất hiện của chất liệu ren xu hướng, kết hợp c&ugrave;ng lụa mềm sang trọng tạo n&ecirc;n những thiết kế đầy bay bổng m&agrave; thanh lịch. Đặc biệt, đừng bỏ qua những chi tiết xếp nh&uacute;n đặc sắc mang đến sự trẻ trung trong m&ugrave;a h&egrave;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/05/12/2c3a313ce6947836c5a62b2890811f9a.jpg\" /></p>\r\n\r\n<p>Đầm &ocirc;m ch&eacute;o vạt l&agrave; thiết kế c&aacute;ch điệu v&ocirc; c&ugrave;ng quyến rũ v&agrave; xu hướng, được may tr&ecirc;n nền vải ren cao cấp gi&uacute;p t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng v&agrave; mang đến sự thanh lịch, nữ t&iacute;nh cho người mặc.</p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/05/12/cbc86223fbaef59e08ab39b4acbdced2.jpg\" /></p>\r\n\r\n<p>Phối c&ugrave;ng với gi&agrave;y cao g&oacute;t v&agrave; phụ kiện điệu đ&agrave; để tạo n&ecirc;n một outfit nhẹ nh&agrave;ng cho c&aacute;c buổi hẹn h&ograve; hay cho n&agrave;ng c&ocirc;ng sở,... Tươi mới v&agrave; thời thượng nhất, h&atilde;y đến IVY moda ngay nh&eacute;!</p>\r\n', 8, 1),
(9, 'Xu hướng màu ombre huyền ảo được thổi hồn trong BST “Mơ Nhuộm Nắng”', '1699264722_38e425b561662a9632d8547dca9d125c.png', '<p>M&agrave;u ombre kh&ocirc;ng l&agrave; sự kết hợp từ nhiều m&agrave;u sắc kh&aacute;c nhau l&agrave;m cho trang phục trở n&ecirc;n độc đ&aacute;o hơn, mang một vẻ k&igrave; ảo, bay bổng, đồng thời l&agrave;m cho người diện th&ecirc;m phần thu h&uacute;t v&agrave; c&aacute; t&iacute;nh.</p>\r\n', '<h1>Xu hướng m&agrave;u ombre huyền ảo được thổi hồn trong BST &ldquo;Mơ Nhuộm Nắng&rdquo;</h1>\r\n\r\n<p>15/04/2022</p>\r\n\r\n<p>M&agrave;u ombre kh&ocirc;ng l&agrave; sự kết hợp từ nhiều m&agrave;u sắc kh&aacute;c nhau l&agrave;m cho trang phục trở n&ecirc;n độc đ&aacute;o hơn, mang một vẻ k&igrave; ảo, bay bổng, đồng thời l&agrave;m cho người diện th&ecirc;m phần thu h&uacute;t v&agrave; c&aacute; t&iacute;nh. Nắm bắt được sự huyền ảo của phối m&agrave;u ombre, b&ecirc;n cạnh họa tiết Hoa đậu thơm Nhật Bản, trong BST &lsquo;<a href=\"https://ivymoda.com/danh-muc/mo-nhuom-nang\">Mơ nhuộm nắng</a>&rsquo; đến từ thương hiệu thời trang IVY moda đ&atilde; cho ra mắt những trang phục với xu hướng m&agrave;u ombre thu h&uacute;t ngay từ &aacute;nh nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<p>M&agrave;u ombre được ứng dụng kh&aacute; phổ biến trong lĩnh vực l&agrave;m đẹp như trang điểm, nhuộm t&oacute;c, l&agrave;m m&oacute;ng,&hellip; bởi sự chuyển biến linh hoạt giữa c&aacute;c gam m&agrave;u khiến người nh&igrave;n bị m&ecirc; đắm. Trong lĩnh vực thời trang phối m&agrave;u ombre được được ứng dụng phổ biến trong c&aacute;ch phối m&agrave;u cho những chiếc v&aacute;y, &aacute;o, quần.</p>\r\n\r\n<p>Trong bộ sưu tập xu&acirc;n h&egrave; 2022 của <a href=\"https://ivymoda.com/\">IVY moda</a>, gam m&agrave;u ombre cuốn h&uacute;t được c&aacute;c nh&agrave; thiết kế đưa v&agrave;o trang phục như đầm yếm maxi, &aacute;o blazer, quần short, khăn lụa, &aacute;o sơ mi,... mang đến vẻ đẹp thu h&uacute;t kh&oacute; c&oacute; thể trộn lẫn d&agrave;nh cho ph&aacute;i đẹp.&nbsp;</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/be000f3079a57b459419886a96e28a13.jpg\" /></p>\r\n\r\n<p>Trang phục ombre với sự chuyển m&agrave;u nhẹ nh&agrave;ng tinh tế tr&ecirc;n những gam m&agrave;u thời thượng trong năm nay như m&agrave;u cam, t&iacute;m tạo n&ecirc;n bản phối ho&agrave;n hảo d&agrave;nh cho những c&ocirc; n&agrave;ng thời thượng.</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/00f3374807a39cebae916381299ba48c.jpg\" /></p>\r\n\r\n<p>Hoa hậu Tiểu Vy với thiết kế đầm xẻ cao quyến rũ c&ugrave;ng phối m&agrave;u ombre xinh đẹp trong bộ sưu tập mới IVY moda tạo n&ecirc;n một bức tranh v&ocirc; c&ugrave;ng quyến rũ l&agrave;m say l&ograve;ng mọi &aacute;nh nh&igrave;n.</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/c03af0010928df809a9a400280f5b5b8.jpg\" /></p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/3e494ef70e69bfd882be750f2835e12d.jpg\" /></p>\r\n\r\n<p>Set đồ với <a href=\"https://ivymoda.com/sanpham/ao-so-mi-ombre-ms-17m7447-33799\">&aacute;o sơ mi ombre</a> c&ugrave;ng ch&acirc;n v&aacute;y ombre mang đến n&eacute;t đẹp thanh lịch, hiện đại ph&ugrave; hợp với c&ocirc; n&agrave;ng c&ocirc;ng sở y&ecirc;u th&iacute;ch những phối m&agrave;u rực rỡ, nổi bật</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/7aa1c430e7528293b5d27e17914e687b.jpg\" /></p>\r\n\r\n<p>Những thiết kế phối m&agrave;u ombre trong &ldquo;Mơ nhuộm nắng&rdquo; Spring Summer 2022 lần lượt m&ocirc; tả những trạng th&aacute;i sắc độ v&agrave; cung bậc cảm x&uacute;c. Từ sự h&ograve;a quyện độc đ&aacute;o của từng khối m&agrave;u đỏ sang cam rồi t&iacute;m đầy m&ecirc; hoặc của ho&agrave;ng h&ocirc;n, đến m&agrave;u của hoa đậu thơm bừng nở quyến rũ, căng tr&agrave;n tr&ecirc;n nền ombre với sắc th&aacute;i rực rỡ, để chờ đ&oacute;n b&igrave;nh minh của ng&agrave;y mới rực rỡ &aacute;nh nắng.</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/ee5191c2809b68daedc738c5ab658b4e.jpg\" /></p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/3e4af0bc3da25ff8d6ff4c6213246039.jpg\" /></p>\r\n\r\n<p>Thiết kế đầm 2 d&acirc;y tối giản nhưng vẫn to&aacute;t l&ecirc;n vẻ sang trọng với phối m&agrave;u ombre lạ mắt</p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/da9038b67b33492ea401c2b0d78d488e.jpg\" /></p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/b183324a0620a61515a76f6be60e4209.jpg\" /></p>\r\n\r\n<p><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/04/15/aa8e9c01623724c5093014dfef7869e4.jpg\" /></p>\r\n\r\n<p>B&ecirc;n cạnh xu hướng m&agrave;u ombre thời thượng, c&aacute;c nh&agrave; thiết kế đ&atilde; gửi gắm trang phục trong BST &lsquo;Mơ nhuộm nắng&rsquo; nhiều cảm x&uacute;c, động lực v&agrave; sự y&ecirc;u thương đến với ph&aacute;i đẹp qua những chi tiết dập nhăn, kiểu d&aacute;ng bay bổng, mang tuy&ecirc;n ng&ocirc;n c&aacute; nh&acirc;n v&agrave; x&acirc;y dựng phong c&aacute;ch ri&ecirc;ng biệt cho từng qu&yacute; c&ocirc;. Từ đ&oacute;, gi&uacute;p ph&aacute;i đẹp trở n&ecirc;n thu h&uacute;t hơn, tỏa s&aacute;ng hơn, tự tin hơn để tiếp tục thực hiện ước mơ của m&igrave;nh.</p>\r\n', 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(255) NOT NULL,
  `cart_payment` varchar(200) NOT NULL,
  `cart_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`, `cart_payment`, `cart_shipping`) VALUES
(88, 13, '8770', 0, '2023-10-21 16:49:56', 'tienmat', 8),
(89, 13, '982', 0, '2023-10-21 16:50:08', 'vnpay', 8),
(90, 13, '3550', 0, '2023-10-21 16:53:37', 'momo', 8),
(91, 29, '3562', 0, '2023-10-21 20:03:08', 'momo', 9),
(92, 13, '4054', 1, '2023-11-03 11:15:56', 'tienmat', 8),
(93, 13, '7388', 1, '2023-11-03 11:19:20', 'tienmat', 8),
(94, 13, '7945', 1, '2023-11-03 11:25:07', 'tienmat', 8),
(95, 13, '7204', 1, '2023-11-03 11:25:40', 'tienmat', 8),
(96, 13, '3335', 1, '2023-11-03 13:40:41', 'tienmat', 8),
(97, 13, '7445', 0, '2023-11-03 14:56:33', 'tienmat', 8),
(98, 13, '6210', 0, '2023-11-03 14:57:25', 'tienmat', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(94, '8770', 40, 1),
(95, '982', 39, 1),
(96, '3550', 38, 1),
(97, '3562', 29, 1),
(98, '4054', 45, 3),
(99, '4054', 40, 2),
(100, '7388', 45, 3),
(101, '7388', 30, 2),
(102, '7945', 45, 1),
(103, '7204', 45, 1),
(104, '3335', 37, 3),
(105, '7445', 40, 2),
(106, '6210', 38, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `sodonhang` int(11) NOT NULL,
  `chitieu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`, `sodonhang`, `chitieu`) VALUES
(13, 'Đoàn Chính Hào', 'haodoan093@gmail.com', 'Hà Nội', 'c4ca4238a0b923820dcc509a6f75849b', '0346523128', 2, 9850000),
(14, 'Nguyễn Ánh', 'tokuda093@gmail.com', 'Thanh Xuân - Hà Nội', 'c4ca4238a0b923820dcc509a6f75849b', '0346523127', 0, 6000000),
(18, 'Duong Linh Chi', 'duonglinhchi@gmail.com', 'Hà Nội', 'c4ca4238a0b923820dcc509a6f75849b', '0348721254', 0, 400000),
(19, 'Nguyễn Ngọc Ánh', 'anh01642778814@gmail.com', 'Thanh Xuân - Hà Nội', 'c4ca4238a0b923820dcc509a6f75849b', '0962531636', 0, 9000000),
(20, 'Sái minh hiếu', 'saiminhhieu0712@gmail.com', 'Hà Nội', 'c81e728d9d4c2f636f067f89cc14862c', '0346523143', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thongtin` varchar(200) NOT NULL,
  `thoigian` varchar(50) NOT NULL,
  `sosao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, '.Quần nam.nữ', 1),
(2, '.Áo nam.', 2),
(3, 'Áo ba lỗ nam', 3),
(4, 'Quần bò', 4),
(16, 'Áo CropTop', 9),
(17, 'Váy nam', 0),
(18, 'Áo nữ', 0),
(19, 'Áo peplum', 8),
(20, 'Áo blazer nữ', 11),
(21, 'Quần nam', 1),
(22, 'Đầm nữ', 111),
(23, 'Chân váy', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucbaiviet`
--

CREATE TABLE `tbl_danhmucbaiviet` (
  `id_danhmucbaiviet` int(11) NOT NULL,
  `tendanhmuc_baiviet` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucbaiviet`
--

INSERT INTO `tbl_danhmucbaiviet` (`id_danhmucbaiviet`, `tendanhmuc_baiviet`, `thutu`) VALUES
(7, 'Tin bóng rổ', 0),
(8, 'Tin thời trang', 2),
(9, 'Tin tháng 10', 4),
(10, 'Tin mới', 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int(11) NOT NULL,
  `thongtinlienhe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id`, `thongtinlienhe`) VALUES
(1, '<h2>Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua</h2>\r\n\r\n<p><strong>1:Zalo : 03465231221</strong></p>\r\n\r\n<p><strong>2:Facebook : <a href=\"https://www.facebook.com/DC.Hao093\">Doan Chinh Hao</a></strong></p>\r\n\r\n<p><strong>3:Github : <a href=\"https://github.com/Haodoan093?fbclid=IwAR3XgY-31bsr42B6jVIhepWbGLiDt3s6X6vA0GOCOorNUeHGI_gUvNNOIk8\">Haodoan093</a></strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/08/31/128520ad10f51e58c7494d2acf551aa5.jpg\" style=\"height:402px; width:800px\" /><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/07/17/3f2621f20ca9982660379606a03609e2.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int(11) NOT NULL,
  `partnercode` varchar(200) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_momo`
--

INSERT INTO `tbl_momo` (`id_momo`, `partnercode`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`, `code_cart`) VALUES
(11, 'MOMOBKUN20180529', 1697881977, '2490000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', '3550'),
(12, 'MOMOBKUN20180529', 1697893334, '499000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', '3562');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(200) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` int(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` longtext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL,
  `daban` int(11) NOT NULL,
  `loaihang` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`, `giamgia`, `daban`, `loaihang`) VALUES
(18, 'SHIRT DRESS - ĐẦM CỔ ĐỨC', 'SKU: 16B9363', 2490000, 19, '1699257080_57f87265fc2209d8681c009ca662b7ce.jpg', '<p>Ladonna Dress pha trộn giữa phong c&aacute;ch thời trang cổ điển v&agrave; hiện đại để mang đến diện mạo v&agrave;o thu vừa nhẹ nh&agrave;ng, mềm mại vừa ki&ecirc;u sa.</p>\r\n', '<p>Ladonna Dress pha trộn giữa phong c&aacute;ch thời trang cổ điển v&agrave; hiện đại để mang đến diện mạo v&agrave;o thu vừa nhẹ nh&agrave;ng, mềm mại vừa ki&ecirc;u sa.</p>\r\n', 1, 0, 0, 0, 0),
(19, 'ĐẦM BABYDOLL TAY BỒNG', 'SKU: 47B9395', 507000, 35, '1694282240_8a053062db09869bd772d3162bebbc52.jpg', '   Đầm dài ngang gối, thiết kế babydoll chân ngực cao, tay phồng, xòe từ trên xuống và che khuyết điểm cơ thể cực tốt. Chất liệu vải thô có độ thoáng, bồng nhẹ, tạo sự trẻ trung, mát mẻ cho mùa h', 'Đầm dài ngang gối, thiết kế babydoll chân ngực cao, tay phồng, xòe từ trên xuống và che khuyết điểm cơ thể cực tốt. Chất liệu vải thô có độ thoáng, bồng nhẹ, tạo sự trẻ trung, mát mẻ cho mùa hè.', 1, 2, 0, 0, 0),
(20, 'QUẦN BAGGY PHỐI ĐAI', 'SKU: 22M8066', 1290000, 43, '1694282149_f5c9791126ea311ea140f8805f3ce8f7.jpg', ' - Quần baggy lửng, cạp cao.\r\n\r\n- Ống quần rộng, bo nhỏ dần về gấu. ', '- Quần baggy lửng, cạp cao.\r\n\r\n- Ống quần rộng, bo nhỏ dần về gấu. ', 1, 1, 0, 0, 0),
(21, 'QUẦN SUÔNG PHỐI REN', 'SKU: 22M6376', 199000, 32, '1694282215_6fcdd012a7e877817c520d6af071c849.png', ' Quần suông ống rộng cạp cao, 2 bên ống được ráp ren tạo điểm nổi bật. 2 túi chéo 2 bên. Cài phía trước bằng khuy cài và dây kéo khóa.', 'Quần suông ống rộng cạp cao, 2 bên ống được ráp ren tạo điểm nổi bật. 2 túi chéo 2 bên. Cài phía trước bằng khuy cài và dây kéo khóa.', 1, 4, 0, 0, 0),
(22, 'MUSE SET - ÁO CROPTOP CHUN EO PHỐI CHÂN VÁY CHỮ A', 'SKU: 16M8303', 1120000, 31, '1698955426_7bb72ea0e1f9b7765da7faff71225747.jpg', '<p>Muse set l&agrave; sản phẩm thời trang s&agrave;nh điệu v&agrave; nổi bật được phối hợp giữa &aacute;o croptop v&agrave; ch&acirc;n v&aacute;y ngắn chữ A. Chất liệu vải linen đồng bộ tạo cảm gi&aacute;c mềm mại v&agrave; rất dễ chịu khi mặc.</p>\r\n', '<p>Muse set l&agrave; sản phẩm thời trang s&agrave;nh điệu v&agrave; nổi bật được phối hợp giữa &aacute;o croptop v&agrave; ch&acirc;n v&aacute;y ngắn chữ A. Chất liệu vải linen đồng bộ tạo cảm gi&aacute;c mềm mại v&agrave; rất dễ chịu khi mặc.</p>\r\n', 1, 16, 0, 0, 1),
(24, 'ÁO PEPLUM XẺ TÀ', 'SKU: 16M8284', 349300, 41, '1698953855_839bb3b2d72a52ad988009479b92a831.jpg', '<p>Thiết kế &aacute;o hai lớp vải, lớp ngo&agrave;i l&agrave; vải lụa xuy&ecirc;n thấu nhẹ nh&agrave;ng, tạo hiệu ứng mờ ảo t&ocirc;n vai, lớp trong l&agrave; vải l&oacute;t mềm mại gi&uacute;p định h&igrave;nh d&aacute;ng &aacute;o. Cổ &aacute;o tr&ograve;n được may nếp ly, mang đến v</p>\r\n', '<p>Thiết kế &aacute;o hai lớp vải, lớp ngo&agrave;i l&agrave; vải lụa xuy&ecirc;n thấu nhẹ nh&agrave;ng, tạo hiệu ứng mờ ảo t&ocirc;n vai, lớp trong l&agrave; vải l&oacute;t mềm mại gi&uacute;p định h&igrave;nh d&aacute;ng &aacute;o. Cổ &aacute;o tr&ograve;n được may nếp ly, mang đến vẻ nền n&atilde; v&agrave; nữ t&iacute;nh cho thiết kế. Điểm nhấn đặc biệt l&agrave; chi tiết hoa nổi gắn lệch b&ecirc;n eo c&ugrave;ng phần xẻ t&agrave; tinh tế ở vạt &aacute;o trước, gi&uacute;p t&ocirc;n l&ecirc;n v&ograve;ng eo thon gọn v&agrave; l&agrave;m nổi bật cho vẻ đẹp của sản phẩm.</p>\r\n', 1, 19, 30, 0, 0),
(25, 'VINCENT SET - ÁO BLAZER KẾT HỢP QUẦN SUÔNG', 'SKU: 67M8261', 2900000, 56, '1694804861_748bcd315e94cd49b8c38e8b91a6b2c6.jpg', 'Vincent Set được kết hợp từ áo khoác cổ hai ve, dáng croptop trẻ trung, hiện đại bên cạnh quần Tây suông xếp ly hách dáng. \r\n\r\nThiết kế áo blazer tay dài, cách điệu giấu khuy, vừa mang đến sự cá tính v', 'Thông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', 1, 20, 0, 0, 0),
(26, 'CHÂN VÁY MIDI NHÚN SƯỜN', 'SKU: 17M8508', 1150000, 23, '1698955460_aa0861105fdcd791485d57b2727548be.jpg', '<p>Th&ecirc;m một thiết kế sơ mi thời thượng v&agrave;o tủ đồ của qu&yacute; c&ocirc; c&ocirc;ng sở hiện đại. Thiết kế &aacute;o sơ mi d&aacute;ng cơ bản, được c&aacute;ch điệu xếp chồng phần cổ &aacute;o v&agrave; xếp ly ở cổ tay. &Aacute;o c&oacute; khuy c&agrave;i nhỏ đ</p>\r\n', '<p>Th&ecirc;m một thiết kế sơ mi thời thượng v&agrave;o tủ đồ của qu&yacute; c&ocirc; c&ocirc;ng sở hiện đại. Thiết kế &aacute;o sơ mi d&aacute;ng cơ bản, được c&aacute;ch điệu xếp chồng phần cổ &aacute;o v&agrave; xếp ly ở cổ tay. &Aacute;o c&oacute; khuy c&agrave;i nhỏ đồng m&agrave;u. Chất liệu l&agrave; lụa trơn cao cấp, mềm mại, tạo cảm gi&aacute;c mặc thoải m&aacute;i.</p>\r\n', 1, 18, 0, 0, 1),
(28, 'ÁO SƠ MI CROPTOP BO CHUN EO', 'SKU: 16M7718', 309000, 71, '1694852874_66b10f19744a37291d76c10b9d24adf0.jpg', 'Áo sơ mi cổ đức, dáng croptop đc bo chun eo, tay áo lửng. Dọc thân áo là khuy cài được ẩn ở trong. Chất liệu vải thô cùng họa tiết hoa mang màu sắc retro giúp nàng nổi bật hơn.', 'Áo sơ mi cổ đức, dáng croptop đc bo chun eo, tay áo lửng. Dọc thân áo là khuy cài được ẩn ở trong. Chất liệu vải thô cùng họa tiết hoa mang màu sắc retro giúp nàng nổi bật hơn.', 1, 16, 0, 0, 0),
(29, 'QUẦN BAGGY DÂY LƯNG THẮT NƠ', 'SKU: 22M8344', 499000, 0, '1694852977_6a894a6648f5684ca14acd574aa286b1.jpg', 'Với kiểu dáng ống đứng thanh thoát, chiếc quần này giúp tôn lên đôi chân dài và sẽ là sự lựa chọn hoàn hảo cho những buổi đi làm hay các sự kiện đặc biệt. Chất liệu tuýt si mềm mại và thoáng m', 'Với kiểu dáng ống đứng thanh thoát, chiếc quần này giúp tôn lên đôi chân dài và sẽ là sự lựa chọn hoàn hảo cho những buổi đi làm hay các sự kiện đặc biệt. Chất liệu tuýt si mềm mại và thoáng mát, giúp bạn cảm thấy thoải mái và tự tin suốt cả ngày dài.', 1, 1, 0, 0, 0),
(30, 'QUẦN ỐNG ĐỨNG PHỐI ĐAI LỆCH', 'SKU: 22M7577', 1190000, 25, '1694853013_fb7ecb2400e5df63fb39750e5ac6dc17.jpg', 'Quần dài dáng ống đứng, độ dài ngang mắt cá chân. Thiết kế eo dạng cài với đai lệch và móc kim loại cùng màu. Phía trước có khóa kéo. Hai bên có hai túi xéo.', 'Quần dài dáng ống đứng, độ dài ngang mắt cá chân. Thiết kế eo dạng cài với đai lệch và móc kim loại cùng màu. Phía trước có khóa kéo. Hai bên có hai túi xéo.', 1, 1, 0, 2, 0),
(31, 'ÁO SƠ MI LỤA PHỐI PHỤ KIỆN', 'SKU: 17M8159', 1090000, 32, '1694853051_382e9031e7dc53a82b93f8ea4cb86241.jpg', 'Áo sơ mi cổ đức, dáng suông, cổ phối dây phụ kiện tạo điểm nhấn. Chất liệu vải lụa dày dặn, mềm mịn, áo có độ bóng nhẹ.', 'Áo sơ mi cổ đức, dáng suông, cổ phối dây phụ kiện tạo điểm nhấn. Chất liệu vải lụa dày dặn, mềm mịn, áo có độ bóng nhẹ.', 1, 20, 0, 0, 0),
(32, 'ÁO SƠ MI LỤA CỔ KIỂU', 'SKU: 17M6841', 399000, 43, '1694853137_ad8ac80bd3f5da1747af7dddca358ae6.jpg', 'Áo sơ mi là một trong những items thời trang công sở basic nhất, đồng thời đây cũng là item không bao giờ lỗi mốt, dễ dàng mix match với nhiều món đồ khác mang đến cho nàng công sở vẻ ngoài tươm tất,', 'Áo sơ mi là một trong những items thời trang công sở basic nhất, đồng thời đây cũng là item không bao giờ lỗi mốt, dễ dàng mix match với nhiều món đồ khác mang đến cho nàng công sở vẻ ngoài tươm tất, thanh lịch. Với thiết kế đơn giản, nhấn nhá chút viền ngọc trai tạo điểm nhấn, cùng với đó là chất vải lụa mềm mịn, thân thiện với làn da, thấm hút mồ hôi tốt, mang lại cảm giác thoải mái cho người mặc. ', 1, 18, 0, 0, 0),
(33, 'QUẦN DÀI ỐNG LOE', 'SKU: 22M6950', 387000, 42, '1698952152_277b454a2d8e9621e2978e57cf638e96.jpg', '<p>Quần d&agrave;i nữ ống loe. Cạp cao. C&agrave;i bằng kh&oacute;a k&eacute;o ẩn. Mix c&ugrave;ng &aacute;o kho&aacute;c tweed để c&oacute; set đồ trendy nhất n&agrave;ng nh&eacute;!</p>\r\n', '<p>Quần d&agrave;i nữ ống loe. Cạp cao. C&agrave;i bằng kh&oacute;a k&eacute;o ẩn. Mix c&ugrave;ng &aacute;o kho&aacute;c tweed để c&oacute; set đồ trendy nhất n&agrave;ng nh&eacute;!</p>\r\n', 1, 1, 0, 0, 1),
(34, 'ĐẦM XÒE VIỀN REN THÊU', 'SKU: 48M8334', 1890000, 32, '1694853240_0636355fe05bdd88db7b0d9e7c055e1c.jpg', 'Mang vẻ đẹp kiêu sa và cuốn hút, thiết kế đầm viền ren thêu đến từ IVY moda sẽ khiến bạn tỏa sáng trong mọi dịp.', 'Mang vẻ đẹp kiêu sa và cuốn hút, thiết kế đầm viền ren thêu đến từ IVY moda sẽ khiến bạn tỏa sáng trong mọi dịp.', 1, 17, 0, 0, 0),
(36, 'ÁO HOODIE NAM PHỐI ĐẸP', 'SKU: 59E3060', 369000, 53, '1699257275_58826902a3df7ee70ef3d52d5d5946e9.jpg', '<p>&Aacute;o hoodie tay d&agrave;i, cổ mũ c&oacute; khuy bấm bằng kim loại. Gấu bo. 2 t&uacute;i ph&iacute;a trước. Phối m&agrave;u bắt mắt. Chất liệu vải d&agrave;y dặn kh&ocirc;ng nhăn, kh&ocirc;ng x&ugrave;, kh&ocirc;ng co r&uacute;t khi giặt, thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p bạn thoả</p>\r\n', '<p>&Aacute;o hoodie tay d&agrave;i, cổ mũ c&oacute; khuy bấm bằng kim loại. Gấu bo. 2 t&uacute;i ph&iacute;a trước. Phối m&agrave;u bắt mắt. Chất liệu vải d&agrave;y dặn kh&ocirc;ng nhăn, kh&ocirc;ng x&ugrave;, kh&ocirc;ng co r&uacute;t khi giặt, thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p bạn thoải m&aacute;i vận động. Mix c&ugrave;ng quần jean, short...gi&agrave;y thể thao để c&oacute; set đồ năng động.</p>\r\n', 1, 0, 0, 0, 0),
(38, 'ĐẦM LỤA XẾP CỔ 2 VE', 'SKU: 48M7954', 2490000, 39, '1695557729_e97cc60bcf0aa836b5cb17b43d2f7261.jpg', 'Đầm lụa xếp cổ 2 ve nằm trong BST Timeless và được trình diễn trong show thời trang Fall Winter 2022. Thiết kế áo kiểu tay lửng, cổ 2 ve thanh lịch cùng phần eo may nhúm, ôm sát tôn dáng người mặc. Tà váy m', 'Đầm lụa xếp cổ 2 ve nằm trong BST Timeless và được trình diễn trong show thời trang Fall Winter 2022. Thiết kế áo kiểu tay lửng, cổ 2 ve thanh lịch cùng phần eo may nhúm, ôm sát tôn dáng người mặc. Tà váy may xếp tạo hiệu ứng đẹp khi di chuyển. Điểm nhấn là họa tiết in hoa trên nền vải lụa trơn. Chất liệu lụa cao cấp, bề mặt vải mềm mại, bay bổng có nguồn gốc từ các sợi tơ tằm mang đến nét đẹp quyến rũ.', 1, 18, 0, 3, 0),
(39, 'ĐẦM LỤA TRƠN PHỐI KHUY BỌC', 'SKU: 48M7159', 2190000, 32, '1695653317_9c5af4f8e9e4292633cd2aa8b37354d8.jpg', '<p>Đầm lụa trơn, d&aacute;ng &aacute;o cổ tim, tay d&agrave;i, thiết kế eo&nbsp;chiết cao t&ocirc;n d&aacute;ng.&nbsp;Phần t&agrave; thả su&ocirc;ng, c&oacute; xẻ nhẹ ở ph&iacute;a trước. Dọc th&acirc;n đầm l&agrave; h&amp;', '<p>Đầm lụa trơn, d&aacute;ng &aacute;o cổ tim, tay d&agrave;i, thiết kế eo&nbsp;chiết cao t&ocirc;n d&aacute;ng.&nbsp;Phần t&agrave; thả su&ocirc;ng, c&oacute; xẻ nhẹ ở ph&iacute;a trước. Dọc th&acirc;n đầm l&agrave; h&agrave;ng khuy bọc đồng m&agrave;u.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 24px; left: 1318.69px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', 1, 22, 0, 0, 0),
(40, 'QUẦN SUÔNG ĐÍNH KHUY SƯỜN', 'SKU: 22M8505', 1190000, 30, '1698955159_4d4f1a7ba8d9672867c83fc2e4ef5317.jpg', '<p>- Quần su&ocirc;ng, tạo ly giữa, độ d&agrave;i qua mắt c&aacute; ch&acirc;n. Thiết kế cạp cao, h&aacute;ch d&aacute;ng&nbsp; v&agrave; che khuyết điểm tốt.&nbsp;</p>\r\n\r\n<p>- Phần cạp hai b&ecirc;n được tạo điểm nhấn khuy nổi gi&uacute;p quần biến mất sự cứng nhắc, tăng vẻ nữ t&iacute;nh, điệu đ&agrave;.&nbsp;</p>\r\n\r\n<p>- Thiết kệ lựa chọn chất liệu tuysi mềm mại, giữ form tốt.</p>\r\n\r\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\r\n\r\n<p><strong>Chiều cao:&nbsp;</strong>167 cm</p>\r\n\r\n<p><strong>C&acirc;n nặng:&nbsp;</strong>50 kg</p>\r\n\r\n<p><strong>Số đo 3 v&ograve;ng:&nbsp;</strong>83-65-93 cm</p>\r\n\r\n<p>Mẫu mặc size M Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>\r\n\r\n<p><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></p>\r\n', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Ladies</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>&Ocirc;́ng su&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Tuysi</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1, 0, 2, 2),
(45, 'CHÂN VÁY KHAKI DÁNG XÒE', 'SKU: 30M8113', 763000, 1, '1698993016_4bbac4ab9a9087f9acfa5e3c441cbcea.jpg', '<p>Thiết kế ch&acirc;n v&aacute;y xếp ly 2 b&ecirc;n x&ograve;e nhẹ, độ d&agrave;i ngang mắt c&aacute; ch&acirc;n.&nbsp;Cạp cao &ocirc;m eo&nbsp;t&ocirc;n l&ecirc;n v&ograve;ng 2 của n&agrave;ng, c&oacute; 2 t&uacute;i ch&eacute;o 2 b&ecirc;n.&nbsp;C&agrave;i bằng kh&oacute;a k&eacute;o ẩn ph&iacute;a sau.</p>\r\n', '<p>Thiết kế ch&acirc;n v&aacute;y xếp ly 2 b&ecirc;n x&ograve;e nhẹ, độ d&agrave;i ngang mắt c&aacute; ch&acirc;n.&nbsp;Cạp cao &ocirc;m eo&nbsp;t&ocirc;n l&ecirc;n v&ograve;ng 2 của n&agrave;ng, c&oacute; 2 t&uacute;i ch&eacute;o 2 b&ecirc;n.&nbsp;C&agrave;i bằng kh&oacute;a k&eacute;o ẩn ph&iacute;a sau.</p>\r\n', 1, 23, 30, 2, 1),
(46, 'ĐẦM LEN MÓC LƯỚI', 'SKU: 41M7861', 429300, 65, '1699082097_5ab029fe4058b6d502ba228ee94b1d9e.jpg', '<p>Đầm &ocirc;m len lưới mang đến vẻ ngo&agrave;i đầy quyến rũ v&agrave; tinh tế. Với độ d&agrave;i qua gối, chiếc đầm n&agrave;y &ocirc;m nhẹ cơ thể, kh&eacute;o l&eacute;o t&ocirc;n l&ecirc;n th&acirc;n h&igrave;nh&nbsp;của người mặc m&agrave; kh&ocirc;ng hề g&ograve; b&oacute;.</p>\r\n', '<p>Đầm &ocirc;m len lưới mang đến vẻ ngo&agrave;i đầy quyến rũ v&agrave; tinh tế. Với độ d&agrave;i qua gối, chiếc đầm n&agrave;y &ocirc;m nhẹ cơ thể, kh&eacute;o l&eacute;o t&ocirc;n l&ecirc;n th&acirc;n h&igrave;nh&nbsp;của người mặc m&agrave; kh&ocirc;ng hề g&ograve; b&oacute;.</p>\r\n', 1, 22, 10, 0, 1),
(47, 'PIECE SUITS - SET ÁO VEST DÁNG OVERSIZE', 'SKU: 67M7969', 3380000, 56, '1699257521_8c1c0d53a3f74f2906372e48947ed6d7.jpg', '<p>Piece Suits&nbsp;nằm trong BST&nbsp;EXPRESS tham gia tr&igrave;nh diễn tại show thời trang&nbsp;FALL/WINTER 2023, nơi những gi&aacute; trị đ&iacute;ch thực được đ&aacute;nh thức v&agrave; tỏ b&agrave;y th&ocirc;ng qua c&aacute;c thiết kế cao cấp nhất!&nbsp;</p>\r\n\r\n<p>Set &aacute;o vest gồm 2 items: &aacute;o vest, v&agrave; quần su</p>\r\n', '<p>Piece Suits&nbsp;nằm trong BST&nbsp;EXPRESS tham gia tr&igrave;nh diễn tại show thời trang&nbsp;FALL/WINTER 2023, nơi những gi&aacute; trị đ&iacute;ch thực được đ&aacute;nh thức v&agrave; tỏ b&agrave;y th&ocirc;ng qua c&aacute;c thiết kế cao cấp nhất!&nbsp;</p>\r\n\r\n<p>Set &aacute;o vest gồm 2 items: &aacute;o vest, v&agrave; quần su</p>\r\n', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(5, 'Hào Đoàn Chính', '0346523128', 'Bắc từ Liêm , Hà Nội', '', 21),
(8, 'Hào Đoàn Chính', '0346523128', 'Bắc từ Liêm , Hà Nội', '2', 13),
(9, 'Đàm Quốc Dân', '034123123', 'Từ Sơn - Bấc Ninh', '', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(50) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(1, '2023-05-29', 50, '18000000', 23),
(2, '2023-09-27', 32, '19820000', 21),
(3, '2023-08-30', 51, '6000020', 13),
(4, '2023-06-21', 66, '5009002', 41),
(5, '2023-07-02', 23, '1230000', 32),
(6, '2023-10-04', 4, '13898000', 8),
(7, '2023-10-09', 1, '2190000', 1),
(8, '2023-10-17', 3, '3570000', 3),
(9, '2023-10-20', 3, '17710000', 9),
(10, '2023-10-21', 5, '7367000', 6),
(11, '2023-11-06', 2, '9850000', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(100) NOT NULL,
  `vnp_bankcode` varchar(100) NOT NULL,
  `vnp_banktranno` varchar(100) NOT NULL,
  `vnp_cardtype` varchar(100) NOT NULL,
  `vnp_orderInfo` varchar(200) NOT NULL,
  `vnp_paydate` varchar(200) NOT NULL,
  `vnp_tmncode` varchar(100) NOT NULL,
  `vnp_transactionno` varchar(200) NOT NULL,
  `code_cart` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderInfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `code_cart`) VALUES
(15, '2190000', 'NCB', 'VNP14150735', 'ATM', 'Thanh toán đơn hàng đặt tịa website AHSHOP', '20231021165028', '4L85GX41', '14150735', '982');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  ADD PRIMARY KEY (`id_danhmucbaiviet`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  MODIFY `id_danhmucbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
