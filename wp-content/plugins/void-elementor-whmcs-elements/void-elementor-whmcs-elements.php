<?php
/**
 * Plugin Name: Elementor WHMCS Elements
 * Description: Adds Verious Widgets such as Live Domain Searcher, Pricing Table, Knowledge Base in Elementor for being used with your WHMCS or WHMCS Bridge Plugin for Hosting Website.
 * Version:     1.0.2
 * Author:      VOID CODERS
 * Author URI:  http://voidcoders.com
 * Plugin URI:  http://voidcoders.com/product/elementor-whmcs-elements/
 * Text Domain: void_ewhmcse
 */
/* This loads the plugin.php file which is the main one */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'VOID_EWHMCSE_ELEMENTS_FILE_', __FILE__ );

define( 'VOID_EWHMCSE_PLUGIN_NAME', 'Elementor WHMCS Elements' );

/**
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function void_ewhmcse_load_elements() {
  // Load localization file
  load_plugin_textdomain( 'void_ewhmcse' );

  // Notice if the Elementor is not active
  if ( ! did_action( 'elementor/loaded' ) ) {
    add_action( 'admin_notices', 'void_ewhmcse_fail_load' );
    return;
  }

  // Check version required
  $elementor_version_required = '1.8.0';
  if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
    add_action( 'admin_notices', 'void_ewhmcse_fail_load_out_of_date' );
    return;
  }

  // Require the main plugin file
  require( __DIR__ . '/plugin.php' );   //loading the main plugin
  require( __DIR__ . '/helper/helper.php' ); // load helper functions

}
add_action( 'plugins_loaded', 'void_ewhmcse_load_elements' );   //notiung but checking and notice

function void_ewhmcse_fail_load_out_of_date() {  // if plungin is outdated
  if ( ! current_user_can( 'update_plugins' ) ) {
    return;
  }
  $message = '<p>' . sprintf(__('<strong>%s</strong> Needs <a href="%s">Elementor</a> version higher than the one you have! Please update your <strong>Elementor</strong> plugin.','void_ewhmcse'), 'https://wordpress.org/plugins/elementor/',VOID_EWHMCSE_PLUGIN_NAME ) . '</p>';

  echo '<div class="error">' . $message . '</div>';
}

function void_ewhmcse_fail_load() {  // if plungin is not isntalled
  if ( ! current_user_can( 'update_plugins' ) ) {
    return;
  }
  $message = '<p>' . sprintf(__('<a href="%s">Elementor</a> must be installed for <strong>%s</strong> plugin to work! Please Install it first','void_ewhmcse'), 'https://wordpress.org/plugins/elementor/',VOID_EWHMCSE_PLUGIN_NAME ) . '</p>';
 
  echo '<div class="error">' . $message . '</div>';
}



//add admin css
function void_ewhmcse_admin_css(){
    global $pagenow;
    if( $pagenow == 'index.php' || ( !empty( $_GET['page'] ) && $_GET['page']=='void_whcms_pro')){
        wp_enqueue_style( 'void-cf7-admin', plugins_url( 'assets/css/void-cf7-admin.css', __FILE__ ) );
    }
}
add_action( 'admin_enqueue_scripts', 'void_ewhmcse_admin_css' );


// add plugin activation time

function void_ewhmcse_activation_time(){
    $get_installation_time = strtotime("now");
    add_option('void_ewhmcse_elementor_activation_time', $get_installation_time ); 
}
register_activation_hook( __FILE__, 'void_ewhmcse_activation_time' );

//check if review notice should be shown or not

function void_ewhmcse_check_installation_time() {

    $spare_me = get_option('void_ewhmcse_spare_me');
    if( !$spare_me ){
        $install_date = get_option( 'void_ewhmcse_elementor_activation_time' );
        $past_date = strtotime( '-7 days' );
     
        if ( $past_date >= $install_date ) {
     
            add_action( 'admin_notices', 'void_ewhmcse_display_admin_notice' );
     
        }
    }
}
add_action( 'admin_init', 'void_ewhmcse_check_installation_time' );
 
/**
* Display Admin Notice, asking for a review
**/
function void_ewhmcse_display_admin_notice() {
    // wordpress global variable 
    global $pagenow;
    if( $pagenow == 'index.php' ){
 
        $dont_disturb = esc_url( get_admin_url() . '?spare_me_ewhmcse=1' );
        $plugin_info = get_plugin_data( __FILE__ , true, true );       
        $reviewurl = esc_url( 'https://wordpress.org/support/plugin/void-elementor-whmcs-elements/reviews/#new-post' );
        $void_url = esc_url( 'https://voidcoders.com' );
     
        printf(__('<div class="void-cf7-review wrap">You have been using <b> %s </b> for a while. We hope you liked it ! Please give us a quick rating, it works as a boost for us to keep working on the plugin ! Also you can visit our <a href="%s" target="_blank">site</a> to get more themes & Plugins<div class="void-cf7-review-btn"><a href="%s" class="button button-primary" target=
            "_blank">Rate Now!</a><a href="%s" class="void-cf7-review-done"> Already Done !</a></div></div>', $plugin_info['TextDomain']), $plugin_info['Name'], $void_url, $reviewurl, $dont_disturb );
    }
}
// remove the notice for the user if review already done or if the user does not want to
function void_ewhmcse_spare_me(){    
    if( isset( $_GET['spare_me_ewhmcse'] ) && !empty( $_GET['spare_me_ewhmcse'] ) ){
        $spare_me = $_GET['spare_me_ewhmcse'];
        if( $spare_me == 1 ){
            add_option( 'void_ewhmcse_spare_me' , TRUE );
        }
    }
}
add_action( 'admin_init', 'void_ewhmcse_spare_me', 5 );



// Plugin Menu
function void_ewhmcse_custom_menu_page(){
    add_menu_page( 
        __( 'VOID WHMCS', 'void_ewhmcse' ),
        'Void WHMCS Elements',
        'manage_options',
        'void_whmcs_page',
        'void_ewhmcse_func',
        '',
        6
    ); 
}
add_action( 'admin_menu', 'void_ewhmcse_custom_menu_page' );
 


/**
 * Display a custom menu page
 */
function void_ewhmcse_func(){ ?>

<div class="wrap about-wrap">
  
  <div class="about-text" style=" margin: 15px 2px; ">
    <?php _e('<h4 style=" display: inline; ">Shaping the void~</h4> <a href="http://voidcoders.com" target="_blank">voidcoders</a><br><br>We are voidcoders and we create WordPress goods & WEB Apps & <span style=" color: #2196F3; font-weight: 600; ">Custom Script! </span>','void_ewhmcse' ); ?>
  </div>
  
  <h4><?php _e( 'Void Elementor WHMCS Elements Preview' ,'void_ewhmcse'); ?></h4>

  <?php echo wp_oembed_get('https://www.youtube.com/watch?v=IFHOMMMowbA'); ?>

  
  <div class="changelog">
  <br>
    <div class="feature-section images-stagger-right">
      <h4><?php _e( 'Check Our Exciting Products & Offeres Bellow' ,'void_ewhmcse'); ?></h4>
    </div>

        <object type="text/html" data="//voidcoders.com/promo-products" width:="" style=" height: -webkit-fill-available; width: -webkit-fill-available; "> </object>

  </div>

</div>

<?php 
}

function void_ewhmcse_go_pro(){

  add_submenu_page( 'void_whmcs_page', 'Go Pro', 'Go Pro', 'manage_options', 'void_whcms_pro', 'void_ewhmcse_goPro' );

}

add_action( 'admin_menu', 'void_ewhmcse_go_pro' );

function void_ewhmcse_goPro(){ ?>

<div class="void-ewhmcse-table">
    <div class="table">
    <div class="table-cell">VOID<img style="width: 60px;" src="https://voidcoders.com/wp-content/uploads/2017/12/logovoid.png">CODERS</div>
    <div class="table-cell plattform">
      <h3><?php esc_html_e('Free','void_ewhmcse') ?></h3>
    </div>
    <div class="table-cell enterprise">
      <h3><?php esc_html_e('Pro ( 9$ only)','void_ewhmcse') ?></h3>
      <a href="<?php echo esc_url('https://voidcoders.com/product/elementor-whmcs-elements-pro/') ?>" class="btn">Get Now</a>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('Domain Search WHMCS','void_ewhmcse') ?></div>
    <div class="table-cell">
      <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('Live Ajax Domain Search','void_ewhmcse') ?></div>
    <div class="table-cell">
      <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('Knowledge Base form for WHMCS','void_ewhmcse') ?></div>
    <div class="table-cell">
      <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('1 Style Live pricing table from WHMCS','void_ewhmcse') ?></div>
    <div class="table-cell">
      <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('General Pricing table','void_ewhmcse') ?></div>
    <div class="table-cell">
      <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('6+ Style Live pricing table from WHMCS','void_ewhmcse') ?></div>
    <div class="table-cell"></div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('Domain TLD pricing table from WHMCS','void_ewhmcse') ?></div>
    <div class="table-cell"></div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('WHMCS login form','void_ewhmcse') ?></div>
    <div class="table-cell"></div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
    <div class="table-cell cell-feature"><?php esc_html_e('Dedicated Support','void_ewhmcse') ?></div>
    <div class="table-cell"></div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>

    <div class="table-cell cell-feature"><?php esc_html_e('More Features Update','void_ewhmcse') ?></div>
    <div class="table-cell"></div>
    <div class="table-cell">
      <svg class="enterprise-check" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
        <title>check_blue</title>
        <path d="M6.116 14.884c.488.488 1.28.488 1.768 0l10-10c.488-.488.488-1.28 0-1.768s-1.28-.488-1.768 0l-9.08 9.15-4.152-4.15c-.488-.488-1.28-.488-1.768 0s-.488 1.28 0 1.768l5 5z" fill="limegreen" fill-rule="evenodd"/>
      </svg>
    </div>
  </div>
</div>


<?php }