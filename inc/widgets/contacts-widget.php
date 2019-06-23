<?php
/*
 * -----------------------------------------------------------
 * Contacts Widget
 * -----------------------------------------------------------
 */

class dimackContactsWidget extends WP_Widget {

  /*----------- Register widget with wordpress -----------*/
  function __construct() {
    parent::__construct(
      'dimack_contacts_widget',
      esc_html__('Contactos', 'dimakin'),
      array( 'description' => esc_html__('Os seus contactos', 'dimakin'), )
    );
  }

  /*----------- Front-end display of widget -----------*/
  public function widget($args, $instance) {

    echo $args['before_widget'];

    if( !empty($instance['title']) ) {
      echo $args['before_title'] , apply_filters( 'widget_title', $instance['title'] ) , $args['after_title'];
    }

    $widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $text = apply_filters( 'widget_text', $widget_text, $instance, $this );

    echo '<ul>';

    if(!empty($instance['text'])) {
      echo '<li><div class="icon-box"><i class="fa fa-map-marker" aria-hidden="true"></i></div><div class="contact-block"><p>' , !empty($instance['filter']) ? wpautop($text) : $text , '</p></div></li>';
    }
    if(!empty($instance['phone'])) {
      echo '<li><div class="icon-box"><i class="fa fa-phone" aria-hidden="true"></i></div><div class="contact-block"><p><span>', esc_html__('Telefone', 'dimakin') , '</span>' , esc_html($instance['phone']) , '</p></div></li>';
    }
    if(!empty($instance['fax'])) {
      echo '<li><div class="icon-box"><i class="fa fa-fax" aria-hidden="true"></i></div><div class="contact-block"><p><span>', esc_html__('Fax', 'dimakin') , '</span>' , esc_html($instance['fax']) , '</p></div></li>';
    }
    if (!empty($instance['email'])) {
      echo '<li><div class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></div><div class="contact-block"><p><span><a href="mailto:', esc_attr($instance['email']) , '" target="_blank">' , esc_html($instance['email']) , '</a></span></p></div></li>';
    }
    if (!empty($instance['gps'])) {
      echo '<li><div class="icon-box"><i class="fa fa-road" aria-hidden="true"></i></div><div class="contact-block"><p><span>' , esc_html__( 'GPS', 'dimakin' ) , '</span>' ,  esc_html($instance['gps']) , '</p></div></li>';
    }

    echo '</ul>';
    echo $args['after_widget'];

  }

  /*----------- Back-end widget form -----------*/
  public function form($instance) {

    $instance = wp_parse_args((array) $instance, array( 'text' => '' ));
    $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Novo titlo', 'dimakin');
    $filter = isset($instance['filter']) ? $instance['filter'] : 0;

    // Titlo
    echo '<p><label for="' , esc_attr($this->get_field_id('title')) , '">' , esc_html__('Titlo', 'dimakin') , '</label><input class="widefat" id="' , esc_attr($this->get_field_id('title')) , '" name="' , esc_attr($this->get_field_name('title')) , '" type="text" value="' , esc_attr($title) , '"></p>';

    // Morada
    $text = !empty( $instance['text']) ? $instance['text'] : esc_html__('Morada', 'dimakin');
    echo '<p><label for="' , $this->get_field_id('text') , '">' , esc_html__('Morada', 'dimakin') , '</label><textarea class="widefat" rows="6" cols="6" id="' , $this->get_field_id('text') , '" name="' , $this->get_field_name('text') , '">' , esc_textarea($instance['text']) , '</textarea></p>';

    echo '<p><input id="' , $this->get_field_id('filter') , '" name="' , $this->get_field_name('filter') , '" type="checkbox"' , checked($filter) , '/>&nbsp;<label for="' , $this->get_field_id('filter') , '">' , esc_html__('Adicionar automáticamente parágrafos', 'dimakin') , '</label></p>';

    // Telefone
    $phone = !empty($instance['phone']) ? $instance['phone'] : esc_html__('Telefone', 'dimakin');
    echo '<p><label for="' , esc_attr($this->get_field_id('phone')) , '">' , esc_html__('Telefone', 'dimakin') , '</label><input class="widefat" id="' , esc_attr($this->get_field_id('phone')) , '" name="' , esc_attr($this->get_field_name('phone')) , '" type="text" value="' , esc_attr($phone) ,'"></p>';

    // Fax
    $fax = !empty($instance['fax']) ? $instance['fax'] : esc_html__('Fax:', 'dimakin');
    echo '<p><label for="' , esc_attr($this->get_field_id('fax')) , '">' , esc_html__('Fax', 'dimakin') , '</label><input class="widefat" id="' , esc_attr($this->get_field_id('fax') ) , '" name="' , esc_attr($this->get_field_name('fax')) , '" type="text" value="' , esc_attr($fax) ,'"></p>';

    // Email
    $email = !empty($instance['email']) ? $instance['email'] : esc_html__('Email', 'dimakin');
    echo '<p><label for="' , esc_attr($this->get_field_id('email')) , '">' , esc_html__('Email', 'dimakin') , '</label><input class="widefat" id="' , esc_attr($this->get_field_id('email')) , '" name="' , esc_attr($this->get_field_name('email')) , '" type="email" value="' , esc_attr( $email ) , '"></p>';

    // GPS
    $gps = !empty($instance['gps']) ? $instance['gps'] : esc_html__('As suas coordenadas GPS', 'dimakin');
    echo '<p><label for="' , esc_attr($this->get_field_id('gps')) , '">' , esc_html__('GPS', 'dimakin') , '</label><input class="widefat" id="' , esc_attr($this->get_field_id('gps')) , '" name="' , esc_attr($this->get_field_name('gps')) , '" type="text" value="' , esc_attr($gps) , '"></p>';

  }

  /*----------- Sanitize widget form values as they are saved -----------*/
  public function update( $new_instance, $old_instance ) {

    $instance = array();
    if ( current_user_can( 'unfiltered_html' ) ) {
      $instance['text'] = $new_instance['text'];
    } else {
      $instance['text'] = wp_kses_post( $new_instance['text'] );
    }
    $instance['filter'] = !empty( $new_instance['filter']);
    $instance['title'] = (!empty( $new_instance['title'])) ? strip_tags( $new_instance['title']) : '';
    $instance['phone'] = (!empty( $new_instance['phone'])) ? strip_tags( $new_instance['phone']) : '';
    $instance['fax'] = (!empty( $new_instance['fax'])) ? strip_tags( $new_instance['fax']) : '';
    $instance['email'] = (!empty( $new_instance['email'])) ? strip_tags( $new_instance['email']) : '';
    $instance['gps'] = (!empty( $new_instance['gps'])) ? strip_tags( $new_instance['gps']) : '';

    return $instance;

  }

}
