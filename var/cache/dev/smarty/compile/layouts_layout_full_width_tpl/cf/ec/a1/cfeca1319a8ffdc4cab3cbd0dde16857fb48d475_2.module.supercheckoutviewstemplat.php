<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from 'module:supercheckoutviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2ee3391_72146298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfeca1319a8ffdc4cab3cbd0dde16857fb48d475' => 
    array (
      0 => 'module:supercheckoutviewstemplat',
      1 => 1606067077,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2ee3391_72146298 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/payment_address.tpl --><br>
<ul>
    <li>
        <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Address','mod'=>'supercheckout'),$_smarty_tpl ) );?>
 <i class="fas fa-file-invoice"></i></h2></li>
</ul>
<div class="supercheckout-checkout-content"></div>
<?php if (!isset($_smarty_tpl->tpl_vars['guest_information']->value)) {?>
    <?php if ($_smarty_tpl->tpl_vars['customer']->value['addresses']) {?>
        <ul>
            <li>
                <div class="supercheckout-extra-wrap radio">
                    <input type="radio" name="payment_address_value" value="0" id="payment-address-existing" checked="checked" />
                    <label for="payment-address-existing"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use Existing Address','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                </div>    
                <div id="payment-existing" class="styled-select">
                    <select name="payment_address_id" style="" class="form-control">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value['addresses'], 'payment_addr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment_addr']->value) {
?>                                
                            <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['payment_addr']->value['id']), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['payment_addr']->value['id'] == $_smarty_tpl->tpl_vars['id_address_invoice']->value) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment_addr']->value['alias'], ENT_QUOTES, 'UTF-8');?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>

                    <!-- Start: Code added by Anshul for adding update & remove address -->
                    <div id="kb_invoice_update_block" class="actionAddress">
                        <span id="invoice_address_edit" class="kb_edit_btn btn btn-warning" onclick="updateAddressForm('invoice');"><i class="fa fa-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update Address','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>
                        <span id="invoice_address_delete" class="kb_delete_btn btn btn-danger" onclick="deleteAddressForm('invoice');"><i class="fa fa-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove Address','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>
                    </div>
                    <!-- End: Code added by Anshul for adding update & remove address -->
                    <div id="invoice_address_detail" class="supercheckout_address_detail card userAddressData"><div class="card-body">

                        </div>
                    </div>
            </li>
            <li>
                <div class="supercheckout-extra-wrap radio">
                    <p>
                        <input type="radio" name="payment_address_value" value="1" id="payment-address-new" />
                        <label for="payment-address-new"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use New Address','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                    </p>
                </div>
            </li>
        <?php }?>
    <?php }?>
    <div class="opc_billing_address custom-panel">

        <div id="payment-new" style="display: <?php if (isset($_smarty_tpl->tpl_vars['guest_information']->value)) {?>block<?php } elseif ($_smarty_tpl->tpl_vars['customer']->value['addresses']) {?>none<?php } else { ?>block<?php }?>;">
                         <?php $_smarty_tpl->_assignInScope('display_row', '');?>
            <?php $_smarty_tpl->_assignInScope('google_region_type', '');?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value['payment_address'], 'p_address_field', false, 'p_address_key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p_address_key']->value => $_smarty_tpl->tpl_vars['p_address_field']->value) {
?>
                <?php $_smarty_tpl->_assignInScope('display_row', '');?>
                <?php $_smarty_tpl->_assignInScope('google_region_type', '');?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 1 || (isset($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['conditional']) && $_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['conditional'] == 1)) {?>
                    <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'dni' && !$_smarty_tpl->tpl_vars['need_dni']->value) {?>
                        <?php $_smarty_tpl->_assignInScope('display_row', 'display:none;');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'dni' && $_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 0) {?>
                        <?php $_smarty_tpl->_assignInScope('display_row', 'display:none;');?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'vat_number' && $_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 0) {?>
                        <?php $_smarty_tpl->_assignInScope('display_row', 'display:none;');?>
                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['p_address_key']->value == 'postcode' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'alias') && !$_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] && !$_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display']) {?>
                        <?php $_smarty_tpl->_assignInScope('display_row', 'display:none;');?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'postcode') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'postal_code');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'street_number');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'route');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'city') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'locality');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'country');?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state') {?>
                        <?php $_smarty_tpl->_assignInScope('google_region_type', 'administrative_area_level_1');?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state') {?>
                        <?php echo '<script'; ?>
>var show_payment_state = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'], ENT_QUOTES, 'UTF-8');?>
;<?php echo '</script'; ?>
>                                        
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'postcode') {?>
                        <?php echo '<script'; ?>
>var show_payment_postcode = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'], ENT_QUOTES, 'UTF-8');?>
;<?php echo '</script'; ?>
>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['html_format'] == 1) {?>

                        <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'postcode') {?>
                            <div class="row sort_data" id="payment_post_code" data-percentage="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['sort_order']), ENT_QUOTES, 'UTF-8');?>
" style="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['display_row']->value, ENT_QUOTES, 'UTF-8');?>
">
                            <?php } else { ?>
                                <div class="row sort_data" data-percentage="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['sort_order']), ENT_QUOTES, 'UTF-8');?>
" style="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['display_row']->value, ENT_QUOTES, 'UTF-8');?>
">
                                <?php }?> 
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label"for="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == "postcode") {?> style="font-size: 12px;"<?php }?>><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable7 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable7,'mod'=>'supercheckout'),$_smarty_tpl ) );?>
:
                                            <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'vat_number') {?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['need_vat']->value) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php } else { ?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] == 1) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php }?>
                                        </label>
                                        <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state') {?>
                                            <input type='hidden' class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                                            <select name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?> onchange="restrictAutofillbyCountry(this)" <?php }?> class="form-control supercheckout-large-field">
                                                <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?>
                                                    <option value="0">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['country']->value['id_country']), ENT_QUOTES, 'UTF-8');?>
"  id='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
' <?php if ($_smarty_tpl->tpl_vars['country']->value['id_country'] == $_smarty_tpl->tpl_vars['default_country']->value) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>                                        
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <?php } else { ?>
                                                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select State','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</option>
                                                <?php }?>                            
                                            </select>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'dob') {?>
                                            <div class="supercheckout_dob_box supercheckout-large-field">
                                                <select name="payment_address[dob_days]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['days']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_months]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_years]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['years']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'other') {?>
                                            <input type="text" name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control">
                                        <?php } else { ?>

                                            <?php if ($_smarty_tpl->tpl_vars['settings']->value['google_auto_address']['enable'] == 1) {?>
                                                <input autocomplete="off" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?> placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter a location','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id='payment_address_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
' onFocus="geolocate()"<?php }?> type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="form-control supercheckout-large-field <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?>autocomplete<?php }?>" />
                                            <?php } else { ?>
                                                <input autocomplete="off" type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control" />
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['html_format'] == 2) {?>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label"for="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]"><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable8 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable8,'mod'=>'supercheckout'),$_smarty_tpl ) );?>
:
                                            <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'vat_number') {?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['need_vat']->value) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php } else { ?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] == 1) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php }?>
                                        </label>
                                        <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state') {?>
                                            <input type='hidden' class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                                            <select name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?> onchange="restrictAutofillbyCountry(this)" <?php }?> class="form-control supercheckout-large-field">
                                                <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?>
                                                    <option value="0">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['country']->value['id_country']), ENT_QUOTES, 'UTF-8');?>
"  id='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
' <?php if ($_smarty_tpl->tpl_vars['country']->value['id_country'] == $_smarty_tpl->tpl_vars['default_country']->value) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>                                        
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <?php } else { ?>
                                                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select State','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</option>
                                                <?php }?>                            
                                            </select>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'dob') {?>
                                            <div class="supercheckout_dob_box supercheckout-large-field">
                                                <select name="payment_address[dob_days]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['days']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_months]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_years]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['years']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'other') {?>
                                            <input type="text" name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control">
                                        <?php } else { ?>

                                            <?php if ($_smarty_tpl->tpl_vars['settings']->value['google_auto_address']['enable'] == 1) {?>
                                                <input autocomplete="off" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?> placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter a location','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id='payment_address_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
' onFocus="geolocate()"<?php }?> type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="form-control supercheckout-large-field <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?>autocomplete<?php }?>" />
                                            <?php } else { ?>
                                                <input autocomplete="off" type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control" />
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'postcode') {?>
                                <div class="sort_data" id="payment_post_code" data-percentage="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['sort_order']), ENT_QUOTES, 'UTF-8');?>
" style="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['display_row']->value, ENT_QUOTES, 'UTF-8');?>
">
                                <?php } else { ?>
                                    <div class="sort_data" data-percentage="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['sort_order']), ENT_QUOTES, 'UTF-8');?>
" style="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['display_row']->value, ENT_QUOTES, 'UTF-8');?>
">
                                    <?php }?> 
                                    <div class="form-group ">
                                        <label class="control-label"for="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]"><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value]['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable9 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable9,'mod'=>'supercheckout'),$_smarty_tpl ) );?>
:
                                            <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'vat_number') {?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['need_vat']->value) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php } else { ?>
                                                <span style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['payment_address'][$_smarty_tpl->tpl_vars['p_address_key']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] == 1) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span>
                                            <?php }?>
                                        </label>
                                        <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'id_state') {?>
                                            <input type='hidden' class="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
                                            <select name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?> onchange="restrictAutofillbyCountry(this)" <?php }?> class="form-control supercheckout-large-field">
                                                <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'id_country') {?>
                                                    <option value="0">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['country']->value['id_country']), ENT_QUOTES, 'UTF-8');?>
"  id='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
' <?php if ($_smarty_tpl->tpl_vars['country']->value['id_country'] == $_smarty_tpl->tpl_vars['default_country']->value) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>                                        
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                <?php } else { ?>
                                                    <option value="0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select State','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</option>
                                                <?php }?>                            
                                            </select>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'dob') {?>
                                            <div class="supercheckout_dob_box supercheckout-large-field">
                                                <select name="payment_address[dob_days]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['days']->value, 'day');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['day']->value), ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_months]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <select name="payment_address[dob_years]">
                                                    <option value="">--</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['years']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
                                                        <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['p_address_key']->value == 'other') {?>
                                            <input type="text" name="payment_address[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_address_key']->value, ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control">
                                        <?php } else { ?>

                                            <?php if ($_smarty_tpl->tpl_vars['settings']->value['google_auto_address']['enable'] == 1) {?>
                                                <input autocomplete="off" <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?> placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter a location','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id='payment_address_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
' onFocus="geolocate()"<?php }?> type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="form-control supercheckout-large-field <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['google_region_type']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['p_address_key']->value == 'address1' || $_smarty_tpl->tpl_vars['p_address_key']->value == 'address2') {?>autocomplete<?php }?>" />
                                            <?php } else { ?>
                                                <input autocomplete="off" type="text" name="payment_address[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['p_address_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="" class="supercheckout-large-field form-control" />
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                            
                </div>
                            </div>
            <!-- INSERT INTO #BILLING ADDRESS -->
            <!-- Start - Code to insert custom fields in billing address form block -->
   <div class="div_custom_fields">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['field']->value['position'] == 'payment_address_form') {?>
                                <div class="supercheckout-blocks form-group">
                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "textbox") {?>
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <input type="text" name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['default_value'], ENT_QUOTES, 'UTF-8');?>
" class="supercheckout-large-field width_100 form-control">
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "textarea") {?>
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <textarea name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" class="supercheckout-large-field width_100 form-control" style="width: 100%; height: 100px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['default_value'], ENT_QUOTES, 'UTF-8');?>
</textarea>
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "selectbox") {?>
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <select name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" class="supercheckout-large-field width_100 form-control">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['options'], 'field_options');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_options']->value) {
?>
                                                <option <?php if ($_smarty_tpl->tpl_vars['field_options']->value['default_value'] == $_smarty_tpl->tpl_vars['field_options']->value['option_value']) {?>selected<?php }?> value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_value'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_label'], ENT_QUOTES, 'UTF-8');?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "radio") {?>
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <?php $_smarty_tpl->_assignInScope('radio_counter', 1);?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['options'], 'field_options');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_options']->value) {
?>
                                            <div class="supercheckout-extra-wrap">
                                                <div class="radio" id="uniform-field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
"><span>
                                                        <input type="radio" name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_value'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['field_options']->value['default_value'] == $_smarty_tpl->tpl_vars['field_options']->value['option_value']) {?>checked<?php }?>>
                                                        <label for="field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_label'], ENT_QUOTES, 'UTF-8');?>
</label>
                                                    </span></div>
                                                
                                            </div>
                                            <?php $_smarty_tpl->_assignInScope('radio_counter', $_smarty_tpl->tpl_vars['radio_counter']->value+1);?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "checkbox") {?>
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['field']->value['options'], 'field_options');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field_options']->value) {
?>
                                            <div class="input-box input-field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
">
                                                <div class="checker checkbox" id="uniform-field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
">
                                                    <span class="checked">
                                                        <input <?php if ($_smarty_tpl->tpl_vars['field_options']->value['default_value'] == $_smarty_tpl->tpl_vars['field_options']->value['option_value']) {?>checked<?php }?> type="checkbox" name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_value'], ENT_QUOTES, 'UTF-8');?>
">
                                                        <label for="field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field_options']->value['option_label'], ENT_QUOTES, 'UTF-8');?>
</b></label>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                    <?php }?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "date") {?>                         
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <input style="position: relative;" type="text" id="" name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['default_value'], ENT_QUOTES, 'UTF-8');?>
" class="supercheckout-large-field width_100 kb_sc_custom_field_date form-control" readonly="true">
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                        <?php if (isset($_smarty_tpl->tpl_vars['field']->value['validation_type']) && $_smarty_tpl->tpl_vars['field']->value['validation_type'] == 'isDate') {?>
                                            <span style="color:#999999">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date format is Y-m-d','mod'=>'supercheckout'),$_smarty_tpl ) );?>

                                            </span>
                                        <?php }?>
                                    <?php }?>
                                    
                                                                        <?php if ($_smarty_tpl->tpl_vars['field']->value['type'] == "file") {?>                         
                                        <label class="cursor_help" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_help_text'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['field_label'], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['field']->value['required'] == "1") {?><span style="display:inline;" class="supercheckout-required">*</span><?php }?></label>
                                        <input type="file" data-buttonText="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose file','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id="kb_sc_custom_field_file_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" name="custom_fields[field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['default_value'], ENT_QUOTES, 'UTF-8');?>
" class="supercheckout-large-field width_100 kbfiletype form-control">
                                        <span id="error_field_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['id_velsof_supercheckout_custom_fields'], ENT_QUOTES, 'UTF-8');?>
" class="errorsmall_custom hidden_custom"></span>
                                        <?php if (isset($_smarty_tpl->tpl_vars['field']->value['validation_type']) && $_smarty_tpl->tpl_vars['field']->value['validation_type'] == 'isFile') {?>
                                            <span style="color:#999999">
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Supported file formats are PDF, JPEG, PNG, DOCX, CSV & GIF.','mod'=>'supercheckout'),$_smarty_tpl ) );?>

                                            </span>
                                        <?php }?>
                                    <?php }?>
                                                                    </div>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
            <!-- End - Code to insert custom fields in billing address form block -->
            <div style="display: none;">
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'First Name','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last Name','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Company','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Vat Number','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Address Line 1','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Address Line 2','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Zip/Postal Code','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'City','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Country','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'State','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Identification Number','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Home Phone','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mobile Phone','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Address Title','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Kita Informacija','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
            </div>
            <!-- end /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/payment_address.tpl --><?php }
}
