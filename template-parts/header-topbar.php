<?php
/*
 * -----------------------------------------------------------
 * Header Top Bar Template
 * -----------------------------------------------------------
 */
?>
<div class="top-bar-wrapper">
  <div class="container">
    <div class="row  align-items-center">
      <div class="col-6">
        <?php do_action('dimack_social'); ?>
      </div><!-- col-6 -->
      <div class="col-6">
        <div class="language-wrapper">
          <?php get_sidebar( 'header' ); ?>
        </div><!-- language-wrapper -->
      </div><!-- col-6 -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- top-bar-wrapper -->
