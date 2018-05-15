<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package iasion
 */

if ( ! function_exists( 'iasion_themenow_pagination' ) ) :
 /**
 * Prints the pagination in posts
 */
 function iasion_themenow_pagination() {
 		global $wp_query;
 		$big = 999999999;

 		$links = paginate_links(array(
 				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
 				'format' => '?paged=%#%',
 				'current' => max(1, get_query_var('paged')),
 				'total' => $wp_query->max_num_pages,
 				'type' => 'array',
 				'prev_next' => true,
 				'prev_text' => __('<i class="fa fa-angle-left"></i>', 'iasion-themenow'),
 				"next_text" => __('<i class="fa fa-angle-right"></i>', 'iasion-themenow'),
 				'mid_size' => 2
 		));

 		?>
 		<div class="pagination">
 				<?php
 				if ($links) {
 						foreach ($links as $link) {
 								if (strpos($link, "current") !== false)
 										echo '<a class="page-numbers current">' . $link . "</a>\n";
 								else
 										echo '<span class="page-numbers">' . $link . "</span>\n";
 						}
 				}
 				?>
 		</div>
 		<?php
 }
 endif;

if ( ! function_exists( 'iasion_themenow_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function iasion_themenow_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
   
    if(cs_get_option('blog_post_date') != false){
        $posted_on = sprintf(
            '<span class="posted-on"> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span> '
        );
    }else{
        $posted_on = '';
    }

    if(cs_get_option('blog_post_by') != false){
        $byline = sprintf(
            '<span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'
        );
    }else{
        $byline = '';
    }

	echo $byline . $posted_on ; // WPCS: XSS OK.
    
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        
        if(cs_get_option('blog_post_comment') != false){
            echo '<span class="comments-link"><i class="fa fa-comment"></i> ';
            /* translators: %s: post title */
            comments_popup_link( sprintf( wp_kses( esc_html__( 'Leave a Comment on %s', 'iasion-themenow' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
            echo '</span>';
        }

	}    

}
endif;

if ( ! function_exists( 'iasion_themenow_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function iasion_themenow_entry_footer() {
	// Hide category and tag text for pages.
    
    
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ', 'iasion-themenow' ) );
		if ( $categories_list && iasion_categorized_blog() ) {
            if(cs_get_option('blog_post_category') != false){
			     printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'iasion-themenow' ) . '</span>', $categories_list ); // WPCS: XSS OK
            }
		}

		/* translators: used between list items, there is a space after the comma */
        if(is_single()) {
            $tags_list = get_the_tag_list( '', esc_html__( ' ', 'iasion-themenow' ) );
            if ( $tags_list && cs_get_option('blog_post_tag_list') != false) {
                printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . esc_html__( 'Tagged %1$s', 'iasion-themenow' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }
	}

    
    if(is_single()) {
        edit_post_link(
            sprintf(
                /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'iasion-themenow' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function iasion_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'iasion_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'iasion_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so monitor_thecreo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so monitor_thecreo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in monitor_thecreo_categorized_blog.
 */
function iasion_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'iasion_categories' );
}
add_action( 'edit_category', 'iasion_category_transient_flusher' );
add_action( 'save_post',     'iasion_category_transient_flusher' );
