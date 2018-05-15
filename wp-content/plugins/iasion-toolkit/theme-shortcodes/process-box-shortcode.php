<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

function iasion_process_shortcode($atts, $content=null){

    extract( shortcode_atts(array(

        'title' => '',
        'desc' => '',
        'upload_icon' => '',
    
       
    ), $atts) );


    $industrypro_feature_box_markup = '
     <div class="iasion-process-box">
       <div  class= "iasion-process-icon">
         <div class="iasion-process-table">
           <div class="iasion-process-table-cell">';

                        // from vc-service
       
       $service_icon_array = wp_get_attachment_image_src($upload_icon, 'thumbnail');

       $industrypro_feature_box_markup .= '<img src="'.esc_url($service_icon_array[0]).'" alt="'.esc_html($title).'"/>';


    $industrypro_feature_box_markup .= '
          </div>
         </div>
       </div>

       <div class= "iasion-process-content">
           <h3>'.esc_html($title).'</h3>
           '.wpautop($desc).'
            
       </div>

     </div>
 
    ';
    $industrypro_feature_box_markup .= '';



    return $industrypro_feature_box_markup;

}

add_shortcode('iasion_process','iasion_process_shortcode');