<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from 'module:supercheckoutviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2e16716_58343173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77a8c89b5cc25551a023bdd03fd7686fa7999fed' => 
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
function content_6038a5d2e16716_58343173 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/login.tpl --><?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
    <div class="myaccount rectangle-list text-center">
        <ul class="accountOptions">
            <li class="myAccountLi">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
"><i class="fa fa-user"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Account','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</a>
            </li>
            <li  class="accountLogoutLi">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sc_logout_url']->value, ENT_QUOTES, 'UTF-8');?>
"><i class="fa fa-sign-out"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Logout','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</a>
            </li>
        </ul>

        <!-- Start - Code to insert custom fields in registration form block -->
        <div class="div_custom_fields">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['field']->value['position'] == 'customer_registration_block') {?>
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
        <!-- End - Code to insert custom fields in registration form block -->

    </div>
<?php } else { ?>
    <?php if (isset($_smarty_tpl->tpl_vars['mobileLoginActive']->value) && ($_smarty_tpl->tpl_vars['mobileLoginActive']->value == 1)) {?>
        <div class="form-group" style="text-align: center;">
            <a href="javascript:void(0)" onclick="showMobileLoginPopup()"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login/Register with mobile','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</a>
        </div>
    <?php }?>
    <div id="supercheckout-option" class="form-group login-options text-center" style="display:block">
        <div class="radio-inline">
            <?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 0) {?>
                <input type="radio" name="checkout_option" value="0" id="logged_checkout" checked>
            <?php } else { ?>
                <input type="radio" name="checkout_option" value="0" id="logged_checkout">
            <?php }?>
            <label for="logged_checkout" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['enable_guest_checkout'] == 1 && $_smarty_tpl->tpl_vars['guest_enable_by_system']->value) {?>
            <div class="radio-inline">
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 1 || ($_smarty_tpl->tpl_vars['settings']->value['enable_guest_checkout'] == 0 && $_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 1)) {?>
                    <input type="radio" name="checkout_option" value="1" id="guest_checkout" checked>
                <?php } else { ?>
                    <input type="radio" name="checkout_option" value="1" id="guest_checkout">
                <?php }?>
                <label for="guest_checkout"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guest','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
            </div>
        <?php }?>
        <div class="radio-inline">
            <?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 2 || ($_smarty_tpl->tpl_vars['settings']->value['enable_guest_checkout'] == 0 && $_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 1)) {?>
                <input type="radio" name="checkout_option" value="2" id="register_checkout" checked>
            <?php } else { ?>
                <input type="radio" name="checkout_option" value="2" id="register_checkout">
            <?php }?>
            <label for="register_checkout"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
        </div>
    </div>

    <div class="login-form">
        <div class="form-group supercheckout-extra-wrap">
            <!--label class="control-label" for="input-email">E-Mail</label-->
            <input type="text" name="supercheckout_email" value="" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'E-Mail','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id="email" class="form-control supercheckout-large-field">
        </div>
        <div id="supercheckout-login-box" class="form-group" style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 0) {?>block<?php } else { ?>none<?php }?>;">
            <div id="supercheckout-login-password-box" class="supercheckout-extra-wrap">
                <input type="password" name="supercheckout_password" value="" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" onkeydown="checkAction(event)" id="password" class="form-control margin-b15 supercheckout-large-field">
            </div>
            <div id="forgotpasswordlink"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['forgotten_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="label-link pull-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Forgotten Password','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</a></div>
            <input type="hidden" name="SubmitLogin" value="SubmitLogin" />
            <!---->
            <p class="loginBtn"><input type="button" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id="button-login" data-loading-text="Loading..." class="btn btn-primary orangebuttonsmall"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_image_path']->value, ENT_QUOTES, 'UTF-8');?>
loading12.gif" style="display:none;"/></p>
        </div>

    </div>

    <!-- INSERT INTO #REGISTRATION FORM -->    
    <!-- Start - Code to insert custom fields in registration form block -->
     <div class="div_custom_fields">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['field']->value['position'] == 'customer_registration_block') {?>
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
    <!-- End - Code to insert custom fields in registration form block -->


    <div class="register-section" id="supercheckout-new-customer-form" style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] != 0) {?>block<?php } else { ?>none<?php }?>;">
        <table id="customer_person_information_table" class="supercheckout-form" style="margin-bottom:0 !important;width:100%;">
            <tr id="new_customer_password" class="sort_data register_type"  data-percentage="0" style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['checkout_option'] == 2) {?>block<?php } else { ?>none<?php }?>;" >
                <td style="display: block;">
                    <div class="form-group ">
                        <input type="password" name="customer_personal[password]" value="" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'supercheckout'),$_smarty_tpl ) );?>
" id="password" class="form-control margin-b15">		
                    </div>
                </td>
            </tr>
            <?php $_smarty_tpl->_assignInScope('counter', "0");?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value['customer_personal'], 'cus_info_field', false, 'cus_per_info');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cus_per_info']->value => $_smarty_tpl->tpl_vars['cus_info_field']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value][$_smarty_tpl->tpl_vars['user_type']->value]['display'] == 1) {?>
                    <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                    <tr class="sort_data"  data-percentage="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value]['sort_order']), ENT_QUOTES, 'UTF-8');?>
" >
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['cus_per_info']->value == 'id_gender') {?>
                                <div><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value]['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable1,'mod'=>'supercheckout'),$_smarty_tpl ) );?>
:<span style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] == 1) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span></div>
                                <div class="supercheckout_personal_id_gender inline-fields supercheckout-large-field">
                                    <div class="">                                                        
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genders']->value, 'gender', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['gender']->value) {
?>
                                            <div class="radio-inline">
                                                <div class="radio"><input type="radio" name="customer_personal[id_gender]" value="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['gender']->value->id), ENT_QUOTES, 'UTF-8');?>
" id="customer_gender_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['gender']->value->id), ENT_QUOTES, 'UTF-8');?>
" checked="checked"/>
                                                    <label for="customer_gender_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['gender']->value->id), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gender']->value->name,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</label>
                                                </div>
                                            </div>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                </div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['cus_per_info']->value == 'dob') {?>
                                <div style="margin-right: 18px;"><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value]['title'], ENT_QUOTES, 'UTF-8');
$_prefixVariable2 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_prefixVariable2,'mod'=>'supercheckout'),$_smarty_tpl ) );?>
:<span style="display:<?php if ($_smarty_tpl->tpl_vars['settings']->value['customer_personal'][$_smarty_tpl->tpl_vars['cus_per_info']->value][$_smarty_tpl->tpl_vars['user_type']->value]['require'] == 1) {?>inline<?php } else { ?>none<?php }?>;" class="supercheckout-required">*</span></div>                                                    
                                <div class="supercheckout_personal_dob inline-fields supercheckout-large-field">
                                    <div class="" style="display: inline-block;width: 100%;">
                                        <div class="" style="display: inline-block;">
                                            <select name="customer_personal[dob_days]">
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
                                        </div>
                                            <div class="" style="display: inline-block;">
                                            <select name="customer_personal[dob_months]">
                                                <option value="">--</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month_name', false, 'month_value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month_value']->value => $_smarty_tpl->tpl_vars['month_name']->value) {
?>
                                                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month_value']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['month_name']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                        </div>
                                            <div class="" style="display: inline-block;">
                                            <select name="customer_personal[dob_years]">
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
                                    </div>
                                </div>
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['settings']->value['customer_subscription'], 'cus_info_field', false, 'cus_subs_info');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cus_subs_info']->value => $_smarty_tpl->tpl_vars['cus_info_field']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['customer_subscription'][$_smarty_tpl->tpl_vars['cus_subs_info']->value]['guest']['display'] == 1) {?>
                    <tr class="sort_data"  data-percentage="<?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['counter']->value, ENT_QUOTES, 'UTF-8');
$_prefixVariable3 = ob_get_clean();
echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['settings']->value['customer_subscription'][$_smarty_tpl->tpl_vars['cus_subs_info']->value]['sort_order']+$_prefixVariable3), ENT_QUOTES, 'UTF-8');?>
" >
                        <td>
                            <div class="input-box" >
                                <input type="checkbox" class="supercheckout_offers_option" name="customer_personal[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cus_subs_info']->value, ENT_QUOTES, 'UTF-8');?>
]" id="customer_personal_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cus_subs_info']->value, ENT_QUOTES, 'UTF-8');?>
"  <?php if ($_smarty_tpl->tpl_vars['settings']->value['customer_subscription'][$_smarty_tpl->tpl_vars['cus_subs_info']->value]['guest']['checked'] == 1) {?>checked="checked"<?php }?> >
                                <label for="customer_personal_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cus_subs_info']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['settings']->value['customer_subscription'][$_smarty_tpl->tpl_vars['cus_subs_info']->value]['title'],'mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
                            </div>
                        </td>
                    </tr>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    </div>
    <div id="social_login_block" style="display: none;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['fb_login']['enable'] != 1 && $_smarty_tpl->tpl_vars['settings']->value['google_login']['enable'] != 1 && $_smarty_tpl->tpl_vars['settings']->value['paypal_login']['enable'] != 1) {?>
            <?php if (isset($_smarty_tpl->tpl_vars['show_on_supercheckout']->value) && $_smarty_tpl->tpl_vars['show_on_supercheckout']->value['status'] == 1) {?>
                <div class="social-head">
                    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'OR','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>

                </div>
                <h4 class="vss_socialloginizer_buttons" id="ivss_socialloginizer_buttons"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign in with','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</h4>            
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'customLoginizerShortCodeHook','id_layout'=>((string)$_smarty_tpl->tpl_vars['show_on_supercheckout']->value['layout'])),$_smarty_tpl ) );?>

                            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['fb_login']['enable'] == 1 || $_smarty_tpl->tpl_vars['settings']->value['google_login']['enable'] == 1 || $_smarty_tpl->tpl_vars['settings']->value['paypal_login']['enable'] == 1) {?>
            <div class="social-login">
                <div class="social-head">
                    <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'OR','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</span>

                </div>
                <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign in with','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</h4>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['fb_login']['enable'] == 1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['social_login_popup']['enable'] == 1) {?>
                        <a onclick="return !window.open(this.href, 'popup', 'width=450,height=300,left=500,top=500')" target="_blank" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['supercheckout_url']->value,'quotes' )), ENT_QUOTES, 'UTF-8');?>
&myfbLogin" class="fbButton btn azm-social azm-btn azm-pill azm-facebook" id="fb-auth" ><i class="fab fa-facebook-f"></i>  Facebook</a>
                    <?php } else { ?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supercheckout_url']->value, ENT_QUOTES, 'UTF-8');?>
&myfbLogin" class="fbButton btn azm-social azm-btn azm-pill azm-facebook" id="fb-auth" ><i class="fab fa-facebook-f"></i> Facebook</a>
                    <?php }?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['google_login']['enable'] == 1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['social_login_popup']['enable'] == 1) {?>
                        <a onclick="return !window.open(this.href, 'popup', 'width=500,height=500,left=500,top=500')" target="_blank" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['supercheckout_url']->value,'quotes' )), ENT_QUOTES, 'UTF-8');?>
&myGoogleLogin" class="googleButton btn azm-social azm-btn azm-pill azm-google-plus" ><i class="fab fa-google"></i> Google</a>
                    <?php } else { ?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supercheckout_url']->value, ENT_QUOTES, 'UTF-8');?>
&myGoogleLogin" class="googleButton btn azm-social azm-btn azm-pill azm-google-plus" ><i class="fab fa-google"></i> Google</a>
                    <?php }?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['settings']->value['paypal_login']['enable'] == 1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['social_login_popup']['enable'] == 1) {?>
                        <a onclick="return !window.open(this.href, 'popup', 'width=500,height=500,left=500,top=500')" target="_blank" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['supercheckout_url']->value,'quotes' )), ENT_QUOTES, 'UTF-8');?>
&myPaypalLogin" class="btn azm-social azm-btn azm-border-bottom azm-paypal" style="color: #ffffff; background: #009cde;"><i class="fa fa-paypal"></i>Login with Paypal</a>
                    <?php } else { ?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supercheckout_url']->value, ENT_QUOTES, 'UTF-8');?>
&myPaypalLogin" class="btn azm-social azm-btn azm-border-bottom azm-paypal" style="color: #ffffff; background: #009cde;"><i class="fa fa-paypal"></i>Login with Paypal</a>
                    <?php }?>
                <?php }?>
                <div class="supercheckout-clear"></div>
            </div>
        </div>

        <div class="socialNetwork">

        <?php }?>
    </div>
<?php }?>
<div style="display: none;">
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DOB','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign up for NewsLetter','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Special Offer','mod'=>'supercheckout'),$_smarty_tpl ) );?>
</label>
</div>
<!-- end /var/www/reikiadaliu.eu/public_html/modules/supercheckout/views/templates/front/login.tpl --><?php }
}
