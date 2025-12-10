<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Xeco Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Fact extends Widget_Base
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
        return 'genix-fact';
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
        return __('Fact', 'genixcore');
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
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Fact group
        $this->start_controls_section(
            'tg_fact',
            [
                'label' => esc_html__('Fact List', 'genixcore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'repeater_animation',
            [
                'label' => esc_html__('Animation Delay(ms)', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('.2', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'tg_image_icon',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Icon', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tg_fact_number',
            [
                'label' => esc_html__('Number', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('100', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_fact_number_cap',
            [
                'label' => esc_html__('Caption', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_fact_desc',
            [
                'label' => esc_html__('Fact Description', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Client Satisfaction', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_bg_color',
            [
                'label' => esc_html__('Background Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'tg_fact_list',
            [
                'label' => esc_html__('Fact Lists', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_fact_number' => esc_html__('100', 'genixcore'),
                        'tg_fact_desc' => esc_html__('Client Satisfaction', 'genixcore'),
                    ],
                    [
                        'tg_fact_number' => esc_html__('1150', 'genixcore'),
                        'tg_fact_desc' => esc_html__('Complete Project', 'genixcore'),
                    ],
                    [
                        'tg_fact_number' => esc_html__('1320', 'genixcore'),
                        'tg_fact_desc' => esc_html__('Design Resource', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Fact Group 02
        $this->start_controls_section(
            'tg_fact2',
            [
                'label' => esc_html__('Fact List', 'genixcore'),
                'description' => esc_html__('Control all the style settings from Style tab', 'genixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tg_design_style!' => 'layout-1'
                ]
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'genixcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('SVG Import', 'genixcore'),
                    'icon' => esc_html__('Icon', 'genixcore'),
                ],
            ]
        );

        $repeater2->add_control(
            'tg_svg',
            [
                'label' => esc_html__('Import SVG Code', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Paste SVG code', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'tg_icon_type' => 'image'
                ]
            ]
        );

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater2->add_control(
                'tg_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'tg_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater2->add_control(
                'tg_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'tg_icon_type' => 'icon'
                    ]
                ]
            );
        }

        $repeater2->add_control(
            'tg_fact_number2',
            [
                'label' => esc_html__('Number', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2562', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_fact_number_cap2',
            [
                'label' => esc_html__('Caption', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('K', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_fact_desc2',
            [
                'label' => esc_html__('Fact Description', 'genixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Satisfied Clients', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_fact_list2',
            [
                'label' => esc_html__('Fact Lists', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_fact_number2' => esc_html__('2562', 'genixcore'),
                        'tg_fact_desc2' => esc_html__('Satisfied Clients', 'genixcore'),
                    ],
                    [
                        'tg_fact_number2' => esc_html__('176', 'genixcore'),
                        'tg_fact_desc2' => esc_html__('Active Project', 'genixcore'),
                    ],
                    [
                        'tg_fact_number2' => esc_html__('28', 'genixcore'),
                        'tg_fact_desc2' => esc_html__('Winning Award', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // TAB_STYLE
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => esc_html__('Title / Content', 'genixcore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Icon Color
        $this->add_control(
            '_heading_icon',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Icon', 'genixcore'),
                'separator' => 'before',
                'condition' => [
                    'tg_design_style!' => 'layout-1'
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tg-counter .icon' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'tg_design_style!' => 'layout-1'
                ]
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
                    '{{WRAPPER}} .tg-counter .count' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tg-counter .count' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .count',
            ]
        );

        // Subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__('Subtitle', 'genixcore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'genixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tg-counter p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Text Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tg-counter p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub-title',
                'selector' => '{{WRAPPER}} .tg-counter p',
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

        <script>
            jQuery(document).ready(function($) {

                /*===========================================
                    =    		Odometer Active  	       =
                =============================================*/
                $('.odometer').appear(function(e) {
                    var odo = $(".odometer");
                    odo.each(function() {
                        var countNumber = $(this).attr("data-count");
                        $(this).html(countNumber);
                    });
                });

            });
        </script>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="row justify-content-center">
                <?php foreach ($settings['tg_fact_list2'] as $item) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="counter-item-two tg-counter">
                            <div class="counter-icon-two icon">
                                <?php if ($item['tg_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($item['tg_icon']) || !empty($item['tg_selected_icon']['value'])) : ?>
                                        <?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php echo genix_kses($item['tg_svg']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="counter-content-two">
                                <h2 class="count"><span class="odometer" data-count="<?php echo genix_kses($item['tg_fact_number2']); ?>"></span><?php echo esc_html($item['tg_fact_number_cap2']) ?></h2>
                                <?php if (!empty($item['tg_fact_desc2'])) : ?>
                                    <p><?php echo genix_kses($item['tg_fact_desc2']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else : ?>

            <div class="counter-inner">
                <div class="row justify-content-center">
                    <?php foreach ($settings['tg_fact_list'] as $item) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item tg-counter wow fadeInUp" data-wow-delay="<?php echo esc_attr($item['repeater_animation']) ?>s" style="background: <?php echo esc_attr( $item['item_bg_color'] ) ?>;">
                                <?php if (!empty($item['tg_image_icon']['url'])) : ?>
                                    <div class="counter-icon">
                                        <img src="<?php echo esc_url($item['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="counter-content">
                                    <h2 class="count"><span class="odometer" data-count="<?php echo genix_kses($item['tg_fact_number']); ?>"></span><?php echo esc_html($item['tg_fact_number_cap']) ?></h2>
                                    <?php if (!empty($item['tg_fact_desc'])) : ?>
                                        <p><?php echo genix_kses($item['tg_fact_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_Fact());
