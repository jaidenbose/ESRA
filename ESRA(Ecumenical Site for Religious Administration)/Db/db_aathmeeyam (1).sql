-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 04:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aathmeeyam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificatetype`
--

CREATE TABLE `tbl_certificatetype` (
  `certificatetype_id` int(11) NOT NULL,
  `certificatetype_name` varchar(100) NOT NULL,
  `certificater_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_certificatetype`
--

INSERT INTO `tbl_certificatetype` (`certificatetype_id`, `certificatetype_name`, `certificater_name`) VALUES
(2, 'Baptism Certificate', 'Birth Certificate, Marriage Certificate of Parents, Aadhar Card of Parents'),
(3, 'Death Certificate', 'Proof of Birth, Affidavit specifyiing the date and time of death, Medical Certification for cause of'),
(4, 'Community Certificate', 'Photograph, Age proof, Address proof, Aadhar Card'),
(5, 'Marriage Proof', 'Identity and Address proof, Age proof, Marriage proof'),
(6, 'Bon-afide Certficate', 'Aadhar Card, Community Certificate'),
(7, 'Deshakuri Certificate', 'Aadhar Card of applicant and his/her parents');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `donation_id` int(11) NOT NULL,
  `donation_date` varchar(100) NOT NULL,
  `donation_amount` int(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `donation_status` int(11) NOT NULL DEFAULT 0,
  `donation_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`donation_id`, `donation_date`, `donation_amount`, `category_id`, `fam_id`, `donation_status`, `donation_name`) VALUES
(3, '2022-11-14', 5, 1, 1, 0, 'Cyril Sony'),
(4, '2022-11-16', 5, 1, 1, 0, 'Chrsty Sony'),
(5, '2022-11-21', 200, 2, 1, 0, 'jghgchgc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_address` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_gender` varchar(20) NOT NULL,
  `admin_dob` varchar(20) NOT NULL,
  `admin_contact` varchar(20) NOT NULL,
  `admin_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_address`, `unit_id`, `admin_mail`, `admin_pass`, `admin_gender`, `admin_dob`, `admin_contact`, `admin_image`) VALUES
(1, 'Jaiden', 'Edakkuzhiyil House\r\nPazhoor P.O\r\nPiravom', 6, 'jaiden@gmail.com', 'abcd', 'male', '2000-09-17', '8086176620', 'IMG_20220514_143302.jpg'),
(2, 'Jaiden Bose', 'Edakkuzhiyil(H)\r\nPazhoor P.O\r\nPiravom', 1, 'jaiden@gmail.com', 'abcd', 'male', '2000-09-17', '8086176620', 'image_search_1668277598035.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_auditorium`
--

CREATE TABLE `tb_auditorium` (
  `auditorium_id` int(11) NOT NULL,
  `auditorium_name` varchar(100) NOT NULL,
  `auditorium_seating` varchar(100) NOT NULL,
  `auditorium_rate` varchar(100) NOT NULL,
  `auditorium_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_auditorium`
--

INSERT INTO `tb_auditorium` (`auditorium_id`, `auditorium_name`, `auditorium_seating`, `auditorium_rate`, `auditorium_image`) VALUES
(1, 'Parish Hall', '1000', '25000', 'image_search_1668278354963.jpg'),
(2, 'Mini Parish Hall', '500', '15000', 'image_search_1668278606583.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookauditorium`
--

CREATE TABLE `tb_bookauditorium` (
  `book_id` int(11) NOT NULL,
  `auditorium_id` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `booked_date` date NOT NULL,
  `fam_id` int(11) NOT NULL,
  `book_details` varchar(100) NOT NULL,
  `booking_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bookauditorium`
--

INSERT INTO `tb_bookauditorium` (`book_id`, `auditorium_id`, `book_date`, `booked_date`, `fam_id`, `book_details`, `booking_name`) VALUES
(3, 1, '2022-11-29', '2022-11-14', 1, 'Booking for the wedding of Ajeesh and Aishwarya.', 'Marriage'),
(5, 1, '2022-12-03', '2022-11-21', 1, 'Engagement of Nivya and Arun', 'Engagement');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Kurbana'),
(2, 'Prarthana'),
(3, 'Aneedhe'),
(4, 'Perunnal Share'),
(5, 'Nercha'),
(6, 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ceremony`
--

CREATE TABLE `tb_ceremony` (
  `ceremony_id` int(11) NOT NULL,
  `ceremony_image` varchar(100) NOT NULL,
  `ceremony_name` varchar(100) NOT NULL,
  `ceremony_data` varchar(100) NOT NULL,
  `ceremony_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ceremony`
--

INSERT INTO `tb_ceremony` (`ceremony_id`, `ceremony_image`, `ceremony_name`, `ceremony_data`, `ceremony_date`) VALUES
(1, 'wed1.jpg', 'Marriage', 'George weds Serene', '2022-11-13'),
(3, 'wed2.jpg', 'Marriage', 'Jobin weds Neena', '2022-11-13'),
(4, 'bapt1.jpg', 'Baptism', 'Ivan gets baptised', '2022-11-13'),
(5, 'engage.jpg', 'Engagement', 'Sneha is engaged to Robin', '2022-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_certificate`
--

CREATE TABLE `tb_certificate` (
  `certificate_id` int(11) NOT NULL,
  `certificate_name` varchar(60) NOT NULL,
  `certificate_requirements` varchar(500) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `certificatetype_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_certificate`
--

INSERT INTO `tb_certificate` (`certificate_id`, `certificate_name`, `certificate_requirements`, `fam_id`, `certificatetype_id`, `booking_status`) VALUES
(9, 'mj hgb', 'jhhjhj ', 1, 1, 1),
(10, 'jhvghbcghjn', ' khvutffuyhj', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_churchgallery`
--

CREATE TABLE `tb_churchgallery` (
  `gid` int(11) NOT NULL,
  `g_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_churchgallery`
--

INSERT INTO `tb_churchgallery` (`gid`, `g_photo`) VALUES
(1, 'image_search_1668278669255.jpg'),
(2, 'image_search_1668278710418.jpg'),
(3, 'image_search_1668278692475.jpg'),
(4, 'image_search_1668278772699.jpg'),
(5, 'IMG20221002183806.jpg'),
(6, 'image_search_1668278918021.jpg'),
(7, 'Snapchat-729006254.jpg'),
(8, 'Snapchat-485352114.jpg'),
(9, 'IMG20221002183710.jpg'),
(10, 'Snapchat-1320873045.jpg'),
(11, 'image_search_1668279087542.jpg'),
(12, 'image_search_1668278858523.jpg'),
(13, 'image_search_1668278864444.jpg'),
(14, 'image_search_1668278850019.jpg'),
(15, 'Snapchat-1277100683.jpg'),
(16, 'image_search_1668278802656.jpg'),
(17, 'image_search_1668278879348.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_district`
--

CREATE TABLE `tb_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_district`
--

INSERT INTO `tb_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(2, 'Kottayam'),
(3, 'Idukki'),
(4, 'Kannur'),
(5, 'Thrissur'),
(6, 'Kozhikode'),
(7, 'Trivandrum'),
(8, 'Palakkkad'),
(9, 'Kollam'),
(10, 'Alappuzha'),
(11, 'Malappuram'),
(12, 'Pathanamthitta'),
(13, 'Wayanad'),
(14, 'Kasargod'),
(15, 'Kalpetta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `event_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`event_id`, `event_name`, `event_date`, `event_location`) VALUES
(5, 'Losok Ambo  (Awareness Class Against Drugs Conducted By Sri Ajayanadh(DYSP Puthencruz))', '2022-11-13', 'Post Office Junction Piravom'),
(6, 'Dhyana Yogam', '2022-11-12', 'Parish Hall'),
(7, 'Carol Night', '2022-12-31', 'Church Ground'),
(9, 'Blood Donation Camp', '2022-11-19', 'Mini Parish Hall');

-- --------------------------------------------------------

--
-- Table structure for table `tb_family`
--

CREATE TABLE `tb_family` (
  `fam_id` int(11) NOT NULL,
  `fam_name` varchar(50) NOT NULL,
  `fam_headname` varchar(30) NOT NULL,
  `fam_member` varchar(20) NOT NULL,
  `fam_address` varchar(100) NOT NULL,
  `fam_mail` varchar(50) NOT NULL,
  `fam_pass` varchar(50) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `fam_gender` varchar(20) NOT NULL,
  `fam_dob` varchar(20) NOT NULL,
  `fam_contact` varchar(20) NOT NULL,
  `fam_image` varchar(50) NOT NULL,
  `fam_status` int(11) NOT NULL,
  `fam_occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_family`
--

INSERT INTO `tb_family` (`fam_id`, `fam_name`, `fam_headname`, `fam_member`, `fam_address`, `fam_mail`, `fam_pass`, `unit_id`, `fam_gender`, `fam_dob`, `fam_contact`, `fam_image`, `fam_status`, `fam_occupation`) VALUES
(1, 'Edakkuzhiyil', 'Bose E Chackochan', '3', 'Edakkuzhiyil (H)\r\nPazhoor P.O\r\nPiravom', 'rxanto93@gmail.com', 'abcd', 1, 'male', '1968-05-05', '9446684472', 'image_search_1668277604647.jpg', 1, 'Driver'),
(2, 'Madhurayil', 'Saju K V', '3', 'Madhurayil (H)\r\nPazhoor P.O\r\nPiravom', 'kvsaju@gmail.com', 'abcd', 4, 'male', '1980-08-15', '7987425185', 'image_search_1668277708736.jpg', 1, 'Politician'),
(3, 'Kunnath', 'Jijin George', '3', 'Kunnath House\r\nPiravom P.O\r\nPiravom', 'jijin@gmail.com', 'abcd', 2, 'male', '1986-02-08', '9988457898', 'image_search_1668277621617.jpg', 1, 'Photographer'),
(4, 'Pariyarath', 'Baby John', '0', 'Pariyarath House\r\nKakkad P.O\r\nPiravom', 'baby@gmail.com', 'abcd', 3, 'male', '1965-04-25', '8547875489', 'image_search_1668277727185.png', 1, 'Farmer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_photo` varchar(100) NOT NULL,
  `gallery_caption` varchar(100) NOT NULL,
  `auditorium_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`gallery_id`, `gallery_photo`, `gallery_caption`, `auditorium_id`) VALUES
(1, 'image_search_1668278321837.jpg', 'Main Entrance and Outer View', 1),
(2, 'image_search_1668278333123.jpg', 'View from inside', 1),
(3, 'image_search_1668278339140.jpg', 'View from inside', 1),
(4, 'image_search_1668278348770.jpg', 'View from inside', 1),
(5, 'image_search_1668278606583.jpg', 'View from stage', 2),
(6, 'image_search_1668278580957.jpg', 'View from inside', 2),
(7, 'image_search_1668278561506.jpg', 'View from inside', 2),
(8, 'image_search_1668278580957.jpg', 'View from inside', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `news_id` int(11) NOT NULL,
  `news_date` varchar(100) NOT NULL,
  `news_content` varchar(100) NOT NULL,
  `news_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`news_id`, `news_date`, `news_content`, `news_image`) VALUES
(2, '2022-11-05', 'Dhyana Yogam', 'dyanam.jpg'),
(3, '2022-11-13', 'Say No To Drugs', 'drug.jpg'),
(4, '2022-11-12', 'Character Development Class', 'class.jpg'),
(5, '2022-11-12', 'Holy Sacrament of the sick', 'kantheela.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_place`
--

CREATE TABLE `tb_place` (
  `place_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_place`
--

INSERT INTO `tb_place` (`place_id`, `district_id`, `place_name`) VALUES
(1, 1, 'Piravom'),
(2, 1, 'Pazhoor'),
(3, 1, 'Peppathy'),
(4, 1, 'Arakkunnam'),
(5, 1, 'Maneed'),
(6, 1, 'Kakkad'),
(7, 1, 'Palachuvad'),
(8, 1, 'Onakkoor'),
(9, 1, 'Mammalasery'),
(10, 1, 'Kalamboor'),
(11, 2, 'Mulakulam'),
(12, 2, 'Peruva'),
(13, 2, 'Avarma'),
(14, 2, 'Kaduthuruthy'),
(15, 2, 'Ettumanur'),
(16, 3, 'Devikkulam'),
(17, 3, 'Marayur'),
(18, 4, 'Thalassery'),
(19, 4, 'Mattanur'),
(20, 5, 'Chelakkara'),
(21, 5, 'Kannara'),
(22, 6, 'Mannanchira'),
(23, 6, 'Payyanur'),
(24, 7, 'Veli'),
(25, 7, 'Neyyar'),
(26, 8, 'Malambuzha'),
(27, 8, 'Nellyambathi'),
(28, 9, 'Ochira'),
(29, 9, 'Ayoor'),
(30, 10, 'Ambalapuzha'),
(31, 10, 'Chengannur'),
(32, 11, 'Nilamboor'),
(33, 11, 'Tirur'),
(34, 12, 'Adoor'),
(35, 12, 'Panthalam'),
(36, 13, 'Kuruva'),
(37, 13, 'Edakkall'),
(38, 14, 'Ranipuram'),
(39, 14, 'Parappa'),
(40, 15, 'Chembra'),
(41, 15, 'Meenmutty');

-- --------------------------------------------------------

--
-- Table structure for table `tb_priest`
--

CREATE TABLE `tb_priest` (
  `priest_id` int(11) NOT NULL,
  `priest_name` varchar(40) NOT NULL,
  `priest_address` varchar(100) NOT NULL,
  `priest_email` varchar(50) NOT NULL,
  `priest_pass` varchar(50) NOT NULL,
  `priest_number` varchar(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `priest_dob` varchar(20) NOT NULL,
  `priest_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_priest`
--

INSERT INTO `tb_priest` (`priest_id`, `priest_name`, `priest_address`, `priest_email`, `priest_pass`, `priest_number`, `place_id`, `priest_dob`, `priest_image`) VALUES
(1, 'Varghese Panachiyil', 'Panachiyil House\r\nPiravom P.O', 'varghese@gmail.com', 'abcd', '8878584896', 1, '1987-05-04', 'image_search_1668277716825.jpg'),
(2, 'Eldho Paul', 'Madhurayil House\r\nPazhoor P.O', 'eldho@gmail.com', 'abcd', '9978547588', 3, '1990-08-22', 'image_search_1668277727185.png'),
(3, 'Basil John', 'Chellikattil House\r\nPazhhor P.O', 'basil@gmail.com', 'abcd', '8875968478', 2, '1989-02-14', 'image_search_1668277727185.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `service_id` int(11) NOT NULL,
  `service_date` varchar(100) NOT NULL,
  `service_location` varchar(100) NOT NULL,
  `service_for_date` varchar(100) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `service_for_time` varchar(100) NOT NULL,
  `priest_id` int(11) NOT NULL,
  `service_bookmark` varchar(100) NOT NULL,
  `service_comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_service`
--

INSERT INTO `tb_service` (`service_id`, `service_date`, `service_location`, `service_for_date`, `fam_id`, `servicetype_id`, `service_for_time`, `priest_id`, `service_bookmark`, `service_comments`) VALUES
(2, '2022-11-14', 'Mamalakavala', '2022-11-24', 1, 1, '19:24', 1, 'Near AGCM old age home, opposite to Vijaya Hotel', ''),
(3, '2022-11-16', 'Kallumary', '2022-11-27', 1, 5, '20:30', 0, 'At Kallumary St George Chappel', 'Gospel service is requested for the Kudumbaunit meeting.'),
(4, '2022-11-21', 'jgcghcjc', '2022-11-17', 1, 1, '16:33', 0, 'gcuhjuy', 'yuftf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servicetype`
--

CREATE TABLE `tb_servicetype` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_servicetype`
--

INSERT INTO `tb_servicetype` (`servicetype_id`, `servicetype_name`) VALUES
(1, 'House Warming'),
(2, 'Vehicle Blessing'),
(3, 'Last rites'),
(4, 'Prayer'),
(5, 'Gospel'),
(6, 'Marriage'),
(7, 'Engagement'),
(8, 'Ethirelppu'),
(9, 'Functions');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`unit_id`, `unit_name`, `place_id`) VALUES
(1, 'Unit 1', 1),
(2, 'Unit 2', 1),
(3, 'Unit 3', 2),
(4, 'Unit 4', 3),
(5, 'Unit 5', 4),
(6, 'Unit 6', 5),
(7, 'Unit 7', 6),
(8, 'Unit 8', 6),
(9, 'Unit 9', 7),
(10, 'Unit 10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_contact` varchar(25) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_address`, `unit_id`, `user_mail`, `user_pass`, `user_gender`, `user_dob`, `user_contact`, `user_image`, `fam_id`, `occupation`) VALUES
(1, 'Justin Bose', 'Edakkuzhiyil (H)\r\nPazhoor P.O\r\nPiravom', 1, 'justin@gmail.com', 'abcd', 'male', '1997-08-04', '8848551633', 'image_search_1668277598035.png', 1, 'Advocate'),
(2, 'Beena Bose', 'Edakkuzhiyil (H)\r\nPazhoor P.O\r\nPiravom', 1, 'beena@gmail.com', 'abcd', 'female', '1988-05-09', '9544921516', 'image_search_1668278170622.jpg', 1, 'Tailor'),
(3, 'Mariyamma Chacko', 'Edakkuzhiyil House \r\nPazhoor P.O \r\nPiravom', 1, 'mariyamma@gmail.com', 'abcd', 'female', '1946-11-15', '9446684472', 'image_search_1668278170622.jpg', 1, 'Homemaker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_certificatetype`
--
ALTER TABLE `tbl_certificatetype`
  ADD PRIMARY KEY (`certificatetype_id`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_auditorium`
--
ALTER TABLE `tb_auditorium`
  ADD PRIMARY KEY (`auditorium_id`);

--
-- Indexes for table `tb_bookauditorium`
--
ALTER TABLE `tb_bookauditorium`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_ceremony`
--
ALTER TABLE `tb_ceremony`
  ADD PRIMARY KEY (`ceremony_id`);

--
-- Indexes for table `tb_certificate`
--
ALTER TABLE `tb_certificate`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `tb_churchgallery`
--
ALTER TABLE `tb_churchgallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `tb_district`
--
ALTER TABLE `tb_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tb_family`
--
ALTER TABLE `tb_family`
  ADD PRIMARY KEY (`fam_id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tb_place`
--
ALTER TABLE `tb_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tb_priest`
--
ALTER TABLE `tb_priest`
  ADD PRIMARY KEY (`priest_id`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tb_servicetype`
--
ALTER TABLE `tb_servicetype`
  ADD PRIMARY KEY (`servicetype_id`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_certificatetype`
--
ALTER TABLE `tbl_certificatetype`
  MODIFY `certificatetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_auditorium`
--
ALTER TABLE `tb_auditorium`
  MODIFY `auditorium_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bookauditorium`
--
ALTER TABLE `tb_bookauditorium`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ceremony`
--
ALTER TABLE `tb_ceremony`
  MODIFY `ceremony_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_certificate`
--
ALTER TABLE `tb_certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_churchgallery`
--
ALTER TABLE `tb_churchgallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_district`
--
ALTER TABLE `tb_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_family`
--
ALTER TABLE `tb_family`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_place`
--
ALTER TABLE `tb_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_priest`
--
ALTER TABLE `tb_priest`
  MODIFY `priest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_servicetype`
--
ALTER TABLE `tb_servicetype`
  MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
