<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:03
  from 'module:leofeatureviewstemplatesf' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d3203fb8_16125987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fde47e68fca37f3f6dcb2391d9ed97c4e24edca6' => 
    array (
      0 => 'module:leofeatureviewstemplatesf',
      1 => 1606067070,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d3203fb8_16125987 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/leofeature/views/templates/front/fly_cart_slide_bar.tpl --><?php if ($_smarty_tpl->tpl_vars['enable_overlay_background']->value) {?>
	<div class="leo-fly-cart-mask"></div>
<?php }?>

<div class="leo-fly-cart-slidebar <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
">
	
	<div class="leo-fly-cart disable-dropdown">
		<div class="leo-fly-cart-wrapper">
			<div class="leo-fly-cart-icon-wrapper">
				<i class="material-icons">close</i>
				<span class="cart-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PIRKINIŲ KREPŠELIS','mod'=>'leofeature'),$_smarty_tpl ) );?>
</span>
			</div>
			<div class="dd-fly-cart-cssload-loader"></div>
		</div>
	</div>

</div><!-- end /var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/leofeature/views/templates/front/fly_cart_slide_bar.tpl --><?php }
}
