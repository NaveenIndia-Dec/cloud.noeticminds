<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
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
class TG_Download extends Widget_Base
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
        return 'tg-download';
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
        return __('Apps Download', 'genixcore');
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

        // _tg_image
        $this->start_controls_section(
            '_tg_bg_images',
            [
                'label' => esc_html__('Background Shapes', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_shape',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Left Shape', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_shape2',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Right Shape', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // _tg_title
        $this->start_controls_section(
            '_tg_title_text',
            [
                'label' => esc_html__('Title & Content', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Control Application From Your Mobile', 'genixcore'),
                'placeholder' => esc_html__('Type Text Here', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'genixcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'number' => esc_html__('Number', 'genixcore'),
                    'icon' => esc_html__('Icon', 'genixcore'),
                ],
                'default' => 'number',
            ]
        );

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
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
            $repeater->add_control(
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

        $repeater->add_control(
            'repeater_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('White Paper', 'genixcore'),
                'placeholder' => esc_html__('Type list text', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_lists',
            [
                'label' => esc_html__('Item Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'repeater_title' => esc_html__('White Paper', 'genixcore'),
                    ],
                    [
                        'repeater_title' => esc_html__('Privacy & Policy', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // tg_button_group
        $this->start_controls_section(
            'tg_button_group',
            [
                'label' => esc_html__('Button', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_button_show',
            [
                'label' => esc_html__('Show Button', 'genixcore'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'genixcore'),
                'label_off' => esc_html__('Hide', 'genixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'app_store',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Button Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'app_store_url',
            [
                'label' => esc_html__('Button URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Type URL Here', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'play_store',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Button Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'play_store_url',
            [
                'label' => esc_html__('Button URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'genixcore'),
                'placeholder' => esc_html__('Type URL Here', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_images',
            [
                'label' => esc_html__('Images', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Image', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_image_shape',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Shape', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
            'inner_padding',
            [
                'label' => esc_html__('Padding', 'genixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .download-inner-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab Here
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
                    '{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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


        <div class="download-inner-wrap">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="download-content">
                        <?php if (!empty($settings['tg_title'])) : ?>
                            <div class="section-title mb-40">
                                <h2 class="title"><?php echo genix_kses($settings['tg_title']); ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="download-list">
                            <ul class="list-wrap">
                                <?php foreach ($settings['item_lists'] as $key => $item) : ?>
                                    <li>
                                        <?php if ($item['tg_icon_type'] !== 'number') : ?>
                                            <?php if (!empty($item['tg_icon']) || !empty($item['tg_selected_icon']['value'])) : ?>
                                                <?php genix_render_icon($item, 'tg_icon', 'tg_selected_icon'); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span><?php echo esc_html($key + 1); ?></span>
                                        <?php endif; ?>
                                        <?php echo genix_kses($item['repeater_title']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php if (!empty($settings['tg_button_show'])) : ?>
                            <div class="download-btn-wrap">

                                <?php if (!empty($settings['app_store_url'])) : ?>
                                    <a href="<?php echo esc_url($settings['app_store_url']); ?>" target="_blank" class="download-btn">
                                        <img src="<?php echo esc_url($settings['app_store']['url']) ?>" alt="<?php echo esc_attr__('Download Button', 'genixcore') ?>">
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($settings['play_store_url'])) : ?>
                                    <a href="<?php echo esc_url($settings['play_store_url']); ?>" target="_blank" class="download-btn">
                                        <img src="<?php echo esc_url($settings['play_store']['url']) ?>" alt="<?php echo esc_attr__('Download Button', 'genixcore') ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="download-img">
                        <?php if (!empty($settings['tg_image']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['tg_image']['url']) ?>" alt="<?php echo esc_attr__('Image', 'genixcore') ?>">
                        <?php endif; ?>

                        <?php if (!empty($settings['tg_image_shape']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['tg_image_shape']['url']) ?>" alt="<?php echo esc_attr__('Shape', 'genixcore') ?>">
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="download-shape-wrap">
                <?php if (!empty($settings['tg_shape']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['tg_shape']['url']) ?>" alt="<?php echo esc_attr__('Image', 'genixcore') ?>">
                <?php endif; ?>

                <?php if (!empty($settings['tg_shape2']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['tg_shape2']['url']) ?>" alt="<?php echo esc_attr__('Image', 'genixcore') ?>">
                <?php endif; ?>
            </div>

        </div>

<?php
    }
}

$widgets_manager->register(new TG_Download());
