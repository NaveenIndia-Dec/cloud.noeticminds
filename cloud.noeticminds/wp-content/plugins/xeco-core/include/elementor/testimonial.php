<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Xeco Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Testimonial extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'testimonial';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Testimonial', 'genixcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'genix-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['genixcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['genixcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // layout Panel
        $this->start_controls_section(
            'genix_layout',
            [
                'label' => esc_html__('Design Layout', 'genixcore'),
            ]
        );
        $this->add_control(
            'tg_design_style',
            [
                'label' => esc_html__('Select Layout', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'genixcore'),
                    'layout-2' => esc_html__('Layout 2', 'genixcore'),
                    'layout-3' => esc_html__('Layout 3', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__('Testimonial List', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tg_design_style!' => 'layout-2'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__('Review Content', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dolor sit any amet consectetur. Ut as tellus that suspendise nulla aliquam. Risus rutrum as tellus eget  ultrices pretium nisi amet facilisis. Augue vulputate egestas cursus.', 'genixcore'),
                'placeholder' => esc_html__('Type your review content here', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__('Reviewer Image', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater->add_control(
            'reviewer_icon',
            [
                'label' => esc_html__('Quotation Icon', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Jenny Wilson', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_designation',
            [
                'label' => esc_html__('Reviewer Designation', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Director of Content', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__('Review List', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__('Jenny Wilson', 'genixcore'),
                    ],
                    [
                        'reviewer_name' => esc_html__('David Liyan', 'genixcore'),
                    ],
                    [
                        'reviewer_name' => esc_html__('Robert Fox', 'genixcore'),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );

        $this->end_controls_section();


        // Review Group Style 03
        $this->start_controls_section(
            '__review_list_two',
            [
                'label' => esc_html__('Testimonial List', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'reviewer_brand',
            [
                'label' => esc_html__('Brand Logo', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater2->add_control(
            'review_content2',
            [
                'label' => esc_html__('Review Content', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Lorem ipsum dol amet consectetur. Ut tellus suspendisse nulla aliquam. Risus ultrices pretium.', 'genixcore'),
                'placeholder' => esc_html__('Type your review content here', 'genixcore'),
            ]
        );

        $repeater2->add_control(
            'reviewer_image2',
            [
                'label' => esc_html__('Reviewer Image', 'genixcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater2->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'reviewer_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $repeater2->add_control(
            'reviewer_name2',
            [
                'label' => esc_html__('Reviewer Name', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Dan Cliford', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'reviewer_designation2',
            [
                'label' => esc_html__('Reviewer Designation', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CTO amazon', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'bg_border_color',
            [
                'label' => esc_html__('Border Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF9900',
            ]
        );

        $this->add_control(
            'reviews_list2',
            [
                'label' => esc_html__('Review List', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater2->get_controls(),
                'default' => [
                    [
                        'reviewer_name2' => esc_html__('Dan Cliford', 'genixcore'),
                    ],
                    [
                        'reviewer_name2' => esc_html__('David Liyan', 'genixcore'),
                    ],
                    [
                        'reviewer_name2' => esc_html__('Robert Fox', 'genixcore'),
                    ],

                ],
                'title_field' => '{{{ reviewer_name2 }}}',
            ]
        );

        $this->end_controls_section();


        // TAB_STYLE
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'genixcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => esc_html__('Text Transform', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('None', 'genixcore'),
                    'uppercase' => esc_html__('UPPERCASE', 'genixcore'),
                    'lowercase' => esc_html__('lowercase', 'genixcore'),
                    'capitalize' => esc_html__('Capitalize', 'genixcore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <script>
                jQuery(document).ready(function($) {

                    /*=============================================
                        =    		Brand Active		      =
                    =============================================*/
                    $('.testimonial-active-two').slick({
                        dots: false,
                        infinite: true,
                        speed: 2000,
                        autoplay: true,
                        arrows: true,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                        appendArrows: ".testimonial-nav",
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 575,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                        ]
                    });

                });
            </script>

            <div class="row testimonial-active-two">
                <?php foreach ($settings['reviews_list2'] as $item) :
                    if (!empty($item['reviewer_image2']['url'])) {
                        $tg_reviewer_image2 = !empty($item['reviewer_image2']['id']) ? wp_get_attachment_image_url($item['reviewer_image2']['id'], $item['reviewer_size_size']) : $item['reviewer_image2']['url'];
                        $tg_reviewer_image_alt2 = get_post_meta($item["reviewer_image2"]["id"], "_wp_attachment_image_alt", true);
                    }
                ?>
                    <div class="col-lg-4">
                        <div class="testimonial-item-two" style="border-color: <?php echo esc_attr( $item['bg_border_color'] ) ?>;">
                            <div class="testimonial-content-two">
                                <div class="riting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <?php if (!empty($item['reviewer_brand']['url'])) : ?>
                                    <div class="testi-logo">
                                        <img src="<?php echo esc_url($item['reviewer_brand']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['review_content2'])) : ?>
                                    <p><?php echo esc_html($item['review_content2']); ?></p>
                                <?php endif; ?>

                                <div class="testimonial-avatar-info">

                                    <?php if (!empty($tg_reviewer_image2)) : ?>
                                        <div class="avatar-thumb">
                                            <img src="<?php echo esc_url($tg_reviewer_image2); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt2); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="avatar-content">
                                        <?php if (!empty($item['reviewer_name2'])) : ?>
                                            <h6 class="title"><?php echo genix_kses($item['reviewer_name2']); ?></h6>
                                        <?php endif; ?>
                                        <?php if (!empty($item['reviewer_designation2'])) : ?>
                                            <span><?php echo genix_kses($item['reviewer_designation2']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($settings['tg_design_style']  == 'layout-3') : ?>

            <script>
                jQuery(document).ready(function($) {

                    /*=============================================
                        =    testimonial Active		    =
                    =============================================*/
                    $('.testimonial-active-three').slick({
                        dots: true,
                        infinite: true,
                        speed: 1500,
                        autoplay: true,
                        fade: true,
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 575,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                        ]
                    });

                });
            </script>

            <div class="testimonial-item-wrap">
                <div class="testimonial-active-three">
                    <?php foreach ($settings['reviews_list'] as $item) :
                        if (!empty($item['reviewer_image']['url'])) {
                            $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                            $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                        <div class="testimonial-item-three">
                            <?php if (!empty($item['reviewer_icon']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($item['reviewer_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                </div>
                            <?php endif; ?>
                            <div class="testimonial-content-three">
                                <?php if (!empty($item['review_content'])) : ?>
                                    <p><?php echo esc_html($item['review_content']); ?></p>
                                <?php endif; ?>
                                <div class="testimonial-avatar-info">
                                    <?php if (!empty($tg_reviewer_image)) : ?>
                                        <div class="avatar-thumb">
                                            <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="avatar-content">
                                        <?php if (!empty($item['reviewer_name'])) : ?>
                                            <h6 class="title"><?php echo genix_kses($item['reviewer_name']); ?></h6>
                                        <?php endif; ?>
                                        <?php if (!empty($item['reviewer_designation'])) : ?>
                                            <span><?php echo genix_kses($item['reviewer_designation']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php else : ?>

            <script>
                jQuery(document).ready(function($) {

                    /*===========================================
                        =           Brand Active         =
                    =============================================*/
                    $('.testimonial-active').slick({
                        dots: true,
                        infinite: true,
                        speed: 2000,
                        autoplay: true,
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 575,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false,
                                }
                            },
                        ]
                    });

                });
            </script>

            <div class="row testimonial-active">
                <?php foreach ($settings['reviews_list'] as $item) :
                    if (!empty($item['reviewer_image']['url'])) {
                        $tg_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $item['reviewer_image_size_size']) : $item['reviewer_image']['url'];
                        $tg_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                    }
                ?>
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <?php if (!empty($tg_reviewer_image)) : ?>
                                <div class="testimonial-avatar">
                                    <img src="<?php echo esc_url($tg_reviewer_image); ?>" alt="<?php echo esc_url($tg_reviewer_image_alt); ?>">

                                    <?php if (!empty($item['reviewer_icon']['url'])) : ?>
                                        <div class="icon">
                                            <img src="<?php echo esc_url($item['reviewer_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="testimonial-content">
                                <?php if (!empty($item['review_content'])) : ?>
                                    <p><?php echo esc_html($item['review_content']); ?></p>
                                <?php endif; ?>
                                <div class="content-bottom">
                                    <?php if (!empty($item['reviewer_name'])) : ?>
                                        <h2 class="title"><?php echo genix_kses($item['reviewer_name']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($item['reviewer_designation'])) : ?>
                                        <span><?php echo genix_kses($item['reviewer_designation']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_Testimonial());
