-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 10:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homeshoppe`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_delete_category`(in id int)
begin
declare done int default 0;
declare continue handler for sqlexception,sqlwarning set done=1;

start transaction;
delete from tbl_category where pk_int_cat_id=id;
delete from tbl_sub_category where fk_int_cat_id=id;
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_delete_product`(in id int)
begin
delete from tbl_product where pk_int_product_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_delete_sub_category`(in id int)
begin
delete from tbl_sub_category where pk_int_sub_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_category`(in vchr_cat_name varchar(20))
begin
insert into tbl_category(vchr_cat_name) values (vchr_cat_name);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_product`(IN `vchr_product_name` VARCHAR(500), IN `int_price` INT(11), IN `vchr_desc` VARCHAR(500), IN `int_quantity` INT(11), IN `fk_int_sub_id` INT(11), IN `selling_price` INT(11), IN `pro_image` VARCHAR(100), IN `side_view` VARCHAR(20))
begin
declare a int default 0;
declare b int default 0;

start transaction;
insert into tbl_product(vchr_product_name,int_price,vchr_desc,fk_int_sub_id,int_selling_price,vchr_product_image,vchr_product_side_view) values (vchr_product_name,int_price,vchr_desc,fk_int_sub_id,selling_price,pro_image,side_view);
set a=last_insert_id();
insert into tbl_stock(fk_int_product_id,int_quantity) values (a,int_quantity);
set b=last_insert_id();
if(a>0 && b>0) then
commit;
else
rollback;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_purchase`(IN `fk_int_product_id` INT(11), IN `quantity` INT(11), IN `int_total_amount` INT(11), IN `fk_int_login_id` INT(11))
begin
declare done int default 0;
declare amt int;
declare dat_date date default CURDATE();
declare exit handler for sqlexception,sqlwarning set done=1;

start transaction;
set dat_date=CURDATE();
set amt=int_total_amount*quantity;
insert into tbl_purchase(fk_int_product_id,int_quantity,int_total_amount,dat_date,fk_int_login_id) values (fk_int_product_id,quantity,amt,dat_date,fk_int_login_id);

update tbl_stock  set int_quantity=int_quantity-quantity where fk_int_product_id=fk_int_product_id;


if done=0 then
commit;
else 
rollback;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_sub_category`(in vchr_sub_name varchar(20),in fk_int_cat_id int)
begin
insert into tbl_sub_category(vchr_sub_name,fk_int_cat_id) values (vchr_sub_name,fk_int_cat_id);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_reg_log`(in fnm varchar(20),in lnm varchar(20),in addrs varchar(40),in mbnum varchar(20),in email varchar(20),in pasword varchar(20))
begin
declare done int default 0;
declare a int default 0;
declare dat date;
declare status varchar(20) default 'Active';
declare continue handler for sqlexception,sqlwarning set done=1;

start transaction;
insert into tbl_login(vchr_email,vchr_password,fk_int_user_role_id) values (email,pasword,2);
set a=last_insert_id();
set dat=CURDATE();
insert into tbl_registration(vchr_fname,vchr_lname,vchr_address,vchr_mobile,fk_int_login_id,dat_date,vchr_status) 
values(fnm,lnm,addrs,mbnum,a,dat,status);
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_suspend_customer`(in id int)
begin
update tbl_registration set vchr_status='Inactive' where pk_int_reg_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_update_category`(id int,name varchar(20))
begin
update tbl_category set vchr_cat_name=name where pk_int_cat_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_update_product`(in id int(11),in name varchar(20),in price int(11),in descr varchar(20),in quantity int(11))
begin
declare done int default 0;
declare exit handler for sqlexception,sqlwarning set done=1;

start transaction;
update tbl_product set vchr_product_name=name,
int_price=price,
vchr_desc=descr where pk_int_product_id=id;

update tbl_stock set int_quantity=quantity where fk_int_product_id=id;
if done=0 then
commit;
else 
rollback;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_update_sub_category`(id int,name varchar(20))
begin
update tbl_sub_category set vchr_sub_name=name where pk_int_sub_id=id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_int_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_cat_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_int_cat_id`, `vchr_cat_name`) VALUES
(1, 'Desktops'),
(2, 'Laptops'),
(3, 'Accessories'),
(4, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `pk_int_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_email` varchar(20) DEFAULT NULL,
  `vchr_password` varchar(20) DEFAULT NULL,
  `fk_int_user_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`pk_int_login_id`, `vchr_email`, `vchr_password`, `fk_int_user_role_id`) VALUES
(1, 'admin@gmail.com', 'admin', 1),
(2, 'neha@gmail.com', 'neha', 2),
(3, 'naji@gmail.com', 'naji', 2),
(4, 'aswathy@gmail.com', 'asw', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pk_int_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_product_name` varchar(500) DEFAULT NULL,
  `int_price` int(11) DEFAULT NULL,
  `vchr_desc` varchar(500) DEFAULT NULL,
  `fk_int_sub_id` int(11) DEFAULT NULL,
  `int_selling_price` int(11) DEFAULT NULL,
  `vchr_product_image` varchar(20) DEFAULT NULL,
  `vchr_product_side_view` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pk_int_product_id`, `vchr_product_name`, `int_price`, `vchr_desc`, `fk_int_sub_id`, `int_selling_price`, `vchr_product_image`, `vchr_product_side_view`) VALUES
(1, 'HP Pavilion', 74000, ' 4th GenCore i5- 8GB RAM- 1TB HDD- 58.42 cm (23)- Windows 8.1- 2GB Graphics', 2, 73350, 'HP-Pavilion.jpg', 'abc.jpg'),
(2, 'HP AIO', 24499, ' AMD E1- 4GB RAM- 500GB HDD- 46.99 cm (18.5)- Ubuntu', 2, 24200, 'HP-AIO-Desktop.jpg', 'abc.jpg'),
(3, 'HP  All-in-1', 29190, ' AMD Dual Core E1-1200- 2GB RAM- 500GB HDD- 46.99 cm (18.5) 3 Years Warranty', 2, 29000, 'HP_All-in-1.jpg', 'abc.jpg'),
(4, 'HP  All-in-1 desk', 31900, 'Pentium Quad Core/2GB/500GB/Windows 8.1/50.8 cm (2', 2, 30000, 'HP_All-in-1_desk.jpg', 'abc.jpg'),
(5, 'Hp-202-G2-dc', 29816, 'dc 4th Gen/2gb/500gb/win8.1 Sl/nodvd/1 Year', 2, 29500, 'Hp-202-G2-dc.jpg', 'abc.jpg'),
(6, 'HP2', 17999, ' 4th Gen Intel Core i3- 2GB RAM- 500GB HDD- Windows 8.1) (Silver)', 2, 16000, 'HP-Mini-desktop.jpg', 'abc.jpg'),
(7, 'Dell Inspiron 3647 D', 27799, 'Dell Inspiron 3647 Small Desktop- Pentium Dual Core- 2 GB RAM- 500 GB HDD- 18.5-Linux', 1, 27500, 'Dell-Inspiron.jpg', 'abc.jpg'),
(8, 'Dell-Optiplex', 31999, 'Dell Optiplex 3020 Desktop PC (4th Gen Intel Core i3- 4GB RAM- 500GB HDD- 46.99 cm (18.5)- Linux) (Black)', 1, 30000, 'Dell-Optiplex.jpg', 'abc.jpg'),
(9, 'Lenovo-G50-70', 28790, '4th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62cm (15.6)- DOS) (Black)', 3, 28500, 'Lenovo-G50-70.jpg', 'abc.jpg'),
(10, 'Lenovo-G50-80', 32799, '5th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62 cm (15.6)- DOS) (Black)', 3, 31100, 'Lenovo-G50-80.jpg', 'abc.jpg'),
(11, 'Lenovo-B40-80', 26990, ' 4th Gen Intel Core i3- 4GB RAM- 500GB HDD- 35.56 cm (14.0)- DOS) (Black)', 3, 26500, 'Lenovo-B40-80.jpg', 'abc.jpg'),
(12, 'Sony-MDR', 699, ' On-Ear Street Style Headphones (Black)', 4, 650, 'Sony-MDR.jpg', 'abc.jpg'),
(13, 'Sony MDR-ZX310', 1500, 'Over Ear Headphones (Black)', 4, 1600, 'Sony-MDR-ZX310.jpg', 'abc.jpg'),
(14, 'K7 Total Security', 1458, '5 Pc/ 1 year', 5, 1500, 'K7 Total.jpg', 'abc.jpg'),
(15, 'Kaspersky Antivirus ', 598, '1Pc / 3 years', 5, 600, 'Kaspersky.jpg', 'abc.jpg'),
(16, 'Kaspersky Internet', 1499, '5 Pc / 1 Year', 5, 1600, 'KasperskyInter.jpg', 'abc.jpg'),
(17, 'Microsoft Office', 3152, '1 year validity, 1 TB  One drive online storage', 6, 3200, 'MS_Office365.jpg', 'abc.jpg'),
(18, 'Ms Office Home-Busin', 15249, '1 Pc lifetime', 6, 15500, 'MS_Home.jpg', 'abc.jpg'),
(19, 'Acer core I3', 27000, '4GB 500 GB Linux 1GB Black', 7, 28000, 'Acer.jpg', 'abc.jpg'),
(20, 'Acer Notebook', 64199, 'Intel core I7-8GB RAM Red', 7, 65000, 'Acer-E5.jpg', 'abc.jpg'),
(21, 'Flexible Keyboard', 499, 'Laptop flexible keyboard', 8, 600, 'DC-Keyboard.jpg', 'abc.jpg'),
(22, 'Ntb Keyboard Acer', 999, 'Ntb laptop keyboard acer aspire', 8, 1200, 'Ntb-Keyboard.jpg', 'abc.jpg'),
(23, 'hp-15', 40323, '5th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62 cm (15.6)- DOS) (Silver)', 10, 40500, 'HP-15.jpg', 'abc.jpg'),
(24, 'HP', 21199, 'Intel Pentium- 4GB RAM- 500GB HDD- 39.62 cm (15.6)- DOS) (Black)', 10, 22000, 'HP-15Lap.jpg', 'abc.jpg'),
(25, 'Toshiba', 21699, 'Intel Celeron-2GB RAM- 500GB HDD- 39.62cm (15.6)- Win8.1) (Premium Black with Silk Logo)', 11, 22500, 'Toshiba.jpg', 'abc.jpg'),
(26, 'Sandisk', 209, 'SanDisk Cruzer Blade USB Flash Drive 8GB', 9, 220, 'SanDisk.jpg', 'abc.jpg'),
(27, 'Sony-Micro', 329, 'Sony Micro Vault 16GB (Black)', 9, 340, 'Sony-Micro.jpg', 'abc.jpg'),
(28, 'Dell-3020', 34880, 'Core I3 4th Gen Desktop And Cpu', 1, 35000, 'Dell-3020.jpg', 'abc.jpg'),
(29, 'Dell 3800', 30990, 'Dell 3800 Desktop (Intel Pentium-2 GB-500 GB-DOS)', 1, 31500, 'Dell-3800.jpg', 'abc.jpg'),
(30, 'Dell AIO', 21699, 'Dell AIO 3010 (AMD E1-2500- 2GB- 500GB- Ubuntu- 49', 1, 22500, 'Dell-AIO.jpg', 'abc.jpg'),
(31, 'Toshiba Satellite C50-A I0013 Laptop', 34000, '3rd GenCore i3 3110M- 2GB RAM- 500GB HDD- 39.62cm (15.6)- DOS (Luxury White Pearl with Inlet Logo)', 11, 36000, 'ToshibaSatellite.jpg', 'abc.jpg'),
(32, 'Toshiba Satellite C50-A I001B Laptop', 29500, '3rd Gen Intel Core i3- 2GB RAM- 500GB HDD- 39.62cm (15.6)- DOS) (Shiny Silver)', 11, 30000, 'ToshibaC50.jpg', 'abc.jpg'),
(33, 'Toshiba Satellite L50-B I0012 Notebook', 26500, '(3rd GenCore i3- 2GB RAM- 500GB HDD- 39.62cm (15.6)- DOS) (Satin Gold) (PSKSSG-00400H)', 11, 27000, 'ToshibaL50.jpg', 'abc.jpg'),
(34, 'Toshiba Satellite', 27499, '4th Gen Intel Core i3- 4 GB RAM- 500GB HDD- 39.62 cm (15.6)- DOS) (Black)', 11, 28500, 'ToshibaPro.jpg', 'abc.jpg'),
(35, 'HP 15-ac044TU Notebook ', 30235, '5th Gen Core i3- 4GB RAM- 500GB HDD- 39.62 cm (15.6)- DOS) (Silver)', 10, 30500, 'HP15ac.jpg', 'abc.jpg'),
(36, 'Dell All in One 3048', 38750, '4th Gen i3-4GB-500GB-19.5 Display-DOS', 1, 39500, 'Dell3048.jpg', 'abc.jpg'),
(37, 'Lenovo B40-45', 28000, 'AMD APU E1- 4GB RAM- 500GB HDD- 35.56cm (14)- DOS- 2GB Graphics) (Black)', 3, 29000, 'LenovoB5045.jpg', 'abc.jpg'),
(38, 'Lenovo G50 Laptop (59-443034)', 39000, '(4th Gen Intel Core i5- 4GB RAM- 1TB HDD- 39.62cm (15.6)- DOS- 2GB Graphics) (Black)', 3, 40000, 'LenovoG50.jpg', 'abc.jpg'),
(39, 'Lenovo Ideapad', 33099, '(4th Gen Core i3- 4GB RAM- 500GB HDD+8GB SSD- 35.81cm (14.1) TS- Win 8.1) (Grey)', 3, 33500, 'LenovoIdea.jpg', 'abc.jpg'),
(40, 'Acer Gateway', 21499, '(4th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62 cm (15.6)- Linux) (Front Panel- Black & Back Panel- Silver)', 7, 21700, 'AcerGateway.jpg', 'abc.jpg'),
(41, 'Acer Aspire E5-573 Notebook', 31499, '5th Gen Intel Core i5- 4GB RAM- 500GB HDD- 39.62 cm (15.6)- Linux) (Gray)', 7, 32500, 'AcerE5-573.jpg', 'abc.jpg'),
(42, 'Acer Aspire E5-571 Notebook', 25999, '(4th Gen Intel Core i3- 4GB RAM- 500GB HDD- 39.62cm (15.6)- Linux) (Black)', 7, 26200, 'AcerE5_571.jpg', 'abc.jpg'),
(43, ' Acer Aspire ES 15 ES1-520-301E', 18799, '(AMD APU E1- 4 GB RAM- 1 TB HDD- 39.62cm (15.6)- Linux) (Diamond Black)', 7, 19000, 'AcerES1520.jpg', 'abc.jpg'),
(44, 'HP 15-ac184tu Notebook', 26499, '(5th Gen Intel Core i3- 4GB RAM- 1TB HDD- 39.62 cm (15.6)- DOS) (Jack Black)', 10, 26600, 'HP-18.jpg', 'abc.jpg'),
(45, 'HP 15-r062tu Notebook ', 30199, ' (4th Gen Intel Core i3- 4GB RAM- 500GB HDD- 39.62cm (15.6)- Ubuntu) (Sparkling Black) (J8B76PA)', 10, 32500, 'HP-R500.jpg', 'abc.jpg'),
(46, 'HP 13-C019TU Stream Notebook ', 16999, '(4th Gen Intel CDC- 2GB RAM- 32GB EMMC- 33.78cm (13.3)- Windows 8.1) (Blue)', 10, 17100, 'HP-13.jpg', 'abc.jpg'),
(47, 'Toshiba Notebook Core I5', 47450, '(4th Generation) 4 Gb 500 Gb 35.56cm(14) Windows 8.1 Silver Black', 11, 49200, 'ToshibaModel.jpg', 'abc.jpg'),
(48, 'Sony MDR-ZX110A Headphone ', 838, 'Without Mic (White), On Ear- Cord,Length : 1.2 Meter,Jack Diameter : 3.5mm Wired- Mic', 4, 845, 'SonyZx.jpg', 'abc.jpg'),
(49, 'Blair Comfy Headphone', 273, 'Blair Comfy On Ear Wired Headphone With Mic Black, Cord Length : 60 Inch,Wired, Stereo headphone for desktop, laptop & netbook with Mic', 4, 285, 'Blair.jpg', 'abc.jpg'),
(51, 'Philips SHE1360/97 Earphones', 115, 'Philips black earphones with no mic', 4, 125, 'Philips-In.jpg', 'abc.jpg'),
(52, 'LG HBS800 AGEUBK', 8927, 'Wireless In-the-ear Bluetooth Headset With Mic, 6 months warranty, Black', 4, 9000, 'LG-Black.jpg', 'abc.jpg'),
(53, 'Keyboard and Mouse Combo', 1790, '2 Years Manufacturer Warranty,Keyboard Mouse, Easy Access Hot Keys Power Switch Longer Battery Life', 8, 1820, 'MsWireless.jpg', 'abc.jpg'),
(54, 'Dell USB Desktop Keyboard', 542, 'USB Color, Black, 6 months warranty', 8, 550, 'Dell-Model.jpg', 'abc.jpg'),
(55, 'LogitechK120USB 2.0 Keyboard', 529, '3 Years Warranty Thin adjustable tilt legs Easy-to-read keys Curved space bar Plug-and-play USB connection Comfortable', 8, 535, 'Logitech.jpg', 'abc.jpg'),
(56, ' Logitech Combo', 829, '3 Years Warranty Compact Design Full-Size,Keys Spill-resistant Design Thin Full-size optical mouse', 8, 832, 'LogitechMK.jpg', 'abc.jpg'),
(57, 'Seagate Expansion Hard Drive', 4200, 'Connectivity : USB 3.0, Color : BLACK, Warranty : 3 YRS ', 9, 4250, 'Seagate.jpg', 'abc.jpg'),
(58, 'HP 1TB Hard Drive', 4790, 'Warranty : 1 Year Warranty Color : Silver and Black Capacity : 1 TB Type : Portable Connectivity : USB 3.0 ', 9, 4810, 'HP-1-TB.jpg', 'abc.jpg'),
(59, 'Storite Mini USB ', 399, 'Storite Mini USB WiFi Dongle Wireless Adapter Network LAN Card 802.11', 9, 420, 'Storite.jpg', 'abc.jpg'),
(60, 'Seagate 2 TB Portable Drive', 7220, 'Seagate,Portable,Black,2TB capacity', 9, 7250, 'Seagate2TB.jpg', 'abc.jpg'),
(61, 'Mcafee Antivirus Plus 2015 ', 99, ' 1 PC 1 Year', 5, 110, 'McAfee.jpg', 'abc.jpg'),
(62, 'K7 Total Security Antivirus', 496, '1 PC/1 Year', 5, 510, 'k7.jpg', 'abc.jpg'),
(63, 'Kaspersky Antivirus 2015', 579, '3 PC 1 Year', 5, 585, 'kasanti.jpg', 'abc.jpg'),
(64, 'MS Office Home and Student', 5439, '1 Year Validity Latest Office Applications 15 GB Online Storage with OneDrive Office Away from Home For a Single PC Usage', 6, 5550, 'Microsoft.jpg', 'abc.jpg'),
(65, 'Microsoft Office 365 - Home', 3529, '1 year validity, h/w requirements:dual core, 1GB,150GB', 6, 3620, 'M365.jpg', 'abc.jpg'),
(66, 'MS office 2013-Proffessional', 32999, 'Lifetime validity, software type:DVD media', 6, 33200, 'M2013.jpg', 'abc.jpg'),
(67, 'MS office Home and Buisness 2013', 13999, 'Lifetime validity', 6, 14200, 'Ms2.jpg', 'abc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `pk_int_purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_int_product_id` int(11) DEFAULT NULL,
  `int_quantity` int(11) DEFAULT NULL,
  `int_total_amount` int(11) DEFAULT NULL,
  `dat_date` date DEFAULT NULL,
  `fk_int_login_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`pk_int_purchase_id`, `fk_int_product_id`, `int_quantity`, `int_total_amount`, `dat_date`, `fk_int_login_id`) VALUES
(1, 11, 1, 26500, '2016-02-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `pk_int_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_fname` varchar(20) DEFAULT NULL,
  `vchr_lname` varchar(20) DEFAULT NULL,
  `vchr_address` varchar(20) DEFAULT NULL,
  `vchr_mobile` varchar(20) DEFAULT NULL,
  `fk_int_login_id` int(11) DEFAULT NULL,
  `dat_date` date DEFAULT NULL,
  `vchr_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`pk_int_reg_id`, `vchr_fname`, `vchr_lname`, `vchr_address`, `vchr_mobile`, `fk_int_login_id`, `dat_date`, `vchr_status`) VALUES
(1, 'neha', 'abdulla', 'thadayil', '9037981593', 2, '2016-01-15', 'Active'),
(2, 'najiya', 'ameer', 'uruloth', '9876543778', 3, '2016-01-15', 'Active'),
(3, 'aswathy', 'das', 'pala', '8786545685', 4, '2016-01-15', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `pk_int_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_int_product_id` int(11) DEFAULT NULL,
  `int_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`pk_int_stock_id`, `fk_int_product_id`, `int_quantity`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 3, 4),
(4, 4, 4),
(5, 5, 4),
(6, 6, 4),
(7, 7, 4),
(8, 8, 4),
(9, 9, 4),
(10, 10, 4),
(11, 11, 4),
(12, 12, 4),
(13, 13, 4),
(14, 14, 4),
(15, 15, 4),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 4),
(22, 22, 4),
(23, 23, 4),
(24, 24, 5),
(25, 25, 5),
(26, 26, 5),
(27, 27, 5),
(28, 28, 5),
(29, 29, 5),
(30, 30, 5),
(31, 31, 5),
(32, 32, 5),
(33, 33, 5),
(34, 34, 5),
(35, 35, 5),
(36, 36, 5),
(37, 37, 5),
(38, 38, 5),
(39, 39, 5),
(40, 40, 5),
(41, 41, 5),
(42, 42, 5),
(43, 43, 5),
(44, 44, 5),
(45, 45, 5),
(46, 46, 5),
(47, 47, 5),
(48, 48, 5),
(49, 49, 5),
(50, 50, 5),
(51, 51, 5),
(52, 52, 5),
(53, 53, 5),
(54, 54, 5),
(55, 55, 5),
(56, 56, 5),
(57, 57, 5),
(58, 58, 5),
(59, 59, 5),
(60, 60, 5),
(61, 61, 5),
(62, 62, 5),
(63, 63, 5),
(64, 64, 5),
(65, 65, 5),
(66, 66, 5),
(67, 67, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_category` (
  `pk_int_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_sub_name` varchar(20) DEFAULT NULL,
  `fk_int_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`pk_int_sub_id`, `vchr_sub_name`, `fk_int_cat_id`) VALUES
(1, 'Dell', 1),
(2, 'hp', 1),
(3, 'Lenovo', 2),
(4, 'Headphone', 3),
(5, 'antivirus', 4),
(6, 'Office', 4),
(7, 'Acer', 2),
(8, 'Keyboards', 3),
(9, 'USB', 3),
(10, 'hp', 2),
(11, 'Toshiba', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `pk_int_user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`pk_int_user_role_id`, `vchr_username`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `te`
--

CREATE TABLE IF NOT EXISTS `te` (
  `hi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `te`
--

INSERT INTO `te` (`hi`) VALUES
('hjdsflkjdshflkjsdhfkljsfhkljdshkf sdjlkfhlkjshflkjsnfl kdsjhfkjshf klkjdshfkl jkjdfhksjdh fkjdsfh kdjsf hkdjsfh kdjs fhkj87470823 hkjddshflkj 89329u923 jsdhfkjd f892374923492 jsddfbkjlsd fkju23894 hjkewhf'),
('hjdsflkjdshflkjsdhfkljsfhkljdshkf sdjlkfhlkjshflkjsnfl kdsjhfkjshf klkjdshfkl jkjdfhksjdh fkjdsfh kdjsf hkdjsfh kdjs fhkj87470823 hkjddshflkj 89329u923 jsdhfkjd f892374923492 jsddfbkjlsd fkju23894 hjkewhfhf;ewhflehwf;lehf;lqejhfhlqjriqw erer uruofreiuofueroiruorfiueroiueroioeirugoieruoeri eroirugioer oieruoierioeferfoejflk ioefuji erfp oierfu ief uioef oirefuioer ufeiufoeufpi eofuiofpefioufpf eoifu fuioeu fieufoih efiohefoehrf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
