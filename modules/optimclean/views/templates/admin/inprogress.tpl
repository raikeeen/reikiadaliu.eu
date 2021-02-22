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
</script>
<div class="row" id="optimclean-view">
    <div class="alert alert-danger">
        <p>{l s='It seems you have a task (%s) that was not completed properly, what do you want to do?' mod='optimclean' sprintf=$task_date}</p><br/>
        <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdownload&type=progress" title="{l s='Download' mod='optimclean'}" class="btn btn-default">
        	<i class="icon-download"></i> {l s='Download restore files' mod='optimclean'}
        </a>
        <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackrestore&type=progress" title="{l s='Restore' mod='optimclean'}" class="btn btn-default display-confirmation">
            <i class="icon-upload"></i> {l s='Try to restore' mod='optimclean'}
        </a>
        <a href="{$current_index|escape:'htmlall':'UTF-8'}&action=rollbackdelete&type=progress" title="{l s='Delete' mod='optimclean'}" class="btn btn-default display-confirmation">
            <i class="icon-trash"></i> {l s='Delete it' mod='optimclean'}
        </a>
    </div>
</div>
{$about} {* NO ESCAPE, HTML*}