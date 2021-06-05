<?php

/* * Includes reqired resources here* */
define('BUSI_TEMPLATE_DIR_URI', get_template_directory_uri());
define('BUSI_TEMPLATE_DIR', get_template_directory());
define('BUSI_THEME_FUNCTIONS_PATH', BUSI_TEMPLATE_DIR . '/functions');

require_once('theme_setup_data.php');
require_once('child_theme_compatible.php');
//Files for custom - defaults menus
require( BUSI_THEME_FUNCTIONS_PATH . '/menu/busiprof_nav_walker.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/font/font.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');


// Theme functions file including
require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/script.php');
require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/custom-widgets.php' ); // for footer widget
require( BUSI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); // for custom contact widget
// customizer files include
require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_general_settings.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_sections_settings.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/customizer-archive.php');
require( BUSI_THEME_FUNCTIONS_PATH . '/wpml-pll/functions.php' );
require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require_once (BUSI_THEME_FUNCTIONS_PATH . '/class-tgm-plugin-activation.php');

add_action('tgmpa_register', 'busiprof_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function busiprof_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Contact Form 7','busiprof'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Webriti Companion','busiprof'),
            'slug' => 'webriti-companion',
            'required' => false,
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

function busiprof_customizer_css() {
    wp_enqueue_style('busiprof-customizer-info', get_template_directory_uri() . '/css/pro-feature.css');
}

add_action('admin_init', 'busiprof_customizer_css');

//theme ckeck plugin required
add_theme_support('automatic-feed-links');
add_theme_support('woocommerce');

if (!function_exists('busiprof_setup')) :

    function busiprof_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('busiprof', get_template_directory() . '/lang');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');


        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        // supports featured image
        add_theme_support('post-thumbnails');

        //Custom logo

        add_theme_support('custom-logo', array(
            'width' => 300,
            'height' => 50,
            'flex-width' => false,
            'flex-height' => false,
            'header-text' => array('site-title', 'site-description'),
        ));

        //Added Woocommerce Galllery Support
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'busiprof')
        ));

        //content width
        if (!isset($content_width)) {
            $content_width = 750;
        }
    }

// busiprof_setup
endif;

add_action('after_setup_theme', 'busiprof_setup');



add_action('after_switch_theme', 'busiprof_import_busiprof_child_theme_data_in_busiprof_theme');

/**
 * Import theme mods when switching from Busiprof child theme to Busiprof
 */
function busiprof_import_busiprof_child_theme_data_in_busiprof_theme() {

    // Get the name of the previously active theme.
    $previous_theme = strtolower(get_option('theme_switched'));

    if (!in_array(
                    $previous_theme, array(
                'vdequator',
                'vdperanto',
                'arzine',
                'lazyprof',
                    )
            )) {
        return;
    }

    // Get the theme mods from the previous theme.
    $previous_theme_content = get_option('theme_mods_' . $previous_theme);

    if (!empty($previous_theme_content)) {
        foreach ($previous_theme_content as $previous_theme_mod_k => $previous_theme_mod_v) {
            set_theme_mod($previous_theme_mod_k, $previous_theme_mod_v);
        }
    }
}

add_filter('wp_generate_tag_cloud', 'busiprof_tag_cloud',10,1);

function busiprof_tag_cloud($tag_string){
  return preg_replace('/style=("|\')(.*?)("|\')/','',$tag_string);
}

$busiprof_theme = wp_get_theme();
if ('Busiprof' == $busiprof_theme->name) {
    if (is_admin()) {
        require  BUSI_TEMPLATE_DIR . '/admin/admin-init.php';
    }
}

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}

//Custom CSS compatibility
$busiprof_theme_options = busiprof_theme_setup_data();
$busiprof_current_options = wp_parse_args(get_option('busiprof_theme_options', array()), $busiprof_theme_options);
if ($busiprof_current_options['busiprof_custom_css'] != '' && $busiprof_current_options['busiprof_custom_css'] != 'nomorenow') {
    $busiprof_css = '';
    $busiprof_css .= $busiprof_current_options['busiprof_custom_css'];
    $busiprof_css .= (string) wp_get_custom_css(get_stylesheet());
    $busiprof_current_options['busiprof_custom_css'] = 'nomorenow';
    update_option('busiprof_theme_options', $busiprof_current_options);
    wp_update_custom_css_post($busiprof_css, array());
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function busiprof_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'busiprof_skip_link_focus_fix' );
