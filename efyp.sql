-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2017 at 04:41 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `fypTypeID` int(11) NOT NULL,
  PRIMARY KEY (`announcementID`),
  KEY `fypTypeID` (`fypTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementID`, `title`, `body`, `fypTypeID`) VALUES
(1, 'General Announcements', '• All announcements pertaining to Final Year Project (FYP) will be posted here.\r\n• Students are advised to visit this site regularly for updates', 2),
(2, 'General Information', '• FYP Rules and Regulations for students taking FYP with the same course code for Part I and Part II (VERY IMPORTANT – MUST READ).\r\n• Please take note that in the case of any discrepancies between announcements and guidelines, the   announcements shall prevail.\r\n• It is compulsory for students to follow the FYP Report Guidelines when writing their report. Report that does   not follow the guidelines will be rejected.\r\n• Students are encouraged to download the MS Word Template (Progress Report / Final Report) of the Project  Report and use this template to prepare the report. \r\n• The format for citing sources in the Project Report shall follow the latest Harvard Referencing Style.', 3),
(3, 'IEM Enbloc Briefing January Trimester 2017', 'Wish to know more about becoming a Professional Engineer? Here is the right place for you!!!\r\nJoin us with our Briefing for IEM Enbloc Registration to learn more about IEM graduate membership and its benefits!!\r\nAll graduating engineering students are welcomed!!\r\n\r\n~ Free Admission ~\r\nDate: 10 March 2017 (Friday)\r\nTime: 1 – 2 pm\r\nVenue: KB 322\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '4', 1502600598),
('fypCoordinator', '14', 1502866601),
('fypCoordinator', '18', 1502687360),
('fypCoordinator', '19', 1503236137),
('fypCoordinator', '22', 1503277954),
('fypCoordinator', '4', 1502600598),
('students', '16', 1502600598),
('students', '17', 1502600599),
('students', '20', 1502726653),
('students', '21', 1503125092),
('students', '24', 1503128656),
('students', '25', 1503270557),
('supervisor', '14', 1502866601),
('supervisor', '18', 1502687361),
('supervisor', '19', 1503236137),
('supervisor', '22', 1503277954),
('supervisor', '23', 1503127631);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1502600598, 1502600598),
('allocateTitle', 2, 'Allocate Title', NULL, NULL, 1502600597, 1502600597),
('fypCoordinator', 1, NULL, NULL, NULL, 1502600598, 1502600598),
('manageAnnouncement', 2, 'Manage Announcement', NULL, NULL, 1502600597, 1502600597),
('manageCalendar', 2, 'Manage Calendar', NULL, NULL, 1502600597, 1502600597),
('manageCourse', 2, 'Manage Course', NULL, NULL, 1502600598, 1502600598),
('manageDepartments', 2, 'Manage Departments', NULL, NULL, 1502600598, 1502600598),
('manageDownloads', 2, 'Manage Downloads', NULL, NULL, 1502600598, 1502600598),
('manageFaculty', 2, 'Manage Faculty', NULL, NULL, 1502600598, 1502600598),
('manageFypType', 2, 'Manage FypType', NULL, NULL, 1502600598, 1502600598),
('manageGanttChart', 2, NULL, NULL, NULL, 1502600597, 1502600597),
('manageLogBook', 2, 'Manage Log Book', NULL, NULL, 1502600598, 1502600598),
('manageRoles', 2, 'Manage Roles', NULL, NULL, 1502600598, 1502600598),
('manageStaff', 2, 'Manage Staff', NULL, NULL, 1502600597, 1502600597),
('manageStudents', 2, 'Manage Students', NULL, NULL, 1502600597, 1502600597),
('manageTitle', 2, 'Manage Title', NULL, NULL, 1502600597, 1502600597),
('students', 1, NULL, NULL, NULL, 1502600598, 1502600598),
('supervisor', 1, NULL, NULL, NULL, 1502600598, 1502600598),
('viewAnnouncement', 2, 'View Announcement', NULL, NULL, 1502600597, 1502600597),
('viewCalendar', 2, 'View Calendar', NULL, NULL, 1502600597, 1502600597),
('viewDownloads', 2, 'View Downloads', NULL, NULL, 1502600598, 1502600598),
('viewGanttChart', 2, 'View GanttChart', NULL, NULL, 1502600597, 1502600597),
('viewLogBook', 2, 'View Log Book', NULL, NULL, 1502600598, 1502600598),
('viewStudents', 2, 'View Students', NULL, NULL, 1502600597, 1502600597),
('viewTitle', 2, 'View Title', NULL, NULL, 1502600597, 1502600597);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('supervisor', 'allocateTitle'),
('admin', 'fypCoordinator'),
('fypCoordinator', 'manageAnnouncement'),
('fypCoordinator', 'manageCalendar'),
('admin', 'manageDepartments'),
('fypCoordinator', 'manageDownloads'),
('admin', 'manageFaculty'),
('admin', 'manageFypType'),
('students', 'manageGanttChart'),
('students', 'manageLogBook'),
('admin', 'manageRoles'),
('admin', 'manageStaff'),
('admin', 'manageStudents'),
('fypCoordinator', 'manageTitle'),
('students', 'viewAnnouncement'),
('supervisor', 'viewAnnouncement'),
('students', 'viewCalendar'),
('supervisor', 'viewCalendar'),
('students', 'viewDownloads'),
('supervisor', 'viewDownloads'),
('supervisor', 'viewGanttChart'),
('supervisor', 'viewLogBook'),
('students', 'viewTitle'),
('supervisor', 'viewTitle');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `calendarID` int(11) NOT NULL AUTO_INCREMENT,
  `activities` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `fypTypeID` int(11) NOT NULL,
  PRIMARY KEY (`calendarID`),
  KEY `fypTypeID` (`fypTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendarID`, `activities`, `date`, `fypTypeID`) VALUES
(11, 'FYP Briefing', '2017-05-18', 1),
(12, '\r\nSubmit Hard Copy of FYP Registration Form', '2017-07-21', 2),
(13, '\r\nPresentation of short project proposal & Short Project Proposal Submission (Assignment I)', '2017-07-28', 3),
(14, 'Submit Literature Review Matrix (Assignment II)', '2017-04-11', 4),
(15, 'Mock Test For Harvard Referencing Style', '2017-09-08', 1),
(16, 'Preliminary Report', '2017-07-29', 3),
(17, 'Second Monitoring Counselling Form (Week 12)', '2017-07-20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseID` varchar(40) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`) VALUES
('3E', 'Bachelor of Engineering (Hons) Electrical and Electronic Engineering '),
('AM', 'Bachelor of Science (Hons) Applied Mathematics with Computing '),
('AR', 'Bachelor of Science (Hons) Architecture '),
('CE', 'Bachelor of Information Technology (Hons) Computer Engineering'),
('CL', 'Bachelor of Engineering (Hons) Civil Engineering'),
('CS', 'Bachelor of Computer Science(Hons)'),
('ISE', 'Bachelor of Information Systems (Hons) Information Systems Engineering'),
('ME', 'Bachelor of Engineering (Hons) Mechanical Engineering'),
('QS', 'Bachelor of Science (Hons) Quantity Surveying '),
('SE', 'Bachelor of Science (Hons) Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department` varchar(255) NOT NULL,
  `faculty_fk` int(11) NOT NULL,
  PRIMARY KEY (`department`),
  KEY `faculty_fk` (`faculty_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department`, `faculty_fk`) VALUES
('Department of Chinese Medicine', 1),
('Department of Medicine', 1),
('Department of Nursing', 1),
('Department of Physiotherapy', 1),
('Department of Population Medicine', 1),
('Department of Pre-Clinical Sciences', 1),
('Department of Surgery', 1),
('Department of Accountancy', 2),
('Department of Building and Property Management', 2),
('Department of Economics', 2),
('Department of International Business', 2),
('Department of Architecture & Sustainable Design', 3),
('Department of Chemical Engineering', 3),
('Department of Civil Engineering', 3),
('Department of Electrical & Electronics Engineering', 3),
('Department of Internet Engineering & Computer Science', 3),
('Department of Mathematical & Actuarial Sciences', 3),
('Department of Mechanical & Materials Engineering', 3),
('Department of Mechatronics & Biomedical Engineering', 3),
('Department of Surveying', 3),
('Department of Early Childhood Studies', 4),
('Department of Game Studies', 4),
('Department of General Studies (DGS)', 4),
('Department of Mass Communication', 4),
('Department of Media', 4),
('Department of Modern Languages', 4),
('Department of Multimedia Design and Animation', 4),
('Department of Business', 5),
('Department of Commerce and Accountancy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE IF NOT EXISTS `downloads` (
  `downloadID` int(11) NOT NULL AUTO_INCREMENT,
  `documents` varchar(255) NOT NULL,
  `fypType_ID` int(11) NOT NULL,
  PRIMARY KEY (`downloadID`),
  KEY `fypTypeID` (`fypType_ID`),
  KEY `fypType_ID` (`fypType_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`downloadID`, `documents`, `fypType_ID`) VALUES
(36, 'Permission-Form-2.doc', 2),
(37, 'FINAL-FYP1.docx', 3),
(38, 'FYP_Log_book.docx', 4),
(39, 'FYP_Rules_and_Regulations-DIECS-R0.pdf', 2),
(40, 'script.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyID` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(255) NOT NULL,
  PRIMARY KEY (`facultyID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `faculty`) VALUES
(1, 'Faculty of Medicine and Health Sciences(FMHS)'),
(2, 'Faculty of Accountancy and Management(FAM)'),
(3, 'Lee Kong Chian Faculty of Engineering and Science(LKC FES)'),
(4, 'Faculty of Creative Industries(FCI)'),
(5, 'Faculty of Business and Finance(FBF)'),
(6, 'Faculty of Information and Communication Technology(FICT)'),
(7, 'Faculty of Science(FSc)'),
(8, 'Faculty of Engineering and Green Technology'),
(9, 'Faculty of Arts and Social Science(FAS)');

-- --------------------------------------------------------

--
-- Table structure for table `fyptype`
--

DROP TABLE IF EXISTS `fyptype`;
CREATE TABLE IF NOT EXISTS `fyptype` (
  `fypID` int(11) NOT NULL AUTO_INCREMENT,
  `fypType` varchar(255) NOT NULL,
  PRIMARY KEY (`fypID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fyptype`
--

INSERT INTO `fyptype` (`fypID`, `fypType`) VALUES
(1, 'Project 1 Students'),
(2, 'Project 2 Students'),
(3, 'Part 1 Students'),
(4, 'Part 2 Students');

-- --------------------------------------------------------

--
-- Table structure for table `ganttchart`
--

DROP TABLE IF EXISTS `ganttchart`;
CREATE TABLE IF NOT EXISTS `ganttchart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `datecompletion` date NOT NULL,
  `studentID_fk` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studentID_fk` (`studentID_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ganttchart`
--

INSERT INTO `ganttchart` (`id`, `activity`, `start`, `end`, `datecompletion`, `studentID_fk`) VALUES
(2, 'Project Planning', 1, 2, '2017-08-09', '1406354'),
(5, 'Requirement Gathering', 2, 5, '2017-08-19', '1406354'),
(6, 'Preliminary Report', 6, 8, '2017-08-17', '1406354'),
(7, 'Proposal Report', 8, 9, '2017-08-24', '1406354'),
(10, 'aaa', 2, 6, '2017-08-15', '1406354');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

DROP TABLE IF EXISTS `logbook`;
CREATE TABLE IF NOT EXISTS `logbook` (
  `logbookID` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) NOT NULL,
  `logbookactivity` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `acknowledgement` tinyint(4) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `student_fk` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`logbookID`),
  KEY `student_fk` (`student_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logbookID`, `week`, `logbookactivity`, `files`, `acknowledgement`, `comment`, `student_fk`) VALUES
(13, 2, '•     Online Research on the tools to use\r\n•     Gather Requirements\r\n•     Interview with clients\r\n•     Study on management system', 'FYP1_Log-book.doc', 1, NULL, '1406354'),
(14, 4, ' •     Online Research on the tools to use\r\n  •     Gather Requirements\r\n  •     Interview with clients\r\n  •     Study on management system', '', 1, NULL, '1406354'),
(15, 6, ' •     Online Research on the tools to use\r\n  •     Gather Requirements\r\n  •     Interview with clients\r\n  •     Study on management system', '', 2, 'on schedule', '1406354'),
(16, 8, 'aaa', 'script.docx', 1, NULL, '1406354'),
(17, 10, 'xxxxxxxxxx', '', 0, '', '1406354');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1502177243),
('m140506_102106_rbac_init', 1502177251);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `due` datetime NOT NULL,
  `course` varchar(255) NOT NULL,
  `fyptype` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department` (`course`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `start`, `due`, `course`, `fyptype`) VALUES
(2, 'Progress Report', '2017-08-15 13:00:00', '2017-08-16 13:00:00', 'SE', 2),
(3, 'Poster', '2017-08-16 17:45:00', '2017-08-23 17:45:00', 'SE', 1),
(4, 'FYP Report', '2017-08-15 18:05:00', '2017-08-17 17:05:00', 'SE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reportsubmission`
--

DROP TABLE IF EXISTS `reportsubmission`;
CREATE TABLE IF NOT EXISTS `reportsubmission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report` varchar(255) NOT NULL,
  `submissiondate` datetime NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `files` varchar(255) NOT NULL,
  `courseID` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportsubmission`
--

INSERT INTO `reportsubmission` (`id`, `report`, `submissiondate`, `student_id`, `files`, `courseID`) VALUES
(5, 'Poster', '2017-08-15 23:13:52', '1406354', 'FYP1_Log-book.doc', 'SE'),
(6, 'FYP Report', '2017-08-21 01:29:12', '1406354', 'script.docx', 'SE');

-- --------------------------------------------------------

--
-- Table structure for table `responsible`
--

DROP TABLE IF EXISTS `responsible`;
CREATE TABLE IF NOT EXISTS `responsible` (
  `scheduleID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `roles` varchar(255) NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roles`) VALUES
(1, 'Admin\r\n'),
(2, 'FYP Coordinator'),
(3, 'Lecturers (Supervisors/Co-supervisors/Moderators)');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_fk` int(11) NOT NULL,
  `departments_fk` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`userID`),
  KEY `faculty_fk` (`faculty_fk`),
  KEY `departments_fk` (`departments_fk`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `userID`, `role`, `name`, `faculty_fk`, `departments_fk`, `email`, `contactNo`) VALUES
(26, 'admin', '1,2', 'Dr Stella', 4, 'Department of Chemical Engineering', 'stella@utar.my', '1111111111111'),
(37, '123456', '3,2', 'Chan Kok Leong', 3, 'Department of Chemical Engineering', 'chankokleong@utar.my', '1111111111111'),
(38, '111', '2,3', 'Hoo Mei Hao', 3, 'Department of Internet Engineering & Computer Science', 'hmhao@1utar.my', '1111111111111'),
(39, '000', '3,2', 'Chean Swee Ling', 3, 'Department of Internet Engineering & Computer Science', 'cheansweeling@utar.my', '1111111111111'),
(40, '222', '3,2', 'Madhavan Nair', 3, 'Department of Internet Engineering & Computer Science', 'madhavan@1utar.my', '0123456789'),
(41, '333', '3', 'Lim Khong Leng', 3, 'Department of Internet Engineering & Computer Science', 'lim@1utar.my', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `name` varchar(255) NOT NULL,
  `race` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `faculty` int(11) NOT NULL,
  `course` varchar(40) NOT NULL,
  `fypType` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `studentID` (`studentID`),
  KEY `fypType` (`fypType`),
  KEY `faculty` (`faculty`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `race`, `gender`, `faculty`, `course`, `fypType`, `picture`, `studentID`, `email`, `phone`) VALUES
('Elaine Tan', 1, 1, 3, 'SE', 3, 'Capture.png', '120123', 'elaine@1utar.edu.my', '111111111'),
('Lee Jia Hui', 1, 1, 3, 'SE', 2, 'Capture.png', '1304607', 'leeus99@1utar.my', '0111233345'),
('Toh Wan Ching', 1, 1, 3, 'SE', 1, 'Capture.png', '1406123', 'twching@1utar.com.my', '0111233345'),
('Tan Ai Chia', 1, 1, 3, 'SE', 1, 'Capture.png', '1406354', 'actan5652@gmail.com', '011-2234567'),
('Wong Zi Xin', 1, 1, 3, 'QS', 4, 'Capture.png', '150123', 'zixin@1utar.edu.my', '0123456789'),
('Raymond Tan', 1, 0, 3, 'QS', 3, 'Capture.png', '150456', 'raymond@1utar.edu.my', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
CREATE TABLE IF NOT EXISTS `title` (
  `titleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `faculty` int(11) NOT NULL,
  `departments` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `equipment` text NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `supervisor` int(11) NOT NULL,
  `coSupervisor` int(11) DEFAULT NULL,
  `moderator` int(11) DEFAULT NULL,
  `student_fk` varchar(20) DEFAULT NULL,
  `requirements` text NOT NULL,
  `industrialLinks` text NOT NULL,
  `commProjects` text NOT NULL,
  PRIMARY KEY (`titleID`),
  KEY `departments` (`departments`),
  KEY `course` (`course`),
  KEY `supervisor` (`supervisor`),
  KEY `coSupervisor` (`coSupervisor`),
  KEY `moderator` (`moderator`),
  KEY `student_fk` (`student_fk`),
  KEY `faculty` (`faculty`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`titleID`, `title`, `batch`, `category`, `faculty`, `departments`, `descriptions`, `equipment`, `course`, `status`, `supervisor`, `coSupervisor`, `moderator`, `student_fk`, `requirements`, `industrialLinks`, `commProjects`) VALUES
(26, 'Web-based/ android based numismatic management system', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', 'A web-based/ android-based management system for collectors to maintain their notes/ coins collection.\r\n\r\nExpected deliverables (not limited to the following):\r\n- item record\r\n- item search\r\n- appreciation/ depreciation calculation of items', 'Personal Computer, Android Phone', 'SE,CE', 1, 37, NULL, NULL, '1406354', '', '', ''),
(31, 'UTAR Bus Tracker', 'January 2017', 3, 3, 'Department of Internet Engineering & Computer Science', ' The purpose of the system is to allow users to plan and book fully customized tour packages according to\r\n\r\n                                                        user\'s requirement such as budget, destination, number of days of visitation etc, in a tour and travel agency.             \r\n\r\n                                                        Scope: countries in Southeast Asia\r\n\r\n                                                        Expected deliverables (not limited to the following):\r\n\r\n                                                         - item record\r\n\r\n                                                         - item search\r\n\r\n                                                         - appreciation/ depreciation calculation of items', 'Android Device', 'SE,CE,QS', 0, 39, NULL, NULL, NULL, '', '', ''),
(44, 'Gated Residential Security Management Mobile Assistant ', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', 'he purpose of the system is to allow users to plan and book fully customized tour packages according to\r\n\r\nuser\'s requirement such as budget, destination, number of days of visitation etc, in a tour and travel agency.\r\n\r\nScope: countries in Southeast Asia\r\n\r\nExpected deliverables (not limited to the following):\r\n\r\n- item record\r\n\r\n- item search\r\n\r\n- appreciation/ depreciation calculation of items', '	Android Device', 'SE', 1, 38, NULL, 41, '1406123', '', '', ''),
(46, 'MyUTAR IOS-based MobileApp', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', '	A web-based/ android-based management system for collectors to maintain their notes/ coins collection.\r\n\r\nExpected deliverables (not limited to the following):\r\n- item record\r\n- item search\r\n- appreciation/ depreciation calculation of items', '	Android Phone', 'SE,', 0, 38, 39, NULL, NULL, '', '', ''),
(47, '	A Study on Wireless Sensor Network Routing Protocols', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', 'he purpose of the system is to allow users to plan and book fully customized tour packages according to\r\n\r\nuser\'s requirement such as budget, destination, number of days of visitation etc, in a tour and travel agency.\r\n\r\nScope: countries in Southeast Asia\r\n\r\nExpected deliverables (not limited to the following):\r\n\r\n- item record\r\n\r\n- item search\r\n\r\n- appreciation/ depreciation calculation of items', '	Laptop', 'SE', 0, 40, NULL, NULL, NULL, '', '', ''),
(48, 'Gated Residential Security Management Mobile Assistant ', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', 'he purpose of the system is to allow users to plan and book fully customized tour packages according to\r\n\r\nuser\'s requirement such as budget, destination, number of days of visitation etc, in a tour and travel agency.\r\n\r\nScope: countries in Southeast Asia\r\n\r\nExpected deliverables (not limited to the following):\r\n\r\n- item record\r\n\r\n- item search\r\n\r\n- appreciation/ depreciation calculation of items', 'Android Device', 'SE,', 0, 38, 39, NULL, NULL, '', '', ''),
(49, 'Android-based Personalised travel package for Southeast Asia', 'January 2017', 1, 3, 'Department of Internet Engineering & Computer Science', 'The purpose of the system is to allow users to plan and book fully customized tour packages according to\r\nuser\'s requirement such as budget, destination, number of days of visitation etc, in a tour and travel agency.\r\nScope: countries in Southeast Asia\r\nExpected deliverables (not limited to the following):\r\n- item record\r\n- item search\r\n- appreciation/ depreciation calculation of items', 'Android Device', 'SE', 1, 37, 38, NULL, '1304607', '', '', ''),
(50, 'abcde', 'January 2018', 1, 3, 'Department of Internet Engineering & Computer Science', 'testing1', 'testing2', 'SE', 0, 40, NULL, 37, NULL, 'testing3', 'testing4', 'testing5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1,2'),
(14, '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '3,2'),
(16, '1406354', '183aecfddb3334dc4104e50b7af2c5e41e3639bd', '4'),
(17, '1304607', 'bb8f59e428a5b069c60512bb22205d56d2b56f5d', '4'),
(18, '111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2,3'),
(19, '000', '8aefb06c426e07a0a671a1e2488b4858d694a730', '3,2'),
(20, '1406123', '17a178ca342907be819bcc4e827c8c3e083b17dc', '4'),
(21, '150456', 'a1723255cd58a4ff900e7c26feb9d5eb6bec4629', '4'),
(22, '222', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', '3,2'),
(23, '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', '3'),
(24, '150123', '0c634ea296c0f9c329e22af6f0390f7a90f95de3', '4'),
(25, '120123', '237ad2acc84c1c951f4c868bb87a2aa79dfc72a8', '4');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `fypTypeID` FOREIGN KEY (`fypTypeID`) REFERENCES `fyptype` (`fypID`);

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `fypType_ID` FOREIGN KEY (`fypType_ID`) REFERENCES `fyptype` (`fypID`);

--
-- Constraints for table `ganttchart`
--
ALTER TABLE `ganttchart`
  ADD CONSTRAINT `studentID_fk` FOREIGN KEY (`studentID_fk`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `studentID_lbfk` FOREIGN KEY (`student_fk`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `course_fk` FOREIGN KEY (`course`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `faculty_fk` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `fypTypefk` FOREIGN KEY (`fypType`) REFERENCES `fyptype` (`fypID`);

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `fyptype` (`fypID`),
  ADD CONSTRAINT `departments` FOREIGN KEY (`departments`) REFERENCES `departments` (`department`),
  ADD CONSTRAINT `faculty` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`facultyID`),
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`student_fk`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
