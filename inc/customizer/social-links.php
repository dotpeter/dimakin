<?php


// Section for the social icons.
$wp_customize->add_section( 'social_section', array(
    'priority' => 1,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Redes Socias', 'dimakin' ),
    'description' => __( 'Insira aqui os links para as suas redes socias', 'dimakin' ),
    'panel' => 'dimack_theme_panel',
) );


// Field for the Facebook link.
$wp_customize->add_setting( 'facebook_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'esc_html',
) );

// Field for the Linkedin link.
$wp_customize->add_setting( 'linkedin_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'esc_html',
) );

// Field for the Twitter link.
$wp_customize->add_setting( 'twitter_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'sanitize_text_field',
) );

// Field for the Youtube link.
$wp_customize->add_setting( 'youtube_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'sanitize_text_field',
) );

// Field for the Google+ link.
$wp_customize->add_setting( 'googleplus_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'sanitize_text_field',
) );

// Field for the Instagram link.
$wp_customize->add_setting( 'instagram_field', array(
  'default' => '',
  'type' => 'theme_mod',
  'capability' => 'edit_theme_options',
  'transport' => '',
  'sanitize_callback' => 'sanitize_text_field',
) );

// Control for Facebook url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'facebook_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'facebook_field',
      'priority'   => 1,
      'label' => __( 'Facebook Url:', 'dimakin' ),
      'description' => ''
    )
  ));

// Control for Linkedin url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'linkedin_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'linkedin_field',
      'priority'   => 1,
      'label' => __( 'Linkedin Url:', 'dimakin' ),
      'description' => ''
    )
  ));

// Control for Twitter url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'twitter_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'twitter_field',
      'priority'   => 1,
      'label' => __( 'Twitter Url:', 'dimakin' ),
      'description' => ''
    )
  ));

// Control for Youtube url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'youtube_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'youtube_field',
      'priority'   => 1,
      'label' => __( 'Youtube Url:', 'dimakin' ),
      'description' => ''
    )
  ));

// Control for Google+ url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'googleplus_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'googleplus_field',
      'priority'   => 1,
      'label' => __( 'Google Url:', 'dimakin' ),
      'description' => ''
    )
  ));

// Control for Instagram url field.
$wp_customize->add_control( new WP_Customize_Control(
  $wp_customize,
  'instagram_control',
    array(
      'type' => 'text',
      'section'    => 'social_section',
      'settings'   => 'instagram_field',
      'priority'   => 1,
      'label' => __( 'Instagram Url:', 'dimakin' ),
      'description' => ''
    )
  ));
