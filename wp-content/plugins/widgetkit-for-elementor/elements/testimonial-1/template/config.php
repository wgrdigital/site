<?php
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor WidgetKit testimonial 1
 *
 * Elementor widget for WidgetKit testimonial 1
 *
 * @since 1.0.0
 */
class wkfe_testimonial_1 extends Widget_Base {

	public function get_name() {
		return 'widgetkit-for-elementor-testimonial-1';
	}

	public function get_title() {
		return esc_html__( 'Testimonial Center', 'widgetkit-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'widgetkit_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'owl-carousel' ];
	}

	protected function _register_controls() {

		
	// Content options Start
	$this->start_controls_section(
		'section_content',
			[
				'label' => esc_html__( 'Testimonial Items', 'widgetkit-for-elementor' ),
			]
		);


		$repeater = new Repeater();
	    $repeater->add_control(
		    'title_1',
		      	[
		          'label' => esc_html__( 'Title', 'widgetkit-for-elementor' ),
		          'type'  => Controls_Manager::TEXTAREA,
		          'default' => esc_html__( 'Jonathan Morgan', 'widgetkit-for-elementor' ),
		    	]
	    );

	   	$repeater->add_control(
		    'designation_1',
		      	[
		          'label' => esc_html__( 'Designation', 'widgetkit-for-elementor' ),
		          'type'  => Controls_Manager::TEXTAREA,
		          'default' => esc_html__( 'Jonathan Morgan', 'widgetkit-for-elementor' ),
		    	]
	    );


		$repeater->add_control(
	       'testimoni_image_1',
		        [
		          'label' => esc_html__( 'Testimonial Image', 'widgetkit-for-elementor' ),
		          'type'  => Controls_Manager::MEDIA,
		          'default' => [
						'url' => plugins_url('/widgetkit-for-elementor/assets/images/testimoni-demo.jpg'),
				  	],
		        ]
	    );

		$repeater->add_control(
		    'testimoni_content_1',
		      	[
		          'label' => esc_html__( 'Description', 'widgetkit-for-elementor' ),
		          'type'  => Controls_Manager::TEXTAREA,
		          'default' => esc_html__( 'Corem ipsum dolor si amet consectetur adipisic ingelit sed do adipisicido executiv
						sunse pit lore kome.', 'widgetkit-for-elementor' ),
		      	]
		);

		$this->add_control(
		    'testimonial_option_1',
		      [
		          'label'       => esc_html__( 'Testimonials Options', 'widgetkit-for-elementor' ),
		          'type'        => Controls_Manager::REPEATER,
		          'show_label'  => true,
		          'default'     => [
		              [
		                'title_1'       => esc_html__( 'Jonathan Morgan', 'widgetkit-for-elementor' ),
		                'designation_1' => esc_html__( 'Marketting', 'widgetkit-for-elementor' ),
		                'testimoni_content_1' => 'Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conse quat. Duis aute irure dolor in reprehenderit in voluptate.',
		                'testimoni_image_1' => '',
		 
		              ],
		              [
		                'title_1'       => esc_html__( 'Harsul Hisham', 'widgetkit-for-elementor' ),
		                'designation_1' => esc_html__( 'Engineer', 'widgetkit-for-elementor' ),
		                'testimoni_content_1' => 'Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conse quat. Duis aute irure dolor in reprehenderit in voluptate.',
		                'testimoni_image_1' => '',
		 
		              ],
		              [
		                'title_1'       => esc_html__( 'Teem Southy', 'widgetkit-for-elementor' ),
		                'designation_1' => esc_html__( 'Developer', 'widgetkit-for-elementor' ),
		                'testimoni_content_1' => 'Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conse quat. Duis aute irure dolor in reprehenderit in voluptate.',
		                'testimoni_image_1' => '',
		 
		              ]
		          ],
		          'fields'      => array_values( $repeater->get_controls() ),
		          'title_field' => '{{{title_1}}}',
		      ]
		  );

	$this->end_controls_section();


	// Content options End
	$this->start_controls_section(
		'layout_style',
		[
			'label' => esc_html__( 'Layout', 'widgetkit-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		]
	);

		$this->add_control(
			'testimonial_items',
			[
				'label'     => esc_html__( 'Items Shows', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '3',
				'options'   => [
					'1'   => esc_html__( 'Item 1', 'widgetkit-for-elementor' ),
					'2'   => esc_html__( 'Item 2', 'widgetkit-for-elementor' ),
					'3'   => esc_html__( 'Item 3', 'widgetkit-for-elementor' ),
				],
			]
		);


		$this->add_control(
			'bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper' => 'background-color: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'item_center_bg_color',
			[
				'label'     => esc_html__( 'Center Bg/Hover Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .tgx-testimonial-1 .center .testimoni-wrapper,
					{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper:hover' => 'background-color: {{VALUE}};',

				],
			]
		);


		$this->add_control(
			'autoplay_enable',
			[
				'label'     => esc_html__( 'Auto Play Enable/Disable', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'yes'    => esc_html__( 'True', 'widgetkit-for-elementor' ),
				'no'     => esc_html__( 'False', 'widgetkit-for-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'    => 'item_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .tgx-testimonial-1 .center .testimoni-wrapper,
				{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper:hover:hover',
			]
		);


	$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Content', 'widgetkit-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'content_typography',
					'label'    => esc_html__( 'Content Typography', 'widgetkit-for-elementor' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					'selector' => '{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .testimony',
				]
		);

		$this->add_control(
			'testimoni_1_color',
			[
				'label'     => esc_html__( 'Testimoni Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#676767',
				'selectors' => [
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .testimony' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();





		$this->start_controls_section(
			'section_name',
			[
				'label' => esc_html__( 'Name/Designation', 'widgetkit-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_control(
			'name_color',
			[
				'label'     => esc_html__( 'Name Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#182432',
				'selectors' => [
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .author .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'name_typography',
					'label'    => esc_html__( 'Name Typography', 'widgetkit-for-elementor' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					'selector' => '{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .author .name',
				]
		);



		$this->add_control(
			'designation_color',
			[
				'label'     => esc_html__( 'Designation Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#989898',
				'selectors' => [
					'{{WRAPPER}}  .tgx-testimonial-1 .testimoni-wrapper .author .designation' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'designation_typography',
					'label'    => esc_html__( 'Designation Typography', 'widgetkit-for-elementor' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
					'selector' => '{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .author .designation',
				]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border/Quite Color', 'widgetkit-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ddd',
				'selectors' => [
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .testimony:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .author:before' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-wrapper .author' => 'border-top:1px solid {{VALUE}};',
				],
			]
		);



		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'widgetkit-for-elementor' ),
				'type'  => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tgx-testimonial-1 .testimoni-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	$this->end_controls_section();
	}

	protected function render() {
		require WKFE_PATH . '/elements/testimonial-1/template/view.php';
	}


}
