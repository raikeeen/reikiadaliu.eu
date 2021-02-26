<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:03
  from '/var/www/reikiadaliu.eu/public_html/modules/ets_superspeed/views/templates/hook/javascript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d37ad316_86636236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a64455817663ba4fa0e34cd8bdb608e940b00d2' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/ets_superspeed/views/templates/hook/javascript.tpl',
      1 => 1606067072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d37ad316_86636236 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var sp_link_base ='<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sp_link_base']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
function renderDataAjax(jsonData)
{
    for (var key in jsonData) {
	    if(key=='java_script')
        {
            $('body').append(jsonData[key]);
        }
        else
            if($('#ets_speed_dy_'+key).length)
              $('#ets_speed_dy_'+key).replaceWith(jsonData[key]);  
    }
    if($('#header .shopping_cart').length && $('#header .cart_block').length)
    {
        var shopping_cart = new HoverWatcher('#header .shopping_cart');
        var cart_block = new HoverWatcher('#header .cart_block');
        $("#header .shopping_cart a:first").live("hover",
            function(){
    			if (ajaxCart.nb_total_products > 0 || parseInt($('.ajax_cart_quantity').html()) > 0)
    				$("#header .cart_block").stop(true, true).slideDown(450);
    		},
    		function(){
    			setTimeout(function(){
    				if (!shopping_cart.isHoveringOver() && !cart_block.isHoveringOver())
    					$("#header .cart_block").stop(true, true).slideUp(450);
    			}, 200);
    		}
        );
    }
    if(jsonData['custom_js'])
        $('head').append('<?php echo '<script'; ?>
 src="'+sp_link_base+'/modules/ets_superspeed/views/js/script_custom.js"></javascript');
}
<?php echo '</script'; ?>
>

<style>
.layered_filter_ul .radio,.layered_filter_ul .checkbox {
    display: inline-block;
}
</style><?php }
}
