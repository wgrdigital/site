<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor WidgetKit Image Box
 *
 * Elementor widget for WidgetKit image box
 *
 * @since 1.0.0
 */
class wkfe_image_feature extends Widget_Base {

	public function get_name() {
		return 'widgetkit-for-elementor-image-feature';
	}

	public function get_title() {
		return esc_html__( 'Feature Image/Icon Box', 'widgetkit-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'widgetkit_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'widgetkit-for-elementor-image-feature' ];
	}

	protected function _register_controls() {

		// Content options Start
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Feature Content', 'widgetkit-for-elementor' ),
			]
		);


		$this->add_control(
			'choose_media',
				[
					'label'     => esc_html__( 'Choose Media', 'widgetkit-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'image',
					'options'   => [
						'image'		=> esc_html__('Image', 'widgetkit-for-elementor'),
						'icon'      => esc_html__( 'Icon', 'widgetkit-for-elementor' ),
					],
				]
		);


		$this->add_control(
	       'feature_image',
		        [
		          'label' => esc_html__( 'Upload Feature Image', 'widgetkit-for-elementor' ),
		          'type'  => Controls_Manager::MEDIA,
		          'default' => [
						'url' => plugins_url('/widgetkit-for-elementor/assets/images/icon-demo.png'),
					],
		          'condition' => [
						'choose_media' => 'image',
					],

		        ]
	    );


		$this->add_control(
			'feature_icon',
			[
				'label' => esc_html__( 'Feature Icon', 'widgetkit-for-elementor' ),
				'type'  => Controls_Manager::ICON,
				'default'    => 'fa fa-clock-o',
				 'condition' => [
						'choose_media' => 'icon',
					],
			]
		);
		   
			$this->add_control(
			    'feature_title',
			      	[
			          'label' => esc_html__( 'Feature Title', 'widgetkit-for-elementor' ),
			          'type'  => Controls_Manager::TEXTAREA,
			          'default' => esc_html__( 'Web Development', 'widgetkit-for-elementor' ),
			    	]
		    );

		    

			
			$this->add_control(
			    'feature_content',
			      	[
			          'label' => esc_html__( 'Feature Description', 'widgetkit-for-elementor' ),
			          'type'  => Controls_Manager::TEXTAREA,
			          'default' => esc_html__( 'Magnetized strongly enough pre vending domain overeus all initial results to estimate the in the big bang contradicted.', 'widgetkit-for-elementor' ),
			      	]
			);


		$this->end_controls_section();

		$this->start_controls_section(
			'item_layout',
			[
				'label' => esc_html__( 'Feature Layout', 'widgetkit-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_control(
			'title_position',
				[
					'label'     => esc_html__( 'Title Position', 'widgetkit-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'bottom',
					'options'   => [
						'top'		=> esc_html__('Top', 'widgetkit-for-elementor'),
						'bottom'    => esc_html__( 'Bottom', 'widgetkit-for-elementor' ),
					],
				]
		);

		$this->add_control(
			'hover_effect',
				[
					'label'     => esc_html__( 'Hover Effect', 'widgetkit-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'angle',
					'options'   => [
						'round'	=> esc_html__('Round','widgetkit-for-elementor'),
						'angle' => esc_html__( 'Angle', 'widgetkit-for-elementor' ),
					],
				]
		);

		$this->add_control(
            'border_radius',
       			[
					'label'    => esc_html__( 'Border Radius', 'widgetkit-for-elementor' ),
					'type'     => Controls_Manager::SLIDER,
					'default'  => [
						'size' => 100,
					],
					'range'  => [
						'%'  => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .block .hover-round' => 'border-radius: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tgx-image-feature .block .hover-round:after' => 'border-radius: {{SIZE}}{{UNIT}};',
					],

					'condition' => [
						'hover_effect' => 'round',
					],
				]
        );


        $this->add_responsive_control(
			'round_icon_padding',
				[
					'label'  => esc_html__( 'Icon Padding', 'widgetkit-for-elementor' ),
					'type'   => Controls_Manager::SLIDER,
					'default' => [
						'size' =>100,
					],
					'range'  => [
						'px' => [
							'min' => 10,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .block .hover-round' => 
							'width: {{SIZE}}{{UNIT}}; 
							height: {{SIZE}}{{UNIT}};
							line-height: {{SIZE}}{{UNIT}};',


						'{{WRAPPER}} .tgx-image-feature .hover-round .feature-icon' => 'line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'hover_effect' => 'round',
					],
				]
		);

		$this->add_responsive_control(
			'round_icon_font_size',
				[
					'label'  => esc_html__( 'Icon Font Size', 'widgetkit-for-elementor' ),
					'type'   => Controls_Manager::SLIDER,
					'default' => [
						'size' =>62,
					],
					'range'  => [
						'px' => [
							'min' => 10,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .hover-round .feature-icon' => 
							'font-size: {{SIZE}}{{UNIT}};'
					],
					'condition' => [
						'choose_media' => 'icon',
					],
				]
		);


		$this->add_responsive_control(
			'angle_icon_padding',
				[
					'label'  => esc_html__( 'Icon Padding', 'widgetkit-for-elementor' ),
					'type'   => Controls_Manager::SLIDER,
					'default'  => [
						'size' =>100,
					],
					'range'  => [
						'px' => [
							'min' => 10,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .hover-angle' => 
							'width: {{SIZE}}{{UNIT}}; 
							height: {{SIZE}}{{UNIT}};
							line-height: {{SIZE}}{{UNIT}};',


						'{{WRAPPER}} .tgx-image-feature .hover-angle .feature-icon' => 'line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'hover_effect' => 'angle',
					],
				]
		);



		$this->add_responsive_control(
			'angle_icon_font_size',
				[
					'label'    => esc_html__( 'Icon/Image Size', 'widgetkit-for-elementor' ),
					'type'     => Controls_Manager::SLIDER,
					'default'  => [
						'size' =>62,
					],
					'range'  => [
						'px' => [
							'min' => 10,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .hover-angle .tgx-media' => 
							'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tgx-image-feature .hover-round img' => 
							'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tgx-image-feature .hover-angle .feature-icon' => 
							'font-size: {{SIZE}}{{UNIT}};'
					],
				]
		);

		$this->add_control(
            'icon_margin',
            [
                'label' => esc_html__( 'Icon/Image Margin', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'default'  => [
					'size' => 20,
				],
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tgx-image-feature .hover-angle' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}};',
                    '{{WRAPPER}} .tgx-image-feature .hover-round' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_style',
            [
                'label' => esc_html__( 'Items', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__( 'Item Padding', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::DIMENSIONS,
                'default'  => [
					'size' => 20,
				],
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tgx-image-feature .block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


		$this->add_control(
			'item_align',
				[
					'label'     => esc_html__( 'Item Alignment', 'widgetkit-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'center',
					'options'   => [
						'left'      => esc_html__( 'Left', 'widgetkit-for-elementor' ),
						'center'    => esc_html__( 'Center', 'widgetkit-for-elementor' ),
						'right'     => esc_html__( 'Right', 'widgetkit-for-elementor' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .block' => 'text-align: {{VALUE}};',
					],
				]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'    => 'item_box_shadow',
                'label'   => esc_html__( 'Hover Box Shadow', 'widgetkit-for-elementor' ),
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector'=> '{{WRAPPER}} .tgx-image-feature:hover .block',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Feature Style', 'widgetkit-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'icon_style',
            [
                'label' => esc_html__( 'Icon Options', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->add_control(
			'item_bg_color',
			[
				'label'     => esc_html__( 'Item Background Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f5f5f5',
				'selectors' => [
					'{{WRAPPER}} .tgx-image-feature .block' => 'background-color: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'     => esc_html__( 'Icon Background Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}}  .tgx-image-feature .block .hover-round' => 'background-color: {{VALUE}};',


				],
			]
		);

		$this->add_control(
			'hover_border_color',
			[
				'label'     => esc_html__( 'Border Hover Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#056ddc',
				'selectors' => [
					'{{WRAPPER}} .tgx-image-feature .block .hover-round:after' => 'border: 1px solid {{VALUE}};',
					'{{WRAPPER}} .tgx-image-feature .block:hover .hover-angle' => 
					'border: 1px solid {{VALUE}};
					color:{{VALUE}};',

				],
			]
		);



        $this->add_control(
            'title_style',
            [
                'label' => esc_html__( 'Title Options', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#555',
				'selectors' => [
					'{{WRAPPER}} .tgx-image-feature .feature-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_spacing',
				[
				'label'  => esc_html__( 'Title Specing', 'widgetkit-for-elementor' ),
 				'type'   => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tgx-image-feature .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
		);



		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => esc_html__( 'Title Typography', 'widgetkit-for-elementor' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					'selector' => '{{WRAPPER}} .tgx-image-feature .feature-title',
				]
		);


        $this->add_control(
            'desc_style',
            [
                'label' => esc_html__( 'Description Options', 'widgetkit-for-elementor' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->add_responsive_control(
			'desc_space',
			[
				'label' => esc_html__( 'Description Spacing', 'widgetkit-for-elementor' ),
			 	'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tgx-image-feature .feature-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'desc_typography',
					'label'    => esc_html__( 'Desc Typography', 'widgetkit-for-elementor' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					'selector' => '{{WRAPPER}} .tgx-image-feature .feature-desc',
				]
		);


		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8c8c8c',
				'selectors' => [
					'{{WRAPPER}} .tgx-image-feature .feature-desc'  => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		require WKFE_PATH . '/elements/image-feature/template/view.php';
	}


}
