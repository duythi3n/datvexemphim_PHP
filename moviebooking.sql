-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 15, 2023 lúc 03:44 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `moviebooking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `is_active`) VALUES
(1, 'admin', 'admin', '$2y$10$dbRt7igECNTReORritCCQeLdb2EBny5cnOF24LnwHtHkU1x5M6frK', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `seats` varchar(50) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `showtime_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `seats`, `total_seats`, `booking_date`, `showtime_id`, `total_price`) VALUES
(1, 2, 'A3, D4', 2, '2023-11-10', 1, '0.00'),
(11, 2, 'D3, A4', 10, '2023-11-14', 1, '100.00'),
(13, 7, 'D3, A4', 10, '2023-11-14', 1, '100.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'testuser', 'testuser@gmail.com', 'test'),
(3, 'Test', 'test@gmail.com', 'Test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`id`, `genre_name`) VALUES
(1, 'Science'),
(2, 'Adventure '),
(3, 'Drama'),
(4, ' Historical'),
(5, 'Comedy'),
(6, 'Action'),
(7, 'Biographical War');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '0',
  `director` varchar(100) NOT NULL DEFAULT '0',
  `release_date` date NOT NULL,
  `genre_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(100) NOT NULL DEFAULT '0',
  `trailer_link` varchar(255) NOT NULL DEFAULT '0',
  `description` varchar(300) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `running` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `release_date`, `genre_id`, `language`, `trailer_link`, `description`, `image`, `status`, `running`) VALUES
(9, 'Avengers', 'Kevin Feige', '2012-04-11', 1, 'English', 'https://www.youtube.com/embed/eOrNdBpGMv8', 'Test', 'aven.jpg', 1, 1),
(10, 'Rampage', 'Brad Peyton', '2018-04-13', 2, 'Hindi', '', '                                Jumanji is a 1995 American fantasy adventure film directed by Joe Johnston from a screenplay by Jonathan Hensleigh, Greg Taylor, and Jim Strain. Loosely based on Chris Van Allsburg\'s picture book of the same name, the film is the first installment of the Jumanji franc', 'rampage.jpg', 1, 0),
(13, 'Chaal Jeevi Laiye', 'Vipul Mehta', '2019-01-07', 3, 'Gujarati', 'https://www.youtube.com/embed/y1NoFZPVTr0', '                Chaal Jeevi Laiye is a story of a Father-Son’s unplanned journey to escape a workaholic existence. The duo, Aditya Parikh and his father Bipin Chandra Parikh explore the meaning of life as they meet a stranger traveler named Ketki, who takes them on a journey of surprises and realiza', 'chaal-jivi-laiye.jpg', 1, 1),
(14, 'Tanaji', 'Om Raut', '2020-01-10', 4, 'Hindi', 'https://www.youtube.com/embed/cffAGIYTEHU', '                Gulshan Kumar, T-Series & Ajay Devgn ffilms Presents official trailer of the most awaited bollywood movie TANHAJI -THE UNSUNG WARRIOR in 3D, Directed by Om Raut, will release on 10th January 2020.\r\nTanhaji- The Unsung Warrior is an Indian biographical period drama film based on the l', 'tanaji.jpeg', 1, 1),
(15, 'Playing With Fire ', 'Andrea Sedlackova', '2019-11-06', 5, 'English', 'https://www.youtube.com/embed/fd5GlZUpfaM', '                Playing with Fire is a 2019 American family comedy film directed by Andy Fickman from a screenplay by Dan Ewen and Matt Lieberman based on a story by Ewen. The film stars John Cena, Keegan-Michael Key, John Leguizamo, Dennis Haysbert, Brianna Hildebrand and Judy Greer, and follows a ', 'movieposter_en.jpg', 1, 1),
(16, 'Golmaal Again', 'Rohit Shetty', '2017-10-20', 6, 'Hindi', 'https://www.youtube.com/embed/VgQUwsUHdqc', 'Five orphan men return to the orphanage they grew up in to attend their mentor\'s funeral. However, they encounter the ghost of their childhood friend, Khushi, and help her attain salvation.', 'golmaal_again.jpg', 1, 1),
(17, 'Shreshaah', 'Vishnuvardhan', '2021-08-21', 7, 'Hindi', 'https://www.youtube.com/embed/Q0FTXnefVBA', 'The life of Indian army captain Vikram Batra, awarded with the Param Vir Chakra, India\'s highest award for valour for his actions during the 1999 Kargil War.', 'shershah.jpg', 1, 1),
(21, 'Test', 'Test', '2023-11-15', 1, 'Test', 'https://www.youtube.com/watch?v=BadhSr17g-E', 'gest', '118914956_1313702765640982_9209319587640248673_n.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `screens`
--

CREATE TABLE `screens` (
  `id` int(11) NOT NULL,
  `theater_id` int(11) DEFAULT 0,
  `screen_number` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `screens`
--

INSERT INTO `screens` (`id`, `theater_id`, `screen_number`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 1, 3),
(6, 1, 4),
(17, 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showtimes`
--

CREATE TABLE `showtimes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `showtime` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `showtimes`
--

INSERT INTO `showtimes` (`id`, `movie_id`, `theater_id`, `screen_id`, `showtime`, `price`) VALUES
(1, 9, 1, 1, '2023-11-15 15:36:00', '10.00'),
(3, 9, 1, 1, '2023-11-10 17:21:00', '0.00'),
(5, 21, 1, 1, '2023-11-15 23:34:00', '0.00'),
(7, 9, 1, 1, '2023-11-16 00:21:00', '0.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theaters`
--

CREATE TABLE `theaters` (
  `id` int(11) NOT NULL,
  `theater_name` varchar(50) DEFAULT NULL,
  `theater_address` varchar(100) DEFAULT NULL,
  `theater_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `theaters`
--

INSERT INTO `theaters` (`id`, `theater_name`, `theater_address`, `theater_phone`) VALUES
(1, 'AZIR 2D', 'Nha Trang', '0123456789'),
(2, 'AZID 3D', 'Test sdas', '0928282828'),
(4, 'AZID 4D', 'Test', '0928282828'),
(11, 'AZIR 8D', 'test', '10248129840'),
(12, 'AZIR 9D', 'test', '10248129840'),
(13, 'AZIR 9D', 'test', '10248129840'),
(15, 'AZIR 11D', 'Test2', '0931322323');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `phone`, `birthday`, `image`, `gender`) VALUES
(2, 'testuser', 'Test', 'testuser@gmail.com', '$2y$10$TX1iiEctUEHXeZvpxXjeieKZWineWiK81VqodvXmVKxHDpZ8DvePa', '0929322222', '2023-11-16', '64349336_422464855151892_7422161348181622784_n.jpg', b'1'),
(7, 'tindan', 'Jin Pham', 'tindan@gmail.com', '$2y$10$tnG7n.Tl8/YWtF4WH9qwbu6l5.N1bQx5ApcucfFlaYVSsBHku2ypC', '02931322322', '2023-11-09', '391757454_718135037010319_7638684070599160427_n.jpg', b'1'),
(10, 'tindan2', 'tindan', 'tindan@gmail.com', '$2y$10$Yu8Syazb9/WY0HK70WOi0u6p5IFQhmLn/N6Qw7EFi4YrvFN8YP0S6', '02931322322', '2023-11-15', '118914956_1313702765640982_9209319587640248673_n.jpg', b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `showtime_id` (`showtime_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `theater_screen_id` (`theater_id`,`screen_number`);

--
-- Chỉ mục cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `threater_id` (`theater_id`),
  ADD KEY `screen_id` (`screen_id`);

--
-- Chỉ mục cho bảng `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`);

--
-- Các ràng buộc cho bảng `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Các ràng buộc cho bảng `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `screens_ibfk_1` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`);

--
-- Các ràng buộc cho bảng `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `showtimes_ibfk_2` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`),
  ADD CONSTRAINT `showtimes_ibfk_3` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
