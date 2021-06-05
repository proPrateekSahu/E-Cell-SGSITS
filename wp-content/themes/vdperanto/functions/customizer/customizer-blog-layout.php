<?php

function vdperanto_blog_layout_customizer($wp_customize) {

    $vdperanto_current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
        if (get_option('busiprof_user', 'new')=='old' || $vdperanto_current_options['upload_image'] != '') {

        $wp_customize->add_setting('busiprof_theme_options[blog_masonry3_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'vdperanto_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('busiprof_theme_options[blog_masonry3_layout_setting]', array(
            'default' => 'masonry3',
            'sanitize_callback' => 'vdperanto_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new vdperanto_Image_Radio_Button_Custom_Control($wp_customize, 'busiprof_theme_options[blog_masonry3_layout_setting]',
            array(
                'label' => esc_html__('Blog Layout Setting', 'vdperanto'),
                'section' => 'recent_blog_settings',
                'priority'              => 20,
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/vdperanto-blog-default.png',
                        'name' => esc_html__('Standard Layout', 'vdperanto')
                    ),
                    'masonry3' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/vdperanto-blog-masonry3.png',
                        'name' => esc_html__('Masonry 3 Column', 'vdperanto')
                    )
                )
            )
    ));
}
add_action('customize_register', 'vdperanto_blog_layout_customizer');

/**
 * Add selective refresh for Front page section section controls.
 */
function vdperanto_register_home_section_partials($wp_customize) {

    $wp_customize->selective_refresh->add_partial('busiprof_theme_options[recent_blog_title]', array(
        'selector' => '.site-content .section-heading, .home-post-latest .section-heading',
        'settings' => 'busiprof_theme_options[recent_blog_title]',
    ));

    $wp_customize->selective_refresh->add_partial('busiprof_theme_options[recent_blog_description]', array(
        'selector' => '.site-content .section-title p, .home-post-latest .section-title p',
        'settings' => 'busiprof_theme_options[recent_blog_description]',
    ));
}

add_action('customize_register', 'vdperanto_register_home_section_partials');