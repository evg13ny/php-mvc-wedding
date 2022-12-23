-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 10:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-mvc-wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `twitter_link` varchar(1024) DEFAULT NULL,
  `facebook_link` varchar(1024) DEFAULT NULL,
  `linkedin_link` varchar(1024) DEFAULT NULL,
  `instagram_link` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `list_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `about`, `icon`, `name`, `twitter_link`, `facebook_link`, `linkedin_link`, `instagram_link`, `image`, `list_order`) VALUES
(1, 'The Groom', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', 'male', 'Jack', 'https://twitter.com/jack', 'https://facebook.com/jack', 'https://linkedin.com/jack', 'https://instagram.com/jack', 'uploads/about/1671784230about-1.jpg', 1),
(2, 'The Bride', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', 'female', 'Rose', 'https://twitter.com/rose', 'https://facebook.com/rose', 'https://linkedin.com/rose', 'https://instagram.com/rose', 'uploads/about/1671784207about-2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `twitter_link` varchar(1024) NOT NULL,
  `facebook_link` varchar(1024) NOT NULL,
  `linkedin_link` varchar(1024) NOT NULL,
  `instagram_link` varchar(1024) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `twitter_link`, `facebook_link`, `linkedin_link`, `instagram_link`, `email`, `phone`) VALUES
(1, 'https://twitter.com/info', 'https://facebook.com/info', 'https://linkedin.com/info', 'https://instagram.com/info', 'info@example.com', '+012 345 6789');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `twitter_link` varchar(1024) DEFAULT NULL,
  `facebook_link` varchar(1024) DEFAULT NULL,
  `linkedin_link` varchar(1024) DEFAULT NULL,
  `instagram_link` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) NOT NULL,
  `list_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `name`, `title`, `twitter_link`, `facebook_link`, `linkedin_link`, `instagram_link`, `image`, `list_order`) VALUES
(4, 'Olivia', 'BEST FRIEND', 'https://twitter.com/olivia', 'https://facebook.com/olivia', 'https://linkedin.com/olivia', 'https://instagram.com/olivia', 'uploads/family/1671785384bridesmaid-1.jpg', 0),
(5, 'Emma', 'BEST FRIEND', 'https://twitter.com/emma', 'https://facebook.com/emma', 'https://linkedin.com/emma', 'https://instagram.com/emma', 'uploads/family/1671785425bridesmaid-2.jpg', 0),
(6, 'Liam', 'BEST FRIEND', 'https://twitter.com/liam', 'https://facebook.com/liam', 'https://linkedin.com/liam', 'https://instagram.com/liam', 'uploads/family/1671785471bridesmaid-3.jpg', 0),
(7, 'BEST FRIEND', 'Noah', 'https://twitter.com/noah', 'https://facebook.com/noah', 'https://linkedin.com/noah', 'https://instagram.com/noah', 'uploads/family/1671785510groomsmen-1.jpg', 0),
(8, 'Charlotte', 'BEST FRIEND', 'https://twitter.com/charlotte', 'https://facebook.com/charlotte', 'https://linkedin.com/charlotte', 'https://instagram.com/charlotte', 'uploads/family/1671785555groomsmen-2.jpg', 0),
(9, 'Oliver', 'BEST FRIEND', 'https://twitter.com/oliver', 'https://facebook.com/oliver', 'https://linkedin.com/oliver', 'https://instagram.com/oliver', 'uploads/family/1671785592groomsmen-3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(22, 'uploads/gallery/1671784582gallery-1.jpg'),
(23, 'uploads/gallery/1671784591gallery-2.jpg'),
(24, 'uploads/gallery/1671784598gallery-3.jpg'),
(25, 'uploads/gallery/1671784606gallery-4.jpg'),
(26, 'uploads/gallery/1671784613gallery-5.jpg'),
(27, 'uploads/gallery/1671784618gallery-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE `rsvp` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `guests` int(11) NOT NULL DEFAULT 1,
  `attending` varchar(1024) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rsvp`
--

INSERT INTO `rsvp` (`id`, `name`, `email`, `guests`, `attending`, `message`, `date`) VALUES
(1, 'Selena', 'selena@mail.com', 1, 'All Events', 'Coming ;)', '2022-12-19 11:06:45'),
(5, 'James', 'james@mail.com', 2, 'Wedding Party', 'We\'ll be there ;)', '2022-12-23 11:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`, `type`) VALUES
(1, 'Designed by', 'evg13ny', 'text'),
(3, 'Bride', 'Rose', 'text'),
(4, 'Groom', 'Jack', 'text'),
(5, 'Carousel 1', 'uploads/settings/1671646397carousel-1.jpg', 'image'),
(6, 'Carousel 2', 'uploads/settings/1671646389carousel-2.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `list_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `title`, `description`, `date`, `image`, `list_order`) VALUES
(1, 'First Met', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', '2020-12-01', 'uploads/story/1671784395story-1.jpg', 1),
(2, 'First Date', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', '2020-12-04', 'uploads/story/1671784410story-2.jpg', 2),
(3, 'Proposal', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', '2021-12-04', 'uploads/story/1671784426story-3.jpg', 3),
(4, 'Engagement', 'Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.', '2022-04-30', 'uploads/story/1671784440story-4.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(3, 'Mary', '$2y$10$GrmJHjg/0tiT.0H/3dwFiu5NUBQI3PqXThJ53yrzeCmDJYCOnrXHu', 'mary@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_order` (`list_order`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rsvp`
--
ALTER TABLE `rsvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
