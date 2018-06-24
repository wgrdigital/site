<?php
/**
 * Class Pt-elementor-dual-button.php
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
 * Define our Pt Elementor Dual Button settings.
 */
class Pt_Elementor_Dual_Button extends Widget_Base {
	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		/** Function for get the slug of the element name. */
		return 'pt_advanced_button';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		/** Function for get the name of the element. */
		return __( 'PT - Dual Button', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		/** Function for get the icon of the element. */		
		return 'eicon-button';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		/** Function for include element into the category. */
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our get_button_sizes settings.
	 */
	public static function get_button1_sizes() {
		/** Define sizes of button1. */
		return [
			'xs' => __( 'Extra Small', 'elementor' ),
			'sm' => __( 'Small', 'elementor' ),
			'md' => __( 'Medium', 'elementor' ),
			'lg' => __( 'Large', 'elementor' ),
			'xl' => __( 'Extra Large', 'elementor' ),
		];
	}
	/**
	 * Define our get_button_sizes2 settings.
	 */
	public static function get_button2_sizes() {
		/** Define sizes of button2. */
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
		/** Function register controls for the element. */
		$this->start_controls_section( /** Add controls to for Select options. */
			'section_pt_adv_opt',
			[
				'label' => __( 'Button Types', 'elementor' ),
			]
		);
		$this->add_control(
			'pt_adv_btn_option',
			[
				'label' => __( 'Button Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'adv_btn' => __( 'Single Button', 'elementor' ),
					'dual_button' => __( 'Dual Button', 'elementor' ),
					'dbwt' => __( 'Dual Button With Text', 'elementor' ),
				],
				'default' => 'adv_btn',
			]
		);
		$this->add_control( /** Add Layout Style control for button1. */
			'pt_adv_btn1_layout',
			[
				'label' => __( 'Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal' => __( 'Normal', 'elementor' ),
					'push' => __( 'Push Button', 'elementor' ),
					'circle' => __( 'Circle Button', 'elementor' ),
					'slide' => __( 'Slide Button', 'elementor' ),
					'swipe' => __( 'Swipe Button', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add Layout Style control for button1. */
			'pt_dual_btn1_layout',
			[
				'label' => __( 'Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal' => __( 'Normal', 'elementor' ),
					'push' => __( 'Push Button', 'elementor' ),
					'slide' => __( 'Slide Button', 'elementor' ),
					'swipe' => __( 'Swipe Button', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section( /** Add controls to for button1. */
			'section_pt_adv_btn1',
			[
				'label' => __( 'Button', 'elementor' ),
			]
		);
		$this->add_control( /** Add hover style control for normal Style layout. */
			'pt_adv_btn1_style_normal',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
					'style5' => __( 'Style5', 'elementor' ),
					'style6' => __( 'Style6', 'elementor' ),
					'style7' => __( 'Style7', 'elementor' ),
					'style8' => __( 'Style8', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'normal',
				],
			]
		);
		$this->add_control( /** Add hover style control for normal Style layout. */
			'pt_dual_btn1_style_normal',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
					'style5' => __( 'Style5', 'elementor' ),
					'style6' => __( 'Style6', 'elementor' ),
					'style7' => __( 'Style7', 'elementor' ),
					'style8' => __( 'Style8', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'normal',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_adv_btn1_style_push',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'push',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn1_style_push',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'push',
				],
			]
		);
		$this->add_control( /** Add hover style control for flat Style layout. */
			'pt_adv_btn1_style_circle',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'circle',
				],
			]
		);
		$this->add_control( /** Add hover style control for outline Style layout. */
			'pt_adv_btn1_style_slide',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'slide',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn1_style_slide',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'slide',
				],
			]
		);
		$this->add_control( /** Add hover style control for 3D Style layout. */
			'pt_adv_btn1_style_swipe',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'swipe',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn1_style_swipe',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'swipe',
				],
			]
		);
		$this->add_control(/** Add control to edit title for button1. */
			'pt_adv_btn1_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button1 Text', 'elementor' ),
				'placeholder' => __( 'Button1 Text', 'elementor' ),
			]
		);
		$this->add_control(/** Add control to set link for button1. */
			'pt_adv_btn1_link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_control(/** Add select control for Button1 Link Rel Type. */
			'pt_adv_btn1_link_type',
			[
				'label' => __( 'Link Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dofollow',
				'options' => [
					'dofollow' => __( 'DoFollow', 'elementor' ),
					'nofollow' => __( 'NoFollow', 'elementor' ),
				],
			]
		);
		$this->add_responsive_control(/** Add select control for button alignment. */
			'pt_adv_btn1_align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
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
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);
		$this->add_control(/** Add control to select button1 size from different sizes.  */
			'pt_adv_btn1_size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button1_sizes(),
			]
		);
		$this->add_control( /** Add control to select an icon for button1. */
			'pt_adv_btn1_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control( /** Add control for button1 icon position. */
			'pt_adv_btn1_icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn1_icon!' => '',
				],
			]
		);
		$this->add_control( /** Add control for button1 icon spacing. */
			'pt_adv_btn1_icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'pt_adv_btn1_icon!' => '',
					'pt_adv_btn_option' => 'adv_btn',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control( /** Add control for button1 icon spacing. */
			'pt_dual_btn1_icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'pt_adv_btn1_icon!' => '',
					'pt_adv_btn_option!' => 'adv_btn',
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-left .elementor-align-icon-right, .dbwt-button-left .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .dual-button-left .elementor-align-icon-left, .dbwt-button-left .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control( /** Add control for add tooltips option for button1. */
			'pt_adv_btn1_tooltip',
			[
				'label' => __( 'Tooltip', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => __( 'No', 'elementor' ),
				],
			]
		);
		$this->add_control( /** Add control for add tooltips text on button1. */
			'pt_btn1_tooltip_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tooltip Text', 'elementor' ),
				'placeholder' => __( 'Tooltip Text', 'elementor' ),
				'condition' => [
					'pt_adv_btn1_tooltip' => 'yes',
				],
			]
		);
		$this->add_control( /** Add control for add tooltips position for button1. */
			'pt_btn1_tooltip_position',
			[
				'label' => __( 'Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => __( 'Top' , 'elementor' ),
					'top_left' => __( 'Top Left' , 'elementor' ),
					'top_right' => __( 'Top right' , 'elementor' ),
					'bottom' => __( 'Bottom' , 'elementor' ),
					'bottom_left' => __( 'Bottom Left' , 'elementor' ),
					'bottom_right' => __( 'Bottom Right' , 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn1_tooltip' => 'yes',
				],
			]
		);
		$this->end_controls_section(); /** End cotrol section for button1. */
		$this->start_controls_section( /** Start section for Text or Icon section for button1 with text option. */
			'section_pt_btn1_text',
			[
				'label' => __( 'Text or Icon', 'elementor' ),
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add controls for Text or Icon option for button1. */
			'pt_dbwt_btn_option',
			[
				'label' => __( 'Select Option', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Text', 'elementor' ),
					'icon' => __( 'Icon', 'elementor' ),
				],
			]
		);
		$this->add_control( /** Add controls for Title editor of button1. */
			'pt_dbwt_btn_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Or', 'elementor' ),
				'placeholder' => __( 'Or', 'elementor' ),
				'condition' => [
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_control( /** Add control Icon section for button2 for text or icon section. */
			'pt_dbwt_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-star',
				'condition' => [
					'pt_dbwt_btn_option' => 'icon',
				],
			]
		);
		$this->end_controls_section(); /** End control section for Text or icon for button1. */
		$this->start_controls_section( /** Start control section with name button2. */
			'section_pt_adv_btn2',
			[
				'label' => __( 'Button 2', 'elementor' ),
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add hover style control for normal Style layout. */
			'pt_dual_btn2_style_normal',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
					'style5' => __( 'Style5', 'elementor' ),
					'style6' => __( 'Style6', 'elementor' ),
					'style7' => __( 'Style7', 'elementor' ),
					'style8' => __( 'Style8', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'normal',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn2_style_push',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'push',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn2_style_slide',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'slide',
				],
			]
		);
		$this->add_control( /** Add hover style control for push Style layout. */
			'pt_dual_btn2_style_swipe',
			[
				'label' => __( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => __( 'Style1', 'elementor' ),
					'style2' => __( 'Style2', 'elementor' ),
					'style3' => __( 'Style3', 'elementor' ),
					'style4' => __( 'Style4', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'swipe',
				],
			]
		);
		$this->add_control( /** Add control to edit title for button2. */
			'pt_adv_btn2_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button2 Text', 'elementor' ),
				'placeholder' => __( 'Button2 Text', 'elementor' ),
			]
		);
		$this->add_control( /** Add control to set link for button2. */
			'pt_adv_btn2_link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_control( /** Add select control for Button2 Link Rel Type. */
			'pt_adv_btn2_link_type',
			[
				'label' => __( 'Link Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dofollow',
				'options' => [
					'dofollow' => __( 'DoFollow', 'elementor' ),
					'nofollow' => __( 'NoFollow', 'elementor' ),
				],
			]
		);
		$this->add_control( /** Add control to select an icon for button2. */
			'pt_adv_btn2_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control( /** Add control for button2 icon position. */
			'pt_adv_btn2_icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn2_icon!' => '',
				],
			]
		);
		$this->add_control( /** Add control for button1 icon spacing. */
			'pt_adv_btn2_icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'pt_adv_btn2_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right .elementor-align-icon-right, .dbwt-button-right .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .dual-button-right .elementor-align-icon-left, .dbwt-button-right .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control( /** Add control for add tips when hover on button. */
			'pt_adv_btn2_tooltip',
			[
				'label' => __( 'Tooltip', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => __( 'No', 'elementor' ),
				],
			]
		);
		$this->add_control( /** Add control for add tooltips text for button2. */
			'pt_btn2_tooltip_text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tooltip Text', 'elementor' ),
				'placeholder' => __( 'Tooltip Text', 'elementor' ),
				'condition' => [
					'pt_adv_btn2_tooltip' => 'yes',
				],
			]
		);
		$this->add_control( /** Add control for add tooltips position for button2. */
			'pt_btn2_tooltip_position',
			[
				'label' => __( 'Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => __( 'Top' , 'elementor' ),
					'top_left' => __( 'Top Left' , 'elementor' ),
					'top_right' => __( 'Top right' , 'elementor' ),
					'bottom' => __( 'Bottom' , 'elementor' ),
					'bottom_left' => __( 'Bottom Left' , 'elementor' ),
					'bottom_right' => __( 'Bottom Right' , 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn2_tooltip' => 'yes',
				],
			]
		);
		$this->end_controls_section(); /** End Style control section for button2. */
		$this->start_controls_section( /** Strats Style section control for button1. */
			'pt_adv_btn1_section_style',
			[
				'label' => __( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control( /** Add style control to set border width for Single button. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_adv_btn1',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .elementor-button',
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border width for dual button. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dual_btn1',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dual-button-left',
				'condition' => [
					'pt_adv_btn_option' => 'dual_button',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border width for dbwt button. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dbwt_btn1',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dbwt-button-left',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add style control for border radius of button1. */
			'pt_adv_btn1_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dual-button-left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control( /** Add style control to set padding between text and button1. */
			'pt_adv_btn1_text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dual-button-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control( /** Add style control to set margin between buttons. */
			'pt_adv_btn1_margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dual-button-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' =>
				[
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->start_controls_tabs( 'button1_tabs' );
		$this->start_controls_tab( 'pt_btn1_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);
		$this->add_control(/** Add style control to select text single button. */
			'pt_adv_btn1_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add style control to select text color for dual & dbwt button. */
			'pt_dual_btn1_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-left' => 'color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-left' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->add_group_control( /** Add group control to perform typography for single button. */
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_adv_btn1_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .elementor-button',
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout!' => 'circle',
				],
			]
		);
		$this->add_group_control( /** Add group control to perform typography for dual button. */
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_dual_btn1_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .dual-button-left',
				'condition' => [
					'pt_adv_btn_option' => 'dual_button',
				],
			]
		);
		$this->add_group_control( /** Add group control to perform typography for dbwt button. */
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_dbwt_btn1_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .dbwt-button-left',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add style control to select color for single button. */
			'pt_adv_btn1_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add style control to select color for dual & dbwt button. */
			'pt_dual_btn1_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-left' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-left' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab( 'pt_btn1_hover',
			[
				'label' => __( 'Hover', 'elementor-pro' ),
			]
		);
		$this->add_control( /** Add control to set text color of single button when hover on it. */
			'pt_adv_btn1_hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add control to set text color of dual & dbwt button when hover on it. */
			'pt_dual_btn1_hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-left:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-left:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->add_control( /** Add control for background color of single button hover. */
			'pt_single_btn_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout!' => 'normal',
				],
			]
		);
		$this->add_control( /** Add control for background color of single button hover. */
			'pt_adv_btn1_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-button-normal.style1:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style2:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style3:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style4:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style5:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style6:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style7:hover .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .single-button-normal.style8:hover .btn-hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'adv_btn',
					'pt_adv_btn1_layout' => 'normal',
				],
			]
		);
		$this->add_control( /** Add control for background color of dual button hover. */
			'pt_dual_btn_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-left:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-left:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout!' => 'normal',
				],
			]
		);
		$this->add_control( /** Add control for background color of dbwt button hover. */
			'pt_dual_btn1_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-normal.style1 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style2 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style3 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style4 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style5 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style6 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style7 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dual-button-normal.style8 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style1 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style2 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style3 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style4 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style5 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style6 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style7 .btn-hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-normal.style8 .btn-hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
					'pt_dual_btn1_layout' => 'normal',
				],
			]
		);
		$this->add_control( /** Add control to set hover border color of button1. */
			'pt_adv_btn1_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fd_adv_btn1_border!' => '',
					'pt_adv_btn_option' => 'adv_btn',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control( /** Add control to set hover border color of button1. */
			'pt_dual_btn1_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fd_dual_btn1_border!' => '',
					'pt_adv_btn_option' => 'dual_button',
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-left:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control( /** Add control to set hover border color of button1. */
			'pt_dbwt_btn1_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fd_dbwt_btn1_border!' => '',
					'pt_adv_btn_option' => 'dbwt',
				],
				'selectors' => [
					'{{WRAPPER}} .dbwt-button-left:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(/** To perforn the animation effect for button1. */
			'pt_adv_btn1_hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tabs();
		$this->end_controls_section(); /** End button1 hover style section. */
		$this->start_controls_section( /** Strats Style section control for dual button with text for button1. */
			'section_pt_dbwt_style',
			[
				'label' => __( 'Text or Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add control to select text color for dual button with text for button1. */
			'pt_dbwt_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dbwt-button-text' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_control( /** Add control to Font style for Text or Icon in dbwt button. */
			'pt_dbwt_text_style',
			[
				'label' => __( 'Font Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal' => __( 'Default', 'elementor' ),
					'italic' => __( 'Italic', 'elementor' ),
					'bold_italic' => __( 'Bold & Italic', 'elementor' ),
					'underline' => __( 'Underline', 'elementor' ),
					'bold_underline' => __( 'Bold & Underline', 'elementor' ),
					'overline' => __( 'Overline', 'elementor' ),
					'bold_overline' => __( 'Bold & Overline', 'elementor' ),
					'oblique' => __( 'Oblique', 'elementor' ),
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_control( /** Add style control to select background color for dual button with text for button1. */
			'pt_dbwt_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .dbwt-button-text' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border width for button1. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dbwt_btn_border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dbwt-button-text',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_control( /** Add style control for border radius of button1. */
			'pt_dbwt_text_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbwt-button-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => '',
				],
			]
		);
		$this->add_control( /** Add control to select icon color for dual button with text for button1. */
			'pt_dbwt_icon_color',
			[
				'label' => __( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dbwt-btn-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => 'icon',
				],
			]
		);
		$this->add_control( /** Add style control to select icon background color for dual button with text for button1. */
			'pt_dbwt_icon_background_color',
			[
				'label' => __( 'Icon Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .dbwt-btn-icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => 'icon',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border width for button1. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dbwt_icon_border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dbwt-btn-icon',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => 'icon',
				],
			]
		);
		$this->add_control( /** Add style control for border radius of button1. */
			'pt_dbwt_icon_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dbwt-btn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
					'pt_dbwt_btn_option' => 'icon',
				],
			]
		);
		$this->end_controls_section(); /** End Style section for dual button with text for button1. */
		$this->start_controls_section( /** Strats Style section control for button2. */
			'pt_adv_btn2_section_style',
			[
				'label' => __( 'Button 2', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border for button2. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_adv_btn2',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dual-button-right',
				'condition' => [
					'pt_adv_btn_option' => 'dual_button',
				],
			]
		);
		$this->add_group_control( /** Add style control to set border for button2. */
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dbwt_btn2',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .dbwt-button-right',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add style control for border radius of button2. */
			'pt_adv_btn2_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(/** Add style control to set padding between icon and text for button1. */
			'pt_adv_btn2_text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(/** Add style control to set margin between buttons. */
			'pt_adv_btn2_margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dbwt-button-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'pt_adv_btn_option!' => 'adv_btn',
				],
			]
		);
		$this->start_controls_tabs( 'button2_tabs' );
		$this->start_controls_tab( 'pt_btn2_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);
		$this->add_control( /** Add control to select text color of button2. */
			'pt_adv_btn2_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dual-button-right' => 'color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-right' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control( /** Add group control to perform typography for button2. */
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_adv_btn2_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .dual-button-right', '{{WRAPPER}} .dbwt-button-right',
				'condition' => [
					'pt_adv_btn_option' => 'dual_button',
				],
			]
		);
		$this->add_group_control( /** Add group control to perform typography for button2. */
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_dual_btn2_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .dbwt-button-right',
				'condition' => [
					'pt_adv_btn_option' => 'dbwt',
				],
			]
		);
		$this->add_control( /** Add style control to select background-color for button2. */
			'pt_adv_btn2_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-right' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab( 'pt_btn2_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);
		$this->add_control(/** Add control to set text color of button2 when hover on it. */
			'pt_adv_btn2_hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-right:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-right:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control( /** Add control for background color of button2 hover. */
			'pt_adv_btn2_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dual-button-right:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .dbwt-button-right:hover' => 'background-color: {{VALUE}};',
				],
				'condition' =>
				[
					'pt_dual_btn1_layout!' => 'normal',
				],
			]
		);
		$this->add_control( /** Add control to set hover border color of dual & dbwt button. */
			'pt_dual_btn2_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fd_adv_btn2_border!' => '',
					'pt_adv_btn_option' => 'dual_button',
				],
				'selectors' => [
					'{{WRAPPER}} .dual-button-right:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control( /** Add control to set hover border color of dual & dbwt button. */
			'pt_dbwt_btn2_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'fd_dbwt_btn2_border!' => '',
					'pt_adv_btn_option' => 'dbwt',
				],
				'selectors' => [
					'{{WRAPPER}} .dbwt-button-right:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control( /** To perforn the animation effect for button2. */
			'pt_adv_btn2_hover_animation',
			[
				'label' => __( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_section(); /** End button2 hover style section. */
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
		$this->add_inline_editing_attributes( 'pt_adv_btn1_text', 'advanced' );
		$this->add_inline_editing_attributes( 'pt_adv_btn2_text', 'advanced' );
		$this->add_render_attribute( 'single-wrapper', 'class', 'single-button-wrapper' );
		$this->add_render_attribute( 'adv-dual-wrapper', 'class', 'dual-button-wrapper' );
		$this->add_render_attribute( 'adv-dbwt-wrapper', 'class', 'dual-button-with-text-wrapper' );
		/**
		 * Button1.
		 */
		$this->add_render_attribute( 'btn1-tooltip', 'class', 'button-tooltip' );
		$this->add_render_attribute( 'btn1-tooltip', 'class', 'tooltip-position-' . $settings['pt_btn1_tooltip_position'] );

		if ( ! empty( $settings['pt_adv_btn1_link']['url'] ) ) {
			$this->add_render_attribute( 'single-button', 'href', $settings['pt_adv_btn1_link']['url'] );
			if ( ! empty( $settings['pt_adv_btn1_link']['is_external'] ) ) {
				$this->add_render_attribute( 'single-button', 'target', '_blank' );
			}
		}
		if ( 'nofollow' === $settings['pt_adv_btn1_link_type'] ) {
			$this->add_render_attribute( 'single-button', 'rel', $settings['pt_adv_btn1_link_type'] );
		}
		if ( 'adv_btn' === $settings['pt_adv_btn_option'] ) {
			$this->add_render_attribute( 'single-button', 'class', 'elementor-button' );
		}
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
			$this->add_render_attribute( 'single-button', 'class', 'dual-button-left' );
			$this->add_render_attribute( 'single-button', 'class', 'elementor-button' );
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
			$this->add_render_attribute( 'single-button', 'class', 'dbwt-button-left' );
			$this->add_render_attribute( 'single-button', 'class', 'elementor-button' );
		}
		if ( ! empty( $settings['pt_adv_btn1_size'] ) ) {
			$this->add_render_attribute( 'single-button', 'class', 'elementor-size-' . $settings['pt_adv_btn1_size'] );
		}
		if ( 'adv_btn' === $settings['pt_adv_btn_option'] ) {
			if ( ! empty( $settings['pt_adv_btn1_layout'] ) ) {
				$this->add_render_attribute( 'single-button', 'class', 'single-button-' . $settings['pt_adv_btn1_layout'] );
			}
		}
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
			if ( ! empty( $settings['pt_dual_btn1_layout'] ) ) {
				$this->add_render_attribute( 'single-button', 'class', 'dual-button-' . $settings['pt_dual_btn1_layout'] );
			}
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
			if ( ! empty( $settings['pt_dual_btn1_layout'] ) ) {
				$this->add_render_attribute( 'single-button', 'class', 'dbwt-button-' . $settings['pt_dual_btn1_layout'] );
			}
		}
		if ( 'adv_btn' === $settings['pt_adv_btn_option'] ) {
			if ( 'normal' === $settings['pt_adv_btn1_layout'] ) {
				if ( ! empty( $settings['pt_adv_btn1_style_normal'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_adv_btn1_style_normal'] );
				}
			}
			if ( 'push' === $settings['pt_adv_btn1_layout'] ) {
				if ( ! empty( $settings['pt_adv_btn1_style_push'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_adv_btn1_style_push'] );
				}
			}
			if ( 'circle' === $settings['pt_adv_btn1_layout'] ) {
				if ( ! empty( $settings['pt_adv_btn1_style_circle'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_adv_btn1_style_circle'] );
				}
			}
			if ( 'slide' === $settings['pt_adv_btn1_layout'] ) {
				if ( ! empty( $settings['pt_adv_btn1_style_slide'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_adv_btn1_style_slide'] );
				}
			}
			if ( 'swipe' === $settings['pt_adv_btn1_layout'] ) {
				if ( ! empty( $settings['pt_adv_btn1_style_swipe'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_adv_btn1_style_swipe'] );
				}
			}
		}
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
			if ( 'normal' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_normal'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_normal'] );
				}
			}
			if ( 'push' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_push'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_push'] );
				}
			}
			if ( 'slide' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_slide'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_slide'] );
				}
			}
			if ( 'swipe' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_swipe'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_swipe'] );
				}
			}
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
			if ( 'normal' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_normal'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_normal'] );
				}
			}
			if ( 'push' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_push'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_push'] );
				}
			}
			if ( 'slide' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_slide'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_slide'] );
				}
			}
			if ( 'swipe' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn1_style_swipe'] ) ) {
					$this->add_render_attribute( 'single-button', 'class', $settings['pt_dual_btn1_style_swipe'] );
				}
			}
		}
		if ( ! empty( $settings['pt_adv_btn1_hover_animation'] ) ) {
			$this->add_render_attribute( 'single-button', 'class', 'elementor-animation-' . $settings['pt_adv_btn1_hover_animation'] );
		}
		$this->add_render_attribute( 'adv-icon-align1', 'class', 'elementor-button-icon' );
		$this->add_render_attribute( 'adv-icon-align1', 'class', 'elementor-align-icon-' . $settings['pt_adv_btn1_icon_align'] );
		$this->add_render_attribute( 'pt-hover', 'class', 'btn-hover' );
		/**
		 * Button2.
		 */
		$this->add_render_attribute( 'btn2-tooltip', 'class', 'button-tooltip' );
		$this->add_render_attribute( 'btn2-tooltip', 'class', 'tooltip-position-' . $settings['pt_btn2_tooltip_position'] );
		if ( ! empty( $settings['pt_adv_btn2_link']['url'] ) ) {
				$this->add_render_attribute( 'dual-button', 'href', $settings['pt_adv_btn2_link']['url'] );
			if ( ! empty( $settings['pt_adv_btn2_link']['is_external'] ) ) {
				$this->add_render_attribute( 'dual-button', 'target', '_blank' );
			}
		}
		if ( 'nofollow' === $settings['pt_adv_btn2_link_type'] ) {
				$this->add_render_attribute( 'dual-button', 'rel', $settings['pt_adv_btn2_link_type'] );
		}
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
				$this->add_render_attribute( 'dual-button', 'class', 'dual-button-right' );
				$this->add_render_attribute( 'dual-button', 'class', 'elementor-button' );
			if ( ! empty( $settings['pt_adv_btn1_size'] ) ) {
				$this->add_render_attribute( 'dual-button', 'class', 'elementor-size-' . $settings['pt_adv_btn1_size'] );
			}
			if ( ! empty( $settings['pt_dual_btn1_layout'] ) ) {
				$this->add_render_attribute( 'dual-button', 'class', 'dual-button-' . $settings['pt_dual_btn1_layout'] );
			}
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
				$this->add_render_attribute( 'dual-button', 'class', 'dbwt-button-right' );
				$this->add_render_attribute( 'dual-button', 'class', 'elementor-button' );
			if ( ! empty( $settings['pt_adv_btn1_size'] ) ) {
				$this->add_render_attribute( 'dual-button', 'class', 'elementor-size-' . $settings['pt_adv_btn1_size'] );
			}
			if ( ! empty( $settings['pt_dual_btn1_layout'] ) ) {
				$this->add_render_attribute( 'dual-button', 'class', 'dbwt-button-' . $settings['pt_dual_btn1_layout'] );
			}
		}
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
			if ( 'normal' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_normal'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_normal'] );
				}
			}
			if ( 'push' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_push'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_push'] );
				}
			}
			if ( 'slide' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_slide'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_slide'] );
				}
			}
			if ( 'swipe' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_swipe'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_swipe'] );
				}
			}
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
			if ( 'normal' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_normal'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_normal'] );
				}
			}
			if ( 'push' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_push'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_push'] );
				}
			}
			if ( 'slide' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_slide'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_slide'] );
				}
			}
			if ( 'swipe' === $settings['pt_dual_btn1_layout'] ) {
				if ( ! empty( $settings['pt_dual_btn2_style_swipe'] ) ) {
					$this->add_render_attribute( 'dual-button', 'class', $settings['pt_dual_btn2_style_swipe'] );
				}
			}
		}
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
			$this->add_render_attribute( 'pt-dbwt-text', 'class', 'dbwt-button-text' );
			if ( ! empty( $settings['pt_dbwt_text_style'] ) ) {
				if ( 'italic' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-style:italic' );
				}
				if ( 'bold' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-weight:bold' );
				}
				if ( 'underline' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'text-decoration:underline' );
				}
				if ( 'overline' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'text-decoration:overline' );
				}
				if ( 'oblique' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-style:oblique' );
				}
				if ( 'bold_italic' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-weight:bold;font-style:italic' );
				}
				if ( 'bold_underline' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-weight:bold;text-decoration:underline' );
				}
				if ( 'bold_overline' === $settings['pt_dbwt_text_style'] ) {
					$this->add_render_attribute( 'pt-dbwt-text', 'style', 'font-weight:bold;text-decoration:overline' );
				}
			}
		}
		$this->add_render_attribute( 'adv-icon-align2', 'class', 'elementor-button-icon' );
		$this->add_render_attribute( 'adv-icon-align2', 'class', 'elementor-align-icon-' . $settings['pt_adv_btn2_icon_align'] );
		if ( ! empty( $settings['pt_adv_btn2_hover_animation'] ) ) {
			$this->add_render_attribute( 'dual-button', 'class', 'elementor-animation-' . $settings['pt_adv_btn2_hover_animation'] );
		}
		/**
		 * Single Button.
		 */
		if ( 'adv_btn' === $settings['pt_adv_btn_option'] ) {
		?>
		<div <?php echo $this->get_render_attribute_string( 'single-wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'single-button' ); ?>>
				<?php if ( ! empty( $settings['pt_adv_btn1_icon'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'adv-icon-align1' ); ?>>
								<i class="<?php echo esc_attr( $settings['pt_adv_btn1_icon'] ); ?>"></i>
							</span>
				<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'pt-hover' ); ?>></span>
			<span class="single-button-text elementor-inline-editing" data-elementor-setting-key="pt_adv_btn1_text" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_adv_btn1_text']; ?></span>
			</a>
			<?php
			if ( 'yes' === $settings['pt_adv_btn1_tooltip'] ) :
			?>
				<span <?php echo $this->get_render_attribute_string( 'btn1-tooltip' ); ?>>
				<?php echo $settings['pt_btn1_tooltip_text']; ?>
				</span>
			<?php endif; ?>
		</div>
		<?php
		}
		/**
		 * Dual Button.
		 */
		if ( 'dual_button' === $settings['pt_adv_btn_option'] ) {
		?>
		<div <?php echo $this->get_render_attribute_string( 'adv-dual-wrapper' ); ?>>
			<div class="btn-left" style="float: left">
			<a <?php echo $this->get_render_attribute_string( 'single-button' ); ?>>
				<?php if ( ! empty( $settings['pt_adv_btn1_icon'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'adv-icon-align1' ); ?>>
								<i class="<?php echo esc_attr( $settings['pt_adv_btn1_icon'] ); ?>"></i>
							</span>
				<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'pt-hover' ); ?>></span>
			<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="pt_adv_btn1_text" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_adv_btn1_text']; ?></span>
			</a>
			<?php
			if ( 'yes' === $settings['pt_adv_btn1_tooltip'] ) :
			?>
				<span <?php echo $this->get_render_attribute_string( 'btn1-tooltip' ); ?>>
				<?php echo $settings['pt_btn1_tooltip_text']; ?>
				</span>
			<?php endif; ?>
			</div>
			<div class="btn-right" style="float: right">
			<a <?php echo $this->get_render_attribute_string( 'dual-button' ); ?>>
				<?php if ( ! empty( $settings['pt_adv_btn2_icon'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'adv-icon-align2' ); ?>>
								<i class="<?php echo esc_attr( $settings['pt_adv_btn2_icon'] ); ?>"></i>
							</span>
				<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'pt-hover' ); ?>></span>
			<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="pt_adv_btn2_text" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_adv_btn2_text']; ?></span>
			</a>
			<?php
			if ( 'yes' === $settings['pt_adv_btn2_tooltip'] ) :
			?>
				<span <?php echo $this->get_render_attribute_string( 'btn2-tooltip' ); ?>>
				<?php echo $settings['pt_btn2_tooltip_text']; ?>
				</span>
			<?php endif; ?>
			</div>
		</div>
		<?php
		}
		/**
		 * Dual Button With Text Or Icon.
		 */
		if ( 'dbwt' === $settings['pt_adv_btn_option'] ) {
		?>
		<div <?php echo $this->get_render_attribute_string( 'adv-dbwt-wrapper' ); ?>>
		<div class="btn-left" style="float: left">
			<a <?php echo $this->get_render_attribute_string( 'single-button' ); ?>>
				<?php
				if ( ! empty( $settings['pt_adv_btn1_icon'] ) ) :
				?>
							<span <?php echo $this->get_render_attribute_string( 'adv-icon-align1' ); ?>>
								<i class="<?php echo esc_attr( $settings['pt_adv_btn1_icon'] ); ?>"></i>
							</span>
				<?php
				endif;
				?>
			<span <?php echo $this->get_render_attribute_string( 'pt-hover' ); ?>></span>
			<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="pt_adv_btn1_text" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_adv_btn1_text']; ?></span>
			</a>
			<?php
			if ( 'yes' === $settings['pt_adv_btn1_tooltip'] ) :
			?>
				<span <?php echo $this->get_render_attribute_string( 'btn1-tooltip' ); ?>>
				<?php echo $settings['pt_btn1_tooltip_text']; ?>
				</span>
			<?php
			endif;
			?>
		<?php
		if ( '' === $settings['pt_dbwt_btn_option'] ) {
		?>
		<span <?php echo $this->get_render_attribute_string( 'pt-dbwt-text' ); ?>><?php echo $settings['pt_dbwt_btn_text']; ?>
		<?php } else { ?>
			<span class="dbwt-btn-icon">
			<i class="<?php echo esc_attr( $settings['pt_dbwt_icon'] ); ?>"></i>
			</span>
		<?php } ?>
		</span>
		</div>
		<div class="btn-right" style="float: right">
			<a <?php echo $this->get_render_attribute_string( 'dual-button' ); ?>>
				<?php if ( ! empty( $settings['pt_adv_btn2_icon'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'adv-icon-align2' ); ?>>
								<i class="<?php echo esc_attr( $settings['pt_adv_btn2_icon'] ); ?>"></i>
							</span>
				<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'pt-hover' ); ?>></span>
			<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="pt_adv_btn2_text" data-elementor-inline-editing-toolbar="advanced"><?php echo $settings['pt_adv_btn2_text']; ?></span>
			</a>
			<?php
			if ( 'yes' === $settings['pt_adv_btn2_tooltip'] ) :
			?>
				<span <?php echo $this->get_render_attribute_string( 'btn2-tooltip' ); ?>>
				<?php echo $settings['pt_btn2_tooltip_text']; ?>
				</span>
			<?php
			endif;
			?>
		</div>
		</div>
		<?php
		}
	}
	/**
	 * Define _content_template settings.
	 */
	protected function _content_template() {
		?>
		<?php
		/**
		 * Single Button.
		 */
		?>
		<#
		var hover_animation = "";
			if( "" != settings.pt_adv_btn1_hover_animation ){
				hover_animation = "elementor-animation-" + settings.pt_adv_btn1_hover_animation;
			}
			var hover_animation_dual = "";
			if( "" != settings.pt_adv_btn2_hover_animation ){
					hover_animation_dual = "elementor-animation-" + settings.pt_adv_btn2_hover_animation;
				}
				var font_style = "";
			if( ("" != settings.pt_dbwt_text_style) && ( settings.pt_dbwt_text_style=='italic' )){
					font_style = "font-style:italic";
				}
				  if (  settings.pt_dbwt_text_style == 'bold' )
				{
					font_style = "font-weight:bold";
				}
				if (  settings.pt_dbwt_text_style == 'underline' )
				{
					font_style = "text-decoration:underline";
				}
				if (  settings.pt_dbwt_text_style == 'overline' )
				{
					font_style = "text-decoration:overline";
				}
				if ( settings.pt_dbwt_text_style == 'bold_italic' )
				{
					font_style = "font-style:italic;font-weight:bold";
				}
				if ( settings.pt_dbwt_text_style == 'bold_underline' )
				{
					font_style = "font-weight:bold;text-decoration:underline";
				}
				if ( settings.pt_dbwt_text_style == 'bold_overline' )
				{
					font_style = "font-weight:bold;text-decoration:overline";
				}
				if ( settings.pt_dbwt_text_style == 'oblique' )
				{
					font_style = "font-style:oblique";
				}
				if ( settings.pt_adv_btn1_link_type == 'nofollow' )
				{
					var link_type = 'rel=nofollow';
				}
				if ( settings.pt_adv_btn2_link_type == 'nofollow' )
				{
					var link_type2 = 'rel=nofollow';
				}
		if ( settings.pt_adv_btn_option == 'adv_btn' ) { #>
		<div class="single-button-wrapper">
		<# if ( settings.pt_adv_btn1_layout == 'normal' ) { #>
		<a class="elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} single-button-{{ settings.pt_adv_btn1_layout }} {{ settings.pt_adv_btn1_style_normal }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_adv_btn1_layout == 'push' ) { #>
		<a class="elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} single-button-{{ settings.pt_adv_btn1_layout }} {{ settings.pt_adv_btn1_style_push }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_adv_btn1_layout == 'circle' ) { #>
		<a class="elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} single-button-{{ settings.pt_adv_btn1_layout }} {{ settings.pt_adv_btn1_style_circle }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_adv_btn1_layout == 'slide' ) { #>
		<a class="elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} single-button-{{ settings.pt_adv_btn1_layout }} {{ settings.pt_adv_btn1_style_slide }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_adv_btn1_layout == 'swipe' ) { #>
		<a class="elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} single-button-{{ settings.pt_adv_btn1_layout }} {{ settings.pt_adv_btn1_style_swipe }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
					<# if ( settings.pt_adv_btn1_icon ) { #>
						<span class="elementor-button-icon elementor-align-icon-{{ settings.pt_adv_btn1_icon_align }}">
							<i class="{{ settings.pt_adv_btn1_icon }}"></i>
						</span>
					<# } #>
				<span class="btn-hover"></span>
					<span class="single-button-text elementor-inline-editing" data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced"
>{{{ settings.pt_adv_btn1_text }}}</span>
			</a>
			<# if ( settings.pt_adv_btn1_tooltip == 'yes') { #>
				<span class="button-tooltip tooltip-position-{{ settings.pt_btn1_tooltip_position }} ">
				{{{ settings.pt_btn1_tooltip_text }}}
				</span>
			<# } #>
		</div>
		<# } #>

		<?php
		/**
		 * Dual Button.
		 */
		?>
		<# if ( settings.pt_adv_btn_option == 'dual_button' ) { #>
		<div class="dual-button-wrapper">
		<div class="btn-left" style="float: left">
		<# if ( settings.pt_dual_btn1_layout == 'normal' ) { #>
		<a class="dual-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_normal }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'push' ) { #>
		<a class="dual-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_push }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'slide' ) { #>
		<a class="dual-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_slide }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'swipe' ) { #>
		<a class="dual-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_swipe }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
					<# if ( settings.pt_adv_btn1_icon ) { #>
						<span class="elementor-button-icon elementor-align-icon-{{ settings.pt_adv_btn1_icon_align }}">
							<i class="{{ settings.pt_adv_btn1_icon }}"></i>
						</span>
					<# } #>
				<span class="btn-hover"></span>
			<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced"
>{{{ settings.pt_adv_btn1_text }}}</span>
			</a>
			<# if ( settings.pt_adv_btn1_tooltip == 'yes') { #>
				<span class="button-tooltip tooltip-position-{{ settings.pt_btn1_tooltip_position }} ">
				{{{ settings.pt_btn1_tooltip_text }}}
				</span>
			<# } #>
		</div>

		<div class="btn-right" style="float: right">
		<# if ( settings.pt_dual_btn1_layout == 'normal' ) { #>
		<a class="dual-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_normal }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'push' ) { #>
		<a class="dual-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_push }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'slide' ) { #>
		<a class="dual-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_slide }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'swipe' ) { #>
		<a class="dual-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dual-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_swipe }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
					<# if ( settings.pt_adv_btn2_icon ) { #>
						<span class="elementor-button-icon elementor-align-icon-{{ settings.pt_adv_btn2_icon_align }}">
							<i class="{{ settings.pt_adv_btn2_icon }}"></i>
						</span>
					<# } #>
				<span class="btn-hover"></span>
					<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced"
>{{{ settings.pt_adv_btn2_text }}}</span>
			</a>
			<# if ( settings.pt_adv_btn2_tooltip == 'yes') { #>
				<span class="button-tooltip tooltip-position-{{ settings.pt_btn2_tooltip_position }} ">
				{{{ settings.pt_btn2_tooltip_text }}}
				</span>
			<# } #>
			</div>
		</div>
		<# } #>
		<?php
		/**
		 * Dual Button With Text Or Icon.
		 */
		?>
		<# if ( settings.pt_adv_btn_option == 'dbwt' ) { #>
		<div class="dual-button-with-text-wrapper">
		<div class="btn-left" style="float: left">
		<# if ( settings.pt_dual_btn1_layout == 'normal' ) { #>
		<a class="dbwt-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_normal }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'push' ) { #>
		<a class="dbwt-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_push }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'slide' ) { #>
		<a class="dbwt-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_slide }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'swipe' ) { #>
		<a class="dbwt-button-left elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn1_style_swipe }} {{ hover_animation }}" href="{{ settings.pt_adv_btn1_link.url }}" {{link_type}}>
		<# } #>
					<# if ( settings.pt_adv_btn1_icon ) { #>
						<span class="elementor-button-icon elementor-align-icon-{{ settings.pt_adv_btn1_icon_align }}">
							<i class="{{ settings.pt_adv_btn1_icon }}"></i>
						</span>
					<# } #>
				<span class="btn-hover"></span>
					<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced">{{{ settings.pt_adv_btn1_text }}}</span>
			</a>
			<# if ( settings.pt_adv_btn1_tooltip == 'yes') { #>
				<span class="button-tooltip tooltip-position-{{ settings.pt_btn1_tooltip_position }} ">
				{{{ settings.pt_btn1_tooltip_text }}}
				</span>
			<# } #>

		<# if ( settings.pt_dbwt_btn_option == ''  ) { #>
		<span class="dbwt-button-text" style = {{font_style}}>{{{ settings.pt_dbwt_btn_text }}}</span>
		<# } else { #>
			<span class="dbwt-btn-icon">
			<i class="{{ settings.pt_dbwt_icon }}"></i>
			</span>
		<# } #>
		</div>
		<div class="btn-right" style="float: right">
		<# if ( settings.pt_dual_btn1_layout == 'normal' ) { #>
		<a class="dbwt-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_normal }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'push' ) { #>
		<a class="dbwt-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_push }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'slide' ) { #>
		<a class="dbwt-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_slide }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
		<# if ( settings.pt_dual_btn1_layout == 'swipe' ) { #>
		<a class="dbwt-button-right elementor-button elementor-size-{{ settings.pt_adv_btn1_size }} dbwt-button-{{ settings.pt_dual_btn1_layout }} {{ settings.pt_dual_btn2_style_swipe }} {{ hover_animation_dual }}" href="{{ settings.pt_adv_btn2_link.url }}" {{link_type2}}>
		<# } #>
					<# if ( settings.pt_adv_btn2_icon ) { #>
						<span class="elementor-button-icon elementor-align-icon-{{ settings.pt_adv_btn2_icon_align }}">
							<i class="{{ settings.pt_adv_btn2_icon }}"></i>
						</span>
					<# } #>
				<span class="btn-hover"></span>
					<span class="dual-button-text elementor-inline-editing" data-elementor-setting-key="content_description" data-elementor-inline-editing-toolbar="advanced">{{{ settings.pt_adv_btn2_text }}}</span>
			</a>
			<# if ( settings.pt_adv_btn2_tooltip == 'yes') { #>
				<span class="button-tooltip tooltip-position-{{ settings.pt_btn2_tooltip_position }} ">
				{{{ settings.pt_btn2_tooltip_text }}}
				</span>
			<# } #>
			</div>
		</div>
		<# } #>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Dual_Button() );
