<?php
/**
 * Bookmark icons.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- General bookmark icon -->
<link rel="shortcut icon" href="<?php echo get_theme_file_uri( '/assets/images/bookmarks/favicon.png' ); ?>" type="image/png" />
<!-- Android bookmark icon -->
<link rel="icon" href="<?php echo get_theme_file_uri( '/assets/images/bookmarks/android-icon.png' ); ?>" sizes="192x192" type="image/png" />
<!-- iOS bookmark icon -->
<link rel="apple-touch-icon" href="<?php echo get_theme_file_uri( '/assets/images/bookmarks/ios-icon.png' ); ?>" type="image/png" />
<!-- Microsoft bookmark icon -->
<meta name="msapplication-TileImage" content="<?php echo get_theme_file_uri( '/assets/images/bookmarks/ms-icon.png' ); ?>" type="image/png" />