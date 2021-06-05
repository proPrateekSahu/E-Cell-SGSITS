<?php

function vdperanto_header_layout_customizer($wp_customize) {

    /**
     * Image Radio Button Custom Control
     *
     * @author Anthony Hortin <http://maddisondesigns.com>
     * @license http://www.gnu.org/licenses/gpl-2.0.html
     * @link https://github.com/maddisondesigns
     */
    class vdperanto_Image_Radio_Button_Custom_Control extends WP_Customize_Control {

        /**
         * The type of control being rendered
         */
        public $type = 'image_radio_button';

        public function enqueue() {
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        public function print_styles() {
            ?><style>
                /*blue child*/
                #customize-control-busiprof_theme_options-header_sticky_layout_setting img {
                    margin-top: 5%;
                }
                #customize-control-busiprof_theme_options-header_sticky_layout_setting input{
                    display: none;
                }
                .image_radio_button_control .radio-button-label > input:checked + img {
                        border: 3px solid #2885BB;
                }
                #customize-control-busiprof_theme_options-blog_masonry3_layout_setting input{
                    display: none;
                }
                #customize-control-busiprof_theme_options-blog_masonry3_layout_setting img {
                    margin-top: 5%;
                }
            </style>
            <?php
        }

        /**
         * Render the control in the customizer
         */
        public function render_content() {
            ?>
            <div class="image_radio_button_control">
                <?php if (!empty($this->label)) { ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php } ?>
                <?php if (!empty($this->description)) { ?>
                    <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>

            <?php foreach ($this->choices as $key => $value) { ?>
                    <label class="radio-button-label">
                        <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                        <img src="<?php echo esc_attr($value['image']); ?>" alt="<?php echo esc_attr($value['name']); ?>" title="<?php echo esc_attr($value['name']); ?>" />
                    </label>
            <?php } ?>
            </div>
            <?php
        }

    }

   $vdperanto_current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());

    /* Header Layout section */
    $wp_customize->add_panel('header_options', array(
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Header settings', 'vdperanto'),
    ));

    $wp_customize->add_section('header_sticky_layout_setting', array(
        'title' => esc_html__('Header Layout', 'vdperanto'),
        'panel' => 'header_options'
    ));

    // Header Layout settings
    if (get_option('busiprof_user', 'new')=='old' || $vdperanto_current_options['upload_image'] != '') {

        $wp_customize->add_setting('busiprof_theme_options[header_sticky_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'vdperanto_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('busiprof_theme_options[header_sticky_layout_setting]', array(
            'default' => 'sticky',
            'sanitize_callback' => 'vdperanto_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new vdperanto_Image_Radio_Button_Custom_Control($wp_customize, 'busiprof_theme_options[header_sticky_layout_setting]',
            array(
                'label' => esc_html__('Header Layout Setting', 'vdperanto'),
                'section' => 'header_sticky_layout_setting',
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/vdperanto-header-default.png',
                        'name' => esc_html__('Standard Layout', 'vdperanto')
                    ),
                    'sticky' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/vdperanto-header-sticky.png',
                        'name' => esc_html__('Overlay Layout', 'vdperanto')
                    )
                )
            )
    ));
}

add_action('customize_register', 'vdperanto_header_layout_customizer');

//radio box sanitization function
function vdperanto_sanitize_radio($input, $setting) {

    $input = sanitize_key($input);

    $choices = $setting->manager->get_control($setting->id)->choices;

    //return if valid 
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}
