<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xeco
*/


// Footer Columns
$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-' . $num)) {
        $footer_columns++;
    }
}

switch ($footer_columns) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-3 col-sm-6';
        $footer_class[2] = 'col-lg-3 col-sm-6';
        break;
    case '3':
        $footer_class[1] = 'col-lg-3 col-sm-6';
        $footer_class[2] = 'col-lg-3 col-sm-6';
        $footer_class[3] = 'col-lg-3 col-sm-6';
        break;
    case '4':
        $footer_class[1] = 'col-lg-3 col-sm-6';
        $footer_class[2] = 'col-lg-3 col-sm-6';
        $footer_class[3] = 'col-lg-3 col-sm-6';
        $footer_class[4] = 'col-lg-3 col-sm-6';
        break;
    default:
        $footer_class = 'col-lg-3 col-sm-6';
        break;
}

$no_border = (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) ? 'border-show' : 'border-none';

?>


<!-- footer-area -->
<footer>
    <div class="footer-area footer-bg">
        <div class="container">
            <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
                <div class="footer-top">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-1');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-2');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-3');
                            print '</div>';

                            print '<div class="col-lg-3 col-sm-6">';
                            dynamic_sidebar('footer-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="footer-bottom <?php echo esc_attr($no_border); ?>">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p><?php print xeco_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->