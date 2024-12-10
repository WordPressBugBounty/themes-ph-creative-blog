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
function phcreativeblog_help_support_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		'phcreativeblog-help-support', array(
			'title'		=>	__('Theme Support & Docs', 'ph-creative-blog'),
			'priority'	=>	10,
		)
	);
	
	$wp_customize->add_setting('pixahive-welcome-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phcreativeblog_Custom_Notice_Control(
			$wp_customize, 'pixahive-welcome-message', array(
				'label'		=>	__('Thank you for choosing PH Creative Blog theme by PixaHive.', 'ph-creative-blog'),
				'description'	=>	__('PH Creative Blog is a brilliant theme in the making. We need your help make it even more better. If you have any feature suggestions, you are more than welcome. <br />. <a href="https://docs.google.com/document/d/1JHCgxldTWW4yoFTpPS_HRs_kPWSFbwSA5oMWfY8rmvE/edit?addon_store" target="_blank">Read Documentation / Contact Us</a> for support, requests, suggestions or just to say how awesome this theme is. To know what your site should look like, <a href="https://pixahive.com/themes/ph-creative-blog-demos/" target="_blank">view Theme Demo</a>.', 'ph-creative-blog'),
				'priority'		=>	10,
				'section'		=>	'phcreativeblog-help-support',
				'input_attrs' => array('class'=>'help-msg'),
			)
		)
	);
	
}
add_action('customize_register', 'phcreativeblog_help_support_customize_register');