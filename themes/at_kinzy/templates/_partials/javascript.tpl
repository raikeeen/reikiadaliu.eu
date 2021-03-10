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
{foreach $javascript.external as $js}
  <script type="text/javascript" src="{$js.uri}" {$js.attribute}></script>
{/foreach}

{foreach $javascript.inline as $js}
  <script type="text/javascript">
    {$js.content nofilter}
  </script>
{/foreach}

{if isset($vars) && $vars|@count}
  <script type="text/javascript">
    {foreach from=$vars key=var_name item=var_value}
    var {$var_name} = {$var_value|json_encode nofilter};
    {/foreach}
  </script>
{/if}
<script type="text/javascript">
	var choosefile_text = "{l s='Choose file' d='Shop.Theme.Actions'}";
	var turnoff_popup_text = "{l s='Do not show this popup again' d='Shop.Theme.Actions'}";

	var size_item_quickview = 144;
	var style_scroll_quickview = 'horizontal';
	
	var size_item_page = 144;
	var style_scroll_page = 'horizontal';
	
	var size_item_quickview_attr = 144;	
	var style_scroll_quickview_attr = 'horizontal';
	
	var size_item_popup = 190;
	var style_scroll_popup = 'vertical';
</script>
<script type="text/javascript">
	function wpguruLink() {
		var istS = 'Daugiau informacijos rasite:';
		var copyR = 'Draudžiama kopijuoti turinį be raštiško sutikimo. Visos teisės saugomos © rm-autodalys.lt';
		var body_element = document.getElementsByTagName('body')[0];
		var choose = window.getSelection();
		var myLink = document.location.href;
		var authorLink = "<br /><br />" + istS + ' ' + "<a href='"+myLink+"'>"+myLink+"</a><br />" + copyR;
		var copytext = choose + authorLink;
		var addDiv = document.createElement('div');
		addDiv.style.position='absolute';
		addDiv.style.left='-99999px';
		body_element.appendChild(addDiv);
		addDiv.innerHTML = copytext;
		choose.selectAllChildren(addDiv);
		window.setTimeout(function() {
			body_element.removeChild(addDiv);
		},0);
	}
	document.oncopy = wpguruLink;
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
			m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(73481749, "init", {
		clickmap:true,
		trackLinks:true,
		accurateTrackBounce:true,
		webvisor:true,
		trackHash:true,
		ecommerce:"dataLayer"
	});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/73481749" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->