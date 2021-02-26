<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:03
  from '/var/www/reikiadaliu.eu/public_html/modules/appagebuilder/views/templates/hook/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d3827160_89236101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfad699b2e8aeec3a0e7f4c668a7ace1da519b83' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/appagebuilder/views/templates/hook/header.tpl',
      1 => 1606743005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d3827160_89236101 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- @file modules\appagebuilder\views\templates\hook\header -->

<?php echo '<script'; ?>
>
    /**
     * List functions will run when document.ready()
     */
    var ap_list_functions = [];
    /**
     * List functions will run when window.load()
     */
    var ap_list_functions_loaded = [];

    /**
     * List functions will run when document.ready() for theme
     */
    
    var products_list_functions = [];
<?php echo '</script'; ?>
>


<?php if (isset($_smarty_tpl->tpl_vars['ajax_enable']->value) && $_smarty_tpl->tpl_vars['ajax_enable']->value) {
echo '<script'; ?>
 type='text/javascript'>
    var leoOption = {
        category_qty:<?php if ($_smarty_tpl->tpl_vars['category_qty']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['category_qty']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        product_list_image:<?php if ($_smarty_tpl->tpl_vars['product_list_image']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product_list_image']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        product_one_img:<?php if ($_smarty_tpl->tpl_vars['product_one_img']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product_one_img']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        productCdown: <?php if ($_smarty_tpl->tpl_vars['productCdown']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['productCdown']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        productColor: <?php if ($_smarty_tpl->tpl_vars['productColor']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['productColor']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        homeWidth: <?php if ($_smarty_tpl->tpl_vars['homeSize']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['homeSize']->value['width'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
        homeheight: <?php if ($_smarty_tpl->tpl_vars['homeSize']->value) {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['homeSize']->value['height'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>0<?php }?>,
	}

    ap_list_functions.push(function(){
        if (typeof $.LeoCustomAjax !== "undefined" && $.isFunction($.LeoCustomAjax)) {
            var leoCustomAjax = new $.LeoCustomAjax();
            leoCustomAjax.processAjax();
        }
    });
<?php echo '</script'; ?>
>
<?php }
}
}
