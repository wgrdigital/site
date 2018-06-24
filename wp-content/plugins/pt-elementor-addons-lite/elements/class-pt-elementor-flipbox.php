<?php
/**
 * Class Pt Elementor FlipBox.php
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
	 * Define our Pt Elementor Flip Box settings.
	 */
class Pt_Elementor_FlipBox extends Widget_Base {

	/**
	 * Define our get name settings.
	 */
	public function get_name() {
		return 'Pt-flipbox';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'PT - Flip Box', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		return 'eicon-flip-box wks-pt-pe';
	}
	/**
	 * Define our get categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our register_controls settings.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_front_box',
			[
				'label' => __( 'Front Box', 'elementor' ),
			]
		);

				$this->add_control(
					'front_icon',
					[
						'label' => __( 'Type', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'icon' => __( 'Icon', 'elementor' ),
							'image' => __( 'Image', 'elementor' ),
						],
						'default' => 'icon',
					]
				);
		$this->add_control(
			'front_icon_design',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'front_icon' => 'icon',
				],

			]
		);
		$this->add_control(
			'front_image_design',
			[
				'label' => __( 'Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => Utils::get_placeholder_image_src(),
					], 'condition' => [
					'front_icon' => 'image',
					],

			]
		);

		$this->add_control(
			'front_icon_view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor' ),
					'framed' => __( 'Framed', 'elementor' ),
				],
				'default' => 'default',

			]
		);

		$this->add_control(
			'front_icon_shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'front_icon_view!' => 'default',
				],

			]
		);

		$this->add_control(
			'front_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'Text Title', 'elementor' ),
			]
		);

		$this->add_control(
			'front_title_html_tag',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' ),
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'front-text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'Add some nice text here.', 'elementor' ),
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'front_icon' => 'image',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_back_box',
			[
				'label' => __( 'Back Box', 'elementor' ),
			]
		);

		$this->add_control(
			'back_icon',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon' => __( 'Icon', 'elementor' ),
					'image' => __( 'Image', 'elementor' ),
				],
				'default' => 'icon',
			]
		);
		$this->add_control(
			'back_icon_design',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'back_icon' => 'icon',
				],

			]
		);
		$this->add_control(
			'back_image_design',
			[
				'label' => __( 'Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
				'url' => Utils::get_placeholder_image_src(),
					], 'condition' => [
					'back_icon' => 'image',
					],

			]
		);

		$this->add_control(
			'back_icon_view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor' ),
					'framed' => __( 'Framed', 'elementor' ),
				],
				'default' => 'default',

			]
		);

		$this->add_control(
			'back_icon_shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'back_icon_view!' => 'default',
				],

			]
		);

		$this->add_control(
			'back_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'Text Title', 'elementor' ),
			]
		);

		$this->add_control(
			'back_title_html_tag',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' ),
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'back_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'Add some nice text here.', 'elementor' ),
			]
		);
		$this->add_responsive_control(
			'back_image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'back_icon' => 'image',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section-action-button',
			[
				'label' => __( 'Action Button', 'elementor' ),
			]
		);

		$this->add_control(
			'action_text',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Click Me', 'elementor' ),
				'default' => __( 'Click Me', 'elementor' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link to', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section-general-style',
			[
				'label' => __( 'General', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'animation_style',
			[
				'label' => __( 'Animation Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'horizontal' => __( 'Horizontal', 'elementor' ),
					'horizontal-left-cube' => __( 'Horizontal Left To Right Cube', 'elementor' ),
					'horizontal-right-cube' => __( 'Horizontal Right To Left Cube', 'elementor' ),
					'vertical' => __( 'Vertical', 'elementor' ),
					'vertical-bottom-cube' => __( 'Vertical Bottom To Top Cube', 'elementor' ),
					'vertical-top-cube' => __( 'Vertical Top To Bottom Cube', 'elementor' ),
					'horizontal-left-3d' => __( 'Horizontal 3d Left To Right', 'elementor' ),
					'horizontal-3d' => __( 'Horizontal 3d Right To Left', 'elementor' ),
					'vertical-3d' => __( 'Vertical 3d Top To Bottom', 'elementor' ),
					'vertical-bottom-top-3d' => __( 'Vertical 3d Bottom To Top', 'elementor' ),
				],
				'default' => 'vertical',
				'prefix_class' => 'pt-fb-animate-',
			]
		);

		 $this->add_group_control(
			 Group_Control_Border::get_type(),
			 [
				 'name' => 'flip_box_border',
				 'label' => __( 'Box Border', 'elementor' ),
				 'selector' => '{{WRAPPER}} .pt-flip-box-inner > div',
			 ]
		 );

		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .pt-flip-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_height',
			[
				'type' => Controls_Manager::TEXT,
				'label' => __( 'Box Height', 'elementor' ),
				'placeholder' => __( '250', 'elementor' ),
				'default' => __( '250', 'elementor' ),
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-inner,
					{{WRAPPER}} .pt-flip-box-inner .pt-flip-box-front,
					{{WRAPPER}} .pt-flip-box-inner .pt-flip-box-back' => 'height: {{VALUE}}px;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section-front-box-style',
			[
				'label' => __( 'Front Box', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		 $this->add_group_control(
			 Group_Control_Background::get_type(),
			 [
				 'name' => 'front_box_background',
				 'label' => __( 'Front Box Background', 'elementor' ),
				 'types' => [ 'classic', 'gradient' ],
				 'selector' => '{{WRAPPER}} .pt-flip-box-front',
			 ]
		 );
		 $this->add_control(
			'front_box_background_overlay',
			[
				'label' => __( 'Background Overlay', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .flipbox-content' => 'background-color: {{VALUE}};',
				],
				
			]
		);


		$this->add_control(
			'front_box_title_color',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .front-icon-title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'front_title!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_box_title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .front-icon-title',
			]
		);

		$this->add_control(
			'front_box_text_color',
			[
				'label' => __( 'Description Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front p' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_box_text_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .pt-flip-box-front p',
			]
		);

		/**
		*  Front Box icons styles
		*/
		$this->add_control(
			'front_box_icon_color',
			[
				'label' => __( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'front_icon!' => '',
				],
			]
		);

		$this->add_control(
			'front_box_icon_fill_color',
			[
				'label' => __( 'Icon Fill Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#92BE43',
				'selectors' => [
					'{{WRAPPER}} .pt-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'front_icon_view' => 'stacked',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_box_icon_border',
				'label' => __( 'Box Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .pt-flip-box-front .pt-fb-icon-view-framed, {{WRAPPER}} .pt-flip-box-front .pt-fb-icon-view-stacked',
				'label_block' => true,
				'condition' => [
					'front_icon_view!' => 'default',
				],
			]
		);

		$this->add_control(
			'front_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'front_image_size',
			[
				'label' => __( 'Image Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'front_rotate',
			[
				'label' => __( 'Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper i,
					{{WRAPPER}} .pt-flip-box-front .icon-wrapper img' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'front_icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-front .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
					],
				],
				'condition' => [
					'front_icon_view!' => 'default',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section-back-box-style',
			[
				'label' => __( 'Back Box', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'back_box_background',
				'label' => __( 'Back Box Background', 'elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .pt-flip-box-back',
			]
		);
		$this->add_control(
			'back_box_background_overlay',
			[
				'label' => __( 'Background Overlay', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .flipbox-content' => 'background-color: {{VALUE}};',
				],
				
			]
		);

		$this->add_control(
			'back_box_title_color',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .back-icon-title' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_box_title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .back-icon-title',
			]
		);

		$this->add_control(
			'back_box_text_color',
			[
				'label' => __( 'Description Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back p' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_box_text_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .pt-flip-box-back p',
			]
		);

		/**
		*  Back Box icons styles
		*/
		$this->add_control(
			'back_box_icon_color',
			[
				'label' => __( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'back_icon!' => '',
				],
			]
		);

		$this->add_control(
			'back_box_icon_fill_color',
			[
				'label' => __( 'Icon Fill Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#92BE43',
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .pt-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'front_icon_view' => 'stacked',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_box_icon_border',
				'label' => __( 'Box Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .pt-flip-box-back .pt-fb-icon-view-framed, {{WRAPPER}} .pt-flip-box-back .pt-fb-icon-view-stacked',
				'label_block' => true,
				'condition' => [
					'back_icon_view!' => 'default',
				],
			]
		);

		$this->add_control(
			'back_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'back_image_size',
			[
				'label' => __( 'Image Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'back_rotate',
			[
				'label' => __( 'Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper i,
					{{WRAPPER}} .pt-flip-box-back .icon-wrapper img' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->add_control(
			'back_icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .pt-flip-box-back .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
					],
				],
				'condition' => [
					'back_icon_view!' => 'default',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section-action-button-style',
			[
				'label' => __( 'Action Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-fb-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .pt-fb-button',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'default' => '#93C64F',
				'selectors' => [
					'{{WRAPPER}} .pt-fb-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .pt-fb-button',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-fb-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-fb-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}
	/**
	 * Define our Rendor Display settings.
	 */
	protected function render() {
		$settings = $this->get_settings();
		$this->add_inline_editing_attributes( 'back_title', 'advanced' );
		$this->add_inline_editing_attributes( 'back_text', 'advanced' );
		$this->add_inline_editing_attributes( 'action_text', 'advanced' );
		$this->add_render_attribute( 'front-icon-wrapper', 'class', 'icon-wrapper' );
		$this->add_render_attribute( 'front-icon-wrapper', 'class', 'pt-fb-icon-view-' . $settings['front_icon_view'] );
		$this->add_render_attribute( 'front-icon-wrapper', 'class', 'pt-fb-icon-shape-' . $settings['front_icon_shape'] );
		$this->add_render_attribute( 'front-icon-title', 'class', 'front-icon-title elementor-inline-editing' );
		$this->add_render_attribute( 'front-icon', 'class', $settings['front_icon_design'] );

		$this->add_render_attribute( 'back-icon-wrapper', 'class', 'icon-wrapper' );
		$this->add_render_attribute( 'back-icon-wrapper', 'class', 'pt-fb-icon-view-' . $settings['back_icon_view'] );
		$this->add_render_attribute( 'back-icon-wrapper', 'class', 'pt-fb-icon-shape-' . $settings['back_icon_shape'] );
		$this->add_render_attribute( 'back-icon-title', 'class', 'back-icon-title elementor-inline-editing' );
		$this->add_render_attribute( 'back-icon', 'class', $settings['back_icon_design'] );

		$this->add_render_attribute( 'button', 'class', 'pt-fb-button' );
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
					  $this->add_render_attribute( 'button', 'target', '_blank' );
			}
		}

			?>
		   <div class="pt-flip-box-wrapper">
			<div class="pt-flip-box-inner">

				<div class="pt-flip-box-front">
					<div class="flipbox-content">
						<?php if ( 'icon' === $settings['front_icon'] && ! empty( $settings['front_icon'] ) ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'front-icon-wrapper' ); ?>>
								<i <?php echo $this->get_render_attribute_string( 'front-icon' ); ?>></i>
							</div>
						<?php } ?>
			<?php if ( 'image' === $settings['front_icon'] && ! empty( $settings['front_icon'] ) ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'front-icon-wrapper' ); ?>>
							<img src='<?php echo $settings['front_image_design']['url']; ?>'>
							</div>
			<?php } ?>

						<?php if ( ! empty( $settings['front_title'] ) ) { ?>
							<<?php echo esc_html( $settings['front_title_html_tag'] ); ?> <?php echo $this->get_render_attribute_string( 'front-icon-title' ); ?> >
								<?php echo esc_html( $settings['front_title'] ); ?>
							</<?php echo esc_html( $settings['front_title_html_tag'] ); ?>>
						<?php } ?>

						<?php if ( ! empty( $settings['front-text'] ) ) { ?>
							<p>
								<?php echo $settings['front-text']; ?>
							</p>
						<?php } ?>
					</div>
				</div>

				<div class="pt-flip-box-back">
					<div class="flipbox-content">
						<?php if ( 'icon' === $settings['back_icon'] && ! empty( $settings['back_icon'] ) ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'back-icon-wrapper' ); ?>>
								<i <?php echo $this->get_render_attribute_string( 'back-icon' ); ?>></i>
							</div>
						<?php } ?>
						<?php if ( 'image' === $settings['back_icon'] && ! empty( $settings['back_icon'] ) ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'back-icon-wrapper' ); ?>>
							<img src='<?php echo $settings['back_image_design']['url']; ?>'>
							</div>
						<?php } ?>
						<?php if ( ! empty( $settings['back_title'] ) ) { ?>
							<<?php echo esc_html( $settings['back_title_html_tag'] ); ?> <?php echo $this->get_render_attribute_string( 'back-icon-title' ); ?>>
								<?php echo  $settings['back_title']; ?>
							</<?php echo esc_html( $settings['back_title_html_tag'] ); ?>>
						<?php } ?>

						<?php if ( ! empty( $settings['back_text'] ) ) { ?>
							<span class="elementor-inline-editing">
								<?php echo $settings['back_text']; ?>
							</span>
						<?php } ?>

						<?php if ( ! empty( $settings['action_text'] ) ) { ?>
							<div class="pt-fb-button-wrapper">
								<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
									  <span class="elementor-button-text elementor-inline-editing"><?php echo $settings['action_text']; ?></span>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		   </div>
			<?php
	}
	/**
	 * Define our Content template settings.
	 */
	protected function content_template() {
		?>
		<#

		box_html = '';

		print( separator_html );
		#>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_FlipBox() );
