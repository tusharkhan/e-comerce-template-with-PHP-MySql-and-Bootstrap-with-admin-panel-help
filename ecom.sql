-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 08:05 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecom_admin`
--

CREATE TABLE `ecom_admin` (
  `id` int(11) NOT NULL,
  `adminfastname` varchar(20) NOT NULL,
  `adminlastname` varchar(20) NOT NULL,
  `adminemail` varchar(200) NOT NULL,
  `level` varchar(100) NOT NULL,
  `adminpass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_admin`
--

INSERT INTO `ecom_admin` (`id`, `adminfastname`, `adminlastname`, `adminemail`, `level`, `adminpass`) VALUES
(1, 'Tushar', 'Khan', 'tushar@gmail.com', 'uploads/c5494226b1.jpg', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_admin_message`
--

CREATE TABLE `ecom_admin_message` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_admin_message`
--

INSERT INTO `ecom_admin_message` (`id`, `email`, `subject`, `message`, `date`) VALUES
(1, 'tushar.khan0122@gmail.com', 'Test Sunject', 'Message', '2017-09-21'),
(2, 'tushar.khan0122@gmail.com', 'Test Subject', 'Message', '2017-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_brand`
--

CREATE TABLE `ecom_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_brand`
--

INSERT INTO `ecom_brand` (`id`, `brand`) VALUES
(1, 'Sony'),
(2, 'Dell'),
(3, 'Sumsung'),
(4, 'Asus'),
(5, 'Apple'),
(6, 'Walton');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_cart`
--

CREATE TABLE `ecom_cart` (
  `cartid` int(11) NOT NULL,
  `sid` varchar(250) NOT NULL,
  `proid` int(11) NOT NULL,
  `proname` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ecom_category`
--

CREATE TABLE `ecom_category` (
  `id` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_category`
--

INSERT INTO `ecom_category` (`id`, `catname`) VALUES
(1, 'Mobile'),
(2, 'Audio'),
(3, 'Tv'),
(4, 'Wearables'),
(5, 'Electronic'),
(6, 'Household'),
(7, 'Kitchen'),
(8, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_customer`
--

CREATE TABLE `ecom_customer` (
  `userid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_customer`
--

INSERT INTO `ecom_customer` (`userid`, `name`, `email`, `image`, `pass`, `date`, `zip`, `country`, `city`, `phone`) VALUES
(1, 'Tushar Khan', 'tushar.khan0122@gmail.com', 'uploads/22b842dc92.jpg', '827ccb0eea8a706c4c34a16891f84e7b', '2017-09-17', '1230', 'Bangladesh', 'Dhaka', '+8801962837564'),
(2, 'Tushar Khan', 'tushar.khan0122@gmail.com', 'uploads/22b842dc92.jpg', 'b59c67bf196a4758191e42f76670ceba', '2017-09-17', '1230', 'Bangladesh', 'Dhaka', '+8801962837564');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_customer_message`
--

CREATE TABLE `ecom_customer_message` (
  `messageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `messagedate` date DEFAULT NULL,
  `useremail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_customer_message`
--

INSERT INTO `ecom_customer_message` (`messageid`, `userid`, `subject`, `message`, `messagedate`, `useremail`) VALUES
(1, 1, 'Message Subject', 'Mesage Body', '2017-09-21', 'tushar.khan0122@gmail.com'),
(2, 2, 'Another Message Subject', 'Another Mesage Body', '2017-09-21', 'tushar.khan0122@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_customer_order`
--

CREATE TABLE `ecom_customer_order` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_customer_order`
--

INSERT INTO `ecom_customer_order` (`id`, `customerid`, `productid`, `price`, `quantity`, `productname`, `date`, `status`) VALUES
(6, 1, 6, 245, 1, 'Mobile Phone 3', '2017-09-21 20:25:23', 0),
(7, 1, 14, 680, 1, 'LED Tv', '2017-09-21 20:25:23', 1),
(8, 1, 7, 850, 1, 'Laptop', '2017-09-21 20:28:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecom_product`
--

CREATE TABLE `ecom_product` (
  `proid` int(11) NOT NULL,
  `proname` varchar(20) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `type` varchar(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_product`
--

INSERT INTO `ecom_product` (`proid`, `proname`, `catid`, `brandid`, `body`, `price`, `image`, `type`, `date`) VALUES
(1, 'Speakers', 2, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 320, 'uploads/1cbd8190ab.jpg', 'Black', '2017-09-12'),
(2, 'Headphones', 2, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 150, 'uploads/8c1bbc01ca.jpg', 'Sliver', '2017-09-12'),
(3, 'Audio Player', 2, 3, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 180, 'uploads/1911fee744.jpg', 'Blue', '2017-09-12'),
(4, 'Mobile Phone1', 1, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 350, 'uploads/25bdaf15a9.jpg', 'Black', '2017-09-12'),
(5, 'Mobile Phone 2', 1, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 302, 'uploads/5829e9c083.jpg', 'Sliver', '2017-09-12'),
(6, 'Mobile Phone 3', 1, 4, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 245, 'uploads/0b1a0e64e4.jpg', 'Black', '2017-09-12'),
(7, 'Laptop', 8, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 850, 'uploads/3b664d7884.jpg', 'Gold', '2017-09-12'),
(8, 'Noot Book', 8, 5, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 280, 'uploads/34cf10e769.jpg', 'Black', '2017-09-12'),
(9, 'Kid\'s Toy', 8, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 80, 'uploads/6aa72cbffa.jpg', 'Pink', '2017-09-12'),
(10, 'Refrigerator', 7, 6, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 820, 'uploads/a5380c6ae6.jpg', 'Any', '2017-09-12'),
(11, 'Blander', 7, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 340, 'uploads/f51b9cf2df.jpg', 'Black', '2017-09-13'),
(12, 'Washing Machine', 7, 3, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 518, 'uploads/38fb57de5f.jpg', 'Blu', '2017-09-12'),
(13, 'Refrigerator', 6, 6, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 820, 'uploads/7853f89919.jpg', 'Blue', '2017-09-13'),
(14, 'LED Tv', 6, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 680, 'uploads/b15bb1ed5d.jpg', 'Black', '2017-09-13'),
(15, 'Washing Matchine', 6, 3, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 515, 'uploads/696839565c.jpg', 'Black', '2017-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_product_review`
--

CREATE TABLE `ecom_product_review` (
  `revid` int(11) NOT NULL,
  `cmrid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `review` text NOT NULL,
  `rate` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_product_review`
--

INSERT INTO `ecom_product_review` (`revid`, `cmrid`, `proid`, `name`, `email`, `phone`, `review`, `rate`, `date`) VALUES
(1, 1, 10, 'Tushar Khan', 'tushar@gmail.com', '+8801962837564', 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 3, '2017-09-14'),
(2, 1, 4, 'Tushar Khan', 'tushar.khan0122@gmail.com', '+8801962837564', 'Test Rewiew', 3, '2017-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_social_media`
--

CREATE TABLE `ecom_social_media` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecom_social_media`
--

INSERT INTO `ecom_social_media` (`id`, `name`, `link`, `icon`) VALUES
(1, 'Facebook', '#', 'fa-facebook'),
(2, 'Twitter', '#', 'fa-twitter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecom_admin`
--
ALTER TABLE `ecom_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_admin_message`
--
ALTER TABLE `ecom_admin_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_brand`
--
ALTER TABLE `ecom_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_cart`
--
ALTER TABLE `ecom_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `ecom_category`
--
ALTER TABLE `ecom_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_customer`
--
ALTER TABLE `ecom_customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ecom_customer_message`
--
ALTER TABLE `ecom_customer_message`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `ecom_customer_order`
--
ALTER TABLE `ecom_customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecom_product`
--
ALTER TABLE `ecom_product`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `ecom_product_review`
--
ALTER TABLE `ecom_product_review`
  ADD PRIMARY KEY (`revid`);

--
-- Indexes for table `ecom_social_media`
--
ALTER TABLE `ecom_social_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecom_admin`
--
ALTER TABLE `ecom_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ecom_admin_message`
--
ALTER TABLE `ecom_admin_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ecom_brand`
--
ALTER TABLE `ecom_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ecom_cart`
--
ALTER TABLE `ecom_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ecom_category`
--
ALTER TABLE `ecom_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ecom_customer`
--
ALTER TABLE `ecom_customer`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ecom_customer_message`
--
ALTER TABLE `ecom_customer_message`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ecom_customer_order`
--
ALTER TABLE `ecom_customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ecom_product`
--
ALTER TABLE `ecom_product`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ecom_product_review`
--
ALTER TABLE `ecom_product_review`
  MODIFY `revid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ecom_social_media`
--
ALTER TABLE `ecom_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
