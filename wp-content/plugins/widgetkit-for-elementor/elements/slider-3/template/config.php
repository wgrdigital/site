<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * WidgetKit Slider 3
 *
 * Elementor widget WidgetKit slider 3
 *
 * @since 1.0.0
 */
class wkfe_slider_3 extends Widget_Base
{

    public function get_name()
    {
        return 'widgetkit-for-elementor_slider_3 ';
    }

    public function get_title()
    {
        return __('Slider Box Animation', 'widgetkit-for-elementor');
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
    }

    public function get_categories()
    {
        return ['widgetkit_elementor'];
    }

    /**
     * A list of scripts that the widgets is depended in
     *
     * @since 1.3.0
     **/
    public function get_script_depends() {
        return ['imagesloaded', 'anime', 'slider-3'];
    }

    protected function _register_controls(){
        /* slides content title subtitle button and button link */
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Sliders', 'widgetkit-for-elementor'),
            ]
        );
            $repeater = new Repeater();
            $repeater->add_control(
                'tgx_slider_3_image',
                [
                    'label' => esc_html__( 'Slider Image', 'widgetkit-for-elementor' ),
                    'type'  => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => plugins_url('/widgetkit-for-elementor/assets/images/demo-bg.jpg'),
                    ],
                ]
            );
            $repeater->add_control(
                'tgx_slider_3_title',
                [
                    'label'       => esc_html__( 'Title', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__( 'We care your websites.', 'widgetkit-for-elementor' ),
                ]
            );
            $repeater->add_control(
                'tgx_slider_3_subtitle',
                [
                    'label'       => esc_html__( 'Subtitle', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__( 'With elements pro you able to create different types of pages on your website.', 'widgetkit-for-elementor' ),
                ]
            );
            $repeater->add_control(
                'tgx_slider_3_button_text',
                [
                    'label'       => esc_html__( 'Button Text', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__( 'Explore It', 'widgetkit-for-elementor' ),
                ]
            );
            $repeater->add_control(
                'tgx_slider_3_button_link',
                [
                    'label' => esc_html__( 'Button Link', 'widgetkit-for-elementor' ),
                    'type'  => Controls_Manager::URL,
                    'placeholder' => 'https://themesgrove.com',
                    'default' => [
                        'url' => 'https://themesgrove.com',
                    ],
                ]
            );


            $this->add_control(
                'tgx_slider_3_sliders',
                [
                    'label'      => esc_html__( 'Sliders', 'widgetkit-for-elementor' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields'     => array_values( $repeater->get_controls() ),
                    'show_label' => true,


                    'default'     => [
                        [
                            'tgx_slider_3_title'    => esc_html__( 'Creative', 'widgetkit-for-elementor' ),
                            'tgx_slider_3_subtitle' => 'Create different types of pages on your website.',
                            'tgx_slider_3_image'       => '',
                            'tgx_slider_3_button_text' => 'Explore It',
                            'tgx_slider_3_button_link' => 'https://www.themesgrove.com',
             
                        ],
                        [
                            'tgx_slider_3_title'    => esc_html__( 'Visually', 'widgetkit-for-elementor' ),
                            'tgx_slider_3_subtitle' => 'Different types of pages on your website.',
                            'tgx_slider_3_image'     => '',
                            'tgx_slider_3_button_text' => 'Get Started',
                            'tgx_slider_3_button_link' => 'https://www.themesgrove.com',
             
                        ]
                  ],
                    'title_field' => '{{{tgx_slider_3_title}}}',

                ]
            );
        $this->end_controls_section();


       $this->start_controls_section(
            'section_nav',
            [
                'label' => esc_html__('Navs', 'widgetkit-for-elementor'),
            ]
        );



    $this->start_controls_tabs( 'nav_control' );
        $this->start_controls_tab(
            'previous_options',
                  [
                    'label' => esc_html__( 'Previous', 'widgetkit-for-elementor' ),
                  ]
        );
            $this->add_control(
                'tgx_slider_3_nav_previous',
                [
                    'label'       => esc_html__( 'Text', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__( 'Previous', 'widgetkit-for-elementor' ),
                ]
            );
       
            $this->end_controls_tab();

            $this->start_controls_tab(
                'next_options',
                  [
                    'label' => esc_html__( 'Next', 'widgetkit-for-elementor' ),
                  ]
            );

            $this->add_control(
                'tgx_slider_3_nav_next',
                [
                    'label'       => esc_html__( 'Text', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__( 'Next', 'widgetkit-for-elementor' ),
                ]
            );


        $this->end_controls_tab();
    $this->end_controls_tabs();

        $this->add_control(
                'tgx_slider_3_nav_divider',
                [
                    'label'       => esc_html__( 'Divider', 'widgetkit-for-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__( '/', 'widgetkit-for-elementor' ),
                ]
            );
    $this->end_controls_section();


        /* style and typography and overlay color option */
        $this->start_controls_section(
            'slide_typography',
            [
                'label' => esc_html__( 'Title', 'widgetkit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Color', 'widgetkit-for-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3 .slide__title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label'    => esc_html__( 'Title Typography', 'widgetkit-for-elementor' ),
                    'name'     => 'slide_title_typography',
                    'selector' => '{{WRAPPER}} .tgx-slider-3  .slide__title',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                ]
            );
        $this->end_controls_section();




        $this->start_controls_section(
            'description_typography',
            [
                'label' => esc_html__( 'Subtitle', 'widgetkit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'description_color',
                [
                    'label'     => esc_html__( 'Color', 'widgetkit-for-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3  .slide__desc' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label'    => esc_html__( 'Description Typography', 'widgetkit-for-elementor' ),
                    'name'     => 'slide_description_typography',
                    'selector' => '{{WRAPPER}} .tgx-slider-3  .slide__desc',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                ]
            );

            $this->add_responsive_control(
            'tgx_slider_3_description_spacing',
                [
                    'label'   => esc_html__( 'Speacing', 'widgetkit-for-elementor' ),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 25,
                    ],
                    'range'  => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3  .slide__desc' => 'margin: {{SIZE}}{{UNIT}} 0;',
                    ],
                ]
            );
        $this->end_controls_section();




        $this->start_controls_section(
            'tgx_slider_3_button_section',
            [
                'label' => esc_html__( 'Button', 'widgetkit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'  => 'border',
                'label' => esc_html__( 'Border', 'widgetkit-for-elementor' ),
                'placeholder' => '1px',
                'default'   => '1px',
                'selector'  => '{{WRAPPER}} .tgx-slider-3 .slide__link',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'tgx_slider_3_button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tgx-slider-3 .slide__link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tgx_slider_3_button_text_padding',
            [
                'label' => esc_html__( 'Text Padding', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tgx-slider-3 .slide__link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

         $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label'     => esc_html__( 'Typography', 'widgetkit-for-elementor' ),
                    'name'      => 'tgx_slider_3_button_typography',
                    'selector'  => '{{WRAPPER}} .tgx-slider-3 .slide__link',
                    'scheme'    => Scheme_Typography::TYPOGRAPHY_3,
                ]
            );

        $this->add_responsive_control(
            'tgx_slider_3_button_spacing',
                [
                    'label'  => esc_html__( 'Button Specing', 'widgetkit-for-elementor' ),
                    'type'   => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 10,
                    ],
                    'range'  => [
                        'px' => [
                            'min' => 10,
                            'max' => 50,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3 .slide__link' => 'margin: {{SIZE}}{{UNIT}} 0;',
                    ],
                ]
            );

    $this->start_controls_tabs( 'tgx_slider_3_tabs_button_style' );

    $this->start_controls_tab(
        'tgx_slider_3_button_normal',
          [
            'label' => esc_html__( 'Normal', 'widgetkit-for-elementor' ),
          ]
    );

    $this->add_control(
        'tgx_slider_3_button_text_color',
          [
            'label' => esc_html__( 'Text Color', 'widgetkit-for-elementor' ),
            'type'  => Controls_Manager::COLOR,
            'default'   => '#fff',
            'selectors' => [
              '{{WRAPPER}} .tgx-slider-3 .slide__link' => 'color: {{VALUE}};',
            ],
          ]
    );

    $this->add_control(
        'tgx_slider_3_button_background_color',
            [
                'label' => esc_html__( 'Background Color', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#ed485f',
                'selectors' => [
                  '{{WRAPPER}} .tgx-slider-3 .slide__link' => 'background-color: {{VALUE}};',
                ],
            ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'tgx_slider_3_tab_button_hover',
            [
                'label' => esc_html__( 'Hover', 'widgetkit-for-elementor' ),
            ]
    );

    $this->add_control(
        'tgx_slider_3_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => ' #ed485f',
                'selectors' => [
                  '{{WRAPPER}} .tgx-slider-3 .slide__link:hover' => 'color: {{VALUE}};',
                ],
            ]
    );

    $this->add_control(
        'tgx_slider_3_button_background_hover_color',
            [
                'label' => esc_html__( 'Background Color', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => ' #fff',
                'selectors' => [
                  '{{WRAPPER}} .tgx-slider-3 .slide__link:hover' => 'background-color: {{VALUE}};',
                ],
            ]
    );

    $this->add_control(
        'tgx_slider_3_button_hover_border_color',
            [
                'label' => esc_html__( 'Border Color', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => ' #fff',
                'selectors' => [
                  '{{WRAPPER}} .tgx-slider-3 .slide__link:hover' => 'border-color: {{VALUE}};',
                ],
            ]
    );

    $this->end_controls_tab();


    $this->end_controls_tabs();
$this->end_controls_section();

        $this->start_controls_section(
            'tgx_slider_3_nav_section_style',
            [
                'label' => esc_html__( 'Navs', 'widgetkit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'tgx_slider_3_nav_color',
                    [
                        'label' => esc_html__( 'Color', 'widgetkit-for-elementor' ),
                        'type'  => Controls_Manager::COLOR,
                        'default'   => ' #ed485f',
                        'selectors' => [
                          '{{WRAPPER}} .tgx-slider-3 .slidenav__item,
                          {{WRAPPER}} .tgx-slider-3 .divider' => 'color: {{VALUE}};',
                        ],
                    ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'label'    => esc_html__( 'Typography', 'widgetkit-for-elementor' ),
                    'name'     => 'tgx_slider_3_nav_typography',
                    'selector' => '{{WRAPPER}} .tgx-slider-3 .slidenav__item, {{WRAPPER}} .tgx-slider-3 .divider',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                ]
            );

            $this->add_control(
                'tgx_slider_3_nav_hover_color',
                    [
                        'label' => esc_html__( 'Hover Color', 'widgetkit-for-elementor' ),
                        'type'  => Controls_Manager::COLOR,
                        'default'   => '#fff',
                        'selectors' => [
                          '{{WRAPPER}} .tgx-slider-3 .slidenav__item:hover' => 'color: {{VALUE}};',
                        ],
                    ]
            );

            $this->add_responsive_control(
            'tgx_slider_3_nav_spacing',
                [
                    'label'  => esc_html__( 'Speacing', 'widgetkit-for-elementor' ),
                    'type'   => Controls_Manager::SLIDER,
                    'default' => [
                        'size' =>0,
                    ],
                    'range'  => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3 .slidenav' => 'margin: {{SIZE}}{{UNIT}} auto;',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'image_overlay_section',
            [
                'label' => esc_html__( 'Overlay', 'widgetkit-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

             $this->add_responsive_control(
                'slider_3_height',
                    [
                        'label'  => esc_html__( 'Slider Height', 'widgetkit-for-elementor' ),
                        'type'   => Controls_Manager::SLIDER,
                        'range'  => [
                            'px' => [
                                'min' => 10,
                                'max' => 1000,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tgx-slider-3 .slideshow' => 'height: {{SIZE}}{{UNIT}} !important;',
                        ],
                    ]
            );
            $this->add_control(
                'overlay_color',
                [
                    'label'     => esc_html__( 'Color', 'widgetkit-for-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => 'rgba(0, 0, 0, 0.56)',
                    'selectors' => [
                        '{{WRAPPER}} .tgx-slider-3 .slide__img:before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
        $this->end_controls_section();


    }

    protected function render(){
        require WKFE_PATH . '/elements/slider-3/template/view.php';
    }


    protected function _content_template()
    {

    }
}
