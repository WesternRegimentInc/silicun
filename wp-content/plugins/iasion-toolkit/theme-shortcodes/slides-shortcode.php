<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

function iasion_slides_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => '3',
        'effects' => "fade",
        'autoplay' => 'true',
        'autoplay_time' => '5000',
        'slide_id' => '',
    ), $atts) );

    if($count == 1) {
        $q = new WP_Query( array('posts_per_page' => 1,
           'post_type' => 'slide', 
           'p' => $slide_id) );
    } else {
        $q = new WP_Query( array('posts_per_page' => $count,
           'post_type' => 'slide') );
    }

    $list = '';

    if($count != 1) {
        $list .= '
        <script>
        jQuery(document).ready(function($){

            $(".iasion-slides").rhinoslider({
                effect: "'.esc_attr($effects).'",
                controlsMousewheel: false,
                autoPlay: '.esc_attr($autoplay).',
                pauseOnHover: false,
                showControls: "always",
                showBullets: "never",
                prevText: "<i class=\'fa fa-angle-left\'></i>",
                nextText: "<i class=\'fa fa-angle-right\'></i>",
                showTime: '.esc_attr($autoplay_time).'
            });
            
        });
        </script>';
    }
    
    $list .='
    <div class="slider-preloader-wrap">
    <div class="preloader-wrap"><div class="spinner2"></div></div>
    <div class="iasion-slides" id="iasion-slides-'.esc_attr($slide_id).'">';

    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        if(get_post_meta($idd, 'iasion_slide_meta', true)) {
            $slide_meta = get_post_meta($idd, 'iasion_slide_meta', true);
        } else {
            $slide_meta = array();
        }

        if(array_key_exists('enable_overlay', $slide_meta)){

            $enable_overlay = $slide_meta['enable_overlay']; 
        }else{
            $enable_overlay = true;
        }
        if(array_key_exists('overlay_percentage', $slide_meta)){
            $overlay_percentage = $slide_meta['overlay_percentage'];  
        }else{
            $overlay_percentage = .7;
        }
        if(array_key_exists('overlay_color', $slide_meta)){
            $overlay_color = $slide_meta['overlay_color']; 
        }else{
            $overlay_color = '#181a1f';
        }

        $iasion_allowed_html_in_slide = array(
            'a' => array(
                'href' => array(),
                'class' => array(),
                'target' => array(),
            ),
            'img' => array(
                'href' => array(),
                'class' => array(),
                'alt' => array(),
            ),
            'p' => array(),
            'h1' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'h2' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'h3' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'h4' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'h5' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'h6' => array(
                'class' => array(),
                'strong' => array(),
                'b' => array(),
            ),
            'br' => array(),
            'strong' => array(),
            'i' => array(),
        );
        $post_content = get_the_content();
        $list .= '
        <div style="background-image:url('.esc_url(get_the_post_thumbnail_url($idd)).')" class="single-iasion-slide-item" id="single-iasion-slide-item-'.esc_attr($idd).'">'; 
        if($enable_overlay == true){
          $list .='<div style="opacity:'.$overlay_percentage.'; background-color:'.$overlay_color.'" class="slide-overlay"></div>';
      }
      $list .='

      <div class="iasion-slide-table">
      <div class="iasion-slide-tablecell">
      <div class="container">
      <div class="row">
      <div class="col-md-10 col-md-offset-1">
      <div class="iasion-slide-text">
      <h1>'.esc_html(get_the_title($idd)).'</h1>
      '.wp_kses(wpautop($post_content), $iasion_allowed_html_in_slide).'';

      if(array_key_exists('buttons', $slide_meta) && $slide_meta['buttons']) {
        $list .='

        <div class="iasion-slide-buttons">';
        foreach($slide_meta['buttons'] as $button) {
            if($button['linkto'] == 1) {
                $btn_link_markup = get_page_link($button['to_page']);
            } else {
                $btn_link_markup = $button['to_external'];
            }
            $list .='<a target="'.$button['tab'].'" href="'.esc_url($btn_link_markup).'" class="iasion-btn btn_effect '.esc_attr($button['type']).'-btn">'.esc_html($button['btn_text']).' <i class="fa fa-long-arrow-right"></i></a>';
        }
        $list .='
        </div>';
    }
    $list .='
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    ';
endwhile;
$list.= '</div> </div>';
wp_reset_query();

return $list;
}
add_shortcode('iasion_slides', 'iasion_slides_shortcode');