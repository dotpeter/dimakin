<?php
/*
* Home Page Slider Section
*/

$wp_customize->add_section( 'slider_section', array(
    'priority' => 1,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Slider Settings', 'dimakin' ),
    'description' => __( 'Define your home slider.', 'dimakin' ),
    'panel' => 'dimakin_theme_panel',
) );

// Settings
$wp_customize->add_setting( 'home_slider_shortcode', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'home_slider_control',
    array(
      'type' => 'text',
      'section'    => 'slider_section',
      'settings'   => 'home_slider_shortcode',
      'priority'   => 1,
      'label' => __( 'Slider Shortcode', 'dimakin' ),
      'description' => ''
    )
));
