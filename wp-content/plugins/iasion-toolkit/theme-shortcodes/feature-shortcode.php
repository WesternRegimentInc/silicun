<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

function iasion_feature_shortcode($atts, $content=null){

    extract( shortcode_atts(array(

        'title' => '',
        'desc' => '',
        'type' => 1,
        'icon_type' => 1,
        'upload_icon' => '',
        'choose_icon' => '',
       
    ), $atts) );


    $iasion_feature_box_markup = '
     <div class="consulto-feature-box">
       <div  class= "consulto-feature-icon">
         <div class="consulto-feature-table">
           <div class="consulto-feature-table-cell">';

      if($icon_type == 1){                       // from vc-service
       
       $service_icon_array = wp_get_attachment_image_src($upload_icon, 'thumbnail');

       $iasion_feature_box_markup .= '<img src="'.esc_url($service_icon_array[0]).'" alt="'.esc_html($title).'"/>';

      }

      else{
       $iasion_feature_box_markup .= '<i class="'.esc_attr($choose_icon).'"></i>';

      }     


    $iasion_feature_box_markup .= '
          </div>
         </div>
       </div>

       <div class= "consulto-feature-content">
           <h3>'.esc_html($title).'</h3>
           '.wpautop($desc).'
            
       </div>

     </div>
 
    ';
    $iasion_feature_box_markup .= '';



    return $iasion_feature_box_markup;

}

add_shortcode('iasion_feature','iasion_feature_shortcode');