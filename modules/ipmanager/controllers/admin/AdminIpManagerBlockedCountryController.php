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

class AdminIpManagerBlockedCountryController extends AdminController
{
    public $module;
    public $fields_list;
    protected $_defaultOrderBy = 'id_blocked_country';
    protected $_defaultOrderWay = 'DESC';

    public function __construct()
    {
        $this->module = Module::getInstanceByName('ipmanager');
        $this->bootstrap = true;
        $this->required_database = false;
        $this->table = 'ipmanager_country';
        $this->identifier = 'id_blocked_country';
        $this->lang = false;
        $this->explicitSelect = true;

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
            'id_blocked_country' => array(
                'title' => $this->module->l('ID'),
                'align' => 'text-center',
                'class' => 'fixed-width-xs',
                'search' => true,
                'filter_type' => 'int',
            ),
            'country_name' => array(
                'title' => $this->module->l('Country'),
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

        $this->_join = 'LEFT JOIN `'._DB_PREFIX_.'country_lang` c 
        ON (c.`id_country` = a.`id_country` 
        AND c.`id_lang`="'.(int)$this->context->language->id.'")';
        $this->_select = '
            c.`name` as `country_name`
        ';
        $this->shopLinkType = '';

        parent::__construct();
    }

    public function processDelete()
    {
        $id_blocked_country = Tools::getValue('id_blocked_country');

        Db::getInstance()->delete(
            'ipmanager_country',
            '`id_blocked_country` = "'.(int)$id_blocked_country.'"'
        );

        $this->redirect_after = self::$currentIndex.'&conf=1&token='.$this->token;
    }
    public function renderForm()
    {
        $blocked_country = (int)Tools::getValue('id_blocked_country');
        $countries = Country::getCountries(Context::getContext()->language->id);
        $this->fields_form = array(
            'legend' => array(
                'title' => ($blocked_country) ? $this->module->l('Edit Country block') :
                            $this->module->l('Redirect new Country'),
                'icon' => 'icon-globe'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->module->l('Select country'),
                    'options' => array(
                        'query' => $countries,
                        'id' => 'id_country',
                        'name' => 'name'
                    ),
                    'name' => 'countries_field',
                    'col' => '4',
                    'search' => true,
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Redirect Link'),
                    'name' => 'country_redirect',
                    'prefix' => '<i class="icon icon-link"></i>',
                    'col' => '4',
                ),
            )
        );
        if ($blocked_country) {
            $this->fields_form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id_blocked_country',
            );
        }
        $this->fields_form['submit'] = array(
            'title' => $this->module->l('Save'),
        );
        if ($blocked_country) {
            $this->fields_value = Db::getInstance()->getRow('SELECT `id_blocked_country`, `id_country` 
                                AS `countries_field`, `redir` AS `country_redirect` 
                                FROM `'._DB_PREFIX_.'ipmanager_country` 
                                WHERE `id_blocked_country`="'.(int)$blocked_country.'"');
        }
        return parent::renderForm();
    }
    public function processAdd()
    {
        if (Tools::getValue('countries_field')) {
            $blocked_country = pSQL(Tools::getValue('countries_field'));
            if (Tools::getValue('country_redirect')) {
                $redirect = pSQL(Tools::getValue('country_redirect'));
                if (filter_var($redirect, FILTER_VALIDATE_URL) === false) {
                    $this->errors[] = $this->module->l(sprintf('%s is not a valid URL', $redirect));
                    return;
                }
            } else {
                $redirect = Configuration::get("IP_MANAGER_GLOBAL_REDIRECT");
            }
            if (Db::getInstance()->getValue('SELECT `id_blocked_country` 
                FROM `'._DB_PREFIX_.'ipmanager_country` 
                WHERE `id_country`="'.(int)$blocked_country.'"')) {
                $this->errors[] = $this->module->l('This Country is already blocked!');
            } elseif (Db::getInstance()->insert(
                'ipmanager_country',
                array("id_country" => (int)$blocked_country,
                "redir" => pSQL($redirect)
                )
            )
            ) {
                $this->confirmations[] = $this->module->l('Successfully added!');
            }
        }
    }

    //update
    public function processUpdate()
    {
        $this->object= null;
        $id_blocked_country = (int)Tools::getValue('id_blocked_country');
        if (Tools::getValue('country_redirect')) {
            $redirect = pSQL(Tools::getValue('country_redirect'));
            if (filter_var($redirect, FILTER_VALIDATE_URL) === false) {
                $this->errors[] = $this->module->l(sprintf('%s is not a valid URL', $redirect));
                return ;
            }
        } else {
            $redirect = Configuration::get("IP_MANAGER_GLOBAL_REDIRECT");
        }
        if (Tools::getValue('countries_field')) {
            $country = pSQL(Tools::getValue('countries_field'));
            if (Db::getInstance()->getValue('SELECT `id_blocked_country` 
                FROM `' . _DB_PREFIX_ . 'ipmanager_country` 
                WHERE `id_country`="' . pSQL($country) . '" 
                AND `id_blocked_country` != "'.(int)$id_blocked_country.'"')) {
                $this->errors[] = $this->module->l('Country is already blocked');
            } else {
                $update_array = array(
                    "redir" => pSQL($redirect), "id_country" => (int)Tools::getValue('countries_field')
                );
                Db::getInstance()->update(
                    'ipmanager_country',
                    $update_array,
                    '`id_blocked_country` = "'
                    . (int)$id_blocked_country . '"'
                );
                $this->confirmations[] = $this->module->l('Successful update!');
            }
        }
    }
    //end update
    protected function processBulkDelete()
    {
        $return = false;
        if (is_array($this->boxes) && !empty($this->boxes)) {
            $ids = implode(',', $this->boxes);
            $return = Db::getInstance()->delete('ps_ipmanager_country', '`id_blocked_country` IN ('.pSQL($ids).')');
        }
        if ($return) {
            $this->confirmations[] = $this->module->l('Successfully deleted!');
        }
        return $return;
    }

    public function renderList()
    {
        $this->context->smarty->assign($this->module->assignConfigureLinks());
        return $this->context->smarty->fetch($this->module->getLocalPath().'views/templates/admin/configure.tpl').
        parent::renderList();
    }
}
