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
class TG_ScrollDown extends Widget_Base
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
        return 'tg-scrolldown';
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
        return __('Scroll Down', 'genixcore');
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

        // ScrollDown
        $this->start_controls_section(
            'tg_section_scrolldown',
            [
                'label' => esc_html__('ScrollDown', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_scrolldown_id',
            [
                'label' => esc_html__('Section ID', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Section ID #your-id', 'genixcore'),
                'default' => esc_html__('#', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'genix_align',
            [
                'label' => esc_html__('Alignment', 'genixcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'genixcore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'genixcore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'genixcore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .banner-scroll-down' => 'justify-content: {{VALUE}};'
                ]
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

                /*=============================================
                =          Click To Section     =
                =============================================*/
                $('.section-link').click(function(e) {
                    e.preventDefault();
                    var target = $($(this).attr('href'));
                    if (target.length) {
                        var scrollTo = target.offset().top;
                        $('body, html').animate({
                            scrollTop: scrollTo + 'px'
                        }, 800);
                    }
                });

            });
        </script>


        <div class="banner-scroll-down">
            <a href="<?php echo esc_url($settings['tg_scrolldown_id']); ?>" class="section-link">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_ScrollDown());
