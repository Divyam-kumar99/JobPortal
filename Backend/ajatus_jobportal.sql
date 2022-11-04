-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 07:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajatus_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Girish', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `prev_exp` int(11) DEFAULT 0,
  `resume` varchar(200) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applied_on` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `i_id` int(11) NOT NULL,
  `pi_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `email`, `phone`, `prev_exp`, `resume`, `job_id`, `applied_on`, `status`, `i_id`, `pi_date`) VALUES
(1, 'Sona', 'sona@gmail.com', '8895635744', 0, '8de8777ba9ab79f04373f1bc75e1ced8.pdf', 14, '2021-07-07 22:56:23', 4, 4, '2021-07-17'),
(2, 'cat', 'cat@ajatus.in', '7893456270', 1, '9e59363b93e624400018331f32055680.pdf', 1, '2021-07-08 08:19:13', 5, 1, '2021-07-13'),
(3, 'abc', 'abc@xyz.com', '7377086959', 4, '1cacacdd973453a427121258ca17b99d.pdf', 12, '2021-07-08 08:20:15', 0, 0, NULL),
(4, 'xyz', 'zyx@gmail.com', '8987654356', 6, 'f62881747b482573972d0dfa132daaf2.pdf', 15, '2021-07-08 08:31:27', 0, 0, NULL),
(5, 'xyz', 'xyz@gmail.com', '7568499378', 4, '6801b393ad3e803fa6262b5938c8fb79.pdf', 13, '2021-07-08 08:32:50', 0, 0, NULL),
(6, 'shreyas', 'shreyas@gmail.com', '7896785432', 3, 'a1e186e4a17d2c31b8e172915a9f1e95.pdf', 15, '2021-07-08 08:44:35', 4, 4, '2021-07-13'),
(7, 'abcdef', 'abcdef@xyz.com', '9435674589', 3, '413693c31edc824b3f52fb514ff94b49.pdf', 14, '2021-07-08 08:46:53', 1, 0, NULL),
(8, 'sdc', 'sdc@gmail.com', '8093875230', 1, '6190efc8432dd50f0235166427746b70.pdf', 12, '2021-07-08 11:26:22', 0, 1, '2021-07-08'),
(9, 'Debashis Swain', 'abhishek.maharana@ajtus.co.in', '8249578446', 0, 'df27a682f81c530bc6753f67e3d0cab2.pdf', 18, '2021-07-13 09:15:07', 4, 5, '2021-07-13'),
(10, 'Rakesh', 'rakesh@ajatus.co.in', '8908544236', 4, '1c1d3acd95870471770f8bf019f4b2a1.pdf', 19, '2021-07-14 11:16:45', 5, 14, '2021-07-16'),
(11, 'Baisnavee', 'baisnavee.panda08@gmail.com', '9090909090', 5, '861152fc3aa8a87da61ea7d4c8ba4b18.pdf', 19, '2021-07-14 13:29:08', 6, 15, '2021-07-16'),
(12, 'Dog', 'dog@gmail.com', '7893890987', 0, '60c9b2487041d401abd3975fb341052e.pdf', 13, '2021-07-15 11:46:11', 5, 16, '2021-08-27'),
(13, 'mani', 'mani@abc.com', '8794657905', 1, 'b3c21f6c97790ef92ac82501e053cc78.pdf', 1, '2021-08-17 08:53:55', 2, 0, NULL),
(14, 'Dev', 'devalaya.321@gmail.com', '7865790987', 0, 'e1a45d02865f44fd50fe66dbfee14aaa.pdf', 14, '2021-11-27 07:20:03', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_status`
--

CREATE TABLE `candidate_status` (
  `id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sts_name` varchar(50) NOT NULL DEFAULT 'Applied',
  `sts_value` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_status`
--

INSERT INTO `candidate_status` (`id`, `c_id`, `sts_name`, `sts_value`) VALUES
(1, NULL, 'Applied', 0),
(2, NULL, 'called', 1),
(3, NULL, 'not responding', 2),
(4, NULL, 'on hold', 3),
(5, NULL, 'interview scheduled', 4),
(6, NULL, 'rejected', 5),
(7, NULL, 'job offered', 6);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'BaisnaveePa', 'baisnavee@ajatus.co.in', '8895735655', '1234', 1),
(3, 'Sanny', 'sanny@ajatus.co.in', '36437497943', '1212', 0),
(5, 'Saroj ', 'saroj@ajatus.co.in', '7182699016', 'swagatika', 1),
(13, 'Debashis Swain', 'debashis.swain@ajatus.co.in', '8093875234', 'mkr5htgi', 1),
(14, 'Abhisekh', 'abhishek.maharana@ajtus.co.in', '7895683648', '123', 1),
(15, 'swag', 'swag@mail.com', '7897650909', '1234', 1),
(16, 'Manisha', 'manisha.das@ajatus.co.in', '8799298882', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `c_id`) VALUES
(1, 'Divyam is the best', 7),
(2, '', 9),
(3, '', 9),
(4, 'sdcdscds', 9),
(5, 'Was not fluent', 2),
(6, 'no knowledge', 8),
(7, 'bekar', 2),
(8, 'No basic knowledge', 2),
(9, 'No basic knowledge', 2),
(10, 'not good', 10),
(11, 'too goo skills', 11),
(12, 'chhiiii', 12),
(13, 'didn\'t respond', 13);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `min_exp` int(11) NOT NULL DEFAULT 0,
  `openings` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `benifits` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `description`, `excerpt`, `min_exp`, `openings`, `image`, `benifits`, `status`, `created`) VALUES
(1, 'PHP developer', '<p>Should have knowledge on&nbsp; HTML, CSS and JS</p><p>Should have working experience in raw PHP and atleast one framework(laravel/codeigiter/cakephp)</p>', 'should have experience in frontend technologies like html, css, bootstrap and backend in php', 6, 5, 'e1d3936751f6d06bc9afa7f46f0819f7.png', 'attractive package', 1, '2021-07-05 17:05:22'),
(12, '.NET developer', '<p>xbjaBCkjaBSclbdsLckidsLicbds</p>', 'dbcajDXbkadasUGCkuas', 1, 2, '2cd42edfbe9d858701d47b3b7a9b861e.jpg', 'xkjagXKGJUSKC', 1, '2021-07-06 07:13:06'),
(13, 'SQL developer', '<p>eiwhcidsgvlidfhglivdrhblighrsgoetshoight;sopbotjro</p>', 'bcusdgiufsdgvukjf', 3, 5, '2442141d8e68ebde2f514346d2067e3f.jpg', 'dhcdsiugvusj', 1, '2021-07-06 07:11:39'),
(14, 'Intern', '<p>hfcishfcierhzvihrfgvihtoidhilbobiogtgtiohpotrpohjgporgjeosfjeo;</p>', 'fciefhiorhgoiribhif', 0, 10, 'ba4947a69a92706364c126b135cf0c6b.png', 'ppo', 1, '2021-07-06 07:12:54'),
(15, 'MERN developer', '<p>Required:</p><p>Node js Knowledge</p><p>Framework: Angular/ React/ Vue js</p><p>Backend framework: Express js</p><p>Database: MongoDB, Firebase</p><p><br></p>', 'should have experience in frontend technologies and backend.', 10, 5, '52322ef9d2812b61e8064b801a8fbd3d.jpg', 'Attractive incentives', 1, '2021-07-06 12:33:14'),
(18, 'Intern Tester', '<p>mhbsdcds</p>', 'should have experience in web page testing', 0, 1, '383a98ab32d3fb749e1930e6f12fcb8e.png', 'bjbjgkjgkj', 1, '2021-07-13 12:00:30'),
(19, 'Node JS developer', '<section class=\"ds-about\" id=\"about\" style=\"margin: 0px; outline: none; padding: 40px 0px 141px; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div class=\"ds-about__content container\" style=\"margin-top: 0px; margin-bottom: 0px; outline: none; padding: 0px 15px; width: 1140px;\"><article class=\"rowss careers\" style=\"margin: 0px; outline: none; padding: 0px;\"><div class=\"row\" style=\"margin: 0px -15px; outline: none; padding: 0px;\"><div class=\"col-md-12\" style=\"margin: 0px; outline: none; padding: 0px 15px; width: 1140px; min-height: 1px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none; padding: 0px; width: 1110px;\"><span style=\"margin: 0px; outline: none; padding: 0px; font-family: Lato, sans-serif; font-weight: bolder;\">What do we expect you to have?(Experience required 2-3 years)</span></p><ul style=\"margin-right: 0px; margin-left: 0px; outline: none; padding: 0px; list-style: none;\"><li style=\"margin: 0px; outline: none; padding: 0px;\">Hands on experience in any of the following JS technologies Node, Angular, REACT</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Worked on REST APIs</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Worked on more than one SQL No-SQL DB Oracle, Postgres, MongoDB, DynamoDB, Graph DB</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Thorough understanding of React.js and its core principles</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Experience with popular React.js workflows (such as Flux or Redux)</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Experience with data structure libraries (e.g., Immutable.js)</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Knowledge of isomorphic React is a plus</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Knowledge of modern authorization mechanisms, such as JSON Web Token</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Familiarity with modern front-end build pipelines and tools</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Experience with common front-end development tools such as Babel, Webpack, NPM, etc.</li><li style=\"margin: 0px; outline: none; padding: 0px;\">Familiarity with code versioning tools such as Git, SVN and Mercurial</li></ul></div></div></article></div></section>', 'Should have knowledge on frontend ', 1, 12, '5aa30dcf0cb3c673898a28d7e63eb49d.jpg', 'incentives', 1, '2021-07-14 11:15:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_status`
--
ALTER TABLE `candidate_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `candidate_status`
--
ALTER TABLE `candidate_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
