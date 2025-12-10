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
class TG_Chart extends Widget_Base
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
        return 'tg-chart';
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
        return __('Chart', 'genixcore');
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

        // Chart
        $this->start_controls_section(
            'tg_chart_area',
            [
                'label' => esc_html__('Chart Area One', 'genixcore'),
            ]
        );

        $this->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Funding Allocation', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contingency', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_percentage',
            [
                'label' => esc_html__('Percentage %', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('70', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_color',
            [
                'label' => esc_html__('Chart Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#44A08D',
            ]
        );

        $this->add_control(
            'chart_info_lists',
            [
                'label' => esc_html__('Chart Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_title' => esc_html__('Contingency', 'genixcore'),
                        'item_percentage' => esc_html__('70', 'genixcore'),
                    ],
                    [
                        'item_title' => esc_html__('Business Development', 'genixcore'),
                        'item_percentage' => esc_html__('20', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Chart
        $this->start_controls_section(
            '__tg_chart_area',
            [
                'label' => esc_html__('Chart Area Two', 'genixcore'),
            ]
        );

        $this->add_control(
            'tab_title2',
            [
                'label' => esc_html__('Tab Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Token Distribution', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'item_title2',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contingency', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'item_percentage2',
            [
                'label' => esc_html__('Percentage %', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('70', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'item_color2',
            [
                'label' => esc_html__('Chart Color', 'genixcore'),
                'type' => Controls_Manager::COLOR,
                'default' => '#44A08D',
            ]
        );

        $this->add_control(
            'chart_info_lists2',
            [
                'label' => esc_html__('Chart Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'item_title2' => esc_html__('Contingency', 'genixcore'),
                        'item_percentage2' => esc_html__('70', 'genixcore'),
                    ],
                    [
                        'item_title2' => esc_html__('Business Development', 'genixcore'),
                        'item_percentage2' => esc_html__('20', 'genixcore'),
                    ],
                ],
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
        $settings = $this->get_settings_for_display(); ?>

        <script>
            jQuery(document).ready(function($) {

                /*===========================================
                    =    		 Chart Customize	=
                =============================================*/
                const ctx = document.getElementById('doughnutChart');

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            <?php foreach ($settings['chart_info_lists'] as $item) : ?>
                                '<?php echo esc_html($item['item_title']); ?>',
                            <?php endforeach; ?>
                        ],
                        datasets: [{
                            label: ['<?php echo esc_html($settings['tab_title']); ?>'],
                            data: [
                                <?php foreach ($settings['chart_info_lists'] as $item) : ?>
                                    <?php echo esc_html($item['item_percentage']); ?>,
                                <?php endforeach; ?>
                            ],
                            borderWidth: 0,
                            backgroundColor: [
                                <?php foreach ($settings['chart_info_lists'] as $item) : ?>
                                    '<?php echo esc_attr($item['item_color']); ?>',
                                <?php endforeach; ?>
                            ],
                            hoverOffset: 1
                        }],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                /*===========================================
                    =    		 Chart Customize	=
                =============================================*/
                const ctx2 = document.getElementById('doughnutChart2');

                new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: [
                            <?php foreach ($settings['chart_info_lists2'] as $item) : ?>
                                '<?php echo esc_html($item['item_title2']); ?>',
                            <?php endforeach; ?>
                        ],
                        datasets: [{
                            label: ['<?php echo esc_html($settings['tab_title2']); ?>'],
                            data: [
                                <?php foreach ($settings['chart_info_lists2'] as $item) : ?>
                                    <?php echo esc_html($item['item_percentage2']); ?>,
                                <?php endforeach; ?>
                            ],
                            borderWidth: 0,
                            backgroundColor: [
                                <?php foreach ($settings['chart_info_lists2'] as $item) : ?>
                                    '<?php echo esc_attr($item['item_color2']); ?>',
                                <?php endforeach; ?>
                            ],
                            hoverOffset: 0
                        }],
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

            });
        </script>

        <div class="chart-wrap">
            <div class="chart-tab">
                <ul class="nav nav-tabs" id="chartTab" role="tablist">

                    <?php if (!empty($settings['tab_title'])) : ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="funding-tab" data-bs-toggle="tab" data-bs-target="#funding-tab-pane" type="button" role="tab" aria-controls="funding-tab-pane" aria-selected="true"><?php echo esc_html($settings['tab_title']); ?></button>
                        </li>
                    <?php endif; ?>

                    <?php if (!empty($settings['tab_title2'])) : ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="token-tab" data-bs-toggle="tab" data-bs-target="#token-tab-pane" type="button" role="tab" aria-controls="token-tab-pane" aria-selected="false"><?php echo esc_html($settings['tab_title2']); ?></button>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="tab-content" id="chartTabContent">
                <div class="tab-pane show active" id="funding-tab-pane" role="tabpanel" aria-labelledby="funding-tab" tabindex="0">
                    <div class="chart">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                    <div class="chart-list">
                        <ul class="list-wrap">
                            <?php foreach ($settings['chart_info_lists'] as $item) : ?>
                                <li><span style="background: <?php echo esc_attr($item['item_color']); ?>;"></span> <?php echo esc_html($item['item_title']); ?>: <?php echo esc_html($item['item_percentage']); ?>%</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="token-tab-pane" role="tabpanel" aria-labelledby="token-tab" tabindex="0">
                    <div class="chart">
                        <canvas id="doughnutChart2"></canvas>
                    </div>
                    <div class="chart-list">
                        <ul class="list-wrap">
                            <?php foreach ($settings['chart_info_lists2'] as $item) : ?>
                                <li><span style="background: <?php echo esc_attr($item['item_color2']); ?>;"></span> <?php echo esc_html($item['item_title2']); ?>: <?php echo esc_html($item['item_percentage2']); ?>%</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_Chart());
