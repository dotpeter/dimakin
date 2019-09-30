<?php
/*
 * -----------------------------------------------------------
 * Metaboxes for Contacts page.
 * -----------------------------------------------------------
 */

 function dimakin_contacts_mb() {
   // Start with an underscore to hide fields from custom fields list
   $prefix = '_dimakin_contacts_';
   /**
   * Initiate the metabox
   */
   $cmb = new_cmb2_box( array(
     'id'            => $prefix . 'mb',
     'title'         => __( 'Definições da Página de Contactos', 'dimakin' ),
     'object_types' => array( 'page' ), // post type
     'show_on'      => array( 'key' => 'page-template', 'value' => 'page-contacts.php' ),
     'context'       => 'normal',
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
     // 'cmb_styles' => false, // false to disable the CMB stylesheet
     // 'closed'     => true, // Keep the metabox closed by default
   ) );
   $cmb->add_field( array(
     'name'    => __( 'Contacts page description', 'dimakin' ),
     'id'      => $prefix . 'desc',
     'type'    => 'textarea_small'
   ) );
   //start group field
    $group_field_id = $cmb->add_field( array(
     'id'          => $prefix . 'address_group',
     'type'        => 'group',
     'description' => __( 'Adicionar Morada', 'dimakin' ),
     // 'repeatable'  => false, // use false if you want non-repeatable group
     'options'     => array(
         'group_title'   => __( 'Morada {#}', 'dimakin' ), // since version 1.1.4, {#} gets replaced by row number
         'add_button'    => __( 'Adicionar Morada', 'dimakin' ),
         'remove_button' => __( 'Remover Morada', 'dimakin' ),
         'sortable'      => true, // beta
         'closed'     => true, // true to have the groups closed by default
       ),
    ) );
    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
       'name' => __( 'Titlo da Morada', 'dimakin' ),
       'id'   => $prefix . 'address_title',
       'type' => 'text',
    ) );
    $cmb->add_group_field( $group_field_id, array(
       'name' => __( 'Morada', 'dimakin' ),
       'id'   => $prefix . 'address_address',
       'type' => 'wysiwyg',
    ) );
    $cmb->add_group_field( $group_field_id, array(
       'name' => __( 'Telefone', 'dimakin' ),
       'id'   => $prefix . 'address_phone',
       'type' => 'text',
    ) );
    $cmb->add_group_field( $group_field_id, array(
       'name' => __( 'Email', 'dimakin' ),
       'id'   => $prefix . 'address_email',
       'type' => 'text_email',
    ) );

   $cmb->add_field( array(
     'name'    => __( 'Shortcode do Formulário', 'dimakin' ),
     'id'      => $prefix . 'shortcode',
     'type'    => 'text',
   ) );
   $cmb->add_field( array(
     'name'    => __( 'Código para o Mapa Google', 'dimakin' ),
     'id'      => $prefix . 'map',
     'type'    => 'textarea_code',
   ) );
 }
 add_action( 'cmb2_admin_init', 'dimakin_contacts_mb' );
