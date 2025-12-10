<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
 */
$categories = get_the_terms($post->ID, 'category');
$xeco_blog_date = get_theme_mod('xeco_blog_date', true);
$xeco_blog_comments = get_theme_mod('xeco_blog_comments', true);
$xeco_blog_author = get_theme_mod('xeco_blog_author', true);
$xeco_blog_cat = get_theme_mod('xeco_blog_cat', false);

?>

<ul class="list-wrap p-0 d-flex flex-wrap align-items-center">

    <?php if (!empty($xeco_blog_author)) : ?>
        <li class="blog-author">
            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), ['size' => '40'])); ?>" alt="<?php the_author(); ?>">
                <?php print get_the_author(); ?>
            </a>
        </li>
    <?php endif; ?>

    <?php if (!empty($xeco_blog_date)) : ?>
        <li class="date"><i class="far fa-calendar-alt"></i> <?php the_time(get_option('date_format')); ?></li>
    <?php endif; ?>

    <?php if (!empty($xeco_blog_cat)) : ?>
        <?php $categories = get_the_category();
        if (!empty($categories)) {
            echo '<li class="category"><i class="fas fa-bookmark"></i><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></li>';
        }
        ?>
    <?php endif; ?>

    <?php if (!empty($xeco_blog_comments)) : ?>
        <li class="comments"><i class="far fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
    <?php endif; ?>

</ul>