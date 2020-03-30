<?php
  /**
   * Adming Settings Page Class
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  if ( ! class_exists( 'KP_Korapay_Admin_Settings' ) ) {

    /**
    * Admin Settings class
    */
    class KP_Korapay_Admin_Settings {

      /**
       * Class instance
       * @var $instance
       */
      public static $instance = null;

      /**
       * Admin options array
       *
       * @var array
       */
      protected $options;

      /**
       * Class constructor
       */
      private function __construct() {

        
        add_action( 'admin_menu', array( $this, 'kp_korapay_add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'kp_korapay_register_settings' ) );
        $this->init_settings();

      }

      /**
       * Registers admin setting
       *
       * @return void
       */
      public function kp_korapay_register_settings() {

        register_setting( 'kp-korapay-settings-group', 'kp_korapay_options' );

      }

      private function init_settings() {

        if ( false == get_option( 'kp_korapay_options' ) ) {
          update_option( 'kp_korapay_options', array() );
        }

      }

      /**
       * Fetches admin option settings from the db
       *
       * @param  string $setting The option to fetch
       *
       * @return mixed           The value of the option fetched
       */
      public function get_option_value( $attr ) {

        $options = get_option( 'kp_korapay_options' );

        if ( array_key_exists($attr, $options) ) {

          return $options[$attr];

        }

        return '';

      }

      /**
       * Checks if public key has been set
       *
       * @return boolean
       */
      public function is_public_key_present() {

        $options = get_option( 'kp_korapay_options' );

        if ( false == $options ) return false;

        return array_key_exists( 'public_key', $options ) && ! empty( $options['public_key'] );

      }

      /**
       * Get the instance of the class
       *
       * @return object   An instance of this class
       */
      public static function get_instance() {

        if ( null == self::$instance ) {

          self::$instance = new self;

        }

        return self::$instance;

      }

      /**
       * Add admin menu
       * @return void
       */
      public function kp_korapay_add_admin_menu() {

        add_menu_page(
          __( 'Korapay Settings Page', 'korapay-pay' ),
          'Korapay',
          'manage_options',
          'korapay-payment-forms',
          array( $this, 'kp_korapay_admin_setting_page' ),
          kp_DIR_URL . 'assets/images/edited.png',
          58
        );

        add_submenu_page(
          'korapay-payment-forms',
          __( 'Korapay Payment Forms Settings', 'korapay-pay' ),
          __( 'Settings', 'korapay-pay' ),
          'manage_options',
          'korapay-payment-forms',
          array( $this, 'kp_korapay_admin_setting_page' )
        );

      }

      /**
       * Admin page content
       * @return void
       */
      public function kp_korapay_admin_setting_page() {

        include_once( KP_DIR_PATH . 'views/admin-settings-page.php' );

      }
    }

  }

?>
