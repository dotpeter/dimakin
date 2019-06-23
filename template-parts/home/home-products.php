<?php
/*
* Home Page Products
*/

// Cuidado ao colocar limitações do número de posts porque gera um erro na apresentação, Default: 200
$products_args = array(
  'post_type' => 'product',
  'posts_per_page' => 12,
);

$products_loop = new WP_Query($products_args);

if ( $products_loop->have_posts() ) :
  echo '<section class="products-wrapper"><div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><a href="'. get_permalink( woocommerce_get_page_id( 'shop' ) ) .'"<h2 class="section-title">' ,  esc_html__( 'Produtos', 'dimakin' ) , '</h2></a></div></div><div class="row products-slider-wrapper"><ul class="products-slider-container">';
  while ( $products_loop->have_posts() ) : $products_loop->the_post();
    //do_action('products_loop');
    wc_get_template_part( 'content', 'product' );
  endwhile;
  echo '</ul></div><div class="row"><div class="col-12"><a href="', get_permalink( woocommerce_get_page_id( 'shop' ) ) , '" class="primary-btn">' , esc_html__( 'Ver todos os Produtos', 'dimakin' ) , '<i class="fa fa-chevron-right" aria-hidden="true"></i></a></div></div></div></section>';
endif;

wp_reset_postdata();
