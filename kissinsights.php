<?php
/*
Plugin Name: Kiss Insights
Plugin URI: http://www.stinkyinkshop.co.uk/themes/plugins/kiss-insights/
Description: Enables <a href="http://www.kissinsights.com">Kiss Insights</a> on all pages.
Version: 2.0.3
Author: Stinkyink
Author URI: http://www.stinkyinkshop.co.uk/themes/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_kissinsights() {
  add_option('kissinsights_js_url', '');
}

function deactive_kissinsights() {
  delete_option('kissinsights_js_url');
}

function admin_init_kissinsights() {
  register_setting('kissinsights', 'kissinsights_js_url');
}

function admin_menu_kissinsights() {
  add_options_page('Kiss Insights', 'Kiss Insights', 'manage_options', 'kissinsights', 'options_page_kissinsights');
}

function options_page_kissinsights() {
  include(WP_PLUGIN_DIR.'/kiss-insights/options.php');  
}

function render_kissinsights($kissinsights_js_url) {
  if($kissinsights_js_url) {
?>
  <script type="text/javascript">var _kiq = _kiq || [];</script>
  <script type="text/javascript" src="<?php echo $kissinsights_js_url; ?>" async="true"></script>

<?php
  }
}



function kissinsights() { 
  
  $kissinsights_js_url = get_option('kissinsights_js_url');
  render_kissinsights($kissinsights_js_url);

}

register_activation_hook(__FILE__, 'activate_kissinsights');
register_deactivation_hook(__FILE__, 'deactive_kissinsights');

if (is_admin()) {
  add_action('admin_init', 'admin_init_kissinsights');
  add_action('admin_menu', 'admin_menu_kissinsights');
}

if (!is_admin()) {
	add_action('wp_head', 'kissinsights');
}

?>