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
<div id="js-product-list">
  <div class="products">  
    {assign var="leo_page" value='category'}
    {include file='catalog/_partials/miniatures/leo_col_products.tpl' products=$listing.products}   
  </div>

  {block name='pagination'}
    {include file='_partials/pagination.tpl' pagination=$listing.pagination}
  {/block}
  {if $cart.totals.total_including_tax.value > 150}
    <div class="row" id="promo" style="display: block">
      <div class="col-2">
        <div id="root">
          <div role="dialog" id="wpreview" class="page-1 page-last" expanded="true" style="">
            <div class="container">
              <div class="body">
                <div class="content no-fields"><h1 class="title">SVEIKINAME!</h1>
                  <p class="description">
                  <div>ŠIAM UŽSAKYMUI DOVANOJAME JUMS 5% NUOLAIDĄ SU KODU</div>
                  </p>
                  <form novalidate="" class="form valid pristine"></form>
                  <p class="note">
                    <span>YSCDH7KQ</span>
                  </p></div>
              </div>
              <button type="button" class="close"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  {/if}
  <div class="hidden-xs-up text-xs-right up">
    <a href="#header" class="btn btn-secondary">
      {l s='Back to top' d='Shop.Theme.Actions'}
      <i class="material-icons">&#xE316;</i>
    </a>
  </div>
</div>
