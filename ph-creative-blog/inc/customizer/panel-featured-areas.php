<?php

function phcreativeblog_featured_areas_customize_register($wp_customize) {
    // Featured Areas
    $wp_customize->add_panel(
        'phcreativeblog-featured-areas', array(
            'title' => __('Featured Areas', 'ph-creative-blog'),
            'priority' => 30
        )
    );

    // Featured Areas Section Generator
    for ($i = 1; $i < 3; $i++) :
        $wp_customize->add_section(
            'phcreativeblog-fa-'.$i, array(
                'title' => __('Featured Posts Area - ', 'ph-creative-blog').$i,
                'priority' => 10,
                'panel' => 'phcreativeblog-featured-areas'
            )
        );

        // Enable
        $wp_customize->add_setting(
            'phcreativeblog-fa-enable-'.$i, array(
                'default' => 0,
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'phcreativeblog-fa-enable-'.$i, array(
                'type' => 'checkbox',
                'section' => 'phcreativeblog-fa-'.$i,
                'label' => __('Enable', 'ph-creative-blog'),
                'description' => __('Enable this Featured Area.', 'ph-creative-blog'),
            )
        );

        // Category Select Box
        $wp_customize->add_setting(
            'phcreativeblog-fa-cat-'.$i, array(
                'default' => 0,
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            new phcreativeblog_WP_Customize_Category_Control(
                $wp_customize, 'phcreativeblog-fa-cat-'.$i, array(
                    'label' => __('Category', 'ph-creative-blog'),
                    'description' => __('Category whose posts need to be featured', 'ph-creative-blog'),
                    'priority' => 10,
                    'section' => 'phcreativeblog-fa-'.$i,
                )
            )
        );

        // Show Title Checkbox
        $wp_customize->add_setting(
            'phcreativeblog-fa-show-title-'.$i, array(
                'default' => 0,
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'phcreativeblog-fa-show-title-'.$i, array(
                'type' => 'checkbox',
                'section' => 'phcreativeblog-fa-'.$i,
                'label' => __('Show Title', 'ph-creative-blog'),
                'description' => __('By Default, the category name will appear as the title above the featured section.', 'ph-creative-blog'),
            )
        );

        // Add setting and control for background image
        $wp_customize->add_setting(
            'phcreativeblog-fa-background-image-'.$i, array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize, 'phcreativeblog-fa-background-image-control-'.$i, array(
                    'label' => __('Background Image', 'ph-creative-blog'),
                    'section' => 'phcreativeblog-fa-'.$i,
                    'settings' => 'phcreativeblog-fa-background-image-'.$i
                )
            )
        );

        // Style Selector
        $wp_customize->add_setting(
            'phcreativeblog-fa-style-'.$i, array(
                'default' => 'style1',
                'sanitize_callback' => 'phcreativeblog_sanitize_fa_style'
            )
        );

        $wp_customize->add_control(
            new phcreativeblog_Image_Radio_Control($wp_customize, 'phcreativeblog-fa-style-'.$i, array(
                'type' => 'radio',
                'label' => esc_html__('Select Featured Area Style', 'ph-creative-blog'),
                'section' => 'phcreativeblog-fa-'.$i,
                'settings' => 'phcreativeblog-fa-style-'.$i,
                'choices' => array(
                    'style1' => get_template_directory_uri().'/inc/customizer/images/fa-style1.png',
                    'style2' => get_template_directory_uri().'/inc/customizer/images/fa-style2.png',

                )
            ))
        );

    endfor;

}
add_action('customize_register', 'phcreativeblog_featured_areas_customize_register');
