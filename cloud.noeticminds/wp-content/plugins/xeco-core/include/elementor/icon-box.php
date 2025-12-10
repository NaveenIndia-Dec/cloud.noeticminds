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
class TG_IconBox extends Widget_Base
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
        return 'tg-iconbox';
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
        return __('Icon Box', 'genixcore');
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

        // Style_group
        $this->start_controls_section(
            'tg_iconbox_group',
            [
                'label' => esc_html__('IconBox Group', 'genixcore'),
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
            'tg_title',
            [
                'label' => esc_html__('Title', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mobile Payment Make Easy', 'genixcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'genixcore'),
                'description' => genix_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Add new trending and rare artwork to your collection.', 'genixcore'),
            ]
        );

        $repeater->add_control(
            'tg_url',
            [
                'label' => esc_html__('Item URL', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#!', 'genixcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'item_lists',
            [
                'label' => esc_html__('Item Box Lists', 'genixcore'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_title' => esc_html__('Mobile Payment Make Easy', 'genixcore'),
                    ],
                    [
                        'tg_title' => esc_html__('Lifetime Free Transaction', 'genixcore'),
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
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['tg_design_style']  == 'layout-2') : ?>

            <div class="row justify-content-center">
                <?php foreach ($settings['item_lists'] as $item) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="features-item-two">
                            <?php if (!empty($item['tg_image_icon']['url'])) : ?>
                                <div class="features-img-two">
                                    <img src="<?php echo esc_url($item['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                </div>
                            <?php endif; ?>
                            <div class="features-content-two">
                                <h2 class="title">
                                    <?php if (!empty($item['tg_url'])) : ?>
                                        <a href="<?php echo esc_url($item['tg_url']) ?>">
                                            <?php echo genix_kses($item['tg_title']); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo genix_kses($item['tg_title']); ?>
                                    <?php endif; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else : ?>

            <div class="row justify-content-center">
                <?php foreach ($settings['item_lists'] as $item) :

                    $w_100 = $item['tg_image_icon']['url'] ? '' : 'w-100';

                ?>
                    <div class="col-lg-6">
                        <div class="features-item">
                            <div class="features-content <?php echo esc_attr($w_100); ?>">
                                <h2 class="title">
                                    <?php if (!empty($item['tg_url'])) : ?>
                                        <a href="<?php echo esc_url($item['tg_url']) ?>">
                                            <?php echo genix_kses($item['tg_title']); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo genix_kses($item['tg_title']); ?>
                                    <?php endif; ?>
                                </h2>
                                <?php if (!empty($item['tg_description'])) : ?>
                                    <p><?php echo genix_kses($item['tg_description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($item['tg_image_icon']['url'])) : ?>
                                <div class="features-img">
                                    <img src="<?php echo esc_url($item['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TG_IconBox());
