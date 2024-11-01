WooCommerce Shopestapp Connector
Contributors: shopest,amolv
Donate link: https://shopestapp.com/
Tags: shopest, connector,wooplugin
Requires at least: 4.0
Tested up to: 5.0
Stable tag: 4.3
Requires PHP : 5.2.4


Woocommerce Shopestapp Connector plugin allows you to sync products with Shopestapp platform easily.

== Description ==

Woocommerce Shopestapp Connector plugin allows you to sync products with Shopestapp platform by filling the form under Woocommerce->Shopestapp options. You need to provide woocommerce api key and secret. Using these details this plugin will fetch all the products from your site to Shopest admin. This plugin uses the shopestapp api https://euprod.shopestapp.com/v2/platforms/woocommerce/ to save your woocommerce consumer key and secret. This api takes three parameters woo_key, woo_host and woo_secret. Using the saved consumer key and secret we will fetch the products from the provided host to shopestapp platform https://shopestapp.com/. You can find the privacy policy of Shopestapp here https://shopestapp.com/privacy-policy .


== Installation ==

1. Upload the plugin files to the ‘/wp-content/plugins/wooplugin’ directory or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Woocommerce->Shopestapp screen to configure the plugin
4. Generate the woocommerce keys from Woocommerce -> Settings -> API -> Keys/Apps in new tab and do not close it. Because once you close it you need to generate the keys again 
5. Copy Generated woocommerce consumer key and secret to the Woocommerce->Shopestapp form and click on generate token



== Frequently Asked Questions ==

1. Do I need Woocommerce plugin to use this plugin?

Yes you must have Woocommerce plugin.

2. Do I need to share my Woocmmerce consumer key and secret?

Yes. You need to fill the form under Woocommerce Shopestapp section. Using that form values we will fetch the woocommerce products and show it on shopestapp.

3. Whether the products will be deleted from my website?

No. We will just fetch (copy) the products to Shopest admin.

4. Where do I get my WooCommerce keys?

You need to generate it from Woocommerce -> Settings -> API -> Keys/Apps section.


== Screenshots ==

1. Shopestapp settings form

== Changelog ==

= 1.0 =
* Plugin with initial version.


== Upgrade Notice ==

= 1.0 =
Initial release.

= 1.5 = 
Disconnect the website from shopestapp functionality.

== A brief Markdown Example ==

