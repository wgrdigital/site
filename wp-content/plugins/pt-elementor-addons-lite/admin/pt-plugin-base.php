<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author nofearinc
 *
 * @package Get some constants ready for paths when your plugin grows.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The plugin base class - the root of all WP goods!
 *
 * @author nofearinc
 */
class PT_Plugin_Base {

	/**
	 * Assign everything as a call from within the constructor
	 *
	 * @var The plugin base class - the root of all WP goods!
	 */

	protected $plugin_slug = 'pt_elementor_addons';
	/**
	 * Assign everything as a call from within the constructor
	 */
	public function __construct() {
		// add script and style calls the WP way.
		// it's a bit confusing as styles are called with a scripts hook.
		add_action( 'wp_enqueue_scripts', array( $this, 'pt_add_CSS' ) );
		// add scripts and styles only available in admin.
		add_action( 'admin_enqueue_scripts', array( $this, 'pt_add_admin_CSS' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'pt_add_admin_js' ) );
		// register admin pages for the plugin.
		add_action( 'admin_menu', array( $this, 'pt_admin_pages_callback1' ) );
		// register meta boxes for Pages (could be replicated for posts and custom post types).
		add_action( 'add_meta_boxes', array( $this, 'pt_meta_boxes_callback' ) );
		// register save_post hooks for saving the custom fields.
		add_action( 'save_post', array( $this, 'pt_save_sample_field' ) );
		// Register activation and deactivation hooks.
		register_activation_hook( __FILE__, 'pt_on_activate_callback' );
		register_deactivation_hook( __FILE__, 'pt_on_deactivate_callback' );
		// Translation-ready.
		add_action( 'plugins_loaded', array( $this, 'pt_add_textdomain' ) );
		// Add earlier execution as it needs to occur before admin page display.
		add_action( 'admin_init', array( $this, 'pt_register_settings' ), 5 );
		add_action( 'wp_ajax_store_ajax_value', array( $this, 'store_ajax_value' ) );
	}
	/**
	 * Add CSS styles
	 */
	public function pt_add_CSS() {
		 wp_register_style( 'samplestyle', PT_ELEMENTOR_ADDONS_URL . 'admin/css/samplestyle.css', array(), PT_ELEMENTOR_ADDONS_VERSION );
		wp_enqueue_style( 'samplestyle' );
	}
	/**
	 * Add admin CSS styles - available only on admin
	 */
	public function pt_add_admin_CSS() {
		 wp_register_style( 'samplestyle-admin', PT_ELEMENTOR_ADDONS_URL . 'admin/css/samplestyle-admin.css', array(), PT_ELEMENTOR_ADDONS_VERSION );
		wp_enqueue_style( 'samplestyle-admin' );
		wp_register_style('pt_help_page', PT_ELEMENTOR_ADDONS_URL . 'admin/css/help-page.css', array(), PT_ELEMENTOR_ADDONS_VERSION);
			wp_enqueue_style('pt_help_page');
			 wp_register_style( 'sweetalert2', PT_ELEMENTOR_ADDONS_URL . 'admin/css/sweetalert2.min.css');
		wp_enqueue_style( 'sweetalert2' );
	}
	/**
	 * Callback for registering pages
	 *
	 * This demo registers a custom page for the plugin and a subpage
	 */
	public function pt_add_admin_jS( $hook ) {
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'sweetalert-admin', plugins_url( '/js/sweetalert2.min.js' , __FILE__ ), array('jquery'), '1.0', true );
		wp_enqueue_script( 'sweetalert-admin' );
	}
	/**
	 * Callback for registering pages
	 *
	 * This demo registers a custom page for the plugin and a subpage
	 */
	public function pt_admin_pages_callback1() {
		add_menu_page(__( 'PT Elementor', 'ptbase' ), __( 'PT Elementor', 'ptbase' ), 'edit_themes', 'pt-plugin-base',
		array( $this, 'pt_plugin_base' ),PT_ELEMENTOR_ADDONS_URL . 'admin/images/logo-shape16.png' );
		//add_submenu_page( 'pt-plugin-base', __( 'Settings', 'ptbase' ), __( 'Settings', 'ptbase' ), 'edit_themes', 'pt-settings', array( $this, 'pt_plugin_base' ) );
		//remove_submenu_page('pt-plugin-base','pt-plugin-base');
		//add_submenu_page( 'pt-plugin-base', __( 'Documentation', 'ptbase' ), __( 'Documentation', 'ptbase' ), 'edit_themes', 'pt-documentation', array( $this, 'pt_documentation_page' ) );
		/* add_menu_page(
           'Pt Elementor Addons',
           __('PT Elementor', 'ptbase'),
           'manage_options',
           $this->plugin_slug,
           array($this, 'pt_plugin_base'),
           PT_ELEMENTOR_ADDONS_URL . 'admin/logo-shape16.png'
       );
      add plugin settings submenu page */
      /*   add_submenu_page(
            $this->plugin_slug,
            'Pt Elementor Addons',
            __('Settings', 'ptbase'),
            'edit_themes',
            $this->plugin_slug,
            array($this, 'pt_plugin_base')
        ); */
		
	}
	/**
	 * The content of the base page
	 */
	public function pt_plugin_base() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/help-page.php' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_setting_page() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/help-setting.php' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_documentation_page() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/help-Documentation.php' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_plugin_side_access_page() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/remote-page-template.php' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_meta_boxes_callback() {
		// register side box.
		add_meta_box(
			'pt_side_meta_box',
			__( 'PT Side Box', 'ptbase' ),
			array( $this, 'pt_side_meta_box' ),
			'pluginbase', // leave empty quotes as '' if you want it on all custom post add/edit screens.
			'side',
			'high'
		);
		// register bottom box.
		add_meta_box(
			'pt_bottom_meta_box',
			__( 'PT Bottom Box', 'ptbase' ),
			array( $this, 'pt_bottom_meta_box' ),
			'' // leave empty quotes as '' if you want it on all custom post add/edit screens or add a post type slug.
		);
	}
	/**
	 *
	 * Init right side meta box here
	 *
	 * @param post    $post the post object of the given page.
	 * @param metabox $metabox metabox data.
	 */
	public function pt_side_meta_box( $post, $metabox ) {
		_e( '<p>Side meta content here</p>', 'ptbase' );
		// Add some test data here - a custom field, that is.
		$pt_test_input = '';
		if ( ! empty( $post ) ) {
			// Read the database record if we've saved that before.
			$pt_test_input = get_post_meta( $post->ID, 'pt_test_input', true );
		}
		?>
		<label for="pt-test-input"><?php _e( 'Test Custom Field', 'ptbase' ); ?></label>
		<input type="text" id="pt-test-input" name="pt_test_input" value="<?php echo $pt_test_input; ?>" />
		<?php
	}
	/**
	 * Save the custom field from the side metabox
	 *
	 * @param    $post $post_id the current post ID.
	 * @return post_id the post ID from the input arguments.
	 */
	public function pt_save_sample_field( $post_id ) {
		// Avoid autosaves.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		$slug = 'pluginbase';
		// If this isn't a 'book' post, don't update it.
		if ( ! isset( $_POST['post_type'] ) || $slug != $_POST['post_type'] ) {
			return;
		}
		// If the custom field is found, update the postmeta record.
		// Also, filter the HTML just to be safe.
		if ( isset( $_POST['pt_test_input'] ) ) {
			update_post_meta( $post_id, 'pt_test_input',  esc_html( $_POST['pt_test_input'] ) );
		}
	}
	/**
	 * Init bottom meta box here
	 *
	 * @param post    $post the post object of the given page.
	 * @param metabox $metabox metabox data.
	 */
	public function pt_bottom_meta_box( $post, $metabox ) {
		_e( '<p>Bottom meta content here</p>', 'ptbase' );
	}
	/**
	 * Initialize the Settings class
	 *
	 * Register a settings section with a field for a secure WordPress admin option creation.
	 */
	public function pt_register_settings() {
		require_once( PT_ELEMENTOR_ADDONS_PATH . '/admin/pt-plugin-settings.class.php' );
		new PT_Plugin_Settings();
	}
	/**
	 * Add textdomain for plugin
	 */
	public function pt_add_textdomain() {
		load_plugin_textdomain( 'ptbase', false, dirname( plugin_basename( __FILE__ ) ) . '/admin/lang/' );
	}
	/**
	 * Callback for saving a simple AJAX option with no page reload
	 */
	public function store_ajax_value() {
		if ( isset( $_POST['data'] ) && isset( $_POST['data']['pt_option_from_ajax'] ) ) {
			update_option( 'pt_option_from_ajax' , $_POST['data']['pt_option_from_ajax'] );
		}
		die();
	}
}
/**
 * Register activation hook.
 */
function pt_on_activate_callback() {
	// do something on activation.
}
/**
 * Register deactivation hook.
 */
function pt_on_deactivate_callback() {
	// do something when deactivated.
}
// Initialize everything.
 new PT_Plugin_Base();
