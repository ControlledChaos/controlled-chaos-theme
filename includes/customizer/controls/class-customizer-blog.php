<?php
/**
 * Customizer blog controls.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

// Do not namespace this class.

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizer blog controls.
 */
class Customizer_Blog {

    /**
	 * Initialize the class.
	 */
	public function __construct() {

        // Blog panel.
		add_action( 'customize_register', [ $this, 'blog' ] );

    }

    /**
     * Blog panel.
     */
    public function blog( $wp_customize ) {

        /**
		 * Framework settings panel.
		 */
		$wp_customize->add_section( 'cctheme_customizer_blog', [
			'priority'    => 35,
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Blog & Archives', 'controlled-chaos' ),
			'description' => __( 'Content and navigation archives.', 'controlled-chaos' )
        ] );
        
        // Blog content format.
		$wp_customize->add_setting( 'cctheme_blog_content_format', [
			'default'	        => 'content',
			'sanitize_callback' => 'cctheme_sanitize_blog_content_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cctheme_blog_content_format', [
			'section'     => 'cctheme_customizer_blog',
			'settings'    => 'cctheme_blog_content_format',
			'label'       => __( 'Blog Content', 'controlled-chaos' ),
			'description' => __( 'Full content or excerpts', 'controlled-chaos' ),
			'type'        => 'select',
			'choices'     => [
				'content' => __( 'Full Content', 'controlled-chaos' ),
				'excerpt' => __( 'Excerpts', 'controlled-chaos' )
				]
			]
		) );
		
		// Archive content format.
		$wp_customize->add_setting( 'cctheme_archive_content_format', [
			'default'	        => 'content',
			'sanitize_callback' => 'cctheme_sanitize_archive_content_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cctheme_archive_content_format', [
			'section'     => 'cctheme_customizer_blog',
			'settings'    => 'cctheme_archive_content_format',
			'label'       => __( 'Archive Content', 'controlled-chaos' ),
			'description' => __( 'Full content or excerpts', 'controlled-chaos' ),
			'type'        => 'select',
			'choices'     => [
				'content' => __( 'Full Content', 'controlled-chaos' ),
				'excerpt' => __( 'Excerpts', 'controlled-chaos' )
				]
			]
        ) );
        
        // Blog/archive navigation format.
		$wp_customize->add_setting( 'cctheme_blog_navigation_format', [
			'default'	        => 'standard',
			'sanitize_callback' => 'cctheme_sanitize_blog_navigation_format'
		] );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cctheme_blog_navigation_format', [
			'section'     => 'cctheme_customizer_blog',
			'settings'    => 'cctheme_blog_navigation_format',
			'label'       => __( 'Blog Pages Navigation', 'controlled-chaos' ),
			'description' => __( 'Next/previous links or page count.', 'controlled-chaos' ),
			'type'        => 'select',
			'choices'     => [
				'standard' => __( 'Next/Previous', 'controlled-chaos' ),
				'numeric'  => __( 'Page Count', 'controlled-chaos' )
				]
			]
		) );

    }
    
}

new Customizer_Blog;