<?php
/*
* General Settings Section
*/

$wp_customize->add_section( 'general_settings_section', array(
    'priority' => 1,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Definições Gerais', 'dimakin' ),
    'description' => __( 'Defina algumas opçôes aqui.', 'dimakin' ),
    'panel' => 'dimack_theme_panel',
) );

/*----------- Blog Description -----------*/
// Settings
$wp_customize->add_setting( 'blog_description', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'blog_description',
    array(
      'type' => 'textarea',
      'section'    => 'general_settings_section',
      'priority'   => 4,
      'label' => __( 'Descrição na página das notícias', 'dimakin' ),
      'description' => ''
    )
));

/*----------- Top bar Email-----------*/
// Settings
$wp_customize->add_setting( 'topbar_email', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'topbar_email',
    array(
      'type' => 'text',
      'section'    => 'general_settings_section',
      'priority'   => 4,
      'label' => __( 'Endereço de email na barra no top do website', 'dimakin' ),
      'description' => ''
    )
));

/*----------- Google Analytics -----------*/
// Settings
$wp_customize->add_setting( 'google_analytics', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'google_analytics',
    array(
      'type' => 'textarea',
      'section'    => 'general_settings_section',
      'priority'   => 1,
      'label' => __( 'Google Analytics', 'dimakin' ),
      'description' => ''
    )
));

/*----------- Google API Key -----------*/
// Settings
$wp_customize->add_setting( 'google_maps_aki', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'google_maps_aki',
    array(
      'type' => 'textarea',
      'section'    => 'general_settings_section',
      'priority'   => 2,
      'label' => __( 'Google Maps Chave API ', 'dimakin' ),
      'description' => ''
    )
));
