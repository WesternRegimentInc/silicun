<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iasion
 */

if ( ! is_active_sidebar( 'iasion-blog-sidebar' ) ) {
	return;
}

$blog_sidebar = cs_get_option('blog-sidebar');

if ( $blog_sidebar == 'right-sidebar' and is_active_sidebar('iasion-blog-sidebar')) : ?>
    <div class="col-md-4 col-sm-4">
        <div class="tt-sidebar-wrapper right-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('iasion-blog-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $blog_sidebar == 'left-sidebar' and is_active_sidebar('iasion-blog-sidebar')) : ?>
    <div class="col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8">
        <div class="tt-sidebar-wrapper left-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar('iasion-blog-sidebar'); ?>
        </div>
    </div>
<?php endif;