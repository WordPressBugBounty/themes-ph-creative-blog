<?php
/**
 *	Sidebar Recent Posts
 *  Featured Post Footer
 *  Scroll to Top
 *  Breadvrumbs
 *  Read More
 */ 
function phcreativeblog_general_settings_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'phcreativeblog-additional-settings', array(
			'title'		=>	__('PH Creative Blog Options', 'ph-creative-blog'),
			'priority'	=>	20
		)
	);

	// Scroll to Top
	$wp_customize-> add_section('phcreativeblog-scrl-to-top', array(
		'title'                    => __('Scroll to Top','ph-creative-blog'),
		'description'              => __('Check the box to disable scroll to top','ph-creative-blog'),
		'panel'                    => 'phcreativeblog-additional-settings'

	 ));
	
	 $wp_customize-> add_setting('phcreativeblog-scrl-to-top-set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phcreativeblog_sanitize_checkbox',
	 ));
	 
	 $wp_customize-> add_control( 'phcreativeblog-scrl-to-top', array(
		'label'                   => __('Enable Scroll to Top','ph-creative-blog'),
		'description'             => __('Check the box to disable scroll to top','ph-creative-blog'),
		'section'                 => 'phcreativeblog-scrl-to-top',
		'settings'                => 'phcreativeblog-scrl-to-top-set',
		'type'                    => 'checkbox',
	 ));

	 //checkbox sanitization 
	function phcreativeblog_sanitize_checkbox( $input ) {
	
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
     
	// BreadCrumbs
	 $wp_customize-> add_section('phcreativeblog-breadcrumbs', array(
		'title'                    => __('Breadcrumbs','ph-creative-blog'),
		'description'              => __('Check the box to enable Breadcrumbs','ph-creative-blog'),
		'panel'                    => 'phcreativeblog-additional-settings'

	 ));
	
	 $wp_customize-> add_setting('phcreativeblog-breadcrumbs_set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phcreativeblog_sanitize_checkbox'
	 ));

	 $wp_customize-> add_control( 'phcreativeblog-breadcrumbs_ctrl', array(
		'label'                   => __('Breadcrumbs','ph-creative-blog'),
		'description'             => __('Check the box to enable Breadcrumbs','ph-creative-blog'),
		'section'                 => 'phcreativeblog-breadcrumbs',
		'settings'                => 'phcreativeblog-breadcrumbs_set',
		'type'                    => 'checkbox',
	 ));

	 // Enable/disable Read More
	 $wp_customize-> add_section('phcreativeblog-readmore', array(
		'title'                    => __('Read More','ph-creative-blog'),
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phcreativeblog_sanitize_checkbox',
		'panel'                    => 'phcreativeblog-additional-settings'
	 ));

	 $wp_customize-> add_setting('phcreativeblog-readmore-set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phcreativeblog_sanitize_checkbox'
	 ));

	 $wp_customize-> add_control( 'phcreativeblog-readmore-set-ctrl', array(
		'label'                   => __('Enable/Disable Read More','ph-creative-blog'),
		'description'             => __('Check the box to Enable/Disable Read More','ph-creative-blog'),
		'section'                 => 'phcreativeblog-readmore',
		'settings'                => 'phcreativeblog-readmore-set',
		'type'                    => 'checkbox',
	 ));

	 // Add a section within the panel for sticky sidebar
	$wp_customize->add_section( 'phcreativeblog-sticky-sidebar', array(
		'title'    => __( 'Sticky Sidebar', 'ph-creative-blog' ),
		'priority' => 30,
		'panel'    => 'phcreativeblog-additional-settings', // Associate with the 'General Settings' panel
	) );

// Add a setting for sticky sidebar
	$wp_customize->add_setting( 'phcreativeblog-sticky-sidebar-set', array(
		'default'           => true,
		'sanitize_callback' => 'phcreativeblog_sanitize_checkbox', 
	) );

// Add a control to set the excerpt length
	$wp_customize->add_control( 'phcreativeblog-sticky-sidebar_ctrl', array(
		'label'    => __( 'Sticky Sidebar', 'ph-creative-blog' ),
		'section'  => 'phcreativeblog-sticky-sidebar',
		'settings' => 'phcreativeblog-sticky-sidebar-set',
		'type'     => 'checkbox',
		'description' => 'Check the box to enable sticky sidebar',
		'priority' => 10,
	) );

	     }	
add_action('customize_register', 'phcreativeblog_general_settings_customize_register');