<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();

//ips
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ipmanager_ips` (
    `id_ip` int(11) NOT NULL AUTO_INCREMENT, 
    `ip` varchar(64) NOT NULL, 
    `id_country` int(11),
    `descr` varchar(255),
    `redir` varchar(255),	
    PRIMARY KEY  (`id_ip`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

//redirect country
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ipmanager_country` (
    `id_blocked_country` int(11) NOT NULL AUTO_INCREMENT, 
    `id_country` int(11),
    `country_name` varchar(255),
    `redir` varchar(255),	
    PRIMARY KEY  (`id_blocked_country`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

//user-agent
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ipmanager_useragent` (
    `id` int(11) NOT NULL AUTO_INCREMENT, 
    `user_agent` varchar(255),
    PRIMARY KEY  (`id`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

//DDoS
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ipmanager_ddos` (
    `id_request` int(11) NOT NULL AUTO_INCREMENT, 
    `ip` varchar(255) NOT NULL ,
    `date` DATETIME NOT NULL ,
    PRIMARY KEY  (`id_request`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

//DDoS remember blocked IPs
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'blocked_ip_ddos` (
    `id_ip_ddos` int(11) NOT NULL AUTO_INCREMENT, 
    `blocked_ip` varchar(255) NOT NULL ,
    `date_start` DATETIME NOT NULL ,
    `date_end` DATETIME NOT NULL ,
    PRIMARY KEY  (`id_ip_ddos`)
) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
