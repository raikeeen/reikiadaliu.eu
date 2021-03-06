<?php
/* Smarty version 3.1.33, created on 2021-02-26 09:40:02
  from '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/templates/promo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6038a5d2af8064_76393063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3c076bd7c52c92b6a455d3c504e5d1cdbc5ac4c' => 
    array (
      0 => '/var/www/reikiadaliu.eu/public_html/themes/at_kinzy/templates/promo.tpl',
      1 => 1613137628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6038a5d2af8064_76393063 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['cart']->value['totals']['total_including_tax']['value'] > 150) {?>
    <style>
        .note {
            margin: 0;
            font-size: 18px;
            line-height: 28px;
            font-weight: 700;
            padding: 12px;
            border: 2px dashed #363d4d;
            color: #363d4d;
            text-align: center;
        }

        .description-promo {
            font-size: 18px;
            line-height: 28px;
            margin-bottom: 24px;
            white-space: normal;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: normal;
            line-height: 1.5;
        }

        .title-promo {
            font-size: 28px;
            line-height: 36px;
            font-weight: 900;
            font-size: 24px;
            line-height: 1.3333;
            margin-bottom: 24px;
        }

        .content-promo {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .body-promo {
            font-family: 'Sora', sans-serif;
            font-size: 18px;
            line-height: 28px;
        }

        .container-promo {
            position: fixed;
            overflow: visible;
            border-radius: 8px;
            padding-top: 48px;
            padding-right: 80px;
            padding-bottom: 48px;
            padding-left: 48px;
            background-image: none;
            background-repeat: no-repeat;
            background-size: initial;
            background-position: initial;
            background-color: rgba(255, 255, 255, 1);
            color: rgba(54, 61, 77, 1);
            box-shadow: 0 10px 24px 0 rgb(54 61 77 / 15%);
            border-radius: 0;
            bottom: 35px;
            top: auto;
            width: 25%;
            left: 35px;
            z-index: 999;
        }

        .page-1 {
            left: 32px;
            right: auto;
            bottom: 32px;
            margin: 0;
        }

        .close {
            color: inherit;
            top: 0;
            right: 0;
            padding: 16px;
            position: absolute;
            z-index: 1;
        }
        @media screen and (min-width: 1300px) {
            .body-promo {
                font-size: 18px;
                line-height: 28px;
            }
            .container-promo {
                padding-top: 48px;
                padding-right: 80px;
                padding-bottom: 48px;
                padding-left: 48px;
                width: 25%;

            }
            .title-promo {
                font-size: 24px;
                margin-bottom: 24px;
            }
            .description-promo{
                margin-bottom: 24px;
            }
        }
        @media screen and (max-width: 700px) {
            .container-promo{
                width: 60%;
                padding-top: 40px;
                padding-right: 35px;
                padding-bottom: 40px;
                padding-left: 35px;
            }
            .title-promo{
                font-size: 17px;
                margin-bottom: 0px;
            }
            .description-promo{
                margin-bottom: 0px;
            }
            .body-promo{
                font-size: 14px;
                line-height: 18px;
            }
        }
        @media screen and (min-width: 700px) and (max-width: 1100px)  {
            .container-promo{
                width: 30%;
                padding-top: 40px;
                padding-right: 35px;
                padding-bottom: 40px;
                padding-left: 35px;
            }
            .title-promo{
                font-size: 20px;
                margin-bottom: 0px;
            }
            .description-promo{
                margin-bottom: 0px;
            }
            .body-promo{
                font-size: 16px;
                line-height: 22px;
            }
        }
        @media screen and (min-width: 1100px) and (max-width: 1300px) {
            .container-promo{
                width: 40%;
                padding-top: 40px;
                padding-right: 35px;
                padding-bottom: 40px;
                padding-left: 35px;
            }
            .title-promo{
                font-size: 20px;
                margin-bottom: 0px;
            }
            .description-promo{
                margin-bottom: 0px;
            }
            .body-promo{
                font-size: 16px;
                line-height: 22px;
            }
        }
    </style>
    <div class="row" id="promo" style="display: block">
        <div class="col-2">
            <div id="root">
                <div role="dialog" id="wpreview" class="page-1 page-last" expanded="true" style="">
                    <div class="container-promo">
                        <div class="body-promo">
                            <div class="content-promo no-fields"><h1 class="title-promo">SVEIKINAME!</h1>
                                <p class="description-promo">
                                <div>ŠIAM UŽSAKYMUI DOVANOJAME JUMS 5% NUOLAIDĄ SU KODU</div>
                                </p>
                                <form novalidate="" class="form valid pristine"></form>
                                <p class="note">
                                    <span>YSCDH7KQ</span>
                                </p></div>
                        </div>
                        <button type="button" id="hider" class="close" style="padding: 5px 10px;">x</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        document.getElementById('hider').onclick = function() {
            document.getElementById('promo').hidden = true;
        }
    <?php echo '</script'; ?>
>
<?php }
}
}
