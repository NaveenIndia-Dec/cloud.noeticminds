<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
 */

// Header Settings
$xeco_show_sticky_header = get_theme_mod('xeco_show_sticky_header', false);
$sticky_header = $xeco_show_sticky_header ? 'sticky-header' : 'sticky-default';
$sticky_height = $xeco_show_sticky_header ? '' : 'd-none';

$menu_padding = has_nav_menu('main-menu') ? 'xeco-menu-has-showing' : 'xeco-menu-not-showing';

// Header Button
$xeco_show_header_right = get_theme_mod('xeco_show_header_right', false);
$xeco_show_header_lang = get_theme_mod('xeco_show_header_lang', false);
$xeco_show_header_button = get_theme_mod('xeco_show_header_button', false);
$xeco_header_btn_text = get_theme_mod('xeco_header_btn_text', __('Get Start', 'xeco'));
$xeco_header_btn_url = get_theme_mod('xeco_header_btn_url', __('#', 'xeco'));

// Mobile Menu
$xeco_show_mobile_social = get_theme_mod('xeco_show_mobile_social', false);

?>


<!-- header-area -->
<header>
    <div id="<?php echo esc_attr($sticky_header); ?>" class="menu-area menu-area-three transparent-header <?php echo esc_attr($menu_padding) ?>">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <?php xeco_header_three_logo(); ?>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <?php xeco_header_menu(); ?>
                            </div>

                            <?php if (!empty($xeco_show_header_right)) : ?>
                                <div class="header-action d-none d-md-block">
                                    <ul class="list-wrap">
                                        <?php if (!empty($xeco_show_header_lang)) : ?>
                                            <li class="header-lang">
                                                <div class="dropdown">
                                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo esc_html__('🇺🇸 EN', 'xeco') ?>
                                                    </button>
                                                    <?php xeco_language_list(); ?>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (!empty($xeco_show_header_button)) : ?>
                                            <li class="header-btn"><a href="login.html" class="gradient-btn gradient-btn-four">sign up</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (has_nav_menu('main-menu')) { ?>
                                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <?php } ?>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <?php xeco_header_three_logo(); ?>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <?php if (!empty($xeco_show_mobile_social)) : ?>
                                <div class="social-links">
                                    <?php xeco_mobile_social_profiles(); ?>
                                </div>
                            <?php endif; ?>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->