<?php
/**
 * Sidebar HTML and widget output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Sidebar HTML template.
 */
class Sidebar_Widgets {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Add primary sidebar.
        add_action( 'cct_content_aside', [ $this, 'primary' ], 20 );

        // Add primary sidebar.
        add_action( 'cct_content_aside', [ $this, 'secondary' ], 21 );

    }

    /**
	 * Primary sidebar.
     * 
     * @since  1.0.0
	 */
    public function primary() {
        
        /**
         * Get sidebar output if widgets are active and if
         * the No Sidebars template is not used.
         */
        if ( is_page_template( 'page-templates/no-sidebars.php' ) ) {
            $sidebar = '';
        } elseif ( is_active_sidebar( 'primary-sidebar' ) ) {
            $sidebar = get_template_part( 'template-parts/widgets/partials/sidebar', 'primary' );
        } else {
            $sidebar = null;
        }

        echo $sidebar;

    }

    /**
	 * Secondary sidebar.
     * 
     * @since  1.0.0
	 */
    public function secondary() {
        
        /**
         * Get sidebar output if widgets are active and if
         * the Two Sidebars template is used.
         */
        if ( is_page_template( 'page-templates/no-sidebars.php' ) ) {
            $sidebar = '';
        } elseif ( is_active_sidebar( 'secondary-sidebar' ) && is_page_template( 'page-templates/two-sidebars.php' ) ) {
            $sidebar = get_template_part( 'template-parts/widgets/partials/sidebar', 'secondary' );
        } else {
            $sidebar = null;
        }

        echo $sidebar;

    }

}

new Sidebar_Widgets;