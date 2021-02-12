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
<!doctype html>
<html lang="{$language.iso_code}" {if isset($IS_RTL) && $IS_RTL} dir="rtl"{if isset($LEO_RTL) && $LEO_RTL} class="rtl{if isset($LEO_DEFAULT_SKIN)} {$LEO_DEFAULT_SKIN}{/if}"{/if}
{else} class="{if isset($LEO_DEFAULT_SKIN)}{$LEO_DEFAULT_SKIN}{/if}" {/if}>

  <head>
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name}" class="{$page.body_classes|classnames}{if isset($LEO_LAYOUT_MODE)} {$LEO_LAYOUT_MODE}{/if}{if isset($USE_FHEADER) && $USE_FHEADER} keep-header{/if}">
  <style>
      @media screen and (min-width: 1300px) {
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

          .description-promo {
              font-size: 18px;
              line-height: 28px;
              margin-bottom: 24px;
              white-space: normal;
              overflow-wrap: break-word;
              word-wrap: break-word;
              word-break: normal;
              line-height: 1.5;
          }

          .title-promo {
              font-size: 28px;
              line-height: 36px;
              font-weight: 900;
              font-size: 24px;
              line-height: 1.3333;
              margin-bottom: 24px;
          }

          .content-promo {
              position: relative;
              display: flex;
              flex-direction: column;
          }

          .body-promo {
              font-family: 'Sora', sans-serif;
              font-size: 18px;
              line-height: 28px;
          }

          .container-promo {
              position: fixed;
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
              width: 25%;
              left: 35px;
              z-index: 999;

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
          @media screen and (max-width: 700px) {
              .container-promo{
                  width: 60%;
                  padding-top: 40px;
                  padding-right: 35px;
                  padding-bottom: 40px;
                  padding-left: 35px;
              }
              .title-promo{
                  font-size: 17px;
                  margin-bottom: 0px;
              }
              .description-promo{
                  margin-bottom: 0px;
              }
              .body-promo{
                  font-family: 'Sora', sans-serif;
                  font-size: 14px;
                  line-height: 18px;
              }
          }
          @media screen and (max-width: 1100px) {
              .container-promo{
                  width: 30%;
                  padding-top: 40px;
                  padding-right: 35px;
                  padding-bottom: 40px;
                  padding-left: 35px;
              }
              .title-promo{
                  font-size: 20px;
                  margin-bottom: 0px;
              }
              .description-promo{
                  margin-bottom: 0px;
              }
              .body-promo{
                  font-family: 'Sora', sans-serif;
                  font-size: 16px;
                  line-height: 22px;
              }
          }
          @media screen and (max-width: 1300px) {
              .container-promo{
                  width: 40%;
                  padding-top: 40px;
                  padding-right: 35px;
                  padding-bottom: 40px;
                  padding-left: 35px;
              }
              .title-promo{
                  font-size: 20px;
                  margin-bottom: 0px;
              }
              .description-promo{
                  margin-bottom: 0px;
              }
              .body-promo{
                  font-family: 'Sora', sans-serif;
                  font-size: 16px;
                  line-height: 22px;
              }
          }
      }
  </style>
  {if $cart.totals.total_including_tax.value > 150}
      <div class="row" id="promo" style="display: block">
          <div class="col-2">
              <div id="root">
                  <div role="dialog" id="wpreview" class="page-1 page-last" expanded="true" style="">
                      <div class="container-promo">
                          <div class="body-promo">
                              <div class="content-promo no-fields"><h1 class="title-promo">SVEIKINAME!</h1>
                                  <p class="description-promo">
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
  <div id="page">
    {block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}

    <header id="header">
      {block name='header'}
        {include file='checkout/_partials/header.tpl'}
      {/block}
    </header>

    {block name='notifications'}
      {include file='_partials/notifications.tpl'}
    {/block}

    <section id="wrapper">
      {hook h="displayWrapperTop"}
      <div class="container">

      {block name='content'}
        <section id="content">
          <div class="row">
            <div class="cart-grid-body col-xl-8 col-lg-12 col-xs-12">
              <div id="box-checkout-step">
                {block name='cart_summary'}
                  {render file='checkout/checkout-process.tpl' ui=$checkout_process}
                {/block}
              </div>
            </div>
            <div class="cart-grid-body col-xl-4 col-lg-12 col-xs-12">

              {block name='cart_summary'}
                {include file='checkout/_partials/cart-summary.tpl' cart = $cart}
              {/block}

              {hook h='displayReassurance'}
            </div>
          </div>
        </section>
      {/block}
      </div>
      {hook h="displayWrapperBottom"}
    </section>

    <footer id="footer" class="footer-container">
        {block name='hook_footer_before'}
          <div class="footer-top">
            {if isset($fullwidth_hook.displayFooterBefore) AND $fullwidth_hook.displayFooterBefore == 0}
              <div class="container">
            {/if}
              <div class="inner">{hook h='displayFooterBefore'}</div>
            {if isset($fullwidth_hook.displayFooterBefore) AND $fullwidth_hook.displayFooterBefore == 0}
              </div>
            {/if}
          </div>
        {/block}
        {block name='hook_footer'}
          <div class="footer-center">
            {if isset($fullwidth_hook.displayFooter) AND $fullwidth_hook.displayFooter == 0}
              <div class="container">
            {/if}
              <div class="inner">{hook h='displayFooter'}</div>
            {if isset($fullwidth_hook.displayFooter) AND $fullwidth_hook.displayFooter == 0}
              </div>
            {/if}
          </div>
        {/block}
        {block name='hook_footer_after'}
          <div class="footer-bottom">
            {if isset($fullwidth_hook.displayFooterAfter) AND $fullwidth_hook.displayFooterAfter == 0}
              <div class="container">
            {/if}
              <div class="inner">{hook h='displayFooterAfter'}</div>
            {if isset($fullwidth_hook.displayFooterAfter) AND $fullwidth_hook.displayFooterAfter == 0}
              </div>
            {/if}
          </div>
        {/block}
      {if isset($LEO_BACKTOP) && $LEO_BACKTOP}
        <div id="back-top"><a href="#" class="fa fa-angle-up"></a></div>
      {/if}
    </footer>

    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}
  </div>
  </body>

</html>
