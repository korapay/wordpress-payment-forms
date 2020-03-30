<?php

  if ( ! defined( 'ABSPATH' ) ) { exit; }
  $form_id = KP_Korapay_Pay::gen_rand_string();
  if (!empty($atts['custom_currency'])) {
    if (preg_match('/^[a-z\d]* [a-z\d]*$/', $atts['custom_currency'])) {
      $currencies = explode(", ", $atts['custom_currency']);
    } else{
      $currencies = explode(",", $atts['custom_currency']);
    }
  }
?>

<div>
  <form id="<?php echo $form_id ?>" class="kp-simple-pay-now-form" <?php echo $data_attr; ?> >
    <div id="notice"></div>
    <?php if ( empty( $atts['email'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Email', 'korapay-pay' ) ?></label>
      <input class="kp-form-input-text" id="kp-customer-email" type="email" placeholder="<?php _e( 'Email', 'korapay-pay' ) ?>" required /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['firstname'] ) ) : ?>

      <label class="pay-now"><?php _e( 'First Name', 'korapay-pay' ) ?> (Optional) </label>
      <input class="kp-form-input-text" id="kp-first-name" type="text" placeholder="<?php _e( 'First Name', 'korapay-pay' ) ?>" /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['lastname'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Last Name', 'korapay-pay' ) ?> (Optional) </label>
      <input class="kp-form-input-text" id="kp-last-name" type="text" placeholder="<?php _e( 'Last Name', 'korapay-pay' ) ?>" /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['amount'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Amount', 'korapay-pay' ); ?></label>
      <input class="kp-form-input-text" id="kp-amount" type="text" placeholder="<?php _e( 'Amount', 'korapay-pay' ); ?>" required /><br>

    <?php endif; ?>
    <br>

    <?php wp_nonce_field( 'kp-korapay-pay-nonce', 'kp_sec_code' ); ?>
    <button value="submit" class='kp-pay-now-button' href='#'><?php _e( $btn_text, 'korapay-pay' ) ?></button>
  </form>
</div>
