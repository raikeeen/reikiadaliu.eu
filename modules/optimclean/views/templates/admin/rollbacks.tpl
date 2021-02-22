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

<div class="rollbacks-list">
    <h3><i class="icon-files-o"></i> {l s='Rollback files' mod='optimclean'}</h3>
    <div class="table-responsive-row clearfix">
        <table class="table specific_price_rule">
            <thead>
                <tr class="nodrag nodrop">
                    <th class="">
                        <span class="title_box">{l s='File' mod='optimclean'}</span>
                    </th>
                    <th class="">
                        <span class="title_box">{l s='Date' mod='optimclean'}</span>
                    </th>
                    <th class="">
                        <span class="title_box">{l s='Size' mod='optimclean'}</span>
                    </th>
                    <th class="fixed-width-xs center">
                         {l s='Actions' mod='optimclean'}
                    </th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$rollbacks item=rollback}
                <tr>
                    <td>
                        {$rollback.name|escape:'htmlall':'UTF-8'}
                    </td>
                    <td>
                        {$rollback.date|escape:'htmlall':'UTF-8'}
                    </td>
                    <td>
                        {$rollback.size|escape:'htmlall':'UTF-8'}
                    </td>
                    <td class="text-right">
                        <div class="btn-group-action">
                            {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
                                <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdownload&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Download' mod='optimclean'}" class="edit btn btn-default">
                                    <i class="icon-download"></i> {l s='Download' mod='optimclean'}
                                </a>
                                <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackrestore&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Restore' mod='optimclean'}" class="btn btn-default display-confirmation">
                                    <i class="icon-upload"></i> {l s='Restore' mod='optimclean'}
                                </a>
                                <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdelete&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Delete' mod='optimclean'}" class="btn btn-default display-confirmation">
                                    <i class="icon-trash"></i> {l s='Delete' mod='optimclean'}
                                </a>
                            {else}
                                <div class="btn-group pull-right">
                                    <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdownload&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Download' mod='optimclean'}" class="edit btn btn-default">
                                    	<i class="icon-download"></i> {l s='Download' mod='optimclean'}
                                    </a>
        							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-caret-down"></i>&nbsp;
                                    </button>
                                    <ul class="dropdown-menu">
        								<li>
            								<a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackrestore&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Restore' mod='optimclean'}" class="display-confirmation">
                                                <i class="icon-upload"></i> {l s='Restore' mod='optimclean'}
                                            </a>
                                        <li>
                                        <li>
            								<a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdelete&type={$rollback_type|escape:'htmlall':'UTF-8'}&rollback={$rollback.name|escape:'htmlall':'UTF-8'}" title="{l s='Delete' mod='optimclean'}" class="display-confirmation">
                                                <i class="icon-trash"></i> {l s='Delete' mod='optimclean'}
                                            </a>
                                        <li>
        							</ul>
        						</div>
    						{/if}
    				    </div>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
</div>