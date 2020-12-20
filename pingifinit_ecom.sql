-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 05:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pingifinit_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `sec_contact` varchar(11) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `img`, `email`, `contact`, `sec_contact`, `user_type`, `password`) VALUES
(1, 'admin', NULL, 'admin@admin.com', '8838825568', NULL, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `api_setting`
--

CREATE TABLE `api_setting` (
  `id` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `api` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_setting`
--

INSERT INTO `api_setting` (`id`, `url`, `api`) VALUES
(1, 'http://localhost/pingifinit_blog/', 'Api/fetch_data/user');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `location`, `img`, `status`) VALUES
(5, 'top', '1596350646_a.jpg', 1),
(6, 'top', '1596350809_a.jpg', 1),
(7, 'top', '1596351067_a.jpg', 0),
(8, 'top', '1596351183_a.png', 0),
(10, 'top', '1596351602_a.jpg', 1),
(11, 'mid_1', '1596352355_a.jpg', 1),
(12, 'mid_1', '1596352727_a.png', 1),
(13, 'mid_2', '1596353659_a.jpg', 0),
(14, 'mid_2', '1596353679_a.jpg', 1),
(15, 'mid_2', '1596353949_a.jpg', 0),
(16, 'mid_2', '1596354069_a.png', 0),
(17, 'mid_2', '1596354171_a.jpg', 1),
(19, 'bottom', '1596357844_a.jpg', 1),
(20, 'bottom', '1596357961_a.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brands` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `brands`, `img`, `status`) VALUES
(9, 3, 'Apple', '1599669540_a.png', 1),
(10, 3, 'Samsung', '1595680327_a.png', 1),
(11, 3, 'Sony', '1595680346_a.jpg', 1),
(12, 3, 'Dell', '1595680369_a.png', 1),
(13, 3, 'Honor', '1595680389_a.png', 1),
(14, 3, 'HP', '1595680408_a.png', 1),
(15, 3, 'Oppo', '1595680436_a.png', 1),
(16, 3, 'Lenova', '1595680477_a.png', 1),
(17, 4, 'Adidas', '1595682898_a.png', 1),
(18, 4, 'Nike', '1595682923_a.png', 1),
(19, 4, 'Casio', '1595682938_a.jpg', 1),
(20, 4, 'Hugo Boss', '1595682958_a.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `banner1` varchar(100) NOT NULL,
  `banner2` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`, `banner1`, `banner2`) VALUES
(3, 'Electronics & Mobiles', 1, '1599293435_a.jpg', '1599293435_a1.jpg'),
(4, 'Fashion', 1, '1596544720_a.jpg', '1596544720_a1.jpg'),
(5, 'Beauty &Health', 1, '1596545568_a.jpg', '1596545568_a1.jpg'),
(6, 'Home & Kitchen', 1, '1596545941_a.jpg', '1596545941_a1.jpg'),
(7, 'Sports & Outdoors', 1, '1596546207_a.jpg', '1596546303_a1.jpg'),
(8, 'Baby Products', 1, '1596546427_a.jpg', '1596547158_a1.jpg'),
(9, 'Books', 1, '1596547424_a.jpg', '1596547424_a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `no_of_visits` int(11) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `name`, `contact`, `email`, `password`, `status`, `no_of_visits`, `date_created`) VALUES
(1, 'xec3iy', 'nithin', '8838825568', 'nithinmigo1@gmail.com', '6EBVdi', NULL, NULL, '03-08-2020'),
(2, 'ZsNA2z', 'customer', '887889987', 'check@gmail.com', 'd56d985300d4b52eb6e189be006f44f8d23c5ec9', 1, NULL, '03-08-2020'),
(3, 'dyVbgC', 'Hari', '789878988', 'hariharan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 1, NULL, '03-08-2020'),
(4, '2eh6wR', 'check', '890987890', 'varginaslam123@gmail.com', '5SkiqV', NULL, NULL, '04-08-2020'),
(5, 'KrCc1B', 'vargina', '9443740424', 'varginaslam123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '04-08-2020'),
(6, 'm7kzKG', 'asha', '9443740424', 'varginaslam123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '06-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE `email_setting` (
  `id` int(11) NOT NULL,
  `host` varchar(100) DEFAULT NULL,
  `port` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `shop_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `host`, `port`, `username`, `password`, `status`, `shop_id`) VALUES
(1, 'host', 'port', 'username', 'password', 1, '7');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_type`
--

CREATE TABLE `invoice_type` (
  `id` int(11) NOT NULL,
  `invoice_type` varchar(100) DEFAULT NULL,
  `shop_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_type`
--

INSERT INTO `invoice_type` (`id`, `invoice_type`, `shop_id`) VALUES
(1, '2', '7'),
(5, '1', '9');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) DEFAULT NULL,
  `validation` varchar(100) DEFAULT NULL,
  `free_plan` varchar(100) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `seling` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan`, `validation`, `free_plan`, `discount`, `seling`, `price`, `status`) VALUES
(10, 'behalf', '15 - 20 days', '5 - 10 days', 2, 100, 500, 1),
(11, 'Bronze', '15 - 20 days', '5 - 10 days', 1, 100, 500, 1),
(12, 'depavali plan', '1 month', 'free', 5, 1390, 1400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_data`
--

CREATE TABLE `plan_data` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `f_choice` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan_data`
--

INSERT INTO `plan_data` (`id`, `plan_id`, `f_choice`, `type`) VALUES
(6, 10, 'yes', 'good'),
(7, 10, 'no', 'good'),
(8, 11, 'yes', 'good'),
(9, 11, 'no', 'good'),
(10, 12, 'yes', 'product upload'),
(11, 12, 'yes', 'Customer list'),
(12, 12, 'no', 'mailing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `primary_color` varchar(100) DEFAULT NULL,
  `sub_images` varchar(100) DEFAULT NULL,
  `product_by` varchar(100) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `todays_deal` int(11) DEFAULT NULL,
  `express` int(11) DEFAULT NULL,
  `date` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `product`, `img`, `primary_color`, `sub_images`, `product_by`, `added_by`, `price`, `discount`, `final_price`, `tags`, `model`, `quantity`, `description`, `status`, `todays_deal`, `express`, `date`) VALUES
(1, 3, 4, 15, 'oppo', '1599293353_a.jpg', 'black', '1599293353_0_sub.jpg,1599293353_1_sub.jpg,1599293353_2_sub.jpg', 'admin', 1, 14000, 2, 13720, 'mobile,oppo', '', 5, '', 1, 0, 0, '05-09-2020'),
(2, 4, 14, 17, 't shirt', '1599293559_a.jpg', 'white', '1599293559_0_sub.jpg,1599293559_1_sub.jpg,1599293559_2_sub.jpg', 'admin', 1, 430, 0, 430, 't shirts,mens wear', '', 12, '', 1, 0, 0, '05-09-2020'),
(3, 3, 4, 15, 'oppo', '1599404831_a.jpg', 'black', '1599404832_0_sub.jpg', 'admin', 1, 12000, 5, 11400, 'mobile,oppo', '', 6, '', 1, 0, 0, '06-09-2020'),
(4, 3, 6, 9, 'Apple lap', '1599664079_a.jpg', 'gold', '1599664080_0_sub.jpg,1599664080_1_sub.jpg,1599664080_2_sub.png', 'admin', 1, 58000, 0, 58000, 'apple,lap', '', 5, '', 1, 0, 1, '09-09-2020'),
(6, 4, 16, 18, 'Nike Shoe', '1599664672_a.jpg', 'black', '1599664672_0_sub.jpg,1599664672_1_sub.jpg,1599664672_2_sub.jpg', 'admin', 1, 9000, 2, 8820, 'shoes', '', 8, '', 1, 1, 0, '09-09-2020'),
(9, 4, 16, 18, 'Nike Shoe', '1599666268_a.jpg', 'black', '1599666268_0_sub.jpg,1599666268_1_sub.jpg', 'admin', 1, 900, 0, 900, 'shoes', '', 8, '', 1, 1, 0, '09-09-2020'),
(8, 4, 14, 18, 't shirt', '1599665060_a.jpg', 'white', '1599665060_0_sub.jpg,1599665060_1_sub.jpg,1599665060_2_sub.jpg', 'admin', 1, 800, 0, 800, 't shirts,mens wear', '', 12, '', 1, 1, 0, '09-09-2020'),
(12, 3, 4, 10, 'Samsung', '1599668725_a.jpg', 'black', '1599668725_0_sub.jpg,1599668725_1_sub.jpg,1599668726_2_sub.jpg', 'admin', 1, 24000, 5, 22800, 'mobile,samsung', '', 12, '', 1, 1, 1, '09-09-2020'),
(11, 5, 17, 17, 'axe', '1599666937_a.jpg', 'green', '1599666937_0_sub.jpg,1599666937_1_sub.jpg,1599666937_2_sub.jpg', 'admin', 1, 180, 0, 180, 'axe', '', 90, '', 1, 0, 0, '09-09-2020'),
(13, 3, 4, 13, 'honor', '1599751668_a.jpg', 'red', '1599751668_0_sub.jpg,1599751669_1_sub.jpg,1599751669_2_sub.jpg', 'admin', 1, 23000, 5, 21850, 'mobile,honor', '', 6, '', 1, 0, 0, '10-09-2020'),
(14, 3, 4, 13, 'honor', '1599751815_a.jpg', 'red', '1599751815_0_sub.jpg,1599751815_1_sub.jpg,1599751815_2_sub.jpg', 'admin', 1, 23000, 5, 21850, 'mobile,honor', '', 6, '', 1, 0, 0, '10-09-2020'),
(15, 3, 4, 13, 'honor', '1599752143_a.jpg', 'red', '1599752143_0_sub.jpg,1599752144_1_sub.jpg,1599752144_2_sub.jpg', 'admin', 1, 23000, 5, 21850, 'mobile,honor', '', 6, '', 1, 0, 0, '10-09-2020'),
(16, 3, 4, 13, 'honor', '1599752239_a.jpg', 'red', '1599752239_0_sub.jpg,1599752239_1_sub.jpg,1599752239_2_sub.jpg', 'admin', 1, 23000, 5, 21850, 'mobile,honor', '', 6, '', 1, 0, 0, '10-09-2020'),
(17, 3, 6, 9, 'apple', '1599752404_a.jpg', 'gold', '1599752404_0_sub.jpg,1599752404_1_sub.jpg,1599752404_2_sub.png', 'admin', 1, 60000, 0, 60000, 'apple,lap', '', 6, '', 1, 0, 0, '10-09-2020'),
(18, 4, 14, 19, 'Shirt', '1599753505_a.jpg', 'blue', '1599753505_0_sub.jpg,1599753505_1_sub.jpg,1599753505_2_sub.jpg,1599753505_3_sub.jpg', 'admin', 1, 2300, 0, 2300, 'shirt,men shirt', '', 34, '', 1, 1, 0, '10-09-2020'),
(19, 4, 16, 18, 'boot', '1599753671_a.jpg', 'blue', '1599753672_0_sub.jpg,1599753672_1_sub.jpg', 'admin', 1, 560, 0, 560, 'shoe', '', 3, '', 1, 0, 0, '10-09-2020'),
(22, 4, 16, 17, 'Nike Shoe', '1599754855_a.jpg', 'blue', '1599754855_0_sub.jpg,1599754855_1_sub.jpg', 'admin', 1, 569, 0, 569, 't shirts,mens wear', '', 5, '', 1, 0, 0, '10-09-2020'),
(21, 3, 5, 9, 'apple', '1599754437_a.jpg', 'gold', '1599754437_0_sub.jpg', 'admin', 1, 67000, 0, 67000, 'apple,tab', '', 4, '', 1, 0, 0, '10-09-2020'),
(23, 4, 16, 17, 'Nike Shoe', '1599754985_a.jpg', 'blue', '1599754985_0_sub.jpg,1599754985_1_sub.jpg', 'admin', 1, 569, 0, 569, 't shirts,mens wear', '', 5, '', 1, 0, 0, '10-09-2020'),
(24, 4, 16, 17, 'shoe', '1599755479_a.jpg', 'white', '1599755479_0_sub.jpg,1599755479_1_sub.jpg,1599755479_2_sub.jpg', 'admin', 1, 800, 0, 800, 'shoe', '', 8, '', 1, 0, 0, '10-09-2020'),
(25, 3, 4, 10, 'smart phone', '1599755973_a.jpg', 'blue', '1599755974_0_sub.jpg,1599755974_1_sub.jpg,1599755974_2_sub.jpg', 'admin', 1, 25000, 0, 25000, 'mobile', '', 7, '', 1, 0, 0, '10-09-2020'),
(26, 3, 4, 10, 'smart phone', '1599756085_a.jpg', 'blue', '1599756085_0_sub.jpg,1599756085_1_sub.jpg,1599756085_2_sub.jpg', 'admin', 1, 25000, 0, 25000, 'mobile', '', 7, '', 1, 0, 0, '10-09-2020'),
(27, 3, 4, 13, 'Honor', '1599803441_a.jpg', 'Red', '1599803441_0_sub.jpg,1599803441_1_sub.jpg,1599803441_2_sub.jpg,1599803441_3_sub.jpg', 'admin', 1, 28000, 0, 28000, 'mobile,honor', '', 43, '', 1, 1, 1, '11-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub`
--

CREATE TABLE `product_sub` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `sub_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub`
--

INSERT INTO `product_sub` (`id`, `product_id`, `color`, `sub_img`) VALUES
(1, 9, 'white', '1599666268_a.'),
(2, 11, 'white', 'ecom21.jpg'),
(3, 12, 'blue', '1599668726_2_sub.jpg'),
(4, 12, 'Navy blue', '1599668726_2_sub.jpg'),
(5, 23, 'black', 'download.jpg'),
(6, 24, 'black', '1599755479_0_sub.jpg'),
(7, 25, 'blue', '1599755974_0_0_sub.,1599755974_1_0_sub.'),
(8, 26, 'Navy blue', '1599756085_0_0_sub.jpg,1599756085_1_0_sub.jpg'),
(9, 27, 'black', '1599803441_0_0_sub.jpg,1599803442_1_0_sub.jpg,1599803442_2_0_sub.jpg'),
(10, 27, 'blue', '1599803442_0_1_sub.jpg,1599803442_1_1_sub.jpg,1599803442_2_1_sub.jpg,1599803442_3_1_sub.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_setting`
--

CREATE TABLE `profile_setting` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `address` text,
  `gstin` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_setting`
--

INSERT INTO `profile_setting` (`id`, `company_name`, `contact`, `address`, `gstin`, `img`) VALUES
(1, 'ping if ecomm', 9999999999, 'chennai', '34jhku87y8hyt67', '1604469173_a.png');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `sec_contact` bigint(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gst_no` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `verify` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `user_id`, `shop_name`, `owner_name`, `contact`, `sec_contact`, `email`, `address`, `user_name`, `password`, `gst_no`, `img`, `verify`, `type`) VALUES
(6, NULL, 'Fruits', 'Anu Ratha', 8888888888, 9890987897, 'anu@gmail.com', 'andhaman', 'anu@gmail.com', '1234', '', '', 1, 'shop'),
(7, NULL, 'Bakery', 'Balaji', 8888888888, 9890987897, 'balaji@gmail.com', 'banglore', 'balaji@gmail.com', '1234', '', '', 1, 'shop'),
(9, NULL, 'meat', 'selvam', 9908890989, 8879987789, 'selvam@gmail.com', 'chennai', 'salvam@gmail.com', '1234', NULL, NULL, 1, 'shop'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `customer_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`id`, `category`, `customer_id`) VALUES
(4, 'green fruits', '6'),
(6, 'red fruits', '6'),
(7, 'seed fruits', '6'),
(9, 'sweets', '7'),
(10, 'cakes', '7'),
(12, 'pups', '7'),
(14, 'citric fruits', '6');

-- --------------------------------------------------------

--
-- Table structure for table `shop_cus`
--

CREATE TABLE `shop_cus` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `sec_contact` bigint(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_cus`
--

INSERT INTO `shop_cus` (`id`, `customer_id`, `name`, `contact`, `sec_contact`, `email`, `address`, `status`) VALUES
(10, '6', 'arul', 9787830039, 9890987897, 'arul@gmail.com', 'abiramam', 1),
(11, '6', 'asha', 7510830039, 9890987897, 'asha@gmail.com', 'apk', 1),
(12, '7', 'bakery1', 8888888888, 9890987897, 'bakery@gmail.com', 'banglore', 1),
(13, '7', 'bavana1', 9443740424, 9890987897, 'bavana@gmail.com', 'bankong', 1),
(14, '7', 'BOOPALAN E', 7510830039, 9890987897, 'boo@gmail.com', 'banglore', 1),
(15, '6', 'raja anu', 8888888888, 9890987897, 'check@gmail.com', 'chennai', 1),
(16, '6', 'murugan anu', 8888888888, 9890987897, 'check@gmail.com', 'chennai', 1),
(17, '6', 'candy any', 7510830039, 9890987897, 'check@gmail.com', 'chennai', 1),
(18, '6', 'lavanya', 8888888888, NULL, 'lavanya@gmail.com', 'chennai', NULL),
(19, '6', 'lavanya', 8888888888, NULL, 'lavanya@gmail.com', 'chennai', NULL),
(20, '9', 'kiran', 8989898989, 9898989898, 'check@gmail.com', 'coimbatore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_emp`
--

CREATE TABLE `shop_emp` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `sec_contact` bigint(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_emp`
--

INSERT INTO `shop_emp` (`id`, `customer_id`, `name`, `contact`, `sec_contact`, `email`, `address`, `status`) VALUES
(1, '7', 'b_emp1', 8888888888, 9890987897, 'bemploye@gmail.com', 'chennai', 0),
(2, '6', 'anu ratha', 7510830039, 9890987897, 'anu@gmail.com', 'chennai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_invoice`
--

CREATE TABLE `shop_invoice` (
  `id` int(11) NOT NULL,
  `shop_id` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `delivary_type` varchar(100) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_invoice`
--

INSERT INTO `shop_invoice` (`id`, `shop_id`, `invoice_no`, `date`, `cus_id`, `grand_total`, `payment_type`, `delivary_type`, `emp_id`) VALUES
(3, '6', 'FRUITS-2020-11-33', '2020-11-09', 10, 500, 'Cash', 'Take Away', 2),
(4, '6', 'FRUITS-2020-11-28', '2020-11-09', 18, 500, 'Cash', 'Take Away', 2),
(5, '6', 'FRUITS-2020-11-03', '2020-11-10', 19, 500, 'Cash', 'Take Away', 2),
(6, '6', 'FRUITS-2020-11-37', '2020-11-10', 15, 500, 'Cash', 'Take Away', 2),
(7, '6', 'FRUITS-2020-11-21', '2020-11-10', 15, 500, 'Cash', 'Take Away', 2),
(8, '7', 'BAKERY-2020-11-23', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(9, '7', 'BAKERY-2020-11-30', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(10, '7', 'BAKERY-2020-11-30', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(11, '7', 'BAKERY-2020-11-30', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(12, '7', 'BAKERY-2020-11-30', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(13, '7', 'BAKERY-2020-11-30', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(14, '7', 'BAKERY-2020-11-24', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(15, '7', 'BAKERY-2020-11-24', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(16, '7', 'BAKERY-2020-11-27', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(17, '7', 'BAKERY-2020-11-25', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(18, '7', 'BAKERY-2020-11-08', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(19, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(20, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(21, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(22, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(23, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(24, '7', 'BAKERY-2020-11-15', '2020-11-12', 13, 800, 'Cash', 'Take Away', 1),
(25, '7', 'BAKERY-2020-11-39', '2020-11-12', 14, 800, 'Cash', 'Take Away', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_invoice_data`
--

CREATE TABLE `shop_invoice_data` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `qua` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_invoice_data`
--

INSERT INTO `shop_invoice_data` (`id`, `customer_id`, `invoice_no`, `product_id`, `rate`, `qua`, `total`) VALUES
(1, '6', 'BO/ 2020-11-09', 1, 8, 1, 8),
(2, '6', 'BO/ 2020-11-09', 1, 8, 1, 8),
(3, '6', 'BO/ 2020-11-46', 1, 8, 1, 8),
(4, '6', 'BO/ 2020-11-46', 1, 8, 1, 8),
(5, '6', 'BO/ 2020-11-46', 1, 8, 1, 8),
(6, '6', 'BO/ 2020-11-09', 1, 8, 1, 8),
(7, '6', 'BO/ 2020-11-24', 1, 8, 1, 8),
(8, '6', 'BO/ 2020-11-12', 1, 8, 1, 8),
(9, '6', 'BO/ 2020-11-12', 1, 8, 1, 8),
(10, '6', 'BO/ 2020-11-12', 1, 8, 1, 8),
(11, '6', 'BO/ 2020-11-33', 1, 800, 1, 800),
(12, '6', 'BO/ 2020-11-33', 1, 800, 1, 800),
(13, '6', 'BO/ 2020-11-20', 1, 800, 1, 800),
(14, '6', 'BO/ 2020-11-20', 1, 800, 1, 800),
(15, '6', 'BO/ 2020-11-27', 1, 800, 1, 800),
(16, '6', 'BO/ 2020-11-37', 1, 800, 1, 800),
(17, '6', 'BO/ 2020-11-06', 1, 800, 1, 800),
(18, '6', 'FRUITS-2020-11-38', 2, 500, 1, 500),
(19, '6', 'FRUITS-2020-11-56', 2, 500, 1, 500),
(20, '6', 'FRUITS-2020-11-11', 2, 500, 1, 500),
(21, '6', 'FRUITS-2020-11-33', 2, 500, 1, 500),
(22, '6', 'FRUITS-2020-11-28', 2, 500, 1, 500),
(23, '6', 'FRUITS-2020-11-03', 2, 500, 1, 500),
(24, '6', 'FRUITS-2020-11-37', 2, 500, 1, 500),
(25, '6', 'FRUITS-2020-11-46', 2, 500, 1, 500),
(26, '6', 'FRUITS-2020-11-21', NULL, 500, 1, 500),
(27, '7', 'BAKERY-2020-11-23', 1, 800, 1, 800),
(28, '7', 'BAKERY-2020-11-30', 1, 800, 1, 800),
(29, '7', 'BAKERY-2020-11-30', 1, 800, 1, 800),
(30, '7', 'BAKERY-2020-11-30', 1, 800, 1, 800),
(31, '7', 'BAKERY-2020-11-30', 1, 800, 1, 800),
(32, '7', 'BAKERY-2020-11-30', 1, 800, 1, 800),
(33, '7', 'BAKERY-2020-11-24', 1, 800, 1, 800),
(34, '7', 'BAKERY-2020-11-24', 1, 800, 1, 800),
(35, '7', 'BAKERY-2020-11-27', 1, 800, 1, 800),
(36, '7', 'BAKERY-2020-11-25', 1, 800, 1, 800),
(37, '7', 'BAKERY-2020-11-08', 1, 800, 1, 800),
(38, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(39, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(40, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(41, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(42, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(43, '7', 'BAKERY-2020-11-15', 1, 800, 1, 800),
(44, '7', 'BAKERY-2020-11-39', 1, 800, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `customer_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`id`, `category_id`, `sub_category_id`, `product`, `img`, `price`, `sell_price`, `description`, `status`, `customer_id`) VALUES
(1, NULL, 7, 'black forest pista', '1604567222_a.png', 900, 800, 'healthy food', 1, '7'),
(2, NULL, 1, 'banglore green apple', '1604571740_a.jpg', 600, 500, 'good for health and heart', 1, '6');

-- --------------------------------------------------------

--
-- Table structure for table `shop_sub_category`
--

CREATE TABLE `shop_sub_category` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_sub_category`
--

INSERT INTO `shop_sub_category` (`id`, `customer_id`, `category_id`, `sub_category`, `status`) VALUES
(1, '6', 4, 'green apple', 1),
(2, '6', 4, 'green grapes', 1),
(3, '6', 4, 'green banana', 1),
(4, '6', 4, 'seetha', 1),
(5, '6', 6, 'red apple', 1),
(6, '6', 6, 'strabery', 1),
(7, '7', 10, 'black forest', 1),
(8, '7', 10, 'white forest', 1),
(9, '7', 10, 'red velvet', 1),
(10, '7', 12, 'veg pups', 1),
(11, '7', 12, 'egg pups', 1),
(12, '7', 12, 'chicken pups', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_suplier_data`
--

CREATE TABLE `shop_suplier_data` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `qua` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_suplier_data`
--

INSERT INTO `shop_suplier_data` (`id`, `invoice_no`, `rate`, `qua`, `total`, `product_id`) VALUES
(1, 'BO/2020-11-24', 800, 1, 800, 1),
(2, 'BO/2020-11-24', 500, 1, 500, 2),
(3, 'BO/2020-11-02', 800, 1, 800, 1),
(4, 'BO/2020-11-52', 800, 1, 800, NULL),
(5, 'BO/2020-11-01', 800, 1, 800, 1),
(6, 'BO/2020-11-37', 800, 1, 800, 1),
(7, 'BO/2020-11-29', 800, 1, 800, 1),
(8, 'BO/2020-11-17', 800, 1, 800, 1),
(9, 'BO/2020-11-13', 800, 1, 800, NULL),
(10, 'BO/2020-11-28', 800, 1, 800, 1),
(11, 'BO/2020-11-38', 800, 1, 800, 1),
(12, 'BO/2020-11-31', 800, 1, 800, 1),
(13, 'BO/2020-11-52', 800, 1, 800, 1),
(14, 'BO/2020-11-52', 800, 1, 800, 1),
(15, 'BO/2020-11-52', 800, 1, 800, 1),
(16, 'BO-2020-11-56', 500, 1, 500, 2),
(17, 'FRUITS-2020-11-04', 500, 1, 500, 2),
(18, 'FRUITS-2020-11-52', 500, 1, 500, 2),
(19, 'FRUITS-2020-11-24', 500, 1, 500, 2),
(20, 'FRUITS-2020-11-23', 500, 1, 500, 2),
(21, 'FRUITS-2020-11-39', 500, 1, 500, 2),
(22, 'FRUITS-2020-11-04', 500, 1, 500, 2),
(23, 'FRUITS-2020-11-19', 500, 1, 500, 2),
(25, 'FRUITS-2020-11-45', 500, 1, 500, 2),
(26, 'FRUITS-2020-11-07', 500, 1, 500, 2),
(27, 'FRUITS-2020-11-31', 500, 1, 500, 2),
(28, 'FRUITS-2020-11-01', 500, 1, 500, 2),
(29, 'FRUITS-2020-11-01', 500, 1, 500, 2),
(30, 'FRUITS-2020-11-37', 500, 1, 500, 2),
(31, 'FRUITS-2020-11-36', 500, 1, 500, 2),
(32, 'FRUITS-2020-11-27', 500, 1, 500, 2),
(33, 'BAKERY-2020-11-19', 800, 1, 800, 1),
(34, 'FRUITS-2020-11-32', 500, 1, 500, 2),
(35, 'FRUITS-2020-11-48', 500, 1, 500, 2),
(36, 'FRUITS-2020-11-01', 500, 1, 500, 2),
(37, 'FRUITS-2020-11-37', 500, 1, 500, 2),
(38, 'FRUITS-2020-11-12', 500, 1, 500, NULL),
(39, 'FRUITS-2020-11-04', 500, 1, 500, 2),
(40, 'FRUITS-2020-11-14', 500, 1, 500, 2),
(41, 'FRUITS-2020-11-14', 500, 1, 500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_suplier_invoice`
--

CREATE TABLE `shop_suplier_invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `delivery_type` varchar(100) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `shop_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_suplier_invoice`
--

INSERT INTO `shop_suplier_invoice` (`id`, `invoice_no`, `date`, `grand_total`, `payment_type`, `delivery_type`, `sup_id`, `shop_id`) VALUES
(15, 'FRUITS-2020-11-52', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(16, 'FRUITS-2020-11-24', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(17, 'FRUITS-2020-11-23', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(18, 'FRUITS-2020-11-39', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(19, 'FRUITS-2020-11-04', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(20, 'FRUITS-2020-11-19', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(21, 'FRUITS-2020-11-03', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(22, 'FRUITS-2020-11-45', '2020-11-07', 500, 'Cash', 'Take Away', NULL, NULL),
(23, 'FRUITS-2020-11-07', '2020-11-09', 500, 'Cash', 'Take Away', 3, NULL),
(26, 'BAKERY-2020-11-19', '2020-11-09', 800, 'Cash', 'Take Away', 8, '7'),
(27, 'FRUITS-2020-11-32', '2020-11-09', 500, 'Cash', 'Take Away', 9, '6'),
(28, 'FRUITS-2020-11-48', '2020-11-09', 500, 'Cash', 'Take Away', 3, '6'),
(29, 'FRUITS-2020-11-01', '2020-11-09', 500, 'Cash', 'Take Away', 9, '6'),
(30, 'FRUITS-2020-11-37', '2020-11-10', 500, 'Cash', 'Take Away', 9, '6'),
(31, 'FRUITS-2020-11-12', '2020-11-10', 500, 'Cash', 'Take Away', NULL, '6'),
(32, 'FRUITS-2020-11-04', '2020-11-10', 500, 'Cash', 'Take Away', 9, '6'),
(33, 'FRUITS-2020-11-14', '2020-11-10', 1000, 'Cash', 'Take Away', 10, '6');

-- --------------------------------------------------------

--
-- Table structure for table `sms_setting`
--

CREATE TABLE `sms_setting` (
  `id` int(11) NOT NULL,
  `sms_name` varchar(100) DEFAULT NULL,
  `api` varchar(100) DEFAULT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `shop_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_setting`
--

INSERT INTO `sms_setting` (`id`, `sms_name`, `api`, `api_key`, `type`, `shop_id`) VALUES
(1, 'sms_name', 'api', 'api_key', 'type', '7');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_setting`
--

CREATE TABLE `smtp_setting` (
  `id` int(11) NOT NULL,
  `port` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smtp_setting`
--

INSERT INTO `smtp_setting` (`id`, `port`, `host`, `user`, `password`, `status`) VALUES
(1, 'port', 'host', 'user', 'password', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category`, `status`) VALUES
(4, 3, 'Mobile', 1),
(5, 3, 'Headphones & Ear phones', 1),
(6, 3, 'Computer & Networking', 1),
(7, 3, 'Speakers', 1),
(8, 3, 'Home Applience', 1),
(9, 3, 'Power Banks', 1),
(10, 3, 'Televisions', 1),
(11, 3, 'Video Games', 1),
(12, 3, 'Tablets', 1),
(13, 4, 'Women\'s Fashion', 1),
(14, 4, 'Men\'s Fashion', 1),
(15, 4, 'Women\'s shoe', 1),
(16, 4, 'Men\'s Shoe', 1),
(17, 5, 'Perfumes', 1),
(18, 5, 'Oil', 1),
(19, 7, 'jercies', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `sec_contact` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `customer_id`, `name`, `contact`, `sec_contact`, `email`, `address`, `status`) VALUES
(3, '6', 'sup_anu1', '9443740424', '9890987897', 'check@gmail.com', 'apk', 1),
(4, '6', 'sup_anu2', '7510830039', '9890987897', 'check1@gmail.com', 'aruvi road', 1),
(5, '7', 'balaji_sup1', '7510830039', '9890987897', 'check@gmail.com', 'banglore', 0),
(6, '7', 'balaji_sup2', '9443740424', '9890987897', 'check1@gmail.com', 'bangkong', 0),
(7, '6', 'lavanya', '8888888888', '', 'lavanya@gmail.com', '', 1),
(8, '7', 'kirana', '8908908909', NULL, NULL, NULL, 1),
(9, '6', 'check', '7510830039', NULL, 'check@gmail.com', 'kanyakumari', 1),
(10, '6', 'asha', '8888888888', NULL, 'asha@gmail.com', 'aruppukottai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `vendor_detail_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `verify` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `upload_count` int(11) DEFAULT NULL,
  `visit_count` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_id`, `vendor_detail_id`, `name`, `img`, `email`, `verify`, `status`, `upload_count`, `visit_count`, `password`, `date_created`) VALUES
(2, 'Xd7wZP', 1, 'Nithin', NULL, 'nithinmigo1@gmail.com', 1, NULL, NULL, NULL, 'XCJHt3', '2020-08-02'),
(3, 'Pa6bLD', 2, 'Vendor', NULL, 'check@gmail.com', 1, NULL, NULL, NULL, 'd56d985300d4b52eb6e189be006f44f8d23c5ec9', '2020-08-02'),
(4, 'N1crUT', 3, 'check3', NULL, 'check3@gmail.com', 1, NULL, NULL, NULL, '228524c37fb6afff193b4a2e008e9e2d59b120e6', '2020-08-02'),
(5, '8UFCtw', 4, 'Nithin', NULL, 'nithinfurie17@gmail.com', 1, NULL, NULL, NULL, '7cf15da1a0e14829c6bc9124441dcfe040c0e82b', '2020-08-03'),
(6, 'cUHM3x', 5, 'asha', NULL, 'varginaslam123@gmail.com', 1, NULL, NULL, NULL, '5PdcWo', '2020-08-06'),
(7, 'zDB0bI', 6, 'vargina', NULL, 'varginaslam123@gmail.com', 1, NULL, NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', '2020-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `contact` bigint(100) NOT NULL,
  `sec_contact` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `off_contact` bigint(100) NOT NULL,
  `description` text,
  `trade` varchar(100) NOT NULL,
  `national_id` varchar(100) NOT NULL,
  `banking_id` int(11) DEFAULT NULL,
  `registration_num` varchar(100) NOT NULL,
  `tax_certificate` varchar(100) NOT NULL,
  `agree` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`id`, `vendor_id`, `f_name`, `l_name`, `contact`, `sec_contact`, `email`, `com_name`, `off_contact`, `description`, `trade`, `national_id`, `banking_id`, `registration_num`, `tax_certificate`, `agree`) VALUES
(1, 'Xd7wZP', 'Nithin', 'Migo', 8838825568, '9786054948', 'nithinmigo1@gmail.com', 'pingifinit', 8838825568, 'Check', '1596371145_trade.pdf', '1596371145_trade1.pdf', NULL, '3GFIDNU897NEIENI', '1596371145_trade2.pdf', 1),
(2, 'Pa6bLD', 'Vendor', '', 8976878869, '8869968976', 'check@gmail.com', 'check', 99899899898, '', '1596372693_trade.pdf', '1596372693_trade1.pdf', NULL, 'CHECK56890', '1596372694_trade2.pdf', 1),
(3, 'N1crUT', 'check3', '', 8898898978, '', 'check3@gmail.com', 'check3', 88978789789, '', '1596376044_doc.pdf', '1596376044_doc1.pdf', NULL, 'CHECK568908899', '1596376044_doc2.pdf', 1),
(4, '8UFCtw', 'Nithin', 'Furie', 8898809899, '', 'nithinfurie17@gmail.com', 'furie', 8897789897, '', '1596439935_doc.pdf', '1596439936_doc1.pdf', NULL, 'CHECK5689078888', '1596439936_doc2.pdf', 1),
(5, 'cUHM3x', 'asha', 'rani', 9443740424, '9090908789', 'varginaslam123@gmail.com', 'firewalls', 908790987, 'good quality', '1596697957_doc.', '1596697957_doc1.', NULL, '90876', '1596697957_doc2.', 1),
(6, 'zDB0bI', 'vargina', 'rani', 9443740424, 'er', 'varginaslam123@gmail.com', 'ere', 23232, 'ere', '1597652560_doc.', '1597652560_doc1.', NULL, '234', '1597652560_doc2.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_setting`
--
ALTER TABLE `api_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_type`
--
ALTER TABLE `invoice_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_data`
--
ALTER TABLE `plan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub`
--
ALTER TABLE `product_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_setting`
--
ALTER TABLE `profile_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_cus`
--
ALTER TABLE `shop_cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_emp`
--
ALTER TABLE `shop_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_invoice`
--
ALTER TABLE `shop_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_invoice_data`
--
ALTER TABLE `shop_invoice_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_sub_category`
--
ALTER TABLE `shop_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_suplier_data`
--
ALTER TABLE `shop_suplier_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_suplier_invoice`
--
ALTER TABLE `shop_suplier_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_setting`
--
ALTER TABLE `sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_setting`
--
ALTER TABLE `api_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_type`
--
ALTER TABLE `invoice_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plan_data`
--
ALTER TABLE `plan_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_sub`
--
ALTER TABLE `product_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile_setting`
--
ALTER TABLE `profile_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop_cus`
--
ALTER TABLE `shop_cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shop_emp`
--
ALTER TABLE `shop_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_invoice`
--
ALTER TABLE `shop_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shop_invoice_data`
--
ALTER TABLE `shop_invoice_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_sub_category`
--
ALTER TABLE `shop_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shop_suplier_data`
--
ALTER TABLE `shop_suplier_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `shop_suplier_invoice`
--
ALTER TABLE `shop_suplier_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sms_setting`
--
ALTER TABLE `sms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
