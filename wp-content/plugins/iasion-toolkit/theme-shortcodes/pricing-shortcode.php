<?php
 
// Pricing Box shortcode
 
function iasion_pricing_shortcode($atts,  $content= null){
  extract( shortcode_atts( array(
    'title' => '',
    'price' => '',
    'currency' => '',
    'duration' =>'',
    'btn_link'  => '',
    'btn_text' => esc_html__('purchase', 'iasion-themenow'),
 
  ), $atts) );
    
   
 $pricing_markup = '
 
<div class="pricing-box text-center">
    <h3 class="pbox-title">'.esc_html($title).'</h3>
    <div class="pbox-price">
        <span class="currency">'.esc_html($currency).'</span>
        <span class="price-amount">'.esc_html($price).'</span>
        <span class="price-duration">'.esc_html($duration).'</span>
    </div>
    <div class ="pfeature-list">
        '.wpautop($content).'
    </div>
     
<a href="'.esc_url($btn_link).'" class="pbox-btn dc-post-readmore">'.esc_attr($btn_text).'</a>
       
</div>
     
  ';  
   
 return $pricing_markup;    
   
}
add_shortcode('iasion_pricing', 'iasion_pricing_shortcode');