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
class TG_ImageBox extends Widget_Base
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
        return 'genix-image';
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
        return __('Image Box', 'genixcore');
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
                    'layout-3' => esc_html__('Layout 3', 'genixcore'),
                    'layout-4' => esc_html__('Layout 4', 'genixcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_image_section',
            [
                'label' => esc_html__('Image', 'genixcore'),
            ]
        );

        $this->add_control(
            'tg_image',
            [
                'label' => esc_html__('Choose Image', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_image2',
            [
                'label' => esc_html__('Choose Image 02', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_image3',
            [
                'label' => esc_html__('Choose Image 03', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]
            ]
        );

        $this->add_control(
            'tg_image4',
            [
                'label' => esc_html__('Choose Image 03', 'genixcore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style' => 'layout-2'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        // _tg_video
        $this->start_controls_section(
            '_tg_video_section',
            [
                'label' => esc_html__('Video URL', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-4'
                ]
            ]
        );

        $this->add_control(
            'image_video_url',
            [
                'label' => esc_html__('Video URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.youtube.com/watch?v=bixR-KIJKYM', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // _tg_experience
        $this->start_controls_section(
            '_tg_experience',
            [
                'label' => esc_html__('Experience', 'genixcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3'
                ]
            ]
        );

        $this->add_control(
            'experience_year',
            [
                'label' => esc_html__('Experience Year', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => wp_kses_post('25', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'experience_text',
            [
                'label' => esc_html__('Experience Text', 'genixcore'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => wp_kses_post('YEARS OF EXPERIENCE', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Style
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
        $settings = $this->get_settings_for_display();

        if (!empty($settings['tg_image']['url'])) {
            $tg_image_url = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url($settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
            $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
        }

        if (!empty($settings['tg_image2']['url'])) {
            $tg_image_url2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url($settings['tg_image2']['id'], $settings['tg_image_size_size']) : $settings['tg_image2']['url'];
            $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
        }

        if (!empty($settings['tg_image3']['url'])) {
            $tg_image_url3 = !empty($settings['tg_image3']['id']) ? wp_get_attachment_image_url($settings['tg_image3']['id'], $settings['tg_image_size_size']) : $settings['tg_image3']['url'];
            $tg_image_alt3 = get_post_meta($settings["tg_image3"]["id"], "_wp_attachment_image_alt", true);
        }

        if (!empty($settings['tg_image4']['url'])) {
            $tg_image_url4 = !empty($settings['tg_image4']['id']) ? wp_get_attachment_image_url($settings['tg_image4']['id'], $settings['tg_image_size_size']) : $settings['tg_image4']['url'];
            $tg_image_alt4 = get_post_meta($settings["tg_image4"]["id"], "_wp_attachment_image_alt", true);
        }

?>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="choose-img-wrap">
                <?php if (!empty($tg_image_url)) : ?>
                    <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>" class="main-img">
                <?php endif; ?>

                <?php if (!empty($tg_image_url2)) : ?>
                    <img data-parallax='{"x" : 60 , "y" : 0 }' src="<?php echo esc_url($tg_image_url2); ?>" alt="<?php echo esc_attr($tg_image_alt2); ?>">
                <?php endif; ?>

                <?php if (!empty($tg_image_url3)) : ?>
                    <img data-parallax='{"x" : 0 , "y" : 70 }' src="<?php echo esc_url($tg_image_url3); ?>" alt="<?php echo esc_attr($tg_image_alt3); ?>">
                <?php endif; ?>

                <?php if (!empty($tg_image_url4)) : ?>
                    <img src="<?php echo esc_url($tg_image_url4); ?>" alt="<?php echo esc_attr($tg_image_alt4); ?>" class="wow zoomIn" data-wow-delay=".2s">
                <?php endif; ?>

            </div>

        <?php elseif ($settings['tg_design_style']  == 'layout-3') : ?>

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

            <div class="about-img-wrap-three">
                <?php if (!empty($tg_image_url)) : ?>
                    <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>" class="wow fadeInRight" data-wow-delay=".2s">
                <?php endif; ?>

                <?php if (!empty($tg_image_url2)) : ?>
                    <img src="<?php echo esc_url($tg_image_url2); ?>" alt="<?php echo esc_attr($tg_image_alt2); ?>" class="wow fadeInLeft" data-wow-delay=".2s">
                <?php endif; ?>

                <?php if (!empty($settings['experience_year'] || $settings['experience_text'])) : ?>
                    <div class="experience-wrap">
                        <?php if (!empty($settings['experience_year'])) : ?>
                            <h2 class="title"><span class="odometer" data-count="<?php echo wp_kses_post($settings['experience_year']) ?>"></span>+</h2>
                        <?php endif; ?>

                        <?php if (!empty($settings['experience_text'])) : ?>
                            <p><?php echo wp_kses_post($settings['experience_text']) ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

        <?php elseif ($settings['tg_design_style']  == 'layout-4') : ?>

            <div class="choose-img-wrap-two">
                <div class="main-img">
                    <?php if (!empty($tg_image_url)) : ?>
                        <img src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                    <?php endif; ?>

                    <?php if (!empty($settings['image_video_url'])) : ?>
                        <a href="<?php echo esc_url($settings['image_video_url']) ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                    <?php endif; ?>

                </div>

                <?php if (!empty($tg_image_url2)) : ?>
                    <img data-parallax='{"x" : 60 , "y" : 0 }' src="<?php echo esc_url($tg_image_url2); ?>" alt="<?php echo esc_attr($tg_image_alt2); ?>">
                <?php endif; ?>
            </div>


        <?php else : ?>

            <div class="about-img text-end">
                <?php if (!empty($tg_image_url)) : ?>
                    <img class="wow fadeInLeft" data-wow-delay=".5s" src="<?php echo esc_url($tg_image_url); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                <?php endif; ?>

                <?php if (!empty($tg_image_url2)) : ?>
                    <img class="wow zoomIn" data-wow-delay=".2s" src="<?php echo esc_url($tg_image_url2); ?>" alt="<?php echo esc_attr($tg_image_alt2); ?>">
                <?php endif; ?>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_ImageBox());
