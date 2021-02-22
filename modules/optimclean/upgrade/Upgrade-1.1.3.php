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

function upgrade_module_1_1_3()
{
    Configuration::updateValue('OCCRON_SPECIFICS_MONTHS', 1);
    Configuration::updateValue('OCCRON_CART_RULES_MONTHS', 1);
    return true;
}
