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
class TG_ServicesSidebar extends Widget_Base
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
        return 'tg-services-sidebar';
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
        return __('Services Sidebar', 'genixcore');
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
            'tg_layout',
            [
                'label' => esc_html__('Widget Layout', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_design_style',
            [
                'label' => esc_html__('Select Widget', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Services List', 'genixcore'),
                    'layout-2' => esc_html__('Contact Info', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // Widget Group
        $this->start_controls_section(
            '__tg_widget_group',
            [
                'label' => esc_html__('Widget Group', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1'
                ]
            ]
        );

        $this->add_control(
            'show_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'genixcore'),
                'description' => esc_html__('Leave blank or enter -1 for all.', 'genixcore'),
                'type' => Controls_Manager::NUMBER,
                'default' => '5',
            ]
        );

        $this->end_controls_section();

        // Contact Info
        $this->start_controls_section(
            '__tg_contact_group',
            [
                'label' => esc_html__('Contact Group', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_image_icon',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Icon', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'contact_text',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => esc_html__('Item Text', 'genixcore'),
                'default' => esc_html__('Australia —785 15h Street, Office 478 Melbourne, De 81566', 'genixcore'),
                'dynamic' => [
                    'active' => true,
                ]
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
                        'contact_text' => esc_html__('Australia —785 15h Street, Office 478 Melbourne, De 81566', 'genixcore'),
                    ],
                    [
                        'contact_text' => esc_html__('infoyour@email.com', 'genixcore'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Style TAB
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

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="sidebar-contact-info">
                <ul class="list-wrap">
                    <?php foreach ($settings['item_lists'] as $item) : ?>
                        <li>
                            <?php if (!empty($item['tg_image_icon']['url'])) : ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($item['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                </div>
                            <?php endif; ?>
                            <div class="content">
                                <p><?php echo genix_kses($item['contact_text']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        <?php else : ?>

            <div class="sidebar-services-list">
                <ul class="list-wrap">
                    <?php
                    $args = new \WP_Query(array(
                        'post_type' => 'services',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'posts_per_page' => $settings['show_per_page'],
                    ));

                    /* Start the Loop */
                    while ($args->have_posts()) : $args->the_post();
                    ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_ServicesSidebar());
