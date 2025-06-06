-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 03:32 PM
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
-- Database: `lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorid` int(111) NOT NULL,
  `authorname` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorid`, `authorname`) VALUES
(1, 'W. Jason Gilmore'),
(2, 'David Mitchell'),
(3, 'Russell Scott'),
(4, 'Kevin Tatroe & Peter Macintyre'),
(5, 'Gordon Davies'),
(6, 'Douglas E. Comer'),
(7, 'Lester Evans'),
(8, 'Brett McLaughlin'),
(9, 'Kevin Mitnick'),
(10, 'Jon Erickson'),
(11, 'Tanenbaum Wetherall'),
(12, 'Greg Tomsho'),
(13, 'Andrew S. Tanenbaum\r\nAlbert S. Woodhull'),
(14, 'Matt Doyle'),
(15, 'Stuart Russell\r\nPeter Norvig'),
(16, 'Wolfgang Ertel'),
(17, 'Ivan Bratko\r\n'),
(18, 'John P.Hayes'),
(19, 'Suzanne Robertson\r\nJames Robertson'),
(20, 'Karl Wiegers\r\nJoy Beatty'),
(21, 'Elizabeth Hull\r\nKen Jackson\r\nJeremy Dick'),
(22, 'John J.Craig'),
(23, 'Roland Siegwart\r\nIllah R. Nourbakhsh\r\nDavid Scaramuzza'),
(24, 'James F.Kurose\r\nKeith W.Ross'),
(25, 'Carol Fairchild\r\nDr. Thomas L. Harman'),
(26, 'Kim Falk'),
(27, 'Rishal Hurbans'),
(28, 'Julian Togelius'),
(29, 'Erwin Kreyszig'),
(30, 'Jeff Heaton'),
(31, 'Eric Bonabeau\r\nMarco Dorigo\r\nGuy Theraulaz'),
(32, 'Anthony Williams'),
(33, 'Josh Lospinso'),
(34, 'David Vandevoorde\r\nNicolai M. Josuttis\r\nDouglas Gregor'),
(35, 'Joyce Farrell'),
(36, 'Michael Inden'),
(37, 'Michael Knapp'),
(38, 'Jual Buku'),
(39, 'John Dean'),
(40, 'Nathan House'),
(41, 'Herbert Schildt'),
(42, 'Guy Brook-Hart\r\nVanessa Jakeman'),
(43, 'Robert Lafore'),
(44, 'Michael T. Goodrich\r\nRoberto Tamassia\r\nMichael H. Goldwasser \r\n'),
(45, 'Ramakrishnan\r\nGehrke'),
(46, 'Ralph Stair\r\nGeorge Reynolds'),
(47, 'Kenneth H. Rosen'),
(48, 'William H. Hayt, Jr.\r\nJack E. Kemmerly\r\nSteven M. Durbin'),
(49, 'Greg Tomsho'),
(50, 'Mark Stamp'),
(51, 'Yvonne Rogers\r\nHelen Sharp'),
(52, 'Anany Levitin'),
(53, 'Jeff Madura'),
(54, 'Instructor\'s Edition'),
(55, 'Patrick Niemeyer\r\nDaniel Leuck'),
(56, 'William Stallings'),
(57, 'Cisco'),
(58, 'John L. Viescas\r\nMichael J. Hernandez'),
(59, 'Mark Priestley'),
(60, 'Jeffrey A. Hoffer\r\nV. Ramesh\r\nHeikki Topi'),
(61, 'Shari Lawrence Pfleeger\r\nJanne M. Atlee'),
(62, 'Serway Vuille'),
(63, 'Thomas'),
(64, 'Thomas L. Floyd'),
(65, 'Terry felke-Morris'),
(66, 'Paul Wilton,\r\nJeremy McPeak'),
(67, 'Joyce Farrell'),
(68, 'Bjarne Stroustrup'),
(69, 'Zheng Xu. Kim-Kwang Raymond Choo\r\nAli Dehghantanha. Reza Parizi\r\nMohammad Hammoudeh '),
(70, 'Marshall Copeland,\r\nMatthew Jacobs'),
(71, 'Cyber Security Coalition'),
(72, 'Robert E. Davis'),
(73, 'Behrouz A. Forouzan'),
(74, 'Wade Trappe\r\nLawrence Washington'),
(75, 'William Stallings'),
(76, 'Jie Wang,\r\nZachary Kissel'),
(77, 'Richard E. Mayer'),
(78, 'Daniel Jurafsky,\r\nJames H. Martin'),
(79, 'Foster Provost,\r\nTom Fawcett'),
(80, 'John D. Kelleher,\r\nBrendan Tierney'),
(81, 'Tay Vaughan'),
(82, 'Ioannis Deliyannis'),
(83, 'Jiawei Han,\r\nMicheline Kamber,\r\nJian Pei'),
(84, 'Robin R. Murphy'),
(85, 'Jorge Angeles'),
(86, 'Lentin Joseph'),
(87, 'Forsyth, \r\nPonce'),
(88, 'Eben Hewitt'),
(89, 'Tutorials point'),
(90, 'Ian H. Witten,\r\nEibe Frank'),
(91, 'David M. Beazley'),
(92, 'Jake VanderPlas'),
(93, 'Michael Minelli,\r\nMichael Chambers,\r\nAmbiga Dhiraj'),
(94, 'George W. Reynolds'),
(95, 'Larry L. Peterson,\r\nBruce S. Davie'),
(96, 'Stephen P. Robbins,\r\nMary Coulter'),
(97, 'Chan S. Park'),
(98, 'Gilbert Strang'),
(99, 'William Bygrave,\r\nAndrew Zacharakis'),
(100, 'James T. Streib'),
(101, 'Jim Ledin'),
(102, 'Philip A Wickham'),
(103, 'Luvai F. Motiwalla,\r\nJeff Thompson'),
(104, 'Saeed K. Rahimi, \r\nFrank. S. Hang'),
(105, 'Kevin Williams'),
(106, 'Steve Ries'),
(107, 'Kashirasagar Naik,\r\nPriyadarshi Tripathy'),
(108, 'Daniel Galin'),
(109, 'Smith Worthington,\r\nJefferson'),
(110, 'Philip D. Straffin'),
(111, 'Forsyth,\r\nPonce'),
(112, 'Ian Sommerville'),
(113, 'Ron Patton'),
(114, 'M. Tamer Ozsu,\r\nPatrick Valduriez');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(100) NOT NULL,
  `bookpic` varchar(500) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorid` int(100) NOT NULL,
  `categoryid` int(100) NOT NULL,
  `yearid` int(100) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bookpic`, `bookname`, `authorid`, `categoryid`, `yearid`, `ISBN`, `file`, `summary`) VALUES
(1, 'AI1.jpg', 'AI: Modern Approach', 15, 1, 3, '98654', 'AI A Modern Approach.pdf', '\"Artificial Intelligence: A Modern Approach\" by Stuart Russell and Peter Norvig is a leading textbook in the field of AI. The third edition covers a wide range of AI topics, including search algorithms, machine learning, reasoning, knowledge representation, natural language processing, and robotics. It provides a balanced mix of theory and practical examples, making complex AI concepts accessible to students and professionals alike. The book is well-known for its comprehensive approach and inclusion of the latest advancements in AI, making it a valuable resource for anyone studying or working in artificial intelligence.'),
(2, 'networking6.jpg', 'Guide to Networking Essentials', 12, 1, 3, '34567', 'Guide to Networking Essentials.pdf', '\"Guide to Networking Essentials\" by Greg Tomsho is a comprehensive textbook that covers the fundamental concepts of networking. The eighth edition of this book is designed to provide a strong foundation in networking for students and IT professionals. It includes detailed explanations of networking hardware, software, protocols, and services. The book is structured to guide readers through the basics of networking, including network design, implementation, security, and troubleshooting. It also features hands-on labs and real-world scenarios to reinforce learning, making it an essential resource for those looking to build or enhance their networking skills.'),
(3, 'php5.jpg', 'Beginning PHP 5.3', 14, 1, 3, '78943', 'Beginning PHP 5.3.pdf', '\"Beginning PHP 5.3\" by Matt Doyle is a practical guide for beginners to learn PHP, a widely-used server-side scripting language. The book covers the fundamentals of PHP programming, including syntax, data types, control structures, functions, and error handling. It also delves into more advanced topics such as working with databases using MySQL, object-oriented programming, and security practices. The text is filled with examples and exercises that help readers build real-world web applications. Designed for newcomers to PHP, this book is an essential resource for those looking to develop dynamic and interactive websites using PHP 5.3.'),
(4, 'AI2.jpg', 'Introduction to Artificial Intelligence', 16, 1, 3, '54367', 'Introduction to AI.pdf', '\"Introduction to Artificial Intelligence\" by Wolfgang Ertel is a concise and accessible textbook that offers a broad overview of AI concepts. The second edition covers fundamental topics such as problem-solving, search algorithms, logic, machine learning, neural networks, and robotics. The book is designed for students and professionals who are new to AI, providing clear explanations, practical examples, and exercises to reinforce learning. Ertel emphasizes the practical application of AI techniques, making complex theories easier to understand. This edition also includes updates on the latest AI advancements, making it a valuable resource for those looking to explore the field of artificial intelligence.'),
(5, 'networking5.jpg', 'CCNAv7 Switching, Routing, and Wireless Essentials', 57, 1, 3, '37899', 'CCNAv7 Switching, Routing, and Wireless Essentials.pdf', '\"CCNAv7: Switching, Routing, and Wireless Essentials (SRWE) Companion Guide\" is an essential resource for those preparing for the Cisco Certified Network Associate (CCNA) certification. This guide covers key concepts in switching, routing, and wireless networking, providing a solid foundation for networking professionals. The book integrates theoretical knowledge with practical, hands-on experience, including configuration, monitoring, and troubleshooting of network devices. It is designed to align with the CCNA curriculum, making it an effective study tool for exam preparation. The guide also includes real-world scenarios to help readers apply what they\'ve learned in practical networking environments.'),
(6, 'AI3.jpg', 'Prolog Programming for Artificial Intelligence', 17, 1, 3, '76587', 'Prolog Programming for Artificial Intelligence.pdf', '\"Prolog Programming for Artificial Intelligence\" by Ivan Bratko is a comprehensive textbook that introduces Prolog, a logic programming language, and its applications in artificial intelligence. The fourth edition covers essential AI topics such as problem-solving, knowledge representation, reasoning, and natural language processing. It balances theoretical concepts with practical examples, making it suitable for both beginners and experienced programmers. The book also introduces constraint logic programming and explores how Prolog can be applied in various AI domains. This edition is an invaluable resource for students and professionals seeking to deepen their understanding of AI through Prolog programming.'),
(7, 'CA.jpg', 'Computer Architecture and Organization', 18, 1, 3, '875653', 'Computer Architecture and Organization.pdf', '\"Computer Architecture and Organization\" by John P. Hayes is a foundational text in the field of computer science and engineering. This book covers the essential concepts of computer architecture and organization, providing detailed insights into how computers are structured and how they execute programs.The cover design, featuring a diagram that likely represents some form of system architecture, is fitting for the book\'s content. The McGraw Hill branding is visible, indicating the book\'s credibility as an educational resource. The third edition suggests that this text has been updated to include more recent developments in the field, making it relevant for students and professionals alike.'),
(8, 'SRE1.jpg', 'Requirement Engineering', 21, 1, 3, '76554', 'Requirements-Engineering 2nd Edition.pdf', '\"Requirements Engineering\" by Elizabeth Hull, Ken Jackson, and Jeremy Dick is a comprehensive guide that delves into the principles and practices of gathering, analyzing, documenting, and managing software requirements. The second edition offers updated methodologies, techniques, and tools essential for effective requirements engineering in both academic and professional settings. It emphasizes the importance of clear, accurate, and well-documented requirements in the successful development of software systems. The book also covers topics like stakeholder engagement, requirements validation, and change management, making it a valuable resource for software engineers, project managers, and anyone involved in software development projects.'),
(9, 'SRE2.jpg', 'Requirement Engineering', 21, 1, 3, '76865', 'Requirement Engineering Third Edition.pdf', '\"Requirements Engineering\" by Elizabeth Hull, Ken Jackson, and Jeremy Dick is an authoritative textbook on the processes and practices involved in requirements engineering. The third edition of this book covers essential topics such as requirements elicitation, specification, validation, and management. It’s a valuable resource for students, practitioners, and researchers in the field of software engineering, providing both theoretical and practical insights into the discipline. The cover\'s clean and professional design reflects the structured and systematic nature of requirements engineering.'),
(10, 'SRE3.jpg', 'Software Requirements', 20, 1, 3, '78394', 'Software Requirements Third Edition.pdf', '\"Software Requirements\" by Karl Wiegers and Joy Beatty is another highly regarded book in the field of software engineering, specifically focused on the practices and methodologies surrounding the gathering, documenting, and managing of software requirements. The third edition includes best practices, techniques, and tools for requirements engineering, making it an essential resource for software engineers, project managers, and business analysts.The cover design, with its geometric patterns and clean lines, reflects the structured approach necessary for managing software requirements effectively. The Microsoft branding also suggests the book\'s alignment with widely accepted industry practices.'),
(11, 'SRE4.jpg', 'Mastering The Requirements Process', 19, 1, 3, '64839', 'Mastering the Requirements Process.pdf', '\"Mastering the Requirements Process: Getting Requirements Right\" by Suzanne and James Robertson is a comprehensive guide that focuses on the importance of gathering and managing requirements in software development. The book presents a systematic approach to capturing precise, clear, and comprehensive requirements, emphasizing the importance of understanding stakeholders\' needs. It offers practical techniques, such as the Volere Requirements Process, to ensure that the requirements are well-defined and aligned with business goals. This third edition also includes new insights on agile methodologies and updates on requirement management practices, making it essential for business analysts and project managers.'),
(12, 'AI4.jpg', 'Introduction to Robotics Mechanics and Control', 22, 5, 0, '695395', 'Introduction to Robotics Mechanics and Control.pdf', '\"Introduction to Robotics: Mechanics and Control\" by John J. Craig is a foundational textbook in the field of robotics. It provides a comprehensive introduction to the mechanics and control of robotic systems, including topics like kinematics, dynamics, and control theory. This third edition includes updated material reflecting the latest advances in robotics technology and research. The book is widely used in engineering courses and serves as a key resource for students and professionals looking to deepen their understanding of robotics.\r\n'),
(13, 'AI6.jpg', 'ROS Robotics By Example', 25, 5, 0, '353667', 'ROS Robotics By Example.pdf', '\"ROS Robotics By Example\" by Carol Fairchild and Dr. Thomas L. Harman is a practical guide to using the Robot Operating System (ROS) to bring life to robots. This book walks readers through the process of building and programming robots using ROS, with detailed examples and hands-on projects. It\'s designed for both beginners and experienced users, providing step-by-step instructions to create various robotic applications. The book covers essential concepts of ROS and helps readers apply them through real-world examples, making it a valuable resource for anyone interested in robotics and ROS.'),
(14, 'AI7.jpg', 'Autonomous Mobile Robots', 23, 5, 0, '35346', 'Introduction to Autonomous Mobile Robots.pdf', '\"Introduction to Autonomous Mobile Robots\" by Roland Siegwart, Illah R. Nourbakhsh, and Davide Scaramuzza is a comprehensive guide on the principles and technology behind autonomous mobile robots. The cover\'s design, with its dynamic, swirling patterns, reflects the complexity and movement inherent in robotics. This book is suitable for students, researchers, and practitioners interested in learning about mobile robotics, covering key topics like perception, localization, mapping, and motion planning. The second edition includes updated content to reflect advancements in the field.'),
(15, 'AI8.jpg', 'Practical Recommender Systems', 26, 5, 0, '35467', 'Practical Recommender Systems.pdf', '\"Practical Recommender Systems\" by Kim Falk is a hands-on guide to building and deploying recommender systems. The book covers various techniques and algorithms, including collaborative filtering, content-based recommendations, and hybrid methods, all while focusing on real-world applications. The cover design, featuring a classical illustration, contrasts with the modern and technical nature of the subject, possibly symbolizing the timeless importance of decision-making and guidance—core themes in recommendation systems. This book is ideal for anyone looking to understand and implement personalized recommendation engines in various domains.'),
(16, 'AI9.jpg', 'Artificial Intelligence Algorithms', 27, 5, 0, '76622', 'Artificial Intelligence Algorithms.pdf', '\"Grokking Artificial Intelligence Algorithms\" by Rishal Hurbans is a comprehensive guide that introduces various AI algorithms in a manner that is accessible to both beginners and experienced professionals. The book aims to demystify complex AI concepts by breaking them down into simple, understandable components. It covers a range of topics including machine learning, neural networks, and optimization algorithms, with practical examples and visualizations to help readers grasp the underlying principles. The cover\'s unique illustration reflects the book\'s approach to making AI concepts engaging and approachable.'),
(17, 'AI5.jpg', 'Swarm Intelligence From Natural to Artifical System', 31, 5, 0, '29841', 'Swarm Intelligence From Natural to Artificial Systems.pdf', '\"Swarm Intelligence: From Natural to Artificial Systems\" by Eric Bonabeau, Marco Dorigo, and Guy Theraulaz explores the concept of swarm intelligence, which refers to the collective behavior of decentralized, self-organized systems. The book delves into how swarm intelligence is inspired by natural systems, such as ant colonies, bird flocking, and fish schooling, and how these principles can be applied to artificial systems like robotics and algorithms. It is a foundational text in the field, bridging the gap between biological inspiration and practical application in artificial intelligence and robotics.'),
(18, 'AI10.jpg', 'Playing Smart On Games', 28, 5, 0, '87932', 'Playing Smart On Games.pdf', '\"Playing Smart: On Games, Intelligence, and Artificial Intelligence\" by Julian Togelius explores the intersection of games and artificial intelligence. The book delves into how AI is used in games, both in creating smarter game AI and in using games as environments to develop and test AI algorithms. It covers topics such as the design of intelligent agents, procedural content generation, and the broader implications of AI in gaming. This book is well-suited for those interested in AI development within the context of gaming and the role of games as a platform for advancing AI research.'),
(19, 'AI11.jpg', 'Artificial Intelligence for Humans, Volume 3', 30, 5, 0, '86293', 'Artificial Intelligence for Humans, Volume 3.pdf', '\"Artificial Intelligence for Humans, Volume 3: Deep Learning and Neural Networks\" by Jeff Heaton focuses on deep learning and neural networks, making complex AI concepts accessible to a broad audience. This volume is part of a series designed to introduce AI topics in a way that doesn\'t require advanced mathematical background. It covers neural networks, their architectures, training processes, and practical applications in deep learning. The book is suitable for those looking to delve into AI with a focus on practical implementation, making it an excellent resource for both beginners and those with some prior knowledge in the field.'),
(20, 'networking7.jpg', 'Computer Networking', 24, 4, 0, '1111', 'Computer Networking.pdf', '\"Computer Networking: A Top-Down Approach\" by James F. Kurose and Keith W. Ross is a foundational textbook that introduces the principles and practice of computer networking. The book adopts a top-down approach, starting from the application layer down to the physical layer, making complex concepts accessible for learners. The text is known for its engaging style, extensive use of real-world examples, and hands-on exercises. It covers topics such as network architecture, protocols, network security, and wireless networks, making it an essential resource for both students and professionals in the field of computer networking.'),
(21, 'networking.jpg', 'Networking For Begineer', 3, 4, 0, '27899', 'Networking for Beginners.pdf', '\"Networking for Beginners\" by Russell Scott is an introductory guide designed to help newcomers understand the fundamentals of computer networking. The book covers essential topics such as the OSI model, IP subnetting, routing protocols, wireless technology, and more. The cover illustrates a network of connected computers, visually representing the book\'s focus on teaching the basics of how networks operate. This book is suitable for those who are new to networking and want to build a strong foundational understanding of the subject.'),
(22, 'networking2.jpg', 'Networking Fundamentals', 5, 4, 0, '2456', 'Networking Fundamentals.pdf', 'This book, \"Networking Fundamentals\" by Gordon Davies, is designed to guide you through the fundamentals of networking. It covers essential concepts like network infrastructure, hardware, protocols, and troubleshooting. Ideal for beginners, this book also prepares you for the Microsoft MTA Networking Fundamentals Exam (98-366). Whether you\'re aiming for a career in IT or simply want to understand networking better, this book provides a solid foundation.'),
(23, 'networking8.jpg', 'Information Security Principles and Practice', 50, 1, 2, '947294', 'Information Security Principles and Practice.pdf', '\"Information Security: Principles and Practice\" by Mark Stamp is a comprehensive guide to the field of information security. The book covers fundamental concepts such as cryptography, access control, and network security. It also delves into advanced topics like digital forensics, risk management, and security policies. With practical examples and case studies, it provides a thorough understanding of how to protect information systems from various threats. This book is ideal for students and professionals looking to deepen their knowledge of cybersecurity principles and practices.'),
(24, 'OS2.jpg', 'Operating Systems (Internals and Design Principles)', 46, 1, 2, '8308583', 'Operating Systems (Internals and Design Principles).pdf', '\"Operating Systems: Internals and Design Principles\" by William Stallings is a comprehensive guide that explores the core concepts, structures, and mechanisms of modern operating systems. Now in its seventh edition, the book covers key topics such as process management, memory management, storage management, and protection and security, with an emphasis on the design principles that underlie these systems. Stallings provides a balanced approach, blending theory with practical examples, including case studies of contemporary operating systems like Windows and Linux. The text is widely used in academic settings and is ideal for students and professionals seeking an in-depth understanding of operating systems.'),
(25, 'Java3.jpg', 'Data Structures and Algorithms in Java', 44, 1, 2, '637222', 'Data Structures and Algorithms in Java 6th Edition.pdf', '\"Data Structures and Algorithms in Java\" (Sixth Edition) by Michael T. Goodrich, Roberto Tamassia, and Michael H. Goldwasser is a comprehensive textbook that provides a detailed exploration of fundamental data structures and algorithms, using Java as the implementation language. The book covers a range of topics including arrays, linked lists, trees, graphs, sorting, searching, and algorithm analysis, making it suitable for both beginners and advanced learners. It emphasizes practical applications, efficiency, and performance considerations while offering visual representations and Java code examples. This edition also integrates modern techniques and problem-solving strategies, making it a valuable resource for computer science students and professionals.'),
(26, 'networking10.jpg', 'Guide to Networking Essentials ', 49, 1, 2, '297342', 'Guide to Networking Essentials 7th Edition.pdf', '\"Guide to Networking Essentials\" (Seventh Edition) by Greg Tomsho is an introductory textbook that provides a comprehensive overview of networking concepts, technologies, and practices. The book covers foundational topics such as network design, implementation, security, protocols, and troubleshooting, making it suitable for students and professionals entering the field of networking. It includes practical exercises, real-world examples, and step-by-step instructions to help readers develop hands-on skills in configuring and managing networks. This edition also addresses the latest advancements in networking technologies, including wireless networking, virtual networks, and cloud computing, ensuring that readers are equipped with up-to-date knowledge and skills.'),
(27, 'Bussiness1.jpg', 'Introduction to Business ', 53, 1, 2, '346373', 'Introduction to Business 4th edition.pdf', '\"Introduction to Business\" by Jeff Madura (4th Edition) is a foundational textbook designed to provide readers with a broad understanding of the business world. The book covers essential topics such as management, marketing, finance, and economics, making it an ideal resource for students new to business studies. It blends theoretical concepts with practical applications, helping readers connect academic learning with real-world business scenarios. The text is complemented by case studies, examples, and discussions that encourage critical thinking and engagement. This comprehensive guide equips readers with the knowledge and skills necessary to succeed in various business environments.'),
(28, 'networking3n.jpg', 'Internetworking with TCP/IP', 6, 4, 0, '24512', 'Internetworking with TCP_IP.pdf', ' \"Internetworking with TCP/IP: Principles, Protocols, and Architectures,\" by Douglas E.Comer is a comprehensive guide to the fundamentals of TCP/IP networking. The fourth edition by Douglas E. Comer covers essential topics such as network infrastructure, hardware, protocols, and troubleshooting. This book is ideal for beginners and provides a solid foundation for those pursuing a career in IT or simply wanting to understand networking better.'),
(29, 'php1.jpg', 'Beginning PHP and MySQL', 1, 2, 0, '2487', 'Beginning PHP and Mysql.pdf', '\"Beginning PHP and MySQL by W.Jason Gilmore\" is a comprehensive guide to building dynamic websites using PHP and MySQL. It starts with the basics, making it accessible for beginners, but also delves into more advanced topics like user management and security. Packed with practical examples and exercises, it teaches you how to effectively combine PHP and MySQL to create interactive web applications. Whether you\'re a novice or have some programming experience, this book provides a solid foundation for mastering web development.'),
(30, 'php2.jpg', 'Programming PHP', 4, 2, 0, '27899', 'Programming PHP.pdf', '\"Programming PHP by Kevin Tatroe & Peter Macintyre Foreword by Michael Stowe\" is a comprehensive guide to programming in PHP, a popular scripting language used to create dynamic web pages. The fourth edition covers PHP version 7.4 and provides a clear and concise introduction to the language, its syntax, and its core features. It also covers more advanced topics, such as object-oriented programming, database integration, and web application development. With its practical examples and exercises, this book is an ideal resource for both beginners and experienced programmers who want to learn PHP.'),
(31, 'php3.jpg', 'The Joy of PHP', 2, 2, 0, '254789', 'The Joy of PHP.pdf', '\"The Joy of PHP: A Beginner\'s Guide to Programming Interactive Web Applications with PHP and MySQL\" by Alan Forbes is your gateway to the world of PHP programming. It guides you through creating dynamic web applications using PHP and MySQL. You\'ll learn essential PHP concepts, database interactions, and how to build interactive features for your websites. The book includes practical examples and exercises to reinforce your learning. With its clear explanations and step-by-step approach, \"The Joy of PHP\" makes learning web development an enjoyable experience.'),
(32, 'php4.jpg', 'PHP MySQL: The Missing Manual', 8, 2, 0, '24569', 'PHP MySQL The Missing Manual.pdf', '\"PHP & MySQL: The Missing Manual\" by Brett McLaughlin is a comprehensive guide to PHP and MySQL, two essential tools for building dynamic websites. It covers everything from the basics to advanced topics, making it suitable for both beginners and experienced developers. The book\'s clear explanations and practical examples make it easy to learn and apply the concepts. It also includes exercises to help you practice and master the material. Whether you\'re a web developer or just starting out, \"PHP & MySQL: The Missing Manual\" is an invaluable resource for anyone looking to build interactive web applications.'),
(33, 'cybersecurity.jpg', 'The Secret to Cybersecurity', 7, 3, 0, '23658', 'The Secret to Cybersecurity.pdf', '\"The Secret to Cybersecurity: A Simple Plan to Protect Your Family and Business from Cybercrime\" by Scott E. Augenbaum is a practical guide designed to help individuals and businesses safeguard against cyber threats. Written by a retired FBI Special Agent from the Cyber Division, the book offers straightforward advice and actionable steps to enhance online security. Augenbaum draws on his extensive experience to explain common cyber risks and how to prevent them. The book covers essential topics like protecting personal information, recognizing phishing attacks, and securing networks, making cybersecurity accessible and manageable for everyone.'),
(34, 'cybersecurity2.jpg', 'The Art of Invisibility', 9, 3, 0, '21569', 'The Art of Invisibility.pdf', '\"The Art of Invisibility: The World\'s Most Famous Hacker Teaches You How to Be Safe in the Age of Big Brother and Big Data\" by Kevin Mitnick and Robert Vamosi is a comprehensive guide on maintaining privacy in the digital age. Mitnick, drawing on his expertise as a former hacker, provides practical advice on how to protect personal information from government surveillance, data mining, and cybercriminals. The book covers techniques for anonymous browsing, secure communication, and safeguarding digital footprints. It aims to empower readers to take control of their online privacy and security in an era of pervasive digital monitoring.'),
(35, 'cybersecurity3.jpg', 'The Art of Exploitation', 10, 3, 0, '21569', 'Hacking The Art of Exploitation.pdf', '\"Hacking: The Art of Exploitation, 2nd Edition\" by Jon Erickson provides a comprehensive guide to the world of hacking and cybersecurity. It covers fundamental topics such as programming, shellcode, exploitation, and countermeasures. The book includes practical examples and exercises, offering hands-on experience with hacking techniques and tools. Erickson emphasizes understanding how systems work to identify and exploit vulnerabilities, making it a valuable resource for both beginners and experienced security professionals seeking to deepen their knowledge and skills in ethical hacking and penetration testing.'),
(36, 'cyber security.jpg', 'Ghost in the Wires', 9, 3, 0, '21456', 'Ghost In The Wires.pdf', '\"Ghost in the Wires: My Adventures as the World\'s Most Wanted Hacker\" by Kevin Mitnick and William L. Simon is an autobiographical account of Mitnick\'s exploits as a notorious hacker. The book details his journey from a curious teenager to a fugitive on the FBI\'s most wanted list. Mitnick recounts his hacking adventures, the techniques he used to infiltrate computer systems, and the cat-and-mouse game with authorities. The narrative also explores his eventual capture, trial, and transformation into a security consultant. With a foreword by Steve Wozniak, the book provides an insider\'s view of the hacker subculture and cybersecurity.'),
(37, 'PL2.jpg', 'C++ Concurrency In Action', 32, 2, 0, '12495', 'C++ Concurrency in Action.pdf', '\"C++ Concurrency in Action\" by Anthony Williams is a comprehensive guide to multithreading and parallel programming in C++. This book dives deep into the complexities of writing concurrent programs, providing practical examples and detailed explanations of C++\'s concurrency features, including the standard library\'s threading facilities. The second edition updates the content to cover more recent standards and practices, making it a crucial resource for developers who need to write efficient, thread-safe code in modern C++. It\'s especially valuable for those working in high-performance computing, real-time systems, or any application where concurrency is a key concern.'),
(38, 'PL1.jpg', 'C++ Crash Course: A Fast-Paced Introduction', 33, 2, 0, '53215', 'C++ Crash Course A Fast Paced Introduction.pdf', '\"C++ Crash Course: A Fast-Paced Introduction\" by Josh Lospinoso is an engaging and concise guide designed to get you up to speed quickly with C++ programming. This book offers a hands-on approach to learning C++, covering the essentials while providing practical examples and exercises to solidify your understanding. It’s ideal for those who need to grasp the core concepts of C++ in a short time, making it a valuable resource for both beginners and experienced programmers looking for a refresher. The book\'s approachable style and focus on real-world applications make it a popular choice for learning C++.'),
(39, 'PL3.jpg', 'C++ Templates: The Complete Guide', 34, 2, 0, '89032', 'C++ Templates The Complete Guide.pdf', '\"C++ Templates: The Complete Guide\" by David Vandevoorde, Nicolai M. Josuttis, and Douglas Gregor (Second Edition) is a definitive resource for understanding and mastering C++ templates. This book covers templates comprehensively, including the latest standards such as C++11, C++14, and C++17. It delves into the intricacies of template programming, from basic concepts to advanced techniques, making it an essential guide for both beginners and experienced C++ developers who want to deepen their understanding of templates and their practical applications in modern C++ programming.'),
(40, 'networking4.jpg', 'Computer Networkers', 11, 1, 3, '24512', 'Computer Networks.pdf', '\"Computer Networks by Andrew S. Tanenbaum and David J. Wetherall\" delves into the intricacies of computer networking. It offers a foundational understanding of network infrastructure, hardware, and protocols. Tanenbaum and Wetherall effectively explain complex concepts in an accessible manner, making it suitable for both beginners and advanced learners. The book covers a wide range of topics, from network architectures and data communication to network security and applications. With its clear explanations, practical examples, and updated content, this book is an invaluable resource for anyone seeking to grasp the fundamentals of computer networks.'),
(41, 'EM.jpg', 'Advanced Engineering Mathematics', 29, 1, 3, '520389', 'Advanced Engineering Mathematics.pdf', 'Erwin Kreyszig\'s \"Advanced Engineering Mathematics\" is a comprehensive resource for engineering students and professionals. The book covers a wide range of topics essential for the field, including differential equations, linear algebra, vector calculus, Fourier analysis, complex analysis, and numerical methods. Known for its clear explanations and practical applications, the text integrates theory with practice, offering numerous examples and exercises. This tenth edition maintains the book\'s reputation for rigor and accessibility, making it an invaluable reference for mastering the mathematical foundations necessary for advanced engineering work.'),
(42, 'PL4.jpg', 'Java Programming', 35, 2, 0, '45790', 'Java Programming.pdf', '\"Java Programming\" by Joyce Farrell (Ninth Edition) is a comprehensive textbook that covers the fundamental concepts of Java programming. This edition is well-suited for beginners and intermediate learners who are looking to understand both the basics and more advanced features of Java. It includes a wide range of examples and exercises, making it an excellent resource for students and educators alike. The book emphasizes clear explanations and practical coding techniques, helping readers build a solid foundation in Java programming while developing problem-solving skills through hands-on practice.'),
(43, 'PL6.jpg', 'HTML and CSS Learn The Fundamentals In 7 days', 37, 2, 0, '97245', 'HTML and CSS Learn The Fundamentals In 7 days.pdf', '\"HTML & CSS: Learn the Fundamentals in 7 Days\" by Michael Knapp is a beginner-friendly guide designed to teach the basics of web development quickly. The book covers the essential concepts of HTML and CSS, providing a structured, step-by-step approach to building and styling web pages. With a focus on hands-on learning, it promises to equip readers with the fundamental skills needed to create simple and effective websites within a week. Ideal for newcomers to web development, this book offers a practical and accessible introduction to two of the most important technologies in web design.'),
(44, 'PL5.jpg', 'Java Challenges 100+ Proven Tasks that Will Prepare You for Anything', 36, 2, 0, '830244', 'Java Challenges 100+ Proven Tasks that Will Prepare You for Anything.pdf', '\"Java Challenges: 100+ Proven Tasks that Will Prepare You for Anything\" by Michael Inden is a practical guide aimed at sharpening your Java programming skills through hands-on challenges. The book offers over 100 tasks designed to test and improve your problem-solving abilities in Java, covering a range of topics from basic syntax to advanced concepts. Each challenge is accompanied by detailed explanations and solutions, helping readers understand the underlying principles and techniques. This book is ideal for intermediate to advanced Java developers looking to deepen their knowledge and prepare for real-world programming scenarios.'),
(45, 'PL7.jpg', 'JAVASCRIPT HTML CSS A Step By Step Guide', 38, 2, 0, '802475', 'JAVASCRIPT HTML CSS A Step By Step Guide.pdf', '\"JavaScript HTML CSS: A Step-by-Step Guide\" is a practical guide aimed at teaching the basics of web development through hands-on learning. The book provides a clear introduction to HTML, CSS, and JavaScript, the three essential technologies used to create and style web pages. It offers step-by-step instructions, making it easy for beginners to follow along and build their own websites. Each section of the book builds on the previous one, gradually introducing more complex concepts and techniques. This guide is perfect for anyone new to web development, providing a solid foundation in these core web technologies.'),
(46, 'PL8.jpg', 'Web Programming with HTML5, CSS, and JavaScript', 39, 2, 0, '93585', 'Web Programming with HTML5, CSS, and JavaScript.pdf', '\"Web Programming with HTML5, CSS, and JavaScript\" by John Dean is a comprehensive resource for learning modern web development. The book covers essential technologies, including HTML5, CSS, and JavaScript, which are the core building blocks of web development. It provides step-by-step instructions on how to create responsive and interactive web pages, offering practical examples and exercises to reinforce learning. The text is ideal for beginners and intermediate developers who want to build a strong foundation in web programming, making it a valuable guide for anyone looking to enter or advance in the field of web development.'),
(47, 'PL9.jpg', 'The Complete Cyber Security Course, Volume 1', 40, 2, 0, '792049', 'The Complete Cyber Security Course, Volume 1.pdf', '\"The Complete Cyber Security Course: Volume 1\" by Nathan House is an essential guide for anyone interested in cybersecurity. This book focuses on foundational concepts, providing readers with the skills and knowledge needed to protect themselves and their information online. Topics covered include securing devices, network security, privacy protection, encryption, and more. The book is designed for beginners and those looking to build a solid understanding of cybersecurity practices, making it a practical resource for anyone looking to safeguard their digital life.'),
(48, 'PL10.jpg', 'Java A Beginner’s Guide', 41, 2, 0, '648560', 'Java A Beginner’s Guide.pdf', '\"Java: A Beginner\'s Guide, Eighth Edition\" by Herbert Schildt is a comprehensive introduction to Java programming. Tailored for beginners, this book covers the fundamentals of Java, including syntax, keywords, and basic programming concepts. It walks readers through the process of creating, compiling, and running Java programs, providing hands-on exercises and examples for practical learning. The guide also introduces object-oriented programming, exception handling, and the Java API. This edition includes updates for the latest version of Java, making it a valuable resource for anyone looking to learn Java from the ground up.'),
(49, 'SRE5.jpg', 'Software Engineering Theory and Practice', 61, 1, 2, '214525', 'Software Engineering Theory and Practice.pdf', '\"Software Engineering: Theory and Practice\" by Shari Lawrence Pfleeger and Joanne M. Atlee (Fourth Edition) offers a comprehensive overview of software engineering principles, practices, and methodologies. It covers key topics such as requirements analysis, design, coding, testing, maintenance, project management, and software quality. The book emphasizes both theoretical foundations and practical applications, making it suitable for students and professionals. It also includes case studies, examples, and exercises to reinforce learning. The authors aim to provide readers with the knowledge and tools needed to effectively develop and manage software projects.'),
(50, 'EM1.jpg', 'Engineering Circuit Analysis', 48, 1, 2, '453663', 'Engineering Circuit Analysis.pdf', '\"Engineering Circuit Analysis\" (8th Edition) by William H. Hayt, Jr., Jack E. Kemmerly, and Steven M. Durbin is a foundational textbook for electrical engineering students. It covers essential topics such as circuit laws, network theorems, and the analysis of resistive and reactive circuits. The book also delves into advanced subjects like transient analysis, AC circuits, and frequency response. With clear explanations, practical examples, and numerous problem sets, it helps students develop a solid understanding of circuit analysis principles and techniques. This edition includes updated content to reflect current industry practices and technological advancements.'),
(51, 'OS1.jpg', 'Operating Systems Design and Implementation', 13, 1, 2, '3466362', 'Operating Systems. Design and Implementation.pdf', '\"Operating Systems: Design and Implementation\" by Andrew S. Tanenbaum and Albert S. Woodhull is a foundational text in computer science, particularly known for its coverage of the MINIX operating system. The third edition provides a deep dive into the principles and architecture of modern operating systems, offering both theoretical knowledge and practical implementation details. It explores topics such as process management, memory management, file systems, and security, using MINIX as a case study. The book is highly regarded for its clear explanations and hands-on approach, making it an essential resource for students and professionals interested in operating system design.'),
(52, 'DB1.jpg', 'Database Management System ', 45, 1, 2, '943752', 'Database Management System 3th Edition.pdf', '\"Database Management Systems\" (3rd Edition) by Raghu Ramakrishnan and Johannes Gehrke is a comprehensive textbook that covers the fundamental concepts and practical aspects of database systems. It introduces the entity-relationship model, relational algebra, and SQL programming, and delves into database design, indexing, query processing, and optimization. The book also explores advanced topics such as transactions, distributed databases, and data mining. With updated material on database applications, including Internet applications, and a hands-on approach, it is an essential resource for students and professionals aiming to deepen their understanding of database management systems.'),
(53, 'Discrete.jpg', 'Discrete Mathematics and Its Applications', 47, 1, 2, '436626', 'Discrete Mathematics and Its Applications.pdf', '\"Discrete Mathematics and Its Applications\" by Kenneth H. Rosen is a comprehensive textbook that covers a wide range of topics in discrete mathematics. The book is designed to be accessible to students from various disciplines, including mathematics, computer science, and engineering. Key topics include logic, set theory, combinatorics, graph theory, and algorithms. The text emphasizes practical applications and problem-solving techniques, making it a valuable resource for both theoretical understanding and practical implementation. The eighth edition includes updated content and new exercises to reflect current trends and advancements in the field.'),
(54, 'HCI1.jpg', 'Interaction Design Beyond Human-Computer Interaction ', 51, 1, 2, '64929', 'Interaction Design Beyond Human-Computer Interaction 4th Edition.pdf', '\"Interaction Design: Beyond Human-Computer Interaction\" (4th Edition) by Preece, Rogers, and Sharp is a comprehensive guide to the principles and practices of designing interactive systems. The fourth edition delves into the latest trends and technologies in the field, emphasizing user-centered design and usability. It covers a wide range of topics, including user experience, interaction paradigms, and the design process. The book is rich with real-world examples, case studies, and practical exercises, making it an invaluable resource for students and professionals aiming to create effective and engaging interactive products.'),
(55, 'DB3.jpg', 'SQL Queries for Mere Mortals', 58, 1, 2, '462842', 'SQL Queries for Mere Mortals 2nd Edition.pdf', '\"SQL Queries for Mere Mortals\" by John L. Viescas and Michael J. Hernandez is a comprehensive guide designed for those looking to master SQL (Structured Query Language) without needing extensive technical expertise. The book\'s second edition provides a hands-on approach to data manipulation in SQL, emphasizing a software-independent methodology. It covers various SQL-based systems like Access, MS SQL Server, Oracle, MySQL, DB2, and Ingres. With practical examples and clear explanations, the book helps readers understand how to craft effective SQL queries, making it ideal for beginners or those seeking to enhance their database querying skills.'),
(56, 'IS.jpg', 'Fundamentals of Information Systems', 46, 1, 2, '252663', 'Fundamentals of Information Systems.pdf', '\"Fundamentals of Information Systems\" by Ralph Stair and George Reynolds is a foundational textbook that introduces the key concepts and practices of information systems in business and management. This book covers essential topics such as data management, information technology infrastructure, business intelligence, and the role of information systems in decision-making and strategic planning. It emphasizes the importance of information systems in achieving competitive advantage and improving business processes. The text integrates real-world examples, case studies, and hands-on projects to help readers understand how information systems are used in various organizational contexts, making it ideal for students and professionals.'),
(57, 'Java4.jpg', 'Learning Java', 55, 1, 2, '467485', 'Learning Java, 4th Edition.pdf', '\"Learning Java\" is a comprehensive tutorial designed to guide readers through the Java programming language. This 4th edition, updated for Java 7, is authored by Patrick Niemeyer and Daniel Leuck. It is a hands-on book that covers fundamental Java concepts, object-oriented programming, and key APIs, making it suitable for both beginners and experienced programmers. The book is well-organized, with clear explanations and practical examples to reinforce learning. Its approachable style and focus on real-world application help readers build a solid foundation in Java, preparing them to write robust, maintainable Java code.'),
(58, 'networking9.jpg', 'CCNAv7: Introduction to Networks (ITN)', 57, 1, 2, '356353', 'CCNAv7 Introduction to Networks Companion Guide (ITN).pdf', '\"CCNAv7: Introduction to Networks (ITN) Companion Guide\" is a foundational resource for students and professionals preparing for the Cisco Certified Network Associate (CCNA) certification. This guide covers essential networking concepts, including network fundamentals, LAN switching, routing, and IP addressing. It provides practical insights and hands-on exercises to help readers understand and apply networking principles. The book is structured to align with the CCNA curriculum, making it an invaluable tool for mastering the skills needed to design, implement, and manage modern network infrastructures. The companion guide also includes review questions and practice labs to reinforce learning.'),
(59, 'DB2.jpg', 'Modern Database Management', 60, 1, 2, '739220', 'Modern Database Management.pdf', '\"Modern Database Management\" by Jeffrey A. Hoffer, V. Ramesh, and Heikki Topi (Eleventh Edition) provides an in-depth understanding of database management systems (DBMS). It covers the fundamental concepts of database design, modeling, implementation, and management. The book also addresses emerging trends in database technology, including data warehousing, data mining, and Big Data. With a focus on practical applications, it includes case studies, examples, and exercises that help readers develop skills in database design and management. This book is ideal for students and professionals seeking to enhance their knowledge in database systems.'),
(60, 'HCI2.jpg', 'Interaction Design - Beyond Human-Computer Interaction', 51, 1, 2, '547484', 'Interaction Design - Beyond Human-Computer Interaction.pdf', '\"Interaction Design: Beyond Human-Computer Interaction\" by Preece, Rogers, and Sharp explores the principles and practices of designing interactive systems that enhance user experience. The book delves into the theoretical foundations of interaction design, practical methods for creating user-friendly interfaces, and the latest trends in the field. It emphasizes the importance of understanding user needs, iterative design processes, and usability testing. With a blend of academic insights and real-world examples, this book serves as a comprehensive guide for students, researchers, and professionals aiming to create effective and engaging digital interactions.'),
(61, 'SRE6.jpg', 'Practical Object-Oriented Design with UML', 59, 1, 2, '784322', 'Practical Object-Oriented Design with UML.pdf', '\"Practical Object-Oriented Design with UML\" by Mark Priestley (Second Edition) provides a hands-on approach to object-oriented design using the Unified Modeling Language (UML). It covers the principles of object-oriented design, including abstraction, encapsulation, inheritance, and polymorphism, and how these concepts are applied in software development. The book emphasizes the practical aspects of creating UML diagrams, such as class diagrams, sequence diagrams, and use case diagrams, to model software systems effectively. It is aimed at students and professionals looking to gain a solid understanding of UML and its application in real-world software design projects.'),
(62, 'networking1.jpg', 'IP Addressing and Subnetting Workbook Version 1.5', 54, 1, 2, '35729', 'IP Addressing and Subnetting Workbook Version 1.5.pdf', 'The \"IP Addressing and Subnetting Workbook\" (Instructor\'s Edition, Version 1.5) is a practical guide designed to help learners master the concepts of IP addressing and subnetting. This workbook is tailored for instructors, offering exercises and examples to teach these critical networking fundamentals. The material is structured to build understanding progressively, starting with basic IP address concepts and advancing to more complex subnetting techniques. Through hands-on practice, readers can gain the skills necessary to efficiently design and manage IP networks, making this workbook an essential resource for both students and instructors in the field of networking.'),
(63, 'Java1.jpg', 'Data Structures and Algorithms in Java ', 43, 1, 2, '76542', 'Data Structures and Algorithms in Java 2nd Edition.pdf', '\"Data Structures & Algorithms in Java\" by Robert Lafore is a comprehensive guide to understanding and implementing data structures and algorithms using Java. The second edition covers fundamental concepts such as arrays, linked lists, stacks, queues, trees, and graphs. It also delves into sorting and searching algorithms, recursion, and hashing. The book is designed to be accessible to beginners, with clear explanations, practical examples, and numerous illustrations. It emphasizes hands-on learning, providing exercises and projects to reinforce the material. This makes it an invaluable resource for students and professionals looking to enhance their programming skills and knowledge in Java.'),
(64, 'IELTS.jpg', 'Complete IELTS bands (6.5 , 7.5)', 42, 1, 2, '098762', 'Complete IELTS bands (6.5 , 7.5).pdf', '\"Cambridge English IELTS 6.5-7.5 with Answers\" by Guy Brook-Hart and Vanessa Jakeman is a comprehensive resource designed for students aiming to achieve higher IELTS scores. The book includes eight topic-based units that cover all four IELTS exam sections: reading, writing, listening, and speaking. Each unit provides stimulating activities, detailed grammar and vocabulary explanations, and practice exercises. The accompanying CD-ROM offers additional skills practice, including listening exercises and a complete IELTS practice test. This book is ideal for those seeking to improve their English proficiency and perform well in the IELTS exam.'),
(65, 'Java2.jpg', 'Introduction to the Design and Analysis of Algorithms', 52, 1, 2, '472492', 'Introduction to the Design and Analysis of Algorithms.pdf', '\"Introduction to the Design and Analysis of Algorithms\" by Anany Levitin (2nd Edition) is an essential textbook for students and professionals seeking a deep understanding of algorithms. The book provides a balanced approach to algorithm design, covering both fundamental concepts and advanced techniques. It explores a wide range of algorithmic strategies, including brute force, divide-and-conquer, dynamic programming, and greedy algorithms. Levitin\'s text is known for its clarity and practical examples, making complex ideas accessible. The book also includes exercises and problems that encourage critical thinking and application of concepts, making it an invaluable resource for studying algorithmic principles.');
INSERT INTO `books` (`bookid`, `bookpic`, `bookname`, `authorid`, `categoryid`, `yearid`, `ISBN`, `file`, `summary`) VALUES
(66, 'C++.jpg', 'Object-Oriented Programming in C++', 43, 1, 1, '495876', 'Object-Oriented Programming in C++.pdf', '\"Object-Oriented Programming in C++\" by Robert Lafore is a comprehensive guide to mastering object-oriented programming (OOP) using C++. The fourth edition delves into fundamental OOP concepts such as classes, objects, inheritance, polymorphism, and encapsulation. Lafore’s clear explanations and practical examples make complex topics accessible, catering to both beginners and experienced programmers. The book also covers advanced features like templates, exception handling, and the Standard Template Library (STL). With numerous exercises and real-world applications, it serves as an invaluable resource for anyone looking to enhance their C++ programming skills.'),
(67, 'Physics.jpg', 'College Physics', 62, 1, 1, '456781', 'College Physics.pdf', '\"College Physics, Ninth Edition\" by Serway and Vuille is a comprehensive textbook designed for college students. It covers fundamental physics concepts such as mechanics, thermodynamics, electromagnetism, and waves. The book integrates real-world applications to illustrate theoretical principles, making complex topics more accessible. This edition includes updated content reflecting recent scientific advancements and pedagogical improvements to enhance learning. With its clear explanations, detailed examples, and numerous practice problems, it aims to build a strong foundation in physics for undergraduates, preparing them for advanced studies and practical applications in various scientific fields.'),
(68, 'Calculus.jpg', 'Thomas’ Calculus: Early Transcendentals', 63, 1, 1, '98765', 'Thomas\' Calculus.pdf', '\"Thomas’ Calculus: Early Transcendentals,\" is a comprehensive textbook that covers fundamental concepts in calculus, including limits, derivatives, integrals, and infinite series. It is designed for students beginning their journey in calculus, providing clear explanations, numerous examples, and a variety of exercises to reinforce learning. The book emphasizes the application of calculus in real-world scenarios, helping students understand the relevance of mathematical concepts. With its structured approach and detailed illustrations, it serves as an essential resource for mastering the principles of calculus and preparing for advanced studies in mathematics and related fields.'),
(69, 'Fundamentals.jpg', 'Digital Fundamentals', 64, 1, 1, '78492', 'Digital Fundamentals.pdf', '\"Digital Fundamentals, Eleventh Edition\" by Thomas L. Floyd is a comprehensive textbook that provides a solid foundation in digital technology. It covers essential topics such as digital circuits, systems, logic, and introductory computer concepts. The book is known for its clear explanations, abundant illustrations, and practical examples, making complex concepts accessible to students. This edition includes updated content to reflect the latest advancements in the field. With numerous exercises and applications, it is an invaluable resource for students studying digital electronics and related subjects.'),
(70, 'Web.jpg', 'Web Development & Design Foundations with HTML5', 65, 1, 1, '738901', 'Web Development & Design Foundations with HTML5.pdf', '\"Web Development & Design Foundations with HTML5\" by Terry Felke-Morris is a comprehensive guide for learning web development and design. The ninth edition focuses on HTML5 and covers essential topics such as web design principles, CSS, JavaScript, and responsive design. It provides practical examples, exercises, and projects to help readers build their skills. This book is suitable for beginners and those looking to update their knowledge with the latest web technologies. It emphasizes hands-on learning and real-world applications, making it an invaluable resource for aspiring web developers and designers.'),
(71, 'Java5.jpg', 'Beginning JavaScript (4th Edition)', 66, 1, 1, '890284', 'Beginning JavaScript (4th Edition).pdf', '\"Beginning JavaScript, 4th Edition\" by Paul Wilton and Jeremy McPeak is a comprehensive guide for beginners to learn JavaScript, the essential language for creating dynamic and interactive web pages. This edition introduces the latest advancements in JavaScript, including Ajax for remote scripting, JavaScript frameworks, and JavaScript and XML. The book is structured to streamline the learning process with updated examples and code compliant with modern web browsers. It covers fundamental topics such as data types, variables, decision-making, loops, functions, and error handling, making it an invaluable resource for aspiring web developers.'),
(72, 'C++1.jpg', 'Object-Oriented Programming Using C++', 67, 1, 1, '765432', 'Object-Oriented Programming in C++(Joyce Farrell).pdf', '\"Object-Oriented Programming Using C++\" by Joyce Farrell is an educational resource designed to teach the principles of object-oriented programming (OOP) using the C++ language. The fourth edition covers essential OOP concepts such as classes, objects, inheritance, polymorphism, and encapsulation. Farrell’s approach includes clear explanations, practical examples, and exercises to reinforce learning. The book is suitable for both beginners and those looking to deepen their understanding of C++ and OOP. It also explores advanced topics like templates and exception handling, making it a comprehensive guide for mastering C++ programming.'),
(73, 'C++2.jpg', 'Programming: Principles and Practice Using C++\r\n', 68, 1, 1, '23456', 'The Creator of C++ Programming.pdf', '\"Programming: Principles and Practice Using C++\" by Bjarne Stroustrup is an essential guide for learning programming through the C++ language. Written by the creator of C++, this book covers fundamental programming concepts, including procedural, object-oriented, and generic programming. It emphasizes writing efficient, maintainable, and type-safe code. The book is designed for beginners but also offers valuable insights for experienced programmers. It includes practical examples, exercises, and covers both high-level techniques and low-level hardware interactions. This comprehensive resource aims to build a solid foundation in programming principles and C++ language features.'),
(74, 'IELTS1.jpg', 'Complete IELTS Band (5-6.5)', 42, 1, 1, '67893', 'Complete IELTS Band (5-6.5).pdf', '\"Cambridge English Complete IELTS Bands 5-6.5\" by Guy Brook-Hart and Vanessa Jakeman is a comprehensive guide designed to help students prepare for the IELTS exam. This book covers all four language skills: listening, reading, writing, and speaking. It includes practice tests, detailed answer keys, and tips for improving performance in each section. The accompanying CD-ROM provides additional interactive exercises and practice materials. With its structured approach and practical advice, this book aims to build the necessary skills and confidence for students aiming to achieve a band score between 5 and 6.5 on the IELTS exam.'),
(75, 'cybersecurity4.jpg', 'Cyber Security Intelligence and Analytics', 69, 3, 0, '65432', 'Cyber Security Intelligence and Analytics.pdf', '\"Cyber Security Intelligence and Analytics\" is an academic resource that delves into the latest advancements in cybersecurity. Edited by Zhigang Chen, Kim-Kwang Raymond Choo, Ali Dehghantanha, Reza M. Parizi, and Mohammad Hammoudeh, the book is part of the “Advances in Intelligent Systems and Computing” series. It covers a range of topics including cyber threat intelligence, data analytics, and security measures. The book aims to provide insights into the integration of intelligent systems and computing techniques to enhance cybersecurity. It is a valuable resource for researchers, professionals, and students in the field of cybersecurity.'),
(76, 'cybersecurity5.jpg', 'Cyber Security on Azure', 70, 3, 0, '65432', 'Cyber Security on Azure.pdf', '\"Cyber Security on Azure: An IT Professional’s Guide to Microsoft Azure Security – Second Edition\" by Marshall Copeland and Matthew Jacobs is a comprehensive guide for IT professionals. It focuses on implementing and managing cybersecurity measures within the Microsoft Azure cloud platform. The book covers essential topics such as identity management, network security, data protection, and compliance. It provides practical insights and strategies to safeguard digital assets in the cloud, making it an invaluable resource for those looking to enhance their understanding of Azure security and ensure robust protection against cyber threats.'),
(77, 'cybersecurity6.jpg', 'Cyber Security Incident Management Guide', 71, 3, 0, '987654', 'Cyber Security Incident Management Guide.pdf', '\"Cyber Security Incident Management Guide,\" published by the Centre for Cyber Security Belgium and the Cyber Security Coalition, is a comprehensive resource designed to help organizations effectively manage and respond to cyber security incidents. The guide covers essential topics such as incident detection, response strategies, communication protocols, and recovery processes. It provides practical advice and best practices to enhance an organization’s resilience against cyber threats. This guide is invaluable for IT professionals, security teams, and organizational leaders aiming to strengthen their incident management capabilities and ensure robust protection against cyber-attacks.'),
(78, 'cybersecurity7.jpg', 'Auditing Information and Cyber Security Governance', 72, 3, 0, '752849', 'Auditing Information and Cyber Security Governance.pdf', '\"Auditing Cybersecurity and Information Governance: A COBIT-Based Approach\" by Robert E. Davis is a comprehensive guide for internal and IT auditors. The book explores the integration of cybersecurity and information governance within the framework of COBIT (Control Objectives for Information and Related Technologies). It covers essential topics such as control environments, management practices, and compliance with laws and regulations. The book provides practical insights and methodologies for conducting effective audits, ensuring robust cybersecurity measures, and maintaining information governance. It is an invaluable resource for professionals seeking to enhance their auditing skills and knowledge in the field of cybersecurity.'),
(79, 'networking11.jpg', 'Data Communications and Networking', 73, 4, 0, '7654332', 'Data Communications and Networking.pdf', '\"Data Communications and Networking\" by Behrouz A. Forouzan is a comprehensive guide to the principles and practices of data communication and networking. The fourth edition covers a wide range of topics, including network models, data and signals, digital transmission, error detection and correction, and network security. The book is designed to be accessible to beginners while also providing in-depth information for advanced learners. It uses clear explanations, practical examples, and illustrations to help readers understand complex concepts. This edition also includes updated content to reflect the latest advancements in the field, making it a valuable resource for students and professionals alike.'),
(80, 'networking12.jpg', 'Introduction to Cryptography with Coding Theory', 74, 4, 0, '328357', 'Introduction to Cryptography with Coding Theory.pdf', '\"Introduction to Cryptography with Coding Theory\" by Wade Trappe and Lawrence Washington is a comprehensive guide to the principles and applications of cryptography. The second edition covers fundamental concepts such as encryption, decryption, and cryptographic protocols, along with coding theory. It provides a balanced mix of theoretical foundations and practical applications, making it suitable for both students and professionals. The book includes numerous examples and exercises to help readers understand and apply cryptographic techniques. This edition also addresses recent advancements in the field, ensuring that readers are up to date with the latest developments in cryptography.'),
(81, 'networking13.jpg', 'Network Security Essentials (Applications and Standards)', 75, 4, 0, '572800', 'Network Security Essentials (Applications and Standards).pdf', '\"Network Security Essentials: Applications and Standards\" by William Stallings is a comprehensive guide to the principles and practices of network security. The sixth edition covers essential topics such as cryptography, network security protocols, and secure network applications. It provides a balanced mix of theoretical foundations and practical applications, making it suitable for both students and professionals. The book includes numerous examples, case studies, and exercises to help readers understand and apply security techniques. This edition also addresses recent advancements in the field, ensuring that readers are up to date with the latest developments in network security.'),
(82, 'networking14.jpg', 'Introduction to Network Security (Theory and Practice)', 76, 4, 0, '373948', 'Introduction to Network Security (Theory and Practice).pdf', '\"Introduction to Network Security: Theory and Practice\" by Jie Wang and Zachary Kissel is a comprehensive guide to the principles and applications of network security. The book covers fundamental topics such as cryptographic techniques, network protocols, and security policies. It provides a balanced mix of theoretical foundations and practical applications, making it suitable for both students and professionals. The authors use clear explanations, real-world examples, and exercises to help readers understand and apply network security concepts. This edition also addresses recent advancements in the field, ensuring that readers are up to date with the latest developments in network security.'),
(83, 'five1.jpg', 'The Cambridge Handbook of Multimedia Learning', 77, 1, 5, '76354', 'The Cambridge Handbook of Multimedia Learning.pdf', '\"The Cambridge Handbook of Multimedia Learning\" edited by Richard E. Mayer, is a comprehensive guide that delves into how people learn from words and pictures together. This second edition compiles research from experts in psychology, instructional design, education, and human-computer interaction. It covers principles for reducing extraneous processing, managing essential processing, and fostering generative processing through strategies like personalization and voice guidance. The handbook aims to provide insights into designing more effective multimedia learning environments, making it an essential resource for educators and instructional designers.'),
(84, 'five2.jpg', 'Speech and Language Processing', 78, 1, 5, '678392', 'Speech and Language Processing.pdf', '\"Speech and Language Processing\" by Daniel Jurafsky and James H. Martin is a comprehensive guide to the field of natural language processing (NLP). The book covers both statistical and symbolic approaches to language processing and demonstrates their application in tasks such as speech recognition, spelling and grammar correction, information extraction, search engines, machine translation, and spoken-language dialog agents. It is an essential resource for understanding the interdisciplinary nature of NLP, combining insights from linguistics, computer science, and cognitive science.'),
(85, 'five3.jpg', 'Data Science for Business', 79, 1, 5, '678592', 'Data Science for Business.pdf', '\"Data Science for Business: What You Need to Know About Data Mining and Data-Analytic Thinking\" by Foster Provost and Tom Fawcett is a crucial guide for understanding data science in a business context. It introduces key concepts such as data mining and analytic thinking, aiming to equip readers with the skills needed to make data-driven decisions. The book covers practical applications and methodologies, making it an essential resource for professionals looking to leverage big data for strategic advantage. It emphasizes the importance of data-analytic thinking in solving real-world business problems and driving innovation.'),
(86, 'five4.jpg', 'Data Science', 80, 1, 5, '2348566', 'Data Science.pdf', '\"Data Science\" by John D. Kelleher and Brendan Tierney, part of The MIT Press Essential Knowledge series, provides a concise yet comprehensive introduction to the field of data science. The book covers fundamental concepts, methodologies, and tools used in data science, emphasizing practical applications and real-world examples. It explores topics such as data collection, cleaning, analysis, and visualization, as well as machine learning and predictive modeling. Designed for both beginners and professionals, this book aims to equip readers with the knowledge and skills needed to harness the power of data in various domains.'),
(87, 'five6.jpg', 'Multimedia Making It Work', 81, 1, 5, '654242', 'Multimedia Making It Work.pdf', '\"Multimedia: Making It Work\" by Tay Vaughan is a comprehensive guide to multimedia development. The eighth edition covers the latest tools and techniques for creating multimedia content, including text, images, audio, video, and animation. It provides practical insights into the design and implementation of multimedia projects, making it an essential resource for students and professionals alike. The book includes a CD-ROM with additional resources and examples to enhance learning. Published by McGraw Hill, it is well-regarded for its clear explanations and hands-on approach to multimedia production.'),
(88, 'five5.jpg', 'Interactive Multimedia', 82, 1, 5, '276554', 'Interactive Multimedia.pdf', '\"Interactive Multimedia\" edited by Ioannis Deliyannis, explores the dynamic field of multimedia technology and its applications. This book delves into various aspects of interactive multimedia, including digital media, user interaction, and multimedia systems. It provides insights into the latest research and developments, making it a valuable resource for students, researchers, and professionals in the field. Published by IntechOpen, the book features contributions from experts worldwide, offering a comprehensive overview of the current trends and future directions in interactive multimedia. The content is enriched with practical examples and case studies, enhancing its relevance and applicability.'),
(89, 'KE1.jpg', 'Data Mining Concepts and Techniques', 83, 1, 4, '872244', 'Data Mining Concepts and Techniques.pdf', '\"Data Mining: Concepts and Techniques\" (Third Edition) by Jiawei Han, Micheline Kamber, and Jian Pei is a leading textbook in the field of data mining and knowledge discovery. The book provides a comprehensive overview of the core concepts, techniques, and algorithms used in data mining, including data preprocessing, classification, clustering, association analysis, and anomaly detection. It emphasizes practical applications and includes numerous examples, case studies, and exercises to reinforce learning. The third edition introduces new content on data analytics, including updates on big data, stream data mining, and advanced machine learning techniques, making it an essential resource for students, researchers, and professionals in data science and analytics.'),
(90, 'KE2.jpg', 'Introduction to AI Robotics', 84, 1, 4, '392589', 'Introduction to AI Robotics.pdf', '\"Introduction to AI Robotics\" by Robin R. Murphy is a comprehensive guide that explores the fundamental concepts and techniques of artificial intelligence (AI) in robotics. This book covers various topics, including the architecture of robots, perception, localization, navigation, planning, and machine learning as applied to robotics. It is particularly notable for its focus on real-world applications and the integration of AI techniques in practical robotics scenarios, such as search and rescue, industrial automation, and service robots. The text is designed to be accessible to students and professionals alike, providing a balanced mix of theoretical foundations and hands-on applications.'),
(91, 'KE3.jpg', 'Fundamentals of Robotic Mechanical Systems', 85, 1, 4, '87635', 'Fundamentals of Robotic Mechanical Systems.pdf', '\"Fundamentals of Robotic Mechanical Systems: Theory, Methods, and Algorithms\" by Jorge Angeles is a key text that delves into the theoretical foundations, methods, and algorithms underlying robotic mechanical systems. This book covers various critical topics, including kinematics, dynamics, control, and the design of robotic mechanisms. It emphasizes the mathematical and algorithmic principles necessary for the development and analysis of robotic systems. The second edition of this book provides an updated perspective, incorporating the latest advancements in robotics. It is suitable for both students and professionals seeking a comprehensive understanding of the mechanical aspects of robotics.'),
(92, 'KE4.jpg', 'Learning Robotics Using Python', 86, 1, 4, '87632', 'Learning Robotics Using Python.pdf', '\"Learning Robotics using Python\" by Lentin Joseph is a practical guide for developing robotics applications using the Python programming language. The second edition of this book covers the design, simulation, programming, and prototyping of autonomous mobile robots. It introduces key robotics concepts, including the Robot Operating System (ROS), computer vision with OpenCV, 3D perception with Point Cloud Library (PCL), and robotic simulations. The book is designed for beginners and those with intermediate programming skills who are interested in exploring robotics through Python. It provides hands-on tutorials and examples, making complex topics accessible and easy to follow.'),
(93, 'KE5.jpg', 'Computer Vision A Modern Approach ', 87, 1, 4, '698937', 'Computer Vision A Modern Approach 2nd Edition.pdf', '\"Computer Vision: A Modern Approach\" by David A. Forsyth and Jean Ponce is a comprehensive textbook that delves into the theories, algorithms, and practical applications of computer vision. In its second edition, the book offers an in-depth exploration of how computers can be made to interpret and understand visual data from the world. It covers a wide range of topics, including image formation, feature detection, segmentation, motion analysis, and object recognition. With a strong emphasis on both mathematical foundations and real-world applications, this text is suitable for advanced students, researchers, and professionals looking to deepen their understanding of computer vision technology.'),
(94, 'KE6.jpg', 'Cassandra The Definitive Guide', 88, 1, 4, '545224', 'Cassandra The Definitive Guide.pdf', '\"Cassandra: The Definitive Guide\" by Eben Hewitt is a comprehensive resource on Apache Cassandra, a highly scalable and distributed NoSQL database designed to handle large amounts of data across many commodity servers. The book covers the fundamentals of Cassandra, including its architecture, installation, and configuration. It also delves into advanced topics such as data modeling, performance tuning, and best practices for deploying Cassandra in production environments. With practical examples and detailed explanations, this guide is essential for developers, database administrators, and IT professionals looking to master Cassandra for building and managing large-scale distributed systems.'),
(95, 'KE7.jpg', 'Cassandra: Cassandra Query Language', 89, 1, 4, '765322', 'Cassandra Tutorial.pdf', '\"Cassandra: Cassandra Query Language\" from Tutorials point’s “Simply Easy Learning” series is a comprehensive guide to mastering Cassandra Query Language (CQL). The book covers fundamental concepts and advanced techniques for managing and querying Cassandra databases. It provides clear explanations and practical examples to help readers efficiently model, store, and retrieve data using Cassandra, a scalable and high-performance NoSQL database. The book aims to equip database professionals with the skills needed to handle big data solutions effectively, reflecting the clarity and insight suggested by the eye-catching cover design.'),
(96, 'KE8.jpg', 'Data Mining Practical Machine Learning Tools and Techniques ', 90, 1, 4, '567489', 'Data Mining Practical Machine Learning Tools and Techniques.pdf', '\"Data Mining: Practical Machine Learning Tools and Techniques\" by Ian H. Witten and Eibe Frank is a comprehensive guide to the field of data mining and machine learning. The second edition of this book covers various methods and algorithms used in data mining, emphasizing practical applications. It includes topics such as classification, regression, clustering, association rules, and attribute selection, with a strong focus on the use of machine learning tools and techniques. This edition is particularly known for its practical approach, providing readers with insights into the implementation and application of data mining methods using accessible software tools, making it an excellent resource for both students and practitioners in the field.'),
(97, 'KE9.jpg', 'Python Essential Reference', 91, 1, 4, '746524', 'Python Essential Reference.pdf', '\"Python Essential Reference\" by David M. Beazley is a comprehensive guide and reference for Python programming. The book is known for its thorough coverage of the Python language, including detailed explanations of Python\'s syntax, built-in functions, and libraries. It serves as both a tutorial for those new to Python and a reference for experienced developers who need to quickly look up information on the language. The fourth edition covers Python 2.7 and 3.x, making it a versatile resource for anyone working with Python. This book is particularly valued in the Python community for its clear explanations and practical approach to Python programming.'),
(98, 'KE10.jpg', 'Python Data Science Handbook', 92, 1, 4, '765432', 'Python Data Science Handbook.pdf', '\"Python Data Science Handbook\" by Jake VanderPlas is a comprehensive guide for data scientists, data analysts, and anyone interested in working with data using Python. The book covers essential tools and techniques for data science, including data manipulation, data visualization, machine learning, and more. It dives into popular Python libraries such as NumPy, Pandas, Matplotlib, Scikit-Learn, and Jupyter, offering practical examples and insights to help readers effectively analyze and visualize data. This handbook is widely recognized for its clear explanations, practical approach, and extensive coverage of the tools that are critical for modern data science. Whether you\'re a beginner or an experienced data scientist, this book is a valuable resource for mastering data science with Python.'),
(99, 'KE11.jpg', 'Big Data Big Analytics', 93, 1, 4, '512135', 'Big Data Big Analytics.pdf', '\"Big Data Big Analytics\" by Michael Minelli, Michele Chambers, and Ambiga Dhiraj explores the transformative power of big data and analytics in modern business. The book delves into emerging trends in business intelligence, demonstrating how companies can leverage vast amounts of data to gain strategic advantages. It covers practical applications across various industries, highlighting how analytics can drive better decision-making, enhance operations, and boost profitability. This guide is essential for businesses aiming to navigate the complexities of big data technologies and implement effective analytic strategies in today’s competitive landscape.'),
(100, 'TS1.jpg', 'Ethics In Information Technology', 94, 1, 3, '784011', 'Ethics In Information Technology.pdf', '\"Ethics in Information Technology\" by George W. Reynolds explores the complex ethical issues that arise in the field of information technology. The book covers a wide range of topics, including privacy, cybersecurity, intellectual property, and the impact of IT on society. It delves into professional codes of ethics, cyberattacks, electronic surveillance, and the ethical responsibilities of IT professionals and corporations. Through real-world examples, critical-thinking exercises, and case studies, the book prepares readers to navigate and resolve ethical dilemmas in today’s technology-driven world.'),
(101, 'TS2.jpg', 'Computer Networks A Systems Approach', 95, 1, 3, '754829', 'Computer Networks A Systems Approach.pdf', '\"Computer Networks: A Systems Approach\" by Larry L. Peterson and Bruce S. Davie offers a comprehensive exploration of computer networking principles and protocols. The sixth edition delves into both theoretical and practical aspects, covering foundational concepts and advanced topics. It serves as an essential resource for students and professionals, explaining how different network layers function and interact within complex systems. Updated content reflects current trends and technologies, ensuring readers are equipped with the knowledge required to navigate the rapidly evolving landscape of networked systems.'),
(102, 'TS3.jpg', 'Official Cert Guide Cisco Certified Design Expert', 57, 1, 3, '674829', 'Cisco Certified Design Expert.pdf', '\"Official Cert Guide Cisco Certified Design Expert CCDE 400-007\" by Zig Zsiga is a comprehensive resource for those preparing for the Cisco Certified Design Expert (CCDE) certification exam. The book covers essential topics in network design, including advanced routing, network security, and data center design. It provides practical insights and hands-on learning experiences to help readers master the complexities of network architecture. With detailed explanations, real-world examples, and practice questions, this guide aims to equip IT professionals with the knowledge and skills needed to excel in the CCDE 400-007 exam and advance their careers in network design.'),
(103, 'TS4.jpg', 'CCNAv7 Enterprise Networking, Security, and Automation', 57, 1, 3, '674201', 'CCNAv7 Enterprise Networking, Security, and Automation.pdf', '\"CCNAv7: Enterprise Networking, Security, and Automation Companion Guide\" is part of the Cisco Networking Academy series. This guide provides comprehensive coverage of advanced networking concepts, security practices, and automation techniques within enterprise environments. It is designed to support learners in mastering the skills needed for the CCNA certification. The book includes practical exercises, real-world examples, and detailed explanations to help readers understand and implement networking solutions effectively. With a focus on modern networking technologies and security measures, this guide is an essential resource for anyone pursuing a career in enterprise networking and IT security.'),
(104, 'TS5.jpg', 'Management', 96, 1, 3, '930205', 'Management.pdf', '\"Management\" Eleventh Edition by Stephen P. Robbins and Mary Coulter, is a comprehensive guide to the principles and practices of management. The book covers essential topics such as planning, organizing, leading, and controlling within an organization. It integrates contemporary management theories with real-world applications, providing readers with practical insights and tools to effectively manage teams and projects. The authors emphasize the importance of ethical decision-making, diversity, and innovation in today’s dynamic business environment. This edition includes updated case studies and examples to reflect current trends and challenges in the field of management.'),
(105, 'TS6.jpg', 'Fundamentals of Engineering Economics', 97, 1, 3, '6584329', 'Fundamentals of Engineering Economics.pdf', '\"Fundamentals of Engineering Economics\" by Chan S. Park provides a thorough introduction to the economic principles and techniques essential for engineering practice. The book covers topics such as cost analysis, financial management, and decision-making processes in engineering projects. It emphasizes the importance of understanding economic factors to make informed and effective engineering decisions. With practical examples and case studies, the book helps readers apply economic concepts to real-world engineering problems, making it a valuable resource for both students and professionals in the field.'),
(106, 'TS7.jpg', 'Introduction to Linear Algebra', 98, 1, 3, '53482', 'Introduction to Linear Algebra.pdf', '\"Introduction to Linear Algebra, Fifth Edition\" by Gilbert Strang is a foundational text that explores the core concepts of linear algebra. The book covers topics such as vector spaces, linear transformations, and matrices, with a focus on both theoretical understanding and practical applications. It includes numerous examples and exercises to help readers grasp complex ideas and apply them to real-world problems. This edition also emphasizes the importance of linear algebra in various fields, including engineering, computer science, and economics, making it a valuable resource for students and professionals alike.'),
(107, 'TS8.jpg', 'Entrepreneurship', 99, 1, 3, '54321', 'Entrepreneurship.pdf', '\"Entrepreneurship\" 2nd Edition by William Bygrave and Andrew Zacharakis is a comprehensive guide that combines theoretical concepts with practical case studies to help aspiring entrepreneurs understand the process of starting and growing a business. The book covers essential topics such as opportunity recognition, business planning, financing, marketing, and team building. It emphasizes the importance of innovation, strategic thinking, and resilience in the entrepreneurial journey. Through real-world examples, the authors illustrate how successful entrepreneurs navigate challenges and seize opportunities, making this book a valuable resource for anyone interested in launching and sustaining a new venture.'),
(108, 'TS9.jpg', 'Guide To Assembly Language A Concise Introduction', 100, 1, 3, '765432', 'Guide To Assembly Language A Concise Introduction.pdf', '\"Guide to Assembly Language: A Concise Introduction\" by James T. Streib is a comprehensive resource designed for beginners in assembly language programming. The book provides a clear and concise introduction to the fundamental concepts of assembly language, emphasizing practical applications and hands-on learning. It covers essential topics such as data representation, instruction sets, and basic programming techniques, making it an ideal starting point for students and professionals looking to understand low-level computer operations. Published by Springer as part of their Undergraduate Topics in Computer Science series, this book is a valuable addition to any computer science curriculum.'),
(109, 'TS10.jpg', 'Modern Computer Architecture and Organization', 101, 1, 3, '23456', 'Modern Computer Architecture and Organization.pdf', '\"Modern Computer Architecture and Organization\" by Jim Ledin provides an in-depth exploration of contemporary computer architectures, including x86, ARM, and RISC-V. The book delves into the design and functionality of modern computing devices such as smartphones, personal computers, and cloud servers. It aims to equip readers with a comprehensive understanding of how these architectures work and interact with software, making it an essential resource for anyone interested in the field of computer science and engineering. Through practical examples and detailed explanations, the book offers valuable insights into the complexities of modern hardware design.'),
(110, 'TS11.jpg', 'Strategic Entrepreneurship', 102, 1, 3, '24567', 'Strategic Entrepreneurship.pdf', '\"Strategic Entrepreneurship\" by Philip A. Wickham is a comprehensive guide that explores the intersection of strategic management and entrepreneurship. The fourth edition delves into the processes and strategies that entrepreneurs use to identify opportunities, innovate, and create value in dynamic markets. It covers key concepts such as opportunity recognition, resource acquisition, and strategic planning, providing practical insights and frameworks for aspiring entrepreneurs and business leaders. The book emphasizes the importance of strategic thinking and decision-making in navigating the challenges and risks associated with entrepreneurial ventures. Through real-world examples and case studies, it offers valuable lessons for successfully launching and growing new businesses.'),
(111, 'Four1.jpg', 'Enterprise Systems For Management', 103, 1, 4, '673840', 'Enterprise Systems For Management.pdf', '\"Enterprise Systems for Management\" by Luvai F. Motiwalla and Jeff Thompson provides a comprehensive overview of enterprise systems and their role in modern organizations. The book covers the implementation, management, and benefits of enterprise systems such as ERP (Enterprise Resource Planning) and SCM (Supply Chain Management). It discusses how these systems integrate various business processes, improve operational efficiency, and support decision-making. The authors also explore the challenges and best practices in deploying enterprise systems, making this book essential for students and professionals seeking to understand the strategic impact of these technologies on business management.'),
(112, 'Four2.jpg', 'Distributed Database Management Systems', 104, 1, 4, '654321', 'Distributed Database Management Systems.pdf', '\"Distributed Database Management Systems: A Practical Approach\" by Saeed K. Rahimi and Frank S. Haug offers a comprehensive guide to the principles, design, and implementation of distributed database systems. The book covers key concepts such as distributed database architecture, data distribution strategies, query processing, transaction management, and system performance optimization. It emphasizes practical approaches, providing detailed case studies and examples to illustrate the complexities and solutions involved in managing distributed databases. This book is an essential resource for students, database professionals, and IT practitioners seeking to understand and work with distributed database systems in a real-world context.'),
(113, 'Four3.jpg', 'Professional XML Databases', 105, 1, 4, '876532', 'Professional XML Databases.pdf', '\"Professional XML Databases\" by Kevin Williams is a guide for developers and database administrators seeking to integrate XML with databases. The book covers the essentials of XML, its syntax, and how it can be used for data interchange. It delves into the use of XML for storing and retrieving data in databases, highlighting practical techniques and strategies. The book also explores XML database management systems (DBMS), query languages like XQuery, and how to efficiently manage XML data. This resource is ideal for those looking to harness the power of XML in database environments.'),
(114, 'Four4.jpg', 'OCA Oracle Database 11g SQL Fundamentals I', 106, 1, 4, '52345', 'OCA Oracle Database 11g SQL Fundamentals I.pdf', '\"OCA Oracle Database 11g: SQL Fundamentals I: A Real-World Certification Guide\" by Steve Ries is designed for those preparing for the 1Z0-051 SQL Fundamentals I exam. This book serves as a comprehensive guide to mastering SQL concepts and techniques essential for a successful career as a Database Administrator (DBA). It provides real-world examples and practical exercises to reinforce learning, focusing on the fundamental skills required to work with Oracle databases. The book covers key topics such as data retrieval, manipulation, and database design principles, making it a valuable resource for both beginners and those seeking certification.'),
(115, 'Four5.jpg', 'Software Testing and Quality Assurance Theory and Practice', 107, 1, 4, '345677', 'Software Testing and Quality Assurance Theory and Practice.pdf', '\"Software Testing and Quality Assurance: Theory and Practice\" by Kshirasagar Naik and Priyadarshi Tripathy is a comprehensive guide that covers both theoretical and practical aspects of software testing and quality assurance. The book delves into various testing methodologies, tools, and techniques, providing a strong foundation in software quality concepts, including functionality, robustness, performance, reliability, and scalability. It also explores advanced topics such as interoperability, regression, stress testing, and load testing. Aimed at students, professionals, and practitioners in the field, this book serves as a valuable resource for understanding and implementing effective software testing strategies to ensure high-quality software products.'),
(116, 'Four6.jpg', 'Software Quality Assurance From Theory to Implementation', 108, 1, 5, '6542123', 'Software Quality Assurance From Theory to Implementation.pdf', '\"Software Quality Assurance: From Theory to Implementation\" by Daniel Galin is a detailed guide that bridges the gap between theory and practical implementation of software quality assurance (SQA). This book covers a broad spectrum of SQA topics, including software testing, quality models like CMM, ISO/IEC 15504 (SPICE), and standards such as IEEE/EIA 12207 and ISO 9000-3. It provides insights into the processes and methodologies that ensure software meets the highest quality standards. Designed for students, professionals, and practitioners, this book emphasizes the importance of SQA in the software development lifecycle, offering practical tools and techniques for effective quality management.'),
(117, 'Four7.jpg', 'Technical Writing for Success', 109, 1, 5, '5431345', 'Technical Writing for Success.pdf', '\"Technical Writing for Success\" 3rd Edition by Smith-Worthington & Jefferson, is a comprehensive guide designed to enhance technical communication skills. The book integrates traditional writing techniques with modern digital tools, making it relevant for today’s tech-savvy professionals. It covers various aspects of technical writing, including clarity, conciseness, and audience awareness. The text also delves into document design, collaborative writing, and the use of visuals to support written content. Practical exercises and real-world examples are included to help readers apply the concepts effectively. This edition aims to equip readers with the skills needed for successful technical communication in diverse professional settings.'),
(118, 'Four8.jpg', 'Game Theory and Strategy', 110, 1, 5, '99876', 'Game Theory and Strategy.pdf', '\"Game Theory and Strategy\" by Philip D. Straffin introduces readers to the fundamental concepts of game theory and its practical applications in strategic decision-making. The book covers key topics such as zero-sum games, Nash equilibrium, and cooperative games, using accessible language and illustrative examples. Straffin explores various real-world scenarios, from politics to economics, where game theory can be applied to understand competitive interactions. This book aims to enhance readers’ strategic thinking skills by providing a solid foundation in game theory principles and demonstrating their relevance in everyday decision-making processes.'),
(119, 'Four9.jpg', 'Computer Vision A Modern Approach', 111, 1, 5, '78980', 'Computer Vision A Modern Approach.pdf', '\"Computer Vision: A Modern Approach\" by Forsyth and Ponce is a comprehensive guide to the field of computer vision. It covers fundamental concepts and advanced techniques, providing a thorough understanding of how computers interpret visual information. The book discusses methods for acquiring, processing, analyzing, and understanding digital images, with applications in various domains such as robotics, medical imaging, and multimedia. By blending historical context with contemporary developments, this text serves as an essential resource for students, researchers, and professionals aiming to deepen their knowledge in computer vision technology.'),
(120, 'Four10.jpg', 'Software Engineering', 112, 1, 5, '67809', 'Software Engineering.pdf', '\"Software Engineering\" Tenth Edition by Ian Sommerville, is a comprehensive guide to the principles and practices of software engineering. This edition covers the latest methodologies, tools, and techniques used in the field, emphasizing the importance of software development processes and project management. The book addresses key topics such as requirements engineering, system modeling, software architecture, and agile methods. It also explores emerging trends like cloud computing and security engineering. Designed for both students and professionals, this text provides a solid foundation for understanding and applying software engineering principles to real-world projects.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(111) NOT NULL,
  `categoryname` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`) VALUES
(1, 'UIT'),
(2, 'Programming Languages'),
(3, 'Cybersecurity'),
(4, 'Networking'),
(5, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `downloadid` int(100) NOT NULL,
  `bookid` int(100) NOT NULL,
  `studentid` int(100) NOT NULL,
  `down_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`downloadid`, `bookid`, `studentid`, `down_date`) VALUES
(44, 29, 3, '2024-07-27'),
(45, 40, 3, '2024-08-11'),
(46, 5, 3, '2024-08-31'),
(47, 6, 23, '2024-08-31'),
(49, 71, 23, '2024-09-01'),
(50, 114, 23, '2024-09-03'),
(51, 114, 23, '2024-09-03'),
(52, 114, 23, '2024-09-03'),
(53, 115, 23, '2024-09-03'),
(54, 116, 23, '2024-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(20) NOT NULL,
  `studentid` int(20) NOT NULL,
  `bookid` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `studentid`, `bookid`, `created_at`) VALUES
(5, 3, 5, '2024-08-13 16:12:10'),
(12, 3, 4, '2024-08-13 16:25:46'),
(17, 3, 1, '2024-08-13 16:44:40'),
(18, 3, 11, '2024-08-13 16:44:45'),
(19, 3, 33, '2024-08-13 16:45:45'),
(20, 3, 35, '2024-08-13 16:45:50'),
(21, 3, 32, '2024-08-13 16:46:07'),
(23, 23, 2, '2024-08-31 15:13:50'),
(24, 23, 3, '2024-08-31 15:13:54'),
(25, 23, 4, '2024-08-31 15:13:58'),
(26, 23, 6, '2024-08-31 15:28:34'),
(35, 23, 41, '2024-09-01 15:24:25'),
(36, 23, 1, '2024-09-01 15:53:05'),
(37, 24, 1, '2024-09-03 19:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `studentid` int(100) NOT NULL,
  `rating` int(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`studentid`, `rating`, `comment`, `date`) VALUES
(1, 5, 'I just love it', '2021-04-23'),
(3, 4, 'I just like it', '2021-04-23'),
(4, 3, 'It is awesome. Overall good', '2021-04-23'),
(1, 2, 'I dont like it', '2021-04-23'),
(23, 2, 'Hi', '2024-09-01'),
(23, 1, 'hill', '2024-09-01'),
(23, 3, 'Hello', '2024-09-01'),
(23, 4, 'hohfw', '2024-09-01'),
(23, 2, 'hi', '2024-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(20) NOT NULL,
  `bookid` int(20) NOT NULL,
  `studentid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`id`, `bookid`, `studentid`) VALUES
(22, 71, 23),
(23, 20, 23);

-- --------------------------------------------------------

--
-- Table structure for table `requested_books`
--

CREATE TABLE `requested_books` (
  `id` int(20) NOT NULL,
  `studentid` int(100) NOT NULL,
  `book_name` varchar(300) NOT NULL,
  `author_name` varchar(300) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requested_books`
--

INSERT INTO `requested_books` (`id`, `studentid`, `book_name`, `author_name`, `isbn`, `request_date`) VALUES
(1, 0, 'Gone with the wind', 'Margret Mitchell', '34567', '2024-08-12 09:39:03'),
(3, 0, 'Little Women ', 'Louisa May Alcott', '215666', '2024-08-14 19:47:01'),
(6, 0, 'The Great Gatsby', 'F. Scott Fitzgerald', '78900', '2024-08-15 07:20:27'),
(9, 0, 'To Kill a Mockingbird', 'Harper Lee', '99999', '2024-08-31 14:58:06'),
(10, 3, 'To Kill a Mockingbird', 'Harper Lee', '97348', '2024-08-31 00:00:00'),
(11, 23, 'To Kill a Mockingbird', 'Harper Lee', '97348', '2024-08-31 00:00:00'),
(12, 23, 'Great Expections', 'Charles Dickens', '45677', '2024-09-01 00:00:00'),
(13, 23, 'The Great Gatsby', 'Louisa May Alcott', '64323', '2024-09-01 00:00:00'),
(14, 23, 'Little Women ', 'Louisa May Alcott', '97348', '2024-09-01 00:00:00'),
(15, 25, 'Gone with the wind', 'Margret Mitchell', '64323', '2024-09-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(111) NOT NULL,
  `student_username` varchar(111) NOT NULL,
  `FullName` varchar(111) NOT NULL,
  `Email` varchar(111) NOT NULL,
  `Password` varchar(111) NOT NULL,
  `PhoneNumber` varchar(111) NOT NULL,
  `studentpic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `student_username`, `FullName`, `Email`, `Password`, `PhoneNumber`, `studentpic`) VALUES
(25, 'Sai ', 'Sai Kyaw', 'sai@uit.edu.mm', '$2y$10$17zHfoCc4Bo1OTmOht5AReUf5urKxbBImvHDxigYGvN5O43MrhqW6', '09759592519', 'IMG_20240723_013226.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '$2y$12$i4LMfeFPQpGSNPTaccIkKuwxAkJ4PhBr3JND7FpXwWFjRvchQn17C', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2018-10-24 18:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `trendingbook`
--

CREATE TABLE `trendingbook` (
  `bookid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trendingbook`
--

INSERT INTO `trendingbook` (`bookid`) VALUES
(3),
(11),
(14),
(19),
(25);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yearid` int(100) NOT NULL,
  `yearName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yearid`, `yearName`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year'),
(5, 'Fifth Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`downloadid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_books`
--
ALTER TABLE `requested_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yearid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `downloadid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requested_books`
--
ALTER TABLE `requested_books`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
