<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Xeco Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Hero_Slider extends Widget_Base
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
        return 'hero-slider';
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
        return __('Hero Slider', 'genixcore');
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

        // Slider
        $this->start_controls_section(
            'tg_slider_area',
            [
                'label' => esc_html__('Slider Area', 'genixcore'),
            ]
        );

        $slider = new \Elementor\Repeater();

        $slider->add_control(
            'slider_img',
            [
                'label' => esc_html__('Choose Background', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $slider->add_control(
            'slider_title',
            [
                'label' => esc_html__('Main Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Financial Planning and Growth Platform', 'genixcore'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'slider_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum facilisis vulputate cursus vivamus.', 'genixcore'),
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'slider_button_show',
            [
                'label' => esc_html__('Show Button', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $slider->add_control(
            'slider_btn_text',
            [
                'label' => esc_html__('Button Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'genixcore'),
                'title' => esc_html__('Enter button text', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'slider_button_show' => 'yes'
                ],
            ]
        );

        $slider->add_control(
            'slider_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'slider_button_show' => 'yes'
                ],
            ]
        );

        $slider->add_control(
            'slider_btn_link',
            [
                'label' => esc_html__('Button link', 'genixcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'genixcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'slider_btn_link_type' => '1',
                    'slider_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );

        $slider->add_control(
            'slider_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'genixcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => genix_get_all_pages(),
                'condition' => [
                    'slider_btn_link_type' => '2',
                    'slider_button_show' => 'yes'
                ]
            ]
        );

        $slider->add_control(
            'video_text',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Video Button Text', 'genixcore'),
                'default' => esc_html__('See How Its Works', 'genixcore'),
                'placeholder' => esc_html__('Type video text here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $slider->add_control(
            'video_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Video URL', 'genixcore'),
                'default' => esc_html__('https://www.youtube.com/watch?v=bixR-KIJKYM', 'genixcore'),
                'placeholder' => esc_html__('Type video url here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slider_info_lists',
            [
                'label' => esc_html__('Slider Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $slider->get_controls(),
                'default' => [
                    [
                        'slider_title' => esc_html__('Financial Planning and Growth Platform', 'genixcore'),
                    ],
                    [
                        'slider_title' => esc_html__('Financial Planning and Growth Platform', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'exclude' => ['custom'],
                'default' => 'full',
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

        // style tab here
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => esc_html__('Typography', 'genixcore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Title', 'genixcore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Description', 'genixcore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tg-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tg-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .tg-content p',
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
        $settings = $this->get_settings_for_display(); ?>

        <script>
            jQuery(document).ready(function($) {

                /*===========================================
                    =           Data Background          =
                =============================================*/
                $("[data-background]").each(function() {
                    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
                })

                $(window).on('load', function() {
                    mainSlider();
                });

                /*===========================================
                    =    		 Main Slider		      =
                =============================================*/
                function mainSlider() {
                    var BasicSlider = $('.slider-active');
                    BasicSlider.on('init', function(e, slick) {
                        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
                        doAnimations($firstAnimatingElements);
                    });
                    BasicSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                        doAnimations($animatingElements);
                    });
                    BasicSlider.slick({
                        autoplay: false,
                        autoplaySpeed: 10000,
                        dots: false,
                        fade: true,
                        arrows: false,
                        responsive: [{
                            breakpoint: 767,
                            settings: {
                                dots: false,
                                arrows: false
                            }
                        }]
                    });

                    function doAnimations(elements) {
                        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                        elements.each(function() {
                            var $this = $(this);
                            var $animationDelay = $this.data('delay');
                            var $animationType = 'animated ' + $this.data('animation');
                            $this.css({
                                'animation-delay': $animationDelay,
                                '-webkit-animation-delay': $animationDelay
                            });
                            $this.addClass($animationType).one(animationEndEvents, function() {
                                $this.removeClass($animationType);
                            });
                        });
                    }
                }

            });
        </script>

        <!-- slider-area -->
        <section class="slider-area">
            <div class="slider-active">
                <?php foreach ($settings['slider_info_lists'] as $item) :

                    if (!empty($item['slider_img']['url'])) {
                        $tg_slider_image_url = !empty($item['slider_img']['id']) ? wp_get_attachment_image_url($item['slider_img']['id'], $settings['thumbnail_size']) : $item['slider_img']['url'];
                        $tg_slider_image_alt = get_post_meta($item["slider_img"]["id"], "_wp_attachment_image_alt", true);
                    }

                    // btn Link 01
                    if ('2' == $item['slider_btn_link_type']) {
                        $link = get_permalink($item['slider_btn_page_link']);
                        $target = '_self';
                        $rel = 'nofollow';
                    } else {
                        $link = !empty($item['slider_btn_link']['url']) ? $item['slider_btn_link']['url'] : '';
                        $target = !empty($item['slider_btn_link']['is_external']) ? '_blank' : '';
                        $rel = !empty($item['slider_btn_link']['nofollow']) ? 'nofollow' : '';
                    }
                ?>
                    <div class="single-slider slider-bg" data-background="<?php echo esc_url($tg_slider_image_url); ?>">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-9 col-lg-10">
                                    <div class="slider-content tg-content">

                                        <?php if (!empty($item['slider_title'])) : ?>
                                            <h2 class="title" data-animation="fadeInUp" data-delay=".2s"><?php echo genix_kses($item['slider_title']) ?></h2>
                                        <?php endif; ?>

                                        <?php if (!empty($item['slider_desc'])) : ?>
                                            <p data-animation="fadeInUp" data-delay=".4s"><?php echo genix_kses($item['slider_desc']) ?></p>
                                        <?php endif; ?>

                                        <div class="slider-btn">
                                            <?php if (!empty($item['slider_button_show'])) : ?>
                                                <a target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>" href="<?php echo esc_url($link); ?>" class="btn btn-three" data-animation="fadeInLeft" data-delay=".6s"><?php echo esc_html($item['slider_btn_text']) ?> <span></span></a>
                                            <?php endif; ?>

                                            <?php if (!empty($item['video_url'] || $item['video_text'])) : ?>
                                                <a href="<?php echo esc_url($item['video_url']); ?>" class="play-btn popup-video" data-animation="fadeInRight" data-delay=".6s"><i class="fas fa-play"></i><?php echo esc_html($item['video_text']) ?></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- slider-area-end -->

<?php
    }
}

$widgets_manager->register(new TG_Hero_Slider());
