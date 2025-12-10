<?php

/**
 * Breadcrumbs for Xeco Theme.
 *
 * @package     xeco
 * @author      ThemeGenix
 * @copyright   Copyright (c) 2023, ThemeGenix
 * @link        https://themegenix.net
 * @since       xeco 1.0.0
 */


function xeco_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'xeco'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'xeco'));
        $breadcrumb_show = 0;
    }
    elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    }
    elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
        $breadcrumb_class = 'details-breadcrumb';
    }
    elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'xeco') . get_search_query();
    }
    elseif (is_404()) {
        $title = esc_html__('Page not Found', 'xeco');
    }
    elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'xeco'));
    }
    elseif (is_archive()) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }

    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
        $title = get_theme_mod('breadcrumb_shop_single', __('Product Single', 'xeco'));
    }
    elseif ( function_exists("is_shop") AND is_shop()  ) {
        $_id = wc_get_page_id('shop');
    }
    elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {
        // get_theme_mod
        $breadcrumb_hide_default = get_theme_mod('breadcrumb_hide_default', true);
        $xeco_bg = get_template_directory_uri() . '/assets/img/bg/breadcrumb_bg.png';
        $breadcrumb_background = get_theme_mod('breadcrumb_background', $xeco_bg);

        $breadcrumb_info_switch = get_theme_mod('breadcrumb_info_switch', false);
        $breadcrumb_shape_hide = get_theme_mod('breadcrumb_shape_hide', false);

        $xeco_shape01 = get_template_directory_uri() . '/assets/img/images/breadcrumb_shape01.png';
        $breadcrumb_shape_one = get_theme_mod('breadcrumb_shape_one', $xeco_shape01);

        $xeco_shape02 = get_template_directory_uri() . '/assets/img/images/breadcrumb_shape02.png';
        $breadcrumb_shape_two = get_theme_mod('breadcrumb_shape_two', $xeco_shape02);

    ?>

        <?php if (!empty($breadcrumb_hide_default)) : ?>
            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg <?php print esc_attr($breadcrumb_class); ?>" data-background="<?php echo esc_url($breadcrumb_background); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-content">
                                <h2 class="title"><?php echo wp_kses_post($title); ?></h2>
                                <?php if (!empty($breadcrumb_info_switch)) : ?>
                                    <nav aria-label="breadcrumb" class="breadcrumb">
                                        <?php if(function_exists('bcn_display')) {
                                            bcn_display();
                                        } ?>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($breadcrumb_shape_hide)) : ?>
                <div class="breadcrumb-shape-wrap">

                    <?php if (!empty($breadcrumb_shape_one)) : ?>
                        <img src="<?php echo esc_url($breadcrumb_shape_one) ?>" alt="<?php print esc_attr__('Shape', 'xeco'); ?>" class="alltuchtopdown">
                    <?php endif; ?>

                    <?php if (!empty($breadcrumb_shape_two)) : ?>
                        <img src="<?php echo esc_url($breadcrumb_shape_two) ?>" alt="<?php print esc_attr__('Shape', 'xeco'); ?>" class="rotateme">
                    <?php endif; ?>

                </div>
                <?php endif; ?>
            </section>
            <!-- breadcrumb-area-end -->
        <?php endif; ?>

<?php
    }
}

add_action('xeco_before_main_content', 'xeco_breadcrumb_func');