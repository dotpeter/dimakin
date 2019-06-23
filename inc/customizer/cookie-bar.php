<?php
/*
 * -----------------------------------------------------------
 * Cookie Bar Settins
 * -----------------------------------------------------------
 */

$wp_customize->add_section( 'cookies_section', array(
  'priority' => 1,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
  'title' => __( 'Aviso de Cookies', 'dimakin' ),
  'description' => __( 'Defina o aviso de política de privacidade e uso de cookies.', 'dimakin' ),
  'panel' => 'dimakin_theme_panel',
) );

 /*----------- Cookie bar text-----------*/
 // Settings
 $wp_customize->add_setting( 'cookie_bar_text', array(
   'default' => '',
   'type' => 'theme_mod',
   'capability' => 'edit_theme_options',
   'transport' => 'refresh',
   'sanitize_callback' => 'esc_html',
 ) );
 //Controls
 $wp_customize->add_control( new WP_Customize_Control(
   $wp_customize,
   'cookie_bar_text',
     array(
       'type' => 'textarea',
       'section'    => 'cookies_section',
       'priority'   => 1,
       'label' => __( 'Texto de aviso de Política de Privacidade', 'dimakin' ),
       'description' => ''
     )
 ));
