<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package iasion
 */

get_header(); ?>

<div class="seo-breadcrumb-area">

   <div class="container">
       <div class="row">
           <div class="col-md-12">
            <h1 class="page-title"><?php esc_html_e( '404', 'iasion-themenow' ); ?></h1>
             <span class="border"></span>
        </div>
    </div>
</div>
</div>
    
    <div class="deal-internal-area pad80">
        <div class="container">
            <div class="row">
               <div class="error-404">
               	<div class="col-md-12">
                <div class="col-md-6">
                  <div class="error_img">
                        <img src="<?php echo get_template_directory_uri().'/assets/images/404.png'; ?>" alt="">
                   </div>
                 </div>

                 <div class="col-md-6">
                	<h3 class="page-sub-notice"><?php esc_html_e( 'Oops! That page can not be found, maybe you can search again.', 'iasion-themenow' ); ?></h3>
					<?php
						get_search_form();
					?>
				 </div>
                </div>
               </div>
            </div>            
        </div>
    </div>

<?php
get_footer();
