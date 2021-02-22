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
                        <script type="text/javascript">if (typeof LPCarrierTerminal == 'undefined')
                            {
                                LPCarrierTerminal = 0;
                                LPCarrierPost = 0;
                                LPCarrierHome = 0;
                                LPToken = 0;
                                LPAjax = 0;
                                MessageBadZip = '';
                            }

                            // ID of validated carrier
                            var validated_carrier = null;

                            $(document).ready( function () {
                                LPCarrierTerminal = parseInt(LPCarrierTerminal);
                                LPCarrierPost = parseInt(LPCarrierPost);
                                LPCarrierHome = parseInt(LPCarrierHome);

                                $(document).on('click', '[name="confirmDeliveryOption"], [name="processCarrier"], body#order-opc #HOOK_PAYMENT .payment_module a', function (e) {
                                    var id = getSelectedCarrier();
                                    if (!id || !validated_carrier || id !== parseInt(validated_carrier))
                                    {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        onCarrierSubmit($(this));
                                    }
                                    else
                                    {
                                        if ($(this).is('a') && $(this).attr('href'))
                                        {
                                            location.href = $(this).attr('href');
                                        }
                                        return true;
                                    }
                                });
                                $(document).on('change', '#lp_express_terminal', function () {
                                    var id_terminal = $('#lp_express_terminal').val();
                                    if (!id_terminal || !parseInt(id_terminal))
                                    {
                                        return false;
                                    }

                                    $(this).parent('.lp_carrier').removeClass('error');
                                    submitTerminal(id_terminal);
                                });
                                $(document).on('change', '[name^="delivery_option"]', function () {
                                    $('.lp_carrier_container').slideUp();
                                });

                                setTimeout(function () {
                                    $('#lp_express_terminal').select2();
                                }, 250);
                            });

                            /**
                             * Get selected carrier ID
                             */
                            function getSelectedCarrier() {
                                var carrier_radio = $('[name^="delivery_option"]:checked');
                                if (carrier_radio.length)
                                {
                                    return parseInt(carrier_radio.val());
                                }
                                return false;
                            }

                            /**
                             * Check if everything fine and submit carrier form
                             */
                            function onCarrierSubmit(target) {
                                var id_carrier = getSelectedCarrier();
                                if (!id_carrier)
                                {
                                    validated_carrier = id_carrier;
                                    $(target).click();
                                    return true;
                                }

                                // Check if carrier one of LP carriers
                                if (id_carrier !== parseInt(LPCarrierTerminal) && id_carrier !== parseInt(LPCarrierPost) && id_carrier !== parseInt(LPCarrierHome))
                                {
                                    validated_carrier = id_carrier;
                                    $(target).click();
                                    return true;
                                }

                                if (id_carrier === parseInt(LPCarrierHome))
                                {
                                    $(target).attr('disabled', true);
                                    submitHome(function () {
                                        validated_carrier = id_carrier;
                                        $(target).attr('disabled', false);
                                        $(target).click();
                                    }, function () {
                                        $(target).attr('disabled', false);
                                    });
                                    return true;
                                }

                                // Check if exists carrier data id element
                                var carrier_extra = $('[data-carrier-id="'+id_carrier+'"]');
                                if (!carrier_extra.length)
                                {
                                    console.log('Can\'t find data-carrier-id for selected carrier: '+id_carrier);
                                    return false;
                                }

                                if (id_carrier === parseInt(LPCarrierTerminal))
                                {
                                    if (!$(carrier_extra).find('select#lp_express_terminal').length)
                                    {
                                        console.log('Can\'t find select element for LP terminal carrier');
                                        return false;
                                    }

                                    var id_terminal = $('#lp_express_terminal').val();
                                    if (!id_terminal || !parseInt(id_terminal))
                                    {
                                        $(carrier_extra).addClass('error');
                                        return false;
                                    }

                                    // Submit terminal
                                    $(target).attr('disabled', true);
                                    submitTerminal(id_terminal, function () {
                                        validated_carrier = id_carrier;
                                        $(target).attr('disabled', false);
                                        $(target).click();
                                    }, function () {
                                        $(target).attr('disabled', false);
                                        $(carrier_extra).addClass('error');
                                    });
                                    return true;
                                }

                                if (id_carrier === parseInt(LPCarrierPost))
                                {
                                    if (!$(carrier_extra).hasClass('error'))
                                    {
                                        $(target).attr('disabled', true);
                                        submitPost(function () {
                                            validated_carrier = id_carrier;
                                            $(target).attr('disabled', false);
                                            $(target).click();
                                        }, function () {
                                            $(target).attr('disabled', false);
                                        });
                                        return true;
                                    }
                                    else
                                    {
                                        if (!!$.prototype.fancybox)
                                            $.fancybox.open([
                                                    {
                                                        type: 'inline',
                                                        autoScale: true,
                                                        minHeight: 30,
                                                        content: '<p class="fancybox-error">' + MessageBadZip + '</p>'
                                                    }],
                                                {
                                                    padding: 0
                                                });
                                        else
                                        {
                                            alert(MessageBadZip);
                                        }
                                    }
                                }
                            }

                            function submitTerminal(id_terminal, successCallback, failedCallback) {
                                sendAjax('updateOrderTerminal', {
                                    'id_terminal': id_terminal
                                }, successCallback, failedCallback);
                            }

                            function submitPost(successCallback, failedCallback) {
                                sendAjax('updateOrderPost', {}, successCallback, failedCallback);
                            }
                            function submitHome(successCallback, failedCallback) {
                                sendAjax('updateOrderAddress', {}, successCallback, failedCallback);
                            }

                            function sendAjax(action, data, successCallback, failedCallback) {
                                var parameters = {
                                    'action': action,
                                    'LPToken': LPToken
                                };

                                $.extend(parameters, data);

                                $.ajax({
                                    'url': decodeTerminalURL(LPAjax),
                                    'type': "POST",
                                    'data': parameters,
                                    dataType: "JSON",
                                    success: function(data){
                                        if (data.success)
                                        {
                                            if (typeof successCallback === 'function')
                                            {
                                                successCallback(data);
                                            }
                                        }
                                        else
                                        {
                                            if (typeof successCallback === 'function')
                                            {
                                                failedCallback(data);
                                            }

                                            if (!!$.prototype.fancybox)
                                                $.fancybox.open([
                                                        {
                                                            type: 'inline',
                                                            autoScale: true,
                                                            minHeight: 30,
                                                            content: '<p class="fancybox-error">' + data.message + '</p>'
                                                        }],
                                                    {
                                                        padding: 0
                                                    });
                                            else
                                                alert(data.message);
                                        }
                                    }
                                });
                            }

                            function decodeTerminalURL(url) {
                                return $('<div></div>').html(url).text();
                            }

                            function movePS16ToCarrier(id_selected_lp_carrier, id_carrier_address) {
                                // Remove all containers
                                $('.lp_carrier_container:not(.unvisible)').remove();

                                // Find carrier container
                                var carrier = $('[name="delivery_option['+id_carrier_address+']"][value^="'+id_selected_lp_carrier+'"]');

                                if (!carrier.length)
                                {
                                    console.log('Cant find carrier to store LP container');
                                    $('.lp_carrier_container').remove();
                                }

                                var container = carrier.closest('.delivery_option');
                                if (!container.length)
                                {
                                    console.log('Cant find carrier container');
                                    $('.lp_carrier_container').remove();
                                }

                                var content = $('.lp_carrier_container.unvisible');
                                content.hide();
                                container.append(content);
                                content.removeClass('unvisible');
                                content.slideDown();
                            }</script>
                        <div class="lp_carrier col-12" data-carrier-id="{$id_carrier}" style="overflow: hidden;{if $carrier.id|intval == "47"}display: block; {else}display: none;{/if}">
                            <select id="lp_express_terminal" style="box-sizing: border-box; width: auto; max-width: 100%;">
                                <option>{l s='Select terminal' mod='lpexpress'}</option>

                                {foreach $terminals as $city => $terminals_by_city}
                                    <optgroup label="{$city}" style="font-weight: 900;">
                                        {foreach $terminals_by_city as $terminal}
                                            <option value="{$terminal['id_lpexpress_terminal']}"{if isset($selected_terminal) && $selected_terminal == $terminal['id_lpexpress_terminal']} selected{/if}>{$terminal['name']} {$terminal['address']}, {$terminal['city']}</option>
                                        {/foreach}
                                    </optgroup>
                                {/foreach}
                            </select>
                            {include file="file:/var/www/reikiadaliu.eu/public_html/modules/lpexpress/views/templates/hook/orderTerminalDelivery_1-6.tpl"}
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