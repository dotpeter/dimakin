<?php
class MyCustomPlugin {

  /**
   * MyCustomPlugin constructor.
   */
  public function __construct() {
    // ...
    add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
  }

  /** 
   * Enqueues the plugin file.
   */
  public function enqueue_scripts() {
    wp_enqueue_script( 'my-custom-plugin', get_theme_file_uri( 'assets/js/custom/yoast-cmb2-field-analysis.js' ), [], '1.', true );
  }

}

/** 
 * Loads the plugin.
 */
function loadMyCustomPlugin() {
    new MyCustomPlugin();
}

if ( ! wp_installing() ) {
  add_action( 'plugins_loaded', 'loadMyCustomPlugin', 20 );
}