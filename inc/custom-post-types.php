<?php
/*
 * -----------------------------------------------------------
 * Custom Post Types
 * -----------------------------------------------------------
 */

// Register Custom Post Type
function dimakin_cpt() {

  $labels = array(
    'name'                  => _x( 'Produtos', 'Post Type General Name', 'dimakin' ),
    'singular_name'         => _x( 'Produtos', 'Post Type Singular Name', 'dimakin' ),
    'menu_name'             => __( 'Produtos', 'dimakin' ),
    'name_admin_bar'        => __( 'Produtos', 'dimakin' ),
    'archives'              => __( 'Arquivo de Produtos', 'dimakin' ),
    'attributes'            => __( 'Item Attributes', 'dimakin' ),
    'parent_item_colon'     => __( 'Parent Item:', 'dimakin' ),
    'all_items'             => __( 'Todos Produtos', 'dimakin' ),
    'add_new_item'          => __( 'Adicionar Novo Produto', 'dimakin' ),
    'add_new'               => __( 'Adicionar Novo', 'dimakin' ),
    'new_item'              => __( 'Novo Produto', 'dimakin' ),
    'edit_item'             => __( 'Editar Produto', 'dimakin' ),
    'update_item'           => __( 'Actualizar Produto', 'dimakin' ),
    'view_item'             => __( 'Ver Produto', 'dimakin' ),
    'view_items'            => __( 'Ver Produtos', 'dimakin' ),
    'search_items'          => __( 'Procurar Produto', 'dimakin' ),
    'not_found'             => __( 'Nada encontrado', 'dimakin' ),
    'not_found_in_trash'    => __( 'Nada encontrado no Lixo', 'dimakin' ),
    'featured_image'        => __( 'Imagem em Destaque', 'dimakin' ),
    'set_featured_image'    => __( 'Definir Imagem em Destaque', 'dimakin' ),
    'remove_featured_image' => __( 'Remover Imagem em Destaque', 'dimakin' ),
    'use_featured_image'    => __( 'Usar como Imagem em Destaque', 'dimakin' ),
    'insert_into_item'      => __( 'Inserir no Produto', 'dimakin' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'dimakin' ),
    'items_list'            => __( 'Lista de Produtos', 'dimakin' ),
    'items_list_navigation' => __( 'Items list navigation', 'dimakin' ),
    'filter_items_list'     => __( 'Filter items list', 'dimakin' ),
  );
  $rewrite = array(
    'slug'                  => 'produtos',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => false,
  );
  $args = array(
    'label'                 => __( 'Produtos', 'dimakin' ),
    'description'           => __( 'Catalogo de Produtos', 'dimakin' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-cart',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => $rewrite,
    'capability_type'       => 'post',
    'taxonomies' => array('post_tag')
  );

  register_post_type( 'product', $args );

}
add_action( 'init', 'dimakin_cpt', 0 );


function dimakin_flush_rules() {
  dimakin_cpt();
  flush_rewrite_rules();
}

add_action( 'after_setup_theme', 'dimakin_flush_rules');
