-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 02:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `bookDescription` text NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `bookPrice` decimal(4,2) NOT NULL,
  `bookQuantity` int(5) NOT NULL,
  `bookRating` int(5) NOT NULL,
  `imageLocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `bookName`, `bookDescription`, `bookAuthor`, `bookPrice`, `bookQuantity`, `bookRating`, `imageLocation`) VALUES
(1, 'FINAL YEAR PROJECT GUIDELINE\r\n', 'This book\'s main purpose is to guide the final year students from Bachelor of Project Management [Hons] and Bachelor of Industrial Technology Management [Hons] in conducting their Final Year Project [FYP] within two semesters. Final Year Project is one of the core program subjects and the authors hope that it can help the students to produce high quality research proposals, final reports, research papers and posters.\r\n', 'UMP', '36.00', 2, 5, 'fyp'),
(2, 'APPLIED CALCULUS - For Engineering & Science Students\r\n', 'This module is designed for one-semester calculus course aimed at students majoring in science and engineering. A wide variety of topics, examples and problems are provided. This module can be used as an aided tool in teaching and learning multivariable calculus.\r\nThis module consists of fours chapters. Students are introduced to polar coordinates and vectors in Chapter 1. This chapter includes the 3-dimensional graph sketching and polar curve, allowing for a source of rich illustrations and exercises. The next chapter concentrate on vector-valued functions including discussions on arc length, curvature and motion in space. Chapter 3 covers partial derivative involving functions with more than one variable. The final chapter covers multiple integrals and the applications.', 'UMP', '54.00', 1, 4, 'calculus'),
(3, 'AL-LUGHAH AL-ARABIAH BAINA AL-AINAIN LIL MUBTADIIN', 'Keistimewaan buku ini ialah ia dilengkapi dengan ‘QR code’ yang boleh diguna pakai untuk mempelajari tajuk-tajuk yang terlibat dengan cara mengimbas code yang disediakan menggunakan QR reader. Buku ini sesuai digunakanuntuk proses pengajaran dan pembelajaran kerana dilengkapi dengan Latihan mengikut topik dan tajuk yang dipelajari. Pelajar tidak hanya dibiarkan memahami teori, malah dibekalkan dengan Latihan untuk mengukuhkan kefahaman mereka dalam subjek ini. Bahasa yang digunakan oleh para penulis di dalam buku mudah untuk difahami selain ilutrasi-ilutrasi yang berkaitan turut disertakan untuk membantu kefahaman.', 'UMP', '33.00', 4, 4, 'arab'),
(4, 'KOLEKSI CONTOH SOALAN HUBUNGAN ETNIK\r\n', 'Buku ini disediakan khas sebagai rujukan untuk pelajar yang mengambil subjek hubungan etnik bagi mendalami dan memahami bentuk-bentuk soalan mengenai hubungan etnik. Buku ini menyediakan jawapan yang lengkap bagi membolehkan pelajar mebuat latih tubi pada setiap masa dan di mana jua.', 'UMP', '40.00', 2, 5, 'etnik'),
(5, 'ELECTRONIC SYSTEMS: THE ROBOT & THE APPS\r\n', 'This book introduces a wide range of programming tips, apps development techniques, internet of things, and robotics concepts including movement, obstacle detection, handling sensors, remote control and all kinds of real-world physical computing challenges. This book is for those who want to understand how these concepts can be used to build, expand and customize the robot. ', 'UMP', '26.00', 2, 5, 'elektronik'),
(6, 'STATISTICAL TABLE & FORMULAE 2.0\r\n', 'This set of tables is intended to facilitate teaching and learning of Statistics courses in matriculation program, colleges and universities. It is specially tailored for students of science, engineering and technology pursuing studies at certificates, diploma and degree levels. The binomial, Poisson, normal, t, chi-squared and F distributions have been fully tabulated using the R-language. All the values in these tables are presented to four decimal places, except for F distribution with the aim to improve the precision of answers. Beside the distributions, this list covers other statistical formulae including descriptive statistics, probability mass function (binomial, Poisson, hypergeometric, geometric and negative binomial distributions), probability density function (normal, t, chi-squared and F distributions) and inferential statistics. The statistical formulae also consist of formulae for ANOVA, regression and goodness of fit test. We hope that users will be able to fully utilize these statistical tables.', 'UMP', '12.00', 4, 5, 'statistic'),
(7, 'KEJAYAAN DALAM KEUSAHAWANAN\r\n', 'Buku ini boleh dijadikan sebagai panduan dan rujukan kepada semua pelajar yang ingin bergelar usahawan. Dalam membantu para pelajar menjadi usahawan berjaya, buku ini mengumpulkan sumbangan buah fikiran daripada penulis berpengalaman yang mampu memberi dorongan serta memotivasikan pelajar untuk menceburi bidang keusahawanan dan perniagaan. Buku ini juga mengandungi beberapa kompenen yang diperlukan untuk menjadi seorang usahawan yang berjaya. Ini termasuklah mengapa ramai yang memilih untuk menjadi usahawan, peranan keusahawanan, kemahiran keusahawanan dan kompetensi, etika, kreativiti dan inovasi, reka bentuk berfikir, cara untuk mencari peluang perniagaan, kanvas model perniagaan, pelan perniagaan yang termasuk perancangan kewangan, pengurusan projek dalam keusahawanan, pemasaran digital dan di mana untuk mendapatkan bantuan untuk pembiayaan dan inisiatif pembiayaan lain. Semoga buku ini dapat dijadikan panduan dalam membantu usahawan baharu serta pelajar dalam memahami konsep-konsep dalam keusahawanan.', '', '27.00', 2, 5, 'usahawan');

-- --------------------------------------------------------

--
-- Table structure for table `bookorder`
--

CREATE TABLE `bookorder` (
  `orderID` int(11) NOT NULL,
  `studentID` int(15) NOT NULL,
  `bookID` int(15) NOT NULL,
  `orderSelect` varchar(20) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `deliveryPrice` decimal(4,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalOrderPrice` decimal(4,2) NOT NULL,
  `paid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookorder`
--

INSERT INTO `bookorder` (`orderID`, `studentID`, `bookID`, `orderSelect`, `orderDate`, `deliveryPrice`, `quantity`, `totalOrderPrice`, `paid`) VALUES
(31, 1, 6, 'purchase', '2021-01-20 04:51:11', '5.00', 1, '17.00', 'yes'),
(32, 1, 3, 'purchase', '2021-01-20 12:51:13', '5.00', 1, '38.00', 'yes'),
(33, 1, 1, 'borrow', '2021-01-20 12:51:15', '5.00', 1, '5.00', 'yes'),
(34, 5, 2, 'purchase', '2021-01-20 12:53:47', '5.00', 1, '59.00', 'yes'),
(35, 5, 7, 'borrow', '2021-01-20 12:53:53', '5.00', 1, '5.00', 'yes'),
(36, 1, 1, 'purchase', '2021-01-20 21:11:25', '5.00', 1, '41.00', 'yes'),
(37, 1, 5, 'purchase', '2021-01-20 21:14:22', '5.00', 1, '31.00', 'yes'),
(38, 1, 2, 'purchase', '2021-01-20 21:24:19', '5.00', 1, '59.00', 'yes'),
(39, 1, 7, 'purchase', '2021-01-20 21:26:21', '5.00', 1, '32.00', 'yes'),
(40, 1, 1, 'purchase', '2021-01-20 21:28:23', '5.00', 1, '41.00', 'yes'),
(43, 1, 2, 'purchase', '2021-01-21 00:40:26', '5.00', 1, '59.00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `libraryID` int(11) NOT NULL,
  `libraryStaffName` varchar(100) NOT NULL,
  `libraryStaffEmail` varchar(100) NOT NULL,
  `libraryStaffPhoneNumber` varchar(20) NOT NULL,
  `libraryStaffPassword` varchar(100) NOT NULL,
  `libraryStaffAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`libraryID`, `libraryStaffName`, `libraryStaffEmail`, `libraryStaffPhoneNumber`, `libraryStaffPassword`, `libraryStaffAddress`) VALUES
(1, 'Akmal', 'library@gmail.com', '0123456789', 'library', 'UMP');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `studentID` int(15) NOT NULL,
  `orderID` int(15) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `paymentTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `studentID`, `orderID`, `paymentMethod`, `paymentTime`, `paymentStatus`) VALUES
(103, 1, 31, 'paypal', '2021-01-20 04:52:42', 'complete'),
(104, 1, 32, 'paypal', '2021-01-20 04:52:42', 'complete'),
(105, 1, 33, 'paypal', '2021-01-20 04:52:42', 'complete'),
(106, 5, 34, 'paypal', '2021-01-20 12:54:00', 'complete'),
(107, 5, 35, 'paypal', '2021-01-20 12:54:00', 'complete'),
(108, 1, 36, 'paypal', '2021-01-20 21:11:35', 'complete'),
(109, 1, 37, 'paypal', '2021-01-20 21:14:30', 'complete'),
(110, 1, 38, 'paypal', '2021-01-20 21:24:23', 'complete'),
(111, 1, 39, 'paypal', '2021-01-20 21:27:04', 'complete'),
(112, 1, 40, 'paypal', '2021-01-20 21:28:28', 'complete'),
(113, 1, 43, 'paypal', '2021-01-21 00:40:33', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerID` int(11) NOT NULL,
  `runnerName` varchar(100) NOT NULL,
  `runnerEmail` varchar(100) NOT NULL,
  `runnerPhoneNumber` varchar(20) NOT NULL,
  `runnerPassword` varchar(100) NOT NULL,
  `runnerAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runnerID`, `runnerName`, `runnerEmail`, `runnerPhoneNumber`, `runnerPassword`, `runnerAddress`) VALUES
(1, 'Syafiq', 'runner@gmail.com', '0156687913', 'runner', 'UMP'),
(2, 'Haikal', 'runner1@gmail.com', '01597534862', '1234', 'UMP'),
(3, 'Iman', 'iman@gmail.com', '0187539516', '1234', 'UMP');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPhoneNumber` varchar(20) NOT NULL,
  `studentPassword` varchar(100) NOT NULL,
  `studentAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `studentEmail`, `studentPhoneNumber`, `studentPassword`, `studentAddress`) VALUES
(1, 'Nik Akmal Syafiq', 'student@gmail.com', '0165597923', 'student', 'UMP'),
(2, 'Akmal', 'student1@gmail.com', '01114434310', '1234', 'UMP'),
(4, 'Ikwan', 'ikhwan@gmail.com', '0159789456', '1234', 'UMP'),
(5, 'ahmad', 'ahmad@gmail.com', '0186234589', '1234', 'UMP Gambang KK2'),
(6, 'nik', 'nik123@gmail.com', '01597536842', '1234', 'UMP Gambang KK4');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingID` int(11) NOT NULL,
  `studentID` int(15) NOT NULL,
  `bookID` int(15) NOT NULL,
  `orderID` int(15) NOT NULL,
  `runnerID` int(15) NOT NULL,
  `trackingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `salary` int(11) NOT NULL,
  `itemLocation` varchar(100) NOT NULL,
  `runnerStatus` varchar(100) NOT NULL,
  `customerStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`trackingID`, `studentID`, `bookID`, `orderID`, `runnerID`, `trackingDate`, `salary`, `itemLocation`, `runnerStatus`, `customerStatus`) VALUES
(4, 1, 6, 31, 1, '2021-01-20 12:25:08', 5, 'KK2', 'Delivered', 'Received'),
(5, 1, 3, 32, 1, '2021-01-20 12:25:06', 5, 'KK4', 'Delivered', 'Received'),
(6, 1, 1, 33, 1, '2021-01-20 12:25:03', 5, 'KK1', 'Delivered', 'Received'),
(7, 5, 2, 34, 1, '2021-01-20 21:41:55', 5, 'KK3', 'Delivered', 'Not Received Yet'),
(8, 5, 7, 35, 3, '2021-01-20 12:56:54', 5, 'KK2', 'Delivered', 'Received'),
(12, 1, 1, 36, 0, '2021-01-20 21:41:32', 5, 'KK3', 'Waiting for Pickup', 'Received'),
(17, 1, 5, 37, 0, '2021-01-20 21:34:52', 5, 'UMP library', 'Waiting for Pickup', 'Not Received Yet'),
(23, 1, 2, 38, 0, '2021-01-20 21:34:50', 5, 'UMP library', 'Waiting for Pickup', 'Not Received Yet'),
(24, 1, 7, 39, 0, '2021-01-20 21:34:47', 5, 'UMP library', 'Waiting for Pickup', 'Not Received Yet'),
(25, 1, 1, 40, 1, '2021-01-20 21:43:15', 5, 'KK2', 'Delivered', 'Received'),
(26, 1, 2, 43, 0, '2021-01-21 00:41:26', 5, 'UMP library', 'Processing Order', 'Not Received Yet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `bookorder`
--
ALTER TABLE `bookorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD UNIQUE KEY `libraryID` (`libraryID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `studentID` (`studentID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookorder`
--
ALTER TABLE `bookorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `libraryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
