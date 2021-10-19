-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 04:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `amazon_data`
--

CREATE TABLE `amazon_data` (
  `Order_Date` date DEFAULT NULL,
  `Order_ID` text DEFAULT NULL,
  `Account_Group` text DEFAULT NULL,
  `PO_Number` text DEFAULT NULL,
  `Order_Quantity` text DEFAULT NULL,
  `Currency` text DEFAULT NULL,
  `Order_Subtotal` text DEFAULT NULL,
  `Order_Shipping_Handling` text DEFAULT NULL,
  `Order_Promotion` text DEFAULT NULL,
  `Order_Tax` text DEFAULT NULL,
  `Order_Net_Total` text DEFAULT NULL,
  `Order_Status` text DEFAULT NULL,
  `Approver` text DEFAULT NULL,
  `Account_User` text DEFAULT NULL,
  `Account_User_Email` text DEFAULT NULL,
  `Invoice_Status` text DEFAULT NULL,
  `Total_Amount` text DEFAULT NULL,
  `Invoice_Due_Amount` text DEFAULT NULL,
  `Invoice_Issue_Date` text DEFAULT NULL,
  `Invoice_Due_Date` text DEFAULT NULL,
  `Payment_Reference_ID` text DEFAULT NULL,
  `Payment_Date` text DEFAULT NULL,
  `Payment_Amount` text DEFAULT NULL,
  `Payment_Instrument_Type` text DEFAULT NULL,
  `Payment_Identifier` text DEFAULT NULL,
  `Amazon_Internal_Product_Category` text DEFAULT NULL,
  `ASIN` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `UNSPSC` text DEFAULT NULL,
  `Segment` text DEFAULT NULL,
  `Family` text DEFAULT NULL,
  `Class` text DEFAULT NULL,
  `Commodity` text DEFAULT NULL,
  `Brand_Code` text DEFAULT NULL,
  `Brand` text DEFAULT NULL,
  `Manufacturer` text DEFAULT NULL,
  `National_Stock_Number` text DEFAULT NULL,
  `Item_model_number` text DEFAULT NULL,
  `Part_number` text DEFAULT NULL,
  `Product_Condition` text DEFAULT NULL,
  `Company_Compliance` text DEFAULT NULL,
  `Listed_PPU` text DEFAULT NULL,
  `Purchase_PPU` text DEFAULT NULL,
  `Item_Quantity` text DEFAULT NULL,
  `Item_Subtotal` text DEFAULT NULL,
  `Item_Shipping_Handling` text DEFAULT NULL,
  `Item_Promotion` text DEFAULT NULL,
  `Item_Tax` text DEFAULT NULL,
  `Item_Net_Total` text DEFAULT NULL,
  `PO_Line_Item_Id` text DEFAULT NULL,
  `Tax_Exemption_Applied` text DEFAULT NULL,
  `Tax_Exemption_Type` text DEFAULT NULL,
  `Tax_Exemption_Opt_Out` text DEFAULT NULL,
  `Discount_Program` text DEFAULT NULL,
  `Pricing_Discount_applied_dollar` text DEFAULT NULL,
  `Pricing_Discount_applied_percentage` text DEFAULT NULL,
  `GL_Code` text DEFAULT NULL,
  `Department` text DEFAULT NULL,
  `Cost_Center` text DEFAULT NULL,
  `Project_Code` text DEFAULT NULL,
  `Location` text DEFAULT NULL,
  `Custom_Field_1` text DEFAULT NULL,
  `Seller_Name` text DEFAULT NULL,
  `Seller_Credentials` text DEFAULT NULL,
  `Seller_City` text DEFAULT NULL,
  `Seller_State` text DEFAULT NULL,
  `Seller_ZipCode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
