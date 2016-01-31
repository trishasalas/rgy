<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function rgy_retreat_metaboxes( array $meta_boxes ) {

	$retreats_fields = array(
		array(
			'id'   => 'rgy_retreat_image',
			'name' => 'Featured Image',
			'type' => 'image',
			'size' => 'height=550&width=1280&crop=1',
			'cols' => 12
		),
		array(
			'id'   => 'rgy_retreat_start_date',
			'name' => 'Start Date',
			'type' => 'date_unix',
			'cols' => 1
		),
		array(
			'id'   => 'rgy_retreat_end_date',
			'name' => 'End Date',
			'type' => 'date_unix',
			'cols' => 1
		),
		array(
			'id' => 'rgy_retreat_location',
			'name' => 'Location',
			'type' => 'text',
			'cols' => 10
		),
	);

	// Retreats Post Type Meta Boxes
	$meta_boxes[] = array(
		'title' => 'Retreats Info',
		'pages' => array( 'post_type' => 'retreat' ),
		'priority' => 'high',
		'fields' => $retreats_fields
	);


	// Home page slider post select meta boxes
	$meta_boxes[] = array(
		'title' => 'Home Slider',
		'pages' => 'page',
		'show_on' => array( 'id' => array( 6 ) ),
		'fields' => array(
			array(
				'id'       => 'rgy_home_slider_post',
				'name'     => 'Select the posts to feature in the slider on the home page.',
				'type'     => 'post_select',
				'use_ajax' => true,
				'query' => array( 'posts_per_page' => 8 ), 'multiple' => true
			)
		)
	);

	// Home page teaching schedule
	$meta_boxes[] = array(
		'title' => 'Teaching Schedule',
		'pages' => 'page',
		'show_on' => array( 'id' => array( 6 ) ),
		'fields' => array(
			array( 'id' => 'rgy_home_schedule_title',  'name' => 'Title', 'type' => 'text', 'cols' => 12 ),
			array( 'id' => 'rgy_home_schedule_first',  'name' => 'First Block', 'type' => 'wysiwyg', 'cols' => 6 ),
			array( 'id' => 'rgy_home_schedule_name',  'name' => 'Second Block', 'type' => 'wysiwyg', 'cols' => 6 ),
		)
	);

	// Home page Explore
	$meta_boxes[] = array(
		'title' => 'Explore',
		'pages' => 'page',
		'show_on' => array( 'id' => array( 6 ) ),
		'fields' => array(
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-1',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-2',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-3',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-4',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-5',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-6',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-7',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-8',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-9',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-10',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-11',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-12',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-13',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-14',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-15',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-16',  'name' => 'Image', 'type' => 'image' ),
			) ),
			array( 'id' => 'gac-5', 'name' => 'Group (8 columns)', 'type' => 'group', 'cols' => 4, 'fields' => array(
				array( 'id' => 'gac-4-f-17',  'name' => 'Link', 'type' => 'text' ),
				array( 'id' => 'gac-4-f-18',  'name' => 'Image', 'type' => 'image' ),
			) ),
		)
	);

	return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'rgy_retreat_metaboxes' );

add_action( 'add_meta_boxes', 'jb_make_wp_editor_movable', 0 );
function jb_make_wp_editor_movable() {
	global $_wp_post_type_features;
	if ( isset( $_wp_post_type_features[ 'retreat' ][ 'editor' ] ) && $_wp_post_type_features[ 'retreat' ][ 'editor' ] ) {
		unset( $_wp_post_type_features[ 'retreat' ][ 'editor' ] );
		add_meta_box(
			'description_sectionid',
			__( 'Description' ),
			'jb_inner_custom_box',
			'retreat', 'normal', 'high'
		);
	}
}
function jb_inner_custom_box( $post ) {
	// TODO
	// switched to wp_editor as suggested by codex but it turns all the text white...need to investigate
	the_editor( $post->post_content );
}