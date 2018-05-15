<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package iasion
 */

$vc_check = get_post_meta($post->ID, '_wpb_vc_js_status', true);
if($vc_check != 'true') {
    $vc_class = 'section-enable-padding';
} else {
    $vc_class = '';
} 


get_header();

$blog_sidebar = cs_get_option('blog-sidebar');
$grid_column = 'col-md-12';

    if ($blog_sidebar == 'right-sidebar') :
        $grid_column = (is_active_sidebar('iasion-blog-sidebar')) ? 'col-md-8 col-sm-8' : $grid_column;
    elseif ($blog_sidebar == 'left-sidebar') :
        $grid_column = (is_active_sidebar('iasion-blog-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-8 col-sm-push-4' : $grid_column;
    endif;

     if(get_post_type() == 'project'){
        $grid_column = 'col-md-12';
     }

     ?>

 <div  class="blog-breadcrumb-area blog-header-bg">

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
    
    <div class="deal-internal-area <?php echo esc_attr($vc_class); ?>">
        <div class="container">
            <div class="row">
               <div class="<?php echo esc_attr($grid_column); ?>">
                    <div class="deal-padding-right ">
                        <?php
                        while ( have_posts() ) : the_post();

                            if(get_post_type() == 'project') {
                                get_template_part( 'template-parts/content', 'project' );
                            } else {
                                get_template_part( 'template-parts/content', get_post_format() );
                            }
                            ?>

                            

                            <?php  if(get_post_type() == 'post') {
                                if((cs_get_option('blog_post_nav') != false)){
                                    the_post_navigation();
                                }
                                if (get_the_author_meta( 'description' )) :
                                    get_template_part( 'author-bio' ); 
                                endif; 
                               
                               // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            }

                        endwhile; // End of the loop.
                        ?>       
                    </div>
                </div>
                <?php if(get_post_type() == 'project') : 
                    $project_assigned_catname = get_the_terms( $post->ID, 'project_cat' );
                    $project_assigned_catname_array = array();

                    if( $project_assigned_catname && ! is_wp_error( $project_assigned_catname ) ) {
                        foreach ( $project_assigned_catname as $catname ) {
                            $project_assigned_catname_array[] = $catname->name;
                        }

                        $project_assigned_catname_list = join( ", ", $project_assigned_catname_array ); 
                    } else {
                        $project_assigned_catname_list = '';
                    }                
                ?>
                    
                  <?php elseif(get_post_type() == 'project') : ?>
                <?php ; ?>   
                <?php else : ?>
                <?php get_sidebar(); ?>
                <?php endif; ?>            
        </div>
    </div>
    </div>    

<?php
get_footer();
