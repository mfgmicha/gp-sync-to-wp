<?php
/*
Plugin Name:  GP sync to WP
Plugin URI:   https://michakrapp.com
Description:  GlotPress plugin to sync translations to the WordPress site it is installed on
Version:      0.0.1
Author:       Micha Krapp
Author URI:   https://michakrapp.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  gp-sync-to-wp
Domain Path:  /languages
Tags: glotpress, glotpress plugin, translate, i18n
*/

/**
 * Plugin - activation
 */
function gp_sync_to_wp_activation() {
  error_log( 'Plugin GP sync to WP activated.' );
}
register_activation_hook( __FILE__, 'gp_sync_to_wp_activation' );

/**
 * Plugin - deactivation
 */
function gp_sync_to_wp_deactivation() {
  error_log( 'Plugin GP sync to WP deactivated.' );
}
register_deactivation_hook( __FILE__, 'gp_sync_to_wp_deactivation' );

/**
 * Plugin - uninstall
 */
function gp_sync_to_wp_uninstall() {
  error_log( 'Plugin GP sync to WP uninstalled.' );
}
register_uninstall_hook( __FILE__, 'gp_sync_to_wp_uninstall' );

class GP_Sync_To_WP {

  public function __construct() {

  }
}

/**
 * Plugin - setup
 */
function gp_sync_to_wp_init() {
  GLOBAL gp_sync_to_wp;
  gp_sync_to_wp = new GP_Sync_To_WP();
}
add_action( 'gp_init', 'gp_sync_to_wp_init' );
