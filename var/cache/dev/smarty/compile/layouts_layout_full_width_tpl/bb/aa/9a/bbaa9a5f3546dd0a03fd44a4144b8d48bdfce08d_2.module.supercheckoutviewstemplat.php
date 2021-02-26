<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from 'module:supercheckoutviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2f01a17_46770262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbaa9a5f3546dd0a03fd44a4144b8d48bdfce08d' => 
    array (
      0 => 'module:supercheckoutviewstemplat',
      1 => 1613558552,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2f01a17_46770262 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/order_extra_fields.tpl --><?php echo '<script'; ?>
 type="text/javascript">
    var subtotal_msg = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I agree to the terms of service and will adhere to them unconditionally.','mod'=>'supercheckout'),$_smarty_tpl ) );?>
";
    
    document.addEventListener("DOMContentLoaded", function(event) { 
        $(document).ready(function() {
					$(".various").fancybox({
						 scrolling: 'auto',
						width: '65%',
						height: '60%',
						fitToView: false,
						autoSize: false,
						'type': 'ajax',
						'ajax': {
						    dataFilter: function(data) {
							return $(data).find('section#main')[0];
						}
					    }
					});
				});
        $('#supercheckout-agree a').addClass('iframe various fancybox.ajax');
    });


<?php echo '</script'; ?>
>
<?php if (!$_smarty_tpl->tpl_vars['is_virtual_cart']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
        <div id="supercheckout_recyclepack_container checkbox" class='order-shipping-extra' style="padding-bottom: 0 !important;">
            <input type="checkbox" name="recyclable" class="supercheckout-delivery-extra" id="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value == 1) {?>checked="checked"<?php }?> />                        
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I would like to receive my order in recycled packaging.','mod'=>'supercheckout'),$_smarty_tpl ) );?>
                        
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>

        <div id="supercheckout-gift_container" class='order-shipping-extra checkbox' style="padding-bottom: 0 !important;">
            <input type="checkbox" class="supercheckout-delivery-extra" name="gift" id="gift" value="1" <?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift'] == 1) {?>checked="checked"<?php }?> />                        
            <label>  <?php echo $_smarty_tpl->tpl_vars['gift']->value['label'];?>
</label>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['settings']->value['confirm']['gift_message'][$_smarty_tpl->tpl_vars['user_type']->value]['display']) && ($_smarty_tpl->tpl_vars['settings']->value['confirm']['gift_message'][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 1)) {?>
            <div id="supercheckout-gift_kb_message_container" class='order-shipping-extra checkbox' style="padding-bottom: 0 !important;<?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift'] != 1) {?>display:none;<?php }?>">
                <input type="checkbox" class="supercheckout-delivery-extra" name="kb_message_gift" id="kb_message_gift" <?php if ($_smarty_tpl->tpl_vars['is_kb_gift_msg_already_added']->value == 1) {?>checked="checked"<?php }?> value="0"/>                        
                <label>    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a gift message','mod'=>'supercheckout'),$_smarty_tpl ) );?>
<span id='edit_kb_gift_message' <?php if ($_smarty_tpl->tpl_vars['is_kb_gift_msg_already_added']->value == 1) {
} else { ?> style="display:none;"<?php }?>>
                    <a href="javascript:void(0)" onclick="showGiftMessagePopup()"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</a>
                </span> </label>
                
            </div>
        <?php } else { ?>
                        <div id="supercheckout-gift-comments" style="display:<?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift'] == 1) {?>block<?php } else { ?>none<?php }?>; margin-top: 0; margin-bottom: 15px;">
                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you would like, you can add a note to the gift','mod'=>'supercheckout'),$_smarty_tpl ) );?>
:</b>
                <textarea id="gift_message" name="gift_comment" rows="8" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['message'], ENT_QUOTES, 'UTF-8');?>
</textarea>
            </div>

        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['settings']->value['confirm']['gift_message'][$_smarty_tpl->tpl_vars['user_type']->value]['display']) && ($_smarty_tpl->tpl_vars['settings']->value['confirm']['gift_message'][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 1)) {?>

            <div id="divKbgiftMessage" style="display:none" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add/Edit gift Message details','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" class="supercheckout-threecolumns divkbmobilelogin">
                                <div id="gift_message_update_warning" class="supercheckout-checkout-content"></div>
                <div class="supercheckout-extra-wrap">
                    <label>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','mod'=>'supercheckout'),$_smarty_tpl ) );?>
<span class="supercheckout-required">*</span><br></label>
                    <input type="text" style="width: 100%;" id="supercheckout_gift_sender" name="supercheckout_gift_receiver" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sender']->value, ENT_QUOTES, 'UTF-8');?>
" class="supercheckout-large-field form-control">
                    <span id="kb_gift_sender_error"  style="display:none;" class="errorsmall supercheckout-required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required Field','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>
                </div>
                <div class="supercheckout-extra-wrap">
                    <label>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','mod'=>'supercheckout'),$_smarty_tpl ) );?>
<span class="supercheckout-required">*</span><br></label>
                    <input type="text" style="width: 100%;" id="supercheckout_gift_receiver" name="supercheckout_gift_receiver" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['receiver']->value, ENT_QUOTES, 'UTF-8');?>
" class="supercheckout-large-field form-control">
                    <span id="kb_gift_receiver_error" style="display:none;" class="errorsmall supercheckout-required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required Field','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>
                </div>
                <div class="supercheckout-extra-wrap">
                    <label>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Message','mod'=>'supercheckout'),$_smarty_tpl ) );?>
<span class="supercheckout-required">*</span><br></label>
                    <textarea id="supercheckout_gift_message" style="width: 100%;" name="supercheckout_gift_message" rows="8" class="form-control" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kb_gift_msg']->value, ENT_QUOTES, 'UTF-8');?>
</textarea>
                    <span id="kb_gift_msg_error" style="display:none;" class="errorsmall supercheckout-required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required Field','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>
                </div>
                <div class="supercheckout-extra-wrap">
                    <input id="kb_gift_message_submit" type="button" onclick="updateKbGiftMessage();" class="orangebuttonapply btn btn-success" value="<?php if ($_smarty_tpl->tpl_vars['kb_gift_msg']->value != '') {?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update','mod'=>'supercheckout'),$_smarty_tpl ) );?>
 <?php } else { ?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add ','mod'=>'supercheckout'),$_smarty_tpl ) );
}?>">
                </div>
            </div>
        <?php }?> 

            <?php }
}
if ($_smarty_tpl->tpl_vars['show_TOS']->value && count($_smarty_tpl->tpl_vars['conditions_to_approve']->value) > 0) {?>
        <input type="hidden" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I agree to the terms of service and will adhere to them unconditionally. ','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" name="supercheckout_default_policy" />
        <div id="supercheckout-agree">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['conditions_to_approve']->value, 'condition', false, 'condition_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['condition_name']->value => $_smarty_tpl->tpl_vars['condition']->value) {
?>
            <div class="checkbox">
                <input id="conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]" type="checkbox" name="conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]" value="1" checked="checked"/>
                <label for="conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]">

                    <?php echo $_smarty_tpl->tpl_vars['condition']->value;?>
                </label>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php }
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'customSuperCheckoutGDPRHook'),$_smarty_tpl ) );?>

<!-- end /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/order_extra_fields.tpl --><?php }
}
