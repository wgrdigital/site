<?php
/**
 * Class Category Define Methods
 *
 * @author    paramthemes <paramthemes@gmail.com>
 * @copyright 2017 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

add_action(
	'elementor/init', function() {
		\Elementor\Plugin::$instance->elements_manager->add_category(
			'pt-elementor-addons',
			[
				'title' => __( 'Pt Elementor Addons', 'pt-elementor-addons' ),
				'icon' => 'fa fa-plug',
			],
			1
		);
	}
);
function pt_get_option($option_name, $default = null) {

    $settings = get_option('pt_settings');

    if (!empty($settings) && isset($settings[$option_name]))
        $option_value = $settings[$option_name];
    else
        $option_value = $default;

    return $option_value;
}

function pt_update_option($option_name, $option_value) {

    $settings = get_option('pt_settings');

    if (empty($settings))
        $settings = array();

    $settings[$option_name] = $option_value;

    update_option('pt_settings', $settings);
}

/**
 * Update multiple options in one go
 * @param array $setting_data An collection of settings key value pairs;
 */
function pt_update_options($setting_data) {

    $settings = get_option('pt_settings');

    if (empty($settings))
        $settings = array();

    foreach ($setting_data as $setting => $value) {
        // because of get_magic_quotes_gpc()
        $value = stripslashes($value);
        $settings[$setting] = $value;
    }

    update_option('pt_settings', $settings);
}

