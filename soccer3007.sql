-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 03:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `acls`
--

CREATE TABLE `acls` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `childcare_centres` tinyint(1) NOT NULL DEFAULT '0',
  `daily_worksheets` tinyint(1) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL DEFAULT '0',
  `users` tinyint(1) NOT NULL DEFAULT '0',
  `messages` tinyint(1) NOT NULL DEFAULT '0',
  `content_manger` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acls`
--

INSERT INTO `acls` (`id`, `user_id`, `childcare_centres`, `daily_worksheets`, `archive`, `users`, `messages`, `content_manger`) VALUES
(47, 1, 0, 0, 0, 0, 0, 0),
(48, 2, 0, 0, 0, 0, 0, 0),
(49, 3, 0, 0, 0, 0, 0, 0),
(50, 4, 0, 0, 0, 0, 0, 0),
(51, 5, 0, 0, 0, 0, 0, 0),
(52, 6, 0, 0, 0, 0, 0, 0),
(53, 7, 0, 0, 0, 0, 0, 0),
(54, 113, 0, 0, 0, 0, 0, 0),
(55, 114, 0, 0, 0, 0, 0, 0),
(56, 115, 0, 0, 0, 0, 0, 0),
(57, 116, 0, 0, 0, 0, 0, 0),
(58, 117, 0, 0, 0, 0, 0, 0),
(59, 118, 0, 0, 0, 0, 0, 0),
(60, 119, 0, 0, 0, 0, 0, 0),
(61, 120, 0, 0, 0, 0, 0, 0),
(62, 121, 0, 0, 0, 0, 0, 0),
(63, 122, 0, 0, 0, 0, 0, 0),
(64, 123, 0, 0, 0, 0, 0, 0),
(65, 124, 0, 0, 0, 0, 0, 0),
(66, 125, 0, 0, 0, 0, 0, 0),
(67, 126, 0, 0, 0, 0, 0, 0),
(68, 127, 0, 0, 0, 0, 0, 0),
(69, 128, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `region_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `region_name`) VALUES
(3, 'london', 'region a'),
(4, 'abc', 'region 21');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) NOT NULL,
  `training_id` int(10) NOT NULL,
  `club_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `club_email` varchar(255) NOT NULL,
  `phone1` int(10) NOT NULL,
  `phone2` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `monday` tinyint(4) NOT NULL,
  `tuesday` tinyint(4) NOT NULL,
  `wendesday` tinyint(4) NOT NULL,
  `thursday` tinyint(4) NOT NULL,
  `friday` tinyint(4) NOT NULL,
  `saturday` tinyint(4) NOT NULL,
  `sunday` tinyint(4) NOT NULL,
  `reset_training` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `training_id`, `club_name`, `club_email`, `phone1`, `phone2`, `address`, `city_id`, `monday`, `tuesday`, `wendesday`, `thursday`, `friday`, `saturday`, `sunday`, `reset_training`) VALUES
(1, 1, 'Alyam', 'alyamamh@test.com', 459909544, 459909544, 'hhh', 3, 1, 0, 1, 0, 0, 0, 0, 0),
(3, 1, 'Real Madrid', '', 455555555, 544444444, 'Unit 2605 220 Spencer street', 4, 1, 1, 0, 0, 0, 0, 0, 0),
(4, 1, 'Majed', '', 459, 909544, 'Unit 2605 220 Spencer street', 4, 0, 0, 0, 1, 1, 0, 0, 0),
(5, 1, 'test', '', 12344444, 12344444, 'Unit 2605 220 Spencer street', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 'Club', '', 459, 909544, 'Unit 2605 ', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `subject` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `content` text NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `created`, `subject`, `email`, `first_name`, `last_name`, `phone_number`, `content`, `new`) VALUES
(107, '2016-02-18 13:26:07', 'Netlife', 'glen@netlifephotosuite.com.au', 'Glen', 'Nelson', '0422133080', 'Hi Katrin,\r\n\r\nI saw you visited my Linkedin profile, so I was curious to know who you are. Are you looking for a workflow solution for your photography?\r\n\r\nHappy to have a chat with you about it.\r\n\r\nBest Regards\r\nGlen', 0),
(133, '2016-04-23 07:37:04', 'Order number #1102127', 'michaelseanbarnett@bigpond.com', 'Michael and Krisy', 'Barnett', '0438428628', 'Hi, \r\nThis is Michael and Kristy Barnett. We purchased pictures from you of our children who attend Treehouse Early learning centre in Elsternwick. We received our pictures yesterday which we paid $99 for and they are not the same we saw in your image gallery as the ones we received have been cropped. They are nothing like we saw in your photo gallery when choosing the images and we are very dissapointed to say the least. \r\n\r\nSamuel''s head is cropped on the large picture and his head in one of the smaller images wering a green t shirt playing the guitar is so close to the edge of the picture. Please can you replace these ASAP. We cant use them and frame them.\r\n\r\nMy mother, Evelyn Barnett also bought many images from you (alot more thn we did) and she is also very disappointed with her photos as the same thing has happened with her photos. She is writing to you too. \r\n\r\nWhy are your photos cropped and different to the ones we saw in your image gallery than the ones printed?\r\n\r\nPlease contact me on 0438 428 628.  \r\n\r\nRegards,\r\n\r\nMichael and Kristy Barnett', 0),
(134, '2016-04-23 17:47:03', 'Childcare Photos', 'gothecats10@hotmail.com', 'Alicia', 'Palmer', '0432140626', 'Hi,\r\nI was just wondering if you still have any photo''s of My son who goes to Tree house. I think the photos were taken around October 2015. His name is Nikolas Palmer.\r\nI know it''s really late, thought I''d try my luck as I didn''t have the money at the time of ordering but I do now.\r\n\r\nThank you,\r\n\r\nAlicia.', 0),
(137, '2016-05-05 13:44:13', 'Family photographs', 'emilyjamieson@me.com', 'Emily', 'Jamieson', '0401792212', 'My sisters children are at Treehouse childcare and you take their photos, which are beautiful! \r\nI would like to get a quote to see how much it would cost to take photographs of my family (2 x adults, 3 x children) and some of the children together and individually? Many thanks Emily ', 0),
(144, '2016-05-18 19:49:47', 'Pre-school photos ', 'michellehoward@y7mail.com', 'Michelle', 'Howard', '', 'Hi, I have seen some examples of your photos on friends Facebook pages and the photos are gorgeous. We are from a small pre-school in leitchville in northern Victoria and we are looking for a photographer to take our photos this year. Just wondering what your availability is like, whether you would travel that far and what the cost/packages would be?\r\nThanks in advance,\r\nMichelle ', 0),
(151, '2016-05-25 22:25:53', 'Order for bridge road day care photos', 'helenwarden@y7mail.com', 'Helen', 'Warden', '0437144480', 'I have placed an order for all digital photos. Can any obvious blemishes, dirt or snot please be retouched/removed from the photos. In particular I noticed a red spot near Jaspers eye in some of the photos but hard to see if there are any other blemishes due to the text over the pics. I understand this retouching is complimentary. Please let me know if this is not the case.\r\nThank you! Love the pics!', 0),
(156, '2016-06-09 13:21:48', 'Ormond KH', 'ysweeny@gmail.com', 'Yvonne', 'Sweeny', '0438464542', 'Hi I can''t get the URL to work for photo proofs http://katsnapphotography/shootproof.com/OrmondKH  can you please tell me what I have done wrong? \r\n', 0),
(162, '2016-06-24 10:48:39', 'missed date for the downloand ormond kinder', 'tuskky18@hotmail.com', 'BHAGAT', 'TUSHAR', '0425308205', 'i would like to know the price for downloading16 photos for my daughter BHAGAT SHANAYA\r\nI missed the last date please call me anytime  ', 0),
(163, '2016-06-25 07:47:18', 'want a website like this one', 'tommy@gmail.com', 'Tommy', 'harfrd', '0458878878', 'hi there', 0),
(164, '2016-06-26 02:16:05', 'IT', 'majed90@msn.com', 'Majed', 'almutairi', '459909544', 'Hay there', 0),
(165, '2016-07-05 05:49:06', 'I want a website', 'majed90@msn.com', 'Majed', 'almutairi', '459909544', 'Hi there,\r\nhow much it cost for a website', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `region_name` varchar(60) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region_name`, `city_id`) VALUES
(1, 'acasc', 3),
(2, 'asadasasd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `training_time` time NOT NULL,
  `number_of_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `start_date`, `end_date`, `training_time`, `number_of_users`) VALUES
(1, '2016-06-26', '2016-06-26', '18:10:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `club_id` int(10) NOT NULL,
  `coming` tinyint(4) NOT NULL DEFAULT '0',
  `block` int(1) NOT NULL,
  `date_reset` date NOT NULL,
  `coming_date` varchar(255) NOT NULL,
  `activation` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `username`, `password`, `created`, `modified`, `phone_number`, `token`, `club_id`, `coming`, `block`, `date_reset`, `coming_date`, `activation`, `status`) VALUES
(122, 0, 'minhaca', 'ac', 'acaa@gmail.com', 'acs2', '$2y$10$cyN/t.yWdGUk3XndmWM0X.VeDDIChYzJbW9YXoblVCOmsR0FxAg0O', '2016-06-30', '2016-07-29', 123456, '', 3, 0, 0, '2016-07-29', '', '', 0),
(123, 0, 'ac12', 'ac', 'aaaa@gmail.com', 'a1', '123', '2016-06-30', '2016-07-29', 123456, '', 1, 0, 0, '2016-07-29', '', '', 0),
(124, 0, 'ac12', 'ac', 'aaaa2@gmail.com', 'a22', '$2y$10$3BxPXq/1f2qwFGEWdR1j8eotZUwfCBJKMtoNTxFl9/eRXYdoIMHqK', '2016-06-30', '2016-07-29', 123456, '', 3, 0, 1, '2016-07-29', '', '', 0),
(126, 2, 'Majed', 'almutairi', 'majed90@msn.com', 'majed', '$2y$10$IwSMyvX1WgLOPeabAWjG6e69vwXNULG4pfqLCp7MBxk.YH0xTweD6', '2016-07-01', '2016-07-29', 459909544, '6HduI3svkGexaZYmJBhApTjrlKOt0yWNgUo7M12FwRz9nEVq8icbPf4QX5DCLS', 1, 0, 0, '2016-07-29', '', '', 0),
(127, 0, 'medo', '', 'majed90@icloud.com', 'majed054000', '$2y$10$LqbjZXEfelfDVCXoAHEs6ebJigKlfphB7A6p/q6JYKteg.4cwQasi', '2016-07-02', '2016-07-29', 45555555, '', 4, 0, 0, '2016-07-29', '', '', 0),
(128, 2, 'test', '', 'm@m.com', 'malm10', '$2y$10$0pfll.YvVLGBeYic38SLIeRNt5t5nB5QfPkwcQ8Hv2gnwO4cdmPLK', '2016-07-02', '2016-07-29', 122222222, '', 1, 0, 0, '2016-07-29', '', '', 0),
(129, 0, 'test', '', 'mm@m.com', 'test', 'acacac', '2016-07-02', '2016-07-29', 1222222222, '', 3, 0, 0, '2016-07-29', '', '', 0),
(130, 1, 'tri', '', 'abc@gmail.com', 'adminsuper', '$2y$10$a16BrtmQUAgB6jsZ6LdRP.AvUuiCc8n2c9ZxXsY.4E.26Tf1EgJBm', '2016-07-12', '2016-07-29', 124554, '', 3, 0, 0, '2016-07-29', '{"monday":0,"tuesday":0,"wendesday":0,"thursday":0,"friday":0,"saturday":0,"sunday":0}', 'a', 1),
(160, 0, 'ba', '', 'epsminhtri2222222222222222222222222@gmail.com', 'ac', '$2y$10$veGj5qYGOqSWa2i2/HEZcesRYryYQRFDSD/rR6vvbZkhY7NAM0.6a', '2016-07-29', '2016-07-29', 0, '', 1, 0, 0, '2016-07-29', '', 'f18acfc9e3e10593050221ca750352c8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acls`
--
ALTER TABLE `acls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_id` (`training_id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acls`
--
ALTER TABLE `acls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
