<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:39:56
  from '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/templates/_partials/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5cc39d031_95529850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37ef31f01a139a7346f066e5e3eb34a5b433600b' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/templates/_partials/header.tpl',
      1 => 1612461546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5cc39d031_95529850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10649253866038a5cc394839_68498627', 'header_banner');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18502376536038a5cc396ac7_22667021', 'header_nav');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17574484536038a5cc39a313_07864754', 'header_top');
?>

<?php }
/* {block 'header_banner'} */
class Block_10649253866038a5cc394839_68498627 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_banner' => 
  array (
    0 => 'Block_10649253866038a5cc394839_68498627',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="header-banner">
        <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayBanner']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayBanner'] == 0) {?>
        <div class="container">
            <?php }?>
            <div class="inner"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBanner'),$_smarty_tpl ) );?>
</div>
            <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayBanner']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayBanner'] == 0) {?>
        </div>
        <?php }?>
    </div>
<?php
}
}
/* {/block 'header_banner'} */
/* {block 'header_nav'} */
class Block_18502376536038a5cc396ac7_22667021 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_nav' => 
  array (
    0 => 'Block_18502376536038a5cc396ac7_22667021',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <nav class="header-nav">
        <div class="topnav">
            <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav1']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav1'] == 0) {?>
            <div class="container">
                <?php }?>
                <div class="inner"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav1'),$_smarty_tpl ) );?>
</div>
                <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav1']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav1'] == 0) {?>
            </div>
            <?php }?>
        </div>
        <div class="bottomnav">
            <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav2']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav2'] == 0) {?>
            <div class="container">
                <?php }?>
                <div class="inner"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNav2'),$_smarty_tpl ) );?>
</div>
                <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav2']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayNav2'] == 0) {?>
            </div>
            <?php }?>
        </div>
    </nav>
<?php
}
}
/* {/block 'header_nav'} */
/* {block 'header_top'} */
class Block_17574484536038a5cc39a313_07864754 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header_top' => 
  array (
    0 => 'Block_17574484536038a5cc39a313_07864754',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="header-top">
        <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayTop']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayTop'] == 0) {?>
        <div class="container">
            <?php }?>
            <?php echo '<script'; ?>

                    src="https://code.jquery.com/jquery-3.5.1.js"
                    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                    crossorigin="anonymous"><?php echo '</script'; ?>
>
            <div class="inner">
                <div class="row custom_header">
                    <div class="new_year_logo col-12 col-sm-12 col-sp-12 col-md-6 col-lg-2 col-xl-2 ApColumn width-block">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
                            <img class="logo mobile-center width-img" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
" >
                        </a>
                    </div>

                    <div class="col-12 col-sm-12 col-sp-12 col-md-12  col-lg-4 col-xl-2 right-header ApColumn" style="display: inline-block;float: right;">
                        <!-- @file modules\appagebuilder\views\templates\hook\ApModule -->


                        <div id="leo_search_block_top" class="search-widget block exclusive">
                            <a id="click_show_search" href="javascript:void(0)" data-toggle="dropdown" class="float-xs-right popup-title">
                                <i class="nova-search"></i>
                            </a>
                            <form method="get" action="https://rm-autodalys.lt/index.php?controller=productsearch" id="leosearchtopbox" style="min-width: 200px;">
                                <input type="hidden" name="fc" value="module">
                                <input type="hidden" name="module" value="leoproductsearch">
                                <input type="hidden" name="controller" value="productsearch">
                                <input type="hidden" name="leoproductsearch_static_token" value="a07d7ae97e9493c197340d1e54a29400">
                                <div class="block_content clearfix leoproductsearch-content">
                                    <div class="list-cate-wrapper" style="display: none">
                                        <input id="leosearchtop-cate-id" name="cate" value="" type="hidden">
                                    </div>
                                    <div class="leoproductsearch-result">
                                        <div class="leoproductsearch-loading cssload-container">
                                            <div class="cssload-speeding-wheel"></div>
                                        </div>
                                        <input class="search_query form-control grey" type="text" id="leo_search_query_top" name="search_query" value="" placeholder="Ieškoti mūsų kataloge">
                                        <button type="submit" id="leo_search_top_button" class="btn btn-default button button-small"><i class="nova-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php echo '<script'; ?>
 type="text/javascript">
                            var blocksearch_type = 'top';
                        <?php echo '</script'; ?>
>
                    </div>
                </div>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayTop'),$_smarty_tpl ) );?>
</div>
            <?php if (isset($_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayTop']) && $_smarty_tpl->tpl_vars['fullwidth_hook']->value['displayTop'] == 0) {?>
        </div>
        <?php }?>
    </div>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayNavFullWidth'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'header_top'} */
}
