<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

function iasion_staff_shortcode( $atts, $content = null  ) {

    extract( shortcode_atts( array(
        'photo' => '',
        'title' => '',
        'job' => '',
        'links' => '',
    ), $atts ) );

    $iasion_social_links_markup = vc_param_group_parse_atts( $links );

    $staff_markup = '<div class="iasion-single-staff">';

    $staff_markup .= '

                        <div class="iasion-staff-img">';
    if($photo) {
        $photo_image_array = wp_get_attachment_image_src($photo, 'large');
        $staff_markup .= '<div class="staff_img_wrap"><img src="'.esc_url($photo_image_array[0]).'" alt="'.esc_html($title).'"></div>';
    }
     

    $staff_markup .= '
                        </div>
                        <div class="iasion-staff-detail">
                            <h4>'.esc_html($title).'</h4>';
    if($job) {
        $staff_markup .= '<span class="iasion-staff-position">'.esc_html($job).'</span>';
    }
    
    if($links) {
        $staff_markup .= '<ul class="iasion-staff-social-link">';
        foreach($iasion_social_links_markup as $link) {
            if(!empty($link['link']) && !empty($link['icon'])) {
                $staff_markup .= '<li><a href="'.esc_url($link['link']).'" target="_blank"><i class="'.esc_attr($link['icon']).'"></i></a></li>';
            }
        }
        $staff_markup .= '</ul>';
    }
    
    
    $staff_markup .= '
                        </div>
    ';
    $staff_markup .= '</div>';

    return $staff_markup;
}
add_shortcode('iasion_staff', 'iasion_staff_shortcode');