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
    <div role="dialog" id="wpreview" class="page-1 page-last" expanded="true" style="">
        <div class="container">
            <div class="images"></div>
            <div class="body">
                <div class="content no-fields"><h1 class="title">SVEIKINAME!</h1>
                    <p class="description">
                    <div>ŠIAM UŽSAKYMUI DOVANOJAME JUMS 5% NUOLAIDĄ SU KODU</div>
                    </p>
                    <form novalidate="" class="form valid pristine"></form>
                    <p class="note">
                    <div>YSCDH7KQ</div>
                    </p></div>
            </div>
            <button type="button" class="close"></button>
        </div>
    </div>
    <script type="text/javascript" src="https://s2.getsitecontrol.com/widgets/preview/runtime.d93f1c9.js"></script>
    <script type="text/javascript">
        ;(function(cxt) {
            function handleEvent(evt) {
                try {
                    if (cxt.parent.document) {
                        var event;
                        switch (evt.type) {
                            case 'keydown':
                                event = new KeyboardEvent(evt.type, evt);
                                break;
                            default:
                                event = new Event(evt.type);
                                break;
                        }
                        if (event) {
                            cxt.parent.document.dispatchEvent(event);
                        }
                    }
                } catch (err) {
                    console.log('preview error', err);
                }
            }
            var events = ['click', 'keydown'];
            for (var i = events.length; i-- > 0;) {
                cxt.document.addEventListener(events[i], handleEvent, false);
            }
        })(this);
    </script>
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