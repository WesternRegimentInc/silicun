<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package iasion
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(has_post_thumbnail()) : ?>
        <div class="deal-post-featured-content">
            <?php the_post_thumbnail('iasion-themenow-thumb'); ?>
        </div>
        <?php endif; ?>

	<?php
	
	if ( 'post' === get_post_type() ) : ?>
	<?php if(!is_singular()) : ?>
	<h2><a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a></h2>
<?php endif; ?>
<div class="entry-meta">
	<?php iasion_themenow_posted_on(); ?>
</div><!-- .entry-meta -->
<?php
endif; ?>
</header><!-- .entry-header -->

<div class="entry-content">
	<?php
	if(is_single()) {
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'iasion-themenow' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'iasion-themenow' ),
			'after'  => '</div>',
			) );
	} else {
		
		the_excerpt();
		echo '<div style="clear:both"></div><a href="' . esc_url( get_permalink() ) . '" class="iasion-blog-btn">'.esc_html__('Read more', 'iasion-themenow').'</a>';
	}
	?>
	
</div><!-- .entry-content -->


<footer class="entry-footer blog-content">
	<?php iasion_themenow_entry_footer(); ?>
	<?php if(is_single()) : 
			if ( function_exists( 'iasion_share_post' ) ) {
				iasion_share_post();
			}
	endif; 
	?> 
</footer><!-- .entry-footer -->
</article><!-- #post-## -->
