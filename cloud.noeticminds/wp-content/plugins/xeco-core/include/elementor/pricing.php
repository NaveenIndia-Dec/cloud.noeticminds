<?php

namespace GenixCore\Widgets;

use Elementor\Widget_Base;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;


if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Xolio Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Genix_Pricing extends Widget_Base
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
        return 'tg-pricing';
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
        return __('Pricing', 'genixcore');
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

        // Header
        $this->start_controls_section(
            '_section_header',
            [
                'label' => esc_html__('Header', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tg_is_active',
            [
                'label' => esc_html__('Select Pricing Type', 'genixcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'genixcore'),
                    'active' => esc_html__('Popular', 'genixcore'),
                ],
            ]
        );

        $this->add_control(
            'tg_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'genixcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__('Image', 'genixcore'),
                    'icon' => esc_html__('Icon', 'genixcore'),
                ],
                'default' => 'image',
            ]
        );

        $this->add_control(
            'tg_image_icon',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Icon', 'genixcore'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_icon_type' => 'image'
                ]
            ]
        );

        if (genix_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
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
            $this->add_control(
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

        $this->add_control(
            'main_title',
            [
                'label' => esc_html__('Package Name', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Basic Plan', 'genixcore'),
                'dynamic' => [
                    'active' => true
                ],
            ]
        );

        $this->end_controls_section();

        // Price
        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => esc_html__('Pricing', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => esc_html__('Currency', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => esc_html__('None', 'genixcore'),
                    'baht' => '&#3647; ' . _x('Baht', 'Currency Symbol', 'genixcore'),
                    'bdt' => '&#2547; ' . _x('BD Taka', 'Currency Symbol', 'genixcore'),
                    'dollar' => '&#36; ' . _x('Dollar', 'Currency Symbol', 'genixcore'),
                    'euro' => '&#128; ' . _x('Euro', 'Currency Symbol', 'genixcore'),
                    'franc' => '&#8355; ' . _x('Franc', 'Currency Symbol', 'genixcore'),
                    'guilder' => '&fnof; ' . _x('Guilder', 'Currency Symbol', 'genixcore'),
                    'krona' => 'kr ' . _x('Krona', 'Currency Symbol', 'genixcore'),
                    'lira' => '&#8356; ' . _x('Lira', 'Currency Symbol', 'genixcore'),
                    'peseta' => '&#8359 ' . _x('Peseta', 'Currency Symbol', 'genixcore'),
                    'peso' => '&#8369; ' . _x('Peso', 'Currency Symbol', 'genixcore'),
                    'pound' => '&#163; ' . _x('Pound Sterling', 'Currency Symbol', 'genixcore'),
                    'real' => 'R$ ' . _x('Real', 'Currency Symbol', 'genixcore'),
                    'ruble' => '&#8381; ' . _x('Ruble', 'Currency Symbol', 'genixcore'),
                    'rupee' => '&#8360; ' . _x('Rupee', 'Currency Symbol', 'genixcore'),
                    'indian_rupee' => '&#8377; ' . _x('Rupee (Indian)', 'Currency Symbol', 'genixcore'),
                    'shekel' => '&#8362; ' . _x('Shekel', 'Currency Symbol', 'genixcore'),
                    'won' => '&#8361; ' . _x('Won', 'Currency Symbol', 'genixcore'),
                    'yen' => '&#165; ' . _x('Yen/Yuan', 'Currency Symbol', 'genixcore'),
                    'custom' => esc_html__('Custom', 'genixcore'),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => esc_html__('Custom Symbol', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => esc_html__('Price', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => '75',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
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
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'genixcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Choose Plan', 'genixcore'),
                'title' => esc_html__('Enter button text', 'genixcore'),
                'label_block' => true,
                'condition' => [
                    'tg_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'genixcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tg_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link',
            [
                'label' => esc_html__('Button link', 'genixcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'genixcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tg_btn_link_type' => '1',
                    'tg_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'genixcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => genix_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'tg_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Pricing List
        $this->start_controls_section(
            '_section_price_list',
            [
                'label' => esc_html__('Pricing List', 'genixcore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        if (genix_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_list_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-check',
                ]
            );
        } else {
            $repeater->add_control(
                'tg_list_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'solid',
                    ],
                ]
            );
        }

        $repeater->add_control(
            'list_item',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('List Item', 'genixcore'),
                'default' => esc_html__('Mobile Phone optimized Ready', 'genixcore'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'list_items',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_item' => esc_html__('Mobile Phone optimized Ready', 'genixcore'),
                    ],
                    [
                        'list_item' => esc_html__('Powerful Website metrics', 'genixcore'),
                    ],
                    [
                        'list_item' => esc_html__('Free custom domain', 'genixcore'),
                    ],
                    [
                        'list_item' => esc_html__('Annual purchase', 'genixcore'),
                    ],
                    [
                        'list_item' => esc_html__('Hosting day', 'genixcore'),
                    ],
                ],
                'title_field' => '{{ list_item }}',
            ]
        );

        $this->end_controls_section();
    }

    private static function get_currency_symbol($symbol_name)
    {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset($symbols[$symbol_name]) ? $symbols[$symbol_name] : '';
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

        if ($settings['currency'] === 'custom') {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol($settings['currency']);
        }

        // Link
        if ('2' == $settings['tg_btn_link_type']) {
            $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
            $this->add_render_attribute('tg-button-arg', 'target', '_self');
            $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tg-button-arg', 'class', 'btn btn-three');
        } else {
            if (!empty($settings['tg_btn_link']['url'])) {
                $this->add_link_attributes('tg-button-arg', $settings['tg_btn_link']);
                $this->add_render_attribute('tg-button-arg', 'class', 'btn btn-three');
            }
        } ?>


        <div class="pricing-box <?php echo esc_attr($settings['tg_is_active']) ?>">
            <div class="pricing-top-wrap">

                <div class="pricing-plan">
                    <?php if ($settings['tg_icon_type'] !== 'image') : ?>
                        <?php if (!empty($settings['tg_icon']) || !empty($settings['tg_selected_icon']['value'])) : ?>
                            <div class="icon">
                                <?php genix_render_icon($settings, 'tg_icon', 'tg_selected_icon'); ?>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="icon">
                            <img src="<?php echo esc_url($settings['tg_image_icon']['url']) ?>" alt="<?php echo esc_attr__('Icon', 'genixcore') ?>">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['main_title'])) : ?>
                        <h4 class="title"><?php echo genix_kses($settings['main_title']); ?></h4>
                    <?php endif; ?>
                </div>

                <div class="pricing-price">
                    <h2 class="price"><?php echo esc_html($currency); ?><?php echo genix_kses($settings['price']); ?></h2>
                </div>
                <?php if (!empty($settings['tg_button_show'])) : ?>
                    <div class="pricing-btn">
                        <a <?php echo $this->get_render_attribute_string('tg-button-arg'); ?>>
                            <?php echo esc_html($settings['tg_btn_text']) ?> <span></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pricing-bottom-wrap">
                <ul class="list-wrap">
                    <?php foreach ($settings['list_items'] as $item) : ?>
                        <li>
                            <?php if (!empty($item['tg_list_icon']) || !empty($item['tg_list_selected_icon']['value'])) : ?>
                                <?php genix_render_icon($item, 'tg_list_icon', 'tg_list_selected_icon'); ?>
                            <?php endif; ?>
                            <?php echo esc_html($item['list_item']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

<?php
    }
}

$widgets_manager->register(new Genix_Pricing());
