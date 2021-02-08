/**
 * 2018 Paysera
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *  @author    Paysera <plugins@paysera.com>
 *  @copyright 2018 Paysera
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of Paysera
 */

$(document).ready(function () {
    let navTab = $('.paysera-tabs .nav-tab-active');
    $('.paysera-tabs .tab-content').hide();
    $(navTab.data('target')).show();

    $('.paysera-tabs nav .tab-title').on('click', function() {
        let selectedObj = $(this);
        selectedObj.addClass('nav-tab-active').siblings().removeClass('nav-tab-active');
        $(selectedObj.data('target')).show().siblings().hide();
    });
});







