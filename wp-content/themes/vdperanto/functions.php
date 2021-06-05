<?php
// Global variables define
define('VDPERANTO_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('VDPERANTO_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('VDPERANTO_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}

//Enqueue script and style
add_action( 'wp_enqueue_scripts', 'vdperanto_theme_css',999);
function vdperanto_theme_css() {
    wp_enqueue_style( 'bootstrap-style', VDPERANTO_PARENT_TEMPLATE_DIR_URI . '/css/bootstrap.css' );
    wp_enqueue_style( 'vdperanto-parent-style', VDPERANTO_PARENT_TEMPLATE_DIR_URI . '/style.css' );
    wp_enqueue_style( 'vdperanto-child-style', get_stylesheet_uri(), array( 'vdperanto-parent-style' ) );
    wp_enqueue_style( 'vdperanto-custom-style-css', VDPERANTO_TEMPLATE_DIR_URI."/css/custom.css" );
    wp_dequeue_style( 'busiporf-custom-css', VDPERANTO_PARENT_TEMPLATE_DIR_URI.'/css/custom.css');
    //add script
    wp_enqueue_script('vdperanto-mp-masonry-js', VDPERANTO_TEMPLATE_DIR_URI . '/js/masonry/mp.mansory.min.js');
}

add_action( 'after_setup_theme', 'vdperanto' );
function vdperanto()
{
	load_theme_textdomain( 'vdperanto', VDPERANTO_TEMPLATE_DIR . '/languages' );

    require( VDPERANTO_TEMPLATE_DIR . '/functions/customizer/customizer-header-layout.php' );
    require( VDPERANTO_TEMPLATE_DIR . '/functions/customizer/customizer-blog-layout.php' );
    require( VDPERANTO_TEMPLATE_DIR . '/functions/template-tag.php' );

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('vdperanto' == $theme->name) {
        if (is_admin()) {
            require VDPERANTO_TEMPLATE_DIR . '/admin/admin-init.php';
        }
    }
}


add_action( 'after_switch_theme', 'vdperanto_import_busiprof_theme_data_in_busiprof_child_theme' );
/**
* Import theme mods when switching from Busiprof child theme to Busiprof
*/
function vdperanto_import_busiprof_theme_data_in_busiprof_child_theme() {

    // Get the name of the previously active theme.
    $previous_theme = strtolower( get_option( 'theme_switched' ) );

    if ( ! in_array(
        $previous_theme, array(
            'busiprof',
			'vdequator',
			'arzine',
			'lazyprof',
        )
    ) ) {
        return;
    }

    // Get the theme mods from the previous theme.
    $previous_theme_content = get_option( 'theme_mods_' . $previous_theme );

    if ( ! empty( $previous_theme_content ) ) {
        foreach ( $previous_theme_content as $previous_theme_mod_k => $previous_theme_mod_v ) {
            set_theme_mod( $previous_theme_mod_k, $previous_theme_mod_v );
        }
    }
}

// Add masonry blog layout
add_action('wp_footer', 'vdperanto_custom_script');
function vdperanto_custom_script() {
$vdperanto_options = wp_parse_args(get_option('busiprof_theme_options', array()), vdperanto_default_data());
if ($vdperanto_options['blog_masonry3_layout_setting'] == 'masonry3') {
    wp_reset_query();
    $col = 4;?>
    <script>
        jQuery(document).ready(function (jQuery) {
            jQuery("#blog-masonry").mpmansory(
                    {
                        childrenClass: 'item', // default is a div
                        columnClasses: 'padding', //add classes to items
                        breakpoints: {
                            lg: 4, //Change masonry column here like 2, 3, 4 column
                            md: 4,
                            sm: 6,
                            xs: 12
                        },
                        distributeBy: {order: false, height: false, attr: 'data-order', attrOrder: 'asc'}, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
                        onload: function (items) {
                            //make somthing with items
                        }
                    }
            );
        });
    </script>
    <style type="text/css">
        .col-md-6:nth-child(2n+1) {
            clear: none;
        }
    </style>
    <?php
}
}

//Set for old user
if (!get_option('busiprof_user', false)) {
     //detect old user and set value
    $vdperanto_user = get_option('busiprof_theme_options', array());
    if ((isset($vdperanto_user['service_heading_one']) || isset($vdperanto_user['service_tagline']) || isset($vdperanto_user['recent_blog_title']) || isset($vdperanto_user['recent_blog_description']))) {
        add_option('busiprof_user', 'old');
    }else{
        add_option('busiprof_user', 'new');
    }
}
function vdperanto_default_data(){
    $vdperanto_current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
        if (get_option('busiprof_user', 'new')=='old' || $vdperanto_current_options['upload_image'] != '') {

            $array_new = array(
                'header_sticky_layout_setting' => 'default',
                'service_blink_effect_layout_setting' => 'default',
                'blog_masonry3_layout_setting' => 'default',
                'testimonial_center_effect_layout_setting'=>'default',
            );
        }
        else{
            $array_new = array(
                'header_sticky_layout_setting' => 'sticky',
                'service_blink_effect_layout_setting' => 'blink_effect',
                'blog_masonry3_layout_setting' => 'masonry3',
                'testimonial_center_effect_layout_setting'=>'center_box_effect',
            );
        }
        return array_merge($array_new, $vdperanto_current_options);
}

// Add script for sticky header
add_action('wp_head', 'vdperanto_sticky_header');
function vdperanto_sticky_header() {
    $vdperanto_options = wp_parse_args(get_option('busiprof_theme_options', array()), vdperanto_default_data());
    if ($vdperanto_options['header_sticky_layout_setting'] == 'sticky') {
        ?>
        <script>
            jQuery(document).ready(function (jQuery) {
                jQuery(window).bind('scroll', function () {
                    if (jQuery(window).scrollTop() > 200) {
                        jQuery('.navbar').addClass('stickymenu1');
                        jQuery('.navbar').slideDown();
                    } else {
                        jQuery('.navbar').removeClass('stickymenu1');
                        jQuery('.navbar').attr('style', '');
                    }
                });
            });
        </script>
        <?php

    }
}
function vdperanto_header_page_style(){
  $vdperanto_options = wp_parse_args(get_option('busiprof_theme_options', array()), vdperanto_default_data());
  if ($vdperanto_options['header_sticky_layout_setting'] == 'sticky') {?>
    <style>
    .page-header {
        padding: 120px 18px 18px;
    }
    </style>
  <?php
  }
}
add_action('wp_head','vdperanto_header_page_style');
