-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `crbpdata`
--

CREATE TABLE `crbpdata` (
  `user_id` varchar(100) NOT NULL,
  `templateno` int(70) NOT NULL,
  `templateid` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `schoollocation` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `fieldofstudy` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `startyear` int(100) NOT NULL,
  `endyear` int(100) NOT NULL,
  `jobsummary` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `skillperncentage` int(100) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crbpdata`
--

INSERT INTO `crbpdata` (`user_id`, `templateno`, `templateid`, `fname`, `lname`, `phonenumber`, `email`, `city`, `state`, `country`, `profile`, `language`, `schoolname`, `schoollocation`, `degree`, `year`, `fieldofstudy`, `jobtitle`, `employer`, `startyear`, `endyear`, `jobsummary`, `skill`, `skillperncentage`, `hobbies`, `link`, `dt`) VALUES
('6642f8c51788f', 1, '6642f914884c2', 'Daria', 'Foster', '8790987654', 'pigyn@mailinator.com', 'Itaque incidunt qui', 'Dolorem quo eum labo', 'In irure perspiciati', 'A qui officia irure ', 'Minus iure ea esse ', 'Nichole Orr', 'Odio ipsum numquam ', 'Dolor id numquam vo', '2018', 'Sint ducimus conseq', 'Fuga Vero quia repu', 'Incidunt qui ex sun', 1989, 1992, 'Nesciunt tempor aut', ' Facere ullam aute re', 57, 'Quasi molestias occa', 'Quo mollit dolores t', '2024-05-14 11:09:32'),
('6642f8c51788f', 1, '6642fbc28c94f', 'Angelica', 'Ferguson', '9922345678', 'covutinus@mailinator.com', 'Rem dolores omnis se', 'Est nulla provident', 'Ut est libero non re', 'Do consequuntur ut p', 'Modi ipsum id minu', 'Ralph Bennett', 'Tempor sunt ea exerc', 'Est autem incidunt ', '2009', 'Eveniet et culpa do', 'Quia eum temporibus ', 'Ut est omnis dolore', 1986, 1974, 'Dolor facilis sed es', ' Odit sit necessitati', 11, 'Consectetur corrupti', 'Quia officia tempora', '2024-05-14 11:20:58'),
('6642f8c51788f', 1, '6644367cb09cb', 'Casey', 'Potts', '7595678902', 'nysiryx@mailinator.com', 'In voluptatem ipsa ', 'Deleniti autem itaqu', 'Nulla veritatis offi', 'Est sed culpa doloru', 'Ea aut deleniti dolo', 'Fiona Huber', 'Laudantium est ut ', 'Magna et temporibus ', '1982', 'Hic esse iure non c', 'Eiusmod harum in mol', 'Tempor in et enim fu', 1997, 1977, 'Rem ea vero officia ', ' Corporis id voluptat', 13, 'Optio temporibus ab', 'Aliquip qui reprehen', '2024-05-15 09:43:48'),
('6642f8c51788f', 2, '6646dab5f3787', 'Melissa', 'Wagner', '1000987652', 'kicylukuj@mailinator.com', 'Dolor exercitation a', 'Ullamco qui dolores ', 'Et blanditiis et dui', 'Odio et consequatur ', 'Est modi et ad et id', 'Guinevere Vaughan', 'Voluptatum provident', 'Autem tempor veniam', '1992', 'Quasi irure temporib', 'Anim ut inventore au', 'In tempora quis aliq', 2011, 1974, 'Vitae consequatur m', ' Aut vel eius consequ', 96, 'Enim aliqua Archite', 'Ducimus facilis ad ', '2024-05-17 09:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `crbpusers`
--

CREATE TABLE `crbpusers` (
  `user_id` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crbpusers`
--

INSERT INTO `crbpusers` (`user_id`, `token`, `email`, `password`, `dt`) VALUES
('6642f8c51788f', '98972f0d90d1ebf4cab90c12c0659cac', 'test@gmail.com', '$2y$10$5A.klRK3dAwoHhYGfIaPK.XgGpf63ahP/m3mczVudviv9mLDA1Sxi', '2024-05-14 11:08:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crbpdata`
--
ALTER TABLE `crbpdata`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `crbpusers`
--
ALTER TABLE `crbpusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crbpdata`
--
ALTER TABLE `crbpdata`
  ADD CONSTRAINT `crbpdata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `crbpusers` (`user_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `crbpusers` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
