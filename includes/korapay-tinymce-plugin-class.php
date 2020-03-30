<?php
  /**
   * Tinymce plugin to add shortcode button to tinymce editor
   */
  if ( ! defined( 'ABSPATH' ) ) { exit; }

  if ( ! class_exists( 'KP_Tinymce_Plugin' ) ) {

    /**
    * Korapay Tinymce Plugin Class
    */
    class KP_Tinymce_Plugin {

      /**
       * Class $instance
       *
       * @var null
       */
      protected static $instance = null;

      /**
       * Class constructor
       */
      function __construct() {

        add_action( 'admin_init', array( $this, 'kp_korapay_shortcode_button_init' ) );

      }

      /**
       * Initialize our shortcode button
       *
       * @return void
       */
      public function kp_korapay_shortcode_button_init() {

        if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {

          add_filter( 'mce_external_plugins', array( $this, 'kp_korapay_register_tinymce_plugin' ) );
          add_filter( 'mce_buttons', array( $this, 'kp_korapay_add_tinymce_button' ) );

        }

      }

      /**
       * Registers the tinymce plugin
       *
       * @param  array $plugins List of existing plugins
       *
       * @return array          List of all the plugins including this one
       */
      public function kp_korapay_register_tinymce_plugin( $plugins ) {

        $plugins['kp_button'] = KP_DIR_URL . 'assets/js/kp-tinymce.js';
        return $plugins;

      }

      /**
       * Adds the korapay tinymce button
       *
       * @param  array $buttons Existing buttons
       *
       * @return array          Existing button including our own
       */
      public function kp_korapay_add_tinymce_button( $buttons ) {

          array_push( $buttons, 'separator', 'kp_button' );
          return $buttons;

      }

      /**
       * Gets the class instance
       *
       * @return object The instance of this class
       */
      public static function get_instance() {

        if ( null == self::$instance ) {

          self::$instance = new self;

        }

        return self::$instance;

      }

    }

  }

?>
