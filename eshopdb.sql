-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 06:08 PM
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
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `query_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pnumber` int(11) NOT NULL,
  `query` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobilespecification`
--

CREATE TABLE `mobilespecification` (
  `pid` int(11) NOT NULL,
  `os` varchar(30) NOT NULL,
  `processor` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `SIM_Type` varchar(30) NOT NULL,
  `Hybrid_Sim_Slot` tinyint(1) NOT NULL,
  `Display_Size` varchar(30) NOT NULL,
  `Resolution` varchar(30) NOT NULL,
  `Internal_Storage` varchar(10) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `Primary_Camera` varchar(30) NOT NULL,
  `Secondary_Camera` varchar(30) NOT NULL,
  `Network_Type` varchar(30) NOT NULL,
  `Battery_Capacity` varchar(30) NOT NULL,
  `Width` varchar(10) NOT NULL,
  `Height` varchar(10) NOT NULL,
  `Warranty_Summary` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobilespecification`
--

INSERT INTO `mobilespecification` (`pid`, `os`, `processor`, `color`, `SIM_Type`, `Hybrid_Sim_Slot`, `Display_Size`, `Resolution`, `Internal_Storage`, `RAM`, `Primary_Camera`, `Secondary_Camera`, `Network_Type`, `Battery_Capacity`, `Width`, `Height`, `Warranty_Summary`) VALUES
(12005, 'Android 12', 'Exynos 990', 'Green', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '32GB', '4GB', '13MP', '7MP', '2G,3G,4G', '5000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122000, 'Android 12', 'Snapdragon 950', 'Black', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '32GB', '4GB', '64MP', '20MP', '2G,3G,4G', '6000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122005, 'Android 12', 'Snapdragon 950', 'Sea blue', 'Dual', 0, '6.4 Inches', ' 720 x 1600 ', '64 GB', '6GB', '64MP', '20MP', '2G,3G,4G', '6000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122006, 'IOS 13', 'IOS ', 'Emerald', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '128 GB', '8GB', '64MP', '20MP', '2G,3G,4G,5G', '6000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122008, 'Android 12', 'Snapdragon 950', 'Black', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '64 GB', '6GB', '64MP', '7MP', '2G,3G,4G,5G', '5000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122009, 'Android 12', 'Snapdragon 950', 'Grey', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '32GB', '4GB', '64MP', '7MP', '2G,3G,4G', '6000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122010, 'Android 12', 'Exynos 990', 'NAVY BLUE', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '64 GB', '6GB', '13MP', '7MP', '2G,3G,4G', '6000mAh', '6.4cm', '6.5Inches', '1 Year'),
(122011, 'Android 12', 'Snapdragon 950', 'Light Blue(Gradient)', 'Dual', 0, '6.5 Inches', ' 720 x 1600 ', '32GB', '4GB', '64MP', '7MP', '2G,3G,4G', '6000mAh', '6.4cm', '6.5Inches', '1 Year');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `order_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `pid`, `order_date`, `amount`, `address`, `payment`, `status`) VALUES
(1, 3, '122000,150009,122005', '2023-07-20', 76190, 'divyangna,234 Usha Nagar', 'Credit Card', 'Undelivered'),
(2, 3, '12005', '2023-07-20', 9600, 'astha,32 A emerald colony', 'Credit Card', 'Undelivered'),
(3, 37, '122006,150005', '2023-07-20', 283000, 'Malay Kale,372 usha nagar', 'Internet Banking', 'Undelivered'),
(4, 38, '152003,122010', '2023-07-20', 79500, 'Deepa Kale,372 Usha Nagar exr', 'Credit Card', 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE `productmaster` (
  `pid` int(11) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `pprice` int(11) NOT NULL,
  `ptype` varchar(40) NOT NULL,
  `pimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`pid`, `pname`, `pprice`, `ptype`, `pimage`) VALUES
(12005, 'Samsung Galaxy M04 (4GB RAM, 128 GB Stor', 9600, 'Mobile', 'product/sammobile.jpg'),
(122000, 'Realme Narzo N55', 11200, 'Mobile', 'product/Realme Narzo N55.jpg'),
(122005, 'OnePlus Nord CE 2 Lite 5G (6 GB RAM, 128', 32000, 'Mobile', 'product/oneplusmobile.jpg'),
(122006, 'Apple iPhone 13, 128 GB', 68000, 'Mobile', 'product/Iphone.jpg'),
(122008, 'REDMI Note 10T 5G', 18000, 'Mobile', 'product/REDMI Note 10T 5G.jpg'),
(122009, 'Redmi 11 Prime', 12000, 'Mobile', 'product/Redmi 11 Prime.jpg'),
(122010, 'Vivo Y16 (3/32) Mobile', 11500, 'Mobile', 'product/vivo1.jpg'),
(122011, 'Vivo T2 5G (Nitro Blaze, 128 GB)', 16000, 'Mobile', 'product/vivot2 5G.jpg'),
(150001, 'MI 80 cm (32 inches) 5A Series HD Ready ', 32000, 'Television', 'product/televison.jpg'),
(150002, 'LG 80 cm (32 inch) HD Ready LED Smart We', 50000, 'Television', 'product/samsung.jpg'),
(150005, 'Samsung 163 Cm 65 Inches ', 215000, 'Television', 'product/samsung123.jpg'),
(150006, 'SONY UHD/4K PANEL 65 INCH ', 150000, 'Television', 'product/sonybraviasss.jpg'),
(150007, 'Samsung Crystal Ultra Hd 4k', 45200, 'Television', 'product/samsung ultra.jpg'),
(150009, 'Sansui 109 cm (43 inch) Ultra HD (4K)', 32990, 'Television', 'product/Sansui 109 cm (43 inch) Ultra HD (4K).jpg'),
(152003, 'Sony Bravia 139 cm (55 inches) 4K Ultra ', 68000, 'Television', 'product/sonytv.jpg'),
(152004, 'Sony Bravia 215 cm (85)', 88900, 'Television', 'product/Sony Bravia 215 cm (85).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tv_specification`
--

CREATE TABLE `tv_specification` (
  `pid` int(11) NOT NULL,
  `in_the_box` varchar(150) NOT NULL,
  `color` varchar(20) NOT NULL,
  `display_size` varchar(20) NOT NULL,
  `screen_type` varchar(20) NOT NULL,
  `hd_tech_res` varchar(20) NOT NULL,
  `smart_tv` tinyint(1) NOT NULL,
  `motion_sensor` tinyint(1) NOT NULL,
  `HDMI` varchar(20) NOT NULL,
  `wallmnt` tinyint(1) NOT NULL,
  `USB` varchar(20) NOT NULL,
  `built_in_wifi` tinyint(1) NOT NULL,
  `launch_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_specification`
--

INSERT INTO `tv_specification` (`pid`, `in_the_box`, `color`, `display_size`, `screen_type`, `hd_tech_res`, `smart_tv`, `motion_sensor`, `HDMI`, `wallmnt`, `USB`, `built_in_wifi`, `launch_year`) VALUES
(150001, '1 LED TV, 2 Table Stand Base, 1 User Manual, 1 Remote Control, 4 screws, 2 x AAA Batteries', 'Black', '32 Inches', 'LED', '1366 x 768', 0, 0, '1', 0, '3', 0, 2018),
(150002, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'Black', '48 Inches', 'OLED', '3840 x 2160', 0, 0, '2', 0, 'Yes', 3, 2022),
(150005, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'Black', '65inches', 'OLED', '3840 x 2160', 0, 0, '2', 0, 'Yes', 3, 2022),
(150006, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'Black', '55inches', 'OLED', '1366 x 768', 0, 0, '2', 0, 'Yes', 6, 2023),
(150007, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'NAVY BLUE', '55inches', 'OLED', '3840 x 2160', 0, 0, '2', 0, 'Yes', 5, 2022),
(150009, '1 LED TV, 2 Table Stand Base, 1 User Manual, 1 Remote Control, 4 screws, 2 x AAA Batteries', 'Black', '43 Inches', 'LED', '1366 x 768', 0, 0, '1', 0, 'No', 3, 2022),
(152003, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'Black', '65 Inches', 'OLED', '3840 x 2160', 0, 0, '2', 0, 'Yes', 5, 2023),
(152004, '1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries', 'Black', '85 Inches', 'OLED', '3840 x 2160', 0, 0, '3', 0, 'Yes', 5, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `user_gender` varchar(40) NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `user_dob` date NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`user_id`, `user_name`, `user_email`, `user_pwd`, `user_gender`, `user_mobile`, `user_dob`, `role`) VALUES
(1, 'divyangna', 'divyangna.kale05@gmail.com', '456789', 'Female', 6268655485, '2023-07-04', 'client'),
(2, 'astha', 'astha345@gmail.com', '345678', 'Female', 7894569874, '1999-01-27', 'client'),
(3, 'Sam', 'sam1@gmail.com', 'sam123@', 'Male', 8547965545, '2013-07-16', 'Admin'),
(4, 'esha', 'esha234@gmail.com', 'Esha123@*', 'Female', 8957864123, '1994-05-10', 'Admin'),
(37, 'malay', 'malay@gmail.com', 'Malay123@', 'Male', 6265002091, '2006-10-19', 'client'),
(38, 'deepa', 'deepa@gmail.com', 'Deepa123@', 'Female', 8957864123, '1996-02-14', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `mobilespecification`
--
ALTER TABLE `mobilespecification`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `productmaster`
--
ALTER TABLE `productmaster`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tv_specification`
--
ALTER TABLE `tv_specification`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobilespecification`
--
ALTER TABLE `mobilespecification`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122012;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productmaster`
--
ALTER TABLE `productmaster`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152005;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
