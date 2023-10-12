-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 08:04 AM
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
-- Database: `ris_propertyoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_description` varchar(50) DEFAULT NULL,
  `stock_number` varchar(10) DEFAULT NULL,
  `stock_unit` varchar(10) DEFAULT NULL,
  `item_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_description`, `stock_number`, `stock_unit`, `item_quantity`) VALUES
('Chloride Powder', 'OS 255', 'piece', 55),
('Mouse Pad', 'OS 290', 'piece', 51),
('Battery D Alkaline', 'OS 156', 'piece', 16),
('Photo Paper', 'OS 146', 'piece', 59),
('BROOM, soft (tambo)', 'OS 202', 'piece', 15),
('EPSON, INK CART, (001) Black', 'OS 238', 'bottle', 69),
('AIR FRESHENER, aerosol, 280ml/150g min', 'OS 154', 'can', 200),
('CALCULATOR, compact, 12 digits', 'OS 054', 'unit', 50),
('ENVELOPE, EXPANDING legal size doc', 'OS 117', 'piece', 72),
('Frame A4 Size', 'OS 271', 'piece', 80),
('PAPER, MULTICOPY, 80gsm, size: A4', 'OS 033', 'Reams', 68),
('NOTE PAD, stick on, (2in x 3in) min', 'OS 317', 'Book', 74),
('MOUSE, WIRELESS, USB', 'OS 370', 'Unit', 77),
('Manila Paper', 'OS 292', 'Piece', 55),
('MOPHANDLE, heavy duty, aluminum, screw type', 'OS 361', 'Book', 78),
('Gestener toner MP2014', 'OS 232', 'Piece', 90),
('Ring Binder 1/4', 'OS 642', 'Piece', 58);

-- --------------------------------------------------------

--
-- Table structure for table `queue_logs`
--

CREATE TABLE `queue_logs` (
  `referenceCode` int(6) NOT NULL,
  `yearRequested` int(5) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `userPosition` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `stock_unit` varchar(10) NOT NULL,
  `quantityInput` int(100) NOT NULL,
  `purpose` text NOT NULL,
  `dateRequested` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue_logs`
--

INSERT INTO `queue_logs` (`referenceCode`, `yearRequested`, `accountName`, `userPosition`, `centerCode`, `userOffice`, `stock_number`, `item_description`, `stock_unit`, `quantityInput`, `purpose`, `dateRequested`) VALUES
(530267, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 292', 'Manila Paper', 'Piece', 2, 'for office use', '09/13/2023'),
(530267, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 1, 'for office use', '09/13/2023'),
(303194, 2023, 'Ma. Theresa M. Roxas', 'Supply Officer II', 'P1', 'Property and Supply', 'OS 255', 'Chloride Powder', 'piece', 2, 'office cleaning material', '09/20/2023'),
(303194, 2023, 'Ma. Theresa M. Roxas', 'Supply Officer II', 'P1', 'Property and Supply', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, 'office cleaning material', '09/20/2023'),
(629113, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 1, 'for office use', '09/27/2023'),
(629113, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 146', 'Photo Paper', 'piece', 1, 'for office use', '09/27/2023'),
(800075, 2023, 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'S1', 'Schools Division Superintendent', 'OS 271', 'Frame A4 Size', 'piece', 1, 'for osds office use', '10/02/2023'),
(800075, 2023, 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'S1', 'Schools Division Superintendent', 'OS 213', 'MARKER, PERMANENT,blue', 'Piece', 1, 'for osds office use', '10/02/2023'),
(251077, 2023, 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'A1', 'Assistant Schools Division Superintendent', 'OS 213', 'MARKER, PERMANENT,blue', 'Piece', 1, 'for use of oasds', '10/04/2023'),
(251077, 2023, 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'A1', 'Assistant Schools Division Superintendent', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 1, 'for use of oasds', '10/04/2023'),
(885982, 2023, 'Anne Melfei Casas', 'ADAS III', 'AC9', 'Accounting', 'OS 092', 'Extension Cord', 'piece', 1, 'for new printer and computer set on accounting office', '10/06/2023'),
(885982, 2023, 'Anne Melfei Casas', 'ADAS III', 'AC9', 'Accounting', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 1, 'for new printer and computer set on accounting office', '10/06/2023'),
(885982, 2023, 'Anne Melfei Casas', 'ADAS III', 'AC9', 'Accounting', 'OS 290', 'Mouse Pad', 'piece', 1, 'for new printer and computer set on accounting office', '10/06/2023'),
(885982, 2023, 'Anne Melfei Casas', 'ADAS III', 'AC9', 'Accounting', 'OS 238', 'EPSON, INK CART, (001) Black', 'bottle', 1, 'for new printer and computer set on accounting office', '10/06/2023'),
(261269, 2023, 'Lalaine Bartolome', 'ADAS II', 'B2', 'Budget', 'OS 228', 'Liquid Hand Soap with Pump', 'Book', 1, 'hygiene use', '10/07/2023'),
(174211, 2023, 'Marlon P. Daclis', 'EPS I - English', 'CID6', 'Curriculum Implementation Division', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 2, 'for office use', '10/07/2023'),
(174211, 2023, 'Marlon P. Daclis', 'EPS I - English', 'CID6', 'Curriculum Implementation Division', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'for office use', '10/07/2023'),
(174211, 2023, 'Marlon P. Daclis', 'EPS I - English', 'CID6', 'Curriculum Implementation Division', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 2, 'for office use', '10/07/2023'),
(174211, 2023, 'Marlon P. Daclis', 'EPS I - English', 'CID6', 'Curriculum Implementation Division', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 2, 'for office use', '10/07/2023'),
(948700, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, 'freshener 201 chloride 55 toner 90 wireless mouse 78 paper a4 70', '10/08/2023'),
(948700, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 255', 'Chloride Powder', 'piece', 5, 'freshener 201 chloride 55 toner 90 wireless mouse 78 paper a4 70', '10/08/2023'),
(948700, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 232', 'Gestener toner MP2014', 'Piece', 2, 'freshener 201 chloride 55 toner 90 wireless mouse 78 paper a4 70', '10/08/2023'),
(948700, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 2, 'freshener 201 chloride 55 toner 90 wireless mouse 78 paper a4 70', '10/08/2023'),
(948700, 2023, 'Mark Austin B. Condalor', 'Intern (ICT Services)', 'I3', 'Information Communication Technology', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 3, 'freshener 201 chloride 55 toner 90 wireless mouse 78 paper a4 70', '10/08/2023'),
(711638, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'air freshener 200 alkaline 16 envelope 75 photopaper 61', '10/08/2023'),
(711638, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 156', 'Battery D Alkaline', 'piece', 1, 'air freshener 200 alkaline 16 envelope 75 photopaper 61', '10/08/2023'),
(711638, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 5, 'air freshener 200 alkaline 16 envelope 75 photopaper 61', '10/08/2023'),
(711638, 2023, 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'P3', 'Property and Supply', 'OS 146', 'Photo Paper', 'piece', 2, 'air freshener 200 alkaline 16 envelope 75 photopaper 61', '10/08/2023'),
(646750, 2023, 'Eluisa L. Icang', 'ADAS III', 'PAY1', 'Payroll', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, 'for cleaning material', '10/09/2023'),
(569428, 2023, 'Kristine Joy D. Quezada', 'Accountant III', 'AC1', 'Accounting', 'OS 146', 'Photo Paper', 'piece', 1, 'for Baguio Seminar on Tuesday', '10/10/2023'),
(569428, 2023, 'Kristine Joy D. Quezada', 'Accountant III', 'AC1', 'Accounting', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 1, 'for Baguio Seminar on Tuesday', '10/10/2023'),
(569428, 2023, 'Kristine Joy D. Quezada', 'Accountant III', 'AC1', 'Accounting', 'OS 292', 'Manila Paper', 'Piece', 1, 'for Baguio Seminar on Tuesday', '10/10/2023'),
(348023, 2023, 'End User', 'End User', 'End User', 'End User', 'OS 146', 'Photo Paper', 'piece', 1, 'testing', '10/11/2023');

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `risNoDate` text NOT NULL,
  `yearRequested` int(4) NOT NULL,
  `seriesNumber` int(255) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp(),
  `accountName` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `stock_unit` varchar(10) NOT NULL,
  `quantityInput` int(100) NOT NULL,
  `formDate` text NOT NULL,
  `releaseDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`risNoDate`, `yearRequested`, `seriesNumber`, `timeStamp`, `accountName`, `centerCode`, `userOffice`, `stock_number`, `item_description`, `stock_unit`, `quantityInput`, `formDate`, `releaseDate`) VALUES
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 2, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 202', 'BROOM, soft (tambo)', 'piece', 10, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 12, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 092', 'Extension Cord', 'piece', 12, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 290', 'Mouse Pad', 'piece', 8, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 213', 'MARKER, PERMANENT,blue', 'Piece', 8, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 146', 'Photo Paper', 'piece', 15, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 317', 'Ring Binder 1/4', 'Book', 12, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 317', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Book', 8, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 09:03:29', 'End User', 'End User', 'End User', 'OS 361', 'MOUSE, WIRELESS, USB', 'Book', 7, '10/09/2023', '10/09/2023'),
('2023-10-000002', 2023, 2, '2023-10-09 09:44:43', 'Mark Austin B. Condalor', 'I3', 'Information Communication Technology', 'OS 228', 'Liquid Hand Soap with Pump', 'Book', 10, '10/09/2023', '10/09/2023'),
('2023-10-000003', 2023, 3, '2023-10-11 12:58:56', 'Jayson Fuller', 'I2', 'Information Communication Technology', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, '10/08/2023', '10/11/2023'),
('2023-10-000003', 2023, 3, '2023-10-11 12:58:56', 'Jayson Fuller', 'I2', 'Information Communication Technology', 'OS 092', 'Extension Cord', 'piece', 1, '10/08/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-11 13:59:49', 'Angelo Y. Capa', 'I4', 'Information Communication Technology', 'OS 055', 'Desktop Computer', 'Unit', 1, '10/10/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-11 13:59:49', 'Angelo Y. Capa', 'I4', 'Information Communication Technology', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 1, '10/10/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-11 13:59:49', 'Angelo Y. Capa', 'I4', 'Information Communication Technology', 'OS 290', 'Mouse Pad', 'piece', 1, '10/10/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-11 13:59:49', 'Angelo Y. Capa', 'I4', 'Information Communication Technology', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 2, '10/10/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-11 13:59:49', 'Angelo Y. Capa', 'I4', 'Information Communication Technology', 'OS 238', 'EPSON, INK CART, (001) Black', 'bottle', 2, '10/10/2023', '10/11/2023');

-- --------------------------------------------------------

--
-- Table structure for table `ris_accounts`
--

CREATE TABLE `ris_accounts` (
  `accountType` varchar(50) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `userPosition` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `depedEmail` varchar(50) DEFAULT NULL,
  `accountPass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ris_accounts`
--

INSERT INTO `ris_accounts` (`accountType`, `accountName`, `userPosition`, `userOffice`, `centerCode`, `depedEmail`, `accountPass`) VALUES
('Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'sa.erisformsystem@gmail.com', 'forsuperadmin'),
('User Manager', 'User Manager', 'User Manager', 'User Manager', 'User Manager', 'um.erisformsystem@gmail.com', 'forusermanager'),
('End User', 'End User', 'End User', 'End User', 'End User', 'eu.erisformsystem@gmail.com', 'forenduser');

-- --------------------------------------------------------

--
-- Table structure for table `usermanager_logs`
--

CREATE TABLE `usermanager_logs` (
  `accountName` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `add_quantity` int(10) NOT NULL,
  `formDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermanager_logs`
--

INSERT INTO `usermanager_logs` (`accountName`, `stock_number`, `item_description`, `add_quantity`, `formDate`) VALUES
('Mary Lalaine Rachel T. Manguisi', 'OS 054', 'CALCULATOR, compact, 12 digits', 8, '10/06/2023'),
('Mary Lalaine Rachel T. Manguisi', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 3, '10/06/2023'),
('User Manager', 'OS 228', 'Liquid Hand Soap with Pump', 50, '10/09/2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
