<?php
/*
 * Main Header
*/
?>
<header class="main-header-wrapper">
  <?php get_template_part('template-parts/header', 'topbar'); ?>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-10 col-sm-1 col-md-1">
        <?php get_template_part('template-parts/site', 'branding'); ?>
      </div><!-- col -->
      <div class="col-2 col-sm-11 col-md-11">
        <div class="navigation-wrapper">
          <?php get_template_part('template-parts/main', 'navigation'); ?>
          <?php get_template_part('template-parts/secondary', 'navigation'); ?>
        </div>
        <?php get_template_part('template-parts/mobile', 'buttons'); ?>
      </div> <!-- col -->
    </div><!-- row -->
  </div><!-- container-fluid -->
</header>
<?php get_template_part('template-parts/header', 'searchform'); ?>
<?php get_template_part('template-parts/mobile', 'navigation'); ?>
