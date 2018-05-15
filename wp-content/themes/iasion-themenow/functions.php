<?php
/**
 * iasion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iasion
 */

if ( ! function_exists( 'iasion_themenow_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iasion_themenow_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on iasion, use a find and replace
		 * to change 'iasion-themenow' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'iasion-themenow', get_template_directory() . '/languages' );

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
		add_image_size('iasion-themenow-thumb', 1000, 500, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'iasion-themenow' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'iasion_themenow_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'iasion_themenow_setup' );


//change text to reply button on comment form
function iasion_themenow_comment_reply_text( $link ) {
$link = str_replace( 'Reply', 'Respond', $link );
return $link;
}
add_filter( 'comment_reply_link', 'iasion_themenow_comment_reply_text' );


//change text to leave a reply on comment form
function iasion_themenow_comment_reform ($arg) {
$arg['title_reply'] = esc_html__('Leave your Comment','iasion-themenow');
return $arg;
}
add_filter('comment_form_defaults','iasion_themenow_comment_reform');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iasion_themenow_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'iasion_themenow_content_width', 640 );
}
add_action( 'after_setup_theme', 'iasion_themenow_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iasion_themenow_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'iasion-themenow' ),
		'id'            => 'iasion-blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'iasion-themenow' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Project Sidebar', 'iasion-themenow' ),
		'id'            => 'iasion_project_sidebar',
		'description'   => esc_html__( 'Add project sidebar here.', 'iasion-themenow' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
         'name'         =>esc_html__('Footer Widget','iasion-themenow'),
         'id'           =>'iasion_themenow_footer',
         'description'  =>esc_html__('Add footer widget here','iasion-themenow'),
         'before_widget'=>'<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
		));
}
add_action( 'widgets_init', 'iasion_themenow_widgets_init' );

/*footer widget*/

function iasion_footer_widgets_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'iasion_themenow_footer' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        if($sidebar_widgets == 2) {
            $footer_wid_width_markup = 'col-xs-12 col-sm-6';
        } elseif($sidebar_widgets == 3) {
            $footer_wid_width_markup = 'col-md-4 col-xs-12 col-sm-6';
        }  elseif($sidebar_widgets == 4) {
            $footer_wid_width_markup = 'col-md-3 col-xs-12 col-sm-6';
        }  elseif($sidebar_widgets == 5) {
            $footer_wid_width_markup = 'col-md-3 col-xs-12 col-sm-6';
        }  elseif($sidebar_widgets == 6) {
            $footer_wid_width_markup = 'col-md-2 col-xs-12 col-sm-6';
        } else {
            $footer_wid_width_markup = 'col-md-12';
        }

        $params[0]['before_widget'] = str_replace('class="', 'class="'.esc_attr($footer_wid_width_markup).' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','iasion_footer_widgets_params');

/**
 * Enqueue scripts and styles.
 */
function iasion_themenow_scripts() {
    
    wp_enqueue_style('iasion-themenow-default',get_template_directory_uri() . '/assets/css/default.css', array(), '1.0');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '3.5.1' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0.10' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7' );

	wp_enqueue_style( 'iasion-themenow-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'iasion-themenow-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'iasion_themenow_scripts' );

/*Required Files*/

require get_template_directory() . '/inc/cs-framework/cs-framework.php';
require get_template_directory() . '/inc/metabox-and-options.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-style.php';



/**
* TGMPA Plugin Activation
*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'iasion_themenow_register_required_plugins' );


function iasion_themenow_register_required_plugins() {

	$plugins = array(

		array(
			'name'      			=> esc_html__('Contact Form 7', 'iasion-themenow'),
			'slug'      			=> 'contact-form-7',
			'version'				=> '4.6.1',
			'required'     		    => false
		),
		array(
			'name'      			=> esc_html__('WPBakery Visual Composer', 'iasion-themenow'),
			'slug'      			=> 'js_composer',
			'source'				=> get_template_directory(). '/inc/plugin/js_composer.zip',
			'version'				=> '5.4.5',
			'required'     		    => true
		),
		array(
			'name'      			=> esc_html__('iasion Toolkit', 'iasion-themenow'),
			'slug'      			=> 'iasion-toolkit',
			'source'				=> get_template_directory(). '/inc/plugin/iasion-toolkit.zip',
			'version'				=> '1.0',
			'required'     		    => true
		),

	);
    
	$config = array(
		'id'           => 'iasion-themenow',
		'default_path' => '',
		'menu'         => 'iasion-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '', 
	);

	tgmpa( $plugins, $config );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

