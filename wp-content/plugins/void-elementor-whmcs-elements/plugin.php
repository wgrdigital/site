<?php
namespace Void_ewhmcse;  //main namespace

use Void_ewhmcse\Widgets\Section_Domain_Search;   //path define same as class name of the widget
use Void_ewhmcse\Widgets\Section_Pricing;   //path define same as class name of the widget
use Void_ewhmcse\Widgets\Section_Knowledgebase;   //path define same as class name of the widget

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Add a custom category for panel widgets
add_action( 'elementor/init', function() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
   	'void-elements',                 // the name of the category
   	[
   		'title' => esc_html__( 'VOID ELEMENTS', 'void_ewhmcse' ),
   		'icon' => 'eicon-elementor-square', //default icon
   	],
   	1 // position
   );
} );


/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/frontend/after_register_scripts', function() {
			wp_register_script( 'domain-search', plugins_url( '/assets/js/domain-search.js', __FILE__), [ 'jquery' ], true, true );
			
			$our_script_array = array(	'ajaxurl' => admin_url( 'admin-ajax.php' ),
										'button_available' => esc_html__( 'Buy Now' ),
										'button_unavailable' => esc_html__( 'Not Available' ),
										'button_info' => esc_html__( 'Search Again' ),
										'domain_available' => esc_html__( 'Congratulations! The domain is available.' ),
									  	'domain_unavailable' => esc_html__( 'Sorry! The Domain is already taken! Search Another one.'));
			wp_localize_script( 'domain-search', 'domainjs_texts', $our_script_array );

		} );	

		add_action( 'elementor/frontend/after_enqueue_styles', function() {
			wp_enqueue_style( 'void-whmcse', plugins_url( '/assets/css/style.css', __FILE__));
		} );

	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		$void_widgets= array_map('basename', glob(dirname( __FILE__ ) . '/widgets/*.php'));
		foreach($void_widgets as $key => $value){
   			require __DIR__ . '/widgets/'.$value;
		}
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {    
	//this is where we create objects for each widget the above  ->use Void_ewhmcse\Widgets\Hello_World; is needed
	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Domain_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Section_Knowledgebase() );
	}
}

new Plugin();
