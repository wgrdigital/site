<?php
/**
 * Class Pt Elementor Supporter.php
 *
 * @author    paramthemes <paramthemes@gmail.com>
 * @copyright 2017 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

	/**
	 * Post Data
	 *
	 * @param int $args Post data.
	 */
function pt_get_post_data( $args ) {
	$defaults = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'       => '',
		'author_name'      => '',
		'post_status'      =>  array('pending','future','publish'),
		'suppress_filters' => true,
	);
	
	if($args['post_period'] == 'future'){
		$today = getdate();
		$defaults['date_query'] = array(
				array(
					'after' => array(
						'year'  => $today['year'],
						'month' => $today['mon'],
						'day'   => $today['mday'],
					),
				),
			
		);
	} elseif($args['post_period'] == 'past'){
		$today = getdate();
		$defaults['date_query'] = array(
				array(
					'before' => array(
						'year'  => $today['year'],
						'month' => $today['mon'],
						'day'   => $today['mday'],
					),
				),
			
		);
	} elseif($args['post_period'] == 'present'){
		$today = getdate();
		$defaults['date_query'] = array(
				array(
					'year'  => $today['year'],
					'month' => $today['mon'],
					'day'   => $today['mday'],
				),			
		);
	} else {
		unset($args['post_period']);
	}
	unset($args['post_period']);
	
	$atts = wp_parse_args( $args,$defaults );
	
	$posts = get_posts( $atts );

	return $posts;
}
	/**
	 * Define Post Types Display settings.
	 */
function pt_get_post_types() {
	$pt_cpts = get_post_types(
		array(
			'public' => true,
			'show_in_nav_menus' => true,
		)
	);
	$eael_exclude_cpts = array( 'elementor_library', 'attachment', 'product' );

	foreach ( $eael_exclude_cpts as $exclude_cpt ) {
		unset( $pt_cpts[ $exclude_cpt ] );
	}

		$post_types = array_merge( $pt_cpts );
	return $post_types;
}
	/**
	 * Define Post Order By Display settings.
	 */
function pt_get_post_orderby_options() {
	$orderby = array(
		'ID' => 'Post Id',
		'author' => 'Post Author',
		'title' => 'Title',
		'date' => 'Date',
		'modified' => 'Last Modified Date',
		'parent' => 'Parent Id',
		'rand' => 'Random',
		'comment_count' => 'Comment Count',
		'menu_order' => 'Menu Order',
	);

	return $orderby;
}
/**
	 * Define Post Period Display settings.
	 */
function pt_get_post_period_options() {
	$postperiod = array(
		'none' => '',
		'past' => 'Past',
		'present' => 'Present',
		'future' => 'Future',
	);

	return $postperiod;
}
	/**
	 * Post Setting
	 *
	 * @param int $settings Post data.
	 */
function pt_get_post_settings( $settings ) {
	$post_args['post_type'] = $settings['pt_post_type'];

	if ( 'post' === $settings['pt_post_type'] ) {
		$post_args['category'] = $settings['pt_category'];
	}

	$post_args['posts_per_page'] = $settings['num_posts'];
	$post_args['offset'] = $settings['post_offset'];
	$post_args['orderby'] = $settings['orderby'];
	$post_args['order'] = $settings['order'];
	$post_args['post_period'] = $settings['post_period'];

	return $post_args;
}
	/**
	 * Post Content By Id Setting
	 *
	 * @param int    $post_id Post data.
	 * @param string $excerpt_length Content.
	 *
	 * @return int the integer.
	 */
function pt_get_excerpt_by_id( $post_id, $excerpt_length ) {
	$the_post = get_post( $post_id );

	$the_excerpt = null;
	if ( $the_post ) {
		$the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
	}

	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) );
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) :
		array_pop( $words );
		$the_excerpt = implode( ' ', $words );
		$the_excerpt .= '...';
	 endif;

	 return $the_excerpt;
}
	/**
	 * Define Post Category Content Display settings.
	 */
function pt_post_type_categories() {
	$terms = get_terms(
		array(
			'taxonomy' => 'category',
			'hide_empty' => true,
		)
	);

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$options[ $term->term_id ] = $term->name;
		}
	}

		return $options;
}
if ( function_exists( 'wpcf7' ) ) {
function pt_select_contact_form(){
    $wpcf7_form_list = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
    foreach ( $wpcf7_form_list as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;
    }
	}
}
/**
 * Get Gravity Form [ if exists ]
 */

function pt_select_gravity_form() {

    $forms = RGFormsModel::get_forms( null, 'title' );
    foreach( $forms as $form ) {
      $options[ $form->id ] = $form->title;
    }
    return $options;

}
/**
 * Get Ninja Form List
 * @return array
 */
 
function pt_select_ninja_form() {
    global $wpdb;
    $pt_nf_table_name = $wpdb->prefix.'nf3_forms';
    $forms = $wpdb->get_results( "SELECT id, title FROM $pt_nf_table_name" );
    foreach( $forms as $form ) {
        $options[$form->id] = $form->title;
    }
    return $options;
}
/**
 * Get WeForms Form List
 * @return array
 */
function pt_select_wpforms() {

    $wpuf_form_list = get_posts( array(
        'post_type' => 'wpforms',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpuf_form_list ) && ! is_wp_error( $wpuf_form_list ) ) {
        foreach ( $wpuf_form_list as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }
        return $options;
    }

}

