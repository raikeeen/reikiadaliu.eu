{* 
* @Module Name: AP Page Builder
* @Website: apollotheme.com - prestashop template provider
* @author Apollotheme <apollotheme@gmail.com>
* @copyright Apollotheme
* @description: ApPageBuilder is module help you can build content for your shop
*}
<div class="row custom_header">        <div class="new_year_logo col-12 col-sm-12 col-sp-12 col-md-6 col-lg-2 col-xl-2 ApColumn width-block">            <a href="{$urls.base_url}">                <img class="logo mobile-center width-img" src="{$shop.logo}" alt="{$shop.name}">            </a>        </div>        <div class="col-12 col-sm-12 col-sp-12 col-md-12  col-lg-4 col-xl-2 right-header ApColumn"             style="display: inline-block;float: right;">            <div id="leo_search_block_top" class="search-widget block exclusive">                <a id="click_show_search" href="javascript:void(0)" data-toggle="dropdown"                   class="float-xs-right popup-title">                    <i class="nova-search"></i>                </a>                <form method="get" action="https://rm-autodalys.lt/index.php?controller=productsearch"                      id="leosearchtopbox" style="min-width: 200px;">                    <input type="hidden" name="fc" value="module">                    <input type="hidden" name="module" value="leoproductsearch">                    <input type="hidden" name="controller" value="productsearch">                    <input type="hidden" name="leoproductsearch_static_token" value="a07d7ae97e9493c197340d1e54a29400">                    <div class="block_content clearfix leoproductsearch-content">                        <div class="list-cate-wrapper" style="display: none">                            <input id="leosearchtop-cate-id" name="cate" value="" type="hidden">                        </div>                        <div class="leoproductsearch-result">                            <div class="leoproductsearch-loading cssload-container">                                <div class="cssload-speeding-wheel"></div>                            </div>                            <input class="search_query form-control grey" type="text" id="leo_search_query_top"                                   name="search_query" value="" placeholder="Ieškoti mūsų kataloge">                            <button type="submit" id="leo_search_top_button"                                    class="btn btn-default button button-small"><i class="nova-search"></i></button>                        </div>                    </div>                </form>            </div><script type="text/javascript">                var blocksearch_type = 'top';            </script></div></div>