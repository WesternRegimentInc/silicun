<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

function iasion_service_shortcode($atts, $content=null){

	extract( shortcode_atts(array(

        'title' => '',
        'desc' => '',
        'type' => 1,
        'link_to_page' => '',
        'external_link' => '',
        'link_text' => 'see more',
        'icon_type' => 1,
        'upload_icon' => '',
        'choose_icon' => '',
        'box_background' => '',
       
    ), $atts) );


    if($type == 1){
      $link_source = get_page_link($link_to_page);
    }
    else{

      $link_source = $external_link;
    }

    $box_bg_array = wp_get_attachment_image_src($box_background, '500X300');

    $iasion_service_box_markup = '
    <div class="iasion-service-box">
     <div style="background-image:url('.esc_url($box_bg_array[0]).')" class="iasion-service-box-bg">
       <div class="iasion-service-box-bg-invert">
       <div  class= "iasion-service-icon">
         <div class="iasion-service-table">
           <div class="iasion-service-table-cell">';

      if($icon_type == 1){                       // from vc-service
       
       $service_icon_array = wp_get_attachment_image_src($upload_icon, 'thumbnail');

       $iasion_service_box_markup .= '<img src="'.esc_url($service_icon_array[0]).'" alt="'.esc_html($title).'"/>';

      }

      else{
       $iasion_service_box_markup .= '<i class="'.esc_attr($choose_icon).'"></i>';

      }     


    $iasion_service_box_markup .= '
          </div>
         </div>
       </div>
    

       <div class= "iasion-service-content">
           <h3>'.esc_html($title).'</h3>
           '.wpautop($desc).'
           <a href="'.esc_url($link_source).'" class="service-more-btn">'.esc_html($link_text).'</a> 
       </div>

      </div> <!-- iasion-service-box-bg-invert ends -->

      </div>
     </div>
 
    ';
    $iasion_service_box_markup .= '';



    return $iasion_service_box_markup;

}

add_shortcode('iasion_service','iasion_service_shortcode');