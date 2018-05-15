<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function iasion_post_block_shortcode($atts){
    extract( shortcode_atts( array(
        'columns' => '3',
        'count' => '3',
        'readmore_text' => esc_html__('Read more', 'iasion-themenow'),
        'category_id' => '',
        'date' => '1',
    ), $atts) );

    if($category_id) {
        $q = new WP_Query( 
            array(
                'posts_per_page' => $count,
                 'post_type' => 'post', 
                 'cat' => $category_id) );
    } else {
        $q = new WP_Query( 
            array(
                'posts_per_page' => $count, 
                'post_type' => 'post') );
    }
    
    
    if($columns == 1) {
        $column_markup = 'col-md-12 col-sm-6';
    } elseif($columns == 2) {
        $column_markup = 'col-md-6 col-sm-6';
    } elseif($columns == 3) {
        $column_markup = 'col-md-4 col-sm-4';
    } elseif($columns == 4) {
        $column_markup = 'col-md-3 col-sm-6';
    } elseif($columns == 6) {
        $column_markup = 'col-md-2 col-sm-6';
    } 

    $list = '';


    $list .= '   
    <div class="row">';
    while($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        if(has_post_thumbnail()){
            $post_block_img_markup = get_the_post_thumbnail_url($idd, 'large');
        } else {
            $post_block_img_markup = 'http://placehold.it/270x220';
        }
        $post_excerpt = wp_trim_words( strip_shortcodes(get_the_content()), 17 );
    
        $user_info = get_userdata(get_post_field( 'post_author', $idd ));
        $list .= '
            <div class="'.esc_attr($column_markup).'">
                <div class="cs-single-post-block">
                    <div class="cs-post-block-img">';
                        
    
                        $list .='<img src="'.esc_url($post_block_img_markup).'" alt="'.get_the_title($idd).'"/>';
        $list .='
                    </div>
                    <div class="cs-post-content">
                    <h3>'.get_the_title($idd).'</h3>';
                    if($date == 1) {
                        $list .='<p class="cs-post-block-date">'.esc_html(get_the_date('d F, Y', $idd)).'</p>';
                    }
        $list .='
                    '.wpautop($post_excerpt).'
                    <a href="'.esc_url(get_permalink()).'" class="dc-post-readmore">'.esc_attr($readmore_text).'</a>
                  </div> 
                </div>    
            </div>    
        ';
    endwhile;
    $list.= '</div>';
    wp_reset_query();
        
    return $list;
}
add_shortcode('iasion_post_block', 'iasion_post_block_shortcode');