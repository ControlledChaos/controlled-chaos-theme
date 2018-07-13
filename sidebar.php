<?php
/**
 * Sidebar class.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Output for various sidebars and widget areas
 * are added via template hooks for versatility.
 */
class Sidebar {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Get sidebar dependencies.
        $this->dependencies();

    }

    /**
     * Get sidebar dependencies.
     */
    public function dependencies() {

        include get_theme_file_path( '/template-parts/widgets/sidebars.php' );
        include get_theme_file_path( '/template-parts/widgets/footer.php' );

    }

}

// Run the Sidebar class.
new Sidebar;