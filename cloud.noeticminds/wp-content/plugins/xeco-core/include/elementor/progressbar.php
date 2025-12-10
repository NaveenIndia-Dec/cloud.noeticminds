<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Xeco Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Progressbar extends Widget_Base
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
        return 'tg-progressbar';
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
        return __('Progressbar', 'genixcore');
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

        // _tg_progressbar
        $this->start_controls_section(
            '_tg_progressbar',
            [
                'label' => esc_html__('Progressbar', 'genixcore'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'progress_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pre-Sale', 'genixcore'),
                'placeholder' => esc_html__('Type Title', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_progress_list',
            [
                'label' => esc_html__('Progress Lists', 'genixcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'progress_title' => esc_html__('Pre-Sale', 'genixcore'),
                    ],
                    [
                        'progress_title' => esc_html__('soft cap', 'genixcore'),
                    ],
                    [
                        'progress_title' => esc_html__('bonus', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->add_control(
            'tg_width',
            [
                'label' => esc_html__('Progressbar Width', 'genixcore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => '%',
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // _tg_target
        $this->start_controls_section(
            '_tg_target_raised',
            [
                'label' => esc_html__('Target & Price', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_show_hide',
            [
                'label' => esc_html__('Show Target & Price', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'target_raised',
            [
                'label' => esc_html__('Target Raised', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('65 target raised', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'target_price',
            [
                'label' => esc_html__('Price', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('1 ETH = $1000 = 3177.38 CIC', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'genixcore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tg_padding',
            [
                'label' => esc_html__('Progress Step Padding', 'genixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .progress-wrap .list-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .progress-title' => 'text-transform: {{VALUE}};',
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


        <div class="progress-wrap">

            <ul class="list-wrap">
                <?php foreach ($settings['tg_progress_list'] as $item) : ?>
                    <li><?php echo esc_html($item['progress_title']) ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar"></div>
            </div>

            <?php if (!empty($settings['tg_show_hide'])) : ?>
                <h6 class="progress-title"> <?php echo esc_html($settings['target_raised']); ?> <span><?php echo esc_html($settings['target_price']); ?></span></h6>
            <?php endif; ?>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_Progressbar());
