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

    public static function exec(
        $hook_name,
        $hook_args = array(),
        $id_module = null,
        $array_return = false,
        $check_exceptions = true,
        $use_push = false,
        $id_shop = null
    ) {
        if (version_compare(_PS_VERSION_, '1.6.0', '>=')) {
            return parent::exec(
                $hook_name,
                $hook_args,
                $id_module,
                $array_return,
                $check_exceptions,
                $use_push,
                $id_shop
            );
        }

        static $disable_non_native_modules = null;
        if ($disable_non_native_modules === null) {
            $disable_non_native_modules = (bool)Configuration::get('PS_DISABLE_NON_NATIVE_MODULE');
        }

        if (($id_module && !is_numeric($id_module)) || !Validate::isHookName($hook_name)) {
            throw new PrestaShopException('Invalid id_module or hook_name');
        }

        if (!$module_list = Hook::getHookModuleExecList($hook_name)) {
            return '';
        }

        if (!$id_hook = Hook::getIdByName($hook_name)) {
            return false;
        }

        // Store list of executed hooks on this page
        Hook::$executed_hooks[$id_hook] = $hook_name;

        $live_edit = false;
        $context = Context::getContext();
        if (!isset($hook_args['cookie']) || !$hook_args['cookie']) {
            $hook_args['cookie'] = $context->cookie;
        }
        if (!isset($hook_args['cart']) || !$hook_args['cart']) {
            $hook_args['cart'] = $context->cart;
        }

        $retro_hook_name = Hook::getRetroHookName($hook_name);

        // Look on modules list
        $altern = 0;
        $output = '';

        if ($disable_non_native_modules && !isset(Hook::$native_module)) {
            Hook::$native_module = Module::getNativeModuleList();
        }

        foreach ($module_list as $array) {
            $time_start = microtime(true);
            // Check errors
            if ($id_module && $id_module != $array['id_module']) {
                continue;
            }

            if ((bool)$disable_non_native_modules &&
                Hook::$native_module &&
                count(Hook::$native_module) &&
                !in_array($array['module'], self::$native_module)
              ) {
                continue;
            }

            if (!($moduleInstance = Module::getInstanceByName($array['module']))) {
                continue;
            }

            if ($check_exceptions) {
                $exceptions = $moduleInstance->getExceptions($array['id_hook']);
                $controller = Dispatcher::getInstance()->getController();

                if (in_array($controller, $exceptions)) {
                    continue;
                }

                $matching_name = array(
                    'authentication' => 'auth',
                    'compare' => 'products-comparison',
                );
                if (isset($matching_name[$controller]) && in_array($matching_name[$controller], $exceptions)) {
                    continue;
                }
                if (Validate::isLoadedObject($context->employee) &&
                    !$moduleInstance->getPermission('view', $context->employee)
                ) {
                    continue;
                }
            }

            $hook_callable = is_callable(array($moduleInstance, 'hook'.$hook_name));
            $hook_retro_callable = is_callable(array($moduleInstance, 'hook'.$retro_hook_name));
            if (($hook_callable || $hook_retro_callable) && Module::preCall($moduleInstance->name)) {
                $hook_args['altern'] = ++$altern;

                if ($hook_callable) {
                    $display = Hook::coreCallHook($moduleInstance, 'hook'.$hook_name, $hook_args);
                } elseif ($hook_retro_callable) {
                    $display = Hook::coreCallHook($moduleInstance, 'hook'.$retro_hook_name, $hook_args);
                }

                $id_tab_modules_positions = (int)Tab::getIdFromClassName('AdminModulesPositions');
                $id_employee = (int)Tools::getValue('id_employee');
                if (!$array_return &&
                    $array['live_edit'] &&
                    Tools::isSubmit('live_edit') &&
                    Tools::getValue('ad') &&
                    Tools::getValue('liveToken') ==
                    Tools::getAdminToken('AdminModulesPositions'.$id_tab_modules_positions.$id_employee)
                 ) {
                    $live_edit = true;
                    $output .= self::wrapLiveEdit($display, $moduleInstance, $array['id_hook']);
                } else {
                    if ($array_return) {
                        $output[] = $display;
                    } else {
                           $output .= $display;
                    }
                }
            }
            $time_end = microtime(true);
            $duration = number_format($time_end - $time_start, 2);

            if ($duration >= 3) {
                if (self::$handle_logs === null) {
                    if (is_writable(_PS__PS_ROOT_DIR_.'/log/')) {
                        self::$handle_logs = fopen(_PS__PS_ROOT_DIR_.'/log/modules_logs.txt', 'a+');
                    }
                }
                if (self::$handle_logs) {
                    fwrite(
                        self::$handle_logs,
                        '['.date('Y-m-d H:i:s').'] Execution time for module '.
                        $array['module'].' on Hook '.$hook_name.' : '.$duration.' seconds'."\n"
                    );
                }
            }
        }

        if ($array_return) {
            return $output;
        } else {
            return ($live_edit ? '<script type="text/javascript">hooks_list.push(\''.$hook_name.'\');</script>
                <div id="'.$hook_name.'" class="dndHook" style="min-height:50px">' : '').
                $output.($live_edit ? '</div>' : '');
        }
    }
}
