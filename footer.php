<?php
/**
 * Footer content, scripts and end HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 *
 */

namespace CC_Theme;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

class Footer {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Open hook.
        do_action( 'cct_before_footer' );

        // Get footer HTML output.
        $this->footer();

        // Open hook.
        do_action( 'cct_after_footer' );

        // Get additional footer scripts.
        $this->scripts();

        // Load enqueued scripts.
        wp_footer();

    }

    /**
     * Get footer HTML output.
     */
    public function footer() {

        get_template_part( 'template-parts/footer/footer' );

    }

    /**
     * Get additional footer scripts.
     */
    public function scripts() {

        include get_theme_file_path( '/template-parts/footer/footer-scripts.php' );

    }

}

// Run the Footer class.
new Footer; ?>
</body>
</html>