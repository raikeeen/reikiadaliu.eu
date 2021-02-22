{**
 * 2015 Adilis
 *
 * The Optimization and Cleaning module is an extremely versatile toolkit for your online store.
 * Optimize your online store by deleting old or unused data, check your configuration and check the speed of your Prestashop
 * and relax knowing that you’re protected by the integrated data recovery system.
 *
 *  @author    Adilis <support@adilis.fr>
 *  @copyright 2015 SAS Adilis
 *  @license   http://www.adilis.fr
 *}

 <script type="text/javascript">
    var ocAjaxMode = {$ajax_mode|intval};
    var ocAjaxLimit = {$ajax_limit|intval};
    var ocTaskIsRunning= "{l s='A task is already running, please wait for it before launching a new task'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocPageSpeedCreating= "{l s='Now creating page speed test'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocPageSpeedQueue= "{l s='Job is in queue, your position'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocPageSpeedRunning= "{l s='Test is now running'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocPageSpeedDone= "{l s='Test is done, now fetching result'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocPageSpeedFailed= "{l s='Test failed, reason'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocTaskConfirm= "{l s='Are you sure you want to perform this action ? It is strongly recommended that you create a full backup before any action on this module'|escape:'quotes':'UTF-8' mod='optimclean'}";
    var ocTaskConfirmBeforeLeave= "{l s='Are you sure you want to leave this page ? A important task is actually running, leaving this page now is strongly not recommanded !'|escape:'quotes':'UTF-8' mod='optimclean'}";
</script>
{$header} {* NO ESCAPE, HTML*}
<div class="row" id="optimclean-view">
    <div id="optimclean-tabs" class="col-lg-3 col-md-3">
		<ul class="list-group">
    		{foreach from=$list_items item=item}
			    <li class="list-group-item {if $optimclean_tab == $item.id_form}active{/if}" data-panel="{$item.id_form|escape:'htmlall':'UTF-8'}">
			        {if $item.icon}<i class="{$item.icon|escape:'htmlall':'UTF-8'}"></i>{/if}
			        {$item.label|escape:'htmlall':'UTF-8'}
                </li>
    		{/foreach}
        </ul>
	</div>
	<div id="optimclean-panels" class="col-lg-9 col-md-9">
		{$panels} {* NO ESCAPE, HTML*}
	</div>
</div>
{$about} {* NO ESCAPE, HTML*}