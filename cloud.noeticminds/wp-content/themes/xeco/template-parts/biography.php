<?php
$author_data = get_the_author_meta('description', get_query_var('author'));
$author_info = get_the_author_meta('xeco_write_by');
$facebook_url = get_the_author_meta('xeco_facebook');
$twitter_url = get_the_author_meta('xeco_twitter');
$linkedin_url = get_the_author_meta('xeco_linkedin');
$instagram_url = get_the_author_meta('xeco_instagram');
$xeco_url = get_the_author_meta('xeco_youtube');
$xeco_write_by = get_the_author_meta('xeco_write_by');
$author_bio_avatar_size = 180;
if ($author_data != '') :
?>

    <div class="blog-avatar-wrap mb-65">
        <div class="blog-avatar-img">
            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
                <?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', ['class' => '']); ?>
            </a>
        </div>
        <div class="blog-avatar-info">
            <span class="designation"><?php echo esc_html($xeco_write_by) ?></span>
            <h4 class="name"><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php print get_the_author(); ?></a></h4>
            <p><?php the_author_meta('description'); ?></p>
        </div>
    </div>

<?php endif; ?>