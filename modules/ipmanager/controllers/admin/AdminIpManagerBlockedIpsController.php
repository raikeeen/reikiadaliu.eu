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

class AdminIpManagerBlockedIpsController extends AdminController
{
    public $module;
    public $fields_list;
    protected $_defaultOrderBy = 'id_ip';
    protected $_defaultOrderWay = 'DESC';

    public function __construct()
    {
        $this->module = Module::getInstanceByName('ipmanager');
        $this->bootstrap = true;
        $this->required_database = false;
        $this->table = 'ipmanager_ips';
        $this->identifier = 'id_ip';
        $this->lang = false;
        $this->explicitSelect = true;
        $this->object = null;

        $this->allow_export = true;

        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->module->l('Delete selected'),
                'confirm' => $this->module->l('Are you sure?'),
                'icon' => 'icon-trash'
            )
        );
        $this->context = Context::getContext();

        $this->default_form_language = $this->context->language->id;

        $this->_use_found_rows = false;
        $this->fields_list = array(
            'id_ip' => array(
                'title' => $this->module->l('ID'),
                'align' => 'text-center',
                'class' => 'fixed-width-xs',
                'search' => true,
                'filter_type' => 'int',
                'filter_key' => 'a!id_ip',
            ),
            'ip' => array(
                'title' => $this->module->l('IP'),
                'align' => 'text-left',
                'width' => 'auto',
                'search' => true,
                'havingFilter' => false,
            ),
            'country_name' => array(
                'title' => $this->module->l('Country'),
                'align' => 'text-left',
                'width' => 'auto',
                'search' => true,
                'havingFilter' => false,
            ),
            'descr' => array(
                'title' => $this->module->l('Description'),
                'align' => 'text-left',
                'width' => 'auto',
                'search' => true,
                'havingFilter' => false,
            ),
            'redir' => array(
                'title' => $this->module->l('Redirect URL'),
                'align' => 'text-left',
                'width' => 'auto',
                'search' => true,
                'havingFilter' => false,
            ),
        );

        $this->_join = 'LEFT JOIN `'._DB_PREFIX_.'country_lang` c ON 
        (c.`id_country` = a.`id_country` AND c.`id_lang`="'
            .(int) $this->context->language->id.'")';
        $this->_select = '
            c.`name` as `country_name`
        ';
        $this->shopLinkType = '';

        parent::__construct();
    }

    public function processDelete()
    {
        $id_ip = Tools::getValue('id_ip');

        Db::getInstance()->delete('ipmanager_ips', '`id_ip` = "'.(int)$id_ip.'"');

        $this->redirect_after = self::$currentIndex.'&conf=1&token='.$this->token;
    }

    public function renderForm()
    {
        $id_ip = (int)Tools::getValue('id_ip');
        $this->fields_form = array(
            'legend' => array(
                'title' => ($id_ip) ? $this->module->l('Edit IP block') : $this->module->l('Block new IP'),
                'icon' => 'icon-map-marker'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Add one ore more IPs'),
                    'desc' => $this->module->l('You can add multiple IPs separated by comas. 
                    Example: 207.244.83.212, 82.023.2334, etc.'),
                    'prefix' => '<i class="icon icon-map-marker"></i>',
                    'name' => 'ip_field',
                    'col' => '4',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Custom redirect URL'),
                    'desc' => $this->module->l('Example: https://yourstorename/404.php'),
                    'name' => 'ip_redirect_url',
                    'prefix' => '<i class="icon icon-link"></i>',
                    'col' => '4',
                ),
            )
        );
        if ($id_ip) {
            $this->fields_form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_ip',
            );
        }

        $this->fields_form['submit'] = array(
            'title' => $this->module->l('Save'),
        );
        if ($id_ip) {
            $this->fields_value = Db::getInstance()->getRow('SELECT `id_ip`, `ip` 
                                AS `ip_field`, `redir` AS `ip_redirect_url` 
                                FROM `'._DB_PREFIX_.'ipmanager_ips` 
                                WHERE `id_ip`="'.(int)$id_ip.'"');
        }
        return parent::renderForm();
    }

    public function processAdd()
    {
        if (Tools::getValue('ip_field')) {
            $ips = pSQL(Tools::getValue('ip_field'));

            $ips_arr = explode(",", $ips);

            if (Tools::getValue('ip_redirect_url')) {
                $redirect = pSQL(Tools::getValue('ip_redirect_url'));

                if (filter_var($redirect, FILTER_VALIDATE_URL) === false) {
                    $this->errors[] = $this->module->l(sprintf('%s is not a valid URL', $redirect));
                    return ;
                }
            } else {
                $redirect = Configuration::get("IP_MANAGER_GLOBAL_REDIRECT");
            }
            foreach ($ips_arr as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                    $this->errors[] = $this->module->l(sprintf('%s is not a valid IP', $ip));
                } elseif (Db::getInstance()->getValue('SELECT `id_ip` 
                        FROM `'._DB_PREFIX_.'ipmanager_ips` 
                        WHERE `ip`="'.pSQL($ip).'"')) {
                    $this->errors[] = $this->module->l(sprintf('IP %s is already blocked', $ip));
                } else {
                    $ip_data = $this->module->getIpData($ip);
                    $ip_data['redir'] = pSQL($redirect);
                    Db::getInstance()->insert('ipmanager_ips', $ip_data);
                    $this->confirmations[] = $this->module->l('Successfuly added!');
                }
            }
        }
    }
    public function processUpdate()
    {
        $id_ip = (int)Tools::getValue('id_ip');
        if (Tools::getValue('ip_redirect_url')) {
            $redirect = pSQL(Tools::getValue('ip_redirect_url'));
            if (filter_var($redirect, FILTER_VALIDATE_URL) === false) {
                $this->errors[] = $this->module->l(sprintf('%s is not a valid URL', $redirect));
                return ;
            }
        } else {
            $redirect = Configuration::get("IP_MANAGER_GLOBAL_REDIRECT");
        }
        if (Tools::getValue('ip_field')) {
            $ip = pSQL(Tools::getValue('ip_field'));
            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                $this->errors[] = $this->module->l(sprintf('%s is not a valid IP', $ip));
            } elseif (Db::getInstance()->getValue('SELECT `id_ip` FROM `' . _DB_PREFIX_ . 'ipmanager_ips` 
                      WHERE `ip`="' . pSQL($ip) . '" AND `id_ip` != "'.(int)$id_ip.'"')) {
                $this->errors[] = $this->module->l(sprintf('IP %s is already blocked', $ip));
            } else {
                    $update_array = array("redir" => pSQL($redirect), "ip" => pSQL(Tools::getValue('ip_field')));
                    Db::getInstance()->update('ipmanager_ips', $update_array, '`id_ip` = "' . (int)$id_ip . '"');
                    $this->confirmations[] = $this->module->l('Successful update!');
            }
        }
    }

    protected function processBulkDelete()
    {
        $return = false;
        if (is_array($this->boxes) && !empty($this->boxes)) {
            $ids = implode(',', $this->boxes);
            $return = Db::getInstance()->delete('ipmanager_ips', '`id_ip` IN ('.pSQL($ids).')');
        }
        if ($return) {
            $this->confirmations[] = $this->module->l('Successfully deleted!');
        }
        return $return;
    }
    public function renderList()
    {
        $this->context->smarty->assign($this->module->assignConfigureLinks());
        $this->object = null;
        return $this->context->smarty->fetch($this->module->getLocalPath().
            'views/templates/admin/configure.tpl').parent::renderList();
    }
}
