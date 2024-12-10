<?php
/*
* Header Customization Panel
* Site Identity (Desktop Logo Width, Logo Mobile)
* Section - Header Image
* Section - Header Settings - Top Bar (enable, disable). Date (Enable/disable), Search form (enable/disable)
* Section - Header Mobile
*/
function phcreativeblog_header_customize_register($wp_customize) {

	$wp_customize->add_panel(
		'phcreativeblog-header-settings', array(
			'title'		=>	__('Header Settings', 'ph-creative-blog'),
			'priority'	=>	20
		)
	);
	
	$wp_customize->get_section('title_tagline')->panel = 'phcreativeblog-header-settings';
	$wp_customize->get_section('title_tagline')->priority = 5;
	$wp_customize->get_section('header_image')->panel = 'phcreativeblog-header-settings';
	$wp_customize->get_section('header_image')->priority = 5;
	
	//Logo
	$wp_customize->add_setting( 'phcreativeblog-logo-max-height', array(
		'default' => 90,
		'sanitize_callback' => 'absint'
	));
	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'phcreativeblog-logo-max-height',
			array(
				'label'    => __( 'Logo height (in pixels)', 'ph-creative-blog' ),
				'description'    => __( 'Adjust Height of Logo in desktop view if its too large. This only affects the maximum height. If your logo is small, it will not make it bigger.', 'ph-creative-blog' ),
				'section'  => 'title_tagline',
				'settings' => 'phcreativeblog-logo-max-height',
				'priority' => 5,
				'type'     => 'range',
				'input_attrs' => array(
					'min' => 30,
					'max' => 100,
					'step' => 1,
				  )
			)
		)
	);
	
	$wp_customize->add_setting( 'phcreativeblog-mobile-logo', array(
		'sanitize_callback' => 'esc_url_raw'
	));
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'phcreativeblog-mobile-logo-control', array(
		'label' => __('Mobile Logo (optional)','ph-creative-blog'),
		'description' => __('If you want a different logo to be used for mobile devices, you can use this setting. By Default, Main Logo will be shown for Desktop and Mobile both.','ph-creative-blog'),
		'priority' => 100,
		'section' => 'title_tagline',
		'settings' => 'phcreativeblog-mobile-logo',
		'button_labels' => array(// All These labels are optional
					'select' => __('Select Logo','ph-creative-blog'),
					'remove' => __('Remove Logo','ph-creative-blog'),
					'change' => __('Change Logo','ph-creative-blog'),
					)
	)));
	
	//Header Image
	$wp_customize->add_setting('pixahive-header-image-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-header-image-message', array(
				'label'		=>	__('Note:', 'ph-creative-blog'),
				'description'	=>	__('Header Image only appears when you choose Style 1 in <strong>Header Styles & Layouts</strong>. Header image doesn\'t appear when Style 2 is selected.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'header_image',
			)
		)
	);
	
	//Styles & Layouts
	$wp_customize->add_section(
		'phcreativeblog-header-styles-layouts', array(
			'title'		=>	__('Header Styles (Desktop)', 'ph-creative-blog'),
			'priority'	=>	30,
			'panel'		=>	'phcreativeblog-header-settings'
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-style', array(
			'default' => 'style1',
			'sanitize_callback'	=>	'phcreativeblog_sanitize_fa_style'
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Image_Radio_Control($wp_customize, 
			'phcreativeblog-header-style', array(
				'type' => 'radio',
				'label' => esc_html__('Select Header Style', 'ph-creative-blog'),
				'section' => 'phcreativeblog-header-styles-layouts',
				'settings' => 'phcreativeblog-header-style',
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/header-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/header-style2.png',
				)
			)
		)
	);
	
	//Colors (FOR STYLE 2 Only)
	$wp_customize->add_setting(
		'phcreativeblog-header-bg-color', array(
			'default'	=>	'#fff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-bg-color', array(
				'label'		=>	esc_html__('Header Background Color', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-header-bg-color',
				'description'	=>	esc_html__('Header layout 2 uses box shadow, its best to used it with white background. Also use change menu text and site title to dark colors.', 'ph-creative-blog'),
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value())
						||
						(
							(0 == $control->manager->get_setting('phcreativeblog-enable-header-gradient')->value())
							&&
							('style2' == $control->manager->get_setting('phcreativeblog-header-style')->value())
						)
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-bg-lighter-color', array(
			'default'	=>	'#222222',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-bg-lighter-color', array(
				'label'		=>	esc_html__('Header Background (Lighter Shade)', 'ph-creative-blog'),
				'description'	=>	esc_html__('Background color of social icons & search bar.', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-header-bg-lighter-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return ('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value());
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-top-bar-text-color', array(
			'default'	=>	'#FFFDEC',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-top-bar-text-color', array(
				'label'		=>	esc_html__('Top Bar Text Color', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-top-bar-text-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phcreativeblog-enable-top-bar')->value())
						&&
						('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value())
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-top-bar-bg-color', array(
			'default'	=>	'#3a3a3a',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-top-bar-bg-color', array(
				'label'		=>	esc_html__('Top Bar Background Color', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-top-bar-bg-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phcreativeblog-enable-top-bar')->value())
						&&
						('style2' == $control->manager->get_setting('phcreativeblog-header-style')->value())
					);
				}
			)	
		)
	);
	
	//Gradient for Header Background [Style3 Only]
	$wp_customize->add_setting(
		'phcreativeblog-enable-header-gradient', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phcreativeblog-enable-header-gradient', array(
			  'type' => 'checkbox',
			  'section'		=>	'phcreativeblog-header-styles-layouts',
			  'label' => __( 'Enable Header Gradient','ph-creative-blog' ),
			  'description' => __( 'This enables you to choose 2 colors for Header.','ph-creative-blog' ),
			  'active_callback' => function($control) {
				  return ('style3' == $control->manager->get_setting('phcreativeblog-header-style')->value());
			  }
			)	
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-gradient-left', array(
			'default'	=>	'#c90000',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-gradient-left', array(
				'label'		=>	esc_html__('Header Gradient (Left)', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-header-gradient-left',
				'priority'	=>	29,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phcreativeblog-enable-header-gradient')->value())
						&&
						('style3' == $control->manager->get_setting('phcreativeblog-header-style')->value())
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-gradient-right', array(
			'default'	=>	'#8158ff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-gradient-right', array(
				'label'		=>	esc_html__('Header Gradient (Right)', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-header-gradient-right',
				'priority'	=>	29,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phcreativeblog-enable-header-gradient')->value())
						&&
						('style3' == $control->manager->get_setting('phcreativeblog-header-style')->value())
					);
				}
			)	
		)
	);
	
	
	//END Header Gradient
	
	//Header content Color
	$wp_customize->add_setting(
		'phcreativeblog-header-content-color', array(
			'default'	=>	'#FFFFFF',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-content-color', array(
				'label'		=>	esc_html__('Header Content Color', 'ph-creative-blog'),
				'description'	=>	esc_html__('Used by social icons, search bar.', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-styles-layouts',
				'settings'	=>	'phcreativeblog-header-content-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return ('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value());
				}
			)	
		)
	);
	//Header Content Color ENDS
	
	//Enable Top Bar
	$wp_customize->add_setting(
		'phcreativeblog-enable-top-bar', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phcreativeblog-enable-top-bar', array(
			  'type' => 'checkbox',
			  'section'		=>	'phcreativeblog-header-styles-layouts',
			  'label' => __( 'Enable Top Bar','ph-creative-blog' ),
			  'description' => __( 'This enables an additional top bar above header containing Top Menu on the right, and Date on left.','ph-creative-blog' ),
			  'active_callback' => function($control) {
				  return ('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value());
			  }
			)	
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-enable-date', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phcreativeblog-enable-date', array(
			  'type' => 'checkbox',
			  'section'		=>	'phcreativeblog-header-styles-layouts',
			  'label' => __( 'Enable Date in Top Bar','ph-creative-blog' ),
			  'active_callback' => function($control) {
				  return (
					  (true == $control->manager->get_setting('phcreativeblog-enable-top-bar')->value())
					  &&
					  ('style1' !== $control->manager->get_setting('phcreativeblog-header-style')->value())
				  );
			  },
			  
			)	
	);


	//Header (Mobile)
	$wp_customize->add_section(
		'phcreativeblog-header-mobile', array(
			'title'		=>	__('Header Style (Mobile)', 'ph-creative-blog'),
			'priority'	=>	30,
			'panel'		=>	'phcreativeblog-header-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-header-mobile-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-header-mobile-message', array(
				'label'		=>	__('Header (Mobile)', 'ph-creative-blog'),
				'description'	=>	__('For a Better User experience, PH News Center uses a smaller Mobile Header with just the logo and Menu Icon. The Search Bar, Social Icons, Complete Menu appear when the Hamburger (<span class="dashicons dashicons-menu-alt"></span>) Icon is clicked.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'phcreativeblog-header-mobile',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-mobile-bg-color', array(
			'default'	=>	'#FFFFFF',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-mobile-bg-color', array(
				'label'		=>	esc_html__('Header Background Color', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-mobile',
				'settings'	=>	'phcreativeblog-header-mobile-bg-color',
				'priority'	=>	30,
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phcreativeblog-header-mobile-text-color', array(
			'default'	=>	'#222222',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phcreativeblog-header-mobile-text-color', array(
				'label'		=>	esc_html__('Content Color (Title/Icons)', 'ph-creative-blog'),
				'section'	=>	'phcreativeblog-header-mobile',
				'settings'	=>	'phcreativeblog-header-mobile-text-color',
				'priority'	=>	30,
			)	
		)
	);
	
	
	//Social
	$wp_customize->add_section(
		'phcreativeblog-social-links', array(
			'title'		=>	__('Social Links', 'ph-creative-blog'),
			'priority'	=>	30,
			'panel'		=>	'phcreativeblog-header-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-social-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-social-message', array(
				'label'		=>	__('How to Set up Social Icons in Header?', 'ph-creative-blog'),
				'description'	=>	__('PH News Center themes supports social icons via WordPress menus. Its really easy to add and the info is retained when you switch themes. Here is how you do it. <br><br><strong>Step 1. </strong>Go to Appearance > Menus. Create a New Menu. <br><strong>Step 2. </strong>Add Menu Item. Choose Custom Links. Enter your Social Profile URL. Leave the <em>Link Text</em> field blank. Repeat for all social networks you want to display.<br><strong>Step 3. </strong>Choose Menu location as Social Networks, and press Save. <br><br>PH News Center theme is smart enough and will automatically connect your social urls with correct icons. The theme supports all top social networks.', 'ph-creative-blog'),
				'priority'		=>	1,
				'section'		=>	'phcreativeblog-social-links',
			)
		)
	);
	
}
add_action('customize_register','phcreativeblog_header_customize_register');