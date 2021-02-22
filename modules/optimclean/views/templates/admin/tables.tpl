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

<div id="getDatabaseInformationsForm">
    <div class="panel" id="getDatabaseInformationsForm">
        <div class="panel-heading">
            <i class="icon-database"></i>
            {l s='Database informations' mod='optimclean'}
             <span class="badge">{$total_size|escape:'htmlall':'UTF-8'}</span>
        </div>
        <div class="container-fluid all_tables" style="display: none;">
            {if isset($tables) && $tables|@count}
                {assign var=table_count value=ceil($tables|@count/3)}
                <div class="row">
                    <ul class="col-lg-4 list-unstyled">
                        {foreach from=$tables item=table name=table_foreach}
                            <li class="clearfix">
                                <div class="pull-right">
                                    <span class="badge{if $table.size|floatval > 10000000 || $table.free_space} badge-danger{/if}">{$table.size_display|escape:'htmlall':'UTF-8'}</span>
                                    <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=defragment&table={$table.name|escape:'htmlall':'UTF-8'}" class="label-tooltip display-confirmation" data-toggle="tooltip" title="{l s='Defragment table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'}">
                                        <i class="icon-cubes"></i>
                                    </a>
                                    {if $table.free_space}<a href="{$current_index|escape:'htmlall':'UTF-8'}&action=optimize&table={$table.name|escape:'htmlall':'UTF-8'}" title="test" class="label-tooltip display-confirmation" data-toggle="tooltip" title="{l s='Optimize table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'} ({$table.free_space_display|escape:'htmlall':'UTF-8'})">{/if}
                                        <i class="icon-bolt {if !$table.free_space}text-muted{/if}"></i>
                                    {if $table.free_space}</a>{/if}
                                    <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=backup&table={$table.name|escape:'htmlall':'UTF-8'}" class="label-tooltip" data-toggle="tooltip" title="{l s='Backup table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'}">
                                        <i class="icon-download"></i>
                                    </a>
                                </div>
                                <span class="table-name {if $table.size > 10000000 || $table.free_space} text-danger{/if}">
                                    {$table.name|escape:'htmlall':'UTF-8'} <i class="icon-info-circle text-muted label-tooltip" data-toggle="tooltip" title="{$table.engine|escape:'htmlall':'UTF-8'}, ~{$table.rows|escape:'htmlall':'UTF-8'} {l s='rows' mod='optimclean'}"></i>
                                </span>
                            </li>
                            {if $smarty.foreach.table_foreach.iteration%$table_count==0 && !$smarty.foreach.table_foreach.last}</ul><ul class="col-lg-4 list-unstyled">{/if}
                        {/foreach}
                    </ul>
                </div>
            {/if}
            <p class="text-center">
                <br/>
                <button class="btn btn-default btn-toggle-view-overall">{l s='View overloaded tables only' mod='optimclean'}</button>
            </p>
        </div>
        <div class="container-fluid overall_tables">
            {if isset($overall_tables) && $overall_tables|@count}
                {assign var=table_count value=ceil($overall_tables|@count/3)}
                <div class="row">
                    <ul class="col-lg-4 list-unstyled">
                        {foreach from=$overall_tables item=table name=overall_table_foreach}
                            <li class="clearfix">
                                <div class="pull-right">
                                    <span class="badge{if $table.size > 10000000 || $table.free_space} badge-danger{/if}">{$table.size_display|escape:'htmlall':'UTF-8'}</span>
                                    <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=defragment&table={$table.name|escape:'htmlall':'UTF-8'}" class="label-tooltip display-confirmation" data-toggle="tooltip" title="{l s='Defragment table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'}">
                                        <i class="icon-cubes"></i>
                                    </a>
                                    {if $table.free_space}<a href="{$current_index|escape:'htmlall':'UTF-8'}&action=optimize&table={$table.name|escape:'htmlall':'UTF-8'}" title="test" class="label-tooltip display-confirmation" data-toggle="tooltip" title="{l s='Optimize table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'} ({$table.free_space_display|escape:'htmlall':'UTF-8'})">{/if}
                                        <i class="icon-bolt {if !$table.free_space}text-muted{/if}"></i>
                                    {if $table.free_space}</a>{/if}
                                    <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=backup&table={$table.name|escape:'htmlall':'UTF-8'}" class="label-tooltip" data-toggle="tooltip" title="{l s='Backup table' mod='optimclean'} {$table.name|escape:'htmlall':'UTF-8'}">
                                        <i class="icon-download"></i>
                                    </a>

                                </div>
                                <span class="table-name {if $table.size > 10000000 || $table.free_space} text-danger{/if}">
                                    {$table.name|escape:'htmlall':'UTF-8'} <i class="icon-info-circle text-muted label-tooltip" data-toggle="tooltip" title="{$table.engine|escape:'htmlall':'UTF-8'}, ~{$table.rows|escape:'htmlall':'UTF-8'} {l s='rows' mod='optimclean'}"></i>
                                </span>
                            </li>
                            {if $smarty.foreach.overall_table_foreach.iteration%$table_count==0 && !$smarty.foreach.overall_table_foreach.last}</ul><ul class="col-lg-4 list-unstyled">{/if}
                        {/foreach}
                    </ul>
                </div>
            {else}
                <p class="alert alert-success">
                    {l s='Good news, you have no overloaded table!' mod='optimclean'}
                </p>
            {/if}
            <p class="text-center">
                <br/>
                <button class="btn btn-default btn-toggle-view-all">{l s='View all tables' mod='optimclean'}</button>
            </p>
        </div>

        <div class="panel-footer text-center">
            <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=defragment&table=all" class="btn btn-default display-confirmation">
                <i class="icon-cubes"></i> {l s='Defragment all' mod='optimclean'}
            </a>
            <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=optimize&table=all" class="btn btn-default display-confirmation">
                <i class="icon-bolt"></i> {l s='Optimize all' mod='optimclean'} ({$total_free_space|escape:'htmlall':'UTF-8'})
            </a>
            <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=backup&table=all" class="btn btn-default">
                <i class="icon-download"></i> {l s='Backup all' mod='optimclean'}
            </a>
        </div>
    </div>
    {if $rollbacks}
        <div class="panel" id="">
            {$rollbacks} {* NO ESCAPE, HTML*}
        </div>
    {/if}
</div>

