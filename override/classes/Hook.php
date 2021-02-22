<?php

class Hook extends HookCore
{   
    /*
    * module: ets_superspeed
    * date: 2020-10-16 17:33:41
    * version: 1.0.9
    */
    public static function exec($hook_name, $hook_args = array(), $id_module = null, $array_return = false, $check_exceptions = true,$use_push = false, $id_shop = null,$chain=false)
    {
        require_once(dirname(__FILE__).'/../../modules/ets_superspeed/classes/ext/ets_hook');
        $class='Ets_Hook';
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
        if (Tools::version_compare(_PS_VERSION_,'1.7','>=')) {
            $method='exec17';
            return call_user_func_array(array($class, $method),array($hook_name,$hook_args,$id_module,$array_return,$check_exceptions,$use_push,$id_shop,$chain,$backtrace));
        }
        else
        {
            $method='exec16';
            return call_user_func_array(array($class, $method),array($hook_name,$hook_args,$id_module,$array_return,$check_exceptions,$use_push,$id_shop));
        }
    }
    /*
    * module: optimclean
    * date: 2021-02-15 20:10:45
    * version: 1.2.4
    */
    public static $handle_logs = null;
    /*
    * module: optimclean
    * date: 2021-02-15 20:10:45
    * version: 1.2.4
    */
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