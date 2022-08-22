-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 10:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinerestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`, `admin_email`) VALUES
(1, 'yensan123', 'yensan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Beverage'),
(2, 'Various Chops'),
(3, 'Spaghetti'),
(4, 'Side Dish');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` decimal(9,2) NOT NULL,
  `food_detail` text NOT NULL,
  `food_image` text NOT NULL,
  `food_cat` varchar(100) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_name`, `food_price`, `food_detail`, `food_image`, `food_cat`, `published_date`) VALUES
(1, 'Fish with Chips', '21.90', 'with potato,fish fillets,flour,cornstarch,paprika,onion powder,vegetable oil,baking powder and beer. It contains 785 calories.', 'fish.jpg', 'Various Chops', '2016-09-20'),
(2, 'Chicken Chop with Black Pepper Sauce', '20.90', 'with chicken marinade,chicken chop,soy sauce,worcestershire sauce,ketchup,brown sugar,olive oil,butter,onion,garlic,salt. It contains 390 calories.', 'Black.jpg', 'Various Chops', '2017-02-28'),
(3, 'Chicken Chop with Mushroom Sauce ', '20.90', 'with egg,english mustard,garlic powder,lime juice,tarragon,plain flour,salt,soy bean oil,chicken stock,mushroom and vegetable seasoning powder. It contains 385 calories.', 'mushroom.jpg', 'Various Chops', '2017-01-15'),
(4, 'Blue Ocean Mint', '15.90', 'with blue curcao,freah milk,ice cube,soda water,mint syrup,selasih . It contains 157 calories. ', 'ocean.jpg', 'Beverage', '2016-11-01'),
(5, 'Cucumber Cooler', '15.90', 'with pinch of mint,tarragon,mixed green juice,lemon juice,Agave syrup. It contains 175 calories.', 'cucumber.jpg', 'Beverage', '2016-11-23'),
(6, 'Lemongrass Jasmine Iced Tea', '15.90', 'with lemongrass,vanilla simple syrup,lemon,jasmine tea,rubicon lychee juice. It contains 27 calories', 'lemongrass.jpg', 'Beverage', '2016-11-21'),
(7, 'Americano Coffee', '11.90', 'with illy coffee beans.It contains 15 calories.', 'americano.jpg', 'Beverage', '2016-11-29'),
(8, 'Caffe Latte', '12.90', 'with illy coffee beans.It contains 135 calories.', 'latte.jpg', 'Beverage', '2016-11-05'),
(9, 'Cappuccino ', '12.90', 'with illy coffee beans and steam milk. It contains 74 calories. ', 'cappuccino.jpg', 'Beverage', '2016-11-14'),
(10, 'Classic Carbonara Spaghetti', '16.90', 'with egg yolks,parmesan cheese,higher-welfare pancetta,dried spaghetti,garlic,olive oil. It contains 384 calories. ', 'carbonara.jpeg', 'Spaghetti', '2017-08-26'),
(11, 'Shrimp Spaghetti Aglio E Olio', '16.90', 'with shrimp,kosher salt,dried spaghetti,garlic cloves,crushed red pepper flakes,minced fresh parsley,grated Parmesan cheese. It contains 221 calories. ', 'aglio.jpg', 'Spaghetti', '2017-05-09'),
(12, 'Bolognese Spaghetti', '18.90', 'withc olive oil,smoked streaky bacon,medium onions,carrots,celery sticks,garlic cloves,rosemary,beef mince. It contains 352 calories. ', 'bolognese.jpg', 'Spaghetti', '2017-01-18'),
(13, 'Seafood Spaghetti', '20.90', 'with octopus,turkish bay leaf,tomato,olive oil,basil leaf,butter,dried spaghetti,shrimp,garlic cloves.It contains 664 calories.', 'seafood.jpg', 'Spaghetti', '2017-07-17'),
(14, 'Grilled Steak', '25.90', 'olive oil,kosher salt,ground pepper and steak rib-eye. It contains 291 calories.', 'steak.jpg', 'Various Chops', '2017-04-23'),
(15, 'Chicken Mushroom Soup', '6.90', 'with fresh mushroom,onions,garlic clove,butter,flour,chicken broth,evaporated milk,salt,pepper,nutmeg. It contains 39 calories.', 'soup.jpg', 'Side Dish', '2016-05-05'),
(16, 'Crispy French Fries', '6.90', 'with garlic salt,onion salt,salt,paprika,water and vegetable oil.It contains 312 calories.', 'fries.jpg', 'Side Dish', '2017-03-24'),
(17, 'Classic Waffle', '6.90', 'with baking powder,sugar,eggs,warm milk,butter,vanilla extract and strawberry.It contains 291 calories.', 'waffle.jpg', 'Side Dish', '2016-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_add` varchar(100) NOT NULL,
  `customer_tel` varchar(100) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `total_price` decimal(9,2) NOT NULL,
  `order_reference` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `promotion_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `customer_email`, `customer_add`, `customer_tel`, `customer_state`, `date`, `total_price`, `order_reference`, `user_id`, `promotion_price`) VALUES
(1, 'Sammy', 'sammy@gmail.com', '123, Sammy Street', '196544420', 'Perak', '2016-12-06', '14.31', '34318', 5, '43.85'),
(2, 'Larry', 'larry@gmail.com', '567, Larry Street', '105984122', 'Kedah', '2016-12-06', '18.81', '60563', 4, '160.95'),
(3, 'Andrea Tarr', 'andrea@gmail.com', '234, Tarr Street', '123347854', 'Sabah', '2017-10-08', '15.21', '97244', 3, '67.05'),
(4, 'Andrea Tarr', 'andrea@gmail.com', '234, Tarr Street', '123347854', 'Sabah', '2017-10-08', '18.81', '59711', 3, '45.55'),
(5, 'John', 'john@gmail.com', '13,JLN Ramu Street,Muar', '178495645', 'Johor', '2017-10-08', '15.21', '1332', 2, '76.86'),
(6, 'Jenny', 'jenny@gmail.com', '123, Jenny Street', '113594812', 'Sarawak', '2017-09-07', '46.62', '77615', 1, '82.30'),
(7, 'Gordon', 'gordon@gmail.com', '789, Gordon Street', '178493026', 'Pahang', '2017-09-07', '12.42', '77697', 6, '58.05'),
(8, 'Larry', 'larry@gmail.com', '567, Larry Street', '105984122', 'Kedah', '2016-10-08', '23.31', '54784', 4, '41.15'),
(9, 'Larry', 'larry@gmail.com', '567, Larry Street', '105984122', 'Kedah', '2016-10-08', '15.21', '38492', 4, '35.75'),
(10, 'Sammy', 'sammy@gmail.com', '123, Sammy Street', '196544420', 'Perak', '2016-12-06', '23.31', '25413', 5, '68.05'),
(11, 'Sammy', 'sammy@gmail.com', '123, Sammy Street', '196544420', 'Perak', '2016-12-06', '19.71', '57941', 5, '100.26'),
(12, 'Jenny', 'jenny@gmail.com', '123, Jenny Street', '113594812', 'Sarawak', '2017-09-07', '15.21', '77847', 1, '87.65'),
(13, 'Jenny', 'jenny@gmail.com', '123, Jenny Street', '0113594812', 'Sarawak', '2017-11-28', '14.31', '23085', 1, '29.50'),
(14, 'Jenny', 'jenny@gmail.com', '123, Jenny Street', '0113594812', 'Sarawak', '2017-11-30', '11.61', '53358', 1, '31.30'),
(15, 'Jenny', 'jenny@gmail.com', '123, Jenny Street', '0113594812', 'Sarawak', '2017-11-30', '14.31', '4773', 1, '28.60');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `ordersdetail_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(2) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`ordersdetail_id`, `pro_id`, `pro_name`, `price`, `status`, `quantity`, `order_id`) VALUES
(1, 4, 'Blue Ocean Mint', '15.90', 'done', 1, 1),
(2, 14, 'Grilled Steak ', '25.90', 'done', 1, 1),
(3, 17, 'Classic Waffle', '6.90', 'done', 1, 1),
(4, 2, 'Chicken Chop with Black Pepper Sauce ', '20.90', 'done', 1, 2),
(5, 14, 'Grilled Steak', '25.90', 'done', 2, 2),
(6, 13, 'Seafood Spaghetti', '20.90', 'done', 1, 2),
(7, 8, 'Caffe Latte', '12.90', 'done', 1, 2),
(8, 9, 'Cappuccino', '12.90', 'done', 1, 2),
(9, 5, 'Cucumber Cooler', '15.90', 'done', 1, 2),
(10, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 2),
(11, 16, 'Crispy French Fries', '6.90', 'done', 1, 2),
(12, 15, 'Chicken Mushroom Soup ', '6.90', 'done', 3, 2),
(13, 11, 'Shrimp Spaghetti Aglio E Olio', '16.90', 'done', 1, 3),
(14, 14, 'Grilled Steak', '25.90', 'done', 1, 3),
(15, 7, 'Americano Coffee', '11.90', 'done', 1, 3),
(16, 9, 'Cappuccino', '12.90', 'done', 1, 3),
(17, 17, 'Classic Waffle', '6.90', 'done', 1, 3),
(18, 13, 'Seafood Spaghetti', '20.90', 'done', 1, 4),
(19, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 4),
(20, 16, 'Crispy French Fries', '6.90', 'done', 1, 4),
(21, 17, 'Classic Waffle', '6.90', 'done', 1, 4),
(22, 10, 'Classic Carbonara Spaghetti', '16.90', 'done', 1, 5),
(23, 14, 'Grilled Steak', '25.90', 'done', 1, 5),
(24, 15, 'Chicken Mushroom Soup ', '6.90', 'done', 1, 5),
(25, 16, 'Crispy French Fries', '6.90', 'done', 1, 5),
(26, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 5),
(27, 9, 'Cappuccino', '12.90', 'done', 1, 5),
(28, 14, 'Grilled Steak', '25.90', 'done', 2, 6),
(29, 16, 'Crispy French Fries', '6.90', 'done', 2, 6),
(30, 9, 'Cappuccino', '12.90', 'done', 2, 6),
(31, 17, 'Classic Waffle', '6.90', 'done', 2, 7),
(32, 7, 'Americano Coffee', '11.90', 'done', 1, 7),
(33, 8, 'Caffe Latte', '12.90', 'done', 1, 7),
(34, 14, 'Grilled Steak', '25.90', 'done', 1, 7),
(35, 14, 'Grilled Steak', '25.90', 'done', 1, 8),
(36, 8, 'Caffe Latte', '12.90', 'done', 1, 8),
(37, 15, 'Chicken Mushroom Soup ', '6.90', 'done', 1, 8),
(38, 10, 'Classic Carbonara Spaghetti', '16.90', 'done', 1, 9),
(39, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 9),
(40, 16, 'Crispy French Fries', '6.90', 'done', 1, 9),
(41, 14, 'Grilled Steak', '25.90', 'done', 1, 10),
(42, 5, 'Cucumber Cooler', '15.90', 'done', 1, 10),
(43, 2, 'Chicken Chop with Black Pepper Sauce ', '20.90', 'done', 1, 10),
(44, 8, 'Caffe Latte', '12.90', 'done', 1, 10),
(45, 1, 'Fish with Chips', '21.90', 'done', 1, 11),
(46, 2, 'Chicken Chop with Black Pepper Sauce ', '20.90', 'done', 1, 11),
(47, 3, 'Chicken Chop with Mushroom Sauce', '20.90', 'done', 1, 11),
(48, 4, 'Blue Ocean Mint', '15.90', 'done', 1, 11),
(49, 5, 'Cucumber Cooler', '15.90', 'done', 1, 11),
(50, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 11),
(51, 11, 'Shrimp Spaghetti Aglio E Olio', '16.90', 'done', 1, 12),
(52, 12, 'Bolognese Spaghetti ', '18.90', 'done', 1, 12),
(53, 13, 'Seafood Spaghetti', '20.90', 'done', 1, 12),
(54, 8, 'Caffe Latte', '12.90', 'done', 1, 12),
(55, 7, 'Americano Coffee', '11.90', 'done', 1, 12),
(56, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'done', 1, 12),
(57, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'process', 1, 13),
(58, 10, 'Classic Carbonara Spaghetti', '16.90', 'process', 1, 13),
(59, 9, 'Cappuccino ', '12.90', 'process', 1, 14),
(60, 1, 'Fish with Chips', '21.90', 'process', 1, 14),
(61, 4, 'Blue Ocean Mint', '15.90', 'process', 1, 15),
(62, 6, 'Lemongrass Jasmine Iced Tea', '15.90', 'process', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_pass2` varchar(50) NOT NULL,
  `user_state` varchar(10) NOT NULL,
  `user_image` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_address`, `user_contact`, `user_email`, `user_pass`, `user_pass2`, `user_state`, `user_image`, `question_id`, `answer`) VALUES
(1, 'Jenny', '123, Jenny Street', '0113594812', 'jenny@gmail.com', 'jenny123', 'jenny123', 'Sarawak', 'jenny.jpg', 0, '0'),
(2, 'John', '13, JLN Ramu Street,Muar', '0178495645', 'john@gmail.com', 'john123', 'john123', 'Johor', 'john.jpg', 0, '0'),
(3, 'Andrea Tarr', '234, Tarr Street', '0123347854', 'andrea@gmail.com', 'andrea234', 'andrea234', 'Sabah', 'andrea.jpg', 0, '0'),
(4, 'Larry', '567, Larry Street', '0105984122', 'larry@gmail.com', 'larry567', 'larry567', 'Kedah', 'larry.jpg', 0, '0'),
(5, 'Sammy', '345, Sammy Street', '0196544420', 'sammy@gmail.com', 'sammy345', 'sammy345', 'Perak', 'sammy.jpg', 0, '0'),
(6, 'Gordon', '789, Gordon Street', '0178493026', 'gordon@gmail.com', 'gordon789', 'gordon789', 'Pahang', 'gordon.jpg', 0, '0');

--
-- Indexes for dumped tables
--

CREATE TABLE `remark` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `remark`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;


--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`ordersdetail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `ordersdetail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
