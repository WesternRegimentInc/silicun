<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iasion
 */



$copyright_text = cs_get_option('copyright_text');

$iasion_allowed_html_in_footer = array(
    'a' => array(
        'href' => array(),
        'class' => array(),
        'target' => array(),
    ),
    'img' => array(
        'href' => array(),
        'class' => array(),
        'alt' => array(),
    ),
    'p' => array(),
    'h1' => array(),
    'h2' => array(),
    'h3' => array(),
    'h4' => array(),
    'h5' => array(),
    'h6' => array(),
    'br' => array(),
    'strong' => array(),
    'i' => array(),
);
?>


   <footer id="colophon" class="site-footer">
        <?php if(is_active_sidebar('iasion_themenow_footer')) : ?>
        <div class="footer-top-widgets">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('iasion_themenow_footer'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?> 
       
         <div class="footer-copyright-area">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <?php echo wp_kses(wpautop($copyright_text), $iasion_allowed_html_in_footer); ?>
                     </div>
                     
                 </div>
             </div>
         </div>
   </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
