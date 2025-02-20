-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 28, 2024 lúc 05:17 AM
-- Phiên bản máy phục vụ: 10.5.25-MariaDB
-- Phiên bản PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tdichvuinfo_api`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_tai_khoan`
--

CREATE TABLE `danh_muc_tai_khoan` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `game` int(11) NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_tai_khoan`
--

INSERT INTO `danh_muc_tai_khoan` (`id`, `name`, `noidung`, `game`, `type`, `status`) VALUES
(1, 'Tài Khoản Liên Quân Tuỳ Chọn', 'Với hàng ngàn tài khoản Liên Quân ngon, giá cả hợp lý - Là sự lựa chọn phù hợp cho bạn.', 3, 'muanick', 'ON'),
(2, 'Thử Vận May - Tài Khoản Liên Quân', 'Random ngay nhận quà liền tay', 3, 'random', 'ON'),
(3, 'Acc Free Fire', 'ngon bổ rẻ', 1, 'muanick', 'ON'),
(4, 'Cày Thuê', 'An Toàn Uy Tín', 6, 'caythue', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_caythue`
--

CREATE TABLE `don_caythue` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `taikhoan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `2fa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ghichu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `loai` int(11) NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goi_caythue`
--

CREATE TABLE `goi_caythue` (
  `id` int(11) NOT NULL,
  `ten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `goi_caythue`
--

INSERT INTO `goi_caythue` (`id`, `ten`, `gia`, `loai`, `status`) VALUES
(1, 'Rank Cao Thủ', '100000', 7, 1),
(2, 'Rank Thách Đấu', '1000000', 7, 1),
(3, 'Rank  Huyền Thoại', '90000', 8, 1),
(4, 'full cấp gì đó', '100000', 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_log`
--

CREATE TABLE `history_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_nap_bank`
--

CREATE TABLE `history_nap_bank` (
  `id` int(11) NOT NULL,
  `trans_id` text DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `stk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ctk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thucnhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_nap_the`
--

CREATE TABLE `history_nap_the` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `menhgia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thucnhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_acc_game`
--

CREATE TABLE `list_acc_game` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaymua` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thong_tin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `loai` int(11) NOT NULL,
  `list_thong_tin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `list_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sale` text NOT NULL DEFAULT '0',
  `ck` int(11) NOT NULL DEFAULT 0,
  `gio` text DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_bank`
--

CREATE TABLE `list_bank` (
  `id` int(11) NOT NULL,
  `stk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ctk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `loai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img` text NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `list_bank`
--

INSERT INTO `list_bank` (`id`, `stk`, `ctk`, `loai`, `type`, `img`, `status`) VALUES
(1, '940765', 'BUI DUC THANH', 'MBBANK', 'bank', '', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_game`
--

CREATE TABLE `list_game` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `list_thong_tin` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phathanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `list_game`
--

INSERT INTO `list_game` (`id`, `name`, `list_thong_tin`, `phathanh`, `status`) VALUES
(1, 'FREE FIRE', 'Nhân vật\nSkin súng\nLevel\nRank', 'GARENA', 'ON'),
(2, 'LIÊN MINH HUYỀN THOẠI', 'Tướng\nTrang phục\nRank', 'Riot Games', 'ON'),
(3, 'LIÊN QUÂN MOBILE', 'Tướng\nTrang phục\nRank', 'GARENA', 'ON'),
(4, 'PUBG MOBILE', 'Skin súng\nLevel\nRank', 'VNG', 'ON'),
(6, 'Cày Thuê', 'Tài Khoản\r\nMật Khẩu', '', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tai_khoan`
--

CREATE TABLE `loai_tai_khoan` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `camket` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `danhmuc` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tai_khoan`
--

INSERT INTO `loai_tai_khoan` (`id`, `name`, `img`, `noidung`, `camket`, `danhmuc`, `view`, `buy`, `status`) VALUES
(1, 'Nick Liên Quân Sale Giá Rẻ', 'https://cdns.diongame.com/static/qbTWQ4pwTe7UiCn.gif', 'Mua nick siêu rẻ', '', 1, 369, 4, 'ON'),
(2, 'Siêu Giảm Giá Hằng Ngày', 'https://cdns.diongame.com/static/WZ9KtpOdKeGr9rk.gif', 'Mỗi ngày 1 cơ hội sở hữu tài khoản giảm sốc', '', 1, 95, 1, 'ON'),
(3, 'Thử May Sơ Cấp', 'https://cdns.diongame.com/static/rXWElllTit63mXm.gif', '1000', '', 2, 104, 2, 'ON'),
(4, 'Thử Vận May Vip 1', 'https://cdns.diongame.com/static/GQGMSit5bGn92Ro.gif', '15000', '', 2, 54, 1, 'ON'),
(6, 'Acc Free Fire Tùy Chọn', '/admin/img/loaitaikhoan129668d05485b5f5_3d582cc4043821673bdea674b699931e.gif', 'mua acc nào', '', 3, 55, 0, 'ON'),
(7, 'Cày Thuê Liên Quân', '/admin/img/loaitaikhoan341668d26100a967_LIEN-QUAN-MOBILE.gif', 'nhanh chóng chất lượng', '', 4, 120, 2, 'ON'),
(8, 'Cày Thuê Free Fire', '/admin/img/loaitaikhoan681668e55ca33aa0_tải xuống (5).jfif', 'đẳng cấp', '', 4, 61, 0, 'ON'),
(9, 'Cày Thuê Roblox', '/admin/img/loaitaikhoan132668e8e585cc22_cay thue bl.png', 'ngon vcl', '', 4, 52, 0, 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_giam_gia`
--

CREATE TABLE `ma_giam_gia` (
  `id` int(11) NOT NULL,
  `magiamgia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giamgia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `theo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `batdau` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ketthuc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(100) NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `batdau` int(11) NOT NULL,
  `ketthuc` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`id`, `batdau`, `ketthuc`, `status`) VALUES
(1, 7, 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `ten_web` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `banner_web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `background` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `favicon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `key_words` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `fb_admin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sdt_admin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `group_fb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mess` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `smtp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `port_smtp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email_auto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass_mail_auto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chiet_khau_card` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ck_ctv` int(11) NOT NULL,
  `token_mm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `token_vcb` varchar(255) DEFAULT NULL,
  `token_mb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noi_dung_nap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `partner_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partner_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `web_gach_the` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thongbao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `js_web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `ten_web`, `logo`, `banner_web`, `background`, `banner`, `favicon`, `key_words`, `mo_ta`, `fb_admin`, `sdt_admin`, `email`, `group_fb`, `mess`, `smtp`, `port_smtp`, `email_auto`, `pass_mail_auto`, `chiet_khau_card`, `ck_ctv`, `token_mm`, `token_vcb`, `token_mb`, `noi_dung_nap`, `partner_id`, `partner_key`, `web_gach_the`, `thongbao`, `js_web`, `sale`) VALUES
(1, 'SHOP GAME GIÁ RẺ', 'https://upload.wikimedia.org/wikipedia/commons/5/59/Logo_GAME_Store_Iberia.png', '/assets/img/imageshopgame.jpg', '/assets/img/imageshopgame.jpg', '/assets/img/imageshopgame.jpg', '/assets/img/shopgame.png', '', 'SHOP BÁN ACC GIÁ RẺ, UY TÍN HÀNG ĐẦU VN', 'https://www.facebook.com/bdtvl', '0866969614', 'umeyelan@gmail.com', 'tozpievn@gmail.com', 'tozpievn@gmail.com', 'smtp.gmail.com', '587', 'Verimailvn@gmail.com', 'nvyncsnvyfopmygv', '10', 20, 'tokenmomo', 'tokenvietcombank', 'tokenmbbank', 'napgame', '1093678002', '17c2e0de00b53d2b4c26f62b3025ec01', 'thevn.net', '<p></p><p style=\"text-align: center;\"><span style=\"background-color:rgb(255,255,255);color:rgb(13,13,13);\"><strong>SĂN TÀI KHOẢN GIẢM GIÁ HÀNG NGÀY</strong> - <strong>Tài Khoản </strong></span><span style=\"background-color:rgb(255,255,255);color:hsl(0,75%,60%);\"><strong>Ngon</strong></span><span style=\"background-color:rgb(255,255,255);color:rgb(13,13,13);\"><strong>, Giảm Giá\r\n                    </strong></span><span style=\"background-color:rgb(255,255,255);color:hsl(0,75%,60%);\"><strong>Shock</strong></span></p><p style=\"text-align: center;\"></p>', '<p></p><div class=\"snowflakes\" aria-hidden=\"true\"><p></p><p></p><h1><br></h1><h1><p></p><p></p><p></p></h1></div><p></p><p><style></p><p>  @-webkit-keyframes snowflakes-fall {</p><p>    0% {top:-10%}</p><p>    100% {top:100%}</p><p>  }</p><p>  @-webkit-keyframes snowflakes-shake {</p><p>    0%,100% {-webkit-transform:translateX(0);transform:translateX(0)}</p><p>    50% {-webkit-transform:translateX(80px);transform:translateX(80px)}</p><p>  }</p><p>  @keyframes snowflakes-fall {</p><p>    0% {top:-10%}</p><p>    100% {top:100%}</p><p>  }</p><p>  @keyframes snowflakes-shake {</p><p>    0%,100%{ transform:translateX(0)}</p><p>    50% {transform:translateX(80px)}</p><p>  }</p><p>.snowflake {</p><p>    color: #fff;</p><p>    font-size: 1em;</p><p>    font-family: Arial, sans-serif;</p><p>    text-shadow: 0 0 5px #000;</p><p>    position:fixed;</p><p>    top:-10%;</p><p>    z-index:9999;</p><p>    -webkit-user-select:none;</p><p>    -moz-user-select:none;</p><p>    -ms-user-select:none;</p><p>    user-select:none;</p><p>    cursor:default;</p><p>    -webkit-animation-name:snowflakes-fall,snowflakes-shake;</p><p>    -webkit-animation-duration:10s,3s;</p><p>    -webkit-animation-timing-function:linear,ease-in-out;</p><p>    -webkit-animation-iteration-count:infinite,infinite;</p><p>    -webkit-animation-play-state:running,running;</p><p>    animation-name:snowflakes-fall,snowflakes-shake;</p><p>    animation-duration:10s,3s;</p><p>    animation-timing-function:linear,ease-in-out;</p><p>    animation-iteration-count:infinite,infinite;</p><p>    animation-play-state:running,running;</p><p>  }</p><p>.snowflake:nth-of-type(0){</p><p>    left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s</p><p>  }</p><p>  .snowflake:nth-of-type(1){</p><p>    left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s</p><p>  }</p><p>  .snowflake:nth-of-type(2){</p><p>    left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s</p><p>  }</p><p>  .snowflake:nth-of-type(3){</p><p>    left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s</p><p>  }</p><p>  .snowflake:nth-of-type(4){</p><p>    left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s</p><p>  }</p><p>  .snowflake:nth-of-type(5){</p><p>    left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s</p><p>  }</p><p>  .snowflake:nth-of-type(6){</p><p>    left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s</p><p>  }</p><p>  .snowflake:nth-of-type(7){</p><p>    left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s</p><p>  }</p><p>  .snowflake:nth-of-type(8){</p><p>    left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s</p><p>  }</p><p>  .snowflake:nth-of-type(9){</p><p>    left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s</p><p>  }</p><p>  .snowflake:nth-of-type(10){</p><p>    left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s</p><p>  }</p><p>  .snowflake:nth-of-type(11){</p><p>    left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s</p><p>  }</p><p></style></p>', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_nap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `session` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `bannd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `tong_nap`, `money`, `session`, `bannd`, `time`, `ip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '9', '0', '0', 'OJdh3ziW6myqJ7uWEnC1faRHwtRc9eNx', '0', '04:24 28-11-2024', '116.98.244.125');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc_tai_khoan`
--
ALTER TABLE `danh_muc_tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_caythue`
--
ALTER TABLE `don_caythue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `goi_caythue`
--
ALTER TABLE `goi_caythue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_nap_bank`
--
ALTER TABLE `history_nap_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_nap_the`
--
ALTER TABLE `history_nap_the`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_acc_game`
--
ALTER TABLE `list_acc_game`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_bank`
--
ALTER TABLE `list_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_game`
--
ALTER TABLE `list_game`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_tai_khoan`
--
ALTER TABLE `loai_tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_muc_tai_khoan`
--
ALTER TABLE `danh_muc_tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_caythue`
--
ALTER TABLE `don_caythue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `goi_caythue`
--
ALTER TABLE `goi_caythue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_nap_bank`
--
ALTER TABLE `history_nap_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_nap_the`
--
ALTER TABLE `history_nap_the`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_acc_game`
--
ALTER TABLE `list_acc_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_bank`
--
ALTER TABLE `list_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `list_game`
--
ALTER TABLE `list_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loai_tai_khoan`
--
ALTER TABLE `loai_tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
