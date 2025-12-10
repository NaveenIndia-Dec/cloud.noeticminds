<?php
/**
 * xeco customizer
 *
 * @package xeco
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function xeco_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'xeco_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Xeco Customizer', 'xeco' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'xeco_default_setting', [
        'title'       => esc_html__( 'Xeco Default Setting', 'xeco' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'xeco'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ]);

    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Top Setting', 'xeco' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'header_info_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'xeco' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'offcanvas_setting', [
        'title'       => esc_html__( 'Offcanvas Setting', 'xeco' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'mobile_menu_setting', [
        'title'       => esc_html__( 'Mobile Menu Setting', 'xeco' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'xeco' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'xeco' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'xeco' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'xeco' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'xeco' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'xeco' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'xeco' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'xeco_customizer',
    ] );
}

add_action( 'customize_register', 'xeco_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _xeco_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_preloader',
        'label'    => esc_html__( 'Preloader ON/OFF', 'xeco' ),
        'section'  => 'xeco_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_backtotop',
        'label'    => esc_html__( 'Back to Top ON/OFF', 'xeco' ),
        'section'  => 'xeco_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_xeco_default_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {

    // Sticky Header
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_sticky_header',
        'label'    => esc_html__( 'Show Sticky Header', 'xeco' ),
        'section'  => 'section_header_logo',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'xeco' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'xeco' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'xeco' ),
        'description' => esc_html__( 'Upload Your Logo', 'xeco' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo_two',
        'label'       => esc_html__( 'Secondary Logo', 'xeco' ),
        'description' => esc_html__( 'Upload Your Logo', 'xeco' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/second_logo.svg',
    ];

    $fields[] = [
        'type'        => 'dimension',
        'settings'    => 'logo_size_adjust',
		'label'       => esc_html__( 'Logo Size Height', 'xeco' ),
		'description' => esc_html__( 'Adjust your logo size with px', 'xeco' ),
		'section'     => 'section_header_logo',
		'default'     => '38px',
        'choices'     => [
			'accept_unitless' => true,
		],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );


/*
Header Top Settings
*/
function _header_top_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_header_top',
        'label'    => esc_html__('Show Header Top', 'xeco'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '===',
                'value'    => 'header-style-2',
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'xeco_header_welcome',
        'label'    => esc_html__('Enter Welcome Text', 'xeco'),
        'section'  => 'header_top_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_header_top',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '===',
                'value'    => 'header-style-2',
            ],
        ],
        'default'  => esc_html__('Sign up and receive 20% bonus discount on checkout.', 'xeco'),
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_top_fields' );


/*
Header Right Settings
*/
function _header_right_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_header_right',
        'label'    => esc_html__('Show Header Right', 'xeco'),
        'section'  => 'header_info_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_header_button',
        'label'    => esc_html__('Show Header Button', 'xeco'),
        'section'  => 'header_info_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_header_btn_text',
        'label'    => esc_html__('Enter Button Text', 'xeco'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('Login', 'xeco'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_header_btn_icon',
        'label'    => esc_html__('Enter Button Icon', 'xeco'),
        'description' => esc_html__('Upload Icon From Font-Awesome v.5', 'xeco'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => wp_kses_post('<i class="fas fa-user"></i>', 'xeco'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_header_btn_url',
        'label'    => esc_html__('Enter Button URL', 'xeco'),
        'section'  => 'header_info_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_header_button',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'xeco'),
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_right_fields' );


/*
Offcanvas Settings
*/
function _header_offcanvas_fields($fields)
{

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_offcanvas',
        'label'    => esc_html__('Show Offcanvas', 'xeco'),
        'section'  => 'offcanvas_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_address_title',
        'label'    => esc_html__('Enter Address Title', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Office Address', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_address_text',
        'label'    => esc_html__('Enter Address Text', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('123/A, Miranda City Likaoli Prikano, Dope', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_phone_title',
        'label'    => esc_html__('Enter Phone Title', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Phone Number', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_phone_text',
        'label'    => esc_html__('Enter Phone Text', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('+0989 7876 9865 9', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_email_title',
        'label'    => esc_html__('Enter Email Title', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('Email Address', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'offcanvas_email_text',
        'label'    => esc_html__('Enter Phone Text', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'default'  => esc_html__('info@example.com', 'xeco'),
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_offcanvas_social',
        'label'    => esc_html__('Show Offcanvas Social', 'xeco'),
        'section'  => 'offcanvas_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_fb',
        'label'    => esc_html__('Enter Facebook url', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'xeco'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_twitter',
        'label'    => esc_html__('Enter Twitter url', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'xeco'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_instagram',
        'label'    => esc_html__('Enter Instagram url', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'xeco'),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'offcanvas_pinterest',
        'label'    => esc_html__('Enter Pinterest url', 'xeco'),
        'section'  => 'offcanvas_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_offcanvas',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'xeco_show_offcanvas_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__('#', 'xeco'),
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_offcanvas_fields');


/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'xeco' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'xeco' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'xeco' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'xeco' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_mobile_telegram_url',
        'label'    => esc_html__( 'Telegram URL', 'xeco' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'xeco' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'xeco_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_hide_default',
        'label'    => esc_html__( 'Breadcrumb Hide by Default', 'xeco' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_background',
        'label'       => esc_html__('Breadcrumb Background', 'xeco'),
        'description' => esc_html__('Upload Your Background', 'xeco'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__('Breadcrumb Nav Hide', 'xeco'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_shape_hide',
        'label'    => esc_html__('Breadcrumb Shape Hide', 'xeco'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'xeco'),
            'off' => esc_html__('Disable', 'xeco'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_shape_one',
        'label'       => esc_html__('Breadcrumb Shape One', 'xeco'),
        'description' => esc_html__('Upload Your Shape', 'xeco'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/images/breadcrumb_shape01.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_shape_hide',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_shape_two',
        'label'       => esc_html__('Breadcrumb Shape Two', 'xeco'),
        'description' => esc_html__('Upload Your Shape', 'xeco'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/images/breadcrumb_shape02.png',
        'active_callback'  => [
            [
                'setting'  => 'breadcrumb_shape_hide',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'breadcrumb_hide_default',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta ON/OFF', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'xeco_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'xeco' ),
            'off' => esc_html__( 'Disable', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'xeco' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'xeco' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'xeco' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'xeco' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'xeco' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'xeco' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'xeco' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'xeco' ),
        'priority'    => 11,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'xeco' ),
            '3' => esc_html__( 'Widget Number 3', 'xeco' ),
            '2' => esc_html__( 'Widget Number 2', 'xeco' ),
        ],
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'xeco_copyright',
        'label'    => esc_html__( 'CopyRight', 'xeco' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright © Xeco 2023. All Rights Reserved', 'xeco' ),
        'priority' => 15,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function xeco_color_fields( $fields ) {

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'xeco_color_option',
        'label'       => __( 'Primary Color', 'xeco' ),
        'description' => esc_html__('This is a Primary color control.', 'xeco' ),
        'section'     => 'color_setting',
        'default'     => '#44A08D',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'xeco_color_option2',
        'label'       => __('Secondary Color', 'xeco' ),
        'description' => esc_html__('This is a Secondary color control.', 'xeco' ),
        'section'     => 'color_setting',
        'default'     => '#093637',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'xeco_color_option3',
        'label'       => __('Dark Color', 'xeco' ),
        'description' => esc_html__('This is a Dark color control.', 'xeco' ),
        'section'     => 'color_setting',
        'default'     => '#0F101E',
        'priority'    => 10,
    ];

    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'xeco_color_option4',
        'label'       => __('Body Background Color', 'xeco' ),
        'description' => esc_html__('This is a Background color control.', 'xeco' ),
        'section'     => 'color_setting',
        'default'     => '#010314',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'xeco_color_fields' );

// 404
function xeco_404_fields( $fields ) {

    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_error_text',
        'label'    => esc_html__('404 Text', 'xeco'),
        'section'  => '404_page',
        'default'  => esc_html__('404', 'xeco'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'xeco_error_title',
        'label'    => esc_html__( 'Not Found Title', 'xeco' ),
        'section'  => '404_page',
        'default'  => esc_html__('Sorry, the page you are looking for could not be found', 'xeco' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'xeco' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'xeco' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'xeco_404_fields' );


/**
 * Added Fields
 */
function xeco_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'xeco' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'xeco_typo_fields' );


/**
 * Added Fields
 */
function xeco_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'xeco' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'xeco' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'xeco_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'xeco' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'xeco' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'xeco_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function XECO_THEME_OPTION( $name ) {
    $value = '';
    if ( class_exists( 'xeco' ) ) {
        $value = Kirki::get_option( xeco_get_theme(), $name );
    }

    return apply_filters('XECO_THEME_OPTION', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function xeco_get_theme() {
    return 'xeco';
}