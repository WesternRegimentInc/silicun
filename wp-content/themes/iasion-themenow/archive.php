<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package iasion
 */

get_header(); ?>

<?php $blog_sidebar = cs_get_option('blog-sidebar');
$grid_column = 'col-md-12';

    if ($blog_sidebar == 'right-sidebar') :
        $grid_column = (is_active_sidebar('iasion-blog-sidebar')) ? 'col-md-8 col-sm-8' : $grid_column;
    elseif ($blog_sidebar == 'left-sidebar') :
        $grid_column = (is_active_sidebar('iasion-blog-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-8 col-sm-push-4' : $grid_column;
    endif; 
    ?>
   
    <div class="seo-breadcrumb-area">

   <div class="container">
       <div class="row">
           <div class="col-md-12">
            <h1>
                <?php 
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </h1>
            <span class="border"></span>

        </div>
    </div>
</div>
</div>
    
    <div class="deal-internal-area pad80">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($grid_column); ?>">
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php the_title(); ?></h1>
                            </header>

                        <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;

                        iasion_themenow_pagination();

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif; ?>            
                </div>
                <?php get_sidebar(); ?>
            </div>            
        </div>
    </div>
    
<?php
get_footer();
