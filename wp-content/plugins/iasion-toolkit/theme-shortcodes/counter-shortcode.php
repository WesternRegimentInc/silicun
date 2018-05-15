<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function iasion_counter_shortcode($atts, $content=null){

	extract( shortcode_atts(array(


        'number' => 1,
        'after_text' => '',
        'desc' => '',
        
        
    ), $atts) );

    $iasion_counter_markup = '

     <div class="seo-stat-box">
       <h1><span class="counter">'.$number.'</span>'.$after_text.'</h1>
       '.$desc.'
     </div>

    ';

    return $iasion_counter_markup;

}

add_shortcode('iasion_counter','iasion_counter_shortcode');