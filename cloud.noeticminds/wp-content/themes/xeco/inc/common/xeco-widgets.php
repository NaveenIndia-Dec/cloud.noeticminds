<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xeco_widgets_init() {

    $footer_style_2_switch = get_theme_mod( 'footer_style_2_switch', false );

    /**
     * Blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'xeco' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="blog-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // Footer Default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer widget no. %1$s', 'xeco' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'xeco' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer-widget column-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="fw-title">',
            'after_title'   => '</h4>',
        ] );
    }

}
add_action( 'widgets_init', 'xeco_widgets_init' );