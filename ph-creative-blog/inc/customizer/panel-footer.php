<?php
/*
* Custom Copyright Text
* Enable Additional Footer Menu
* 
*/
function phcreativeblog_footer_customize_register($wp_customize) {

	$wp_customize->add_panel(
		'phcreativeblog-footer-settings', array(
			'title'		=>	__('Footer Settings', 'ph-creative-blog'),
			'priority'	=>	20
		)
	);

	 // Add Section
	 $wp_customize->add_section( 'phcreativeblog_footer_options', array(
        'title'    => __( 'Footer Options', 'ph-creative-blog' ),
        'priority' => 120, // Adjust the section priority as needed
    ));

    // Add Setting
    $wp_customize->add_setting( 'phcreativeblog_footer_column_choice', array(
        'default'           => 'four-columns', // Set default value
        'sanitize_callback' => 'sanitize_text_field', // Sanitize input
        'transport'         => 'refresh', // How the customizer should update the setting (refresh the page by default)
    ));

    // Add Control
    $wp_customize->add_control( 'phcreativeblog_footer_column_choice', array(
        'label'       => __( 'Footer Column Layout', 'ph-creative-blog' ),
        'section'     => 'phcreativeblog_footer_options',
        'settings'    => 'phcreativeblog_footer_column_choice',
        'type'        => 'select',
        'choices'     => array(
            'one-column'   => __( 'One Column', 'ph-creative-blog' ),
            'two-columns'  => __( 'Two Columns', 'ph-creative-blog' ),
            'three-columns' => __( 'Three Columns', 'ph-creative-blog' ),
            'four-columns' => __( 'Four Columns', 'ph-creative-blog' ),
        ),
    ));
		
}
add_action('customize_register','phcreativeblog_footer_customize_register');