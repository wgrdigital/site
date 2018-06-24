/**
 * PT Elementor Addons Lite : Custom Javascript code goes here.
 *
 * @Pt Custom Javascript
 * @package Elementor.
 * @summary Custom Javascript code for Elements.
 * Provides some feature.
 *
 * The extra line between the end of the @pt Custom docblock
 * and the file-closure is important.
 */

jQuery(
	function($){
		var $grid = $( '#timeline' );
		$grid.imagesLoaded(
			function() {
				$grid.masonry(
					{
						itemSelector: '.pt-timeline-column',
						percentPosition: true,
						columnWidth: 20,
						gutter: 25,
						isAnimated : false
					}
				);
				$( ".pt-timeline-column" ).each(
					function() {
						var position = $( this ).position();
						if (position.left == 0) {
							$( this ).addClass( 'left-column' );
						} else {
							$( this ).addClass( 'right-column' );
						}
					}
				);
			}
		);
	}
);
