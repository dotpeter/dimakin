<?php

if ( ! function_exists( 'dimakin_jobs_loop' ) ) {
  function dimakin_jobs_loop() {
    $jobs = get_post_meta( get_the_ID(), '_dimakin_jobs_group', true );
    $jobUrl = get_post_meta( get_the_ID(), '_dimakin_jobs_url', true );

    if(!empty($jobs)) {
      echo '<section class="jobs-wrapper"><div class="row"><div class="col-12"><h2>' , __('Ofertas', 'dimakin') , '</h2><hr></div></div><div class="row">';

      if ( $jobs ) {

        foreach ( (array)$jobs as $key => $job ) {

          $jobTitle = $jobDesc = '';

          if ( isset( $job[ '_dimakin_jobs_title' ] ) )
            $jobTitle = esc_html( $job[ '_dimakin_jobs_title' ] );

          if ( isset( $job[ '_dimakin_jobs_desc' ] ) )
            $jobDesc =  wpautop($job[  '_dimakin_jobs_desc' ]);


          if ( !empty( array( $jobTitle ) ) ) {
            ?>
              <div class="col-12 col-md-6">
                <div class="job-card">
                  <h3><?php echo $jobTitle ;?></h3>
                  <?php echo $jobDesc; ?>
                  <a class="primary-btn job-link" href="<?php echo esc_url($jobUrl); ?>"><?php _e('Candidatar', 'dimakin'); ?></a>
                </div>
              </div>
            <?php
          }

        }

      }
      echo '</div></section>';
    }
  }
  add_action( 'jobs_loop', 'dimakin_jobs_loop' );
}
