<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:39:55
  from '/var/www/reikiadaliu.eu/public_html/modules/fsadvancedurl/views/templates/admin/css_js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5cb4c4490_84462692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24b75f9c43f3d128523980ed3ca49265ac1dd5fa' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/fsadvancedurl/views/templates/admin/css_js.tpl',
      1 => 1606067078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5cb4c4490_84462692 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['menu_button_text'],'html','UTF-8' ));?>
';
    FSAU.menu_button_url = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['menu_button_url'],'html','UTF-8' ));?>
';
    FSAU.params_hash = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['params_hash'],'html','UTF-8' ));?>
';
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['module_path'],'html','UTF-8' ));?>
views/js/admin.js"><?php echo '</script'; ?>
><?php }
}
