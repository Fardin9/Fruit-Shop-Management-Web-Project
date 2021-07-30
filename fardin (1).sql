-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 05:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fardin`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemname` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `itemno` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `imgname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemname`, `category`, `itemno`, `price`, `description`, `imgname`) VALUES
('Apple', ' Fruit ', 'a1', '200', 'With soft skin and softer flesh, the McIntosh strikes a balance between sweet and acidic.', 'a1.jpg'),
('Jackfruit', ' Fruit ', 'j1', '100', 'Jackfruit is a rich source of phenolic compounds including flavonoids.', 'j1.jpg'),
('Lichi', ' Fruit ', 'l1', '3000', 'Import from Foreign Country', 'l1.jpg'),
('Mango', ' Fruit ', 'm1', '1500', 'King of mangoes\", very sweet with fibreless pulp, rich in vitamin A and C, founded mainly in Devgad ', 'm1.jpg'),
('Orange', ' Fruit ', 'o1', '500', 'Source of VITAMIN-C', 'o1.jpg'),
('Apple', 'Fruit', 'ra1', '80', 'sweet', 'ra1.jpg'),
('Watermeelon', 'Fruit', 'w1', '70', 'sweet', 'w1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE `messageout` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` varchar(1024) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messageout`
--

INSERT INTO `messageout` (`id`, `sender`, `receiver`, `msg`, `time`) VALUES
(1, 'Ronaldo2', ' ', 'sss', '2020-11-30 14:46:40'),
(2, 'Ronaldo2', ' ', 'hello friend', '2020-11-30 14:52:21'),
(3, 'Ronaldo2', 'Mou45', 'hello this is correct', '2020-11-30 14:54:45'),
(4, 'Ronaldo2', 'Mou45', 'This is second message', '2020-11-30 15:07:07'),
(5, 'Mou45', 'Ronaldo2', 'Hello Ronaldo, what\'s up?', '2020-11-30 15:21:54'),
(6, 'Ronaldo2', 'Mou45', 'Hello MOU, have the items delivered?', '2020-11-30 15:26:05'),
(7, 'Mou45', 'Fardin09', 'Hello Fardin(Admin). What is the conditon of out shop now?', '2020-12-04 16:02:23'),
(8, 'Mou45', 'khursida12', 'Hello buyer khursida12, I am coming to your house with your product.', '2020-12-27 15:29:15'),
(9, 'Khursida12', 'Esha12', 'Hello admin, I am facing some problems.', '2020-12-27 15:32:14'),
(10, 'Fardin09', 'Esha12', 'Hello Admin Esha12', '2020-12-27 15:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `username` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`username`, `address`) VALUES
('fardin', 'dinajpur'),
('Khursida12', 'Santiniketon');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` int(100) NOT NULL,
  `type` text NOT NULL,
  `gender` text NOT NULL,
  `dateofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `name`, `email`, `password`, `address`, `phone`, `type`, `gender`, `dateofbirth`) VALUES
('Adnan110', ' Adnan Khan ', 'adnan22@gmail.com', '555', 'Kakrail', 1828112233, 'seller', 'Male', '1980-11-20'),
('Akash00', ' Akash Islam ', 'akash@gmail.com', '6767', 'Dhanmondi', 1828112233, 'seller', 'Male', '1998-06-06'),
('Arjina12', ' Arjina Islam ', 'arjina@gmail.com', '777', 'Kakrail', 1828112233, 'deliveryMan', 'Female', '1990-05-05'),
('Asif khan', ' ASIF2 ', 'asif2@gmail.com', '444', 'Munshiganj', 1828112233, 'seller', 'Male', '1990-11-12'),
('Asraful Isam', ' Asraful1 ', 'aa', 'aaa', 'aaa', 123, 'seller', 'Male', '2020-11-08'),
('Esha12', ' Sheikh Esha', ' esha12@gmail.com', '123', ' Mirpur Pallabe', 1828112233, 'admin', 'Female', '1998-05-06'),
('Fardin09', '      Fardin Hoque', '      fardinhoque9@gmail.com', '090', '      Bashundhara R/A,BLOCK-F', 1726314807, 'seller', 'Male', '1999-04-07'),
('Fardin9', '44', '4444', '44', 'Dhaka', 19284653, 'deliveryMan', 'Male', '2020-12-10'),
('Fareen3', ' Fawzia Fareen ', 'fareen3@gmail.com', '666', 'Dinajpur,Paharpur,3/A,House:55', 1828112233, 'buyer', 'Female', '1990-04-06'),
('Hoque', 'Fardin Hoque', 'fardinhoque9@gmail.com', '7070', 'Bashundhara R/A, Block-F,House-255,Dhaka', 1726314807, 'seller', 'Male', '1999-04-07'),
('Khursida12', '   Khurshida Papri ', '  khurshida@gmail.com', '555', '  Santiniketonn', 1828112235, 'buyer', 'Female', '1995-04-04'),
('Leo90', ' Leonel Messi ', 'leo@yahoo.com', '444', 'Barcelona', 1828112233, 'seller', 'Male', '1980-04-04'),
('Mina', 'Mina Akter', 'mina222gmail.com', '999', 'Dhaka, Bangladesh', 1828112233, 'buyer', 'Female', '1980-02-02'),
('Mitu12', 'Mostarin Islam', 'mitu13@gmail.com', '2000', 'Dinajpur', 1828112233, 'seller', 'Female', '1990-04-04'),
('Mou45', 'Mou Tayba Isam', 'mou@gmail.com', '333', 'Banani,Dhaka', 1828112233, 'deliveryMan', 'Female', '1998-04-04'),
('pp', 'Fardin', 'fardin_hqd@yahoo.com', 'ww', 'ww', 0, 'chooseHere', 'Male', '2020-12-11'),
('qq', 'qq', 'fardin_hqd@yahoo.com', '123', 'Bashundhara R/A, Block-F,House-255,Dhaka', 1726314807, 'seller', 'Male', '2020-12-26'),
('Ronaldo2', 'I Cristiano Ronaldo', 'cr77@gmail.com', '444', 'Manchester United', 19284653, 'seller', 'Male', '1985-05-05'),
('Sakib00', ' Sakib Islam ', 'sakib@gmail.com', '0000', 'Bashundhara R/A, Block-F,House-255,Dhaka', 1828112233, 'seller', 'Male', '1999-04-07'),
('Sheikh2', ' Sheikh Karim ', 'karim@gmail.com', '999', 'Soudi Arab', 1828112233, 'buyer', 'Male', '1990-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Fardin', 'Hoque', 'fardinhoque9@gmail.com'),
(2, 'Asif', 'Hoque', 'asif9@gmail.com'),
(3, 'adnan', 'Hoque', 'asif9@gmail.com'),
(4, 'adnan', 'Hoque', 'asif9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`username`, `pass`) VALUES
('Fardin1', '145'),
(' ', ' '),
('asif', '123'),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
('tferg79b', '123'),
(' ', ' '),
(' ', ' '),
(' ', ' '),
('1', ' '),
('1', '99'),
('1', '99'),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
('AA', '22'),
(' ', ' '),
(' ', ' '),
(' ', ' '),
(' ', ' '),
('ss', '5555'),
(' ', ' '),
('ee', '33'),
('momem', '000'),
('Hoque', 'aa'),
('Asif khan', '444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemno`);

--
-- Indexes for table `messageout`
--
ALTER TABLE `messageout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messageout`
--
ALTER TABLE `messageout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
