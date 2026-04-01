-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 01:11 PM
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
-- Database: `blog_sept`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`) VALUES
(1, 'Web Development', 'web-development', 'Articles and tutorials about modern web development.'),
(2, 'Programming', 'programming', 'Guides, snippets, and coding best practices.'),
(3, 'Projects', 'projects', 'Showcase of projects and case studies.'),
(4, 'Cloud Computing', 'cloud-computing', 'Articles on AWS, Azure, and cloud infrastructure.'),
(5, 'Mobile Development', 'mobile-development', 'Guides on building iOS and Android apps.'),
(6, 'Machine Learning', 'machine-learning', 'ML algorithms, Python notebooks, and AI models.'),
(7, 'Game Development', 'game-development', 'Creating games with Unity, Unreal, and JavaScript.'),
(8, 'APIs & Integrations', 'apis-integrations', 'REST, GraphQL, and third-party API usage.'),
(9, 'Data Visualization', 'data-visualization', 'Charts, dashboards, and data storytelling.'),
(10, 'Testing & QA', 'testing-qa', 'Unit tests, automation, and QA best practices.'),
(11, 'Blockchain', 'blockchain', 'Exploring cryptocurrencies and decentralized apps.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Alice Johnson', 'alice@example.com', 'Website Feedback', 'Hi, I really like your website. Keep up the great work!', '2025-10-03 13:42:18'),
(2, 'David Miller', 'david@example.com', 'Collaboration Opportunity', 'Hello, I would like to collaborate with you on a project. Please get in touch.', '2025-10-03 13:42:18'),
(3, 'Sophia Lee', 'sophia@example.com', 'Bug Report', 'I found a small bug on your articles page. Just wanted to let you know.', '2025-10-03 13:42:18'),
(4, 'Mark Taylor', 'mark@example.com', 'Hiring Inquiry', 'Are you available for freelance work? I need a developer for my startup.', '2025-10-03 13:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `post_type` enum('article','tutorial','project') DEFAULT 'article',
  `views` int(11) DEFAULT 0,
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `excerpt`, `featured_image`, `category_id`, `user_id`, `status`, `post_type`, `views`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Getting Started with PHP MVC', 'getting-started-with-php-mvc', 'This article explains how to build a simple MVC framework in PHP from scratch.', 'Learn the basics of building a PHP MVC structure.', '68f716c695a05_1761023686.png', 1, 2, 'published', 'article', 120, '2025-10-03 16:41:02', '2025-10-03 13:41:02', '2025-10-21 05:14:47'),
(2, 'JavaScript Async Await Explained', 'javascript-async-await-explained', 'A complete tutorial on how async/await works in JavaScript with examples.', 'Master async/await in JavaScript step by step.', '68f69c8c3d93f_1760992396.jpeg', 2, 3, 'published', 'tutorial', 85, '2025-10-03 16:41:02', '2025-10-03 13:41:02', '2025-10-20 20:33:16'),
(3, 'My Portfolio Website Project', 'my-portfolio-website-project', 'Detailed breakdown of how I built my personal portfolio website using HTML, CSS, and JavaScript.', 'Showcase of my personal portfolio project.', '68f69ca5630ff_1760992421.jpg', 3, 3, 'published', 'project', 200, '2025-10-03 16:41:02', '2025-10-03 13:41:02', '2025-10-20 20:33:43'),
(81, 'Dummy Post 22', 'dummy-post-22', 'This is the content for dummy post number 22. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Excerpt for dummy post 22', '68f69b98330eb_1760992152.webp', 9, 12, 'published', 'project', 214, '2025-10-03 16:51:57', '2025-10-03 13:51:57', '2025-10-20 20:29:12'),
(82, 'Dummy Post 23', 'dummy-post-23', 'This is the content for dummy post number 23. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Excerpt for dummy post 23', '68f69ba9cfb74_1760992169.jpeg', 9, 1, 'published', 'tutorial', 130, '2025-10-03 16:51:57', '2025-10-03 13:51:57', '2025-10-20 20:29:29'),
(84, 'Dummy Post 25', 'dummy-post-25', 'This is the content for dummy post number 25. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Excerpt for dummy post 25', '69079d55bef74_1762106709.png', 3, 1, 'published', 'tutorial', 348, '2025-10-03 16:51:57', '2025-10-03 13:51:57', '2025-11-02 18:05:10'),
(103, 'Getting Started with MySQL', 'getting-started-with-mysql', 'This tutorial introduces MySQL basics, including creating tables, inserting data, and performing queries.', 'Learn MySQL basics from scratch.', '68f698afeefed_1760991407.png', 1, 1, 'published', 'tutorial', 8, '2025-10-18 03:20:39', '2025-10-18 00:20:39', '2025-10-20 20:16:50'),
(105, 'PHP and MySQL Integration', 'php-and-mysql-integration', 'Learn how to connect PHP with MySQL, perform CRUD operations, and handle user input safely using prepared statements.', 'Guide to integrating PHP with MySQL for dynamic websites.', '68f69b626e217_1760992098.jpeg', 1, 1, 'published', 'tutorial', 20, '2025-10-18 03:20:39', '2025-10-18 00:20:39', '2025-10-20 20:28:18'),
(108, 'ES6 JavaScript', 'es6-javascript', 'JavaScript ES6 brought the development in the area of Js today ', 'JS ES6', '68f7ad571e898_1761062231.jpg', 2, 1, 'published', 'article', 0, NULL, '2025-10-20 19:40:32', '2025-10-21 15:57:11'),
(109, 'OpenAI', 'openai', 'Artificial Intelligence (AI) refers to the capability of computational systems to perform tasks typically associated with human intelligence, such as learning, reasoning, problem-solving, perception, and decision-making. AI technologies enable machines to simulate human cognitive functions, including understanding natural language, recognizing patterns, and making data-driven decisions', 'Artificial Intelligence (AI) refers to the capability of computational systems to perform', '69079d30951f2_1762106672.png', 2, 1, 'published', 'tutorial', 0, NULL, '2025-10-20 19:48:40', '2025-11-02 18:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','author') DEFAULT 'author',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `bio`, `avatar`, `role`, `created_at`) VALUES
(1, 'admin_john', 'admin@example.com', 'hashed_password1', 'John', 'Doe', 'Admin of the site', 'avatar1.png', 'admin', '2025-10-03 13:38:13'),
(2, 'author_anna', 'anna@example.com', 'hashed_password2', 'Anna', 'Smith', 'Tech enthusiast and blogger', 'avatar2.png', 'author', '2025-10-03 13:38:13'),
(3, 'author_mike', 'mike@example.com', 'hashed_password3', 'Mike', 'Brown', 'Web developer and content creator', 'avatar3.png', 'author', '2025-10-03 13:38:13'),
(9, 'author_lucas', 'lucas@example.com', 'hashed_lucas_password', 'Lucas', 'Miller', 'Backend developer focused on PHP and Node.js', 'avatar6.png', 'author', '2025-10-03 13:47:03'),
(10, 'author_emily', 'emily@example.com', 'hashed_emily_password', 'Emily', 'Clark', 'Frontend developer with love for animations', 'avatar7.png', 'author', '2025-10-03 13:47:03'),
(11, 'author_ryan', 'ryan@example.com', 'hashed_ryan_password', 'Ryan', 'Davis', 'Cybersecurity enthusiast sharing tutorials', 'avatar8.png', 'author', '2025-10-03 13:47:03'),
(12, 'author_julia', 'julia@example.com', 'hashed_julia_password', 'Julia', 'Martinez', 'Data scientist and AI content writer', 'avatar9.png', 'author', '2025-10-03 13:47:03'),
(13, 'author_chris', 'chris@example.com', 'hashed_chris_password', 'Chris', 'Wilson', 'Full-stack engineer exploring DevOps and cloud', 'avatar10.png', 'author', '2025-10-03 13:47:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
