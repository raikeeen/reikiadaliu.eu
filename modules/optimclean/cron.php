<?php
/**
 * 2015 Adilis
 *
 * The Optimization and Cleaning module is an extremely versatile toolkit for your online store.
 * Optimize your online store by deleting old or unused data,
 * check your configuration and check the speed of your Prestashop
 * and relax knowing that you’re protected by the integrated data recovery system.
 *
 *  @author    Adilis <support@adilis.fr>
 *  @copyright 2015 SAS Adilis
 *  @license   http://www.adilis.fr
 */

require_once('../../config/config.inc.php');
require_once(_PS_ROOT_DIR_.'/init.php');

if (!Tools::getIsset('secure_key') ||
    Tools::getValue('secure_key') != Configuration::get('OCCRON_SECURE_KEY')) {
    die('Ko');
}

$module = Module::getInstanceByName('optimclean');
if ($module->active) {
    $module->init();
    $use_limit = Configuration::get('OCCRON_USE_LIMIT');

    if ((int)Configuration::get('OCCRON_CUSTOMERS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'customers'
        )
    ) {
        $module->confirmations[] = $module->l('Start of customers cron task');
        $date_remove_customers_with_order =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_CUSTOMERS_ORDER_MONTHS').' Months')
        );
        $date_remove_customers_without_order = date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_CUSTOMERS_NOORDER_MONTHS').' Months')
        );
        $module->postProcessCustomers(
            $date_remove_customers_with_order,
            $date_remove_customers_without_order,
            $use_limit
        );
    }

    if ((int)Configuration::get('OCCRON_ORDERS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'orders'
        )
    ) {
        $module->confirmations[] = $module->l('Start of orders cron task');
        $date_remove_orders =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_ORDERS_MONTHS').' Months')
        );
        $module->postProcessOrders($date_remove_orders, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_CART_RULES') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'cartrules'
        )
    ) {
        $date_remove_cart_rules =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_CART_RULES_MONTHS').' Months')
        );
        $module->confirmations[] = $module->l('Start of cart rules cron task');
        $module->postProcessCartRules($date_remove_cart_rules, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_SPECIFICS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'specifics'
        )
    ) {
        $date_remove_specifics =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_SPECIFICS_MONTHS').' Months')
        );
        $module->confirmations[] = $module->l('Start of specifics prices cron task');
        $module->postProcessSpecifics($date_remove_specifics, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_CARTS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'carts'
        )
    ) {
        $module->confirmations[] = $module->l('Start of carts cron task');
        $date_remove_carts =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_CARTS_MONTHS').' Months')
        );
        $module->postProcessCarts($date_remove_carts, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_CONNECTIONS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'connections'
        )
    ) {
        $module->confirmations[] = $module->l('Start of connections cron task');
        $date_remove_connections =  date(
            'Y-m-d H:i:s',
            strtotime('-'.(int)Configuration::get('OCCRON_CONNECTIONS_MONTHS').' Months')
        );
        $module->postProcessConnections($date_remove_connections, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_GUESTS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'guests'
        )
    ) {
        $module->confirmations[] = $module->l('Start of guests cron task');
        $module->postProcessGuests(Configuration::get('OCCRON_GUESTS_TYPE'), $use_limit);
    }

    if ((int)Configuration::get('OCCRON_LOGS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'logs'
        )
    ) {
        $module->confirmations[] = $module->l('Start of logs cron task');
        $date_remove_logs = date('Y-m-d H:i:s', strtotime('-'.(int)Configuration::get('OCCRON_LOGS_MONTHS').' Months'));
        $module->postProcessLogs($date_remove_logs, $use_limit);
    }

    if ((int)Configuration::get('OCCRON_NOTFOUNDS') &&
        (
            !Tools::getIsset('task_alone') ||
            Tools::getValue('task_alone') == 'notfounds'
        )
    ) {
        $module->confirmations[] = $module->l('Start of pages not founds cron task');
        $date_remove_notfounds = date('Y-m-d H:i:s', strtotime('-'.(int)Configuration::get('OCCRON_NOTFOUNDS_MONTHS').' Months'));
        $module->postProcessNotFounds($date_remove_notfounds, $use_limit);
    }

    if (isset($module->confirmations) && count($module->confirmations)) {
        foreach ($module->confirmations as $conf) {
            echo '[CONFIRMATION] '. $conf.'<br />';
        }
    }

    if (isset($module->errors) && count($module->errors)) {
        foreach ($module->errors as $error) {
            echo '[ALERT] '. $error.'<br />';
        }
    }

    echo $module->l('Cron task is done with success !');
}
