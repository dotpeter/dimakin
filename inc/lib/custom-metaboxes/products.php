<?php
/*
* -----------------------------------------------------------
* Creat custom metabox for products.
* -----------------------------------------------------------
*/
function dimakin_product_extras() {
  $prefix = '_dimakin_products_';

  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'extras',
    'title'         => __( 'Detalhes do Produto', 'dimakin' ),
    'object_types'  => array( 'product' ),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );

  $cmb->add_field( array(
    'name' => __( 'Marcar produto como novo?', 'dimakin' ),
    'desc' => __( 'Clique na caixa se desejar que este produto seja marcado como novo', 'dimakin' ),
    'id'   => $prefix . 'isnew',
    'type' => 'checkbox',
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Catálogo do Produto', 'dimakin' ),
    'desc'    => __( 'Faça upload de um pdf ou insira um URL.', 'dimakin' ),
    'id'      => $prefix . 'catalog',
    'type'    => 'file',
    'options' => array(
      'url' => true, // Hide the text input for the url
    ),
    'text'    => array(
      'add_upload_file_text' => 'Adicionar Ficheiro' // Change upload button text. Default: "Add or Upload File"
    ),
    // query_args are passed to wp.media's library query.
    'query_args' => array(
      'type' => 'application/pdf', // Make library only display PDFs.
    ),
  ) );

  $cmb->add_field( array(
    'name'      	=> __( 'Artigos Recomendados', 'dimakin' ),
    'id'        	=> $prefix . 'recommendation',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( 'Escreva o nome do artigo/página/produto', 'dimakin' ),
    // Optional :
    'limit'      	=> 3, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
      'post_type'			=> array( 'post', 'page', 'product' ),
      'post_status'		=> array( 'publish' ),
      'posts_per_page'	=> -1
    )
  ) );

  $group_field_id = $cmb->add_field( array(
    'id'          => $prefix . 'video_group',
    'type'        => 'group',
    'description' => __( 'Adicione os videos', 'dimakin' ),
    'repeatable'  => true, // use false if you want non-repeatable group
    'options'     => array(
      'group_title'       => __( 'Video {#}', 'dimakin' ), // since version 1.1.4, {#} gets replaced by row number
      'add_button'        => __( 'Adicionar Video', 'dimakin' ),
      'remove_button'     => __( 'Remover Video', 'dimakin' ),
      'sortable'          => true,
      'closed'         => true, // true to have the groups closed by default
      // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before   removing group.
    ),
  ) );

  // Id's for group's fields only need to be unique for the group. Prefix is not needed.
  $cmb->add_group_field( $group_field_id, array(
    'name' => 'oEmbed',
    'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
    'id'   => $prefix . 'video',
    'type' => 'oembed',
  ) );

}
add_action( 'cmb2_init', 'dimakin_product_extras' );
