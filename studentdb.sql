-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2026 at 06:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_gender` varchar(50) NOT NULL,
  `student_age` int(11) NOT NULL,
  `student_class` varchar(50) NOT NULL,
  `image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_gender`, `student_age`, `student_class`, `image_path`) VALUES
(1, 'Ali', 'male', 12, '21', 'images/download.jfif'),
(2, 'aliyan', 'male', 21, '12', 'images/aliyan.jfif'),
(3, 'shayan', 'male', 20, '12', 'images/shayan.jfif'),
(4, 'daniyal', 'male', 21, '22', 'images/daniyal.jfif'),
(5, 'Hasan', 'male', 12, '21', 'images/hasan.jfif'),
(6, 'sufyan', 'male', 12, '21', 'images/sufyan.jfif'),
(7, 'Sara', 'female', 34, '43', 'images/sara.jfif'),
(8, 'yahya', 'male', 12, '21', 'images/yahya.jfif'),
(9, 'hamza ali', 'male', 46, '55', 'images/newhamza.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'tasbeeljawed', 'tasbeel@aptechnorth.edu.pk', '$2y$10$KTAG9AiYCd6wCXlmSjTBs.g7ZaI.yb5XEvq7eFmMNy48TwSfmCG8W'),
(2, 'hassam', 'hassam.4354@gmail.com', '$2y$10$6OH9fTb.Zy6l7cspSn1I..NZ9oauVuO1FdSG6tm3IYONMKD8DoubO'),
(3, 'hassam2.0', 'hassam.4354+123@gmail.com', '$2y$10$z6CABtkYTZHKOJLYHpw2z.63KWfNz162H2XouzMUyY4MDjtdvQwRW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
