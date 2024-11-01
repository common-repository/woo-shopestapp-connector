<?php
/*
* Plugin Name: WooCommerce Shopestapp Connector
* Description: Install plugin and sync products with our platform easily.
* Version: 1.0.0
* WC requires at least: 2.6.0
* WC tested up to: 3.2.0
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  include 'settings.php';
}
