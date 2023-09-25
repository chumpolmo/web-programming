-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 05:02 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `week09_9999-9`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cou_id` int NOT NULL,
  `cou_code` varchar(3) NOT NULL,
  `cou_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cou_id`, `cou_code`, `cou_name`) VALUES
(1, 'THA', 'ไทย'),
(2, 'ENG', 'อังกฤษ');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `usr_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `body`, `usr_id`) VALUES
(1, 'น้ำมันเครื่อง “สังเคราะห์แท้” กับ “กึ่งสังเคราะห์” แบบไหนดีกว่ากัน?', 'auto_86495', 'เมื่อถึงรอบระยะเวลาการเปลี่ยนถ่ายน้ำมันเครื่อง เจ้าของรถหลายคนอาจลังเลว่าควรเลือกใช้น้ำมันเครื่องสังเคราะห์แท้ 100% หรือกึ่งสังเคราะห์ดีกว่ากัน เพราะทั้งสองแบบมีค่าใช้จ่ายแตกต่างกันพอสมควร แถมยังใช้งานได้เหมือนๆ กัน', 1001),
(2, 'เอาด้วย! ‘เมตา’ เตรียมทดสอบเก็บค่าบริการเดือนละ 11.99 ดอลลาร์ หรือประมาณ 411 บาท', 'hitech_1574933', 'เมตา แพลตฟอร์มส บริษัทแม่ของเฟซบุ๊ก ประกาศในวันอาทิตย์ว่าอยู่ระหว่างการทดสอบระบบสมาชิกเก็บค่าบริการรายเดือน ในชื่อ Meta Verified ให้ผู้ใช้ยืนยันตัวตนในบัญชีสื่อสังคมออนไลน์ด้วยบัตรประชาชนและได้รับแถบสีฟ้าอันเป็นสัญลักษณ์ยืนยันตัวตนดังกล่าว โดยระบุว่าเป็นแผนการช่วยเหลือบรรดานักผลิตคอนเทนต์ให้สร้างชุมชนและเครือข่ายของพวกเขาได้', 1002),
(3, 'แออัดไปมั้ย? กัมพูชาจัดให้ \"บ้านพักนักกีฬาซีเกมส์\" หลังเดียวอยู่ 14 คน', 'sport_1454771', 'ความเคลื่อนไหวการแข่งขัน กีฬาซีเกมส์ ครั้งที่ 32 ที่กรุงพนมเปญ ซึ่งถือเป็นการจัดมหกรรมกีฬาที่ใหญ่ที่สุดของประเทศกัมพูชา ในรอบเกือบ 70 ปี อย่างไรก็ตามฝ่ายจัดยังคงพยายามเตรียมความพร้อมในเรื่องของบ้านพักนักกีฬาให้กับเหล่านักกีฬานานาชาติที่จะเดินทางมาแข่งขันให้ทัน', 1000),
(4, 'หมอช้างทำนาย 2 ราศี ดวงการเงินเจิดจรัส พลิกจากร้ายกลายเป็นรวย!!', 'horoscope_247277', 'หมอช้าง ทศพร ศรีตุลา ทำนายทายทักถึง 2 ราศี ดวงการเงินเจิดจรัส พลิกจากร้ายกลายเป็นรวย! นั่นคือ ราศีมังกร (ผู้ที่เกิดวันที่ 15 มกราคม - 12 กุมภาพันธ์) และ ราศีพิจิก (ผู้ที่เกิดวันที่ 17 พฤศจิกายน - 15 ธันวาคม)', 1000),
(5, 'นี่สิความเชื่อ รวมเทคนิค อิหยังวะ Gamer ในอดีตสุดฮา ที่เด็กยุคใหม่ ฟังถึงกับงง !!', 'game_1163217', 'ความทรงจำในวัยเด็กหลายคน อาจไม่เหมือนกัน แต่ใครที่เป็น Gamer ยุค 90 อาจได้สัมผัสประสบการณ์ความมูเตลูแบบ เช่น Copy ลาก icon เกมดื้อ ๆ หน้า Destop ใส่ Floppy Disk หรือ เป่าตลับเกม แล้วเกมติด เป็นต้น', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `tz_id` int DEFAULT NULL,
  `tz_code` varchar(3) NOT NULL,
  `tz_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`tz_id`, `tz_code`, `tz_name`) VALUES
(1, 'TH', 'Asia/Bangkok'),
(2, 'GH', 'Africa/Accra');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_passwd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usr_fullname` varchar(100) NOT NULL,
  `usr_username` varchar(50) NOT NULL,
  `usr_company` varchar(100) NOT NULL,
  `usr_country` varchar(3) NOT NULL,
  `usr_timezone` varchar(3) NOT NULL,
  `usr_active` tinyint(1) NOT NULL,
  `usr_role` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_email`, `usr_passwd`, `usr_fullname`, `usr_username`, `usr_company`, `usr_country`, `usr_timezone`, `usr_active`, `usr_role`) VALUES
(1000, 'usr1000@mail.com', 'pass@1234', 'Administrator', '', 'RMUTTO', 'THA', 'TH', 1, 20),
(1001, 'usr1001@mail.com', 'pass@1234', 'Somchai One', 'somchai.one', 'CPC', 'ENG', 'US', 1, 10),
(1002, 'beritokai@mail.com', 'passw0rd', 'Beritokai Bergermoo', 'beritokai', 'CPC', 'THA', 'TH', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cou_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
