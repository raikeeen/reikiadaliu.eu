{**
 *  PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright  PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{foreach $stylesheets.external as $stylesheet}
  <link rel="stylesheet" href="{$stylesheet.uri}" type="text/css" media="{$stylesheet.media}">
{/foreach}
<style>:root{-webkit-text-size-adjust:100%}#root #wpreview{-webkit-text-size-adjust:100%;z-index:2147483635;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:16px}#root #wpreview{position:fixed;width:400px;max-width:none;min-height:0;left:0;right:0;bottom:10px;margin:0 auto}@media screen and (min-width: 960px){#root #wpreview{width:400px;max-width:none;left:32px;right:auto;bottom:32px;margin:0}}#root #wpreview .container{position:relative;overflow:visible;border-radius:8px;padding-top:48px;padding-right:120px;padding-bottom:48px;padding-left:48px;background-image:none;background-repeat:no-repeat;background-size:initial;background-position:initial;background-color:rgba(255,255,255,1);color:rgba(54,61,77,1)}#root #wpreview .back,
  #root #wpreview .close,
  #root #wpreview .caret{padding:16px;position:absolute;z-index:1}#root #wpreview .back{padding-right:8px;top:0;right:35px}#root #wpreview .close{top:0;right:0}#root #wpreview .back +  .close{padding-left:8px}#root #wpreview .content{position:relative;display:flex;flex-direction:column}#root #wpreview .title,
  #root #wpreview .description{margin-bottom:20px}#root #wpreview .note{margin-top:20px}
  #root #wpreview .title{white-space:normal;overflow-wrap:break-word;word-wrap:break-word;word-break:normal;color:rgba(54,61,77,1);font-weight:bold;cursor:inherit}
  #root #wpreview .title{font-size:20px;line-height:1.4}
  #root #wpreview .title a{vertical-align:baseline;text-decoration:underline}#root #wpreview .description{white-space:normal;overflow-wrap:break-word;word-wrap:break-word;word-break:normal;line-height:1.5}#root #wpreview .description a{vertical-align:baseline;text-decoration:underline}#root #wpreview .form{display:flex;flex-direction:column;flex-wrap:nowrap}#root #wpreview .buttons{display:flex;flex-direction:row;
                                                                                                                                                                                                                                                                                                                                                                          flex-wrap:wrap
                                                                                                                                                                                                                                                                                                                                                                      }#root #wpreview .buttons .button.icon{flex-shrink:0;flex-grow:0}#root #wpreview .note{white-space:normal;overflow-wrap:break-word;word-wrap:break-word;word-break:normal;font-size:14px;line-height:1.4}#root #wpreview .note a{vertical-align:baseline;text-decoration:underline}#root #wpreview .close{color:inherit}#root #wpreview .close::before{display:block;content:''}#root #wpreview .close::before{width:11px;height:11px;background-image:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="rgba(54,61,77,1)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M1.458 1.458l21.084 21.084m0-21.084L1.458 22.542" /></svg>');background-position:center;background-repeat:no-repeat;transform-origin:center center;transition:transform 300ms,opacity 200ms;opacity:0.5}#root #wpreview .close:hover::before{opacity:1;transform:rotate(90deg)}@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;700&display=swap');
    @keyframes wpreview-slide-in-bottom {
      0% {
        transform: translateY(150%);
      }
      100% {
        transform: translateY(0);
      }
    }
    @keyframes wpreview-slide-out-bottom {
      0% {
        transform: translateY(0);
      }
      100% {
        transform: translateY(150%);
      }
    }
    @keyframes wpreview-shake {
      100% {
        transform: none;
      }
      0%,
      99% {
        transform: translate(0, 0);
      }
      20% {
        transform: translateX(-10px);
      }
      60% {
        transform: translateX(-5px);
      }
      40% {
        transform: translateX(10px);
      }
      80% {
        transform: translateX(5px);
      }
    }
    @keyframes wpreview-sent-backdrop {
      0%,
      100% {
        opacity: 0;
        background-color: rgba(255, 255, 255, 0);
      }
      50%,
      75% {
        opacity: 0.6;
        background-color: #ffffff;
      }
    }
    @keyframes wpreview-success-icon-scale {
      0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }
      50% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
      75% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
      100% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.2);
      }
    }
    @keyframes wpreview-success-icon-show-path {
      0% {
        opacity: 0;
      }
      50% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }
    @keyframes wpreview-success-icon-draw-circle {
      0% {
        opacity: 1;
        stroke-dashoffset: 150.72;
      }
      25% {
        opacity: 1;
        stroke-dashoffset: 75.36;
      }
      50% {
        opacity: 1;
        stroke-dashoffset: 0;
      }
      100% {
        opacity: 0;
        stroke-dashoffset: 0;
      }
    }
    @keyframes wpreview-success-icon-draw-check {
      0% {
        opacity: 1;
        stroke-dashoffset: 36;
      }
      25% {
        opacity: 1;
        stroke-dashoffset: 18;
      }
      50% {
        opacity: 1;
        stroke-dashoffset: 0;
      }
      100% {
        opacity: 0;
        stroke-dashoffset: 0;
      }
    }
    #root #wpreview {
      left: 0 ;
      right: 0 ;
      bottom: 10px ;
      margin: 0 auto ;

    }

    @media (min-width: 960px) {
      #root #wpreview {
        left: 32px ;
        right: auto ;
        bottom: 32px ;
        margin: 0 ;

      }

    }
    #root #wpreview .buttons {
      flex-flow: column ;

    }

    #root #wpreview .container {
      font-family: Source Sans Pro, "Helvetica Neue", Helvetica, Arial, sans-serif ;
      box-shadow: 0 11px 32px -5px rgba(54, 61, 77, 0.15) ;

    }

    @media (min-width: 960px) {
      #root #wpreview .container {
        box-shadow: 0 10px 24px 0 rgba(54, 61, 77, 0.15) ;

      }

    }
    #root #wpreview .title {
      font-weight: 900 ;
      font-size: 24px ;
      line-height: 1.3333 ;
      margin-bottom: 24px ;

    }

    #root #wpreview .description {
      font-size: 16px ;
      margin-bottom: 24px ;

    }

    #root #wpreview .no-fields .form {
      margin-top: 8px ;

    }

    #root #wpreview .fields {
      margin-bottom: 32px ;

    }

    #root #wpreview .field + .field {
      margin: 24px 0 0 0 ;

    }

    #root #wpreview .field-title {
      margin: 0 0 12px 0 ;

    }

    #root #wpreview .radio .field-title, #root #wpreview .checkbox .field-title {
      margin: 0 0 16px 0 ;

    }

    #root #wpreview .buttons {
      margin: -6px ;

    }

    #root #wpreview .buttons .button {
      margin: 6px ;
      border-radius: 6px ;

    }

    #root #wpreview .button.normal, #root #wpreview .button.normal.icon {
      font-weight: normal ;
      background-color: transparent ;
      border-color: rgba(54, 61, 77, 0.1) ;

    }

    #root #wpreview .button.normal:hover, #root #wpreview .button.normal.icon:hover, #root #wpreview .button.normal:focus, #root #wpreview .button.normal.icon:focus {
      border-color: #363d4d ;

    }

    #root #wpreview .button.secondary, #root #wpreview .button.secondary.icon {
      padding-left: 0 ;
      padding-right: 0 ;
      color: rgba(54, 61, 77, 0.3) ;
      background-color: transparent ;
      font-weight: normal ;

    }

    #root #wpreview .button.secondary:hover, #root #wpreview .button.secondary.icon:hover, #root #wpreview .button.secondary:focus, #root #wpreview .button.secondary.icon:focus {
      color: rgba(54, 61, 77, 0.7) ;
      background-color: transparent ;

    }

    #root #wpreview .input-text, #root #wpreview .input-textarea, #root #wpreview .input-select {
      border: none ;
      border-bottom: solid 1px rgba(54, 61, 77, 0.1) ;
      border-radius: 0 ;
      background-color: transparent ;

    }

    #root #wpreview .input-text::placeholder, #root #wpreview .input-textarea::placeholder, #root #wpreview .input-select::placeholder {
      color: rgba(54, 61, 77, 0.3) ;

    }

    #root #wpreview .input-text:hover, #root #wpreview .input-textarea:hover, #root #wpreview .input-select:hover, #root #wpreview .input-text:focus, #root #wpreview .input-textarea:focus, #root #wpreview .input-select:focus {
      border-color: rgba(54, 61, 77, 0.7) ;

    }

    #root #wpreview .input-text {
      padding: 0 0 11px 0 ;

    }

    #root #wpreview .input-textarea {
      padding: 0 ;

    }

    #root #wpreview .input-select select {
      padding: 0 24px 11px 0 ;

    }

    #root #wpreview .input-select:after {
      top: 8px ;
      transform: none ;
      right: 0 ;

    }

    #root #wpreview .input-check label {
      margin-bottom: 20px ;
      border-radius: 4px ;

    }

    #root #wpreview .input-check label span {
      padding-left: 36px ;

    }

    #root #wpreview .input-check label span:before {
      width: 24px ;
      height: 24px ;
      top: 0 ;

    }

    #root #wpreview .input-check label input[type='radio'] + span:before, #root #wpreview .input-check label input[type='checkbox'] + span:before {
      background-color: transparent ;
      border: 1px solid rgba(54, 61, 77, 0.1) ;

    }

    #root #wpreview .input-check label input[type='radio'] + span:after, #root #wpreview .input-check label input[type='checkbox'] + span:after {
      left: 4px ;

    }

    #root #wpreview .input-check label input[type='radio']:checked + span:after, #root #wpreview .input-check label input[type='checkbox']:checked + span:after {
      left: 4px ;

    }

    #root #wpreview .input-check label:hover input[type='radio'] + span:before, #root #wpreview .input-check label:focus input[type='radio'] + span:before, #root #wpreview .input-check label:hover input[type='checkbox'] + span:before, #root #wpreview .input-check label:focus input[type='checkbox'] + span:before {
      border-color: #363d4d ;

    }

    #root #wpreview .input-rating label {
      width: 40px ;
      height: 32px ;

    }

    #root #wpreview .note {
      margin: 32px 0 0 0 ;
      color: rgba(54, 61, 77, 0.3) ;

    }

    #root #wpreview.enter {
      animation: wpreview-slide-in-bottom 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94) both ;

    }

    #root #wpreview.leave {
      animation: wpreview-slide-out-bottom 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94) both ;

    }

    #root #wpreview .form.submit .invalid {
      animation: wpreview-shake 600ms ;

    }

    #root #wpreview.form-sending .content:before {
      content: '' ;
      display: block ;
      position: absolute ;
      top: 0 ;
      right: 0 ;
      bottom: 0 ;
      left: 0 ;
      z-index: 1 ;
      animation: wpreview-sent-backdrop 2s both ;

    }

    #root #wpreview.form-sending .content .success-icon {
      display: block ;
      width: 100% ;
      height: 100% ;
      animation: wpreview-success-icon-scale 1.8s linear both ;

    }

    #root #wpreview.form-sending .content .success-icon path {
      animation: wpreview-success-icon-show-path 1.2s linear both ;

    }

    #root #wpreview.form-sending .content .success-icon circle {
      animation: wpreview-success-icon-draw-circle 1.2s linear both ;

    }

    #root #wpreview.form-sending .content .success-icon polyline {
      animation: wpreview-success-icon-draw-check 1.2s linear both ;

    }

    #root #wpreview .close:before {
      width: 24px ;
      height: 24px ;
      opacity: 0.2 ;
      background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>15D68D30-F05B-4FA9-9113-43BA7F5A01A9</title><g id="TO-DO" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Style" transform="translate(-290.000000, -65.000000)" fill-rule="nonzero"><g id="close" transform="translate(290.000000, 65.000000)"><path d="M22.5 1.5v21H1.5V1.5h21z" id="Path" stroke="rgb(54, 61, 77)" stroke-width="3"/><path id="Path" fill="rgb(54, 61, 77)" d="M16.999954 8.44117617 15.5588332 7.00005699 11.998935 10.5575 8.44121825 7 7.00004599 8.44117067 10.5585606 11.9999973 7 15.5587778 8.44122375 17 11.998935 13.4414323 15.5588277 16.999943 17 15.5587723 13.4414339 11.9999973z"/></g></g></g></svg>') ;

    }

    #root #wpreview .close:hover:before {
      opacity: 1 ;
      transform: none ;
      background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>15D68D30-F05B-4FA9-9113-43BA7F5A01A9</title><g id="TO-DO" stroke="none" stroke-width="1" fill="rgb(54, 61, 77)" fill-rule="evenodd"><g id="Style" transform="translate(-290.000000, -65.000000)" fill-rule="nonzero"><g id="close" transform="translate(290.000000, 65.000000)"><path d="M22.5 1.5v21H1.5V1.5h21z" id="Path" stroke="rgb(54, 61, 77)" stroke-width="3"/><path id="Path" fill="white" d="M16.999954 8.44117617 15.5588332 7.00005699 11.998935 10.5575 8.44121825 7 7.00004599 8.44117067 10.5585606 11.9999973 7 15.5587778 8.44122375 17 11.998935 13.4414323 15.5588277 16.999943 17 15.5587723 13.4414339 11.9999973z"/></g></g></g></svg>') ;

    }

    #root #wpreview .back {
      right: 40px ;
      padding-right: 8px ;

    }

    #root #wpreview .back:before {
      width: 24px ;
      height: 24px ;
      opacity: 0.2 ;
      background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>91438E60-81AF-4EEE-A23E-8A3703CC7360</title><g id="TO-DO" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Style" transform="translate(-263.000000, -65.000000)" fill-rule="nonzero"><g id="back" transform="translate(263.000000, 65.000000)"><path d="M22.5 1.5v21H1.5V1.5h21z" id="Path" stroke="rgb(54, 61, 77)" stroke-width="3"/><path id="Path" fill="rgb(54, 61, 77)" d="M13.3829119 7 15 8.50219947 11.2340149 11.9999615 14.9999171 15.4976464 13.3829949 17 8 12.0004744z"/></g></g></g></svg>') ;

    }

    #root #wpreview .back:hover:before {
      opacity: 1 ;
      background-image: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>91438E60-81AF-4EEE-A23E-8A3703CC7360</title><g id="TO-DO" stroke="none" stroke-width="1" fill="rgb(54, 61, 77)" fill-rule="evenodd"><g id="Style" transform="translate(-263.000000, -65.000000)" fill-rule="nonzero"><g id="back" transform="translate(263.000000, 65.000000)"><path d="M22.5 1.5v21H1.5V1.5h21z" id="Path" stroke="rgb(54, 61, 77)" stroke-width="3"/><path id="Path" fill="white" d="M13.3829119 7 15 8.50219947 11.2340149 11.9999615 14.9999171 15.4976464 13.3829949 17 8 12.0004744z"/></g></g></g></svg>') ;

    }

    #root #wpreview .container {
      border-radius: 0 ;

    }

    #root #wpreview .body {
      font-family: 'Sora', sans-serif ;
      font-size: 18px ;
      line-height: 28px ;

    }

    #root #wpreview .title {
      font-size: 28px ;
      line-height: 36px ;

    }

    #root #wpreview .description {
      font-size: 18px ;
      line-height: 28px ;

    }

    #root #wpreview .input-text, #root #wpreview .input-textarea {
      border-width: 3px ;
      border-color: #363d4d ;

    }

    #root #wpreview .input-text:hover, #root #wpreview .input-textarea:hover, #root #wpreview .input-text:focus, #root #wpreview .input-textarea:focus, #root #wpreview .input-text:not(:placeholder-shown), #root #wpreview .input-textarea:not(:placeholder-shown) {
      border-color: #363d4d ;

    }

    #root #wpreview .input-select {
      border: none ;

    }

    #root #wpreview .input-select select {
      border-bottom: 3px solid #363d4d ;
      line-height: 28px ;

    }

    #root #wpreview .input-select select:invalid:not(:focus) {
      border-color: #363d4d ;

    }

    #root #wpreview .input-select:after {
      opacity: 1 ;
      background-image: url('data:image/svg+xml;utf8,<svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" fill="none" stroke="rgb(54, 61, 77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"><path fill="none" d="M1 3.95L5.95 8.9l4.95-4.95"/></svg>') ;

    }

    #root #wpreview .buttons {
      flex-direction: column ;

    }

    #root #wpreview .button.primary {
      padding: 12px ;
      border: 3px solid #363d4d ;
      border-radius: 0 ;

    }

    #root #wpreview .button.primary:hover, #root #wpreview .button.primary:focus {
      background-color: #363d4d ;
      color: #ffffff ;

    }

    #root #wpreview .note {
      margin: 0 ;
      font-size: 18px ;
      line-height: 28px ;
      font-weight: 700 ;
      padding: 12px ;
      border: 2px dashed #363d4d ;
      color: #363d4d ;
      text-align: center ;

    }
</style>
{foreach $stylesheets.inline as $stylesheet}
  <style>
    {$stylesheet.content}
  </style>
{/foreach}
