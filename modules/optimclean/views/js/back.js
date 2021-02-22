/**
 * 2015 Adilis
 *
 * The Optimization and Cleaning module is an extremely versatile toolkit for your online store.
 * Optimize your online store by deleting old or unused data, check your configuration and check the speed of your Prestashop
 * and relax knowing that you’re protected by the integrated data recovery system.
 *
 *  @author    Adilis <support@adilis.fr>
 *  @copyright 2015 SAS Adilis
 *  @license   http://www.adilis.fr
*/

versionCompare = function(left, right) {
    if (typeof left + typeof right != 'stringstring')
        return false;

    var a = left.split('.')
    ,   b = right.split('.')
    ,   i = 0, len = Math.max(a.length, b.length);

    for (; i < len; i++) {
        if ((a[i] && !b[i] && parseInt(a[i]) > 0) || (parseInt(a[i]) > parseInt(b[i]))) {
            return 1;
        } else if ((b[i] && !a[i] && parseInt(b[i]) > 0) || (parseInt(a[i]) < parseInt(b[i]))) {
            return -1;
        }
    }

    return 0;
}

function hideField( field_id ) {
    if( versionCompare( _PS_VERSION_, '1.6' ) == -1 ) {
	    $('#'+field_id).closest('.margin-form').prev('label').addClass('hidden');
	    $('#'+field_id).closest('.margin-form').addClass('hidden');
	} else
	{
	    $('#'+field_id).closest('.form-group').addClass('hidden');
	}
}

function showField( field_id ) {
    if( versionCompare( _PS_VERSION_, '1.6' ) == -1 ) {
	    $('#'+field_id).closest('.margin-form').prev('label').removeClass('hidden');
	    $('#'+field_id).closest('.margin-form').removeClass('hidden');
	} else
	{
	    $('#'+field_id).closest('.form-group').removeClass('hidden');
	}
}

function showFields( field_id_array ) {
    $.each(field_id_array, function( index, value ) {
        showField(value );
    });
}

var ajaxMaxLimit = 0;
var ajaxCurrentLimit = 0;
var backupTime = 0;
var itemDeleted = 0;
var process = '';
var isAjaxRunning = false;
var inputSubmitClasses = false;

function runAjaxProccess(input_submit, action) {

    if(action == 'getResume' && (isPageSpeedTestAjaxRunning || isAjaxRunning)) {
        alert(ocTaskIsRunning);
	    return false;
    }

    isAjaxRunning = true;
    if (action=='getResume') {
        $('#module-alert-danger, #module-alert-success').addClass('hidden');
        input_submit.prop('disabled', true);
        inputSubmitClasses = input_submit.find('i').prop('class');
        input_submit.find('i').prop('class', 'process-icon-loading');
    }

    var href = input_submit.closest('form').prop('action');
    var form_datas = input_submit.closest('form').serializeArray();

    var datas = {
        ajax : 1,
        action : action,
        use_limit : ocAjaxLimit,
        ajax_current_limit : ajaxCurrentLimit,
        ajax_max_limit : ajaxMaxLimit,
        backup_time : backupTime,
        item_deleted : itemDeleted,
        process : process
    };

    $.each(form_datas, function(index, field) {
        if(field.name!='use_limit')
            datas[field.name] = field.value;
        else
            datas['init_max_limit'] = field.value;
    });

    $.ajax({
    	type:"POST",
    	url : href,
    	async: true,
    	data : datas,
    	dataType : 'json',
    	success : function(result, textStatus, jqXHR)
    	{
        	if (!$.isPlainObject(result)) {
                isAjaxRunning = false;
            	document.location.href = href+'&error';
        	}

        	if (action.indexOf('getResume') != -1 && result.datas.total) {
        	    backupTime = result.datas.backupTime;
        	    ajaxMaxLimit = parseInt(result.datas.total);
        	    process = result.datas.process;
        	    ajaxCurrentLimit = 0;
            }

        	if (action.indexOf('runProcess') != -1 && result.datas.ajax_current_limit) {
        	    ajaxCurrentLimit = parseInt(result.datas.ajax_current_limit);
        	    itemDeleted = parseInt(result.datas.item_deleted);
            }

            displayErrorsResult(result.errors);
            displayConfirmationsResult(result.confirmations);

            setTimeout( function() {
                if (result.datas.nextStep && result.datas.nextStep != 'Done') {
                    runAjaxProccess(input_submit, result.datas.nextStep);
                }
                if (!result.datas.nextStep || result.datas.nextStep == 'Done') {
                    isAjaxRunning = false;
                    input_submit.find('i').prop('class', inputSubmitClasses);
                    input_submit.prop('disabled', false);
                    $('#module-alert-danger,#module-alert-success').removeClass('alert-loading');
                    if(result.datas.redirect_after)
                        document.location.href=result.datas.redirect_after;
                }
            }, 2000 );
        },
        error: function ( jqXHR, textStatus, errorThrown ) {
            document.location.href = href+'&error';
        }
    });
}

var pageSpeedRunId = false;
var processSpeedRun = false;
var isPageSpeedTestAjaxRunning = false;
function runPageSpeedTestAjaxProccess(input_submit, action) {
    if(action == 'createPageSpeedTest' && (isPageSpeedTestAjaxRunning || isAjaxRunning)) {
        alert(ocTaskIsRunning);
	    return false;
    }

    isPageSpeedTestAjaxRunning = true;

    var href = input_submit.closest('form').prop('action');
    var form_datas = input_submit.closest('form').serializeArray();

   // action = 'getResults';
    //pageSpeedRunId = 'e8fbney8mc';

    var datas = {
        ajax : 1,
        action : action,
        process : "runPageSpeedTest",
        runId : pageSpeedRunId
    };

    if (action=='createPageSpeedTest') {
        $('#module-alert-danger, #module-alert-success').addClass('hidden');
        input_submit.prop('disabled', true);
        inputSubmitClasses = input_submit.find('i').prop('class');
        input_submit.find('i').prop('class', 'process-icon-loading');
        datas.device = $('#device').val();

        $('#pagespeed-result').html(
            '<div id="pagespeed-waiting" class="well">'+
                '<i class="icon icon-cog"></i>'+
                '<p>'+ocPageSpeedCreating+'</p>'+
            '</div>'
        );
    }

    $.ajax({
    	type:"POST",
    	url : href,
    	async: true,
    	data : datas,
    	dataType : action == 'getResults' ? 'html' : 'json',
    	success : function(result, textStatus, jqXHR)
    	{
        	if(action == 'getResults') {
                $('#pagespeed-result').html(result);

                isAjaxRunning = false;
                input_submit.find('i').prop('class', inputSubmitClasses);
                input_submit.prop('disabled', false);
            	isPageSpeedTestAjaxRunning = false;
        	} else {
            	if (!$.isPlainObject(result)) {
                    isPageSpeedTestAjaxRunning = false;
                    document.location.href = href+'&error';
            	}

                if( action == 'createPageSpeedTest' && result.datas.runId ) {
                    pageSpeedRunId = result.datas.runId;
                }

                if (action=='checkRunProcess') {
                    switch(result.datas.status.statusCode) {
                        case 'awaiting' :
                            $('#pagespeed-result').html(
                                '<div id="pagespeed-waiting" class="well">'+
                                    '<i class="icon icon-cog"></i>'+
                                    '<p>'+ocPageSpeedQueue+' : '+(result.datas.status.position)+'</p>'+
                                '</div>'
                            );
                            break;
                        case 'running' :
                            $('#pagespeed-result').html(
                                '<div id="pagespeed-waiting" class="well">'+
                                    '<i class="icon icon-cog"></i>'+
                                    '<p>'+ocPageSpeedRunning+' ...</p>'+
                                '</div>'
                            );
                            break;
                        case 'complete' :
                            $('#pagespeed-result').html(
                                '<div id="pagespeed-waiting" class="well">'+
                                    '<i class="icon icon-cog"></i>'+
                                    '<p>'+ocPageSpeedDone+' ...</p>'+
                                '</div>'
                            );
                            break;
                        case 'failed' :
                            $('#pagespeed-result').html(
                                '<div id="pagespeed-error" class="well">'+
                                    '<i class="icon icon-times"></i>'+
                                    '<p>'+ocPageSpeedFailed+' : <br/>'+result.datas.status.error+'</p>'+
                                '</div>'
                            );
                            break;
                    }
                }

                setTimeout( function() {
                    if (result.datas.nextStep && result.datas.nextStep != 'Done') {
                        runPageSpeedTestAjaxProccess(input_submit, result.datas.nextStep);
                    }
                    if (!result.datas.nextStep || result.datas.nextStep == 'Done') {
                        isPageSpeedTestAjaxRunning = false;
                        input_submit.find('i').prop('class', inputSubmitClasses);
                        input_submit.prop('disabled', false);
                    }
                }, 3000 );
            }
        },
        error: function ( jqXHR, textStatus, errorThrown ) {
            document.location.href = href+'&error';
        }
    });
}


function displayErrorsResult(resultArray) {
    if(resultArray.length) {
        $('#module-alert-danger').removeClass('hidden').addClass('alert-loading');
        $('#module-alert-danger ul').append('<li>'+resultArray.join('</li><li>')+'</li>');
     }
}

function displayConfirmationsResult(resultArray) {
    if(resultArray.length) {
        $('#module-alert-success').removeClass('hidden').addClass('alert-loading');
        $('#module-alert-success ul').html('<li>'+resultArray.join('</li><li>')+'</li>');
     }
}


window.addEventListener("beforeunload", function (e) {
    if( isAjaxRunning!==false || isPageSpeedTestAjaxRunning!==false ){
	    (e || window.event).returnValue = ocTaskConfirmBeforeLeave; //Gecko + IE
	    return ocTaskConfirmBeforeLeave; //Gecko + Webkit, Safari, Chrome etc.
	}
});

$(document).ready( function(){
    $('.btn-toggle-view-overall').click(function() {
        $('.all_tables').hide();
        $('.overall_tables').slideDown();
    });

    $('.btn-toggle-view-all').click(function() {
        $('.overall_tables').hide();
        $('.all_tables').slideDown();
    });

     if( versionCompare( _PS_VERSION_, '1.6' ) == -1 ) {
         $('.label-tooltip').tooltip();
     } else {
         $('.label-tooltip').tooltip({
            content : $(this).prop('title')
        });
    }

    $('input[name=OCCRON_CUSTOMERS]').change( function()	{
        $('#OCCRON_CUSTOMERS_on').is(':checked') ? showField('OCCRON_CUSTOMERS_ORDER_MONTHS') : hideField('OCCRON_CUSTOMERS_ORDER_MONTHS');
        $('#OCCRON_CUSTOMERS_on').is(':checked') ? showField('OCCRON_CUSTOMERS_NOORDER_MONTHS') : hideField('OCCRON_CUSTOMERS_NOORDER_MONTHS');
	}).trigger('change');

	 $('input[name=OCCRON_ORDERS]').change( function()	{
        $('#OCCRON_ORDERS_on').is(':checked') ? showField('OCCRON_ORDERS_MONTHS') : hideField('OCCRON_ORDERS_MONTHS');
	}).trigger('change');

	 $('input[name=OCCRON_CARTS]').change( function()	{
        $('#OCCRON_CARTS_on').is(':checked') ? showField('OCCRON_CARTS_MONTHS') : hideField('OCCRON_CARTS_MONTHS');
	}).trigger('change');

	$('input[name=OCCRON_CONNECTIONS]').change( function()	{
        $('#OCCRON_CONNECTIONS_on').is(':checked') ? showField('OCCRON_CONNECTIONS_MONTHS') : hideField('OCCRON_CONNECTIONS_MONTHS');
	}).trigger('change');

    $('input[name=OCCRON_CART_RULES]').change( function()	{
        $('#OCCRON_CART_RULES_on').is(':checked') ? showField('OCCRON_CART_RULES_MONTHS') : hideField('OCCRON_CART_RULES_MONTHS');
	}).trigger('change');

    $('input[name=OCCRON_SPECIFICS]').change( function()	{
        $('#OCCRON_SPECIFICS_on').is(':checked') ? showField('OCCRON_SPECIFICS_MONTHS') : hideField('OCCRON_SPECIFICS_MONTHS');
	}).trigger('change');

	$('input[name=OCCRON_LOGS]').change( function()	{
        $('#OCCRON_LOGS_on').is(':checked') ? showField('OCCRON_LOGS_MONTHS') : hideField('OCCRON_LOGS_MONTHS');
	}).trigger('change');

	$('input[name=OCCRON_NOTFOUNDS]').change( function()	{
        $('#OCCRON_NOTFOUNDS_on').is(':checked') ? showField('OCCRON_NOTFOUNDS_MONTHS') : hideField('OCCRON_NOTFOUNDS_MONTHS');
	}).trigger('change');

	$('input[name=OCCRON_GUESTS]').change( function()	{
        $('#OCCRON_GUESTS_on').is(':checked') ? showField('OCCRON_GUESTS_TYPE') : hideField('OCCRON_GUESTS_TYPE');
	}).trigger('change');

    $('#optimclean-tabs li').on('click', function() {
        var panel = $(this).data('panel');
        $('#optimclean-tabs li').removeClass('active');
        $(this).addClass('active');
        $('#optimclean-panels > *').hide();
        $('#'+panel).show();
    });

    $('#optimclean-tabs li.active').each(function() {
        var panel = $(this).data('panel');
        $('#optimclean-tabs li').removeClass('active');
        $(this).addClass('active');
        $('#optimclean-panels > *').hide();
        $('#'+panel).show();
    });

    $('.display-confirmation').click( function(event) {
        event.stopPropagation();
        if (confirm(ocTaskConfirm)) {
            if ( parseInt(ocAjaxMode) == 1 && $(this).hasClass('use-ajax')) {
                runAjaxProccess($(this), 'getResume');
                return false;
            } else {
                return true;
            }
        } else
            return false;
    });

    $('#runPageSpeedTest').click( function(event) {
        event.stopPropagation();
        runPageSpeedTestAjaxProccess($(this), 'createPageSpeedTest');
        return false;
    });

});