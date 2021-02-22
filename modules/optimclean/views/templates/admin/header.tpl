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

<div class="bootstrap" id="module-alerts">
    <div class="alert alert-success{if !isset($confirmations) || !is_array($confirmations) || !count($confirmations)} hidden{/if}" id="module-alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul class="list-unstyled">
            {if isset($confirmations) && is_array($confirmations) && count($confirmations)}
                {foreach $confirmations as $confirmation}
                <li>{$confirmation} {* NO ESCAPE, HTML*}</li>
                {/foreach}
            {/if}
        </ul>
    </div>

    <div class="alert alert-danger{if !isset($errors) || !is_array($errors) || !count($errors)} hidden{/if}" id="module-alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul class="list-unstyled">
            {if isset($errors) && is_array($errors) && count($errors)}
                {foreach $errors as $error}
                <li>{$error} {* NO ESCAPE, HTML*}</li>
                {/foreach}
            {/if}
        </ul>
    </div>
</div>
