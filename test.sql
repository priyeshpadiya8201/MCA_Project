-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2025 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `d_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `tem_name` varchar(40) NOT NULL,
  `damount` decimal(10,0) NOT NULL,
  `pay_method` varchar(30) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `expiryDate` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `f_name`, `l_name`, `email`, `mobile_no`, `tem_name`, `damount`, `pay_method`, `cardNumber`, `expiryDate`, `cvv`) VALUES
(1, 'yaju', 'gohil', 'demo78@gmail.com', 2147483647, '', 85214, '', '8956235689235689', '0000-00', '564'),
(2, 'jatin', 'bhatiya', 'jatinbhatiya123@gmail.com', 1234567890, 'temple1', 899, '', '1234567890123456', '0000-00', '233'),
(3, 'jatin', 'bhatiya', 'jatinbhatiya123@gmail.com', 1234567890, 'temple1', 899, '', '1234567890123456', '0000-00', '233'),
(4, 'jatin', 'bhatiya', 'jatinbhatiya123@gmail.com', 1234567890, 'temple1', 899, '', '1234567890123456', '0000-00', '233'),
(5, 'jatin', 'bhatiya', 'jatinbhatiya123@gmail.com', 1234567890, 'temple1', 899, '', '1234567890123456', '0000-00', '233'),
(6, 'jatin', 'bhatiya', 'jatinbhatiya123@gmail.com', 1234567890, 'temple1', 899, '', '1234567890123456', '0000-00', '233'),
(7, 'sagar', 'soneji', 'example123@gmail.com', 2147483647, 'Srikalahasti Temple', 7890, 'debitCard', '0987654321234567', '0000-00', '123'),
(8, 'sagar', 'soneji', 'example123@gmail.com', 2147483647, 'Srikalahasti Temple', 7890, 'debitCard', '0987654321234567', '0000-00', '123'),
(9, 'sagar', 'soneji', 'example123@gmail.com', 2147483647, 'Srikalahasti Temple', 7890, 'debitCard', '0987654321234567', '12/2023', '123'),
(10, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(11, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(12, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(13, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(14, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(15, 'sagar', 'soneji', 'sagarssv112@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 9000, 'debitCard', '1234567890123456', '07/2030', '899'),
(16, 'sagar', 'soneji', 'sagarsoneji999@gmail.com', 2147483647, 'Parshuram Kund', 8000, 'creditCard', '1234567890123456', '12/2003', '123'),
(17, 'janavi', 'soneji', 'janavisoneji128@gmail.com', 2147483647, 'Srikalahasti Temple', 10000, 'debitCard', '9089786756453423', '09/2033', '789'),
(18, 'janavi', 'soneji', 'janavisoneji128@gmail.com', 2147483647, 'Srikalahasti Temple', 20000, 'debitCard', '9089786756453423', '09/2033', '789'),
(19, 'kunj', 'bosmiya', 'kunjkhatri032@gmail.com', 2147483647, 'Srikalahasti Temple', 70000, 'creditCard', '3456788900356567', '06/2035', '788'),
(20, 'vijay', 'soneji', 'vijaysoneji2d@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 34567, 'debitCard', '1234567880098766', '12/2024', '234'),
(21, 'charulataben', 'soneji', 'charuben14170@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 10000, 'creditCard', '1234567890123456', '05/2030', '890'),
(22, 'manav', 'bhojani', 'manava@gamil.com', 1234567890, 'Tirumala venkateswara temple tirupati', 12000, 'debitCard', '1234567890', '12/2030', '999'),
(23, 'smit', 'patel', 'smitpatel@gmail.com', 1098765356, 'Tirumala venkateswara temple tirupati', 123456, 'debitCard', '1234567890987654', '12/2030', '233'),
(24, 'dhruv', 'bhatt', 'dhruvbhatt890@gmail.com', 1290238934, 'Srikalahasti Temple', 78901, 'creditCard', '1234567897654323', '02/2029', '654'),
(25, 'smith', 'patel', 'smitpatel123@gmail.com', 1234567890, 'Tirumala venkateswara temple tirupati', 3000, 'debitCard', '1234567890876543', '12/2026', '232'),
(26, 'madhav', 'gohel', 'madhavgohel34@gmail.com', 1234567890, 'Tirumala venkateswara temple tirupati', 4311, 'debitCard', '7654322345678909', '11/2030', '367'),
(27, 'kunj', 'bosmiya', 'kunjkhatri032@gmail.com', 2147483647, 'Tirumala venkateswara temple tirupati', 4000, 'debitCard', '8765445678987654', '12/2030', '467');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(10) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_img` varchar(255) NOT NULL,
  `e_date` date NOT NULL,
  `e_location` text NOT NULL,
  `e_dec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_name`, `e_img`, `e_date`, `e_location`, `e_dec`) VALUES
(2, 'Ram Navami', 'Ayodhya.jpg', '2023-04-04', 'Ayodhya is a town located in south-central Uttar Pradesh state, on the Ghaghara River, just east of Faizabad.', 'Ram Navami celebrations in Ayodhya, Uttar Pradesh, epitomize an unparalleled spiritual fervor and cultural grandeur. Ayodhya, revered as the birthplace of Lord Rama, becomes a kaleidoscope of vibrant festivities during this auspicious occasion. The city resonates with the echoes of devotional hymns and resonant chants as devotees from far and wide converge upon its sacred soil to commemorate the divine birth of Lord Rama. Elaborate decorations adorn the streets, temples, and homes, with colorful rangolis, floral arrangements, and illuminated diyas illuminating the cityscape. Temples, particularly the revered Ram Mandir, become focal points of reverence and devotion, where priests perform elaborate rituals and conduct special prayers throughout the day. The air is infused with the sweet fragrance of incense, and the sound of conch shells reverberates in the atmosphere, creating an ambiance of divine serenity and spiritual bliss. The celebration culminates in grand processions, where devotees joyously participate, singing devotional songs and chanting the name of Lord Rama with unwavering devotion. Ram Navami in Ayodhya is not merely a festival; it is a spiritual odyssey that binds hearts in devotion, transcending barriers of time and space, and reaffirming faith in the eternal glory of Lord Rama.'),
(3, 'Maha Shivaratri', 'r.jpg', '2023-02-18', 'The Somnath temple is a Hindu temple located in Prabhas Patan, Veraval, Saurashtra region of Gujarat, India.', 'Somnath Temple, located in Gujarat, India, is renowned for its grand celebration of Maha Shivaratri. On this auspicious occasion, the temple premises are adorned with colorful decorations, lights, and vibrant festivities. Devotees from far and wide flock to the temple to offer prayers to Lord Shiva, the presiding deity of Somnath, and seek his blessings. The atmosphere is filled with spirituality, as devotees engage in various rituals, including Rudrabhishekam, chanting of sacred hymns, and performing traditional dances. Special pujas and ceremonies are conducted throughout the day and night, culminating in the Mahapuja, a significant highlight of the celebration. The temple resonates with the sound of bells and devotional songs, creating an ambiance of divine fervor and reverence. Maha Shivaratri at Somnath Temple is not just a religious event but also a cultural extravaganza that showcases the rich heritage and spiritual significance of this ancient pilgrimage site.'),
(4, 'Guru Purnima', 'guru.jpg', '2023-07-03', 'Shirdi is a city and pilgrimage site in the Indian state of Maharashtra, located in the Rahata taluka of Ahmednagar District.', 'Guru Purnima, a significant festival celebrated by devotees worldwide, holds special reverence at the Shirdi Sai Baba Temple in Shirdi, Maharashtra, India. This auspicious occasion, typically falling in the Hindu month of Ashadha (June-July), pays homage to spiritual gurus, teachers, and mentors, commemorating their invaluable contributions to society.  At the Shirdi Sai Baba Temple, Guru Purnima is marked by fervent devotion and elaborate ceremonies. Devotees throng to the temple premises, seeking blessings from Sai Baba, the revered saint who preached love, compassion, and universal brotherhood. The temple is adorned with vibrant decorations, and the air is filled with the melodious chants of Sai Bhajans and hymns, evoking a sense of divine grace and tranquility.  Special rituals and prayers are conducted throughout the day, honoring the divine teachings of Sai Baba and expressing gratitude for his spiritual guidance. The devotees offer floral tributes, perform aarti, and participate in charitable activities as a mark of reverence and devotion to their beloved Guru.  Guru Purnima at the Shirdi Sai Baba Temple is not just a religious festival; it is a spiritual journey that fosters introspection, self-realization, and inner transformation. It serves as a reminder of the timeless wisdom imparted by Sai Baba and inspires devotees to tread the path of righteousness, kindness, and service to humanity. The celebration encapsulates the essence of Guru-disciple relationship, fostering a deep sense of connection and devotion among devotees towards their revered Guru, Sai Baba.'),
(5, 'Krishna Janmashtami', 'kj.jpg', '2023-09-06', 'The ISKCON Temple in Bangalore is located on the Hare Krishna Hills in North Bangalore.', 'ISKCON Bangalore celebrates Sri Krishna Janmashtami with great fervor at two locations. At Hare Krishna Hill (Rajajinagar), the Deities of Sri Krishna and His consorts are anointed with fragrant oils, given ceremonial abhisheka, and showered with flowers. Devotees participate in divine darshan, grand aartis, and kirtan. Prasadam is distributed to all. The celebrations also take place at Vaikuntha Hill (Vasanthapura) in the SRI Rajadhiraja Govinda Temple. Devotees seek blessings and immerse themselves in the joyous atmosphere. '),
(6, 'Ganesh Chaturthi', 'ozar-vighnahar-ganpati-ashtavinayak.jpg', '2024-09-07', 'Siddhivinayak Temple S.K.Bole Marg, Prabhadevi, Mumbai, Maharashtra 400028 India', 'The temple celebrates three main festivals. The Ganesh Chaturthi festival is celebrated from the first to the fifth day of the Hindu month of Bhadrapada, where Ganesh Chaturthi is the fourth day. A festival is held to commemorate the birthday of Ganesha – Ganesha Jayanti, on the fourth day of the Hindu month of Magha. This festival is celebrated from the first to the fifth day of Magha. The palkhi of Ganesha is taken for three consecutive days in these festivals.'),
(7, 'dummy', '1760337230_2.jpg,1760337230_3.jpg,1760337230_4.jpg,1760337230_5.jpg', '2025-10-15', 'surat', 'dummy'),
(8, 'somnath', '1760337230_bg1.jpg,1760337230_bg2.png,1760337230_bg4.png,1760337230_bg5.jpg', '2025-10-24', 'geer', 'somnath');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(3) NOT NULL,
  `o_ref` varchar(20) NOT NULL,
  `o_name` varchar(60) NOT NULL,
  `o_amt` int(5) NOT NULL,
  `p_method` varchar(15) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `c_no` varchar(20) NOT NULL,
  `exp_m` varchar(15) NOT NULL,
  `exp_y` int(5) NOT NULL,
  `c_cvv` int(4) NOT NULL,
  `ship_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `o_ref`, `o_name`, `o_amt`, `p_method`, `c_name`, `c_no`, `exp_m`, `exp_y`, `c_cvv`, `ship_address`) VALUES
(1, '', 'alikiki Indian God Radha Krishna', 240, 'credit card', 'soneji vijaykumar n', '0', 'december', 2028, 789, ''),
(2, '', 'Bronze Hindu Goddess Lakshmi On Lotus Hinduism Display Statu', 150, 'debit card', 'soneji charuben v', '', 'december', 2029, 986, ''),
(3, '', 'alikiki Indian God Radha Krishna', 240, 'credit card', 'soneji vijaykumar n', '567890876543217', 'december', 2034, 765, ''),
(4, '', 'Bronze Hindu Goddess Lakshmi On Lotus Hinduism Display Statu', 150, 'cash on deliver', '', '', '', 0, 0, ''),
(5, '', 'Durga Female Hindu Statue with Lion', 260, 'cash on deliver', '', '', '', 0, 0, ''),
(6, '', 'alikiki Indian God Radha Krishna', 240, 'cash on deliver', '', '', '', 0, 0, ''),
(7, '', 'Bronze Hindu Goddess Lakshmi On Lotus Hinduism Display Statu', 150, '', 'deep tokle k', '9876543213456789', 'septmber', 2030, 987, ''),
(8, '', 'alikiki Indian God Radha Krishna', 240, 'debit card', 'anshu bist j', '0987455634122345', 'septmber', 2020, 789, ''),
(12, 'ORD-B18BFBC2', 'dummy (x36), newproduct (x1), dummy (x2)', 12450, 'Credit Card', 'kunjbosamiya', '8888-8888-8888', 'September', 2028, 522, 'Sastrinagar\r\nBhavangar'),
(13, 'ORD-B18BFBC2', 'dummy (x36), newproduct (x1), dummy (x2)', 12450, 'Credit Card', 'kunjbosamiya', '8888-8888-8888', 'September', 2028, 522, 'Sastrinagar\r\nBhavangar'),
(14, 'ORD-4660EA7B', 'dummy (x5), newproduct (x1)', 1725, 'Credit Card', 'sagar soneji', '5656-5656-5656', 'June', 2036, 235, 'mig-95'),
(15, 'ORD-1E2E9F8D', 'dummy (x1)', 325, 'Credit Card', 'kunjkhatri', '9999-9999-9999', 'November', 225, 125, 'Sastrinagar\r\nBhavangar'),
(16, 'ORD-F7F57F6B', 'newproduct (x1)', 100, 'Debit Card', 'xyz', '8888-8888-8888', 'February', 3202, 789, 'Sastrinagar\r\nBhavangar');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_dec` text NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_stock` int(11) NOT NULL DEFAULT 0,
  `p_quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_img`, `p_name`, `p_dec`, `p_price`, `p_stock`, `p_quantity`) VALUES
(23, 'images.jpeg', 'dummy', 'dummy shop product details ', 325, 100, 1),
(24, 'images.jpeg', 'dummy', 'dummy shop product details ', 325, 100, 1),
(25, 'images.jpeg', 'dummy', 'dummy shop product details ', 325, 100, 1),
(26, 'images.jpeg', 'dummy', 'dummy shop product details ', 325, 100, 1),
(27, 'bg1.jpg', 'newproduct', 'new', 100, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registraction`
--

CREATE TABLE `registraction` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `m_number` bigint(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registraction`
--

INSERT INTO `registraction` (`id`, `fullname`, `email`, `address`, `m_number`, `city`, `state`, `pincode`) VALUES
(9, 'sagar soneji', 'sagar123@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '123456'),
(10, 'sagar soneji', 'sagar123@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '123456'),
(11, 'sagar soneji', 'sagar123@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '123456'),
(12, 'jatin bhatiya', 'jatinbhatiya123@gmail.com', 'gaytrinagar', 9876543211, 'bhavnagar', 'gujrat', '364001'),
(13, 'janavi Soneji', 'janavisoneji23@gmail.com', 'shivaji circle ', 7690123456, 'bhavnagar', 'gujrat', '364001'),
(14, 'janavi Soneji', 'janavisoneji128@gmail.com', 'shivaji circle ', 9987654321, 'vadodara', 'gujrat', '364001'),
(15, 'charuben soneji', 'charulta14170@gmail.com', 'plot no 2412/c shivaji circle', 9889441956, 'bhavnagar', 'gujrat', '364001'),
(16, 'sagar soneji', 'didi12@gmail.com', 'plot no 2412/c shivaji circle', 1234567890, 'vadodara', 'gujrat', '8654568'),
(17, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(18, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(19, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(20, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(21, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(22, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(23, 'janavi Soneji', 'wamukunju@gmail.com', 'shivaji circle ', 1234567890, 'bhavnagar', 'gujrat', '364001'),
(24, 'kunju bosmiya', 'kunjkhatri032@gmail.com', 'ruva', 5678909876, 'ghandinagar', 'gujrat', '34589'),
(25, 'kunju bosmiya', 'kunjkhatri032@gmail.com', 'ruva', 5678909876, 'ghandinagar', 'gujrat', '34589'),
(26, 'kunju bosmiya', 'kunjkhatri032@gmail.com', 'ruva', 5678909876, 'ghandinagar', 'gujrat', '34589'),
(27, 'kunju bosmiya', 'kunjkhatri032@gmail.com', 'ruva', 5678909876, 'ghandinagar', 'gujrat', '34589'),
(28, 'janavi Soneji', 'sagarssv112@gmail.com', 'shivaji circle ', 1234567890, 'vadodara', 'gujrat', '364001'),
(29, 'kunju bosmiya', 'wamukunju@gmail.com', 'SHASHTRINAGAR', 9457895422, 'bhavnagar', 'gujrat', '567880'),
(30, 'deep tokle', 'deept@gmail.com', 'ghogha road', 7890654324, 'rajkot', 'gujrat', '678954'),
(31, 'anshu ', 'bist', 'bhumbhali ', 7809653467, 'jamnagar', 'gujrat', '98065'),
(32, 'Kunj Bosamiya', 'dhruvi@gmail.com', 'Sastrinagar\r\nBhavangar', 9054156587, 'Bhavangar', 'Gujarat', '364001'),
(33, 'Kunj Bosamiya', 'dhruvi@gmail.com', 'Sastrinagar\r\nBhavangar', 9054156587, 'Bhavangar', 'Gujarat', '364001'),
(34, 'jiga', 'bosamiyakunj936@gmail.com', 'Sastrinagar\r\nBhavangar', 5555555555, 'Bhavangar', 'Gujarat', '364001'),
(35, 'Kunj Bosamiya', 'dhruvi@gmail.com', 'Sastrinagar\r\nBhavangar', 5555555555, 'Bhavangar', 'Gujarat', '364001'),
(36, 'Kunj Bosamiya', 'dhruvi@gmail.com', 'Sastrinagar\r\nBhavangar', 5555555555, 'Bhavangar', 'Gujarat', '364001'),
(37, 'Kunj Bosamiya Khatri', 'kunj90@gmail.com', 'Sastrinagar\r\nBhavangar s', 1235647896, 'Bhavangar', 'Gujarat', '364001'),
(38, 'Kunj Bosamiya', 'raj12@gmail.com', 'Sastrinagar\r\nBhavangar', 9054156587, 'Bhavangar', 'Gujarat', '364001'),
(39, 'Kunj Bosamiya', 'dummy78@gmail.com', 'Sastrinagar\r\nBhavangar', 1235647896, 'Bhavangar', 'Gujarat', '364001');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `username`, `password`) VALUES
(1, 'kunj', '1233'),
(4, 'wammu', '123'),
(5, 'new', '345'),
(6, 'new', '345'),
(7, 'jatin', '345'),
(8, 'yaju', '890'),
(9, 'sagar199', '12345'),
(12, 'didi', '9090'),
(13, 'jatinbhatiya', '6161'),
(14, 'sagar', '123');

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE `temples` (
  `id` int(11) NOT NULL,
  `temple_name` varchar(255) NOT NULL,
  `temple_images` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aarti_time` time NOT NULL,
  `darsan_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temples`
--

INSERT INTO `temples` (`id`, `temple_name`, `temple_images`, `location`, `aarti_time`, `darsan_time`) VALUES
(1, 'somnath', '1760339875_2.jpg', 'somnath mahadev', '02:41:00', '17:45:00'),
(2, 'dawarka', '1760339662_4.jpg', 'dawarka', '04:47:00', '17:46:00'),
(3, 'bihar', '1760339662_1.jpg', 'bihar', '04:44:00', '18:49:00'),
(4, 'dummy', '1760340012_240_F_641575261_pWTWvfmALmcPD3devSdasUgcwvJkfg6j.jpg', 'Bihar', '04:52:00', '17:53:00'),
(5, 'newdummy', '1760340012_4.jpg', 'Bihar', '06:54:00', '17:52:00'),
(6, 'somnath', '1760340012_photo_2024-04-07_09-39-27.jpg', 'Bihar', '03:51:00', '16:52:00'),
(7, 'n', '1760340993_4.jpg', 'gujarat', '04:06:00', '17:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registraction`
--
ALTER TABLE `registraction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `temples`
--
ALTER TABLE `temples`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `registraction`
--
ALTER TABLE `registraction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `temples`
--
ALTER TABLE `temples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
