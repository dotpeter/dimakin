<?php
/*
* -----------------------------------------------------------
* Creat custom metabox for products.
* -----------------------------------------------------------
*/
function dimakin_product_extras() {
  $prefix = '_dimakin_products_';

  $cmb = new_cmb2_box( array(
    'id'            => $prefix , 'extras',
    'title'         => __( 'Detalhes do Produto', 'dimakin' ),
    'object_types'  => array( 'product' ),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );

  $cmb->add_field( array(
    'name' => __( 'Marcar produto como novo?', 'dimakin' ),
    'desc' => __( 'Clique na caixa se desejar que este produto seja marcado como novo', 'dimakin' ),
    'id'   => $prefix , 'isnew',
    'type' => 'checkbox',
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Catálogo do Produto', 'dimakin' ),
    'desc'    => __( 'Faça upload de um pdf ou insira um URL.', 'dimakin' ),
    'id'      => $prefix , 'catalog',
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
}
add_action( 'cmb2_init', 'dimakin_product_extras' );
