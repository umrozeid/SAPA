-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 02:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapa`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements`
(
    `id`           int(11)       NOT NULL,
    `url`          varchar(2000) NOT NULL,
    `imageName`    varchar(255)  NOT NULL,
    `creationTime` datetime DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events`
(
    `id`          int(11)       NOT NULL,
    `title`       varchar(1000) NOT NULL,
    `start_event` datetime      NOT NULL,
    `end_event`   datetime      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`)
VALUES (10, 'Tala', '2020-04-07 21:58:00', '2020-04-07 21:58:00'),
       (11, 'second', '2020-04-13 03:00:00', '2020-05-01 17:00:00'),
       (12, 'zaz', '2020-05-05 07:30:00', '2020-05-05 12:30:00'),
       (14, 'Tala', '2020-05-06 08:30:00', '2020-05-06 12:00:00'),
       (15, 'Tala', '2020-04-24 02:06:00', '2020-04-24 03:06:00'),
       (16, 'Tala', '2020-04-24 03:06:00', '2020-04-24 03:06:00'),
       (17, 'Tala', '2020-04-24 01:07:00', '2020-04-24 03:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members`
(
    `id`           int(11)      NOT NULL,
    `name`         varchar(50)  NOT NULL,
    `email`        varchar(255) NOT NULL,
    `faculty`      varchar(100) NOT NULL,
    `program`      varchar(100) NOT NULL,
    `universityID` varchar(15)  NOT NULL,
    `address`      varchar(255) NOT NULL,
    `facebook`     varchar(50)  NOT NULL,
    `phoneNumber`  varchar(20)  NOT NULL,
    `isApproved`   tinyint(1)   NOT NULL,
    `creationTime` datetime DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `faculty`, `program`, `universityID`, `address`, `facebook`,
                       `phoneNumber`, `isApproved`, `creationTime`)
VALUES (22, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-04-15 20:45:00'),
       (23, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2020-04-15 20:49:32'),
       (24, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2020-04-15 20:49:32'),
       (25, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-04-15 20:49:32'),
       (26, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2020-04-15 20:49:33'),
       (27, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2020-04-15 20:49:33'),
       (28, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (29, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-04-05 20:53:32'),
       (30, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-05-05 20:53:32'),
       (31, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-04-15 20:53:32'),
       (32, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-05-05 20:53:32'),
       (34, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2019-07-15 20:49:32'),
       (35, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2019-07-15 20:49:32'),
       (36, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-07-15 20:49:32'),
       (37, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-06-15 20:49:33'),
       (38, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-06-15 20:49:33'),
       (39, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (40, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-05-05 20:53:32'),
       (41, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-05-05 20:53:32'),
       (42, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-05-15 20:53:32'),
       (43, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-05-05 20:53:32'),
       (44, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-10-15 20:45:00'),
       (45, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2019-10-15 20:49:32'),
       (46, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2019-10-15 20:49:32'),
       (47, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-10-15 20:49:32'),
       (48, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-09-15 20:49:33'),
       (49, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-09-15 20:49:33'),
       (50, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (51, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-08-05 20:53:32'),
       (52, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-08-05 20:53:32'),
       (53, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-08-15 20:53:32'),
       (54, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-08-05 20:53:32'),
       (55, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-01-15 20:45:00'),
       (56, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2020-01-15 20:49:32'),
       (57, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2020-01-15 20:49:32'),
       (58, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-01-15 20:49:32'),
       (59, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-12-15 20:49:33'),
       (60, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-12-15 20:49:33'),
       (61, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (62, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-11-05 20:53:32'),
       (63, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-11-05 20:53:32'),
       (64, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-11-15 20:53:32'),
       (65, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-11-05 20:53:32'),
       (66, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-04-15 20:45:00'),
       (67, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2020-04-15 20:49:32'),
       (68, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2020-04-15 20:49:32'),
       (69, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-04-15 20:49:32'),
       (70, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2020-03-15 20:49:33'),
       (71, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2020-03-15 20:49:33'),
       (72, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (73, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2020-02-05 20:53:32'),
       (74, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2020-02-05 20:53:32'),
       (75, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2020-02-15 20:53:32'),
       (76, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2020-02-05 20:53:32'),
       (77, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-04-15 20:45:00'),
       (78, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2019-04-15 20:49:32'),
       (79, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2019-04-15 20:49:32'),
       (80, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-04-15 20:49:32'),
       (81, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-03-15 20:49:33'),
       (82, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-03-15 20:49:33'),
       (83, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (84, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-02-05 20:53:32'),
       (85, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-02-05 20:53:32'),
       (86, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-02-15 20:53:32'),
       (87, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-02-05 20:53:32'),
       (88, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-07-15 20:45:00'),
       (89, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451', 'Jenin',
        'Amr', '0598491615', 0, '2019-07-15 20:49:32'),
       (90, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845', 'Nablus',
        'Ahmad', '0598492625', 1, '2019-07-15 20:49:32'),
       (91, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-07-15 20:49:32'),
       (92, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-03-15 20:49:33'),
       (93, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-03-15 20:49:33'),
       (94, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (95, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-02-05 20:53:32'),
       (96, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-02-05 20:53:32'),
       (97, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-02-15 20:53:32'),
       (98, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-02-05 20:53:32'),
       (99, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-11-15 20:45:00'),
       (100, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-11-15 20:49:32'),
       (101, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-11-15 20:49:32'),
       (102, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-11-15 20:49:32'),
       (103, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-03-15 20:49:33'),
       (104, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-03-15 20:49:33'),
       (105, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (106, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-02-05 20:53:32'),
       (107, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-02-05 20:53:32'),
       (108, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-02-15 20:53:32'),
       (109, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-02-05 20:53:32'),
       (110, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-11-15 20:45:00'),
       (111, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-11-15 20:49:32'),
       (112, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-11-15 20:49:32'),
       (113, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-11-15 20:49:32'),
       (114, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-03-15 20:49:33'),
       (115, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-03-15 20:49:33'),
       (116, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-03-05 20:53:32'),
       (117, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-02-05 20:53:32'),
       (118, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-02-05 20:53:32'),
       (119, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-02-15 20:53:32'),
       (120, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-02-05 20:53:32'),
       (121, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-03-15 20:45:00'),
       (122, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2020-03-15 20:49:32'),
       (123, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2020-03-15 20:49:32'),
       (124, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-03-15 20:49:32'),
       (125, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2020-03-15 20:49:33'),
       (126, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2020-03-15 20:49:33'),
       (127, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2020-03-05 20:53:32'),
       (128, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2020-03-05 20:53:32'),
       (129, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2020-03-05 20:53:32'),
       (130, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2020-03-15 20:53:32'),
       (131, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2020-03-05 20:53:32'),
       (132, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-03-15 20:45:00'),
       (133, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2020-03-15 20:49:32'),
       (134, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2020-03-15 20:49:32'),
       (135, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-03-15 20:49:32'),
       (136, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2020-03-15 20:49:33'),
       (137, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2020-03-15 20:49:33'),
       (138, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2020-03-05 20:53:32'),
       (139, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2020-03-05 20:53:32'),
       (140, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2020-03-05 20:53:32'),
       (141, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2020-03-15 20:53:32'),
       (142, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2020-03-05 20:53:32'),
       (143, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2020-03-15 20:45:00'),
       (144, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2020-03-15 20:49:32'),
       (145, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2020-03-15 20:49:32'),
       (146, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2020-03-15 20:49:32'),
       (147, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2020-03-15 20:49:33'),
       (148, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2020-03-15 20:49:33'),
       (149, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2020-03-05 20:53:32'),
       (150, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2020-03-05 20:53:32'),
       (151, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2020-03-05 20:53:32'),
       (152, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2020-03-15 20:53:32'),
       (153, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2020-03-05 20:53:32'),
       (154, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-08-15 20:45:00'),
       (155, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-08-15 20:49:32'),
       (156, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-08-15 20:49:32'),
       (157, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-08-15 20:49:32'),
       (158, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-08-15 20:49:33'),
       (159, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-08-15 20:49:33'),
       (160, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-08-05 20:53:32'),
       (161, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-08-05 20:53:32'),
       (162, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-08-05 20:53:32'),
       (163, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-08-15 20:53:32'),
       (164, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-08-05 20:53:32'),
       (165, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-08-15 20:45:00'),
       (166, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-08-15 20:49:32'),
       (167, 'Ahmad', 'aaa@gmail.com', 'Educational Sciences and Teachers Training', 'Mathematics', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-08-15 20:49:32'),
       (168, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-08-15 20:49:32'),
       (169, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 0,
        '2019-08-15 20:49:33'),
       (170, 'Lana', 'l@gmail.com', 'Fine Arts', 'Modern Arts', '11548521', 'Rammallah', 'Lana', '0598594648', 1,
        '2019-08-15 20:49:33'),
       (171, 'Mohammed', 'mo@gmail.com', 'Economics and Social Studies', 'Accounting', '11845945', 'Hebron', 'Mohammed',
        '0597849449', 1, '2019-08-05 20:53:32'),
       (172, 'Dana', 'd@gmail.com', 'Economics and Social Studies', 'Accounting', '11784895', 'Hebron', 'Dana',
        '0598491659', 1, '2019-08-05 20:53:32'),
       (173, 'Jana', 'j@gmail.com', 'Economics and Social Studies', 'Accounting', '11659487', 'Hebron', 'Jana',
        '0598485915', 1, '2019-08-05 20:53:32'),
       (174, 'Sarah', 's@gmail.com', 'Economics and Social Studies', 'MBA', '117485512', 'Jenin', 'Sarah', '098265481',
        1, '2019-08-15 20:53:32'),
       (175, 'Jude', 'ju@gmail.com', 'Economics and Social Studies', 'Accounting', '11845695', 'Tulkarem', 'Jude',
        '0598594959', 1, '2019-08-05 20:53:32'),
       (176, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-08-15 20:45:00'),
       (177, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-08-15 20:49:32'),
       (178, 'Ahmad', 'aaa@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-08-15 20:49:32'),
       (179, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-08-15 20:49:32'),
       (180, 'Lana', 'l@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11548521',
        'Rammallah', 'Lana', '0598594648', 0, '2019-08-15 20:49:33'),
       (181, 'Lana', 'l@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11548521',
        'Rammallah', 'Lana', '0598594648', 1, '2019-08-15 20:49:33'),
       (182, 'Mohammed', 'mo@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11845945',
        'Hebron', 'Mohammed', '0597849449', 1, '2019-08-05 20:53:32'),
       (183, 'Dana', 'd@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11784895',
        'Hebron', 'Dana', '0598491659', 1, '2019-08-05 20:53:32'),
       (184, 'Jana', 'j@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11659487',
        'Hebron', 'Jana', '0598485915', 1, '2019-08-05 20:53:32'),
       (185, 'Sarah', 's@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '117485512',
        'Jenin', 'Sarah', '098265481', 1, '2019-08-15 20:53:32'),
       (186, 'Jude', 'ju@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11845695',
        'Tulkarem', 'Jude', '0598594959', 1, '2019-08-05 20:53:32'),
       (187, 'Tala Hethnawi', 't@gmail.com', 'Engineering and Information Technology', 'Computer Engineering',
        '11714643', 'Jenin', 'Tala Hethnawi', '0598484548', 1, '2019-08-15 20:45:00'),
       (188, 'Amr', 'a@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Jenin', 'Amr', '0598491615', 0, '2019-08-15 20:49:32'),
       (189, 'Ahmad', 'aaa@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11654845',
        'Nablus', 'Ahmad', '0598492625', 1, '2019-08-15 20:49:32'),
       (190, 'Aseel', 'ase@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11714451',
        'Nablus', 'Aseel', '0598491615', 1, '2019-08-15 20:49:32'),
       (191, 'Lana', 'l@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11548521',
        'Rammallah', 'Lana', '0598594648', 0, '2019-08-15 20:49:33'),
       (192, 'Lana', 'l@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11548521',
        'Rammallah', 'Lana', '0598594648', 1, '2019-08-15 20:49:33'),
       (193, 'Mohammed', 'mo@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11845945',
        'Hebron', 'Mohammed', '0597849449', 1, '2019-08-05 20:53:32'),
       (194, 'Dana', 'd@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11784895',
        'Hebron', 'Dana', '0598491659', 1, '2019-08-05 20:53:32'),
       (195, 'Jana', 'j@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11659487',
        'Hebron', 'Jana', '0598485915', 1, '2019-08-05 20:53:32'),
       (196, 'Sarah', 's@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '117485512',
        'Jenin', 'Sarah', '098265481', 1, '2019-08-15 20:53:32'),
       (197, 'Jude', 'ju@gmail.com', 'Engineering and Information Technology', 'Computer Engineering', '11845695',
        'Tulkarem', 'Jude', '0598594959', 1, '2019-08-05 20:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`                  int(11)      NOT NULL,
    `username`            varchar(50)  NOT NULL,
    `password`            varchar(255) NOT NULL,
    `isAdmin`             tinyint(1)   NOT NULL DEFAULT 0,
    `canViewMembers`      tinyint(1)   NOT NULL,
    `canEditMembers`      tinyint(1)   NOT NULL,
    `canAddAnnouncements` tinyint(1)   NOT NULL,
    `canAddEvents`        tinyint(1)   NOT NULL,
    `creationTime`        datetime              DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `canViewMembers`, `canEditMembers`, `canAddAnnouncements`,
                     `canAddEvents`, `creationTime`)
VALUES (55, 'admin', '$2y$10$2ykXwtXro0RMj4XOhfi6IOTjefMf6zmTfUPMvEWdL9.AGaxepBhCK', 1, 1, 1, 1, 1,
        '2020-04-24 03:02:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 198;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
