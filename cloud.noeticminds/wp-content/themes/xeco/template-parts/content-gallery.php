<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
 */

$gallery_images = function_exists('get_field') ? get_field('gallery_images') : '';
$xeco_show_blog_share = get_theme_mod('xeco_show_blog_share', false);
$xeco_post_tags_width = $xeco_show_blog_share ? 'col-md-7' : 'col-12';
?>

<?php if (is_single()) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-standard-post blog-details-wrap format-gallery'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-standard-thumb blog-standard-thumb-active">
                <?php foreach ($gallery_images as $key => $image) :  ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="blog-details-content">

            <!-- blog meta -->
            <div class="blog-meta">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>

            <div class="post-text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'xeco'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>

            <?php if (!empty(get_the_tags())) : ?>
                <div class="blog-details-bottom">

                    <div class="row">
                        <div class="<?php echo esc_attr($xeco_post_tags_width); ?>">
                            <?php print xeco_get_tag(); ?>
                        </div>
                        <?php if (!empty($xeco_show_blog_share)) : ?>
                            <div class="col-md-5">
                                <div class="blog-details-social text-md-end">
                                    <h5 class="social-title"><?php echo esc_html__('Social Share :', 'xeco') ?></h5>
                                    <?php xeco_social_share(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>

        </div>
    </article>

<?php else : ?>



    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-standard-post format-gallery'); ?>>

        <?php if (!empty($gallery_images)) : ?>
            <div class="blog-standard-thumb blog-standard-thumb-active">
                <?php foreach ($gallery_images as $key => $image) :  ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="blog-standard-content">

            <!-- blog meta -->
            <div class="blog-meta">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-text">
                <p><?php print wp_trim_words(get_the_excerpt(get_the_ID()), 60, ''); ?></p>
            </div>
            <!-- blog btn -->
            <?php get_template_part('template-parts/blog/blog-btn'); ?>

        </div>

    </article>


<?php endif; ?>