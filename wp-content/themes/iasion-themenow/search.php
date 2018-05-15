<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'iasion-themenow' ), 
            '<span>' . get_search_query() . '</span>' ); ?>
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
		   if ( have_posts() ) : ?>

			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
