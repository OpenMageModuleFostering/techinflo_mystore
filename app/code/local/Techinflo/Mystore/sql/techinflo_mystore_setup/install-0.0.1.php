<?php 
/**
 * Techinflo_Mystore extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the OSL License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-license.php
 * 
 * @category   	Techinflo
 * @package		Techinflo_CategoryGroup
 * @copyright  	Copyright (c) 2014
 * @license		http://opensource.org/licenses/osl-license.php OSL 3.0
 */
/**
 * Mystore module install script
 *
 * @category	Techinflo
 * @package		Techinflo_Mystore
 * @author Techinflo Team
 */
?>
 <?php
$installer = $this;
/* @var $installer Mage_Customer_Model_Entity_Setup */

$installer->startSetup();

$installer->run("

/*Table structure for table `customer_mystore_prefference` */

DROP TABLE IF EXISTS `customer_mystore_prefference`;

CREATE TABLE `customer_mystore_prefference` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `customer_email` varchar(255) DEFAULT NULL,
  `brand` varchar(25) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `price` varchar(25) DEFAULT NULL,
  `brands` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `prices` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

/*Table structure for table `guest_mystore_prefference` */

DROP TABLE IF EXISTS `guest_mystore_prefference`;

CREATE TABLE `guest_mystore_prefference` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `cookie_name` varchar(255) DEFAULT NULL,
  `brand` varchar(25) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `price` varchar(25) DEFAULT NULL,
  `brands` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `prices` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

");

$installer->endSetup();