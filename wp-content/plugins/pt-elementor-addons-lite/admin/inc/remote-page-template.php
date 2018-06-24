<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author nofearinc
 *
 * @package Get some constants ready for paths when your plugin grows.
 */

	?>
<div class="wrap">
	<div id="icon-edit" class="icon32 icon32-base-template"><br></div>
	<h2><?php _e( 'Remote plugin page', 'ptbase' ); ?></h2>
	
	<p><?php _e( 'Performing side activities - AJAX and HTTP fetch', 'ptbase' ); ?></p>
	<div id="pt_page_messages"></div>
	
	<?php
		$pt_ajax_value = get_option( 'pt_option_from_ajax', '' );
	?>
	
	<h3><?php _e( 'Store a Database option with AJAX', 'ptbase' ); ?></h3>
	<form id="pt-plugin-base-ajax-form" action="options.php" method="POST">
			<input type="text" id="pt_option_from_ajax" name="pt_option_from_ajax" value="<?php echo $pt_ajax_value; ?>" />
			
			<input type="submit" value="<?php _e( 'Save with AJAX', 'ptbase' ); ?>" />
	</form> <!-- end of #pt-plugin-base-ajax-form -->
	
	<h3><?php _e( 'Fetch a title from URL with HTTP call through AJAX', 'ptbase' ); ?></h3>
	<form id="pt-plugin-base-http-form" action="options.php" method="POST">
			<input type="text" id="pt_url_for_ajax" name="pt_url_for_ajax" value="http://wordpress.org" />
			
			<input type="submit" value="<?php _e( 'Fetch URL title with AJAX', 'ptbase' ); ?>" />
	</form> <!-- end of #pt-plugin-base-http-form -->
	
	<div id="resource-window">
	</div>
			
</div>
