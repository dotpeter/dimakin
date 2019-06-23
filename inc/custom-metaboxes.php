<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/lib/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/lib/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/lib/CMB2/init.php';
}

require_once dirname( __FILE__ ) . '/lib/cmb2-field-post-search-ajax-master/cmb-field-post-search-ajax.php';

require_once dirname( __FILE__ ) . '/lib/custom-metaboxes/metaboxes.php';
