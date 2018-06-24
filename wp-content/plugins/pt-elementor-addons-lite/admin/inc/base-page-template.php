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
	<h2><?php _e( 'Base plugin page', 'ptbase' ); ?></h2>
	<p><?php _e( 'Sample base plugin page', 'ptbase' ); ?></p>
	
	<form id="pt-plugin-base-form" action="options.php" method="POST">
		
			<?php settings_fields( 'pt_setting' ); ?>
			<?php do_settings_sections( 'pt-plugin-base' ); ?>
			
			<input type="submit" value="<?php _e( 'Save', 'ptbase' ); ?>" />
	</form> <!-- end of #pttemplate-form -->
	
</div>


