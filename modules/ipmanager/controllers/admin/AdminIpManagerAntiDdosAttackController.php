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

class AdminIpManagerAntiDdosAttackController extends AdminController
{
    public $module;

    public function __construct()
    {
        $this->module = Module::getInstanceByName('ipmanager');
        $this->bootstrap = true;
        parent::__construct();
    }

    public function renderForm()
    {
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->module->l('Antti DDoS configuration'),
                'icon' => 'icon-shield'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Number of allowed requests'),
                    'desc' => $this->module->l('Set the number of allowed page requests per user'),
                    'name' => 'IPMANAGER_DDOS_REQ',
                    'col' => '4',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Set requests timeout (in seconds)'),
                    'desc' => $this->module->l('Time rage for page request (in seconds) '),
                    'prefix' => '<i class="icon icon-clock-o"></i>',
                    'suffix' => 'seconds',
                    'name' => 'IPMANAGER_DDOS_SEC',
                    'col' => '4',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Set BAN time (in seconds)'),
                    'desc' => $this->module->l('Set the BAN time for the users who has 
                    exceded the requests (in seconds)'),
                    'prefix' => '<i class="icon icon-clock-o"></i>',
                    'suffix' => 'seconds',
                    'name' => 'IPMANAGER_DDOS_BAN',
                    'col' => '4',
                ),
            )
        );

        $this->fields_form['submit'] = array(
            'title' => $this->module->l('Save'),
        );
        $inputs = array('IPMANAGER_DDOS_REQ', 'IPMANAGER_DDOS_SEC', 'IPMANAGER_DDOS_BAN');
        foreach ($inputs as $input) {
            $this->fields_value[$input] = Configuration::get($input);
        }
        return $this->postProcess().parent::renderForm();
    }

    public function postProcess()
    {
        if (Tools::getIsset('submitAddconfiguration')) {
            $inputs = array('IPMANAGER_DDOS_REQ', 'IPMANAGER_DDOS_SEC', 'IPMANAGER_DDOS_BAN');
            foreach ($inputs as $input) {
                if (!Validate::isInt(Tools::getValue($input))) {
                    return $this->module->displayError($this->module->l('Please insert only numeric values.'));
                }
            }
            foreach ($inputs as $input) {
                Configuration::updateValue($input, Tools::getValue($input));
            }
            return $this->module->displayConfirmation($this->module->l('Settings saved.'));
        }
    }


    public function renderList()
    {
        $this->context->smarty->assign($this->module->assignConfigureLinks());
        return $this->context->smarty->fetch($this->module->getLocalPath().
            'views/templates/admin/configure.tpl').$this->renderForm();
    }
}
