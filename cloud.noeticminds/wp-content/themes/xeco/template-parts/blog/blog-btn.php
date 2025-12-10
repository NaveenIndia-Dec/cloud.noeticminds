<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
 */

$xeco_blog_btn = get_theme_mod('xeco_blog_btn', __('Read More', 'xeco'));
$xeco_blog_btn_switch = get_theme_mod('xeco_blog_btn_switch', true);

?>

<?php if (!empty($xeco_blog_btn_switch)) : ?>
    <div class="read-more-btn">
        <a href="<?php the_permalink(); ?>"><?php print esc_html($xeco_blog_btn); ?><i class="fas fa-arrow-right"></i></a>
    </div>
<?php endif; ?>