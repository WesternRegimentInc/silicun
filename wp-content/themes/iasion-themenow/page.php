<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package iasion
 */

if(get_post_meta($post->ID, 'iasion_page_options', true)) {
    $page_meta = get_post_meta($post->ID, 'iasion_page_options', true); 
} else {
    $page_meta = array();
}
if(array_key_exists('enable_title', $page_meta)) {
    $titlebar = $page_meta['enable_title'];
} else {
    $titlebar = true;
}

$vc_check = get_post_meta($post->ID, '_wpb_vc_js_status', true);
if($vc_check != 'true') {
    $vc_class = 'section-enable-padding';
} else {
    $vc_class = '';
} 

get_header(); ?>
   

    <?php if($titlebar == true && !is_front_page()) : ?>
        <div <?php 
     if(has_post_thumbnail()) : ?> style="background-image:url(<?php echo esc_url(the_post_thumbnail_url('full')); ?>)" 
      <?php endif; ?> class="seo-breadcrumb-area">

       <div class="container">
           <div class="row">
               <div class="col-md-12">
                <h1>
                    <?php 
                    the_title();
                    ?>
                </h1>
                <span class="border"></span>
            </div>
        </div>
    </div>
    </div> 
   <?php endif; ?>
    
    <div class="deal-internal-area <?php echo esc_attr($vc_class); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>       
                </div>
            </div>            
        </div>
    </div>    

<?php
get_footer();
