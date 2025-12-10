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
class TG_Team extends Widget_Base
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
        return 'tg-team';
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
        return __('Team', 'genixcore');
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

        // member list
        $this->start_controls_section(
            '_section_teams',
            [
                'label' => esc_html__('Members', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Team Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-linkedin',
                ]
            );
        } else {
            $repeater->add_control(
                'tg_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fab fa-linkedin-in',
                        'library' => 'brands',
                    ],
                ]
            );
        }

        $repeater->add_control(
            'social_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Social URL', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Type url here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Team Name', 'genixcore'),
                'default' => esc_html__('Floyd Miles', 'genixcore'),
                'placeholder' => esc_html__('Type name here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => esc_html__('Designation', 'genixcore'),
                'default' => esc_html__('Marketer', 'genixcore'),
                'placeholder' => esc_html__('Type designation here', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // REPEATER
        $this->add_control(
            'teams',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Floyd Miles', 'genixcore'),
                        'designation' => esc_html__('Marketer', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Eleanor Pena', 'genixcore'),
                        'designation' => esc_html__('Founder & CEO', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Arlene McCoy', 'genixcore'),
                        'designation' => esc_html__('Technology Officer', 'genixcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Robert Fox', 'genixcore'),
                        'designation' => esc_html__('Financial Officer', 'genixcore'),
                    ],
                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        // STYLE TAB
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
        $settings = $this->get_settings_for_display(); ?>


        <script>
            jQuery(document).ready(function($) {

                /*==========================================
                    =    		Team Active		      =
                =============================================*/
                $('.team-active').slick({
                    dots: false,
                    infinite: true,
                    speed: 1000,
                    centerMode: true,
                    centerPadding: '130px',
                    autoplay: false,
                    arrows: false,
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1400,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 1,
                                infinite: true,
                                centerPadding: '70px',
                            }
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                infinite: true,
                                centerPadding: '40px',
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                centerPadding: '0',
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                arrows: false,
                                centerPadding: '0',
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                centerPadding: '0',
                                centerMode: false,
                            }
                        },
                    ]
                });

            });
        </script>

        <div class="row team-active g-0">
            <?php foreach ($settings['teams'] as $item) :

                if (!empty($item['image']['url'])) {
                    $genix_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url($item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                    $genix_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                }
            ?>
                <div class="col">
                    <div class="team-item">
                        <div class="team-thumb">
                            <img src="<?php echo esc_url($genix_team_image_url); ?>" alt="<?php echo esc_attr($genix_team_image_alt); ?>">

                            <?php if (!empty($item['tg_icon']) || !empty($item['tg_selected_icon']['value'])) : ?>
                                <a href="<?php echo esc_url($item['social_url']); ?>" target="_blank" class="team-social">
                                    <?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?>
                                </a>
                            <?php endif; ?>

                        </div>
                        <div class="team-content">
                            <h2 class="title"><?php echo genix_kses($item['team_name']); ?></h2>
                            <?php if (!empty($item['designation'])) : ?>
                                <span><?php echo genix_kses($item['designation']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_Team());
