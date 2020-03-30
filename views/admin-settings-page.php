<?php

  if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<?php global $admin_settings; ?>

  <div class="wrap">
    <h1>Korapay Payment Forms Settings</h1>
    <form id="korapay-pay" action="options.php" method="post" enctype="multipart/form-data">
      <?php settings_fields( 'kp-korapay-settings-group' ); ?>
      <?php do_settings_sections( 'kp-korapay-settings-group' ); ?>
      <table class="form-table">
        <tbody>

          <!-- Public Key -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[public_key]"><?php _e( 'Pay Button Public Key', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="kp_korapay_options[public_key]" value="<?php echo esc_attr( $admin_settings->get_option_value( 'public_key' ) ); ?>" />
              <p class="description">Your merchant public key</p>
            </td>
          </tr>
          <!-- Secret Key -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[secret_key]"><?php _e( 'Pay Button Secret Key', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="kp_korapay_options[secret_key]" value="<?php echo esc_attr( $admin_settings->get_option_value( 'secret_key' ) ); ?>" />
              <p class="description">Your merchant secret key</p>
            </td>
          </tr>

          <!-- Switch to Live -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[go_live]"><?php _e( 'Go Live', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-checkbox">
              <fieldset>
                <?php $go_live = esc_attr( $admin_settings->get_option_value( 'go_live' ) ); ?>
                <label>
                  <input type="checkbox" name="kp_korapay_options[go_live]" <?php checked( $go_live, 'yes' ); ?> value="yes" />
                  <?php _e( 'Switch to live account', 'korapay-pay' ); ?>
                </label>
              </fieldset>
            </td>
          </tr>
       
        
          <!-- Successful Redirect URL -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[success_redirect_url]"><?php _e( 'Success Redirect URL', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="kp_korapay_options[success_redirect_url]" value="<?php echo esc_attr( $admin_settings->get_option_value( 'success_redirect_url' ) ); ?>" />
              <p class="description">(Optional) Full URL (with 'http') to redirect to for successful transactions. default: ""</p>
            </td>
          </tr>
          <!-- Failed Redirect URL -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[failed_redirect_url]"><?php _e( 'Failed Redirect URL', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="kp_korapay_options[failed_redirect_url]" value="<?php echo esc_attr( $admin_settings->get_option_value( 'failed_redirect_url' ) ); ?>" />
              <p class="description">(Optional) Full URL (with 'http') to redirect to for failed transactions. default: ""</p>
            </td>
          </tr>
          <!-- Pay Button Text -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[btn_text]"><?php _e( 'Pay Button Text', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="kp_korapay_options[btn_text]" value="<?php echo esc_attr( $admin_settings->get_option_value( 'btn_text' ) ); ?>" />
              <p class="description">(Optional) default: PAY NOW</p>
            </td>
          </tr>

          <!-- Styling -->
          <tr valign="top">
            <th scope="row">
              <label for="kp_korapay_options[theme_style]"><?php _e( 'Form Style', 'korapay-pay' ); ?></label>
            </th>
            <td class="forminp forminp-checkbox">
              <fieldset>
                <?php $theme_style = esc_attr( $admin_settings->get_option_value( 'theme_style' ) ); ?>
                <label>
                  <input type="checkbox" name="kp_korapay_options[theme_style]" <?php checked( $theme_style, 'yes' ); ?> value="yes" />
                  <?php _e( 'Use default theme style', 'korapay-pay' ); ?>
                </label>
                <p class="description">Override the form style and use the default theme's style</p>
              </fieldset>
            </td>
          </tr>

        </tbody>
      </table>
      <?php submit_button(); ?>
    </form>

  </div>

  <?php
      include_once( KP_DIR_PATH . 'views/disburse-form.php' );
  ?>
