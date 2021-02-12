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
{extends file=$layout}

{block name='content'}

  <section id="main" class="container">
    <style>
      .note {
        margin: 0;
        font-size: 18px;
        line-height: 28px;
        font-weight: 700;
        padding: 12px;
        border: 2px dashed #363d4d;
        color: #363d4d;
        text-align: center;
      }

      .description {
        font-size: 18px;
        line-height: 28px;
        margin-bottom: 24px;
        white-space: normal;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: normal;
        line-height: 1.5;
      }

      .title {
        font-size: 28px;
        line-height: 36px;
        font-weight: 900;
        font-size: 24px;
        line-height: 1.3333;
        margin-bottom: 24px;
      }

      .content {
        position: relative;
        display: flex;
        flex-direction: column;
      }

      .body {
        font-family: 'Sora', sans-serif;
        font-size: 18px;
        line-height: 28px;
      }

      .container {
        position: absolute;
        overflow: visible;
        border-radius: 8px;
        padding-top: 48px;
        padding-right: 80px;
        padding-bottom: 48px;
        padding-left: 48px;
        background-image: none;
        background-repeat: no-repeat;
        background-size: initial;
        background-position: initial;
        background-color: rgba(255, 255, 255, 1);
        color: rgba(54, 61, 77, 1);
        box-shadow: 0 10px 24px 0 rgb(54 61 77 / 15%);
        border-radius: 0;
        bottom: 35px;
        top: auto;
        width: 15%;
        left: 35px;
      }

      .page-1 {
        left: 32px;
        right: auto;
        bottom: 32px;
        margin: 0;
      }

      .close {
        color: inherit;
        top: 0;
        right: 0;
        padding: 16px;
        position: absolute;
        z-index: 1;
      }
    </style>
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

    <div class="cart-grid row">

      <!-- Left Block: cart product informations & shpping -->
      <div class="cart-grid-body col-xs-12 col-lg-8">

        <!-- cart products detailed -->
        <div class="card cart-container">
          <div class="card-block">
            <h1 class="h1">{l s='PIRKINIŲ KREPŠELIS' d='Shop.Theme.Checkout'}</h1>
          </div>
          <hr class="separator">
          {block name='cart_overview'}
            {include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
          {/block}
        </div>

        {block name='continue_shopping'}
          <a class="btn btn-primary" href="{$urls.pages.index}">
            <i class="material-icons">&#xE5CB;</i>{l s='Continue shopping' d='Shop.Theme.Actions'}
          </a>
        {/block}

        <!-- shipping informations -->
        {block name='hook_shopping_cart_footer'}
          {hook h='displayShoppingCartFooter'}
        {/block}
      </div>

      <!-- Right Block: cart subtotal & cart total -->
      <div class="cart-grid-right col-xs-12 col-lg-4">

        {block name='cart_summary'}
          <div class="card cart-summary">

            {block name='hook_shopping_cart'}
              {hook h='displayShoppingCart'}
            {/block}

            {block name='cart_totals'}
              {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
            {/block}

            {block name='cart_actions'}
              {include file='checkout/_partials/cart-detailed-actions.tpl' cart=$cart}
            {/block}

          </div>
        {/block}

        {block name='hook_reassurance'}
          {hook h='displayReassurance'}
        {/block}

      </div>

    </div>
  </section>
{/block}
