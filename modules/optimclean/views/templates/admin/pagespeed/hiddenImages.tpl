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

<strong>{l s='Hidden images' mod='optimclean'}</strong>
<div class="help-block">
    <p>{l s='List of all images that have a display:none property, or one of their parents. These images are loaded by the browser even if they\'re not visible. You might be able to find a way to lazy-load them, only when they get visible.' mod='optimclean'}</p>
    <p>{l s='Trackers are an exception, you\'d better hide them.' mod='optimclean'}</p>
</div>
{if isset($result.toolsResults.phantomas.offenders[$rule]) && $result.toolsResults.phantomas.offenders[$rule]|count}
    <div class="hidden">
        <div class="offenders" id="{$rule|escape:'htmlall':'UTF-8'}">
            <h2>{l s='Hidden images' mod='optimclean'}</h2>
            <ol>
                <li>
                    {$result.toolsResults.phantomas.offenders[$rule]|implode:'</li><li>'}{* NO ESCAPE, HTML*}
                </li>
            </ol>
        </div>
    </div>
{/if}