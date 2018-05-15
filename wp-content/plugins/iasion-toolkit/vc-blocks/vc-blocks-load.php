<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Class started
class iasionVCExtendAddonClass {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'iasionIntegrateWithVC' ) );
    }
 
    public function iasionIntegrateWithVC() {
        // Checks if Visual composer is not installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'iasionShowVcVersionNotice' ));
            return;
        }
 

        // visual composer addons.
        
        include IASION_ACC_PATH . '/vc-blocks/vc-section-title.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-slides.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-service.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-button.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-counter.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-posts-block.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-staff.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-testimonials.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-logo-carousel.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-cta.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-custom-map.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-projects.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-process-box.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-pricing.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-video-popup.php';
        include IASION_ACC_PATH . '/vc-blocks/vc-feature.php';
        

    }

    public function iasionShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.esc_url(site_url()).'/wp-admin/themes.php?page=iasion-install-plugins">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'iasion-themenow'), $theme_data->get('Name')).'</p>
        </div>';
    }
}
// Finally initialize code 
new iasionVCExtendAddonClass();