<?php
/*
 * -----------------------------------------------------------
 * Template for Woocommerce Product Page
 * -----------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
}

$product_contact_form = get_theme_mod( 'product_btn_contact_form' );

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

?>
<main class="main-wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="product-content-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6">
						<?php get_template_part( 'template-parts/products/product', 'gallery' ); ?>
					</div>
					<div class="col-12 col-md-6">
						<div class="product-details">
							<h1 class="product-title"><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<div class="product-actions">
								<a class="primary-btn" data-fancybox data-src="#product-buttons__modal-form" href="#product-buttons__modal-form" >
									<i class="fa fa-comments-o" aria-hidden="true"></i>
									<?php esc_html_e( 'Fale Connosco', 'dimakin' ); ?>
								</a>
								<div style="display: none;" id="product-buttons__modal-form">
									<div id="modal-form">
										<p class="modal-form__title"><?php esc_html_e( 'Obtenha mais informações sobre o produto.', 'dimakin' ); ?></p>
										<?php echo do_shortcode( $product_contact_form ); ?>
									</div><!-- #more-info-form-wrapper -->
								</div><!-- #hidden-form -->
								<?php
								$pdf = wp_get_attachment_url( get_post_meta( get_the_ID(), '_dimakin_products_catalog_id', true ) );
								if(!empty($pdf)) {
									echo '<a href="', esc_url($pdf) , '" class="secondary-btn" target="_blank"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> ' , __( 'Catálogo', 'dimakin' ) , '</a>';
								}
								?>
							</div><!-- product-actions -->
							<?php
								$productsTags = get_the_terms( get_the_ID(), 'post_tag' );
								if ( $productsTags && ! is_wp_error( $productsTags ) ) {
										echo '<p class="product-tags"><i class="fa fa-tags" aria-hidden="true"></i><strong>', __('Tags: ', 'dimakin') ,'</strong>';
										foreach ($productsTags as $tag) {
												$tagTitle = $tag->name; // tag name
												$tag_link = get_term_link( $tag );// tag archive link
												echo '<span><a href="', $tag_link ,'">', $tagTitle ,'</a></span>';
										}
										echo '</p>';
								}
							?>
						</div><!-- product-details -->
					</div><!-- col -->
				</div><!-- row -->
				<?php
				$product_full_description = get_post_meta( get_the_ID(), '_dimakin_products_fulltext', true );
				if ( $product_full_description ) : 
					?>
					<div class="row">
						<div class="col-12">
						<?php
							echo wp_kses_post( wpautop( $product_full_description ) );
						?>
						</div><!-- col -->
					</div><!-- row -->
					<?php
				endif;
				?>
			</div><!-- container -->
		</div><!-- product-content-wrapper -->
		<?php get_template_part( 'template-parts/products/product', 'videos' ); ?>
		<?php get_template_part( 'template-parts/products/product', 'recommendations' ); ?>
	</article><!-- article -->
</main><!-- main-wrapper -->
<?php
endwhile;
endif;
get_footer();
