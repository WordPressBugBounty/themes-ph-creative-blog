<?php
/**
 * phcreativeblog Theme Customizer
 * @package phcreativeblog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function phcreativeblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'phcreativeblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'phcreativeblog_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'phcreativeblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function phcreativeblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function phcreativeblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function phcreativeblog_customize_preview_js() {
	wp_enqueue_script( 'phcreativeblog-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), _phcreativeblog_VERSION, true );
}
add_action( 'customize_preview_init', 'phcreativeblog_customize_preview_js' );


function phcreativeblog_customizer_assets() {
	wp_enqueue_script( 'phcreativeblog-controls-js', get_template_directory_uri() . '/inc/customizer/js/controls.js', array( 'customize-preview' ), _phcreativeblog_VERSION, true );
	wp_enqueue_style( 'phcreativeblog-controls-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css' );
}
add_action('customize_controls_enqueue_scripts','phcreativeblog_customizer_assets');


//Custom Controls
require_once get_template_directory()."/inc/customizer/custom-controls.php";

//Import Other sections
require_once get_template_directory()."/inc/customizer/section-colors.php";
require_once get_template_directory()."/inc/customizer/section-help-support.php";
require_once get_template_directory()."/inc/customizer/panel-basic-settings.php";
require_once get_template_directory()."/inc/customizer/panel-header.php";
require_once get_template_directory()."/inc/customizer/panel-featured-areas.php";
require_once get_template_directory()."/inc/customizer/panel-footer.php";
require_once get_template_directory()."/inc/customizer/additional-settings.php";
require_once get_template_directory()."/inc/customizer/popular-post-widget.php";
require_once get_template_directory()."/inc/customizer/posts-slider.php";
require_once get_template_directory()."/inc/customizer/sanitize-functions.php";

