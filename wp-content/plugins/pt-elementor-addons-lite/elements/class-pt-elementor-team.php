<?php
/**
 * Class Pt-elementor-team.php
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
 * Define our Pt Elementor Team settings.
 */
class Pt_Elementor_Team extends Widget_Base {

	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-team';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'PT - Team', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-person';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our get_button_sizes settings.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'elementor' ),
			'sm' => __( 'Small', 'elementor' ),
			'md' => __( 'Medium', 'elementor' ),
			'lg' => __( 'Large', 'elementor' ),
			'xl' => __( 'Extra Large', 'elementor' ),
		];
	}
	/**
	 * Define our _register_controls settings.
	 */
	protected function _register_controls() {
		/**
		 * Team Member Image.
		 */
		$this->start_controls_section(
			'section_team_mamber_image',
			[
				'label' => esc_html__( 'Team Member Image', 'elementor' ),
			]
		);
		$this->add_control(
			'pt_team_layout_type',
			[
				'label' => __( 'Layout Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'layout1' => __( 'Layout 1', 'elementor' ),
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'label' => __( 'Image Size', 'elementor' ),
				'default' => 'large',
			]
		);
		$this->add_control(
			'link_to',
			[
				'label' => __( 'Link to', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'None', 'elementor' ),
					'file' => __( 'Media File', 'elementor' ),
					'custom' => __( 'Custom URL', 'elementor' ),
				],
			]
		);
		$this->add_control(
			'pt_image_link',
			[
				'label' => __( 'Link to', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'elementor' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);
		$this->end_controls_section();
		/**
		 * Team Member Content.
		 */
		$this->start_controls_section(
			'section_team_mamber_content',
			[
				'label' => esc_html__( 'Team Member content', 'elementor' ),
			]
		);
		/**
		 * Team Title.
		 */
		$this->add_control(
			'pt_team_title',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'John Doe', 'elementor' ),
				'placeholder' => __( 'Type your title text here', 'elementor' ),
			]
		);
		$this->add_control(
			'header_size',
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
					'div' => __( 'div', 'elementor' ),
					'span' => __( 'span', 'elementor' ),
					'p' => __( 'p', 'elementor' ),
				],
				'default' => 'h2',
			]
		);
		$this->add_control(
			'team_designation_title',
			[
				'label'       => __( 'Designation', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Computer Systems Manager', 'elementor' ),
				'placeholder' => __( 'Type your Designation text here', 'elementor' ),
			]
		);
		$this->add_control(
			'pt_description',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'I am text block. Click edit button to change this text. ', 'elementor' ),
			]
		);
		$this->end_controls_section();
		/**
		 * Button.
		 */
		$this->start_controls_section(
			'section_team_mamber_button',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
			]
		);
		$this->add_control(
			'button_type',
			[
				'label' => __( 'Button Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'info' => __( 'Info', 'elementor' ),
					'success' => __( 'Success', 'elementor' ),
					'warning' => __( 'Warning', 'elementor' ),
					'danger' => __( 'Danger', 'elementor' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);
		$this->add_control(
			'button_txt',
			[
				'label'       => __( 'Button Text', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'elementor' ),
				'placeholder' => __( 'Type your Button text here', 'elementor' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => __( 'Button Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		$this->end_controls_section();
		/**
		 * Social Icons.
		 */
		$this->start_controls_section(
			'section_team_mamber_social_icons',
			[
				'label' => esc_html__( 'Social Icons', 'elementor' ),
			]
		);
		$this->add_control(
			'social_icon_list',
			[
				'label' => __( 'Social Icons', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'social' => 'fa fa-facebook',
					],
					[
						'social' => 'fa fa-twitter',
					],
					[
						'social' => 'fa fa-google-plus',
					],
				],
				'fields' => [
					[
						'name' => 'social',
						'label' => __( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-wordpress',
						'include' => [
							'fa fa-apple',
							'fa fa-behance',
							'fa fa-bitbucket',
							'fa fa-codepen',
							'fa fa-delicious',
							'fa fa-digg',
							'fa fa-dribbble',
							'fa fa-envelope',
							'fa fa-facebook',
							'fa fa-flickr',
							'fa fa-foursquare',
							'fa fa-github',
							'fa fa-google-plus',
							'fa fa-houzz',
							'fa fa-instagram',
							'fa fa-jsfiddle',
							'fa fa-linkedin',
							'fa fa-medium',
							'fa fa-pinterest',
							'fa fa-product-hunt',
							'fa fa-reddit',
							'fa fa-shopping-cart',
							'fa fa-slideshare',
							'fa fa-snapchat',
							'fa fa-soundcloud',
							'fa fa-spotify',
							'fa fa-stack-overflow',
							'fa fa-tripadvisor',
							'fa fa-tumblr',
							'fa fa-twitch',
							'fa fa-twitter',
							'fa fa-vimeo',
							'fa fa-vk',
							'fa fa-whatsapp',
							'fa fa-wordpress',
							'fa fa-xing',
							'fa fa-yelp',
							'fa fa-youtube',
						],
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'elementor' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'default' => [
							'is_external' => 'true',
						],
						'placeholder' => __( 'http://your-link.com', 'elementor' ),
					],
				],
				'title_field' => '<i class="{{ social }}"></i> {{{ social.replace( \'fa fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);
		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		$this->end_controls_section();
		/**
		 * Team Member Content Styles.
		 */
		$this->start_controls_section(
			'section_bground_color',
			[
				'label' => __( 'Team Member Content Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_background' );
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pt-title.pt-title-text-align .team-title-color' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'designation_title_color',
			[
				'label' => __( 'Designation Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .designation.designation-text-align .designation_title_color' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'team_section_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-section'  => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'pt_team_title_align',
			[
				'label' => __( 'Set Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .pt-team-section.to-center' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/**
		 * Image Style Section.
		 */
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'space',
			[
				'label' => __( 'Size (%)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-team-section .pt-team-member-photo-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'opacity',
			[
				'label' => __( 'Opacity (%)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-team-section .pt-team-member-photo-wrapper img' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'label' => __( 'Image Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-team-section .pt-team-member-photo-wrapper img',
			]
		);
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-team-section .pt-team-member-photo-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .pt-team-section .pt-team-member-photo-wrapper img',
			]
		);
		$this->end_controls_section();
		/**
		 * Button Style Section.
		 */
		$this->start_controls_section(
			'button_section_style',
			[
				'label' => __( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button',
			]
		);
		$this->add_control(
			'btn_hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
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
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);
		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'button_size',
			[
				'label' => __( 'Button Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' => __( 'Button Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control(
			'button_icon_align',
			[
				'label' => __( 'Button Icon PositionPosition', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'button_icon!' => '',
				],
			]
		);
		$this->add_control(
			'button_icon_indent',
			[
				'label' => __( 'Button Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'button_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);
		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		/**
		 * Social Style.
		 */
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => __( 'Social Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Official Color', 'elementor' ),
					'custom' => __( 'Custom', 'elementor' ),
				],
			]
		);
		$this->add_control(
			'icon_shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'circle',
				'options' => [
					'rounded' => __( 'Rounded', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
					'circle' => __( 'Circle', 'elementor' ),
				],
				'prefix_class' => 'elementor-shape-',
			]
		);
		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_secondary_color',
			[
				'label' => __( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
				],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
			]
		);
		$icon_spacing = is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};';

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-social-icon:not(:last-child)' => $icon_spacing,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .elementor-social-icon',
			]
		);
		$this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'social_icon_hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Define our Content Display inline settings.
	 */
	protected function add_inline_editing_attributes( $key, $toolbar = 'basic' ) {
		if ( ! Plugin::$instance->editor->is_edit_mode() ) {
			return;
		}
		$this->add_render_attribute( $key, [
			'class' => 'elementor-inline-editing',
			'data-elementor-setting-key' => $key,
		] );
		if ( 'basic' !== $toolbar ) {
			$this->add_render_attribute( $key, [
				'data-elementor-inline-editing-toolbar' => $toolbar,
			] );
		}
	}

	/**
	 * Define our Content Display settings.
	 */
	protected function render() {
		$settings = $this->get_settings();
		$this->add_inline_editing_attributes( 'pt_description', 'advanced' );
		$this->add_inline_editing_attributes( 'pt_team_title', 'advanced' );
		$this->add_inline_editing_attributes( 'team_designation_title', 'advanced' );
		$pt_team_layout_type = ! empty( $settings['pt_team_layout_type'] ) ? $settings['pt_team_layout_type'] : 'layout1';
		$pt_team_title = ! empty( $settings['pt_team_title'] ) ? $settings['pt_team_title'] : '';
		$pt_description = ! empty( $settings['pt_description'] ) ? $settings['pt_description'] : '';
		$background_image = ! empty( $settings['background_image']['url'] ) ? $settings['background_image']['url'] : '';
		$button_text = ! empty( $settings['button_txt'] ) ? $settings['button_txt'] : '';
		/**
		 * Title : H1-h6 and Size.
		 */
		$title = $settings['pt_team_title'];
		$this->add_render_attribute( 'heading', 'class', 'team-title-color team-title-size-' . $settings['pt_team_title'] );
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		/**
		 * Button.
		 */
		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-button_link' );

			if ( $settings['button_link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
			if ( $settings['button_link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}
		$this->add_render_attribute( 'button', 'class', 'elementor-button' );
		if ( ! empty( $settings['button_size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['button_size'] );
		}
		/**
		 * Image hover animatoin effect.
		 */
		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
		/**
		 * Button hover animatoin effect.
		 */
		if ( $settings['btn_hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['btn_hover_animation'] );
		}
		/**
		 * Social Icons.
		 */
		$class_animation = '';
		if ( ! empty( $settings['social_icon_hover_animation'] ) ) {
			$class_animation = ' elementor-animation-' . $settings['social_icon_hover_animation'];
		}
		?>
		<div class="pt-team-section pt-team-<?php echo esc_html( $pt_team_layout_type ); ?> to-center">
			<?php
			if ( 'default' === $pt_team_layout_type ) {
			?>
				<div class="pt-title pt-title-text-align elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_team_title' ); ?>  data-elementor-setting-key="pt_team_title" data-elementor-inline-editing-toolbar="advanced"><?php echo $title_html; ?></div>
				<div class="designation designation-text-align info elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'team_designation_title' ); ?>  data-elementor-setting-key="team_designation_title" data-elementor-inline-editing-toolbar="advanced"><h5 class="designation_title_color"><?php echo $settings['team_designation_title']; ?></h5></div>
			<?php
			}
			?>
			<div class="pt-team-member-photo pt-team-member-photo-align">
				<?php
				if ( empty( $settings['image']['url'] ) ) {
					return;
				}
				$link = $this->get_link_url( $settings );
				if ( $link ) {
					$this->add_render_attribute( 'link', 'href', $link['url'] );

					if ( ! empty( $link['is_external'] ) ) {
						$this->add_render_attribute( 'link', 'target', '_blank' );
					}

					if ( ! empty( $link['nofollow'] ) ) {
						$this->add_render_attribute( 'link', 'rel', 'nofollow' );
					}
				}
				?>
				<div class="pt-team-member-photo-wrapper" <?php echo esc_html( $this->get_render_attribute_string( 'wrapper' ) ); ?>>
					<?php
					if ( $has_caption ) :
					?>
						<figure class="wp-caption">
					<?php
					endif;
					if ( $link ) :
					?>
						<a <?php echo esc_html( $this->get_render_attribute_string( 'link' ) ); ?>>
					<?php
					endif;
					echo Group_Control_Image_Size::get_attachment_image_html( $settings );
					if ( $link ) :
					?>
						</a>
					<?php
					endif;
					if ( $has_caption ) :
					?>
						</figure>
					<?php endif; ?>
				</div>
			</div>
			<?php
			if ( 'layout1' === $pt_team_layout_type ) {
				?>
				<div class="pt-title pt-title-text-align elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_team_title' ); ?>  data-elementor-setting-key="pt_team_title" data-elementor-inline-editing-toolbar="advanced"><?php echo $title_html; ?></div>
				<div class="designation designation-text-align info elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'team_designation_title' ); ?>  data-elementor-setting-key="team_designation_title" data-elementor-inline-editing-toolbar="advanced"><h5 class="designation_title_color"><?php echo $settings['team_designation_title']; ?></h5></div>
				<?php
			}
			?>
			<div class="pt-description elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_description' ); ?>  data-elementor-setting-key="pt_description" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_description']; ?></div>
			<?php
			if ( '' !== $button_text ) {
			?>
			<div class="pt-button pt-button-align" <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
					<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
						<?php $this->render_text(); ?>
					</a>
			</div>
			<?php
			}
			?>
			<div class="elementor-social-icons-wrapper">
				<?php
				foreach ( $settings['social_icon_list'] as $index => $item ) {
					$social = str_replace( 'fa fa-', '', $item['social'] );

					$link_key = 'link_' . $index;

					$this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

					if ( $item['link']['is_external'] ) {
						$this->add_render_attribute( $link_key, 'target', '_blank' );
					}

					if ( $item['link']['nofollow'] ) {
						$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
					}
					?>
					<a class="elementor-icon elementor-social-icon elementor-social-icon-<?php echo esc_html( $social . $class_animation ); ?>" <?php echo $this->get_render_attribute_string( $link_key ); ?>>
						<i class="<?php echo esc_html( $item['social'] ); ?>"></i>
					</a>
				<?php } ?>
			</div>
		</div>
		<?php
	}
	/**
	 * Define Render Text settings.
	 *
	 * @param string $instance string.
	 */
	private function get_link_url( $instance ) {
		if ( 'none' === $instance['link_to'] ) {
			return false;
		}
		if ( 'custom' === $instance['link_to'] ) {
			if ( empty( $instance['pt_image_link']['url'] ) ) {
				return false;
			}
			return $instance['pt_image_link'];
		}
		return [
			'url' => $instance['image']['url'],
		];
	}
	/**
	 * Define Render Text settings.
	 */
	protected function render_text() {
		
		$settings = $this->get_settings();
		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['button_icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-button-icon' );
		?>
		<span <?php echo esc_html( $this->get_render_attribute_string( 'content-wrapper' ) ); ?>>
			<?php if ( ! empty( $settings['button_icon'] ) ) : ?>
			<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
				<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
			</span>
			<?php endif; ?>
			<span class="elementor-button-text"><?php echo esc_html( $settings['button_txt'] ); ?></span>
		</span>
		<?php
	}
	
}
/*=============Call this every widget ====================*/
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Team() );
