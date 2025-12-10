<?php

/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  genixcore
 */
get_header();

$post_column = is_active_sidebar('services-sidebar') ? 8 : 8;
$post_column_center = is_active_sidebar('services-sidebar') ? '' : 'justify-content-center';

?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="services-details-area">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>
<?php endwhile;
    wp_reset_query();
endif; ?>

<?php get_footer();  ?>