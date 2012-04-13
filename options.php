<div class="wrap">
  <h2>Kiss Insights</h2>

  <p>On your Kiss Insights account, you will be provided with some Javascript to add to your site - find that javascript and copy the contents of the 'src' attribute into the box below.</p>
  <p>The 'src' attribute usually starts with two forward slashes ('//'). You will not need any of the surrounding JavaScript code.</p>

  <form method="post" action="options.php">

    <?php wp_nonce_field('update-options'); ?>
    <?php settings_fields('kissinsights'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Your Kiss Insights Javascript URL:</th>
        <td><input type="text" name="kissinsights_js_url" value="<?php echo get_option('kissinsights_js_url'); ?>" size="50" /></td>
      </tr>
    </table>

    <input type="hidden" name="action" value="update" />

    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

  </form>
</div>
