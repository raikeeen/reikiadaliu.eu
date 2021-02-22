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

class Hook extends HookCore
{
    public static $handle_logs = null;
    public static function coreCallHook($module, $method, $params)
    {
        $time_start = microtime(true);
        $r = $module->{$method}($params);
        $time_end = microtime(true);
        $duration = number_format($time_end - $time_start, 2);
        if ($duration >= 3) {
            if (self::$handle_logs === null) {
                if (is_writable(_PS_ROOT_DIR_.'/app/logs/')) {
                    self::$handle_logs = fopen(_PS_ROOT_DIR_.'/app/logs/modules_logs.txt', 'a+');
                }
            }
            if (self::$handle_logs) {
                fwrite(
                    self::$handle_logs,
                    '['.date('Y-m-d H:i:s').'] Execution time for module '.
                    $module->name.' on Hook '.$method.' : '.$duration.' seconds'."\n"
                );
            }
        }
        return $r;
    }
}
