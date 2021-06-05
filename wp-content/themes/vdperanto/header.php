<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>	
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <?php 
         if ( is_singular() && pings_open( get_queried_object() ) ) : 
           echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
        endif;
        wp_head();?>	
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>	
        <div id="page" class="site">
            <a class="skip-link busiprof-screen-reader" href="#content"><?php esc_html_e('Skip to content', 'vdperanto'); ?></a>
        <?php
        $vdperanto_options = wp_parse_args(get_option('busiprof_theme_options', array()), vdperanto_default_data());
        if ($vdperanto_options['header_sticky_layout_setting'] == 'sticky') {
            vdperanto_header_sticky_layout();

        }
        else{
            vdperanto_header_default_layout();
        }   