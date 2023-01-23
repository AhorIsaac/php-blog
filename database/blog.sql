-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 03:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `role` enum('admin','super_admin') NOT NULL DEFAULT 'admin',
  `status` int(11) NOT NULL DEFAULT 1,
  `image` longtext NOT NULL DEFAULT 'admin.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `image`) VALUES
(1, 'Heaven', 'heaven@gmail.com', 'heaven', '', 'super_admin', 1, 'heaven.jpg'),
(2, 'Shie Paul', 'scarfy@gmail.com', 'a92428c4fb4ff96978e45fce55041c70', '0000000000', 'super_admin', 1, 'Screenshot_20200206-150927.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_comment` longtext NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_comment`, `post_id`, `name`, `timestamp`) VALUES
(1, 'I love A.I😘', 10, 'Shie Paul', '2020-12-04 13:23:01'),
(2, 'The future of technology is A.I!🚀', 10, 'Chocho Mayoki', '2020-12-04 13:23:59'),
(3, 'doloribus neque illum odit nobis praesentium totam\r\n  \r\n                                    \r\nalias vero perferendis corrupti libero quam anim', 8, 'Ahua Fanen', '2020-12-04 13:24:22'),
(4, '😘😘doloribus neque illum 😛', 8, 'Pever Luper', '2020-12-04 13:24:55'),
(5, 'I love this ❤️', 11, 'Ahor Mercy', '2020-12-04 13:27:35'),
(6, 'I code in JS❤️', 11, 'Shie Paul', '2020-12-04 13:28:05'),
(7, 'Coding is the best thing..!😘', 11, 'Shie Paul', '2020-12-04 19:44:42'),
(10, 'assumenda beatae perferendis nost🚀  \r\n                                    ', 11, 'Pever Luper', '2020-12-05 13:30:03'),
(11, 'Black Hat Hackers are the first threat to the future of tech! \r\n🔫', 7, 'Chocho Mayoki', '2020-12-05 14:57:09'),
(12, 'I will really want to be a hacker too! 👍', 7, 'Shie Paul', '2020-12-05 14:58:04'),
(16, 'I love this concept ❤️', 15, 'Ahua Fanen', '2020-12-05 22:38:29'),
(17, 'this is a very brilliant idea 👍', 15, 'Chocho Mayoki', '2020-12-05 22:39:01'),
(18, '😘😘😘 Keep up the good work!', 15, 'Shie Paul', '2020-12-05 22:39:20'),
(19, 'I personally prefer coding on bigger monitors and i advice my fellow developers to do so! \r\n🌐', 15, 'Pever Luper', '2020-12-05 22:56:23'),
(20, 'I have started learning software development! ❤️❤️❤️❤️', 12, 'Agenaton Member', '2020-12-05 23:32:07'),
(21, 'This is a very brilliant idea! ❤️❤️❤️', 15, 'Adanyi Emma', '2020-12-07 00:01:52'),
(24, 'Using larger monitors to code is really cool! 😛', 15, 'Ahor Isaac', '2020-12-07 12:47:23'),
(25, 'Let\'s do this! ☀️', 15, 'Faga Rex', '2020-12-07 12:51:24'),
(26, 'How much is the cost 💰💴💵💶 of a bigger monitor? ', 15, 'Agaji Robert ', '2020-12-07 12:57:04'),
(27, 'Thanks for this 😘, it really helped me! \r\n❤️', 12, 'Ahor Isaac', '2020-12-07 17:51:47'),
(28, 'I will get a larger monitor tomorrow! \r\nCan\'t wait to do this! 💻', 15, 'Abur Daniel', '2020-12-07 20:39:41'),
(29, 'I will try using this model in my next project! 💻😘❤️', 16, 'Shie Paul', '2020-12-08 13:46:50'),
(30, 'I don\'t like this model! It sucks my SDLC! 👃', 16, 'Pever Luper', '2020-12-08 21:30:30'),
(31, 'This sounds cool! I will try it out! 👍', 15, 'Gwaza Raphael', '2020-12-08 22:07:19'),
(32, 'I ❤️ using this model! ', 16, 'Tsavbee Iorwuese', '2020-12-09 11:54:28'),
(33, 'Nice one! 💻😘', 15, 'Agenaton Dave', '2020-12-10 11:21:54'),
(34, 'with an attitude! 👄', 15, 'Ugwu Vitus ', '2020-12-15 09:09:53'),
(35, 'I love this concept! ❤️💎', 17, 'Chocho Mayoki', '2020-12-16 12:54:06'),
(36, '', 17, '', '2020-12-16 12:54:12'),
(37, 'Nothing bad 😛', 17, 'Ahua Fanen', '2020-12-16 12:55:04'),
(38, 'I ❤️php too! ', 17, 'Meek Stephen ', '2020-12-17 14:31:41'),
(39, '🐥🐣🌚🌝🎅  \n                                    ', 15, 'Ajon Aondosoo ', '2022-01-27 21:17:07'),
(40, '😳☺️☺️☺️❤️fghjkl;', 15, 'Terseer', '2022-04-02 12:38:56'),
(41, '❤️😍😁😄 lorem ipsum dolor sit amet', 15, 'Nyiishi Timothy', '2022-04-26 23:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(120) NOT NULL,
  `post_msg` longtext NOT NULL,
  `post_image` longtext NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_msg`, `post_image`, `user_name`, `star`, `created_at`) VALUES
(3, 'Java', '<p>Ab,&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;consequuntur soluta non beatae aspernatur ad doloremque&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;doloribus neque illum odit nobis praesentium totam<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;alias vero perferendis corrupti libero quam animi&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;asperiores quis autem iste voluptatum repellat! Possimus,&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;consequatur, laudantium deserunt natus aspernatur sed esse&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;at quasi praesentium nisi qui voluptatibus neque laborum&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;ipsam error eveniet cumque! Sequi dolore, atque nihil&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;repellendus enim porro explicabo!</p>', '1607019293_How to Use the Java Iterator in Collections_.jpg', 'Shie Paul Aondohemba', 0, '2020-12-03 18:14:53'),
(4, 'PHP', '<p><strong>doloribus </strong>neque illum odit nobis praesentium totam<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;alias vero perferendis corrupti libero quam animi&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;asperiores quis <u>autem </u>iste voluptatum repellat! Possimus,&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;consequatur, laudantium deserunt natus aspernatur sed esse&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;at quasi praesentium nisi qui <u>voluptatib</u></p>', '1607020250_wp1958215-php-wallpapers.jpg', 'Ahua Fanen', 0, '2020-12-03 18:30:50'),
(7, 'Black Hat Hackers', '<p>corrupti libero quam animi&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;asperiores quis autem iste voluptatum repellat! Possimus,&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;consequatur, laudantium deserunt natus aspernatur sed esse&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;at quasi praesentium nisi qui</p>', '1607020989_19 HD Wallpaper Gambar Hacker Anonymous Keren _ GUDANG GAMBAR.jpg', 'Pever Luper', 0, '2020-12-03 18:43:09'),
(8, 'Software Developers', '<p>After requirement gathering, the team comes up with a rough plan of software process. At this step the team analyzes if a software can be designed to fulfill all requirements of the user, and if there is any possibility of software being no more useful. It is also analyzed if the project is financially, practically, and technologically feasible for the organization to take up. There are many algorithms available, which help the developers to conclude the feasibility of a software project.</p>', '1607024158_Hire Dedicated Resource _ Hire Dedicated Developers India _ UK.png', 'Ahor Isaac', 0, '2020-12-03 19:35:58'),
(10, 'Artificial Intelligence', '<p>Lorem ipsum, dolor sit amet consectetur&nbsp;<br />\r\nadipisicing elit. Cumque necessitatibus asperiores&nbsp;<br />\r\nquasi dolorum cum enim culpa ab aperiam nihil amet,<br />\r\neos iste odio, dicta, corporis nulla quaerat optio</p>', '1607083937_artificial-intelligence-3513224__480.jpg', 'Ahor Isaac', 0, '2020-12-04 12:12:18'),
(11, 'Coding', '<p>adipisicing elit. <strong>Cumque </strong>necessitatibus asperiores&nbsp;<br />\r\nquasi dolorum cum enim culpa ab <u>aperiam </u>nihil amet,<br />\r\n<em>eos </em>iste o</p>', '1607084825_164625.jpg', 'Akaakohol Tartor', 0, '2020-12-04 12:27:05'),
(12, 'How to Code Better', '<p><strong>quasi </strong><u>dolorum </u>cum enim culpa ab aperiam nihil amet,<br />\r\neos iste odio, dicta, corporis nulla quaerat optio&nbsp;<br />\r\naliquam facere <u>delectus </u>ipsa <em>provident</em>? Officia,&nbsp;<br />\r\nuos laborum! Repudiandae perspiciatis, voluptate&nbsp;<br />\r\nassumenda beatae perferendis nostrum nulla!</p>\r\n\r\n<p>x<sup>2&nbsp;</sup>+4x+4=0</p>', '1607112028_164651.jpg', 'Mbabov Marvellous', 1, '2020-12-04 20:00:28'),
(15, 'Using Bigger Monitors to Code', '<p>adipisicing elit. Cumque necessitatibus asperiores&nbsp;<br />\r\nquasi dolorum cum enim culpa ab aperiam nihil amet,<br />\r\neos iste odio, dicta, corporis nulla quaerat optio&nbsp;<br />\r\naliquam facere delectus ipsa provident? Officia,&nbsp;<br />\r\nuos laborum! Repudiandae perspiciatis, voluptate&nbsp;</p>', '1607204214_photography-of-person-typing-1181675.jpg', 'Ahor Mercy Shidoon', 5, '2020-12-05 21:36:55'),
(16, 'Software Development - Big Bang Model', '<p>This <em>model </em>is the simplest model in its form. It requires little planning, lots of programming and lots of funds. This model is conceptualized around the <u>big bang</u> of universe. As scientists say that after big bang lots of galaxies, planets, and stars evolved just as an event. Likewise, if we put together lots of <strong>programming </strong>and funds, you may achieve the best <strong>software </strong>product</p>', '1607431574_314785.jpg', 'Jando Lilian', 2, '2020-12-08 12:46:14'),
(17, 'PHP The Backend Warrior', '<p>Lorem ipsum, dolor sit amet consectetur&nbsp;<br />\r\nadipisicing elit. Cumque necessitatibus asperiores&nbsp;<br />\r\nquasi dolorum cum enim culpa ab aperiam nihil amet,<br />\r\neos iste odio, dicta, corporis nulla quaerat optio&nbsp;<br />\r\naliquam facere delectus ipsa provident?</p>', '1607597569_wp1958184-php-wallpapers.jpg', 'Shie Paul Aondohemba', 0, '2020-12-10 10:52:49'),
(18, 'The future of Python Programminng', '<p>quasi dolorum cum enim culpa ab aperiam nihil amet,<br />\r\neos iste odio, dicta, corporis nulla quaerat optio&nbsp;<br />\r\naliquam facere delectus ipsa <em>provident</em>? Officia,&nbsp;<br />\r\nuos laborum! <strong>Repudiandae </strong>perspiciatis, <em>voluptate&nbsp;</em></p>', '1608122189_156M0g.jpg', 'Sarah Edeh', 0, '2020-12-16 12:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`) VALUES
(1, 'subscriber@codeblog.com', '2020-12-08 11:26:30'),
(2, 'scarfy@gmail.com', '2020-12-08 12:22:46'),
(3, 'peverluper@gmail.com', '2020-12-08 12:36:24'),
(4, 'sarahedeh@gmail.com', '2020-12-08 12:42:12'),
(5, 'chochomayoki@gmail.com', '2020-12-08 18:57:05'),
(6, 'ochanyaali2017@gmail.com', '2020-12-08 20:18:50'),
(7, 'stefan@gmail.com', '2020-12-08 20:19:12'),
(8, 'rolex@info.com', '2020-12-08 20:19:34'),
(9, 'ahuachristopher@gmail.com', '2020-12-08 20:19:45'),
(10, 'aburdaniel@gmail.com', '2020-12-08 20:19:57'),
(11, 'babyangel@gmail.com', '2020-12-08 20:20:07'),
(12, 'bella@gmail.com', '2020-12-08 20:20:21'),
(13, 'lucy@gmail.com', '2020-12-08 20:20:49'),
(14, 'nyiishitimothy@gmail.com', '2020-12-08 20:26:55'),
(15, 'graceokpanachi@gmail.com', '2020-12-08 20:27:27'),
(16, 'shidoonmercy@gmail.com', '2020-12-08 21:08:48'),
(17, 'ugwuvitus@gmail.com', '2020-12-09 10:43:48'),
(18, 'agenatonsamson@gmail.com', '2020-12-16 12:34:26'),
(19, 'currency@gmail.com', '2021-02-24 22:07:32'),
(20, 'christybella@gmail.com', '2021-03-26 21:52:10'),
(21, 'akaakoholkingdom@gmail.com', '2022-03-11 13:54:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
