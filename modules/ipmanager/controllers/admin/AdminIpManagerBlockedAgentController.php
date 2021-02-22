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

class AdminIpManagerBlockedAgentController extends AdminController
{
    public $module;
    public $fields_list;
    protected $_defaultOrderBy = 'id';
    protected $_defaultOrderWay = 'DESC';

    public function __construct()
    {
        $this->module = Module::getInstanceByName('ipmanager');
        $this->bootstrap = true;
        $this->required_database = false;
        $this->table = 'ipmanager_useragent';
        $this->identifier = 'id';
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
            'id' => array(
                'title' => $this->module->l('ID'),
                'align' => 'text-center',
                'class' => 'fixed-width-xs',
                'search' => true,
                'filter_type' => 'int',
            ),
            'user_agent' => array(
                'title' => $this->module->l('User Agent'),
                'align' => 'text-left',
                'width' => 'auto',
                'search' => true,
                'havingFilter' => false,
            ),
        );

        $this->shopLinkType = '';

        parent::__construct();
    }

    public function processDelete()
    {
        $user_agent = Tools::getValue('id');

        Db::getInstance()->delete('ipmanager_useragent', '`id` = "'.(int)$user_agent.'"');

        $this->redirect_after = self::$currentIndex.'&conf=1&token='.$this->token;
    }

    public function renderForm()
    {
        $id_useragent = (int)Tools::getValue('id');
        $this->fields_form = array(
            'legend' => array(
                'title' => ($id_useragent) ? $this->module->l('Edit User Agent') :
                    $this->module->l('Block User Agent'),
                'icon' => 'icon-user'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->module->l('User Agent'),
                    'name' => 'agent_field',
                    'prefix' => '<i class="icon icon-user"></i>',
                    'col' => '6',
                    'required' => true,
                    'desc' => $this->module->l('You can block any Bot or Browser by searching 
                    their User Agent name for any keywords that you specify 
                    (for example: “Googlebot”, "Firefox", etc.)'),
                ),
            )
        );
        if ($id_useragent) {
            $this->fields_form['input'][] = array(
                'type' => 'hidden',
                'name' => 'id',
            );
        }

        $this->fields_form['submit'] = array(
            'title' => $this->module->l('Save'),
        );
        if ($id_useragent) {
            $this->fields_value = Db::getInstance()->getRow('SELECT `id`, `user_agent` 
                                AS `agent_field` FROM `'._DB_PREFIX_.'ipmanager_useragent` 
                                WHERE `id`="'.(int)$id_useragent.'"');
        }
        return parent::renderForm();
    }
    public function processAdd()
    {
        if (Tools::getValue('agent_field')) {
            $blocked_agent = Tools::getValue('agent_field');
        } else {
            $this->errors[] = $this->module->l('Field cannot be blank');
            return;
        }

        if (Db::getInstance()->getValue('SELECT `id` FROM `'._DB_PREFIX_.'ipmanager_useragent` 
        WHERE LOWER(`user_agent`)="'.pSQL(Tools::strtolower($blocked_agent)).'"')) {
            $this->errors[] = $this->module->l('This User Agent is already blocked!') ;
        } elseif (Db::getInstance()->insert('ipmanager_useragent', array("user_agent" => pSQL($blocked_agent)))) {
            $this->confirmations[] =  $this->module->l('Successfuly added!');
        }
    }
    public function processUpdate()
    {
        $this->object= null;
        $id_agent = (int)Tools::getValue('id');

        if (Tools::getValue('agent_field')) {
            $agent = Tools::getValue('agent_field');
            if (Db::getInstance()->getValue('SELECT `id` FROM `' . _DB_PREFIX_ . 'ipmanager_useragent` 
            WHERE LOWER(`user_agent`)="' . pSQL(Tools::strtolower($agent)) . '"')) {
                $this->errors[] = $this->module->l(sprintf('%s is already blocked', $agent));
            } else {
                $update_array = array("user_agent" => pSQL(Tools::getValue('agent_field')));
                Db::getInstance()->update('ipmanager_useragent', $update_array, '`id` = "' . (int)$id_agent . '"');
                $this->confirmations[] = $this->module->l('Successful update!');
            }
        }
    }
    protected function processBulkDelete()
    {
        $return = false;

        if (is_array($this->boxes) && !empty($this->boxes)) {
            $ids = implode(',', $this->boxes);
            $return = Db::getInstance()->delete('ps_ipmanager_useragent', '`id` IN ('.pSQL($ids).')');
        }
        if ($return) {
            $this->confirmations[] = $this->module->l('Successfully deleted!');
        }
        return $return;
    }

    public function renderList()
    {
        $this->context->smarty->assign($this->module->assignConfigureLinks());
        return $this->context->smarty->fetch($this->module->getLocalPath().
            'views/templates/admin/configure.tpl').parent::renderList();
    }
}
