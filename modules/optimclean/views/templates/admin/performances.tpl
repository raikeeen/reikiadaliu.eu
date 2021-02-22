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

<div class="container-fluid" id="getPerformancesForm">
    <div class="row">
        {if $performances|count}
            <div class="col-sm-12">
                <div class="panel" id="fieldset_tables">
                    <div class="panel-heading">
                        <i class="icon-cogs"></i>
                        {l s='Performances' mod='optimclean'}
                         <span class="badge">{$performances|count}</span>
                    </div>
                    {foreach from=$performances item=performance}
                           <div class="alert alert-{$performance.level|escape:'htmlall':'UTF-8'}">
                                {$performance.label}{* NO ESCAPE, HTML*}
                           </div>
                    {/foreach}
                    <div class="panel-footer">
        				<a href="{$performances_link|escape:'htmlall':'UTF-8'}" class="btn btn-default pull-right">
        					<i class="process-icon-cogs"></i> {l s='Edit performances' mod='optimclean'}
        				</a>
        			</div>
                </div>
            </div>
        {/if}
        <div class="col-sm-12">
            <div class="panel" id="fieldset_tables">
                <div class="panel-heading">
                    <i class="icon-tachometer"></i>
                    {l s='Page speed test' mod='optimclean'}
                </div>
                {if isset($need_to_select_shop) && $need_to_select_shop}
                    <div class="alert alert-info">
                        {l s='Please, select a shop before using this feature' mod='optimclean'}
                    </div>
                {else}
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-lg-2">
                                {l s='Device testing' mod='optimclean'}
                            </label>
                            <div class="col-lg-10">
                                <select name="device" class="fixed-width-xl" id="device">
                                    <option value="desktop">{l s='Desktop' mod='optimclean'}</option>
                                    <option value="tablet">{l s='Tablet' mod='optimclean'}</option>
                                    <option value="mobile">{l s='Mobile' mod='optimclean'}</option>
        						</select>
                            </div>
        				</div>
        				<div class="form-group">
                            <label class="control-label col-lg-2">
                                {l s='Url to test' mod='optimclean'}
                            </label>
                            <div class="col-lg-10 ">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        {$base_url|escape:'htmlall':'UTF-8'}
                                    </span>
                                    <input type="text" name="page_url" id="appear_ratio" value="" class="">
                                </div>
                            </div>
        				</div>
                    </div>
                    <div id="pagespeed-result">
                        {if isset($pagespeed_result)}{$pagespeed_result}{* NO ESCAPE, HTML*}{/if}
                    </div>
                    <div class="text-center">
                        <button href="{$current_index|escape:'htmlall':'UTF-8'}&action=runPageSpeedTest" class="btn btn-default" id="runPageSpeedTest">
        					<i class="icon-tachometer"></i> {l s='Run page speed test' mod='optimclean'}
        				</button>
                    </div>
                {/if}
            </div>
        </div>
        {if $hosting_vars|@count}
            <div class="col-sm-12">
                <div class="panel" id="fieldset_tables">
                    <div class="panel-heading">
                        <i class="icon-info"></i>
                        {l s='Configuration' mod='optimclean'}
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong>{l s='Server information:' mod='optimclean'}</strong> {$hosting_vars.version.server|escape:'htmlall':'UTF-8'}<br/>
                                <strong>{l s='PHP version:' mod='optimclean'}</strong> {$hosting_vars.version.php|escape:'htmlall':'UTF-8'}<br/>
                                <strong>{l s='Memory limit:' mod='optimclean'}</strong> {$hosting_vars.version.memory_limit|escape:'htmlall':'UTF-8'}<br/>
                            </div>
                            <div class="col-sm-6">
                                <strong>{l s='Max execution time:' mod='optimclean'}</strong> {$hosting_vars.version.max_execution_time|escape:'htmlall':'UTF-8'}<br/>
                                <strong>{l s='MySQL version:' mod='optimclean'}</strong> {$hosting_vars.database.version|escape:'htmlall':'UTF-8'}<br/>
                                <strong>{l s='MySQL engine:' mod='optimclean'}</strong> {$hosting_vars.database.engine|escape:'htmlall':'UTF-8'}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    </div>
</div>