<?php
/**
 * CX Bladder back compat functionality
 *
 * Prevents CX Bladder from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage CX_Bladder
 * @since CX Bladder 1.0
 */

/**
 * Prevent switching to CX Bladder on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since CX Bladder 1.0
 */
function cxbladder_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'cxbladder_upgrade_notice' );
}
add_action( 'after_switch_theme', 'cxbladder_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * CX Bladder on WordPress versions prior to 4.1.
 *
 * @since CX Bladder 1.0
 */
function cxbladder_upgrade_notice() {
	$message = sprintf( __( 'CX Bladder requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'cxbladder' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since CX Bladder 1.0
 */
function cxbladder_customize() {
	wp_die( sprintf( __( 'CX Bladder requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'cxbladder' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'cxbladder_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since CX Bladder 1.0
 */
function cxbladder_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'CX Bladder requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'cxbladder' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'cxbladder_preview' );
