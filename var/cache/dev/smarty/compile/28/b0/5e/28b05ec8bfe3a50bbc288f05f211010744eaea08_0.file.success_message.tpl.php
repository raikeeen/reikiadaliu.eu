<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:39:49
  from '/var/www/reikiadaliu.eu/public_html/modules/ets_superspeed/views/templates/hook/success_message.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5c58f3b12_77551634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28b05ec8bfe3a50bbc288f05f211010744eaea08' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/ets_superspeed/views/templates/hook/success_message.tpl',
      1 => 1606067072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5c58f3b12_77551634 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="bootstrap bootstrap_sussec">
    <div class="module_confirmation conf confirm alert alert-success">
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php if ($_smarty_tpl->tpl_vars['msg']->value) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msg']->value,'html','UTF-8' ));
}?>
        <?php if ($_smarty_tpl->tpl_vars['title']->value && $_smarty_tpl->tpl_vars['link']->value) {?> | <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value,'html','UTF-8' ));?>
" target="_blank"><b><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'html','UTF-8' ));?>
</b></a><?php }?>
    </div>
</div><?php }
}
