<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function iasion_cta_shortcode( $atts, $content = null  ) {

    extract( shortcode_atts( array(
        'title' => '',
        'desc' => '',
        'link_text' => '',
        'link_to' => '1',
        'link_to_page' => '',
        'link_external' => '',
    ), $atts ) );
    
    $ds_allowed_html_in_sb = array(
        'a' => array(
            'href' => array(),
            'class' => array(),
            'target' => array(),
        ),
        'strong' => array(),
        'i' => array(),
        'br' => array(),
        'p' => array()
    ); 
    
    if($link_to == 1) {
        $link_markup = get_page_link($link_to_page);
    } else {
        $link_markup = $link_external;
    }

    $cta_markup = '<div class="iasion-cta-box">';
    
        $cta_markup .='
            <div class="iasion-cta-info">
                <h3>'.esc_html($title).'</h3>
                '.wp_kses(wpautop($desc), $ds_allowed_html_in_sb).'
            </div>';
        $cta_markup .='
            <a href="'.esc_url($link_markup).'" class="iasion-btn iasion-cta-btn">'.esc_html($link_text).'</a>
        ';

    $cta_markup .= '</div>';

    return $cta_markup;
}
add_shortcode('iasion_cta', 'iasion_cta_shortcode');