<?php
/**
 * Class Pt-interactive-banner.php
 *
 * @author    paramthemes <paramthemes@gmail.com>
 * @copyright 2017 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

	/**
	 * Define our Pt Elementor Interactive Banner settings.
	 */
class Pt_Elementor_Interactive_Banner extends Widget_Base {

	/**
	 * Define our get name settings.
	 */
	public function get_name() {

		return 'pt-interactive_banner';

	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {

		return __( 'PT - Interactive banner', 'elementor' );

	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {

		return 'eicon-gallery-grid wks-pt-pe';

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
			'section_general',
			[
				'label' => __( 'General', 'elementor' ),
			]
		);
		$this->add_control(
			'banner_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'Text Title', 'elementor' ),
			]
		);
		$this->add_control(
			'title_position',
			[
				'label' => __( 'Title Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title' => 'text-align: {{VALUE}};',
				],
				'toggle' => false,
			]
		);
		$this->add_control(
			'banner_title_icon',
			[
				'label' => __( 'Title Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => '',
			]
		);

		$this->add_control(
			'banner_title_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);
		$this->add_control(
			'banner_bd_title_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title' => 'background: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'banner_title_typography',
				'selector' => '{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_banner_image',
			[
				'label' => __( 'Image', 'elementor' ),
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
				'default' => 'medium',
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
			'link',
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
		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Banner Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style01',
				'options' => [
					'style01' => __( 'Appear From Bottom', 'elementor' ),
					'style02' => __( 'Appear From Top', 'elementor' ),
					'style03' => __( 'Appear From Left', 'elementor' ),
					'style04' => __( 'Appear From Right', 'elementor' ),
					'style05' => __( 'Zoom In', 'elementor' ),
					'style06' => __( 'Zoom Out', 'elementor' ),
					'style07' => __( 'Jump From Left', 'elementor' ),
					'style08' => __( 'Jump From Right', 'elementor' ),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);
		$this->add_control(
			'content_description',
			[
				'label' => __( 'Description', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);

		$this->add_responsive_control(
			'description_text_align',
			[
				'label' => __( 'Alignment', 'elementor' ),
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
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .mask .pt-description' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'description_hover_section',
			[
				'label' => __( 'Hover Icon', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'description_hover_icon',
			[
				'label' => __( 'Description Hover Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'hover_title_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title:hover' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .banner_title:hover',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'hover_description_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .pt-description' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .pt-description p',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->add_control(
			'hover_description_link_color',
			[
				'label' => __( 'Description Link Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-interactive_banner-wrapper .pt-interactive-banner-box .pt-description a' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
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
	 * Define our Content Render settings.
	 */
	protected function render() {
		$this->add_inline_editing_attributes( 'banner_title', 'advanced' );
		$this->add_inline_editing_attributes( 'content_description', 'advanced' );
		
		$settings = $this->get_settings();
		$pt_heading_icon  = ! empty( $settings['banner_title_icon'] ) ? $settings['banner_title_icon'] : '';
		$pt_hover_desc_icon  = ! empty( $settings['description_hover_icon'] ) ? $settings['description_hover_icon'] : '';
		?>
		<div class="pt-interactive_banner-wrapper">
			<div class="pt-interactive-banner-box banner-<?php echo esc_html( $settings['hover_animation'] ); ?>">
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
		if ( $link ) :
		?>
				<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
		<?php
		endif;
				echo Group_Control_Image_Size::get_attachment_image_html( $settings );
		if ( $link ) :
		?>
				</a>
		<?php endif; ?>
		
				<h3 class="banner_title elementor-inline-editing" data-elementor-setting-key="banner_title" data-elementor-inline-editing-toolbar="advanced">
					<a class="pt-link" <?php echo $this->get_render_attribute_string( 'link' ); ?> ></a><?php echo ( $settings['banner_title'] );  ?> </a>
					<i class="<?php echo esc_html( $pt_heading_icon ); ?>"></i>
				</h3>
				<div class="mask opaque-background" style="background: rgba(36, 36, 36, 0.4) none repeat scroll 0px 0px;">
					<div class="pt-back-icon">
						<i class="<?php echo esc_html( $pt_hover_desc_icon ); ?>"></i>
					</div>
					<a class="pt-link" <?php echo $this->get_render_attribute_string( 'link' ); ?>></a>
					
					<div class="pt-description ult-responsive elementor-inline-editing" <?php echo $this->get_render_attribute_string( 'content_description' ); ?> data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced">
					<?php echo $settings['content_description'] ; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	/**
	 * Define our Content template settings.
	 */
	protected function _content_template() {
	}
	/**
	 * Get link url.
	 *
	 * @param string $instance url.
	 */
	private function get_link_url( $instance ) {
		if ( 'none' === $instance['link_to'] ) {
			return false;
		}

		if ( 'custom' === $instance['link_to'] ) {
			if ( empty( $instance['link']['url'] ) ) {
				return false;
			}
			return $instance['link'];
		}

		return [
			'url' => $instance['image']['url'],
		];
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Interactive_Banner() );
