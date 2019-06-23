<?php
/*
 * -----------------------------------------------------------
 * Metaboxes for Contacts page.
 * -----------------------------------------------------------
 */

 function dimack_contacts_mb() {
   // Start with an underscore to hide fields from custom fields list
   $prefix = '_dimack_contacts_';
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
   $cmb->add_field( array(
     'name'    => __( 'Titlo da Morada', 'dimakin' ),
     'id'      => $prefix . 'title',
     'type'    => 'text',
   ) );
   $cmb->add_field( array(
     'name'    => __( 'Morada', 'dimakin' ),
     'id'      => $prefix . 'address',
     'type'    => 'textarea_small'
   ) );
   $cmb->add_field( array(
     'name'    => __( 'Numero de Telefone', 'dimakin' ),
     'id'      => $prefix . 'phone',
     'type'    => 'text',
   ) );
   $cmb->add_field( array(
     'name'    => __( 'Endereço de Email', 'dimakin' ),
     'id'      => $prefix . 'email',
     'type'    => 'text_email',
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
 add_action( 'cmb2_admin_init', 'dimack_contacts_mb' );
