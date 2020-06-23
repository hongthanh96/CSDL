CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `Customernumber` int NOT NULL,
  `Name` varchar(20) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Employees_EmployeeID` int NOT NULL,
  PRIMARY KEY (`Customernumber`),
  KEY `fk_Customers_Employees1_idx` (`Employees_EmployeeID`),
  CONSTRAINT `fk_Customers_Employees1` FOREIGN KEY (`Employees_EmployeeID`) REFERENCES `employees` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `EmployeeID` int NOT NULL,
  `EmployName` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `work_name` varchar(45) NOT NULL,
  `offices_officeCode` int NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  KEY `fk_Employees_offices1_idx` (`offices_officeCode`),
  CONSTRAINT `fk_Employees_offices1` FOREIGN KEY (`offices_officeCode`) REFERENCES `offices` (`officeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offices` (
  `officeCode` int NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Telephone` int NOT NULL,
  `Country` varchar(20) NOT NULL,
  PRIMARY KEY (`officeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offices`
--

LOCK TABLES `offices` WRITE;
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `OrderNumber` int NOT NULL,
  `buy_day` datetime NOT NULL,
  `diliveryDay` datetime NOT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL,
  `Customers_Customernumber` int NOT NULL,
  PRIMARY KEY (`OrderNumber`,`Customers_Customernumber`),
  KEY `fk_Orders_Customers_idx` (`Customers_Customernumber`),
  CONSTRAINT `fk_Orders_Customers` FOREIGN KEY (`Customers_Customernumber`) REFERENCES `customers` (`Customernumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PaymentID` int NOT NULL,
  `PaymentDay` datetime NOT NULL,
  `Money` int NOT NULL,
  `Customers_Customernumber` int NOT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `fk_Payment_Customers1_idx` (`Customers_Customernumber`),
  CONSTRAINT `fk_Payment_Customers1` FOREIGN KEY (`Customers_Customernumber`) REFERENCES `customers` (`Customernumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productline`
--

DROP TABLE IF EXISTS `productline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productline` (
  `ID` int NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productline`
--

LOCK TABLES `productline` WRITE;
/*!40000 ALTER TABLE `productline` DISABLE KEYS */;
/*!40000 ALTER TABLE `productline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `ProductCode` int NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Supplier` varchar(15) NOT NULL,
  `ProductQuantity` int NOT NULL,
  `InputPrice` int NOT NULL,
  `sellPrice` int NOT NULL,
  `Orders_OrderNumber` int NOT NULL,
  `Orders_Customers_Customernumber` int NOT NULL,
  `productLine_ID` int NOT NULL,
  PRIMARY KEY (`ProductCode`),
  KEY `fk_Products_Orders1_idx` (`Orders_OrderNumber`,`Orders_Customers_Customernumber`),
  KEY `fk_Products_productLine1_idx` (`productLine_ID`),
  CONSTRAINT `fk_Products_Orders1` FOREIGN KEY (`Orders_OrderNumber`, `Orders_Customers_Customernumber`) REFERENCES `orders` (`OrderNumber`, `Customers_Customernumber`),
  CONSTRAINT `fk_Products_productLine1` FOREIGN KEY (`productLine_ID`) REFERENCES `productline` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `đồ ăn`
--

DROP TABLE IF EXISTS `đồ ăn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `đồ ăn` (
  `idĐồ ăn` int NOT NULL,
  `ảnh` point NOT NULL,
  `Giá` int NOT NULL,
  `Số lượng` int NOT NULL,
  `Tinh trạng` tinyint NOT NULL,
  `isHot` tinyint NOT NULL,
  `isNew` tinyint NOT NULL,
  `Giới thiệu` varchar(45) NOT NULL,
  PRIMARY KEY (`idĐồ ăn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `đồ ăn`
--

LOCK TABLES `đồ ăn` WRITE;
/*!40000 ALTER TABLE `đồ ăn` DISABLE KEYS */;
/*!40000 ALTER TABLE `đồ ăn` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-23 16:57:51
