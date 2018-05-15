<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function iasion_section_title_shortcode( $atts, $content = null  ) {

    extract( shortcode_atts( array(
        'title' => '',
        'top_title'=>''
    ), $atts ) );
    
    
        $title_markup = esc_html($title);
        $top_title_markup = esc_html($top_title);
   
   

    $section_title_markup = '
        <div class="iasion-section-title iasion-section-title-style">';
    

         if($top_title) {
            $section_title_markup .= '<h4>'.$top_title_markup.'</h4>';
        } 

        if($title) {
            $section_title_markup .= '<h2>'.$title_markup.'</h2>';
        }
       
    
    
    $section_title_markup .= '</div>';

     //$section_title_markup .= '<div class="section-title-sep"><span class="section-title-line"></span><span class="section-title-line"></span></div></div>';

    return $section_title_markup;
}
add_shortcode('iasion_section_title', 'iasion_section_title_shortcode');