<?php
/*
 * Template Name: Locais de Operação
 * -----------------------------------------------------------
 * Pages for operations locations
 * -----------------------------------------------------------
 */

$olocals_subtitle = get_post_meta( get_the_ID(), '_dimakin_olocals_subtitle', true );
$olocals_description = get_post_meta( get_the_ID(), '_dimakin_olocals_description', true );

get_header();

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

 if ( has_post_thumbnail($post->ID) ) {
   echo '<main class="main-wrapper-locals wthumb">';
 }
 else {
   echo '<main class="main-wrapper-locals locals-bg">';
 }

 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

 ?>
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php
   if(has_post_thumbnail()){
     echo '<header class="page-header" style="background-image: url(' , esc_url($featured_img_url) ,');height: 400px;"></header>';
   } else {
     echo '<header class="page-header"></header>';
   }
   ?>
   <div class="article-content">
     <div class="container">
       <div class="row">
         <div class="col-12">
           <div class="page-title-wrapper">
             <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-12">
            <?php
            if(!empty($olocals_subtitle)) {
              echo '<h3 class="subtitle">' . esc_html( $olocals_subtitle ) . '</h3>';
            }
            if(!empty($olocals_description)) {
              echo '<p class="page-description">' . esc_html( $olocals_description ) . '</p>';
            }
            ?>
         </div>
      </div>
       <div class="row">
         <?php
          $olocals = get_post_meta( get_the_ID(), '_dimakin_olocals_group', true );

          foreach ( (array)$olocals as $key => $olocal) {

            $ol_title = $ol_address = $ol_phone = $pl_map = '';

            if ( isset($olocal[ '_dimakin_olocals_title']) ) {
              $ol_title = $olocal['_dimakin_olocals_title'];
            }
            if ( isset($olocal['_dimakin_olocals_address']) ) {
              $ol_address = $olocal['_dimakin_olocals_address'];
            }
            if ( isset($olocal['_dimakin_olocals_phone']) ) {
              $ol_phone = $olocal['_dimakin_olocals_phone'];
            }
            if ( isset($olocal['_dimakin_olocals_map']) ) {
              $ol_map = $olocal[ '_dimakin_olocals_map'];
            }
            if ( isset( $ol_title, $ol_address, $ol_phone ) ) {
              $allowed_html = [
                'br' => [],
              ];
              echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="operation-local-wrapper"><h4>' , esc_html($ol_title) , '</h4><p class="address">' , wp_kses($ol_address, $allowed_html) , '</p><p><span>' , esc_html__( 'Tel.', 'dimakin' ) , '</span><a href="tel:' , esc_attr($ol_phone) . '" >' , esc_html($ol_phone) . '</a></p></div></div>';
            }

          }
          ?>
       </div>

       <div class="row">
         <div class="col-12">
           <div class="page-content-wrapper">
             <?php the_content(); ?>
           </div>
         </div>
       </div>
     </div>
   </div>
 </article>
</main>
<?php
endwhile;

else :
 get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
