-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 03:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans1` varchar(100) NOT NULL,
  `ans2` varchar(100) NOT NULL,
  `ans3` varchar(100) NOT NULL,
  `ans4` varchar(100) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES
(1, 'What does PHP stand for?', 'PHP: Hypertext Preprocessor', ' Personal Hypertext Processor', 'Private Home Page', 'none of the above', '0', 1),
(2, 'How will you concatenate two strings?', 'Using . operator.', ' Using + operator.', ' Using add() function', ' Using append() function', '0', 1),
(3, 'How do you write \"Hello World\" in PHP', '\"Hello World\";', 'echo \"Hello World\";', ' Document.Write(\"Hello World\");', 'none of the above', '1', 1),
(4, 'All variables in PHP start with which symbol?', '!', '$', ' &', 'none of the above', '1', 1),
(5, 'Which SQL statement is used to update data in a database?', 'UPDATE', 'MODIFY', 'SAVE AS', 'SAVE', '0', 4),
(6, 'Which SQL statement is used to return only different values?', 'SELECT DISTINCT', 'SELECT DIFFERENT', 'SELECT UNIQUE', 'none of the above', '0', 4),
(7, 'Which SQL keyword is used to sort the result-set?', 'SORT', 'ORDER BY', 'ORDER', 'SORT BY', '1', 4),
(8, 'Which of the following attributes of text box control allow to limit the maximum character?', 'size', 'len', 'maxlength', 'all of these', '2', 5),
(9, ' Which of the following defines a measurement in inches?', ' in', ' mm', ' pc', ' pt', '0', 8),
(10, ' Which of the following defines 1% of viewport width?', 'px', 'vh', 'vw', 'vmin', '2', 8),
(11, 'What scripting language is jQuery written in?', 'VBScript', ' JavaScript', ' C#', 'C++', '1', 10),
(12, 'Which of the following is a valid type of function javascript supports?', 'named function', 'anonymous function', 'Both of the above.', 'None of the above.', '2', 10),
(13, 'What does HTML stand for?', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyper Text Markup Language', 'Hyper Extendable Language', '2', 5),
(14, 'Who is making the Web standards?', 'Mozilla', 'Google', 'The World Wide Web Consortium', 'Microsoft', '2', 5),
(15, 'Which character is used to indicate an end tag?', '^', '/', '>', '*', '1', 5),
(16, ' How many tags are in a regular element?', '4', '3', '0', '2', '3', 5),
(17, 'Which built-in method adds one or more elements to the end of an array and returns the new length of the array?', 'last()', 'put()', 'push()', ' None of the above.', '2', 6),
(18, ' Which of the following function of String object combines the text of two strings and returns a new string?', 'add()', 'merge()', 'concat()', 'append()', '2', 6),
(19, 'Which of the following function of String object returns a number indicating whether a reference string comes before or after or is the same as the given string in sort order?', ' localeCompare()', 'search()', 'substr()', 'concat()', '0', 6),
(20, ' Which of the following function of String object returns the primitive value of the specified object', ' toLocaleUpperCase()', ' toUpperCase()', ' toString()', ' valueOf()', '3', 6),
(21, 'Which of the following function of String object causes a string to be displayed as struck-out text, as if it were in a <strike> tag?', ' sup()', 'small()', ' strike()', 'sub()', '2', 6),
(22, 'Which of the following function of Array object sorts the elements of an array?', 'toSource()', 'sort()', 'toString()', 'unshift()', '1', 6),
(23, 'Which of the following is true?', 'If onKeyDown returns false, the key-press event is cancelled.', ' If onKeyPress returns false, the key-down event is cancelled.', ' If onKeyDown returns false, the key-up event is cancelled.', ' If onKeyPress returns false, the key-up event is canceled.', '0', 6),
(24, 'Choose the client-side JavaScript object:', 'Database', 'Cursor', ' Client', ' FileUpLoad', '3', 6),
(25, 'Which best describes void?', 'A method', 'A function', 'A statement', 'An operator', '3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `score_details`
--

CREATE TABLE `score_details` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `score` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score_details`
--

INSERT INTO `score_details` (`id`, `user_id`, `username`, `date`, `score`) VALUES
(20, 11, 'Priyar', '2021-07-09 12:53:15', '3'),
(22, 11, 'Priyar', '2021-07-09 12:58:37', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` int(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `isLogged` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `email`, `mobile`, `password`, `isLogged`) VALUES
(11, 'Priyar', 'priya@gmail.com', 2147483647, 'af@123', 0),
(13, 'samu', 'samu@gmail.com', 2147483647, 'sam@12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score_details`
--
ALTER TABLE `score_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score_details`
--
ALTER TABLE `score_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
