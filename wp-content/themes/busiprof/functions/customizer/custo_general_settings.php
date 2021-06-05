<?php 
function busiprof_general_settings( $wp_customize ){

/* Home Page Panel */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('General settings', 'busiprof'),
	) );
	
	/* Front Page section */
	$wp_customize->add_section( 'front_page_section' , array(
		'title'      => esc_html__('Front page', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 0,
   	) );
	
		// Enable Front Page
		$wp_customize->add_setting(
			'busiprof_theme_options[front_page]', 
			array(
			'default' => 'yes',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_front_page_radio',
			'type'=>'option'
		));
		
		$wp_customize->add_control(
			'busiprof_theme_options[front_page]', 
			array(
				'label'    => esc_html__('Enable front page','busiprof' ),
				'section'  => 'front_page_section',
				'type'     => 'radio',
				'choices' => array(
					'yes'=>esc_html__('ON','busiprof'),
					'no'=>esc_html__('OFF','busiprof')
				)
		));
	

	/* footer section */
	$wp_customize->add_section( 'footer_copy_section' , array(
		'title'      => esc_html__('Footer copyright settings', 'busiprof'),
		'panel'  => 'general_settings',
		'priority'   => 3,
   	) );
	
		// copyright text
		$wp_customize->add_setting( 'busiprof_theme_options[footer_copyright_text]', array('default'  => sprintf(__('<p><a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">BusiProf</a> by Webriti</p>', 'busiprof')), 'type' => 'option', 'sanitize_callback' => 'busiprof_copyright_sanitize_text' ) );
		$wp_customize->add_control(	'busiprof_theme_options[footer_copyright_text]', 
			array(
				'label'    => esc_html__( 'Copyright text','busiprof' ),
				'section'  => 'footer_copy_section',
				'type'     => 'textarea',
		));
		
		function busiprof_copyright_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

		}

		function busiprof_front_page_radio( $input, $setting ){
     	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    	$input = sanitize_key($input);
 
    	 //get the list of possible radio box options 
     	$choices = $setting->manager->get_control( $setting->id )->choices;
                             
     	//return input if valid or return default option
     	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );           
        }

        function busiprof_gen_sanitize_checkbox( $input ){

            //returns true if checkbox is checked
            return ( isset( $input ) ? true : false );
        }	
		
}
add_action( 'customize_register', 'busiprof_general_settings' );

/**
 * Add selective refresh for Front page section section controls.
 */
function busiprof_register_copyright_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[footer_copyright_text]', array(
		'selector'            => '.site-info .col-md-7 p',
		'settings'            => 'busiprof_theme_options[footer_copyright_text]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[upload_image]', array(
		'selector'            => '.navbar-header a',
		'settings'            => 'busiprof_theme_options[upload_image]',
	
	) );
}

add_action( 'customize_register', 'busiprof_register_copyright_section_partials' );