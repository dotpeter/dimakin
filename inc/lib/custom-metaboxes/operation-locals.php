<?php
/*
 * -----------------------------------------------------------
 * Metaboxes for Operations Locals Template.
 * -----------------------------------------------------------
 */

 function dimakin_operations_locals_mb() {
   // Start with an underscore to hide fields from custom fields list
   $prefix = '_dimakin_olocals_';
   /**
   * Initiate the metabox
   */
   $cmb = new_cmb2_box( array(
     'id'            => $prefix . 'mb',
     'title'         => __( 'Locais de Operação', 'dimakin' ),
     'object_types' => array( 'page' ), // post type
     'show_on'      => array( 'key' => 'page-template', 'value' => 'page-operation-locals.php' ),
     'context'       => 'normal',
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
     // 'cmb_styles' => false, // false to disable the CMB stylesheet
     //'closed'     => true, // Keep the metabox closed by default
   ) );

   $cmb->add_field( array(
     'name'    => __( 'Subtitlo da página', 'dimakin' ),
     'id'      => $prefix . 'subtitle',
     'type'    => 'text',
   ) );

   $cmb->add_field( array(
     'name'    => __( 'Descrição', 'dimakin' ),
     'id'      => $prefix . 'description',
     'type'    => 'textarea_small',
   ) );

   $group_field_id = $cmb->add_field( array(
     'id'          => $prefix . 'group',
     'type'        => 'group',
     'description' => __( 'Locais de Operação', 'dimakin' ),
     // 'repeatable'  => false, // use false if you want non-repeatable group
     'options'     => array(
         'group_title'       => __( 'Local de Operação {#}', 'dimakin' ), // since version 1.1.4, {#} gets replaced by row number
         'add_button'        => __( 'Adicionar Novo Local', 'dimakin' ),
         'remove_button'     => __( 'Remover Local', 'dimakin' ),
         'sortable'          => true,
         'closed'         => true, // true to have the groups closed by default
         // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
     ),
   ) );

   $cmb->add_group_field( $group_field_id, array(
    'name' => __('Nome do Local', 'dimakin'),
    'id'   => $prefix . 'title',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'    => __( 'Morada', 'dimakin' ),
    'id'      => $prefix . 'address',
    'type'    => 'textarea_small'
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'    => __( 'Telefone', 'dimakin' ),
    'id'      => $prefix . 'phone',
    'type'    => 'text'
  ) );

  $cmb->add_group_field( $group_field_id, array(
    'name'    => __( 'Código para o Mapa Google', 'dimakin' ),
    'id'      => $prefix . 'map',
    'type'    => 'textarea_code',
  ) );

 }
 add_action( 'cmb2_admin_init', 'dimakin_operations_locals_mb' );
