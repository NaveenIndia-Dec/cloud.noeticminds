<?php

/**
 * xeco_scripts description
 * @return [type] [description]
 */
function xeco_scripts() {

    /**
     * ALL CSS FILES
    */
    wp_enqueue_style('xotric-fonts', XECO_THEME_CSS_DIR . 'xeco-fonts.css', []);
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', XECO_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', XECO_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'xeco-animate', XECO_THEME_CSS_DIR . 'animate.min.css', [] );
    wp_enqueue_style( 'font-awesome-free', XECO_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'slick', XECO_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'xeco-default', XECO_THEME_CSS_DIR . 'default.css', [] );
    wp_enqueue_style( 'xeco-core', XECO_THEME_CSS_DIR . 'xeco-core.css', [] );
    wp_enqueue_style( 'xeco-unit', XECO_THEME_CSS_DIR . 'xeco-unit.css', [] );
    wp_enqueue_style( 'xeco-woo', XECO_THEME_CSS_DIR . 'xeco-woo.css', [] );
    wp_enqueue_style( 'xeco-style', get_stylesheet_uri() );
    wp_enqueue_style( 'xeco-responsive', XECO_THEME_CSS_DIR . 'responsive.css', [] );


    // ALL JS FILES
    wp_enqueue_script( 'bootstrap-bundle', XECO_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'countdown', XECO_THEME_JS_DIR . 'jquery.countdown.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'appear', XECO_THEME_JS_DIR . 'jquery.appear.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'slick', XECO_THEME_JS_DIR . 'slick.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'easing', XECO_THEME_JS_DIR . 'jquery.easing.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'chart', XECO_THEME_JS_DIR . 'chart.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', XECO_THEME_JS_DIR . 'wow.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'xeco-main', XECO_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'xeco_scripts' );