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
class TG_WorkProcess extends Widget_Base
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
        return 'work-process';
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
        return __('Work Process', 'genixcore');
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

        // _tg_list
        $this->start_controls_section(
            '_tg_work_list',
            [
                'label' => esc_html__('Work Process List', 'genixcore'),
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
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Step One', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Discover Plan', 'genixcore'),
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
                        'sub_title' => esc_html__('Step One', 'genixcore'),
                        'tg_title' => esc_html__('Discover Plan', 'genixcore'),
                    ],
                    [
                        'sub_title' => esc_html__('Step Two', 'genixcore'),
                        'tg_title' => esc_html__('Prototype Project', 'genixcore'),
                    ],
                    [
                        'sub_title' => esc_html__('Step Three', 'genixcore'),
                        'tg_title' => esc_html__('Website Test', 'genixcore'),
                    ],
                    [
                        'sub_title' => esc_html__('Step Four', 'genixcore'),
                        'tg_title' => esc_html__('Build Website', 'genixcore'),
                    ],
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

                /*=============================================
                    = 	Intersection Observer		=
                =============================================*/
                if (!!window.IntersectionObserver) {
                    let observer = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add("active-animation");
                                //entry.target.src = entry.target.dataset.src;
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        rootMargin: "0px 0px -100px 0px"
                    });
                    document.querySelectorAll('.has-animation').forEach(block => {
                        observer.observe(block)
                    });
                } else {
                    document.querySelectorAll('.has-animation').forEach(block => {
                        block.classList.remove('has-animation')
                    });
                }

            });
        </script>

        <div class="has-animation">
            <div class="work-item-wrap">
                <div class="work-line-shape">
                    <svg width="1169" height="135" viewBox="0 0 1169 135" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="2">
                            <path class="dashed1" d="M1 134L197 2L448 128.5L746.5 6L1010.5 125.5L1168 3" stroke="rgba(0 0 0 / 25%)" stroke-dasharray="8 8" fill-rule="evenodd" stroke-linecap="butt" stroke-linejoin="miter" />
                            <path class="dashed2" d="M1 134L197 2L448 128.5L746.5 6L1010.5 125.5L1168 3" stroke="rgba(239 247 255)" stroke-dasharray="8 8" fill-rule="evenodd" stroke-linecap="butt" stroke-linejoin="miter" />
                        </g>
                    </svg>
                </div>
                <div class="row justify-content-center">
                    <?php foreach ($settings['item_lists'] as $key => $item) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="work-item wow fadeInUp" data-wow-delay=".<?php echo esc_html($key) * 2; ?>s">
                                <?php if (!empty($item['tg_image_icon']['url'])) : ?>
                                    <div class="work-icon">
                                        <img src="<?php echo esc_url($item['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="work-content">
                                    <?php if (!empty($item['sub_title'])) : ?>
                                        <span><?php echo genix_kses($item['sub_title']); ?></span>
                                    <?php endif; ?>

                                    <?php if (!empty($item['tg_title'])) : ?>
                                        <h2 class="title"><?php echo genix_kses($item['tg_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new TG_WorkProcess());
