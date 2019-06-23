<?php
/*
 *
 * Woocommerce theme configuration.
 *
 */

/*----------- Add woocommerce support to the theme -----------*/
function dimack_add_woocommerce_support() {
  add_theme_support( 'woocommerce', array(
      'product_grid'          => array(
          'default_rows'    => 3,
          'min_rows'        => 1,
          'max_rows'        => 4,
          'default_columns' => 3,
          'min_columns'     => 1,
          'max_columns'     => 6,
      ),
  ) );
}

add_action( 'after_setup_theme', 'dimack_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );

add_theme_support( 'wc-product-gallery-lightbox' );

add_theme_support( 'wc-product-gallery-slider' );

/*----------- Edit Woocommerce Images Sizes -----------*/
add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
  return array(
    'width' => 360,
    'height' => 240,
    'crop' => 1,
    );
} );

add_filter( 'woocommerce_get_image_size_single', function( $size ) {
  return array(
    'width' => 550,
    'height' => 320,
    'crop' => 1,
    );
} );


/*----------- Remove unwanted features to turn the shop in catalog mode only -----------*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_filter( 'wc_product_sku_enabled', '__return_false' );
add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

/*----------- Remove defaults main wrappers -----------*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/*----------- Add custom main wrappers -----------*/
function dimack_wrapper_start() {
  echo '<main id="main-wrapper">';
}

function dimack_wrapper_end() {
  echo '</main>';
}

add_action('woocommerce_before_main_content', 'dimack_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'dimack_wrapper_end', 10);

/*----------- Customize default woocommerce breadcrumbs -----------*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

if (!function_exists('dimack_yoast_breadcrumb') ) {
  function dimack_yoast_breadcrumb() {
    yoast_breadcrumb('<div class="breadcrumbs-wrapper"><div class="container"><div class="row"><div class="col-12"><p id="breadcrumbs">','</p></div></div></div></div>');
  }
}

add_action( 'woocommerce_before_main_content','dimack_yoast_breadcrumb', 20, 0);


/*----------- Wrappe the single product page on the theme container -----------*/
function dimack_before_single_product( ) {
  echo '<div class="woo-content-wrapper"><div class="container">';
};

function dimack_after_single_product( ) {
  echo '</div></div>';
};

add_action( 'woocommerce_before_main_content', 'dimack_before_single_product', 30 );
add_action( 'woocommerce_after_main_content', 'dimack_after_single_product', 30 );

/*----------- Display categories on the product loop -----------*/
function dimack_loop_product_cat() {
  echo '<div class="product-details">';
    $terms = get_the_terms( get_the_ID(), 'product_cat' );
    if ( $terms && ! is_wp_error( $terms ) ) :
    //only displayed if the product has at least one category
        $cat_links = array();
        foreach ( $terms as $term ) {
            $cat_links[] = $term->name;
        }
        $on_cat = join( " ", $cat_links );
       echo '<p class="product-cat">' . $on_cat . '</p>';

     endif;
}

add_action( 'woocommerce_shop_loop_item_title', 'dimack_loop_product_cat', 1 );

/*----------- Wrappe the details of the product in the loop -----------*/
function dimack_loop_product_contend_end() {
  echo '</div>';
}

add_action( 'woocommerce_shop_loop_item', 'dimack_loop_product_contend_end', 1 );

/*----------- Display excerpt on the product loop -----------*/
function dimack_excerpt_in_products_loop() {

  global $post;
  $text = $post->post_excerpt;
  $text = mb_strimwidth($text, 0, 120 , '...');

  echo '<div class="excerpt"><p>' . $text . '</p></div>';

}

add_action( 'woocommerce_after_shop_loop_item_title', 'dimack_excerpt_in_products_loop', 40 );


/*----------- Remove default thumbnails from single product page -----------*/
//remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

/*----------- Add custom structure thumnials to the single product page -----------*/
function dimack_show_product_thumbnails() {
  if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
  }
  global $product;
  $attachment_ids = $product->get_gallery_image_ids();
  echo '<div class="product-thumb-wrapper"><div class="row"><div class="col-12">';
  if ( $attachment_ids && $product->get_image_id() ) {
    foreach ( $attachment_ids as $attachment_id ) {
      echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
    }
  }
  echo '</div></div></div>';
}

//add_action( 'woocommerce_after_single_product_summary', 'dimack_show_product_thumbnails', 9 );

/*----------- Remove default images from single product page -----------*/
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

/*----------- Add custom structure images to the single product page -----------*/
function dimack_show_product_images() {
  if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
  }
  global $product;
  $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
  $post_thumbnail_id = $product->get_image_id();
  $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
  'woocommerce-product-gallery',
  'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
  'woocommerce-product-gallery--columns-' . absint( $columns ),
  'images',
  ) );
  ?>
  <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <figure class="woocommerce-product-gallery__wrapper">
      <?php
      if ( $product->get_image_id() ) {
        $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
      } else {
        $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
        $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
        $html .= '</div>';
      }
      echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
      do_action( 'woocommerce_product_thumbnails' );
      ?>
    </figure>
  </div>
  <?php
}
add_action( 'woocommerce_before_single_product_summary', 'dimack_show_product_images', 20 );


/*----------- Add a row from theme grid to the producty page -----------*/
function dimack_before_show_product() {
  echo '<div class="row">';
}
function dimack_after_product_summary() {
  echo '</div>';
}

add_action( 'woocommerce_before_single_product_summary', 'dimack_before_show_product', 10 );

add_action( 'woocommerce_single_product_summary', 'dimack_after_product_summary', 60 );


/*----------- Add 'NEW' status to the producs loop -----------*/
function dimack_new_badge_shop_page() {
   global $product;
   $newness_days = 30;
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="itsnew onsale">' . esc_html__( 'Novo!', 'dimakin' ) . '</span>';
   }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'dimack_new_badge_shop_page', 3 );


/*----------- Add description to products in the archive loop -----------*/
function dimack_archive_page_description($category){
  $cat_id      = $category->term_id;
  $prod_term   = get_term($cat_id,'product_cat');
  $description = $prod_term->description;

  echo '<div class="product-cat-description"><p>', mb_strimwidth( $description, 0, 120, '...' ), '</p></div>';

}
add_action( 'woocommerce_after_subcategory_title', 'dimack_archive_page_description', 10 );

/*----------- Add Button to the product page -----------*/
function dimack_page_products_button() {
  $product_btn_contact_url = get_theme_mod( 'product_btn_contact_url' );
  if ( !empty( $product_btn_contact_url ) ) {
    echo '<a href="' , esc_url($product_btn_contact_url), '" class="primary-btn">', esc_html__('Fale Connosco', 'dimakin') ,'</a>';
  }
}

add_action('woocommerce_single_product_summary', 'dimack_page_products_button', 30);

/*----------- Change number of related products -----------*/

function dimack_change_number_related_products( $args ) {
 $args['posts_per_page'] = 3; // # of related products
 $args['columns'] = 3; // # of columns per row
 return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'dimack_change_number_related_products', 9999 );
