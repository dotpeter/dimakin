<?php
/*
 * -----------------------------------------------------------
 * Metaboxes for Jobs page.
 * -----------------------------------------------------------
 */

 if ( ! function_exists('dimakin_jobs') ) {
   function dimakin_jobs() {
   	$prefix = '_dimakin_jobs_';
   	/**
   	 * Initiate the metabox
   	 */
   	$cmb = new_cmb2_box( array(
   			'id'            => $prefix . 'jobs',
   			'title'         => __( 'Ofertas de Trabalho', 'dimakin' ),
   			'object_types'  => array( 'page', ), // Post type
         'show_on'      => array( 'key' => 'page-template', 'value' => 'page-jobs.php' ),
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
       'description' => __( 'Adicionar Oferta', 'dimakin' ),
       // 'repeatable'  => false, // use false if you want non-repeatable group
       'options'     => array(
           'group_title'   => __( 'Oferta {#}', 'dimakin' ), // since version 1.1.4, {#} gets replaced by row number
           'add_button'    => __( 'Adicionar Oferta', 'dimakin' ),
           'remove_button' => __( 'Remover Oferta', 'dimakin' ),
           'sortable'      => true, // beta
           'closed'     => true, // true to have the groups closed by default
         ),
     ) );
     // Id's for group's fields only need to be unique for the group. Prefix is not needed.
     $cmb->add_group_field( $group_field_id, array(
         'name' => __( 'Titlo da Oferta', 'dimakin' ),
         'description' => __( 'Insira aqui o titulo do serviço', 'dimakin' ),
         'id'   => $prefix . 'title',
         'type' => 'text',
     ) );
     $cmb->add_group_field( $group_field_id, array(
         'name' => __( 'Descrição', 'dimakin' ),
         'description' => '',
         'id'   => $prefix . 'desc',
         'type' => 'wysiwyg',
     ) );

    $cmb->add_field( array(
      'name'    => __( 'Link para o formulário', 'dimakin' ),
      'id'      => $prefix . 'url',
      'type'    => 'text',
    ) );

   }
   add_action( 'cmb2_init', 'dimakin_jobs' );
 }
