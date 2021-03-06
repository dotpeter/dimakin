<?php
function dimakin_customize_register($wp_customize) {
  // Do stuff with $wp_customize, the WP_Customize_Manager object.
  // New panel for the theme options.
  $wp_customize->add_panel('dimakin_theme_panel', array(
      'priority' => 20,
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'title' => __('Opções Dimakin', 'dimakin'),
      'description' => __('Opções relativas ao tema e website dimakin.pt', 'dimakin'),
  ) );
  require get_parent_theme_file_path('/inc/customizer/social-links.php');
  require get_parent_theme_file_path('/inc/customizer/home-settings.php');
  require get_parent_theme_file_path('/inc/customizer/general-settings.php');
  require get_parent_theme_file_path('/inc/customizer/products-settings.php');
  require get_parent_theme_file_path('/inc/customizer/images-icons.php');
  require get_parent_theme_file_path('/inc/customizer/cookie-bar.php');

}
add_action('customize_register', 'dimakin_customize_register');
