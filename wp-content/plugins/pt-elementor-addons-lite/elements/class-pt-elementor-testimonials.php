<?php
/**
 * Class Pt Elementor Testimonials.php
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
class Pt_Elementor_Testimonials extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-testimonial';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'PT - Testimonial', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
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
			  'pt_section_testimonial_image',
			  [
				  'label' => esc_html__( 'Testimonial', 'elementor' ),
			  ]
		  );
		$this->add_control(
			'pt_testimonial_image',
			[
				'label' => __( 'Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'pt_testimonial_name',
			[
				'label' => esc_html__( 'Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'elementor' ),
				'description' => __( 'The client or customer name for the testimonial', 'elementor' ),
			]
		);

		$this->add_control(
			'pt_testimonial_company_title',
			[
				'label' => esc_html__( 'Designation', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Param Themes', 'elementor' ),
				'description' => __( 'The details of the client/customer like Designation name, position held, company URL etc. HTML accepted.', 'elementor' ),
			]
		);

		$this->add_control(
			'pt_testimonial_description',
			[
				'label' => '',
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Testimonial Description That Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'elementor' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_section_testimonial_styles_general',
			[
				'label' => esc_html__( 'Styles', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pt_testimonial_background',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_testimonial_content_background',
			[
				'label' => esc_html__( 'Content Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-content' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pt-testimonial-content .pp-arrow-left' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .pt-testimonial-content .pp-arrow-right' => 'border-left-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_testimonial_alignment',
			[
				'label' => esc_html__( 'Set Alignment', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pt-align-centered',
				'options' => [
					'none' => __( 'None', 'elementor' ),
					'pt-align-left' => __( 'Left', 'elementor' ),
					'pt-align-centered' => __( 'Center', 'elementor' ),
					'pt-align-right' => __( 'Right', 'elementor' ),
					'pt-align-centered style01' => __( 'Center Image with Background', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'pt_testimonial_user_display_block',
			[
				'label' => esc_html__( 'Display Name & Designation Block?', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'pt_testimonial_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_testimonial_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-testimonial-item',
			]
		);

		$this->add_control(
			'pt_testimonial_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_section_testimonial_image_styles',
			[
				'label' => esc_html__( 'Image Style', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'pt_testimonial_image_width',
			[
				'label' => esc_html__( 'Image Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-image img' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'pt_testimonial_image_height',
			[
				'label' => esc_html__( 'Image Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-image img' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_testimonial_image_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_testimonial_image_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_testimonial_image_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-testimonial-image img',
			]
		);

		$this->add_control(
			'pt_testimonial_image_rounded',
			[
				'label' => __( 'Rounded Image?', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'testimonial-avatar-rounded',
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'testimonial-avatar-rounded',
			]
		);

		$this->add_control(
			'pt_testimonial_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'pt_testimonial_image_rounded' => 'testimonial-avatar-not-rounded',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_section_testimonial_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pt_testimonial_name_heading',
			[
				'label' => __( 'Name', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_testimonial_name_color',
			[
				'label' => esc_html__( 'Name Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#03a9f4',
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-content .pt-testimonial-user' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .pt-testimonial-content .pt-testimonial-user',
			]
		);

		$this->add_control(
			'pt_testimonial_company_heading',
			[
				'label' => __( 'Designation', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'pt_testimonial_company_color',
			[
				'label' => esc_html__( 'Designation Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-content .pt-testimonial-user-company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_testimonial_position_typography',
				'selector' => '{{WRAPPER}} .pt-testimonial-content .pt-testimonial-user-company',
			]
		);

		$this->add_control(
			'pt_testimonial_description_heading',
			[
				'label' => __( 'Testimonial Text', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_testimonial_description_color',
			[
				'label' => esc_html__( 'Testimonial Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-content .pt-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .pt-testimonial-content .pt-testimonial-text',
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
	 * Define our Render Display settings.
	 */
	protected function render() {
		$settings = $this->get_settings();
		$this->add_inline_editing_attributes( 'pt_testimonial_description', 'advanced' );
		$this->add_inline_editing_attributes( 'pt_testimonial_name', 'advanced' );
		$this->add_inline_editing_attributes( 'pt_testimonial_company_title', 'advanced' );

		$testimonial_image = $this->get_settings( 'pt_testimonial_image' );
		if ( '' === $testimonial_image['id'] ) {
			$testimonial_image_url = $settings['pt_testimonial_image']['url'];
		} else {
			 $testimonial_image_url = Group_Control_Image_Size::get_attachment_image_src( $testimonial_image['id'], 'thumbnail', $settings );
		}
		$testimonial_classes = $this->get_settings( 'pt_testimonial_image_rounded' ) . ' ' . $this->get_settings( 'pt_testimonial_alignment' );
		$align = $this->get_settings( 'pt_testimonial_alignment' );
		?>
			<div id="pt-testimonial-<?php echo esc_attr( $this->get_id() ); ?>" class="pt-testimonial-item clearfix <?php echo esc_attr( $testimonial_classes ); ?>">

				<div class="pt-testimonial-image">
					<figure>
						<img src="<?php echo esc_url( $testimonial_image_url ); ?>" alt="<?php echo esc_attr( $settings['pt_testimonial_name'] ); ?>" class="elementor-animation-<?php echo esc_attr( $settings['hover_animation'] ); ?>">
					</figure>
				</div>

				<div class="pt-testimonial-content">
					<?php if ( 'pt-align-left' === $align ) : ?>
					<div class="pp-arrow-left"></div>
					<?php endif; ?>
					<?php if ( 'pt-align-right' === $align ) : ?>
					<div class="pp-arrow-right"></div>
					<?php endif; ?>
					<div class="pt-testimonial-text elementor-inline-editing" data-elementor-setting-key="pt_testimonial_description" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_testimonial_description']; ?></div>
					
					<?php if ( 'yes' === $settings['pt_testimonial_user_display_block'] ) : ?>
					<h3 class="pt-testimonial-user elementor-inline-editing" data-elementor-setting-key="pt_testimonial_name" data-elementor-inline-editing-toolbar="advanced"><?php echo ( $settings['pt_testimonial_name'] ); ?></h3>
					<h2 class="pt-testimonial-user-company elementor-inline-editing" data-elementor-setting-key="pt_testimonial_company_title" data-elementor-inline-editing-toolbar="advanced"><?php echo wp_kses_post( $settings['pt_testimonial_company_title'] ); ?></h2>
					<?php endif; ?>
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

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Testimonials() );
