<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/appagebuilder/views/templates/front/profiles/id_gencode_60263f8d8ac47_1613119373.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2bb7cb3_58083901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b556cc089c732452d7b36b5ffe862069031e6d2' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/modules/appagebuilder/views/templates/front/profiles/id_gencode_60263f8d8ac47_1613119373.tpl',
      1 => 1614325202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2bb7cb3_58083901 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row custom_header">        <div class="new_year_logo col-12 col-sm-12 col-sp-12 col-md-6 col-lg-2 col-xl-2 ApColumn width-block">            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">                <img class="logo mobile-center width-img" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">            </a>        </div>        <div class="col-12 col-sm-12 col-sp-12 col-md-12  col-lg-4 col-xl-2 right-header ApColumn"             style="display: inline-block;float: right;">            <div id="leo_search_block_top" class="search-widget block exclusive">                <a id="click_show_search" href="javascript:void(0)" data-toggle="dropdown"                   class="float-xs-right popup-title">                    <i class="nova-search"></i>                </a>                <form method="get" action="https://rm-autodalys.lt/index.php?controller=productsearch"                      id="leosearchtopbox" style="min-width: 200px;">                    <input type="hidden" name="fc" value="module">                    <input type="hidden" name="module" value="leoproductsearch">                    <input type="hidden" name="controller" value="productsearch">                    <input type="hidden" name="leoproductsearch_static_token" value="a07d7ae97e9493c197340d1e54a29400">                    <div class="block_content clearfix leoproductsearch-content">                        <div class="list-cate-wrapper" style="display: none">                            <input id="leosearchtop-cate-id" name="cate" value="" type="hidden">                        </div>                        <div class="leoproductsearch-result">                            <div class="leoproductsearch-loading cssload-container">                                <div class="cssload-speeding-wheel"></div>                            </div>                            <input class="search_query form-control grey" type="text" id="leo_search_query_top"                                   name="search_query" value="" placeholder="Ieškoti mūsų kataloge">                            <button type="submit" id="leo_search_top_button"                                    class="btn btn-default button button-small"><i class="nova-search"></i></button>                        </div>                    </div>                </form>            </div><?php echo '<script'; ?>
 type="text/javascript">                var blocksearch_type = 'top';            <?php echo '</script'; ?>
></div></div><?php }
}
