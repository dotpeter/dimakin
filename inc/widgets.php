<?php
/*
 * -----------------------------------------------------------
 * Custom Widgets
 * -----------------------------------------------------------
 */

require_once ('widgets/contacts-widget.php');

function dimakin_widgets() {
	register_widget( 'dimakinContactsWidget' );
}
add_action( 'widgets_init', 'dimakin_widgets' );
