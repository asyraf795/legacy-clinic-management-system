-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 02:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE IF NOT EXISTS `admintable` (
  `userID` varchar(25) NOT NULL,
  `userRealName` varchar(50) NOT NULL,
  `userEmail` varchar(70) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`userID`, `userRealName`, `userEmail`) VALUES
('B01150003', 'Danial 2', 'DanialHebat2@yahoo.com'),
('B02140007', 'MOHAMMAD AMAR IRFAN', 'chocobokupo@gmail.com'),
('B08150003', 'Danial 5', 'DanialHebat5@yahoo.com'),
('superadmin', 'SUPER ADMIN', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttable`
--

CREATE TABLE IF NOT EXISTS `appointmenttable` (
  `patientID` varchar(25) NOT NULL,
  `userID` varchar(25) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentStatus` char(10) NOT NULL,
  PRIMARY KEY (`patientID`,`userID`,`appointmentDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billtable`
--

CREATE TABLE IF NOT EXISTS `billtable` (
  `billID` char(11) NOT NULL,
  `billStatus` char(15) NOT NULL,
  `billTotal` float(11,2) NOT NULL,
  `prescriptionTotal` float(11,2) NOT NULL,
  `checkUpTotal` float(11,2) NOT NULL,
  PRIMARY KEY (`billID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billtable`
--

INSERT INTO `billtable` (`billID`, `billStatus`, `billTotal`, `prescriptionTotal`, `checkUpTotal`) VALUES
('1', 'paid', 40.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `doctortable`
--

CREATE TABLE IF NOT EXISTS `doctortable` (
  `userID` varchar(25) NOT NULL,
  `userRealName` varchar(50) NOT NULL,
  `userEmail` varchar(70) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctortable`
--

INSERT INTO `doctortable` (`userID`, `userRealName`, `userEmail`) VALUES
('asd', 'qwe', 'qwe'),
('asyraf795', 'asdfas', 'dasfdsf'),
('B01140018', 'MOHAMMAD ASYRAF BIN ISMAIL', 'beta.asyraf95@yahoo.com'),
('B02150003', 'Danial', 'DanialHebat@yahoo.com'),
('B07150003', 'danial lagi 4', 'DanialHebatLagi4@yahoo.com'),
('Danial 3', 'B05150003', 'DanialHebat3@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `drugtable`
--

CREATE TABLE IF NOT EXISTS `drugtable` (
  `drugID` char(25) NOT NULL,
  `drugName` varchar(250) NOT NULL,
  `drugDose` varchar(25) NOT NULL,
  `drugForm` varchar(25) NOT NULL,
  `drugQuantity` int(11) NOT NULL,
  `drugPrice` float(11,2) NOT NULL,
  PRIMARY KEY (`drugID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugtable`
--

INSERT INTO `drugtable` (`drugID`, `drugName`, `drugDose`, `drugForm`, `drugQuantity`, `drugPrice`) VALUES
('ME1231221fjlf', 'PARAFORM', '50ml', 'liquid', 400, 5.00),
('MS0007', 'PANADOL', '560mg', 'Tablet', 377, 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `medicaltable`
--

CREATE TABLE IF NOT EXISTS `medicaltable` (
  `medicalID` int(6) NOT NULL,
  `patientID` varchar(25) NOT NULL,
  `medicalDate` date NOT NULL,
  `userID` varchar(25) NOT NULL,
  `medicalDescription` varchar(250) NOT NULL,
  PRIMARY KEY (`medicalID`,`patientID`,`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicaltable`
--

INSERT INTO `medicaltable` (`medicalID`, `patientID`, `medicalDate`, `userID`, `medicalDescription`) VALUES
(76, 'dfasdf', '2015-12-17', 'asdf', 'sadf'),
(77, '950723115119', '2016-01-02', 'asd', ''),
(78, '950723115119', '2016-01-03', 'asd', 'sakit hati');

-- --------------------------------------------------------

--
-- Table structure for table `patienttable`
--

CREATE TABLE IF NOT EXISTS `patienttable` (
  `patientID` varchar(25) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `patientAge` int(3) NOT NULL,
  `patientGender` char(1) NOT NULL,
  `patientHeight` float(11,2) NOT NULL,
  `patientWeigth` float(11,2) NOT NULL,
  `patientAddress` varchar(250) NOT NULL,
  `patientDescription` varchar(250) NOT NULL,
  `patientBloodType` char(2) NOT NULL,
  `patientMobile` char(15) NOT NULL,
  `patientEmergency` char(15) NOT NULL,
  `patientHome` char(15) NOT NULL,
  `patientOccupation` varchar(25) NOT NULL,
  `patientBirthDate` int(11) NOT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienttable`
--

INSERT INTO `patienttable` (`patientID`, `patientName`, `patientAge`, `patientGender`, `patientHeight`, `patientWeigth`, `patientAddress`, `patientDescription`, `patientBloodType`, `patientMobile`, `patientEmergency`, `patientHome`, `patientOccupation`, `patientBirthDate`) VALUES
('950723115119', 'acap', 20, 'M', 1.70, 20.00, 'taman ehsan', 'STREESSSS', 'O-', '9103', '3204', '3204', '34', 1995),
('dfasdf', '', 0, '', 0.00, 0.00, '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacisttable`
--

CREATE TABLE IF NOT EXISTS `pharmacisttable` (
  `userID` varchar(25) NOT NULL,
  `userRealName` varchar(50) NOT NULL,
  `userEmail` varchar(70) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacisttable`
--

INSERT INTO `pharmacisttable` (`userID`, `userRealName`, `userEmail`) VALUES
('B03150003', 'danial lagi', 'DanialHebatLagi@yahoo.com'),
('B06150003', 'DANIAL LAGI 3GGDDFJKLLLT', 'DanialHebatLagi3@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptiontable`
--

CREATE TABLE IF NOT EXISTS `prescriptiontable` (
  `medicalID` int(6) NOT NULL,
  `drugID` varchar(25) NOT NULL,
  `patientID` varchar(25) NOT NULL,
  `billID` varchar(11) NOT NULL,
  `prescriptionQuantity` int(11) NOT NULL,
  `prescriptionDescription` varchar(100) NOT NULL,
  `prescriptionStatus` char(12) NOT NULL,
  PRIMARY KEY (`medicalID`,`drugID`,`patientID`,`billID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptiontable`
--

INSERT INTO `prescriptiontable` (`medicalID`, `drugID`, `patientID`, `billID`, `prescriptionQuantity`, `prescriptionDescription`, `prescriptionStatus`) VALUES
(76, 'MS0007', '950723115119', '1', 0, '5', 'not received'),
(78, 'MS0007', '950723115119', '12', 12, '12', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `receptionisttable`
--

CREATE TABLE IF NOT EXISTS `receptionisttable` (
  `userID` varchar(25) NOT NULL,
  `userRealName` varchar(50) NOT NULL,
  `userEmail` varchar(70) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionisttable`
--

INSERT INTO `receptionisttable` (`userID`, `userRealName`, `userEmail`) VALUES
('B04150003', 'Danial lagi 2', 'DanialHebatLagi2@yahoo.com'),
('B05150003', 'Danial 4', 'DanialHebat4@yahoo.com'),
('B08391011', 'MOHAMMAD AMIR ZULFADHLI BIN ISMAIL', 'm.amir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `userID` varchar(25) NOT NULL,
  `userPass` varchar(250) NOT NULL,
  `userDomain` char(15) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userID`, `userPass`, `userDomain`) VALUES
('asyraf795', 'asdfds', 'doctor'),
('B01150003', '71621bd157be06fdf2d55527bb7ad5a3', 'admin'),
('B02150003', '96bd09f486f7313fb6be8f860e623441', 'doctor'),
('B03150003', '7cc2d792607924592c4db3c07a019ea4', 'pharmacist'),
('B04150003', '810975cebc708c22c14b86eb353e5f96', 'receptionist'),
('B05150003', '61a4e3a0c97c53cdb13e8d10d4ce330e', 'receptionist'),
('B06150003', 'cb27dab97d028c3b14242aa273d8c43a', 'pharmacist'),
('B07150003', '912e29c34675dd8f00bdb862c8d67122', 'doctor'),
('B08150003', 'b1a8ec2dd1a24009d23c1658c2840896', 'admin'),
('Danial 3', '14cceff4e4654e50500de074e6c965f1', 'doctor'),
('superadmin', 'ac497cfaba23c4184cb03b97e8c51e0a', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
