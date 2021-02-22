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

class OptimClean extends Module
{
    public static $all_tables = false;
    public static $current_index;
    private $backup_engine = null;
    private $backup_time = null;
    private $ajax_datas = array();
    public $errors = array();
    public $confirmations = array();
    public $redirect_after = false;

    public function __construct()
    {
        $this->name = 'optimclean';
        $this->tab = 'administration';
        $this->version = '1.2.4';
        $this->author = 'Adilis';
        $this->author_address = '0xEd45341f75f5F5280f83993885fbc4bf85fC56dd';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->module_key = '216a3a0bd331256e4b4075c7a5c5f3de';

        parent::__construct();

        $this->displayName = $this->l('Optimize and clean');
        $this->description = $this->l('Optimize and clean your prestashop deeply');

        $this->backup_path = _PS_MODULE_DIR_.$this->name.'/backups/';
        $this->backup_tmp_path = _PS_MODULE_DIR_.$this->name.'/backups/tmp/';
        $this->cache_path = _PS_MODULE_DIR_.$this->name.'/cache/';
        $this->rollbacks_paths = array(
            'dumps' => $this->backup_path.'dumps/',
            'cartrules' => $this->backup_path.'rollbacks/cart_rules/',
            'carts' => $this->backup_path.'rollbacks/carts/',
            'connections' => $this->backup_path.'rollbacks/connections/',
            'customers' => $this->backup_path.'rollbacks/customers/',
            'guests' => $this->backup_path.'rollbacks/guests/',
            'orders' => $this->backup_path.'rollbacks/orders/',
            'specifics' => $this->backup_path.'rollbacks/specifics/',
            'logs' => $this->backup_path.'rollbacks/logs/',
            'joins' => $this->backup_path.'rollbacks/joins/',
            'notfounds' => $this->backup_path.'rollbacks/notfounds/',
            'sav' => $this->backup_path.'rollbacks/sav/',
            'imgs' => $this->backup_path.'rollbacks/imgs/',
            'attributes' => $this->backup_path.'rollbacks/attributes/',
        );

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $this->ps_log_path = _PS_ROOT_DIR_.'/app/logs/';
        } else {
            $this->ps_log_path = _PS_ROOT_DIR_.'/log/';
        }

        $this->cron_params = array(
            'OCCRON_CUSTOMERS' => false,
            'OCCRON_ORDERS' => false,
            'OCCRON_CART_RULES' => false,
            'OCCRON_CART_RULES_MONTHS' => 1,
            'OCCRON_SPECIFICS' => false,
            'OCCRON_SPECIFICS_MONTHS' => 1,
            'OCCRON_CARTS' => false,
            'OCCRON_CONNECTIONS' => false,
            'OCCRON_GUESTS' => false,
            'OCCRON_LOGS' => false,
            'OCCRON_NOTFOUNDS' => false,
            'OCCRON_CUSTOMERS_ORDER_MONTHS' => 36,
            'OCCRON_CUSTOMERS_NOORDER_MONTHS' => 12,
            'OCCRON_ORDERS_MONTHS' => 24,
            'OCCRON_CARTS_MONTHS' => 12,
            'OCCRON_CONNECTIONS_MONTHS' => 3,
            'OCCRON_LOGS_MONTHS' => 3,
            'OCCRON_NOTFOUNDS_MONTHS' => 3,
            'OCCRON_GUESTS_TYPE' => 'no_customer',
            'OCCRON_USE_LIMIT' => 1000,
        );
    }

    public function install()
    {
        if (self::fileExistsCache($this->getLocalPath().'override/')) {
            return Tools::deleteDirectory($this->getLocalPath().'override/', true);
        }

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            self::recurseCopy($this->getLocalPath().'override1.7/', $this->getLocalPath().'override/');
            self::chmodr($this->getLocalPath().'override/', 0775);
        }elseif (version_compare(_PS_VERSION_, '1.6.0.0', '>=')) {
            self::recurseCopy($this->getLocalPath().'override1.6/', $this->getLocalPath().'override/');
            self::chmodr($this->getLocalPath().'override/', 0775);
        } else {
            $ins_cache_manager = Module::getInstanceByName('pm_cache_manager');
            $ins_pagecache = Module::getInstanceByName('pagecache');
            if (!Validate::isLoadedObject($ins_cache_manager) && !Validate::isLoadedObject($ins_pagecache)) {
                self::recurseCopy($this->getLocalPath().'override1.5/', $this->getLocalPath().'override/');
                self::chmodr($this->getLocalPath().'override/', 0775);
            }
        }

        foreach ($this->cron_params as $name => $default_value) {
            Configuration::updateValue($name, $default_value);
        }
        Configuration::updateValue('OCCRON_SECURE_KEY', Tools::passwdGen());
        Configuration::updateValue('OC_AJAX_MODE', 1);
        Configuration::updateValue('OC_AJAX_LIMIT', 200);
        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader');
    }

    public function uninstall()
    {
        foreach (array_keys($this->cron_params) as $name) {
            Configuration::deleteByName($name);
        }
        Configuration::deleteByName('OCCRON_SECURE_KEY');
        return parent::uninstall();
    }

    public function checkCompatibiliy()
    {
        if (!self::isAvailbaleDir($this->ps_log_path)) {
            $this->errors[] = sprintf(
                $this->l('Folder %1$s is not available for writing, please check permissions before continuing'),
                $this->ps_log_path
            );
        }
        if (!self::isAvailbaleDir($this->backup_path)) {
            $this->errors[] = sprintf(
                $this->l('Folder %1$s is not available for writing, please check permissions before continuing'),
                $this->backup_path
            );
        }
        if (!self::isAvailbaleDir($this->backup_tmp_path)) {
            $this->errors[] = sprintf(
                $this->l('Folder %1$s is not available for writing, please check permissions before continuing'),
                $this->backup_tmp_path
            );
        }
        if (!self::isAvailbaleDir($this->cache_path)) {
            $this->errors[] = sprintf(
                $this->l('Folder %1$s is not available for writing, please check permissions before continuing'),
                $this->cache_path
            );
        }

        foreach ($this->rollbacks_paths as $dir) {
            if (!self::isAvailbaleDir($dir)) {
                $this->errors[] = sprintf(
                    $this->l('Folder %1$s is not available for writing, please check permissions before continuing'),
                    $dir
                );
            }
        }

        if (!class_exists('ZipArchive')) {
            $this->errors[] = $this->l('Class ZipArchive is required to run this module, please install it.');
        }

        if (!in_array(ini_get('allow_url_fopen'), array('On', 'on', '1')) &&
            !function_exists('curl_init')
        ) {
            $this->errors[] = $this->l('Function curl_init is required to run this module, please active it.');
        }
    }

    public static function updatePHPPerfs()
    {
        set_time_limit(0);
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');
    }

    public function init()
    {
        self::updatePHPPerfs();
        require_once _PS_MODULE_DIR_.$this->name.'/lib/MysqlDumpFactory.php';
        $use_pdo = (version_compare(PHP_VERSION, '7.0.0') >= 0) ? true : false;
        $this->backup_engine = MysqlDumpFactory::makeMysqlDump(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_, $use_pdo);
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        self::$current_index = $this->context->link->getAdminLink('AdminModules', true);
        self::$current_index .= '&configure='.$this->name.'&module_name='.$this->name;

        $this->init();
        $this->context->controller->addJS(_PS_JS_DIR_.'jquery/ui/jquery.ui.accordion.min.js');
        $this->context->controller->addCSS(_PS_JS_DIR_.'jquery/ui/themes/base/jquery.ui.accordion.css');
        $this->context->controller->addCSS($this->_path.'views/css/back.css');

        if (version_compare(_PS_VERSION_, '1.6.0', '<')) {
            $this->context->controller->addJS($this->_path.'views/js/jquery.ui.tooltip.min.js');
            $this->context->controller->addCSS($this->_path.'views/css/back1.5.css');
        }

        $this->context->controller->addJS($this->_path.'views/js/back.js');

        if ((int)Tools::getValue('ajax')) {
            return $this->postProcessAjax();
        } else {
            $this->checkCompatibiliy();
            if (count($this->errors)) {
                $this->context->smarty->assign(array(
                    'errors' =>  $this->errors
                ));
                return
                    $this->context->smarty->fetch($this->local_path.'views/templates/admin/header.tpl').
                    $this->renderAbout();
            }

            if (Configuration::get('OC_IN_PROGRESS') && count($this->getRollbacksInTemp())) {
                if (Tools::getIsset('action') && Tools::getIsset('type')) {
                    $this->cleanLastLogs();
                    $this->postProcessTempRollback();
                    Configuration::deleteByName('OC_IN_PROGRESS');
                    $this->redirect();
                }

                $this->context->smarty->assign(array(
                    'about' =>  $this->renderAbout(),
                    'ajax_mode' =>  (int)Configuration::get('OC_AJAX_MODE'),
                    'ajax_limit' =>  (int)Configuration::get('OC_AJAX_LIMIT'),
                    'task_date' => Tools::displayDate(Configuration::get('OC_IN_PROGRESS'), null, true),
                    'current_index' => self::$current_index,
                ));
                return $this->context->smarty->fetch($this->local_path.'views/templates/admin/inprogress.tpl');
            }

            if (Configuration::get('OC_IN_PROGRESS') && count($this->getRollbacksInTemp())) {
                if (Tools::getIsset('action') && Tools::getIsset('type')) {
                    $this->cleanLastLogs();
                    $this->postProcessTempRollback();
                    Configuration::deleteByName('OC_IN_PROGRESS');
                    $this->redirect();
                }

                $this->context->smarty->assign(array(
                    'about' =>  $this->renderAbout(),
                    'ajax_mode' =>  (int)Configuration::get('OC_AJAX_MODE'),
                    'ajax_limit' =>  (int)Configuration::get('OC_AJAX_LIMIT'),
                    'task_date' => Tools::displayDate(Configuration::get('OC_IN_PROGRESS'), null, true),
                    'current_index' => self::$current_index,
                ));
                return $this->context->smarty->fetch($this->local_path.'views/templates/admin/inprogress.tpl');
            }

            $this->postProcess();
        }

        $this->list_items = array();
        $output = $this->renderPerformances();
        $output .= $this->renderModuleLogs();
        $output .= $this->renderExceptionLogs();
        $output .= $this->renderOthersLogs();
        $output .= $this->renderForm('getLogsForm');
        $output .= $this->renderStats();
        $output .= $this->renderForm('getLostJoinsForm');
        $output .= $this->renderForm('getTransfertShopForm');
        $output .= $this->renderForm('getCustomersForm');
        $output .= $this->renderForm('getOrdersForm');
        $output .= $this->renderForm('getCartRulesForm');
        $output .= $this->renderForm('getSpecificsForm');
        $output .= $this->renderForm('getCartsForm');
        $output .= $this->renderForm('getConnectionsForm');
        $output .= $this->renderForm('getGuestsForm');
        $output .= $this->renderForm('getNotFoundsForm');
        $output .= $this->renderForm('getSavForm');
        $output .= $this->renderForm('getImgsForm');
        $output .= $this->renderForm('getAttributesForm');
        $output .= $this->renderForm('getCronForm');

        $this->context->smarty->assign(array(
            'panels' => $output,
            'optimclean_tab' => Tools::getValue('optimclean_tab', 'getPerformancesForm'),
            'list_items' =>  $this->list_items,
            'header' =>  $this->renderHeader(),
            'about' =>  $this->renderAbout(),
            'ajax_mode' =>  (int)Configuration::get('OC_AJAX_MODE'),
            'ajax_limit' =>  (int)Configuration::get('OC_AJAX_LIMIT'),
        ));

        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/view.tpl');
    }

    public function postProcess()
    {

        $this->cleanRollbacksinTemp();

        if (Tools::getIsset('action')) {
            switch (Tools::getValue('action')) {
                case 'defragment':
                    $this->postProcessDefragment(Tools::getValue('table'));
                    break;
                case 'optimize':
                    $this->postProcessOptimize(Tools::getValue('table'));
                    break;
                case 'backup':
                    $this->postProcessBackup(Tools::getValue('table'));
                    break;
                case 'cleanmodulelog':
                    $this->postProcessCleanModuleLogFile();
                    break;
                case 'cleanexceptionlog':
                    $this->postProcessCleanExceptionLogFile();
                    break;
                case 'cleanotherslog':
                    $this->postProcessCleanOthersLogFile();
                    break;
                case 'rollbackdownload':
                    $this->postProcessRollback();
                    break;
                case 'rollbackrestore':
                    $this->postProcessRollback();
                    break;
                case 'rollbackdelete':
                    $this->postProcessRollback();
                    break;
                default:
            }
            $this->redirect_after = true;
        }

        if (((bool)Tools::isSubmit('submitgetTransfertShopForm')) == true) {
            $id_shop_from = (int)Tools::getValue('shop_from');
            $id_shop_to = (int)Tools::getValue('shop_to');
            if (!(int)$id_shop_from || !(int)$id_shop_to) {
                $this->errors[] = $this->l('Please select shop from and shop to');
            } else {
                $this->postProcessTransfertShop($id_shop_from, $id_shop_to);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetCustomersForm')) == true) {
            $date_remove_customers_with_order = Tools::getValue('date_remove_customers_with_order');
            $date_remove_customers_without_order = Tools::getValue('date_remove_customers_without_order');
            $use_limit = (int)Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_customers_with_order) ||
                !Validate::isDate($date_remove_customers_without_order)
            ) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessCustomers(
                    $date_remove_customers_with_order,
                    $date_remove_customers_without_order,
                    $use_limit
                );
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetOrdersForm')) == true) {
            $date_remove_orders = Tools::getValue('date_remove_orders');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_orders)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessOrders($date_remove_orders, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetCartsForm')) == true) {
            $date_remove_carts = Tools::getValue('date_remove_carts');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_carts)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessCarts($date_remove_carts, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetCartRulesForm')) == true) {
            $date_remove_cart_rules = Tools::getValue('date_remove_cart_rules');
            if (!Validate::isDate($date_remove_cart_rules)
            ) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $use_limit = Tools::getValue('use_limit');
                $this->postProcessCartRules($date_remove_cart_rules, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetSpecificsForm')) == true) {
            $date_remove_specifics = Tools::getValue('date_remove_specifics');
            if (!Validate::isDate($date_remove_specifics)
            ) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $use_limit = Tools::getValue('use_limit');
                $this->postProcessSpecifics($date_remove_specifics, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetLostJoinsForm')) == true) {
            $this->postProcessLostJoins();
            $this->redirect_after = true;
        }

        if (((bool)Tools::isSubmit('submitgetConnectionsForm')) == true) {
            $date_remove_connections = Tools::getValue('date_remove_connections');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_connections)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessConnections($date_remove_connections, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetLogsForm')) == true) {
            $date_remove_logs = Tools::getValue('date_remove_logs');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_logs)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessLogs($date_remove_logs, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetGuestsForm')) == true) {
            $guest_type = Tools::getValue('guest_type');
            $use_limit = Tools::getValue('use_limit');
            if (empty($guest_type)) {
                $this->errors[] = $this->l('Invalid guest type');
            } else {
                $this->postProcessGuests($guest_type, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetNotFoundsForm')) == true) {
            $date_remove_notfounds = Tools::getValue('date_remove_notfounds');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_notfounds)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                $this->postProcessNotFounds($date_remove_notfounds, $use_limit);
                $this->redirect_after = true;
            }
        }

        if (((bool)Tools::isSubmit('submitgetSavForm')) == true) {
            $date_remove_sav = Tools::getValue('date_remove_sav');
            $sav_type = Tools::getValue('sav_type');
            $sav_state = Tools::getValue('sav_state');
            $use_limit = Tools::getValue('use_limit');
            if (!Validate::isDate($date_remove_sav)) {
                $this->errors[] = $this->l('Invalid date format');
            } else {
                if (empty($sav_type)) {
                    $this->errors[] = $this->l('Invalid sav type');
                } else {
                    if (empty($sav_state)) {
                        $this->errors[] = $this->l('Invalid sav state');
                    } else {
                        $this->postProcessSav($date_remove_sav, $sav_type, $sav_state, $use_limit);
                        $this->redirect_after = true;
                    }
                }
            }
        }

        if (((bool)Tools::isSubmit('submitgetCronForm')) == true) {
            $this->postProcessCron();
        }

        $this->writeOptimCleanLogs();
        if ($this->redirect_after) {
            $this->redirect();
        }
    }

    protected function redirect()
    {
        if (strpos(self::$current_index, 'optimclean_tab') === false) {
            self::$current_index .= '&optimclean_tab='.Tools::getValue('optimclean_tab', 'getPerformancesForm');
        }
        Tools::redirectAdmin(self::$current_index);
    }

    /**
     * Load the configuration form
     */
    public function postProcessAjax()
    {
        self::$current_index .= '&optimclean_tab='.Tools::getValue('optimclean_tab', 'getPerformancesForm');

        if (Tools::getvalue('process') == 'runPageSpeedTest') {
            $this->postProcessPageSpeedTest();
        }

        if (Tools::getValue('action') == 'getResume') {
            $this->cleanRollbacksinTemp();
        }

        if (Tools::getValue('backup_time')) {
            $this->backup_time = Tools::getValue('backup_time');
            Configuration::updateValue('OC_IN_PROGRESS', $this->backup_time);
        }

        if (Tools::getValue('action') == 'compileRollback') {
            if (self::isEmptyTemp()) {
                $this->confirmations[] = $this->l('No data to save, nothing happens !');
                $this->ajax_datas['nextStep'] = 'Done';
            } else {
                $zip_filename = null;
                if (Tools::getValue('process')=='imgs') {
                    $zip_filename = Tools::getValue('image_type');
                }
                if ($this->compileRollbackFile(Tools::getValue('process'), $zip_filename)) {
                    $this->ajax_datas['nextStep'] = 'Done';
                    $this->ajax_datas['redirect_after'] = self::$current_index;
                    $this->confirmations[] = $this->l('Rollback file created with success');
                } else {
                    $this->errors[] = $this->l('An error occurred during rollback file creation');
                }
            }
        } else {
            if (((bool)Tools::isSubmit('submitgetCustomersForm')) == true) {
                $date_remove_customers_with_order = Tools::getValue('date_remove_customers_with_order');
                $date_remove_customers_without_order = Tools::getValue('date_remove_customers_without_order');
                $use_limit = (int)Tools::getValue('use_limit');
                if (    !Validate::isDate($date_remove_customers_with_order) ||
                    !Validate::isDate($date_remove_customers_without_order)
                ) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'customers';
                    $this->postProcessCustomers(
                        $date_remove_customers_with_order,
                        $date_remove_customers_without_order,
                        $use_limit
                    );
                }
            }

            if (((bool)Tools::isSubmit('submitgetOrdersForm')) == true) {
                $date_remove_orders = Tools::getValue('date_remove_orders');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_orders)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'orders';
                    $this->postProcessOrders($date_remove_orders, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetCartsForm')) == true) {
                $date_remove_carts = Tools::getValue('date_remove_carts');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_carts)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'carts';
                    $this->postProcessCarts($date_remove_carts, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetCartRulesForm')) == true) {
                $date_remove_cart_rules = Tools::getValue('date_remove_cart_rules');
                if (    !Validate::isDate($date_remove_cart_rules)
                ) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $use_limit = Tools::getValue('use_limit');
                    $this->ajax_datas['process'] = 'cartrules';
                    $this->postProcessCartRules($date_remove_cart_rules, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetSpecificsForm')) == true) {
                $date_remove_specifics = Tools::getValue('date_remove_specifics');
                if (    !Validate::isDate($date_remove_specifics)
                ) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $use_limit = Tools::getValue('use_limit');
                    $this->ajax_datas['process'] = 'specifics';
                    $this->postProcessSpecifics($date_remove_specifics, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetAttributesForm')) == true) {
                $delete_group = (bool)Tools::getValue('delete_group');
                $use_limit = Tools::getValue('use_limit');
                $this->ajax_datas['process'] = 'attributes';
                $this->postProcessAttributes($delete_group, $use_limit);
            }

            if (((bool)Tools::isSubmit('submitgetConnectionsForm')) == true) {
                $date_remove_connections = Tools::getValue('date_remove_connections');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_connections)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'connections';
                    $this->postProcessConnections($date_remove_connections, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetLogsForm')) == true) {
                $date_remove_logs = Tools::getValue('date_remove_logs');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_logs)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'logs';
                    $this->postProcessLogs($date_remove_logs, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetGuestsForm')) == true) {
                $guest_type = Tools::getValue('guest_type');
                $use_limit = Tools::getValue('use_limit');
                if (empty($guest_type)) {
                    $this->errors[] = $this->l('Invalid guest type');
                } else {
                    $this->ajax_datas['process'] = 'guests';
                    $this->postProcessGuests($guest_type, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetNotFoundsForm')) == true) {
                $date_remove_notfounds = Tools::getValue('date_remove_notfounds');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_notfounds)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    $this->ajax_datas['process'] = 'notfounds';
                    $this->postProcessNotFounds($date_remove_notfounds, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetImgsForm')) == true) {
                $this->ajax_datas['process'] = 'imgs';
                $image_type = Tools::getValue('image_type');
                if (empty($image_type)) {
                    $this->errors[] = $this->l('Invalid image type');
                } else {
                    $this->ajax_datas['process'] = 'imgs';
                    $use_limit = Tools::getValue('use_limit');
                    $this->postProcessImgs($image_type, $use_limit);
                }
            }

            if (((bool)Tools::isSubmit('submitgetSavForm')) == true) {
                $date_remove_sav = Tools::getValue('date_remove_sav');
                $sav_type = Tools::getValue('sav_type');
                $sav_state = Tools::getValue('sav_state');
                $use_limit = Tools::getValue('use_limit');
                if (!Validate::isDate($date_remove_sav)) {
                    $this->errors[] = $this->l('Invalid date format');
                } else {
                    if (empty($sav_type)) {
                        $this->errors[] = $this->l('Invalid sav type');
                    } else {
                        if (empty($sav_state)) {
                            $this->errors[] = $this->l('Invalid sav state');
                        } else {
                            $this->ajax_datas['process'] = 'sav';
                            $this->postProcessSav($date_remove_sav, $sav_type, $sav_state, $use_limit);
                            $this->redirect_after = true;
                        }
                    }
                }
            }
        }

        $this->writeOptimCleanLogs();

        $result = array();
        $result['datas'] = $this->ajax_datas;
        $result['errors'] = $this->errors;
        $result['confirmations'] = $this->confirmations;

        echo Tools::jsonEncode($result);
        exit;
    }


    public static function getAllTables()
    {
        if (self::$all_tables !== false) {
            return self::$all_tables;
        }

        $tables_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SHOW TABLE STATUS');

        foreach ($tables_infos as $table_infos) {
            $table_size = $table_infos['Data_length']+$table_infos['Index_length'];
            $table_free_space = $table_infos['Engine'] == 'InnoDB' ? 0 : $table_infos['Data_free'];

            self::$all_tables[] = array(
                'name' => $table_infos['Name'],
                'size' => $table_size,
                'size_display' => self::formatFileSize($table_size),
                'free_space' => $table_free_space,
                'rows' => $table_infos['Rows'],
                'free_space_display' => self::formatFileSize($table_free_space),
                'engine' => $table_infos['Engine']
            );
        }
        return self::$all_tables;
    }

    public function scanFolder($pattern, $flags = '*.{jpg,png,gif}')
    {

        if (!self::isAvailbaleDir($pattern)) {
            return;
        }
        $files_table = glob($pattern.$flags, GLOB_BRACE);
        foreach (glob($pattern.'*', GLOB_ONLYDIR) as $dir) {
            $files_table = array_merge($files_table, self::scanFolder($dir.'/', $flags));
        }

        return $files_table;
    }

    public function cacheScanFolder($pattern, $flags = '*.{jpg,png,gif}')
    {
        $pattern2url = Tools::str2url(str_replace(_PS_ROOT_DIR_, '', $pattern)).'.csv';
        if (!self::fileExistsCache($this->cache_path.$pattern2url)) {
            $files_table = $this->scanFolder($pattern, $flags);
            $this->writeinCache($pattern2url, implode("\n", $files_table));
        }
        return explode("\n", Tools::file_get_contents($this->cache_path.$pattern2url));
    }

    public function removeCacheScanFolder($pattern)
    {
        $pattern2url = Tools::str2url(str_replace(_PS_ROOT_DIR_, '', $pattern)).'.csv';
        self::deleteFile($this->cache_path.$pattern2url);
    }

    public function getTableInformations($tables_array)
    {
        if (!count($tables_array)) {
            return;
        }
        $search_table = array();
        foreach ($tables_array as $searched_table) {
            foreach (self::getAllTables() as $table_infos) {
                if (_DB_PREFIX_.$searched_table == $table_infos['name']) {
                    $search_table[] =
                        '<strong>'.$table_infos['name'].'</strong>, '
                        .$table_infos['size_display'].', '
                        .$table_infos['rows'].' '.$this->l('rows');
                }
            }
        }
        if (!count($search_table)) {
            return;
        }
        return implode('<br/>', $search_table);
    }

    public function getFolderInformations($pattern, $flags = '*.{jpg,png,gif}')
    {
        $files_table = self::scanFolder($pattern);
        $total_size = 0;
        foreach ($files_table as $file) {
            $total_size += filesize($file);
        }

        return
            sprintf($this->l('%d images founded, either %s'), count($files_table), self::formatFileSize($total_size));
    }

    public function writeOptimCleanLogs()
    {
        if (!count($this->errors) && !count($this->confirmations)) {
            return;
        }

        $handle = self::createOrReadFile($this->ps_log_path.'optimclean_logs.txt', 'a+');
        if (count($this->confirmations)) {
            $handle_last_confirmations = self::createOrReadFile($this->cache_path.'last-confirmations.txt', 'a+');
            foreach ($this->confirmations as $conf) {
                fwrite($handle_last_confirmations, $conf."\n");
                fwrite($handle, '['.date('Y-m-d H:i:s').'][INFO] '.Tools::safeOutput($conf)."\n");
            }
            fclose($handle_last_confirmations);
        }

        if (count($this->errors)) {
            $handle_last_errors = self::createOrReadFile($this->cache_path.'last-errors.txt', 'a+');
            foreach ($this->errors as $error) {
                fwrite($handle_last_errors, $error."\n");
                fwrite($handle, '['.date('Y-m-d H:i:s').'][ERROR] '.Tools::safeOutput($error)."\n");
            }
            fclose($handle_last_errors);
        }
        fclose($handle);
    }

    public function writeinCache($filename, $content)
    {
        if (!$content) {
            return;
        }

        $handle = self::createOrReadFile($this->cache_path.$filename, 'w+');
        fwrite($handle, $content);
        fclose($handle);
    }

    public function renderHeader()
    {

        if (self::fileExistsCache($this->cache_path.'last-confirmations.txt')) {
            $this->confirmations = file(
                $this->cache_path.'last-confirmations.txt',
                FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
            );
        }

        if (self::fileExistsCache($this->cache_path.'last-errors.txt')) {
            $this->errors = file(
                $this->cache_path.'last-errors.txt',
                FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
            );
        }

        $this->context->smarty->assign(array(
            'confirmations' => $this->confirmations,
            'errors' => $this->errors
        ));

        $this->errors = $this->confirmations = array();
        $this->cleanLastLogs();
        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/header.tpl');
    }

    public function cleanLastLogs()
    {
        if (self::fileExistsCache($this->cache_path.'last-confirmations.txt')) {
            self::deleteFile($this->cache_path.'last-confirmations.txt');
        }

        if (self::fileExistsCache($this->cache_path.'last-errors.txt')) {
            self::deleteFile($this->cache_path.'last-errors.txt');
        }
    }

    public function renderPerformances()
    {

        $configurations_to_check = array(
            array(
                'key' => 'PS_SMARTY_FORCE_COMPILE',
                'bad_value' => 2,
                'label' => $this->l('Disable force template compilation'),
                'level' => 'danger'
            ),
            array(
                'key' => 'PS_SMARTY_CACHE',
                'bad_value' => 0,
                'label' => $this->l('Activate smarty cache'),
                'level' => 'danger'
            ),
            array(
                'key' => 'PS_CSS_THEME_CACHE',
                'bad_value' => 0,
                'label' => $this->l('Use smart cache for CSS'),
                'level' => 'danger'
            ),
            array(
                'key' => 'PS_JS_THEME_CACHE',
                'bad_value' => 0,
                'label' => $this->l('Use smart cache for JS'),
                'level' => 'danger'
            )
        );

        if (version_compare(_PS_VERSION_, '1.7', '<')) {
            $configurations_to_check[] = array(
                'key' => 'PS_HTML_THEME_COMPRESSION',
                'bad_value' => 0,
                'label' => $this->l('Activate HTML minify'),
                'level' => 'danger'
            );
            $configurations_to_check[] = array(
                'key' => 'PS_JS_HTML_THEME_COMPRESSION',
                'bad_value' => 0,
                'label' => $this->l('Activate inline compression for JavaScript in HTML'),
                'level' => 'warning'
            );
            $configurations_to_check[] = array(
                'key' => 'PS_HTACCESS_CACHE_CONTROL',
                'bad_value' => 0,
                'label' => $this->l('Active apache optimization'),
                'level' => 'danger'
            );
            $configurations_to_check[] = array(
                'key' => 'PS_JS_DEFER',
                'bad_value' => 0,
                'label' => $this->l('Active move JavaScript to the end'),
                'level' => 'danger'
            );
        }

        $bad_configurations = array();
        foreach ($configurations_to_check as $configuration_to_check) {
            $value = Configuration::get($configuration_to_check['key']);
            if ($value == $configuration_to_check['bad_value']) {
                $bad_configurations[] = $configuration_to_check;
            }
        }

        $is_combination_active = (int)Configuration::get('PS_COMBINATION_FEATURE_ACTIVE');
        if ($is_combination_active && !Combination::isCurrentlyUsed()) {
            $bad_configurations[] = array(
                'label' => $this->l('Disable combinations'),
                'level' => 'danger'
            );
        }

        $is_feature_active = (int)Configuration::get('PS_FEATURE_FEATURE_ACTIVE');
        if ($is_feature_active && !$this->testHaveFeature()) {
            $bad_configurations[] = array(
                'label' => $this->l('Disable features'),
                'level' => 'danger'
            );
        }

        $is_customer_group_active = (int)Configuration::get('PS_CUSTOMER_GROUP_ACTIVE');
        if ($is_customer_group_active && !Group::isCurrentlyUsed()) {
            $bad_configurations[] = array(
                'label' => $this->l('Disable customer groups'),
                'level' => 'danger'
            );
        }

        $is_cdn_active =
            Configuration::get('PS_MEDIA_SERVER_1') ||
            Configuration::get('PS_MEDIA_SERVER_2') ||
            Configuration::get('PS_MEDIA_SERVER_3');

        if (!$is_cdn_active) {
            $bad_configurations[] = array(
                'label' => $this->l('Use media server'),
                'level' => 'warning'
            );
        }

        if (!_PS_CACHE_ENABLED_) {
            $bad_configurations[] = array(
                'label' => $this->l('Use cache server'),
                'level' => 'danger'
            );
        }

        $hosting_vars = array();
        if (!defined('_PS_HOST_MODE_')) {
            $hosting_vars = array(
                'version' => array(
                    'php' => phpversion(),
                    'server' => $_SERVER['SERVER_SOFTWARE'],
                    'memory_limit' => ini_get('memory_limit'),
                    'max_execution_time' => ini_get('max_execution_time')
                ),
                'database' => array(
                    'version' => Db::getInstance()->getVersion(),
                    'server' => _DB_SERVER_,
                    'name' => _DB_NAME_,
                    'user' => _DB_USER_,
                    'prefix' => _DB_PREFIX_,
                    'engine' => _MYSQL_ENGINE_,
                ),
                'uname' => function_exists('php_uname') ? php_uname('s').' '.php_uname('v').' '.php_uname('m') : '',
                'apache_instaweb' => Tools::apacheModExists('mod_instaweb')
            );
        }

        $this->context->smarty->assign(array(
            'performances' => $bad_configurations,
            'hosting_vars' => $hosting_vars,
            'performances_link' => $this->context->link->getAdminLink('AdminPerformance'),
            'current_index' => self::$current_index.'&tab_module='.$this->tab,
            'base_url' => $this->context->shop->getBaseURL(true)
        ));

        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP) {
             $this->context->smarty->assign('need_to_select_shop', true);
        }

        if (self::fileExistsCache($this->local_path.'cache/pagespeed-'.(int)$this->context->shop->id.'.html')) {
            $this->context->smarty->assign(
                'pagespeed_result',
                Tools::file_get_contents($this->local_path.'cache/pagespeed-'.(int)$this->context->shop->id.'.html')
            );
        }

        $this->list_items[] = array(
            'icon' => 'icon-tachometer',
            'label' => $this->l('Performances'),
            'id_form' => 'getPerformancesForm',
        );

        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/performances.tpl');
    }

    public function renderModuleLogs()
    {
        if (self::fileExistsCache($this->ps_log_path.'modules_logs.txt')) {
            $logs = file($this->ps_log_path.'modules_logs.txt');
            if (count($logs)) {
                $this->list_items[] = array(
                    'icon' => 'icon-puzzle-piece',
                    'label' => $this->l('Modules slow logs'),
                    'id_form' => 'getModulesSlowLogsForm',
                );

                $this->context->smarty->assign(array(
                    'logs' => $logs,
                    'current_index' => self::$current_index,
                ));
                return $this->context->smarty->fetch($this->local_path.'views/templates/admin/modules.tpl');
            }
        }
    }

    public function renderExceptionLogs()
    {
        $files = glob($this->ps_log_path.'*_exception.log');
        if (!$files || !count($files)) {
            return;
        }

        $all_logs = array();
        foreach ($files as $file) {
            if (self::fileExistsCache($file)) {
                $handle = self::createOrReadFile($file, 'r');
                $contents = fread($handle, filesize($file));
                $logs = explode('*ERROR*', $contents);
                if (count($logs)) {
                    foreach ($logs as $log) {
                        $all_logs[] = $log;
                    }
                }
                fclose($handle);
            }
        }

        if (!count($all_logs)) {
            return;
        }

        $this->list_items[] = array(
            'icon' => 'icon-file-code-o',
            'label' => $this->l('Prestashop exceptions logs'),
            'id_form' => 'getPrestashopExceptionsLogsForm',
        );

        $this->context->smarty->assign(array(
            'logs' => $all_logs,
            'current_index' => self::$current_index,
        ));
        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/exceptions.tpl');
    }

    public function renderOthersLogs()
    {
        $files = glob($this->ps_log_path.'*{php,mysql,optimclean}*.{csv,txt,log}', GLOB_BRACE);
        if (!count($files)) {
            return;
        }

        $all_logs = array();
        foreach ($files as $file) {
            if (self::fileExistsCache($file)) {
                $logs = file($file);
                if (count($logs)) {
                    $all_logs[basename($file)] = array();
                    foreach ($logs as $log) {
                        $all_logs[basename($file)][] = $log;
                    }
                }
            }
        }
        if (!count($all_logs)) {
            return;
        }

         $this->list_items[] = array(
            'icon' => 'icon-file-code-o',
            'label' => $this->l('Others logs'),
            'id_form' => 'getOthersLogsForm',
        );

        $this->context->smarty->assign(array(
            'logs' => $all_logs,
            'current_index' => self::$current_index,
        ));
        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/logs.tpl');
    }

    public function renderStats()
    {

        $this->list_items[] = array(
            'icon' => 'icon-database',
            'label' => $this->l('Database informations'),
            'id_form' => 'getDatabaseInformationsForm',
        );

        $overall_tables = array();
        $total_size = $total_free_space = 0;


        foreach (self::getAllTables() as $table_infos) {
            $total_size += $table_infos['size'];
            $total_free_space += $table_infos['free_space'];
            if ($table_infos['size'] >= 10000000 || $table_infos['free_space'] > 0) {
                $overall_tables[] = $table_infos;
            }
        }

        $this->context->smarty->assign(array(
            'tables' => self::getAllTables(),
            'total_size' => self::formatFileSize($total_size),
            'total_free_space' => self::formatFileSize($total_free_space),
            'overall_tables' =>$overall_tables,
            'current_index' =>  self::$current_index.'&optimclean_tab=getDatabaseInformationsForm',
            'rollbacks' => $this->getAvailablesRollbacks('dumps', 'getDatabaseInformationsForm'),
        ));

        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/tables.tpl');
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    public function renderForm($used_form = 'getTransfertShopForm')
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $used_form;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->submit_action = 'submit'.$used_form;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='
            .$this->name.'&optimclean_tab='.$used_form.'_form';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'allowEmployeeFormLang' => $this->context->cookie->id_lang,
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->{$used_form}()));
    }

    /**
     * Create the structure of your form.
     */
    public function getTransfertShopForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-exchange',
            'label' => $this->l('Shop transfer'),
            'id_form' => 'getTransfertShopForm_form',
        );

        return array(
              'form' => array(
                'legend' => array(
                    'title' => $this->l('Shop transfer'),
                    'icon' => 'icon-exchange',
                ),
                'description' => $this->l('This transfer transfers all data from a source store (A) to a target (B), which is vital if you wish to delete a store. No backup file is created when this operation is carried out, so please ensure that you take a complete copy of your database beforehand.'),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Transfert shop'),
                        'name' => 'shop_from',
                        'id' => 'shop_from',
                        'is_bool' => true,
                        'desc' => $this->l('Please select shop from'),
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a shop')),
                            'query' => Shop::getShops(false),
                            'id' => 'id_shop',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('To'),
                        'name' => 'shop_to',
                        'is_bool' => true,
                        'desc' => $this->l('Please select shop to'),
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a shop')),
                            'query' => Shop::getShops(false),
                            'id' => 'id_shop',
                            'name' => 'name'
                        )
                    ),
                ),
                'submit' => array(
                    'icon' => 'icon-exchange',
                    'class' => 'btn btn-default pull-right display-confirmation',
                    'title' => $this->l('Transfert shop'),
                ),
            ),
        );
    }

    public function getLimitField($field_name = null)
    {
        return array(
            'type' => 'select',
            'label' => $this->l('Limit to'),
            'name' => $field_name ? $field_name : 'use_limit',
            'is_bool' => true,
            'desc' => $this->l('Useful to avoid a server timeout'),
            'options' => array(
                'default' => array('value' => '', 'label' => $this->l('No limitation')),
                'query' => array(
                    array(
                        'value' => 200,
                        'label' => '200 '.$this->l('rows')
                    ),
                    array(
                        'value' => 400,
                        'label' => '400 '.$this->l('rows')
                    ),
                    array(
                        'value' => 600,
                        'label' => '600 '.$this->l('rows')
                    ),
                    array(
                        'value' => 800,
                        'label' => '800 '.$this->l('rows')
                    ),
                    array(
                        'value' => 1000,
                        'label' => '1000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 2000,
                        'label' => '2000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 3000,
                        'label' => '3000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 4000,
                        'label' => '4000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 5000,
                        'label' => '5000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 6000,
                        'label' => '6000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 7000,
                        'label' => '7000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 8000,
                        'label' => '8000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 9000,
                        'label' => '9000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 10000,
                        'label' => '10000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 25000,
                        'label' => '25 000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 50000,
                        'label' => '50 000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 75000,
                        'label' => '75 000 '.$this->l('rows')
                    ),
                    array(
                        'value' => 100000,
                        'label' => '100 000 '.$this->l('rows')
                    ),
                ),
                'id' => 'value',
                'name' => 'label'
            )
        );
    }

    public function getCustomersForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-user-times',
            'label' => $this->l('Delete old customers'),
            'id_form' => 'getCustomersForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete old customers'),
                    'icon' => 'icon-user-times',
                ),
                 'description' => $this->getTableInformations(array(
                    'customer',
                    'customer_group',
                    'customer_message',
                    'customer_message_sync_imap',
                    'customer_thread'
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete customers with last order older than'),
                        'name' => 'date_remove_customers_with_order',
                        'id' => 'date_remove_customers_with_order',
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete customers with no order older than'),
                        'name' => 'date_remove_customers_without_order',
                        'id' => 'date_remove_customers_without_order',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('customers', 'getCustomersForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-user-times',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete old customers'),
                ),
            ),
        );
    }

    public function getOrdersForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-credit-card',
            'label' => $this->l('Delete old orders'),
            'id_form' => 'getOrdersForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete old orders'),
                    'icon' => 'icon-credit-card',
                ),
                'description' => $this->getTableInformations(array(
                    'orders',
                    'order_carrier',
                    'order_cart_rule',
                    'order_history',
                    'order_detail',
                    'order_detail_tax',
                    'order_invoice',
                    'order_invoice_payment',
                    'order_invoice_tax',
                    'order_payment',
                    'order_return',
                    'order_return_detail',
                    'order_slip',
                    'order_slip_detail'
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete orders older than'),
                        'name' => 'date_remove_orders',
                        'id' => 'date_remove_orders',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('orders', 'getOrdersForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-credit-card',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete old orders'),
                ),
            ),
        );
    }

    public function getAttributesForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-book',
            'label' => $this->l('Delete useless attributes'),
            'id_form' => 'getAttributesForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete useless attributes'),
                    'icon' => 'icon-book',
                ),
                'description' => $this->getTableInformations(array(
                    'attribute',
                    'attribute_lang',
                    'attribute_shop'
                )),
                'input' => array(
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('attributes', 'getAttributesForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-book',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete useless attributes'),
                ),
            ),
        );
    }


    public function getCartRulesForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-ticket',
            'label' => $this->l('Delete unusable cart rules'),
            'id_form' => 'getCartRulesForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete unusable cart rules'),
                    'icon' => 'icon-ticket',
                ),
                'description' => $this->getTableInformations(array(
                    'cart_rule',
                    'cart_rule_lang',
                    'cart_rule_shop',
                    'cart_cart_rule',
                    'cart_rule_carrier',
                    'cart_rule_combination',
                    'cart_rule_country',
                    'cart_rule_group',
                    'cart_rule_product_rule_group'
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete cart rules for more than'),
                        'name' => 'date_remove_cart_rules',
                        'id' => 'date_remove_cart_rules',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('cartrules', 'getCartRulesForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-ticket',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete unusable cart rules'),
                ),
            ),
        );
    }

    public function getSpecificsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-money',
            'label' => $this->l('Delete unusable specific prices'),
            'id_form' => 'getSpecificsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete unusable specific prices'),
                    'icon' => 'icon-money',
                ),
                'description' => $this->getTableInformations(array(
                    'specific_price',
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete specific prices for more than'),
                        'name' => 'date_remove_specifics',
                        'id' => 'date_remove_specifics',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('specifics', 'getSpecificsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-money',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete unusable specific prices'),
                ),
            ),
        );
    }


    public function getCartsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-shopping-cart',
            'label' => $this->l('Delete carts without order'),
            'id_form' => 'getCartsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete carts without order'),
                    'icon' => 'icon-shopping-cart',
                ),
                'description' => $this->getTableInformations(array(
                    'cart',
                    'cart_product',
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete carts without order older than'),
                        'name' => 'date_remove_carts',
                        'id' => 'date_remove_carts',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('carts', 'getCartsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-shopping-cart',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete carts without order'),
                ),
            ),
        );
    }

    public function getConnectionsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-cogs',
            'label' => $this->l('Delete connections informations'),
            'id_form' => 'getConnectionsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete connections informations'),
                    'icon' => 'icon-cogs',
                ),
                'description' => $this->getTableInformations(array(
                    'connections',
                    'connections_page',
                    'connections_source'
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete connections informations older than'),
                        'name' => 'date_remove_connections',
                        'id' => 'date_remove_connections',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('connections', 'getConnectionsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-cogs',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete connections informations'),
                ),
            ),
        );
    }

    public function getLostJoinsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-unlink',
            'label' => $this->l('Delete orphaned datas'),
            'id_form' => 'getLostJoinsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete orphaned datas'),
                    'icon' => 'icon-unlink',
                ),
                'description' => $this->l('This procedure searches your entire database to find and delete all orphaned data (remnants from deletions or due to other causes) as well as duplicates'),
                'input' => array(
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('joins', 'getLostJoinsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-unlink',
                    'class' => 'btn btn-default pull-right display-confirmation',
                    'title' => $this->l('Delete orphaned datas'),
                ),
            ),
        );
    }

    public function getLogsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-file-text-o',
            'label' => $this->l('Delete logs'),
            'id_form' => 'getLogsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete logs'),
                    'icon' => 'icon-file-text-o',
                ),
                'description' => $this->getTableInformations(array(
                    'log'
                )),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete logs older than'),
                        'name' => 'date_remove_logs',
                        'id' => 'date_remove_logs',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('logs', 'getLogsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-file-text-o',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete logs'),
                ),
            ),
        );
    }

    public function getGuestsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-user-secret',
            'label' => $this->l('Delete guests'),
            'id_form' => 'getGuestsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete guests'),
                    'icon' => 'icon-user-secret',
                ),
                'description' => $this->getTableInformations(array('guest')),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Select guest type to delete'),
                        'name' => 'guest_type',
                        'id' => 'guest_type',
                        'is_bool' => true,
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a type')),
                            'query' => array(
                                array(
                                    'id' => 'all',
                                    'name' => $this->l('All guests'),
                                ),
                                array(
                                    'id' => 'no_customer',
                                    'name' => $this->l('Only guests unrelated to a customer'),
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('guests', 'getGuestsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-user-secret',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete guests'),
                ),
            ),
        );
    }

    public function getSavForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-comments',
            'label' => $this->l('Delete SAV'),
            'id_form' => 'getSavForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete SAV'),
                    'icon' => 'icon-comments',
                ),
                'description' => $this->getTableInformations(array('customer_thread', 'customer_message')),
                'input' => array(
                     array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete threads older than'),
                        'name' => 'date_remove_sav',
                        'id' => 'date_remove_sav',
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Select sav type to delete'),
                        'name' => 'sav_type',
                        'id' => 'sav_type',
                        'is_bool' => true,
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a type')),
                            'query' => array(
                                array(
                                    'id' => 'all',
                                    'name' => $this->l('All threads'),
                                ),
                                array(
                                    'id' => 'no_order',
                                    'name' => $this->l('Only threads not linked to an order'),
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Select sav state to delete'),
                        'name' => 'sav_state',
                        'id' => 'sav_state',
                        'is_bool' => true,
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a state')),
                            'query' => array(
                                array(
                                    'id' => 'all',
                                    'name' => $this->l('All states'),
                                ),
                                array(
                                    'id' => 'open',
                                    'name' => $this->l('Open'),
                                ),
                                array(
                                    'id' => 'closed',
                                    'name' => $this->l('Closed'),
                                ),
                                array(
                                    'id' => 'pending1',
                                    'name' => $this->l('Pending 1'),
                                ),
                                array(
                                    'id' => 'pending2',
                                    'name' => $this->l('Pending 2'),
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('sav', 'getSavForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-comments',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete SAV'),
                ),
            ),
        );
    }

    public function getNotFoundsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-remove',
            'label' => $this->l('Delete pages not founds'),
            'id_form' => 'getNotFoundsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Delete pages not founds'),
                    'icon' => 'icon-remove',
                ),
                'description' => $this->getTableInformations(array('pagenotfound')),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'datetime' : 'date',
                        'label' => $this->l('Delete pages not founds older than'),
                        'name' => 'date_remove_notfounds',
                        'id' => 'date_remove_notfounds',
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('notfounds', 'getNotFoundsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-remove',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Delete pages not founds'),
                ),
            ),
        );
    }

    public function getImgsForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-picture-o',
            'label' => $this->l('Clean images'),
            'id_form' => 'getImgsForm_form',
        );

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Clean images'),
                    'icon' => 'icon-picture-o',
                ),
                'description' =>
                    $this->l('For optimal results, consider cleaning the orphaned datas before this task')/*.
                    '<br/>'.
                    $this->getFolderInformations(_PS_ROOT_DIR_.'/img/')*/,
                'input' => array(
                     array(
                        'type' => 'select',
                        'label' => $this->l('Select image type to delete'),
                        'name' => 'image_type',
                        'id' => 'image_type',
                        'options' => array(
                            'default' => array('value' => '', 'label' => $this->l('Select a type')),
                            'query' => array(
                                array(
                                    'id' => 'all',
                                    'name' => $this->l('All types'),
                                ),
                                array(
                                    'id' => 'products',
                                    'name' => $this->l('Only products images'),
                                ),
                                array(
                                    'id' => 'categories',
                                    'name' => $this->l('Only categories images'),
                                ),
                                array(
                                    'id' => 'manufacturers',
                                    'name' => $this->l('Only manufacturers images'),
                                ),
                                array(
                                    'id' => 'suppliers',
                                    'name' => $this->l('Only suppliers images'),
                                ),
                                array(
                                    'id' => 'scenes',
                                    'name' => $this->l('Only scenes images'),
                                ),
                                array(
                                    'id' => 'stores',
                                    'name' => $this->l('Only stores images'),
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    $this->getLimitField(),
                    array(
                        'type' => 'html',
                        'name' => 'rollbacks',
                        'col' => 12,
                        'html_content' => $this->getAvailablesRollbacks('imgs', 'getImgsForm_form')
                    )
                ),
                'submit' => array(
                    'icon' => 'icon-picture-o',
                    'class' => 'btn btn-default pull-right display-confirmation use-ajax',
                    'title' => $this->l('Clean images'),
                ),
            ),
        );
    }

    public function getCronForm()
    {
        $this->list_items[] = array(
            'icon' => 'icon-clock-o',
            'label' => $this->l('Cron job'),
            'id_form' => 'getCronForm_form',
        );

        $cron_secure_key = Configuration::get('OCCRON_SECURE_KEY');

        $url_cron = $this->context->shop->getBaseURL().'modules/'.$this->name.'/cron.php?secure_key='.$cron_secure_key;
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Cron job'),
                    'icon' => 'icon-clock-o',
                ),
                'description' => sprintf(
                    $this->l('Unlike operations performed via the interface, cron jobs cannot use AJAX. Accordingly, there is a high probability that the process will fail due to a time out. To avoid this, don’t hesitate to split the cron by using dedicated URLs and setting limits. Use this url in order to install cron : %s'),
                    $url_cron
                ),
                'input' => array(
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete old customers'),
                        'name' => 'OCCRON_CUSTOMERS',
                        'desc' => sprintf($this->l('Use this url in order to isolate this task : %s'), $url_cron.'&task_alone=customers'),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_CUSTOMERS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_CUSTOMERS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete customers with last order older than'),
                        'name' => 'OCCRON_CUSTOMERS_ORDER_MONTHS',
                        'id' => 'OCCRON_CUSTOMERS_ORDER_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete customers with no order older than'),
                        'name' => 'OCCRON_CUSTOMERS_NOORDER_MONTHS',
                        'id' => 'OCCRON_CUSTOMERS_NOORDER_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete old orders'),
                        'name' => 'OCCRON_ORDERS',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=orders'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_ORDERS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_ORDERS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete orders older than'),
                        'name' => 'OCCRON_ORDERS_MONTHS',
                        'id' => 'OCCRON_ORDERS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete unavailable cart rules'),
                        'name' => 'OCCRON_CART_RULES',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=cartrules'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_CART_RULES_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_CART_RULES_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete cart rules older than'),
                        'name' => 'OCCRON_CART_RULES_MONTHS',
                        'id' => 'OCCRON_CART_RULES_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete useless specifics prices'),
                        'name' => 'OCCRON_SPECIFICS',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=specifics'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_SPECIFICS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_SPECIFICS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete specifics prices older than'),
                        'name' => 'OCCRON_SPECIFICS_MONTHS',
                        'id' => 'OCCRON_SPECIFICS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete unused carts'),
                        'name' => 'OCCRON_CARTS',
                        'required' => true,
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=carts'
                        ),
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_CARTS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_CARTS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete carts without order older than'),
                        'name' => 'OCCRON_CARTS_MONTHS',
                        'id' => 'OCCRON_CARTS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete logs'),
                        'name' => 'OCCRON_LOGS',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=logs'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_LOGS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_LOGS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete logs older than'),
                        'name' => 'OCCRON_LOGS_MONTHS',
                        'id' => 'OCCRON_LOGS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete connections informations'),
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=connections'
                        ),
                        'name' => 'OCCRON_CONNECTIONS',
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_CONNECTIONS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_CONNECTIONS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete connections informations older than'),
                        'name' => 'OCCRON_CONNECTIONS_MONTHS',
                        'id' => 'OCCRON_CONNECTIONS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete guests'),
                        'name' => 'OCCRON_GUESTS',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=guests'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_GUESTS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_GUESTS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Select guest type to delete'),
                        'name' => 'OCCRON_GUESTS_TYPE',
                        'id' => 'OCCRON_GUESTS_TYPE',
                        'is_bool' => true,
                        'options' => array(
                            'query' => array(
                                array(
                                    'id' => 'all',
                                    'name' => $this->l('All guests'),
                                ),
                                array(
                                    'id' => 'no_customer',
                                    'name' => $this->l('Only guests unrelated to a customer'),
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => version_compare(_PS_VERSION_, '1.6.0', '>=') ? 'switch' : 'radio',
                        'class' => 't',
                        'label' => $this->l('Delete pages not founds'),
                        'name' => 'OCCRON_NOTFOUNDS',
                        'desc' => sprintf(
                            $this->l('Use this url in order to isolate this task : %s'),
                            $url_cron.'&task_alone=notfounds'
                        ),
                        'required' => true,
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'OCCRON_NOTFOUNDS_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'OCCRON_NOTFOUNDS_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Delete pages not founds older than'),
                        'name' => 'OCCRON_NOTFOUNDS_MONTHS',
                        'id' => 'OCCRON_NOTFOUNDS_MONTHS',
                        'col' => 2,
                        'suffix' => $this->l('months')
                    ),


                    $this->getLimitField('OCCRON_USE_LIMIT'),
                ),
                'submit' => array(
                    'icon' => 'icon-clock-o',
                    'class' => 'btn btn-default pull-right',
                    'title' => $this->l('Save cron params'),
                ),
            ),
        );
    }


    /**
     * Set values for the inputs.
     */
    public function getConfigFormValues()
    {
        $ctime = date("Y-m-d", time());
        $default_date_date_remove_carts = date('Y-m-d H:i:s', strtotime($ctime . " -1 year"));
        $default_date_date_remove_orders = date('Y-m-d H:i:s', strtotime($ctime . " -2 year"));
        $default_date_remove_customers_with_order = date('Y-m-d H:i:s', strtotime($ctime . " -3 year"));
        $default_date_remove_customers_without_order = date('Y-m-d H:i:s', strtotime($ctime . " -1 year"));
        $default_date_remove_connections = date('Y-m-d H:i:s', strtotime($ctime . " -3 month"));
        $default_date_remove_logs = date('Y-m-d H:i:s', strtotime($ctime . " -1 month"));
        $default_date_remove_notfounds = date('Y-m-d H:i:s', strtotime($ctime . " -3 month"));
        $default_date_remove_sav = date('Y-m-d H:i:s', strtotime($ctime . " -3 month"));
        $default_date_specifics = date('Y-m-d H:i:s', strtotime($ctime . " -1 month"));
        $default_date_cart_rules = date('Y-m-d H:i:s', strtotime($ctime . " -1 month"));

        return array(
            'shop_from' => Tools::getValue('shop_from'),
            'shop_to' => Tools::getValue('shop_to'),
            'date_remove_customers_with_order' => Tools::getValue(
                'date_remove_customers_with_order',
                $default_date_remove_customers_with_order
            ),
            'date_remove_customers_without_order' => Tools::getValue(
                'date_remove_customers_without_order',
                $default_date_remove_customers_without_order
            ),
            'date_remove_carts' => Tools::getValue('date_remove_carts', $default_date_date_remove_carts),
            'date_remove_orders' => Tools::getValue('date_remove_orders', $default_date_date_remove_orders),
            'date_remove_connections' => Tools::getValue('date_remove_connections', $default_date_remove_connections),
            'date_remove_logs' => Tools::getValue('date_remove_logs', $default_date_remove_logs),
            'date_remove_notfounds' => Tools::getValue('date_remove_notfounds', $default_date_remove_notfounds),
            'date_remove_sav' => Tools::getValue('date_remove_sav', $default_date_remove_sav),
            'date_remove_specifics' => Tools::getValue('date_remove_specifics', $default_date_specifics),
            'date_remove_cart_rules' => Tools::getValue('date_remove_cart_rules', $default_date_cart_rules),
            'guest_type' => Tools::getValue('guest_type', ''),
            'image_type' => Tools::getValue('image_type', ''),
            'sav_type' => Tools::getValue('sav_type', ''),
            'sav_state' => Tools::getValue('sav_state', ''),
            'use_limit' => '',
            'OCCRON_CUSTOMERS' => Configuration::get('OCCRON_CUSTOMERS'),
            'OCCRON_CUSTOMERS_ORDER_MONTHS' => Configuration::get('OCCRON_CUSTOMERS_ORDER_MONTHS'),
            'OCCRON_CUSTOMERS_NOORDER_MONTHS' => Configuration::get('OCCRON_CUSTOMERS_NOORDER_MONTHS'),
            'OCCRON_ORDERS' => Configuration::get('OCCRON_ORDERS'),
            'OCCRON_ORDERS_MONTHS' => Configuration::get('OCCRON_ORDERS_MONTHS'),
            'OCCRON_CART_RULES' => Configuration::get('OCCRON_CART_RULES'),
            'OCCRON_CART_RULES_MONTHS' => Configuration::get('OCCRON_CART_RULES_MONTHS'),
            'OCCRON_SPECIFICS' => Configuration::get('OCCRON_SPECIFICS'),
            'OCCRON_SPECIFICS_MONTHS' => Configuration::get('OCCRON_SPECIFICS'),
            'OCCRON_CARTS' => Configuration::get('OCCRON_CARTS'),
            'OCCRON_CARTS_MONTHS' => Configuration::get('OCCRON_CARTS_MONTHS'),
            'OCCRON_CONNECTIONS' => Configuration::get('OCCRON_CONNECTIONS'),
            'OCCRON_CONNECTIONS_MONTHS' => Configuration::get('OCCRON_CONNECTIONS_MONTHS'),
            'OCCRON_LOGS' => Configuration::get('OCCRON_LOGS'),
            'OCCRON_LOGS_MONTHS' => Configuration::get('OCCRON_LOGS_MONTHS'),
            'OCCRON_NOTFOUNDS' => Configuration::get('OCCRON_NOTFOUNDS'),
            'OCCRON_NOTFOUNDS_MONTHS' => Configuration::get('OCCRON_NOTFOUNDS_MONTHS'),
            'OCCRON_GUESTS' => Configuration::get('OCCRON_GUESTS'),
            'OCCRON_GUESTS_TYPE' => Configuration::get('OCCRON_GUESTS_TYPE'),
            'OCCRON_USE_LIMIT' => Configuration::get('OCCRON_USE_LIMIT', 1000),
        );
    }

    public function getAvailablesRollbacks($rollback_type, $optimclean_tab)
    {
        if (!array_key_exists($rollback_type, $this->rollbacks_paths)) {
            return '';
        }

        $rollback_path = $this->rollbacks_paths[$rollback_type];
        $rollbacks_files = glob($rollback_path.'*.{sql,zip}', GLOB_BRACE);
        if (!is_array($rollbacks_files) || !count($rollbacks_files)) {
            return '';
        }
        $rollbacks = array();
        foreach (array_reverse($rollbacks_files) as $rollback_file) {
            $rollbacks[] = array(
              'name' => basename($rollback_file),
              'date' => Tools::displayDate(date("Y-m-d H:i:s", filemtime($rollback_file)), null, true),
              'size' => self::formatFileSize(filesize($rollback_file))
            );
        }

        $this->context->smarty->assign(array(
            'rollbacks' => $rollbacks,
            'rollback_type' => $rollback_type,
            'current_index' => self::$current_index.'&optimclean_tab='.$optimclean_tab,
        ));
        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/rollbacks.tpl');
    }

    public function getRollbacksInTemp()
    {
        return self::scanFolder($this->backup_tmp_path, '*.{jpg,png,gif,sql}');
    }

    public function isEmptyTemp()
    {
        $files = self::scanFolder($this->backup_tmp_path, '*.{jpg,png,gif,sql}');
        return count($files) == 0;
    }

    public function cleanRollbacksinTemp()
    {
        return Tools::deleteDirectory($this->backup_tmp_path, false);
    }

    public function postProcessOptimize($table_name = 'all')
    {
        if ($table_name == 'all') {
            $all_tables = array();
            foreach (self::getAllTables() as $table) {
                $this->confirmations[] = sprintf(
                    $this->l('Cheking %s table : free space = %s'),
                    $table['name'],
                    self::formatFileSize((float)$table['free_space'])
                );
                if ((float)$table['free_space']>0) {
                    $all_tables[] = $table['name'];
                }
            }
            if (!count($all_tables)) {
                 $this->confirmations[] = $this->l('No table to optimize, nothing happens !');
                 return;
            }
            $table_name = implode('`,`', $all_tables);
        }

        $rs_tables_optimize = self::execute('OPTIMIZE TABLE `'.pSQL($table_name).'`');
        if (!$rs_tables_optimize) {
            $this->errors[] = $this->l('An error occurred during table(s) optimization');
        } else {
            $this->confirmations[] = $this->l('Table(s) optimization done');
        }
    }

    public function postProcessDefragment($table_name = 'all')
    {
        $all_tables = array();
        if ($table_name == 'all') {
            $all_tables = self::getAllTables();
        } else {
            foreach (self::getAllTables() as $table) {
                if ($table['name'] == $table_name) {
                    $all_tables[] = $table;
                    break;
                }
            }
        }

        if (!count($all_tables)) {
            $this->errors[] = sprintf($this->l('Table %s not founded for defragmentation'), $table_name);
            return;
        }

        foreach ($all_tables as $table) {
            $rs_table_defragmentation = self::execute(
                'ALTER TABLE `'.pSQL($table['name']).'` ENGINE = '.pSQL($table['engine'])
            );
            if (!$rs_table_defragmentation) {
                $this->errors[] = sprintf(
                    $this->l('An error occurred during table %s defragmentation'),
                    $table['name']
                );
            } else {
                $this->confirmations[] = sprintf($this->l('Table %s defragmentation done'), $table['name']);
            }
        }

        $this->confirmations[] = $this->l('Done with success');
    }

    public function postProcessTransfertShop($id_shop_from, $id_shop_to)
    {
        // Customers Traitment
        $customers = Db::getInstance()->executeS(
            'SELECT * FROM '._DB_PREFIX_.'customer C
            WHERE C.id_shop = '.(int)$id_shop_from
        );
        $customers_to_transfert = $customers_to_copy = array();

        $this->confirmations[] = $this->l('Treatment of customers');
        foreach ($customers as $customer) {
            $id_customer_from = (int)$customer['id_customer'];
            $id_customer_to = Db::getInstance()->getValue(
                'SELECT id_customer FROM '._DB_PREFIX_.'customer C
                WHERE C.email="'.pSQL($customer['email']).'" AND C.id_shop = '.(int)$id_shop_to
            );

            if ($id_customer_to) {
                $customers_to_copy[] = $id_customer_from;

                Db::getInstance()->execute(
                    'UPDATE '._DB_PREFIX_.'address SET id_customer = '.(int)$id_customer_to.'
                    WHERE id_customer = '.(int)$id_customer_from
                );
                Db::getInstance()->execute(
                    'UPDATE '._DB_PREFIX_.'cart SET id_customer = '.(int)$id_customer_to.'
                    WHERE id_customer = '.(int)$id_customer_from
                );
                Db::getInstance()->execute(
                    'UPDATE '._DB_PREFIX_.'cart_rule SET id_customer = '.(int)$id_customer_to.'
                    WHERE id_customer = '.(int)$id_customer_from
                );
                Db::getInstance()->execute(
                    'UPDATE '._DB_PREFIX_.'customer_thread SET id_customer = '.(int)$id_customer_to.'
                    WHERE id_customer = '.(int)$id_customer_from
                );
                Db::getInstance()->execute(
                    'UPDATE '._DB_PREFIX_.'orders SET id_customer = '.(int)$id_customer_to.'
                    WHERE id_customer = '.(int)$id_customer_from
                );

                $customer = new Customer($id_customer_from);
                if (!$customer->delete()) {
                    $this->errors[] = sprintf(
                        $this->l('An error occurred during customer #%d deletion'),
                        $id_customer_from
                    );
                }
            } else {
                $customers_to_transfert[] = $id_customer_from;
            }
        }

        if (count($customers_to_copy)) {
            $this->confirmations[] = $this->l(
                'Total number of customers history transferred : '.
                count($customers_to_copy)
            );
        }

        if (count($customers_to_transfert)) {
            Db::getInstance()->execute(
                'UPDATE '._DB_PREFIX_.'customer SET id_shop = '.$id_shop_to.'
                WHERE id_customer IN('.$this->implodeArrayOfIds($customers_to_transfert).')'
            );
            $this->confirmations[] = $this->l(
                'Total number of customers transferred : '.
                count($customers_to_transfert)
            );
        } else {
            $this->confirmations[] = $this->l('No customer to transfert');
        }

        // Carts Traitment
        $this->confirmations[] = $this->l('Treatment of carts');
        $carts = Db::getInstance()->executeS('SELECT id_cart FROM '._DB_PREFIX_.'cart WHERE id_shop = '.(int)$id_shop_from);
        $carts_to_transfert = array();
        foreach ($carts as $cart) {
            $id_cart_from = (int)$cart['id_cart'];
            $carts_to_transfert[] = $id_cart_from;
        }

        if (count($carts_to_transfert)) {
            Db::getInstance()->execute(
                'UPDATE '._DB_PREFIX_.'cart SET id_shop = '.$id_shop_to.'
                WHERE id_cart IN('.$this->implodeArrayOfIds($carts_to_transfert).')'
            );
            $this->confirmations[] = $this->l('Total number of carts transferred : '.count($carts_to_transfert));
        } else {
            $this->confirmations[] = $this->l('No cart to transfert');
        }

        // Orders Traitment
        $this->confirmations[] = $this->l('Treatment of orders');
        $orders = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'orders WHERE id_shop = '.(int)$id_shop_from);
        $orders_to_transfert = array();
        foreach ($orders as $order) {
            $id_order_from = (int)$order['id_order'];
            $orders_to_transfert[] = $id_order_from;
        }

        if (count($orders_to_transfert)) {
            Db::getInstance()->execute(
                'UPDATE '._DB_PREFIX_.'orders SET id_shop = '.(int)$id_shop_to.'
                WHERE id_order IN('.pSQL(implode(',', $orders_to_transfert)).')'
            );
            $this->confirmations[] = $this->l('Total number of orders transferred : '.count($orders_to_transfert));
        } else {
            $this->confirmations[] = $this->l('No order to transfert');
        }
        return true;
    }


    public function postProcessCustomers(
        $date_remove_customers_with_order,
        $date_remove_customers_without_order,
        $use_limit = null
    ) {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
                $this->l('Search for customers without order with a creation date lower than %s, or with order with a creation date lower than %s'),
                Tools::displayDate($date_remove_customers_without_order),
                Tools::displayDate($date_remove_customers_with_order)
            );

        $customers_to_delete = self::executeS(
            'SELECT id_customer, id_order, customer_date_add, order_date_add FROM(
                SELECT C.id_customer, O.id_order, C.date_add as customer_date_add, O.date_add AS order_date_add
                FROM '._DB_PREFIX_.'customer C
                LEFT JOIN '._DB_PREFIX_.'orders O ON (C.id_customer=O.id_customer)
                GROUP BY C.id_customer
                ORDER BY C.id_customer, O.date_add DESC
            ) t
                WHERE (id_order IS NULL AND customer_date_add < "'.pSQL($date_remove_customers_without_order).'" )
                OR (id_order IS NOT NULL AND order_date_add < "'.pSQL($date_remove_customers_with_order).'" ) '
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_customers = array();
        foreach ($customers_to_delete as $customer_to_delete) {
            $id_customers[] = (int)$customer_to_delete['id_customer'];
        }

        if (!count($id_customers)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_customers);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d customers to remove'), count($id_customers));
            return;
        }

        $id_customers_sql = $this->implodeArrayOfIds($id_customers);

        $this->confirmations[] = $this->l('Search orders related to these customers in orders table');
        /* Select orders from customers */
        $orders_to_delete = self::executeS(
            'SELECT id_order, id_cart, reference FROM '._DB_PREFIX_.'orders
            WHERE id_customer IN ('.$id_customers_sql.')'
        );

        $params = array();
        $orders_params = array();
        $orders_params['id_orders'] = array();
        $params['id_carts'] = array();
        $orders_params['reference_orders'] = array();
        foreach ($orders_to_delete as $order_to_delete) {
            $orders_params['id_orders'][] = (int)$order_to_delete['id_order'];
            $params['id_carts'][] = (int)$order_to_delete['id_cart'];
            $orders_params['reference_orders'][] = $order_to_delete['reference'];
        }

        /* Select cart from customers */
        $this->confirmations[] = $this->l('Search carts related to these customers in cart table');
        $carts_to_delete = Db::getInstance()->executeS(
            'SELECT id_cart FROM '._DB_PREFIX_.'cart WHERE id_customer IN ('.$id_customers_sql.')'
        );
        foreach ($carts_to_delete as $cart_to_delete) {
            $params['id_carts'][] = (int)$cart_to_delete['id_cart'];
        }

        /* Select cart rules for customers */
        $this->confirmations[] = $this->l('Search cart rules related to these customers in cart_rule table');
        $cart_rules_to_delete = Db::getInstance()->executeS(
            'SELECT id_cart_rule FROM '._DB_PREFIX_.'cart_rule WHERE id_customer IN ('.$id_customers_sql.')'
        );
        $params['id_cart_rules'] = array();
        foreach ($cart_rules_to_delete as $cart_rule_to_delete) {
            $params['id_cart_rules'][] = (int)$cart_rule_to_delete['id_cart_rules'];
        }

        /* Select threads for customers */
        $this->confirmations[] = $this->l('Search threads related to these customers in customer_thread table');
        $threads_to_delete = Db::getInstance()->executeS(
            'SELECT id_customer_thread FROM '._DB_PREFIX_.'customer_thread WHERE id_customer IN ('.$id_customers_sql.')'
        );
        $params['id_threads'] = array();
        foreach ($threads_to_delete as $thread_to_delete) {
            $params['id_threads'][] = (int)$thread_to_delete['id_customer_thread'];
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'customers'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing customers %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_customers),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d customers%s'),
                '<strong>',
                count($id_customers),
                '</strong>'
            );
        }

        if (count($orders_params['id_orders'])) {
            $this->confirmations[] = $this->l('Delete orders related to these customers');
            $this->postProcessOrders('0000-00-00 00:00:00', null, $orders_params, true);
        }

        if (count($params['id_carts'])) {
            $this->confirmations[] = $this->l('Delete carts related to these customers');
            $this->postProcessCarts('0000-00-00 00:00:00', null, $params['id_carts'], true);
        }

        if (count($params['id_cart_rules'])) {
            $this->confirmations[] = $this->l('Delete cart rules related to these customers');
            $this->postProcessCartRules(null, $params['id_cart_rules'], true);
        }

        $this->confirmations[] = $this->l('Delete addresses related to these customers in address table');
        $this->deleteFromTable('address', 'id_customer', $id_customers_sql);
        $this->confirmations[] = $this->l('Delete groups links related to these customers in customer_group table');
        $this->deleteFromTable('customer_group', 'id_customer', $id_customers_sql);
        $this->confirmations[] = $this->l('Delete messages related to these customers in message table');
        $this->deleteFromTable('message', 'id_customer', $id_customers_sql);
        $this->confirmations[] = $this->l('Delete specifics prices related to these customers in specific_price table');
        $this->deleteFromTable('specific_price', 'id_customer', $id_customers_sql);
        $this->confirmations[] = $this->l('Delete compares related to these customers in compare table');
        $this->deleteFromTable('compare', 'id_customer', $id_customers_sql);

        if (count($params['id_threads'])) {
            $this->confirmations[] = $this->l('Delete threads related to these customers in customer_thread and customer_message tables');
            $id_treads_sql = $this->implodeArrayOfIds($params['id_threads']);
            $this->deleteFromTable('customer_thread', 'id_customer_thread', $id_treads_sql);
            $this->deleteFromTable('customer_message', 'id_customer_thread', $id_treads_sql);
        }

        $this->confirmations[] = $this->l('Delete customers in customer table');
        $this->deleteFromTable('customer', 'id_customer', $id_customers_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_customers);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('customers')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessCartRules($date_remove_cart_rules, $use_limit = null, $id_cart_rules = array(), $skip_rollback = false)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        if (!count($id_cart_rules)) {

            $this->confirmations[] = sprintf(
                $this->l('Search for cart_rules with a date to lower than %s, inactive or without quantity left'),
                Tools::displayDate($date_remove_cart_rules)
            );

            $cart_rules_to_delete = self::executeS(
                'SELECT cr.id_cart_rule FROM '._DB_PREFIX_.'cart_rule cr
                LEFT JOIN '._DB_PREFIX_.'order_cart_rule ocr ON (cr.id_cart_rule = ocr.id_cart_rule)
                WHERE ocr.id_order IS NULL
                AND ( (cr.date_to < NOW() AND cr.date_to !="0000-00-00 00:00:00" AND cr.date_to <="'.pSQL($date_remove_cart_rules).'" ) OR quantity = 0 OR active = 0 )'
                .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
            );
            foreach ($cart_rules_to_delete as $cart_rule_to_delete) {
                $id_cart_rules[] = (int)$cart_rule_to_delete['id_cart_rule'];
            }
        }

        if (!count($id_cart_rules)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_cart_rules);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d cart rules to remove'), count($id_cart_rules));
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'cartrules'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing cart rules %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_cart_rules),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d cart rules%s'),
                '<strong>',
                count($id_cart_rules),
                '</strong>'
            );
        }

        $id_cart_rules_sql = $this->implodeArrayOfIds($id_cart_rules);

        $this->confirmations[] = $this->l('Delete cart rules in cart related to these cart rules in cart_cart_rule table');
        $this->deleteFromTable('cart_cart_rule', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete carrier rules related to these cart rules in cart_rule_carrier table');
        $this->deleteFromTable('cart_rule_carrier', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete cart rule combinations  related to these cart rules in cart_rule_combination table');
        $this->specificDeleteFromTable(
            'cart_rule_combination',
            'id_cart_rule_1 IN ('.$id_cart_rules_sql.') OR id_cart_rule_2 IN ('.$id_cart_rules_sql.')'
        );

        $this->confirmations[] = $this->l('Delete country rules related to these cart rules in cart_rule_country table');
        $this->deleteFromTable('cart_rule_country', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete group rules related to these cart rules in cart_rule_group table');
        $this->deleteFromTable('cart_rule_group', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete product rules related to these cart rules in cart_rule_product_rule_group table');
        $this->deleteFromTable('cart_rule_product_rule_group', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete shop rules related to these cart rules in cart_rule_shop table');
        $this->deleteFromTable('cart_rule_shop', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete cart rules in cart_rule table');
        $this->deleteFromTable('cart_rule', 'id_cart_rule', $id_cart_rules_sql);
        $this->confirmations[] = $this->l('Delete lang datas in cart_rule_lang table');
        $this->deleteFromTable('cart_rule_lang', 'id_cart_rule', $id_cart_rules_sql);

        if ($skip_rollback) {
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_cart_rules);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('cartrules')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessSpecifics($date_remove_specifics, $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
            $this->l('Search for specifics prices with a date to lower than %s'),
            Tools::displayDate($date_remove_specifics)
        );

        $specifics_prices_to_delete = self::executeS(
            'SELECT id_specific_price FROM '._DB_PREFIX_.'specific_price
            WHERE id_specific_price_rule = 0
            AND ( `from` != `to`  AND `to` !="0000-00-00 00:00:00" AND `to` < NOW() AND `to` <="'.pSQL($date_remove_specifics).'")'
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_specifics_prices = array();
        foreach ($specifics_prices_to_delete as $specific_price_to_delete) {
            $id_specifics_prices[] = (int)$specific_price_to_delete['id_specific_price'];
        }

        if (!count($id_specifics_prices)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_specifics_prices);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf(
                $this->l('Founded %d specifics prices to remove'),
                count($id_specifics_prices)
            );
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'specifics'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing specifics prices %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_specifics_prices),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d specifics prices%s'),
                '<strong>',
                count($id_specifics_prices),
                '</strong>'
            );
        }

        $id_specifics_prices_sql = $this->implodeArrayOfIds($id_specifics_prices);

        $this->confirmations[] = $this->l('Delete specifics prices in specific_price table');
        $this->deleteFromTable('specific_price', 'id_specific_price', $id_specifics_prices_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_specifics_prices);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('specifics')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');

        return true;
    }

    public function postProcessOrders($date_remove_orders, $use_limit = null, $params = array(), $skip_rollback = false)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        if (!isset($params['id_orders']) || !count($params['id_orders'])) {
            $this->confirmations[] = sprintf(
                $this->l('Search for orders with a creation date lower than %s'),
                Tools::displayDate($date_remove_orders)
            );

            $orders_to_delete = self::executeS(
                'SELECT * FROM '._DB_PREFIX_.'orders o
                WHERE o.date_add < "'.pSQL($date_remove_orders).'"'
                .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
            );
            $id_orders = array();
            $id_carts = array();
            $reference_orders = array();
            foreach ($orders_to_delete as $order_to_delete) {
                $id_orders[] = (int)$order_to_delete['id_order'];
                $id_carts[] = (int)$order_to_delete['id_cart'];
                $reference_orders[] = $order_to_delete['reference'];
            }
        } else {
            $id_orders = $params['id_orders'];
            $reference_orders = $params['reference_orders'];
            $id_carts = array();
        }

        if (!count($id_orders)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_orders);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d orders to remove'), count($id_orders));
            return;
        }

        $id_orders_sql = $this->implodeArrayOfIds($id_orders);

       $this->confirmations[] = $this->l('Search order details related to these orders in order_detail table');
        /* Select orders details */
        $orders_details = self::executeS(
            'SELECT id_order_detail FROM '._DB_PREFIX_.'order_detail WHERE id_order IN ('.$id_orders_sql.')'
        );
        $params['id_orders_details'] = array();
        foreach ($orders_details as $order_detail) {
            $params['id_orders_details'][] = (int)$order_detail['id_order_detail'];
        }

        /* Select orders invoices */
       $this->confirmations[] = $this->l('Search order invoices related to these orders in order_invoice table');
        $orders_invoices = self::executeS(
            'SELECT id_order_invoice FROM '._DB_PREFIX_.'order_invoice WHERE id_order IN ('.$id_orders_sql.')'
        );
        $params['id_orders_invoices'] = array();
        foreach ($orders_invoices as $order_invoice) {
            $params['id_orders_invoices'][] = (int)$order_invoice['id_order_invoice'];
        }

        /* Select orders return */
       $this->confirmations[] = $this->l('Search order returns related to these orders in order_return table');
        $orders_returns = Db::getInstance()->executeS(
            'SELECT id_order_return FROM '._DB_PREFIX_.'order_return WHERE id_order IN ('.$id_orders_sql.')'
        );
        $params['id_orders_returns'] = array();
        foreach ($orders_returns as $order_return) {
            $params['id_orders_returns'][] = (int)$order_return['id_order_return'];
        }

        /* Select orders slips */
       $this->confirmations[] = $this->l('Search order slips related to these orders in order_slip table');
        $orders_slips = Db::getInstance()->executeS(
            'SELECT id_order_slip FROM '._DB_PREFIX_.'order_slip WHERE id_order IN ('.$id_orders_sql.')'
        );
        $params['id_orders_slips'] = array();
        foreach ($orders_slips as $order_slip) {
            $params['id_orders_slips'][] = (int)$order_slip['id_order_slip'];
        }

        /* Select orders messages */
       $this->confirmations[] = $this->l('Search order messages related to these orders in message table');
        $orders_messages = Db::getInstance()->executeS(
            'SELECT id_message FROM '._DB_PREFIX_.'message WHERE id_order IN ('.$id_orders_sql.')'
        );
        $params['id_orders_messages'] = array();
        foreach ($orders_messages as $order_message) {
            $params['id_orders_messages'][] = (int)$order_message['id_message'];
        }

        $params['reference_orders'] = $reference_orders;

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'orders'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing orders %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_orders),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d orders%s'),
                '<strong>',
                count($id_orders),
                '</strong>'
            );
        }

        if (count($id_carts)) {
            $this->confirmations[] = $this->l('Delete carts related to these orders');
            $this->postProcessCarts('0000-00-00 00:00:00', null, $id_carts, true);
        }

        $this->confirmations[] = $this->l('Delete order carriers links related to these orders in order_carrier table');
        $this->deleteFromTable('order_carrier', 'id_order', $id_orders_sql);
        $this->confirmations[] = $this->l('Delete order cart rules related to these orders in order_cart_rule table');
        $this->deleteFromTable('order_cart_rule', 'id_order', $id_orders_sql);
        $this->confirmations[] = $this->l('Delete histories related to these orders in order_history table');
        $this->deleteFromTable('order_history', 'id_order', $id_orders_sql);
        $this->confirmations[] = $this->l('Delete details related to these orders in order_detail table');
        $this->deleteFromTable('order_detail', 'id_order', $id_orders_sql);

        if (count($params['id_orders_details'])) {
            $params['id_orders_details'] = $this->implodeArrayOfIds($params['id_orders_details']);
            $this->confirmations[] = $this->l('Delete taxes details related to these orders in order_detail_tax table');
            $this->deleteFromTable('order_detail_tax', 'id_order_detail', $params['id_orders_details']);
        }

        if (count($params['id_orders_invoices'])) {
            $params['id_orders_invoices'] = $this->implodeArrayOfIds($params['id_orders_invoices']);
            $this->confirmations[] = $this->l('Delete invoices related to these orders in order_invoice table');
            $this->deleteFromTable('order_invoice', 'id_order_invoice', $params['id_orders_invoices']);
            $this->confirmations[] = $this->l('Delete invoices payments related to these orders in order_invoice_payment table');
            $this->deleteFromTable('order_invoice_payment', 'id_order_invoice', $params['id_orders_invoices']);
            $this->confirmations[] = $this->l('Delete taxes invoices related to these orders in order_invoice_tax table');
            $this->deleteFromTable('order_invoice_tax', 'id_order_invoice', $params['id_orders_invoices']);
        }

        $this->confirmations[] = $this->l('Delete payments to these orders in order_payment table');
        $this->specificDeleteFromTable(
            'order_payment',
            'order_reference IN ("'.implode('","', $reference_orders).'")'
        );

        $this->confirmations[] = $this->l('Delete returns related to these orders in order_return table');
        $this->deleteFromTable('order_return', 'id_order', $id_orders_sql);
        if (count($params['id_orders_returns'])) {
            $this->confirmations[] = $this->l('Delete returns details related to these orders in order_return_detail table');
            $params['id_orders_returns'] = $this->implodeArrayOfIds($params['id_orders_returns']);
            $this->deleteFromTable('order_return_detail', 'id_order_return', $params['id_orders_returns']);
        }

        $this->confirmations[] = $this->l('Delete slips related to these orders in order_slip table');
        $this->deleteFromTable('order_slip', 'id_order', $id_orders_sql);
        if (count($params['id_orders_slips'])) {
            $this->confirmations[] = $this->l('Delete slips details related to these orders in order_slip_detail table');
            $params['id_orders_slips'] = $this->implodeArrayOfIds($params['id_orders_slips']);
            $this->deleteFromTable('order_slip_detail', 'id_order_slip', $params['id_orders_slips']);
        }

        $this->confirmations[] = $this->l('Delete messages related to these orders in message table');
        $this->deleteFromTable('message', 'id_order', $id_orders_sql);
        if (count($params['id_orders_messages'])) {
            $params['id_orders_messages'] = $this->implodeArrayOfIds($params['id_orders_messages']);
            $this->deleteFromTable('message_readed', 'id_message', $params['id_orders_messages']);
        }

        $this->confirmations[] = $this->l('Delete orders in orders table');
        $this->deleteFromTable('orders', 'id_order', $id_orders_sql);

        if ($skip_rollback) {
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_orders);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('orders')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessCarts($date_remove_carts, $use_limit = null, $id_carts = array(), $skip_rollback = false)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        if (!count($id_carts)) {
            $this->confirmations[] = sprintf(
                $this->l('Search for unordered carts with a creation date lower than %s'),
                Tools::displayDate($date_remove_carts)
            );

            $id_carts_to_keep = array();
            $ins_pm_subscription = Module::getInstanceByName('pm_subscription');
            if (Validate::isLoadedObject($ins_pm_subscription) && $ins_pm_subscription->active) {
                $carts_to_keep = self::executeS(
                    'SELECT DISTINCT(id_cart) FROM '._DB_PREFIX_.'pm_subscription_carts
                        UNION
                        SELECT DISTINCT(id_cart) FROM '._DB_PREFIX_.'pm_subscription_subscribers'
                );
                foreach ($carts_to_keep as $cart_to_keep) {
                    $id_carts_to_keep[] = (int)$cart_to_keep['id_cart'];
                }
                $id_carts_to_keep = array_unique($id_carts_to_keep);
            }


            $carts_to_delete = self::executeS(
                'SELECT c.id_cart FROM '._DB_PREFIX_.'cart c
                LEFT JOIN '._DB_PREFIX_.'orders o ON (c.id_cart=o.id_cart)
                WHERE o.id_cart IS NULL AND c.date_add < "'.pSQL($date_remove_carts).'"'
                .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
            );
            foreach ($carts_to_delete as $cart_to_delete) {
                if (!in_array($cart_to_delete['id_cart'], $id_carts_to_keep)) {
                    $id_carts[] = (int)$cart_to_delete['id_cart'];
                }
            }
        }

        if (!count($id_carts)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_carts);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d carts to remove'), count($id_carts));
            return;
        }

        $id_carts_sql = $this->implodeArrayOfIds($id_carts);
        $this->l('Search for customizations related to these carts');
        $customizations_to_delete = self::executeS(
            'SELECT id_customization FROM '._DB_PREFIX_.'customization
            WHERE id_cart IN('.$id_carts_sql.')'
        );

        $id_customizations = array();
        foreach ($customizations_to_delete as $customization_to_delete) {
            $id_customizations[] = (int)$customization_to_delete['id_customization'];
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'carts'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing carts %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_carts),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d carts%s'),
                '<strong>',
                count($id_carts),
                '</strong>'
            );
        }

        $this->confirmations[] = $this->l('Delete products related to these carts in cart_product table');
        $this->deleteFromTable('cart_product', 'id_cart', $id_carts_sql);
        $this->confirmations[] = $this->l('Delete products related to these carts in cart_cart_rule table');
        $this->deleteFromTable('cart_cart_rule', 'id_cart', $id_carts_sql);
        $this->confirmations[] = $this->l('Delete customizations related to these carts in customization table');
        $this->deleteFromTable('customization', 'id_cart', $id_carts_sql);

        if (count($id_customizations)) {
            $id_customizations = $this->implodeArrayOfIds($id_customizations);
            $this->l('Delete customizations datas related to these carts in customized_data table');
            $this->deleteFromTable('customized_data', 'id_customization', $id_customizations);
        }

        $this->l('Delete carts in cart table');
        $this->deleteFromTable('cart', 'id_cart', $id_carts_sql);

        if ($skip_rollback) {
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_carts);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('carts')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');

        return true;
    }

    public function postProcessConnections($date_remove_connections, $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
            $this->l('Search for connections with a creation date lower than %s'),
            Tools::displayDate($date_remove_connections)
        );

        $connections = self::executeS(
            'SELECT c.id_connections FROM '._DB_PREFIX_.'connections c
            WHERE c.date_add < "'.pSQL($date_remove_connections).'"'
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_connections = array();
        foreach ($connections as $connection) {
            $id_connections[] = (int)$connection['id_connections'];
        }

        if (!count($id_connections)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_connections);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf(
                $this->l('Founded %d connections informations to remove'),
                count($id_connections)
            );
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'connections'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing connections informations %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_connections),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d connections informations%'),
                '<strong>',
                count($id_connections),
                '</strong>'
            );
        }
        $id_connections_sql = $this->implodeArrayOfIds($id_connections);

        $this->confirmations[] = $this->l('Delete pages connections related to theses connections in connections_page table');
        $this->deleteFromTable('connections_page', 'id_connections', $id_connections_sql);
        $this->confirmations[] = $this->l('Delete sources connections related to theses connections in connections_source table');
        $this->deleteFromTable('connections_source', 'id_connections', $id_connections_sql);
        $this->confirmations[] = $this->l('Delete connections in connections table');
        $this->deleteFromTable('connections', 'id_connections', $id_connections_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_connections);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('connections')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }


        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessLostJoins()
    {

        $something_happens = false;
        $this->confirmations[] = $this->l('Search for duplicate data in configurations');
        // Remove doubles in the configuration
        $filtered_configuration = $id_configurations = array();
        $configurations = self::executeS('SELECT * FROM '._DB_PREFIX_.'configuration');
        foreach ($configurations as $configuration) {
            $key = $configuration['id_shop_group'].'-|-'.$configuration['id_shop'].'-|-'.$configuration['name'];
            if (in_array($key, $filtered_configuration)) {
                $id_configurations[] = $configuration['id_configuration'];
            } else {
                $filtered_configuration[] = $key;
            }
        }

        if (count($id_configurations)) {
            $something_happens = true;
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d configurations%s'),
                '<strong>',
                count($id_configurations),
                '</strong>'
            );
            $id_configurations = $this->implodeArrayOfIds($id_configurations);
            $this->deleteFromTable('configuration', 'id_configuration', $id_configurations);
        } else {
            $this->confirmations[] = $this->l('No duplicate data founded');
        }

        $queries = array(
            array('access', 'id_profile', 'profile', 'id_profile'),
            array('access', 'id_tab', 'tab', 'id_tab'),
            array('accessory', 'id_product_1', 'product', 'id_product'),
            array('accessory', 'id_product_2', 'product', 'id_product'),
            array('address_format', 'id_country', 'country', 'id_country'),
            array('attribute', 'id_attribute_group', 'attribute_group', 'id_attribute_group'),
            array('carrier_group', 'id_carrier', 'carrier', 'id_carrier'),
            array('carrier_group', 'id_group', 'group', 'id_group'),
            array('carrier_zone', 'id_carrier', 'carrier', 'id_carrier'),
            array('carrier_zone', 'id_zone', 'zone', 'id_zone'),
            array('cart_cart_rule', 'id_cart', 'cart', 'id_cart'),
            array('cart_product', 'id_cart', 'cart', 'id_cart'),
            array('cart_rule_carrier', 'id_cart_rule', 'cart_rule', 'id_cart_rule'),
            array('cart_rule_carrier', 'id_carrier', 'carrier', 'id_carrier'),
            array('cart_rule_combination', 'id_cart_rule_1', 'cart_rule', 'id_cart_rule'),
            array('cart_rule_combination', 'id_cart_rule_2', 'cart_rule', 'id_cart_rule'),
            array('cart_rule_country', 'id_cart_rule', 'cart_rule', 'id_cart_rule'),
            array('cart_rule_country', 'id_country', 'country', 'id_country'),
            array('cart_rule_group', 'id_cart_rule', 'cart_rule', 'id_cart_rule'),
            array('cart_rule_group', 'id_group', 'group', 'id_group'),
            array('cart_rule_product_rule_group', 'id_cart_rule', 'cart_rule', 'id_cart_rule'),
            array(
                'cart_rule_product_rule',
                'id_product_rule_group',
                'cart_rule_product_rule_group',
                'id_product_rule_group'
            ),
            array('cart_rule_product_rule_value', 'id_product_rule', 'cart_rule_product_rule', 'id_product_rule'),
            array('category_group', 'id_category', 'category', 'id_category'),
            array('category_group', 'id_group', 'group', 'id_group'),
            array('category_product', 'id_category', 'category', 'id_category'),
            array('category_product', 'id_product', 'product', 'id_product'),
            array('cms', 'id_cms_category', 'cms_category', 'id_cms_category'),
            array('cms_block', 'id_cms_category', 'cms_category', 'id_cms_category', 'blockcms'),
            array('cms_block_page', 'id_cms', 'cms', 'id_cms', 'blockcms'),
            array('cms_block_page', 'id_cms_block', 'cms_block', 'id_cms_block', 'blockcms'),
            array('compare', 'id_customer', 'customer', 'id_customer'),
            array('compare_product', 'id_compare', 'compare', 'id_compare'),
            array('compare_product', 'id_product', 'product', 'id_product'),
            array('connections', 'id_shop_group', 'shop_group', 'id_shop_group'),
            array('connections', 'id_shop', 'shop', 'id_shop'),
            array('connections_page', 'id_connections', 'connections', 'id_connections'),
            array('connections_page', 'id_page', 'page', 'id_page'),
            array('connections_source', 'id_connections', 'connections', 'id_connections'),
            array('customer', 'id_shop_group', 'shop_group', 'id_shop_group'),
            array('customer', 'id_shop', 'shop', 'id_shop'),
            array('customer_group', 'id_group', 'group', 'id_group'),
            array('customer_group', 'id_customer', 'customer', 'id_customer'),
            array('customer_message', 'id_customer_thread', 'customer_thread', 'id_customer_thread'),
            array('customer_thread', 'id_shop', 'shop', 'id_shop'),
            array('customization', 'id_cart', 'cart', 'id_cart'),
            array('customization_field', 'id_product', 'product', 'id_product'),
            array('customized_data', 'id_customization', 'customization', 'id_customization'),
            array('delivery', 'id_shop', 'shop', 'id_shop'),
            array('delivery', 'id_shop_group', 'shop_group', 'id_shop_group'),
            array('delivery', 'id_carrier', 'carrier', 'id_carrier'),
            array('delivery', 'id_zone', 'zone', 'id_zone'),
            array('editorial', 'id_shop', 'shop', 'id_shop', 'editorial'),
            array('favorite_product', 'id_product', 'product', 'id_product','favoriteproducts'),
            array('favorite_product', 'id_customer', 'customer', 'id_customer','favoriteproducts'),
            array('favorite_product', 'id_shop', 'shop', 'id_shop','favoriteproducts'),
            array('feature_product', 'id_feature', 'feature', 'id_feature'),
            array('feature_product', 'id_product', 'product', 'id_product'),
            array('feature_value', 'id_feature', 'feature', 'id_feature'),
            array('group_reduction', 'id_group', 'group', 'id_group'),
            array('group_reduction', 'id_category', 'category', 'id_category'),
            array('homeslider', 'id_shop', 'shop', 'id_shop', 'homeslider'),
            array('homeslider', 'id_homeslider_slides', 'homeslider_slides', 'id_homeslider_slides', 'homeslider'),
            array('hook_module', 'id_hook', 'hook', 'id_hook'),
            array('hook_module', 'id_module', 'module', 'id_module'),
            array('hook_module_exceptions', 'id_hook', 'hook', 'id_hook'),
            array('hook_module_exceptions', 'id_module', 'module', 'id_module'),
            array('hook_module_exceptions', 'id_shop', 'shop', 'id_shop'),
            array('image', 'id_product', 'product', 'id_product'),
            array('message', 'id_cart', 'cart', 'id_cart'),
            array('message_readed', 'id_message', 'message', 'id_message'),
            array('message_readed', 'id_employee', 'employee', 'id_employee'),
            array('module_access', 'id_profile', 'profile', 'id_profile'),
            array('module_access', 'id_module', 'module', 'id_module'),
            array('module_country', 'id_module', 'module', 'id_module'),
            array('module_country', 'id_country', 'country', 'id_country'),
            array('module_country', 'id_shop', 'shop', 'id_shop'),
            array('module_currency', 'id_module', 'module', 'id_module'),
            array('module_currency', 'id_currency', 'currency', 'id_currency'),
            array('module_currency', 'id_shop', 'shop', 'id_shop'),
            array('module_group', 'id_module', 'module', 'id_module'),
            array('module_group', 'id_group', 'group', 'id_group'),
            array('module_group', 'id_shop', 'shop', 'id_shop'),
            array('module_preference', 'id_employee', 'employee', 'id_employee'),
            array('orders', 'id_shop', 'shop', 'id_shop'),
            array('orders', 'id_shop_group', 'group_shop', 'id_shop_group'),
            array('order_carrier', 'id_order', 'orders', 'id_order'),
            array('order_cart_rule', 'id_order', 'orders', 'id_order'),
            array('order_detail', 'id_order', 'orders', 'id_order'),
            array('order_detail_tax', 'id_order_detail', 'order_detail', 'id_order_detail'),
            array('order_history', 'id_order', 'orders', 'id_order'),
            array('order_invoice', 'id_order', 'orders', 'id_order'),
            array('order_invoice_payment', 'id_order', 'orders', 'id_order'),
            array('order_invoice_tax', 'id_order_invoice', 'order_invoice', 'id_order_invoice'),
            array('order_return', 'id_order', 'orders', 'id_order'),
            array('order_return_detail', 'id_order_return', 'order_return', 'id_order_return'),
            array('order_slip', 'id_order', 'orders', 'id_order'),
            array('order_slip_detail', 'id_order_slip', 'order_slip', 'id_order_slip'),
            array('pack', 'id_product_pack', 'product', 'id_product'),
            array('pack', 'id_product_item', 'product', 'id_product'),
            array('page', 'id_page_type', 'page_type', 'id_page_type'),
            array('page_viewed', 'id_shop', 'shop', 'id_shop'),
            array('page_viewed', 'id_shop_group', 'shop_group', 'id_shop_group'),
            array('page_viewed', 'id_date_range', 'date_range', 'id_date_range'),
            array('product_attachment', 'id_attachment', 'attachment', 'id_attachment'),
            array('product_attachment', 'id_product', 'product', 'id_product'),
            array('product_attribute', 'id_product', 'product', 'id_product'),
            array('product_attribute_combination', 'id_product_attribute', 'product_attribute', 'id_product_attribute'),
            array('product_attribute_combination', 'id_attribute', 'attribute', 'id_attribute'),
            array('product_attribute_image', 'id_image', 'image', 'id_image'),
            array('product_attribute_image', 'id_product_attribute', 'product_attribute', 'id_product_attribute'),
            array('product_carrier', 'id_product', 'product', 'id_product'),
            array('product_carrier', 'id_shop', 'shop', 'id_shop'),
            array('product_carrier', 'id_carrier_reference', 'carrier', 'id_reference'),
            array('product_country_tax', 'id_product', 'product', 'id_product'),
            array('product_country_tax', 'id_country', 'country', 'id_country'),
            array('product_country_tax', 'id_tax', 'tax', 'id_tax'),
            array('product_download', 'id_product', 'product', 'id_product'),
            array('product_group_reduction_cache', 'id_product', 'product', 'id_product'),
            array('product_group_reduction_cache', 'id_group', 'group', 'id_group'),
            array('product_sale', 'id_product', 'product', 'id_product'),
            array('product_supplier', 'id_product', 'product', 'id_product'),
            array('product_supplier', 'id_supplier', 'supplier', 'id_supplier'),
            array('product_tag', 'id_product', 'product', 'id_product'),
            array('product_tag', 'id_tag', 'tag', 'id_tag'),
            array('range_price', 'id_carrier', 'carrier', 'id_carrier'),
            array('range_weight', 'id_carrier', 'carrier', 'id_carrier'),
            array('referrer_cache', 'id_referrer', 'referrer', 'id_referrer'),
            array('referrer_cache', 'id_connections_source', 'connections_source', 'id_connections_source'),
            array('scene_category', 'id_scene', 'scene', 'id_scene'),
            array('scene_category', 'id_category', 'category', 'id_category'),
            array('scene_products', 'id_scene', 'scene', 'id_scene'),
            array('scene_products', 'id_product', 'product', 'id_product'),
            array('search_index', 'id_product', 'product', 'id_product'),
            array('search_word', 'id_lang', 'lang', 'id_lang'),
            array('search_word', 'id_shop', 'shop', 'id_shop'),
            array('shop_url', 'id_shop', 'shop', 'id_shop'),
            array('specific_price_priority', 'id_product', 'product', 'id_product'),
            array('stock', 'id_warehouse', 'warehouse', 'id_warehouse'),
            array('stock', 'id_product', 'product', 'id_product'),
            array('stock_available', 'id_product', 'product', 'id_product'),
            array('stock_mvt', 'id_stock', 'stock', 'id_stock'),
            array('tab_module_preference', 'id_employee', 'employee', 'id_employee'),
            array('tab_module_preference', 'id_tab', 'tab', 'id_tab'),
            array('tax_rule', 'id_country', 'country', 'id_country'),
            array('theme_specific', 'id_theme', 'theme', 'id_theme'),
            array('theme_specific', 'id_shop', 'shop', 'id_shop'),
            array('warehouse_carrier', 'id_warehouse', 'warehouse', 'id_warehouse'),
            array('warehouse_carrier', 'id_carrier', 'carrier', 'id_carrier'),
            array('warehouse_product_location', 'id_product', 'product', 'id_product'),
            array('warehouse_product_location', 'id_warehouse', 'warehouse', 'id_warehouse'),
        );

        foreach ($queries as $query_array) {
            // If this is a module and the module is not installed, we continue
            if (isset($query_array[4]) && !Module::isInstalled($query_array[4])) {
                continue;
            }

            $ids_to_delete = array();
            $this->confirmations[] = sprintf(
                $this->l('Checking joins of %s of %s table with %s of %s table'),
                $query_array[1],
                $query_array[0],
                $query_array[3],
                $query_array[2]
            );
            $rows_to_delete = self::executeS(
                'SELECT `'.pSQL($query_array[1]).'` FROM `'._DB_PREFIX_.pSQL($query_array[0]).'`
                WHERE `'.pSQL($query_array[1]).'` NOT IN(
                    SELECT `'.pSQL($query_array[3]).'` FROM `'._DB_PREFIX_.pSQL($query_array[2]).'`
                )'
            );

            foreach ($rows_to_delete as $row_to_delete) {
                $ids_to_delete[] = (int)$row_to_delete[$query_array[1]];
            }

            if (count($ids_to_delete)) {
                $something_happens = true;
                $this->confirmations[] = sprintf(
                    $this->l('%sStart of removing %d rows in %s%s'),
                    '<strong>',
                    count($ids_to_delete),
                    _DB_PREFIX_.$query_array[0],
                    '</strong>'
                );
                $ids_to_delete = $this->implodeArrayOfIds($ids_to_delete);
                $this->deleteFromTable($query_array[0], $query_array[1], $ids_to_delete);
            } else {
                $this->confirmations[] = $this->l('All joins are good');
            }
        }

        $this->confirmations[] = $this->l('Searching for lang tables');
        // _lang table cleaning
        $tables_lang = self::executeS(
            'SHOW TABLES LIKE "'._DB_PREFIX_.'%_lang"'
        );

        foreach ($tables_lang as $table_lang_array) {
            $table_lang = current($table_lang_array);
            $table_lang = str_replace(_DB_PREFIX_, '', $table_lang);
            $table = str_replace(array('_lang', _DB_PREFIX_), '', $table_lang);
            $id_table = 'id_'.preg_replace('/^'._DB_PREFIX_.'/', '', $table);


            $field_exists = Db::getInstance()->getRow(
                'SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "'.pSQL(_DB_NAME_).'"
                AND TABLE_NAME = "'._DB_PREFIX_.pSQL($table).'"  AND COLUMN_NAME = "'.pSQL($id_table).'"'
            );

            if (!$field_exists) {
                continue;
            }

            $this->confirmations[] = sprintf(
                $this->l('Checking joins of %s of %s table with %s of %s table'),
                $id_table,
                $table_lang,
                $id_table,
                $table
            );

            $ids_to_delete = array();
            $rows_to_delete = self::executeS(
                'SELECT `'.pSQL($id_table).'` FROM `'._DB_PREFIX_.pSQL($table_lang).'`
                WHERE `'.pSQL($id_table).'` NOT IN(
                    SELECT `'.pSQL($id_table).'` FROM `'._DB_PREFIX_.pSQL($table).'`
                )'
            );

            foreach ($rows_to_delete as $row_to_delete) {
                $ids_to_delete[] = (int)$row_to_delete[$id_table];
            }

            if (count($ids_to_delete)) {
                $something_happens = true;
                $this->confirmations[] = sprintf(
                    $this->l('%sStart of removing %d rows in %s%s'),
                    '<strong>',
                    count($ids_to_delete),
                    $table_lang,
                    '</strong>'
                );
                $ids_to_delete = $this->implodeArrayOfIds($ids_to_delete);
                $this->deleteFromTable($table_lang, $id_table, $ids_to_delete);
            } else {
                $this->confirmations[] = $this->l('All joins are good');
            }

            $this->confirmations[] = sprintf(
                $this->l('Checking joins of %s of %s table with lang table'),
                $id_table,
                $table_lang
            );

            $rows_to_delete = self::executeS(
                'SELECT `id_lang` FROM `'._DB_PREFIX_.pSQL($table_lang).'`
                WHERE `id_lang` NOT IN(SELECT `id_lang` FROM `'._DB_PREFIX_.'lang`)'
            );

            $ids_to_delete = array();
            foreach ($rows_to_delete as $row_to_delete) {
                $ids_to_delete[] = (int)$row_to_delete['id_lang'];
            }

            if (count($ids_to_delete)) {
                $something_happens = true;
                $this->confirmations[] = sprintf(
                    $this->l('%sStart of removing %d rows in %s%s'),
                    '<strong>',
                    count($ids_to_delete),
                    $table_lang,
                    '</strong>'
                );
                $ids_to_delete = array_unique($ids_to_delete);
                $ids_to_delete = $this->implodeArrayOfIds($ids_to_delete);
                $this->deleteFromTable($table_lang, 'id_lang', $ids_to_delete);
            } else {
                $this->confirmations[] = $this->l('All joins are good');
            }
        }

        if (!$something_happens) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ($this->compileRollbackFile('joins')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
            $this->confirmations[] = $this->l('Done with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        return true;
    }

    public function postProcessLogs($date_remove_logs, $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
                $this->l('Search for logs with a creation date lower than %s'),
                Tools::displayDate($date_remove_logs)
            );
        $logs = self::executeS(
            'SELECT id_log FROM '._DB_PREFIX_.'log
            WHERE date_add < "'.pSQL($date_remove_logs).'"'
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_logs = array();
        foreach ($logs as $log) {
            $id_logs[] = (int)$log['id_log'];
        }

        if (!count($id_logs)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_logs);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d logs to remove'), count($id_logs));
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'logs'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing logs %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_logs),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d logs%s'),
                '<strong>',
                count($id_logs),
                '</strong>'
            );
        }
        $id_logs_sql = $this->implodeArrayOfIds($id_logs);

        $this->l('Delete logs in log table');
        $this->deleteFromTable('log', 'id_log', $id_logs_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_logs);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('logs')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessNotFounds($date_remove_notfounds, $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
            $this->l('Search for pages not found with a date to lower than %s'),
            Tools::displayDate($date_remove_notfounds)
        );

        $pagenotfounds = self::executeS(
            'SELECT id_pagenotfound FROM '._DB_PREFIX_.'pagenotfound
            WHERE date_add < "'.pSQL($date_remove_notfounds).'"'
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_pagenotfounds = array();
        foreach ($pagenotfounds as $pagenotfound) {
            $id_pagenotfounds[] = (int)$pagenotfound['id_pagenotfound'];
        }

        if (!count($id_pagenotfounds)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_pagenotfounds);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d pages not founds to remove'), count($id_pagenotfounds));
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'notfounds'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing pages not founds %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_pagenotfounds),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d pages not founds%s'),
                '<strong>',
                count($id_pagenotfounds),
                '</strong>'
            );
        }
        $id_pagenotfounds_sql = $this->implodeArrayOfIds($id_pagenotfounds);

        $this->confirmations[] = $this->l('Delete pages not found in pagenotfound table');
        $this->deleteFromTable('pagenotfound', 'id_pagenotfound', $id_pagenotfounds_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_pagenotfounds);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('notfounds')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }


    public function postProcessGuests($guest_type = 'all', $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        if ($guest_type == 'all') {
            $this->confirmations[] = $this->l('Search for guests');
        } else {
            $this->confirmations[] = $this->l('Search for guests not linked to a customer');
        }

        $guests_to_delete = self::executeS(
            'SELECT id_guest FROM '._DB_PREFIX_.'guest c'
            .($guest_type == 'no_customer' ? ' WHERE id_customer = 0' : '')
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_guests = array();
        foreach ($guests_to_delete as $guest_to_delete) {
            $id_guests[] = (int)$guest_to_delete['id_guest'];
        }

        if (!count($id_guests)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_guests);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d guests to remove'), count($id_guests));
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'guests'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing guests %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_guests),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d guests%s'),
                '<strong>',
                count($id_guests),
                '</strong>'
            );
        }
        $id_guests_sql = $this->implodeArrayOfIds($id_guests);

        $this->l('Delete guests in guest table');
        $this->deleteFromTable('guest', 'id_guest', $id_guests_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_guests);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('guests')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessAttributes($delete_group = false, $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = $this->l('Search for attributes not used in any combination');
        $attributes_to_delete = self::executeS(
            'SELECT c.id_attribute FROM '._DB_PREFIX_.'attribute c
            WHERE c.id_attribute NOT IN(SELECT DISTINCT(id_attribute) FROM '._DB_PREFIX_.'product_attribute_combination)'
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_attributes = array();
        foreach ($attributes_to_delete as $attribute_to_delete) {
            $id_attributes[] = (int)$attribute_to_delete['id_attribute'];
        }

        if (!count($id_attributes)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_attributes);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf($this->l('Founded %d attributes to remove'), count($id_attributes));
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'attributes'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing attributes %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_attributes),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d attributes%s'),
                '<strong>',
                count($id_attributes),
                '</strong>'
            );
        }
        $id_attributes_sql = $this->implodeArrayOfIds($id_attributes);

        $this->confirmations[] = $this->l('Delete attributes in attribute table');
        $this->deleteFromTable('attribute', 'id_attribute', $id_attributes_sql);
        $this->confirmations[] = $this->l('Delete lang datas in attribute_lang table');
        $this->deleteFromTable('attribute_lang', 'id_attribute', $id_attributes_sql);
        $this->confirmations[] = $this->l('Delete shop datas in attribute_shop table');
        $this->deleteFromTable('attribute_shop', 'id_attribute', $id_attributes_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_attributes);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('attributes')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessSav($date_remove_sav, $sav_type = 'all', $sav_state = 'all', $use_limit = null)
    {

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $use_limit = Tools::getValue('init_max_limit');
        }

        $this->confirmations[] = sprintf(
            $this->l('Search for sav with a creation date lower than %s, type %s & state : %s'),
            Tools::displayDate($date_remove_sav),
            $sav_type == 'all' ? $this->l('All threads') : $this->l('Only threads not linked to an order'),
            $sav_state
        );

        $threads = self::executeS(
            'SELECT ct.id_customer_thread FROM '._DB_PREFIX_.'customer_thread ct
            WHERE ct.date_add < "'.pSQL($date_remove_sav).'"'
            .($sav_type == 'no_order' ? ' AND ct.id_order = 0' : '')
            .($sav_state != 'all' ? ' AND ct.status = "'.pSQL($sav_state).'"' : '')
            .($use_limit ? ' LIMIT 0,'.(int)$use_limit : '')
        );

        $id_threads = array();
        foreach ($threads as $thread) {
            $id_threads[] = (int)$thread['id_customer_thread'];
        }

        if (!count($id_threads)) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'getResume') {
            $this->ajax_datas['total'] = (int)count($id_threads);
            $this->ajax_datas['nextStep'] = 'runProcess';
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->confirmations[] = sprintf(
                $this->l('Founded %d sav to remove'),
                count($id_threads)
            );
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            Tools::getValue('action') == 'runProcess' &&
            $this->ajax_datas['process'] == 'sav'
        ) {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing sav %d to %d of %d%s'),
                '<strong>',
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($id_threads),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );
        } else {
            $this->confirmations[] = sprintf(
                $this->l('%sStart of removing %d sav%s'),
                '<strong>',
                count($id_threads),
                '</strong>'
            );
        }
        $id_connections_sql = $this->implodeArrayOfIds($id_threads);

        $this->confirmations[] = $this->l('Delete messages related to sav in customer_message table');
        $this->deleteFromTable('customer_message', 'id_customer_thread', $id_connections_sql);
        $this->confirmations[] = $this->l('Delete threads in customer_thread table');
        $this->deleteFromTable('customer_thread', 'id_customer_thread', $id_connections_sql);

        if ((int)Tools::getValue('ajax') && Tools::getValue('action') == 'runProcess') {
            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($id_threads);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                $this->ajax_datas['nextStep'] = 'compileRollback';
            } else {
                $this->ajax_datas['nextStep'] = 'runProcess';
            }
            return;
        }

        if ($this->compileRollbackFile('sav')) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }


        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessCron()
    {
        foreach (array_keys($this->cron_params) as $name) {
            if (Tools::getIsset($name)) {
                Configuration::updateValue($name, Tools::getValue($name));
            }
        }
    }

    public function postProcessCleanModuleLogFile()
    {
        if (self::fileExistsCache($this->ps_log_path.'modules_logs.txt')) {
            if (($handle = self::createOrReadFile($this->ps_log_path.'modules_logs.txt', 'w'))) {
                fclose($handle);
                $this->confirmations[] = $this->l('Done with success');
            } else {
                $this->errors[] = $this->l('Module logs file is not available, please check permissions');
            }
        } else {
            $this->errors[] = $this->l('Module logs file is not available, please check permissions');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessCleanExceptionLogFile()
    {
        $files = glob($this->ps_log_path.'*_exception.log');
        if (!count($files)) {
            return;
        }

        foreach ($files as $file) {
            if (self::fileExistsCache($file)) {
                if (self::deleteFile($file)) {
                    $this->confirmations[] = $this->l('Deletion with success : '.basename($file));
                } else {
                    $this->errors[] = sprintf(
                        $this->l('Exception logs %s file is not available, please check permissions'),
                        basename($file)
                    );
                }
            } else {
                $this->errors[] = sprintf(
                    $this->l('Exception logs %s file is not available, please check permissions'),
                    basename($file)
                );
            }
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessCleanOthersLogFile()
    {
        $files = glob($this->ps_log_path.'*{php,mysql,optimclean}*.{csv,txt,log}', GLOB_BRACE);
        if (!count($files)) {
            return;
        }

        foreach ($files as $file) {
            if (self::fileExistsCache($file)) {
                if (($handle = self::createOrReadFile($file, 'w'))) {
                    fclose($handle);
                    $this->confirmations[] = sprintf($this->l('Deletion with success : %s'), basename($file));
                } else {
                    $this->errors[] = sprintf(
                        $this->l('Log % file is not available, please check permissions'),
                        basename($file)
                    );
                }
            } else {
                $this->errors[] = sprintf(
                    $this->l('Log % file is not available, please check permissions'),
                    basename($file)
                );
            }
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessRollback()
    {
        $filename = Tools::getValue('rollback');

        if (!array_key_exists(Tools::getValue('type'), $this->rollbacks_paths)) {
            $this->errors[] = $this->l('An error occurred');
            return;
        }

        $rollback_path = $this->rollbacks_paths[Tools::getValue('type')];

        if (!is_file($rollback_path.$filename) || !is_readable($rollback_path.$filename)) {
            $this->errors[] = sprintf(
                $this->l('Rollback %s file is not available, please check permissions'),
                $filename
            );
            return;
        }

        switch (Tools::getValue('action')) {
            case 'rollbackdownload':
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($rollback_path.$filename));
                readfile($rollback_path.$filename);
                exit;
            case 'rollbackrestore':
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                if ($extension == 'sql') {
                    $this->restoreDumpFile($rollback_path.$filename);
                } else {
                    $zip = new ZipArchive();
                    $zip_archive = $zip->open($rollback_path.$filename);
                    if ($zip_archive) {
                        $zip->extractTo($this->backup_tmp_path);
                        self::chmodr($this->backup_tmp_path, 0775);
                        $zip->close();
                        foreach ($this->getRollbacksInTemp() as $rollback_file) {
                            $this->restoreDumpFile($rollback_file);
                            self::deleteFile($rollback_file);
                        }
                    }
                }
                break;
            case 'rollbackdelete':
                if (self::deleteFile($rollback_path.$filename)) {
                    $this->confirmations[] = sprintf($this->l('Deletion with success : %s'), $filename);
                } else {
                    $this->errors[] = sprintf(
                        $this->l('Rollback %s file is not available, please check permissions'),
                        $filename
                    );
                    return;
                }
                break;
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessTempRollback()
    {
        switch (Tools::getValue('action')) {
            case 'rollbackdownload':
                $zip = new ZipArchive();
                $zip_filename = $this->backup_tmp_path.'backup-'.Configuration::get('OC_IN_PROGRESS').'.zip';
                $zip_archive = $zip->open($zip_filename, ZIPARCHIVE::CREATE);
                if ($zip_archive) {
                    $zip_loaded = (isset($zip->filename) && $zip->filename) ? true : false;
                }

                if (!$zip_loaded) {
                    return false;
                }

                foreach ($this->getRollbacksInTemp() as $file_to_backup) {
                    $added_to_zip = $zip->addFile($file_to_backup, basename($file_to_backup));
                    if (!$added_to_zip) {
                        $zip->close();
                        if (self::fileExistsCache($zip_archive)) {
                            self::deleteFile($zip_archive);
                        }
                        return false;
                    }
                }

                $zip->close();

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($zip_filename).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' .$zip_filename);
                readfile($zip_filename);
                exit;
            case 'rollbackrestore':
                foreach ($this->getRollbacksInTemp() as $rollback_file) {
                    $this->restoreDumpFile($rollback_file);
                    self::deleteFile($rollback_file);
                }
                break;
            case 'rollbackdelete':
                if (!$this->cleanRollbacksinTemp()) {
                    $this->errors[] = $this->l('Temp rollback(s) file(s) is not available, please check permissions');
                    return;
                }
                break;
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }


    public function postProcessImgs($image_type = 'all', $use_limit = null)
    {
        $process_array = array(
            'runProcessProduct' => array(
                'folder' => 'p/',
                'image_type' => 'products',
                'object' => $this->l('product'),
                'name' => $this->l('products images'),
                'table' => 'image',
                'primary' => 'id_image'
            ),
            'runProcessCategory' => array(
                'folder' => 'c/',
                'image_type' => 'categories',
                'object' => $this->l('category'),
                'name' => $this->l('categories images'),
                'table' => 'category',
                'primary' => 'id_category'
            ),
            'runProcessManufacturer' => array(
                'folder' => 'm/',
                'image_type' => 'manufacturers',
                'object' => $this->l('manufacturer'),
                'name' => $this->l('manufacturers images'),
                'table' => 'manufacturer',
                'primary' => 'id_manufacturer'
            ),
            'runProcessSupplier' => array(
                'folder' => 'su/',
                'image_type' => 'suppliers',
                'object' => $this->l('supplier'),
                'name' => $this->l('suppliers images'),
                'table' => 'supplier',
                'primary' => 'id_supplier'
            ),
            'runProcessScene' => array(
                'folder' => 'scenes/',
                'image_type' => 'scenes',
                'object' => $this->l('scene'),
                'name' => $this->l('scenes images'),
                'table' => 'scene',
                'primary' => 'id_scene'
            ),
            'runProcessStore' => array(
                'folder' => 'st/',
                'image_type' => 'stores',
                'object' => $this->l('store'),
                'name' => $this->l('stores images'),
                'table' => 'store',
                'primary' => 'id_store'
            ),
        );

        if ((int)Tools::getValue('ajax') && strpos(Tools::getValue('action'), 'getResume') !==false) {
            $next_process = str_replace('getResume', '', Tools::getValue('action'));
            if (!$next_process) {
                $next_process = 'runProcessProduct';
                if ($image_type && $image_type!='all') {
                    foreach ($process_array as $process_name => $process) {
                        if ($process['image_type'] == $image_type) {
                            $next_process = $process_name;
                            break;
                        }
                    }
                }
            }
            $current_process = $process_array[$next_process];
            $files = self::cacheScanFolder(_PS_ROOT_DIR_.'/img/'.$current_process['folder']);
            $this->ajax_datas['total'] = (int)count($files);
            $this->ajax_datas['nextStep'] = $next_process;
            $this->ajax_datas['folder'] = _PS_ROOT_DIR_.'/img/'.$current_process['folder'];
            $this->ajax_datas['backupTime'] = $this->backup_time = date('Y-m-d-H-i-s');
            $this->ajax_datas['ajax_current_limit'] = 0;
            $this->confirmations[] = sprintf(
                $this->l('Founded %d %s to check'),
                $this->ajax_datas['total'],
                $current_process['name']
            );
            return;
        }

        if ((int)Tools::getValue('ajax') &&
            array_key_exists(Tools::getValue('action'), $process_array)
        ) {
            $this->ajax_datas['item_deleted'] = (int)Tools::getValue('item_deleted', 0);
            $current_process = $process_array[Tools::getValue('action')];
            $images_types = ImageType::getImagesTypes($current_process['image_type']);
            $available_images_types = array();
            foreach ($images_types as $type) {
                $available_images_types[] = $type['name'];
            }

            $files_table = self::cacheScanFolder(_PS_ROOT_DIR_.'/img/'.$current_process['folder']);
            $files_table = array_slice($files_table, (int)Tools::getValue('ajax_current_limit'), (int)$use_limit);

            $id_to_keep = array();
            $rows = Db::getInstance()->executeS('SELECT DISTINCT('.pSQL($current_process['primary']).') FROM '._DB_PREFIX_.pSQL($current_process['table']));
            foreach ($rows as $row) {
                $id_to_keep[] = (int)$row[$current_process['primary']];
            }

            foreach ($files_table as $file) {
                if ((int)Tools::getValue('init_max_limit') && $this->ajax_datas['item_deleted'] >= (int)Tools::getValue('init_max_limit')) {
                    break;
                }
                preg_match_all("/(\d*)-?(\d*)-?([a-zA-Z0-9-_]*)?\.jpg|png/", basename($file), $matches, PREG_SET_ORDER);
                $id_object = (int)$matches[0][1] ? (int)$matches[0][1] : (int)$matches[0][2];
                if (!$id_object) {
                    continue;
                }
                $current_image_type = $matches[0][3];
                if (
                    (
                        Configuration::get('WATERMARK_HASH') &&
                        strpos($matches[0][3], Configuration::get('WATERMARK_HASH'))!==false
                    ) ||
                        strpos($matches[0][3], 'watermark')!==false
                ) {
                    $current_image_type = str_replace(
                        array(
                            '-'.Configuration::get('WATERMARK_HASH'),
                            'watermark'
                        ),
                        '',
                        $current_image_type
                    );
                }

                if ($current_process['object'] == 'category' && strpos($matches[0][3], '_thumb')!==false) {
                    $current_image_type = str_replace(
                        '_thumb',
                        '',
                        $current_image_type
                    );
                }


                if (isset($current_image_type) && $current_image_type && !in_array($current_image_type, $available_images_types)) {
                    $this->confirmations[] = sprintf(
                        $this->l('Remove image %s, image type %s do not exists for %s'),
                        '/img/'.$current_process['folder'].basename($file),
                        $current_image_type,
                        $current_process['object']
                    );
                    $this->moveFileInTemp($file);
                    ++$this->ajax_datas['item_deleted'];
                    continue;
                }

                if (!in_array($id_object, $id_to_keep)) {
                    $this->confirmations[] = sprintf(
                        $this->l('Remove image %s, %s with id %d do not exists'),
                        '/img/'.$current_process['folder'].basename($file),
                        $current_process['object'],
                        $id_object
                    );
                    $this->moveFileInTemp($file);
                    ++$this->ajax_datas['item_deleted'];
                }
            }

            $this->confirmations[] = sprintf(
                $this->l('%sChecking %s %d to %d of %d%s'),
                '<strong>',
                $process_array[Tools::getValue('action')]['name'],
                (int)Tools::getValue('ajax_current_limit'),
                (int)Tools::getValue('ajax_current_limit') + count($files_table),
                (int)Tools::getValue('ajax_max_limit'),
                '</strong>'
            );

            if ($this->ajax_datas['item_deleted'] >0) {
                $this->confirmations[] = sprintf(
                    $this->l('%d images removed with success'),
                    $this->ajax_datas['item_deleted']
                );
            }

            if ((int)Tools::getValue('init_max_limit') && $this->ajax_datas['item_deleted'] >= (int)Tools::getValue('init_max_limit')) {
                 self::removeCacheScanFolder(_PS_ROOT_DIR_.'/img/'.$current_process['folder']);
                $this->ajax_datas['nextStep'] = 'compileRollback';
                return;
            }

            $this->ajax_datas['ajax_current_limit'] = (int)Tools::getValue('ajax_current_limit');
            $this->ajax_datas['ajax_current_limit'] += (int)count($files_table);
            if ($this->ajax_datas['ajax_current_limit'] >= (int)Tools::getValue('ajax_max_limit')) {
                 self::removeCacheScanFolder(_PS_ROOT_DIR_.'/img/'.$current_process['folder']);
                 if ($image_type && $image_type != 'all') {
                    $next_process = 'compileRollback';
                 } else {
                    $keys = array_keys($process_array);
                    $next_key = $keys[array_search(Tools::getValue('action'), $keys)+1];
                    $next_process = (!$next_key) ? 'compileRollback' : 'getResume'.$next_key;
                }
                $this->ajax_datas['nextStep'] = $next_process;
            } else {
                $this->ajax_datas['nextStep'] = Tools::getValue('action');
            }
            return;
        }

        if (!(int)$this->ajax_datas['item_deleted']) {
            $this->confirmations[] = $this->l('No data to delete, nothing happens !');
            return;
        }

        if ($this->compileRollbackFile('imgs', $image_type)) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
        return true;
    }

    public function postProcessPageSpeedTest()
    {
        $ch = curl_init();

        switch (Tools::getValue('action')) {
            case 'createPageSpeedTest':
                $url = $this->context->shop->getBaseURL(true).Tools::getValue('page_url');
                if (!Validate::isUrl($url)) {
                    $this->errors[] = sprintf($this->l('%s is not a valid URL'), $url);
                    return;
                }

                $headers = get_headers($url, 1);
                if (strpos($headers[0], '301') !== false && is_array($headers['Location'])) {
                    $url = end($headers['Location']);
                }

                $fields = array(
                    'url' => $url,
                    'waitForResponse' => 'false',
                    'device' => Tools::getValue('device', 'desktop')
                    //'screenshot' => 'true'
                );

                $fields_string = Tools::jsonEncode($fields);
                $ch = curl_init('https://yellowlab.tools/api/runs');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . Tools::strlen($fields_string)
                    )
                );

                if ($result = curl_exec($ch)) {
                    $this->ajax_datas = Tools::jsonDecode($result, true);
                    $this->ajax_datas['nextStep'] = 'checkRunProcess';
                } else {
                }

                break;
            case 'checkRunProcess':
                $result = Tools::file_get_contents('http://yellowlab.tools/api/runs/'.Tools::getValue('runId'));
                if ($result) {
                    $this->ajax_datas = Tools::jsonDecode($result, true);
                    switch ($this->ajax_datas['status']['statusCode']) {
                        case 'awaiting':
                        case 'running':
                            $this->ajax_datas['nextStep'] = 'checkRunProcess';
                            break;
                        case 'complete':
                            $this->ajax_datas['nextStep'] = 'getResults';
                            break;
                    }
                } else {
                }
                break;
            case 'getResults':
                $result = Tools::file_get_contents(
                    'http://yellowlab.tools/api/results/'.Tools::getValue('runId').'?exclude=javascriptExecutionTree'
                );
                if ($result) {
                    $result = Tools::jsonDecode($result, true);
                    foreach ($result['scoreProfiles']['generic']['categories']['pageWeight']['rules'] as $category) {
                        $result['rules'][$category]['value'] = self::formatFileSize(
                            $result['rules'][$category]['value']
                        );
                    }

                    $this->context->smarty->assign(array(
                        'result' => $result,
                        'runId' => Tools::getValue('runId'),
                        'date' => Tools::displayDate(date('Y-m-d H:i:s'), null, true),
                        'module_path' => _PS_MODULE_DIR_.$this->name
                    ));
                    $result = $this->context->smarty->fetch($this->local_path.'views/templates/admin/pagespeed.tpl');
                    $this->writeinCache('pagespeed-'.(int)$this->context->shop->id.'.html', $result);
                    echo $result;
                    exit;
                }


                break;
        }

        curl_close($ch);
    }

    public function restoreDumpFile($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == 'sql') {
            if ($this->backup_engine->import($file)) {
                $this->confirmations[] = sprintf($this->l('Restoration done with success : %s'), basename($file));
            } else {
                $this->errors[] = sprintf($this->l('An error occurred during restoration of %s'), basename($file));
            }
        } else {
            if ($this->restoreFileFromTemp($file)) {
                $this->confirmations[] = sprintf($this->l('Restoration done with success : %s'), basename($file));
            } else {
                $this->errors[] = sprintf($this->l('An error occurred during restoration of %s'), basename($file));
            }
        }
    }

    public function postProcessBackup($table_name = 'all')
    {
        if ($this->backup_time === null) {
            $this->backup_time = date('Y-m-d-H-i-s');
        }

        $filename = $this->backup_tmp_path.'backup-'.$table_name.'-'.$this->backup_time.'.sql';
        $this->backup_engine->setFileName($filename);
        $this->backup_engine->setAddDropTable(true);
        if ($table_name != 'all') {
            $this->backup_engine->setIncludeTables(array($table_name));
        }
        $this->backup_engine->export();

        if ($this->compileRollbackFile('dumps', $table_name)) {
            $this->confirmations[] = $this->l('Rollback file created with success');
        } else {
            $this->errors[] = $this->l('An error occurred during rollback file creation');
        }

        $this->confirmations[] = $this->l('Done with success');
    }

    public function compileRollbackFile($rollbacks_type, $zip_filename = 'auto')
    {
        if ($this->backup_time === null) {
            return false;
        }

        $files_to_backup = $this->getRollbacksInTemp();
        if (!is_array($files_to_backup)) {
            return false;
        }

        $zip_filename_base = $this->rollbacks_paths[$rollbacks_type].'backup-';
        if ($zip_filename == 'auto') {
            $zip_filename = $zip_filename_base.$this->backup_time.'.zip';
        } else {
            $zip_filename = $zip_filename_base.$zip_filename.'-'.$this->backup_time.'.zip';
        }

        $zip_loaded = false;
        $zip = new ZipArchive();
        $zip_archive = $zip->open($zip_filename, ZIPARCHIVE::CREATE);
        if ($zip_archive) {
            $zip_loaded = (isset($zip->filename) && $zip->filename) ? true : false;
        }

        if (!$zip_loaded) {
            return false;
        }

        foreach ($files_to_backup as $file_to_backup) {
            $file_in_zip = str_replace($this->backup_tmp_path, '', $file_to_backup);
            $added_to_zip = $zip->addFile($file_to_backup, $file_in_zip);
            if (!$added_to_zip) {
                $zip->close();
                if (self::fileExistsCache($zip_archive)) {
                    self::deleteFile($zip_archive);
                }
                return false;
            }
        }

        $zip->close();
        Configuration::deleteByName('OC_IN_PROGRESS');

        foreach ($files_to_backup as $file_to_backup) {
            self::deleteFile($file_to_backup);
        }

        return true;
    }

    public function deleteFromTable($table, $key, $ids_sql)
    {
        $ids = self::explodeArrayOfIds($ids_sql);
        $result = true;
        foreach (array_chunk($ids, 200) as $chunk) {
            $ids_sql = self::implodeArrayOfIds($chunk);
            $result &= $this->specificDeleteFromTable($table, '`'.pSQL($key).'` IN('.$ids_sql.')');
        }
        return $result;
    }

    public function specificDeleteFromTable($table, $where_condition)
    {
        if ($this->backup_time === null) {
            $this->backup_time = date('Y-m-d-H-i-s');
            Configuration::updateValue('OC_IN_PROGRESS', $this->backup_time);
        }

        $filename = $this->backup_tmp_path.'backup-'._DB_PREFIX_.$table.'-'.$this->backup_time.'.sql';
        $rollback_file_exists = self::fileExistsCache($filename);
        if ($rollback_file_exists) {
            $this->backup_engine->setNoTableStructure(true);
        }
        $this->backup_engine->setFileName($filename);
        $this->backup_engine->setAddIfTableNotExists(true);
        $this->backup_engine->setIncludeTables(array(
            _DB_PREFIX_.$table
        ));
        $this->backup_engine->setQueryClauses(array(
            _DB_PREFIX_.$table => 'WHERE '.$where_condition,
        ));
        $rollback_file_exists ? $this->backup_engine->concat() : $this->backup_engine->export();
        $rs_delete = self::execute(
            'DELETE FROM '._DB_PREFIX_.pSQL($table).'
            WHERE '.$where_condition
        );
        if ($rs_delete) {
            $this->confirmations[] = sprintf($this->l('Cleaning successfully table %s'), _DB_PREFIX_.$table);
        } else {
            $this->errors[] = sprintf($this->l('An error occurred during cleaning table %s'), _DB_PREFIX_.$table);
        }
    }

    public function renderAbout()
    {
        $this->context->smarty->assign(
            array(
                'moduleversion' => $this->version,
                'module_dir' => $this->_path,
                'psversion' => _PS_VERSION_,
                'phpversion' => PHP_VERSION,
                'iso_code' => Language::getIsoById($this->context->cookie->id_lang)
            )
        );
        $string = $this->context->smarty->fetch($this->local_path.'/views/templates/admin/about.tpl');
        return $string;
    }

    public function testHaveFeature()
    {
        return Db::getInstance()->getValue(
            'SELECT id_feature FROM '._DB_PREFIX_.'feature_product'
        );
    }

    public function implodeArrayOfIds($array)
    {
        $array = Tools::arrayUnique($array);
        return pSQL(implode(',', $array));
    }

    public function explodeArrayOfIds($string)
    {
        return explode(',', $string);
    }

    public static function formatFileSize($bytes)
    {
        if ($bytes >= 1000000000) {
            return Tools::ps_round($bytes / 1000000000, 2).' Gb';
        }

        if ($bytes >= 1000000) {
            return Tools::ps_round($bytes / 1000000, 2).' Mb';
        }

        return Tools::ps_round($bytes / 1000, 2).' Kb';
    }

    public static function fileExistsCache($filename)
    {
        if (method_exists('Tools', 'file_exists_no_cache')) {
            return Tools::file_exists_no_cache($filename) && is_readable($filename);
        } else {
            clearstatcache();
            return file_exists($filename);
        }
    }

    public static function isAvailbaleDir($dir)
    {
        return is_dir($dir) && is_writable($dir);
    }

    public function createOrReadFile($filename, $mode)
    {
        $handle = fopen($filename, $mode);
        self::chmodr($filename, 0775);
        return $handle;
    }

    public static function chmodr($path, $filemode)
    {
        if (method_exists('Tools', 'chmodr')) {
            return Tools::chmodr($path, $filemode);
        } else {
            if (!is_dir($path)) {
                return @chmod($path, $filemode);
            }
            $dh = opendir($path);
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..') {
                    $fullpath = $path.'/'.$file;
                    if (is_link($fullpath)) {
                        return false;
                    } elseif (!is_dir($fullpath) && !@chmod($fullpath, $filemode)) {
                        return false;
                    } elseif (!self::chmodr($fullpath, $filemode)) {
                        return false;
                    }
                }
            }
            closedir($dh);
            if (@chmod($path, $filemode)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function deleteFile($file, $exclude_files = array())
    {
        if (method_exists('Tools', 'deleteFile')) {
            Tools::deleteFile($file, $exclude_files);
        } else {
            if (isset($exclude_files) && !is_array($exclude_files)) {
                $exclude_files = array($exclude_files);
            }

            if (file_exists($file) && is_file($file) && array_search(basename($file), $exclude_files) === false) {
                @chmod($file, 0777); // NT ?
                unlink($file);
            }
        }
        return !file_exists($file);
    }

    public function createOrReadDir($dirname)
    {
        if (self::isAvailbaleDir($dirname)) {
            return true;
        }
        return mkdir($dirname, 0755);
    }

    public function moveFileInTemp($file)
    {
        $file_path = str_replace(_PS_ROOT_DIR_, '', dirname($file));

        $current_dir = $this->backup_tmp_path;
        foreach (explode('/', $file_path) as $folder) {
            if (!$folder) {
                continue;
            }
            if (!self::createOrReadDir($current_dir.$folder)) {
                return false;
            }
            $current_dir .= $folder.'/';
        }
        $result = copy($file, $current_dir.basename($file));
        $result &= self::deleteFile($file);
        return $result;
    }

    public function restoreFileFromTemp($file)
    {
        $file_path = str_replace($this->backup_tmp_path, '', dirname($file));

        $current_dir = _PS_ROOT_DIR_.'/';
        foreach (explode('/', $file_path) as $folder) {
            if (!$folder) {
                continue;
            }
            if (!self::createOrReadDir($current_dir.$folder)) {
                return false;
            }
            $current_dir .= $folder.'/';
        }
        return copy($file, $current_dir.basename($file));
    }

    public static function recurseCopy($src, $dst, $del = false)
    {
        if (method_exists('Tools', 'recurseCopy')) {
            return Tools::recurseCopy($src, $dst, $del);
        }

        if (!Tools::file_exists_cache($src)) {
            return false;
        }
        $dir = opendir($src);

        if (!Tools::file_exists_cache($dst)) {
            mkdir($dst);
        }
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src.DIRECTORY_SEPARATOR.$file)) {
                    self::recurseCopy($src.DIRECTORY_SEPARATOR.$file, $dst.DIRECTORY_SEPARATOR.$file, $del);
                } else {
                    copy($src.DIRECTORY_SEPARATOR.$file, $dst.DIRECTORY_SEPARATOR.$file);
                    if ($del && is_writable($src.DIRECTORY_SEPARATOR.$file)) {
                        unlink($src.DIRECTORY_SEPARATOR.$file);
                    }
                }
            }
        }
        closedir($dir);
        if ($del && is_writable($src)) {
            rmdir($src);
        }
    }

    public function executeS($sql) {
        $this->confirmations[] = '<em>-- [SQL] '.trim(preg_replace('/\s\s+/', ' ', $sql)).'</em>';
        return Db::getInstance()->executeS($sql);
    }

    public function execute($sql) {
        $this->confirmations[] = '<em>-- [SQL] '.trim(preg_replace('/\s\s+/', ' ', $sql)).'</em>';
        return Db::getInstance()->execute($sql);
    }
}
