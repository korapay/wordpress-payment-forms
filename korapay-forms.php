<?php
  /*
  Plugin Name: Korapay Payment Forms
  Plugin URI: http://Korapay.com/
  Description: Korapay payment gateway forms, accept local and international payments securely.
  Version: 1.0.0
  Author: Korapay,Olokor Divine
  Author URI: https://korapay.com
  Copyright: © 2019 Korapay Technology Solutions
   License:      GPL-2.0+
  License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
  */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  if ( ! defined( 'KP_PAY_PLUGIN_FILE' ) ) {
    define( 'KP_PAY_PLUGIN_FILE', __FILE__ );
  }

  // Plugin folder path
  if ( ! defined( 'KP_DIR_PATH' ) ) {
    define( 'KP_DIR_PATH', plugin_dir_path( __FILE__ ) );
  }

  //Plugin folder path
  if ( ! defined( 'KP_DIR_URL' ) ) {
    define( 'KP_DIR_URL', plugin_dir_url( __FILE__ ) );
  }

  require_once( KP_DIR_PATH . 'includes/korapay-base-class.php' );

  global $kp_pay_class;

  $kp_pay_class = KP_Korapay_Pay::get_instance();

?>
