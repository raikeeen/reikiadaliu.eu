<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:03
  from '/var/www/reikiadaliu.eu/public_html/modules/paysera/views/templates/hook/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d37d5169_14454475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbd2e1bf6a40f8b6861f78f7558a5360f48aeb85' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/paysera/views/templates/hook/header.tpl',
      1 => 1613551462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d37d5169_14454475 (Smarty_Internal_Template $_smarty_tpl) {
?><meta name="verify-paysera" content="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ownershipCode']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php }
}
