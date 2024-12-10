<?php
/**
 *	Basic Settings
 *  Background Image
 *  Homepage
 *  Archives
 *  Search Results Page
 *  Page Settings
 *  Single Post Settings
 *  404 Error Page
 */ 
function phcreativeblog_basic_settings_customize_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'phcreativeblog-basic-settings', array(
			'title'		=>	__('Basic Settings', 'ph-creative-blog'),
			'priority'	=>	20
		)
	);
	
	//Homepage Settings
	$wp_customize->add_section(
		'phcreativeblog-homepage', array(
			'title'		=>	__('Homepage (Blog)', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-latest-post-title', array(
			'default'		=>	__('Latest Story','ph-creative-blog'),
			'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		'phcreativeblog-latest-post-title', array(
			  'type' => 'text',
			  'section'		=>	'phcreativeblog-homepage',
			  'label' => __( 'Latest Posts Heading','ph-creative-blog' ),
			  'description' => __( 'The Heading of the Section which displays the latest posts on the homepage. Below all featured areas.','ph-creative-blog' ),
			)	
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-home-layout', array(
			'default' => 'style1',
			'sanitize_callback'	=>	'phcreativeblog_sanitize_fa_style'
		)
	);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-home-layout', array(
				'type' => 'radio',
				'label' => esc_html__('Latest Posts Style', 'ph-creative-blog'),
				'section' => 'phcreativeblog-homepage',
				'settings' => 'phcreativeblog-home-layout',
				'input_attrs' => array('class' => 'blog_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/content-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/content-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/content-style3.png',
					'style4' => get_template_directory_uri() . '/inc/customizer/images/content-style4.png',
				)
			)
		)
	);
	
	$wp_customize->add_setting(
			'phcreativeblog-primary-width-home', array(
				'default'	=>	'right-sidebar',
				'sanitize_callback'	=>	'phcreativeblog_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-primary-width-home', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-creative-blog'),
				'section' => 'phcreativeblog-homepage',
				'settings' => 'phcreativeblog-primary-width-home',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//Background Image
	$wp_customize->get_section('background_image')->panel = 'phcreativeblog-basic-settings';
	$wp_customize->get_section('background_image')->priority = 5;
	
	//Archives
	$wp_customize->add_section(
		'phcreativeblog-archives', array(
			'title'		=>	__('Archives (Category/Tags)', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-archive-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	
			
	$wp_customize->add_setting(
			'phcreativeblog-primary-width-archives', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phcreativeblog_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-primary-width-archives', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-creative-blog'),
				'section' => 'phcreativeblog-archives',
				'settings' => 'phcreativeblog-primary-width-archives',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
		
	//Page Settings.
	$wp_customize->add_section(
		'phcreativeblog-page-settings', array(
			'title'		=>	__('Pages', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-page-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-page-message', array(
				'label'		=>	__('Page Settings', 'ph-creative-blog'),
				'description'	=>	__('Use this section to customize the layout of pages of your site.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'phcreativeblog-page-settings',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-primary-width-page', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phcreativeblog_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-primary-width-page', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-creative-blog'),
				'section' => 'phcreativeblog-page-settings',
				'settings' => 'phcreativeblog-primary-width-page',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//Single Post Settings.
	$wp_customize->add_section(
		'phcreativeblog-single-post', array(
			'title'		=>	__('Single Posts', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-single-post-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-single-post-message', array(
				'label'		=>	__('Single Post Settings', 'ph-creative-blog'),
				'description'	=>	__('Use this section to customize the layout of Single Posts. Navigate to one of the published posts to view changes on the right side.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'phcreativeblog-single-post',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-single-post-style', array(
				'default'	=>	'style3',
				'sanitize_callback'	=>	'phcreativeblog_sanitize_fa_style'
			)
		);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-single-post-style', array(
				'type' => 'radio',
				'label' => esc_html__('Post Style', 'ph-creative-blog'),
				'section' => 'phcreativeblog-single-post',
				'settings' => 'phcreativeblog-single-post-style',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/single-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/single-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/single-style3.png',
				)
			)
		)
	);	
	
	$wp_customize->add_setting(
		'phcreativeblog-primary-width-single-post', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phcreativeblog_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-primary-width-single-post', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-creative-blog'),
				'section' => 'phcreativeblog-single-post',
				'settings' => 'phcreativeblog-primary-width-single-post',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);	
	
	//Search Results Page
	$wp_customize->add_section(
		'phcreativeblog-search-results', array(
			'title'		=>	__('Search Results Page', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-search-results-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);

	$wp_customize->add_setting(
		'phcreativeblog-primary-width-search', array(
			'default'	=>	'no-sidebar-narrow-primary',
			'sanitize_callback'	=>	'phcreativeblog_sanitize_sidebar_layout'
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-primary-width-search', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-creative-blog'),
				'section' => 'phcreativeblog-search-results',
				'settings' => 'phcreativeblog-primary-width-search',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//404 Error Page Settings.
	$wp_customize->add_section(
		'phcreativeblog-404-error', array(
			'title'		=>	__('404 Error Page', 'ph-creative-blog'),
			'priority'	=>	10,
			'panel'		=>	'phcreativeblog-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-404page-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-404page-message', array(
				'label'		=>	__('404 Page', 'ph-creative-blog'),
				'description'	=>	__('Use this page to customize the 404 Error Page.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'phcreativeblog-404-error',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-enable-404-posts', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phcreativeblog-enable-404-posts', array(
			  'type' => 'checkbox',
			  'section'		=>	'phcreativeblog-404-error',
			  'label' => __( 'Show Latest Posts on 404 Page','ph-creative-blog' ),
			)	
	);
	
	
	
}
add_action('customize_register', 'phcreativeblog_basic_settings_customize_register');