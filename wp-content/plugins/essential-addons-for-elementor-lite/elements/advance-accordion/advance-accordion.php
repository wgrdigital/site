<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Eael_Adv_Accordion extends Widget_Base {

	public function get_name() {
		return 'eael-adv-accordion';
	}

	public function get_title() {
		return esc_html__( 'EA Advanced Accordion', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

   public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {
		/**
  		 * Advance Accordion Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_adv-accordion_settings',
  			[
  				'label' => esc_html__( 'General Settings', 'essential-addons-elementor' )
  			]
  		);
  		$this->add_control(
		  'eael_adv_accordion_type',
		  	[
		   	'label'       	=> esc_html__( 'Accordion Type', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'accordion',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'accordion' 	=> esc_html__( 'Accordion', 'essential-addons-elementor' ),
		     		'toggle' 		=> esc_html__( 'Toggle', 'essential-addons-elementor' ),
		     	],
		  	]
		);
		$this->add_control(
			'eael_adv_accordion_icon_show',
			[
				'label' => esc_html__( 'Enable Toggle Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_adv_accordion_icon',
			[
				'label' => esc_html__( 'Toggle Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-right',
				'include' => [
					'fa fa-angle-right',
					'fa fa-angle-double-right',
					'fa fa-chevron-right',
					'fa fa-chevron-circle-right',
					'fa fa-arrow-right',
					'fa fa-long-arrow-right',
				],
				'condition' => [
					'eael_adv_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'eael_adv_accordion_toggle_speed',
			[
				'label' => esc_html__( 'Toggle Speed (ms)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => false,
				'default' => 300,
			]
		);
  		$this->end_controls_section();
  		/**
  		 * Advance Accordion Content Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_adv_accordion_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'essential-addons-elementor' )
  			]
  		);
  		$this->add_control(
			'eael_adv_accordion_tab',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'eael_adv_accordion_tab_title' => esc_html__( 'Accordion Tab Title 1', 'essential-addons-elementor' ) ],
					[ 'eael_adv_accordion_tab_title' => esc_html__( 'Accordion Tab Title 2', 'essential-addons-elementor' ) ],
					[ 'eael_adv_accordion_tab_title' => esc_html__( 'Accordion Tab Title 3', 'essential-addons-elementor' ) ],
				],
				'fields' => [
					[
						'name' => 'eael_adv_accordion_tab_default_active',
						'label' => esc_html__( 'Active as Default', 'essential-addons-elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'no',
						'return_value' => 'yes',
					],
					[
						'name' => 'eael_adv_accordion_tab_icon_show',
						'label' => esc_html__( 'Enable Tab Icon', 'essential-addons-elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
						'return_value' => 'yes',
					],
					[
						'name' => 'eael_adv_accordion_tab_title_icon',
						'label' => esc_html__( 'Icon', 'essential-addons-elementor' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-plus',
						'condition' => [
							'eael_adv_accordion_tab_icon_show' => 'yes'
						]
					],
					[
						'name' => 'eael_adv_accordion_tab_title',
						'label' => esc_html__( 'Tab Title', 'essential-addons-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Tab Title', 'essential-addons-elementor' ),
						'dynamic' => [ 'active' => true ]
					],
		            [
		                'name'					=> 'eael_adv_accordion_text_type',
		                'label'                 => __( 'Content Type', 'essential-addons-elementor' ),
		                'type'                  => Controls_Manager::SELECT,
		                'options'               => [
		                    'content'       => __( 'Content', 'essential-addons-elementor' ),
		                    'template'      => __( 'Saved Templates', 'essential-addons-elementor' ),
		                ],
		                'default'               => 'content',
		            ],
		            [
		                'name'					=> 'eael_primary_templates',
		                'label'                 => __( 'Choose Template', 'essential-addons-elementor' ),
		                'type'                  => Controls_Manager::SELECT,
		                'options'               => eael_get_page_templates(),
						'condition'             => [
							'eael_adv_accordion_text_type'      => 'template',
						],
		            ],
				  	[
						'name' => 'eael_adv_accordion_tab_content',
						'label' => esc_html__( 'Tab Content', 'essential-addons-elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'essential-addons-elementor' ),
						'dynamic' => [ 'active' => true ],
						'condition'             => [
							'eael_adv_accordion_text_type'      => 'content',
						],
					],
				],
				'title_field' => '{{eael_adv_accordion_tab_title}}',
			]
		);
  		$this->end_controls_section();
  		/**
  		 * Go Premium For More Features
  		 */
  		$this->start_controls_section(
			'eael_section_pro',
			[
				'label' => __( 'Go Premium for More Features', 'essential-addons-elementor' )
			]
		);
        $this->add_control(
            'eael_control_get_pro',
            [
                'label' => __( 'Unlock more possibilities', 'essential-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( '', 'essential-addons-elementor' ),
						'icon' => 'fa fa-unlock-alt',
					],
				],
				'default' => '1',
                'description' => '<span class="pro-feature"> Get the  <a href="https://essential-addons.com/elementor/buy.php" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
            ]
        );
        $this->end_controls_section();
  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Generel Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_adv_accordion_style_settings',
			[
				'label' => esc_html__( 'General Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_adv_accordion_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-adv-accordion',
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_adv_accordion_box_shadow',
				'selector' => '{{WRAPPER}} .eael-adv-accordion',
			]
		);
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_adv_accordions_tab_style_settings',
			[
				'label' => esc_html__( 'Tab Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'eael_adv_accordion_tab_title_typography',
				'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header',
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_tab_icon_size',
			[
				'label' => __( 'Icon Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_tab_icon_gap',
			[
				'label' => __( 'Icon Gap', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'margin-right: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_tab_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_tab_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->start_controls_tabs( 'eael_adv_accordion_header_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'eael_adv_accordion_header_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );
				$this->add_control(
					'eael_adv_accordion_tab_color',
					[
						'label' => esc_html__( 'Tab Background Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#f1f1f1',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_text_color',
					[
						'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'eael_adv_tabs_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'eael_adv_accordion_tab_border',
						'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
						'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header',
					]
				);
				$this->add_responsive_control(
					'eael_adv_accordion_tab_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Hover State Tab
			$this->start_controls_tab( 'eael_adv_accordion_header_hover', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );
				$this->add_control(
					'eael_adv_accordion_tab_color_hover',
					[
						'label' => esc_html__( 'Tab Background Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#414141',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_text_color_hover',
					[
						'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'eael_adv_accordion_toggle_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'eael_adv_accordion_tab_border_hover',
						'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
						'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover',
					]
				);
				$this->add_responsive_control(
					'eael_adv_accordion_tab_border_radius_hover',
					[
						'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Active State Tab
			$this->start_controls_tab( 'eael_adv_accordion_header_active', [ 'label' => esc_html__( 'Active', 'essential-addons-elementor' ) ] );
				$this->add_control(
					'eael_adv_accordion_tab_color_active',
					[
						'label' => esc_html__( 'Tab Background Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#444',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_text_color_active',
					[
						'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_adv_accordion_tab_icon_color_active',
					[
						'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'eael_adv_accordion_toggle_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'eael_adv_accordion_tab_border_active',
						'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
						'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active',
					]
				);
				$this->add_responsive_control(
					'eael_adv_accordion_tab_border_radius_active',
					[
						'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
		$this->end_controls_tabs();
  		$this->end_controls_section();
  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_adv_accordion_tab_content_style_settings',
			[
				'label' => esc_html__( 'Content Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'adv_accordion_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'adv_accordion_content_text_color',
			[
				'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'eael_adv_accordion_content_typography',
				'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_content_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_adv_accordion_content_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_adv_accordion_content_border',
				'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_adv_accordion_content_shadow',
				'selector' => '{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-content',
				'separator' => 'before'
			]
		);
  		$this->end_controls_section();

  		/**
  		 * Advance Accordion Caret Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_adv_accordion_caret_settings',
  			[
  				'label' => esc_html__( 'Toggle Caret Style', 'essential-addons-elementor' ),
  				'tab' => Controls_Manager::TAB_STYLE,
  			]
  		);

		$this->add_responsive_control(
			'eael_adv_accordion_tab_toggle_icon_size',
			[
				'label' => __( 'Icon Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'eael_adv_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'eael_adv_tabs_tab_toggle_color',
			[
				'label' => esc_html__( 'Caret Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header .fa-toggle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'eael_adv_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'eael_adv_tabs_tab_toggle_active_color',
			[
				'label' => esc_html__( 'Caret Color (Active)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list .eael-accordion-header.active .fa-toggle' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-adv-accordion .eael-accordion-list:hover .eael-accordion-header .fa-toggle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'eael_adv_accordion_icon_show' => 'yes'
				]
			]
		);
  		$this->end_controls_section();
	}

	protected function render() {

   		$settings = $this->get_settings_for_display();
	?>
	<div class="eael-adv-accordion" id="eael-adv-accordion-<?php echo esc_attr( $this->get_id() ); ?>">
		<?php foreach( $settings['eael_adv_accordion_tab'] as $tab ) : ?>
		<div class="eael-accordion-list">
			<div class="eael-accordion-header<?php if( $tab['eael_adv_accordion_tab_default_active'] == 'yes' ) : echo ' active-default'; endif; ?>">
				<span><?php if( $tab['eael_adv_accordion_tab_icon_show'] === 'yes' ) : ?><i class="<?php echo esc_attr( $tab['eael_adv_accordion_tab_title_icon'] ); ?> fa-accordion-icon"></i><?php endif; ?>  <?php echo $tab['eael_adv_accordion_tab_title']; ?></span> <?php if( $settings['eael_adv_accordion_icon_show'] === 'yes' ) : ?><i class="<?php echo esc_attr( $settings['eael_adv_accordion_icon'] ); ?> fa-toggle"></i> <?php endif; ?>
			</div>
			<div class="eael-accordion-content clearfix<?php if( $tab['eael_adv_accordion_tab_default_active'] == 'yes' ) : echo ' active-default'; endif; ?>">
				<?php if( 'content' == $tab['eael_adv_accordion_text_type'] ) : ?>
					<p><?php echo do_shortcode($tab['eael_adv_accordion_tab_content']); ?></p>
				<?php elseif( 'template' == $tab['eael_adv_accordion_text_type'] ) :
					if ( !empty( $tab['eael_primary_templates'] ) ) {
						$eael_template_id = $tab['eael_primary_templates'];
						$eael_frontend = new Frontend;
						echo $eael_frontend->get_builder_content( $eael_template_id, true );
					}
				endif; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<script>
		jQuery(document).ready(function($) {
			var $eaelAdvAccordion = $('#eael-adv-accordion-<?php echo esc_attr( $this->get_id() ); ?>');
			var $eaelAccordionList = $eaelAdvAccordion.find('.eael-accordion-list');
			var $eaelAccordionListHeader = $eaelAdvAccordion.find('.eael-accordion-list .eael-accordion-header');
			var $eaelAccordioncontent = $eaelAdvAccordion.find('.eael-accordion-content');
			$eaelAccordionList.each(function(i) {
				if( $(this).find('.eael-accordion-header').hasClass('active-default') ) {
					$(this).find('.eael-accordion-header').addClass('active');
					$(this).find('.eael-accordion-content').addClass('active').css('display', 'block').slideDown(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>);
				}
			});
			<?php if( 'accordion' == $settings['eael_adv_accordion_type'] ) : ?>
			$eaelAccordionListHeader.on('click', function() {
				// Check if 'active' class is already exists
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.eael-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>);
				}else {
					$eaelAccordionListHeader.removeClass('active');
					$eaelAccordionListHeader.next('.eael-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>);

					$(this).toggleClass('active');
					$(this).next('.eael-accordion-content').slideToggle(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>, function() {
						$(this).toggleClass('active');
					});
				}
			});
			<?php endif; ?>
			<?php if( 'toggle' == $settings['eael_adv_accordion_type'] ) : ?>
			$eaelAccordionListHeader.on('click', function() {
				// Check if 'active' class is already exists
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.eael-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>);
				}else {
					$(this).toggleClass('active');
					$(this).next('.eael-accordion-content').slideToggle(<?php echo esc_attr( $settings['eael_adv_accordion_toggle_speed'] ); ?>, function() {
						$(this).toggleClass('active');
					});
				}
			});
			<?php endif; ?>
		});
	</script>
	<?php
	}

	protected function content_template() {}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Adv_Accordion() );