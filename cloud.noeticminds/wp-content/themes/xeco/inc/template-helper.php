<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xeco
 */


/**
 *
 * Xeco Header
 */

function xeco_check_header() {
    $xeco_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $xeco_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $xeco_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    }
    else {
        /** Default Header Style **/
        if ( $xeco_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'xeco_header_style', 'xeco_check_header', 10 );


/**
 * [xeco_header_lang description]
 * @return [type] [description]
 */
function xeco_header_lang_default() {
    $xeco_header_lang = get_theme_mod( 'xeco_header_lang', false );
    if ( $xeco_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'English', 'xeco' );?> <i class="fa-light fa-angle-down"></i></a>
        <?php do_action( 'xeco_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}


/**
 * [xeco_language_list description]
 * @return [type] [description]
 */
function _xeco_language( $mar ) {
    return $mar;
}
function xeco_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<a href="' . $lan['url'] . '" class="' . $active . '">' . $lan['translated_name'] . '</a>';
        }
        $mar .= '</div>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇷🇺 RU', 'xeco' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇮🇳 IN', 'xeco' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇹🇷 TR', 'xeco' ) . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__( '🇫🇷 FR', 'xeco' ) . '</a>';
        $mar .= ' </div>';
    }
    print _xeco_language( $mar );
}
add_action( 'xeco_language', 'xeco_language_list' );


// Header 01 Logo
function xeco_header_logo() { ?>
      <?php
        $xeco_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $xeco_site_logo = get_theme_mod( 'logo', $xeco_logo );
      ?>
         <a class="main-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $xeco_site_logo );?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '38px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'xeco' );?>" />
         </a>
   <?php
}

// Header 02 Logo
function xeco_header_two_logo() {?>
    <?php
        $xeco_logo_black = get_template_directory_uri() . '/assets/img/logo/second_logo.svg';
        $xeco_second_logo = get_theme_mod( 'logo_two', $xeco_logo_black );
    ?>
      <a class="main-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $xeco_second_logo );?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '38px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'xeco' );?>" />
      </a>
    <?php
}


// Mobile Menu Logo
function xeco_mobile_logo() {

    $mobile_menu_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $mobile_logo = get_theme_mod('mobile_logo', $mobile_menu_logo);

    ?>

    <a class="main-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $mobile_logo ); ?>" style="max-height: <?php echo get_theme_mod( 'logo_size_adjust', '38px' ); ?>" alt="<?php print esc_attr__( 'Logo', 'xeco' );?>" />
    </a>

<?php }


/**
 * [xeco_header_social_profiles description]
 * @return [type] [description]
 */
function xeco_header_social_profiles() {
    $xeco_header_fb_url = get_theme_mod( 'xeco_header_fb_url', __( '#', 'xeco' ) );
    $xeco_header_twitter_url = get_theme_mod( 'xeco_header_twitter_url', __( '#', 'xeco' ) );
    $xeco_header_linkedin_url = get_theme_mod( 'xeco_header_linkedin_url', __( '#', 'xeco' ) );
    ?>
    <ul>
        <?php if ( !empty( $xeco_header_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $xeco_header_fb_url );?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $xeco_header_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $xeco_header_twitter_url );?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $xeco_header_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $xeco_header_linkedin_url );?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif;?>
    </ul>

<?php
}

function xeco_footer_social_profiles() {
    $xeco_footer_fb_url = get_theme_mod( 'xeco_footer_fb_url', __( '#', 'xeco' ) );
    $xeco_footer_twitter_url = get_theme_mod( 'xeco_footer_twitter_url', __( '#', 'xeco' ) );
    $xeco_footer_vimeo_url = get_theme_mod( 'xeco_footer_vimeo_url', __( '#', 'xeco' ) );
    $xeco_footer_youtube_url = get_theme_mod( 'xeco_footer_youtube_url', __( '#', 'xeco' ) );
    ?>

        <ul>
        <?php if ( !empty( $xeco_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $xeco_footer_fb_url );?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $xeco_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $xeco_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $xeco_footer_vimeo_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $xeco_footer_vimeo_url );?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $xeco_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $xeco_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [xeco_mobile_social_profiles description]
 * @return [type] [description]
 */
function xeco_mobile_social_profiles() {
    $xeco_mobile_fb_url           = get_theme_mod('xeco_mobile_fb_url', __('#','xeco'));
    $xeco_mobile_twitter_url      = get_theme_mod('xeco_mobile_twitter_url', __('#','xeco'));
    $xeco_mobile_instagram_url    = get_theme_mod('xeco_mobile_instagram_url', __('#','xeco'));
    $xeco_mobile_linkedin_url     = get_theme_mod('xeco_mobile_linkedin_url', __('#','xeco'));
    $xeco_mobile_telegram_url      = get_theme_mod('xeco_mobile_telegram_url', __('#','xeco'));
    ?>

    <ul class="clearfix list-wrap">
        <?php if (!empty($xeco_mobile_fb_url)): ?>
        <li class="facebook">
            <a href="<?php print esc_url($xeco_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($xeco_mobile_twitter_url)): ?>
        <li class="twitter">
            <a href="<?php print esc_url($xeco_mobile_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($xeco_mobile_instagram_url)): ?>
        <li class="instagram">
            <a href="<?php print esc_url($xeco_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($xeco_mobile_linkedin_url)): ?>
        <li class="linkedin">
            <a href="<?php print esc_url($xeco_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($xeco_mobile_telegram_url)): ?>
        <li class="telegram">
            <a href="<?php print esc_url($xeco_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
        </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [xeco_header_menu description]
 * @return [type] [description]
 */
function xeco_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Xeco_Navwalker_Class::fallback',
        ] );
    ?>
    <?php
}


/**
 * [xeco_hamburger_menu description]
 * @return [type] [description]
 */
function xeco_hamburger_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'hamburger-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Xeco_Navwalker_Class::fallback',
            'walker'         => new Xeco_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [xeco_header_menu description]
 * @return [type] [description]
 */
function xeco_mobile_menu() { ?>
    <?php
        $xeco_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $xeco_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $xeco_menu );
        echo wp_kses_post( $xeco_menu );
    ?>
    <?php
}

/**
 * [xeco_blog_mobile_menu description]
 * @return [type] [description]
 */
function xeco_blog_mobile_menu() { ?>
    <?php
        $xeco_menu = wp_nav_menu( [
            'theme_location' => 'blog-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $xeco_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $xeco_menu );
        echo wp_kses_post( $xeco_menu );
    ?>
    <?php
}

/**
 * [xeco_search_menu description]
 * @return [type] [description]
 */
function xeco_header_search_menu() { ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Xeco_Navwalker_Class::fallback',
            'walker'         => new Xeco_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [xeco_footer_menu description]
 * @return [type] [description]
 */
function xeco_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Xeco_Navwalker_Class::fallback',
        'walker'         => new Xeco_Navwalker_Class,
    ] );
}


/**
 * [xeco_category_menu description]
 * @return [type] [description]
 */
function xeco_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Xeco_Navwalker_Class::fallback',
        'walker'         => new Xeco_Navwalker_Class,
    ] );
}

/**
 *
 * xeco footer
 */
add_action( 'xeco_footer_style', 'xeco_check_footer', 10 );

function xeco_check_footer() {

    $footer_show = 1;
    $is_footer = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_footer') : '';
    if( !empty($_GET['s']) ) {
      $is_footer = null;
    }

    if ( empty( $is_footer ) && $footer_show == 1 ) {
        $xeco_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
        $xeco_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

        get_template_part( 'template-parts/footer/footer-1' );

    }
}


// xeco_copyright_text
function xeco_copyright_text() {
   print get_theme_mod( 'xeco_copyright', esc_html__( 'Copyright © Xeco 2023. All Rights Reserved', 'xeco' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'xeco_pagination' ) ) {

    function _xeco_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function xeco_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="pagination">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _xeco_pagi_callback( $pagi );
    }
}


// theme color
function xeco_custom_color() {

    // Primary Color
    $color_code = get_theme_mod( 'xeco_color_option', '#44A08D' );
    wp_enqueue_style( 'xeco-custom', XECO_THEME_CSS_DIR . 'xeco-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --tg-primary-color: " . $color_code . "}";
        $custom_css .= "html:root { --unit-primary-color: " . $color_code . "}";
        wp_add_inline_style( 'xeco-custom', $custom_css );
    }

    // Secondary Color
    $color_code2 = get_theme_mod( 'xeco_color_option2', '#093637' );
    wp_enqueue_style( 'xeco-custom', XECO_THEME_CSS_DIR . 'xeco-custom.css', [] );
    if ( $color_code2 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --tg-green: " . $color_code2 . "}";
        wp_add_inline_style( 'xeco-custom', $custom_css );
    }

    // Dark Color
    $color_code3 = get_theme_mod( 'xeco_color_option3', '#0F101E' );
    wp_enqueue_style( 'xeco-custom', XECO_THEME_CSS_DIR . 'xeco-custom.css', [] );
    if ( $color_code3 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --tg-secondary-color: " . $color_code3 . "}";
        $custom_css .= "html:root { --unit-secondary-color: " . $color_code3 . "}";
        wp_add_inline_style( 'xeco-custom', $custom_css );
    }

    // Background Color
    $color_code4 = get_theme_mod( 'xeco_color_option4', '#010314' );
    wp_enqueue_style( 'xeco-custom', XECO_THEME_CSS_DIR . 'xeco-custom.css', [] );
    if ( $color_code4 != '' ) {
        $custom_css = '';
        $custom_css .= "html:root { --tg-black: " . $color_code4 . "}";
        wp_add_inline_style( 'xeco-custom', $custom_css );
    }

}
add_action( 'wp_enqueue_scripts', 'xeco_custom_color' );



// xeco_kses_intermediate
function xeco_kses_intermediate( $string = '' ) {
    return wp_kses( $string, xeco_get_allowed_html_tags( 'intermediate' ) );
}

function xeco_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function xeco_kses($raw){

   $allowed_tags = array(
      'a'      => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'   => array(
         'title' => array(),
      ),
      'b'    => array(),
      'blockquote'   => array(
         'cite' => array(),
      ),
      'cite'   => array(
         'title' => array(),
      ),
      'code'  => array(),
      'del'   => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'     => array(),
      'div'    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'   => array(),
      'dt'   => array(),
      'em'   => array(),
      'h1'   => array(),
      'h2'   => array(),
      'h3'   => array(),
      'h4'   => array(),
      'h5'   => array(),
      'h6'   => array(),
      'i'    => array(
        'class' => array(),
      ),
      'img'   => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'   => array(
         'class' => array(),
      ),
      'ol'   => array(
         'class' => array(),
      ),
      'p'    => array(
         'class' => array(),
      ),
      'q'    => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'  => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'   => array(
         'width'        => array(),
         'height'       => array(),
         'scrolling'    => array(),
         'frameborder'  => array(),
         'allow'        => array(),
         'src'          => array(),
      ),
      'strike'  => array(),
      'br'      => array(),
      'strong'    => array(),
      'data-wow-duration'   => array(),
      'data-wow-delay'   => array(),
      'data-wallpaper-options'  => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'   => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}