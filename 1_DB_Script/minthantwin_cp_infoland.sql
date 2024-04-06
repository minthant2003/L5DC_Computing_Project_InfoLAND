-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 06, 2024 at 09:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp_infoland`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Profile` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Username`, `Password`, `Fullname`, `Email`, `Profile`) VALUES
(1, 'adminInfoLAND', '$2y$10$7o2TbMRU.CnZ9Nj22i2R7./gtXguGjugfRDJ4rMr1wqtBrR3XkMo6', 'Ma Than Win', 'mathanwinn2@gmail.com', 'dog2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Entry_LP` int(11) NOT NULL,
  `Goal_LP` int(11) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Syllabus` varchar(80) NOT NULL,
  `Image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Name`, `Description`, `Category`, `Entry_LP`, `Goal_LP`, `Price`, `Syllabus`, `Image`) VALUES
(1, 'Cryptography', 'Cryptography is the science of securing communication and information through the use of mathematical techniques and algorithms. Cryptography involves the creation and study of codes and ciphers, as well as the development of cryptographic protocols for secure communication. Cryptography plays a crucial role in various scenarios. It is a fundamental component in the field of networking, providing the foundation for secure communication and data protection in an increasingly digital and interconnected world.', 'Network Engineering', 0, 5, 0.00, 'Cryptography.pdf', 'Cryptography.png'),
(2, 'Data Structures & Algorithms', 'Data structures and algorithms are foundational concepts in computer science that deal with the manipulation of data to solve computational problems. Data structures are ways of organizing and storing data to perform operations on that data effectively. Common data structures include arrays, linked lists, stacks, queues, trees, and hash tables. Algorithms are step-by-step procedures or sets of rules for solving a particular problem. They describe the logic and flow of how to perform a task or solve a problem. Together, data structures and algorithms form the backbone of computer science. Understanding and applying these principles are fundamental skills for programmers to develop efficient and scalable solutions.', 'Software Engineering', 20, 5, 250.00, 'Data Structures & Algorithms.pdf', 'Data Structures & Algorithms.png'),
(4, 'Ethical Pentester', 'Ethical Penetration Testing is a security practice where professionals simulate cyberattacks on computer systems to assess and identify vulnerabilities. The primary goal is to proactively uncover weaknesses in an organization\\\'s security posture before malicious hackers can exploit them. Ethical penetration testing plays a crucial role in helping organizations stay ahead of potential threats, ensuring that their systems and data remain secure.', 'Cyber Security', 15, 5, 200.00, 'Ethical Pentester.pdf', 'Ethical Pentester.png'),
(6, 'Introduction to CEH', 'CEH is a professional certification offered by the EC-Council. This certification is designed for individuals who want to demonstrate their skills in ethical hacking and penetration testing. Ethical hackers, often referred to as \\\"white hat\\\" hackers, use their knowledge to identify and address security vulnerabilities within computer systems, networks, and applications. CEH is widely recognized in the cybersecurity industry and is suitable for security professionals, network administrators, and individuals interested in pursuing a career in ethical hacking.', 'Cyber Security', 10, 5, 300.00, 'Introduction to CEH.pdf', 'Introduction to CEH.png'),
(7, 'Programming with Scratch', 'Scratch is a visual programming language developed by the Lifelong Kindergarten Group at the MIT Media Lab. It is designed to make coding accessible to beginners, especially children, and offers a graphical interface where users can create interactive stories, games, and animations. Scratch is an excellent tool for beginners to grasp programming fundamentals in a fun and interactive way. It promotes creativity and provides a stepping stone for individuals interested in exploring more advanced programming languages in the future.', 'Software Engineering', 0, 5, 150.00, 'Programming with Scratch.pdf', 'Programming with Scratch.png'),
(8, 'Understanding How Computers Learn', 'AI is a broad field of computer science focused on creating intelligent machines. These tasks include problem-solving, learning, perception, language understanding, and decision-making. Machine Learning is a subset of AI that emphasizes the development of algorithms and statistical models that enable computers to learn from data and improve their performance over time without explicit programming.AI and ML technologies are applied across various industries, contributing to the development of innovative solutions. The field continues to advance rapidly, shaping the future of intelligent systems.', 'AI/ML', 0, 5, 0.00, 'Understanding How Computers Learn.pdf', 'Understanding How Computers Learn.png'),
(9, 'Web Application development with JAVA', 'Developing web applications with Java typically involves using frameworks like Spring, JavaServer Faces (JSF). Most Java web frameworks follow the MVC pattern. Models represent the data, views represent the user interface, and controllers handle user input and orchestrate the flow of data between models and views. Once your application is ready, package it into a WAR (Web Application Archive) file and deploy it to a web server like Apache Tomcat. You may also consider containerization using technologies like Docker for easier deployment and scaling. Overall, developing web applications with Java involves understanding the chosen framework, integrating with databases, building a frontend interface, testing thoroughly, and deploying efficiently.', 'Software Engineering', 5, 5, 250.00, 'Web Application development with JAVA.pdf', 'Web Application development with JAVA.png'),
(10, 'Data Visualisation with Python', 'Data visualisation is a crucial aspect of data science that involves representing data graphically to uncover patterns, trends, and insights. It is the process of converting complex datasets into visual forms, such as charts, graphs, and maps, to make information more understandable and accessible. Popular tools for creating data visualizations include Python libraries like Matplotlib, Seaborn, and Plotly, as well as tools like Tableau and Power BI.In summary, data visualization is a critical component of the data science process, providing a means to explore, understand, and communicate insights derived from complex datasets.', 'Data Science', 15, 5, 250.00, 'Data Visualisation with Python.pdf', 'Data Visualisation with Python.png'),
(11, 'Introduction to CCNA', 'CCNA is a widely recognized entry-level certification offered by Cisco Systems. It validates the foundational knowledge and skills required to install, operate, and troubleshoot small to medium-sized enterprise networks. CCNA is a stepping stone for individuals looking to pursue a career in networking and is highly regarded in the IT industry. CCNA covers fundamental networking concepts, including the OSI model, TCP/IP, subnetting, and basic networking protocols.', 'Network Engineering', 0, 5, 0.00, 'Introduction to CCNA.pdf', 'Introduction to CCNA.png'),
(17, 'Testing', 'testing', 'Software Engineering', 5, 5, 5.00, 'Cryptography.pdf', 'Cryptography.png'),
(19, 'Testing 1', 'Testing 1 Testing 1 Testing 1 Testing 1 Testing 1 Testing 1', 'Network Engineering', 5, 5, 100.00, 'Cryptography.pdf', 'Cryptography.png');

--
-- Triggers `course`
--
DELIMITER $$
CREATE TRIGGER `free_entryLP_price_set_0` BEFORE INSERT ON `course` FOR EACH ROW IF NEW.Entry_LP IS NULL AND NEW.Price IS NULL THEN
	SET NEW.Entry_LP = 0;
	SET NEW.Price = 0;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `Enroll_ID` int(11) NOT NULL,
  `Learner_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Success` bit(1) NOT NULL,
  `Certificate` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`Enroll_ID`, `Learner_ID`, `Course_ID`, `Date`, `Success`, `Certificate`) VALUES
(18, 6, 1, '2024-03-27', b'1', b'1'),
(19, 6, 8, '2024-03-27', b'1', b'1'),
(20, 6, 11, '2024-03-27', b'1', b'1'),
(21, 6, 7, '2024-03-27', b'1', b'1'),
(22, 4, 1, '2024-03-27', b'0', b'0'),
(23, 4, 11, '2024-03-27', b'1', b'1'),
(24, 5, 8, '2024-03-27', b'0', b'0'),
(25, 7, 7, '2024-03-27', b'1', b'0'),
(26, 7, 1, '2024-03-27', b'1', b'0'),
(27, 7, 11, '2024-03-27', b'1', b'0'),
(29, 7, 4, '2024-03-28', b'1', b'0'),
(30, 7, 2, '2024-03-28', b'0', b'0'),
(31, 9, 1, '2024-03-29', b'0', b'0'),
(32, 10, 8, '2024-03-29', b'1', b'0'),
(33, 10, 1, '2024-03-29', b'0', b'0'),
(34, 10, 17, '2024-04-01', b'0', b'0');

--
-- Triggers `enroll`
--
DELIMITER $$
CREATE TRIGGER `success_certificate_0` BEFORE INSERT ON `enroll` FOR EACH ROW SET NEW.Success = b'0', NEW.Certificate = b'0'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `Learner_ID` int(11) NOT NULL,
  `Username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Personal_LP` int(11) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Profile` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`Learner_ID`, `Username`, `Password`, `Personal_LP`, `Fullname`, `Email`, `Profile`) VALUES
(4, 'minthantwin', '$2y$10$tOOjk5Y.qhTeL3zU2.bOgeZ4Lz71Iz7YZ29K5oo8rAFXhbUjFr/PS', 5, 'Min Thant Win', 'minnthantwinn@gmail.com', 'cat1.jpg'),
(5, 'minthantwinOutlook', '$2y$10$0y8A8lGsry6NxIm41VS9nOSJ8zmGuDWLL8qtlhTIKGG3NkSmAzOw2', 20, 'minthantwinOutlook', 'minnthantwinn3@outlook.com', 'bird1.jpg'),
(6, 'mathanwin', '$2y$10$bqX9F1HtmfsHg5Ih5LZYW.TafIoKixvwqUaxi7e9XW4JjHoNVQbc.', 10, 'Ma Than Win', 'mathanwinn2@gmail.com', 'cat2.jpg'),
(7, 'yiyiaung', '$2y$10$xJqOVelQfZBzWzkQX61Mpe0nA7G4AwwZ1wlBTqlvaIarc7MnSSXWa', 20, 'Yi Yi Aung ', 'all.the.shine.is.not.gold@gmail.com', 'dog1.jpg'),
(8, 'minthantwinThree', '$2y$10$orMDU4DIHAjoMqGm.1bQU.eBSAT4jq8c6SGFzZ0YrF3f38nFahmWi', 0, 'Min Thant Win Three', 'mathanwinn2@gmail.com', 'bird2.jpg'),
(9, 'Tyler', '$2y$10$tTizr1paTnTKYMX4HEG4mOOrY0IQEQIMEZgbDMEZvwLdRcTqL.t9G', 0, 'Zwe Nyi Nyi', 'abc@gmail.com', 'Cryptography.png'),
(10, 'tinemoekhaing', '$2y$10$3NwTJZ1hFbPvPeB57P8O4Ox3Jz0ovD3YdaGXN/85EU6VKkgGmO8xC', 5, 'Tin Moe', 'tinmoekhaing.mcsc@gmail.com', 'cat2.jpg');

--
-- Triggers `learner`
--
DELIMITER $$
CREATE TRIGGER `personal_LP_0` BEFORE INSERT ON `learner` FOR EACH ROW SET NEW.Personal_LP = 0
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_ID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Answer` char(1) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Quiz_ID`, `Question`, `Answer`, `Course_ID`) VALUES
(1, 'Which cryptographic technique uses the same key for both encryption and decryption?', 'a', 1),
(2, 'Which algorithm is commonly used for encrypting sensitive data like passwords?', 'c', 1),
(3, 'Which term refers to the process of converting plaintext into ciphertext?', 'a', 1),
(4, 'Which protocol is commonly used to provide secure communication over the web?', 'b', 1),
(5, 'What cryptographic concept ensures that a message cannot be denied by the sender?', 'b', 1),
(6, 'Which data structure follows the Last In, First Out (LIFO) principle?', 'b', 2),
(7, 'What is the time complexity of the binary search algorithm?', 'c', 2),
(8, 'Which sorting algorithm has the best-case time complexity of O(n log n)?', 'c', 2),
(9, 'In which data structure are elements accessed using a unique key?', 'a', 2),
(10, 'Which search algorithm is generally used for unsorted or randomly sorted arrays?', 'b', 2),
(16, 'What is the primary goal of ethical penetration testing?', 'a', 4),
(17, 'Which of the following is NOT a phase of ethical penetration testing?', 'b', 4),
(18, 'What type of testing involves simulating a real-world attack scenario without causing harm?', 'c', 4),
(19, 'Which credential might an ethical penetration tester possess?', 'b', 4),
(20, 'What is the main objective of an ethical penetration tester?', 'b', 4),
(26, 'What does CEH stand for in the field of cybersecurity?', 'a', 6),
(27, 'Which of the following is NOT a common phase in the CEH hacking methodology?', 'b', 6),
(28, 'What is the primary goal of a Certified Ethical Hacker?', 'b', 6),
(29, 'Which type of testing involves evaluating a network or system for vulnerabilities?', 'b', 6),
(30, 'Which credential is typically obtained after passing the CEH exam?', 'c', 6),
(31, 'What type of programming language is Scratch?', 'b', 7),
(32, 'In Scratch, which category contains blocks for controlling the flow of a program?', 'c', 7),
(33, 'What does the \"broadcast\" block do in Scratch?', 'a', 7),
(34, 'Which event block is triggered when the green flag icon is clicked?', 'a', 7),
(35, 'What is the primary purpose of the \"repeat\" block in Scratch?', 'c', 7),
(36, 'Which term refers to the process of a computer system improving its performance on a task through experience?', 'a', 8),
(37, 'What is the primary objective of supervised learning?', 'a', 8),
(38, 'Which type of learning algorithm aims to mimic the way the human brain processes information?', 'c', 8),
(39, 'What is the role of a loss function in machine learning?', 'b', 8),
(40, 'Which approach involves training a model without explicit supervision, often used for finding hidden patterns in data?', 'b', 8),
(41, 'Which Java framework is commonly used for building web applications?', 'a', 9),
(42, 'What does JSP stand for in the context of web application development with Java?', 'b', 9),
(43, 'Which file is commonly used to configure servlet mappings in a Java web application?', 'b', 9),
(44, 'Which of the following is NOT a commonly used Java IDE for web application development?', 'c', 9),
(45, 'Which Java technology is used for managing session data in web applications?', 'c', 9),
(46, 'Which library in Python is commonly used for creating data visualizations?', 'c', 10),
(47, 'Which type of plot is best suited for displaying the distribution of a single continuous variable?', 'b', 10),
(48, 'Which function is used to display a plot in Matplotlib?', 'c', 10),
(49, 'What does the Seaborn library primarily focus on enhancing in data visualization?', 'a', 10),
(50, 'Which Python library is used for creating interactive and web-based visualizations?', 'c', 10),
(51, 'What does CCNA stand for in networking?', 'a', 11),
(52, 'Which layer of the OSI model is responsible for logical addressing and routing?', 'b', 11),
(53, 'What is the default subnet mask for a Class C IP address?', 'a', 11),
(54, 'Which protocol is used by Cisco devices to dynamically assign IP addresses to network devices?', 'a', 11),
(55, 'What type of cable is commonly used to connect a PC to a Cisco router console port?', 'c', 11),
(79, 'question 1', 'a', 17),
(80, 'question 2', 'b', 17),
(82, 'question 4', 'b', 17),
(93, 'question 3', 'b', 17),
(94, 'question 5', 'c', 17),
(95, 'question 21', 'c', 19),
(96, 'question 22', 'a', 19),
(97, 'question 23', 'b', 19),
(98, 'question 24', 'a', 19),
(99, 'question 25', 'c', 19);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `Option_ID` int(11) NOT NULL,
  `Option_text` text NOT NULL,
  `Quiz_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`Option_ID`, `Option_text`, `Quiz_ID`) VALUES
(1, 'Symmetric cryptography (Right answer)', 1),
(2, 'Asymmetric cryptography', 1),
(3, 'Hashing', 1),
(4, 'RSA', 2),
(5, 'SHA-256', 2),
(6, 'AES (Right answer)', 2),
(7, 'Encryption (Right answer)', 3),
(8, 'Decryption', 3),
(9, 'Hashing', 3),
(10, 'SSL', 4),
(11, 'HTTP (Right answer)', 4),
(12, 'FTP', 4),
(13, 'Integrity', 5),
(14, 'Authentication (Right answer)', 5),
(15, 'Non-repudiation', 5),
(16, 'Queue', 6),
(17, 'Stack (Right answer)', 6),
(18, 'Linked List', 6),
(19, 'O(n)', 7),
(20, 'O(log n)', 7),
(21, 'O(n^2) (Right answer)', 7),
(22, 'Bubble Sort', 8),
(23, 'Insertion Sort', 8),
(24, 'Merge Sort (Right answer)', 8),
(25, 'Hash Table (Right answer)', 9),
(26, 'Queue', 9),
(27, 'Stack', 9),
(28, 'Linear Search', 10),
(29, 'Binary Search (Right answer)', 10),
(30, 'Depth-First Search', 10),
(46, 'To identify and fix security weaknesses (Right answer)', 16),
(47, 'To exploit vulnerabilities for personal gain', 16),
(48, 'To cause disruption to systems and networks', 16),
(49, 'Reporting', 17),
(50, 'Exploitation (Right answer)', 17),
(51, 'Denial of Service', 17),
(52, 'Black-box testing', 18),
(53, 'White-box testing', 18),
(54, 'Red teaming (Right answer)', 18),
(55, 'Certified Scrum Master (CSM)', 19),
(56, 'Certified Ethical Hacker (CEH) (Right answer)', 19),
(57, 'Certified Public Accountant (CPA)', 19),
(58, 'To compromise systems for malicious purposes', 20),
(59, 'To assess security posture and recommend improvements (Right answer)', 20),
(60, 'To perform routine system maintenance', 20),
(76, 'Certified Ethical Hacker (Right answer)', 26),
(77, 'Cybersecurity Expert Hub', 26),
(78, 'Certified Encryption Handler', 26),
(79, 'Enumeration', 27),
(80, 'Exploitation (Right answer)', 27),
(81, 'Encryption', 27),
(82, 'To breach systems for malicious intent', 28),
(83, 'To identify and fix security vulnerabilities (Right answer)', 28),
(84, 'To disrupt network operations', 28),
(85, 'Red team testing', 29),
(86, 'White hat testing (Right answer)', 29),
(87, 'Black hat testing', 29),
(88, 'Certified Security Analyst (CSA)', 30),
(89, 'Certified Information Systems Security Professional (CISSP)', 30),
(90, 'Certified Ethical Hacker (CEH) (Right answer)', 30),
(91, 'Text-based', 31),
(92, 'Visual (Right answer)', 31),
(93, 'Compiled', 31),
(94, 'Motion', 32),
(95, 'Events', 32),
(96, 'Control (Right answer)', 32),
(97, 'Display a message to the user (Right answer)', 33),
(98, 'Send a message to other sprites or scripts', 33),
(99, 'Start a new program execution', 33),
(100, 'When green flag clicked (Right answer)', 34),
(101, 'When flag clicked', 34),
(102, 'Green flag clicked', 34),
(103, 'To stop the execution of a program', 35),
(104, 'To create a loop that runs continuously', 35),
(105, 'To repeat a sequence of blocks a specific number of times (Right answer)', 35),
(106, 'Machine thinking (Right answer)', 36),
(107, 'Deep learning', 36),
(108, 'Reinforcement learning', 36),
(109, 'To train a model with labeled data (Right answer)', 37),
(110, 'To learn from rewards and punishments', 37),
(111, 'To cluster data points into groups', 37),
(112, 'Supervised learning', 38),
(113, 'Unsupervised learning', 38),
(114, 'Neural networks (Right answer)', 38),
(115, 'To minimize the errors between predicted and actual outputs', 39),
(116, 'To maximize the accuracy of the model (Right answer)', 39),
(117, 'To evaluate the performance of the algorithm', 39),
(118, 'Reinforcement learning', 40),
(119, 'Unsupervised learning (Right answer)', 40),
(120, 'Semi-supervised learning', 40),
(121, 'Spring (Right answer)', 41),
(122, 'Hibernate', 41),
(123, 'Struts', 41),
(124, 'Java Standard Protocol', 42),
(125, 'Java Server Pages (Right answer)', 42),
(126, 'Java Servlet Pages', 42),
(127, 'web.xml', 43),
(128, 'servlet.xml (Right answer)', 43),
(129, 'config.xml', 43),
(130, 'Eclipse', 44),
(131, 'IntelliJ IDEA', 44),
(132, 'Visual Studio Code (Right answer)', 44),
(133, 'Servlets', 45),
(134, 'JSP', 45),
(135, 'HttpSession (Right answer)', 45),
(136, 'Matplotlib', 46),
(137, 'NumPy', 46),
(138, 'Pandas (Right answer)', 46),
(139, 'Scatter plot', 47),
(140, 'Histogram (Right answer)', 47),
(141, 'Bar plot', 47),
(142, 'show()', 48),
(143, 'display()', 48),
(144, 'plot() (Right answer)', 48),
(145, '3D plotting (Right answer)', 49),
(146, 'Statistical graphics', 49),
(147, 'Interactive plots', 49),
(148, 'Plotly', 50),
(149, 'Seaborn', 50),
(150, 'ggplot (Right answer)', 50),
(151, 'Certified Cisco Networking Associate (Right answer)', 51),
(152, 'Computer Communication Network Architecture', 51),
(153, 'Centralized Control Network Access', 51),
(154, 'Data Link Layer', 52),
(155, 'Network Layer (Right answer)', 52),
(156, 'Transport Layer', 52),
(157, '255.255.255.0 (Right answer)', 53),
(158, '255.0.0.0', 53),
(159, '255.255.0.0', 53),
(160, 'DHCP (Right answer)', 54),
(161, 'DNS', 54),
(162, 'HTTP', 54),
(163, 'Ethernet cable', 55),
(164, 'USB cable', 55),
(165, 'Console cable (Right answer)', 55),
(235, 'opt1 (right)', 79),
(236, 'opt2', 79),
(237, 'opt3', 79),
(238, 'opt1', 80),
(239, 'opt2 (right)', 80),
(240, 'opt3', 80),
(244, 'opt1', 82),
(245, 'op2 (right)', 82),
(246, 'opt3', 82),
(277, 'opt 1', 93),
(278, 'opt 2 (right)', 93),
(279, 'opt 3', 93),
(280, 'opt 1', 94),
(281, 'opt 2', 94),
(282, 'opt 3 (right)', 94),
(283, 'opt 1', 95),
(284, 'opt 2', 95),
(285, 'opt 3 (right)', 95),
(286, 'opt 1 (right)', 96),
(287, 'opt 2', 96),
(288, 'opt 3', 96),
(289, 'opt 1', 97),
(290, 'opt 2 (right)', 97),
(291, 'opt 3', 97),
(292, 'opt 1 (right)', 98),
(293, 'opt 2', 98),
(294, 'opt 3', 98),
(295, 'opt 1', 99),
(296, 'opt 2', 99),
(297, 'opt 3 (right)', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`Enroll_ID`),
  ADD KEY `enroll_learner_fk` (`Learner_ID`),
  ADD KEY `enroll_course_fk` (`Course_ID`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`Learner_ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `quiz_course_fk` (`Course_ID`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`Option_ID`),
  ADD KEY `option_quiz_fk` (`Quiz_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `Enroll_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `Learner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `Option_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_course_fk` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_learner_fk` FOREIGN KEY (`Learner_ID`) REFERENCES `learner` (`Learner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_course_fk` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD CONSTRAINT `option_quiz_fk` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
