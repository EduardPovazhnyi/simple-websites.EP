-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 05:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_um`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `image_url` varchar(128) NOT NULL,
  `audio_url` varchar(128) DEFAULT NULL,
  `spotify_embed` varchar(128) DEFAULT NULL,
  `status` enum('pending','published','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `author_id`, `image_url`, `audio_url`, `spotify_embed`, `status`, `created_at`) VALUES
(1, 'The Future of Indie Music', 'Exploring how indie artists are reshaping the music industry with streaming platforms and social media.', 1, 'indie_rock.jpeg', NULL, 'https://open.spotify.com/embed/track/1', 'published', '2025-02-25 13:27:34'),
(2, 'Top 10 Rock Albums of 2024', 'A deep dive into the best rock albums of the year and why they matter.', 2, 'top10albums.jpeg', NULL, 'https://open.spotify.com/embed/album/2', 'published', '2025-02-25 13:31:42'),
(3, 'Music Production Trends', 'An analysis of the latest advancements in music production, including AI-generated beats.', 3, 'music_trends.jpeg', 'audio/beat1.mp3', NULL, 'published', '2025-02-25 13:33:13'),
(4, 'The Rise of Lo-Fi Hip Hop', 'Why lo-fi beats have become the go-to background music for students and creatives.', 4, 'lofi_hiphop.jpeg', 'audio/lofi1.mp3', 'https://open.spotify.com/embed/playlist/3', 'published', '2025-02-25 13:35:19'),
(5, 'Best Music Festivals in 2025', 'A guide to the top music festivals around the world happening next year.', 5, 'best_fests.jpeg', NULL, NULL, 'published', '2025-02-25 13:37:07'),
(6, 'Vinyl Revival: Is It Here to Stay?', 'Why vinyl records are making a surprising comeback among music lovers.', 1, 'vinil.jpeg', 'audio/vinyl_discussion.mp3', NULL, 'published', '2025-02-25 13:38:17'),
(7, 'How AI is Changing Music', 'From AI-generated songs to virtual artists, the future of music creation looks different.', 2, 'ai_changing_music.jpeg', NULL, 'https://open.spotify.com/embed/track/4', 'published', '2025-02-25 13:42:00'),
(8, 'The Psychology of Music', 'How different genres of music affect emotions and brain function.', 3, 'psychology_music.jpeg', NULL, NULL, 'published', '2025-02-25 13:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `content`, `created_at`, `status`) VALUES
(1, 1, 1, 'Great insights into the indie music scene! Really enjoyed reading this.', '2025-03-04 13:38:08', 'approved'),
(2, 2, 2, 'Top 10 list is spot on! Can’t wait to check out some of these albums.', '2025-03-04 13:38:13', 'approved'),
(3, 3, 3, 'AI in music production is a game changer. Thanks for sharing this information.', '2025-03-04 13:38:17', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(264) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_on`, `profile_image`) VALUES
(1, 'Urik', 'urik@gmail.com', '$2y$10$o3zJJRcqXSxiw6UU5vpP1eBgQ4zeSr4smCfCcaAK/28okDTul7jem', 'user', '2025-03-04 15:31:52', 'Urik.jpg'),
(2, 'Koval', 'koval@gmail.com', '$2y$10$VW24TAu0NAMml7Wrbf0Y4.cjVSkslAqm1vXJcE.E0iVBggCc8LWC.', 'user', '2025-03-04 15:32:23', 'Koval.jpg'),
(3, 'Anna', 'anna@gmail.com', '$2y$10$2Mx2ALxdc2tk3s1bM3dategWfnES4uDbf7KDpGmF8q0Vwc85lc1Ta', 'user', '2025-03-04 16:02:47', 'Anna.jpeg'),
(4, 'Edward', 'edward@gmail.com', '$2y$10$toUUM0FBN9GF/NloSNyflutF9Oq24V97aMUbnPMYvUCy9nsycxHcC', 'user', '2025-02-18 13:44:33', NULL),
(5, 'Yarchyk', 'yarchyk@gmail.com', '$2y$10$aE7/eyBlqB81iS6nqyJZh.eYWDkWw0gSXYhHug.VSBixsosqgxHki', 'user', '2025-03-04 15:32:54', 'Yarchyk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
