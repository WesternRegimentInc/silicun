<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package iasion
 */
if(get_post_meta($post->ID, 'iasion_project_meta', true)) {
    $project_meta = get_post_meta($post->ID, 'iasion_project_meta', true); 
} else {
    $project_meta = array();
}
if(array_key_exists('infos', $project_meta)) {
    $infos = $project_meta['infos'];
} else {
    $infos = array();
}
if(array_key_exists('show_project_info', $project_meta)) {
    $show_project_info = $project_meta['show_project_info'];
} else {
    $show_project_info = true;
}
if(array_key_exists('show_project_category', $project_meta)) {
    $show_project_category = $project_meta['show_project_category'];
} else {
    $show_project_category = true;
}
if(array_key_exists('show_related_projects', $project_meta)) {
    $show_related_projects = $project_meta['show_related_projects'];
} else {
    $show_related_projects = true;
}
if(array_key_exists('related_projects_title', $project_meta)) {
    $related_projects_title = $project_meta['related_projects_title'];
} else {
    $related_projects_title = esc_html('Related projects', 'iasion-themenow');
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col-md-10 col-md-offset-1">
    <header class="entry-header">

      <?php if(has_post_thumbnail()) : ?>
        <div class="deal-post-featured-content">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
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
                    endif;                
                ?>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
       <div class="iasion-project-sidebar">
            <?php if(!empty($infos) && $show_project_info == true) : ?>
                <?php foreach($infos as $info) : if(!empty($info['title']) && !empty($info['text'])) : ?>
                <p class="iasion-project-info-item"><label><?php echo esc_html($info['title']); ?> :</label><?php echo esc_html($info['text']); ?></p>
                <?php endif; endforeach; ?>
            <?php endif; ?>
            <?php if($project_assigned_catname && ! is_wp_error( $project_assigned_catname ) && $show_project_category == true) : ?>
                <p class="iasion-project-info-item"><label><?php esc_html_e('Category', 'iasion-themenow'); ?> :</label> <?php echo esc_html($project_assigned_catname_list); ?></p>
            <?php endif; ?>
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
                echo '<div style="clear:both"></div><a href="' . esc_url( get_permalink() ) . '" class="deal-btn">'.esc_html__('Read more', 'iasion-themenow').'</a>';
            }
        ?>
            <?php if($show_related_projects == true) : ?>
            <div class="iasion-related-projects">
                <h4><?php echo esc_html($related_projects_title); ?></h4>
                <div class="row">
                    <?php
                    global $post;
                    $args = array( 
                     'posts_per_page' => 3,
                     'post_type'=> 'project', 
                     'post__not_in' => array(get_the_ID())
                     );

                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ) : setup_postdata($post); ?>
                    
                    <div class="col-md-4">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"<?php if(has_post_thumbnail()) : ?> style="background-image:url(<?php the_post_thumbnail_url('medium'); ?>)"<?php endif; ?> class="single-related-project"><i class="fa fa-link"></i></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</article>