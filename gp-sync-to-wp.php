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

/**
 * Plugin class
 */
class GP_Sync_To_WP {

  public function __construct() {
    add_filter( 'gp_export_translations_filename', array( $this, 'get_export_filename' ), 99, 5 );
  }

  public function project_settings_add() {
    //TODO: add project settings - project type (#1)
    //TODO: add project settings - save to project? (#4)
  }

  public function import_originals() {
    //TODO: import originals from pot file (#2)
  }

  public function export() {
    //TODO: export language files (.po/.mo) to folder - according to project settings (#3)
  }

  /**
   * get the filename for export
   */
  public function get_export_filename( $filename, $format, $locale, $project, $translation_set ) {

    //TODO: check setting - save to project (#4)
    $save_to_project = false;

    if ( $save_to_project ) {
      // save to project language folder - name: (locale)
      $filename = $locale->wp_locale;
    } else {
      // save to wordpress language folder - name: (project_name)-(locale)
      $filename = sprintf( '%1s-%2s', $project->slug, $locale->wp_locale );
    }

    return sprintf( '%1s.%2s', $filename, $format->extension );
  }
}

/**
 * Plugin - setup
 */
function gp_sync_to_wp_init() {
  GLOBAL $gp_sync_to_wp;
  $gp_sync_to_wp = new GP_Sync_To_WP();
}
add_action( 'gp_init', 'gp_sync_to_wp_init' );
