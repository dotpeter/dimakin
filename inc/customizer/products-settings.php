<?php
/*
* Products Settings
*/


// Settings
$wp_customize->add_setting( 'product_btn_contact_url', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'product_btn_contact_url',
    array(
      'type' => 'text',
      'section'    => 'general_settings_section',
      'priority'   => 3,
      'label' => __( 'Url do botão na página de produtos', 'dimakin' ),
      'description' => ''
    )
));
