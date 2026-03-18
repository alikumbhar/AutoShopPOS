/*

SQLyog Ultimate v8.55 
MySQL - 8.0.29-0ubuntu0.20.04.3 : Database - automanic

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `automanic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;



USE `automanic`;



/*Table structure for table `add_amount` */



DROP TABLE IF EXISTS `add_amount`;



CREATE TABLE `add_amount` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `amount` bigint DEFAULT NULL,
  `account_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `add_amount` */



/*Table structure for table `bank` */



DROP TABLE IF EXISTS `bank`;



CREATE TABLE `bank` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(150) DEFAULT NULL,
  `bank_name` varchar(300) DEFAULT NULL,
  `account_no` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `bank_detail` text,
  `account_created_date` varchar(20) DEFAULT NULL,
  `payment_method` varchar(120) DEFAULT NULL,
  `reference` varchar(300) DEFAULT NULL,
  `attachment` varchar(300) DEFAULT NULL,
  `bank_location` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `bank` */



insert  into `bank`(`id`,`payee_name`,`bank_name`,`account_no`,`amount`,`bank_detail`,`account_created_date`,`payment_method`,`reference`,`attachment`,`bank_location`) values (1,'Dunzoo12','Payoneer - THE US BANK','45285558','50000','opeining account','10-5-2020','card','dunizo',NULL,'');



/*Table structure for table `bank_deposit` */



DROP TABLE IF EXISTS `bank_deposit`;



CREATE TABLE `bank_deposit` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `account_name` varchar(300) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(300) DEFAULT NULL,
  `opening_balance` varchar(150) DEFAULT NULL,
  `bank_address` text,
  `default_account` varchar(150) DEFAULT NULL,
  `bank_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `bank_deposit` */



insert  into `bank_deposit`(`id`,`account_name`,`account_type`,`account_no`,`bank_name`,`opening_balance`,`bank_address`,`default_account`,`bank_id`) values (1,'Dunzoo12','saving','p1211453165','payonner - US BANK','10000','us - BNK','yes',NULL);



/*Table structure for table `brand` */



DROP TABLE IF EXISTS `brand`;



CREATE TABLE `brand` (
  `brand_id` bigint NOT NULL AUTO_INCREMENT,
  `brand` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



/*Data for the table `brand` */



insert  into `brand`(`brand_id`,`brand`) values (1,'China Brand'),(2,'Handsfree'),(3,'amazon');



/*Table structure for table `calculate_expenditure` */



DROP TABLE IF EXISTS `calculate_expenditure`;



CREATE TABLE `calculate_expenditure` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `opening_balance` bigint DEFAULT NULL,
  `set_date` varchar(25) DEFAULT NULL,
  `set_time` varchar(25) DEFAULT NULL,
  `exp_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `calculate_expenditure` */



/*Table structure for table `category` */



DROP TABLE IF EXISTS `category`;



CREATE TABLE `category` (
  `category_id` bigint NOT NULL AUTO_INCREMENT,
  `category` varchar(300) DEFAULT NULL,
  `category_detail` text,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



/*Data for the table `category` */



insert  into `category`(`category_id`,`category`,`category_detail`,`user_id`) values (1,'Car Accessories',NULL,1),(2,'China Brand',NULL,1),(3,'Samsung',NULL,NULL),(4,'Asian',NULL,NULL),(5,'Home Appliances',NULL,NULL);



/*Table structure for table `cheque` */



DROP TABLE IF EXISTS `cheque`;



CREATE TABLE `cheque` (
  `cheque_id` bigint NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(300) DEFAULT NULL,
  `cheque_book` varchar(300) DEFAULT NULL,
  `leaf` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`cheque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `cheque` */



insert  into `cheque`(`cheque_id`,`bank_name`,`cheque_book`,`leaf`) values (1,'Payoneer - THE US BANK','102555555','755885');



/*Table structure for table `count_customer` */



DROP TABLE IF EXISTS `count_customer`;



CREATE TABLE `count_customer` (
  `cust_count_id` bigint NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `count_date` varchar(20) DEFAULT NULL,
  `product_sale_id` bigint DEFAULT NULL,
  PRIMARY KEY (`cust_count_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;



/*Data for the table `count_customer` */



insert  into `count_customer`(`cust_count_id`,`customer_id`,`customer_name`,`count_date`,`product_sale_id`) values (1,1,'walk in customers','2021-08-29 ',1),(2,2,'Jimi max','2021-08-29 ',2),(3,1,'walk in customers','2021-09-02 ',3),(4,1,'walk in customers','2021-09-03 ',4),(5,2,'Jimi max','2021-09-03 ',5),(6,2,'Jimi max','2021-09-03 ',6),(7,2,'Jimi max','2021-09-03 ',7),(8,1,'walk in customers','2021-09-07 ',8),(9,1,'walk in customers','2021-09-07 ',9),(10,1,'walk in customers','2021-09-07 ',10),(11,1,'walk in customers','2021-09-07 ',11),(12,1,'walk in customers','2021-09-10 ',12),(13,1,'walk in customers','2021-09-30 ',13),(14,6,'William Shakar','2021-10-02 ',14),(15,1,'walk in customers','2021-12-06 ',15),(16,1,'walk in customers','2021-12-06 ',16),(17,1,'walk in customers','2022-01-25 ',17),(18,4,'Robert Will','2022-01-25 ',18),(19,5,'Michael Jhon','2022-01-25 ',19),(20,1,'walk in customers','2022-01-26 ',20),(21,1,'walk in customers','2022-01-26 ',21),(22,1,'walk in customers','2022-01-26 ',22),(23,1,'walk in customers','2022-01-26 ',23),(24,1,'walk in customers','2022-01-26 ',24),(25,1,'walk in customers','2022-01-26 ',25),(26,1,'walk in customers','2022-01-26 ',26),(27,1,'walk in customers','2022-01-26 ',27),(28,1,'walk in customers','2022-01-26 ',28),(29,1,'walk in customers','2022-01-26 ',29),(30,1,'walk in customers','2022-01-26 ',30),(31,1,'walk in customers','2022-01-26 ',31),(32,1,'walk in customers','2022-01-26 ',32),(33,1,'walk in customers','2022-01-26 ',33),(34,1,'walk in customers','2022-01-26 ',34),(35,1,'walk in customers','2022-01-26 ',35),(36,1,'walk in customers','2022-01-26 ',36),(37,1,'walk in customers','2022-01-26 ',37),(38,1,'walk in customers','2022-01-26 ',38),(39,1,'walk in customers','2022-01-26 ',39),(40,1,'walk in customers','2022-01-31 ',40),(41,1,'walk in customers','2022-02-10 ',41),(42,1,'walk in customers','2022-05-16 ',42),(43,1,'walk in customers','2022-05-16 ',43),(44,1,'walk in customers','2022-05-16 ',44);



/*Table structure for table `credit` */



DROP TABLE IF EXISTS `credit`;



CREATE TABLE `credit` (
  `c_id` bigint NOT NULL AUTO_INCREMENT,
  `credit` varchar(300) DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `credit` */



/*Table structure for table `currency` */



DROP TABLE IF EXISTS `currency`;



CREATE TABLE `currency` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `code` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dial_code` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c_symbol` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `c_code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb3;



/*Data for the table `currency` */



insert  into `currency`(`ID`,`name`,`code`,`dial_code`,`c_name`,`c_symbol`,`c_code`) values (1,'Afghanistan','AF','+93','Afghan afghani','؋','AFN'),(2,'Aland Islands','AX','+358','','',''),(3,'Albania','AL','+355','Albanian lek','L','ALL'),(4,'Algeria','DZ','+213','Algerian dinar','د.ج','DZD'),(5,'AmericanSamoa','AS','+1684','','',''),(6,'Andorra','AD','+376','Euro','€','EUR'),(7,'Angola','AO','+244','Angolan kwanza','Kz','AOA'),(8,'Anguilla','AI','+1264','East Caribbean dolla','$','XCD'),(9,'Antarctica','AQ','+672','','',''),(10,'Antigua and Barbuda','AG','+1268','East Caribbean dolla','$','XCD'),(11,'Argentina','AR','+54','Argentine peso','$','ARS'),(12,'Armenia','AM','+374','Armenian dram','','AMD'),(13,'Aruba','AW','+297','Aruban florin','ƒ','AWG'),(14,'Australia','AU','+61','Australian dollar','$','AUD'),(15,'Austria','AT','+43','Euro','€','EUR'),(16,'Azerbaijan','AZ','+994','Azerbaijani manat','','AZN'),(17,'Bahamas','BS','+1242','','',''),(18,'Bahrain','BH','+973','Bahraini dinar','.د.ب','BHD'),(19,'Bangladesh','BD','+880','Bangladeshi taka','৳','BDT'),(20,'Barbados','BB','+1246','Barbadian dollar','$','BBD'),(21,'Belarus','BY','+375','Belarusian ruble','Br','BYR'),(22,'Belgium','BE','+32','Euro','€','EUR'),(23,'Belize','BZ','+501','Belize dollar','$','BZD'),(24,'Benin','BJ','+229','West African CFA fra','Fr','XOF'),(25,'Bermuda','BM','+1441','Bermudian dollar','$','BMD'),(26,'Bhutan','BT','+975','Bhutanese ngultrum','Nu.','BTN'),(27,'Bolivia, Plurination','BO','+591','','',''),(28,'Bosnia and Herzegovi','BA','+387','','',''),(29,'Botswana','BW','+267','Botswana pula','P','BWP'),(30,'Brazil','BR','+55','Brazilian real','R$','BRL'),(31,'British Indian Ocean','IO','+246','','',''),(32,'Brunei Darussalam','BN','+673','','',''),(33,'Bulgaria','BG','+359','Bulgarian lev','лв','BGN'),(34,'Burkina Faso','BF','+226','West African CFA fra','Fr','XOF'),(35,'Burundi','BI','+257','Burundian franc','Fr','BIF'),(36,'Cambodia','KH','+855','Cambodian riel','៛','KHR'),(37,'Cameroon','CM','+237','Central African CFA ','Fr','XAF'),(38,'Canada','CA','+1','Canadian dollar','$','CAD'),(39,'Cape Verde','CV','+238','Cape Verdean escudo','Esc or $','CVE'),(40,'Cayman Islands','KY','+ 345','Cayman Islands dolla','$','KYD'),(41,'Central African Repu','CF','+236','','',''),(42,'Chad','TD','+235','Central African CFA ','Fr','XAF'),(43,'Chile','CL','+56','Chilean peso','$','CLP'),(44,'China','CN','+86','Chinese yuan','¥ or 元','CNY'),(45,'Christmas Island','CX','+61','','',''),(46,'Cocos (Keeling) Isla','CC','+61','','',''),(47,'Colombia','CO','+57','Colombian peso','$','COP'),(48,'Comoros','KM','+269','Comorian franc','Fr','KMF'),(49,'Congo','CG','+242','','',''),(50,'Congo, The Democrati','CD','+243','','',''),(51,'Cook Islands','CK','+682','New Zealand dollar','$','NZD'),(52,'Costa Rica','CR','+506','Costa Rican colón','₡','CRC'),(53,'Cote d\'Ivoire','CI','+225','West African CFA fra','Fr','XOF'),(54,'Croatia','HR','+385','Croatian kuna','kn','HRK'),(55,'Cuba','CU','+53','Cuban convertible pe','$','CUC'),(56,'Cyprus','CY','+357','Euro','€','EUR'),(57,'Czech Republic','CZ','+420','Czech koruna','Kč','CZK'),(58,'Denmark','DK','+45','Danish krone','kr','DKK'),(59,'Djibouti','DJ','+253','Djiboutian franc','Fr','DJF'),(60,'Dominica','DM','+1767','East Caribbean dolla','$','XCD'),(61,'Dominican Republic','DO','+1849','Dominican peso','$','DOP'),(62,'Ecuador','EC','+593','United States dollar','$','USD'),(63,'Egypt','EG','+20','Egyptian pound','£ or ج.م','EGP'),(64,'El Salvador','SV','+503','United States dollar','$','USD'),(65,'Equatorial Guinea','GQ','+240','Central African CFA ','Fr','XAF'),(66,'Eritrea','ER','+291','Eritrean nakfa','Nfk','ERN'),(67,'Estonia','EE','+372','Euro','€','EUR'),(68,'Ethiopia','ET','+251','Ethiopian birr','Br','ETB'),(69,'Falkland Islands (Ma','FK','+500','','',''),(70,'Faroe Islands','FO','+298','Danish krone','kr','DKK'),(71,'Fiji','FJ','+679','Fijian dollar','$','FJD'),(72,'Finland','FI','+358','Euro','€','EUR'),(73,'France','FR','+33','Euro','€','EUR'),(74,'French Guiana','GF','+594','','',''),(75,'French Polynesia','PF','+689','CFP franc','Fr','XPF'),(76,'Gabon','GA','+241','Central African CFA ','Fr','XAF'),(77,'Gambia','GM','+220','','',''),(78,'Georgia','GE','+995','Georgian lari','ლ','GEL'),(79,'Germany','DE','+49','Euro','€','EUR'),(80,'Ghana','GH','+233','Ghana cedi','₵','GHS'),(81,'Gibraltar','GI','+350','Gibraltar pound','£','GIP'),(82,'Greece','GR','+30','Euro','€','EUR'),(83,'Greenland','GL','+299','','',''),(84,'Grenada','GD','+1473','East Caribbean dolla','$','XCD'),(85,'Guadeloupe','GP','+590','','',''),(86,'Guam','GU','+1671','','',''),(87,'Guatemala','GT','+502','Guatemalan quetzal','Q','GTQ'),(88,'Guernsey','GG','+44','British pound','£','GBP'),(89,'Guinea','GN','+224','Guinean franc','Fr','GNF'),(90,'Guinea-Bissau','GW','+245','West African CFA fra','Fr','XOF'),(91,'Guyana','GY','+595','Guyanese dollar','$','GYD'),(92,'Haiti','HT','+509','Haitian gourde','G','HTG'),(93,'Holy See (Vatican Ci','VA','+379','','',''),(94,'Honduras','HN','+504','Honduran lempira','L','HNL'),(95,'Hong Kong','HK','+852','Hong Kong dollar','$','HKD'),(96,'Hungary','HU','+36','Hungarian forint','Ft','HUF'),(97,'Iceland','IS','+354','Icelandic króna','kr','ISK'),(98,'India','IN','+91','Indian rupee','₹','INR'),(99,'Indonesia','ID','+62','Indonesian rupiah','Rp','IDR'),(100,'Iran, Islamic Republ','IR','+98','','',''),(101,'Iraq','IQ','+964','Iraqi dinar','ع.د','IQD'),(102,'Ireland','IE','+353','Euro','€','EUR'),(103,'Isle of Man','IM','+44','British pound','£','GBP'),(104,'Israel','IL','+972','Israeli new shekel','₪','ILS'),(105,'Italy','IT','+39','Euro','€','EUR'),(106,'Jamaica','JM','+1876','Jamaican dollar','$','JMD'),(107,'Japan','JP','+81','Japanese yen','¥','JPY'),(108,'Jersey','JE','+44','British pound','£','GBP'),(109,'Jordan','JO','+962','Jordanian dinar','د.ا','JOD'),(110,'Kazakhstan','KZ','+7 7','Kazakhstani tenge','','KZT'),(111,'Kenya','KE','+254','Kenyan shilling','Sh','KES'),(112,'Kiribati','KI','+686','Australian dollar','$','AUD'),(113,'Korea, Democratic Pe','KP','+850','','',''),(114,'Korea, Republic of S','KR','+82','','',''),(115,'Kuwait','KW','+965','Kuwaiti dinar','د.ك','KWD'),(116,'Kyrgyzstan','KG','+996','Kyrgyzstani som','лв','KGS'),(117,'Laos','LA','+856','Lao kip','₭','LAK'),(118,'Latvia','LV','+371','Euro','€','EUR'),(119,'Lebanon','LB','+961','Lebanese pound','ل.ل','LBP'),(120,'Lesotho','LS','+266','Lesotho loti','L','LSL'),(121,'Liberia','LR','+231','Liberian dollar','$','LRD'),(122,'Libyan Arab Jamahiri','LY','+218','','',''),(123,'Liechtenstein','LI','+423','Swiss franc','Fr','CHF'),(124,'Lithuania','LT','+370','Euro','€','EUR'),(125,'Luxembourg','LU','+352','Euro','€','EUR'),(126,'Macao','MO','+853','','',''),(127,'Macedonia','MK','+389','','',''),(128,'Madagascar','MG','+261','Malagasy ariary','Ar','MGA'),(129,'Malawi','MW','+265','Malawian kwacha','MK','MWK'),(130,'Malaysia','MY','+60','Malaysian ringgit','RM','MYR'),(131,'Maldives','MV','+960','Maldivian rufiyaa','.ރ','MVR'),(132,'Mali','ML','+223','West African CFA fra','Fr','XOF'),(133,'Malta','MT','+356','Euro','€','EUR'),(134,'Marshall Islands','MH','+692','United States dollar','$','USD'),(135,'Martinique','MQ','+596','','',''),(136,'Mauritania','MR','+222','Mauritanian ouguiya','UM','MRO'),(137,'Mauritius','MU','+230','Mauritian rupee','₨','MUR'),(138,'Mayotte','YT','+262','','',''),(139,'Mexico','MX','+52','Mexican peso','$','MXN'),(140,'Micronesia, Federate','FM','+691','','',''),(141,'Moldova','MD','+373','Moldovan leu','L','MDL'),(142,'Monaco','MC','+377','Euro','€','EUR'),(143,'Mongolia','MN','+976','Mongolian tögrög','₮','MNT'),(144,'Montenegro','ME','+382','Euro','€','EUR'),(145,'Montserrat','MS','+1664','East Caribbean dolla','$','XCD'),(146,'Morocco','MA','+212','Moroccan dirham','د.م.','MAD'),(147,'Mozambique','MZ','+258','Mozambican metical','MT','MZN'),(148,'Myanmar','MM','+95','Burmese kyat','Ks','MMK'),(149,'Namibia','NA','+264','Namibian dollar','$','NAD'),(150,'Nauru','NR','+674','Australian dollar','$','AUD'),(151,'Nepal','NP','+977','Nepalese rupee','₨','NPR'),(152,'Netherlands','NL','+31','Euro','€','EUR'),(153,'Netherlands Antilles','AN','+599','','',''),(154,'New Caledonia','NC','+687','CFP franc','Fr','XPF'),(155,'New Zealand','NZ','+64','New Zealand dollar','$','NZD'),(156,'Nicaragua','NI','+505','Nicaraguan córdoba','C$','NIO'),(157,'Niger','NE','+227','West African CFA fra','Fr','XOF'),(158,'Nigeria','NG','+234','Nigerian naira','₦','NGN'),(159,'Niue','NU','+683','New Zealand dollar','$','NZD'),(160,'Norfolk Island','NF','+672','','',''),(161,'Northern Mariana Isl','MP','+1670','','',''),(162,'Norway','NO','+47','Norwegian krone','kr','NOK'),(163,'Oman','OM','+968','Omani rial','ر.ع.','OMR'),(164,'Pakistan','PK','+92','Pakistani rupee','₨','PKR'),(165,'Palau','PW','+680','Palauan dollar','$',''),(166,'Palestinian Territor','PS','+970','','',''),(167,'Panama','PA','+507','Panamanian balboa','B/.','PAB'),(168,'Papua New Guinea','PG','+675','Papua New Guinean ki','K','PGK'),(169,'Paraguay','PY','+595','Paraguayan guaraní','₲','PYG'),(170,'Peru','PE','+51','Peruvian nuevo sol','S/.','PEN'),(171,'Philippines','PH','+63','Philippine peso','₱','PHP'),(172,'Pitcairn','PN','+872','','',''),(173,'Poland','PL','+48','Polish z?oty','zł','PLN'),(174,'Portugal','PT','+351','Euro','€','EUR'),(175,'Puerto Rico','PR','+1939','','',''),(176,'Qatar','QA','+974','Qatari riyal','ر.ق','QAR'),(177,'Romania','RO','+40','Romanian leu','lei','RON'),(178,'Russia','RU','+7','Russian ruble','','RUB'),(179,'Rwanda','RW','+250','Rwandan franc','Fr','RWF'),(180,'Reunion','RE','+262','','',''),(181,'Saint Barthelemy','BL','+590','','',''),(182,'Saint Helena, Ascens','SH','+290','','',''),(183,'Saint Kitts and Nevi','KN','+1869','','',''),(184,'Saint Lucia','LC','+1758','East Caribbean dolla','$','XCD'),(185,'Saint Martin','MF','+590','','',''),(186,'Saint Pierre and Miq','PM','+508','','',''),(187,'Saint Vincent and th','VC','+1784','','',''),(188,'Samoa','WS','+685','Samoan t?l?','T','WST'),(189,'San Marino','SM','+378','Euro','€','EUR'),(190,'Sao Tome and Princip','ST','+239','','',''),(191,'Saudi Arabia','SA','+966','Saudi riyal','ر.س','SAR'),(192,'Senegal','SN','+221','West African CFA fra','Fr','XOF'),(193,'Serbia','RS','+381','Serbian dinar','дин. or din.','RSD'),(194,'Seychelles','SC','+248','Seychellois rupee','₨','SCR'),(195,'Sierra Leone','SL','+232','Sierra Leonean leone','Le','SLL'),(196,'Singapore','SG','+65','Brunei dollar','$','BND'),(197,'Slovakia','SK','+421','Euro','€','EUR'),(198,'Slovenia','SI','+386','Euro','€','EUR'),(199,'Solomon Islands','SB','+677','Solomon Islands doll','$','SBD'),(200,'Somalia','SO','+252','Somali shilling','Sh','SOS'),(201,'South Africa','ZA','+27','South African rand','R','ZAR'),(202,'South Georgia and th','GS','+500','','',''),(203,'Spain','ES','+34','Euro','€','EUR'),(204,'Sri Lanka','LK','+94','Sri Lankan rupee','Rs or රු','LKR'),(205,'Sudan','SD','+249','Sudanese pound','ج.س.','SDG'),(206,'Suriname','SR','+597','Surinamese dollar','$','SRD'),(207,'Svalbard and Jan May','SJ','+47','','',''),(208,'Swaziland','SZ','+268','Swazi lilangeni','L','SZL'),(209,'Sweden','SE','+46','Swedish krona','kr','SEK'),(210,'Switzerland','CH','+41','Swiss franc','Fr','CHF'),(211,'Syrian Arab Republic','SY','+963','','',''),(212,'Taiwan','TW','+886','New Taiwan dollar','$','TWD'),(213,'Tajikistan','TJ','+992','Tajikistani somoni','ЅМ','TJS'),(214,'Tanzania, United Rep','TZ','+255','','',''),(215,'Thailand','TH','+66','Thai baht','฿','THB'),(216,'Timor-Leste','TL','+670','','',''),(217,'Togo','TG','+228','West African CFA fra','Fr','XOF'),(218,'Tokelau','TK','+690','','',''),(219,'Tonga','TO','+676','Tongan pa?anga','T$','TOP'),(220,'Trinidad and Tobago','TT','+1868','Trinidad and Tobago ','$','TTD'),(221,'Tunisia','TN','+216','Tunisian dinar','د.ت','TND'),(222,'Turkey','TR','+90','Turkish lira','','TRY'),(223,'Turkmenistan','TM','+993','Turkmenistan manat','m','TMT'),(224,'Turks and Caicos Isl','TC','+1649','','',''),(225,'Tuvalu','TV','+688','Australian dollar','$','AUD'),(226,'Uganda','UG','+256','Ugandan shilling','Sh','UGX'),(227,'Ukraine','UA','+380','Ukrainian hryvnia','₴','UAH'),(228,'United Arab Emirates','AE','+971','United Arab Emirates','د.إ','AED'),(229,'United Kingdom','GB','+44','British pound','£','GBP'),(230,'United States','US','+1','United States dollar','$','USD'),(231,'Uruguay','UY','+598','Uruguayan peso','$','UYU'),(232,'Uzbekistan','UZ','+998','Uzbekistani som','','UZS'),(233,'Vanuatu','VU','+678','Vanuatu vatu','Vt','VUV'),(234,'Venezuela, Bolivaria','VE','+58','','',''),(235,'Vietnam','VN','+84','Vietnamese ??ng','₫','VND'),(236,'Virgin Islands, Brit','VG','+1284','','',''),(237,'Virgin Islands, U.S.','VI','+1340','','',''),(238,'Wallis and Futuna','WF','+681','CFP franc','Fr','XPF'),(239,'Yemen','YE','+967','Yemeni rial','﷼','YER'),(240,'Zambia','ZM','+260','Zambian kwacha','ZK','ZMW'),(241,'Zimbabwe','ZW','+263','Botswana pula','P','BWP');



/*Table structure for table `customers` */



DROP TABLE IF EXISTS `customers`;



CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `nric` varchar(99) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `customer_group` int NOT NULL,
  `created_user_id` int NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int NOT NULL COMMENT '1: Active, 0: Inactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `customers` */



insert  into `customers`(`id`,`firstname`,`lastname`,`nric`,`email`,`mobile`,`address`,`postal_code`,`country`,`customer_group`,`created_user_id`,`created_datetime`,`updated_user_id`,`updated_datetime`,`status`) values (1,'Walk in ','customer','45822222222225','jim@gmail.com','0452222585','ohayio','2526','US',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(4,'Robert','Will','','willRober@gmail.com','6955200025','91  Northgate Street','CA6 9BB','United Kingdom',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(5,'Michael','Jhon','','jm@gmail.com','69552225522','91  Northgate Street','CA6 9BB','United Kingdom',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(6,'William','Shakar','','shakar@gmail.com','965588885558','91  Northgate Street','CA6 9BB','United Kingdom',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(7,'David','recard','','recar@gmail.com','26264524615','marasyer','44200','India',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(8,'Thomas','Richarder','','ricehr@gmail.com','598889555','91  Northgate Street','CA6 9BB','United Kingdom',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(9,'Matthew','Antho','','anthi@gmail.com','07700900077','91  Northgate Street','CA6 9BB','United Kingdom',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0),(10,'Zic','Mark','','zicm@gmail.com','26264524615','marasyer','44200','India',0,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0);



/*Table structure for table `email_templates` */



DROP TABLE IF EXISTS `email_templates`;



CREATE TABLE `email_templates` (
  `ID` int NOT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `email_content` text,
  `dated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



/*Data for the table `email_templates` */



insert  into `email_templates`(`ID`,`email_name`,`from_name`,`from_email`,`email_subject`,`email_content`,`dated`) values (9,'Account Verification','Techobites','info@techobites.com','Email Verification','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"http://codeareena.com/online_dating\"><img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\" /></a></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<hr color=\"#CCCCCC\" /></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please click on the given below link to verify the email address.</strong><br />\r\n<a href=\"{SITE_URL}verification/{VERIFICATION_CODE}\">{SITE_URL}verification/{VERIFICATION_CODE}</a></div>','2016-05-24 14:16:05'),(10,'Reset Password','Techobites','info@techobites.com','Password Recovery','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"{SITE_URL}\"><img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\"></a></div>\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please Click on the given below link to reset your password.</strong><br/>\r\n  <a href=\"{SITE_URL}user/reset/{VERIFICATION_CODE}\">{SITE_URL}user/reset/{VERIFICATION_CODE}</a></div>\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n  <hr color=\"#CCCCCC\">\r\n  <div align=\"center\"><a href=\"{SITE_URL}\">{SITENAME}</a></div>\r\n</div>','2016-05-24 14:28:19'),(11,'Contact Us','{USER_NAME}','{USER_EMAIL}','Contact Us Form Submitted','<style type=\"text/css\">.txt {\n  font-size:12px;\n font-family:Arial, Helvetica, sans-serif;\n color:#000;\n}\n</style>\n<table border=\"0\" class=\"txt\" width=\"500\">\n  <tbody>\n   <tr>\n      <td colspan=\"2\">A contact us form submitted.</td>\n   </tr>\n   <tr>\n      <td width=\"146\">&nbsp;</td>\n     <td width=\"344\">&nbsp;</td>\n   </tr>\n   <tr>\n      <td align=\"right\">First Name:</td>\n      <td>&nbsp;{FIRST_NAME}</td>\n   </tr>\n   <tr>\n      <td align=\"right\">Last Name:</td>\n     <td>&nbsp;{LAST_NAME}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">Email:</td>\n     <td>&nbsp;{EMAIL}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">Comment:</td>\n     <td>&nbsp;{COMMENT}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">&nbsp;</td>\n     <td>&nbsp;</td>\n   </tr>\n </tbody>\n</table>','2016-05-24 14:37:09'),(12,'You have a new message','{USER_NAME}','{USER_EMAIL}','You have a new message','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\">\r\n<a href=\"{SITE_URL}\">\r\n  <img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\"></a>\r\n</div>\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<strong>You have a new message.</strong><br/>\r\n  <a href=\"{SITE_URL}profile/\">View Now</a></div>\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n  <hr color=\"#CCCCCC\">\r\n  <div align=\"center\"><a href=\"{SITE_URL}\">{SITENAME}</a></div>\r\n  <div align=\"center\">message</a></div>\r\n\r\n</div>','2016-05-24 14:38:18'),(9,'Account Verification','Techobites','info@techobites.com','Email Verification','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"http://codeareena.com/online_dating\">\r\n<img src=\"\" /></a></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<hr color=\"#CCCCCC\" /></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please click on the given below link to verify the email address.</strong><br />\r\n<a href=\"www.subkuchsell.com/verification/<?php echo $verification_code;?>\">Verify Now</a></div>','2016-05-24 14:16:05'),(10,'Reset Password','Techobites','info@techobites.com','Password Recovery','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\"><a href=\"http://codeareena.com/online_dating\">\r\n<img src=\"\" /></a></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<hr color=\"#CCCCCC\" /></div>\r\n\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\"><strong>Please click on the given below link to verify the email address.</strong><br />\r\n<a href=\"www.subkuchsell.com/verification/<?php echo $verification_code;?>\">Verify Now</a></div>','2016-05-24 14:28:19'),(11,'Contact Us','{USER_NAME}','{USER_EMAIL}','Contact Us Form Submitted','<style type=\"text/css\">.txt {\n  font-size:12px;\n font-family:Arial, Helvetica, sans-serif;\n color:#000;\n}\n</style>\n<table border=\"0\" class=\"txt\" width=\"500\">\n  <tbody>\n   <tr>\n      <td colspan=\"2\">A contact us form submitted.</td>\n   </tr>\n   <tr>\n      <td width=\"146\">&nbsp;</td>\n     <td width=\"344\">&nbsp;</td>\n   </tr>\n   <tr>\n      <td align=\"right\">First Name:</td>\n      <td>&nbsp;{FIRST_NAME}</td>\n   </tr>\n   <tr>\n      <td align=\"right\">Last Name:</td>\n     <td>&nbsp;{LAST_NAME}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">Email:</td>\n     <td>&nbsp;{EMAIL}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">Comment:</td>\n     <td>&nbsp;{COMMENT}</td>\n    </tr>\n   <tr>\n      <td align=\"right\">&nbsp;</td>\n     <td>&nbsp;</td>\n   </tr>\n </tbody>\n</table>','2016-05-24 14:37:09'),(12,'You have a new message','{USER_NAME}','{USER_EMAIL}','You have a new message','<div style=\"background:#999999; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;\">\r\n<a href=\"{SITE_URL}\">\r\n  <img src=\"http://codeareena.com/online_dating/glancePublic/images/logo.png\"></a>\r\n</div>\r\n<div style=\"padding:10px; background:#F1F2F6;  width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n<strong>You have a new message.</strong><br/>\r\n  <a href=\"{SITE_URL}profile/\">View Now</a></div>\r\n<div style=\"padding:10px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;\">\r\n  <hr color=\"#CCCCCC\">\r\n  <div align=\"center\"><a href=\"{SITE_URL}\">{SITENAME}</a></div>\r\n  <div align=\"center\">message</a></div>\r\n\r\n</div>','2016-05-24 14:38:18');



/*Table structure for table `exchange_funds` */



DROP TABLE IF EXISTS `exchange_funds`;



CREATE TABLE `exchange_funds` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `from_account` varchar(150) DEFAULT NULL,
  `to_account` varchar(150) DEFAULT NULL,
  `ft_date` varchar(30) DEFAULT NULL,
  `ft_detail` text,
  `ft_amount` varchar(150) DEFAULT NULL,
  `payment_method` varchar(150) DEFAULT NULL,
  `ft_reference` varchar(300) DEFAULT NULL,
  `bank_id` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `exchange_funds` */



/*Table structure for table `expenditure` */



DROP TABLE IF EXISTS `expenditure`;



CREATE TABLE `expenditure` (
  `expn_id` int NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(300) DEFAULT NULL,
  `exp_category` varchar(300) DEFAULT NULL,
  `what_for` text,
  `amount` varchar(100) DEFAULT NULL,
  `is_returnable` varchar(10) DEFAULT NULL,
  `notes` text,
  `created_datetime` varchar(75) DEFAULT NULL,
  `created_user_id` varchar(120) DEFAULT NULL,
  `account_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`expn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `expenditure` */



/*Table structure for table `expense_category` */



DROP TABLE IF EXISTS `expense_category`;



CREATE TABLE `expense_category` (
  `exp_cate_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(150) DEFAULT NULL,
  `category_detail` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`exp_cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `expense_category` */



insert  into `expense_category`(`exp_cate_id`,`category`,`category_detail`) values (1,'Purchase On Cash ','purcahse things on cash\r\n');



/*Table structure for table `item_type` */



DROP TABLE IF EXISTS `item_type`;



CREATE TABLE `item_type` (
  `t_id` bigint NOT NULL AUTO_INCREMENT,
  `spec` varchar(30) DEFAULT NULL,
  `i_type` bigint DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;



/*Data for the table `item_type` */



insert  into `item_type`(`t_id`,`spec`,`i_type`) values (1,'200',8),(2,'200',9),(3,'200',10),(4,'150',11),(5,'200',12),(6,'200',8),(7,'200',9),(8,'200',10),(9,'200',11),(10,'',108);



/*Table structure for table `item_update_history` */



DROP TABLE IF EXISTS `item_update_history`;



CREATE TABLE `item_update_history` (
  `item_h_id` bigint NOT NULL AUTO_INCREMENT,
  `item_update_date` varchar(20) DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `item_update_time` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `item_last_stocked` varchar(20) DEFAULT NULL,
  `stock_level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`item_h_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `item_update_history` */



/*Table structure for table `pages` */



DROP TABLE IF EXISTS `pages`;



CREATE TABLE `pages` (
  `page_id` bigint NOT NULL AUTO_INCREMENT,
  `pages` varchar(300) DEFAULT NULL,
  `parents` varchar(300) DEFAULT NULL,
  `page_status` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;



/*Data for the table `pages` */



insert  into `pages`(`page_id`,`pages`,`parents`,`page_status`) values (1,'pos',NULL,NULL),(2,'dashboard',NULL,NULL),(3,'add_supplier','suppliers',NULL),(4,'add_item','items',NULL),(5,'add_category','category',NULL),(6,'inventory',NULL,NULL),(7,'expenditure',NULL,NULL),(8,'expense_category','category',NULL),(9,'sale_receiveable','sales',NULL),(10,'services',NULL,NULL),(11,'reports',NULL,NULL),(12,'add_purchase','purchases',NULL),(13,'add_customer','customers',NULL),(14,'add_account','banking',NULL),(15,'add_deposit','banking',NULL),(16,'settings',NULL,NULL),(17,'users',NULL,NULL),(18,'add_bank','settings',NULL),(19,'add_cheque','settings',NULL);



/*Table structure for table `permissions` */



DROP TABLE IF EXISTS `permissions`;



CREATE TABLE `permissions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `page_id` bigint DEFAULT NULL,
  `page` varchar(250) DEFAULT NULL,
  `can_view` enum('yes','no') DEFAULT 'no',
  `can_add` enum('yes','no') DEFAULT 'no',
  `can_edit` enum('yes','no') DEFAULT 'no',
  `can_delete` enum('yes','no') DEFAULT 'no',
  `role_id` varchar(30) DEFAULT NULL,
  `created_user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=latin1;



/*Data for the table `permissions` */



insert  into `permissions`(`id`,`page_id`,`page`,`can_view`,`can_add`,`can_edit`,`can_delete`,`role_id`,`created_user_id`) values (40,2,'dashboard','yes','yes','yes','yes','1',22),(41,3,'add_supplier','yes','yes','yes','yes','1',22),(42,4,'add_item','yes','yes','yes','yes','1',22),(43,5,'add_category','yes','yes','yes','yes','1',22),(44,6,'inventory','yes','yes','yes','yes','1',22),(45,7,'expenditure','yes','yes','yes','yes','1',22),(46,8,'expense_category','yes','yes','yes','yes','1',22),(47,9,'sale_receiveable','yes','yes','yes','yes','1',22),(48,10,'services','yes','yes','yes','yes','1',22),(49,11,'reports','yes','yes','yes','yes','1',22),(50,12,'add_purchase','yes','yes','yes','yes','1',22),(51,13,'add_customer','yes','yes','yes','yes','1',22),(52,14,'add_account','yes','yes','yes','yes','1',22),(53,15,'add_deposit','yes','yes','yes','yes','1',22),(54,16,'settings','yes','yes','yes','yes','1',22),(55,17,'users','yes','yes','yes','yes','1',22),(56,18,'add_bank','yes','yes','yes','yes','1',22),(57,19,'add_cheque','yes','yes','yes','yes','1',22),(58,1,'pos','no','no','no','no','5',22),(59,2,'dashboard','no','no','no','no','5',22),(60,3,'add_supplier','no','no','no','no','5',22),(61,4,'add_item','no','no','no','no','5',22),(62,5,'add_category','no','no','no','no','5',22),(63,6,'inventory','no','no','no','no','5',22),(64,7,'expenditure','no','no','no','no','5',22),(65,8,'expense_category','no','no','no','no','5',22),(66,9,'sale_receiveable','no','no','no','no','5',22),(67,10,'services','no','no','no','no','5',22),(68,11,'reports','no','no','no','no','5',22),(69,12,'add_purchase','no','no','no','no','5',22),(70,13,'add_customer','no','no','no','no','5',22),(71,14,'add_account','no','no','no','no','5',22),(72,15,'add_deposit','yes','no','no','no','5',22),(73,16,'settings','no','no','no','no','5',22),(74,17,'users','no','no','no','no','5',22),(75,18,'add_bank','yes','yes','yes','yes','5',22),(76,19,'add_cheque','no','no','no','no','5',22),(77,1,'pos','no','no','no','no','6',22),(78,2,'dashboard','no','no','no','no','6',22),(79,3,'add_supplier','no','no','no','no','6',22),(80,4,'add_item','no','no','no','no','6',22),(81,5,'add_category','no','no','no','no','6',22),(82,6,'inventory','no','no','no','no','6',22),(83,7,'expenditure','no','no','no','no','6',22),(84,8,'expense_category','no','no','no','no','6',22),(85,9,'sale_receiveable','no','no','no','no','6',22),(86,10,'services','no','no','no','no','6',22),(87,11,'reports','no','no','no','no','6',22),(88,12,'add_purchase','no','no','no','no','6',22),(89,13,'add_customer','no','no','no','no','6',22),(90,14,'add_account','no','no','no','no','6',22),(91,15,'add_deposit','no','no','no','no','6',22),(92,16,'settings','no','no','no','no','6',22),(93,17,'users','no','no','no','no','6',22),(94,18,'add_bank','no','no','no','no','6',22),(95,19,'add_cheque','no','no','no','no','6',22),(172,1,'pos','yes','no','no','no','2',22),(173,2,'dashboard','yes','no','no','no','2',22),(174,3,'add_supplier','yes','no','no','no','2',22),(175,4,'add_item','yes','no','no','no','2',22),(176,5,'add_category','yes','no','no','no','2',22),(177,6,'inventory','yes','no','no','no','2',22),(178,7,'expenditure','yes','no','no','no','2',22),(179,8,'expense_category','yes','no','no','no','2',22),(180,9,'sale_receiveable','yes','no','no','no','2',22),(181,10,'services','yes','no','no','no','2',22),(182,11,'reports','yes','no','no','no','2',22),(183,12,'add_purchase','yes','no','no','no','2',22),(184,13,'add_customer','yes','no','no','no','2',22),(185,14,'add_account','yes','yes','yes','yes','2',22),(186,15,'add_deposit','yes','yes','yes','yes','2',22),(187,16,'settings','no','yes','no','no','2',22),(188,17,'users','yes','no','no','no','2',22),(189,18,'add_bank','yes','no','no','no','2',22),(190,19,'add_cheque','yes','no','yes','yes','2',22),(191,1,'pos','yes','no','no','no','2',22),(192,2,'dashboard','yes','no','no','no','2',22),(193,3,'add_supplier','yes','no','no','no','2',22),(194,4,'add_item','yes','no','no','no','2',22),(195,5,'add_category','yes','no','no','no','2',22),(196,6,'inventory','yes','no','no','no','2',22),(197,7,'expenditure','yes','no','no','no','2',22),(198,8,'expense_category','yes','no','no','no','2',22),(199,9,'sale_receiveable','yes','no','no','no','2',22),(200,10,'services','yes','no','no','no','2',22),(201,11,'reports','yes','no','no','no','2',22),(202,12,'add_purchase','yes','no','no','no','2',22),(203,13,'add_customer','yes','no','no','no','2',22),(204,14,'add_account','yes','yes','yes','yes','2',22),(205,15,'add_deposit','yes','yes','yes','yes','2',22),(206,16,'settings','no','yes','no','no','2',22),(207,17,'users','yes','no','no','no','2',22),(208,18,'add_bank','yes','no','no','no','2',22),(209,19,'add_cheque','yes','no','yes','yes','2',22),(210,1,'pos','no','no','no','no','3',22),(211,2,'dashboard','yes','no','no','no','3',22),(212,3,'add_supplier','no','no','no','no','3',22),(213,4,'add_item','yes','no','no','no','3',22),(214,5,'add_category','no','no','no','no','3',22),(215,6,'inventory','no','no','no','no','3',22),(216,7,'expenditure','no','no','no','no','3',22),(217,8,'expense_category','no','no','no','no','3',22),(218,9,'sale_receiveable','no','no','no','no','3',22),(219,10,'services','no','no','no','no','3',22),(220,11,'reports','no','no','no','no','3',22),(221,12,'add_purchase','no','no','no','no','3',22),(222,13,'add_customer','no','no','no','no','3',22),(223,14,'add_account','no','no','no','no','3',22),(224,15,'add_deposit','no','no','no','no','3',22),(225,16,'settings','no','no','no','no','3',22),(226,17,'users','no','no','no','no','3',22),(227,18,'add_bank','no','no','no','no','3',22),(228,19,'add_cheque','no','no','no','no','3',22),(229,1,'pos','no','no','no','no','14',22),(230,2,'dashboard','no','no','no','no','14',22),(231,3,'add_supplier','yes','yes','no','no','14',22),(232,4,'add_item','no','no','no','no','14',22),(233,5,'add_category','no','no','no','no','14',22),(234,6,'inventory','no','no','no','no','14',22),(235,7,'expenditure','no','no','no','no','14',22),(236,8,'expense_category','no','no','no','no','14',22),(237,9,'sale_receiveable','no','no','no','no','14',22),(238,10,'services','no','no','no','no','14',22),(239,11,'reports','no','no','no','no','14',22),(240,12,'add_purchase','no','no','no','no','14',22),(241,13,'add_customer','no','no','no','no','14',22),(242,14,'add_account','no','no','no','no','14',22),(243,15,'add_deposit','no','no','no','no','14',22),(244,16,'settings','no','no','no','no','14',22),(245,17,'users','no','no','no','no','14',22),(246,18,'add_bank','no','no','no','no','14',22),(247,19,'add_cheque','no','no','no','no','14',22),(248,1,'pos','no','no','no','no','14',22),(249,2,'dashboard','no','no','no','no','14',22),(250,3,'add_supplier','yes','yes','no','no','14',22),(251,4,'add_item','no','no','no','no','14',22),(252,5,'add_category','no','no','no','no','14',22),(253,6,'inventory','no','no','no','no','14',22),(254,7,'expenditure','no','no','no','no','14',22),(255,8,'expense_category','no','no','no','no','14',22),(256,9,'sale_receiveable','no','no','no','no','14',22),(257,10,'services','no','no','no','no','14',22),(258,11,'reports','no','no','no','no','14',22),(259,12,'add_purchase','no','no','no','no','14',22),(260,13,'add_customer','no','no','no','no','14',22),(261,14,'add_account','no','no','no','no','14',22),(262,15,'add_deposit','no','no','no','no','14',22),(263,16,'settings','no','no','no','no','14',22),(264,17,'users','no','no','no','no','14',22),(265,18,'add_bank','no','no','no','no','14',22),(266,19,'add_cheque','no','no','no','no','14',22),(267,1,'pos','no','no','no','no','14',22),(268,2,'dashboard','no','no','no','no','14',22),(269,3,'add_supplier','yes','yes','no','no','14',22),(270,4,'add_item','no','no','no','no','14',22),(271,5,'add_category','no','no','no','no','14',22),(272,6,'inventory','no','no','no','no','14',22),(273,7,'expenditure','no','no','no','no','14',22),(274,8,'expense_category','no','no','no','no','14',22),(275,9,'sale_receiveable','no','no','no','no','14',22),(276,10,'services','no','no','no','no','14',22),(277,11,'reports','no','no','no','no','14',22),(278,12,'add_purchase','no','no','no','no','14',22),(279,13,'add_customer','no','no','no','no','14',22),(280,14,'add_account','no','no','no','no','14',22),(281,15,'add_deposit','no','no','no','no','14',22),(282,16,'settings','no','no','no','no','14',22),(283,17,'users','no','no','no','no','14',22),(284,18,'add_bank','no','no','no','no','14',22),(285,19,'add_cheque','no','no','no','no','14',22),(286,1,'pos','no','no','no','no','22',22),(287,2,'dashboard','no','no','no','no','22',22),(288,3,'add_supplier','no','no','no','no','22',22),(289,4,'add_item','no','no','no','no','22',22),(290,5,'add_category','no','no','no','no','22',22),(291,6,'inventory','no','no','no','no','22',22),(292,7,'expenditure','no','no','no','no','22',22),(293,8,'expense_category','no','no','no','no','22',22),(294,9,'sale_receiveable','no','no','no','no','22',22),(295,10,'services','no','no','no','no','22',22),(296,11,'reports','no','no','no','no','22',22),(297,12,'add_purchase','no','no','no','no','22',22),(298,13,'add_customer','no','no','no','no','22',22),(299,14,'add_account','no','no','no','no','22',22),(300,15,'add_deposit','no','no','no','no','22',22),(301,16,'settings','no','no','no','no','22',22),(302,17,'users','no','no','no','no','22',22),(303,18,'add_bank','no','no','no','no','22',22),(304,19,'add_cheque','no','no','no','no','22',22),(305,1,'pos','no','no','no','no','23',22),(306,2,'dashboard','no','no','no','no','23',22),(307,3,'add_supplier','no','no','no','no','23',22),(308,4,'add_item','no','no','no','no','23',22),(309,5,'add_category','no','no','no','no','23',22),(310,6,'inventory','no','no','no','no','23',22),(311,7,'expenditure','no','no','no','no','23',22),(312,8,'expense_category','no','no','no','no','23',22),(313,9,'sale_receiveable','no','no','no','no','23',22),(314,10,'services','no','no','no','no','23',22),(315,11,'reports','no','no','no','no','23',22),(316,12,'add_purchase','no','no','no','no','23',22),(317,13,'add_customer','no','no','no','no','23',22),(318,14,'add_account','no','no','no','no','23',22),(319,15,'add_deposit','no','no','no','no','23',22),(320,16,'settings','no','no','no','no','23',22),(321,17,'users','no','no','no','no','23',22),(322,18,'add_bank','no','no','no','no','23',22),(323,19,'add_cheque','no','no','no','no','23',22),(324,1,'pos','yes','no','no','no','24',22),(325,2,'dashboard','no','no','no','no','24',22),(326,3,'add_supplier','no','yes','no','no','24',22),(327,4,'add_item','no','no','no','no','24',22),(328,5,'add_category','no','no','no','no','24',22),(329,6,'inventory','no','no','no','no','24',22),(330,7,'expenditure','no','no','no','no','24',22),(331,8,'expense_category','no','no','no','no','24',22),(332,9,'sale_receiveable','no','no','no','no','24',22),(333,10,'services','no','no','no','no','24',22),(334,11,'reports','yes','no','no','no','24',22),(335,12,'add_purchase','no','no','no','no','24',22),(336,13,'add_customer','no','no','no','no','24',22),(337,14,'add_account','no','no','no','no','24',22),(338,15,'add_deposit','no','no','no','no','24',22),(339,16,'settings','no','no','no','no','24',22),(340,17,'users','no','no','no','no','24',22),(341,18,'add_bank','no','no','no','no','24',22),(342,19,'add_cheque','no','no','no','no','24',22),(343,1,'pos','no','no','no','no','25',22),(344,2,'dashboard','no','no','no','no','25',22),(345,3,'add_supplier','no','no','no','no','25',22),(346,4,'add_item','no','no','no','no','25',22),(347,5,'add_category','no','no','no','no','25',22),(348,6,'inventory','no','no','no','no','25',22),(349,7,'expenditure','no','no','no','no','25',22),(350,8,'expense_category','no','no','no','no','25',22),(351,9,'sale_receiveable','no','no','no','no','25',22),(352,10,'services','no','no','no','no','25',22),(353,11,'reports','no','no','no','no','25',22),(354,12,'add_purchase','no','no','no','no','25',22),(355,13,'add_customer','no','no','no','no','25',22),(356,14,'add_account','no','no','no','no','25',22),(357,15,'add_deposit','no','no','no','no','25',22),(358,16,'settings','no','no','no','no','25',22),(359,17,'users','no','no','no','no','25',22),(360,18,'add_bank','no','no','no','no','25',22),(361,19,'add_cheque','no','no','no','no','25',22);



/*Table structure for table `product_sale` */



DROP TABLE IF EXISTS `product_sale`;



CREATE TABLE `product_sale` (
  `item_sale_id` bigint NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) DEFAULT NULL,
  `product_sale_id` bigint DEFAULT NULL,
  `product_ids` varchar(100) DEFAULT NULL,
  `quantity_list` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;



/*Data for the table `product_sale` */



insert  into `product_sale`(`item_sale_id`,`item_name`,`product_sale_id`,`product_ids`,`quantity_list`) values (1,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,NULL,NULL),(2,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,NULL,NULL),(3,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',3,NULL,NULL),(4,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',4,NULL,NULL),(5,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',5,NULL,NULL),(6,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',6,NULL,NULL),(7,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',7,NULL,NULL),(8,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',8,NULL,NULL),(9,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',9,NULL,NULL),(10,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',10,NULL,NULL),(11,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',11,NULL,NULL),(12,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',12,NULL,NULL),(13,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',13,NULL,NULL),(14,'Samsung Power Bank',14,NULL,NULL),(15,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones<br>iphone Protectors Special TSC',15,NULL,NULL),(16,'High Quality Sterio<br>Gionee Handsfree<br>faster-handsfree super voice<br>Basues Dual size handsfree<br>iphone Protectors Special TSC<br>Newest Smart Glass Window Cleaner Robot Floor and Windows Clea',16,NULL,NULL),(17,'Samsung Power Bank<br>2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',17,NULL,NULL),(18,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing<br>faster-handsfree super voice<br>Gionee Handsfree<br>Basues Dual size handsfree<br>iphone Protectors Special TSC',18,NULL,NULL),(19,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',19,NULL,NULL),(20,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',20,NULL,NULL),(21,'Samsung Power Bank',21,NULL,NULL),(22,'10-Watt power bank',22,NULL,NULL),(23,'faster-handsfree super voice',23,NULL,NULL),(24,'faster-handsfree super voice',24,NULL,NULL),(25,'faster-handsfree super voice',25,NULL,NULL),(26,'Samsung Power Bank',26,NULL,NULL),(27,'faster-handsfree super voice',27,NULL,NULL),(28,'2200mah mini aluminiume power bank',28,NULL,NULL),(29,'faster-handsfree super voice',29,NULL,NULL),(30,'iphone Protectors Special TSC',30,NULL,NULL),(31,'faster-handsfree super voice',31,NULL,NULL),(32,'2200mah mini aluminiume power bank',32,NULL,NULL),(33,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',33,NULL,NULL),(34,'iphone Protectors Special TSC',34,NULL,NULL),(35,'10-Watt power bank',35,NULL,NULL),(36,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',36,NULL,NULL),(37,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',37,NULL,NULL),(38,'10-Watt power bank',38,NULL,NULL),(39,'10-Watt power bank',39,NULL,NULL),(40,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',40,NULL,NULL),(41,'10-Watt power bank',41,NULL,NULL),(42,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',42,NULL,NULL),(43,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',43,NULL,NULL),(44,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',44,NULL,NULL);



/*Table structure for table `product_sale_invoice` */



DROP TABLE IF EXISTS `product_sale_invoice`;



CREATE TABLE `product_sale_invoice` (
  `id_inv` bigint NOT NULL AUTO_INCREMENT,
  `pay_method` varchar(300) DEFAULT NULL,
  `paid` varchar(300) DEFAULT NULL,
  `dues` varchar(300) DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` varchar(300) DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `customer_name` varchar(120) DEFAULT NULL,
  `total` varchar(300) DEFAULT NULL,
  `discount` varchar(300) DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `sale_date` varchar(50) DEFAULT NULL,
  `sale_time` varchar(22) DEFAULT NULL,
  `profit` varchar(100) DEFAULT NULL,
  `item_sale_id` bigint DEFAULT NULL,
  `sale_agent` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_inv`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;



/*Data for the table `product_sale_invoice` */



insert  into `product_sale_invoice`(`id_inv`,`pay_method`,`paid`,`dues`,`product_id`,`quantity`,`customer_id`,`customer_name`,`total`,`discount`,`user_id`,`sale_date`,`sale_time`,`profit`,`item_sale_id`,`sale_agent`,`updated_date`) values (1,'cash','9600',NULL,NULL,'-2',1,'walk in customers','9600','',NULL,'2021-08-29 ','10:38 AM',NULL,NULL,'Admin',NULL),(2,'cash','20000','0',NULL,'98',2,'Jimi max','20000','',NULL,'2021-08-29 ','18:52 PM',NULL,NULL,'Admin',NULL),(3,'cash','700',NULL,NULL,'2',1,'walk in customers','700','100',NULL,'2021-09-02 ','21:32 PM',NULL,NULL,'Admin',NULL),(4,'cash','9600',NULL,NULL,'-1',1,'walk in customers','9600','',NULL,'2021-09-03 ','20:35 PM',NULL,NULL,NULL,NULL),(5,'cash','9600','0',NULL,'-1',2,'Jimi max','9600','',NULL,'2021-09-03 ','21:03 PM',NULL,NULL,'Admin',NULL),(6,'credit','9600','9495',NULL,'-1',2,'Jimi max','9600','',NULL,'2021-09-03 ','21:05 PM',NULL,NULL,'Admin',NULL),(7,'credit','28800','38400',NULL,'2',2,'Jimi max','28800',NULL,NULL,'2021-09-03 ','21:14 PM',NULL,NULL,'Admin',NULL),(8,'cash','1382300',NULL,NULL,'142',1,'walk in customers','1382300','100',NULL,'2021-09-07 ','12:22 PM',NULL,NULL,'Admin',NULL),(9,'cash','15020000',NULL,NULL,'1563',1,'walk in customers','15020000','4000',NULL,'2021-09-07 ','12:22 PM',NULL,NULL,'Admin',NULL),(10,'cash','3000',NULL,NULL,'13',1,'walk in customers','3000','',NULL,'2021-09-07 ','12:23 PM',NULL,NULL,'Admin',NULL),(11,'cash','38400',NULL,NULL,'2',1,'walk in customers','38400','',NULL,'2021-09-07 ','12:24 PM',NULL,NULL,'Admin',NULL),(12,'cash','1400',NULL,NULL,'5',1,'walk in customers','1400','',NULL,'2021-09-10 ','20:20 PM',NULL,NULL,'Admin',NULL),(13,'cash','9600',NULL,NULL,'-1',1,'walk in customers','9600','',NULL,'2021-09-30 ','20:43 PM',NULL,NULL,'Admin',NULL),(14,'credit','17500','17500',NULL,'9',6,'William Shakar','17500','500',NULL,'2021-10-02 ','18:27 PM',NULL,NULL,'Admin',NULL),(15,'cash','1000',NULL,NULL,'8',1,'walk in customers','1000','',NULL,'2021-12-06 ','18:01 PM',NULL,NULL,'admin',NULL),(16,'cash','18908',NULL,NULL,'15',1,'walk in customers','18908','10',NULL,'2021-12-06 ','18:03 PM',NULL,NULL,'admin',NULL),(17,'cash','2000',NULL,NULL,'8',1,'walk in customers','2000','',NULL,'2022-01-25 ','10:54 AM',NULL,NULL,'admin',NULL),(18,'credit','15630','15630',NULL,'11',4,'Robert Will','15630','50',NULL,'2022-01-25 ','10:58 AM',NULL,NULL,'admin',NULL),(19,'credit','9600','9600',NULL,'7',5,'Michael Jhon','9600','',NULL,'2022-01-25 ','10:58 AM',NULL,NULL,'admin',NULL),(20,'cash','9600',NULL,NULL,'8',1,'walk in customers','9600','',NULL,'2022-01-26 ','13:44 PM',NULL,NULL,'admin',NULL),(21,'cash','1800',NULL,NULL,'8',1,'walk in customers','1800','',NULL,'2022-01-26 ','13:44 PM',NULL,NULL,'admin',NULL),(22,'cash','958',NULL,NULL,'8',1,'walk in customers','958','',NULL,'2022-01-26 ','13:45 PM',NULL,NULL,'admin',NULL),(23,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','13:55 PM',NULL,NULL,'admin',NULL),(24,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','13:56 PM',NULL,NULL,'admin',NULL),(25,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','13:59 PM',NULL,NULL,'admin',NULL),(26,'cash','1800',NULL,NULL,'8',1,'walk in customers','1800','',NULL,'2022-01-26 ','14:00 PM',NULL,NULL,'admin',NULL),(27,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','14:01 PM',NULL,NULL,'admin',NULL),(28,'cash','1200',NULL,NULL,'8',1,'walk in customers','1200','',NULL,'2022-01-26 ','14:02 PM',NULL,NULL,'admin',NULL),(29,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','14:03 PM',NULL,NULL,'admin',NULL),(30,'cash','800',NULL,NULL,'8',1,'walk in customers','800','',NULL,'2022-01-26 ','14:03 PM',NULL,NULL,'admin',NULL),(31,'cash','5000',NULL,NULL,'8',1,'walk in customers','5000','',NULL,'2022-01-26 ','14:04 PM',NULL,NULL,'admin',NULL),(32,'cash','13194',NULL,NULL,'18',1,'walk in customers','13194','6',NULL,'2022-01-26 ','14:05 PM',NULL,NULL,'admin',NULL),(33,'cash','9600',NULL,NULL,'8',1,'walk in customers','9600','',NULL,'2022-01-26 ','14:06 PM',NULL,NULL,'admin',NULL),(34,'cash','800',NULL,NULL,'8',1,'walk in customers','800','',NULL,'2022-01-26 ','14:07 PM',NULL,NULL,'admin',NULL),(35,'cash','14370',NULL,NULL,'22',1,'walk in customers','14370','',NULL,'2022-01-26 ','14:08 PM',NULL,NULL,'admin',NULL),(36,'cash','9600',NULL,NULL,'8',1,'walk in customers','9600','',NULL,'2022-01-26 ','14:09 PM',NULL,NULL,'admin',NULL),(37,'cash','9600',NULL,NULL,'8',1,'walk in customers','9600','',NULL,'2022-01-26 ','17:20 PM',NULL,NULL,'admin',NULL),(38,'cash','17244',NULL,NULL,'25',1,'walk in customers','17244','',NULL,'2022-01-26 ','17:21 PM',NULL,NULL,'admin',NULL),(39,'cash','14370',NULL,NULL,'22',1,'walk in customers','14370','',NULL,'2022-01-26 ','17:21 PM',NULL,NULL,'admin',NULL),(40,'cash','9600',NULL,NULL,'8',1,'walk in customers','9600','',NULL,'2022-01-31 ','12:14 PM',NULL,NULL,'admin',NULL),(41,'cash','14370',NULL,NULL,'24',1,'walk in customers','14370','',NULL,'2022-02-10 ','17:59 PM',NULL,NULL,'admin',NULL),(42,'cash','9595',NULL,NULL,'-1',1,'walk in customers','9595','5',NULL,'2022-05-16 ','00:43 AM',NULL,NULL,'admin',NULL),(43,'cash','',NULL,NULL,'11',1,'walk in customers','','',NULL,'2022-05-16 ','00:50 AM',NULL,NULL,'admin',NULL),(44,'cash','',NULL,NULL,'11',1,'walk in customers','','',NULL,'2022-05-16 ','00:50 AM',NULL,NULL,'admin',NULL);



/*Table structure for table `product_sale_list` */



DROP TABLE IF EXISTS `product_sale_list`;



CREATE TABLE `product_sale_list` (
  `pro_sale_id` bigint NOT NULL AUTO_INCREMENT,
  `product_name` varchar(300) DEFAULT NULL,
  `product_ids` bigint DEFAULT NULL,
  `psi_id` bigint DEFAULT NULL,
  `quantity` bigint DEFAULT NULL,
  `sale_entry_date` varchar(25) DEFAULT NULL,
  `total_stock` varchar(25) DEFAULT NULL,
  `updated_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pro_sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;



/*Data for the table `product_sale_list` */



insert  into `product_sale_list`(`pro_sale_id`,`product_name`,`product_ids`,`psi_id`,`quantity`,`sale_entry_date`,`total_stock`,`updated_date`) values (1,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,1,1,'2021-08-29','',NULL),(2,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,2,100,'2021-08-29','',NULL),(3,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,3,4,'2021-09-02','',NULL),(4,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,4,1,'2021-09-03','',NULL),(5,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,5,1,'2021-09-03','',NULL),(6,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,6,1,'2021-09-03','',NULL),(7,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,7,3,'2021-09-03','',NULL),(8,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,8,144,'2021-09-07','',NULL),(9,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,9,1565,'2021-09-07','',NULL),(10,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,10,15,'2021-09-07','',NULL),(11,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,11,4,'2021-09-07','',NULL),(12,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,12,7,'2021-09-10','',NULL),(13,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,13,1,'2021-09-30','',NULL),(14,'Samsung Power Bank',3,14,10,'2021-10-02','',NULL),(15,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,15,1,'2021-12-06','',NULL),(16,'iphone Protectors Special TSC',10,15,1,'2021-12-06','',NULL),(17,'High Quality Sterio',8,16,1,'2021-12-06','',NULL),(18,'Gionee Handsfree',7,16,1,'2021-12-06','',NULL),(19,'faster-handsfree super voice',6,16,1,'2021-12-06','',NULL),(20,'Basues Dual size handsfree',9,16,1,'2021-12-06','',NULL),(21,'iphone Protectors Special TSC',10,16,1,'2021-12-06','',NULL),(22,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,16,1,'2021-12-06','',NULL),(23,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,16,1,'2021-12-06','',NULL),(24,'Samsung Power Bank',3,16,1,'2021-12-06','',NULL),(25,'10-Watt power bank',4,16,1,'2021-12-06','',NULL),(26,'Samsung Power Bank',3,17,1,'2022-01-25','',NULL),(27,'2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones',2,17,1,'2022-01-25','',NULL),(28,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,18,1,'2022-01-25','',NULL),(29,'faster-handsfree super voice',6,18,1,'2022-01-25','',NULL),(30,'Gionee Handsfree',7,18,1,'2022-01-25','',NULL),(31,'Basues Dual size handsfree',9,18,1,'2022-01-25','',NULL),(32,'iphone Protectors Special TSC',10,18,1,'2022-01-25','',NULL),(33,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,19,1,'2022-01-25','',NULL),(34,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,20,1,'2022-01-26','',NULL),(35,'Samsung Power Bank',3,21,1,'2022-01-26','',NULL),(36,'10-Watt power bank',4,22,1,'2022-01-26','',NULL),(37,'faster-handsfree super voice',6,23,1,'2022-01-26','',NULL),(38,'faster-handsfree super voice',6,24,1,'2022-01-26','',NULL),(39,'faster-handsfree super voice',6,25,1,'2022-01-26','',NULL),(40,'Samsung Power Bank',3,26,1,'2022-01-26','',NULL),(41,'faster-handsfree super voice',6,27,1,'2022-01-26','',NULL),(42,'2200mah mini aluminiume power bank',5,28,1,'2022-01-26','',NULL),(43,'faster-handsfree super voice',6,29,1,'2022-01-26','',NULL),(44,'iphone Protectors Special TSC',10,30,1,'2022-01-26','',NULL),(45,'faster-handsfree super voice',6,31,1,'2022-01-26','',NULL),(46,'2200mah mini aluminiume power bank',5,32,11,'2022-01-26','',NULL),(47,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,33,1,'2022-01-26','',NULL),(48,'iphone Protectors Special TSC',10,34,1,'2022-01-26','',NULL),(49,'10-Watt power bank',4,35,15,'2022-01-26','',NULL),(50,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,36,1,'2022-01-26','',NULL),(51,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,37,1,'2022-01-26','',NULL),(52,'10-Watt power bank',4,38,18,'2022-01-26','',NULL),(53,'10-Watt power bank',4,39,15,'2022-01-26','',NULL),(54,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,40,1,'2022-01-31','',NULL),(55,'10-Watt power bank',4,41,15,'2022-02-10','',NULL),(56,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,42,1,'2022-05-15','',NULL),(57,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,43,1,'2022-05-15','',NULL),(58,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing',1,44,1,'2022-05-15','',NULL);



/*Table structure for table `products` */



DROP TABLE IF EXISTS `products`;



CREATE TABLE `products` (
  `pro_id` bigint NOT NULL AUTO_INCREMENT,
  `barcode` varchar(30) DEFAULT NULL,
  `promo_code` varchar(30) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `comments` text,
  `category_id` bigint DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  `brand` varchar(360) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `sale_price` varchar(300) DEFAULT NULL,
  `cost` varchar(36) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `stock_level` varchar(100) DEFAULT NULL,
  `stock_consume` varchar(100) DEFAULT NULL,
  `replenishment` varchar(100) DEFAULT NULL,
  `opening_balance` bigint DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `stock_limits` varchar(100) DEFAULT NULL,
  `gross_weight` varchar(300) DEFAULT NULL,
  `net_weight` varchar(300) DEFAULT NULL,
  `supplier_id` bigint DEFAULT NULL,
  `supplier` varchar(300) DEFAULT NULL,
  `entry_date` varchar(22) DEFAULT NULL,
  `expire_date` varchar(50) DEFAULT NULL,
  `status` varchar(7) DEFAULT NULL,
  `alert_status` varchar(6) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;



/*Data for the table `products` */



insert  into `products`(`pro_id`,`barcode`,`promo_code`,`product_name`,`comments`,`category_id`,`category`,`brand_id`,`brand`,`location`,`sale_price`,`cost`,`unit_price`,`stock_level`,`stock_consume`,`replenishment`,`opening_balance`,`unit`,`stock_limits`,`gross_weight`,`net_weight`,`supplier_id`,`supplier`,`entry_date`,`expire_date`,`status`,`alert_status`,`photo`) values (1,'s125cleaner','','Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing','car and home cleaner item have been addeds',1,'China',1,'','Karachi','9600','',NULL,'21',NULL,NULL,NULL,'pieces','45','','',1,'','2021-08-29 ','1970-01-01','yes',NULL,'Newest-Smart-Glass-Window-Cleaner-Robot-Floor-and-Windows-Cleaning-Tool-for-Washing-800.PNG'),(2,'S1025','','2020 Newest Phone Accessories Holder Car Stand Cell Phone Holder for All Phones','car accessories car mobile holder',1,'Amber',1,'','hyderabad','200','',NULL,'0',NULL,NULL,NULL,'pieces','15','','',0,'','2021-08-29 ','1970-01-01','yes',NULL,'2020-Newest-Phone-Accessories-Holder-Car-Stand-Cell-Phone-Holder-for-All-Phones-568.PNG'),(3,'s4444','','Samsung Power Bank','',3,'',1,'','karachi','1800','',NULL,'506',NULL,NULL,NULL,'pieces','65','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'Samsung-Power-Bank-496.png'),(4,'125Cl','','10-Watt power bank','10 watt wireless charger, Intelligent Charge technology, Dual Charge and ADS, 2 USB 2.1A outputs, 1 Type-C input/output\r\n',2,'',0,'','karachi','958','',NULL,'85',NULL,NULL,NULL,'Select Unit','5','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,NULL),(5,'mirco','','2200mah mini aluminiume power bank','',2,'',1,'','','1200','',NULL,'273',NULL,NULL,NULL,'pieces','5','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'2200mah-mini-aluminiume-power-bank-671.jpg'),(6,'sauto_G469d4ee','','faster-handsfree super voice','Deep Bass, Comfortable wearing, High-Quality Brand Product, Latest Model, A perfect gift for yourself or friend, 3.5mm Stereo Pin, Faster has designed ...\r\n',4,'',2,'','lahores','5000','',NULL,'492',NULL,NULL,NULL,'pieces','15','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'faster-handsfree-super-voice-992.jpg'),(7,'sauto_G335080de','','Gionee Handsfree','Woofers Sound Hands-free and Light Weight, 100% Brand new and high quality., Excellent Sound Quality, For All Smart Phones, Durable, High Bass ...\r\n',4,'',2,'','','100','',NULL,'13',NULL,NULL,NULL,'Select Unit','5','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'Gionee-Handsfree-207.jpg'),(8,'sauto_G1502d102','','High Quality Sterio','Stereo Handsfree, Durable & High Quality, Clear Sound with Mic\r\n',4,'',2,'','','280','',NULL,'9',NULL,NULL,NULL,'pieces','7','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,NULL),(9,'sauto_G86c530d','','Basues Dual size handsfree','Truly Wireless For Ears Accessing Which Bring New Experience. Triangular Ear Caps, Zero Stress That Made From Silicone, Is Soft To Skin Touch.Each ...\r\n',2,'',2,'','','180','',NULL,'153',NULL,NULL,NULL,'Select Unit','7','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'Basues-Dual-size-handsfree-498.jpg'),(10,'sauto_G324cf4be','','iphone Protectors Special TSC','',2,'',0,'','','800','',NULL,'20',NULL,NULL,NULL,'pieces','10','','',0,'','2021-10-02 ','1970-01-01','yes',NULL,'iphone-Protectors-Special-TSC-557.jpg'),(11,'ss6646','','super amazon waring device','',5,'',3,'','newyork','100','',NULL,'158',NULL,NULL,NULL,'pieces','15','','',3,'','2022-01-26 ','1970-01-01','yes',NULL,NULL),(12,'4545545ds','','20Quart Plantery mixer','',0,'',0,'','','','',NULL,'',NULL,NULL,NULL,'','','','',0,'','2022-02-09 ','1970-01-01','yes',NULL,NULL),(13,'xeeeeeeef458azoy','','20Quart Plantery mixer','',5,'',0,'','newyork','180','',NULL,'25',NULL,NULL,NULL,'pieces','5','','',0,'','2022-02-09 ','1970-01-01','yes',NULL,NULL),(14,'S56366','','Cheez','',5,'',1,'','Karachi','520','',NULL,'70',NULL,NULL,NULL,'pieces','50','','',0,'','2022-05-15 ','1970-01-01','yes',NULL,'Cheez-171.jpg');



/*Table structure for table `purchase_final_inv` */



DROP TABLE IF EXISTS `purchase_final_inv`;



CREATE TABLE `purchase_final_inv` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pro_id` bigint DEFAULT NULL,
  `pro_name` varchar(300) DEFAULT NULL,
  `pro_price` varchar(60) DEFAULT NULL,
  `purchase_id` bigint DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



/*Data for the table `purchase_final_inv` */



insert  into `purchase_final_inv`(`id`,`pro_id`,`pro_name`,`pro_price`,`purchase_id`,`quantity`) values (1,1,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing','9600',1,'5000'),(2,1,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing','9600',2,'140'),(3,1,'Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing','9600',3,'1');



/*Table structure for table `purchase_invoice` */



DROP TABLE IF EXISTS `purchase_invoice`;



CREATE TABLE `purchase_invoice` (
  `purchase_id` bigint NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(500) DEFAULT NULL,
  `supplier_id` bigint DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `add_payment` varchar(300) DEFAULT NULL,
  `pay_type` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(200) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `entry_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



/*Data for the table `purchase_invoice` */



insert  into `purchase_invoice`(`purchase_id`,`invoice_no`,`supplier_id`,`item_id`,`add_payment`,`pay_type`,`amount_paid`,`created_date`,`quantity`,`entry_date`) values (1,'1',1,0,'48000000','cash','48000000','08/29/2021 06:41:39',NULL,'2021-08-29'),(2,'2',2,0,'1344000','cash','1344000','09/30/2021 08:38:18',NULL,'2021-09-30'),(3,'5',2,0,'9600','cash','60000','12/27/2021 07:40:59',NULL,'2021-12-27');



/*Table structure for table `role_rights` */



DROP TABLE IF EXISTS `role_rights`;



CREATE TABLE `role_rights` (
  `rr_rolecode` varchar(50) NOT NULL,
  `rr_modulecode` varchar(25) DEFAULT NULL,
  `can_add` enum('on','off') DEFAULT 'off',
  `can_edit` enum('on','off') DEFAULT 'off',
  `can_delete` enum('on','off') DEFAULT 'off',
  `can_view` enum('on','off') DEFAULT 'off',
  PRIMARY KEY (`rr_rolecode`),
  KEY `rr_modulecode` (`rr_modulecode`),
  CONSTRAINT `role_rights_ibfk_1` FOREIGN KEY (`rr_rolecode`) REFERENCES `role` (`role_rolecode`) ON UPDATE CASCADE,
  CONSTRAINT `role_rights_ibfk_2` FOREIGN KEY (`rr_modulecode`) REFERENCES `module` (`mod_modulecode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



/*Data for the table `role_rights` */



/*Table structure for table `sale_return` */



DROP TABLE IF EXISTS `sale_return`;



CREATE TABLE `sale_return` (
  `r_id` bigint NOT NULL AUTO_INCREMENT,
  `return_date` varchar(20) DEFAULT NULL,
  `return_product` varchar(300) DEFAULT NULL,
  `refund_amount` varchar(50) DEFAULT NULL,
  `return_notes` text,
  `psi_id` bigint DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `sale_return` */



insert  into `sale_return`(`r_id`,`return_date`,`return_product`,`refund_amount`,`return_notes`,`psi_id`) values (1,'2021-09-03','Newest Smart Glass Window Cleaner Robot Floor and Windows Cleaning Tool for Washing','9600','',7);



/*Table structure for table `sales_invoice` */



DROP TABLE IF EXISTS `sales_invoice`;



CREATE TABLE `sales_invoice` (
  `invoice_id` bigint NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(200) DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `remaining_stock` varchar(300) DEFAULT NULL,
  `stock_quantity` varchar(300) DEFAULT NULL,
  `discount_item_price` varchar(300) DEFAULT NULL,
  `selling_price` varchar(300) DEFAULT NULL,
  `total_price` varchar(300) DEFAULT NULL,
  `delivery_charges` varchar(300) DEFAULT NULL,
  `net_price` varchar(300) DEFAULT NULL,
  `total_paid` varchar(300) DEFAULT NULL,
  `total_due` varchar(300) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `dated_created` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `sales_invoice` */



/*Table structure for table `service_sale_invoice` */



DROP TABLE IF EXISTS `service_sale_invoice`;



CREATE TABLE `service_sale_invoice` (
  `ser_id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(36) DEFAULT NULL,
  `sale_agent` varchar(100) DEFAULT NULL,
  `sale_date` varchar(40) DEFAULT NULL,
  `sale_time` varchar(50) DEFAULT NULL,
  `pay_method` varchar(50) DEFAULT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `service_sale_invoice` */



/*Table structure for table `service_sale_list` */



DROP TABLE IF EXISTS `service_sale_list`;



CREATE TABLE `service_sale_list` (
  `ss_id` bigint NOT NULL AUTO_INCREMENT,
  `service_name` varchar(300) DEFAULT NULL,
  `service_ids` bigint DEFAULT NULL,
  `service_sale_id` bigint DEFAULT NULL,
  `discount_service` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `service_sale_list` */



/*Table structure for table `service_type` */



DROP TABLE IF EXISTS `service_type`;



CREATE TABLE `service_type` (
  `st_id` bigint NOT NULL AUTO_INCREMENT,
  `service_type` varchar(300) DEFAULT NULL,
  `st_status` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `service_type` */



/*Table structure for table `services` */



DROP TABLE IF EXISTS `services`;



CREATE TABLE `services` (
  `service_id` bigint NOT NULL AUTO_INCREMENT,
  `service` varchar(300) DEFAULT NULL,
  `service_type` varchar(200) DEFAULT NULL,
  `service_detail` text,
  `vehicle_type` varchar(300) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `discount_allowed` varchar(100) DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `pro_id` bigint DEFAULT NULL,
  `sp_rand` varchar(300) DEFAULT NULL,
  `discount_service` varchar(200) DEFAULT NULL,
  `entry_date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `services` */



/*Table structure for table `sessions` */



DROP TABLE IF EXISTS `sessions`;



CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;



/*Data for the table `sessions` */



/*Table structure for table `site_setting` */



DROP TABLE IF EXISTS `site_setting`;



CREATE TABLE `site_setting` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `site_name` varchar(200) DEFAULT NULL,
  `site_logo` varchar(300) DEFAULT NULL,
  `site_detail` text,
  `address` varchar(400) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `footer_text` text,
  `currency` varchar(10) DEFAULT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `site_setting` */



insert  into `site_setting`(`id`,`site_name`,`site_logo`,`site_detail`,`address`,`telephone`,`fax`,`footer_text`,`currency`,`currency_symbol`) values (1,'Autotalk-POS','-369.png',NULL,'Super Imtiaz Mart Qayoom Abad','022222222','02555555','SuperAutoTalk-POS @ 2022','USD','86');



/*Table structure for table `stock_consumption` */



DROP TABLE IF EXISTS `stock_consumption`;



CREATE TABLE `stock_consumption` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `s_date` varchar(25) DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `stock_consumption` */



/*Table structure for table `suppliers` */



DROP TABLE IF EXISTS `suppliers`;



CREATE TABLE `suppliers` (
  `supplier_id` bigint NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_phone` varchar(90) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_fax` varchar(90) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` longtext CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int NOT NULL,
  `created_datetime` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `updated_user_id` int NOT NULL,
  `updated_datetime` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_tax` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_status` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `suppliers` */



insert  into `suppliers`(`supplier_id`,`supplier_name`,`supplier_email`,`supplier_phone`,`supplier_fax`,`supplier_address`,`created_user_id`,`created_datetime`,`updated_user_id`,`updated_datetime`,`supplier_tax`,`supplier_status`,`comments`) values (2,'dunizo heall','duniheal@gmail.com','03123189854','580000000000000','91  Northgate Street',0,'09/27/2021 01:25:27',0,'09/27/2021 01:25:36','','',NULL),(3,'Moz','Mozi@gmail.com','98555558555585','','moz address ',0,'09/30/2021 08:42:33',0,'','','',NULL),(4,'Hogei','hohei@gmail.com','554545454545','','hoei address',0,'09/30/2021 08:43:07',0,'','','',NULL),(5,'Vikis','vis@gmail.com','5888888888888896','','vikisAddress',0,'09/30/2021 08:43:25',0,'','','',NULL);



/*Table structure for table `tax_info` */



DROP TABLE IF EXISTS `tax_info`;



CREATE TABLE `tax_info` (
  `tax_id` bigint NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(100) DEFAULT NULL,
  `tax_percentage` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



/*Data for the table `tax_info` */



insert  into `tax_info`(`tax_id`,`tax_name`,`tax_percentage`,`symbol`) values (1,'GST','10','%'),(2,'VAT','15','%'),(3,'TAT','25','%'),(4,'MAT','50','%');



/*Table structure for table `udb_campaigns` */



DROP TABLE IF EXISTS `udb_campaigns`;



CREATE TABLE `udb_campaigns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `form_intro` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `form_terms` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `top_intro` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `recent_intro` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `min_amount` float NOT NULL,
  `currency` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `registered` int NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `udb_campaigns` */



/*Table structure for table `udb_donors` */



DROP TABLE IF EXISTS `udb_donors`;



CREATE TABLE `udb_donors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `campaign_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `registered` int NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `udb_donors` */



/*Table structure for table `udb_options` */



DROP TABLE IF EXISTS `udb_options`;



CREATE TABLE `udb_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `options_key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `options_value` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `udb_options` */



/*Table structure for table `udb_sessions` */



DROP TABLE IF EXISTS `udb_sessions`;



CREATE TABLE `udb_sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(31) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `registered` int NOT NULL,
  `valid_period` int NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `udb_sessions` */



/*Table structure for table `udb_transactions` */



DROP TABLE IF EXISTS `udb_transactions`;



CREATE TABLE `udb_transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `donor_id` int NOT NULL,
  `payer_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `gross` float NOT NULL,
  `currency` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(63) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(63) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `details` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `created` int NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `udb_transactions` */



/*Table structure for table `unit` */



DROP TABLE IF EXISTS `unit`;



CREATE TABLE `unit` (
  `unit_id` bigint NOT NULL AUTO_INCREMENT,
  `unit` varchar(300) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



/*Data for the table `unit` */



insert  into `unit`(`unit_id`,`unit`,`status`) values (1,'Pieces',NULL);



/*Table structure for table `user_roles` */



DROP TABLE IF EXISTS `user_roles`;



CREATE TABLE `user_roles` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int NOT NULL,
  `role_id` bigint DEFAULT NULL,
  `created_datetime` varchar(65) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `updated_user_id` int NOT NULL,
  `updated_datetime` varchar(65) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `user_roles` */



/*Table structure for table `users` */



DROP TABLE IF EXISTS `users`;



CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fullname` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(499) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `role_id` bigint NOT NULL,
  `created_user_id` bigint NOT NULL,
  `created_datetime` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `updated_user_id` bigint NOT NULL,
  `updated_datetime` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;



/*Data for the table `users` */



insert  into `users`(`id`,`fullname`,`email`,`user_password`,`role_id`,`created_user_id`,`created_datetime`,`updated_user_id`,`updated_datetime`,`status`,`verification_code`) values (1,'admin','owner@gmail.com','testingmood123',1,1,'12/12/2021',1,'12/12/2021','yes','12555');



/*Table structure for table `vehicle_type` */



DROP TABLE IF EXISTS `vehicle_type`;



CREATE TABLE `vehicle_type` (
  `vt_id` bigint NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(300) DEFAULT NULL,
  `vt_status` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`vt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*Data for the table `vehicle_type` */



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

