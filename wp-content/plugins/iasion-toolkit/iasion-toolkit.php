<?php
/*
Plugin Name: Iasion Toolkit
Plugin URI: http://rashedamins.com
Author: ThemeNow
Author URI:http://www.rashedamins.com/
Version: 1.0
Description: This plugin required for Iasion WP theme
textdomain: iasion-themenow
*/

if( !defined('ABSPATH')){
	exit; // Exit if accessed directly
}


//translate direction

load_plugin_textdomain( 'iasion-themenow', false, dirname(plugin_basename(__FILE__)) . '/languages/' );

// Defines
define( 'IASION_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'IASION_ACC_PATH', plugin_dir_path( __FILE__ ) );


// iasion toolkit files
function iasion_themenow_toolkit_files(){
    
    wp_enqueue_script("jquery-effects-core", array('jquery'),'20120206', true);
    wp_enqueue_style('nivo-lightbox-style', plugin_dir_url( __FILE__ ) .'assets/css/nivo-lightbox.css');
    wp_enqueue_style('owl-carousel', plugin_dir_url( __FILE__ ) .'assets/css/owl.carousel.css');
    wp_enqueue_style('jquery-magnific', plugin_dir_url( __FILE__ ) .'assets/css/magnific-popup.css');
    wp_enqueue_style('iasion-toolkit-css', plugin_dir_url( __FILE__ ) .'assets/css/iasion-toolkit.css');
    wp_enqueue_style('nice-select', plugin_dir_url( __FILE__ ) . 'assets/css/nice-select.css');
    wp_enqueue_style('rhinoslider_style', plugin_dir_url( __FILE__ ) . 'assets/css/rhinoslider-1.05.css');
    wp_enqueue_script( 'jquery-counter', plugin_dir_url( __FILE__) . 'assets/js/jquery.counterup.js', array('jquery'),'20120206', true);
    wp_enqueue_script( 'nice-select', plugin_dir_url( __FILE__) . 'assets/js/jquery.nice-select.js', array('jquery'),'20120206', true);
    wp_enqueue_script( 'iasion-toolkit-js', plugin_dir_url( __FILE__) . 'assets/js/toolkit.js', array('jquery'),'20120206', true);
    wp_enqueue_script( 'waypoints', plugin_dir_url( __FILE__) . 'assets/js/waypoints.min.js', array('jquery'),'20120206', true);
    wp_enqueue_script( 'owl-carousel', plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'jquery-magnific', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.magnific-popup.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'gmap3', plugin_dir_url( __FILE__) . 'assets/js/gmap3.min.js', array('jquery'),'20120206', true);
    wp_enqueue_script( 'jquery-isotope', plugin_dir_url( __FILE__ ) . 'assets/js/isotope-3.0.4.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'rhinoslider', plugin_dir_url( __FILE__ ) . 'assets/js/rhinoslider-1.05.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'easing', plugin_dir_url( __FILE__ ) . 'assets/js/easing.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'mousewheel', plugin_dir_url( __FILE__ ) . 'assets/js/mousewheel.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'nivo-lightbox', plugin_dir_url( __FILE__ ) . 'assets/js/nivo-lightbox.js', array('jquery'), '20120206', true );
}
add_action('wp_enqueue_scripts', 'iasion_themenow_toolkit_files');


// slider

function iasion_toolkit_get_slides_as_list( ) {

    $args = wp_parse_args( array(
        'post_type'   => 'slide',
        'numberposts' => -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select slide --', 'iasion-themenow')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }

    return $post_options;
}

// service

function iasion_toolkit_get_page_as_list( ) {

    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select Page --', 'iasion-themenow')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }

    return $post_options;
}


//Posts

function iasion_toolkit_get_post_taxonomies_as_list( ) {


    $post_categories = get_terms( 'category' );

    $post_category_options = array(esc_html__('All category', 'iasion-themenow')=>'');
    if ( $post_categories ) {
        foreach ( $post_categories as $post_category ) {
            $post_category_options[ $post_category->name ] = $post_category->term_id;
        }
    }

    return $post_category_options;
}


function iasion_toolkit_get_testimonial_as_list(){ 
   
    $args = wp_parse_args(array(
    'post_type' => 'testimonial',
    'numberposts' => -1,
    ));
   
    $posts = get_posts ( $args );
   
    $post_options = array(esc_html__('-- Select testimonial --', 'iasion-themenow')=>'');
    if( $posts ){
        foreach ( $posts as $post){
            $post_options[ $post->post_title ] = $post->ID;
        }
    }
    return $post_options;
}


// Register Custom taxonomy

function iasion_toolkit_custom_post_taxonomy() {
    register_taxonomy(
        'project_cat',  
        'project',                  
        array(
            'hierarchical'          => true,
            'label'                 => 'Project Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'project-category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'iasion_toolkit_custom_post_taxonomy');



function iasion_toolkit_projectcat_as_list( ) {


    $project_categories = get_terms( 'project_cat' );

    $project_category_options = array(esc_html__('All category', 'iasion-themenow')=>'');
    if ( $project_categories ) {
        foreach ( $project_categories as $project_category ) {
            $project_category_options[ $project_category->name ] = $project_category->term_id;
        }
    }

    return $project_category_options;
}


add_action( 'init', 'iasion_toolkit_custom_post' );
function iasion_toolkit_custom_post() {

    $labelsslide = array(
        'name'               => esc_html__( 'Slides', 'iasion-themenow' ),
        'singular_name'      => esc_html__( 'Slide', 'iasion-themenow' ),
        'menu_name'          => esc_html__( 'Slides', 'iasion-themenow' ),
        'name_admin_bar'     => esc_html__( 'Slides', 'iasion-themenow' ),
        'add_new'            => esc_html__( 'Add New Slide', 'iasion-themenow' ),
        'add_new_item'       => esc_html__( 'Add New Slide', 'iasion-themenow' ),
        'new_item'           => esc_html__( 'New Slide', 'iasion-themenow' ),
        'edit_item'          => esc_html__( 'Edit Slide', 'iasion-themenow' ),
        'view_item'          => esc_html__( 'View Slides', 'iasion-themenow' ),
        'all_items'          => esc_html__( 'All Slides', 'iasion-themenow' ),
        'search_items'       => esc_html__( 'Search Slides', 'iasion-themenow' ),
        'parent_item_colon'  => esc_html__( 'Parent Slides:', 'iasion-themenow' ),
        'not_found'          => esc_html__( 'No Slides found.', 'iasion-themenow' ),
        'not_found_in_trash' => esc_html__( 'No Slides found in Trash.', 'iasion-themenow' )
    );

    $argsslide = array(
        'labels'             => $labelsslide,
        'description'        => esc_html__( 'Add your Slides', 'iasion-themenow' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-shield-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes')
    );

    $labelstestimonial = array(
        'name'               => esc_html__( 'Testimonials', 'iasion-themenow' ),
        'singular_name'      => esc_html__( 'Testimonial', 'iasion-themenow' ),
        'menu_name'          => esc_html__( 'Testimonials', 'iasion-themenow' ),
        'name_admin_bar'     => esc_html__( 'Testimonials', 'iasion-themenow' ),
        'add_new'            => esc_html__( 'Add New Testimonial', 'iasion-themenow' ),
        'add_new_item'       => esc_html__( 'Add New Testimonial', 'iasion-themenow' ),
        'new_item'           => esc_html__( 'New Testimonial', 'iasion-themenow' ),
        'edit_item'          => esc_html__( 'Edit Testimonial', 'iasion-themenow' ),
        'view_item'          => esc_html__( 'View Testimonials', 'iasion-themenow' ),
        'all_items'          => esc_html__( 'All Testimonials', 'iasion-themenow' ),
        'search_items'       => esc_html__( 'Search Testimonials', 'iasion-themenow' ),
        'parent_item_colon'  => esc_html__( 'Parent Testimonials:', 'iasion-themenow' ),
        'not_found'          => esc_html__( 'No Testimonials found.', 'iasion-themenow' ),
        'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash.', 'iasion-themenow' )
    );

    $argstestimonial = array(
        'labels'             => $labelstestimonial,
        'description'        => esc_html__( 'Add your Slides', 'iasion-themenow' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-shield-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes')
    );
    
    $labels = array(
        'name'               => esc_html__( 'Projects', 'iasion-themenow' ),
        'singular_name'      => esc_html__( 'Project', 'iasion-themenow' ),
        'menu_name'          => esc_html__( 'Projects', 'iasion-themenow' ),
        'name_admin_bar'     => esc_html__( 'Projects', 'iasion-themenow' ),
        'add_new'            => esc_html__( 'Add New Project', 'iasion-themenow' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'iasion-themenow' ),
        'new_item'           => esc_html__( 'New Project', 'iasion-themenow' ),
        'edit_item'          => esc_html__( 'Edit Project', 'iasion-themenow' ),
        'view_item'          => esc_html__( 'View Projects', 'iasion-themenow' ),
        'all_items'          => esc_html__( 'All Projects', 'iasion-themenow' ),
        'search_items'       => esc_html__( 'Search Projects', 'iasion-themenow' ),
        'parent_item_colon'  => esc_html__( 'Parent Projects:', 'iasion-themenow' ),
        'not_found'          => esc_html__( 'No Projects found.', 'iasion-themenow' ),
        'not_found_in_trash' => esc_html__( 'No Projects found in Trash.', 'iasion-themenow' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => esc_html__( 'Add your projects..', 'iasion-themenow' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-shield-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

   register_post_type( 'slide', $argsslide); //Register Post Type Slides
   register_post_type( 'project', $args); //Register Post Type Projects
   register_post_type( 'testimonial', $argstestimonial); //Register Post Type Testimonials
}


// Shortcode on widgets
add_filter('widget_text', 'do_shortcode');

// Loading Visual Composer blocks
require_once( IASION_ACC_PATH . 'vc-blocks/vc-blocks-load.php' );

// Theme shortcodes
require_once( IASION_ACC_PATH . 'theme-shortcodes/section-title-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/slides-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/service-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/button-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/counter-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/testimonials-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/posts-block-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/logo-carousel-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/cta-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/projects-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/process-box-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/google-map-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/social-link-logo-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/pricing-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/video-popup-shortcode.php' );
require_once( IASION_ACC_PATH . 'theme-shortcodes/feature-shortcode.php' );



// Shortcodes depended on Visual Composer
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('js_composer/js_composer.php')){
    require_once( IASION_ACC_PATH . 'theme-shortcodes/staff-shortcode.php' );
}

if ( ! function_exists( 'iasion_share_post' ) ) {
    function iasion_share_post(){ 
        $share_html = '';
        $share_html .= '<div class="share">';
        $share_html .= '<div class="social-share">
                            <ul class="list-inline">
                                    <li>
                                        <a class="facebook share_fb" href="//www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'&amp;t='.rawurlencode( get_the_title() ).'" title="'.esc_attr( 'Share on Facebook!', 'iasion-themenow' ).'" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter share_tt " href="//twitter.com/home?status='.rawurlencode( sprintf( esc_html__( 'Reading: %s', 'iasion-themenow' ), get_the_permalink() ) ).'" title="'.esc_attr( 'Share on Twitter!', 'iasion-themenow' ).'" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus share_gp" href="//plus.google.com/share?url='.rawurlencode( get_the_permalink() ).'" title="'.esc_attr( 'Share on Google+!', 'iasion-themenow' ).'" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin share_lk" href="//www.linkedin.com/shareArticle?url='.rawurlencode( get_the_permalink() ).'&amp;mini=true&amp;title='.rawurlencode( get_the_title() ) .'" title="'.esc_attr( 'Share on Linkedin!', 'iasion-themenow' ).'" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                                    </li>
                            </ul>
                        </div> 
                        </div>';
        echo $share_html;    
    }
    
}
