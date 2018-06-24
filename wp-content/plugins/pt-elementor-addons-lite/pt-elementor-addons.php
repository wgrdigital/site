<?php
/**
 * Plugin Name: PT Elementor Addons Lite
 * Description: Elements bundle for Elementor Plugin for WordPress. <a href="https://www.paramthemes.com">Get Premium version</a>.
 * Plugin URI:  https://www.paramthemes.com
 * Version:     1.3.4
 *
 * @package PT Elementor Addons
 * Author:      paramthemes
 * Author URI:  https://www.paramthemes.com/
 * Text Domain: pt-elementor-addons
 */
register_activation_hook( __FILE__, 'pt_is_elementor_plugin_activate' );
function pt_is_elementor_plugin_activate(){

    // Require parent plugin
    if ( ! is_plugin_active( 'elementor/elementor.php' ) and current_user_can( 'activate_plugins' ) ) {
        // Stop activation redirect and show error
        wp_die('Sorry, but this plugin requires the Elementor Plugin to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
}
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PT_ELEMENTOR_ADDONS_', __FILE__ );
define( 'PT_ELEMENTOR_ADDONS_URL', plugins_url( '/', __FILE__ ) );
define( 'PT_ELEMENTOR_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
if (!defined('PT_ELEMENTOR_ADDONS_FILE')) { 
	define('PT_ELEMENTOR_ADDONS_FILE', __FILE__);
}
if (!defined('PT_ELEMENTOR_ADDONS_HELP_URL')) {
	define('PT_ELEMENTOR_ADDONS_HELP_URL', admin_url() . 'admin.php?page=pt_elementor_addons_documentation');
}
if (!defined('PT_ELEMENTOR_ADDONS_VERSION')) {
	define('PT_ELEMENTOR_ADDONS_VERSION', '1.0');
}
require_once PT_ELEMENTOR_ADDONS_PATH . 'inc/elementor-helper.php';
if (is_admin()) {
	require_once PT_ELEMENTOR_ADDONS_PATH . 'admin/pt-plugin-base.php';
}


/**
 * Load Pt Custom Element
 *
 * @since 1.0.0
 */


	/**
	 * Define our Pt Element Function settings.
	 */

function pt_element_function() {
	
	
	include_once PT_ELEMENTOR_ADDONS_PATH . 'inc/supporter.php';

	// Load elements.
	$deactivate_element_team = pt_get_option('pt_deactivate_element_team', false);
	$pt_setting = get_option( 'pt_setting', '' );
		
	if (isset($pt_setting['pt_opt_in'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-team.php';
	}
		
	 if (isset($pt_setting['pt_opt_in1'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in1]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in1]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-flipbox.php';
	}
	
	if (isset($pt_setting['pt_opt_in2'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in2]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in2]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-dual-button.php';
	}
	if (isset($pt_setting['pt_opt_in3'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in3]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in3]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-post-timeline.php';
	}
	if (isset($pt_setting['pt_opt_in4'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in4]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in4]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-info-box.php';
	}
	if (isset($pt_setting['pt_opt_in5'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in5]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in5]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-interactive-banner.php';
	}
	if (isset($pt_setting['pt_opt_in6'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in6]', false);
    }
	else{
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in6]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-testimonials.php';
	}
	if ( function_exists( 'wpcf7' ) ) {
		if (isset($pt_setting['pt_opt_in7'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in7]', false);
		}
		else{
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in7]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-contact-form-7.php';
		}
	}
	if ( class_exists( 'GFForms' ) ) {
		if (isset($pt_setting['pt_opt_in8'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in8]', false);
		}
		else{
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in8]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-gravity-form.php';
		}
	}
	if ( function_exists( 'Ninja_Forms' ) ) {
		if (isset($pt_setting['pt_opt_in9'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in9]', false);
		}
		else{
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in9]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-ninja-form.php';
		}
	}
	if ( class_exists( 'WPForms' ) ) {
		if (isset($pt_setting['pt_opt_in10'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in10]', false);
		}
		else{
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in10]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-weforms.php';
		}
	}
	
}
add_action( 'elementor/widgets/widgets_registered', 'pt_element_function' );
	/**
	 * Define our Pt Addon For Element Scripts settings.
	 */
function pt_addon_for_elementor_scripts() {
	/*CSS*/
	wp_enqueue_style( 'pt-team', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-team.css' );
	wp_enqueue_style( 'pt-flipbox', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-flipbox.css' );
	wp_enqueue_style( 'pt-dual-btn', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-dual-btn.css' );
	wp_enqueue_style( 'pt-timelines', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-timelines.css' );
	wp_enqueue_style( 'pt-info-box', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-info-box.css' );
	wp_enqueue_style( 'pt-inter-styles', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-styles-interactive-banner.css' );
	wp_enqueue_style( 'pt-testimonial', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-testimonial.css' );
	wp_enqueue_style( 'pt-contactform', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-contact-form.css' );
	wp_enqueue_style( 'pt-gravityform', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-gravity-form.css' );
	wp_enqueue_style( 'pt-ninjaform', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-ninja-form.css' );
	wp_enqueue_style( 'pt-weforms', PT_ELEMENTOR_ADDONS_URL . 'assets/css/pt-weforms.css' );

	/*Jquery*/
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery.masonry', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.masonry.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'pt-custom-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/pt-custom.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'pt_addon_for_elementor_scripts' );

function localize_scripts() {

   $custom_css = pt_get_option('pt_custom_css', '');
		wp_localize_script('pt-frontend-scripts', 'pt_settings', array('custom_css' => $custom_css));
}