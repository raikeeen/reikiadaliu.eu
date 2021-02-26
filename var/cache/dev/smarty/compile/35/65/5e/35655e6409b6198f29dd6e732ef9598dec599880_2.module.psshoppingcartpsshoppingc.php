<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from 'module:psshoppingcartpsshoppingc' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2d1c567_51350041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35655e6409b6198f29dd6e732ef9598dec599880' => 
    array (
      0 => 'module:psshoppingcartpsshoppingc',
      1 => 1606067070,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2d1c567_51350041 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/ps_shoppingcart/ps_shoppingcart.tpl --><div id="cart-block">
  <div class="blockcart cart-preview <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count'] > 0) {?>active<?php } else { ?>inactive<?php }?>" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['refresh_url']->value, ENT_QUOTES, 'UTF-8');?>
">
    <div class="header">
      <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count'] > 0) {?>
        <a rel="nofollow" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_url']->value, ENT_QUOTES, 'UTF-8');?>
">
      <?php }?>
        <i class="nova-shopping-cart"></i>
        <div class="cart-quantity">
          <span class="title_cart"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My cart','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
          <span class="cart-products-count"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['products_count'], ENT_QUOTES, 'UTF-8');?>
 <span class="cart-unit"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'items','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span></span>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count'] < 1) {?>
          <div class="mini_card">
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Jūsų krepšelis tuščias.','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</span>
          </div>
        <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count'] > 0) {?>
        </a>
      <?php }?>
    </div>
  </div>
</div>
<!-- end /var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/ps_shoppingcart/ps_shoppingcart.tpl --><?php }
}
