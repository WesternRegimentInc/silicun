<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

function iasion_logo_carousel_shortcode( $atts, $content = null  ) {

    extract( shortcode_atts( array(
        'logos' => '',
        'count' => '6',
        'tablet_count' => '4',
        'mobile_count' => '2',
        'arrows' => 'true',
        'dots' => 'false',
        'autoplay' => 'true',
        'autoplay_time' => '5000',
    ), $atts ) );

    $images_m = explode(',', $logos);
    $iasion_logos_random_id = rand(32987, 54972);
    
    $logo_carousel_markup = '
    <script>
        jQuery(document).ready(function($){
            $("#iasion-logo-carousel-'.esc_attr($iasion_logos_random_id).'").owlCarousel({
                loop: true,
                autoplay: '.esc_attr($autoplay).',
                dots: '.esc_attr($dots).',
                nav: '.esc_attr($arrows).',
                margin: 30,
                navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
                autoplayTimeout: '.esc_attr($autoplay_time).',
                responsive:{
                    0:{
                        items: '.esc_attr($mobile_count).',
                    },
                    600:{
                        items: '.esc_attr($tablet_count).',
                    },
                    1000:{
                        items: '.esc_attr($count).',
                    }
                }
            });
            
        });
    </script>    
    <div class="iasion-logo-carousel" id="iasion-logo-carousel-'.esc_attr($iasion_logos_random_id).'">';
        
        foreach($images_m as $logo) {
            $logo_immm_array = wp_get_attachment_image_src($logo, 'medium');
            $logo_carousel_markup .='<div class="iasion-logo-table"><div class="iasion-logo-tablecell"><img src="'.esc_url($logo_immm_array[0]).'" alt=""/></div></div>';
        }
    $logo_carousel_markup .= '</div>';

    return $logo_carousel_markup;
}
add_shortcode('iasion_logo_carousel', 'iasion_logo_carousel_shortcode');