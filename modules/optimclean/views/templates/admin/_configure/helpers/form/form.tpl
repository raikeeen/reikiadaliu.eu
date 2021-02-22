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

{extends file="helpers/form/form.tpl"}
{block name="field"}
    {if $input.type == 'html'}
        {if isset($input.html_content)}
			{$input.html_content} {* NO ESCAPE, HTML*}
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}