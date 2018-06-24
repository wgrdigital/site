<?php
/**
 * Class Pt-elementor-info_box.php
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
 * Define our Pt Elementor Info Box settings.
 */
class Pt_Elementor_Info_Box extends Widget_Base {
	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-infobox';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'PT - Info Box', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our _register_controls settings.
	 */
	protected function _register_controls() {
		/**
		 * Info Box Title and Description Section.
		 */
		$this->start_controls_section(
			'section_my_custom',
			[
				'label' => esc_html__( 'Info Box Content', 'elementor' ),
			]
		);
		$this->add_control(
			'pt_title',
			[
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Info Box', 'elementor' ),
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
			'pt_title_link',
			[
				'label' => __( 'Title Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '',
				],
			]
		);
		$this->add_control(
			'pt_description',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'I am text block. Click edit button to change this text.', 'elementor' ),
			]
		);
		$this->add_responsive_control(
			'pt_title_align',
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
					'{{WRAPPER}} .pt-info-box-section' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		/**
		 * Image and Icon Section.
		 */
		$this->start_controls_section(
			'pt_section_Image_Icon',
			[
				'label' => __( 'Image or Icon', 'elementor' ),
			]
		);
		$this->add_control(
			'pt_layout_type',
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
			'pt_upload_type',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'image' => __( 'Image', 'elementor' ),
					'icon' => __( 'Icon', 'elementor' ),
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
				'condition' => [
					'pt_upload_type' => 'image',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Actually its `image_size`.
				'label' => __( 'Image Size', 'elementor' ),
				'default' => 'thumbnail',
				'condition' => [
					'pt_upload_type' => 'image',
				],
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
				'condition' => [
					'pt_upload_type' => 'image',
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
					'pt_upload_type' => 'image',
				],
				'show_label' => false,
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-star',
				'condition' => [
					'pt_upload_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'condition' => [
					'pt_upload_type' => 'icon',
				],
			]
		);
		$this->end_controls_section();		
		/**
		 * Info Box Title & Content Style Section.
		 */
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Info Box Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
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
					'{{WRAPPER}} .pt-title .title-color' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pt-title .title-color',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .pt-description' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pt-description',
			]
		);
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
					'{{WRAPPER}} .pt-info-box-section .elementor-icon-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .pt-info-box-section .elementor-icon-wrapper img' => 'opacity: {{SIZE}};',
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
				'selector' => '{{WRAPPER}} .pt-info-box-section .elementor-icon-wrapper img',
			]
		);
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-info-box-section .elementor-icon-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .pt-info-box-section .elementor-icon-wrapper img',
			]
		);
		$this->end_controls_section();
		/**
		 * ICon Style Section.
		 */
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor' ),
					'framed' => __( 'Framed', 'elementor' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
				'condition' => [
					'pt_upload_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
				'condition' => [
					'pt_upload_type' => 'icon',
				],
			]
		);
		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);
		$this->add_control(
			'secondary_color',
			[
				'label' => __( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
			]
		);
		$this->add_control(
			'rotate',
			[
				'label' => __( 'Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
		$this->end_controls_section();
		/**
		 * ICon Hover Section.
		 */
		$this->start_controls_section(
			'section_hover',
			[
				'label' => __( 'Icon Hover', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hover_primary_color',
			[
				'label' => __( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_secondary_color',
			[
				'label' => __( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hover_animation',
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
		$this->add_inline_editing_attributes( 'pt_title', 'advanced' );
		$pt_layout_type = ! empty( $settings['pt_layout_type'] ) ? $settings['pt_layout_type'] : 'layout1';
		$pt_title = ! empty( $settings['pt_title'] ) ? $settings['pt_title'] : '';
		$pt_description = ! empty( $settings['pt_description'] ) ? $settings['pt_description'] : '';
		$pt_upload_type = ! empty( $settings['pt_upload_type'] ) ? $settings['pt_upload_type'] : 'image';
		/**
		 * Title: h1 to h6.
		 */
		$title = $settings['pt_title'];
		if ( ! empty( $settings['pt_title_link']['url'] ) ) {
			$this->add_render_attribute( 'url', 'href', $settings['pt_title_link']['url'] );

			if ( $settings['pt_title_link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}
			if ( ! empty( $settings['pt_title_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}
			$title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $title );
		}
		$title_html = sprintf( '<%1$s %2$s class="title-color">%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		/**
		 * Icon Start.
		 */
		$this->add_render_attribute( 'wrapper', 'class', 'elementor-icon-wrapper' );
		$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-icon' );
		/**
		 * Image hover animatoin effect.
		 */
		if ( ! empty( $settings['hover_animation'] ) ) {
			$this->add_render_attribute( 'image', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
		/**
		 * ICON hover animatoin effect.
		 */
		if ( ! empty( $settings['icon_hover_animation'] ) ) {
			$this->add_render_attribute( 'icon', 'class', 'elementor-animation-' . $settings['icon_hover_animation'] );
		}
		$icon_tag = 'div';
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'icon-wrapper', 'href', $settings['link']['url'] );
			$icon_tag = 'a';

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'icon-wrapper', 'target', '_blank' );
			}
			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'icon-wrapper', 'rel', 'nofollow' );
			}
		}
		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
		}
		?>
			<div class="pt-info-box-section pt-info-box-<?php echo $pt_layout_type; ?> to-center">
				<?php
				if ( 'layout1' === $pt_layout_type ) {
				?>
				
					<div class="pt-title elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_title' ); ?>  data-elementor-setting-key="pt_title" data-elementor-inline-editing-toolbar="advanced"><?php echo $title_html; ?></div>
					
				<?php
				}
				?>
				<div class="pt-info-box pt-info-box-image-icon-align">
						<?php
						if ( 'image' === $pt_upload_type ) {
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
							<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
								<?php
								if ( $has_caption ) :
								?>
									<figure class="wp-caption">
								<?php
								endif;
								if ( $link ) :
								?>
										<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
								<?php
								endif;
								echo Group_Control_Image_Size::get_attachment_image_html( $settings );
								if ( $link ) :
								?>
										</a>
								<?php endif;
								if ( $has_caption ) :
								?>
									</figure>
								<?php endif; ?>
							</div>
						<?php } else { ?>
							<div class="pt-info-box-icon-align" <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
								<<?php echo $icon_tag . ' ' . $this->get_render_attribute_string( 'icon-wrapper' ); ?>>
									<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>
								</<?php echo $icon_tag; ?>>
							</div>
						<?php } ?>
				</div>
				<?php
				if ( 'default' === $pt_layout_type ) {
				?>
					<div class="pt-title elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_title' ); ?>  data-elementor-setting-key="pt_title" data-elementor-inline-editing-toolbar="advanced"><?php echo $title_html; ?></div>
				<?php
				}
				?>
				<div class="pt-description elementor-inline-editing"<?php echo $this->get_render_attribute_string( 'pt_description' ); ?>  data-elementor-setting-key="pt_description" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_description']; ?></div>
			</div>
		<?php
	}
	/**
	 * Define our get_link_url settings.
	 *
	 * @param int $instance string.
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
	
}
/*=============Call this every widget ====================*/
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Info_Box() );
