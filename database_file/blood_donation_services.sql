-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 12:40 AM
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
-- Database: `blood_donation_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(32) NOT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_email`, `pass`) VALUES
('super_admin', 'admin@gmail.com', '370_summer23');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `request_id` int(11) NOT NULL,
  `request_by` varchar(32) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(120) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `hospital_unit` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `date_needed` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`request_id`, `request_by`, `name`, `age`, `blood_group`, `quantity`, `hospital_unit`, `hospital_name`, `date_needed`, `contact`, `reason`) VALUES
(11, 'xordan77', 'Dipto Das', 21, 'A+', 2, 'ICU', 'Bangladesh Medical', '2023-08-23', '01792652047', 'Critical operation will be conducted.'),
(12, 'xordan77', 'Samsul Arefin', 22, 'A+', 1, 'ICU', 'Popular Hospital', '2023-08-29', '01792652047', 'Wounded.'),
(13, 'xordan77', 'Rifat Hasan', 42, 'A+', 1, 'SCU', 'Bangladesh Medical', '2023-08-29', '01792652047', 'Organ transplant.'),
(15, 'xordan77', 'Samsul Arefin', 22, 'A+', 3, 'CCU', 'Evercare Hospital', '2023-09-27', '01792652047', 'Emergency'),
(16, 'xordan77', 'Naser Al Noman', 20, 'A+', 1, 'ICU', 'United Hospital', '2023-09-14', '01792652047', 'Severe Blood Loss Due to Injury'),
(17, 'test5', 'Nasif Hasan', 20, 'AB+', 1, 'SCU', 'Bangladesh Medical', '2023-09-22', '01118714253', 'Severe Injury');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `venue` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `venue`, `start_date`, `end_date`) VALUES
(1, 'Kurmitola General Hospital', '2023-07-15', '2023-07-21'),
(2, 'United Hospital', '2023-07-01', '2023-07-07'),
(3, 'Bangabandhu Sheikh Mujib Medical University', '2023-08-01', '2023-08-07'),
(4, 'Holy Family Hospital', '2023-08-15', '2023-08-21'),
(5, 'Square Hospital', '2023-09-01', '2023-09-07'),
(6, 'Mugda Medical College', '2023-08-24', '2023-08-31'),
(7, 'Medinova Medical', '2023-08-26', '2023-08-31'),
(8, 'Kurmitola General Hospital', '2023-09-01', '2023-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `donor_list`
--

CREATE TABLE `donor_list` (
  `username` varchar(32) NOT NULL,
  `previous_donation` date DEFAULT NULL,
  `approver_hospital` varchar(50) DEFAULT NULL,
  `responds` int(120) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_list`
--

INSERT INTO `donor_list` (`username`, `previous_donation`, `approver_hospital`, `responds`) VALUES
('abul9900', '2023-03-27', 'Medinova Medical', 0),
('amin71', '2023-07-30', 'Ibn Sina Hospital', 0),
('amina441', '2023-07-08', 'Combined Military Hospital', 0),
('anwarul9900', '2023-05-07', 'Ad-Din Medical', 0),
('arman_m', '2023-04-16', 'Mugda Medical College', 0),
('asadullah3322', '2023-03-31', 'Combined Military Hospital', 0),
('ayesha55', '2023-01-03', 'Mugda Medical College', 0),
('azizul55', '2023-07-06', 'Holy Family Hospital', 0),
('farhad779', '2023-01-25', 'Popular Medical College and Hospital', 0),
('farhana123', '2022-09-28', 'Kurmitola General Hospital', 0),
('farid225', '2023-02-19', 'Kurmitola General Hospital', 0),
('fariha5500', '2023-02-06', 'Kurmitola General Hospital', 0),
('fatima84', '2022-09-12', 'Holy Family Hospital', 0),
('hero_alam', '2023-02-02', 'Combined Military Hospital', 0),
('imran786', '2022-12-08', 'Dhaka Medical College', 0),
('iqbal91', '2023-02-14', 'Popular Medical College and Hospital', 0),
('jaleel_s', '2023-03-14', 'Holy Family Hospital', 0),
('jamalhassan', '2022-10-27', 'Bangladesh Medical', 0),
('kabir6574', '2023-03-11', 'Labaid Hospital', 0),
('kamal1122', '2022-12-30', 'Kurmitola General Hospital', 0),
('kamal_r', '2022-11-03', 'Bangladesh Medical', 0),
('kamrul3322', '2023-07-18', 'Bangladesh Medical', 0),
('kamrul99', '2023-07-04', 'Ad-Din Medical', 0),
('karawita91', '2022-12-18', 'Evercare Hospital', 0),
('karim776', '2023-01-22', 'Mugda Medical College', 0),
('khaleel9900', '2023-04-15', 'Uttara Adhunik Medical', 0),
('khalid75', '2023-04-13', 'Shahabuddin Medical College', 0),
('maliha_215', '2023-05-25', 'Popular Medical College and Hospital', 0),
('nabila667', '2023-06-14', 'Square Hospital', 0),
('nadia44', '2022-12-23', 'Medinova Medical', 0),
('nafis_swag', '2023-06-14', 'Labaid Hospital', 0),
('naima777', '2023-04-18', 'Holy Family Hospital', 0),
('nasrin5500', '2023-01-25', 'Bangladesh Medical', 0),
('nasrin_26', '2023-01-03', 'Bangladesh Medical', 0),
('nazia333', '2022-10-22', 'Mugda Medical College', 0),
('nazmul881', '2022-10-23', 'Ad-Din Medical', 0),
('nishat5544', '2022-12-01', 'Mugda Medical College', 0),
('nusrat22', '2023-05-22', 'Medinova Medical', 0),
('rafiq22', '2022-10-10', 'Dhaka Medical College', 0),
('rahim7788', '2023-07-24', 'Bangladesh Medical', 0),
('rahima66', '2023-08-01', 'Shahabuddin Medical College', 0),
('rahman3344', '2023-05-03', 'Square Hospital', 0),
('raisa888', '2022-10-21', 'Uttara Adhunik Medical', 0),
('rashid555', '2022-09-04', 'Evercare Hospital', 0),
('rina66', '2023-08-07', 'Square Hospital', 0),
('sahar9', '2022-10-03', 'Popular Medical College and Hospital', 0),
('sahila8877', '2022-09-21', 'Dhaka Medical College', 0),
('saima5566', '2023-04-22', 'Combined Military Hospital', 0),
('saira5500', '2023-07-03', 'Bangabandhu Sheikh Mujib Medical University', 0),
('salim112', '2022-11-29', 'United Hospital', 0),
('samina909', '2023-06-21', 'Evercare Hospital', 0),
('shabnam7788', '2022-10-16', 'Holy Family Hospital', 0),
('shahid007', '2023-05-08', 'Evercare Hospital', 0),
('shahnaz442', '2023-02-27', 'Mugda Medical College', 0),
('test5', '2023-09-01', 'Evercare Hospital', 0),
('xordan77', '2023-09-21', 'Bangladesh Medical', 2),
('yasir88', '2023-04-24', 'Medinova Medical', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report_box`
--

CREATE TABLE `report_box` (
  `report_no` int(11) NOT NULL,
  `reported_by` varchar(32) DEFAULT NULL,
  `donor_contact` varchar(255) DEFAULT NULL,
  `report_box` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_box`
--

INSERT INTO `report_box` (`report_no`, `reported_by`, `donor_contact`, `report_box`) VALUES
(2, 'xordan77', '154225505', 'Did not show up to donate!'),
(3, 'test1', '01118714253', 'Did not show up to donate.'),
(4, 'xordan77', '01688914523', 'Did not show up to donate.');

-- --------------------------------------------------------

--
-- Table structure for table `request_respond`
--

CREATE TABLE `request_respond` (
  `b_request_id` int(11) DEFAULT NULL,
  `d_respond_id` varchar(32) DEFAULT NULL,
  `donation_dt` datetime DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `ac` tinyint(1) DEFAULT 0,
  `dc` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_respond`
--

INSERT INTO `request_respond` (`b_request_id`, `d_respond_id`, `donation_dt`, `contact`, `ac`, `dc`) VALUES
(17, 'xordan77', '2023-09-22 22:00:00', '01792652047', 1, 1),
(15, 'test5', '2023-09-23 16:30:00', '01661423586', 0, 1),
(17, 'xordan77', '2023-09-22 17:25:00', '01792652047', 1, 1),
(15, 'test5', '2023-09-26 16:25:00', '0168742582', 0, 1),
(17, 'xordan77', '2023-09-22 16:00:00', '01792652047', 0, 1),
(15, 'test5', '2023-09-25 17:30:00', '01415482263', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trusted_hospitals`
--

CREATE TABLE `trusted_hospitals` (
  `hospital_name` varchar(50) NOT NULL,
  `hospital_mail` varchar(100) DEFAULT NULL,
  `hotline` varchar(15) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trusted_hospitals`
--

INSERT INTO `trusted_hospitals` (`hospital_name`, `hospital_mail`, `hotline`, `location`) VALUES
('Ad-Din Medical', 'info@adm.com', '9996664555', 'https://goo.gl/maps/6xxYz6H4JRiHzfnH6'),
('Bangabandhu Sheikh Mujib Medical University', 'info@bsmmu.edu.bd', '9876543210', 'https://goo.gl/maps/pEUYAcs7Woqa2hVV6'),
('Bangladesh Medical', 'info@bangladeshmedical.com', '9990001111', 'https://goo.gl/maps/Zu56gRqNhUUDGjUk8'),
('Combined Military Hospital', 'info@cmh.gov.bd', '6667778888', 'https://goo.gl/maps/sr3do8nGTiNds4yn7'),
('Dhaka Medical College', 'info@dmch.gov.bd', '1234567890', 'https://goo.gl/maps/GpDgssPHTrfkyVEf7'),
('Evercare Hospital', 'info@centralhospitalltd.com', '1110009999', 'https://goo.gl/maps/bvKHccRj7oMMfhfD9'),
('Holy Family Hospital', 'info@hfrcmc.edu.bd', '3332221111', 'https://goo.gl/maps/bvcJ7s5yrrYaZqWN9'),
('Ibn Sina Hospital', 'info@ibnsinatrust.com', '2223334444', 'https://goo.gl/maps/bvcJ7s5yrrYaZqWN9'),
('Kurmitola General Hospital', 'info@kghonline.com', '5556667777', 'https://goo.gl/maps/VtexNjUttmGe92VG9'),
('Labaid Hospital', 'info@labaidgroup.com', '5554443333', 'https://goo.gl/maps/PapzejF1NzqfManM8'),
('Medinova Medical', 'info@mm.com', '7778889944', 'https://goo.gl/maps/MauBWiCEGaZ5zLzY6'),
('Mugda Medical College', 'info@mugdamch.gov.bd', '8887776666', 'https://goo.gl/maps/14G4BKDP9znydKiW7'),
('Popular Medical College and Hospital', 'info@pmch-bd.org', '8889990000', 'https://goo.gl/maps/zaENQdB8esShrtWC8'),
('Shahabuddin Medical College', 'info@shahabuddinmedical.org', '3334445555', 'https://goo.gl/maps/w68rEZfwwEvKCzNT9'),
('Square Hospital', 'info@squarehospital.com', '1112223333', 'https://goo.gl/maps/NgDsDBFS7KY3d6RB9'),
('United Hospital', 'info@uhlbd.com', '7778889999', 'https://goo.gl/maps/PvzkyavYTAytkvmz9'),
('Uttara Adhunik Medical', 'info@uam.edu.bd', '444466331', 'https://goo.gl/maps/cq8kRZcsBmkNdK856');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `username` varchar(32) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `age` int(120) DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `NID` varchar(13) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `police_station` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`username`, `name`, `contact`, `email`, `pass`, `age`, `blood_group`, `NID`, `gender`, `police_station`, `city`) VALUES
('abul9900', 'Abul Hasan', '01699001156', 'abul9900@gmail.com', '$2y$10$XqAs7smvrHX2ozMJYrkJkukpa7dhTRg6w1nDzkffHso4XPkDr84/G', 27, 'AB+', '2311223344556', 'Male', 'Hathhazari', 'Chattogram'),
('amin71', 'Amin Khan', '01878901234', 'amin77@gmail.com', '$2y$10$tYb2oR/Ufz7x.FBKAoArIO1qwaI2T9YauFjSXFeJujXCnPw9UErJ.', 27, 'O-', '2043210987654', 'Female', 'Uttara', 'Dhaka'),
('amina441', 'Amina Rahman', '01834567890', 'amina441@hotmail.com', '$2y$10$QzP9J9svMmZqafluzwJiDO1RSkbvK7nzU/G3eGfTGKA6gZgIHM4W6', 42, 'O-', '2098765432109', 'Female', 'Dhanmondi', 'Dhaka'),
('anwarul9900', 'Anwarul Haque', '01933447566', 'anwarul9900@gmail.com', '$2y$10$7L2hdeTOgSnvPLpADAArKexnePkRvlpL7wgrUtoXSZIj6saKmdVxy', 38, 'O+', '2355667788990', 'Male', 'Hathazari', 'Chattogram'),
('arman_m', 'Arman Malik', '01555678901', 'arman_malik@gmail.com', '$2y$10$icGKLE4CtG1iYHHiWW3GPOZCQG5vdpR/7wlfjczA75uL.8HlyiFgO', 27, 'B+', '2221098765432', 'Male', 'Gulshan', 'Dhaka'),
('asadullah3322', 'Asadullah Khan', '01711223368', 'asadullah3322@gmail.com', '$2y$10$G1Up5WXLYOoTNbfxqmeI5Oep1yFwgp1r088ZOqfFz6o2Qf.oRToAG', 29, 'A+', '2333445566778', 'Male', 'Kotwali', 'Chattogram'),
('ayesha55', 'Ayesha Ahmed', '01933445566', 'ayesha55@example.com', '$2y$10$k1nJ9.Y5pE7jiDNw3GYpku1MquEVrLoMU7wu6Fp4XA8L8k25NoFFW', 23, 'B+', '2002345678901', 'Female', 'Ramna', 'Dhaka'),
('azizul55', 'Azizul Haque', '01934567890', 'azizul55@gmail.com', '$2y$10$tJSDSzl.M40O6oniHqrAhOpLB9CMI6.uI4GU3dvV7lVlfTwKYZV/e', 42, 'AB+', '2009876543210', 'Male', 'Mugda', 'Dhaka'),
('farhad779', 'Farhad Islam', '01601234567', 'farhad779@gmail.com', '$2y$10$PaGtyIp76hz36Dwpj9Gp/.z4kkbcXicSbEqKjKx1T17Kpm2d2tyAm', 28, 'A+', '2165432109876', 'Male', 'Mugda', 'Dhaka'),
('farhana123', 'Farhana Begum', '01711223344', 'farhana123@example.com', '$2y$10$vkHrhxRJggdRBpSZJkyq2.Z.fO9Yu8gpHtVmr2ziqHpTX51G6hi.a', 28, 'B+', '1990123456789', 'Female', 'Banasree', 'Dhaka'),
('farid225', 'Faridul Haque', '01945678901', 'farid225@gmail.com', '$2y$10$8M1M43w.oZ8WExT2FjX6QeW100Pghi9bn3WxKtlf/YrQwP5OPeSHe', 38, 'B-', '2109876543210', 'Male', 'Mirpur', 'Dhaka'),
('fariha5500', 'Fariha Khanam', '015101782344', 'fariha5500@hotmail.com', '$2y$10$4NYjchjHV6rP8HczU0.HjuYwlPwZkTmoWRKyJVzu8kYaqKSwsbmx2', 32, 'AB-', '2322334455667', 'Female', 'Bakalia', 'Chattogram'),
('fatima84', 'Fatima Begum', '01877889900', 'fatima84@example.com', '$2y$10$7kWrJYxJCi82lsE2G7DxtOzUevgAx4X22.VVvzyW1iTS73VWINtNq', 29, 'B+', '1986789012345', 'Female', 'Gulshan', 'Dhaka'),
('hero_alam', 'Hero Alam', '01958901234', 'hero.alam@gmail.com', '$2y$10$4TqR6vYnjKUv37gZoxwzVe4qwClVwkaMOR0lLC/Yw.Cuk9gtVbf6C', 35, 'B+', '2110987654323', 'Male', 'Ramna', 'Dhaka'),
('imran786', 'Imran Khan', '01822334455', 'imran786@example.com', '$2y$10$q/CMkwnbaGnZbEr2SJMXpOEVQvr2y2bs7LOKv.h8BV1H.tC5.LVIe', 32, 'A-', '1981234567890', 'Male', 'Tejgaon', 'Dhaka'),
('iqbal91', 'Iqbal Hossain', '01510112233', 'iqbal91@hotmail.com', '$2y$10$VA1FN.prF5G989lnDUam.ONWCze8xRLftPkYa9gf.0s6UakRSQRvi', 37, 'O-', '1959012345678', 'Male', 'Uttara', 'Dhaka'),
('irrelevant', 'Fardous Nayeem', '01796298321', 'irrelevant552@gmail.com', '$2y$10$UfofxSQ0j5rhQ7VO6WdOPuBk5bAcDZMAWOiUDHzplYn.i9I9z2eva', 21, 'O+', '1234659870', 'Male', 'Motijheel', 'Dhaka'),
('jaleel_s', 'Abdul Jaleel Shisha', '01934566778', 'abdul.jaleel@gmail.com', '$2y$10$.MxTnXUGI6bR7mh93ejkYOzYn0UxFCA2ETyxFw.XzBPq5Asr0hGaq', 21, 'A+', '2277889900145', 'Male', 'Hatahazari', 'Chattogram'),
('jamalhassan', 'Jamal Hassan', '01988990011', 'jamalhassan@example.com', '$2y$10$USp6y3N8lQLeP4SFpVR0mOj1NF.PF9Dj5EyEdz129sfouD4w3yKUC', 26, 'A+', '1997890123456', 'Male', 'Ramna', 'Dhaka'),
('kabir6574', 'Kabir Rahman', '01555667734', 'kabir5500@gmail.com', '$2y$10$herwjA7KrsYpbF9g3i4u9.3JoNbB8XjeG0Ftk6vpSfbB41n1meQf2', 34, 'B+', '2377889900112', 'Male', 'Double Mooring', 'Chattogram'),
('kamal1122', 'Kamal Ahmed', '01721234567', 'kamal1122@gmail.com', '$2y$10$qXu9HNAbbr68./FIr1JXw.3UDkVdQXAAt3NJe6FCFbCogcKgS1.4q', 31, 'B-', '2187654321098', 'Male', 'Uttara', 'Dhaka'),
('kamal_r', 'Kamal Rahman', '01644556677', 'kamal_r@example.com', '$2y$10$LKepbGPE6Yl1kFQ8R0CuSeLQiVb/OT0oldRwUJ0.V7csYOBhPWSIS', 39, 'O-', '1953456789012', 'Male', 'Tejgaon', 'Dhaka'),
('kamrul3322', 'Kamrul Haque', '01933445564', 'kamrul3322@gmail.com', '$2y$10$e0he9mu10rwXpaYBAHwXkO6yVoHtdpjBpkn47dkzcNIy2wTHHc5o6', 35, 'O+', '2255667788990', 'Male', 'Hathazari', 'Chattogram'),
('kamrul99', 'Kamrul Islam', '01690123456', 'kamrul99@gmail.com', '$2y$10$JXtu7N/OBlkFOwNv4Cc9Ju0cd.psGCYR3k7JLRUIZ8zNt6o4ZSnLy', 37, 'A-', '2065432109876', 'Male', 'Mirpur', 'Dhaka'),
('karawita91', 'Osman Karawita', '01657667758', 'karawita.osman@gmail.com', '$2y$10$2MKfDuZb./1yyv1BNfhBxu5oOW7CNUA8c7Jlhoy1MGWBMbqquivtW', 25, 'B-', '2377889965452', 'Male', 'Double Mooring', 'Chattogram'),
('karim776', 'Karim Khan', '01889012345', 'karim776@gmail.com', '$2y$10$GxPZmE6Z6ot4bZWyZE6zneVVPdmh31ePNgbTZBfs0Q0.q75iPz9UC', 31, 'O-', '2143210987654', 'Male', 'Tejgaon', 'Dhaka'),
('khaleel9900', 'Khaleel Islam', '01877889950', 'khaleel9900@gmail.com', '$2y$10$dq7rpe6E.G7p3vI2wk10j./LvlVK39PQdZATBJyQbfI2v2MiMHRmq', 30, 'B+', '2299001122334', 'Male', 'Chawk Bazar', 'Chattogram'),
('khalid75', 'Khalid Kashmeri', '01745678899', 'khalid@gmail.com', '$2y$10$mCSub55Hph96FmcBvTHKfeVHE08fdGCtbPwcWg1uDIyDOnfdqCUga', 24, 'B-', '2288990011774', 'Male', 'Bakalia', 'Chattogram'),
('maliha_215', 'Malhia Hossain', '01644567890', 'maliha_21@gmail.com', '$2y$10$1Iys4oVuMoE6SoWjdL17oe6bmPTKOxDIsTsrN3GQ8YpCaWejPZr4u', 24, 'A-', '2210987654321', 'Female', 'Banani', 'Dhaka'),
('nabila667', 'Nabila Khanam', '01656789012', 'nabila667@hotmail.com', '$2y$10$9UNH1awsszWbxDGdRpxpu.7l5uh5kCtb.Y5zasZacbZqcBzpbwyFi', 25, 'O+', '2110987654321', 'Female', 'Banani', 'Dhaka'),
('nadia44', 'Nadia Khanam', '01645678901', 'nadia44@hotmail.com', '$2y$10$w.dhS0IVUX3BJ.pYPdFs2.ZT/iGHtrIlmjs4MeT81q9A1y/tMsX3e', 26, 'O+', '2010987654321', 'Female', 'Motijheel', 'Dhaka'),
('nafis_swag', 'Nafis Rayan', '01734323423', 'nafis.rayan@gmail.com', '$2y$10$Z2fHNCCqx0gfl2npEk6iGukB0CR3nIIsdwG//5wOxD3ZjmV9QXndm', 23, 'AB-', '1986745362345', 'Other', 'Banasree', 'Dhaka'),
('naima777', 'Naima Rahman', '01823456789', 'naima_7@hotmail.com', '$2y$10$nXaDuW5yNBbASg7/AcA94e9Rp9gXgnrOjuC3YyBJOBy11mlXI3FoO', 28, 'AB+', '1998765432109', 'Female', 'Banani', 'Dhaka'),
('naser', 'Naser Al Noman', '01688914523', 'naser@gmail.com', '$2y$10$qJcuKRGjzcQJ7cc63f6adOV.eRGEkZHTmaMIfBG6TfB46RHecM7bu', 20, 'AB+', '97785444525', 'Male', 'Mirpur', 'Dhaka'),
('nasrin5500', 'Nasrin Sultana', '01644596658', 'nasrin5500@hotmail.com', '$2y$10$thaZbymrXA6ZBjYvQNvTm.uDLnf6HS4cn9FYSFPw2tjsQdUjXgBES', 26, 'O-', '2366778899001', 'Female', 'Bakalia', 'Chattogram'),
('nasrin_26', 'Nasrin Chowdhury', '01501234567', 'nasrin55@hotmail.com', '$2y$10$Q8Wsg2kp6wxJ1lki81S//e6eCd6wJxt0pbG9uM3ue/iihb/S51suC', 30, 'B+', '2076543210987', 'Female', 'Banani', 'Dhaka'),
('nawrin', 'Jannatul Nawrin', '01234567890', 'nawrin92@gmail.com', '$2y$10$CIeH/27WeeP7FFiDWbgDgemEz0ZNeC5sxiFdgCnpvwVDdxSWCKy5a', 21, 'O+', '9874563210', 'Female', 'Mohammadpur', 'Dhaka'),
('nazia333', 'Nazia Chowdhury', '01512345678', 'nazia333@hotmail.com', '$2y$10$WLH96V.Z.PXQO4rLeyHBjO7zvERYvb8jjNCAJnSw7Zr707TIX8Tge', 20, 'AB+', '2176543210987', 'Female', 'Banani', 'Dhaka'),
('nazmul881', 'Nazmul Hasan', '017112233342', 'nazmul881@gmail.com', '$2y$10$OIAlat.oRjAxngr9n.TXYONFr7nQncY0P8CM5HsvOuogU9NO8lBlm', 29, 'B+', '2233445566778', 'Male', 'Kotwali', 'Chattogram'),
('nishat5544', 'Nishat Khanam', '01644556577', 'nishat5544@hotmail.com', '$2y$10$Mxtgic3ZGftHL6AoOXat7OYDZhAdBfGz3JXvG/eKD2ussqK/6ujM6', 26, 'O-', '2266778899001', 'Female', 'Bakalia', 'Chattogram'),
('nusrat22', 'Nusrat Jahan', '01555667788', 'nusrat22@example.com', '$2y$10$RURvaGy1IUbUax1p4XYD2O/kMDpGHdeybl0vVlPuz2Jj2uDJObDWK', 27, 'B+', '2014567890123', 'Female', 'Uttara', 'Dhaka'),
('rafiq22', 'Rafiq Ahmed', '01556789012', 'rafiq_2@gmail.com', '$2y$10$/3Q65YLVApssNb9nxAkbDeiAJpu9NYFDCKm7cF6KSO6xkQ.kkP1Wq', 29, 'A+', '2021098765432', 'Male', 'Mirpur', 'Dhaka'),
('rahim7788', ' Rahimul Haque', '01933456789', 'rahim7788@gmail.com', '$2y$10$.BGoGS4Bo/DBPaj8kKgbaOMwAD93ih.ik.Rak.1wnjWr4lf/cTEEa', 32, 'O+', '2209876543210', 'Male', 'Mirpur', 'Dhaka'),
('rahima66', 'Rahima Khanam', '01699001122', 'rahima66@gmail.com', '$2y$10$rNVSVkprXlvXen6n2ujVeO76Zb.wfGXYNRHQ1B0PudtMs1r1HJdjO', 22, 'O+', '2008901234567', 'Female', 'Gulshan', 'Dhaka'),
('rahman3344', 'Rahman Khan', '01545667788', 'rahman3344@gmail.com', '$2y$10$haa8feVifEp39AuFwQYip.8uTZpVgBK8.bcrD4jF2brBLhF/1/gKC', 25, 'A+', '2277889900112', 'Male', 'Chawk Bazar', 'Chattogram'),
('raisa888', 'Raisa Akter', '01990123456', 'raisa888@hotmail.com', '$2y$10$QlI7bFJCSpPQ7pkSoZ09xeTmlwlgmjcYFUffQbaYYAaOYojR9oIYa', 24, 'O+', '2154321098765', 'Female', 'Tejgaon', 'Dhaka'),
('rashid555', 'Rashid Ahmed', '01567890123', 'rashid555@gmail.com', '$2y$10$t4m33XqjBFQDXz./1lH6ferA8myCHlcD1z/JkcuxXbYpJhKCbh5K.', 31, 'A-', '2121098765432', 'Male', 'Gulshan', 'Dhaka'),
('rina66', 'Rina Akter', '01989012345', 'rina66@hotmail.com', '$2y$10$KB5mQ4FtRqeQ9UiNxyvNierTcRNjGUXxOQk31CtfnbRwZf39sFUP2', 27, 'AB-', '2054321098765', 'Female', 'Mohammadpur', 'Dhaka'),
('sahar9', 'Sahar Begum', '01767890123', 'sahar90@hotmail.com', '$2y$10$qWmnsXvKzuk.u9QIZYtjfe1wGmt6/V8SP8Wu3AEe0PqNKlAAqzCXK', 25, 'B-', '2032109876543', 'Female', 'Gulshan', 'Dhaka'),
('sahila8877', 'Sahila Begum', '017667458899', 'sahila8877@hotmail.com', '$2y$10$2Y4x5UE8.c5Zr8Lfo05xyuen8wDvAJInnNCgSBQNoFN.urJennFnm', 45, 'A-', '2288990011223', 'Female', 'Kotwali', 'Chattogram'),
('saima5566', 'Saima Rahman', '01822345678', 'saima5566@hotmail.com', '$2y$10$7GZll7gRDWzfdO7IqYgYVOdUcALR6ZiijfTz7l2p0gkA.nIGyAzw.', 25, 'O-', '2198765432109', 'Female', 'Dhanmondi', 'Dhaka'),
('saira5500', 'Saira Akter', '01988992233', 'saira5500@hotmail.com', '$2y$10$mCvqN82B1y9j6oJjnlyk3.1Wgm6x/WRTCRoentjH/BruzuFxSZeUG', 28, 'B-', '2300112233445', 'Female', 'Kotwali', 'Chattogram'),
('salim112', 'Salim Khan', '01723456789', 'salim112@gmail.com', '$2y$10$JZoA5JBZqNn1xRlkFKkjh.stL9UXM9VTSeM4xTWBMM7IEHr9O3JYS', 29, 'O-', '2087654321098', 'Male', 'Uttara', 'Dhaka'),
('samina909', 'Samina Begum', '01778901234', 'samina909@hotmail.com', '$2y$10$/htAb1zZEm9us2iTKaaqOejc8cuQeDmP5Fi5cv/1Cm.i3SuNfXiYG', 33, 'B+', '2132109876543', 'Female', 'Mohammadpur', 'Dhaka'),
('samsu', 'Samsul Arefin Tanzim', '0123215459', 'crosshair@gmail.com', '$2y$10$wKoqGWMI8b/8UpYATHQALuKvlV39V/vFr4cLA/ffaDrKivzbdHb6y', 21, 'AB+', '9714055256', 'Male', 'Mirpur', 'Dhaka'),
('shabnam7788', 'Shabnam Akter', '01822339856', 'shabnam7788@hotmail.com', '$2y$10$npmBxt.Cox2x0t1AgKBIi.tvF4B/VXz2UFgj7UwgRdMwzr6UqVFn6', 26, 'A-', '2344556677889', 'Female', 'Chawk Bazar', 'Chattogram'),
('shahid007', 'Shahid Ali', '01766778899', 'shahid007@example.com', '$2y$10$NEql/ET5lWnXaGVMnqH25Oz./LCSAr8mfU7XpUJcBTLGnxWL3oTTC', 31, 'A+', '1995678901234', 'Male', 'Banasree', 'Dhaka'),
('shahnaz442', 'Shahnaz Begum', '01822334434', 'shahnaz442@hotmail.com', '$2y$10$Z9jvLQYih1sZal2tmxeeoOdzBCE1mBuw5UG99BeHGdKHyQAOkqJxK', 28, 'A+', '2244556677889', 'Female', 'Hathazari', 'Chattogram'),
('test1', 'Tester', '154225505', 'test1@gmail.com', '$2y$10$YGCF.gnowaJ1NKsXHGWONOfQ/zPMUd4/wAlV7SvofpfSm4bo1URsG', 20, 'O+', '1520469458', 'Other', 'Gulshan', 'Dhaka'),
('test2', 'Tester', '180099501', 'test2@gmail.com', '$2y$10$GsXZyOecQc0Na6u2wmU45OlgDNwT1xQq57BHUmIz1sOVdSxNYzFtq', 21, 'O-', '1406985033', 'Other', 'Mohakhali', 'Dhaka'),
('test3', 'Tester', '1450569132', 'test3@gmail.com', '$2y$10$BeNgIBcnZUQptiLgcLBBnONeyz9pLAm6BJhOH1Q8o0Kum7NW.abZy', 22, 'AB+', '025601456980', 'Other', 'Badda', 'Dhaka'),
('test4', 'Tester', '01666565232', 'test4@gmail.com', '$2y$10$JkxxjUlTYqu3lQllKnexF.yQR/LyzyQ/XvEh0jJBKR01pIxgvvXvG', 25, 'B-', '2691578325', 'Other', 'Kurmitola', 'Dhaka'),
('test5', 'Tester', '01118714253', 'test5@gmail.com', '$2y$10$xCUTwth8nE6tJmgpd9asXeeWMMmY9w40TFxrwF7zUZaS1KtAa4a7C', 22, 'A+', '9874412563', 'Other', 'Bashundhara', 'Dhaka'),
('test6', 'Tester', '32145678900', 'test6@gmail.com', '$2y$10$19fncEdOAtoIGC20pgxt5e/XZbSmTJsxJQ5WEsxAfyApproyIM6IW', 37, 'O-', '8974562531', 'Other', 'Khilgaon', 'Dhaka'),
('test7', 'Tester', '01234567899', 'test7@gmail.com', '$2y$10$bAtz2LJYE0/SwJqD4KOlZuOzHZQIcug7evs9rJgAh3GrRFT/s8sMy', 25, 'AB+', '9987444525', 'Other', 'Mugda', 'Dhaka'),
('xordan77', 'Md. Monowarul Islam', '01792652047', 'xordan77@gmail.com', '$2y$10$ltXY.3GI0LThkm96R5yG5.Xyy26Aw0LSStsVPPN6/GqA37ALsGGIy', 21, 'O+', '9714055257', 'Male', 'Uttara', 'Dhaka'),
('yasir88', 'Yasir Ahmed', '01712345678', 'yasir.81@gmail.com', '$2y$10$RwsIjpDUHBCzTyXv9O7.3uLY.qm4AXsURDor6ggv662XhjU5lUdf.', 33, 'B-', '1987654321098', 'Male', 'Mirpur', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_name`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_by` (`request_by`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `venue` (`venue`);

--
-- Indexes for table `donor_list`
--
ALTER TABLE `donor_list`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `report_box`
--
ALTER TABLE `report_box`
  ADD PRIMARY KEY (`report_no`),
  ADD KEY `donor_contact` (`donor_contact`),
  ADD KEY `report_box_ibfk_2` (`reported_by`);

--
-- Indexes for table `request_respond`
--
ALTER TABLE `request_respond`
  ADD KEY `b_request_id` (`b_request_id`),
  ADD KEY `d_respond_id` (`d_respond_id`);

--
-- Indexes for table `trusted_hospitals`
--
ALTER TABLE `trusted_hospitals`
  ADD PRIMARY KEY (`hospital_name`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `NID` (`NID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report_box`
--
ALTER TABLE `report_box`
  MODIFY `report_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD CONSTRAINT `blood_requests_ibfk_1` FOREIGN KEY (`request_by`) REFERENCES `user_list` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`venue`) REFERENCES `trusted_hospitals` (`hospital_name`) ON DELETE CASCADE;

--
-- Constraints for table `donor_list`
--
ALTER TABLE `donor_list`
  ADD CONSTRAINT `donor_list_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_list` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `report_box`
--
ALTER TABLE `report_box`
  ADD CONSTRAINT `report_box_ibfk_1` FOREIGN KEY (`donor_contact`) REFERENCES `user_list` (`contact`),
  ADD CONSTRAINT `report_box_ibfk_2` FOREIGN KEY (`reported_by`) REFERENCES `user_list` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `request_respond`
--
ALTER TABLE `request_respond`
  ADD CONSTRAINT `request_respond_ibfk_1` FOREIGN KEY (`b_request_id`) REFERENCES `blood_requests` (`request_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_respond_ibfk_2` FOREIGN KEY (`d_respond_id`) REFERENCES `donor_list` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
