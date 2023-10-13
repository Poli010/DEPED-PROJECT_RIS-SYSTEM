-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2023 at 03:48 AM
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
('Chloride Powder', 'OS 255', 'piece', 60),
('Mouse Pad', 'OS 290', 'piece', 62),
('Battery D Alkaline', 'OS 156', 'piece', 20),
('Photo Paper', 'OS 146', 'piece', 74),
('BROOM, soft (tambo)', 'OS 202', 'piece', 24),
('EPSON, INK CART, (001) Black', 'OS 238', 'bottle', 73),
('AIR FRESHENER, aerosol, 280ml/150g min', 'OS 154', 'can', 210),
('CALCULATOR, compact, 12 digits', 'OS 054', 'unit', 55),
('ENVELOPE, EXPANDING legal size doc', 'OS 117', 'piece', 76),
('Extension Cord', 'OS 092', 'piece', 87),
('Frame A4 Size', 'OS 271', 'piece', 80),
('PAPER, MULTICOPY, 80gsm, size: A4', 'OS 033', 'Reams', 80),
('NOTE PAD, stick on, (2in x 3in) min', 'OS 317', 'Book', 79),
('MOUSE, WIRELESS, USB', 'OS 370', 'Unit', 93),
('Manila Paper', 'OS 292', 'Piece', 58),
('MARKER, PERMANENT,blue', 'OS 213', 'Piece', 83),
('MOPHANDLE, heavy duty, aluminum, screw type', 'OS 361', 'Book', 80),
('Gestener toner MP2014', 'OS 232', 'Piece', 92),
('Liquid Hand Soap with Pump', 'OS 228', 'Book', 73),
('Ring Binder 1/4', 'OS 642', 'Piece', 65);

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
(882472, 2023, 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'S1', 'Schools Division Superintendent', 'OS 238', 'EPSON, INK CART, (001) Black', 'bottle', 2, 'dada', '10/12/2023'),
(882472, 2023, 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'S1', 'Schools Division Superintendent', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 1, 'dada', '10/12/2023'),
(390562, 2023, 'Jhon Artin Victoriano', 'Admin Aide VI', 'P2', 'Property and Supply', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 2, 'TEST 1', '10/12/2023'),
(390562, 2023, 'Jhon Artin Victoriano', 'Admin Aide VI', 'P2', 'Property and Supply', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 3, 'TEST 1', '10/12/2023'),
(390562, 2023, 'Jhon Artin Victoriano', 'Admin Aide VI', 'P2', 'Property and Supply', 'OS 202', 'BROOM, soft (tambo)', 'piece', 3, 'TEST 1', '10/12/2023'),
(793411, 2023, 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'A1', 'Assistant Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 3, 'TEST 2', '10/12/2023'),
(793411, 2023, 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'A1', 'Assistant Schools Division Superintendent', 'OS 092', 'Extension Cord', 'piece', 3, 'TEST 2', '10/12/2023');

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
('2023-10-000001', 2023, 1, '2023-10-09 11:13:34', 'Jhon Artin Victoriano', 'P2', 'Property and Supply', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, '10/09/2023', '10/09/2023'),
('2023-10-000001', 2023, 1, '2023-10-09 11:13:34', 'Jhon Artin Victoriano', 'P2', 'Property and Supply', 'OS 642', 'Ring Binder 1/4', 'Piece', 5, '10/09/2023', '10/09/2023'),
('2023-10-000002', 2023, 2, '2023-10-09 16:16:31', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 4, '10/09/2023', '10/09/2023'),
('2023-10-000002', 2023, 2, '2023-10-09 16:16:31', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 5, '10/09/2023', '10/09/2023'),
('2023-10-000002', 2023, 2, '2023-10-09 16:16:31', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 146', 'Photo Paper', 'piece', 5, '10/09/2023', '10/09/2023'),
('2023-10-000003', 2023, 3, '2023-10-11 15:51:59', 'Jhon Artin Victoriano', 'P2', 'Property and Supply', 'OS 156', 'Battery D Alkaline', 'piece', 5, '10/09/2023', '10/11/2023'),
('2023-10-000003', 2023, 3, '2023-10-11 15:51:59', 'Jhon Artin Victoriano', 'P2', 'Property and Supply', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 5, '10/09/2023', '10/11/2023'),
('2023-10-000004', 2023, 4, '2023-10-12 09:24:20', 'Janette Sta. Maria', 'S2', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, '10/11/2023', '10/12/2023'),
('2023-10-000004', 2023, 4, '2023-10-12 09:24:20', 'Janette Sta. Maria', 'S2', 'Schools Division Superintendent', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 4, '10/11/2023', '10/12/2023'),
('2023-10-000004', 2023, 4, '2023-10-12 09:24:20', 'Janette Sta. Maria', 'S2', 'Schools Division Superintendent', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 2, '10/11/2023', '10/12/2023'),
('2023-10-000005', 2023, 5, '2023-10-12 09:27:20', 'Kelly Rose T. Zipagan', 'A2', 'Assistant Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 5, '10/11/2023', '10/12/2023'),
('2023-10-000005', 2023, 5, '2023-10-12 09:27:20', 'Kelly Rose T. Zipagan', 'A2', 'Assistant Schools Division Superintendent', 'OS 232', 'Gestener toner MP2014', 'Piece', 4, '10/11/2023', '10/12/2023'),
('2023-10-000005', 2023, 5, '2023-10-12 09:27:20', 'Kelly Rose T. Zipagan', 'A2', 'Assistant Schools Division Superintendent', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 3, '10/11/2023', '10/12/2023'),
('2023-10-000006', 2023, 6, '2023-10-12 09:29:03', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 2, '10/12/2023', '10/12/2023'),
('2023-10-000006', 2023, 6, '2023-10-12 09:29:03', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 255', 'Chloride Powder', 'piece', 2, '10/12/2023', '10/12/2023'),
('2023-10-000006', 2023, 6, '2023-10-12 09:29:03', 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 2, '10/12/2023', '10/12/2023'),
('2023-10-000007', 2023, 7, '2023-10-13 08:46:27', 'Mark Austin B. Condalor', 'I3', 'Information Communications Technology', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 4, '10/13/2023', '10/13/2023'),
('2023-10-000007', 2023, 7, '2023-10-13 08:46:27', 'Mark Austin B. Condalor', 'I3', 'Information Communications Technology', 'OS 156', 'Battery D Alkaline', 'piece', 3, '10/13/2023', '10/13/2023'),
('2023-10-000007', 2023, 7, '2023-10-13 08:46:27', 'Mark Austin B. Condalor', 'I3', 'Information Communications Technology', 'OS 255', 'Chloride Powder', 'piece', 3, '10/13/2023', '10/13/2023'),
('2023-10-000007', 2023, 7, '2023-10-13 08:46:27', 'Mark Austin B. Condalor', 'I3', 'Information Communications Technology', 'OS 271', 'Frame A4 Size', 'piece', 5, '10/13/2023', '10/13/2023');

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
('Super Admin', 'Ma. Theresa M. Roxas', 'Supply Officer II', 'Property and Supply', 'P1', 'mtheresa.roxas@deped.gov.ph', '1234'),
('User Manager', 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'Property and Supply', 'P3', 'marylalainemanguisi@deped.gov.ph', '1234'),
('End User', 'Jhon Artin Victoriano', 'Admin Aide VI', 'Property and Supply', 'P2', 'jhonartin.victoriano@deped.gov.ph', '1234'),
('End User', 'John Mark A. Manguisi', 'Admin Aide I', 'Property and Supply', 'P4', 'johnmark.manguisi@deped.gov.ph', '1234'),
('End User', 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'Schools Division Superintendent', 'S1', 'ericson.sabacan001@deped.gov.ph', '1234'),
('End User', 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'Assistant Schools Division Superintendent', 'A1', 'jaime.tugade@deped.gov.ph', '1234'),
('End User', 'Janette Sta. Maria', 'ADAS III', 'Schools Division Superintendent', 'S2', 'janette.stamaria@deped.gov.ph', '1234'),
('End User', 'Orsely Joyce Gonzales', 'Admin Aide VI', 'Schools Division Superintendent', 'S3', 'orselyjoyce.gonzales@deped.gov.ph', '1234'),
('End User', 'Rodelio Jimenez', 'Admin Aide IV - Driver', 'Schools Division Superintendent', 'S4', 'rodelio.jimenez001@deped.gov.ph', '1234'),
('End User', 'Emilio G. Bernardo Jr.', 'Admin Aide IV - Driver', 'Schools Division Superintendent', 'S5', 'emilio.bernardo@deped.gov.ph', '1234'),
('End User', 'Kelly Rose T. Zipagan', 'Admin Aide I', 'Assistant Schools Division Superintendent', 'A2', 'kelly.zipagan@deped.gov.ph', '1234'),
('End User', 'Kaila R. Diaz', 'Admin Aide I', 'Assistant Schools Division Superintendent', 'A3', 'kaila.diaz@deped.gov.ph', '1234'),
('End User', 'Kristine Joy D. Quezada', 'Accountant III', 'Accounting', 'AC1', 'kristinejoy.quezada@deped.gov.ph', '1234'),
('End User', 'Rechie O. Labandria', 'ADAS II', 'Accounting', 'AC2', 'rechie.labandria@deped.gov.ph', '1234'),
('End User', 'Mercedez M. Bijasa', 'ADAS III', 'Accounting', 'AC3', 'mercedez.bijasa@deped.gov.ph', '1234'),
('End User', 'Jomel V. Policarpio', 'ADAS II', 'Accounting', 'AC4', 'jomel.policarpio@deped.gov.ph', '1234'),
('End User', 'Rommel S. Pascual', 'ADAS III', 'Accounting', 'AC5', 'rommel.pascual002@deped.gov.ph', '1234'),
('End User', 'Imelda Bijasa', 'ADAS II', 'Accounting', 'AC6', 'imelda.bijasa@deped.gov.ph', '1234'),
('End User', 'Jinky O. Torres', 'ADAS III', 'Accounting', 'AC7', 'jinky.torres@deped.gov.ph', '1234'),
('End User', 'Thelma C. Bajar', 'ADAS III', 'Accounting', 'AC8', 'thelma.bajar@deped.gov.ph', '1234'),
('End User', 'Anne Melfei Casas', 'ADAS III', 'Accounting', 'AC9', 'annmelfei.casas@deped.gov.ph', '1234'),
('End User', 'Laarnie I. Catahan', 'ADAS II', 'Accounting', 'AC10', 'laarnie.catahan@deped.gov.ph', '1234'),
('End User', 'Ma. Beverlie J. Nolasco', 'ADAS II', 'Accounting', 'AC11', 'mabeverlie.jabat@deped.gov.ph', '1234'),
('End User', 'Nenette M. Gomez', 'ADAS III', 'Accounting', 'AC12', 'nenette.gomez@deped.gov.ph', '1234'),
('End User', 'Gina E. Cape', 'ADAS II', 'Accounting', 'AC13', 'gina.cape@deped.gov.ph', '1234'),
('End User', 'Ravenn Tiu', 'Admin Aide I', 'Accounting', 'AC14', 'ravenn.tiu@deped.gov.ph', '1234'),
('End User', 'Maxima L. Biglangawa', 'ADAS III', 'Accounting', 'AC15', 'maxima.biglangawa@deped.gov.ph', '1234'),
('End User', 'Rosalinda F. Perfinan', 'ADAS II', 'Accounting', 'AC16', 'krosalinda.perfinan@deped.gov.ph', '1234'),
('End User', 'Baby Ruth Pablo', 'ADAS II', 'Accounting', 'AC17', 'babyruth.pablo@deped.gov.ph', '1234'),
('End User', 'Orlando D. Gonzales', 'Budget Officer', 'Budget', 'B1', 'orlando.gonzales002@deped.gov.ph', '1234'),
('End User', 'Lalaine Bartolome', 'ADAS II', 'Budget', 'B2', 'lalaine.mendoza003@deped.gov.ph', '1234'),
('End User', 'Ma. Carmela P. Hagosojos', 'ADAS I', 'Budget', 'B3', 'macarmela.hagosojos@deped.gov.ph', '1234'),
('End User', 'Yancy B. Razon', 'ADAS II', 'Budget', 'B4', 'yancy.razon@deped.gov.ph', '1234'),
('End User', 'Eluisa L. Icang', 'ADAS III', 'Payroll', 'PAY1', 'eluisa.icang@deped.gov.ph', '1234'),
('End User', 'Rowena R. Perez', 'AO I', 'Payroll', 'PAY2', 'rowena.perez016@deped.gov.ph', '1234'),
('End User', 'May L. Ladao', 'ADAS III', 'Payroll', 'PAY3', 'may.ladao@deped.gov.ph', '1234'),
('End User', 'Glaiza P. Alejandro', 'ADAS III', 'Payroll', 'PAY4', 'glaiza.alejandro@deped.gov.ph', '1234'),
('End User', 'Mariz DR. Daluz', 'ADAS III', 'Payroll', 'PAY5', 'mariz.daluz@deped.gov.ph', '1234'),
('Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'sa.erisformsystem@gmail.com', 'superAdminOnly'),
('User Manager', 'User Manager', 'User Manager', 'User Manager', 'User Manager', 'um.erisformsystem@gmail.com', 'userManagerOnly'),
('End User', 'Arthur F. Francisco', 'ITO-I', 'Information Communication Technology', 'I1', 'arthur.francisco@deped.gov.ph', '1234'),
('End User', 'Jayson Fuller', 'ICT-AAI', 'Information Communication Technology', 'I2', 'jayson.fuller@deped.gov.ph', '1234'),
('End User', 'Merlita D. Ynciong', 'SEP SOC. MOB.', 'School Governance and Operations Division', 'SGOD7', 'merlita.ynciong@deped.gov.ph', '1234'),
('End User', 'Margie M. Duro', 'PDO I', 'School Governance and Operations Division', 'SGOD16', 'margie.duro@deped.gov.ph', '1234'),
('End User', 'Marlon P. Daclis', 'EPS I - English', 'Curriculum Implementation Division', 'CID6', 'marlon.daclis@deped.gov.ph', '1234'),
('End User', 'End User', 'End User', 'End User', 'End User', 'eu.erisformsystem@gmail.com', '1234'),
('End User', 'Angelo Y. Capa', '', '', '', 'angelo.capa@deped.gov.ph', '1234'),
('Super Admin', 'Ivan Policarpio', 'Developer', 'Information Communications Technology', 'IT 1', 'ivanpolicarpio@deped.gov.ph', 'Admin123'),
('End User', 'Mark Austin B. Condalor', 'OJT - ICT', 'Information Communications Technology', 'I3', 'mark.austincondalor@deped.gov.ph', '1234');

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
('Mary Lalaine Rachel T. Manguisi', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 3, '10/06/2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
