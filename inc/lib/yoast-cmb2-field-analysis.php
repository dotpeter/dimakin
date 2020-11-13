<?php

class YoastCMB2Analysis {
  private $plugin_data = null;

  public function __construct() {
    add_action('admin_init', array($this, 'plugin_admin_setup'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
  }

  public function plugin_admin_setup() {
    //$this->plugin_data = get_plugin_data(dirname(__FILE__));

    if(current_user_can('activate_plugins')) {
      $cmb2_active = $this->check_for_cmb2();
      $yoast_seo_active = $this->check_for_yoast_seo();
      $deactivate = $cmb2_active || $yoast_seo_active;

      if($deactivate) {
        deactivate_plugins(plugin_basename(__FILE__));

        if(!empty($_GET['activate'])) unset($_GET['activate']);
      }
    }
  }

  public function check_for_cmb2() {
    if(!class_exists('CMB2', false) && !defined('CMB2_LOADED')) {
      add_action('admin_notices', array($this, 'require_cmb2_message'));

      return true;
    }

    return false;
  }

  public function check_for_yoast_seo() {
    if(!is_plugin_active('wordpress-seo/wp-seo.php') &&
      !is_plugin_active('wordpress-seo-premium/wp-seo-premium.php')) {
        add_action('admin_notices', array($this, 'require_yoast_message'));

        return true;
    }

    return false;
  }

  public function require_cmb2_message() {
    ?>

    <div class="error">
      <p>Yoast CMB2 Field Analysis requires CMB2 (plugin or library) to be installed and initialized.</p>
    </div>

    <?php
  }

  public function require_yoast_message() {
    ?>

    <div class="error">
      <p>Yoast CMB2 Field Analysis requires Yoast SEO 3.0+ to be installed and activated.</p>
    </div>

    <?php
  }

  public function enqueue_scripts($page_hook) {
    if($page_hook !== 'post.php' && $page_hook !== 'post-new.php') return;

    $current_screen = get_current_screen();
    $current_post_type = get_post_type_object($current_screen->post_type);

    if($current_post_type->public === false) return;

    wp_enqueue_script( 'yoast-cmb2-custom-fields-js', get_theme_file_uri( '/assets/js/custom/yoast-custom-fields.js' ), array( 'jquery' ), '', true );

  }
}

new YoastCMB2Analysis();