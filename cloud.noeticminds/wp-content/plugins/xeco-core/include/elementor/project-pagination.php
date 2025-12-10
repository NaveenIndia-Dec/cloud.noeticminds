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
class TG_Project_Pagination extends Widget_Base
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
        return 'tg-pagination';
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
        return __('Project Pagination', 'genixcore');
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

        // _tg_pagination
        $this->start_controls_section(
            '_tg_pagination',
            [
                'label' => esc_html__('Next / Prev Pagination', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_prev_text',
            [
                'label' => esc_html__('Prev Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Previous Work', 'genixcore'),
                'placeholder' => esc_html__('Type Title', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_next_text',
            [
                'label' => esc_html__('Next Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Next Work', 'genixcore'),
                'placeholder' => esc_html__('Type Title', 'genixcore'),
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


        <div class="pev-next-post-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                        <div class="post-item">
                            <div class="icon">
                                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </div>
                            <div class="content">
                                <span><?php echo genix_kses($settings['tg_prev_text']) ?></span>
                                <h5 class="title">
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                        <?php echo apply_filters('the_title', $prev_post->post_title); ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-2">
                    <a href="<?php print esc_url(home_url('/project/')); ?>" class="navigation-filter">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/navigation.svg" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                    </a>
                </div>

                <div class="col-md-5">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <div class="post-item next-post">
                            <div class="icon">
                                <a href="<?php echo get_permalink($next_post->ID); ?>"><i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="content">
                                <span><?php echo genix_kses($settings['tg_next_text']) ?></span>
                                <h5 class="title">
                                    <a href="<?php echo get_permalink($next_post->ID); ?>">
                                        <?php echo apply_filters('the_title', $next_post->post_title); ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_Project_Pagination());
