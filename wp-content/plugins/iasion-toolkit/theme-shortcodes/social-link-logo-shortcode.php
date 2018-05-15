<?php


function iasion_social_links_shortcode( $atts, $content = null  ) {

    
    extract( shortcode_atts( array(
        'icon' => 'star'
    ), $atts ) );
    
    $social_icons = cs_get_option('social_icons');
    
    $social_link ='<div class="monitor-social-icons">';
    
    if($social_icons && !empty($social_icons)) {
        foreach($social_icons as $social_icon) {
            if(!empty($social_icon['title']) && !empty($social_icon['url'])) {
                $social_link .='<a target="_blank" href="'.esc_url($social_icon['url']).'"><i class="fa fa-'.esc_html($social_icon['title']).'"></i></a>';
            }
        }
    }
    
    $social_link .='</div>';
 
    return $social_link;
}   
add_shortcode('social_links', 'iasion_social_links_shortcode');

function consulto_logo_shortcode($atts, $content = null){
    
    $text_logo = cs_get_option('text_logo');
    $logo_text = cs_get_option('consulto_logo_text');
    $home_url = esc_url(home_url());
    
    $logo = '<a class="footer_logo" href="'. $home_url.'">';
    
        if($text_logo && !empty($logo_text)){
            $logo .= $logo_text;
        }else{
            $logo .= esc_html(bloginfo( 'name' ));
        }
    
    $logo .= '</a>';
    
    return $logo;
    
    
}

add_shortcode('logo', 'consulto_logo_shortcode');




