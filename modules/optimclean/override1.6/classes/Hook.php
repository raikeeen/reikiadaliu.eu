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
        if (version_compare(_PS_VERSION_, '1.6.0', '>=') && Module::$_log_modules_perfs === null) {
            $modulo = _PS_DEBUG_PROFILING_ ? 1 : Configuration::get('PS_log_modules_perfs_MODULO');
            Module::$_log_modules_perfs = ($modulo && mt_rand(0, $modulo - 1) == 0);
            if (Module::$_log_modules_perfs) {
                Module::$_log_modules_perfs_session = mt_rand();
            }
        }
        $time_start = microtime(true);
        $memory_start = memory_get_usage(true);
        $r = $module->{$method}($params);
        $time_end = microtime(true);
        $memory_end = memory_get_usage(true);
        $duration = number_format($time_end - $time_start, 2);

        if ($duration >= 3) {
            if (self::$handle_logs === null) {
                if (is_writable(_PS_ROOT_DIR_.'/log/')) {
                    self::$handle_logs = fopen(_PS__PS_ROOT_DIR_.'/log/modules_logs.txt', 'a+');
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

        if (version_compare(_PS_VERSION_, '1.6.0', '<') || !Module::$_log_modules_perfs) {
            return $r;
        }

        Db::getInstance()->execute('
        INSERT INTO '._DB_PREFIX_.'modules_perfs
        (session, module, method, time_start, time_end, memory_start, memory_end)
        VALUES ('.(int)Module::$_log_modules_perfs_session.', "'.pSQL($module->name).'", "'.pSQL($method).'",
         "'.pSQL($time_start).'", "'.pSQL($time_end).'", '.(int)$memory_start.', '.(int)$memory_end.')');

        return $r;
    }
}
