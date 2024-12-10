<?php 
function phcreativeblog_colors_customize_register($wp_customize) {
	
	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','ph-creative-blog');
	$wp_customize->get_section('colors')->title = __('Website Color Scheme','ph-creative-blog');
	
	$wp_customize->add_setting(
		'phcreativeblog-background-darker-color', array(
			'default'	=>	'#eeeeee',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-background-darker-color', array(
				'label'		=>	__('Background (Darker Shade)', 'ph-creative-blog'),
				'description' =>	__('A Slightly darker shade of the main background color. Helpful in adding accents to the design.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-background-darker-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-primary-color', array(
			'default'	=>	'#FF0F4B',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-primary-color', array(
				'label'		=>	__('Primary Color', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-primary-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-primary-text-color', array(
			'default'	=>	'#f9ffe7',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-primary-text-color', array(
				'label'		=>	__('Primary Text Color', 'ph-creative-blog'),
				'description' => __('This is the color of the text, where the background color is Primary color. Like Menu Bar, Buttons, etc.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-primary-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	//Secondary
	$wp_customize->add_setting(
		'phcreativeblog-secondary-color', array(
			'default'	=>	'#747474',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-secondary-color', array(
				'label'		=>	__('Secondary Color', 'ph-creative-blog'),
				'description' => __('Secondary Color. Used for Links within content, sidebar, etc.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-secondary-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-secondary-text-color', array(
			'default'	=>	'#f9ffe7',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-secondary-text-color', array(
				'label'		=>	__('Secondary Text Color', 'ph-creative-blog'),
				'description' => __('This is the color of the text, where the background color is Secondary color. Like Module Headings, Some Buttons, etc.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-secondary-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-secondary-dark-color', array(
			'default'	=>	'#B6002E',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-secondary-dark-color', array(
				'label'		=>	__('Secondary Color (Darker Shade)', 'ph-creative-blog'),
				'description' => __('Darker shade of Secondary color. Used on Link Hover, etc.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-secondary-dark-color',
				'priority'	=>	30
			)	
		)
	);
	
	//Text Colors.
	$wp_customize->add_setting(
		'phcreativeblog-text-color', array(
			'default'	=>	'#555555',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-text-color', array(
				'label'		=>	__('Text Color', 'ph-creative-blog'),
				'description' =>	__('Text Color. Main color of the content.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-text-dark-color', array(
			'default'	=>	'#111111',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-text-dark-color', array(
				'label'		=>	__('Text Color (Darker shade)', 'ph-creative-blog'),
				'description' =>	__('Darker Shade of the text color. Used for headings and important text.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-text-dark-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-text-light-color', array(
			'default'	=>	'#777777',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-text-light-color', array(
				'label'		=>	__('Text Color (Lighter Shade)', 'ph-creative-blog'),
				'description' =>	__('Lighter Shade of Text Color. Used for Top Menu, Meta Data and other text.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-text-light-color',
				'priority'	=>	30
			)	
		)
	);

	$wp_customize->add_setting(
		'phcreativeblog-menu-text-color', array(
			'default'	=>	'#232323',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-menu-text-color', array(
				'label'		=>	__('Menu Text Color', 'ph-creative-blog'),
				'description' =>	__('Used by navigation links in main menu.', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-menu-text-color',
				'priority'	=>	30
			)	
		)
	);

	$wp_customize->add_setting(
		'phcreativeblog-bg-vibrant-color', array(
			'default'	=>	'#acfff9',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-bg-vibrant-color', array(
				'label'		=>	__('Vibrant Background Color For Layouts', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-bg-vibrant-color',
				'description' => 'This color is used  as background color in blog layout 2 even rows',
				'priority'	=>	30
			)	
		)
	);

	$wp_customize->add_setting(
		'phcreativeblog-bg-light-color', array(
			'default'	=>	'#fffbd5',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-bg-light-color', array(
				'label'		=>	__('Light Background Color For Layouts', 'ph-creative-blog'),
				'section'	=>	'colors',
				'settings'	=>	'phcreativeblog-bg-light-color',
				'description' => 'This color is used as background color in blog layout 2 odd rows',
				'priority'	=>	30
			)	
		)
	);
		
}
add_action('customize_register','phcreativeblog_colors_customize_register');