/*
Navicat MySQL Data Transfer

Source Server         : E0
Source Server Version : 50173
Source Host           : localhost:3306
Source Database       : course_dery

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-10-15 08:58:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `berita`
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `headline` text NOT NULL,
  `isi` text NOT NULL,
  `pengirim` varchar(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES ('1', '1', 'JUDUL 1', 'HEADLINE 1', 'ISI 1', 'PENGIRIM 1', '2018-08-02 14:23:36');
INSERT INTO `berita` VALUES ('2', '1', 'BERITA 2', 'HEADLINE 2', 'ISI 2', 'PENGIRIm 2', '2018-08-02 14:32:49');
INSERT INTO `berita` VALUES ('3', '1', 'BERITA 2', 'HEADLINE 2', 'ISI 2', 'PENGIRIm 2', '2018-08-02 14:33:05');
INSERT INTO `berita` VALUES ('4', '1', 'BERITA 2', 'HEADLINE 2', 'ISI 2', 'PENGIRIm 2', '2018-08-02 14:35:11');
INSERT INTO `berita` VALUES ('5', '1', 'BERITA 2', 'HEADLINE 2', 'ISI 2', 'PENGIRIm 2', '2018-08-06 08:31:25');

-- ----------------------------
-- Table structure for `cashbook_category`
-- ----------------------------
DROP TABLE IF EXISTS `cashbook_category`;
CREATE TABLE `cashbook_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cashbook_category
-- ----------------------------
INSERT INTO `cashbook_category` VALUES ('1', 'Sales', 'I');
INSERT INTO `cashbook_category` VALUES ('2', 'Purchase', 'E');
INSERT INTO `cashbook_category` VALUES ('3', 'Cleansing', 'E');

-- ----------------------------
-- Table structure for `cleaning`
-- ----------------------------
DROP TABLE IF EXISTS `cleaning`;
CREATE TABLE `cleaning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `scheduled_to_start_at` datetime DEFAULT NULL,
  `scheduled_to_finished_at` datetime DEFAULT NULL,
  `actual_start_at` datetime DEFAULT NULL,
  `actual_finished_at` datetime DEFAULT NULL,
  `responsibility_of` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cleaning
-- ----------------------------
INSERT INTO `cleaning` VALUES ('7', '99999992', null, null, null, null, null, null, '2', '4', '2018-09-10 04:57:12');
INSERT INTO `cleaning` VALUES ('8', '546546547', null, null, null, null, null, null, '2', '4', '2018-09-10 04:57:12');
INSERT INTO `cleaning` VALUES ('9', '234234243', null, null, null, null, null, null, '2', '4', '2018-09-10 04:57:12');
INSERT INTO `cleaning` VALUES ('10', '234234243', null, null, null, null, null, null, '2', '1', '2018-09-10 08:22:38');
INSERT INTO `cleaning` VALUES ('11', '99999992', null, null, null, null, null, null, '2', '1', '2018-09-10 08:22:38');
INSERT INTO `cleaning` VALUES ('12', '546546547', null, null, null, null, null, null, '2', '1', '2018-09-10 08:22:38');

-- ----------------------------
-- Table structure for `coa`
-- ----------------------------
DROP TABLE IF EXISTS `coa`;
CREATE TABLE `coa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_code` int(4) unsigned zerofill DEFAULT NULL,
  `account_title` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(1) DEFAULT NULL,
  `account_class` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coa
-- ----------------------------
INSERT INTO `coa` VALUES ('1', null, 'Penjualan', 'Goods Sale', 'C', 'A');
INSERT INTO `coa` VALUES ('2', null, 'Pembelian', 'Purchase Goods', 'D', 'A');
INSERT INTO `coa` VALUES ('3', null, 'Pinjaman karyawan', 'Employee Loan', 'D', 'A');
INSERT INTO `coa` VALUES ('4', null, 'Pembayaran listrik', 'Electricity Bill', 'D', 'L');
INSERT INTO `coa` VALUES ('5', null, 'Pembayaran air', 'Water Bill', 'D', 'L');
INSERT INTO `coa` VALUES ('6', null, 'Pembayaran telpon', 'Phone Bill', 'D', 'L');
INSERT INTO `coa` VALUES ('7', null, 'Jasa', 'Service', 'C', 'A');
INSERT INTO `coa` VALUES ('8', null, 'Sumbangan', 'Company Social Responsibility', 'D', 'L');
INSERT INTO `coa` VALUES ('9', null, 'Gaji karyawan', 'Employee Salary', 'D', 'L');
INSERT INTO `coa` VALUES ('10', null, 'Gaji owner', 'Owner Salary', 'D', 'L');
INSERT INTO `coa` VALUES ('11', null, 'Modal', 'Equity', 'C', 'M');
INSERT INTO `coa` VALUES ('12', null, 'Profit Share', 'Profit Share', 'D', 'M');
INSERT INTO `coa` VALUES ('13', null, 'Piutang', 'Account Receivable', 'D', 'A');
INSERT INTO `coa` VALUES ('14', null, 'Rekening Antar Toko', 'Interstore Account', 'C', null);
INSERT INTO `coa` VALUES ('15', null, 'Rekening Antar Toko', 'Interstore Account', 'D', null);
INSERT INTO `coa` VALUES ('16', null, 'Hutang', 'Account Payable', 'C', null);
INSERT INTO `coa` VALUES ('17', null, 'Lain - lain', 'Others Asset', 'C', 'A');
INSERT INTO `coa` VALUES ('18', null, 'Lain - lain', 'Others Liability', 'D', 'L');

-- ----------------------------
-- Table structure for `coa_copy`
-- ----------------------------
DROP TABLE IF EXISTS `coa_copy`;
CREATE TABLE `coa_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_code` int(3) unsigned zerofill DEFAULT NULL,
  `account_group_title` varchar(255) DEFAULT NULL,
  `account_title` varchar(255) DEFAULT NULL,
  `account_increase` int(11) DEFAULT NULL,
  `account_descriptions` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`account_code`,`account_group_title`,`account_title`,`account_increase`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coa_copy
-- ----------------------------
INSERT INTO `coa_copy` VALUES ('2', '1000', 'Bank', 'Wachovia Checking', '1', null);
INSERT INTO `coa_copy` VALUES ('3', '1001', 'Bank', 'Wachovia Money Market', '1', null);
INSERT INTO `coa_copy` VALUES ('4', '1200', 'Accounts Receivable', 'Accounts Receivable', '1', null);
INSERT INTO `coa_copy` VALUES ('5', '1499', 'Other Current Asset', 'Undeposited Funds', '1', null);
INSERT INTO `coa_copy` VALUES ('6', '1500', 'Other Current Asset', 'Inventory Assett', '1', null);
INSERT INTO `coa_copy` VALUES ('7', '2100', 'Other Current Liability', 'Payroll Liabilities', '2', null);
INSERT INTO `coa_copy` VALUES ('8', '2200', 'Other Current Liability', 'Sales Tax Collected', '2', null);
INSERT INTO `coa_copy` VALUES ('9', '1110', 'Equity', 'Retained Earnings', '1', null);
INSERT INTO `coa_copy` VALUES ('10', '1130', 'Equity', 'Owner\'s Capital', '1', null);
INSERT INTO `coa_copy` VALUES ('11', '1140', 'Equity', 'Investments', '1', null);
INSERT INTO `coa_copy` VALUES ('13', '1150', 'Equity', 'Draws', '1', null);
INSERT INTO `coa_copy` VALUES ('14', '3000', 'Equity', 'Opening Bal Equity', '1', null);
INSERT INTO `coa_copy` VALUES ('15', '4000', 'Income', 'Showcase Sales', '1', null);
INSERT INTO `coa_copy` VALUES ('16', '4005', 'Income', 'Special Order/Memo Sales', '1', null);
INSERT INTO `coa_copy` VALUES ('17', '4010', 'Income', 'Shop Sales', '1', null);
INSERT INTO `coa_copy` VALUES ('18', '4011', 'Income', 'Repair Sales', '1', null);
INSERT INTO `coa_copy` VALUES ('19', '4012', 'Income', 'Custom Design Sales', '1', null);
INSERT INTO `coa_copy` VALUES ('20', '4020', 'Income', 'Outside Services', '1', null);
INSERT INTO `coa_copy` VALUES ('22', '4021', 'Income', 'Watch Repair', '1', null);
INSERT INTO `coa_copy` VALUES ('23', '4022', 'Income', 'Stringing', '1', null);
INSERT INTO `coa_copy` VALUES ('24', '4023', 'Income', 'Other Outside Services', '1', null);
INSERT INTO `coa_copy` VALUES ('25', '4030', 'Income', 'Sales Discounts', '1', null);
INSERT INTO `coa_copy` VALUES ('26', '5000', 'Cost of Goods Sold', 'Showcase Cost of Goods Sold', '1', null);
INSERT INTO `coa_copy` VALUES ('27', '5005', 'Cost of Goods Sold', 'Special Order/Memo Cost of Good', '1', null);
INSERT INTO `coa_copy` VALUES ('28', '5010', 'Cost of Goods Sold', 'Shop Costs of Goods', '1', null);
INSERT INTO `coa_copy` VALUES ('29', '5011', 'Cost of Goods Sold', 'Outside Labor', '1', null);
INSERT INTO `coa_copy` VALUES ('30', '5012', 'Cost of Goods Sold', 'Shop Stones', '1', null);
INSERT INTO `coa_copy` VALUES ('31', '5013', 'Cost of Goods Sold', 'Findings/Mtgs/Gold', '1', null);
INSERT INTO `coa_copy` VALUES ('32', '5014', 'Cost of Goods Sold', 'Stringing', '1', null);
INSERT INTO `coa_copy` VALUES ('33', '5015', 'Cost of Goods Sold', 'Watch Repair', '1', null);
INSERT INTO `coa_copy` VALUES ('34', '5020', 'Cost of Goods Sold', 'Outside Services COG', '1', null);
INSERT INTO `coa_copy` VALUES ('35', '5021', 'Cost of Goods Sold', 'Watch Repair', '1', null);
INSERT INTO `coa_copy` VALUES ('36', '5022', 'Cost of Goods Sold', 'Stringing', '1', null);
INSERT INTO `coa_copy` VALUES ('37', '5023', 'Cost of Goods Sold', 'Other Outside Services', '1', null);
INSERT INTO `coa_copy` VALUES ('38', '6000', 'Expense', 'Advertising', '1', null);
INSERT INTO `coa_copy` VALUES ('39', '6001', 'Expense', 'Billboard', '1', null);
INSERT INTO `coa_copy` VALUES ('40', '6002', 'Expense', 'Newspaper/Magazine', '1', null);
INSERT INTO `coa_copy` VALUES ('41', '6003', 'Expense', 'Radio', '1', null);
INSERT INTO `coa_copy` VALUES ('42', '6004', 'Expense', 'T.V./Cable', '1', null);
INSERT INTO `coa_copy` VALUES ('43', '6005', 'Expense', 'Direct Mail', '1', null);
INSERT INTO `coa_copy` VALUES ('44', '6006', 'Expense', 'Promotional/Give a way', '1', null);
INSERT INTO `coa_copy` VALUES ('45', '6007', 'Expense', 'Yellow Pages', '1', null);
INSERT INTO `coa_copy` VALUES ('46', '6110', 'Expense', 'Automobile Expense', '1', null);
INSERT INTO `coa_copy` VALUES ('47', '6115', 'Expense', 'Computer', '1', null);
INSERT INTO `coa_copy` VALUES ('48', '6116', 'Expense', 'Hardware', '1', null);
INSERT INTO `coa_copy` VALUES ('49', '6117', 'Expense', 'Software', '1', null);
INSERT INTO `coa_copy` VALUES ('50', '6118', 'Expense', 'Maintenence', '1', null);
INSERT INTO `coa_copy` VALUES ('51', '6119', 'Expense', 'Website', '1', null);
INSERT INTO `coa_copy` VALUES ('52', '6120', 'Expense', 'Bank Service Charges', '1', null);
INSERT INTO `coa_copy` VALUES ('53', '6121', 'Expense', 'Bank Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('54', '6122', 'Expense', 'Credit Card Merchant Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('55', '6130', 'Expense', 'Cash Discounts', '1', null);
INSERT INTO `coa_copy` VALUES ('56', '6140', 'Expense', 'Contributions', '1', null);
INSERT INTO `coa_copy` VALUES ('57', '6150', 'Expense', 'Depreciation Expense', '1', null);
INSERT INTO `coa_copy` VALUES ('58', '6160', 'Expense', 'Dues and Subscriptions', '1', null);
INSERT INTO `coa_copy` VALUES ('59', '6170', 'Expense', 'Equipment Rental', '1', null);
INSERT INTO `coa_copy` VALUES ('60', '6180', 'Expense', 'Insurance', '1', null);
INSERT INTO `coa_copy` VALUES ('61', '6182', 'Expense', 'Health Insurance', '1', null);
INSERT INTO `coa_copy` VALUES ('62', '6185', 'Expense', 'Jewelers Block', '1', null);
INSERT INTO `coa_copy` VALUES ('63', '6190', 'Expense', 'Disability Insurance', '1', null);
INSERT INTO `coa_copy` VALUES ('64', '6200', 'Expense', 'Interest Expense', '1', null);
INSERT INTO `coa_copy` VALUES ('65', '6210', 'Expense', 'Finance Charge', '1', null);
INSERT INTO `coa_copy` VALUES ('66', '6220', 'Expense', 'Loan Interest', '1', null);
INSERT INTO `coa_copy` VALUES ('67', '6375', 'Expense', 'Mortgage', '1', null);
INSERT INTO `coa_copy` VALUES ('68', '6230', 'Expense', 'Licenses and Permits', '1', null);
INSERT INTO `coa_copy` VALUES ('69', '6240', 'Expense', 'Miscellaneous', '1', null);
INSERT INTO `coa_copy` VALUES ('70', '6250', 'Expense', 'Postage and Delivery', '1', null);
INSERT INTO `coa_copy` VALUES ('71', '6260', 'Expense', 'Printing and Reproduction', '1', null);
INSERT INTO `coa_copy` VALUES ('72', '6265', 'Expense', 'Filing Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('73', '6270', 'Expense', 'Professional Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('74', '6275', 'Expense', 'Business Consulting', '1', null);
INSERT INTO `coa_copy` VALUES ('75', '6280', 'Expense', 'Legal Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('76', '6650', 'Expense', 'Accounting', '1', null);
INSERT INTO `coa_copy` VALUES ('77', '6285', 'Expense', 'Franchise Fees', '1', null);
INSERT INTO `coa_copy` VALUES ('78', '6290', 'Expense', 'Rent', '1', null);
INSERT INTO `coa_copy` VALUES ('79', '6300', 'Expense', 'Repairs', '1', null);
INSERT INTO `coa_copy` VALUES ('80', '6310', 'Expense', 'Building Repairs', '1', null);
INSERT INTO `coa_copy` VALUES ('81', '6320', 'Expense', 'Computer Repairs', '1', null);
INSERT INTO `coa_copy` VALUES ('82', '6330', 'Expense', 'Equipment Repairs', '1', null);
INSERT INTO `coa_copy` VALUES ('83', '6340', 'Expense', 'Telephone', '1', null);
INSERT INTO `coa_copy` VALUES ('84', '6341', 'Expense', 'Telephone', '1', null);
INSERT INTO `coa_copy` VALUES ('85', '6342', 'Expense', 'Long Distance', '1', null);
INSERT INTO `coa_copy` VALUES ('86', '6343', 'Expense', 'Cellular', '1', null);
INSERT INTO `coa_copy` VALUES ('87', '6350', 'Expense', 'Travel & Ent', '1', null);
INSERT INTO `coa_copy` VALUES ('88', '6360', 'Expense', 'Entertainment', '1', null);
INSERT INTO `coa_copy` VALUES ('89', '6370', 'Expense', 'Meals', '1', null);
INSERT INTO `coa_copy` VALUES ('90', '6380', 'Expense', 'Travel', '1', null);
INSERT INTO `coa_copy` VALUES ('91', '6390', 'Expense', 'Utilities', '1', null);
INSERT INTO `coa_copy` VALUES ('92', '6400', 'Expense', 'Gas and Electric', '1', null);
INSERT INTO `coa_copy` VALUES ('93', '6405', 'Expense', 'Alarm', '1', null);
INSERT INTO `coa_copy` VALUES ('94', '6410', 'Expense', 'Water', '1', null);
INSERT INTO `coa_copy` VALUES ('95', '6560', 'Expense', 'Payroll Expenses', '1', null);
INSERT INTO `coa_copy` VALUES ('96', '6770', 'Expense', 'Supplies', '1', null);
INSERT INTO `coa_copy` VALUES ('97', '6780', 'Expense', 'Marketing', '1', null);
INSERT INTO `coa_copy` VALUES ('98', '6790', 'Expense', 'Office', '1', null);
INSERT INTO `coa_copy` VALUES ('99', '6820', 'Expense', 'Taxes', '1', null);
INSERT INTO `coa_copy` VALUES ('100', '6830', 'Expense', 'Federal', '1', null);
INSERT INTO `coa_copy` VALUES ('101', '6840', 'Expense', 'Local', '1', null);
INSERT INTO `coa_copy` VALUES ('102', '6850', 'Expense', 'Property', '1', null);
INSERT INTO `coa_copy` VALUES ('103', '6860', 'Expense', 'State', '1', null);
INSERT INTO `coa_copy` VALUES ('104', '7010', 'Other Income', 'Interest Income', '1', null);
INSERT INTO `coa_copy` VALUES ('105', '7030', 'Other Income', 'Other Income', '1', null);
INSERT INTO `coa_copy` VALUES ('106', '8010', 'Other Expense', 'Other Expenses', '1', null);

-- ----------------------------
-- Table structure for `conversion`
-- ----------------------------
DROP TABLE IF EXISTS `conversion`;
CREATE TABLE `conversion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_type` int(10) unsigned DEFAULT NULL,
  `product_class` int(11) DEFAULT NULL,
  `currency` text,
  `value_pergram` float unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conversion
-- ----------------------------
INSERT INTO `conversion` VALUES ('1', '1', '1', 'IDR', '400000');
INSERT INTO `conversion` VALUES ('2', '1', '2', 'IDR', '200000');
INSERT INTO `conversion` VALUES ('3', '1', '3', 'IDR', '200000');
INSERT INTO `conversion` VALUES ('4', '1', '4', 'IDR', '200000');
INSERT INTO `conversion` VALUES ('5', '1', '5', 'IDR', '200000');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` text,
  `customer_contact` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for `employees_copy`
-- ----------------------------
DROP TABLE IF EXISTS `employees_copy`;
CREATE TABLE `employees_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text,
  `tanggal_lahir` date DEFAULT NULL,
  `telp` text,
  `alamat` text,
  `peran` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employees_copy
-- ----------------------------
INSERT INTO `employees_copy` VALUES ('1', 'Derry Fauzy', null, '912', 'KOTA A', '5', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('2', 'Fitri Elita', null, '234', 'KOTA A', '1', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('3', 'Rina Marhasyani', null, '623', 'KOTA A', '2', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('4', 'Lydia Walewangko', null, '9125', 'KOTA A', '3', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('5', 'Euis Muthia Cahayarani', null, '9124', 'KOTA A', '4', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('6', 'Togu Hutagalung', null, '9124', 'KOTA A', '1', '2018-07-03 14:45:03');
INSERT INTO `employees_copy` VALUES ('7', 'Lulu Hamidah', null, '1231', 'KOTA B', '1', '2018-07-03 14:45:03');

-- ----------------------------
-- Table structure for `employee_facilities`
-- ----------------------------
DROP TABLE IF EXISTS `employee_facilities`;
CREATE TABLE `employee_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `descriptions` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_facilities
-- ----------------------------
INSERT INTO `employee_facilities` VALUES ('1', '1', '6000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('2', '2', '5000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('3', '3', '5600000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('4', '5', '7800000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('5', '6', '1500000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('6', '7', '8000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_facilities` VALUES ('7', '8', '4000000', null, null, '2018-07-03 14:45:03', null, null);

-- ----------------------------
-- Table structure for `employee_salaries`
-- ----------------------------
DROP TABLE IF EXISTS `employee_salaries`;
CREATE TABLE `employee_salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `salary_amount` float(11,0) DEFAULT NULL,
  `descriptions` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_salaries
-- ----------------------------
INSERT INTO `employee_salaries` VALUES ('1', '1', '6000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('2', '2', '5000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('3', '3', '5600000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('4', '5', '7800000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('5', '6', '1500000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('6', '7', '8000000', null, null, '2018-07-03 14:45:03', null, null);
INSERT INTO `employee_salaries` VALUES ('7', '8', '4000000', null, null, '2018-07-03 14:45:03', null, null);

-- ----------------------------
-- Table structure for `inventory`
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `gram` float DEFAULT NULL,
  `tanggal_beli` datetime DEFAULT NULL,
  `tanggal_jual` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO `inventory` VALUES ('1', '1', '100', '2018-07-01 09:42:12', null);
INSERT INTO `inventory` VALUES ('2', '2', '140', '2018-07-01 09:42:12', null);

-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(3) unsigned NOT NULL,
  `nm_kategori` varchar(30) NOT NULL DEFAULT '',
  `deskripsi` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'olahraga', '');
INSERT INTO `kategori` VALUES ('2', 'kultur', '');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Administrator', null, '0');
INSERT INTO `menus` VALUES ('2', 'Front Lines', null, '0');
INSERT INTO `menus` VALUES ('3', 'Warehouse', null, '0');
INSERT INTO `menus` VALUES ('4', 'Management', null, '0');
INSERT INTO `menus` VALUES ('5', 'Dashboard', null, '4');
INSERT INTO `menus` VALUES ('6', 'Building', null, '4');
INSERT INTO `menus` VALUES ('7', 'List', null, '6');
INSERT INTO `menus` VALUES ('8', 'Expense', null, '6');
INSERT INTO `menus` VALUES ('9', 'Employment', null, '4');
INSERT INTO `menus` VALUES ('10', 'Add Staff', null, '9');
INSERT INTO `menus` VALUES ('11', 'Staff List', null, '9');
INSERT INTO `menus` VALUES ('12', 'Facilities', null, '9');
INSERT INTO `menus` VALUES ('13', 'Salary', null, '9');
INSERT INTO `menus` VALUES ('14', 'Reports', null, '4');
INSERT INTO `menus` VALUES ('15', 'Cash Report', null, '14');
INSERT INTO `menus` VALUES ('16', 'Sales Report', null, '14');
INSERT INTO `menus` VALUES ('17', 'Purchases Report', null, '14');
INSERT INTO `menus` VALUES ('18', 'Inventory Report', null, '14');
INSERT INTO `menus` VALUES ('19', 'Dashboard', null, '3');
INSERT INTO `menus` VALUES ('20', 'Product', null, '3');
INSERT INTO `menus` VALUES ('21', 'Stock Opname', null, '3');
INSERT INTO `menus` VALUES ('22', 'Cleaner', null, '3');
INSERT INTO `menus` VALUES ('23', 'Schedule', null, '22');
INSERT INTO `menus` VALUES ('24', 'Cleanse', null, '22');
INSERT INTO `menus` VALUES ('25', 'Inventory', null, '20');
INSERT INTO `menus` VALUES ('26', 'Add Product', null, '20');
INSERT INTO `menus` VALUES ('27', 'Stock', null, '20');
INSERT INTO `menus` VALUES ('28', 'Adjust Stock', null, '27');
INSERT INTO `menus` VALUES ('29', 'Transfer to Shop', null, '27');
INSERT INTO `menus` VALUES ('30', 'Sale', null, '2');
INSERT INTO `menus` VALUES ('31', 'Purchase', null, '2');
INSERT INTO `menus` VALUES ('32', 'History', null, '2');
INSERT INTO `menus` VALUES ('33', 'Menu', null, '1');
INSERT INTO `menus` VALUES ('34', 'User/Role', null, '1');
INSERT INTO `menus` VALUES ('35', 'Configuration', null, '1');
INSERT INTO `menus` VALUES ('36', 'Add New', null, '33');
INSERT INTO `menus` VALUES ('37', 'List', null, '33');
INSERT INTO `menus` VALUES ('38', 'Assignment', null, '33');
INSERT INTO `menus` VALUES ('39', 'Add New User', null, '34');
INSERT INTO `menus` VALUES ('40', 'List', null, '34');
INSERT INTO `menus` VALUES ('41', 'Assignment', null, '34');
INSERT INTO `menus` VALUES ('42', 'Role', null, '34');
INSERT INTO `menus` VALUES ('43', 'Add New Role', null, '42');
INSERT INTO `menus` VALUES ('44', 'List', null, '42');

-- ----------------------------
-- Table structure for `menus_map`
-- ----------------------------
DROP TABLE IF EXISTS `menus_map`;
CREATE TABLE `menus_map` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_index` (`menu_id`,`role_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus_map
-- ----------------------------
INSERT INTO `menus_map` VALUES ('1', '1', '5');
INSERT INTO `menus_map` VALUES ('45', '2', '1');
INSERT INTO `menus_map` VALUES ('51', '2', '2');
INSERT INTO `menus_map` VALUES ('2', '2', '5');
INSERT INTO `menus_map` VALUES ('3', '3', '5');
INSERT INTO `menus_map` VALUES ('4', '4', '5');
INSERT INTO `menus_map` VALUES ('5', '5', '5');
INSERT INTO `menus_map` VALUES ('6', '6', '5');
INSERT INTO `menus_map` VALUES ('7', '7', '5');
INSERT INTO `menus_map` VALUES ('8', '8', '5');
INSERT INTO `menus_map` VALUES ('9', '9', '5');
INSERT INTO `menus_map` VALUES ('10', '10', '5');
INSERT INTO `menus_map` VALUES ('11', '11', '5');
INSERT INTO `menus_map` VALUES ('12', '12', '5');
INSERT INTO `menus_map` VALUES ('13', '13', '5');
INSERT INTO `menus_map` VALUES ('14', '14', '5');
INSERT INTO `menus_map` VALUES ('15', '15', '5');
INSERT INTO `menus_map` VALUES ('16', '16', '5');
INSERT INTO `menus_map` VALUES ('17', '17', '5');
INSERT INTO `menus_map` VALUES ('18', '18', '5');
INSERT INTO `menus_map` VALUES ('19', '19', '5');
INSERT INTO `menus_map` VALUES ('20', '20', '5');
INSERT INTO `menus_map` VALUES ('21', '21', '5');
INSERT INTO `menus_map` VALUES ('22', '22', '5');
INSERT INTO `menus_map` VALUES ('23', '23', '5');
INSERT INTO `menus_map` VALUES ('24', '24', '5');
INSERT INTO `menus_map` VALUES ('25', '25', '5');
INSERT INTO `menus_map` VALUES ('26', '26', '5');
INSERT INTO `menus_map` VALUES ('27', '27', '5');
INSERT INTO `menus_map` VALUES ('28', '28', '5');
INSERT INTO `menus_map` VALUES ('29', '29', '5');
INSERT INTO `menus_map` VALUES ('46', '30', '1');
INSERT INTO `menus_map` VALUES ('52', '30', '2');
INSERT INTO `menus_map` VALUES ('30', '30', '5');
INSERT INTO `menus_map` VALUES ('47', '31', '1');
INSERT INTO `menus_map` VALUES ('53', '31', '2');
INSERT INTO `menus_map` VALUES ('31', '31', '5');
INSERT INTO `menus_map` VALUES ('48', '32', '1');
INSERT INTO `menus_map` VALUES ('54', '32', '2');
INSERT INTO `menus_map` VALUES ('32', '32', '5');
INSERT INTO `menus_map` VALUES ('33', '33', '5');
INSERT INTO `menus_map` VALUES ('34', '34', '5');
INSERT INTO `menus_map` VALUES ('35', '35', '5');
INSERT INTO `menus_map` VALUES ('36', '36', '5');
INSERT INTO `menus_map` VALUES ('37', '37', '5');
INSERT INTO `menus_map` VALUES ('38', '38', '5');
INSERT INTO `menus_map` VALUES ('39', '39', '5');
INSERT INTO `menus_map` VALUES ('40', '40', '5');
INSERT INTO `menus_map` VALUES ('41', '41', '5');
INSERT INTO `menus_map` VALUES ('42', '42', '5');
INSERT INTO `menus_map` VALUES ('43', '43', '5');
INSERT INTO `menus_map` VALUES ('44', '44', '5');

-- ----------------------------
-- Table structure for `options`
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `options_name` varchar(100) DEFAULT NULL,
  `options_value` longtext,
  `autoload` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('21', 'timezone', 'Indonesia/Jakarta', '1');
INSERT INTO `options` VALUES ('22', 'cashbook_name', 'Store1', '0');
INSERT INTO `options` VALUES ('23', 'cashbook_description', 'Daily expense and income', '0');
INSERT INTO `options` VALUES ('24', 'currency', 'IDR', '0');
INSERT INTO `options` VALUES ('25', 'cashbook_balance_starting', '0', '0');
INSERT INTO `options` VALUES ('26', 'cashbook_income_category_1', 'Monthly Salary', '0');
INSERT INTO `options` VALUES ('27', 'cashbook_income_category_2', 'Overtime Bonus', '0');
INSERT INTO `options` VALUES ('28', 'cashbook_expense_category_1', 'Grocery', '0');
INSERT INTO `options` VALUES ('29', 'cashbook_expense_category_1\r\ncashbook_expense_category_2', 'Car Maintenance', '0');

-- ----------------------------
-- Table structure for `person_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `person_profiles`;
CREATE TABLE `person_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cellular` varchar(255) DEFAULT NULL,
  `gender_id` tinyint(1) DEFAULT '1',
  `avatar_filename` text,
  `shipping_address` longtext,
  `city` longtext,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `highest_education_level` varchar(255) DEFAULT NULL,
  `religion_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of person_profiles
-- ----------------------------
INSERT INTO `person_profiles` VALUES ('4', 'SAKTI BUANA', 'sakti.buana@arthipesa.com', '+6285720502217', '1', 'user4', '2', null, null, null, null, '1', '2016-09-09 14:49:11', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('5', 'ASTRID NURUL FALAH', 'astrid.nurul@arthipesa.com', null, '0', 'user5', '0', null, null, null, null, '1', '2016-09-09 14:49:11', '2016-09-09 14:49:11');
INSERT INTO `person_profiles` VALUES ('16', 'Administrator', null, null, '1', '2', '2', null, null, null, null, '1', '2016-09-09 14:49:11', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('18', 'RIANA MAYADITYA', 'rmayaditya@arthipesa.co.id', '+6281320406040', '0', '2', '9', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('19', 'YUDHA SENJAYA PUTRA', 'yputra@arthipesa.co.id', '+628122066626', '1', '3', '8', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('20', 'HANY YANUAR SUDJANA', 'hsudjana@arthipesa.co.id', '+628122236464', '0', '4', '6', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('21', 'WIDHAN RIANDI', 'wriandi@arthipesa.co.id', '+6285721047314', '1', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('22', 'R. YOGI SOEBAGJA', 'ysoebagja@arthipesa.co.id', '+628112294439', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('23', 'GIAN HASSAN YUDISTHIRA', 'gyudisthira@arthipesa.co.id', '+6285720062646', '1', '1', '10', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('24', 'REZA TEDDY YUDHIKA', 'ryudhika@arthipesa.co.id', '+6285221444681', '1', '1', '2', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('26', 'HERMAWAN BUDIMAN', 'hbudiman@arthipesa.co.id', '+6287821292347', '1', '2', '7', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('27', 'IWAN GARTIWA DEWANTARA', 'idewantara@arthipesa.co.id', '+6281572297033', '1', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('28', 'BAYU NOVI PUTRA UTAMA', 'butama@arthipesa.co.id', '+6281322783061', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('29', 'NAZARO AULANY PRIYADI', 'npriyadi@arthipesa.co.id', '+6287708772826', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('30', 'NOVI HERDIANI GILANG PAMEKAR', 'npamekar@arthipesa.co.id', '+6285720331992', '0', '0', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('31', 'MOHAMMAD ARIF NUGROHO', 'msnugroho@arthipesa.co.id', '+628112377744', '1', '2', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('32', 'TIARA LAVERITA PRUNCHIA', 'tprunchia@arthipesa.co.id', '+6285721801269', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('33', 'KHARISYA BELLA', 'kbella@arthipesa.co.id', '+6283829151698', '0', '2', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('34', 'ROMA ANGGARA', 'ranggara@arthipesa.co.id', '+6281221198611', '1', '2', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('35', 'MUHAMMAD ARFANA', 'marfana@arthipesa.co.id', '+6285659000904', '1', '2', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('36', 'ASMI FAUZIAH', 'asfauziah@arthipesa.co.id', '+6285743313695', '0', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('37', 'GANJAR OKTAYANA', 'goktayana@arthipesa.co.id', '+6285624776343', '1', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('38', 'LERRY MANGGARA PUTRA', 'leputra@arthipesa.co.id', '+62818211794', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('39', 'ADITYA GINANJAR MARTADIREDJA', 'amartadiredja@arthipesa.co.id', '+6285720204666', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('41', 'MELATI PUSPITA RATNAKUSUMAH', 'mratnakusumah@arthipesa.co.id', '+6289678405599', '0', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('42', 'FAJAR GUNAWAN', 'fygunawan@arthipesa.co.id', '+6281222233905', '1', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('43', 'DAVID SATRIO PAMUNGKAS', 'dpamungkas@arthipesa.co.id', '+6285624342280', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('44', 'M. ARIEF FACHRUL RIZAL', 'mfachrul@arthipesa.co.id', '+6281381382071', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('45', 'YUSUF MAULANA PENAYATA', 'ypenayata@arthipesa.co.id', '+6281312177708', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('46', 'FITRI ROSMAYANTI', 'frosmayanti@arthipesa.co.id', '+6282130000204', '0', '3', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('47', 'YORDAN SEPTIAN MUHARAM', 'ymuharam@arthipesa.co.id', '+628112281409', '1', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('48', 'LARISA OCTAVIANE', 'loctaviane@arthipesa.co.id', '+628122168255', '0', '4', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('49', 'LALA SOPIYAN', 'lsofyan@arthipesa.co.id', '+6281321470507', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('50', 'WENDI BARMARA', 'wbarmara@arthipesa.co.id', '+6285294669939', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('51', 'VERINSKA MARDIANSYAH', 'vmardiansyah@arthipesa.co.id', '+6285295699956', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('52', 'FARIDL MA\'RUF', 'fmaruf@arthipesa.co.id', '+6285722941982', '1', '1', '0', null, null, null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('53', 'ARTI HIKMATULLAH PERBAWANA SAKTI BUANA', 'ajbuana@arthipesa.co.id', '+6285720502217', '1', '2', '2', null, '1985-07-01', null, null, '1', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `person_profiles` VALUES ('57', 'PRISMA YOSZA', 'prismayosza@arthipesa.com', null, '0', 'user2', '1', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('58', 'ILVAN', 'ilvan@arthipesa.com', null, '1', 'user1', '1', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('59', 'TIARA', 'tiara@arthipesa.com', null, '0', 'user3', '1', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('60', 'VIRA UMMU SABIL', 'user1@arthipesa.com', null, '0', 'user60', 'Address Of User1', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('61', 'UMMI ZIYANI', 'user2@arthipesa.com', null, '0', 'user61', 'Address Of User2', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('62', 'GITA LESTARI', 'user3@arthipesa.com', null, '0', 'user62', 'Address Of User3', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('63', 'AFRI ELLY', 'user4@arthipesa.com', null, '0', 'user63', 'Address Of User4', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('64', 'DRG. LALA ISMALA', 'user5@arthipesa.com', null, '0', 'user64', 'Address Of User5', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('65', 'LUSI ARLIN', 'user6@arthipesa.com', null, '0', 'user65', 'Address Of User6', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('66', 'IRMAWATI', 'user7@arthipesa.com', null, '0', 'user66', 'Address Of User7', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('67', 'ADRIANA', 'user8@arthipesa.com', null, '0', 'user67', 'Address Of User8', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('68', 'DIAH UMMU ABDIRRAHMAN', 'user9@arthipesa.com', null, '0', 'user68', 'Address Of User9', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('69', 'ZURNI ERWATI', 'user10@arthipesa.com', null, '0', 'user69', 'Address Of User10', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('70', 'VENNY NASUTION', 'user11@arthipesa.com', null, '0', 'user70', 'Address Of User11', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('71', 'VIRA DELVIRA', 'user12@arthipesa.com', null, '0', 'user71', 'Address Of User12', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('72', 'DIANI FITRI', 'user13@arthipesa.com', null, '0', 'user72', 'Address Of User13', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('73', 'RIYANTI FATHANAH', 'user14@arthipesa.com', null, '0', 'user73', 'Address Of User14', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('74', 'DWI ZANUARITA', 'user15@arthipesa.com', null, '0', 'user74', 'Address Of User15', null, null, null, null, '1', null, null);
INSERT INTO `person_profiles` VALUES ('75', 'Fery Yufrianto', null, '+62811773454', '1', null, null, null, null, null, null, '1', '2016-05-05 11:12:09', '2016-09-13 10:57:15');
INSERT INTO `person_profiles` VALUES ('76', 'Syukria Fitriani', null, '+6285287026650', '1', null, null, null, null, null, null, '1', '2016-05-05 11:12:38', '2016-09-13 14:50:35');
INSERT INTO `person_profiles` VALUES ('77', 'Herry Ikhsanul Huda', null, null, '1', null, null, null, null, null, null, '1', '2016-05-05 11:15:58', '2016-06-21 04:04:30');
INSERT INTO `person_profiles` VALUES ('78', 'Tony Manurung', null, '+6281372098090', '1', null, null, null, null, null, null, '1', '2016-05-05 11:16:24', '2016-09-13 14:47:40');
INSERT INTO `person_profiles` VALUES ('79', 'Kartika', null, '+6285272146107', '1', null, null, null, null, null, null, '1', '2016-05-05 11:16:46', '2016-09-13 14:53:40');
INSERT INTO `person_profiles` VALUES ('80', 'Aulya Indriaty', null, '+6281270121033', '1', null, null, null, null, null, null, '1', '2016-05-05 11:17:11', '2016-09-07 15:45:50');
INSERT INTO `person_profiles` VALUES ('81', 'Abdi Utomo', null, '+628117743344', '1', null, null, null, null, null, null, '1', '2016-05-05 11:48:56', '2016-10-28 09:48:09');
INSERT INTO `person_profiles` VALUES ('82', 'Abdul Hafiz', null, '+6281355457413', '1', null, null, null, null, null, null, '1', '2016-08-09 11:08:00', '2016-10-13 10:47:13');
INSERT INTO `person_profiles` VALUES ('83', 'Manahan L', null, null, '1', null, null, null, null, null, null, '1', '2016-08-12 09:26:38', '2016-08-12 09:26:38');
INSERT INTO `person_profiles` VALUES ('84', 'Aswani', null, null, '1', null, null, null, null, null, null, '1', '2016-08-12 14:26:50', '2016-09-13 14:57:20');
INSERT INTO `person_profiles` VALUES ('85', 'Hery Setiyono', null, null, '1', null, null, null, null, null, null, '1', '2016-08-24 08:39:15', '2016-08-24 08:39:15');
INSERT INTO `person_profiles` VALUES ('86', 'Ivan Choo', null, '+6281267390862', '1', null, null, null, null, null, null, '1', '2016-08-25 10:35:58', '2016-08-25 10:35:58');
INSERT INTO `person_profiles` VALUES ('87', 'Syahril Maulana Yusuf', null, '+62778411656', '1', null, null, null, null, null, null, '1', '2016-09-01 11:12:02', '2016-09-01 11:12:38');
INSERT INTO `person_profiles` VALUES ('88', 'Sucipto', null, '+6289601135663', '1', null, null, null, null, null, null, '1', '2016-09-01 15:41:13', '2016-09-01 15:41:13');
INSERT INTO `person_profiles` VALUES ('89', 'Eka Indra', null, '+6281364726816', '1', null, null, null, null, null, null, '1', '2016-09-05 09:08:48', '2016-09-05 09:08:48');
INSERT INTO `person_profiles` VALUES ('90', 'Edward Parsaoran', null, '+6281364111634', '1', null, null, null, null, null, null, '1', '2016-09-06 08:49:18', '2016-09-06 08:49:18');
INSERT INTO `person_profiles` VALUES ('91', 'Dona Emalda', null, '+628117012115', '1', null, null, null, null, null, null, '1', '2016-09-06 10:35:03', '2016-09-06 10:35:03');
INSERT INTO `person_profiles` VALUES ('92', 'Suroso', null, '+6281333003497', '1', null, null, null, null, null, null, '1', '2016-09-06 14:15:53', '2016-09-06 14:15:53');
INSERT INTO `person_profiles` VALUES ('93', 'Sapta Widiantoro', null, '+6282387000620', '1', null, null, null, null, null, null, '1', '2016-09-07 10:24:47', '2016-09-07 10:25:39');
INSERT INTO `person_profiles` VALUES ('94', 'Riki Ardi', null, '+628126731838', '1', null, null, null, null, null, null, '1', '2016-09-07 10:45:22', '2016-09-07 10:45:22');
INSERT INTO `person_profiles` VALUES ('95', 'Dini Aulia', null, '+6282372188898', '1', null, null, null, null, null, null, '1', '2016-09-07 11:36:41', '2016-09-07 11:36:41');
INSERT INTO `person_profiles` VALUES ('96', 'Yuyun Rachmalita', null, '+628566559120', '1', null, null, null, null, null, null, '1', '2016-09-07 13:13:54', '2016-09-07 15:02:21');
INSERT INTO `person_profiles` VALUES ('97', 'Ely Sabeth HP', null, '+6281364446939', '1', null, null, null, null, null, null, '1', '2016-09-07 15:49:03', '2016-09-07 15:49:03');
INSERT INTO `person_profiles` VALUES ('98', 'Peni Yuliwati', null, '+6281270084078', '1', null, null, null, null, null, null, '1', '2016-09-08 10:15:40', '2016-09-08 10:15:40');
INSERT INTO `person_profiles` VALUES ('99', 'Wahyu Wicaksono', null, null, '1', null, null, null, null, null, null, '1', '2016-09-14 10:40:30', '2016-09-14 10:40:30');
INSERT INTO `person_profiles` VALUES ('100', 'Gumbira Perkasa', null, '+6281364030533', '1', null, null, null, null, null, null, '1', '2016-09-14 13:37:27', '2016-09-14 13:37:27');
INSERT INTO `person_profiles` VALUES ('101', 'Bedjo Ryadi', null, '+628128088609', '1', null, null, null, null, null, null, '1', '2016-09-15 16:48:55', '2016-09-15 16:48:55');
INSERT INTO `person_profiles` VALUES ('102', 'A D Sebastian', null, null, '1', null, null, null, null, null, null, '1', '2016-09-16 03:10:32', '2016-09-16 03:17:17');
INSERT INTO `person_profiles` VALUES ('103', 'Lulu Hamidah', null, '+6281275928595', '1', null, null, null, null, null, null, '1', '2016-09-19 02:03:55', '2016-09-19 02:03:55');
INSERT INTO `person_profiles` VALUES ('104', 'P Nagarajan', null, null, '1', null, null, null, null, null, null, '1', '2016-09-19 03:12:39', '2016-09-19 03:12:39');
INSERT INTO `person_profiles` VALUES ('105', 'Hari Wirja', null, '+6282323903000', '1', null, null, null, null, null, null, '1', '2016-09-19 04:42:00', '2016-09-19 04:42:00');
INSERT INTO `person_profiles` VALUES ('106', 'Alexander Coubrough', null, null, '1', null, null, null, null, null, null, '1', '2016-09-19 07:23:28', '2016-09-19 07:23:28');
INSERT INTO `person_profiles` VALUES ('107', 'Frida Astuti', null, '+628566530484', '1', null, null, null, null, null, null, '1', '2016-09-19 07:48:08', '2016-09-19 07:48:08');
INSERT INTO `person_profiles` VALUES ('108', 'Yulia Fitri', null, '+62778413019', '1', null, null, null, null, null, null, '1', '2016-09-19 09:49:59', '2016-09-19 09:49:59');
INSERT INTO `person_profiles` VALUES ('109', 'Muhari', null, '+628111106833', '1', null, null, null, null, null, null, '1', '2016-09-20 09:43:32', '2016-09-20 09:43:32');
INSERT INTO `person_profiles` VALUES ('110', 'Cindy Tan', null, null, '1', null, null, null, null, null, null, '1', '2016-09-22 01:20:46', '2016-09-22 01:20:46');
INSERT INTO `person_profiles` VALUES ('111', 'Aravind NS', null, '+6281378402381', '1', null, null, null, null, null, null, '1', '2016-09-22 01:40:20', '2016-09-22 01:40:20');
INSERT INTO `person_profiles` VALUES ('112', 'Mary Grace', null, null, '1', null, null, null, null, null, null, '1', '2016-09-23 01:40:40', '2016-09-23 01:40:40');
INSERT INTO `person_profiles` VALUES ('113', 'Paul Chennet', null, null, '1', null, null, null, null, null, null, '1', '2016-09-27 11:02:00', '2016-09-27 11:02:00');
INSERT INTO `person_profiles` VALUES ('114', 'Armand Lampang Elianto', null, null, '1', null, null, null, null, null, null, '1', '2016-09-28 10:21:32', '2016-09-28 10:21:32');
INSERT INTO `person_profiles` VALUES ('115', 'Amin Amrin', null, '+6281270977190', '1', null, null, null, null, null, null, '1', '2016-09-28 15:51:24', '2016-09-28 15:51:24');
INSERT INTO `person_profiles` VALUES ('116', 'Desmon Tampubolon', null, '+6281364793001', '1', null, null, null, null, null, null, '1', '2016-09-30 08:27:49', '2016-09-30 08:27:49');
INSERT INTO `person_profiles` VALUES ('117', 'Suroso', null, '+6281333003497', '1', null, null, null, null, null, null, '1', '2016-09-30 14:24:03', '2016-09-30 14:24:03');
INSERT INTO `person_profiles` VALUES ('118', 'Arif Rosiandini', null, null, '1', null, null, null, null, null, null, '1', '2016-10-04 09:43:41', '2016-10-04 09:43:41');
INSERT INTO `person_profiles` VALUES ('119', 'Sutrisno', null, '+6285242231456', '1', null, null, null, null, null, null, '1', '2016-10-04 10:27:13', '2016-10-04 10:27:13');
INSERT INTO `person_profiles` VALUES ('120', 'Ronak', null, '+6281261596055', '1', null, null, null, null, null, null, '1', '2016-10-12 15:58:29', '2016-10-12 15:58:29');
INSERT INTO `person_profiles` VALUES ('121', 'Sri Wahyuni', null, '+6281290092671', '1', null, null, null, null, null, null, '1', '2016-10-12 16:13:00', '2016-10-12 16:13:00');
INSERT INTO `person_profiles` VALUES ('122', 'Togu Hutagalung', null, null, '1', null, null, null, null, null, null, '1', '2016-10-17 16:46:47', '2016-10-17 16:47:22');
INSERT INTO `person_profiles` VALUES ('123', 'Hendra', null, null, '1', null, null, null, null, null, null, '1', '2016-10-18 10:24:42', '2016-10-18 10:24:42');
INSERT INTO `person_profiles` VALUES ('124', 'Imam Cahya', null, null, '1', null, null, null, null, null, null, '1', '2016-10-20 09:44:23', '2016-10-20 09:44:23');
INSERT INTO `person_profiles` VALUES ('125', 'Jessy Hapsari', null, '+6285278467801', '1', null, null, null, null, null, null, '1', '2016-10-20 10:02:41', '2016-10-20 10:02:41');
INSERT INTO `person_profiles` VALUES ('126', 'Muhammad Reza', null, '+6282120061266', '1', null, null, null, null, null, null, '1', '2016-10-20 14:17:34', '2016-10-20 14:17:34');
INSERT INTO `person_profiles` VALUES ('127', 'B S Rao', null, null, '1', null, null, null, null, null, null, '1', '2016-10-28 08:22:03', '2016-10-28 08:22:03');
INSERT INTO `person_profiles` VALUES ('128', 'Si Min Tan', null, '+6564907506', '1', null, null, null, null, null, null, '1', '2016-10-29 08:53:27', '2016-10-29 08:53:27');
INSERT INTO `person_profiles` VALUES ('129', 'Setia Budianto', null, null, '1', null, null, null, null, null, null, '1', '2016-11-09 08:53:07', '2016-11-09 08:53:07');
INSERT INTO `person_profiles` VALUES ('130', 'Euis Muthia Cahayarani', null, null, '1', null, null, null, null, null, null, '1', '2016-11-09 16:04:46', '2016-11-09 16:04:46');
INSERT INTO `person_profiles` VALUES ('131', 'Andriana Dwi', null, '+6281276301519', '1', null, null, null, null, null, null, '1', '2016-11-14 16:09:55', '2016-11-14 16:09:55');
INSERT INTO `person_profiles` VALUES ('132', 'Ngarip', null, null, '1', null, null, null, null, null, null, '1', '2016-11-15 15:18:40', '2017-02-02 11:26:27');
INSERT INTO `person_profiles` VALUES ('133', 'Arasu', null, null, '1', null, null, null, null, null, null, '1', '2016-11-22 15:23:11', '2016-11-22 15:23:11');
INSERT INTO `person_profiles` VALUES ('134', 'Binsar', null, null, '1', null, null, null, null, null, null, '1', '2016-12-06 08:31:58', '2016-12-06 08:31:58');
INSERT INTO `person_profiles` VALUES ('135', 'M N Shahid', null, '+6564906750', '1', null, null, null, null, null, null, '1', '2016-12-08 09:22:18', '2016-12-08 09:22:18');
INSERT INTO `person_profiles` VALUES ('136', 'Fitri Elita', null, '+6285272859723', '1', null, null, null, null, null, null, '1', '2017-01-04 09:00:08', '2017-01-04 09:00:08');
INSERT INTO `person_profiles` VALUES ('137', 'Lydia Walewangko', null, '+6281270570577', '1', null, null, null, null, null, null, '1', '2017-01-10 13:48:18', '2017-01-10 13:49:04');
INSERT INTO `person_profiles` VALUES ('138', 'Nurul Hadi', null, '+627788072000', '1', null, null, null, null, null, null, '1', '2017-02-16 10:03:34', '2017-02-16 10:03:34');
INSERT INTO `person_profiles` VALUES ('141', 'Dyena Arini', null, '+6281365542581', '1', null, null, null, null, null, null, '1', '2017-03-13 13:58:49', '2017-03-13 13:58:49');
INSERT INTO `person_profiles` VALUES ('142', 'Prakash Krishnamoorthy', null, null, '1', null, null, null, null, null, null, '1', '2017-04-04 10:24:43', '2017-04-04 10:24:43');
INSERT INTO `person_profiles` VALUES ('143', 'Iwan Suryawan', null, '+6281519666715', '1', null, null, null, null, null, null, '1', '2017-04-06 08:31:59', '2017-04-06 08:31:59');
INSERT INTO `person_profiles` VALUES ('144', 'Mary Aan', null, null, '1', null, null, null, null, null, null, '1', '2017-04-28 16:10:51', '2017-04-28 16:10:51');
INSERT INTO `person_profiles` VALUES ('145', 'Heru Putra Setiawan', null, null, '1', null, null, null, null, null, null, '1', '2017-05-17 13:59:03', '2017-05-17 13:59:03');
INSERT INTO `person_profiles` VALUES ('146', 'Rina Marhasyani', null, '+6281268012490', '1', null, null, null, null, null, null, '1', '2017-06-02 10:21:58', '2017-06-02 10:21:58');
INSERT INTO `person_profiles` VALUES ('147', 'Armansyah', null, null, '1', null, null, null, null, null, null, '1', '2017-06-02 15:25:27', '2017-06-02 15:25:27');
INSERT INTO `person_profiles` VALUES ('148', 'Hasudungan', null, null, '1', null, null, null, null, null, null, '1', '2017-06-07 14:13:30', '2017-06-07 14:13:30');
INSERT INTO `person_profiles` VALUES ('149', 'Lugiyanti Niken P', null, '+6283186197197', '1', null, null, null, null, null, null, '1', '2017-10-16 09:44:39', '2017-10-16 09:44:39');
INSERT INTO `person_profiles` VALUES ('150', 'Heru Putra Setiawan', null, '+628117502154', '1', null, null, null, null, null, null, '1', '2017-11-21 09:45:39', '2017-11-21 09:45:39');
INSERT INTO `person_profiles` VALUES ('151', 'Richard Tondang', null, '+6281263212121', '1', null, null, null, null, null, null, '1', '2018-01-25 10:32:19', '2018-01-25 10:32:19');
INSERT INTO `person_profiles` VALUES ('152', 'Rahman', null, '+6285264557841', '1', null, null, null, null, null, null, '1', '2018-03-13 13:51:24', '2018-03-13 13:51:24');
INSERT INTO `person_profiles` VALUES ('153', 'M Ismael ', null, '+6281372904347', '1', null, null, null, null, null, null, '1', '2018-03-26 10:20:30', '2018-03-26 10:20:30');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` text,
  `product_name` text,
  `product_class` int(11) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_img_blob` longblob,
  `product_img_url` longtext,
  `weight` float DEFAULT NULL,
  `is_secondhand` tinyint(4) DEFAULT '0',
  `penimbang` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'KL-010200001', 'Kalung Italy', '1', '1', null, null, '20', '0', '5', '1', '2018-07-12 14:04:51');
INSERT INTO `products` VALUES ('2', 'CN-010200002', 'Cincin Arab', '3', '4', null, null, '50', '0', '4', '1', '2018-07-12 14:04:51');
INSERT INTO `products` VALUES ('3', 'GL-010200003', 'Gelang Tasik', '2', '3', null, null, '70', '0', '3', '1', '2018-07-12 14:04:51');
INSERT INTO `products` VALUES ('4', 'CN-010200004', 'Cincin Marocco', '4', '4', null, null, '10.1', '0', '2', '1', '2018-07-12 14:04:51');
INSERT INTO `products` VALUES ('5', 'CN-010200004', 'Cincin Marocco', '4', '4', null, null, '10.1', '0', '1', '1', '2018-07-13 14:04:51');
INSERT INTO `products` VALUES ('7', 'CN-010299999', 'Cincin Marocco', '4', '4', null, null, '10.1', '1', '1', '1', '2018-07-13 14:04:51');
INSERT INTO `products` VALUES ('8', 'CN-010200005', 'Gelang Tasik', '2', '3', null, null, '5', '0', '2', '1', '2018-07-14 14:04:51');
INSERT INTO `products` VALUES ('9', 'CN-010200010', 'Cincin Arab 2', '3', '4', null, null, '7', '0', '4', '1', '2018-07-14 15:04:51');
INSERT INTO `products` VALUES ('10', 'CN-010200010', 'Cincin Arab 1', '3', '4', null, null, '8', '0', '4', '1', '2018-07-14 15:04:51');
INSERT INTO `products` VALUES ('11', 'CN-010299998', 'Cincin Marocco 1', '4', '4', null, null, '17.1', '1', '1', '1', '2018-07-13 14:04:51');
INSERT INTO `products` VALUES ('12', 'CN-010299799', 'Cincin Marocco 2', '4', '4', null, null, '9.1', '1', '1', '1', '2018-07-12 14:04:51');
INSERT INTO `products` VALUES ('13', 'CN-010269799', 'Cincin Marocco 3', '4', '4', null, '..\\assets\\img\\products\\torque\\1.jpg', '7.1', '1', '1', '1', '2018-07-14 14:04:51');
INSERT INTO `products` VALUES ('14', 'CN-010297799', 'Cincin Marocco 4', '4', '4', null, null, '8.2', '1', '1', '1', '2018-07-12 14:04:51');

-- ----------------------------
-- Table structure for `product_category`
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text,
  `abbr` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('1', 'Kalung', 'KL');
INSERT INTO `product_category` VALUES ('2', 'Liontin', 'LN');
INSERT INTO `product_category` VALUES ('3', 'Gelang', 'GL');
INSERT INTO `product_category` VALUES ('4', 'Cincin', 'CN');
INSERT INTO `product_category` VALUES ('5', 'Anting', 'AN');
INSERT INTO `product_category` VALUES ('6', 'Giwang', 'GW');

-- ----------------------------
-- Table structure for `product_class`
-- ----------------------------
DROP TABLE IF EXISTS `product_class`;
CREATE TABLE `product_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text,
  `abbr` varchar(5) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_class
-- ----------------------------
INSERT INTO `product_class` VALUES ('1', 'Emas Tua 700', 'ET700', '1');
INSERT INTO `product_class` VALUES ('2', 'Emas Muda 300', 'EM300', '1');
INSERT INTO `product_class` VALUES ('3', 'Emas Tua 750', 'ET750', '1');
INSERT INTO `product_class` VALUES ('4', 'Emas Muda 450', 'EM450', '1');
INSERT INTO `product_class` VALUES ('5', 'Emas Arab', 'EA', '1');
INSERT INTO `product_class` VALUES ('6', 'Logam Mulia', 'LM', '1');

-- ----------------------------
-- Table structure for `product_type`
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES ('1', 'Gold');
INSERT INTO `product_type` VALUES ('2', 'Silver');

-- ----------------------------
-- Table structure for `religion`
-- ----------------------------
DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `religion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of religion
-- ----------------------------
INSERT INTO `religion` VALUES ('1', 'Islam');
INSERT INTO `religion` VALUES ('2', 'Kristen Katolik');
INSERT INTO `religion` VALUES ('3', 'Kristen Protestan');
INSERT INTO `religion` VALUES ('4', 'Hindu');
INSERT INTO `religion` VALUES ('5', 'Budha');
INSERT INTO `religion` VALUES ('6', 'Yahudi');
INSERT INTO `religion` VALUES ('7', 'Atheis');
INSERT INTO `religion` VALUES ('8', 'Traditional Chinese');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peran` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Cashier');
INSERT INTO `roles` VALUES ('2', 'Buyer');
INSERT INTO `roles` VALUES ('3', 'Manager');
INSERT INTO `roles` VALUES ('4', 'Cleaner');
INSERT INTO `roles` VALUES ('5', 'Owner');
INSERT INTO `roles` VALUES ('6', 'Seller');

-- ----------------------------
-- Table structure for `transaction_details`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_head` int(11) DEFAULT NULL,
  `invoice_num` varchar(100) DEFAULT NULL,
  `barcode` text,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `unit_weight` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaction_details
-- ----------------------------
INSERT INTO `transaction_details` VALUES ('1', '1', '112312312', null, '1', '200000', '20');
INSERT INTO `transaction_details` VALUES ('2', '2', '9999999', null, '1', '240000', '20');
INSERT INTO `transaction_details` VALUES ('3', '3', '123132', null, '1', '190000', '10');
INSERT INTO `transaction_details` VALUES ('4', '4', '12321312', null, '1', '200000', '2');
INSERT INTO `transaction_details` VALUES ('5', '5', '23423424', null, '2', '300000', '3');
INSERT INTO `transaction_details` VALUES ('6', '6', '34534534', null, '1', '200000', '4');
INSERT INTO `transaction_details` VALUES ('7', '7', '524324', null, '2', '400000', '5');
INSERT INTO `transaction_details` VALUES ('8', '8', '54654654', null, '3', '500000', '6');
INSERT INTO `transaction_details` VALUES ('9', '9', '456456', null, '2', '400000', '90');
INSERT INTO `transaction_details` VALUES ('10', '10', '4564576', null, '1', '400000', '8');
INSERT INTO `transaction_details` VALUES ('21', '25', '002/SALE/11/DER/AUG/2018', null, '13', '2e+007', '71');
INSERT INTO `transaction_details` VALUES ('22', '26', '002/SALE/11/DER/AUG/2018', null, '13', '2e+007', '71');
INSERT INTO `transaction_details` VALUES ('23', '27', '17213352855SALEILV2018', null, '0', '0', '0');
INSERT INTO `transaction_details` VALUES ('24', '28', '463728125SALEILV2018', null, '0', '0', '0');
INSERT INTO `transaction_details` VALUES ('26', '32', '713/5/Sep/ILV/29/SALE/2018', 'CN-010269799', '13', '2e+006', '71');
INSERT INTO `transaction_details` VALUES ('32', '41', '#ANYNUM', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('68', '85', '#ANYNUM183', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('69', '86', '#ANYNUM794', 'CN-010269799', '13', '720000', '70');
INSERT INTO `transaction_details` VALUES ('70', '87', '#ANYNUM276', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('71', '88', '#ANYNUM845', 'CN-010269799', '13', '-8.0156e+007', '6797.99');
INSERT INTO `transaction_details` VALUES ('72', '89', '#ANYNUM206', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('73', '90', '#ANYNUM333', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('74', '91', '#ANYNUM594', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('75', '92', '#ANYNUM253', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('76', '93', '#ANYNUM70', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('77', '94', '#ANYNUM408', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('78', '95', '#ANYNUM435', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('79', '96', '#ANYNUM946', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('80', '97', '#ANYNUM194', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('81', '98', '#ANYNUM668', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('82', '99', '#ANYNUM106', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('83', '100', '#ANYNUM902', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('84', '101', '#ANYNUM881', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('85', '102', '#ANYNUM937', 'CN-010269799', '13', '0', '0');
INSERT INTO `transaction_details` VALUES ('86', '103', '#ANYNUM692', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('87', '104', '#ANYNUM965', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('88', '105', '#ANYNUM254', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('89', '106', '#ANYNUM488', 'CN-010269799', '13', '1.412e+006', '0.8');
INSERT INTO `transaction_details` VALUES ('90', '107', '#ANYNUM36', 'CN-010269799', '13', '-1.139e+006', '213.232');
INSERT INTO `transaction_details` VALUES ('91', '108', '#ANYNUM235', 'CN-010269799', '13', '1.406e+006', '1.111');
INSERT INTO `transaction_details` VALUES ('92', '109', '#ANYNUM817', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('93', '110', '#ANYNUM459', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('94', '111', '#ANYNUM893', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('95', '113', '#ANYNUM730', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('96', '114', '#ANYNUM111', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('97', '115', '#ANYNUM719', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('98', '116', '679/Oct/40/18', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('99', '117', '659/Oct/40/2018', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('100', '118', '468/Oct/40/PURC', null, null, '0', '0');
INSERT INTO `transaction_details` VALUES ('101', '119', '806/Oct/40/PURC/2018', 'CN-010269799', '13', '1.3e+006', '10');
INSERT INTO `transaction_details` VALUES ('102', '120', '747/Oct/40/PURC/2018', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('103', '121', '734/Oct/[object Object]/PURC/2018', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('104', '122', '48/Oct/SAKTI BUANA/PURC/2018', 'CN-010269799', '13', '1.4e+006', '2');
INSERT INTO `transaction_details` VALUES ('105', '123', '441/Oct/SAK/PURC/2018', 'CN-010269799', '13', '1.22e+006', '20');
INSERT INTO `transaction_details` VALUES ('106', '124', '474/Oct/SAK/40/PURC/2018', 'CN-010269799', '13', '1.363e+006', '5.666');
INSERT INTO `transaction_details` VALUES ('107', '125', '354/Oct/SAK/40/PURC/2018', 'CN-010269799', '13', '1.42e+006', '0');
INSERT INTO `transaction_details` VALUES ('108', '126', '325/5/Oct/SAK/07/SALE/2018', 'CN-010269799', '13', '2e+006', '71');

-- ----------------------------
-- Table structure for `transaction_head`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_head`;
CREATE TABLE `transaction_head` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trx_type` int(11) DEFAULT NULL,
  `invoice_num` varchar(100) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `cashier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_num` (`trx_type`,`invoice_num`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaction_head
-- ----------------------------
INSERT INTO `transaction_head` VALUES ('1', '1', '001/SALE/11/DER/AUG/2018', '2018-07-11 13:37:17', '1');
INSERT INTO `transaction_head` VALUES ('2', '2', '002/PURC/11/DER/AUG/2018', '2018-07-11 12:37:17', '2');
INSERT INTO `transaction_head` VALUES ('3', '1', '003/SALE/11/DER/AUG/2018', '2018-07-11 11:37:17', '6');
INSERT INTO `transaction_head` VALUES ('4', '1', '004/SALE/11/DER/AUG/2018', '2018-07-11 15:37:17', '2');
INSERT INTO `transaction_head` VALUES ('5', '2', '005/PURC/11/DER/AUG/2018', '2018-07-11 16:37:17', '3');
INSERT INTO `transaction_head` VALUES ('6', '1', '006/SALE/11/DER/AUG/2018', '2018-07-11 10:37:17', '4');
INSERT INTO `transaction_head` VALUES ('7', '1', '007/SALE/11/DER/AUG/2018', '2018-07-11 09:37:17', '5');
INSERT INTO `transaction_head` VALUES ('8', '2', '008/PURC/11/DER/AUG/2018', '2018-07-29 06:04:32', '7');
INSERT INTO `transaction_head` VALUES ('9', '1', '009/SALE/11/DER/AUG/2018', '2018-09-29 06:04:32', '4');
INSERT INTO `transaction_head` VALUES ('10', '1', '010/SALE/11/DER/AUG/2018', '2018-09-29 07:03:32', '2');
INSERT INTO `transaction_head` VALUES ('18', '2', '004/PURC/11/DER/AUG/2018', '2018-09-29 08:03:32', '1');
INSERT INTO `transaction_head` VALUES ('26', '1', '002/SALE/11/DER/AUG/2018', '2018-09-29 11:22:55', '1');
INSERT INTO `transaction_head` VALUES ('27', '1', '17213352855SALEILV2018', '2018-09-29 13:52:38', '1');
INSERT INTO `transaction_head` VALUES ('28', '1', '463728125SALEILV2018', '2018-09-29 13:54:20', '1');
INSERT INTO `transaction_head` VALUES ('32', '1', '713/5/Sep/ILV/29/SALE/2018', '2018-09-29 14:48:32', '1');
INSERT INTO `transaction_head` VALUES ('85', '2', '#ANYNUM183', '2018-10-01 06:58:50', '4');
INSERT INTO `transaction_head` VALUES ('86', '2', '#ANYNUM794', '2018-10-01 06:59:12', '4');
INSERT INTO `transaction_head` VALUES ('87', '2', '#ANYNUM276', '2018-10-01 07:10:08', '4');
INSERT INTO `transaction_head` VALUES ('88', '2', '#ANYNUM845', '2018-10-01 07:11:02', '4');
INSERT INTO `transaction_head` VALUES ('89', '2', '#ANYNUM206', '2018-10-01 07:11:03', '4');
INSERT INTO `transaction_head` VALUES ('90', '2', '#ANYNUM333', '2018-10-01 07:11:04', '4');
INSERT INTO `transaction_head` VALUES ('91', '2', '#ANYNUM594', '2018-10-01 07:11:11', '4');
INSERT INTO `transaction_head` VALUES ('92', '2', '#ANYNUM253', '2018-10-01 07:11:11', '4');
INSERT INTO `transaction_head` VALUES ('93', '2', '#ANYNUM70', '2018-10-01 07:11:11', '4');
INSERT INTO `transaction_head` VALUES ('94', '2', '#ANYNUM408', '2018-10-01 07:11:11', '4');
INSERT INTO `transaction_head` VALUES ('95', '2', '#ANYNUM435', '2018-10-01 07:11:12', '4');
INSERT INTO `transaction_head` VALUES ('96', '2', '#ANYNUM946', '2018-10-01 07:11:12', '4');
INSERT INTO `transaction_head` VALUES ('97', '2', '#ANYNUM194', '2018-10-01 07:11:12', '4');
INSERT INTO `transaction_head` VALUES ('98', '2', '#ANYNUM668', '2018-10-01 07:11:13', '4');
INSERT INTO `transaction_head` VALUES ('99', '2', '#ANYNUM106', '2018-10-01 07:11:13', '4');
INSERT INTO `transaction_head` VALUES ('100', '2', '#ANYNUM902', '2018-10-01 07:11:13', '4');
INSERT INTO `transaction_head` VALUES ('101', '2', '#ANYNUM881', '2018-10-01 07:11:31', '4');
INSERT INTO `transaction_head` VALUES ('102', '2', '#ANYNUM937', '2018-10-01 07:11:35', '4');
INSERT INTO `transaction_head` VALUES ('103', '2', '#ANYNUM692', '2018-10-01 07:12:04', '4');
INSERT INTO `transaction_head` VALUES ('104', '2', '#ANYNUM965', '2018-10-01 07:12:04', '4');
INSERT INTO `transaction_head` VALUES ('105', '2', '#ANYNUM254', '2018-10-01 07:12:04', '4');
INSERT INTO `transaction_head` VALUES ('106', '2', '#ANYNUM488', '2018-10-01 07:12:22', '4');
INSERT INTO `transaction_head` VALUES ('107', '2', '#ANYNUM36', '2018-10-01 07:13:14', '4');
INSERT INTO `transaction_head` VALUES ('108', '2', '#ANYNUM235', '2018-10-01 07:13:59', '4');
INSERT INTO `transaction_head` VALUES ('109', '2', '#ANYNUM817', '2018-10-01 07:14:00', '4');
INSERT INTO `transaction_head` VALUES ('110', '2', '#ANYNUM459', '2018-10-01 07:14:01', '4');
INSERT INTO `transaction_head` VALUES ('111', '2', '#ANYNUM893', '2018-10-01 07:14:01', '4');
INSERT INTO `transaction_head` VALUES ('113', '2', '#ANYNUM730', '2018-10-01 07:14:02', '4');
INSERT INTO `transaction_head` VALUES ('114', '2', '#ANYNUM111', '2018-10-01 07:14:02', '4');
INSERT INTO `transaction_head` VALUES ('115', '2', '#ANYNUM719', '2018-10-01 07:14:02', '4');
INSERT INTO `transaction_head` VALUES ('116', '2', '679/Oct/40/18', '2018-10-01 07:16:58', '4');
INSERT INTO `transaction_head` VALUES ('117', '2', '659/Oct/40/2018', '2018-10-01 07:18:12', '4');
INSERT INTO `transaction_head` VALUES ('118', '2', '468/Oct/40/PURC', '2018-10-01 07:18:20', '4');
INSERT INTO `transaction_head` VALUES ('119', '2', '806/Oct/40/PURC/2018', '2018-10-01 07:19:15', '4');
INSERT INTO `transaction_head` VALUES ('120', '2', '747/Oct/40/PURC/2018', '2018-10-01 07:19:22', '4');
INSERT INTO `transaction_head` VALUES ('121', '2', '734/Oct/[object Object]/PURC/2018', '2018-10-01 07:21:30', '4');
INSERT INTO `transaction_head` VALUES ('122', '2', '48/Oct/SAKTI BUANA/PURC/2018', '2018-10-01 07:21:56', '4');
INSERT INTO `transaction_head` VALUES ('123', '2', '441/Oct/SAK/PURC/2018', '2018-10-01 07:23:02', '4');
INSERT INTO `transaction_head` VALUES ('124', '2', '474/Oct/SAK/40/PURC/2018', '2018-10-01 07:24:12', '4');
INSERT INTO `transaction_head` VALUES ('125', '2', '354/Oct/SAK/40/PURC/2018', '2018-10-01 07:24:23', '4');
INSERT INTO `transaction_head` VALUES ('126', '1', '325/5/Oct/SAK/07/SALE/2018', '2018-10-07 03:14:17', '4');

-- ----------------------------
-- Table structure for `transaction_labels`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_labels`;
CREATE TABLE `transaction_labels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `trx_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaction_labels
-- ----------------------------
INSERT INTO `transaction_labels` VALUES ('1', 'Sale', '1');
INSERT INTO `transaction_labels` VALUES ('2', 'Purchase', '2');
INSERT INTO `transaction_labels` VALUES ('3', 'Other Income', null);
INSERT INTO `transaction_labels` VALUES ('4', 'Building Rent Fee', '4');
INSERT INTO `transaction_labels` VALUES ('5', 'Building Electricity', '4');

-- ----------------------------
-- Table structure for `transaction_types`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_types`;
CREATE TABLE `transaction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transaction_types
-- ----------------------------
INSERT INTO `transaction_types` VALUES ('1', 'Sale');
INSERT INTO `transaction_types` VALUES ('2', 'Purchase');
INSERT INTO `transaction_types` VALUES ('3', 'Other Income');
INSERT INTO `transaction_types` VALUES ('4', 'Other Expense');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(3) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_paswd` varchar(100) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT '0',
  `banned` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `last_modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'abuluthfi', '', '0', '58', '1', '0', '2017-04-20 10:04:51', '2017-04-20 10:04:51');
INSERT INTO `users` VALUES ('2', 'ummuluthfi', '', '0', '57', '1', '0', '2016-09-09 14:49:11', '2016-09-09 14:49:11');
INSERT INTO `users` VALUES ('3', 'tiara', '', '0', '59', '1', '0', '2016-09-09 14:49:11', '2016-09-09 14:49:11');
INSERT INTO `users` VALUES ('4', 'abuhafidz', '', '0', '4', '1', '0', '2016-09-09 14:49:11', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('5', 'ummuhafidz', '', '0', '5', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('6', 'admin2', '', '2', '16', '1', '0', '2016-09-09 14:49:11', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('7', 'b918', '', '2', '18', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('8', 'b964', '', '3', '19', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('9', 'b834', '', '4', '20', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('10', 'c711', '', '3', '21', '0', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('11', 'c874', '', '4', '22', '0', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('12', 'c631', '', '1', '23', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('13', 'c802', '', '1', '24', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('14', 'b696', '', '2', '26', '1', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');
INSERT INTO `users` VALUES ('15', 'b378', '', '1', '28', '0', '0', '2017-04-20 10:04:51', '2017-05-16 10:54:57');

-- ----------------------------
-- Table structure for `users_map`
-- ----------------------------
DROP TABLE IF EXISTS `users_map`;
CREATE TABLE `users_map` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `one_user_many_roles` (`u_id`,`r_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_map
-- ----------------------------
INSERT INTO `users_map` VALUES ('8', '1', '1');
INSERT INTO `users_map` VALUES ('23', '1', '2');
INSERT INTO `users_map` VALUES ('9', '2', '1');
INSERT INTO `users_map` VALUES ('25', '2', '2');
INSERT INTO `users_map` VALUES ('10', '3', '1');
INSERT INTO `users_map` VALUES ('24', '3', '2');
INSERT INTO `users_map` VALUES ('1', '4', '1');
INSERT INTO `users_map` VALUES ('2', '4', '2');
INSERT INTO `users_map` VALUES ('3', '4', '3');
INSERT INTO `users_map` VALUES ('4', '4', '4');
INSERT INTO `users_map` VALUES ('5', '4', '5');
INSERT INTO `users_map` VALUES ('6', '4', '6');
INSERT INTO `users_map` VALUES ('12', '5', '1');
INSERT INTO `users_map` VALUES ('13', '6', '1');
INSERT INTO `users_map` VALUES ('14', '7', '1');
INSERT INTO `users_map` VALUES ('15', '8', '1');
INSERT INTO `users_map` VALUES ('16', '9', '1');
INSERT INTO `users_map` VALUES ('17', '10', '1');
INSERT INTO `users_map` VALUES ('18', '11', '1');
INSERT INTO `users_map` VALUES ('19', '12', '1');
INSERT INTO `users_map` VALUES ('20', '13', '1');
INSERT INTO `users_map` VALUES ('21', '14', '1');
INSERT INTO `users_map` VALUES ('22', '15', '1');

-- ----------------------------
-- View structure for `vw_barangbaru`
-- ----------------------------
DROP VIEW IF EXISTS `vw_barangbaru`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_barangbaru` AS select `vw_products`.`created_at` AS `trx_date`,`vw_products`.`product_category_abbr` AS `product_category_abbr`,`vw_products`.`product_category` AS `product_category`,`vw_products`.`product_category_id` AS `product_category_id`,`vw_products`.`weight` AS `unit_weight` from `vw_products` where (`vw_products`.`is_secondhand_id` = 1) ;

-- ----------------------------
-- View structure for `vw_conversion`
-- ----------------------------
DROP VIEW IF EXISTS `vw_conversion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_conversion` AS select `b`.`id` AS `id`,`b`.`label` AS `label`,`b`.`product_type` AS `product_type`,`a`.`product_class` AS `product_class`,`a`.`value_pergram` AS `value_pergram` from (`conversion` `a` left join `product_class` `b` on((`b`.`id` = `a`.`product_class`))) ;

-- ----------------------------
-- View structure for `vw_cucian`
-- ----------------------------
DROP VIEW IF EXISTS `vw_cucian`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cucian` AS select `vw_products`.`created_at` AS `trx_date`,`vw_products`.`product_category_abbr` AS `product_category_abbr`,`vw_products`.`product_category` AS `product_category`,`vw_products`.`product_category_id` AS `product_category_id`,`vw_products`.`weight` AS `unit_weight` from `vw_products` where (`vw_products`.`is_secondhand_id` = 0) ;

-- ----------------------------
-- View structure for `vw_employee`
-- ----------------------------
DROP VIEW IF EXISTS `vw_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employee` AS select `a`.`r_id` AS `r_id`,`b`.`u_id` AS `u_id`,`b`.`u_name` AS `u_name`,`b`.`u_paswd` AS `u_paswd`,`b`.`level` AS `level`,`b`.`profile_id` AS `profile_id`,`b`.`activated` AS `activated`,`b`.`banned` AS `banned`,`b`.`created_at` AS `created_at`,`b`.`id` AS `id`,`b`.`fullname` AS `fullname`,`b`.`email` AS `email`,`b`.`cellular` AS `cellular`,`b`.`gender_id` AS `gender_id`,`b`.`avatar_filename` AS `avatar_filename`,`b`.`shipping_address` AS `shipping_address`,`b`.`city` AS `city`,`b`.`birthday` AS `birthday`,`b`.`birthplace` AS `birthplace`,`b`.`highest_education_level` AS `highest_education_level`,`b`.`religion_id` AS `religion_id`,`b`.`religion` AS `religion`,`b`.`last_modified_at` AS `last_modified_at` from (`users_map` `a` left join `vw_users` `b` on((`a`.`u_id` = `b`.`u_id`))) ;

-- ----------------------------
-- View structure for `vw_employee_list`
-- ----------------------------
DROP VIEW IF EXISTS `vw_employee_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employee_list` AS select `vw_employee`.`r_id` AS `r_id`,`vw_employee`.`u_id` AS `u_id`,`vw_employee`.`u_name` AS `u_name`,`vw_employee`.`u_paswd` AS `u_paswd`,`vw_employee`.`level` AS `level`,`vw_employee`.`profile_id` AS `profile_id`,`vw_employee`.`activated` AS `activated`,`vw_employee`.`banned` AS `banned`,`vw_employee`.`created_at` AS `created_at`,`vw_employee`.`id` AS `id`,`vw_employee`.`fullname` AS `fullname`,`vw_employee`.`email` AS `email`,`vw_employee`.`cellular` AS `cellular`,`vw_employee`.`gender_id` AS `gender_id`,`vw_employee`.`avatar_filename` AS `avatar_filename`,`vw_employee`.`shipping_address` AS `shipping_address`,`vw_employee`.`city` AS `city`,`vw_employee`.`birthday` AS `birthday`,`vw_employee`.`birthplace` AS `birthplace`,`vw_employee`.`highest_education_level` AS `highest_education_level`,`vw_employee`.`religion_id` AS `religion_id`,`vw_employee`.`religion` AS `religion`,`vw_employee`.`last_modified_at` AS `last_modified_at` from `vw_employee` where (not(`vw_employee`.`u_id` in (select `users_map`.`u_id` from `users_map` where (`users_map`.`r_id` = 5)))) ;

-- ----------------------------
-- View structure for `vw_inventory`
-- ----------------------------
DROP VIEW IF EXISTS `vw_inventory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory` AS select 'SALES' AS `description`,cast(`vw_sales_transactions`.`trx_date` as date) AS `trx_date`,`vw_sales_transactions`.`product_category_id` AS `product_category_id`,`vw_sales_transactions`.`product_category` AS `product_category`,`vw_sales_transactions`.`product_category_abbr` AS `product_category_abbr`,count(`vw_sales_transactions`.`product_category_id`) AS `count_sum`,round(sum(`vw_sales_transactions`.`unit_weight`),3) AS `weight_sum` from `vw_sales_transactions` group by cast(`vw_sales_transactions`.`trx_date` as date),`vw_sales_transactions`.`product_category_id`,`vw_sales_transactions`.`product_category`,`vw_sales_transactions`.`product_category_abbr` union select 'PURCHASE' AS `PURCHASE`,cast(`vw_purchase_transactions`.`trx_date` as date) AS `DATE(trx_date)`,`vw_purchase_transactions`.`product_category_id` AS `product_category_id`,`vw_purchase_transactions`.`product_category` AS `product_category`,`vw_purchase_transactions`.`product_category_abbr` AS `product_category_abbr`,count(`vw_purchase_transactions`.`product_category_id`) AS `count(product_category_id)`,round(sum(`vw_purchase_transactions`.`unit_weight`),3) AS `round(sum(unit_weight), 3)` from `vw_purchase_transactions` group by cast(`vw_purchase_transactions`.`trx_date` as date),`vw_purchase_transactions`.`product_category_id`,`vw_purchase_transactions`.`product_category`,`vw_purchase_transactions`.`product_category_abbr` union select 'BRB' AS `BRB`,cast(`d`.`trx_date` as date) AS `DATE(d.trx_date)`,`d`.`product_category_id` AS `product_category_id`,`d`.`product_category` AS `product_category`,`d`.`product_category_abbr` AS `product_category_abbr`,count(`d`.`product_category_id`) AS `count(d.product_category_id)`,round(sum(`d`.`unit_weight`),3) AS `weight_sum` from `vw_barangbaru` `d` group by cast(`d`.`trx_date` as date),`d`.`product_category_id`,`d`.`product_category`,`d`.`product_category_abbr` union select 'CUCIAN' AS `CUCIAN`,cast(`c`.`trx_date` as date) AS `DATE(c.trx_date)`,`c`.`product_category_id` AS `product_category_id`,`c`.`product_category` AS `product_category`,`c`.`product_category_abbr` AS `product_category_abbr`,count(`c`.`product_category_id`) AS `count(c.product_category_id)`,round(sum(`c`.`unit_weight`),3) AS `weight_sum` from `vw_cucian` `c` group by cast(`c`.`trx_date` as date),`c`.`product_category_id`,`c`.`product_category`,`c`.`product_category_abbr` ;

-- ----------------------------
-- View structure for `vw_inventory_sum_1`
-- ----------------------------
DROP VIEW IF EXISTS `vw_inventory_sum_1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory_sum_1` AS select `vw_inventory`.`description` AS `description`,`vw_inventory`.`trx_date` AS `trx_date`,`vw_inventory`.`product_category_id` AS `product_category_id`,`vw_inventory`.`product_category` AS `product_category`,`vw_inventory`.`product_category_abbr` AS `product_category_abbr`,`vw_inventory`.`count_sum` AS `count_sum`,`vw_inventory`.`weight_sum` AS `weight_sum` from `vw_inventory` ;

-- ----------------------------
-- View structure for `vw_inventory_sum_2`
-- ----------------------------
DROP VIEW IF EXISTS `vw_inventory_sum_2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_inventory_sum_2` AS select `vw_inventory_sum_1`.`description` AS `description`,`vw_inventory_sum_1`.`trx_date` AS `trx_date`,sum(`vw_inventory_sum_1`.`count_sum`) AS `count_sum`,sum(`vw_inventory_sum_1`.`weight_sum`) AS `weight_sum` from `vw_inventory_sum_1` group by `vw_inventory_sum_1`.`trx_date` ;

-- ----------------------------
-- View structure for `vw_invoice`
-- ----------------------------
DROP VIEW IF EXISTS `vw_invoice`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_invoice` AS select `b`.`invoice_num` AS `invoice_num`,`b`.`trx_date` AS `trx_date`,`b`.`cashier_id` AS `cashier_id`,`a`.`unit_price` AS `unit_price`,`a`.`product_id` AS `product_id`,`c`.`barcode` AS `barcode`,`c`.`product_name` AS `product_name`,`c`.`product_class` AS `product_class`,`c`.`product_category` AS `product_category`,`c`.`product_img_blob` AS `product_img_blob`,`c`.`product_img_url` AS `product_img_url`,`c`.`weight` AS `weight`,`c`.`is_secondhand` AS `is_secondhand`,`c`.`penimbang` AS `penimbang`,`c`.`status` AS `status`,`c`.`created_at` AS `created_at` from ((`transaction_details` `a` left join `transaction_head` `b` on((`a`.`invoice_num` = `b`.`invoice_num`))) join `products` `c` on((`a`.`product_id` = `c`.`id`))) ;

-- ----------------------------
-- View structure for `vw_products`
-- ----------------------------
DROP VIEW IF EXISTS `vw_products`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_products` AS select `a`.`id` AS `id`,`a`.`barcode` AS `barcode`,`a`.`product_name` AS `product_name`,`a`.`product_class` AS `product_class_id`,`b`.`label` AS `product_category`,`b`.`abbr` AS `product_category_abbr`,`a`.`product_category` AS `product_category_id`,`c`.`label` AS `product_class`,`c`.`abbr` AS `product_class_abbr`,`c`.`product_type` AS `product_type`,`a`.`product_img_blob` AS `product_img_blob`,`a`.`product_img_url` AS `product_img_url`,`a`.`weight` AS `weight`,`a`.`is_secondhand` AS `is_secondhand_id`,(case `a`.`is_secondhand` when '1' then 'Barang Baru' when '0' then 'Barang Bekas' end) AS `is_secondhand`,`a`.`penimbang` AS `penimbang`,`a`.`status` AS `status`,`a`.`created_at` AS `created_at` from ((`products` `a` left join `product_category` `b` on((`a`.`product_category` = `b`.`id`))) left join `product_class` `c` on((`c`.`id` = `a`.`product_class`))) ;

-- ----------------------------
-- View structure for `vw_products_readystock`
-- ----------------------------
DROP VIEW IF EXISTS `vw_products_readystock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_products_readystock` AS select `b`.`currency` AS `currency`,`b`.`value_pergram` AS `value_pergram`,round((`a`.`weight` * `b`.`value_pergram`),0) AS `value_perweight`,`a`.`id` AS `id`,`a`.`barcode` AS `barcode`,`a`.`product_name` AS `product_name`,`a`.`product_class_id` AS `product_class_id`,`a`.`product_category` AS `product_category`,`a`.`product_category_abbr` AS `product_category_abbr`,`a`.`product_category_id` AS `product_category_id`,`a`.`product_class` AS `product_class`,`a`.`product_class_abbr` AS `product_class_abbr`,`a`.`product_type` AS `product_type`,`a`.`product_img_blob` AS `product_img_blob`,`a`.`product_img_url` AS `product_img_url`,`a`.`weight` AS `weight`,`a`.`is_secondhand` AS `is_secondhand`,`a`.`penimbang` AS `penimbang`,`a`.`status` AS `status`,`a`.`created_at` AS `created_at` from (`vw_products` `a` left join `conversion` `b` on(((`a`.`product_class_id` = `b`.`product_class`) and (`a`.`product_type` = `b`.`product_type`)))) ;

-- ----------------------------
-- View structure for `vw_purchased_items`
-- ----------------------------
DROP VIEW IF EXISTS `vw_purchased_items`;
