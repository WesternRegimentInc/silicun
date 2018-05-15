<?php

// Theme Options

function iasion_themenow_cs_framework_settings($settings){

         $settings = array();

         $settings           =  array(
             'menu_title'    =>esc_html('Theme Options', 'iasion-themenow'),
             'menu_type'     =>'menu',
             'menu_slug'     =>'iasion-theme-options',
             'ajax_save'     =>true,
             'show_reset_all'=> true,
             'framework_title' => esc_html__('iasion theme options - by ThemeNow', 'iasion-themenow'),

         	);

         return $settings;
}

add_filter('cs_framework_settings','iasion_themenow_cs_framework_settings');


function iasion_themenow_cs_framework_options($options){

	   $options = array();


	  $options[] =array(
          'name'     =>'iasion_logo_favicon',
          'title'    => esc_html__('Logos & social links', 'iasion-themenow'),
          'icon'    => 'fa fa-camera',
          'fields'    => array(
            array(
                'id'    => 'iasion_favicon',
                'type'  => 'image',
                'title' => esc_html__('Favicon', 'iasion-themenow'),
                'desc' => esc_html__('Upload favicon image. Favicon image should be square sized image.', 'iasion-themenow'),
            ),
            array(
                'id'    => 'text_logo',
                'type'  => 'switcher',
                'title' => esc_html__('Enable text logo?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to enable text logo, select on.', 'iasion-themenow'),
                'default' => false,
            ),
            array(
                'id'    => 'iasion_logo',
                'type'  => 'image',
                'title' => esc_html__('Logo image', 'iasion-themenow'),
                'desc' => esc_html__('Upload site logo.', 'iasion-themenow'),
                'dependency'   => array( 'text_logo', '!=', 'true' ),
            ),
            array(
                'id'    => 'iasion_logo_text',
                'type'  => 'text',
                'default'  => esc_html__('iasion', 'iasion-themenow'),
                'title' => esc_html__('Logo text', 'iasion-themenow'),
                'desc' => esc_html__('Type logo text here.', 'iasion-themenow'),
                'dependency'   => array( 'text_logo', '==', 'true' ),
            ),
            array(
                'id'    => 'social_icons',
                'type'  => 'group',
                'title' => esc_html__('Social links', 'iasion-themenow'),
                'desc' => esc_html__('Add social links, you can call it any text area, by using shortcode [social_links].', 'iasion-themenow'),
                'button_title'    => esc_html__('Add new social link', 'iasion-themenow'),
                'accordion_title' => esc_html__('Add New link', 'iasion-themenow'),
                'fields'          => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__('Font awesome Icon code', 'iasion-themenow'),
                        'desc'  =>esc_html__('linkedin - use code like this', 'iasion-themenow')
                    ),
                    array(
                        'id'    => 'url',
                        'type'  => 'text',
                        'title' => esc_html__('Link', 'iasion-themenow'),
                    ),
                ),
            ),
        ) 
	  ); 

  
    $options[]    = array(
        'name'      => 'iasion_typography',
        'title'     => esc_html__('Typography', 'iasion-themenow'),
        'icon'      => 'fa fa-font',
        'fields'    => array(
            array(
                'id'    => 'iasion_body_font',
                'type'  => 'typography',
                'title' => esc_html__('Body font', 'iasion-themenow'),
                'desc' => esc_html__('Select body google font & font weight.', 'iasion-themenow'),
                'default'   => array(
                    'family'  => 'Open Sans',
                    'variant' => 'regular',
                    'font'    => 'google', // this is helper for output
                ),
            ),
            array(
                'id'    => 'iasion_heading_font',
                'type'  => 'typography',
                'title' => esc_html__('Heading font', 'iasion-themenow'),
                'default'   => array(
                    'family'  => 'Montserrat',
                    'variant' => '700',
                    'font'    => 'google', // this is helper for output
                ),
                'desc' => esc_html__('Select heading google font & font weight.', 'iasion-themenow'),
            ),
        )
    );

    $options[]    = array(
        'name'      => 'iasion_styling',
        'title'     => esc_html__('Styling', 'iasion-themenow'),
        'icon'      => 'fa fa-paint-brush',
        'fields'    => array(
            array(
                'id'    => 'site_preloader',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Proloader', 'iasion-themenow'),
                'desc' => esc_html__('If you want to enable preloader, select on.', 'iasion-themenow'),
            ),
            array(
                'id'    => 'iasion_theme_color',
                'type'  => 'color_picker',
                'desc'  => esc_html__('Choose theme primary color.', 'iasion-themenow'),
                'title' => esc_html__('Theme color', 'iasion-themenow'),
                'default' => '#6fb98f',
            )
        )
    );

    $options[]    = array(
        'name'      => 'iasion_blog_settings',
        'title'     => esc_html__('Blog Settings', 'iasion-themenow'),
        'icon'      => 'fa fa-pencil',
        'fields'    => array(

            array(
              'id'        => 'blog-sidebar',
              'type'      => 'image_select',
              'title'    => esc_html__('Blog sidebar setting', 'iasion-themenow'),
              'subtitle' => esc_html__('Select blog sidebar', 'iasion-themenow'),
              'options'   => array(
                'left-sidebar'    => get_template_directory_uri() .'/assets/images/2cl.png',
                'right-sidebar'   => get_template_directory_uri() .'/assets/images/2cr.png',
                'no-sidebar' => get_template_directory_uri() .'/assets/images/1col.png',
              ),
              'default'   => 'right-sidebar',
            ),

            array(
                'id'    => 'blog_post_by',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Display post by?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show posted by name on blog index page and single blog, select on', 'iasion-themenow'),
            ),
            array(
                'id'    => 'blog_post_date',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Display post date?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show blog post date on blog index page and single blog, select on', 'iasion-themenow'),
            ),
            array(
                'id'    => 'blog_post_comment',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Display comment count?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show comment count on blog index page, select on', 'iasion-themenow'),
            ),
            array(
                'id'    => 'blog_post_category',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Display posted in categories?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show blog category on blog index page and single blog, select on', 'iasion-themenow'),
            ),
            array(
                'id'    => 'blog_post_nav',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Enable next previous link on single post?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show next previous links on single blog, select on', 'iasion-themenow'),
            ),
            array(
                'id'    => 'blog_post_tag_list',
                'type'  => 'switcher',
                'default'  => true,
                'title' => esc_html__('Enable posted in tag?', 'iasion-themenow'),
                'desc' => esc_html__('If you want to show tag list, select on', 'iasion-themenow'),
            ),
        )
    );

    $options[]    = array(
        'name'      => 'iasion_footer_settings',
        'title'     => esc_html__('Footer Settings', 'iasion-themenow'),
        'icon'      => 'fa fa-wordpress',
        'fields'    => array(
            array(
                'id'    => 'footer_bg_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Footer  background color', 'iasion-themenow'),
                'default' => '#0b120e',
                'desc' => esc_html__('Select footer background color', 'iasion-themenow'),
            ),
            array(
                'id'    => 'footer_color',
                'type'  => 'color_picker',
                'title' => esc_html__('Footer text color', 'iasion-themenow'),
                'default' => '#cacaca',
                'desc' => esc_html__('Select footer  text color', 'iasion-themenow'),
            ),
            array(
                'id'    => 'copyright_text',
                'type'  => 'textarea',
                'title' => esc_html__('Copyright text', 'iasion-themenow'),
                'default' => esc_html__('Copyright 2017 by ThemeNow. All Rights Reserved', 'iasion-themenow'),
                'desc' => esc_html__('Type footer copyright text.', 'iasion-themenow'),
            ),
        )
    );

   return $options;

}

add_filter( 'cs_framework_options', 'iasion_themenow_cs_framework_options' );

function iasion_themenow_cs_metabox_options( $options ) {

    $options      = array();  // remove old options

   //=====================================
            // slide option
  //===================================== 

    $options[]    = array(
        'id'        => 'iasion_slide_meta',
        'title'     => esc_html__('Slide Options', 'iasion-themenow'),
        'post_type' => 'slide',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'iasion_slide_meta_1',
                'fields' => array(
                    array(
                        'id'    => 'buttons',
                        'type'  => 'group',
                        'title'           => esc_html__('Buttons', 'iasion-themenow'),
                        'desc'           => esc_html__('Add slide buttons here.', 'iasion-themenow'),
                        'button_title'    => esc_html__('Add New button', 'iasion-themenow'),
                        'accordion_title' => esc_html__('Add New button', 'iasion-themenow'),
                        'fields'          => array(
                            array(
                                'id'    => 'type',
                                'type'  => 'select',
                                'title' => esc_html__('Button type', 'iasion-themenow'),
                                'desc' => esc_html__('Select button type', 'iasion-themenow'),
                                'default' => '1',
                                'options'  => array(
                                    'filled'  => esc_html__('Filled button', 'iasion-themenow'),
                                    'bordered'   => esc_html__('Bordered button', 'iasion-themenow'),
                                ),
                            ),
                            array(
                                'id'    => 'btn_text',
                                'type'  => 'text',
                                'title' => esc_html__('Button text', 'iasion-themenow'),
                                'desc' => esc_html__('Type button text', 'iasion-themenow'),
                            ),
                            array(
                                'id'    => 'linkto',
                                'type'  => 'select',
                                'title' => esc_html__('Button link to', 'iasion-themenow'),
                                'desc' => esc_html__('Select button link source.', 'iasion-themenow'),
                                'default' => '1',
                                'options'  => array(
                                    '1'  => esc_html__('Page', 'iasion-themenow'),
                                    '2'   => esc_html__('External link', 'iasion-themenow'),
                                ),
                            ),
                            array(
                                'id'    => 'to_page',
                                'type'  => 'select',
                                'options'  => 'page',
                                'title' => esc_html__('Select page', 'iasion-themenow'),
                                'desc' => esc_html__('Select button link to page.', 'iasion-themenow'),
                                'dependency'   => array( 'linkto', '==', '1' ),
                            ),
                            array(
                                'id'    => 'to_external',
                                'type'  => 'text',
                                'title' => esc_html__('Link', 'iasion-themenow'),
                                'desc' => esc_html__('Type button external link', 'iasion-themenow'),
                                'dependency'   => array( 'linkto', '==', '2' ),
                            ),
                            array(
                                'id'    => 'tab',
                                'type'  => 'select',
                                'title' => esc_html__('Links open in', 'iasion-themenow'),
                                'desc' => esc_html__('Select button link behabour.', 'iasion-themenow'),
                                'default' => '_self',
                                'options'  => array(
                                    '_self'  => esc_html__('Same tab', 'iasion-themenow'),
                                    '_blank'   => esc_html__('New tab', 'iasion-themenow'),
                                ),
                            ),
                        )
                    ),

                            array(
                              'id'      => 'enable_overlay',
                              'type'    => 'switcher',
                              'default' => true,
                              'title'   => esc_html__('Enable overlay?', 'iasion-themenow'),
                            ),
                   
                          array(
                              'id'      => 'overlay_percentage',
                              'type'    => 'text',
                              'title'   => esc_html__('percentage overlay.', 'iasion-themenow'),
                              'desc'   => esc_html__('If you want to overlay.floating number  only max value 1.', 'iasion-themenow'),
                              'default' => '.4',
                              'dependency'   => array( 'enable_overlay', '==', 'true' ),
                            ),
                   
                          array(
                              'id'      => 'overlay_color',
                              'type'    => 'color_picker',
                              'title'   => esc_html__('overlay color', 'iasion-themenow'),
                              'default' => '#181a1f',
                              'dependency'   => array( 'enable_overlay', '==', 'true' ),
                            ),
                )  // 88888888888
            )
        )
    );


  //=====================================
           // Testimonial option
  //=====================================  
   
$options[]    = array(
  'id'        => 'iasion_testimonial_options',
  'title'     => esc_html__('iasion Testimonial Options', 'iasion-themenow'),
  'post_type' => 'testimonial', 
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(
     array(
        'name'  => 'iasion_slide_meta',
        'fields' => array(


              array(
                  'id'      => 'client_img',
                  'type'    => 'image',
                  'title'   => esc_html__('client image.', 'iasion-themenow'),
                
                ),
       
              
              array(
                  'id'      => 'client_name',
                  'type'    => 'text',
                  'title'   => esc_html__('client name.', 'iasion-themenow'),
                
                ),
       
              
        ),
 
 
      ),
    ),
);


 //=====================================
           // Page option
  //=====================================  

  $options[]    = array(
 'id'      => 'iasion_page_options',
 'title'     => esc_html__('iasion Page Options', 'iasion-themenow'),
 'post_type'     => 'page',
 'context'      => 'normal',
 'priority'      => 'high',
 'sections'      => array(

          //begin a section
  array(
    'name'      => 'iasion_section',

          //begin a field
    'fields'    => array(

      array(
        'id'    => 'enable_title',
        'title' => esc_html__('Enable title bar?','iasion-themenow'),
        'type'  => 'switcher',
        'default' => true,
        ),

      ),

    ),
  ),
 );

  //=====================================
         // Project option
  //===================================== 


  $options[]    = array(
        'id'        => 'iasion_project_meta',
        'title'     => esc_html__('Project Options', 'iasion-themenow'),
        'post_type' => 'project',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'iasion_project_meta_1',
                'fields' => array(
                    array(
                        'id'    => 'show_project_info',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => esc_html__('Show project infos?', 'iasion-themenow'),
                        'desc' => esc_html__('If you want to show project infos, select on.', 'iasion-themenow'),
                    ),
                    array(
                        'id'    => 'infos',
                        'type'  => 'group',
                        'title'           => esc_html__('Project infos', 'iasion-themenow'),
                        'desc'           => esc_html__('Add project info here.', 'iasion-themenow'),
                        'button_title'    => esc_html__('Add New info', 'iasion-themenow'),
                        'accordion_title' => esc_html__('Add New info', 'iasion-themenow'),
                        'fields'          => array(
                            array(
                                'id'    => 'title',
                                'type'  => 'text',
                                'title' => esc_html__('Info title', 'iasion-themenow'),
                                'desc' => esc_html__('Type info title', 'iasion-themenow'),
                            ),
                            array(
                                'id'    => 'text',
                                'type'  => 'text',
                                'title' => esc_html__('Info text', 'iasion-themenow'),
                                'desc' => esc_html__('Type info text', 'iasion-themenow'),
                            ),
                        ),
                        'dependency'   => array( 'show_project_info', '==', 'true' ),
                    ),
                    array(
                        'id'    => 'show_project_category',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => esc_html__('Show project category?', 'iasion-themenow'),
                        'desc' => esc_html__('If you want to show project category, select on.', 'iasion-themenow'),
                    ),
                    array(
                        'id'    => 'show_related_projects',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => esc_html__('Show related projects?', 'iasion-themenow'),
                        'desc' => esc_html__('If you want to show related projects, select on.', 'iasion-themenow'),
                    ),
                    array(
                        'id'    => 'related_projects_title',
                        'type'  => 'text',
                        'default' => esc_html__('Related projects', 'iasion-themenow'),
                        'title' => esc_html__('Related projects title', 'iasion-themenow'),
                        'desc' => esc_html__('Type related projects title', 'iasion-themenow'),
                        'dependency'   => array( 'show_related_projects', '==', 'true' ),
                    )
                )
            )
        )
    );



    return $options;

}
add_filter( 'cs_metabox_options', 'iasion_themenow_cs_metabox_options' );