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

<div class="alert alert-danger">
        <strong>{l s='Important notice :' mod='optimclean'}</strong> {l s='Each time you carry out an operation, remember to back up your data! The module deletes, backs up and attempts to restore your data.  it is nevertheless possible that, in some instances, you may encounter difficulties that mean that your data needs to be restored using a standard technique. You have sole responsibility for the data in your online store.' mod='optimclean'}
    </div>

    <div class="panel" id="about_module">
	<h3><i class="icon icon-info"></i> {l s='About this module' mod='optimclean'}</h3>
	<div class="row clearfix">
		<div class="col-md-12 col-lg-4">
			<img src="{$module_dir|escape:'htmlall':'UTF-8'|escape:'htmlall':'UTF-8'}views/img/admin/module-teaser-{if $iso_code!='fr'}en{else}fr{/if}.jpg" alt="{l s='Adilis, web agency' mod='optimclean'}" height="219" width="600" style="max-width: 100%; height: auto"/>
		</div>
		<div class="col-md-6 col-lg-3 col-lg-offset-1">
			<p>
			<h4>&raquo; {l s='The Author' mod='optimclean'} :</h4>
			<img src="{$module_dir|escape:'htmlall':'UTF-8'|escape:'htmlall':'UTF-8'}views/img/admin/logo-adilis.gif" alt="{l s='Adilis, web agency' mod='optimclean'}" height="54" width="125" style="max-width: 100%; height: auto"/>
			</p>
		</div>
		<div class="col-md-6 col-lg-4">
			<p>
			<h4>&raquo; {l s='The Module' mod='optimclean'} :</h4>
			<ul class="list-unstyled">
				<li>{l s='Module version' mod='optimclean'} : {$moduleversion|escape:'htmlall':'UTF-8'}</a></li>
				<li>{l s='Prestashop version' mod='optimclean'} : {$psversion|escape:'htmlall':'UTF-8'}</a></li>
				<li>{l s='Php version' mod='optimclean'} : {$phpversion|escape:'htmlall':'UTF-8'}</a></li>
				<li><a href="{$module_dir|escape:'htmlall':'UTF-8'|escape:'htmlall':'UTF-8'}readme_en.pdf" target="_blank">{l s='English Documentation' mod='optimclean'}</a></li>
				<li><a href="{$module_dir|escape:'htmlall':'UTF-8'|escape:'htmlall':'UTF-8'}readme_fr.pdf" target="_blank">{l s='French Documentation' mod='optimclean'}</a></li>
			</ul>
			</p>
		</div>

	</div>
</div>