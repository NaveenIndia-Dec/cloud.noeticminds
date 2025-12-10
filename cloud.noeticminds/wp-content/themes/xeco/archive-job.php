<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
 */

get_header();

?>

<!-- job-area -->
<section class="job-area pt-135 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="job-tab-wrap">
                    <div class="job-item-wrap">
                        <?php if (have_posts()) : while (have_posts()) : the_post();

                                $xeco_work_from = function_exists('get_field') ? get_field('xeco_work_from') : '';
                                $xeco_job_status = function_exists('get_field') ? get_field('xeco_job_status') : '';

                        ?>
                                <div class="job-item">
                                    <div class="job-content">
                                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php the_excerpt(); ?>
                                        <ul class="list-wrap">
                                            <?php if (!empty($xeco_work_from)) : ?>
                                                <li>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <i class="far fa-map-marker-alt"></i>
                                                        <?php echo esc_html($xeco_work_from); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (!empty($xeco_job_status)) : ?>
                                                <li>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo esc_html($xeco_job_status); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="job-detail-btn">
                                        <a href="<?php the_permalink(); ?>"><?php echo esc_html__('View job', 'xeco') ?><i class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            <nav class="pagination-wrap job-list-pagination">
                                <?php xeco_pagination('<i class="fas fa-angle-double-left"></i>', '<i class="fas fa-angle-double-right"></i>', '', ['class' => 'page-link next']); ?>
                            </nav>
                        <?php else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- job-area-end -->

<?php
get_footer();
