<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('admin_menu', 'wsc_admin_add_shopest_page');
function wsc_admin_add_shopest_page() {
  add_submenu_page( 'woocommerce', 'Shopestapp', 'Shopestapp', 'manage_options', 'p_shopest', 'wsc_shopest_options_page' );
}

function wsc_shopest_options_page() {
  if( ! current_user_can('manage_options') )
    return;
  if( !get_option('sh_token') ){
  ?>
  <form action="options.php" method="post">
  <?php settings_fields('wsc_shopest_plugin_options'); ?>
  <?php do_settings_sections('wsc_shopest_setting'); ?>
  <input class="button button-primary" name="Submit" type="submit" value="<?php esc_attr_e('Generate Token'); ?>" />
  <em>Submiting this form sends form data to Shopest Admin, this details will be used to fetch the products.</em>
  </form>
  <?php
  } else{
    echo "<h3>Thank you. Data is saved.</h3>";
    echo "<h4>Your Shopest Token is ".get_option('sh_token')."</h4>";
  }

}
add_action('admin_init', 'wsc_shopest_admin_init');
function wsc_shopest_admin_init(){
  register_setting( 'wsc_shopest_plugin_options', 'wsc_shopest_plugin_options', 'wsc_validate_shopest_plugin_options' );
  add_settings_section('wsc_plugin_main', 'Shopestapp Store Settings', 'wsc_plugin_section_text', 'wsc_shopest_setting');
  add_settings_field('site_url', 'Site Url', 'wsc_setting_site_url', 'wsc_shopest_setting', 'wsc_plugin_main');
  add_settings_field('consumer_key', 'Consumer key', 'wsc_setting_client_consumerkey', 'wsc_shopest_setting', 'wsc_plugin_main');
  add_settings_field('consumer_secret', 'Consumer secret', 'wsc_setting_consumer_secret', 'wsc_shopest_setting', 'wsc_plugin_main');
  
}

function wsc_plugin_section_text() {
  echo '<p>Create WooCommerce keys and add below.</p>';
}
function wsc_setting_site_url(){
  $options = get_site_url();
  echo "<p>$options</p>";
}

function wsc_setting_consumer_secret() {
  $options = get_option('wsc_shopest_plugin_options');
  echo "<input id='consumer_secret' name='wsc_shopest_plugin_options[consumer_secret]' size='55' type='text' value='{$options['consumer_secret']}' />";
}
function wsc_setting_client_consumerkey() {
  $options = get_option('wsc_shopest_plugin_options');
  echo "<input id='consumer_key' name='wsc_shopest_plugin_options[consumer_key]' size='55' type='text' value='{$options['consumer_key']}' />";

}

function wsc_validate_shopest_plugin_options($input) {
  $newinput['consumer_secret'] = sanitize_text_field($input['consumer_secret']);
  $newinput['consumer_key'] = sanitize_text_field($input['consumer_key']);
  $newinput['access_token'] = sanitize_text_field($input['access_token']);
  $site_url = get_site_url();
  
  $body = array(
    'woo_secret' => $newinput['consumer_secret'],
    'woo_host' => $site_url,
    'woo_key' => $newinput['consumer_key'] 
  );
  $json_body = json_encode( $body );
  
  
  $args = array(
    'body' => $json_body,
    'timeout' => '5',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array('Content-Type'=>'application/json'),
    'cookies' => array()
  );
  $wsc_response = wp_remote_post( 'https://euprod.shopestapp.com/v2/platforms/woocommerce/', $args );
  $wsc_decoded_data = json_decode($wsc_response['body'],true ) ;
  if( !get_option('sh_token') )
    add_option( 'sh_token',$wsc_decoded_data['data']['sh_token'] ); 
  return $newinput;
}
