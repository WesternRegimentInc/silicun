<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iasion
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(cs_get_option('site_preloader')  != false){ ?>
    <div class="site_preloader">
      <div class="loader">
        <?php esc_html__('Loading...', 'iasion-themenow') ?>
      </div>
    </div>
<?php } ?>


<div id="page" class="site">

  <div class="mainmenu-area">
  	<div class="container">
  		<div class="row">
  	     <div class="col-md-3 col-xs-3 col-sm-3">
  		  <div class="logo">
  		  	<?php 
              
              $text_logo = cs_get_option('$text_logo');
              $logo_text = cs_get_option('$logo_text');
              $image_logo = cs_get_option('iasion_logo');
              $image_logo_attachment = wp_get_attachment_image_src($image_logo, 'full');
              $home_url = esc_url( home_url( '/' ) );

              if($text_logo == true && !empty($text_logo) ) : ?>
      
               <a href="<?php echo esc_url($home_url); ?>"><span>
               	 <?php if(!empty($logo_text)) {
               	 	  echo esc_html($logo_text);
               	 	  }else{
               	 	  	echo esc_html(bloginfo('name'));
               	 	  }
               	  ?>
               </span></a>
                <?php else : ?>

  		      <a href="<?php echo esc_url($home_url); ?>">
               <?php if($image_logo && !empty($image_logo))
                {?>
               <img src="<?php echo esc_url($image_logo_attachment[0]); ?>" alt="">
               <?php } 
               else { ?>
                  <span> <?php echo esc_html(bloginfo( 'name' ));
                   ?> </span> <?php }  ?>                                          
  		       </a>

  		       <?php endif; ?>

  		    </div>
  		  </div>
  		  <div class="col-md-9 main-menu-trans col-xs-pull-0 col-sm-pull-0">
  		  <div class="menu_col">
             
                 <div class="mainmenu">
                      <?php wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'menu_id' => 'primary-menu'
                      )); ?>
                  </div>
          </div>
          </div>
  		  	
  		  </div>	
  		</div>
  	</div>
  </div>

	