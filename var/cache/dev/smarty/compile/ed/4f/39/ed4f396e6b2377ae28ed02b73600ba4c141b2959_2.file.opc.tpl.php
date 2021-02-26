<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:03
  from '/var/www/reikiadaliu.eu/public_html/modules/cdc_googletagmanager/views/templates/hook/opc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d320cb78_43677907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed4f396e6b2377ae28ed02b73600ba4c141b2959' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/modules/cdc_googletagmanager/views/templates/hook/opc.tpl',
      1 => 1606067073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d320cb78_43677907 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['dataLayer']->value)) {
echo '<script'; ?>
>
var cdcGtmOpcLastStep = 1;
var cdcGtmOpc = {
	pushCheckoutStep : function(step, option) {
		console.log("[call] step: " + step + " : " + option);
		if(step > cdcGtmOpcLastStep) {
			var dataLayerOpc = <?php echo $_smarty_tpl->tpl_vars['dataLayer']->value;?>
;
			dataLayerOpc.event = "checkout_opc";
			dataLayerOpc.ecommerce.checkout.actionField.step = step;
			dataLayerOpc.ecommerce.checkout.actionField.option = option;
			dataLayer.push(dataLayerOpc);
			console.log("[sent] step: " + step + " : " + option);
			cdcGtmOpcLastStep = step;
		}
	}
}

// address
function gtmOpcAddress() {
	cdcGtmOpc.pushCheckoutStep(2, "address");
}
// delivery option chosen
function gtmOpcDelivery() {
	var delay = 0;
	if(cdcGtmOpcLastStep < 2) {
		gtmOpcAddress();
		delay = 100;
	}
	setTimeout(function() {
		cdcGtmOpc.pushCheckoutStep(3, "delivery");
	}, delay);
}
// payment chosen
function gtmOpcPayment() {
	var delay = 0;
	if(cdcGtmOpcLastStep < 3) {
		gtmOpcDelivery();
		delay = 100;
	}
	setTimeout(function() {
		cdcGtmOpc.pushCheckoutStep(4, "payment");
	}, delay);
}


// supercheckout - Knowband - One Page Checkout, Social Login & Mailchimp v3.0.7
if($("#velsof_supercheckout_form").length) {
	console.log("[CDCGTM] supercheckout - Knowband");
	$("#checkoutShippingAddress").on("click", function(e) {
		if(!e.isTrigger) {
			gtmOpcAddress();
		}
	});
	$("#velsof_supercheckout_form").on("click", "#shipping-method", function(e) {
		if(!e.isTrigger) {
			gtmOpcDelivery();
		}
	});
	$("#velsof_supercheckout_form").on("click", "#payment-method", function(e) {
		if(!e.isTrigger) {
			gtmOpcPayment();
		}
	});
}

// onepagecheckoutps - PresTeamShop - One Page Checkout PrestaShop v1.3.8 -> v2.2.2
else if($("#onepagecheckoutps").length) {
	console.log("[CDCGTM] onepagecheckoutps - PresTeamShop");
	$("#onepagecheckoutps").on("click", "#onepagecheckoutps_step_one", function(e) {
		if(!e.isTrigger) {
			gtmOpcAddress();
		}
	});
	$("#onepagecheckoutps").on("click", "#onepagecheckoutps_step_two", function(e) {
		if(!e.isTrigger) {
			gtmOpcDelivery();
		}
	});
	$("#onepagecheckoutps").on("click", "#onepagecheckoutps_step_three", function(e) {
		if(!e.isTrigger) {
			gtmOpcPayment();
		}
	});
}

// bestkit_opc - best-kit - One Step Checkout / One Page Checkout v1.6.7
else if($("#3column_opc").length || $("#bigcart_opc").length) {
	var $opc_wrapper = null;
	// 2 styles: 3 columns or bigcart
	if($("#3column_opc").length) {
		$opc_wrapper = $("#3column_opc");
	} else {
		$opc_wrapper = $("#bigcart_opc");
	}
	console.log("[CDCGTM] bestkit_opc - best-kit - style: " + $opc_wrapper.prop('id'));
	$opc_wrapper.on("click", "#opc_account", function(e) {
		if(!e.isTrigger) {
			gtmOpcAddress();
		}
	});
	$opc_wrapper.on("click", "#opc_delivery_methods", function(e) {
		if(!e.isTrigger) {
			gtmOpcDelivery();
		}
	});
	$opc_wrapper.on("click", "#opc_payments", function(e) {
		if(!e.isTrigger) {
			gtmOpcPayment();
		}
	});
}

// klarnaofficial - Prestaworks AB - Klarna v1.8.42
else if($(".kco-main").length) {
	console.log("[CDCGTM] klarnaofficial - Prestaworks AB");
	$(".kco-main").on("click", "#klarnacarrier", function(e) {
		if(!e.isTrigger) {
			gtmOpcDelivery();
		}
	});
	$(".kco-main").on("click", "#klarna-checkout-container", function(e) {
		if(!e.isTrigger) {
			gtmOpcPayment();
		}
	});
}

// default Prestashop 1.5 / 1.6 OPC
else {
	$("#order-opc").on("click", "#opc_account", function(e) {
		if(!e.isTrigger) {
			gtmOpcAddress();
		}
	});
	$("#order-opc").on("click", "#carrier_area", function(e) {
		if(!e.isTrigger) {
			gtmOpcDelivery();
		}
	});
	$("#order-opc").on("click", "#opc_payment_methods", function(e) {
		if(!e.isTrigger) {
			gtmOpcPayment();
		}
	});
}

<?php echo '</script'; ?>
>
<?php }
}
}
