<?php
/*
 * -----------------------------------------------------------
 * Custom Metabox for ChildPage Template
 * -----------------------------------------------------------
 */


function dimakin_childpage_extras() {
  $prefix = '_dimakin_childpage_';

  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'extras',
    'title'         => __( 'Detalhes da Página', 'dimakin' ),
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-childs.php' ),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );


  $cmb->add_field( array(
    'name'      	=> __( 'Links para outras páginas', 'dimakin' ),
    'id'        	=> $prefix . 'links',
    'type'      	=> 'post_search_ajax',
    'desc'			=> __( 'Escreva o nome do artigo/página/produto', 'dimakin' ),
    // Optional :
    'limit'      	=> 2, 		// Limit selection to X items only (default 1)
    'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
    'query_args'	=> array(
      'post_type'			=> array( 'page' ),
      'post_status'		=> array( 'publish' ),
      'posts_per_page'	=> -1
    )
  ) );

}
add_action( 'cmb2_init', 'dimakin_childpage_extras' );
