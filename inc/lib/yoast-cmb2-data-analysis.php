<?php

class YoastCmb2DataAnalysis {

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
    $current_screen = get_current_screen();
    $current_post_type = get_post_type_object($current_screen->post_type);

    if($current_post_type->public === false) return;
    wp_enqueue_script( 'yoast-cmb-2-data-analysis', get_theme_file_uri( 'assets/js/custom/yoast-cmb2-data-analysis.js' ), [], '1.', true );
  }

}

/** 
 * Loads the plugin.
 */
new YoastCmb2DataAnalysis();

