<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author nofearinc
 *
 * @package Get some constants ready for paths when your plugin grows.
 */

 /**
 * The plugin base class - the root of all WP goods!
 *
 * @author nofearinc
 */
class PT_Plugin_Settings {
	private $pt_setting;
	/**
	 * Construct me
	 */
	public function __construct() {
		$this->pt_setting = get_option( 'pt_setting', '' );
		// register the checkbox.
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}
	/**
	 * Setup the settings
	 * Add a single checkbox setting for Active/Inactive and a text field
	 * just for the sake of our demo
	 */
	public function register_settings() {
		register_setting( 'pt_setting', 'pt_setting', array( $this, 'pt_validate_settings' ) );
		add_settings_section(
			'pt_settings_section',         // ID used to identify this section and with which to register options.
			__( 'Unable & Disable Elementor For Better Performance', 'ptbase' ),                  // Title to be displayed on the administration page.
			array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
			'pt-plugin-base'                           // Page on which to add this section of options.
		);
		add_settings_field(
			'pt_opt_in',                      // ID used to identify the field throughout the theme.
			__( ' Team ', 'ptbase' ),                         // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in1',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Flip Box: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback1' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in2',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Dual Button: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback2' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in3',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Post Timeline: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback3' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in4',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Info Box: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback4' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in5',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Interactive Banner: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback5' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in6',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback6' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		if ( function_exists( 'wpcf7' ) ) {
		add_settings_field(
			'pt_opt_in7',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Contact Form 7: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback7' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		}
		if ( class_exists( 'GFForms' ) ) {
		add_settings_field(
			'pt_opt_in8',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Gravity Form: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback8' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		}
		if ( function_exists( 'Ninja_Forms' ) ) {
		add_settings_field(
			'pt_opt_in9',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Ninja Form: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback9' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		}
		if ( class_exists( 'WPForms' ) ) {
		add_settings_field(
			'pt_opt_in10',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Wpforms Form: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback10' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section'         // The name of the section to which this field belongs.
		);
		}
		
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_settings_callback() {
		//echo _e( 'Enable me', 'ptbase' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback() {
		$enabled = false;
		$out = '';
		$val = false;
		// check if checkbox is checked.
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Team </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Team </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback1() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in1'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in1'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Flip Box </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in1]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Flip Box </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in1]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback2() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in2'] ) ) {
			$val = true;
		}
		
		if ( isset( $this->pt_setting['pt_opt_in2'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Dual Button </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in2]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Dual Button </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in2]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback3() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in3'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in3'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Post Timeline </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in3]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Post Timeline </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in3]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback4() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in4'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in4'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Info Box </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in4]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Info Box </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in4]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback5() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in5'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in5'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Interactive Banner </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in5]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Interactive Banner </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in5]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback6() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in6'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in6'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Testimonials </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in6]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Testimonials </p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in6]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback7() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in7'] ) ) {
			$val = true;
		}
		if ( function_exists( 'wpcf7' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in7'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Contact Form 7 </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in7]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Contact Form 7 </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in7]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback8() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in8'] ) ) {
			$val = true;
		}
		if ( class_exists( 'GFForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in8'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Gravity Form  </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in8]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Gravity Form </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in8]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback9() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in9'] ) ) {
			$val = true;
		}
		if ( function_exists( 'Ninja_Forms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in9'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Ninja Form  </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in9]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Ninja Form </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in9]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback10() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in10'] ) ) {
			$val = true;
		}
		if ( class_exists( 'WPForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in10'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Wpforms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in10]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Wpforms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in10]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_sample_text_callback() {
		$out = '';
		$val = '';
		// check if checkbox is checked.
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_sample_text'] ) ) {
			$val = $this->pt_setting['pt_sample_text'];
		}
		$out = '<input type="text" id="pt_sample_text" name="pt_setting[pt_sample_text]" value="' . $val . '"  />';
		echo $out;
	}
	/**
	 * Helper Settings function if you need a setting from the outside.
	 *
	 * Keep in mind that in our demo the Settings class is initialized in a specific environment and if you
	 * want to make use of this function, you should initialize it earlier (before the base class)
	 *
	 * @return boolean is enabled
	 */
	public function is_enabled() {
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in'] ) ) {
			return true;
		}
		return false;
	}
	/**
	 * Validate Settings
	 *
	 * @param post $input the post object of the given page.
	 */
	public function pt_validate_settings( $input ) {
		return $input;
	}
}
