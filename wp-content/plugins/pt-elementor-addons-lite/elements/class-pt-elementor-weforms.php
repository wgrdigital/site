<?php
/**
 * class-pt-elementor-weforms.php
 *
 * @author    paramthemes <paramthemes@gmail.com>
 * @copyright 2017 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	/**
	 * Define our Pt Elementor Tetstimonials settings.
	 */
class Pt_Elementor_Weforms extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-weforms';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'PT - Wpforms', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		//return 'eicon-inner-section';
		return 'fa fa-address-book-o';
	}
	/**
	 * Define our get categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our _register_controls settings.
	 */
	protected function _register_controls() {
$this->start_controls_section(
  			'pt_section_wpforms',
  			[
  				'label' => esc_html__( 'Select Form', 'elementor' )
  			]
  		);
		
	
		
		$this->add_control(
			'wpforms_contact_form',
			[
				'label' => esc_html__( 'Select weForm', 'elementor' ),
				'description' => esc_html__( 'Please save and refresh the page after selecting the form', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'options' => pt_select_wpforms(),
			]
		);

		
		$this->end_controls_section();

        $this->start_controls_section(
			'pt_section_pro',
			[
				'label' => __( 'Go Premium for More Features', 'elementor' )
			]
		);

        $this->add_control(
            'pt_control_get_pro',
            [
                'label' => __( 'Unlock more possibilities', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( '', 'elementor' ),
						'icon' => 'fa fa-unlock-alt',
					],
				],
				'default' => '1',
                'description' => '<span class="pro-feature"> Get the  <a href="https://essential-addons.com/elementor/buy.php" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
            ]
        );		

        $this->end_controls_section();
		
		$this->start_controls_section(
			'pt_section_wpforms_styles',
			[
				'label' => esc_html__( 'Form Container Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'pt_wpforms_background',
			[
				'label' => esc_html__( 'Form Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'pt_wpform_alignment',
			[
				'label' => esc_html__( 'Form Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'elementor' ),
						'icon' => 'fa fa-ban',
					],
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'default',
				'prefix_class' => 'pt-contact-form-align-',
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'float: {{VALUE}};',
				],
			]
		);

  		$this->add_responsive_control(
  			'pt_wpforms_width',
  			[
  				'label' => esc_html__( 'Form Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'pt_wpforms_max_width',
  			[
  				'label' => esc_html__( 'Form Max Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
		
		
		$this->add_responsive_control(
			'pt_wpforms_margin',
			[
				'label' => esc_html__( 'Form Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->add_responsive_control(
			'pt_wpforms_padding',
			[
				'label' => esc_html__( 'Form Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'pt_wpforms_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_wpforms_border',
				'selector' => '{{WRAPPER}} .pt-wpforms-container',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_wpforms_box_shadow',
				'selector' => '{{WRAPPER}} .pt-wpforms-container',
			]
		);
		
		$this->end_controls_section();
		
		

		$this->start_controls_section(
			'pt_section_wpforms_field_styles',
			[
				'label' => esc_html__( 'Form Fields Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'pt_wpforms_input_background',
			[
				'label' => esc_html__( 'Input Field Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea' => 'background-color: {{VALUE}};',
				],
			]
		);
		

  		$this->add_responsive_control(
  			'pt_wpforms_input_width',
  			[
  				'label' => esc_html__( 'Input Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"]' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
		
  		$this->add_responsive_control(
  			'pt_wpforms_textarea_width',
  			[
  				'label' => esc_html__( 'Textarea Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field textarea' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);	
		
		$this->add_responsive_control(
			'pt_wpforms_input_padding',
			[
				'label' => esc_html__( 'Fields Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->add_control(
			'pt_wpforms_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_wpforms_input_border',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_wpforms_input_box_shadow',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpform-fields input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea',
			]
		);

		$this->add_control(
			'pt_wpforms_focus_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Focus State Style', 'elementor' ),
				'separator' => 'before',
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_wpforms_input_focus_box_shadow',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea:focus',
			]
		);

		$this->add_control(
			'pt_wpforms_input_focus_border',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"]:focus, 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		


		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'pt_section_wpforms_typography',
			[
				'label' => esc_html__( 'Color & Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		
		$this->add_control(
			'pt_wpforms_label_color',
			[
				'label' => esc_html__( 'Label Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container, {{WRAPPER}} .pt-wpforms-container .wpforms-field-label' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'pt_wpforms_field_color',
			[
				'label' => esc_html__( 'Field Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'pt_wpforms_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container ::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-wpforms-container ::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-wpforms-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'pt_wpforms_label_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Label Typography', 'elementor' ),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_wpforms_label_typography',
				'selector' => '{{WRAPPER}} .pt-wpforms-container, {{WRAPPER}} .pt-wpforms-container .wpforms-field-label',
			]
		);
		
		
		$this->add_control(
			'pt_wpforms_heading_input_field',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Input Fields Typography', 'elementor' ),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_wpforms_input_field_typography',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="text"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="password"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="email"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="url"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field input[type="number"], 
					 {{WRAPPER}} .pt-wpforms-container .wpforms-field textarea',
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'pt_section_wpforms_submit_button_styles',
			[
				'label' => esc_html__( 'Submit Button Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

  		$this->add_responsive_control(
  			'pt_wpforms_submit_btn_width',
  			[
  				'label' => esc_html__( 'Button Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
  		
		$this->add_responsive_control(
			'pt_wpform_submit_btn_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'elementor' ),
						'icon' => 'fa fa-ban',
					],
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'default',
				'prefix_class' => 'pt-contact-form-btn-align-',
				
			
		]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_wpforms_submit_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-submit',
			]
		);
		
		$this->add_responsive_control(
			'pt_wpforms_submit_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'pt_wpforms_submit_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->start_controls_tabs( 'pt_wpforms_submit_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'pt_wpforms_submit_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'color: {{VALUE}};',
				],
			]
		);
		

		
		$this->add_control(
			'pt_wpforms_submit_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_wpforms_submit_btn_border',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-submit',
			]
		);
		
		$this->add_control(
			'pt_wpforms_submit_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit' => 'border-radius: {{SIZE}}px;',
				],
			]
		);
		

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'pt_wpforms_submit_btn_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'pt_wpforms_submit_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_wpforms_submit_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_wpforms_submit_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-wpforms-container .wpforms-submit:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_wpforms_submit_btn_box_shadow',
				'selector' => '{{WRAPPER}} .pt-wpforms-container .wpforms-submit',
			]
		);
		
		
		$this->end_controls_section();
		
	}

	/**
	 * Define our Render Display settings.
	 */
	protected function render( ) {
		
      $settings = $this->get_settings();
		

	?>
	
	
	<?php if ( ! empty( $settings['wpforms_contact_form'] ) ) : ?>
		<div class="pt-wpforms-container">		
			<?php echo do_shortcode( '[wpforms id="' . $settings['wpforms_contact_form'] . '" ]' ); ?>
		</div>
	<?php endif; ?>
	
	<?php
	
	}

	protected function content_template() {''
		
		?>
		
	
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Weforms() );
