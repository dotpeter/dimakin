<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">

  <?php // force Internet Explorer to use the latest rendering engine available ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php wp_title(''); ?></title>

  <?php // mobile meta (hooray!) ?>
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
  <?php do_action('dimakin_touch_icons');  ?>
  <link rel="icon" href="<?php get_site_icon_url(); ?>">
  <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <![endif]-->
  <?php // or, set /favicon.ico for IE10 win ?>
  <meta name="msapplication-TileColor" content="#8c8c8c">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
  <meta name="theme-color" content="#8c8c8c">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>

  <?php //$google_analytics = get_theme_mod( 'google_analytics' ); echo !empty($google_analytics) ? $google_analytics : ''; ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

  <?php get_template_part('template-parts/main', 'header'); ?>
