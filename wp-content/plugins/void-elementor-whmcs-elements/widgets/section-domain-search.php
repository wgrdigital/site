<?php
namespace Void_ewhmcse\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Style for header
 *
 *
 * @since 1.0.0
 */

class Section_Domain_Search extends Widget_Base {

	public function get_name() {
		return 'section-domain-search'; 
	}

	public function get_title() {
		return 'Domain Search';   // title to show on elementor
	}

	public function get_icon() {
		return 'eicon-search';    //   eicon-posts-ticker-> eicon ow asche icon to show on elelmentor
	}

	public function get_categories() {
		return [ 'void-elements' ];    // category of the widget
	}
	public function get_script_depends() {
		return [ 'domain-search'];
	}
	
	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/

	protected function _register_controls() {
		
//start of a control box
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Settings', 'void_ewhmcse' ),   //section name for controler view
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
		
		$this->add_control(
			'search_bar_placeholder',
			[
				'label' => __( 'Search Bar Place Holder', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Enter your domain name here',
			]
		);

		$this->add_control(
			'search_button_text',
			[
				'label' => __( 'Search Button Text', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Search Domain',
			]
		);

		$this->add_control(
			'direct_search',
			[
				'label' => __( 'Live Ajax Search', 'void_ewhmcse' ),
				'type' => Controls_Manager::SWITCHER,
				//'default' => '0',
				'description' => 'If turned on the domain will be searched via ajax first and then if available button will be shown to purchase which will redirect to your whmcs / whmcs bridge page',
				'return_value' => '1',
			]
		);

		$this->end_controls_section();

//End  of a control box

//start of a control box
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'void_ewhmcse' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'search_input_bg_color',
			[
				'label' => __( 'Search Box Background Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="text"]' => 'background: {{VALUE}};',
				],
			]
		);	

		$this->add_control(
			'search_input_text_color',
			[
				'label' => __( 'Search Box Input Text Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="text"]' => 'color: {{VALUE}};',
				],
			]
		);		

		$this->add_control(
			'search_input_placeholder_color',
			[
				'label' => __( 'Search Box Placeholder Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="text"]::placeholder' => 'color: {{VALUE}};',
				],
			]
		);	
		$this->add_control(
			'search_button_bg_color',
			[
				'label' => __( 'Search Button Background Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="submit"]' => 'background: {{VALUE}};',
				],
			]
		);		

		$this->add_control(
			'search_button_bg_colorh',
			[
				'label' => __( 'Search Button Hover Background Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="submit"]:hover' => 'background: {{VALUE}};',
				],
			]
		);	

		$this->add_control(
			'search_button_text_color',
			[
				'label' => __( 'Search Text Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="submit"]' => 'color: {{VALUE}};',
				],
			]
		);		

		$this->add_control(
			'search_button_text_colorh',
			[
				'label' => __( 'Search Button Hover Text Color', 'void_ewhmcse' ),
				'type' => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="submit"]:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'search_input_border',
			[
				'label' => __( 'Search Box Border Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> '1px solid red; ',
				'selectors' => [
					'{{WRAPPER}}  .sda-form-input-box input[type="text"]' => 'border: {{VALUE}};',
				],
			]
		);		

		$this->add_control(
			'domain-result',
			[
				'label' => __( 'Result Area Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> '1px solid red; ',
				'selectors' => [
					'{{WRAPPER}}  .domain-result' => '{{VALUE}};',
				],
			]
		);		

		$this->add_control(
			'domain-available',
			[
				'label' => __( 'Domain available Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> '1px solid red; ',
				'selectors' => [
					'{{WRAPPER}}  .domain-available' => '{{VALUE}};',
				],
			]
		);			
		$this->add_control(
			'domain-unavailable',
			[
				'label' => __( 'Domain Unavailable Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> 'color: red;',
				'selectors' => [
					'{{WRAPPER}}  .domain-unavailable' => '{{VALUE}};',
				],
			]
		);		
		$this->add_control(
			'domain-info',
			[
				'label' => __( 'Domain Info Css', 'void_ewhmcse' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder'	=> 'color: red;',
				'selectors' => [
					'{{WRAPPER}}  .domain-info' => '{{VALUE}};',
				],
			]
		);		

		$this->end_controls_section();
	}

//end of control box 

	protected function render() {		
			//to show on the fontend 
	global $whmcs_bridge_enabled;
		
	$settings = $this->get_settings();

	?>
	<?php if($settings['direct_search']) : ?>
		<div class="sda-form-area">
		    <div class="sda-form-input-box">
			    <form method="post" action="<?php if($whmcs_bridge_enabled==1){ echo esc_url(void_ewhmcse_whmcs_bridge_url() .'?ccce=domainchecker'); } else{ echo esc_url($settings['whmcs_url'].'/domainchecker.php'); }  ?>" >
			        <input class="iddomainname" type="text" autocomplete="off" required name="domain" placeholder="<?php echo $settings['search_bar_placeholder']; ?>">
			        <input id="find" type="submit" value="<?php echo $settings['search_button_text']; ?>">
			   	</form>
		    </div>
		     <div id="results" class="domain-result"></div>		
        </div>
  
	<?php else: ?>
		<div class="sda-form-area">
			<form method="post" action="<?php if($whmcs_bridge_enabled==1){ echo esc_url(void_ewhmcse_whmcs_bridge_url() .'?ccce=domainchecker'); } else{ echo esc_url($settings['whmcs_url'].'/domainchecker.php'); }  ?>">
			    <div class="sda-form-input-box">
			        <input type="text" autocomplete="off" required name="domain" placeholder="<?php echo $settings['search_bar_placeholder']; ?>">
			        <input type="submit" value="<?php echo $settings['search_button_text']; ?>">
			    </div>
			</form>
        </div>
	<?php endif; ?>

	<?php	}

	protected function _content_template() {      // to be in live preview edit
	
	}
}
