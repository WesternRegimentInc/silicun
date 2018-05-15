<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function iasion_testimonials_shortcode( $atts ){

    extract( shortcode_atts(array(   

        'count' => 3,
        'testimonial_id' => '',
        'loop' => 'true',
        'autoplay' => 'true',
        'autoplayTimeout' => 4000,
        'nav' => 'true',
        'dots' => 'true',
    ), $atts) );

    if($count == 1){

     $q = new WP_Query(
      array(
        'posts_per_page' => $count,
        'post_type' => 'testimonial', 
        'p' => $testimonial_id));
    
    } else{
    $q = new WP_Query(
      array(
        'posts_per_page' => $count,
        'post_type' => 'testimonial'));   
    }
   
    if($count== 1){
        $list = '';
    }else{
            $list = '<script>
            jQuery(window).load(function(){
                jQuery(".iasion-testimonials").owlCarousel({
                    items: 1,
                    loop: '.esc_attr($loop).',
                    autoplay: '.esc_attr($autoplay).',
                    autoplayTimeout: '.esc_attr($autoplayTimeout).',
                    dots: '.esc_attr($dots).',
                    slideSpeed:900,
                    paginationSpeed: 800,
                });
            });
            </script>';
    }
   
      
        $list.='<div class="iasion-testimonials">';
        
         //loop  started for query 
    while($q->have_posts()): $q->the_post(); 

        $idd = get_the_ID();

        if(get_post_meta($idd, 'iasion_testimonial_options', true)){
            $slide_meta = get_post_meta($idd, 'iasion_testimonial_options', true);
        }else{
            $slide_meta = array();
        }
        
        if(array_key_exists('client_img', $slide_meta)){
            $client_img = wp_get_attachment_image_src($slide_meta['client_img'],'thumbnail');  
        }
        if(array_key_exists('client_name', $slide_meta)){
            $client_name = $slide_meta['client_name']; 
        }
        $post_content = get_the_content();
        
        $list .= '
     <div class="iasion-testimonial">
      
      '.wpautop($post_content).'

      <img src="'.$client_img[0].'" alt="'.esc_html($client_name).'"/> 

      <h4>'.esc_html($client_name).'</h4>
      
     </div>
      
    ';

        endwhile;
        $list .='</div>';
        wp_reset_query();
        return $list;
}
add_shortcode('iasion_testimonial', 'iasion_testimonials_shortcode');