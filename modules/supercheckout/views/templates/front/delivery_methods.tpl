{if isset($settings['hide_ship_pay']) && $settings['hide_ship_pay'] eq 1 && $address_selector == 'new'}
    <span class="permanent-warning" style="display: inline-block;"> {l s='Save your address first in order to check actual shipping methods & cost' mod='supercheckout'} </span>
{else}
<div class="velsof_sc_overlay"></div>
{if isset($is_virtual_cart) && $is_virtual_cart}
    <input id="input_virtual_carrier" class="hidden" type="hidden" name="id_carrier" value="0" />
    <div class="supercheckout-checkout-content" style="display:block">
        <div class="not-required-msg" style="display: block;">{l s='No Delivery Method Required' mod='supercheckout'}</div>
    </div>
{else}
    {if isset($shipping_errors) && is_array($shipping_errors)}
        {foreach from=$shipping_errors item='shippig_error'}
            <div class="supercheckout-checkout-content" style="display:block">
                <div class="permanent-warning" style="display: block;">{$shippig_error}</div>
            </div>
        {/foreach}
    {else}
        <div class="supercheckout-checkout-content" style="display:block"></div>
        <div id="hook-display-before-carrier">
            {$hookDisplayBeforeCarrier nofilter}{*escape not required as contains html*}
        </div>
        {if $delivery_options|count}
            {assign var='selected' value=0}
            <ul>
            {foreach from=$delivery_options item=carrier key=carrier_id}
                
                <li class="highlight">
                    <div class="radio ">
                    {if !empty($delivery_option) && $delivery_option == $carrier_id  && $selected == 0}
                       {* <li class="highlight alert-info">
                            <div class="radio ">*}
                                <input class='supercheckout_shipping_option delivery_option_radio' type="radio" name="delivery_option[{$id_address|intval}]" value="{$carrier_id nofilter}{*escape not required as contains html*}" id="shipping_method_{$id_address|intval}_{$carrier.id|intval}" checked="checked" />
                                {$selected = 1}
                            {else if isset($default_shipping_method) && $carrier.id == $default_shipping_method && $selected == 0}
                                {*<li class="highlight alert-info">
                                    <div class="radio ">*}
                                        <input class='supercheckout_shipping_option delivery_option_radio' type="radio" name="delivery_option[{$id_address|intval}]" value="{$carrier_id nofilter}{*escape not required as contains html*}" id="shipping_method_{$id_address|intval}_{$carrier.id|intval}" checked="checked" />
                                    {else}
                                       {* <li class="highlight">
                                            <div class="radio ">*}
                                                <input class='supercheckout_shipping_option delivery_option_radio' type="radio" name="delivery_option[{$id_address|intval}]" value="{$carrier_id nofilter}{*escape not required as contains html*}" id="shipping_method_{$id_address|intval}_{$carrier.id|intval}" />
                                            {/if}

                                            <label for="shipping_method_{$id_address|intval}_{$carrier.id|intval}">
                                                {if $display_carrier_style neq 0}
                                                    <img src="{$carrier.logo nofilter}{*escape not required as contains url*}" alt="{$carrier.name}" {if isset($carrier.logo_width) && $carrier.logo_width != "" && $carrier.logo_width != 'auto'}width="{$carrier.logo_width}"{else}width='50'{/if} {if isset($carrier.logo_height) && $carrier.logo_height != "" && $carrier.logo_height != "auto"}height="{$carrier.logo_height}"{/if}/>{if $display_carrier_style neq 2}{/if}
                                                {/if}
                                                {if $display_carrier_style neq 2}
                                                    {$carrier.name}                                                       
                                                {/if}
                                                <span class="supercheckout-shipping-small-title shippingPrice">{$carrier.price nofilter}</span></label>{*escape not required*}
                                            <p class="shippingInfo supercheckout-shipping-small-title">{$carrier.delay}</p>
                    </div>
                    {if isset($error) && !empty($error)}
                        <div class="lp_carrier error col-xs-12" data-carrier-id="{$id_carrier}">
                            {$error}
                        </div>
                    {elseif isset($terminals) && !empty($terminals)}

                        <div class="lp_carrier col-12" data-carrier-id="{$id_carrier}" style="overflow: hidden;{if $carrier.id|intval == "47"}display: block; {else}display: none;{/if}">
                            <select class="select2-hidden-accessible" id="lp_express_terminal" tabindex="-1" style="box-sizing: border-box; width: auto; max-width: 100%;">
                                <option>{l s='Select terminal' mod='lpexpress'}</option>

                                {foreach $terminals as $city => $terminals_by_city}
                                    <optgroup label="{$city}" style="font-weight: 900;">
                                        {foreach $terminals_by_city as $terminal}
                                            <option value="{$terminal['id_lpexpress_terminal']}"{if isset($selected_terminal) && $selected_terminal == $terminal['id_lpexpress_terminal']} selected{/if}>{$terminal['name']} {$terminal['address']}, {$terminal['city']}</option>
                                        {/foreach}
                                    </optgroup>
                                {/foreach}
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 421px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lp_express_terminal-container"><span class="select2-selection__rendered" id="select2-lp_express_terminal-container" title="Pasirinkite terminalą">Pasirinkite terminalą</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    {/if}
                                    </li>
                                       
                                    {/foreach}
                                   </ul>
                                {else}
                                    <div class="supercheckout-checkout-content" style="display:block">
                                        <div class="permanent-warning" style="display: block;">{l s='No Delivery Method Available' mod='supercheckout'}</div>
                                    </div>
                                {/if}
                                <div id="hook-display-after-carrier">
                                    {$hookDisplayAfterCarrier nofilter}{*escape not required as contains html*}
                                </div>
                            {/if}
                        {/if}
{/if}
                        {*
                        * DISCLAIMER
                        *
                        * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
                        * versions in the future. If you wish to customize PrestaShop for your
                        * needs please refer tohttp://www.prestashop.com for more information.
                        * We offer the best and most useful modules PrestaShop and modifications for your online store.
                        *
                        * @category  PrestaShop Module
                        * @author    knowband.com <support@knowband.com>
                        * @copyright 2016 Knowband
                        *}