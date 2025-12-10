<?php

/**
 * Template part for displaying offcanvas menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
*/

$offcanvas_address_title = get_theme_mod('offcanvas_address_title', __('Office Address', 'xeco'));
$offcanvas_address_text = get_theme_mod('offcanvas_address_text', __('123/A, Miranda City Likaoli
Prikano, Dope', 'xeco'));
$offcanvas_phone_title = get_theme_mod('offcanvas_phone_title', __('Phone Number', 'xeco'));
$offcanvas_phone_text = get_theme_mod('offcanvas_phone_text', __('+0989 7876 9865 9', 'xeco'));
$offcanvas_email_title = get_theme_mod('offcanvas_email_title', __('Email Address', 'xeco'));
$offcanvas_email_text = get_theme_mod('offcanvas_email_text', __('info@example.com', 'xeco'));

$xeco_show_offcanvas_social = get_theme_mod('xeco_show_offcanvas_social', false);
$offcanvas_fb = get_theme_mod('offcanvas_fb', __('#', 'xeco'));
$offcanvas_twitter = get_theme_mod('offcanvas_twitter', __('#', 'xeco'));
$offcanvas_instagram = get_theme_mod('offcanvas_instagram', __('#', 'xeco'));
$offcanvas_pinterest = get_theme_mod('offcanvas_pinterest', __('#', 'xeco'));

?>


<div class="extra-info">
    <div class="close-icon menu-close">
        <button><i class="far fa-window-close"></i></button>
    </div>
    <div class="logo-side mb-30">
        <?php xeco_header_logo(); ?>
    </div>
    <div class="side-info mb-30">
        <?php if (!empty($offcanvas_address_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_address_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_address_text); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($offcanvas_phone_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_phone_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_phone_text); ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($offcanvas_email_text)) : ?>
            <div class="contact-list mb-30">
                <h4><?php echo esc_html($offcanvas_email_title) ?></h4>
                <p><?php echo wp_kses_post($offcanvas_email_text); ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($xeco_show_offcanvas_social)) : ?>
        <div class="social-icon-right mt-30">

            <?php if (!empty($offcanvas_fb)) : ?>
                <a href="<?php echo esc_url($offcanvas_fb); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_twitter)) : ?>
                <a href="<?php echo esc_url($offcanvas_twitter); ?>"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_instagram)) : ?>
                <a href="<?php echo esc_url($offcanvas_instagram); ?>"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>

            <?php if (!empty($offcanvas_pinterest)) : ?>
                <a href="<?php echo esc_url($offcanvas_pinterest); ?>"><i class="fab fa-pinterest-p"></i></a>
            <?php endif; ?>

        </div>
    <?php endif; ?>

</div>
<div class="offcanvas-overly"></div>