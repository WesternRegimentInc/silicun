<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}



function iasion_projects_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => '6',
        'columns' => '3',
        'style' => '1',
        'desc' => '',
        'filter' => '2',
        'gutter' => '2'
    ), $atts) );

    $q = new WP_Query( array('posts_per_page' => $count, 'post_type' => 'project') );
    
    
    $a_little_sum = $count + $count;
    $total_found_posts = $q->found_posts;
    $total_loaded = $a_little_sum - $count;
    
    if($columns == 1) {
        $project_column_width = 'col-md-12';
    } elseif($columns == 3) {
        $project_column_width = 'col-md-4 col-sm-6';
    } elseif($columns == 4) {
        $project_column_width = 'col-md-3 col-sm-6';
    } else {
        $project_column_width = 'col-sm-6';
    }
    
    $project_no = 0;

    if($gutter == 2) {
        $no_gutter = ""; 
    } else {
        $no_gutter = "no-gutter";
    }
    
    $list = '';
    
    if($filter == 2) {
        $projects_categories = get_terms( 'project_cat' );
        
        if ( ! empty( $projects_categories ) && ! is_wp_error( $projects_categories ) ){
            $list .= '
            <script>
                jQuery(document).ready(function($){
                    
                    $(".consulto-project-categories li").click(function(){ 

                      $(".consulto-project-categories li").removeClass("active");
                      $(this).addClass("active");        

                        var selector = $(this).attr("data-filter"); 
                        $(".consulto-all-projects").isotope({ 
                            filter: selector, 
                            animationOptions: { 
                                duration: 750, 
                                easing: "linear", 
                                queue: false, 
                            } 
                        });
                        
                        $(".load-more-projects-wrap").hide();
                    });
                    $("#consulto-all-projects-filter").click(function(){
                        $(".load-more-projects-wrap").show();
                    }); 

                    $(".consulto-all-projects .lightbox").nivoLightbox({
                        effect: "slideUp", // The effect to use when showing the lightbox
                        theme: "default", // The lightbox theme to use
                        keyboardNav: true, // Enable/Disable keyboard navigation (left/right/escape)
                        clickOverlayToClose: true, // If false clicking the "close" button will be the only way to close the lightbox
                        errorMessage: "The requested content cannot be loaded. Please try again later."
                    });
                    
                    
                });
                
                jQuery(window).load(function(){
                    jQuery(".consulto-all-projects").isotope({
                        itemSelector: ".single-consulto-project-wrap",
                        layoutMode: "masonry",
                    });
                });                
            </script>
            <div class="row"><div class="col-md-12"><ul class="consulto-project-categories"><li id="consulto-all-projects-filter" class="active" data-filter="*">All</li>';
            foreach ( $projects_categories as $category ) {
                $list .= '<li data-filter=".' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
            }
            $list .= '</ul></div></div>';
        }        
    }    
    
    
    $list .= ' 
    <script>
        (function ($) {
            "use strict";

            jQuery(window).load(function(){

                jQuery(".consulto-all-projects").masonry({ 
                    
                });

            });

        }(jQuery));
    </script>
    <div class="all-projects-wrapper consulto-project-column-'.esc_attr($columns).'">
    <div class="row consulto-all-projects">';
    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        $post_content = get_the_excerpt();
        $project_no++;
    
        
        if($columns == 2) {
            $project_cw_varriation = 'col-sm-6';
        } elseif($columns == 4) {
            $project_cw_varriation = 'col-md-3 col-sm-6';
        } else {
            $project_cw_varriation = $project_column_width;  
        }
    
        if($filter == 2) {

            $project_assigned_cat = get_the_terms( $idd, 'project_cat' );

            if ( $project_assigned_cat && ! is_wp_error( $project_assigned_cat ) ) { 

                $project_assigned_cat_array = array();

                foreach ( $project_assigned_cat as $cat ) {
                    $project_assigned_cat_array[] = $cat->slug;
                }

                $project_assigned_cat_list = join( " ", $project_assigned_cat_array ); 
            }
        } else {
            $project_assigned_cat_list = '';
        }    

        
        $project_assigned_catname = get_the_terms( $idd, 'project_cat' );
        $project_assigned_catname_array = array();

        if( $project_assigned_catname && ! is_wp_error( $project_assigned_catname ) ) {
        foreach ( $project_assigned_catname as $catname ) {
            $project_assigned_catname_array[] = $catname->name;
        }

        $project_assigned_catname_list = join( ", ", $project_assigned_catname_array ); 
        } else {
            $project_assigned_catname_list = '';
        }

        $list .= '
            <div class="'.esc_attr($no_gutter).' single-consulto-project-wrap single-work-box '.esc_attr($project_cw_varriation).' '.esc_attr($project_assigned_cat_list).' consulto-project-no-'.esc_attr($project_no).'">
                <a href="'.esc_url(get_the_post_thumbnail_url($idd, 'large')).'" class="project-thumbnail-wrap lightbox"><i class="fa fa-search"></i></a>
                    
                    <div class="consulto-project-thumb work-box-bg" style="background-image:url('.esc_url(get_the_post_thumbnail_url($idd, 'large')).')"><a href="'.esc_url(get_permalink()).'"><i class="fa fa-link"></i></a></div>';
       
    
        
    

    
        $list .='
               </div>';    
        
    endwhile;
    

    wp_reset_query();
        
    return $list;
}
add_shortcode('iasion_projects', 'iasion_projects_shortcode');