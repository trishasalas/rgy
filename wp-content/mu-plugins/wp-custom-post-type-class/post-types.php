<?php
include_once('CPT.php');

$retreats = new CPT( 'retreat',
	array(
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'show_in_menu' => true,
		'menu_position' => 5
	)
);

$retreats->menu_icon( 'dashicons-palmtree' );
$retreats->register_taxonomy( 'retreat_type' );
$retreats->filters( array( 'retreat_type' ) );

$services = new CPT( 'service',
	array(
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'show_in_menu' => true,
		'menu_position' => 5
	)

);

$services->menu_icon( 'dashicons-share-alt' );