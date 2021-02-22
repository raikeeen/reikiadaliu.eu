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

<div class="container-fluid" id="getModulesSlowLogsForm">
    <div class="row">
        {if $logs|count}
            <div class="col-sm-12">
                <div class="panel" id="fieldset_tables">
                    <div class="panel-heading">
                        <i class="icon-puzzle-piece"></i>
                        {l s='Modules slow logs' mod='optimclean'}
                         <span class="badge">{$logs|count}</span>
                    </div>
                    <ul class="list-unstyled module-logs">
                        {foreach from=$logs item=log}
                            <li>{$log|escape:'htmlall':'UTF-8'}</li>
                        {/foreach}
                    </ul>
                    <div class="panel-footer">
        				<a href="{$current_index|escape:'htmlall':'UTF-8'}&action=cleanmodulelog" class="btn btn-default pull-right display-confirmation">
        					<i class="process-icon-eraser"></i> {l s='Clean logs file' mod='optimclean'}
        				</a>
        			</div>
                </div>
            </div>
        {/if}
    </div>
</div>