<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from 'module:leobootstrapmenuviewstemp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2c6c2f2_96312244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '024c8c8c69d901a42dd06af29ce07d10ab2dcb88' => 
    array (
      0 => 'module:leobootstrapmenuviewstemp',
      1 => 1606067078,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2c6c2f2_96312244 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/reikiadaliu.eu/public_html/modules/leobootstrapmenu/views/templates/hook/megamenu.tpl --><?php if (isset($_smarty_tpl->tpl_vars['error']->value) && $_smarty_tpl->tpl_vars['error']->value) {?>
    <div class="alert alert-warning leo-lib-error"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</div>
<?php } else { ?>
    
    <?php if ($_smarty_tpl->tpl_vars['group_type']->value && $_smarty_tpl->tpl_vars['group_type']->value == 'horizontal') {?>
            <nav data-megamenu-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="leo-megamenu cavas_menu navbar navbar-default <?php if ($_smarty_tpl->tpl_vars['show_cavas']->value && $_smarty_tpl->tpl_vars['show_cavas']->value == 1) {?>enable-canvas<?php } else { ?>disable-canvas<?php }?> <?php if ($_smarty_tpl->tpl_vars['group_class']->value && $_smarty_tpl->tpl_vars['group_class']->value != '') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['group_class']->value, ENT_QUOTES, 'UTF-8');
}?>" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                    <button type="button" class="navbar-toggler hidden-lg-up" data-toggle="collapse" data-target=".megamenu-off-canvas-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                                            <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Toggle navigation','mod'=>'leobootstrapmenu'),$_smarty_tpl ) );?>
</span>
                                            &#9776;
                                            <!--
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            -->
                                    </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                                                        <div class="leo-top-menu collapse navbar-toggleable-md megamenu-off-canvas megamenu-off-canvas-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['boostrapmenu']->value,'html','UTF-8' ));?>
</div>
            </nav>
            <?php echo '<script'; ?>
 type="text/javascript">
            // <![CDATA[				
                            // var type="horizontal";
                            // checkActiveLink();
                            // checkTarget();
                            list_menu_tmp.id = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
';
                            list_menu_tmp.type = 'horizontal';
            // ]]>
            
            <?php if ($_smarty_tpl->tpl_vars['show_cavas']->value && $_smarty_tpl->tpl_vars['show_cavas']->value == 1) {?>
                    						
                                    // offCanvas();
                                    // var show_cavas = 1;
                                    // console.log('testaaa');
                                    // console.log(show_cavas);
                                    list_menu_tmp.show_cavas =1;

                    
                    <?php } else { ?>
                    
                                    // var show_cavas = 0;
                                    list_menu_tmp.show_cavas =0;	
                    
            <?php }?>
                    
                    list_menu_tmp.list_tab = list_tab;
                    list_menu.push(list_menu_tmp);
                    list_menu_tmp = {};	
                    list_tab = {};
                    
            <?php echo '</script'; ?>
>
    <?php } else { ?>
            <div data-megamenu-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
" class="leo-verticalmenu <?php if ($_smarty_tpl->tpl_vars['group_class']->value && $_smarty_tpl->tpl_vars['group_class']->value != '') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['group_class']->value, ENT_QUOTES, 'UTF-8');
}?>">
                    <h4 class="title_block verticalmenu-button"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_title']->value, ENT_QUOTES, 'UTF-8');?>
</h4>
                    <div class="box-content block_content">
                            <div class="verticalmenu" role="navigation"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['boostrapmenu']->value,'html','UTF-8' ));?>
</div>
                    </div>
            </div>
            <?php echo '<script'; ?>
 type="text/javascript">
                    
                            // var type="vertical";	

                            list_menu_tmp.id = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_id']->value, ENT_QUOTES, 'UTF-8');?>
';			
                            list_menu_tmp.type = 'vertical';
                            list_menu_tmp.list_tab = list_tab;
                            list_menu.push(list_menu_tmp);
                            list_menu_tmp = {};
                            list_tab = {};
                    		
            <?php echo '</script'; ?>
>


    <?php }?>

<?php }?>
<!-- end /var/www/reikiadaliu.eu/public_html/modules/leobootstrapmenu/views/templates/hook/megamenu.tpl --><?php }
}
