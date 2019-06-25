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
    'panel' => 'dimakin_theme_panel',
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
      'priority'   => 1,
      'label' => __( 'Descrição na página das notícias', 'dimakin' ),
      'description' => ''
    )
));



/*----------- Call to Action -----------*/
// Settings
$wp_customize->add_setting( 'cta_description', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'cta_description',
    array(
      'type' => 'textarea',
      'section'    => 'general_settings_section',
      'priority'   => 4,
      'label' => __( 'Descrição na Call to Action', 'dimakin' ),
      'description' => ''
    )
));


// Settings
$wp_customize->add_setting( 'cta_url', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => 'refresh',
  'sanitize_callback' => 'esc_html',
) );
//Controls
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'cta_url',
    array(
      'type' => 'text',
      'section'    => 'general_settings_section',
      'priority'   => 4,
      'label' => __( 'Url da Call to Action', 'dimakin' ),
      'description' => ''
    )
));
