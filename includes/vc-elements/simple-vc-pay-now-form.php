<?php
  /**
   * Visual Composer element for a simple PAY NOW form
   */
  if ( ! defined( 'ABSPATH' ) ) { exit; }

  /**
   * Simple PAY NOW form Class
   */
  class KP_VC_Simple_Form {

    /**
     * Class Constructor
     */
    function __construct() {

      add_action( 'init', array( $this, 'kp_simple_form_mapping' ) );

    }

    /**
     * Visual Composer Form elements mapping
     *
     * @return void
     */
    public function kp_simple_form_mapping() {

      // Stop all if VC is not enabled
      if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
      }

      // Map the block with vc_map()
      vc_map(
        array(
          'name' => __('Korapay Simple Form', 'korapay-pay'),
          'base' => 'kp-pay-button',
          'description' => __('Korapay Simple Pay Now Form', 'korapay-pay'),
          'category' => __('Korapay Forms', 'korapay-pay'),
          'icon' => KP_DIR_URL . 'assets/images/edited.png',
          'params' => array(
            array(
              'type' => 'textfield',
              'class' => 'title-class',
              'holder' => 'p',
              'heading' => __( 'Amount', 'korapay-pay' ),
              'param_name' => 'amount',
              'value' => __( '', 'korapay-pay' ),
              'description' => __( 'If left blank, user will be asked to enter the amount to complete the payment.', 'korapay-pay' ),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Form Attributes',
            ),

            array(
              'type' => 'checkbox',
              'heading' => __( "Use logged-in user's email?", 'korapay-pay' ),
              'description' => __( "Check this if you want the logged-in user's email to be used. If unchecked or user is not logged in, they will be asked to fill in their email address to complete payment.", 'korapay-pay' ),
              'param_name' => 'use_current_user_email',
              'std' => '',
              'value' => array(
                __( 'Yes', 'korapay-pay' ) => 'yes'
              ),
              'group' => 'Form Attributes'
            ),

            array(
              'type' => 'textfield',
              'heading' => __( 'Button Text', 'korapay-pay' ),
              'param_name' => 'content',
              'value' => __( '', 'korapay-pay' ),
              'description' => __( '(Optional) The text on the PAY NOW button. Default: "PAY NOW"', 'korapay-pay' ),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Form Attributes',
            ),

          )
        )
      );

    }

  }

  // Element Class Init
  new KP_VC_Simple_Form();
?>
