-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 06:56 AM
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
-- Database: `moviebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `release_date`, `genre_id`, `language`, `trailer_link`, `description`, `image`, `status`, `running`) VALUES
(1, 'Black Panther: Wakanda Forever', 'Kevin Feige', '2020-11-11', 2, 'English', 'https://www.youtube.com/embed/RlOB3UALvrQ', 'Queen Ramonda, Shuri, M\'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T\'Challa\'s death. As the Wakandans strive to embrace their next chapter, the heroes must band together with Nakia and Everett Ross to forge a new path for their bel', 'Wankanda.jpg', 1, 1),
(2, 'Avengers', 'Kevin Feige', '2012-04-11', 1, 'English', 'https://www.youtube.com/embed/eOrNdBpGMv8', 'Test', 'aven.jpg', 1, 1),
(3, 'Chaal Jeevi Laiye', 'Vipul Mehta', '2019-01-07', 3, 'Gujarati', 'https://www.youtube.com/embed/y1NoFZPVTr0', '                Chaal Jeevi Laiye is a story of a Father-Son’s unplanned journey to escape a workaholic existence. The duo, Aditya Parikh and his father Bipin Chandra Parikh explore the meaning of life as they meet a stranger traveler named Ketki, who takes them on a journey of surprises and realiza', 'chaal-jivi-laiye.jpg', 1, 1),
(4, 'Playing With Fire ', 'Andrea Sedlackova', '2019-11-06', 5, 'English', 'https://www.youtube.com/embed/fd5GlZUpfaM', ' Playing with Fire is a 2019 American family comedy film directed by Andy Fickman from a screenplay by Dan Ewen and Matt Lieberman based on a story by Ewen. The film stars John Cena, Keegan-Michael Key, John Leguizamo, Dennis Haysbert, Brianna Hildebrand and Judy Greer, and follows a ', 'movieposter_en.jpg', 1, 1),
(5, 'Black Adam', 'Warner Bros', '2020-10-03', 4, 'English', 'https://www.youtube.com/embed/Fva_W_AF0IM?si=PhwudSNX7azpd_1Y', 'Black Adam was originally depicted as a supervillain and the ancient magical champion predecessor of Captain Marvel, who fought his way to modern times to challenge the hero and his Marvel Family associates.', 'blackadam.jpg', 1, 1),
(6, 'Spider-Man: No Way Home', 'Jon Watts', '2021-12-17', 6, 'English', 'https://www.youtube.com/embed/JfVOs4VSpmA?si=g7oPJhyfn9g2ZHFt', 'With Spider-Mans identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.', 'spiderman.jpg', 1, 1),
(7, 'Ant-Man and the Wasp: Quantumania', 'Peyton Reed', '2023-05-16', 7, 'English', 'https://www.youtube.com/embed/ZlNFpri-Y40?si=40E7qGgvqqPKTzaJ', 'The movie will see super-hero couple Scott Lang (Paul Rudd) and Hope van Dyne (Evangeline Lilly) reprise their roles as Ant-Man and the Wasp. They are joined by Michael Douglas and Michelle Pfeiffer, who return as Hopes parents, Hank Pym and Janet van Dyne. Kathryn Newton joins the cast as Cassie La', 'nguoikien.jpg', 1, 1),
(8, 'Aquaman and the Lost Kingdom', 'DC Studios', '2023-12-22', 6, 'English', 'https://www.youtube.com/embed/FV3bqvOHRQo?si=jloFhthFfHm1a9Ek', 'Aquaman and the Lost Kingdom is the much-anticipated sequel to 2018s Aquaman. It will once again be directed by James Wan, but well have to wait just that little bit longer to see it on our screens.', 'aquaman.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `genre_id` (`genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
