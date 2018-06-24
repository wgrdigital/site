<?php
namespace Void_ewhmcse\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Style for header
 *
 *
 * @since 1.0.0
 */

class Section_Pricing extends Widget_Base {

	public function get_name() {
		return 'section-pricing'; 
	}

	public function get_title() {
		return 'Pricing Table';   // title to show on elementor
	}

	public function get_icon() {
		return 'eicon-price-table';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
	}

	public function get_categories() {
		return [ 'void-elements' ];    // category of the widget
	}

	protected function _register_controls() {
		
//start of a control box
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'void_ewhmcse' ),   //section name for controler view
			]
		);

		$this->add_control(
			'whmcs_url',
			[
				'label' => __( 'WHMCS URL', 'void_ewhmcse' ),
				'description' => __( 'Used when you do not have WHMCS Bridge Plugin installed to get/send data. Do not add (/). Just input direct url of your whmcs area (not admin url). ex: https://testsite/whmcs', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'https://voidcoders.com/voidwhmcs',
			]
		);
		
		$this->add_responsive_control(
			'image',
			[
				'label' => __( 'Packedge Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'image', // Actually its `image_size  name je image er size seta`
					'label' => esc_html__( 'Image Size', 'void_ewhmcse' ),
					'default' => 'medium',
				]
		);

		$this->add_control(
			'auto_title',
			[
				'label' => __( 'Get Packedge Title Directly', 'void_ewhmcse' ),
				'type' => Controls_Manager::SWITCHER,
				//'default' => '0',
				'description' => 'If turned on the packedge name is featched automatically from your whmcs url defined above. Give the ID of your product of WHMCS Product in the Product ID field so that the data can be fatched',
				'return_value' => '1',
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Packedge Title', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Entry Server',
				'condition' => [
					'auto_title!' => '1',
				],
			]
		);

		$this->add_control(
			'auto_price',
			[
				'label' => __( 'Get Monthly Packedge Price Directly', 'void_ewhmcse' ),
				'type' => Controls_Manager::SWITCHER,
				//'default' => '0',
				'description' => 'If turned on the packedge price is featched automatically from your whmcs url defined above. Give the ID of your product of WHMCS Product so that the data can be fatched in product id filed',
				'return_value' => '1',
			]
		);

		$this->add_control(
			  'billingcycle',
			  [
			     'label'       => __( 'Billing Cycle', 'void_ewhmcse' ),
			     'type' => Controls_Manager::SELECT,
			     'description' => 'This shows data from WHMCS url as defiend. If the billing cycle does not exist in the whmcs it will not show up correct data!',
			     'default' => 'monthly',
			     'options' => [
			     	'monthly'  => esc_html__( 'Monthly', 'void_ewhmcse' ),
			     	'quarterly'  => esc_html__( 'Quarterly', 'void_ewhmcse' ),
			     	'quarterly'  => esc_html__( 'Quarterly', 'void_ewhmcse' ),
			     	'semiannually'  => esc_html__( 'Semiannually', 'void_ewhmcse' ),
			     	'annually'  => esc_html__( 'Annually', 'void_ewhmcse' ),
			     	'biennially'  => esc_html__( 'Biennially', 'void_ewhmcse' ),
			     	'triennially'  => esc_html__( 'Triennially', 'void_ewhmcse' ),
			     ],
			    'condition' => [
					'auto_price' => '1',
				],
			  ]
			);
		$this->add_control(
			'billingafter',
			[
				'label' => esc_html__( 'Auto Price After Text', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => '/Mo',
				'condition' => [
					'auto_price' => '1',
				],
			]
		);



		$this->add_control(
			'oldprice',
			[
				'label' => esc_html__( 'Use Old Price', 'void_ewhmcse' ),
				'description' => esc_html__( 'Show old packedge price like was-5$ now discounted. Leave empty to disable.', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => '$400',
			]
		);
		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Packedge Price', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => '$229.00/mo',
				'condition' => [
					'auto_price!' => '1',
				],
			]
		);


		$this->add_control(
			'packedge_id',
			[
				'label' => esc_html__( 'Packedge ID from WHMCS', 'void_ewhmcse' ),
				'description' => esc_html__('Provide the Packedge ID number of your product so the system can get the details of product via the ID from your defined WHMCS url in above. The Featched data will be visible to page after you hit save & check the page', 'void_ewhmcse'),
				'type' => Controls_Manager::NUMBER,
				'default' => '1',
				'label_block' => true,
			]
		);

		$this->add_control(
					'icon_list',
					[
						'label' => esc_html__( 'Feature', 'void_ewhmcse' ),
						'type' => Controls_Manager::REPEATER,
						'default' => [
							[
								'icon' => 'Intel Xeon E3-1230 CPU',
							]
						],
						'fields' => [
							[
								'name' => 'icon',
								'label' => __( 'Feature Text', 'void_ewhmcse' ),
								'type' => Controls_Manager::TEXT,
								'label_block' => true,
							]
						],
						'title_field' => '{{ icon }}',
					]
				);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default'=> 'Buy Now',
			]
		);
		$this->add_control(
			'website_link',
			[
			 'label' => __( 'Button Url', 'void_ewhmcse' ),
			 'type' => Controls_Manager::URL,
			 'default' => [
			    'url' => 'http://voidcoders.com',
			    'is_external' => '',
			 ],
			 'show_external' => true, // Show the 'open in new tab' button.
			]
		);

		$this->add_control(
			'make_featured',
			[
				'label' => __( 'Make Featured', 'void_ewhmcse' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => '1',
			]
		);


		$this->add_control(
			'featured_title',
			[
				'label' => esc_html__( 'Featured Text', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Best Deal',
				'condition' => [
					'make_featured' => '1',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'void_ewhmcse' ),   //section name for controler view
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

	
		$this->add_control(
			  'table_style',
			  [
			     'label'       => __( 'Select Style', 'void_ewhmcse' ),
			     'type' => Controls_Manager::SELECT,
			     'default' => 'void-price-0',
			     'options' => [
			     	'void-price-0'  => esc_html__( 'Default', 'void_ewhmcse' ),
			     	// 'void-price-1'  => esc_html__( 'Style One', 'void_ewhmcse' ),
			     	// 'void-price-2'  => esc_html__( 'Style Two', 'void_ewhmcse' ),
			     	// 'void-price-3'  => esc_html__( 'Vertical one', 'void_ewhmcse' ),
			     ],
			  ]
			);

			$this->add_control(
			  'pricing_style',
			  [
			     'label'       => __( 'Pricing Style', 'void_ewhmcse' ),
			     'type' => Controls_Manager::SELECT,
			     'default' => 'void-price-normal',
			     'options' => [
			     	'void-price-normal'  => esc_html__( 'Default', 'void_ewhmcse' ),
			     	'void-price-rounded'  => esc_html__( 'Rounded', 'void_ewhmcse' ),
			     	
			     ],
			     'condition' => [
					'table_style!' => 'void-price-3',
				],
			  ]
			);
		$this->add_control(
			'buy-btn-css',
			[
				'label' => __( 'Button Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> '1px solid red; ',
				'selectors' => [
					'{{WRAPPER}}  .pricing-box .pb-get' => '{{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'buy-btn-css-hover',
			[
				'label' => __( 'Button Hover Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> '1px solid red;',
				'selectors' => [
					'{{WRAPPER}}  .pricing-box .pb-get:hover' => '{{VALUE}};',
				],
			]
		);		


		$this->add_control(
		  'icon_margin',
		  [
		     'label' => __( 'Used Image Margin (Not available for vertical style)', 'void_ewhmcse' ),
		     'type' => Controls_Manager::DIMENSIONS,
			 'size_units' => [ 'px', '%', 'em' ],
			 'selectors' => [
			 		'{{WRAPPER}} .pricing-box-head img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 ],
		   'condition' => [
				'table_style!' => 'void-price-3',
			],
		  ]
		);

		$this->end_controls_section();

		//End of a control box

	}
//end of control box 

	protected function render() {		
			//to show on the fontend 
	$settings = $this->get_settings(); 

	$website_link = $this->get_settings( 'website_link' );
	$url = $website_link['url'];
	$target = $website_link['is_external'] ? 'target="_blank"' : '';

	?>
<?php if($settings['table_style'] == 'void-price-3' ) : ?>

	<div class="void-pricing-3 pt-type6">
		<div class="pt-header">
			<h3 class="plan-title">
				<?php if( $settings['auto_title'] && $settings['whmcs_url']!='' && $settings['packedge_id'] ) { echo'<script language="javascript" src="'.$settings['whmcs_url'].'/feeds/productsinfo.php?pid='. $settings['packedge_id'] .'&get=name"></script>'; } else{echo $settings['title']; } ?>
			</h3>
			<h4 class="plan-price">
				<?php if($settings['oldprice']!=''){echo '<span class="old-price-span">'.$settings['oldprice'].'</span>'; } ?>
		    	<?php if( $settings['auto_price'] && $settings['whmcs_url']!='' && $settings['packedge_id'] ) { echo'<script language="javascript" src="'.$settings['whmcs_url'].'/feeds/productsinfo.php?pid='. $settings['packedge_id'] .'&get=price&billingcycle='. $settings['billingcycle'] .'"></script>'. $settings['billingafter']; } else{echo $settings['price']; } ?>
		    </h4>
		</div>

		<ul class="pt-features">
			<?php foreach ( $settings['icon_list'] as $item ) : ?>
				<li class="feature-item"><span class="feature-icon available-icon"></span>
					<?php echo $item['icon']; ?>
				</li>
		    <?php endforeach; ?>
		</ul>

		<div class="pt-footer">
			<?php if( $settings['make_featured'] ): ?>
			<div class="sale-box">
				<span class="on_sale title_shop"><?php echo $settings['featured_title']; ?></span>
			</div>
			<?php endif; ?>
			<?php echo '<a class="magicmore pb-get hvr-bs" href="' . $url . '" ' . $target .'>'. $settings['button_text'].'</a>'; ?>
		</div>
	</div>

<?php else: ?>

	<div class="<?php echo $settings['table_style'].' '.$settings['pricing_style'];  ?>">
		<div class="pricing-box">
		    <div class="pricing-box-head">
		    	<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
		        <span class="pbh-title"><?php if( $settings['auto_title'] && $settings['whmcs_url']!='' && $settings['packedge_id'] ) { echo'<script language="javascript" src="'.$settings['whmcs_url'].'/feeds/productsinfo.php?pid='. $settings['packedge_id'] .'&get=name"></script>'; } else{echo $settings['title']; } ?></span>
				<?php if( $settings['make_featured'] ): ?>
				<div class="sale-box">
					<span class="on_sale title_shop"><?php echo $settings['featured_title']; ?></span>
				</div>
				<?php endif; ?>
		    </div>

		    <div class="pb-list">
		    	<div class="price">
		    		<div class="original-price">
		    			<div class="dispay-price">
		    				<?php if($settings['oldprice']!=''){echo '<span>'.$settings['oldprice'].'</span>'; } ?>
		    				<?php if( $settings['auto_price'] && $settings['whmcs_url']!='' && $settings['packedge_id'] ) { echo'<script language="javascript" src="'.$settings['whmcs_url'].'/feeds/productsinfo.php?pid='. $settings['packedge_id'] .'&get=price&billingcycle='. $settings['billingcycle'] .'"></script>'. $settings['billingafter']; } else{echo $settings['price']; } ?>
		    			</div>
		    		</div>
		    	</div>

		    	<ul>
		    		<?php foreach ( $settings['icon_list'] as $item ) : ?>
		    			<li>
		    				<?php echo $item['icon']; ?>
		    			</li>
		    		<?php endforeach; ?>
		    	</ul>
		    </div>
		    <?php echo '<a class="pb-get hvr-bs" href="' . $url . '" ' . $target .'>'. $settings['button_text'].'</a>'; ?>
		</div>
	</div>

<?php endif; ?>

	

	<?php }

	protected function _content_template() {      // to be in live preview edit
	
	}
}
