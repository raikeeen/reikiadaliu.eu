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

<div class="row text-center result-header">
    <div class="col-sm-4">
        <p><strong>{l s='Global score' mod='optimclean'}</strong></p>
        <span class="badge score-{($result.scoreProfiles.generic.globalScore/10)|intval}">
            {$result.scoreProfiles.generic.globalScore|escape:'htmlall':'UTF-8'}
        </span>
    </div>
    <div class="col-sm-4">
        <p><strong>{l s='Testing device:' mod='optimclean'} {$result.params.options.device|escape:'htmlall':'UTF-8'}</strong></p>
        <i class="icon icon-{$result.params.options.device|escape:'htmlall':'UTF-8'}"></i>
    </div>
    <div class="col-sm-4">
        <p><strong>{l s='Testing url:' mod='optimclean'}</strong><br/>{$result.params.url|escape:'htmlall':'UTF-8'}</p>
        <p><strong>{l s='Date:' mod='optimclean'}</strong><br/>{$date|escape:'htmlall':'UTF-8'}</p>
    </div>
</div>
<div id="accordion">
    {foreach from=$result.scoreProfiles.generic.categories item=categorie}
        <h3>
            {$categorie.label|escape:'htmlall':'UTF-8'}
            <span class="badge score-{($categorie.categoryScore/10)|intval}">{$categorie.categoryScore|escape:'htmlall':'UTF-8'}</span>
        </h3>
        <div class="table-responsive-row clearfix">
            <table class="table specific_price_rule">
                <tbody>
                    {foreach from=$categorie.rules item=rule}
                    {if $result.rules[$rule].policy.label}
                        <tr {if $result.rules[$rule].abnormal}class="text-danger"{/if}>
                            <td>
                                 <span class="badge score-{($result.rules[$rule].score/10)|intval}">{$result.rules[$rule].score|intval}</span>
                            </td>
                            <td {if $result.rules[$rule].abnormal}class="text-danger"{/if}>
                                {capture assign='rule_template'}{$module_path|escape:'htmlall':'UTF-8'}/views/templates/admin/pagespeed/{$rule|escape:'htmlall':'UTF-8'}.tpl{/capture}
                                {if $rule_template|file_exists}
                                    {include file=$rule_template result=$result rule=$rule}
                                {else}
                                    <strong>{$result.rules[$rule].policy.label|escape:'htmlall':'UTF-8'}</strong>
                                    <div class="help-block">{$result.rules[$rule].policy.message}{* NO ESCAPE, HTML*}</div>
                                    {if isset($result.toolsResults.phantomas.offenders[$rule]) && $result.toolsResults.phantomas.offenders[$rule]|count}
                                        <div class="hidden">
                                            <div class="offenders" id="{$rule|escape:'htmlall':'UTF-8'}">
                                                <h2>{$result.rules[$rule].policy.label|escape:'htmlall':'UTF-8'}</h2>
                                                <ol>
                                                    <li>
                                                        {$result.toolsResults.phantomas.offenders[$rule]|implode:'</li><li>'}{* NO ESCAPE, HTML*}
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    {/if}
                                {/if}
                            </td>
                            <td class="text-center{if $result.rules[$rule].abnormal} text-danger{/if}">
                                <nobr>
                                    {if isset($result.toolsResults.phantomas.offenders[$rule]) && $result.toolsResults.phantomas.offenders[$rule]|count}
                                        <button class="btn btn-default result-more" data-fancybox-href="#{$rule|escape:'htmlall':'UTF-8'}" data-fancybox-type="inline">
                                    {/if}
                                    <strong>{$result.rules[$rule].value|escape:'htmlall':'UTF-8'}{if $result.rules[$rule].abnormal} <i class="icon icon-exclamation-circle"></i>{/if}</strong></nobr>
                                    {if isset($result.toolsResults.phantomas.offenders[$rule]) && $result.toolsResults.phantomas.offenders[$rule]|count}
                                            {if !$result.rules[$rule].abnormal}<i class="icon icon-eye"></i>{/if}
                                        </button>
                                    {/if}
                            </td>
                        </tr>
                    {/if}
                    {/foreach}
                </tbody>
            </table>
        </div>
    {/foreach}
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pagespeed-result .result-more").fancybox({
            minWidth: 500
    	});

        $( "#accordion" ).accordion({
            collapsible: true,
            active: false,
            heightStyle: "content"
        });
    });
</script>