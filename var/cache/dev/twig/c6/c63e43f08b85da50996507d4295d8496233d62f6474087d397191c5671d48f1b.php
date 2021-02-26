<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__038be86338f5f7f2a6371e6e03d6fca1dd7c370ab8ccc5254eff9151efad8cdb */
class __TwigTemplate_854b60d1b5701056ba23a73d849a1984006278dde51fd3dd8663da0a3cec8e29 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "__string_template__038be86338f5f7f2a6371e6e03d6fca1dd7c370ab8ccc5254eff9151efad8cdb"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "__string_template__038be86338f5f7f2a6371e6e03d6fca1dd7c370ab8ccc5254eff9151efad8cdb"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"lt\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Našumas • RM automotive</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminPerformance';
    var iso_user = 'lt';
    var lang_is_rtl = '0';
    var full_language_code = 'lt-lt';
    var full_cldr_language_code = 'lt-LT';
    var country_iso_code = 'LT';
    var _PS_VERSION_ = '1.7.6.7';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Parduotuvėje atliktas naujas užsakymas.';
    var order_number_msg = 'Užsakymo numeris: ';
    var total_msg = 'Viso: ';
    var from_msg = 'Nuo: ';
    var see_order_msg = 'Peržiūrėti šį užsakymą';
    var new_customer_msg = 'Parduotuvėje užsiregistravo naujas pirkėjas.';
    var customer_name_msg = 'Kliento vardas: ';
    var new_msg = 'Gauta nauja žinutė jūsų parduotuvėje.';
    var see_msg = 'Skaityti šią žinutę';
    var token = 'a33254988ae8ef1cee3225b412b235f3';
    var token_admin_orders = '15a98cf31ed2e13f2df6fe4e64306dcb';
    var token_admin_customers = '60c215b884473de8716a7cfaf67b76a8';
    var token_admin_customer_threads = '4348e6f93cfe49be6b6fedd074118ac0';
    var currentIndex = 'index.php?controller=AdminPerformance';
    var employee_token = '6a666c04efa3f04f7beb29c2776013d0';
    var choose_language_translate = 'Pasirinkite kalbą';
    var default_language = '1';
    var admin_modules_link = '/admin660go1drk/index.php/improve/modules/catalog/recommended?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var admin_notification_get_link = '/admin660go1drk/index.php/common/notifications?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var admin_notification_push_link = '/admin660go1drk/index.php/common/notifications/ack?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var tab_modules_list = 'oneandonehosting,jmango360_api';
    var update_success_msg = 'Atnaujinta';
    var errorLogin = 'PrestaShop nepavyko prisijungti prie Addons. Patikrinkite savo prisijungimo duomenis ir interneto ryšį.';
    var search_product_msg = 'Ieškoti prekės';
  </script>

      <link href=\"/modules/appagebuilder/views/css/admin/style.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin660go1drk/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/leoblog/views/css/admin/blogmenu.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_superspeed/views/css/all_admin.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_superspeed/views/css/font-awesome.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ipmanager/views/css/back.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin660go1drk/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/leofeature/views/css/back.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ps_mbo/views/css/recommended-modules.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var appagebuilder_listshortcode_url = \"https:\\/\\/reikiadaliu.eu\\/admin660go1drk\\/index.php?controller=AdminApPageBuilderShortcode&token=4d60d6f7897867d22d12dad80f37c906&get_listshortcode=1\";
var appagebuilder_module_dir = \"\\/modules\\/appagebuilder\\/\";
var baseAdminDir = \"\\/admin660go1drk\\/\";
var baseDir = \"\\/\";
var changeFormLanguageUrl = \"\\/admin660go1drk\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euras\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var leofeature_module_dir = \"\\/modules\\/leofeature\\/\";
var number_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>
<script type=\"text/javascript\" src=\"/modules/appagebuilder/views/js/admin/function.js\"></script>
<script type=\"text/javascript\" src=\"/modules/makecommerce/views/js/makecommerce.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ipmanager/views/js/back.js\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.6.7\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.6.7\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/modules/leofeature/views/js/back.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_mbo/views/js/recommended-modules.js?v=2.0.1\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/default/js/bundle/module/module_card.js?v=1.7.6.7\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/admin660go1drk/index.php/common/notifications?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script>
            var admin_gamification_ajax_url = \"https:\\/\\/reikiadaliu.eu\\/admin660go1drk\\/index.php?controller=AdminGamification&token=771ea34e44528d92eca8e333db5e91fb\";
            var current_id_tab = 105;
        </script><script type=\"text/javascript\">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = 'Duplicated URLs';
    FSAU.menu_button_url = 'https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminModules&amp;token=2825389870d52d28127a9a8f5c46e819&amp;configure=fsadvancedurl&amp;tab_section=fsau_duplicate_tab';
    FSAU.params_hash = '321aae987dbcdf3175221ab6d7c32d5ec594a73b';
</script>
<script type=\"text/javascript\" src=\"/modules/fsadvancedurl/views/js/admin.js\"></script>

";
        // line 121
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>

<body class=\"lang-lt adminperformance\">

  <header id=\"header\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\"></a>
      <span id=\"shop_version\">1.7.6.7</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Greita prieiga
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/improve/modules/manage?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Įdiegti moduliai\"
      >Įdiegti moduliai</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=10222b8be91522607ab7d22e09b36901\"
                 data-item=\"Katalogo vertinimas\"
      >Katalogo vertinimas</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/sell/catalog/categories/new?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Nauja kategorija\"
      >Nauja kategorija</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/sell/catalog/products/new?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Nauja prekė\"
      >Nauja prekė</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=47c7378c14d967da83e1127d79163f0e\"
                 data-item=\"Naujas kuponas\"
      >Naujas kuponas</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\"
                 data-item=\"Užsakymai\"
      >Užsakymai</a>
        <div class=\"dropdown-divider\"></div>
          <a
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"67\"
        data-icon=\"icon-AdminAdvancedParameters\"
        data-method=\"add\"
        data-url=\"index.php/configure/advanced/performance/?-2tKU05COnHfXuU59o\"
        data-post-link=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminQuickAccesses&token=d5b3fd4e1f8ea50a64c84118690d33f7\"
        data-prompt-text=\"Įveskite pavadinimą šiai santrumpai:\"
        data-link=\"Na&scaron;umas - Sąra&scaron;as\"
      >
        <i class=\"material-icons\">add_circle</i>
        Pridėti puslapį į greitą prieigą
      </a>
        <a class=\"dropdown-item\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminQuickAccesses&token=d5b3fd4e1f8ea50a64c84118690d33f7\">
      <i class=\"material-icons\">settings</i>
      Tvarkyti greitą prieigą
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/admin660go1drk/index.php?controller=AdminSearch&amp;token=a158486e08a86a9ccd4825be889c6531\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Paieška (pvz.: prekės kodas, kliento vardas...)\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Visur
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Visur\" href=\"#\" data-value=\"0\" data-placeholder=\"Ko jūs ieškote?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Visur</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Katalogas\" href=\"#\" data-value=\"1\" data-placeholder=\"Prekės pavadinimas, SKU, kodas...\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Katalogas</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal vardą\" href=\"#\" data-value=\"2\" data-placeholder=\"El. paštas, vardas...\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Klientai pagal vardą</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal IP adresą\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.80\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Klientai pagal IP adresą</a>
        <a class=\"dropdown-item\" data-item=\"Užsakymai\" href=\"#\" data-value=\"3\" data-placeholder=\"Užsakymo ID\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Užsakymai</a>
        <a class=\"dropdown-item\" data-item=\"Sąskaitos\" href=\"#\" data-value=\"4\" data-placeholder=\"Sąskaitos numeris\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Sąskaitos</a>
        <a class=\"dropdown-item\" data-item=\"Krepšeliai\" href=\"#\" data-value=\"5\" data-placeholder=\"Krepšelio ID\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Krepšeliai</a>
        <a class=\"dropdown-item\" data-item=\"Moduliai\" href=\"#\" data-value=\"7\" data-placeholder=\"Modulio pavadinimas\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Moduliai</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">PAIEŠKA</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

              <div class=\"component hide-mobile-sm\" id=\"header-debug-mode-container\">
          <a class=\"link shop-state\"
             id=\"debug-mode\"
             data-toggle=\"pstooltip\"
             data-placement=\"bottom\"
             data-html=\"true\"
             title=\"<p class='text-left'><strong>Jūsų parduotuvė yra priežiūros režime.</strong></p><p class='text-left'>Visos PHP klaidos ir pranešimai yra atvaizduojami. Jeigu jums to daugiau nereikia, <strong>išjunkite</strong> šį režimą.</p>\"
             href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
          >
            <i class=\"material-icons\">bug_report</i>
            <span>Klaidų taisymo režimas</span>
          </a>
        </div>
      
              <div class=\"component hide-mobile-sm\" id=\"header-maintenance-mode-container\">
          <a class=\"link shop-state\"
             id=\"maintenance-mode\"
             data-toggle=\"pstooltip\"
             data-placement=\"bottom\"
             data-html=\"true\"
             title=\"<p class='text-left'><strong>Jūsų parduotuvė veikia priežiūros rėžimu.</strong></p><p class='text-left'>Jūsų lankytojai ir klientai negalės prisijungti prie jūsų parduotuvės, nes ji veikia priežiūros rėžimu. &lt;br /&gt; Norėdami valdyti priežiūros rėžimo nustatymus, eikite Pardutuvės nustatymai &amp;gt; Priežiūra.</p>\" href=\"/admin660go1drk/index.php/configure/shop/maintenance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
          >
            <i class=\"material-icons\">build</i>
            <span>Profilaktikos režimas</span>
          </a>
        </div>
      
      <div class=\"component\" id=\"header-shop-list-container\">
          <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://reikiadaliu.eu/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      Peržiūrėti parduotuvę
    </a>
  </div>
      </div>

              <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Užsakymai<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Klientai<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Pranešimas<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų užsakymų nėra :(<br>
              Ar neseniai tikrinote savo valiutų konvertavimo kursą?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų klientų nėra :(<br>
              Ar šiomis dienomis aktyviai dalyvaujate socialiniuose tinkluose?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų žinučių nėra.<br>
              Yra daugiau laiko kažkam kita!
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      nuo <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - registruotas <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      
      <span class=\"employee_avatar\"><img class=\"avatar rounded-circle\" src=\"https://profile.prestashop.com/nikita.skrobov.dev%40gmail.com.jpg\" /></span>
      <span class=\"employee_profile\">Sveiki sugrįžę Nikita</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/admin660go1drk/index.php/configure/advanced/employees/2/edit?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\">
      <i class=\"material-icons\">settings</i>
      Jūsų profilis
    </a>
    </div>
    
    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/resources/documentations?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=resources-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">book</i> Ištekliai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">school</i> Mokymai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/experts?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=expert-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">person_pin_circle</i> Rasti ekspertą</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">extension</i> PrestaShop prekyvietė</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">help</i> Pagalbos centras</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLogin&amp;logout=1&amp;token=ceaeaef9ffcd65e5ae6bb74a3a1b2cdb\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Atsijungti</span>
    </a>
  </div>
</div>
      </div>
    </nav>

      </header>

  <nav class=\"nav-bar d-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/admin660go1drk/index.php/configure/advanced/employees/toggle-navigation?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\" id=\"tab-AdminDashboard\">
            <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Skydelis</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"2\" id=\"tab-SELL\">
              <span class=\"title\">Pardavimai</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\" class=\"link\">
                    <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                    <span>
                    Užsakymai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\" class=\"link\"> Užsakymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                              <a href=\"/admin660go1drk/index.php/sell/orders/invoices/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Sąskaitos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSlip&amp;token=1bb796a14930fb8fffaf930d443a6717\" class=\"link\"> Grąžinimo kuponai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                              <a href=\"/admin660go1drk/index.php/sell/orders/delivery-slips/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pristatymo kvitai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarts&amp;token=c3e62be2249517a4f45744a6bb0c96c8\" class=\"link\"> Prekių krepšeliai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                  <a href=\"/admin660go1drk/index.php/sell/catalog/products?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-store\">store</i>
                    <span>
                    Katalogas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/products?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/categories?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Kategorijos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminTracking&amp;token=046eea4dc6167e39236e42e86be48bdb\" class=\"link\"> Kontrolė
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAttributesGroups&amp;token=41c4cb1348d3f983a1394df04e7f2113\" class=\"link\"> Savybės ir ypatybės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/brands/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekių ženklai ir tiekėjai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAttachments&amp;token=1bf18d4c199697d8b0b3ea19bca19962\" class=\"link\"> Failai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCartRules&amp;token=47c7378c14d967da83e1127d79163f0e\" class=\"link\"> Nuolaidos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                              <a href=\"/admin660go1drk/index.php/sell/stocks/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                  <a href=\"/admin660go1drk/index.php/sell/customers/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-account_circle\">account_circle</i>
                    <span>
                    Klientai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                              <a href=\"/admin660go1drk/index.php/sell/customers/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Klientai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAddresses&amp;token=541f0b7e3f304304b06eb5f7a66afa56\" class=\"link\"> Adresai
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCustomerThreads&amp;token=4348e6f93cfe49be6b6fedd074118ac0\" class=\"link\">
                    <i class=\"material-icons mi-chat\">chat</i>
                    <span>
                    Klientų aptarnavimas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCustomerThreads&amp;token=4348e6f93cfe49be6b6fedd074118ac0\" class=\"link\"> Klientų aptarnavimas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrderMessage&amp;token=09e3ffc55381e5d542d1eaa65f845fdd\" class=\"link\"> Užsakymo pranešimai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminReturn&amp;token=c34804c7a8ad0d900b89443c861b0ba5\" class=\"link\"> Prekių grąžinimai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminStats&amp;token=10222b8be91522607ab7d22e09b36901\" class=\"link\">
                    <i class=\"material-icons mi-assessment\">assessment</i>
                    <span>
                    Statistika
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"180\" id=\"subtab-AdminkbsupercheckoutConfigure\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSetting&amp;token=6658b4643c6bd60508a104f76071c561\" class=\"link\">
                    <i class=\"material-icons mi-\"></i>
                    <span>
                    Knowband Supercheckout
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-180\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"181\" id=\"subtab-AdminSuperSetting\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSetting&amp;token=6658b4643c6bd60508a104f76071c561\" class=\"link\"> General Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"182\" id=\"subtab-AdminAbandonedCheckout\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAbandonedCheckout&amp;token=188e9c1efc9aec43a7d72b176f28c56e\" class=\"link\"> Abandoned Checkout Statistics
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"183\" id=\"subtab-AdminCheckoutBehavior\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCheckoutBehavior&amp;token=aeb103fdc4d10770d386b76d6c8e2b9f\" class=\"link\"> Checkout behaviour Report
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"42\" id=\"tab-IMPROVE\">
              <span class=\"title\">Pritaikymai</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                  <a href=\"/admin660go1drk/index.php/improve/modules/manage?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Moduliai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                              <a href=\"/admin660go1drk/index.php/improve/modules/manage?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Module Manager
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                              <a href=\"/admin660go1drk/index.php/modules/addons/modules/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Modulių Katalogas
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"157\" id=\"subtab-AdminLeoBootstrapMenuModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoBootstrapMenuModule&amp;token=54fe8c035712615fbb0887610168cd84\" class=\"link\"> Leo Megamenu Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"160\" id=\"subtab-AdminLeoSlideshowMenuModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoSlideshowMenuModule&amp;token=31607bb1b50b19872580a85e91f72e6a\" class=\"link\"> Leo Slideshow Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"164\" id=\"subtab-AdminLeoQuickLoginModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoQuickLoginModule&amp;token=c6bcbfe8a3204862c6265c27f84fd729\" class=\"link\"> Leo Quick Login Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"165\" id=\"subtab-AdminLeoProductSearchModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoProductSearchModule&amp;token=c87d719321d4b6b4a969209bd33fd42e\" class=\"link\"> Leo Product Search Configuration
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                  <a href=\"/admin660go1drk/index.php/improve/design/themes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                    <span>
                    Išvaizda
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"126\" id=\"subtab-AdminThemesParent\">
                              <a href=\"/admin660go1drk/index.php/improve/design/themes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Tema ir logotipas
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"136\" id=\"subtab-AdminPsMboTheme\">
                              <a href=\"/admin660go1drk/index.php/modules/addons/themes/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Temos katalogas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\" id=\"subtab-AdminParentMailTheme\">
                              <a href=\"/admin660go1drk/index.php/improve/design/mail_theme/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> El. laiškų tema
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                              <a href=\"/admin660go1drk/index.php/improve/design/cms-pages/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Puslapiai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                              <a href=\"/admin660go1drk/index.php/improve/design/modules/positions/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pozicijos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"59\" id=\"subtab-AdminImages\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminImages&amp;token=7c58873295312b2ec8e090d798f4ab9d\" class=\"link\"> Paveiksliukų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\" id=\"subtab-AdminLinkWidget\">
                              <a href=\"/admin660go1drk/index.php/modules/link-widget/list?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarriers&amp;token=0aeb5f991554d207feae001ca9218a01\" class=\"link\">
                    <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                    <span>
                    Pristatymas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarriers&amp;token=0aeb5f991554d207feae001ca9218a01\" class=\"link\"> Kurjeriai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                              <a href=\"/admin660go1drk/index.php/improve/shipping/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"168\" id=\"subtab-AdminVenipak\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminVenipak&amp;token=840b73d3aea183be468b2243eb4d6d2c\" class=\"link\"> Venipak
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                  <a href=\"/admin660go1drk/index.php/improve/payment/payment_methods?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-payment\">payment</i>
                    <span>
                    Mokėjimas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                              <a href=\"/admin660go1drk/index.php/improve/payment/payment_methods?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Mokėjimo būdai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\" id=\"subtab-AdminPaymentPreferences\">
                              <a href=\"/admin660go1drk/index.php/improve/payment/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"167\" id=\"subtab-AdminPayseraConfiguration\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminPayseraConfiguration&amp;token=341ef3b55bd63439dcf9b2934012fc7f\" class=\"link\"> Paysera apmokėjimas
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                  <a href=\"/admin660go1drk/index.php/improve/international/localization/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-language\">language</i>
                    <span>
                    Tarptautinis
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                              <a href=\"/admin660go1drk/index.php/improve/international/localization/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Lokalizacija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminZones&amp;token=5323da5eef2b94abce6f0149841ff77c\" class=\"link\"> Vietovės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                              <a href=\"/admin660go1drk/index.php/improve/international/taxes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Mokesčiai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                              <a href=\"/admin660go1drk/index.php/improve/international/translations/settings?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Vertimai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"138\" id=\"subtab-AdminApPageBuilder\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProfiles&amp;token=33bec92aeb2c9d5c0ab750d5df2e529f\" class=\"link\">
                    <i class=\"material-icons mi-tab\">tab</i>
                    <span>
                    Ap PageBuilder
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-138\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"139\" id=\"subtab-AdminApPageBuilderProfiles\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProfiles&amp;token=33bec92aeb2c9d5c0ab750d5df2e529f\" class=\"link\"> Ap Profiles Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"140\" id=\"subtab-AdminApPageBuilderPositions\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderPositions&amp;token=50383684e9d230e56ebc08068b9736c1\" class=\"link\"> Ap Positions Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"141\" id=\"subtab-AdminApPageBuilderShortcode\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderShortcode&amp;token=4d60d6f7897867d22d12dad80f37c906\" class=\"link\"> Ap ShortCode Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"143\" id=\"subtab-AdminApPageBuilderProducts\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProducts&amp;token=2b047dda4d8708ed53eaaf0066301f13\" class=\"link\"> Ap Products List Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"144\" id=\"subtab-AdminApPageBuilderDetails\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderDetails&amp;token=1aa61fa113df46eb3bba1bbc53fb11b0\" class=\"link\"> Ap Products Details Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"146\" id=\"subtab-AdminApPageBuilderThemeEditor\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderThemeEditor&amp;token=d77c1db8955c7843f7e18805f8bd3b1d\" class=\"link\"> Ap Live Theme Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"147\" id=\"subtab-AdminApPageBuilderModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderModule&amp;token=6d03e99a7e8fb8f124b21a1491426758\" class=\"link\"> Ap Module Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"148\" id=\"subtab-AdminApPageBuilderThemeConfiguration\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderThemeConfiguration&amp;token=63d8da8740b52de8dcc222d66ccdda52\" class=\"link\"> Ap Theme Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"166\" id=\"subtab-AdminApPageBuilderHook\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderHook&amp;token=448f12cb00b6a31e565eb24ae086c926\" class=\"link\"> Ap Hook Control Panel
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"151\" id=\"subtab-AdminLeoblogManagement\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogDashboard&amp;token=7a682567c1880a53876876b07702e892\" class=\"link\">
                    <i class=\"material-icons mi-create\">create</i>
                    <span>
                    Leo Blog Management
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-151\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"152\" id=\"subtab-AdminLeoblogDashboard\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogDashboard&amp;token=7a682567c1880a53876876b07702e892\" class=\"link\"> Blog Dashboard
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"153\" id=\"subtab-AdminLeoblogCategories\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogCategories&amp;token=0a10c348ac147a20265da3f71f54d814\" class=\"link\"> Categories Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"154\" id=\"subtab-AdminLeoblogBlogs\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogBlogs&amp;token=3cd1bed1d1b16c6c204fbf6ebb1e5f39\" class=\"link\"> Blogs Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"155\" id=\"subtab-AdminLeoblogComments\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogComments&amp;token=9f5d02504fd2e0573d55767ec04c6290\" class=\"link\"> Comment Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"156\" id=\"subtab-AdminLeoblogModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogModule&amp;token=c18e239d6df092264fff6b2ca6db83b6\" class=\"link\"> Leo Blog Configuration
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"161\" id=\"subtab-AdminLeofeatureManagement\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureModule&amp;token=106aba62dde8e30a68b19eeee10d3ea8\" class=\"link\">
                    <i class=\"material-icons mi-star\">star</i>
                    <span>
                    Leo Feature Management
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-161\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"162\" id=\"subtab-AdminLeofeatureModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureModule&amp;token=106aba62dde8e30a68b19eeee10d3ea8\" class=\"link\"> Leo Feature Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"163\" id=\"subtab-AdminLeofeatureReviews\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureReviews&amp;token=5005e321b9fa66c5865b2b77c6bd1635\" class=\"link\"> Product Review Management
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title -active\" data-submenu=\"80\" id=\"tab-CONFIGURE\">
              <span class=\"title\">Konfigūruoti</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                  <a href=\"/admin660go1drk/index.php/configure/shop/preferences/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-settings\">settings</i>
                    <span>
                    Parduotuvės nustatymai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/preferences/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pagrindiniai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/order-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Užsakymų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/product-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/customer-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Klientų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/contacts/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Kontaktai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/seo-urls/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Duomenų srautas ir SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSearchConf&amp;token=0d4f3ddbfc6ab8c1b55077567032fa89\" class=\"link\"> Paieška
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\" id=\"subtab-AdminGamification\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminGamification&amp;token=771ea34e44528d92eca8e333db5e91fb\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                                                    
                <li class=\"link-levelone has_submenu -active open ul-open\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                  <a href=\"/admin660go1drk/index.php/configure/advanced/system-information/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                    <span>
                    Išplėstiniai parametrai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_up
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/system-information/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Informacija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Našumas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/administration/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Administracija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/emails/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> El. paštas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"108\" id=\"subtab-AdminImport\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/import/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Importuoti
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/employees/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Darbuotojai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/sql-requests/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Duomenų bazė
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/logs/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Įvykių žurnalas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/webservice-keys/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Webservice&#039;as
                              </a>
                            </li>

                                                                                                                                                                                
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"195\" id=\"subtab-AdminCdcGoogletagmanagerOrders\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCdcGoogletagmanagerOrders&amp;token=47f102c054967af6ad682cfaca32b1fc\" class=\"link\"> GTM Orders
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"186\" id=\"tab-AdminSuperSpeed\">
              <span class=\"title\">Speed Optimization</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"187\" id=\"subtab-AdminSuperSpeedStatistics\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedStatistics&amp;token=8f457fe60e90e5b39668434ac7e41202\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-dashboard\">icon icon-dashboard</i>
                    <span>
                    Skydelis
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"188\" id=\"subtab-AdminSuperSpeedPageCaches\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedPageCaches&amp;token=b3e6ef4215ee50dfe1c6ce2284be7bd0\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-pagecache\">icon icon-pagecache</i>
                    <span>
                    Page cache
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"189\" id=\"subtab-AdminSuperSpeedImage\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedImage&amp;token=48e5f7174bec0e8d5c297119c5abbed2\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedimage\">icon icon-speedimage</i>
                    <span>
                    Image optimization
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"190\" id=\"subtab-AdminSuperSpeedMinization\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedMinization&amp;token=85bbaa5239cd56d59df53b88d1455f76\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedminization\">icon icon-speedminization</i>
                    <span>
                    Server cache and minification
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"191\" id=\"subtab-AdminSuperSpeedGzip\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedGzip&amp;token=d202efa303cd17a7c039af77598576cb\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedgzip\">icon icon-speedgzip</i>
                    <span>
                    Browser cache and Gzip
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"192\" id=\"subtab-AdminSuperSpeedDatabase\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedDatabase&amp;token=2b216c8922696e31597c827f159569f1\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speeddatabase\">icon icon-speeddatabase</i>
                    <span>
                    Database optimization
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"193\" id=\"subtab-AdminSuperSpeedSystemAnalytics\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedSystemAnalytics&amp;token=0a99d896372a68135d4b431475c62f35\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-analytics\">icon icon-analytics</i>
                    <span>
                    System Analytics
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"194\" id=\"subtab-AdminSuperSpeedHelps\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedHelps&amp;token=ca707c430e22818631fceed01b7c7494\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-help\">icon icon-help</i>
                    <span>
                    Pagalba
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"196\" id=\"tab-AdminIpManager\">
              <span class=\"title\">IP Manager</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"197\" id=\"subtab-AdminIpManagerSettings\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerSettings&amp;token=e33ae175880e2753f7715192d7be2c5f\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    General Settings
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"198\" id=\"subtab-AdminIpManagerBlockedIps\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedIps&amp;token=fe1cdd5b2db87c5f958b40bf074ef5c5\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked IPs
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"199\" id=\"subtab-AdminIpManagerBlockedCountry\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedCountry&amp;token=64c1bb7037d07a16949116b07b8bc68f\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked Countries
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"200\" id=\"subtab-AdminIpManagerBlockedAgent\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedAgent&amp;token=0857687ba5ac3c8a4b994fe0989f8df9\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked Bots
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"201\" id=\"subtab-AdminIpManagerAntiDdosAttack\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerAntiDdosAttack&amp;token=b23ac59eff425b045a350b5553a99ab8\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Anti DDoS Attack
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
            </ul>
  
</nav>

<div id=\"main-div\">
          
<div class=\"header-toolbar\">
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Išplėstiniai parametrai</li>
          
                      <li class=\"breadcrumb-item active\">
              <a href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" aria-current=\"page\">Našumas</a>
            </li>
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Našumas          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                                                    <a
                  class=\"btn btn-primary  pointer\"                  id=\"page-header-desc-configuration-clear_cache\"
                  href=\"/admin660go1drk/index.php/configure/advanced/performance/clear-cache?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"                  title=\"Valyti kešą\"                >
                  <i class=\"material-icons\">delete</i>                  Valyti kešą
                </a>
                                                                  <a
                class=\"btn btn-outline-secondary \"
                id=\"page-header-desc-configuration-modules-list\"
                href=\"/admin660go1drk/index.php/improve/modules/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"                title=\"Rekomenduojami moduliai\"
                              >
                Rekomenduojami moduliai
              </a>
            
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Pagalba\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/admin660go1drk/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Flt%252Fdoc%252FAdminPerformance%253Fversion%253D1.7.6.7%2526country%253Dlt/Pagalba?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
                   id=\"product_form_open_help\"
                >
                  Pagalba
                </a>
                                    </div>
        </div>
      
    </div>
  </div>

  
    <!-- begin /var/www/reikiadaliu.eu/public_html/modules/ps_mbo/views/templates/hook/recommended-modules.tpl -->
<script>
  if (undefined !== mbo) {
    mbo.initialize({
      translations: {
        'Recommended Modules and Services': 'Rekomenduojami moduliai ir paslaugos',
        'Close': 'Uždaryti',
      },
      recommendedModulesUrl: '/admin660go1drk/index.php/modules/addons/modules/recommended?tabClassName=AdminPerformance&_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o',
      shouldAttachRecommendedModulesAfterContent: 0,
      shouldAttachRecommendedModulesButton: 1,
      shouldUseLegacyTheme: 0,
    });
  }
</script>
<!-- end /var/www/reikiadaliu.eu/public_html/modules/ps_mbo/views/templates/hook/recommended-modules.tpl -->
</div>
      
      <div class=\"content-div  \">

        

                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  ";
        // line 1640
        $this->displayBlock('content_header', $context, $blocks);
        // line 1641
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1642
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1643
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1644
        echo "
            
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>O ne!</h1>
  <p class=\"mt-3\">
    Šio puslapio mobili versija šiuo metu negalima.
  </p>
  <p class=\"mt-2\">
    Norėdami matyti šį puslapį naudokite kompiuterį tol, kol jis bus pritaikytas mobiliems įrenginiams.
  </p>
  <p class=\"mt-2\">
    Ačiū.
  </p>
  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Atgal
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-LT&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/lt/login?email=nikita.skrobov.dev%40gmail.com&amp;firstname=Nikita&amp;lastname=Skrobov&amp;website=http%3A%2F%2Freikiadaliu.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/admin660go1drk/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Prijunkite savo parduotuvę prie PrestaShop prekyvietės tam, kad galėtumėte automatiškai importuoti visus pirkimus iš Addons.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Neturite paskyros?</h4>
\t\t\t\t\t\t<p class='text-justify'>Atraskite PrestaShop Addons jėgą! Naršykite PrestaShop oficialioje prekyvietėje ir rinkitės tarp 3500 skirtingų modulių. Išsirinkite parduotuvės temą, pagerinkite konversijos santykį, padidinkite srautus, suteikite vartotojams lojalumo apdovanojimus ir pagerinkite produktyvumą</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Prisijungti prie PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/lt/forgot-your-password\">Aš pamiršau savo slaptažodį</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/lt/login?email=nikita.skrobov.dev%40gmail.com&amp;firstname=Nikita&amp;lastname=Skrobov&amp;website=http%3A%2F%2Freikiadaliu.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tSukurti paskyrą
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Prisijungti
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
";
        // line 1751
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 121
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 1640
    public function block_content_header($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_header"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 1641
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 1642
    public function block_content_footer($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_footer"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 1643
    public function block_sidebar_right($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_right"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_right"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 1751
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "extra_javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "translate_javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "translate_javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "__string_template__038be86338f5f7f2a6371e6e03d6fca1dd7c370ab8ccc5254eff9151efad8cdb";
    }

    public function getDebugInfo()
    {
        return array (  1925 => 1751,  1908 => 1643,  1891 => 1642,  1874 => 1641,  1857 => 1640,  1824 => 121,  1810 => 1751,  1701 => 1644,  1698 => 1643,  1695 => 1642,  1692 => 1641,  1690 => 1640,  167 => 121,  45 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"lt\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Našumas • RM automotive</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminPerformance';
    var iso_user = 'lt';
    var lang_is_rtl = '0';
    var full_language_code = 'lt-lt';
    var full_cldr_language_code = 'lt-LT';
    var country_iso_code = 'LT';
    var _PS_VERSION_ = '1.7.6.7';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Parduotuvėje atliktas naujas užsakymas.';
    var order_number_msg = 'Užsakymo numeris: ';
    var total_msg = 'Viso: ';
    var from_msg = 'Nuo: ';
    var see_order_msg = 'Peržiūrėti šį užsakymą';
    var new_customer_msg = 'Parduotuvėje užsiregistravo naujas pirkėjas.';
    var customer_name_msg = 'Kliento vardas: ';
    var new_msg = 'Gauta nauja žinutė jūsų parduotuvėje.';
    var see_msg = 'Skaityti šią žinutę';
    var token = 'a33254988ae8ef1cee3225b412b235f3';
    var token_admin_orders = '15a98cf31ed2e13f2df6fe4e64306dcb';
    var token_admin_customers = '60c215b884473de8716a7cfaf67b76a8';
    var token_admin_customer_threads = '4348e6f93cfe49be6b6fedd074118ac0';
    var currentIndex = 'index.php?controller=AdminPerformance';
    var employee_token = '6a666c04efa3f04f7beb29c2776013d0';
    var choose_language_translate = 'Pasirinkite kalbą';
    var default_language = '1';
    var admin_modules_link = '/admin660go1drk/index.php/improve/modules/catalog/recommended?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var admin_notification_get_link = '/admin660go1drk/index.php/common/notifications?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var admin_notification_push_link = '/admin660go1drk/index.php/common/notifications/ack?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o';
    var tab_modules_list = 'oneandonehosting,jmango360_api';
    var update_success_msg = 'Atnaujinta';
    var errorLogin = 'PrestaShop nepavyko prisijungti prie Addons. Patikrinkite savo prisijungimo duomenis ir interneto ryšį.';
    var search_product_msg = 'Ieškoti prekės';
  </script>

      <link href=\"/modules/appagebuilder/views/css/admin/style.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin660go1drk/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/leoblog/views/css/admin/blogmenu.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_superspeed/views/css/all_admin.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_superspeed/views/css/font-awesome.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ipmanager/views/css/back.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin660go1drk/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/leofeature/views/css/back.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ps_mbo/views/css/recommended-modules.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var appagebuilder_listshortcode_url = \"https:\\/\\/reikiadaliu.eu\\/admin660go1drk\\/index.php?controller=AdminApPageBuilderShortcode&token=4d60d6f7897867d22d12dad80f37c906&get_listshortcode=1\";
var appagebuilder_module_dir = \"\\/modules\\/appagebuilder\\/\";
var baseAdminDir = \"\\/admin660go1drk\\/\";
var baseDir = \"\\/\";
var changeFormLanguageUrl = \"\\/admin660go1drk\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euras\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var leofeature_module_dir = \"\\/modules\\/leofeature\\/\";
var number_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>
<script type=\"text/javascript\" src=\"/modules/appagebuilder/views/js/admin/function.js\"></script>
<script type=\"text/javascript\" src=\"/modules/makecommerce/views/js/makecommerce.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ipmanager/views/js/back.js\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.6.7\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.6.7\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/modules/leofeature/views/js/back.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_mbo/views/js/recommended-modules.js?v=2.0.1\"></script>
<script type=\"text/javascript\" src=\"/admin660go1drk/themes/default/js/bundle/module/module_card.js?v=1.7.6.7\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/admin660go1drk/index.php/common/notifications?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script>
            var admin_gamification_ajax_url = \"https:\\/\\/reikiadaliu.eu\\/admin660go1drk\\/index.php?controller=AdminGamification&token=771ea34e44528d92eca8e333db5e91fb\";
            var current_id_tab = 105;
        </script><script type=\"text/javascript\">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = 'Duplicated URLs';
    FSAU.menu_button_url = 'https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminModules&amp;token=2825389870d52d28127a9a8f5c46e819&amp;configure=fsadvancedurl&amp;tab_section=fsau_duplicate_tab';
    FSAU.params_hash = '321aae987dbcdf3175221ab6d7c32d5ec594a73b';
</script>
<script type=\"text/javascript\" src=\"/modules/fsadvancedurl/views/js/admin.js\"></script>

{% block stylesheets %}{% endblock %}{% block extra_stylesheets %}{% endblock %}</head>

<body class=\"lang-lt adminperformance\">

  <header id=\"header\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\"></a>
      <span id=\"shop_version\">1.7.6.7</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Greita prieiga
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/improve/modules/manage?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Įdiegti moduliai\"
      >Įdiegti moduliai</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=10222b8be91522607ab7d22e09b36901\"
                 data-item=\"Katalogo vertinimas\"
      >Katalogo vertinimas</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/sell/catalog/categories/new?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Nauja kategorija\"
      >Nauja kategorija</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php/sell/catalog/products/new?token=b8b4387ddfb4dcd49cdca83ad7b4bb45\"
                 data-item=\"Nauja prekė\"
      >Nauja prekė</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=47c7378c14d967da83e1127d79163f0e\"
                 data-item=\"Naujas kuponas\"
      >Naujas kuponas</a>
          <a class=\"dropdown-item\"
         href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\"
                 data-item=\"Užsakymai\"
      >Užsakymai</a>
        <div class=\"dropdown-divider\"></div>
          <a
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"67\"
        data-icon=\"icon-AdminAdvancedParameters\"
        data-method=\"add\"
        data-url=\"index.php/configure/advanced/performance/?-2tKU05COnHfXuU59o\"
        data-post-link=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminQuickAccesses&token=d5b3fd4e1f8ea50a64c84118690d33f7\"
        data-prompt-text=\"Įveskite pavadinimą šiai santrumpai:\"
        data-link=\"Na&scaron;umas - Sąra&scaron;as\"
      >
        <i class=\"material-icons\">add_circle</i>
        Pridėti puslapį į greitą prieigą
      </a>
        <a class=\"dropdown-item\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminQuickAccesses&token=d5b3fd4e1f8ea50a64c84118690d33f7\">
      <i class=\"material-icons\">settings</i>
      Tvarkyti greitą prieigą
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/admin660go1drk/index.php?controller=AdminSearch&amp;token=a158486e08a86a9ccd4825be889c6531\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Paieška (pvz.: prekės kodas, kliento vardas...)\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Visur
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Visur\" href=\"#\" data-value=\"0\" data-placeholder=\"Ko jūs ieškote?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Visur</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Katalogas\" href=\"#\" data-value=\"1\" data-placeholder=\"Prekės pavadinimas, SKU, kodas...\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Katalogas</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal vardą\" href=\"#\" data-value=\"2\" data-placeholder=\"El. paštas, vardas...\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Klientai pagal vardą</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal IP adresą\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.80\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Klientai pagal IP adresą</a>
        <a class=\"dropdown-item\" data-item=\"Užsakymai\" href=\"#\" data-value=\"3\" data-placeholder=\"Užsakymo ID\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Užsakymai</a>
        <a class=\"dropdown-item\" data-item=\"Sąskaitos\" href=\"#\" data-value=\"4\" data-placeholder=\"Sąskaitos numeris\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Sąskaitos</a>
        <a class=\"dropdown-item\" data-item=\"Krepšeliai\" href=\"#\" data-value=\"5\" data-placeholder=\"Krepšelio ID\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Krepšeliai</a>
        <a class=\"dropdown-item\" data-item=\"Moduliai\" href=\"#\" data-value=\"7\" data-placeholder=\"Modulio pavadinimas\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Moduliai</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">PAIEŠKA</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

              <div class=\"component hide-mobile-sm\" id=\"header-debug-mode-container\">
          <a class=\"link shop-state\"
             id=\"debug-mode\"
             data-toggle=\"pstooltip\"
             data-placement=\"bottom\"
             data-html=\"true\"
             title=\"<p class='text-left'><strong>Jūsų parduotuvė yra priežiūros režime.</strong></p><p class='text-left'>Visos PHP klaidos ir pranešimai yra atvaizduojami. Jeigu jums to daugiau nereikia, <strong>išjunkite</strong> šį režimą.</p>\"
             href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
          >
            <i class=\"material-icons\">bug_report</i>
            <span>Klaidų taisymo režimas</span>
          </a>
        </div>
      
              <div class=\"component hide-mobile-sm\" id=\"header-maintenance-mode-container\">
          <a class=\"link shop-state\"
             id=\"maintenance-mode\"
             data-toggle=\"pstooltip\"
             data-placement=\"bottom\"
             data-html=\"true\"
             title=\"<p class='text-left'><strong>Jūsų parduotuvė veikia priežiūros rėžimu.</strong></p><p class='text-left'>Jūsų lankytojai ir klientai negalės prisijungti prie jūsų parduotuvės, nes ji veikia priežiūros rėžimu. &lt;br /&gt; Norėdami valdyti priežiūros rėžimo nustatymus, eikite Pardutuvės nustatymai &amp;gt; Priežiūra.</p>\" href=\"/admin660go1drk/index.php/configure/shop/maintenance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
          >
            <i class=\"material-icons\">build</i>
            <span>Profilaktikos režimas</span>
          </a>
        </div>
      
      <div class=\"component\" id=\"header-shop-list-container\">
          <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://reikiadaliu.eu/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      Peržiūrėti parduotuvę
    </a>
  </div>
      </div>

              <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Užsakymai<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Klientai<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Pranešimas<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų užsakymų nėra :(<br>
              Ar neseniai tikrinote savo valiutų konvertavimo kursą?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų klientų nėra :(<br>
              Ar šiomis dienomis aktyviai dalyvaujate socialiniuose tinkluose?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų žinučių nėra.<br>
              Yra daugiau laiko kažkam kita!
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      nuo <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - registruotas <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      
      <span class=\"employee_avatar\"><img class=\"avatar rounded-circle\" src=\"https://profile.prestashop.com/nikita.skrobov.dev%40gmail.com.jpg\" /></span>
      <span class=\"employee_profile\">Sveiki sugrįžę Nikita</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/admin660go1drk/index.php/configure/advanced/employees/2/edit?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\">
      <i class=\"material-icons\">settings</i>
      Jūsų profilis
    </a>
    </div>
    
    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/resources/documentations?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=resources-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">book</i> Ištekliai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">school</i> Mokymai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/experts?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=expert-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">person_pin_circle</i> Rasti ekspertą</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">extension</i> PrestaShop prekyvietė</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">help</i> Pagalbos centras</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLogin&amp;logout=1&amp;token=ceaeaef9ffcd65e5ae6bb74a3a1b2cdb\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Atsijungti</span>
    </a>
  </div>
</div>
      </div>
    </nav>

      </header>

  <nav class=\"nav-bar d-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/admin660go1drk/index.php/configure/advanced/employees/toggle-navigation?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\" id=\"tab-AdminDashboard\">
            <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Skydelis</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"2\" id=\"tab-SELL\">
              <span class=\"title\">Pardavimai</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\" class=\"link\">
                    <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                    <span>
                    Užsakymai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrders&amp;token=15a98cf31ed2e13f2df6fe4e64306dcb\" class=\"link\"> Užsakymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                              <a href=\"/admin660go1drk/index.php/sell/orders/invoices/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Sąskaitos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSlip&amp;token=1bb796a14930fb8fffaf930d443a6717\" class=\"link\"> Grąžinimo kuponai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                              <a href=\"/admin660go1drk/index.php/sell/orders/delivery-slips/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pristatymo kvitai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarts&amp;token=c3e62be2249517a4f45744a6bb0c96c8\" class=\"link\"> Prekių krepšeliai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                  <a href=\"/admin660go1drk/index.php/sell/catalog/products?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-store\">store</i>
                    <span>
                    Katalogas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/products?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/categories?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Kategorijos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminTracking&amp;token=046eea4dc6167e39236e42e86be48bdb\" class=\"link\"> Kontrolė
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAttributesGroups&amp;token=41c4cb1348d3f983a1394df04e7f2113\" class=\"link\"> Savybės ir ypatybės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                              <a href=\"/admin660go1drk/index.php/sell/catalog/brands/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekių ženklai ir tiekėjai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAttachments&amp;token=1bf18d4c199697d8b0b3ea19bca19962\" class=\"link\"> Failai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCartRules&amp;token=47c7378c14d967da83e1127d79163f0e\" class=\"link\"> Nuolaidos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                              <a href=\"/admin660go1drk/index.php/sell/stocks/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                  <a href=\"/admin660go1drk/index.php/sell/customers/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-account_circle\">account_circle</i>
                    <span>
                    Klientai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                              <a href=\"/admin660go1drk/index.php/sell/customers/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Klientai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAddresses&amp;token=541f0b7e3f304304b06eb5f7a66afa56\" class=\"link\"> Adresai
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCustomerThreads&amp;token=4348e6f93cfe49be6b6fedd074118ac0\" class=\"link\">
                    <i class=\"material-icons mi-chat\">chat</i>
                    <span>
                    Klientų aptarnavimas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCustomerThreads&amp;token=4348e6f93cfe49be6b6fedd074118ac0\" class=\"link\"> Klientų aptarnavimas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminOrderMessage&amp;token=09e3ffc55381e5d542d1eaa65f845fdd\" class=\"link\"> Užsakymo pranešimai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminReturn&amp;token=c34804c7a8ad0d900b89443c861b0ba5\" class=\"link\"> Prekių grąžinimai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminStats&amp;token=10222b8be91522607ab7d22e09b36901\" class=\"link\">
                    <i class=\"material-icons mi-assessment\">assessment</i>
                    <span>
                    Statistika
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"180\" id=\"subtab-AdminkbsupercheckoutConfigure\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSetting&amp;token=6658b4643c6bd60508a104f76071c561\" class=\"link\">
                    <i class=\"material-icons mi-\"></i>
                    <span>
                    Knowband Supercheckout
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-180\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"181\" id=\"subtab-AdminSuperSetting\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSetting&amp;token=6658b4643c6bd60508a104f76071c561\" class=\"link\"> General Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"182\" id=\"subtab-AdminAbandonedCheckout\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminAbandonedCheckout&amp;token=188e9c1efc9aec43a7d72b176f28c56e\" class=\"link\"> Abandoned Checkout Statistics
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"183\" id=\"subtab-AdminCheckoutBehavior\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCheckoutBehavior&amp;token=aeb103fdc4d10770d386b76d6c8e2b9f\" class=\"link\"> Checkout behaviour Report
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"42\" id=\"tab-IMPROVE\">
              <span class=\"title\">Pritaikymai</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                  <a href=\"/admin660go1drk/index.php/improve/modules/manage?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Moduliai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                              <a href=\"/admin660go1drk/index.php/improve/modules/manage?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Module Manager
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                              <a href=\"/admin660go1drk/index.php/modules/addons/modules/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Modulių Katalogas
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"157\" id=\"subtab-AdminLeoBootstrapMenuModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoBootstrapMenuModule&amp;token=54fe8c035712615fbb0887610168cd84\" class=\"link\"> Leo Megamenu Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"160\" id=\"subtab-AdminLeoSlideshowMenuModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoSlideshowMenuModule&amp;token=31607bb1b50b19872580a85e91f72e6a\" class=\"link\"> Leo Slideshow Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"164\" id=\"subtab-AdminLeoQuickLoginModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoQuickLoginModule&amp;token=c6bcbfe8a3204862c6265c27f84fd729\" class=\"link\"> Leo Quick Login Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"165\" id=\"subtab-AdminLeoProductSearchModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoProductSearchModule&amp;token=c87d719321d4b6b4a969209bd33fd42e\" class=\"link\"> Leo Product Search Configuration
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                  <a href=\"/admin660go1drk/index.php/improve/design/themes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                    <span>
                    Išvaizda
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"126\" id=\"subtab-AdminThemesParent\">
                              <a href=\"/admin660go1drk/index.php/improve/design/themes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Tema ir logotipas
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"136\" id=\"subtab-AdminPsMboTheme\">
                              <a href=\"/admin660go1drk/index.php/modules/addons/themes/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Temos katalogas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\" id=\"subtab-AdminParentMailTheme\">
                              <a href=\"/admin660go1drk/index.php/improve/design/mail_theme/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> El. laiškų tema
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                              <a href=\"/admin660go1drk/index.php/improve/design/cms-pages/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Puslapiai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                              <a href=\"/admin660go1drk/index.php/improve/design/modules/positions/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pozicijos
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"59\" id=\"subtab-AdminImages\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminImages&amp;token=7c58873295312b2ec8e090d798f4ab9d\" class=\"link\"> Paveiksliukų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\" id=\"subtab-AdminLinkWidget\">
                              <a href=\"/admin660go1drk/index.php/modules/link-widget/list?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarriers&amp;token=0aeb5f991554d207feae001ca9218a01\" class=\"link\">
                    <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                    <span>
                    Pristatymas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCarriers&amp;token=0aeb5f991554d207feae001ca9218a01\" class=\"link\"> Kurjeriai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                              <a href=\"/admin660go1drk/index.php/improve/shipping/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"168\" id=\"subtab-AdminVenipak\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminVenipak&amp;token=840b73d3aea183be468b2243eb4d6d2c\" class=\"link\"> Venipak
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                  <a href=\"/admin660go1drk/index.php/improve/payment/payment_methods?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-payment\">payment</i>
                    <span>
                    Mokėjimas
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                              <a href=\"/admin660go1drk/index.php/improve/payment/payment_methods?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Mokėjimo būdai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\" id=\"subtab-AdminPaymentPreferences\">
                              <a href=\"/admin660go1drk/index.php/improve/payment/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"167\" id=\"subtab-AdminPayseraConfiguration\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminPayseraConfiguration&amp;token=341ef3b55bd63439dcf9b2934012fc7f\" class=\"link\"> Paysera apmokėjimas
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                  <a href=\"/admin660go1drk/index.php/improve/international/localization/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-language\">language</i>
                    <span>
                    Tarptautinis
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                              <a href=\"/admin660go1drk/index.php/improve/international/localization/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Lokalizacija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminZones&amp;token=5323da5eef2b94abce6f0149841ff77c\" class=\"link\"> Vietovės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                              <a href=\"/admin660go1drk/index.php/improve/international/taxes/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Mokesčiai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                              <a href=\"/admin660go1drk/index.php/improve/international/translations/settings?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Vertimai
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"138\" id=\"subtab-AdminApPageBuilder\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProfiles&amp;token=33bec92aeb2c9d5c0ab750d5df2e529f\" class=\"link\">
                    <i class=\"material-icons mi-tab\">tab</i>
                    <span>
                    Ap PageBuilder
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-138\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"139\" id=\"subtab-AdminApPageBuilderProfiles\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProfiles&amp;token=33bec92aeb2c9d5c0ab750d5df2e529f\" class=\"link\"> Ap Profiles Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"140\" id=\"subtab-AdminApPageBuilderPositions\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderPositions&amp;token=50383684e9d230e56ebc08068b9736c1\" class=\"link\"> Ap Positions Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"141\" id=\"subtab-AdminApPageBuilderShortcode\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderShortcode&amp;token=4d60d6f7897867d22d12dad80f37c906\" class=\"link\"> Ap ShortCode Manage
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"143\" id=\"subtab-AdminApPageBuilderProducts\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderProducts&amp;token=2b047dda4d8708ed53eaaf0066301f13\" class=\"link\"> Ap Products List Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"144\" id=\"subtab-AdminApPageBuilderDetails\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderDetails&amp;token=1aa61fa113df46eb3bba1bbc53fb11b0\" class=\"link\"> Ap Products Details Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"146\" id=\"subtab-AdminApPageBuilderThemeEditor\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderThemeEditor&amp;token=d77c1db8955c7843f7e18805f8bd3b1d\" class=\"link\"> Ap Live Theme Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"147\" id=\"subtab-AdminApPageBuilderModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderModule&amp;token=6d03e99a7e8fb8f124b21a1491426758\" class=\"link\"> Ap Module Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"148\" id=\"subtab-AdminApPageBuilderThemeConfiguration\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderThemeConfiguration&amp;token=63d8da8740b52de8dcc222d66ccdda52\" class=\"link\"> Ap Theme Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"166\" id=\"subtab-AdminApPageBuilderHook\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminApPageBuilderHook&amp;token=448f12cb00b6a31e565eb24ae086c926\" class=\"link\"> Ap Hook Control Panel
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"151\" id=\"subtab-AdminLeoblogManagement\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogDashboard&amp;token=7a682567c1880a53876876b07702e892\" class=\"link\">
                    <i class=\"material-icons mi-create\">create</i>
                    <span>
                    Leo Blog Management
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-151\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"152\" id=\"subtab-AdminLeoblogDashboard\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogDashboard&amp;token=7a682567c1880a53876876b07702e892\" class=\"link\"> Blog Dashboard
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"153\" id=\"subtab-AdminLeoblogCategories\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogCategories&amp;token=0a10c348ac147a20265da3f71f54d814\" class=\"link\"> Categories Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"154\" id=\"subtab-AdminLeoblogBlogs\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogBlogs&amp;token=3cd1bed1d1b16c6c204fbf6ebb1e5f39\" class=\"link\"> Blogs Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"155\" id=\"subtab-AdminLeoblogComments\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogComments&amp;token=9f5d02504fd2e0573d55767ec04c6290\" class=\"link\"> Comment Management
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"156\" id=\"subtab-AdminLeoblogModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeoblogModule&amp;token=c18e239d6df092264fff6b2ca6db83b6\" class=\"link\"> Leo Blog Configuration
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"161\" id=\"subtab-AdminLeofeatureManagement\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureModule&amp;token=106aba62dde8e30a68b19eeee10d3ea8\" class=\"link\">
                    <i class=\"material-icons mi-star\">star</i>
                    <span>
                    Leo Feature Management
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-161\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"162\" id=\"subtab-AdminLeofeatureModule\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureModule&amp;token=106aba62dde8e30a68b19eeee10d3ea8\" class=\"link\"> Leo Feature Configuration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"163\" id=\"subtab-AdminLeofeatureReviews\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminLeofeatureReviews&amp;token=5005e321b9fa66c5865b2b77c6bd1635\" class=\"link\"> Product Review Management
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title -active\" data-submenu=\"80\" id=\"tab-CONFIGURE\">
              <span class=\"title\">Konfigūruoti</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                  <a href=\"/admin660go1drk/index.php/configure/shop/preferences/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-settings\">settings</i>
                    <span>
                    Parduotuvės nustatymai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/preferences/preferences?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Pagrindiniai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/order-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Užsakymų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/product-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Prekės
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/customer-preferences/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Klientų nustatymai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/contacts/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Kontaktai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                              <a href=\"/admin660go1drk/index.php/configure/shop/seo-urls/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Duomenų srautas ir SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSearchConf&amp;token=0d4f3ddbfc6ab8c1b55077567032fa89\" class=\"link\"> Paieška
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\" id=\"subtab-AdminGamification\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminGamification&amp;token=771ea34e44528d92eca8e333db5e91fb\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                                
                                                    
                <li class=\"link-levelone has_submenu -active open ul-open\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                  <a href=\"/admin660go1drk/index.php/configure/advanced/system-information/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\">
                    <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                    <span>
                    Išplėstiniai parametrai
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_up
                                                        </i>
                                        </a>
                                          <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/system-information/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Informacija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Našumas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/administration/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Administracija
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/emails/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> El. paštas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"108\" id=\"subtab-AdminImport\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/import/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Importuoti
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/employees/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Darbuotojai
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/sql-requests/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Duomenų bazė
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/logs/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Įvykių žurnalas
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                              <a href=\"/admin660go1drk/index.php/configure/advanced/webservice-keys/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" class=\"link\"> Webservice&#039;as
                              </a>
                            </li>

                                                                                                                                                                                
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"195\" id=\"subtab-AdminCdcGoogletagmanagerOrders\">
                              <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminCdcGoogletagmanagerOrders&amp;token=47f102c054967af6ad682cfaca32b1fc\" class=\"link\"> GTM Orders
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"186\" id=\"tab-AdminSuperSpeed\">
              <span class=\"title\">Speed Optimization</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"187\" id=\"subtab-AdminSuperSpeedStatistics\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedStatistics&amp;token=8f457fe60e90e5b39668434ac7e41202\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-dashboard\">icon icon-dashboard</i>
                    <span>
                    Skydelis
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"188\" id=\"subtab-AdminSuperSpeedPageCaches\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedPageCaches&amp;token=b3e6ef4215ee50dfe1c6ce2284be7bd0\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-pagecache\">icon icon-pagecache</i>
                    <span>
                    Page cache
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"189\" id=\"subtab-AdminSuperSpeedImage\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedImage&amp;token=48e5f7174bec0e8d5c297119c5abbed2\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedimage\">icon icon-speedimage</i>
                    <span>
                    Image optimization
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"190\" id=\"subtab-AdminSuperSpeedMinization\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedMinization&amp;token=85bbaa5239cd56d59df53b88d1455f76\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedminization\">icon icon-speedminization</i>
                    <span>
                    Server cache and minification
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"191\" id=\"subtab-AdminSuperSpeedGzip\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedGzip&amp;token=d202efa303cd17a7c039af77598576cb\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speedgzip\">icon icon-speedgzip</i>
                    <span>
                    Browser cache and Gzip
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"192\" id=\"subtab-AdminSuperSpeedDatabase\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedDatabase&amp;token=2b216c8922696e31597c827f159569f1\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-speeddatabase\">icon icon-speeddatabase</i>
                    <span>
                    Database optimization
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"193\" id=\"subtab-AdminSuperSpeedSystemAnalytics\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedSystemAnalytics&amp;token=0a99d896372a68135d4b431475c62f35\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-analytics\">icon icon-analytics</i>
                    <span>
                    System Analytics
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"194\" id=\"subtab-AdminSuperSpeedHelps\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminSuperSpeedHelps&amp;token=ca707c430e22818631fceed01b7c7494\" class=\"link\">
                    <i class=\"material-icons mi-icon icon-help\">icon icon-help</i>
                    <span>
                    Pagalba
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title \" data-submenu=\"196\" id=\"tab-AdminIpManager\">
              <span class=\"title\">IP Manager</span>
          </li>

                          
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"197\" id=\"subtab-AdminIpManagerSettings\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerSettings&amp;token=e33ae175880e2753f7715192d7be2c5f\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    General Settings
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"198\" id=\"subtab-AdminIpManagerBlockedIps\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedIps&amp;token=fe1cdd5b2db87c5f958b40bf074ef5c5\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked IPs
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"199\" id=\"subtab-AdminIpManagerBlockedCountry\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedCountry&amp;token=64c1bb7037d07a16949116b07b8bc68f\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked Countries
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"200\" id=\"subtab-AdminIpManagerBlockedAgent\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerBlockedAgent&amp;token=0857687ba5ac3c8a4b994fe0989f8df9\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Blocked Bots
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                                        
                
                                                
                
                <li class=\"link-levelone\" data-submenu=\"201\" id=\"subtab-AdminIpManagerAntiDdosAttack\">
                  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminIpManagerAntiDdosAttack&amp;token=b23ac59eff425b045a350b5553a99ab8\" class=\"link\">
                    <i class=\"material-icons mi-extension\">extension</i>
                    <span>
                    Anti DDoS Attack
                    </span>
                                                <i class=\"material-icons sub-tabs-arrow\">
                                                                keyboard_arrow_down
                                                        </i>
                                        </a>
                                    </li>
                          
        
            </ul>
  
</nav>

<div id=\"main-div\">
          
<div class=\"header-toolbar\">
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Išplėstiniai parametrai</li>
          
                      <li class=\"breadcrumb-item active\">
              <a href=\"/admin660go1drk/index.php/configure/advanced/performance/?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\" aria-current=\"page\">Našumas</a>
            </li>
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Našumas          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                                                    <a
                  class=\"btn btn-primary  pointer\"                  id=\"page-header-desc-configuration-clear_cache\"
                  href=\"/admin660go1drk/index.php/configure/advanced/performance/clear-cache?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"                  title=\"Valyti kešą\"                >
                  <i class=\"material-icons\">delete</i>                  Valyti kešą
                </a>
                                                                  <a
                class=\"btn btn-outline-secondary \"
                id=\"page-header-desc-configuration-modules-list\"
                href=\"/admin660go1drk/index.php/improve/modules/catalog?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"                title=\"Rekomenduojami moduliai\"
                              >
                Rekomenduojami moduliai
              </a>
            
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Pagalba\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/admin660go1drk/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Flt%252Fdoc%252FAdminPerformance%253Fversion%253D1.7.6.7%2526country%253Dlt/Pagalba?_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o\"
                   id=\"product_form_open_help\"
                >
                  Pagalba
                </a>
                                    </div>
        </div>
      
    </div>
  </div>

  
    <!-- begin /var/www/reikiadaliu.eu/public_html/modules/ps_mbo/views/templates/hook/recommended-modules.tpl -->
<script>
  if (undefined !== mbo) {
    mbo.initialize({
      translations: {
        'Recommended Modules and Services': 'Rekomenduojami moduliai ir paslaugos',
        'Close': 'Uždaryti',
      },
      recommendedModulesUrl: '/admin660go1drk/index.php/modules/addons/modules/recommended?tabClassName=AdminPerformance&_token=6UhA4YLyr5Lxlqrq229xWgZLE-2tKU05COnHfXuU59o',
      shouldAttachRecommendedModulesAfterContent: 0,
      shouldAttachRecommendedModulesButton: 1,
      shouldUseLegacyTheme: 0,
    });
  }
</script>
<!-- end /var/www/reikiadaliu.eu/public_html/modules/ps_mbo/views/templates/hook/recommended-modules.tpl -->
</div>
      
      <div class=\"content-div  \">

        

                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  {% block content_header %}{% endblock %}
                 {% block content %}{% endblock %}
                 {% block content_footer %}{% endblock %}
                 {% block sidebar_right %}{% endblock %}

            
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>O ne!</h1>
  <p class=\"mt-3\">
    Šio puslapio mobili versija šiuo metu negalima.
  </p>
  <p class=\"mt-2\">
    Norėdami matyti šį puslapį naudokite kompiuterį tol, kol jis bus pritaikytas mobiliems įrenginiams.
  </p>
  <p class=\"mt-2\">
    Ačiū.
  </p>
  <a href=\"https://reikiadaliu.eu/admin660go1drk/index.php?controller=AdminDashboard&amp;token=53e811b03de7dec2790bc6bb2830969f\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Atgal
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-LT&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/lt/login?email=nikita.skrobov.dev%40gmail.com&amp;firstname=Nikita&amp;lastname=Skrobov&amp;website=http%3A%2F%2Freikiadaliu.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/admin660go1drk/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Prijunkite savo parduotuvę prie PrestaShop prekyvietės tam, kad galėtumėte automatiškai importuoti visus pirkimus iš Addons.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Neturite paskyros?</h4>
\t\t\t\t\t\t<p class='text-justify'>Atraskite PrestaShop Addons jėgą! Naršykite PrestaShop oficialioje prekyvietėje ir rinkitės tarp 3500 skirtingų modulių. Išsirinkite parduotuvės temą, pagerinkite konversijos santykį, padidinkite srautus, suteikite vartotojams lojalumo apdovanojimus ir pagerinkite produktyvumą</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Prisijungti prie PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/lt/forgot-your-password\">Aš pamiršau savo slaptažodį</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/lt/login?email=nikita.skrobov.dev%40gmail.com&amp;firstname=Nikita&amp;lastname=Skrobov&amp;website=http%3A%2F%2Freikiadaliu.eu%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tSukurti paskyrą
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Prisijungti
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
{% block javascripts %}{% endblock %}{% block extra_javascripts %}{% endblock %}{% block translate_javascripts %}{% endblock %}</body>
</html>", "__string_template__038be86338f5f7f2a6371e6e03d6fca1dd7c370ab8ccc5254eff9151efad8cdb", "");
    }
}
