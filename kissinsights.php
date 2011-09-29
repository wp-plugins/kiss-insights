<?php
/*
Plugin Name: Kiss Insights
Plugin URI: http://www.stinkyinkshop.co.uk/themes/plugins/kiss-insights/
Description: Enables <a href="http://www.kissinsights.com">Kiss Insights</a> on all pages.
Version: 1.0.2
Author: Stinkyink
Author URI: http://www.stinkyinkshop.co.uk/themes/
*/


function kissinsights() { 
?>  
  <script type="text/javascript">var _kiq = _kiq || [];</script>
  <script type="text/javascript" src="//s3.amazonaws.com/ki.js/22418/4qz.js" async="true"></script> 
<?php
}

if (!is_admin()) {
	add_action('wp_footer', 'kissinsights');
}

?>