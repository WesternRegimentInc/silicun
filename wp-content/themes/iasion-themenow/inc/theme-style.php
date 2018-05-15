<?php

$iasion_body_font_get = cs_get_option('iasion_body_font');
$iasion_heading_font_get = cs_get_option('iasion_heading_font');

function iasion_body_gf_url() {
    $font_url = '';
    $iasion_body_font_get = cs_get_option('iasion_body_font');
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'iasion-themenow' ) ) {
    	if($iasion_body_font_get) {
        	$font_url = add_query_arg( 'family', urlencode( ''.$iasion_body_font_get['family'].':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    	} else {
    		$font_url = 'https://fonts.googleapis.com/css?family=Open+Sans';
    	}
    }
    return $font_url;
}

if($iasion_heading_font_get['family'] == $iasion_body_font_get['family']) {} else {
    function iasion_heading_gf_url() {
        $font_url = '';
        $iasion_heading_font_get = cs_get_option('iasion_heading_font');
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'iasion-themenow' ) ) {
        	if($iasion_heading_font_get) {
            	$font_url = add_query_arg( 'family', urlencode( ''.$iasion_heading_font_get['family'].':300,300i,400,400i,700,700i,900,900i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        	} else {
    			$font_url = 'https://fonts.googleapis.com/css?family=Montserrat';
        	}
        }
        
        return $font_url;
    }    
}

function iasion_options_gf() {
    wp_enqueue_style( 'iasion-custom-google-fonts', iasion_body_gf_url(), array(), '1.0.0' );
    
    $iasion_body_font_get = cs_get_option('iasion_body_font');
    $iasion_heading_font_get = cs_get_option('iasion_heading_font');
    if($iasion_heading_font_get['family'] == $iasion_body_font_get['family']) {} else {
        wp_enqueue_style( 'iasion-google-heading-fonts', iasion_heading_gf_url(), array(), '1.0.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'iasion_options_gf' );    

if ( ! function_exists( 'iasion_color_theme' ) ) :

	function iasion_color_theme() {

		
		$iasion_body_font = cs_get_option('iasion_body_font');
		$iasion_body_font_size = cs_get_option('iasion_body_font_size');
		$iasion_heading_font = cs_get_option('iasion_heading_font');
		$iasion_theme_color = cs_get_option('iasion_theme_color');
		$footer_bg_color = cs_get_option('footer_bg_color');
		$footer_color = cs_get_option('footer_color');

        if(!isset($iasion_body_font)) {
            $iasion_body_font['family'] = 'Open Sans';
            $iasion_body_font['variant'] = '300';
        }
        if(!isset($iasion_body_font_size)) {
            $iasion_body_font_size = '14px';
        }

        if(!isset($iasion_heading_font)) {
            $iasion_heading_font['family'] = 'Montserrat';
            $iasion_heading_font['variant'] = '700';
        }

        if(!isset($iasion_theme_color)) {
            $iasion_theme_color = '#6fb98f';
        }

        if(!isset($footer_bg_color)) {
            $footer_bg_color = '#0b120e';
        }

        if(!isset($footer_color)) {
            $footer_color = '#cacaca';
        }
        
        wp_enqueue_style(
			'iasion-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css'
		);
        
        $custom_css = "";
		
		if (!empty($iasion_body_font)) {
			$custom_css .= "
				body, .mainmenu-area {  
					font-family: {$iasion_body_font['family']};
					font-weight: {$iasion_body_font['variant']};
				}
			";
		}

		if (!empty($iasion_body_font_size)) {
			$custom_css .= "
				body {
					font-size: {$iasion_body_font_size};
				}
			";
		}

		if (!empty($iasion_heading_font)) {
			$custom_css .= "
				h1, h2, h3, h4, h5, h6 {
					font-family: {$iasion_heading_font['family']};
					font-weight: {$iasion_heading_font['variant']};
				}
			";
		}
    
		if (!empty($footer_bg_color)) {
			$custom_css .= "
				.footer-top-widgets, .footer-copyright-area  {
					background-color: {$footer_bg_color};
				}
			";
		}

		if (!empty($footer_color)) {
			$custom_css .= "
				.footer-top-widgets, .footer-top-widgets a, .footer-copyright-area {
					color: {$footer_color};
				}
			";
		}
        
        
        
        if (!empty($iasion_theme_color)) {
			$custom_css .= "
                .iasion-btn, .spinner2, .vc_wp_custommenu ul > a .consulting-form input[type='submit'], input[type='submit'], .section-title-dot, .iasion-btn.iasion-cta-btn, .iasion-btn.iasion-iconic-btn, .iasion-boxed-info i.fa, .loadmore-project-btn, .single-related-project::after, .single-project .entry-content h3::after, .search-form input[type='submit'], .widget-title::after, .widgettitle::after, .iasion-counter-box, .iasion-slides .owl-nav div::after, .vc_row.color-overlay::after {
                    background-color: {$iasion_theme_color};
                }
			";
			$custom_css .= "
                a:focus, a:hover{
                    color: {$iasion_theme_color};
                }
                .seo-stat-box h1{
                    color: {$iasion_theme_color};
                }
                .iasion-service-icon{
                	color:{$iasion_theme_color};
                }
                .iasion-staff-detail h4{
                 color:{$iasion_theme_color};    
                }
                .posted-on{
                    background-color:{$iasion_theme_color};
                }
                .pagination a.current{
                 border-color:{$iasion_theme_color};
                }
                .page-numbers .current{
                 color:{$iasion_theme_color};        
                }
                .iasion-blog-btn{
                    color:{$iasion_theme_color}; 
                }
                .service-more-btn{
                	color:{$iasion_theme_color};
                }
                .dc-post-readmore{
                	color:{$iasion_theme_color};
                }
                .video-icon i{
                    color:{$iasion_theme_color};
                }

                .work-box-bg i.fa{
                    color:{$iasion_theme_color};
                    border-color:{$iasion_theme_color};
                }
                .lightbox i.fa{
                    color:{$iasion_theme_color};
                    border-color:{$iasion_theme_color};
                }
                .footer-top-widgets .widget_nav_menu ul li a::before{
                    color:{$iasion_theme_color};
                }

                .footer-top-widgets h3.footer-widget-title:after{
                     background: {$iasion_theme_color};
                }
                .contact h4{
                    color:{$iasion_theme_color};
                }

                .progress-consul .bar{
                    background:{$iasion_theme_color};
                }
                
                .iasion-blog-btn:hover{
                   color:{$iasion_theme_color};
                }
                .iasion-project-info-item label{
                    color:{$iasion_theme_color};
                }

                .blog-breadcrumb-area{
                    background-color: {$iasion_theme_color};
                }
                
			";
			$custom_css .= "
                .seo-contact-form input[type=submit], button[type=submit]{
                    background-color: {$iasion_theme_color};
                }
                 .iasion-staff-social-link li:hover a i{
                 	color:{$iasion_theme_color};
                 }
                 .comment-form p > input{
                 	color:{$iasion_theme_color};
                 }
                 .search-form input{
                 	color:{$iasion_theme_color};
                 }
                 .entry-meta a:hover, .entry-footer a:hover, .navigation.post-navigation .nav-links a{
                    color:{$iasion_theme_color};
                 }
                 article.sticky::after {
                    color:{$iasion_theme_color};
                 }
                 article.post p a{
                    color:{$iasion_theme_color};
                 }

                 .entry-footer a{
                    border-color:{$iasion_theme_color};
                 }
                 .seo-breadcrumb-area .border {
                    background: {$iasion_theme_color};
                 }
			";
			$custom_css .= "
                .owl-dot.active span{
                    background-color: {$iasion_theme_color};
                }
			";
			$custom_css .= "
                .vc_wp_custommenu li a:before {
                	background: {$iasion_theme_color};
                }
			";
			$custom_css .= "
                .vc_wp_custommenu li.current-menu-item a{
                	border: 2px solid {$iasion_theme_color};
                }
			";
			$custom_css .= "
                .iasion-btn, .entry-content .widget_nav_menu ul.menu li:hover a, .iasion-btn.iasion-iconic-btn, article.post a.iasion-btn:hover, .comment-author.vcard img,  .woocommerce #respond input#submit.alt, .iasion-service-box.iasion-service-box-style-2:hover {
                    border-color: {$iasion_theme_color};
                }
			";
			$custom_css .= "
                a.iasion-btn:hover, a.bordered-btn:hover, .iasion-cart-icon:hover, .footer-top-widgets h2.footer-widget-title, .dc-post-readmore:hover, .iasion-project-inner a:hover, .consulto-project-categories li.active, article.post a.iasion-btn:hover, .entry-footer a:hover, .widget a:hover, .comment-author b, .comment-author b a, .comment-metadata > a:hover, .reply .comment-reply-link, .reply .comment-reply-link:hover, .navigation.post-navigation .nav-links a {
                    color: {$iasion_theme_color};
                    border-color:{$iasion_theme_color};
                }
			";
			
		}
        
        

		wp_add_inline_style( 'iasion-custom-style', $custom_css );
	}

	add_action( 'wp_enqueue_scripts', 'iasion_color_theme' );

endif;