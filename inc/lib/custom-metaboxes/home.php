<?php
/*
 * -----------------------------------------------------------
 * Metaboxes for Home page.
 * -----------------------------------------------------------
 */

 if ( ! function_exists('dimakin_home_services') ) {
   function dimakin_home_services() {
   	$prefix = '_dimakin_home_';
   	/**
   	 * Initiate the metabox
   	 */
   	$cmb = new_cmb2_box( array(
   			'id'            => $prefix . 'services',
   			'title'         => __( 'Serviçoss', 'dimakin' ),
   			'object_types'  => array( 'page', ), // Post type
         'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
   			'context'       => 'normal',
   			'priority'      => 'high',
   			'show_names'    => true, // Show field names on the left
   			// 'cmb_styles' => false, // false to disable the CMB stylesheet
   			// 'closed'     => true, // Keep the metabox closed by default
   	) );
     //start group field
     $group_field_id = $cmb->add_field( array(
       'id'          => $prefix . 'group',
       'type'        => 'group',
       'description' => __( 'Adicionar Serviço', 'dimakin' ),
       // 'repeatable'  => false, // use false if you want non-repeatable group
       'options'     => array(
           'group_title'   => __( 'Serviço {#}', 'dimakin' ), // since version 1.1.4, {#} gets replaced by row number
           'add_button'    => __( 'Adicionar Serviço', 'dimakin' ),
           'remove_button' => __( 'Remover Serviço', 'dimakin' ),
           'sortable'      => true, // beta
           'closed'     => true, // true to have the groups closed by default
         ),
     ) );
     // Id's for group's fields only need to be unique for the group. Prefix is not needed.
     $cmb->add_group_field( $group_field_id, array(
         'name' => __( 'Titlo do Serviços', 'dimakin' ),
         'description' => __( 'Insira aqui o titulo do serviço', 'dimakin' ),
         'id'   => $prefix . 'title',
         'type' => 'text',
     ) );
     $cmb->add_group_field( $group_field_id, array(
         'name' => __( 'URL', 'dimakin' ),
         'description' => __( 'Insira aqui o link de destino.', 'dimakin' ),
         'id'   => $prefix . 'url',
         'type' => 'text_url',
     ) );
     $cmb->add_group_field( $group_field_id, array(
         'name' => __( 'Imagem de Fundo', 'dimakin' ),
         'description' => __( 'Insira aqui a imagem de fundo do serviço.', 'dimakin' ),
         'id'   => $prefix . 'image',
         'type' => 'file',
     ) );
   }
   add_action( 'cmb2_init', 'dimakin_home_services' );
 }
