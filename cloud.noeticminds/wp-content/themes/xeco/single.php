<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package xeco
 */

get_header();

$blog_column_lg = is_active_sidebar('blog-sidebar') ? 'col-lg-8' : 'col-12';

?>

<section class="blog-area blog-details-area pt-140 pb-140">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?php print esc_attr($blog_column_lg); ?>">
                <div class="blog-post-wrap">
                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', get_post_format());

                    ?>

                        <?php
                        if (get_previous_post_link() and get_next_post_link()) : ?>

                            <div class="blog-next-prev d-none">
                                <div class="row">
                                    <?php
                                    if (get_previous_post_link()) : ?>
                                        <div class="col-sm-6">
                                            <div class="post prev">
                                                <h4 class="title"><?php print get_previous_post_link('%link ', '%title'); ?></h4>
                                                <span><?php print esc_html__('Prev Post', 'xeco'); ?></span>
                                            </div>
                                        </div>
                                    <?php
                                    endif; ?>

                                    <?php
                                    if (get_next_post_link()) : ?>
                                        <div class="col-sm-6">
                                            <div class="post next">
                                                <h4 class="title"><?php print get_next_post_link('%link ', '%title'); ?></h4>
                                                <span><?php print esc_html__('Next Post', 'xeco'); ?></span>
                                            </div>
                                        </div>
                                    <?php
                                    endif; ?>

                                </div>
                            </div>

                        <?php
                        endif; ?>
                    <?php

                        get_template_part('template-parts/biography');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <?php if (is_active_sidebar('blog-sidebar')) : ?>
                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
