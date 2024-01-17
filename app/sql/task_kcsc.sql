-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 01:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_kcsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `body` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int DEFAULT NULL,
  `used_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `body`, `created_at`, `post_id`, `used_by`) VALUES
(1, 1, 'Remember to handle database connection and Prisma client instances appropriately in a real-world application. Additionally, make sure to secure sensitive information such as database URLs using environment variables.', '2024-01-13 07:58:13', 1, 'l3mnt2010'),
(2, 13, 'While each letter is unique, certain shapes are shared across letters. A typeface represents shared patterns across a collection of letters. Measurement from the baseline A typeface is a collection of letters. ', '2024-01-13 08:20:51', 2, 'H5o8zWL3a');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `topic_id` int DEFAULT NULL,
  `tittle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `introduce` varchar(500) NOT NULL,
  `published` tinyint NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `tittle`, `image`, `body`, `introduce`, `published`, `create_at`) VALUES
(1, 1, 1, 'My Holiday', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyVaxs3qBS_MeNaG5dioG8xKand1IJoBULoNm3UmqQHg&s', 'Digital art by Anonymous\r\nGetting started with Flowbite\r\nFirst of all you need to understand how Flowbite works. This library is not another framework. Rather, it is a set of components based on Tailwind CSS that you can just copy-paste from the documentation.\r\n\r\nIt also include_onces a JavaScript file that enables interactive components, such as modals, dropdowns, and datepickers which you can optionally include_once into your project via CDN or NPM.\r\n\r\nYou can check out the quickstart guide to explore the elements by including the CDN files into your project. But if you want to build a project with Flowbite I recommend you to follow the build tools steps so that you can purge and minify the generated CSS.\r\n\r\nYou\'ll also receive a lot of useful application UI, marketing UI, and e-commerce pages that can help you get started with your projects even faster. You can check out this comparison table to better understand the differences between the open-source and pro version of Flowbite.\r\n\r\nWhen does design come in handy?\r\nWhile it might seem like extra work at a first glance, here are some key moments in which prototyping will come in handy:\r\n\r\nUsability testing. Does your user know how to exit out of screens? Can they follow your intended user journey and buy something from the site you’ve designed? By running a usability test, you’ll be able to see how users will interact with your design once it’s live;\r\nInvolving stakeholders. Need to check if your GDPR consent boxes are displaying properly? Pass your prototype to your data protection team and they can test it for real;\r\nImpressing a client. Prototypes can help explain or even sell your idea by providing your client with a hands-on experience;\r\nCommunicating your vision. By using an interactive medium to preview and test design elements, designers and developers can understand each other — and the project — better.\r\nLaying the groundwork for best design\r\nBefore going digital, you might benefit from scribbling down some ideas in a sketchbook. This way, you can think things through before committing to an actual design project.\r\n\r\nLet\'s start by including the CSS file inside the head tag of your HTML.\r\n\r\nUnderstanding typography\r\nType properties\r\nA typeface is a collection of letters. While each letter is unique, certain shapes are shared across letters. A typeface represents shared patterns across a collection of letters.\r\n\r\nBaseline\r\nA typeface is a collection of letters. While each letter is unique, certain shapes are shared across letters. A typeface represents shared patterns across a collection of letters.\r\n\r\nMeasurement from the baseline\r\nA typeface is a collection of letters. While each letter is unique, certain shapes are shared across letters. A typeface represents shared patterns across a collection of letters.\r\n\r\nType classification\r\nSerif\r\nA serif is a small shape or projection that appears at the beginning or end of a stroke on a letter. Typefaces with serifs are called serif typefaces. Serif fonts are classified as one of the following:\r\n\r\nOld-Style serifs\r\nLow contrast between thick and thin strokes\r\nDiagonal stress in the strokes\r\nSlanted serifs on lower-case ascenders', 'Over the past year, Volosoft has undergone many changes! After months of preparation', 1, '2024-01-12 14:31:30'),
(2, 1, 2, 'Best practices for successful prototypes', 'https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png', 'Flowbite is an open-source library of UI components built with the utility-first classes from Tailwind CSS. It also include_onces interactive elements such as dropdowns, modals, datepickers.\r\n\r\nBefore going digital, you might benefit from scribbling down some ideas in a sketchbook. This way, you can think things through before committing to an actual design project.\r\n\r\nBut then I found a component library based on Tailwind CSS called Flowbite. It comes with the most commonly used UI components, such as buttons, navigation bars, cards, form elements, and more which are conveniently built with the utility classes from Tailwind CSS.', 'First of all you need to understand how Flowbite works. This library is not another framework. Rather, it is a set of components based on Tailwind CSS that you can just copy-paste from the documentation.', 1, '2024-01-12 15:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'Holidays', 'Ha Noi, VietNam'),
(2, 'MyDream', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` tinyint NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(1000) NOT NULL DEFAULT 'https://flowbite.com/docs/images/people/profile-picture-2.jpg',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `email`, `password`, `avatar`, `create_at`) VALUES
(1, 1, 'alol3mnt', 'llam16219@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'https://flowbite.com/docs/images/people/profile-picture-2.jpg', '2024-01-12 11:44:12'),
(4, 0, 'Oqkb1lsKw', 'admin@soc1.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'https://flowbite.com/docs/images/people/profile-picture-2.jpg', '2024-01-13 03:20:05'),
(13, 0, 'H5o8zWL3a', 'llam@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'https://flowbite.com/docs/images/people/profile-picture-2.jpg', '2024-01-13 08:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
