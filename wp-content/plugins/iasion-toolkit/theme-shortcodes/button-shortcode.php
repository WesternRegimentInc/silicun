<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function iasion_btn_shortcode($atts, $content=null){

	extract( shortcode_atts(array(

        'type' => 1,
        'link_to_page' => '',
        'external_link' => '',
        'link_text' => 'Read more About Us',
        
    ), $atts) );


    if($type == 1){
      $link_source = get_page_link($link_to_page);
    }
    else{

      $link_source = $external_link;
    }


    $iasion_btn_markup = '

     <a href="'.$link_source.'" class="iasion-btn">'.$link_text.'</a>

    ';

    return $iasion_btn_markup;

}

add_shortcode('iasion_btn','iasion_btn_shortcode');