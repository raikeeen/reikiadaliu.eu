{**
 *  PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright  PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{block name='header_banner'}
    <div class="header-banner">
        {if isset($fullwidth_hook.displayBanner) AND $fullwidth_hook.displayBanner == 0}
        <div class="container">
            {/if}
            <div class="inner">{hook h='displayBanner'}</div>
            {if isset($fullwidth_hook.displayBanner) AND $fullwidth_hook.displayBanner == 0}
        </div>
        {/if}
    </div>
{/block}

{block name='header_nav'}
    <nav class="header-nav">
        <div class="topnav">
            {if isset($fullwidth_hook.displayNav1) AND $fullwidth_hook.displayNav1 == 0}
            <div class="container">
                {/if}
                <div class="inner">{hook h='displayNav1'}</div>
                {if isset($fullwidth_hook.displayNav1) AND $fullwidth_hook.displayNav1 == 0}
            </div>
            {/if}
        </div>
        <div class="bottomnav">
            {if isset($fullwidth_hook.displayNav2) AND $fullwidth_hook.displayNav2 == 0}
            <div class="container">
                {/if}
                <div class="inner">{hook h='displayNav2'}</div>
                {if isset($fullwidth_hook.displayNav2) AND $fullwidth_hook.displayNav2 == 0}
            </div>
            {/if}
        </div>
    </nav>
{/block}

{block name='header_top'}
    <div class="header-top">
        {if isset($fullwidth_hook.displayTop) AND $fullwidth_hook.displayTop == 0}
        <div class="container">
            {/if}
            <script
                    src="https://code.jquery.com/jquery-3.5.1.js"
                    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                    crossorigin="anonymous"></script>
            <div class="inner">
                <div class="row custom_header">
                    <div class="new_year_logo col-12 col-sm-12 col-sp-12 col-md-6 col-lg-2 col-xl-2 ApColumn width-block">
                        <a href="{$urls.base_url}">
                            <img class="logo mobile-center width-img" src="{$shop.logo}" alt="{$shop.name}" >
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

                        <script type="text/javascript">
                            var blocksearch_type = 'top';
                        </script>
                    </div>
                </div>
                {hook h='displayTop'}</div>
            {if isset($fullwidth_hook.displayTop) AND $fullwidth_hook.displayTop == 0}
        </div>
        {/if}
    </div>
    {hook h='displayNavFullWidth'}
{/block}
