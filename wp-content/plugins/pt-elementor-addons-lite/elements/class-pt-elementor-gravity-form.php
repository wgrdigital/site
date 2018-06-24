<?php
/**
 * class-pt-elementor-gravity-form.php
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
class Pt_Elementor_Gravityform extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-gravityform';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'PT - Gravity Form', 'elementor' );
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
  			'pt_section_gravity_form',
  			[
  				'label' => esc_html__( 'Gravity Form', 'elementor' )
  			]
  		);

		$this->add_control(
			'pt_gravity_form',
			[
				'label' => esc_html__( 'Select gravity form', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'options' => pt_select_gravity_form(),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'pt_section_gravity_styles',
			[
				'label' => esc_html__( 'Form Container Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_gravity_background',
			[
				'label' => esc_html__( 'Form Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_gravity_alignment',
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
				'prefix_class' => 'pt-gravity-form-align-',
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_wrapper' => 'float:{{VALUE}};',	
				],
			]
		);

		$this->add_responsive_control(
  			'pt_gravity_width',
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
					'{{WRAPPER}} .pt-gravity-container' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'pt_gravity_max_width',
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
					'{{WRAPPER}} .pt-gravity-container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_responsive_control(
			'pt_gravity_margin',
			[
				'label' => esc_html__( 'Form Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_gravity_padding',
			[
				'label' => esc_html__( 'Form Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_gravity_border',
				'selector' => '{{WRAPPER}} .pt-gravity-container',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_gravity_box_shadow',
				'selector' => '{{WRAPPER}} .pt-gravity-container',
			]
		);

		$this->end_controls_section();

		/**
		 * Form Fields Styles
		 */
		$this->start_controls_section(
			'pt_section_gravity_field_styles',
			[
				'label' => esc_html__( 'Form Fields Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_gravity_input_background',
			[
				'label' => esc_html__( 'Input Field Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield textarea' => 'background-color: {{VALUE}};',
				],
			]
		);


  		$this->add_responsive_control(
  			'pt_gravity_input_width',
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
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"]' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'pt_gravity_textarea_width',
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
					'{{WRAPPER}} .pt-gravity-container .gfield textarea' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_responsive_control(
			'pt_gravity_input_padding',
			[
				'label' => esc_html__( 'Fields Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->add_control(
			'pt_gravity_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_gravity_input_border',
				'selector' => '
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea',
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_gravity_input_box_shadow',
				'selector' => '
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea',
			]
		);

		$this->add_control(
			'pt_gravity_focus_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Focus State Style', 'elementor' ),
				'separator' => 'before',
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_gravity_input_focus_box_shadow',
				'selector' => '
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="text"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield select:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield textarea:focus',
			]
		);

		$this->add_control(
			'pt_gravity_input_focus_border',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield select:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"]:focus,
					 {{WRAPPER}} .pt-gravity-container .gfield textarea:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Typography
		 */
		$this->start_controls_section(
			'pt_section_gravity_typography',
			[
				'label' => esc_html__( 'Color & Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->add_control(
			'pt_gravity_label_color',
			[
				'label' => esc_html__( 'Label Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container, {{WRAPPER}} .pt-gravity-container .nf-field-label label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_field_color',
			[
				'label' => esc_html__( 'Field Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container ::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-gravity-container ::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-gravity-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'pt_gravity_label_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Label Typography', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_gravity_label_typography',
				'selector' => '{{WRAPPER}} .pt-gravity-container, {{WRAPPER}} .pt-gravity-container .wpuf-label label',
			]
		);


		$this->add_control(
			'pt_gravity_heading_input_field',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Input Fields Typography', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_gravity_input_field_typography',
				'selector' => '{{WRAPPER}} .pt-gravity-container .gfield input[type="text"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="password"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="email"],
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="url"],
					 {{WRAPPER}} .pt-gravity-container .gfield select,
					 {{WRAPPER}} .pt-gravity-container .gfield input[type="number"],
					 {{WRAPPER}} .pt-gravity-container .gfield textarea',
			]
		);

		$this->end_controls_section();

		/**
		 * Button Style
		 */
		$this->start_controls_section(
			'pt_section_gravity_submit_button_styles',
			[
				'label' => esc_html__( 'Submit Button Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

  		$this->add_responsive_control(
  			'pt_gravity_submit_btn_width',
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
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

		$this->add_responsive_control(
			'pt_gravity_submit_btn_alignment',
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
				'prefix_class' => 'pt-gravity-form-btn-align-',
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_footer' => 'text-align:{{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_gravity_submit_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pt-gravity-container .gform_button',
			]
		);

		$this->add_responsive_control(
			'pt_gravity_submit_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_gravity_submit_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'pt_gravity_submit_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'pt_gravity_submit_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_submit_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_gravity_submit_btn_border',
				'selector' => '{{WRAPPER}} .pt-gravity-container .gform_button',
			]
		);

		$this->add_control(
			'pt_gravity_submit_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button' => 'border-radius: {{SIZE}}px;',
				],
			]
		);



		$this->end_controls_tab();

		$this->start_controls_tab( 'pt_gravity_submit_btn_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'pt_gravity_submit_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_submit_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_gravity_submit_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-gravity-container .gform_button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_gravity_submit_btn_box_shadow',
				'selector' => '{{WRAPPER}} .pt-gravity-container .gform_button',
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


	<?php if ( ! empty( $settings['pt_gravity_form'] ) ) : ?>
		<div class="pt-gravity-container">
			<?php echo do_shortcode( '[gravityform id="'.$settings['pt_gravity_form'].'" title="true" description="true"]' ); ?>
		</div>
	<?php endif; ?>

	<?php

	}

	protected function content_template() {''

		?>


		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Gravityform() );
