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
class TG_Roadmap extends Widget_Base
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
        return 'tg-roadmap';
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
        return __('Roadmap', 'genixcore');
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

        // Roadmap
        $this->start_controls_section(
            'tg_roadmap_area',
            [
                'label' => esc_html__('Roadmap Area', 'genixcore'),
            ]
        );

        $roadmap = new \Elementor\Repeater();

        $roadmap->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('End of Q4 2021', 'genixcore'),
                'label_block' => true,
            ]
        );

        $roadmap->add_control(
            'roadmap_title',
            [
                'label' => esc_html__('Main Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Research', 'genixcore'),
                'label_block' => true,
            ]
        );

        $roadmap->add_control(
            'roadmap_desc',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('SubQuery Builders/Grants Program SQT Network contract internal MVP Coordinator and client SDK implementations', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'roadmap_info_lists',
            [
                'label' => esc_html__('Roadmap Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $roadmap->get_controls(),
                'default' => [
                    [
                        'roadmap_title' => esc_html__('Research', 'genixcore'),
                    ],
                    [
                        'roadmap_title' => esc_html__('App Beta Test', 'genixcore'),
                    ],
                ],
                'title_field' => '{{{ roadmap_title }}}',
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
                    '{{WRAPPER}} .roadmap-content .title' => 'text-transform: {{VALUE}};',
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
                    '{{WRAPPER}} .roadmap-content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .roadmap-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .roadmap-content .title',
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
                    '{{WRAPPER}} .roadmap-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .roadmap-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .roadmap-content p',
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
                    =         roadMap Active       =
                =============================================*/
                $('.roadMap-active').slick({
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    centerMode: true,
                    centerPadding: '260px',
                    autoplay: true,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1400,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                centerPadding: '100px',
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                centerPadding: '40px',
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                enterPadding: '0',
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                enterPadding: '0',
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                enterPadding: '0',
                                centerMode: false,
                            }
                        },
                    ]
                });

            });
        </script>

        <div class="row roadMap-active">
            <?php foreach ($settings['roadmap_info_lists'] as $item) : ?>
                <div class="col-lg-4">
                    <div class="roadmap-item">
                        <?php if (!empty($item['sub_title'])) : ?>
                            <span class="roadmap-title"><?php echo genix_kses($item['sub_title']); ?></span>
                        <?php endif; ?>
                        <div class="roadmap-content">
                            <h4 class="title">
                                <span class="dot"></span>
                                <?php echo genix_kses($item['roadmap_title']); ?>
                            </h4>
                            <p><?php echo genix_kses($item['roadmap_desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_Roadmap());