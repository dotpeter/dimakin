<?php

if ( ! function_exists( 'dimakin_setup' ) ) :

	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function dimakin_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Twenty Nineteen, use a find and replace
		* to change 'twentynineteen' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'dimakin', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 540, 240, array( 'center', 'center' ) );

		add_image_size( 'post-full-width', 1920, 400, array( 'center', 'center' ) );

		add_image_size( 'post-custom-thumb', 540, 260, array( 'center', 'center' ) );

		add_image_size( 'services-thumb', 455, 300, array( 'center', 'center' ) );

		add_image_size( 'childpage-thumb', 830, 300, array( 'center', 'center' ) );

		add_image_size( 'product-mini', 150, 150, array( 'center', 'center' ) );

		add_image_size( 'product-thumb', 360, 240, array( 'center', 'center' ) );

		add_image_size( 'product-img', 550, 320, array( 'center', 'center' ) );

		add_image_size( 'product-full', 720, 420, array( 'center', 'center' ) );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'main-navigation'      => __( 'Main Menu', 'dimakin' ),
				'secondary-navigation' => __( 'Menu Secondário', 'dimakin' ),
				'mobile-navigation'    => __( 'Mobile Menu', 'dimakin' ),
				'footer-navigation'    => __( 'Footer Menu', 'dimakin' ),
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 421,
				'width'       => 190,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for yoast breadcrumbs.
		add_theme_support( 'yoast-seo-breadcrumbs' );

		//Flush rewrite rules
		flush_rewrite_rules();
	}

endif;

add_action( 'after_setup_theme', 'dimakin_setup' );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/

function dimakin_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Side Bar', 'dimakin' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'dimakin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'dimakin' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'dimakin' ),
			'before_widget' => '<div id="%1$s" class="widget col-xs-12 col-sm-6 col-md-3 col-lg-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Header Widgets', 'dimakin' ),
			'id'            => 'header-1',
			'description'   => __( 'Add widgets here to appear in your header.', 'dimakin' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}

add_action( 'widgets_init', 'dimakin_widgets_init' );


/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width Content width.
*/

function dimakin_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dimakin_content_width', 640 );
}

add_action( 'after_setup_theme', 'dimakin_content_width', 0 );

/**
* Enqueue scripts and styles.
*/

function dimakin_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ! is_admin() ) :
		// Enqueue theme styles
		//wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,700', array(), $theme_version );
		//wp_enqueue_style( 'normalize', get_theme_file_uri( '/assets/css/vendor/normalize.css' ), array(), $theme_version );
		//wp_enqueue_style( 'font-awesome-styles', get_theme_file_uri( '/assets/css/vendor/font-awesome.min.css' ), array(), $theme_version );
		//wp_enqueue_style( 'fancybox-styles', get_theme_file_uri( '/assets/css/vendor/jquery.fancybox.min.css' ), array(), $theme_version );
		//wp_enqueue_style( 'animate-css', get_theme_file_uri( '/assets/css/vendor/animate.css' ), array(), $theme_version );
		//wp_enqueue_style( 'flexslider', get_theme_file_uri( '/assets/css/vendor/flexslider.css' ), array(), $theme_version );
		wp_enqueue_style( 'dimakin-theme-styles', get_theme_file_uri( '/assets/css/main.min.css' ), array(), $theme_version );

		// Enqueue theme scripts
		wp_enqueue_script( 'dimakin-flexslider', get_theme_file_uri( '/assets/js/vendor/jquery.flexslider.js' ), array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'dimakin-fancybox', get_theme_file_uri( '/assets/js/vendor/jquery.fancybox.min.js' ), array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'dimakin-onready-js', get_theme_file_uri( '/assets/js/custom/onready.js' ), array( 'jquery' ), $theme_version, false );
		wp_enqueue_script( 'dimakin-cookie-bar-js', get_theme_file_uri( '/assets/js/custom/cookie-bar.js' ), array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'dimakin-onload-js', get_theme_file_uri( '/assets/js/custom/onload.js' ), array( 'jquery' ), $theme_version, true );

	endif;

}

add_action( 'wp_enqueue_scripts', 'dimakin_scripts' );

/**
* Fix skip link focus in IE11.
*
* This does not enqueue the script because it is tiny and because it is only for IE11,
* thus it does not warrant having an entire dedicated blocking script being loaded.
*
* @link https://git.io/vWdr2
*/
function dimakin_skip_link_focus_fix() {

	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php

}

add_action( 'wp_print_footer_scripts', 'dimakin_skip_link_focus_fix' );

/**
* Enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* Custom template tags for the theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* The woocommerce configuration for the theme.
*/
//require get_template_directory() . '/inc/woocommerce.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Some admin settings.
*/
require get_template_directory() . '/inc/admin.php';

/**
* Add the theme required plugins.
*/
require get_template_directory() . '/inc/plugin-activation.php';


/**
* Add the theme required plugins.
*/
require get_template_directory() . '/inc/custom-metaboxes.php';

/**
* Custom Widgets.
*/
require get_template_directory() . '/inc/widgets.php';


/**
* Custom Post Types.
*/
require get_template_directory() . '/inc/custom-post-types.php';
