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

if (!defined('_PS_VERSION_')) {
    exit;
}

class Ipmanager extends Module
{
    protected $config_form = false;
    public static $cookie_lifetime = 7*24*60*60; // Cookie lifetime for country data

    public function __construct()
    {
        $this->name = 'ipmanager';
        $this->tab = 'administration';
        $this->version = '1.0.4';
        $this->author = 'Active Design';
        $this->need_instance = 0;
        $this->module_key = '7a9562deec1c2ff0c05cc9208443c554';
        $this->author_address = '0xc0D7cE57752e47305707d7174B9686C0Afb229c3';

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('IP Manager');
        $this->description = $this->l('Manage your visitor\'s IPs');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->secondaryControllers = array(
            'AdminIpManagerSettings' => $this->l('General Settings'),
            'AdminIpManagerBlockedIps' => $this->l('Blocked IPs'),
            'AdminIpManagerBlockedCountry' => $this->l('Blocked Countries'),
            'AdminIpManagerBlockedAgent' => $this->l('Blocked Bots'),
            'AdminIpManagerAntiDdosAttack' => $this->l('Anti DDoS Attack'),
        );
    }
    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        $installed = include_once(dirname(__FILE__).'/sql/install.php');
        return parent::install() &&
            Configuration::updateValue('IP_MANAGER_LIVE_MODE', true) &&
            Configuration::updateValue('IP_MANAGER_GLOBAL_REDIRECT', '') &&
            Configuration::updateValue('IP_MANAGER_API', '0') &&
            Configuration::updateValue('IPMANAGER_DDOS_REQ', '') &&
            Configuration::updateValue('IPMANAGER_DDOS_SEC', '') &&
            Configuration::updateValue('IPMANAGER_DDOS_BAN', '') &&
            $installed &&
            $this->addBackOfficeTabs() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('actionDispatcher') &&
            $this->registerHook('displayAdminOrder');
    }
    public function uninstall()
    {
        $uninstalled = include_once(dirname(__FILE__).'/sql/uninstall.php');
        return parent::uninstall() &&
            $uninstalled &&
            Configuration::deleteByName('IP_MANAGER_LIVE_MODE') &&
            Configuration::deleteByName('IP_MANAGER_GLOBAL_REDIRECT') &&
            Configuration::deleteByName('IP_MANAGER_API') &&
            Configuration::deleteByName('IPMANAGER_DDOS_REQ') &&
            Configuration::deleteByName('IPMANAGER_DDOS_SEC') &&
            Configuration::deleteByName('IPMANAGER_DDOS_BAN') &&
            $this->deleteBackOfficeTabs();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */

        $output = '';

        if (((bool)Tools::isSubmit('submitIpmanagerModule')) == true) {
            $output .= $this->postProcess();
        }
        $this->context->smarty->assign($this->assignConfigureLinks());
        $this->context->smarty->assign('module_dir', $this->_path);
        $output .= $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');
        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitIpmanagerModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     *
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Activate / Deactivate'),
                        'name' => 'IP_MANAGER_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Activate the IP Manager module'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'radio',
                        'class' => 't',
                        'label' => $this->l('Choose Api Verification'),
                        'name' => 'IP_MANAGER_API',
                        'values' => array(
                            array(
                                'id' => 'api_ripe',
                                'value' => 0,
                                'label' => $this->l('Ripe.net')
                            ),
                            array(
                                'id' => 'api_co',
                                'value' => 1,
                                'label' => $this->l('Ipapi.co')
                            )
                        )
                    ),
                    array(
                        'col' => 4,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-link"></i>',
                        'desc' => $this->l('Example: https://prestashop.com'),
                        'name' => 'IP_MANAGER_GLOBAL_REDIRECT',
                        'label' => $this->l('Global redirect URL'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $global_redir = pSQL(Tools::getValue('IP_MANAGER_GLOBAL_REDIRECT'));
        if (filter_var($global_redir, FILTER_VALIDATE_URL) === false) {
            return $this->displayError(sprintf('%s is not a valid URL', $global_redir));
        } else {
            $form_values = $this->getConfigFormValues();
            foreach (array_keys($form_values) as $key) {
                Configuration::updateValue($key, Tools::getValue($key));
            }
            return $this->displayConfirmation($this->l('Settings saved!'));
        }
    }
    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'IP_MANAGER_LIVE_MODE' => Configuration::get('IP_MANAGER_LIVE_MODE'),
            'IP_MANAGER_GLOBAL_REDIRECT' => Configuration::get('IP_MANAGER_GLOBAL_REDIRECT'),
            'IP_MANAGER_API' => Configuration::get('IP_MANAGER_API'),
        );
    }
    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addJS($this->_path.'views/js/back.js');
        $this->context->controller->addCSS($this->_path.'views/css/back.css');
//        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */

    public function hookActionDispatcher()
    {
        $context = Context::getContext();
        if ($context->controller->controller_type == 'admin') {
            return;
        }
        if (! (int) Configuration::get('IP_MANAGER_LIVE_MODE')) {
            return;
        }

        /* Initialize IP */
        $ip_user = Tools::getRemoteAddr();

        /* Check if IP is banned by DDOS protection */
        $is_banned_ddos = Db::getInstance()->getValue('SELECT COUNT(*) FROM `'._DB_PREFIX_.'blocked_ip_ddos` 
                          WHERE `blocked_ip` = "'.pSQL($ip_user).'" AND `date_end` >= "'.pSQL(date('Y-m-d H:i:s')).'"');
        if ((int)$is_banned_ddos) {
            die("Slow down!");
        }
        /* Check the User Agent */

        $user_agent = Tools::strtolower($_SERVER['HTTP_USER_AGENT']);

        $sql = 'SELECT `id` FROM `' . _DB_PREFIX_ . 'ipmanager_useragent` 
        WHERE INSTR("' . pSQL($user_agent) . '", `user_agent`) > 0';

        $results = Db::getInstance()->executeS($sql);

        if (count($results)) {
            die("User Agent not accepted!");
        }

        /*  Check DDOS for BAN */

        if ((int)Configuration::get('IPMANAGER_DDOS_SEC') > 0) {
            $now = new DateTime(date('Y-m-d H:i:s'));
            $requests_date = $now->modify('-' . (int)Configuration::get('IPMANAGER_DDOS_SEC') . ' second');
            $requests_date = $requests_date->format('Y-m-d H:i:s');
            $requests = (int)Db::getInstance()->getValue('SELECT COUNT(*) FROM `' . _DB_PREFIX_ . 'ipmanager_ddos` 
            WHERE `ip` = "' . pSQL($ip_user) . '" AND `date` > "' . pSQL($requests_date) . '"');
            if ($requests > Configuration::get('IPMANAGER_DDOS_REQ')) {
                $date_end = $now->modify('+' . (int)Configuration::get('IPMANAGER_DDOS_BAN') . ' second');
                $date_end = $date_end->format('Y-m-d H:i:s');

                Db::getInstance()->insert('blocked_ip_ddos', array(
                    'blocked_ip' => pSQL($ip_user),
                    'date_start' => pSQL(date('Y-m-d H:i:s')),
                    'date_end' => pSQL($date_end)
                ));

                die("Slow down!");
            }
        }

        /*  END DDOS */

        $row = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ipmanager_ips` 
        WHERE `ip` = "'.pSQL($ip_user).'"');
        if ($row) {
            if ($row['redir']) {
                Tools::redirect($row['redir']);
            } else {
                if (Configuration::get('IP_MANAGER_GLOBAL_REDIRECT')) {
                    Tools::redirect(Configuration::get('IP_MANAGER_GLOBAL_REDIRECT'));
                } else {
                    die('You are not allowed to access this page! We are sorry for any inconvenience.');
                }
            }
            die();
        } else {
            if (!isset($this->context->cookie->ipmanager_country) ||
                !$this->context->cookie->ipmanager_country ||
                (isset($this->context->cookie->ipmanager_country_timestamp) &&
                    (time() - (int)$this->context->cookie->ipmanager_country_timestamp) > self::$cookie_lifetime) ||
                !isset($this->context->cookie->ipmanager_ip) || (isset($this->context->cookie->ipmanager_ip) &&
                    $this->context->cookie->ipmanager_ip != $ip_user)) {
                $ip_data = $this->getIpData($ip_user);
                if ($ip_data['id_country']) {
                    $this->context->cookie->ipmanager_country = $ip_data['id_country'];
                    $this->context->cookie->ipmanager_country_timestamp = time();
                    $this->context->cookie->ipmanager_ip = $ip_data['ip'];
                }
            }
            if (isset($this->context->cookie->ipmanager_country) &&
                $this->context->cookie->ipmanager_country &&
                isset($this->context->cookie->ipmanager_country_timestamp) &&
                !((time() - (int)$this->context->cookie->ipmanager_country_timestamp) > self::$cookie_lifetime)) {
                $id_country = $this->context->cookie->ipmanager_country;
                $row_country = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ipmanager_country` 
                WHERE `id_country` = "'.(int)$id_country.'"');
                if ($row_country) {
                    if ($row_country['redir']) {
                        Tools::redirect($row_country['redir']);
                    }
                    if (Configuration::get('IP_MANAGER_GLOBAL_REDIRECT')) {
                        Tools::redirect(Configuration::get('IP_MANAGER_GLOBAL_REDIRECT'));
                    } else {
                        die('This page is not available in your country.');
                    }
                }
            }
        }

        /* Anti DDOS */
        /* Remove old rows from table */
        $now = new DateTime(date('Y-m-d H:i:s'));
        $delete_date = $now->modify('-'.(int)Configuration::get('IPMANAGER_DDOS_SEC').' second');
        $delete_date = $delete_date->format('Y-m-d H:i:s');
        Db::getInstance()->delete('ipmanager_ddos', '`date` < "'.pSQL($delete_date).'"');

        /*  Add the IP into database */
        Db::getInstance()->insert('ipmanager_ddos', array(
            'ip' => pSQL($ip_user),
            'date' => pSQL(date('Y-m-d H:i:s')),
        ));
    }

    public function addBackOfficeTabs()
    {
        $tab = new Tab;
        $tab->class_name = "AdminIpManager";
        $tab->id_parent = 0;
        $tab->module = $this->name;
        $tab->name[(int)(Configuration::get('PS_LANG_DEFAULT'))] = $this->displayName;
        if (!$tab->add()) {
            return false;
        }
        $primaryTabId = Tab::getIdFromClassName('AdminIpManager');
        if ($primaryTabId) {
            foreach ($this->secondaryControllers as $class_name => $name) {
                $tab = new Tab;

                $tab->class_name = $class_name;
                $tab->id_parent = $primaryTabId;
                $tab->module = $this->name;
                $tab->name[(int)(Configuration::get('PS_LANG_DEFAULT'))] = $name;
                if (!$tab->add()) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public function deleteBackOfficeTabs()
    {
        $tab = new Tab(Tab::getIdFromClassName('AdminIpManager'));
        if (!$tab->delete()) {
            return false;
        }

        foreach (array_keys($this->secondaryControllers) as $class_name) {
            $tab = new Tab(Tab::getIdFromClassName($class_name));
            $tab->delete();
        }
        return true;
    }

    public function getIpData($ip)
    {
        $default = array(
            'id_country' => 0,
            'ip' => $ip,
            'descr' => '',
        );
        $id_country = 0;
        $descr = '';
        if ((int)Configuration::get('IP_MANAGER_API') == 0) {
            $content = Tools::file_get_contents('https://stat.ripe.net/data/address-space-hierarchy/data.json?resource='
                .$ip);
            $what_to_check = array('exact', 'more_specific', 'less_specific');
            if (!$content) {
                return $default;
            }
            $json = Tools::jsonDecode($content, true);

            if (!$json) {
                return $default;
            }
            $country_iso = false;
            foreach ($what_to_check as $data_key) {
                if (isset($json['data'][$data_key][0]['country']) && $json['data'][$data_key][0]['country']
                    && $json['data'][$data_key][0]['country'] != "EU") {
                    $country_iso = pSQL($json['data'][$data_key][0]['country']);
                }
                if (Validate::isLanguageIsoCode($country_iso)) {
                    $id_country = (int)Country::getByIso($country_iso);
                } else {
                    $id_country = 0;
                }

                if (!isset($json['data'][$data_key][0]['descr']) || !$json['data'][$data_key][0]['descr']) {
                    $descr = '';
                } else {
                    $descr = $json['data'][$data_key][0]['descr'];
                    break;
                }
            }
        } else {
            $content = Tools::file_get_contents('https://ipapi.co/'
                .$ip.'/json');
            $json = Tools::jsonDecode($content, true);
            if (isset($json['country']) && $json['country']
                && $json['country'] != "EU") {
                $country_iso = pSQL($json['country']);
            }
            if (Validate::isLanguageIsoCode($country_iso)) {
                $id_country = (int)Country::getByIso($country_iso);
            } else {
                $id_country = 0;
            }
            $descr = '';
        }
        return array(
            'id_country' => (int)$id_country,
            'descr' => pSQL($descr),
            'ip' => pSQL($ip),
        );
    }
    public function assignConfigureLinks()
    {
        $ipmanager_settings = Context::getContext()->link->getAdminLink("AdminModules")
            . "&configure=".$this->name."&tab_module=".$this->tab."&module_name=".$this->name;
        $ipmanager_blockip = Context::getContext()->link->getAdminLink("AdminIpManagerBlockedIps");
        $ipmanager_blockcountries = Context::getContext()->link->getAdminLink("AdminIpManagerBlockedCountry");
        $ipmanager_blockbots = Context::getContext()->link->getAdminLink("AdminIpManagerBlockedAgent");
        $ipmanager_antiddos = Context::getContext()->link->getAdminLink("AdminIpManagerAntiDdosAttack");

        $return = array(
            'ipmanager_settings' => $ipmanager_settings,
            'ipmanager_blockip' => $ipmanager_blockip,
            'ipmanager_blockcountries' => $ipmanager_blockcountries,
            'ipmanager_blockbots' => $ipmanager_blockbots,
            'ipmanager_antiddos' => $ipmanager_antiddos,
        );
        return $return;
    }
}
