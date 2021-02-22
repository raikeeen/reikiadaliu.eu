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

function upgrade_module_1_0_3()
{
    $backup_path = dirname(__FILE__).'/../backups/';
    $rollbacks_paths = array(
        'dumps' => $backup_path.'dumps/',
        'cart_rules' => $backup_path.'rollbacks/cart_rules/',
        'carts' => $backup_path.'rollbacks/carts/',
        'connections' => $backup_path.'rollbacks/connections/',
        'customers' => $backup_path.'rollbacks/customers/',
        'guests' => $backup_path.'rollbacks/guests/',
        'orders' => $backup_path.'rollbacks/orders/',
        'specifics' => $backup_path.'rollbacks/specifics/',
        'logs' => $backup_path.'rollbacks/logs/',
        'joins' => $backup_path.'rollbacks/joins/',
    );

    foreach ($rollbacks_paths as $rollback_path) {
        $rollbacks_files = glob($rollback_path.'*.{sql,zip}', GLOB_BRACE);
        if (!is_array($rollbacks_files) || !count($rollbacks_files)) {
            continue;
        }

        foreach ($rollbacks_files as $rollback_file) {
            if (strpos($rollback_file, 'backup-backup-') !== false) {
                $new_path = str_replace('backup-backup-', 'backup-', $rollback_file);
                if (!rename($rollback_file, $new_path)) {
                    return false;
                }
            }
        }
    }

    return true;
}
